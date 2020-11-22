CREATE TABLE `xoops_requireform` (
  `sn` int(10) NOT NULL auto_increment,
  `id` varchar(14) NOT NULL,
  `state` smallint(2) unsigned NOT NULL default '1',
  `project_id` smallint(2) unsigned NOT NULL default '1',
  `priority` smallint(1) unsigned NOT NULL default '2',
  `company` smallint(3) unsigned NOT NULL default '1',
  `receive_date` date default NULL,
  `submitter_fullname` varchar(20) default NULL,
  `date_raised` date default NULL,
  `writedep` smallint(3) unsigned NOT NULL default '0',
  `target_date` date default NULL,
  `originator` varchar(20) default NULL,
  `phone` varchar(18) default NULL,
  `needdep` smallint(3) unsigned NOT NULL default '0',
  `email` varchar(20) default NULL,
  `dep_manager` varchar(20) default NULL,
  `referenceid` varchar(16) default NULL,
  `headline` varchar(60) default NULL,
  `description` varchar(240) default NULL,
  `est_start` date default NULL,
  `est_finish` date default NULL,
  `service_level` smallint(1) default '4',
  `module` varchar(6) default 'BASIS',
  `crossteam` varchar(2) default 'No',
  `category` varchar(8) default NULL,
  `owner_fullname` varchar(12) default NULL,
  `reqtype` varchar(12) default NULL,
  `owner_crossteam` varchar(12) default NULL,
  `con_evaluation` varchar(12) default NULL,
  `con_abaper` varchar(12) default NULL,
  `con_con` varchar(12) default NULL,
  `con_basis` varchar(12) default NULL,
  `min_evaluation` smallint(4) default NULL,
  `min_abaper` smallint(4) default NULL,
  `min_con` smallint(4) default NULL,
  `min_basis` smallint(4) default NULL,
  `min_result` smallint(4) default NULL,
  `hour` smallint(4) default NULL,
  `possible_solutions` varchar(240) default NULL,
  `resolution` varchar(20) default NULL,
  `requestid` varchar(2) default NULL,
  `inform_date` date default NULL,
  `transport_date` date default NULL,
  `workhour_date` date default NULL,
  `amsclose_date` date default NULL,
  `infoclose_date` date default NULL,
  `action_entry` varchar(60) default NULL,
  `action_entry2` varchar(60) default NULL,
  `action_entry3` varchar(60) default NULL,
  PRIMARY KEY  (`sn`),
  UNIQUE KEY `id` (`id`),
  KEY `date_raised` (`date_raised`)
) TYPE=MyISAM ;


CREATE TABLE `xoops_projectcat` (
  `project_id` smallint(2) unsigned NOT NULL auto_increment,
  `project_name` varchar(30) NOT NULL,
  PRIMARY KEY  (`project_id`)
) TYPE=MyISAM ;

CREATE TABLE `xoops_prioritycat` (
  `priority` smallint(1) unsigned NOT NULL auto_increment,
  `priority_name` varchar(8) NOT NULL,
  PRIMARY KEY  (`priority`)
) TYPE=MyISAM ;

CREATE TABLE `xoops_departmentcat` (
  `department` smallint(3) unsigned NOT NULL auto_increment,
  `department_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`department`)
) TYPE=MyISAM ;

CREATE TABLE `xoops_companycat` (
  `company` smallint(3) unsigned NOT NULL auto_increment,
  `company_name` varchar(24) NOT NULL,
  PRIMARY KEY  (`company`)
) TYPE=MyISAM ;