-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2019 at 03:47 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `kerusakan`
--

CREATE TABLE IF NOT EXISTS `kerusakan` (
`id_kerusakan` int(11) NOT NULL,
  `keterangan` varchar(25) NOT NULL,
  `jenis_diesel` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kerusakan`
--

INSERT INTO `kerusakan` (`id_kerusakan`, `keterangan`, `jenis_diesel`) VALUES
(2, 'rusak berat', 'genset'),
(3, 'rusak ringan', 'mobil');

-- --------------------------------------------------------

--
-- Table structure for table `montir`
--

CREATE TABLE IF NOT EXISTS `montir` (
`id_montir` int(11) NOT NULL,
  `nama_montir` varchar(50) NOT NULL,
  `no_telp` int(15) NOT NULL,
  `alamat` text NOT NULL,
  `aksi` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `montir`
--

INSERT INTO `montir` (`id_montir`, `nama_montir`, `no_telp`, `alamat`, `aksi`) VALUES
(1, 'nbhjj', 98765, 'p,amjhshb', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
`idpelanggan` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tanggal_booking` date NOT NULL,
  `montir` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `kerusakan` varchar(25) NOT NULL,
  `pembayaran` varchar(25) NOT NULL,
  `no_telp` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idpelanggan`, `nama`, `tanggal_booking`, `montir`, `alamat`, `kerusakan`, `pembayaran`, `no_telp`) VALUES
(9, 'tfavb', '0000-00-00', 'nbhjj', 'Pariaman', 'rusak', 'cash', 2147483647),
(12, 'deana', '0000-00-00', 'nbhjj', 'msjidj', 'rusak', 'transfer', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
`idpembayaran` int(11) NOT NULL,
  `jenis_pembayaran` varchar(25) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`idpembayaran`, `jenis_pembayaran`, `keterangan`) VALUES
(1, 'transfer', 'lunas'),
(2, 'cash', 'lunas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`iduser` smallint(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `level`) VALUES
(1, 'admin', 'nimda', 'admin'),
(2, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
(8, 'rara', '12345', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kerusakan`
--
ALTER TABLE `kerusakan`
 ADD PRIMARY KEY (`id_kerusakan`);

--
-- Indexes for table `montir`
--
ALTER TABLE `montir`
 ADD PRIMARY KEY (`id_montir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`idpelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
 ADD PRIMARY KEY (`idpembayaran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kerusakan`
--
ALTER TABLE `kerusakan`
MODIFY `id_kerusakan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `montir`
--
ALTER TABLE `montir`
MODIFY `id_montir` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
MODIFY `idpelanggan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
MODIFY `idpembayaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `iduser` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
