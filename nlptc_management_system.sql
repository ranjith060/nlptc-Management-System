-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2026 at 03:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nlptc_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_periods`
--

CREATE TABLE `academic_periods` (
  `academic_year` varchar(9) NOT NULL,
  `semester_number` int(11) NOT NULL,
  `study_year` int(11) NOT NULL,
  `semester_type` enum('Odd','Even') NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admission_applications`
--

CREATE TABLE `admission_applications` (
  `admission_no` varchar(50) NOT NULL,
  `application_date` date DEFAULT curdate(),
  `application_status` enum('waiting','admitted','cancelled') DEFAULT 'waiting',
  `student_name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `mother_tongue` varchar(20) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `religion` varchar(20) DEFAULT NULL,
  `community` varchar(20) DEFAULT NULL,
  `caste` varchar(30) DEFAULT NULL,
  `aadhar_no` char(12) DEFAULT NULL,
  `umis_no` varchar(20) DEFAULT NULL,
  `emis_no` varchar(20) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `student_photo` varchar(255) DEFAULT NULL,
  `blood_group` enum('A+','A-','B+','B-','O+','O-','AB+','AB-') DEFAULT NULL,
  `course_code` varchar(20) NOT NULL,
  `admission_type` enum('1st Year','Lateral','Transfer') DEFAULT NULL,
  `admission_fee_paid` enum('yes','no') DEFAULT 'no',
  `documents_submitted` enum('yes','no') DEFAULT 'no',
  `father_name` varchar(100) DEFAULT NULL,
  `father_mobile` varchar(15) DEFAULT NULL,
  `father_occupation` varchar(100) DEFAULT NULL,
  `father_income` decimal(10,2) DEFAULT NULL,
  `father_photo` varchar(255) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `mother_mobile` varchar(15) DEFAULT NULL,
  `mother_occupation` varchar(100) DEFAULT NULL,
  `mother_income` decimal(10,2) DEFAULT NULL,
  `mother_photo` varchar(255) DEFAULT NULL,
  `guardian_name` varchar(100) DEFAULT NULL,
  `guardian_relation` varchar(50) DEFAULT NULL,
  `guardian_mobile` varchar(15) DEFAULT NULL,
  `guardian_occupation` varchar(100) DEFAULT NULL,
  `guardian_photo` varchar(255) DEFAULT NULL,
  `reference_type` enum('student','faculty','consultancy','alumni') DEFAULT NULL,
  `ref_student_name` varchar(100) DEFAULT NULL,
  `ref_student_year` varchar(20) DEFAULT NULL,
  `ref_student_department` varchar(100) DEFAULT NULL,
  `ref_alumni_name` varchar(100) DEFAULT NULL,
  `ref_alumni_passed_year` year(4) DEFAULT NULL,
  `ref_alumni_department` varchar(100) DEFAULT NULL,
  `ref_faculty_name` varchar(100) DEFAULT NULL,
  `ref_faculty_department` varchar(100) DEFAULT NULL,
  `ref_faculty_designation` varchar(100) DEFAULT NULL,
  `ref_consultancy_name` varchar(150) DEFAULT NULL,
  `ref_consultancy_contact` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_code` varchar(20) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `approved_intake` int(11) NOT NULL,
  `duration_years` int(11) NOT NULL,
  `total_semesters` int(11) NOT NULL,
  `year_of_established` int(11) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_code`, `course_name`, `approved_intake`, `duration_years`, `total_semesters`, `year_of_established`, `status`) VALUES
('1052', 'Diploma in Computer Engineering', 60, 3, 6, 2005, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `eligibility`
--

CREATE TABLE `eligibility` (
  `eligibility_id` int(11) NOT NULL,
  `admission_no` varchar(50) NOT NULL,
  `qualification` enum('SSLC','HSC') DEFAULT NULL,
  `group_name` varchar(50) DEFAULT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  `marks_obtained` int(11) DEFAULT NULL,
  `max_marks` int(11) DEFAULT 100,
  `total_obtained_marks` int(11) DEFAULT NULL,
  `total_max_marks` int(11) DEFAULT NULL,
  `percentage` decimal(5,2) DEFAULT NULL,
  `passed_year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` varchar(20) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `course_code` varchar(20) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `qualification` varchar(30) DEFAULT NULL,
  `specialization` varchar(30) DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `pan_id` char(10) DEFAULT NULL,
  `aadhar_id` char(12) DEFAULT NULL,
  `relieving_date` date DEFAULT NULL,
  `resume_pdf` varchar(255) DEFAULT NULL,
  `sslc_hsc_certificate` varchar(255) DEFAULT NULL,
  `higher_degree_proof` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` varchar(20) NOT NULL,
  `student_name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `mother_tongue` varchar(20) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `religion` varchar(20) DEFAULT NULL,
  `community` varchar(20) DEFAULT NULL,
  `caste` varchar(30) DEFAULT NULL,
  `aadhar_no` char(12) DEFAULT NULL,
  `umis_no` varchar(20) DEFAULT NULL,
  `emis_no` varchar(20) DEFAULT NULL,
  `blood_group` enum('A+','A-','B+','B-','O+','O-','AB+','AB-') DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `student_photo` varchar(255) DEFAULT NULL,
  `course_code` varchar(20) NOT NULL,
  `date_of_joining` date NOT NULL,
  `batch_year` varchar(9) NOT NULL,
  `reg_no` bigint(20) NOT NULL,
  `current_year` int(11) DEFAULT 1,
  `current_semester` int(11) DEFAULT 1,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `dob`, `mother_tongue`, `gender`, `religion`, `community`, `caste`, `aadhar_no`, `umis_no`, `emis_no`, `blood_group`, `phone`, `email`, `address`, `student_photo`, `course_code`, `date_of_joining`, `batch_year`, `reg_no`, `current_year`, `current_semester`, `last_login`, `created_at`, `updated_at`) VALUES
('3182627cse001', 'Ranjith N', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1052', '2026-01-04', '2023-2026', 24502731, 1, 1, NULL, '2026-01-04 14:29:44', '2026-01-04 14:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('admin','faculty','student') NOT NULL,
  `admission_no` varchar(50) DEFAULT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `faculty_id` varchar(20) DEFAULT NULL,
  `is_active` enum('yes','no') DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password_hash`, `role`, `admission_no`, `student_id`, `faculty_id`, `is_active`, `created_at`, `last_login`) VALUES
