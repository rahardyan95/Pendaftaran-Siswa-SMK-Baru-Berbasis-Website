<?php
	include "../../conf/koneksi.php";
	include "../../lib/inc.session.php";
	
	/* versi PDO */
	try{
		$sql = $conn->prepare("DELETE FROM ujian_masuk 
								WHERE no_ujian = :no_ujian ");
		$sql->bindParam(":no_ujian", $_GET['tid']);
		$sql->execute();
	
		echo "<script>alert('Data ujian saringan masuk telah terhapus.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=vwusm'>";
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
?>