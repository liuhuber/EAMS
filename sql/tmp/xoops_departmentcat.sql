-- phpMyAdmin SQL Dump
-- version 2.11.10.1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: Dec 30, 2010, 02:29 PM
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
-- 資料表格式： `xoops_departmentcat`
--

CREATE TABLE `xoops_departmentcat` (
  `department` smallint(3) unsigned NOT NULL auto_increment,
  `department_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`department`)
) TYPE=MyISAM ;