('admin', '$2y$10$oUqmEL3OO6NmoDQEYKlARODRrdz7q229o389wh6auP7NyNpd2zjPW', 'admin', NULL, NULL, NULL, 'yes', '2026-01-04 13:19:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_periods`
--
ALTER TABLE `academic_periods`
  ADD PRIMARY KEY (`academic_year`,`semester_number`);

--
-- Indexes for table `admission_applications`
--
ALTER TABLE `admission_applications`
  ADD PRIMARY KEY (`admission_no`),
  ADD UNIQUE KEY `aadhar_no` (`aadhar_no`),
  ADD UNIQUE KEY `umis_no` (`umis_no`),
  ADD UNIQUE KEY `emis_no` (`emis_no`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `eligibility`
--
ALTER TABLE `eligibility`
  ADD PRIMARY KEY (`eligibility_id`),
  ADD KEY `admission_no` (`admission_no`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `pan_id` (`pan_id`),
  ADD UNIQUE KEY `aadhar_id` (`aadhar_id`),
  ADD KEY `course_code` (`course_code`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `reg_no` (`reg_no`),
  ADD UNIQUE KEY `aadhar_no` (`aadhar_no`),
  ADD UNIQUE KEY `umis_no` (`umis_no`),
  ADD UNIQUE KEY `emis_no` (`emis_no`),
  ADD KEY `course_code` (`course_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eligibility`
--
ALTER TABLE `eligibility`
  MODIFY `eligibility_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eligibility`
--
ALTER TABLE `eligibility`
  ADD CONSTRAINT `eligibility_ibfk_1` FOREIGN KEY (`admission_no`) REFERENCES `admission_applications` (`admission_no`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;