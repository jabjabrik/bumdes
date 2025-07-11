-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2025 at 04:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bumdes`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` bigint(20) UNSIGNED NOT NULL,
  `id_sewa` bigint(20) UNSIGNED NOT NULL,
  `periode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pembayaran` enum('pending','lunas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `tanggal_pembayaran` date DEFAULT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `nominal_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `pembayaran_via` enum('cash','transfer') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kwitansi_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_sewa`, `periode`, `status_pembayaran`, `tanggal_pembayaran`, `jatuh_tempo`, `nominal_pembayaran`, `denda`, `pembayaran_via`, `bukti_pembayaran`, `kwitansi_file`) VALUES
(16, 3, NULL, 'lunas', '2025-06-22', NULL, '5000000', 0, 'transfer', '1750600641.png', 'f05a498.docx'),
(17, 4, '1', 'lunas', '2025-06-22', '2025-06-22', '500000', 0, 'cash', '1750600578.png', 'df2f7a5.docx'),
(18, 4, '2', 'pending', NULL, '2025-07-22', NULL, NULL, NULL, NULL, NULL),
(19, 5, NULL, 'lunas', '2025-06-25', NULL, '5000000', 0, 'transfer', '1750744018.png', '5a704a1.docx'),
(20, 6, '1', 'pending', NULL, '2025-06-23', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `nama`, `jabatan`, `foto`) VALUES
(1, 'Maulana Ibnu Tri Rakha', 'Direktur BUMDES', '1750566184.png'),
(2, 'Yuslia Indah Lestari', 'Sekretaris BUMDES', '1750566285.png'),
(3, 'Nursiyatin Handayani', 'Bendahara BUMDES', '1750566342.jpg'),
(4, 'Nursiyati Wulandari', 'Kepala Ruko 1', '1750566481.jpg'),
(5, 'Sumarti', 'Kepala Ruko 2', '1750566541.jpg'),
(6, 'Siti Maryam', 'Kepala Lapak 1', '1750566637.png'),
(7, 'Umi Salama', 'Kepala Lapak 2', '1750566682.png');

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `id_penyewa` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penyewa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`id_penyewa`, `nik`, `nama_penyewa`, `no_telepon`, `alamat`, `is_active`) VALUES
(1, '3578020101010001', 'Khoirul Anam', '08123456705', 'Bantaran', '1'),
(2, '3578020102020002', 'Hariyanto', '08123456706', 'Jl Bantaran', '1'),
(3, '3578020103030003', 'Siti Nur Azizah', '08123456707', 'besuk', '1'),
(4, '3578020104040004', 'Budi Santoso', '08123456708', 'karanganyar', '1'),
(5, '3578020105050005', 'Lilis Kurniasari', '08123456709', 'besuk', '1'),
(6, '3578020106060006', 'Arif Setiawan', '08123456710', 'karanganyar', '1'),
(7, '3578020107070007', 'Dewi Anggraini', '08123456711', 'besuk', '1'),
(8, '3578020108080008', 'Hasan Prasetyo', '08123456712', 'bantaran', '1'),
(9, '3578020109090009', 'Ratna Sari Dewi', '08123456713', 'bantaran', '1'),
(10, '3578020110100010', 'Dedi Firmansyah', '08123456714', 'besuk', '1');

-- --------------------------------------------------------

--
-- Table structure for table `properti`
--

