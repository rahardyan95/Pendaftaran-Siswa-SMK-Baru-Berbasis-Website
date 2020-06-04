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
	
	$aktif_kmpt = $_POST['aktif'];

	if (trim($kode)=="" or ! is_numeric(trim($kode))) {
		echo "<script>alert('Kode kompetensi hanya dapat di isi oleh angka.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=vwkmpt'>";
		exit;
	}
	else{
		/* versi PDO */
		try{
			$sql = $conn->prepare("UPDATE kompetensi SET id_kompetensi = '$kode',
										bid_kompetensi = '$kompetensi',
	                                  	aktif_kompetensi = '$aktif_kmpt',
	                                  	kuota = '$kuota'
                                      	WHERE id_kompetensi = :id_kompetensi ");
			$sql->bindParam(":id_kompetensi", $_POST['tid']);
			$sql->execute();
	
			echo "<script>alert('Data kompetensi telah di update.');</script>";
			echo "<meta http-equiv='refresh' content='0;url=?page=vwkmpt'>";
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
?>