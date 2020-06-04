<?php
	include "../../conf/koneksi.php";
	include "../../conf/library.php";
	include "../../lib/inc.session.php";
	include "../../conf/fungsi_thumb.php";
	
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
	
		//------ANTI XSS & SQL INJECTION-------//
		$jdl_info = mysql_real_escape_string(stripslashes($_POST['jdl_info']));
		$isi_info = mysql_real_escape_string(stripslashes($_POST['isi_info']));
		//------ANTI XSS & SQL INJECTION-------//
	
		$aktif_info = $_POST['aktif'];
	
		// Apabila gambar tidak diganti
		if (empty($lokasi_file)){
			/* versi PDO */
			try{
				$query = $conn->prepare("UPDATE informasi SET judul_info = '$jdl_info', 
				                            deskripsi_info = '$isi_info',
	                                        aktif_info = '$aktif_info'
                                      WHERE id_info = :id_info ");
				$query->bindParam(":id_info", $_POST['tid']);
				$query->execute();

				echo "<script>alert('Informasi telah di update.');</script>";
				echo "<meta http-equiv='refresh' content='0;url=?page=crinfo'>";
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
		}
		else {
			/*------------------ script cegah upload file shell.php via *.jpg ------------------
			mendefinisikan tipe file kedalam array dr gambar atau foto yg akan di upload.
			-----------------------------------------------------------------------------------*/
			$expensions = array("jpeg","jpg","pjpeg","png","gif");
			/*----------------------------------------------------------------------------------*/
			if(in_array($file_ext,$expensions)== false){
				echo "<script>window.alert('Upload gambar informasi gagal, pastikan file yang di upload bertipe *.JPG, *.PNG, *.GIF');
					</script>";
				echo "<meta http-equiv='refresh' content='0;url=?page=crinfo'>";
				exit;
			}
		
			/* versi PDO */
			$data_gbr = $conn->prepare("SELECT pic_info FROM informasi 
										WHERE id_info = :id_info ");
			$data_gbr->bindParam(":id_info", $_POST['tid']);
			$data_gbr->execute();
			$r = $data_gbr->fetch();
			@unlink('img_informasi/'.$r['pic_info']);
			@unlink('img_informasi/'.'small_'.$r['pic_info']);
				
			/*------------------ script cegah upload file shell.php via *.jpg ------------------*/
			if(empty($errors)==true){
			/*----------------------------------------------------------------------------------*/
	
				UploadInformasi($nama_file_unik);
				/* versi PDO */
				try{
					$query = $conn->prepare("UPDATE informasi SET judul_info = '$jdl_info',
					                        deskripsi_info = '$isi_info',
											pic_info = '$nama_file_unik',
	                                        aktif_info = '$aktif_info'
                                      WHERE id_info = :id_info ");
					$query->bindParam(":id_info", $_POST['tid']);
					$query->execute();

					echo "<script>alert('Informasi telah di update.');</script>";
					echo "<meta http-equiv='refresh' content='0;url=?page=crinfo'>";
				}
				catch(PDOException $e){
					echo $e->getMessage();
				}
			}
		}
	}
?>