/*
Navicat MySQL Data Transfer

Source Server         : kevin
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : hxframework

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-08-27 10:12:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for about
-- ----------------------------
DROP TABLE IF EXISTS `about`;
CREATE TABLE `about` (
  `about_id` int(11) NOT NULL AUTO_INCREMENT,
  `about_category_id` int(11) NOT NULL,
  `about_title` varchar(255) NOT NULL,
  `type` int(3) NOT NULL DEFAULT '1',
  `about_content` text NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `sort_id` int(11) DEFAULT NULL,
  `time_create` varchar(11) NOT NULL,
  `time_update` varchar(11) NOT NULL,
  `page_keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `page_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `status` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`about_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of about
-- ----------------------------
INSERT INTO `about` VALUES ('1', '0', '加入我们吧', '1', '好好好', '', '2', '1519704891', '1528109770', '关键字111', '页面描述', '1');
INSERT INTO `about` VALUES ('2', '1', '免责声明', '1', '好好好', null, '2', '1519704891', '1519704891', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('3', '0', '市场合作', '1', '好好好', '', '3', '1519704891', '1528109664', '关键字', '', '1');
INSERT INTO `about` VALUES ('4', '1', '企业采购', '1', '好好好', null, '4', '1519704891', '1519704891', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('5', '2', '品牌态度', '1', '好好好', null, '5', '1519704891', '1519704891', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('6', '2', '官方验证', '1', '好好好', null, '6', '1519704891', '1520682905', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('7', '2', '保真承诺', '1', '好好好', null, '7', '1519704891', '1519704891', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('8', '2', '联系客服', '1', '好好好', null, '8', '1519704891', '1519704891', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('9', '2', '隐私条款', '1', '好好好', null, '9', '1519704891', '1519704891', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('10', '2', '赝品赔付', '1', '好好好', null, '10', '1519704891', '1519704891', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('11', '3', '会员及vip服务', '1', '好好好', null, '11', '1519704891', '1519704891', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('12', '3', '购物流程', '1', '好好好', null, '12', '1519704891', '1519704891', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('13', '3', '物流配送', '1', '好好好', null, '13', '1519704891', '1519704891', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('14', '3', '交易条款', '1', '好好好', null, '14', '1519704891', '1519704891', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('15', '4', '支付流程', '1', '好好好', null, '15', '1519704891', '1519704891', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('16', '4', '公司转账', '1', '好好好', null, '16', '1519704891', '1519704891', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('17', '4', '银行转账', '1', '好好好', null, '17', '1519704891', '1519704891', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('18', '4', '支付转账', '1', '好好好', null, '18', '1519704891', '1519704891', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('19', '5', '发票政策', '1', '好好好', null, '19', '1519704891', '1519704891', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('20', '5', '售后政策', '1', '好好好', null, '20', '1519704891', '1520683010', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('21', '5', '退货政策', '1', '好好好', null, '21', '1519704891', '1519704891', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('22', '5', '退款流程', '1', '好好好', null, '22', '1519704891', '1519704891', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('23', '6', '定制服务', '1', '好好好', null, '23', '1519704891', '1519704891', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('24', '6', '官方验证', '1', '好好好', null, '24', '1519704891', '1519704891', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('25', '6', 'VIP验证', '1', '好好好', null, '25', '1519704891', '1519704891', '关键字', '关键字', '1');
INSERT INTO `about` VALUES ('26', '1', '广汇股份', '1', 'fgjfg', '', '255', '1520749628', '1520749682', 'ggjh', 'fhjhgmg', '-1');
INSERT INTO `about` VALUES ('27', '1', '会员注册协议', '1', '', '', '255', '1520922719', '1520922719', '会员注册', '会员注册', '1');
INSERT INTO `about` VALUES ('28', '1', '隐私保护声明', '1', '', '', '255', '1520922755', '1520922755', '', '', '1');
INSERT INTO `about` VALUES ('29', '0', '哈哈哈', '1', '', '', '255', '1528109036', '1528109036', '', '', '-1');
INSERT INTO `about` VALUES ('30', '10', '如火如荼', '2', '&lt;img src=&quot;http://img.hxframework.com/image/20180605/20180605181446_55763.jpg&quot; alt=&quot;&quot; /&gt;', '//www.mi.com', '255', '1528193622', '1528193736', '耿浩', '方彩娣', '1');

-- ----------------------------
-- Table structure for about_category
-- ----------------------------
DROP TABLE IF EXISTS `about_category`;
CREATE TABLE `about_category` (
  `about_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '1',
  `relation` varchar(255) DEFAULT NULL,
  `about_category_title` varchar(255) NOT NULL,
  `sort_id` int(11) DEFAULT NULL,
  `time_create` varchar(11) DEFAULT NULL,
  `time_update` varchar(11) DEFAULT NULL,
  `status` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`about_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of about_category
-- ----------------------------
INSERT INTO `about_category` VALUES ('11', '0', '1', null, '观众服务', '255', '1534124889', '1534124889', '1');
INSERT INTO `about_category` VALUES ('12', '0', '1', null, '联系我们', '255', '1534124903', '1534124903', '1');
INSERT INTO `about_category` VALUES ('13', '0', '1', null, '商旅服务', '255', '1534124919', '1534124919', '1');
INSERT INTO `about_category` VALUES ('14', '0', '1', null, '现场活动', '255', '1534124931', '1534124931', '1');
INSERT INTO `about_category` VALUES ('15', '0', '1', null, '新闻中心', '255', '1534124942', '1534124942', '1');
INSERT INTO `about_category` VALUES ('16', '0', '1', null, '展会概况', '255', '1534124967', '1534124967', '1');
INSERT INTO `about_category` VALUES ('17', '0', '1', null, '展商服务', '255', '1534124997', '1534124997', '1');

-- ----------------------------
-- Table structure for brochure
-- ----------------------------
DROP TABLE IF EXISTS `brochure`;
CREATE TABLE `brochure` (
  `brochure_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `brochure_title` varchar(255) NOT NULL,
  `brochure_img` varchar(255) DEFAULT NULL,
  `brochure_content` varchar(255) DEFAULT NULL,
  `is_recommend` int(3) DEFAULT NULL,
  `home_show` int(3) DEFAULT NULL,
  `sort_id` int(11) DEFAULT NULL,
  `time_create` varchar(11) NOT NULL,
  `time_update` varchar(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`brochure_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of brochure
-- ----------------------------

-- ----------------------------
-- Table structure for brochure_category
-- ----------------------------
DROP TABLE IF EXISTS `brochure_category`;
CREATE TABLE `brochure_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `category_name` varchar(255) DEFAULT NULL,
  `category_key` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `is_show` int(3) DEFAULT NULL,
  `sort_id` int(11) DEFAULT NULL,
  `time_create` varchar(11) DEFAULT NULL,
  `time_update` varchar(11) DEFAULT NULL,
  `status` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of brochure_category
-- ----------------------------

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `reply_id` int(11) NOT NULL DEFAULT '0',
  `content` varchar(255) NOT NULL,
  `device_name` varchar(255) DEFAULT NULL COMMENT '安卓或者ios',
  `time_create` varchar(11) NOT NULL,
  `status` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=247 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('103', '0', '0', '0', 'fsdf', null, '', '1');
INSERT INTO `comment` VALUES ('212', '0', '12', '0', '', null, '', '1');
INSERT INTO `comment` VALUES ('213', '0', '12', '0', '', null, '', '1');
INSERT INTO `comment` VALUES ('214', '0', '12', '212', '', null, '', '1');
INSERT INTO `comment` VALUES ('215', '0', '13', '212', '', null, '', '1');
INSERT INTO `comment` VALUES ('216', '0', '31', '212', '', null, '', '1');
INSERT INTO `comment` VALUES ('217', '0', '33', '5621', '', null, '', '1');
INSERT INTO `comment` VALUES ('218', '0', '30', '5621', '', null, '', '1');
INSERT INTO `comment` VALUES ('219', '0', '0', '0', 'fsdf', null, '', '1');
INSERT INTO `comment` VALUES ('220', '0', '33', '0', '这个是对文章的评论', null, '', '-1');
INSERT INTO `comment` VALUES ('221', '0', '33', '0', '这个是对文章的评论', null, '', '1');
INSERT INTO `comment` VALUES ('222', '0', '33', '0', '这个是对文章的评论', null, '', '1');
INSERT INTO `comment` VALUES ('223', '0', '33', '222', '这个是对文章的回复1', null, '', '1');
INSERT INTO `comment` VALUES ('224', '0', '33', '222', '文章的回复2', null, '', '-1');
INSERT INTO `comment` VALUES ('225', '0', '33', '221', '文章的回复3', null, '', '-1');
INSERT INTO `comment` VALUES ('226', '0', '33', '221', '文章的回复4', null, '', '1');
INSERT INTO `comment` VALUES ('227', '0', '33', '0', '佛挡杀佛', null, '', '1');
INSERT INTO `comment` VALUES ('228', '0', '33', '0', '佛挡杀佛', null, '', '1');
INSERT INTO `comment` VALUES ('229', '0', '33', '0', '佛挡杀佛', null, '', '1');
INSERT INTO `comment` VALUES ('230', '0', '33', '23', '佛挡杀佛', null, '', '1');
INSERT INTO `comment` VALUES ('231', '0', '33', '0', '佛挡杀佛', null, '', '-1');
INSERT INTO `comment` VALUES ('232', '0', '33', '0', '佛挡杀佛', null, '', '1');
INSERT INTO `comment` VALUES ('233', '0', '33', '0', '佛挡杀佛', null, '', '-1');
INSERT INTO `comment` VALUES ('234', '0', '33', '0', '佛挡杀佛', null, '', '-1');
INSERT INTO `comment` VALUES ('235', '0', '33', '0', '佛挡杀佛', null, '', '1');
INSERT INTO `comment` VALUES ('236', '0', '33', '0', '佛挡杀佛', null, '', '-1');
INSERT INTO `comment` VALUES ('237', '0', '33', '0', '佛挡杀佛', null, '', '1');
INSERT INTO `comment` VALUES ('238', '0', '33', '0', '佛挡杀佛', null, '', '1');
INSERT INTO `comment` VALUES ('239', '0', '33', '0', '佛挡杀佛', null, '', '1');
INSERT INTO `comment` VALUES ('240', '0', '33', '0', '佛挡杀佛', null, '', '1');
INSERT INTO `comment` VALUES ('241', '0', '33', '0', '佛挡杀佛', null, '', '1');
INSERT INTO `comment` VALUES ('242', '0', '33', '0', '佛挡杀佛', null, '', '1');
INSERT INTO `comment` VALUES ('243', '0', '33', '0', '佛挡杀佛', null, '', '1');
INSERT INTO `comment` VALUES ('244', '0', '33', '0', '佛挡杀佛', null, '', '1');
INSERT INTO `comment` VALUES ('245', '0', '33', '0', '佛挡杀佛', null, '', '-1');
INSERT INTO `comment` VALUES ('246', '0', '33', '0', '佛挡杀佛', null, '', '1');

-- ----------------------------
-- Table structure for manage_admin
-- ----------------------------
DROP TABLE IF EXISTS `manage_admin`;
CREATE TABLE `manage_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `tm_create` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '创建时间',
  `tm_update` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '更新时间',
  `login_num` int(11) DEFAULT NULL COMMENT '登录次数',
  `last_login_time` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '最后一次登录时间',
  `last_login_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '最后一次登录IP',
  `sort_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1004 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of manage_admin
-- ----------------------------
INSERT INTO `manage_admin` VALUES ('1001', 'admin', 'fc1c837c285fce4bd99e05a80abf7477', '1527681600', '1528094012', '60', '1535335425', '127.0.0.1', '1', '1');
INSERT INTO `manage_admin` VALUES ('1002', 'chaos1217', '86b35201388bce0ba45239632d23891c', '1527822336', '1528335904', '1', '1527822378', '127.0.0.1', '255', '1');
INSERT INTO `manage_admin` VALUES ('1003', 'kevin', 'e0f9d5eca7c325bada96b7a568d558d1', '1528335922', '1528335922', '0', null, null, '25', '1');

-- ----------------------------
-- Table structure for manage_admin_log
-- ----------------------------
DROP TABLE IF EXISTS `manage_admin_log`;
CREATE TABLE `manage_admin_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL COMMENT '帐号ID',
  `login_tm` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '登录时间',
  `login_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '登录IP',
  `fail_msg` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10077 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of manage_admin_log
-- ----------------------------
INSERT INTO `manage_admin_log` VALUES ('10003', '1001', '1527685727', '127.0.0.1', '账户异常', '1');
INSERT INTO `manage_admin_log` VALUES ('10004', '1001', '1527685762', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10005', '1001', '1527685802', '127.0.0.1', '密码错误', '1');
INSERT INTO `manage_admin_log` VALUES ('10006', '1001', '1527685861', '127.0.0.1', '密码错误', '1');
INSERT INTO `manage_admin_log` VALUES ('10007', '1001', '1527685872', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10008', '1001', '1527686105', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10009', '1001', '1527686662', '127.0.0.1', '密码错误', '1');
INSERT INTO `manage_admin_log` VALUES ('10010', '1001', '1527686677', '127.0.0.1', '账户异常', '1');
INSERT INTO `manage_admin_log` VALUES ('10011', '1001', '1527686692', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10012', '1001', '1527686797', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10013', '1001', '1527687985', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10014', '1001', '1527730396', '127.0.0.1', '密码错误', '1');
INSERT INTO `manage_admin_log` VALUES ('10015', '1001', '1527730403', '127.0.0.1', '密码错误', '1');
INSERT INTO `manage_admin_log` VALUES ('10016', '1001', '1527730446', '127.0.0.1', '密码错误', '1');
INSERT INTO `manage_admin_log` VALUES ('10017', '1001', '1527730453', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10018', '1001', '1527754553', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10019', '1001', '1527759411', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10020', '1001', '1527759434', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10021', '1002', '1527820876', '127.0.0.1', null, '-1');
INSERT INTO `manage_admin_log` VALUES ('10022', '1002', '1527820891', '127.0.0.1', '密码错误', '-1');
INSERT INTO `manage_admin_log` VALUES ('10023', '1002', '1527820898', '127.0.0.1', null, '-1');
INSERT INTO `manage_admin_log` VALUES ('10024', '1001', '1527822164', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10025', '1002', '1527822355', '127.0.0.1', '密码错误', '-1');
INSERT INTO `manage_admin_log` VALUES ('10026', '1001', '1527822366', '127.0.0.1', '密码错误', '1');
INSERT INTO `manage_admin_log` VALUES ('10027', '1002', '1527822378', '127.0.0.1', null, '-1');
INSERT INTO `manage_admin_log` VALUES ('10028', '1001', '1530170818', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10029', '1001', '1530243808', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10030', '1001', '1530497435', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10031', '1001', '1530498094', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10032', '1001', '1530498107', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10033', '1001', '1530498211', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10034', '1001', '1530504865', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10035', '1001', '1530582804', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10036', '1001', '1530598867', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10037', '1001', '1530676527', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10038', '1001', '1530695154', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10039', '1001', '1530703553', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10040', '1001', '1530758210', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10041', '1001', '1530768753', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10042', '1001', '1530842079', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10043', '1001', '1530865172', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10044', '1001', '1530881495', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10045', '1001', '1530881721', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10046', '1001', '1530882523', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10047', '1001', '1531099784', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10048', '1001', '1531101975', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10049', '1001', '1531102075', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10050', '1001', '1531137837', '192.168.99.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10051', '1001', '1531138394', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10052', '1001', '1531205201', '192.168.99.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10053', '1001', '1531275577', '192.168.99.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10054', '1001', '1531275791', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10055', '1001', '1531366917', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10056', '1001', '1531367055', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10057', '1001', '1532083521', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10058', '1001', '1533011400', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10059', '1001', '1533184713', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10060', '1001', '1533783260', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10061', '1001', '1533786182', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10062', '1001', '1533786724', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10063', '1001', '1534121648', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10064', '1001', '1534123430', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10065', '1001', '1534124768', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10066', '1001', '1534130156', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10067', '1001', '1534130301', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10068', '1001', '1534130426', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10069', '1001', '1535098138', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10070', '1001', '1535099020', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10071', '1001', '1535099077', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10072', '1001', '1535108485', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10073', '1001', '1535162898', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10074', '1001', '1535165738', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10075', '1001', '1535188685', '127.0.0.1', null, '1');
INSERT INTO `manage_admin_log` VALUES ('10076', '1001', '1535335425', '127.0.0.1', null, '1');

-- ----------------------------
-- Table structure for manage_menu
-- ----------------------------
DROP TABLE IF EXISTS `manage_menu`;
CREATE TABLE `manage_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL COMMENT '所属父级',
  `menu_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '菜单名',
  `menu_classname` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '菜单icon样式名',
  `menu_relation` varchar(255) DEFAULT NULL,
  `menu_level` int(11) NOT NULL DEFAULT '1',
  `controller` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `action` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `view` int(11) DEFAULT NULL COMMENT '0不显示, 1显示',
  `sort_id` int(11) DEFAULT NULL COMMENT '排序ID',
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1088 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of manage_menu
-- ----------------------------
INSERT INTO `manage_menu` VALUES ('1001', '0', '设置', 'icon-set', '1001', '1', '', '', '1', '1', '1');
INSERT INTO `manage_menu` VALUES ('1002', '0', '管理员', 'icon-users', '1002', '1', null, null, '1', '2', '1');
INSERT INTO `manage_menu` VALUES ('1015', '1001', '菜单设置', '', '1001,1015', '2', 'set', 'menu_list', '1', '4', '1');
INSERT INTO `manage_menu` VALUES ('1016', '1015', '添加菜单', '', '1001,1015,1016', '3', 'set', 'menu_add', '0', '10', '1');
INSERT INTO `manage_menu` VALUES ('1017', '1015', '编辑菜单', '', '1001,1015,1017', '3', 'set', 'menu_edit', '0', '9', '1');
INSERT INTO `manage_menu` VALUES ('1018', '1015', '删除菜单', '', '1001,1015,1018', '3', 'set', 'menu_del', '0', '6', '1');
INSERT INTO `manage_menu` VALUES ('1019', '1002', '管理员列表', '', '1002,1019', '2', 'admin', 'admin_list', '1', '3', '1');
INSERT INTO `manage_menu` VALUES ('1020', '1019', '添加管理员', '', '1002,1019,1020', '3', 'admin', 'admin_add', '0', '6', '1');
INSERT INTO `manage_menu` VALUES ('1021', '1019', '编辑管理员', '', '1002,1019,1021', '3', 'admin', 'admin_edit', '0', '5', '1');
INSERT INTO `manage_menu` VALUES ('1022', '1019', '删除管理员', '', '1002,1019,1022', '3', 'admin', 'admin_del', '0', '4', '1');
INSERT INTO `manage_menu` VALUES ('1023', '1002', '登录日志', '', '1002,1023', '2', 'admin', 'admin_log', '1', '2', '1');
INSERT INTO `manage_menu` VALUES ('1024', '0', '测试', '', '1024', '1', 'manage', 'index', '1', '1', '-1');
INSERT INTO `manage_menu` VALUES ('1025', '0', '测试', '', '1025', '1', 'manage', 'index', '1', '1', '-1');
INSERT INTO `manage_menu` VALUES ('1026', '0', '关于我们', 'icon-about', '1026', '1', '', '', '1', '2', '1');
INSERT INTO `manage_menu` VALUES ('1027', '1026', '栏目管理', '', '1026,1027', '2', '', '', '1', '12', '1');
INSERT INTO `manage_menu` VALUES ('1028', '1027', '添加栏目', '', '1026,1027,1028', '3', 'about', 'about_add', '0', '15', '1');
INSERT INTO `manage_menu` VALUES ('1029', '1027', '编辑栏目', '', '1026,1027,1029', '3', 'about', 'about_edit', '0', '14', '1');
INSERT INTO `manage_menu` VALUES ('1030', '1027', '删除栏目', '', '1026,1027,1030', '3', 'about', 'about_del', '0', '13', '1');
INSERT INTO `manage_menu` VALUES ('1031', '1026', '栏目分类', '', '1026,1031', '2', 'about', 'cate_list', '1', '8', '1');
INSERT INTO `manage_menu` VALUES ('1032', '1031', '添加栏目分类', '', '1026,1031,1032', '3', 'about', 'cate_add', '0', '11', '1');
INSERT INTO `manage_menu` VALUES ('1033', '1031', '编辑栏目分类', '', '1026,1031,1033', '3', 'about', 'cate_edit', '0', '10', '1');
INSERT INTO `manage_menu` VALUES ('1034', '1031', '删除栏目分类', '', '1026,1031,1034', '3', 'about', 'cate_del', '0', '9', '1');
INSERT INTO `manage_menu` VALUES ('1035', '0', '新闻文章', 'icon-news', '1035', '1', '', '', '1', '16', '1');
INSERT INTO `manage_menu` VALUES ('1036', '1035', '添加新闻', '', '1035,1036', '2', 'news', 'add', '0', '22', '-1');
INSERT INTO `manage_menu` VALUES ('1037', '1035', '新闻管理', '', '1035,1037', '2', 'news', 'news_list', '1', '22', '1');
INSERT INTO `manage_menu` VALUES ('1041', '1035', '新闻分类管理', '', '1035,1041', '2', 'news', 'cate_list', '1', '18', '1');
INSERT INTO `manage_menu` VALUES ('1042', '1041', '添加新闻分类', '', '1035,1041,1042', '3', 'news', 'cate_add', '0', '21', '1');
INSERT INTO `manage_menu` VALUES ('1043', '1041', '编辑新闻分类', '', '1035,1041,1043', '3', 'news', 'cate_edit', '0', '20', '1');
INSERT INTO `manage_menu` VALUES ('1044', '1041', '删除新闻分类', '', '1035,1041,1044', '3', 'news', 'cate_del', '0', '19', '1');
INSERT INTO `manage_menu` VALUES ('1045', '0', '画册管理', 'icon-brochure', '1045', '1', '', '', '1', '23', '1');
INSERT INTO `manage_menu` VALUES ('1046', '1045', '画册管理', '', '1045,1046', '2', 'brochure', 'brochure_list', '1', '28', '1');
INSERT INTO `manage_menu` VALUES ('1047', '1046', '添加画册', '', '1045,1046,1047', '3', 'brochure', 'brochure_add', '0', '98', '1');
INSERT INTO `manage_menu` VALUES ('1048', '1046', '编辑画册', '', '1045,1046,1048', '3', 'brochure', 'brochure_edit', '0', '31', '1');
INSERT INTO `manage_menu` VALUES ('1049', '1046', '删除画册', '', '1045,1046,1049', '3', 'brochure', 'brochure_del', '0', '29', '1');
INSERT INTO `manage_menu` VALUES ('1050', '1045', '画册分类管理', '', '1045,1050', '2', 'brochure', 'cate_list', '1', '24', '1');
INSERT INTO `manage_menu` VALUES ('1051', '1050', '添加画册分类', '', '1045,1050,1051', '3', 'brochure', 'cate_add', '0', '27', '1');
INSERT INTO `manage_menu` VALUES ('1052', '1050', '删除画册分类', '', '1045,1050,1052', '3', 'brochure', 'cate_del', '0', '26', '1');
INSERT INTO `manage_menu` VALUES ('1053', '1050', '编辑画册分类', '', '1045,1050,1053', '3', 'brochure', 'cate_edit', '0', '25', '1');
INSERT INTO `manage_menu` VALUES ('1054', '1035', '评论点赞', '', '1035,1054', '2', 'news', 'news_comms', '1', '23', '-1');
INSERT INTO `manage_menu` VALUES ('1055', '1015', '保存排序', '', '1001,1015,1055', '3', 'set', 'menu_order', '1', '5', '-1');
INSERT INTO `manage_menu` VALUES ('1056', '0', '个梵蒂冈', '股份给对方', '1056', '1', '', '', '0', '38', '-1');
INSERT INTO `manage_menu` VALUES ('1057', '1018', '646', '', '1001,1015,1018,1057', '4', '46', '464', '1', '8', '-1');
INSERT INTO `manage_menu` VALUES ('1058', '1018', '测试四级类目', '', '1001,1015,1018,1058', '4', 'fdf', 'yuuytu', '0', '7', '-1');
INSERT INTO `manage_menu` VALUES ('1059', '1047', '发的发的是', '', '1045,1046,1047,1059', '4', 'gfg', 'gfg', '0', '43', '-1');
INSERT INTO `manage_menu` VALUES ('1060', '1049', '估计', '', '1045,1046,1049,1060', '4', 'jgj', 'kj', '0', '30', '-1');
INSERT INTO `manage_menu` VALUES ('1061', '1001', 'cxzc', '', '1001,1061', '2', 'jhk', 'jhk', '0', '2', '-1');
INSERT INTO `manage_menu` VALUES ('1062', '1048', 'fsd', '', '1045,1046,1048,1062', '4', 'kjhk', 'hkj', '0', '32', '-1');
INSERT INTO `manage_menu` VALUES ('1063', '1019', '下下周', '现在', '1002,1019,1063', '3', '现在X', '现在', '0', '0', '-1');
INSERT INTO `manage_menu` VALUES ('1064', '1060', '水电费是否第三方', '', '1045,1046,1049,1060,1064', '5', '辅导费', '辅导费', '0', '0', '-1');
INSERT INTO `manage_menu` VALUES ('1065', '0', '一级分类', '', '1065', '1', '', '', '0', '0', '-1');
INSERT INTO `manage_menu` VALUES ('1066', '1065', '二级分类', '', '1065,1066', '2', '', '', '0', '1', '-1');
INSERT INTO `manage_menu` VALUES ('1067', '1066', '三级分类', '', '1065,1066,1067', '3', '', '', '0', '1', '-1');
INSERT INTO `manage_menu` VALUES ('1068', '1067', '四级分类', '', '1065,1066,1067,1068', '4', '', '', '0', '1', '-1');
INSERT INTO `manage_menu` VALUES ('1069', '1068', '五级分类', '', '1065,1066,1067,1068,1069', '5', '', '', '0', '1', '-1');
INSERT INTO `manage_menu` VALUES ('1070', '1069', '六级分类', '', '1065,1066,1067,1068,1069,1070', '6', '', '', '0', '1', '-1');
INSERT INTO `manage_menu` VALUES ('1071', '1070', '七级分类', '', '1065,1066,1067,1068,1069,1070,1071', '7', '', '', '0', '1', '-1');
INSERT INTO `manage_menu` VALUES ('1072', '1054', '评论详情', '', '1035,1054,1072', '3', 'news', 'comm_detail', '0', '0', '-1');
INSERT INTO `manage_menu` VALUES ('1073', '1054', '点赞详情', '', '1035,1054,1073', '3', 'news', 'vote_detail', '0', '0', '-1');
INSERT INTO `manage_menu` VALUES ('1074', '0', '网站配置', 'icon-set', '1074', '1', '', '', '1', '34', '-1');
INSERT INTO `manage_menu` VALUES ('1075', '1074', '系统设置', '', '1074,1075', '2', 'webset', 'system', '1', '1', '-1');
INSERT INTO `manage_menu` VALUES ('1076', '1080', '会员列表', '', '1080,1076', '2', 'member', 'member_list', '1', '1', '1');
INSERT INTO `manage_menu` VALUES ('1077', '1076', '编辑会员信息', '', '1080,1076,1077', '3', 'member', 'member_edit', '0', '1', '1');
INSERT INTO `manage_menu` VALUES ('1078', '1076', '添加会员信息', '', '1080,1076,1078', '3', 'member', 'member_add', '0', '1', '1');
INSERT INTO `manage_menu` VALUES ('1079', '1076', '删除会员信息', '', '1080,1076,1079', '3', 'member', 'member_del', '0', '1', '1');
INSERT INTO `manage_menu` VALUES ('1080', '0', '人员管理', 'icon-member', '1080', '1', '', '', '1', '2', '1');
INSERT INTO `manage_menu` VALUES ('1081', '1027', '一级栏目', '', '1026,1027,1081', '3', 'about', 'about_list', '1', '255', '1');
INSERT INTO `manage_menu` VALUES ('1082', '1026', '二级栏目', '', '1026,1082', '2', 'about', 'about_sec_list', '1', '255', '-1');
INSERT INTO `manage_menu` VALUES ('1083', '1027', '二级栏目', '', '1026,1027,1083', '3', 'about', 'about_sec_list', '1', '255', '1');
INSERT INTO `manage_menu` VALUES ('1084', '1081', '编辑栏目', '', '1026,1027,1081,1084', '4', 'about', 'about_first_add', '0', '255', '1');
INSERT INTO `manage_menu` VALUES ('1085', '1037', '添加新闻', '', '1035,1037,1085', '3', 'news', 'news_add', '0', '255', '1');
INSERT INTO `manage_menu` VALUES ('1086', '1037', '编辑新闻', '', '1035,1037,1086', '3', 'news', 'news_edit', '0', '255', '1');
INSERT INTO `manage_menu` VALUES ('1087', '1037', '删除新闻', '', '1035,1037,1087', '3', 'news', 'news_del', '0', '255', '1');

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(255) DEFAULT NULL COMMENT '会员姓名',
  `member_mobile` varchar(255) DEFAULT NULL COMMENT '会员手机号码',
  `member_email` varchar(255) DEFAULT NULL COMMENT '会员邮箱账号',
  `member_avatar` varchar(255) DEFAULT NULL COMMENT '会员头像',
  `member_gender` tinyint(255) DEFAULT '1' COMMENT '会员性别 1 男性 2 女性',
  `member_password` varchar(255) DEFAULT NULL COMMENT '会员密码',
  `wechat_openid` varchar(255) DEFAULT NULL COMMENT '微信openid',
  `wechat_avatar` varchar(255) DEFAULT NULL COMMENT '微信头像',
  `wechat_nickname` varchar(255) DEFAULT NULL COMMENT '微信昵称',
  `wechat_province` varchar(255) DEFAULT NULL COMMENT '微信省份信息',
  `wechat_city` varchar(255) DEFAULT NULL COMMENT '微信城市信息',
  `wechat_distinct` varchar(255) DEFAULT NULL COMMENT '微信区域信息',
  `time_reg` varchar(255) DEFAULT NULL COMMENT '注册时间',
  `device_reg` varchar(255) DEFAULT NULL COMMENT '注册设备',
  `ip_reg` varchar(255) DEFAULT NULL COMMENT '注册ip',
  `last_time_login` varchar(255) DEFAULT NULL COMMENT '上次登录时间',
  `last_time_device` varchar(255) DEFAULT NULL COMMENT '上次登录设备',
  `last_time_ip` varchar(255) DEFAULT NULL COMMENT '上次登录ip',
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', 'chaos', '18726196082', '18726196082@139.com', 'https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKeMyjuSUjTUaeDiaVuMwklz4Krcpib3kEr9mkicShw1F8KjUuKe67erwr0bVylrNt8GExBl09ubria2w/132', '1', null, 'openidopenid', 'http://img.mp.sohu.com/upload/20170708/9cf28c85ded5458f8c02911a31614800_th.png', '昵称', '上海', '上海', '松江', '1530862238', '1', '127.0.0.1', '1530862238', '1', '127.0.0.1', '-1');
INSERT INTO `member` VALUES ('2', '宛先生', '18317119662', '1872619697@130.com', null, '1', 'e0f9d5eca7c325bada96b7a568d558d1', null, null, null, null, null, null, '1530867732', '4', '127.0.0.1', null, null, null, '1');
INSERT INTO `member` VALUES ('3', '宛先生', '18317119661', '364975601@qq.com', null, '2', 'f2ed3a4c8df1ccfd7cf334ca2963e0f4', null, null, null, null, null, null, '1530868583', '4', '127.0.0.1', null, null, null, '1');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_content` text NOT NULL,
  `news_img` varchar(255) NOT NULL,
  `is_recommend` int(3) NOT NULL DEFAULT '0',
  `home_show` int(3) NOT NULL DEFAULT '0',
  `is_up` int(3) NOT NULL DEFAULT '0' COMMENT '置顶',
  `sort_id` int(11) NOT NULL,
  `hits` int(11) DEFAULT NULL,
  `page_keywords` varchar(255) DEFAULT NULL,
  `page_description` varchar(255) DEFAULT NULL,
  `time_create` varchar(11) NOT NULL,
  `time_update` varchar(11) NOT NULL,
  `status` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------

-- ----------------------------
-- Table structure for news_category
-- ----------------------------
DROP TABLE IF EXISTS `news_category`;
CREATE TABLE `news_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `pid` int(11) NOT NULL DEFAULT '0',
  `level` int(11) DEFAULT '1',
  `relation` varchar(255) DEFAULT NULL,
  `category_key` varchar(120) NOT NULL COMMENT '分类key',
  `category_name` varchar(120) NOT NULL COMMENT '分类名称',
  `sort_id` smallint(5) NOT NULL COMMENT '排序',
  `is_show` tinyint(3) NOT NULL COMMENT '是否显示',
  `add_time` int(11) NOT NULL COMMENT '添加时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  `number` smallint(5) NOT NULL COMMENT '数量',
  `status` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`),
  KEY `category_name` (`category_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='文章分类';

-- ----------------------------
-- Records of news_category
-- ----------------------------
INSERT INTO `news_category` VALUES ('1', '0', '1', '1', '', '今日头条', '2', '0', '1530182926', '0', '0', '1');
INSERT INTO `news_category` VALUES ('2', '0', '1', '2', '', '昨日头条', '1', '0', '1530183224', '0', '0', '0');
INSERT INTO `news_category` VALUES ('3', '2', '2', '2,3', '', '明星娱乐', '0', '0', '1530702960', '0', '0', '1');
INSERT INTO `news_category` VALUES ('4', '3', '3', '2,3,4', '', '明星绯闻', '0', '0', '1530702977', '0', '0', '0');
