-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 28, 2018 at 09:41 PM
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
('INTE31332', 'Advanced_Databases', 'Master Bunny', 1, 1111, 0),
('MGTE12222', 'Leadership', 'Master Bunny', 1, 1111, 0);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=258 DEFAULT CHARSET=latin1;

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
(137, 'Maleesha Ranawaka', NULL, NULL),
(138, 'Maleesha Ranawaka', NULL, NULL),
(139, 'Maleesha Ranawaka', NULL, NULL),
(140, 'Maleesha Ranawaka', NULL, NULL),
(141, 'Maleesha Ranawaka', NULL, NULL),
(142, 'Maleesha Ranawaka', NULL, NULL),
(143, 'Maleesha Ranawaka', NULL, NULL),
(144, 'Maleesha Ranawaka', NULL, NULL),
(145, 'Maleesha Ranawaka', NULL, NULL),
(146, 'Maleesha Ranawaka', NULL, NULL),
(147, 'Maleesha Ranawaka', NULL, NULL),
(148, 'Maleesha Ranawaka', NULL, NULL),
(149, 'Maleesha Ranawaka', NULL, NULL),
(150, 'Maleesha Ranawaka', NULL, NULL),
(151, 'Maleesha Ranawaka', NULL, NULL),
(152, 'Maleesha Ranawaka', NULL, NULL),
(153, 'Maleesha Ranawaka', NULL, NULL),
(154, 'Maleesha Ranawaka', NULL, NULL),
(155, 'Maleesha Ranawaka', NULL, NULL),
(156, 'Maleesha Ranawaka', NULL, NULL),
(157, 'Maleesha Ranawaka', NULL, NULL),
(158, 'Maleesha Ranawaka', NULL, NULL),
(159, 'Maleesha Ranawaka', NULL, NULL),
(160, 'Maleesha Ranawaka', NULL, NULL),
(161, 'Maleesha Ranawaka', NULL, NULL),
(162, 'Maleesha Ranawaka', NULL, NULL),
(163, 'Maleesha Ranawaka', NULL, NULL),
(164, 'Maleesha Ranawaka', NULL, NULL),
(165, 'Maleesha Ranawaka', NULL, NULL),
(166, 'Maleesha Ranawaka', NULL, NULL),
(167, 'Maleesha Ranawaka', NULL, NULL),
(168, 'Maleesha Ranawaka', NULL, NULL),
(169, 'Maleesha Ranawaka', NULL, NULL),
(170, 'Maleesha Ranawaka', NULL, NULL),
(171, 'Maleesha Ranawaka', NULL, NULL),
(172, 'Maleesha Ranawaka', NULL, NULL),
(173, 'Maleesha Ranawaka', NULL, NULL),
(174, 'Maleesha Ranawaka', NULL, NULL),
(175, 'Maleesha Ranawaka', NULL, NULL),
(176, 'Maleesha Ranawaka', NULL, NULL),
(177, 'Maleesha Ranawaka', NULL, NULL),
(178, 'Maleesha Ranawaka', NULL, NULL),
(179, 'Maleesha Ranawaka', NULL, NULL),
(180, 'Maleesha Ranawaka', NULL, NULL),
(181, 'Maleesha Ranawaka', NULL, NULL),
(182, 'Maleesha Ranawaka', NULL, NULL),
(183, 'Maleesha Ranawaka', NULL, NULL),
(184, 'Maleesha Ranawaka', NULL, NULL),
(185, 'Maleesha Ranawaka', NULL, NULL),
(186, 'Maleesha Ranawaka', NULL, NULL),
(187, 'Maleesha Ranawaka', NULL, NULL),
(188, 'Maleesha Ranawaka', NULL, NULL),
(189, 'Maleesha Ranawaka', NULL, NULL),
(190, 'Maleesha Ranawaka', NULL, NULL),
(191, 'Maleesha Ranawaka', NULL, NULL),
(192, 'Maleesha Ranawaka', NULL, NULL),
(193, 'Maleesha Ranawaka', NULL, NULL),
(194, 'Maleesha Ranawaka', NULL, NULL),
(195, 'Maleesha Ranawaka', NULL, NULL),
(196, 'Maleesha Ranawaka', NULL, NULL),
(197, 'Maleesha Ranawaka', NULL, NULL),
(198, 'Maleesha Ranawaka', NULL, NULL),
(199, 'Maleesha Ranawaka', NULL, NULL),
(200, 'Maleesha Ranawaka', NULL, NULL),
(201, 'Maleesha Ranawaka', NULL, NULL),
(202, 'Maleesha Ranawaka', NULL, NULL),
(203, 'Maleesha Ranawaka', NULL, NULL),
(204, 'Maleesha Ranawaka', NULL, NULL),
(205, 'Maleesha Ranawaka', NULL, NULL),
(206, 'Maleesha Ranawaka', NULL, NULL),
(207, 'Maleesha Ranawaka', NULL, NULL),
(208, 'Maleesha Ranawaka', NULL, NULL),
(209, 'Maleesha Ranawaka', NULL, NULL),
(210, 'Maleesha Ranawaka', NULL, NULL),
(211, 'Maleesha Ranawaka', NULL, NULL),
(212, 'Maleesha Ranawaka', NULL, NULL),
(213, 'Maleesha Ranawaka', NULL, NULL),
(214, 'Maleesha Ranawaka', NULL, NULL),
(215, 'Maleesha Ranawaka', NULL, NULL),
(216, 'Maleesha Ranawaka', NULL, NULL),
(217, 'Maleesha Ranawaka', NULL, NULL),
(218, 'Maleesha Ranawaka', NULL, NULL),
(219, 'Maleesha Ranawaka', NULL, NULL),
(220, 'Maleesha Ranawaka', NULL, NULL),
(221, 'Maleesha Ranawaka', NULL, NULL),
(222, 'Maleesha Ranawaka', NULL, NULL),
(223, 'Maleesha Ranawaka', NULL, NULL),
(224, 'Maleesha Ranawaka', NULL, NULL),
(225, 'Maleesha Ranawaka', NULL, NULL),
(226, 'Maleesha Ranawaka', NULL, NULL),
(227, 'Maleesha Ranawaka', NULL, NULL),
(228, 'Maleesha Ranawaka', NULL, NULL),
(229, 'Maleesha Ranawaka', NULL, NULL),
(230, 'Maleesha Ranawaka', NULL, NULL),
(231, 'Maleesha Ranawaka', NULL, NULL),
(232, 'Maleesha Ranawaka', NULL, NULL),
(233, 'Maleesha Ranawaka', NULL, NULL),
(234, 'Maleesha Ranawaka', NULL, NULL),
(235, 'Maleesha Ranawaka', NULL, NULL),
(236, 'Maleesha Ranawaka', NULL, NULL),
(237, 'Maleesha Ranawaka', NULL, NULL),
(238, 'Maleesha Ranawaka', NULL, NULL),
(239, 'Maleesha Ranawaka', NULL, NULL),
(240, 'Maleesha Ranawaka', NULL, NULL),
(241, 'Maleesha Ranawaka', NULL, NULL),
(242, 'Maleesha Ranawaka', NULL, NULL),
(243, 'Maleesha Ranawaka', NULL, NULL),
(244, 'Maleesha Ranawaka', NULL, NULL),
(245, 'Maleesha Ranawaka', NULL, NULL),
(246, 'Maleesha Ranawaka', NULL, NULL),
(247, 'Maleesha Ranawaka', NULL, NULL),
(248, 'Maleesha Ranawaka', NULL, NULL),
(249, 'Maleesha Ranawaka', NULL, NULL),
(250, 'Maleesha Ranawaka', NULL, NULL),
(251, 'Maleesha Ranawaka', NULL, NULL),
(252, 'Maleesha Ranawaka', NULL, NULL),
(253, 'Maleesha Ranawaka', NULL, NULL),
(254, 'Maleesha Ranawaka', NULL, NULL),
(255, 'Maleesha Ranawaka', NULL, NULL),
(256, 'Maleesha Ranawaka', NULL, NULL),
(257, 'Maleesha Ranawaka', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
