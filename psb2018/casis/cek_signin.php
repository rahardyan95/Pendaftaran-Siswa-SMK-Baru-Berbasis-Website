<?php
include ('../conf/koneksi.php');

// ANTI XSS & SQL INJECTION 
function antiinjection($data){
	$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	return $filter_sql;
}

$noreg = antiinjection($_POST['noreg']);
$pass = antiinjection($_POST['passwd']);
// ANTI XSS & SQL INJECTION

/* versi PDO */
$aktivasi = 'Y';
$sql = $conn->prepare("SELECT * FROM psb
						WHERE no_reg = :noreg
						AND password = :pass
						AND status_aktivasi = :aktivasi");
$sql->bindParam(":noreg", $noreg);
$sql->bindParam(":pass", $pass);
$sql->bindParam(":aktivasi", $aktivasi);
$sql->execute();
$r = $sql->fetch();

if ($r['no_reg']==$noreg AND $r['password']==$pass AND $r['status_aktivasi']=='Y')
{
	session_start();
	$_SESSION['noreg']=$r['no_reg'];
	$_SESSION['pswd']=$r['password'];

	echo "<script>alert('Login berhasil, silahkan lengkapi data siswa dan data nilai.');window.location = 'media.php?page=home'</script>";
}
else
{
	echo"<script('Akses ditolak. Anda tidak memiliki hak untuk mengakses halaman calon siswa.');window.location = 'sign-in.html'</script>";
}
?>