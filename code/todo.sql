/*
Navicat MySQL Data Transfer

Source Server         : mysql5.7
Source Server Version : 50726
Source Host           : 127.0.0.1:3306
Source Database       : todo

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2020-06-09 11:21:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for apply
-- ----------------------------
DROP TABLE IF EXISTS `apply`;
CREATE TABLE `apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `uid` int(11) NOT NULL COMMENT '被申请用户id userid',
  `sid` int(11) NOT NULL COMMENT '好友申请人id',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `text` varchar(255) DEFAULT NULL COMMENT '附言',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of apply
-- ----------------------------
INSERT INTO `apply` VALUES ('2', '1', '3', '1', '2222');
INSERT INTO `apply` VALUES ('3', '2', '1', '1', null);

-- ----------------------------
-- Table structure for todos
-- ----------------------------
DROP TABLE IF EXISTS `todos`;
CREATE TABLE `todos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `todo` text COLLATE utf8_unicode_ci,
  `user_id` int(10) unsigned NOT NULL,
  `complete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of todos
-- ----------------------------
INSERT INTO `todos` VALUES ('1', '1111', '11111111', '2', '0', '2020-06-04 12:09:30', '2020-06-04 12:09:32');
INSERT INTO `todos` VALUES ('2', '222', '222222', '2', '1', '2020-06-04 16:11:48', '2020-06-04 16:11:48');
INSERT INTO `todos` VALUES ('13', '21312', 'wdsa', '1', '0', '2020-06-04 14:47:27', '2020-06-04 14:47:27');
INSERT INTO `todos` VALUES ('14', '2321321', '321321321', '1', '1', '2020-06-04 16:12:40', '2020-06-04 16:12:40');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'zhangsan', 'brad@gmail.com', 'zhangsan', 'e10adc3949ba59abbe56e057f20f883e', '2020-06-03 13:14:31');
INSERT INTO `users` VALUES ('2', 'lisi', 'jdoe@gmail.com', 'lisi', 'e10adc3949ba59abbe56e057f20f883e', '2020-06-03 14:12:14');
INSERT INTO `users` VALUES ('3', 'wangwu', 'wangwu@gmail.com', 'wangwu', 'e10adc3949ba59abbe56e057f20f883e', '2020-06-04 17:36:28');
INSERT INTO `users` VALUES ('4', 'maliu', 'maliu@gmail.com', 'maliu', 'e10adc3949ba59abbe56e057f20f883e', '2020-06-04 17:46:14');
