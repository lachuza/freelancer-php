/*
 Navicat MySQL Data Transfer

 Source Server         : test
 Source Server Type    : MySQL
 Source Server Version : 100132
 Source Host           : localhost:3306
 Source Schema         : simple_db

 Target Server Type    : MySQL
 Target Server Version : 100132
 File Encoding         : 65001

 Date: 21/09/2018 23:10:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for assessment_form
-- ----------------------------
DROP TABLE IF EXISTS `assessment_form`;
CREATE TABLE `assessment_form`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pre_event_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `post_event_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pre_reminder` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `pre_reminder_day` int(11) NULL DEFAULT 14,
  `post_reminder` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `post_reminder_day` int(11) NULL DEFAULT NULL COMMENT '14',
  `year` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `semester` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `assessment_release_date` date NULL DEFAULT NULL,
  `submission_due_date` date NULL DEFAULT NULL,
  `course_id` int(11) NULL DEFAULT NULL,
  `course_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `course_schedule_origin` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `course_prescription_origin` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of assessment_form
-- ----------------------------
INSERT INTO `assessment_form` VALUES (1, 'dfdf', NULL, NULL, NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL);

-- ----------------------------
-- Table structure for assign_role
-- ----------------------------
DROP TABLE IF EXISTS `assign_role`;
CREATE TABLE `assign_role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `teacher_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `moderator_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `course_kind` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `course_year` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `course_semester` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of assign_role
-- ----------------------------
INSERT INTO `assign_role` VALUES (3, 'Taught', 'abbb', 'q', 'Taught', NULL, NULL);

-- ----------------------------
-- Table structure for files
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `uploaded_on` date NULL DEFAULT NULL,
  `status` enum('0','1','') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kind` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `course_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `origin_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `form_id` int(11) NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of files
-- ----------------------------
INSERT INTO `files` VALUES (1, 'uploads/60_Taught/5ba4bdcddb155111.jpg', '2018-09-21', NULL, 'assessment_description', 'Taught', '111.jpg', 60, NULL, NULL, 'abbb');
INSERT INTO `files` VALUES (2, 'uploads/00000000062_Taught/5ba501f913511111.jpg', '2018-09-21', NULL, 'assessment_description', 'Taught', '111.jpg', 62, NULL, NULL, 'abbb');
INSERT INTO `files` VALUES (3, 'uploads/00000000062_Taught/5ba501f91f6c5Screenshot_2.png', '2018-09-21', NULL, 'marking_criteria', 'Taught', 'Screenshot_2.png', 62, NULL, NULL, 'abbb');
INSERT INTO `files` VALUES (4, 'uploads/00000000059_Taught/5ba507f113013ModernLudo_01.html', '2018-09-21', NULL, 'assessment_description', 'Taught', 'ModernLudo_01.html', 59, NULL, NULL, 'abbb');
INSERT INTO `files` VALUES (5, 'uploads/00000000059_Taught/5ba508138ee0eModernLudo.html', '2018-09-21', NULL, 'marking_criteria', 'Taught', 'ModernLudo.html', 59, NULL, NULL, 'abbb');
INSERT INTO `files` VALUES (6, 'uploads/00000000059_Taught/5ba5085fe24e8ModernLudo.html', '2018-09-21', NULL, 'exam_solution', 'Taught', 'ModernLudo.html', 59, NULL, NULL, 'abbb');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `last_name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` timestamp(0) NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_level` int(10) NOT NULL DEFAULT 1 COMMENT '0:admin',
  `gender` enum('') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `dob` date NULL DEFAULT NULL,
  `level` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`users_id`) USING BTREE,
  UNIQUE INDEX `email_UNIQUE`(`email`) USING BTREE,
  UNIQUE INDEX `username_UNIQUE`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (19, 'kelvin', 'schelor', 'admin@admin.com', '89177a6c3708ca433e918ce0043d6affb33db7f8', 0, '2018-09-04 18:53:07', '2018-09-21 17:37:15', 'abbb', '123', 1, NULL, '', '0000-00-00', 'admin');
INSERT INTO `users` VALUES (33, 'Ahmed', 'Alghamdi', 'a.moca@gmail.com', '89177a6c3708ca433e918ce0043d6affb33db7f8', 1, '2018-09-07 15:23:46', NULL, 'ahmoca_23', '678789090', 1, NULL, '', '2018-09-14', NULL);

SET FOREIGN_KEY_CHECKS = 1;
