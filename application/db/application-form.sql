-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2017 at 07:46 PM
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
  `id_proof` varchar(400) CHARACTER SET latin1 DEFAULT NULL,
  `id_proof_number` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `source` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `contact_you` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `referenced` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `way_join` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `if_selected_when_join` date DEFAULT NULL,
  `can_relocate` tinyint(4) DEFAULT NULL,
  `notes` text CHARACTER SET latin1,
  `desired_pay` int(11) DEFAULT NULL,
  `current_pay` int(11) DEFAULT NULL,
  `strengths_weaknesses` varchar(1000) NOT NULL,
  `career_aspirations` varchar(1000) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidate_id`, `last_name`, `first_name`, `middle_name`, `address`, `city`, `state`, `zip`, `phone_home`, `phone_work`, `mobile`, `email`, `id_proof`, `id_proof_number`, `date_of_birth`, `gender`, `source`, `contact_you`, `referenced`, `way_join`, `if_selected_when_join`, `can_relocate`, `notes`, `desired_pay`, `current_pay`, `strengths_weaknesses`, `career_aspirations`, `date_created`, `date_modified`) VALUES
(1, '1hah', 'Nilam', 'P', 'P-104/ 16 Rajeshware gold view , \r\nBaroda', 'Baroda', 'Gujarat', '390012', '1234567890', '0987654321', '73831195976', 'nilam1@gmail.com', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '2017-02-28 07:45:31', '2017-02-28 07:45:31'),
(2, '2Shah', 'Nilam', 'P', 'P-104/ 16 Rajeshware gold view , \r\nBaroda', 'Baroda', 'Gujarat', '390012', '1234567890', '0987654321', '73831195972', 'nilam2@gmail.com', 'PAN Card', 'N01123', '1987-07-08', NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '2017-02-28 07:49:21', '2017-02-28 07:49:21'),
(3, 'Shah', 'Nilam', 'P', 'P-104/ 16 Rajeshware gold view , \r\nBaroda', 'Baroda', 'Gujarat', '390012', '1234567890', '0987654321', '73831195973', 'nilam3@gmail.com', 'PAN Card', 'N01123', '1987-07-08', 'Female', NULL, '', '', '', '2017-03-01', NULL, NULL, NULL, NULL, '', '', '2017-02-28 07:51:44', '2017-02-28 07:51:44'),
(4, 'Shah', 'Nilam', 'P', 'P-104/ 16 Rajeshware gold view , \r\nBaroda', 'Baroda', 'Gujarat', '390012', '1234567890', '0987654321', '7383119597', 'nilam@gmail.com', 'PAN Card', 'N01123', '1987-07-08', 'Female', '', '', '', '', '2017-03-01', NULL, 'Relocatee on', 25000, 22000, '', '', '2017-02-28 07:54:08', '2017-02-28 07:54:08'),
(5, 'Shah', 'Parthiv', 'R', 'P-104/16 Rajesware good view,\r\nBaroda', 'Baroda', 'Guajrat', '1232434', '1234567890', '0987654321', '7383119597', '2585shah@gmail.,com', 'PAN Card', 'PS007', '1985-05-02', 'Male', 'Facebook,Twitter,LinkedIn', '', '', '', '2017-03-01', 1, 'Relocate on', 25000, 22000, '', '', '2017-02-28 07:59:46', '2017-02-28 07:59:46'),
(6, 'Shah', 'Parthiv', 'R', 'P-104/16 Rajesware good view,\r\nBaroda', 'Baroda', 'Guajrat', '1232434', '1234567890', '0987654321', '7383119597', '2585shah@gmail.,com', 'PAN Card', 'PS007', '1985-05-02', 'Male', 'Facebook,Job Posting', 'Contact You test', 'Refrermces text', 'way test', '2017-03-01', NULL, 'Relocate off', 25000, 22000, '', '', '2017-02-28 08:09:22', '2017-02-28 08:09:22'),
(7, 'Shah', 'Parthiv', 'R', 'P-104/16 Rajesware good view,\r\nBaroda', 'Baroda', 'Guajrat', '1232434', '1234567890', '0987654321', '7383119597', '2585shah@gmail.,com', 'PAN Card', 'PS007', '1985-05-02', 'Male', 'Facebook,Job Posting', 'Contact You test', 'Refrermces text', 'way test', '2017-03-01', NULL, 'Relocate off', 25000, 22000, '', '', '2017-02-28 08:11:50', '2017-02-28 08:11:50'),
(8, 'Shah', 'Parthiv', 'R', 'P-104/16 Rajesware good view,\r\nBaroda', 'Baroda', 'Guajrat', '1232434', '1234567890', '0987654321', '7383119597', '2585shah@gmail.,com', 'PAN Card', 'PS007', '1985-05-02', 'Male', 'Facebook,Job Posting', 'Contact You test', 'Refrermces text', 'way test', '2017-03-01', NULL, 'Relocate off', 25000, 22000, '', '', '2017-02-28 08:43:11', '2017-02-28 08:43:11'),
(9, 'Shah', 'Parthiv', 'R', 'P-104/16 Rajesware good view,\r\nBaroda', 'Baroda', 'Guajrat', '1232434', '1234567890', '0987654321', '7383119597', '2585shah@gmail.,com', 'PAN Card', 'PS007', '1985-05-02', 'Male', 'Facebook,Job Posting', 'Contact You test', 'Refrermces text', 'way test', '2017-03-01', NULL, 'Relocate off', 25000, 22000, '', '', '2017-02-28 09:16:58', '2017-02-28 09:16:58'),
(10, 'Shah', 'Parthiv', 'R', 'P-104/16 Rajesware good view,\r\nBaroda', 'Baroda', 'Guajrat', '1232434', '1234567890', '0987654321', '7383119597', '2585shah@gmail.,com', 'PAN Card', 'PS007', '1985-05-02', 'Male', 'Facebook,Job Posting', 'Contact You test', 'Refrermces text', 'way test', '2017-03-01', NULL, 'Relocate off', 25000, 22000, '', '', '2017-02-28 09:18:12', '2017-02-28 09:18:12'),
(11, 'Shah', 'Parthiv', 'R', 'P-104/16 Rajesware good view,\r\nBaroda', 'Baroda', 'Guajrat', '1232434', '1234567890', '0987654321', '7383119597', '2585shah@gmail.,com', 'PAN Card', 'PS007', '1985-05-02', 'Male', 'Facebook,Job Posting', 'Contact You test', 'Refrermces text', 'way test', '2017-03-01', NULL, 'Relocate off', 25000, 22000, '', '', '2017-02-28 09:20:43', '2017-02-28 09:20:43'),
(12, 'Shah', 'Parthiv', 'R', 'P-104/16 Rajesware good view,\r\nBaroda', 'Baroda', 'Guajrat', '1232434', '1234567890', '0987654321', '7383119597', '2585shah@gmail.,com', 'PAN Card', 'PS007', '1985-05-02', 'Male', 'Facebook,Job Posting', 'Contact You test', 'Refrermces text', 'way test', '2017-03-01', NULL, 'Relocate off', 25000, 22000, '', '', '2017-02-28 09:21:57', '2017-02-28 09:21:57'),
(13, 'Shah', 'Parthiv', 'R', 'P-104/16 Rajesware good view,\r\nBaroda', 'Baroda', 'Guajrat', '1232434', '1234567890', '0987654321', '7383119597', '2585shah@gmail.,com', 'PAN Card', 'PS007', '1985-05-02', 'Male', 'Facebook,Job Posting', 'Contact You test', 'Refrermces text', 'way test', '2017-03-01', NULL, 'Relocate off', 25000, 22000, '', '', '2017-02-28 09:24:49', '2017-02-28 09:24:49'),
(14, 'Shah', 'Parthiv', 'R', 'P-104/16 Rajesware good view,\r\nBaroda', 'Baroda', 'Guajrat', '1232434', '1234567890', '0987654321', '7383119597', '2585shah@gmail.,com', 'PAN Card', 'PS007', '1985-05-02', 'Male', 'Facebook,Job Posting', 'Contact You test', 'Refrermces text', 'way test', '2017-03-01', NULL, 'Relocate off', 25000, 22000, '', '', '2017-02-28 09:25:25', '2017-02-28 09:25:25'),
(15, 'Shah', 'Parthiv', 'R', 'P-104/16 Rajesware good view,\r\nBaroda', 'Baroda', 'Guajrat', '1232434', '1234567890', '0987654321', '7383119597', '2585shah@gmail.,com', 'PAN Card', 'PS007', '1985-05-02', 'Male', 'Facebook,Job Posting', 'Contact You test', 'Refrermces text', 'way test', '2017-03-01', NULL, 'Relocate off', 25000, 22000, '', '', '2017-02-28 09:33:02', '2017-02-28 09:33:02'),
(16, 'Shah', 'Parthiv', 'R', 'P-104/16 Rajesware good view,\r\nBaroda', 'Baroda', 'Guajrat', '1232434', '1234567890', '0987654321', '7383119597', '2585shah@gmail.,com', 'PAN Card', 'PS007', '1985-05-02', 'Male', 'Facebook,Job Posting', 'Contact You test', 'Refrermces text', 'way test', '2017-03-01', NULL, 'Relocate off', 25000, 22000, '', '', '2017-02-28 10:29:25', '2017-02-28 10:29:25'),
(17, 'Shah', 'Parthiv', 'R', 'P-104/16 Rajesware good view,\r\nBaroda', 'Baroda', 'Guajrat', '1232434', '1234567890', '0987654321', '7383119597', '2585shah@gmail.,com', 'PAN Card', 'PS007', '1985-05-02', 'Male', 'Facebook,Job Posting', 'Contact You test', 'Refrermces text', 'way test', '2017-03-01', NULL, 'Relocate off', 25000, 22000, '', '', '2017-02-28 10:33:00', '2017-02-28 10:33:00'),
(18, 'Shah', 'Parthiv', 'R', 'P-104/16 Rajesware good view,\r\nBaroda', 'Baroda', 'Guajrat', '1232434', '1234567890', '0987654321', '7383119597', '2585shah@gmail.,com', 'PAN Card', 'PS007', '1985-05-02', 'Male', 'Facebook,Job Posting', 'Contact You test', 'Refrermces text', 'way test', '2017-03-01', NULL, 'Relocate off', 25000, 22000, '', '', '2017-02-28 10:33:58', '2017-03-02 07:04:39'),
(19, 'Shah', 'Parthiv', 'R', 'P-104/16 Rajesware good view,\r\nBaroda', 'Baroda', 'Guajrat', '1232434', '1234567890', '0987654321', '7383119597', '2585shah@gmail.,com', 'PAN Card', 'PS007', '1985-05-02', 'Male', 'Facebook,Job Posting', 'Contact You test', 'Refrermces text', 'way test', '2017-03-01', NULL, 'Relocate off', 25000, 22000, '', '', '2017-02-28 10:35:52', '2017-02-28 10:35:52'),
(20, 'Shah', 'Parthiv', 'R', 'P-104/16 Rajesware good view,\r\nBaroda', 'Baroda', 'Guajrat', '1232434', '1234567890', '0987654321', '7383119597', '2585shah@gmail.,com', 'PAN Card', 'PS007', '1985-05-02', 'Male', 'Facebook,Job Posting', 'Contact You test', 'Refrermces text', 'way test', '2017-03-01', NULL, 'Relocate off', 25000, 22000, '', '', '2017-02-28 10:38:37', '2017-02-28 10:38:37'),
(21, 'Shah', 'Parthiv', 'R', 'P-104/16 Rajesware good view,\r\nBaroda', 'Baroda', 'Guajrat', '1232434', '1234567890', '0987654321', '7383119597', '2585shah@gmail.,com', 'PAN Card', 'PS007', '1985-05-02', 'Male', 'Facebook,Job Posting', 'Contact You test', 'Refrermces text', 'way test', '2017-03-01', NULL, 'Relocate off', 25000, 22000, '', '', '2017-02-28 10:52:11', '2017-02-28 10:52:11'),
(22, 'Shah', 'Swara', 'P', 'P-104/ 16 Rajesware good view ,\r\nHarni Road', 'Baroda', 'Gujarat', '390012', '1234567890', '0987654321', '7383119597', '2558shah@gmail.com', 'PAN Card', 'N01123', '2012-11-20', 'Female', 'Twitter,LinkedIn', 'Parthiv R Shah,\r\nBaroda', 'Nilam P shah\r\nBaroda', 'For nice work ', '2017-04-01', 1, 'I m form baroda only', 67000, 75000, '', '', '2017-03-01 02:27:00', '2017-03-01 02:27:00'),
(23, 'Shah', 'Swara', 'P', 'P-104/ 16 Rajesware good view ,\r\nHarni Road', 'Baroda', 'Gujarat', '390012', '1234567890', '0987654321', '73831195972', '22558shah@gmail.com', 'PAN Card', 'N01123', '2012-11-20', 'Female', 'Twitter,LinkedIn', 'Parthiv R Shah,\r\nBaroda', 'Nilam P shah\r\nBaroda', 'For nice work ', '2017-04-01', 1, 'I m form baroda only', 67000, 75000, 'strength and weaknesses added', 'Career Aspirations added', '2017-03-01 02:42:13', '2017-03-01 02:42:13'),
(24, 'Shah', 'Swara', 'P', 'P-104/ 16 Rajesware good view ,\r\nHarni Road', 'Baroda', 'Gujarat', '390012', '1234567890', '0987654321', '73831195971', '12558shah@gmail.com', 'PAN Card', 'N01123', '2012-11-20', 'Female', 'Twitter,LinkedIn', 'Parthiv R Shah,\r\nBaroda', 'Nilam P shah\r\nBaroda', 'For nice work ', '2017-04-01', 1, 'I m form baroda only', 67000, 75000, 'strength and weaknesses added', 'Career Aspirations added', '2017-03-01 02:51:31', '2017-03-01 02:51:31'),
(25, 'Shah', 'Swara', 'P', 'P-104/ 16 Rajesware good view ,\r\nHarni Road', 'Baroda', 'Gujarat', '390012', '1234567890', '0987654321', '7383119597', '2558shah@gmail.com', 'PAN Card', 'N01123', '2012-11-20', 'Female', 'Twitter,LinkedIn', 'Parthiv R Shah,\r\nBaroda', 'Nilam P shah\r\nBaroda', 'For nice work ', '2017-04-01', 1, 'I m form baroda only', 67000, 75000, 'strength and weaknesses added', 'Career Aspirations added', '2017-03-01 10:33:02', '2017-03-01 10:33:02'),
(26, '27Shah', 'Swara', 'P', 'P-104/ 16 Rajesware good view ,\r\nHarni Road', 'Baroda', 'Gujarat', '390012', '1234567890', '0987654321', '7383119597', '2558shah@gmail.com', 'PAN Card', 'N01123', '2012-11-20', 'Female', 'Twitter,LinkedIn', 'Parthiv R Shah,\r\nBaroda', 'Nilam P shah\r\nBaroda', 'For nice work ', '2017-04-01', 1, 'I m form baroda only', 67000, 75000, 'strength and weaknesses added', 'Career Aspirations added', '2017-03-01 10:35:56', '2017-03-01 10:35:56'),
(28, '28s-test', 'f-test', 'm-test', '', '', '', '', '', '', '123456', 'admin@site.com', '', '', NULL, '', '', '', '', 'testesst1', NULL, NULL, 'Testsss1', 12000, NULL, 'test 1', 'test 3', '2017-03-02 05:14:53', '2017-03-02 07:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `candidates_educational`
--

DROP TABLE IF EXISTS `candidates_educational`;
CREATE TABLE `candidates_educational` (
  `candidates_educational_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `school_collage` varchar(80) CHARACTER SET latin1 NOT NULL,
  `board_univercity` varchar(80) CHARACTER SET latin1 NOT NULL,
  `stream_specializatic` varchar(80) CHARACTER SET latin1 NOT NULL,
  `edu_from` varchar(30) CHARACTER SET latin1 NOT NULL,
  `edu_to` varchar(30) CHARACTER SET latin1 NOT NULL,
  `edu_percentage` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidates_educational`
--

INSERT INTO `candidates_educational` (`candidates_educational_id`, `candidate_id`, `school_collage`, `board_univercity`, `stream_specializatic`, `edu_from`, `edu_to`, `edu_percentage`) VALUES
(1, 20, 'PDDMCA', 'C-DAC', 'Computer', '05-2005', '08-2006', 'A+'),
(2, 20, 'B.COM', 'SSS', '', '05-2000', '07-2003', 'Pass'),
(3, 20, 'SSH', '', '', '', '', ''),
(4, 21, 'PDDMCA', 'C-DAC', 'Computer', '05-2005', '08-2006', 'A+'),
(5, 21, 'B.COM', 'SSS', '', '05-2000', '07-2003', 'Pass'),
(6, 21, 'SSH', '', '', '', '', ''),
(7, 22, 'PHD', 'BBS', 'Computer', '01-2010', '02-2012', '90%'),
(8, 22, 'MCA', 'CCA', 'Computer', '01-2008', '06-2009', '92%'),
(9, 22, 'BBA', 'BBS', 'Computer', '01-2004', '07-2006', '80%'),
(10, 23, 'PHD', 'BBS', 'Computer', '01-2010', '02-2012', '90%'),
(11, 23, 'MCA', 'CCA', 'Computer', '01-2008', '06-2009', '92%'),
(12, 23, 'BBA', 'BBS', 'Computer', '01-2004', '07-2006', '80%'),
(13, 24, 'PHD', 'BBS', 'Computer', '01-2010', '02-2012', '90%'),
(14, 24, 'MCA', 'CCA', 'Computer', '01-2008', '06-2009', '92%'),
(15, 24, 'BBA', 'BBS', 'Computer', '01-2004', '07-2006', '80%'),
(16, 25, 'PHD', 'BBS', 'Computer', '01-2010', '02-2012', '90%'),
(17, 25, 'MCA', 'CCA', 'Computer', '01-2008', '06-2009', '92%'),
(18, 25, 'BBA', 'BBS', 'Computer', '01-2004', '07-2006', '80%'),
(19, 26, 'PHD', 'BBS', 'Computer', '01-2010', '02-2012', '90%'),
(20, 26, 'MCA', 'CCA', 'Computer', '01-2008', '06-2009', '92%'),
(21, 26, 'BBA', 'BBS', 'Computer', '01-2004', '07-2006', '80%'),
(28, 28, '1', '1', '3', '04-2017', '05-2017', '6'),
(29, 28, 'dfs', 'dfs', 'f', '11-2017', '10-2017', '55');

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
(1, 21, 'EA1', 'sport', 'TT', 'A1'),
(2, 21, 'EA2', 'game', 'PP', 'A2'),
(3, 21, 'EA3', '', '', ''),
(4, 22, 'ABC', 'SP', 'H1', 'A1'),
(5, 22, 'DEF', 'OP', 'H2', 'A2'),
(6, 22, 'WER', 'IK', 'H3', 'A3'),
(7, 23, 'ABC', 'SP', 'H1', 'A1'),
(8, 23, 'DEF', 'OP', 'H2', 'A2'),
(9, 23, 'WER', 'IK', 'H3', 'A3'),
(10, 24, 'ABC', 'SP', 'H1', 'A1'),
(11, 24, 'DEF', 'OP', 'H2', 'A2'),
(12, 24, 'WER', 'IK', 'H3', 'A3'),
(13, 25, 'ABC', 'SP', 'H1', 'A1'),
(14, 25, 'DEF', 'OP', 'H2', 'A2'),
(15, 25, 'WER', 'IK', 'H3', 'A3'),
(16, 26, 'ABC', 'SP', 'H1', 'A1'),
(17, 26, 'DEF', 'OP', 'H2', 'A2'),
(18, 26, 'WER', 'IK', 'H3', 'A3'),
(21, 28, 'EA1', 'rr', '7fgfg', 'ff'),
(22, 28, 'EA2', 'fff', 'hhhff', 'gfgd');

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
(1, 11, 'Guj', 1, 1, 1),
(2, 11, 'Hind', 1, 1, 1),
(3, 12, 'Eng', 1, 1, NULL),
(4, 12, 'Guj', 1, 1, 1),
(5, 12, 'Hind', 1, NULL, 1),
(6, 16, 'Eng', 1, 1, NULL),
(7, 16, 'Guj', 1, 1, 1),
(8, 16, 'Hind', 1, NULL, 1),
(9, 17, 'Eng', 1, 1, NULL),
(10, 17, 'Guj', 1, 1, 1),
(11, 17, 'Hind', 1, NULL, 1),
(15, 19, 'Eng', 1, 1, NULL),
(16, 19, 'Guj', 1, 1, 1),
(17, 19, 'Hind', 1, NULL, 1),
(18, 20, 'Eng', 1, 1, NULL),
(19, 20, 'Guj', 1, 1, 1),
(20, 20, 'Hind', 1, NULL, 1),
(21, 21, 'Eng', 1, 1, NULL),
(22, 21, 'Guj', 1, 1, 1),
(23, 21, 'Hind', 1, NULL, 1),
(24, 22, 'English', 1, 1, 1),
(25, 22, 'Gujarat', 1, 1, 1),
(26, 22, 'Hindi', 1, 1, 1),
(27, 23, 'English', 1, 1, 1),
(28, 23, 'Gujarat', 1, 1, 1),
(29, 23, 'Hindi', 1, 1, 1),
(30, 24, 'English', 1, 1, 1),
(31, 24, 'Gujarat', 1, 1, 1),
(32, 24, 'Hindi', 1, 1, 1),
(36, 18, 'Eng', 1, 1, NULL),
(37, 18, 'Guj', 1, 1, 1),
(38, 18, 'Hind', 1, NULL, 1),
(49, 28, 'English', 1, NULL, 1),
(50, 28, 'Gujarat', 1, 1, NULL);

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
  `ctc` varchar(20) CHARACTER SET latin1 NOT NULL,
  `pre_emp_from` varchar(30) CHARACTER SET latin1 NOT NULL,
  `pre_emp_to` varchar(30) CHARACTER SET latin1 NOT NULL,
  `reason_for_leaving` varchar(1000) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidates_previous_employment`
