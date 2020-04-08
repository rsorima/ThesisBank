-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 11:04 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesisbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `alertId` int(11) NOT NULL,
  `alertDetailsId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `isRead` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`alertId`, `alertDetailsId`, `userId`, `isRead`) VALUES
(1, 1, 4, 1),
(8, 9, 13, 1),
(14, 15, 4, 1),
(15, 16, 4, 1),
(16, 17, 13, 1),
(19, 21, 4, 1),
(20, 22, 13, 1),
(21, 23, 4, 1),
(22, 24, 13, 1),
(23, 25, 19, 0),
(24, 26, 4, 1),
(25, 27, 4, 1),
(26, 28, 13, 1),
(27, 29, 13, 1),
(28, 30, 4, 1),
(29, 31, 13, 1),
(30, 32, 5, 1),
(31, 33, 4, 1),
(32, 35, 4, 1),
(33, 36, 18, 1),
(34, 37, 4, 1),
(35, 38, 4, 1),
(36, 39, 4, 1),
(37, 40, 4, 1),
(38, 41, 4, 1),
(39, 42, 4, 1),
(40, 43, 4, 1),
(41, 44, 4, 1),
(42, 45, 4, 1),
(43, 46, 4, 1),
(44, 47, 13, 1),
(45, 48, 5, 1),
(46, 49, 4, 1),
(47, 50, 13, 0),
(48, 51, 5, 1),
(49, 52, 4, 1),
(50, 53, 18, 1),
(51, 56, 12, 1),
(52, 57, 12, 1),
(53, 58, 12, 1),
(54, 59, 12, 1),
(55, 60, 12, 1);

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
(1, '2020-04-06 15:20:13', 'report', 'A group sent a 1. Check them now!', 0, 0, 'journalreport.php'),
(9, '2020-04-07 18:15:04', 'report', 'Your Adviser APPROVED your submission on Week 3 - Journal Report . Check them now!', 0, 0, 'upload-a-file.php'),
(15, '2020-04-08 15:28:59', 'report', 'group 1 sent a Documentation on Thesis Documentation. Check them now!', 0, 0, 'documentation.php'),
(16, '2020-04-08 20:04:14', 'report', 'group 1 sent a Status Report on Week 2. Check them now!', 0, 0, 'statusreport.php'),
(17, '2020-04-08 20:30:13', 'report', 'Your Adviser created a Status Report DEADLINE ON 2020-04-09 18:00. Check them now!', 0, 0, 'upload-a-file.php'),
(18, '2020-04-08 21:21:13', 'report', 'Your Adviser APPROVED your submission on Thesis Documentation - Documentation . Check them now!', 0, 0, 'upload-a-file.php'),
(21, '2020-04-08 23:27:34', 'report', 'The Coordinator APPROVED your submission on Thesis Documentation - Documentation of group 1. Check them now!', 0, 0, 'documentation.php'),
(22, '2020-04-08 23:35:45', 'report', 'Your Adviser APPROVED your submission on Thesis Documentation - Documentation . Check them now!', 0, 0, 'upload-a-file.php'),
(23, '2020-04-08 23:36:32', 'report', 'The Coordinator APPROVED your submission on Thesis Documentation - Documentation of group 1. Check them now!', 0, 0, 'documentation.php'),
(24, '2020-04-08 23:47:44', 'report', 'The Coordinator created an event on Documentation titled Thesis Chapter 1 DEADLINE ON 2020-04-20 13:00. Check them now!', 0, 0, 'upload-a-file.php'),
(25, '2020-04-08 23:47:44', 'report', 'The Coordinator created an event on Documentation titled Thesis Chapter 1 DEADLINE ON 2020-04-20 13:00. Check them now!', 0, 0, 'upload-a-file.php'),
(26, '2020-04-09 00:02:39', 'report', 'group 1 RESUBMITTED a Documentation on Thesis Documentation. Check them now!', 0, 0, 'documentation.php'),
(27, '2020-04-09 00:02:50', 'report', 'group 1 RESUBMITTED a Documentation on Thesis Documentation. Check them now!', 0, 0, 'documentation.php'),
(28, '2020-04-09 01:38:45', 'report', 'Your Adviser APPROVED your submission on Thesis Documentation - Documentation . Check them now!', 0, 0, 'upload-a-file.php'),
(29, '2020-04-09 01:48:17', 'report', 'Your Adviser APPROVED your submission on Thesis Documentation - Documentation . Check them now!', 0, 0, 'upload-a-file.php'),
(30, '2020-04-09 01:48:17', 'report', 'adviser adviser Submitted Thesis Documentation - Documentation . Check them now!', 0, 0, 'documentation.php'),
(31, '2020-04-09 01:49:54', 'report', 'Your Adviser APPROVED your submission on Thesis Documentation - Documentation . Check them now!', 0, 0, 'upload-a-file.php'),
(32, '2020-04-09 01:49:54', 'report', 'adviser adviser Submitted Thesis Documentation - Documentation . Check them now!', 0, 0, 'documentation.php'),
(33, '2020-04-09 01:52:37', 'report', 'The Coordinator APPROVED your submission on Thesis Documentation - Documentation of group 1. Check them now!', 0, 0, 'documentation.php'),
(34, '2020-04-09 01:52:38', 'report', 'coordinator coordinator Submitted Thesis Documentation - Documentation . Check them now!', 0, 0, 'documentation.php'),
(35, '2020-04-09 01:57:27', 'report', 'The Coordinator APPROVED your submission on Thesis Documentation - Documentation of group 1. Check them now!', 0, 0, 'documentation.php'),
(36, '2020-04-09 01:57:28', 'report', 'coordinator coordinator Submitted Thesis Documentation - Documentation . Check them now!', 0, 0, 'documentation.php'),
(37, '2020-04-09 02:04:24', 'report', 'group 1 sent a Status Report on Week 6. Check them now!', 0, 0, 'statusreport.php'),
(38, '2020-04-09 02:27:12', 'report', 'group 1 RESUBMITTED a Documentation on Thesis Documentation. Check them now!', 0, 0, 'documentation.php'),
(39, '2020-04-09 02:27:49', 'report', 'group 1 RESUBMITTED a Documentation on Thesis Documentation. Check them now!', 0, 0, 'documentation.php'),
(40, '2020-04-09 02:28:13', 'report', 'group 1 sent a Journal Report on Week 5. Check them now!', 0, 0, 'journalreport.php'),
(41, '2020-04-09 02:29:56', 'report', 'group 1 RESUBMITTED a Journal Report on Week 5. Check them now!', 0, 0, 'journalreport.php'),
(42, '2020-04-09 03:09:24', 'report', 'group 1 sent a Documentation on Thesis Documentation. Check them now!', 0, 0, 'documentation.php'),
(43, '2020-04-09 03:09:30', 'report', 'group 1 RESUBMITTED a Documentation on Thesis Documentation. Check them now!', 0, 0, 'documentation.php'),
(44, '2020-04-09 03:11:58', 'report', 'group 1 sent a Documentation on Thesis Documentation. Check them now!', 0, 0, 'documentation.php'),
(45, '2020-04-09 03:15:34', 'report', 'group 1 RESUBMITTED a Documentation on Thesis Documentation. Check them now!', 0, 0, 'documentation.php'),
(46, '2020-04-09 03:15:58', 'report', 'group 1 RESUBMITTED a Documentation on Thesis Documentation. Check them now!', 0, 0, 'documentation.php'),
(47, '2020-04-09 03:28:18', 'report', 'Your Adviser APPROVED your submission on Thesis Documentation - Documentation . Check them now!', 0, 0, 'upload-a-file.php'),
(48, '2020-04-09 03:28:19', 'report', 'adviser adviser Submitted Thesis Documentation - Documentation . Check them now!', 0, 0, 'documentation.php'),
(49, '2020-04-09 03:28:54', 'report', 'The Coordinator REJECTED your submission on Thesis Documentation - Documentation of group 1. Check them now!', 0, 0, 'documentation.php'),
(50, '2020-04-09 03:29:08', 'report', 'Your Adviser APPROVED your submission on Thesis Documentation - Documentation . Check them now!', 0, 0, 'upload-a-file.php'),
(51, '2020-04-09 03:29:08', 'report', 'adviser adviser Submitted Thesis Documentation - Documentation . Check them now!', 0, 0, 'documentation.php'),
(52, '2020-04-09 03:29:24', 'report', 'The Coordinator APPROVED your submission on Thesis Documentation - Documentation of group 1. Check them now!', 0, 0, 'documentation.php'),
(53, '2020-04-09 03:29:24', 'report', 'coordinator coordinator Submitted Thesis Documentation - Documentation . Check them now!', 0, 0, 'documentation.php'),
(54, '2020-04-09 04:15:11', 'report', 'programhead programhead archived  -  . Check them now!', 0, 0, 'documentation.php'),
(55, '2020-04-09 04:15:17', 'report', 'programhead programhead archived  -  . Check them now!', 0, 0, 'documentation.php'),
(56, '2020-04-09 04:20:58', 'report', 'programhead programhead archived Thesis Title - Documentation . Check them now!', 0, 0, 'documentation.php'),
(57, '2020-04-09 04:35:33', 'report', 'programhead programhead archived Thesis Title - Documentation . Check them now!', 0, 0, 'documentation.php'),
(58, '2020-04-09 04:36:19', 'report', 'programhead programhead archived Thesis Title - Documentation . Check them now!', 0, 0, 'documentation.php'),
(59, '2020-04-09 04:43:01', 'report', 'programhead programhead archived Thesis Title - Documentation . Check them now!', 0, 0, 'index.php'),
(60, '2020-04-09 04:58:54', 'report', 'admin admin archived SMART DOOR - An IOT based project - Documentation. Check them now!', 0, 0, 'index.php');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_events`
--

