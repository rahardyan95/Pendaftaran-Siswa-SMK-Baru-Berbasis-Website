<?php
	$pg = isset($_GET['page']) ? $_GET['page'] : '' ; /*-- PHP 5 --*/
	switch ($pg) {
		/*-- dashboard --*/
		case 'dashboard' :
			if(!file_exists ("../dist/dashboard.php"))die("File dashboard tidak tersedia.");
			include ("../dist/dashboard.php");
			break;

		/*--------------------------------------------------------------------------------------------------------*/
		
		/*-- cara daftar --*/
		case 'crdft' :
			if(!file_exists ("../dist/content/cara_daftar/cara_daftar.php"))die("File cara daftar tidak tersedia.");
			include ("../dist/content/cara_daftar/cara_daftar.php");
			break;	

		/*-- update cara daftar --*/
		case 'upcrdft' :
			if(!file_exists ("../dist/content/cara_daftar/update_caradft.php"))die("File update cara daftar tidak tersedia.");
			include ("../dist/content/cara_daftar/update_caradft.php");
			break;

		/*--------------------------------------------------------------------------------------------------------*/

		/*-- informasi --*/
		case 'crinfo' :
			if(!file_exists ("../dist/content/informasi/informasi.php"))die("File informasi tidak tersedia.");
			include ("../dist/content/informasi/informasi.php");
			break;	

		/*-- update informasi --*/
		case 'upcrinfo' :
			if(!file_exists ("../dist/content/informasi/update_informasi.php"))die("File update informasi tidak tersedia.");
			include ("../dist/content/informasi/update_informasi.php");
			break;

		/*--------------------------------------------------------------------------------------------------------*/
	
		/*-- identitas web --*/
		case 'cridweb' :
			if(!file_exists ("../dist/content/id_web/id_web.php"))die("File identitas website tidak tersedia.");
			include ("../dist/content/id_web/id_web.php");
			break;	

		/*-- update identitas web --*/
		case 'upcridweb' :
			if(!file_exists ("../dist/content/id_web/update_id.php"))die("File update identitas website tidak tersedia.");
			include ("../dist/content/id_web/update_id.php");
			break;

		/*--------------------------------------------------------------------------------------------------------*/
	
		/*-- penerimaan siswa baru --*/
		case 'vwreg' :
			if(!file_exists ("../dist/content/psb/penerimaan_tampil.php"))die("File tampil penerimaan siswa baru tidak tersedia.");
			include ("../dist/content/psb/penerimaan_tampil.php");
			break;	

		/*-- penerimaan siswa baru detail--*/
		case 'dtreg' :
			if(!file_exists ("../dist/content/psb/penerimaan_detail.php"))die("File detail penerimaan siswa baru tidak tersedia.");
			include ("../dist/content/psb/penerimaan_detail.php");
			break;

		/*-- penerimaan siswa baru update--*/
		case 'upreg' :
			if(!file_exists ("../dist/content/psb/penerimaan_update.php"))die("File update penerimaan siswa baru tidak tersedia.");
			include ("../dist/content/psb/penerimaan_update.php");
			break;

		/*--------------------------------------------------------------------------------------------------------*/

		/*-- tampil kompetensi --*/
		case 'vwkmpt' :
			if(!file_exists ("../dist/content/kompetensi/kompetensi_tampil.php"))die("File tampil data kompetensi tidak tersedia.");
			include ("../dist/content/kompetensi/kompetensi_tampil.php");
			break;

		/*-- tambah kompetensi --*/
		case 'adkmpt' :
			if(!file_exists ("../dist/content/kompetensi/kompetensi_tambah.php"))die("File tambah data kompetensi tidak tersedia.");
			include ("../dist/content/kompetensi/kompetensi_tambah.php");
			break;

		/*-- simpan kompetensi --*/
		case 'svkmpt' :
			if(!file_exists ("../dist/content/kompetensi/kompetensi_simpan.php"))die("File simpan data kompetensi tidak tersedia.");
			include ("../dist/content/kompetensi/kompetensi_simpan.php");
			break;

		/*-- edit kompetensi --*/
		case 'edkmpt' :
			if(!file_exists ("../dist/content/kompetensi/kompetensi_edit.php"))die("File edit data kompetensi tidak tersedia.");
			include ("../dist/content/kompetensi/kompetensi_edit.php");
			break;

		/*-- update kompetensi --*/
		case 'upkmpt' :
			if(!file_exists ("../dist/content/kompetensi/kompetensi_update.php"))die("File update data kompetensi tidak tersedia.");
			include ("../dist/content/kompetensi/kompetensi_update.php");
			break;

		/*-- hapus kompetensi --*/
		case 'dlkmpt' :
			if(!file_exists ("../dist/content/kompetensi/kompetensi_hapus.php"))die("File hapus data kompetensi tidak tersedia.");
			include ("../dist/content/kompetensi/kompetensi_hapus.php");
			break;

		/*--------------------------------------------------------------------------------------------------------*/

		/*-- tampil mapel --*/
		case 'vwmapel' :
			if(!file_exists ("../dist/content/mapel/mapel_tampil.php"))die("File tampil data mata pelajaran tidak tersedia.");
			include ("../dist/content/mapel/mapel_tampil.php");
			break;

		/*-- tambah mapel --*/
		case 'admapel' :
			if(!file_exists ("../dist/content/mapel/mapel_tambah.php"))die("File tambah data mata pelajaran tidak tersedia.");
			include ("../dist/content/mapel/mapel_tambah.php");
			break;

		/*-- simpan mapel --*/
		case 'svmapel' :
			if(!file_exists ("../dist/content/mapel/mapel_simpan.php"))die("File simpan data mata pelajaran tidak tersedia.");
			include ("../dist/content/mapel/mapel_simpan.php");
			break;

		/*-- edit mapel --*/
		case 'edmapel' :
			if(!file_exists ("../dist/content/mapel/mapel_edit.php"))die("File edit data mata pelajaran tidak tersedia.");
			include ("../dist/content/mapel/mapel_edit.php");
			break;

		/*-- update mapel --*/
		case 'upmapel' :
			if(!file_exists ("../dist/content/mapel/mapel_update.php"))die("File update data mata pelajaran tidak tersedia.");
			include ("../dist/content/mapel/mapel_update.php");
			break;

		/*-- hapus mapel --*/
		case 'dlmapel' :
			if(!file_exists ("../dist/content/mapel/mapel_hapus.php"))die("File hapus data mata pelajaran tidak tersedia.");
			include ("../dist/content/mapel/mapel_hapus.php");
			break;

		/*--------------------------------------------------------------------------------------------------------*/
	
		/*-- tampil ujian saringan masuk --*/
		case 'vwusm' :
			if(!file_exists ("../dist/content/usm/usm_tampil.php"))die("File tampil data ujian saringan masuk tidak tersedia.");
			include ("../dist/content/usm/usm_tampil.php");
			break;

		case 'dtusm' :
			if(!file_exists ("../dist/content/usm/usm_detail.php"))die("File detail data ujian saringan masuk tidak tersedia.");
			include ("../dist/content/usm/usm_detail.php");
			break;

		case 'upusm' :
			if(!file_exists ("../dist/content/usm/usm_update.php"))die("File update data ujian saringan masuk tidak tersedia.");
			include ("../dist/content/usm/usm_update.php");
			break;

		case 'dlusm' :
			if(!file_exists ("../dist/content/usm/usm_hapus.php"))die("File hapus data ujian saringan masuk tidak tersedia.");
			include ("../dist/content/usm/usm_hapus.php");
			break;

		/*--------------------------------------------------------------------------------------------------------*/
	
		/*-- tampil nilai raport --*/
		case 'vwnil' :
			if(!file_exists ("../dist/content/nilai/nilai_tampil.php"))die("File tampil data nilai raport calon siswa tidak tersedia.");
			include ("../dist/content/nilai/nilai_tampil.php");
			break;

		/*-- tampil detail nilai raport --*/
		case 'dtnil' :
			if(!file_exists ("../dist/content/nilai/nilai_detail.php"))die("File tampil detail data nilai raport calon siswa tidak tersedia.");
			include ("../dist/content/nilai/nilai_detail.php");
			break;

		/*--------------------------------------------------------------------------------------------------------*/
	
		/*-- tampil pengguna --*/
		case 'vwuser' :
			if(!file_exists ("../dist/content/pengguna/pengguna_tampil.php"))die("File tampil data pengguna tidak tersedia.");
			include ("../dist/content/pengguna/pengguna_tampil.php");
			break;

		/*-- edit pengguna --*/
		case 'eduser' :
			if(!file_exists ("../dist/content/pengguna/pengguna_edit.php"))die("File tampil ubah data pengguna tidak tersedia.");
			include ("../dist/content/pengguna/pengguna_edit.php");
			break;

		/*-- update pengguna --*/
		case 'upuser' :
			if(!file_exists ("../dist/content/pengguna/pengguna_update.php"))die("File update data pengguna tidak tersedia.");
			include ("../dist/content/pengguna/pengguna_update.php");
			break;

		/*--------------------------------------------------------------------------------------------------------*/
	
		/*-- tampil dokumen kk --*/
		case 'vwkk' :
			if(!file_exists ("../dist/content/dok/kk_tampil.php"))die("File tampil kelengkapan dokumen kartu keluarga tidak tersedia.");
			include ("../dist/content/dok/kk_tampil.php");
			break;

		/*-- detail dokumen kk --*/
		case 'dtkk' :
			if(!file_exists ("../dist/content/dok/kk_detail.php"))die("File detail kelengkapan dokumen kartu keluarga tidak tersedia.");
			include ("../dist/content/dok/kk_detail.php");
			break;

		/*-- tampil dokumen ijazah --*/
		case 'vwiz' :
			if(!file_exists ("../dist/content/dok/ijazah_tampil.php"))die("File tampil kelengkapan dokumen ijazah/SKHU/SKL tidak tersedia.");
			include ("../dist/content/dok/ijazah_tampil.php");
			break;

		/*-- detail dokumen ijazah --*/
		case 'dtiz' :
			if(!file_exists ("../dist/content/dok/ijazah_detail.php"))die("File detail kelengkapan dokumen ijazah/SKHU/SKL tidak tersedia.");
			include ("../dist/content/dok/ijazah_detail.php");
			break;

		/*-- tampil dokumen foto --*/
		case 'vwft' :
			if(!file_exists ("../dist/content/dok/foto_tampil.php"))die("File tampil kelengkapan dokumen foto tidak tersedia.");
			include ("../dist/content/dok/foto_tampil.php");
			break;

		/*-- detail dokumen foto --*/
		case 'dtft' :
			if(!file_exists ("../dist/content/dok/foto_detail.php"))die("File detail kelengkapan dokumen foto tidak tersedia.");
			include ("../dist/content/dok/foto_detail.php");
			break;


		/*-- detail view config --*/
		case 'vwconfig' :
			if(!file_exists ("../dist/content/dok/config_dokumen.php"))die("File tampil kelengkapan dokumen kartu keluarga tidak tersedia.");
			include ("../dist/content/dok/config_dokumen.php");
			break;
		/*--------------------------------------------------------------------------------------------------------*/

		/*-- save Konfig --*/
		case 'svconfig' :
			if(!file_exists ("../dist/content/dok/config_simpan.php"))die("File tampil kelengkapan dokumen kartu keluarga tidak tersedia.");
			include ("../dist/content/dok/config_simpan.php");
			break;
	
		/*-- tampil backup db --*/
		case 'bcdb' :
			if(!file_exists ("../dist/content/backupdb/index.php"))die("File index backup database tidak tersedia.");
			include ("../dist/content/backupdb/index.php");
			break;
	}
?>