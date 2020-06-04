<?php
	include "../conf/koneksi.php";
	include "../conf/library.php";
	include "../conf/fungsi_thumb.php";
	include "../lib/inc.session.sis.php";

	/*--------------- script cegah upload file shell.php via *.jpg -------------*/
	if(isset($_FILES['fupload_iz'])){
		$errors = array();
	/*--------------------------------------------------------------------------*/
		$lokasi_file = $_FILES['fupload_iz']['tmp_name'];
		$tipe_file = $_FILES['fupload_iz']['type'];
		$nama_file = $_FILES['fupload_iz']['name'];
		
		/*--------------- script cegah upload file shell.php via *.jpg --------------
		setiap file gambar atau foto memiliki size.
		deklarasi var untuk size gambar/foto.
		----------------------------------------------------------------------------*/
		$file_size      = $_FILES['fupload_iz']['size'];
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
				echo "<script>window.alert('Upload dokumen ijazah gagal, pastikan file yang di upload bertipe *.JPG, *.PNG, *.GIF');
					</script>";
				echo "<meta http-equiv='refresh' content='0;url=?page=unggah'>";
				exit;
			}
			/*----------------------------------------------------------------------------------*/
			
			else {

				/* versi PDO */
				$data_gbr = $conn->prepare("SELECT pic_dok_ijazah FROM dok_ijazah 
											WHERE id_dok_ijazah = :id_iz ");
				$data_gbr->bindParam(":id_iz", $_POST['id_iz']);
				$data_gbr->execute();
				$r = $data_gbr->fetch();
				@unlink('../cfg/dist/img_ijazah/'.$r['pic_dok_ijazah']);
				@unlink('../cfg/dist/img_ijazah/'.'small_'.$r['pic_dok_ijazah']);
			
				/*------------------ script cegah upload file shell.php via *.jpg ------------------*/
				if(empty($errors)==true){
				/*----------------------------------------------------------------------------------*/
		
					UploadIz($nama_file_unik);
					try{
						$sql = $conn->prepare("UPDATE dok_ijazah SET pic_dok_ijazah = '$nama_file_unik' 
											   WHERE id_dok_ijazah = :id_ijazah ");	
						$sql->bindParam(":id_ijazah", $_POST['id_iz']);
						$sql->execute();
										
						echo "<script>alert('Data dokumen ijazah telah diupdate.');</script>";
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