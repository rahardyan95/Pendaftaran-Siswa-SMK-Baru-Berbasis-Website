<?php
	$host = "localhost";
	$username = "root";
	$passwd = "";

	try{
		$conn = new PDO("mysql:host=$host;dbname=dbpsb", $username, $passwd);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
	}
?>
