-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 05:26 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah2`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `slug` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `deskripsi`, `slug`, `judul`, `date`) VALUES
(2, '<p></p><p><img style=\"width: 50%;\" src=\"http://localhost/sekolah3/assets/artikel/IMG-20190817-WA0055.jpg\"><br></p>Makan Bersama Alumni SMP Al Irsyad Tegal<br>‌Hari &amp; Tanggal : Minggu, 11 Desember 2022<br>‌Lokasi : Aula SMP Al Irsyad Tegal<br><p>              </p><p></p>', 'makan-bersama-alumni', 'makan bersama alumni', '2022-10-26 20:04:12'),
(5, '<p>              <img style=\"width: 50%;\" src=\"http://localhost/sekolah3/assets/artikel/IMG-20190817-WA00551.jpg\"><br>‌<br>‌Syukuran Tahun Baru Bersama SMP Al Irsyad<br>‌<br>‌Hari &amp; Tanggal : Minggu, 1 Januari 2023<br>‌Lokasi : SMP Al Irsyad<br></p>', 'syukuran-tahun-baru-bersama-alumni', 'syukuran tahun baru bersama alumni', '2022-10-24 18:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(10) UNSIGNED NOT NULL,
  `user_1` varchar(10) NOT NULL,
  `user_2` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pesan` text NOT NULL,
  `baca` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `nama_saya` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `user_1`, `user_2`, `created_at`, `pesan`, `baca`, `status`, `nama_saya`) VALUES
