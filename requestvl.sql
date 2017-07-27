-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2017 at 07:58 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `requestvl`
--

-- --------------------------------------------------------

--
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2017_07_27_103536_create_leave_requests', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `badge` int(11) NOT NULL,
  `emp_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_bal` int(11) NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `badge`, `emp_name`, `email`, `password`, `leave_bal`, `role`, `emp_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1001, 'Administrator', 'admin@uringood.com', '$2y$10$zO8uEwPk4EGyOEGEtipW2.GUs.q9srV2cWAWNLBe5jh32AD0kERqG', 24, 'admin', 'active', 'GvFxaBdKhsfgbaysLeR2pFVfPAvAnRVPSgPDU1l4UL9SH4xQV3lecQrBXiwl', NULL, NULL),
(2, 1002, 'Eldora Hagenes', 'e.hagenes@uringood.com', '$2y$10$hwvVZJ78W502GHstFXlv5Oex.zWMJ36i7FWc0x7S8gls8O6woWOwa', 24, 'regular', 'active', 'fgLAECesmuAFEw87WvmIY3W2np16MT7fnJMvju31NFC3ZDyqunpSEVt0uy3s', NULL, NULL),
(3, 1003, 'Jerry Schulist', 'j.schulist@uringood.com', '$2y$10$q2Po1JwDinGTWM4vcu3nj.X6Lptm81uW09s1pBIVmMfBILL94nfQy', 24, 'regular', 'active', NULL, NULL, NULL),
(4, 1004, 'Nichole Kulas', 'n.kulas@uringood.com', '$2y$10$Fryew3ODbnrAGiUjMNCOiOPENZ4PtTWHuTkhZMKOHry0uc3CaB6bK', 24, 'regular', 'active', NULL, NULL, NULL),
(5, 1005, 'Henriette Renner', 'h.renner@uringood.com', '$2y$10$xx40VChgpWknV00p9NxWOeNkE7bYMzXtNC48Vit2sopVv8kMRopKe', 24, 'regular', 'active', NULL, NULL, NULL),
(6, 1006, 'Odie Gleichner', 'o.gleichner@uringood.com', '$2y$10$Nnw5XAGlcVIC4O3qqCmddOQiY0txNPBquhKzOeZZh9zWy7fkZHtu6', 24, 'regular', 'active', NULL, NULL, NULL),
(7, 1007, 'Collin Hamill', 'c.hamill@uringood.com', '$2y$10$HpKMY/7yfz6phx7l/r3Nluc3eCP1w7L74vvF9M6ri8UZ4dDXWJZmm', 24, 'regular', 'active', NULL, NULL, NULL),
(8, 1008, 'Elbert Swift', 'e.swift@uringood.com', '$2y$10$txCrLYwOCrSN1HYnHN1I2.hieVG7d27WpYudy8GdPmxXR6kr7e/1q', 24, 'regular', 'active', NULL, NULL, NULL),
(9, 1009, 'Rebekah Crooks', 'r.crooks@uringood.com', '$2y$10$CX6/DzeCOn4AmNjALbLh7OOUkx26vXOS5jv3YuJFmb1S.IFUQmKyi', 24, 'regular', 'active', NULL, NULL, NULL),
(10, 1010, 'Thalia Effertz', 't.effertz@uringood.com', '$2y$10$90saRBsH7GvJmp5OKq9TMeLHl/aHGFFsVh3/j2tKbLbYs1vOD5JyW', 24, 'regular', 'active', NULL, NULL, NULL),
(11, 1011, 'Jay Herman', 'h.herman@uringood.com', '$2y$10$irJdaCpynJEFyD9Ix2Ujl.gmHJJA5Z59JACBz62pV2EBLghNF7/KG', 24, 'regular', 'active', NULL, NULL, NULL),
(12, 1012, 'Kale Herman', 'k.herman@uringood.com', '$2y$10$SCu46yiOhomOXTQxHxMXq.yym/cugs8/TihHbv65hIrZKCYA82Doi', 24, 'regular', 'active', NULL, NULL, NULL),
(13, 1013, 'Pinkie Hartmann', 'p.hartmann@uringood.com', '$2y$10$iCpusx3oW5DCgiMnUVKLg.bJXWqljE7SwJzWaztyr8yDZx6YWXufu', 24, 'regular', 'active', NULL, NULL, NULL),
(14, 1014, 'Olivia Kulas', 'o.kulas@uringood.com', '$2y$10$nEsDT4mrjXCJndhL4i715ukV4wdfTN2GC5mNS5i02IMVqeVD1PYZS', 24, 'regular', 'active', NULL, NULL, NULL),
(15, 1015, 'Johan Johnson', 'j.johnson@uringood.com', '$2y$10$PKnvNQLABWBcDMkspA/6re3NetpUL8C3gSYt6fIWm6Zecpi20emWO', 24, 'regular', 'active', NULL, NULL, NULL),
(16, 1016, 'Marcellus Harvey', 'm.harvey@uringood.com', '$2y$10$oh.9NonYr12QxiuDFLsIAO97DaDVOgWZczAErfqMdaUu4Q5BeCXZe', 24, 'regular', 'active', NULL, NULL, NULL),
(17, 1017, 'Mattie Ferry', 'm.ferry@uringood.com', '$2y$10$kGDbKPIXiKkwvZQpNm8Cmuq8.GcW1tbKMWjnvQrCdokxa6gIdYZvq', 24, 'regular', 'active', NULL, NULL, NULL),
(18, 1018, 'Fae Nolan', 'f.nolan@uringood.com', '$2y$10$fLE1BK4Y2q9Vue7QuwfmRerI6dt/W5GoZQslFXkJHC0JjR/6XzQXi', 24, 'regular', 'active', NULL, NULL, NULL),
(19, 1019, 'Jesse Lubowitz', 'j.lubowitz@uringood.com', '$2y$10$ki7rua6AwXoxsyEXozEOa.BuZA4jvF2qUjfFv653Ct7YqSvPgGqQW', 24, 'regular', 'active', NULL, NULL, NULL),
(20, 1020, 'Matilde Bins', 'm.bins@uringood.com', '$2y$10$VAc5r7GH1l3dpM6hMTHzPuEtnp/IqkKtK2uy0cUKU3QTPzGuUp.xq', 24, 'regular', 'active', NULL, NULL, NULL),
(21, 1021, 'Emery Strosin', 'e.strosin@uringood.com', '$2y$10$H4N.t.Ui7/EDlpaiN9CKxexKsr/vHPTbrzEU6Q1eecybmUO0ZzUyC', 24, 'regular', 'active', NULL, NULL, NULL),
(22, 1022, 'Kyla Hackett', 'k.hackett@uringood.com', '$2y$10$mSNu.suvVpTlgpIbCng2VecXg9hyutt5fVHrh5oPXHBa8BpFu/YwC', 24, 'regular', 'active', NULL, NULL, NULL),
(23, 1023, 'Tremayne Schulist', 't.schulist@uringood.com', '$2y$10$QFGz5Leolsot.WDJ9ehpZugUlnJ4Krfut601AufjpqjJ/393jvXNK', 24, 'regular', 'active', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leave_requests`
--
ALTER TABLE `leave_requests`
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
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
