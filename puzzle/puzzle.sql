-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2012 at 08:44 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `puzzle`
--

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE IF NOT EXISTS `img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `col` int(11) NOT NULL,
  `row` int(11) NOT NULL,
  `id_img` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`id`, `url`, `img_name`, `col`, `row`, `id_img`) VALUES
(1, './img/1-1.png', '1-1.png', 1, 1, '1_1'),
(2, './img/1-2.png', '1-2.png', 2, 1, '1_2'),
(3, './img/2-1.png', '2-1.png', 1, 2, '2_1'),
(4, './img/2-2.png', '2-2.png', 2, 2, '2_2'),
(5, './img/1-3.png', '1-3.png', 3, 1, '1_3'),
(6, './img/1-4.png', '1-4.png', 4, 1, '1_4'),
(7, './img/1-5.png', '1-5.png', 5, 1, '1_5'),
(8, './img/2-3.png', '2-3.png', 3, 2, '2_3'),
(9, './img/2-4.png', '2-4.png', 4, 2, '2_4'),
(10, './img/2-5.png', '2-5.png', 5, 2, '2_5'),
(11, './img/3-1.png', '3-1.png', 1, 3, '3_1'),
(12, './img/3-2.png', '3-2.png', 3, 2, '3_2'),
(13, './img/3-3.png', '3-3.png', 3, 3, '3_3'),
(14, './img/3-4.png', '3-4.png', 4, 3, '3_4'),
(15, './img/3-5.png', '3-5.png', 5, 3, '3_5'),
(16, './img/4-1.png', '4-1.png', 1, 4, '4_1'),
(17, './img/4-2.png', '4-2.png', 2, 4, '4_2'),
(18, './img/4-3.png', '4-3.png', 3, 4, '4_3'),
(19, './img/4-4.png', '4-4.png', 4, 4, '4_4'),
(20, './img/4-5.png', '4-5.png', 5, 4, '4_5');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
