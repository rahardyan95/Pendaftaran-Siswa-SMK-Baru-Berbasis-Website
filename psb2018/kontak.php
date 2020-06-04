<?php
	include "conf/koneksi.php";

	/* versi PDO */
	$sql = $conn->prepare("SELECT * FROM identitas_web LIMIT 1");
	$sql->execute();
	$r = $sql->fetch();

	echo "<div class='well'>";
		echo "
		<center>
			<h1>$r[nm_sekolah]</h1>
			<h3>$r[alamat_sekolah]</h3><br>
			<img src='img/phone.png' width='75' height='75'><p>$r[tlp_sekolah]</p>
			<img src='img/email.png' width='75' height='75'><p>$r[email_sekolah]</p>
		</center>";
	echo "</div>";
?>