--

INSERT INTO `candidates_previous_employment` (`candidates_previous_employment_id`, `candidate_id`, `organization`, `designation`, `ctc`, `pre_emp_from`, `pre_emp_to`, `reason_for_leaving`) VALUES
(1, 23, 'A', 'Q', '900000', '02-2017', '02-2017', 'R1'),
(2, 23, 'B', 'W', '800000', '01-2016', '07-2016', 'R2'),
(3, 23, 'C', 'E', '700000', '02-2013', '02-2013', 'R3'),
(4, 24, 'A', 'Q', '900000', '02-2017', '02-2017', 'R1'),
(5, 24, 'B', 'W', '800000', '01-2016', '07-2016', 'R2'),
(6, 24, 'C', 'E', '700000', '02-2013', '02-2013', 'R3'),
(7, 25, 'A', 'Q', '900000', '02-2017', '02-2017', 'R1'),
(8, 25, 'B', 'W', '800000', '01-2016', '07-2016', 'R2'),
(9, 25, 'C', 'E', '700000', '02-2013', '02-2013', 'R3'),
(10, 26, 'A', 'Q', '900000', '02-2017', '02-2017', 'R1'),
(11, 26, 'B', 'W', '800000', '01-2016', '07-2016', 'R2'),
(12, 26, 'C', 'E', '700000', '02-2013', '02-2013', 'R3'),
(17, 28, '1', '4', '7', '01-2017', '04-2017', '56'),
(18, 28, '3', '6', '8', '05-2017', '12-2017', '77');

