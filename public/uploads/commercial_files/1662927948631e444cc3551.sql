-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 30, 2022 at 05:57 AM
-- Server version: 5.7.38-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_aljoud`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  `show` int(11) NOT NULL DEFAULT '1',
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `name_ar`, `name_en`, `file`, `sort`, `show`, `lesson_id`, `created_at`, `updated_at`) VALUES
(1, 'الدرس الاول', 'lesson one', '16368907706190f892a2c3e.pdf', 1, 1, 1, '2021-11-14 21:52:50', '2021-11-14 21:52:50'),
(2, 'الدرس 2', 'lesson 2', '16368907776190f899953ce.pdf', 1, 1, 1, '2021-11-14 21:52:57', '2021-11-14 21:52:57'),
(3, 'الدرس 3', 'lesson 3', '16368907866190f8a24e716.pdf', 1, 1, 1, '2021-11-14 21:53:06', '2021-11-14 21:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `course_id`, `created_at`, `updated_at`) VALUES
(64, 15, 13, '2022-08-21 09:08:00', '2022-08-21 09:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart_helps`
--

CREATE TABLE `cart_helps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `months_count` int(11) NOT NULL DEFAULT '0',
  `first_price` double NOT NULL,
  `total_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_helps`
--

INSERT INTO `cart_helps` (`id`, `invoice_id`, `course_id`, `months_count`, `first_price`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 16, 8, 2, 100, 200, '2022-07-27 08:34:47', '2022-07-27 08:34:47'),
(2, 17, 5, 3, 1166.67, 3500, '2022-08-03 09:48:10', '2022-08-03 09:48:10'),
(3, 18, 5, 3, 1166.67, 3500, '2022-08-03 09:51:23', '2022-08-03 09:51:23'),
(4, 19, 5, 3, 1166.67, 3500, '2022-08-03 09:52:29', '2022-08-03 09:52:29'),
(5, 20, 5, 3, 1166.67, 3500, '2022-08-03 09:53:05', '2022-08-03 09:53:05'),
(6, 21, 5, 3, 1166.67, 3500, '2022-08-03 09:54:29', '2022-08-03 09:54:29'),
(7, 22, 5, 3, 1166.67, 3500, '2022-08-03 09:54:50', '2022-08-03 09:54:50'),
(8, 23, 5, 3, 1166.67, 3500, '2022-08-03 09:56:22', '2022-08-03 09:56:22'),
(9, 24, 5, 3, 1166.67, 3500, '2022-08-03 09:56:57', '2022-08-03 09:56:57'),
(10, 25, 5, 3, 1166.67, 3500, '2022-08-03 09:57:11', '2022-08-03 09:57:11'),
(11, 26, 5, 3, 1166.67, 3500, '2022-08-03 09:57:40', '2022-08-03 09:57:40'),
(12, 27, 5, 3, 1166.67, 3500, '2022-08-03 09:57:50', '2022-08-03 09:57:50'),
(13, 28, 5, 3, 1166.67, 3500, '2022-08-03 09:58:17', '2022-08-03 09:58:17'),
(14, 29, 5, 3, 1166.67, 3500, '2022-08-03 09:58:32', '2022-08-03 09:58:32'),
(15, 30, 5, 3, 1166.67, 3500, '2022-08-03 09:59:11', '2022-08-03 09:59:11'),
(16, 31, 5, 3, 1166.67, 3500, '2022-08-03 10:02:39', '2022-08-03 10:02:39'),
(17, 38, 4, 3, 1633.33, 4900, '2022-08-15 06:07:09', '2022-08-15 06:07:09'),
(18, 39, 4, 3, 1633.33, 4900, '2022-08-15 06:12:18', '2022-08-15 06:12:18'),
(19, 42, 13, 5, 1800, 9000, '2022-08-19 08:16:51', '2022-08-19 08:16:51'),
(20, 43, 13, 5, 1800, 9000, '2022-08-19 08:43:17', '2022-08-19 08:43:17'),
(21, 44, 7, 2, 875, 1750, '2022-08-19 09:40:50', '2022-08-19 09:40:50'),
(22, 46, 13, 5, 1800, 9000, '2022-08-20 15:07:38', '2022-08-20 15:07:38'),
(23, 47, 13, 5, 1800, 9000, '2022-08-20 15:08:23', '2022-08-20 15:08:23'),
(24, 48, 13, 5, 1800, 9000, '2022-08-20 15:14:50', '2022-08-20 15:14:50'),
(25, 49, 13, 5, 1800, 9000, '2022-08-21 08:42:38', '2022-08-21 08:42:38'),
(26, 50, 13, 5, 1800, 9000, '2022-08-21 08:45:34', '2022-08-21 08:45:34'),
(27, 51, 13, 5, 1800, 9000, '2022-08-21 08:55:34', '2022-08-21 08:55:34'),
(28, 52, 13, 5, 1800, 9000, '2022-08-21 09:39:27', '2022-08-21 09:39:27'),
(29, 53, 13, 5, 1800, 9000, '2022-08-21 14:27:09', '2022-08-21 14:27:09'),
(30, 54, 13, 5, 1800, 9000, '2022-08-21 15:25:08', '2022-08-21 15:25:08'),
(31, 55, 13, 5, 1800, 9000, '2022-08-21 15:37:10', '2022-08-21 15:37:10'),
(32, 56, 13, 5, 1800, 9000, '2022-08-22 17:48:56', '2022-08-22 17:48:56'),
(33, 56, 14, 5, 1600, 8000, '2022-08-22 17:48:56', '2022-08-22 17:48:56'),
(34, 57, 13, 5, 1800, 9000, '2022-08-22 17:56:33', '2022-08-22 17:56:33'),
(35, 57, 14, 5, 1600, 8000, '2022-08-22 17:56:33', '2022-08-22 17:56:33'),
(36, 59, 13, 5, 540, 2700, '2022-08-25 22:47:03', '2022-08-25 22:47:03'),
(37, 59, 14, 5, 480, 2400, '2022-08-25 22:47:03', '2022-08-25 22:47:03'),
(38, 60, 13, 5, 540, 2700, '2022-08-27 00:45:21', '2022-08-27 00:45:21'),
(39, 60, 14, 5, 480, 2400, '2022-08-27 00:45:21', '2022-08-27 00:45:21'),
(40, 61, 13, 5, 540, 2700, '2022-08-27 00:46:30', '2022-08-27 00:46:30'),
(41, 61, 14, 5, 480, 2400, '2022-08-27 00:46:30', '2022-08-27 00:46:30'),
(42, 62, 13, 5, 540, 2700, '2022-08-27 09:47:11', '2022-08-27 09:47:11'),
(43, 62, 14, 5, 480, 2400, '2022-08-27 09:47:11', '2022-08-27 09:47:11'),
(44, 64, 15, 2, 191.25, 382.5, '2022-08-29 03:06:16', '2022-08-29 03:06:16'),
(45, 64, 16, 2, 75, 150, '2022-08-29 03:06:16', '2022-08-29 03:06:16'),
(46, 65, 15, 2, 255, 510, '2022-08-29 20:21:19', '2022-08-29 20:21:19'),
(47, 67, 18, 2, 5, 10, '2022-08-29 20:39:26', '2022-08-29 20:39:26'),
(48, 68, 16, 2, 75, 150, '2022-08-30 02:32:36', '2022-08-30 02:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  `show` int(11) NOT NULL DEFAULT '1',
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `name_ar`, `name_en`, `image`, `sort`, `show`, `university_id`, `created_at`, `updated_at`) VALUES
(1, 'كلية صيدله', 'pharmacy', '16368899956190f58b69f0f.jpeg', 1, 1, 6, '2021-11-14 21:39:55', '2021-11-14 21:39:55'),
(2, 'كلية اسنان', 'dentists', '16368900246190f5a808672.jpeg', 1, 1, 6, '2021-11-14 21:40:24', '2021-11-14 21:40:24'),
(3, 'كلية بيطري', 'dentists', NULL, 1, 1, 6, '2022-07-04 20:11:59', '2022-07-04 20:11:59'),
(4, 'New :)', 'New :)', '166082037362fe1b95003b2.jpg', 1, 1, 7, '2022-08-18 20:59:33', '2022-08-18 20:59:33'),
(5, 'تحضيري', 'Preparatory', '1661705582630b9d6e028b8.jpg', 1, 1, 8, '2022-08-29 02:53:02', '2022-08-29 02:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `show_remove_account` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `show_remove_account`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-08-09 15:22:50', '2022-08-09 15:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `type` enum('multi','single') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'multi',
  `active` int(11) NOT NULL DEFAULT '1',
  `usage_count` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `amount`, `type`, `active`, `usage_count`, `created_at`, `updated_at`) VALUES
(2, 'alioud70', 70, 'multi', 1, 8, '2022-07-27 06:19:14', '2022-08-27 09:47:11'),
(3, 'alioud77', 10, 'single', 1, 2, '2022-08-09 13:20:28', '2022-08-25 22:50:32'),
(4, 'alioud88', 20, 'multi', 1, 0, '2022-08-09 13:21:29', '2022-08-15 04:12:28'),
(6, 'alioud0', 22, 'single', 1, 0, '2022-08-09 13:29:40', '2022-08-15 04:12:56'),
(7, 'test50', 50, 'single', 1, 0, '2022-08-29 02:51:10', '2022-08-29 02:51:10'),
(8, 'test255', 25, 'multi', 1, 3, '2022-08-29 02:51:26', '2022-08-30 02:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_usages`
--

CREATE TABLE `coupon_usages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon_usages`
--

