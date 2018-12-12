/*
 Navicat MySQL Data Transfer

 Source Server         : 本地机
 Source Server Type    : MySQL
 Source Server Version : 80012
 Source Host           : localhost
 Source Database       : pinping

 Target Server Type    : MySQL
 Target Server Version : 80012
 File Encoding         : utf-8

 Date: 12/07/2018 00:34:08 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `mx_catch_cookie`
-- ----------------------------
DROP TABLE IF EXISTS `mx_catch_cookie`;
CREATE TABLE `mx_catch_cookie` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `auth` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `userid` int(11) NOT NULL,
  `time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `mx_catch_resumes_limit`
-- ----------------------------
DROP TABLE IF EXISTS `mx_catch_resumes_limit`;
CREATE TABLE `mx_catch_resumes_limit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `total` int(11) DEFAULT NULL COMMENT '总页数',
  `now` int(11) DEFAULT NULL COMMENT '现在抓取page',
  `status` tinyint(1) DEFAULT NULL COMMENT '是否抓取完成 0:新建 1:完成 2：抓取失败',
  `resumes_list` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

SET FOREIGN_KEY_CHECKS = 1;
