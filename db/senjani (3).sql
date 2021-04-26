-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 11:40 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `senjani`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan_harian`
--

CREATE TABLE `detail_pesanan_harian` (
  `id_detail_pesanan` int(11) NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `waktu` enum('PAGI','SORE') NOT NULL,
  `status_pengiriman` varchar(255) NOT NULL,
  `id_kotak` varchar(50) NOT NULL,
  `id_pesanan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pesanan_harian`
--

INSERT INTO `detail_pesanan_harian` (`id_detail_pesanan`, `tanggal_pesanan`, `nama_menu`, `harga`, `waktu`, `status_pengiriman`, `id_kotak`, `id_pesanan`) VALUES
(17, '2020-10-22', 'Kacang Geprek', 200000, 'PAGI', 'Selesai', 'KOTAK00005', 'PH-20200220001'),
(18, '2020-10-22', 'Mie Goreng', 20000, 'SORE', 'Dikirim', 'KOTAK00006', 'PH-20200220001');

-- --------------------------------------------------------

--
-- Table structure for table `gaji_pegawai`
--

CREATE TABLE `gaji_pegawai` (
  `id_gaji` int(11) NOT NULL,
  `id_kepegawaian` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` year(4) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `gaji` double NOT NULL,
  `status` enum('BELUM LUNAS','LUNAS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `histori_pesanan`
--

CREATE TABLE `histori_pesanan` (
  `id_histori` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `histori_pesanan`
--

INSERT INTO `histori_pesanan` (`id_histori`, `nama_menu`, `harga`) VALUES
(13, 'Es Tape Ketan', 12000),
(14, 'Kue Bolu', 10000),
(15, 'Kacang Geprek', 200000),
(16, 'Mie Goreng', 20000),
(17, 'Es Tape Ketan', 12000),
(18, 'Aqua Sachet', 80000);

-- --------------------------------------------------------

--
-- Table structure for table `hutang_pesanan`
--

CREATE TABLE `hutang_pesanan` (
  `id_hutang` int(11) NOT NULL,
  `id_pesanan` varchar(100) NOT NULL,
  `nomor_pembayaran` varchar(100) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `atm` varchar(100) NOT NULL,
  `jumlah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hutang_pesanan`
--

INSERT INTO `hutang_pesanan` (`id_hutang`, `id_pesanan`, `nomor_pembayaran`, `tanggal_masuk`, `atm`, `jumlah`) VALUES
(6, 'PS-20200220002', '09983878748', '2020-10-22', 'Mandiri', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `kepegawaian`
--

CREATE TABLE `kepegawaian` (
  `id_kepegawaian` int(11) NOT NULL,
  `nama_pegawai` varchar(25) NOT NULL,
  `ttl` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `gaji` int(11) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `file_cv` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kepegawaian`
--

INSERT INTO `kepegawaian` (`id_kepegawaian`, `nama_pegawai`, `ttl`, `jenis_kelamin`, `agama`, `alamat`, `jabatan`, `gaji`, `telp`, `file_cv`) VALUES
(2, 'Hiromi', 'Malang, 12 April 1996', 'Laki-laki', 'Islam', 'Jl. Kacang Hijau', 'Admin', 1200000, '0895555555', 'file_cv/15816986021792.pdf'),
(7, 'Hideo', 'Malang, 30 April 1996', 'Laki-laki', 'Islam', 'Jl. Tlogomas 72A Malang', 'Personel', 1000000, '0865675577', 'file_cv/15984060751788.pdf'),
(8, 'Izuna', 'Surabaya, 17 Maret 1996', 'Laki-laki', 'Islam', 'Jl, Kalpataru kota Malang', 'Kurir', 200000, '0896543345', ''),
(9, 'Aceng', 'Malang, 20 Februari 1988', 'Laki-laki', 'Islam', 'Jalan endas', 'Personel', 1000000, '081223456543', ''),
(10, 'Suzanna', 'Cirebon, 19 November 1997', 'Perempuan', 'Islam', 'Kuburan', 'Kurir', 1500000, '08772354152', 'file_cv/15984110283933.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id_transaksi` int(11) NOT NULL,
  `jenis_transaksi` varchar(20) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `periode` varchar(25) NOT NULL,
  `nominal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id_transaksi`, `jenis_transaksi`, `deskripsi`, `tanggal_masuk`, `periode`, `nominal`) VALUES
(32530, 'Pemasukan', 'Pembayaran pesanan', '2020-10-22', 'October', 120000),
(32531, 'Pemasukan', 'Pembayaran pesanan', '2020-10-22', 'October', 1000000),
(32532, 'Pemasukan', 'Pembayaran pesanan', '2020-10-22', 'October', 400000),
(32533, 'Pemasukan', 'Pembayaran pesanan', '2020-10-22', 'October', 50000),
(32534, 'Pemasukan', 'Pembayaran pesanan', '2020-10-22', 'October', 2400000),
(32535, 'Pemasukan', 'Pembayaran pesanan', '2020-10-22', 'October', 50000),
(32536, 'Pemasukan', 'Pembayaran pesanan', '2020-10-22', 'October', 50000),
(32537, 'Pemasukan', 'Pembayaran pesanan', '2020-11-30', 'November', 160000);

-- --------------------------------------------------------

--
-- Table structure for table `kotak`
--

CREATE TABLE `kotak` (
  `id_kotak` varchar(50) NOT NULL,
  `status_kotak` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kotak`
--

INSERT INTO `kotak` (`id_kotak`, `status_kotak`, `tanggal`) VALUES
('KOTAK00001', 'Terpakai', '2020-09-10 17:50:30'),
('KOTAK00002', 'Terpakai', '2020-09-10 14:25:23'),
('KOTAK00003', 'Terpakai', '2020-09-10 17:50:38'),
('KOTAK00004', 'Terpakai', '2020-09-10 14:29:18'),
('KOTAK00005', 'Tersedia', '2020-10-26 13:25:32'),
('KOTAK00006', 'Terpakai', '2020-09-10 14:29:35'),
('KOTAK00007', 'Tersedia', '2020-09-10 14:29:39'),
('KOTAK00008', 'Tersedia', '2020-09-10 14:29:44'),
('KOTAK00009', 'Tersedia', '2020-09-10 14:29:49'),
('KOTAK00010', 'Tersedia', '2020-09-10 14:29:53'),
('KOTAK00011', 'Tersedia', '2020-11-29 11:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `id_makanan` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `foto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id_makanan`, `kategori`, `nama_menu`, `harga`, `deskripsi`, `foto`) VALUES
(1, 'Makanan', 'Es Tape Ketan', 12000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi u', './images/15816746102231.jpeg'),
(2, 'Minuman', 'Es Teh', 5000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi u', './images/15818606007515.jpeg'),
(3, 'Dessert', 'Kue Bolu', 10000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi u', './images/15818606142209.jpeg'),
(4, 'Makanan', 'Kacang Geprek', 200000, 'Kacang digeprek', './images/15977021862818.jpeg'),
(5, 'Minuman', 'Aqua Sachet', 80000, 'Aqua ya aqua', './images/15818604929988.jpeg'),
(6, 'Minuman', 'Es Campur', 40500, 'Es campur campur\r\n', './images/15818605140534.jpeg'),
(7, 'Minuman', 'Susu Murni', 10000, 'Susu ya susu', '/images/15977049474229.jpeg'),
(16, 'Makanan', 'Mie Goreng', 20000, 'hgahghs', 'images/15977083858776.jpg'),
(17, 'Minuman', 'akua', 2000, 'segar', 'images/16008732055068.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(100) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `kontak_pemesan` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL,
  `status_pesanan` varchar(50) NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `harga` double NOT NULL,
  `qty` int(11) NOT NULL,
  `pembayaran` double NOT NULL,
  `sisa_pembayaran` double NOT NULL DEFAULT 0,
  `total_harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `nama_pemesan`, `kontak_pemesan`, `alamat`, `nama_menu`, `status_pembayaran`, `status_pesanan`, `tanggal_pesanan`, `harga`, `qty`, `pembayaran`, `sisa_pembayaran`, `total_harga`) VALUES
('PS-20200220001', 'Fahmi', '081321860243', 'awn', 'Es Tape Ketan', 'LUNAS', 'Diproses', '2020-10-22', 12000, 10, 120000, 0, 120000),
('PS-20200220002', 'Fahmi', '081321860243', 'awn', 'Es Tape Ketan', 'DP', 'Diproses', '2020-10-22', 12000, 200, 500000, 1850000, 2400000),
('PS-20201290003', 'Fahmi', '083221345672', 'ARJAWINANGUN', 'Aqua Sachet', 'LUNAS', 'Diproses', '2020-11-30', 80000, 2, 160000, 0, 160000);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_harian`
--

CREATE TABLE `pesanan_harian` (
  `id_pesanan` varchar(100) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `kontak_pemesan` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `status_pembayaran` varchar(100) NOT NULL,
  `menu_pagi` varchar(100) NOT NULL,
  `menu_sore` varchar(100) NOT NULL,
  `harga_pagi` double NOT NULL,
  `harga_sore` double NOT NULL,
  `total_harga` double NOT NULL,
  `pembayaran` double NOT NULL,
  `sisa_pembayaran` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan_harian`
--

INSERT INTO `pesanan_harian` (`id_pesanan`, `nama_pemesan`, `kontak_pemesan`, `alamat`, `tanggal_pesanan`, `tanggal_akhir`, `status_pembayaran`, `menu_pagi`, `menu_sore`, `harga_pagi`, `harga_sore`, `total_harga`, `pembayaran`, `sisa_pembayaran`) VALUES
('PH-20200220001', 'Kimochi', '081321860243', 'jepang', '2020-10-22', '2020-10-28', 'DP', 'Kacang Geprek', 'Mie Goreng', 200000, 20000, 480000, 50000, 430000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_kepegawaian` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_kepegawaian`, `email`, `password`) VALUES
(2, 2, 'admin@gmail.com', 'admin'),
(4, 7, 'hideo@gmail.com', 'hideo'),
(5, 8, 'izuna@gmail.com', 'izuna'),
(6, 9, 'aceng@gmail.com', '83UQf'),
(7, 10, 'suzanna@gmail.com', 'suzanna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanan_harian`
--
ALTER TABLE `detail_pesanan_harian`
  ADD PRIMARY KEY (`id_detail_pesanan`),
  ADD KEY `id_makanan` (`id_kotak`,`id_pesanan`);

--
-- Indexes for table `gaji_pegawai`
--
ALTER TABLE `gaji_pegawai`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `histori_pesanan`
--
ALTER TABLE `histori_pesanan`
  ADD PRIMARY KEY (`id_histori`);

--
-- Indexes for table `hutang_pesanan`
--
ALTER TABLE `hutang_pesanan`
  ADD PRIMARY KEY (`id_hutang`);

--
-- Indexes for table `kepegawaian`
--
ALTER TABLE `kepegawaian`
  ADD PRIMARY KEY (`id_kepegawaian`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `kotak`
--
ALTER TABLE `kotak`
  ADD PRIMARY KEY (`id_kotak`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `pesanan_harian`
--
ALTER TABLE `pesanan_harian`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_kepegawaian` (`id_kepegawaian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesanan_harian`
--
ALTER TABLE `detail_pesanan_harian`
  MODIFY `id_detail_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `gaji_pegawai`
--
ALTER TABLE `gaji_pegawai`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histori_pesanan`
--
ALTER TABLE `histori_pesanan`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hutang_pesanan`
--
ALTER TABLE `hutang_pesanan`
  MODIFY `id_hutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kepegawaian`
--
ALTER TABLE `kepegawaian`
  MODIFY `id_kepegawaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32538;

--
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_kepegawaian`) REFERENCES `kepegawaian` (`id_kepegawaian`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
