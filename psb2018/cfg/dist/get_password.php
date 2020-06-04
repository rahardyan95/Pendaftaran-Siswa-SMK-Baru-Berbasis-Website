<?php
//----------kirim password baru---------//
	include "../../conf/koneksi.php";
	
	//------ANTI XSS & SQL INJECTION-------//
	function antiinjection($data){
		$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
		return $filter_sql;
	}

	$email_user = antiinjection($_POST['email_user']);
	//------ANTI XSS & SQL INJECTION-------//
	
	/*---------- validasi untuk email -------------*/
	/* aktifkan variabel kar dibawah ini ketika suah online
	$kar1 = strstr($email_user, "@");
	$kar2 = strstr($email_user, ".");
	*/
	/*---------------------------------------------*/

	$unique = uniqid();
    $passwd = substr($unique, 0, 10);
	$passwd_baru = md5($passwd);

	// Cek email pengguna di database
	/* versi PDO */
	$cek_email = $conn->prepare("SELECT email_admin FROM admin 
								WHERE email_admin = :email ");
	$cek_email->bindParam(":email", $email_user);
	$cek_email->execute();
	/* referensi: http://stackoverflow.com/questions/11305230/alternative-for-mysql-num-rows-using-pdo */
	$data_exists = ($cek_email->fetchColumn() > 0) ? true : false;

	// jika email tidak ditemukan
	if ($data_exists){
    	echo"
        	<script>alert('Email tidak terdaftar didalam database, mohon ulangi lagi.');
            	window.location='javascript:history.go(-1)'
       		</script>
    	";
    	exit;
	}
	/* aktifkan script validasi email dibawah ini ketika sudah online
	else
	if (!$kar1 or !$kar2) {
		echo "<script>alert('Format email yang Anda masukkan salah.');
				window.location='javascript:history.go(-1)'
			</script>";
		exit;
	}
	*/
	else
	{
		// ganti password pengguna dengan password yang baru (reset password)
		/* versi PDO */
		try{
			$query = $conn->prepare("UPDATE admin SET password = '$passwd_baru', 
													password_origin = '$passwd' 
											WHERE email_admin = :email ");
			$query->bindParam(":email", $_POST['email_user']);
			$query->execute();
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}

    	// dapatkan email_pengguna dari database
    	/* versi PDO */
    	try{
    		$id = '1';
    		$sql2 = $conn->prepare("SELECT email_sekolah FROM identitas_web 
    								WHERE id_identitas = :id ");
    		$sql2->bindParam(":id", $id);
    		$sql2->execute();
    		$j2 = $sql2->fetch();

    	}
    	catch(PDOException $e){
    		echo $e->getMessage();
    	}

    	$subjek = "Admin PSB SMK Nusantara Indonesia - Password Baru Pengguna";
    	$pesan = "Password baru anda adalah <b>$passwd</b>. Anda dapat merubah password Anda melalui halaman pengguna.";

    	// Kirim email dalam format HTML
   		$dari = "From: $j2[email_sekolah]\r\n";
    	$dari .= "Content-type: text/html\r\n";

    	// Kirim password ke email pengguna
    	mail($_POST['email_user'],$subjek,$pesan,$dari);

    	echo "
        	<script>alert('Password baru telah terkirim ke alamat email Anda.');
            	window.location='login'
        	</script>
    	";
	}
?>