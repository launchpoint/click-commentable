CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL auto_increment,
  `comment_thread_id` int(11) NOT NULL,
  `author_id` int(11) default NULL COMMENT 'users',
  `body` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `screen_name` varchar(200) default NULL,
  `killed_at` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`author_id`,`created_at`,`screen_name`),
  KEY `comment_thread_id` (`comment_thread_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `comment_threads` (
  `id` int(11) NOT NULL auto_increment,
  `object_type` varchar(200) NOT NULL,
  `object_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `closed_at` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `object_type` (`object_type`,`object_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