INSERT INTO `coupon_usages` (`id`, `coupon_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 2, 2, '2022-08-15 05:48:55', '2022-08-15 05:48:55'),
(3, 3, 19, '2022-08-25 21:31:25', '2022-08-25 21:31:25'),
(4, 2, 19, '2022-08-25 22:47:02', '2022-08-25 22:47:02'),
(5, 2, 19, '2022-08-25 22:47:02', '2022-08-25 22:47:02'),
(6, 3, 20, '2022-08-25 22:50:32', '2022-08-25 22:50:32'),
(7, 2, 19, '2022-08-27 00:45:21', '2022-08-27 00:45:21'),
(8, 2, 19, '2022-08-27 00:45:21', '2022-08-27 00:45:21'),
(9, 2, 19, '2022-08-27 00:46:30', '2022-08-27 00:46:30'),
(10, 2, 19, '2022-08-27 00:46:30', '2022-08-27 00:46:30'),
(11, 2, 20, '2022-08-27 09:47:11', '2022-08-27 09:47:11'),
(12, 2, 20, '2022-08-27 09:47:11', '2022-08-27 09:47:11'),
(13, 8, 22, '2022-08-29 03:06:15', '2022-08-29 03:06:15'),
(14, 8, 22, '2022-08-29 03:06:15', '2022-08-29 03:06:15'),
(15, 8, 16, '2022-08-30 02:32:36', '2022-08-30 02:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  `show` int(11) NOT NULL DEFAULT '1',
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `instructor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `currency_id` bigint(20) UNSIGNED NOT NULL,
  `desc_ar` longtext COLLATE utf8mb4_unicode_ci,
  `desc_en` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_price` double DEFAULT NULL,
  `is_installment` int(11) NOT NULL DEFAULT '0',
  `semester_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name_ar`, `name_en`, `price`, `discount`, `image`, `sort`, `show`, `level_id`, `instructor_id`, `currency_id`, `desc_ar`, `desc_en`, `created_at`, `updated_at`, `first_price`, `is_installment`, `semester_id`) VALUES
(1, 'كيمياء', 'chemist', 10.00, 50.00, '16368901876190f64b5aa59.jpeg', 1, 1, 1, NULL, 2, 'desc desc  desc desc desc', 'شرح شرح شرح شرح شرح', '2021-11-14 21:43:07', '2021-11-14 21:43:07', NULL, 0, NULL),
(2, 'فيزياء', 'physics', 5.00, NULL, '16368902286190f674d460c.jpeg', 1, 1, 1, NULL, 1, 'desc desc  desc desc desc', 'شرح شرح شرح شرح شرح', '2021-11-14 21:43:48', '2021-11-14 21:43:48', NULL, 0, NULL),
(3, 'احياء', 'Ahiaa', 1000.00, NULL, NULL, 1, 1, 1, NULL, 1, 'desc desc  desc desc desc', 'شرح شرح شرح شرح شرح', '2021-12-08 21:03:31', '2021-12-08 21:03:31', 200, 0, NULL),
(4, 'فرنساوي', 'Ahiaa', 5000.00, 2.00, NULL, 1, 1, 1, NULL, 1, 'desc desc  desc desc desc', 'شرح شرح شرح شرح شرح', '2022-07-04 20:16:07', '2022-07-04 20:16:07', NULL, 1, 1),
(5, 'رياضيات', 'math', 3500.00, 50.00, NULL, 1, 1, 1, NULL, 1, 'desc desc  desc desc desc', 'شرح شرح شرح شرح شرح', '2022-07-22 00:22:24', '2022-07-22 00:22:24', 500, 1, 1),
(6, 'ججولوجيا', 'programming', 200.00, NULL, 'C:\\xampp\\tmp\\php389E.tmp', 1, 1, 1, NULL, 1, 'desc', 'شرح', '2022-07-25 05:23:00', '2022-07-25 05:26:27', NULL, 0, 1),
(7, 'جيلوجيا', 'jolojia', 3500.00, 50.00, '165872329162de1bdb6a3ce.jpg', 1, 1, 1, NULL, 1, 'desc desc  desc desc desc', 'شرح شرح شرح شرح شرح', '2022-07-25 05:28:11', '2022-07-25 05:28:11', NULL, 1, 3),
(8, 'ججولوجيا8', 'programming', 200.00, NULL, '165872345062de1c7a182ba.jpg', 1, 1, 1, NULL, 1, 'desc', 'شرح', '2022-07-25 05:29:45', '2022-07-25 05:30:50', NULL, 1, 1),
(9, 'wet', 'we’re', 23.00, 0.00, '166010102462f321a0422f4.jpg', 1, 1, 1, 1, 1, 'Wqerwqe', 'We’re', '2022-08-10 13:10:24', '2022-08-10 13:10:24', NULL, 1, 5),
(10, '111', '111', 111.00, 2.00, '166010117262f32234ad8ee.jpg', 1, 1, 1, 1, 1, '111', '111', '2022-08-10 13:12:52', '2022-08-10 13:12:52', NULL, 1, 5),
(11, '2222', '2222', 2222.00, 2.00, '166010142962f323353c4e2.jpg', 1, 1, 2, 1, 1, '2222', '2222', '2022-08-10 13:17:09', '2022-08-10 13:17:09', NULL, 1, 5),
(12, 'add add', 'fsdfsdf', 22222.00, 2.00, '166010171262f32450a4f49.jpg', 1, 1, 2, 1, 1, 'Werner', 'Werner', '2022-08-10 13:21:52', '2022-08-10 13:21:52', NULL, 1, 5),
(13, 'New :)', 'New :)', 10000.00, 10.00, '166082921562fe3e1f5e5e1.jpg', 1, 1, 3, 1, 1, 'New :)', 'New :)', '2022-08-18 23:26:55', '2022-08-18 23:26:55', NULL, 1, 6),
(14, 'OLD :)', 'OLD :)', 8000.00, 0.00, '16611544306303347eef514.jpg', 1, 1, 3, 1, 1, 'OLD :)', 'OLD :)', '2022-08-22 17:47:11', '2022-08-22 17:47:11', NULL, 1, 6),
(15, 'كيمياء', 'chemistry', 600.00, 15.00, '1661705709630b9ded1eaf6.jpg', 1, 1, 4, 1, 1, '….', '….', '2022-08-29 02:55:09', '2022-08-29 02:55:09', NULL, 1, 7),
(16, 'انجليزي', 'english', 400.00, 50.00, '1661705792630b9e405bbcc.jpg', 1, 1, 4, 1, 1, '…..', '…..', '2022-08-29 02:56:32', '2022-08-29 02:56:32', NULL, 1, 7),
(17, 'احياء', 'biology', 300.00, 0.00, '1661705926630b9ec696b61.jpg', 1, 1, 4, 1, 1, '……', '……', '2022-08-29 02:58:46', '2022-08-29 02:58:46', NULL, 0, 7),
(18, 'مادة قسط', '….', 10.00, 0.00, '1661769540630c974469a63.jpg', 1, 1, 2, 1, 1, '….', '….', '2022-08-29 20:39:00', '2022-08-29 20:39:00', NULL, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `course_contents`
--

CREATE TABLE `course_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_contents`
--

INSERT INTO `course_contents` (`id`, `name_ar`, `name_en`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'محتوى الكورس 1', 'course content 1', 1, '2021-11-14 21:48:30', '2021-11-14 21:48:30'),
(2, 'محتوى الكورس 2', 'course content 2', 1, '2021-11-14 21:48:41', '2021-11-14 21:48:41'),
(3, 'محتوى الكورس 3', 'course content 3', 1, '2021-11-14 21:48:50', '2021-11-14 21:48:50'),
(4, 'محتوى الكورس 4', 'course content 4', 1, '2021-11-14 21:48:57', '2021-11-14 21:48:57');

-- --------------------------------------------------------

--
-- Table structure for table `course_installments`
--

CREATE TABLE `course_installments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `notify_date` date NOT NULL,
  `collected_date` date NOT NULL,
  `is_notified` int(11) NOT NULL,
  `status` enum('paid','unpaid','late') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amount` double(8,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_installments`
--

INSERT INTO `course_installments` (`id`, `course_id`, `user_id`, `notify_date`, `collected_date`, `is_notified`, `status`, `created_at`, `updated_at`, `amount`) VALUES
(9, 4, 2, '2022-08-01', '2022-08-03', 1, 'paid', '2022-08-03 10:02:39', '2022-08-15 14:11:50', 1166.67),
(10, 4, 2, '2022-09-01', '2022-09-03', 0, 'unpaid', '2022-08-03 10:02:39', '2022-08-18 21:37:57', 1166.67),
(11, 4, 2, '2022-10-01', '2022-10-03', 0, 'unpaid', '2022-08-03 10:02:39', '2022-08-18 21:37:57', 1166.67),
(40, 4, 2, '2022-08-12', '2022-08-14', 1, 'paid', '2022-08-20 15:48:04', '2022-08-20 15:48:04', 1633.33),
(41, 4, 2, '2022-09-12', '2022-09-14', 0, 'unpaid', '2022-08-20 15:48:04', '2022-08-20 15:48:04', 1633.33),
(42, 4, 2, '2022-10-12', '2022-10-14', 0, 'unpaid', '2022-08-20 15:48:04', '2022-08-20 15:48:04', 1633.33),
(48, 13, 13, '2022-08-19', '2022-08-21', 1, 'paid', '2022-08-21 09:43:02', '2022-08-21 09:43:02', 1800.00),
(49, 13, 13, '2022-09-19', '2022-09-21', 0, 'unpaid', '2022-08-21 09:43:02', '2022-08-21 09:43:02', 1800.00),
(50, 13, 13, '2022-10-19', '2022-10-21', 0, 'unpaid', '2022-08-21 09:43:02', '2022-08-21 09:43:02', 1800.00),
(51, 13, 13, '2022-11-19', '2022-11-21', 0, 'unpaid', '2022-08-21 09:43:02', '2022-08-21 09:43:02', 1800.00),
(52, 13, 13, '2022-12-19', '2022-12-21', 0, 'unpaid', '2022-08-21 09:43:02', '2022-08-21 09:43:02', 1800.00),
(53, 13, 17, '2022-08-20', '2022-08-22', 1, 'paid', '2022-08-22 17:49:39', '2022-08-22 17:49:39', 1800.00),
(54, 13, 17, '2022-09-20', '2022-09-22', 0, 'unpaid', '2022-08-22 17:49:39', '2022-08-22 17:49:39', 1800.00),
(55, 13, 17, '2022-10-20', '2022-10-22', 0, 'unpaid', '2022-08-22 17:49:39', '2022-08-22 17:49:39', 1800.00),
(56, 13, 17, '2022-11-20', '2022-11-22', 0, 'unpaid', '2022-08-22 17:49:39', '2022-08-22 17:49:39', 1800.00),
(57, 13, 17, '2022-12-20', '2022-12-22', 0, 'unpaid', '2022-08-22 17:49:39', '2022-08-22 17:49:39', 1800.00),
(58, 14, 17, '2022-08-20', '2022-08-22', 1, 'paid', '2022-08-22 17:49:39', '2022-08-22 17:49:39', 1600.00),
(59, 14, 17, '2022-09-20', '2022-09-22', 0, 'unpaid', '2022-08-22 17:49:39', '2022-08-22 17:49:39', 1600.00),
(60, 14, 17, '2022-10-20', '2022-10-22', 0, 'unpaid', '2022-08-22 17:49:39', '2022-08-22 17:49:39', 1600.00),
(61, 14, 17, '2022-11-20', '2022-11-22', 0, 'unpaid', '2022-08-22 17:49:39', '2022-08-22 17:49:39', 1600.00),
(62, 14, 17, '2022-12-20', '2022-12-22', 0, 'unpaid', '2022-08-22 17:49:39', '2022-08-22 17:49:39', 1600.00),
(63, 13, 18, '2022-08-20', '2022-08-22', 1, 'paid', '2022-08-22 17:57:26', '2022-08-22 17:57:26', 1800.00),
(64, 13, 18, '2022-09-20', '2022-09-22', 0, 'unpaid', '2022-08-22 17:57:26', '2022-08-22 17:57:26', 1800.00),
(65, 13, 18, '2022-10-20', '2022-10-22', 0, 'unpaid', '2022-08-22 17:57:26', '2022-08-22 17:57:26', 1800.00),
(66, 13, 18, '2022-11-20', '2022-11-22', 0, 'unpaid', '2022-08-22 17:57:26', '2022-08-22 17:57:26', 1800.00),
(67, 13, 18, '2022-12-20', '2022-12-22', 0, 'unpaid', '2022-08-22 17:57:26', '2022-08-22 17:57:26', 1800.00),
(68, 14, 18, '2022-08-20', '2022-08-22', 1, 'paid', '2022-08-22 17:57:26', '2022-08-22 17:57:26', 1600.00),
(69, 14, 18, '2022-09-20', '2022-09-22', 0, 'unpaid', '2022-08-22 17:57:26', '2022-08-22 17:57:26', 1600.00),
(70, 14, 18, '2022-10-20', '2022-10-22', 0, 'unpaid', '2022-08-22 17:57:26', '2022-08-22 17:57:26', 1600.00),
(71, 14, 18, '2022-11-20', '2022-11-22', 0, 'unpaid', '2022-08-22 17:57:26', '2022-08-22 17:57:26', 1600.00),
(72, 14, 18, '2022-12-20', '2022-12-22', 0, 'unpaid', '2022-08-22 17:57:26', '2022-08-22 17:57:26', 1600.00),
(73, 13, 19, '2022-08-24', '2022-08-26', 1, 'paid', '2022-08-27 00:48:11', '2022-08-27 00:48:11', 540.00),
(74, 13, 19, '2022-09-24', '2022-09-26', 0, 'unpaid', '2022-08-27 00:48:11', '2022-08-27 00:48:11', 540.00),
(75, 13, 19, '2022-10-24', '2022-10-26', 0, 'unpaid', '2022-08-27 00:48:11', '2022-08-27 00:48:11', 540.00),
(76, 13, 19, '2022-11-24', '2022-11-26', 0, 'unpaid', '2022-08-27 00:48:11', '2022-08-27 00:48:11', 540.00),
(77, 13, 19, '2022-12-24', '2022-12-26', 0, 'unpaid', '2022-08-27 00:48:11', '2022-08-27 00:48:11', 540.00),
(78, 14, 19, '2022-08-24', '2022-08-26', 1, 'paid', '2022-08-27 00:48:12', '2022-08-27 00:48:12', 480.00),
(79, 14, 19, '2022-09-24', '2022-09-26', 0, 'unpaid', '2022-08-27 00:48:12', '2022-08-27 00:48:12', 480.00),
(80, 14, 19, '2022-10-24', '2022-10-26', 0, 'unpaid', '2022-08-27 00:48:12', '2022-08-27 00:48:12', 480.00),
(81, 14, 19, '2022-11-24', '2022-11-26', 0, 'unpaid', '2022-08-27 00:48:12', '2022-08-27 00:48:12', 480.00),
(82, 14, 19, '2022-12-24', '2022-12-26', 0, 'unpaid', '2022-08-27 00:48:12', '2022-08-27 00:48:12', 480.00),
(83, 13, 20, '2022-08-25', '2022-08-27', 1, 'paid', '2022-08-27 09:53:25', '2022-08-27 09:53:25', 540.00),
(84, 13, 20, '2022-09-25', '2022-09-27', 0, 'unpaid', '2022-08-27 09:53:25', '2022-08-27 09:53:25', 540.00),
(85, 13, 20, '2022-10-25', '2022-10-27', 0, 'unpaid', '2022-08-27 09:53:25', '2022-08-27 09:53:25', 540.00),
(86, 13, 20, '2022-11-25', '2022-11-27', 0, 'unpaid', '2022-08-27 09:53:25', '2022-08-27 09:53:25', 540.00),
(87, 13, 20, '2022-12-25', '2022-12-27', 0, 'unpaid', '2022-08-27 09:53:25', '2022-08-27 09:53:25', 540.00),
(88, 14, 20, '2022-08-25', '2022-08-27', 1, 'paid', '2022-08-27 09:53:26', '2022-08-27 09:53:26', 480.00),
(89, 14, 20, '2022-09-25', '2022-09-27', 0, 'unpaid', '2022-08-27 09:53:26', '2022-08-27 09:53:26', 480.00),
(90, 14, 20, '2022-10-25', '2022-10-27', 0, 'unpaid', '2022-08-27 09:53:26', '2022-08-27 09:53:26', 480.00),
(91, 14, 20, '2022-11-25', '2022-11-27', 0, 'unpaid', '2022-08-27 09:53:26', '2022-08-27 09:53:26', 480.00),
(92, 14, 20, '2022-12-25', '2022-12-27', 0, 'unpaid', '2022-08-27 09:53:26', '2022-08-27 09:53:26', 480.00),
(93, 15, 22, '2022-08-26', '2022-08-28', 1, 'unpaid', '2022-08-29 03:06:56', '2022-08-29 20:11:51', 191.25),
(94, 15, 22, '2022-09-26', '2022-09-28', 0, 'unpaid', '2022-08-29 03:06:56', '2022-08-29 20:12:01', 191.25),
(95, 16, 22, '2022-08-26', '2022-08-28', 1, 'unpaid', '2022-08-29 03:06:57', '2022-08-29 20:11:56', 75.00),
(96, 16, 22, '2022-09-26', '2022-09-28', 0, 'unpaid', '2022-08-29 03:06:57', '2022-08-29 03:06:57', 75.00),
(97, 15, 23, '2022-08-27', '2022-08-29', 1, 'paid', '2022-08-29 20:22:25', '2022-08-29 20:22:25', 255.00),
(98, 15, 23, '2022-09-27', '2022-09-29', 0, 'unpaid', '2022-08-29 20:22:25', '2022-08-29 20:22:25', 255.00);

-- --------------------------------------------------------

--
-- Table structure for table `course_rates`
--

CREATE TABLE `course_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rate` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name_ar`, `name_en`, `code`, `created_at`, `updated_at`) VALUES
(1, 'جنية مصري', 'Egyption pound', 'EGP', '2021-11-14 21:41:55', '2021-11-14 21:41:55'),
(2, 'دولار امريكي', 'American bound', 'EUC', '2021-11-14 21:41:55', '2021-11-14 21:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  `show` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `course_id`, `sort`, `show`, `created_at`, `updated_at`) VALUES
(1, 'exam one chemist', 1, 1, 1, '2021-11-14 21:44:11', '2021-11-14 21:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `exam_questions`
--

CREATE TABLE `exam_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('text','image') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  `show` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_questions`
--

INSERT INTO `exam_questions` (`id`, `name`, `type`, `exam_id`, `sort`, `show`, `created_at`, `updated_at`) VALUES
(1, 'question one for exam one?', 'text', 1, 1, 1, '2021-11-14 21:49:53', '2021-11-14 21:49:53'),
(2, 'question 2 for exam one?', 'text', 1, 1, 1, '2021-11-14 21:49:59', '2021-11-14 21:49:59'),
(3, 'question 3 for exam one?', 'text', 1, 1, 1, '2021-11-14 21:50:08', '2021-11-14 21:50:08'),
(4, 'question 4 for exam one?', 'text', 1, 1, 1, '2021-11-14 21:50:14', '2021-11-14 21:50:14');

-- --------------------------------------------------------

--
-- Table structure for table `exam_question_answers`
--

CREATE TABLE `exam_question_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('text','image') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `correct` int(11) NOT NULL DEFAULT '0',
  `exam_question_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_question_answers`
--

INSERT INTO `exam_question_answers` (`id`, `name`, `type`, `correct`, `exam_question_id`, `created_at`, `updated_at`) VALUES
(1, '16368906716190f82fe7173.jpeg', 'image', 1, 1, '2021-11-14 21:51:12', '2021-11-14 21:51:12'),
(2, 'answer for Q1', 'text', 0, 1, '2021-11-14 21:51:12', '2021-11-14 21:51:12'),
(3, '16368906846190f83c09fc6.jpeg', 'image', 1, 2, '2021-11-14 21:51:24', '2021-11-14 21:51:24'),
(4, 'answer for Q1', 'text', 0, 2, '2021-11-14 21:51:24', '2021-11-14 21:51:24'),
(5, '16368906886190f840193e5.jpeg', 'image', 1, 3, '2021-11-14 21:51:28', '2021-11-14 21:51:28'),
(6, 'answer for Q1', 'text', 0, 3, '2021-11-14 21:51:28', '2021-11-14 21:51:28'),
(7, '16368906916190f8436f1c4.jpeg', 'image', 1, 4, '2021-11-14 21:51:31', '2021-11-14 21:51:31'),
(8, 'answer for Q1', 'text', 0, 4, '2021-11-14 21:51:31', '2021-11-14 21:51:31'),
(9, '16368906976190f849ac4c8.jpeg', 'image', 1, 2, '2021-11-14 21:51:37', '2021-11-14 21:51:37'),
(10, 'answer for Q1', 'text', 0, 2, '2021-11-14 21:51:37', '2021-11-14 21:51:37');

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
-- Table structure for table `inboxes`
--

CREATE TABLE `inboxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `assistant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_read` int(11) NOT NULL DEFAULT '0',
  `is_lock` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inboxes`
--

INSERT INTO `inboxes` (`id`, `message`, `sender_id`, `receiver_id`, `parent_id`, `assistant_id`, `is_read`, `is_lock`, `created_at`, `updated_at`) VALUES
(1, 'reply test', 2, 2, NULL, NULL, 0, 0, '2021-12-10 22:14:08', '2021-12-10 22:14:08'),
(2, 'reply test', 2, 2, NULL, NULL, 0, 0, '2021-12-10 22:15:01', '2021-12-10 22:15:01'),
(3, 'reply test', 2, 2, NULL, NULL, 0, 0, '2021-12-10 22:15:24', '2021-12-10 22:15:24'),
(4, 'reply test', 2, 2, NULL, NULL, 0, 0, '2021-12-10 22:15:33', '2021-12-10 22:15:33'),
(5, 'reply test', 2, 2, NULL, NULL, 0, 0, '2021-12-10 22:30:46', '2021-12-10 22:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `inbox_files`
--

CREATE TABLE `inbox_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inbox_id` bigint(20) UNSIGNED DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inbox_files`
--

INSERT INTO `inbox_files` (`id`, `inbox_id`, `file`, `created_at`, `updated_at`) VALUES
(1, 1, '163917084861b3c32067d2e.PNG', '2021-12-10 22:14:08', '2021-12-10 22:14:08'),
(2, 2, '163917090161b3c35590992.PNG', '2021-12-10 22:15:01', '2021-12-10 22:15:01'),
(3, 3, '163917092461b3c36ce2755.PNG', '2021-12-10 22:15:24', '2021-12-10 22:15:24'),
(4, 4, '163917093361b3c37546d46.PNG', '2021-12-10 22:15:33', '2021-12-10 22:15:33'),
(5, 5, '163917184661b3c70632a38.jpg', '2021-12-10 22:30:46', '2021-12-10 22:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `name`, `job_title`, `image`, `bio`, `created_at`, `updated_at`, `sort`) VALUES
(1, 'Ali', 'ai doctor', NULL, 'asdasd wasdasdasd asdadssaddsa', '2021-11-14 21:59:01', '2022-07-04 19:46:24', 2),
(2, 'Ritter', 'try', '1660982978630096c25fa6b.jpg', 'Lorem ipsum dolor sit er elit lamet, consectetaur cillium adipisicing pecu, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Nam liber te conscient to factor tum poen legum odioque civiuda.', '2022-08-20 18:09:38', '2022-08-20 18:09:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `invoice_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(10) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `offer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_id` int(11) NOT NULL,
  `type` enum('course','offer','courses_array','installment','installments_array') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'course',
  `fawry_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fawry_expire_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeza_reference` int(11) DEFAULT NULL,
  `courses_array` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_id`, `invoice_key`, `user_id`, `course_id`, `status`, `created_at`, `updated_at`, `offer_id`, `payment_id`, `type`, `fawry_code`, `fawry_expire_date`, `meeza_reference`, `courses_array`) VALUES
(1, 1001603, '2y0dJrIpzH7WJ2a', 2, 1, 0, '2021-12-16 16:18:47', '2021-12-16 16:18:47', NULL, 0, 'course', NULL, NULL, NULL, NULL),
(2, 1001604, '49ZjiPgXL8plRkW', 2, 1, 0, '2021-12-16 16:19:20', '2021-12-16 16:19:20', NULL, 0, 'course', NULL, NULL, NULL, NULL),
(3, 1001605, 'jMDm8dDN3jzM5f8', 2, 1, 0, '2021-12-16 16:38:31', '2021-12-16 16:38:31', NULL, 0, 'course', NULL, NULL, NULL, NULL),
(4, 1001606, 'ed1URYXhSedMq83', 2, 1, 0, '2021-12-16 17:08:14', '2021-12-16 17:08:14', NULL, 0, 'course', NULL, NULL, NULL, NULL),
(5, 1001607, '6zdNGMyIDRR8aVc', 2, 1, 0, '2021-12-17 13:10:53', '2021-12-17 13:10:53', NULL, 0, 'course', NULL, NULL, NULL, NULL),
(6, 1001608, 'gYkI7c8VSWVHsgg', 2, 1, 0, '2021-12-17 13:22:32', '2021-12-17 13:22:32', NULL, 0, 'course', NULL, NULL, NULL, NULL),
(7, 1339709, 'Vk3FjM9O8YFpiwd', 2, 1, 0, '2021-12-24 02:12:04', '2021-12-24 02:12:04', NULL, 3, 'course', NULL, NULL, NULL, NULL),
(8, 1001620, 'YQ52erKjL6lmPLV', 2, 1, 0, '2021-12-25 08:06:29', '2021-12-25 08:06:29', NULL, 2, 'course', NULL, NULL, NULL, NULL),
(9, 1001621, 'icVy4le1Q8YhT4g', 2, 1, 0, '2021-12-25 08:09:07', '2021-12-25 08:09:07', NULL, 2, 'course', NULL, NULL, NULL, NULL),
(10, 1385489, 'Wcyw6nUhBa7tpBf', 2, 2, 0, '2022-01-21 16:10:30', '2022-01-21 16:10:30', NULL, 10, 'course', NULL, NULL, NULL, NULL),
(11, 1672423, 'knTcXE1nZhWyPMb', 2, NULL, 0, '2022-07-04 22:41:44', '2022-07-04 22:41:44', NULL, 10, 'courses_array', NULL, NULL, NULL, '1,4'),
(12, 1672425, '8BbYwJPVzR5QAT2', 2, NULL, 0, '2022-07-04 22:43:22', '2022-07-04 22:43:22', NULL, 10, 'courses_array', NULL, NULL, NULL, '1,4'),
(13, 1695201, 'TlYSVAnTsbxn7Dp', 2, NULL, 0, '2022-07-22 01:18:26', '2022-07-22 01:18:26', NULL, 10, 'installment', NULL, NULL, NULL, '3'),
(14, 1697903, '3AilhhLDGpnDPZQ', 2, NULL, 0, '2022-07-27 07:34:58', '2022-07-27 07:34:58', NULL, 10, 'installment', NULL, NULL, NULL, '8,5'),
(15, 1697915, 'npeQcN2hLMWs0Yk', 2, NULL, 0, '2022-07-27 08:34:35', '2022-07-27 08:34:35', NULL, 10, 'installment', NULL, NULL, NULL, '5,8'),
(16, 1697916, 'kB5SNW1ot2lnsgz', 2, NULL, 0, '2022-07-27 08:34:47', '2022-07-27 08:34:47', NULL, 10, 'installment', NULL, NULL, NULL, '5,8'),
(17, 1701908, 'JaoeQN6neZfjAIW', 2, NULL, 0, '2022-08-03 09:48:10', '2022-08-03 09:48:10', NULL, 10, 'installment', NULL, NULL, NULL, '5'),
(18, 1701909, '7AThP9HGfDyf69q', 2, NULL, 0, '2022-08-03 09:51:23', '2022-08-03 09:51:23', NULL, 10, 'installment', NULL, NULL, NULL, '5'),
(19, 1701910, 'h4LPSOQESp6wOh9', 2, NULL, 0, '2022-08-03 09:52:29', '2022-08-03 09:52:29', NULL, 10, 'installment', NULL, NULL, NULL, '5'),
(20, 1701911, 'nRgajGDAd8NXXMS', 2, NULL, 0, '2022-08-03 09:53:05', '2022-08-03 09:53:05', NULL, 10, 'installment', NULL, NULL, NULL, '5'),
(21, 1701912, 'MsKeGMljwKbQD6S', 2, NULL, 0, '2022-08-03 09:54:29', '2022-08-03 09:54:29', NULL, 10, 'installment', NULL, NULL, NULL, '5'),
(22, 1701913, 'sWuzpagFM9XqsHS', 2, NULL, 0, '2022-08-03 09:54:50', '2022-08-03 09:54:50', NULL, 10, 'installment', NULL, NULL, NULL, '5'),
(23, 1701916, 'RWyC7Xo38qzjL5q', 2, NULL, 0, '2022-08-03 09:56:22', '2022-08-03 09:56:22', NULL, 10, 'installment', NULL, NULL, NULL, '5'),
(24, 1701917, 'tKupuonvnHJkKGW', 2, NULL, 0, '2022-08-03 09:56:57', '2022-08-03 09:56:57', NULL, 10, 'installment', NULL, NULL, NULL, '5'),
(25, 1701918, 'o4vvsrx3pI1CDb8', 2, NULL, 0, '2022-08-03 09:57:11', '2022-08-03 09:57:11', NULL, 10, 'installment', NULL, NULL, NULL, '5'),
(26, 1701919, 'O6gA9SY0tbDutqZ', 2, NULL, 0, '2022-08-03 09:57:40', '2022-08-03 09:57:40', NULL, 10, 'installment', NULL, NULL, NULL, '5'),
(27, 1701920, 'AXBv8EuOIrGrkx2', 2, NULL, 0, '2022-08-03 09:57:50', '2022-08-03 09:57:50', NULL, 10, 'installment', NULL, NULL, NULL, '5'),
(28, 1701921, 'EVFepzug3aKwLL3', 2, NULL, 0, '2022-08-03 09:58:17', '2022-08-03 09:58:17', NULL, 10, 'installment', NULL, NULL, NULL, '5'),
(29, 1701922, 'SjMLiq2GMvxSL7l', 2, NULL, 0, '2022-08-03 09:58:32', '2022-08-03 09:58:32', NULL, 10, 'installment', NULL, NULL, NULL, '5'),
(30, 1701923, 'OKG8tIYGqrEwLOR', 2, NULL, 0, '2022-08-03 09:59:11', '2022-08-03 09:59:11', NULL, 10, 'installment', NULL, NULL, NULL, '5'),
(31, 1701925, '3t4jP8rGHFBqSV5', 2, NULL, 0, '2022-08-03 10:02:39', '2022-08-03 10:02:39', NULL, 10, 'installment', NULL, NULL, NULL, '5'),
(32, 1710798, 'gbBtvi2SBjq8gg8', NULL, NULL, 0, '2022-08-14 10:55:47', '2022-08-14 10:55:47', NULL, 10, 'installment', NULL, NULL, NULL, '2,3'),
(33, 1711419, 'ocOwYW0pDRJjACV', NULL, NULL, 0, '2022-08-15 01:45:01', '2022-08-15 01:45:01', NULL, 10, 'courses_array', NULL, NULL, NULL, '5,8,9'),
(34, 1711750, 'quEdHU9UxzNdWxr', 2, NULL, 0, '2022-08-15 05:36:22', '2022-08-15 05:36:22', NULL, 10, 'courses_array', NULL, NULL, NULL, '6,2,4'),
(35, 1711760, 'B4EmX7bNN2BUp13', 2, NULL, 0, '2022-08-15 05:41:24', '2022-08-15 05:41:24', NULL, 10, 'courses_array', NULL, NULL, NULL, '2,7'),
(36, 1711772, '7Qo96mVjXOzwPrE', 2, NULL, 0, '2022-08-15 05:48:56', '2022-08-15 05:48:56', NULL, 10, 'courses_array', NULL, NULL, NULL, '7,4'),
(37, 1711780, '5276rrthttzoAVB', NULL, NULL, 0, '2022-08-15 05:52:35', '2022-08-15 05:52:35', NULL, 10, 'courses_array', NULL, NULL, NULL, '2,7,9'),
(38, 1711797, '7Wr4xePHtA4uyZO', 2, NULL, 0, '2022-08-15 06:07:09', '2022-08-15 06:07:09', NULL, 10, 'installment', NULL, NULL, NULL, '4'),
(39, 1711806, 'x7g3utdeZIzpjih', 2, NULL, 1, '2022-08-15 06:12:18', '2022-08-15 06:13:42', NULL, 10, 'installment', NULL, NULL, NULL, '4'),
(40, 1717083, 'Hkk5UqRLD3KHIHW', 2, NULL, 1, '2022-08-18 21:33:12', '2022-08-18 21:37:24', NULL, 10, 'installments_array', NULL, NULL, NULL, '10,11'),
(41, 1717291, '6e0r2wL8t6smC44', NULL, NULL, 1, '2022-08-18 23:22:02', '2022-08-18 23:22:24', NULL, 10, 'installment', NULL, NULL, NULL, '6'),
(42, 1718307, 'UaFE7cmZqJ4LNmG', NULL, NULL, 0, '2022-08-19 08:16:51', '2022-08-19 08:16:51', NULL, 10, 'installment', NULL, NULL, NULL, '13'),
(43, 1718332, 'mokPwIWoxasrl8o', NULL, NULL, 1, '2022-08-19 08:43:17', '2022-08-19 08:44:47', NULL, 10, 'installment', NULL, NULL, NULL, '13'),
(44, 1718376, '0rYCjNAaCx5EatS', 2, NULL, 0, '2022-08-19 09:40:50', '2022-08-19 09:40:50', NULL, 10, 'installment', NULL, NULL, NULL, '7'),
(45, 1718377, 'MkPPXSFD7UoEQPJ', NULL, NULL, 0, '2022-08-19 09:41:21', '2022-08-19 09:41:21', NULL, 10, 'installment', NULL, NULL, NULL, '2'),
(46, 1719876, 'YbZWE1g3rXFV3oc', NULL, NULL, 0, '2022-08-20 15:07:38', '2022-08-20 15:07:38', NULL, 10, 'installment', NULL, NULL, NULL, '13'),
(47, 1719877, 'LrO0oeHLqUqvlOL', NULL, NULL, 1, '2022-08-20 15:08:23', '2022-08-20 15:10:24', NULL, 10, 'installment', NULL, NULL, NULL, '13'),
(48, 1719880, 'UwwBH54P7dae2xG', 13, NULL, 0, '2022-08-20 15:14:50', '2022-08-20 15:14:50', NULL, 10, 'installment', NULL, NULL, NULL, '13'),
(49, 1721243, 'AeIrWsA9DNQnlz6', NULL, NULL, 0, '2022-08-21 08:42:38', '2022-08-21 08:42:38', NULL, 10, 'installment', NULL, NULL, NULL, '13'),
(50, 1721245, '8IMcp3FvDV1SHVG', NULL, NULL, 0, '2022-08-21 08:45:34', '2022-08-21 08:45:34', NULL, 10, 'installment', NULL, NULL, NULL, '13'),
(51, 1721255, 'kaY9guAKi5gZsi2', NULL, NULL, 1, '2022-08-21 08:55:34', '2022-08-21 08:56:33', NULL, 10, 'installment', NULL, NULL, NULL, '13'),
(52, 1721288, 'nuZ3hIPkTsGhXtn', 13, NULL, 1, '2022-08-21 09:39:27', '2022-08-21 09:43:02', NULL, 10, 'installment', NULL, NULL, NULL, '13'),
(53, 1721359, 'pT6mzw5Q96sPjL7', 16, NULL, 0, '2022-08-21 14:27:09', '2022-08-21 14:27:09', NULL, 10, 'installment', NULL, NULL, NULL, '13'),
(54, 1721366, 'VMRVUKsvf3Dj9Xd', 16, NULL, 0, '2022-08-21 15:25:08', '2022-08-21 15:25:08', NULL, 10, 'installment', NULL, NULL, NULL, '13'),
(55, 1721371, 'XKrFlTIpC8Tazcp', 16, NULL, 0, '2022-08-21 15:37:10', '2022-08-21 15:37:10', NULL, 10, 'installment', NULL, NULL, NULL, '13'),
(56, 1722849, 'DQeBUpGB7l1HIFC', 17, NULL, 1, '2022-08-22 17:48:56', '2022-08-22 17:49:39', NULL, 10, 'installment', NULL, NULL, NULL, '13,14'),
(57, 1722851, 'ubMXD4ci3kAxVAW', 18, NULL, 1, '2022-08-22 17:56:33', '2022-08-22 17:57:26', NULL, 10, 'installment', NULL, NULL, NULL, '13,14'),
(58, 1728619, '6yOQr3siN5IdCYB', 19, NULL, 0, '2022-08-25 21:28:09', '2022-08-25 21:28:09', NULL, 10, 'courses_array', NULL, NULL, NULL, '13,14'),
(59, 1728764, 'zasW5qpotuxuRun', 19, NULL, 0, '2022-08-25 22:47:03', '2022-08-25 22:47:03', NULL, 10, 'installment', NULL, NULL, NULL, '13,14'),
(60, 1730303, 'uixtA9yYYRC5Ksy', 19, NULL, 0, '2022-08-27 00:45:21', '2022-08-27 00:45:21', NULL, 10, 'installment', NULL, NULL, NULL, '13,14'),
(61, 1730306, 'eeOuUXh4V7wKYwQ', 19, NULL, 1, '2022-08-27 00:46:30', '2022-08-27 00:48:11', NULL, 10, 'installment', NULL, NULL, NULL, '13,14'),
(62, 1730971, '7pJPYvwpa7Dv176', 20, NULL, 1, '2022-08-27 09:47:11', '2022-08-27 09:53:25', NULL, 10, 'installment', NULL, NULL, NULL, '13,14'),
(63, 1730988, 'MHB6TQppGdPmkC9', 18, NULL, 0, '2022-08-27 10:29:57', '2022-08-27 10:29:57', NULL, 10, 'installments_array', NULL, NULL, NULL, '64,65'),
(64, 1733437, 'x4Cl5IdAM06ZEfa', 22, NULL, 1, '2022-08-29 03:06:16', '2022-08-29 03:06:56', NULL, 10, 'installment', NULL, NULL, NULL, '15,16'),
(65, 1734435, 'pH50sLK81qyY43e', 23, NULL, 1, '2022-08-29 20:21:19', '2022-08-29 20:22:25', NULL, 10, 'installment', NULL, NULL, NULL, '15'),
(66, 1734442, 'nEmXAJl9FUTM571', 23, NULL, 0, '2022-08-29 20:29:52', '2022-08-29 20:29:52', NULL, 10, 'courses_array', NULL, NULL, NULL, '2'),
(67, 1734461, 'LMQrKZ1E6iUEhCz', 23, NULL, 0, '2022-08-29 20:39:26', '2022-08-29 20:39:26', NULL, 10, 'installment', NULL, NULL, NULL, '18'),
(68, 1735250, 'zc2S7ilZr0VmSmk', 16, NULL, 0, '2022-08-30 02:32:36', '2022-08-30 02:32:36', NULL, 10, 'installment', NULL, NULL, NULL, '16');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  `show` int(11) NOT NULL DEFAULT '1',
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `name_ar`, `name_en`, `image`, `sort`, `show`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'الدرس 1', 'lesson 1', NULL, 1, 1, 1, '2021-11-14 21:52:12', '2021-11-14 21:52:12'),
(2, 'الدرس 2', 'lesson 2', NULL, 1, 1, 1, '2021-11-14 21:52:20', '2021-11-14 21:52:20'),
(3, 'الدرس 3', 'lesson 3', NULL, 1, 1, 1, '2021-11-14 21:52:29', '2021-11-14 21:52:29'),
(4, 'الدرس 3', 'lesson 3', NULL, 1, 1, 2, '2021-11-16 22:19:06', '2021-11-16 22:19:06'),
(5, 'الدرس 7', 'lesson 7', '164288724361ec784b3b2e6.PNG', 1, 1, 1, '2022-01-22 22:34:03', '2022-01-22 22:34:03'),
(6, 'الدرس 7', 'lesson 7', NULL, 1, 1, 4, '2022-07-04 20:19:15', '2022-07-04 20:19:15'),
(7, 'الدرس 7', 'lesson 7', NULL, 1, 1, 5, '2022-07-04 20:19:15', '2022-07-04 20:19:15'),
(8, 'New :)', 'New :)', NULL, 1, 1, 13, '2022-08-19 08:58:48', '2022-08-19 08:58:48'),
(9, 'lec 1', 'lec 1', NULL, 1, 1, 15, '2022-08-29 21:03:23', '2022-08-29 21:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  `show` int(11) NOT NULL DEFAULT '1',
  `college_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name_ar`, `name_en`, `image`, `sort`, `show`, `college_id`, `created_at`, `updated_at`) VALUES
(1, 'المستوى الاول', 'level 1', NULL, 1, 1, 1, '2021-11-14 21:40:39', '2021-11-14 21:40:39'),
(2, 'المستوى الثاني', 'level 2', NULL, 1, 1, 1, '2021-11-14 21:40:58', '2021-11-14 21:40:58'),
(3, 'New :)', 'New :)', '166082040362fe1bb3ca45a.jpg', 1, 1, 4, '2022-08-18 21:00:03', '2022-08-18 21:00:03'),
(4, 'المستوي الاول', 'level 1', '1661705596630b9d7cd56c2.jpg', 1, 1, 5, '2022-08-29 02:53:16', '2022-08-29 02:53:16');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_11_160851_create_instructors_table', 1),
(6, '2021_11_11_160932_create_universities_table', 1),
(7, '2021_11_11_160955_create_currencies_table', 1),
(8, '2021_11_11_161101_create_colleges_table', 1),
(9, '2021_11_11_161116_create_levels_table', 1),
(10, '2021_11_11_161127_create_courses_table', 1),
(11, '2021_11_11_161226_create_course_contents_table', 1),
(12, '2021_11_11_161234_create_course_rates_table', 1),
(13, '2021_11_11_161321_create_exams_table', 1),
(14, '2021_11_11_161340_create_exam_questions_table', 1),
(15, '2021_11_11_161414_create_exam_question_answers_table', 1),
(16, '2021_11_11_161446_create_lessons_table', 1),
(17, '2021_11_11_161513_create_videos_table', 1),
(18, '2021_11_11_161548_create_quizzes_table', 1),
(19, '2021_11_11_161609_create_articles_table', 1),
(20, '2021_11_11_161629_create_user_lessons_table', 1),
(21, '2021_11_11_161652_create_quiz_questions_table', 1),
(22, '2021_11_11_161718_create_quiz_question_answers_table', 1),
(23, '2021_11_11_161732_create_offers_table', 1),
(24, '2021_11_11_161803_create_offer_courses_table', 1),
(25, '2021_11_11_162851_create_inboxes_table', 1),
(26, '2021_11_11_162859_create_inbox_files_table', 1),
(27, '2021_11_13_002615_create_request_types_table', 1),
(28, '2021_11_13_181050_inbox_update', 1),
(29, '2021_12_16_180636_create_invoices_table', 2),
(31, '2021_12_22_233852_update_invoice_table', 3),
(32, '2022_01_22_234741_create_user_courses_table', 4),
(33, '2022_01_24_160613_update_users_table', 5),
(34, '2022_07_04_214155_update_instructors_sort_table', 6),
(35, '2022_07_04_220504_update_universities_count_column_table', 7),
(36, '2022_07_04_223546_create_settings_table', 8),
(37, '2022_07_04_231303_create_carts_table', 9),
(39, '2022_07_05_001114_update_invoide_courses_array_table', 10),
(41, '2022_07_05_001116_update_invoide_courses_aarray_table', 12),
(42, '2022_07_25_061639_update_settings_table', 13),
(44, '2022_07_25_061640_update_courses_first_price', 14),
(45, '2022_07_27_075406_create_coupons_table', 15),
(46, '2022_07_27_080207_create_coupon_usages_table', 15),
(47, '2022_07_27_094231_create_cart_helps_table', 16),
(48, '2022_08_03_100546_create_course_installments_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_ar` longtext COLLATE utf8mb4_unicode_ci,
  `desc_en` longtext COLLATE utf8mb4_unicode_ci,
  `price` double(8,2) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  `show` int(11) NOT NULL DEFAULT '1',
  `currency_id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `name_ar`, `name_en`, `desc_ar`, `desc_en`, `price`, `sort`, `show`, `currency_id`, `level_id`, `created_at`, `updated_at`) VALUES
(1, 'عرض جديد', 'new offer', 'عرض عرض عرض عرض عرض عرض', 'desc desc desc desc desc desc desc', 1000.00, 1, 1, 1, 1, '2021-11-14 21:59:24', '2021-11-14 21:59:24'),
(2, 'عرض جديد', 'new offer', 'عرض عرض عرض عرض عرض عرض', 'desc desc desc desc desc desc desc', 1000.00, 1, 1, 1, 1, '2021-11-14 22:00:19', '2021-11-14 22:00:19'),
(3, 'عرض جديد2', 'new offer 2', 'عرض عرض عرض عرض عرض عرض', 'desc desc desc desc desc desc desc', 1000.00, 1, 1, 1, 1, '2021-11-14 22:00:31', '2021-11-14 22:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `offer_courses`
--

CREATE TABLE `offer_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offer_courses`
--

INSERT INTO `offer_courses` (`id`, `offer_id`, `course_id`, `created_at`, `updated_at`) VALUES
(4, 2, 1, NULL, NULL),
(5, 2, 2, NULL, NULL),
(6, 3, 1, NULL, NULL),
(7, 3, 2, NULL, NULL);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  `show` int(11) NOT NULL DEFAULT '1',
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `name`, `sort`, `show`, `lesson_id`, `created_at`, `updated_at`) VALUES
(1, 'quiz one cs', 1, 1, 1, '2021-11-14 21:53:18', '2021-11-14 21:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('text','image') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `sort` int(11) NOT NULL DEFAULT '1',
  `show` int(11) NOT NULL DEFAULT '1',
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `name`, `type`, `sort`, `show`, `quiz_id`, `created_at`, `updated_at`) VALUES
(1, 'Q1 text', 'text', 1, 1, 1, '2021-11-14 21:53:34', '2021-11-14 21:53:34'),
(2, 'Q2 text', 'text', 1, 1, 1, '2021-11-14 21:53:39', '2021-11-14 21:53:39'),
(3, '16368908466190f8de5866b.jpeg', 'image', 1, 1, 1, '2021-11-14 21:54:06', '2021-11-14 21:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question_answers`
--

CREATE TABLE `quiz_question_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('text','image') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `correct` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '1',
  `show` int(11) NOT NULL DEFAULT '1',
  `quiz_question_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_question_answers`
--

INSERT INTO `quiz_question_answers` (`id`, `name`, `type`, `correct`, `sort`, `show`, `quiz_question_id`, `created_at`, `updated_at`) VALUES
(1, '16368909096190f91dad4db.jpeg', 'image', 1, 1, 1, 1, '2021-11-14 21:55:09', '2021-11-14 21:55:09'),
(2, 'answe', 'text', 0, 1, 1, 1, '2021-11-14 21:55:09', '2021-11-14 21:55:09'),
(3, '16368909136190f9212aab5.jpeg', 'image', 1, 1, 1, 2, '2021-11-14 21:55:13', '2021-11-14 21:55:13'),
(4, 'answe', 'text', 0, 1, 1, 2, '2021-11-14 21:55:13', '2021-11-14 21:55:13'),
(5, '16368909166190f92410ea8.jpeg', 'image', 1, 1, 1, 3, '2021-11-14 21:55:16', '2021-11-14 21:55:16'),
(6, 'answe', 'text', 0, 1, 1, 3, '2021-11-14 21:55:16', '2021-11-14 21:55:16'),
(7, '16368909276190f92f5b7d3.jpeg', 'image', 1, 1, 1, 1, '2021-11-14 21:55:27', '2021-11-14 21:55:27'),
(8, 'answe', 'text', 0, 1, 1, 1, '2021-11-14 21:55:27', '2021-11-14 21:55:27'),
(9, '16368909306190f932477b5.jpeg', 'image', 1, 1, 1, 2, '2021-11-14 21:55:30', '2021-11-14 21:55:30'),
(10, 'answe', 'text', 0, 1, 1, 2, '2021-11-14 21:55:30', '2021-11-14 21:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `request_types`
--

CREATE TABLE `request_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_types`
--

INSERT INTO `request_types` (`id`, `name_ar`, `name_en`, `show`, `created_at`, `updated_at`) VALUES
(1, 'موقع اليكترونى', 'website', 1, '2021-11-14 21:33:58', '2021-11-14 21:33:58'),
(2, 'تطبيق جوال', 'mobile application', 1, '2021-11-14 21:34:20', '2021-11-14 21:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_started_at` date DEFAULT NULL,
  `term_ended_at` date DEFAULT NULL,
  `month_count` int(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `term_started_at`, `term_ended_at`, `month_count`, `created_at`, `updated_at`) VALUES
(1, 'first term', '2022-09-01', '2022-12-01', 3, NULL, '2022-07-22 00:40:58'),
(3, 'term secondary', '2022-08-01', '2022-11-01', 5, '2022-07-25 05:07:14', '2022-07-25 05:10:03'),
(5, 'gold', '2022-08-07', '2022-12-07', 4, '2022-08-07 23:23:56', '2022-08-07 23:23:56'),
(6, 'New', '2022-08-18', '2023-02-18', 6, '2022-08-18 21:01:14', '2022-08-18 21:01:14'),
(7, 'الترم الأول', '2022-08-15', '2022-11-01', 3, '2022-08-29 02:49:27', '2022-08-29 02:50:28');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  `show` int(11) NOT NULL DEFAULT '1',
  `show_data` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `spiecialest` int(11) NOT NULL DEFAULT '0',
  `courses` int(11) NOT NULL DEFAULT '0',
  `lessons` int(11) NOT NULL DEFAULT '0',
  `students` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name_ar`, `name_en`, `image`, `sort`, `show`, `show_data`, `created_at`, `updated_at`, `spiecialest`, `courses`, `lessons`, `students`) VALUES
(6, 'جامعة ام القرى', 'om elkora university', '16368898806190f5182634f.jpeg', 1, 1, 1, '2021-11-14 21:38:00', '2022-08-29 20:39:00', 1, 10, 1, 8),
(7, 'جامعة جازان', 'jazan university', '16368899256190f5456638f.jpeg', 1, 1, 1, '2021-11-14 21:38:45', '2022-08-27 09:53:26', 1, 2, 1, 12),
(8, 'جامعة الجوف', 'Al Jouf University', '1661652558630ace4eaf03e.jpg', 1, 1, 0, '2022-08-28 12:09:03', '2022-08-29 21:03:23', 1, 3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcm_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified` int(11) NOT NULL DEFAULT '0',
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('admin','student','assistant') COLLATE utf8mb4_unicode_ci DEFAULT 'student',
  `status` enum('disable','enable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `screen_shoot_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `qr_image`, `phone`, `password`, `api_token`, `email_verified_at`, `remember_token`, `device_id`, `fcm_token`, `verified`, `code`, `type`, `status`, `created_at`, `updated_at`, `screen_shoot_count`) VALUES
(1, 'admin', 'admin@admin.com', NULL, NULL, '01094641332', '$2y$10$fh5Z1mbYtYH8o6A7rmPnVe0F.mNIUgTusWMNw0O0cVjt/Tz2tG7BG', NULL, NULL, NULL, '752A4F92-3EBF-4BB4-8A03-2E6B4FE71E14', 'cMyljl4ZOEjupnO_6I4Ne5:APA91bEl0McqxSYJUCfbVgvZqwkjc1W06wG4baHoJCm3fI5i_dCebvH28y2tV4qMuF95B37nhZwI63XUxl6b2mw5RhuGC8MxWxvhMTOGR_GSEIN2saqw0ZjuIa62kvJr9_16lyCe4aGR', 1, NULL, 'admin', 'enable', '2021-11-14 03:46:23', '2022-08-30 02:33:12', 0),
(2, 'student', 'student@gmail.com', NULL, NULL, '01201636129', '$2y$10$MhZXXgZipzVXZn/wiH7lW.eR/aJb1PyjMBDqLwFdldeUMkofB6iBG', 'zeAXWK2DDSr2FyXBkhx83idFvDqSmTKK1Lg2C91qoVjh1iUDNdq1ujHaso4S', NULL, NULL, '85E4B1B6-20E5-4C3F-99AE-9FFC74EAC7D3', 'c-CeaQjSW03Phf9VHp4pA2:APA91bGqfb0vYytHSuLQOpEteGQSeOIrcBGe4FlCcb1w5LFrHdL-RxP5C7lVbuU4x61i_wnNp8TLc-6wAnr3lqsR1q2d5JuOWM2-q4dtbv8JC9AMSCXnH1LDjy_FpCLSIiaVd2D3oXN7dd', 1, NULL, 'student', 'enable', '2021-11-14 03:46:23', '2022-08-21 15:46:44', 0),
(3, 'assistant', 'assistant@gmail.com', NULL, NULL, '01111651415', '$2y$10$jOm3BJIj.GpnaSqiPf1Kr.FYVKZ480lWOTb59mXkDXclNyPuS0jKi', NULL, NULL, NULL, '124device_id', 'fcm4_tokenfcm_tokenfcm_token', 1, NULL, 'assistant', 'enable', '2021-11-14 03:46:23', '2021-11-14 03:46:23', 0),
(4, 'nasser', 'nasser@gmail.com', NULL, 'qr_4.png', '01010101019', '$2y$10$BBiXCSRJxysS1a4OLtKXS.Ujgf9UY9sSSnQR0hEPGxzLmgJHsS5SG', 'DrMmpevtfttf0ABjhNBgi6IJyBZQktcZ8R1PaKLSWrijdQ6zAwKwMv2ivkQC', NULL, NULL, '15555', 'c-CeaQjSW03Phf9VHp4pA2:APA91bGqfb0vYytHSuLQOpEteGQSeOIrcBGe4FlCcb1w5LFrHdL-RxP5C7lVbuU4x61i_wnNp8TLc-6wAnr3lqsR1q2d5JuOWM2-q4dtbv8JC9AMSCXnH1LDjy_FpCLSIiaVd2D3oXN7dd', 1, NULL, 'student', 'enable', '2021-11-14 05:08:08', '2021-11-14 05:08:08', 0),
(5, 'mostafa elnagar', 'melnagar271@gmail.com', NULL, 'qr_5.png', '01030407100', '$2y$10$bsguCkm8ftkA83Q1ouf5WekR9cxc5c50.s4WqOz68tQ6YJ3ftqNQ6', 'wWRTwiXhvAMV4D56w6KwIp8OYlio7N3RLoSjuFW6lerTfnG10PX01y1Ohu7y', '2021-11-15 04:55:07', NULL, '8f78ce4c0737b39e', 'cV7OWcgwRaOtkYJxaupSox:APA91bFkDNm3KbHSFmYyNRHt3Jq96wBVJR0i_Ks1Z4XURYCqwlois8uNbyRF5ylRvGsECHwOBM_0ZWy5m10INXQNXvLJ8GjvwuhRN7S2pZSGhibHQ8xPxR3IMtN6VXCE-ra1kvWq1FFn', 1, '2740', 'student', 'enable', '2021-11-14 05:51:08', '2022-08-14 15:47:28', 0),
(6, 'nasser', 'sayed.m.abdo123@gmail.com', NULL, 'qr_6.png', '01065778840', '$2y$10$PEwacq11raZqK27ltFXzUOtRqHIszuu6LY03ROCT4ijRfZLEqgY4u', 'iHQE6mA9jeiAe7Odu1dqHq3PcqhbiBRjmMycUnFYhaPvYMBkeU5bYLYCh7an', NULL, NULL, '15555', 'c-CeaQjSW03Phf9VHp4pA2:APA91bGqfb0vYytHSuLQOpEteGQSeOIrcBGe4FlCcb1w5LFrHdL-RxP5C7lVbuU4x61i_wnNp8TLc-6wAnr3lqsR1q2d5JuOWM2-q4dtbv8JC9AMSCXnH1LDjy_FpCLSIiaVd2D3oXN7dd', 1, '9928', 'student', 'enable', '2021-11-14 15:22:56', '2021-11-14 15:26:32', 0),
(7, 'mohamed nasser', 'mohamedengnasser20@gmail.com', NULL, 'qr_7.png', '01111651417', '$2y$10$wLWIpZHzKqNFAAfSCTTbwOl9oQNUi5d0rddZ.4EzvO7i0OPz0RZBS', 'Ke2bgvHQ2sFNd57keLdLPwCni1nxOBrja2EJIYbyF2CUcUs2NwjH4LPPBMmx', NULL, NULL, 'device123', 'c-CeaQjSW03Phf9VHp4pA2:APA91bGqfb0vYytHSuLQOpEteGQSeOIrcBGe4FlCcb1w5LFrHdL-RxP5C7lVbuU4x61i_wnNp8TLc-6wAnr3lqsR1q2d5JuOWM2-q4dtbv8JC9AMSCXnH1LDjy_FpCLSIiaVd2D3oXN7dd', 1, NULL, 'student', 'enable', '2022-02-05 14:24:44', '2022-02-05 14:25:08', 0),
(13, 'test ios', 'adas@gmail.com', NULL, 'qr_13.png', '1234567', '$2y$10$Ng4hDEx48Xv59LVwDl2dterd8XkPEUFP4fxLnTmPVok9ePJJ8NrLS', NULL, NULL, NULL, '85E4B1B6-20E5-4C3F-99AE-9FFC74EAC7D3', 'd7qQtLxEHkPXlwfwVPyg8X:APA91bHTeK6qAgQ1alNncjxZyIgsrk-uf4jL2uFSE7cu7PbvtF0gGTiAaPTaz3LqYhdXlJrZPr8TDfgGP06sRKgf2SBHn5k4C4TUUjTjaAC3Sx7ffoGombMNndfCMwDXEztR9qnGMBuh', 1, NULL, 'student', 'enable', '2022-08-20 15:14:00', '2022-08-21 09:57:42', 0),
(15, 'sears', 'sdfsd@gmail.com', NULL, 'qr_15.png', '12345678', '$2y$10$tWfolKdtYYJZ2L5zZFGQr.nKk7fg8wp7T4cZhCZU9TuTpNl5umeH2', 'GfIF3rdr2gpvv0Yxx7A77TsLMvKtz1LFI6bxIsC3cDQj3ihQWTViaNqumTTC', NULL, NULL, '85E4B1B6-20E5-4C3F-99AE-9FFC74EAC7D3', 'c-CeaQjSW03Phf9VHp4pA2:APA91bGqfb0vYytHSuLQOpEteGQSeOIrcBGe4FlCcb1w5LFrHdL-RxP5C7lVbuU4x61i_wnNp8TLc-6wAnr3lqsR1q2d5JuOWM2-q4dtbv8JC9AMSCXnH1LDjy_FpCLSIiaVd2D3oXN7dd', 1, NULL, 'student', 'enable', '2022-08-21 09:07:44', '2022-08-21 09:37:57', 0),
(16, 'fdsfsd', 'sdf@gmail.com', NULL, 'qr_16.png', '123456', '$2y$10$RjDQfLJQGd7DDX1o9L/rmO75.sVgw41wGnLjyL65m0KBT7jyDfBUG', 'U9amjtiaw9ISg2tcP5CUNDnQ5a9WXQAbGYhFzp64dGu8v2LPFvEysH5DEK8j', NULL, NULL, '752A4F92-3EBF-4BB4-8A03-2E6B4FE71E14', 'cMyljl4ZOEjupnO_6I4Ne5:APA91bEl0McqxSYJUCfbVgvZqwkjc1W06wG4baHoJCm3fI5i_dCebvH28y2tV4qMuF95B37nhZwI63XUxl6b2mw5RhuGC8MxWxvhMTOGR_GSEIN2saqw0ZjuIa62kvJr9_16lyCe4aGR', 1, NULL, 'student', 'enable', '2022-08-21 09:58:57', '2022-08-30 02:32:43', 37),
(17, 'sayed', 'sadas@gmail.com', NULL, 'qr_17.png', '123456789', '$2y$10$SmRJo6dtlw/XzTa5x9t7re4FHskoUkjnTKJbBzXouFbu2iv7GTGwu', NULL, NULL, NULL, NULL, 'dOzwK1mVyUIhsqMQkb4_9G:APA91bFkA5ROISfPQQTuZLf87RLjQPoRPJs5oOU1CtPYw1EiPdOGBaEZmXV5VzJxlOC8FkYsJDw-cBFOpt5JYsb8E8_x_t1WOwJP_o1N-OGHrd2AffXKVMRVkS_L7q2Ar_QMux-1M00w', 1, NULL, 'student', 'enable', '2022-08-22 17:48:00', '2022-08-24 17:05:10', 0),
(18, 'wewwww', 'wwww@gmail.com', NULL, 'qr_18.png', '12341234', '$2y$10$G2apgD1TxkMMcVfgG.effevjJ1Ptyd.0crJlpwQnI41dZ0I2xSn/e', NULL, NULL, NULL, '85E4B1B6-20E5-4C3F-99AE-9FFC74EAC7D3', 'dOzwK1mVyUIhsqMQkb4_9G:APA91bFkA5ROISfPQQTuZLf87RLjQPoRPJs5oOU1CtPYw1EiPdOGBaEZmXV5VzJxlOC8FkYsJDw-cBFOpt5JYsb8E8_x_t1WOwJP_o1N-OGHrd2AffXKVMRVkS_L7q2Ar_QMux-1M00w', 1, NULL, 'student', 'enable', '2022-08-22 17:55:52', '2022-08-28 15:28:16', 3),
(19, 'sated', 'ssss@gmail.com', NULL, 'qr_19.png', '000000', '$2y$10$O1RyxVo7ckM8OjOnxVE41ecnp9FU.iPoHkpSrIHZXTswV4I2adJb6', NULL, NULL, NULL, NULL, 'fgGWQUkoaUx8qUGk3SHlYJ:APA91bFBGn0-CZmV2dBFoMOH2kXJ-2wQgMAMMZWL9-h64_RYIUxIZm-00BeDyJnQkERY7Xc4inEAwpp3PUWghmo_eK3AeHO3BhsVFr9Qr-FGPogIemqrWq3qORyiTef8lDjXP_3R-F5z', 1, NULL, 'student', 'enable', '2022-08-25 15:20:31', '2022-08-27 20:04:01', 0),
(20, 'tttt', 'tyt@gmail.com', NULL, 'qr_20.png', '888888', '$2y$10$oFeOxrftCr9jEbYFMubMMOr8ZF/K59tL7HCIOGKtOA20EcTb.E0r6', 'BAQspuDsoLcpeUAAdWXh3owZwo09BHLaYnqvexIAq3xsUXKe7PaCSlO63qNg', NULL, NULL, '752A4F92-3EBF-4BB4-8A03-2E6B4FE71E14', 'cMyljl4ZOEjupnO_6I4Ne5:APA91bEl0McqxSYJUCfbVgvZqwkjc1W06wG4baHoJCm3fI5i_dCebvH28y2tV4qMuF95B37nhZwI63XUxl6b2mw5RhuGC8MxWxvhMTOGR_GSEIN2saqw0ZjuIa62kvJr9_16lyCe4aGR', 1, NULL, 'student', 'enable', '2022-08-25 22:49:32', '2022-08-30 02:34:32', 17),
(21, 'sayed', 'sayed@gmail.com', NULL, NULL, '999999', '$2y$10$KWQJvzGSkuhilRKOOOB1JeUZfwmz.iVh7EAHmERHtfKunMuov3hsO', NULL, NULL, NULL, '752A4F92-3EBF-4BB4-8A03-2E6B4FE71E14', 'cMyljl4ZOEjupnO_6I4Ne5:APA91bEl0McqxSYJUCfbVgvZqwkjc1W06wG4baHoJCm3fI5i_dCebvH28y2tV4qMuF95B37nhZwI63XUxl6b2mw5RhuGC8MxWxvhMTOGR_GSEIN2saqw0ZjuIa62kvJr9_16lyCe4aGR', 1, NULL, 'admin', 'enable', '2022-08-29 02:40:31', '2022-08-30 02:27:48', 0),
(22, 'new testing', 'dr.pharma124@yahoo.com', NULL, 'qr_22.png', '01018203630', '$2y$10$S0WvowzvQF4WymdVaonKxeQYnXK9kseCjPBYPeaxwrM5QwYOB1cI2', NULL, NULL, NULL, '1D7CE74C-DA99-4A54-9C52-FDE53C67647C', 'ftVAhpbDB0y9pqzZnw_ye0:APA91bFGJuQ2-bQpM-XBhzdl52TpOKr_cDRO_jyvWdGad8AFDL9vxR8TpENtPabmrYUvHykBy8I23kPnATmu7Y5sE4laxW3roDlp7YiPAlY72BHMDks02LI2xvk4KNDJPszW4f11Risf', 1, NULL, 'student', 'enable', '2022-08-29 03:03:05', '2022-08-29 20:13:04', 0),
(23, 'testinggggg 2', 'testing@gmail.com', NULL, 'qr_23.png', '0123456789', '$2y$10$aQG/AxhwQtDKYx96aKgwZOkJPCJqCtnp6YP2wRDLRyaKDu7ciTTEK', '7kj5xig2iaQsP5EQunGKgimwuePTtkJMGxhTbK0XafgjR99HiDXMRce4StfA', NULL, NULL, '1D7CE74C-DA99-4A54-9C52-FDE53C67647C', 'ftVAhpbDB0y9pqzZnw_ye0:APA91bFGJuQ2-bQpM-XBhzdl52TpOKr_cDRO_jyvWdGad8AFDL9vxR8TpENtPabmrYUvHykBy8I23kPnATmu7Y5sE4laxW3roDlp7YiPAlY72BHMDks02LI2xvk4KNDJPszW4f11Risf', 1, NULL, 'student', 'enable', '2022-08-29 20:15:04', '2022-08-29 20:15:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_courses`
--

CREATE TABLE `user_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_courses`
--

INSERT INTO `user_courses` (`id`, `user_id`, `course_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 3, 1, '2022-01-30 23:08:55', '2022-01-30 23:08:55'),
(3, 5, 3, 1, '2022-01-30 23:08:55', '2022-01-30 23:08:55'),
(4, 6, 1, 1, '2022-01-30 23:14:09', '2022-01-30 23:14:09'),
(5, 7, 4, 1, '2022-07-04 20:33:06', '2022-07-04 20:33:06'),
(6, 2, 1, 1, '2022-07-04 20:33:06', '2022-07-04 20:33:06'),
(12, 2, 5, 1, '2022-08-03 10:02:39', '2022-08-03 10:02:39'),
(13, 2, 4, 1, '2022-08-15 06:13:42', '2022-08-15 06:13:42'),
(17, 13, 13, 1, '2022-08-21 09:43:02', '2022-08-21 09:43:02'),
(18, 17, 13, 1, '2022-08-22 17:49:39', '2022-08-22 17:49:39'),
(19, 17, 14, 1, '2022-08-22 17:49:39', '2022-08-22 17:49:39'),
(20, 18, 13, 1, '2022-08-22 17:57:26', '2022-08-22 17:57:26'),
(21, 18, 14, 1, '2022-08-22 17:57:26', '2022-08-22 17:57:26'),
(22, 19, 13, 1, '2022-08-27 00:48:11', '2022-08-27 00:48:11'),
(23, 19, 14, 1, '2022-08-27 00:48:12', '2022-08-27 00:48:12'),
(24, 20, 13, 1, '2022-08-27 09:53:25', '2022-08-27 09:53:25'),
(25, 20, 14, 1, '2022-08-27 09:53:26', '2022-08-27 09:53:26'),
(26, 22, 15, 1, '2022-08-29 03:06:56', '2022-08-29 03:06:56'),
(27, 22, 16, 1, '2022-08-29 03:06:57', '2022-08-29 03:06:57'),
(28, 23, 15, 1, '2022-08-29 20:22:25', '2022-08-29 20:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_lessons`
--

CREATE TABLE `user_lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_lessons`
--

INSERT INTO `user_lessons` (`id`, `user_id`, `lesson_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2021-11-14 22:12:22', '2021-11-16 22:11:38'),
(4, 4, 1, 1, '2021-11-14 22:12:27', '2021-11-14 22:12:27'),
(5, 4, 2, 1, '2021-11-14 22:12:27', '2021-11-14 22:12:27'),
(6, 4, 3, 1, '2021-11-14 22:12:27', '2021-11-14 22:12:27'),
(7, 2, 2, 1, '2021-11-16 22:10:39', '2021-11-16 22:10:39'),
(8, 2, 3, 1, '2021-11-16 22:10:39', '2021-11-16 22:10:39'),
(9, 2, 4, 1, '2021-11-16 22:19:17', '2021-11-16 22:19:17'),
(10, 2, 5, 1, '2022-01-22 22:34:03', '2022-01-22 22:34:03'),
(11, 6, 1, 1, '2022-01-30 23:14:09', '2022-01-30 23:14:09'),
(12, 6, 2, 1, '2022-01-30 23:14:09', '2022-01-30 23:14:09'),
(13, 6, 3, 1, '2022-01-30 23:14:09', '2022-01-30 23:14:09'),
(14, 6, 5, 1, '2022-01-30 23:14:09', '2022-01-30 23:14:09'),
(15, 7, 6, 1, '2022-07-04 20:33:06', '2022-07-04 20:33:06'),
(17, 2, 7, 1, '2022-08-03 10:02:39', '2022-08-03 10:02:39'),
(18, 2, 6, 1, '2022-08-15 06:13:42', '2022-08-15 06:13:42'),
(22, 13, 8, 1, '2022-08-21 09:43:02', '2022-08-21 09:43:02'),
(23, 17, 8, 1, '2022-08-22 17:49:39', '2022-08-22 17:49:39'),
(24, 18, 8, 1, '2022-08-22 17:57:26', '2022-08-22 17:57:26'),
(25, 19, 8, 1, '2022-08-27 00:48:11', '2022-08-27 00:48:11'),
(26, 20, 8, 1, '2022-08-27 09:53:25', '2022-08-27 09:53:25'),
(27, 22, 9, 1, '2022-08-29 21:03:23', '2022-08-29 21:03:23'),
(28, 23, 9, 1, '2022-08-29 21:03:23', '2022-08-29 21:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '1',
  `show` int(11) NOT NULL DEFAULT '1',
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name_ar`, `name_en`, `url`, `time`, `sort`, `show`, `lesson_id`, `created_at`, `updated_at`) VALUES
(1, 'الفيديو الاول', 'first video', 'uploads/izhdh0zvghgmpi7wlqje.mp4', 500, 1, 1, 1, '2021-11-14 21:57:45', '2021-11-14 21:57:45'),
(2, 'الفيديو 2', 'video 2', 'uploads/dps0p5ejpj0tluxiiksg.mp4', 500, 1, 1, 1, '2021-11-14 21:58:36', '2021-11-14 21:58:36'),
(3, 'الفيديو 3', 'video 2', 'img_1641374533.mp4', 500, 1, 1, 1, '2022-01-05 10:22:13', '2022-01-05 10:22:13'),
(4, 'فيديو الاحياء الاول', 'first video in ahiaa', 'img_1642016593.mp4', 500, 1, 1, 1, '2022-01-05 10:24:00', '2022-01-12 20:43:13'),
(5, 'فيديو الاحياء الاول', 'first video in ahiaa', 'img_1641655812.mp4', 500, 1, 1, 3, '2022-01-08 16:30:12', '2022-01-08 16:57:16'),
(6, 'فيديو تجريبي', 'فيديو تجريبي', 'img_1642881215.mp4', 500, 1, 1, 1, '2022-01-22 20:53:35', '2022-01-22 20:53:35'),
(7, 'فيديو تجريبي', 'فيديو تجريبي', 'img_1642881258.mp4', 500, 1, 1, 1, '2022-01-22 20:54:18', '2022-01-22 20:54:18'),
(8, 'فيديو تجريبي', 'فيديو تجريبي', 'img_1642881264.mp4', 500, 1, 1, 1, '2022-01-22 20:54:24', '2022-01-22 20:54:24'),
(9, 'band', 'shahs', '8484', 58, 1, 1, 4, '2022-08-29 20:37:19', '2022-08-29 20:37:19'),
(10, '….', '….', '___', 45, 1, 1, 9, '2022-08-29 21:03:54', '2022-08-29 21:03:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_lesson_id_foreign` (`lesson_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_course_id_foreign` (`course_id`);

--
-- Indexes for table `cart_helps`
--
ALTER TABLE `cart_helps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_helps_invoice_id_foreign` (`invoice_id`),
  ADD KEY `cart_helps_course_id_foreign` (`course_id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `colleges_university_id_foreign` (`university_id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `coupon_usages`
--
ALTER TABLE `coupon_usages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupon_usages_coupon_id_foreign` (`coupon_id`),
  ADD KEY `coupon_usages_user_id_foreign` (`user_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_level_id_foreign` (`level_id`),
  ADD KEY `courses_instructor_id_foreign` (`instructor_id`),
  ADD KEY `courses_currency_id_foreign` (`currency_id`),
  ADD KEY `courses_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `course_contents`
--
ALTER TABLE `course_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_contents_course_id_foreign` (`course_id`);

--
-- Indexes for table `course_installments`
--
ALTER TABLE `course_installments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_installments_course_id_foreign` (`course_id`),
  ADD KEY `course_installments_user_id_foreign` (`user_id`);

--
-- Indexes for table `course_rates`
--
ALTER TABLE `course_rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_rates_user_id_foreign` (`user_id`),
  ADD KEY `course_rates_course_id_foreign` (`course_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_course_id_foreign` (`course_id`);

--
-- Indexes for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_questions_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `exam_question_answers`
--
ALTER TABLE `exam_question_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_question_answers_exam_question_id_foreign` (`exam_question_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inboxes`
--
ALTER TABLE `inboxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inboxes_sender_id_foreign` (`sender_id`),
  ADD KEY `inboxes_receiver_id_foreign` (`receiver_id`),
  ADD KEY `inboxes_parent_id_foreign` (`parent_id`),
  ADD KEY `inboxes_assistant_id_foreign` (`assistant_id`);

--
-- Indexes for table `inbox_files`
--
ALTER TABLE `inbox_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inbox_files_inbox_id_foreign` (`inbox_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_user_id_foreign` (`user_id`),
  ADD KEY `invoices_offer_id_foreign` (`offer_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_course_id_foreign` (`course_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `levels_college_id_foreign` (`college_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_currency_id_foreign` (`currency_id`),
  ADD KEY `offers_level_id_foreign` (`level_id`);

--
-- Indexes for table `offer_courses`
--
ALTER TABLE `offer_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offer_courses_offer_id_foreign` (`offer_id`),
  ADD KEY `offer_courses_course_id_foreign` (`course_id`);

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
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizzes_lesson_id_foreign` (`lesson_id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_questions_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `quiz_question_answers`
--
ALTER TABLE `quiz_question_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_question_answers_quiz_question_id_foreign` (`quiz_question_id`);

--
-- Indexes for table `request_types`
--
ALTER TABLE `request_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_courses_user_id_foreign` (`user_id`),
  ADD KEY `user_courses_course_id_foreign` (`course_id`);

--
-- Indexes for table `user_lessons`
--
ALTER TABLE `user_lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_lessons_user_id_foreign` (`user_id`),
  ADD KEY `user_lessons_lesson_id_foreign` (`lesson_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_lesson_id_foreign` (`lesson_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `cart_helps`
--
ALTER TABLE `cart_helps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coupon_usages`
--
ALTER TABLE `coupon_usages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `course_contents`
--
ALTER TABLE `course_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_installments`
--
ALTER TABLE `course_installments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `course_rates`
--
ALTER TABLE `course_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_questions`
--
ALTER TABLE `exam_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam_question_answers`
--
ALTER TABLE `exam_question_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inboxes`
--
ALTER TABLE `inboxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inbox_files`
--
ALTER TABLE `inbox_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `offer_courses`
--
ALTER TABLE `offer_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz_question_answers`
--
ALTER TABLE `quiz_question_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `request_types`
--
ALTER TABLE `request_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_courses`
--
ALTER TABLE `user_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_lessons`
--
ALTER TABLE `user_lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_helps`
--
ALTER TABLE `cart_helps`
  ADD CONSTRAINT `cart_helps_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_helps_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `colleges`
--
ALTER TABLE `colleges`
  ADD CONSTRAINT `colleges_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`);

--
-- Constraints for table `coupon_usages`
--
ALTER TABLE `coupon_usages`
  ADD CONSTRAINT `coupon_usages_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupon_usages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `courses_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `courses_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`),
  ADD CONSTRAINT `courses_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `settings` (`id`);

--
-- Constraints for table `course_contents`
--
ALTER TABLE `course_contents`
  ADD CONSTRAINT `course_contents_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `course_installments`
--
ALTER TABLE `course_installments`
  ADD CONSTRAINT `course_installments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_installments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_rates`
--
ALTER TABLE `course_rates`
  ADD CONSTRAINT `course_rates_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `course_rates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD CONSTRAINT `exam_questions_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`);

--
-- Constraints for table `exam_question_answers`
--
ALTER TABLE `exam_question_answers`
  ADD CONSTRAINT `exam_question_answers_exam_question_id_foreign` FOREIGN KEY (`exam_question_id`) REFERENCES `exam_questions` (`id`);

--
-- Constraints for table `inboxes`
--
ALTER TABLE `inboxes`
  ADD CONSTRAINT `inboxes_assistant_id_foreign` FOREIGN KEY (`assistant_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `inboxes_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `inboxes` (`id`),
  ADD CONSTRAINT `inboxes_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `inboxes_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `inbox_files`
--
ALTER TABLE `inbox_files`
  ADD CONSTRAINT `inbox_files_inbox_id_foreign` FOREIGN KEY (`inbox_id`) REFERENCES `inboxes` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `levels`
--
ALTER TABLE `levels`
  ADD CONSTRAINT `levels_college_id_foreign` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`);

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `offers_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);

--
-- Constraints for table `offer_courses`
--
ALTER TABLE `offer_courses`
  ADD CONSTRAINT `offer_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `offer_courses_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`);

--
-- Constraints for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `quiz_questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`);

--
-- Constraints for table `quiz_question_answers`
--
ALTER TABLE `quiz_question_answers`
  ADD CONSTRAINT `quiz_question_answers_quiz_question_id_foreign` FOREIGN KEY (`quiz_question_id`) REFERENCES `quiz_questions` (`id`);

--
-- Constraints for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD CONSTRAINT `user_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `user_courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_lessons`
--
ALTER TABLE `user_lessons`
  ADD CONSTRAINT `user_lessons_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`),
  ADD CONSTRAINT `user_lessons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
