-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2021 at 06:04 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_doctors`
--

CREATE TABLE `all_doctors` (
  `doc_id` varchar(100) NOT NULL CHECK (`doc_id` like 'DR%' or `doc_id` like 'DC%'),
  `department_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_doctors`
--

INSERT INTO `all_doctors` (`doc_id`, `department_name`) VALUES
('DC002', 'Dentist'),
('DR001', 'Heart');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_name` varchar(100) NOT NULL,
  `department_location` varchar(100) DEFAULT NULL,
  `department_fac` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_name`, `department_location`, `department_fac`) VALUES
('Dentist', 'Home', 'On-Call'),
('Heart', 'Ground Floor', 'Surgeons');

-- --------------------------------------------------------

--
-- Table structure for table `doc_on_call`
--

CREATE TABLE `doc_on_call` (
  `doc_id` varchar(100) DEFAULT NULL CHECK (`doc_id` like 'DC%'),
  `doc_name` varchar(100) DEFAULT NULL,
  `doc_quali` varchar(100) DEFAULT NULL,
  `doc_address` varchar(100) DEFAULT NULL,
  `doc_phone` int(100) DEFAULT NULL,
  `doc_fpc` int(100) DEFAULT NULL,
  `doc_payment_due` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doc_on_call`
--

INSERT INTO `doc_on_call` (`doc_id`, `doc_name`, `doc_quali`, `doc_address`, `doc_phone`, `doc_fpc`, `doc_payment_due`) VALUES
('DC002', 'DC-Hamza', 'Phd', 'Lahore', 2147483647, 10000, '2021-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `doc_reg`
--

CREATE TABLE `doc_reg` (
  `doc_id` varchar(100) DEFAULT NULL CHECK (`doc_id` like 'DR%'),
  `doc_name` varchar(100) NOT NULL,
  `doc_quali` varchar(100) DEFAULT NULL,
  `doc_address` varchar(100) DEFAULT NULL,
  `doc_phone` int(100) DEFAULT NULL,
  `doc_salary` int(100) DEFAULT NULL,
  `doc_joining` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doc_reg`
--

INSERT INTO `doc_reg` (`doc_id`, `doc_name`, `doc_quali`, `doc_address`, `doc_phone`, `doc_salary`, `doc_joining`) VALUES
('DR001', 'DR-Mohsin', 'Phd', 'Lahore', 2147483647, 100000, '2021-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `pat_admit`
--

CREATE TABLE `pat_admit` (
  `pat_id` varchar(100) DEFAULT NULL,
  `adv_pay` int(100) DEFAULT NULL,
  `mode_of_pay` varchar(100) DEFAULT NULL,
  `room_no` int(100) DEFAULT NULL,
  `department_name` varchar(100) DEFAULT NULL,
  `pat_admit_date` date DEFAULT NULL,
  `initial_cond` varchar(100) DEFAULT NULL,
  `diag` varchar(100) DEFAULT NULL,
  `treatment` varchar(100) DEFAULT NULL,
  `no_doc_treatment` int(100) DEFAULT NULL,
  `attendant_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pat_chkup`
--

CREATE TABLE `pat_chkup` (
  `pat_id` varchar(100) DEFAULT NULL,
  `doc_id` varchar(100) DEFAULT NULL,
  `pat_diag` varchar(100) DEFAULT NULL,
  `pat_treatment` varchar(100) DEFAULT NULL,
  `pat_states` tinytext DEFAULT NULL,
  `pat_chkup_date` date DEFAULT NULL,
  `Reffered_for` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pat_dis`
--

CREATE TABLE `pat_dis` (
  `pat_id` varchar(100) DEFAULT NULL,
  `treatment_given` varchar(100) DEFAULT NULL,
  `treatment_advice` varchar(100) DEFAULT NULL,
  `payment_made` int(100) DEFAULT NULL,
  `mode_of_pay` varchar(100) DEFAULT NULL,
  `date_of_discharge` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pat_entry`
--

CREATE TABLE `pat_entry` (
  `pat_id` varchar(100) NOT NULL CHECK (`pat_id` like 'PT%'),
  `pat_name` varchar(100) DEFAULT NULL,
  `pat_age` varchar(100) DEFAULT NULL,
  `pat_sex` tinytext DEFAULT NULL CHECK (`pat_sex` in ('M','F')),
  `pat_address` varchar(100) DEFAULT NULL,
  `pat_city` varchar(100) DEFAULT NULL,
  `pat_phone` int(100) DEFAULT NULL,
  `pat_entry_date` date DEFAULT NULL,
  `doc_name` varchar(100) DEFAULT NULL,
  `department_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pat_opr`
--

CREATE TABLE `pat_opr` (
  `pat_id` varchar(100) DEFAULT NULL,
  `date_of_operation` date DEFAULT NULL,
  `department_name` varchar(100) DEFAULT NULL,
  `doc_id` varchar(100) DEFAULT NULL,
  `no_of_doc` int(100) DEFAULT NULL,
  `no_of_opt_theater` int(100) DEFAULT NULL,
  `type_of_operation` varchar(100) DEFAULT NULL,
  `treatment_advice` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pat_reg`
--

CREATE TABLE `pat_reg` (
  `pat_id` varchar(100) DEFAULT NULL,
  `date_of_visit` date DEFAULT NULL,
  `diag` varchar(100) DEFAULT NULL,
  `treatment` varchar(100) DEFAULT NULL,
  `med_rec` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room_detail`
--

CREATE TABLE `room_detail` (
  `room_no` int(100) NOT NULL,
  `room_type` tinytext DEFAULT NULL CHECK (`room_type` in ('G','P')),
  `room_status` tinytext DEFAULT NULL CHECK (`room_status` in ('Y','N')),
  `charges_per_day` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_detail`
--

INSERT INTO `room_detail` (`room_no`, `room_type`, `room_status`, `charges_per_day`) VALUES
(1, 'G', 'N', 1000),
(2, 'P', 'Y', 2000),
(3, 'G', 'Y', 1000),
(4, 'P', 'N', 2000),
(5, 'G', 'Y', 1000),
(6, 'P', 'N', 2000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_doctors`
--
ALTER TABLE `all_doctors`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `department_name` (`department_name`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_name`),
  ADD UNIQUE KEY `department_name` (`department_name`);

--
-- Indexes for table `doc_on_call`
--
ALTER TABLE `doc_on_call`
  ADD KEY `doc_id` (`doc_id`);

--
-- Indexes for table `doc_reg`
--
ALTER TABLE `doc_reg`
  ADD PRIMARY KEY (`doc_name`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Indexes for table `pat_admit`
--
ALTER TABLE `pat_admit`
  ADD KEY `department_name` (`department_name`),
  ADD KEY `pat_id` (`pat_id`),
  ADD KEY `room_no` (`room_no`);

--
-- Indexes for table `pat_chkup`
--
ALTER TABLE `pat_chkup`
  ADD KEY `doc_id` (`doc_id`),
  ADD KEY `pat_id` (`pat_id`);

--
-- Indexes for table `pat_dis`
--
ALTER TABLE `pat_dis`
  ADD KEY `pat_id` (`pat_id`);

--
-- Indexes for table `pat_entry`
--
ALTER TABLE `pat_entry`
  ADD PRIMARY KEY (`pat_id`),
  ADD KEY `doc_name` (`doc_name`),
  ADD KEY `department_name` (`department_name`);

--
-- Indexes for table `pat_opr`
--
ALTER TABLE `pat_opr`
  ADD KEY `pat_id` (`pat_id`),
  ADD KEY `department_name` (`department_name`),
  ADD KEY `doc_id` (`doc_id`);

--
-- Indexes for table `pat_reg`
--
ALTER TABLE `pat_reg`
  ADD KEY `pat_id` (`pat_id`);

--
-- Indexes for table `room_detail`
--
ALTER TABLE `room_detail`
  ADD PRIMARY KEY (`room_no`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `all_doctors`
--
ALTER TABLE `all_doctors`
  ADD CONSTRAINT `all_doctors_ibfk_1` FOREIGN KEY (`department_name`) REFERENCES `department` (`department_name`);

--
-- Constraints for table `doc_on_call`
--
ALTER TABLE `doc_on_call`
  ADD CONSTRAINT `doc_on_call_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `all_doctors` (`doc_id`);

--
-- Constraints for table `doc_reg`
--
ALTER TABLE `doc_reg`
  ADD CONSTRAINT `doc_reg_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `all_doctors` (`doc_id`);

--
-- Constraints for table `pat_admit`
--
ALTER TABLE `pat_admit`
  ADD CONSTRAINT `pat_admit_ibfk_1` FOREIGN KEY (`department_name`) REFERENCES `department` (`department_name`),
  ADD CONSTRAINT `pat_admit_ibfk_2` FOREIGN KEY (`pat_id`) REFERENCES `pat_entry` (`pat_id`),
  ADD CONSTRAINT `pat_admit_ibfk_3` FOREIGN KEY (`room_no`) REFERENCES `room_detail` (`room_no`),
  ADD CONSTRAINT `pat_admit_ibfk_4` FOREIGN KEY (`pat_id`) REFERENCES `pat_entry` (`pat_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pat_admit_ibfk_5` FOREIGN KEY (`pat_id`) REFERENCES `pat_entry` (`pat_id`) ON DELETE CASCADE;

--
-- Constraints for table `pat_chkup`
--
ALTER TABLE `pat_chkup`
  ADD CONSTRAINT `pat_chkup_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `all_doctors` (`doc_id`),
  ADD CONSTRAINT `pat_chkup_ibfk_2` FOREIGN KEY (`pat_id`) REFERENCES `pat_entry` (`pat_id`),
  ADD CONSTRAINT `pat_chkup_ibfk_3` FOREIGN KEY (`pat_id`) REFERENCES `pat_entry` (`pat_id`) ON DELETE CASCADE;

--
-- Constraints for table `pat_dis`
--
ALTER TABLE `pat_dis`
  ADD CONSTRAINT `pat_dis_ibfk_1` FOREIGN KEY (`pat_id`) REFERENCES `pat_entry` (`pat_id`),
  ADD CONSTRAINT `pat_dis_ibfk_2` FOREIGN KEY (`pat_id`) REFERENCES `pat_entry` (`pat_id`) ON DELETE CASCADE;

--
-- Constraints for table `pat_entry`
--
ALTER TABLE `pat_entry`
  ADD CONSTRAINT `pat_entry_ibfk_1` FOREIGN KEY (`doc_name`) REFERENCES `doc_reg` (`doc_name`),
  ADD CONSTRAINT `pat_entry_ibfk_2` FOREIGN KEY (`department_name`) REFERENCES `department` (`department_name`);

--
-- Constraints for table `pat_opr`
--
ALTER TABLE `pat_opr`
  ADD CONSTRAINT `pat_opr_ibfk_1` FOREIGN KEY (`pat_id`) REFERENCES `pat_entry` (`pat_id`),
  ADD CONSTRAINT `pat_opr_ibfk_2` FOREIGN KEY (`department_name`) REFERENCES `department` (`department_name`),
  ADD CONSTRAINT `pat_opr_ibfk_3` FOREIGN KEY (`doc_id`) REFERENCES `all_doctors` (`doc_id`),
  ADD CONSTRAINT `pat_opr_ibfk_4` FOREIGN KEY (`pat_id`) REFERENCES `pat_entry` (`pat_id`) ON DELETE CASCADE;

--
-- Constraints for table `pat_reg`
--
ALTER TABLE `pat_reg`
  ADD CONSTRAINT `pat_reg_ibfk_1` FOREIGN KEY (`pat_id`) REFERENCES `pat_entry` (`pat_id`),
  ADD CONSTRAINT `pat_reg_ibfk_2` FOREIGN KEY (`pat_id`) REFERENCES `pat_entry` (`pat_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
