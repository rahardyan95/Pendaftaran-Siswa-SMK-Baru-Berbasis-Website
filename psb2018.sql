-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2018 at 05:00 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psb2018`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` int(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password_origin` varchar(20) NOT NULL,
  `nm_lengkap` varchar(50) NOT NULL,
  `alamat_admin` text NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `aktif_admin` enum('Y','N') NOT NULL DEFAULT 'Y',
  `status_admin` enum('Admin','User') NOT NULL DEFAULT 'User',
  `pic_admin` varchar(100) NOT NULL,
  `kd_aktivasi_admin` varchar(15) NOT NULL,
  `aktivasi_admin` enum('Y','N') NOT NULL DEFAULT 'N',
  `dt_last_akses` date NOT NULL,
  `tm_last_akses` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `password_origin`, `nm_lengkap`, `alamat_admin`, `email_admin`, `aktif_admin`, `status_admin`, `pic_admin`, `kd_aktivasi_admin`, `aktivasi_admin`, `dt_last_akses`, `tm_last_akses`) VALUES
(2018050003, 'ccdc6c9681de7b0011cae794c0fdc284', '5af4f3f138', 'Admin PSB 2018', 'adad', 'admin2018@localhost', 'Y', 'Admin', '241425ADMIN.jpg', 'mzFXBH5SKT', 'Y', '2018-07-29', '19:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `cara_daftar`
--

CREATE TABLE `cara_daftar` (
  `id_caradft` int(5) NOT NULL,
  `deskripsi_caradft` text NOT NULL,
  `pic_caradft` varchar(100) NOT NULL,
  `aktif_caradft` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cara_daftar`
--

INSERT INTO `cara_daftar` (`id_caradft`, `deskripsi_caradft`, `pic_caradft`, `aktif_caradft`) VALUES
(1, 'Berikut tahapan pendaftaran siswa baru SMK Nusantara Indonesia berbasis online.<br><ul><li>Klik link Pendaftaran Siswa Baru.</li><li>Isi formulir blanko dengan datadiri calon siswa.</li><li>Cek email calon siswa untuk memperoleh link aktivasi dan password. Klik link aktivasi yang terdapat di email untuk melakukan aktivasi akun calon siswa baru.</li><li>Login dengan nomor pendaftaran dan password calon siswa.</li><li>Lengkapi data profil siswa, unggah kelengkapan dokumen (Kartu Keeluarga, Ijazah/SKHU/SKL, foto), input mata pelajaran, input nilai raport dari sekolah sebelumnya.</li><li>Cetak data profil calon siswa dan kartu peserta ujian saringan masuk.</li><li>Ikuti ujian saringan masuk secara offline di sekolah.</li></ul>', '432159Alur Pendaftaran.jpg', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `data_config`
--

CREATE TABLE `data_config` (
  `id` int(10) NOT NULL,
  `code` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `group_data` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_config`
--

INSERT INTO `data_config` (`id`, `code`, `label`, `value`, `group_data`, `created_at`, `updated_at`) VALUES
(1, 'reservation', 'reservation', '07/14/2018 - 08/15/2018', 'dokumen', '2018-07-14 14:02:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dok_foto`
--

CREATE TABLE `dok_foto` (
  `id_dok_foto` int(5) NOT NULL,
  `no_reg` varchar(11) NOT NULL,
  `tgl_up_foto` date NOT NULL,
  `pic_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dok_foto`
--

INSERT INTO `dok_foto` (`id_dok_foto`, `no_reg`, `tgl_up_foto`, `pic_foto`) VALUES
(1, 'PSB18050003', '2018-05-18', '260651FOTO.jpg'),
(2, 'PSB18070003', '2018-07-22', '639221IMG_3823.jpg'),
(3, 'PSB18070004', '2018-07-29', '8818971532439245673.jpg'),
(4, 'PSB18050001', '2018-07-29', '54749Untitled-1.jpg'),
(5, 'PSB18070005', '2018-07-29', '506653Di_629mUUAAHwtb.jpg'),
(6, 'PSB18070001', '2018-07-29', '614654Di_629mUUAAHwtb.jpg'),
(7, 'PSB18070002', '2018-07-29', '4251150766.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dok_ijazah`
--

CREATE TABLE `dok_ijazah` (
  `id_dok_ijazah` int(5) NOT NULL,
  `no_reg` varchar(11) NOT NULL,
  `tgl_up_ijazah` date NOT NULL,
  `pic_dok_ijazah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dok_ijazah`
--

INSERT INTO `dok_ijazah` (`id_dok_ijazah`, `no_reg`, `tgl_up_ijazah`, `pic_dok_ijazah`) VALUES
(1, 'PSB18050003', '2018-05-18', '368775SKHUN.jpg'),
(2, 'PSB18070003', '2018-07-22', '409088main.jpg'),
(3, 'PSB18070004', '2018-07-29', '451874Di_629mUUAAHwtb.jpg'),
(4, 'PSB18050001', '2018-07-29', '50235037830878_1909278069150954_816618753511915520_o.jpg'),
(5, 'PSB18070005', '2018-07-29', '707184Untitled-1.jpg'),
(6, 'PSB18070001', '2018-07-29', '99816850766.jpg'),
(7, 'PSB18070002', '2018-07-29', '55420Di_629mUUAAHwtb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dok_kk`
--

CREATE TABLE `dok_kk` (
  `id_dok_kk` int(5) NOT NULL,
  `no_reg` varchar(11) NOT NULL,
  `tgl_up_kk` date NOT NULL,
  `pic_dok_kk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dok_kk`
--

INSERT INTO `dok_kk` (`id_dok_kk`, `no_reg`, `tgl_up_kk`, `pic_dok_kk`) VALUES
(1, 'PSB18050003', '2018-05-18', '483795KK.jpg'),
(2, 'PSB18070003', '2018-07-22', '360962IMG_3823.jpg'),
(3, 'PSB18070004', '2018-07-29', '709259Untitled-1.jpg'),
(4, 'PSB18050001', '2018-07-29', '40539650766.jpg'),
(5, 'PSB18070005', '2018-07-29', '47604450766.jpg'),
(6, 'PSB18070001', '2018-07-29', '95968637830878_1909278069150954_816618753511915520_o.jpg'),
(7, 'PSB18070002', '2018-07-29', '960784Untitled-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `identitas_web`
--

CREATE TABLE `identitas_web` (
  `id_identitas` int(11) NOT NULL,
  `nm_website` varchar(70) NOT NULL,
  `nm_sekolah` varchar(40) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `tlp_sekolah` varchar(15) NOT NULL,
  `email_sekolah` varchar(40) NOT NULL,
  `url` varchar(50) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `twitter` varchar(30) NOT NULL,
  `instagram` varchar(30) NOT NULL,
  `profil_web` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas_web`
--

INSERT INTO `identitas_web` (`id_identitas`, `nm_website`, `nm_sekolah`, `alamat_sekolah`, `kode_pos`, `tlp_sekolah`, `email_sekolah`, `url`, `facebook`, `twitter`, `instagram`, `profil_web`) VALUES
(1, 'PSB Online SMK Nusantara Indonesia', 'SMK Nusantara Indonesia', 'Jl. Kembang Kaboja VI No.13. Kota Jakarta Pusat.', 0, '0219985564', 'psb_smknusantaraindonesia@gmail.com', '- ', '-   ', '-   ', '-   ', 'Selamat datang di portal Penerimaan Siswa Baru (PSB) SMK Nusantara Indonesia. Portal ini melayani pendaftaran siswa baru berbasis online guna meningkatkan pelayanan terhadap calon siswa yang ingin mendaftar sebagai siswa baru. Diharapkan portal ini dapat menyelesaikan permasalahan antrian yang terjadi ketika proses pendaftaran siswa berlangsung.');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_info` int(5) NOT NULL,
  `judul_info` varchar(30) NOT NULL,
  `deskripsi_info` text NOT NULL,
  `pic_info` varchar(100) NOT NULL,
  `aktif_info` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_info`, `judul_info`, `deskripsi_info`, `pic_info`, `aktif_info`) VALUES
(2, 'SMK Nusantara Indonesia', 'Pendaftaran siswa baru SMK Nusantara Indonesia akan segera dibuka. Terbagi kedalam 2 gelombang. Informasi lebih lanjut dapat menghubungi Panitia PSB yang tertera di menu kontak atau datang ke sekolah.', '841461673096Logo-Tut-Wuri-Handayani.png', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `kompetensi`
--

CREATE TABLE `kompetensi` (
  `id_kompetensi` varchar(3) NOT NULL,
  `bid_kompetensi` varchar(40) NOT NULL,
  `aktif_kompetensi` enum('Y','N') NOT NULL DEFAULT 'Y',
  `kuota` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kompetensi`
--

INSERT INTO `kompetensi` (`id_kompetensi`, `bid_kompetensi`, `aktif_kompetensi`, `kuota`) VALUES
('01', 'Multimedia', 'Y', 5),
('02', 'Rekayasa Perangkat Lunak', 'Y', 5),
('03', 'Teknik Audio Video', 'Y', 5),
('04', 'Teknik Kendaraan Ringan', 'Y', 5),
('05', 'Teknik Komputer Jaringan', 'Y', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` varchar(9) NOT NULL,
  `mapel` varchar(30) NOT NULL,
  `aktif_mapel` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `mapel`, `aktif_mapel`) VALUES
('MPL180501', 'Matematika', 'Y'),
('MPL180502', 'IPS', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_raport`
--

CREATE TABLE `nilai_raport` (
  `id_nilai` int(5) NOT NULL,
  `no_reg` varchar(11) NOT NULL,
  `id_mapel` varchar(9) NOT NULL,
  `nil1` double NOT NULL,
  `nil2` double NOT NULL,
  `nil3` double NOT NULL,
  `nil4` double NOT NULL,
  `nil5` double NOT NULL,
  `nil_ratarata` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_raport`
--

INSERT INTO `nilai_raport` (`id_nilai`, `no_reg`, `id_mapel`, `nil1`, `nil2`, `nil3`, `nil4`, `nil5`, `nil_ratarata`) VALUES
(1, 'PSB18050001', 'MPL180501', 88, 95.6, 50.6, 74, 83, 78.24),
(2, 'PSB18050001', 'MPL180502', 87, 90, 84.3, 70.5, 78.5, 82.06),
(3, 'PSB18050003', 'MPL180501', 59, 62, 55, 16, 15, 41.4),
(4, 'PSB18050003', 'MPL180502', 15, 15, 16, 64, 11, 24.2),
(5, 'PSB18070002', 'MPL180501', 88, 98, 48, 80, 70, 76.8),
(6, 'PSB18070002', 'MPL180502', 55.6, 55.8, 80, 88.8, 90, 74.04),
(7, 'PSB18070003', 'MPL180501', 75.5, 16, 16, 16, 16, 27.9),
(8, 'PSB18070003', 'MPL180502', 65, 65, 65.5, 65, 65, 65.1),
(9, 'PSB18070004', 'MPL180501', 80, 74.6, 66, 90, 45, 71.12),
(10, 'PSB18070004', 'MPL180502', 62, 75.9, 80, 88, 49.5, 71.08),
(11, 'PSB18070005', 'MPL180501', 88, 49, 80.6, 90, 99, 81.32),
(12, 'PSB18070005', 'MPL180502', 75.2, 80.6, 78.5, 79.5, 87, 80.16),
(13, 'PSB18070001', 'MPL180501', 88, 98, 66.5, 78, 88, 83.7),
(14, 'PSB18070001', 'MPL180502', 80, 55, 60.2, 77, 75.5, 69.54);

-- --------------------------------------------------------

--
-- Table structure for table `psb`
--

CREATE TABLE `psb` (
  `no_reg` varchar(11) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `jam_daftar` time NOT NULL,
  `password` varchar(15) NOT NULL,
  `kode_aktivasi` varchar(15) NOT NULL,
  `status_aktivasi` enum('Y','N') NOT NULL DEFAULT 'N',
  `status_verifikasi` enum('Belum','Sudah','Batal') NOT NULL DEFAULT 'Belum',
  `id_kompetensi` varchar(3) NOT NULL,
  `nis` int(8) NOT NULL,
  `nisn` bigint(10) NOT NULL,
  `nm_siswa` varchar(50) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jns_kelamin` enum('L','P') NOT NULL,
  `agama` varchar(15) NOT NULL,
  `anak_ke` int(3) NOT NULL,
  `jml_saudara` int(3) NOT NULL,
  `status_anak` varchar(15) NOT NULL,
  `tinggi_badan` int(3) NOT NULL,
  `berat_badan` int(3) NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `kota_kab` varchar(30) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `hp_siswa` varchar(15) NOT NULL,
  `tlp_siswa` varchar(12) NOT NULL,
  `email_siswa` varchar(50) NOT NULL,
  `status_rumah_siswa` varchar(30) NOT NULL,
  `kendaraan` varchar(30) NOT NULL,
  `asal_sekolah` varchar(40) NOT NULL,
  `alamat_sekolah` varchar(100) NOT NULL,
  `no_ijazah` varchar(25) NOT NULL,
  `tgl_ijazah` date NOT NULL,
  `thn_ijazah` year(4) NOT NULL,
  `nilai_un` double NOT NULL,
  `prestasi_akademik` varchar(100) NOT NULL,
  `prestasi_olahraga` varchar(100) NOT NULL,
  `prestasi_kesenian` varchar(100) NOT NULL,
  `nm_orangtua_ayah` varchar(50) NOT NULL,
  `nm_orangtua_ibu` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(30) NOT NULL,
  `pekerjaan_ibu` varchar(30) NOT NULL,
  `penghasilan_ayah` double NOT NULL,
  `penghasilan_ibu` double NOT NULL,
  `alamat_orangtua` text NOT NULL,
  `kota_kab_orgtua` varchar(30) NOT NULL,
  `kode_pos_orgtua` int(5) NOT NULL,
  `hp_orgtua` varchar(15) NOT NULL,
  `nm_wali` varchar(50) NOT NULL,
  `pekerjaan_wali` varchar(30) NOT NULL,
  `penghasilan_wali` double NOT NULL,
  `alamat_wali` text NOT NULL,
  `hp_wali` varchar(15) NOT NULL,
  `penanggung_biaya` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `psb`
--

INSERT INTO `psb` (`no_reg`, `tgl_daftar`, `jam_daftar`, `password`, `kode_aktivasi`, `status_aktivasi`, `status_verifikasi`, `id_kompetensi`, `nis`, `nisn`, `nm_siswa`, `tmp_lahir`, `tgl_lahir`, `jns_kelamin`, `agama`, `anak_ke`, `jml_saudara`, `status_anak`, `tinggi_badan`, `berat_badan`, `gol_darah`, `alamat_siswa`, `kota_kab`, `kode_pos`, `hp_siswa`, `tlp_siswa`, `email_siswa`, `status_rumah_siswa`, `kendaraan`, `asal_sekolah`, `alamat_sekolah`, `no_ijazah`, `tgl_ijazah`, `thn_ijazah`, `nilai_un`, `prestasi_akademik`, `prestasi_olahraga`, `prestasi_kesenian`, `nm_orangtua_ayah`, `nm_orangtua_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `penghasilan_ayah`, `penghasilan_ibu`, `alamat_orangtua`, `kota_kab_orgtua`, `kode_pos_orgtua`, `hp_orgtua`, `nm_wali`, `pekerjaan_wali`, `penghasilan_wali`, `alamat_wali`, `hp_wali`, `penanggung_biaya`) VALUES
('PSB18070001', '2018-07-29', '19:48:20', '1246a5de8c', 'eYaEP48Uaq', 'Y', 'Sudah', '03', 0, 159753, 'Doni', 'Jakarta', '1995-08-18', 'L', 'Islam', 3, 5, 'Kandung', 168, 66, 'A', 'JL Jakarta 87', 'DKI Jakarta', 10680, '087896325689', '087896325689', 'doni@localhost', 'orang tua', 'motor', 'SMP 8', 'JL Margasatya', '498765', '2010-06-05', 2010, 78, 'IPA', 'Renang', 'Melukis', 'Margu', 'Guni', 'Wiraswasta', 'Ibu Rumah Tangga', 3500000, 0, 'JL Jakarta 87', 'DKI Jakarta', 10680, '087956124893', 'Margu', 'Wiraswasta', 3500000, 'JL Jakarta 87', '087956124893', 'orang tua'),
('PSB18070002', '2018-07-29', '19:54:34', '2d6e5e3563', 'cqQ7OfRFfn', 'Y', 'Sudah', '05', 0, 165487, 'Rahardyan', 'Jakarta', '1995-02-15', 'L', 'Islam', 2, 2, 'Kandung', 170, 70, 'O', 'JL Jakarta Raya', 'DKI Jakarta', 10520, '087788968854', '087788968854', 'rahardyan@localhost', 'orang tua', 'motor', 'SMP 2', 'JL Margaraya', '489705', '2010-08-08', 2010, 80, 'IPA', 'Atletik', 'Melukis', 'Bargona', 'Sukinah', 'PNS', 'Ibu Rumah Tangga', 6000000, 0, 'JL Jakarta Raya', 'DKI Jakarta', 10520, '087796542315', 'Bargona', 'PNS', 6000000, 'JL Jakarta Raya', '087796542315', 'orang tua'),
('PSB18070003', '2018-07-29', '19:59:28', 'ce666ea5ec', 'y4IVOBzNRJ', 'Y', 'Sudah', '03', 0, 789060, 'Gina', 'Jakarta', '1994-08-10', 'P', 'Islam', 2, 3, 'Kandung', 165, 45, 'AB', 'JL Marunda 10', 'DKI Jakarta', 10658, '087945698056', '087945698056', 'gina@localhost', 'orang tua', 'motor', 'SMP 90', 'JL Bubulak 6', '498756', '2010-05-09', 2010, 70, 'Matematika', 'Lompat Jauh', 'Menyanyi', 'Udin', 'Maryam', 'Supervisor', 'Ibu Rumah Tangga', 10000000, 0, 'JL Marunda 10', 'DKI Jakarta', 10658, '087595682564', 'Udin', 'Supervisor', 10000000, 'JL Marunda 10', '087595682564', 'orang tua'),
('PSB18070004', '2018-07-29', '20:04:50', '6cfa476a92', 'nOeCGZ3Crt', 'Y', 'Sudah', '01', 0, 478965, 'Kukul', 'Jakarta', '1995-03-25', 'L', 'kristen', 2, 3, 'Kandung', 168, 66, 'B', 'JL Bojong 19', 'DKI Jakarta', 14809, '087594876523', '087594876523', 'kukul@localhost', 'orang tua', 'motor', 'SMP 35', 'JL Bogor 14', '165489', '2010-07-12', 2010, 75.8, 'Matematika', 'Atletik', 'Pantomim', 'Suhartono', 'Sari', 'Wiraswasta', 'Ibu Rumah Tangga', 3500000, 0, 'JL Bojong 19', 'DKI Jakarta', 14809, '078945632156', 'Suhartono', 'Wiraswasta', 3500000, 'JL Bojong 19', '078945632156', 'orang tua');

-- --------------------------------------------------------

--
-- Table structure for table `ujian_masuk`
--

CREATE TABLE `ujian_masuk` (
  `no_ujian` varchar(11) NOT NULL,
  `no_reg` varchar(11) NOT NULL,
  `tgl_ujian` date NOT NULL,
  `jam_ujian` time NOT NULL,
  `ruang_ujian` varchar(10) NOT NULL,
  `hasil_ujian` double NOT NULL,
  `ket_ujian` enum('Belum','Lulus','Tidak') NOT NULL DEFAULT 'Belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ujian_masuk`
--

INSERT INTO `ujian_masuk` (`no_ujian`, `no_reg`, `tgl_ujian`, `jam_ujian`, `ruang_ujian`, `hasil_ujian`, `ket_ujian`) VALUES
('USM18070001', 'PSB18070001', '2018-08-01', '19:53:15', '89', 0, 'Belum'),
('USM18070002', 'PSB18070002', '2018-08-01', '19:58:30', '88', 0, 'Belum'),
('USM18070003', 'PSB18070003', '2018-08-01', '20:03:00', '55', 0, 'Belum'),
('USM18070004', 'PSB18070004', '2018-08-01', '20:08:30', '75', 0, 'Belum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cara_daftar`
--
ALTER TABLE `cara_daftar`
  ADD PRIMARY KEY (`id_caradft`);

--
-- Indexes for table `data_config`
--
ALTER TABLE `data_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dok_foto`
--
ALTER TABLE `dok_foto`
  ADD PRIMARY KEY (`id_dok_foto`),
  ADD KEY `FOREIGN` (`no_reg`) USING BTREE;

--
-- Indexes for table `dok_ijazah`
--
ALTER TABLE `dok_ijazah`
  ADD PRIMARY KEY (`id_dok_ijazah`),
  ADD KEY `FOREIGN` (`no_reg`) USING BTREE;

--
-- Indexes for table `dok_kk`
--
ALTER TABLE `dok_kk`
  ADD PRIMARY KEY (`id_dok_kk`),
  ADD KEY `FOREIGN` (`no_reg`) USING BTREE;

--
-- Indexes for table `identitas_web`
--
ALTER TABLE `identitas_web`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `kompetensi`
--
ALTER TABLE `kompetensi`
  ADD PRIMARY KEY (`id_kompetensi`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai_raport`
--
ALTER TABLE `nilai_raport`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `FOREIGN` (`no_reg`,`id_mapel`) USING BTREE;

--
-- Indexes for table `psb`
--
ALTER TABLE `psb`
  ADD PRIMARY KEY (`no_reg`),
  ADD KEY `FOREIGN` (`id_kompetensi`);

--
-- Indexes for table `ujian_masuk`
--
ALTER TABLE `ujian_masuk`
  ADD PRIMARY KEY (`no_ujian`),
  ADD KEY `FOREIGN` (`no_reg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cara_daftar`
--
ALTER TABLE `cara_daftar`
  MODIFY `id_caradft` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_config`
--
ALTER TABLE `data_config`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dok_foto`
--
ALTER TABLE `dok_foto`
  MODIFY `id_dok_foto` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dok_ijazah`
--
ALTER TABLE `dok_ijazah`
  MODIFY `id_dok_ijazah` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dok_kk`
--
ALTER TABLE `dok_kk`
  MODIFY `id_dok_kk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `identitas_web`
--
ALTER TABLE `identitas_web`
  MODIFY `id_identitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_info` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nilai_raport`
--
ALTER TABLE `nilai_raport`
  MODIFY `id_nilai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
