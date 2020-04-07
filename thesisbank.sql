-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2020 at 03:03 PM
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
(8, 9, 13, 1);

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
(9, '2020-04-07 18:15:04', 'report', 'Your Adviser APPROVED your submission on Week 3 - Journal Report . Check them now!', 0, 0, 'upload-a-file.php');

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
(16, 'Week 1', 1, 1, 2, 'Status Report', '2020-03-11 13:00:00', '2020-03-12 13:00:00', 5),
(18, 'Week 2', 1, 2, 2, 'Status Report', '2020-03-11 13:00:00', '2020-03-14 13:00:00', 4),
(20, 'Week 3', 1, 2, 2, 'Journal Report', '2020-03-23 13:00:00', '2020-03-25 13:00:00', 4),
(21, 'defense1', 1, 1, 2, 'defense1', '2020-03-20 13:00:00', '2020-03-21 13:00:00', 5),
(22, 'mock defense', 1, 1, 2, 'mock defense', '2020-03-13 13:30:00', '2020-03-13 18:00:00', 17),
(24, 'Week 5', 1, 2, 2, 'Journal Report', '2020-04-06 17:00:00', '2020-04-06 20:00:00', 4);

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
  `status` int(1) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `group_id`, `event_id`, `sem_id`, `report_type`, `report_filename`, `status`, `date_created`) VALUES
(14, 20, 16, 1, 1, 'testupload/Booking-com-business-model-canvas-ebook (1).pdf', 3, '2020-03-11 15:58:32'),
(15, 20, 15, 1, 1, 'testupload/Booking-com-business-model-canvas-ebook (1).pdf', 2, '2020-03-12 10:51:13'),
(16, 20, 20, 1, 2, 'testupload/Booking-com-business-model-canvas-ebook (2).pdf', 3, '2020-03-12 10:57:04');

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
(6, 'Archived');

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
(3, '1', 'book 2', 'testupload/Booking-com-business-model-canvas-ebook (2).pdf', '2010', '2020-03-12');

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
(13, 5, 2, 1, 'kent', 'mozo', 'kent', 'mozo', 1, '2020-03-10 20:15:50'),
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
  MODIFY `alertId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `alert_details`
--
ALTER TABLE `alert_details`
  MODIFY `alertDetailsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `calendar_events`
--
ALTER TABLE `calendar_events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reportstatus`
--
ALTER TABLE `reportstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
