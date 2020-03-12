-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 04:21 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

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
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `alertId` int(11) NOT NULL,
  `alertDetailsId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `isRead` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`alertId`, `alertDetailsId`, `userId`, `isRead`) VALUES
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
(38, 84, 59, 1),
(39, 85, 155, 1),
(40, 86, 155, 1),
(41, 87, 182, 1),
(42, 88, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `alert_details`
--

CREATE TABLE `alert_details` (
  `alertDetailsId` int(11) NOT NULL,
  `alertDate` datetime NOT NULL DEFAULT current_timestamp(),
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
(86, '2019-11-18 08:21:16', 'report', 'A group sent a Status Report. Check them now!', 0, 0, 'statusreport.php'),
(87, '2019-11-19 20:07:04', 'report', 'A group sent a Journal Report. Check them now!', 0, 0, 'journalreport.php'),
(88, '2019-11-19 20:08:04', 'report', 'A group sent a Journal Report. Check them now!', 0, 0, 'journalreport.php');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branchid` int(11) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `flag` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `Description`, `start`, `end`) VALUES
(1, 'Final Defense', 'Final Defense for IT Special Project (THESIS)', '2019-11-04 09:00:00', '2019-11-05 19:00:00'),
(10, 'Deliverables Deadline', 'Deadline for Deliverables', '2019-10-29 06:00:00', '2019-10-29 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `branchid` int(11) NOT NULL,
  `adviser_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `branchid`, `adviser_id`) VALUES
(24, 'group 1', 1, 182);

-- --------------------------------------------------------

--
-- Table structure for table `group_users`
--

CREATE TABLE `group_users` (
  `groupUserId` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_users`
--

INSERT INTO `group_users` (`groupUserId`, `group_id`, `user_id`) VALUES
(15, 23, 166),
(16, 23, 110),
(17, 23, 167),
(18, 24, 168),
(19, 24, 169),
(20, 24, 170),
(21, 24, 171);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `adviser_id` int(11) NOT NULL,
  `coordinator_id` int(11) NOT NULL,
  `report_file` blob NOT NULL,
  `report_type` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `student_id`, `adviser_id`, `coordinator_id`, `report_file`, `report_type`, `date_created`) VALUES
