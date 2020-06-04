<?php
	session_start();
	include "../../conf/koneksi.php";
  include "../../conf/fungsi_indotgl.php";
  include "../../lib/inc.session.sis.php";
	
  /* versi PDO */
  $sql = $conn->prepare("SELECT * FROM psb 
                          WHERE no_reg = :noreg ");
  $sql->bindParam(":noreg", $_SESSION['noreg']);
  $sql->execute();
  $r = $sql->fetch();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bukti Pendaftaran Siswa Online</title>
</head>

<body>
<table width="900" border="0">
  <tr>
    <td colspan="12"><div align="center"><h2>SMK Nusantara Indonesia</h2></div></td>
  </tr>
  <tr>
    <td colspan="9"><div align="center">
      DATA CALON SISWA BARU
    </div></td>
  </tr>
  <tr>
    <td colspan="9"><hr /></td>
  </tr>
  <tr>
    <td colspan="9"><div align="right"><b>NO PENDAFTARAN :</b> <?php echo "<b>"; echo $r['no_reg']; echo "</b>"; ?></div></td>
  </tr>
  <tr>
    <td colspan="9"><div align="right">Tanggal pendaftaran : <?php echo tgl_indo($r['tgl_daftar']); ?></div></td>
  </tr>
  <tr>
    <td colspan="9">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9"><strong>A. KETERANGAN PRIBADI SISWA</strong></td>
  </tr>
  <tr>
    <td width="222">Nomor Induk Siswa Nasional (NISN)</td>
    <td width="10">:</td>
    <td colspan="7"><?php echo $r['nisn']; ?></td>
  </tr>
  <tr>
    <td>Nama Calon Siswa</td>
    <td>:</td>
    <td colspan="7"><?php echo $r['nm_siswa']; ?></td>
  </tr>
  <tr>
    <td>Tempat, Tanggal Lahir</td>
    <td>:</td>
    <td width="133"><?php echo $r['tmp_lahir']; ?></td>
    <td colspan="6"><?php echo tgl_indo($r['tgl_lahir']); ?></td>
  </tr>
  <tr>
    <td>Jenis Kelamin</td>
    <td>:</td>
    <td><?php echo $r['jns_kelamin']; ?></td>
    <td width="74">Anak ke</td>
    <td width="9">:</td>
    <td width="50"><?php echo $r['anak_ke']; ?></td>
    <td width="45">Dari</td>
    <td width="13">:</td>
    <td width="106"><?php echo $r['jml_saudara']; ?>&nbsp;saudara</td>
  </tr>
  <tr>
    <td>Agama</td>
    <td>:</td>
    <td colspan="7"><?php echo $r['agama']; ?></td>
  </tr>
  <tr>
    <td>Status Anak</td>
    <td>:</td>
    <td colspan="7"><?php echo $r['status_anak']; ?></td>
  </tr>
  <tr>
    <td>E-mail</td>
    <td>:</td>
    <td colspan="7"><?php echo $r['email_siswa']; ?></td>
  </tr>
  <tr>
    <td colspan="9">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9"><strong>B. KETERANGAN TEMPAT TINGGAL SISWA</strong></td>
  </tr>
  <tr>
    <td>Alamat Siswa</td>
    <td>:</td>
    <td colspan="7"><?php echo $r['alamat_siswa']; ?></td>
  </tr>
  <tr>
    <td>Status Tempat Tinggal</td>
    <td>:</td>
    <td colspan="7"><?php echo $r['status_rumah_siswa']; ?></td>
  </tr>
  <tr>
    <td>Kepemilikan Kendaraan</td>
    <td>:</td>
    <td colspan="7"><?php echo $r['kendaraan']; ?></td>
  </tr>
  <tr>
    <td colspan="9">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9"><strong>C. KETERANGAN JASMANI SISWA</strong></td>
  </tr>
  <tr>
    <td>Berat Badan</td>
    <td>:</td>
    <td><?php echo $r['berat_badan']; ?>&nbsp;Kg</td>
    <td>Tinggi Badan</td>
    <td>:</td>
    <td><?php echo $r['tinggi_badan']; ?>&nbsp;Cm</td>
    <td>Gol. Darah</td>
    <td>:</td>
    <td><?php echo $r['gol_darah']; ?></td>
  </tr>
  <tr>
    <td colspan="9">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9"><strong>D. KETERANGAN SEKOLAH ASAL</strong></td>
  </tr>
  <tr>
    <td>Nama Sekolah Asal</td>
    <td>:</td>
    <td colspan="7"><?php echo $r['asal_sekolah']; ?></td>
  </tr>
  <tr>
    <td>Alamat Sekolah</td>
    <td>:</td>
    <td colspan="7"><?php echo $r['alamat_sekolah']; ?></td>
  </tr>
  <tr>
    <td colspan="9">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9"><strong>E. KETERANGAN ORANG TUA SISWA</strong></td>
  </tr>
  <tr>
    <td>Nama Ayah</td>
    <td>:</td>
    <td colspan="7"><?php echo $r['nm_orangtua_ayah']; ?></td>
  </tr>
  <tr>
    <td>Nama Ibu</td>
    <td>:</td>
    <td colspan="7"><?php echo $r['nm_orangtua_ibu']; ?></td>
  </tr>
  <tr>
    <td>Alamat Orang Tua</td>
    <td>:</td>
    <td colspan="7"><?php echo $r['alamat_orangtua']; ?></td>
  </tr>
  <tr>
    <td>Pekerjaan Ayah</td>
    <td>:</td>
    <td colspan="7"><?php echo $r['pekerjaan_ayah']; ?></td>
  </tr>
  <tr>
    <td>Pekerjaan Ibu</td>
    <td>:</td>
    <td colspan="7"><?php echo $r['pekerjaan_ibu']; ?></td>
  </tr>
  <tr>
    <td>Penghasilan Orang Tua</td>
    <td>:</td>
    <td colspan="7">Rp.&nbsp;<?php echo $r['penghasilan_ayah']; ?></td>
  </tr>
  <tr>
    <td>Tanggungan Biaya</td>
    <td>:</td>
    <td colspan="7"><?php echo $r['penanggung_biaya']; ?></td>
  </tr>
  <tr>
    <td colspan="9">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9"><strong>F. KETERANGAN WALI SISWA</strong></td>
  </tr>
  <tr>
    <td>Nama Wali</td>
    <td>:</td>
    <td colspan="7"><?php echo $r['nm_wali']; ?></td>
  </tr>
  <tr>
    <td>Alamat Wali</td>
    <td>:</td>
    <td colspan="7"><?php echo $r['alamat_wali']; ?></td>
  </tr>
  <tr>
    <td>Pekerjaan Wali</td>
    <td>:</td>
    <td colspan="7"><?php echo $r['pekerjaan_wali']; ?></td>
  </tr>
  <tr>
    <td>Penghasilan Wali</td>
    <td>:</td>
    <td colspan="7"><?php echo $r['penghasilan_wali']; ?></td>
  </tr>
  <tr>
    <td colspan="9">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="9">&nbsp;</td>
  </tr>
  <tr>
    <td>Mengetahui</td>
    <td colspan="5">&nbsp;</td>
    <td colspan="3">Jakarta, <?php echo date("d M Y"); ?></td>
  </tr>
  <tr>
    <td>Orang Tua Siswa,</td>
    <td colspan="5">&nbsp;</td>
    <td colspan="3">Siswa,</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo $r['nm_orangtua_ayah']; ?></td>
    <td colspan="5">&nbsp;</td>
    <td colspan="3"><?php echo $r['nm_siswa']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5">&nbsp;</td>
    <td colspan="3"><?php echo $r['nisn']; ?></td>
  </tr>
  <tr>
    <td colspan="9">&nbsp;</td>
  </tr>
</table>
</body>
</html>