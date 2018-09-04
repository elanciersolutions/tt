-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2018 at 01:51 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dofirst`
--

-- --------------------------------------------------------

--
-- Table structure for table `cse_count`
--

CREATE TABLE `cse_count` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `hubname` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `dtime` datetime NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cse_count`
--

INSERT INTO `cse_count` (`id`, `city`, `hubname`, `pincode`, `date`, `dtime`, `status`) VALUES
(7, 'Madurai', 'South', '625011', '2018-09-04', '2018-09-04 12:35:39', 1),
(8, 'Madurai', 'South', '625008', '2018-09-04', '2018-09-04 12:35:39', 1),
(9, 'Madurai', 'South', '625003', '2018-09-04', '2018-09-04 12:35:39', 1),
(10, 'Madurai', 'North', '625011', '2018-09-04', '2018-09-04 12:36:27', 1),
(11, 'Madurai', 'North', '6251001', '2018-09-04', '2018-09-04 12:36:27', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cse_count`
--
ALTER TABLE `cse_count`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cse_count`
--
ALTER TABLE `cse_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
