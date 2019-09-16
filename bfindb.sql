-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2019 at 10:10 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bfindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`) VALUES
(1, 'Nasif', 'nasif@ofb.org', 'Dhaka'),
(3, 'Nasif Hasan', 'nasifhasan@gmail.com', 'Dhaka, Bangladesh'),
(4, 'Manik', 'manik@gmail.com', 'Dinajpur'),
(5, 'Habib', 'habib@gmail.com', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `customername` varchar(25) NOT NULL,
  `customeremail` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `currency` varchar(25) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitprice` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `productid`, `customername`, `customeremail`, `date`, `amount`, `currency`, `quantity`, `unitprice`, `discount`) VALUES
(2, 1, 'Nasif', 'nasif@ofb.org', '2019-08-07', 950, 'euro', 1, 1000, 5),
(3, 1, 'Nasif', 'nasif@ofb.org', '2019-09-12', 4500, 'doller', 5, 1000, 10),
(4, 1, 'Nasif', 'nasif@ofb.org', '2019-09-11', 1900, 'euro', 1, 2000, 5),
(5, 1, 'Nasif', 'nasif@ofb.org', '2019-09-12', 475, 'euro', 1, 500, 5),
(6, 1, 'Nasif', 'nasif@ofb.org', '2019-09-11', 950, 'euro', 1, 1000, 5),
(7, 1, 'Nasif', 'nasif@ofb.org', '2019-09-11', 95, 'euro', 1, 100, 5),
(8, 1, 'Nasif Hasan', 'nasifhasan@gmail.com', '2019-09-11', 95, 'euro', 1, 100, 5),
(9, 1, 'Nasif', 'nasif@ofb.org', '2019-09-11', 950, 'euro', 10, 100, 5),
(10, 1, 'Nasif', 'nasif@ofb.org', '2019-09-11', 950, 'euro', 10, 100, 5),
(11, 1, 'Nasif', 'nasif@ofb.org', '2019-09-11', 432, 'euro', 1, 455, 5),
(12, 2, 'Habib', 'habib@gmail.com', '2019-09-11', 638, 'euro', 5, 150, 15),
(13, 3, 'Manik', 'manik@gmail.com', '2019-09-17', 99, 'euro', 1, 100, 1),
(14, 2, 'Manik', 'manik@gmail.com', '2019-09-18', 3120, 'doller', 2, 1560, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `invoiceid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `card` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `invoiceid`, `amount`, `card`) VALUES
(1, 3, 4500, '4242'),
(2, 4, 1900, '4242');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `category` varchar(25) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `description`) VALUES
(1, 'Olive', 'Oil', 'Pure Olive Oil'),
(2, 'Mango', 'Fruit', 'From Rajshahi'),
(3, 'Banana', 'Fruit', 'Fresh'),
(4, 'Tomato', 'Vegetable', 'Round shape');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `email`, `password`) VALUES
(1, 'Nasif', 'Dhaka', 'nasifhasan@gmail.com', '111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
