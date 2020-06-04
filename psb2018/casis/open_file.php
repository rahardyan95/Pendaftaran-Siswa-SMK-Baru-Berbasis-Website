<?php
	$pg = isset($_GET['page']) ? $_GET['page'] : '' ; /*-- PHP 5 --*/
	switch ($pg) {

		/*-- dashboard --*/
		case 'home':
			if(!file_exists ("dashboard.php"))die("File dashboard tidak tersedia.");
			include ("dashboard.php");
			break;

		/*-----------------------------------------------------------------------------------*/

		/*-- sign in calon siswa --*/
		case 'sign-in':
			if(!file_exists ("sign_in.php"))die("File sign in calon siswa tidak tersedia.");
			include ("sign_in.php");
			break;

		/*-----------------------------------------------------------------------------------*/

		/*-- cek sign in calon siswa --*/
		case 'cek-signin':
			if(!file_exists ("cek_signin.php"))die("File cek sign in calon siswa tidak tersedia.");
			include ("cek_signin.php");
			break;

		/*-----------------------------------------------------------------------------------*/

		/*-- sign out --*/
		case 'sign-out':
			if(!file_exists ("sign_out.php"))die("File sign out tidak tersedia.");
			include ("sign_out.php");
			break;

		/*-----------------------------------------------------------------------------------*/

		/*-- profil siswa --*/
		case 'pfsis':
			if(!file_exists ("pages/profil_sis/profil_siswa.php"))die("File profil siswa tidak tersedia.");
			include ("pages/profil_sis/profil_siswa.php");
			break;

		/*-- detail profil siswa --*/
		case 'dtsis':
			if(!file_exists ("pages/profil_sis/detail_siswa.php"))die("File detail siswa tidak tersedia.");
			include ("pages/profil_sis/detail_siswa.php");
			break;

		/*-- update profil siswa --*/
		case 'upsis':
			if(!file_exists ("pages/profil_sis/profil_update.php"))die("File profil update siswa tidak tersedia.");
			include ("pages/profil_sis/profil_update.php");
			break;

		/*-----------------------------------------------------------------------------------*/

		/*-- unggah --*/
		case 'unggah':
			if(!file_exists ("pages/unggah/unggah_dok.php"))die("File unggah dokumen tidak tersedia.");
			include ("pages/unggah/unggah_dok.php");
			break;

		/*-----------------------------------------------------------------------------------*/

		/*-- unggah kk --*/
		case 'adkk':
			if(!file_exists ("pages/unggah/unggah_kk.php"))die("File unggah dokumen kartu keluarga tidak tersedia.");
			include ("pages/unggah/unggah_kk.php");
			break;

		/*-- simpan kk --*/
		case 'svkk':
			if(!file_exists ("pages/unggah/save_kk.php"))die("File simpan dokumen kartu keluarga tidak tersedia.");
			include ("pages/unggah/save_kk.php");
			break;

		/*-- ubah kk --*/
		case 'edkk':
			if(!file_exists ("pages/unggah/ubah_kk.php"))die("File ubah dokumen kartu keluarga tidak tersedia.");
			include ("pages/unggah/ubah_kk.php");
			break;

		/*-- update kk --*/
		case 'upkk':
			if(!file_exists ("pages/unggah/update_kk.php"))die("File update dokumen kartu keluarga tidak tersedia.");
			include ("pages/unggah/update_kk.php");
			break;

		/*-----------------------------------------------------------------------------------*/

		/*-- unggah ijazah --*/
		case 'adiz':
			if(!file_exists ("pages/unggah/unggah_ijazah.php"))die("File unggah dokumen ijazah tidak tersedia.");
			include ("pages/unggah/unggah_ijazah.php");
			break;

		/*-- simpan ijazah --*/
		case 'sviz':
			if(!file_exists ("pages/unggah/save_ijazah.php"))die("File simpan dokumen ijazah tidak tersedia.");
			include ("pages/unggah/save_ijazah.php");
			break;

		/*-- ubah ijazah --*/
		case 'ediz':
			if(!file_exists ("pages/unggah/ubah_ijazah.php"))die("File ubah dokumen ijazah tidak tersedia.");
			include ("pages/unggah/ubah_ijazah.php");
			break;

		/*-- update ijazah --*/
		case 'upiz':
			if(!file_exists ("pages/unggah/update_ijazah.php"))die("File update dokumen ijazah tidak tersedia.");
			include ("pages/unggah/update_ijazah.php");
			break;

		/*-----------------------------------------------------------------------------------*/

		/*-- unggah foto --*/
		case 'adft':
			if(!file_exists ("pages/unggah/unggah_foto.php"))die("File unggah dokumen foto tidak tersedia.");
			include ("pages/unggah/unggah_foto.php");
			break;

		/*-- simpan foto --*/
		case 'svft':
			if(!file_exists ("pages/unggah/save_foto.php"))die("File simpan foto tidak tersedia.");
			include ("pages/unggah/save_foto.php");
			break;

		/*-- ubah foto --*/
		case 'edft':
			if(!file_exists ("pages/unggah/ubah_foto.php"))die("File ubah dokumen foto tidak tersedia.");
			include ("pages/unggah/ubah_foto.php");
			break;

		/*-- update foto --*/
		case 'upft':
			if(!file_exists ("pages/unggah/update_foto.php"))die("File update dokumen foto tidak tersedia.");
			include ("pages/unggah/update_foto.php");
			break;

		/*-----------------------------------------------------------------------------------*/
	
		case 'nilai-raport':
			if(!file_exists ("pages/nilai/nilai_siswa.php"))die("File data nilai siswa tidak tersedia.");
			include ("pages/nilai/nilai_siswa.php");
			break;

		case 'svnil':
			if(!file_exists ("pages/nilai/nilai_simpan.php"))die("File simpan nilai siswa tidak tersedia.");
			include ("pages/nilai/nilai_simpan.php");
			break;

		/*-----------------------------------------------------------------------------------*/

		/*-- ujian tampil --*/
		case 'ujian':
			if(!file_exists ("pages/ujian/ujian_tampil.php"))die("File tampil data ujian tidak tersedia.");
			include ("pages/ujian/ujian_tampil.php");
			break;

		/*-----------------------------------------------------------------------------------*/

		/*-- tambah mapel --*/
		case 'mapel':
			if(!file_exists ("pages/mapel/tambah_mapel.php"))die("File tambah mata pelajaran tidak tersedia.");
			include ("pages/mapel/tambah_mapel.php");
			break;

		/*-- simpan mapel --*/
		case 'svmapel':
			if(!file_exists ("pages/mapel/simpan_mapel.php"))die("File simpan mata pelajaran tidak tersedia.");
			include ("pages/mapel/simpan_mapel.php");
			break;

		/*-----------------------------------------------------------------------------------*/

		/*-- cetak biodata --*/
		case 'cetak-biodata':
			if(!file_exists ("pages/profil_sis/f_biodata.php"))die("File cetak biodata tidak tersedia.");
			include ("pages/profil_sis/f_biodata.php");
			break;
	}
?>