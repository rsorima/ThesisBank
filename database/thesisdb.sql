-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2019 at 09:13 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thesisdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `eventId` int(11) NOT NULL,
  `eventTitle` varchar(255) NOT NULL,
  `eventSummary` varchar(255) NOT NULL,
  `eventDate` date NOT NULL,
  `timeStart` time NOT NULL,
  `timeEnd` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventId`, `eventTitle`, `eventSummary`, `eventDate`, `timeStart`, `timeEnd`) VALUES
(1, 'sfadf', 'fsdf', '2019-10-26', '01:00:00', '13:00:00'),
(2, 'sample', 'summar', '2019-10-28', '01:00:00', '12:00:00'),
(3, 'dad', 'asdasdas', '2019-10-23', '14:13:00', '02:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `tdb_admin`
--

CREATE TABLE IF NOT EXISTS `tdb_admin` (
  `id` int(20) NOT NULL,
  `reference_key_user` int(20) NOT NULL,
  `fullname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tdb_advisers`
--

CREATE TABLE IF NOT EXISTS `tdb_advisers` (
  `id` int(20) NOT NULL,
  `reference_key_user` int(20) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `program` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tdb_coordinator`
--

CREATE TABLE IF NOT EXISTS `tdb_coordinator` (
  `id` int(20) NOT NULL,
  `reference_key_user` int(20) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `program` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tdb_documents`
--

CREATE TABLE IF NOT EXISTS `tdb_documents` (
  `id` int(20) NOT NULL,
  `reference_key_adviser` int(20) DEFAULT NULL,
  `reference_key_student` int(20) DEFAULT NULL,
  `document_file` varchar(250) NOT NULL,
  `reference_key_coordinator` int(20) DEFAULT NULL,
  `document_notes` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tdb_librarian`
--

CREATE TABLE IF NOT EXISTS `tdb_librarian` (
  `id` int(20) NOT NULL,
  `reference_key_user` int(20) NOT NULL,
  `fullname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tdb_programhead`
--

CREATE TABLE IF NOT EXISTS `tdb_programhead` (
  `id` int(20) NOT NULL,
  `reference_key_user` int(20) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `program` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tdb_students`
--

CREATE TABLE IF NOT EXISTS `tdb_students` (
  `id` int(20) NOT NULL,
  `reference_key_user` int(20) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `course` varchar(250) NOT NULL
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tdb_thesis`
--

INSERT INTO `tdb_thesis` (`id`, `reference_key_admin`, `reference_key_students`, `thesis_name`, `thesis_year`, `thesis_program`, `thesis_pdf_file`, `thesis_achievement`, `thesis_timestamp`) VALUES
(19, 1, 1, 'Mocks', '2010', 'BSIT', 'FILIPINO-TALUMPATI.docx', '', '1571334342'),
(22, 1, 1, 'Galasgaw', '2010', 'BSIT', 'QRSHIt.png', '', '1571410171'),
(23, 1, 1, 'SIBAT', '2010', 'BSIT', 'LENNY-JANE-Corbita.pdf', '', '1571410324'),
(24, 1, 1, 'edu', '2010', 'SOFTWARE ENGINEERING', 'QRSHIt.png', '', '1571500583'),
(25, 1, 1, 'ssssss1', '2014', '', 'QRSHIt.png', '', '1571510690'),
(26, 1, 1, 'edusoy', '2012', '', 'QRSHIt.png', '', '1571510724'),
(27, 1, 1, 'Japeth', '2010', '', 'LENNY-JANE-Corbita.pdf', '', '1571511569'),
(28, 1, 1, 'In Search of Credibility ', '2010', '', 'WEBPROG_01_LCD_Slide_Handout_1(13).pdf', '', '1571730346'),
(29, 1, 1, 'Final Defense', '2019', '', 'Standard Contract - Household.docx', '', '1572418124');

-- --------------------------------------------------------

--
-- Table structure for table `tdb_user`
--

CREATE TABLE IF NOT EXISTS `tdb_user` (
  `id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `user_timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tdb_user`
--

INSERT INTO `tdb_user` (`id`, `username`, `password`, `type`, `user_timestamp`) VALUES
(1, 'admin', 'admin', 'admin', '12312312312');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(255) NOT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `type`, `status`) VALUES
(1, 'programhead', 'programhead', 0, 0),
(2, 'coordinator', 'coordinator', 1, 1),
(3, 'adviser', 'adviser', 2, 0),
(4, 'librarian', 'librarian', 3, 0),
(5, 'student', 'student', 4, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventId`);

--
-- Indexes for table `tdb_admin`
--
ALTER TABLE `tdb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tdb_advisers`
--
ALTER TABLE `tdb_advisers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tdb_coordinator`
--
ALTER TABLE `tdb_coordinator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tdb_documents`
--
ALTER TABLE `tdb_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tdb_librarian`
--
ALTER TABLE `tdb_librarian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tdb_programhead`
--
ALTER TABLE `tdb_programhead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tdb_students`
--
ALTER TABLE `tdb_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tdb_thesis`
--
ALTER TABLE `tdb_thesis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tdb_user`
--
ALTER TABLE `tdb_user`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_2` (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tdb_thesis`
--
ALTER TABLE `tdb_thesis`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tdb_user`
--
ALTER TABLE `tdb_user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
