-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2017 at 05:37 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `application-form`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

DROP TABLE IF EXISTS `candidates`;
CREATE TABLE `candidates` (
  `candidate_id` int(11) NOT NULL,
  `last_name` varchar(30) CHARACTER SET latin1 NOT NULL,
  `first_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `middle_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `address` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `city` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `state` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `zip` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `phone_home` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `phone_work` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `mobile` varchar(25) CHARACTER SET latin1 NOT NULL,
  `email` varchar(120) CHARACTER SET latin1 NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `source` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `source_name` varchar(500) DEFAULT NULL,
  `if_selected_when_join` date DEFAULT NULL,
  `can_relocate` tinyint(4) DEFAULT NULL,
  `current_pay` int(11) DEFAULT NULL,
  `best_fit` text,
  `intersting_about_you` text,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidate_id`, `last_name`, `first_name`, `middle_name`, `address`, `city`, `state`, `zip`, `phone_home`, `phone_work`, `mobile`, `email`, `date_of_birth`, `gender`, `source`, `source_name`, `if_selected_when_join`, `can_relocate`, `current_pay`, `best_fit`, `intersting_about_you`, `date_created`, `date_modified`) VALUES
(1, 'shah', 'parthiv', '', '', 'baroda', 'Guajrat', '', '', '', '5555555555', '2585shah@gmail.com', NULL, '', '', NULL, NULL, NULL, 45000, NULL, NULL, '2017-03-23 02:20:58', '2017-03-23 02:20:58'),
(4, 'Shah', 'Nilam', 'Parthiv', '104 Rajeswear gold  view , harni road \r\nbaroda', 'Baroda', 'Gujarat', '390022', '8140342881', '8140342881', '7383119597', 'nilam@gmail.com', '2008-05-09', 'Female', 'Facebook', NULL, '2017-09-23', 1, 40000, 'Why do you think you are the best fit for this position1', 'What is interesting about you2', '2017-03-23 02:35:18', '2017-03-23 06:22:45'),
(5, 'Shah', 'Swara', 'Parthiv', 'Baroda', 'Baroda', 'Gujarat', '390022', '', '', '4444444444', 'swara@gmail.com', NULL, '', '', NULL, NULL, NULL, 55000, 'dsfdsf', 'sfsdf', '2017-03-23 03:57:53', '2017-03-23 03:57:53'),
(6, 'Patel', 'Sunil', '', 'Dakor', 'Dakor', 'Gujarat', '', '', '', '1593578521', 'sunil@gmail.com', '1985-05-02', 'Male', 'LinkedIn', NULL, '2017-10-25', NULL, 78000, NULL, NULL, '2017-03-24 02:24:17', '2017-03-24 02:24:17'),
(7, 'Shah', 'Monark', 'Ram', 'A-4 Gogul dham socity', 'Dakor', 'Gujarat', '390019', '', '', '73831119597', 'monark@gmail.com', '1985-05-02', 'Male', 'Twitter', NULL, '2017-04-03', 1, 4500, 'Test', 'test 1', '2017-03-24 05:02:40', '2017-03-24 05:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `candidates_document`
--

DROP TABLE IF EXISTS `candidates_document`;
CREATE TABLE `candidates_document` (
  `candidates_document_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `document` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates_document`
--

INSERT INTO `candidates_document` (`candidates_document_id`, `candidate_id`, `title`, `document`) VALUES
(2, 4, 'resume one', '1490293365_912597_02032017.docx'),
(3, 4, 'resume Two', '1490293365_599884_FireShotScreenCapture001Engagetedxtysonstedxtysonscomengage.png'),
(4, 7, 'Resume', '1490374960_92285_02032017.docx'),
(5, 7, 'Resume 1', '1490374960_185821_02032017.docx');

-- --------------------------------------------------------

--
-- Table structure for table `candidates_educational`
--

DROP TABLE IF EXISTS `candidates_educational`;
CREATE TABLE `candidates_educational` (
  `candidates_educational_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `college_name` varchar(80) CHARACTER SET latin1 NOT NULL,
  `major` varchar(80) CHARACTER SET latin1 NOT NULL,
  `university` varchar(80) CHARACTER SET latin1 NOT NULL,
  `graduation_year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidates_educational`
--

INSERT INTO `candidates_educational` (`candidates_educational_id`, `candidate_id`, `college_name`, `major`, `university`, `graduation_year`) VALUES
(1, 1, 'HHC', 'HSC', 'Dakor', 2002),
(9, 5, 'MD', 'MD', 'Ex', 2027),
(10, 4, 'SSS1', 'SSS', 'GSEB', 2000),
(11, 4, 'HSC', 'HSC', 'GSEB', 2002),
(12, 4, 'B.Com', 'B.Com', 'S.P.Uni', 2015),
(13, 6, 'C.P', 'C.P', 'S.P', 2005),
(17, 7, 'SSC', 'SSC', 'Dakor', 2000),
(18, 7, 'HHC', 'HSC', 'Umrath', 2002),
(19, 7, 'B.Com', 'B.Com', 'Dakor', 2005);

-- --------------------------------------------------------

--
-- Table structure for table `candidates_extracurricular_activity`
--

DROP TABLE IF EXISTS `candidates_extracurricular_activity`;
CREATE TABLE `candidates_extracurricular_activity` (
  `candidates_extracurricular_activity_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `extracurricular_activity` varchar(80) CHARACTER SET latin1 NOT NULL,
  `activity_type` varchar(80) CHARACTER SET latin1 NOT NULL,
  `position_hold` varchar(80) CHARACTER SET latin1 NOT NULL,
  `awards` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidates_extracurricular_activity`
--

INSERT INTO `candidates_extracurricular_activity` (`candidates_extracurricular_activity_id`, `candidate_id`, `extracurricular_activity`, `activity_type`, `position_hold`, `awards`) VALUES
(3, 5, 'EA1', '1', '5', '8'),
(4, 4, 'Tell us 1', 'Tell us 2', 'Tell us 3', 'Tell us 4'),
(5, 4, 'Tell us 5', 'Tell us 6', 'Tell us 7', 'Tell us8'),
(9, 7, 'Tell us 1', 'Tell us 2', 'Tell us 3', 'Tell us 4'),
(10, 7, 'Tell us 5', 'Tell us 6', 'Tell us 7', 'Tell us 8'),
(11, 7, 'Tell us 7', 'Tell us 8', 'Tell us 7', 'Tell us 10');

-- --------------------------------------------------------

--
-- Table structure for table `candidates_languages`
--

DROP TABLE IF EXISTS `candidates_languages`;
CREATE TABLE `candidates_languages` (
  `candidates_languages_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `name` varchar(60) CHARACTER SET latin1 NOT NULL,
  `l_speak` tinyint(4) DEFAULT NULL,
  `l_read` tinyint(4) DEFAULT NULL,
  `l_write` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidates_languages`
--

INSERT INTO `candidates_languages` (`candidates_languages_id`, `candidate_id`, `name`, `l_speak`, `l_read`, `l_write`) VALUES
(43, 5, 'English', 1, 1, 1),
(44, 5, 'Gujarat', 1, 1, 1),
(45, 5, 'Hindi', 1, 1, 1),
(46, 4, 'English', 1, 1, 1),
(47, 4, 'hindi', 1, 1, NULL),
(48, 4, 'Gujarat', 1, 1, 1),
(52, 7, 'English', 1, 1, NULL),
(53, 7, 'Gujarat', 1, 1, 1),
(54, 7, 'Hindi', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `candidates_previous_employment`
--

DROP TABLE IF EXISTS `candidates_previous_employment`;
CREATE TABLE `candidates_previous_employment` (
  `candidates_previous_employment_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `organization` varchar(100) CHARACTER SET latin1 NOT NULL,
  `designation` varchar(50) CHARACTER SET latin1 NOT NULL,
  `pre_emp_from` varchar(30) CHARACTER SET latin1 NOT NULL,
  `pre_emp_to` varchar(30) CHARACTER SET latin1 NOT NULL,
  `reason_for_leaving` varchar(1000) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidates_previous_employment`
--

INSERT INTO `candidates_previous_employment` (`candidates_previous_employment_id`, `candidate_id`, `organization`, `designation`, `pre_emp_from`, `pre_emp_to`, `reason_for_leaving`) VALUES
(3, 4, 'Investis Pvt Ltd1', 'Software developer', '01/22/2009', '03/30/2017', 'Move in USA'),
(5, 7, 'Investis Pvt Ltd', 'web Producter', '02/22/2015', '11/16/2016', 'Move in PHP');

-- --------------------------------------------------------

--
-- Table structure for table `candidates_refer`
--

DROP TABLE IF EXISTS `candidates_refer`;
CREATE TABLE `candidates_refer` (
  `candidates_refer_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `ref_name` varchar(80) CHARACTER SET latin1 DEFAULT NULL,
  `ref_designation` varchar(80) CHARACTER SET latin1 DEFAULT NULL,
  `ref_email` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `ref_phone` varchar(30) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidates_refer`
--

INSERT INTO `candidates_refer` (`candidates_refer_id`, `candidate_id`, `ref_name`, `ref_designation`, `ref_email`, `ref_phone`) VALUES
(3, 4, 'Nimit1', 'SR Software developer', 'nimit@gmail.com', '123456789'),
(4, 4, 'Nimit1', 'SR Software developer', 'nimit@gmail.com', '123456789'),
(7, 7, 'Pratik', 'Web Developer', 'pratik@gmail.com', '5555555555'),
(8, 7, 'Pratik', 'Web Developer', 'pratik@gmail.com', '5555555555');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `candidates_document`
--
ALTER TABLE `candidates_document`
  ADD PRIMARY KEY (`candidates_document_id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `candidates_educational`
--
ALTER TABLE `candidates_educational`
  ADD PRIMARY KEY (`candidates_educational_id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `candidates_extracurricular_activity`
--
ALTER TABLE `candidates_extracurricular_activity`
  ADD PRIMARY KEY (`candidates_extracurricular_activity_id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `candidates_languages`
--
ALTER TABLE `candidates_languages`
  ADD PRIMARY KEY (`candidates_languages_id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `candidates_previous_employment`
--
ALTER TABLE `candidates_previous_employment`
  ADD PRIMARY KEY (`candidates_previous_employment_id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `candidates_refer`
--
ALTER TABLE `candidates_refer`
  ADD PRIMARY KEY (`candidates_refer_id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `candidates_document`
--
ALTER TABLE `candidates_document`
  MODIFY `candidates_document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `candidates_educational`
--
ALTER TABLE `candidates_educational`
  MODIFY `candidates_educational_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `candidates_extracurricular_activity`
--
ALTER TABLE `candidates_extracurricular_activity`
  MODIFY `candidates_extracurricular_activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `candidates_languages`
--
ALTER TABLE `candidates_languages`
  MODIFY `candidates_languages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `candidates_previous_employment`
--
ALTER TABLE `candidates_previous_employment`
  MODIFY `candidates_previous_employment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `candidates_refer`
--
ALTER TABLE `candidates_refer`
  MODIFY `candidates_refer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates_refer`
--
ALTER TABLE `candidates_refer`
  ADD CONSTRAINT `candidates_refer_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`candidate_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
