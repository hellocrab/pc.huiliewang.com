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

 Date: 06/12/2018 20:26:29
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
  `job_class` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '期望职能',
  `sex` tinyint(1) NOT NULL DEFAULT 0 COMMENT '性别,1:男 2:女 ',
  `edu` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '学历',
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '所在城市',
  `wantsalary` decimal(18, 2) NOT NULL DEFAULT 0.00 COMMENT '期望年薪',
  `url` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `curSalary` decimal(18, 2) NOT NULL DEFAULT 0.00 COMMENT '当前年薪',
  `startWorkyear` int(10) NOT NULL COMMENT '开始工作时间',
  `birthday` int(10) NOT NULL COMMENT '出生年月',
  `curCompany` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '目前公司',
  `curDepartment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '目前职位',
  `curPosition` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '目前职位',
  `curStatus` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '求职状态',
  `intentCity` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '意向城市',
  `evaluate` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '优劣势对比',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标签',
  `skill` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '技能',
  `language` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '语言',
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
) ENGINE = MyISAM AUTO_INCREMENT = 1384501 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '简历主表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mx_resume
-- ----------------------------
INSERT INTO `mx_resume` VALUES (1384424, 0, 0, 0, '', 0, 0, 0, 0, 0, NULL, '包崇林22', '18787878787', '123@qq.com', '040', '100090', 1, '9', '040', 0.00, '', 999.00, 1522512000, 1517414400, 'aaa', NULL, 'sss', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384425, 0, 0, 0, '', 0, 0, 0, 0, 0, NULL, '包崇林', '15023726868', '', '040', '100090', 1, '9', '040', 0.00, '', 0.00, 2013, 1994, '', NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384426, 0, 0, 0, '', 0, 0, 0, 0, 0, NULL, '小明', '15023726861', '', '040', '100090', 1, '9', '020', 0.00, '', 0.00, 2018, 1994, '', NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384427, 0, 0, 0, '', 0, 0, 0, 0, 0, NULL, 'ees', '15023726864', '', '040', '100090', 1, '9', '040', 0.00, '', 0.00, 0, 0, '', NULL, '', '', '310180', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384428, 0, 0, 0, '', 0, 0, 0, 0, 0, NULL, '张三', '15023726841', '1421514791@qq.com', '010', '100090,010050', 1, '9', '170020', 0.00, '', 20.00, 1425139200, 770400000, '阿里', NULL, '工程师', '在职，正在寻找新机会', '280020', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384429, 0, 1523344086, 1523344086, '', 0, 0, 0, 0, 0, NULL, '哈哈', '15023722868', '123@qq.com', '040,010', '010010,010020,010060', 1, '专科', '040', 0.00, '', 30.00, 1456761600, 770400000, '南方新华', NULL, '猎头', '', '040,050090,280020', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384430, 0, 1523353787, 1523353787, '', 0, 0, 0, 0, 0, NULL, '李刚强', '18787878723', '', '040', '100090', 1, '15', '040', 0.00, '', 0.00, 0, 841507200, '', NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384431, 0, 1523407915, 1523407915, '', 0, 0, 0, 0, 0, NULL, '李刚强', '18787878787', '', '050', '460001', 1, '15', '040', 0.00, '', 0.00, 0, 841507200, '', NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384432, 0, 1523408015, 1523408015, '', 0, 0, 0, 0, 0, NULL, '李刚强', '18787878787', '', '050', '070010', 1, '15', '040', 0.00, '', 0.00, 0, 841507200, '', NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384433, 0, 1523408103, 1523408103, '', 0, 0, 0, 0, 0, NULL, '李刚强', '18787878782', '', '050', '020025', 1, '15', '040', 0.00, '', 0.00, 0, 841507200, '', NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384434, 0, 1523409063, 1523409063, '', 0, 0, 0, 0, 0, NULL, '李刚强', '18787878781', '', '020', '070010', 1, '15', '040', 0.00, '', 0.00, 0, 841507200, '', NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384435, 0, 1523409133, 1523409133, '', 0, 0, 0, 0, 0, NULL, '李刚强', '18787878783', '', '050', '290100', 1, '15', '040', 0.00, '', 0.00, 0, 841507200, '', NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384436, 0, 1523409262, 1523409262, '', 0, 0, 0, 0, 0, NULL, '李刚强', '18787878784', '', '020', '010010', 1, '9', '040', 0.00, '', 0.00, 0, 0, '', NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384437, 0, 1523409344, 1523409344, '', 0, 0, 0, 0, 0, NULL, '李刚强773', '18787878780', '', '020', '070010', 1, '专科', '040', 0.00, '', 0.00, -28800, 841507200, '', NULL, '', '', '060080', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384438, 0, 1523410264, 1523410264, '', 0, 0, 0, 0, 0, NULL, '李刚强啊', '18787878789', '', '020', '020025', 2, '专科', '040', 0.00, '', 0.00, -28800, -28800, '', NULL, '', '', '110130', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384439, 0, 1523413222, 1523413222, '', 0, 0, 0, 0, 0, NULL, '张静', '18787878722', '232322@qq.com', '050', '010010', 2, '本科', '040', 0.00, '', 200.00, -28800, 670435200, '目前公司', NULL, '目前职位', '', '170020,270090,270080', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384440, 0, 1523425743, 1523867635, '', 0, 0, 0, 0, 0, NULL, '李刚q', '18787878222', '222@qq.com', '010', '010010', 2, '博士', '170020', 0.00, '', 222.00, 1517414400, 1072886400, '重庆某某公司', NULL, '工程师', '在职，看看新机会', '150170', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384441, 0, 1523608235, 1523608235, '', 0, 0, 0, 0, 0, NULL, '小米', '15023726261', '1223@qq.com', '130', '130050', 1, '本科', '280020', 0.00, '', 10.00, 1425139200, 410198400, '重庆有线', NULL, '测试专员', '在职，看看新机会', '210180,210190,210140', '是是是', '', '呃呃呃', '333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384442, 0, 1523861617, 1523861617, '', 0, 0, 0, 0, 0, NULL, '新加s', '18787878766', '', '010', '020025', 2, '本科', '170020', 0.00, '', 0.00, -28800, 841507200, '', NULL, '', '', '060080', '11', '', '11', '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384443, 0, 1523862494, 1523946352, '', 0, 0, 0, 0, 0, NULL, '李刚', '18787878444', 'ssss@qq.com', '020', '070010', 2, '专科', '060240', 0.00, '', 60.00, 1388505600, 841507200, '天上人间', NULL, '服务员', '', '060240', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384444, 0, 1523864934, 1523864934, '', 0, 0, 0, 0, 0, NULL, '李刚强', '18787878733', '7894@qq.com', '050', '070010', 2, '专科', '170020', 0.00, '', 888.00, -28800, 841507200, 'asdqw', NULL, 'dsfew', '在职，急寻新工作', '060290', 'aaaaaa', '', 'wwww', 'eee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384445, 0, 1523865663, 1523865663, '', 0, 0, 0, 0, 0, NULL, '小张', '15023726822', '1421514791@qq.com', '080', '020010,020120,370012', 1, '专科', '010', 0.00, '', 200.00, 1517414400, 1522512000, '啊啊啊', NULL, 'www', '在职，暂无跳槽打算', '260130', '鹅鹅鹅饿饿', '', '吾问无为谓', '呃呃呃', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384446, 0, 1523865764, 1524646665, '', 0, 0, 0, 0, 0, NULL, '李刚强qq', '18787878323', '', '040', '010010', 2, '专科', '060080', 0.00, '', 0.00, 0, 841507200, '', NULL, '', '', '010', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384447, 0, 1523866007, 1523866007, '', 0, 0, 0, 0, 0, '过保证期', '小小王', '15023721111', 'admin@test.com', '020', '270043', 1, '专科', '060030', 0.00, '', 0.00, 1517414400, 1517414400, '', NULL, '', '', '160180', '', '意向不明确', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384448, 0, 1523866322, 1523866322, '', 0, 0, 0, 0, 0, '推荐客户', '李刚强', '18787872345', '', '050', '070010', 2, '专科', '170020', 0.00, '', 0.00, 0, 841507200, '', NULL, '', '', '280020', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384449, 0, 1523866826, 1523866826, '', 0, 0, 0, 0, 0, '加入项目', '李刚强221', '18787878897', '', '040', '010010', 2, '专科', '010', 0.00, '', 0.00, 1517414400, 841507200, '', NULL, '', '', '060080', '', '222', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384450, 0, 1523866936, 1523947191, '', 0, 0, 0, 0, 0, '保证期中', '李刚强11', '18787878121', '', '040', '010010', 2, '硕士', '060240', 0.00, '', 23.00, -28800, 841507200, '重庆公司', NULL, '软件工程师', '离职，正在找工作', '060020', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384451, 1, 1523953410, 1523953410, '', 0, 0, 0, 0, 0, NULL, '王五', '15023724141', '123456@qq.com', '080', '170199,170100', 1, '硕士', '280020', 0.00, '', 50.00, 1485878400, 983376000, '纯一科技有限公司', NULL, '程序', '在职，看看新机会', '160180,020,040', '优势很大', '', '技能分析', '语言能力', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384452, 1, 1524021719, 1524045124, '', 1, 0, 0, 0, 0, '加入项目', '李刚强2222', '18787878333', '', '080', '140050', 2, '专科', '040', 0.00, '', 0.00, 1201795200, 841507200, '', NULL, '', '', '060240', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384453, 1, 1524129826, 1524129826, '', 0, 0, 0, 0, 0, '想看机会', 'anny', '15023721122', '', '020', '170202', 1, '本科', '060190', 0.00, '', 0.00, 1456761600, 765129600, '', NULL, '', '', '270130', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384454, 1, 1524130184, 1524130184, '', 1, 0, 0, 0, 0, NULL, 'jack', '15023720000', '150237@qq.com', '050', '020025', 1, '博士', '160120', 0.00, '', 0.00, 1488297600, 770400000, '', NULL, '', '在职，看看新机会', '260130', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384455, 1, 1524130414, 1524130414, '', 0, 0, 0, 0, 0, NULL, 'mick', '13123726868', '2123@qq.com', '130', '270043', 1, '专科', '150120', 0.00, '', 0.00, 1517414400, 765129600, '', NULL, '', '', '040,170020', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384456, 1, 1524462976, 1524550029, '', 0, 0, 0, 0, 0, NULL, '小薛', '15023700000', 'baocl@qq.com', '080', '020010', 1, '专科', '210180', 0.00, '', 20.00, 1112284800, 575827200, '小小雪', NULL, '小小志', '在职，急寻新工作', '270130', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384457, 1, 1524535746, 1524549500, '', 1, 0, 0, 0, 0, NULL, '任浩', '18621791074', 'renhao.sh@gmail.com', '080', '250050', 1, '专科', '110130', 0.00, 'www.chuntianlaile.com/resume_file/1524535646.html', 20.00, 1112284800, 841507200, '', NULL, '', '在职，急寻新工作', '310180', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384460, 19, 1524702949, 1524702949, '', 0, 0, 0, 0, 0, NULL, '悠悠', '15023777777', '123@qq.com', '090', '130070', 1, '专科', '110130', 0.00, '', 20.00, 1425139200, 730915200, '去去去', NULL, 'www', '', '260080', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384458, 21, 1524551646, 1524551646, '', 0, 0, 0, 0, 0, '加入项目', '李刚强', '18787878235', '', '020', '020025', 2, '专科', '060290', 0.00, 'www.chuntianlaile.com/resume_file/1524551616.html', 0.00, 0, 841507200, '', NULL, '', '', '170020', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384459, 21, 1524551712, 1524554292, '', 1, 0, 0, 0, 0, '加入项目', '李刚强', '18787878786', '', '050', '270043', 2, '专科', '110130', 0.00, 'www.chuntianlaile.com/resume_file/1524551673.html', 0.00, 1388505600, 841507200, '', NULL, '', '', '110130', '', '111,22,333', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384461, 26, 1524726092, 1524726154, '', 0, 0, 0, 0, 0, '想看机会', '杨博', '13071022677', '572291167@qq.com', '010', '010102', 1, '本科', '150020', 0.00, 'www.chuntianlaile.com/resume_file/1524725694.html', 0.00, -28800, -28800, '', NULL, '', '在职，看看新机会', '150020', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384462, 26, 1524728104, 1524728104, '', 0, 0, 0, 0, 0, NULL, '陈南国', '18680345713', '1056523476@qq.com', '040', '010121', 1, '硕士', '050020', 0.00, 'www.chuntianlaile.com/resume_file/1524728005.html', 0.00, 0, 670435200, '', NULL, '', '在职，急寻新工作', '050020', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384463, 29, 1524735922, 1524735922, '', 0, 0, 0, 0, 0, NULL, '谢虹', '15821813804', 'eryrey@163.com', '130', '010050', 2, '硕士', '010', 0.00, 'www.chuntianlaile.com/resume_file/1524735787.html', 0.00, 0, 0, '', NULL, '', '', '010', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384464, 25, 1524823970, 1524823970, '', 0, 0, 0, 0, 0, NULL, '龚进 ', '18701291028', '18701291028@163.com', '040', '010010', 1, '硕士', '010', 0.00, 'www.chuntianlaile.com/resume_file/1524823930.html', 0.00, 0, 0, '', NULL, '', '', '010', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384465, 25, 1524824014, 1524824014, '', 0, 0, 0, 0, 0, NULL, '刘伟明 ', '13910516224', 'liuweiming650@126.co', '040', '010020', 1, '本科', '010', 0.00, 'www.chuntianlaile.com/resume_file/1524823981.html', 0.00, 0, 0, '', NULL, '', '', '010', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384466, 25, 1524824102, 1524824102, '', 0, 0, 0, 0, 0, NULL, '袁茜 ', '18976860601', '14553143@qq.com', '040', '010020', 2, '专科', '010', 0.00, 'www.chuntianlaile.com/resume_file/1524824072.html', 0.00, 0, 0, '', NULL, '', '', '010', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384467, 1, 1524876050, 1524876050, '', 0, 0, 0, 0, 0, NULL, 'sdf', '15023727777', '123@qq.com', '020', '090030', 1, '专科', '260130', 0.00, '', 0.00, 1522512000, 765129600, '', NULL, '', '', '310130', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384469, 0, 0, 0, '', 0, 0, 0, 0, 0, NULL, '任浩 ', '13621791072', 'renhao.sh@gmail.com', '130', '010030,100020,100370', 1, 'MBA/EMBA', '1', 0.00, '', 0.00, 0, 252432000, '', NULL, '', '', '020', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384472, 0, 0, 0, '', 0, 0, 0, 0, 0, NULL, '孙璐 ', '17620994215', 'luke_sun@foxmail.com', '130', '140040,140160,410016', 1, '硕士', '', 0.00, '', 0.00, 0, 757353600, '广发证券股份有限公司 ', NULL, '投资银行业务实习生', '', '010,020,050090', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384474, 0, 0, 0, '', 0, 0, 0, 0, 0, NULL, '孙璐露 ', '17620994212', 'luke_sun@foxmail.com', '130', '140040,140160,410016', 1, '硕士 ', '', 0.00, '', 0.00, 0, 757353600, ' ', NULL, '投资银行业务实习生1300元', '', '010,020,050090', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384475, 0, 0, 0, '', 0, 0, 0, 0, 0, NULL, '任浩 ', '18621791072', 'renhao.sh@gmail.com', '130', '010030,100020,100370', 1, 'MBA/EMBA', '', 0.00, '', 0.00, 0, 252432000, 'IBM ', NULL, '咨询经理', '', '020', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384476, 0, 0, 0, '', 0, 0, 0, 0, 0, NULL, '任浩 ', '18875250702', 'renhao.sh@gmail.com', '130', '010030,100020,100370', 1, 'MBA/EMBA ', '', 0.00, '', 0.00, 0, 252432000, 'IBM ', NULL, '咨询经理', '', '020', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384477, 0, 0, 0, '', 0, 0, 0, 0, 0, NULL, '任浩 ', '18875250700', 'renhao.sh@gmail.com', '130', '010030,100020,100370', 1, 'MBA/EMBA ', '', 0.00, '', 0.00, 0, 252432000, 'IBM ', NULL, '咨询经理', '', '020', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384478, 1, 1539851411, 1543917615, '', 1, 0, 0, 0, 0, NULL, 'Tim Cooker', '13535353535', '326464@qq.com', '040,010,060', '010010', 1, '博士', '420320030', 0.00, '', 20000.00, 1538323200, 1533052800, 'Apple', NULL, 'CEO', '在职，看看新机会', '420320040', '', '人才,开朗', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384479, 1, 1543922774, 1543922774, '', 1, 0, 0, 0, 0, '想看机会', 'liyan', '13611111111', '', '150', '020025', 1, '专科', '280020', 0.00, '', 0.00, 0, 0, '', NULL, '', '', '050270', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384480, 1, 1544003936, 1544003936, '', 0, 0, 0, 0, 0, NULL, 'ceshi tt', '17900000000', '562314521@qq.com', '150', '020010', 2, '本科', '040', 0.00, '', 0.00, 1538323200, 846777600, '', NULL, '', '', '280020,170020,060020', '', '1', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384481, 1, 1544004011, 1544004011, '', 0, 0, 0, 0, 0, NULL, 'w', '15622222222', '', '150', '020010', 1, '专科', '050270', 0.00, '', 0.00, 0, 0, '', NULL, '', '', '050230', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384482, 1, 1544004841, 1544005625, '', 1, 0, 0, 0, 0, NULL, '李花花', '18400000000', '123@qq.com', '500', '170191', 2, '专科', '040', 0.00, '', 10.00, 1538323200, 1064937600, '', NULL, '测试', '在职，急寻新工作', '170020', '', '12', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_resume` VALUES (1384485, 0, 0, 0, '', 0, 0, 0, 80, 0, '', '徐善科', '15162179297', 'xsk995@163.com', '', '工业工程师,项目经理,主管', 2, '', '', 0.00, '', 0.00, 2009, 1983, NULL, NULL, NULL, NULL, '', '学历背景： 国家统招工业工程专业本科毕业;\r\n专业优势：10年的制造行业精益生产经验,具有工厂设计、产线规划、产能提升、线平衡、标准作业、现场问题识别改善等精益生产推进经验;负责推动低成本自动化、智能制造等;\r\n稳定性：10年的工作经验中一直都是从事制造行业的精益生产、流程改善的工作,供职富士康科技集团、保利协鑫集团,都是非常知名的大型集团企业,其中富士康是电子制造行业的精益化生产标杆企业;', '', NULL, '', 1, '', '', '', '', '', '', '', NULL, '', '', '', '', '', NULL, '', NULL);
INSERT INTO `mx_resume` VALUES (1384486, 0, 0, 0, '', 0, 0, 0, 80, 0, '', '杨勇', '13657654765', '715506047@qq.com', '', '物业管理经理/主管', 2, '', '', 0.00, '', 0.00, 2001, 1978, NULL, NULL, NULL, NULL, '', '本人系退伍军人出身，从业经历达187年之久，先后任保安班长、客户管家、安全主管、综合主管、管理处经理、公司管理部经理等职；从业经验丰富，熟悉物业管理各阶段工作，对与本行业有关的法律法规较为熟悉，在本行业有一定人脉资源；个人执行力强，善于沟通协调，应变能力突出，善于处理一切应急突发事件；对公司忠诚度高，视公司利益为最高利益；做人端正有原则，责任心强较服众，善于打造团队；', '', NULL, '', 3, '', '', '', '', '', '', '', NULL, '', '', '房地产服务(物业管理/地产经纪)', '房地产服务(物业管理/地产经纪)', '', '4', ' 经理人欢迎随时沟通和联系', NULL);
INSERT INTO `mx_resume` VALUES (1384487, 0, 0, 0, '', 0, 0, 0, 80, 0, '', '曹丹', '13759500727', '641465719@qq.com', '', '成本经理/主管', 1, '', '', 0.00, '', 0.00, 2010, 1987, NULL, NULL, NULL, NULL, '', '性格开朗，与人沟通协调能力好。做事认真负责，吃苦耐劳，工作努力。', '', NULL, '', 2, '', '', '', '', '', '', '', NULL, '', '', '房地产开发/建筑/建材/工程', '房地产开发/建筑/建材/工程', '', '1', ' 经理人欢迎随时沟通和联系', NULL);
INSERT INTO `mx_resume` VALUES (1384488, 0, 0, 0, '', 0, 0, 0, 80, 0, '', '张阳阳', '18710464637', '1050113414@qq.coM', '', '算法工程师;数据挖掘工程师;软件工程师', 2, '', '', 0.00, '', 0.00, 2016, 1990, NULL, NULL, NULL, NULL, '', '本人对待工作认真负责，待人真诚，有较强的组织能力与团队精神；乐观上进、有爱心并善于施教并行；上进心强、勤于学习能不断进步自身的能力与综合素质。同时专业知识扎实，有积极的工作态度，能够独立工作，又极赋团队精神，同时具有良好的文化素质；赋有进取心，有良好的职员治理和沟通协调能力。在未来的工作中，我将会以充沛的精力，刻苦钻研的精神来努力工作，稳定地进步自己的工作能力，与公司同步发展。', '', NULL, '', 1, '', '', '', '', '', '', '', '1', '技术', '', '', '计算机软件', NULL, '1', '', NULL);
INSERT INTO `mx_resume` VALUES (1384489, 0, 0, 0, '', 0, 0, 0, 80, 0, '', '何贵平', '15989958407', '254018406@qq.com', '', '技术或工艺设计经理;工厂经理/厂长;部门/事业部管理', 2, '', '', 0.00, '', 0.00, 2007, 1983, NULL, NULL, NULL, NULL, '', '为人诚实稳重，责任心强，积极进取；具有很好的统筹、管理能力，带团队能力强，17年度所带团队荣获明星团队；具有良好的沟通能力、组织能力、协调能力；和很强的突发问题应变意识和处理能力。\r\n\r\n\r\n', '', NULL, '', 2, '', '', '', '', '', '', '', NULL, '', '', '', '家具/家电', '', '4', ' 随时可以打电话联系我', NULL);
INSERT INTO `mx_resume` VALUES (1384490, 0, 0, 0, '', 0, 0, 0, 80, 0, '', '贺先生', '19983152802', '625187452@qq.com', '', '市场总监;销售总经理/销售副总裁', 2, '', '', 0.00, '', 0.00, 2012, 1990, NULL, NULL, NULL, NULL, '', '从一个职场默默无闻的小兵到操盘带项目再到独立创业、独当一面。如果贵公司欣赏我的过往，更看中我的潜力，期待有缘一见。（号外：1、知识结构较为全面——营销策略、产品定价、财务管理、人事管理、制度建设、选址评估，2、有车、驾驶技术娴熟，3、有农家乐、快消品分销渠道、地产渠道、教育行业渠道）。', '', NULL, '', 3, '', '', '', '', '', '', '', NULL, '', '', '', '互联网/移动互联网/电子商务,房地产服务(物业管理/地产经纪),农/林/牧/渔', '', '2', ' 随时可以打电话联系我', NULL);
INSERT INTO `mx_resume` VALUES (1384491, 0, 0, 0, '', 0, 0, 0, 80, 0, '', '殷先生', '13148395661', '491526708@qq.com', '', '销售经理/主管', 2, '', '', 0.00, '', 0.00, 2011, 1987, NULL, NULL, NULL, NULL, '', '', '', NULL, '', 3, '', '', '', '', '', '', '', NULL, '', '', '互联网/移动互联网/电子商务', '互联网/移动互联网/电子商务', '', '1', ' 经理人欢迎随时沟通和联系', NULL);
INSERT INTO `mx_resume` VALUES (1384492, 0, 0, 0, '', 0, 0, 0, 80, 0, '', '杨跃美', '18729583662', '441759312@qq.c0m', '', '软件工程师', 2, '', '', 0.00, '', 0.00, 2014, 1990, NULL, NULL, NULL, NULL, '', '1.有良好的团队意识，能很好地完成团队各项任务\r\n2.有良好的适应能力，能很快融入团队。\r\n3.学习能力强，爱动手，爱交流；\r\n4.工作有热情，认真、有耐心。', '', NULL, '', 1, '', '', '', '', '', '', '', '1', '技术', '', '计算机软件', '计算机软件', NULL, '1', '', NULL);
INSERT INTO `mx_resume` VALUES (1384493, 0, 0, 0, '', 0, 0, 0, 80, 0, '', '胡敏刚', '13962628892', '', '', '制造工程师;电气工程师', 2, '', '', 0.00, '', 0.00, 2009, 1985, NULL, NULL, NULL, NULL, '', '', '', NULL, '', 3, '', '', '', '', '', '', '', NULL, '', '', '机械制造/机电/重工', '机械制造/机电/重工', '', '1', ' 经理人欢迎随时沟通和联系', NULL);
INSERT INTO `mx_resume` VALUES (1384494, 0, 0, 0, '', 0, 0, 0, 80, 0, '', '孟坞', '18629606390', 'a13572930601@163.com', '', '软件工程师', 2, '', '', 0.00, '', 0.00, 2013, 1989, NULL, NULL, NULL, NULL, '', '1，熟悉WEB前端开发技术JQuery/JavaScript/html/AJAX/JSON等\r\n2，熟悉使用MVC开发模式，Servlet/Jsp，javaweb等\r\n3，熟练使用eclipse，SVN，weblogic', '', NULL, '', 1, '', '', '', '', '', '', '', '1', '技术', '', '计算机软件', '互联网/移动互联网/电子商务', NULL, '1', ' 经理人欢迎随时沟通和联系', NULL);
INSERT INTO `mx_resume` VALUES (1384495, 0, 0, 0, '', 0, 0, 0, 80, 0, '', '陆佳梦', '15251936675', '952167541@qq.com', '', '工业工程师', 1, '', '', 0.00, '', 0.00, 2015, 1991, NULL, NULL, NULL, NULL, '', '1)熟练使用Autocad,office\r\n2)系统地掌握本专业领悟宽广的技术理论基础知识,同时具有将本专业知识灵活运用到科技创新及社会实践中的能力,具有创新意识,注重团队精神与协同合作,工作责任心强,积极主动,能够独立完成任务,承受工作压力,具有良好的沟通能力。', '', NULL, '', 1, '', '', '', '', '', '', '', NULL, '', '', '', '', '', NULL, '', NULL);
INSERT INTO `mx_resume` VALUES (1384496, 0, 0, 0, '', 0, 0, 0, 80, 0, '', '庞丹琦', '18297933272', '', '', '未填写', 1, '', '', 0.00, '', 0.00, 2012, 1989, NULL, NULL, NULL, NULL, '', '安徽大学外语学院英语专业八级\r\n口语标准，近三年管理培训经验\r\n完善的英语培训体系\r\n', '', NULL, '', 3, '', '', '', '', '', '', '', NULL, '', '', '教育/培训/学术/科研/院校', '未填写', '', '4', ' 经理人欢迎随时沟通和联系', NULL);
INSERT INTO `mx_resume` VALUES (1384497, 0, 0, 0, '', 0, 0, 0, 80, 0, '', '张女士', '18623621235', '540016334@qq.com', '', '客户总监;部门/事业部管理;销售总监', 1, '', '', 0.00, '', 0.00, 2008, 1984, NULL, NULL, NULL, NULL, '', '有责任心，干实事，擅于销售以及团队管理，有一定跨界运营思维，热衷于教育事业', '', NULL, '', 2, '', '', '', '', '', '', '', NULL, '', '', '教育/培训/学术/科研/院校', '专业服务(咨询/财会/法律/翻译等),教育/培训/学术/科研/院校', '', '2', ' 经理人欢迎随时沟通和联系', NULL);
INSERT INTO `mx_resume` VALUES (1384498, 0, 0, 0, '', 0, 0, 0, 80, 0, '', '王祥明', '17605886696', '13857149573@139.com', '', '工程与项目实施', 2, '', '', 0.00, '', 0.00, 2001, 1977, NULL, NULL, NULL, NULL, '', '职业背景：逾 17 年项目实施管理经验，具备安防集成系统相关知识和实施经验。擅于制定项目实施计划，并\r\n做好过程管控、风险防范，有力保障项目按计划有序开展，如期完成。\r\n 项目实施：能制定项目实施计划，做好工作分派，责任分担，有效的对项目人员进行管控。\r\n 项目推进：擅于沟通协调，解决突发问题。针对部分问题难点，采取群策群力的方式，及时给出解决方案。\r\n 团队管理：具备项目实施团队管理的经验，具备区域项目经理管理经验，同时具备培训新项目经理的经验。\r\n 性格品质：踏实诚恳、勤奋敬业、头脑灵活、擅于学习、有亲和力、喜欢与人打交道，适应出差。', '', NULL, '', 3, '', '', '', '', '', '', '', NULL, '', '', '电子技术/半导体/集成电路', '电子技术/半导体/集成电路', '', '1', ' 经理人欢迎随时沟通和联系', NULL);
INSERT INTO `mx_resume` VALUES (1384499, 0, 0, 0, '', 0, 0, 0, 80, 0, '', '刘永辉', '17714081761', '491691881@qq.com', '', '工业工程师', 2, '', '', 0.00, '', 0.00, 2011, 1986, NULL, NULL, NULL, NULL, '', '观察分析能力和逻辑判断能力强,独立处理问题能力强,具团队合作精神。学习能力强,有责任心,做事专注,能承受工作中的各种压力,积极面对挑战。', '', NULL, '', 1, '', '', '', '', '', '', '', NULL, '', '', '', '', '', NULL, '', NULL);
INSERT INTO `mx_resume` VALUES (1384500, 0, 0, 0, '', 0, 0, 0, 80, 0, '', '何先平', '18046665538', '18046665538@163.com', '', '工程师', 2, '', '', 0.00, '', 0.00, 2014, 1990, NULL, NULL, NULL, NULL, '', '工作认真负责!服从领导安排。', '', NULL, '', 1, '', '', '', '', '', '', '', NULL, '', '', '', '', '', NULL, '', NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '简历收藏表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mx_resume_collection
-- ----------------------------
INSERT INTO `mx_resume_collection` VALUES (1, 1384456, 1, 1524472952);
INSERT INTO `mx_resume_collection` VALUES (2, 1384453, 1, 1524473588);
INSERT INTO `mx_resume_collection` VALUES (3, 1384452, 1, 1524473605);
INSERT INTO `mx_resume_collection` VALUES (4, 1384455, 1, 1524473628);
INSERT INTO `mx_resume_collection` VALUES (5, 1384451, 1, 1524474135);
INSERT INTO `mx_resume_collection` VALUES (11, 1384458, 21, 1524552246);
INSERT INTO `mx_resume_collection` VALUES (13, 1384457, 21, 1524554671);
INSERT INTO `mx_resume_collection` VALUES (14, 1384458, 1, 1524555088);
INSERT INTO `mx_resume_collection` VALUES (15, 1384457, 1, 1524555094);
INSERT INTO `mx_resume_collection` VALUES (16, 1384458, 8, 1524641679);
INSERT INTO `mx_resume_collection` VALUES (17, 1384467, 1, 1526521087);
INSERT INTO `mx_resume_collection` VALUES (19, 1384478, 1, 1543918044);
INSERT INTO `mx_resume_collection` VALUES (20, 1384482, 1, 1544005581);

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
-- Records of mx_resume_data
-- ----------------------------
INSERT INTO `mx_resume_data` VALUES (0, '性格开朗，与人沟通协调能力好。做事认真负责，吃苦耐劳，工作努力。', '', '', '');
INSERT INTO `mx_resume_data` VALUES (5, '本人系退伍军人出身，从业经历达187年之久，先后任保安班长、客户管家、安全主管、综合主管、管理处经理、公司管理部经理等职；从业经验丰富，熟悉物业管理各阶段工作，对与本行业有关的法律法规较为熟悉，在本行业有一定人脉资源；个人执行力强，善于沟通协调，应变能力突出，善于处理一切应急突发事件；对公司忠诚度高，视公司利益为最高利益；做人端正有原则，责任心强较服众，善于打造团队；', '', '', '');
INSERT INTO `mx_resume_data` VALUES (13, '为人诚实稳重，责任心强，积极进取；具有很好的统筹、管理能力，带团队能力强，17年度所带团队荣获明星团队；具有良好的沟通能力、组织能力、协调能力；和很强的突发问题应变意识和处理能力。\r\n\r\n\r\n', '', '', '');
INSERT INTO `mx_resume_data` VALUES (22, '', '', '', '');
INSERT INTO `mx_resume_data` VALUES (30, '1.有良好的团队意识，能很好地完成团队各项任务\r\n2.有良好的适应能力，能很快融入团队。\r\n3.学习能力强，爱动手，爱交流；\r\n4.工作有热情，认真、有耐心。', '', '', '');
INSERT INTO `mx_resume_data` VALUES (36, '1，熟悉WEB前端开发技术JQuery/JavaScript/html/AJAX/JSON等\r\n2，熟悉使用MVC开发模式，Servlet/Jsp，javaweb等\r\n3，熟练使用eclipse，SVN，weblogic', '', '', '');
INSERT INTO `mx_resume_data` VALUES (42, '安徽大学外语学院英语专业八级\r\n口语标准，近三年管理培训经验\r\n完善的英语培训体系\r\n', '', '', '');
INSERT INTO `mx_resume_data` VALUES (48, '职业背景：逾 17 年项目实施管理经验，具备安防集成系统相关知识和实施经验。擅于制定项目实施计划，并\r\n做好过程管控、风险防范，有力保障项目按计划有序开展，如期完成。\r\n 项目实施：能制定项目实施计划，做好工作分派，责任分担，有效的对项目人员进行管控。\r\n 项目推进：擅于沟通协调，解决突发问题。针对部分问题难点，采取群策群力的方式，及时给出解决方案。\r\n 团队管理：具备项目实施团队管理的经验，具备区域项目经理管理经验，同时具备培训新项目经理的经验。\r\n 性格品质：踏实诚恳、勤奋敬业、头脑灵活、擅于学习、有亲和力、喜欢与人打交道，适应出差。', '', '', '');
INSERT INTO `mx_resume_data` VALUES (70, '工作认真负责!服从领导安排。', '', '', '');
INSERT INTO `mx_resume_data` VALUES (77, '本人系退伍军人出身，从业经历达187年之久，先后任保安班长、客户管家、安全主管、综合主管、管理处经理、公司管理部经理等职；从业经验丰富，熟悉物业管理各阶段工作，对与本行业有关的法律法规较为熟悉，在本行业有一定人脉资源；个人执行力强，善于沟通协调，应变能力突出，善于处理一切应急突发事件；对公司忠诚度高，视公司利益为最高利益；做人端正有原则，责任心强较服众，善于打造团队；', '', '', '');
INSERT INTO `mx_resume_data` VALUES (84, '本人对待工作认真负责，待人真诚，有较强的组织能力与团队精神；乐观上进、有爱心并善于施教并行；上进心强、勤于学习能不断进步自身的能力与综合素质。同时专业知识扎实，有积极的工作态度，能够独立工作，又极赋团队精神，同时具有良好的文化素质；赋有进取心，有良好的职员治理和沟通协调能力。在未来的工作中，我将会以充沛的精力，刻苦钻研的精神来努力工作，稳定地进步自己的工作能力，与公司同步发展。', '', '', '');
INSERT INTO `mx_resume_data` VALUES (89, '从一个职场默默无闻的小兵到操盘带项目再到独立创业、独当一面。如果贵公司欣赏我的过往，更看中我的潜力，期待有缘一见。（号外：1、知识结构较为全面——营销策略、产品定价、财务管理、人事管理、制度建设、选址评估，2、有车、驾驶技术娴熟，3、有农家乐、快消品分销渠道、地产渠道、教育行业渠道）。', '', '', '');
INSERT INTO `mx_resume_data` VALUES (102, '1.有良好的团队意识，能很好地完成团队各项任务\r\n2.有良好的适应能力，能很快融入团队。\r\n3.学习能力强，爱动手，爱交流；\r\n4.工作有热情，认真、有耐心。', '', '', '');
INSERT INTO `mx_resume_data` VALUES (108, '1，熟悉WEB前端开发技术JQuery/JavaScript/html/AJAX/JSON等\r\n2，熟悉使用MVC开发模式，Servlet/Jsp，javaweb等\r\n3，熟练使用eclipse，SVN，weblogic', '', '', '');
INSERT INTO `mx_resume_data` VALUES (114, '安徽大学外语学院英语专业八级\r\n口语标准，近三年管理培训经验\r\n完善的英语培训体系\r\n', '', '', '');
INSERT INTO `mx_resume_data` VALUES (120, '职业背景：逾 17 年项目实施管理经验，具备安防集成系统相关知识和实施经验。擅于制定项目实施计划，并\r\n做好过程管控、风险防范，有力保障项目按计划有序开展，如期完成。\r\n 项目实施：能制定项目实施计划，做好工作分派，责任分担，有效的对项目人员进行管控。\r\n 项目推进：擅于沟通协调，解决突发问题。针对部分问题难点，采取群策群力的方式，及时给出解决方案。\r\n 团队管理：具备项目实施团队管理的经验，具备区域项目经理管理经验，同时具备培训新项目经理的经验。\r\n 性格品质：踏实诚恳、勤奋敬业、头脑灵活、擅于学习、有亲和力、喜欢与人打交道，适应出差。', '', '', '');
INSERT INTO `mx_resume_data` VALUES (142, '工作认真负责!服从领导安排。', '', '', '');
INSERT INTO `mx_resume_data` VALUES (1384466, '按时大撒大撒', '大飒飒', '撒打撒打撒', '大撒大撒大撒');
INSERT INTO `mx_resume_data` VALUES (1384485, '学历背景： 国家统招工业工程专业本科毕业;\r\n专业优势：10年的制造行业精益生产经验,具有工厂设计、产线规划、产能提升、线平衡、标准作业、现场问题识别改善等精益生产推进经验;负责推动低成本自动化、智能制造等;\r\n稳定性：10年的工作经验中一直都是从事制造行业的精益生产、流程改善的工作,供职富士康科技集团、保利协鑫集团,都是非常知名的大型集团企业,其中富士康是电子制造行业的精益化生产标杆企业;', '', '', '');
INSERT INTO `mx_resume_data` VALUES (1384486, '本人系退伍军人出身，从业经历达187年之久，先后任保安班长、客户管家、安全主管、综合主管、管理处经理、公司管理部经理等职；从业经验丰富，熟悉物业管理各阶段工作，对与本行业有关的法律法规较为熟悉，在本行业有一定人脉资源；个人执行力强，善于沟通协调，应变能力突出，善于处理一切应急突发事件；对公司忠诚度高，视公司利益为最高利益；做人端正有原则，责任心强较服众，善于打造团队；', '', '', '');
INSERT INTO `mx_resume_data` VALUES (1384487, '性格开朗，与人沟通协调能力好。做事认真负责，吃苦耐劳，工作努力。', '', '', '');
INSERT INTO `mx_resume_data` VALUES (1384488, '本人对待工作认真负责，待人真诚，有较强的组织能力与团队精神；乐观上进、有爱心并善于施教并行；上进心强、勤于学习能不断进步自身的能力与综合素质。同时专业知识扎实，有积极的工作态度，能够独立工作，又极赋团队精神，同时具有良好的文化素质；赋有进取心，有良好的职员治理和沟通协调能力。在未来的工作中，我将会以充沛的精力，刻苦钻研的精神来努力工作，稳定地进步自己的工作能力，与公司同步发展。', '', '', '');
INSERT INTO `mx_resume_data` VALUES (1384489, '为人诚实稳重，责任心强，积极进取；具有很好的统筹、管理能力，带团队能力强，17年度所带团队荣获明星团队；具有良好的沟通能力、组织能力、协调能力；和很强的突发问题应变意识和处理能力。\r\n\r\n\r\n', '', '', '');
INSERT INTO `mx_resume_data` VALUES (1384490, '从一个职场默默无闻的小兵到操盘带项目再到独立创业、独当一面。如果贵公司欣赏我的过往，更看中我的潜力，期待有缘一见。（号外：1、知识结构较为全面——营销策略、产品定价、财务管理、人事管理、制度建设、选址评估，2、有车、驾驶技术娴熟，3、有农家乐、快消品分销渠道、地产渠道、教育行业渠道）。', '', '', '');
INSERT INTO `mx_resume_data` VALUES (1384491, '', '', '', '');
INSERT INTO `mx_resume_data` VALUES (1384492, '1.有良好的团队意识，能很好地完成团队各项任务\r\n2.有良好的适应能力，能很快融入团队。\r\n3.学习能力强，爱动手，爱交流；\r\n4.工作有热情，认真、有耐心。', '', '', '');
INSERT INTO `mx_resume_data` VALUES (1384493, '', '', '', '');
INSERT INTO `mx_resume_data` VALUES (1384494, '1，熟悉WEB前端开发技术JQuery/JavaScript/html/AJAX/JSON等\r\n2，熟悉使用MVC开发模式，Servlet/Jsp，javaweb等\r\n3，熟练使用eclipse，SVN，weblogic', '', '', '');
INSERT INTO `mx_resume_data` VALUES (1384495, '1)熟练使用Autocad,office\r\n2)系统地掌握本专业领悟宽广的技术理论基础知识,同时具有将本专业知识灵活运用到科技创新及社会实践中的能力,具有创新意识,注重团队精神与协同合作,工作责任心强,积极主动,能够独立完成任务,承受工作压力,具有良好的沟通能力。', '', '', '');
INSERT INTO `mx_resume_data` VALUES (1384496, '安徽大学外语学院英语专业八级\r\n口语标准，近三年管理培训经验\r\n完善的英语培训体系\r\n', '', '', '');
INSERT INTO `mx_resume_data` VALUES (1384497, '有责任心，干实事，擅于销售以及团队管理，有一定跨界运营思维，热衷于教育事业', '', '', '');
INSERT INTO `mx_resume_data` VALUES (1384498, '职业背景：逾 17 年项目实施管理经验，具备安防集成系统相关知识和实施经验。擅于制定项目实施计划，并\r\n做好过程管控、风险防范，有力保障项目按计划有序开展，如期完成。\r\n 项目实施：能制定项目实施计划，做好工作分派，责任分担，有效的对项目人员进行管控。\r\n 项目推进：擅于沟通协调，解决突发问题。针对部分问题难点，采取群策群力的方式，及时给出解决方案。\r\n 团队管理：具备项目实施团队管理的经验，具备区域项目经理管理经验，同时具备培训新项目经理的经验。\r\n 性格品质：踏实诚恳、勤奋敬业、头脑灵活、擅于学习、有亲和力、喜欢与人打交道，适应出差。', '', '', '');
INSERT INTO `mx_resume_data` VALUES (1384499, '观察分析能力和逻辑判断能力强,独立处理问题能力强,具团队合作精神。学习能力强,有责任心,做事专注,能承受工作中的各种压力,积极面对挑战。', '', '', '');
INSERT INTO `mx_resume_data` VALUES (1384500, '工作认真负责!服从领导安排。', '', '', '');

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
) ENGINE = MyISAM AUTO_INCREMENT = 154 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '简历项目表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mx_resume_edu
-- ----------------------------
INSERT INTO `mx_resume_edu` VALUES (63, 5, 0, 2147483647, 2147483647, '四川机电工程专修学院', '物业管理', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (64, 5, 0, 2147483647, 2147483647, '重庆市委机关党校', '经济管理', NULL, 3, NULL);
INSERT INTO `mx_resume_edu` VALUES (65, 0, 0, 2147483647, 2147483647, '辽宁工业大学', '土木工程', 0, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (66, 0, 0, 2147483647, 2147483647, '四川交通职业技术学院', '房地产经营与估价', 0, 3, 1);
INSERT INTO `mx_resume_edu` VALUES (67, 0, 0, 2147483647, 2147483647, '西安理工大学', '计算机科学与技术', NULL, 5, 1);
INSERT INTO `mx_resume_edu` VALUES (68, 0, 0, 2147483647, 2147483647, '西安文理学院', '计算机软件', NULL, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (69, 13, 0, 2147483647, 2147483647, '南华大学', '机械工程及自动化', NULL, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (70, 0, 0, 2147483647, -2147483648, '四川大学', '工商管理', 1, 7, 0);
INSERT INTO `mx_resume_edu` VALUES (71, 0, 0, 2147483647, 2147483647, '四川天一学院', '计算机应用', NULL, 3, 1);
INSERT INTO `mx_resume_edu` VALUES (72, 22, 0, 2147483647, 2147483647, '江西科技学院', '汽车服务与工程', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (73, 0, 0, 2147483647, 2147483647, '湖南工学院', '材料成型及控制工程', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (74, 30, 0, 2147483647, 2147483647, '西北大学', '软件工程', 1, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (75, 0, 0, 2147483647, 2147483647, '三江学院', '电气工程及其自动化', 0, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (76, 36, 0, 2147483647, 2147483647, '电子科技大学中山学院', '通信工程', 0, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (77, 0, 0, 2147483647, 2147483647, '河海大学', '工业工程', NULL, 5, NULL);
INSERT INTO `mx_resume_edu` VALUES (78, 0, 0, 2147483647, 2147483647, '河海大学', '机械设计制造及其自动化', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (79, 42, 0, 2147483647, 2147483647, '安徽大学', '英语', 1, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (80, 0, 0, 2147483647, -2147483648, '重庆大学', 'mba', 1, 7, 1);
INSERT INTO `mx_resume_edu` VALUES (81, 0, 0, 2147483647, 2147483647, '重庆理工大学', '人力资源管理', 0, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (82, 48, 0, 2147483647, 2147483647, '江西九江高等专科财经学院', '通信工程', NULL, 3, NULL);
INSERT INTO `mx_resume_edu` VALUES (83, 0, 0, 2147483647, 2147483647, '河南理工大学', '工业工程', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (84, 52, 0, 2147483647, 2147483647, '清华大学', '计算机科学与技术', NULL, 6, NULL);
INSERT INTO `mx_resume_edu` VALUES (85, 52, 0, 2147483647, -2147483648, '蓝天学院', '通信工程师', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (86, 52, 0, 2147483647, 2147483647, '北京师范大学', '资源环境区划与管理', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (87, 52, 0, 2147483647, 2147483647, '海军工程大学', '计算机应用', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (88, 52, 0, 2147483647, 2147483647, '宁夏大学', '计算机及其应用电子信息科学类大专编号1120030214011171更新日期2006', NULL, 5, NULL);
INSERT INTO `mx_resume_edu` VALUES (89, 62, 0, 2147483647, 2147483647, '扬州大学', '2008年9月 - 2011年7月 | 山东商职学院', NULL, 3, 1);
INSERT INTO `mx_resume_edu` VALUES (90, 63, 0, 2147483647, 2147483647, '长春工业大学', '信息管理和信息系统', 0, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (91, 70, 0, 2147483647, 2147483647, '江西工业工程职业技术学院', '土木工程', NULL, 3, NULL);
INSERT INTO `mx_resume_edu` VALUES (92, 70, 0, 2147483647, 2147483647, '江西理工大学', '土木工程', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (93, 77, 0, 2147483647, 2147483647, '四川机电工程专修学院', '物业管理', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (94, 77, 0, 2147483647, 2147483647, '重庆市委机关党校', '经济管理', NULL, 3, NULL);
INSERT INTO `mx_resume_edu` VALUES (95, 0, 0, 2147483647, 2147483647, '辽宁工业大学', '土木工程', 0, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (96, 0, 0, 2147483647, 2147483647, '四川交通职业技术学院', '房地产经营与估价', 0, 3, 1);
INSERT INTO `mx_resume_edu` VALUES (97, 84, 0, 2147483647, 2147483647, '西安理工大学', '计算机科学与技术', NULL, 5, 1);
INSERT INTO `mx_resume_edu` VALUES (98, 84, 0, 2147483647, 2147483647, '西安文理学院', '计算机软件', NULL, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (99, 0, 0, 2147483647, 2147483647, '南华大学', '机械工程及自动化', NULL, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (100, 89, 0, 2147483647, -2147483648, '四川大学', '工商管理', 1, 7, 0);
INSERT INTO `mx_resume_edu` VALUES (101, 89, 0, 2147483647, 2147483647, '四川天一学院', '计算机应用', NULL, 3, 1);
INSERT INTO `mx_resume_edu` VALUES (102, 0, 0, 2147483647, 2147483647, '江西科技学院', '汽车服务与工程', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (103, 98, 0, 2147483647, 2147483647, '湖南工学院', '材料成型及控制工程', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (104, 102, 0, 2147483647, 2147483647, '西北大学', '软件工程', 1, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (105, 0, 0, 2147483647, 2147483647, '三江学院', '电气工程及其自动化', 0, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (106, 108, 0, 2147483647, 2147483647, '电子科技大学中山学院', '通信工程', 0, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (107, 0, 0, 2147483647, 2147483647, '河海大学', '工业工程', NULL, 5, NULL);
INSERT INTO `mx_resume_edu` VALUES (108, 0, 0, 2147483647, 2147483647, '河海大学', '机械设计制造及其自动化', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (109, 114, 0, 2147483647, 2147483647, '安徽大学', '英语', 1, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (110, 0, 0, 2147483647, -2147483648, '重庆大学', 'mba', 1, 7, 1);
INSERT INTO `mx_resume_edu` VALUES (111, 0, 0, 2147483647, 2147483647, '重庆理工大学', '人力资源管理', 0, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (112, 120, 0, 2147483647, 2147483647, '江西九江高等专科财经学院', '通信工程', NULL, 3, NULL);
INSERT INTO `mx_resume_edu` VALUES (113, 0, 0, 2147483647, 2147483647, '河南理工大学', '工业工程', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (114, 124, 0, 2147483647, 2147483647, '清华大学', '计算机科学与技术', NULL, 6, NULL);
INSERT INTO `mx_resume_edu` VALUES (115, 124, 0, 2147483647, -2147483648, '蓝天学院', '通信工程师', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (116, 124, 0, 2147483647, 2147483647, '北京师范大学', '资源环境区划与管理', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (117, 124, 0, 2147483647, 2147483647, '海军工程大学', '计算机应用', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (118, 124, 0, 2147483647, 2147483647, '宁夏大学', '计算机及其应用电子信息科学类大专编号1120030214011171更新日期2006', NULL, 5, NULL);
INSERT INTO `mx_resume_edu` VALUES (119, 134, 0, 2147483647, 2147483647, '扬州大学', '2008年9月 - 2011年7月 | 山东商职学院', NULL, 3, 1);
INSERT INTO `mx_resume_edu` VALUES (120, 135, 0, 2147483647, 2147483647, '长春工业大学', '信息管理和信息系统', 0, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (121, 142, 0, 2147483647, 2147483647, '江西工业工程职业技术学院', '土木工程', NULL, 3, NULL);
INSERT INTO `mx_resume_edu` VALUES (122, 142, 0, 2147483647, 2147483647, '江西理工大学', '土木工程', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (123, 1384485, 0, 2147483647, 2147483647, '南京工业大学', '工业工程', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (124, 1384486, 0, 2147483647, 2147483647, '四川机电工程专修学院', '物业管理', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (125, 1384486, 0, 2147483647, 2147483647, '重庆市委机关党校', '经济管理', NULL, 3, NULL);
INSERT INTO `mx_resume_edu` VALUES (126, 1384487, 0, 2147483647, 2147483647, '辽宁工业大学', '土木工程', 0, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (127, 1384487, 0, 2147483647, 2147483647, '四川交通职业技术学院', '房地产经营与估价', 0, 3, 1);
INSERT INTO `mx_resume_edu` VALUES (128, 1384488, 0, 2147483647, 2147483647, '西安理工大学', '计算机科学与技术', NULL, 5, 1);
INSERT INTO `mx_resume_edu` VALUES (129, 1384488, 0, 2147483647, 2147483647, '西安文理学院', '计算机软件', NULL, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (130, 1384489, 0, 2147483647, 2147483647, '南华大学', '机械工程及自动化', NULL, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (131, 1384490, 0, 2147483647, -2147483648, '四川大学', '工商管理', 1, 7, 0);
INSERT INTO `mx_resume_edu` VALUES (132, 1384490, 0, 2147483647, 2147483647, '四川天一学院', '计算机应用', NULL, 3, 1);
INSERT INTO `mx_resume_edu` VALUES (133, 1384491, 0, 2147483647, 2147483647, '江西科技学院', '汽车服务与工程', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (134, 0, 0, 2147483647, 2147483647, '湖南工学院', '材料成型及控制工程', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (135, 1384492, 0, 2147483647, 2147483647, '西北大学', '软件工程', 1, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (136, 1384493, 0, 2147483647, 2147483647, '三江学院', '电气工程及其自动化', 0, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (137, 1384494, 0, 2147483647, 2147483647, '电子科技大学中山学院', '通信工程', 0, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (138, 1384495, 0, 2147483647, 2147483647, '河海大学', '工业工程', NULL, 5, NULL);
INSERT INTO `mx_resume_edu` VALUES (139, 1384495, 0, 2147483647, 2147483647, '河海大学', '机械设计制造及其自动化', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (140, 1384496, 0, 2147483647, 2147483647, '安徽大学', '英语', 1, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (141, 1384497, 0, 2147483647, -2147483648, '重庆大学', 'mba', 1, 7, 1);
INSERT INTO `mx_resume_edu` VALUES (142, 1384497, 0, 2147483647, 2147483647, '重庆理工大学', '人力资源管理', 0, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (143, 1384498, 0, 2147483647, 2147483647, '江西九江高等专科财经学院', '通信工程', NULL, 3, NULL);
INSERT INTO `mx_resume_edu` VALUES (144, 1384499, 0, 2147483647, 2147483647, '河南理工大学', '工业工程', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (145, 0, 0, 2147483647, 2147483647, '清华大学', '计算机科学与技术', NULL, 6, NULL);
INSERT INTO `mx_resume_edu` VALUES (146, 0, 0, 2147483647, -2147483648, '蓝天学院', '通信工程师', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (147, 0, 0, 2147483647, 2147483647, '北京师范大学', '资源环境区划与管理', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (148, 0, 0, 2147483647, 2147483647, '海军工程大学', '计算机应用', NULL, 4, NULL);
INSERT INTO `mx_resume_edu` VALUES (149, 0, 0, 2147483647, 2147483647, '宁夏大学', '计算机及其应用电子信息科学类大专编号1120030214011171更新日期2006', NULL, 5, NULL);
INSERT INTO `mx_resume_edu` VALUES (150, 206, 0, 2147483647, 2147483647, '扬州大学', '2008年9月 - 2011年7月 | 山东商职学院', NULL, 3, 1);
INSERT INTO `mx_resume_edu` VALUES (151, 207, 0, 2147483647, 2147483647, '长春工业大学', '信息管理和信息系统', 0, 4, 1);
INSERT INTO `mx_resume_edu` VALUES (152, 1384500, 0, 2147483647, 2147483647, '江西工业工程职业技术学院', '土木工程', NULL, 3, NULL);
INSERT INTO `mx_resume_edu` VALUES (153, 1384500, 0, 2147483647, 2147483647, '江西理工大学', '土木工程', NULL, 4, NULL);

-- ----------------------------
-- Table structure for mx_resume_project
-- ----------------------------
DROP TABLE IF EXISTS `mx_resume_project`;
CREATE TABLE `mx_resume_project`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  `starttime` int(10) NOT NULL COMMENT '开始时间',
  `endtime` int(10) NOT NULL COMMENT '结束时间',
  `proName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '项目名称',
  `proOffice` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '项目职位',
  `proDes` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '项目描述',
  `proCompany` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '所在公司',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1070 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '简历项目表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mx_resume_project
-- ----------------------------
INSERT INTO `mx_resume_project` VALUES (1, 1384427, 0, 1512057600, 1525104000, '诉讼费', '', '', 'www');
INSERT INTO `mx_resume_project` VALUES (2, 1384427, 0, 1519833600, 1525104000, '四舍五入', '', '', '得分');
INSERT INTO `mx_resume_project` VALUES (3, 1384428, 0, 1422720000, 1459440000, '呜呜呜呜', '', '鹅鹅鹅饿鹅鹅鹅饿', '三生三世');
INSERT INTO `mx_resume_project` VALUES (4, 1384429, 0, 1517414400, 1522512000, '级人物', '切尔夫人前往 ', '切尔奇翁若', '委托书的');
INSERT INTO `mx_resume_project` VALUES (5, 1384429, 0, 1417363200, 1522512000, '少时诵诗书', '鹅鹅鹅鹅鹅鹅', '吾问无为谓无无', '鹅鹅鹅鹅鹅鹅饿');
INSERT INTO `mx_resume_project` VALUES (6, 1384431, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (7, 1384431, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (8, 1384431, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (9, 1384431, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (10, 1384432, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (11, 1384432, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (12, 1384432, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (13, 1384432, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (14, 1384433, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (15, 1384433, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (16, 1384433, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (17, 1384433, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (18, 1384434, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (19, 1384434, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (20, 1384434, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (21, 1384434, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (22, 1384435, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (23, 1384435, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (24, 1384435, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (25, 1384435, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (26, 1384436, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (27, 1384436, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (28, 1384436, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (29, 1384436, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (30, 1384437, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (31, 1384437, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (32, 1384437, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (33, 1384437, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (34, 1384438, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (35, 1384438, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (36, 1384438, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (37, 1384438, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (38, 1384436, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (39, 1384436, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (40, 1384436, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (41, 1384436, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (42, 1384438, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (43, 1384438, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (44, 1384438, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (45, 1384438, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (46, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (47, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (48, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (49, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (50, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (51, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (52, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (53, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (54, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (55, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (56, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (57, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (58, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (59, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (60, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (118, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (119, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (120, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (121, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (122, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (123, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (124, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (125, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (126, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (127, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (128, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (129, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (130, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (131, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (132, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (133, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (134, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (135, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (136, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (137, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (138, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (139, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (140, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (141, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (142, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (143, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (144, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (145, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (146, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (147, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (148, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (149, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (150, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (151, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (152, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (153, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (154, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (155, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (156, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (157, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (158, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (159, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (160, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (161, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (162, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (163, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (164, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (165, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (166, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (167, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (168, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (169, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (170, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (171, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (172, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (173, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (174, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (175, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (176, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (177, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (178, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (179, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (180, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (181, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (182, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (183, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (184, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (185, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (186, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (187, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (188, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (189, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (190, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (191, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (192, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (193, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (194, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (195, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (196, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (197, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (198, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (199, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (200, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (201, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (202, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (203, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (204, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (205, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (206, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (207, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (208, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (209, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (210, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (211, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (212, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (213, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (214, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (215, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (216, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (217, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (218, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (219, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (220, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (221, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (222, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (223, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (224, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (225, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (226, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (227, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (228, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (229, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (230, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (231, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (232, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (233, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (234, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (235, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (236, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (237, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (238, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (239, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (240, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (241, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (242, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (243, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (244, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (245, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (246, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (247, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (248, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (249, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (250, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (251, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (252, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (253, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (254, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (255, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (256, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (257, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (258, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (259, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (260, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (261, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (262, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (263, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (264, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (265, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (266, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (267, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (268, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (269, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (270, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (271, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (272, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (273, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (274, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (275, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (276, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (277, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (278, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (279, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (280, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (281, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (282, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (283, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (284, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (285, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (286, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (287, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (288, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (289, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (290, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (291, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (292, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (293, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (294, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (295, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (296, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (297, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (298, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (299, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (300, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (301, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (302, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (303, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (304, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (305, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (306, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (307, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (308, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (309, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (310, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (311, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (312, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (313, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (314, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (315, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (316, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (317, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (318, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (319, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (320, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (321, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (322, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (323, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (324, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (325, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (326, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (327, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (328, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (329, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (330, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (331, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (332, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (333, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (334, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (335, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (336, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (337, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (338, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (339, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (340, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (341, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (342, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (343, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (344, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (345, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (346, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (347, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (348, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (349, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (350, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (351, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (352, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (353, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (354, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (355, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (356, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (357, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (358, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (359, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (360, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (361, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (362, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (363, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (364, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (365, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (366, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (367, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (368, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (369, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (370, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (371, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (372, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (373, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (374, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (375, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (376, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (377, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (378, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (379, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (380, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (381, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (382, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (383, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (384, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (385, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (386, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (387, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (388, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (389, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (390, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (391, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (392, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (393, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (394, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (395, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (396, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (397, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (398, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (399, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (400, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (401, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (402, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (403, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (404, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (405, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (406, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (407, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (408, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (409, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (410, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (411, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (412, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (413, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (414, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (415, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (416, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (417, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (418, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (419, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (420, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (421, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (422, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (423, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (424, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (425, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (426, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (427, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (428, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (429, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (430, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (431, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (432, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (433, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (434, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (435, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (436, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (437, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (438, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (439, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (440, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (441, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (442, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (443, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (444, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (445, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (446, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (447, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (448, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (449, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (450, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (451, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (452, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (453, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (454, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (455, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (456, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (457, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (458, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (459, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (460, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (461, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (462, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (631, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (632, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (633, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (634, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (635, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (636, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (637, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (638, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (639, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (640, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (641, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (642, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (643, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (644, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (645, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (646, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (647, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (648, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (649, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (650, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (651, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (652, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (653, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (654, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (655, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (656, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (657, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (658, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (659, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (660, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (661, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (662, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (663, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (664, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (665, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (666, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (667, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (668, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (669, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (670, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (671, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (672, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (673, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (674, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (675, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (676, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (677, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (678, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (679, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (680, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (681, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (682, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (683, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (684, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (685, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (686, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (687, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (688, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (689, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (690, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (691, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (692, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (693, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (694, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (695, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (696, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (697, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (698, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (699, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (700, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (701, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (702, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (703, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (704, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (705, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (706, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (707, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (708, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (709, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (710, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (711, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (712, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (713, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (714, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (715, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (716, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (717, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (718, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (719, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (720, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (721, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (722, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (723, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (724, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (725, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (726, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (727, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (728, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (729, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (730, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (731, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (732, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (733, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (734, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (735, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (736, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (737, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (738, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (739, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (740, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (741, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (742, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (743, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (744, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (745, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (746, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (747, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (748, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (749, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (750, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (751, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (752, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (753, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (754, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (755, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (756, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (757, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (758, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (759, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (760, 1384439, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (761, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (762, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (763, 1384439, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (764, 1384439, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (765, 1384439, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (766, 1384438, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (767, 1384438, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (768, 1384438, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (769, 1384438, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (770, 1384438, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (771, 1384438, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (772, 1384438, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (773, 1384438, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (774, 1384438, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (775, 1384438, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (776, 1384438, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (777, 1384438, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (778, 1384438, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (779, 1384438, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (780, 1384438, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (781, 1384438, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (782, 1384438, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (783, 1384438, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (784, 1384438, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (785, 1384438, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (786, 1384438, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (787, 1384437, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (788, 1384437, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (789, 1384437, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (790, 1384437, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (791, 1384437, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (792, 1384437, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (793, 1384437, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (794, 1384437, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (795, 1384437, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (796, 1384437, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (797, 1384437, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (1062, 1384474, 0, 1475251200, 1480521600, ' ', '私募股权投资实习研究员 ', '执行项目尽调，协助同事完成投资分析报告及其他上会材料，支持项目组完成该项目 ', '上海复星高科技(集团)有限公司 ');
INSERT INTO `mx_resume_project` VALUES (1057, 1384472, 0, 1501516800, 1512057600, '海纳生物IPO项目 ', '投行项目实习生 ', '在项目现场进行尽职调查，完成发行人行业及业务分析、重要财务指标核算、关联方调查、供销数据及资料处理、专利商标核查、董监高和股东无违规调查等工作 ', '广发证券股份有限公司 ');
INSERT INTO `mx_resume_project` VALUES (1058, 1384472, 0, 1475251200, 1480521600, 'OneChampionship（体育IP）B轮投资项目 ', '私募股权投资实习研究员 ', '执行项目尽调，协助同事完成投资分析报告及其他上会材料，支持项目组完成该项目 ', '上海复星高科技(集团)有限公司 ');
INSERT INTO `mx_resume_project` VALUES (1061, 1384474, 0, 1501516800, 1512057600, ' ', '投行项目实习生 ', '在项目现场进行尽职调查，完成发行人行业及业务分析、重要财务指标核算、关联方调查、供销数据及资料处理、专利商标核查、董监高和股东无违规调查等工作 ', '广发证券股份有限公司 ');
INSERT INTO `mx_resume_project` VALUES (1052, 1384466, 0, 1409500800, 1435680000, '申请企业总部经济项目扶持', '董事长助理', '2014.09-2015.07 申请企业总部经济项目扶持 项目职务： 董事长助理 所在公司： 海南惠通嘉华投资有限公司 项目简介：1、根据海口市人民政府关于鼓励总部经济发展的实施细则，海府[2012]45号文件《海口市关于鼓励总部经济发展的暂行规定》文件精神，为企业申请总部经济项目扶持。 项目职责：1、根据海口市人民政府关于鼓励总部经济发展的实施细则，为企业申请总部经济扶持；2、根据海口市人民政府、海口市财政局、海口市国税、地税的要求，向各职能部门提供各种形式的书面材料和相关支撑数据；3、配合政府各部门和其他相关职能部门的现场审核；项目业绩：通过各种沟通、提交资料和各政府部门的反复取证，在次.的7成功申请总部经济认定，并为企业申请扶持资金500万。 ', '海南惠通嘉华投资有限公司');
INSERT INTO `mx_resume_project` VALUES (1051, 1384465, 0, 1367337600, 1451577600, '某军事院校实验室科研能力条件建设项目', '项目经理', '2013.05-2016.01 某军事院校实验室科研能力条件建设项目 项目职务： 项目经理 所在公司： 北京航天益来电子科技有限公司 项目简介：模拟战时环境，提升相关装备战斗力，涉密。 项目职责：期间主要负责该项目整个过程的商务沟通谈判、组织协调技术沟通、项目过程实施管理、设备交付验收、相关客户关系维护；组织完成项目方案、过程、验收评审工作及回款事宜；协调多个合作单位完成联合调试以及系统交付验收等工作。 项目业绩：项目金额近3000万。 ', '北京航天益来电子科技有限公司');
INSERT INTO `mx_resume_project` VALUES (1050, 1384463, 0, 1222790400, 1249056000, '国家级科普教育基地申报', '', '2008.10-2009.08 国家级科普教育基地申报 项目职务： 负责人 所在公司： 保龄宝生物股份有限公司 项目简介：所在公司营养科学传播中心（实体）成立后，主导国家级科普教育基地申报工作，牵头组织硬件建设，材料的准备，公关联络。在历时1.的申报过程中，带领团队攻坚克难，十上北京，个人答辩，最后终于申报成功，为企业的发展做出了重大贡献。本人也在当.荣获“德州市全面科学素质工作先进个人”称号 项目职责：项目负责人 项目业绩：申报《国家级科普教育基地》成功，使公司的营养科学传播中心品牌价值进一步提升，也为所在公司增添一项国家级荣誉，同时也争取到了一定的税收支持和资金支持。 ', '保龄宝生物股份有限公司');
INSERT INTO `mx_resume_project` VALUES (1049, 1384463, 0, 1325347200, 1354291200, '全面计划管理与计划绩效考核项目', '', '2012.01-2012.12 全面计划管理与计划绩效考核项目 项目职务： 总负责人 所在公司： 江苏长江石油化工有限公司 项目简介：全面计划管理是贯穿公司业务、生产、财务、人力等各个职能模块，以达成公司战略目标为目的，以计划分解落实为手段的一项管理工具，将全面计划管理与绩效考核相结合，通过围绕.、、周计划制定关键指标，通过对计划指标的分解落实，对部门和各岗位进行考核，形成一套以计划管理为核心的绩效考核模式，将会对公司的经营管理和人力资源管理工作起到1+1大于2的作用。自2012.元份开始，本人主导公司全面计划管理模式导入工作，从无到有，经过前期培训和逐步推行，经过半.的努力已在公司内部建立起全面计划管理模式，同时对公司原有的绩效考核模式进行调整，逐步将考核指标和方式与全面计划管理模式相融合，形成了公司特有的《计划管理考核模式》。至2012.底，此体系已经全部覆盖公司各业务模块，已经成为了公司最为主要的管理工具，促进了企业的发展。 项目职责：负责整个项目的规划设计及培训和组织实施工作。 项目业绩：在国有企业内导入全面计划管理模式，同时对公司原有的绩效考核模式进行调整，逐步将考核指标和方式与全面计划管理模式相融合，形成了公司特有的《计划管理考核模式》。至2012.底，此体系已经全部覆盖公司各业务模块，已经成为了公司最为主要的管理工具，促进了企业的发展。 ', '江苏长江石油化工有限公司');
INSERT INTO `mx_resume_project` VALUES (1048, 1384463, 0, 1401552000, 1406822400, '山东康华传媒有限公司绩效管控项目', '', '2014.06-2014.08 山东康华传媒有限公司绩效管控项目 项目职务： 项目组长 所在公司： 金隆行企业管理咨询公司（集团） 项目简介：山东康华传媒是中小学教辅、教材行业内的知名企业。公司实施的是《绩效管控项目》，服务内容包括：1、帮助企业进行战略梳理，形成战略规划书、.度预算；2、围绕战略规划，梳理设计组织架构和岗位设置；3、在此基础上帮助其建立了以岗位说明书为主的职责体系；4、帮助企业建立了薪酬职级体系；5、帮助企业建立了绩效管理体系；6、帮助完善了业务开发机制及内部提成奖励措施；7、帮助客户推动方案执行，进行内部培训和执行辅导工作。 项目职责：承担项目组长职责，编制项目计划，并组织实施，对项目实施结果及客户满意度负责。 项目业绩：未填写 ', '金隆行企业管理咨询公司（集团）');
INSERT INTO `mx_resume_project` VALUES (1047, 1384463, 0, 1380556800, 1412092800, '淄博腾辉油脂化工有限公司管理咨询项目', '', '2013.10-2014.10 淄博腾辉油脂化工有限公司管理咨询项目 项目职务： 项目组长 所在公司： 金隆行企业管理咨询公司（集团） 项目简介：企业属于中等规模的石油化工企业，客户实施的是《企业管控整体解决方案》，内容包括：1、帮助企业梳理了组织战略、规划，形成了战略规划书；2、帮助企业围绕战略，重新设计了组织架构体系及岗位架构；3、帮助企业设计了职责体系、薪酬职级体系、绩效管理体系；4、帮助企业建立了制度流程体系及企业文化管理体系；5、对所有体系和文件进行内部培训，推动试运行，并辅导落地。 项目职责：负责项目实施计划的制定，组织项目小组编制方案，进行方案培训与辅导，与企业所有人深度沟通，出策略、出建议，辅导、推动方案执行，在项目进行中发现和引导客户需求，保证项目进展顺利，客户满意度高、续单。 项目业绩：未填写 ', '金隆行企业管理咨询公司（集团）');
INSERT INTO `mx_resume_project` VALUES (1046, 1384463, 0, 1393603200, 1425139200, '淄博天行健陶瓷机械有限公司管理咨询项目', '', '2014.03-2015.03 淄博天行健陶瓷机械有限公司管理咨询项目 项目职务： 项目组长 所在公司： 金隆行企业管理咨询公司（集团） 项目简介：客户企业属于大型陶瓷机械制造企业，行业地位优势明显，项目实施的是《企业管控整体解决方案》，项目内容包括：1、帮助企业建立了组织架构和职责体系（岗位说明书等）；2、帮助企业建立了薪酬体系；3、帮助企业建立了绩效管理体系；4、帮助企业设计了股权激励，规范法人治理结构；5、对管理方案进行内部培训，制定实施策略，通过1.多的推动和辅导保证方案落地。 项目职责：负责本项目前期调研，项目计划制定，分解实施。协调沟通与企业家关系，组织小组进行方案设计、内部培训、落地实施、辅导等过程，对客户满意度负责。 项目业绩：未填写 ', '金隆行企业管理咨询公司（集团）');
INSERT INTO `mx_resume_project` VALUES (1045, 1384463, 0, 1414771200, 1446307200, '山东鼎福食品有限公司绩效管控项目', '', '2014.11-2015.11 山东鼎福食品有限公司绩效管控项目 项目职务： 项目组长 所在公司： 金隆行企业管理咨询公司（集团） 项目简介：企业实施的是《绩效管控项目》，包括：1、进行战略梳理，建立战略管理和内部预算管理体系；2、帮助客户建立组织架构及职责体系；3、帮助客户建立薪酬职级体系；4、帮助客户打造内部绩效管理体系；5、进行培训和辅导，解决方案执行中存在的问题，推动实施，保证落地。 项目职责：负责项目实施计划的制定，组织项目小组编制方案，进行方案培训与辅导，与企业所有人深度沟通，出策略、出建议，辅导、推动方案执行，在项目进行中发现和引导客户需求，保证项目进展顺利，客户满意度高、续单。 项目业绩：未填写 ', '金隆行企业管理咨询公司（集团）');
INSERT INTO `mx_resume_project` VALUES (1044, 1384463, 0, 1396281600, 1448899200, '北京天辰云农场有限公司企业管控整体解决方案', '', '2014.04-2015.12 北京天辰云农场有限公司企业管控整体解决方案 项目职务： 第二咨询师 所在公司： 金隆行企业管理咨询公司（集团） 项目简介：云农场是农业互联网高科技集成服务商，全国网上农资交易及高科技服务平台，提供化肥、种子、农药、农机交易及测土配肥、农技服务、农场金融、乡间物流、农产品定制化等多种增值服务。云农场前身企业为圣丰种业公司，圣丰种业在2011.就已经与我们达成战略合作关系，公司的内部机制及战略规划都由我们帮助建立和推动实施，云农场项目也是在我们的大力推动下形成的，所以云农场自然而然引入了我公司做为内部机制建设的合作伙伴，在云农场的项目实施过程中，本人做为主要推动人，深度参与 ，主导了绩效管控和激励部分，并主导了多次内部团队培训，取得了良好效果。项目职责：参与项目实施，负责绩效管控模块，设计并推动绩效考核方案和提成激励方案，同时针对内部实际进行地面推广团队的营销培训及实战训练工作。 项目业绩：未填写 ', '金隆行企业管理咨询公司（集团）');
INSERT INTO `mx_resume_project` VALUES (1042, 1384463, 0, 1448899200, 1464710400, '山东华康蜂业商业模式设计项目', '', '2015.12-2016.06 山东华康蜂业商业模式设计项目 项目职务： 项目组长 所在公司： 金隆行企业管理咨询公司（集团） 项目简介：带领项目组（5位咨询师）帮助客户规划国内市场战略，设计商业模式、搭建内控运营方案，进行人员招聘、团队建设及渠道开拓等工作 项目职责：项目组长，组织、规划、监督项目实施。 项目业绩：未填写 ', '金隆行企业管理咨询公司（集团）');
INSERT INTO `mx_resume_project` VALUES (1043, 1384463, 0, 1451577600, 1462032000, '山东路斯商学院建设', '', '2016.01-2016.05 山东路斯商学院建设 项目职务： 项目组长 所在公司： 金隆行企业管理咨询公司（集团） 项目简介：帮助客户建设内部企业大学，搭建商学院组织架构与职责体系、岗位胜任力模型、课程开发体系、内训师培养体系、内部运营体系和评估体系。同时对客户的内训师队伍进行定期的授课培训、上岗训练等工作。 项目职责：项目组长，规划、组织、调度项目的实施。并负责内训师的日常培训和训练工作。 项目业绩：未填写 ', '金隆行企业管理咨询公司（集团）');
INSERT INTO `mx_resume_project` VALUES (1041, 1384463, 0, 1398873600, 1406822400, '中国好服务全国竞赛', '', '2014.05-2014.08 中国好服务全国竞赛 项目职务： 服务导师 所在公司： 湖北周黑鸭企业发展有限公司 项目简介：针对全国各区域连锁门店，以大区为单位，对各区域的门店服务进行阶段性的竞争比赛，比赛评估主要是以提高对顾客的服务和购物体验为主线进行PK。在项目中我担任华北区的项目导师项目职责：主要负责和区域内营运管理人员制定提升方案；对各层级人员多频次的宣讲及培训行动方案；对初赛进选的门店做一对一的提升帮助。 项目业绩：该项目历时4个，分初赛，半决赛，决赛。决赛最后的露演是放在武汉总部，其中包含了获奖门店风采展示。在此项目中，华北区竞选门店分别拿到了第二名和第三名 ', '湖北周黑鸭企业发展有限公司');
INSERT INTO `mx_resume_project` VALUES (1040, 1384463, 0, 1222790400, 1249056000, '国家级科普教育基地申报', '', '2008.10-2009.08 国家级科普教育基地申报 项目职务： 负责人 所在公司： 保龄宝生物股份有限公司 项目简介：所在公司营养科学传播中心（实体）成立后，主导国家级科普教育基地申报工作，牵头组织硬件建设，材料的准备，公关联络。在历时1.的申报过程中，带领团队攻坚克难，十上北京，个人答辩，最后终于申报成功，为企业的发展做出了重大贡献。本人也在当.荣获“德州市全面科学素质工作先进个人”称号 项目职责：项目负责人 项目业绩：申报《国家级科普教育基地》成功，使公司的营养科学传播中心品牌价值进一步提升，也为所在公司增添一项国家级荣誉，同时也争取到了一定的税收支持和资金支持。 ', '保龄宝生物股份有限公司');
INSERT INTO `mx_resume_project` VALUES (1039, 1384463, 0, 1325347200, 1354291200, '全面计划管理与计划绩效考核项目', '', '2012.01-2012.12 全面计划管理与计划绩效考核项目 项目职务： 总负责人 所在公司： 江苏长江石油化工有限公司 项目简介：全面计划管理是贯穿公司业务、生产、财务、人力等各个职能模块，以达成公司战略目标为目的，以计划分解落实为手段的一项管理工具，将全面计划管理与绩效考核相结合，通过围绕.、、周计划制定关键指标，通过对计划指标的分解落实，对部门和各岗位进行考核，形成一套以计划管理为核心的绩效考核模式，将会对公司的经营管理和人力资源管理工作起到1+1大于2的作用。自2012.元份开始，本人主导公司全面计划管理模式导入工作，从无到有，经过前期培训和逐步推行，经过半.的努力已在公司内部建立起全面计划管理模式，同时对公司原有的绩效考核模式进行调整，逐步将考核指标和方式与全面计划管理模式相融合，形成了公司特有的《计划管理考核模式》。至2012.底，此体系已经全部覆盖公司各业务模块，已经成为了公司最为主要的管理工具，促进了企业的发展。 项目职责：负责整个项目的规划设计及培训和组织实施工作。 项目业绩：在国有企业内导入全面计划管理模式，同时对公司原有的绩效考核模式进行调整，逐步将考核指标和方式与全面计划管理模式相融合，形成了公司特有的《计划管理考核模式》。至2012.底，此体系已经全部覆盖公司各业务模块，已经成为了公司最为主要的管理工具，促进了企业的发展。 ', '江苏长江石油化工有限公司');
INSERT INTO `mx_resume_project` VALUES (1038, 1384463, 0, 1401552000, 1406822400, '山东康华传媒有限公司绩效管控项目', '', '2014.06-2014.08 山东康华传媒有限公司绩效管控项目 项目职务： 项目组长 所在公司： 金隆行企业管理咨询公司（集团） 项目简介：山东康华传媒是中小学教辅、教材行业内的知名企业。公司实施的是《绩效管控项目》，服务内容包括：1、帮助企业进行战略梳理，形成战略规划书、.度预算；2、围绕战略规划，梳理设计组织架构和岗位设置；3、在此基础上帮助其建立了以岗位说明书为主的职责体系；4、帮助企业建立了薪酬职级体系；5、帮助企业建立了绩效管理体系；6、帮助完善了业务开发机制及内部提成奖励措施；7、帮助客户推动方案执行，进行内部培训和执行辅导工作。 项目职责：承担项目组长职责，编制项目计划，并组织实施，对项目实施结果及客户满意度负责。 项目业绩：未填写 ', '金隆行企业管理咨询公司（集团）');
INSERT INTO `mx_resume_project` VALUES (1037, 1384463, 0, 1380556800, 1412092800, '淄博腾辉油脂化工有限公司管理咨询项目', '', '2013.10-2014.10 淄博腾辉油脂化工有限公司管理咨询项目 项目职务： 项目组长 所在公司： 金隆行企业管理咨询公司（集团） 项目简介：企业属于中等规模的石油化工企业，客户实施的是《企业管控整体解决方案》，内容包括：1、帮助企业梳理了组织战略、规划，形成了战略规划书；2、帮助企业围绕战略，重新设计了组织架构体系及岗位架构；3、帮助企业设计了职责体系、薪酬职级体系、绩效管理体系；4、帮助企业建立了制度流程体系及企业文化管理体系；5、对所有体系和文件进行内部培训，推动试运行，并辅导落地。 项目职责：负责项目实施计划的制定，组织项目小组编制方案，进行方案培训与辅导，与企业所有人深度沟通，出策略、出建议，辅导、推动方案执行，在项目进行中发现和引导客户需求，保证项目进展顺利，客户满意度高、续单。 项目业绩：未填写 ', '金隆行企业管理咨询公司（集团）');
INSERT INTO `mx_resume_project` VALUES (1036, 1384463, 0, 1393603200, 1425139200, '淄博天行健陶瓷机械有限公司管理咨询项目', '', '2014.03-2015.03 淄博天行健陶瓷机械有限公司管理咨询项目 项目职务： 项目组长 所在公司： 金隆行企业管理咨询公司（集团） 项目简介：客户企业属于大型陶瓷机械制造企业，行业地位优势明显，项目实施的是《企业管控整体解决方案》，项目内容包括：1、帮助企业建立了组织架构和职责体系（岗位说明书等）；2、帮助企业建立了薪酬体系；3、帮助企业建立了绩效管理体系；4、帮助企业设计了股权激励，规范法人治理结构；5、对管理方案进行内部培训，制定实施策略，通过1.多的推动和辅导保证方案落地。 项目职责：负责本项目前期调研，项目计划制定，分解实施。协调沟通与企业家关系，组织小组进行方案设计、内部培训、落地实施、辅导等过程，对客户满意度负责。 项目业绩：未填写 ', '金隆行企业管理咨询公司（集团）');
INSERT INTO `mx_resume_project` VALUES (1035, 1384463, 0, 1414771200, 1446307200, '山东鼎福食品有限公司绩效管控项目', '', '2014.11-2015.11 山东鼎福食品有限公司绩效管控项目 项目职务： 项目组长 所在公司： 金隆行企业管理咨询公司（集团） 项目简介：企业实施的是《绩效管控项目》，包括：1、进行战略梳理，建立战略管理和内部预算管理体系；2、帮助客户建立组织架构及职责体系；3、帮助客户建立薪酬职级体系；4、帮助客户打造内部绩效管理体系；5、进行培训和辅导，解决方案执行中存在的问题，推动实施，保证落地。 项目职责：负责项目实施计划的制定，组织项目小组编制方案，进行方案培训与辅导，与企业所有人深度沟通，出策略、出建议，辅导、推动方案执行，在项目进行中发现和引导客户需求，保证项目进展顺利，客户满意度高、续单。 项目业绩：未填写 ', '金隆行企业管理咨询公司（集团）');
INSERT INTO `mx_resume_project` VALUES (1034, 1384463, 0, 1396281600, 1448899200, '北京天辰云农场有限公司企业管控整体解决方案', '', '2014.04-2015.12 北京天辰云农场有限公司企业管控整体解决方案 项目职务： 第二咨询师 所在公司： 金隆行企业管理咨询公司（集团） 项目简介：云农场是农业互联网高科技集成服务商，全国网上农资交易及高科技服务平台，提供化肥、种子、农药、农机交易及测土配肥、农技服务、农场金融、乡间物流、农产品定制化等多种增值服务。云农场前身企业为圣丰种业公司，圣丰种业在2011.就已经与我们达成战略合作关系，公司的内部机制及战略规划都由我们帮助建立和推动实施，云农场项目也是在我们的大力推动下形成的，所以云农场自然而然引入了我公司做为内部机制建设的合作伙伴，在云农场的项目实施过程中，本人做为主要推动人，深度参与 ，主导了绩效管控和激励部分，并主导了多次内部团队培训，取得了良好效果。项目职责：参与项目实施，负责绩效管控模块，设计并推动绩效考核方案和提成激励方案，同时针对内部实际进行地面推广团队的营销培训及实战训练工作。 项目业绩：未填写 ', '金隆行企业管理咨询公司（集团）');
INSERT INTO `mx_resume_project` VALUES (1033, 1384463, 0, 1451577600, 1462032000, '山东路斯商学院建设', '', '2016.01-2016.05 山东路斯商学院建设 项目职务： 项目组长 所在公司： 金隆行企业管理咨询公司（集团） 项目简介：帮助客户建设内部企业大学，搭建商学院组织架构与职责体系、岗位胜任力模型、课程开发体系、内训师培养体系、内部运营体系和评估体系。同时对客户的内训师队伍进行定期的授课培训、上岗训练等工作。 项目职责：项目组长，规划、组织、调度项目的实施。并负责内训师的日常培训和训练工作。 项目业绩：未填写 ', '金隆行企业管理咨询公司（集团）');
INSERT INTO `mx_resume_project` VALUES (1032, 1384463, 0, 1448899200, 1464710400, '山东华康蜂业商业模式设计项目', '经理', '2015.12-2016.06 山东华康蜂业商业模式设计项目 项目职务： 项目组长 所在公司： 金隆行企业管理咨询公司（集团） 项目简介：带领项目组（5位咨询师）帮助客户规划国内市场战略，设计商业模式、搭建内控运营方案，进行人员招聘、团队建设及渠道开拓等工作 项目职责：项目组长，组织、规划、监督项目实施。 项目业绩：未填写 ', '金隆行企业管理咨询公司（集团）');
INSERT INTO `mx_resume_project` VALUES (1031, 1384462, 0, 1309449600, 1346428800, '系统主题和主题应用', '', '2011.07-2012.09 系统主题和主题应用 项目职务： Android软件开发 所在公司： 金立手机 项目简介：系统主题和主题应用核心技术：Framework中的resources、activitythread，杀进程机制，网络技术、多线程、控件，xml机制功能简介：当设置一个主题包时，所有的应用都会从新的包里面读取相应的图片，但是这个读取过程对应用来说是透明的，核心是应用通过android Resource获取图片时，系统主题做了一个偷梁换柱，系统主题模块较为复杂，跟整个系统绑定的比较紧密。主题应用是一款手机上面的管理主题包的产品，主要分为在线和本地两大模块，本地核心功能有：主题包的预览、管理、设置、自定义等，在线核心功能有预览、排序、赞、下载等。情景模式核心技术：audiomanager，audioservice，settings provider功能简介：情景模式是基于android铃声管理的二次开发的一个产品，将原有的android三种铃声扩充成四种模式。 项目职责：未填写 项目业绩：未填写 ', '金立手机');
INSERT INTO `mx_resume_project` VALUES (1030, 1384462, 0, 1349020800, 1469980800, '生活类应用开发', '软件开发主管', '2012.10-2016.08 生活类应用开发 项目职务： 软件开发主管 所在公司： 深圳市金立通信设备有限公司 项目简介：Ami日历Ami日历是一个全新的日历，除了有基本的日历、农历、日程管理功能，还有星座、黄历、生活助手、号码限行，历史上的今天等等功能，日历分为两个apk，一个是UI，一个是provider。所有的数据格式都是兼容android标准的，实现了数据账号的同步。Ami记事本记事本是一款图文混排的记事软件，是一个典型MVC架构的应用，主要包括数据库模块、提醒模块、资源管理模块、缓存模块、自升级模块Ami天气 （天气，动态壁纸，锁屏）Ami天气是一款唯美的天气产品，分为三个应用，一个天气，一个锁屏，一个壁纸，三个应用都是主打天气，天气应用主要有三大视觉效果：A．天气主界面动画，这些动画都是模拟天气形态，1.4版本之前是14种天气状态的模拟，目前的版本是11种天气形态的动画，主要用到的技术android 图形绘制相关的技术。B．全屏动画，当解锁以后会在桌面上面绘制一层整个屏幕的动态效果。C．动态Widget，天气的widget显示在桌面时，天气形态都具有动态的效果锁屏的天气数据全部来自于天气，主要功能包括短信，未接来电等内容的读取，UI模块动态壁纸核心功能就是定位，数据加载，UI绘制。图库图库是一个基于android原生开发一个app，保留原生核心框架，在原生框架上我们定制了自己的界面，实现了相册，回收站，私密空间，放映模式等功能。图库的架构跟日历的架构有一定相似性，数据和显示是分离的，不同的在于图库UI在数据结构上面设计的灵活性，针对不同数据源，数据集能够方便的显示。 项目职责：未填写 项目业绩：未填写 ', '深圳市金立通信设备有限公司');
INSERT INTO `mx_resume_project` VALUES (1029, 1384462, 0, 1472659200, 1522512000, '游戏大厅、PUSH、系统升级、购物大厅、主题等', '软件部经理', '2016.09-2018.04 游戏大厅、PUSH、系统升级、购物大厅、主题等 项目职务： 软件部经理 所在公司： 深圳市金立通信设备有限公司 项目简介：负责游戏大厅、购物大厅、ＰＵＳＨ、主题壁纸、系统升级、天气、会员中心、广告、有据、支付钱包、海外软件商店、用户反馈等应用，大部分应用都是商业化程度高的项目职责：1．软件的开发、维护、debug、测试、发布等相关工作的管理2. 负责软件架构的选型、风险评估3. 所有代码质量的管理 项目业绩：1. 游戏大厅、购物大厅、主题、天气、海外软件加起来商店.收入过亿2. 提供了许多核心的业务组件、技术组件3. 代码的报错率控制在0.008%以下 ', '深圳市金立通信设备有限公司');
INSERT INTO `mx_resume_project` VALUES (1026, 1384459, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (1025, 1384459, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (1010, 1384458, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (1023, 1384459, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '11');
INSERT INTO `mx_resume_project` VALUES (1024, 1384459, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (1009, 1384458, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (1008, 1384458, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (1004, 1384452, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (1005, 1384457, 0, 1517414400, 1519833600, '222', '22', '222', '22');
INSERT INTO `mx_resume_project` VALUES (986, 1384440, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '所在公司*所在公司*');
INSERT INTO `mx_resume_project` VALUES (1007, 1384458, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (935, 1384437, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (936, 1384437, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (937, 1384437, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (938, 1384437, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (939, 1384437, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (940, 1384437, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (941, 1384437, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (942, 1384437, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (943, 1384437, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (944, 1384437, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (945, 1384437, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (946, 1384437, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (947, 1384437, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (948, 1384437, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (949, 1384442, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (950, 1384442, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (991, 1384443, 0, 1525104000, 1527782400, '11', '1', '1', '11');
INSERT INTO `mx_resume_project` VALUES (990, 1384443, 0, 1525104000, 1527782400, '11', '1', '1', '11');
INSERT INTO `mx_resume_project` VALUES (989, 1384443, 0, 1525104000, 1527782400, '11', '1', '1', '11');
INSERT INTO `mx_resume_project` VALUES (988, 1384443, 0, 1525104000, 1527782400, '11', '1', '1', '11');
INSERT INTO `mx_resume_project` VALUES (963, 1384444, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', 'ssss');
INSERT INTO `mx_resume_project` VALUES (964, 1384444, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (965, 1384444, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (966, 1384445, 0, 1517414400, 1519833600, '啊啊我', '', 'saa', '嗯嗯');
INSERT INTO `mx_resume_project` VALUES (1028, 1384446, 0, 1517414400, 1517414400, '1', '1', '1', '1');
INSERT INTO `mx_resume_project` VALUES (968, 1384447, 0, 1517414400, 1525104000, '阿瓦啊', '', '', 'www');
INSERT INTO `mx_resume_project` VALUES (969, 1384448, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '1');
INSERT INTO `mx_resume_project` VALUES (970, 1384448, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '');
INSERT INTO `mx_resume_project` VALUES (971, 1384448, 0, 1254326400, 1285862400, '科山花园', '销售总监', '2009.10-2010.10                 科山花园                        销售总监  项目介绍：城市综合体项目业绩：带领团队销售回款7亿。时间：', '');
INSERT INTO `mx_resume_project` VALUES (972, 1384448, 0, 1064937600, 1096560000, '世林国际别墅', '销售总监', '2003.10-2004.10                 世林国际别墅                      销售总监  项目介绍：别墅项目业绩：三个时间，平均每售出别墅8栋，回款4000万。', '');
INSERT INTO `mx_resume_project` VALUES (973, 1384449, 0, 1343750400, 1388505600, '岳频明珠苑', '销售总监', '2012.8-2014.1                  岳频明珠苑                       销售总监  项目介绍：城市综合体项目业绩：一.之类10万方全部售完，回款4亿，部分银行回款未到位。时间：', '1111');
INSERT INTO `mx_resume_project` VALUES (992, 1384450, 0, 1393603200, 1451577600, '邻水项目', '销售总监', '2014.3-2016.1                  邻水项目                       销售总监                                                  项目业绩：在邻水项目2014.启动当.，超额完成集团营销部当.制定的住宅资金回笼计划3.8亿及商业资金回笼1.5亿；2015.由于集团公司统一统筹资金，邻水项目为集团公司创造6.3亿的资金回笼，部分解决了集团公司资金困难；2016.1—10，邻水项目虽然开发资金短缺而导致了停工，在项目总经理的领导下，营销部积极开展各种营销渠道，邻水项目营销部带领两个销售代理公司的团队人员仍然向集团公司回笼资金1.8亿。时间：', '111');
INSERT INTO `mx_resume_project` VALUES (1006, 1384456, 0, 1517414400, 1525104000, '哈哈', '啊啊啊', '', '哈哈哈');
INSERT INTO `mx_resume_project` VALUES (1067, 1384478, 0, 1538323200, 1546272000, '12', '1', '1', '23');
INSERT INTO `mx_resume_project` VALUES (1069, 1384482, 0, 1412092800, 1448899200, '在线教育系统', '还不错', '在线教育教学', '涨涨涨');

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
) ENGINE = MyISAM AUTO_INCREMENT = 215 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '简历项目表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mx_resume_work
-- ----------------------------
INSERT INTO `mx_resume_work` VALUES (1, 1384425, NULL, 0, 1522512000, 1525104000, '报尺寸', '是是是', '', '', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (2, 1384425, NULL, 0, 1519833600, 1522512000, 'www', '佛挡杀佛', '', '', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (3, 1384426, NULL, 0, 1519833600, 1525104000, 'www', '撒', '', '', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (4, 1384427, NULL, 0, 1517414400, 1522512000, 'www', '搜索', '', '', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (5, 1384428, NULL, 0, 1107187200, 1456761600, '重庆大大', 'modeo', '少时诵诗书所所所所', '吾问无为谓无无无无', '呃呃呃', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (6, 1384424, NULL, 0, 1517414400, 1517414400, '1', '1', 'ssss', '', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (7, 1384429, NULL, 0, 1383235200, 1393603200, '国宾酒店', '保安', '维护酒店安全，招待外来人员', '服务行业公司介绍', '保安部', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (8, 1384429, NULL, 0, 1393603200, 1519833600, '天天乐', '职业玩家', '责任表示慰问', '游戏服务行业', '技术部', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (9, 1384436, NULL, 0, 1525104000, 1519833600, '1', '1', '', '', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (10, 1384438, NULL, 0, 1517414400, 1519833600, '1', '1', '', '', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (11, 1384439, NULL, 0, 1517414400, 1522512000, '公司名称', '职位', '', '公司介绍', '部门', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (32, 1384440, NULL, 0, 1517414400, 1517414400, '222', '2', '2', '22', '2', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (13, 1384441, NULL, 0, 1462032000, 1488297600, '重庆有线', '测试专员', '', 'www', '测试部', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (14, 1384437, NULL, 0, 1517414400, 1519833600, '1', '1', '', '', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (15, 1384442, NULL, 0, 1517414400, 1522512000, '1', '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (34, 1384443, NULL, 0, 1483200000, 1517414400, '吾问无为谓', '啊啊', '驱蚊器', '完善w', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (19, 1384444, NULL, 0, 1517414400, 1519833600, 'asss', 'wwww', '', '', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (20, 1384445, NULL, 0, 1517414400, 1519833600, 'www', '呃呃呃', '', '啊啊啊', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (21, 1384447, NULL, 0, 1517414400, 1517414400, 'www', '搜索', '', '', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (35, 1384450, NULL, 0, 1477929600, 1522512000, '1', '11', '2016.11-至今，在家创业，主要是服装行业，因为经济效益不好，所以还是想回到地产行业。时间：', '11', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (36, 1384451, NULL, 0, 1517414400, 1522512000, '纯一科技有限公司', '程序', '啊啊啊啊', 'K歌，彩票系统开发', '网络部', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (73, 1384452, NULL, 0, 1391184000, 1477929600, '四川省荣新集团有限公司', '销售总监', '汇报对象：项目总经理下属人数：50人工作职责：根据集团公司发展规划，协助项目总经理制定分公司.度经营计划，确保分公司经营计划的可实现性；组织制定分公司发展规划和营销管理等方面的规章制度，并监督、检查各项制度的落实执行情况； 2、全面负责邻水项目的营销管理工作，组织制定.度销售计划，确定营销策略，确保销售目标的实现；3、组织开展市场分析调研，对分公司所开发项目的产品定位、市场策划（依据公司及项目要求指导策划人员执行）与推广、公关方案等提供全面的指导，并制定可行的执行方案；4、对市场拓展、广告制作、楼盘促销、客户服务等工作予以指导；5、建立、拓展与当地政府、银行、公积金管理中心等相关部门的关系，建立健全完善的客户管理关系体系；6、负责分公司品牌的维护与推广；7、负责销售费用的预算与成本控制；8、负责对所辖部门员工的工作进行指导、监督、培训、考核与协调；9、对营销部策划经理、销售经理及销售主管的工作进行指导及监督；10、完成集团营销部及项目总经理交办的其他工作。离职原因：项目完成。时间：', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (74, 1384452, NULL, 0, 1343750400, 1388505600, '湖南丰隆房地产开发有限公司', '销售总监', '汇报对象：项目负责人下属人数：15人工作职责：根据公司发展规划，协助董事长制定公司.度经营计划，确保公司经营计划的可实现性，组织制定公司发展规划和营销管理等方面的规章制度，并监督、检查各项制度的落实执行情况； 全面负责公司的营销管理工作，组织制定.度销售计划，确定营销策略，确保销售目标的实现； 组织开展市场分析调研，对公司所开发项目的产品定位、市场策划（依据公司及项目要求指导策划人员执行）与推广、公关方案等提供全面的指导，并制定可行的执行方案； 对市场拓展、广告制作、楼盘促销、客户服务等工作予以指导； 建立、拓展与当地政府、银行、公积金管理中心等相关部门的关系，建立健全完善的客户管理关系体系；6、负责公司品牌的维护与推广；7、负责销售费用的预算与成本控制； 8、负责对所辖部门员工的工作进行指导、监督、培训、考核与协调； 9、对营销部策划经理、销售经理及销售主管的工作进行指导及监督； 10、完成董事长及总经理交办的其他工作。离职原因：项目完成。时间：', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (76, 1384452, NULL, 0, 967737600, 1064937600, '电梯有限公司', '111', '2000.9-2003.10                                   公司：迅达(中国)电梯有限公司                                                              职务：维修人员工作职责：负责电梯的维修。', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (77, 1384452, NULL, 0, 1477929600, 1522512000, 'null', '1', '2016.11-至今，在家创业，主要是服装行业，因为经济效益不好，所以还是想回到地产行业。时间：', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (78, 1384452, NULL, 0, 1204300800, 1343750400, '重庆天诺房地产开发有限公司', '营销部经理 ', '汇报对象：总代理工作职责：主要负责浙商天翔集团下属天诺房地产开发公司在重庆铜梁开发的淮远河商业步行街项目的商业及住宅项目的营销管理工作；2、带领营销部的全体人员积极完成公司下达的工作任务和目标。协调与各相关部门、关系单位等之间的工作。离职原因：项目完成。时间：', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (75, 1384452, NULL, 0, 1067616000, 1206979200, '公司成都泰诚房地产营销策划有限公', '项目经理', '工作职责：主要负责公司在各个城市代理楼盘的营销工作；积极完成销售任务, 贯彻执行公司的营销策略；因地制宜，制定和实施区域性的市场发展计划，并建立本公司自己的销售队伍；与发展商和开发商保持良好合作关系；协助开发商建立运作架构，指导和管理本公司的销售队伍。离职原因：项目完成。时间：', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (79, 1384453, NULL, 0, 1517414400, 1522512000, '吾问无为谓', '鹅鹅鹅鹅鹅鹅', '柔柔弱弱若若若', '', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (80, 1384454, NULL, 0, 1422720000, 1517414400, '7777', '456', '132456', '', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (81, 1384455, NULL, 0, 1517414400, 1519833600, 'ddd', 'eee', '', '', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (98, 1384456, NULL, 0, 1454256000, 1464710400, 'www', '呃呃呃', '', '', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (97, 1384457, NULL, 0, 1475251200, 1522512000, 'IBM', '咨询经理', ' 所在地区：上海-杨浦区 | 所在部门：GBS 工作职责和业绩： 1、业务拓展：信息化/数字化相关商业机会跟进，商务建议书准备，客户沟通与商务谈判2、项目交付：作为项目经理，领导企业信息化/数字化战略咨询项目，为客户提供业务分析与诊断，数字化场景设计，信息化蓝图与实施路线设计等服务', '', 'GBS ', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (96, 1384457, NULL, 0, 1272643200, 1309449600, '埃森哲(中国)有限公司', '高级咨询顾问', ' 所在地区：上海 | 所在部门：未填写 工作职责和业绩： 1. 作为解决方案咨询顾问，参与国内某电信运营商视讯运营中心的建设，帮助其进行业务流程的梳理与设计、解决方案总体架构的规划与设计，并作为PMO成员领导合作厂商进行方案的开发与管理2. 作为PMO咨询顾问，参与国内某大型电信制造商CRM LTC解决方案（从线索到现金流）的全球实施项目，制定全球推行计划、协调各方资源、并对推行进展及风险进行总体管控 ', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (93, 1384457, NULL, 0, 1049126400, 1109606400, '中国电信上海研发中心', '项目经理', '/主管 所在地区：上海 | 所在部门：未填写 工作职责和业绩： 1. 参与国内某主要电信运营商3G数据业务以及3G业务运营支撑系统相关的项目, 作为核心咨询顾问提供行业知识与技能2. 负责协调与领导合作厂商进行3G SDP业务平台（ISMP平台）的开发与管理项目经历 ', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (94, 1384457, NULL, 0, 1112284800, 1270051200, '惠普中国全球服务中心（上海）', '项目经理', ' 下属人数：10 | 所在地区：上海 | 所在部门：未填写 工作职责和业绩： 1. 领导移动解决方案团队的日常运作, 包括业务拓展、解决方案设计与实施，人员培训以及具体的项目管理工作2. 作为高级方案咨询顾问, 参与电信领域内的解决方案咨询、IT战略及架构规划, 解决方案售前支撑及实施的项目3. 参与规划与设计国内某主要移动运营商新一代业务运营与支撑系统(NGBOSS), 在e-TOM模型的基础上, 协助完成对整体IT战略, 企业架构, 信息模型, 功能框架, 实施蓝图以及管控模式等的设计 ', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (95, 1384457, NULL, 0, 1309449600, 1472659200, '思科公司（CISCO', '解决方案经理', ' 所在地区：上海 | 所在部门：未填写 工作职责和业绩： 1.领导移动O2O相关的战略规划与解决方案交付项目，为零售、机场、汽车分销等行业客户提供服务2.参与云计算相关的战略规划与解决方案交付项目，帮助包括IT分销、地产、制造等不同行业客户进行云服务战略转型3.参与智慧城市相关的战略规划与方案交付项目，帮助地产开发商客户向社区运营商转型 ', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (99, 1384458, NULL, 0, 1477929600, 1522512000, 'null', '1', '2016.11-至今，在家创业，主要是服装行业，因为经济效益不好，所以还是想回到地产行业。时间：', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (100, 1384458, NULL, 0, 1391184000, 1477929600, '四川省荣新集团有限公司', '销售总监', '汇报对象：项目总经理下属人数：50人工作职责：根据集团公司发展规划，协助项目总经理制定分公司.度经营计划，确保分公司经营计划的可实现性；组织制定分公司发展规划和营销管理等方面的规章制度，并监督、检查各项制度的落实执行情况； 2、全面负责邻水项目的营销管理工作，组织制定.度销售计划，确定营销策略，确保销售目标的实现；3、组织开展市场分析调研，对分公司所开发项目的产品定位、市场策划（依据公司及项目要求指导策划人员执行）与推广、公关方案等提供全面的指导，并制定可行的执行方案；4、对市场拓展、广告制作、楼盘促销、客户服务等工作予以指导；5、建立、拓展与当地政府、银行、公积金管理中心等相关部门的关系，建立健全完善的客户管理关系体系；6、负责分公司品牌的维护与推广；7、负责销售费用的预算与成本控制；8、负责对所辖部门员工的工作进行指导、监督、培训、考核与协调；9、对营销部策划经理、销售经理及销售主管的工作进行指导及监督；10、完成集团营销部及项目总经理交办的其他工作。离职原因：项目完成。时间：', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (101, 1384458, NULL, 0, 1343750400, 1388505600, '湖南丰隆房地产开发有限公司', '销售总监', '汇报对象：项目负责人下属人数：15人工作职责：根据公司发展规划，协助董事长制定公司.度经营计划，确保公司经营计划的可实现性，组织制定公司发展规划和营销管理等方面的规章制度，并监督、检查各项制度的落实执行情况； 全面负责公司的营销管理工作，组织制定.度销售计划，确定营销策略，确保销售目标的实现； 组织开展市场分析调研，对公司所开发项目的产品定位、市场策划（依据公司及项目要求指导策划人员执行）与推广、公关方案等提供全面的指导，并制定可行的执行方案； 对市场拓展、广告制作、楼盘促销、客户服务等工作予以指导； 建立、拓展与当地政府、银行、公积金管理中心等相关部门的关系，建立健全完善的客户管理关系体系；6、负责公司品牌的维护与推广；7、负责销售费用的预算与成本控制； 8、负责对所辖部门员工的工作进行指导、监督、培训、考核与协调； 9、对营销部策划经理、销售经理及销售主管的工作进行指导及监督； 10、完成董事长及总经理交办的其他工作。离职原因：项目完成。时间：', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (102, 1384458, NULL, 0, 1204300800, 1343750400, '重庆天诺房地产开发有限公司', '营销部经理 ', '汇报对象：总代理工作职责：主要负责浙商天翔集团下属天诺房地产开发公司在重庆铜梁开发的淮远河商业步行街项目的商业及住宅项目的营销管理工作；2、带领营销部的全体人员积极完成公司下达的工作任务和目标。协调与各相关部门、关系单位等之间的工作。离职原因：项目完成。时间：', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (103, 1384458, NULL, 0, 1067616000, 1206979200, '公司成都泰诚房地产营销策划有限公', '项目经理', '工作职责：主要负责公司在各个城市代理楼盘的营销工作；积极完成销售任务, 贯彻执行公司的营销策略；因地制宜，制定和实施区域性的市场发展计划，并建立本公司自己的销售队伍；与发展商和开发商保持良好合作关系；协助开发商建立运作架构，指导和管理本公司的销售队伍。离职原因：项目完成。时间：', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (104, 1384458, NULL, 0, 967737600, 1064937600, '电梯有限公司', '', '2000.9-2003.10                                   公司：迅达(中国)电梯有限公司                                                              职务：维修人员工作职责：负责电梯的维修。', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (123, 1384459, NULL, 0, 1391184000, 1477929600, '四川省荣新集团有限公司', '销售总监', '汇报对象：项目总经理下属人数：50人工作职责：根据集团公司发展规划，协助项目总经理制定分公司.度经营计划，确保分公司经营计划的可实现性；组织制定分公司发展规划和营销管理等方面的规章制度，并监督、检查各项制度的落实执行情况； 2、全面负责邻水项目的营销管理工作，组织制定.度销售计划，确定营销策略，确保销售目标的实现；3、组织开展市场分析调研，对分公司所开发项目的产品定位、市场策划（依据公司及项目要求指导策划人员执行）与推广、公关方案等提供全面的指导，并制定可行的执行方案；4、对市场拓展、广告制作、楼盘促销、客户服务等工作予以指导；5、建立、拓展与当地政府、银行、公积金管理中心等相关部门的关系，建立健全完善的客户管理关系体系；6、负责分公司品牌的维护与推广；7、负责销售费用的预算与成本控制；8、负责对所辖部门员工的工作进行指导、监督、培训、考核与协调；9、对营销部策划经理、销售经理及销售主管的工作进行指导及监督；10、完成集团营销部及项目总经理交办的其他工作。离职原因：项目完成。时间：', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (128, 1384459, NULL, 0, 1477929600, 1522512000, 'null', '1', '2016.11-至今，在家创业，主要是服装行业，因为经济效益不好，所以还是想回到地产行业。时间：', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (125, 1384459, NULL, 0, 1204300800, 1343750400, '重庆天诺房地产开发有限公司', '营销部经理 ', '汇报对象：总代理工作职责：主要负责浙商天翔集团下属天诺房地产开发公司在重庆铜梁开发的淮远河商业步行街项目的商业及住宅项目的营销管理工作；2、带领营销部的全体人员积极完成公司下达的工作任务和目标。协调与各相关部门、关系单位等之间的工作。离职原因：项目完成。时间：', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (126, 1384459, NULL, 0, 1067616000, 1206979200, '公司成都泰诚房地产营销策划有限公', '项目经理', '工作职责：主要负责公司在各个城市代理楼盘的营销工作；积极完成销售任务, 贯彻执行公司的营销策略；因地制宜，制定和实施区域性的市场发展计划，并建立本公司自己的销售队伍；与发展商和开发商保持良好合作关系；协助开发商建立运作架构，指导和管理本公司的销售队伍。离职原因：项目完成。时间：', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (127, 1384459, NULL, 0, 1343750400, 1388505600, '湖南丰隆房地产开发有限公司', '销售总监', '汇报对象：项目负责人下属人数：15人工作职责：根据公司发展规划，协助董事长制定公司.度经营计划，确保公司经营计划的可实现性，组织制定公司发展规划和营销管理等方面的规章制度，并监督、检查各项制度的落实执行情况； 全面负责公司的营销管理工作，组织制定.度销售计划，确定营销策略，确保销售目标的实现； 组织开展市场分析调研，对公司所开发项目的产品定位、市场策划（依据公司及项目要求指导策划人员执行）与推广、公关方案等提供全面的指导，并制定可行的执行方案； 对市场拓展、广告制作、楼盘促销、客户服务等工作予以指导； 建立、拓展与当地政府、银行、公积金管理中心等相关部门的关系，建立健全完善的客户管理关系体系；6、负责公司品牌的维护与推广；7、负责销售费用的预算与成本控制； 8、负责对所辖部门员工的工作进行指导、监督、培训、考核与协调； 9、对营销部策划经理、销售经理及销售主管的工作进行指导及监督； 10、完成董事长及总经理交办的其他工作。离职原因：项目完成。时间：', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (124, 1384459, NULL, 0, 967737600, 1064937600, '电梯有限公司', '1', '2000.9-2003.10                                   公司：迅达(中国)电梯有限公司                                                              职务：维修人员工作职责：负责电梯的维修。', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (130, 1384446, NULL, 0, 1519833600, 1519833600, '文案个人赛', '啊我高碑店', '', '', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (131, 1384460, NULL, 0, 1517414400, 1525104000, 'www', '是是是', '啊啊', '问问', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (139, 1384461, NULL, 0, 1372608000, 1409500800, '杭州天马计量科技有限公司', '软件工程师', ' 所在地区：杭州 | 所在部门：未填写 工作职责和业绩： 1.sql数据库的维护与管理2.公司应用程序与数据库之间数据的交互,即利用MFC进行界面的开发3.串口通信与底层设备的交互 ', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (137, 1384461, NULL, 0, 1456761600, 1498838400, '上海思岚科技有限公司', '因公司发展需要，现寻找志同道合人士加入公司，职位包括硬件工程师，软件工程师，机械工程师以及行政工作人员等若干名。我们将提供优厚的待遇（以及期权）。期待您的加入，并与我们一起共创公司的美好未来。', ' 更多有关团队和公司的介绍，请见公司网站：http://www.slamtec.com... C++开发工程师 所在地区：上海 | 所在部门：未填写 工作职责和业绩： 1. sdk代码的编写与维护基于boost库编写sdk代码的，调整接口及实现泛型编程等，通过tcp通信与slam芯片进行通信，进行slam算法的运行2. 使用mfc编写公司slam芯片的检查，系统升级使用mfc进行界面的开发，运用多线程进行测试，测试板与程序之间使用公司既定的通信协议进行串口通信3. 参与公司robot_studio的编写1. 信息的整理使用qt编写与sdk操作之间的过程，读取robot的信息并做相应的处理2. 界面的显示使用irrlicht引擎讲信息显示出来', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (138, 1384461, NULL, 0, 1425139200, 1456761600, '上海微创软件股份有限公司', '软件工程师', ' 所在地区：上海 | 所在部门：未填写 工作职责和业绩： 1.自动化测试框架(Python，C++)项目内容简介：自动化测试框架分为两大部分，基于网页界面的的编写和自动化测试代码的编写基于网页的编写，是针对自动化测试进行页面的操作，结果的查看等基于自动化测试代码的编写是针对要测试的17CY项目的编写测试代码以上两部分大多数使用Python的web通信协议工作内容：1.使用Python搭建自动化测试的框架，提供Python的接口事项网络操作，调用自动化测试程序2. C++编写自动化测试程序，基于公司产品的平台改写程序代码的接口与xml的测试与实现，完成测试要求2. 17Cy（智能汽车导航系统）voice识别内容简介：本项目共分四大模块，两大进程（1.UI模块，FC框架 2. server模块，voice模块），实现汽车导航的的智能识别UI模块：对导航界面的设计开发FC模块：UI界面和底层模块通信的桥梁，实现界面转换的操作server模块：负责将消息分发到各个相应模块voice模块：负责界面内容的响应与恢复工作内容：1. FC模块部分代码的编写，使用某些模式实现server模块的调用2. voice模块中针对音频文件的读写修改等，实现了对语音识别的基础3. 生成oneshot和poi category数据代码的编写，将原始的数据从postgrep数据库中读写出来，根据nuance软件的系统格式要求，实现地图数据和兴趣种别数据的生成', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (136, 1384461, NULL, 0, 1498838400, 1522512000, '北京笨爸爸科技有限公司郑州分公司', '开发工程师', ' 所在地区：上海 | 所在部门：未填写 工作职责和业绩： 1. 根据协议编写测试串口通信模块2. 使用opencv进行运动检测和光流检测3. 使用opencv进行人脸模块的检测和开发', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (140, 1384462, NULL, 0, 1472659200, 1522512000, '深圳市金立通信设备有限公司', '软件部经理', ' 37000元/ 汇报对象：集团副总裁 | 下属人数：51 | 所在地区：深圳 | 所在部门：产品开发二部 工作职责和业绩： 1. 负责移动互联网运营类产品的开发、测试等相关的管理工作现有业务包括了游戏大厅、购物大厅、PUSH、系统升级、主题、支付钱包、广告、天气、用户中心，有据等2. 负责所有软件的架构、开发、调试、测试工作，对团队整体产出负责3. 负责软件开发人员招聘、梯队建设、技术积累4. 攻克应用开发碰到的技术难点，代码质量把控，不断优化软件开发流程5. 负责推动公司应用架构的优化和疑难问题的攻关6. 负责和推进部门的技术预研工作制定和成果检验、实施，优秀开源框架的引入 ', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (141, 1384462, NULL, 0, 1417363200, 1469980800, '深圳市金立通信设备有限公司', '软件开发主管', ' 28元/ 汇报对象：部门经理 | 下属人数：13 | 所在地区：深圳 | 所在部门：生活应用部 工作职责和业绩： 负责应用（Ami天气（天气，动态壁纸，锁屏）、日历、记事本、图库，java server端）的新功能开发和维护工作攻克应用开发碰到的技术难点，代码质量把控，应用的架构工作负责应用敏捷开发的迭代故事的分解，开发计划安排和把控负责技术人员的技术培养和成长参与公司应用架构评审和技术选型', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (142, 1384462, NULL, 0, 1309449600, 1414771200, '深圳市金立通信设备有限公司', 'Android软件工程师', ' 所在地区：深圳 | 所在部门：未填写 工作职责和业绩： 参与主题、铃声、情景模式的等模块新功能开发和维护工作 攻克应用开发碰到的技术难点', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (143, 1384463, NULL, 0, 1370016000, 1522512000, '上海德马物流技术有限公司', '总经理助理', ' 10000元/ 汇报对象：总经理 | 所在地区：上海 | 所在部门：总经理室 工作职责和业绩： 1.总经理指令的上传下达，行程的安排与管理，总经理所需报告的制作（签单预测、业绩统计分析、行业信息收集、.度报告制作等）。2.会议的安排与管理、会议达成相关任务的追踪落实，负责总经理所有事务的跟进、监督以及落实执行等情况。3.部门间事务的沟通协调，必要时召集专题会议解决问题。4.来访人员的接待。5.相关文件或资料的翻译。6.公司相关制度的起草、修订、发布以及管理等。主要业绩：1 .顺利协助组织公司2016..底晚会，包括节目选择、人员安排、舞蹈排练、服装采购等一系列工作。2 .配合财务部顺利完成公司上市前的准备工作，与公司往来客户及供应商的询证函的发送、核对及回收，问题的沟通与协调工作。3 .协助行政部完成公司区政府质量奖的申报工作，主要工作是完成公司介绍、业绩分析、管理亮点展示等。4 .规范各部门每例行报表的模板及提交时间规定、规范报表流转流程，形成制度并发布到各部门。', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (144, 1384463, NULL, 0, 1185897600, 1367337600, '上海崇诚国际贸易有限公司', '总经理助理', ' 7000元/ 汇报对象：总经理 | 所在地区：上海 | 所在部门：营业管理部 工作职责和业绩： (1) 负责总经理办公室的日常服务工作及日程安排。(2) 负责会议的筹备、通知并记录、整理、存档，并检查督促会议决议的实施和执行。(3) 提供给总经理所需要的各种业绩报表并分析异常状况原因。(4) 正确传达总公司或高层主管的工作意图，协助制订相关规章制度加强公司内部控管。(5) 负责管理公司内部文件、合同及相关客户资料，合理分类归档。(6) 客户订单的分析处理，后续进、销货等相关国际贸易流程及付款的跟进。(7) 对总经理办交办事项进行跟踪处理，进行部门间沟通与协调,处理突发事务。(8) 协助总经理进行.度预算工作的计划和编制。(1)工作期间顺利在公司推行内部相关文件的线上签核流程，使相关表单签核电子化，提高工作效率。(2)公司主要客户账款回收天数缩短，资金流动率提高，合理节约成本。(3)公司内部文件、合同、客户资料的分类管理、电子存档，方便快速查阅。 ', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (145, 1384464, NULL, 0, 1514736000, 1522512000, '北京东械科技有限公司', '总裁助理', ' 所在地区：北京 | 所在部门：未填写 工作职责和业绩： 1.参与公司运营，侧重市场营销2. 协助总裁开展中央和北京地区工信部，发改委等政府关系工作3. 落地执行项目申报、政府补贴、政府活动参与等相关工作4.投融资', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (146, 1384464, NULL, 0, 1469980800, 1522512000, '湖南航天环宇通信科技股份有限责任公司', '销售经理', ' 所在地区：北京 | 所在部门：未填写 工作职责和业绩： 公司有四大块业务：卫星通信，微波天线，工装模具，复合材料。开发中航发，航天一院，航天九院，天文台等客户。为中航发做发动机叶片工装模具，航天一院703所做复合材料工装模具，为航天九院704做微波天线等。 ', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (147, 1384464, NULL, 0, 1341072000, 1522512000, 'null', '', '2012.07-', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (148, 1384464, NULL, 0, 1435680000, 1522512000, 'null', '', '2015.07-', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (149, 1384464, NULL, 0, 1388505600, 1522512000, 'null', '', '2014.01-', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (150, 1384464, NULL, 0, 1356969600, 1522512000, 'null', '', '2013.01-', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (151, 1384464, NULL, 0, 1341072000, 1522512000, 'null', '', '2012.07-', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (152, 1384464, NULL, 0, 1293811200, 1522512000, 'null', '', '2011.01-', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (153, 1384464, NULL, 0, 1285862400, 1522512000, 'null', '', '2010.10-', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (154, 1384464, NULL, 0, 1272643200, 1522512000, 'null', '', '2010.05-', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (155, 1384464, NULL, 0, 1267372800, 1522512000, 'null', '', '2010.03-', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (156, 1384464, NULL, 0, 1251734400, 1522512000, 'null', '', '2009.09-', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (157, 1384464, NULL, 0, 1246377600, 1522512000, 'null', '', '2009.07-', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (158, 1384464, NULL, 0, 1235836800, 1522512000, 'null', '', '2009.03-', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (159, 1384464, NULL, 0, 1228060800, 1522512000, 'null', '', '2008.12-', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (160, 1384465, NULL, 0, 1277913600, 1522512000, '北京航天益来电子科技有限公司', '市场主管', ' 汇报对象：事业部部长 | 所在地区：北京 | 所在部门：军品事业部 工作职责和业绩： 主要职能：区域市场开发、项目信息搜集、商务谈判沟通、合同签订、项目沟通管理、客户关系维护、项目回款等工作。1.负责航天二院、三院、四院等航天系统多个单位的市场开发、客户维护、商务沟通工作。完成相关多个合同的商务沟通、项目管理、交付及回款等工作，积累了丰富的航天、部队、军工系统的人脉；独立负责空军工程大学某实验室科研能力条件建设项目整个过程的沟通协调、项目实施管理、设备交付验收、相关客户关系维护等工作；独立开发两个潜力市场单位，并沟通合作多个项目；2.负责公司在总装、总后军工产品采购网站的注册、审查、信息采集、项目投标等工作；配合公司完成各军工资质的申报、审查、复查等工作；配合公司完成国资委、科委等科研经费申报工作。3.负责公司军用边海防产品民用化的推广工作，并成功在新疆、大庆油田以及上海深圳等地得到应用；4.负责公司军转民产品品牌推广工作，包括组织参加国内各大型展会，专利申报等工作；5.独立负责“深圳世界大学生运动会”39个场馆安检口安防监控系统项目，期间负责协调项目实施、客户关系维护、材料采购、商务沟通和监督项目进度；6.配合上级公司完成胜利油田某采油厂的信息化自动化改造项目申报方案的编写和整理，还参与了项目和产品推介会，负责部分项目的商务沟通；7.配合合作单位完成无锡市某行业物联网项目沟通协调和攻关工作以及各地区推广工作；8.负责市场部项目信息管理和合同经营管理工作，以及多个项目投标工作；9.担任公司篮球队和台球队队长，多次组织公司.会、户外活动、员工客户交流比赛等，并担任公司2012、2013大型.会主持人，组织能力、临场反应和沟通能力得到领导和同事的认可；10.多次参加公司组织的项目管理、技术和市场营销方面的培训。', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (161, 1384466, NULL, 0, 1454256000, 1522512000, '海南嘉华控股有限公司', '董事长助理', ' 所在地区：海口 | 所在部门：未填写 工作职责和业绩： 未填写 ', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (162, 1384466, NULL, 0, 1330531200, 1454256000, '海南嘉华汽车交易市场有限公司', '董事长助理', ' 8000元/ 下属人数：900 | 所在地区：海口 | 所在部门：未填写 工作职责和业绩： 1.负责公司各种政府项目申请及与政府对接和政府关系维护；2.协助董事长进行公司的日常事务、行程安排、会议安排及各种接待工作；3.与政府部门的对接工作及政府关系维护；4.负责董事长的各工作总结、下工作计划及.终总结和下.度工作计划，及董办经费预算及报销。4.拟定与政府和各职能部门的各种公文及报告、发言稿；5.代表董事长对相关部门的工作进行沟通和协调；6.处理董事长授权的其他事务。 ', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (163, 1384466, NULL, 0, 1251734400, 1291132800, '海南鑫基房地产有限公司', '行政专员', ' 所在地区：海口 | 所在部门：未填写 工作职责和业绩： 1.负责公司日常办公事务维护、管理；2.负责公司各部门后勤保障工作；3.负责公司各项接持，组织各项定期和不定期的活动；4.按照公司行政管理制度处理其他事务。 ', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (164, 1384466, NULL, 0, 1117555200, 1164902400, '四川移动通信有限责任公司自贡分公司', '营业厅厅经理', ' 下属人数：18 | 所在地区：自贡 | 所在部门：未填写 工作职责和业绩： 1、每个工作日早会，转达公司文件、每日工作重点内容和员工的日常管理；2、为各类型客户所遇到的问题和投诉提出个性化的解决方案；3、学习相关的报务计划及公司政策并推动实施；4、分析客户服务的相关工作及处理各类客户的投诉；5、制定关于员工业务方面的培训和学习；6、接受各类检查和集团公司的暗访，并提高员工服务质量和业务水平。 ', '', 'undefined', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (165, 1384467, NULL, 0, 1517414400, 1525104000, 'www', '222', '', '', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (177, 1384472, NULL, 0, 1435680000, 1441036800, '方正证券股份有限公司 ', '实习研究员', '- 对新三板分层及转板制度进行预测分析，并参与书写两篇相关研究报告，完成其中关于归纳纳斯达克市场发展历史及制度特点、台湾兴柜市场制度特点、新三板与两者对比及展望部分的书写- 收集并整理新三板及挂牌股票，编辑书写日报、周报和报，并在微信平台和核心客户群发布 ', '', '证券研究所', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (176, 1384472, NULL, 0, 1459440000, 1464710400, '北京鑫智联信息技术有限公司 ', '咨询顾问助理', '- 研究阿里巴巴、京东、苏宁等电商平台的发展趋势及支付方式及金融的演变趋势，完成桌面研究报告，对传音公司电商和电子支付建设提出可行性建议- 研究并归纳总结当下手机厂商的主流销售模式，并结合非洲国家背景进行可行性分析和落地实施建议，完成该部分的咨询建议报告初稿- 研究并归纳总结肯尼亚、尼日利亚及南非的支付及金融现状，为其他咨询顾问提供支持 ', '', '管理咨询项目组', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (174, 1384472, NULL, 0, 1501516800, 1517414400, '广发证券股份有限公司 ', '投资银行业务实习生', '- 参与海纳生物IPO项目，在项目现场进行尽职调查，完成发行人行业及业务分析、重要财务指标核算、关联方调查、供销数据及资料处理、专利商标核查、董监高和股东无违规调查等工作，协助同事完成招股说明书、反馈回复材料和半.度报告- 参与广州长隆私募债项目受托管理，完成半.度报告初稿，主要包括发行人概况，重要财务指标计算及更新，业务概况等部分，协同同事与发行人进行交流沟通，完成数据核对及终稿的修改- 参与某IPO项目，进行内部控制调查，主要包括面向穿行测试和银行流水核对，同时完成相关部分底稿整理', '', '投资银行部', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (175, 1384472, NULL, 0, 1475251200, 1490976000, '上海复星高科技(集团)有限公司 ', '私募股权投资实习研究员', '- 参与OneChampionship（体育IP）B轮投资项目，对目标公司进行实际探查，访谈公司高管及相关行业从业人员（签约运动员、体育场馆、电视台从业人员、咨询顾问等），并观摩现场赛事和组织过程，整理相关记录- 参与aCommerce（电商服务商）项目的前期尽调，独立完成投资价值分析报告初稿，包括主营业务分析、团队及员工分析、财务数据整合、相关市场桌面研究、主要客户与合作伙伴等部分- 辅助参于CXA（互联网员工福利和保险平台）项目B轮融资，分析投资项目财务数据、相关市场背景、竞争者及基于中国市场的前景预测，修改校正估值数据，为目标公司的估值和投资决策提供支持- 多次参与立项会，预审会，投决会，参与投决材料、度投资报告和相关会议纪要的书写，提高了团队工作效率', '', '东南亚投资部', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (185, 1384474, NULL, 0, 1435680000, 1441036800, ' ', '实习研究员', '- 对新三板分层及转板制度进行预测分析，并参与书写两篇相关研究报告，完成其中关于归纳纳斯达克市场发展历史及制度特点、台湾兴柜市场制度特点、新三板与两者对比及展望部分的书写- 收集并整理新三板及挂牌股票，编辑书写日报、周报和报，并在微信平台和核心客户群发布 ', '', '证券研究所', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (184, 1384474, NULL, 0, 1459440000, 1464710400, ' ', '咨询顾问助理', '- 研究阿里巴巴、京东、苏宁等电商平台的发展趋势及支付方式及金融的演变趋势，完成桌面研究报告，对传音公司电商和电子支付建设提出可行性建议- 研究并归纳总结当下手机厂商的主流销售模式，并结合非洲国家背景进行可行性分析和落地实施建议，完成该部分的咨询建议报告初稿- 研究并归纳总结肯尼亚、尼日利亚及南非的支付及金融现状，为其他咨询顾问提供支持 ', '', '管理咨询项目组', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (183, 1384474, NULL, 0, 1475251200, 1490976000, ' ', '私募股权投资实习研究员10800元', '- 参与OneChampionship（体育IP）B轮投资项目，对目标公司进行实际探查，访谈公司高管及相关行业从业人员（签约运动员、体育场馆、电视台从业人员、咨询顾问等），并观摩现场赛事和组织过程，整理相关记录- 参与aCommerce（电商服务商）项目的前期尽调，独立完成投资价值分析报告初稿，包括主营业务分析、团队及员工分析、财务数据整合、相关市场桌面研究、主要客户与合作伙伴等部分- 辅助参于CXA（互联网员工福利和保险平台）项目B轮融资，分析投资项目财务数据、相关市场背景、竞争者及基于中国市场的前景预测，修改校正估值数据，为目标公司的估值和投资决策提供支持- 多次参与立项会，预审会，投决会，参与投决材料、度投资报告和相关会议纪要的书写，提高了团队工作效率', '', '东南亚投资部', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (182, 1384474, NULL, 0, 1501516800, 1517414400, ' ', '投资银行业务实习生1300元', '- 参与海纳生物IPO项目，在项目现场进行尽职调查，完成发行人行业及业务分析、重要财务指标核算、关联方调查、供销数据及资料处理、专利商标核查、董监高和股东无违规调查等工作，协助同事完成招股说明书、反馈回复材料和半.度报告- 参与广州长隆私募债项目受托管理，完成半.度报告初稿，主要包括发行人概况，重要财务指标计算及更新，业务概况等部分，协同同事与发行人进行交流沟通，完成数据核对及终稿的修改- 参与某IPO项目，进行内部控制调查，主要包括面向穿行测试和银行流水核对，同时完成相关部分底稿整理', '', '投资银行部', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (186, 1384475, NULL, 0, 1475251200, 1525104000, 'IBM ', '咨询经理', '1、业务拓展：信息化/数字化相关商业机会跟进，商务建议书准备，客户沟通与商务谈判2、项目交付：作为项目经理，领导企业信息化/数字化战略咨询项目，为客户提供业务分析与诊断，数字化场景设计，信息化蓝图与实施路线设计等服务', '', 'GBS', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (187, 1384475, NULL, 0, 1309449600, 1472659200, '思科公司（CISCO SYSTEMS） ', '解决方案经理', '1.领导移动O2O相关的战略规划与解决方案交付项目，为零售、机场、汽车分销等行业客户提供服务2.参与云计算相关的战略规划与解决方案交付项目，帮助包括IT分销、地产、制造等不同行业客户进行云服务战略转型3.参与智慧城市相关的战略规划与方案交付项目，帮助地产开发商客户向社区运营商转型 ', '', '未填写', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (188, 1384475, NULL, 0, 1272643200, 1309449600, '埃森哲(中国)有限公司 ', '高级咨询顾问', '1. 作为解决方案咨询顾问，参与国内某电信运营商视讯运营中心的建设，帮助其进行业务流程的梳理与设计、解决方案总体架构的规划与设计，并作为PMO成员领导合作厂商进行方案的开发与管理2. 作为PMO咨询顾问，参与国内某大型电信制造商CRM LTC解决方案（从线索到现金流）的全球实施项目，制定全球推行计划、协调各方资源、并对推行进展及风险进行总体管控 ', '', '未填写', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (189, 1384475, NULL, 0, 1112284800, 1270051200, '惠普中国全球服务中心（上海） ', '项目经理', '1. 领导移动解决方案团队的日常运作, 包括业务拓展、解决方案设计与实施，人员培训以及具体的项目管理工作2. 作为高级方案咨询顾问, 参与电信领域内的解决方案咨询、IT战略及架构规划, 解决方案售前支撑及实施的项目3. 参与规划与设计国内某主要移动运营商新一代业务运营与支撑系统(NGBOSS), 在e-TOM模型的基础上, 协助完成对整体IT战略, 企业架构, 信息模型, 功能框架, 实施蓝图以及管控模式等的设计 ', '', '未填写', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (190, 1384475, NULL, 0, 1049126400, 1109606400, '中国电信上海研发中心 ', '主管', '1. 参与国内某主要电信运营商3G数据业务以及3G业务运营支撑系统相关的项目, 作为核心咨询顾问提供行业知识与技能2. 负责协调与领导合作厂商进行3G SDP业务平台（ISMP平台）的开发与管理', '', '未填写', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (191, 1384476, NULL, 0, 1475251200, 1525104000, 'IBM ', '咨询经理', '1、业务拓展：信息化/数字化相关商业机会跟进，商务建议书准备，客户沟通与商务谈判2、项目交付：作为项目经理，领导企业信息化/数字化战略咨询项目，为客户提供业务分析与诊断，数字化场景设计，信息化蓝图与实施路线设计等服务', '', 'GBS', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (192, 1384476, NULL, 0, 1309449600, 1472659200, ' ', '解决方案经理', '1.领导移动O2O相关的战略规划与解决方案交付项目，为零售、机场、汽车分销等行业客户提供服务2.参与云计算相关的战略规划与解决方案交付项目，帮助包括IT分销、地产、制造等不同行业客户进行云服务战略转型3.参与智慧城市相关的战略规划与方案交付项目，帮助地产开发商客户向社区运营商转型 ', '', '未填写', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (193, 1384476, NULL, 0, 1272643200, 1309449600, ' ', '高级咨询顾问', '1. 作为解决方案咨询顾问，参与国内某电信运营商视讯运营中心的建设，帮助其进行业务流程的梳理与设计、解决方案总体架构的规划与设计，并作为PMO成员领导合作厂商进行方案的开发与管理2. 作为PMO咨询顾问，参与国内某大型电信制造商CRM LTC解决方案（从线索到现金流）的全球实施项目，制定全球推行计划、协调各方资源、并对推行进展及风险进行总体管控 ', '', '未填写', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (194, 1384476, NULL, 0, 1112284800, 1270051200, ' ', '项目经理', '1. 领导移动解决方案团队的日常运作, 包括业务拓展、解决方案设计与实施，人员培训以及具体的项目管理工作2. 作为高级方案咨询顾问, 参与电信领域内的解决方案咨询、IT战略及架构规划, 解决方案售前支撑及实施的项目3. 参与规划与设计国内某主要移动运营商新一代业务运营与支撑系统(NGBOSS), 在e-TOM模型的基础上, 协助完成对整体IT战略, 企业架构, 信息模型, 功能框架, 实施蓝图以及管控模式等的设计 ', '', '未填写', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (195, 1384476, NULL, 0, 1049126400, 1109606400, ' ', '主管', '1. 参与国内某主要电信运营商3G数据业务以及3G业务运营支撑系统相关的项目, 作为核心咨询顾问提供行业知识与技能2. 负责协调与领导合作厂商进行3G SDP业务平台（ISMP平台）的开发与管理', '', '未填写', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (196, 1384477, NULL, 0, 1475251200, 1525104000, 'IBM ', '咨询经理', '1、业务拓展：信息化/数字化相关商业机会跟进，商务建议书准备，客户沟通与商务谈判2、项目交付：作为项目经理，领导企业信息化/数字化战略咨询项目，为客户提供业务分析与诊断，数字化场景设计，信息化蓝图与实施路线设计等服务', '', 'GBS', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (197, 1384477, NULL, 0, 1309449600, 1472659200, ' ', '解决方案经理', '1.领导移动O2O相关的战略规划与解决方案交付项目，为零售、机场、汽车分销等行业客户提供服务2.参与云计算相关的战略规划与解决方案交付项目，帮助包括IT分销、地产、制造等不同行业客户进行云服务战略转型3.参与智慧城市相关的战略规划与方案交付项目，帮助地产开发商客户向社区运营商转型 ', '', '未填写', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (198, 1384477, NULL, 0, 1272643200, 1309449600, ' ', '高级咨询顾问', '1. 作为解决方案咨询顾问，参与国内某电信运营商视讯运营中心的建设，帮助其进行业务流程的梳理与设计、解决方案总体架构的规划与设计，并作为PMO成员领导合作厂商进行方案的开发与管理2. 作为PMO咨询顾问，参与国内某大型电信制造商CRM LTC解决方案（从线索到现金流）的全球实施项目，制定全球推行计划、协调各方资源、并对推行进展及风险进行总体管控 ', '', '未填写', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (199, 1384477, NULL, 0, 1112284800, 1270051200, ' ', '项目经理', '1. 领导移动解决方案团队的日常运作, 包括业务拓展、解决方案设计与实施，人员培训以及具体的项目管理工作2. 作为高级方案咨询顾问, 参与电信领域内的解决方案咨询、IT战略及架构规划, 解决方案售前支撑及实施的项目3. 参与规划与设计国内某主要移动运营商新一代业务运营与支撑系统(NGBOSS), 在e-TOM模型的基础上, 协助完成对整体IT战略, 企业架构, 信息模型, 功能框架, 实施蓝图以及管控模式等的设计 ', '', '未填写', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (200, 1384477, NULL, 0, 1049126400, 1109606400, ' ', '主管', '1. 参与国内某主要电信运营商3G数据业务以及3G业务运营支撑系统相关的项目, 作为核心咨询顾问提供行业知识与技能2. 负责协调与领导合作厂商进行3G SDP业务平台（ISMP平台）的开发与管理', '', '未填写', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (207, 1384478, NULL, 0, 1533052800, 1533052800, 'Apple', 'COO', '', '', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (208, 1384479, NULL, 0, 1538323200, 1541001600, '1', '1', '', '', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (209, 1384480, NULL, 0, 1538323200, 1541001600, 'w', 'w', '', '', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (210, 1384481, NULL, 0, 1541001600, 1541001600, 'w', 'w', '', '', '', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (214, 1384482, NULL, 0, 1451577600, 1509465600, '南翔绩效', '挖掘机 ', '负责工地', '学挖掘机 到南翔', '挖挖', NULL, NULL, NULL);
INSERT INTO `mx_resume_work` VALUES (213, 1384482, NULL, 0, 1412092800, 1448899200, '新东方烹饪', '厨师', '主厨', '学技术，来新东方', '餐饮', NULL, NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 217 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mx_resume_work_position
-- ----------------------------
INSERT INTO `mx_resume_work_position` VALUES (1, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (2, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (3, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (4, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (5, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (6, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (7, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (8, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (9, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (10, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (11, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (12, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (13, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (14, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (15, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (16, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (17, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (18, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (19, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (20, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (21, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (22, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (23, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (24, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (25, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (26, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (27, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (28, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (29, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (30, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (31, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (32, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (33, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (34, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (35, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (36, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (37, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (38, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (39, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (40, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (41, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (42, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (43, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (44, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (45, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (46, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (47, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (48, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (49, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (50, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (51, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (52, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (53, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (54, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (55, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (56, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (57, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (58, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (59, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (60, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (61, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (62, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (63, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (64, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (65, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (66, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (67, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (68, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (69, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (70, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (71, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (72, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (73, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (74, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (75, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (76, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (77, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (78, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (79, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (80, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (81, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (82, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (83, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (84, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (85, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (86, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (87, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (88, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (89, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (90, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (91, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (92, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (93, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (94, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (95, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (96, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (97, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (98, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (99, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (100, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (101, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (102, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (103, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (104, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (105, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (106, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (107, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (108, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (109, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (110, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (111, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (112, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (113, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (114, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (115, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (116, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (117, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (118, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (119, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (120, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (121, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (122, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (123, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (124, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (125, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (126, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (127, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (128, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (129, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (130, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (131, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (132, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (133, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (134, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (135, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (136, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (137, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (138, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (139, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (140, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (141, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (142, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (143, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (144, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (145, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (146, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (147, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (148, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (149, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (150, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (151, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (152, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (153, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (154, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (155, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (156, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (157, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (158, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (159, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (160, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (161, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (162, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (163, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (164, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (165, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (166, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (167, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (168, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (169, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (170, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (171, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (172, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (173, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (174, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (175, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (176, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (177, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (178, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (179, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (180, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (181, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (182, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (183, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (184, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (185, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (186, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (187, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (188, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (189, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (190, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (191, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (192, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (193, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (194, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (195, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (196, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (197, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (198, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (199, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (200, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (201, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (202, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (203, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (204, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (205, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (206, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (207, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (208, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (209, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (210, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (211, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (212, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (213, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (214, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (215, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `mx_resume_work_position` VALUES (216, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
