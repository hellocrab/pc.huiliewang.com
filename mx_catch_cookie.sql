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

 Date: 06/12/2018 20:26:44
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
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mx_catch_cookie
-- ----------------------------
INSERT INTO `mx_catch_cookie` VALUES (19, 'bd2412aebdff49b3ad59233a9d4fb23c', 'bd2412aebdff49b3ad59233a9d4fb23c', 0, 4929, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mx_catch_resumes_limit
-- ----------------------------
INSERT INTO `mx_catch_resumes_limit` VALUES (16, 164463, 1, 0, '5c090e9811498928b1b42ed5,5c090e517042f720e4614870,5c090e267042f720e4614869,5b189c5b7042f723f5368b89,5b2206eb7042f709f31a1d5a,5b39999d7042f761b80d78c9,5c090d7b11498928b1b42ebf,5c090d727042f720e4614852,5c08b85c11498928b1b42631,5c090d3d7042f720e4614851,5c08f3f57042f720e46146d7,5c090d087042f720e461484e,5c090cc411498928b1b42eb6,5c090cc311498928b1b42eb5,5c079fc111498928b1b41030,5c090c477042f720e461484c,5bb850a05620a10f184dd7cb,5bc38e52496d138e8c2556ed,5bba884f5620a10f184fa890,5c090bd511498928b1b42eb2', '2018-12-06 19:57:19');

SET FOREIGN_KEY_CHECKS = 1;
