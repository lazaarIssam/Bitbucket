-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: mysql-issamdata.alwaysdata.net
-- Generation Time: Aug 17, 2020 at 07:47 PM
-- Server version: 10.3.17-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `issamdata_projet`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `Name`, `Email`, `Address`, `Phone`, `Website`, `created_at`, `updated_at`) VALUES
(11, 'test222', 'test2@test.fr', 'Rue test 2', '889789798', 'www.test2.com', '2020-08-17 12:31:52', '2020-08-17 15:20:51'),
(12, 'test1', 'test1', 'test1', '8746541', 'test1', '2020-08-17 12:46:08', '2020-08-17 12:46:24'),
(13, 'BNP', 'bnp@test.fr', 'kjjefbkzefjkzefk', '56454864', 'www.bnp.com', '2020-08-17 13:41:26', '2020-08-17 13:41:26'),
(16, 'test3', 'test3', 'test3', 'test3', 'test3', '2020-08-17 15:34:44', '2020-08-17 15:34:44'),
(17, 'test4', 'test4', 'test4', 'test4', 'test4', '2020-08-17 15:35:01', '2020-08-17 15:35:01'),
(18, 'test5', 'test5', 'test5', 'test5', 'test5', '2020-08-17 15:35:15', '2020-08-17 15:35:15'),
(19, 'test6', 'test6test', '6test', '8646846', '6test', '2020-08-17 15:35:36', '2020-08-17 15:35:36'),
(20, 'test7', 'test7', 'test7', '5646489', 'test7', '2020-08-17 15:35:52', '2020-08-17 15:35:52'),
(21, 'test7', 'test8', 'test8', '56487', 'test8', '2020-08-17 15:36:10', '2020-08-17 15:36:10'),
(22, 'test10', 'test10', 'test10', '568974566', 'test10', '2020-08-17 15:36:28', '2020-08-17 15:36:28'),
(23, 'test11', 'test11', 'test11', '64564564', 'test11', '2020-08-17 15:36:45', '2020-08-17 15:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `companie_id` bigint(20) UNSIGNED NOT NULL,
  `FirstName` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastName` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `companie_id`, `FirstName`, `LastName`, `Designation`, `Email`, `Address`, `Mobile`, `created_at`, `updated_at`) VALUES
(2, 11, 'test2', 'test2', 'Mme.', 'test2@test.fr', 'Rue de test', '5646846849', NULL, '2020-08-17 14:54:03'),
(3, 11, 'Issam', 'Lazaar', 'Mr.', 'lazaar.issam@hotmail.com', 'Residence Alhena 8 Boulevard Mendes France Appartement 1431', '0766717192', '2020-08-17 13:32:26', '2020-08-17 13:32:26'),
(4, 12, 'véronique', 'véro', 'Mme.', 'véro@test.fr', 'dazdlkazndfanzf', '545645645', '2020-08-17 13:39:21', '2020-08-17 14:27:45'),
(5, 12, 'bruno', 'rousii', 'Mr.', 'bruno@test.fr', 'ajlnfjknaif', '6789564', '2020-08-17 13:39:47', '2020-08-17 13:39:47'),
(8, 13, 'catherine', 'lenfant', 'Mme.', 'c.lenfant@quaternaire.fr', 'orvault', '564564564', '2020-08-17 14:26:17', '2020-08-17 14:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2020_08_17_113919_create_companies_table', 2),
(7, '2020_08_17_114009_create_employees_table', 3),
(8, '2020_08_17_115947_add_foreignkey_to_employees_table', 3);

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
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$ArrJimvyL4h7/LDA3M6KV.401ZtNaWJBIJ.QUZGeWawipcq/A4gHS', 'FS2NRN2649x0uGAwimZVDJP3mNdVUgbEQuAWA0QvgoLyMyQdYXZVLZiUqXED', '2020-08-17 09:20:14', '2020-08-17 09:20:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_companie_id_foreign` (`companie_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_companie_id_foreign` FOREIGN KEY (`companie_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
