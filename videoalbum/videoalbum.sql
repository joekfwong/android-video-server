CREATE TABLE IF NOT EXISTS video_album_user (
 id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 username varchar(30) COLLATE latin1_general_ci NOT NULL UNIQUE,
 password varchar(128) COLLATE latin1_general_cs NOT NULL,
 createtime timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCCOLLATE=latin1_general_cs REMENT=1;
