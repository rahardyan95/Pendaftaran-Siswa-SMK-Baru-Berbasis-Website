<?php
	include "../../conf/koneksi.php";
	include "../../conf/library.php";
	include "../../lib/inc.session.php";

	//------ANTI XSS & SQL INJECTION-------//
  	function antiinjection($data){
  		$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  		return $filter_sql;
	}

	$mapel   = antiinjection($_POST['mapel']);
	//------ANTI XSS & SQL INJECTION-------//
	
	$aktif_mpl = $_POST['aktif'];
	
		/* versi PDO */
		try{
			$sql = $conn->prepare("UPDATE mapel SET mapel = '$mapel',
	                                  aktif_mapel = '$aktif_mpl'
                                      WHERE id_mapel = :id_mapel ");
			$sql->bindParam(":id_mapel", $_POST['tid']);
			$sql->execute();
	
			echo "<script>alert('Data mata pelajaran telah di update.');</script>";
			echo "<meta http-equiv='refresh' content='0;url=?page=vwmapel'>";
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
?>