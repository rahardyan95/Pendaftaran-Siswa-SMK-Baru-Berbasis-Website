<?php
	include "conf/koneksi.php";
	
	$kode = $_GET['code'];
	
	/* versi PDO */
	$status = 'N';
	$sql = $conn->prepare("SELECT * FROM psb
							WHERE kode_aktivasi = :kode
							AND status_aktivasi = :status ");
	$sql->bindParam(":kode", $kode);
	$sql->bindParam(":status", $status);
	$sql->execute();
	$data_exists = ($sql->fetchColumn() != null) ? true : false;

	if($data_exists){

		try{
			$query = $conn->prepare("UPDATE psb SET status_aktivasi = 'Y'
									WHERE kode_aktivasi = :kd ");
			$query->bindParam(":kd", $kode);
			$query->execute();		

			echo "<script>alert('Akun calon siswa anda telah aktif. Silahkan login untuk melengkapi data siswa dan nilai.');</script>";
			echo "<meta http-equiv='refresh' content='0;url=casis/sign-in.html'>";
			exit();
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	} else {
		echo "<script>alert('Anda sudah melakukan aktivasi calon siswa.');window.location='home';</script>";
	}
	$conn = null;
?>