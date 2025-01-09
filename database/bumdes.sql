-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2025 at 02:25 AM
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, 'bumdes', 1);

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
  `nominal_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `id_penyewa` bigint(20) UNSIGNED NOT NULL,
  `nama_penyewa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`id_penyewa`, `nama_penyewa`, `no_telepon`, `alamat`, `is_active`) VALUES
(1, 'Ahmad Subekti', '08123456705', 'besuk', '1'),
(2, 'Fitri Handayani', '08123456706', 'karanganyar', '1'),
(3, 'Siti Nur Azizah', '08123456707', 'besuk', '1'),
(4, 'Budi Santoso', '08123456708', 'karanganyar', '1'),
(5, 'Lilis Kurniasari', '08123456709', 'besuk', '1'),
(6, 'Arif Setiawan', '08123456710', 'karanganyar', '1'),
(7, 'Dewi Anggraini', '08123456711', 'besuk', '1'),
(8, 'Hasan Prasetyo', '08123456712', 'bantaran', '1'),
(9, 'Ratna Sari Dewi', '08123456713', 'bantaran', '1'),
(10, 'Dedi Firmansyah', '08123456714', 'besuk', '1');

-- --------------------------------------------------------

--
-- Table structure for table `perangkat_desa`
--

CREATE TABLE `perangkat_desa` (
  `id_perangkat_desa` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perangkat_desa`
--

INSERT INTO `perangkat_desa` (`id_perangkat_desa`, `nama`, `jabatan`, `foto`) VALUES
(1, 'Sri Rahayuningsih', 'Kepala Seksi Pemerintahan', '1.png'),
(2, 'Moh. Ali', 'Kepala Seksi Kesejahteraan dan Pelayanan', '2.png'),
(3, 'Faisol, S.Th.I', 'Sekretaris Desa', '3.png'),
(4, 'Puji Sulistyaningsih', 'Staff Desa', '4.png'),
(5, 'Puji Rakhmawati', 'Kepala Urusan Keuangan', '5.png'),
(6, 'Bulyamin', 'Kepala Urusan Pembangunan dan Perencanaan', '6.png');

-- --------------------------------------------------------

--
-- Table structure for table `properti`
--

CREATE TABLE `properti` (
  `id_properti` bigint(20) UNSIGNED NOT NULL,
  `nama_properti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('ruko','lapak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properti`
--

INSERT INTO `properti` (`id_properti`, `nama_properti`, `jenis`, `foto`, `harga`, `is_active`) VALUES
(1, 'ruko 1', 'ruko', 'ruko1.jpg', '6000000', '1'),
(2, 'ruko 2', 'ruko', 'ruko2.jpg', '6600000', '1'),
(3, 'ruko 3', 'ruko', 'ruko3.jpg', '6000000', '1'),
(4, 'ruko 4', 'ruko', 'ruko4.jpg', '6600000', '1'),
(5, 'ruko 5', 'ruko', 'ruko1.jpg', '6000000', '1'),
(6, 'ruko 6', 'ruko', 'ruko2.jpg', '6600000', '1'),
(7, 'ruko 7', 'ruko', 'ruko3.jpg', '6000000', '1'),
(8, 'ruko 8', 'ruko', 'ruko4.jpg', '6600000', '1'),
(9, 'lapak 1', 'lapak', 'lapak1.jpg', '250000', '1'),
(10, 'lapak 2', 'lapak', 'lapak2.jpg', '250000', '1'),
(11, 'lapak 3', 'lapak', 'lapak3.jpg', '250000', '1'),
(12, 'lapak 4', 'lapak', 'lapak4.jpg', '250000', '1'),
(13, 'lapak 5', 'lapak', 'lapak5.jpg', '250000', '1'),
(14, 'lapak 6', 'lapak', 'lapak6.jpg', '250000', '1'),
(15, 'lapak 7', 'lapak', 'lapak1.jpg', '250000', '1'),
(16, 'lapak 8', 'lapak', 'lapak2.jpg', '250000', '1'),
(17, 'lapak 9', 'lapak', 'lapak3.jpg', '250000', '1'),
(18, 'lapak 10', 'lapak', 'lapak4.jpg', '250000', '1'),
(19, 'lapak 11', 'lapak', 'lapak5.jpg', '250000', '1'),
(20, 'lapak 12', 'lapak', 'lapak6.jpg', '250000', '1');

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
  `status_sewa` enum('berlangsung','selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'berlangsung',
  `dokumen_perjanjian_sewa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metode_pembayaran` enum('periode bulanan','kontan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'periode bulanan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_keuangan`
--

CREATE TABLE `transaksi_keuangan` (
  `id_transaksi_keuangan` bigint(20) UNSIGNED NOT NULL,
  `id_pembayaran` bigint(20) UNSIGNED DEFAULT NULL,
  `jenis_transaksi` enum('debit','kredit') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'debit',
  `tanggal_transaksi` date NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'nur laila', 'admin', '$2y$10$kVIrvx5nLsfcKpMzpvo2ae/g9Hd4w.MNyIkiAblRI3vyijYU48s.u', 'admin', '1'),
(2, 'muhammad lutfi', 'bendahara', '$2y$10$kVIrvx5nLsfcKpMzpvo2ae/g9Hd4w.MNyIkiAblRI3vyijYU48s.u', 'bendahara', '1'),
(3, 'Budi Hartono', 'kepala_lapak', '$2y$10$kVIrvx5nLsfcKpMzpvo2ae/g9Hd4w.MNyIkiAblRI3vyijYU48s.u', 'kepala lapak', '1'),
(4, 'Wijayanto', 'kepala_ruko', '$2y$10$kVIrvx5nLsfcKpMzpvo2ae/g9Hd4w.MNyIkiAblRI3vyijYU48s.u', 'kepala ruko', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `pembayaran_id_sewa_foreign` (`id_sewa`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id_penyewa`);

--
-- Indexes for table `perangkat_desa`
--
ALTER TABLE `perangkat_desa`
  ADD PRIMARY KEY (`id_perangkat_desa`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id_penyewa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `perangkat_desa`
--
ALTER TABLE `perangkat_desa`
  MODIFY `id_perangkat_desa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `properti`
--
ALTER TABLE `properti`
  MODIFY `id_properti` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_keuangan`
--
ALTER TABLE `transaksi_keuangan`
  MODIFY `id_transaksi_keuangan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
