-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2019 at 07:31 AM
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
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `branchid` int(11) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `flag` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branchid`, `coursecode`, `branch_name`, `flag`) VALUES
(1, 'BSIT', 'Bachelor of Science in Information Technology', 0),
(2, 'BSTM', 'Bachelor of Science in Tourism Management', 0),
(3, 'BSHRM', 'Bachelor of Science in Hotel & Restaurant Management', 0),
(4, 'BSCpE', 'Bachelor of Science in Computer Engineering', 0),
(11, 'BSCS', 'Bachelor of Science in Computer Science', 0);

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
  `thesis_timestamp` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tdb_thesis`
--

INSERT INTO `tdb_thesis` (`id`, `reference_key_admin`, `reference_key_students`, `thesis_name`, `thesis_year`, `thesis_program`, `thesis_pdf_file`, `thesis_achievement`, `thesis_timestamp`) VALUES
(9, 1, 1, 'test123123123123123', '2021', 'SOFTWARE ENGINEERING', '1', 'Best in thesis', '1'),
(10, 1, 1, 'test12', '2012', 'BSIT', 'piece-puzzle-icon-isolated-on-transparent-vector-25702640.jpg', 'Best in thesis', '1570399343'),
(11, 1, 1, 'Psalms thesis', '2019', 'SOFTWARE ENGINEERING', 'Chrysanthemum.jpg', 'Best in documentation', '1570399501'),
(12, 1, 1, 'this is thesis', '2010', 'BSIT', 'logo.png.png', 'Best in thesis', '1570404045'),
(13, 1, 1, 'this is thesis 2', '2010', 'BSIT', 'sample.png', 'Best in documentation', '1570404081'),
(14, 1, 1, 'this is a new pdf', '2016', 'SOFTWARE ENGINEERING', 'sample.pdf', 'Best in thesis', '1570404362'),
(15, 1, 1, 'Psalms thesis', '2010', 'BSIT', 'sample.pdf', 'Best in thesis,Best in documentation', '1570405723'),
(16, 1, 1, 'sahm', '2017', 'SOFTWARE ENGINEERING', 'sample.pdf', '', '1570407795'),
(17, 1, 1, 'sample1', '2016', 'SENIOR HIGH', 'sample.pdf', '', '1570408105'),
(18, 1, 1, 'sample2', '2014', 'BSIT', '02_LCD_Slide_Handout_1(2).pdf', '', '1570408162');

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
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=latin1;

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
(059, 'Jennyfer', 'Pactor', 0, 'Jhenn', '1234', 0, 1, 0, 0),
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
(120, 'Eunice', 'Galicia', 0, 'Eunice', '1234', 0, 5, 0, 0),
(121, 'Rodrigo', 'Rodriguez', 0, 'RR', '1234', 0, 3, 0, 0),
(123, 'Vincent Bryan', 'Calija', 0, '0001', '1234', 2, 1, 0, 0),
(124, 'Charizza', 'Alvarado', 0, '112233', '1234', 4, 0, 0, 0),
(152, 'Jhennyfer', 'Pactor', 0, '445566', '1234', 4, 0, 0, 0),
(153, 'Edith', 'Balili', 0, 'Edith', '1234', 3, 0, 0, 0),
(154, 'ss', 'ss', 0, 'ss', 'ss', 5, 0, 0, 0);

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
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branchid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `shs_strand`
--
ALTER TABLE `shs_strand`
  MODIFY `strand_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tdb_thesis`
--
ALTER TABLE `tdb_thesis`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `usertype` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` bigint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=155;
--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `yearid` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
