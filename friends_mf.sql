-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2017 at 11:31 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friends_mf`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `total_money` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `customer_id`, `account_no`, `total_money`) VALUES
(9, 16, '112124', 1000),
(10, 17, '1244', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `date_birth` varchar(255) NOT NULL,
  `nid` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `user_name`, `father_name`, `mother_name`, `gender`, `date_birth`, `nid`, `address`, `contact`, `mail`, `password`, `image`) VALUES
(16, 'Mujibor', 'Rahman', 'mujibor', 'Monir Rahman', 'Asma Rahman', 'male', '12/04/1988', '5465144545', 'asfdafrefe', '0125478', 'mujibor@gmail.com', '123456', '../upload/category-radio-800x800-c-default.jpg'),
(17, 'Gita', 'Sarkar', 'gita', 'Goutam Sarkar', 'Promila Sarkar', 'female', '12/05/1981', '6546546', 'afdsafed', '01244778', 'gita@gmail.com', '123456', '../upload/Baby.tux.sit-black-800x800.png');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `interest` float NOT NULL,
  `duration` varchar(255) NOT NULL,
  `loan_id` varchar(100) NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `name`, `amount`, `interest`, `duration`, `loan_id`, `details`) VALUES
(2, 'Home Loan', '4000000', 5, '5', 'HL01', 'This is a Home Loan'),
(3, 'Car Loan', '3000000', 8, '3', 'CL01', 'This is a Car Loan'),
(4, 'Study', '500000', 1, '8', 'SL01', 'This is Study loan'),
(5, 'Small Business', '500000', 3, '4', 'SB01', 'This is Small Business Loan');

-- --------------------------------------------------------

--
-- Table structure for table `map_account_loans`
--

CREATE TABLE `map_account_loans` (
  `id` int(11) NOT NULL,
  `accounts_id` int(11) NOT NULL,
  `loans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map_account_loans`
--

INSERT INTO `map_account_loans` (`id`, `accounts_id`, `loans_id`) VALUES
(4, 9, 5),
(5, 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `nominees`
--

CREATE TABLE `nominees` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mothers_name` varchar(255) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `date_birth` varchar(255) NOT NULL,
  `nid` varchar(255) NOT NULL,
  `relation_customer` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nominees`
--

INSERT INTO `nominees` (`id`, `customer_id`, `first_name`, `last_name`, `father_name`, `mothers_name`, `gender`, `date_birth`, `nid`, `relation_customer`, `contact`, `image`) VALUES
(5, 16, 'Anika ', 'Rahman', 'Monir Rahman', 'Asma Rahman', 'female', '2/2/1992', '6546546363', 'Sister', '025478941', '../upload/Black_800x600.jpg'),
(6, 17, 'Kamran', 'akmal', 'Kamran Mia', 'Khadiza', 'male', '12/04/1982', '3q34342', 'friend', '656546', '../upload/5333202438_ca8b17cb84_b1-800x800.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_no` (`account_no`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `map_account_loans`
--
ALTER TABLE `map_account_loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accounts_id` (`accounts_id`),
  ADD KEY `loans_id` (`loans_id`);

--
-- Indexes for table `nominees`
--
ALTER TABLE `nominees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custormer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `map_account_loans`
--
ALTER TABLE `map_account_loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nominees`
--
ALTER TABLE `nominees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `map_account_loans`
--
ALTER TABLE `map_account_loans`
  ADD CONSTRAINT `map_account_loans_ibfk_1` FOREIGN KEY (`accounts_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `map_account_loans_ibfk_2` FOREIGN KEY (`loans_id`) REFERENCES `loans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nominees`
--
ALTER TABLE `nominees`
  ADD CONSTRAINT `nominees_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
