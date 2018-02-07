-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 12, 2016 at 02:38 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`user_id`, `username`, `fullname`, `password`, `email`, `status`) VALUES
(1, 'admin', 'Administrator', '21232f297a57a5a743894a0e4a801fc3', 'admin@dit.com', 'Y'),
(2, 'ram', 'ram thapa', '4641999a7679fcaef2df0e26d11e3c72', 'info@ram.com', 'Y'),
(3, 'ram', 'ram thapa', '4641999a7679fcaef2df0e26d11e3c72', 'info@ram.com', 'Y'),
(4, 'ram', 'ram thapa', '4641999a7679fcaef2df0e26d11e3c72', 'info@ram.com', 'Y'),
(5, 'ram', 'ram thapa', '4641999a7679fcaef2df0e26d11e3c72', 'info@ram.com', 'Y'),
(6, 'ram', 'ram thapa', '4641999a7679fcaef2df0e26d11e3c72', 'info@ram.com', 'Y'),
(7, 'ram', 'ram thapa', '4641999a7679fcaef2df0e26d11e3c72', 'info@ram.com', 'Y'),
(10, 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 'bishnu_pandey14@yahoo.com', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) NOT NULL,
  `total_votes` int(11) NOT NULL,
  `total_points` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `userName`, `total_votes`, `total_points`) VALUES
(1, 'admin', 1, 4),
(2, 'ram', 1, 4),
(3, '', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `std_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `remarks` text NOT NULL,
  `gender` varchar(50) NOT NULL,
  PRIMARY KEY (`std_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `name`, `age`, `address`, `dob`, `status`, `remarks`, `gender`) VALUES
(1, 'Shyam', 24, 'KTM', '2013-07-12', 'Y', 'This is remarks', 'F'),
(8, 'Dinesh', 34, 'fasf asdfsad', '0000-00-00', 'Y', '', 'F'),
(7, 'shayam', 34, 'asklfj', '2052-10-13', 'Y', '', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cms`
--

CREATE TABLE IF NOT EXISTS `tbl_cms` (
  `cms_id` int(11) NOT NULL AUTO_INCREMENT,
  `cms_title` varchar(255) NOT NULL,
  `cms_description` text NOT NULL,
  `cms_date` date NOT NULL,
  `cms_order` int(11) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`cms_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_cms`
--

INSERT INTO `tbl_cms` (`cms_id`, `cms_title`, `cms_description`, `cms_date`, `cms_order`, `status`) VALUES
(4, 'Courses', '<p>Adv .PHP</p>\r\n<p>JAVA</p>\r\n<p>Android</p>', '2015-03-12', 3, 'Y'),
(5, 'Aboutus', '<p>kkkkkk</p>', '2015-03-13', 4, 'Y'),
(2, 'Features', 'Our Features\r\n1) Best\r\n3) laksjfa', '2010-02-02', 1, 'Y'),
(3, 'Facilities', 'Facilities FacilitiesFacilitiesFacilitiesFacilitiesFacilities FacilitiesFacilitiesFacilitiesFacilities FacilitiesFacilitiesFacilitiesFacilitiesFacilitiesFacilitiesFacilitiesFacilitiesFacilities', '2010-02-02', 2, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_title` varchar(255) NOT NULL,
  `image_description` text NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_date` date NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`image_id`, `image_title`, `image_description`, `image_name`, `image_date`, `status`) VALUES
(3, 'yyy', 'hjgj', 'img_2015022637401545.JPG', '2056-10-10', 'Y'),
(4, 'kjhk', 'jhgj', 'img_20150910802382875.JPG', '0000-00-00', 'Y'),
(5, 'pop', 'pp', 'img_201509108463147214.jpg', '0000-00-00', ''),
(6, 'popu', 'kkk', 'img_201509105631813920.jpg', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) NOT NULL,
  `news_reporter` varchar(255) NOT NULL,
  `news_description` text NOT NULL,
  `news_date` date NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `news_title`, `news_reporter`, `news_description`, `news_date`, `remarks`, `status`) VALUES
(1, 'Today it was raining', 'Ram', 'Today it was rainingToday it was raining Today it was raining. Today it was rainingToday it was raining Today it was rainingToday it was rainingToday it was raining Today it was rainingToday it was rainingToday it was raining Today it was rainingToday it was rainingToday it was raining Today it was rainingToday it was rainingToday it was raining Today it was rainingToday it was rainingToday it was raining Today it was rainingToday it was rainingToday it was raining Today it was rainingToday it was rainingToday it was raining Today it was rainingToday it was rainingToday it was raining Today it was rainingToday it was rainingToday it was raining Today it was rainingToday it was rainingToday it was raining Today it was rainingToday it was rainingToday it was raining Today it was rainingToday it was rainingToday it was raining Today it was rainingToday it was rainingToday it was raining Today it was rainingToday it was rainingToday it was raining Today it was raining', '2013-07-22', '', 'Y'),
(2, 'Three people killed', 'Subash Neupane', '4 people killed', '2060-09-09', '', 'N');
