/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50714
 Source Host           : 127.0.0.1:3306
 Source Schema         : human

 Target Server Type    : MySQL
 Target Server Version : 50714
 File Encoding         : 65001

 Date: 07/04/2019 23:32:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for advertisement
-- ----------------------------
DROP TABLE IF EXISTS `advertisement`;
CREATE TABLE `advertisement`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหส',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'หัวข้อข่าวประชาสัมพันธ์',
  `detail` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'รายละเอียดประชาสัมพันธ์',
  `create_by` bigint(20) DEFAULT NULL COMMENT 'สร้างโดย',
  `create_date` datetime(0) DEFAULT NULL COMMENT 'สร้างวันที่',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of advertisement
-- ----------------------------
INSERT INTO `advertisement` VALUES (3, 'demo1', 'sdfsdf\r\nsdfsdf\r\nsdfsdf\r\nsdfsdf', 1, '2019-04-07 18:17:40');

-- ----------------------------
-- Table structure for assessment_form
-- ----------------------------
DROP TABLE IF EXISTS `assessment_form`;
CREATE TABLE `assessment_form`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หัวข้อแปบประเมิน',
  `explanation` text CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT 'คำชี้แจง',
  `create_date` date DEFAULT NULL COMMENT 'วันที่สร้าง',
  `create_by` bigint(20) DEFAULT NULL COMMENT 'สร้างโดย',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assessment_form
-- ----------------------------
INSERT INTO `assessment_form` VALUES (2, 'โครงการห้องสมุดมนุษย์ (Human Library) เรื่อง มนต์เสน่ห์ผ้าย้อมคราม by ครามฮัก', 'คำชี้แจง  1. ข้อมูลที่ได้จากแบบประเมินนี้จะนำไปใช้ในการพัฒนาการจัดการโครงการครั้งต่อไป<br>\r\n                2. โปรดตอบแบบประเมินตามความคิดเห็นที่สร้างสรรค์อย่างแท้จริง<br>\r\n                3. ทุกความคิดเห็นของท่านเป็นส่วนหนึ่งที่จะพัฒนาสำนักวิทยบริการและเทคโนโลยีสารสนเทศต่อไป<br>', '2019-04-07', 1);

-- ----------------------------
-- Table structure for assessment_form_l1
-- ----------------------------
DROP TABLE IF EXISTS `assessment_form_l1`;
CREATE TABLE `assessment_form_l1`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส',
  `p_id` int(11) DEFAULT NULL COMMENT 'รหัสฟอร์มแบบประเมิน',
  `sex` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เพศ',
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'สถานะ',
  `status_other` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อื่นๆ',
  `department` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หน่วยงานที่สังกัด',
  `department_other` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'อื่นๆ',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assessment_form_l1
-- ----------------------------
INSERT INTO `assessment_form_l1` VALUES (1, NULL, '', '', '', '', '');

-- ----------------------------
-- Table structure for assessment_form_l2
-- ----------------------------
DROP TABLE IF EXISTS `assessment_form_l2`;
CREATE TABLE `assessment_form_l2`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสแปบบประเมิน',
  `p_id` int(11) NOT NULL COMMENT 'รหัสแบบประเมิน',
  `one` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '1. ความรู้ที่ได้รับจากการเข้าร่วมเปิดอ่านหนังสือมีชีวิต (Living book)',
  `two` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '2. เนื้อหาของหนังสือมีชีวิตมีความน่าสนใจ',
  `three` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '3. หนังสือมีชีวิต (Living book) ถ่ายทอดเนื้อหาได้ชัดเจน',
  `four` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '4. หนังสือมีชีวิต (Living book) ถ่ายทอดเนื้อหาได้อย่างน่าสนใจ',
  `five` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '5. การจัดโครงการห้องสมุดมนุษย์ (Human Library) มีประโยชน์',
  `six` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '6. การจัดโครงการห้องสมุดมนุษย์ (Human Library) มีความเหมาะสม',
  `seven` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '7. บรรยากาศในการจัดงานในครั้งนี้มีความเหมาะสม',
  `eight` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '8. สามารถนำความรู้ที่ได้รับไปประยุกต์ใช้ในการปฏิบัติงานและการดำเนินชีวิตประจำวันได้',
  `nine` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '9. อยากให้มีการจัดกิจกรรมนี้อีก',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for assessment_form_l3
