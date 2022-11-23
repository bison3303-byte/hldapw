-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Nov 2022 pada 06.01
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `datapenjualan`
--

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
-- Dumping data untuk tabel `datapenjualan`
--

INSERT INTO `datapenjualan` (`id`, `tanggal`, `kode`, `nama`, `stok_terjual`, `stok_sisa`, `harga_beli`, `harga_jual`, `untung`) VALUES
(1, '2009-11-19', 'BRG01', 'Batik', 23, 12, 70000, 90000, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataproduk`
--

CREATE TABLE `dataproduk` (
  `id` int(15) NOT NULL,
  `TanggalInput` date DEFAULT NULL,
  `nama` varchar(40) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `harga` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dataproduk`
--

INSERT INTO `dataproduk` (`id`, `TanggalInput`, `nama`, `kode`, `harga`) VALUES
(62, '0000-00-00', 'Batik Bali', 'BRG01', 700000),
(63, '0000-00-00', 'Batik Solo', 'BRG02', 120000),
(64, '0000-00-00', '', '', 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailorder`
--

CREATE TABLE `detailorder` (
  `iddetailorder` int(11) NOT NULL,
  `idorder` int(15) DEFAULT NULL,
  `idproduk` int(15) DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `idpesanan`
--

CREATE TABLE `idpesanan` (
  `idpesanan` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `iduser` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `masuk`
--

CREATE TABLE `masuk` (
  `idmasuk` int(11) NOT NULL,
  `idproduk` int(20) DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idpelanggan` int(11) NOT NULL,
  `namapelanggan` varchar(50) NOT NULL,
  `notelp` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`idpelanggan`, `namapelanggan`, `notelp`, `alamat`) VALUES
(1, 'Budi', '0898237278', 'Jln.Soekarno no 64');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(15) NOT NULL,
  `namaproduk` varchar(40) NOT NULL,
  `deskripsi` varchar(70) NOT NULL,
  `harga` int(30) NOT NULL,
  `stok` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idproduk`, `namaproduk`, `deskripsi`, `harga`, `stok`) VALUES
(3, 'Buku', 'Harry Poter', 100000, 12),
(4, 'Pensil', 'Harry Poter', 700000, 12),
(5, 'Makanan', 'Biskuit', 20000, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(15) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`) VALUES
(6, 'admin', '$2y$10$1ST/soGbJvjd0sYOMS2RoeI7P19HUc9Y7C6QynJEMMUC7X.cJAyS.'),
(7, 'kasir', '$2y$10$Ti2CzWu5dEA4NQsgF3g8yeW9CcJ0qUTkS0kxYx71AmbAHy9vxieHe'),
(8, 'kasir', '$2y$10$Xx93kFvR7Y/AjQ/IZMgjEuqcgYiCsv4xhahlj9to7btRCBCpUFQwu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `iduser` int(15) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`iduser`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$niuRlBctk9R9gVV3ej/S7egr/Jam');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `datapenjualan`
--
ALTER TABLE `datapenjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dataproduk`
--
ALTER TABLE `dataproduk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  ADD PRIMARY KEY (`iddetailorder`),
  ADD KEY `idproduk` (`idproduk`);

--
-- Indeks untuk tabel `idpesanan`
--
ALTER TABLE `idpesanan`
  ADD PRIMARY KEY (`idpesanan`),
  ADD KEY `iduser` (`iduser`);

--
-- Indeks untuk tabel `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`idmasuk`),
  ADD KEY `idproduk` (`idproduk`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `datapenjualan`
--
ALTER TABLE `datapenjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dataproduk`
--
ALTER TABLE `dataproduk`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  MODIFY `iddetailorder` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `idpesanan`
--
ALTER TABLE `idpesanan`
  MODIFY `idpesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `masuk`
--
ALTER TABLE `masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idpelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  ADD CONSTRAINT `detailorder_ibfk_1` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`);

--
-- Ketidakleluasaan untuk tabel `idpesanan`
--
ALTER TABLE `idpesanan`
  ADD CONSTRAINT `idpesanan_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Ketidakleluasaan untuk tabel `masuk`
--
ALTER TABLE `masuk`
  ADD CONSTRAINT `masuk_ibfk_1` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
