-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 09:29 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `tgl` date NOT NULL DEFAULT current_timestamp(),
  `s_in` time NOT NULL DEFAULT current_timestamp(),
  `ket` enum('Hadir','Izin','Sakit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_absensi`
--

INSERT INTO `tb_absensi` (`id_absensi`, `id_user`, `tgl`, `s_in`, `ket`) VALUES
(6, '41930026', '2021-11-28', '11:12:09', 'Hadir'),
(7, '41930026', '2021-11-28', '11:12:09', 'Hadir'),
(8, '41930037', '2021-11-28', '11:12:09', 'Hadir'),
(14, '41930040', '2021-11-29', '11:35:49', 'Hadir'),
(18, '41930031', '2021-11-29', '16:14:55', 'Hadir'),
(20, '41930031', '2021-11-29', '16:15:16', 'Hadir'),
(28, '41930031', '2021-11-29', '23:39:48', 'Hadir'),
(30, '41930031', '2021-11-30', '09:15:12', 'Hadir'),
(31, '41930031', '2021-11-30', '15:14:54', 'Hadir'),
(34, '41930040', '2021-12-02', '12:48:25', 'Sakit'),
(35, '41930040', '2021-12-02', '15:12:52', 'Sakit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `jkel` enum('L','P') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mahasiswa`, `id_user`, `nama`, `username`, `jkel`, `alamat`, `no_telp`, `instansi`, `gambar`) VALUES
(1, '41930026', 'Dana Putra', 'nanas', 'L', 'Jln. Cargo Permai No.18', '089635524614', 'UNDIKNAS Denpasar', 'dana.jpg'),
(8, '41930037', 'I Gusti Ayu Cintya Wardani', 'cintya', 'P', 'jln. mambal permai', '0989342123', 'UNDIKNAS Denpasar', 'karlin.png'),
(9, '41930031', 'Ida Bagus Puniardhi Isabha Pidada', 'dream', 'L', 'jln. nangka permai', '342893792845', 'UNDIKSHA Denpasar', 'OIP.jpg'),
(11, '41930040', 'yody indra', 'yody', 'L', 'Jln. sesetan raya', '5674523413657', 'UNDIKSHA Denpasar', 'unnamed.jpg'),
(14, '41930012', 'si kungkingkang', 'apel', 'L', 'jln. apel', '6564457687', 'UNDIKNAS Denpasar', 'joao.jpg'),
(19, '41930019', 'si nanas', 'pineapple', 'L', 'jln. nanas', '3563563234', 'UNDIKNAS Denpasar', '223.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('admin','mahasiswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `role`) VALUES
('41930010', 'asd', 'f10e2821bbbea527ea02200352313bc059445190', 'mahasiswa'),
('41930011', 'tes', 'd1c056a983786a38ca76a05cda240c7b86d77136', 'mahasiswa'),
('41930012', 'apel', '414767634010a8ddb3b32c37617c2eb935747940', 'mahasiswa'),
('41930019', 'pineapple', 'ff9907a80070300578eb65a2137670009e8c17cf', 'mahasiswa'),
('41930026', 'nanas', '1230fadb536b6b7b40080bd65336a5e9d4dd507e', 'mahasiswa'),
('41930031', 'dream', '5f04a8843e6c2de610d1da9296cfa2c6169b4a7f', 'mahasiswa'),
('41930032', 'mimpi', '00f7eb213bf25349272667d2d726866255ccb951', 'mahasiswa'),
('41930037', 'cintya', '588129d22c1c9dbffd0a872b5211544cee349d2b', 'mahasiswa'),
('41930040', 'yody', '9aad900cd0ee5d11abe409a8a7f79834dc5faa5a', 'mahasiswa'),
('41930099', 'pisang', '22a35492f3893ad3b9080e504135fb0582cae38a', 'mahasiswa'),
('967106f5-4e87-11ec-95ec-00d861e392f3', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD CONSTRAINT `tb_absensi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD CONSTRAINT `tb_mahasiswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
