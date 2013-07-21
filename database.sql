-- Zhihu Daily Web Portal: Database Structure
-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- 主机: w.rdc.sae.sina.com.cn:3307
-- 生成日期: 2013 年 07 月 21 日 22:02
-- 服务器版本: 5.5.23
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- --------------------------------------------------------

--
-- 表的结构 `zhihudaily_contents`
--

CREATE TABLE IF NOT EXISTS `zhihudaily_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `share_url` varchar(255) NOT NULL,
  `ga_prefix` int(11) NOT NULL,
  `share_image` varchar(255) NOT NULL,
  `image_source` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1687 ;


-- --------------------------------------------------------

--
-- 表的结构 `zhihudaily_top_stories`
--

CREATE TABLE IF NOT EXISTS `zhihudaily_top_stories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_source` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `share_url` varchar(255) NOT NULL,
  `ga_prefix` int(11) NOT NULL,
  `share_image` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1685 ;
