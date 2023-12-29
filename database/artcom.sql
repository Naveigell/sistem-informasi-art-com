-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 12:04 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artcom`
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_24_042601_create_roles_table', 1),
(6, '2022_03_24_042708_create_role_user_table', 1);

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
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin@artcom.com', NULL, '$2y$10$jbhwejWTt6giP4dYejPzPO..ZxfqLl5ditofQJBoQXTz0n9iIOgbu', 'admin', 'Xn5bOQTvRVuruLUbr2102TE0abH7jffzUQqPnREF8WiTRSwTFxt37DHXVHVl', '2022-03-23 22:10:27', '2022-03-23 22:10:27'),
(3, 'Yen Norton', 'client@gmail.com', NULL, '$2y$10$Gjy7a39.HUoG9lfbK7c47eZnBNmFzbNJfqPviCEEAut59S4SDosVW', 'client', NULL, '2022-03-23 22:27:04', '2022-03-23 22:27:04'),
(4, 'Cheyenne Nelson', 'lisiqelar@mailinator.com', NULL, '$2y$10$HgNgH4lHTqyal2rQFyoz.OiExxQVhn5812Tisosi3W.AyOuRAgqgy', 'artist', NULL, '2022-03-25 02:50:08', '2022-03-25 02:50:08'),
(7, 'Lucy Franks', 'artist@artcom.com', NULL, '$2y$10$sBRQcsfJeI2bGj2WRHDQjO7kQP8/Tx9jQKU5Bujdzz2940CE3QeWO', 'artist', NULL, '2022-04-10 01:22:47', '2022-04-10 01:22:47'),
(8, 'Anastasia Herman', 'devyk@mailinator.com', NULL, '$2y$10$UTgyUhhM2yZcM14OeS0GQeiKSUffLPIWGAdhtL4M/79DSicZDi.E6', 'client', NULL, '2022-05-12 05:08:17', '2022-05-12 05:08:17'),
(9, 'Test Name', 'test@gmail.com', NULL, '$2y$10$0F6lQOtJbwwQ5JfsY4KAquoiQ86j/RPgwVZahsMLgZgIDkHjDIfiq', 'artist', NULL, '2022-05-12 06:17:10', '2022-05-12 06:17:10'),
(10, 'dd', 'invalid@emailaddress', NULL, '$2y$10$fEoQZOXmixkJZxVYRSKJhOVJBHEW4brJVDPt.YhCjORogEAzktBf2', 'client', NULL, '2022-05-12 06:30:32', '2022-05-12 06:30:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
