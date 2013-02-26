-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2013 at 09:29 PM
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
  `country` varchar(255) NOT NULL,
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
  `member_id` int(10) unsigned NOT NULL DEFAULT '0',
  `friend_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `tags`, `caption`, `access`, `share_type`, `password`, `owner_id`, `member_id`, `friend_id`) VALUES
(3, 'Defalut', '', '', 0, 0, '', 0, 3, 0),
(10, 'Default', '', '', 0, 0, '', 0, 10, 0),
(103, 'Album2', '', '', 0, 0, '', 0, 3, 0),
(104, 'Empty', '', '', 0, 0, '', 0, 3, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `product_id` int(10) unsigned NOT NULL DEFAULT '0',
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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `member_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `title`, `parent_id`, `member_id`) VALUES
(1, 'f1', 0, 0),
(2, 'c1', 1, 0),
(3, 'c2', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `friends_members`
--

CREATE TABLE IF NOT EXISTS `friends_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `gals`
--

INSERT INTO `gals` (`id`, `caption`, `image`, `quantity`, `tags`, `location`, `scale`, `crop_info`, `position`, `member_id`, `product_id`, `album_id`, `project_id`) VALUES
(55, '', '98b47_11.jpg', 1, '', '', 1, '', 0, 0, 0, 3, 0),
(56, '', '87003_12.jpg', 1, '', '', 1, '', 0, 0, 0, 3, 0),
(57, '', 'f4a46_13.jpg', 1, '', '', 1, '', 0, 0, 0, 3, 0),
(58, '', '36f57_14.jpg', 1, '', '', 1, '', 0, 0, 0, 3, 0),
(59, '', '18f26_2.jpg', 1, '', '', 1, '', 0, 0, 0, 3, 0),
(60, '', '62a51_CR7.jpg', 1, '', '', 1, '', 0, 0, 0, 3, 0),
(61, '', '29aec_11.jpg', 1, '', '', 1, '', 0, 0, 0, 3, 0),
(62, '', 'cbe93_12.jpg', 1, '', '', 1, '', 0, 0, 0, 3, 0),
(63, '', '03afe_13.jpg', 1, '', '', 1, '', 0, 0, 0, 3, 0),
(65, '', '8a8c6_CR7.jpg', 1, '', '', 1, '', 0, 0, 0, 3, 0),
(66, '', '06393_11.jpg', 1, '', '', 1, '', 0, 0, 0, 3, 0),
(67, '', '9dbc8_12.jpg', 1, '', '', 1, '', 0, 0, 0, 3, 0),
(68, '', '91fdd_13.jpg', 1, '', '', 1, '', 0, 0, 0, 3, 0),
(69, '', '05e08_14.jpg', 1, '', '', 1, '', 0, 0, 0, 3, 0),
(70, '', 'ff4bd_CR7.jpg', 1, '', '', 1, '', 0, 0, 0, 3, 0),
(71, '', 'a3a59_12.jpg', 1, '', '', 1, '', 0, 0, 0, 3, 0),
(72, '', 'c798a_13.jpg', 1, '', '', 1, '', 0, 0, 0, 3, 0),
(73, '', '86912_14.jpg', 1, '', '', 1, '', 0, 0, 0, 3, 0),
(80, '', '71c12_12.jpg', 1, '', '', 1, '', 0, 0, 0, 11, 0),
(81, '', '8c1ac_13.jpg', 1, '', '', 1, '', 0, 0, 0, 11, 0),
(82, '', '54716_14.jpg', 1, '', '', 1, '', 0, 0, 0, 11, 0),
(83, '', '315e3_CR7.jpg', 1, '', '', 1, '', 0, 0, 0, 11, 0),
(86, '', '35126_11.jpg', 1, '', '', 1, '', 0, 0, 0, 71, 0),
(87, '', 'b7533_12.jpg', 1, '', '', 1, '', 0, 0, 0, 71, 0),
(88, '', '97aa1_13.jpg', 1, '', '', 1, '', 0, 0, 0, 71, 0),
(89, '', '887a6_14.jpg', 1, '', '', 1, '', 0, 0, 0, 71, 0),
(90, '', 'd8aa4_CR7.jpg', 1, '', '', 1, '', 0, 0, 0, 71, 0),
(91, '', 'ec557_12.jpg', 1, '', '', 1, '', 0, 0, 0, 78, 0),
(92, '', '650fb_13.jpg', 1, '', '', 1, '', 0, 0, 0, 78, 0),
(93, '', 'f21e6_14.jpg', 1, '', '', 1, '', 0, 0, 0, 78, 0),
(94, '', '7c842_11.jpg', 1, '', '', 1, '', 0, 0, 0, 103, 0),
(95, '', 'a8e53_12.jpg', 1, '', '', 1, '', 0, 0, 0, 103, 0),
(96, '', '73b88_13.jpg', 1, '', '', 1, '', 0, 0, 0, 103, 0),
(97, '', '5defb_14.jpg', 1, '', '', 1, '', 0, 0, 0, 103, 0),
(98, '', '0693c_CR7.jpg', 1, '', '', 1, '', 0, 0, 0, 103, 0);

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
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `birthdate`, `gender`, `email`, `password`, `confirm_code`, `confirmed`, `confirmed_date`, `newsletter`, `type`, `last_login`, `parent_id`) VALUES
(3, 'Ahmed Sharaf', '0000-00-00', 1, 'a.sharaf@shift.com.eg', '123', '5112b119-cc0c-4ce7-ac4b-0ddf10737dc0', 1, '0000-00-00 00:00:00', 1, 0, '0000-00-00 00:00:00', 0),
(10, 'Ahmed Sharaf', '0000-00-00', 1, 'sharaf.developer@gmail.com', '123', '5112d59a-fe40-421e-9dd0-172f10737dc0', 1, '0000-00-00 00:00:00', 1, 0, '0000-00-00 00:00:00', 0);

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `price` int(10) unsigned NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `project_image` varchar(255) NOT NULL,
  `top_image` varchar(255) NOT NULL,
  `middle_image` varchar(255) NOT NULL,
  `bottom_image` varchar(255) NOT NULL,
  `slide_image` varchar(255) NOT NULL,
  `hot_image` varchar(255) NOT NULL,
  `min_images` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `max_images` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `crop_width` int(10) unsigned NOT NULL DEFAULT '0',
  `crop_height` int(10) unsigned NOT NULL DEFAULT '0',
  `crop_ratio` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `home` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hot` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '0',
  `home_position` int(10) unsigned NOT NULL DEFAULT '0',
  `section_id` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  `member_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `body`, `price`, `hits`, `project_image`, `top_image`, `middle_image`, `bottom_image`, `slide_image`, `hot_image`, `min_images`, `max_images`, `crop_width`, `crop_height`, `crop_ratio`, `home`, `hot`, `meta_title`, `meta_keywords`, `meta_description`, `position`, `home_position`, `section_id`, `parent_id`, `member_id`) VALUES
(6, 'Gadget child', '', 0, 0, '', '', '', '', '', '', 1, 1, 0, 0, 1, 0, 0, '', '', '', 0, 0, 4, 5, 0),
(7, 'Mug1 Parent', '<p>any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;</p>', 100, 0, 'dd658_gallery.jpg', '2ec35_pro_large.jpg', '35a5a_pro_medium.jpg', '30563_pro_medium.jpg', '681d9_gallery.jpg', 'b4b35_discount.jpg', 1, 1, 100, 100, 1, 0, 0, 'Meta Title', 'Meta Keywords', 'Meta Description', 0, 0, 1, 0, 0),
(8, 'Mug1 Child1', '<p>any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;</p>', 110, 0, '0bc6c_gallery.jpg', '209b0_pro_large.jpg', '032c2_pro_medium.jpg', 'b5515_pro_medium.jpg', 'd379f_gallery.jpg', '38bc8_discount.jpg', 1, 1, 100, 100, 1, 0, 0, 'Meta Title', 'Meta Keywords', 'Meta Description', 0, 0, 1, 7, 0),
(9, 'Mug1 Child2', '<p>any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;</p>', 90, 0, 'ffdc2_gallery.jpg', '2aa48_pro_large.jpg', '9cb95_pro_medium.jpg', 'd1c67_pro_medium.jpg', 'b44c9_gallery.jpg', '0d7b9_discount.jpg', 1, 1, 100, 100, 1, 0, 0, 'Meta Title', 'Meta Keywords', 'Meta Description', 0, 0, 1, 7, 0),
(10, 'Mug2 Parent', '<p>any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;</p>', 200, 0, '5c354_gallery.jpg', 'dfae8_pro_large.jpg', '7e88c_pro_medium.jpg', 'fa0a1_pro_medium.jpg', '4227a_gallery.jpg', 'ddd54_discount.jpg', 1, 1, 100, 100, 1, 0, 0, 'Meta Title', 'Meta Keywords', 'Meta Description', 0, 0, 1, 0, 0),
(11, 'Mug2 Child1', '<p>any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;</p>', 210, 0, '8bf68_gallery.jpg', 'e8fec_pro_large.jpg', '8dbc3_pro_medium.jpg', 'e09e1_pro_medium.jpg', '3dece_gallery.jpg', '5b640_discount.jpg', 1, 1, 100, 100, 1, 0, 0, 'Meta Title', 'Meta Keywords', 'Meta Description', 0, 0, 1, 10, 0),
(12, 'Mug2 Child2', '<p>any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;</p>', 220, 0, '42c56_gallery.jpg', 'e0f4e_pro_large.jpg', '26a15_pro_medium.jpg', '3f2ae_pro_medium.jpg', '46c33_gallery.jpg', '7e689_discount.jpg', 1, 1, 100, 100, 1, 0, 0, 'Meta Title', 'Meta Keywords', 'Meta Description', 0, 0, 1, 10, 0),
(13, 'Mug3 Parent', '<p>any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;</p>', 300, 0, '690f3_gallery.jpg', '3ab65_pro_large.jpg', '7a258_pro_medium.jpg', '033f6_pro_medium.jpg', 'b7e3f_gallery.jpg', '55494_discount.jpg', 1, 1, 100, 100, 1, 0, 0, 'Meta Title', 'Meta Keywords', 'Meta Description', 0, 0, 1, 0, 0),
(14, 'Mug3 Child1', '<p>any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;</p>', 310, 0, '663e6_gallery.jpg', '37972_pro_large.jpg', 'dfd60_pro_medium.jpg', '64391_pro_medium.jpg', 'dadaa_gallery.jpg', '1688f_discount.jpg', 1, 1, 100, 100, 1, 0, 0, 'Meta Title', 'Meta Keywords', 'Meta Description', 0, 0, 1, 13, 0),
(15, 'Calendar Parent', '<p>any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;</p>', 500, 0, 'c9b45_gallery.jpg', 'ab926_pro_large.jpg', '86130_pro_medium.jpg', '987db_pro_medium.jpg', '9d3fb_gallery.jpg', '97bc4_discount.jpg', 1, 1, 100, 100, 1, 0, 0, 'Meta Title', 'Meta Keywords', 'Meta Description', 0, 0, 2, 0, 0),
(16, 'Calendar Child', '<p>any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;</p>', 500, 0, '5179f_gallery.jpg', '64b34_pro_large.jpg', 'c288d_pro_medium.jpg', '6435e_pro_medium.jpg', '1b27b_gallery.jpg', '474ac_discount.jpg', 1, 1, 100, 100, 1, 0, 0, 'Meta Title', 'Meta Keywords', 'Meta Description', 0, 0, 2, 15, 0),
(17, 'Photoprint Parent', '<p>any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;</p>', 400, 0, 'e6955_gallery.jpg', '84d27_pro_large.jpg', '05145_pro_medium.jpg', '3c74f_pro_medium.jpg', 'e508e_gallery.jpg', 'ec535_discount.jpg', 1, 20, 100, 100, 1, 0, 0, 'Meta Title', 'Meta Keywords', 'Meta Description', 0, 0, 3, 0, 0),
(18, 'T-shirt1 Parent', '<p>any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;</p>', 100, 0, '91dfb_gallery.jpg', 'a8fa1_pro_large.jpg', 'a1956_pro_medium.jpg', '707b9_pro_medium.jpg', '63d90_gallery.jpg', 'e10f5_discount.jpg', 1, 1, 100, 100, 1, 0, 0, 'Meta Title', 'Meta Keywords', 'Meta Description', 0, 0, 4, 0, 0),
(19, 'T-shirt2 Parent', '<p>any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;</p>', 100, 0, '070b3_gallery.jpg', '625d3_pro_large.jpg', '933fc_pro_medium.jpg', 'f3cf5_pro_medium.jpg', '0c4f9_gallery.jpg', 'e299e_discount.jpg', 1, 1, 100, 100, 1, 0, 0, 'Meta Title', 'Meta Keywords', 'Meta Description', 0, 0, 4, 0, 0),
(20, 'Clothing Parent ', '<p>any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;</p>', 100, 0, '9b36c_gallery.jpg', '31618_pro_large.jpg', '337b6_pro_medium.jpg', '986ce_pro_medium.jpg', '63db2_gallery.jpg', '30f93_discount.jpg', 1, 1, 100, 100, 1, 0, 0, 'Meta Title', 'Meta Keywords', 'Meta Description', 0, 0, 9, 0, 0),
(21, 'Mug Parent', '<p>any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;</p>', 100, 0, '387b5_gallery.jpg', 'cb04f_pro_large.jpg', '6e889_pro_medium.jpg', 'edb34_pro_medium.jpg', '9002f_gallery.jpg', '4018c_discount.jpg', 1, 1, 100, 100, 1, 0, 0, 'Meta Title', 'Meta Keywords', 'Meta Description', 0, 0, 1, 0, 0),
(22, 'Mug Parent', '<p>any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;any description here,&nbsp;</p>', 100, 0, 'c803f_gallery.jpg', '0f8af_pro_large.jpg', '349ed_pro_medium.jpg', 'b6306_pro_medium.jpg', 'a7433_gallery.jpg', '82b80_discount.jpg', 1, 1, 100, 100, 1, 0, 0, 'Meta Title', 'Meta Keywords', 'Meta Description', 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `account` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `cart` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `type` int(1) unsigned NOT NULL DEFAULT '0',
  `quantity` smallint(5) unsigned NOT NULL DEFAULT '1',
  `info` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `color` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `photo_print` tinyint(1) NOT NULL DEFAULT '0',
  `meta_title` varchar(255) NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`, `color`, `image`, `photo_print`, `meta_title`, `meta_keywords`, `meta_description`, `position`) VALUES
