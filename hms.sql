-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 08:13 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `bed_no` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('available','unavailable') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`id`, `room_id`, `bed_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'A', 'unavailable', '2023-06-12 04:29:11', '2023-06-30 02:58:15'),
(2, 2, 'A', 'unavailable', '2023-06-15 09:59:41', '2023-07-02 01:02:39'),
(3, 1, 'B', 'unavailable', '2023-06-30 03:38:34', '2023-07-02 01:01:42'),
(4, 2, 'B', 'unavailable', '2023-06-30 03:38:53', '2023-07-02 01:01:05'),
(6, 3, 'A', 'unavailable', '2023-07-02 01:02:51', '2023-07-05 04:12:41'),
(7, 3, 'B', 'available', '2023-07-02 01:03:01', '2023-07-02 01:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `bed_assigns`
--

CREATE TABLE `bed_assigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `bed_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bed_assigns`
--

INSERT INTO `bed_assigns` (`id`, `member_id`, `room_id`, `bed_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, '2023-06-07', '2023-06-13 06:07:42', '2023-06-13 06:07:42'),
(3, 4, 2, 4, '2023-03-01', '2023-06-30 03:39:44', '2023-06-30 03:39:44'),
(4, 5, 1, 3, '2023-03-02', '2023-07-01 04:49:51', '2023-07-01 04:49:51'),
(5, 6, 2, 2, '2023-03-01', '2023-07-02 01:02:24', '2023-07-02 01:02:24'),
(6, 7, 3, 6, '2023-05-01', '2023-07-02 01:11:28', '2023-07-02 01:11:28'),
(7, 5, 3, 6, '2023-07-02', '2023-07-05 04:12:41', '2023-07-05 04:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month_id` bigint(20) UNSIGNED NOT NULL,
  `expense_category_id` bigint(20) UNSIGNED NOT NULL,
  `cost` decimal(20,2) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `month_id`, `expense_category_id`, `cost`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '12000.00', '2023-06-02', '2023-06-21 10:11:13', '2023-06-21 10:11:13'),
