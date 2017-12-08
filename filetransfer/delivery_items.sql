-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2016 at 03:27 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravel_ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery_items`
--

CREATE TABLE IF NOT EXISTS `delivery_items` (
  `id` int(10) unsigned NOT NULL,
  `subscriber_id` int(11) NOT NULL,
  `delivery_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `received_qty` int(11) NOT NULL,
  `returns` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `delivery_items`
--

INSERT INTO `delivery_items` (`id`, `subscriber_id`, `delivery_id`, `product_id`, `qty`, `received_qty`, `returns`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 17, 5, 5, '0', '2016-10-19 01:47:22', '2016-10-19 01:47:42'),
(2, 1, '1', 6, 15, 15, '0', '2016-10-19 01:47:22', '2016-10-19 01:47:42'),
(3, 1, '1', 11, 25, 25, '0', '2016-10-19 01:47:22', '2016-10-19 01:47:42'),
(4, 1, '2', 20, 30, 20, '-10', '2016-10-19 03:37:25', '2016-10-19 04:03:48'),
(5, 1, '2', 13, 10, 0, '-1', '2016-10-19 03:37:25', '2016-10-19 04:03:48'),
(6, 1, '2', 4, 50, 0, '-1', '2016-10-19 03:37:25', '2016-10-19 04:03:48'),
(7, 1, '3', 1, 10, 0, '-1', '2016-10-20 02:43:28', '2016-10-20 06:45:35'),
(8, 1, '3', 2, 20, 0, '-1', '2016-10-20 02:43:28', '2016-10-20 06:45:35'),
(9, 1, '3', 4, 30, 0, '-1', '2016-10-20 02:43:28', '2016-10-20 06:45:35'),
(10, 1, '4', 1, 11, 11, '0', '2016-10-20 03:00:40', '2016-10-20 03:03:57'),
(11, 1, '4', 6, 13, 13, '0', '2016-10-20 03:00:40', '2016-10-20 03:03:57'),
(12, 1, '5', 1, 1, 100, 'Accepted', '2016-10-20 06:00:04', '2016-10-20 06:01:49'),
(13, 1, '6', 1, 25, 100, '75', '2016-10-20 06:00:09', '2016-10-20 06:19:51'),
(14, 1, '7', 17, 100, 100, '0', '2016-10-20 06:25:43', '2016-10-20 06:26:04'),
(15, 1, '8', 56, 100, 200, '100', '2016-10-20 06:27:48', '2016-10-20 06:32:43'),
(16, 1, '8', 55, 100, 200, '100', '2016-10-20 06:27:48', '2016-10-20 06:32:43'),
(17, 1, '9', 72, 100, 200, 'Accepted', '2016-10-20 06:39:23', '2016-10-20 06:39:30'),
(18, 1, '9', 73, 100, 200, '100', '2016-10-20 06:39:23', '2016-10-20 06:39:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery_items`
--
ALTER TABLE `delivery_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery_items`
--
ALTER TABLE `delivery_items`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
