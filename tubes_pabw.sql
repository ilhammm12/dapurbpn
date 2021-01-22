-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2021 at 05:45 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_pabw`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ma_menus`
--

CREATE TABLE `ma_menus` (
  `idMenu` bigint(20) UNSIGNED NOT NULL,
  `idToko` bigint(20) UNSIGNED NOT NULL,
  `namaMenu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoMenu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargaMenu` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_menus`
--

INSERT INTO `ma_menus` (`idMenu`, `idToko`, `namaMenu`, `fotoMenu`, `hargaMenu`, `stok`, `created_at`, `updated_at`) VALUES
(32, 25, 'Ayam cincang', '1611311432.jpg', 30000, 17, '2021-01-22 03:30:32', '2021-01-22 03:41:21'),
(33, 25, 'Bubur balikpapan', '1611311451.jpg', 15000, 6, '2021-01-22 03:30:51', '2021-01-22 03:40:56'),
(34, 25, 'Sate kambing pedas', '1611311518.png', 15000, 15, '2021-01-22 03:31:58', '2021-01-22 05:05:46'),
(35, 26, 'Kepiting asam manis', '1611312178.jpg', 30000, 50, '2021-01-22 03:42:58', '2021-01-22 03:42:58'),
(36, 26, 'Rawon daging sapi', '1611312202.jpg', 15000, 20, '2021-01-22 03:43:22', '2021-01-22 03:43:22'),
(37, 26, 'Nasi bakar', '1611312221.jpg', 25000, 15, '2021-01-22 03:43:41', '2021-01-22 03:43:41'),
(38, 27, 'Ayam gilas', '1611316758.jpg', 20000, 50, '2021-01-22 04:59:18', '2021-01-22 04:59:18');

-- --------------------------------------------------------

--
-- Table structure for table `ma_tokos`
--

CREATE TABLE `ma_tokos` (
  `idToko` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `namaToko` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_tokos`
--

INSERT INTO `ma_tokos` (`idToko`, `idUser`, `namaToko`, `alamat`, `foto`, `jam_buka`, `jam_tutup`, `created_at`, `updated_at`) VALUES
(25, 16, 'Warung Bugis Ilam', 'Jalan mt Haryono', '1611311384.jpg', '09:00:00', '15:00:00', '2021-01-22 03:29:44', '2021-01-22 03:29:44'),
(26, 17, 'Warpad Ade', 'jalan kemakmuran', '1611312148.jpg', '08:00:00', '12:00:00', '2021-01-22 03:42:28', '2021-01-22 03:42:28'),
(27, 18, 'Bagas Food', 'Jalan Juanda', '1611316599.jpg', '09:00:00', '15:00:00', '2021-01-22 04:56:39', '2021-01-22 04:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `ma_transaksis`
--

CREATE TABLE `ma_transaksis` (
  `idTransaksi` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `tglTransaksi` date NOT NULL,
  `idMenu` bigint(20) UNSIGNED NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `totalharga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_transaksis`
--

INSERT INTO `ma_transaksis` (`idTransaksi`, `idUser`, `tglTransaksi`, `idMenu`, `alamat`, `jumlah`, `totalharga`, `created_at`, `updated_at`) VALUES
(18, 17, '2021-01-22', 33, 'jalan pandan sari', 5, 75000, '2021-01-22 03:40:56', '2021-01-22 03:40:56'),
(19, 17, '2021-01-22', 32, 'pandan tua', 3, 90000, '2021-01-22 03:41:21', '2021-01-22 03:41:21'),
(20, 18, '2021-01-22', 34, 'Jalan banyuwangi', 5, 75000, '2021-01-22 05:05:46', '2021-01-22 05:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `ma_users`
--

CREATE TABLE `ma_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_users`
--

INSERT INTO `ma_users` (`id`, `nama`, `email`, `password`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(16, 'Muhammad Ilham', 'ilam@gmail.com', '$2y$10$6KzRJDlntPXHuSunGFrWruIhnGXKrdFKJH6aj.HResItLFxIY4nJS', 'Jalan sei wain RT 33 NO 55', 62867284, '2021-01-22 03:28:26', '2021-01-22 03:28:26'),
(17, 'ade maulana', 'ade@gmail.com', '$2y$10$NxXVCldxHDu65r/C/HDmkOfWf0jxdQr3Fx/DHt2czv.Cj9Ze1yGna', 'jalan suryanata', 62890830, '2021-01-22 03:32:46', '2021-01-22 03:32:46'),
(18, 'bagas kuyha purbalingga', 'bagas@gmail.com', '$2y$10$RQ1fReUD4ZbF/uGu4Sb2u.rvtuxmLXosRm62k5SgD45p0knojzIHS', 'jalan kemenangan', 628009493, '2021-01-22 04:51:52', '2021-01-22 04:51:52');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_23_163028_create_ma_users_table', 2),
(5, '2020_12_23_171055_create_ma_tokos_table', 3),
(6, '2021_01_12_054951_create_ma_menus_table', 4),
(7, '2021_01_20_153231_create_ma_penggunas_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$A.4at8HEG6StYoIVop.hFOKaetpXW.mCeECnhEqSVFmSzn4RsENDq', NULL, '2020-12-21 23:34:47', '2020-12-21 23:34:47'),
(2, 'iniadmin', 'admin@admin.com', NULL, '$2y$10$f5FPrm6NCARRAlpdyMFF.O.kPCaS7tqs1jEDbJYmyoHrEs2VXVzc.', NULL, '2021-01-11 20:11:53', '2021-01-11 20:11:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ma_menus`
--
ALTER TABLE `ma_menus`
  ADD PRIMARY KEY (`idMenu`),
  ADD KEY `idToko` (`idToko`);

--
-- Indexes for table `ma_tokos`
--
ALTER TABLE `ma_tokos`
  ADD PRIMARY KEY (`idToko`),
  ADD KEY `ma_tokos_iduser_foreign` (`idUser`);

--
-- Indexes for table `ma_transaksis`
--
ALTER TABLE `ma_transaksis`
  ADD PRIMARY KEY (`idTransaksi`),
  ADD KEY `idMenu` (`idMenu`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `ma_users`
--
ALTER TABLE `ma_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ma_menus`
--
ALTER TABLE `ma_menus`
  MODIFY `idMenu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `ma_tokos`
--
ALTER TABLE `ma_tokos`
  MODIFY `idToko` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ma_transaksis`
--
ALTER TABLE `ma_transaksis`
  MODIFY `idTransaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ma_users`
--
ALTER TABLE `ma_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ma_menus`
--
ALTER TABLE `ma_menus`
  ADD CONSTRAINT `ma_menus_idtoko_foreign` FOREIGN KEY (`idToko`) REFERENCES `ma_tokos` (`idToko`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ma_tokos`
--
ALTER TABLE `ma_tokos`
  ADD CONSTRAINT `ma_tokos_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `ma_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ma_transaksis`
--
ALTER TABLE `ma_transaksis`
  ADD CONSTRAINT `ma_transaksis_ibfk_1` FOREIGN KEY (`idMenu`) REFERENCES `ma_menus` (`idMenu`),
  ADD CONSTRAINT `ma_transaksis_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `ma_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
