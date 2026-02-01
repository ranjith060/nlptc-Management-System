-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2026 at 04:19 PM
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

--
-- Dumping data for table `academic_periods`
--

INSERT INTO `academic_periods` (`academic_year`, `semester_number`, `study_year`, `semester_type`, `start_date`, `end_date`) VALUES
('2023-2024', 1, 1, 'Odd', '2023-06-01', '2023-10-30'),
('2023-2024', 2, 1, 'Even', '2023-11-01', '2024-04-30'),
('2024-2025', 3, 2, 'Odd', '2024-06-01', '2024-10-30'),
('2024-2025', 4, 2, 'Even', '2024-11-01', '2025-04-30'),
('2025-2026', 5, 3, 'Odd', '0000-00-00', '0000-00-00'),
('2025-2026', 6, 3, 'Even', '2025-11-01', '2026-04-30');

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
  `age` int(2) DEFAULT NULL,
  `mother_tongue` varchar(20) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `religion` varchar(20) DEFAULT NULL,
  `community` varchar(20) DEFAULT NULL,
  `caste` varchar(30) DEFAULT NULL,
  `aadhar_no` char(12) DEFAULT NULL,
  `umis_no` varchar(20) DEFAULT NULL,
  `emis_no` varchar(20) DEFAULT NULL,
  `sslc_reg_no` varchar(20) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `student_photo` varchar(255) DEFAULT NULL,
  `blood_group` enum('A+','A-','B+','B-','O+','O-','AB+','AB-') DEFAULT NULL,
  `course_name` varchar(50) NOT NULL,
  `date_of_joining` date DEFAULT NULL,
  `period_of_study` varchar(20) DEFAULT NULL,
  `admission_type` enum('1st Year','Lateral','Transfer') DEFAULT NULL,
  `admission_fee_paid` enum('yes','no') DEFAULT 'no',
  `documents_submitted` enum('yes','no') DEFAULT 'no',
  `father_name` varchar(100) DEFAULT NULL,
  `father_mobile` varchar(15) DEFAULT NULL,
  `father_address` text DEFAULT NULL,
  `father_occupation` varchar(100) DEFAULT NULL,
  `father_income` decimal(10,2) DEFAULT NULL,
  `father_photo` varchar(255) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `mother_mobile` varchar(15) DEFAULT NULL,
  `mother_address` text DEFAULT NULL,
  `mother_occupation` varchar(100) DEFAULT NULL,
  `mother_income` decimal(10,2) DEFAULT NULL,
  `mother_photo` varchar(255) DEFAULT NULL,
  `guardian_name` varchar(100) DEFAULT NULL,
  `guardian_relation` varchar(50) DEFAULT NULL,
  `guardian_mobile` varchar(15) DEFAULT NULL,
  `guardian_address` text DEFAULT NULL,
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
  `ref_consultancy_contact` varchar(15) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `bank_branch` varchar(100) DEFAULT NULL,
  `bank_account_no` varchar(30) DEFAULT NULL,
  `ifsc_code` varchar(15) DEFAULT NULL,
  `transport_required` enum('Yes','No') DEFAULT 'No',
  `transport_place_from` varchar(100) DEFAULT NULL,
  `hostel_required` enum('Yes','No') DEFAULT 'No',
  `course_code` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission_applications`
--

INSERT INTO `admission_applications` (`admission_no`, `application_date`, `application_status`, `student_name`, `dob`, `age`, `mother_tongue`, `gender`, `religion`, `community`, `caste`, `aadhar_no`, `umis_no`, `emis_no`, `sslc_reg_no`, `phone`, `email`, `address`, `permanent_address`, `student_photo`, `blood_group`, `course_name`, `date_of_joining`, `period_of_study`, `admission_type`, `admission_fee_paid`, `documents_submitted`, `father_name`, `father_mobile`, `father_address`, `father_occupation`, `father_income`, `father_photo`, `mother_name`, `mother_mobile`, `mother_address`, `mother_occupation`, `mother_income`, `mother_photo`, `guardian_name`, `guardian_relation`, `guardian_mobile`, `guardian_address`, `guardian_occupation`, `guardian_photo`, `reference_type`, `ref_student_name`, `ref_student_year`, `ref_student_department`, `ref_alumni_name`, `ref_alumni_passed_year`, `ref_alumni_department`, `ref_faculty_name`, `ref_faculty_department`, `ref_faculty_designation`, `ref_consultancy_name`, `ref_consultancy_contact`, `bank_name`, `bank_branch`, `bank_account_no`, `ifsc_code`, `transport_required`, `transport_place_from`, `hostel_required`, `course_code`) VALUES
('ADM001', '2026-01-22', 'admitted', 'Arun Kumar', '2007-03-12', 18, 'Tamil', 'Male', 'Hindu', 'BC', 'Vanniyar', '123456789001', 'UMIS001', 'EMIS001', 'SSLC001', '9876543001', 'arun1@mail.com', 'Coimbatore', 'Coimbatore', 'arun.jpg', 'O+', 'Diploma in COMPUTER ENGINEERING', '2025-06-01', '2025-2028', '1st Year', 'yes', 'yes', 'Kumar', '9876500001', 'Coimbatore', 'Farmer', 250000.00, 'f1.jpg', 'Lakshmi', '9876500002', 'Coimbatore', 'Housewife', 0.00, 'm1.jpg', 'Ramesh', 'Uncle', '9876500003', 'Coimbatore', 'Business', 'g1.jpg', 'student', 'Senior Arun', '3', 'CSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SBI', 'MTP', '12345678901', 'SBIN0000123', 'Yes', 'Mettupalayam', 'No', '1052'),
('ADM002', '2026-01-22', 'admitted', 'ranjith', '2007-03-12', 18, 'Tamil', 'Male', 'Hindu', 'BC', 'Vanniyar', '12345678901', 'UMIS002', 'EMIS002', 'SSLC001', '9876543001', 'arun1@mail.com', 'Coimbatore', 'Coimbatore', 'arun.jpg', 'O+', 'Diploma in COMPUTER ENGINEERING', '2025-06-01', '2025-2028', '1st Year', 'yes', 'yes', 'Kumar', '9876500002', 'Coimbatore', 'Farmer', 250000.00, 'f1.jpg', 'Lakshmi', '9876500002', 'Coimbatore', 'Housewife', 0.00, 'm1.jpg', 'Ramesh', 'Uncle', '9876500003', 'Coimbatore', 'Business', 'g1.jpg', 'student', 'Senior Arun', '3', 'CSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SBI', 'MTP', '1234567890', 'SBIN0000123', 'Yes', 'Mettupalayam', 'No', '1052'),
('ADM003', '2026-01-22', 'waiting', 'radha', '2007-03-12', 18, 'Tamil', 'Male', 'Hindu', 'BC', 'Vanniyar', '12345678902', 'UMIS003', 'EMIS003', 'SSLC003', '9876543002', 'arun1@mail.com', 'Coimbatore', 'Coimbatore', 'arun.jpg', 'O+', 'Diploma in COMPUTER ENGINEERING', '2025-06-01', '2025-2028', '1st Year', 'yes', 'yes', 'Kumar', '9876500003', 'Coimbatore', 'Farmer', 250000.00, 'f1.jpg', 'Lakshmi', '9876500003', 'Coimbatore', 'Housewife', 0.00, 'm1.jpg', 'Ramesh', 'Uncle', '9876500003', 'Coimbatore', 'Business', 'g1.jpg', 'student', 'Senior Arun', '3', 'CSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SBI', 'MTP', '1234567890', 'SBIN0000123', 'Yes', 'Mettupalayam', 'No', '1052'),
('ADM004', '2026-01-22', 'waiting', 'harsith', '2007-03-12', 18, 'Tamil', 'Male', 'Hindu', 'BC', 'Vanniyar', '12345678904', 'UMIS004', 'EMIS004', 'SSLC004', '9876543004', 'arun1@mail.com', 'Coimbatore', 'Coimbatore', 'arun.jpg', 'O+', 'Diploma in COMPUTER ENGINEERING', '2025-06-01', '2025-2028', '1st Year', 'yes', 'yes', 'Kumar', '9876500004', 'Coimbatore', 'Farmer', 250000.00, 'f1.jpg', 'Lakshmi', '987650004', 'Coimbatore', 'Housewife', 0.00, 'm1.jpg', 'Ramesh', 'Uncle', '9876500004', 'Coimbatore', 'Business', 'g1.jpg', 'student', 'Senior Arun', '3', 'CSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SBI', 'MTP', '1234567890', 'SBIN0000123', 'Yes', 'Mettupalayam', 'No', '1052'),
('ADM005', '2026-01-22', 'waiting', 'monishprasad', '2007-03-12', 18, 'Tamil', 'Male', 'Hindu', 'BC', 'Vanniyar', '12345678905', 'UMIS005', 'EMIS005', 'SSLC005', '9876543005', 'arun1@mail.com', 'Coimbatore', 'Coimbatore', 'arun.jpg', 'O+', 'Diploma in COMPUTER ENGINEERING', '2025-06-01', '2025-2028', '1st Year', 'yes', 'yes', 'Kumar', '9876500005', 'Coimbatore', 'Farmer', 250000.00, 'f1.jpg', 'Lakshmi', '9876500005', 'Coimbatore', 'Housewife', 0.00, 'm1.jpg', 'Ramesh', 'Uncle', '9876500005', 'Coimbatore', 'Business', 'g1.jpg', 'student', 'Senior Arun', '3', 'CSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SBI', 'MTP', '1234567890', 'SBIN0000123', 'Yes', 'Mettupalayam', 'No', '1052'),
('ADM006', '2026-01-22', 'waiting', 'selvaraj', '2007-03-12', 18, 'Tamil', 'Male', 'Hindu', 'BC', 'Vanniyar', '12345678906', 'UMIS006', 'EMIS006', 'SSLC006', '9876543006', 'arun1@mail.com', 'Coimbatore', 'Coimbatore', 'arun.jpg', 'O+', 'Diploma in COMPUTER ENGINEERING', '2025-06-01', '2025-2028', '1st Year', 'yes', 'yes', 'Kumar', '9876500006', 'Coimbatore', 'Farmer', 250000.00, 'f1.jpg', 'Lakshmi', '9876500006', 'Coimbatore', 'Housewife', 0.00, 'm1.jpg', 'Ramesh', 'Uncle', '9876500006', 'Coimbatore', 'Business', 'g1.jpg', 'student', 'Senior Arun', '3', 'CSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SBI', 'MTP', '1234567890', 'SBIN0000123', 'Yes', 'Mettupalayam', 'No', '1052'),
('ADM007', '2026-01-22', 'admitted', 'alex', '2007-03-12', 18, 'Tamil', 'Male', 'Hindu', 'BC', 'Vanniyar', '12345678907', 'UMIS007', 'EMIS007', 'SSLC007', '9876543001', 'arun1@mail.com', 'Coimbatore', 'Coimbatore', 'arun.jpg', 'O+', 'Diploma in COMPUTER ENGINEERING', '2025-06-01', '2025-2028', '1st Year', 'yes', 'yes', 'Kumar', '9876500007', 'Coimbatore', 'Farmer', 250000.00, 'f1.jpg', 'Lakshmi', '9876500007', 'Coimbatore', 'Housewife', 0.00, 'm1.jpg', 'Ramesh', 'Uncle', '9876500007', 'Coimbatore', 'Business', 'g1.jpg', 'student', 'Senior Arun', '3', 'CSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SBI', 'MTP', '1234567890', 'SBIN0000123', 'Yes', 'Mettupalayam', 'No', '1052'),
('ADM008', '2026-01-22', 'admitted', 'yagesh', '2007-03-12', 18, 'Tamil', 'Male', 'Hindu', 'BC', 'Vanniyar', '12345678908', 'UMIS008', 'EMIS008', 'SSLC008', '9876543008', 'arun1@mail.com', 'Coimbatore', 'Coimbatore', 'arun.jpg', 'O+', 'Diploma in COMPUTER ENGINEERING', '2025-06-01', '2025-2028', '1st Year', 'yes', 'yes', 'Kumar', '9876500008', 'Coimbatore', 'Farmer', 250000.00, 'f1.jpg', 'Lakshmi', '9876500008', 'Coimbatore', 'Housewife', 0.00, 'm1.jpg', 'Ramesh', 'Uncle', '9876500008', 'Coimbatore', 'Business', 'g1.jpg', 'student', 'Senior Arun', '3', 'CSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SBI', 'MTP', '1234567890', 'SBIN0000123', 'Yes', 'Mettupalayam', 'No', '1052'),
('ADM009', '2026-01-22', 'admitted', 'kirthin', '2007-03-12', 18, 'Tamil', 'Male', 'Hindu', 'BC', 'Vanniyar', '12345678909', 'UMIS009', 'EMIS009', 'SSLC009', '9876543009', 'arun1@mail.com', 'Coimbatore', 'Coimbatore', 'arun.jpg', 'O+', 'Diploma in COMPUTER ENGINEERING', '2025-06-01', '2025-2028', '1st Year', 'yes', 'yes', 'Kumar', '9876500009', 'Coimbatore', 'Farmer', 250000.00, 'f1.jpg', 'Lakshmi', '9876500009', 'Coimbatore', 'Housewife', 0.00, 'm1.jpg', 'Ramesh', 'Uncle', '9876500009', 'Coimbatore', 'Business', 'g1.jpg', 'student', 'Senior Arun', '3', 'CSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SBI', 'MTP', '1234567899', 'SBIN0000123', 'Yes', 'Mettupalayam', 'No', '1052'),
('ADM010', '2026-01-22', 'admitted', 'madhuvanth', '2007-03-12', 18, 'Tamil', 'Male', 'Hindu', 'BC', 'Vanniyar', '12345678910', 'UMIS010', 'EMIS010', 'SSLC010', '9876543010', 'arun1@mail.com', 'Coimbatore', 'Coimbatore', 'arun.jpg', 'O+', 'Diploma in COMPUTER ENGINEERING', '2025-06-01', '2025-2028', '1st Year', 'yes', 'yes', 'Kumar', '9876500010', 'Coimbatore', 'Farmer', 250000.00, 'f1.jpg', 'Lakshmi', '9876500010', 'Coimbatore', 'Housewife', 0.00, 'm1.jpg', 'Ramesh', 'Uncle', '9876500010', 'Coimbatore', 'Business', 'g1.jpg', 'student', 'Senior Arun', '3', 'CSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SBI', 'MTP', '1234567810', 'SBIN0000123', 'Yes', 'Mettupalayam', 'No', '1052'),
('ADM20260122152206', '2026-01-22', 'admitted', 'Ranjith N', '2006-11-07', 19, 'Tamil', 'Male', 'Hindu', 'BC', 'gufgjk', '2644646546', '2564654564', '3134545454', '24502731', '06374013834', 'ranjithpvt2137@gmail.com', 'Navalar Street', NULL, NULL, 'A+', 'Diploma in COMPUTER ENGINEERING', '2026-01-22', '2025', '1st Year', 'no', 'no', 'jbdjbd', '6374013834', NULL, 'jskjdf', 0.00, NULL, 'ndgkjs', '6374013834', NULL, 'jabsefj', 0.00, NULL, 'hrgk', NULL, '06374013834', 'jbaefkj', 'jbaskjeb', NULL, 'student', 'ranjith', '3rd year', 'computer', '', '0000', '', '', '', '', '', '', 'jkdhksjdhnkjdvh', 'nhkb', '215214512154', 'nksejgk54', 'No', 'no', 'No', NULL),
('ADM20260123074937', '2026-01-23', 'cancelled', 'Monish prasad', '2006-11-07', 19, 'Tamil', 'Male', 'Hindu ', 'Others', 'example', '485888767696', '1234567890', '123456789', '24502745', '9578239074', 'ranjithpvt2137@gmail.com', 'Navalar Street', NULL, NULL, 'A+', 'Diploma in ELECTRONICS AND COMMUNICATION ENGINEERI', '2026-01-23', '3 Years', '1st Year', 'no', 'no', 'Sample', '1234567890', NULL, 'sample', 20.00, NULL, 'sample1', '1234567890', NULL, 'sample data ', 1000.00, NULL, 'sample2', NULL, '9578239074', 'Navalar Street', 'samplee', NULL, 'student', '', '', '', '', '0000', '', '', '', '', '', '', 'State Bank Of India', 'nhkb', '215214512154', 'nksejgk54', 'No', '', 'No', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admission_documents`
--

