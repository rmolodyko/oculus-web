/*
Navicat MySQL Data Transfer

Source Server         : oculus remote
Source Server Version : 50541
Source Host           : ef907db.mirohost.net:3306
Source Database       : oculus

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2015-02-28 23:01:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_city`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_city`;
CREATE TABLE `tbl_city` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_country` int(11) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text,
  `ts_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `id_country` (`id_country`),
  CONSTRAINT `city_country` FOREIGN KEY (`id_country`) REFERENCES `tbl_country` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_city
-- ----------------------------
INSERT INTO `tbl_city` VALUES ('1', '21', 'Киев', 'Киев', '2015-02-23 07:59:54', '');
INSERT INTO `tbl_city` VALUES ('2', '22', 'Киев1', '213123', '2015-02-27 06:16:57', '');
INSERT INTO `tbl_city` VALUES ('3', '21', 'ewter', 'ertert', '2015-02-27 06:17:03', '');

-- ----------------------------
-- Table structure for `tbl_common`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_common`;
CREATE TABLE `tbl_common` (
  `key` text NOT NULL,
  `val` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_common
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_cost_float`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_cost_float`;
CREATE TABLE `tbl_cost_float` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_place` int(11) unsigned NOT NULL,
  `cost` int(11) NOT NULL,
  `time_start` int(11) NOT NULL COMMENT 'Время начала действия цены',
  `time_finish` int(11) NOT NULL,
  `day` set('sunday','saturday','friday','thursday','wednesday','tuesday','monday') NOT NULL,
  `description` text,
  `ts_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `cost_float_place` (`id_place`),
  CONSTRAINT `cost_float_place` FOREIGN KEY (`id_place`) REFERENCES `tbl_place` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_cost_float
-- ----------------------------
INSERT INTO `tbl_cost_float` VALUES ('1', '1', '111', '0', '0', 'sunday', '111', '2015-02-27 04:57:18', '');
INSERT INTO `tbl_cost_float` VALUES ('2', '1', '111', '0', '0', '', '', '2015-02-27 04:58:49', '');

-- ----------------------------
-- Table structure for `tbl_country`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_country`;
CREATE TABLE `tbl_country` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text,
  `ts_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_country
-- ----------------------------
INSERT INTO `tbl_country` VALUES ('21', 'Украина', 'Украина114', '2015-02-23 07:54:42', '');
INSERT INTO `tbl_country` VALUES ('22', 'Russia', 'Russia', '2015-02-27 06:00:51', '');

-- ----------------------------
-- Table structure for `tbl_employee`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_employee`;
CREATE TABLE `tbl_employee` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `description` text,
  `ts_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_employee
-- ----------------------------
INSERT INTO `tbl_employee` VALUES ('1', 'molodyko13@gmail.com', 'muha1990', 'Ruslan', 'Molodyko', '12312432', 'sdfsdfdsf', '2015-02-23 08:20:16', '');
INSERT INTO `tbl_employee` VALUES ('2', 'lalala@ukr.net', 'ffgdg', 'fdgdfgq', 'etertfdgf', '4545353', 'fgfgfgfg', '2015-02-23 23:13:48', '');

-- ----------------------------
-- Table structure for `tbl_employee2place`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_employee2place`;
CREATE TABLE `tbl_employee2place` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_employee` int(11) unsigned NOT NULL,
  `id_place` int(11) unsigned NOT NULL,
  `description` text,
  `day_work` set('sunday','saturday','friday','thursday','wednesday','tuesday','monday') DEFAULT 'sunday,saturday,friday,thursday,wednesday,tuesday,monday',
  `shift_work` varchar(50) DEFAULT NULL COMMENT 'Смена (На какой смене работает работник)',
  `salary_at_hour` int(11) NOT NULL,
  `salary_rate` int(11) NOT NULL,
  `salary_at_shift` int(11) DEFAULT NULL,
  `ts_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` bit(1) NOT NULL DEFAULT b'1',
  `cost` float unsigned DEFAULT NULL,
  `last_active` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee2place_employee` (`id_employee`),
  KEY `employee2place_place` (`id_place`),
  CONSTRAINT `employee2place_employee` FOREIGN KEY (`id_employee`) REFERENCES `tbl_employee` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `employee2place_place` FOREIGN KEY (`id_place`) REFERENCES `tbl_place` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_employee2place
-- ----------------------------
INSERT INTO `tbl_employee2place` VALUES ('5', '1', '1', '5', 'sunday,saturday,friday,thursday,wednesday,tuesday,monday', '4', '1', '2', '3', '2015-02-27 04:36:22', '', null, '1425190851');
INSERT INTO `tbl_employee2place` VALUES ('6', '2', '1', '1', 'sunday,saturday,friday,thursday,wednesday,tuesday,monday', '1', '1', '1', '1', '2015-02-27 04:37:04', '', '112', '1425192706');

-- ----------------------------
-- Table structure for `tbl_game`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_game`;
CREATE TABLE `tbl_game` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'Продолжительность в секундах',
  `description` text,
  `version` varchar(50) DEFAULT NULL,
  `ts_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_game
-- ----------------------------
INSERT INTO `tbl_game` VALUES ('1', 'Hill', '44', 'dsfsdg', '4', '2015-02-23 08:26:09', '');
INSERT INTO `tbl_game` VALUES ('2', 'tret', '33', 'erwrte', '4', '2015-02-28 21:41:19', '');

-- ----------------------------
-- Table structure for `tbl_game2place`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_game2place`;
CREATE TABLE `tbl_game2place` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_game` int(11) unsigned NOT NULL,
  `id_place` int(11) unsigned NOT NULL,
  `cost` int(11) NOT NULL COMMENT 'Стандартная цена которая не входит в плавающую цену',
  `description` text,
  `ts_create` bigint(20) NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `game2place_game` (`id_game`),
  KEY `game2place_place` (`id_place`),
  CONSTRAINT `game2place_game` FOREIGN KEY (`id_game`) REFERENCES `tbl_game` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `game2place_place` FOREIGN KEY (`id_place`) REFERENCES `tbl_place` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_game2place
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_place`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_place`;
CREATE TABLE `tbl_place` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_city` int(11) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `description` text,
  `ts_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `place_city` (`id_city`),
  CONSTRAINT `place_city` FOREIGN KEY (`id_city`) REFERENCES `tbl_city` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_place
-- ----------------------------
INSERT INTO `tbl_place` VALUES ('1', '1', 'Town', 'DSfgdfg', 'dsfdsf', '2015-02-23 08:08:37', '');
INSERT INTO `tbl_place` VALUES ('2', '1', 'ewrwe', 'werwer', 'werwer', '2015-02-27 06:28:50', '');
INSERT INTO `tbl_place` VALUES ('3', '2', 'werwer', 'eee', 'eeee', '2015-02-27 06:28:58', '');

-- ----------------------------
-- Table structure for `tbl_play`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_play`;
CREATE TABLE `tbl_play` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_bind` int(11) unsigned NOT NULL,
  `id_game` int(11) unsigned NOT NULL,
  `ts` bigint(20) NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'Продолжительность воспроизведения видео в секундах',
  PRIMARY KEY (`id`),
  KEY `play_employee2place` (`id_bind`),
  KEY `play_game` (`id_game`),
  CONSTRAINT `play_game` FOREIGN KEY (`id_game`) REFERENCES `tbl_game` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `play_employee2place` FOREIGN KEY (`id_bind`) REFERENCES `tbl_employee2place` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_play
-- ----------------------------
INSERT INTO `tbl_play` VALUES ('43', '5', '1', '1425190735', '3');
INSERT INTO `tbl_play` VALUES ('44', '5', '2', '1425190738', '3');
INSERT INTO `tbl_play` VALUES ('45', '5', '2', '1425190759', '2');
INSERT INTO `tbl_play` VALUES ('46', '5', '1', '1425190810', '3');
INSERT INTO `tbl_play` VALUES ('47', '5', '2', '1425190812', '2');
INSERT INTO `tbl_play` VALUES ('48', '5', '1', '1425190827', '2');
INSERT INTO `tbl_play` VALUES ('49', '6', '1', '1425192706', '2');

-- ----------------------------
-- Table structure for `tbl_session_employee`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_session_employee`;
CREATE TABLE `tbl_session_employee` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_bind` int(11) unsigned NOT NULL,
  `ts` bigint(20) NOT NULL,
  `action` set('end','start') NOT NULL DEFAULT 'start',
  PRIMARY KEY (`id`),
  KEY `session_employee_employee2place` (`id_bind`),
  CONSTRAINT `session_employee_employee2place` FOREIGN KEY (`id_bind`) REFERENCES `tbl_employee2place` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_session_employee
-- ----------------------------
INSERT INTO `tbl_session_employee` VALUES ('81', '5', '1425190729', 'start');
INSERT INTO `tbl_session_employee` VALUES ('82', '5', '1425190740', 'end');
INSERT INTO `tbl_session_employee` VALUES ('83', '5', '1425190755', 'start');
INSERT INTO `tbl_session_employee` VALUES ('84', '5', '1425190762', 'end');
INSERT INTO `tbl_session_employee` VALUES ('85', '5', '1425190816', 'end');
INSERT INTO `tbl_session_employee` VALUES ('86', '5', '1425190831', 'end');
INSERT INTO `tbl_session_employee` VALUES ('87', '5', '1425190845', 'start');
INSERT INTO `tbl_session_employee` VALUES ('88', '5', '1425190851', 'end');
INSERT INTO `tbl_session_employee` VALUES ('89', '6', '1425192700', 'start');
INSERT INTO `tbl_session_employee` VALUES ('90', '6', '1425192709', 'end');

-- ----------------------------
-- Table structure for `tbl_user`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(80) NOT NULL COMMENT 'Email строго email',
  `password` text NOT NULL,
  `ts_create` bigint(20) NOT NULL COMMENT 'Время регестрации',
  `ts_last_login` bigint(20) NOT NULL COMMENT 'Последний вход',
  `role` set('moderator','admin','client','guest') NOT NULL DEFAULT 'guest' COMMENT 'Роли пользователей',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES ('17', 'molodyko13@gmail.com', '$2a$13$24N/kO0Nbba2gPrVR1hhbuPKJMknXD2N05e9oj9kVS827I3kEFdpq', '1391543452', '1391543452', 'client');
INSERT INTO `tbl_user` VALUES ('87', 'furmanenko@iclaud.com', '$2a$13$SAQ0IxAxd9FEHaIZbhASRuBbjBSFE64ZMgcQPQOCJxNdvYV7OizfK', '1394715961', '1394715961', 'client');
INSERT INTO `tbl_user` VALUES ('88', 'mol@ukr.net', 'muha1990', '1394716093', '1394716093', 'client');
