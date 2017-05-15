-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2017 at 02:49 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `category_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`category_id`, `name`, `status`, `created`, `updated`, `deleted`) VALUES
(1, 'Food', 1, '2017-04-17 00:00:00', '2017-04-17 00:00:00', 0),
(2, 'Cakes', 1, '2017-04-17 00:00:00', '2017-04-17 00:00:00', 0),
(3, 'Flowers', 1, '2017-04-17 00:00:00', '2017-04-17 00:00:00', 0),
(4, 'Category', 0, '2017-04-17 18:16:43', '2017-04-17 19:28:00', 0),
(5, 'Category 1', 1, '2017-04-18 00:36:54', '2017-04-21 02:25:17', 1),
(6, 'New Category', 1, '2017-04-21 02:27:16', '0000-00-00 00:00:00', 0),
(7, 'Category 2', 1, '2017-04-21 02:27:47', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
