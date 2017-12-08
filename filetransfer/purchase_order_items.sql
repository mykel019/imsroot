-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2016 at 03:28 AM
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
-- Table structure for table `purchase_order_items`
--

CREATE TABLE IF NOT EXISTS `purchase_order_items` (
  `id` int(10) unsigned NOT NULL,
  `subscriber_id` int(11) NOT NULL,
  `purchase_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `qty_received` int(11) NOT NULL,
  `returns` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-1',
  `cost` float NOT NULL,
  `discount` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `purchase_order_items`
--

INSERT INTO `purchase_order_items` (`id`, `subscriber_id`, `purchase_order_id`, `product_id`, `qty`, `qty_received`, `returns`, `cost`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 10, 15, 'Accepted', 100, 0, '2016-10-19 01:46:35', '2016-10-19 01:47:52'),
(2, 1, 1, 2, 20, 20, '0', 100, 0, '2016-10-19 01:46:35', '2016-10-19 01:47:52'),
(3, 1, 2, 5, 10, 10, '0', 100, 0, '2016-10-19 03:03:18', '2016-10-19 03:03:52'),
(4, 1, 2, 4, 100, 101, '0', 100, 0, '2016-10-19 03:03:18', '2016-10-19 03:03:52'),
(5, 1, 2, 1, 100, 110, '0', 100, 0, '2016-10-19 03:03:18', '2016-10-19 03:03:52'),
(6, 1, 3, 1, 10, 10, '0', 100, 0, '2016-10-19 07:36:11', '2016-10-19 07:36:19'),
(7, 1, 3, 2, 20, 20, '0', 100, 0, '2016-10-19 07:36:11', '2016-10-19 07:36:19'),
(8, 1, 4, 27, 30, 30, '0', 200, 0, '2016-10-19 09:35:16', '2016-10-19 09:35:24'),
(9, 1, 4, 30, 10, 11, '1', 200, 0, '2016-10-19 09:35:16', '2016-10-19 09:35:24'),
(10, 1, 5, 2, 10, 0, '-1', 100, 0, '2016-10-20 02:36:01', '2016-10-20 02:36:16'),
(11, 1, 5, 5, 10, 0, '-1', 100, 0, '2016-10-20 02:36:01', '2016-10-20 02:36:16'),
(12, 1, 6, 8, 10, 0, '-1', 100, 0, '2016-10-20 02:42:51', '2016-10-20 02:42:51'),
(13, 1, 6, 5, 20, 0, '-1', 100, 0, '2016-10-20 02:42:51', '2016-10-20 02:42:51'),
(14, 1, 6, 1, 30, 0, '-1', 100, 0, '2016-10-20 02:42:51', '2016-10-20 02:42:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
