-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 05:14 AM
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

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_sewa`, `periode`, `status_pembayaran`, `tanggal_pembayaran`, `nominal_pembayaran`, `bukti_pembayaran`) VALUES
(1, 1, NULL, 'lunas', '2025-01-05', '500000', '1736063189.jpg'),
(2, 2, NULL, 'lunas', '2025-01-05', '18000000', '1736063368.jpg'),
(3, 3, '1', 'lunas', '2025-01-05', '550000', '1736063439.jpg'),
(4, 3, '2', 'lunas', '2025-01-05', '550000', '1736063486.jpg'),
(5, 3, '3', 'pending', NULL, NULL, NULL),
(6, 3, '4', 'pending', NULL, NULL, NULL),
(7, 3, '5', 'pending', NULL, NULL, NULL),
(8, 3, '6', 'pending', NULL, NULL, NULL),
(9, 3, '7', 'pending', NULL, NULL, NULL),
(10, 3, '8', 'pending', NULL, NULL, NULL),
(11, 3, '9', 'pending', NULL, NULL, NULL),
(12, 3, '10', 'pending', NULL, NULL, NULL),
(13, 3, '11', 'pending', NULL, NULL, NULL),
(14, 3, '12', 'pending', NULL, NULL, NULL),
(15, 3, '13', 'pending', NULL, NULL, NULL),
(16, 3, '14', 'pending', NULL, NULL, NULL),
(17, 3, '15', 'pending', NULL, NULL, NULL),
(18, 3, '16', 'pending', NULL, NULL, NULL),
(19, 3, '17', 'pending', NULL, NULL, NULL),
(20, 3, '18', 'pending', NULL, NULL, NULL),
(21, 3, '19', 'pending', NULL, NULL, NULL),
(22, 3, '20', 'pending', NULL, NULL, NULL),
(23, 3, '21', 'pending', NULL, NULL, NULL),
(24, 3, '22', 'pending', NULL, NULL, NULL),
(25, 3, '23', 'pending', NULL, NULL, NULL),
(26, 3, '24', 'pending', NULL, NULL, NULL),
(27, 4, NULL, 'lunas', '2025-01-05', '12000000', '1736076985.jpg'),
(28, 5, NULL, 'lunas', '2025-01-05', '750000', '1736077129.jpg'),
(29, 6, '1', 'lunas', '2024-10-05', '550000', '1736077395.jpg'),
(30, 6, '2', 'lunas', '2025-11-05', '550000', '1736077431.jpg'),
(31, 6, '3', 'pending', NULL, NULL, NULL),
(32, 6, '4', 'pending', NULL, NULL, NULL),
(33, 6, '5', 'pending', NULL, NULL, NULL),
(34, 6, '6', 'pending', NULL, NULL, NULL),
(35, 6, '7', 'pending', NULL, NULL, NULL),
(36, 6, '8', 'pending', NULL, NULL, NULL),
(37, 6, '9', 'pending', NULL, NULL, NULL),
(38, 6, '10', 'pending', NULL, NULL, NULL),
(39, 6, '11', 'pending', NULL, NULL, NULL),
(40, 6, '12', 'pending', NULL, NULL, NULL),
(41, 6, '13', 'pending', NULL, NULL, NULL),
(42, 6, '14', 'pending', NULL, NULL, NULL),
(43, 6, '15', 'pending', NULL, NULL, NULL),
(44, 6, '16', 'pending', NULL, NULL, NULL),
(45, 6, '17', 'pending', NULL, NULL, NULL),
(46, 6, '18', 'pending', NULL, NULL, NULL),
(47, 6, '19', 'pending', NULL, NULL, NULL),
(48, 6, '20', 'pending', NULL, NULL, NULL),
(49, 6, '21', 'pending', NULL, NULL, NULL),
(50, 6, '22', 'pending', NULL, NULL, NULL),
(51, 6, '23', 'pending', NULL, NULL, NULL),
(52, 6, '24', 'pending', NULL, NULL, NULL),
(53, 6, '25', 'pending', NULL, NULL, NULL),
(54, 6, '26', 'pending', NULL, NULL, NULL),
(55, 6, '27', 'pending', NULL, NULL, NULL),
(56, 6, '28', 'pending', NULL, NULL, NULL),
(57, 6, '29', 'pending', NULL, NULL, NULL),
(58, 6, '30', 'pending', NULL, NULL, NULL),
(59, 6, '31', 'pending', NULL, NULL, NULL),
(60, 6, '32', 'pending', NULL, NULL, NULL),
(61, 6, '33', 'pending', NULL, NULL, NULL),
(62, 6, '34', 'pending', NULL, NULL, NULL),
(63, 6, '35', 'pending', NULL, NULL, NULL),
(64, 6, '36', 'pending', NULL, NULL, NULL),
(65, 7, NULL, 'lunas', '2024-05-05', '500000', '1736077625.jpg'),
(66, 8, NULL, 'pending', NULL, NULL, NULL),
(67, 9, NULL, 'lunas', '2025-01-06', '12000000', '1736135350.jpg'),
(68, 10, NULL, 'lunas', '2025-01-06', '13200000', '1736136305.jpg'),
(69, 11, '1', 'lunas', '2024-11-02', '250000', '1736136758.jpg'),
(70, 11, '2', 'lunas', '2024-12-03', '250000', '1736136779.jpg');

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

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_properti`, `id_penyewa`, `tanggal_mulai`, `tanggal_selesai`, `status_sewa`, `dokumen_perjanjian_sewa`, `metode_pembayaran`) VALUES
(1, 9, 1, '2025-01-05', '2025-03-05', 'berlangsung', '1736063176.pdf', 'kontan'),
(2, 1, 1, '2025-01-08', '2028-01-08', 'selesai', '1736063319.pdf', 'kontan'),
(3, 2, 2, '2025-01-05', '2027-01-05', 'selesai', '1736063414.pdf', 'periode bulanan'),
(4, 3, 6, '2025-01-05', '2027-01-05', 'berlangsung', '1736076791.pdf', 'kontan'),
(5, 11, 3, '2025-01-05', '2025-04-05', 'berlangsung', '1736077087.pdf', 'kontan'),
(6, 6, 8, '2024-10-05', '2027-10-05', 'berlangsung', '1736077241.pdf', 'periode bulanan'),
(7, 16, 3, '2024-05-05', '2024-07-05', 'selesai', '1736077608.pdf', 'kontan'),
(8, 2, 1, '2025-01-06', '2026-01-06', 'berlangsung', '1736135145.pdf', 'kontan'),
(9, 1, 2, '2025-01-06', '2027-01-06', 'berlangsung', '1736135338.pdf', 'kontan'),
(10, 4, 1, '2025-01-06', '2027-01-06', 'berlangsung', '1736135807.pdf', 'kontan'),
(11, 10, 1, '2024-11-02', '2025-01-02', 'selesai', '1736136599.pdf', 'periode bulanan');

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

