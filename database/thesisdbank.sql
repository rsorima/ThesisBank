-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2019 at 08:47 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thesisdbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar_events`
--

CREATE TABLE IF NOT EXISTS `calendar_events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_desc` varchar(255) NOT NULL,
  `date_started` varchar(255) NOT NULL,
  `date_ended` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(12) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `adviser_id` int(12) NOT NULL,
  `sem_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_users`
--

CREATE TABLE IF NOT EXISTS `group_users` (
  `group_user_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `group_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE IF NOT EXISTS `programs` (
  `program_id` int(12) NOT NULL,
  `program_code` varchar(255) NOT NULL,
  `program_desc` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program_code`, `program_desc`) VALUES
(1, 'N/A', 'Non-Academic'),
(2, 'BSIT', 'Bachelor of Science in Information of Technology'),
(3, 'BSCS', 'Bachelor of Science in Computer Science'),
(4, 'BSCoE', 'Bachelor of Science in Computer Engineering'),
(5, 'BSTM', 'Bachelor of Science in Tourism Management'),
(6, 'BSHRM', 'Bachelor of Science in Hospitality and Restaurant Management');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `report_id` int(12) NOT NULL,
  `report_type_id` int(12) NOT NULL,
  `report_name` varchar(255) NOT NULL,
  `report_file_name` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report_type`
--

CREATE TABLE IF NOT EXISTS `report_type` (
  `report_type_id` int(12) NOT NULL,
  `report_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `research_proposal`
--

CREATE TABLE IF NOT EXISTS `research_proposal` (
  `r_id` int(11) NOT NULL,
  `group_id` int(12) NOT NULL,
  `coordinator_id` int(12) NOT NULL,
  `r_name` int(11) NOT NULL,
  `r_year` int(11) NOT NULL,
  `r_program` int(11) NOT NULL,
  `r_file_name` int(11) NOT NULL,
  `r_date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE IF NOT EXISTS `semesters` (
  `sem_id` int(12) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `sem_type_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sem_type`
--

CREATE TABLE IF NOT EXISTS `sem_type` (
  `sem_type_id` int(11) NOT NULL,
  `sem_details` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(12) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `user_type_id` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `program_id` int(12) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0 - OFFLINE 1 - ONLINE',
  `date_created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `firstname`, `lastname`, `user_type_id`, `username`, `password`, `program_id`, `status`, `date_created`) VALUES
(1, 'Christian Jay', 'Corbita', 1, 'chanchan', '1234', 1, 1, '2019-11-09 10:23:37'),
(3, 'Emmy Grace', 'Tolentino', 5, '16-0613-005', '1234', 2, 0, '2019-11-15 13:52:52'),
(4, 'Lexfrevail', 'Nervida', 4, '18-0702-001', '1234', 3, 0, '2019-11-15 13:53:42'),
(5, 'Jhennyfer ', 'Pactor', 4, '11-0613-002', '1234', 2, 0, '2019-11-15 13:54:33'),
(6, 'Rashid', 'Amerkhan', 2, 'Rashid', '1234', 5, 0, '2019-11-15 13:55:01'),
(7, 'Rich Psalms', 'Lopez', 6, 'Sahm', '1234', 2, 0, '2019-11-15 15:22:19'),
(8, 'Paolo', 'Tambis', 6, 'Pao', '81dc9bdb52d04dc20036dbd8313ed055', 2, 0, '2019-11-15 22:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `user_type_id` int(12) NOT NULL,
  `user_type_Name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type_Name`) VALUES
(1, 'Admin'),
(2, 'ProgramHead'),
(3, 'Librarian'),
(4, 'Coordinator'),
(5, 'Adviser'),
(6, 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`), ADD KEY `group_adviser_id_fkey` (`adviser_id`), ADD KEY `sem_id_fkey` (`sem_id`);

--
-- Indexes for table `group_users`
--
ALTER TABLE `group_users`
  ADD PRIMARY KEY (`group_user_id`), ADD KEY `user_id_fkey` (`user_id`), ADD KEY `group_id_fkey` (`group_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`), ADD KEY `report_type_id` (`report_type_id`);

--
-- Indexes for table `report_type`
--
ALTER TABLE `report_type`
  ADD PRIMARY KEY (`report_type_id`);

--
-- Indexes for table `research_proposal`
--
ALTER TABLE `research_proposal`
  ADD KEY `group_id_fkey_r` (`group_id`), ADD KEY `coordinator_id_fkey_r` (`coordinator_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`sem_id`), ADD KEY `sem_type_id_fkey` (`sem_type_id`);

--
-- Indexes for table `sem_type`
--
ALTER TABLE `sem_type`
  ADD PRIMARY KEY (`sem_type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`), ADD KEY `utype_gkey` (`user_type_id`), ADD KEY `programid_fkey` (`program_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `group_users`
--
ALTER TABLE `group_users`
  MODIFY `group_user_id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `report_type`
--
ALTER TABLE `report_type`
  MODIFY `report_type_id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `sem_id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sem_type`
--
ALTER TABLE `sem_type`
  MODIFY `sem_type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`adviser_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_users`
--
ALTER TABLE `group_users`
ADD CONSTRAINT `group_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `group_users_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`report_type_id`) REFERENCES `report_type` (`report_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`user_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `programs` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