(147, '1', '7', '2022-07-17 22:22:43', 'gfhgh', 1, 0, 'admin'),
(148, '7', '15', '2022-10-27 06:45:04', 'fhdfhf', 1, 0, 'Agung  2'),
(149, '7', '15', '2022-10-27 06:45:04', 'xgfg', 1, 0, 'Agung  2'),
(150, '1', '7', '2022-07-17 22:23:33', 'dfgsdfg', 1, 0, 'admin'),
(151, '7', '15', '2022-10-27 06:45:04', 'ggggg', 1, 0, 'Agung  2'),
(152, '1', '7', '2022-07-17 22:51:11', 'ya', 1, 0, 'admin'),
(153, '7', '15', '2022-10-27 06:45:04', 'oke', 1, 0, 'Agung  2'),
(154, '1', '7', '2022-07-17 22:51:27', 'sama\\\"', 1, 0, 'admin'),
(155, '1', '7', '2022-08-08 07:34:33', 'yu', 1, 0, 'admin'),
(156, '1', '7', '2022-08-08 07:39:01', 'eee', 1, 0, 'admin'),
(157, '1', '7', '2022-08-08 07:44:05', 'fdf', 1, 0, 'admin'),
(158, '1', '7', '2022-08-08 07:44:55', 'dgfdf', 1, 0, 'admin'),
(159, '7', '15', '2022-10-27 06:45:04', 'fgf', 1, 0, 'Agung 2'),
(160, '7', '15', '2022-10-27 06:45:04', 'g', 1, 0, 'Agung 2'),
(161, '7', '15', '2022-10-27 06:45:04', 'sdd', 1, 0, 'Agung 2'),
(162, '7', '15', '2022-10-27 06:45:04', 'dfd', 1, 0, 'Agung 2'),
(163, '1', '7', '2022-08-08 07:58:38', 'dfgfd', 1, 0, 'admin'),
(164, '1', '7', '2022-08-08 07:58:48', 'bg', 1, 0, 'admin'),
(165, '7', '15', '2022-10-27 06:45:04', 'fgdfgf', 1, 0, 'Agung 2'),
(166, '1', '7', '2022-08-08 07:59:31', 'dgfd', 1, 0, 'admin'),
(167, '1', '7', '2022-08-08 08:05:41', 'dfd', 1, 0, 'admin'),
(168, '1', '7', '2022-08-08 08:08:20', 'dfg', 1, 0, 'admin'),
(169, '7', '15', '2022-10-27 06:45:04', 'dfdf', 1, 0, 'Agung 2'),
(170, '1', '7', '2022-08-08 08:10:46', 'dfd', 1, 0, 'admin'),
(171, '1', '7', '2022-08-08 08:13:00', 'cxc', 1, 0, 'admin'),
(172, '7', '15', '2022-10-27 06:45:04', '', 1, 0, 'Agung 2'),
(173, '1', '7', '2022-08-08 08:14:58', 'fgf', 1, 0, 'admin'),
(174, '1', '7', '2022-08-08 08:16:28', 'fddf', 1, 0, 'admin'),
(175, '1', '7', '2022-08-08 08:17:13', '434', 1, 0, 'admin'),
(176, '7', '15', '2022-10-27 06:45:04', 'dfd', 1, 0, 'Agung 2'),
(177, '7', '15', '2022-10-27 06:45:04', 'fgf', 1, 0, 'Agung 2'),
(178, '1', '7', '2022-08-08 08:27:32', 'rrr', 1, 0, 'admin'),
(179, '7', '15', '2022-10-27 06:45:04', 'gfg', 1, 0, 'Agung 2'),
(180, '7', '15', '2022-10-27 06:45:04', 'fgdf', 1, 0, 'Agung 2'),
(181, '1', '7', '2022-08-08 08:31:32', 'fs', 1, 0, 'admin'),
(182, '7', '15', '2022-10-27 06:45:04', 'gfg', 1, 0, 'Agung 2'),
(183, '1', '7', '2022-08-08 08:32:14', 'gfdfg', 1, 0, 'admin'),
(184, '7', '15', '2022-10-27 06:45:04', 'dfgdf', 1, 0, 'Agung 2'),
(185, '7', '15', '2022-10-27 06:45:04', 'sfd', 1, 0, 'Agung 2'),
(186, '1', '7', '2022-08-08 08:34:22', 'sdf', 1, 0, 'admin'),
(187, '1', '7', '2022-08-08 08:35:01', 'dfg', 1, 0, 'admin'),
(188, '7', '15', '2022-10-27 06:45:04', 'dgd', 1, 0, 'Agung 2'),
(189, '1', '7', '2022-08-08 08:36:00', 'fsdf', 1, 0, 'admin'),
(190, '1', '7', '2022-08-08 08:36:37', 'dfdsx', 1, 0, 'admin'),
(191, '7', '15', '2022-10-27 06:45:04', 'fgfg', 1, 0, 'Agung 2'),
(192, '1', '7', '2022-08-08 08:39:27', 'fdf', 1, 0, 'admin'),
(193, '7', '15', '2022-10-27 06:45:04', 'dfgfd', 1, 0, 'Agung 2'),
(194, '1', '7', '2022-08-08 08:42:29', 'fgfg', 1, 0, 'admin'),
(195, '1', '7', '2022-08-08 08:42:44', 'fgf', 1, 0, 'admin'),
(196, '1', '7', '2022-08-08 08:43:33', 'fg', 1, 0, 'admin'),
(197, '1', '7', '2022-08-08 08:44:54', 'sdfs', 1, 0, 'admin'),
(198, '2', '1', '2022-10-26 05:03:20', 'tes', 1, 0, 'aaaa'),
(199, '1', '15', '2022-10-25 08:06:22', 'test', 1, 0, 'admin'),
(200, '1', '2', '2022-10-26 05:03:22', '', 1, 0, 'admin'),
(201, '1', '7', '2022-10-27 03:16:18', 'hello', 1, 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id` int(10) NOT NULL,
  `nip` int(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `kode_guru` varchar(2) NOT NULL,
  `pendidikan` enum('SMA','S1','S2','S3') NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `password` varchar(34) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `ofline_online` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id`, `nip`, `nama`, `tmp_lahir`, `tgl_lahir`, `alamat`, `jk`, `telp`, `email`, `jabatan`, `kode_guru`, `pendidikan`, `status`, `password`, `foto`, `ofline_online`) VALUES
