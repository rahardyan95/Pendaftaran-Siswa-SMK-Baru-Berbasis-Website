
<?php
	include "../../conf/koneksi.php";
	include "../../conf/library.php";
	include "../../lib/inc.session.php";
	
		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
			return $filter_sql;
		}

		$nm_web = antiinjection($_POST['nm_web']);
		$nm_skl = antiinjection($_POST['nm_skl']);
		$alamat = antiinjection($_POST['alamat_skl']);
		$kodepos = antiinjection($_POST['kodepos']);
		$tlp = antiinjection($_POST['tlp_skl']);
		$email = antiinjection($_POST['email_skl']);
		$url = antiinjection($_POST['url_skl']);
		$fb = antiinjection($_POST['fb_skl']);
		$twitter = antiinjection($_POST['twitter_skl']);
		$instagram = antiinjection($_POST['insta_skl']);
		$profil_web = antiinjection($_POST['profil_web']);
		/*--------------------------------------------------------------------------------------*/
		
		/*---------- validasi untuk email -------------*/
		$kar1 = strstr($email, "@");
		$kar2 = strstr($email, ".");
		/*---------------------------------------------*/
	
		//apabila ada gambar yang di upload
		if (empty($lokasi_file)){
					
			if (trim($kodepos)=="" or ! is_numeric(trim($kodepos))) {
				echo "<script>alert('Kode pos hanya dapat di isi oleh angka.');</script>";
				echo "<meta http-equiv='refresh' content='0;url=?page=cridweb'>";
				exit;
			}
			else
			if (!$kar1 or !$kar2) {
				echo "<script>alert('Format email yang Anda masukkan salah.');</script>";
				echo "<meta http-equiv='refresh' content='0;url=?page=cridweb'>";
				exit;
			}
			
			else {
			
				try{
					$query = $conn->prepare("UPDATE identitas_web SET nm_website = '$nm_web',
				                       nm_sekolah = '$nm_skl',
								       alamat_sekolah = '$alamat',
									   kode_pos = '$kodepos',
									   tlp_sekolah = '$tlp',
                                       email_sekolah = '$email',
									   url = '$url',
									   facebook = '$fb',
									   twitter = '$twitter',
                                       instagram = '$instagram',
                                       profil_web = '$profil_web'
							     WHERE id_identitas = :id ");
					$query->bindParam(":id", $_POST['tid']);
					$query->execute();
								 
					echo "<script>alert('Identitas website telah di update.');</script>";
					echo "<meta http-equiv='refresh' content='0;url=?page=cridweb'>";
				}
				catch(PDOException $e){
					echo $e->getMessage();
				}
			}
		}
?>