DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE `tbl_admin` (
  `userid` int(3) NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) NOT NULL,
  `upass` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `avatar` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `uid` int(3) NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) NOT NULL,
  `upass` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `avatar` text NOT NULL,
  `email` text NOT NULL,
  `register` enum('yes','no') NOT NULL,
  `joindate` varchar(50) NOT NULL,
  `lastlog` varchar(50) NOT NULL,
  `iplog` varchar(50) NOT NULL,
  `linkgen` varchar(6) NOT NULL,
  `status` enum('login','logout') NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tbl_safeurl`;
CREATE TABLE `tbl_safeurl` (
  `safeid` int(3) NOT NULL AUTO_INCREMENT,
  `author` varchar(20) NOT NULL,
  `rawurl` text NOT NULL,
  `encodeurl` text NOT NULL,
  `safeurl` text NOT NULL,
  `datecreate` varchar(20) NOT NULL,
  `expired` varchar(20) NOT NULL,
  `auth` enum('yes','no') NOT NULL,
  `authpass` varchar(50) NOT NULL,
  `linkclick` varchar(20) NOT NULL,
  PRIMARY KEY (`safeid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

