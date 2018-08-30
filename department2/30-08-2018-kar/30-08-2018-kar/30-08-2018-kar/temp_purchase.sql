-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2018 at 01:16 PM
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
-- Table structure for table `temp_purchase`
--

CREATE TABLE `temp_purchase` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `subcategory` int(11) NOT NULL,
  `brandname` int(11) NOT NULL,
  `dept` int(11) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `mrp` int(11) NOT NULL,
  `status` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '1',
  `purchase_date` date NOT NULL,
  `dtime` datetime NOT NULL,
  `commission` int(100) NOT NULL,
  `gst` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_purchase`
--

INSERT INTO `temp_purchase` (`id`, `category_name`, `subcategory`, `brandname`, `dept`, `product_code`, `product_name`, `stock`, `price`, `mrp`, `status`, `purchase_date`, `dtime`, `commission`, `gst`) VALUES
(5, 'Grocery', 10, 2, 1, '', 'BRAND PRODUCT', 1150, 900, 0, '1', '2018-08-30', '2018-08-30 13:07:31', 90, 9),
(6, 'Grocery', 11, 3, 1, '', 'User Product', 1500, 500, 0, '1', '2018-08-30', '2018-08-30 13:07:31', 50, 18),
(7, 'Grocery', 8, 1, 1, '', 'Band2001', 10000, 600, 0, '1', '2018-08-30', '2018-08-30 13:10:16', 60, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `temp_purchase`
--
ALTER TABLE `temp_purchase`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `temp_purchase`
--
ALTER TABLE `temp_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
