-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2022 at 08:15 PM
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
(1, 'company-11', '2022-11-26 11:52:21'),
(2, 'company-12', '2022-11-27 08:52:37'),
(3, 'company-13', '2022-11-27 08:52:55'),
(4, 'company-16', '2022-11-27 08:52:55');

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
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data`)),
  `order_id` varchar(50) NOT NULL,
  `order_status` int(2) DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `make_order`
--

INSERT INTO `make_order` (`id`, `data`, `order_id`, `order_status`, `date`) VALUES
(5, '[{\"order_id\":\"order-1\",\"company_name\":\"company-11\",\"item_code\":\"al code\",\"item_qty\":\"1\"}]', 'order-1', 0, '2022-11-27 10:19:49'),
(6, '[{\"order_id\":\"order-2\",\"company_name\":\"company-11\",\"item_code\":\"al code\",\"item_qty\":\"2\"}]', 'order-2', 0, '2022-11-27 10:20:50');

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
  `item_submittion_status` varchar(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_manage`
--

INSERT INTO `stock_manage` (`id`, `alupco_code`, `alupco_group_code`, `supplier_code`, `supplier_group_code`, `unit`, `total_quantity`, `company_name`, `item_name`, `item_description`, `item_location`, `item_color`, `item_net_weight_in_kg`, `item_gross_weight_in_kg`, `number_of_role_or_box`, `quantity_of_role_or_box`, `date`, `item_submittion_status`) VALUES
(1, 'AT 00120006U', NULL, '', NULL, 'PCS', 149490, 'company-13', NULL, 'GIESSE FLASH BASE HINGE        ', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 09:38:56', '1'),
(2, 'AT 00120410U', NULL, '', NULL, 'PCS', 100000, 'company-13', NULL, 'FLASH BASE HINGE  9010         ', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 09:38:56', '1'),
(3, 'AT 00120500U', NULL, '', NULL, 'PCS', 79010, 'company-13', NULL, 'GIESSE FLASH BASE HINGE        ', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 09:38:56', '1'),
(4, 'AT 00136005U', NULL, '', NULL, 'PCS', 10000, 'company-13', NULL, 'FLASH BASE HINGE INSTALLU  BAP ', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 09:38:56', '1'),
(5, 'AT 00136500U', NULL, '', NULL, 'PCS', 559, 'company-13', NULL, 'FLASH BASE HINGE INSTALLU 9005 ', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 09:38:56', '1'),
(6, 'AT 00681005', NULL, '', NULL, 'PCS', 14990, 'company-13', NULL, 'CELERA HINGE EURO GROOVE       ', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 09:38:56', '1'),
(7, 'AT 00681410', NULL, '', NULL, 'PCS', 5000, 'company-13', NULL, 'CELERA HINGE EURO GROOVE  9010 ', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 09:38:56', '1'),
(8, 'AT 00681500', NULL, '', NULL, 'PCS', 8380, 'company-13', NULL, 'CELERA HINGE EURO GROOVE  9005 ', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 09:38:56', '1'),
(9, 'AT 00957005', NULL, '', NULL, 'PCS', 10000, 'company-13', NULL, 'KORA CREMONE LEAF              ', NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 09:38:56', '1');

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
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `get_item_name`
--
ALTER TABLE `get_item_name`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `make_order`
--
ALTER TABLE `make_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stock_manage`
--
ALTER TABLE `stock_manage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
