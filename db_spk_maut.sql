-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 08:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk_maut`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_user` int(11) NOT NULL,
  `user` varchar(16) DEFAULT NULL,
  `pass` varchar(16) DEFAULT NULL,
  `nama_lengkap` varchar(55) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_user`, `user`, `pass`, `nama_lengkap`, `level`) VALUES
(1, 'admin', 'admin1', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `kode_alternatif` varchar(16) NOT NULL,
  `nama_alternatif` varchar(256) DEFAULT NULL,
  `tempat_lahir` varchar(45) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `posisi` varchar(55) DEFAULT NULL,
  `no_hp` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`kode_alternatif`, `nama_alternatif`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `posisi`, `no_hp`) VALUES
('A3', 'Pendaftar 3', NULL, NULL, NULL, NULL, NULL),
('A2', 'Pendaftar 2', NULL, NULL, NULL, NULL, NULL),
('A1', 'Pendaftar 1', 'Denpasar', '2020-10-23', 'Jalan', 'Helper Mekanik', '08754545'),
('A4', 'Pendaftar 4', NULL, NULL, NULL, NULL, NULL),
('A5', 'Pendaftar 5', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_crips`
--

CREATE TABLE `tb_crips` (
  `kode_crips` int(11) NOT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `keterangan` varchar(256) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_crips`
--

INSERT INTO `tb_crips` (`kode_crips`, `kode_kriteria`, `keterangan`, `nilai`) VALUES
(505, 'C1', 'Sangat Buruk', 5),
(506, 'C1', 'Buruk', 25),
(507, 'C1', 'Cukup', 50),
(508, 'C1', 'Baik', 75),
(509, 'C1', 'Sangat Baik', 100),
(510, 'C7', 'Blacklist', 25),
(511, 'C7', 'Netral', 50),
(512, 'C7', 'Whitelist', 100),
(513, 'C6', '10 juta', 5),
(514, 'C6', '20 juta', 25),
(515, 'C6', '30 juta', 50),
(516, 'C6', '40 juta', 75),
(517, 'C6', '50 juta', 100),
(518, 'C5', 'Sangat Mundur', 5),
(519, 'C5', 'Mundur', 25),
(520, 'C5', 'Statis', 50),
(521, 'C5', 'Maju', 75),
(522, 'C5', 'Sangat Maju', 100),
(523, 'C4', '10%', 5),
(524, 'C4', '>=10%', 25),
(525, 'C4', '>=20%', 50),
(526, 'C4', '>=30%', 75),
(527, 'C4', '>=40%', 100),
(528, 'C3', 'Sangat Tidak Mampu', 5),
(529, 'C3', 'Tidak mampu', 25),
(530, 'C3', 'Cukup', 50),
(531, 'C3', 'Mampu', 75),
(532, 'C3', 'Sangat Mampu', 100),
(533, 'C2', 'Sangat Tidak Mampu', 5),
(534, 'C2', 'Tidak Mampu', 25),
(535, 'C2', 'Cukup', 50),
(536, 'C2', 'Mampu', 75),
(537, 'C2', 'Sangat Mampu', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_doc`
--

CREATE TABLE `tb_doc` (
  `id_doc` int(11) NOT NULL,
  `ket` text NOT NULL,
  `tgl` date NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(256) DEFAULT NULL,
  `bobot` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kode_kriteria`, `nama_kriteria`, `bobot`) VALUES
('C1', 'Character', 0.25),
('C2', 'Capacity', 0.2),
('C3', 'Capital', 0.3),
('C4', 'Collateral', 0.15),
('C5', 'Condition', 0.1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kuota`
--

CREATE TABLE `tb_kuota` (
  `id_kuota` int(11) NOT NULL,
  `kuota` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kuota`
--

INSERT INTO `tb_kuota` (`id_kuota`, `kuota`) VALUES
(1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rel_alternatif`
--

CREATE TABLE `tb_rel_alternatif` (
  `ID` int(11) NOT NULL,
  `kode_alternatif` varchar(16) DEFAULT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `kode_crips` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_rel_alternatif`
--

INSERT INTO `tb_rel_alternatif` (`ID`, `kode_alternatif`, `kode_kriteria`, `kode_crips`) VALUES
(1, 'A1', 'C1', 509),
(2, 'A2', 'C1', 509),
(3, 'A3', 'C1', 506),
(4, 'A1', 'C2', 537),
(5, 'A2', 'C2', 535),
(6, 'A3', 'C2', 535),
(7, 'A1', 'C3', 532),
(8, 'A2', 'C3', 531),
(9, 'A3', 'C3', 529),
(10, 'A1', 'C4', 527),
(11, 'A2', 'C4', 525),
(12, 'A3', 'C4', 525),
(13, 'A1', 'C5', 522),
(14, 'A2', 'C5', 521),
(15, 'A3', 'C5', 521),
(22, 'A4', 'C1', 508),
(23, 'A4', 'C2', 536),
(24, 'A4', 'C3', 530),
(25, 'A4', 'C4', 525),
(26, 'A4', 'C5', 521),
(29, 'A5', 'C1', 509),
(30, 'A5', 'C2', 536),
(31, 'A5', 'C3', 530),
(32, 'A5', 'C4', 523),
(33, 'A5', 'C5', 522);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`kode_alternatif`);

--
-- Indexes for table `tb_crips`
--
ALTER TABLE `tb_crips`
  ADD PRIMARY KEY (`kode_crips`);

--
-- Indexes for table `tb_doc`
--
ALTER TABLE `tb_doc`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `tb_kuota`
--
ALTER TABLE `tb_kuota`
  ADD PRIMARY KEY (`id_kuota`);

--
-- Indexes for table `tb_rel_alternatif`
--
ALTER TABLE `tb_rel_alternatif`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_crips`
--
ALTER TABLE `tb_crips`
  MODIFY `kode_crips` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=538;

--
-- AUTO_INCREMENT for table `tb_doc`
--
ALTER TABLE `tb_doc`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_kuota`
--
ALTER TABLE `tb_kuota`
  MODIFY `id_kuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_rel_alternatif`
--
ALTER TABLE `tb_rel_alternatif`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