(2, 1, 2, '3000.00', '2023-06-04', '2023-06-21 10:11:57', '2023-06-21 10:11:57'),
(3, 2, 3, '30000.00', '2023-06-09', '2023-06-21 10:14:54', '2023-06-21 10:14:54'),
(4, 1, 1, '200.00', '2023-06-06', '2023-06-21 10:22:18', '2023-06-21 10:22:18'),
(5, 2, 1, '15000.00', '2023-05-31', '2023-06-21 10:36:36', '2023-06-21 10:36:36'),
(6, 4, 1, '10000.00', '2023-03-31', '2023-06-22 07:30:53', '2023-06-22 07:30:53'),
(7, 3, 3, '30000.00', '2023-04-03', '2023-06-26 09:13:58', '2023-06-26 09:13:58'),
(8, 5, 3, '30000.00', '2023-07-04', '2023-07-04 01:00:57', '2023-07-04 01:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Food expense', '2023-06-21 07:59:04', '2023-06-21 07:59:04'),
(2, 'Electricity Bill', '2023-06-21 08:01:16', '2023-06-21 08:01:16'),
(3, 'House Rent', '2023-06-21 09:29:24', '2023-06-21 09:29:24'),
(4, 'Maintenance cost', '2023-06-21 09:29:55', '2023-06-21 09:29:55'),
(5, 'Equipment cost', '2023-06-21 09:30:44', '2023-06-21 09:30:44');

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
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` char(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`id`, `item`, `price`, `created_at`, `updated_at`, `photo`) VALUES
(1, 'Pizza', '400.00', '2023-06-13 06:47:51', '2023-06-30 22:39:24', '20230701043924.jpg'),
(2, 'Burger', '600.00', '2023-06-13 12:05:31', '2023-06-13 12:05:31', '20230613180531.jpg'),
(3, 'Chiken', '250.00', '2023-06-13 12:06:11', '2023-06-13 12:06:11', '20230613180611.jpg'),
(4, 'Beaf', '350.00', '2023-06-13 12:06:47', '2023-06-13 12:06:47', '20230613180647.jpg'),
(5, 'Chiken full', '380.00', '2023-06-13 12:12:15', '2023-06-13 12:12:15', '20230613181215.jpg'),
(6, 'Vegetables', '120.00', '2023-06-13 12:15:36', '2023-06-13 12:15:36', '20230613181536.jpg'),
(7, 'Chicken chilli', '350.00', '2023-06-30 22:42:32', '2023-06-30 22:42:32', '20230701044232.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `food_orders`
--

CREATE TABLE `food_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `food_item_id` bigint(20) UNSIGNED NOT NULL,
  `month_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `orderId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_orders`
--

INSERT INTO `food_orders` (`id`, `member_id`, `food_item_id`, `month_id`, `quantity`, `total`, `date`, `created_at`, `updated_at`, `orderId`) VALUES
(1, 3, 1, 1, 1, '900.00', '2023-06-18 00:00:00', '2023-06-18 12:00:07', '2023-06-18 12:00:07', 0),
(2, 3, 3, 1, 2, '900.00', '2023-06-18 00:00:00', '2023-06-18 12:00:07', '2023-06-18 12:00:07', 0),
(3, 3, 1, 2, 1, '900.00', '2023-06-18 00:00:00', '2023-06-18 12:49:08', '2023-06-18 12:49:08', 0),
(4, 3, 5, 2, 1, '900.00', '2023-06-18 00:00:00', '2023-06-18 12:49:08', '2023-06-18 12:49:08', 0),
(5, 3, 6, 2, 1, '900.00', '2023-06-18 00:00:00', '2023-06-18 12:49:08', '2023-06-18 12:49:08', 0),
(6, 3, 2, 1, 2, '1700.00', '2023-06-18 00:00:00', '2023-06-18 12:49:56', '2023-06-18 12:49:56', 0),
(7, 3, 5, 1, 1, '1700.00', '2023-06-18 00:00:00', '2023-06-18 12:49:56', '2023-06-18 12:49:56', 0),
(8, 3, 6, 1, 1, '1700.00', '2023-06-18 00:00:00', '2023-06-18 12:49:56', '2023-06-18 12:49:56', 0),
(9, 3, 3, 1, 1, '630.00', '2023-06-20 00:00:00', '2023-06-19 18:42:50', '2023-06-19 18:42:50', 1),
(10, 3, 5, 1, 1, '630.00', '2023-06-20 00:00:00', '2023-06-19 18:42:50', '2023-06-19 18:42:50', 1),
(11, 4, 1, 1, 1, '1280.00', '2023-06-20 00:00:00', '2023-06-20 05:47:35', '2023-06-20 05:47:35', 2),
(12, 4, 3, 1, 2, '1280.00', '2023-06-20 00:00:00', '2023-06-20 05:47:35', '2023-06-20 05:47:35', 2),
(13, 4, 5, 1, 1, '1280.00', '2023-06-20 00:00:00', '2023-06-20 05:47:35', '2023-06-20 05:47:35', 2),
(14, 3, 6, 1, 3, '1110.00', '2023-06-20 00:00:00', '2023-06-20 05:48:25', '2023-06-20 05:48:25', 3),
(15, 3, 3, 1, 3, '1110.00', '2023-06-20 00:00:00', '2023-06-20 05:48:25', '2023-06-20 05:48:25', 3),
(16, 4, 2, 1, 2, '1550.00', '2023-06-20 00:00:00', '2023-06-20 05:49:16', '2023-06-20 05:49:16', 4),
(17, 4, 4, 1, 1, '1550.00', '2023-06-20 00:00:00', '2023-06-20 05:49:16', '2023-06-20 05:49:16', 4),
(18, 4, 4, 4, 2, '1450.00', '2023-06-26 00:00:00', '2023-06-26 07:36:14', '2023-06-26 07:36:14', 5),
(19, 4, 3, 4, 3, '1450.00', '2023-06-26 00:00:00', '2023-06-26 07:36:14', '2023-06-26 07:36:14', 5),
(20, 3, 3, 3, 3, '1510.00', '2023-06-26 00:00:00', '2023-06-26 07:37:17', '2023-06-26 07:37:17', 6),
(21, 3, 5, 3, 2, '1510.00', '2023-06-26 00:00:00', '2023-06-26 07:37:17', '2023-06-26 07:37:17', 6),
(22, 4, 1, 2, 4, '3490.00', '2023-06-26 00:00:00', '2023-06-26 10:27:33', '2023-06-26 10:27:33', 7),
(23, 4, 3, 2, 3, '3490.00', '2023-06-26 00:00:00', '2023-06-26 10:27:33', '2023-06-26 10:27:33', 7),
(24, 4, 5, 2, 3, '3490.00', '2023-06-26 00:00:00', '2023-06-26 10:27:33', '2023-06-26 10:27:33', 7),
(25, 5, 6, 2, 5, '4550.00', '2023-06-26 00:00:00', '2023-06-26 10:30:04', '2023-06-26 10:30:04', 8),
(26, 5, 1, 2, 3, '4550.00', '2023-06-26 00:00:00', '2023-06-26 10:30:04', '2023-06-26 10:30:04', 8),
(27, 5, 2, 2, 2, '4550.00', '2023-06-26 00:00:00', '2023-06-26 10:30:04', '2023-06-26 10:30:04', 8),
(28, 5, 4, 2, 3, '4550.00', '2023-06-26 00:00:00', '2023-06-26 10:30:04', '2023-06-26 10:30:04', 8),
(29, 5, 3, 2, 2, '4550.00', '2023-06-26 00:00:00', '2023-06-26 10:30:04', '2023-06-26 10:30:04', 8),
(30, 5, 1, 2, 3, '4580.00', '2023-06-26 00:00:00', '2023-06-26 10:32:48', '2023-06-26 10:32:48', 9),
(31, 5, 2, 2, 4, '4580.00', '2023-06-26 00:00:00', '2023-06-26 10:32:48', '2023-06-26 10:32:48', 9),
(32, 5, 3, 2, 2, '4580.00', '2023-06-26 00:00:00', '2023-06-26 10:32:48', '2023-06-26 10:32:48', 9),
(33, 5, 6, 2, 4, '4580.00', '2023-06-26 00:00:00', '2023-06-26 10:32:48', '2023-06-26 10:32:48', 9),
(34, 3, 1, 1, 2, '1150.00', '2023-07-01 00:00:00', '2023-07-01 08:54:54', '2023-07-01 08:54:54', 10),
(35, 3, 4, 1, 1, '1150.00', '2023-07-01 00:00:00', '2023-07-01 08:54:54', '2023-07-01 08:54:54', 10),
(36, 3, 1, 1, 2, '1150.00', '2023-07-01 00:00:00', '2023-07-01 08:57:51', '2023-07-01 08:57:51', 11),
(37, 3, 4, 1, 1, '1150.00', '2023-07-01 00:00:00', '2023-07-01 08:57:51', '2023-07-01 08:57:51', 11),
(38, 6, 2, 1, 2, '1200.00', '2023-07-01 00:00:00', '2023-07-01 09:38:46', '2023-07-01 09:38:46', 12),
(39, 6, 4, 1, 2, '700.00', '2023-07-01 00:00:00', '2023-07-01 09:38:46', '2023-07-01 09:38:46', 12),
(40, 3, 1, 1, 3, '1200.00', '2023-07-02 00:00:00', '2023-07-01 22:02:00', '2023-07-01 22:02:00', 13),
(41, 3, 2, 1, 2, '1200.00', '2023-07-02 00:00:00', '2023-07-01 22:02:00', '2023-07-01 22:02:00', 13),
(42, 4, 1, 1, 2, '800.00', '2023-07-02 00:00:00', '2023-07-02 01:05:27', '2023-07-02 01:05:27', 14),
(43, 4, 4, 1, 2, '700.00', '2023-07-02 00:00:00', '2023-07-02 01:05:27', '2023-07-02 01:05:27', 14),
(44, 4, 6, 1, 2, '240.00', '2023-07-02 00:00:00', '2023-07-02 01:05:27', '2023-07-02 01:05:27', 14),
(45, 4, 2, 1, 2, '1200.00', '2023-07-02 00:00:00', '2023-07-02 01:05:27', '2023-07-02 01:05:27', 14),
(46, 5, 1, 1, 3, '1200.00', '2023-07-02 00:00:00', '2023-07-02 01:09:42', '2023-07-02 01:09:42', 15),
(47, 5, 7, 1, 3, '1050.00', '2023-07-02 00:00:00', '2023-07-02 01:09:42', '2023-07-02 01:09:42', 15),
(48, 7, 2, 1, 3, '1800.00', '2023-07-02 00:00:00', '2023-07-02 01:12:36', '2023-07-02 01:12:36', 16),
(49, 7, 7, 1, 1, '350.00', '2023-07-02 00:00:00', '2023-07-02 01:12:36', '2023-07-02 01:12:36', 16),
(50, 5, 7, 5, 2, '700.00', '2023-07-04 00:00:00', '2023-07-04 00:59:57', '2023-07-04 00:59:57', 17);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admit_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `photo`, `phone`, `status`, `created_at`, `updated_at`, `admit_date`) VALUES
(3, 'Sifat Khan', 'sifat@gmail.com', '20230704064155.jpg', 167778, 'active', '2023-06-11 09:04:12', '2023-07-04 00:41:55', '2023-06-01'),
(4, 'Apu Khan', 'apu@gmail.com', '20230703065745.jpg', 1724297262, 'active', '2023-06-20 05:45:06', '2023-07-03 00:57:45', '2023-05-01'),
(5, 'Tamim', 'tami@gmail.com', '20230620114556.jpg', 185544235, 'active', '2023-06-20 05:45:56', '2023-06-20 05:45:56', '2023-06-04'),
(6, 'Tanu', 'tanu@gmail.com', '20230620114648.jpg', 14225544, 'active', '2023-06-20 05:46:48', '2023-06-20 05:46:48', '2023-06-06'),
(7, 'Mushfiq', 'mushfiq@gmai.com', '20230630063433.jpg', 1245663356, 'active', '2023-06-30 00:34:33', '2023-06-30 00:34:33', '2023-06-30');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_08_003603_create_members_table', 1),
(6, '2023_06_08_010040_create_rooms_table', 1),
(7, '2023_06_08_022912_create_beds_table', 2),
(8, '2023_06_08_024505_create_bed_assigns_table', 3),
(9, '2023_06_08_025958_create_services_table', 4),
(10, '2023_06_08_030022_create_months_table', 4),
(11, '2023_06_08_030107_create_visitors_table', 4),
(12, '2023_06_08_030120_create_notices_table', 4),
(13, '2023_06_08_030155_create_expenses_table', 4),
(14, '2023_06_08_030228_create_food_items_table', 4),
(15, '2023_06_08_033014_create_service_sells_table', 5),
(16, '2023_06_08_033059_create_payments_table', 6),
(17, '2023_06_08_043256_create_food_orders_table', 7),
(18, '2023_06_09_032004_add_column_to_table', 8),
(19, '2023_06_09_032013_add_column_to_table', 8),
(20, '2023_06_09_032141_add_column_to_table', 8),
(21, '2023_06_09_033539_add_admit_date_to_members_table', 9),
(22, '2023_06_09_035715_add_admit_date_to_members_table', 10),
(23, '2023_06_12_161623_add_photo_to_food_items_table', 11),
(24, '2023_06_19_165401_add_order_id_to_food_orders_table', 12),
(25, '2023_06_21_112156_create_expense_categories', 13),
(26, '2023_06_21_122437_create_expenses', 14);

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month_name` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_month` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `month_name`, `current_month`, `created_at`, `updated_at`) VALUES
(1, 'June', 'yes', '2023-06-16 03:06:43', '2023-06-16 03:06:43'),
(2, 'May', 'no', '2023-06-16 03:32:36', '2023-06-16 03:32:36'),
(3, 'April', 'no', '2023-06-22 07:29:25', '2023-06-22 07:29:25'),
(4, 'March', 'no', '2023-06-22 07:29:45', '2023-06-22 07:29:45'),
(5, 'Julay', 'yes', '2023-07-04 00:44:11', '2023-07-04 00:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `notice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `month_id` bigint(20) UNSIGNED NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `member_id`, `month_id`, `paid_amount`, `date`, `created_at`, `updated_at`) VALUES
(1, 4, 3, '3500.00', '2023-04-01', NULL, NULL),
(2, 4, 2, '3500.00', '2023-05-03', NULL, NULL),
(3, 3, 3, '3500.00', '2023-04-03', NULL, NULL),
(5, 4, 1, '3500.00', '2023-06-02', NULL, NULL),
(6, 3, 1, '3500.00', '2023-06-03', NULL, NULL),
(7, 3, 2, '3500.00', '2023-05-03', NULL, NULL),
(8, 5, 4, '3500.00', '2023-03-03', NULL, NULL),
(9, 5, 2, '3500.00', '2023-05-03', NULL, NULL),
(10, 5, 1, '3500.00', '2023-06-02', NULL, NULL),
(11, 5, 3, '3500.00', '2023-04-02', NULL, NULL),
(12, 3, 4, '3500.00', '2023-03-04', NULL, NULL),
(13, 4, 4, '3500.00', '2023-03-02', NULL, NULL),
(14, 6, 1, '3500.00', '2023-06-02', NULL, NULL),
(15, 6, 2, '3500.00', '2023-05-02', NULL, NULL),
(16, 6, 3, '3500.00', '2023-04-02', NULL, NULL),
(17, 6, 4, '3500.00', '2023-03-02', NULL, NULL),
(18, 5, 5, '3500.00', '2023-07-03', NULL, NULL);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_no` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_charge` decimal(20,2) NOT NULL,
  `category` enum('standard','deluxe') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_no`, `room_charge`, `category`, `created_at`, `updated_at`) VALUES
(1, '101', '900.00', 'standard', '2023-06-11 09:25:07', '2023-06-11 10:28:54'),
(2, '102', '1500.00', 'deluxe', '2023-06-11 10:18:57', '2023-06-11 10:18:57'),
(3, '103', '1500.00', 'deluxe', '2023-06-30 21:08:08', '2023-06-30 21:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Laundry', '500.00', '2023-07-03 21:52:51', '2023-07-03 21:52:51'),
(2, 'Gymnesiam', '2000.00', '2023-07-03 21:53:16', '2023-07-03 21:53:16'),
(3, 'Library', '1500.00', '2023-07-03 21:54:05', '2023-07-03 21:54:05'),
(4, 'Internet', '800.00', '2023-07-03 21:56:21', '2023-07-03 21:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `service_sells`
--

CREATE TABLE `service_sells` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderId` int(11) NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `month_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_sells`
--

