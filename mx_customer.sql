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

 Date: 18/12/2018 15:59:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for mx_customer
-- ----------------------------
DROP TABLE IF EXISTS `mx_customer`;
CREATE TABLE `mx_customer`  (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '客户id',
  `customer_owner_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '维护人',
  `customer_owner_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'customer_owner_name',
  `customer_owner_en_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `owner_role_id` int(10) NULL DEFAULT NULL COMMENT '所有者岗位',
  `creator_role_id` int(10) NULL DEFAULT NULL COMMENT '创建者id',
  `contacts_id` int(10) NULL DEFAULT 0 COMMENT '首要联系人',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '公司名称',
  `short_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '公司简称',
  `creater` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `origin` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '客户来源',
  `industry` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1' COMMENT '所属行业',
  `industry_text` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '所属行业名称',
  `create_time` int(10) NULL DEFAULT NULL COMMENT '建立时间',
  `update_time` int(10) NULL DEFAULT NULL COMMENT '更新时间',
  `get_time` int(10) NULL DEFAULT NULL COMMENT '领取或分配时间',
  `nextstep_time` int(10) NULL DEFAULT NULL COMMENT '下次联系时间',
  `is_deleted` int(1) NULL DEFAULT 0 COMMENT '是否删除',
  `is_locked` int(1) NULL DEFAULT NULL COMMENT '是否锁定',
  `delete_role_id` int(10) NULL DEFAULT NULL COMMENT '删除人',
  `delete_time` int(10) NULL DEFAULT NULL COMMENT '删除时间',
  `grade` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1' COMMENT '客户等级',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1' COMMENT '所在城市',
  `customer_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '意向客户' COMMENT '客户状态',
  `telephone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '公司电话',
  `introduce` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '公司简介',
  `customer_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '客户编号',
  `location` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '公司地址',
  `crm_sfqxik` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '兴趣爱好',
  `cooperation_code` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'cooperation_code',
  `hr_company_logo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'hr_company_logo',
  `cm_user` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'cm_user',
  `cm_user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'cm_user_name',
  `years_number` tinyint(3) UNSIGNED NULL DEFAULT 0 COMMENT '合作年限',
  PRIMARY KEY (`customer_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 26979 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '本表存放客户的相关信息' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for mx_customer_data
-- ----------------------------
DROP TABLE IF EXISTS `mx_customer_data`;
CREATE TABLE `mx_customer_data`  (
  `customer_id` int(10) UNSIGNED NOT NULL COMMENT '客户id',
  `no_of_employees` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '员工数',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '备注',
  `website` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '公司网址',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '邮箱',
  `fax` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '传真',
  `output_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '客户年产值',
  `competitor` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '客户同行竞争对手',
  `products` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '客户产品',
  `scale` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '客户规模',
  `work_time` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '上班时间',
  `reinsurance` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '福利（保险、公积金）',
  `allowance` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '福利（餐补、车补、住宿）',
  `salary_structure` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '薪资架构',
  `money` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '注册资金',
  `zip` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '邮政编码',
  `busstops` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '公交车站',
  `sdate` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创办时间',
  PRIMARY KEY (`customer_id`) USING BTREE,
  UNIQUE INDEX `customer_id`(`customer_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '客户附表信息' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for mx_customer_record
-- ----------------------------
DROP TABLE IF EXISTS `mx_customer_record`;
CREATE TABLE `mx_customer_record`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL COMMENT '客户',
  `user_id` int(10) NOT NULL COMMENT '用户',
  `start_time` int(10) NOT NULL COMMENT '时间',
  `type` int(10) NOT NULL COMMENT '1：领取 2：分配',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 38 CHARACTER SET = ascii COLLATE = ascii_general_ci COMMENT = '客户记录表' ROW_FORMAT = Fixed;

-- ----------------------------
-- Table structure for mx_customer_share
-- ----------------------------
DROP TABLE IF EXISTS `mx_customer_share`;
CREATE TABLE `mx_customer_share`  (
  `share_id` int(10) NOT NULL AUTO_INCREMENT,
  `share_role_id` int(10) NOT NULL COMMENT '分享人ID',
  `by_sharing_id` int(10) NOT NULL COMMENT '被分享人ID',
  `customer_id` int(10) NOT NULL COMMENT '客户ID',
  `share_time` int(10) NOT NULL COMMENT '分享时间',
  PRIMARY KEY (`share_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 43 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Table structure for mx_r_contacts_customer
-- ----------------------------
DROP TABLE IF EXISTS `mx_r_contacts_customer`;
CREATE TABLE `mx_r_contacts_customer`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `contacts_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 22308 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

SET FOREIGN_KEY_CHECKS = 1;
