CREATE TABLE IF NOT EXISTS `pinterest` (
  `id` int(11) NOT NULL auto_increment,
  `user` int(255) NOT NULL,
  `url` varchar(255) collate utf8_unicode_ci NOT NULL,
  `title` varchar(255) collate utf8_unicode_ci NOT NULL,
  `p_av` varchar(255) collate utf8_unicode_ci NOT NULL,
  `clicks` int(255) NOT NULL default '0',
  `active` int(11) NOT NULL default '0',
  `cpc` int(11) NOT NULL default '2',
  `country` varchar(64) NOT NULL default '0',
  `sex` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `active` (`active`),
  KEY `cpc` (`cpc`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `pinterested` (
  `user_id` int(255) NOT NULL,
  `site_id` int(255) NOT NULL,
  INDEX ( `site_id` )
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;