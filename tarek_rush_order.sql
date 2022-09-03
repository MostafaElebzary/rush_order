-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 03:56 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tarek_rush_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'title arabic',
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'title english',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `title_ar`, `title_en`, `image`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'مطاعم', 'resturants', NULL, NULL, '2022-08-28 14:32:25', '2022-08-28 14:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `password`, `image`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '010101010101010', '$2y$10$px.63KAe6xdfl.Z4xouGI.JpCeda0urp4MabbixWrlBQxZFTeTlki', NULL, 1, NULL, '2022-08-28 14:32:25', '2022-08-28 14:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint(20) DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `company_id`, `lat`, `lng`, `city_id`, `title_ar`, `title_en`, `delivery_time`, `created_at`, `updated_at`) VALUES
(1, 1, '18.1725', '11.1851', 1, 'branch 1', 'branch 1', '30-60', '2022-08-28 14:32:25', '2022-08-28 14:32:25'),
(2, 1, '35.1725', '18.1851', 1, 'branch 2', 'branch 2', '30-60', '2022-08-28 14:32:25', '2022-08-28 14:32:25'),
(3, 1, '25.1725', '38.1851', 1, 'branch 3', 'branch 3', '30-60', '2022-08-28 14:32:25', '2022-08-28 14:32:25'),
(4, 2, '18.1725', '11.1851', 1, 'branch 1', 'branch 1', '30-60', '2022-08-28 14:32:25', '2022-08-28 14:32:25'),
(5, 2, '35.1725', '18.1851', 1, 'branch 2', 'branch 2', '30-60', '2022-08-28 14:32:26', '2022-08-28 14:32:26'),
(6, 2, '25.1725', '38.1851', 1, 'branch 3', 'branch 3', '30-60', '2022-08-28 14:32:26', '2022-08-28 14:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` bigint(20) NOT NULL DEFAULT 1,
  `attributes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`attributes`)),
  `additions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additions`)),
  `drinks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`drinks`)),
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `nameEn` varchar(32) NOT NULL,
  `provinceId` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='SA cities';

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `title`, `nameEn`, `provinceId`, `is_active`) VALUES
(1, 'تبوك', 'Tabuk', 3, 1),
(3, 'الرياض', 'Riyadh', 6, 1),
(5, 'الطائف', 'At Taif', 11, 1),
(6, 'مكة المكرمة', 'Makkah Al Mukarramah', 11, 1),
(10, 'حائل', 'Hail', 4, 1),
(11, 'بريدة', 'Buraydah', 5, 1),
(12, 'الهفوف', 'Al Hufuf', 13, 1),
(13, 'الدمام', 'Ad Dammam', 13, 1),
(14, 'المدينة المنورة', 'Al Madinah Al Munawwarah', 7, 1),
(15, 'ابها', 'Abha', 8, 1),
(17, 'جازان', 'Jazan', 10, 1),
(18, 'جدة', 'Jeddah', 11, 1),
(24, 'المجمعة', 'Al Majmaah', 6, 1),
(31, 'الخبر', 'Al Khubar', 13, 1),
(47, 'حفر الباطن', 'Hafar Al Batin', 13, 1),
(62, 'خميس مشيط', 'Khamis Mushayt', 8, 1),
(65, 'احد رفيده', 'Ahad Rifaydah', 8, 1),
(67, 'القطيف', 'Al Qatif', 13, 1),
(80, 'عنيزة', 'Unayzah', 5, 1),
(89, 'قرية العليا', 'Qaryat Al Ulya', 13, 1),
(113, 'الجبيل', 'Al Jubail', 13, 1),
(115, 'النعيرية', 'An Nuayriyah', 13, 1),
(227, 'الظهران', 'Dhahran', 13, 1),
(233, 'الوجه', 'Al Wajh', 3, 1),
(243, 'بقيق', 'Buqayq', 13, 1),
(270, 'الزلفي', 'Az Zulfi', 6, 1),
(288, 'خيبر', 'Khaybar', 7, 1),
(306, 'الغاط', 'Al Ghat', 6, 1),
(323, 'املج', 'Umluj', 3, 1),
(377, 'رابغ', 'Rabigh', 11, 1),
(418, 'عفيف', 'Afif', 6, 1),
(443, 'ثادق', 'Thadiq', 6, 1),
(454, 'سيهات', 'Sayhat', 13, 1),
(456, 'تاروت', 'Tarut', 13, 1),
(483, 'ينبع', 'Yanbu', 7, 1),
(500, 'شقراء', 'Shaqra', 6, 1),
(669, 'الدوادمي', 'Ad Duwadimi', 6, 1),
(828, 'الدرعية', 'Ad Diriyah', 6, 1),
(880, 'القويعية', 'Quwayiyah', 6, 1),
(990, 'المزاحمية', 'Al Muzahimiyah', 6, 1),
(1053, 'بدر', 'Badr', 7, 1),
(1061, 'الخرج', 'Al Kharj', 6, 1),
(1073, 'الدلم', 'Ad Dilam', 6, 1),
(1228, 'الشنان', 'Ash Shinan', 4, 1),
(1248, 'الخرمة', 'Al Khurmah', 11, 1),
(1257, 'الجموم', 'Al Jumum', 11, 1),
(1294, 'المجاردة', 'Al Majardah', 8, 1),
(1361, 'السليل', 'As Sulayyil', 6, 1),
(1443, 'تثليث', 'Tathilith', 8, 1),
(1514, 'بيشة', 'Bishah', 8, 1),
(1542, 'الباحة', 'Al Baha', 9, 1),
(1625, 'القنفذة', 'Al Qunfidhah', 11, 1),
(1801, 'محايل', 'Muhayil', 8, 1),
(1879, 'ثول', 'Thuwal', 11, 1),
(1947, 'ضبا', 'Duba', 3, 1),
(2156, 'تربه', 'Turbah', 11, 1),
(2167, 'صفوى', 'Safwa', 13, 1),
(2171, 'عنك', 'Inak', 13, 1),
(2208, 'طريف', 'Turaif', 1, 1),
(2213, 'عرعر', 'Arar', 1, 1),
(2226, 'القريات', 'Al Qurayyat', 2, 1),
(2237, 'سكاكا', 'Sakaka', 2, 1),
(2256, 'رفحاء', 'Rafha', 1, 1),
(2268, 'دومة الجندل', 'Dawmat Al Jandal', 2, 1),
(2421, 'الرس', 'Ar Rass', 5, 1),
(2448, 'المذنب', 'Al Midhnab', 5, 1),
(2464, 'الخفجي', 'Al Khafji', 13, 1),
(2467, 'رياض الخبراء', 'Riyad Al Khabra', 5, 1),
(2481, 'البدائع', 'Al Badai', 5, 1),
(2590, 'رأس تنورة', 'Ras Tannurah', 13, 1),
(2630, 'البكيرية', 'Al Bukayriyah', 5, 1),
(2777, 'الشماسية', 'Ash Shimasiyah', 5, 1),
(3158, 'الحريق', 'Al Hariq', 6, 1),
(3161, 'حوطة بني تميم', 'Hawtat Bani Tamim', 6, 1),
(3174, 'ليلى', 'Layla', 6, 1),
(3275, 'بللسمر', 'Billasmar', 8, 1),
(3347, 'شرورة', 'Sharurah', 12, 1),
(3417, 'نجران', 'Najran', 12, 1),
(3479, 'صبيا', 'Sabya', 10, 1),
(3525, 'ابو عريش', 'Abu Arish', 10, 1),
(3542, 'صامطة', 'Samtah', 10, 1),
(3652, 'احد المسارحة', 'Ahad Al Musarihah', 10, 1),
(3666, 'مدينة الملك عبدالله الاقتصادية', 'King Abdullah Economic City', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('Manager','Employee') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Manager',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `image`, `email`, `phone`, `address`, `is_active`, `company_id`, `branch_id`, `type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'العمل الاول', NULL, 'admin1@admin.com', '12345167890', 'https://firebase.google.com/docs/reference/unity/class/firebase/messaging/firebase-notification', 1, 4, NULL, 'Manager', NULL, '$2y$10$q1xtI0wcUv3ojbF05eI50.yyAYrihnjmDjzHpmS8mDWxnemmxQSEq', NULL, '2022-08-29 14:31:23', '2022-08-29 14:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity_id` bigint(20) UNSIGNED DEFAULT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ceo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ceo_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commercial_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branches_count` bigint(20) NOT NULL DEFAULT 0,
  `maroof_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `expire_date` date DEFAULT NULL,
  `delivery_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `title_ar`, `title_en`, `logo`, `banner`, `location`, `phone1`, `phone2`, `email1`, `email2`, `activity_id`, `owner_name`, `owner_phone`, `ceo_name`, `ceo_phone`, `commercial_file`, `branches_count`, `maroof_id`, `lat`, `lng`, `is_active`, `expire_date`, `delivery_price`, `created_at`, `updated_at`) VALUES
