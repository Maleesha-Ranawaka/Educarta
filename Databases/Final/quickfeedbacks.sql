-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 28, 2018 at 09:42 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessionafterfeedbacks`
--

INSERT INTO `sessionafterfeedbacks` (`id`, `email`, `Subject_Code`, `Week`, `question1`, `question2`, `question3`, `question4`, `OverallMarks`) VALUES
(21, NULL, 'MGTE12222', 1, 1, 1, 1, 1, 13),
(4, NULL, 'INTE31332', 1, 3, 3, 1, 3, 10),
(5, NULL, 'INTE31332', 2, 4, 4, 4, 4, 16),
(6, NULL, 'INTE31332', 9, 4, 1, 4, 4, 16),
(7, NULL, 'INTE31332', 9, 4, 2, 4, 4, 16),
(8, NULL, 'INTE31332', 1, 0, 0, 0, 0, 0),
(20, NULL, 'MGTE12222', 1, 1, 1, 1, 1, 4),
(19, NULL, 'MGTE12222', 1, 0, 1, 0, 1, 2),
(18, NULL, 'MGTE12222', 1, 2, 3, 4, 3, 12),
(17, NULL, 'MGTE12222', 1, 1, 2, 2, 1, 6),
(16, NULL, 'MGTE12222', 1, 2, 3, 4, 2, 11),
(15, NULL, 'MGTE12222', 1, 4, 3, 3, 3, 13),
(22, NULL, 'MGTE12222', 1, 2, 1, 2, 3, 13),
(23, NULL, 'MGTE12222', 1, 0, 3, 0, 4, 13),
(24, NULL, 'MGTE12222', 1, 2, 0, 1, 3, 13),
(25, NULL, 'MGTE12222', 1, 0, 2, 1, 0, 13),
(26, NULL, 'MGTE12222', 1, 3, 2, 2, 3, 13),
(27, NULL, 'MGTE12222', 1, 1, 0, 0, 0, 13),
(28, NULL, 'MGTE12222', 1, 0, 1, 1, 0, 13),
(29, NULL, 'MGTE12222', 1, 1, 1, 1, 1, 13),
(30, NULL, 'MGTE12222', 1, 0, 0, 0, 0, 13),
(31, NULL, 'MGTE12222', 1, 4, 4, 4, 4, 13),
(32, NULL, 'MGTE12222', 1, 0, 1, 2, 2, 13),
(33, NULL, 'MGTE12222', 1, 1, 3, 2, 1, 13),
(34, NULL, 'MGTE12222', 1, 2, 2, 2, 2, 13),
(35, NULL, 'MGTE12222', 1, 1, 0, 2, 1, 13),
(36, NULL, 'MGTE12222', 1, 1, 0, 0, 1, 13),
(37, NULL, 'MGTE12222', 1, 2, 1, 0, 0, 13),
(38, NULL, 'MGTE12222', 1, 1, 0, 1, 1, 13),
(39, NULL, 'MGTE12222', 1, 1, 0, 1, 1, 13),
(40, NULL, 'MGTE12222', 2, 2, 3, 2, 1, 13),
(41, NULL, 'MGTE12222', 2, 3, 4, 3, 2, 13),
(42, NULL, 'MGTE12222', 2, 0, 1, 1, 0, 13),
(43, NULL, 'MGTE12222', 2, 1, 0, 0, 1, 13),
(44, NULL, 'MGTE12222', 2, 2, 1, 1, 2, 13),
(45, NULL, 'MGTE12222', 2, 2, 3, 1, 2, 13),
(46, NULL, 'MGTE12222', 2, 3, 1, 2, 3, 13),
(47, NULL, 'MGTE12222', 2, 3, 3, 3, 3, 13),
(48, NULL, 'MGTE12222', 2, 4, 2, 2, 3, 13),
(49, NULL, 'MGTE12222', 2, 3, 3, 2, 3, 13),
(50, NULL, 'MGTE12222', 2, 2, 3, 2, 2, 13),
(51, NULL, 'MGTE12222', 2, 2, 4, 2, 4, 13),
(52, NULL, 'MGTE12222', 2, 0, 0, 0, 0, 13),
(53, NULL, 'MGTE12222', 2, 1, 1, 1, 1, 13),
(54, NULL, 'MGTE12222', 2, 2, 2, 2, 2, 13),
(55, NULL, 'MGTE12222', 2, 3, 3, 3, 3, 13),
(56, NULL, 'MGTE12222', 2, 4, 4, 4, 4, 13),
(57, NULL, 'MGTE12222', 2, 2, 3, 4, 2, 13),
(58, NULL, 'MGTE12222', 2, 2, 3, 1, 3, 13),
(59, NULL, 'MGTE12222', 2, 3, 2, 2, 3, 13),
(60, NULL, 'MGTE12222', 2, 2, 3, 3, 2, 13),
(61, NULL, 'MGTE12222', 2, 3, 3, 4, 2, 13),
(62, NULL, 'MGTE12222', 2, 2, 3, 2, 1, 13),
(63, NULL, 'MGTE12222', 2, 3, 1, 2, 1, 13),
(64, NULL, 'MGTE12222', 2, 3, 2, 4, 3, 13),
(65, NULL, 'MGTE12222', 3, 1, 2, 1, 0, 13),
(66, NULL, 'MGTE12222', 3, 1, 1, 1, 1, 13),
(67, NULL, 'MGTE12222', 3, 0, 0, 1, 0, 13),
(68, NULL, 'MGTE12222', 3, 0, 1, 0, 0, 13),
(69, NULL, 'MGTE12222', 3, 4, 3, 4, 4, 13),
(70, NULL, 'MGTE12222', 3, 3, 4, 3, 3, 13),
(71, NULL, 'MGTE12222', 3, 1, 0, 1, 0, 13),
(72, NULL, 'MGTE12222', 3, 0, 1, 0, 1, 13),
(73, NULL, 'MGTE12222', 3, 0, 1, 1, 1, 13),
(74, NULL, 'MGTE12222', 3, 0, 0, 0, 0, 13),
(75, NULL, 'MGTE12222', 3, 0, 1, 0, 1, 13),
(76, NULL, 'MGTE12222', 3, 1, 0, 1, 0, 13),
(77, NULL, 'MGTE12222', 3, 0, 0, 1, 0, 13),
(78, NULL, 'MGTE12222', 3, 1, 0, 0, 0, 13),
(79, NULL, 'MGTE12222', 3, 1, 1, 1, 0, 13),
(80, NULL, 'MGTE12222', 3, 1, 0, 0, 0, 13),
(81, NULL, 'MGTE12222', 3, 0, 1, 1, 1, 13),
(82, NULL, 'MGTE12222', 3, 4, 1, 1, 2, 13),
(83, NULL, 'MGTE12222', 3, 4, 2, 1, 2, 13),
(84, NULL, 'MGTE12222', 3, 4, 0, 0, 0, 13),
(85, NULL, 'MGTE12222', 3, 4, 1, 1, 1, 13),
(86, NULL, 'MGTE12222', 3, 4, 1, 0, 1, 13),
(87, NULL, 'MGTE12222', 3, 0, 1, 0, 1, 13),
(88, NULL, 'MGTE12222', 3, 1, 2, 1, 1, 13),
(89, NULL, 'MGTE12222', 3, 1, 1, 1, 1, 13),
(90, NULL, 'MGTE12222', 4, 4, 3, 4, 3, 13),
(91, NULL, 'MGTE12222', 4, 3, 3, 3, 3, 13),
(92, NULL, 'MGTE12222', 4, 1, 1, 1, 1, 13),
(93, NULL, 'MGTE12222', 4, 0, 0, 0, 0, 13),
(94, NULL, 'MGTE12222', 4, 2, 2, 2, 2, 13),
(95, NULL, 'MGTE12222', 4, 4, 4, 4, 4, 13),
(96, NULL, 'MGTE12222', 4, 3, 3, 4, 4, 13),
(97, NULL, 'MGTE12222', 4, 4, 3, 3, 4, 13),
(98, NULL, 'MGTE12222', 4, 4, 3, 4, 4, 13),
(99, NULL, 'MGTE12222', 4, 3, 3, 4, 3, 13),
(100, NULL, 'MGTE12222', 4, 3, 3, 3, 4, 13),
(101, NULL, 'MGTE12222', 4, 2, 3, 2, 4, 13),
(102, NULL, 'MGTE12222', 4, 4, 3, 2, 1, 13),
(103, NULL, 'MGTE12222', 4, 2, 3, 2, 1, 13),
(104, NULL, 'MGTE12222', 4, 4, 4, 2, 1, 13),
(105, NULL, 'MGTE12222', 4, 2, 3, 3, 4, 13),
(106, NULL, 'MGTE12222', 4, 4, 0, 0, 4, 13),
(107, NULL, 'MGTE12222', 4, 3, 4, 0, 2, 13),
(108, NULL, 'MGTE12222', 4, 4, 4, 4, 4, 13),
(109, NULL, 'MGTE12222', 4, 4, 3, 4, 3, 13),
(110, NULL, 'MGTE12222', 4, 4, 3, 4, 4, 13),
(111, NULL, 'MGTE12222', 4, 3, 3, 4, 4, 13),
(112, NULL, 'MGTE12222', 4, 3, 2, 4, 3, 13),
(113, NULL, 'MGTE12222', 4, 2, 2, 4, 3, 13),
(114, NULL, 'MGTE12222', 4, 4, 4, 4, 3, 13);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
