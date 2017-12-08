-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2016 at 03:26 AM
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
-- Table structure for table `receiving_histories`
--

CREATE TABLE IF NOT EXISTS `receiving_histories` (
  `id` int(10) unsigned NOT NULL,
  `subscriber_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `po_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dr_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `received_qty` int(11) NOT NULL,
  `date_received` date NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `receiving_histories`
--

INSERT INTO `receiving_histories` (`id`, `subscriber_id`, `location_id`, `po_no`, `dr_no`, `product_id`, `qty`, `received_qty`, `date_received`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '', '0000004', 1, 11, 11, '2016-10-21', 3, '2016-10-21 01:19:35', '2016-10-21 01:19:35'),
(2, 1, 1, '', '0000004', 6, 10, 10, '2016-10-21', 2, '2016-10-21 01:19:35', '2016-10-21 01:19:35'),
(3, 1, 1, '', '0000004', 6, 3, 3, '2016-10-21', 3, '2016-10-21 01:21:03', '2016-10-21 01:21:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `receiving_histories`
--
ALTER TABLE `receiving_histories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `receiving_histories`
--
ALTER TABLE `receiving_histories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
