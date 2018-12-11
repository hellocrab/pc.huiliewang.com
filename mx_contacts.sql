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

 Date: 11/12/2018 20:56:53
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
  `is_deleted` int(1) NULL DEFAULT NULL COMMENT '是否被删除',
  `delete_role_id` int(10) NULL DEFAULT NULL,
  `delete_time` int(10) NULL DEFAULT NULL,
  `gender` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '性别',
  `role` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '角色',
  `crm_zswstr` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '男' COMMENT '性别',
  `crm_dbxxve` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '重要' COMMENT '重要程度',
  `crm_dlxhnj` decimal(18, 2) NULL DEFAULT 0.00 COMMENT '绩效',
  PRIMARY KEY (`contacts_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 57 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '本表存放客户联系人对应关系信息' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mx_contacts
-- ----------------------------
INSERT INTO `mx_contacts` VALUES (1, 1, '', '', '', '', '先生', '', '', '', '', '', '', 1520392272, 1520392272, 0, 0, 0, '', '', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (2, 1, '赵航', '', '', '', '女士', '', '', '', '重庆市\n市辖县\n潼南县\n', '', '', 1520395145, 1520395145, 0, 0, 0, '', '普通人', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (3, 1, '7878', '787', '', '', '先生', '18791589763', '4545@qq.com', '2323', '黑龙江省\n哈尔滨市\n道里区\n454', '45', '23232323', 1520500555, 1520500555, 0, 0, 0, '', '决策人', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (4, 1, '22222', '222', '', '', '先生', '18785858585', '', '', '天津市\n市辖区\n河东区\n', '', '', 1520500589, 1520500589, 0, 0, 0, '', '普通人', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (5, 1, '张静', '技术总监', '', '', '女士', '18785969696', '', '', '北京市\n市辖区\n西城区\n', '', '11', 1520500671, 1523865496, 0, 0, 0, '', 'HR', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (6, 1, '张总', '经理', '', '', '女士', '18785859696', '', '', '天津市\n市辖县\n宁河县\n222', '', '', 1520501657, 1520502592, 0, 0, 0, '', '商务决策', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (7, 1, '7878', '78', '', '', '女士', '', '', '78', '北京市\n市辖区\n\n', '', '', 1520502654, 1520502654, 0, 0, 0, '', '普通人', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (8, 1, '赵华宇', '测试员', '', '', '先生', '13220355451', '32656554@qq.com', '32656554', '河南省\n信阳市\n固始县\nwgweg', '542121', '备注是必要的', 1520666244, 1520666244, 0, 0, 0, '', '普通人', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (9, 1, '阿萨德群', '阿萨德', '', '', '', '15023726868', '', '', '江西省\n景德镇市\n昌江区\n', '', '', 1521081547, 1521081547, 0, 0, 0, '', '', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (10, 1, '包崇林', '测试员', '', '', '', '15023726868', '123@qq.com', '1421514791', '天津市\n市辖区\n河东区\n', '', '四大欠王群啊啊啊啊', 1521453102, 1521453102, 0, 0, 0, '', '', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (11, 12, '包大大', 'ceo', '', '', '', '15023726868', '1421514@qq.com', '1421514791', '', '', '', 1521534033, 1521534033, 0, 0, 0, '', '', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (12, 1, '包崇林', '管理员', '', '', '', '15023726868', '77@qq.com', '123', '山东省\n青岛市\n\n', '', '', 1521853362, 1521853362, 0, 0, 0, '', '', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (13, 1, '23', '23', '', '', '', '18791589763', '4545@qq.com', '23', '黑龙江省\n黑河市\n市辖区\n', '45', '', 1522132939, 1523862413, 0, 0, 0, '', '部门负责人', '女', '非常重要', 0.00);
INSERT INTO `mx_contacts` VALUES (14, 1, '包大大', 'ceo', '', '', '先生', '15023726868', 'asd@qq.com', '1421514791', '\n\n\n', '', '', 1522661194, 1522835054, 0, 0, 0, '', '', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (15, 1, '赵航宇', 'HR总监', '', '', '', '13254875565', '514561456@qq.com', '514561456', '重庆市\n市辖区\n永川区\n太行街道123号', '400016', '', 1523521343, 1523521343, 0, 0, 0, '', '', '', '一般', 0.00);
INSERT INTO `mx_contacts` VALUES (16, 1, '张张', '董事长', '', '', '', '18785858585', '78@qq.com', '787878785', '\n\n\n', '', '', 1523580718, 1523580718, 0, 0, 0, '', '', '女', '非常重要', 0.00);
INSERT INTO `mx_contacts` VALUES (17, 1, '老王', 'ceo', '', '', '女士', '15023726868', '34564531@qq.com', '34564531', '重庆市\n市辖区\n沙坪坝区\n大学城虎溪街道D+M大厦', '', '', 1523842431, 1523861986, 0, 0, 0, '', '部门负责人', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (18, 10, 'ss', '', '', '', '', '18785858585', '', '', '\n\n\n', '', '', 1523857076, 1523857076, 0, 0, 0, '', '', '男', '非常重要', 0.00);
INSERT INTO `mx_contacts` VALUES (19, 1, '测试用户', '测试经理', '', '', '', '15023726868', '', '', '\n\n\n', '', '', 1524126969, 1524126969, 0, 0, 0, '', '', '男', '非常重要', 0.00);
INSERT INTO `mx_contacts` VALUES (21, 21, '11', '1', '', '', '', '18785859696', '78@qq.com', '784596', '北京市\n\n\n1', '1', '', 1524534256, 1524534256, 0, 0, 0, '', '', '女', '非常重要', 0.00);
INSERT INTO `mx_contacts` VALUES (22, 24, '556', '78121', '', '', '', '', '', '', '北京市\n市辖区\n东城区\n', '', '', 1524726906, 1524726906, 0, 0, 0, '', '', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (23, 1, 'ewge ', 'gheh', '', '', '', '13220355451', '23323423@qq.com', '23323423', '天津市\n市辖区\n河东区\n', '', '', 1524737445, 1524737445, 0, 0, 0, '', '', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (26, 25, 'HR', 'HR', '', '', '', '13883657242', '', '', '\n\n\n', '', '', 1524823745, 1524823745, 0, 0, 0, '', '', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (27, 1, ' 妖怪啊', '打妖怪', '', '', '', '13333333333', 'Email@email.com', '5555555555', '重庆市\n市辖区\n沙坪坝区\n', '400000', 'boom boom boom ', 1526613832, 1526613832, 0, 0, 0, '', '', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (28, 1, 'Steve Jobs', 'CEO', '', '', '', '13254875565', '514561456@qq.com', '5445554', '其它\n美洲\n美国\nSome where', '401220', '', 1539849722, 1540520025, 0, 0, 0, '', '总经理', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (29, 1, '杨浩', '杨浩', '', '', '', '13883168271', '', '', '\n\n\n', '', '', 1540274889, 1540274889, 0, 0, 0, '', '', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (30, 1, 'asa', 'dsasda', '', '', '', '13883168271', '', '389812249', '\n\n\n', '', '', 1540376005, 1540376005, 0, 0, 0, '', '', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (31, 1, '测试', 'HR', '', '', '', '15511111111', '562314521@qq.com', '562314521', '\n\n\n', '', '', 1543919170, 1543919170, 0, 0, 0, '', '', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (32, 1, 'test', 'HR', '', '', '', '15311111111', '1@qq.com', '1', '\n\n\n', '', '', 1543919871, 1543919871, 0, 0, 0, '', '', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (33, 1, 'QQ', 'HR', '', '', '', '15400000000', '123456@qq.com', '123456', '北京市\n\n\n测试大道', '405400', '', 1543978432, 1543978432, 0, 0, 0, '', '', '女', '非常重要', 0.00);
INSERT INTO `mx_contacts` VALUES (34, 1, '15', '13', '', '', '17', '18', '21', '19', '22\n23\n24\n25', '26', '27', 1543991117, 0, 0, 0, 0, '', '16', '20', '14', 0.00);
INSERT INTO `mx_contacts` VALUES (35, 1, '15', '13', '', '', '17', '18', '21', '19', '22\n23\n24\n25', '26', '27', 1543991253, 0, 0, 0, 0, '', '16', '20', '14', 0.00);
INSERT INTO `mx_contacts` VALUES (36, 1, '15', '13', '', '', '17', '18', '21', '19', '22\n23\n24\n25', '26', '27', 1543991276, 0, 0, 0, 0, '', '16', '20', '14', 0.00);
INSERT INTO `mx_contacts` VALUES (37, 1, 'test!', '测试1', '', '', '', '15511111111', '1245@qq.com', '1', '湖南省\n株洲市\n荷塘区\n1', '1', '1', 1543993475, 1543993475, 0, 0, 0, '', '', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (38, 1, 'hai', 'lianxi', '', '', '', '18200000000', '123@qq.com', '23', '广东省\n中山市\n\n', '', '', 1543994657, 1543994657, 0, 0, 0, '', '', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (39, 1, 'qinhaili', 'HR', '', '', '', '18535623311', '1288@qq.com', '1', '\n\n\n', '', '', 1543994692, 1543994810, 0, 0, 0, '', 'HR', '女', '较弱', 0.00);
INSERT INTO `mx_contacts` VALUES (40, 1, '1', '1', '', '', '', '15511111111', '', '', '\n\n\n', '', '', 1544075183, 1544075183, 0, 0, 0, '', '', '男', '重要', 0.00);
INSERT INTO `mx_contacts` VALUES (41, 1, '12', '11', '', '', '', '15622222222', '', '12', '\n\n\n', '', '', 1544075260, 1544075285, 0, 0, 0, '', 'HR', '男', '非常重要', 123.23);
INSERT INTO `mx_contacts` VALUES (42, 56, 'lina-', 'HR', '', '', '', '15811111111', '12345678@22.com', '123457', '湖南省\n长沙市\n市辖区\n111', '4000000', '', 1544237640, 1544509339, 0, 0, 0, '', '人事经理', '女', '非常重要', 23.28);
INSERT INTO `mx_contacts` VALUES (43, 1, '111', '111', '', '', '', '18983160353', '59@qq.com', '4546', '湖南省\n株洲市\n芦淞区\n123213', '21321', '', 1544410345, 1544410345, 0, 0, 0, '', '', '男', '非常重要', 111.00);
INSERT INTO `mx_contacts` VALUES (44, 56, 'w', 'w', '', '', '', '15232562526', '', '', '\n\n\n', '', '', 1544413464, 1544413464, 0, 0, 0, '', '人事经理', '男', '一般', 0.00);
INSERT INTO `mx_contacts` VALUES (45, 53, '21', '123', '', '', '', '18983160353', '123@qq.com', '123', '广东省\n中山市\n\nqweq', 'qwe', '', 1544433994, 1544433994, 0, 0, 0, '', '部门负责人', '男', '一般', 123.00);
INSERT INTO `mx_contacts` VALUES (46, 59, '1', '1', '', '', '', '18983160353', '1@qq.cm', '11', '湖北省\n黄石市\n黄石港区\n1', '1', '', 1544437481, 1544437481, 0, 0, 0, '', 'HR', '女', '一般', 1.00);
INSERT INTO `mx_contacts` VALUES (47, 1, 'qweqwe', 'qweqwe', '', '', '', '18983160353', '4@qq.com', '591@qq.com', '湖南省\n株洲市\n市辖区\nqweqwe', 'qweqwe', '', 1544498420, 1544498420, 0, 0, 0, '', '部门负责人', '男', '非常重要', 12.00);
INSERT INTO `mx_contacts` VALUES (48, 1, '4589+', '111', '', '', '', '18983160353', '59@qq.com', '559', '河南省\n周口市\n市辖区\nqweq', 'qwe', '', 1544499306, 1544499306, 0, 0, 0, '', 'HR', '男', '非常重要', 111.00);
INSERT INTO `mx_contacts` VALUES (49, 1, 'qw', '99999', '', '', '', '18983160353', 'q@qq.com', '59999', '湖北省\n宜昌市\n西陵区\n12321', '213', '', 1544499828, 1544499828, 0, 0, 0, '', '部门负责人', '男', '非常重要', 111.00);
INSERT INTO `mx_contacts` VALUES (50, 1, '4589+', 'qweqwe', '', '', '', '18983160353', '59@qq.com', '维护人添加测试2', '湖南省\n长沙市\n市辖区\n维护人添加测试2', '维护人添加测试2', '', 1544500171, 1544500171, 0, 0, 0, '', 'HR', '男', '非常重要', 111.00);
INSERT INTO `mx_contacts` VALUES (51, 1, '54', '45', '', '', '', '18983160353', '59@qq.com', '5959', '广东省\n中山市\n\n898', '8989', '', 1544501189, 1544501189, 0, 0, 0, '', '部门负责人', '男', '重要', 5454.00);
INSERT INTO `mx_contacts` VALUES (52, 1, '4589+', '111', '', '', '', '18983160353', '59@qq.com', '123213', '湖南省\n长沙市\n芙蓉区\n12312', '213', '', 1544501845, 1544501845, 0, 0, 0, '', 'HR', '男', '重要', 111.00);
INSERT INTO `mx_contacts` VALUES (53, 1, '4589+', 'qweqwe', '', '', '', '18983160353', '59@qq.com', '999', '湖南省\n长沙市\n市辖区\nq', '去', '', 1544501952, 1544501952, 0, 0, 0, '', '部门负责人', '男', '一般', 111.00);
INSERT INTO `mx_contacts` VALUES (54, 1, 'a', 'asd', '', '', '', '18983160353', '59@qq.com', '66', '湖南省\n株洲市\n荷塘区\n11', '111', '', 1544508678, 1544508678, 0, 0, 0, '', '部门负责人', '男', '重要', 100.00);
INSERT INTO `mx_contacts` VALUES (55, 0, '1', '1', '', '', '11', '1', '11', '1', '1\n11\n1\n11', '1', '11', 1544523204, 0, 0, 0, 0, '', '1', '1', '11', 11.00);
INSERT INTO `mx_contacts` VALUES (56, 0, '1', '1', '', '', '11', '1', '11', '1', '1\n11\n1\n11', '1', '11', 1544523391, 0, 0, 0, 0, '', '1', '1', '11', 11.00);

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

-- ----------------------------
-- Records of mx_contacts_data
-- ----------------------------
INSERT INTO `mx_contacts_data` VALUES (1, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (2, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (3, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (4, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (5, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (6, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (7, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (8, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (9, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (10, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (11, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (12, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (13, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (14, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (15, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (16, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (17, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (18, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (24, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (19, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (20, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (21, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (22, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (23, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (25, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (26, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (27, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (28, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (29, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (30, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (31, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (32, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (33, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (34, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (35, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (36, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (37, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (38, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (39, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (40, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (41, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (42, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (43, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (44, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (45, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (46, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (47, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (48, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (49, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (50, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (51, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (52, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (53, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (54, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (55, '', 0, '', '', '');
INSERT INTO `mx_contacts_data` VALUES (56, '', 0, '', '', '');

-- ----------------------------
-- Table structure for mx_r_contacts_customer
-- ----------------------------
DROP TABLE IF EXISTS `mx_r_contacts_customer`;
CREATE TABLE `mx_r_contacts_customer`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `contacts_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 57 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of mx_r_contacts_customer
-- ----------------------------
INSERT INTO `mx_r_contacts_customer` VALUES (1, 1, 1);
INSERT INTO `mx_r_contacts_customer` VALUES (2, 2, 1);
INSERT INTO `mx_r_contacts_customer` VALUES (3, 3, 25);
INSERT INTO `mx_r_contacts_customer` VALUES (4, 4, 23);
INSERT INTO `mx_r_contacts_customer` VALUES (5, 5, 22);
INSERT INTO `mx_r_contacts_customer` VALUES (6, 6, 28);
INSERT INTO `mx_r_contacts_customer` VALUES (7, 7, 29);
INSERT INTO `mx_r_contacts_customer` VALUES (8, 8, 28);
INSERT INTO `mx_r_contacts_customer` VALUES (9, 9, 33);
INSERT INTO `mx_r_contacts_customer` VALUES (10, 10, 34);
INSERT INTO `mx_r_contacts_customer` VALUES (11, 11, 35);
INSERT INTO `mx_r_contacts_customer` VALUES (12, 12, 36);
INSERT INTO `mx_r_contacts_customer` VALUES (13, 13, 37);
INSERT INTO `mx_r_contacts_customer` VALUES (14, 14, 39);
INSERT INTO `mx_r_contacts_customer` VALUES (15, 15, 42);
INSERT INTO `mx_r_contacts_customer` VALUES (16, 16, 43);
INSERT INTO `mx_r_contacts_customer` VALUES (17, 17, 44);
INSERT INTO `mx_r_contacts_customer` VALUES (18, 18, 45);
INSERT INTO `mx_r_contacts_customer` VALUES (19, 19, 47);
INSERT INTO `mx_r_contacts_customer` VALUES (20, 20, 47);
INSERT INTO `mx_r_contacts_customer` VALUES (21, 21, 48);
INSERT INTO `mx_r_contacts_customer` VALUES (22, 22, 50);
INSERT INTO `mx_r_contacts_customer` VALUES (23, 23, 52);
INSERT INTO `mx_r_contacts_customer` VALUES (24, 24, 52);
INSERT INTO `mx_r_contacts_customer` VALUES (25, 25, 52);
INSERT INTO `mx_r_contacts_customer` VALUES (26, 26, 53);
INSERT INTO `mx_r_contacts_customer` VALUES (27, 27, 39);
INSERT INTO `mx_r_contacts_customer` VALUES (28, 28, 55);
INSERT INTO `mx_r_contacts_customer` VALUES (29, 29, 56);
INSERT INTO `mx_r_contacts_customer` VALUES (30, 30, 57);
INSERT INTO `mx_r_contacts_customer` VALUES (31, 31, 32);
INSERT INTO `mx_r_contacts_customer` VALUES (32, 32, 60);
INSERT INTO `mx_r_contacts_customer` VALUES (33, 33, 62);
INSERT INTO `mx_r_contacts_customer` VALUES (34, 34, 65);
INSERT INTO `mx_r_contacts_customer` VALUES (35, 35, 66);
INSERT INTO `mx_r_contacts_customer` VALUES (36, 36, 67);
INSERT INTO `mx_r_contacts_customer` VALUES (37, 37, 63);
INSERT INTO `mx_r_contacts_customer` VALUES (38, 38, 61);
INSERT INTO `mx_r_contacts_customer` VALUES (39, 39, 61);
INSERT INTO `mx_r_contacts_customer` VALUES (40, 40, 68);
INSERT INTO `mx_r_contacts_customer` VALUES (41, 41, 65);
INSERT INTO `mx_r_contacts_customer` VALUES (42, 42, 70);
INSERT INTO `mx_r_contacts_customer` VALUES (43, 43, 72);
INSERT INTO `mx_r_contacts_customer` VALUES (44, 44, 73);
INSERT INTO `mx_r_contacts_customer` VALUES (45, 45, 75);
INSERT INTO `mx_r_contacts_customer` VALUES (46, 46, 76);
INSERT INTO `mx_r_contacts_customer` VALUES (47, 47, 78);
INSERT INTO `mx_r_contacts_customer` VALUES (48, 48, 79);
INSERT INTO `mx_r_contacts_customer` VALUES (49, 49, 80);
INSERT INTO `mx_r_contacts_customer` VALUES (50, 50, 81);
INSERT INTO `mx_r_contacts_customer` VALUES (51, 51, 82);
INSERT INTO `mx_r_contacts_customer` VALUES (52, 52, 83);
INSERT INTO `mx_r_contacts_customer` VALUES (53, 53, 84);
INSERT INTO `mx_r_contacts_customer` VALUES (54, 54, 85);
INSERT INTO `mx_r_contacts_customer` VALUES (55, 55, 87);
INSERT INTO `mx_r_contacts_customer` VALUES (56, 56, 91);

SET FOREIGN_KEY_CHECKS = 1;
