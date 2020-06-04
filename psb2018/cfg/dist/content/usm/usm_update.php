<?php
	//error_reporting(0);
	include "../../conf/koneksi.php";
	include "../../lib/inc.session.php";

	//------ANTI XSS & SQL INJECTION-------//
  	function antiinjection($data){
  		$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  		return $filter_sql;
	}

	$noreg = antiinjection($_POST['noreg']);
	$noujian = antiinjection($_POST['noujian']);
	$waktu = antiinjection($_POST['waktu']);
	$rujian = antiinjection($_POST['rujian']);
	$hslujian = antiinjection($_POST['hslujian']);
	//------ANTI XSS & SQL INJECTION-------//
		
	if($_POST['hslujian'] == 0){
		$ket = "Belum";
	}
	else
	if($_POST['hslujian'] >= 75){
		$ket = "Lulus";
	}
	else
		$ket = "Tidak";

	/*------------------------ untuk kebutuhan NIS baru ------------------------*/
	/*------------------------------NOMOR OTOMATIS---------------------------------------*/
	/* versi PDO */
	$sql = $conn->prepare("SELECT * FROM kompetensi");
	$sql->execute();
	$k = $sql->fetch();

	$kode = $k['id_kompetensi'];

	// baca current date
	$today = date("y");

	// baca nis dari noreg
	$noreg = $noreg;

	// cari nis yang berawalan tanggal hari ini
	/* versi PDO */
	$query = $conn->prepare("SELECT max(nis) AS last FROM psb 
							WHERE nis LIKE '$kode%' AND '$today%'");
	$query->execute();
	$data = $query->fetch();

	$lastNIS = $data['last'];

	// baca nis dari no ujian terakhir
	$lastNo = substr($lastNIS, 5, 4);

	// nis ditambah 1
	$nextNIS = $lastNo + 1;

	// membuat format nomor urut NIS berikutnya
	$nextNo = $kode.$today.sprintf('%04s', $nextNIS);
	/*----------------------------------NOMOR OTOMATIS-----------------------------------------*/
	/*-----------------------------------------------------------------------------------------*/

	/* versi PDO */
	try{
		$sqlIns = $conn->prepare("UPDATE ujian_masuk SET jam_ujian = '$waktu',
										ruang_ujian = '$rujian',
										hasil_ujian = '$hslujian',
										ket_ujian = '$ket'
									WHERE no_ujian = :noujian ");
		$sqlIns->bindParam(":noujian", $noujian);
		$sqlIns->execute();
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}

	if($ket == 'Lulus'){
		/* versi PDO */
		try{
			$sql = $conn->prepare("UPDATE psb SET nis = :nis 
									WHERE no_reg = :noreg ");
			$sql->bindParam(":nis", $nextNo);
			$sql->bindParam(":noreg", $noreg);
			$sql->execute();
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	else{
		/*----------------------------------------------------------------------------- 
		update nis menjadi 0 (nis dihapus kembali) apabila terjadi perubahan dalam 
		penginputan nilai dimana nilai yg diinputkan kembali lebih kecil dari standar 
		nilai lulus.
		-----------------------------------------------------------------------------*/
		/* versi PDO */
		try{
			$sql = $conn->prepare("UPDATE psb SET nis = '0'
									WHERE no_reg = :noreg ");
			$sql->bindParam(":noreg", $noreg);
			$sql->execute();
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	echo "<script>alert('Data ujian saringan masuk siswa baru telah di update.');</script>";
	echo "<meta http-equiv='refresh' content='0;url=?page=vwusm'>";
?>