-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Agu 2023 pada 13.38
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gigi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_akun` varchar(200) NOT NULL,
  `phone` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_akun`
--

INSERT INTO `tbl_akun` (`id_akun`, `username`, `password`, `email`, `nama_akun`, `phone`) VALUES
(1, 'admin', 'admin', 'ghifari983@gmail.com', 'Drg Dwi Lianasari', '081249723990');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int(11) NOT NULL,
  `id_tindakan` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_transaksi`
--

CREATE TABLE `tbl_detail_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_tindakan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_detail_transaksi`
--

INSERT INTO `tbl_detail_transaksi` (`id_transaksi`, `id_tindakan`) VALUES
(58, 5),
(62, 5),
(64, 5),
(57, 6),
(61, 6),
(60, 7),
(61, 7),
(64, 7),
(57, 8),
(59, 8),
(63, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(200) NOT NULL,
  `no_hp` char(15) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `hari` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id_pasien`, `nama_pasien`, `no_hp`, `alamat`, `tgl_periksa`, `jenis_kelamin`, `status`, `hari`) VALUES
(49, 'Kotahime', '21312', ' sdadas', '2023-08-08', 'laki-laki', 'finish', 'Tue'),
(50, 'gipar', '321321', '  dsada', '2023-08-08', 'laki-laki', 'finish', 'Tue'),
(54, 'Madara', '21321', ' dsads', '2023-08-09', 'laki-laki', 'finish', 'Wed'),
(55, 'Sadao', '2132', '  dsadas', '2023-08-08', 'laki-laki', 'finish', 'Tue'),
(56, 'Jaddam', '434535', ' gfdgdfg', '2023-08-09', 'laki-laki', 'finish', 'Wed'),
(57, 'Akkun', '13123', 'dsadsad', '2023-08-19', 'laki-laki', 'finish', 'Sat'),
(59, 'Gipar', '213213', 'eqeqwe', '2023-08-10', 'laki-laki', 'finish', 'Thu'),
(60, 'Maou Sama', '123123', 'Konoha', '2023-08-11', 'laki-laki', 'finish', 'Fri'),
(61, 'nadya ', '3213123', 'jember', '2023-08-11', 'laki-laki', 'finish', 'Fri'),
(62, 'sonna', '3123', ' konoha', '2023-08-12', 'laki-laki', 'finish', 'Sat'),
(63, 'nessa', '31231', 'sadsadsad', '2023-08-11', 'perempuan', 'finish', 'Fri'),
(64, 'Haruka', '13123123', 'Mojokerto', '2023-08-18', 'perempuan', 'pending', 'Fri'),
(65, 'Hrin', '213123', 'new yok', '2023-08-17', 'perempuan', 'pending', 'Thu'),
(66, 'adi', '213213123', 'jember', '2023-08-13', 'laki-laki', 'finish', 'Sun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengeluaran`
--

CREATE TABLE `tbl_pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `nama_pengeluaran` varchar(200) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `hari` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pengeluaran`
--

INSERT INTO `tbl_pengeluaran` (`id_pengeluaran`, `nama_pengeluaran`, `total_harga`, `keterangan`, `tgl_pengeluaran`, `hari`) VALUES
(5, 'beli nasgor', 50000, 'dsadsa', '2023-08-11', 'Fri'),
(6, 'beli miee', 90000, 'sdasdasd', '2023-08-11', 'Fri'),
(7, 'beli alat', 100000, 'blablabla', '2023-08-11', 'Fri'),
(8, 'beli alat', 50000, 'sdasds', '2023-08-12', 'Sat'),
(10, 'beli hunn', 100000, 'bobo', '2023-08-12', 'Sat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tindakan`
--

CREATE TABLE `tbl_tindakan` (
  `id_tindakan` int(11) NOT NULL,
  `nama_tindakan` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_tindakan`
--

INSERT INTO `tbl_tindakan` (`id_tindakan`, `nama_tindakan`, `harga`, `keterangan`) VALUES
(5, 'Behel', 3000000, '    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia est nec tortor faucibus vehicula. Mauris tincidunt magna bibendum tristique rutrum. Phasellus posuere dignissim ornare. Vestibulum vitae auctor elit. Suspendisse efficitur gravida lacus, ut cursus elit pharetra vitae. Etiam eget vulputate neque. Nam vitae lacus nibh. Suspendisse at metus leo. Proin eu suscipit velit, vitae rhoncus diam. Vivamus luctus odio eu enim rutrum interdum. Nam semper suscipit ex in congue.\r\n\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam porttitor vehicula ullamcorper. Morbi non imperdiet augue. Morbi lobortis suscipit odio a vulputate. Cras lacinia nulla in sapien ornare iaculis. Quisque et euismod magna. Morbi molestie accumsan massa, sit amet venenatis ante eleifend ut. Donec dictum imperdiet tempor. Cras eget euismod nunc, sed consequat felis. Quisque placerat ligula sit amet faucibus imperdiet. Integer pulvinar porta lectus, ut accumsan sapien finibus in. Nam id sem erat. Praesent bibendum libero ac risus aliquet ultricies. Etiam ut porta orci.'),
(6, 'Perawatan gigi', 25000, 'lorem'),
(7, 'Tambal gigi', 5000, 'dsadsad'),
(8, 'Scalling', 100000, 'sdadasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `jumlah_uang` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `metode_pembayaran` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `id_akun` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `tgl_trans` date NOT NULL,
  `hari` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `grand_total`, `jumlah_uang`, `kembali`, `metode_pembayaran`, `keterangan`, `id_akun`, `id_pasien`, `tgl_trans`, `hari`) VALUES
(57, 125000, 150000, 25000, 'tunai', 'bolehhh', 1, 59, '2023-08-10', 'Thu'),
(58, 3000000, 3000000, 0, 'tunai', 'nasieee', 1, 59, '2023-08-10', 'Thu'),
(59, 100000, 100000, 0, 'tunai', 'woooo', 1, 59, '2023-08-10', 'Thu'),
(60, 5000, 10000, 5000, 'tunai', 'lunas', 1, 61, '2023-08-11', 'Fri'),
(61, 30000, 50000, 20000, 'tunai', 'masuookkk', 1, 60, '2023-08-11', 'Fri'),
(62, 3000000, 3000000, 0, 'tunai', 'tidak ada', 1, 63, '2023-08-11', 'Fri'),
(63, 100000, 100000, 0, 'tunai', 'dadsda', 1, 62, '2023-08-12', 'Sat'),
(64, 3005000, 4000000, 995000, 'tunai', 'adsadasddas', 1, 66, '2023-08-13', 'Sun');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `relasi_tindakan` (`id_tindakan`);

--
-- Indeks untuk tabel `tbl_detail_transaksi`
--
ALTER TABLE `tbl_detail_transaksi`
  ADD PRIMARY KEY (`id_tindakan`,`id_transaksi`),
  ADD KEY `tbl_detail_transaksi_ibfk_2` (`id_transaksi`);

--
-- Indeks untuk tabel `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `tbl_tindakan`
--
ALTER TABLE `tbl_tindakan`
  ADD PRIMARY KEY (`id_tindakan`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_akun` (`id_akun`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_tindakan`
--
ALTER TABLE `tbl_tindakan`
  MODIFY `id_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `relasi_tindakan` FOREIGN KEY (`id_tindakan`) REFERENCES `tbl_tindakan` (`id_tindakan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_detail_transaksi`
--
ALTER TABLE `tbl_detail_transaksi`
  ADD CONSTRAINT `tbl_detail_transaksi_ibfk_1` FOREIGN KEY (`id_tindakan`) REFERENCES `tbl_tindakan` (`id_tindakan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_transaksi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `tbl_transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `tbl_akun` (`id_akun`),
  ADD CONSTRAINT `tbl_transaksi_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `tbl_pasien` (`id_pasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
