<?php
	include "conf/koneksi.php";

	/* versi PDO */
	$sql = $conn->prepare("SELECT * FROM identitas_web LIMIT 1");
	$sql->execute();
	$r = $sql->fetch();

	echo "<div class='well'>";
			echo "<p>$r[profil_web]</p><br>";
		echo "</div>";
?>