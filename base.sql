-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2013 at 03:16 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `almaweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` int(11) DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT '0',
  `img` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `thumb` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `caption` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL,
  `w` int(11) DEFAULT NULL,
  `h` int(11) DEFAULT NULL,
  `video` int(11) DEFAULT '0',
  `vimeo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `replace` int(11) DEFAULT '0',
  `description` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `info` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL,
  `hide` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`orden`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `intra_users`
--

CREATE TABLE `intra_users` (
  `userID` int(11) NOT NULL,
  `user` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pass` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `active` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `intra_users`
--

INSERT INTO `intra_users` (`userID`, `user`, `pass`, `email`, `active`) VALUES
(1, 'alma', '746e87da779bcc671c9323fd6c4f436c06d3f9414328791ecfc8a40872c5559a', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT '0',
  `url` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `page` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `menu` int(11) NOT NULL DEFAULT '0',
  `orden` int(11) NOT NULL DEFAULT '0',
  `content` longtext COLLATE utf8_spanish_ci,
  `template` int(11) DEFAULT '0',
  `description` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `url` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `vimeo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `URL` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `name`, `URL`, `description`) VALUES
(1, 'Building', 'building', NULL),
(2, 'Map', 'map', NULL),
(3, 'Page', 'page', NULL),
(4, 'Video', 'video', NULL),
(5, 'Home', '', NULL),
(6, 'Splash', '', NULL),
(7, 'Login', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `passcode` varchar(200) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

