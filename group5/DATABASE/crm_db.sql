-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 04:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE `audit_trail` (
  `id` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`id`, `action`, `user`, `timestamp`) VALUES
(1, 'User logged in', 'admin@gmail.com', '2024-05-09 16:23:38'),
(2, 'User Logged Out', 'admin@gmail.com', '2024-05-09 16:46:29'),
(3, 'User logged in', 'admin@gmail.com', '2024-05-09 16:46:34'),
(4, 'User Logged Out', 'admin@gmail.com', '2024-05-09 16:47:22'),
(5, 'User logged in', 'admin@gmail.com', '2024-05-09 16:49:09'),
(6, 'User Deleted', 'admin@gmail.com', '2024-05-09 16:50:07'),
(7, 'User Deleted', 'admin@gmail.com', '2024-05-09 16:50:08'),
(8, 'User logged in', 'admin@gmail.com', '2024-05-09 16:56:59'),
(9, 'User logged in', 'admin@gmail.com', '2024-05-09 16:58:29'),
(10, 'User logged in', 'admin@gmail.com', '2024-05-09 17:01:06'),
(11, 'User Updated', 'admin@gmail.com', '2024-05-09 17:01:21'),
(12, 'User Updated', 'admin@gmail.com', '2024-05-09 17:02:04'),
(13, 'User Updated', 'admin@gmail.com', '2024-05-09 17:02:12'),
(14, 'User Updated', 'admin@gmail.com', '2024-05-09 17:02:16'),
(15, 'User Updated', 'admin@gmail.com', '2024-05-09 17:02:24'),
(16, 'User Updated', 'admin@gmail.com', '2024-05-09 17:26:44'),
(17, 'User Updated', 'admin@gmail.com', '2024-05-09 17:26:58'),
(18, 'User Updated', 'admin@gmail.com', '2024-05-09 17:27:04'),
(19, 'User Updated', 'admin@gmail.com', '2024-05-09 17:28:52'),
(20, 'User Updated', 'admin@gmail.com', '2024-05-09 17:29:20'),
(21, 'User Updated', 'admin@gmail.com', '2024-05-09 17:29:28'),
(22, 'User Updated', 'admin@gmail.com', '2024-05-09 17:29:38'),
(23, 'User Updated', 'admin@gmail.com', '2024-05-09 17:42:57'),
(24, 'User Updated', 'admin@gmail.com', '2024-05-09 17:43:04'),
(25, 'User Updated', 'admin@gmail.com', '2024-05-09 17:43:15'),
(26, 'User Updated', 'admin@gmail.com', '2024-05-09 18:13:49'),
(27, 'User Updated', 'admin@gmail.com', '2024-05-09 18:37:35'),
(28, 'User Updated', 'admin@gmail.com', '2024-05-09 18:37:44'),
(29, 'User logged in', 'admin@gmail.com', '2024-05-10 10:29:34'),
(30, 'User Deleted', 'admin@gmail.com', '2024-05-10 10:39:49'),
(31, 'User Deleted', 'admin@gmail.com', '2024-05-10 10:39:50'),
(32, 'User Deleted', 'admin@gmail.com', '2024-05-10 10:40:26'),
(33, 'User logged in', 'admin@gmail.com', '2024-05-12 12:09:34'),
(34, 'User logged in', 'admin@gmail.com', '2024-05-17 08:14:53'),
(35, 'User Deleted', 'admin@gmail.com', '2024-05-17 08:27:47'),
(36, 'User Updated', 'admin@gmail.com', '2024-05-17 09:41:41'),
(37, 'User Updated', 'admin@gmail.com', '2024-05-17 09:43:57'),
(38, 'User Updated', 'admin@gmail.com', '2024-05-17 09:44:27'),
(39, 'User Updated', 'admin@gmail.com', '2024-05-17 09:44:36'),
(40, 'User Updated', 'admin@gmail.com', '2024-05-17 10:03:01'),
(41, 'User Updated', 'admin@gmail.com', '2024-05-17 10:03:06'),
(42, 'User Updated', 'admin@gmail.com', '2024-05-17 10:03:11'),
(43, 'User Updated', 'admin@gmail.com', '2024-05-17 10:03:17'),
(44, 'User Updated', 'admin@gmail.com', '2024-05-17 10:03:22'),
(45, 'User logged in', 'admin@gmail.com', '2024-05-20 06:50:04'),
(46, 'User logged in', 'admin@gmail.com', '2024-05-28 03:59:42'),
(47, 'User Deleted', 'admin@gmail.com', '2024-05-28 06:26:39'),
(48, 'User Deleted', 'admin@gmail.com', '2024-05-28 06:42:22'),
(49, 'User Deleted', 'admin@gmail.com', '2024-05-28 06:42:22'),
(50, 'User Deleted', 'admin@gmail.com', '2024-05-28 06:42:25'),
(51, 'User Deleted', 'admin@gmail.com', '2024-05-28 06:42:28'),
(52, 'User Deleted', 'admin@gmail.com', '2024-05-28 06:42:29'),
(53, 'User Deleted', 'admin@gmail.com', '2024-05-28 06:42:29'),
(54, 'User Deleted', 'admin@gmail.com', '2024-05-28 06:42:30'),
(55, 'User Deleted', 'admin@gmail.com', '2024-05-28 06:42:30'),
(56, 'User Deleted', 'admin@gmail.com', '2024-05-28 06:42:31'),
(57, 'User Deleted', 'admin@gmail.com', '2024-05-28 06:42:32'),
(58, 'User Deleted', 'admin@gmail.com', '2024-05-28 06:42:33'),
(59, 'User Deleted', 'admin@gmail.com', '2024-05-28 06:42:33'),
(60, 'User Updated', 'admin@gmail.com', '2024-05-28 12:03:14'),
(61, 'User logged in', 'admin@gmail.com', '2024-05-29 03:30:17'),
(62, 'User logged in', 'admin@gmail.com', '2024-05-29 22:50:10'),
(63, 'User logged in', 'admin@gmail.com', '2024-05-30 14:18:59'),
(64, 'User logged in', 'admin@gmail.com', '2024-05-30 14:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` int(11) NOT NULL,
  `visits` int(11) NOT NULL,
  `tvisit` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `visits`, `tvisit`, `date`) VALUES
