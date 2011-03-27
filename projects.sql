-- phpMyAdmin SQL Dump
-- version 2.10.3deb1ubuntu0.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Mar 27, 2011 at 04:32 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.3-1ubuntu6.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `projects`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `clients`
-- 

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `employees`
-- 

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(10) NOT NULL auto_increment,
  `email` varchar(255) NOT NULL,
  `common_name` varchar(255) NOT NULL,
  `type` enum('employee','contractor') NOT NULL default 'employee',
  `mantis_user_id` int(12) NOT NULL,
  `department` enum('developer','producer','account','designer','default_reporter') NOT NULL,
  `title` varchar(250) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=178 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `employees_projects`
-- 

CREATE TABLE IF NOT EXISTS `employees_projects` (
  `id` int(10) NOT NULL auto_increment,
  `employee_id` int(10) NOT NULL,
  `project_id` int(12) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `job_codes`
-- 

CREATE TABLE IF NOT EXISTS `job_codes` (
  `id` int(10) NOT NULL auto_increment,
  `project_id` int(12) NOT NULL,
  `code` int(12) NOT NULL,
  `description` varchar(255) default NULL,
  `initial` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `projects`
-- 

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(12) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `client_id` int(10) NOT NULL,
  `language` enum('php','.net','other') default NULL,
  `dns_dev` varchar(255) default NULL,
  `dns_proto` varchar(255) default NULL,
  `dns_live` varchar(255) default NULL,
  `database_name` varchar(255) default NULL,
  `subversion_url` varchar(255) default NULL,
  `mantis_project_id` int(12) default NULL,
  `wiki_url` varchar(255) NOT NULL,
  `linkchecker` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

