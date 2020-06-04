<?php
include "../../conf/koneksi.php";
include "../../conf/library.php";

//------ANTI XSS & SQL INJECTION-------//
function antiinjection($data){
	$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  	return $filter_sql;
}

$pengguna = antiinjection($_POST['pengguna']);
$passwd = md5(antiinjection($_POST['passwd']));
//------ANTI XSS & SQL INJECTION-------//

/* versi PDO */
$aktivasi = 'Y';
$aktif = 'Y';
$sql = $conn->prepare("SELECT * FROM admin 
				WHERE username = :pengguna 
				AND password = :passwd
				AND aktivasi_admin = :aktivasi 
				AND aktif_admin = :aktif ");
$sql->bindParam(":pengguna", $pengguna);
$sql->bindParam(":passwd", $passwd);
$sql->bindParam(":aktivasi", $aktivasi);
$sql->bindParam(":aktif", $aktif);
$sql->execute();
$r = $sql->fetch();

if ($r['username']==$pengguna AND $r['password']==$passwd AND $r['aktivasi_admin']=='Y' )
{
	session_start();
	$_SESSION['usernm']=$r['username'];
	$_SESSION['pass']=$r['password'];
	$_SESSION['stat_admin']=$r['status_admin'];

	/* versi PDO */
	$query = $conn->prepare("UPDATE admin SET dt_last_akses = '$tgl_sekarang',
	                              tm_last_akses = '$jam_sekarang'
	                              WHERE username = :pengguna ");
	$query->bindParam(":pengguna", $pengguna);
	$query->execute();

	echo "<script>alert('Login pengguna berhasil.');window.location = 'media.php?page=dashboard'</script>";	
}
else
{
  echo "<script>alert('Maaf! Akses pengguna ditolak.');window.location = 'login'</script>";
}
?>