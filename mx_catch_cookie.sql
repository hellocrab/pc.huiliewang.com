/*
 Navicat Premium Data Transfer

 Source Server         : 测试机
 Source Server Type    : MySQL
 Source Server Version : 50636
 Source Host           : 192.168.116.27:3306
 Source Schema         : pinping

 Target Server Type    : MySQL
 Target Server Version : 50636
 File Encoding         : 65001

 Date: 18/12/2018 15:58:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for mx_catch_cookie
-- ----------------------------
DROP TABLE IF EXISTS `mx_catch_cookie`;
CREATE TABLE `mx_catch_cookie`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `token` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `auth` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `userid` int(11) NOT NULL,
  `time` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14935 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for mx_catch_cookie1
-- ----------------------------
DROP TABLE IF EXISTS `mx_catch_cookie1`;
CREATE TABLE `mx_catch_cookie1`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `token` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `auth` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `userid` int(11) NOT NULL,
  `time` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7922 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for mx_catch_cookie2
-- ----------------------------
DROP TABLE IF EXISTS `mx_catch_cookie2`;
CREATE TABLE `mx_catch_cookie2`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `token` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `auth` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `userid` int(11) NOT NULL,
  `time` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11886 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for mx_catch_cooperation_limit
-- ----------------------------
DROP TABLE IF EXISTS `mx_catch_cooperation_limit`;
CREATE TABLE `mx_catch_cooperation_limit`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `total` int(11) NULL DEFAULT NULL COMMENT '总页数',
  `now` int(11) NULL DEFAULT NULL COMMENT '现在抓取page',
  `status` tinyint(1) NULL DEFAULT NULL COMMENT '是否抓取完成 0:新建 1:完成 2：抓取失败',
  `cooperation_list` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `time` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1425 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for mx_catch_customer_limit
-- ----------------------------
DROP TABLE IF EXISTS `mx_catch_customer_limit`;
CREATE TABLE `mx_catch_customer_limit`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `total` int(11) NULL DEFAULT NULL COMMENT '总页数',
  `now` int(11) NULL DEFAULT NULL COMMENT '现在抓取page',
  `status` tinyint(1) NULL DEFAULT NULL COMMENT '是否抓取完成 0:新建 1:完成 2：抓取失败',
  `customer_list` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `time` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4596 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for mx_catch_project_limit
-- ----------------------------
DROP TABLE IF EXISTS `mx_catch_project_limit`;
CREATE TABLE `mx_catch_project_limit`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `total` int(11) UNSIGNED NULL DEFAULT 0 COMMENT '总页数',
  `now` int(11) UNSIGNED NULL DEFAULT 0 COMMENT '现在抓取page',
  `status` tinyint(1) UNSIGNED NULL DEFAULT 0 COMMENT '是否抓取完成 0:新建 1:完成 2：抓取失败',
  `project_list` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `time` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for mx_catch_resumes_limit
-- ----------------------------
DROP TABLE IF EXISTS `mx_catch_resumes_limit`;
CREATE TABLE `mx_catch_resumes_limit`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `total` int(11) NULL DEFAULT NULL COMMENT '总页数',
  `now` int(11) NULL DEFAULT NULL COMMENT '现在抓取page',
  `status` tinyint(1) NULL DEFAULT NULL COMMENT '是否抓取完成 0:新建 1:完成 2：抓取失败',
  `resumes_list` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `time` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13806 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
