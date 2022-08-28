-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2022 at 11:25 PM
-- Server version: 5.7.38-log
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demof4hc_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `nameEn` varchar(32) NOT NULL,
  `provinceId` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1'
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `provinceId` (`provinceId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
