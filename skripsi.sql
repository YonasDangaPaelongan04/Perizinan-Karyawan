-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 10:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `perizinan_karyawan`
--

CREATE TABLE `perizinan_karyawan` (
  `id_perizinan` int(25) NOT NULL,
  `id_anggota` varchar(255) NOT NULL,
  `nama_izin` varchar(255) NOT NULL,
  `awal_izin` date NOT NULL,
  `selesai_izin` date NOT NULL,
  `keterangan_izin` varchar(255) NOT NULL,
  `status` char(3) NOT NULL DEFAULT '1' COMMENT '1=Menunggu, 2=Diizinkan, 3=Ditolak'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perizinan_karyawan`
--

INSERT INTO `perizinan_karyawan` (`id_perizinan`, `id_anggota`, `nama_izin`, `awal_izin`, `selesai_izin`, `keterangan_izin`, `status`) VALUES
(8, '3', 'Cuti Sakit', '2023-06-19', '2023-06-27', 'Dirujuk ke rumah sakit karena usus buntu', '3'),
(15, '4', 'Testing', '2023-07-06', '2023-07-08', '\r\nTESTINGGGG', '2'),
(23, '4', 'Testing', '2023-07-06', '2023-07-07', '\r\nTESTING CALVIN', '3'),
(33, '4', 'Testing', '2023-07-09', '2023-07-10', 'TESTING1', '2'),
(34, '4', 'Testing', '2023-07-09', '2023-07-10', 'TESTING2', '3'),
(35, '4', 'Cuti Haji/Umrah', '2023-07-09', '2023-07-10', 'BAPAKNYA MELAHIRKAN !!', '2'),
(36, '4', 'Testing', '2023-07-09', '2023-07-10', 'TESTING LAGI', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_izin_list`
--

CREATE TABLE `tb_izin_list` (
  `id_izin_list` int(100) NOT NULL,
  `nama_izin` varchar(100) NOT NULL,
  `keterangan_izin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_izin_list`
--

INSERT INTO `tb_izin_list` (`id_izin_list`, `nama_izin`, `keterangan_izin`) VALUES
(10, 'Cuti Tahunan', 'cuti 15 hari pertahun'),
(11, 'Cuti Sakit', 'Cuti ini harus disertai surat dari dokter'),
(13, 'Cuti Melahirkan', 'Staff berhak memperoleh istirahat selama 1,5 bulan sebelum saatnya melahirkan anak dan 1,5 bulan sesudah melahirkan menurut perhitungan dokter kandungan atau bidan'),
(14, 'Cuti Haji/Umrah', 'Hak cuti berlaku 50 hari dan upah dibayar penuh.'),
(19, 'Testing', 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_anggota` int(11) NOT NULL,
  `nama_karyawan` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nip` varchar(200) NOT NULL,
  `jk` char(200) NOT NULL COMMENT '1=Perempuan, 2=Laki-laki',
  `golongan` varchar(200) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `ruangan` varchar(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_jenis_user` char(3) NOT NULL COMMENT '1=Admin,2=Karyawan,3=Kepala Dinas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_anggota`, `nama_karyawan`, `password`, `nip`, `jk`, `golongan`, `jabatan`, `ruangan`, `keterangan`, `id_jenis_user`) VALUES
(1, 'Yonas Danga', '123', '654321', 'Laki-laki', 'Sistem Informasi', 'Admin', '5', 'PNS', '1'),
(3, 'Edo Perdana', '123456', '3456243', 'Laki-laki', 'Sistem Informasi', 'Kepala Dinas', '3', 'PNS', '2'),
(4, 'Calvin Putra', '123456', '964758', 'Laki-laki', 'Sistem Informasi Akuntansi', 'Staff akuntansi', '5', 'staff', '2'),
(9, 'Eka Putri', '123456', '126934', 'Perempuan', 'Teknik Komputer', 'Tim IT', '8', 'staff', '2'),
(15, 'Testing', '12345', '040301', 'Laki-laki', '4A', 'sdvsdvsdv', '5A', 'CPNS', '3'),
(16, 'Antok', '123456', '98765', 'Laki-laki', '4A', '4A', '5', 'PNS', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_jenis_user` int(11) NOT NULL,
  `jenis_user` char(200) NOT NULL COMMENT '1=Admin, 2=Karyawan, 3=Kepala Dinas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_jenis_user`, `jenis_user`) VALUES
(1, 'admin'),
(2, 'karyawan'),
(3, 'kepala dinas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perizinan_karyawan`
--
ALTER TABLE `perizinan_karyawan`
  ADD PRIMARY KEY (`id_perizinan`);

--
-- Indexes for table `tb_izin_list`
--
ALTER TABLE `tb_izin_list`
  ADD PRIMARY KEY (`id_izin_list`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_jenis_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perizinan_karyawan`
--
ALTER TABLE `perizinan_karyawan`
  MODIFY `id_perizinan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_izin_list`
--
ALTER TABLE `tb_izin_list`
  MODIFY `id_izin_list` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_jenis_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
