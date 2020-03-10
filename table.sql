
CREATE TABLE `xxx_relation` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) NOT NULL,
  `article_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `xxx_author` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(150) NOT NULL,
  `sname` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `xxx_article` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `active` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
