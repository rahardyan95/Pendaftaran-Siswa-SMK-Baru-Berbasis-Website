<?php
  include "conf/koneksi.php";

  /* versi PDO */
  $sql = $conn->prepare("SELECT * FROM informasi LIMIT 1");
  $sql->execute();
  $r = $sql->fetch();
?>

<div class="jumbotron">
	<h1><?php echo $r['judul_info']; ?></h1>
	<p class="lead"><?php echo $r['deskripsi_info']; ?></p>
</div>