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

 Date: 18/12/2018 15:59:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for mx_resume
-- ----------------------------
DROP TABLE IF EXISTS `mx_resume`;
CREATE TABLE `mx_resume`  (
  `eid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `creator_role_id` int(11) NOT NULL COMMENT '创建者岗位id',
  `creator_role_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建者名字',
  `creator_role_phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '创建者手机',
  `addtime` int(11) NOT NULL,
  `lastupdate` int(11) NOT NULL,
  `file_path` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `isperfect` tinyint(1) NOT NULL DEFAULT 0 COMMENT '优质人选',
  `hits` int(11) NOT NULL COMMENT '浏览次数',
  `status` tinyint(2) NOT NULL COMMENT '简历状态2表示隐藏',
  `integrity` tinyint(3) NOT NULL COMMENT '简历完整度',
  `basic_info` tinyint(1) NOT NULL COMMENT '非必须是否显示',
  `r_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '猎头备注状态',
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '姓名',
  `telephone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '电话',
  `email` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '邮箱',
  `industry` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '期望行业',
  `job_class` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '期望职能',
  `sex` tinyint(1) NOT NULL DEFAULT 0 COMMENT '性别,1:女 2:男 ',
  `edu` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '学历',
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '所在城市',
  `wantsalary` decimal(18, 2) NOT NULL DEFAULT 0.00 COMMENT '期望年薪',
  `url` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `curSalary` decimal(18, 2) NOT NULL DEFAULT 0.00 COMMENT '当前年薪',
  `startWorkyear` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '开始工作时间',
  `birthYear` smallint(5) UNSIGNED NOT NULL DEFAULT 0 COMMENT '出生年',
  `birthMouth` tinyint(2) UNSIGNED NULL DEFAULT 0 COMMENT '出生月份',
  `curCompany` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '目前公司',
  `curDepartment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '目前职位',
  `curPosition` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '目前职位',
  `curStatus` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '求职状态',
  `intentCity` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '意向城市',
  `evaluate` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '优劣势对比',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标签',
  `skill` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '技能',
  `language` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '语言',
  `marital_status` tinyint(1) UNSIGNED NULL DEFAULT 0 COMMENT '婚姻状态 1:未婚 2:已婚 3：保密',
  `wechat_number` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '微信',
  `wechat_qr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '微信',
  `qq_number` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'QQ',
  `microblog` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'weibo',
  `blood_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'blood_type',
  `blood_type_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'blood_type_text',
  `linkedin` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'linkedin',
  `job_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'job_type',
  `job_type_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'job_type_text',
  `now_job_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'now_job_type',
  `now_industry` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'now_industry',
  `expect_job_type_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'expect_job_type_text',
  `expect_city_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'expect_city_text',
  `work_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'work_status',
  `work_status_remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'work_status_remark',
  `secrecy` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'secrecy',
  PRIMARY KEY (`eid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1854576 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '简历主表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for mx_resume_collection
-- ----------------------------
DROP TABLE IF EXISTS `mx_resume_collection`;
CREATE TABLE `mx_resume_collection`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '简历收藏表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for mx_resume_data
-- ----------------------------
DROP TABLE IF EXISTS `mx_resume_data`;
CREATE TABLE `mx_resume_data`  (
  `eid` int(11) NOT NULL,
  `evaluate` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '优劣势对比',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '标签',
  `skill` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '技能',
  `language` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '语言',
  PRIMARY KEY (`eid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for mx_resume_edu
-- ----------------------------
DROP TABLE IF EXISTS `mx_resume_edu`;
CREATE TABLE `mx_resume_edu`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  `starttime` int(10) NOT NULL COMMENT '开始时间',
  `endtime` int(10) NOT NULL COMMENT '结束时间',
  `schoolName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '学校名称',
  `majorName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '专业',
  `school_category` tinyint(1) NULL DEFAULT NULL COMMENT '是否211/985 1:是  0:否',
  `degree` tinyint(1) UNSIGNED NULL DEFAULT 0 COMMENT '学历 1:高中 2:中专 3:大专 4:本科  5:硕士 6:博士 7:MBA/EMBA 8:博士后',
  `recruitment` tinyint(1) NULL DEFAULT NULL COMMENT '是否统招 1:是 2:否',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 622979 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '简历项目表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for mx_resume_languages
-- ----------------------------
DROP TABLE IF EXISTS `mx_resume_languages`;
CREATE TABLE `mx_resume_languages`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `eid` int(11) UNSIGNED NULL DEFAULT 0,
  `language` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '语言',
  `proficiency` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `grade` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `languageOther` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `listen_speak` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `read_write` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 630606 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '人才简历语言' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for mx_resume_project
-- ----------------------------
DROP TABLE IF EXISTS `mx_resume_project`;
CREATE TABLE `mx_resume_project`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `addtime` int(11) NULL DEFAULT NULL,
  `starttime` int(10) NULL DEFAULT NULL COMMENT '开始时间',
  `endtime` int(10) NULL DEFAULT NULL COMMENT '结束时间',
  `proName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '项目名称',
  `proOffice` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '项目职位',
  `proDes` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '项目描述',
  `proCompany` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '所在公司',
  `project_exper_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '项目ID串号',
  `responsibility` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '责任',
  `performance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 742894 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '简历项目表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for mx_resume_work
-- ----------------------------
DROP TABLE IF EXISTS `mx_resume_work`;
CREATE TABLE `mx_resume_work`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `eid` int(11) UNSIGNED NOT NULL,
  `work_exper_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '工作经历ID串号',
  `addtime` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `starttime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '开始时间',
  `endtime` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '结束时间',
  `company` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '公司名称',
  `jobPosition` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '职位',
  `duty` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '责任描述',
  `companyDes` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '公司介绍',
  `depart` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '部门',
  `salary` decimal(10, 2) UNSIGNED NULL DEFAULT NULL COMMENT '薪资 年薪',
  `salary_remark` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '薪资注释',
  `reasons_for_leaving` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '离职原因',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 500058 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '简历项目表' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for mx_resume_work_position
-- ----------------------------
DROP TABLE IF EXISTS `mx_resume_work_position`;
CREATE TABLE `mx_resume_work_position`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `work_id` int(11) UNSIGNED NULL DEFAULT 0 COMMENT '工作ID',
  `position_exper_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '职位ID串号',
  `start_date` int(10) UNSIGNED NULL DEFAULT 0 COMMENT '开始时间',
  `end_date` int(10) UNSIGNED NULL DEFAULT 0 COMMENT '结束时间',
  `position` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '职位',
  `city_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '城市ID',
  `city_text` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '城市名称',
  `report_to` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '报告对象',
  `underling_num` smallint(6) UNSIGNED NULL DEFAULT 0 COMMENT '下属人数',
  `department` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '部门',
  `responsibility` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '负责内容',
  `performance` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1954796 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
