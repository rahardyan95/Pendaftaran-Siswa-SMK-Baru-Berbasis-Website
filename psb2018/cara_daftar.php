<?php
	include "conf/koneksi.php";

	/* versi PDO */
	$sql = $conn->prepare("SELECT * FROM cara_daftar LIMIT 1");
	$sql->execute();
	while ($r = $sql->fetch()){

		echo "<div class='well'>";
			echo "<p>$r[deskripsi_caradft]</p><br>";
		echo "</div>";

		if ($r['pic_caradft']!=''){		
			echo "<p align = center><img class='img-responsive' src='cfg/dist/img_caradft/$r[pic_caradft]' oncontextmenu='return false;'></p>";
		} else {
			echo "<p align = center><img class='img-responsive' src='cfg/dist/img_caradft/image_not_available.jpg' oncontextmenu='return false;'></p>";
		}
	}	
?>