INSERT INTO `service_sells` (`id`, `orderId`, `member_id`, `service_id`, `month_id`, `date`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 2, 3, '2023-07-04', 1, '2000.00', '2023-07-03 23:44:53', '2023-07-03 23:44:53'),
(2, 2, 4, 2, 3, '2023-07-04', 1, '2000.00', '2023-07-03 23:46:21', '2023-07-03 23:46:21'),
(3, 3, 4, 1, 3, '2023-07-04', 2, '1000.00', '2023-07-03 23:50:31', '2023-07-03 23:50:31'),
(4, 3, 4, 3, 3, '2023-07-04', 1, '1500.00', '2023-07-03 23:50:31', '2023-07-03 23:50:31'),
(5, 4, 4, 1, 1, '2023-07-04', 1, '500.00', '2023-07-04 00:24:34', '2023-07-04 00:24:34'),
(6, 5, 4, 4, 2, '2023-07-04', 1, '800.00', '2023-07-04 00:24:52', '2023-07-04 00:24:52'),
(7, 6, 4, 3, 4, '2023-07-04', 1, '1500.00', '2023-07-04 00:25:15', '2023-07-04 00:25:15'),
(8, 7, 3, 1, 1, '2023-07-04', 1, '500.00', '2023-07-04 00:43:12', '2023-07-04 00:43:12'),
(9, 7, 3, 3, 1, '2023-07-04', 1, '1500.00', '2023-07-04 00:43:12', '2023-07-04 00:43:12'),
(10, 7, 3, 4, 1, '2023-07-04', 1, '800.00', '2023-07-04 00:43:12', '2023-07-04 00:43:12'),
(11, 8, 5, 1, 5, '2023-07-04', 2, '1000.00', '2023-07-04 00:56:55', '2023-07-04 00:56:55');

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
  `role` enum('super_admin','admin','accountant') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sifat Khan', 'sifat@gmail.com', NULL, '$2y$10$3zfCYJRMJhjvQfYn9jdDsO389YtjB3vhJmd/YTgtabaHc6.YgqFTu', 'super_admin', '0aAjVrnqHKtRsid0kLHMSdbbZSvuifJuQglfIA7bVZtAzVqmrGE4ZeJrHQLq', '2023-06-08 05:49:13', '2023-06-08 05:49:13'),
