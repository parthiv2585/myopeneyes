-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2017 at 07:53 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myopeneyes`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_level`
--

DROP TABLE IF EXISTS `access_level`;
CREATE TABLE `access_level` (
  `access_level_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_level`
--

INSERT INTO `access_level` (`access_level_id`, `title`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Users');

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

DROP TABLE IF EXISTS `attachment`;
CREATE TABLE `attachment` (
  `attachment_id` int(11) NOT NULL,
  `data_item_id` int(11) NOT NULL DEFAULT '0',
  `data_item_type` int(11) NOT NULL DEFAULT '0',
  `title` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `original_filename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

DROP TABLE IF EXISTS `candidate`;
CREATE TABLE `candidate` (
  `candidate_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL DEFAULT '0',
  `last_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `first_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `middle_name` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_home` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_cell` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_work` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `city` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_available` datetime DEFAULT NULL,
  `can_relocate` int(1) NOT NULL DEFAULT '0',
  `notes` text COLLATE utf8_unicode_ci,
  `key_skills` text COLLATE utf8_unicode_ci,
  `current_employer` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entered_by` int(11) NOT NULL DEFAULT '0' COMMENT 'Created-by user.',
  `owner` int(11) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `email1` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email2` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `web_site` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `import_id` int(11) NOT NULL DEFAULT '0',
  `is_hot` int(1) NOT NULL DEFAULT '0',
  `eeo_ethnic_type_id` int(11) DEFAULT '0',
  `eeo_veteran_type_id` int(11) DEFAULT '0',
  `eeo_disability_status` varchar(5) COLLATE utf8_unicode_ci DEFAULT '',
  `eeo_gender` varchar(5) COLLATE utf8_unicode_ci DEFAULT '',
  `desired_pay` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_pay` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_authorization` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `ssn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(1) DEFAULT '1',
  `is_admin_hidden` int(1) DEFAULT '0',
  `best_time_to_call` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`candidate_id`, `site_id`, `last_name`, `first_name`, `middle_name`, `phone_home`, `phone_cell`, `phone_work`, `address`, `city`, `state`, `zip`, `source`, `date_available`, `can_relocate`, `notes`, `key_skills`, `current_employer`, `entered_by`, `owner`, `date_created`, `date_modified`, `email1`, `email2`, `web_site`, `import_id`, `is_hot`, `eeo_ethnic_type_id`, `eeo_veteran_type_id`, `eeo_disability_status`, `eeo_gender`, `desired_pay`, `current_pay`, `work_authorization`, `date_of_birth`, `ssn`, `is_active`, `is_admin_hidden`, `best_time_to_call`, `deleted`) VALUES
(2, 1, 'Modi', 'Jaimin', 'Dipak', '740-528-0399', '740-528-0399', '', '20 Atmashradha society, near citizen society,', 'Vadodara', 'Gujarat', '390023', 'Trushant Mehta', '2016-03-01 00:00:00', 1, 'Available as soon as the contract with the current Employers get over', 'Communication Skills, Client Requirements', 'OpenEyes Technologies Inc', 1, 1, '2016-12-29 11:40:13', '2016-12-29 11:40:13', 'modijaiin08@gmail.com', 'jaiminmodi93@gmail.com', '', 0, 0, 0, 0, '', '', '40000', '25000', '', '0000-00-00', '', 1, 0, 'Anytime', 0),
(3, 1, 'N\'Diaye', 'Ibrahima', '', '', '', '202-491-1692', 'Silver Spring MD 20901', 'Silver Spring', 'MD', '20901', '(none)', NULL, 0, '15 years of experience\r\n\r\n1.       Legal Name: Ibrahima NDiaye\r\n2.       Phone: 202-491-1692\r\n3.       Email ID: kenzomus@gmail.com\r\n4.       LinkedIn url:- https://www.linkedin.com/in/mustic\r\n5.       Photo Id(Driving Licence or any Other photo id.): Will provide it once we sign a contract\r\n6.       Current Location: Silver Spring MD 20901\r\n7.       Availability: As soon as possible\r\n8.       Total Work Experience: 16 years\r\n9.       Relevant Work Experience: 8 years\r\n10.   Education Details(with Start and End Date) : Master in Economics. Refer to resume\r\n11.   Skills : Refer to resume\r\n12.   Availability to Interview: As soon as possible\r\n13.   Communication Skills: Good.Speak English, French, Wolof\r\n\r\nSkype ID :positivesvibes', '', '', 1, 1, '2017-01-02 10:13:18', '2017-01-05 08:52:27', 'kenzomus@gmail.com', '', '', 0, 0, 0, 0, '', '', '80$/hour', '', '', '0000-00-00', '', 1, 0, 'Anytime between 8-5', 0),
(4, 1, 'Bhatt', 'Ujval', '', '', '', '991-346-8649', '178, Swamisuryanarayan Nagar, \r\nNr., Tulsidham Char Rasta,\r\nManjalpur,\r\nVadodara – 390011', 'Vadodara', 'Gujarat', '390011', 'Trushant Mehta', NULL, 1, '', 'HTML, CSS, JQuery, Design, Responsive Web Design', 'E-intelligence', 1, 1, '2017-01-03 08:11:19', '2017-01-16 10:50:44', 'ujvalb595@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '20,000 rs/ month', '', '0000-00-00', '', 1, 0, '', 0),
(5, 1, 'Kumari', 'Garima', '', '', '966-216-9718', '886-606-9718', 'D-10, Sainath Society, Gurukul Circle, Waghodia Road, Vadodara (Gujarat)', 'Vadodara', 'Gujarat', '', 'Trushant Mehta', '2017-01-22 00:00:00', 1, 'Current Salary is: 16000/month. \r\nThe basic salary is 14000. \r\nIt is increased by 2000 rs every month.', 'Adobe Photoshop, HTML, CSS, Dreamweaver, , Bootstrap, JavaScript, JQuery, Adobe illustrator, WordPress, AngularJs', 'Fanestra India, Vadodara', 1, 1, '2017-01-03 08:53:53', '2017-01-05 07:36:10', 'garima3124@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '1.68 Lakh Per Annum', '', '0000-00-00', '', 1, 0, 'Working Hours', 0),
(6, 1, 'Solanki', 'Jagruti', 'Vikramsinh', '', '', '999-897-8289', '101 B-Towers, Shashwat Greens, Opp: Geri Compound,\r\nB/h: Yash Complex, Gotri Road,\r\nVadodara-390 021', 'Vadodara', 'Gujarat', '390021', 'Trushant Mehta', '2017-01-01 00:00:00', 1, 'She used to work in Helios Solution, Vadodara. Currently she is available for joining. \r\n\r\nHowever her interview was taken on 23rd December, 2016 by Nitin Shirasad and Jaimin Modi. The ratings are as follows :\r\n\r\nphp - 0/5\r\njavascript: 3/5\r\ncss: 2/5\r\njquery: 3/5\r\n\r\nShe left Helios because she did find the proper learning curve that she was looking for. She was interested in frontend development only and not the php development.', 'HTML, CSS, PHP, JQUERY, Photoshop, Bootstrap, Magento, Github', 'Helios Solutions', 1, 1, '2017-01-03 12:28:41', '2017-01-03 12:30:12', 'jagruti_miraj93@yahoo.in', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, 'Worktime', 0),
(7, 1, 'Williams', 'Ceciley', '', '', '', '908-447-2881', '13 Vanderbilt Court\r\nIrvington, NJ 07111', 'Irvington', 'New Jersey', '07111', '(none)', NULL, 0, '', '', '', 1, 1, '2017-01-05 08:25:53', '2017-01-05 08:25:54', 'ceciley@excite.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, 'Working time', 0),
(8, 1, 'Ventura', 'Dante', '', '', '', '809-209-9111', '2156 29th St, Astoria, Queens. NY 11105', 'Queens', 'New York', '11105', '(none)', NULL, 0, '', '', '', 1, 1, '2017-01-05 08:28:51', '2017-01-05 08:28:51', 'Dantemaple@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, 'Work time', 0),
(9, 1, 'Burnett', 'Donald', '', '', '', '973-879-2165', '110 Fayson Lake\r\nKinnelon, NJ 07405', 'Kinnelon', 'New Jersey', '07405', '(none)', NULL, 0, '', '', '', 1, 1, '2017-01-05 08:36:21', '2017-01-05 08:36:22', 'Dburnett1222@live.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, 'Working time', 0),
(10, 1, 'Guastella', 'James', 'M', '', '', '+1 201–893-4696', '544 Page Avenue \r\nLyndhurst, NJ 07071', 'Lyndhurst', 'New Jersey', '07071', '(none)', NULL, 0, '', '', '', 1, 1, '2017-01-05 08:40:18', '2017-01-05 08:40:18', 'jguastella32193@comcast.net', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, 'Working time', 0),
(11, 1, 'Parker', 'Jasper', '', '', '', '973-824-6829', '', 'Newark', 'New Jersey', '07102', '(none)', NULL, 0, '', '', '', 1, 1, '2017-01-05 08:42:24', '2017-01-05 08:42:25', 'jasperparker@optonline.net', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, 'Working hours', 0),
(12, 1, 'Huang', 'Xin', '', '', '', '919-360-4831', '', 'Baltimore', 'Maryland', '', '(none)', '2017-01-09 00:00:00', 1, 'Phone: 9193604831\r\nEmail ID: huangxin0921@gmail.com\r\nLinkedIn url: https://www.linkedin.com/in/xhuangs \r\nPhoto Id(Driving Licence or any Other photo id.): will provide once the offer is agreed\r\nCurrent Location: Baltimore, MD\r\nAvailability: Fulltime\r\nTotal Work Experience: 5+\r\nRelevant Work Experience: 5+\r\nEducation Details(with Start and End Date) : Master\r\nSkills : \r\nExpertise in LAMP stack, Linux, Apache, MySQL, PHP, Javascript, jQuery, HTML, CSS, Laravel, Object Oriented Programming, Java, Python, Perl, REST API, Node, FileMaker API, Yii Framework, React, Angularjs, Scala, Django, Ruby on Rails, Express, Reactjs, Ionic, AWS, Loopback, Swagger, Ionic, Bash, MS SQL Server, Memcached, HTTP, TCP/IP, Actionscript, Postgresql, , XML, Cloud computing, SVN, GIT, Splunk, SOAP, Mongodb, HDFS, CI/CD, TDD, Docker\r\nAvailability to Interview: Anytime \r\nCommunication Skills: Excellent\r\nlast four digits of SSN: will provide once the offer is agreed\r\nSkype ID : xin.huang0921\r\n\r\nTWO PROFESSIONAL REFERENCES:\r\nCan you give me 2 Professional References.\r\nKai wang: jimmywang052114@gmail.com (prev Zynga coworker)\r\nYifei Sun: yifeisun1987@gmail.com  (Prev Ebay coworker)', 'Expertise in LAMP stack, Linux, Apache, MySQL, PHP, Javascript, jQuery, HTML, CSS, Laravel, Object Oriented Programming, Java, Python, Perl, REST API, Node, FileMaker API, Yii Framework, React, Angularjs, Scala, Django, Ruby on Rails, Express, Reactjs, Ionic, AWS, Loopback, Swagger, Ionic, Bash, MS SQL Server, Memcached, HTTP, TCP/IP, Actionscript, Postgresql, , XML, Cloud computing, SVN, GIT, Splunk, SOAP, Mongodb, HDFS, CI/CD, TDD, Docke', '', 1, 1, '2017-01-05 08:56:24', '2017-01-05 09:06:20', 'huangxin0921@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, 'Working time', 0),
(13, 1, 'Jimenez', 'Rigoberto', '', '', '', '305-833-6032', '7150 SW 23st Street, Miami, Fl 33155', 'Miami', 'Florida', '33155', '(none)', NULL, 0, '', '', '', 1, 1, '2017-01-05 12:09:52', '2017-01-05 12:10:59', 'rigo3001@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, 'Working time', 0),
(14, 1, 'Suthar', 'Ankit', 'Kumar', '', '+91-7359610589', '+91-7737264865', 'D-77, Shivtanament, Gotri Road, Vadodara', 'Vadodara', 'Gujarat', '', 'Trushant Mehta', NULL, 0, '', 'PHP , JS ,C , C++, HTML, SQL, Microsoft Windows, Ubuntu, Microsoft Server 2003-2005, MS-Office, Dreamweaver, Photoshop, Netbeans, Joomla, WordPress, Prestashop ,Opencart ,Os-Commerce', 'Helios Solution', 1, 1, '2017-01-06 11:07:46', '2017-02-01 16:01:54', 'anksuthar@gmail.com', '', '', 0, 0, 0, 0, '', '', '45000 / month', '35000 / month', '', '0000-00-00', '', 1, 0, 'Work time', 0),
(15, 1, 'Pandya', 'Shivam', '', '', '972-757-0022', '', '', 'Vadodara', 'Gujarat', '', '(none)', NULL, 0, '', 'Ecommerce, opencart', 'Helios Solution', 1, 1, '2017-01-09 07:27:03', '2017-02-01 15:59:54', 'shivampandya24@gmail.com', '', '', 0, 0, 0, 0, '', '', '40000', '30000', '', '0000-00-00', '', 1, 0, 'Worktime', 0),
(16, 1, 'Panchal', 'Atul', 'Narendrabhai', '', '903-336-0019', '704-830-9643', 'Harikunj Society, Nr. New busstand,\r\nChaklashi', '', 'Gujarat', '', 'Trushant Mehta', NULL, 1, '', 'HTML, XML, ASP, PHP, JavaScript, JSP, Perl, AJAX, Android, CGI-Perl', 'Blue Shark Solutions Ltd.', 1, 1, '2017-01-10 11:41:22', '2017-02-01 15:57:10', 'atul_webdp@yahoo.com', 'atul.webdp@gmail.com', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, 'Worktime', 0),
(17, 1, 'Gameti', 'Prashant', '', '', '903-396-3138', '', '', 'Vadodara', 'Gujarat', '', '(none)', NULL, 0, '', 'PHP, JAVA, ASP.NET, C#, C++, XML, Javascript, AJAX, HTML, CSS, MySQL, Oracle, SQL Server, MS Access', 'E-intellgence', 1, 1, '2017-01-13 09:59:01', '2017-02-01 15:51:16', 'prashant.gameti@hotmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, 'Worktime', 0),
(18, 1, 'Aragon', 'Melvin', '', '', '703-895-6370', '', '1160 First Street NE \r\nWashington, DC 20002', '', 'Washington', '20002', '(none)', NULL, 0, '', '', '', 1, 1, '2017-01-16 10:56:22', '2017-01-16 10:56:23', 'melvindjaragon@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, 'Worktime', 0),
(19, 1, 'Dabestan', 'Nima', '', '', '917-650-5150', '', 'New York, New York (NY), United States of America', 'New York', 'New York', '', '(none)', NULL, 0, '', 'Business Analyst, Java, C, C++, Python, HTML, CSS3, SQL, SQL Server, Machine Learning', '', 1, 1, '2017-01-16 11:04:42', '2017-01-16 11:04:43', 'nima.dabestan@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, 'Worktime', 0),
(20, 1, 'Delsouz', 'Amir', '', '', '517-643-4000', '', '4211 Ridge Top Road APT 2324, Fairfax, VA, 22030', 'Fairfax', 'Virginia', '22030', '(none)', NULL, 0, '', 'Data Analytics, SDLC, Scrum, Microsoft Project, MATLAB, BO Explorer, JIRA/CONFLUENCE, Unix, MS-Office ,', '', 1, 1, '2017-01-16 11:10:14', '2017-01-16 11:10:15', 'amirdelsouz@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(21, 1, 'Stadelhofer', 'Scott', 'R', '703-914-0441', '703-581-0166', '', '4919 Van Masdag Court Annandale, Virginia 22003-6023', 'Annandale', 'Virginia', '22003', '(none)', NULL, 0, '', '', '', 1, 1, '2017-01-16 11:15:12', '2017-01-16 11:15:12', 'sstadelhofer@cox.net', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, 'Worktime', 0),
(22, 1, 'Stadelhofer', 'Scott', 'R', '703-914-0441', '703-581-0166', '', '4919 Van Masdag Court Annandale, Virginia 22003-6023', 'Annandale', 'Virginia', '22003', '(none)', NULL, 0, '', '', '', 1, 1, '2017-01-16 11:15:16', '2017-01-16 14:38:15', 'sstadelhofer@cox.net', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, 'Worktime', 0),
(23, 1, 'Aflaq', 'Aamir', '', '', '703-909-9178', '', '2703 8th Street S #311-A', 'Arlington', 'Virginia', '22204', '(none)', NULL, 0, '3 references are:\r\n\r\nSamantha Aurora\r\nProject  Lead\r\n(571)-279-9720 \r\nsmnthaurora@gmail.com\r\nGEICO,Chevy Chase, MD \r\nTest Analyst                                                             \r\n12/2014 - Present\r\n\r\n \r\nNeal Oscar \r\nTeam Lead \r\n(571)-336-2428 \r\noscnear@gmail.com\r\nAMAZON.COM,Seattle, WA \r\nQuality Assurance Analyst                                               \r\n06/2012 – 11/2014\r\n\r\n\r\nNahid Rahman\r\nTech Lead\r\n(718)-688-4355 \r\nnahidrhmn1@gmail.com\r\nBLUE CROSS BLUE SHIELD, Jacksonville, FL\r\nSoftware Test Engineer                                                  \r\n02/2010 – 05/2012', '', '', 1, 1, '2017-01-16 11:17:53', '2017-02-01 15:58:37', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, 'Wokrtime', 0),
(24, 1, 'Tah', 'Richard', '', '', '786-484-5358', '', '', 'Miami', 'Florida', '33169', '(none)', NULL, 0, '', 'UML (Unified Modeling Language), Microsoft Office suites (Word, PowerPoint, Access, Excel, SQL Server, pivot-tables, Outlook, Project, Visio), Rational Suite Tools (Requisite Pro, Rose, clear quest, clear case), HP Quality Center, Quick Test Pro 9, JIRA, Oblix,Rally', '', 1, 1, '2017-01-16 11:22:08', '2017-01-16 11:22:09', 'mugritah1988@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, 'Worktime', 0),
(25, 1, 'Mogha', 'J', '', '', '314-403-0421', '', '', 'Saint Lou', 'Missouri', '', '(none)', NULL, 0, '', 'Business Process Analysis & Design, Requirement Gathering, Use Case Modelling, JAD/JRP Sessions, Gap Analysis and Impact Analysis, RUP, Agile, Waterfall, C, C++, SQL, PL/SQL, HTML, Oracle, MS SQL Server, MS Access', '', 1, 1, '2017-01-16 11:27:50', '2017-01-16 11:27:51', 'Tanwar.ba@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, 'Worktime', 0),
(26, 1, 'Dsouza', 'Shobha', '', '', '803-741-4119', '', '', 'Herndon', 'Virginia', 'Worktime', '(none)', NULL, 0, 'Senior Business Analyst with more than 5 years of industry experience in software requirement analysis, process modeling, requirements gathering, project planning, process flow and quality assurance skills using different methodologies', 'usiness Analyst, RUP, Use Cases, Agile, QA, SCRUM, SDLC, Test Cases, UAT, ALM, Change Management, JAD, ACCESS, ClearQuest, Cucumber, JIRA, MS Office, Operating System, Oracle, Project Manager', '', 1, 1, '2017-01-16 11:35:01', '2017-01-16 11:35:01', 'shobha.sjd@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(27, 1, 'Sharma', 'Sanjeev', '', '', '', '469-274-8867', '', '', '', '', '(none)', NULL, 0, '', 'Business Analysis , JAD Sessions, Use Cases and User Stories, Use Case Modeling, Data Mapping & Analysis, Data Flow & Process Mapping, SQL Queries & Data Modeling, Requirement Gathering, Gap Analysis, Agile (Scrum) & Waterfall, UAT & Test Planning, Client/Vendor Relations, Technical Writing (Manuals/System Specs), Project Management', '', 1, 1, '2017-01-16 11:44:49', '2017-01-16 11:44:50', 'npalibabu@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(28, 1, 'Thipereshetty', 'Bal', 'Naveen', '', '347-513-4398', '', 'PA Place, 301 Chestnut St\r\nApt 1603\r\nHarrisburg, PA 17101', 'Harrisburg', 'Pennsylvania', '17101', '(none)', '2017-01-23 00:00:00', 1, '', 'MS Visio, MS Project, Rational Product Suite, Rational Rose, RequisitePro, ClearQuest, Windows XP/2000/Me/98/95/3.1/NT, SunOS, MS-DOS, Dream Weaver, Adobe, Pencil, Photoshop, Flash, Business Objects, XML, UML, HTML, C++, VB.NET,ASP.NET, Java, Access, Microsoft Word, Power Point, Excel, Outlook, PSP Studio, HP QC, Word Perfect, Blueprint, SharePoint-ECM,TFS,MTM,', '', 1, 1, '2017-01-17 13:48:03', '2017-02-01 15:54:56', 'Naveen.analyst@outlook.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, 'Worktime', 0),
(29, 1, 'Masroor', 'Muhammad', '', '', '', '973-457-5883', '', '', '', '', '(none)', NULL, 0, '', 'Java, C# J2EE, JSP, ServletsJavaScript, HTML AJAX, XML XSLT, CSS, Struts, JSF, Hibernate, JDBC, ODBC, RMI, Web Services, MS SQL Server 2005 - Integrate applications with IBM DB2, Informix, Oracle, Sybase and MySQL, IBM WebSphere, Apache Tomcat, and MS IIS Server, MS Project, MS Visio, Database Design, UML, Agile Scrum, Project Management, Business Analysis, System Design & Development, Enterprise Architecture, Business Process Reengineering', '', 1, 1, '2017-02-01 09:04:49', '2017-02-01 09:04:50', 'adeel.b@ewsystemsinc.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(30, 1, 'Raju', 'Madhi', '', '', '240-238-0245', '', '', '', '', '', '(none)', NULL, 0, '', '', '', 1, 1, '2017-02-01 10:33:42', '2017-02-01 10:33:45', 'vikas.singh@samara-tech.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(31, 1, 'Khatri', 'Kaushik', '', '', '+91-9429467842', '', '4-A,Plot no.164-165, Adipur – 370205', 'Kutch', 'Gujarat', '370205', '(none)', '2017-02-28 00:00:00', 1, '', '', 'Yesha software', 1, 1, '2017-02-06 07:21:03', '2017-02-09 11:24:06', 'Khatri_kaushik@ymail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, 'Anytime', 0),
(32, 1, 'Marathe', 'Ajinkya', 'Yashawant', '', '973-003-5559', '848-486-9377', '', 'Nashik', 'Gujarat', '', '(none)', '2017-02-28 00:00:00', 1, '', 'PHP, JavaScript, AJAX, CSS, HTML', 'Boob Software and Solutions Pvt Ltd', 1, 1, '2017-02-06 07:55:22', '2017-02-17 07:41:33', 'ajinkyamarathe78@gmail.com', '', '', 0, 0, 0, 0, '', '', '15000', '10000', '', '0000-00-00', '', 1, 0, 'Anytime', 0),
(33, 1, 'Agrawal', 'Shweta', '', '', '877-075-1713', '', '33, Ajitnath society,\r\nNear water tank,\r\nKareli baugh, Vadodra\r\nPin-390018', 'Vadodara', 'Gujarat', '390018', '(none)', NULL, 0, '', 'HTML, CSS, Java-Script, JQuery, Ajax, PHP, MySql, Apache, XAMPP, PHP, XML, Unix, Linux', '', 1, 1, '2017-02-06 08:59:38', '2017-02-06 09:00:20', 'shweta.indorian@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, 'Worktime', 0),
(34, 1, 'Rajnikant', 'Rohit', '', '', '(+91) 9099209892', '', '1683, Rohit Vass, Nr. Vanzari, Sinor, Vadodara 391 115', 'Vadodara', 'Gujarat', '391 115', '(none)', '2017-04-06 00:00:00', 0, '', 'OOPS, Project management, PHP frameworks (codeigniter), XML, HTML, CSS, JavaScript, wordpress, joomla, magento)(JQuery), AJAX, Website optimization, Team management, Problem solving skill, SEO', 'Suggestmychoice.com', 1, 1, '2017-02-06 09:11:14', '2017-02-06 09:13:40', 'rohitrajnikant084@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, 'Worktime', 0),
(35, 1, 'Nair', 'Aneesh', 'Chandran', '', '960-198-5662', '', '', '', '', '', '(none)', NULL, 0, 'Not interested in Night Shift', 'PHP, Java, HTML,CSS, Restful web‐services, ZEND,CodeIgniter, JavaScript frameworks, Eclipse, Notepad++, Dreamweaver, PHPStorm, Windows, Ubuntu, Kubuntu, Fedora, LAMP, WAMP', 'DARSHAN SOFTECH PVT LTD', 1, 1, '2017-02-06 09:21:41', '2017-02-06 09:22:38', 'nairaneeshchandran@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(36, 1, 'Chunavala', 'Arva', '', '', '886-647-8892', '', '“Dahod”,  423,Batul Villa, near chunawala compound, Thakkar Faliya, Dahod-389151, Gujarat, India', 'Dahod', 'Gujarat', '389151', '(none)', NULL, 0, '', 'C++, C , Core Java,vb,html,css,javascript,php,xml,Android, Advance Java, Microsoft Office 2007,Adobe Photoshop, SQL Server , Microsoft Access, oracle 8, SQL Server 2008,Android 2.2,Android 4.4', '', 1, 1, '2017-02-06 10:46:41', '2017-02-06 10:46:42', 'arva.chuna@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(37, 1, 'Galaxy', 'Ravindra', '', '', '+919818967250', '', 'B-176  \r\nStreet no.-8      \r\nMeet Nagar   \r\nDelhi-110094', 'Delhi', 'Delhi', '110094', '(none)', NULL, 0, '', '', '', 1, 1, '2017-02-06 10:52:19', '2017-02-06 10:52:39', 'ravingalaxy@yahoo.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(38, 1, 'Shah', 'Nikunj', 'R', '', '840-134-4462', '', 'B/85, Swami Residency, b/h.Air Force Station,Makarpura, Vadodara -     390013, (Gujarat)', 'Vadodara', 'Gujarat', '390013', '(none)', NULL, 0, '', 'C, C++, Java, Advance Java, HTML, XML, CSS, PHP, JavaScript, MySQL, ORACLE 10g', '', 1, 1, '2017-02-06 10:55:22', '2017-02-06 10:58:13', 'nikunjsbit@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(39, 1, 'Savani', 'Sandip', '', '', '+91 7405177597', '', '', 'Vadodara', 'Gujarat', '', '(none)', NULL, 0, '', 'HTML, CSS, php, oops ,Ajax, Java script, Jquery, Web Services (Json),  Dreamviewer, Eclipse, Notepad++,  XAMP, WAMP,  MYSQL,', '', 1, 1, '2017-02-06 11:02:25', '2017-02-06 11:04:08', 'savani045@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(40, 1, 'D', 'Devi', '', '', '994-430-0112', '+91 - 8142267462', 'No: 11, Main Road, Thiru Nagar, Moolakulam, Pondicherry.', 'Pondicherry', 'Pondicherry', '', '(none)', NULL, 0, '', 'PHP, HTML, jQuery, CSS Database : MYSQL, Eclipse IDE', '', 1, 1, '2017-02-06 11:09:03', '2017-02-06 11:10:04', 'devisashaa@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(41, 1, 'Buha', 'Jalpa', 'Jaysukhbhai', '', '+917878423414', '', 'C\\24 Triloknagar soc,\r\nOpp Vrindavan Township Iskon,\r\nTemple Road, Vadodara\r\nState- Gujarat, India', 'Vadodara', 'Gujarat', '', '(none)', NULL, 0, '', 'PHP, MySQL, Ajax, jQuery, Javascript, Codeignitor, Payumoney, WAMP, Xampp, Dreamweaver, Sublime', '', 1, 1, '2017-02-06 11:15:54', '2017-02-06 11:17:55', 'jalu_buha@yahoo.co.in', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(42, 1, 'Shah', 'Parthiv', '', '', '738-311-9597', '', '207, Nandanvan Complex.Kaladarshan.Vadodara - 390019', 'Vadodara', 'Gujarat', '390019', '(none)', NULL, 0, '', 'PHP, WordPress, Codeigniter, Opencart, MVC, Oxwall, Phalcon, MySql, MsSql, HTML, JavaScript, jquery, css, Ajax, Bootstrap', '', 1, 1, '2017-02-06 11:38:23', '2017-02-17 07:17:19', '2585shah@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(43, 1, 'Shah', 'Himanshu', '', '', '942-710-8603', '', 'Kuber Residency, Waghodiya Road', 'Vadodara', 'Gujarat', '390019', '(none)', '2017-02-10 00:00:00', 0, '', 'ASP.NET, C#, JQuery, Javascript, CSS3, HTML5, Bootstrap, MVC, WebAPI, Web Service, Visual Studio, JSON, XML, SQL Server, MongoDB, MySQL, Linq, Agile', 'Not Employed', 1, 1, '2017-02-08 11:30:58', '2017-02-08 11:32:28', 'him.shah.mca@gmail.com', '', '', 0, 0, 0, 0, '', '', '4.3 lacs', '3.75 lacs', '', '0000-00-00', '', 1, 0, '', 0),
(44, 1, 'Gandhi', 'Mansi', '', '', '845-091-5089', '', '', 'Vadodara', 'Gujarat', '', '(none)', NULL, 0, '', '', '', 1, 1, '2017-02-08 11:35:32', '2017-02-08 11:36:37', 'mansi.nmims@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(45, 1, 'Shah', 'Parthiv', '', '', '738-311-9597', '', '207, Nandanvan Complex.Kaladarshan.Vadodara - 390019', 'Vadodara', 'Gujarat', '390019', '(none)', '2017-02-10 00:00:00', 1, '', 'PHP, WordPress, Codeigniter, Opencart, MVC, Oxwall, Phalcon, MySql, MsSql, HTML, JavaScript, jquery, css, Ajax, Bootstrap, REST API,  Angularjs, Android, Asp.Net, Google Webmaster Tools', '', 1, 1, '2017-02-08 11:45:02', '2017-02-08 11:50:50', '2585shah@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(46, 1, 'Chaudhary', 'Akhilesh', 'Kumar', '', '+91 9540904657', '+91 8882702809', '', 'Noida', 'Uttar Pradesh', '', '(none)', NULL, 0, '', 'ASP.Net, C#.Net, HTML5, JavaScript, JQuery, CSS, AJAX, XML, MS-SQL Server, Oracle, MS-Access, Visual Studio, Web Services, WCF, MS Office', 'Chetu India Pvt Ltd', 1, 1, '2017-02-08 14:10:17', '2017-02-08 14:11:18', 'akhilesh_mca@hotmail.com', '', '', 0, 0, 0, 0, '', '', '', '4.6 lacs', '', '0000-00-00', '', 1, 0, '', 0),
(47, 1, 'Patel', 'Ankit', '', '', '840-168-0992', '820-001-6460', '66/2, Asiad Nagar, Kanjari Road, Halol, Gujarat', 'Halol', 'Gujarat', '', '(none)', NULL, 0, '', 'Asp .Net, C# .Net, Sql Server, Html, Css, Web Service, JavaScript, Jquery, Window Service', 'Manektech', 1, 1, '2017-02-08 14:32:56', '2017-02-08 14:32:56', 'ankitpatel130@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(48, 1, 'Prajapati', 'Ankit', '', '', '+91-9374338026', '', 'C/31, Bramhanagar Soc, B/H V.I.P View,\r\nKarelibaug ,\r\nVadodara-390022', 'Vadodara', 'Gujarat', '390022', '(none)', NULL, 0, '', '', 'Aum Software Solutions', 1, 1, '2017-02-08 14:35:12', '2017-02-08 14:35:17', 'ankit.prjpt@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(49, 1, 'Gupta', 'Ashish', '', '', '909-600-7042', '', 'B 429, Mahaveer Tuscan Apartment, Hoodi Circle, Whitefield, Bangalore, 560048', 'Bangalore', 'Karnataka', '560048', '(none)', NULL, 0, '', 'AP CRM, Ms Excel, BMC Remedy 8.1, Ms Office, Ms Access, SNOW, Oracle 11i', 'ATOS India Pvt Ltd', 1, 1, '2017-02-08 14:38:29', '2017-02-08 14:38:29', 'ashish5gupta@hotmail.com', '', '', 0, 0, 0, 0, '', '', '', '12.7 lacs', '', '0000-00-00', '', 1, 0, '', 0),
(50, 1, 'Trivedi', 'Dharmik', '', '', '+91 97256 74446', '', '31/36 Parvati Nagar Society,\r\nB/H Haridwarnagar,\r\nHarni Road, Vadodara - 390022', 'Vadodara', 'Gujarat', '390022', '(none)', NULL, 1, '', 'ASP.Net Web Forms & MVC in C#, Microsoft Visual Studio 2012/ 2013, Microsoft SQL Management Studio 2008 R2/ 2012, JQuery, Javasript, Unit Testing, Telerik, Kendo, WCF', '	Extendrum Technologies & Denovo Dynamics', 1, 1, '2017-02-08 14:41:44', '2017-02-17 07:49:02', 'dharmiktrivedi@ymail.com', '', '', 0, 0, 0, 0, '', '', '', '4.15 lacs', '', '0000-00-00', '', 1, 0, 'Worktime', 0),
(51, 1, 'Kyada', 'Haresh', '', '', '+91 9909 456367', '', 'B-51,Mathura nagari  Soc,\r\nNear Nand Society,\r\nOld Padra Road,Akshar Chowk, Vadodara', 'Vadodara', 'Gujarat', '', '(none)', NULL, 0, '', 'C#,VB.NET, HTML, Microsoft IIS, Visual Studio, SQL Server, Microsoft Access,', 'Rangam Infotech Pvt. Ltd', 1, 1, '2017-02-08 14:52:23', '2017-02-08 14:52:24', 'haresh.kyada@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '4.3 Lakhs', '', '0000-00-00', '', 1, 0, '', 0),
(52, 1, 'Pravasi', 'Kevin', '', '', '997-997-9007', '', '', '', '', '', '(none)', NULL, 0, '', 'ASP .NET MVC-5, C#, Microsoft Visual Studio 2015, SQL Server 2014, Ajax, Image Processor, Mongo DB, Bootstrap', 'CRAWDED Technologies', 1, 1, '2017-02-08 15:08:28', '2017-02-15 16:25:46', '', '', 'kevinpravasi11@gmail.com', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(53, 1, 'Parmar', 'Kiran', '', '', '997-483-9277', '', '', '', '', '', '(none)', NULL, 0, '', 'Web Technology	ASP.net 4.0, C# , CSS, HTML, JavaScript, Ajax, XML, Jquery, Web Services, WCF Services,Asp.net  MVC5,Asp.net MVC Web API, Linq, Entity Framework, SSIS Databases, Access,Sql Server 2012,Oracle', 'RISHABH SOFTWARE PRIVATE LTD', 1, 1, '2017-02-08 15:24:16', '2017-02-16 15:41:10', 'kiran_kjp@yahoo.co.in', '', '', 0, 0, 0, 0, '', '', '', '5.4 Lakhs', '', '0000-00-00', '', 1, 0, '', 0),
(54, 1, 'Parmar', 'Mahipatsinh', 'N', '', '+91-7874900390', '+91-7043788600', '', '', '', '', '(none)', NULL, 0, '', 'C, C#, ASP.NET. Database, SQL Server 2005, 2008 R2, HTML, JavaScript, Asp, CSS, jQuery ,Bootstrap Web Servers, IIS  Packages/Tools, MS-Office Theories, Object-Oriented Programming, Operating Systems, System analysis and Design.', 'Daikoku Software Services', 1, 1, '2017-02-08 15:30:35', '2017-02-08 15:30:37', 'pmahipatsinh88@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(55, 1, 'Shaik', 'Nagulmeera', '', '', '91-7358367614', '', 'House No: 143, \r\nKonayapalem, Chandarla Padu (Md),                                    Muslim Area,  Chandarla Padu (PO),Nandigama-521182', 'Nandigama', 'Tamil Nadu', '521182', '(none)', NULL, 0, '', 'Visual studio, Quick Books, C#.NET, LINQ, ASP.NET MVC 5.2, ENTITY FRAME WORK, BOOTSTRAP DESIGN, ADO.NET', 'Expert solution technologies', 1, 1, '2017-02-08 15:34:31', '2017-02-08 15:34:32', 'nagulmeera555@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '0.95 Lakhs', '', '0000-00-00', '', 1, 0, '', 0),
(56, 1, 'Patel', 'Sanjay', '', '', '760-015-4352', '903-343-4084', 'K-203, Narayan Avenue, behind Raj Farm, Bhat-382428, Gandhinagar, Gujarat', 'Gandhinagar', 'Gujarat', '382428', '(none)', NULL, 0, '', 'ASP.Net 4.0, SQL Server 2012, Web Services , WCF, AJAX,  Jquery , JAVA Script, SSRS, SSIS, Crystal Report, LINQ, MVC, Third Party Integration, C# , VB, HTML, PL-SQL', 'NIC(National Informatics Centre)  Contract of MPPCB', 1, 1, '2017-02-08 15:45:45', '2017-02-15 16:25:05', '', '', '', 0, 0, 0, 0, '', '', '', '4.8 Lakhs', '', '0000-00-00', '', 1, 0, '', 0),
(57, 1, 'Jadhav', 'Siddharth', 'A', '', '917-376-3367', '', 'AnandPrabha Pardesi Falia, Baranpura, Vadodara-01', 'Vadodara', 'Gujarat', '', '(none)', NULL, 0, '', 'C, C++, JAVA, C#, ASP.NET, VB.NET, SQL Server, MySQL, HTML, JavaScript, PHP,JQuery,CSS', 'Avalance Global Solutions', 1, 1, '2017-02-08 15:56:55', '2017-02-17 07:18:50', 'sidjadhav07@gmail.com', 'sidjadhav5117@gmail.com', '', 0, 0, 0, 0, '', '', '', '1 Lakhs', '', '0000-00-00', '', 1, 0, '', 0),
(58, 1, 'Darji', 'Saurabh', '', '', '+91 7878048637', '', '', 'Vadodara', 'Gujarat', '', '(none)', NULL, 0, '', 'ASP.NET MVC 5/4/3, ASP.Net, HTML5, Web API, Web Service, Windows Service, third party tools, C#.NET, LINQ,  ADO.NET, MSSQL Server 2012, Framework:	.Net Framework 4.5/4.0/3.5, Entity Framework, JS Frameworks, Angular JS, JQuery, JSON, JavaScript, CSS3, Bootstrap, Knockout JS, KendoUI,', 'Priya Softweb Solutions Pvt. Ltd.', 1, 1, '2017-02-09 09:01:24', '2017-02-09 09:01:50', 'saurabhdarji2110@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '3.55 Lakhs', '', '0000-00-00', '', 1, 0, 'Worktime', 0),
(59, 1, 'Tiwari', 'Shival', '', '', '953-845-7555', '', '25 Vardhman complex ,kumbha nagar ,hiran magri Udaipur(Raj)', 'Udaipur', 'Rajasthan', '', '(none)', NULL, 0, '', 'C#, ASP .NET,MVC,EF, XML, HTML, OOPS, JavaScript, Ajax, Visual Studio 2005,2010,2013, SQL SERVER 2005, SQL SERVER 2008R2, SQL SERVER 2012,', '', 1, 1, '2017-02-09 09:05:08', '2017-02-09 09:56:36', 'shival.tiwari86@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(60, 1, 'Shah', 'Sunil', '', '', '990-903-0891', '', '', '', '', '', '(none)', NULL, 0, '', 'C#.Net, ADO.NET, Windows mobile Development , JSON, REST API, MVC 3,c# .NET, WCF, ADO.NET JQuery, LINQ, SQL Server Reporting Services, Excel Macros, MS-SQL Server 2005, Oracle, MS-Access, Crystal Report,  MS Access Report, Custom Report (Excel, Text, PDF, HTML), SSRS (SQL Server Reporting service)', 'Talent Anywhere', 1, 1, '2017-02-09 10:02:55', '2017-02-16 13:16:03', 'Sunilsweety2001@hotmail.com', '', '', 0, 0, 0, 0, '', '', '', '9 lakhs', '', '0000-00-00', '', 1, 0, '', 0),
(61, 1, 'Pandya', 'Trilok', 'J', '', '+91- 9374447442', '', 'A-102, Swati-Appartment, NrTv-9 office, Bh D-Mart, Jivraj Park, Vejalpur, Ahmadabad-Gujarat-India', 'Ahmedabad', 'Gujarat', '', '(none)', NULL, 0, '', 'C#, Microsoft Visual Basic®, Java, .Net,VB.NET, PL/SQL,Dot Net Framework 1.0, Dot Net Framework 2.0, Dot Net Framework 3.0', 'Radyne Corporation Ltd', 1, 1, '2017-02-09 10:36:28', '2017-02-09 10:36:29', 'trilokjpandya@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(62, 1, 'Chauhan', 'Saurabh', 'H', '', '886-664-6223', '', 'B-9 Poojan row house -1, Opp Pankaj Nagar , Palanpur Jakartnaka, \r\nSurat - 395009', 'Surat', 'Gujarat', '395009', '(none)', NULL, 0, '', 'C#, SQL, JavaScript, jQuery, HTML, CSS, XML, Json, .NET Framework (4.0+), ASP.NET, MVC, ADO.NET, AJAX, WCF, IIS 7.5, LINQ, Web services, MS SQL Server (2008, 2012, 2014), MySql', 'AllScripts', 1, 1, '2017-02-09 10:40:00', '2017-02-09 10:40:01', 'saurabhchauhan232@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '4.2 Lakhs', '', '0000-00-00', '', 1, 0, '', 0),
(63, 1, 'Prajapati', 'Jignesh', 'R', '', '903-325-3934', '990-427-7747', '307, Balaji Vihar Complex,\r\nB/H Mahesh Complex, \r\nNr. Parivar Chokadi,\r\nWaghodia road, Vadodara - 390019.', 'Vadodara', 'Gujarat', '390019', '(none)', NULL, 0, '', 'C, C++, C#, SQL, MySql, MS Access, JAVA SCRIPT, AJAX, HTML, CSS, jQuery , Bootstrap, ASP.Net 4, Classic ASP,XML', 'Arcadia Consultancy PVT LTD', 1, 1, '2017-02-09 10:47:23', '2017-02-09 10:47:23', 'prajapati_jignesh22@yahoo.com', 'jigneshprajapati22@gmail.com', '', 0, 0, 0, 0, '', '', '', '2.4 Lakhs', '', '0000-00-00', '', 1, 0, '', 0),
(64, 1, 'Shah', 'Brinda', '', '', '997-910-3394', '972-578-9510', 'C 26 nilambar villa society  near wagodia road baroda', 'Vadodara', 'Gujarat', '', '(none)', NULL, 0, '', 'Jquery, Java script, Ajax, CSS, HTML, PHP, Yii framework,Codeigniter,MVC, Wordpress, Rest API, MySQL,', 'Sinelogix technologies', 1, 1, '2017-02-13 12:15:24', '2017-02-15 16:17:42', 'brindashh97@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '2.4 lakhs', '', '0000-00-00', '', 1, 0, 'Worktime', 0),
(65, 1, 'Suthar', 'Prakash', 'Kumar', '', '+91 7359861086', '', 'F/21, Sahajanand Flats, Near Saraswati\r\nComplex, GIDC Road, Manjalpur', 'Vadodara', 'Gujarat', '390011', '(none)', NULL, 0, '', 'CSS, Ajex, JQuery MVC, Bootstrap, CodeIgnitor, PHP, MySQL, Xampp', 'Office Beacon AS Pvt Ltd', 1, 1, '2017-02-13 12:23:07', '2017-02-16 15:40:07', 'pksuthar1992@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '1 lakhs', '', '0000-00-00', '', 1, 0, 'Worktime', 0),
(66, 1, 'Parmar', 'Mittal', '', '', '+919586361766', '+919737383264', '', 'Anand', 'Gujarat', '388121', '(none)', NULL, 0, '', 'Window 7, Window 8,Window XP Onward,Ubuntu,,Linux, C,C++,Java,Vb.Net,Android,php, MS Access, MYSQL', 'Go Codes', 1, 1, '2017-02-13 14:00:14', '2017-02-13 14:00:15', 'parmarmittal4@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(67, 1, 'Joshi', 'Manoj', '', '', '+91-9104629985', '', 'Bharat Seva Ashram Sang, Ashram Road,Navrangpura Ahmedabad Gujarat', 'Ahmedabad', 'Gujarat', '', '(none)', NULL, 0, 'Skype Account :\r\nmanoj.joshi.1111(Manoj Joshi)', 'Zend Framwork2, ZFcore Core Php,  MySQL, Html, CSS,  JavaScript, Jquery, json, bootstrap, web-services,', 'Alakmalak Technologies Pvt Ltd', 1, 1, '2017-02-13 14:06:12', '2017-02-13 14:06:12', 'mj791911@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '2 Lakhs', '', '0000-00-00', '', 1, 0, '', 0),
(68, 1, 'Soni', 'Narendra', '', '', '+91-9574120077', '', 'Flat no-402,ROSSA AMITY ENCLAVE NEAR AMITY SCHOOL', 'Bharuch', 'Gujarat', '392001', '(none)', NULL, 0, '', '', 'JAYAMSOFT GLOBAL SERVICE LLB', 1, 1, '2017-02-13 14:15:59', '2017-02-13 14:15:59', 'NARENDRASONI811@GMAIL.COM', '', '', 0, 0, 0, 0, '', '', '', '1 lakhs', '', '0000-00-00', '', 1, 0, '', 0),
(69, 1, 'Gore', 'Amol', 'P', '', '960-497-9049', '997-988-4653', 'At Post-Ektuni,Tq-Paithan,Dist-Aurangabad', 'Aurangabad', '', '', '(none)', NULL, 0, '', 'C,C++,.NET, Java, Linux,Unix,Windows,', 'Badve Autotech pvt ltd', 1, 1, '2017-02-13 14:35:31', '2017-02-13 14:35:31', 'amolgore329@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '1.8 Lakhs', '', '0000-00-00', '', 1, 0, '', 0),
(70, 1, 'Mehta', 'Abhishek', 'H', '', '+91 9429080502', '+91 9998755046', 'Ranchhodji Mandir Faliya,\r\nShehrabhagol Road,	\r\nGodhra-389001', 'Godhra', 'Gujarat', '389001', '(none)', NULL, 0, '', 'MySQL, C, C++,VB, .Net, javascript, CSS, PHP, HTML', '', 1, 1, '2017-02-13 14:44:35', '2017-02-13 14:44:36', 'Abhishekmehta786m@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(71, 1, 'Tripathi', 'Lavkush', '', '', '880-012-6003', '', '', 'Noida', '', '', '(none)', NULL, 0, '', 'PHP, YII Framework, OOPs Concept, MVC Architecture, MySQL, Oracle, Cassandra, MongoDB, HTML, CSS, JavaScript, jQuery, X-Path, Simple HTML DOM, XML, JSON, Code Convention (Best Practices)', 'IndiaMART InterMESH Pvt. Ltd', 1, 1, '2017-02-14 12:19:48', '2017-02-14 12:19:55', 'lavkush.pro@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(72, 1, 'R', 'Harsha', '', '', '+91-9900324829', '', '', 'Bangalore', 'Karnataka', '', '(none)', NULL, 0, '', 'PHP ,HTML5 SQL, windowsxp ,7 basic uinx commands, oracle11g/10g, MySQL', 'Trimax IT Infrastructure and Services LTD', 1, 1, '2017-02-14 12:25:36', '2017-02-14 12:25:37', 'Harsha.rrp@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(73, 1, 'Choxi', 'Shailee', 'Pareshbhai', '', '814-183-4360', '', '12/B Bhagya Laxmi society, near Akota Garden, Akota , Baroda ,Gujarat', '', '', '', '(none)', NULL, 0, '', 'HTML, CSS, PHP, C, C++, JAVA', '', 1, 1, '2017-02-14 12:31:04', '2017-02-14 12:31:05', 'shaileechoxi@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(74, 1, 'Mistry', 'Niraj', 'J', '', ':+91-9574204097', '', 'Bhailal Vadi ,\r\nHari Nagar Tarsadi , Kosamba\r\nTaluka: Mangrol, \r\nDistrict: Surat, Gujarat – 394120', 'Surat', 'Gujarat', '394120', '(none)', NULL, 0, '', 'PHP, MySQL, CorePHP, HTML, CSS , JavaScript, JQUERY,AJAX, BOOTSTRAP, WordPress , codeIgniter.,', 'Activous Solution', 1, 1, '2017-02-14 12:36:43', '2017-02-14 12:36:44', 'mistry.niraj.j@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '1.2 Lakhs', '', '0000-00-00', '', 1, 0, '', 0),
(75, 1, 'Parmar', 'Riya', 'P', '', '972-431-6629', '', '', 'Bharuch', 'Gujarat', '', '(none)', NULL, 0, '', 'C, C++, C#.NET, ASP.NET, PHP, HTML, MS SQL 2008 & 2012', '', 1, 1, '2017-02-14 12:41:44', '2017-02-14 12:41:44', 'riyaparmar.it@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(76, 1, 'Patel', 'Parija', '', '', '704-313-4834', '', '42 Panchamrut Bung-1, Science city road', 'Ahmedabad', 'Gujarat', '380060', '(none)', NULL, 0, '', 'php, linux, Java, Spring', '', 1, 1, '2017-02-14 12:47:00', '2017-02-14 12:47:00', 'pkp2021@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(77, 1, 'Shah', 'Sarthak', '', '', '+91-8469598777', '', '', 'Vadodara', 'Gujarat', '', '(none)', NULL, 0, '', 'PHP, HTML 5, JavaScript, CSS 3, MySQL, CSV files,', '', 1, 1, '2017-02-14 12:48:49', '2017-02-17 07:13:46', 'sarthak.sd77@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(78, 1, 'Mistry', 'Hirvi', '', '', '+91 9408352603', '+91 8488977627', 'C-103, Kanha Dreams,\r\nB/H SBI Bank,\r\nKamla Nagar,Ajwa Rd,\r\nVadodara (Gujarat)-390019', 'Vadodara', 'Gujarat', '390019', '(none)', NULL, 0, '', 'C, C++, VB 6.0, JAVA, PHP, PHONEGAP, HTML, DHTML, CSS, JAVA Script,, Oracle (8i), MS Access, SQL', '', 1, 1, '2017-02-14 12:54:16', '2017-02-14 12:54:17', 'hirvimistry27@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(79, 1, 'Jethva', 'Kajal', '', '', '787-454-3620', '', '', 'Anand', 'Gujarat', '', '(none)', NULL, 0, '', 'HTML, CSS, Angular JS, PHP, MySQL, Photoshop, Bootstrap', '', 1, 1, '2017-02-14 12:59:36', '2017-02-14 12:59:36', 'jethvakaju1995gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(80, 1, 'Palor', 'Rutvi', '', '', '+91 9638099068', '', 'B/6, Krishna Murari soc., VIP Road, Vadodara, Gujarat – 390018', 'Vadodara', 'Gujarat', '390018', '(none)', NULL, 0, '', 'SQL, PLSQL, PeopleSoft, Java, .NET, C, Application Designer 8.54, BMC tool, SQL Developer, HTML, XML, CSS, Java-Script, C#.NET., PHP, Oracle 11g, Oracle 12C', '', 1, 1, '2017-02-14 13:05:13', '2017-02-17 07:09:24', 'rutvi.palor93@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(81, 1, 'Shah', 'Drashti', 'Mithulkumar', '', '+918401927584', '', '204-CHANDRAGUPT  TOWER, SHYAMAL RESIDENCY,\r\nB/H KRISHNA PARK SOCIETY, AJWA-WAGHODIYA RING ROAD,\r\nVADODARA – 390019', 'Vadodara', 'Gujarat', '390019', '(none)', NULL, 0, '', '', 'bitbuffs technologies Pvt. Ltd', 1, 1, '2017-02-14 13:07:29', '2017-02-14 13:08:25', 'drashti349@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '1.45 Lakhs', '', '0000-00-00', '', 1, 0, '', 0),
(82, 1, 'Vangari', 'Madhu', '', '', '814-336-3176', '', '12-45,  Pochampally,  Nalgonda,  Telangana, 508284', 'Nalgonda', 'Telangana', '508284', '(none)', NULL, 0, '', 'C,C++, Java, HTML, Java Script, Oracle, MS Office', '', 1, 1, '2017-02-14 13:10:54', '2017-02-14 13:10:55', 'madhumb505@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(83, 1, 'Vangari', 'Madhu', '', '', '814-336-3176', '', '12-45,  Pochampally,  Nalgonda,  Telangana, 508284', 'Nalgonda', 'Telangana', '508284', '(none)', NULL, 0, '', 'C,C++, Java, HTML, Java Script, Oracle, MS Office', '', 1, 1, '2017-02-14 13:11:15', '2017-02-14 13:11:16', 'madhumb505@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(84, 1, 'Jariwala', 'Dhaval', '', '', '958-618-0210', '', '202, Second Floor, Siddhivinayak Flats,\r\nP.No 156, 157, Vihar Society-1, \r\nVed Road,\r\nSurat - 395004', 'Surat', 'Gujarat', '395004', '(none)', NULL, 0, '', 'PHP, JAVA, ASP.NET , VB.NET, ANDROID', '', 1, 1, '2017-02-14 13:14:25', '2017-02-14 13:14:26', 'dhaval20jariwala@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(85, 1, 'V', 'Suganya', '', '', '799-679-7197', '', 'No : 373, Big Street, \r\nA.J.Pet, Tamilnadu', '', 'Tamil Nadu', '', '(none)', NULL, 0, '', 'PHP, SQL, HTML, CSS, JavaScript, C#', 'Blewsoft Technologies Pvt Ltd', 1, 1, '2017-02-14 13:18:41', '2017-02-14 13:18:43', 'suganyavenkat21@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '1 lakh', '', '0000-00-00', '', 1, 0, '', 0),
(86, 1, 'Gandhi', 'Harsh', '', '', '+918140428484', '', '', '', '', '', '(none)', NULL, 0, '', 'PHP, JQUERY, JAVASCRIPT, AJAX, HTML CSS, JSON, JQUERY MOBILE, ANGULARJS, SQL, Mysql, Mysqli, Codeigniter, Smarty', 'MSP Concepts', 1, 1, '2017-02-14 13:21:35', '2017-02-14 13:21:35', 'gandhih81@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '2.4 lakhs', '', '0000-00-00', '', 1, 0, '', 0),
(87, 1, 'Dave', 'Kalpesh', 'B', '', '972-786-6337', '848-594-0935', 'G-32,jagruti Soc.,\r\nOpp.Yash Complex, \r\nB/H Ganga Nagar\r\nGotri Road, Vadodara', 'Vadodara', 'Gujarat', '', '(none)', NULL, 0, '', 'C# ,HTML ,CSS, JavaScript, Net ,  Core PHP, SQL Server, MySqlMS Office, Visio, DreamWeaver, Visual Studio', '', 1, 1, '2017-02-14 13:25:42', '2017-02-14 13:25:43', 'kalpeshdave03@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(88, 1, 'Bhatt', 'Brinda', 'M', '', '+91 9033 897332', '', 'B/11,Gopalbag society, Near bandhan party plot, laxmipura road,Vadodara-390003', 'Vadodara', 'Gujarat', '390003', '(none)', NULL, 0, '', 'PHP-MySQL,HTML,Java Script, C, C++, .Net (C#), MySQL, Oracle 9i., SQL Server 2005, Ms Access,', '', 1, 1, '2017-02-14 13:29:39', '2017-02-14 13:29:39', 'brinda.bhatt01@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(89, 1, 'Sharma', 'Kinjal', '', '', '+91 9909992667', '', '', 'Anand', 'Gujarat', '388001', '(none)', NULL, 0, '', 'Asp.Net –Web Forms, Asp.Net with C# Language, MS SQL Server 2008 R2, Oracle 11g, Pl/SQL, Store Procedure, Triggers, Views, Sequence, Cursor', '', 1, 1, '2017-02-14 13:38:11', '2017-02-14 13:40:13', 'kinjalsharma1311@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(90, 1, 'Soni', 'Jyoti', '', '', '+91-9998252453', '', 'C-3 216, Samta Flats,    Nr. PDIL Office,    Subhanpura Road.    Vadodara – 390021. Gujarat, India', 'Vadodara', 'Gujarat', '390021', '(none)', NULL, 0, '', 'Code reviews, ASP.NET with C#, Java, C++,C, Web-based software engineering, Desktop Application, MS Access, MS SQL Server 2012, MS SQL Server 2008 R2, HTML, CSS, Field Work', 'Softcom Technologies', 1, 1, '2017-02-14 13:45:45', '2017-02-15 16:16:34', 'sonijyoti831994@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(91, 1, 'Desai', 'Yagnik', '', '', '+91 97222 32442', '', 'C-1004, Sanskruti Residency,\r\nNR.Maharaja Farm,\r\nMota Varachha,\r\nSurat-394101(Gujarat)', 'Surat', 'Gujarat', '394101', '(none)', NULL, 0, '', 'C#.NET, ASP.Net using Microsoft Framework  3.5/4.0/4.5, XML, AJAX, Microsoft SQL Server 2008/2008 R2 and 2012ADO.Net, Entity Framework,', 'Cygnus Softtech', 1, 1, '2017-02-14 13:56:11', '2017-02-15 15:05:53', 'desaiyagnik2@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(92, 1, 'Patel', 'Hardik', '', '+91 022 40158626', '+91 9699699766', '', 'B-702, Mangalya Bldg, Off. Marol Maroshi Road,, Marol, Andheri (East), Mumbai, Maharashtra 400059', 'Mumbai', 'Maharastra', '400059', '(none)', NULL, 0, '', 'Apache, MySQL, Drupal, JavaScript , PHP, jQueryDrupal, Wordpress', '', 1, 1, '2017-02-16 15:46:16', '2017-02-16 15:46:16', 'hplord12@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(93, 1, 'Patel', 'Jigisha', 'Anibhai', '', '+91 78749 30180', '', 'C-55, UMA NAGAR SOCIETY, NOVINO ROAD TARSALI VADODARA - 390009', 'Vadodara', 'Gujarat', '390009', '(none)', NULL, 0, '', 'ANDROID, MS OFFICE, PHP, WEB DESIGN, HTML. SOFTWARE TESTING , C, C++, JAVA', '', 1, 1, '2017-02-16 15:50:35', '2017-02-16 15:50:35', 'jigus.patel111@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(94, 1, 'P', 'Jayanthi', 'B', '', '+91-8892132383', '', 'Res. #377/190 Mission Compound,\r\nMain road, Kavalbyrasandra,\r\nRT Nagar Post,\r\nBangalore-560032', 'Bangalore', 'Karnataka', '560032', '(none)', NULL, 0, '', 'C, C++, CORE JAVA, Java Script, VB script, ASP, PHP, Perl, Python, jQuery, Ajax, Oracle 10g, MYSQL, MS-SQL SERVER 2000, 2005, 2008 and MS-Access, IIS, Apache-Tomcat 6.0, Xampp, Lamp', '', 1, 1, '2017-02-16 16:08:30', '2017-02-16 16:08:30', 'bp.jayanthi94@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(95, 1, 'Vispute', 'Sagar', 'Kishorbhai', '', '780-192-5185', '', '28/414 Gujarat housing board Akota ,Vadodara 390020', 'Vadodara', 'Gujarat', '390020', '(none)', NULL, 0, '', 'C,C++,ASP.NET, SQL Server, HTML,CSS', '', 1, 1, '2017-02-21 08:23:34', '2017-02-21 08:23:34', 'sagar.vispute5@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(96, 1, 'Suthar', 'Aanal', 'R', '', '+91 9998919706', '', 'E/63, NARASINHDHAM SOC, B/H MOTHERS SCHOOL, HARINAGAR WATER TANK GOTRI ROAD, VADODARA. GUJARAT', 'Vadodara', 'Gujarat', '390021', '(none)', NULL, 0, '', 'C, C++, JAVA,.NET, (HTML,CSS,Java Script,XHTML,Adobe Photoshop', '', 1, 1, '2017-02-21 11:49:39', '2017-02-21 11:49:39', 'aanalsuthar34@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(97, 1, 'Pitolwala', 'Taheri', '', '', '886-652-5503', '', '503/B-Block/The Emperor Tower \r\nFatehGanj Main Road Fatehganj\r\nVadodara-390002', 'Vadodara', 'Gujarat', '390002', '(none)', NULL, 0, '', 'HTML, CSS, Bootstrap, My Sql, JavaScript, J-Query, Asp.net, C#, Mvc 4, Basic Wcf , Window Base Application', '', 1, 1, '2017-02-21 12:05:40', '2017-02-21 12:05:40', 'Tpitol65@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(98, 1, 'Patel', 'Jatinkumar', 'B', '', '+919824692330', '', 'Sri Ram street, At: - Popatpura,\r\nTa:-Khambhat, Dist:-Anand', 'Anand', 'Gujarat', '388640', '(none)', NULL, 0, '', 'C, C++, Asp.Net,C#, JAVA, PHP, HTML, JavaScript,CSS', '', 1, 1, '2017-02-21 12:08:03', '2017-02-21 12:08:03', 'jatinbhaskarbhai510@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(99, 1, 'Rupera', 'Mahavir', 'A', '', '+91-9909705254', '', 'ShivKrupa,Krishna park society,Prabhat,Waghodia', 'Vadodara', 'Gujarat', '360019', '(none)', NULL, 0, '', '', '', 1, 1, '2017-02-21 12:57:00', '2017-02-21 12:57:00', 'ruperamahavir8@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(100, 1, 'Bandaru', 'Abheshek', '', '', '837-466-2592', '', '', 'Hyderabad', 'Telangana', '', '(none)', NULL, 0, '', 'Word, Excel, PowerPoint, Foxpro, Access', '', 1, 1, '2017-02-21 13:01:42', '2017-02-21 13:01:42', 'abheshekbandaru@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(101, 1, 'Jadhav', 'Mahnedra', 'M', '', '+91-9033730357', '', 'Dr.Ambedkar street,\r\nAt post: - Metpur\r\nTa: - Khambhat-388620,\r\nDist: - Anand\r\nState: - Gujarat', 'Anand', 'Gujarat', '388620', '(none)', NULL, 0, '', '', '', 1, 1, '2017-02-21 13:06:04', '2017-02-21 13:06:04', 'mmjadavjdv@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(102, 1, 'Majmundar', 'Chaitali', '', '', '990-924-8132', '', '9-B, Shyam Gokul Society, Opposite Airport, Harni Road, Vadodara, Gujarat – 390022, India', 'Vadodara', 'Gujarat', '390022', '(none)', NULL, 0, '', 'HR ExecutivePayroll, Time Office, PF, Recruitment & Selection, Induction & Orientation, Disciplinary Actions, Exit Formalities', '', 1, 1, '2017-02-21 13:12:25', '2017-02-21 13:12:25', 'khushi_chaitu30@yahoo.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(103, 1, 'Shroff', 'Chetan', 'K', '', '903-331-1304', '', 'A903, Gratte Ciel, Opp Kalyan Party Plot, Vasna, Vadodara', 'Vadodara', 'Gujarat', '', '(none)', NULL, 0, '', 'HR Manager', 'ASP Solu-tech Pvt. Ltd', 1, 1, '2017-02-21 13:28:53', '2017-02-21 13:28:53', 'shroff.chetan@yahoo.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(104, 1, 'Raval', 'Kirat', '', '', '', '', '10/a, Gokul Society, Sindhwaimata Road\r\nPratapnagar – Baroda 390004', 'Vadodara', 'Gujarat', '390004', '(none)', NULL, 0, '', 'Senior Manager', '', 1, 1, '2017-02-21 13:34:39', '2017-02-21 13:34:51', 'kiratraval@yahoo.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(105, 1, 'Solanki', 'Dipak', '', '', '903-385-2513', '', '', 'Anand', 'Vadodara', '', '(none)', NULL, 0, '', '', '', 1, 1, '2017-02-21 13:43:04', '2017-02-21 13:43:04', 'dipaksolanki1494@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(106, 1, 'Patel', 'Rakesh', '', '', '846-011-4956', '940-803-3131', 'C/176, Hariom Nagar, Gujarat Housing Board, Pandesara, Surat-394221(Gujarat)', 'Surat', 'Gujarat', '394221', '(none)', NULL, 0, '', 'Software implementation executive', '', 1, 1, '2017-02-21 13:51:29', '2017-02-21 13:51:29', 'Rakeshsurat31@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0);
INSERT INTO `candidate` (`candidate_id`, `site_id`, `last_name`, `first_name`, `middle_name`, `phone_home`, `phone_cell`, `phone_work`, `address`, `city`, `state`, `zip`, `source`, `date_available`, `can_relocate`, `notes`, `key_skills`, `current_employer`, `entered_by`, `owner`, `date_created`, `date_modified`, `email1`, `email2`, `web_site`, `import_id`, `is_hot`, `eeo_ethnic_type_id`, `eeo_veteran_type_id`, `eeo_disability_status`, `eeo_gender`, `desired_pay`, `current_pay`, `work_authorization`, `date_of_birth`, `ssn`, `is_active`, `is_admin_hidden`, `best_time_to_call`, `deleted`) VALUES
(107, 1, 'Derasari', 'Achyuta', '', '', '', '', 'Kotiyark Nagar – Dn.4, Near Parvati nagar, Behind to Govind Rao Park,  Ajwa Road, Out of PaniGate, Vadodara - 19', 'Vadodara', 'Gujarat', '', '(none)', NULL, 0, '', '', '', 1, 1, '2017-02-21 13:59:54', '2017-02-21 13:59:54', 'achyutaderasari@gmail.com', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 0),
(108, 1, 'Shah', 'Parthiv', 'R', '7383119597', '7383119597', '7383119597', 'P-104 Rajeswer gold view , \r\nBaorda ', 'Baroda', 'Guajrat', '390019', '', '2017-04-27 00:00:00', 1, 'PHP Coder ', 'php', 'Investis', 1, 1, '2017-04-07 20:49:03', '2017-04-07 21:46:12', '2585shah1@gmail.com', 'parthiv@gmail.com', 'www.youmewebs.com', 0, 0, 0, 0, '', '', '40000', '35000', '', '0000-00-00', '', 1, 0, 'After 10 OC', 0),
(111, 1, 'Shah', 'Nilam', '', '8140342881', '', '', '', '', '', '', '', '2017-04-19 00:00:00', 0, '', '', '', 1, 1, '2017-04-07 22:59:22', '2017-04-10 16:56:40', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '0000-00-00', '', 1, 0, '', 1),
(149, 1, 'Shahs', 'Swaraa', 'Pp', '7383119591', '7383119592', '7383119593', 'P-104 Rajeswer good view \r\nBaroda', 'Barodaa', 'Guajrata', '390020', 'php123', '2017-04-21 00:00:00', 1, 'Test is test data added', 'php , jqueyr', 'Investis1', 1, 1, '2017-04-10 18:26:38', '2017-04-10 22:56:00', 'swara1@gmail.com', 'swara2@gmail.com', 'www.youmewebs.com', 0, 0, 0, 0, '', '', '45000', '37000', '', '0000-00-00', '', 1, 0, 'After 10 OC', 0),
(151, 1, 'cba', 'abv', 'P', '8140342881', '8140342882', '8140342883', 'Wagpdeya road', 'Baroda', 'Guajrat', '390019', 'New Pa', '2017-04-20 00:00:00', 1, 'Test', 'NO Skills', 'Post', 1, 1, '2017-04-10 23:41:07', '2017-04-11 15:29:56', 'raj1@gmail.com', 'raj2@gmail.com', 'www.youmewebs.com', 0, 0, 0, 0, '', '', '29000', '25000', 'PR', '2017-04-29', '123456789', 1, 0, 'After 11 OC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `candidate_assign`
--

DROP TABLE IF EXISTS `candidate_assign`;
CREATE TABLE `candidate_assign` (
  `candidate_assign_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `joborder_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp,
  `updated_by` int(11) NOT NULL,
  `updated_on` timestamp,
  `deleted` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_assign`
--

INSERT INTO `candidate_assign` (`candidate_assign_id`, `candidate_id`, `client_id`, `joborder_id`, `created_by`, `created_on`, `updated_by`, `updated_on`, `deleted`) VALUES
(1, 8, 1, 5, 1, '2017-05-11 15:34:26', 0, '2017-05-11 15:34:26', 0),
(2, 4, 2, 5, 1, '2017-05-11 15:36:19', 0, '2017-05-11 15:36:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `candidate_notes`
--

DROP TABLE IF EXISTS `candidate_notes`;
CREATE TABLE `candidate_notes` (
  `candidate_note_id` int(11) NOT NULL,
  `joborder_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `candidate_status_id` int(11) NOT NULL,
  `notes` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp,
  `updated_by` int(11) NOT NULL,
  `updated_on` timestamp,
  `deleted` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_notes`
--

INSERT INTO `candidate_notes` (`candidate_note_id`, `joborder_id`, `candidate_id`, `candidate_status_id`, `notes`, `created_by`, `created_on`, `updated_by`, `updated_on`, `deleted`) VALUES
(1, 5, 4, 1, 'Tet 1', 1, '2017-05-11 19:42:30', 0, '2017-05-11 19:42:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `candidate_status`
--

DROP TABLE IF EXISTS `candidate_status`;
CREATE TABLE `candidate_status` (
  `candidate_status_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `type` tinyint(2) NOT NULL DEFAULT '1' COMMENT 'Candidate Status  = 0 , Candidate Call Status = 1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_status`
--

INSERT INTO `candidate_status` (`candidate_status_id`, `name`, `type`) VALUES
(1, 'Applied', 0),
(2, 'Interview - Appeared', 0),
(3, 'Interview - No Show', 0),
(4, 'Interview Scheduled', 0),
(5, 'Joined', 0),
(6, 'Left', 0),
(7, 'Offered', 0),
(8, 'Offered - Accepted', 0),
(9, 'On Hold', 0),
(10, 'Referral - Submission', 0),
(11, 'Rejected', 0),
(12, 'Rejected By Candidate', 0),
(13, 'Request for Interview Scheduled', 0),
(14, 'Selected', 0),
(15, 'Shortlisted', 0),
(16, 'Sourced', 0),
(17, 'Submitted', 0),
(18, 'Supplier - Submission', 1),
(19, 'Schedule a Call', 1),
(20, 'Called - Spoke', 1),
(21, 'Called - No answer', 1),
(22, 'Called - Incorrect number', 1),
(23, 'Called - Switched off', 1),
(24, 'Called - Not reachable', 1),
(25, 'Called - Number does not exist', 1),
(26, 'Called - Requested call back ', 1),
(27, 'Could not call', 1);

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

DROP TABLE IF EXISTS `captcha`;
CREATE TABLE `captcha` (
  `captcha_id` bigint(13) UNSIGNED NOT NULL,
  `captcha_time` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(1, 1491258165, '::1', 'oPoib');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `url` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_hot` int(1) DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `no_of_employee` int(6) NOT NULL,
  `industrie_id` int(4) NOT NULL,
  `client_logo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `about_company` text COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `google_plus` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `skills` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `default_company` tinyint(4) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `name`, `url`, `is_hot`, `notes`, `no_of_employee`, `industrie_id`, `client_logo`, `about_company`, `facebook`, `linkedin`, `google_plus`, `skills`, `default_company`, `is_active`, `created_by`, `created_on`, `updated_by`, `updated_on`, `deleted`) VALUES
(1, 'YouMeWebs', 'http://cognizapt.com/', 1, 'Test', 5, 4, '1493656303_index.png', 'tew dsa', 'http://facebook.com', 'http://www.linked.com', 'http://googe1.com', '0', 1, 0, 1, '2017-05-01 17:32:31', 1, '2017-05-01 18:32:35', 0),
(2, 'Investis Pvt Ltd', 'www.investis.com', 1, 'IT company in baroda', 450, 5, '1493660839_.png', 'Big IT in baroda Big IT in baroda', 'http://facebook.com/investis', 'http://www.linked.com/invesits', 'http://googe.com/invesits', 'PHP,Jquery', 1, 1, 1, '2017-05-01 18:47:19', 1, '2017-05-03 20:43:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email_work` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_work` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address1` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `is_hot` tinyint(1) DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `enter_by` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `left_company` tinyint(1) NOT NULL DEFAULT '0',
  `report_to` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `ip_address` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `client_id`, `first_name`, `last_name`, `title`, `email_work`, `email`, `phone_work`, `phone`, `address`, `address1`, `city`, `state`, `zip`, `country`, `is_hot`, `notes`, `enter_by`, `owner`, `left_company`, `report_to`, `is_active`, `ip_address`, `created_by`, `created_on`, `updated_by`, `updated_on`, `deleted`) VALUES
(1, 2, 'Parthiv', 'Shah', 'Web Producter', 'parthiv@investis.com', '2585shah@gmail.com', '0265124578', '7383119597', 'P-16 Rajeswer gold viwe ', 'harni road , baroda', 'Baroda', 'Gujrat', '390019', 'India', 1, 'Data enter by parthiv1', 1, 2, 2, 1, 1, '::1', 1, '2017-05-02 15:29:22', 1, 2017, 0),
(2, 1, 'Swara1', 'Shah1', 'Swara En1.', 'swara1@youmewebs.com', 'swara2@gmail.com', '0265514789', '8140342881', 'Baroda1', 'Gujarat2', 'Baroda3', 'Gujarat4', '3900194', 'India5', 1, 'Swara software 6', 1, 1, 2, 1, 1, '::1', 1, '2017-05-02 15:44:45', 1, 2017, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_item_type`
--

DROP TABLE IF EXISTS `data_item_type`;
CREATE TABLE `data_item_type` (
  `data_item_type_id` int(11) NOT NULL DEFAULT '0',
  `short_description` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `data_item_type`
--

INSERT INTO `data_item_type` (`data_item_type_id`, `short_description`) VALUES
(100, 'Candidate'),
(200, 'Company'),
(300, 'Contact'),
(400, 'Job Order');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
CREATE TABLE `emails` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(256) NOT NULL,
  `title` varchar(128) NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL,
  `read` datetime DEFAULT NULL,
  `read_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `name`, `email`, `title`, `message`, `created`, `read`, `read_by`) VALUES
(1, 'John Doe', 'john@doe.com', 'Test Message', 'This is only a test message. Notice that once you\'ve read it, the button changes from blue to grey, indicating that it has been reviewed.', '2013-01-01 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

DROP TABLE IF EXISTS `industries`;
CREATE TABLE `industries` (
  `industrie_id` int(4) NOT NULL,
  `title` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`industrie_id`, `title`) VALUES
(1, 'Business services'),
(2, 'Information technology'),
(3, 'Manufacturing'),
(4, 'Health care'),
(5, 'Finance'),
(6, 'Retail'),
(7, 'Accounting and legal'),
(8, 'Construction, repair and maintenance'),
(9, 'Media'),
(10, 'Restaurants, bars and food services');

-- --------------------------------------------------------

--
-- Table structure for table `joborder`
--

DROP TABLE IF EXISTS `joborder`;
CREATE TABLE `joborder` (
  `joborder_id` int(11) NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `client_id` int(11) DEFAULT NULL,
  `city` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `state` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `recruiter` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `duration` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate_max` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_rate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `openings` int(11) DEFAULT NULL,
  `client_job_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key_skills` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `notes` text COLLATE utf8_unicode_ci,
  `position_type` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'C',
  `visa_type` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '0',
  `is_admin_hiden` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `joborder`
--

INSERT INTO `joborder` (`joborder_id`, `title`, `client_id`, `city`, `state`, `recruiter`, `start_date`, `duration`, `rate_max`, `pay_rate`, `openings`, `client_job_id`, `key_skills`, `description`, `notes`, `position_type`, `visa_type`, `is_public`, `is_hot`, `is_active`, `is_admin_hiden`, `created_by`, `created_on`, `updated_by`, `updated_on`, `deleted`) VALUES
(5, 'PHP Developer', 1, 'Baroda', 'Gujarat', 7, '2017-05-25', '5', '50', '45', 3, 'C007', 'tesr', '\r\n\r\ndfsfs\r\n\r\n', '\r\n\r\ndfsf\r\n\r\n', 'C', 'B1', 1, 1, 0, 1, 1, '2017-05-04 20:05:45', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

DROP TABLE IF EXISTS `job_type`;
CREATE TABLE `job_type` (
  `job_type_id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`job_type_id`, `code`, `title`) VALUES
(1, 'H', 'H (Hire)'),
(2, 'C2H', 'C2H (Contract to Hire)'),
(3, 'C', 'C (Contract)'),
(4, 'FL', 'FL (Freelance)');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `ip` varchar(20) NOT NULL,
  `attempt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`ip`, `attempt`) VALUES
('::1', '2017-05-11 17:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `menu_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `new_tab` tinyint(1) NOT NULL DEFAULT '0',
  `sort_order` tinyint(3) NOT NULL,
  `css_class` varchar(250) NOT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `title`, `url`, `parent_id`, `new_tab`, `sort_order`, `css_class`, `status`) VALUES
(1, 'Dashboard', 'admin', 0, 0, 1, '', 1),
(2, 'Users', 'admin/users', 0, 0, 2, '', 1),
(3, 'Clients', 'admin/clients', 0, 0, 3, '', 1),
(4, 'Contacts', 'admin/contacts', 0, 0, 4, '', 1),
(5, 'Joborders', 'admin/joborders', 0, 0, 5, '', 1),
(6, 'Candidates', 'admin/candidates', 0, 0, 6, '', 1),
(9, 'menus', 'menus/add', 0, 0, 7, '', 1),
(10, 'Category', 'admin/categorys', 0, 0, 8, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `input_type` enum('input','textarea','radio','dropdown','timezones') CHARACTER SET latin1 NOT NULL,
  `options` text COMMENT 'Use for radio and dropdown: key|value on each line',
  `is_numeric` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'forces numeric keypad on mobile devices',
  `show_editor` enum('0','1') NOT NULL DEFAULT '0',
  `input_size` enum('large','medium','small') DEFAULT NULL,
  `translate` enum('0','1') NOT NULL DEFAULT '0',
  `help_text` varchar(256) DEFAULT NULL,
  `validation` varchar(128) NOT NULL,
  `sort_order` tinyint(3) UNSIGNED NOT NULL,
  `label` varchar(128) NOT NULL,
  `value` text COMMENT 'If translate is 1, just start with your default language',
  `last_update` datetime DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `input_type`, `options`, `is_numeric`, `show_editor`, `input_size`, `translate`, `help_text`, `validation`, `sort_order`, `label`, `value`, `last_update`, `updated_by`) VALUES
(1, 'site_name', 'input', NULL, '0', '0', 'large', '0', NULL, 'required|trim|min_length[3]|max_length[128]', 10, 'Site Name', 'MyOpenEyes', '2016-07-26 23:10:44', 1),
(2, 'per_page_limit', 'dropdown', '10|10\r\n25|25\r\n50|50\r\n75|75\r\n100|100', '1', '0', 'small', '0', NULL, 'required|trim|numeric', 50, 'Items Per Page', '10', '2016-07-26 23:10:44', 1),
(3, 'meta_keywords', 'input', NULL, '0', '0', 'large', '0', 'Comma-seperated list of site keywords', 'trim', 20, 'Meta Keywords', 'these, are, keywords', '2016-07-26 23:10:44', 1),
(4, 'meta_description', 'textarea', NULL, '0', '0', 'large', '0', 'Short description describing your site.', 'trim', 30, 'Meta Description', 'This is the site description.', '2016-07-26 23:10:44', 1),
(5, 'site_email', 'input', NULL, '0', '0', 'medium', '0', 'Email address all emails will be sent from.', 'required|trim|valid_email', 40, 'Site Email', 'youremail@yourdomain.com', '2016-07-26 23:10:44', 1),
(6, 'timezones', 'timezones', NULL, '0', '0', 'medium', '0', NULL, 'required|trim', 60, 'Timezone', 'UTC', '2016-07-26 23:10:44', 1),
(7, 'welcome_message', 'textarea', NULL, '0', '1', 'large', '1', 'Message to display on home page.', 'trim', 70, 'Welcome Message', 'a:7:{s:7:"spanish";s:4494:"<p><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAD8AAABjCAYAAAAsE9hTAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAABZgAAAWYAGbyQRvAAAACXZwQWcAAAA/AAAAYwCuLjAVAAALCUlEQVR42tXdaZBcVRUH8N90iIQlEAwJEJZSYgUUEYiBoAbZZAcBxVIQlwqogDuuuIC4b4iKWoIiUIpooYBioSggilCgRJEQFCGJoCIYWcOShcz44bwmd3r6LdP9umf8f0nS7/ad+7/n3HPP9iYDeoDTrloMz8Bm+DeeOv1lM3vxo7pCo4dzr8JqbIOBbEPGFXpCPpHy/ZiUbYDxtgE9k3y2AUO4C9thi7Em2zfyyQaswmIchfXHk/R7Sj7BYmyMYxk/6t9z8sn5vxZvw4vGywb0S/Lw1+zPT2LaWBPvN/lHsAT74F2YMNbS7yf51ViW/f0kHMTYqn8/yROWH6bgI9h6zJiPAflJyd/nCvVfZ6yk30/yEzG15bP52J+xUf9+kt8AW7Z8NgUfMEbWv5/kt9T+jM/DcfRf+v0kvxM2zVnDidi5r8z7QT6R5osxIWfYNuL6m9hP6fdL8tMy8kU4Ci+lf+rfU/IJibl4bsnwTfB2YRj//8lnGMChht/xeXiZcH/7Iv1+kN82I1UFGwjLv34f1tU78onkjsBospf76tPZ77Xkp+HVo/zOhngt1unx2npDPpHYATq7v/cReb//P/IZpojzO7GD784QRrKnql87+WSxByu/24twCDbqGfNekM8wBceLqk2n2FG5bzB+yCdSPxwv6XK6Kdi1Zd7xSz7D5sJP70bqTewinKTxTT6RztGYU9O022K9cU8+w0y8ucZ5p+qht1eLI5FJvYETsH2N65uYrvHg794y7OEVr9u5q8m7llBLvP76GonDk9ZmfJvYUD32pDb13ADvxvSayf8dy1s+2wjPY6Qm9JV8y9V2cM3E4QZR7EixDM9XQ9KzDsnPEPn3KvH6aPAQfsuwYqdkMw6lO+l3TD6R+nz1XW0pbsai9IPEwP1TlLu7OmYdkU+I74Q3qd8RGcSP8HjO84fEuT+IzqXfjdqvi3fK+m1qxl/wC0aofBNrhMU/Whc5v1GTT6R+kMi49gLfwz0FzyeJNPjuQvv6Qz7DZngvJveA+CL8gFypE8WPSaLVZT86U/1RkW8xci/qAfE1+Ka430cgIThTHDsiOdpR3F/ZvU2I7yLc2F5EhNfhIgqlPoDZyb+3x7Px53TQ0GktXzp95ESjJTAJJ+uNkXsYn8cDJeOmy+L8DJvIT3o8Q2YQWzejMvlE6ofhyB4QhwvwKwqlDi8wPBU+Ac+i7bl/Ktustg7YaCQ/A+/Rm3LSApypoEE5IbafkWFua9NDU80HhUe4PSOlX0o+k/qAcGZ26wHxR0R72t0Vxm4tc2tbUORa/0cckxHtr4XkE3Wfozee3BDOwc/IV/dE6gdgVpshRTyaIfHrGS79Kmq/nghXt6wwdrS4Fl9SrR9/akagXY1/VbsvJBZ+Md4gK6A0NyCXfIuRO7wHxO/FqbivaFAi9SPl+xbLFGOZcMzeba1/UCr5LcTVVncebZW41n5HqXVvruMt2vsla0Rbe1FaawVW4pWy7q+h03LIJ1I/Tm+M3CU4t4x4IvXj8MKcYQ/g9go/c8jajNMzaUM+IT5bZGLrNnK34+N4rGhQQnyOkHreOm7D0pKfub616j5PlnXKU/tJ2Q7V3R76GD4hQtYq6r6+8C22Khjza/lxfxNpCnyiLBQeRj6R+iF648mdK1S+qrq/RjQ35OG/sri/JI29mcTQiXt/50bOwJPV78ndgC9gVUXiO4juzCIH5nqh9m2R3OkzDdfyqdjj6Q9awtXdayb+AE7HvyqO3wAf0t6haWKViPtXlMw1QVR8UzQwt1XyO6i33MRaL+5qKqv7seJaKsIfcRWlKr+J9l0esxoMKzcdL4uQasSNOAtrKhKfgw8afkZbsQbniTNfhu1EvN+KaamEZwsDUyeWC2fm3xXHb4KPKRfATbiUfKkn532e9pmeyY3krB8jaut14oe4gkrqPiDq+geWzLkCX1Pu0hJxyV45zyY2JT8TL6+Z+N34qurWfS+8Q35zchOX46dUqtLuaHjWJ8VAk/z+ohGgLgyJO31hxfHT8VHlFZh78DklTk2i8odpk+jIsLIh7tED1OvGLsT5VFL3hnjZcK+SOVcK+7GASlKfoVibH28Ia1hnrW1QWOJ/FA1K1H1f8bJB2eZflM1bSDyR+hHi6s7D/Y2MeJ119YW4mEq++3TxitmmJeMWiJjgiYrdGNNF8qLIfixtCG+uky7JPFyoxJNLrPubxVVUhPtwingbsxCJ1I+RHwI3cUtDsWqMFktwGZXycXOFuhd5kyvwKVlKu6K67yhsSJHUl+P6huJwcbS4XJZVKcFkEbTMKBn3HXy7jHiCjUVqrOy8LcXChvCq6sCjIlwdqiD1o5W3sVwtUtoryohnUp8g/IQjKqz1WvyrodiHHg3+hFsqjNtehMxFHVVLhH9f6hYn6n6kSMCU1R8flbnGdUZvV2QTt0Um9YnZAot66Z8Qlv1mKp/zFwvnp4oWX4PfN8k/VuELZXhIpJPaGrpE3efhVSVznS+r1FYkPgtfVs1DXS7C6yea5MuqolXwN9xZMmaCiNOLpHMTPouVFQ3cFhnxXasMFjbpGqKg0aiw6CpYJGpuRdgKexY8f0Rca/8omacp9Y2zjTqo4hoXi+rQyuYHDWGousUdIpgpwizFJa/vq5CMzIiviw+LF5GqYIWwCbeytozVEN0Qj1acpB0GRV9cmTu7jfxk5FJ8HasrEG82OJc5MikuEE1Owzo0mpK/owvyTylXeUJNixa3qOjLLQHLqar34V8tiiRPtramNMTvr/p5F+SHjOyPbYe8MUuUWPeE+E74tKzcVAG3Cp/i3nYPm/f8parn2VoxoFoL+P0i8diKy8RtUYZN8RnV37dbLI7GsHPejvzCbBGdYKJilW5iiZG25RH8hFKpD4gg6ICKa1oq8oHX5RGHRmak1uBsxV2PeRiQBUclb0EtNlLCCxW4xC0e3EmqeaRLhEH8ZRFxLZP9WTQADnawAdspz8Q81FxQghuV3zTNYmWVzPIiUXEqJf40+eSKOhtXdkB+RwWeW6LSl1hrfIZkjYPtVD6R+l6yhoIS/AFvxG+qEH+afIIHRRa1SkyeYpbs1Y8S3Cpy+YSnVWZkJ4i3sMuKpteItNXNVYkPI59If4FIGz04CvIbyVzXvHOfSXcQ3xDqOaS8yLgN9ih4PiRuqvmymn9V4sPIt2zAJUIDRhPxFeXIU9wlKrZPyMnkJCq/u/wGiUHhtZ0g6+EbDfER5JMNGMS3skWWdT00sTP2plT6xOaeId63XaegXXye/Cak88S7Pf8ZOH30xNuSTzZgNb4iUstV3Nd1hfoV9uBnG7BGhKK/ke+tTRZ9tu2InyP6/R/shHQh+ZYNOEu8TlLFA9xbtLQU3vnZBjwpHKu8guPmRpaWB0VS8xQ83A1xKpSokt7bffFF5a913IRX4N5Of8txdub3FKmxtAfwQpGk7EriTZR6TMnvr71KpKAulNPumWE3mTfW5XvvWxkeAl+J99dFvBL55gZkm3Cn6Il7n/yqzICwwAfS1Yv/05L1LRJn/N5OJ+uYfLoJwvqfJVLFP5akhRJMFRnY54x2A5Jrrmk4l4tujdvozKrXQj7ZgCFr3ckThefWGhPMFrF3p0WR5touljUj1EmcLmvyiUS3Fu3g8w1PITevtI9gRVUDmEn/PeJ4HYIFdRPvmnzLJgwIH/9Y4Y83G/9WCG/xTCUdWS3k9xYp6TOwZtySb7MJzxI24Sjh+a3CW8VNUVq3T2pvDazuBfHaybdsApF62kdowubCRtw5Xv6Xg/8BZXrc12H898kAAAAldEVYdGRhdGU6Y3JlYXRlADIwMTMtMDgtMTNUMDA6MTM6NDktMDc6MDCUK2T1AAAAJXRFWHRkYXRlOm1vZGlmeQAyMDEzLTA4LTEzVDAwOjEzOjQ5LTA3OjAw5XbcSQAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAAUdEVYdFRpdGxlAEdhcyBGbGFtZSBMb2dvWz7WuwAAAABJRU5ErkJggg==" data-filename="ci3-fire-starter.png" style="line-height: 1.42857; width: 63px; float: left;"></p><p>Este contenido se genera <em style="color: rgb(41, 82, 24); background-color: rgb(255, 239, 198);">dinámicamente</em>. <strong>Este texto es editable en la configuración de administrador.</strong></p><p></p>";s:7:"russian";s:4570:"<p><img src="data:image/png;base64,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" data-filename="ci3-fire-starter.png" style="line-height: 1.42857; width: 63px; float: left;"></p><p>Это содержание генерируется <em style="color: rgb(41, 82, 24); background-color: rgb(255, 239, 198);">динамически</em>. <strong>Этот текст можно изменить в настройках администратора.</strong></p><p></p>";s:10:"indonesian";s:4476:"<p><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAD8AAABjCAYAAAAsE9hTAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAABZgAAAWYAGbyQRvAAAACXZwQWcAAAA/AAAAYwCuLjAVAAALCUlEQVR42tXdaZBcVRUH8N90iIQlEAwJEJZSYgUUEYiBoAbZZAcBxVIQlwqogDuuuIC4b4iKWoIiUIpooYBioSggilCgRJEQFCGJoCIYWcOShcz44bwmd3r6LdP9umf8f0nS7/ad+7/n3HPP9iYDeoDTrloMz8Bm+DeeOv1lM3vxo7pCo4dzr8JqbIOBbEPGFXpCPpHy/ZiUbYDxtgE9k3y2AUO4C9thi7Em2zfyyQaswmIchfXHk/R7Sj7BYmyMYxk/6t9z8sn5vxZvw4vGywb0S/Lw1+zPT2LaWBPvN/lHsAT74F2YMNbS7yf51ViW/f0kHMTYqn8/yROWH6bgI9h6zJiPAflJyd/nCvVfZ6yk30/yEzG15bP52J+xUf9+kt8AW7Z8NgUfMEbWv5/kt9T+jM/DcfRf+v0kvxM2zVnDidi5r8z7QT6R5osxIWfYNuL6m9hP6fdL8tMy8kU4Ci+lf+rfU/IJibl4bsnwTfB2YRj//8lnGMChht/xeXiZcH/7Iv1+kN82I1UFGwjLv34f1tU78onkjsBospf76tPZ77Xkp+HVo/zOhngt1unx2npDPpHYATq7v/cReb//P/IZpojzO7GD784QRrKnql87+WSxByu/24twCDbqGfNekM8wBceLqk2n2FG5bzB+yCdSPxwv6XK6Kdi1Zd7xSz7D5sJP70bqTewinKTxTT6RztGYU9O022K9cU8+w0y8ucZ5p+qht1eLI5FJvYETsH2N65uYrvHg794y7OEVr9u5q8m7llBLvP76GonDk9ZmfJvYUD32pDb13ADvxvSayf8dy1s+2wjPY6Qm9JV8y9V2cM3E4QZR7EixDM9XQ9KzDsnPEPn3KvH6aPAQfsuwYqdkMw6lO+l3TD6R+nz1XW0pbsai9IPEwP1TlLu7OmYdkU+I74Q3qd8RGcSP8HjO84fEuT+IzqXfjdqvi3fK+m1qxl/wC0aofBNrhMU/Whc5v1GTT6R+kMi49gLfwz0FzyeJNPjuQvv6Qz7DZngvJveA+CL8gFypE8WPSaLVZT86U/1RkW8xci/qAfE1+Ka430cgIThTHDsiOdpR3F/ZvU2I7yLc2F5EhNfhIgqlPoDZyb+3x7Px53TQ0GktXzp95ESjJTAJJ+uNkXsYn8cDJeOmy+L8DJvIT3o8Q2YQWzejMvlE6ofhyB4QhwvwKwqlDi8wPBU+Ac+i7bl/Ktustg7YaCQ/A+/Rm3LSApypoEE5IbafkWFua9NDU80HhUe4PSOlX0o+k/qAcGZ26wHxR0R72t0Vxm4tc2tbUORa/0cckxHtr4XkE3Wfozee3BDOwc/IV/dE6gdgVpshRTyaIfHrGS79Kmq/nghXt6wwdrS4Fl9SrR9/akagXY1/VbsvJBZ+Md4gK6A0NyCXfIuRO7wHxO/FqbivaFAi9SPl+xbLFGOZcMzeba1/UCr5LcTVVncebZW41n5HqXVvruMt2vsla0Rbe1FaawVW4pWy7q+h03LIJ1I/Tm+M3CU4t4x4IvXj8MKcYQ/g9go/c8jajNMzaUM+IT5bZGLrNnK34+N4rGhQQnyOkHreOm7D0pKfub616j5PlnXKU/tJ2Q7V3R76GD4hQtYq6r6+8C22Khjza/lxfxNpCnyiLBQeRj6R+iF648mdK1S+qrq/RjQ35OG/sri/JI29mcTQiXt/50bOwJPV78ndgC9gVUXiO4juzCIH5nqh9m2R3OkzDdfyqdjj6Q9awtXdayb+AE7HvyqO3wAf0t6haWKViPtXlMw1QVR8UzQwt1XyO6i33MRaL+5qKqv7seJaKsIfcRWlKr+J9l0esxoMKzcdL4uQasSNOAtrKhKfgw8afkZbsQbniTNfhu1EvN+KaamEZwsDUyeWC2fm3xXHb4KPKRfATbiUfKkn532e9pmeyY3krB8jaut14oe4gkrqPiDq+geWzLkCX1Pu0hJxyV45zyY2JT8TL6+Z+N34qurWfS+8Q35zchOX46dUqtLuaHjWJ8VAk/z+ohGgLgyJO31hxfHT8VHlFZh78DklTk2i8odpk+jIsLIh7tED1OvGLsT5VFL3hnjZcK+SOVcK+7GASlKfoVibH28Ia1hnrW1QWOJ/FA1K1H1f8bJB2eZflM1bSDyR+hHi6s7D/Y2MeJ119YW4mEq++3TxitmmJeMWiJjgiYrdGNNF8qLIfixtCG+uky7JPFyoxJNLrPubxVVUhPtwingbsxCJ1I+RHwI3cUtDsWqMFktwGZXycXOFuhd5kyvwKVlKu6K67yhsSJHUl+P6huJwcbS4XJZVKcFkEbTMKBn3HXy7jHiCjUVqrOy8LcXChvCq6sCjIlwdqiD1o5W3sVwtUtoryohnUp8g/IQjKqz1WvyrodiHHg3+hFsqjNtehMxFHVVLhH9f6hYn6n6kSMCU1R8flbnGdUZvV2QTt0Um9YnZAot66Z8Qlv1mKp/zFwvnp4oWX4PfN8k/VuELZXhIpJPaGrpE3efhVSVznS+r1FYkPgtfVs1DXS7C6yea5MuqolXwN9xZMmaCiNOLpHMTPouVFQ3cFhnxXasMFjbpGqKg0aiw6CpYJGpuRdgKexY8f0Rca/8omacp9Y2zjTqo4hoXi+rQyuYHDWGousUdIpgpwizFJa/vq5CMzIiviw+LF5GqYIWwCbeytozVEN0Qj1acpB0GRV9cmTu7jfxk5FJ8HasrEG82OJc5MikuEE1Owzo0mpK/owvyTylXeUJNixa3qOjLLQHLqar34V8tiiRPtramNMTvr/p5F+SHjOyPbYe8MUuUWPeE+E74tKzcVAG3Cp/i3nYPm/f8parn2VoxoFoL+P0i8diKy8RtUYZN8RnV37dbLI7GsHPejvzCbBGdYKJilW5iiZG25RH8hFKpD4gg6ICKa1oq8oHX5RGHRmak1uBsxV2PeRiQBUclb0EtNlLCCxW4xC0e3EmqeaRLhEH8ZRFxLZP9WTQADnawAdspz8Q81FxQghuV3zTNYmWVzPIiUXEqJf40+eSKOhtXdkB+RwWeW6LSl1hrfIZkjYPtVD6R+l6yhoIS/AFvxG+qEH+afIIHRRa1SkyeYpbs1Y8S3Cpy+YSnVWZkJ4i3sMuKpteItNXNVYkPI59If4FIGz04CvIbyVzXvHOfSXcQ3xDqOaS8yLgN9ih4PiRuqvmymn9V4sPIt2zAJUIDRhPxFeXIU9wlKrZPyMnkJCq/u/wGiUHhtZ0g6+EbDfER5JMNGMS3skWWdT00sTP2plT6xOaeId63XaegXXye/Cak88S7Pf8ZOH30xNuSTzZgNb4iUstV3Nd1hfoV9uBnG7BGhKK/ke+tTRZ9tu2InyP6/R/shHQh+ZYNOEu8TlLFA9xbtLQU3vnZBjwpHKu8guPmRpaWB0VS8xQ83A1xKpSokt7bffFF5a913IRX4N5Of8txdub3FKmxtAfwQpGk7EriTZR6TMnvr71KpKAulNPumWE3mTfW5XvvWxkeAl+J99dFvBL55gZkm3Cn6Il7n/yqzICwwAfS1Yv/05L1LRJn/N5OJ+uYfLoJwvqfJVLFP5akhRJMFRnY54x2A5Jrrmk4l4tujdvozKrXQj7ZgCFr3ckThefWGhPMFrF3p0WR5touljUj1EmcLmvyiUS3Fu3g8w1PITevtI9gRVUDmEn/PeJ4HYIFdRPvmnzLJgwIH/9Y4Y83G/9WCG/xTCUdWS3k9xYp6TOwZtySb7MJzxI24Sjh+a3CW8VNUVq3T2pvDazuBfHaybdsApF62kdowubCRtw5Xv6Xg/8BZXrc12H898kAAAAldEVYdGRhdGU6Y3JlYXRlADIwMTMtMDgtMTNUMDA6MTM6NDktMDc6MDCUK2T1AAAAJXRFWHRkYXRlOm1vZGlmeQAyMDEzLTA4LTEzVDAwOjEzOjQ5LTA3OjAw5XbcSQAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAAUdEVYdFRpdGxlAEdhcyBGbGFtZSBMb2dvWz7WuwAAAABJRU5ErkJggg==" data-filename="ci3-fire-starter.png" style="line-height: 1.42857; width: 63px; float: left;"></p><p>Konten ini sedang dihasilkan secara <em style="color: rgb(41, 82, 24); background-color: rgb(255, 239, 198);">dinamis</em>. <strong>Teks ini diedit dalam pengaturan admin.</strong></p><p></p>";s:18:"simplified-chinese";s:4376:"<p><img src="data:image/png;base64,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" data-filename="ci3-fire-starter.png" style="line-height: 1.42857; width: 63px; float: left;"></p><p>正在动态生成此内容. <strong>该文本可编辑在管理设置.</strong></p><p></p>";s:7:"english";s:4483:"<p><img src="data:image/png;base64,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" data-filename="ci3-fire-starter.png" style="line-height: 1.42857; width: 63px; float: left;"></p><p>This content is being generated <em style="color: rgb(41, 82, 24); background-color: rgb(255, 239, 198);">dynamically</em>. <strong>This text is editable in the admin settings.</strong></p>\r\n<p></p>";s:5:"dutch";s:4489:"<p><img src="data:image/png;base64,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" data-filename="ci3-fire-starter.png" style="line-height: 1.42857; width: 63px; float: left;"></p><p>Deze inhoud wordt <em style="color: rgb(41, 82, 24); background-color: rgb(255, 239, 198);">dynamisch</em> gegenereerd. <strong>Deze tekst kan worden bewerkt in de admin -instellingen.</strong></p><p></p>";s:7:"turkish";s:4489:"<p><img src="data:image/png;base64,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" data-filename="ci3-fire-starter.png" style="line-height: 1.42857; width: 63px; float: left;"></p><p>Bu içerik <em style="color: rgb(41, 82, 24); background-color: rgb(255, 239, 198);">dinamik</em> olarak oluşturulan ediliyor. <strong>Bu metin yönetici ayarlarında düzenlenebilir.</strong></p><p></p>";}', '2016-07-26 23:10:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE `skills` (
  `skill_id` int(4) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `name`) VALUES
(1, 'Computer Literate'),
(2, 'Plan, Organize'),
(3, 'Observe'),
(4, 'Maintain Records'),
(5, 'Teach, Train'),
(6, 'Interview For Information'),
(7, 'Customer Service'),
(8, 'Adapt To Change'),
(9, 'Work With Numbers'),
(10, 'Conceptualize');

-- --------------------------------------------------------

--
-- Table structure for table `subcategorys`
--

DROP TABLE IF EXISTS `subcategorys`;
CREATE TABLE `subcategorys` (
  `subcategory_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategorys`
--

INSERT INTO `subcategorys` (`subcategory_id`, `category_id`, `name`, `status`, `created`, `updated`, `deleted`) VALUES
(1, 1, 'Food1', 0, '2017-05-11 00:00:00', '2017-05-11 00:00:00', 0),
(2, 1, 'Food2', 0, '2017-05-11 00:00:00', '2017-05-11 00:00:00', 0),
(3, 2, 'Cakes 1', 1, '2017-05-11 00:00:00', '2017-05-11 00:00:00', 0),
(4, 3, 'Flowers 1', 0, '2017-05-10 22:16:01', '2017-05-10 22:17:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `phone_no_work` varchar(20) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `activation_code` varchar(10) DEFAULT NULL COMMENT 'Temporary code for opt-in registration',
  `registration_date` datetime DEFAULT NULL,
  `ip_address` varchar(16) NOT NULL,
  `note` text NOT NULL,
  `user_type_id` int(2) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `access_level_id` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `validation_code` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `client_id`, `username`, `first_name`, `last_name`, `email_id`, `phone_no_work`, `phone_no`, `mobile_no`, `password`, `salt`, `activation_code`, `registration_date`, `ip_address`, `note`, `user_type_id`, `is_admin`, `created_by`, `created_on`, `updated_by`, `updated_on`, `is_active`, `access_level_id`, `deleted`, `validation_code`) VALUES
(1, 2, 'admin', 'Site', 'Administrator', 'admin@admin.com', '', '', '7383119597', 'ce516f215aa468c376736c9013e8b663f7b3c06226a87739bc6b32882f9278349a721ea725a156eecf9e3c1868904a77e4d42c783e0287a0909a8bbb97e1525f', '66cb0ab1d9efe250b46e28ecb45eb33b3609f1efda37547409a113a2b84c3f94b6a0e738acc391e2dfa718676aa55adead05fcb12d2e32aee379e190511a3252', '', '0000-00-00 00:00:00', '::1', '', 1, 1, 0, '2017-04-28 00:00:00', 1, '2017-05-08 16:15:18', 1, 1, 0, NULL),
(6, 0, 'parthiv', 'parthiv', 'shah', '2585shah@gmail.com', '', '', '', '5520a67bb5ccdf7af93f0911fd1d511dd285e30a0190447bc471300e43c74e0059effab9b6a1fd67923fca8356c132952f03f9c33e5b4c68067f18809ec7d761', '1638e895f6bb3cdfb0d3be1a3cc0deac99fa8d139733d04e07d562f00ea8d08f788232c936ffafa381c7e51cd693304f557a30fe7baaee110cff970227c23e29', NULL, NULL, '', '', 0, 1, 0, '2017-04-28 00:00:00', 0, '2017-04-28 00:00:00', 1, 3, 0, NULL),
(7, 0, 'ujval', 'ujval', 'shah', 'ujval@gmail.com', '', '', '', '1917a22b51851ab9a6ea213579ebd6a31698c951ef4d34a1a85c1aa3648adfebc1cf3b9bb2dd432ffe9242cdb5919b766a050d38e510bd5415f24b60f9937fce', 'a2d126149fcdf6bd5c919c1fa30d2e4b4f1edc6ad0668956f7f6fc7d92a9ebd07f4ceb4f8fd5adc55b5a61d8e49b675f6f9cbee79e6454c646f473c53614de9c', NULL, NULL, '', '', 0, 1, 0, '2017-04-28 00:00:00', 0, '2017-04-28 00:00:00', 1, 4, 0, NULL),
(8, 0, 'puja shah', 'puja', 'shah', 'puja@gmail.com', '', '', '', '52da53634e8fa4207a40126d196dfb3a16c8222c4ed171b346665bbee38fe3e63d49e3ae06ef003a0805d0c55e840e98c0cd4320d2eb0289e0be3a1c49a14877', '73ea87a48214f6e809c03ddb54942107db46d06b802d580e6f70f413896494048f7fc4d6fb073cb40f3e321c003e7efa08be71240db51f2ace97d188eb81f806', NULL, NULL, '', '', 0, 1, 0, '2017-04-28 00:00:00', 0, '2017-04-28 00:00:00', 1, 2, 0, NULL),
(9, 1, 'raj shah', 'Raj', 'Shah', 'raj@gmail.com', '123456789', '22254555', '7895555555', 'bcf503ed753447ea5d6d0a3148e49952cfe305951f730565fc0b6616bbea891024816a2d7bdb066ac258f9985a297994c537923b83ad5e60c106aea8686214c3', 'e271c8ab7e0dfb40f53a09c783bf0da9f53f8a99083bd43c593271b3abf15e1bebafa57c02762bacfc8ffa4a73a2b2407441e7d5cff19d698edd60f8ff524d3e', '1222', '2017-05-18 00:00:00', '::1', 'fdsfdslf', 1, 1, 0, '2017-04-28 00:00:00', 1, '2017-04-28 23:02:01', 1, 4, 0, NULL),
(13, 4, 'test', 'test1', 'test1', 'test@gmail.com', '12345678911', '123456789011', '1234569870', '9f4ae4a8f1e1481c45118e9205f40ca9d8cc921ad0a21b99aba99c60044aa385fb3cacb66d7da29bdf0bfde38505bdd2a4fcc5704437ee90390f039038d2eb49', '2190a7f141ea8457e02e9610f59c304c1ae3be506e9b1228090a4b0c7fc42ad3c52230946d69032355ecdab7713d45a96a83ede729828f6a754efe102bc6217f', '123456', '2017-04-29 00:00:00', '::1', 'ztest 34efdsfsd', 2, 0, 1, '2017-04-28 22:25:55', 1, '2017-04-28 23:00:34', 0, 2, 0, NULL),
(14, 2, 'register1', 'register1', 'register1', 'register1@gmail.com', '', '', '1234567890', 'f89fa2ccb82ed20cd42fe933fb7b688dca3428611bc29520857c99d0609df58765b1559f08f8537b5144bf4205073301a465da287b83fd6479b785bcc248efc5', '075eb7e95400683a63636966c52a11333dab2b9d5f6b7bf903caa1b6c8c78ca8f3c7201f497fabf4a91e7e8c3932bdd0f6e626805b2ef8a77640cb850da85710', NULL, NULL, '::1', '', 1, 1, 0, '2017-05-03 16:25:12', 0, NULL, 1, 2, 0, NULL),
(15, 1, 'register2', 'register2', 'register2', 'register2@gmail.com', '', '', '1234567890', 'd0031a3723cde6fc3a8d5286d9cebf27c75feb39494fc3566475b0a0b5f909cf863b505512b2a8495ca8085c7b9b1c974f7fe020582fb0d4dd2ff18bce63e5ff', '677bd8af5e7e0eb6de55e978efd35196350945bd507fd248c2e71a1c410638d02a71cd054ec5dd13037d1e0b7e2584025b2b494c7f132e39b1c42392711e85ed', NULL, NULL, '::1', '', 1, 1, 0, '2017-05-03 16:31:04', 0, NULL, 1, 2, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

DROP TABLE IF EXISTS `user_access`;
CREATE TABLE `user_access` (
  `user_access_id` int(11) NOT NULL,
  `access_level_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`user_access_id`, `access_level_id`, `created`) VALUES
(1, 1, '2017-05-08 17:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_permission`
--

DROP TABLE IF EXISTS `user_access_permission`;
CREATE TABLE `user_access_permission` (
  `user_access_permission_id` int(11) NOT NULL,
  `user_access_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `u_view` tinyint(1) NOT NULL,
  `u_add` tinyint(1) NOT NULL,
  `u_edit` tinyint(1) NOT NULL,
  `u_delete` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_permission`
--

INSERT INTO `user_access_permission` (`user_access_permission_id`, `user_access_id`, `menu_id`, `u_view`, `u_add`, `u_edit`, `u_delete`) VALUES
(14, 1, 9, 1, 1, 1, 1),
(13, 1, 6, 1, 1, 1, 1),
(12, 1, 5, 1, 1, 1, 1),
(11, 1, 4, 1, 1, 1, 1),
(10, 1, 3, 1, 1, 1, 1),
(9, 1, 2, 1, 1, 1, 1),
(8, 1, 1, 1, 1, 1, 1),
(15, 1, 10, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
CREATE TABLE `user_type` (
  `user_type_id` int(2) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `title`) VALUES
(1, 'Candidate'),
(2, 'Company'),
(3, 'Contract'),
(4, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_level`
--
ALTER TABLE `access_level`
  ADD PRIMARY KEY (`access_level_id`);

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`attachment_id`),
  ADD KEY `IDX_type_id` (`data_item_type`,`data_item_id`),
  ADD KEY `IDX_data_item_id` (`data_item_id`),
  ADD KEY `IDX_site_file_size_created` (`created_on`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`candidate_id`),
  ADD KEY `IDX_first_name` (`first_name`),
  ADD KEY `IDX_last_name` (`last_name`),
  ADD KEY `IDX_phone_home` (`phone_home`),
  ADD KEY `IDX_phone_cell` (`phone_cell`),
  ADD KEY `IDX_phone_work` (`phone_work`),
  ADD KEY `IDX_key_skills` (`key_skills`(255)),
  ADD KEY `IDX_entered_by` (`entered_by`),
  ADD KEY `IDX_owner` (`owner`),
  ADD KEY `IDX_date_created` (`date_created`),
  ADD KEY `IDX_date_modified` (`date_modified`),
  ADD KEY `IDX_site_first_last_modified` (`site_id`,`first_name`,`last_name`,`date_modified`),
  ADD KEY `IDX_site_id_email_1_2` (`site_id`,`email1`(8),`email2`(8));

--
-- Indexes for table `candidate_assign`
--
ALTER TABLE `candidate_assign`
  ADD PRIMARY KEY (`candidate_assign_id`);

--
-- Indexes for table `candidate_notes`
--
ALTER TABLE `candidate_notes`
  ADD PRIMARY KEY (`candidate_note_id`);

--
-- Indexes for table `candidate_status`
--
ALTER TABLE `candidate_status`
  ADD PRIMARY KEY (`candidate_status_id`);

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`),
  ADD KEY `word` (`word`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `IDX_name` (`name`),
  ADD KEY `IDX_is_hot` (`is_hot`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `IDX_name` (`first_name`),
  ADD KEY `IDX_is_hot` (`is_hot`);

--
-- Indexes for table `data_item_type`
--
ALTER TABLE `data_item_type`
  ADD PRIMARY KEY (`data_item_type_id`),
  ADD KEY `IDX_short_description` (`short_description`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `title` (`title`),
  ADD KEY `created` (`created`),
  ADD KEY `read` (`read`),
  ADD KEY `read_by` (`read_by`),
  ADD KEY `email` (`email`(78));

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`industrie_id`);

--
-- Indexes for table `joborder`
--
ALTER TABLE `joborder`
  ADD PRIMARY KEY (`joborder_id`),
  ADD KEY `IDX_recruiter` (`recruiter`),
  ADD KEY `IDX_title` (`title`),
  ADD KEY `IDX_client_id` (`client_id`),
  ADD KEY `IDX_start_date` (`start_date`),
  ADD KEY `IDX_is_hot` (`is_hot`),
  ADD KEY `IDX_jopenings` (`openings`),
  ADD KEY `IDX_site_id_status` (`is_active`);

--
-- Indexes for table `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`job_type_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD KEY `ip` (`ip`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `subcategorys`
--
ALTER TABLE `subcategorys`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`user_access_id`);

--
-- Indexes for table `user_access_permission`
--
ALTER TABLE `user_access_permission`
  ADD PRIMARY KEY (`user_access_permission_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_level`
--
ALTER TABLE `access_level`
  MODIFY `access_level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `attachment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `candidate_assign`
--
ALTER TABLE `candidate_assign`
  MODIFY `candidate_assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `candidate_notes`
--
ALTER TABLE `candidate_notes`
  MODIFY `candidate_note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `candidate_status`
--
ALTER TABLE `candidate_status`
  MODIFY `candidate_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` bigint(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `industrie_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `joborder`
--
ALTER TABLE `joborder`
  MODIFY `joborder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `job_type`
--
ALTER TABLE `job_type`
  MODIFY `job_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `subcategorys`
--
ALTER TABLE `subcategorys`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `user_access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_access_permission`
--
ALTER TABLE `user_access_permission`
  MODIFY `user_access_permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
