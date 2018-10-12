-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 20, 2018 at 05:23 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quickfeedbacks`
--

-- --------------------------------------------------------

--
-- Table structure for table `sessionafterfeedbacks`
--

DROP TABLE IF EXISTS `sessionafterfeedbacks`;
CREATE TABLE IF NOT EXISTS `sessionafterfeedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `Subject_Code` varchar(9) DEFAULT NULL,
  `Week` int(11) DEFAULT NULL,
  `question1` int(1) NOT NULL,
  `question2` int(1) NOT NULL,
  `question3` int(1) NOT NULL,
  `question4` int(1) NOT NULL,
  `OverallMarks` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessionafterfeedbacks`
--

INSERT INTO `sessionafterfeedbacks` (`id`, `email`, `Subject_Code`, `Week`, `question1`, `question2`, `question3`, `question4`, `OverallMarks`) VALUES
(1, NULL, 'INTE12112', 1, 2, 2, 2, 2, 8),
(2, NULL, 'INTE12112', 1, 0, 0, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