(1, 'شركة 1', 'company 1', NULL, NULL, 'www.googlemap.com', '0101010101010', '0151515151515', 'c1@gmail.com', 'c1@gmail.com', 1, 'owner', '010101010', 'ceo', '01010', NULL, 0, NULL, '18.1725', '10.1851', 1, '2022-09-01', '15.3', '2022-08-28 14:32:25', '2022-08-28 14:32:25'),
(2, 'شركة 2', 'company 2', NULL, NULL, 'www.googlemap2.com', '01022220101010', '01512215151515', 'c2@gmail.com', 'c2@gmail.com', 1, 'owner2', '01010102210', 'ceo2', '0101220', NULL, 2, NULL, '18.1725', '11.1851', 1, '2022-09-01', '15.3', '2022-08-28 14:32:25', '2022-08-28 14:32:25'),
(3, 'شركة 3', 'company 3', NULL, NULL, 'www.googlemap3.com', '01022220333330', '01512215131515', 'c23@gmail.com', 'c23@gmail.com', 1, 'owner23', '010101302210', 'ceo32', '01013220', NULL, 3, NULL, '18.1725', '11.1851', 1, '2022-09-01', '15.3', '2022-08-28 14:32:25', '2022-08-28 14:32:25'),
(4, 'العمل الاول', 'work 1 for company', '1661779882630cbfaae5f4b.png', '1661779882630cbfaae6680.png', 'https://firebase.google.com/docs/reference/unity/class/firebase/messaging/firebase-notification', '12345167890', '05123145678', 'admin1@admin.com', 'tarek.asasas@gmail.com', 1, 'sdsdsdsdsd', '012342567890', 'sasasa', '+966515975312', '1661779882630cbfaae6bfa.pdf', 0, '111', '24.45578754088895', '39.57890924480366', 1, '2022-08-29', '11', '2022-08-29 14:31:22', '2022-08-29 14:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `company_categories`
--

CREATE TABLE `company_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_categories`
--

INSERT INTO `company_categories` (`id`, `title_ar`, `title_en`, `image`, `company_id`, `created_at`, `updated_at`) VALUES
(3, 'العمل الاول', 'work 1 for company', '1661695875630b7783dff29.png', 1, '2022-08-28 15:11:15', '2022-08-28 15:11:15'),
(4, 'العمل الاول', 'work 1 for company', '1661695875630b7783dff29.png', 1, '2022-08-28 15:11:15', '2022-08-28 15:11:15'),
(5, 'العمل الاول', 'work 1 for company', '1661695875630b7783dff29.png', 1, '2022-08-28 15:11:15', '2022-08-28 15:11:15'),
(6, 'العمل الاول', 'work 1 for company', '1661695875630b7783dff29.png', 1, '2022-08-28 15:11:15', '2022-08-28 15:11:15'),
(7, 'العمل الاول', 'work 1 for company', '1661695875630b7783dff29.png', 1, '2022-08-28 15:11:15', '2022-08-28 15:11:15'),
(8, 'العمل الاول', 'work 1 for company', '1661695875630b7783dff29.png', 1, '2022-08-28 15:11:15', '2022-08-28 15:11:15'),
(9, 'العمل الاول', 'work 1 for company', '1661695875630b7783dff29.png', 1, '2022-08-28 15:11:15', '2022-08-28 15:11:15'),
(10, 'العمل الاول', 'work 1 for company', '1661695875630b7783dff29.png', 1, '2022-08-28 15:11:15', '2022-08-28 15:11:15'),
(11, 'العمل الاول', 'work 1 for company', '1661695875630b7783dff29.png', 1, '2022-08-28 15:11:15', '2022-08-28 15:11:15'),
(12, 'العمل الاول', 'work 1 for company', '1661695875630b7783dff29.png', 1, '2022-08-28 15:11:15', '2022-08-28 15:11:15'),
(13, 'العمل الاول', 'work 1 for company', '1661695875630b7783dff29.png', 1, '2022-08-28 15:11:15', '2022-08-28 15:11:15'),
(14, 'العمل الاول', 'work 1 for company', '1661695875630b7783dff29.png', 1, '2022-08-28 15:11:15', '2022-08-28 15:11:15'),
(15, 'العمل الاول', 'work 1 for company', '1661695875630b7783dff29.png', 1, '2022-08-28 15:11:15', '2022-08-28 15:11:15'),
(16, 'العمل الاول', 'work 1 for company', '1661695875630b7783dff29.png', 1, '2022-08-28 15:11:15', '2022-08-28 15:11:15'),
(17, 'العمل الاول', 'work 1 for company', '1661695875630b7783dff29.png', 1, '2022-08-28 15:11:15', '2022-08-28 15:11:15'),
(18, 'العمل الاول', 'work 1 for company', '1661695875630b7783dff29.png', 1, '2022-08-28 15:11:15', '2022-08-28 15:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `company_products`
--

CREATE TABLE `company_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `company_category_id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ar` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preparation_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`attributes`)),
  `additions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additions`)),
  `drinks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`drinks`)),
  `type` enum('Normal','Bundle') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Normal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_products`
--

INSERT INTO `company_products` (`id`, `company_id`, `company_category_id`, `title_ar`, `title_en`, `content_ar`, `content_en`, `price`, `image`, `preparation_time`, `attributes`, `additions`, `drinks`, `type`, `created_at`, `updated_at`) VALUES
(3, 1, 6, 'العمل الاول', 'المطعم', '<p>فثسف</p>', '<p>فثفثف</p>', 150, '1661797070630d02ce811b9.png', '15 دقيقه', '[{\"attribute_name_ar\":\"\\u0627\\u0644\\u062d\\u062c\\u0645\",\"attribute_name_en\":\"size\",\"attribute_option_ar\":\"\\u0635\\u063a\\u064a\\u0631\",\"attribute_option_en\":\"small\",\"attribute_price\":\"15\"}]', '[{\"addittion_name_ar\":\"\\u062c\\u0628\\u0646\\u0629\",\"addittion_name_en\":\"cheese\",\"addittion_price\":\"15\"}]', '[{\"drink_name_ar\":\"cola\",\"drink_name_en\":\"\\u0643\\u0648\\u0644\\u0627\",\"drink_price\":\"10\"}]', 'Normal', '2022-08-29 19:17:50', '2022-08-29 19:17:50'),
(4, 1, 6, 'العمل hgeee', 'erererer', '<p>فثسف</p>', '<p>فثفثف</p>', 150, '1661797070630d02ce811b9.png', '15 دقيقه', '[{\"attribute_name_ar\":\"\\u0627\\u0644\\u062d\\u062c\\u0645\",\"attribute_name_en\":\"size\",\"attribute_option_ar\":\"\\u0635\\u063a\\u064a\\u0631\",\"attribute_option_en\":\"small\",\"attribute_price\":\"15\"}]', '[{\"addittion_name_ar\":\"\\u062c\\u0628\\u0646\\u0629\",\"addittion_name_en\":\"cheese\",\"addittion_price\":\"15\"}]', '[{\"drink_name_ar\":\"cola\",\"drink_name_en\":\"\\u0643\\u0648\\u0644\\u0627\",\"drink_price\":\"10\"}]', 'Normal', '2022-08-29 19:17:50', '2022-08-29 19:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `company_rates`
--

CREATE TABLE `company_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_sub_activities`
--

CREATE TABLE `company_sub_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `activity_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_users`
--

