<?php
	session_start();
	
	if ($_SESSION['usernm']){
		unset($_SESSION['usernm']);
		echo "<script>alert('Anda kembali ke halaman login.'); window.location = 'login'</script>";
		exit;
	}
?>