-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2013 at 06:28 PM
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

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `username`, `password`, `emailid`, `registrationdate`, `lastlogin`, `image`, `securityquestion_id`, `answer`, `created`, `updated`, `record_user_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, '2013-07-11 17:17:43', NULL, NULL, NULL, '2013-04-22 00:00:00', NULL, NULL);

--
-- Dumping data for table `bill_item_statuses`
--

INSERT INTO `bill_item_statuses` (`id`, `name`) VALUES
(1, 'Active'),
(2, 'Cancelled'),
(3, 'Rejected by Coustomer'),
(4, 'Unavailable on Kitchen');

--
-- Dumping data for table `bill_statuses`
--

INSERT INTO `bill_statuses` (`id`, `name`) VALUES
(1, 'Billed'),
(2, 'Paid'),
(3, 'Cancelled'),
(4, 'Booked');

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `name`, `page_id`, `content`, `description`, `language_id`, `contenttype_id`, `publish`) VALUES
(1, 'Index Heading', 4, 'index page', '', 1, 2, 0),
(2, 'Index Content', 4, 'Welcome  ....', '', 1, 1, 0);

--
-- Dumping data for table `contenttypes`
--

INSERT INTO `contenttypes` (`id`, `name`, `description`) VALUES
(1, 'HTML', 'Html Editor'),
(2, 'TEXT', 'No Html Editor');

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `username`, `password`, `name`, `image`, `securityquestion_id`, `answer`, `lastlogin`, `created`, `updated`) VALUES
(1, 'counter1', 'e10adc3949ba59abbe56e057f20f883e', 'Counter 1', NULL, NULL, NULL, NULL, '2013-12-02 00:00:00', NULL);

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `publish`) VALUES
(1, 'English', 1);

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`) VALUES
(4, 'index.php');

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'Active'),
(2, 'Inactive');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
