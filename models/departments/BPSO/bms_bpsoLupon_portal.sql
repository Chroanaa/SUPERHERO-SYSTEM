-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2024 at 07:56 PM
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
-- Database: `bms_bpso_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `complainant_name` varchar(255) NOT NULL,
  `complainant_address` varchar(255) NOT NULL,
  `respondent_name` varchar(255) NOT NULL,
  `respondent_address` varchar(255) NOT NULL,
  `complaint_category` varchar(50) NOT NULL,
  `place_of_incident` varchar(255) NOT NULL,
  `time_of_incident` time NOT NULL,
  `date_of_incident` date NOT NULL,
  `complaint_description` text NOT NULL,
  `special_case` varchar(255) NOT NULL,
  `case_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `complainant_name`, `complainant_address`, `respondent_name`, `respondent_address`, `complaint_category`, `place_of_incident`, `time_of_incident`, `date_of_incident`, `complaint_description`, `special_case`, `case_number`) VALUES
(1, 'matulog', 'blk31', '', '', '', '', '00:00:00', '0000-00-00', '                    ', '', '3123123121'),
(2, 'ordejon', 'blk31', 'clarence', 'blk41', 'Minor case', 'QCU', '02:23:00', '2023-02-23', 'nakagat', 'None', '3123211'),
(3, 'clarence', 'blk30', 'angelo', 'blk34', 'Minor case', 'caloocan', '02:23:00', '2024-02-23', 'NAKAHGAT', 'None', '4234234'),
(4, 'clars', 'awf', 'fawfawf', 'fawfawf', 'Minor case', 'caloocan', '14:21:00', '2003-02-23', 'nasagasaan', 'BADAC', '321321'),
(5, 'obina', 'blk31', 'valerine', 'blk41', 'Major case', 'QCU', '14:23:00', '2023-02-21', 'nag away', 'BCPC', '312312315'),
(6, '', '', '', '', '', '', '00:00:00', '0000-00-00', '', '', '6234122'),
(7, 'obina', 'blk31', 'valerine', 'blk41', '', 'QCU', '00:00:00', '0000-00-00', '', '', '312311'),
(8, 'Clarence ordejon', 'blk30', 'Angelo', 'blk34', 'wala', 'school', '02:45:00', '2024-06-25', 'nagmeeting lang sa school sa ganap na 2:00pm', 'None', '213124234'),
(11, 'Clarence', 'blk30', 'Ordejon', 'blk34', 'wala', 'school', '02:45:00', '2024-06-25', 'nagmeeting lang sa school sa ganap na 2:00pm', 'None', '2136346352'),
(12, 'clar', 'Brgy. Sta. Lucia', 'Gumban', 'sa tabi', 'minor', 'sa tabi lang', '04:00:00', '2024-06-16', 'sa tabi nag away lang', 'BPSO', '1B11022376'),
(13, 'obina', 'blk31', 'valerine', 'blk41', 'Minor case', 'QCU', '14:32:00', '2024-02-23', 'nag usap lang', 'None', '3123124213'),
(14, 'kevin', 'blk31', 'angelo', 'blk34', 'Major case', 'QCU', '14:45:00', '2024-02-23', 'nag barilan sa labas ng school', 'None', '2131231123');

--
-- Triggers `complaint`
--
DELIMITER $$
CREATE TRIGGER `validate_case_number_length` BEFORE INSERT ON `complaint` FOR EACH ROW BEGIN
  IF CHAR_LENGTH(NEW.case_number) > 10 THEN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Case number can only be 10 characters.';
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `turnover`
--

