<?php
	error_reporting(0);
	include "../../conf/koneksi.php";
	include "../../conf/library.php";
	include "../../lib/inc.session.php";
	
	//------ANTI XSS & SQL INJECTION-------//
  	function antiinjection($data){
  		$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  		return $filter_sql;
	}

	$mapel = antiinjection($_POST['mapel']);
	//------ANTI XSS & SQL INJECTION-------//

	/*------------------------------NOMOR OTOMATIS---------------------------------------*/
	$kd = "MPL";

	// baca current date
	$today = date("ym");
	
	// baca siswa dari nama siswa
	$mpl = $mapel;

	// cari id mapel yang berawalan tanggal hari ini
	/* versi PDO */
	$sql = $conn->prepare("SELECT max(id_mapel) AS last FROM mapel 
							WHERE id_mapel LIKE '$kd%' AND '$today%'");
	$sql->execute();
	$data = $sql->fetch();

	$lastMpl = $data['last'];

	// baca nomor urut mapel dari idmapel terakhir
	$lastMplId = substr($lastMpl, 8, 2);

	// nomor urut mapel ditambah 1
	$nextMplNo = $lastMplId + 1;

	// membuat format nomor urut mapel berikutnya
	$nextMapel = $kd.$today.sprintf('%02s', $nextMplNo);
	/*----------------------------------NOMOR OTOMATIS-----------------------------------------*/
	/* versi PDO */
	$cek_mapel = $conn->prepare("SELECT mapel FROM mapel
								WHERE mapel = :mpl ");
	$cek_mapel->bindParam(":mpl", $mapel);
	$cek_mapel->execute();
	/* referensi: http://stackoverflow.com/questions/11305230/alternative-for-mysql-num-rows-using-pdo */
	$num_rows = $cek_mapel->fetchColumn();

	if($num_rows){
		echo" <script>alert('Mata pelajaran sudah digunakan. Silahkan gunakan mata pelajaran yang lain.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=admapel'>";
		exit;
	}

	else{
		/* versi PDO */
		try{
			$sql = $conn->prepare("INSERT INTO mapel (id_mapel, mapel)
                                 VALUES('$nextMapel','$mapel')");
			$sql->execute();

			echo "<script>alert('Data mata pelajaran telah tersimpan.');</script>";
			echo "<meta http-equiv='refresh' content='0;url=?page=vwmapel'>";
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
?>