--
-- Dumping data for table `transaksi_keuangan`
--

INSERT INTO `transaksi_keuangan` (`id_transaksi_keuangan`, `id_pembayaran`, `jenis_transaksi`, `tanggal_transaksi`, `deskripsi`, `jumlah`) VALUES
(1, 1, 'debit', '2025-01-05', 'Penerimaan dari pembayaran kontan lapak (lapak 1), dimulai dari 2025-01-05 selama 2 bulan, oleh Ahmad Subekti', 500000),
(2, 2, 'debit', '2025-01-05', 'Penerimaan dari pembayaran kontan ruko (ruko 1), dimulai dari 2025-01-08 selama 3 tahun, oleh Ahmad Subekti', 18000000),
(3, 3, 'debit', '2025-01-05', 'Penerimaan dari pembayaran cicilan ruko (ruko 2) periode bulan-01, dimulai dari 2025-01-05 selama 2 tahun, oleh Fitri Handayani', 550000),
(4, 4, 'debit', '2025-01-05', 'Penerimaan dari pembayaran cicilan ruko (ruko 2) periode bulan-02, dimulai dari 2025-01-05 selama 2 tahun, oleh Fitri Handayani', 550000),
(8, NULL, 'kredit', '2025-01-06', 'Renovasi Ruko', 3500000),
(9, 27, 'debit', '2025-01-05', 'Penerimaan dari pembayaran kontan ruko (ruko 3), dimulai dari 2025-01-05 selama 2 tahun, oleh Arif Setiawan', 12000000),
(10, 28, 'debit', '2025-01-05', 'Penerimaan dari pembayaran kontan lapak (lapak 3), dimulai dari 2025-01-05 selama 3 bulan, oleh Siti Nur Azizah', 750000),
(11, 29, 'debit', '2024-10-05', 'Penerimaan dari pembayaran cicilan ruko (ruko 6) periode bulan-01, dimulai dari 2024-10-05 selama 3 tahun, oleh Hasan Prasetyo', 550000),
(13, 65, 'debit', '2024-05-05', 'Penerimaan dari pembayaran kontan lapak (lapak 8), dimulai dari 2024-05-05 selama 2 bulan, oleh Siti Nur Azizah', 500000),
(14, 67, 'debit', '2025-01-06', 'Penerimaan dari pembayaran kontan ruko (ruko 1), dimulai dari 2025-01-06 selama 2 tahun, oleh Fitri Handayani', 12000000),
(15, 68, 'debit', '2025-01-06', 'Penerimaan dari pembayaran kontan ruko (ruko 4), dimulai dari 2025-01-06 selama 2 tahun, oleh Ahmad Subekti', 13200000),
(16, 69, 'debit', '2024-11-02', 'Penerimaan dari pembayaran cicilan lapak (lapak 2) periode bulan-01, dimulai dari 2024-11-02 selama 2 bulan, oleh Ahmad Subekti', 250000),
(17, 70, 'debit', '2024-12-03', 'Penerimaan dari pembayaran cicilan lapak (lapak 2) periode bulan-02, dimulai dari 2024-11-02 selama 2 bulan, oleh Ahmad Subekti', 250000);

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
  MODIFY `id_pembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

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
  MODIFY `id_sewa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaksi_keuangan`
--
ALTER TABLE `transaksi_keuangan`
  MODIFY `id_transaksi_keuangan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  ADD CONSTRAINT `transaksi_keuangan_id_pembayaran_foreign` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