-- ----------------------------
DROP TABLE IF EXISTS `assessment_form_l3`;
CREATE TABLE `assessment_form_l3`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสแปบบประเมิน',
  `p_id` int(11) DEFAULT NULL COMMENT 'รหัสแปบบประเมินหลัก',
  `one` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ข้อเสนอแนะเพิ่มเติมอื่น ๆ (โปรดระบุ)',
  `two` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หัวข้อที่ท่านสนใจที่จะร่วมกิจกรรมครั้งต่อไป (โปรดระบุ)',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for book
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการบรรยาย',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'หัวข้อการบรรยาย',
  `detail` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT 'รายละเอียดการบรรยาย',
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อผู้บรรยาย',
  `user_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รูปภาพผู้บรรยาย',
  `date` datetime(0) DEFAULT NULL COMMENT 'เวลาจัดการการบรรยาย',
  `create_by` bigint(20) DEFAULT NULL COMMENT 'สร้างโดย',
  `create_date` datetime(0) DEFAULT NULL COMMENT 'สร้างเมื่อ',
  `forder` int(11) DEFAULT NULL COMMENT 'ลำดับที่',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of book
-- ----------------------------
INSERT INTO `book` VALUES (1, 'demo1', 'demo1', 'ณัฐพล จันทร์ปาน', '1554631556.jpg', '2019-04-07 00:00:00', 1, '2019-04-07 17:05:56', 1);

-- ----------------------------
-- Table structure for events
-- ----------------------------
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events`  (
  `id` int(11) NOT NULL COMMENT 'รหัสกิจกรรม',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อกิจกรรม',
  `detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT 'รายละเอียดกิจกรรม',
  `create_at` int(255) DEFAULT NULL COMMENT 'สร้างโดย',
  `create_date` datetime(0) DEFAULT NULL COMMENT 'สร้างวันที่',
  `update_at` int(11) DEFAULT NULL COMMENT 'แก้ไขโดย',
  `update_date` datetime(0) DEFAULT NULL COMMENT 'แก้ไขเมื่อวันที่',
  `rstat` int(11) DEFAULT NULL COMMENT 'สถานะ',
  `forder` int(11) DEFAULT NULL COMMENT 'เรียงลำดับ',
  `event_type` int(11) DEFAULT NULL COMMENT 'ประเภทกิจกรรม',
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ภาพขนาดเล็ก',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of events
-- ----------------------------
INSERT INTO `events` VALUES (1554476960, 'demo1', 'demo1', 1, '2019-03-26 07:27:10', 1, '2019-04-05 22:09:20', 1, 1, 1, '1554476960.jpg');
INSERT INTO `events` VALUES (1554629666, 'Demo2', 'Demo Vido file', NULL, '2019-04-07 16:34:26', NULL, NULL, 1, 2, 1, '1554629666.jpg');

-- ----------------------------
-- Table structure for files
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'รหัสไฟล์',
  `event_id` bigint(20) DEFAULT NULL COMMENT 'ชื่อกิจกรรม',
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อไฟล์',
  `file_name_origin` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อไฟล์ต้นฉบับ',
  `forder` int(11) DEFAULT NULL COMMENT 'เรียงลำดับไฟล์',
  `created_by` int(11) DEFAULT NULL COMMENT 'สร้างโดย',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15546177361001 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of files
-- ----------------------------
INSERT INTO `files` VALUES (1553564782, 1553560065, '20190326_084622_861.jpg', '23875.jpg', 100000, 1);
INSERT INTO `files` VALUES (1553564802, 1553560065, '20190326_084642_218.jpg', '23861.jpg', 99999, 1);
INSERT INTO `files` VALUES (1553564803, 1553560065, '20190326_084643_426.jpg', '23870.jpg', 99998, 1);
INSERT INTO `files` VALUES (1553564804, 1553560065, '20190326_084644_152.jpg', '23879.jpg', 99997, 1);
INSERT INTO `files` VALUES (1553564805, 1553560065, '20190326_084645_530.jpg', '23888.jpg', 99996, 1);
INSERT INTO `files` VALUES (1553564806, 1553560065, '20190326_084646_281.jpg', '25667.jpg', 99995, 1);
INSERT INTO `files` VALUES (1553564807, 1553560065, '20190326_084647_28.jpg', '25676.jpg', 99994, 1);
INSERT INTO `files` VALUES (1553564808, 1553560065, '20190326_084648_612.jpg', '25685.jpg', 99993, 1);
INSERT INTO `files` VALUES (1553564832, 1553560065, '20190326_084712_618.jpg', '25680.jpg', 99992, 1);
INSERT INTO `files` VALUES (155356492667, 1553560065, '20190326_084846_125.jpg', '23887.jpg', 99991, 1);
INSERT INTO `files` VALUES (155356516951, 1553565137, '20190326_085249_21.jpg', '23891.jpg', 99954, 1);
INSERT INTO `files` VALUES (155356517155, 1553565137, '20190326_085251_286.jpg', '25677.jpg', 99940, 1);
INSERT INTO `files` VALUES (155356517214, 1553565137, '20190326_085252_902.jpg', '25683.jpg', 99935, 1);
INSERT INTO `files` VALUES (155356517230, 1553565137, '20190326_085252_904.jpg', '25687.jpg', 99931, 1);
INSERT INTO `files` VALUES (1553564935152, 1553560065, '20190326_084855_832.jpg', '23879.jpg', 99988, 1);
INSERT INTO `files` VALUES (1553564935397, 1553560065, '20190326_084855_916.jpg', '23881.jpg', 99986, 1);
INSERT INTO `files` VALUES (1553564935618, 1553560065, '20190326_084855_738.jpg', '23876.jpg', 99987, 1);
INSERT INTO `files` VALUES (1553564935635, 1553560065, '20190326_084855_145.jpg', '23880.jpg', 99985, 1);
INSERT INTO `files` VALUES (1553564935736, 1553560065, '20190326_084855_149.jpg', '23877.jpg', 99990, 1);
INSERT INTO `files` VALUES (1553564935883, 1553560065, '20190326_084855_804.jpg', '23878.jpg', 99989, 1);
INSERT INTO `files` VALUES (1553564964986, 1553560065, '20190326_084924_349.jpg', '25683.jpg', 99984, 1);
INSERT INTO `files` VALUES (1553564972606, 1553560065, '20190326_084932_522.jpg', '25682.jpg', 99983, 1);
INSERT INTO `files` VALUES (1553565166308, 1553565137, '20190326_085246_659.jpg', '23861.jpg', 99982, 1);
INSERT INTO `files` VALUES (1553565166354, 1553565137, '20190326_085246_386.jpg', '23863.jpg', 99980, 1);
INSERT INTO `files` VALUES (1553565166752, 1553565137, '20190326_085246_17.jpg', '23862.jpg', 99981, 1);
INSERT INTO `files` VALUES (1553565166881, 1553565137, '20190326_085246_432.jpg', '23864.jpg', 99979, 1);
INSERT INTO `files` VALUES (1553565166905, 1553565137, '20190326_085246_76.jpg', '23866.jpg', 99978, 1);
INSERT INTO `files` VALUES (1553565167159, 1553565137, '20190326_085247_614.jpg', '23874.jpg', 99970, 1);
INSERT INTO `files` VALUES (1553565167182, 1553565137, '20190326_085247_398.jpg', '23876.jpg', 99968, 1);
INSERT INTO `files` VALUES (1553565167247, 1553565137, '20190326_085247_518.jpg', '23875.jpg', 99969, 1);
INSERT INTO `files` VALUES (1553565167293, 1553565137, '20190326_085247_632.jpg', '23868.jpg', 99973, 1);
INSERT INTO `files` VALUES (1553565167298, 1553565137, '20190326_085247_462.jpg', '23871.jpg', 99975, 1);
INSERT INTO `files` VALUES (1553565167447, 1553565137, '20190326_085247_599.jpg', '23867.jpg', 99974, 1);
INSERT INTO `files` VALUES (1553565167655, 1553565137, '20190326_085247_597.jpg', '23869.jpg', 99972, 1);
INSERT INTO `files` VALUES (1553565167767, 1553565137, '20190326_085247_783.jpg', '23873.jpg', 99971, 1);
INSERT INTO `files` VALUES (1553565167877, 1553565137, '20190326_085247_781.jpg', '23865.jpg', 99977, 1);
INSERT INTO `files` VALUES (1553565167917, 1553565137, '20190326_085247_485.jpg', '23870.jpg', 99976, 1);
INSERT INTO `files` VALUES (1553565168141, 1553565137, '20190326_085248_298.jpg', '23877.jpg', 99967, 1);
INSERT INTO `files` VALUES (1553565168189, 1553565137, '20190326_085248_305.jpg', '23878.jpg', 99966, 1);
INSERT INTO `files` VALUES (1553565168306, 1553565137, '20190326_085248_640.jpg', '23880.jpg', 99964, 1);
INSERT INTO `files` VALUES (1553565168548, 1553565137, '20190326_085248_57.jpg', '23881.jpg', 99963, 1);
INSERT INTO `files` VALUES (1553565168649, 1553565137, '20190326_085248_574.jpg', '23885.jpg', 99960, 1);
INSERT INTO `files` VALUES (1553565168669, 1553565137, '20190326_085248_10.jpg', '23882.jpg', 99962, 1);
INSERT INTO `files` VALUES (1553565168822, 1553565137, '20190326_085248_59.jpg', '23883.jpg', 99961, 1);
INSERT INTO `files` VALUES (1553565168965, 1553565137, '20190326_085248_231.jpg', '23879.jpg', 99965, 1);
INSERT INTO `files` VALUES (1553565169132, 1553565137, '20190326_085249_497.jpg', '23887.jpg', 99958, 1);
INSERT INTO `files` VALUES (1553565169474, 1553565137, '20190326_085249_716.jpg', '23886.jpg', 99959, 1);
INSERT INTO `files` VALUES (1553565169599, 1553565137, '20190326_085249_765.jpg', '23890.jpg', 99955, 1);
INSERT INTO `files` VALUES (1553565169635, 1553565137, '20190326_085249_624.jpg', '23889.jpg', 99956, 1);
INSERT INTO `files` VALUES (1553565169871, 1553565137, '20190326_085249_530.jpg', '23888.jpg', 99957, 1);
INSERT INTO `files` VALUES (1553565169872, 1553565137, '20190326_085249_825.jpg', '23892.jpg', 99953, 1);
INSERT INTO `files` VALUES (1553565170110, 1553565137, '20190326_085250_848.jpg', '25670.jpg', 99947, 1);
INSERT INTO `files` VALUES (1553565170138, 1553565137, '20190326_085250_177.jpg', '25667.jpg', 99950, 1);
INSERT INTO `files` VALUES (1553565170304, 1553565137, '20190326_085250_258.jpg', '25668.jpg', 99949, 1);
INSERT INTO `files` VALUES (1553565170362, 1553565137, '20190326_085250_757.jpg', '25666.jpg', 99951, 1);
INSERT INTO `files` VALUES (1553565170607, 1553565137, '20190326_085250_212.jpg', '23893.jpg', 99952, 1);
INSERT INTO `files` VALUES (1553565170691, 1553565137, '20190326_085250_649.jpg', '25671.jpg', 99946, 1);
INSERT INTO `files` VALUES (1553565170959, 1553565137, '20190326_085250_208.jpg', '25669.jpg', 99948, 1);
INSERT INTO `files` VALUES (1553565171118, 1553565137, '20190326_085251_69.jpg', '25674.jpg', 99943, 1);
INSERT INTO `files` VALUES (1553565171186, 1553565137, '20190326_085251_822.jpg', '25679.jpg', 99938, 1);
INSERT INTO `files` VALUES (1553565171197, 1553565137, '20190326_085251_550.jpg', '25676.jpg', 99941, 1);
INSERT INTO `files` VALUES (1553565171205, 1553565137, '20190326_085251_921.jpg', '25678.jpg', 99939, 1);
INSERT INTO `files` VALUES (1553565171320, 1553565137, '20190326_085251_43.jpg', '25673.jpg', 99944, 1);
INSERT INTO `files` VALUES (1553565171336, 1553565137, '20190326_085251_432.jpg', '25675.jpg', 99942, 1);
INSERT INTO `files` VALUES (1553565171363, 1553565137, '20190326_085251_641.jpg', '25672.jpg', 99945, 1);
INSERT INTO `files` VALUES (1553565172191, 1553565137, '20190326_085252_459.jpg', '25682.jpg', 99936, 1);
INSERT INTO `files` VALUES (1553565172317, 1553565137, '20190326_085252_208.jpg', '25680.jpg', 99937, 1);
INSERT INTO `files` VALUES (1553565172320, 1553565137, '20190326_085252_111.jpg', '25686.jpg', 99932, 1);
INSERT INTO `files` VALUES (1553565172815, 1553565137, '20190326_085252_916.jpg', '25684.jpg', 99934, 1);
INSERT INTO `files` VALUES (1553565172921, 1553565137, '20190326_085252_943.jpg', '25685.jpg', 99933, 1);
INSERT INTO `files` VALUES (1554617733612, 1554476960, '20190407_131533_294.jpg', '23874.jpg', 99916, 1);
INSERT INTO `files` VALUES (1554617733955, 1554476960, '20190407_131533_353.jpg', '23878.jpg', 99914, 1);
INSERT INTO `files` VALUES (1554617733971, 1554476960, '20190407_131533_617.jpg', '23876.jpg', 99917, 1);
INSERT INTO `files` VALUES (1554617733990, 1554476960, '20190407_131533_237.jpg', '23877.jpg', 99915, 1);
INSERT INTO `files` VALUES (1554617734314, 1554476960, '20190407_131534_10.jpg', '23880.jpg', 99912, 1);
INSERT INTO `files` VALUES (1554617734387, 1554476960, '20190407_131534_526.jpg', '23886.jpg', 99908, 1);
INSERT INTO `files` VALUES (1554617734455, 1554476960, '20190407_131534_71.jpg', '23879.jpg', 99913, 1);
INSERT INTO `files` VALUES (1554617734646, 1554476960, '20190407_131534_545.jpg', '23887.jpg', 99907, 1);
INSERT INTO `files` VALUES (1554617734832, 1554476960, '20190407_131534_449.jpg', '23882.jpg', 99911, 1);
INSERT INTO `files` VALUES (1554617734908, 1554476960, '20190407_131534_297.jpg', '23881.jpg', 99910, 1);
INSERT INTO `files` VALUES (1554617735284, 1554476960, '20190407_131535_319.jpg', '23891.jpg', 99902, 1);
INSERT INTO `files` VALUES (1554617735309, 1554476960, '20190407_131535_794.jpg', '23888.jpg', 99905, 1);
INSERT INTO `files` VALUES (1554617735413, 1554476960, '20190407_131535_474.jpg', '23885.jpg', 99906, 1);
INSERT INTO `files` VALUES (1554617735667, 1554476960, '20190407_131535_435.jpg', '23890.jpg', 99903, 1);
INSERT INTO `files` VALUES (1554617735786, 1554476960, '20190407_131535_369.jpg', '23893.jpg', 99900, 1);
INSERT INTO `files` VALUES (1554617735855, 1554476960, '20190407_131535_40.jpg', '23892.jpg', 99901, 1);
INSERT INTO `files` VALUES (1554617735870, 1554476960, '20190407_131535_192.jpg', '25666.jpg', 99899, 1);
INSERT INTO `files` VALUES (1554617735873, 1554476960, '20190407_131535_641.jpg', '23889.jpg', 99904, 1);
INSERT INTO `files` VALUES (1554617736304, 1554476960, '20190407_131536_611.jpg', '25669.jpg', 99896, 1);
INSERT INTO `files` VALUES (1554617736471, 1554476960, '20190407_131536_779.jpg', '25667.jpg', 99898, 1);
INSERT INTO `files` VALUES (1554617736640, 1554476960, '20190407_131536_101.jpg', '25670.jpg', 99895, 1);
INSERT INTO `files` VALUES (1554617736952, 1554476960, '20190407_131536_233.jpg', '25671.jpg', 99894, 1);
INSERT INTO `files` VALUES (1554617736977, 1554476960, '20190407_131536_993.jpg', '25672.jpg', 99893, 1);
INSERT INTO `files` VALUES (1554617736983, 1554476960, '20190407_131536_127.jpg', '25668.jpg', 99897, 1);
INSERT INTO `files` VALUES (1554617737418, 1554476960, '20190407_131537_942.jpg', '25676.jpg', 99889, 1);
INSERT INTO `files` VALUES (1554617737651, 1554476960, '20190407_131537_501.jpg', '25674.jpg', 99891, 1);
INSERT INTO `files` VALUES (1554617737797, 1554476960, '20190407_131537_189.jpg', '25678.jpg', 99887, 1);
INSERT INTO `files` VALUES (1554617737876, 1554476960, '20190407_131537_510.jpg', '25677.jpg', 99888, 1);
INSERT INTO `files` VALUES (1554617737936, 1554476960, '20190407_131537_516.jpg', '25675.jpg', 99890, 1);
INSERT INTO `files` VALUES (1554617738521, 1554476960, '20190407_131538_965.jpg', '25680.jpg', 99885, 1);
INSERT INTO `files` VALUES (1554617738876, 1554476960, '20190407_131538_578.jpg', '25679.jpg', 99886, 1);
INSERT INTO `files` VALUES (1554617739773, 1554476960, '20190407_131539_168.jpg', '26831.jpg', 99878, 1);
INSERT INTO `files` VALUES (1554629717134, 1554629666, '20190407_163517_801.mp4', 'SampleVideo_1280x720_2mb.mp4', 99877, 1);
INSERT INTO `files` VALUES (1554630584995, 1554476960, '20190407_164944_410.mp4', 'SampleVideo_1280x720_2mb.mp4', 99876, 1);
INSERT INTO `files` VALUES (1554630595596, 1554476960, '20190407_164955_804.mp4', 'SampleVideo_1280x720_1mb.mp4', 99875, 1);

-- ----------------------------
-- Table structure for info
-- ----------------------------
DROP TABLE IF EXISTS `info`;
CREATE TABLE `info`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้จัดทำ',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อผู้จัดทำ',
  `detail` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT 'รายละเอียดผู้จัดทำ',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of info
-- ----------------------------
INSERT INTO `info` VALUES (1, 'นายณัฐพล จันทร์ปาน', '<p>คณะ วิทยาศาสตรบัณฑิต สาขา วิทยาการคอมพิวเตอร์<br />\r\nที่อยู่ 22 ม.5 ต.หินตั้ง อ.บ้านไผ่ จ.ขอนแก่น 40110</p>\r\n');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration`  (
  `version` varchar(180) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', 1553559729);
INSERT INTO `migration` VALUES ('m130524_201442_init', 1553559745);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสบทบาท',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อบทบาท',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'ผู้ดูแลระบบ');
INSERT INTO `roles` VALUES (2, 'เจ้าหน้าที่ห้องสมุด (บรรณารักษ์)');
INSERT INTO `roles` VALUES (3, 'สมาชิก');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อผู้ใช้',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสผ่าน',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'อีเมล',
  `status` int(6) NOT NULL DEFAULT 10,
  `created_at` int(11) DEFAULT NULL COMMENT 'สร้างโดย',
  `updated_at` int(11) DEFAULT NULL COMMENT 'แก้ไขโดย',
  `firstname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อ',
  `lastname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'นามสกุล',
  `tel` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'เบอร์โทรศัพท์',
  `role` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'บทบาท',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (2, 'user1', '123456', 'user1@gmail.com', 10, NULL, NULL, 'user1', 'user1', '0650859480', '[\"2\",\"3\"]');
INSERT INTO `user` VALUES (3, 'admin', '123456', 'admin@gmail.com', 10, NULL, NULL, 'Admin', 'Service', '0650859480', '[\"1\"]');

SET FOREIGN_KEY_CHECKS = 1;
