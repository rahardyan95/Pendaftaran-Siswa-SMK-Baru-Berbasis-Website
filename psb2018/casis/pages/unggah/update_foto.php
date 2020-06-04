<?php
	include "../conf/koneksi.php";
	include "../conf/library.php";
	include "../conf/fungsi_thumb.php";
	include "../lib/inc.session.sis.php";

	/*--------------- script cegah upload file shell.php via *.jpg -------------*/
	if(isset($_FILES['fupload_ft'])){
		$errors = array();
	/*--------------------------------------------------------------------------*/
		$lokasi_file = $_FILES['fupload_ft']['tmp_name'];
		$tipe_file = $_FILES['fupload_ft']['type'];
		$nama_file = $_FILES['fupload_ft']['name'];
		
		/*--------------- script cegah upload file shell.php via *.jpg --------------
		setiap file gambar atau foto memiliki size.
		deklarasi var untuk size gambar/foto.
		----------------------------------------------------------------------------*/
		$file_size      = $_FILES['fupload_ft']['size'];
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
		$file_ext = strtolower(end($arr));
		/*--------------------------------------------------------------------------*/

		//apabila ada gambar yang di upload
		if (!empty($lokasi_file)){
		
			/*------------------ script cegah upload file shell.php via *.jpg ------------------
			mendefinisikan tipe file kedalam array dr gambar atau foto yg akan di upload.
			-----------------------------------------------------------------------------------*/
			$expensions = array("jpeg","jpg","pjpeg","png","gif");
			if(in_array($file_ext,$expensions)== false){
				echo "<script>window.alert('Upload dokumen foto gagal, pastikan file yang di upload bertipe *.JPG, *.PNG, *.GIF');
					</script>";
				echo "<meta http-equiv='refresh' content='0;url=?page=unggah'>";
				exit;
			}
			/*----------------------------------------------------------------------------------*/
			
			else {

				/* versi PDO */
				$data_gbr = $conn->prepare("SELECT pic_foto FROM dok_foto
											WHERE id_dok_foto = :id_foto ");
				$data_gbr->bindParam(":id_foto", $_POST['id_ft']);
				$data_gbr->execute();
				$r = $data_gbr->fetch();
				@unlink('../cfg/dist/img_foto/'.$r['pic_foto']);
				@unlink('../cfg/dist/img_foto/'.'small_'.$r['pic_foto']);
			
				/*------------------ script cegah upload file shell.php via *.jpg ------------------*/
				if(empty($errors)==true){
				/*----------------------------------------------------------------------------------*/
		
					UploadFt($nama_file_unik);
					try{
						$sql = $conn->prepare("UPDATE dok_foto SET pic_foto = '$nama_file_unik' 
											   WHERE id_dok_foto = :id_ft ");
						$sql->bindParam(":id_ft", $_POST['id_ft']);
						$sql->execute();	
										
						echo "<script>alert('Data dokumen foto telah diupdate.');</script>";
						echo "<meta http-equiv='refresh' content='0;url=?page=unggah'>";
					}
					catch(PDOException $e){
						echo $e->getMessage();
					}
				}
			}
		}
	}
?>