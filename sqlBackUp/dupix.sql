-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2013 at 12:40 AM
-- Server version: 5.5.28
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dupix`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title`, `link`, `body`) VALUES
(1, 'About Us', '0', 'About Us'),
(2, 'Contact Us', '0', 'Contact Us'),
(3, 'Services', '', 'Services'),
(4, 'Terms Of Use', '', '<p>Terms Of Use</p>'),
(5, 'Privacy Policy', '', '<p>Privacy Policy</p>');

-- --------------------------------------------------------

--
-- Table structure for table `gals`
--

CREATE TABLE IF NOT EXISTS `gals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `position` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `name_2` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'Web Assistant');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_code` varchar(255) NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `newsletter` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `payment_method` int(1) NOT NULL DEFAULT '1',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `unit_price` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `status` int(1) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `body` text,
  `price` int(11) DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `min_images` int(11) DEFAULT '1',
  `max_images` int(11) DEFAULT '1',
  `crop_width` int(11) DEFAULT NULL,
  `crop_height` int(11) DEFAULT NULL,
  `crop_ratio` tinyint(4) DEFAULT '1',
  `home` tinyint(1) DEFAULT '0',
  `hot` tinyint(1) DEFAULT '0',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` text,
  `meta_description` text,
  `position` int(11) DEFAULT '0',
  `home_position` int(11) DEFAULT '0',
  `section_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `account` tinyint(1) DEFAULT '1',
  `cart` tinyint(1) DEFAULT '1',
  `type` int(1) NOT NULL DEFAULT '0',
  `quantity` int(11) DEFAULT '1',
  `info` text NOT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE IF NOT EXISTS `responses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) DEFAULT NULL,
  `vpc_3DSXID` varchar(255) DEFAULT NULL,
  `vpc_3DSenrolled` varchar(255) DEFAULT NULL,
  `vpc_AVSRequestCode` varchar(255) DEFAULT NULL,
  `vpc_AVSResultCode` varchar(255) DEFAULT NULL,
  `vpc_AVS_City` varchar(255) DEFAULT NULL,
  `vpc_AVS_Country` varchar(255) DEFAULT NULL,
  `vpc_AVS_PostCode` varchar(255) DEFAULT NULL,
  `vpc_AVS_StateProv` varchar(255) DEFAULT NULL,
  `vpc_AVS_Street01` varchar(255) DEFAULT NULL,
  `vpc_AcqAVSRespCode` varchar(255) DEFAULT NULL,
  `vpc_AcqCSCRespCode` varchar(255) DEFAULT NULL,
  `vpc_AcqResponseCode` varchar(255) DEFAULT NULL,
  `vpc_Amount` varchar(255) DEFAULT NULL,
  `vpc_AuthorizeId` varchar(255) DEFAULT NULL,
  `vpc_BatchNo` varchar(255) DEFAULT NULL,
  `vpc_CSCResultCode` varchar(255) DEFAULT NULL,
  `vpc_Card` varchar(255) DEFAULT NULL,
  `vpc_CardNum` varchar(255) DEFAULT NULL,
  `vpc_Command` varchar(255) DEFAULT NULL,
  `vpc_Locale` varchar(255) DEFAULT NULL,
  `vpc_MerchTxnRef` varchar(255) DEFAULT NULL,
  `vpc_Merchant` varchar(255) DEFAULT NULL,
  `vpc_Message` varchar(255) DEFAULT NULL,
  `vpc_OrderInfo` varchar(255) DEFAULT NULL,
  `vpc_ReceiptNo` varchar(255) DEFAULT NULL,
  `vpc_TransactionNo` varchar(255) DEFAULT NULL,
  `vpc_TxnResponseCode` varchar(255) DEFAULT NULL,
  `vpc_VerSecurityLevel` varchar(255) DEFAULT NULL,
  `vpc_VerStatus` varchar(255) DEFAULT NULL,
  `vpc_VerType` varchar(255) DEFAULT NULL,
  `vpc_Version` varchar(255) DEFAULT NULL,
  `vpc_TxnResponseDescription` varchar(255) DEFAULT NULL,
  `vpc_VerStatusDescription` varchar(255) DEFAULT NULL,
  `hashValidated` varchar(255) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `color` varchar(10) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `photo_print` tinyint(1) NOT NULL DEFAULT '0',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` text,
  `meta_description` text,
  `position` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `footer` varchar(255) NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `info` text NOT NULL,
  `file_types` varchar(255) NOT NULL,
  `image_types` varchar(255) NOT NULL,
  `max_upload_size` int(11) NOT NULL,
  `resize` int(1) NOT NULL,
  `max_image_width` int(11) NOT NULL,
  `master_image_width` int(11) NOT NULL,
  `master_image_height` int(11) NOT NULL,
  `large_image_width` int(11) NOT NULL,
  `large_image_height` int(11) NOT NULL,
  `medium_image_width` int(11) NOT NULL,
  `medium_image_height` int(11) NOT NULL,
  `thumb_width` int(11) NOT NULL,
  `thumb_height` int(11) NOT NULL,
  `video_width` int(11) NOT NULL,
  `video_height` int(11) NOT NULL,
  `limit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `url`, `email`, `title`, `footer`, `meta_keywords`, `meta_description`, `info`, `file_types`, `image_types`, `max_upload_size`, `resize`, `max_image_width`, `master_image_width`, `master_image_height`, `large_image_width`, `large_image_height`, `medium_image_width`, `medium_image_height`, `thumb_width`, `thumb_height`, `video_width`, `video_height`, `limit`) VALUES
(1, 'http://dupix.local', 'sharaf@localhost', 'Fotosoora', '&copy; sh1ft.net', 'Subscription', 'Our company details', 'Our company info', 'zip,rar,pdf,doc,flv', 'jpeg,jpg,gif,png', 20, 3, 1000, 800, 500, 883, 402, 710, 380, 220, 160, 420, 222, 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `email`, `image`, `username`, `password`, `group_id`) VALUES
(1, 'ahmed sharaf', 1, 'a.sharaf@be-capital.com', '', 'admin', '88326122b923be10c6b1dbfe118867c886b15c49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `hits` int(11) DEFAULT '0',
  `home` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
