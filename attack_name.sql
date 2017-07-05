/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : txttest

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2017-06-23 10:37:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for attack_name
-- ----------------------------
DROP TABLE IF EXISTS `attack_name`;
CREATE TABLE `attack_name` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `attack` int(11) NOT NULL DEFAULT '0',
  `sel` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of attack_name
-- ----------------------------
INSERT INTO `attack_name` VALUES ('1', '网络异常连接', '0', '1');
INSERT INTO `attack_name` VALUES ('2', 'DDos攻击', '0', '1');
INSERT INTO `attack_name` VALUES ('3', '未授权下载 ', '0', '1');
INSERT INTO `attack_name` VALUES ('4', '非法登录', '0', '1');
INSERT INTO `attack_name` VALUES ('5', '页面被篡改', '0', '1');
INSERT INTO `attack_name` VALUES ('6', '攻击次数', '0', '1');
INSERT INTO `attack_name` VALUES ('7', '发现后门', '0', '1');
INSERT INTO `attack_name` VALUES ('8', '暴力破解成功', '0', '1');
INSERT INTO `attack_name` VALUES ('9', '肉鸡行动', '0', '1');
INSERT INTO `attack_name` VALUES ('10', '发现漏洞', '0', '1');
INSERT INTO `attack_name` VALUES ('11', '发现弱口令', '0', '1');
INSERT INTO `attack_name` VALUES ('12', '新发现资产', '0', '1');
