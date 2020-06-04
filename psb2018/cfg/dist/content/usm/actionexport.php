<?php
/* sumber referensi -> https://gist.github.com/navitronic/2047649 */
ob_start();
error_reporting(0);

include "conf/koneksi.php";

try{
	$tablename = 'ujian_masuk';

	$sql = 'SHOW COLUMNS FROM '.$tablename.'';
		
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		array_push($fields, $row['Fields']);
	}
		
	array_push($csv, $fields);
	$sql = 'SELECT * FROM '.$tablename.'';
	
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	
	$csv = array();
	
	while($row = $stmt->fetch(PDO::FETCH_NUM))
	{
		array_push($csv, $row);
	}
	
	$fp = fopen('data/file' .date("DdMY"). "-" .time().'.csv', 'w');
	
	foreach ($csv as $row) {
		fputcsv($fp, $row);
	}
	
	fclose($fp);
	header("Content-type: application/csv");
	header("Content-Disposition: attachment; filename=exportUSM.csv");
	header("Pragma: no-cache");
	header("Expires: 0");
	readfile('data/file' .date("DdMY"). "-" .time().'.csv', 'w');
	$conn = null;
} catch(PDOException $e) {
	echo $e->getMessage();
}
?>