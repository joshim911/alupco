-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2022 at 09:21 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alupco`
--

-- --------------------------------------------------------

--
-- Table structure for table `get_company_name`
--

CREATE TABLE `get_company_name` (
  `id` int(6) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `get_company_name`
--

INSERT INTO `get_company_name` (`id`, `company_name`, `date`) VALUES
(1, 'company-11', '2022-11-26 11:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `get_item_name`
--

CREATE TABLE `get_item_name` (
  `id` int(6) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `make_order`
--

CREATE TABLE `make_order` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `item_code` varchar(50) NOT NULL,
  `item_qty` varchar(50) NOT NULL,
  `order_status` int(2) DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `make_order`
--

INSERT INTO `make_order` (`id`, `order_id`, `company_name`, `item_code`, `item_qty`, `order_status`, `date`) VALUES
(1, 'Select order ID', 'company-11', 'asd', '2', 0, '2022-11-26 12:09:20'),
(2, 'Select order ID', 'company-11', 'asd', '21', 0, '2022-11-26 12:10:39'),
(3, 'as', 'company-11', 'ad', '1', 0, '2022-11-26 12:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `stock_manage`
--

CREATE TABLE `stock_manage` (
  `id` int(11) NOT NULL,
  `alupco_code` varchar(150) CHARACTER SET utf16 NOT NULL,
  `alupco_group_code` varchar(150) CHARACTER SET utf16 DEFAULT NULL,
  `supplier_code` varchar(150) CHARACTER SET utf16 NOT NULL,
  `supplier_group_code` varchar(150) CHARACTER SET utf16 DEFAULT NULL,
  `unit` varchar(10) CHARACTER SET utf16 NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `company_name` varchar(150) CHARACTER SET utf16 NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `item_description` varchar(250) DEFAULT NULL,
  `item_location` varchar(150) CHARACTER SET utf16 DEFAULT NULL,
  `item_color` varchar(150) CHARACTER SET utf16 DEFAULT NULL,
  `item_net_weight_in_kg` float DEFAULT NULL,
  `item_gross_weight_in_kg` float DEFAULT NULL,
  `number_of_role_or_box` int(11) DEFAULT NULL,
  `quantity_of_role_or_box` float DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `complated_items` varchar(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_manage`
--

INSERT INTO `stock_manage` (`id`, `alupco_code`, `alupco_group_code`, `supplier_code`, `supplier_group_code`, `unit`, `total_quantity`, `company_name`, `item_name`, `item_description`, `item_location`, `item_color`, `item_net_weight_in_kg`, `item_gross_weight_in_kg`, `number_of_role_or_box`, `quantity_of_role_or_box`, `date`, `complated_items`) VALUES
(1, 'AL 00-2-00-00-001', NULL, '', NULL, 'pcs', 0, '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-06 23:38:21', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `get_company_name`
--
ALTER TABLE `get_company_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `get_item_name`
--
ALTER TABLE `get_item_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `make_order`
--
ALTER TABLE `make_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_manage`
--
ALTER TABLE `stock_manage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `get_company_name`
--
ALTER TABLE `get_company_name`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `get_item_name`
--
ALTER TABLE `get_item_name`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `make_order`
--
ALTER TABLE `make_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock_manage`
--
ALTER TABLE `stock_manage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