CREATE TABLE `calendar_events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_desc` varchar(255) NOT NULL,
  `date_started` varchar(255) NOT NULL,
  `date_ended` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_events`
--

INSERT INTO `calendar_events` (`event_id`, `event_title`, `event_desc`, `date_started`, `date_ended`) VALUES
(1, 'char', 'char', '2020-03-11 13:00', '2020-03-12 13:00'),
(2, 'char', 'char', '2020-03-11 13:00', '2020-03-12 13:00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sem` int(11) NOT NULL,
  `event_type` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `sem`, `event_type`, `course`, `Description`, `start`, `end`, `user_id`) VALUES
(1, 'Final Defense', 0, 0, 0, 'Final Defense for IT Special Project (THESIS)', '2019-11-04 09:00:00', '2019-11-05 19:00:00', 1),
(10, 'Deliverables Deadline', 0, 0, 0, 'Deadline for Deliverables', '2019-10-29 06:00:00', '2019-10-29 18:00:00', 1),
(13, 'redefense', 0, 0, 0, 'it project', '2019-11-22 13:00:00', '2019-11-22 17:00:00', 0),
(14, 'deliverables', 0, 0, 0, 'passing of status report', '2019-11-22 08:00:00', '2019-11-22 00:59:00', 0),
(15, 'Week 4', 1, 2, 2, 'Status Report', '2020-03-12 18:40:00', '2020-03-18 18:40:00', 4),
(18, 'Week 2', 1, 2, 2, 'Status Report', '2020-03-11 13:00:00', '2020-03-14 13:00:00', 4),
(20, 'Week 3', 1, 2, 2, 'Journal Report', '2020-03-23 13:00:00', '2020-03-25 13:00:00', 4),
(24, 'Week 5', 1, 2, 2, 'Journal Report', '2020-04-06 17:00:00', '2020-04-06 20:00:00', 4),
(28, 'Thesis Documentation', 1, 1, 2, 'Documentation', '2020-04-08 13:00:00', '2020-04-15 13:00:00', 5),
(29, 'Week 6', 1, 2, 2, 'Status Report', '2020-04-09 13:00:00', '2020-04-09 18:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `adviser` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `program` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `adviser`, `sem`, `program`, `name`) VALUES
(20, 4, 1, 2, 'group 1'),
(23, 17, 1, 2, 'group 2'),
(24, 2, 1, 6, 'Group 1 HRM');

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`id`, `group_id`, `user_id`) VALUES
(8, 20, 13),
(12, 23, 19);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` tinyint(1) NOT NULL,
  `code` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `code`, `description`) VALUES
(1, 'N/A', 'Non-Academic'),
(2, 'BSIT', 'Bachelor of Science in Information of Technology'),
(3, 'BSCS', 'Bachelor of Science in Computer Science'),
(4, 'BSCoE', 'Bachelor of Science in Computer Engineering'),
(5, 'BSTM', 'Bachelor of Science in Tourism Management'),
(6, 'BSHRM', 'Bachelor of Science in Hospitality and Restaurant Management');

-- --------------------------------------------------------

--
-- Table structure for table `progress_schedule`
--

CREATE TABLE `progress_schedule` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `report_type` int(11) NOT NULL,
  `report_filename` varchar(255) NOT NULL,
  `report_title` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `group_id`, `event_id`, `sem_id`, `report_type`, `report_filename`, `report_title`, `status`, `date_created`) VALUES
(15, 20, 15, 1, 1, 'testupload/Darcy_accessibleTourism.pdf', '', 2, '2020-04-08 20:02:48'),
(16, 20, 20, 1, 2, 'testupload/Exploring-well-being-as-a-tourism-product-resource.pdf', '', 1, '2020-04-08 20:03:30'),
(23, 20, 18, 1, 1, 'testupload/10.11648.j.ajrs.20170505.11.pdf', '', 1, '2020-04-08 20:04:13'),
(24, 20, 29, 1, 1, 'testupload/char.docx', '', 1, '2020-04-09 02:04:24'),
(25, 20, 24, 1, 2, 'testupload/char2.docx', '', 1, '2020-04-09 02:29:56'),
(27, 20, 28, 1, 3, 'testupload/baboy (Resume).docx', 'Thesis Title', 6, '2020-04-09 03:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `reportstatus`
--

CREATE TABLE `reportstatus` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reportstatus`
--

