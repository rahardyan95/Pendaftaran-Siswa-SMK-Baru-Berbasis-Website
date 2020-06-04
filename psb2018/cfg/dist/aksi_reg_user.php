<?php
	include "../../conf/koneksi.php";
	include "../../conf/functionglobal.php";

	if($button='register' AND $id='signup'){

		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = mysql_real_escape_string(stripslashes(strip_tags($data,ENT_QUOTES)));
			return $filter_sql;
		}

		$nm_user = antiinjection($_POST['nm_pengguna']);
		$email = antiinjection($_POST['email']);
		/*--------------------------------------------------------------------------------------*/	

		/*---------- validasi untuk email -------------*/
		/* aktifkan variabel kar1 dan kar2 dibawah ini ketika online
		$kar1 = strstr($email, "@");
		$kar2 = strstr($email, ".");
		*/
		/*---------------------------------------------*/
		
		$unique = uniqid();
        $passwd = substr($unique, 0, 10);
		$passwd_admin= md5($passwd);

		/*------------------------------NOMOR OTOMATIS---------------------------------------*/
		// baca current date
		$today = date("Ym");

		// baca user dari form user.php
		$nama_user = $nm_user;

		// cari admin yang berawalan tanggal hari ini
		/* versi PDO */
		$query = $conn->prepare("SELECT max(username) AS last FROM admin
								WHERE username LIKE '$today%'");
		$query->execute();
		$data = $query->fetch();
		$lastAdmin = $data['last'];

		// baca nomor urut user dari admin terakhir
		$lastNoUrut = substr($lastAdmin, 8, 4);

		// nomor urut admin ditambah 1
		$nextNoUrut = $lastNoUrut + 1;

		// membuat format nomor urut admin berikutnya
		$nextAdmin = $today.sprintf('%04s', $nextNoUrut);
		/*----------------------------------NOMOR OTOMATIS-----------------------------------------*/

// dd([$nextAdmin,$data,$today,$query]);
		/* versi PDO */
		$cek_admin = $conn->prepare("SELECT nm_lengkap, email_admin FROM admin
										   WHERE nm_lengkap = :nmuser
										   OR email_admin = :email ");
		$cek_admin->bindParam(":nmuser", $nm_user);
		$cek_admin->bindParam(":email", $email);
		$cek_admin->execute();
		/* referensi: http://stackoverflow.com/questions/11305230/alternative-for-mysql-num-rows-using-pdo */
		$data_exists = ($cek_admin->fetchColumn() > 0) ? true : false;
	
		if($data_exists){
			echo" <script>alert('Nama atau email pengguna telah digunakan. Silahkan gunakan nama atau email pengguna yang lain.');</script>";
			echo "<meta http-equiv='refresh' content='0;url=login'>";
			exit;
		}
		/* aktifkan script validasi email dibawah ini ketika sudah online 
		else
		if (!$kar1 or !$kar2) {
			echo "<script>alert('Format email yang Anda masukkan salah.');</script>";
			echo "<meta http-equiv='refresh' content='0;url=login'>";
			exit;
		}
		*/
			
		else {

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
			$tujuan = $email;
			$subjek = "Admin PSB SMK Nusantara Indonesia - Password admin";
			$link = "http://localhost/PSB2018/cfg/dist/aktivasi.php?code=$kode_aktivasi"; /*-- jika sudah hosting, ubah dengan link URL website --*/
			$pesan = "Selamat, Anda terdaftar sebagai pengguna sistem PSB SMK Nusantara Indonesia. Klik link tautan berikut $link untuk aktivasi akun pengguna Anda. Username anda adalah $nextAdmin dan password anda adalah $passwd. Silahkan login menggunakan username dan password tersebut.";
			$from = "admin2018@localhost"; /*-- jika sudah hosting, ubah dengan email pengirim --*/
	
			$send_email = mail($tujuan,$subjek,$pesan,$from);
			/*-----------------------------------------------------------------------------------------*/
			
			/* versi PDO */
			try{
				$sql = $conn->prepare("INSERT INTO admin (username,
									   		password,
									   		password_origin,
								       		nm_lengkap,
									   		email_admin,
									   		kd_aktivasi_admin)
                                 VALUES('$nextAdmin',
                                 		'$passwd_admin',
								        '$passwd',
										'$nm_user',
										'$email',
										'$kode_aktivasi')");
				$sql->execute();
										
				echo "<script>alert('Data pengguna baru telah tersimpan.');</script>";
				echo "<meta http-equiv='refresh' content='0;url=login'>";
				exit();
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
		}
	}
?>