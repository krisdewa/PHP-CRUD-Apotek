-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 02:56 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `ID_Barang` int(11) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_Barang`, `nama_barang`, `kategori`, `harga_jual`, `harga_beli`, `stok`) VALUES
(12121, 'Ultramilk', 'Sembako', 5000, 3500, 1000),
(2021931, '', '', 0, 0, 0),
(2021932, '', '', 0, 0, 0),
(2021940, '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `ID_Pegawai` int(11) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `Posisi` varchar(20) NOT NULL,
  `Alamat` text NOT NULL,
  `Jenis_kelamin` varchar(20) NOT NULL,
  `No_Telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID_Pegawai`, `Nama`, `Posisi`, `Alamat`, `Jenis_kelamin`, `No_Telp`) VALUES
(34234, 'jihan', 'ajudan 2', 'madiun', 'laki', '342424'),
(903948, 'giantr', 'perempuan', 'malang', 'staff penimbang', '082248953948'),
(903953, '', '', '', '', ''),
(903954, 'hesoyam', 'wadon', 'asdasdad', 'ptani', '1313');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `ID_Supplier` int(11) NOT NULL,
  `nama_supplier` varchar(20) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `No_Telp` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`ID_Supplier`, `nama_supplier`, `alamat_supplier`, `No_Telp`) VALUES
(2021853, 'Tatsui', 'Tokyo', '084948594385'),
(2021854, 'Sei', 'Mongolia', '083994856932'),
(2021855, 'Tatsuianjaiyani', 'palembang', '084948594385'),
(2021856, 'Dhea', 'Jakarta', '083959439584'),
(2021857, 'Elsa', 'Bali', '084958698495'),
(2021860, '', '', ''),
(2021861, '', '', ''),
(2021862, 'dinan', 'jogja', '082236474758');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_User` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_User`, `nama`, `email`, `level`, `username`, `password`) VALUES
(23453, 'krisna', 'krisdewa23@gmail.com', 'kepala', 'krisdewa', 'nopassword'),
(247923, 'gentha', 'gentha101@gmail.com', 'staff', 'gntha', 'nopassword'),
(247924, 'naufak', 'naufak@gmail.com', 'staff', 'naufak', '827ccb0eea8a706c4c34a16891f84e7b'),
(247925, 'Naufak hakim', 'naufak1@gmail.com', 'staff', 'naufak1@gmail.com', '12345'),
(247926, 'asdas', 'aasdasd', 'staff', 'asd', 'dsadad'),
(247927, 'adasdasdadad', 'adadad', 'staff', 'asdasd', 'asdasd'),
(247928, 'asdasdasdas', 'ds fdsfsdf', 'staff', 'sfsdfsdf', 'sdfsfd'),
(247933, '', '', 'staff', '', ''),
(247934, 'Dewa', 'dewa', 'staff', 'dewa', 'dewa'),
(247935, 'staff', 'staff', 'staff', 'staff', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_Barang`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID_Pegawai`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`ID_Supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `ID_Barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2021941;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `ID_Pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=903955;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `ID_Supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2021863;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247936;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
