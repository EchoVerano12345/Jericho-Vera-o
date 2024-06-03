-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 04:39 AM
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
-- Database: `tjen`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `Id` int(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `chat_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`Id`, `firstName`, `lastName`, `email`, `password`, `account_type`, `chat_status`) VALUES
(1, 'Corven Yves', 'Jabonete', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Offline'),
(2, 'Jericho', 'Veraño', 'admin2@gmail.com', 'd1133275ee2118be63a577af759fc052', 'admin', 'Active now');

-- --------------------------------------------------------

--
-- Table structure for table `tblchat`
--

CREATE TABLE `tblchat` (
  `messageId` int(11) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `date_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblchat`
--

INSERT INTO `tblchat` (`messageId`, `receiver`, `sender`, `message`, `date_time`) VALUES
(1, 'Corven Yves Jabonete', 'Kenneth Catolico Bologa', 'Corv', '2023-07-06 16:27:20'),
(2, 'Kenneth Catolico Bologa', 'Corven Yves Jabonete', 'Corvs', '2023-07-06 16:32:38'),
(3, 'Corven Yves Jabonete', 'Kenneth Catolico Bologa', 'GG', '2023-07-06 16:36:44'),
(4, 'Kenneth Catolico Bologa', 'Corven Yves Jabonete', 'LL', '2023-07-06 16:36:51'),
(5, 'Kenneth Catolico Bologa', 'Corven Yves Jabonete', 'Kenneth', '2023-07-06 16:37:24'),
(6, 'Kenneth Catolico Bologa', 'Corven Yves Jabonete', 'Ken', '2023-07-06 16:39:31'),
(7, 'Kenneth Catolico Bologa', 'Corven Yves Jabonete', 'Kenneth pisot', '2023-07-06 16:40:43'),
(8, 'Kenneth Catolico Bologa', 'Corven Yves Jabonete', 'Ok kaayo', '2023-07-06 16:42:20'),
(9, 'Corven Yves Jabonete', 'Kenneth Catolico Bologa', 'Corvss', '2023-07-06 16:42:37'),
(10, 'Kenneth Catolico Bologa', 'Corven Yves Jabonete', 'kenneth pangit', '2023-07-06 16:44:35'),
(11, 'Kenneth Catolico Bologa', 'Corven Yves Jabonete', 'Kenneth ', '2023-07-06 16:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `tblclient`
--

CREATE TABLE `tblclient` (
  `CustId` int(200) NOT NULL,
  `firstName` varchar(250) NOT NULL,
  `middleName` varchar(250) NOT NULL,
  `lastName` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `mobilenumber` varchar(250) NOT NULL,
  `chat_status` varchar(200) NOT NULL,
  `date_created` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblclient`
--

INSERT INTO `tblclient` (`CustId`, `firstName`, `middleName`, `lastName`, `gender`, `email`, `password`, `mobilenumber`, `chat_status`, `date_created`) VALUES
(2, 'Winnie', 'The', 'Pooh', 'Male', 'email@gmail.com', 'd1133275ee2118be63a577af759fc052', '+63912345678910', 'Active now', '2023-06-20'),
(3, 'Kenneth', 'Catolico', 'Bologa', 'Male', 'kenneth@gmail.com', '7ca955bd92ca8b00548ddf36d2e79217', '092545678912', 'Active now', '2023-06-29 14:18:42'),
(5, 'Angelyn', 'Emperio', 'Bacadon', '', 'example@gmail.com', '202cb962ac59075b964b07152d234b70', '09123456789', 'Offline', '2023-07-06 04:33:35'),
(6, 'asd', 'zxc', 'fgh', '', 'test1@gmail.com', '202cb962ac59075b964b07152d234b70', '09090909090', 'Active now', '2023-07-06 05:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE `tblemployee` (
  `employeeId` int(255) NOT NULL,
  `employeename` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `serviceId` int(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`employeeId`, `employeename`, `position`, `serviceId`, `link`, `status`) VALUES
(1, 'Maureen Obtial', 'Hairstylist', 1, 'https://www.facebook.com/myrna.palencia.397?mibextid=ZbWKwL', 'available'),
(2, 'Analiza Sugian', 'Nail Technician', 2, 'https://www.facebook.com/jamaica.sugian?mibextid=ZbWKwL', 'available'),
(3, 'Sardan Montajes', 'Barber', 4, 'https://www.facebook.com/sardan.montajes?mibextid=ZbWKwL', 'available'),
(4, 'Carl Velvestre', 'Senior Hairstylist', 4, 'https://www.facebook.com/profile.php?id=100006894074868&mibextid=ZbWKwL', 'available'),
(5, 'Roy Bilbao', 'Hairstylist', 4, 'https://www.facebook.com/Royenaguasbilbao?mibextid=ZbWKwL', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `tblfaq`
--

CREATE TABLE `tblfaq` (
  `questionId` int(255) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfaq`
--

INSERT INTO `tblfaq` (`questionId`, `question`, `answer`, `status`) VALUES
(1, 'What time are we open? ', '10:00AM TO 9:00PM', 'active'),
(2, 'Where is the location of your shop?', 'Laurel St.,Barangay North,General Santos City', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tblrating`
--

CREATE TABLE `tblrating` (
  `Id` int(250) NOT NULL,
  `transactionId` int(250) NOT NULL,
  `hairstylistID` int(250) NOT NULL,
  `CustId` int(250) NOT NULL,
  `ratings` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblschedule`
--

CREATE TABLE `tblschedule` (
  `Id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblschedule`
--

INSERT INTO `tblschedule` (`Id`, `time`, `status`) VALUES
(1, '8:00AM', 'available'),
(2, '8:30AM', 'available'),
(3, '9:00AM', 'available'),
(4, '9:30AM', 'available'),
(5, '10:00AM', 'available'),
(6, '10:30AM', 'available'),
(8, '11:30AM', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `serviceId` int(255) NOT NULL,
  `serviceName` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` varchar(15) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`serviceId`, `serviceName`, `description`, `price`, `picture`, `status`) VALUES
(1, 'Manicure', '', '150', 'upload/woman-nail-salon-receiving-manicure-by-beautician-beauty-treatment-concept.jpg', 'available'),
(2, 'Pedicure', '', '180', 'upload/pedicurist-master-makes-pedicure-woman-s-legs-spa-treatment-concept.jpg', 'available'),
(3, 'Foot Spa', '', '400', 'upload/spa-treatment-product-female-feet-hand-spa(1).jpg', 'available'),
(4, 'Haircut', '', '200', 'upload/woman-cutting-hair-man-salon.jpg', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaction`
--

CREATE TABLE `tbltransaction` (
  `transactionId` int(11) NOT NULL,
  `CustId` varchar(255) NOT NULL,
  `clientName` varchar(255) NOT NULL,
  `date_booked` varchar(255) NOT NULL,
  `preferred_time` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `employeeId` varchar(20) NOT NULL,
  `serviceId` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `ratings` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltransaction`
--

INSERT INTO `tbltransaction` (`transactionId`, `CustId`, `clientName`, `date_booked`, `preferred_time`, `branch`, `employeeId`, `serviceId`, `status`, `ratings`) VALUES
(1, '1', 'Joshua Luna', '2023-05-29', '8:00AM', 'Select Branches', '1', '1', 'Completed', '5'),
(2, '1', 'Joshua Luna', '2029-05-29', '8:00AM', 'SM Gensan', '2', '2', 'Completed', '4.5'),
(3, '1', 'Joshua Luna', '2023-05-29', '8:00AM', 'SM Gensan', '1', '2', 'Completed', '5'),
(4, '1', 'Joshua Luna', '2029-05-05', '8:00AM', 'SM Gensan', '2', '1', 'Pending', '5'),
(5, '5', 'Angelyn Bacadon', '2023-07-11', '11:30AM', 'SM Gensan', 'Sardan Montajes', '', 'Pending', '0'),
(6, '5', 'Angelyn Bacadon', '2023-07-13', '10:30AM', 'SM Gensan', 'Myrna Palencia', '', 'Pending', '0'),
(7, '5', 'Angelyn Bacadon', '2023-07-10', '10:00AM', 'SM Gensan', 'Roy Bilbao', '4', 'Completed', '0'),
(8, '5', 'Angelyn Bacadon', '2023-08-07', '8:00AM', 'SM Gensan', 'Sardan Montajes', '4', 'Pending', '0'),
(9, '6', 'asd fgh', '2023-08-07', '8:00AM', 'SM Gensan', 'Sardan Montajes', '4', 'Pending', '0'),
(10, '6', 'asd fgh', '2023-07-26', '10:00AM', 'SM Gensan', 'Myrna Palencia', '1', 'Pending', '0'),
(11, '3', 'Kenneth Bologa', '2023-07-07', '8:00AM', 'SM Gensan', 'Myrna Palencia', '1', 'Pending', '0'),
(12, '3', 'Kenneth Bologa', '2023-07-07', '8:00AM', 'SM Gensan', '', '1', 'Pending', '0'),
(13, '3', 'Kenneth Bologa', '2023-07-07', '8:30AM', 'SM Gensan', 'Myrna Palencia', '1', 'Pending', '0'),
(14, '3', 'Kenneth Bologa', '2023-07-13', '10:00AM', 'SM Gensan', '1', '1', 'Reserved', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblchat`
--
ALTER TABLE `tblchat`
  ADD PRIMARY KEY (`messageId`);

--
-- Indexes for table `tblclient`
--
ALTER TABLE `tblclient`
  ADD PRIMARY KEY (`CustId`);

--
-- Indexes for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`employeeId`);

--
-- Indexes for table `tblfaq`
--
ALTER TABLE `tblfaq`
  ADD PRIMARY KEY (`questionId`);

--
-- Indexes for table `tblrating`
--
ALTER TABLE `tblrating`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblschedule`
--
ALTER TABLE `tblschedule`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`serviceId`);

--
-- Indexes for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  ADD PRIMARY KEY (`transactionId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblchat`
--
ALTER TABLE `tblchat`
  MODIFY `messageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblclient`
--
ALTER TABLE `tblclient`
  MODIFY `CustId` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblemployee`
--
ALTER TABLE `tblemployee`
  MODIFY `employeeId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblfaq`
--
ALTER TABLE `tblfaq`
  MODIFY `questionId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblrating`
--
ALTER TABLE `tblrating`
  MODIFY `Id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblschedule`
--
ALTER TABLE `tblschedule`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `serviceId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  MODIFY `transactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
