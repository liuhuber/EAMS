CREATE TABLE `authorization` (
  `uname` varchar(10) NOT NULL COMMENT '使用者',
  `assign` varchar(1) NOT NULL default 'N' COMMENT '指派',
  `evaluation` varchar(1) NOT NULL default 'N' COMMENT '評估',
  `sign_mis` varchar(1) NOT NULL default 'N' COMMENT '情系部簽核',
  `sign_fin` varchar(1) NOT NULL default 'N' COMMENT '財會小組簽核',
  `acceptance` varchar(1) NOT NULL default 'N' COMMENT '使用者驗收',
  `transport` varchar(1) NOT NULL default 'N' COMMENT '轉正式環境',
  `sysadm` varchar(1) NOT NULL default 'N',
  `close` varchar(1) NOT NULL default 'N' COMMENT '結案',
  `eva_m` varchar(1) NOT NULL default 'A' COMMENT '評估模組',
  PRIMARY KEY  (`uname`)
) TYPE=MyISAM COMMENT='流程權限控制表';

CREATE TABLE `categorycat` (
  `category` smallint(2) unsigned NOT NULL auto_increment,
  `cname` varchar(12) NOT NULL,
  PRIMARY KEY  (`category`)
) TYPE=MyISAM ;

CREATE TABLE `companycat` (
  `company` smallint(3) unsigned NOT NULL auto_increment,
  `cname` varchar(24) NOT NULL,
  PRIMARY KEY  (`company`)
) TYPE=MyISAM ;

CREATE TABLE `consultantcat` (
  `consultant` tinyint(4) unsigned NOT NULL auto_increment,
  `cname` varchar(12) NOT NULL,
  PRIMARY KEY  (`consultant`)
) TYPE=MyISAM ;

CREATE TABLE `departmentcat` (
  `department` smallint(2) unsigned NOT NULL auto_increment,
  `dname` varchar(20) NOT NULL,
  PRIMARY KEY  (`department`)
) TYPE=MyISAM ;

CREATE TABLE `modulecat` (
  `module` smallint(2) unsigned NOT NULL auto_increment,
  `mname` varchar(30) NOT NULL,
  PRIMARY KEY  (`module`)
) TYPE=MyISAM ;

CREATE TABLE `prioritycat` (
  `priority` smallint(1) unsigned NOT NULL auto_increment,
  `pname` varchar(8) NOT NULL,
  PRIMARY KEY  (`priority`)
) TYPE=MyISAM ;

CREATE TABLE `projectcat` (
  `project` smallint(2) unsigned NOT NULL auto_increment,
  `pname` varchar(30) NOT NULL,
  PRIMARY KEY  (`project`)
) TYPE=MyISAM  ;

CREATE TABLE `reqtypecat` (
  `reqtype` smallint(2) unsigned NOT NULL auto_increment,
  `rname` varchar(12) NOT NULL,
  PRIMARY KEY  (`reqtype`)
) ENGINE=MyISAM ;

CREATE TABLE `statecat` (
  `state` smallint(2) unsigned NOT NULL auto_increment,
  `sname` varchar(30) NOT NULL,
  `snote` varchar(60) default NULL,
  PRIMARY KEY  (`state`)
) ENGINE=MyISAM ;

CREATE TABLE x111_requireform (
  sn int(10) NOT NULL auto_increment,
  id varchar(12) NOT NULL,
  state smallint(2) unsigned NOT NULL default '1',
  project smallint(2) unsigned NOT NULL default '1',
  priority smallint(1) unsigned NOT NULL default '2',
  company smallint(3) unsigned NOT NULL default '1',
  receive_date datetime default NULL,
  submitter_fullname varchar(20) default NULL,
  date_raised date default NULL,
  department smallint(3) unsigned NOT NULL default '0',
  target_date date default NULL,
  originator varchar(20) default NULL,
  phone varchar(18) default NULL,
  needdep smallint(3) unsigned NOT NULL default '0',
  email varchar(30) default NULL,
  dep_manager varchar(20) default NULL,
  referenceid varchar(16) default NULL,
  headline varchar(160) default NULL,
  content varchar(1024) default NULL,
  assign_date datetime default NULL,
  est_start datetime default NULL,
  est_finish date default NULL,
  service_level varchar(4) default '中' COMMENT '緊急/高/中/低',
  module varchar(12) default NULL,
  crossteam varchar(2) default NULL,
  category varchar(12) default NULL,
  owner_fullname varchar(12) default NULL,
  reqtype varchar(12) default NULL,
  owner_crossteam varchar(12) default NULL,
  con_evaluation varchar(12) default NULL,
  con_abaper varchar(12) default NULL,
  con_con varchar(12) default NULL,
  con_basis varchar(12) default NULL,
  min_evaluation smallint(4) default NULL,
  min_abaper smallint(4) default NULL,
  min_con smallint(4) default NULL,
  min_basis smallint(4) default NULL,
  sum_min smallint(4) default NULL,
  sum_hour smallint(4) default NULL,
  possible_solutions varchar(8192) default NULL,
  resolution varchar(20) default NULL,
  requestid varchar(120) default NULL,
  inform_date datetime default NULL,
  transport_date datetime default NULL,
  workhour_date datetime default NULL,
  amsclose_date datetime default NULL,
  infoclose_date datetime default NULL,
  action_entry varchar(60) default NULL,
  action_entry2 varchar(60) default NULL,
  action_entry3 varchar(60) default NULL,
  flag varchar(1) NOT NULL default 'N',
  PRIMARY KEY  (id),
  UNIQUE KEY sn (sn)
) TYPE=MyISAM ;





