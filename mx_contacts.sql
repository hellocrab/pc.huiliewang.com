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

 Date: 18/12/2018 15:59:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for mx_contacts
-- ----------------------------
DROP TABLE IF EXISTS `mx_contacts`;
CREATE TABLE `mx_contacts`  (
  `contacts_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '联系人id',
  `creator_role_id` int(10) NULL DEFAULT NULL COMMENT '创建者岗位id',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '姓名',
  `post` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '客户联系人岗位',
  `department` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '客户联系人部门',
  `sex` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '联系人性别',
  `saltname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '尊称',
  `telephone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '手机',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `qq_no` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `contacts_address` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '地址',
  `zip_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `create_time` int(10) NULL DEFAULT NULL COMMENT '创建时间',
  `update_time` int(10) NULL DEFAULT NULL COMMENT '信息更新时间',
  `is_deleted` int(1) NOT NULL DEFAULT 0 COMMENT '是否被删除',
  `delete_role_id` int(10) NULL DEFAULT NULL,
  `delete_time` int(10) NULL DEFAULT NULL,
  `gender` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '性别',
  `role` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '角色',
  `crm_zswstr` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '男' COMMENT '性别',
  `crm_dbxxve` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '重要' COMMENT '重要程度',
  `crm_dlxhnj` decimal(18, 2) NOT NULL DEFAULT 0.00 COMMENT '绩效',
  `job_type_text` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'job_type_text',
  PRIMARY KEY (`contacts_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 22308 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '本表存放客户联系人对应关系信息' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for mx_contacts_data
-- ----------------------------
DROP TABLE IF EXISTS `mx_contacts_data`;
CREATE TABLE `mx_contacts_data`  (
  `contacts_id` int(10) NOT NULL,
  `ceshi` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `last_time` int(10) NOT NULL,
  `last_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `constellation` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `hobby` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`contacts_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
