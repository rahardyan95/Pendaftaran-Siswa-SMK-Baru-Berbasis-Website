<?php
	include "../../conf/koneksi.php";
	include "../../lib/inc.session.php";
	
		/* versi PDO */
		try{
			$query = $conn->prepare("UPDATE psb SET status_verifikasi = '$_POST[status_ver]'
									WHERE no_reg = :noreg ");
			$query->bindParam(":noreg", $_POST['noreg']);
			$query->execute();

			echo "<script>alert('Data penerimaan siswa baru telah di verifikasi.');</script>";
			echo "<meta http-equiv='refresh' content='0;url=?page=vwreg'>";
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
?>