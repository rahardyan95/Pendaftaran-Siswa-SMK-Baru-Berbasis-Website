<?php
	include "../conf/koneksi.php";
	include "../conf/library.php";
	include "../conf/fungsi_thumb.php";
	include "../lib/inc.session.sis.php";

	/*--------------- script cegah upload file shell.php via *.jpg -------------*/
	if(isset($_FILES['fupload_ft'])){
		$errors = array();
	/*--------------------------------------------------------------------------*/
		$noreg = $_SESSION['noreg'];

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
				echo "<meta http-equiv='refresh' content='0;url=?page=adft'>";
				exit;
			}
			/*----------------------------------------------------------------------------------*/
			
			else {
			
				/*------------------ script cegah upload file shell.php via *.jpg ------------------*/
				if(empty($errors)==true){
				/*----------------------------------------------------------------------------------*/
		
					UploadFt($nama_file_unik);
					try{
						$sql = "INSERT INTO dok_foto (no_reg, 
						               tgl_up_foto,
		                               pic_foto)
                                 VALUES('$noreg',
										'$tgl_sekarang',
                                        '$nama_file_unik')";

                        $stmt = $conn->prepare($sql);
                        $stmt->execute();	
										
						echo "<script>alert('Data dokumen foto telah tersimpan.');</script>";
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