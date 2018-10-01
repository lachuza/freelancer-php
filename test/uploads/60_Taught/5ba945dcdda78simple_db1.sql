-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2018 at 08:53 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simple_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment_form`
--

CREATE TABLE `assessment_form` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `pre_event_status` varchar(255) DEFAULT NULL,
  `post_event_status` varchar(255) DEFAULT NULL,
  `pre_reminder` text,
  `pre_reminder_day` int(11) DEFAULT '14',
  `post_reminder` text,
  `post_reminder_day` int(11) DEFAULT NULL COMMENT '14',
  `year` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `assessment_release_date` date DEFAULT NULL,
  `submission_due_date` date DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `course_description` varchar(255) DEFAULT '',
  `course_schedule_file` varchar(255) DEFAULT NULL,
  `course_prescription_file` varchar(255) DEFAULT NULL,
  `course_schedule_origin` varchar(255) DEFAULT NULL,
  `course_prescription_origin` varchar(255) DEFAULT NULL,
  `qustion_1` varchar(11) DEFAULT NULL,
  `qustion_2` double DEFAULT NULL,
  `qustion_3` varchar(255) DEFAULT NULL,
  `qustion_4` varchar(255) DEFAULT NULL,
  `qustion_5` varchar(255) DEFAULT NULL,
  `qustion_6` varchar(255) DEFAULT NULL,
  `qustion_7` varchar(255) DEFAULT NULL,
  `qustion_8` varchar(255) DEFAULT NULL,
  `qustion_9` varchar(255) DEFAULT NULL,
  `qustion_10` varchar(255) DEFAULT NULL,
  `qustion_11` varchar(255) DEFAULT NULL,
  `qustion_12` varchar(255) DEFAULT NULL,
  `post_1` varchar(255) DEFAULT NULL,
  `post_2` varchar(255) DEFAULT NULL,
  `post_3` varchar(255) DEFAULT NULL,
  `post_4` varchar(255) DEFAULT NULL,
  `post_5` varchar(255) DEFAULT NULL,
  `post_6` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assessment_form`
--