CREATE TABLE `admission_documents` (
  `admission_no` varchar(50) NOT NULL,
  `sslc_marksheet` varchar(255) DEFAULT NULL,
  `hsc_marksheet` varchar(255) DEFAULT NULL,
  `transfer_certificate` varchar(255) DEFAULT NULL,
  `community_certificate` varchar(255) DEFAULT NULL,
  `aadhar_document` varchar(255) DEFAULT NULL,
  `income_certificate` varchar(255) DEFAULT NULL,
  `bank_passbook` varchar(255) DEFAULT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission_documents`
--

INSERT INTO `admission_documents` (`admission_no`, `sslc_marksheet`, `hsc_marksheet`, `transfer_certificate`, `community_certificate`, `aadhar_document`, `income_certificate`, `bank_passbook`, `uploaded_at`) VALUES
('ADM20260122152206', '../../uploads/1769091726_MONISH RESUME.pdf', NULL, '../../uploads/1769091726_exno_6.pdf', '../../uploads/1769091726_MONISH RESUME.pdf', '../../uploads/1769091726_exno_6.pdf', '../../uploads/1769091726_exno_6.pdf', '../../uploads/1769091726_exno_6.pdf', '2026-01-22 14:22:06'),
('ADM20260123074937', '../../uploads/1769150977_system flow.png', NULL, '', '', '', '', '', '2026-01-23 06:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `admission_qualifications`
--

CREATE TABLE `admission_qualifications` (
  `admission_no` varchar(50) NOT NULL,
  `qualification` enum('SSLC','HSC','ITI') NOT NULL,
  `group_name` varchar(50) DEFAULT NULL,
  `school_class` varchar(20) DEFAULT NULL,
  `year_of_passing` year(4) DEFAULT NULL,
  `passed_month_year` date DEFAULT NULL,
  `school_name` varchar(150) DEFAULT NULL,
  `school_place` varchar(100) DEFAULT NULL,
  `medium_of_instruction` varchar(30) DEFAULT NULL,
  `board_of_study` varchar(50) DEFAULT NULL,
  `part1_language` enum('Tamil','Hindi','Malayalam') DEFAULT NULL,
  `subject_name` varchar(100) NOT NULL,
  `max_marks` int(11) DEFAULT 100,
  `marks_secured` int(11) NOT NULL,
  `total_max_marks` int(11) DEFAULT NULL,
  `total_obtained_marks` int(11) DEFAULT NULL,
  `percentage` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission_qualifications`
--

INSERT INTO `admission_qualifications` (`admission_no`, `qualification`, `group_name`, `school_class`, `year_of_passing`, `passed_month_year`, `school_name`, `school_place`, `medium_of_instruction`, `board_of_study`, `part1_language`, `subject_name`, `max_marks`, `marks_secured`, `total_max_marks`, `total_obtained_marks`, `percentage`) VALUES
('ADM20260122152206', 'SSLC', '', '0', '2000', '0000-00-00', 'h', 'i', 'n', 'u', '', 'English', 100, 50, NULL, NULL, 50.00),
('ADM20260122152206', 'SSLC', '', '', '2002', '0000-00-00', 'g', 'r', 'g', 'm', '', 'Maths', 100, 50, NULL, NULL, 50.00),
('ADM20260122152206', 'SSLC', '', '', '2005', '0000-00-00', 'f', 'u', 'l', 'a', '', 'Science', 100, 50, NULL, NULL, 50.00),
('ADM20260122152206', 'SSLC', '', '', '0000', '0000-00-00', 'g', 'm', 'i', '', '', 'Social', 100, 50, NULL, NULL, 50.00),
('ADM20260122152206', 'SSLC', '', '1', '2002', '0000-00-00', 'f', 's', 'E', 's', '', 'Tamil', 100, 50, NULL, NULL, 50.00),
('ADM20260123074937', 'SSLC', '', '0', '2000', '0000-00-00', 'a', 'i', 'n', 'a', '', 'English', 100, 50, NULL, NULL, 50.00),
('ADM20260123074937', 'SSLC', '', '', '2002', '0000-00-00', 'm', 'r', 'g', 'm', '', 'Maths', 100, 50, NULL, NULL, 50.00),
('ADM20260123074937', 'SSLC', '', '', '2004', '0000-00-00', 'p', 'u', 'l', 'p', '', 'Science', 100, 50, NULL, NULL, 50.00),
('ADM20260123074937', 'SSLC', '', '', '0000', '0000-00-00', 'l', 'm', 'i', 'l', '', 'Social', 100, 100, NULL, NULL, 100.00),
('ADM20260123074937', 'SSLC', '', '1', '2002', '0000-00-00', 's', 's', 'E', 's', '', 'Tamil', 100, 50, NULL, NULL, 50.00);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_code` varchar(20) NOT NULL,
  `course_name` varchar(60) NOT NULL,
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
('1010', 'Diploma in CIVIL ENGINEERING', 30, 3, 6, 2004, 'active'),
('1020', 'Diploma in MECHANICAL ENGINEERING', 60, 3, 6, 2004, 'active'),
('1021', 'Diploma in AUTOMOBILE ENGINEERING ', 60, 3, 6, 2002, 'active'),
('1030', 'Diploma in ELECTRICAL AND ELECTRONICS ENGINEERING', 60, 3, 6, 2003, 'active'),
('1040', 'Diploma in ELECTRONICS AND COMMUNICATION ENGINEERING', 60, 3, 6, 2003, 'active'),
('1052', 'Diploma in COMPUTER ENGINEERING', 60, 3, 6, 2005, 'active'),
('1056', 'Diploma in Artificial Intelligence and Machine Learning', 60, 3, 6, 2023, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `dote_course_intake`
--

CREATE TABLE `dote_course_intake` (
  `academic_year` varchar(9) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `total_intake` int(11) NOT NULL,
  `govt_quota_seats` int(11) NOT NULL,
  `mgmt_quota_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dote_govt_quota_distribution`
--

CREATE TABLE `dote_govt_quota_distribution` (
  `academic_year` varchar(9) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `quota_code` varchar(10) NOT NULL,
  `total_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dote_quota_master`
--

CREATE TABLE `dote_quota_master` (
  `quota_code` varchar(10) NOT NULL,
  `quota_name` varchar(50) NOT NULL,
  `percentage` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dote_quota_master`
--

INSERT INTO `dote_quota_master` (`quota_code`, `quota_name`, `percentage`) VALUES
('BC', 'Backward Class', 26.50),
('BCM', 'Backward Class Muslim', 3.50),
('MBC', 'MBC / DNC', 20.00),
('OC', 'Open Competition', 31.00),
('SC', 'Scheduled Caste', 15.00),
('SCA', 'Scheduled Caste Arunthathiyar', 3.00),
('ST', 'Scheduled Tribe', 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `dote_reports_log`
--

CREATE TABLE `dote_reports_log` (
  `report_id` int(11) NOT NULL,
  `academic_year` varchar(9) DEFAULT NULL,
  `course_code` varchar(20) DEFAULT NULL,
  `report_type` enum('FORM-A','FORM-B','FORM-C','FORM-D','FORM-F1','FORM-F2') DEFAULT NULL,
  `generated_by` varchar(50) DEFAULT NULL,
  `generated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dote_student_allocation`
--

CREATE TABLE `dote_student_allocation` (
  `allocation_id` int(11) NOT NULL,
  `academic_year` varchar(9) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `admission_no` varchar(50) NOT NULL,
  `quota_code` varchar(10) NOT NULL,
  `allotment_date` date DEFAULT curdate()
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

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `first_name`, `last_name`, `email`, `phone`, `course_code`, `designation`, `qualification`, `specialization`, `date_of_joining`, `pan_id`, `aadhar_id`, `relieving_date`, `resume_pdf`, `sslc_hsc_certificate`, `higher_degree_proof`, `profile_photo`, `status`, `last_login`, `created_at`, `updated_at`) VALUES
('F001', 'Ravi', 'Kumar', 'ravi@nlptc.edu', '9876543210', '1052', 'Lecturer', 'M.E', 'Computer', '2018-06-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2026-01-04 15:15:41', '2026-01-22 15:29:38'),
('F002', 'Suresh', 'Babu', 'suresh@nlptc.edu', '9876543211', '1010', 'Lecturer', 'M.E', 'Mechanical', '2017-06-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2026-01-04 15:15:41', '2026-01-08 10:20:02'),
('F003', 'Anitha', 'R', 'anitha@nlptc.edu', '9876543212', '1030', 'Lecturer', 'M.E', 'EEE', '2019-06-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2026-01-04 15:15:41', '2026-01-08 10:58:52'),
('F004', 'Priya', 'S', 'priya@nlptc.edu', '9876543213', '1040', 'Lecturer', 'M.Tech', 'ECE', '2020-06-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2026-01-04 15:15:41', '2026-01-08 10:58:52'),
('F005', 'Mohan', 'K', 'mohan@nlptc.edu', '9876543214', '1021', 'Lecturer', 'M.E', 'Civil', '2016-06-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, '2026-01-04 15:15:41', '2026-01-08 10:58:52'),
('F006', 'kavipriya ', 'R', 'sample@gmail.com', '06374013834', '1052', 'Lecturer', 'M.E', 'Computer', '2025-11-07', NULL, NULL, NULL, '../../uploads/faculty/1769123539_resume Mp.pdf', '../../uploads/faculty/1769123539_harish resume.pdf', '../../uploads/faculty/1769123539_clg logo.png', '../../uploads/faculty/1769123539_Screenshot 2026-01-22 203427.png', 'active', NULL, '2026-01-22 23:12:19', '2026-01-26 07:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` varchar(20) NOT NULL,
  `student_name` varchar(30) NOT NULL,
  `admission_no` varchar(50) NOT NULL,
  `register_no` varchar(15) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `batch_year` varchar(9) NOT NULL,
  `date_of_joining` date NOT NULL,
  `current_year` int(11) DEFAULT 1,
  `current_semester` int(11) DEFAULT 1,
  `status` enum('active','inactive','completed') DEFAULT 'active',
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `admission_no`, `register_no`, `course_code`, `batch_year`, `date_of_joining`, `current_year`, `current_semester`, `status`, `last_login`, `created_at`, `updated_at`) VALUES
('STD001', 'Arun Kumar', 'ADM001', '105224502731', '1052', '2025-2028', '2025-06-01', 1, 1, 'active', NULL, '2026-01-22 23:40:40', '2026-01-22 23:40:40'),
('STD002', 'Ranjith', 'ADM002', '105224502732', '1052', '2025-2028', '2025-06-01', 1, 1, 'active', NULL, '2026-01-22 23:40:40', '2026-01-22 23:40:40'),
('STD003', 'Radha', 'ADM003', '105224502733', '1052', '2025-2028', '2025-06-01', 1, 1, 'active', NULL, '2026-01-22 23:40:40', '2026-01-22 23:40:40'),
('STD004', 'Harsith', 'ADM004', '105224502734', '1052', '2025-2028', '2025-06-01', 1, 1, 'active', NULL, '2026-01-22 23:40:40', '2026-01-22 23:40:40'),
('STD005', 'Monish Prasad', 'ADM005', '105224502735', '1052', '2025-2028', '2025-06-01', 1, 1, 'active', NULL, '2026-01-22 23:40:40', '2026-01-22 23:40:40'),
('STD006', 'Selvaraj', 'ADM006', '105224502736', '1052', '2025-2028', '2025-06-01', 1, 1, 'active', NULL, '2026-01-22 23:40:40', '2026-01-22 23:40:40'),
('STD007', 'Yagesh', 'ADM008', '105224502737', '1052', '2025-2028', '2025-06-01', 1, 1, 'active', NULL, '2026-01-22 23:40:40', '2026-01-22 23:40:40'),
('STD008', 'Kirthin', 'ADM009', '105224502738', '1052', '2025-2028', '2025-06-01', 1, 1, 'active', NULL, '2026-01-22 23:40:40', '2026-01-22 23:40:40'),
('STD009', 'Madhuvanth', 'ADM010', '105224502739', '1052', '2025-2028', '2025-06-01', 1, 1, 'active', NULL, '2026-01-22 23:40:40', '2026-01-22 23:40:40'),
('STD010', 'Ranjith N', 'ADM20260122152206', '105224502740', '1052', '2025-2028', '2026-01-22', 3, 5, 'active', NULL, '2026-01-22 23:40:40', '2026-01-22 23:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('admin','faculty','student') NOT NULL,
  `is_active` enum('yes','no') DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `role`, `is_active`, `created_at`, `last_login`) VALUES
('admin', 'admin123', 'admin', 'yes', '2026-01-07 14:51:13', NULL);

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
  ADD UNIQUE KEY `emis_no` (`emis_no`),
  ADD KEY `fk_adm_course` (`course_code`);

--
-- Indexes for table `admission_documents`
--
ALTER TABLE `admission_documents`
  ADD PRIMARY KEY (`admission_no`);

--
-- Indexes for table `admission_qualifications`
--
ALTER TABLE `admission_qualifications`
  ADD PRIMARY KEY (`admission_no`,`subject_name`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `dote_course_intake`
--
ALTER TABLE `dote_course_intake`
  ADD PRIMARY KEY (`academic_year`,`course_code`),
  ADD KEY `course_code` (`course_code`);

--
-- Indexes for table `dote_govt_quota_distribution`
--
ALTER TABLE `dote_govt_quota_distribution`
  ADD PRIMARY KEY (`academic_year`,`course_code`,`quota_code`),
  ADD KEY `course_code` (`course_code`),
  ADD KEY `quota_code` (`quota_code`);

--
-- Indexes for table `dote_quota_master`
--
ALTER TABLE `dote_quota_master`
  ADD PRIMARY KEY (`quota_code`);

--
-- Indexes for table `dote_reports_log`
--
ALTER TABLE `dote_reports_log`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `dote_student_allocation`
--
ALTER TABLE `dote_student_allocation`
  ADD PRIMARY KEY (`allocation_id`),
  ADD KEY `course_code` (`course_code`),
  ADD KEY `quota_code` (`quota_code`),
  ADD KEY `admission_no` (`admission_no`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `pan_id` (`pan_id`),
  ADD UNIQUE KEY `aadhar_id` (`aadhar_id`),
  ADD KEY `fk_faculty_course` (`course_code`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `register_no` (`register_no`),
  ADD KEY `fk_student_admission` (`admission_no`),
  ADD KEY `fk_student_course` (`course_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dote_reports_log`
--
ALTER TABLE `dote_reports_log`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dote_student_allocation`
--
ALTER TABLE `dote_student_allocation`
  MODIFY `allocation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admission_applications`
--
ALTER TABLE `admission_applications`
  ADD CONSTRAINT `fk_adm_course` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`);

--
-- Constraints for table `admission_documents`
--
ALTER TABLE `admission_documents`
  ADD CONSTRAINT `fk_admission_docs` FOREIGN KEY (`admission_no`) REFERENCES `admission_applications` (`admission_no`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_doc_adm` FOREIGN KEY (`admission_no`) REFERENCES `admission_applications` (`admission_no`);

--
-- Constraints for table `admission_qualifications`
--
ALTER TABLE `admission_qualifications`
  ADD CONSTRAINT `admission_qualifications_ibfk_1` FOREIGN KEY (`admission_no`) REFERENCES `admission_applications` (`admission_no`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_qual_adm` FOREIGN KEY (`admission_no`) REFERENCES `admission_applications` (`admission_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dote_course_intake`
--
ALTER TABLE `dote_course_intake`
  ADD CONSTRAINT `dote_course_intake_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`);

--
-- Constraints for table `dote_govt_quota_distribution`
--
ALTER TABLE `dote_govt_quota_distribution`
  ADD CONSTRAINT `dote_govt_quota_distribution_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`),
  ADD CONSTRAINT `dote_govt_quota_distribution_ibfk_2` FOREIGN KEY (`quota_code`) REFERENCES `dote_quota_master` (`quota_code`);

--
-- Constraints for table `dote_student_allocation`
--
ALTER TABLE `dote_student_allocation`
  ADD CONSTRAINT `dote_student_allocation_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`),
  ADD CONSTRAINT `dote_student_allocation_ibfk_2` FOREIGN KEY (`quota_code`) REFERENCES `dote_quota_master` (`quota_code`),
  ADD CONSTRAINT `dote_student_allocation_ibfk_3` FOREIGN KEY (`admission_no`) REFERENCES `admission_applications` (`admission_no`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`),
  ADD CONSTRAINT `fk_faculty_course` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_student_admission` FOREIGN KEY (`admission_no`) REFERENCES `admission_applications` (`admission_no`),
  ADD CONSTRAINT `fk_student_course` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
