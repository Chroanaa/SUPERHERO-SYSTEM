-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2024 at 06:01 AM
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
-- Database: `bms_account_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `brgy_admin_login_process`
--

CREATE TABLE `brgy_admin_login_process` (
  `brgy_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `registered_email` varchar(255) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `otp_sent_at` datetime DEFAULT current_timestamp(),
  `verification_at` datetime DEFAULT NULL,
  `date_issued` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brgy_admin_login_process`
--

INSERT INTO `brgy_admin_login_process` (`brgy_id`, `account_id`, `registered_email`, `otp`, `otp_sent_at`, `verification_at`, `date_issued`) VALUES
(1, NULL, 'test_dummy@dummy.ph', '8824', '2024-11-03 07:17:17', NULL, '2024-11-03'),
(2, NULL, 'juandelacruz@brgystalucia.ph', '6858', '2024-11-03 07:20:20', NULL, '2024-11-03'),
(3, NULL, 'test_dummy@dummy.ph', '5586', '2024-11-03 07:26:03', NULL, '2024-11-03'),
(4, NULL, 'test_dummy@dummy.ph', '6204', '2024-11-03 07:51:30', NULL, '2024-11-03'),
(5, NULL, 'test_dummy@dummy.ph', '1019', '2024-11-03 07:58:23', NULL, '2024-11-03'),
(6, NULL, 'test_dummy@dummy.ph', '7230', '2024-11-03 07:59:40', NULL, '2024-11-03'),
(7, NULL, 'test_dummy@dummy.ph', '3432', '2024-11-03 08:22:42', NULL, '2024-11-03'),
(8, NULL, 'test_dummy@dummy.ph', '7844', '2024-11-03 08:23:48', NULL, '2024-11-03'),
(9, NULL, 'test_dummy@dummy.ph', '5932', '2024-11-03 08:28:43', NULL, '2024-11-03'),
(10, NULL, 'test_dummy@dummy.ph', '1722', '2024-11-03 08:46:46', NULL, '2024-11-03'),
(11, NULL, 'test_dummy@dummy.ph', '3583', '2024-11-03 13:56:47', NULL, '2024-11-03'),
(12, NULL, 'test_dummy@dummy.ph', '4810', '2024-11-03 14:01:39', NULL, '2024-11-03'),
(13, NULL, 'test_dummy@dummy.ph', '5376', '2024-11-03 14:08:54', NULL, '2024-11-03'),
(14, NULL, 'test_dummy@dummy.ph', '4330', '2024-11-03 14:47:35', NULL, '2024-11-03'),
(15, NULL, 'test_dummy@dummy.ph', '9191', '2024-11-03 14:53:19', NULL, '2024-11-03'),
(16, NULL, 'test_dummy@dummy.ph', '6803', '2024-11-03 15:14:22', NULL, '2024-11-03'),
(17, NULL, 'test_dummy@dummy.ph', '8630', '2024-11-03 15:16:24', NULL, '2024-11-03'),
(18, NULL, 'test_dummy@dummy.ph', '1594', '2024-11-03 15:41:50', NULL, '2024-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `brgy_admin_users`
--

CREATE TABLE `brgy_admin_users` (
  `brgy_user_id` int(11) NOT NULL,
  `brgy_account_id` int(11) DEFAULT NULL,
  `brgy_firstName` varchar(255) DEFAULT NULL,
  `brgy_lastName` varchar(255) DEFAULT NULL,
  `brgy_email` varchar(255) DEFAULT NULL,
  `brgy_password_hashed` varchar(255) DEFAULT NULL,
  `brgy_password` varchar(255) DEFAULT NULL,
  `brgy_account_user_type` enum('super_admin','head_admin') DEFAULT NULL,
  `brgy_account_date_created` datetime DEFAULT current_timestamp(),
  `first_time_admin_user` varchar(5) DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brgy_admin_users`
--

