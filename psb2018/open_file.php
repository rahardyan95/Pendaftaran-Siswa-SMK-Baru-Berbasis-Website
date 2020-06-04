<?php
$pg = isset($_GET['page']) ? $_GET['page'] : ' ' ;
switch ($pg) {

	/*--main--*/
	case 'home':
	if(!file_exists ("main.php"))die("File main tidak tersedia.");
	include ("main.php");
	break;

	/*-----------------------------------------------------------------------------------*/

	/*--cara pendaftaran--*/
	case 'cara-daftar':
	if(!file_exists ("cara_daftar.php"))die("File cara pendaftaran tidak tersedia.");
	include ("cara_daftar.php");
	break;

	/*-----------------------------------------------------------------------------------*/

	/*--tentang kami--*/
	case 'tentang-kami':
	if(!file_exists ("tentang_kami.php"))die("File tentang kami tidak tersedia.");
	include ("tentang_kami.php");
	break;

	/*-----------------------------------------------------------------------------------*/

	/*--registrasi siswa--*/
	case 'registrasi-siswa':
	if(!file_exists ("registrasi_siswa.php"))die("File registrasi siswa tidak tersedia.");
	include ("registrasi_siswa.php");
	break;

	/*-----------------------------------------------------------------------------------*/

	/*--aksi registrasi siswa--*/
	case 'aksi-registrasi':
	if(!file_exists ("aksi_regsis.php"))die("File aksi registrasi siswa tidak tersedia.");
	include ("aksi_regsis.php");
	break;

	/*-----------------------------------------------------------------------------------*/

	/*--daftar siswa didik baru lolos verifikasi--*/
	case 'daftar-casis-lolos-ver':
	if(!file_exists ("daftar_siswa.php"))die("File daftar siswa didik baru tidak tersedia.");
	include ("daftar_siswa.php");
	break;

	/*-----------------------------------------------------------------------------------*/

	/*--daftar siswa didik baru lulus ujian--*/
	case 'daftar-casis-lulus-ujian':
	if(!file_exists ("pdb.php"))die("File daftar siswa baru lulus ujian tidak tersedia.");
	include ("pdb.php");
	break;

	/*-----------------------------------------------------------------------------------*/

	/*-- kontak --*/
	case 'kontak':
	if(!file_exists ("kontak.php"))die("File kontak tidak tersedia.");
	include ("kontak.php");
	break;
}
?>