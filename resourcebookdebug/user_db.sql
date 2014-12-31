-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2014 at 02:53 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_info`
--

CREATE TABLE IF NOT EXISTS `booking_info` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `s_id` varchar(10) NOT NULL,
  `b_id` int(10) NOT NULL,
  `slot_no` int(10) NOT NULL,
  `r_id` int(10) NOT NULL,
  `Remarks` varchar(250) NOT NULL,
  `User` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `booking_info`
--

INSERT INTO `booking_info` (`id`, `date`, `s_id`, `b_id`, `slot_no`, `r_id`, `Remarks`, `User`) VALUES
(43, '2014-12-25', '1', 1, 1, 1, 'lecture in 6th cs', 'nandish.chauhan@saffrony.ac.in'),
(44, '2014-12-25', '3', 1, 3, 1, 'lecture', 'nandish.chauhan@saffrony.ac.in'),
(45, '2014-12-25', '1', 1, 3, 1, 'expert', 'akshay.kansara@saffrony.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `branch_data`
--

CREATE TABLE IF NOT EXISTS `branch_data` (
  `b_id` int(10) NOT NULL AUTO_INCREMENT,
  `b_name` varchar(100) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `branch_data`
--

INSERT INTO `branch_data` (`b_id`, `b_name`) VALUES
(1, 'CSIT'),
(2, 'EC/ELE'),
(3, 'Mech'),
(4, 'Civil'),
(5, 'Auto'),
(6, 'General');

-- --------------------------------------------------------

--
-- Table structure for table `resource_data`
--

CREATE TABLE IF NOT EXISTS `resource_data` (
  `r_id` int(10) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(100) NOT NULL,
  `r_quantity` int(250) NOT NULL,
  `b_id` varchar(250) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `resource_data`
--

INSERT INTO `resource_data` (`r_id`, `r_name`, `r_quantity`, `b_id`) VALUES
(1, 'Projector', 2, '1'),
(2, 'Smart Board Room', 1, '1'),
(4, 'Projector', 2, '4');

-- --------------------------------------------------------

--
-- Table structure for table `semester_data`
--

CREATE TABLE IF NOT EXISTS `semester_data` (
  `s_id` int(10) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(100) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `semester_data`
--

INSERT INTO `semester_data` (`s_id`, `s_name`) VALUES
(1, 'I'),
(2, 'II'),
(3, 'III'),
(4, 'IV'),
(5, 'V'),
(6, 'VI'),
(7, 'VII'),
(8, 'VIII');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `b_id` int(100) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `b_id`, `user_pass`, `user_email`) VALUES
(1, 1, 'test123', 'akshay.kansara@saffrony.ac.in'),
(2, 1, 'test123', 'nandish.chauhan@saffrony.ac.in'),
(3, 1, 'test123', 'parimal.patel@saffrony.ac.in'),
(4, 1, 'test123', 'hodce@saffrony.ac.in'),
(5, 1, 'test123', 'vivek.shah@saffrony.ac.in'),
(6, 1, 'test123', 'rahul.shrimali@saffrony.ac.in'),
(7, 1, 'test123', 'aniket.patel@saffrony.ac.in'),
(8, 1, 'test123', 'krunal.patel@saffrony.ac.in'),
(9, 1, 'test123', 'lata.gadhavi@saffrony.ac.in'),
(10, 1, 'test123', 'tushar.patel@saffrony.ac.in'),
(11, 1, 'test123', 'neha.mistry@saffrony.ac.in'),
(12, 1, 'test123', 'poonam.patel@saffrony.ac.in'),
(13, 1, 'test123', 'viren.patel@saffrony.ac.in'),
(14, 1, 'test123', 'tejas.patel@saffrony.ac.in'),
(15, 1, 'test123', 'hiral.parmar@saffrony.ac.in'),
(16, 1, 'test123', 'prayag.patel@saffrony.ac.in'),
(17, 1, 'test123', 'komalp.patel@saffrony.ac.in'),
(18, 1, 'test123', 'hiral.rathod@saffrony.ac.in'),
(19, 1, 'test123', 'komal.patel@saffrony.ac.in');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
