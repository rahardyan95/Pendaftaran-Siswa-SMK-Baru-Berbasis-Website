<?php
if(empty($_SESSION['noreg'])) {
	echo "<script>alert('Akses ditolak! Silahkan login dengan username dan password Anda untuk dapat mengakses halaman calon siswa.');</script>";
	echo "<meta http-equiv='refresh' content='0;url=sign-in.html'>";
	exit;
}
?>