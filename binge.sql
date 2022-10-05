-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 05, 2022 at 12:18 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `binge`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand_promoters`
--

CREATE TABLE `brand_promoters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_promoter_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sold_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_serial_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_of_lead` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_promoter_remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_09_174159_create_orders_table', 1),
(5, '2020_11_10_041922_create_source_of_leads_table', 1),
(6, '2020_11_15_172037_create_brand_promoters_table', 1),
(7, '2020_11_30_155348_create_retailers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source_of_lead` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_instruction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_instruction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assign_delivery_partner_status` int(11) NOT NULL DEFAULT '0',
  `order_received_status` int(11) NOT NULL DEFAULT '0',
  `order_complete_status` int(11) NOT NULL DEFAULT '0',
  `order_generated_by` bigint(20) UNSIGNED NOT NULL,
  `order_completed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `delivery_partner` bigint(20) UNSIGNED DEFAULT NULL,
  `order_generated_date_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_completed_date_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_generator_remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_partner_remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `ticket_no`, `customer_phone_no`, `customer_address`, `source_of_lead`, `customer_instruction`, `admin_instruction`, `assign_delivery_partner_status`, `order_received_status`, `order_complete_status`, `order_generated_by`, `order_completed_by`, `delivery_partner`, `order_generated_date_time`, `order_completed_date_time`, `admin_remarks`, `order_generator_remarks`, `delivery_partner_remarks`, `created_at`, `updated_at`) VALUES
(1, 'test customer 2', '1234', '123', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbbbaaaaaaaaaaaa', 'TVC', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbbbbaaaaaaaaaaaa', NULL, 0, 0, 0, 1, NULL, NULL, '2020-11-28 23:20:59', NULL, NULL, NULL, NULL, '2020-11-28 17:20:59', '2020-11-28 17:20:59');

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
-- Table structure for table `retailers`
--

CREATE TABLE `retailers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `retailer_id` bigint(20) UNSIGNED NOT NULL,
  `retailer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `market_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `market_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest_level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_visit_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_device_left` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_device_sold` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `retailer_remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `retailers`
--

INSERT INTO `retailers` (`id`, `retailer_id`, `retailer_name`, `shop_number`, `zone`, `market_name`, `market_address`, `status`, `interest_level`, `last_visit_date`, `total_device_left`, `total_device_sold`, `source`, `retailer_remarks`, `admin_remarks`, `created_at`, `updated_at`) VALUES
(1, 1, '123', '1234', 'Muradpur', 'test', 'test', 'denied', 'high', '2020-11-21', '1', '1', 'euro-bd', 'test', NULL, '2020-11-30 16:26:15', '2020-11-30 16:26:15'),
(2, 1, 't', 't', 'Muradpur', 'test', 'test', 'onprocess', 'high', '2020-11-13', '1', '2', 'euro-bd', 'as', NULL, '2020-11-30 16:27:21', '2020-11-30 16:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `source_of_leads`
--

CREATE TABLE `source_of_leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `source_of_leads`
--

INSERT INTO `source_of_leads` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'TVC', NULL, NULL),
(2, 'Facebook', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `password`, `phone_number`, `user_role`, `created_at`, `updated_at`) VALUES
(1, 'Test Order Generator', 'test_order_generator', '$2y$10$J1CVRIHJVu.z/wZ9lpVCTOzO2Zr5X1m0ATKl.0D18xT7OnOkFy0MC', '1234', 'order-generator', '2020-11-28 17:19:54', '2020-11-28 17:19:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand_promoters`
--
ALTER TABLE `brand_promoters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_promoters_brand_promoter_id_foreign` (`brand_promoter_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_order_generated_by_foreign` (`order_generated_by`),
  ADD KEY `orders_order_completed_by_foreign` (`order_completed_by`),
  ADD KEY `orders_delivery_partner_foreign` (`delivery_partner`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `retailers`
--
ALTER TABLE `retailers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `retailers_retailer_id_foreign` (`retailer_id`);

--
-- Indexes for table `source_of_leads`
--
ALTER TABLE `source_of_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_name_unique` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand_promoters`
--
ALTER TABLE `brand_promoters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `retailers`
--
ALTER TABLE `retailers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `source_of_leads`
--
ALTER TABLE `source_of_leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand_promoters`
--
ALTER TABLE `brand_promoters`
  ADD CONSTRAINT `brand_promoters_brand_promoter_id_foreign` FOREIGN KEY (`brand_promoter_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_delivery_partner_foreign` FOREIGN KEY (`delivery_partner`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_order_completed_by_foreign` FOREIGN KEY (`order_completed_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_order_generated_by_foreign` FOREIGN KEY (`order_generated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `retailers`
--
ALTER TABLE `retailers`
  ADD CONSTRAINT `retailers_retailer_id_foreign` FOREIGN KEY (`retailer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
