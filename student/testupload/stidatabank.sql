-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2019 at 01:31 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stidatabank`
--

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE IF NOT EXISTS `alerts` (
  `alertId` int(11) NOT NULL,
  `alertDetailsId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `isRead` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`alertId`, `alertDetailsId`, `userId`, `isRead`) VALUES
(1, 4, 94, 0),
(2, 4, 95, 0),
(3, 4, 154, 0),
(4, 5, 94, 0),
(5, 5, 95, 0),
(6, 5, 154, 0),
(7, 53, 155, 1),
(8, 54, 155, 1),
(9, 55, 155, 1),
(10, 56, 155, 1),
(11, 57, 59, 1),
(12, 58, 59, 1),
(13, 59, 59, 1),
(14, 60, 59, 1),
(15, 61, 155, 1),
(16, 62, 155, 1),
(17, 63, 59, 1),
(18, 64, 59, 1),
(19, 65, 59, 1),
(20, 66, 59, 1),
(21, 67, 59, 1),
(22, 68, 155, 1),
(23, 69, 59, 1),
(24, 70, 59, 1),
(25, 71, 59, 1),
(26, 72, 59, 1),
(27, 73, 59, 1),
(28, 74, 59, 1),
(29, 75, 59, 1),
(30, 76, 59, 1),
(31, 77, 59, 1),
(32, 78, 59, 1),
(33, 79, 59, 1),
(34, 80, 59, 1),
(35, 81, 59, 1),
(36, 82, 155, 1),
(37, 83, 59, 1),
(38, 84, 59, 1);

-- --------------------------------------------------------

--
-- Table structure for table `alert_details`
--

