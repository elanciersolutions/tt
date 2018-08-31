-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2018 at 09:55 AM
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
-- Table structure for table `sponser`
--

CREATE TABLE `sponser` (
  `id` int(11) NOT NULL,
  `incharge_name` varchar(255) NOT NULL,
  `pancard` varchar(255) NOT NULL,
  `adhar` varchar(255) NOT NULL,
  `phone` int(100) NOT NULL,
  `sponsername` varchar(255) NOT NULL,
  `sp_password` varchar(255) NOT NULL,
  `sponserid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `dtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponser`
--

INSERT INTO `sponser` (`id`, `incharge_name`, `pancard`, `adhar`, `phone`, `sponsername`, `sp_password`, `sponserid`, `status`, `date`, `dtime`) VALUES
(1, 'Arun', 'PA45220158525', 'AD69858JK', 2147483647, 'Sakthivel Mahendran ', 'TEST123', 0, 1, '2018-08-31', '2018-08-31 11:32:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sponser`
--
ALTER TABLE `sponser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sponser`
--
ALTER TABLE `sponser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
