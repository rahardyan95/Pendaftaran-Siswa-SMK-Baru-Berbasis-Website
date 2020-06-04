<?php
	include "../conf/koneksi.php";
	include "../conf/library.php";
	include "../conf/fungsi_thumb.php";
	include "../lib/inc.session.sis.php";

	/*--------------- script cegah upload file shell.php via *.jpg -------------*/
	if(isset($_FILES['fupload_kk'])){
		$errors = array();
	/*--------------------------------------------------------------------------*/
		$lokasi_file = $_FILES['fupload_kk']['tmp_name'];
		$tipe_file = $_FILES['fupload_kk']['type'];
		$nama_file = $_FILES['fupload_kk']['name'];
		
		/*--------------- script cegah upload file shell.php via *.jpg --------------
		setiap file gambar atau foto memiliki size.
		deklarasi var untuk size gambar/foto.
		----------------------------------------------------------------------------*/
		$file_size      = $_FILES['fupload_kk']['size'];
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
				echo "<script>window.alert('Upload dokumen kartu keluarga gagal, pastikan file yang di upload bertipe *.JPG, *.PNG, *.GIF');
					</script>";
				echo "<meta http-equiv='refresh' content='0;url=?page=unggah'>";
				exit;
			}
			/*----------------------------------------------------------------------------------*/
			
			else {

				/* versi PDO */
				$data_gbr = $conn->prepare("SELECT pic_dok_kk FROM dok_kk 
											WHERE id_dok_kk = :id_kk ");
				$data_gbr->bindParam(":id_kk", $_POST['id_kk']);
				$data_gbr->execute();
				$r = $data_gbr->fetch();
				@unlink('../cfg/dist/img_kk/'.$r['pic_dok_kk']);
				@unlink('../cfg/dist/img_kk/'.'small_'.$r['pic_dok_kk']);
			
				/*------------------ script cegah upload file shell.php via *.jpg ------------------*/
				if(empty($errors)==true){
				/*----------------------------------------------------------------------------------*/
		
					UploadKk($nama_file_unik);
					try{
						$sql = $conn->prepare("UPDATE dok_kk SET pic_dok_kk = '$nama_file_unik' 
											   WHERE id_dok_kk = :idkk ");	
						$sql->bindParam(":idkk", $_POST['id_kk']);
						$sql->execute();
										
						echo "<script>alert('Data dokumen kartu keluarga telah diupdate.');</script>";
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