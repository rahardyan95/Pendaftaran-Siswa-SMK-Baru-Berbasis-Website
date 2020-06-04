<?php
	include "../../conf/koneksi.php";
	
	$kode = $_GET['code'];
	
	/* versi PDO */
	$aktivasi = 'N';
	$sql = $conn->prepare("SELECT * FROM admin 
							WHERE kd_aktivasi_admin = :kode 
							AND aktivasi_admin = :aktivasi ");
	$sql->bindParam(":kode", $kode);
	$sql->bindParam(":aktivasi", $aktivasi);
	$sql->execute();
	$data_exists = ($sql->fetchColumn() > 0) ? true : false;

	if($data_exists){

		try{
			$sqlUp = $conn->prepare("UPDATE admin SET aktivasi_admin = 'Y' 
									WHERE kd_aktivasi_admin = :kd ");
			$sqlUp->bindParam(":kd", $kode);
			$sqlUp->execute();

			echo "<script>alert('Akun pengguna sistem telah aktif.');</script>";
			echo "<meta http-equiv='refresh' content='0;url=login'>";
			exit();
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	} else {
		echo "<script>alert('Anda sudah melakukan aktivasi pengguna sistem.');window.location='login';</script>";
	}
	$conn = null;
?>