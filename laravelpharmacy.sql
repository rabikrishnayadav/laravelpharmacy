-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2024 at 06:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelpharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `doctor_name` varchar(255) DEFAULT NULL,
  `doctor_address` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `contact_number`, `address`, `doctor_name`, `doctor_address`, `created_at`, `updated_at`) VALUES
(2, 'Alana House', '88888888888', 'Quidem esse laborum', 'Timothy Park', 'Doloremque aliquam q', '2024-02-22 09:47:48', '2024-02-22 10:36:04'),
(3, 'Joan Mills', '945', 'Illo repellendus Qu', 'Candice James', 'Occaecat est recusan', '2024-02-22 09:48:55', '2024-02-22 09:48:55'),
(5, 'Patience Burris', '440', 'Sunt amet ab venia', 'Brendan Morrison', 'Aliquip sint natus i', '2024-02-22 09:49:28', '2024-02-22 09:49:28'),
(6, 'Abbot Duffy', '756', 'Sunt cupiditate non', 'Allegra Weeks', 'Qui laborum proident', '2024-02-22 09:51:42', '2024-02-22 09:51:42'),
(7, 'Farrah Richmond', '471', 'Iusto pariatur Est', 'Olympia Romero', 'Soluta expedita enim', '2024-02-22 09:51:56', '2024-02-22 09:51:56'),
(8, 'Theodore Robertson', '451', 'Neque quia quos exce', 'Nyssa Flynn', 'At aliquam molestias', '2024-02-22 09:52:12', '2024-02-22 09:52:12'),
(9, 'Thor Mcgowan', '892', 'Velit iste deserunt', 'Patricia Monroe', 'Omnis vitae facere a', '2024-02-22 10:16:40', '2024-02-22 10:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `net_total` varchar(255) DEFAULT NULL,
  `invoices_date` date DEFAULT NULL,
  `customers_id` tinyint(11) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `total_discount` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `net_total`, `invoices_date`, `customers_id`, `total_amount`, `total_discount`, `created_at`, `updated_at`) VALUES
(2, '9980', '2024-02-19', 8, 'Reprehenderit est ma', 'Nostrum duis optio', '2024-02-25 17:36:05', '2024-02-25 17:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `packing` varchar(255) DEFAULT NULL,
  `generic_name` varchar(255) DEFAULT NULL,
  `supplier_name` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0: No Delete, 1: Yes Delete',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `packing`, `generic_name`, `supplier_name`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Naomi', 'Dolor', 'Sean', 'Chastity', 0, '2024-02-23 02:08:18', '2024-02-23 02:48:22'),
(3, 'Cameron Pierce', 'Cupiditate et occaec', 'Wilma Ford', 'Rhona Perkins', 0, '2024-02-23 02:11:45', '2024-02-23 02:11:45'),
(4, 'Hope Hewitt', 'Quia est vel sint de', 'Samson Todd', 'Ingrid Chambers', 0, '2024-02-23 02:26:28', '2024-02-23 02:26:28'),
(6, 'Brendan Oneal', 'Ad minim quae accusa', 'Glenna Alexander', 'Jeanette Chaney', 1, '2024-02-23 02:47:54', '2024-02-23 03:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `medicines_stock`
--

CREATE TABLE `medicines_stock` (
  `id` int(11) NOT NULL,
  `medicines_id` int(11) DEFAULT NULL,
  `batch_id` varchar(255) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `mrp` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicines_stock`
--

INSERT INTO `medicines_stock` (`id`, `medicines_id`, `batch_id`, `expiry_date`, `quantity`, `mrp`, `rate`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sit perspiciatis t', '2013-11-03', '257', 'Vel totam voluptas l', 'Enim aut adipisicing', '2024-02-25 13:27:31', '2024-02-25 15:03:41'),
(3, 1, 'Dolor rerum dolores', '2005-04-04', '506', 'Et iusto in ullam di', 'Id quisquam amet re', '2024-02-25 14:48:38', '2024-02-25 15:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `suppliers_id` int(11) DEFAULT NULL,
  `invoices_id` int(11) DEFAULT NULL,
  `voucher_number` varchar(255) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `payment_status` tinyint(1) DEFAULT 1 COMMENT '1: pending, 2: accept, 3:cancel',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `suppliers_id`, `invoices_id`, `voucher_number`, `purchase_date`, `total_amount`, `payment_status`, `created_at`, `updated_at`) VALUES
(2, 2, 2, '812', '1992-08-14', '67', 1, '2024-02-26 16:12:55', '2024-02-26 16:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `suppliers_name` varchar(255) DEFAULT NULL,
  `suppliers_email` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `suppliers_name`, `suppliers_email`, `contact_number`, `address`, `created_at`, `updated_at`) VALUES
(2, 'Cassandra Sykes', 'gihilow@mailinator.com', '9980193592', 'Totam similique cons', '2024-02-25 15:53:49', '2024-02-25 15:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_role` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `profile_image`, `password`, `remember_token`, `is_role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2024-02-16 04:06:35', 'reWo6S5l6QNuJAmQQ2Tk8i9a6J11ek.JPG', '$2y$12$rI5LLD9L6casCtmoDOnrXO6GJBSIPzy0/92P0VpNRTTVTEWv2bnye', 'd1SNFFLUe5yV22nItE2u4R7IeyFdourjqL32F6C3KAKlvQzw3pcuAjJH0a7H', 1, '2024-02-16 04:06:35', '2024-02-26 20:02:46');

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` int(11) NOT NULL,
  `website_name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `website_name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Pharmacy M.S', '4fmyyoOxzy.png', '2024-02-26 05:28:14', '2024-02-26 14:51:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines_stock`
--
ALTER TABLE `medicines_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medicines_stock`
--
ALTER TABLE `medicines_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
