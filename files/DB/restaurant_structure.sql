-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2014 at 02:24 PM
-- Server version: 5.5.34
-- PHP Version: 5.3.10-1ubuntu3.9

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
(1, 'admin', '39bb37cf36d3b29a9280d8a70a0eed42', NULL, NULL, '2014-01-09 14:17:08', NULL, NULL, NULL, '2013-04-22 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_number` int(11) NOT NULL,
  `bill_date` datetime NOT NULL,
  `booking_date` datetime NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `bill_status_id` int(11) NOT NULL,
  `bill_kitchen_status_id` int(11) DEFAULT NULL,
  `amount` double NOT NULL,
  `paid` double NOT NULL,
  `balance` double NOT NULL,
  `packing_charge` double DEFAULT NULL,
  `tax` double NOT NULL,
  `discount` double NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `counter_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `chair_number` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `sync` tinyint(1) NOT NULL DEFAULT '0',
  `sync_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bill_items`
--

CREATE TABLE IF NOT EXISTS `bill_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `counter_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `rate` double NOT NULL,
  `tax` double NOT NULL,
  `discount` double NOT NULL,
  `bill_item_status_id` int(11) NOT NULL,
  `bill_kitchen_status_id` int(11) DEFAULT NULL,
  `packing_id` int(11) DEFAULT NULL,
  `packing_rate` double DEFAULT NULL,
  `packing_quantity` int(11) DEFAULT NULL,
  `packing_amount` double DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `sync` tinyint(1) NOT NULL DEFAULT '0',
  `sync_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `packing_id` (`packing_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bill_item_statuses`
--

CREATE TABLE IF NOT EXISTS `bill_item_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bill_item_statuses`
--

INSERT INTO `bill_item_statuses` (`id`, `name`) VALUES
(1, 'Active'),
(2, 'Cancelled'),
(3, 'Rejected by Customer');

-- --------------------------------------------------------

--
-- Table structure for table `bill_kitchen_statuses`
--

CREATE TABLE IF NOT EXISTS `bill_kitchen_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bill_kitchen_statuses`
--

INSERT INTO `bill_kitchen_statuses` (`id`, `name`) VALUES
(1, 'To Kitchen'),
(2, 'Accept'),
(3, 'Reject'),
(4, 'Finished');

-- --------------------------------------------------------

--
-- Table structure for table `bill_statuses`
--

CREATE TABLE IF NOT EXISTS `bill_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `bill_statuses`
--

INSERT INTO `bill_statuses` (`id`, `name`) VALUES
(1, 'Billed'),
(2, 'Paid'),
(3, 'Cancelled'),
(4, 'Booked'),
(5, 'Hold');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `last_bill_number` int(11) NOT NULL DEFAULT '0',
  `status_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `securityquestion_id` (`securityquestion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `username`, `password`, `name`, `image`, `securityquestion_id`, `answer`, `lastlogin`, `last_bill_number`, `status_id`, `created`, `updated`) VALUES
(1, 'counter', '39bb37cf36d3b29a9280d8a70a0eed42', 'Counter 1', NULL, NULL, NULL, '2014-01-10 16:04:44', 12, 0, '2013-12-02 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `counter_items`
--

CREATE TABLE IF NOT EXISTS `counter_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `counter_id` int(11) NOT NULL,
  `kitchen_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `quantity` double NOT NULL,
  `sync` tinyint(1) NOT NULL DEFAULT '0',
  `sync_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
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
  `from_master_kitchen` tinyint(1) NOT NULL DEFAULT '0',
  `packing_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `packing_id` (`packing_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `item_category_id`, `rate`, `tax`, `status_id`, `from_master_kitchen`, `packing_id`) VALUES
(1, 'Tea', 1, 25, 2, 1, 0, 0),
(2, 'Coffee', 1, 30, 5, 1, 0, 0),
(3, 'Fried Rice  (veg)', 3, 150, 32, 0, 0, -1),
(4, 'Fried Rice  (Chicken)', 3, 200, 30, 1, 0, 0),
(5, 'Fried Rice  (Mixed)', 3, 190, 25, 1, 0, 0),
(6, 'Fresh Lime', 1, 25, 5, 0, 0, 3),
(7, 'Biriyani Chicken', 2, 150, 5, 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE IF NOT EXISTS `item_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL COMMENT 'Category may have valid parent category',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `name`, `status_id`, `parent_id`) VALUES
(1, 'Beverages', 1, -1),
(2, 'European', 1, -1),
(3, 'Chinese', 1, -1);

-- --------------------------------------------------------

--
-- Table structure for table `kitchen`
--

CREATE TABLE IF NOT EXISTS `kitchen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `counter_id` int(11) DEFAULT NULL COMMENT 'NULL For Master Kitchen',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` text,
  `image` text,
  `securityquestion_id` int(11) DEFAULT NULL,
  `answer` text,
  `lastlogin` datetime DEFAULT NULL,
  `last_bill_number` int(11) NOT NULL DEFAULT '0',
  `status_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `securityquestion_id` (`securityquestion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kitchen`
--

INSERT INTO `kitchen` (`id`, `counter_id`, `username`, `password`, `name`, `image`, `securityquestion_id`, `answer`, `lastlogin`, `last_bill_number`, `status_id`, `created`, `updated`) VALUES
(1, NULL, 'master', '39bb37cf36d3b29a9280d8a70a0eed42', 'Master Kitchen', NULL, NULL, NULL, '2014-01-08 10:40:55', 0, 0, '2013-12-02 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'kitchen', '39bb37cf36d3b29a9280d8a70a0eed42', 'Master Kitchen', NULL, NULL, NULL, '2014-01-08 10:39:57', 0, 0, '2013-12-02 00:00:00', '0000-00-00 00:00:00');

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
-- Table structure for table `packing`
--

CREATE TABLE IF NOT EXISTS `packing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `rate` double NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `packing`
--

INSERT INTO `packing` (`id`, `name`, `rate`) VALUES
(1, 'Small Container', 6),
(2, 'Large Container', 10),
(3, 'Juice Container', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'Active'),
(2, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `number_of_chairs` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