INSERT INTO `reportstatus` (`id`, `description`) VALUES
(1, 'Submitted'),
(2, 'Declined'),
(3, 'Approved by Adviser'),
(4, 'Approved by Coordinator'),
(5, 'Approved by Program head'),
(6, 'Archived'),
(7, 'Rejected by Coordinator');

-- --------------------------------------------------------

--
-- Table structure for table `report_type`
--

CREATE TABLE `report_type` (
  `id` int(11) NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_type`
--

INSERT INTO `report_type` (`id`, `description`) VALUES
(1, 'Status Report'),
(2, 'Journal'),
(3, 'Document');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1 = 1st sem, 2 = 2nd sem, 3 = summer',
  `start_sy` year(4) NOT NULL COMMENT 'School year start',
  `end_sy` year(4) NOT NULL COMMENT 'School year end',
  `description` varchar(50) NOT NULL COMMENT 'sem description',
  `Active` tinyint(1) NOT NULL COMMENT 'Boolean Status for semester'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `type`, `start_sy`, `end_sy`, `description`, `Active`) VALUES
(1, 1, 2019, 2020, '1st Semester SY: 2019-2020', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sem_type`
--

CREATE TABLE `sem_type` (
  `id` tinyint(1) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sem_type`
--

INSERT INTO `sem_type` (`id`, `description`) VALUES
(1, '1st Semester'),
(2, '2nd Semester'),
(3, 'Summer'),
(5, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `thesis_table`
--

CREATE TABLE `thesis_table` (
  `id` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `thesis_name` varchar(250) NOT NULL,
  `thesis_pdf_file` varchar(250) NOT NULL,
  `thesis_year` varchar(100) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thesis_table`
--

INSERT INTO `thesis_table` (`id`, `course`, `thesis_name`, `thesis_pdf_file`, `thesis_year`, `date_created`) VALUES
(2, '2', 'IOT', 'testupload/Booking-com-business-model-canvas-ebook (1).pdf', '2010', '2020-03-11'),
(3, '1', 'book 2', 'testupload/Booking-com-business-model-canvas-ebook (2).pdf', '2010', '2020-03-12'),
(5, '2', 'Thesis Title', 'testupload/baboy (Resume).docx', '2020', '2020-04-09'),
(6, '2', 'SMART DOOR - An IOT based project', 'testupload/char.pdf', '2019', '2020-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `program` tinyint(1) NOT NULL,
  `sem` int(11) NOT NULL COMMENT 'semester of user',
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `program`, `sem`, `firstname`, `lastname`, `username`, `password`, `status`, `date_created`) VALUES
(1, 1, 1, 0, 'admin', 'admin', 'admin', 'admin', 0, '2020-03-08 11:47:02'),
(2, 4, 1, 0, 'no adviser', 'no adviser', 'no adviser', 'no adviser', 0, '2020-03-11 10:01:02'),
(4, 4, 2, 1, 'adviser', 'adviser', 'adviser', 'adviser', 0, '2020-03-10 21:09:56'),
(5, 3, 2, 1, 'coordinator', 'coordinator', 'coordinator', 'coordinator', 0, '2020-03-10 21:28:37'),
(12, 6, 1, 1, 'librarian', 'librarian', 'librarian', 'librarian', 0, '2020-03-10 23:45:38'),
(13, 5, 2, 1, 'kent', 'mozo', 'kent', 'mozo', 0, '2020-03-10 20:15:50'),
(17, 4, 2, 1, 'adviser2', 'adviser2', 'adviser2', 'adviser2', 0, '2020-03-11 10:50:49'),
(18, 2, 2, 1, 'programhead', 'programhead', 'programhead', 'programhead', 0, '2020-03-11 16:07:03'),
(19, 5, 2, 1, 'reno', 'sorima', 'reno', 'sorima', 0, '2020-03-12 10:19:58'),
(20, 3, 6, 1, 'HRM coordinator', 'HRM coordinator', 'HRM coordinator', 'coordinator', 0, '2020-03-19 00:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` tinyint(1) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `description`) VALUES
(1, 'Admin'),
(2, 'Program Head'),
(3, 'Coordinator'),
(4, 'Adviser'),
(5, 'Student'),
(6, 'Librarian');

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
-- Indexes for table `calendar_events`
--
ALTER TABLE `calendar_events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adviser` (`adviser`),
  ADD KEY `program` (`program`),
  ADD KEY `sem` (`sem`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`group_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress_schedule`
--
ALTER TABLE `progress_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sem` (`sem`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `sem_id` (`sem_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `reportstatus`
--
ALTER TABLE `reportstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_type`
--
ALTER TABLE `report_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sem_fk` (`type`) USING BTREE;

--
-- Indexes for table `sem_type`
--
ALTER TABLE `sem_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thesis_table`
--
ALTER TABLE `thesis_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_keys` (`role`,`program`),
  ADD KEY `program` (`program`),
  ADD KEY `sem_FK` (`sem`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `alertId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `alert_details`
--
ALTER TABLE `alert_details`
  MODIFY `alertDetailsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `calendar_events`
--
ALTER TABLE `calendar_events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `progress_schedule`
--
ALTER TABLE `progress_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reportstatus`
--
ALTER TABLE `reportstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `report_type`
--
ALTER TABLE `report_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sem_type`
--
ALTER TABLE `sem_type`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `thesis_table`
--
ALTER TABLE `thesis_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`adviser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `groups_ibfk_3` FOREIGN KEY (`program`) REFERENCES `programs` (`id`),
  ADD CONSTRAINT `groups_ibfk_4` FOREIGN KEY (`sem`) REFERENCES `semester` (`id`);

--
-- Constraints for table `group_members`
--
ALTER TABLE `group_members`
  ADD CONSTRAINT `group_members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `group_members_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `progress_schedule`
--
ALTER TABLE `progress_schedule`
  ADD CONSTRAINT `progress_schedule_ibfk_1` FOREIGN KEY (`sem`) REFERENCES `semester` (`id`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`id`),
  ADD CONSTRAINT `report_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`type`) REFERENCES `sem_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `user_roles` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`program`) REFERENCES `programs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
