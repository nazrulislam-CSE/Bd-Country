-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 08:38 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organic`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(1) NOT NULL,
  `name_en` varchar(25) NOT NULL,
  `name_bn` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name_en`, `name_bn`, `status`, `url`) VALUES
(1, 'Chattagram', 'চট্টগ্রাম', 1, 'www.chittagongdiv.gov.bd'),
(2, 'Rajshahi', 'রাজশাহী', 1, 'www.rajshahidiv.gov.bd'),
(3, 'Khulna', 'খুলনা', 1, 'www.khulnadiv.gov.bd'),
(4, 'Barisal', 'বরিশাল', 1, 'www.barisaldiv.gov.bd'),
(5, 'Sylhet', 'সিলেট', 1, 'www.sylhetdiv.gov.bd'),
(6, 'Dhaka', 'ঢাকা', 1, 'www.dhakadiv.gov.bd'),
(7, 'Rangpur', 'রংপুর', 1, 'www.rangpurdiv.gov.bd'),
(8, 'Mymensingh', 'ময়মনসিংহ', 1, 'www.mymensinghdiv.gov.bd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