(38, 0, 155, 59, 0x30325f4c43445f536c6964655f48616e646f75745f312832292e706466, 'Journal Report', '2019-11-04 03:31:12'),
(39, 0, 155, 59, 0x30325f4c43445f536c6964655f48616e646f75745f312832292e706466, 'Journal Report', '2019-11-04 03:31:12'),
(40, 110, 155, 0, 0x30325f48616e646f75745f31352e706466, 'Status Report', '2019-11-04 04:01:58'),
(41, 0, 155, 59, 0x30325f48616e646f75745f31352e706466, 'Status Report', '2019-11-04 04:15:36'),
(42, 0, 155, 59, 0x30325f48616e646f75745f31352e706466, 'Status Report', '2019-11-04 05:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `shs_strand`
--

CREATE TABLE `shs_strand` (
  `strand_id` int(11) NOT NULL,
  `strand_code` varchar(20) NOT NULL,
  `strand_description` varchar(255) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tdb_thesis`
--

CREATE TABLE `tdb_thesis` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tdb_thesis`
--

INSERT INTO `tdb_thesis` (`id`, `reference_key_admin`, `reference_key_students`, `thesis_name`, `thesis_year`, `thesis_program`, `thesis_pdf_file`, `thesis_achievement`, `thesis_timestamp`, `branchid`) VALUES
(20, 1, 1, 'sample thesis document 1', '2012', '', 'sample.pdf', '', '1574159902', 1),
(21, 1, 1, 'sample thesis document 2', '2010', '', 'sample.pdf', '', '1574159925', 1),
(22, 1, 1, 'sample thesis document 3', '2015', '', 'sample.pdf', '', '1574160032', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `usertype` int(11) NOT NULL,
  `typename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `users` (
  `userid` bigint(3) UNSIGNED ZEROFILL NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `contact` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` int(11) NOT NULL,
  `branchid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `flagg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `firstname`, `lastname`, `contact`, `username`, `password`, `usertype`, `branchid`, `status`, `flagg`) VALUES
(059, 'Jennyfer', 'Pactor', 0, 'DVO-18-0702-001', 'sti', 0, 1, 0, 0),
(060, 'admin', 'admin', 0, 'admin', 'admin', 1, 0, 1, 0),
(062, 'zxc', 'zxc', 0, 'zxc', 'zxc', 1, 0, 0, 0),
(119, 'Emmy', 'Requillo', 0, 'DVO-16-0613-005', 'sti', 0, 4, 0, 0),
(121, 'Rodrigo', 'Rodriguez', 0, 'DVO-17-0401-002', 'sti', 0, 3, 0, 0),
(123, 'Vincent Bryan', 'Calija', 0, '10000003870 ', 'sti', 2, 1, 0, 0),
(153, 'Edith', 'Balili', 0, 'DVO-09-0707-001', 'sti', 3, 0, 0, 0),
(168, 'Rich Psalms', 'Lopez', 0, '10000118547', 'sti', 5, 1, 0, 0),
(169, 'Dats Jayson', 'Astapan', 0, '10000118254', 'sti', 5, 1, 0, 0),
(170, 'Rexsa Angela', 'Salvador', 0, '10000118750', 'sti', 5, 1, 0, 0),
(171, 'Ian Emmanuel', 'Romuar', 0, '10000118730', 'sti', 5, 1, 0, 0),
(172, 'Carl Dennis', 'Derramas', 0, '10000118392', 'sti', 5, 1, 0, 0),
(173, 'Lyle Justin', 'Prevendido', 0, '10000118696', 'sti', 5, 1, 0, 0),
(174, 'Mj Scotti', 'Gresos', 0, '10000118475', 'sti', 5, 1, 0, 0),
(175, 'Mike Fernee', 'Jaranilla', 0, '10000118502', 'sti', 5, 1, 0, 0),
(176, 'Edrian', 'Martinez', 0, '2000018836', 'sti', 5, 1, 0, 0),
(177, 'Juna', 'Dajang', 0, '2000112899', 'sti', 5, 1, 0, 0),
(178, 'Nino', 'Muring', 0, '2000064772', 'sti', 5, 1, 0, 0),
(179, 'Clyde Anthony', 'Migue', 0, '10000118607 ', 'sti', 5, 1, 0, 0),
(180, 'LexFrevail', 'Nervida', 0, 'ADV-18-0702-001', 'sti', 4, 1, 0, 0),
(181, 'Emmy Grace', 'Tolentino', 0, 'ADV-16-0613-005', 'sti', 4, 1, 0, 0),
(182, 'Eddie Vic', 'Alacaba', 0, 'ADV-16-0620-006', 'sti', 4, 1, 0, 0),
(183, 'Jennyfer', 'Pactor', 0, 'ADV-11-0613-002', 'sti', 4, 1, 1, 0),
(184, 'Charizza Mae', 'Alvarado', 0, 'ADV-19-0401-002', 'sti', 4, 1, 0, 0),
(185, 'sample', 'sample', 0, 'sample', 'sample', 5, 1, 0, 0),
(186, 'sample1', 'sample1', 0, 'sample1', 'sample1', 5, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `yearid` int(255) NOT NULL,
  `year` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `alertId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `alert_details`
--
ALTER TABLE `alert_details`
  MODIFY `alertDetailsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branchid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `group_users`
--
ALTER TABLE `group_users`
  MODIFY `groupUserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `shs_strand`
--
ALTER TABLE `shs_strand`
  MODIFY `strand_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tdb_thesis`
--
ALTER TABLE `tdb_thesis`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `usertype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` bigint(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `yearid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
