-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2019 at 07:46 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stidatabank`
--

-- --------------------------------------------------------

--
-- Table structure for table `alert_details`
--

CREATE TABLE `alert_details` (
  `alertDetailsId` int(11) NOT NULL,
  `alertDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `alertType` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `dynamicId` int(11) NOT NULL,
  `branchid` int(11) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alert_details`
--

INSERT INTO `alert_details` (`alertDetailsId`, `alertDate`, `alertType`, `message`, `dynamicId`, `branchid`, `link`) VALUES
(4, '2019-11-01 00:03:29', 'event', 'This is a message', 2, 0, ''),
(5, '2019-11-01 01:01:59', 'event', 'This is a message 2', 2, 0, ''),
(6, '2019-11-01 10:18:09', 'event', 'sample ni', 3, 2, ''),
(7, '2019-11-01 10:19:52', 'event', 'sample ni', 3, 2, ''),
(8, '2019-11-01 10:20:13', 'event', 'sample ni', 3, 2, 'great!'),
(49, '2019-11-02 02:17:32', 'event', 'sample ni', 3, 2, 'great!'),
(50, '2019-11-02 02:20:32', 'event', 'The Coordinator added an event. Check it now!', 2, 2, 'student-calendar.php'),
(51, '2019-11-02 02:33:58', 'event', 'The Coordinator added an event. Check it now!', 2, 1, 'student-calendar.php'),
(52, '2019-11-02 02:37:32', 'event', 'sample ni', 3, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alert_details`
--
ALTER TABLE `alert_details`
  ADD PRIMARY KEY (`alertDetailsId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alert_details`
--
ALTER TABLE `alert_details`
  MODIFY `alertDetailsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
