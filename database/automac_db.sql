-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 06:12 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automac_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `brand_service` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_service`) VALUES
(1, 'Ben Yuan', 'cctv'),
(2, 'Indigo Vision', 'cctv'),
(3, 'Ben Yuan', 'cctv');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL,
  `msg_content` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_model` varchar(100) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_serviceCategory` varchar(100) NOT NULL,
  `product_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_model`, `product_brand`, `product_serviceCategory`, `product_img`) VALUES
(1, 'Item 1', '$12', '123', 'Ben Yuan', 'cctv', 'bird.png'),
(2, 'Item 2', '$55', '1234', 'Indigo Vision', 'cctv', 'arrow-up (1).png'),
(3, 'Item 3', '$12', 'xyz', 'Ben Yuan', 'cctv', 'brunei.png');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(100) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `service_nameShort` varchar(100) NOT NULL,
  `service_subInfo` varchar(100) NOT NULL,
  `service_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_nameShort`, `service_subInfo`, `service_img`) VALUES
(1, 'Video Surveillance', 'cctv', '', 'surveillence.jpg'),
(2, 'Access Control Systems', 'acs', '', 'ACS.png'),
(3, 'Alarm Systems', 'as', '', 'AS.png'),
(4, 'Perimeter Intrusion Detection Systems', 'pids', '', 'PIDS.png'),
(5, 'Audio Warning Systems', 'aws', '', 'ITC.jpg'),
(6, 'Intruder Deterrent Installation', 'idi', '', 'IDI.png'),
(7, 'Commercial and Industrial Display Monitors', 'monitors', '', 'Monitors.png'),
(8, 'Commercial and Industrial audio, video, data and Ethernet Communications Products', 'communication', '', 'Communication.png'),
(9, 'RFID Door Locks and Enterprise Wifi Solution', 'rfid', '', 'RFID.png'),
(10, 'Anti-climb Fences', 'acf', '', 'ACF.png'),
(11, 'Under Vehicle Surveillance System', 'uvss', '', 'UVSS.png'),
(12, 'Gantry Vehicle X-ray machine', 'gvxm', '', 'GVXM.png'),
(13, 'X-ray machine repair works', 'xray', '', 'astrophysics.jpg'),
(14, 'Manpower Supply Service', 'manpower', '', 'apple-logo.png'),
(15, 'Rubber Guard', 'rubber', '', 'arrow-point-to-right.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`) VALUES
(1, 'Admin', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