(1, 24242424, 'admin', 'tegal', '1994-02-03', 'jalan jalan sing penting cuan', '', '6287801316522', 'admin@gmail.com', 'Admin', 'ad', 'SMA', 'aktif', '827ccb0eea8a706c4c34a16891f84e7b', '', 0),
(2, 1313132, 'kepala sekolah', 'tegal', '2022-06-28', 'sdff', 'P', '6285952666663', 'admin2@gmail.com', 'Kepala Sekolah', '', 'SMA', 'aktif', '827ccb0eea8a706c4c34a16891f84e7b', '', 0),
(5, 100200, 'Dedi Nugroho', 'Tegal', '1999-09-15', 'Jalan Merapi', 'L', '', 'dedinugroho@gmail.com', 'Alumni', '', 'SMA', 'aktif', '33814acc0b112f9c4a7d49a407321729', '', 0),
(6, 6456, 'FARUK', 'Tegal', '2008-10-07', 'KOTA TEGAL', 'L', '', 'Faruk@gmail.com', 'Alumni', '', 'SMA', 'aktif', '198dd5fb9c43b2d29a548f8c77e85cf9', '', 0),
(7, 2453, 'Nur Mita', 'Tegal', '2007-11-02', 'Jalan Bango', 'P', '', 'Mita@gmail.com', 'Alumni', '', 'SMA', 'aktif', '8c9f32e03aeb2e3000825c8c875c4edd', '', 0),
(8, 5622, 'Muhammad Nasrul', 'Tegal', '2000-02-01', 'Jalan Merpati', 'L', '6287801316531', 'Nasrul@gmail.com', 'Alumni', '', 'SMA', 'aktif', 'b4681a619cf018eed690452faeb0e94f', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(2) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `jabatan`) VALUES
(1, 'Admin'),
(2, 'Kepala Sekolah'),
(3, 'Alumni');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jns_kelamin` enum('L','P') NOT NULL,
  `agama` enum('Islam','Hindu','Budha','Kristen','Katolik') NOT NULL,
  `sekolah_asal` varchar(100) NOT NULL,
  `nisn` int(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nama_ortu` varchar(30) NOT NULL,
  `pekerjaan_ortu` varchar(50) NOT NULL,
  `alamat_ortu` varchar(255) NOT NULL,
  `telp_ortu` varchar(16) NOT NULL,
  `nama_wali` varchar(30) NOT NULL,
  `pekerjaan_wali` varchar(20) NOT NULL,
  `hubungan_wali` varchar(50) NOT NULL,
  `alamat_wali` varchar(255) NOT NULL,
  `telp_wali` varchar(16) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `tahun_lulus` int(4) NOT NULL,
  `password` varchar(32) NOT NULL,
  `lanjut_ke` varchar(100) NOT NULL,
  `kerja_di` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sma` varchar(50) NOT NULL,
  `thn_masuk_sma` int(4) NOT NULL,
  `thn_lulus_sma` int(4) NOT NULL,
  `nama_kampus` varchar(255) NOT NULL,
  `jurusan_kampus` varchar(50) NOT NULL,
  `jenjang_pendidikan` varchar(50) NOT NULL,
  `thn_masuk_kampus` int(4) NOT NULL,
  `thn_lulus_kampus` int(4) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `alamat_perusahaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `tempat`, `tgl_lahir`, `jns_kelamin`, `agama`, `sekolah_asal`, `nisn`, `alamat`, `nama_ortu`, `pekerjaan_ortu`, `alamat_ortu`, `telp_ortu`, `nama_wali`, `pekerjaan_wali`, `hubungan_wali`, `alamat_wali`, `telp_wali`, `foto`, `kelas`, `angkatan`, `tahun_lulus`, `password`, `lanjut_ke`, `kerja_di`, `email`, `sma`, `thn_masuk_sma`, `thn_lulus_sma`, `nama_kampus`, `jurusan_kampus`, `jenjang_pendidikan`, `thn_masuk_kampus`, `thn_lulus_kampus`, `nama_perusahaan`, `posisi`, `alamat_perusahaan`) VALUES
