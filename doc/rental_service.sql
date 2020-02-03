-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2020 at 09:08 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_pins`
--

CREATE TABLE `admin_pins` (
  `sn` int(11) NOT NULL,
  `pin` varchar(15) NOT NULL,
  `used_by` varchar(200) DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `no_of_usage` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_pins`
--

INSERT INTO `admin_pins` (`sn`, `pin`, `used_by`, `created_by`, `date_created`, `no_of_usage`) VALUES
(1, '0uM76bAsTtVr1aO', 'Charles Archibong', 'Admin', '2019-12-06 11:24:24', 1),
(2, 'LJembnRtU6TCIj3', 'Jevison Archibong', 'Charles Archibong', '2019-12-06 11:40:10', 1),
(3, 'FN07qrVzG1OBuje', NULL, 'Charles Archibong', '2019-12-07 01:20:19', 1),
(4, 'zI3PBZs2jQ7U4SD', NULL, 'Jevison Archibong', '2019-12-07 06:43:10', 0),
(5, 'kVwb4xAdNWfsE3z', NULL, 'Jevison Archibong', '2019-12-08 06:14:44', 0),
(6, 'FS2RabIUBMJupPV', NULL, 'Jevison Archibong', '2019-12-08 06:14:51', 0),
(7, 'GtgTem4IhwkV1Cq', NULL, 'Charles Archibong', '2019-12-08 06:15:13', 0),
(8, 'Z1KxwWc2moXpIbF', NULL, 'charlesarchibong10@gmail.com', '2020-01-12 12:23:04', 0),
(9, 'EdXtes7NwgSTHUK', NULL, 'charlesarchibong10@gmail.com', '2020-01-12 08:18:59', 0),
(10, 'RgCDd1Za9jsrzbY', NULL, 'charlesarchibong10@gmail.com', '2020-01-12 08:19:05', 0),
(11, 'H0b3OIEBvLs58oZ', NULL, 'charlesarchibong10@gmail.com', '2020-01-12 08:19:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rental_admins`
--

CREATE TABLE `rental_admins` (
  `sn` int(11) NOT NULL,
  `id` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `surname` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rental_admins`
--

INSERT INTO `rental_admins` (`sn`, `id`, `email`, `first_name`, `surname`, `password`) VALUES
(1, 'cFfIXdigPpvbYKehVRSwrBlOsqUzDxAoLQmEaJNWHMtjuTnGCk', 'charlesarchibong10@gmail.com', 'Charles', 'Archibong', '$2y$10$h9Ozn2OZG.gYpL8qTXYFE.kV1IqHiOq8i.o9cm7dNM7fgpfRE51zK');

-- --------------------------------------------------------

--
-- Table structure for table `rental_customers`
--

CREATE TABLE `rental_customers` (
  `sn` int(10) NOT NULL,
  `id` varchar(50) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rental_customers`
--

INSERT INTO `rental_customers` (`sn`, `id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'afqWNmHzjgRIDXlLucYyrVGsMZpJwPxUFdEekOQSBiTbAChotK', 'Charles', 'Archibong Bassey', 'charlesarchibong10@gmail.com', '$2y$10$ih1Zble3isWDAbF0CzYa6OlzDPaxqA2q2V8OeTMcnkApD8DTopg9C'),
(2, 'XVbnWpifPaGmBREukrHJDZIcestyhAqNvzUYMOQwTCKxdSLoFg', 'Joseph Divine', 'Joseph', 'exe@gmail.com', '$2y$10$xafwvI4nB0n7w4zCw5iND.3DWaRSHiqeXMGq44wjFjx9KX8/EyD2a');

-- --------------------------------------------------------

--
-- Table structure for table `rental_orders`
--

CREATE TABLE `rental_orders` (
  `sn` int(100) NOT NULL,
  `orderId` varchar(15) NOT NULL,
  `ordered_by` varchar(255) NOT NULL,
  `customerId` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `chair_quantity` int(255) NOT NULL DEFAULT '0',
  `table_quantity` int(255) NOT NULL DEFAULT '0',
  `duration` int(11) NOT NULL,
  `status` enum('Pending','Approved','Declined','Delivered') NOT NULL DEFAULT 'Pending',
  `payment_status` enum('Paid','Pending') NOT NULL DEFAULT 'Pending',
  `amount` int(11) NOT NULL,
  `approved_by` varchar(255) DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `declined_by` varchar(255) DEFAULT NULL,
  `declined_date` datetime DEFAULT NULL,
  `ordered_date` datetime DEFAULT NULL,
  `transactionId` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rental_orders`
--

INSERT INTO `rental_orders` (`sn`, `orderId`, `ordered_by`, `customerId`, `description`, `chair_quantity`, `table_quantity`, `duration`, `status`, `payment_status`, `amount`, `approved_by`, `approved_date`, `declined_by`, `declined_date`, `ordered_date`, `transactionId`) VALUES
(1, 'jiIpvGnKBHVPXlh', 'charlesarchibong10@gmail.com', 'afqWNmHzjgRIDXlLucYyrVGsMZpJwPxUFdEekOQSBiTbAChotK', 'chair', 12121, 0, 12, 'Pending', 'Pending', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'REN-', 'charlesarchibong10@gmail.com', 'afqWNmHzjgRIDXlLucYyrVGsMZpJwPxUFdEekOQSBiTbAChotK', 'chair', 121, 0, 12, 'Pending', 'Pending', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'REN-2', 'charlesarchibong10@gmail.com', 'afqWNmHzjgRIDXlLucYyrVGsMZpJwPxUFdEekOQSBiTbAChotK', 'chair', 1, 0, 12, 'Pending', 'Pending', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'REN-3', 'charlesarchibong10@gmail.com', 'afqWNmHzjgRIDXlLucYyrVGsMZpJwPxUFdEekOQSBiTbAChotK', 'table', 0, 123, 1, 'Approved', 'Paid', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'REN-4', 'charlesarchibong10@gmail.com', 'afqWNmHzjgRIDXlLucYyrVGsMZpJwPxUFdEekOQSBiTbAChotK', 'Chair and Table', 12, 124, 12, 'Pending', 'Pending', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'REN-5', 'exe@gmail.com', 'XVbnWpifPaGmBREukrHJDZIcestyhAqNvzUYMOQwTCKxdSLoFg', 'Chair and Table', 121, 121, 12, 'Approved', 'Paid', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'REN-6', 'charlesarchibong10@gmail.com', 'afqWNmHzjgRIDXlLucYyrVGsMZpJwPxUFdEekOQSBiTbAChotK', 'table', 0, 122, 1, 'Pending', 'Pending', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'REN-7', 'charlesarchibong10@gmail.com', 'afqWNmHzjgRIDXlLucYyrVGsMZpJwPxUFdEekOQSBiTbAChotK', 'Chair and Table', 12, 9, 2, 'Pending', 'Pending', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'REN-8', 'charlesarchibong10@gmail.com', 'afqWNmHzjgRIDXlLucYyrVGsMZpJwPxUFdEekOQSBiTbAChotK', 'table', 0, 121, 12, 'Approved', 'Paid', 0, NULL, NULL, NULL, NULL, '2020-01-09 01:25:38', NULL),
(10, 'REN-9', 'charlesarchibong10@gmail.com', 'afqWNmHzjgRIDXlLucYyrVGsMZpJwPxUFdEekOQSBiTbAChotK', 'table', 0, 12, 2, 'Pending', 'Pending', 0, NULL, NULL, NULL, NULL, '2020-01-09 09:30:04', NULL),
(11, 'REN-10', 'charlesarchibong10@gmail.com', 'afqWNmHzjgRIDXlLucYyrVGsMZpJwPxUFdEekOQSBiTbAChotK', 'Chair and Table', 12221, 123232, 12, 'Declined', 'Paid', 0, NULL, NULL, NULL, NULL, '2020-01-09 09:46:30', NULL),
(12, 'REN-11', 'charlesarchibong10@gmail.com', 'afqWNmHzjgRIDXlLucYyrVGsMZpJwPxUFdEekOQSBiTbAChotK', 'chair', 5, 0, 1, 'Pending', 'Pending', 100, NULL, NULL, NULL, NULL, '2020-01-09 11:09:30', NULL),
(13, 'REN-12', 'charlesarchibong10@gmail.com', 'afqWNmHzjgRIDXlLucYyrVGsMZpJwPxUFdEekOQSBiTbAChotK', 'chair', 5, 0, 3, 'Pending', 'Pending', 300, NULL, NULL, NULL, NULL, '2020-01-09 11:09:55', NULL),
(14, 'REN-13', 'charlesarchibong10@gmail.com', 'afqWNmHzjgRIDXlLucYyrVGsMZpJwPxUFdEekOQSBiTbAChotK', 'table', 0, 1, 2, 'Pending', 'Pending', 200, NULL, NULL, NULL, NULL, '2020-01-09 11:10:22', NULL),
(15, 'REN-14', 'charlesarchibong10@gmail.com', 'afqWNmHzjgRIDXlLucYyrVGsMZpJwPxUFdEekOQSBiTbAChotK', 'Chair and Table', 10, 10, 5, 'Pending', 'Pending', 6000, NULL, NULL, NULL, NULL, '2020-01-09 11:14:36', NULL),
(16, 'REN-15', 'charlesarchibong10@gmail.com', 'afqWNmHzjgRIDXlLucYyrVGsMZpJwPxUFdEekOQSBiTbAChotK', 'table', 0, 1, 30, 'Pending', 'Pending', 3000, NULL, NULL, NULL, NULL, '2020-01-09 11:25:04', NULL),
(17, 'REN-16', 'charlesarchibong10@gmail.com', 'afqWNmHzjgRIDXlLucYyrVGsMZpJwPxUFdEekOQSBiTbAChotK', 'Chair and Table', 555555, 55555, 55555, 'Pending', 'Pending', 2147483647, NULL, NULL, NULL, NULL, '2020-01-09 11:38:53', NULL),
(18, 'REN-17', 'charlesarchibong10@gmail.com', 'afqWNmHzjgRIDXlLucYyrVGsMZpJwPxUFdEekOQSBiTbAChotK', 'table', 0, 1, 2147483647, 'Pending', 'Pending', 2147483647, NULL, NULL, NULL, NULL, '2020-01-09 11:50:53', NULL),
(19, 'REN-18', 'exe@gmail.com', 'XVbnWpifPaGmBREukrHJDZIcestyhAqNvzUYMOQwTCKxdSLoFg', 'Chair and Table', 7, 456, 45, 'Pending', 'Pending', 2058300, NULL, NULL, NULL, NULL, '2020-01-12 08:11:04', NULL),
(20, 'REN-19', 'exe@gmail.com', 'XVbnWpifPaGmBREukrHJDZIcestyhAqNvzUYMOQwTCKxdSLoFg', 'table', 0, 54, 65, 'Pending', 'Pending', 351000, NULL, NULL, NULL, NULL, '2020-01-12 08:22:09', NULL),
(21, 'REN-20', 'exe@gmail.com', 'XVbnWpifPaGmBREukrHJDZIcestyhAqNvzUYMOQwTCKxdSLoFg', 'Chair and Table', 100, 700, 2, 'Pending', 'Pending', 144000, NULL, NULL, NULL, NULL, '2020-01-12 08:27:49', NULL),
(22, 'REN-21', 'exe@gmail.com', 'XVbnWpifPaGmBREukrHJDZIcestyhAqNvzUYMOQwTCKxdSLoFg', 'table', 0, 12, 2, 'Pending', 'Pending', 2400, NULL, NULL, NULL, NULL, '2020-01-12 08:33:08', NULL),
(23, 'REN-22', 'exe@gmail.com', 'XVbnWpifPaGmBREukrHJDZIcestyhAqNvzUYMOQwTCKxdSLoFg', 'Chair and Table', 2, 2, 12, 'Pending', 'Pending', 2880, NULL, NULL, NULL, NULL, '2020-01-12 08:34:25', NULL),
(24, 'REN-23', 'exe@gmail.com', 'XVbnWpifPaGmBREukrHJDZIcestyhAqNvzUYMOQwTCKxdSLoFg', 'chair', 2, 0, 12, 'Pending', 'Pending', 480, NULL, NULL, NULL, NULL, '2020-01-12 08:35:00', NULL),
(25, 'REN-24', 'exe@gmail.com', 'XVbnWpifPaGmBREukrHJDZIcestyhAqNvzUYMOQwTCKxdSLoFg', 'Chair and Table', 1, 1, 12, 'Pending', 'Pending', 1440, NULL, NULL, NULL, NULL, '2020-01-12 09:18:30', NULL),
(26, 'REN-25', 'charlesarchibong10@gmail.com', 'afqWNmHzjgRIDXlLucYyrVGsMZpJwPxUFdEekOQSBiTbAChotK', 'chair', 12, 0, 1, 'Pending', 'Pending', 240, NULL, NULL, NULL, NULL, '2020-01-12 09:33:22', NULL),
(27, 'REN-26', 'charlesarchibong10@gmail.com', 'afqWNmHzjgRIDXlLucYyrVGsMZpJwPxUFdEekOQSBiTbAChotK', 'Chair and Table', 20, 2, 1, 'Pending', 'Pending', 600, NULL, NULL, NULL, NULL, '2020-01-12 09:37:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_pins`
--
ALTER TABLE `admin_pins`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `pin` (`pin`);

--
-- Indexes for table `rental_admins`
--
ALTER TABLE `rental_admins`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `rental_customers`
--
ALTER TABLE `rental_customers`
  ADD PRIMARY KEY (`sn`,`lastname`),
  ADD UNIQUE KEY `Unique id` (`id`,`email`);

--
-- Indexes for table `rental_orders`
--
ALTER TABLE `rental_orders`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `Uniques Fields` (`orderId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_pins`
--
ALTER TABLE `admin_pins`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rental_admins`
--
ALTER TABLE `rental_admins`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rental_customers`
--
ALTER TABLE `rental_customers`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rental_orders`
--
ALTER TABLE `rental_orders`
  MODIFY `sn` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
