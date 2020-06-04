<?php
if(empty($_SESSION['usernm'])) {
	echo "<script>alert('Maaf akses pengguna ditolak!');</script>";
	echo "<meta http-equiv='refresh' content='0;url=login'>";
	exit;
}
?>