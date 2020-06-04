<?php
	include "../../conf/koneksi.php";
	include "../../conf/library.php";
	include "../../lib/inc.session.php";
	
	//------ANTI XSS & SQL INJECTION-------//
  	function antiinjection($data){
  		$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  		return $filter_sql;
	}

	$kode = antiinjection($_POST['kode']);
	$kompetensi = antiinjection($_POST['kompetensi']);
	$kuota = antiinjection($_POST['kuota']);
	//------ANTI XSS & SQL INJECTION-------//
	
	/* versi PDO */
	$cek_kmpt = $conn->prepare("SELECT id_kompetensi, bid_kompetensi FROM kompetensi
										   WHERE id_kompetensi = :id_kompetensi
										   OR bid_kompetensi = :bid ");
	$cek_kmpt->bindParam(":id_kompetensi", $kode);
	$cek_kmpt->bindParam(":bid", $kompetensi);
	$cek_kmpt->execute();
	/* referensi: http://stackoverflow.com/questions/11305230/alternative-for-mysql-num-rows-using-pdo */
	$data_exists = ($cek_kmpt->fetchColumn() > 0) ? true : false;

	if($data_exists){
		echo" <script>alert('Kode atau bidang kompetensi sudah digunakan. Silahkan gunakan kode atau bidang kompetensi yang lain.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=adkmpt'>";
		exit;
	}
	else
	if (trim($kode)=="" or ! is_numeric(trim($kode))) {
		echo "<script>alert('Kode kompetensi hanya dapat di isi oleh angka.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=adkmpt'>";
		exit;
	}

	else{
		/* versi PDO */
		try{
			$sql = $conn->prepare("INSERT INTO kompetensi (id_kompetensi, bid_kompetensi, kuota)
                                 VALUES('$kode', '$kompetensi','$kuota')");
			$sql->execute();
										
			echo "<script>alert('Data kompetensi telah tersimpan.');</script>";
			echo "<meta http-equiv='refresh' content='0;url=?page=vwkmpt'>";
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
?>