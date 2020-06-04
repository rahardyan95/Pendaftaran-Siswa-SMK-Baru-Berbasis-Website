<?php
	session_start();
	include "conf/koneksi.php";
	include "conf/library.php";

	$captcha = $_POST['g-recaptcha-response'];
    $secret = "6LeFslcUAAAAAISWm775AWky3-yPqCHPh7ZLToos";
    $validateCaptcha = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER["REMOTE_ADDR"]), true);
	
	if ($validateCaptcha["success"] != false) {
	// if($_POST['captcha'] == $_SESSION['captcha']['code']){
		//------ANTI XSS & SQL INJECTION-------//
  		function antiinjection($data){
  			$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  			return $filter_sql;
		}

		$nisn = antiinjection($_POST['nisn']);
		$nm_siswa = antiinjection($_POST['nm_siswa']);
		$asal_skl = antiinjection($_POST['asal_skl']);
		$email = antiinjection($_POST['email']);
		$kompetensi = antiinjection($_POST['kompetensi']);
		//------ANTI XSS & SQL INJECTION-------//
	
		/*------------- validasi untuk real email ------------------------
	  	apabila sudah online, aktifkan variabel kar1 dan kar2 dibawah ini
		----------------------------------------------------------------*/
		/*
		$kar1 = strstr($email, "@");
		$kar2 = strstr($email, ".");
		*/
		/*---------------------------------------------------*/
	
		/*------------------------ untuk kebutuhan tabel ujian masuk ------------------------*/
		/*------------------------------NOMOR OTOMATIS---------------------------------------*/
		$kode = "USM";

		// baca current date
		$today = date("ym");

		// baca nisn dari nisn siswa
		$nisn = $nisn;

		// cari no ujian yang berawalan tanggal hari ini
		/* versi PDO */
		$sql1 = $conn->prepare("SELECT max(no_ujian) AS last FROM ujian_masuk
								WHERE no_ujian LIKE '$kode%'
								AND '$today%'");
		$sql1->execute();
		$data = $sql1->fetch();

		$lastTest = $data['last'];

		// baca nomor urut ujian dari no ujian terakhir
		$lastNoTes = substr($lastTest, 8, 4);

		// nomor urut ujian ditambah 1
		$nextNo = $lastNoTes + 1;

		// membuat format nomor urut USM berikutnya
		$nextTestNo = $kode.$today.sprintf('%04s', $nextNo);
		/*----------------------------------NOMOR OTOMATIS-----------------------------------------*/
		/*-----------------------------------------------------------------------------------------*/

		/*------------------------------NOMOR OTOMATIS---------------------------------------*/
		$kd = "PSB";

		// baca current date
		$today = date("ym");

		// baca nisn dari nisn siswa
		$nisn = $nisn;

		// cari no reg yang berawalan tanggal hari ini
		/* versi PDO */
		$sql2 = $conn->prepare("SELECT max(no_reg) AS last FROM psb
								WHERE no_reg LIKE '$kd%'
								AND '$today%'");
		$sql2->execute();
		$data = $sql2->fetch();

		$lastReg = $data['last'];

		// baca nomor urut reg dari no reg terakhir
		$lastReg = substr($lastReg, 8, 4);

		// nomor urut reg ditambah 1
		$nextReg = $lastReg + 1;

		// membuat format nomor urut reg PSB berikutnya
		$nextRegNo = $kd.$today.sprintf('%04s', $nextReg);
		/*----------------------------------NOMOR OTOMATIS-----------------------------------------*/
	
		/* versi PDO */
		/* http://stackoverflow.com/questions/11305230/alternative-for-mysql-num-rows-using-pdo */
		$cek_regsis = $conn->prepare("SELECT nisn, email_siswa FROM psb
									WHERE nisn = :nisn
									OR email_siswa = :email ");
		$cek_regsis->bindParam(":nisn", $nisn);
		$cek_regsis->bindParam(":email", $email);
		$cek_regsis->execute();
		$num_rows = $cek_regsis->fetchColumn();

		if($num_rows > 0){   
			echo" <script>alert('NISN atau email siswa telah terdaftar.');</script>";
			echo "<meta http-equiv='refresh' content='0;url=registrasi.html'>";
			exit;
		}
		/*-------- tampilkan pesan untuk pengetikkan format real email salah ---------
	  	apabila sudah online, aktifkan script validasi email dibawah ini
		----------------------------------------------------------------------------*/
		/*
		else
		if (!$kar1 or !$kar2) {
			echo "<script>alert('Format email yang kamu masukkan salah.');</script>";
			echo "<meta http-equiv='refresh' content='0;url=registrasi.html'>";
			exit;
		}
		*/

		else{
	
			/*----------------- set password peserta -----------------*/
			$password_baru = substr(md5(uniqid(rand(),1)),3,10);
			/*--------------------------------------------------------*/
	
			/*---------------------- Fungsi Acak Kode ---------------------*/
			function randomcode ($len="10"){
				global $pass;
				global $lchar;
				$code = NULL;
		
				for ($i=0;$i<$len;$i++){
					$char = chr(rand(48,122));
					while(!ereg("[a-zA-Z0-9]", $char)){
						if($char == $lchar) { continue; }
							$char = chr(rand(48,90));
						}
						$pass .= $char;
						$lchar = $char;
					}
				return $pass;
			}
			/*-------------------------------------------------------------*/
	
			/*------------------------ Kirim notifikasi aktivasi ke email peserta ----------------------*/
			$kode_aktivasi = randomcode();
			$password_baru = substr(md5(uniqid(rand(),1)),3,10);
			$tujuan = $email;
			$subjek = "PSB Online SMK Nusantara Indonesia - Kode aktivasi dan password login calon siswa.";
			$link = "http://localhost/psb2018/aktivasi.php?code=$kode_aktivasi"; /*-- jika sudah hosting, ubah dengan link URL website --*/
			$pesan = "Selamat, Anda terdaftar sebagai calon siswa SMK Nusantara Indonesia. Klik link tautan berikut $link untuk aktivasi akun calon siswa. No. pendaftaran Anda adalah $nextRegNo dan password anda adalah $password_baru. Silahkan login menggunakan no. pendaftaran dan password tersebut.";
	
			$from = "admin2018@localhost"; /*-- jika sudah hosting, ubah dengan email pengirim --*/
			$send_email = mail($tujuan,$subjek,$pesan,$from);
				
			/*-----------------------------------------------------------------------------------------*/
	
			try{
				$query1 = "INSERT INTO psb (no_reg,
										tgl_daftar,
										jam_daftar,
										password,
										kode_aktivasi,
										id_kompetensi,
										nisn,
		                                nm_siswa,
										email_siswa,
                                        asal_sekolah)
                                 VALUES('$nextRegNo',
                                 		'$tgl_sekarang',
                                 		'$jam_sekarang',
                                 		'$password_baru',
                                 		'$kode_aktivasi',
										'$kompetensi',
										'$nisn',
										'$nm_siswa',
								        '$email',
										'$asal_skl')";
				$conn->exec($query1);
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}

			/*-- menyimpan ke dalam tabel ujian masuk --*/
			try{
				$query2 = "INSERT INTO ujian_masuk (no_ujian,
			                                  no_reg,
			                                  tgl_ujian)
			                          VALUES ('$nextTestNo',
			                          		  '$nextRegNo',
			                          		  '$tglujian')";
				$conn->exec($query2);
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
										
			if($send_email){
				echo "<script>alert('Data pendaftaran siswa baru telah tersimpan. Kode aktivasi dan password login sudah terkirim ke email Anda.');</script>";
			}	
			echo "<meta http-equiv='refresh' content='0;url=home'>";
		}
	} /*-- end of session captcha --*/
	else {
		echo "<script>window.alert('Kode captcha yang Anda isikan tidak cocok..');</script>";
		echo "<meta http-equiv='refresh' content='0;url=registrasi.html'>";
		exit;
	}
?>