INSERT INTO `assessment_form` (`id`, `course_name`, `pre_event_status`, `post_event_status`, `pre_reminder`, `pre_reminder_day`, `post_reminder`, `post_reminder_day`, `year`, `semester`, `assessment_release_date`, `submission_due_date`, `course_id`, `course_description`, `course_schedule_file`, `course_prescription_file`, `course_schedule_origin`, `course_prescription_origin`, `qustion_1`, `qustion_2`, `qustion_3`, `qustion_4`, `qustion_5`, `qustion_6`, `qustion_7`, `qustion_8`, `qustion_9`, `qustion_10`, `qustion_11`, `qustion_12`, `post_1`, `post_2`, `post_3`, `post_4`, `post_5`, `post_6`) VALUES
(58, 'Taught', 'Reviewed_', 'Reviewed_', NULL, 21, NULL, 7, '2018', '1', '2018-09-13', '2018-09-19', 19, 'ASDAdasdadasdasdasd', NULL, NULL, NULL, NULL, '0', 1, '2', '', '', '', '', '', '', '5', '6', '', NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'Taught', 'Completed_', '', NULL, NULL, NULL, NULL, NULL, '1', '2018-09-05', '1900-12-06', 19, 'ASDAdasdadasdasdasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'Taught', '', '', '', 14, NULL, NULL, '2018', '1', '2018-09-29', '2018-09-26', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'Taught', '', '', '', 14, '', 1, '2018', '1', '2018-09-11', '2018-09-27', 3, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'Taught', 'Uploaded_', '', '', 14, '', 1, '2018', '1', '2018-09-11', '2018-09-24', 3, 'AASA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assign_role`
--

CREATE TABLE `assign_role` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `moderator_name` varchar(255) NOT NULL,
  `course_kind` varchar(255) NOT NULL,
  `course_year` varchar(255) DEFAULT NULL,
  `course_semester` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assign_role`
--

INSERT INTO `assign_role` (`id`, `course_name`, `teacher_name`, `moderator_name`, `course_kind`, `course_year`, `course_semester`) VALUES
(3, 'Taught', 'abbb', 'ahmoca_23', 'Taught', '111', '111');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `uploaded_on` date DEFAULT NULL,
  `status` enum('0','1','') DEFAULT NULL,
  `kind` varchar(255) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `origin_name` varchar(255) DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_name`, `uploaded_on`, `status`, `kind`, `course_name`, `origin_name`, `form_id`, `description`, `comment`, `username`) VALUES
(74, 'uploads/58_Taught/5b9267f268236index.php', '2018-09-07', NULL, 'marking_criteria', 'Taught', 'index.php', 58, NULL, NULL, 'abbb'),
(75, 'uploads/58_Taught/5b9267f26920blist.php', '2018-09-07', NULL, 'exam_solution', 'Taught', 'list.php', 58, NULL, NULL, 'abbb'),
(76, 'uploads/58_Taught/5b9267f26a598list.php', '2018-09-07', NULL, 'pre_event_file', 'Taught', 'list.php', 58, NULL, '', 'abbb'),
(77, 'uploads/58_Taught/5b9267f26b538index.php', '2018-09-07', NULL, 'post_event_file', 'Taught', 'index.php', 58, NULL, '', 'abbb'),
(78, 'uploads/58_Taught/5b9267f26c4d6list.php', '2018-09-07', NULL, 'student_sample_low', 'Taught', 'list.php', 58, NULL, NULL, 'abbb'),
(79, 'uploads/58_Taught/5b9267f26d521index.php', '2018-09-07', NULL, 'student_sample_medium', 'Taught', 'index.php', 58, NULL, NULL, 'abbb'),
(80, 'uploads/58_Taught/5b9267f26e5b8list.php', '2018-09-07', NULL, 'student_sample_high', 'Taught', 'list.php', 58, NULL, NULL, 'abbb'),
(81, 'uploads/58_Taught/5b92684534f5dindex.php', '2018-09-07', NULL, 'assessment_description', 'Taught', 'index.php', 58, NULL, NULL, 'abbb'),
(82, 'uploads/59_Taught/5b939776aa02c1.JPG', '2018-09-08', NULL, 'assessment_description', 'Taught', '1.JPG', 59, NULL, NULL, 'abbb'),
(83, 'uploads/59_Taught/5b93981d8f97f3.png', '2018-09-08', NULL, 'marking_criteria', 'Taught', '3.png', 59, NULL, NULL, 'abbb'),
(84, 'uploads/59_Taught/5b93982480557photo.jpg', '2018-09-08', NULL, 'exam_solution', 'Taught', 'photo.jpg', 59, NULL, NULL, 'abbb'),
(85, 'uploads/59_Taught/5b93c5f2d55aaProject Requirementsv1.docx', '2018-09-08', NULL, 'assessment_description', 'Taught', 'Project Requirementsv1.docx', 59, NULL, NULL, 'abbb'),
(86, 'uploads/62_Taught/5b97a9f31eb65DES.java', '2018-09-11', NULL, 'assessment_description', 'Taught', 'DES.java', 62, NULL, NULL, 'abbb'),
(87, 'uploads/62_Taught/5b97a9f320ac3DES.java', '2018-09-11', NULL, 'marking_criteria', 'Taught', 'DES.java', 62, NULL, NULL, 'abbb'),
(88, 'uploads/62_Taught/5b97a9f3216f1DES.java', '2018-09-11', NULL, 'exam_solution', 'Taught', 'DES.java', 62, NULL, NULL, 'abbb'),
(89, 'uploads/62_Taught/5b97a9f322dc4DES.java', '2018-09-11', NULL, 'pre_event_file', 'Taught', 'DES.java', 62, NULL, '', 'abbb'),
(90, 'uploads/59_Taught/5ba12f2bd58064.png', '2018-09-18', NULL, 'assessment_description', 'Taught', '4.png', 59, NULL, NULL, 'abbb'),
(91, 'uploads/58_Taught/5ba1357cbec9f1.java', '2018-09-18', NULL, 'assessment_description', 'Taught', '1.java', 58, NULL, NULL, 'abbb');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(64) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` timestamp NULL DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_level` int(10) NOT NULL DEFAULT '1' COMMENT '0:admin',
  `gender` enum('') DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `first_name`, `last_name`, `email`, `password`, `is_active`, `created_at`, `last_login`, `username`, `phone`, `user_level`, `gender`, `address`, `dob`, `level`) VALUES
(19, 'Kelvin1', 'Scheolor1', 'admin@admin.com', '89177a6c3708ca433e918ce0043d6affb33db7f8', 0, '2018-09-04 10:53:07', '2018-09-23 05:50:22', 'abbb', '123', 1, NULL, '1506 Shi, 3 Danyuan, Tongchun Jie 18 Hao Lou                    ', NULL, 'admin'),
(33, 'Ahmed', 'Alghamdi', 'a.moca@gmail.com', '89177a6c3708ca433e918ce0043d6affb33db7f8', 1, '2018-09-07 07:23:46', NULL, 'ahmoca_23', '678789090', 1, NULL, '', '2018-09-14', NULL),
(37, 'asd', 'asd', 'asd@asd.com', '89177a6c3708ca433e918ce0043d6affb33db7f8', 0, '2018-09-10 08:47:03', '2018-09-10 08:47:03', 'ahmoca_23', 'asdasd', 1, NULL, '', '0000-00-00', 'Taught'),
(38, 'aa', 'aa', 'a@a.com', '52cd9a72ad76164f76580500abe983b092361946', 0, '2018-09-17 14:50:14', '2018-09-17 14:50:14', 'ahmoca_23', 'aa', 1, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment_form`
--
ALTER TABLE `assessment_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_role`
--
ALTER TABLE `assign_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment_form`
--
ALTER TABLE `assessment_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `assign_role`
--
ALTER TABLE `assign_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