(1, 1, 0, '2024-05-29 22:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `customer_account`
--

CREATE TABLE `customer_account` (
  `id` int(11) NOT NULL,
  `barcode_image` varchar(255) NOT NULL,
  `profpic` varchar(255) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Contact` double NOT NULL,
  `TotalVisits` int(11) NOT NULL,
  `LoyaltyPoints` int(11) NOT NULL,
  `TotalPurchase` int(11) NOT NULL,
  `Notes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_account`
--

INSERT INTO `customer_account` (`id`, `barcode_image`, `profpic`, `FullName`, `Email`, `Address`, `Contact`, `TotalVisits`, `LoyaltyPoints`, `TotalPurchase`, `Notes`) VALUES
(1, '!2024650522563', 'pictureko.jpg', 'Cris', 'domingocris92@gmail.com', 'Cabiao, Nueva Ecija', 1234, 8, 12, 0, ''),
(2, '!2024256798172', '', 'test', 'test@gmail.com', 'Sta Rita, Bacolor', 123469, 3, 4, 0, ''),
(3, '!2024946824608', '', 'Shaira Mae', 'inlong@gmail.com', 'xxdiyan', 1234678, 0, 0, 0, ''),
(4, '!2024336070550', '', 'test2', 'test@gmail.com', 'test', 1, 0, 0, 0, ''),
(5, '!2024419584715', '', 'test3', 'test@gmail.com', 'test', 3, 0, 0, 0, ''),
(6, '!2024602547749', '', 'test5', 'test@gmail.com', 'test', 1, 0, 0, 0, ''),
(7, '!2024393039605', '', 'test4', 'test@gmail.com', 'test', 4, 0, 0, 0, ''),
(8, '!2024101409199', '', 'test8', 'teresa@gmail.com', 'test', 8, 0, 0, 0, ''),
(9, '!2024844503572', '', 'test9', 'test@gmail.com', 'test', 9, 0, 0, 0, ''),
(10, '!202444938289', '', 'test10', 'test@gmail.com', 'test', 10, 0, 0, 0, ''),
(11, '!2024650522563', '', 'Dexter', 'dexxx@gmail.com', 'Jaen, Nueva Ecija', 1234, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `usertb_account`
--

CREATE TABLE `usertb_account` (
  `id` int(11) NOT NULL,
  `barcode_image` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PassWord` varchar(255) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `usertype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertb_account`
--

INSERT INTO `usertb_account` (`id`, `barcode_image`, `Email`, `PassWord`, `FullName`, `usertype`) VALUES
(3, 'uploaded_image/barcodes_img/6640b17a8b2df.png', 'admin@gmail.com', '$2y$10$KspbJ0Ty57wJmmrFAdavyOblvOo07uk/iT.gJRKr40qVBEAw.WQOG', 'admin', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_trail`
--
ALTER TABLE `audit_trail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_account`
--
ALTER TABLE `customer_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertb_account`
--
ALTER TABLE `usertb_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_trail`
--
ALTER TABLE `audit_trail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_account`
--
ALTER TABLE `customer_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usertb_account`
--
ALTER TABLE `usertb_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
