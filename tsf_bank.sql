-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 05:04 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsf_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `balance` double NOT NULL,
  `account_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`name`, `email`, `balance`, `account_no`) VALUES
('Swaroop R', 'swar@gmail.com', 4380, 1001),
('Aakash M', 'aakash@gmail.com', 15520, 1002),
('Abhik D', 'abhik@gmail.com', 50000, 1003),
('Kaustubh N', 'kaus@gmail.com', 30000, 1004),
('Don', 'don@gmail.com', 25000, 1005),
('Omkar R', 'omkar@gmail.com', 60000, 1006),
('Adam', 'adam@gmail.com', 5000, 1007),
('Alex', 'alex@gmail.com', 3000, 1008),
('Steve', 'steve@gmail.com', 4000, 1009),
('Manoj', 'manoj@gmail.com', 300100, 1010);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `from_account` int(11) NOT NULL,
  `to_account` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `from_account`, `to_account`, `amount`) VALUES
(1, 1001, 1010, 100),
(2, 1001, 1002, 5000),
(3, 1001, 1002, 500),
(4, 1001, 1002, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`account_no`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD KEY `reciever` (`from_account`),
  ADD KEY `receiver` (`to_account`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `receiver` FOREIGN KEY (`to_account`) REFERENCES `customers` (`account_no`),
  ADD CONSTRAINT `sender` FOREIGN KEY (`from_account`) REFERENCES `customers` (`account_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