(1, 'Mugs', 'E1088B', '2c91f_product_img.png', 0, '', '', '', 5),
(2, 'Calendars', '14e009', '61305_product_img.png', 0, '', '', '', 6),
(3, 'Photo Print', '0951e0', '32890_product_img.png', 1, '', '', '', 8),
(4, 'T-Shirt', 'A73C80', '597c4_product_img.png', 0, '', '', '', 7),
(5, 'Gadgets', '09e017', '60cad_product_img.png', 0, '', '', '', 9),
(6, 'Accessories', '584ee0', '99a50_product_img.png', 0, '', '', '', 3),
(7, 'Canvas', '71e009', '973bd_product_img.png', 0, '', '', '', 4),
(8, 'Stationary', 'e07f09', '1cefb_product_img.png', 0, '', '', '', 1),
(9, 'Clothing', 'e00909', '838a9_product_img.png', 0, '', '', '', 2);

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
(1, 'http://dupix.local', 'sharaf@localhost.com', 'Dupix', '&copy; sh1ft.net', 'Subscription', 'Our company details', 'Our company info', 'zip,rar,pdf,doc,flv', 'jpeg,jpg,gif,png', 20, 3, 1000, 800, 500, 883, 402, 710, 380, 220, 160, 420, 222, 20);

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
(1, 'ahmed sharaf', 1, 'a.sharaf@be-capital.com', '', 'admin', '0f7d73bf447d0404bfc31659790718b9642fd1d2', 0);

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
