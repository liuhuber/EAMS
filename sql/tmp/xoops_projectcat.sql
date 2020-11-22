-- phpMyAdmin SQL Dump
-- version 2.11.10.1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: Dec 30, 2010, 02:31 PM
-- 伺服器版本: 5.0.45
-- PHP 版本: 5.3.3


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `ams`
--

-- --------------------------------------------------------

--
-- 資料表格式： `xoops_projectcat`
--

CREATE TABLE `xoops_projectcat` (
  `project_id` smallint(2) unsigned NOT NULL auto_increment,
  `project_name` varchar(30) NOT NULL,
  PRIMARY KEY  (`project_id`)
) TYPE=MyISAM ;
