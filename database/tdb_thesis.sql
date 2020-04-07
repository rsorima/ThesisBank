-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 06:44 PM
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
(24, 1, 1, 'A-Data-driven-Approach-for-Detecting-Stress-in-Plants-Using-Hyper', '2010', '', 'A-Data-driven-Approach-for-Detecting-Stress-in-Plants-Using-Hyper.pdf', '', '1574353623', 4),
(25, 1, 1, 'Analysis-of-Social-Unrest-Events-using-Spatio-Temporal-Data-Clust', '2011', '', 'Analysis-of-Social-Unrest-Events-using-Spatio-Temporal-Data-Clust.pdf', '', '1574353644', 4),
(26, 1, 1, 'Dimensional-Analysis-of-Robot-Software-without-Developer-Annotati', '2012', '', 'Dimensional-Analysis-of-Robot-Software-without-Developer-Annotati.pdf', '', '1574353709', 4),
(27, 1, 1, 'Distributed-Edge-Bundling-for-Large-Graphs', '2013', '', 'Distributed-Edge-Bundling-for-Large-Graphs.pdf', '', '1574353732', 4),
(28, 1, 1, 'GAINDroid_-General-Automated-Incompatibility-Notifier-for-Android', '2014', '', 'GAINDroid_-General-Automated-Incompatibility-Notifier-for-Android.pdf', '', '1574353772', 4),
(29, 1, 1, 'Image-Processing-Algorithms-for-Elastin-Lamellae-Inside-Cardiovas', '2015', '', 'Image-Processing-Algorithms-for-Elastin-Lamellae-Inside-Cardiovas.pdf', '', '1574353827', 4),
(30, 1, 1, 'New-Algorithms-for-Large-Datasets-and-Distributions', '2016', '', 'New-Algorithms-for-Large-Datasets-and-Distributions.pdf', '', '1574353846', 4),
(31, 1, 1, 'Scheduling-and-Prefetching-in-Hadoop-with-Block-Access-Pattern-Aw', '2017', '', 'Scheduling-and-Prefetching-in-Hadoop-with-Block-Access-Pattern-Aw.pdf', '', '1574353861', 4),
(32, 1, 1, 'Template-Research-Proposal', '2018', '', 'Template-Research-Proposal.pdf', '', '1574353878', 4),
(33, 1, 1, 'A_Pilot_Study_of_an_mHealth_Application', '2010', '', 'A_Pilot_Study_of_an_mHealth_Application.pdf', '', '1574353975', 5),
(34, 1, 1, 'A_SURVEY_ON_AI_WITH_CYBER_SECURITY', '2011', '', 'A_SURVEY_ON_AI_WITH_CYBER_SECURITY.pdf', '', '1574353993', 5),
(35, 1, 1, 'Analysis_of_Online_Discount_Sales_and_Pr', '2012', '', 'Analysis_of_Online_Discount_Sales_and_Pr.pdf', '', '1574354014', 5),
(36, 1, 1, 'Application_of_Radicalism_Diagnose_for_S', '2014', '', 'Application_of_Radicalism_Diagnose_for_S.pdf', '', '1574354043', 5),
(37, 1, 1, 'Critical_Thinking_About_Urban_Studies_Li', '2015', '', 'Critical_Thinking_About_Urban_Studies_Li.pdf', '', '1574354081', 5),
(38, 1, 1, 'heriam', '2016', '', 'heriam.pdf', '', '1574354094', 5),
(39, 1, 1, 'LOCAL_REGION_PSEUDO-ZERNIKE_MOMENT-_BASE', '2017', '', 'LOCAL_REGION_PSEUDO-ZERNIKE_MOMENT-_BASE.pdf', '', '1574354126', 5),
(40, 1, 1, 'Posthumanistic', '2018', '', 'Posthumanistic.pdf', '', '1574354158', 5),
(41, 1, 1, 'Processing_Remote_Sensing_Data_Using_Erd', '2018', '', 'Processing_Remote_Sensing_Data_Using_Erd.pdf', '', '1574354182', 5),
(42, 1, 1, 'Steganography_in_Arabic_text_using_Kashi', '2019', '', 'Steganography_in_Arabic_text_using_Kashi.pdf', '', '1574354197', 5),
(43, 1, 1, 'Anime-pilgrimage-in-Japan-Focusing-Social-Influences-as-determinants', '2010', '', 'A_Pilot_Study_of_an_mHealth_Application.pdf', '', '1574354470', 2),
(44, 1, 1, 'Authenticity-and-place-attachment-of-major-visitor-attractions', '2011', '', 'Authenticity-and-place-attachment-of-major-visitor-attractions.pdf', '', '1574354530', 2),
(45, 1, 1, 'Exploring-the-impact-of-personalized-management-responses-on-tourists-satisfaction-A-topic-matching-perspective', '2012', '', 'Exploring-the-impact-of-personalized-management-responses-on-tourists-satisfaction-A-topic-matching-perspective.pdf', '', '1574354548', 2),
(46, 1, 1, 'Individualorganization-and-structure-Rethinking-social-construction-of-every-day-life-at-work-place-in-tourism-industry', '2014', '', 'Individualorganization-and-structure-Rethinking-social-construction-of-every-day-life-at-work-place-in-tourism-industry.pdf', '', '1574354642', 2),
(47, 1, 1, 'Land-use-suitability-analysis-of-rural-tourism-activities-YeniceTurkey', '2015', '', 'Land-use-suitability-analysis-of-rural-tourism-activities-YeniceTurkey.pdf', '', '1574354733', 2),
(48, 1, 1, 'Merging-the-norm-activation-model-and-the-theory-of-planned-behavior-in-the-context-of-drone-food-delivery-services', '2016', '', 'Merging-the-norm-activation-model-and-the-theory-of-planned-behavior-in-the-context-of-drone-food-delivery-services.pdf', '', '1574354747', 2),
(49, 1, 1, 'Progress-in-dark-tourism-and-thanatourism-research-An-uneasyrelationship-with-heritage-tourism', '2017', '', 'Progress-in-dark-tourism-and-thanatourism-research-An-uneasyrelationship-with-heritage-tourism.pdf', '', '1574354848', 2),
(50, 1, 1, 'The-impact-of-value-co-creation-on-hotel-brand-equity-and-customersatisfaction', '2018', '', 'The-impact-of-value-co-creation-on-hotel-brand-equity-and-customersatisfaction.pdf', '', '1574354863', 2),
(51, 1, 1, 'The-social-economic-and-environmental-impacts-of-casino-gamblingon-the-residents-of-Macau-and-Singapore', '2019', '', 'The-social-economic-and-environmental-impacts-of-casino-gamblingon-the-residents-of-Macau-and-Singapore.pdf', '', '1574354877', 2),
(52, 1, 1, 'A_Comparative_Study_on_Number_of_Cluster', '2010', '', 'A_Comparative_Study_on_Number_of_Cluster.pdf', '', '1574355268', 1),
(53, 1, 1, 'A_Pilot_Study_of_an_mHealth_Application', '2011', '', 'A_Pilot_Study_of_an_mHealth_Application.pdf', '', '1574355342', 1),
(54, 1, 1, 'A_Proposed_Framework_for_How_the_Interna', '2012', '', 'A_Proposed_Framework_for_How_the_Interna.pdf', '', '1574355402', 1),
(55, 1, 1, 'A_STUDY_ON_HOW_INFORMATION_TECHNOLOGY_IN', '2012', '', 'A_STUDY_ON_HOW_INFORMATION_TECHNOLOGY_IN.pdf', '', '1574355444', 1),
(56, 1, 1, 'A_SURVEY_ON_AI_WITH_CYBER_SECURITY', '2013', '', 'A_SURVEY_ON_AI_WITH_CYBER_SECURITY.pdf', '', '1574355489', 1),
(57, 1, 1, 'An_E-Management_System_for_Nigerian_Civi', '2014', '', 'An_E-Management_System_for_Nigerian_Civi.pdf', '', '1574355502', 1),
(58, 1, 1, 'AN_INTEGRATED_SYSTEM_FRAMEWORK_FOR_PREDI', '2015', '', 'An_E-Management_System_for_Nigerian_Civi.pdf', '', '1574355536', 1),
(59, 1, 1, 'Analysis_of_Online_Discount_Sales_and_Pr', '2015', '', 'AN_INTEGRATED_SYSTEM_FRAMEWORK_FOR_PREDI.pdf', '', '1574355566', 1),
(60, 1, 1, 'Application_of_Radicalism_Diagnose_for_S', '2015', '', 'Application_of_Radicalism_Diagnose_for_S.pdf', '', '1574355598', 1),
(61, 1, 1, 'CYBER_SECURITY_ISSUES_AND_CHALLENGES_-_A', '2016', '', 'CYBER_SECURITY_ISSUES_AND_CHALLENGES_-_A.pdf', '', '1574355616', 1),
(62, 1, 1, 'Implementing_a_Fused_Machine_Learning_Mo', '2016', '', 'Implementing_a_Fused_Machine_Learning_Mo.pdf', '', '1574355662', 1),
(63, 1, 1, 'It-mediated_technologies_in_developing_c (1)', '2017', '', 'It-mediated_technologies_in_developing_c (1).pdf', '', '1574355732', 1),
(64, 1, 1, 'MATBASE_AUTOFUNCTION_NON-RELATIONAL_CONS', '2018', '', 'MATBASE_AUTOFUNCTION_NON-RELATIONAL_CONS.pdf', '', '1574355755', 1),
(65, 1, 1, 'Performance_evaluation_of_locally_produc', '2018', '', 'Performance_evaluation_of_locally_produc.pdf', '', '1574355832', 1),
(66, 1, 1, 'Platform_Urbanism_Creativity_and_the_New', '2018', '', 'Platform_Urbanism_Creativity_and_the_New.pdf', '', '1574355867', 1),
(67, 1, 1, 'Principle_of_Active_System_Safety_Challe', '2018', '', 'Principle_of_Active_System_Safety_Challe.pdf', '', '1574355884', 1),
(68, 1, 1, 'Protecting_the_Internet_from_Dictators_T', '2018', '', 'Protecting_the_Internet_from_Dictators_T.pdf', '', '1574355900', 1),
(69, 1, 1, 'Reshaping_Libraries_for_the_21_st_Centur', '2018', '', 'Reshaping_Libraries_for_the_21_st_Centur.pdf', '', '1574355916', 1),
(70, 1, 1, 'Significance_of_Big_Data_and_Analytics_o', '2019', '', 'Significance_of_Big_Data_and_Analytics_o.pdf', '', '1574355928', 1),
(71, 1, 1, 'Understanding-the-importance-that-consumers-attach-to-social-mediasharing-ISMS-Scale-development-and-validation (1)', '2019', '', 'Understanding-the-importance-that-consumers-attach-to-social-mediasharing-ISMS-Scale-development-and-validation (1).pdf', '', '1574355942', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tdb_thesis`
--
ALTER TABLE `tdb_thesis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tdb_thesis`
--
ALTER TABLE `tdb_thesis`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
