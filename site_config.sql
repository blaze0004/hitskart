-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2016 at 01:48 AM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hitskart03101996`
--

-- --------------------------------------------------------

--
-- Table structure for table `site_config`
--

CREATE TABLE IF NOT EXISTS `site_config` (
  `setting_id` int(10) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `config_value` text COLLATE utf8_unicode_ci NOT NULL,
  `youtube_watchtime` int(10) NOT NULL DEFAULT '30',
  PRIMARY KEY (`setting_id`),
  UNIQUE KEY `config_name` (`config_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=89 ;

--
-- Dumping data for table `site_config`
--

INSERT INTO `site_config` (`setting_id`, `config_name`, `config_value`, `youtube_watchtime`) VALUES
(1, 'site_name', 'HitsKart.com - Boost your social presence and earn money online', 30),
(2, 'site_description', 'We help you to increase your social presence by giving you free unlimited likes, share, subscriber, followers, views etc. from total 43 network like facebook, google, youtube, instagram etc.', 30),
(3, 'site_url', 'http://hitskart.com', 30),
(4, 'site_email', 'support@hitskart.com', 30),
(5, 'paypal', 'payment@hitskart.com', 30),
(6, 'maintenance', '0', 30),
(7, 'm_progress', '70', 30),
(8, 'm_twitter', '', 30),
(9, 'fb_fan_url', '', 30),
(10, 'free_cpc', '10', 30),
(11, 'premium_cpc', '20', 30),
(12, 'daily_bonus', '200', 30),
(13, 'daily_bonus_vip', '300', 30),
(14, 'crf_bonus', '20', 30),
(15, 'surf_time', '20', 30),
(16, 'surf_time_type', '0', 30),
(17, 'ref_coins', '300', 30),
(18, 'reg_coins', '100', 30),
(19, 'reg_cash', '0.00', 30),
(20, 'reg_status', '0', 30),
(21, 'reg_reqmail', '0', 30),
(22, 'scf_api', 'a49ab8d778deb22ba9eecec8fc8c3a1e', 30),
(23, 'transfer_status', '2', 30),
(24, 'transfer_fee', '15', 30),
(25, 'refsys', '1', 30),
(26, 'paysys', '0', 30),
(27, 'ref_cash', '0.10', 30),
(28, 'ref_sale', '20', 30),
(29, 'pay_min', '1.00', 30),
(30, 'surf_type', '2', 30),
(31, 'currency_code', 'USD', 30),
(32, 'banner_system', '1', 30),
(33, 'def_lang', 'en', 30),
(34, 'more_per_ip', '1', 30),
(35, 'c_c_limit', '2', 30),
(36, 'c_v_limit', '5', 30),
(37, 'surf_fb_skip', '0', 30),
(38, 'surf_fc_req', '0', 30),
(39, 'hideref', '2', 30),
(40, 'c_discount', '20', 30),
(41, 'c_show_msg', '1', 30),
(42, 'c_text_index', '20% Discount On All Coins Packs', 30),
(43, 'payza', 'payment@hitskart.com', 30),
(44, 'payza_security', '997787', 30),
(45, 'paypal_status', '1', 30),
(46, 'payza_status', '1', 30),
(47, 'captcha_sys', '1', 30),
(48, 'recaptcha_pub', '6LeKNAcTAAAAAOAjAd92J9wCAuAMZp-DUt1I77C_', 30),
(49, 'recaptcha_sec', '6LeKNAcTAAAAAEwPEYZ_aFAqEnI4j4IdnvhMiWev', 30),
(50, 'target_system', '0', 30),
(51, 'aff_reg_days', '0', 30),
(52, 'analytics_id', 'UA-64409799-1', 30),
(53, 'aff_click_req', '10', 30),
(54, 'paypal_auto', '1', 30),
(55, 'payza_auto', '1', 30),
(56, 'report_limit', '10', 30),
(57, 'mysql_random', '0', 30),
(58, 'convert_enabled', '0', 30),
(59, 'convert_rate', '1000', 30),
(60, 'min_convert', '100', 30),
(61, 'allow_withdraw', '0', 30),
(62, 'instagram_id', '5400783981f6474f9570ce04cae9a4cc', 30),
(63, 'revshare_api', 'aYzqh0nmG66', 30),
(64, 'fb_app_id', '126774840828161', 30),
(65, 'fb_app_secret', 'ab34e1e65e38e4db3b166555f8497d56', 30),
(66, 'auto_country', '1', 30),
(67, 'blog_comments', '1', 30),
(68, 'twitter_token', '522167485-80AQeAPVVrF9hv97py8iwnOidvZpYam3jVabO3Jb', 30),
(69, 'twitter_token_secret', 'iidZdu4sYqq8Rf1SwJCuE8ydf3hjjntaH5MeBSgnkzGvL', 30),
(70, 'twitter_consumer_key', 'G6zm9e5Y8KxPrZ2uyGUxp5Ntp', 30),
(71, 'twitter_consumer_secret', 'dluPXv6T9FyqiaxVnzB1R2mj97oaZrDyzgAx4AF1z7Nj5O3Tu9', 30),
(72, 'yt_api', 'AIzaSyCN8jbhC5px2U9GdJdlkUCSN0A1xZh5xus', 30),
(73, 'clicks_limit', '0', 30),
(74, 'proof_required', '1', 30),
(75, 'aff_req_clicks', '0', 30),
(76, 'smtp_host', 'localhost', 30),
(77, 'smtp_port', '25', 30),
(78, 'smtp_username', '', 30),
(79, 'smtp_password', '', 30),
(80, 'smtp_auth', '0', 30),
(81, 'mail_delivery_method', '0', 30),
(82, 'solvemedia_c', '', 30),
(83, 'solvemedia_v', '', 30),
(84, 'solvemedia_h', '', 30),
(85, 'noreply_email', 'support@hitskart.com', 30),
(86, 'license_file', 'TVRRMk1qRXdNamcwT1E9PSh8fClOell6WlRVek1tUTNZek0zTldVek5HUmhNemN5WWpnMU4yRTNPR0kwTkRJPSh8fCkofHwpYUdsMGMydGhjblF1WTI5dA==', 30),
(87, 'theme', 'dark', 30),
(88, 'gp_api', 'AIzaSyCN8jbhC5px2U9GdJdlkUCSN0A1xZh5xus', 30);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
