-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2022 at 09:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pembelian`
--

-- --------------------------------------------------------

--
-- Table structure for table `datapenjualan`
CREATE DATABASE db_pembelian;
use db_pembelian;

CREATE TABLE `datapenjualan` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kode` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `stok_terjual` int(11) NOT NULL,
  `stok_sisa` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `untung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datapenjualan`
--

INSERT INTO `datapenjualan` (`id`, `tanggal`, `kode`, `nama`, `stok_terjual`, `stok_sisa`, `harga_beli`, `harga_jual`, `untung`) VALUES
(1, '2009-11-19', 'BRG01', 'Batik', 23, 12, 70000, 90000, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `dataproduk`
--

CREATE TABLE `dataproduk` (
  `id` int(15) NOT NULL,
  `TanggalInput` date DEFAULT NULL,
  `nama` varchar(40) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `harga` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dataproduk`
--

INSERT INTO `dataproduk` (`id`, `TanggalInput`, `nama`, `kode`, `harga`) VALUES
(62, '0000-00-00', 'Batik Bali', 'BRG01', 700000),
(63, '0000-00-00', 'Batik Solo', 'BRG02', 120000),
(64, '0000-00-00', '', '', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `detailorder`
--

CREATE TABLE `detailorder` (
  `iddetailorder` int(11) NOT NULL,
  `idorder` int(15) DEFAULT NULL,
  `idproduk` int(15) DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `idpesanan`
--

CREATE TABLE `idpesanan` (
  `idpesanan` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `iduser` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `idmasuk` int(11) NOT NULL,
  `idproduk` int(20) DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idpelanggan` int(11) NOT NULL,
  `namapelanggan` varchar(50) NOT NULL,
  `notelp` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idpelanggan`, `namapelanggan`, `notelp`, `alamat`) VALUES
(1, 'Budi', '0898237278', 'Jln.Soekarno no 64');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `bulan` varchar(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `hasilpenjualan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `bulan`, `tahun`, `hasilpenjualan`) VALUES
(1, 'January', 2016, 10),
(2, 'February', 2016, 12),
(3, 'Maret', 2016, 13),
(4, 'April', 2016, 18),
(5, 'May', 2017, 16),
(6, 'Juni', 2016, 14),
(7, 'July', 2016, 15),
(8, 'Agustus', 2016, 12),
(9, 'September', 2016, 19),
(10, 'Oktober', 2016, 12),
(11, 'November', 2016, 12),
(12, 'Desember', 2016, 20);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `hargajual` int(20) DEFAULT NULL,
  `laba` int(20) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idproduk` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `hargajual`, `laba`, `tanggal`, `idproduk`) VALUES
(1, 200000, 3000, '2022-11-26 06:35:43', 7);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(15) NOT NULL,
  `namaproduk` varchar(40) NOT NULL,
  `deskripsi` varchar(70) NOT NULL,
  `harga` int(30) NOT NULL,
  `stok` int(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `namaproduk`, `deskripsi`, `harga`, `stok`, `tanggal`) VALUES
(3, 'Buku', 'Harry Poter 2', 100000, 20, '2022-11-26 08:34:26'),
(5, 'Makanan', 'Biskuit', 20000, 20, '2022-11-26 08:34:26'),
(6, 'Baju', 'Batik Solo', 80000, 50, '2022-11-26 08:34:26'),
(7, 'Baju', 'Batik Solo', 80000, 50, '2022-11-26 08:34:26'),
(8, 'Snackbuah', 'Fanta', 890000, 20, '2022-11-26 08:34:26'),
(9, 'Minuman', 'CocaCola', 13000, 500, '2022-11-26 08:34:26'),
(10, 'Bajuu', 'Batik Solo', 89000, 20, '2022-11-26 08:34:26'),
(13, 'dsfdd', 'wewewgfs', 233333, 20, '2022-11-26 08:34:26'),
(14, 'Baju', 'Batik Solo', 89000, 500, '2022-11-26 08:34:26'),
(19, 'dsfdd', 'dsfdsdsg', 233333, 20, '2022-11-26 08:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(6, 'admin toko', 'admintoko', '202cb962ac59075b964b07152d234b70', 'admin'),
(7, 'kasir toko', 'kasirtoko', '81dc9bdb52d04dc20036dbd8313ed055', 'kasir'),
(8, 'pelanggan Rudi', 'pelanggan', '12345', 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datapenjualan`
--
ALTER TABLE `datapenjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dataproduk`
--
ALTER TABLE `dataproduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailorder`
--
ALTER TABLE `detailorder`
  ADD PRIMARY KEY (`iddetailorder`),
  ADD KEY `idproduk` (`idproduk`);

--
-- Indexes for table `idpesanan`
--
ALTER TABLE `idpesanan`
  ADD PRIMARY KEY (`idpesanan`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`idmasuk`),
  ADD KEY `idproduk` (`idproduk`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idproduk` (`idproduk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
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
-- AUTO_INCREMENT for table `datapenjualan`
--
ALTER TABLE `datapenjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dataproduk`
--
ALTER TABLE `dataproduk`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `detailorder`
--
ALTER TABLE `detailorder`
  MODIFY `iddetailorder` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `idpesanan`
--
ALTER TABLE `idpesanan`
  MODIFY `idpesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idpelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailorder`
--
ALTER TABLE `detailorder`
  ADD CONSTRAINT `detailorder_ibfk_1` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`id`);

--
-- Constraints for table `idpesanan`
--
ALTER TABLE `idpesanan`
  ADD CONSTRAINT `idpesanan_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`);

--
-- Constraints for table `masuk`
--
ALTER TABLE `masuk`
  ADD CONSTRAINT `masuk_ibfk_1` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`id`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
