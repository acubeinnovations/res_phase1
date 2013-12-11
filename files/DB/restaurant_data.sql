-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2013 at 10:16 AM
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
(4, 'Unavailable on Kitchen'),
(5, 'Accepted by Kitchen'),
(6, 'Finished');

--
-- Dumping data for table `bill_statuses`
--

INSERT INTO `bill_statuses` (`id`, `name`) VALUES
(1, 'Billed'),
(2, 'Paid'),
(3, 'Cancelled'),
(4, 'Booked');

--
-- Dumping data for table `contenttypes`
--

INSERT INTO `contenttypes` (`id`, `name`, `description`) VALUES
(1, 'HTML', 'Html Editor'),
(2, 'TEXT', 'No Html Editor');

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `username`, `password`, `name`, `image`, `securityquestion_id`, `answer`, `lastlogin`, `last_bill_number`, `status_id`, `created`, `updated`) VALUES
(1, 'counter1', 'e10adc3949ba59abbe56e057f20f883e', 'Counter 1', NULL, NULL, NULL, '2013-12-04 14:20:37', 0, 0, '2013-12-02 00:00:00', '0000-00-00 00:00:00');

--
-- Dumping data for table `kitchen`
--

INSERT INTO `kitchen` (`id`, `counter_id`, `username`, `password`, `name`, `image`, `securityquestion_id`, `answer`, `lastlogin`, `last_bill_number`, `status_id`, `created`, `updated`) VALUES
(1, NULL, 'master', 'e10adc3949ba59abbe56e057f20f883e', 'Master Kitchen', NULL, NULL, NULL, '2013-12-04 14:20:37', 0, 0, '2013-12-02 00:00:00', '0000-00-00 00:00:00');

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `publish`) VALUES
(1, 'English', 1);

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'Active'),
(2, 'Inactive');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