CREATE TABLE `company_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_work_times`
--

CREATE TABLE `company_work_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0->complain 1->suggestion',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `copouns`
--

CREATE TABLE `copouns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `amount` double NOT NULL,
  `discount_type` enum('Ratio','Amount') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Amount',
  `active` int(11) NOT NULL DEFAULT 1,
  `usage_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `copouns`
--

INSERT INTO `copouns` (`id`, `code`, `from_date`, `to_date`, `amount`, `discount_type`, `active`, `usage_count`, `created_at`, `updated_at`) VALUES
(1, 'rush60', '2022-08-01', '2022-09-01', 60, 'Ratio', 1, 0, '2022-08-28 14:32:26', '2022-08-28 14:32:26');

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
(5, '2022_08_07_095219_create_activities_table', 1),
(6, '2022_08_07_133028_create_user_addresses_table', 1),
(7, '2022_08_07_134031_create_companies_table', 1),
(8, '2022_08_07_143031_create_notifications_table', 1),
(9, '2022_08_07_150556_create_company_rates_table', 1),
(10, '2022_08_07_151514_create_company_work_times_table', 1),
(11, '2022_08_07_152713_create_company_categories_table', 1),
(12, '2022_08_07_154233_create_company_products_table', 1),
(13, '2022_08_07_163937_create_states_table', 1),
(14, '2022_08_07_163954_create_cities_table', 1),
(15, '2022_08_07_164255_create_sliders_table', 1),
(16, '2022_08_07_164822_create_pages_table', 1),
(17, '2022_08_07_165822_create_contacts_table', 1),
(18, '2022_08_07_170341_create_admins_table', 1),
(19, '2022_08_07_171357_create_company_sub_activities_table', 1),
(20, '2022_08_07_172526_create_branches_table', 1),
(21, '2022_08_07_173349_create_clients_table', 1),
(22, '2022_08_07_173448_create_carts_table', 1),
(23, '2022_08_08_123424_create_orders_table', 1),
(24, '2022_08_08_124828_create_order_products_table', 1),
(25, '2022_08_19_002939_create_copouns_table', 1),
(26, '2022_08_20_173227_create_settings_table', 1),
(27, '2022_08_23_235754_update_contact_types', 1),
(28, '2022_08_28_003503_create_company_users_table', 1),
(29, '2023_08_024_160039_create_wallets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_type` enum('Cash','Online') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Cash',
  `delivery_price` double NOT NULL DEFAULT 0,
  `order_price` double NOT NULL,
  `total_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0->pending , 1->accepted , 2->processing , 3->delivered , 4->cancelled',
  `deliver_type` enum('Delivery','OnSite','ByCar') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Delivery',
  `car_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `company_id`, `user_name`, `user_state`, `user_city`, `user_address`, `user_address_id`, `payment_type`, `delivery_price`, `order_price`, `total_price`, `status`, `deliver_type`, `car_type`, `car_color`, `car_num`, `car_notes`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'mohamed 1  ahmed 1', NULL, NULL, 'testr', 1, 'Cash', 15.3, 437, 452.3, 4, 'Delivery', NULL, NULL, NULL, NULL, '2022-09-29 19:19:13', '2022-08-29 19:19:13'),
