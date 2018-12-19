-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18 Apr 2018 pada 17.19
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(10) NOT NULL,
  `banner` varchar(100) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `link` varchar(500) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`banner_id`, `banner`, `gambar`, `link`, `status`) VALUES
(3, 'banner-1', 'Daftar_3.png', 'index.php?page=detail&barang_id=6', 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(10) NOT NULL,
  `kategori_id` int(10) NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `spesifikasi` text NOT NULL,
  `gambar` varchar(300) NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` tinyint(1) NOT NULL,
  `link` varchar(200) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`barang_id`, `kategori_id`, `nama_barang`, `spesifikasi`, `gambar`, `harga`, `stok`, `link`, `status`) VALUES
(18, 5, 'blouse keren', '<p>Jasmin Syar&#39;I</p><p>SEKARANG Rp&nbsp;275.960</p><p>Jasmin Syar&#39;I by Haba by Bel. Corpo<br /><br />Detail dress:<br />- Poliester<br />- Warna&nbsp;<em>pink</em><br />- Kerah bulat<br />- Lengan panjang<br />- Motif bung<br /><br />Detail hijab:<br />- Poliester<br />- Warna&nbsp;<em>pink</em><br />- Detail topi pet<br />- Jahitan di bagian tepi</p>', '2.JPG', 656000, 25, '', 'on'),
(19, 5, 'Blouse A', '', '2.JPG', 300000, 8, '', 'on'),
(20, 6, 'Covering Story', '<p>- Tunik motif garis detail balloon sleeve<br />- Warna ivory navy<br />- Kerah bulat<br />- Unlined<br />- Regular fit<br />- Kancing belakang</p>', '7.jpg', 400000, 26, '', 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(10) NOT NULL,
  `kategori` varchar(150) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori`, `status`) VALUES
