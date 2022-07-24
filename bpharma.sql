-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 01:58 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpharma`
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
-- Table structure for table `medecines`
--

CREATE TABLE `medecines` (
  `id_medecine` int(11) NOT NULL,
  `name_medecine` varchar(255) NOT NULL,
  `price_medecine` varchar(20) NOT NULL,
  `cat_medecine` varchar(100) DEFAULT NULL,
  `type_medecine` varchar(100) DEFAULT NULL,
  `indication_medecine` varchar(255) DEFAULT NULL,
  `etat` int(11) NOT NULL,
  `qty_stock` int(11) NOT NULL,
  `qty_etagere` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medecines`
--

INSERT INTO `medecines` (`id_medecine`, `name_medecine`, `price_medecine`, `cat_medecine`, `type_medecine`, `indication_medecine`, `etat`, `qty_stock`, `qty_etagere`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'AC Fenac Cp', '12000', NULL, 'Comprime', NULL, 1, 0, 0, 1, '2022-07-22 18:12:25', '2022-07-22 18:12:25'),
(2, 'Acepar plus', '9800', NULL, NULL, 'Il fo le prendre avant de dormir', 0, 23, 0, 1, '2022-07-22 18:16:01', '2022-07-24 21:45:04'),
(3, 'Actigrippe', '1000', 'Generique', NULL, NULL, 1, 0, 0, 1, '2022-07-22 18:59:36', '2022-07-22 18:59:36'),
(4, 'Amlo Denk 5mg', '6400', 'Specialite', 'Sirop', NULL, 1, 0, 0, 1, '2022-07-22 20:42:29', '2022-07-24 20:13:17'),
(5, 'Augmin sp', '10800', 'Sirop', NULL, NULL, 1, 8, 0, 1, '2022-07-22 20:47:29', '2022-07-24 20:42:11'),
(6, 'Calcium  inj', '1000', 'Generique', 'Injectable', NULL, 1, 0, 0, 1, '2022-07-22 20:49:37', '2022-07-22 20:49:37'),
(7, 'Cipro-Denk 750mg', '15000', 'Specialite', NULL, NULL, 0, 0, 0, 1, '2022-07-22 21:09:21', '2022-07-22 21:09:21'),
(8, 'ciprofloxacine  cés 500mg', '1500', NULL, NULL, NULL, 1, 0, 0, 1, '2022-07-22 21:24:54', '2022-07-22 21:24:54'),
(10, 'Cotrimoxazole  cés 480mg', '2900', NULL, NULL, NULL, 1, 0, 0, 1, '2022-07-23 10:51:54', '2022-07-23 10:51:54'),
(11, 'Daonil  cés B100', '13500', NULL, NULL, NULL, 0, 0, 0, 1, '2022-07-23 10:53:36', '2022-07-23 10:53:36'),
(12, 'Provident elit pro', '35', 'Repellendus Sequi e', 'Aut quis impedit pr', 'Rerum quas placeat', 1, 0, 0, 1, '2022-07-23 11:09:37', '2022-07-23 11:09:37'),
(13, 'Anim Nam commodi pro', '420', 'Minus unde non volup', 'Non aute veniam inv', NULL, 1, 0, 0, 1, '2022-07-23 11:11:05', '2022-07-23 11:11:05'),
(14, 'Tempora omnis molest', '6182200', 'Generique', 'Eveniet velit sint', NULL, 1, 0, 0, 1, '2022-07-23 11:11:25', '2022-07-23 11:11:25'),
(15, 'Détol   sol  derm', '3000', NULL, NULL, NULL, 1, 0, 0, 1, '2022-07-23 15:39:52', '2022-07-23 15:39:52'),
(18, 'Dragon  liduide', '4000', 'Generique', NULL, NULL, 1, 0, 0, 1, '2022-07-24 19:44:02', '2022-07-24 19:44:02');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth_token', '16d649e63160be33b61db53c0c651832e6fc053c4540c4dad2a670f64cd8e942', '[\"*\"]', NULL, '2022-07-21 13:08:14', '2022-07-21 13:08:14'),
(2, 'App\\Models\\User', 1, 'auth_token', 'c0aec513d9812674477e0655070ee3f011822eb94411c27eb8ffb3bb565f201a', '[\"*\"]', NULL, '2022-07-21 13:17:25', '2022-07-21 13:17:25'),
(3, 'App\\Models\\User', 1, 'auth_token', '48245231538ed5c8ac366c038bbfd266f6b1c8fab582a4973a0a9f18750e19ab', '[\"*\"]', NULL, '2022-07-21 13:31:25', '2022-07-21 13:31:25'),
(4, 'App\\Models\\User', 1, 'auth_token', '146b641c7beb9f7b5936fb67252f94eda0d55fc4a9ec6a3c60583fae15e3637a', '[\"*\"]', NULL, '2022-07-21 13:31:41', '2022-07-21 13:31:41'),
(5, 'App\\Models\\User', 1, 'auth_token', '0e982f0e7055927cd12c366a837cc3c8e2a8ed3d9336661adb9f5d8c38e4aae6', '[\"*\"]', NULL, '2022-07-21 13:31:59', '2022-07-21 13:31:59'),
(6, 'App\\Models\\User', 1, 'auth_token', 'a0fdfc53bcb0d0accd8fc582b2af523d104048b471610dfbeadeebfdc31c4cc8', '[\"*\"]', NULL, '2022-07-21 13:40:27', '2022-07-21 13:40:27'),
(7, 'App\\Models\\User', 1, 'auth_token', 'dfa97be30f976647228d7a1b3d8afc948de0b2b79c9f0f99eb6114da3b2ed763', '[\"*\"]', NULL, '2022-07-21 13:40:42', '2022-07-21 13:40:42'),
(8, 'App\\Models\\User', 1, 'auth_token', 'b9a7e3e3cac8cebad7f43a864239cf23ce9d911c4616a52dc70b35e3ec7c3d97', '[\"*\"]', NULL, '2022-07-21 13:45:40', '2022-07-21 13:45:40'),
(9, 'App\\Models\\User', 1, 'auth_token', 'c745894e57932bf8355a852ef3ba8ef990d8b7040826940160fae712d3b6105e', '[\"*\"]', NULL, '2022-07-21 13:45:44', '2022-07-21 13:45:44'),
(10, 'App\\Models\\User', 1, 'auth_token', '9443978a558fc107e3d098041a36743bab4aca19ffd818bffff51d9d5cb510b2', '[\"*\"]', NULL, '2022-07-21 13:45:58', '2022-07-21 13:45:58'),
(11, 'App\\Models\\User', 1, 'auth_token', '2b9c02d5413974cab018e70c3232871afd841bb6925e970c67ad36a904442e5b', '[\"*\"]', NULL, '2022-07-21 13:46:10', '2022-07-21 13:46:10'),
(12, 'App\\Models\\User', 1, 'auth_token', 'a6c4ca3031d1227a4a1772a811ce2e7e2e673f8279def1c0b97bf53788968fbf', '[\"*\"]', NULL, '2022-07-21 13:56:15', '2022-07-21 13:56:15'),
(13, 'App\\Models\\User', 1, 'auth_token', 'f079b98639c28e43eb9969a6e8214c836657d0c8e3ae325a848d9133614b9f6e', '[\"*\"]', NULL, '2022-07-21 14:16:35', '2022-07-21 14:16:35'),
(14, 'App\\Models\\User', 1, 'auth_token', '3806d1d003d0907c29f1b449360abdeed77d8af80957f7a85168bafcb6aa26a7', '[\"*\"]', NULL, '2022-07-21 14:21:39', '2022-07-21 14:21:39'),
(15, 'App\\Models\\User', 1, 'auth_token', 'c976bda85c5c0e8d4c4dd7176ac55df629f62e428c4dd3d86891fb62e5c16626', '[\"*\"]', NULL, '2022-07-21 14:27:16', '2022-07-21 14:27:16'),
(16, 'App\\Models\\User', 1, 'auth_token', '2e244438cc6e73f0f82bb418037d1eb0f52a9183991eea7a81a46afc3ccc421c', '[\"*\"]', NULL, '2022-07-21 14:27:16', '2022-07-21 14:27:16'),
(17, 'App\\Models\\User', 1, 'auth_token', '339ae6eaae3852bc940a4faa4b38e71c533072e906e52adaf7661632488d722f', '[\"*\"]', NULL, '2022-07-21 14:28:09', '2022-07-21 14:28:09'),
(18, 'App\\Models\\User', 1, 'auth_token', '1b7d4d41736d15496c7b846d631d042f1596f1f36b79283bbbc798ce9b3a2d9e', '[\"*\"]', NULL, '2022-07-21 14:36:07', '2022-07-21 14:36:07'),
(19, 'App\\Models\\User', 1, 'auth_token', '4fcafd57c718d566da88c6826e1f3492de67426f5d2f7cbe137520f94a2bef16', '[\"*\"]', NULL, '2022-07-21 14:40:00', '2022-07-21 14:40:00'),
(20, 'App\\Models\\User', 1, 'auth_token', '73ef4fc6b8246bafb6b558497509f5bfe248834b97499f9eecc100cd884a5357', '[\"*\"]', NULL, '2022-07-21 14:59:05', '2022-07-21 14:59:05'),
(21, 'App\\Models\\User', 1, 'auth_token', '75cd78d59f93bb4bd633a9d5ab7760323e95ccf25476ccab989405628670fd4e', '[\"*\"]', NULL, '2022-07-21 14:59:56', '2022-07-21 14:59:56'),
(22, 'App\\Models\\User', 1, 'auth_token', '9595c0559046aae476cc107eb95a53a01950a43219363f4df5cbdaf7ffcc1d14', '[\"*\"]', NULL, '2022-07-21 15:02:39', '2022-07-21 15:02:39'),
(23, 'App\\Models\\User', 1, 'auth_token', 'c622d390b8105dec16c36b5c6d620ad3388ed24f4de363778c1080af2b616cea', '[\"*\"]', NULL, '2022-07-21 15:04:42', '2022-07-21 15:04:42'),
(24, 'App\\Models\\User', 1, 'auth_token', '46c9bcbd88baedfbb6ae4173017141422afda3d4e4f0402a7effff5bdee354ba', '[\"*\"]', NULL, '2022-07-21 15:04:45', '2022-07-21 15:04:45'),
(25, 'App\\Models\\User', 1, 'auth_token', '4a10e0609d863cf8ee17a24c253dd2a0b51845939f02dc6b1c8409e26e7c3c50', '[\"*\"]', NULL, '2022-07-21 15:18:40', '2022-07-21 15:18:40'),
(26, 'App\\Models\\User', 1, 'auth_token', 'a5e4c7f57926d4b50ddeb20b1807ab7c04ddce43d48ea43be83720154ac8703a', '[\"*\"]', NULL, '2022-07-21 15:19:45', '2022-07-21 15:19:45'),
(27, 'App\\Models\\User', 1, 'auth_token', '10bdf740b3af06fbca9a3abf625ec8550b9748a13932237c7b57f87b45d242d6', '[\"*\"]', NULL, '2022-07-21 15:41:40', '2022-07-21 15:41:40'),
(28, 'App\\Models\\User', 1, 'auth_token', '4bb43014dce4d284143f4446b52e52cc87b05fa8c2a78a6b9f69633fe99ddd79', '[\"*\"]', NULL, '2022-07-21 15:48:30', '2022-07-21 15:48:30'),
(29, 'App\\Models\\User', 1, 'auth_token', 'f46c0c06f6872ab7eca09eb8c59a0a1ae94f5655accd31f4501a542624ae106a', '[\"*\"]', NULL, '2022-07-21 17:04:19', '2022-07-21 17:04:19'),
(30, 'App\\Models\\User', 1, 'auth_token', 'ad26a55c321cdfdf49a0393f3de9da892c940898e8e4990368e54d0a33392985', '[\"*\"]', NULL, '2022-07-21 17:05:11', '2022-07-21 17:05:11'),
(31, 'App\\Models\\User', 1, 'auth_token', '6cc838b90223a0d22b32ac91602c4456307097e88fc13cd7a7088a4371ace314', '[\"*\"]', NULL, '2022-07-21 17:05:56', '2022-07-21 17:05:56'),
(32, 'App\\Models\\User', 1, 'auth_token', 'f67e5080dfacebb826509d2aabfa80f030404611767fc58a5bb920865021cb7c', '[\"*\"]', NULL, '2022-07-23 10:52:40', '2022-07-23 10:52:40');

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
  `registered_as` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `registered_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'TonyBim', 'bito@biu.bi', NULL, '$2y$10$RUDuGew.eFcOht4qWrFRNOTWAIDtcz4JYNalVKltveq5/1WmQDsxm', 'Admin', NULL, '2022-07-20 21:58:16', '2022-07-20 21:58:16');

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
-- Indexes for table `medecines`
--
ALTER TABLE `medecines`
  ADD PRIMARY KEY (`id_medecine`),
  ADD KEY `id_user` (`id_user`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `medecines`
--
ALTER TABLE `medecines`
  MODIFY `id_medecine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medecines`
--
ALTER TABLE `medecines`
  ADD CONSTRAINT `medecines_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