(2, 1, 4, 'mohamed 1  ahmed 1', NULL, NULL, 'testr', 1, 'Cash', 15.3, 874, 889.3, 4, 'ByCar', 'BMW', 'black', '0555', NULL, '2022-09-29 19:20:13', '2022-08-29 19:20:13'),
(3, 1, 4, 'mohamed 1  ahmed 1', NULL, NULL, 'testr', 1, 'Cash', 15.3, 437, 452.3, 0, 'Delivery', NULL, NULL, NULL, NULL, '2022-09-29 19:19:13', '2022-08-29 19:19:13'),
(4, 1, 4, 'mohamed 1  ahmed 1', NULL, NULL, 'testr', 1, 'Cash', 15.3, 874, 889.3, 0, 'ByCar', 'BMW', 'black', '0555', NULL, '2022-09-29 19:20:13', '2022-08-29 19:20:13'),
(5, 1, 4, 'mohamed 1  ahmed 1', NULL, NULL, 'testr', 1, 'Cash', 15.3, 437, 452.3, 0, 'Delivery', NULL, NULL, NULL, NULL, '2022-09-29 19:19:13', '2022-08-29 19:19:13'),
(6, 1, 4, 'mohamed 1  ahmed 1', NULL, NULL, 'testr', 1, 'Cash', 15.3, 874, 889.3, 0, 'ByCar', 'BMW', 'black', '0555', NULL, '2022-09-29 19:20:13', '2022-08-29 19:20:13'),
(7, 1, 4, 'mohamed 1  ahmed 1', NULL, NULL, 'testr', 1, 'Cash', 15.3, 437, 452.3, 0, 'Delivery', NULL, NULL, NULL, NULL, '2022-09-29 19:19:13', '2022-08-29 19:19:13'),
(8, 1, 4, 'mohamed 1  ahmed 1', NULL, NULL, 'testr', 1, 'Cash', 15.3, 874, 889.3, 0, 'ByCar', 'BMW', 'black', '0555', NULL, '2022-09-29 19:20:13', '2022-08-29 19:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `company_product_id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `attributes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`attributes`)),
  `additions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`additions`)),
  `drinks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`drinks`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `company_product_id`, `price`, `qty`, `attributes`, `additions`, `drinks`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 190, 1, '[{\"attribute_name_ar\":\"\\u0627\\u0644\\u062d\\u062c\\u0645\",\"attribute_name_en\":\"size\",\"attribute_option_ar\":\"\\u0635\\u063a\\u064a\\u0631\",\"attribute_option_en\":\"small\",\"attribute_price\":\"15\"}]', '[{\"addittion_name_ar\":\"\\u062c\\u0628\\u0646\\u0629\",\"addittion_name_en\":\"cheese\",\"addittion_price\":\"15\"},{\"addittion_name_ar\":\"\\u062c\\u0628\\u0646\\u0629\",\"addittion_name_en\":\"cheese\",\"addittion_price\":\"15\"}]', '[{\"drink_name_ar\":\"cola\",\"drink_name_en\":\"\\u0643\\u0648\\u0644\\u0627\",\"drink_price\":\"10\"}]', '2022-08-29 19:19:13', '2022-08-29 19:19:13'),
