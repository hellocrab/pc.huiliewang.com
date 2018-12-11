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

 Date: 11/12/2018 20:57:02
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
  `is_deleted` int(1) NULL DEFAULT NULL COMMENT '是否删除',
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
) ENGINE = MyISAM AUTO_INCREMENT = 92 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '本表存放客户的相关信息' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mx_customer
-- ----------------------------
INSERT INTO `mx_customer` VALUES (70, '56,49', NULL, NULL, 56, 56, 42, 'lina-quanxian', NULL, NULL, '入职快', '040', NULL, 1544237640, 1544408515, 1544237640, 1544494860, 0, 1, 0, 0, '5', '040', '已成交客户', '', 'gongsijianjie', '', '河南省\n省直辖县级行政区划\n济源市\n1', 'aihao', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (23, '', NULL, NULL, 1, 1, 0, '343434343434', NULL, '蔡雅', '蔡雅', 'IT/教育', NULL, 1520478683, 1520498724, 1520478683, 0, 0, 0, 0, 0, '', '030', '准备拜访', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (24, '', NULL, NULL, 1, 1, 0, '343', NULL, '蔡雅', '蔡雅', 'IT/教育', NULL, 1520478721, 1520498750, 1520478721, 0, 0, 0, 0, 0, '', '030', '重点客户', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (25, '', NULL, NULL, 1, 1, 0, '3333333333333333333333', NULL, '蔡雅', '蔡雅', '对外贸易', NULL, 1520479632, 1520498709, 1520479632, 0, 0, 0, 0, 0, '1', '030', '试单客户', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (22, '', NULL, NULL, 12, 1, 0, '222222222222222', NULL, '蔡雅', '蔡雅', 'IT/教育', NULL, 1520478542, 1523865591, 1521535367, 0, 0, 0, 0, 0, '', '030', '电话沟通', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (26, '', NULL, NULL, 15, 2, 0, '菜单', NULL, '蔡雅', '蔡雅', '酒店、旅游', NULL, 1520501275, 1521536830, 1521536830, 0, 0, 1, 0, 0, '1', '030', '电话沟通', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (27, '', NULL, NULL, 0, 1, 0, '哈哈哈', NULL, '蔡雅', '蔡雅', 'IT/教育', NULL, 1520501140, 1523865256, 1523864757, 0, 0, 0, 0, 0, '1', '030', '重点客户', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (28, '', NULL, NULL, 1, 1, 6, '张静公司', NULL, '蔡雅', '蔡雅', 'IT/教育', NULL, 1520501514, 1523517949, 1520584656, 0, 0, 1, 0, 0, '1', '030', '重点客户', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (29, '', NULL, NULL, 7, 7, 0, 'asd', NULL, '蔡雅', '蔡雅', '酒店、旅游', NULL, 1520502061, 1520502061, 1520502061, 0, 0, 0, 0, 0, '1', '030', '准备拜访', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (30, '', NULL, NULL, 6, 6, 0, 'cwgewrg', NULL, '蔡雅', '蔡雅', 'IT/教育', NULL, 1520503763, 1520503763, 1520503763, 0, 0, 0, 0, 0, '1', '030', '试单客户', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (78, '53', NULL, NULL, 1, 1, 47, '新增客户选择测试分配为维护人', NULL, NULL, '面试快', '090', NULL, 1544498420, 1544511057, 1544498420, 1545286980, 0, 0, 0, 0, '5', '130210', '试单客户', '18983160353', '按时打ds', '', '湖南省\n怀化市\n会同县\n213213', '123', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (32, '', NULL, NULL, 1, 1, 0, '撒大声地', NULL, '蔡雅', '哈哈', 'IT/教育', NULL, 1520643713, 1522382010, 1520643713, 0, 0, 1, 0, 0, '1', '030', '已成交客户', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (33, '', NULL, NULL, 48, 1, 0, '重庆大大公司', NULL, '蔡雅', '哈哈', '电子/商务', NULL, 1520925885, 1544001003, 1543974118, 0, 0, 1, 0, 0, '1', '030', '试单客户', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (34, '', NULL, NULL, 1, 1, 0, '娃哈哈', NULL, '8', '3', '房地产·建筑·物业', NULL, 1521453048, 1415548800, 1544524936, 0, 0, 0, 0, 0, '1', '030', '电话沟通', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (50, '11,24', NULL, NULL, 53, 24, 22, '唯品会', NULL, NULL, '电话营销', '040', NULL, 1524726906, 1544522352, 1544522352, NULL, 0, 0, 0, 0, '4', '020', '重点客户', '1234567890', '邱强强', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (35, '', NULL, NULL, 11, 12, 11, '任天堂', NULL, '9', '', '020', NULL, 1521534033, 1523931255, 1521534033, 1524708840, 0, 0, 0, 0, '1', '030', '电话沟通', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (36, '', NULL, NULL, 6, 15, 0, '盛大', NULL, '12', '10', '互联网·游戏·软件', NULL, 1521534668, 1522381435, 1521534668, 0, 0, 1, 0, 0, '1', '030', '准备拜访', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (37, '', NULL, NULL, 8, 1, 13, '7878', NULL, '14', '网络营销', '互联网·游戏·软件', NULL, 1522132939, 1524642980, 1524641044, 1524727440, 0, 1, 0, 0, '4', '030', '准备拜访', '', '', '123', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (38, '', NULL, NULL, 1, 1, 0, '产品测试客户', NULL, '1', '15', '190', NULL, 1522638896, 1523341359, 1522749511, 0, 0, 0, 0, 0, '1', '030', '准备签约', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (39, '', NULL, NULL, 1, 1, 14, '阿里大于', NULL, NULL, '网络营销', '190', NULL, 1522661194, 1543977441, 1523354830, 1522727340, 0, 1, 0, 0, '3', '030', '无意向', '13220353645', '啊啊啊啊啊啊啊', '123', '北京市\n市辖区\n西城区\n文革挖', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (41, '14', NULL, NULL, 1, 1, 0, '上海建工集团江西投资发展有限公司1', NULL, NULL, '', '340', NULL, 1523417032, 1543998560, 1543974127, 0, 0, 0, 0, 0, '4', '020', '试单客户', '1111111', '1111111111111111111', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (42, '3,6,7,9', NULL, NULL, 1, 1, 15, '重庆朝华科技有限公司', NULL, NULL, '网络营销', '010', NULL, 1523521343, 1523930724, 1523521343, 0, 0, 0, 0, 0, '4', '040', '黑名单', '13225457859', '重庆朝华科技有限公司是一家专注建设WAP开发科技有限公司在重庆已有10年历史，目前涉及大部分领域。', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (43, '3', NULL, NULL, 61, 1, 16, '天津有限公司', NULL, NULL, '电话营销', '040', NULL, 1523580718, 1544518583, 1544518583, 1527472260, 0, 0, 0, 0, '5', '030', '重点客户', '18545454858', '天津天津天津天津天津天津天津天津天津天津天津天津天津天津天津天津天津天津天津天津天津天津天津天津天津天津天津天津', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (44, '15,16,17', NULL, NULL, 1, 1, 17, '星期六', NULL, NULL, '电话营销', '190', NULL, 1523842431, 1543989472, 1523873910, 1523861040, 0, 1, 0, 0, '4', '030', '试单客户', '15023726868', '生产经营皮鞋、皮革制品（国家有特殊规定的按规定办理）及售后服务。从事鞋类、皮革制品、箱包、皮鞋护理用品、皮革材料、服装、服饰、针纺织品、帽、眼镜、工艺美术品（除金、银制品）、日用百货、日化产品、电子类产品的批发...', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (45, '10', NULL, NULL, 10, 10, 18, '111111', NULL, NULL, '电话营销', '050', NULL, 1523857076, 1524102383, 1523857076, NULL, 0, 0, 0, 0, '5', '020', '重点客户', '18752525252', '111', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (46, '1,3', NULL, NULL, 1, 1, 0, '111', NULL, NULL, '', '', NULL, 1523933788, 1543994318, 1543912000, 0, 0, 0, 0, 0, '', '020', '无状态', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (71, '49', NULL, NULL, 1, 49, 0, 'q', NULL, NULL, '入职快', '080', NULL, 1544256393, 1544497746, 1544497619, 0, 0, 0, 0, 0, '5', '020', '试单客户', '', 'q', '', '北京市\n市辖区\n西城区\n', 'q', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (48, '21', NULL, NULL, 21, 21, 21, '二级岗位客户名称', NULL, NULL, '电话营销', '040', NULL, 1524534256, 1524621004, 1524534256, NULL, 0, 1, 0, 0, '5', '050020', '重点客户', '18795859696', '111', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (49, '22', NULL, NULL, 22, 22, 0, '三级测试客户', NULL, NULL, '电话营销', '040', NULL, 1524536436, 1524536477, 1524536436, NULL, 0, 0, 0, 0, '5', '020', '试单客户', '18791589763', '11', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (51, '25', NULL, NULL, 49, 25, 0, '上海机动车检测认证技术研究中心有限公司', NULL, NULL, '网络营销', '250', NULL, 1524728973, 1544492745, 1544492745, 0, 0, 0, 0, 0, '5', '020', '重点客户', '18883869585', '公司拥有国际一流的汽车整车实验室、汽车被动安全实验室、机动车排放与节能实验室、机动车安全部件及环境实验室、机动车电磁兼容（EMC）实验室、摩托车综合实验室、机动车灯具实验室、新能源机动车专项检测实验室、计量检定校准实验室等一批国际一流、国能先进的实验室。 公司的检测技术服务能力覆盖汽车、摩托车、新能源汽车、各类零部件产品，开展车辆安全、环保、节能和防盗等各项强制性项目的检测，各类研发性的检测试验及技术研究，开展包括车辆碰撞安全性、NVH、发动机系统匹配、车辆道路综合性能及可靠性、电磁兼容性（EMC）、各类零部件及材料的环境及耐候性等研发检测试验。', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (52, '29', NULL, NULL, 29, 29, 0, '新华南方管理咨询有限公司', NULL, NULL, '网络营销', '120', NULL, 1524733655, 1539314751, 1524733655, NULL, 0, 1, 0, 0, '5', '010', '重点客户', '', '南方新华， 即重庆南方新华企业管理咨询有限公司，专注于高级人才猎头服务及企业人力资源管理咨询。\r\n南方新华是国际猎头服务标准的典范，24小时极速交付属国内首创，同时，为HR提供专业的人力资源培训服务及企业人力资源系统管理咨询服务。\r\n南方新华拥有一支高学历、工作经验丰富、规模领先的人力资源服务专家团队，中层管理人员由毕业于国内名牌大学经济、金融、工商管理、理工科研究生及以上学历的骨干成员组成。截止2017年4月，人力资源专家服务团队规模突破600人，已跃居国内前列。\r\n 南方新华成为一流人力资源服务机构，离不开和君集团的支持。和君咨询：亚洲最大的咨询公司之一。持续经营十几年，累计服务数千家企业和政府客户，包括央企和民企，跨国公司、500强和中小企业，遍布国内和国外，客户满意率达到98%以上。目前，平均每个工作日签约2-3单，全年执行管理咨询和投资银行类项目超过500个， 在数十个行业里积累有丰富的案例和经验。和君资本：以VC、PE和PIPE的方式，为企业提供资金和资本运作的系统解决方案，为高净值人士或机构提供财富管理服务。累计管理基金百亿元，管理上海市政府、福建省政府、重庆市政府等多个政府引导基金和产业基金。累计投资了100多家创新企业、拟上市企业和上市公司。\r\n目前，已有1万多家企业选用南方新华人力资源服务。南方新华将继续依托和君新华顶尖管理咨询专家团队，及人民大学校友会基金资源，巩固和扩大人才服务优势，成为中国企业高级人才猎头服务及人力资源专业服务的首选品牌。', '', '', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (53, '25', NULL, NULL, 1, 25, 0, '成都炫影全息科技有限公司', NULL, NULL, '电话营销', '040', NULL, 1524823714, 1544516785, 1544516785, NULL, 0, 0, 0, 0, '5', '280020', '重点客户', '', '成都炫影全息科技有限公司，是一家专注全息以及裸眼3D的专业型高新技术企业。公司总部位于四川省成都市，下设有两家分公司，分别位于北京和台北，在全国各省市区拥有上千家加盟商，业务范围覆盖全国。 公司正式创办于2013年，是全国成功将全息系统产品化并成功运用于婚庆、演艺、晚会、电视节目等行业的科技公司。在毫无参照的基础上，公司逐步摸索、大胆创新。凭着专业的水准和良好的服务在各行业、多领域内赢得一片喝彩和好评。作为中国全息运用的开拓者，公司始终秉持“专一、专业、专心”的服务理念，一步一个脚印，实现了从无到有，从小到大的稳步发展，始终引领着行业的发展态势。', '', '北京市\n市辖区\n东城区\n', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (54, '1,3,6,7', NULL, NULL, 1, 1, 0, '南方新华', NULL, NULL, '入职快', '120', NULL, 1526606196, 1543993277, 1543993277, NULL, 0, 0, 0, 0, '5', '040', '重点客户', '', '33312664526154626', '', '重庆市\n市辖区\n沙坪坝区\n', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (55, '1', NULL, NULL, 1, 1, 28, 'Apple', NULL, NULL, '面试快', '060', NULL, 1539849722, 1543917792, 1539849722, 1540354200, 0, 1, 0, 0, '5', '420050050', '重点客户', '', 'Apple\r\n', '', '其它\n美洲\n美国\nSome where', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (56, '26', NULL, NULL, 49, 1, 0, '杨浩', NULL, NULL, '网络营销', '040', NULL, 1540274727, 1543904391, 1540274792, 1540275420, 0, 1, 0, 0, '2', '010', '已成交客户', '', 'sad撒a', '', '重庆市\n市辖区\n\n', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (57, '47', NULL, NULL, 0, 1, 30, '在心中', NULL, NULL, '入职快', '020', NULL, 1540376005, 1544426648, 1544423002, NULL, 0, 0, 0, 0, '4', '040', '重点客户', '12', '打算', '', '重庆市\n市辖区\n南岸区\n撒打算', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (69, '47,48,49', NULL, NULL, 1, 1, 0, '尽快离开', NULL, NULL, '入职快', '190', NULL, 1544064262, 1544064262, 1544064262, NULL, 0, 1, 0, 0, '', '170020', '已成交客户', '', '回鹘', '', '湖北省\n黄石市\n黄石港区\n回鹘', 'uihu', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (59, '53', NULL, NULL, 1, 1, 0, '测试q', NULL, NULL, '面试快', '090', NULL, 1543903948, 1543977473, 1543903948, NULL, 0, 0, 0, 0, '5', '040', '重点客户', '', 'haibucuo', '', '重庆市\n市辖区\n合川区\n', 'chichichi', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (60, '55', NULL, NULL, 1, 1, 32, '重庆正大集团', NULL, NULL, '入职快', '080', NULL, 1543919871, 1544003392, 1543919871, NULL, 0, 1, 0, 0, '5', '060190', '试单客户', '', '房地产', '', '广东省\n中山市\n\n', '没得', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (61, '', NULL, NULL, 1, 1, 0, 'T-CESHI ', NULL, NULL, '上门推销', '130', NULL, 1543978178, 1543995434, 1543989632, 1544081760, 0, 1, 0, 0, '', '210180', '重点客户', '', '主打测试', '', '湖南省\n长沙市\n\n', '运动', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (62, '48', NULL, NULL, 1, 1, 33, 'TT', NULL, NULL, '电话营销', '080', NULL, 1543978432, 1544510965, 1543978432, 1544064840, 0, 0, 0, 0, '1', '160180', '准备签约', '123', '12', '', '广东省\n东莞市\n\nqqq', '运动', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (63, '47,48', NULL, NULL, 1, 1, 0, '啦啦啦啦', NULL, NULL, '入职快', '020', NULL, 1543981826, 1543981826, 1543981826, NULL, 0, 0, 0, 0, '4', '170020', '准备拜访', '', '测试来啦', '', '湖南省\n株洲市\n\n街道', '没得', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (68, '47,49,50', NULL, NULL, 1, 1, 0, '12', NULL, NULL, '面试快', '090', NULL, 1543998511, 1543998511, 1543998511, NULL, 0, 0, 0, 0, '3', '170020', '重点客户', '', '2', '', '广东省\n中山市\n\nqq2', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (65, 'f', NULL, NULL, 1, 1, 34, 'a', NULL, NULL, '电话营销', 'c', NULL, 1543991117, 1544077414, 1543991117, 1545286980, 0, 1, 0, 0, '2', 'd', '准备签约', 'e', 'h', '', 'i\ng\nk\nl', 'b', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (67, 'f', NULL, NULL, 1, 1, 36, 'ceshi gonghai', NULL, NULL, '电话营销', 'c', NULL, 1543991276, 1543999928, 1543992257, 0, 0, 1, 0, 0, '2', 'd', '黑名单', 'e', 'h', '', '', 'b', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (72, '1', NULL, NULL, 53, 1, 43, '客户添加测试', NULL, NULL, '入职快', '010', NULL, 1544410345, 1544519668, 1544519668, 0, 0, 0, 0, 0, '5', '160190', '试单客户', '18983160353', '阿大声道', '', '广东省\n潮州市\n市辖区\n啊实打实打', '没有', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (73, '49', NULL, NULL, 58, 56, 44, 'gongsikehu', NULL, NULL, '入职快', '010', NULL, 1544413464, 1544508635, 1544413464, NULL, 0, 1, 0, 0, '5', '020', '试单客户', '15230232032', 'gongsijianjie', '', '浙江省\n宁波市\n海曙区\n', '', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (74, '58', NULL, NULL, 0, 58, 0, 'kehu---qq', NULL, NULL, '网络营销', '050', NULL, 1544425503, 1544519218, 1544519218, NULL, 0, 0, 0, 0, '5', '170020', '无意向', '15511111111', 'gongsi jianjie-qq kehu ', '', '湖南省\n湘西土家族苗族自治州\n泸溪县\n', '爱好', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (79, '53', NULL, NULL, 1, 1, 48, 'asasdeq', NULL, NULL, '电话营销', '080', NULL, 1544499306, 1544499306, 1544499306, NULL, 0, 0, 0, 0, '5', '070290', '准备签约', '18983160353', '123213', '', '湖南省\n湘潭市\n岳塘区\n123213', 'qweqwe', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (80, '53', NULL, NULL, 61, 1, 49, '维护人测试1', NULL, NULL, '入职快', '100', NULL, 1544499828, 1544522375, 1544522375, NULL, 0, 0, 0, 0, '5', '070290', '准备签约', '18983160353', '12312', '', '湖北省\n荆州市\n市辖区\n123', '没有', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (81, '53', NULL, NULL, 1, 1, 50, '维护人添加测试2', NULL, NULL, '入职快', '080', NULL, 1544500171, 1544500171, 1544500171, NULL, 0, 0, 0, 0, '5', '060020', '试单客户', '18983160353', '维护人添加测试2', '', '湖北省\n随州市\n市辖区\n维护人添加测试2', '维护人添加测试2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (82, '53', NULL, NULL, 1, 1, 51, '维护人添加测试3', NULL, NULL, '入职快', '040', NULL, 1544501189, 1544501189, 1544501189, NULL, 0, 0, 0, 0, '5', '050170', '准备签约', '18983160353', '维护人添加测试2', '', '黑龙江省\n牡丹江市\n东安区\n啊实打实打', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (83, '53', NULL, NULL, 1, 1, 52, '维护人添加测试为', NULL, NULL, '入职快', '130', NULL, 1544501845, 1544501845, 1544501845, NULL, 0, 0, 0, 0, '5', '270090', '试单客户', '18983160353', 'aad', '', '湖北省\n咸宁市\n市辖区\n啊实打实打', 'q', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (84, '53', NULL, NULL, 61, 1, 53, '委会人啊', NULL, NULL, '入职快', '090', NULL, 1544501952, 1544519707, 1544519707, NULL, 0, 0, 0, 0, '5', '060020', '重点客户', '18983160353', 'ad', '', '湖南省\n怀化市\n靖州苗族侗族自治县\n啊实打实打', '没有', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (85, '60,53', NULL, NULL, 61, 1, 54, 'wowo', NULL, NULL, '入职快', '040', NULL, 1544508678, 1544518583, 1544518583, NULL, 0, 0, 0, 0, '4', '040', '试单客户', '18983160353', 'aaa', '', '湖南省\n郴州市\n桂东县\naaa', '798', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (86, NULL, '刘欢', 'Amber', NULL, NULL, 0, '大连达利凯普科技有限公司1', '大连达利凯普科技有限公司1', NULL, '', '1', NULL, 2147483647, 2147483647, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '意向客户', '', NULL, NULL, '', '', '#17687', '', '', NULL, NULL);
INSERT INTO `mx_customer` VALUES (87, '1', NULL, NULL, 0, 1, 55, '1', NULL, NULL, '面试快', '1', NULL, 1544523204, 1544523204, 1544523204, 0, NULL, NULL, NULL, NULL, '1', '1', '试单客户', '1', '1', NULL, '1\n1\n1\n1', '1', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_customer` VALUES (88, NULL, '刘欢', 'Amber', NULL, NULL, 0, '大连达利凯普科技有限公司1', '大连达利凯普科技有限公司1', NULL, '', '1', NULL, 1544513525, 1544513613, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '意向客户', '', NULL, NULL, '', '', '#17687', '', '', NULL, NULL);
INSERT INTO `mx_customer` VALUES (89, NULL, '刘欢', 'Amber', NULL, NULL, 0, '大连达利凯普科技有限公司1', '大连达利凯普科技有限公司1', NULL, '', '1', NULL, 1544513525, 1544513613, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '意向客户', '', NULL, NULL, '', '', '#17687', '', '', NULL, NULL);
INSERT INTO `mx_customer` VALUES (90, NULL, '刘欢', 'Amber', 0, 1, 0, '大连达利凯普科技有限公司1', '大连达利凯普科技有限公司1', NULL, '', '1', NULL, 1544513525, 1544513613, NULL, NULL, 0, 0, 0, NULL, '1', '1', '意向客户', '', NULL, NULL, '', '', '#17687', '', '', NULL, NULL);
INSERT INTO `mx_customer` VALUES (91, '1', NULL, NULL, 0, 1, 56, '公害测试', NULL, NULL, '面试快', '1', NULL, 1544523391, 1544523391, 1544523391, 0, NULL, NULL, NULL, NULL, '1', '1', '试单客户', '1', '1', NULL, '1\n1\n1\n1', '1', NULL, NULL, NULL, NULL, NULL);

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
  PRIMARY KEY (`customer_id`) USING BTREE,
  UNIQUE INDEX `customer_id`(`customer_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '客户附表信息' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mx_customer_data
-- ----------------------------
INSERT INTO `mx_customer_data` VALUES (70, '', '', '123www', '12345678@22.com', '78988554', '1000万', '无', '互联网外包', '50以下', '早上8:00-下午17：00', '五险两金', '车补餐补', 'jiben +ticheng');
INSERT INTO `mx_customer_data` VALUES (78, '', 'hjoi', '12321', '21312@qq.com', '3213213', 'ijoi', 'jio', 'oi', 'joijo', 'jio', 'joi', 'joi', 'liji');
INSERT INTO `mx_customer_data` VALUES (22, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (30, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (29, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (28, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (27, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (26, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (25, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (24, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (23, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (32, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (33, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (34, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (35, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (36, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (37, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (38, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (39, '', '', 'www.baidu.com', '1421514791@qq.com', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (41, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (42, '', '', 'www.100msh.cn', '3165565@qq.com', '023-65487554', '5000万', '朝阳科技', '徽网科技 蚂蚁支付', '200-500人', '早9:00-晚5:00', '五险一金', '车补和提供住宿', '基本工资加绩效提成');
INSERT INTO `mx_customer_data` VALUES (43, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (44, '', '11', 'www.yew44.com44', '1245@qq.com', '78988554', '123232', '11', 'ss45', '11', '11', '11', '11', '111');
INSERT INTO `mx_customer_data` VALUES (45, '', '', 'www.baidu.com', '1223@qq.com', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (46, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (71, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (48, '', '', '1', '1223@qq.com', '1', '1', '11', '1', '1', '1', '1', '1', '1');
INSERT INTO `mx_customer_data` VALUES (49, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (50, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (51, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (52, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (53, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (54, '', '', 'www.nfxhlt.com', '13233214568@163.com', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (55, '', '', 'www.apple.com', 'text3@qq.com', '023-65487554', '5000万', '朝阳科技', '徽网科技 蚂蚁支付', '200-500人', '早9:00-晚5:00', '五险一金', '车补和提供住宿', '基本工资加绩效提成');
INSERT INTO `mx_customer_data` VALUES (56, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (57, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (59, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (60, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (61, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (62, '', '备注11', 'www。qq', '562314500@qq.com', '562314500', '1个亿0', 'DD', '互联网+', '100-500', '8-17', '五险一金', '车补', '基本工资');
INSERT INTO `mx_customer_data` VALUES (63, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (68, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (69, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (65, '', '12', '1', '2', '3', '7', '8', '5', '6', '9', '10', '11', '4');
INSERT INTO `mx_customer_data` VALUES (67, '', '12', '1', '2', '3', '7', '8', '5', '6', '9', '10', '11', '4');
INSERT INTO `mx_customer_data` VALUES (72, '', '456', '78998', '789@qq.com', '789', '64', '546', '45', '646', '456', '4', '54665', '465');
INSERT INTO `mx_customer_data` VALUES (73, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (74, '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `mx_customer_data` VALUES (79, '', '465', '78998', '21312@qq.com', '3213213', '46', '456', '456', '456', '456', '46', '4', '1');
INSERT INTO `mx_customer_data` VALUES (80, '', '64', '21312', '45@qq.com', '6456', '4564', '56', '564', '56', '46', '546', '544', '4');
INSERT INTO `mx_customer_data` VALUES (81, '', '维护人添加测试2', '维护人添加测试2', '591013798@qq.com', '维护人添加测试2', '456', '8', '维护人添加测试2', '维护人添加测试2', '564', '10', '11', '维护人添加测试2');
INSERT INTO `mx_customer_data` VALUES (82, '', '55', '78998', '591013798@qq.com', '789', '维护人添加测试2', '8', '5', '646', '564', '55', '55', '11');
INSERT INTO `mx_customer_data` VALUES (83, '', '213123', '12321213', '123@qq.com', '213123', '7', '8', '213123', '646', '564', '10', '11', '213123');
INSERT INTO `mx_customer_data` VALUES (84, '', '5', '5', '591013798@qq.com', '5', '5', '5', '5', '55', '55', '5', '55', '55');
INSERT INTO `mx_customer_data` VALUES (85, '', 'asd', '999', '99@qq.com', '9', 'asd', 'asd', 'ads', 'asd', 'asd', 'asd', 'asd', '99');
INSERT INTO `mx_customer_data` VALUES (87, '', '1', '11', '1', '11', '11', '1', '11', '1', '11', '1', '11', '1');
INSERT INTO `mx_customer_data` VALUES (91, '', '1', '11', '1', '11', '11', '1', '11', '1', '11', '1', '11', '1');
INSERT INTO `mx_customer_data` VALUES (90, '', NULL, '', '', '', '', '', '', '', '', '', '', '');

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
) ENGINE = MyISAM AUTO_INCREMENT = 35 CHARACTER SET = ascii COLLATE = ascii_general_ci COMMENT = '客户记录表' ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of mx_customer_record
-- ----------------------------
INSERT INTO `mx_customer_record` VALUES (1, 1, 16, 1521535034, 1);
INSERT INTO `mx_customer_record` VALUES (2, 27, 1, 1521535078, 1);
INSERT INTO `mx_customer_record` VALUES (3, 22, 13, 1521535367, 1);
INSERT INTO `mx_customer_record` VALUES (4, 1, 13, 1521535397, 1);
INSERT INTO `mx_customer_record` VALUES (5, 31, 16, 1521535444, 2);
INSERT INTO `mx_customer_record` VALUES (6, 26, 16, 1521536830, 1);
INSERT INTO `mx_customer_record` VALUES (7, 37, 1, 1524641044, 1);
INSERT INTO `mx_customer_record` VALUES (8, 58, 1, 1543912000, 1);
INSERT INTO `mx_customer_record` VALUES (9, 46, 1, 1543912000, 1);
INSERT INTO `mx_customer_record` VALUES (10, 43, 1, 1543912000, 1);
INSERT INTO `mx_customer_record` VALUES (11, 67, 1, 1543992257, 2);
INSERT INTO `mx_customer_record` VALUES (12, 54, 1, 1543993277, 2);
INSERT INTO `mx_customer_record` VALUES (13, 57, 1, 1544422963, 2);
INSERT INTO `mx_customer_record` VALUES (14, 57, 1, 1544423002, 2);
INSERT INTO `mx_customer_record` VALUES (15, 51, 1, 1544423156, 2);
INSERT INTO `mx_customer_record` VALUES (16, 51, 1, 1544423257, 2);
INSERT INTO `mx_customer_record` VALUES (17, 72, 1, 1544427025, 1);
INSERT INTO `mx_customer_record` VALUES (18, 51, 61, 1544492685, 1);
INSERT INTO `mx_customer_record` VALUES (19, 51, 61, 1544492745, 1);
INSERT INTO `mx_customer_record` VALUES (20, 71, 1, 1544497619, 2);
INSERT INTO `mx_customer_record` VALUES (21, 53, 1, 1544516785, 2);
INSERT INTO `mx_customer_record` VALUES (22, 43, 1, 1544517015, 1);
INSERT INTO `mx_customer_record` VALUES (23, 43, 73, 1544518540, 1);
INSERT INTO `mx_customer_record` VALUES (24, 85, 73, 1544518540, 1);
INSERT INTO `mx_customer_record` VALUES (25, 43, 73, 1544518583, 1);
INSERT INTO `mx_customer_record` VALUES (26, 85, 73, 1544518583, 1);
INSERT INTO `mx_customer_record` VALUES (27, 84, 65, 1544518956, 2);
INSERT INTO `mx_customer_record` VALUES (28, 50, 65, 1544519028, 2);
INSERT INTO `mx_customer_record` VALUES (29, 72, 65, 1544519668, 2);
INSERT INTO `mx_customer_record` VALUES (30, 84, 73, 1544519707, 2);
INSERT INTO `mx_customer_record` VALUES (31, 50, 65, 1544519916, 2);
INSERT INTO `mx_customer_record` VALUES (32, 50, 65, 1544522352, 2);
INSERT INTO `mx_customer_record` VALUES (33, 80, 73, 1544522375, 2);
INSERT INTO `mx_customer_record` VALUES (34, 34, 1, 1544524936, 1);

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
) ENGINE = MyISAM AUTO_INCREMENT = 36 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of mx_customer_share
-- ----------------------------
INSERT INTO `mx_customer_share` VALUES (9, 12, 15, 35, 1521536496);
INSERT INTO `mx_customer_share` VALUES (8, 15, 13, 36, 1521535266);
INSERT INTO `mx_customer_share` VALUES (7, 15, 12, 36, 1521535266);
INSERT INTO `mx_customer_share` VALUES (6, 1, 8, 28, 1520584646);
INSERT INTO `mx_customer_share` VALUES (10, 15, 12, 26, 1521536847);
INSERT INTO `mx_customer_share` VALUES (11, 15, 13, 26, 1521536847);
INSERT INTO `mx_customer_share` VALUES (13, 1, 52, 62, 1543979558);
INSERT INTO `mx_customer_share` VALUES (18, 1, 48, 62, 1543991820);
INSERT INTO `mx_customer_share` VALUES (15, 1, 48, 61, 1543980197);
INSERT INTO `mx_customer_share` VALUES (21, 56, 50, 73, 1544413631);
INSERT INTO `mx_customer_share` VALUES (26, 53, 1, 75, 1544434005);
INSERT INTO `mx_customer_share` VALUES (27, 1, 53, 75, 1544434021);
INSERT INTO `mx_customer_share` VALUES (29, 49, 50, 56, 1544491140);
INSERT INTO `mx_customer_share` VALUES (30, 49, 56, 51, 1544492801);

SET FOREIGN_KEY_CHECKS = 1;
