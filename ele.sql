/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1_3306
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : ele

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-07-15 10:09:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2018_06_06_224947_entrust_setup_tables', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'manage_user', '用户管理', '管理用户的权限', '2018-06-09 16:49:00', '2018-06-09 16:49:00');

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'admin', '管理员', 'super admin role', '2018-06-09 16:49:00', '2018-06-09 16:49:00');

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------

-- ----------------------------
-- Table structure for take_admins
-- ----------------------------
DROP TABLE IF EXISTS `take_admins`;
CREATE TABLE `take_admins` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aname` varchar(32) NOT NULL,
  `password` char(255) NOT NULL,
  `tel` varchar(16) DEFAULT NULL,
  `auth` tinyint(1) DEFAULT '1',
  `ctime` int(11) DEFAULT NULL,
  PRIMARY KEY (`aid`),
  UNIQUE KEY `unique` (`aname`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_admins
-- ----------------------------
INSERT INTO `take_admins` VALUES ('13', 'gggggg', '1', '15135769192', '1', '1526721486');
INSERT INTO `take_admins` VALUES ('17', '6666666', '$2y$10$Jdc8Ovv9qBk5e5mA/6NDKeTy1LeEVRo5v5z2pHg3Tq3O8m2H37dHO', '15135769192', '2', '1526721639');
INSERT INTO `take_admins` VALUES ('21', 'wangyulin', '$2y$10$8ASyDSmKZzbXq9vtL9LwwuS5Ybvnq4d1H4nGaMDgIWWQ6aSZkchQS', '13852637489', '2', '1526721864');
INSERT INTO `take_admins` VALUES ('22', 'ff', '11', '15135769192', '2', '1526721907');
INSERT INTO `take_admins` VALUES ('24', '2', '$2y$10$hsA3LQALusGLp3Kv7CenoeT6YPO8ealrSPJ4lznsyZchYkYlSGXU6', '13444444444', '1', '1526989671');
INSERT INTO `take_admins` VALUES ('26', '22', '$2y$10$8Smx6KP4pZQsBWfqEu70Le1mc/cryAi6CC.LBR3wqjLSUNN6jkkaO', '1344', '1', '1526991328');
INSERT INTO `take_admins` VALUES ('28', '666', '$2y$10$iB6zjATX.Pd1cf7nl3JwLO.TIVKGXXiKPv9N.S7ecq7YSAVTydda6', '17692512469', '1', '1527487518');
INSERT INTO `take_admins` VALUES ('29', 'kkk', '1', '15131577304', '2', '1527489611');
INSERT INTO `take_admins` VALUES ('30', 'wang11', '$2y$10$YRc9Mxq6kEDEUfcPtRBM0.TijL93V7zANG4F0X6wSwv.30swzXuBm', '15131577304', '1', '1527495706');
INSERT INTO `take_admins` VALUES ('31', 'xushuo', '$2y$10$aXxWdjRcVFsutaVTLYDvl.uSBV6f/Wtrg3TPrkzcvXRNMqaM/vxji', '15131577303', '1', '1527560328');
INSERT INTO `take_admins` VALUES ('32', 'jzq', '$2y$10$RXseu.LDWhL0obpf.Od0WeHql9FNZGshha.0Z5LsTqiydxdTxVl5G', '15135769192', '1', '1527683970');
INSERT INTO `take_admins` VALUES ('33', '15131577303', '$2y$10$H8v0irh0HizhaASWf5HrJuWt1MhuHw4LH9CRq75KcYHeIGAhCJyDG', '15131577303', '2', '1527729034');

-- ----------------------------
-- Table structure for take_advertis
-- ----------------------------
DROP TABLE IF EXISTS `take_advertis`;
CREATE TABLE `take_advertis` (
  `lid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lname` varchar(32) DEFAULT NULL,
  `lpic` varchar(255) DEFAULT NULL,
  `sort` varchar(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_advertis
-- ----------------------------
INSERT INTO `take_advertis` VALUES ('4', '/home/merchant/index/19', '/upload/1527043290_7911.jpg', 'a', '0');
INSERT INTO `take_advertis` VALUES ('8', '/home/merchant/index/15', '/upload/1527043317_8156.jpg', 'e', '1');
INSERT INTO `take_advertis` VALUES ('9', '/home/merchant/index/24', '/upload/1527037529_5180.jpg', 'f', '0');
INSERT INTO `take_advertis` VALUES ('10', '/home/merchant/index/14', '/upload/1527054930_7057.jpg', 'g', '0');
INSERT INTO `take_advertis` VALUES ('11', '/home/merchant/index/25', '/upload/1527080258_7599.jpg', 'h', '1');
INSERT INTO `take_advertis` VALUES ('15', '/home/merchant/index/23', '/upload/1527038134_4526.jpg', 'j', '0');
INSERT INTO `take_advertis` VALUES ('19', '/home/merchant/index/11', '/upload/1527038154_4218.jpg', 'k', '1');
INSERT INTO `take_advertis` VALUES ('20', '/home/merchant/index/13', '/upload/1527054908_7616.jpg', 'l', '1');
INSERT INTO `take_advertis` VALUES ('22', '/home/merchant/index/22', '/upload/1527038233_1861.jpg', 'm', '1');

-- ----------------------------
-- Table structure for take_cates
-- ----------------------------
DROP TABLE IF EXISTS `take_cates`;
CREATE TABLE `take_cates` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cname` varchar(32) DEFAULT NULL,
  `pid` int(11) DEFAULT '0',
  `path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_cates
-- ----------------------------
INSERT INTO `take_cates` VALUES ('1', '美食', '0', '0,');
INSERT INTO `take_cates` VALUES ('3', '特色菜系', '0', '0,');
INSERT INTO `take_cates` VALUES ('4', '异国料理', '0', '0,');
INSERT INTO `take_cates` VALUES ('5', '小吃夜宵', '0', '0,');
INSERT INTO `take_cates` VALUES ('6', '甜品饮品', '0', '0,');
INSERT INTO `take_cates` VALUES ('7', '果蔬生鲜', '0', '0,');
INSERT INTO `take_cates` VALUES ('8', '商店超市', '0', '0,');
INSERT INTO `take_cates` VALUES ('9', '鲜花绿植', '0', '0,');
INSERT INTO `take_cates` VALUES ('10', '药品', '0', '0,');
INSERT INTO `take_cates` VALUES ('13', '下午茶', '0', '0,');
INSERT INTO `take_cates` VALUES ('19', '面食粥点', '1', '0,1,');
INSERT INTO `take_cates` VALUES ('20', '香锅冒菜', '1', '0,1,');
INSERT INTO `take_cates` VALUES ('25', '火锅烤鱼', '3', '0,3,');
INSERT INTO `take_cates` VALUES ('26', '东北菜', '3', '0,3,');
INSERT INTO `take_cates` VALUES ('27', '西北菜', '3', '0,3,');
INSERT INTO `take_cates` VALUES ('28', '粤菜', '3', '0,3,');
INSERT INTO `take_cates` VALUES ('29', '日韩料理', '4', '0,4,');
INSERT INTO `take_cates` VALUES ('30', '披萨意面', '4', '0,4,');
INSERT INTO `take_cates` VALUES ('31', '西餐', '4', '0,4,');
INSERT INTO `take_cates` VALUES ('32', '烧烤', '5', '0,5,');
INSERT INTO `take_cates` VALUES ('33', '小龙虾', '5', '0,5,');
INSERT INTO `take_cates` VALUES ('34', '炸鸡炸串', '5', '0,5,');
INSERT INTO `take_cates` VALUES ('35', '鸭脖卤味', '5', '0,5,');
INSERT INTO `take_cates` VALUES ('36', '面包蛋糕', '6', '0,6,');
INSERT INTO `take_cates` VALUES ('37', '奶茶果汁', '6', '0,6,');
INSERT INTO `take_cates` VALUES ('39', '水果', '7', '0,7,');
INSERT INTO `take_cates` VALUES ('40', '海鲜水产', '7', '0,7,');
INSERT INTO `take_cates` VALUES ('41', '蔬菜豆品', '7', '0,7,');
INSERT INTO `take_cates` VALUES ('42', '肉禽蛋类', '7', '0,7,');
INSERT INTO `take_cates` VALUES ('43', '大型超市', '8', '0,8,');
INSERT INTO `take_cates` VALUES ('44', '便利店', '8', '0,8,');
INSERT INTO `take_cates` VALUES ('45', '名酒坊', '8', '0,8,');
INSERT INTO `take_cates` VALUES ('46', '粮油副食', '8', '0,8,');
INSERT INTO `take_cates` VALUES ('47', '鲜花 ', '9', '0,9,');
INSERT INTO `take_cates` VALUES ('48', '绿植', '9', '0,9,');
INSERT INTO `take_cates` VALUES ('49', '药店', '10', '0,10,');
INSERT INTO `take_cates` VALUES ('51', '午餐', '0', '0,7,');
INSERT INTO `take_cates` VALUES ('55', '早餐', '0', '0,7，');
INSERT INTO `take_cates` VALUES ('57', '甜品', '13', '0,13,');
INSERT INTO `take_cates` VALUES ('59', '炸鸡小吃', '13', '0,13,');
INSERT INTO `take_cates` VALUES ('60', '简食便当', '1', '0,1,');
INSERT INTO `take_cates` VALUES ('66', '火锅', '1', '0,1,');
INSERT INTO `take_cates` VALUES ('67', '计生药品', '10', '0,10,');
INSERT INTO `take_cates` VALUES ('68', '大龙虾', '5', '0,5,');

-- ----------------------------
-- Table structure for take_details
-- ----------------------------
DROP TABLE IF EXISTS `take_details`;
CREATE TABLE `take_details` (
  `did` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `oid` varchar(255) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `gname` varchar(32) DEFAULT NULL,
  `price` decimal(8,0) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_details
-- ----------------------------
INSERT INTO `take_details` VALUES ('1', '201806286', '57', '黑胡椒牛肉意大利面', '12', '1');
INSERT INTO `take_details` VALUES ('2', '201806286', '52', '榴莲忘返披萨', '160', '5');
INSERT INTO `take_details` VALUES ('3', '201806286', '51', '黑椒牛肉披萨', '42', '2');
INSERT INTO `take_details` VALUES ('4', '201807544', '33', '歧山臊子面', '70', '2');
INSERT INTO `take_details` VALUES ('5', '201807544', '31', '养生杂粮肉夹馍', '36', '3');

-- ----------------------------
-- Table structure for take_enshrine
-- ----------------------------
DROP TABLE IF EXISTS `take_enshrine`;
CREATE TABLE `take_enshrine` (
  `eid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `mid` int(11) DEFAULT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_enshrine
