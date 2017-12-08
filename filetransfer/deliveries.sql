-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2016 at 09:33 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` int(10) UNSIGNED NOT NULL,
  `subscriber_id` int(11) NOT NULL,
  `location_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `branch_destination_id` int(11) NOT NULL,
  `dr_no` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `or_no` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `si_no` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `tf_no` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_date` date NOT NULL,
  `date_received` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `subscriber_id`, `location_id`, `branch_destination_id`, `dr_no`, `or_no`, `si_no`, `tf_no`, `status`, `delivery_date`, `date_received`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 1, '2', 0, '0000104', '', '', 0, '1', '2016-09-07', '0000-00-00', '2016-09-07 09:49:35', '2016-09-08 07:54:20', NULL),
(14, 1, '6', 0, '0000096', '', '', 0, '1', '2016-09-09', '0000-00-00', '2016-09-07 09:51:26', '2016-09-08 02:07:02', NULL),
(15, 1, '1', 0, '0000099', '', '', 0, '3', '2016-09-29', '2016-09-30', '2016-09-08 02:08:54', '2016-09-08 02:09:06', NULL),
(17, 1, '5', 1, '0000107', '', '', 0, '3', '2016-09-23', '2016-09-15', '2016-09-20 08:34:37', '2016-09-20 08:42:50', NULL),
(18, 1, '5', 6, '0000108', '', '', 0, '0', '2016-09-30', '0000-00-00', '2016-09-20 09:08:33', '2016-09-20 09:08:33', NULL),
(19, 1, '5', 6, '0000109', '', '', 0, '0', '2016-09-20', '0000-00-00', '2016-09-20 10:18:10', '2016-09-20 10:18:10', NULL),
(20, 1, '1', 0, '0011000', '', '', 0, '0', '2016-09-21', '0000-00-00', '2016-09-21 07:22:34', '2016-09-21 07:22:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
