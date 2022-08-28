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
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `nameEn` varchar(64) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1'
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