CREATE TABLE `turnover` (
  `id` int(11) NOT NULL,
  `complainant_name` varchar(255) NOT NULL,
  `complainant_address` text NOT NULL,
  `respondent_name` varchar(255) NOT NULL,
  `respondent_address` text NOT NULL,
  `complaint_category` varchar(100) NOT NULL,
  `place_of_incident` varchar(255) NOT NULL,
  `time_of_incident` time NOT NULL,
  `date_of_incident` date NOT NULL,
  `complaint_description` text NOT NULL,
  `special_case` varchar(255) DEFAULT NULL,
  `case_number` varchar(50) NOT NULL,
  `origin_department` varchar(50) NOT NULL,
  `date_forward` date DEFAULT NULL,
  `hearing_date` date DEFAULT NULL,
  `hearing_time` time NOT NULL,
  `venue` varchar(200) NOT NULL,
  `case_officer` varchar(100) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'new',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ongoing` varchar(20) NOT NULL,
  `case_status` varchar(50) NOT NULL,
  `case_notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `turnover`
--

INSERT INTO `turnover` (`id`, `complainant_name`, `complainant_address`, `respondent_name`, `respondent_address`, `complaint_category`, `place_of_incident`, `time_of_incident`, `date_of_incident`, `complaint_description`, `special_case`, `case_number`, `origin_department`, `date_forward`, `hearing_date`, `hearing_time`, `venue`, `case_officer`, `status`, `created_at`, `ongoing`, `case_status`, `case_notes`) VALUES
(11, 'matulog', 'blk31', '', '', '', '', '00:00:00', '0000-00-00', '                    ', '', '3123123121', 'BPSO', '2024-11-13', '2024-11-11', '16:24:00', 'cubao', 'dustin', 'new', '2024-11-15 18:56:53', '', '', ''),
(12, 'ordejon', 'blk31', 'clarence', 'blk41', 'Minor case', 'QCU', '02:23:00', '2023-02-23', 'nakagat', 'None', '3123211', 'BPSO', '2024-11-13', '2024-11-27', '18:29:00', 'cubao', 'dustin', 'new', '2024-11-15 18:56:53', '1', 'settled', ''),
(13, 'clarence', 'blk30', 'angelo', 'blk34', 'Minor case', 'caloocan', '02:23:00', '2024-02-23', 'NAKAHGAT', 'None', '4234234', 'BPSO', '2024-11-13', '2024-11-28', '18:24:00', 'cubao', 'dustin', 'new', '2024-11-15 18:56:53', '1', 'unsettled', ''),
(14, 'obina', 'blk31', 'valerine', 'blk41', 'Minor case', 'QCU', '14:32:00', '2024-02-23', 'nag usap lang', 'None', '3123124213', 'BPSO', '2024-11-13', '2024-11-26', '22:24:00', 'cubao', 'dustin', 'new', '2024-11-15 18:56:53', '1', 'unsettled', ''),
(15, 'Clarence ordejon', 'blk30', 'Angelo', 'blk34', 'wala', 'school', '02:45:00', '2024-06-25', 'nagmeeting lang sa school sa ganap na 2:00pm', 'None', '213124234', 'BPSO', '2024-11-15', '2024-11-30', '14:24:00', 'sta lucia', 'clarence ordejon', 'new', '2024-11-15 18:56:53', '1', 'settled', 'nagkaayos na sila'),
(16, 'kevin', 'blk31', 'angelo', 'blk34', 'Major case', 'QCU', '14:45:00', '2024-02-23', 'nag barilan sa labas ng school', 'None', '2131231123', 'BPSO', '2024-11-15', '2024-12-21', '18:24:00', 'cubao', 'dustin', 'new', '2024-11-15 18:56:53', '1', 'settled', 'ewan ko'),
(17, 'Clarence', 'blk30', 'Ordejon', 'blk34', 'wala', 'school', '02:45:00', '2024-06-25', 'nagmeeting lang sa school sa ganap na 2:00pm', 'None', '2136346352', 'BPSO', '2024-11-15', '2024-11-28', '17:28:00', 'cubao', 'dustin', 'new', '2024-11-15 19:45:38', '1', 'ongoing', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `case_number` (`case_number`);

--
-- Indexes for table `turnover`
--
ALTER TABLE `turnover`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `case_number` (`case_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `turnover`
--
ALTER TABLE `turnover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
