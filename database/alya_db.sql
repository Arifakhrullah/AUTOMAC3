-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2018 at 06:30 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alya_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `category_img` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_img`) VALUES
(1, 'Jump Suits', 'jump_suits.png'),
(2, 'Dress', 'dress.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `product_category` varchar(20) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `product_price` int(20) NOT NULL,
  `product_img` varchar(20) NOT NULL,
  `product_desc` varchar(250) DEFAULT NULL,
  `product_size` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_category`, `product_name`, `product_price`, `product_img`, `product_desc`, `product_size`) VALUES
(1, '1', 'Jump Suit NOOOOO', 1111, 'jump_suits.png', 'DESC                                                                                                                                                                                                                                                      ', NULL),
(2, '2', 'The Dress', 15, 'dress.png', 'DESC', NULL),
(3, '1', 'Jump Suit 2', 100, 'jump_suits.png', 'DESC                                                    ', 'XS'),
(4, '1', 'Jump Suit 3', 123, 'jump_suits.png', 'DESC', NULL),
(9, '1', 'Jump Suit HOWDY', 55, 'jump_suits.png', 'DESC                              ', NULL),
(10, '1', 'Jump Suit 6', 1, 'jump_suits.png', 'HELLOOO', NULL),
(13, '2', 'Very nice dress', 66, 'dress.png', 'DESC', NULL),
(14, '1', 'VERY NICE BRO', 12, 'dress.png', '                              ', NULL),
(15, '1', 'HELLO', 12, 'dress.png', '                          ', 'M.L.XL'),
(16, '1', 'yellow', 12, 'dress.png', '                          SOMETHING SOMEHTING    ', NULL),
(17, '1', 'Test', 100, 'bird.png', 'HELLO                          ', 'XS.S.M.L.XL'),
(18, '2', 'JJJJJ', 66, '1510995172806.png', NULL, 'XS.M'),
(19, '1', 'testingggg', 77, '452176.jpg', '                ', 'S.M');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`) VALUES
(1, 'Admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
