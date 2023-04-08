-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 08, 2023 at 09:00 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `office_inleads`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE IF NOT EXISTS `admin_user` (
  `u_id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(33) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(33) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(33) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`u_id`, `user_id`, `full_name`, `username`, `password`, `user_type`, `status`, `created_date`, `updated_date`) VALUES
(1, '1936242599', 'Arfi Rahman', 'admin', 'admin', 'super_admin', 'ENABLE', '2023-03-06 06:22:08', '2023-03-06 06:22:08');

-- --------------------------------------------------------

--
-- Table structure for table `department_list`
--

DROP TABLE IF EXISTS `department_list`;
CREATE TABLE IF NOT EXISTS `department_list` (
  `dp_id` int NOT NULL AUTO_INCREMENT,
  `dept_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`dp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_list`
--

INSERT INTO `department_list` (`dp_id`, `dept_id`, `dept_name`, `status`, `created_at`, `updated_at`) VALUES
(1, '532', 'It Section', 'ACTIVE', '2023-03-16', '2023-03-23'),
(2, '342', 'Career Development Zone', 'ACTIVE', '2023-03-16', '2023-03-16'),
(5, '940', 'Management', 'ACTIVE', '2023-03-23', '2023-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `designation_list`
--

DROP TABLE IF EXISTS `designation_list`;
CREATE TABLE IF NOT EXISTS `designation_list` (
  `dg_id` int NOT NULL AUTO_INCREMENT,
  `dsgn_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dsgn_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`dg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designation_list`
--

INSERT INTO `designation_list` (`dg_id`, `dsgn_id`, `dsgn_name`, `status`, `created_at`, `updated_at`) VALUES
(1, '740', 'Software Engineer', 'ACTIVE', '2023-03-16', '2023-03-23'),
(4, '526', 'UI/UX Engineer', 'ACTIVE', '2023-03-20', '2023-03-23'),
(5, '537', 'Frontend Developer', 'ACTIVE', '2023-04-01', '2023-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

DROP TABLE IF EXISTS `employee_info`;
CREATE TABLE IF NOT EXISTS `employee_info` (
  `emp_id` int NOT NULL AUTO_INCREMENT,
  `emp_user_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dsgn_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `idcard_id` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_joining` date NOT NULL,
  `appointed_date` date NOT NULL,
  `dept_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `empl_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthly_salary` decimal(10,2) NOT NULL,
  `bank_account_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_info`
--

INSERT INTO `employee_info` (`emp_id`, `emp_user_id`, `employee_name`, `dsgn_id`, `idcard_id`, `employee_id`, `division`, `date_of_joining`, `appointed_date`, `dept_id`, `location`, `empl_id`, `monthly_salary`, `bank_account_no`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '86816833', 'Tanvir Ahmed', '740', '574', '005', 'Rajshahiii', '2023-01-09', '2023-04-07', '532', 'Bogura', '204', '10000.00', '14523698523', '7TNlhQjoe9.jpg', 'WORKING', '2023-04-04', '2023-04-07'),
(3, '98672514', 'Muntasir Ahmed', '740', '574', '006', 'Dhaka', '2023-04-08', '2023-04-08', '532', 'Bogura', '204', '35000.00', '55883698523', 'e9dshNfzXK.jpg', 'WORKING', '2023-04-04', '2023-04-04'),
(4, '88401852', 'Nazmul Haque', '526', '240', '006', 'Rajshahi', '2023-03-31', '2023-03-31', '532', 'Nilfamari', '626', '35000.00', '6931698523', 'Vw20mDjaeW.jpg', 'WORKING', '2023-04-04', '2023-04-04'),
(5, '89260817', 'Md. Shofiul Alam', '537', '574', '004', 'IT', '2021-09-21', '2021-09-21', '532', 'Bogura, Bangladesh', '204', '30000.00', '1539698523', 'YMw2I3Lx5m.jpg', 'WORKING', '2023-04-04', '2023-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary`
--

DROP TABLE IF EXISTS `employee_salary`;
CREATE TABLE IF NOT EXISTS `employee_salary` (
  `slry_id` int NOT NULL AUTO_INCREMENT,
  `emp_salary_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_user_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_amount` decimal(10,2) NOT NULL,
  `salary_paid` decimal(10,2) NOT NULL,
  `salary_status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_pay_date` date NOT NULL,
  `slry_type_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`slry_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salary`
--

INSERT INTO `employee_salary` (`slry_id`, `emp_salary_id`, `emp_user_id`, `month_no`, `year`, `salary_amount`, `salary_paid`, `salary_status`, `last_pay_date`, `slry_type_id`, `created_at`, `updated_at`) VALUES
(24, '958815', '89260817', '1', '2023', '30000.00', '30000.00', 'Full Paid', '2023-04-08', '225', '2023-04-08 02:04:44', '2023-04-08 02:04:44'),
(23, '783652', '88401852', '1', '2023', '35000.00', '35000.00', 'Full Paid', '2023-04-08', '225', '2023-04-08 02:04:20', '2023-04-08 02:04:28'),
(22, '409068', '98672514', '2', '2023', '35000.00', '35000.00', 'Full Paid', '2023-04-08', '225', '2023-04-08 02:04:54', '2023-04-08 02:04:01'),
(21, '825333', '86816833', '2', '2023', '10000.00', '10000.00', 'Full Paid', '2023-04-08', '225', '2023-04-08 02:04:41', '2023-04-08 02:04:41'),
(20, '321320', '88401852', '4', '2023', '35000.00', '35000.00', 'Full Paid', '2023-04-08', '225', '2023-04-08 02:04:28', '2023-04-08 02:04:28'),
(19, '947148', '89260817', '4', '2023', '30000.00', '30000.00', 'Full Paid', '2023-04-08', '327', '2023-04-08 02:04:02', '2023-04-08 02:04:11'),
(18, '667633', '98672514', '4', '2023', '35000.00', '35000.00', 'Full Paid', '2023-04-08', '225', '2023-04-08 02:04:53', '2023-04-08 02:04:53'),
(17, '686310', '86816833', '4', '2023', '10000.00', '10000.00', 'Full Paid', '2023-04-08', '225', '2023-04-08 02:04:27', '2023-04-08 02:04:39'),
(25, '939999', '86816833', '1', '2023', '10000.00', '6000.00', 'Partial Paid', '2023-04-08', '225', '2023-04-08 02:04:47', '2023-04-08 02:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_history`
--

DROP TABLE IF EXISTS `employee_salary_history`;
CREATE TABLE IF NOT EXISTS `employee_salary_history` (
  `slhis_id` int NOT NULL AUTO_INCREMENT,
  `emp_slry_his_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_salary_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_amount` decimal(10,2) NOT NULL,
  `salary_paid` decimal(10,2) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `slry_type_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_date` date NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`slhis_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salary_history`
--

INSERT INTO `employee_salary_history` (`slhis_id`, `emp_slry_his_id`, `emp_salary_id`, `salary_amount`, `salary_paid`, `paid_amount`, `slry_type_id`, `pay_date`, `created_at`) VALUES
(28, '425135', '783652', '35000.00', '20000.00', '15000.00', '225', '2023-04-08', '2023-04-08'),
(27, '693559', '783652', '35000.00', '0.00', '20000.00', '225', '2023-04-08', '2023-04-08'),
(26, '591936', '409068', '35000.00', '15000.00', '20000.00', '225', '2023-04-08', '2023-04-08'),
(25, '208819', '409068', '35000.00', '0.00', '15000.00', '225', '2023-04-08', '2023-04-08'),
(24, '241332', '825333', '10000.00', '0.00', '10000.00', '225', '2023-04-08', '2023-04-08'),
(23, '440711', '321320', '35000.00', '0.00', '35000.00', '225', '2023-04-08', '2023-04-08'),
(22, '906795', '947148', '30000.00', '15000.00', '15000.00', '327', '2023-04-08', '2023-04-08'),
(21, '733841', '947148', '30000.00', '0.00', '15000.00', '327', '2023-04-08', '2023-04-08'),
(20, '870468', '667633', '35000.00', '0.00', '35000.00', '225', '2023-04-08', '2023-04-08'),
(19, '609334', '686310', '10000.00', '5000.00', '5000.00', '225', '2023-04-08', '2023-04-08'),
(18, '733229', '686310', '10000.00', '0.00', '5000.00', '225', '2023-04-08', '2023-04-08'),
(29, '394462', '958815', '30000.00', '0.00', '30000.00', '225', '2023-04-08', '2023-04-08'),
(30, '805068', '939999', '10000.00', '0.00', '6000.00', '225', '2023-04-08', '2023-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `employment_type_list`
--

DROP TABLE IF EXISTS `employment_type_list`;
CREATE TABLE IF NOT EXISTS `employment_type_list` (
  `em_id` int NOT NULL AUTO_INCREMENT,
  `empl_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empl_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`em_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employment_type_list`
--

INSERT INTO `employment_type_list` (`em_id`, `empl_id`, `empl_name`, `status`, `created_at`, `updated_at`) VALUES
(1, '204', 'Full-Time', 'ACTIVE', '2023-03-16', '2023-04-05'),
(4, '626', 'Part-Time', 'ACTIVE', '2023-03-20', '2023-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `emp_academic_qualification`
--

DROP TABLE IF EXISTS `emp_academic_qualification`;
CREATE TABLE IF NOT EXISTS `emp_academic_qualification` (
  `emp_acad_id` int NOT NULL AUTO_INCREMENT,
  `emp_user_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completion` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`emp_acad_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_academic_qualification`
--

INSERT INTO `emp_academic_qualification` (`emp_acad_id`, `emp_user_id`, `degree`, `institution`, `subject`, `result`, `completion`) VALUES
(1, '86816833', 'BSc', 'TEC', 'CSE', '3.23', '2020'),
(3, '98672514', 'BSc', 'North South University', 'CSE', '3.50', '2023'),
(4, '98672514', 'HSC', 'Police Lines School and College', 'Science', '4.33', '2017'),
(5, '88401852', 'Hon', 'Azizul Haque', 'Biology', '3.50', '2017'),
(6, '88401852', 'HSC', 'Shah Sultan', 'Science', '5.00', '2013'),
(7, '86816833', 'HSC', 'Shahsultan College', 'Science', '5.00', '2015'),
(8, '89260817', 'LL.M.', 'University of Dhaka', 'Law', '2.79', '2012'),
(9, '89260817', 'LL.B.(Hons.)', 'University of Dhaka', 'Law', 'Second Class', '2011'),
(10, '89260817', 'HSC', 'Shahid Zia College, Bagbari', 'Science', '4.30', '2005'),
(11, '89260817', 'SSC', 'Kolakopa Atopjan Memorial High School', 'Science', '3.75', '2002');

-- --------------------------------------------------------

--
-- Table structure for table `emp_children_details`
--

DROP TABLE IF EXISTS `emp_children_details`;
CREATE TABLE IF NOT EXISTS `emp_children_details` (
  `emp_child_id` int NOT NULL AUTO_INCREMENT,
  `emp_user_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`emp_child_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_children_details`
--

INSERT INTO `emp_children_details` (`emp_child_id`, `emp_user_id`, `name`, `gender`, `dob`) VALUES
(1, '86816833', 'Demo Child 2', 'Male', '2024-01-31'),
(3, '88401852', 'Demo 1', 'Male', '2023-03-25'),
(4, '88401852', 'Demo 2', 'Female', '2023-03-31'),
(6, '89260817', 'Usama Abdullah Tausif', 'Male', '2016-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `emp_emergency_contact`
--

DROP TABLE IF EXISTS `emp_emergency_contact`;
CREATE TABLE IF NOT EXISTS `emp_emergency_contact` (
  `emp_emerg_id` int NOT NULL AUTO_INCREMENT,
  `emp_user_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`emp_emerg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_emergency_contact`
--

INSERT INTO `emp_emergency_contact` (`emp_emerg_id`, `emp_user_id`, `name`, `relation`, `mobile`, `address`) VALUES
(1, '86816833', 'Nazmul Haque', 'Cousin', '01789631118', 'Bogura'),
(3, '98672514', 'Tanvir Ahmed', 'Brother', '01738378899', 'Bogura'),
(4, '88401852', 'Tanvir Ahmed', 'Cousin', '01738378899', 'Pabna, Bogura'),
(5, '88401852', 'Abdul Hamid', 'Uncle', '01738374569', 'Nijgram'),
(6, '86816833', 'Anisur Rahman', 'Father', '01726526866', 'Dulai, Pabna'),
(7, '89260817', 'Md. Abdur Rahman Pramanik', 'Father', '123456789', 'Village: Tollatola, Post Office: Kolakopa, Upazilla: Gabtoli, District: Bogura');

-- --------------------------------------------------------

--
-- Table structure for table `emp_employment_history`
--

DROP TABLE IF EXISTS `emp_employment_history`;
CREATE TABLE IF NOT EXISTS `emp_employment_history` (
  `emp_his_id` int NOT NULL AUTO_INCREMENT,
  `emp_user_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`emp_his_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_employment_history`
--

INSERT INTO `emp_employment_history` (`emp_his_id`, `emp_user_id`, `organization`, `designation`, `start_date`, `end_date`) VALUES
(1, '86816833', 'Fiverr', 'Freelancing Market', '2023-03-31', '2023-04-05'),
(2, '88401852', 'Alpha', 'Designer', '2023-03-20', '2023-03-31'),
(3, '86816833', 'Upwork', 'Software Engineer', '2021-01-22', '2023-03-31'),
(7, '86816833', 'Inleads IT Solution Ltd.', 'Frontend Developer', '2023-04-04', '2023-04-04'),
(5, '86816833', 'Inleads IT Solution Ltd.', 'UI/UX Engineer', '2023-03-31', '2023-04-30'),
(8, '86816833', 'Inleads IT Solution Ltd.', 'Software Engineer', '2023-04-04', '2023-04-07'),
(9, '86816833', 'Inleads IT Solution Ltd.', 'Frontend Developer', '2023-04-07', '2023-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave_application`
--

DROP TABLE IF EXISTS `emp_leave_application`;
CREATE TABLE IF NOT EXISTS `emp_leave_application` (
  `la_id` int NOT NULL AUTO_INCREMENT,
  `leave_appl_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_user_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_type` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_date_from` date NOT NULL,
  `leave_date_to` date NOT NULL,
  `leave_total_days` int NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`la_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_leave_application`
--

INSERT INTO `emp_leave_application` (`la_id`, `leave_appl_id`, `emp_user_id`, `leave_type`, `leave_date_from`, `leave_date_to`, `leave_total_days`, `created_at`, `updated_at`) VALUES
(1, '359831', '86816833', 'casual_leave', '2023-04-01', '2023-04-04', 4, '2023-03-31', '2023-03-31'),
(2, '957308', '86816833', 'sick_leave', '2023-04-04', '2023-04-10', 7, '2023-03-31', '2023-03-31'),
(3, '276351', '86816833', 'sick_leave', '2023-04-03', '2023-04-07', 5, '2023-04-03', '2023-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `emp_paid_leave_details`
--

DROP TABLE IF EXISTS `emp_paid_leave_details`;
CREATE TABLE IF NOT EXISTS `emp_paid_leave_details` (
  `pl_id` int NOT NULL AUTO_INCREMENT,
  `paid_leave_id` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_user_id` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_year` year NOT NULL,
  `casual_leave` int NOT NULL,
  `casual_consumed` int NOT NULL,
  `sick_leave` int NOT NULL,
  `sick_consumed` int NOT NULL,
  `maternal_leave` int NOT NULL,
  `maternal_consumed` int NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`pl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_paid_leave_details`
--

INSERT INTO `emp_paid_leave_details` (`pl_id`, `paid_leave_id`, `emp_user_id`, `leave_year`, `casual_leave`, `casual_consumed`, `sick_leave`, `sick_consumed`, `maternal_leave`, `maternal_consumed`, `created_at`, `updated_at`) VALUES
(1, '255927', '86816833', 2023, 10, 4, 14, 12, 100, 0, '2023-03-29', '2023-04-03'),
(2, '530193', '98672514', 2023, 10, 0, 14, 0, 150, 0, '2023-03-29', '2023-03-29'),
(3, '845022', '98672514', 2022, 10, 0, 14, 0, 100, 0, '2023-03-29', '2023-03-29'),
(4, '179712', '88401852', 2023, 10, 0, 14, 0, 100, 0, '2023-03-29', '2023-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `emp_personal_info`
--

DROP TABLE IF EXISTS `emp_personal_info`;
CREATE TABLE IF NOT EXISTS `emp_personal_info` (
  `emp_per_id` int NOT NULL AUTO_INCREMENT,
  `emp_user_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_no` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tin_no` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_no` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marriage_date` date NOT NULL,
  `spouse_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra_curricular` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`emp_per_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_personal_info`
--

INSERT INTO `emp_personal_info` (`emp_per_id`, `emp_user_id`, `father_name`, `mother_name`, `date_of_birth`, `place_of_birth`, `gender`, `religion`, `nationality`, `blood_group`, `passport_no`, `tin_no`, `nid_no`, `mobile`, `email`, `marital_status`, `marriage_date`, `spouse_name`, `present_address`, `permanent_address`, `extra_curricular`) VALUES
(1, '86816833', 'Anisur Rahman', 'Johra Begum', '1997-08-08', 'Bogura', 'Male', 'Islam', 'Bangladeshi', 'B+', 'BR0723221', '1522225555', '77786809090', '01738378899', 'tanvirahmed1418@gmail.com', 'Married', '2023-12-31', 'Afsana Mim', 'Bogura', 'Bogura', 'Chess Playing'),
(3, '98672514', 'Anisur Rahman', 'Johra Begum', '2001-12-02', 'Bogura', 'Male', 'Islam', 'Bangladeshi', 'B+', '', '', '18239459222', '01622795566', 'muntasir.devguide@gmail.com', 'Unmarried', '0000-00-00', '', 'Bogura', 'Bogura', 'Gaming, Travelling'),
(4, '88401852', 'Samsul Islam', 'Nazmul Mother', '1992-01-01', 'Bogura', 'Male', 'Islam', 'Bangladeshi', 'B+', 'BR582222', '', '100005222', '01712555666', 'nazmul@gmail.com', 'Unmarried', '0000-00-00', '', 'Bogura', 'Bogura', 'Playing Cricket'),
(5, '89260817', 'Md. Abdur Rahman Pramanik', 'Dolena Begom', '1987-10-25', 'Bogura, Bangladesh', 'Male', 'Islam', 'Bangladeshi', 'B+', '12345678', '', '12345678', '01723553962', 'tuhin.netmow@gmail.com', 'Married', '0000-00-00', '', 'Rahmannagar, Bogura, Bangladesh', 'Village: Tollatola, Post Office: Kolakopa, Upazilla: Gabtoli, District: Bogura', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_prof_certification`
--

DROP TABLE IF EXISTS `emp_prof_certification`;
CREATE TABLE IF NOT EXISTS `emp_prof_certification` (
  `emp_cerf_id` int NOT NULL AUTO_INCREMENT,
  `emp_user_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `completion` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`emp_cerf_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_prof_certification`
--

INSERT INTO `emp_prof_certification` (`emp_cerf_id`, `emp_user_id`, `certificate`, `institution`, `start_date`, `end_date`, `completion`) VALUES
(1, '86816833', 'Web Developer', 'Inleads It and Solutions Limited', '2023-03-31', '2023-08-31', '2022'),
(2, '88401852', 'Demo Certificate', 'Demo Certificate Institution', '2023-03-25', '2023-04-20', '2018'),
(3, '88401852', 'Demo Certificate 2', 'Demo Certificate Institution 2', '2023-03-21', '2023-04-08', '2020'),
(4, '86816833', 'Advance Web Dev', 'Inleads It', '2023-03-22', '2023-03-31', '2022'),
(5, '98672514', 'Machine Learning Workshop', 'North South University', '2023-03-31', '2023-04-30', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `emp_reference`
--

DROP TABLE IF EXISTS `emp_reference`;
CREATE TABLE IF NOT EXISTS `emp_reference` (
  `emp_ref_id` int NOT NULL AUTO_INCREMENT,
  `emp_user_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`emp_ref_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_reference`
--

INSERT INTO `emp_reference` (`emp_ref_id`, `emp_user_id`, `name`, `occupation`, `mobile`, `email`, `address`) VALUES
(1, '86816833', 'Nazmul Haque', 'Sr. Designer', '01789631118', 'nazmul@gmail.com', 'Bogura'),
(3, '98672514', 'Tanvir Ahmed', 'Software Engineer', '01738378899', 'tanvir.netmow@gmail.com', 'Bogura'),
(4, '88401852', 'Arif Rahman', 'CEO', '01738111222', 'arif@gmail.com', 'Gabtoli'),
(5, '88401852', 'Tanvir Ahmed', 'Software Engineer', '01738378899', 'tanvir.netmow@gmail.com', 'Bogura'),
(6, '86816833', 'Roxy Ahmed', 'ML Engineer', '01738378899', 'tanvir.devguide@gmail.com', 'Bogura'),
(7, '89260817', 'Syed Abdullah Md. Shihab', 'Senior Software Engineer', '123456789', 'demo@gmail.com', 'Sherpur, Bogura, Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `emp_society_member`
--

DROP TABLE IF EXISTS `emp_society_member`;
CREATE TABLE IF NOT EXISTS `emp_society_member` (
  `emp_soc_id` int NOT NULL AUTO_INCREMENT,
  `emp_user_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `association` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activities` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`emp_soc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_society_member`
--

INSERT INTO `emp_society_member` (`emp_soc_id`, `emp_user_id`, `association`, `activities`, `start_date`, `end_date`) VALUES
(1, '86816833', 'Football', 'Playing', '2023-03-31', '2023-03-31'),
(3, '88401852', 'Sheba', 'Charity', '2023-03-01', '2023-03-01'),
(4, '88401852', 'Demo Sheba', 'Charity Foundation', '2023-03-20', '2023-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `emp_training_details`
--

DROP TABLE IF EXISTS `emp_training_details`;
CREATE TABLE IF NOT EXISTS `emp_training_details` (
  `emp_training_id` int NOT NULL AUTO_INCREMENT,
  `emp_user_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`emp_training_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_training_details`
--

INSERT INTO `emp_training_details` (`emp_training_id`, `emp_user_id`, `title`, `institution`, `start_date`, `end_date`) VALUES
(1, '86816833', 'Web Design', 'Inleads It and Solutions Limited', '2023-03-31', '2023-04-08'),
(2, '88401852', 'Graphics Traning', 'Azizul Haque', '2023-03-25', '2023-03-31'),
(3, '88401852', 'UI/UX Traning', 'Azizul Haque', '2023-03-22', '2023-04-22'),
(4, '86816833', 'Web Developer', 'MIT Park', '2023-03-22', '2023-04-30'),
(5, '98672514', 'Presentation Skills', 'North South University', '2023-03-31', '2023-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `idcard_type_list`
--

DROP TABLE IF EXISTS `idcard_type_list`;
CREATE TABLE IF NOT EXISTS `idcard_type_list` (
  `ic_id` int NOT NULL AUTO_INCREMENT,
  `idcard_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idcard_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`ic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `idcard_type_list`
--

INSERT INTO `idcard_type_list` (`ic_id`, `idcard_id`, `idcard_name`, `status`, `created_at`, `updated_at`) VALUES
(4, '574', 'DEV', 'ACTIVE', '2023-03-18', '2023-03-18'),
(8, '240', 'UI', 'ACTIVE', '2023-03-20', '2023-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

DROP TABLE IF EXISTS `months`;
CREATE TABLE IF NOT EXISTS `months` (
  `month_id` int NOT NULL AUTO_INCREMENT,
  `month_no` int NOT NULL,
  `month_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`month_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`month_id`, `month_no`, `month_name`) VALUES
(1, 1, 'Januray'),
(2, 2, 'February'),
(3, 3, 'March'),
(4, 4, 'April'),
(5, 5, 'May'),
(6, 6, 'June'),
(7, 7, 'July'),
(8, 8, 'August'),
(9, 9, 'September'),
(10, 10, 'October'),
(11, 11, 'November'),
(12, 12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `salary_type_list`
--

DROP TABLE IF EXISTS `salary_type_list`;
CREATE TABLE IF NOT EXISTS `salary_type_list` (
  `sl_id` int NOT NULL AUTO_INCREMENT,
  `slry_type_id` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slry_type_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`sl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_type_list`
--

INSERT INTO `salary_type_list` (`sl_id`, `slry_type_id`, `slry_type_name`, `status`, `created_at`, `updated_at`) VALUES
(1, '327', 'Advance', 'ACTIVE', '2023-03-18', '2023-04-05'),
(6, '674', 'Bonus', 'DEACTIVE', '2023-03-24', '2023-04-06'),
(5, '225', 'Monthly', 'ACTIVE', '2023-03-18', '2023-04-05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
