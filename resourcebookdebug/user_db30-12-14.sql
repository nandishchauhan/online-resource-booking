-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2014 at 11:14 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

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
  `sub_id` int(11) NOT NULL,
  `Remarks` varchar(250) DEFAULT NULL,
  `User` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

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
(2, 'Smart Board Room', 1, '1');

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
-- Table structure for table `subject_data`
--

CREATE TABLE IF NOT EXISTS `subject_data` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_short` varchar(10) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `b_id` int(11) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `subject_data`
--

INSERT INTO `subject_data` (`sub_id`, `sub_short`, `sub_name`, `b_id`) VALUES
(1, 'WAD', 'Web Application Development', 1),
(2, 'WTP', 'Web Technology And Programming', 1),
(3, 'CO', 'COMPUTER ORGANIZATION', 1),
(4, 'ACN', 'ADVANCED COMPUTER NETWORK', 1),
(5, 'DP-II', 'DISSERTATION PHASE 2', 1),
(6, 'GATE', 'GATE', 1),
(7, 'PROJECT-II', 'PROJECT-II', 1),
(8, 'CN', 'COMPUTER NETWORKS', 1),
(9, 'DS', 'DISTRIBUTED SYSTEMS', 1),
(10, 'DE-1B', 'DESIGN ENGINEERING - 1B', 1),
(11, 'OOPC++', 'OBJECT ORIENTED PROGRAMMING IN C++', 1),
(12, 'IS', 'INFORMATION SECURITY', 1),
(13, 'CG', 'COMPUTER GRAPHICS', 1),
(14, 'NSM', 'NUMERICAL STATISTICAL METHODS', 1),
(15, 'DC', 'DATA COMPRESSION', 1),
(16, 'SPM', 'SOFTWARE PROJECT MANAGEMENT', 1),
(17, 'R&D', 'RESEARCH AND DEVELOPMENT', 1),
(18, 'TOC', 'THEORY OF COMPUTATION', 1),
(19, 'DAA', 'DESIGN AND ANALYSIS OF ALGORITHM', 1),
(20, 'PP', 'PARALLEL PROCESSING', 1),
(21, 'OS', 'OPERATING SYSTEMS', 1),
(22, 'SOA', 'SERVICE ORIENTED ARCHITECTURE', 1),
(23, 'MSOR', 'MODELLING SIMULATION OPERATIONS AND RESEARCH', 1),
(24, 'CPU', 'COMPUTER PROGRAMMING AND UTILIZATION', 3),
(25, 'CPU', 'COMPUTER PROGRAMMING AND UTILIZATION', 4),
(26, 'CPU', 'COMPUTER PROGRAMMING AND UTILIZATION', 5),
(27, 'SE', 'SOFTWARE ENGINEERING', 1),
(28, 'DCA', 'DCA', 1),
(29, 'DDAS', 'DISTRIBUTED DATABASE APPLICATION SYSTEM', 1),
(30, 'DWDM', 'DATA WAREHOUSING AND DATA MINING', 1);

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
(2, 1, 'nkc@123', 'nandish.chauhan@saffrony.ac.in'),
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
