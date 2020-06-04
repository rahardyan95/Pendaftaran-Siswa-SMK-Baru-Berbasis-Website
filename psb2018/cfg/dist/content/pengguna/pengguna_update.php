
<?php
	include "../../conf/koneksi.php";
	include "../../conf/fungsi_thumb.php";
	include "../../lib/inc.session.php";

	$ses = isset($_SESSION['stat_admin']) ? $_SESSION['stat_admin'] : '';
	/*----------------- session admin ------------------*/
  	if($ses == 'Admin'){

		/*--------------- script cegah upload file shell.php via *.jpg -------------*/
		if(isset($_FILES['fupload'])){
			$errors = array();
		/*--------------------------------------------------------------------------*/
	
			$lokasi_file = $_FILES['fupload']['tmp_name'];
			$tipe_file = $_FILES['fupload']['type'];
			$nama_file = $_FILES['fupload']['name'];
		
			/*--------------- script cegah upload file shell.php via *.jpg --------------
			setiap file gambar atau foto memiliki size.
			deklarasi var untuk size gambar/foto.
			----------------------------------------------------------------------------*/
			$file_size      = $_FILES['fupload']['size'];
			/*--------------------------------------------------------------------------*/
	
			$acak           = rand(1,999999);
			$nama_file_unik = $acak.$nama_file;
		
			/*--------------- script cegah upload file shell.php via *.jpg --------------
			explode tipe file dari sebuah file name utuh.
			biasanya file shell.php direname menjadi shell.php.jpg.
			file shell.php.jpg tsb akan di bypass dgn berbagai macam cara untuk
			dapat masuk sebagai file shell.php.
			ekstensi *.php ini akan di filter dgn perintah dibawah ini sehingga
			tidak dapat masuk.
			----------------------------------------------------------------------------*/
			$arr = explode('.',$nama_file);
			$file_ext=strtolower(end($arr));
			/*--------------------------------------------------------------------------*/
	
			/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
			function antiinjection($data){
				$filter_sql = mysql_real_escape_string(stripslashes(strip_tags($data,ENT_QUOTES)));
				return $filter_sql;
			}

			$pass_org = antiinjection($_POST['pass']);
			$pass = md5($pass_org);
			$nmuser = antiinjection($_POST['nmuser']);
			$alamat = antiinjection($_POST['alamat']);
			$email = antiinjection($_POST['email']);
			$aktif = antiinjection($_POST['aktif']);
			$status = antiinjection($_POST['status']);
			/*--------------------------------------------------------------------------------------*/
		
			/*---------- validasi untuk email -------------*/
			/* aktifkan variabel kar dibawah iniketika sudah online
			$kar1 = strstr($email, "@");
			$kar2 = strstr($email, ".");
			*/
			/*---------------------------------------------*/
	
			if (empty($lokasi_file)){
				/* aktifkan script validasi email dibawah ini ketika sudah online
				if (!$kar1 or !$kar2) {
					echo "<script>alert('Format email yang Anda masukkan salah.');</script>";
					echo "<meta http-equiv='refresh' content='0;url=?page=$en_mod_vwUs'>";
					exit;
				}
				else {
				*/
			
					/*-- jika gambar pengguna tidak diganti --*/
					/* versi PDO */
					try{
						$sql = $conn->prepare("UPDATE admin SET password = '$pass',
										password_origin = '$pass_org',
										nm_lengkap = '$nmuser',
										alamat_admin = '$alamat',
										email_admin = '$email',
										aktif_admin = '$aktif',
										status_admin = '$status'
									WHERE username = :username ");
						$sql->bindParam(":username", $_POST['usernm']);
						$sql->execute();
								 
						echo "<script>alert('Data pengguna sudah di update.');</script>";
						echo "<meta http-equiv='refresh' content='0;url=?page=vwuser'>";
					}
					catch(PDOException $e){
						echo $e->getMesagge();
					}
				//}
			}
			else {
				
					/*------------------ script cegah upload file shell.php via *.jpg ------------------
					mendefinisikan tipe file kedalam array dr gambar atau foto yg akan di upload.
					-----------------------------------------------------------------------------------*/
					$expensions = array("jpeg","jpg","pjpeg","png","gif");
					/*----------------------------------------------------------------------------------*/
					if(in_array($file_ext,$expensions)== false){
						echo "<script>window.alert('Upload foto pengguna gagal, pastikan file yang di upload bertipe *.JPG, *.PNG, *.GIF');
							</script>";
						echo "<meta http-equiv='refresh' content='0;url=?page=vwuser'>";
						exit;
					}
				
					else {
						/* versi PDO */
						$data_gbr = $conn->prepare("SELECT pic_admin FROM admin 
													WHERE username = :username ");
						$data_gbr->bindParam(":username", $_POST['usernm']);
						$data_gbr->execute();
						$r = $data_gbr->fetch();

						@unlink('img_user/'.$r['pic_admin']);
						@unlink('img_user/'.'small_'.$r['pic_admin']);
				
						/*------------------ script cegah upload file shell.php via *.jpg ------------------*/
						if(empty($errors)==true){
						/*----------------------------------------------------------------------------------*/
		
							UploadUser($nama_file_unik);
							/* versi PDO */
							$sql = $conn->prepare("UPDATE admin SET password = '$pass',
											password_origin = '$pass_org',
											nm_lengkap = '$nmuser',
											alamat_admin = '$alamat',
											email_admin = '$email',
											aktif_admin = '$aktif',
											status_admin = '$status',
											pic_admin = '$nama_file_unik'
										WHERE username = :username ");
							$sql->bindParam(":username", $_POST['usernm']);
							$sql->execute();
										
							echo "<script>alert('Data pengguna sudah di update.');</script>";
							echo "<meta http-equiv='refresh' content='0;url=?page=vwuser'>";
						}
					}
			}
		}
	}

	else 

	/* session user */
	{
		/*--------------- script cegah upload file shell.php via *.jpg -------------*/
		if(isset($_FILES['fupload'])){
			$errors = array();
		/*--------------------------------------------------------------------------*/
	
			$lokasi_file = $_FILES['fupload']['tmp_name'];
			$tipe_file = $_FILES['fupload']['type'];
			$nama_file = $_FILES['fupload']['name'];
		
			/*--------------- script cegah upload file shell.php via *.jpg --------------
			setiap file gambar atau foto memiliki size.
			deklarasi var untuk size gambar/foto.
			----------------------------------------------------------------------------*/
			$file_size      = $_FILES['fupload']['size'];
			/*--------------------------------------------------------------------------*/
	
			$acak           = rand(1,999999);
			$nama_file_unik = $acak.$nama_file;
		
			/*--------------- script cegah upload file shell.php via *.jpg --------------
			explode tipe file dari sebuah file name utuh.
			biasanya file shell.php direname menjadi shell.php.jpg.
			file shell.php.jpg tsb akan di bypass dgn berbagai macam cara untuk
			dapat masuk sebagai file shell.php.
			ekstensi *.php ini akan di filter dgn perintah dibawah ini sehingga
			tidak dapat masuk.
			----------------------------------------------------------------------------*/
			$arr = explode('.',$nama_file);
			$file_ext=strtolower(end($arr));
			/*--------------------------------------------------------------------------*/
	
			/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
			function antiinjection($data){
				$filter_sql = mysql_real_escape_string(stripslashes(strip_tags($data,ENT_QUOTES)));
				return $filter_sql;
			}

			$pass_org = antiinjection($_POST['pass']);
			$pass = md5($pass_org);
			$nmuser = antiinjection($_POST['nmuser']);
			$alamat = antiinjection($_POST['alamat']);
			$email = antiinjection($_POST['email']);
			/*--------------------------------------------------------------------------------------*/
		
			/*---------- validasi untuk email -------------*/
			/*
			$kar1 = strstr($email, "@");
			$kar2 = strstr($email, ".");
			*/
			/*---------------------------------------------*/
	
			if (empty($lokasi_file)){
				/*
				if (!$kar1 or !$kar2) {
					echo "<script>alert('Format email yang Anda masukkan salah.');</script>";
					echo "<meta http-equiv='refresh' content='0;url=?page=$en_mod_vwUs'>";
					exit;
				}
				else {
				*/
			
					/*-- jika gambar pengguna tidak diganti --*/
					/* versi PDO */
					try{
						$sql = $conn->prepare("UPDATE admin SET password = '$pass',
										password_origin = '$pass_org',
										nm_lengkap = '$nmuser',
										alamat_admin = '$alamat',
										email_admin = '$email'
									WHERE username = :username ");
						$sql->bindParam(":username", $_POST['usernm']);
						$sql->execute();
								 
						echo "<script>alert('Data pengguna sudah di update.');</script>";
						echo "<meta http-equiv='refresh' content='0;url=?page=vwuser'>";
					}
					catch(PDOException $e){
						echo $e->getMesagge();
					}
				//}
			}
			else {
				
					/*------------------ script cegah upload file shell.php via *.jpg ------------------
					mendefinisikan tipe file kedalam array dr gambar atau foto yg akan di upload.
					-----------------------------------------------------------------------------------*/
					$expensions = array("jpeg","jpg","pjpeg","png","gif");
					/*----------------------------------------------------------------------------------*/
					if(in_array($file_ext,$expensions)== false){
						echo "<script>window.alert('Upload foto pengguna gagal, pastikan file yang di upload bertipe *.JPG, *.PNG, *.GIF');
							</script>";
						echo "<meta http-equiv='refresh' content='0;url=?page=vwuser'>";
						exit;
					}
				
					else {
						/* versi PDO */
						$data_gbr = $conn->prepare("SELECT pic_admin FROM admin 
													WHERE username = :username ");
						$data_gbr->bindParam(":username", $_POST['usernm']);
						$data_gbr->execute();
						$r = $data_gbr->fetch();

						@unlink('img_user/'.$r['pic_admin']);
						@unlink('img_user/'.'small_'.$r['pic_admin']);
				
						/*------------------ script cegah upload file shell.php via *.jpg ------------------*/
						if(empty($errors)==true){
						/*----------------------------------------------------------------------------------*/
		
							UploadUser($nama_file_unik);
							/* versi PDO */
							$sql = $conn->prepare("UPDATE admin SET password = '$pass',
										password_origin = '$pass_org',
										nm_lengkap = '$nmuser',
										alamat_admin = '$alamat',
										email_admin = '$email',
										pic_admin = '$nama_file_unik'
									WHERE username = :username ");
							$sql->bindParam(":username", $_POST['usernm']);
							$sql->execute();
										
							echo "<script>alert('Data pengguna sudah di update.');</script>";
							echo "<meta http-equiv='refresh' content='0;url=?page=vwuser'>";
						}
					}
			}
		}
	}
?>