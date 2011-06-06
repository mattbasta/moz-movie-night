-- phpMyAdmin SQL Dump
-- version 3.3.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 06, 2011 at 07:56 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6-1+lenny9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `movienight`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` text NOT NULL,
  `submitter` varchar(128) NOT NULL,
  `hidden` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `submitter` (`submitter`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `voter` varchar(128) NOT NULL,
  `movie` int(11) NOT NULL,
  `value` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `voter` (`voter`,`movie`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=136 ;

