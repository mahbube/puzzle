-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2011 at 07:21 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mycms`
--

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE IF NOT EXISTS `downloads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `url` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id`, `title`, `url`) VALUES
(1, 'test', 'dowqnloads/test.exe'),
(2, 'test2', 'dsfghdsfgdfgr.zip');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(16) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `pass`) VALUES
(1, 'Ali', 'MD', 'i@ali.md', '123'),
(2, 'hashem', 'gholami', 'sdfgsfg@wsgd.dfgh', '1213324'),
(3, 'mahdi', 'tavakolli', 'sdfsd@srgetdh.eryg', '13243esdf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
