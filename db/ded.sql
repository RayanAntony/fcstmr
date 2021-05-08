-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 10:28 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ded`
--

-- --------------------------------------------------------

--
-- Table structure for table `fcstmr`
--

CREATE TABLE `fcstmr` (
  `aid` int(3) NOT NULL,
  `id` char(2) NOT NULL,
  `name` char(30) NOT NULL,
  `magento_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fcstmr`
--

INSERT INTO `fcstmr` (`aid`, `id`, `name`, `magento_id`) VALUES
(1, 'A', 'Retail', 4),
(2, 'B', 'Trade B', 5),
(3, 'C', 'Trade C', 6),
(4, 'D', 'Wholesale', 7),
(5, 'E', 'Trade A', 8),
(6, 'F', 'Distributor', 9),
(7, 'G', 'Online', 1),
(8, 'H', 'Wholesale H', 10),
(9, 'J', 'Retail J', 11),
(10, 'I', 'Trade I', 12),
(12, 'K', 'Trade K', 99);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` tinyint(4) NOT NULL,
  `username` char(5) NOT NULL,
  `password` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '76574a697987433245709c0994e982f0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fcstmr`
--
ALTER TABLE `fcstmr`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fcstmr`
--
ALTER TABLE `fcstmr`
  MODIFY `aid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