INSERT INTO `brgy_admin_users` (`brgy_user_id`, `brgy_account_id`, `brgy_firstName`, `brgy_lastName`, `brgy_email`, `brgy_password_hashed`, `brgy_password`, `brgy_account_user_type`, `brgy_account_date_created`, `first_time_admin_user`) VALUES
(1, 128854, 'Roselle', 'Obina', 'roselle.obina@brgystalucia.ph', '$2y$10$BSRNjU.p3PiFR.6AY7PMd.mI739ZNPvRUH5XaJDLZmAGaDeeOJjSa', 'test', 'super_admin', '2024-11-03 06:58:17', 'yes'),
(2, 128454, 'Kenneth', 'Obsequio', 'keyn@brgystalucia.ph', '$2y$10$drKUPi5tWRcybmVOqhkrBuHZIwV0RSifdEUmzPG8laVEJq1Y7WtqK', 'test', 'head_admin', '2024-11-03 06:59:15', 'no'),
(3, 228654, 'Juan', 'Dela Cruz', 'juandelacruz@brgystalucia.ph', '$2y$10$JTAI3ct7Cp5OtZppwbrAi.AB.tCKXRWpGzFiCNmvPoT22LY9qTqCe', 'test', 'super_admin', '2024-11-03 09:54:12', 'yes'),
(4, 999999, 'Test', 'Dummy', 'test_dummy@dummy.ph', '$2y$10$188bK9lHRR6f7O5eRBtMk.w/29wUQxbfMnDOn6FfOto0UIY2ULcnu', 'test', 'super_admin', '2024-11-03 10:08:26', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `brgy_existing_staff_users`
--

CREATE TABLE `brgy_existing_staff_users` (
  `brgy_user_id` int(11) NOT NULL,
  `brgy_account_id` int(11) DEFAULT NULL,
  `brgy_firstName` varchar(255) DEFAULT NULL,
  `brgy_lastName` varchar(255) DEFAULT NULL,
  `brgy_email` varchar(255) DEFAULT NULL,
  `brgy_password_hashed` varchar(255) DEFAULT NULL,
  `brgy_password` varchar(255) DEFAULT NULL,
  `brgy_account_user_type` enum('admin_doc_services','admin_secretary','brgy_bpso_officer','brgy_badac_officer','brgy_bcpc_officer') DEFAULT NULL,
  `brgy_account_date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brgy_existing_staff_users`
--

INSERT INTO `brgy_existing_staff_users` (`brgy_user_id`, `brgy_account_id`, `brgy_firstName`, `brgy_lastName`, `brgy_email`, `brgy_password_hashed`, `brgy_password`, `brgy_account_user_type`, `brgy_account_date_created`) VALUES
(36, 415871, '', '', 'k80308392@gmail.co', '$2y$10$sw.peEWf5l6nA7tih/4gWeB2g2eoMU2uQh0DI9brbYhXFyNBmigv2', 'test', '', '2024-11-04 20:59:40'),
(37, 881672, NULL, NULL, 'test_user@badac.ph', '$2y$10$vF3lamXKDAZM/vEpU46YyOkTBdQ7L6gb2fgCt4AcTTm2MC8u4yFs6', 'test', NULL, '2024-11-04 21:47:49'),
(38, 782975, NULL, NULL, 'k80308392@gmail.com', '$2y$10$aQcTC7PcaeQmxR2hHqVoF.3.CuMZudYTOuqhJucWadYY1oEiEcH4m', 'test', NULL, '2024-11-04 21:50:02'),
(39, 547666, NULL, NULL, 'test_user@badac.ph', '$2y$10$kiC6Nv1pGIluCJno5OzcM.xVxTFupX/TyHfr2kXYQaG9KJoEKlo5O', 'test', NULL, '2024-11-04 22:00:44'),
(40, 941803, NULL, NULL, 'k80308392@gmail.com', '$2y$10$6Y/D9JYJ6wYWYCKFMpwJsuQCnCutaF4CgtkBtJHF.E2/NbVhCmJSm', 'test', NULL, '2024-11-05 11:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `brgy_staffs_login_process`
--

CREATE TABLE `brgy_staffs_login_process` (
  `brgy_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `registered_email` varchar(255) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `otp_sent_at` datetime DEFAULT current_timestamp(),
  `verification_at` datetime DEFAULT NULL,
  `date_issued` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brgy_user_registration_process`
--

CREATE TABLE `brgy_user_registration_process` (
  `registration_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `otp_sent_at` datetime NOT NULL,
  `otp_verified` tinyint(1) DEFAULT 0,
  `verification_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brgy_user_registration_process`
--

INSERT INTO `brgy_user_registration_process` (`registration_id`, `user_id`, `email`, `otp`, `otp_sent_at`, `otp_verified`, `verification_at`, `created_at`, `updated_at`) VALUES
(50, NULL, 'test_user@badac.ph', '7045', '2024-11-04 15:00:13', 1, NULL, '2024-11-04 22:00:13', NULL),
(51, NULL, 'k80308392@gmail.com', '3718', '2024-11-05 04:44:50', 1, NULL, '2024-11-05 11:44:50', NULL),
(52, NULL, 'kokok@test.com', '6690', '2024-11-11 07:16:06', 0, NULL, '2024-11-11 14:16:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `google_access_tokens`
--

CREATE TABLE `google_access_tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `access_token` text NOT NULL,
  `refresh_token` text NOT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brgy_admin_login_process`
--
ALTER TABLE `brgy_admin_login_process`
  ADD PRIMARY KEY (`brgy_id`);

--
-- Indexes for table `brgy_admin_users`
--
ALTER TABLE `brgy_admin_users`
  ADD PRIMARY KEY (`brgy_user_id`);

--
-- Indexes for table `brgy_existing_staff_users`
--
ALTER TABLE `brgy_existing_staff_users`
  ADD PRIMARY KEY (`brgy_user_id`);

--
-- Indexes for table `brgy_staffs_login_process`
--
ALTER TABLE `brgy_staffs_login_process`
  ADD PRIMARY KEY (`brgy_id`);

--
-- Indexes for table `brgy_user_registration_process`
--
ALTER TABLE `brgy_user_registration_process`
  ADD PRIMARY KEY (`registration_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `google_access_tokens`
--
ALTER TABLE `google_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brgy_admin_login_process`
--
ALTER TABLE `brgy_admin_login_process`
  MODIFY `brgy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `brgy_admin_users`
--
ALTER TABLE `brgy_admin_users`
  MODIFY `brgy_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brgy_existing_staff_users`
--
ALTER TABLE `brgy_existing_staff_users`
  MODIFY `brgy_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `brgy_staffs_login_process`
--
ALTER TABLE `brgy_staffs_login_process`
  MODIFY `brgy_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brgy_user_registration_process`
--
ALTER TABLE `brgy_user_registration_process`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `google_access_tokens`
--
ALTER TABLE `google_access_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brgy_user_registration_process`
--
ALTER TABLE `brgy_user_registration_process`
  ADD CONSTRAINT `brgy_user_registration_process_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `brgy_existing_staff_users` (`brgy_user_id`);

--
-- Constraints for table `google_access_tokens`
--
ALTER TABLE `google_access_tokens`
  ADD CONSTRAINT `google_access_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `brgy_existing_staff_users` (`brgy_user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
