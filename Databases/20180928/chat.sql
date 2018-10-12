-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 28, 2018 at 12:50 PM
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
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

DROP TABLE IF EXISTS `classroom`;
CREATE TABLE IF NOT EXISTS `classroom` (
  `Subject_Code` varchar(9) NOT NULL,
  `Subject_Name` text,
  `Lecturer_Name` text,
  `Week` int(11) NOT NULL,
  `PIN` int(4) NOT NULL,
  `Availability` int(1) DEFAULT NULL,
  PRIMARY KEY (`Subject_Code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`Subject_Code`, `Subject_Name`, `Lecturer_Name`, `Week`, `PIN`, `Availability`) VALUES
('Test5', 'msgn', 'Master Bunny', 4, 1111, 0),
('PMAT22366', 'Maths', 'Master Bunny', 2, 1111, 0),
('Test4', 'GNOME', 'Master Bunny', 1, 1111, 0),
('INTE31332', 'Advanced_Databases', 'Master Bunny', 1, 1111, 1),
('MGTE12222', 'IOT', 'Master Bunny', 2, 2222, 1),
('Test1', 'Test1', 'Master Bunny', 1, 1111, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Subject_Code` varchar(9) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `message` text,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Week` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `Subject_Code`, `user`, `message`, `date`, `Week`) VALUES
(12, 'MGTE12222', 'Lecturer', 'hello', '2018-09-27 15:56:20', 1),
(2, 'INTE12112', 'Students', '1111', '2018-07-12 06:44:12', 1),
(3, 'INTE12112', 'Lecturer', '333333333', '2018-07-12 06:48:49', 1),
(4, 'INTE12112', 'Students', '44', '2018-07-12 06:48:55', 1),
(5, 'INTE12112', 'Students', 'sd', '2018-07-22 11:46:46', 1),
(6, 'INTE12112', 'Students', '55', '2018-09-12 08:58:12', 1),
(7, 'INTE12112', 'Students', '636', '2018-09-12 08:58:15', 1),
(8, 'PMAT22365', 'Students', 'hi', '2018-09-15 06:51:05', 4),
(9, 'PMAT22365', 'Lecturer', 'hello', '2018-09-15 06:51:12', 4),
(10, 'PMAT22366', 'Lecturer', 'hello', '2018-09-27 14:36:28', 2),
(11, 'PMAT22366', 'Lecturer', 'hello', '2018-09-27 14:36:35', 2),
(13, 'MGTE12222', 'Students', 'hello', '2018-09-27 15:56:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `uploader`
--

DROP TABLE IF EXISTS `uploader`;
CREATE TABLE IF NOT EXISTS `uploader` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Subject_Code` varchar(9) DEFAULT NULL,
  `filename` varchar(500) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `paths` varchar(500) DEFAULT NULL,
  `uploaded_on` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploader`
--

INSERT INTO `uploader` (`id`, `Subject_Code`, `filename`, `name`, `paths`, `uploaded_on`) VALUES
(27, 'MGTE12222', 'Test', 'microsoft.wav', 'upload/microsoft.wav', '2018-09-28 08:21:11'),
(4, 'INTE31332', 'Test', 'OBD_UserGuide_With_Administration_V1.0.pdf', 'upload/OBD_UserGuide_With_Administration_V1.0.pdf', '2018-09-27 15:23:41'),
(26, 'MGTE12222', 'Test', 'static.csv', 'upload/static.csv', '2018-09-28 08:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `User_Type` text,
  `email` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `User_Type`, `email`) VALUES
(1, 'Maleesha Ranawaka', NULL, NULL),
(2, 'Maleesha Ranawaka', NULL, NULL),
(3, 'Maleesha Ranawaka', NULL, NULL),
(4, 'Maleesha Ranawaka', NULL, NULL),
(5, 'Maleesha Ranawaka', NULL, NULL),
(6, 'Maleesha Ranawaka', NULL, NULL),
(7, 'Maleesha Ranawaka', NULL, NULL),
(8, 'Maleesha Ranawaka', NULL, NULL),
(9, 'Maleesha Ranawaka', NULL, NULL),
(10, 'Maleesha Ranawaka', NULL, NULL),
(11, 'Maleesha Ranawaka', NULL, NULL),
(12, 'Maleesha Ranawaka', NULL, NULL),
(13, 'Maleesha Ranawaka', NULL, NULL),
(14, 'Maleesha Ranawaka', NULL, NULL),
(15, 'Maleesha Ranawaka', NULL, NULL),
(16, 'Maleesha Ranawaka', NULL, NULL),
(17, 'Maleesha Ranawaka', NULL, NULL),
(18, 'Maleesha Ranawaka', NULL, NULL),
(19, 'Maleesha Ranawaka', NULL, NULL),
(20, 'Maleesha Ranawaka', NULL, NULL),
(21, 'Maleesha Ranawaka', NULL, NULL),
(22, 'Maleesha Ranawaka', NULL, NULL),
(23, 'Maleesha Ranawaka', NULL, NULL),
(24, 'Maleesha Ranawaka', NULL, NULL),
(25, 'Maleesha Ranawaka', NULL, NULL),
(26, 'Maleesha Ranawaka', NULL, NULL),
(27, 'Maleesha Ranawaka', NULL, NULL),
(28, 'Maleesha Ranawaka', NULL, NULL),
(29, 'Maleesha Ranawaka', NULL, NULL),
(30, 'Maleesha Ranawaka', NULL, NULL),
(31, 'Maleesha Ranawaka', NULL, NULL),
(32, 'Maleesha Ranawaka', NULL, NULL),
(33, 'Maleesha Ranawaka', NULL, NULL),
(34, 'Maleesha Ranawaka', NULL, NULL),
(35, 'Maleesha Ranawaka', NULL, NULL),
(36, 'Maleesha Ranawaka', NULL, NULL),
(37, 'Maleesha Ranawaka', NULL, NULL),
(38, 'Maleesha Ranawaka', NULL, NULL),
(39, '\'.$_SESSION[\'UserName\'].\'', NULL, NULL),
(40, '\'.$_SESSION[\'UserName\'].\'', NULL, NULL),
(41, '\".$userName.\"', NULL, NULL),
(42, '\"\".$userName.\"\"', NULL, NULL),
(43, '\"\".$userName.\"\"', NULL, NULL),
(44, '\"\".$userName.\"\"', NULL, NULL),
(45, '\"\".$userName.\"\"', NULL, NULL),
(46, '\"\".$userName.\"\"', NULL, NULL),
(47, '\"\".$userName.\"\"', NULL, NULL),
(48, '\"\".$userName.\"\"', NULL, NULL),
(49, '\"\".$userName.\"\"', NULL, NULL),
(50, '\"\".$userName.\"\"', NULL, NULL),
(51, '\"\".$userName.\"\"', NULL, NULL),
(52, '\"\".$userName.\"\"', NULL, NULL),
(53, '', NULL, NULL),
(54, '', NULL, NULL),
(55, 'Maleesha Ranawaka', NULL, NULL),
(56, 'Maleesha Ranawaka', NULL, NULL),
(57, 'Maleesha Ranawaka', NULL, NULL),
(58, 'Maleesha Ranawaka', NULL, NULL),
(59, 'Maleesha Ranawaka', NULL, NULL),
(60, 'Maleesha Ranawaka', NULL, NULL),
(61, 'Maleesha Ranawaka', NULL, NULL),
(62, 'Maleesha Ranawaka', NULL, NULL),
(63, 'Maleesha Ranawaka', NULL, NULL),
(64, 'Maleesha Ranawaka', NULL, NULL),
(65, 'Maleesha Ranawaka', NULL, NULL),
(66, 'Maleesha Ranawaka', NULL, NULL),
(67, 'Maleesha Ranawaka', NULL, NULL),
(68, 'Maleesha Ranawaka', NULL, NULL),
(69, 'Maleesha Ranawaka', NULL, NULL),
(70, 'Maleesha Ranawaka', NULL, NULL),
(71, 'userName1', NULL, NULL),
(72, 'userName1', NULL, NULL),
(73, 'userName1', NULL, NULL),
(74, 'userName1', NULL, NULL),
(75, 'Maleesha Ranawaka', NULL, NULL),
(76, 'Maleesha Ranawaka', NULL, NULL),
(77, '', NULL, NULL),
(78, '', NULL, NULL),
(79, '', NULL, NULL),
(80, '', NULL, NULL),
(81, '', NULL, NULL),
(82, 'test ?>', NULL, NULL),
(83, 'test ?>', NULL, NULL),
(84, 'test ?>', NULL, NULL),
(85, 'test ?>', NULL, NULL),
(86, '', NULL, NULL),
(87, '\'epac\'', NULL, NULL),
(88, 'epac', NULL, NULL),
(89, 'epac', NULL, NULL),
(90, 'epac', NULL, NULL),
(91, 'epac', NULL, NULL),
(92, '', NULL, NULL),
(93, '', NULL, NULL),
(94, 'Maleesha Ranawaka', NULL, NULL),
(95, 'Maleesha Ranawaka', NULL, NULL),
(96, 'Maleesha Ranawaka', NULL, NULL),
(97, 'Maleesha Ranawaka', NULL, NULL),
(98, 'Maleesha Ranawaka', NULL, NULL),
(99, 'Maleesha Ranawaka', NULL, NULL),
(100, 'Maleesha Ranawaka', NULL, NULL),
(101, 'Maleesha Ranawaka', NULL, NULL),
(102, 'Maleesha Ranawaka', NULL, NULL),
(103, 'Maleesha Ranawaka', NULL, NULL),
(104, 'Maleesha Ranawaka', NULL, NULL),
(105, 'Maleesha Ranawaka', NULL, NULL),
(106, 'Maleesha Ranawaka', NULL, NULL),
(107, 'Maleesha Ranawaka', NULL, NULL),
(108, 'Maleesha Ranawaka', NULL, NULL),
(109, 'Maleesha Ranawaka', NULL, NULL),
(110, 'Maleesha Ranawaka', NULL, NULL),
(111, 'Maleesha Ranawaka', NULL, NULL),
(112, 'Maleesha Ranawaka', NULL, NULL),
(113, 'Maleesha Ranawaka', NULL, NULL),
(114, 'Maleesha Ranawaka', NULL, NULL),
(115, 'Maleesha Ranawaka', NULL, NULL),
(116, 'Maleesha Ranawaka', NULL, NULL),
(117, 'Maleesha Ranawaka', NULL, NULL),
(118, 'Maleesha Ranawaka', NULL, NULL),
(119, 'Maleesha Ranawaka', NULL, NULL),
(120, 'Maleesha Ranawaka', NULL, NULL),
(121, 'Maleesha Ranawaka', NULL, NULL),
(122, 'Maleesha Ranawaka', NULL, NULL),
(123, 'Maleesha Ranawaka', NULL, NULL),
(124, 'Maleesha Ranawaka', NULL, NULL),
(125, 'Maleesha Ranawaka', NULL, NULL),
(126, 'Maleesha Ranawaka', NULL, NULL),
(127, 'Maleesha Ranawaka', NULL, NULL),
(128, 'Maleesha Ranawaka', NULL, NULL),
(129, 'Maleesha Ranawaka', NULL, NULL),
(130, 'Maleesha Ranawaka', NULL, NULL),
(131, 'Maleesha Ranawaka', NULL, NULL),
(132, 'Maleesha Ranawaka', NULL, NULL),
(133, 'Maleesha Ranawaka', NULL, NULL),
(134, 'Maleesha Ranawaka', NULL, NULL),
(135, 'Maleesha Ranawaka', NULL, NULL),
(136, 'Maleesha Ranawaka', NULL, NULL),
(137, 'Maleesha Ranawaka', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
