-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2020 at 12:54 PM
-- Server version: 5.7.29-log
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stok_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `stok_barang`) VALUES
('8adc896a-8d3b-11ea-9f24-00d861a3c6ec', 'Barang B', 13),
('942aa0bc-7eea-4b93-a8d3-feb0d6862ddd', 'Barang A', 12),
('e6756320-8d3b-11ea-9f24-00d861a3c6ec', 'Barang D', 1),
('e67568b5-8d3b-11ea-9f24-00d861a3c6ec', 'Barang E', 3),
('e6756ce1-8d3b-11ea-9f24-00d861a3c6ec', 'Barang F', 15),
('e6756efd-8d3b-11ea-9f24-00d861a3c6ec', 'Barang G', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_delivery`
--

CREATE TABLE `tb_barang_delivery` (
  `id` int(50) NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `id_delivery` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_delivery`
--

INSERT INTO `tb_barang_delivery` (`id`, `id_barang`, `id_delivery`) VALUES
(1, '942aa0bc-7eea-4b93-a8d3-feb0d6862ddd', '7fd95504-123f-438d-9048-6369e1ff17ff'),
(2, '8adc896a-8d3b-11ea-9f24-00d861a3c6ec', '7fd95504-123f-438d-9048-6369e1ff17ff');

-- --------------------------------------------------------

--
-- Table structure for table `tb_delivery`
--

CREATE TABLE `tb_delivery` (
  `id_delivery` varchar(50) NOT NULL,
  `id_gudang` varchar(50) NOT NULL,
  `id_supir` varchar(50) NOT NULL,
  `id_mobil` varchar(50) NOT NULL,
  `status` enum('Masuk','Keluar') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_delivery`
--

INSERT INTO `tb_delivery` (`id_delivery`, `id_gudang`, `id_supir`, `id_mobil`, `status`, `tanggal`) VALUES
('7fd95504-123f-438d-9048-6369e1ff17ff', 'c53303fc-9622-11ea-964e-00d861a3c6ec', '9108b8b4-c0f9-494b-a4c2-53828997205b', 'cf4bf520-a63a-4248-999e-09f9bf7c62ef', 'Keluar', '2020-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gudang`
--

CREATE TABLE `tb_gudang` (
  `id_gudang` varchar(50) NOT NULL,
  `nama_gudang` varchar(50) NOT NULL,
  `alamat_gudang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gudang`
--

INSERT INTO `tb_gudang` (`id_gudang`, `nama_gudang`, `alamat_gudang`) VALUES
('052da26f-966d-11ea-964e-00d861a3c6ec', 'Gudang B', 'Alamat B'),
('1265aad3-248d-48f7-b4f0-30e1b38cc449', 'Gudang C', 'Alamat C'),
('1cd4827b-9eba-4a54-8886-64512ab9e8ec', 'Gudang D', 'Alamat D'),
('c53303fc-9622-11ea-964e-00d861a3c6ec', 'Gudang A', 'Alamat A');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mobil`
--

CREATE TABLE `tb_mobil` (
  `id_mobil` varchar(50) NOT NULL,
  `merk_mobil` varchar(50) NOT NULL,
  `nomor_kendaraan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mobil`
--

INSERT INTO `tb_mobil` (`id_mobil`, `merk_mobil`, `nomor_kendaraan`) VALUES
('11948f08-05c8-4fc8-85f7-2119aec8aa52', 'mobil6', 'H 1111 J'),
('2ab87cda-6b8a-418b-abca-74bbf0e13610', 'mobil7', 'H 1235 J'),
('4ed7c01d-68b3-43e6-a6db-bb5903368ab5', 'mobil5', 'H 1235 J'),
('52eb72bb-7496-4b32-967c-77dc6d9be50f', 'mobil8', 'H 1111 J'),
('8540e6c0-c89e-4207-898d-8cabd076f966', 'mobil1', 'H 1111 J'),
('a3975a65-ea92-4bbf-9d4a-a45e582ca79e', 'mobil4', 'H 1111 J'),
('ad55dedd-b7b7-4809-9078-fc1a38c951a4', 'mobil3', 'H 1235 J'),
('cf4bf520-a63a-4248-999e-09f9bf7c62ef', 'mobil11', 'H 1111 J'),
('eb390cf5-6797-417d-8866-9534f669555a', 'mobil4', 'H 1235 J'),
('fc6310de-4d5f-4551-aec1-05e3b2eaf7ce', 'mobil9', 'H 1111 J'),
('fe23a01e-3a37-4ff9-9b52-960bed7c6340', 'mobil2', 'H 1111 J');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supir`
--

CREATE TABLE `tb_supir` (
  `id_supir` varchar(50) NOT NULL,
  `nama_supir` varchar(50) NOT NULL,
  `nomor_SIM` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_supir`
--

INSERT INTO `tb_supir` (`id_supir`, `nama_supir`, `nomor_SIM`) VALUES
('9108b8b4-c0f9-494b-a4c2-53828997205b', 'Supir1', '121212121212');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
('553541a7-8362-11ea-8798-00d861a3c6ec', 'Admin UTAMA', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
('afbd6615-54ed-4eb3-8fb4-2ff127121ea9', 'User2', 'Username2', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 1),
('d7d5e8d7-a0f2-11ea-9481-00d861a3c6ec', 'Vieri', 'vie', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_barang_delivery`
--
ALTER TABLE `tb_barang_delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_barang_delivery_ibfk_1` (`id_barang`),
  ADD KEY `tb_barang_delivery_ibfk_2` (`id_delivery`);

--
-- Indexes for table `tb_delivery`
--
ALTER TABLE `tb_delivery`
  ADD PRIMARY KEY (`id_delivery`),
  ADD KEY `id_gudang` (`id_gudang`),
  ADD KEY `id_mobil` (`id_mobil`),
  ADD KEY `id_supir` (`id_supir`);

--
-- Indexes for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indexes for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `tb_supir`
--
ALTER TABLE `tb_supir`
  ADD PRIMARY KEY (`id_supir`),
  ADD UNIQUE KEY `nomor_kendaraan` (`nomor_SIM`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang_delivery`
--
ALTER TABLE `tb_barang_delivery`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_barang_delivery`
--
ALTER TABLE `tb_barang_delivery`
  ADD CONSTRAINT `tb_barang_delivery_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_barang_delivery_ibfk_2` FOREIGN KEY (`id_delivery`) REFERENCES `tb_delivery` (`id_delivery`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_delivery`
--
ALTER TABLE `tb_delivery`
  ADD CONSTRAINT `tb_delivery_ibfk_1` FOREIGN KEY (`id_gudang`) REFERENCES `tb_gudang` (`id_gudang`),
  ADD CONSTRAINT `tb_delivery_ibfk_2` FOREIGN KEY (`id_mobil`) REFERENCES `tb_mobil` (`id_mobil`),
  ADD CONSTRAINT `tb_delivery_ibfk_3` FOREIGN KEY (`id_supir`) REFERENCES `tb_supir` (`id_supir`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
