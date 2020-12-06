[=[]]                         -- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2020 at 09:44 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `business`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_on_product`
--

CREATE TABLE `action_on_product` (
  `action_id` tinyint(2) NOT NULL,
  `action_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `action_on_product`
--

INSERT INTO `action_on_product` (`action_id`, `action_desc`) VALUES
(1, 'Imported'),
(2, 'Sold'),
(3, 'Debted');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catID` int(5) NOT NULL,
  `cat_desc` varchar(100) NOT NULL,
  `qts` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catID`, `cat_desc`, `qts`) VALUES
(1, 'Shirts', 141),
(3, 'Gowns', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empID` int(4) NOT NULL,
  `emp_fname` varchar(30) NOT NULL,
  `emp_mname` varchar(30) NOT NULL,
  `emp_lname` varchar(30) NOT NULL,
  `type_id` tinyint(1) NOT NULL DEFAULT '1',
  `working_status` tinyint(1) NOT NULL DEFAULT '1',
  `emp_pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empID`, `emp_fname`, `emp_mname`, `emp_lname`, `type_id`, `working_status`, `emp_pass`) VALUES
(1, 'Gerad', 'Seth', 'Mwashalah', 1, 1, 'e738ef555fe41c2f8c2860cb22b6de6b');

-- --------------------------------------------------------

--
-- Table structure for table `emp_type`
--

CREATE TABLE `emp_type` (
  `type_id` tinyint(1) NOT NULL,
  `type_desc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_type`
--

INSERT INTO `emp_type` (`type_id`, `type_desc`) VALUES
(1, 'User'),
(2, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `expense_desc` varchar(100) NOT NULL,
  `cost` double NOT NULL,
  `exp_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expense_desc`, `cost`, `exp_date`) VALUES
(2, 'Dinner', 56000, '2020-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `cat_id` int(5) NOT NULL,
  `emplo_id` int(4) NOT NULL,
  `actionID` tinyint(2) NOT NULL,
  `business_date` date NOT NULL,
  `product_amount` int(11) NOT NULL,
  `amount_money` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `cat_id`, `emplo_id`, `actionID`, `business_date`, `product_amount`, `amount_money`) VALUES
(6, 1, 1, 1, '2020-11-27', 209, 150000),
(7, 1, 1, 1, '2020-11-27', 660, 1500000),
(8, 1, 1, 2, '2020-11-27', 10, 10000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_on_product`
--
ALTER TABLE `action_on_product`
  ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empID`),
  ADD KEY `empt_ifbk` (`type_id`);

--
-- Indexes for table `emp_type`
--
ALTER TABLE `emp_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `cat_ibfk` (`cat_id`),
  ADD KEY `act_ibfk` (`actionID`),
  ADD KEY `emp_ibfk` (`emplo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_on_product`
--
ALTER TABLE `action_on_product`
  MODIFY `action_id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emp_type`
--
ALTER TABLE `emp_type`
  MODIFY `type_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `empt_ifbk` FOREIGN KEY (`type_id`) REFERENCES `emp_type` (`type_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `act_ibfk` FOREIGN KEY (`actionID`) REFERENCES `action_on_product` (`action_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cat_ibfk` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`catID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_ibfk` FOREIGN KEY (`emplo_id`) REFERENCES `employee` (`empID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
