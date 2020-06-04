<?php
	include "../../conf/koneksi.php";
	include "../../conf/library.php";
	include "../../conf/functionglobal.php";
	include "../../lib/inc.session.php";

	//------ANTI XSS & SQL INJECTION-------//
  	function antiinjection($data){
  		$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  		return $filter_sql;
	}

	$reservation = antiinjection($_POST['reservation']);
	$id = antiinjection($_POST['id']);
	//------ANTI XSS & SQL INJECTION-------//

	

	if (trim($reservation)=="") {
		echo "<script>alert('Tanggal harus di isi');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=vwconfig'>";
		exit;
	}
	else{
		/* versi PDO */
		try{

			if(!empty($id)){
				$sql = $conn->prepare("UPDATE data_config SET value = '$reservation'
	                                      	WHERE id = :id ");
				$sql->bindParam(":id", $_POST['id']);
				$sql->execute();
		
				echo "<script>alert('Data Config telah di simpan.');</script>";
				echo "<meta http-equiv='refresh' content='0;url=?page=vwconfig'>";

			}else{

				$sql = $conn->prepare("INSERT INTO data_config ( code,label,value,group_data)
                                 VALUES('reservation','reservation', '$reservation','dokumen')");
				$sql->execute();
											
				echo "<script>alert('Data Config telah di simpan.');</script>";
				echo "<meta http-equiv='refresh' content='0;url=?page=vwconfig'>";

			}
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
?>