(15, 100200, 'Dedi Nugroho', 'Tegal', '1999-09-15', 'L', 'Islam', 'SD RANDUGUNTING 10', 0, 'Jalan Merapi', 'testes', 'Wirausaha', 'Jalan Merpati', '08278392837', 'testes', 'Guru', 'Kakak', 'Jalan Merpati', '08278392811', 'c176001e5e673d593aecd12d080d79a5.jpg', '', 2013, 2015, '33814acc0b112f9c4a7d49a407321729', '', '', 'dedinugroho@gmail.com', 'SMA N 2 TEGAL', 2016, 2017, 'POLITEKNIK HARAPAN BERSAMA TEGAL', 'TEKNIK INFORMATIKA', 'D4', 2017, 2022, '', '', ''),
(16, 6456, 'FARUK', 'Tegal', '2008-10-07', 'L', 'Islam', 'SD TEGAL', 0, 'KOTA TEGAL', 'aaaaaaa', 'aaaaa', 'aaaaa', '232390', 'aaaaaa', 'aaaaaaa', 'aaaaaaa', 'aaaaaaaaaaa', '9009809238', 'default.jpg', '', 2019, 2022, '198dd5fb9c43b2d29a548f8c77e85cf9', '', '', 'Faruk@gmail.com', 'PONPES IMAM SYAFI\'I', 0, 0, '', '', '', 0, 0, '', '', ''),
(17, 2453, 'Nur Mita', 'Tegal', '2007-11-02', 'P', 'Islam', 'SD 1 Tegal', 0, 'Jalan Bango', 'Nurdarsoh', 'IRT', 'Jalan Bango', '089677725', 'Fikri', 'PNS', 'Kakak', 'Jalan Bango', '089378289', 'default.jpg', '', 2019, 2022, '8c9f32e03aeb2e3000825c8c875c4edd', '', '', 'Mita@gmail.com', 'SMA N 1 TEGAL', 2022, 2024, '', '', '', 0, 0, '', '', ''),
(18, 5622, 'Muhammad Nasrul', 'Tegal', '2000-02-01', 'L', 'Islam', 'SD 5 Tegal', 0, 'Jalan Merapi', 'Sodikin', 'PNS', 'Jalan Merapi', '028393988', 'Wahyu', 'Wirausaha', 'Kakak', 'Jalan Merapi', '09287838', 'default.jpg', '', 2014, 2016, 'b4681a619cf018eed690452faeb0e94f', '', '', 'Nasrul@gmail.com', 'SMA Muhammadiyah Tegal', 2016, 2018, 'UNNES', 'Sastra Jepang', 'S1', 2018, 2021, 'SMA N 1 TEGAL', 'Guru Bahasa Jepang', '');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `slug` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_siswa` int(11) NOT NULL,
  `setujui` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `deskripsi`, `slug`, `judul`, `date`, `id_siswa`, `setujui`) VALUES
(13, 'Saya Bangga belajar di SMP AL IRSYAD TEGAL, apa yang saya mau semuanya\r\n ada di sini. Saya merasa di sini adalah langkah awal dalam meraih \r\ncita-cita. Guru-guru yang baik dan sistem pembelajaran yang sangat bagus<br>', '', '', '2022-10-26 20:04:44', 15, 1),
(14, 'Saya mendapatkan pengalaman yang menyenangkan ketika bersekolah disini<br>', '', '', '2022-10-25 07:04:23', 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `session_id` varchar(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `browser` varchar(50) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `platform` varchar(30) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `session_id`, `nama`, `browser`, `ip_address`, `platform`, `status`) VALUES
(96, '7', 'Agung 2', '', '', '', 1),
(112, '2', 'aaaa', '', '', '', 1),
(135, '15', 'Dedi Nugroho', '', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