(5, 'Blouse', 'on'),
(6, 'Tunic', 'on'),
(8, 'Jumpsuit', 'on'),
(9, 'Mukena', 'on'),
(10, 'Sajadah', 'on'),
(11, 'Outerwear', 'on'),
(12, 'Gamis', 'on'),
(13, 'Manset', 'on'),
(14, 'Pashmina', 'on'),
(15, 'Khimar', 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode`
--

CREATE TABLE `kode` (
  `kode_id` int(10) NOT NULL,
  `diskon` float NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kode`
--

INSERT INTO `kode` (`kode_id`, `diskon`, `status`) VALUES
(0, 0, 0),
(123, 0.05, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `konfirmasi_id` int(10) NOT NULL,
  `pesanan_id` int(10) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_account` varchar(150) NOT NULL,
  `tanggal_transfer` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`konfirmasi_id`, `pesanan_id`, `nomor_rekening`, `nama_account`, `tanggal_transfer`) VALUES
(1, 2, '0008888', 'Jeong', '2016-06-19'),
(2, 3, '0008888', 'Lee', '2016-06-19'),
(3, 4, '0008888', 'Jeong', '2016-06-19'),
(4, 12, '234902-523498-24980', 'sevia', '2018-04-13'),
(5, 42, '546857854', 'Raisul Muhalani', '2018-04-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `kota_id` int(10) NOT NULL,
  `kota` varchar(150) NOT NULL,
  `tarif` int(10) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`kota_id`, `kota`, `tarif`, `status`) VALUES
(1, 'Jakarta', 6000, 'on'),
(2, 'Bandung', 8000, 'on'),
(3, 'Surabaya', 11000, 'on'),
(4, 'Semarang', 9000, 'on'),
(5, 'pemalang', 10000, 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `pesanan_id` int(10) NOT NULL,
  `kota_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `nama_penerima` varchar(150) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`pesanan_id`, `kota_id`, `user_id`, `nama_penerima`, `nomor_telepon`, `alamat`, `tanggal_pemesanan`, `status`) VALUES
(2, 2, 2, 'Jeong', '00000', 'Jl. XXXXX', '2016-10-08 06:11:24', 1),
(3, 3, 6, 'Lee', '0000', 'Jl. aaaa', '2016-10-08 10:48:45', 2),
(4, 1, 6, 'Lee', '0000', 'Jl. AAA', '2016-10-08 12:01:55', 2),
(8, 1, 2, 'sfs', '3113', 'sdsfsf', '2018-03-09 21:50:57', 0),
(10, 1, 2, 'panjul', '0978', 'sdsfsfs', '2018-03-13 05:05:34', 0),
(11, 1, 2, '', '', '', '2018-03-13 05:07:01', 0),
(12, 2, 7, 'sevia', '4320780', 'GPA', '2018-04-13 07:48:10', 2),
(13, 1, 7, 'sd', '98321', 'GPA', '2018-04-13 07:58:39', 0),
(14, 1, 7, 'vjlksdh', '2176893', 'bsdkl', '2018-04-13 07:59:31', 0),
(15, 1, 7, '', '', '', '2018-04-13 08:11:50', 0),
(16, 1, 7, '', '', '', '2018-04-13 08:14:50', 0),
(17, 1, 7, '', '', '', '2018-04-13 08:27:49', 0),
(18, 1, 2, '', '', '', '2018-04-13 08:49:33', 0),
(19, 1, 2, '', '', '', '2018-04-13 08:49:52', 0),
(20, 1, 2, '', '', '', '2018-04-13 08:50:36', 0),
(21, 1, 2, '', '', '', '2018-04-13 08:51:20', 0),
(22, 1, 2, '', '', '', '2018-04-13 08:51:32', 0),
(23, 1, 2, '', '', '', '2018-04-13 08:58:50', 0),
(24, 1, 2, '', '', '', '2018-04-13 09:00:18', 0),
(25, 1, 2, '', '', '', '2018-04-13 09:00:58', 0),
(26, 1, 2, '', '', '', '2018-04-13 09:02:01', 0),
(27, 1, 2, '', '', '', '2018-04-13 09:02:20', 0),
(28, 1, 2, '', '', '', '2018-04-13 09:02:55', 0),
(29, 1, 2, '', '', '', '2018-04-13 09:03:20', 0),
(30, 1, 2, '', '', '', '2018-04-13 09:05:03', 0),
(31, 1, 2, '', '', '', '2018-04-13 09:12:39', 0),
(32, 1, 2, '', '', '', '2018-04-13 09:14:05', 0),
(33, 1, 2, '', '', '', '2018-04-13 09:15:59', 0),
(34, 1, 2, '', '', '', '2018-04-13 09:21:28', 0),
(35, 1, 2, '', '', '', '2018-04-13 09:21:52', 0),
(36, 1, 2, '', '', '', '2018-04-13 09:29:05', 0),
(37, 1, 2, '', '', '', '2018-04-13 09:29:33', 0),
(38, 1, 2, '', '', '', '2018-04-13 09:33:26', 2),
(39, 1, 2, '', '', '', '2018-04-13 09:56:09', 0),
(40, 1, 2, '', '', '', '2018-04-13 09:58:50', 0),
(41, 1, 2, '', '', '', '2018-04-13 10:05:12', 0),
(42, 1, 8, 'Raisul Muhalani', '085278722683', 'Jl.puma no.16 tunggul hitam ', '2018-04-13 10:13:05', 2),
(43, 2, 8, 'Rai', '085278722683', 'Jl.puma', '2018-04-13 11:21:49', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `pesanan_id` int(10) NOT NULL,
  `barang_id` int(10) NOT NULL,
  `quantity` tinyint(2) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`pesanan_id`, `barang_id`, `quantity`, `harga`) VALUES
(12, 20, 1, 400000),
(13, 19, 1, 300000),
(14, 20, 2, 400000),
(15, 18, 2, 656000),
(16, 20, 1, 400000),
(17, 19, 1, 300000),
(18, 20, 1, 400000),
(19, 19, 1, 300000),
(20, 18, 1, 656000),
(21, 19, 1, 300000),
(22, 20, 1, 400000),
(23, 18, 1, 656000),
(24, 18, 1, 656000),
(24, 19, 1, 300000),
(25, 18, 1, 656000),
(26, 20, 1, 400000),
(27, 20, 1, 400000),
(28, 18, 1, 656000),
(29, 18, 2, 656000),
(30, 19, 1, 300000),
(31, 20, 1, 400000),
(32, 19, 1, 300000),
(33, 20, 1, 400000),
(34, 20, 1, 400000),
(35, 19, 1, 300000),
(36, 20, 1, 400000),
(37, 18, 1, 656000),
(38, 20, 1, 400000),
(39, 19, 1, 300000),
(40, 20, 2, 400000),
(41, 19, 1, 300000),
(42, 20, 2, 400000),
(43, 19, 2, 300000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `level` varchar(30) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(160) NOT NULL,
  `alamat` varchar(400) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(300) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `level`, `nama`, `email`, `alamat`, `phone`, `password`, `status`) VALUES
(2, 'superadmin', 'admin', 'admin@weshop.com', 'jl weshop', '08889999', '1b3231655cebb7a1f783eddf27d254ca', 'on'),
(6, 'customer', 'customer', 'customer1@aaa.com', 'jl.Customer Weshop', '088888', '5f4dcc3b5aa765d61d8327deb882cf99', 'on'),
(7, 'customer', 'Sevia Mega ', 'seviamega@gmail.com', 'Griya Prima Asri', '083845719054', '202cb962ac59075b964b07152d234b70', 'on'),
(8, 'customer', 'raisul muhalani', 'raymuhalani@yahoo.co.id', 'JL.puma no 16 tunggul hitam padang', '085278722683', '81dc9bdb52d04dc20036dbd8313ed055', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `kode`
--
ALTER TABLE `kode`
  ADD PRIMARY KEY (`kode_id`);

--
-- Indexes for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`konfirmasi_id`),
  ADD KEY `pesanan_id` (`pesanan_id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`kota_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`pesanan_id`),
  ADD KEY `kota_id` (`kota_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD KEY `pesanan_id` (`pesanan_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `konfirmasi_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `kota_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `pesanan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD CONSTRAINT `konfirmasi_pembayaran_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`kota_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD CONSTRAINT `pesanan_detail_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_detail_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
