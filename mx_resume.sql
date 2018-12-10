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

 Date: 12/07/2018 00:33:20 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `mx_resume`
-- ----------------------------
DROP TABLE IF EXISTS `mx_resume`;
CREATE TABLE `mx_resume` (
  `eid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `creator_role_id` int(11) NOT NULL COMMENT '创建者岗位id',
  `addtime` int(11) NOT NULL,
  `lastupdate` int(11) NOT NULL,
  `file_path` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `isperfect` tinyint(1) NOT NULL DEFAULT '0' COMMENT '优质人选',
  `hits` int(11) NOT NULL COMMENT '浏览次数',
  `status` tinyint(2) NOT NULL COMMENT '简历状态2表示隐藏',
  `integrity` tinyint(3) NOT NULL COMMENT '简历完整度',
  `basic_info` tinyint(1) NOT NULL COMMENT '非必须是否显示',
  `r_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '猎头备注状态',
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '姓名',
  `telephone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '电话',
  `email` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '邮箱',
  `industry` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '期望行业',
  `job_class` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '期望职能',
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别,1:男 2:女 ',
  `edu` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '学历',
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '所在城市',
  `wantsalary` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '期望年薪',
  `url` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `curSalary` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT '当前年薪',
  `startWorkyear` int(10) NOT NULL COMMENT '开始工作时间',
  `birthday` int(10) NOT NULL COMMENT '出生年月',
  `curCompany` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' COMMENT '目前公司',
  `curDepartment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '目前职位',
  `curPosition` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' COMMENT '目前职位',
  `curStatus` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' COMMENT '求职状态',
  `intentCity` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '意向城市',
  `evaluate` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '优劣势对比',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标签',
  `skill` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '技能',
  `language` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '语言',
  `marital_status` tinyint(1) unsigned DEFAULT '0' COMMENT '婚姻状态 1:未婚 2:已婚 3：保密',
  `wechat_number` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '微信',
  `wechat_qr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '微信',
  `qq_number` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'QQ',
  `microblog` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'weibo',
  `blood_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'blood_type',
  `blood_type_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'blood_type_text',
  `linkedin` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'linkedin',
  `job_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'job_type',
  `job_type_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'job_type_text',
  `now_job_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'now_job_type',
  `now_industry` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'now_industry',
  `expect_job_type_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'expect_job_type_text',
  `expect_city_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'expect_city_text',
  `work_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'work_status',
  `work_status_remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'work_status_remark',
  `secrecy` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'secrecy',
  PRIMARY KEY (`eid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=1384590 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='简历主表';

-- ----------------------------
--  Table structure for `mx_resume_collection`
-- ----------------------------
DROP TABLE IF EXISTS `mx_resume_collection`;
CREATE TABLE `mx_resume_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT COMMENT='简历收藏表';

-- ----------------------------
--  Table structure for `mx_resume_data`
-- ----------------------------
DROP TABLE IF EXISTS `mx_resume_data`;
CREATE TABLE `mx_resume_data` (
  `eid` int(11) NOT NULL,
  `evaluate` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '优劣势对比',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '标签',
  `skill` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '技能',
  `language` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '语言',
  PRIMARY KEY (`eid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `mx_resume_edu`
-- ----------------------------
DROP TABLE IF EXISTS `mx_resume_edu`;
CREATE TABLE `mx_resume_edu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  `starttime` int(10) NOT NULL COMMENT '开始时间',
  `endtime` int(10) NOT NULL COMMENT '结束时间',
  `schoolName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '学校名称',
  `majorName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '专业',
  `school_category` tinyint(1) DEFAULT NULL COMMENT '是否211/985 1:是  0:否',
  `degree` tinyint(1) unsigned DEFAULT '0' COMMENT '学历 1:高中 2:中专 3:大专 4:本科  5:硕士 6:博士 7:MBA/EMBA 8:博士后',
  `recruitment` tinyint(1) DEFAULT NULL COMMENT '是否统招 1:是 2:否',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=310 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC COMMENT='简历项目表';

-- ----------------------------
--  Table structure for `mx_resume_project`
-- ----------------------------
DROP TABLE IF EXISTS `mx_resume_project`;
CREATE TABLE `mx_resume_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `addtime` int(11) DEFAULT NULL,
  `starttime` int(10) DEFAULT NULL COMMENT '开始时间',
  `endtime` int(10) DEFAULT NULL COMMENT '结束时间',
  `proName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' COMMENT '项目名称',
  `proOffice` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' COMMENT '项目职位',
  `proDes` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '项目描述',
  `proCompany` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' COMMENT '所在公司',
  `project_exper_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '项目ID串号',
  `responsibility` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci COMMENT '责任',
  `performance` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=1177 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC COMMENT='简历项目表';

-- ----------------------------
--  Table structure for `mx_resume_work`
-- ----------------------------
DROP TABLE IF EXISTS `mx_resume_work`;
CREATE TABLE `mx_resume_work` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `eid` int(11) unsigned NOT NULL,
  `work_exper_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '工作经历ID串号',
  `addtime` int(11) unsigned NOT NULL DEFAULT '0',
  `starttime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '开始时间',
  `endtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '结束时间',
  `company` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '公司名称',
  `jobPosition` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '职位',
  `duty` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '责任描述',
  `companyDes` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '公司介绍',
  `depart` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '部门',
  `salary` decimal(10,2) unsigned DEFAULT NULL COMMENT '薪资 年薪',
  `salary_remark` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '薪资注释',
  `reasons_for_leaving` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '离职原因',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=435 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC COMMENT='简历项目表';

-- ----------------------------
--  Table structure for `mx_resume_work_position`
-- ----------------------------
DROP TABLE IF EXISTS `mx_resume_work_position`;
CREATE TABLE `mx_resume_work_position` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `work_id` int(11) unsigned DEFAULT '0' COMMENT '工作ID',
  `position_exper_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '职位ID串号',
  `start_date` int(10) unsigned DEFAULT '0' COMMENT '开始时间',
  `end_date` int(10) unsigned DEFAULT '0' COMMENT '结束时间',
  `position` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '职位',
  `city_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '城市ID',
  `city_text` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '城市名称',
  `report_to` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '报告对象',
  `underling_num` smallint(6) unsigned DEFAULT '0' COMMENT '下属人数',
  `department` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '部门',
  `responsibility` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT '负责内容',
  `performance` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=582 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

SET FOREIGN_KEY_CHECKS = 1;