-- ----------------------------

-- ----------------------------
-- Table structure for take_greencates
-- ----------------------------
DROP TABLE IF EXISTS `take_greencates`;
CREATE TABLE `take_greencates` (
  `fid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `mid` int(11) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_greencates
-- ----------------------------
INSERT INTO `take_greencates` VALUES ('5', '盖饭', '11', '豪堡王');
INSERT INTO `take_greencates` VALUES ('6', '炒菜', '11', '豪堡王');
INSERT INTO `take_greencates` VALUES ('7', '饮料', '11', '豪堡王');
INSERT INTO `take_greencates` VALUES ('8', '主食', '11', '豪堡王');
INSERT INTO `take_greencates` VALUES ('9', '麻辣烫', '11', '豪堡王');
INSERT INTO `take_greencates` VALUES ('10', '面食', '11', '豪堡王');
INSERT INTO `take_greencates` VALUES ('11', '热销', '12', '麦当劳');
INSERT INTO `take_greencates` VALUES ('12', '新品', '12', '麦当劳');
INSERT INTO `take_greencates` VALUES ('13', '经典原味黄焖鸡', '14', '杨铭宇黄焖鸡');
INSERT INTO `take_greencates` VALUES ('14', '幸福酸菜黄焖鸡', '14', '杨铭宇黄焖鸡');
INSERT INTO `take_greencates` VALUES ('15', '肉夹馍系列', '7', '秦大爷肉夹馍');
INSERT INTO `take_greencates` VALUES ('16', '折扣', '7', '秦大爷肉夹馍');
INSERT INTO `take_greencates` VALUES ('17', '双人超值套餐', '7', '秦大爷肉夹馍');
INSERT INTO `take_greencates` VALUES ('18', '鸭梨', '15', '大鸭梨');
INSERT INTO `take_greencates` VALUES ('19', '寿司类', '16', '鲜的寿司');
INSERT INTO `take_greencates` VALUES ('20', '苹果', '15', '大鸭梨');
INSERT INTO `take_greencates` VALUES ('21', '双皮奶类', '16', '鲜的寿司');
INSERT INTO `take_greencates` VALUES ('22', '奶茶类', '16', '鲜的寿司');
INSERT INTO `take_greencates` VALUES ('23', '橙子', '15', '大鸭梨');
INSERT INTO `take_greencates` VALUES ('24', '披萨类', '17', 'OK100现烤披萨');
INSERT INTO `take_greencates` VALUES ('25', '韩式玫瑰', '18', '美丽鲜花');
INSERT INTO `take_greencates` VALUES ('26', '玫瑰花束', '18', '美丽鲜花');
INSERT INTO `take_greencates` VALUES ('28', '百合花束', '18', '美丽鲜花');
INSERT INTO `take_greencates` VALUES ('29', '意大利面类', '17', 'OK100现烤披萨');
INSERT INTO `take_greencates` VALUES ('30', '美式厚饼披萨', '17', 'OK100现烤披萨');
INSERT INTO `take_greencates` VALUES ('31', '西班牙葡萄酒', '19', '品酒行');
INSERT INTO `take_greencates` VALUES ('32', '香港米其林美酒', '19', '品酒行');
INSERT INTO `take_greencates` VALUES ('33', '德国进口', '19', '品酒行');
INSERT INTO `take_greencates` VALUES ('34', '沙拉类', '20', '蜜逃咖啡餐厅');
INSERT INTO `take_greencates` VALUES ('35', '酸奶杯', '20', '蜜逃咖啡餐厅');
INSERT INTO `take_greencates` VALUES ('36', '肉饼类', '21', '香河肉饼');
INSERT INTO `take_greencates` VALUES ('37', '砂锅类', '21', '香河肉饼');
INSERT INTO `take_greencates` VALUES ('38', '小吃类', '21', '香河肉饼');
INSERT INTO `take_greencates` VALUES ('39', '香肠类', '20', '蜜逃咖啡餐厅');
INSERT INTO `take_greencates` VALUES ('40', '现烤面包', '22', '蛋糕烘培坊');
INSERT INTO `take_greencates` VALUES ('41', '代代面包', '22', '蛋糕烘培坊');
INSERT INTO `take_greencates` VALUES ('42', '西点蛋糕', '22', '蛋糕烘培坊');
INSERT INTO `take_greencates` VALUES ('43', '爱意玫瑰', '23', '鲜花花店');
INSERT INTO `take_greencates` VALUES ('44', '家庭插花', '23', '鲜花花店');
INSERT INTO `take_greencates` VALUES ('45', '节日主推', '23', '鲜花花店');
INSERT INTO `take_greencates` VALUES ('46', '海鲜', '24', '品香私厨烤鸭海鲜');
INSERT INTO `take_greencates` VALUES ('47', '优惠', '24', '品香私厨烤鸭海鲜');
INSERT INTO `take_greencates` VALUES ('48', '老面包', '25', '老二生活超市');
INSERT INTO `take_greencates` VALUES ('49', '冷冻水饺', '25', '老二生活超市');
INSERT INTO `take_greencates` VALUES ('50', '午餐肉', '25', '老二生活超市');
INSERT INTO `take_greencates` VALUES ('51', '辣的', '26', '一节该饭店');

-- ----------------------------
-- Table structure for take_greens
-- ----------------------------
DROP TABLE IF EXISTS `take_greens`;
CREATE TABLE `take_greens` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(11) DEFAULT NULL,
  `gname` varchar(32) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `price` decimal(8,0) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `gpic` varchar(255) DEFAULT NULL,
  `fid` varchar(32) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_greens
-- ----------------------------
INSERT INTO `take_greens` VALUES ('8', '7', '米饭', '盖饭', '豪堡王', '11', '1', '/gpic/1527489690_3880.jpeg', '5', '订单');
INSERT INTO `take_greens` VALUES ('9', '11', '红烧肉盖饭', '盖饭', '海底捞', '90', '1', '/gpic/1527489795_9157.jpeg', '5', null);
INSERT INTO `take_greens` VALUES ('10', '11', '西红柿鸡蛋盖饭', '盖饭', '海底捞', '66', '1', '/gpic/1527489904_4281.jpeg', '5', '酸甜可口');
INSERT INTO `take_greens` VALUES ('11', '11', '馒头', '主食', '海底捞', '1', '1', '/gpic/1527490001_9047.jpeg', '8', '金银小馒头');
INSERT INTO `take_greens` VALUES ('12', '11', '可乐', '饮料', '海底捞', '4', '1', '/gpic/1527490082_6621.png', '7', '百事可乐公司荣誉出品');
INSERT INTO `take_greens` VALUES ('13', '11', '秦镇米皮', '麻辣烫', '海底捞', '12', '1', '/gpic/1527490293_6122.jpeg', '9', '大大方方');
INSERT INTO `take_greens` VALUES ('14', '11', '蛋炒饼', '面食', '海底捞', '10', '1', '/gpic/1527490395_6763.jpeg', '10', '高贵惯');
INSERT INTO `take_greens` VALUES ('15', '11', '鱼香肉丝', '炒菜', '海底捞', '34', '1', '/gpic/1527490540_4509.jpeg', '6', '套餐+可乐+鹵蛋');
INSERT INTO `take_greens` VALUES ('16', '12', '麦辣鸡翅', '热销', '麦当劳', '11', '1', '/gpic/1527141516_7231.png', '11', '麦辣鸡翅2块（主要原料：鸡肉，腌料，裹粉，油）');
INSERT INTO `take_greens` VALUES ('17', '12', '经典麦辣鸡腿汉堡中薯套餐', '热销', '麦当劳', '35', '1', '/gpic/1527142145_2016.png', '11', '1个经典麦辣鸡腿汉堡 1份薯条(中) 1杯可口可乐(中)');
INSERT INTO `take_greens` VALUES ('18', '12', '朱古力新地', '热销', '麦当劳', '10', '1', '/gpic/1527142216_9436.png', '11', '朱古力新地1个（主要原料：香草风味冰淇淋，朱古力酱）');
INSERT INTO `take_greens` VALUES ('19', '12', '薯条（大）', '热销', '麦当劳', '12', '1', '/gpic/1527142265_9038.png', '11', '主要原料：薯条，油，盐');
INSERT INTO `take_greens` VALUES ('20', '12', '法式珍虾厚牛堡', '新品', '麦当劳', '34', '1', '/gpic/1527145265_1854.png', '12', '法式珍虾厚牛堡一个(主要原料：法棍,芝士奶香调味沙拉酱,生菜，蒜香黄油风味沙拉酱 ，虾，高达干酪片，牛肉饼）');
INSERT INTO `take_greens` VALUES ('22', '12', '法式珍虾厚牛堡配中薯套餐', '新品', '麦当劳', '46', '1', '/gpic/1527145329_3363.png', '12', '法式珍虾厚牛堡一个 中可乐一杯 中薯条一份');
INSERT INTO `take_greens` VALUES ('23', '12', '法式苹果风味茶', '新品', '麦当劳', '12', '1', '/gpic/1527145410_5918.png', '12', '法式苹果风味茶一份（主要原料：苹果风味糖浆，柠檬红茶味饮料）');
INSERT INTO `take_greens` VALUES ('24', '12', '麦趣鸡盒(含大鸡排)', '新品', '麦当劳', '92', '1', '/gpic/1527145474_2977.png', '12', '那么大鸡排1份 香骨鸡腿3个 麦辣鸡翅6块 中可乐2杯');
INSERT INTO `take_greens` VALUES ('25', '14', '小份黄焖鸡米饭', '经典原味黄焖鸡', '杨铭宇黄焖鸡', '21', '1', '/gpic/1527488912_4048.jpeg', '13', '包含一份米饭');
INSERT INTO `take_greens` VALUES ('26', '14', '大份黄焖鸡', '经典原味黄焖鸡', '杨铭宇黄焖鸡', '26', '1', '/gpic/1527489054_7968.jpeg', '13', '包含一份米饭');
INSERT INTO `take_greens` VALUES ('27', '14', '双人份黄焖鸡', '经典原味黄焖鸡', '杨铭宇黄焖鸡', '38', '1', '/gpic/1527489270_2033.jpeg', '13', '大份黄焖鸡一份 米饭两份 两瓶饮料');
INSERT INTO `take_greens` VALUES ('28', '14', '小份酸菜黄焖鸡', '幸福酸菜黄焖鸡', '杨铭宇黄焖鸡', '23', '1', '/gpic/1527489433_5108.jpeg', '14', '饮料+米饭');
INSERT INTO `take_greens` VALUES ('29', '14', '大份酸菜黄焖鸡', '幸福酸菜黄焖鸡', '杨铭宇黄焖鸡', '29', '1', '/gpic/1527489508_9441.jpeg', '14', '饮料+米饭');
INSERT INTO `take_greens` VALUES ('30', '14', '双人份酸菜黄焖鸡', '幸福酸菜黄焖鸡', '杨铭宇黄焖鸡', '39', '1', '/gpic/1527491228_8307.jpeg', '14', '大份黄焖鸡一份 米饭两份 两瓶饮料');
INSERT INTO `take_greens` VALUES ('31', '7', '养生杂粮肉夹馍', '肉夹馍系列', '秦大爷肉夹馍', '12', '1', '/gpic/1527491416_6580.jpeg', '15', '养生');
INSERT INTO `take_greens` VALUES ('32', '7', '老潼关肉夹馍', '肉夹馍系列', '秦大爷肉夹馍', '11', '1', '/gpic/1527491532_4972.jpeg', '15', '美味持久');
INSERT INTO `take_greens` VALUES ('33', '7', '歧山臊子面', '折扣', '秦大爷肉夹馍', '35', '1', '/gpic/1527491661_6724.jpeg', '16', '歧山臊子面+陕西素拼+精品肉价馍');
INSERT INTO `take_greens` VALUES ('34', '7', '冒菜羊血', '双人超值套餐', '秦大爷肉夹馍', '80', '1', '/gpic/1527491850_3568.jpeg', '17', '冒菜羊血+辣椒炒肉+酸辣汤+2份米饭\r\n双人餐超值，麻辣鲜香，有菜有肉有汤');
INSERT INTO `take_greens` VALUES ('35', '15', '鸭梨', '鸭梨', '大鸭梨', '3', '1', '/gpic/1527561113_7977.jpeg', '18', '美味大鸭梨');
INSERT INTO `take_greens` VALUES ('36', '16', '蟹棒', '寿司类', '鲜的寿司', '13', '1', '/gpic/1527561406_1543.webp', '19', null);
INSERT INTO `take_greens` VALUES ('37', '16', '蛋黄卷', '寿司类', '鲜的寿司', '18', '1', '/gpic/1527561470_5289.webp', '19', '美味');
INSERT INTO `take_greens` VALUES ('38', '15', '富士苹果', '苹果', '大鸭梨', '3', '1', '/gpic/1527561580_3229.jpeg', '20', '鲜美苹果');
INSERT INTO `take_greens` VALUES ('39', '16', '肉松卷', '寿司类', '鲜的寿司', '17', '1', '/gpic/1527561578_7484.webp', '19', '香甜');
INSERT INTO `take_greens` VALUES ('40', '16', '秘制原味双皮奶', '双皮奶类', '鲜的寿司', '12', '1', '/gpic/1527561715_4142.webp', '21', '好吃');
INSERT INTO `take_greens` VALUES ('41', '16', '青苹果双皮奶', '双皮奶类', '鲜的寿司', '10', '1', '/gpic/1527561769_6906.webp', '21', '美味持久');
INSERT INTO `take_greens` VALUES ('42', '15', '苹果梨', '鸭梨', '大鸭梨', '4', '1', '/gpic/1527561796_6793.jpg', '18', '鲜美苹果梨');
INSERT INTO `take_greens` VALUES ('43', '16', '芒果双皮奶', '双皮奶类', '鲜的寿司', '11', '1', '/gpic/1527561828_2190.webp', '21', '好吃');
INSERT INTO `take_greens` VALUES ('44', '15', '皇冠梨', '鸭梨', '大鸭梨', '6', '1', '/gpic/1527561845_9501.jpeg', '18', null);
INSERT INTO `take_greens` VALUES ('45', '15', '东北大苹果', '苹果', '大鸭梨', '2', '1', '/gpic/1527561975_8702.jpg', '20', null);
INSERT INTO `take_greens` VALUES ('46', '16', '布丁奶茶', '奶茶类', '鲜的寿司', '10', '1', '/gpic/1527561982_4205.webp', '22', '甜美');
INSERT INTO `take_greens` VALUES ('47', '15', '德国进口苹果', '苹果', '大鸭梨', '6', '1', '/gpic/1527562032_7405.jpg', '20', null);
INSERT INTO `take_greens` VALUES ('48', '15', '多汁橙子', '橙子', '大鸭梨', '5', '1', '/gpic/1527562203_9803.jpg', '23', null);
INSERT INTO `take_greens` VALUES ('49', '15', '美达橙', '橙子', '大鸭梨', '4', '1', '/gpic/1527562236_7826.jpg', '23', null);
INSERT INTO `take_greens` VALUES ('50', '15', '皇冠橙', '橙子', '大鸭梨', '6', '1', '/gpic/1527562260_8798.jpg', '23', null);
INSERT INTO `take_greens` VALUES ('51', '17', '黑椒牛肉披萨', '披萨类', 'OK100现烤披萨', '21', '1', '/gpic/1527562396_4579.webp', '24', '想吃吗？');
INSERT INTO `take_greens` VALUES ('52', '17', '榴莲忘返披萨', '披萨类', 'OK100现烤披萨', '32', '1', '/gpic/1527562462_1790.webp', '24', '芝士爱上榴莲，一口美味忘不了');
INSERT INTO `take_greens` VALUES ('53', '18', '草莓花束', '韩式玫瑰', '美丽鲜花', '9', '1', '/gpic/1527562522_5925.jpeg', '25', null);
INSERT INTO `take_greens` VALUES ('54', '17', '传统意大利肉酱面', '意大利面类', 'OK100现烤披萨', '13', '1', '/gpic/1527562565_8031.webp', '29', '传统的风味');
INSERT INTO `take_greens` VALUES ('55', '18', '韩式花束', '韩式玫瑰', '美丽鲜花', '8', '1', '/gpic/1527562595_2192.jpeg', '25', null);
INSERT INTO `take_greens` VALUES ('56', '17', '意式奶油培根面', '意大利面类', 'OK100现烤披萨', '13', '1', '/gpic/1527562620_8468.webp', '29', '可口美味');
INSERT INTO `take_greens` VALUES ('57', '17', '黑胡椒牛肉意大利面', '意大利面类', 'OK100现烤披萨', '12', '1', '/gpic/1527562672_8758.webp', '29', '香香香');
INSERT INTO `take_greens` VALUES ('58', '18', '致深爱的你', '玫瑰花束', '美丽鲜花', '8', '1', '/gpic/1527562680_6429.jpeg', '26', null);
INSERT INTO `take_greens` VALUES ('59', '18', '最爱', '玫瑰花束', '美丽鲜花', '7', '1', '/gpic/1527562697_4180.jpeg', '26', null);
INSERT INTO `take_greens` VALUES ('60', '18', '百合', '百合花束', '美丽鲜花', '6', '1', '/gpic/1527562735_5198.jpeg', '28', null);
INSERT INTO `take_greens` VALUES ('61', '18', '百年好合', '百合花束', '美丽鲜花', '6', '1', '/gpic/1527562752_9697.jpeg', '28', null);
INSERT INTO `take_greens` VALUES ('62', '17', '黑椒牛肉披萨', '美式厚饼披萨', 'OK100现烤披萨', '33', '1', '/gpic/1527562791_1573.webp', '30', '记忆里的味道');
INSERT INTO `take_greens` VALUES ('63', '17', '熏香培根披萨', '美式厚饼披萨', 'OK100现烤披萨', '43', '1', '/gpic/1527562859_5126.webp', '30', '披萨酱 意大利烤肠 培根 玉米 洋葱 青椒 红椒 菠萝');
INSERT INTO `take_greens` VALUES ('64', '17', '火辣墨西哥披萨', '美式厚饼披萨', 'OK100现烤披萨', '15', '1', '/gpic/1527562926_2402.webp', '30', '墨西哥辣椒酱 烟熏鸡肉 牛肉粒 等鲜蔬');
INSERT INTO `take_greens` VALUES ('65', '19', '西班牙黑葡萄', '西班牙葡萄酒', '品酒行', '888', '1', '/gpic/1527563151_5097.jpeg', '31', null);
INSERT INTO `take_greens` VALUES ('66', '19', '西班牙青葡萄', '西班牙葡萄酒', '品酒行', '999', '1', '/gpic/1527563190_3071.jpeg', '31', null);
INSERT INTO `take_greens` VALUES ('67', '19', '米其林紫葡', '香港米其林美酒', '品酒行', '199', '1', '/gpic/1527563227_2864.jpeg', '32', null);
INSERT INTO `take_greens` VALUES ('68', '20', '经典凯撒沙拉', '沙拉类', '蜜逃咖啡餐厅', '36', '1', '/gpic/1527563257_4339.webp', '34', '凯撒沙拉，被称为“沙拉之王”，因为它兼具了肉类、');
INSERT INTO `take_greens` VALUES ('69', '19', '米其林经典酒', '香港米其林美酒', '品酒行', '888', '1', '/gpic/1527563263_8909.jpeg', '32', null);
INSERT INTO `take_greens` VALUES ('70', '19', '德国黑葡', '德国进口', '品酒行', '999', '1', '/gpic/1527563308_7501.jpeg', '33', null);
INSERT INTO `take_greens` VALUES ('71', '20', '牛油果考伯沙拉', '沙拉类', '蜜逃咖啡餐厅', '56', '1', '/gpic/1527563323_2238.webp', '34', '牛油果，培根，鸡胸肉，圣女果，鸡蛋，扒口蘑，沙拉');
INSERT INTO `take_greens` VALUES ('72', '20', '水果燕麦酸奶杯', '酸奶杯', '蜜逃咖啡餐厅', '23', '1', '/gpic/1527563417_3686.webp', '35', null);
INSERT INTO `take_greens` VALUES ('73', '20', '绿巨人', '酸奶杯', '蜜逃咖啡餐厅', '35', '1', '/gpic/1527563534_4086.webp', '35', '奇异果与手工酸奶打底，加上秘制的granola坚果烤燕麦，补充维C');
INSERT INTO `take_greens` VALUES ('74', '21', '牛肉香菇', '肉饼类', '香河肉饼', '2', '1', '/gpic/1527563687_5105.jpeg', '36', null);
INSERT INTO `take_greens` VALUES ('75', '21', '韭菜盒子', '肉饼类', '香河肉饼', '3', '1', '/gpic/1527563717_9975.jpeg', '36', null);
INSERT INTO `take_greens` VALUES ('76', '20', '芒果迷情', '酸奶杯', '蜜逃咖啡餐厅', '34', '1', '/gpic/1527563729_4852.webp', '35', '新鲜芒果与自制醇香酸奶打底，以及蜜逃特质的坚果水果(助消化）');
INSERT INTO `take_greens` VALUES ('77', '21', '砂锅肥羊', '砂锅类', '香河肉饼', '9', '1', '/gpic/1527563807_2931.jpeg', '37', null);
INSERT INTO `take_greens` VALUES ('78', '21', '砂锅排骨', '砂锅类', '香河肉饼', '9', '1', '/gpic/1527563834_8592.jpeg', '37', null);
INSERT INTO `take_greens` VALUES ('79', '20', '德式香肠大拼盘', '香肠类', '蜜逃咖啡餐厅', '88', '1', '/gpic/1527563854_8851.webp', '39', '1个德式盘肠，2根图林根风味肉肠，1根西班牙香肠，2根法兰克福脆皮肠');
INSERT INTO `take_greens` VALUES ('80', '21', '特色凉皮', '小吃类', '香河肉饼', '9', '1', '/gpic/1527563892_5610.jpeg', '38', null);
INSERT INTO `take_greens` VALUES ('81', '20', '德式香肠拼盘', '香肠类', '蜜逃咖啡餐厅', '46', '1', '/gpic/1527563903_2213.webp', '39', '1个意大利香肠，1根图林根风味肉肠，1根法兰克福脆皮肠');
INSERT INTO `take_greens` VALUES ('82', '21', '蛋炒饭', '小吃类', '香河肉饼', '9', '1', '/gpic/1527563915_7400.jpeg', '38', null);
INSERT INTO `take_greens` VALUES ('83', '22', '原味甜甜圈', '现烤面包', '蛋糕烘培坊', '3', '1', '/gpic/1527564342_7364.jpeg', '40', null);
INSERT INTO `take_greens` VALUES ('84', '22', '肉松三明治', '现烤面包', '蛋糕烘培坊', '3', '1', '/gpic/1527564366_8024.jpeg', '40', null);
INSERT INTO `take_greens` VALUES ('85', '22', '红豆吐司', '代代面包', '蛋糕烘培坊', '2', '1', '/gpic/1527564406_5874.jpeg', '41', null);
INSERT INTO `take_greens` VALUES ('86', '22', '手撕包', '代代面包', '蛋糕烘培坊', '2', '1', '/gpic/1527564428_5094.jpeg', '41', null);
INSERT INTO `take_greens` VALUES ('87', '22', '原味泡芙', '西点蛋糕', '蛋糕烘培坊', '8', '1', '/gpic/1527564500_7076.jpeg', '42', null);
INSERT INTO `take_greens` VALUES ('88', '22', '提来米苏', '西点蛋糕', '蛋糕烘培坊', '18', '1', '/gpic/1527564523_7292.jpeg', '42', null);
INSERT INTO `take_greens` VALUES ('89', '23', '玫瑰韩系花束', '爱意玫瑰', '鲜花花店', '999', '1', '/gpic/1527564795_1999.jpeg', '43', null);
INSERT INTO `take_greens` VALUES ('90', '23', '高档潘多拉玫瑰', '爱意玫瑰', '鲜花花店', '999', '1', '/gpic/1527564836_4563.jpeg', '43', null);
INSERT INTO `take_greens` VALUES ('91', '23', '香水百合', '家庭插花', '鲜花花店', '99', '1', '/gpic/1527564901_2665.jpeg', '44', null);
INSERT INTO `take_greens` VALUES ('92', '23', '冷美人', '家庭插花', '鲜花花店', '99', '1', '/gpic/1527564924_7011.jpeg', '44', null);
INSERT INTO `take_greens` VALUES ('93', '23', '痴情与你', '节日主推', '鲜花花店', '194', '1', '/gpic/1527565001_3189.jpeg', '45', null);
INSERT INTO `take_greens` VALUES ('94', '23', '逝去的年华', '节日主推', '鲜花花店', '299', '1', '/gpic/1527565027_5563.jpeg', '45', null);
INSERT INTO `take_greens` VALUES ('95', '24', '花蛤', '海鲜', '品香私厨烤鸭海鲜', '58', '1', '/gpic/1527565212_3864.jpeg', '46', null);
INSERT INTO `take_greens` VALUES ('96', '24', '牛蛙', '海鲜', '品香私厨烤鸭海鲜', '88', '1', '/gpic/1527565237_5504.jpeg', '46', null);
INSERT INTO `take_greens` VALUES ('97', '24', '烤鸭', '优惠', '品香私厨烤鸭海鲜', '188', '1', '/gpic/1527565264_7380.jpeg', '47', null);
INSERT INTO `take_greens` VALUES ('98', '24', '水煮鸭头', '优惠', '品香私厨烤鸭海鲜', '20', '1', '/gpic/1527565298_1769.jpeg', '47', null);
INSERT INTO `take_greens` VALUES ('99', '25', '盼盼小面包', '面包', '老二生活超市', '13', '1', '/gpic/1527565618_7635.jpeg', '48', null);
INSERT INTO `take_greens` VALUES ('100', '25', '铜锣烧', '面包', '老二生活超市', '7', '1', '/gpic/1527565690_3260.jpeg', '48', null);
INSERT INTO `take_greens` VALUES ('101', '25', '三全猪肉水饺', '冷冻水饺', '老二生活超市', '9', '1', '/gpic/1527565753_3797.jpeg', '49', null);
INSERT INTO `take_greens` VALUES ('102', '25', '三全韭菜鸡蛋水饺', '冷冻水饺', '老二生活超市', '9', '1', '/gpic/1527565784_9537.jpeg', '49', null);
INSERT INTO `take_greens` VALUES ('103', '25', '双汇午餐肉', '午餐肉', '老二生活超市', '13', '1', '/gpic/1527565832_9197.jpeg', '50', null);
INSERT INTO `take_greens` VALUES ('104', '25', '鱼罐头', '午餐肉', '老二生活超市', '11', '1', '/gpic/1527565857_4895.jpeg', '50', null);
INSERT INTO `take_greens` VALUES ('105', '26', '小炒肉', '辣的', '一节该饭店', '11', '1', '/gpic/1527769889_5757.jpg', '51', '对对对');

-- ----------------------------
-- Table structure for take_links
-- ----------------------------
DROP TABLE IF EXISTS `take_links`;
CREATE TABLE `take_links` (
  `yid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `yname` varchar(32) DEFAULT NULL,
  `ylinks` varchar(255) DEFAULT NULL,
  `ypic` varchar(255) DEFAULT NULL,
  `sort` varchar(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`yid`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_links
-- ----------------------------
INSERT INTO `take_links` VALUES ('20', 'b', 'https:www.bu.com', '/upload/1527067341_1405.png', 'q', '1');
INSERT INTO `take_links` VALUES ('26', 'c', 'https:\\\\www.ibiaozhi.com', '/upload/5813.1527067451.png', 'q', '1');
INSERT INTO `take_links` VALUES ('27', 'd', 'https:\\\\www.zhihu.com', '/upload/6707.1527067531.png', 'd', '1');
INSERT INTO `take_links` VALUES ('28', 'e', 'https:\\\\www.taobao.com', '/upload/7350.1527067551.png', 'q', '1');
INSERT INTO `take_links` VALUES ('29', 'f', 'https:\\\\www.jd.com', '/upload/1527076045_7229.png', 'q', '1');
INSERT INTO `take_links` VALUES ('30', 'h', 'https:\\\\www.360.com', '/upload/3724.1527067622.png', 'q', '1');
INSERT INTO `take_links` VALUES ('31', 'w', 'https:\\\\www.hao123.com', '/upload/1527075526_1676.png', 'e', '1');
INSERT INTO `take_links` VALUES ('32', 's', 'https:\\\\www.sohu.com', '/upload/3357.1527067695.png', 's', '1');
INSERT INTO `take_links` VALUES ('33', 'e', 'https:\\\\www.qq.com', '/upload/5424.1527067721.png', 'e', '1');
INSERT INTO `take_links` VALUES ('34', 's', 'www.80s.com', '/upload/5759.1527067753.png', 's', '1');
INSERT INTO `take_links` VALUES ('35', 's', 'www.3g.qq.com', '/upload/6123.1527067774.png', 'd', '1');
INSERT INTO `take_links` VALUES ('36', 's', 'www.tencent.com', '/upload/7944.1527067789.png', 's', '1');
INSERT INTO `take_links` VALUES ('37', 's', 'www.7k7k.com', '/upload/4086.1527067820.png', 's', '1');
INSERT INTO `take_links` VALUES ('38', 'd', 'www.4399.com', '/upload/6893.1527067840.png', 's', '1');
INSERT INTO `take_links` VALUES ('39', 'e', 'www.sina.com', '/upload/7184.1527075433.png', 'e', '1');
INSERT INTO `take_links` VALUES ('40', 'a', 'www.iqiyi.com', '/upload/4371.1527075461.png', 'a', '1');
INSERT INTO `take_links` VALUES ('41', 'q', 'www.tmall.com', '/upload/2950.1527075501.png', 'q', '1');
INSERT INTO `take_links` VALUES ('42', 's', 'www.suning.com', '/upload/4996.1527075789.png', 's', '1');
INSERT INTO `take_links` VALUES ('43', 'a', 'www.ctrip.com', '/upload/7474.1527075903.png', 'a', '1');
INSERT INTO `take_links` VALUES ('44', 'baidu', 'https://www.baidu.com', '/upload/6573.1527733308.png', 'z', '0');

-- ----------------------------
-- Table structure for take_merchants
-- ----------------------------
DROP TABLE IF EXISTS `take_merchants`;
CREATE TABLE `take_merchants` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `mname` varchar(32) DEFAULT NULL,
  `safe` tinyint(1) DEFAULT '0',
  `bill` tinyint(1) DEFAULT '0',
  `mpic` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `details` varchar(255) DEFAULT NULL,
  `level` decimal(2,0) DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_merchants
-- ----------------------------
INSERT INTO `take_merchants` VALUES ('7', '55', '秦大爷肉夹馍', '1', '1', '/mpic/1527490749_5900.jpeg', '2', '祖传的配方，专业30年', '5');
INSERT INTO `take_merchants` VALUES ('11', '1', '小六家常菜', '1', '1', '/mpic/1527491083_3098.jpeg', '2', '不一样的体验', '4');
INSERT INTO `take_merchants` VALUES ('12', '60', '麦当劳', '1', '1', '/mpic/1527134169_9304.jpeg', '2', '金拱门', '4');
INSERT INTO `take_merchants` VALUES ('13', '66', '味蜀吾火锅', '1', '1', '/mpic/1527486829_1835.jpg', '1', 'ggggg', null);
INSERT INTO `take_merchants` VALUES ('14', '60', '杨铭宇黄焖鸡', '1', '1', '/mpic/1527488364_5231.jpeg', '2', '米粉面馆 黄焖鸡米饭', null);
INSERT INTO `take_merchants` VALUES ('15', '39', '大鸭梨', '1', '1', '/mpic/1527560493_5368.webp', '2', '鲜美大鸭梨', null);
INSERT INTO `take_merchants` VALUES ('16', '29', '鲜的寿司', '0', '1', '/mpic/1527561271_1144.webp', '1', '大家喜欢吃，才叫真好吃。', null);
INSERT INTO `take_merchants` VALUES ('17', '30', 'OK100现烤披萨', '1', '1', '/mpic/1527562181_8832.webp', '1', '披萨意面', '3');
INSERT INTO `take_merchants` VALUES ('18', '47', '美丽鲜花', '1', '1', '/mpic/1527562347_1239.png', '2', null, null);
INSERT INTO `take_merchants` VALUES ('19', '45', '品酒行', '1', '1', '/mpic/1527563001_2571.png', '2', null, null);
INSERT INTO `take_merchants` VALUES ('20', '31', '蜜逃咖啡餐厅', '1', '0', '/mpic/1527563124_8297.webp', '1', '咖啡 西餐', null);
INSERT INTO `take_merchants` VALUES ('21', '51', '香河肉饼', '1', '1', '/mpic/1527563389_8253.jpeg', '1', null, null);
INSERT INTO `take_merchants` VALUES ('22', '57', '蛋糕烘培坊', '1', '1', '/mpic/1527564084_5008.jpeg', '1', null, null);
INSERT INTO `take_merchants` VALUES ('23', '48', '鲜花花店', '1', '1', '/mpic/1527564638_9960.png', '1', null, null);
INSERT INTO `take_merchants` VALUES ('24', '28', '品香私厨烤鸭海鲜', '1', '1', '/mpic/1527565129_2093.png', '0', null, null);
INSERT INTO `take_merchants` VALUES ('25', '44', '老二生活超市', '1', '1', '/mpic/1527565485_9086.jpeg', '0', null, null);
INSERT INTO `take_merchants` VALUES ('26', '60', '一节该饭店', '1', '1', '/mpic/1527769803_2981.jpg', '1', '1113', null);

-- ----------------------------
-- Table structure for take_orders
-- ----------------------------
DROP TABLE IF EXISTS `take_orders`;
CREATE TABLE `take_orders` (
  `oid` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `uname` varchar(32) DEFAULT NULL,
  `addr` varchar(255) DEFAULT NULL,
  `tel` varchar(16) DEFAULT NULL,
  `otime` int(11) DEFAULT NULL,
  `sum` decimal(8,0) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `cnt` int(11) DEFAULT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_orders
-- ----------------------------
INSERT INTO `take_orders` VALUES ('201806286', '126', '17', 'wangyulin', null, '15131577304', '1529460482', '224', '4', 'egrbg', '8');
INSERT INTO `take_orders` VALUES ('201807544', '122', '7', '000000', null, '15131577306', '1531572784', '116', '1', null, '5');

-- ----------------------------
-- Table structure for take_reviews
-- ----------------------------
DROP TABLE IF EXISTS `take_reviews`;
CREATE TABLE `take_reviews` (
  `rid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_reviews
-- ----------------------------
INSERT INTO `take_reviews` VALUES ('1', '17', '126', 'sadvaerv', '3');

-- ----------------------------
-- Table structure for take_users
-- ----------------------------
DROP TABLE IF EXISTS `take_users`;
CREATE TABLE `take_users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(32) NOT NULL,
  `name` varchar(16) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `sex` enum('y','x') DEFAULT NULL,
  `addr` varchar(255) DEFAULT NULL,
  `age` char(3) DEFAULT NULL,
  `tel` varchar(16) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  `upic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of take_users
-- ----------------------------
INSERT INTO `take_users` VALUES ('84', 'jzq', '集资很浅', '', '', '阿萨德撒', '18', '15135769192', '1526815812', '/upload/1526920735_6250.png');
INSERT INTO `take_users` VALUES ('108', '666666', '吉振乾', '$2y$10$USNrYRgWy9or26885izAUO9viZD2hz/uBX4WreGDt/K.aRBmoNrtu', 'y', '兄弟连it教育是是是', '44', '15131577303', null, '/upload/1527753197_7623.gif');
INSERT INTO `take_users` VALUES ('109', 'wang', 'wang', '$2y$10$mKQ9DaZXvsRJaz9GEp0FgeQz9wEEWoAsLWC8vGk/HB0Gy1.oHKmay', 'x', '11111115555444', '22', '15131577304', '1527220178', '/upload/1527237573_9811.jpg');
INSERT INTO `take_users` VALUES ('114', 'qqqqqq', null, '$2y$10$UYtxnHVhRYFn.mm0B2e74OqA1hgjhzf/yHvoLons6DI8q/VD/VG5O', '', null, null, '17692512469', null, '/upload/1527747199_2505.jpg');
INSERT INTO `take_users` VALUES ('122', '000000', null, '$2y$10$QGBAIwDu/eFhClHn2nLKo.idJPE5s4J2L0fvLIctfdp9i7F.sVTMW', null, null, null, '15131577306', null, '/upload/1530852227_2466.jpg');
INSERT INTO `take_users` VALUES ('123', '1614492532', '吉振乾', '$2y$10$eY8SKaMEFiM/1.8N2xOP3.O4Doca6vA6F5wfbzyLcOxesGpHhC6vC', '', 'a', '12', '15135769192', '1527684092', '/upload/2849.1527684092.jpg');
INSERT INTO `take_users` VALUES ('126', 'wangyulin', null, '$2y$10$74JpkPbUqSWz2ty2Tt98VOOL7wW3aGq9.CJW41Z05nPXVY2EQMW2u', null, null, null, '15131577304', null, '/upload/1527756828_7429.jpg');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'wangyulin', 'wangyulin@163.com', '$2y$10$GApbKnXO.fZkwMfy3gAedOJzmkqSSUzuoDyIQy4j8PYQCGI.akNQ6', null, '2018-06-09 16:49:00', '2018-06-09 16:49:00');
