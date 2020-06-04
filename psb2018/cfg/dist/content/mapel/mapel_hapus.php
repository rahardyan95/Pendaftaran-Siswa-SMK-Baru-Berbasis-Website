<?php
	include "../../conf/koneksi.php";
	include "../../lib/inc.session.php";
	
	/* versi PDO */
	try{
		$sql = $conn->prepare("DELETE FROM mapel 
								WHERE id_mapel = :id_mapel ");
		$sql->bindParam(":id_mapel", $_GET['tid']);
		$sql->execute();
	
		echo "<script>alert('Data mata pelajaran telah terhapus.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=vwmapel'>";
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
?>