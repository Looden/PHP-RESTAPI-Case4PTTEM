/*
 Navicat Premium Data Transfer

 Source Server         : 192.168.20.205
 Source Server Type    : MySQL
 Source Server Version : 80029
 Source Host           : localhost:3306
 Source Schema         : test

 Target Server Type    : MySQL
 Target Server Version : 80029
 File Encoding         : 65001

 Date: 26/07/2022 18:48:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for clients
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `request_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of clients
-- ----------------------------
INSERT INTO `clients` VALUES (1, 'cimri', '1234-4321');
INSERT INTO `clients` VALUES (2, 'facebook', '5678-8765');
INSERT INTO `clients` VALUES (3, 'google', '1357-2468');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `price` decimal(10, 2) NULL DEFAULT NULL,
  `category` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'Product 1', 1.00, 'Electronic');
INSERT INTO `products` VALUES (2, 'Product 2', 2.00, 'Fashion');
INSERT INTO `products` VALUES (3, 'Product 3', 3.00, 'Home Decor');
INSERT INTO `products` VALUES (4, 'Product 4', 4.00, 'Electronic');
INSERT INTO `products` VALUES (5, 'Product 5', 5.00, 'Fashion');
INSERT INTO `products` VALUES (6, 'Product 6', 6.00, 'Home Decor');
INSERT INTO `products` VALUES (7, 'Product 7', 7.00, 'Electronic');
INSERT INTO `products` VALUES (8, 'Product 8', 8.00, 'Fashion');
INSERT INTO `products` VALUES (9, 'Product 9', 9.00, 'Home Decor');
INSERT INTO `products` VALUES (10, 'Product 10', 10.00, 'Electronic');
INSERT INTO `products` VALUES (11, 'Product 11', 11.00, 'Fashion');
INSERT INTO `products` VALUES (12, 'Product 12', 12.00, 'Home Decor');
INSERT INTO `products` VALUES (13, 'Product 13', 13.00, 'Electronic');
INSERT INTO `products` VALUES (14, 'Product 14', 14.00, 'Fashion');
INSERT INTO `products` VALUES (15, 'Product 15', 15.00, 'Home Decor');
INSERT INTO `products` VALUES (16, 'Product 16', 16.00, 'Electronic');
INSERT INTO `products` VALUES (17, 'Product 17', 17.00, 'Fashion');
INSERT INTO `products` VALUES (18, 'Product 18', 18.00, 'Home Decor');
INSERT INTO `products` VALUES (19, 'Product 19', 19.00, 'Electronic');
INSERT INTO `products` VALUES (20, 'Product 20', 20.00, 'Fashion');

SET FOREIGN_KEY_CHECKS = 1;
