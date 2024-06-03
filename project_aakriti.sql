-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 02:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_aakriti`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `product_name`, `price`, `quantity`, `subtotal`) VALUES
(10, 'Leather jacket', '12000.00', 1, '12000.00'),
(11, 'Leather jacket', '12000.00', 1, '12000.00'),
(12, 'Black Leather Jacket', '5000.00', 2, '10000.00'),
(13, 'Cotton Pants', '2500.00', 2, '5000.00'),
(14, 'shirt', '500.00', 1, '500.00'),
(15, 'Jeans Pants', '2200.00', 1, '2200.00'),
(16, 'shirt', '500.00', 1, '500.00'),
(17, 'Black Leather JAcket', '12000.00', 1, '12000.00'),
(18, 'shirt', '500.00', 2, '1000.00'),
(19, 'shirt', '500.00', 1, '500.00'),
(20, 'Leather jacket', '12000.00', 2, '24000.00'),
(21, 'shirt', '500.00', 2, '1000.00'),
(22, 'Leather jacket', '12000.00', 1, '12000.00'),
(23, 'Jeans Pants', '2200.00', 1, '2200.00'),
(24, 'Black Leather JAcket', '12000.00', 2, '24000.00'),
(25, 'fitted blue dress', '4500.00', 1, '4500.00'),
(26, 'white dress', '2300.00', 1, '2300.00'),
(27, 'blue dress', '4500.00', 1, '4500.00'),
(28, 'skrit', '2500.00', 2, '5000.00'),
(29, 'dress', '5000.00', 1, '5000.00'),
(30, 'one piece', '3500.00', 1, '3500.00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`) VALUES
(96, 'skrit', 'cool and comfortable', 'suheyl-burak-ctSY7BQeRm8-unsplash.jpg', 2500),
(97, 'dress', 'dark red and elegent', 'suheyl-burak-p7I07kuPSyU-unsplash (1).jpg', 5000),
(98, 'one piece', 'stylish', 'darko-mitev-c5t_j1zlk1Y-unsplash.jpg', 3500),
(99, 'party dress', 'floral and colourful', 'khaled-ghareeb--NyPn9up_7o-unsplash.jpg', 6500),
(100, 'blue dress', 'dark blue colour', 'alex-shaw-JUrbgfGBRvo-unsplash.jpg', 4500),
(101, 'white dress', 'fitted white dress', 'aiony-haust-Mqxav2v_rJQ-unsplash.jpg', 2300),
(102, 'fitted blue dress', 'blue tailored dress', 'engin-akyurt-TDOClniEwmI-unsplash.jpg', 4500),
(103, 'black suit and pant', 'formal all black suit ', 'nassim-boughazi-dodzmVtjoKs-unsplash.jpg', 6000),
(105, 'jumpsuit', 'white fitted jump suit', 'gbarkz-vqKnuG8GaQc-unsplash.jpg', 3400),
(108, 'jumpsuit', 'green long striped jumpsuit', 'andra-c-taylor-jr-yxFv9jYtwIU-unsplash.jpg', 2200),
(109, 'mini dress', 'floral green mini bodycon dress', 'alex-shaw-XHLto4FCRUE-unsplash.jpg', 1200),
(110, 'one piece', 'black daily use one piece', 'hannah-busing-ff5K3-kYPHA-unsplash.jpg', 2300),
(112, 't-shirt', 'grey long t-shirt dress', 'napat-saeng-lc5YHJU2IME-unsplash.jpg', 2000),
(113, 'purple one piece', 'plain lavender colored dress', 'phat-tr-ng-iyUYBVcqwRg-unsplash.jpg', 3200),
(114, 'maxi dress', 'long black maxi dress with burnt orange details', 'jared-weiss-P3cB0ynqYBw-unsplash.jpg', 4300),
(115, 'mini hoodie and jokers pant', 'yellow hoodie and jokers pant set', 'dom-hill-nimElTcTNyY-unsplash.jpg', 3500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `psw` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `psw`) VALUES
(12, 'aakriti', 'aakriti@admin.com', '14271711c3c48adac9fe981fbd46d705'),
(13, 'harry', 'harry@gmal.com', 'd0d2b883ffe11676af7e678cf45a36fa'),
(14, 'ram', 'ram@gmail.com', 'ed218e06b885297d0750b65be5e4041e'),
(15, 'bigya', 'bigya@gmail.com', '49732886f0271d8367369f32e980670e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
