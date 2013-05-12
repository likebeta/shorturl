/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : shorturl

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2013-05-12 22:01:57
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `urlinfo`
-- ----------------------------
DROP TABLE IF EXISTS `urlinfo`;
CREATE TABLE `urlinfo` (
  `shorturl` varchar(16) NOT NULL,
  `srcurl` text NOT NULL,
  `jump` int(1) NOT NULL DEFAULT '0',
  `userid` int(4) DEFAULT NULL,
  `custom` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`shorturl`),
  KEY `userid_key` (`userid`),
  CONSTRAINT `userid_key` FOREIGN KEY (`userid`) REFERENCES `userinfo` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of urlinfo
-- ----------------------------
INSERT INTO urlinfo VALUES ('tr0iww', 'http://www.google.com', '0', null, '0');

-- ----------------------------
-- Table structure for `userinfo`
-- ----------------------------
DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE `userinfo` (
  `userid` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` text NOT NULL,
  `email` text,
  `token` text,
  `domain` text,
  `signintime` datetime NOT NULL,
  `lasttime` datetime NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of userinfo
-- ----------------------------
INSERT INTO userinfo VALUES ('1', 'likebeta', '359359', 'huangdi915103@gmail.com', '7d6209b86032a5eef9952abac184dea9', 'likebeta', '2013-05-04 21:26:24', '2013-05-04 21:26:31');
