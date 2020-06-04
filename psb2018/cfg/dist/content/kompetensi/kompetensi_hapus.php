<?php
	include "../../conf/koneksi.php";
	include "../../lib/inc.session.php";
	
	/* versi PDO */
	try{
		$sql = $conn->prepare("DELETE FROM kompetensi 
								WHERE id_kompetensi = :id_kompetensi ");
		$sql->bindParam(":id_kompetensi", $_GET['tid']);
		$sql->execute();
	
		echo "<script>alert('Data kompetensi telah terhapus.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=vwkmpt'>";
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
?>