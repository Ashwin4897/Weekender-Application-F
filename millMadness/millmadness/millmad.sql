-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2019 at 10:43 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `millmad`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `post_id` int(255) NOT NULL,
  `message` varchar(200) NOT NULL,
  `name` varchar(25) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`post_id`, `message`, `name`, `time`) VALUES
(1, 'Loved the deals from last week! Please do them again!', 'Jonathan', '2019-12-12 09:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `rlogin`
--

CREATE TABLE `rlogin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `business_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rlogin`
--

INSERT INTO `rlogin` (`username`, `password`, `business_name`) VALUES
('casadrinks', 'casa2019', 'CASA'),
('zumadrinks', 'zuma2019', 'ZUMA'),
('varsitydrinks', 'varsity2019', 'Varsity'),
('hefedrinks', 'hefe2019', 'El Hefe');

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `eventName` varchar(200) NOT NULL,
  `business` varchar(50) NOT NULL,
  `image` blob NOT NULL,
  `time` datetime NOT NULL,
  `descrip` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`eventName`, `business`, `image`, `time`, `descrip`) VALUES
('Discount Off Buckets!!', 'CASA', 0x636173612d6c6f676f2d312e6a7067, '2019-12-12 09:10:00', '$5 off every Bucket at Casa on December 21st'),
('Discounts off bottles!', 'El Hefe', 0x74656d702d6c6f676f2e706e67, '2019-12-12 09:17:08', '10% off bottles!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
