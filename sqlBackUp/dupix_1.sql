-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 17, 2013 at 01:59 AM
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
-- Table structure for table `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cuntry` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `address` tinytext NOT NULL,
  `phone` varchar(255) NOT NULL,
  `member_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `tags` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `access` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `share_type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `owner_id` int(10) unsigned NOT NULL DEFAULT '0',
  `member_id` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `tags`, `caption`, `access`, `share_type`, `password`, `owner_id`, `member_id`) VALUES
(1, 'Default', '', '', 0, 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `albums_members`
--

CREATE TABLE IF NOT EXISTS `albums_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `containers`
--

CREATE TABLE IF NOT EXISTS `containers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `unit_price` int(10) unsigned NOT NULL DEFAULT '0',
  `quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `order_id` int(10) unsigned NOT NULL DEFAULT '0',
  `project_id` int(10) unsigned NOT NULL DEFAULT '0',
  `prduct_id` int(10) unsigned NOT NULL DEFAULT '0',
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
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `title`, `parent_id`) VALUES
(1, 'f1', 0),
(2, 'c1', 1),
(3, 'c2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `friends_members`
--

CREATE TABLE IF NOT EXISTS `friends_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gals`
--

CREATE TABLE IF NOT EXISTS `gals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `quantity` int(10) unsigned NOT NULL DEFAULT '1',
  `tags` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `scale` smallint(5) unsigned NOT NULL DEFAULT '1',
  `crop_info` varchar(255) NOT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '0',
  `member_id` int(11) unsigned NOT NULL DEFAULT '0',
  `product_id` int(11) unsigned NOT NULL DEFAULT '0',
  `album_id` int(11) unsigned NOT NULL DEFAULT '0',
  `project_id` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gals`
--

INSERT INTO `gals` (`id`, `caption`, `image`, `quantity`, `tags`, `location`, `scale`, `crop_info`, `position`, `member_id`, `product_id`, `album_id`, `project_id`) VALUES
(1, 'mug', '053bc_59c11_monster_mug.jpg', 1, '', '', 1, '', 0, 0, 1, 0, 0);

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
  `birthdate` date NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_code` varchar(255) NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmed_date` datetime NOT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT '1',
  `type` tinyint(4) NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `birthdate`, `gender`, `email`, `password`, `confirm_code`, `confirmed`, `confirmed_date`, `newsletter`, `type`, `last_login`) VALUES
(1, 'm1', '2013-01-15', 1, 'a.sharaf@shift.com.eg', '123', '50f59247-01a4-44d0-a971-13faa343de85', 1, '0000-00-00 00:00:00', 1, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL DEFAULT '0',
  `payment_method` int(1) NOT NULL DEFAULT '1',
  `shipping_method` tinyint(1) NOT NULL DEFAULT '0',
  `pickup_location` varchar(255) NOT NULL,
  `suggested_pickup` datetime NOT NULL,
  `notes` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `closed` datetime NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `member_id` int(11) NOT NULL DEFAULT '0',
  `address_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `price` int(11) NOT NULL,
  `hits` int(11) NOT NULL,
  `min_images` int(11) NOT NULL DEFAULT '1',
  `max_images` int(11) NOT NULL DEFAULT '1',
  `crop_width` int(11) NOT NULL DEFAULT '0',
  `crop_height` int(11) NOT NULL DEFAULT '0',
  `crop_ratio` tinyint(4) NOT NULL DEFAULT '1',
  `home` tinyint(1) NOT NULL DEFAULT '0',
  `hot` tinyint(1) NOT NULL DEFAULT '0',
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `home_position` int(11) NOT NULL DEFAULT '0',
  `section_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `body`, `price`, `hits`, `min_images`, `max_images`, `crop_width`, `crop_height`, `crop_ratio`, `home`, `hot`, `meta_title`, `meta_keywords`, `meta_description`, `position`, `home_position`, `section_id`, `parent_id`) VALUES
(1, 'Mug Parent', '<p>&nbsp;body</p>', 100, 0, 1, 1, 100, 200, 1, 0, 1, '', '', '', 1, 0, 1, 0),
(2, 'Mug Child', '', 0, 0, 1, 1, 0, 0, 1, 0, 0, '', '', '', 2, 0, 1, 1),
(3, 'Mug Child2', '', 0, 0, 1, 1, 0, 0, 1, 0, 0, '', '', '', 3, 0, 1, 1),
(4, 'Calendar Parent', '', 0, 0, 1, 1, 0, 0, 1, 0, 0, '', '', '', 0, 0, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `account` tinyint(1) DEFAULT '1',
  `cart` tinyint(1) DEFAULT '1',
  `type` int(1) NOT NULL DEFAULT '0',
  `quantity` int(11) DEFAULT '1',
  `info` text NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL,
  `member_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
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
  `title` varchar(255) NOT NULL DEFAULT '',
  `color` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `photo_print` tinyint(1) NOT NULL DEFAULT '0',
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text,
  `position` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`, `color`, `image`, `photo_print`, `meta_title`, `meta_keywords`, `meta_description`, `position`) VALUES
(1, 'Mugs', 'E1088B', 'b6530_59c11_monster_mug.jpg', 0, '', '', '', 1),
(2, 'Calendars', '14e009', '', 0, '', '', '', 2),
(3, 'Photo Print', '0951e0', '', 1, '', '', '', 3);

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
(1, 'http://dupix.local', 'sharaf@localhost', 'Dupix', '&copy; sh1ft.net', 'Subscription', 'Our company details', 'Our company info', 'zip,rar,pdf,doc,flv', 'jpeg,jpg,gif,png', 20, 3, 1000, 800, 500, 883, 402, 710, 380, 220, 160, 420, 222, 20);

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
  `title` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `file` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `hits` int(11) DEFAULT '0',
  `home` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
