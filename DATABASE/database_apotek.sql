-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2021 pada 05.24
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `barang`
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
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`ID_Barang`, `nama_barang`, `kategori`, `harga_jual`, `harga_beli`, `stok`) VALUES
(1, 'Alkohol Swap', 'Obat', 16000, 13000, 186),
(2, 'Paracetamol', 'Obat', 10000, 9000, 87),
(3, 'Acarbose', 'obat', 14000, 15000, 98),
(20210707, 'Acyclovir Dexa', 'obat', 18000, 17000, 98);

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli`
--

CREATE TABLE `beli` (
  `ID_Beli` int(10) NOT NULL,
  `ID_Barang` int(10) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_barang` int(10) NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `beli`
--

INSERT INTO `beli` (`ID_Beli`, `ID_Barang`, `nama_pelanggan`, `alamat`, `tanggal`, `jumlah_barang`, `total`) VALUES
(26, 1, 'muhammad naufal hafizh', 'magetan, rt03 rw03', '2021-07-11', 1, 30000),
(27, 3, 'muhammad naufal hafizh', 'magetan, rt03 rw03', '2021-07-11', 1, 30000),
(28, 1, 'alfy', 'ngariboyo', '2021-07-11', 2, 46000),
(29, 3, 'alfy', 'ngariboyo', '2021-07-11', 1, 46000),
(30, 20210707, 'test', 'test', '2021-07-11', 1, 18000),
(31, 20210707, 'bambang', 'ngariboyo', '2021-07-11', 1, 42000),
(32, 3, 'bambang', 'ngariboyo', '2021-07-11', 1, 42000),
(33, 2, 'bambang', 'ngariboyo', '2021-07-11', 1, 42000),
(34, 2, 'hafizh', 'ngariboyo', '2021-07-11', 2, 20000);

--
-- Trigger `beli`
--
DELIMITER $$
CREATE TRIGGER `penjualan_barang` AFTER INSERT ON `beli` FOR EACH ROW BEGIN
	UPDATE barang SET stok=stok-NEW.jumlah_barang
    WHERE ID_Barang = NEW.ID_Barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
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
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`ID_Pegawai`, `Nama`, `Posisi`, `Alamat`, `Jenis_kelamin`, `No_Telp`) VALUES
(2021048, 'Mitsuki', 'Kepala', 'Central City', 'Laki', '084958698496'),
(2021453, 'Jarwo', 'Staff', 'Dungboto', 'Perempuan', '08229384958'),
(2021594, 'Hidan no aria', 'Staff', 'akihabara', 'Perempuan', '083959439584'),
(2021596, 'Anjas', 'Staff', 'Jayapura', 'Laki', '084948594385');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `ID_Supplier` int(11) NOT NULL,
  `nama_supplier` varchar(20) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `No_Telp` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`ID_Supplier`, `nama_supplier`, `alamat_supplier`, `No_Telp`) VALUES
(2021851, 'Jihan', 'malaysia', '082934789489'),
(2021852, 'Aira', 'Istana Raja I Kebumen', '083994856932'),
(2021853, 'Tatsui', 'Tokyo', '084948594385'),
(2021854, 'Sei', 'Mongolia', '083994856932'),
(2021855, 'Tatsuianjaiyani', 'palembang', '084948594385'),
(2021856, 'Dhea', 'Jakarta', '083959439584'),
(2021857, 'Elsa', 'Bali', '084958698495'),
(2021858, 'Kintana', 'New York', '082394059405'),
(2021859, 'Ulum nadia', 'hindia', '082294859485');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_User`, `nama`, `email`, `level`, `username`, `password`) VALUES
(20210501, 'Mitsuki', 'Mitsuki@gmail.com', 'kepala', 'head01', 'head01'),
(20210502, 'Jarwo', 'Jarwokuat@gmail.com', 'staff', 'staff01', 'staff01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_Barang`);

--
-- Indeks untuk tabel `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`ID_Beli`);

--
-- Indeks untuk tabel `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID_Pegawai`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`ID_Supplier`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `ID_Barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20210708;

--
-- AUTO_INCREMENT untuk tabel `beli`
--
ALTER TABLE `beli`
  MODIFY `ID_Beli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `ID_Supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2021860;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20210503;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
