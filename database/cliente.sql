/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : cliente

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2020-02-12 16:41:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Apellido` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Correo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Telefono` int(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES ('2', '4567', 'Exitus', 'Credit', 'Exitus@credit.com', '345678');
