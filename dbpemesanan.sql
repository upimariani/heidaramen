-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Apr 2022 pada 03.25
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpemesanan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(50) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `no_meja` int(11) DEFAULT NULL,
  `total_belanja` int(50) NOT NULL,
  `konfirmasi` int(1) DEFAULT 0,
  `bayar` int(30) DEFAULT NULL,
  `kembalian` int(30) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_user`, `username`, `tanggal_pemesanan`, `no_meja`, `total_belanja`, `konfirmasi`, `bayar`, `kembalian`, `keterangan`) VALUES
('202110253RSVKNYD', 4, 'Alfirdaus ', '2021-10-25', 1, 172000, 1, 200000, 28000, '-'),
('20211111LLGN2TCH', 18, 'Upi Mariani', '2021-11-11', 1, 72000, 1, 80000, 8000, 'sas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_produk`
--

CREATE TABLE `pemesanan_produk` (
  `id_pemesanan_produk` int(50) NOT NULL,
  `id_pemesanan` varchar(50) NOT NULL,
  `id_menu` varchar(50) NOT NULL,
  `jumlah` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan_produk`
--

INSERT INTO `pemesanan_produk` (`id_pemesanan_produk`, `id_pemesanan`, `id_menu`, `jumlah`) VALUES
(1, '202110253RSVKNYD', '28', 3),
(2, '202110253RSVKNYD', '27', 1),
(3, '20211111LLGN2TCH', '28', 1),
(4, '20211111LLGN2TCH', '27', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_menu` int(50) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `jenis_menu` varchar(50) NOT NULL,
  `stok` int(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `diskon` int(50) DEFAULT 0,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_menu`, `nama_menu`, `jenis_menu`, `stok`, `harga`, `diskon`, `gambar`) VALUES
(27, 'Coffe Latte 3', 'Minuman', 12, 25000, 12, 'html1.png'),
(28, 'coffe late hazelnut', 'Minuman', 70, 50000, 0, 'powerdesigner1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat`
--

CREATE TABLE `tempat` (
  `id_tempat` int(11) NOT NULL,
  `nama_tempat` varchar(15) DEFAULT NULL,
  `no_tempat` int(11) DEFAULT NULL,
  `status_tempat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tempat`
--

INSERT INTO `tempat` (`id_tempat`, `nama_tempat`, `no_tempat`, `status_tempat`) VALUES
(1, 'letter l edit', 15, 0),
(3, 'double', 10, 1),
(4, 'double', 13, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `hp` varchar(25) NOT NULL,
  `status` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `hp`, `status`) VALUES
(1, 'daus', 'daus123', 'Alfirdaus ', 'Laki-Laki', '1998-05-28', 'Tanjung Piayu', '089560328673', 'admin'),
(2, 'rinaldo', 'rinaldo123', 'Rinaldo', 'Laki-Laki', '1999-01-11', 'Tanjung Uma', '085233748222', 'user'),
(4, 'user', 'user', 'Rinaldo', 'Laki-Laki', '1998-10-22', 'Tanjung Uma', '089560328673', 'user'),
(5, 'rinaldo', 'rinaldo', 'Rinaldo', 'Laki-Laki', '1999-02-23', 'Tanjung Uma', '089123614882', 'user'),
(6, 'daus', 'daus123', 'Alfirdaus Muhammad Farhan', 'Laki-Laki', '1998-05-14', 'Tanjung Piayu', '085233748222', 'admin'),
(7, 'riki', '12345', 'riki afrizon', 'Laki-Laki', '1998-06-25', 'kuningan', '054548752', 'user'),
(8, 'saya', 'saya', 'saya', 'Laki-Laki', '2021-07-08', 'Ciawilor', '0857-3163-9595', 'user'),
(9, 'customer', '12345', 'contoh', 'Perempuan', '2021-07-22', 'Ciawilor', '0857-3163-9595', 'user'),
(10, 'intan', '12345', 'intan', 'Perempuan', '1998-05-27', 'kuningan', '085796452138', 'user'),
(11, 'intan', '12345', 'intan sari', 'Perempuan', '1998-05-13', 'kuningan', '085796452138', 'user'),
(12, 'upmar', 'upimariani', 'Upi Mariani', 'Perempuan', '2021-09-16', 'Winduherang', '085523369874', 'admin'),
(13, 'rizkimuhammad', 'rizkikiki', 'Rizki', 'Laki-Laki', '2021-09-16', 'Ciawigebang', '085523369874', 'admin'),
(14, 'admin', 'ahmas', 'Rowina', 'Perempuan', '2021-09-15', 'Ciawi', '085523369874', 'admin'),
(15, 'dsds', 'dsds', 'Rizki', 'on', '2021-09-23', 'dsds', '085523369874', 'user'),
(16, 'a', 'd', 'Upi Mariani', 'Perempuan', '2021-09-24', 'dsds', '085523369874', 'user'),
(17, 'upmar', 'mariani', 'Upi Mariani', 'Perempuan', '2021-03-17', 'Kuningan', '085523369874', 'user'),
(18, 'username', 'username', 'Upi Mariani', 'Perempuan', '2021-11-20', 'Kuningan', '085523369874', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `pemesanan_produk`
--
ALTER TABLE `pemesanan_produk`
  ADD PRIMARY KEY (`id_pemesanan_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pemesanan_produk`
--
ALTER TABLE `pemesanan_produk`
  MODIFY `id_pemesanan_produk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_menu` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tempat`
--
ALTER TABLE `tempat`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
