<?php
	include "../conf/koneksi.php";
	include "../conf/library.php";
	include "../lib/inc.session.sis.php";

	//------ANTI XSS & SQL INJECTION-------//
  	function antiinjection($data){
  		$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  		return $filter_sql;
	}

	$kompetensi = antiinjection($_POST['kompetensi']);
	$nisn = antiinjection($_POST['nisn']);
	$nm_siswa = antiinjection($_POST['nm_siswa']);
	$tmp_lahir = antiinjection($_POST['tmp_lahir']);
	$tgl_lahir = antiinjection($_POST['tgl_lahir']);
	$kelamin = antiinjection($_POST['kelamin']);
	$agama = antiinjection($_POST['agama']);
	$anak_ke = antiinjection($_POST['anak_ke']);
	$jml_saudara = antiinjection($_POST['jml_saudara']);
	$status_anak = antiinjection($_POST['status_anak']);
	$tinggi_bdn = antiinjection($_POST['tinggi_bdn']);
	$berat_bdn = antiinjection($_POST['berat_bdn']);
	$gol_darah = antiinjection($_POST['gol_darah']);
	$alamat_sis = antiinjection($_POST['alamat_sis']);
	$kota_kab = antiinjection($_POST['kota_kab']);
	$kodepos = antiinjection($_POST['kodepos']);
	$hp_siswa = antiinjection($_POST['hp_siswa']);
	$tlp_siswa = antiinjection($_POST['tlp_siswa']);
	$email = antiinjection($_POST['email']);
	$stt_rumah = antiinjection($_POST['stt_rumah']);
	$kendaraan = antiinjection($_POST['kendaraan']);
	$sekolah = antiinjection($_POST['sekolah']);
	$alamat_skl = antiinjection($_POST['alamat_skl']);
	$no_ijazah = antiinjection($_POST['no_ijazah']);
	$tgl_ijazah = antiinjection($_POST['tgl_ijazah']);
	$thn_ijazah = antiinjection($_POST['thn_ijazah']);
	$nilai_un = antiinjection($_POST['nilai_un']);
	$pres_akademik = antiinjection($_POST['pres_akademik']);
	$pres_olahraga = antiinjection($_POST['pres_olahraga']);
	$pres_seni = antiinjection($_POST['pres_seni']);
	$nm_ayah = antiinjection($_POST['nm_ayah']);
	$nm_ibu = antiinjection($_POST['nm_ibu']);
	$job_ayah = antiinjection($_POST['job_ayah']);
	$job_ibu = antiinjection($_POST['job_ibu']);
	$gaji_ayah = antiinjection($_POST['gaji_ayah']);
	$gaji_ibu = antiinjection($_POST['gaji_ibu']);
	$alamat_ortu = antiinjection($_POST['alamat_ortu']);
	$kota_kab_ortu = antiinjection($_POST['kota_kab_ortu']);
	$kodepos_ortu = antiinjection($_POST['kodepos_ortu']);
	$hp_ortu = antiinjection($_POST['hp_ortu']);
	$nm_wali = antiinjection($_POST['nm_wali']);
	$job_wali = antiinjection($_POST['job_wali']);
	$gaji_wali = antiinjection($_POST['gaji_wali']);
	$alamat_wali = antiinjection($_POST['alamat_wali']);
	$hp_wali = antiinjection($_POST['hp_wali']);
	$pjbiaya = antiinjection($_POST['pjbiaya']);
	//------ANTI XSS & SQL INJECTION-------//

	/*---------- validasi untuk email ------------------------------
	aktifkan variabel kar1 dan kar2 dibawah ini ketika sudah online
	--------------------------------------------------------------*/
	/*
	$kar1 = strstr($email, "@");
	$kar2 = strstr($email, ".");
	*/
	/*---------------------------------------------*/

	if (trim($nisn)=="" or ! is_numeric(trim($nisn))) {
		echo "<script>alert('NISN hanya dapat di isi oleh angka.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=pfsis'>";
		exit;
	}
	else
	if (trim($anak_ke)=="" or ! is_numeric(trim($anak_ke))) {
		echo "<script>alert('Anak ke- hanya dapat di isi oleh angka.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=pfsis'>";
		exit;
	}
	else
	if (trim($jml_saudara)=="" or ! is_numeric(trim($jml_saudara))) {
		echo "<script>alert('Jumlah saudara hanya dapat di isi oleh angka.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=pfsis'>";
		exit;
	}
	else
	if (trim($tinggi_bdn)=="" or ! is_numeric(trim($tinggi_bdn))) {
		echo "<script>alert('Tinggi badan hanya dapat di isi oleh angka.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=pfsis'>";
		exit;
	}
	else
	if (trim($berat_bdn)=="" or ! is_numeric(trim($berat_bdn))) {
		echo "<script>alert('Berat badan hanya dapat di isi oleh angka.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=pfsis'>";
		exit;
	}
	else
	if (trim($kodepos)=="" or ! is_numeric(trim($kodepos))) {
		echo "<script>alert('Kode pos hanya dapat di isi oleh angka.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=pfsis'>";
		exit;
	}
	else
	if (trim($hp_siswa)=="" or ! is_numeric(trim($hp_siswa))) {
		echo "<script>alert('No. HP siswa hanya dapat di isi oleh angka.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=pfsis'>";
		exit;
	}
	else
	if (trim($tlp_siswa)=="" or ! is_numeric(trim($tlp_siswa))) {
		echo "<script>alert('No. telepon siswa hanya dapat di isi oleh angka.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=pfsis'>";
		exit;
	}
	else
	/* aktifkan validasi email dibawah ini ketika sudah online
	if (!$kar1 or !$kar2) {
		echo "<script>alert('Format email yang Anda masukkan salah.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=pfsis'>";
		exit;
	}
	else
	*/
	if (trim($thn_ijazah)=="" or ! is_numeric(trim($thn_ijazah))) {
		echo "<script>alert('Tahun ijazah hanya dapat di isi oleh angka.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=pfsis'>";
		exit;
	}
	else
	if (trim($gaji_ayah)=="" or ! is_numeric(trim($gaji_ayah))) {
		echo "<script>alert('Penghasilan ayah hanya dapat di isi oleh angka.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=pfsis'>";
		exit;
	}
	else
	if (trim($gaji_ibu)=="" or ! is_numeric(trim($gaji_ibu))) {
		echo "<script>alert('Penghasilan ibu hanya dapat di isi oleh angka.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=pfsis'>";
		exit;
	}
	else
	if (trim($kodepos_ortu)=="" or ! is_numeric(trim($kodepos_ortu))) {
		echo "<script>alert('Kode pos orangtua hanya dapat di isi oleh angka.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=pfsis'>";
		exit;
	}
	else
	if (trim($gaji_wali)=="" or ! is_numeric(trim($gaji_wali))) {
		echo "<script>alert('Penghasilan wali hanya dapat di isi oleh angka.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=pfsis'>";
		exit;
	}
	else
	if (trim($hp_wali)=="" or ! is_numeric(trim($hp_wali))) {
		echo "<script>alert('No. HP wali hanya dapat di isi oleh angka.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=pfsis'>";
		exit;
	}
	else
	{
		try{
			$sql = $conn->prepare("UPDATE psb SET id_kompetensi = '$kompetensi',
									nisn = '$nisn',
	                                nm_siswa = '$nm_siswa',
	                                tmp_lahir = '$tmp_lahir',
									tgl_lahir = '$tgl_lahir',
	                                jns_kelamin = '$kelamin',
	                                agama = '$agama',
	                                anak_ke = '$anak_ke',
	                                jml_saudara = '$jml_saudara',
	                                status_anak = '$status_anak',
	                                tinggi_badan = '$tinggi_bdn',
	                                berat_badan = '$berat_bdn',
	                                gol_darah = '$gol_darah',
	                                alamat_siswa = '$alamat_sis',
	                                kota_kab = '$kota_kab',
	                                kode_pos = '$kodepos',
	                                hp_siswa = '$hp_siswa',
	                                tlp_siswa = '$tlp_siswa',
	                                email_siswa = '$email',
	                                status_rumah_siswa = '$stt_rumah',
	                                kendaraan = '$kendaraan',
	                                asal_sekolah = '$sekolah',
	                                alamat_sekolah = '$alamat_skl',
	                                no_ijazah = '$no_ijazah',
	                                tgl_ijazah = '$tgl_ijazah',
	                                thn_ijazah = '$thn_ijazah',
	                                nilai_un = '$nilai_un',
	                                prestasi_akademik = '$pres_akademik',
	                                prestasi_olahraga = '$pres_olahraga',
	                                prestasi_kesenian = '$pres_seni',
	                                nm_orangtua_ayah = '$nm_ayah',
	                                nm_orangtua_ibu = '$nm_ibu',
	                                pekerjaan_ayah = '$job_ayah',
	                                pekerjaan_ibu = '$job_ibu',
	                                penghasilan_ayah = '$gaji_ayah',
	                                penghasilan_ibu = '$gaji_ibu',
	                                alamat_orangtua = '$alamat_ortu',
	                                kota_kab_orgtua = '$kota_kab_ortu',
	                                kode_pos_orgtua = '$kodepos_ortu',
	                                hp_orgtua = '$hp_ortu',
	                                nm_wali = '$nm_wali',
	                                pekerjaan_wali = '$job_wali',
	                                penghasilan_wali = '$gaji_wali',
	                                alamat_wali = '$alamat_wali',
	                                hp_wali = '$hp_wali',
	                                penanggung_biaya = '$pjbiaya'
                              WHERE no_reg = :noreg ");
			$sql->bindParam(":noreg", $_POST['tid']);
            $sql->execute();
        
			echo "<script>alert('Data calon siswa telah di update.');</script>";
			echo "<meta http-equiv='refresh' content='0;url=?page=pfsis'>";
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
?>