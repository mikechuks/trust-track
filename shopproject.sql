-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2024 at 04:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_tb`
--

CREATE TABLE `category_tb` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_tb`
--

INSERT INTO `category_tb` (`category_id`, `category_name`, `personal_id`, `date_created`) VALUES
(1, 'Bag', 2, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `income_tb`
--

CREATE TABLE `income_tb` (
  `income_id` int(11) NOT NULL,
  `name_id` int(11) NOT NULL,
  `price` varchar(11) NOT NULL,
  `email_id'` varchar(300) NOT NULL,
  `state_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_tb`
--

CREATE TABLE `product_tb` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_amount` int(11) NOT NULL,
  `rand_pro` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `details` text NOT NULL,
  `personal_id` int(11) NOT NULL,
  `image` blob NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_tb`
--

INSERT INTO `product_tb` (`product_id`, `product_name`, `category_id`, `product_amount`, `rand_pro`, `count`, `quantity`, `details`, `personal_id`, `image`, `date_created`) VALUES
(1, 'china Bag', 1, 1000, 718697622, 1, 2, 'I am a bag', 2, 0x313733323333303437385f32336439656536333230666636373831613764302e6a7067, '2024-11-23 02:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `shopreg`
--

CREATE TABLE `shopreg` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `state` varchar(50) NOT NULL,
  `Active` int(3) NOT NULL DEFAULT 0,
  `password` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `status` int(3) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shopreg`
--

INSERT INTO `shopreg` (`user_id`, `name`, `email`, `state`, `Active`, `password`, `address`, `city`, `zip_code`, `status`, `date_created`) VALUES
(1, 'Michael', 'mike@gmail.com', 'Anambra', 1, '$2y$10$bGoxNgcbp.RVS1P7dyRhX.bTavEBBz4RlmKjdfSqo16TnWNX8zGqG', 'Nwoye\'s.....', 'awka', 411203, 0, '2024-11-23 02:10:10'),
(2, 'Michael2', 'mike2@gmail.com', 'Anambra', 1, '$2y$10$dt4PYL3oDxaVX0NbGIk1k.6nXfUmDMlJe5kx2TvR/h5HXhgYO9ROy', 'Nwoye\'s.....', '', 411203, 1, '2024-11-23 02:43:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_tb`
--
ALTER TABLE `category_tb`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `income_tb`
--
ALTER TABLE `income_tb`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `product_tb`
--
ALTER TABLE `product_tb`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shopreg`
--
ALTER TABLE `shopreg`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_tb`
--
ALTER TABLE `category_tb`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `income_tb`
--
ALTER TABLE `income_tb`
  MODIFY `income_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_tb`
--
ALTER TABLE `product_tb`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shopreg`
--
ALTER TABLE `shopreg`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