-- --------------------------------------------------------

--
-- Table structure for table `candidates_refer`
--

DROP TABLE IF EXISTS `candidates_refer`;
CREATE TABLE `candidates_refer` (
  `candidates_refer_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `ref_name` varchar(80) CHARACTER SET latin1 DEFAULT NULL,
  `ref_occupation` varchar(80) CHARACTER SET latin1 DEFAULT NULL,
  `ref_email` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `ref_contact` varchar(30) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidates_refer`
--

INSERT INTO `candidates_refer` (`candidates_refer_id`, `candidate_id`, `ref_name`, `ref_occupation`, `ref_email`, `ref_contact`) VALUES
(1, 24, 'monark', 'CC', 'monark@gmail.com', '1234'),
(2, 24, 'sunil', 'DD', 'sunil@gmail.ccom', '55555'),
(3, 25, 'monark', 'CC', 'monark@gmail.com', '1234'),
(4, 25, 'sunil', 'DD', 'sunil@gmail.ccom', '55555'),
(5, 26, 'monark', 'CC', 'monark@gmail.com', '1234'),
(6, 26, 'sunil', 'DD', 'sunil@gmail.ccom', '55555'),
(13, 28, '1', '3', '5', '7'),
(14, 28, '2', '4', '6', '8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidate_id`);

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
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `candidates_educational`
--
ALTER TABLE `candidates_educational`
  MODIFY `candidates_educational_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `candidates_extracurricular_activity`
--
ALTER TABLE `candidates_extracurricular_activity`
  MODIFY `candidates_extracurricular_activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `candidates_languages`
--
ALTER TABLE `candidates_languages`
  MODIFY `candidates_languages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `candidates_previous_employment`
--
ALTER TABLE `candidates_previous_employment`
  MODIFY `candidates_previous_employment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `candidates_refer`
--
ALTER TABLE `candidates_refer`
  MODIFY `candidates_refer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates_educational`
--
ALTER TABLE `candidates_educational`
  ADD CONSTRAINT `candidates_educational_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`candidate_id`) ON UPDATE CASCADE;

--
-- Constraints for table `candidates_extracurricular_activity`
--
ALTER TABLE `candidates_extracurricular_activity`
  ADD CONSTRAINT `candidates_extracurricular_activity_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`candidate_id`) ON UPDATE CASCADE;

--
-- Constraints for table `candidates_languages`
--
ALTER TABLE `candidates_languages`
  ADD CONSTRAINT `candidates_languages_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`candidate_id`) ON UPDATE CASCADE;

--
-- Constraints for table `candidates_previous_employment`
--
ALTER TABLE `candidates_previous_employment`
  ADD CONSTRAINT `candidates_previous_employment_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`candidate_id`) ON UPDATE CASCADE;

--
-- Constraints for table `candidates_refer`
--
ALTER TABLE `candidates_refer`
  ADD CONSTRAINT `candidates_refer_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`candidate_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
