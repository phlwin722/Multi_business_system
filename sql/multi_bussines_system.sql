-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 05:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_bussines_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `Business_ID` int(11) NOT NULL,
  `Business_name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`Business_ID`, `Business_name`, `location`) VALUES
(220, 'Motor shop', 'fvr norzagaray '),
(221, 'ph care', 'san jose  del monte bulacan'),
(222, '7-11', 'san jose  del monte bulacan');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ID` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Branch` varchar(30) NOT NULL,
  `Position` varchar(30) NOT NULL,
  `Last_name` varchar(30) NOT NULL,
  `First_name` varchar(30) NOT NULL,
  `Middle_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `Username`, `Password`, `Branch`, `Position`, `Last_name`, `First_name`, `Middle_name`) VALUES
('190', 'bobo', 'bobo', 'Motor shop', 'Staff', 'gois', 'dexter', 'nk'),
('2020', 'dexter', 'jamero', 'ph care', 'Manager', 'jamero', 'dexter', 'patan'),
('2021', 'rhea', 'bacus', 'Motor shop', 'Staff', 'bacus', 'rhea', 'marie'),
('6', '6', '6', '7-11', 'Staff', '6', '6', '6');

-- --------------------------------------------------------

--
-- Table structure for table `owener_acct`
--

CREATE TABLE `owener_acct` (
  `Username` varchar(10) NOT NULL,
  `Password` varchar(8) NOT NULL,
  `Last_name` varchar(20) NOT NULL,
  `First_name` varchar(20) NOT NULL,
  `Mi` varchar(20) NOT NULL,
  `Secret_Question` varchar(20) NOT NULL,
  `Ans_Sec_Question` varchar(20) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owener_acct`
--

INSERT INTO `owener_acct` (`Username`, `Password`, `Last_name`, `First_name`, `Mi`, `Secret_Question`, `Ans_Sec_Question`, `Image`) VALUES
('Shirly1574', 'Shi@1574', 'Bansil', 'Shirly', 'Mae', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_code` varchar(255) NOT NULL,
  `Product_name` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_code`, `Product_name`, `Price`, `Quantity`, `Branch`) VALUES
('2', 'dexter', '20', '20', 'ph care'),
('2003', 'bearing', '200', '183', 'Motor shop'),
('300', 'manibela', '200', '8', 'Motor shop');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `branch` varchar(50) DEFAULT NULL,
  `sales` decimal(10,2) DEFAULT NULL,
  `sale_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`branch`, `sales`, `sale_date`) VALUES
(NULL, 1.00, '2023-11-30'),
(NULL, 1.00, '2023-11-30'),
(NULL, 1.00, '2023-11-30'),
(NULL, 0.00, '2023-11-30'),
(NULL, 0.00, '2023-11-30'),
(NULL, 4.00, '2023-11-30'),
(NULL, 1200.00, '2023-11-30'),
(NULL, 4400.00, '2023-11-30'),
('<?php echo $Branhh ?>', 200.00, '2023-11-30'),
('Motor shop', 200.00, '2023-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `top_product`
--

CREATE TABLE `top_product` (
  `branch` varchar(50) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity_sold` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `top_product`
--

INSERT INTO `top_product` (`branch`, `product_name`, `quantity_sold`) VALUES
(NULL, 'manibela', 1),
(NULL, 'manibela', 1),
(NULL, 'manibela', 1),
(NULL, 'manibela', 1),
(NULL, 'manibela', 1),
(NULL, 'manibela', 4),
(NULL, 'manibela', 6),
(NULL, 'manibela', 5),
(NULL, 'bearing', 17),
('<?php echo $Branhh ?>', 'manibela', 1),
('Motor shop', 'manibela', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`Business_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `owener_acct`
--
ALTER TABLE `owener_acct`
  ADD UNIQUE KEY `Unique` (`Username`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `Business_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