CREATE TABLE `properti` (
  `id_properti` bigint(20) UNSIGNED NOT NULL,
  `nama_properti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('ruko','lapak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_properti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properti`
--

INSERT INTO `properti` (`id_properti`, `nama_properti`, `jenis`, `ukuran`, `alamat_properti`, `foto`, `harga`, `keterangan`, `is_active`) VALUES
(1, 'Ruko 1', 'ruko', '20m2', 'Jl Bantaran', '1750568762.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(2, 'ruko 2', 'ruko', '20m2', 'Jl Bantaran', '1750578405.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(3, 'ruko 3', 'ruko', '20m2', 'Jl Bantaran', '1750578432.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(4, 'ruko 4', 'ruko', '20m2', 'Jl Bantaran', '1750578456.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(5, 'ruko 5', 'ruko', '20m2', 'Jl Bantaran', '1750578476.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(6, 'ruko 6', 'ruko', '20m2', 'Jl Bantaran', '1750578500.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(7, 'ruko 7', 'ruko', '20m2', 'Jl Bantaran', '1750578518.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(8, 'ruko 8', 'ruko', '20m2', 'Jl Bantaran', '1750578537.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(9, 'lapak 1', 'lapak', '20m2', 'Jl Bantaran', '1750579145.jpg', '500000', '1. Dinding kayu lantai semen \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(10, 'lapak 2', 'lapak', '20m2', 'Jl Bantaran', '1750579166.jpg', '500000', '1. Dinding kayu lantai semen \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(11, 'lapak 3', 'lapak', '20m2', 'Jl Bantaran', '1750579216.jpg', '500000', '1. Dinding kayu lantai semen \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(12, 'lapak 4', 'lapak', '20m2', 'Jl Bantaran', '1750579237.jpg', '500000', '1. Dinding kayu lantai semen \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(13, 'lapak 5', 'lapak', '20m2', 'Jl Bantaran', '1750579256.jpg', '500000', '1. Dinding kayu lantai semen \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(14, 'lapak 6', 'lapak', '20m2', 'Jl Bantaran', '1750579377.jpg', '500000', '1. Dinding kayu lantai semen \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(15, 'lapak 7', 'lapak', '20m2', 'Jl Bantaran', '1750579402.jpg', '500000', '1. Dinding kayu lantai semen \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(16, 'lapak 8', 'lapak', '20m2', 'Jl Bantaran', '1750579434.jpg', '500000', '1. Dinding kayu lantai semen \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(17, 'Ruko 14', 'ruko', '20m2', 'Jl Bantaran', '1750578642.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(18, 'Ruko 13', 'ruko', '20m2', 'Jl Bantaran', '1750578605.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(19, 'Ruko 12', 'ruko', '20m2', 'Jl bantaran', '1750578383.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(20, 'Ruko 11', 'ruko', '20m2', 'Jl Bantaran', '1750578326.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(21, 'ruko 9', 'ruko', '20m2', 'jl bantaran', '1750568497.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(22, 'Ruko 10', 'ruko', '20m2', 'Jl Bantaran', '1750568734.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(23, 'Ruko 15', 'ruko', '20m2', 'Jl Bantaran', '1750578704.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(24, 'Ruko 16', 'ruko', '20m2', 'Jl Bantaran', '1750578745.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(25, 'Ruko 17', 'ruko', '20m2', 'Jl Bantaran', '1750578777.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(26, 'Ruko 18', 'ruko', '20m2', 'Jl Bantaran', '1750578814.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(27, 'Ruko 19', 'ruko', '20m2', 'Jl Bantaran', '1750578842.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(28, 'Ruko 20', 'ruko', '20m2', 'Jl Bantaran', '1750578876.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(29, 'Ruko 21', 'ruko', '20m2', 'Jl Bantaran', '1750578932.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(30, 'Ruko 22', 'ruko', '20m2', 'Jl Bantaran', '1750578964.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1'),
(31, 'Ruko 23', 'ruko', '20m2', 'Jl Bantaran', '1750578992.jpg', '5000000', '1. Dinding tembok lantai keramik \n 2. Listrik (Bayar pribadi) \n 3. Air (Dari BUMdes)', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` bigint(20) UNSIGNED NOT NULL,
  `id_properti` bigint(20) UNSIGNED NOT NULL,
  `id_penyewa` bigint(20) UNSIGNED NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jenis_usaha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_sewa` enum('berlangsung','selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'berlangsung',
  `dokumen_perjanjian_sewa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metode_pembayaran` enum('periode bulanan','kontan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'periode bulanan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_properti`, `id_penyewa`, `tanggal_mulai`, `tanggal_selesai`, `jenis_usaha`, `status_sewa`, `dokumen_perjanjian_sewa`, `metode_pembayaran`) VALUES
(3, 1, 1, '2025-06-22', '2026-06-22', 'pedagang buah', 'selesai', '08e2b21.docx', 'kontan'),
(4, 9, 2, '2025-06-22', '2025-08-22', 'jual burung', 'selesai', '286c9db.docx', 'periode bulanan'),
(5, 1, 1, '2025-06-23', '2026-06-23', 'pedagang buah', 'berlangsung', 'a795034.docx', 'kontan'),
(6, 9, 2, '2025-06-23', '2025-07-23', 'pedagang burung', 'berlangsung', '00e94f0.docx', 'periode bulanan');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_keuangan`
--

CREATE TABLE `transaksi_keuangan` (
  `id_transaksi_keuangan` bigint(20) UNSIGNED NOT NULL,
  `id_pembayaran` bigint(20) UNSIGNED DEFAULT NULL,
  `kode` enum('PND1','PND2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_transaksi` enum('debit','kredit') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'debit',
  `tanggal_transaksi` date NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_keuangan`
--

INSERT INTO `transaksi_keuangan` (`id_transaksi_keuangan`, `id_pembayaran`, `kode`, `jenis_transaksi`, `tanggal_transaksi`, `deskripsi`, `jumlah`) VALUES
(1, 17, 'PND2', 'debit', '2025-06-22', 'Penerimaan dari pembayaran cicilan lapak (lapak 1) periode bulan-01 sebesar Rp 500.000, dimulai dari 22-06-2025 selama 2 bulan, oleh Hariyanto.', 500000),
(2, 16, 'PND1', 'debit', '2025-06-22', 'Penerimaan dari pembayaran kontan ruko (Ruko 1) sebesar Rp 5.000.000, dimulai dari 22-06-2025 selama 1 tahun, oleh Khoirul Anam', 5000000),
(4, NULL, 'PND1', 'kredit', '2025-06-23', 'Pembelian kertas HVS 1 rim', 50000),
(5, 19, 'PND1', 'debit', '2025-06-25', 'Penerimaan dari pembayaran kontan ruko (Ruko 1) sebesar Rp 5.000.000, dimulai dari 23-06-2025 selama 1 tahun, oleh Khoirul Anam', 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama_user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','bendahara','kepala lapak','kepala ruko') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `role`, `is_active`) VALUES
(1, 'Maulana Ibnu Tri Rakha', 'admin', '$2y$10$kVIrvx5nLsfcKpMzpvo2ae/g9Hd4w.MNyIkiAblRI3vyijYU48s.u', 'admin', '1'),
(2, 'Nursiyatin Handayani', 'bendahara', '$2y$10$kVIrvx5nLsfcKpMzpvo2ae/g9Hd4w.MNyIkiAblRI3vyijYU48s.u', 'bendahara', '1'),
(3, 'Nursiati Wulandari', 'kepala_lapak', '$2y$10$kVIrvx5nLsfcKpMzpvo2ae/g9Hd4w.MNyIkiAblRI3vyijYU48s.u', 'kepala lapak', '1'),
(4, 'Siti Maryam', 'kepala_ruko', '$2y$10$kVIrvx5nLsfcKpMzpvo2ae/g9Hd4w.MNyIkiAblRI3vyijYU48s.u', 'kepala ruko', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `pembayaran_id_sewa_foreign` (`id_sewa`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id_penyewa`);

--
-- Indexes for table `properti`
--
ALTER TABLE `properti`
  ADD PRIMARY KEY (`id_properti`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `sewa_id_properti_foreign` (`id_properti`),
  ADD KEY `sewa_id_penyewa_foreign` (`id_penyewa`);

--
-- Indexes for table `transaksi_keuangan`
--
ALTER TABLE `transaksi_keuangan`
  ADD PRIMARY KEY (`id_transaksi_keuangan`),
  ADD KEY `transaksi_keuangan_id_pembayaran_foreign` (`id_pembayaran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id_penyewa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `properti`
--
ALTER TABLE `properti`
  MODIFY `id_properti` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi_keuangan`
--
ALTER TABLE `transaksi_keuangan`
  MODIFY `id_transaksi_keuangan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_id_sewa_foreign` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`id_sewa`) ON DELETE CASCADE;

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_id_penyewa_foreign` FOREIGN KEY (`id_penyewa`) REFERENCES `penyewa` (`id_penyewa`),
  ADD CONSTRAINT `sewa_id_properti_foreign` FOREIGN KEY (`id_properti`) REFERENCES `properti` (`id_properti`);

--
-- Constraints for table `transaksi_keuangan`
--
ALTER TABLE `transaksi_keuangan`
  ADD CONSTRAINT `transaksi_keuangan_id_pembayaran_foreign` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
