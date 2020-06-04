<?php
	session_start();
	
	if ($_SESSION['noreg']){
		unset($_SESSION['noreg']);
		echo "<script>alert('Anda kembali ke halaman sign in.'); window.location = 'sign-in.html'</script>";
		exit;
	}
?>