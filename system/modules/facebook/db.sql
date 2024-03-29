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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `liked` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `site_id` (`site_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;