CREATE TABLE IF NOT EXISTS `alert_details` (
  `alertDetailsId` int(11) NOT NULL,
  `alertDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `alertType` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `dynamicId` int(11) NOT NULL,
  `branchid` int(11) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4;

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
(52, '2019-11-02 02:37:32', 'event', 'sample ni', 3, 1, ''),
(53, '2019-11-02 20:57:14', 'report', 'A group sent a Status Report. Check them now!', 0, 0, 'reports.php'),
(54, '2019-11-02 21:00:02', 'report', 'A group sent a Status Report. Check them now!', 0, 0, 'statusreport.php'),
(55, '2019-11-02 21:03:05', 'report', 'A group sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(56, '2019-11-02 21:13:29', 'report', 'A group sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(57, '2019-11-02 21:53:58', 'report', 'An Adviser sent a . Check them now!', 0, 0, 'journalreport.php'),
(58, '2019-11-02 21:55:49', 'report', 'An Adviser sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(59, '2019-11-02 21:57:14', 'report', 'An Adviser sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(60, '2019-11-02 22:00:09', 'report', 'An Adviser sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(61, '2019-11-02 22:04:25', 'report', 'A group sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(62, '2019-11-02 22:04:37', 'report', 'A group sent a Status Report. Check them now!', 0, 0, 'statusreport.php'),
(63, '2019-11-02 22:07:16', 'report', 'An Adviser sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(64, '2019-11-02 22:10:14', 'report', 'An Adviser sent a Status Report. Check them now!', 0, 0, 'statusreport.php'),
(65, '2019-11-02 22:11:33', 'report', 'An Adviser sent a Status Report. Check them now!', 0, 0, 'statusreport.php'),
(66, '2019-11-02 22:20:56', 'report', 'An Adviser sent a Status Report. Check them now!', 0, 0, 'statusreport.php'),
(67, '2019-11-03 13:36:06', 'report', 'An Adviser sent a Status Report. Check them now!', 0, 0, 'statusreport.php'),
(68, '2019-11-04 11:27:26', 'report', 'A group sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(69, '2019-11-04 11:27:59', 'report', 'An Adviser sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(70, '2019-11-04 11:30:54', 'report', 'An Adviser sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(71, '2019-11-04 11:31:09', 'report', 'An Adviser sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(72, '2019-11-04 11:31:09', 'report', 'An Adviser sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(73, '2019-11-04 11:31:10', 'report', 'An Adviser sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(74, '2019-11-04 11:31:10', 'report', 'An Adviser sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(75, '2019-11-04 11:31:10', 'report', 'An Adviser sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(76, '2019-11-04 11:31:11', 'report', 'An Adviser sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(77, '2019-11-04 11:31:11', 'report', 'An Adviser sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(78, '2019-11-04 11:31:11', 'report', 'An Adviser sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(79, '2019-11-04 11:31:12', 'report', 'An Adviser sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(80, '2019-11-04 11:31:12', 'report', 'An Adviser sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(81, '2019-11-04 11:31:12', 'report', 'An Adviser sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(82, '2019-11-04 12:01:58', 'report', 'A group sent a Status Report. Check them now!', 0, 0, 'statusreport.php'),
(83, '2019-11-04 12:15:36', 'report', 'An Adviser sent a Status Report. Check them now!', 0, 0, 'statusreport.php'),
(84, '2019-11-04 13:53:26', 'report', 'An Adviser sent a Status Report. Check them now!', 0, 0, 'statusreport.php');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `branchid` int(11) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `flag` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branchid`, `coursecode`, `branch_name`, `flag`) VALUES
(1, 'BSIT', 'Bachelor of Science in Information Technology', 0),
(2, 'BSTM', 'Bachelor of Science in Tourism Management', 0),
(3, 'BSHRM', 'Bachelor of Science in Hotel & Restaurant Management', 0),
(4, 'BSCpE', 'Bachelor of Science in Computer Engineering', 0),
(5, 'BSCS', 'Bachelor of Science in Computer Science', 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `Description`, `start`, `end`) VALUES
(1, 'Final Defense', 'Final Defense for IT Special Project (THESIS)', '2019-11-04 09:00:00', '2019-11-05 19:00:00'),
(2, 'Mock', 'Mock', '2019-11-10 02:00:00', '2019-11-11 21:54:00'),
(3, 'Mock', 'Mock', '2019-11-10 02:00:00', '2019-11-11 21:54:00'),
(4, 'Mock', 'Mock1', '2019-11-10 02:01:00', '2019-11-10 23:59:00'),
(6, 'Mock2', 'Mock2', '2019-10-24 09:00:00', '2019-10-25 22:02:00'),
(10, 'Deliverables Deadline', 'Deadline for Deliverables', '2019-10-29 06:00:00', '2019-10-29 18:00:00'),
(12, 'Birthday', 'Birthday ni Paolo', '2019-10-30 06:00:00', '2019-10-30 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `branchid` int(11) NOT NULL,
  `adviser_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `branchid`, `adviser_id`) VALUES
(2, 'Group 1', 3, 0),
(3, 'Group 2', 1, 155),
(18, 'Group 2', 3, 0),
(19, 'lopez', 1, 0),
(20, 'Group 1', 5, 161);

-- --------------------------------------------------------

--
-- Table structure for table `group_users`
--

CREATE TABLE IF NOT EXISTS `group_users` (
  `groupUserId` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_users`
--

INSERT INTO `group_users` (`groupUserId`, `group_id`, `user_id`) VALUES
(4, 2, 155),
(5, 2, 114),
(8, 3, 110),
(9, 20, 164),
(10, 20, 162),
(11, 20, 163),
(12, 20, 113);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `report_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `adviser_id` int(11) NOT NULL,
  `coordinator_id` int(11) NOT NULL,
  `report_file` blob NOT NULL,
  `report_type` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `student_id`, `adviser_id`, `coordinator_id`, `report_file`, `report_type`, `date_created`) VALUES
(4, 110, 0, 0, 0x67656e64657220616e642066656d696e6973742070657273706563746976657320696e20746f757269736d2072657365617263682e706466, '', '2019-11-02 07:32:26'),
(5, 110, 91, 0, 0x4e55525455524552535f4353412d54522d323030342d31302e706466, '', '2019-11-02 08:49:55'),
(7, 110, 91, 0, 0x4c454e4e592d4a414e452d436f72626974612e706466, 'Journal Report', '2019-11-02 09:06:17'),
(8, 110, 91, 0, 0x546865204e6174696f6e616c20546f757269736d205265736561726368204167656e64612e706466, 'Status Report', '2019-11-02 09:07:36'),
(9, 110, 91, 0, 0x736861772d66696e2d657461707320436f452e706466, 'Journal Report', '2019-11-02 09:18:11'),
(19, 110, 155, 0, 0x4c454e4e592d4a414e452d436f72626974612e706466, 'Journal Report', '2019-11-02 14:04:25'),
(20, 110, 155, 0, 0x44617263795f61636365737369626c65546f757269736d2e706466, 'Status Report', '2019-11-02 14:04:37'),
(21, 0, 155, 59, 0x4c454e4e592d4a414e452d436f72626974612e706466, 'Journal Report', '2019-11-02 14:07:16'),
(22, 0, 155, 59, 0x44617263795f61636365737369626c65546f757269736d2e706466, 'Status Report', '2019-11-02 14:10:14'),
(23, 0, 155, 59, 0x44617263795f61636365737369626c65546f757269736d2e706466, 'Status Report', '2019-11-02 14:11:33'),
(24, 0, 155, 59, 0x44617263795f61636365737369626c65546f757269736d2e706466, 'Status Report', '2019-11-02 14:20:56'),
(25, 0, 155, 59, 0x44617263795f61636365737369626c65546f757269736d2e706466, 'Status Report', '2019-11-03 05:36:06'),
(26, 110, 155, 0, 0x30325f4c43445f536c6964655f48616e646f75745f312832292e706466, 'Journal Report', '2019-11-04 03:27:26'),
(27, 0, 155, 59, 0x30325f4c43445f536c6964655f48616e646f75745f312832292e706466, 'Journal Report', '2019-11-04 03:27:59'),
(28, 0, 155, 59, 0x30325f4c43445f536c6964655f48616e646f75745f312832292e706466, 'Journal Report', '2019-11-04 03:30:54'),
(29, 0, 155, 59, 0x30325f4c43445f536c6964655f48616e646f75745f312832292e706466, 'Journal Report', '2019-11-04 03:31:09'),
(30, 0, 155, 59, 0x30325f4c43445f536c6964655f48616e646f75745f312832292e706466, 'Journal Report', '2019-11-04 03:31:09'),
(31, 0, 155, 59, 0x30325f4c43445f536c6964655f48616e646f75745f312832292e706466, 'Journal Report', '2019-11-04 03:31:09'),
(32, 0, 155, 59, 0x30325f4c43445f536c6964655f48616e646f75745f312832292e706466, 'Journal Report', '2019-11-04 03:31:10'),
(33, 0, 155, 59, 0x30325f4c43445f536c6964655f48616e646f75745f312832292e706466, 'Journal Report', '2019-11-04 03:31:10'),
(34, 0, 155, 59, 0x30325f4c43445f536c6964655f48616e646f75745f312832292e706466, 'Journal Report', '2019-11-04 03:31:10'),
(35, 0, 155, 59, 0x30325f4c43445f536c6964655f48616e646f75745f312832292e706466, 'Journal Report', '2019-11-04 03:31:11'),
(36, 0, 155, 59, 0x30325f4c43445f536c6964655f48616e646f75745f312832292e706466, 'Journal Report', '2019-11-04 03:31:11'),
(37, 0, 155, 59, 0x30325f4c43445f536c6964655f48616e646f75745f312832292e706466, 'Journal Report', '2019-11-04 03:31:11'),
(38, 0, 155, 59, 0x30325f4c43445f536c6964655f48616e646f75745f312832292e706466, 'Journal Report', '2019-11-04 03:31:12'),
(39, 0, 155, 59, 0x30325f4c43445f536c6964655f48616e646f75745f312832292e706466, 'Journal Report', '2019-11-04 03:31:12'),
(40, 110, 155, 0, 0x30325f48616e646f75745f31352e706466, 'Status Report', '2019-11-04 04:01:58'),
(41, 0, 155, 59, 0x30325f48616e646f75745f31352e706466, 'Status Report', '2019-11-04 04:15:36'),
(42, 0, 155, 59, 0x30325f48616e646f75745f31352e706466, 'Status Report', '2019-11-04 05:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `shs_strand`
--

CREATE TABLE IF NOT EXISTS `shs_strand` (
  `strand_id` int(11) NOT NULL,
  `strand_code` varchar(20) NOT NULL,
  `strand_description` varchar(255) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tdb_thesis`
--

CREATE TABLE IF NOT EXISTS `tdb_thesis` (
  `id` int(20) NOT NULL,
  `reference_key_admin` int(20) DEFAULT NULL,
  `reference_key_students` int(20) DEFAULT NULL,
  `thesis_name` varchar(250) NOT NULL,
  `thesis_year` varchar(250) NOT NULL,
  `thesis_program` varchar(250) NOT NULL,
  `thesis_pdf_file` varchar(250) NOT NULL,
  `thesis_achievement` varchar(250) NOT NULL,
  `thesis_timestamp` varchar(250) NOT NULL,
  `branchid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tdb_thesis`
--

INSERT INTO `tdb_thesis` (`id`, `reference_key_admin`, `reference_key_students`, `thesis_name`, `thesis_year`, `thesis_program`, `thesis_pdf_file`, `thesis_achievement`, `thesis_timestamp`, `branchid`) VALUES
(9, 1, 1, 'test123123123123123', '2021', 'SOFTWARE ENGINEERING', '1', 'Best in thesis', '1', 1),
(10, 1, 1, 'test12', '2012', 'BSIT', 'piece-puzzle-icon-isolated-on-transparent-vector-25702640.jpg', 'Best in thesis', '1570399343', 1),
(11, 1, 1, 'Psalms thesis', '2019', 'SOFTWARE ENGINEERING', 'Chrysanthemum.jpg', 'Best in documentation', '1570399501', 1),
(12, 1, 1, 'this is thesis', '2010', 'BSIT', 'logo.png.png', 'Best in thesis', '1570404045', 1),
(13, 1, 1, 'this is thesis 2', '2010', 'BSIT', 'sample.png', 'Best in documentation', '1570404081', 1),
(14, 1, 1, 'this is a new pdf', '2016', 'SOFTWARE ENGINEERING', 'sample.pdf', 'Best in thesis', '1570404362', 1),
(15, 1, 1, 'Psalms thesis', '2010', 'BSIT', 'sample.pdf', 'Best in thesis,Best in documentation', '1570405723', 1),
(16, 1, 1, 'sahm', '2017', 'SOFTWARE ENGINEERING', 'sample.pdf', '', '1570407795', 1),
(17, 1, 1, 'sample1', '2016', 'SENIOR HIGH', 'sample.pdf', '', '1570408105', 1),
(18, 1, 1, 'sample2', '2014', 'BSIT', '02_LCD_Slide_Handout_1(2).pdf', '', '1570408162', 1),
(19, 1, 1, 'sample thesis document', '2019', '', '02_Handout_15.pdf', '', '1572839796', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `usertype` int(11) NOT NULL,
  `typename` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`usertype`, `typename`) VALUES
(1, 'Coordinator'),
(2, 'Adviser');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` bigint(3) unsigned zerofill NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `contact` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` int(11) NOT NULL,
  `branchid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `flagg` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `firstname`, `lastname`, `contact`, `username`, `password`, `usertype`, `branchid`, `status`, `flagg`) VALUES
(033, 'Admin', 'Admin', 123, 'admin', 'admin', 1, 0, 1, 0),
(050, 'Edith', 'Balili', 0, 'Editha', 'Balili', 1, 0, 0, 0),
(053, 'Edith', 'Balili', 0, 'editha', '123', 1, 0, 0, 0),
(054, 'ediths', 'balils', 0, 'ebals', '123', 1, 0, 0, 0),
(056, 'lenny', 'corbita', 0, 'lenny', 'corbs', 1, 0, 0, 0),
(057, 'Vincent', 'Calija', 0, 'vincent', '1234', 2, 0, 0, 0),
(059, 'Jennyfer', 'Pactor', 0, 'Jhenn', '1234', 0, 1, 1, 0),
(060, 'christian', 'corbita', 0, 'chan', 'chanchan', 1, 0, 0, 0),
(062, 'zxc', 'zxc', 0, 'zxc', 'zxc', 1, 0, 0, 0),
(069, 'Elvi Lito', 'Ubas', 0, 'Elvi', 'ubas', 2, 0, 0, 0),
(087, 'Eddie Vic', 'Alacaba', 0, '223344', '123', 4, 0, 0, 0),
(088, 'Emmy', 'Requillo', 0, '334455', '1234', 4, 0, 0, 0),
(089, 'Lexfrevail', 'Nervida', 0, '556677', '1234', 4, 0, 0, 0),
(091, 'Salveah', 'Saclauso', 0, '667788', '1234', 4, 0, 0, 0),
(094, 'Rich Psalm', 'Lopez', 0, '1234', '1234', 5, 0, 0, 0),
(095, 'Abdul barr', 'Sansarona', 0, 'abdul', '1234', 5, 0, 0, 0),
(104, 'asdasd', 'asdasdas', 0, '312312', 'asdasdas', 0, 0, 0, 0),
(106, 'Isda', 'Isdanapula', 0, 'isda', 'sadas', 0, 0, 0, 0),
(110, 'Rich Psalm', 'Lopez', 0, 'Sahm', '1234', 5, 1, 0, 0),
(111, 'Sansan', 'Ambot', 0, 'Sansan', '1234', 5, 2, 0, 0),
(112, 'Gian', 'Perez', 0, 'Gian', '1234', 5, 4, 0, 0),
(113, 'Karryl', 'Quilet', 0, 'Karryl', '1234', 5, 5, 0, 0),
(114, 'Kurt', 'Gonzales', 0, 'Kurt', '1234', 5, 3, 0, 0),
(115, 'Avel', 'Moscare', 0, 'Avel', '1234', 5, 11, 0, 0),
(117, 'Rashid', 'Amerkhan', 0, 'Rashid', '1234', 0, 2, 0, 0),
(118, 'Lexfrevail', 'Nervida', 0, 'Leks', '1234', 0, 11, 0, 0),
(119, 'Emmy', 'Requillo', 0, 'Emmy', '1234', 0, 4, 0, 0),
(121, 'Rodrigo', 'Rodriguez', 0, 'RR', '1234', 0, 3, 0, 0),
(123, 'Vincent Bryan', 'Calija', 0, '0001', '1234', 2, 1, 0, 0),
(124, 'Charizza', 'Alvarado', 0, '112233', '1234', 4, 0, 0, 0),
(152, 'Jhennyfer', 'Pactor', 0, '445566', '1234', 4, 0, 0, 0),
(153, 'Edith', 'Balili', 0, 'Edith', '1234', 3, 0, 0, 0),
(155, 'Charizza ', 'Alvarado', 0, 'chacha', '1234', 4, 1, 0, 0),
(156, 'Eddie VIc', 'Alacaba', 0, 'Eddie', '1234', 4, 4, 0, 0),
(161, 'Lexfrevail', 'Nervida', 0, 'Leks', '1234', 4, 5, 0, 0),
(162, 'Avel', 'Moscare', 0, 'Aveel', 'sahm', 5, 5, 0, 0),
(163, 'Aprilyn', 'Gimay', 0, 'April', '1234', 5, 5, 0, 0),
(164, 'Abdulbarr', 'Sansan', 0, 'sansan', 'ambot', 5, 5, 0, 0),
(165, 'Eddie Vic', 'Alacaba', 0, 'Edz', '1234', 4, 5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE IF NOT EXISTS `year` (
  `yearid` int(255) NOT NULL,
  `year` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`yearid`, `year`) VALUES
(1, 2000),
(2, 2001),
(3, 2002),
(4, 2003);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`alertId`);

--
-- Indexes for table `alert_details`
--
ALTER TABLE `alert_details`
  ADD PRIMARY KEY (`alertDetailsId`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branchid`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `group_users`
--
ALTER TABLE `group_users`
  ADD PRIMARY KEY (`groupUserId`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `shs_strand`
--
ALTER TABLE `shs_strand`
  ADD PRIMARY KEY (`strand_id`);

--
-- Indexes for table `tdb_thesis`
--
ALTER TABLE `tdb_thesis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`usertype`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`yearid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `alertId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `alert_details`
--
ALTER TABLE `alert_details`
  MODIFY `alertDetailsId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branchid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `group_users`
--
ALTER TABLE `group_users`
  MODIFY `groupUserId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `shs_strand`
--
ALTER TABLE `shs_strand`
  MODIFY `strand_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tdb_thesis`
--
ALTER TABLE `tdb_thesis`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `usertype` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` bigint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `yearid` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
