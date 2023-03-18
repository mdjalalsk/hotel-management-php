-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 06:58 PM
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
-- Database: `hotelreservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `description`, `created_at`) VALUES
(2, 'Free Wifi', 'Motorhome or Trailer that is the question for you. Here are some of the advantages and disadvantages of both, so you will be confident when purchasing an RV. When comparing Rvs,', '2023-02-06 12:01:09'),
(3, 'Free Breakfast', 'Motorhome or Trailer that is the question for you. Here are some of the advantages and disadvantages of both, so you will be confident when purchasing an RV. When comparing Rvs,', '2023-02-06 12:01:22'),
(4, 'Welcome Drink', 'Motorhome or Trailer that is the question for you. Here are some of the advantages and disadvantages of both, so you will be confident when purchasing an RV.\r\n\r\n', '2023-02-06 12:01:34'),
(5, 'TV', 'Motorhome or Trailer that is the question for you. Here are some of the advantages and disadvantages of both, so you will be confident when purchasing an RV. When comparing Rvs,', '2023-02-06 12:02:14'),
(6, 'AC', 'Motorhome or Trailer that is the question for you. Here are some of the advantages and disadvantages of both, so you will be confident when purchasing an RV. When comparing Rvs,', '2023-02-06 12:02:23'),
(7, 'Mini Fridge', 'Motorhome or Trailer that is the question for you. Here are some of the advantages and disadvantages of both, so you will be confident when purchasing an RV. When comparing Rvs,', '2023-02-06 12:02:35'),
(8, 'Balcony', 'Motorhome or Trailer that is the question for you. Here are some of the advantages and disadvantages of both, so you will be confident when purchasing an RV. When comparing Rvs,', '2023-02-06 12:02:50'),
(9, 'Car Parking', 'Motorhome or Trailer that is the question for you. Here are some of the advantages and disadvantages of both, so you will be confident when purchasing an RV. When comparing Rvs,', '2023-02-06 12:06:58'),
(10, 'Bath Tub', 'Motorhome or Trailer that is the question for you. Here are some of the advantages and disadvantages of both, so you will be confident when purchasing an RV. When comparing Rvs,', '2023-02-06 12:07:09'),
(11, 'telecom', 'Motorhome or Trailer that is the question for you. Here are some of the advantages and disadvantages of both, so you will be confident when purchasing an RV. When comparing Rvs,', '2023-02-06 12:07:35'),
(12, 'Restaurant', 'Motorhome or Trailer that is the question for you. Here are some of the advantages and disadvantages of both, so you will be confident when purchasing an RV. When comparing Rvs,', '2023-02-06 12:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `guest_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `adults` int(11) NOT NULL,
  `childs` int(11) NOT NULL,
  `payment_from` varchar(60) NOT NULL,
  `payment_method` set('cash','bkash','qcash','nogod') NOT NULL,
  `trxid` varchar(60) NOT NULL,
  `book_status` set('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `room_id`, `guest_id`, `start_date`, `end_date`, `adults`, `childs`, `payment_from`, `payment_method`, `trxid`, `book_status`) VALUES
(1, 64, 8, '2023-03-06 00:00:00', '2023-03-08 00:00:00', 1, 1, '01838357303', 'bkash', '124dfasdf1fd', '1');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address1` varchar(256) DEFAULT NULL,
  `address2` varchar(256) DEFAULT NULL,
  `country` varchar(30) NOT NULL,
  `nid` varchar(30) DEFAULT NULL,
  `passportno` varchar(60) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `user_id`, `name`, `email`, `password`, `phone`, `address1`, `address2`, `country`, `nid`, `passportno`, `created`) VALUES
(8, 0, 'A', 'a@gmail.com', '1234', '0125487552', 'asdfasf', NULL, 'fad', 'sdafadsf', 'adsdfafa', '2023-03-04 21:00:42'),
(9, 0, 'Moshiur Rahman', 'admin@gmail.com', 'admin', '01838357303', 'Noakhali, Chittagong, Bangladesh', 'Mirpur', 'Bangladesh', '3293828251', '2458241', '2023-03-06 09:17:18'),
(10, 0, 'Jalal', 'admin@gmail.com', '12235', '01838357303', 'Noakhali, Chittagong, Bangladesh', 'fdsaf', 'Bangladesh', '3293828251', '2458241', '2023-03-06 10:18:49'),
(11, 0, 'Jalal', 'admin@gmail.com', '12235', '01838357303', 'Noakhali, Chittagong, Bangladesh', 'fdsaf', 'Bangladesh', '3293828251', '2458241', '2023-03-06 10:19:07'),
(12, 0, 'Jalal', 'admin@gmail.com', '124521', '01838357303', 'Noakhali, Chittagong, Bangladesh', 'fdsaf', 'Bangladesh', '3293828251', '2458241', '2023-03-06 10:31:27'),
(13, 0, 'Jalal', 'admin@gmail.com', '124521', '01838357303', 'Noakhali, Chittagong, Bangladesh', 'fdsaf', 'Bangladesh', '3293828251', '2458241', '2023-03-06 10:35:58'),
(14, 0, 'Jalal', 'admin@gmail.com', '124521', '01838357303', 'Noakhali, Chittagong, Bangladesh', 'fdsaf', 'Bangladesh', '3293828251', '2458241', '2023-03-06 10:39:25'),
(15, 0, 'Jalal', 'admin@gmail.com', '124521', '01838357303', 'Noakhali, Chittagong, Bangladesh', 'fdsaf', 'Bangladesh', '3293828251', '2458241', '2023-03-06 10:39:49'),
(16, 0, 'Mohim Khan', 'khan@gmail.com', '133654', '01838357303', 'Noakhali, Chittagong, Bangladesh', 'Kazipara', 'Bangladesh', '3293828251', '2458241', '2023-03-06 10:49:57'),
(17, 0, '', '', '', '', '', '', '', '', '', '2023-03-06 11:04:45'),
(18, 0, 'a', 'admin@gmail.com', 'admin', '01838357303', 'Noakhali, Chittagong, Bangladesh', 'dsaf', 'Bangladesh', '41545645', '5456464654', '2023-03-06 11:06:00'),
(19, 0, 'Moshiur Rahman', 'admin@gmail.com', 'admin', '01838357303', 'Noakhali, Chittagong, Bangladesh', 'ks', 'Bangladesh', '246546543541', '2458241', '2023-03-06 11:32:41'),
(20, 0, 'ww', 'admin@gmail.com', 'admin', '', '', 'ww', 'ww', 'ww', 'wwww', '2023-03-06 11:38:15'),
(21, 0, 'Moshiur Rahman', 'admin@gmail.com', 'admin', '01838357303', 'Noakhali, Chittagong, Bangladesh', '', 'Bangladesh', '', '', '2023-03-06 11:52:57'),
(22, 0, 'Moshiur Rahman', 'admin@gmail.com', 'admin', '01838357303', 'Noakhali, Chittagong, Bangladesh', '', 'Bangladesh', '', '', '2023-03-06 12:01:41'),
(23, 0, 'Moshiur Rahman', 'admin@gmail.com', 'admin', '01838357303', 'Noakhali, Chittagong, Bangladesh', '', 'Bangladesh', '', '', '2023-03-06 12:01:59'),
(24, 8, 'ASA Al-Mamun', 'asamamun.web@gmail.com', 'admin', '01911039525', 'Dhaka', 'Dhaka', 'Bangladesh', '234345435', 'sadfdfgdfg', '2023-03-07 12:23:58'),
(25, 8, 'ASA Al-Mamun', 'asamamun.web@gmail.com', '$2y$10$E0t6rqRM3OWFhXsJ12JMkuSECcDVvuYXTQLAV0CIUI5dHZLGq8u9C', '01911039525', 'Dhaka', 'Dhaka', 'Bangladesh', '23434543sadf5', 'sadfdsfdsafd', '2023-03-07 12:24:41'),
(26, 8, 'ASA Al-Mamun', 'asamamun.web@gmail.com', '$2y$10$E0t6rqRM3OWFhXsJ12JMkuSECcDVvuYXTQLAV0CIUI5dHZLGq8u9C', '01911039525', 'Dhaka', 'Dhaka', 'Bangladesh', 'sadfsdf', 'sdfsdfsdf', '2023-03-07 12:44:17'),
(27, 8, 'ASA Al-Mamun', 'asamamun.web@gmail.com', '$2y$10$E0t6rqRM3OWFhXsJ12JMkuSECcDVvuYXTQLAV0CIUI5dHZLGq8u9C', '01911039525', 'Dhaka', 'Dhaka', 'Bangladesh', 'sadfsdf', 'sdfsdfsdf', '2023-03-07 12:45:21'),
(28, 8, 'ASA Al-Mamun', 'asamamun.web@gmail.com', '$2y$10$E0t6rqRM3OWFhXsJ12JMkuSECcDVvuYXTQLAV0CIUI5dHZLGq8u9C', '01911039525', 'Dhaka', 'Dhaka', 'Bangladesh', 'dfgdfg', 'dfgdfg', '2023-03-07 12:45:48'),
(29, 8, 'ASA Al-Mamun', 'asamamun.web@gmail.com', '$2y$10$E0t6rqRM3OWFhXsJ12JMkuSECcDVvuYXTQLAV0CIUI5dHZLGq8u9C', '01911039525', 'Dhaka', 'Dhaka', 'Bangladesh', 'dfgdfg', 'dfgdfg', '2023-03-07 12:47:22'),
(30, 8, 'admin123 admin', 'test@gmail.com', '$2y$10$E0t6rqRM3OWFhXsJ12JMkuSECcDVvuYXTQLAV0CIUI5dHZLGq8u9C', '0195465656', 'Taltola', 'Mirpur', 'Bangladesh', 'dsfg', 'dsfgdfg', '2023-03-07 12:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `roomtype_id` int(11) NOT NULL,
  `amenities_id` varchar(80) NOT NULL,
  `capacity` int(11) NOT NULL,
  `images` varchar(256) NOT NULL,
  `status` set('0','1','2') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `roomtype_id`, `amenities_id`, `capacity`, `images`, `status`, `created_at`) VALUES
(64, 'A1', 10, '7,8,12', 1, 'A1.png', '2', '2023-03-04 12:45:52'),
(65, 'B1', 10, '3,5,6', 1, 'B1.png', '1', '2023-03-04 12:46:14'),
(66, 'B2', 8, '4,8,9', 2, 'B2.png', '2', '2023-03-04 12:46:31'),
(67, 'C4', 11, '3,6,7', 2, 'C4.png', '1', '2023-03-04 12:48:04'),
(68, 'D1', 11, '3,4,5', 3, 'D1.png', '1', '2023-03-04 15:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `roomtypes`
--

CREATE TABLE `roomtypes` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `rate` decimal(10,0) NOT NULL,
  `image` varchar(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomtypes`
--

INSERT INTO `roomtypes` (`id`, `name`, `rate`, `image`, `created_at`) VALUES
(8, 'Double room', '1500', 'Double room.png', '2023-02-19 05:00:28'),
(9, 'Single room', '2000', 'Single room.png', '2023-02-19 05:01:00'),
(10, 'Luxuries room', '5000', 'Luxuries room.png', '2023-02-19 05:01:34'),
(11, 'Family Room', '5000', 'Family Room.png', '2023-02-19 05:02:06'),
(13, 'luxries', '6500', 'luxries.png', '2023-02-19 05:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` set('1','2','3','4') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(8, 'Asif Rahman', 'admin@gmail.com', '$2y$10$E0t6rqRM3OWFhXsJ12JMkuSECcDVvuYXTQLAV0CIUI5dHZLGq8u9C', '2', '2023-02-17 08:40:33'),
(9, 'Jalal sk', 'jalal@gmail.com', '$2y$10$LHRBhLQx5NuwDnFTSiGrNOzsQxuZfCCriwXDUh1vIdMgMfWYm7jw6', '2', '2023-02-19 06:15:30'),
(10, 'Mohim Molla', 'mohim@gmail.com', '$2y$10$LmRYyPvSEdedVzIOuOAKbeo4JSiEGFkuqAM.cv4zOXGNP/CcGfXWy', '1', '2023-02-19 06:16:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomtypes`
--
ALTER TABLE `roomtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `roomtypes`
--
ALTER TABLE `roomtypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
