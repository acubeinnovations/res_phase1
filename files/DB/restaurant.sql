-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2013 at 02:42 PM
-- Server version: 5.5.34
-- PHP Version: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `emailid` text,
  `registrationdate` datetime DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `image` text,
  `securityquestion_id` int(11) DEFAULT NULL,
  `answer` text,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `record_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `securityquestion_id` (`securityquestion_id`),
  KEY `record_user_id` (`record_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `username`, `password`, `emailid`, `registrationdate`, `lastlogin`, `image`, `securityquestion_id`, `answer`, `created`, `updated`, `record_user_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, '2013-07-11 17:17:43', NULL, NULL, NULL, '2013-04-22 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_number` int(11) NOT NULL,
  `date` date NOT NULL,
  `bill_status_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `tax` double NOT NULL,
  `discount` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bill_items`
--

CREATE TABLE IF NOT EXISTS `bill_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `rate` double NOT NULL,
  `tax` double NOT NULL,
  `discount` double NOT NULL,
  `bill_item_status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `page_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `description` varchar(255) NOT NULL,
  `language_id` int(11) NOT NULL,
  `contenttype_id` int(11) NOT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`,`language_id`),
  KEY `contenttype_id` (`contenttype_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `name`, `page_id`, `content`, `description`, `language_id`, `contenttype_id`, `publish`) VALUES
(1, 'Index Heading', 4, 'index page', '', 1, 2, 0),
(2, 'Index Content', 4, 'Welcome  ....', '', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contenttypes`
--

CREATE TABLE IF NOT EXISTS `contenttypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contenttypes`
--

INSERT INTO `contenttypes` (`id`, `name`, `description`) VALUES
(1, 'HTML', 'Html Editor'),
(2, 'TEXT', 'No Html Editor');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE IF NOT EXISTS `counters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` text,
  `image` text,
  `securityquestion_id` int(11) DEFAULT NULL,
  `answer` text,
  `lastlogin` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `securityquestion_id` (`securityquestion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `item_category_id` int(11) NOT NULL,
  `rate` double NOT NULL,
  `tax` double NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `publish`) VALUES
(1, 'English', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`) VALUES
(4, 'index.php');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
