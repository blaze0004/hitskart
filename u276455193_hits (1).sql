
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2015 at 12:54 PM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u276455193_hits`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_rewards`
--

CREATE TABLE IF NOT EXISTS `activity_rewards` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `exchanges` int(255) NOT NULL DEFAULT '0',
  `reward` int(255) NOT NULL DEFAULT '0',
  `type` int(32) NOT NULL DEFAULT '0',
  `claims` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `activity_rewards_claims`
--

CREATE TABLE IF NOT EXISTS `activity_rewards_claims` (
  `reward_id` int(255) NOT NULL DEFAULT '0',
  `user_id` int(255) NOT NULL DEFAULT '0',
  `date` int(255) NOT NULL DEFAULT '0',
  KEY `reward_id` (`reward_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ad_packs`
--

CREATE TABLE IF NOT EXISTS `ad_packs` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `days` int(255) NOT NULL DEFAULT '0',
  `bought` int(255) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ad_packs`
--

INSERT INTO `ad_packs` (`id`, `price`, `days`, `bought`, `type`) VALUES
(1, '1.00', 7, 3, 0),
(2, '2.00', 15, 0, 0),
(3, '3.50', 30, 0, 0),
(4, '1.00', 7, 1, 1),
(5, '2.00', 15, 0, 1),
(6, '3.50', 30, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `askfm_like`
--

CREATE TABLE IF NOT EXISTS `askfm_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `today_clicks` int(11) NOT NULL DEFAULT '0',
  `max_clicks` int(11) NOT NULL DEFAULT '0',
  `daily_clicks` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `askfm_like`
--

INSERT INTO `askfm_like` (`id`, `user`, `url`, `title`, `img`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(4, 1, 'http://ask.fm/MegaTraffic/answer/131099037281', 'fdaf', '', 0, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `askfm_liked`
--

CREATE TABLE IF NOT EXISTS `askfm_liked` (
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  UNIQUE KEY `unique_id` (`user_id`,`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `askfm_liked`
--

INSERT INTO `askfm_liked` (`user_id`, `site_id`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `askinger_follow`
--

CREATE TABLE IF NOT EXISTS `askinger_follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `today_clicks` int(11) NOT NULL DEFAULT '0',
  `max_clicks` int(11) NOT NULL DEFAULT '0',
  `daily_clicks` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `askinger_follow`
--

INSERT INTO `askinger_follow` (`id`, `user`, `url`, `title`, `img`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(3, 2, 'http://askinger.net/id100008280788828', 'Chiriță Andreea', '', 0, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `askinger_followed`
--

CREATE TABLE IF NOT EXISTS `askinger_followed` (
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  UNIQUE KEY `unique_id` (`user_id`,`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `askinger_like`
--

CREATE TABLE IF NOT EXISTS `askinger_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `today_clicks` int(11) NOT NULL DEFAULT '0',
  `max_clicks` int(11) NOT NULL DEFAULT '0',
  `daily_clicks` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `askinger_like`
--

INSERT INTO `askinger_like` (`id`, `user`, `url`, `title`, `img`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(1, 2, 'http://askinger.net/id100008280788828/answer/47343249725297138', 'fds', '', 1, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `askinger_liked`
--

CREATE TABLE IF NOT EXISTS `askinger_liked` (
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  UNIQUE KEY `unique_id` (`user_id`,`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL DEFAULT '0',
  `banner_url` varchar(255) NOT NULL,
  `site_url` varchar(255) NOT NULL,
  `views` int(255) NOT NULL DEFAULT '0',
  `clicks` int(255) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `expiration` int(255) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `ban_reasons`
--

CREATE TABLE IF NOT EXISTS `ban_reasons` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL DEFAULT '0',
  `reason` text NOT NULL,
  `date` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `blacklist`
--

CREATE TABLE IF NOT EXISTS `blacklist` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(32) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `value` (`value`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `author` int(255) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `views` int(255) NOT NULL DEFAULT '0',
  `timestamp` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE IF NOT EXISTS `blog_comments` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `bid` int(255) NOT NULL DEFAULT '0',
  `author` int(255) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `timestamp` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `bid` (`bid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `coins_to_cash`
--

CREATE TABLE IF NOT EXISTS `coins_to_cash` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `coins` int(255) NOT NULL DEFAULT '0',
  `cash` decimal(10,2) NOT NULL DEFAULT '0.00',
  `conv_rate` int(64) NOT NULL DEFAULT '0',
  `date` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coins` int(255) NOT NULL DEFAULT '0',
  `uses` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `used` int(255) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `exchanges` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `c_pack`
--

CREATE TABLE IF NOT EXISTS `c_pack` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coins` int(255) NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `c_pack`
--

INSERT INTO `c_pack` (`id`, `name`, `coins`, `price`) VALUES
(1, '999 Coins', 999, '1.00'),
(2, '1000 Coins', 1000, '0.50'),
(3, '5,000 Coins', 5000, '2.50'),
(4, '8,000 Coins', 8000, '3.50'),
(5, '20,000 Coins', 20000, '9.00'),
(6, '37,000 Coins', 37000, '17.00'),
(7, '55,000 Points ', 55000, '25.00');

-- --------------------------------------------------------

--
-- Table structure for table `c_transfers`
--

CREATE TABLE IF NOT EXISTS `c_transfers` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `receiver` int(255) NOT NULL DEFAULT '0',
  `sender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coins` int(255) NOT NULL DEFAULT '0',
  `date` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `facebook`
--

CREATE TABLE IF NOT EXISTS `facebook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `today_clicks` int(255) NOT NULL DEFAULT '0',
  `max_clicks` int(255) NOT NULL DEFAULT '0',
  `daily_clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `type` int(11) NOT NULL DEFAULT '0',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `facebook`
--

INSERT INTO `facebook` (`id`, `user`, `url`, `title`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `type`, `country`, `sex`) VALUES
(1, 1, 'https://www.facebook.com/ithacktips', 'ithacktps', 1, 0, 0, 0, 0, 10, 1, '0', 0),
(2, 2, 'http://clashofclansunlimitedgems.com', 'ggfd', 1, 0, 0, 0, 0, 10, 0, '0', 0),
(3, 2, 'http://xdhax.com', 'sfds', 1, 0, 0, 0, 0, 10, 0, '0', 0),
(5, 2, 'https://www.facebook.com/TheHungerGames', 'fad', 0, 0, 0, 0, 0, 10, 1, '0', 0),
(7, 1, 'http://www.facebook.com/GeekBoy.co', 'geekboy', 0, 0, 0, 0, 0, 10, 1, '0', 0),
(8, 1, 'http://facebook.com/laughingcolours', 'fa', 0, 0, 0, 0, 0, 10, 1, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `fbe_joined`
--

CREATE TABLE IF NOT EXISTS `fbe_joined` (
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  UNIQUE KEY `unique_id` (`user_id`,`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fbp_liked`
--

CREATE TABLE IF NOT EXISTS `fbp_liked` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `site_id` (`site_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fbp_liked`
--

INSERT INTO `fbp_liked` (`user_id`, `site_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fbs_liked`
--

CREATE TABLE IF NOT EXISTS `fbs_liked` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `site_id` (`site_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fb_event`
--

CREATE TABLE IF NOT EXISTS `fb_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `today_clicks` int(11) NOT NULL DEFAULT '0',
  `max_clicks` int(11) NOT NULL DEFAULT '0',
  `daily_clicks` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `fb_photo`
--

CREATE TABLE IF NOT EXISTS `fb_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `today_clicks` int(255) NOT NULL DEFAULT '0',
  `max_clicks` int(255) NOT NULL DEFAULT '0',
  `daily_clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `fb_photo`
--

INSERT INTO `fb_photo` (`id`, `user`, `url`, `title`, `img`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(2, 2, '10153637743199578', 'fas', 'https://scontent.xx.fbcdn.net/hphotos-xfp1/v/t1.0-9/s75x225/11665392_10153637743199578_2226242927137787124_n.jpg?oh=35bc14e68e773f96aaa8d2cbd25199c7&oe=562B48E6', 1, 0, 0, 0, 0, 10, '0', 0),
(3, 2, '847416391982162', 'faf', '', 0, 0, 0, 0, 0, 10, '0', 0),
(4, 2, '888318417891959', 'fase', '', 0, 0, 0, 0, 0, 10, '0', 0),
(5, 2, '819907468066388', 'afda', '', 0, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fb_postcomment`
--

CREATE TABLE IF NOT EXISTS `fb_postcomment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `today_clicks` int(11) NOT NULL DEFAULT '0',
  `max_clicks` int(11) NOT NULL DEFAULT '0',
  `daily_clicks` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `fb_postcommented`
--

CREATE TABLE IF NOT EXISTS `fb_postcommented` (
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  UNIQUE KEY `unique_id` (`user_id`,`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fb_postcommented`
--

INSERT INTO `fb_postcommented` (`user_id`, `site_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fb_postlike`
--

CREATE TABLE IF NOT EXISTS `fb_postlike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `today_clicks` int(11) NOT NULL DEFAULT '0',
  `max_clicks` int(11) NOT NULL DEFAULT '0',
  `daily_clicks` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fb_postlike`
--

INSERT INTO `fb_postlike` (`id`, `user`, `url`, `title`, `img`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(1, 2, '173770089577_10154005819944578', 'fsa', 'https://scontent.xx.fbcdn.net/hprofile-xat1/v/t1.0-1/p50x50/12108090_10153957334889578_627280657113653230_n.jpg?oh=256897a8ab8714991dd999d2063ddcd2&amp;oe=56C32B3F', 1, 0, 0, 0, 0, 10, '0', 0),
(2, 1, '173770089577_10153997785394578', 'dsf', 'https://scontent.xx.fbcdn.net/hprofile-xat1/v/t1.0-1/p50x50/12108090_10153957334889578_627280657113653230_n.jpg?oh=256897a8ab8714991dd999d2063ddcd2&amp;oe=56C32B3F', 0, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fb_postliked`
--

CREATE TABLE IF NOT EXISTS `fb_postliked` (
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  UNIQUE KEY `unique_id` (`user_id`,`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fb_postshare`
--

CREATE TABLE IF NOT EXISTS `fb_postshare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `today_clicks` int(11) NOT NULL DEFAULT '0',
  `max_clicks` int(11) NOT NULL DEFAULT '0',
  `daily_clicks` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `fb_postshare`
--

INSERT INTO `fb_postshare` (`id`, `user`, `url`, `title`, `img`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(18, 2, '173770089577_10154005819944578', 'fad', 'https://scontent.xx.fbcdn.net/hprofile-xat1/v/t1.0-1/p50x50/12108090_10153957334889578_627280657113653230_n.jpg?oh=256897a8ab8714991dd999d2063ddcd2&amp;oe=56C32B3F', 0, 0, 0, 0, 0, 10, '0', 0),
(19, 2, '173770089577_10153997785394578', 'fsdf', 'https://scontent.xx.fbcdn.net/hprofile-xat1/v/t1.0-1/p50x50/12108090_10153957334889578_627280657113653230_n.jpg?oh=256897a8ab8714991dd999d2063ddcd2&amp;oe=56C32B3F', 0, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fb_postshared`
--

CREATE TABLE IF NOT EXISTS `fb_postshared` (
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  UNIQUE KEY `unique_id` (`user_id`,`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fb_share`
--

CREATE TABLE IF NOT EXISTS `fb_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `today_clicks` int(255) NOT NULL DEFAULT '0',
  `max_clicks` int(255) NOT NULL DEFAULT '0',
  `daily_clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `fb_share`
--

INSERT INTO `fb_share` (`id`, `user`, `url`, `title`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(10, 2, 'http://clashofclansunlimitedgems.com', 'fafsf', 1, 0, 0, 0, 0, 10, '0', 0),
(7, 2, 'https://www.youtube.com/watch?v=mUEWjnrg49g', 'fvda', 1, 0, 0, 0, 0, 10, '0', 0),
(8, 2, 'http://www.hitskart.com', 'dsa', 1, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fb_shared`
--

CREATE TABLE IF NOT EXISTS `fb_shared` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `site_id` (`site_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fb_subscribe`
--

CREATE TABLE IF NOT EXISTS `fb_subscribe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `today_clicks` int(255) NOT NULL DEFAULT '0',
  `max_clicks` int(255) NOT NULL DEFAULT '0',
  `daily_clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `fb_subscribe`
--

INSERT INTO `fb_subscribe` (`id`, `user`, `url`, `title`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(8, 2, '100001414288457', 'Muhammad Haris Tyagi', 3, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `followed`
--

CREATE TABLE IF NOT EXISTS `followed` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `google`
--

CREATE TABLE IF NOT EXISTS `google` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL DEFAULT '0',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `today_clicks` int(255) NOT NULL DEFAULT '0',
  `max_clicks` int(255) NOT NULL DEFAULT '0',
  `daily_clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '1',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `google`
--

INSERT INTO `google` (`id`, `user`, `url`, `title`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(2, 2, 'https://plus.google.com/+angrybirds/', 'sas', 1, 0, 0, 0, 0, 10, '0', 0),
(3, 2, 'https://plus.google.com/+angrybirds/posts/twucwsswaq3?pid=6164502775708710434&amp;oid=118177253929143457733', 'ang', 1, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `google_circle`
--

CREATE TABLE IF NOT EXISTS `google_circle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `today_clicks` int(11) NOT NULL DEFAULT '0',
  `max_clicks` int(11) NOT NULL DEFAULT '0',
  `daily_clicks` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `google_circle`
--

INSERT INTO `google_circle` (`id`, `user`, `url`, `title`, `img`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(7, 2, '114607748002331811651', 'fsdf', 'https://lh3.googleusercontent.com/-yaZUBO2QPv8/AAAAAAAAAAI/AAAAAAAAAH4/nB5qKJHsxNI/photo.jpg?sz=50', 1, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `google_circled`
--

CREATE TABLE IF NOT EXISTS `google_circled` (
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  UNIQUE KEY `unique_id` (`user_id`,`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `google_share`
--

CREATE TABLE IF NOT EXISTS `google_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `today_clicks` int(11) NOT NULL DEFAULT '0',
  `max_clicks` int(11) NOT NULL DEFAULT '0',
  `daily_clicks` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `google_share`
--

INSERT INTO `google_share` (`id`, `user`, `url`, `title`, `img`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(1, 2, 'z12uindpmkvxzjsp504cdd5i3ku4ibgp0cw', 'dsf', 'https://lh3.googleusercontent.com/-yaZUBO2QPv8/AAAAAAAAAAI/AAAAAAAAAH4/nB5qKJHsxNI/photo.jpg?sz=50', 1, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `google_shared`
--

CREATE TABLE IF NOT EXISTS `google_shared` (
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  UNIQUE KEY `unique_id` (`user_id`,`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instagram`
--

CREATE TABLE IF NOT EXISTS `instagram` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `inst_id` int(255) NOT NULL DEFAULT '0',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_av` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `active` (`active`),
  KEY `cpc` (`cpc`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `instagram`
--

INSERT INTO `instagram` (`id`, `user`, `inst_id`, `url`, `title`, `p_av`, `clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(2, 2, 1979202045, 'katrinaatcannes', 'Katrina At Cannes', 'https://igcdn-photos-e-a.akamaihd.net/hphotos-ak-xtf1/t51.2885-19/10554186_1632489046982652_1431098989_a.jpg', 1, 0, 10, '0', 0),
(3, 2, 277068506, '_lovekatrinakaif', 'K a t r i n a  K a i f', 'https://igcdn-photos-h-a.akamaihd.net/hphotos-ak-xfa1/t51.2885-19/11325386_978978105445903_728211928_a.jpg', 1, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `instagram_done`
--

CREATE TABLE IF NOT EXISTS `instagram_done` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `site_id` (`site_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inst_liked`
--

CREATE TABLE IF NOT EXISTS `inst_liked` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `site_id` (`site_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inst_likes`
--

CREATE TABLE IF NOT EXISTS `inst_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `inst_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `active` (`active`),
  KEY `cpc` (`cpc`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `inst_likes`
--

INSERT INTO `inst_likes` (`id`, `user`, `inst_id`, `url`, `title`, `photo`, `clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(18, 2, '1013311404443619307_277068506', 'https://instagram.com/p/4QAVqEts_r/', 'fa', 'https://igcdn-photos-d-a.akamaihd.net/hphotos-ak-xaf1/t51.2885-15/11381475_1633833080168491_1211703304_n.jpg', 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `liked`
--

CREATE TABLE IF NOT EXISTS `liked` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `liked`
--

INSERT INTO `liked` (`user_id`, `site_id`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `linkedin`
--

CREATE TABLE IF NOT EXISTS `linkedin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `today_clicks` int(255) NOT NULL DEFAULT '0',
  `max_clicks` int(255) NOT NULL DEFAULT '0',
  `daily_clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `linkedin`
--

INSERT INTO `linkedin` (`id`, `user`, `url`, `title`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(1, 2, 'https://www.linkedin.com/pulse/you-really-good-team-player-alex-malley?trk=prof-post', 'fdaf', 1, 0, 0, 0, 0, 10, '0', 0),
(2, 2, 'http://clashofclansunlimitedgems.com', 'fdaf', 0, 0, 0, 0, 0, 10, '0', 0),
(3, 1, 'https://www.linkedin.com/pulse/rahul-yadav-quits-housingcom-real-time-top-india-news-ramya-venugopal?trk=hp-feed-article-title-hpm', 'rahul', 1, 0, 0, 0, 0, 10, '0', 0),
(4, 1, 'https://www.linkedin.com/pulse/narendra-modi-indian-economys-sachin-tendulkar-has-lot-anuj-puri?trk=hp-feed-article-title-hpm', 'modi', 1, 0, 0, 0, 0, 10, '0', 0),
(5, 1, 'https://www.linkedin.com/pulse/supreme-court-aca-decision-victory-health-america-risa-lavizzo-mourey?trk=hp-feed-article-title-hpm', 'sqa', 1, 0, 0, 0, 0, 10, '0', 0),
(6, 1, 'https://www.linkedin.com/pulse/connect-me-through-your-mobiles-lets-keep-going-narendra-modi?trk=mp-reader-card', 'fa', 0, 0, 0, 0, 0, 10, '0', 0),
(7, 1, 'https://buysellads.com/buy/detail/155702/zone/1283410?utm_source=site_155702', 'sf', 0, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `linked_done`
--

CREATE TABLE IF NOT EXISTS `linked_done` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `list_countries`
--

CREATE TABLE IF NOT EXISTS `list_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(255) NOT NULL DEFAULT '',
  `code` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=221 ;

--
-- Dumping data for table `list_countries`
--

INSERT INTO `list_countries` (`id`, `country`, `code`) VALUES
(1, 'United States', 'US'),
(2, 'United Kingdom', 'UK'),
(3, 'Norway', 'NO'),
(4, 'Greece', 'GR'),
(5, 'Afghanistan', 'AF'),
(6, 'Albania', 'AL'),
(7, 'Algeria', 'DZ'),
(8, 'American Samoa', 'AS'),
(9, 'Andorra', 'AD'),
(10, 'Angola', 'AO'),
(11, 'Anguilla', 'AI'),
(12, 'Antigua & Barbuda', 'AG'),
(13, 'Antilles, Netherlands', 'AN'),
(182, 'Senegal', 'SN'),
(15, 'Argentina', 'AR'),
(16, 'Armenia', 'AM'),
(17, 'Aruba', 'AW'),
(18, 'Australia', 'AU'),
(19, 'Austria', 'AT'),
(20, 'Azerbaijan', 'AZ'),
(21, 'Bahamas, The', 'BS'),
(22, 'Bahrain', 'BH'),
(23, 'Bangladesh', 'BD'),
(24, 'Barbados', 'BB'),
(25, 'Belarus', 'BY'),
(26, 'Belgium', 'BE'),
(27, 'Belize', 'BZ'),
(28, 'Benin', 'BJ'),
(29, 'Bermuda', 'BM'),
(30, 'Bhutan', 'BT'),
(31, 'Bolivia', 'BO'),
(32, 'Bosnia and Herzegovina', 'BA'),
(33, 'Botswana', 'BW'),
(34, 'Brazil', 'BR'),
(35, 'British Virgin Islands', 'VG'),
(36, 'Brunei Darussalam', 'BN'),
(37, 'Bulgaria', 'BG'),
(38, 'Burkina Faso', 'BF'),
(39, 'Burundi', 'BI'),
(40, 'Cambodia', 'KH'),
(41, 'Cameroon', 'CM'),
(42, 'Canada', 'CA'),
(43, 'Cape Verde', 'CV'),
(44, 'Cayman Islands', 'KY'),
(45, 'Central African Republic', 'CF'),
(46, 'Chad', 'TD'),
(47, 'Chile', 'CL'),
(48, 'China', 'CN'),
(49, 'Colombia', 'CO'),
(50, 'Comoros', 'KM'),
(51, 'Congo', 'CG'),
(52, 'Congo', 'CD'),
(53, 'Cook Islands', 'CK'),
(54, 'Costa Rica', 'CR'),
(55, 'Cote D''Ivoire', 'CI'),
(56, 'Croatia', 'HR'),
(57, 'Cuba', 'CU'),
(58, 'Cyprus', 'CY'),
(59, 'Czech Republic', 'CZ'),
(60, 'Denmark', 'DK'),
(61, 'Djibouti', 'DJ'),
(62, 'Dominica', 'DM'),
(63, 'Dominican Republic', 'DO'),
(64, 'East Timor (Timor-Leste)', 'TP'),
(65, 'Ecuador', 'EC'),
(66, 'Egypt', 'EG'),
(67, 'El Salvador', 'SV'),
(68, 'Equatorial Guinea', 'GQ'),
(69, 'Eritrea', 'ER'),
(70, 'Estonia', 'EE'),
(71, 'Ethiopia', 'ET'),
(72, 'Falkland Islands', 'FK'),
(73, 'Faroe Islands', 'FO'),
(74, 'Fiji', 'FJ'),
(75, 'Finland', 'FI'),
(76, 'France', 'FR'),
(77, 'French Guiana', 'GF'),
(78, 'French Polynesia', 'PF'),
(79, 'Gabon', 'GA'),
(80, 'Gambia, the', 'GM'),
(81, 'Georgia', 'GE'),
(82, 'Germany', 'DE'),
(83, 'Ghana', 'GH'),
(84, 'Gibraltar', 'GI'),
(86, 'Greenland', 'GL'),
(87, 'Grenada', 'GD'),
(88, 'Guadeloupe', 'GP'),
(89, 'Guam', 'GU'),
(90, 'Guatemala', 'GT'),
(91, 'Guernsey and Alderney', 'GG'),
(92, 'Guinea', 'GN'),
(93, 'Guinea-Bissau', 'GW'),
(94, 'Guinea, Equatorial', 'GP'),
(95, 'Guiana, French', 'GF'),
(96, 'Guyana', 'GY'),
(97, 'Haiti', 'HT'),
(179, 'San Marino', 'SM'),
(99, 'Honduras', 'HN'),
(100, 'Hong Kong, (China)', 'HK'),
(101, 'Hungary', 'HU'),
(102, 'Iceland', 'IS'),
(103, 'India', 'IN'),
(104, 'Indonesia', 'ID'),
(105, 'Iran, Islamic Republic of', 'IR'),
(106, 'Iraq', 'IQ'),
(107, 'Ireland', 'IE'),
(108, 'Israel', 'IL'),
(109, 'Ivory Coast (Cote d''Ivoire)', 'CI'),
(110, 'Italy', 'IT'),
(111, 'Jamaica', 'JM'),
(112, 'Japan', 'JP'),
(113, 'Jersey', 'JE'),
(114, 'Jordan', 'JO'),
(115, 'Kazakhstan', 'KZ'),
(116, 'Kenya', 'KE'),
(117, 'Kiribati', 'KI'),
(118, 'Korea, (South) Rep. of', 'KR'),
(119, 'Kuwait', 'KW'),
(120, 'Kyrgyzstan', 'KG'),
(121, 'Lao People''s Dem. Rep.', 'LA'),
(122, 'Latvia', 'LV'),
(123, 'Lebanon', 'LB'),
(124, 'Lesotho', 'LS'),
(125, 'Libyan Arab Jamahiriya', 'LY'),
(126, 'Liechtenstein', 'LI'),
(127, 'Lithuania', 'LT'),
(128, 'Luxembourg', 'LU'),
(129, 'Macao, (China)', 'MO'),
(130, 'Macedonia, TFYR', 'MK'),
(131, 'Madagascar', 'MG'),
(132, 'Malawi', 'MW'),
(133, 'Malaysia', 'MY'),
(134, 'Maldives', 'MV'),
(135, 'Mali', 'ML'),
(136, 'Malta', 'MT'),
(137, 'Martinique', 'MQ'),
(138, 'Mauritania', 'MR'),
(139, 'Mauritius', 'MU'),
(140, 'Mexico', 'MX'),
(141, 'Micronesia', 'FM'),
(142, 'Moldova, Republic of', 'MD'),
(143, 'Monaco', 'MC'),
(144, 'Mongolia', 'MN'),
(145, 'Montenegro', 'CS'),
(146, 'Morocco', 'MA'),
(147, 'Mozambique', 'MZ'),
(148, 'Myanmar (ex-Burma)', 'MM'),
(149, 'Namibia', 'NA'),
(150, 'Nepal', 'NP'),
(151, 'Netherlands', 'NL'),
(152, 'New Caledonia', 'NC'),
(153, 'New Zealand', 'NZ'),
(154, 'Nicaragua', 'NI'),
(155, 'Niger', 'NE'),
(156, 'Nigeria', 'NG'),
(157, 'Northern Mariana Islands', 'MP'),
(159, 'Oman', 'OM'),
(160, 'Pakistan', 'PK'),
(161, 'Palestinian Territory', 'PS'),
(162, 'Panama', 'PA'),
(163, 'Papua New Guinea', 'PG'),
(164, 'Paraguay', 'PY'),
(165, 'Peru', 'PE'),
(166, 'Philippines', 'PH'),
(167, 'Poland', 'PL'),
(168, 'Portugal', 'PT'),
(170, 'Qatar', 'QA'),
(171, 'Reunion', 'RE'),
(172, 'Romania', 'RO'),
(173, 'Russian Federation', 'RU'),
(174, 'Rwanda', 'RW'),
(175, 'Saint Kitts and Nevis', 'KN'),
(176, 'Saint Lucia', 'LC'),
(177, 'St. Vincent & the Grenad.', 'VC'),
(178, 'Samoa', 'WS'),
(180, 'Sao Tome and Principe', 'ST'),
(181, 'Saudi Arabia', 'SA'),
(183, 'Serbia', 'RS'),
(184, 'Seychelles', 'SC'),
(185, 'Singapore', 'SG'),
(186, 'Slovakia', 'SK'),
(187, 'Slovenia', 'SI'),
(188, 'Solomon Islands', 'SB'),
(189, 'Somalia', 'SO'),
(220, 'South Africa', 'ZA'),
(190, 'Spain', 'ES'),
(191, 'Sri Lanka (ex-Ceilan)', 'LK'),
(192, 'Sudan', 'SD'),
(193, 'Suriname', 'SR'),
(194, 'Swaziland', 'SZ'),
(195, 'Sweden', 'SE'),
(196, 'Switzerland', 'CH'),
(197, 'Syrian Arab Republic', 'SY'),
(198, 'Taiwan', 'TW'),
(199, 'Tajikistan', 'TJ'),
(200, 'Tanzania, United Rep. of', 'TZ'),
(201, 'Thailand', 'TH'),
(202, 'Togo', 'TG'),
(203, 'Tonga', 'TO'),
(204, 'Trinidad & Tobago', 'TT'),
(205, 'Tunisia', 'TN'),
(206, 'Turkey', 'TR'),
(207, 'Turkmenistan', 'TM'),
(208, 'Uganda', 'UG'),
(209, 'Ukraine', 'UA'),
(210, 'United Arab Emirates', 'AE'),
(211, 'Uruguay', 'UY'),
(212, 'Uzbekistan', 'UZ'),
(213, 'Vanuatu', 'VU'),
(214, 'Venezuela', 'VE'),
(215, 'Viet Nam', 'VN'),
(216, 'Virgin Islands, U.S.', 'VI'),
(217, 'Yemen', 'YE'),
(218, 'Zambia', 'ZM'),
(219, 'Zimbabwe', 'ZW');

-- --------------------------------------------------------

--
-- Table structure for table `module_session`
--

CREATE TABLE IF NOT EXISTS `module_session` (
  `user_id` int(255) NOT NULL DEFAULT '0',
  `page_id` int(255) NOT NULL DEFAULT '0',
  `ses_key` int(255) NOT NULL DEFAULT '0',
  `module` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(255) NOT NULL DEFAULT '0',
  UNIQUE KEY `unique_ses` (`user_id`,`page_id`,`module`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `myspace`
--

CREATE TABLE IF NOT EXISTS `myspace` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `today_clicks` int(255) NOT NULL DEFAULT '0',
  `max_clicks` int(255) NOT NULL DEFAULT '0',
  `daily_clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `myspace`
--

INSERT INTO `myspace` (`id`, `user`, `url`, `title`, `image`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(3, 1, 'tyagiharis370', 'tyagiharis370', 'https://a1-images.myspacecdn.com/images04/10/92befbb14d904cbd931f9366508d3936/600x600.jpg', 0, 0, 0, 0, 0, 10, '0', 0),
(2, 2, 'connectionrock', 'connectionrock', 'https://a1-images.myspacecdn.com/images03/28/31d219c4712b49b5bc2a533636023eac/600x600.jpg', 0, 0, 0, 0, 0, 10, '0', 0),
(4, 1, 'radicalface', 'radicalface', 'https://a3-images.myspacecdn.com/images04/9/441f70233e8f4cd2818a812ee077c332/600x600.jpg', 1, 0, 0, 0, 0, 10, '0', 0),
(5, 1, 'lesliefilms', 'lesliefilms', 'https://a2-images.myspacecdn.com/images03/1/2453914fcf684c75b5664d629de3f1fb/600x600.jpg', 1, 0, 0, 0, 0, 10, '0', 0),
(6, 1, 'garthbrookesfansite', 'garthbrookesfansite', 'https://a1-images.myspacecdn.com/images03/29/72218235422149d0889adae88af58b38/600x600.jpg', 1, 0, 0, 0, 0, 10, '0', 0),
(7, 1, 'hariv', 'hariv', 'https://a1-images.myspacecdn.com/images03/13/73b77834273a4c7db64e5ff18abd2f7b/600x600.jpg', 1, 0, 0, 0, 0, 10, '0', 0),
(8, 1, 'harse', 'harse', 'https://a2-images.myspacecdn.com/images03/33/c475442b1c614b129c349c8f3dbff9c9/600x600.jpg', 1, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `myspaced`
--

CREATE TABLE IF NOT EXISTS `myspaced` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `myspace_accounts`
--

CREATE TABLE IF NOT EXISTS `myspace_accounts` (
  `user` int(255) NOT NULL DEFAULT '0',
  `account_username` varchar(255) NOT NULL,
  KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `myspace_accounts`
--

INSERT INTO `myspace_accounts` (`user`, `account_username`) VALUES
(1, 'tyagiharis370'),
(2, 'tyagiharis370');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE IF NOT EXISTS `offer` (
  `id` double unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(1000) DEFAULT NULL,
  `click` int(10) unsigned DEFAULT '0',
  `reward` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `user`, `click`, `reward`) VALUES
(1, 'doorandlock', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_proofs`
--

CREATE TABLE IF NOT EXISTS `payment_proofs` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `p_id` int(255) NOT NULL DEFAULT '0',
  `u_id` int(255) NOT NULL DEFAULT '0',
  `proof` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `proof_date` int(255) NOT NULL DEFAULT '0',
  `approved` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pinterest`
--

CREATE TABLE IF NOT EXISTS `pinterest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_av` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `active` (`active`),
  KEY `cpc` (`cpc`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pinterest`
--

INSERT INTO `pinterest` (`id`, `user`, `url`, `title`, `p_av`, `clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(1, 2, 'sarabshobe', 'sara shobe (sarabshobe)', 'https://s-media-cache-ak0.pinimg.com/avatars/sarabshobe-1430449263_140.jpg', 1, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pinterested`
--

CREATE TABLE IF NOT EXISTS `pinterested` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `plused`
--

CREATE TABLE IF NOT EXISTS `plused` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plused`
--

INSERT INTO `plused` (`user_id`, `site_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pt_like`
--

CREATE TABLE IF NOT EXISTS `pt_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_av` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `active` (`active`),
  KEY `cpc` (`cpc`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pt_like`
--

INSERT INTO `pt_like` (`id`, `user`, `url`, `title`, `p_av`, `clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(1, 2, '393079873704045515', 'funny cartoons', 'https://s-media-cache-ak0.pinimg.com/736x/d5/47/1a/d5471a47d4b7ecd58148a446a032a68c.jpg', 1, 0, 10, '0', 0),
(2, 2, '393079873703504104', 'funny quotes', 'https://s-media-cache-ak0.pinimg.com/600x315/fa/59/da/fa59dac56032be4dd620482683281a87.jpg', 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pt_liked`
--

CREATE TABLE IF NOT EXISTS `pt_liked` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pt_repin`
--

CREATE TABLE IF NOT EXISTS `pt_repin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_av` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `active` (`active`),
  KEY `cpc` (`cpc`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pt_repin`
--

INSERT INTO `pt_repin` (`id`, `user`, `url`, `title`, `p_av`, `clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(1, 2, '393079873703504104', 'funny quotes', 'https://s-media-cache-ak0.pinimg.com/600x315/fa/59/da/fa59dac56032be4dd620482683281a87.jpg', 1, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pt_repined`
--

CREATE TABLE IF NOT EXISTS `pt_repined` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `p_pack`
--

CREATE TABLE IF NOT EXISTS `p_pack` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `days` int(255) NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `coins_price` int(255) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `p_pack`
--

INSERT INTO `p_pack` (`id`, `name`, `days`, `price`, `coins_price`, `type`) VALUES
(1, '14 Days', 14, '2.00', 0, 0),
(2, '30 Days', 30, '3.00', 0, 0),
(3, '60 Days', 60, '5.00', 0, 0),
(4, '120 Days', 120, '9.00', 0, 0),
(5, '180 Days', 180, '12.50', 0, 0),
(6, '365 Days', 365, '25.00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `page_id` int(255) NOT NULL DEFAULT '0',
  `page_url` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `owner_id` int(255) NOT NULL DEFAULT '0',
  `reported_by` int(255) NOT NULL DEFAULT '0',
  `reason` varchar(128) CHARACTER SET latin1 NOT NULL,
  `count` int(64) NOT NULL DEFAULT '1',
  `module` varchar(64) CHARACTER SET latin1 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `timestamp` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `page_id`, `page_url`, `owner_id`, `reported_by`, `reason`, `count`, `module`, `status`, `timestamp`) VALUES
(1, 5, 'https://www.facebook.com/TheHungerGames', 2, 1, 'gs', 1, 'facebook', 2, 1448423337),
(2, 3, 'http://ask.fm/rahulprasadg/answer/132932151779', 2, 1, 'fsdf', 1, 'askfm_like', 1, 1448423663),
(3, 11, 'http://www.facebook.com/events/199457746875312', 2, 1, 'gfsd', 1, 'fb_event', 1, 1448424989),
(4, 1, 'http://www.facebook.com/photo.php?fbid=908622555861545', 2, 1, 'sadasa', 1, 'fb_photo', 1, 1448425040),
(5, 1, '1010038135693846_1053050661392593', 2, 1, 'dsfasf', 1, 'fb_postcomment', 1, 1448425331),
(6, 2, 'https://plus.google.com/+angrybirds/', 2, 1, 'gfd', 1, 'google', 0, 1448517343);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `paypal` varchar(255) NOT NULL,
  `amount` decimal(5,2) NOT NULL DEFAULT '0.00',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `paid` int(11) NOT NULL DEFAULT '0',
  `gateway` varchar(64) NOT NULL DEFAULT 'paypal',
  `reason` varchar(255) NOT NULL,
  `proof` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `retweet`
--

CREATE TABLE IF NOT EXISTS `retweet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `today_clicks` int(255) NOT NULL DEFAULT '0',
  `max_clicks` int(255) NOT NULL DEFAULT '0',
  `daily_clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `retweet`
--

INSERT INTO `retweet` (`id`, `user`, `url`, `title`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(1, 2, 'https://twitter.com/Montsalvat/status/613961068415549440', 'tweet', 1, 0, 0, 0, 0, 10, '0', 0),
(2, 2, 'https://twitter.com/kabeerraja2000/status/613784382122274816', 'dsf', 1, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `retweeted`
--

CREATE TABLE IF NOT EXISTS `retweeted` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reverbnation`
--

CREATE TABLE IF NOT EXISTS `reverbnation` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `artist_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `today_clicks` int(255) NOT NULL DEFAULT '0',
  `max_clicks` int(255) NOT NULL DEFAULT '0',
  `daily_clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reverbnation`
--

INSERT INTO `reverbnation` (`id`, `user`, `url`, `artist_id`, `title`, `image`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(1, 2, 'https://www.reverbnation.com/atifaslammusic', 2004831, 'tats', 'https://gp1.wac.edgecastcdn.net/802892/production_public/Artist/2004831/image/1318531297_153169068108323_100002456914489_261714_472096659_n.jpg', 1, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reverbnation_accounts`
--

CREATE TABLE IF NOT EXISTS `reverbnation_accounts` (
  `user` int(255) NOT NULL DEFAULT '0',
  `account_name` varchar(255) NOT NULL,
  `account_username` varchar(255) NOT NULL,
  KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reverbnation_accounts`
--

INSERT INTO `reverbnation_accounts` (`user`, `account_name`, `account_username`) VALUES
(1, 'Aquademica', 'aquademica');

-- --------------------------------------------------------

--
-- Table structure for table `reverbnation_done`
--

CREATE TABLE IF NOT EXISTS `reverbnation_done` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `scf`
--

CREATE TABLE IF NOT EXISTS `scf` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `s_av` varchar(255) NOT NULL,
  `s_id` int(255) NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `today_clicks` int(255) NOT NULL DEFAULT '0',
  `max_clicks` int(255) NOT NULL DEFAULT '0',
  `daily_clicks` int(255) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `active` int(11) NOT NULL DEFAULT '0',
  `country` varchar(64) NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `scf`
--

INSERT INTO `scf` (`id`, `user`, `title`, `url`, `s_av`, `s_id`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `cpc`, `active`, `country`, `sex`) VALUES
(15, 2, 'Muhammad Haris Tyagi', 'muhammad-haris-tyagi', 'https://i1.sndcdn.com/avatars-000141272153-3tt4q3-large.jpg', 148401688, 0, 0, 0, 0, 10, 0, '0', 0),
(16, 2, 'Lexie  Blankenship', 'exielankenship', 'https://i1.sndcdn.com/avatars-000141713049-r4z53a-large.jpg', 148795500, 1, 0, 0, 0, 10, 0, '0', 0),
(17, 2, 'ATMASFERA - With ♥  :-)', 'atmasfera', 'https://i1.sndcdn.com/avatars-000164805838-7ordap-large.jpg', 72176263, 0, 0, 0, 0, 10, 0, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `scf_done`
--

CREATE TABLE IF NOT EXISTS `scf_done` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site_config`
--

CREATE TABLE IF NOT EXISTS `site_config` (
  `setting_id` int(10) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `config_value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`setting_id`),
  UNIQUE KEY `config_name` (`config_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=89 ;

--
-- Dumping data for table `site_config`
--

INSERT INTO `site_config` (`setting_id`, `config_name`, `config_value`) VALUES
(1, 'site_name', 'HitsKart.com - Boost your social presence and earn money online'),
(2, 'site_description', 'Best '),
(3, 'site_url', 'http://hitskart.com'),
(4, 'site_email', 'support@hitskart.com'),
(5, 'paypal', 'payment@hitskart.com'),
(6, 'maintenance', '0'),
(7, 'm_progress', '70'),
(8, 'm_twitter', ''),
(9, 'fb_fan_url', ''),
(10, 'free_cpc', '10'),
(11, 'premium_cpc', '20'),
(12, 'daily_bonus', '50'),
(13, 'daily_bonus_vip', '100'),
(14, 'crf_bonus', '0'),
(15, 'surf_time', '20'),
(16, 'surf_time_type', '0'),
(17, 'ref_coins', '300'),
(18, 'reg_coins', '50'),
(19, 'reg_cash', '0.00'),
(20, 'reg_status', '0'),
(21, 'reg_reqmail', '0'),
(22, 'scf_api', 'a49ab8d778deb22ba9eecec8fc8c3a1e'),
(23, 'transfer_status', '2'),
(24, 'transfer_fee', '15'),
(25, 'refsys', '1'),
(26, 'paysys', '0'),
(27, 'ref_cash', '0.10'),
(28, 'ref_sale', '20'),
(29, 'pay_min', '1.00'),
(30, 'surf_type', '2'),
(31, 'currency_code', 'USD'),
(32, 'banner_system', '1'),
(33, 'def_lang', 'en'),
(34, 'more_per_ip', '0'),
(35, 'c_c_limit', '2'),
(36, 'c_v_limit', '5'),
(37, 'surf_fb_skip', '0'),
(38, 'surf_fc_req', '0'),
(39, 'hideref', '2'),
(40, 'c_discount', '20'),
(41, 'c_show_msg', '1'),
(42, 'c_text_index', '20% Discount On All Coins Packs'),
(43, 'payza', 'payment@hitskart.com'),
(44, 'payza_security', '997787'),
(45, 'paypal_status', '1'),
(46, 'payza_status', '1'),
(47, 'captcha_sys', '1'),
(48, 'recaptcha_pub', '6LeKNAcTAAAAAOAjAd92J9wCAuAMZp-DUt1I77C_'),
(49, 'recaptcha_sec', '6LeKNAcTAAAAAEwPEYZ_aFAqEnI4j4IdnvhMiWev'),
(50, 'target_system', '0'),
(51, 'aff_reg_days', '0'),
(52, 'analytics_id', 'UA-64409799-1'),
(53, 'aff_click_req', '10'),
(54, 'paypal_auto', '1'),
(55, 'payza_auto', '1'),
(56, 'report_limit', '10'),
(57, 'mysql_random', '0'),
(58, 'convert_enabled', '0'),
(59, 'convert_rate', '1000'),
(60, 'min_convert', '100'),
(61, 'allow_withdraw', '0'),
(62, 'instagram_id', '5400783981f6474f9570ce04cae9a4cc'),
(63, 'revshare_api', 'aYzqh0nmG66'),
(64, 'fb_app_id', '126774840828161'),
(65, 'fb_app_secret', 'ab34e1e65e38e4db3b166555f8497d56'),
(66, 'auto_country', '1'),
(67, 'blog_comments', '1'),
(68, 'twitter_token', '522167485-80AQeAPVVrF9hv97py8iwnOidvZpYam3jVabO3Jb'),
(69, 'twitter_token_secret', 'iidZdu4sYqq8Rf1SwJCuE8ydf3hjjntaH5MeBSgnkzGvL'),
(70, 'twitter_consumer_key', 'G6zm9e5Y8KxPrZ2uyGUxp5Ntp'),
(71, 'twitter_consumer_secret', 'dluPXv6T9FyqiaxVnzB1R2mj97oaZrDyzgAx4AF1z7Nj5O3Tu9'),
(72, 'yt_api', 'AIzaSyCN8jbhC5px2U9GdJdlkUCSN0A1xZh5xus'),
(73, 'clicks_limit', '0'),
(74, 'proof_required', '1'),
(75, 'aff_req_clicks', '0'),
(76, 'smtp_host', 'localhost'),
(77, 'smtp_port', '25'),
(78, 'smtp_username', ''),
(79, 'smtp_password', ''),
(80, 'smtp_auth', '0'),
(81, 'mail_delivery_method', '0'),
(82, 'solvemedia_c', ''),
(83, 'solvemedia_v', ''),
(84, 'solvemedia_h', ''),
(85, 'noreply_email', 'support@hitskart.com'),
(86, 'license_file', 'TVRRME9UTXdPREF4TlE9PSh8fClOell6WlRVek1tUTNZek0zTldVek5HUmhNemN5WWpnMU4yRTNPR0kwTkRJPSh8fCkofHwpYUdsMGMydGhjblF1WTI5dA=='),
(87, 'theme', 'dark'),
(88, 'gp_api', 'AIzaSyCN8jbhC5px2U9GdJdlkUCSN0A1xZh5xus');

-- --------------------------------------------------------

--
-- Table structure for table `soundcloud_liked`
--

CREATE TABLE IF NOT EXISTS `soundcloud_liked` (
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  UNIQUE KEY `unique_id` (`user_id`,`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soundcloud_likes`
--

CREATE TABLE IF NOT EXISTS `soundcloud_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `today_clicks` int(11) NOT NULL DEFAULT '0',
  `max_clicks` int(11) NOT NULL DEFAULT '0',
  `daily_clicks` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `soundcloud_likes`
--

INSERT INTO `soundcloud_likes` (`id`, `user`, `url`, `p_url`, `title`, `img`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(3, 2, '200650121', 'http://soundcloud.com/atmasfera/where-should-i-go-with-message-atmasfera', 'Atmasfera - Where should I go (Album "Internal")', 'https://i1.sndcdn.com/artworks-000120387406-d3p3q6-large.jpg', 1, 0, 0, 0, 0, 10, '0', 0),
(4, 2, '126740264', 'http://soundcloud.com/atmasfera/07-gucul', 'Atmasfera - Gucul (Album "Integro")', 'https://i1.sndcdn.com/artworks-000106118693-yfeurw-large.jpg', 1, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `soundcloud_played`
--

CREATE TABLE IF NOT EXISTS `soundcloud_played` (
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  UNIQUE KEY `unique_id` (`user_id`,`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soundcloud_plays`
--

CREATE TABLE IF NOT EXISTS `soundcloud_plays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `today_clicks` int(11) NOT NULL DEFAULT '0',
  `max_clicks` int(11) NOT NULL DEFAULT '0',
  `daily_clicks` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `soundcloud_plays`
--

INSERT INTO `soundcloud_plays` (`id`, `user`, `url`, `p_url`, `title`, `img`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(1, 2, '200650121', 'https://api.soundcloud.com/tracks/200650121', 'Atmasfera - Where should I go (Album ', 'https://i1.sndcdn.com/artworks-000120387406-d3p3q6-large.jpg', 2, 0, 0, 0, 0, 5, '0', 0),
(2, 2, '126740264', 'https://api.soundcloud.com/tracks/126740264', 'Atmasfera - Gucul (Album "Integro")', 'https://i1.sndcdn.com/artworks-000106118693-yfeurw-large.jpg', 3, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stumble`
--

CREATE TABLE IF NOT EXISTS `stumble` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `today_clicks` int(255) NOT NULL DEFAULT '0',
  `max_clicks` int(255) NOT NULL DEFAULT '0',
  `daily_clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `active` (`active`),
  KEY `cpc` (`cpc`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stumble`
--

INSERT INTO `stumble` (`id`, `user`, `url`, `title`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(1, 2, 'http://www.stumbleupon.com/stumbler/danevl', 'danevl', 1, 0, 0, 0, 0, 10, '0', 0),
(2, 2, 'http://www.stumbleupon.com/stumbler/ptsrfsalwaysnfor', 'dfad', 1, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stumbled`
--

CREATE TABLE IF NOT EXISTS `stumbled` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `surf`
--

CREATE TABLE IF NOT EXISTS `surf` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `clicks` int(2) NOT NULL DEFAULT '0',
  `today_clicks` int(255) NOT NULL DEFAULT '0',
  `max_clicks` int(255) NOT NULL DEFAULT '0',
  `daily_clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `confirm` int(11) NOT NULL DEFAULT '0',
  `country` varchar(64) NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `surf`
--

INSERT INTO `surf` (`id`, `user`, `url`, `title`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `confirm`, `country`, `sex`) VALUES
(1, 2, 'http://xdhax.com', 'xdhax', 1, 0, 0, 0, 0, 10, 0, '0', 0),
(2, 2, 'http://jsbeautifier.org/', 'jsbeautifier', 2, 0, 0, 0, 0, 10, 0, '0', 0),
(3, 2, 'http://abchax.com', 'abchax', 1, 0, 0, 0, 0, 10, 0, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `surfed`
--

CREATE TABLE IF NOT EXISTS `surfed` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(255) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `gateway` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'paypal',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `paid` int(11) NOT NULL DEFAULT '1',
  `payer_email` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trans_id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `user_ip` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `twitter`
--

CREATE TABLE IF NOT EXISTS `twitter` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `t_id` int(255) NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `today_clicks` int(255) NOT NULL DEFAULT '0',
  `max_clicks` int(255) NOT NULL DEFAULT '0',
  `daily_clicks` int(255) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `active` int(11) NOT NULL DEFAULT '0',
  `country` varchar(64) NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `twitter`
--

INSERT INTO `twitter` (`id`, `user`, `title`, `url`, `t_id`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `cpc`, `active`, `country`, `sex`) VALUES
(5, 2, 'kennedy willyans', '_Kennedy97', 370924332, 1, 0, 0, 0, 10, 0, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `twitter_fav`
--

CREATE TABLE IF NOT EXISTS `twitter_fav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `t_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `today_clicks` int(11) NOT NULL DEFAULT '0',
  `max_clicks` int(11) NOT NULL DEFAULT '0',
  `daily_clicks` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `twitter_fav`
--

INSERT INTO `twitter_fav` (`id`, `user`, `url`, `title`, `t_id`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(2, 2, '662382692147818497', 'sdf', '', 1, 0, 0, 0, 0, 10, '0', 0),
(3, 2, '664027282625851392', 'sdad', '', 1, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `twitter_faved`
--

CREATE TABLE IF NOT EXISTS `twitter_faved` (
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  UNIQUE KEY `unique_id` (`user_id`,`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `twitter_retweet`
--

CREATE TABLE IF NOT EXISTS `twitter_retweet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `today_clicks` int(11) NOT NULL DEFAULT '0',
  `max_clicks` int(11) NOT NULL DEFAULT '0',
  `daily_clicks` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `twitter_retweet`
--

INSERT INTO `twitter_retweet` (`id`, `user`, `url`, `title`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(1, 1, '662382692147818497', 'retweet', 0, 0, 0, 0, 0, 10, '0', 0),
(2, 2, '664027282625851392', 'dsfs', 1, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `twitter_retweeted`
--

CREATE TABLE IF NOT EXISTS `twitter_retweeted` (
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  UNIQUE KEY `unique_id` (`user_id`,`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `twitter_tweet`
--

CREATE TABLE IF NOT EXISTS `twitter_tweet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `today_clicks` int(11) NOT NULL DEFAULT '0',
  `max_clicks` int(11) NOT NULL DEFAULT '0',
  `daily_clicks` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `twitter_tweet`
--

INSERT INTO `twitter_tweet` (`id`, `user`, `url`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(1, 3, 'fsdafdsfasfasffsdfk;hfgsdfmbndfkghsdkfjkjghsfkjhasdfgsdklfsakljhkdjsjgfhhfgsdajsdgfshfsdahfskfhsdagsdkfhjsgfsdhfjsadgfshajfhgajfafhjsafjsdkf', 2, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `twitter_tweeted`
--

CREATE TABLE IF NOT EXISTS `twitter_tweeted` (
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  UNIQUE KEY `unique_id` (`user_id`,`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `twitter_tweet_accounts`
--

CREATE TABLE IF NOT EXISTS `twitter_tweet_accounts` (
  `user` int(255) NOT NULL DEFAULT '0',
  `account_name` varchar(255) NOT NULL,
  `account_username` varchar(255) NOT NULL,
  KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `twitter_tweet_accounts`
--

INSERT INTO `twitter_tweet_accounts` (`user`, `account_name`, `account_username`) VALUES
(1, 'Haris Tyagi', '522167485');

-- --------------------------------------------------------

--
-- Table structure for table `used_coupons`
--

CREATE TABLE IF NOT EXISTS `used_coupons` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL DEFAULT '0',
  `coupon_id` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) DEFAULT NULL,
  `login` varchar(32) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `coins` int(255) NOT NULL DEFAULT '0',
  `account_balance` decimal(10,3) NOT NULL DEFAULT '0.000',
  `premium` int(255) NOT NULL DEFAULT '0',
  `IP` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `log_ip` varchar(32) NOT NULL DEFAULT '0',
  `pass` varchar(32) DEFAULT NULL,
  `ref` int(255) DEFAULT NULL,
  `ref_paid` int(11) NOT NULL DEFAULT '1',
  `signup` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `online` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `newsletter` int(11) NOT NULL DEFAULT '1',
  `promote` int(255) NOT NULL DEFAULT '0',
  `daily_bonus` int(255) NOT NULL DEFAULT '0',
  `activate` int(255) NOT NULL DEFAULT '0',
  `banned` int(11) NOT NULL DEFAULT '0',
  `rec_hash` int(255) NOT NULL DEFAULT '0',
  `country` varchar(64) NOT NULL DEFAULT '0',
  `c_changes` int(11) NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  `warn_message` varchar(255) NOT NULL,
  `warn_expire` int(255) NOT NULL DEFAULT '0',
  `ref_source` varchar(255) NOT NULL DEFAULT '0',
  `offerclick` double NOT NULL DEFAULT '0',
  `offerreward` int(11) NOT NULL DEFAULT '1',
  `reward` int(11) NOT NULL DEFAULT '0',
  `rewardmoney` decimal(10,3) NOT NULL DEFAULT '0.000',
  PRIMARY KEY (`id`),
  KEY `login` (`login`),
  KEY `banned` (`banned`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `login`, `admin`, `coins`, `account_balance`, `premium`, `IP`, `log_ip`, `pass`, `ref`, `ref_paid`, `signup`, `online`, `newsletter`, `promote`, `daily_bonus`, `activate`, `banned`, `rec_hash`, `country`, `c_changes`, `sex`, `warn_message`, `warn_expire`, `ref_source`, `offerclick`, `offerreward`, `reward`, `rewardmoney`) VALUES
(1, 'admin@hitskart.com', 'doorandlock', 1, 60849, '127.614', 1450250637, '117.220.188.10', '117.205.101.244', '025a0f7eb619b498022798200186eafc', NULL, 1, '2015-05-20 12:17:19', '2015-12-05 09:59:52', 1, 0, 0, 0, 0, 0, 'IN', 2, 1, '', 0, '0', 1405, 2, 0, '0.000'),
(2, 'tyagiharis370@gmail.com', 'blaze0004', 1, 714, '0.000', 0, '23.19.26.250', '117.212.116.15', '47642b585770954a10373f9b6d9e5c6e', 1, 1, '2015-05-21 01:47:31', '2015-12-03 09:34:35', 1, 0, 0, 0, 0, 0, 'US', 0, 1, '', 0, 'http://hitskart.com/addurl.php', 115, 2, 0, '0.000'),
(3, 'test@hitskart.com', 'testlogin', 0, 30, '0.000', 0, '117.212.112.41', '71.19.189.10', 'e16b2ab8d12314bf4efbd6203906ea6c', 0, 0, '2015-06-14 06:37:12', '2015-06-19 08:42:11', 0, 0, 0, 0, 0, 0, 'IN', 0, 1, '', 0, 'http://hitskart.com/', 0, 0, 0, '0.000'),
(4, 'jettlockie@ubismail.net', 'temporary', 0, 50, '0.000', 0, '117.212.115.122', '117.212.115.122', '47642b585770954a10373f9b6d9e5c6e', 0, 0, '2015-06-22 11:21:10', '2015-06-22 11:21:30', 1, 0, 0, 0, 0, 0, 'IN', 0, 1, '', 0, 'http://hitskart.com/offer.php', 6, 0, 0, '0.000');

-- --------------------------------------------------------

--
-- Table structure for table `user_clicks`
--

CREATE TABLE IF NOT EXISTS `user_clicks` (
  `uid` int(11) NOT NULL DEFAULT '0',
  `module` varchar(64) NOT NULL,
  `total_clicks` int(255) NOT NULL DEFAULT '0',
  `today_clicks` int(255) NOT NULL DEFAULT '0',
  UNIQUE KEY `unique_stats` (`module`,`uid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_clicks`
--

INSERT INTO `user_clicks` (`uid`, `module`, `total_clicks`, `today_clicks`) VALUES
(2, 'google', 3, 0),
(2, 'facebook', 3, 0),
(2, 'fb_photo', 2, 0),
(1, 'reverbnation', 1, 0),
(2, 'su', 2, 0),
(2, 'surf', 3, 0),
(2, 'twitter', 2, 0),
(2, 'retweet', 2, 0),
(2, 'youtube', 1, 0),
(2, 'yousecond', 1, 0),
(2, 'vk', 1, 0),
(2, 'vk_group', 1, 0),
(2, 'pinterest', 1, 0),
(2, 'pt_repin', 1, 0),
(2, 'pt_like', 1, 0),
(2, 'myspace', 6, 0),
(2, 'linkedin', 4, 0),
(2, 'instagram', 2, 0),
(2, 'inst_likes', 2, 0),
(1, 'scf', 1, 0),
(1, 'ysub', 4, 0),
(1, 'yfav', 1, 0),
(1, 'ylike', 1, 0),
(1, 'fb_share', 3, 0),
(1, 'fb_subscribe', 3, 0),
(1, 'fb_postshare', 2, 0),
(1, 'fb_postlike', 1, 0),
(1, 'google_circle', 1, 0),
(1, 'google_share', 1, 0),
(1, 'fb_postcomment', 1, 0),
(1, 'vine_followers', 2, 0),
(1, 'vine_like', 1, 0),
(1, 'vine_revine', 1, 0),
(1, 'vine_comment', 1, 0),
(1, 'soundcloud_likes', 2, 0),
(1, 'soundcloud_plays', 5, 0),
(1, 'youtube', 1, 0),
(1, 'askfm_like', 1, 0),
(1, 'surf', 1, 0),
(1, 'askinger_follow', 1, 0),
(1, 'askinger_like', 1, 0),
(1, 'twitter', 2, 0),
(1, 'twitter_retweet', 2, 0),
(1, 'twitter_fav', 3, 0),
(1, 'twitter_tweet', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_transactions`
--

CREATE TABLE IF NOT EXISTS `user_transactions` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `value` int(255) NOT NULL DEFAULT '0',
  `cash` decimal(10,2) NOT NULL DEFAULT '0.00',
  `date` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_transactions`
--

INSERT INTO `user_transactions` (`id`, `user_id`, `type`, `value`, `cash`, `date`) VALUES
(1, 1, 0, 999, '1.00', 1434987593),
(2, 1, 0, 999, '1.00', 1435771701),
(3, 1, 0, 999, '1.00', 1444265870),
(4, 1, 1, 14, '2.00', 1449041037);

-- --------------------------------------------------------

--
-- Table structure for table `viewed`
--

CREATE TABLE IF NOT EXISTS `viewed` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vine_comment`
--

CREATE TABLE IF NOT EXISTS `vine_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `today_clicks` int(11) NOT NULL DEFAULT '0',
  `max_clicks` int(11) NOT NULL DEFAULT '0',
  `daily_clicks` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vine_comment`
--

INSERT INTO `vine_comment` (`id`, `user`, `url`, `title`, `img`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(1, 2, '1269019986279194624', 'gfdg', 'http://v.cdn.vine.co/r/videos/C79C96785D1269019200601886720_4543dd7cf22.2.0.2751944390296214571.mp4.jpg?versionId=BN0ZyM_VGKlW5ekZMf5MwJyxb3bXn3V5', 1, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vine_commented`
--

CREATE TABLE IF NOT EXISTS `vine_commented` (
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  UNIQUE KEY `unique_id` (`user_id`,`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vine_followed`
--

CREATE TABLE IF NOT EXISTS `vine_followed` (
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  UNIQUE KEY `unique_id` (`user_id`,`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vine_followers`
--

CREATE TABLE IF NOT EXISTS `vine_followers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `today_clicks` int(11) NOT NULL DEFAULT '0',
  `max_clicks` int(11) NOT NULL DEFAULT '0',
  `daily_clicks` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `vine_followers`
--

INSERT INTO `vine_followers` (`id`, `user`, `url`, `title`, `img`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(14, 2, '906380398727147520', 'sfd', 'https://v.cdn.vine.co/r/avatars/4F145041BF1267926689288736768_906380398727147520_1445271493042_VineAvatar_906380398727147520354702c0b9.jpg?versionId=dQpVArTkD4gT4CKcCPol38tzK9mh7.hv', 1, 0, 0, 0, 0, 10, '0', 0),
(15, 2, '927662224540049408', 'df', 'https://v.cdn.vine.co/r/avatars/6B61DF727E1228844290835402752_33bf4f4b14c.4.1.jpg?versionId=xU.mgs._63Bb2otRJAtAxyXXyUDlZycw', 1, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vine_like`
--

CREATE TABLE IF NOT EXISTS `vine_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `today_clicks` int(11) NOT NULL DEFAULT '0',
  `max_clicks` int(11) NOT NULL DEFAULT '0',
  `daily_clicks` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `vine_like`
--

INSERT INTO `vine_like` (`id`, `user`, `url`, `title`, `img`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(5, 2, '1269019986279194624', 'gfds', 'http://v.cdn.vine.co/r/videos/C79C96785D1269019200601886720_4543dd7cf22.2.0.2751944390296214571.mp4.jpg?versionId=BN0ZyM_VGKlW5ekZMf5MwJyxb3bXn3V5', 1, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vine_liked`
--

CREATE TABLE IF NOT EXISTS `vine_liked` (
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  UNIQUE KEY `unique_id` (`user_id`,`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vine_revine`
--

CREATE TABLE IF NOT EXISTS `vine_revine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(11) NOT NULL DEFAULT '0',
  `today_clicks` int(11) NOT NULL DEFAULT '0',
  `max_clicks` int(11) NOT NULL DEFAULT '0',
  `daily_clicks` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vine_revine`
--

INSERT INTO `vine_revine` (`id`, `user`, `url`, `title`, `img`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(1, 2, '1269019986279194624', 'dsf', 'http://v.cdn.vine.co/r/videos/C79C96785D1269019200601886720_4543dd7cf22.2.0.2751944390296214571.mp4.jpg?versionId=BN0ZyM_VGKlW5ekZMf5MwJyxb3bXn3V5', 1, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vine_revined`
--

CREATE TABLE IF NOT EXISTS `vine_revined` (
  `user_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  UNIQUE KEY `unique_id` (`user_id`,`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vk`
--

CREATE TABLE IF NOT EXISTS `vk` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `url` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `vk_id` int(255) NOT NULL,
  `title` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `vk_photo` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `total_clicks` int(255) NOT NULL DEFAULT '0',
  `max_clicks` int(255) NOT NULL DEFAULT '0',
  `daily_clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '0',
  `country` varchar(64) CHARACTER SET armscii8 NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vk`
--

INSERT INTO `vk` (`id`, `user`, `url`, `vk_id`, `title`, `vk_photo`, `clicks`, `total_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(1, 2, 'oroom', 31836774, '?§?????????? ???????????»??', 'http://cs627125.vk.me/v627125297/6cad/7pYkePF2tnY.jpg', 1, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vkg_done`
--

CREATE TABLE IF NOT EXISTS `vkg_done` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vk_done`
--

CREATE TABLE IF NOT EXISTS `vk_done` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vk_group`
--

CREATE TABLE IF NOT EXISTS `vk_group` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `url` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `vk_id` int(255) NOT NULL,
  `title` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `vk_photo` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `total_clicks` int(255) NOT NULL DEFAULT '0',
  `max_clicks` int(255) NOT NULL DEFAULT '0',
  `daily_clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) CHARACTER SET armscii8 NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vk_group`
--

INSERT INTO `vk_group` (`id`, `user`, `url`, `vk_id`, `title`, `vk_photo`, `clicks`, `total_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(1, 2, 'club66105458', 66105458, 'MLM INTERNATIONAL GROUP', 'http://cs616417.vk.me/v616417726/45f8/Cjx6FuCDyyU.jpg', 1, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `web_stats`
--

CREATE TABLE IF NOT EXISTS `web_stats` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `module_id` varchar(64) NOT NULL,
  `module_name` varchar(64) NOT NULL,
  `value` int(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `module_id` (`module_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `web_stats`
--

INSERT INTO `web_stats` (`id`, `module_id`, `module_name`, `value`) VALUES
(1, 'facebook', 'Facebook Likes', 3),
(2, 'fb_photo', 'FB Photo Likes', 2),
(3, 'fb_share', 'Facebook Share', 3),
(4, 'fb_subscribe', 'Facebook Followers', 3),
(5, 'google', 'Google +1', 3),
(6, 'inst_likes', 'Instagram Likes', 2),
(7, 'instagram', 'Instagram Followers', 2),
(8, 'linkedin', 'LinkedIn Shares', 4),
(9, 'myspace', 'MySpace Connections', 6),
(10, 'pinterest', 'Pinterest Followers', 1),
(11, 'pt_like', 'Pinterest Likes', 1),
(12, 'pt_repin', 'Pinterest Repin', 1),
(13, 'retweet', 'Twitter Tweets', 2),
(14, 'reverbnation', 'Reverbnation Fans', 1),
(15, 'scf', 'Soundcloud Followers', 1),
(16, 'stumble', 'Stumbleupon Followers', 2),
(17, 'surf', 'Traffic Exchange', 4),
(18, 'twitter', 'Twitter Followers', 4),
(19, 'vk', 'VK Pages', 1),
(20, 'vk_group', 'VK Groups', 1),
(21, 'yfav', 'Youtube Favorites', 1),
(22, 'ylike', 'Youtube Likes', 1),
(23, 'yousecond', 'YouSecond Friends', 1),
(24, 'youtube', 'Youtube Views', 2),
(25, 'ysub', 'Youtube Subscribers', 4),
(26, 'askfm_like', 'Ask.fm Like', 1),
(27, 'fb_event', 'Facebook Events', 0),
(28, 'fb_postcomment', 'Facebook Post Comment', 1),
(29, 'fb_postlike', 'Facebook Post Like', 1),
(30, 'fb_postshare', 'Facebook Post Share', 2),
(31, 'google_circle', 'Google+ Circle', 1),
(32, 'google_share', 'Google+ Share', 1),
(33, 'soundcloud_likes', 'SoundCloud Likes', 2),
(34, 'soundcloud_plays', 'SoundCloud Plays', 5),
(35, 'vine_comment', 'Vine Comments', 1),
(36, 'vine_followers', 'Vine Followers', 2),
(37, 'vine_like', 'Vine Likes', 1),
(38, 'vine_revine', 'Vine Revines', 1);

-- --------------------------------------------------------

--
-- Table structure for table `yfav`
--

CREATE TABLE IF NOT EXISTS `yfav` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `today_clicks` int(255) NOT NULL DEFAULT '0',
  `max_clicks` int(255) NOT NULL DEFAULT '0',
  `daily_clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `yfav`
--

INSERT INTO `yfav` (`id`, `user`, `url`, `title`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(1, 1, '1C4lSdJ2MjY', 'Dynamo - Extra Cities Announce', 0, 0, 0, 0, 0, 5, '0', 0),
(2, 1, 'NYhY5z4Vj_c', 'minecraft', 0, 0, 0, 0, 0, 10, '0', 0),
(3, 2, 'i8bF8hEhiKA', 'dumb', 1, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `yfaved`
--

CREATE TABLE IF NOT EXISTS `yfaved` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `yfav_accounts`
--

CREATE TABLE IF NOT EXISTS `yfav_accounts` (
  `user` int(255) NOT NULL DEFAULT '0',
  `account_name` varchar(255) NOT NULL,
  `account_id` varchar(255) NOT NULL,
  `fav_id` varchar(255) NOT NULL,
  KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yfav_accounts`
--

INSERT INTO `yfav_accounts` (`user`, `account_name`, `account_id`, `fav_id`) VALUES
(1, 'Haris Tyagi', 'UCD7JjoePGuVwlXCgHo2Ro1g', 'FLD7JjoePGuVwlXCgHo2Ro1g');

-- --------------------------------------------------------

--
-- Table structure for table `ylike`
--

CREATE TABLE IF NOT EXISTS `ylike` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `today_clicks` int(255) NOT NULL DEFAULT '0',
  `max_clicks` int(255) NOT NULL DEFAULT '0',
  `daily_clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ylike`
--

INSERT INTO `ylike` (`id`, `user`, `url`, `title`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(2, 2, 'nxr2SV5znwI', 'Honest', 1, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `yliked`
--

CREATE TABLE IF NOT EXISTS `yliked` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `yousecond`
--

CREATE TABLE IF NOT EXISTS `yousecond` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `url` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `title` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `today_clicks` int(255) NOT NULL DEFAULT '0',
  `max_clicks` int(255) NOT NULL DEFAULT '0',
  `daily_clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) CHARACTER SET armscii8 NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  `p_av` varchar(255) NOT NULL,
  `ys_id` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `yousecond`
--

INSERT INTO `yousecond` (`id`, `user`, `url`, `title`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`, `p_av`, `ys_id`) VALUES
(1, 2, 'hanny', '-', 0, 0, 0, 0, 0, 10, '0', 0, 'http://yousecond.net/file/pic/user/2012/04/9b010bd85bff53627d6f368826703fd1_50_square.jpg', 13),
(2, 2, 'EwPyTyCoTul', '...', 1, 0, 0, 0, 0, 10, '0', 0, 'http://yousecond.net/file/pic/user/2012/12/2e194734d76fc80a06b0587358ccc06b_50_square.jpg', 27384);

-- --------------------------------------------------------

--
-- Table structure for table `yousecond_done`
--

CREATE TABLE IF NOT EXISTS `yousecond_done` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `youtube`
--

CREATE TABLE IF NOT EXISTS `youtube` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `clicks` int(255) NOT NULL DEFAULT '0',
  `today_clicks` int(255) NOT NULL DEFAULT '0',
  `max_clicks` int(255) NOT NULL DEFAULT '0',
  `daily_clicks` int(255) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `country` varchar(64) NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `youtube`
--

INSERT INTO `youtube` (`id`, `user`, `url`, `title`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `active`, `cpc`, `country`, `sex`) VALUES
(1, 1, 'feZVBD6Hd24', 'ithacktips', 0, 0, 0, 0, 0, 10, '0', 0),
(2, 1, 'WbGgqKatP9w', 'sad', 1, 0, 0, 0, 0, 10, '0', 0),
(3, 2, 'XN1zrRspy7E', 'khamoshiyan', 0, 0, 0, 0, 0, 10, '0', 0),
(4, 2, 'NYhY5z4Vj_c', 'da', 1, 0, 0, 0, 0, 10, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ysub`
--

CREATE TABLE IF NOT EXISTS `ysub` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user` int(255) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `y_av` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(255) NOT NULL,
  `today_clicks` int(255) NOT NULL DEFAULT '0',
  `max_clicks` int(255) NOT NULL DEFAULT '0',
  `daily_clicks` int(255) NOT NULL DEFAULT '0',
  `cpc` int(11) NOT NULL DEFAULT '2',
  `active` int(11) NOT NULL,
  `country` varchar(64) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `sex` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ysub`
--

INSERT INTO `ysub` (`id`, `user`, `title`, `url`, `y_av`, `clicks`, `today_clicks`, `max_clicks`, `daily_clicks`, `cpc`, `active`, `country`, `sex`) VALUES
(4, 2, 'Laughing Colours', 'UCSmC99d8wQvNWbqpGcFVumw', 'https://yt3.ggpht.com/-zhcht4--ZkA/AAAAAAAAAAI/AAAAAAAAAAA/c56Lo5g63m8/s88-c-k-no/photo.jpg', 1, 0, 0, 0, 10, 0, '0', 0),
(2, 2, 'PopularMMOs', 'UCpGdL9Sn3Q5YWUH2DVUW1Ug', 'https://yt3.ggpht.com/-ZTmDqvhaw30/AAAAAAAAAAI/AAAAAAAAAAA/1wk5CSaMbc8/s88-c-k-no/photo.jpg', 1, 0, 0, 0, 10, 0, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ysubed`
--

CREATE TABLE IF NOT EXISTS `ysubed` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
