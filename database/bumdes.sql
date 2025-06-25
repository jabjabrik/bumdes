-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jun 2025 pada 06.25
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.3.33

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
-- Struktur dari tabel `pembayaran`
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
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_sewa`, `periode`, `status_pembayaran`, `tanggal_pembayaran`, `jatuh_tempo`, `nominal_pembayaran`, `denda`, `pembayaran_via`, `bukti_pembayaran`, `kwitansi_file`) VALUES
(16, 3, NULL, 'lunas', '2025-06-22', NULL, '5000000', 0, 'transfer', '1750600641.png', 'f05a498.docx'),
(17, 4, '1', 'lunas', '2025-06-22', '2025-06-22', '500000', 0, 'cash', '1750600578.png', 'df2f7a5.docx'),
(18, 4, '2', 'pending', NULL, '2025-07-22', NULL, NULL, NULL, NULL, NULL),
(19, 5, NULL, 'lunas', '2025-06-25', NULL, '5000000', 0, 'transfer', '1750744018.png', '5a704a1.docx'),
(20, 6, '1', 'pending', NULL, '2025-06-23', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengurus`
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
-- Struktur dari tabel `penyewa`
--

CREATE TABLE `penyewa` (
  `id_penyewa` bigint(20) UNSIGNED NOT NULL,
  `nama_penyewa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penyewa`
--

INSERT INTO `penyewa` (`id_penyewa`, `nama_penyewa`, `no_telepon`, `alamat`, `is_active`) VALUES
(1, 'Khoirul Anam', '08123456705', 'Bantaran', '1'),
(2, 'Hariyanto', '08123456706', 'Jl Bantaran', '1'),
(3, 'Siti Nur Azizah', '08123456707', 'besuk', '1'),
(4, 'Budi Santoso', '08123456708', 'karanganyar', '1'),
(5, 'Lilis Kurniasari', '08123456709', 'besuk', '1'),
(6, 'Arif Setiawan', '08123456710', 'karanganyar', '1'),
(7, 'Dewi Anggraini', '08123456711', 'besuk', '1'),
(8, 'Hasan Prasetyo', '08123456712', 'bantaran', '1'),
(9, 'Ratna Sari Dewi', '08123456713', 'bantaran', '1'),
(10, 'Dedi Firmansyah', '08123456714', 'besuk', '1'),
(11, 'laila', '098764467899', 'kramat', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `properti`
--

CREATE TABLE `properti` (
  `id_properti` bigint(20) UNSIGNED NOT NULL,
  `nama_properti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('ruko','lapak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_properti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `properti`
--

INSERT INTO `properti` (`id_properti`, `nama_properti`, `jenis`, `alamat_properti`, `foto`, `harga`, `is_active`) VALUES
(1, 'Ruko 1', 'ruko', 'Jl Bantaran', '1750568762.jpg', '5000000', '1'),
(2, 'ruko 2', 'ruko', 'Jl Bantaran', '1750578405.jpg', '5000000', '1'),
(3, 'ruko 3', 'ruko', 'Jl Bantaran', '1750578432.jpg', '5000000', '1'),
(4, 'ruko 4', 'ruko', 'Jl Bantaran', '1750578456.jpg', '5000000', '1'),
(5, 'ruko 5', 'ruko', 'Jl Bantaran', '1750578476.jpg', '5000000', '1'),
(6, 'ruko 6', 'ruko', 'Jl Bantaran', '1750578500.jpg', '5000000', '1'),
(7, 'ruko 7', 'ruko', 'Jl Bantaran', '1750578518.jpg', '5000000', '1'),
(8, 'ruko 8', 'ruko', 'Jl Bantaran', '1750578537.jpg', '5000000', '1'),
(9, 'lapak 1', 'lapak', 'Jl Bantaran', '1750579145.jpg', '500000', '1'),
(10, 'lapak 2', 'lapak', 'Jl Bantaran', '1750579166.jpg', '500000', '1'),
(11, 'lapak 3', 'lapak', 'Jl Bantaran', '1750579216.jpg', '500000', '1'),
(12, 'lapak 4', 'lapak', 'Jl Bantaran', '1750579237.jpg', '500000', '1'),
(13, 'lapak 5', 'lapak', 'Jl Bantaran', '1750579256.jpg', '500000', '1'),
(14, 'lapak 6', 'lapak', 'Jl Bantaran', '1750579377.jpg', '500000', '1'),
(15, 'lapak 7', 'lapak', 'Jl Bantaran', '1750579402.jpg', '500000', '1'),
(16, 'lapak 8', 'lapak', 'Jl Bantaran', '1750579434.jpg', '500000', '1'),
(17, 'Ruko 14', 'ruko', 'Jl Bantaran', '1750578642.jpg', '5000000', '1'),
(18, 'Ruko 13', 'ruko', 'Jl Bantaran', '1750578605.jpg', '5000000', '1'),
(19, 'Ruko 12', 'ruko', 'Jl bantaran', '1750578383.jpg', '5000000', '1'),
(20, 'Ruko 11', 'ruko', 'Jl Bantaran', '1750578326.jpg', '5000000', '1'),
(21, 'ruko 9', 'ruko', 'jl bantaran', '1750568497.jpg', '5000000', '1'),
(22, 'Ruko 10', 'ruko', 'Jl Bantaran', '1750568734.jpg', '5000000', '1'),
(23, 'Ruko 15', 'ruko', 'Jl Bantaran', '1750578704.jpg', '5000000', '1'),
(24, 'Ruko 16', 'ruko', 'Jl Bantaran', '1750578745.jpg', '5000000', '1'),
(25, 'Ruko 17', 'ruko', 'Jl Bantaran', '1750578777.jpg', '5000000', '1'),
(26, 'Ruko 18', 'ruko', 'Jl Bantaran', '1750578814.jpg', '5000000', '1'),
(27, 'Ruko 19', 'ruko', 'Jl Bantaran', '1750578842.jpg', '5000000', '1'),
(28, 'Ruko 20', 'ruko', 'Jl Bantaran', '1750578876.jpg', '5000000', '1'),
(29, 'Ruko 21', 'ruko', 'Jl Bantaran', '1750578932.jpg', '5000000', '1'),
(30, 'Ruko 22', 'ruko', 'Jl Bantaran', '1750578964.jpg', '5000000', '1'),
(31, 'Ruko 23', 'ruko', 'Jl Bantaran', '1750578992.jpg', '5000000', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa`
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
-- Dumping data untuk tabel `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_properti`, `id_penyewa`, `tanggal_mulai`, `tanggal_selesai`, `jenis_usaha`, `status_sewa`, `dokumen_perjanjian_sewa`, `metode_pembayaran`) VALUES
(3, 1, 1, '2025-06-22', '2026-06-22', 'pedagang buah', 'selesai', '08e2b21.docx', 'kontan'),
(4, 9, 2, '2025-06-22', '2025-08-22', 'jual burung', 'selesai', '286c9db.docx', 'periode bulanan'),
(5, 1, 1, '2025-06-23', '2026-06-23', 'pedagang buah', 'berlangsung', 'a795034.docx', 'kontan'),
(6, 9, 2, '2025-06-23', '2025-07-23', 'pedagang burung', 'berlangsung', '00e94f0.docx', 'periode bulanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_keuangan`
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
-- Dumping data untuk tabel `transaksi_keuangan`
--

INSERT INTO `transaksi_keuangan` (`id_transaksi_keuangan`, `id_pembayaran`, `kode`, `jenis_transaksi`, `tanggal_transaksi`, `deskripsi`, `jumlah`) VALUES
(1, 17, 'PND2', 'debit', '2025-06-22', 'Penerimaan dari pembayaran cicilan lapak (lapak 1) periode bulan-01 sebesar Rp 500.000, dimulai dari 22-06-2025 selama 2 bulan, oleh Hariyanto.', 500000),
(2, 16, 'PND1', 'debit', '2025-06-22', 'Penerimaan dari pembayaran kontan ruko (Ruko 1) sebesar Rp 5.000.000, dimulai dari 22-06-2025 selama 1 tahun, oleh Khoirul Anam', 5000000),
(4, NULL, 'PND1', 'kredit', '2025-06-23', 'Pembelian kertas HVS 1 rim', 50000),
(5, 19, 'PND1', 'debit', '2025-06-25', 'Penerimaan dari pembayaran kontan ruko (Ruko 1) sebesar Rp 5.000.000, dimulai dari 23-06-2025 selama 1 tahun, oleh Khoirul Anam', 5000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
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
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `pembayaran_id_sewa_foreign` (`id_sewa`);

--
-- Indeks untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- Indeks untuk tabel `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id_penyewa`);

--
-- Indeks untuk tabel `properti`
--
ALTER TABLE `properti`
  ADD PRIMARY KEY (`id_properti`);

--
-- Indeks untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `sewa_id_properti_foreign` (`id_properti`),
  ADD KEY `sewa_id_penyewa_foreign` (`id_penyewa`);

--
-- Indeks untuk tabel `transaksi_keuangan`
--
ALTER TABLE `transaksi_keuangan`
  ADD PRIMARY KEY (`id_transaksi_keuangan`),
  ADD KEY `transaksi_keuangan_id_pembayaran_foreign` (`id_pembayaran`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id_penyewa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `properti`
--
ALTER TABLE `properti`
  MODIFY `id_properti` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transaksi_keuangan`
--
ALTER TABLE `transaksi_keuangan`
  MODIFY `id_transaksi_keuangan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_id_sewa_foreign` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`id_sewa`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_id_penyewa_foreign` FOREIGN KEY (`id_penyewa`) REFERENCES `penyewa` (`id_penyewa`),
  ADD CONSTRAINT `sewa_id_properti_foreign` FOREIGN KEY (`id_properti`) REFERENCES `properti` (`id_properti`);

--
-- Ketidakleluasaan untuk tabel `transaksi_keuangan`
--
ALTER TABLE `transaksi_keuangan`
  ADD CONSTRAINT `transaksi_keuangan_id_pembayaran_foreign` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
