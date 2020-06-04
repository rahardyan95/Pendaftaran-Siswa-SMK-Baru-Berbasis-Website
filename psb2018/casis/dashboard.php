<?php
include "../conf/koneksi.php";
include "../lib/inc.session.sis.php";

// versi PDO
$sql = $conn->prepare("SELECT * FROM psb
						WHERE no_reg = :noreg");
$sql->bindParam(":noreg",$_SESSION['noreg']);
$sql->execute();
$r = $sql->fetch();
?>

<h3 class="page-header">Selamat datang <?php echo $r['nm_siswa']; echo "&nbsp;"; echo "["; echo $r['no_reg']; echo "]"; ?></h3>

<div class="row">
	<div class="col-lg-12">
		<div class="box">
			
			<div class="alert alert-info">
				<strong>PERHATIAN!</strong><br> Segera lengkapi data siswa, data nilai raport SMP, dan kelengkapan dokumen yang dibutuhkan.<br>
				<li>Klik menu <b>Profil Siswa</b> yang terdapat dikanan atas untuk melengkapi data siswa.</li>
				<li>Klik menu <b>Input Mata Pelajaran</b> unutk memilih mata pelajaran yang akan di inputkan nilai raport nya. Pilih dan Klik <b>HANYA</b> 1 kali untuk setiap mata pelajaran. Setiap mata pelajaran yang dipilih akan di tampilkan kedalam menu <b>Input Nilai Raport</b>.</li>
				<li>Klik <b>Input Nilai Raport</b> untuk menginputkan nilai raport. Nilai raport yang di input mulai dari nilai raport kelas VII sampai dengan nilai raport kelas IX.</li>
			</div>

			<div class="alert alert-info">
				Upload/unggah kelengkapan dokumen dibawah ini untuk keperluan verifikasi.<br>
				<li>Kartu keluarga.</li>
				<li>Ijazah/Surat Keterangan Hasil Ujian Nasional (SKHUN)/Surat Keterangan Lulus (SKL)<b>*)</b>.</li>
				<li>Foto berwarna dengan latar belakang berwarna merah.
				<br><br>
				Dengan ketentuan sebagai berikut:
				<li>File dokumen yang diunggah harus merupakan hasil scan, <b>bukan hasil foto</b>.</li>
				<li>Ukuran file yang diunggah tidak melebihi 2MB.</li>
				<br>
				Keterangan:<br>
				<b>*)</b> Pilih salah satu, mana yang dikeluarkan lebih dulu oleh pihak sekolah. Jika ijazah sudah di terbitkan oleh sekolah, sebaiknya gunakan ijazah untuk memenuhi kelengkapan dokumen.
			</div>

			<div class="alert alert-info">
				Ujian saringan masuk dilakukan secara offline disekolah dengan membawa <b>Kartu Peserta Ujian Saringan Masuk</b>.<br>
				Klik menu <b>Ujian Saringan Masuk</b> untuk mengetahui jadwal ujian saringan masuk dan pengumuman hasil ujian saringan masuk.</li>
			</div>

		</div>
	</div>
</div>