(2, 1, 4, 190, 1, '[{\"attribute_name_ar\":\"\\u0627\\u0644\\u062d\\u062c\\u0645\",\"attribute_name_en\":\"size\",\"attribute_option_ar\":\"\\u0635\\u063a\\u064a\\u0631\",\"attribute_option_en\":\"small\",\"attribute_price\":\"15\"}]', '[{\"addittion_name_ar\":\"\\u062c\\u0628\\u0646\\u0629\",\"addittion_name_en\":\"cheese\",\"addittion_price\":\"15\"},{\"addittion_name_ar\":\"\\u062c\\u0628\\u0646\\u0629\",\"addittion_name_en\":\"cheese\",\"addittion_price\":\"15\"}]', '[{\"drink_name_ar\":\"cola\",\"drink_name_en\":\"\\u0643\\u0648\\u0644\\u0627\",\"drink_price\":\"10\"}]', '2022-08-29 19:19:13', '2022-08-29 19:19:13'),
(3, 2, 4, 190, 1, '[{\"attribute_name_ar\":\"\\u0627\\u0644\\u062d\\u062c\\u0645\",\"attribute_name_en\":\"size\",\"attribute_option_ar\":\"\\u0635\\u063a\\u064a\\u0631\",\"attribute_option_en\":\"small\",\"attribute_price\":\"15\"}]', '[{\"addittion_name_ar\":\"\\u062c\\u0628\\u0646\\u0629\",\"addittion_name_en\":\"cheese\",\"addittion_price\":\"15\"},{\"addittion_name_ar\":\"\\u062c\\u0628\\u0646\\u0629\",\"addittion_name_en\":\"cheese\",\"addittion_price\":\"15\"}]', '[{\"drink_name_ar\":\"cola\",\"drink_name_en\":\"\\u0643\\u0648\\u0644\\u0627\",\"drink_price\":\"10\"}]', '2022-08-29 19:20:13', '2022-08-29 19:20:13'),
(4, 2, 4, 190, 1, '[{\"attribute_name_ar\":\"\\u0627\\u0644\\u062d\\u062c\\u0645\",\"attribute_name_en\":\"size\",\"attribute_option_ar\":\"\\u0635\\u063a\\u064a\\u0631\",\"attribute_option_en\":\"small\",\"attribute_price\":\"15\"}]', '[{\"addittion_name_ar\":\"\\u062c\\u0628\\u0646\\u0629\",\"addittion_name_en\":\"cheese\",\"addittion_price\":\"15\"},{\"addittion_name_ar\":\"\\u062c\\u0628\\u0646\\u0629\",\"addittion_name_en\":\"cheese\",\"addittion_price\":\"15\"}]', '[{\"drink_name_ar\":\"cola\",\"drink_name_en\":\"\\u0643\\u0648\\u0644\\u0627\",\"drink_price\":\"10\"}]', '2022-08-29 19:20:13', '2022-08-29 19:20:13'),
(5, 2, 3, 190, 1, '[{\"attribute_name_ar\":\"\\u0627\\u0644\\u062d\\u062c\\u0645\",\"attribute_name_en\":\"size\",\"attribute_option_ar\":\"\\u0635\\u063a\\u064a\\u0631\",\"attribute_option_en\":\"small\",\"attribute_price\":\"15\"}]', '[{\"addittion_name_ar\":\"\\u062c\\u0628\\u0646\\u0629\",\"addittion_name_en\":\"cheese\",\"addittion_price\":\"15\"},{\"addittion_name_ar\":\"\\u062c\\u0628\\u0646\\u0629\",\"addittion_name_en\":\"cheese\",\"addittion_price\":\"15\"}]', '[{\"drink_name_ar\":\"cola\",\"drink_name_en\":\"\\u0643\\u0648\\u0644\\u0627\",\"drink_price\":\"10\"}]', '2022-08-29 19:20:13', '2022-08-29 19:20:13'),
(6, 2, 3, 190, 1, '[{\"attribute_name_ar\":\"\\u0627\\u0644\\u062d\\u062c\\u0645\",\"attribute_name_en\":\"size\",\"attribute_option_ar\":\"\\u0635\\u063a\\u064a\\u0631\",\"attribute_option_en\":\"small\",\"attribute_price\":\"15\"}]', '[{\"addittion_name_ar\":\"\\u062c\\u0628\\u0646\\u0629\",\"addittion_name_en\":\"cheese\",\"addittion_price\":\"15\"},{\"addittion_name_ar\":\"\\u062c\\u0628\\u0646\\u0629\",\"addittion_name_en\":\"cheese\",\"addittion_price\":\"15\"}]', '[{\"drink_name_ar\":\"cola\",\"drink_name_en\":\"\\u0643\\u0648\\u0644\\u0627\",\"drink_price\":\"10\"}]', '2022-08-29 19:20:13', '2022-08-29 19:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `nameEn` varchar(64) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='SA provinces';

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `title`, `nameEn`, `is_active`) VALUES
(1, ' الحدود الشمالية', 'Northern Frontier ', 1),
(2, ' الجوف', 'Al Jawf ', 1),
(3, ' تبوك', 'Tabuk ', 1),
(4, ' حائل', 'Hail ', 1),
(5, ' القصيم', 'Al Qassim ', 1),
(6, ' الرياض', 'Ar Riyadh ', 1),
(7, ' المدينة المنورة', 'Al Madinah Al Munawwarah ', 1),
(8, ' عسير', 'Asir ', 1),
(9, ' الباحة', 'Al Baha ', 1),
(10, ' جازان', 'Jazan ', 1),
(11, ' مكة المكرمة', 'Makkah Al Mukarramah ', 1),
(12, ' نجران', 'Najran ', 1),
(13, 'الشرقية', 'Eastern ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `file`, `created_at`, `updated_at`) VALUES
(1, 'aboutus_ar', 'aboutus_ar', NULL, '2022-08-28 14:32:26', '2022-08-28 14:32:26'),
(2, 'aboutus_en', 'aboutus_en', NULL, '2022-08-28 14:32:26', '2022-08-28 14:32:26'),
(3, 'email', 'email@email.com', NULL, '2022-08-28 14:32:26', '2022-08-28 14:32:26'),
(4, 'phone', '966505505050', NULL, '2022-08-28 14:32:26', '2022-08-28 14:32:26'),
(5, 'whatsapp', '966505509090', NULL, '2022-08-28 14:32:26', '2022-08-28 14:32:26'),
(6, 'facebook', 'www.facebook.com/rush-order', NULL, '2022-08-28 14:32:26', '2022-08-28 14:32:26'),
(7, 'twiter', 'www.twitter.com/rush-order', NULL, '2022-08-28 14:32:26', '2022-08-28 14:32:26'),
(8, 'instagram', 'www.instagram.com/rush-order', NULL, '2022-08-28 14:32:26', '2022-08-28 14:32:26'),
(9, 'privacy', 'privacy', NULL, '2022-08-28 14:32:26', '2022-08-28 14:32:26'),
(10, 'terms', 'terms', NULL, '2022-08-28 14:32:26', '2022-08-28 14:32:26'),
(11, 'tax', '15', NULL, '2022-09-03 14:48:34', '2022-09-03 14:48:34'),
(12, 'payment_percent', '3', NULL, '2022-09-03 14:48:34', '2022-09-03 14:48:34'),
(13, 'app_percent', '5', NULL, '2022-09-03 14:48:34', '2022-09-03 14:48:34'),
(15, 'logo', '<p>1.png</p>', '166221307363135bd16e34e.png', '2022-09-03 14:50:32', '2022-09-03 14:51:13'),
(18, 'fav', '<p>fav</p>', '166221326763135c932348e.png', '2022-09-03 14:54:27', '2022-09-03 14:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcm_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jwt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 notActive & 1 is active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `image`, `email`, `phone`, `email_verified_at`, `password`, `fcm_token`, `jwt`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mohamed 1', 'ahmed 1', NULL, 'mo2@gmail.com', '966123456789', NULL, '$2y$10$ijDNBsKgjWxZ4R9xBCRXweQ5.3w8erab9tXeV4pg070fYPgjAUR/e', NULL, 'WZHP2FrjEGgsxiI7zXImwSognR4l3BFjtalygCocRpDXDLTMljR6sRcIEPQM', 1, NULL, '2022-08-29 19:16:20', '2022-08-29 19:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 notDefault & 1 is default',
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `address`, `description`, `is_default`, `lat`, `lng`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'testr', 'tewdsaf', 1, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `type` enum('withdrawal','deposit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `price`, `type`, `company_id`, `order_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 1500, 'withdrawal', 4, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branches_company_id_foreign` (`company_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_company_id_foreign` (`company_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `provinceId` (`provinceId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`),
  ADD UNIQUE KEY `clients_phone_unique` (`phone`),
  ADD KEY `clients_company_id_foreign` (`company_id`),
  ADD KEY `clients_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_activity_id_foreign` (`activity_id`);

--
-- Indexes for table `company_categories`
--
ALTER TABLE `company_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_categories_company_id_foreign` (`company_id`);

--
-- Indexes for table `company_products`
--
ALTER TABLE `company_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_products_company_id_foreign` (`company_id`),
  ADD KEY `company_products_company_category_id_foreign` (`company_category_id`);

--
-- Indexes for table `company_rates`
--
ALTER TABLE `company_rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_rates_company_id_foreign` (`company_id`),
  ADD KEY `company_rates_user_id_foreign` (`user_id`);

--
-- Indexes for table `company_sub_activities`
--
ALTER TABLE `company_sub_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_sub_activities_company_id_foreign` (`company_id`),
  ADD KEY `company_sub_activities_activity_id_foreign` (`activity_id`);

--
-- Indexes for table `company_users`
--
ALTER TABLE `company_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_users_phone_unique` (`phone`),
  ADD UNIQUE KEY `company_users_email_unique` (`email`),
  ADD KEY `company_users_company_id_foreign` (`company_id`);

--
-- Indexes for table `company_work_times`
--
ALTER TABLE `company_work_times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_work_times_company_id_foreign` (`company_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `copouns`
--
ALTER TABLE `copouns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `copouns_code_unique` (`code`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_company_id_foreign` (`company_id`),
  ADD KEY `orders_user_address_id_foreign` (`user_address_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`),
  ADD KEY `order_products_company_product_id_foreign` (`company_product_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
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
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallets_company_id_foreign` (`company_id`),
  ADD KEY `wallets_order_id_foreign` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_categories`
--
ALTER TABLE `company_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `company_products`
--
ALTER TABLE `company_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_rates`
--
ALTER TABLE `company_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_sub_activities`
--
ALTER TABLE `company_sub_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_users`
--
ALTER TABLE `company_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_work_times`
--
ALTER TABLE `company_work_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `copouns`
--
ALTER TABLE `copouns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `company_products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clients_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_categories`
--
ALTER TABLE `company_categories`
  ADD CONSTRAINT `company_categories_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_products`
--
ALTER TABLE `company_products`
  ADD CONSTRAINT `company_products_company_category_id_foreign` FOREIGN KEY (`company_category_id`) REFERENCES `company_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_products_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_rates`
--
ALTER TABLE `company_rates`
  ADD CONSTRAINT `company_rates_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_rates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `company_sub_activities`
--
ALTER TABLE `company_sub_activities`
  ADD CONSTRAINT `company_sub_activities_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_sub_activities_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_users`
--
ALTER TABLE `company_users`
  ADD CONSTRAINT `company_users_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_work_times`
--
ALTER TABLE `company_work_times`
  ADD CONSTRAINT `company_work_times_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_address_id_foreign` FOREIGN KEY (`user_address_id`) REFERENCES `user_addresses` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_company_product_id_foreign` FOREIGN KEY (`company_product_id`) REFERENCES `company_products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `user_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `wallets_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
