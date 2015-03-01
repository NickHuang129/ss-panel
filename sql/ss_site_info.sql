CREATE TABLE `ss_options` (
  `option_id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into `ss_options`(`option_name`,`option_value`)values('siteurl','http://ss.awolau.com/');

