<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.sis.php";

	$idmpl = $_POST['mapel'];

	try{
		$sql = "INSERT INTO nilai_raport (no_reg,
			                              id_mapel)
			                        VALUES ('$_SESSION[noreg]',
			                                '$idmpl')";
		$stmt = $conn->prepare($sql);
		$stmt->execute();

		echo "<script>alert('Data mata pelajaran telah tersimpan.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=nilai-raport'>";
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
?>