(2, 'bahadur', 'baha@gmail.com', NULL, '123456789', 'admin', NULL, NULL, NULL),
(3, 'Urmi', 'urmi@gmail.com', NULL, '123456789', 'accountant', NULL, NULL, NULL),
(4, 'Arif', 'arif@gmail.com', NULL, '123456789', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_meet` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `status` enum('in','out') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beds_room_id_foreign` (`room_id`);

--
-- Indexes for table `bed_assigns`
--
ALTER TABLE `bed_assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bed_assigns_member_id_foreign` (`member_id`),
  ADD KEY `bed_assigns_room_id_foreign` (`room_id`),
  ADD KEY `bed_assigns_bed_id_foreign` (`bed_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_month_id_foreign` (`month_id`),
  ADD KEY `expenses_expense_category_id_foreign` (`expense_category_id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_orders`
--
ALTER TABLE `food_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_orders_member_id_foreign` (`member_id`),
  ADD KEY `food_orders_food_item_id_foreign` (`food_item_id`),
  ADD KEY `food_orders_month_id_foreign` (`month_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_member_id_foreign` (`member_id`),
  ADD KEY `payments_month_id_foreign` (`month_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_sells`
--
ALTER TABLE `service_sells`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_sells_member_id_foreign` (`member_id`),
  ADD KEY `service_sells_service_id_foreign` (`service_id`),
  ADD KEY `service_sells_month_id_foreign` (`month_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beds`
--
ALTER TABLE `beds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bed_assigns`
--
ALTER TABLE `bed_assigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_items`
--
ALTER TABLE `food_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `food_orders`
--
ALTER TABLE `food_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service_sells`
--
ALTER TABLE `service_sells`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beds`
--
ALTER TABLE `beds`
  ADD CONSTRAINT `beds_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `bed_assigns`
--
ALTER TABLE `bed_assigns`
  ADD CONSTRAINT `bed_assigns_bed_id_foreign` FOREIGN KEY (`bed_id`) REFERENCES `beds` (`id`),
  ADD CONSTRAINT `bed_assigns_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `bed_assigns_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_expense_category_id_foreign` FOREIGN KEY (`expense_category_id`) REFERENCES `expense_categories` (`id`),
  ADD CONSTRAINT `expenses_month_id_foreign` FOREIGN KEY (`month_id`) REFERENCES `months` (`id`);

--
-- Constraints for table `food_orders`
--
ALTER TABLE `food_orders`
  ADD CONSTRAINT `food_orders_food_item_id_foreign` FOREIGN KEY (`food_item_id`) REFERENCES `food_items` (`id`),
  ADD CONSTRAINT `food_orders_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `food_orders_month_id_foreign` FOREIGN KEY (`month_id`) REFERENCES `months` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `payments_month_id_foreign` FOREIGN KEY (`month_id`) REFERENCES `months` (`id`);

--
-- Constraints for table `service_sells`
--
ALTER TABLE `service_sells`
  ADD CONSTRAINT `service_sells_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `service_sells_month_id_foreign` FOREIGN KEY (`month_id`) REFERENCES `months` (`id`),
  ADD CONSTRAINT `service_sells_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
