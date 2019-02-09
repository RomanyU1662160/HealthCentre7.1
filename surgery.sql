-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 22, 2018 at 09:11 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surgery`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `refrence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `start_at` time NOT NULL,
  `end_at` time NOT NULL,
  `patient_attend` tinyint(1) NOT NULL DEFAULT '0',
  `doctor_attend` tinyint(1) NOT NULL DEFAULT '0',
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `prescription_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `appointments_doctor_id_foreign` (`doctor_id`),
  KEY `appointments_patient_id_foreign` (`patient_id`)
) ENGINE=MyISAM AUTO_INCREMENT=165 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `refrence`, `date`, `start_at`, `end_at`, `patient_attend`, `doctor_attend`, `notes`, `created_at`, `updated_at`, `doctor_id`, `patient_id`, `prescription_id`) VALUES
(164, 'JulietQuramby198010202018050317:00', '2018-05-03', '17:00:00', '17:15:00', 0, 0, NULL, '2018-04-22 02:26:11', '2018-04-22 02:26:11', 2, 2, NULL),
(1, 'RomanySefen197504272018042810:30', '2018-04-22', '09:00:00', '10:45:00', 0, 0, NULL, '2018-04-20 18:59:26', '2018-04-20 18:59:26', 2, 1, NULL),
(2, 'RomanySefen197504272018101010:10', '2018-04-21', '07:10:00', '10:20:00', 1, 0, NULL, '2018-03-10 00:11:26', '2018-04-21 05:12:14', 2, 1, 0),
(3, 'RomanySefen197504272018100110:00', '2018-04-01', '10:00:00', '11:00:00', 0, 0, NULL, '2018-03-10 02:06:28', '2018-03-10 02:06:28', 2, 1, 0),
(4, 'RomanySefen197504272018051210:30', '2018-04-30', '10:30:00', '11:20:00', 0, 0, NULL, '2018-04-12 23:29:02', '2018-04-12 23:29:02', 2, 1, 0),
(5, 'RomanySefen197504272018041610:30', '2018-05-01', '10:30:00', '11:00:00', 0, 0, 'Notes for appointment no 16', '2018-04-14 02:12:11', '2018-04-15 19:49:50', 2, 1, 0),
(7, 'RomanySefen197504272018050211:00', '2018-05-02', '11:00:00', '11:30:00', 0, 0, NULL, '2018-04-14 02:14:13', '2018-04-14 02:14:13', 2, 1, 0),
(8, 'RomanySefen197504272018052514:30', '2018-05-25', '14:30:00', '15:00:00', 0, 0, NULL, '2018-04-14 02:17:29', '2018-04-14 02:17:29', 3, 1, 0),
(9, 'RomanySefen197504272018051011:30', '2018-05-10', '11:30:00', '12:00:00', 0, 0, NULL, '2018-04-14 02:20:44', '2018-04-14 02:20:44', 2, 1, 0),
(10, 'RomanySefen197504272018042912:00', '2018-04-29', '12:00:00', '12:30:00', 0, 0, NULL, '2018-04-14 02:21:37', '2018-04-14 02:21:37', 1, 1, 0),
(11, 'RomanySefen197504272018043011:30', '2018-04-30', '11:30:00', '12:00:00', 0, 0, NULL, '2018-04-14 02:22:14', '2018-04-14 02:22:14', 1, 1, 0),
(12, 'RomanySefen197504272018060615:00', '2018-06-06', '15:00:00', '15:30:00', 0, 0, NULL, '2018-04-14 02:24:47', '2018-04-14 02:24:47', 1, 1, 0),
(13, 'RomanySefen197504272018060411:30', '2018-06-04', '11:30:00', '12:00:00', 0, 0, NULL, '2018-04-14 02:29:26', '2018-04-14 02:29:26', 1, 1, 0),
(14, 'RomanySefen197504272018062210:30', '2018-06-22', '10:30:00', '11:00:00', 0, 0, NULL, '2018-04-14 02:43:19', '2018-04-14 02:43:19', 3, 1, 0),
(15, 'RomanySefen197504272018061511:30', '2018-06-15', '11:30:00', '12:00:00', 0, 0, NULL, '2018-04-14 02:44:36', '2018-04-14 02:44:36', 3, 1, 0),
(16, 'RomanySefen197504272018060112:30', '2018-06-01', '12:30:00', '13:00:00', 0, 0, NULL, '2018-04-14 02:46:54', '2018-04-14 02:46:54', 1, 1, 0),
(17, 'RomanySefen197504272018061611:30', '2018-06-16', '11:30:00', '12:00:00', 0, 0, NULL, '2018-04-14 02:47:37', '2018-04-14 02:47:37', 1, 1, 0),
(18, 'RomanySefen197504272018051012:30', '2018-05-10', '12:30:00', '13:00:00', 0, 0, NULL, '2018-04-14 02:49:27', '2018-04-14 02:49:27', 2, 1, 0),
(21, 'RomanySefen197504272018043013:30', '2018-04-30', '13:30:00', '13:45:00', 0, 0, NULL, '2018-04-14 20:02:11', '2018-04-14 20:02:11', 1, 1, 0),
(20, 'RomanySefen197504272018060811:30', '2018-06-08', '11:30:00', '11:45:00', 0, 0, 'Patient must be seen after 2 weeks', '2018-04-14 03:34:34', '2018-04-15 23:03:31', 1, 1, 0),
(22, 'RomanySefen197504272018042810:30', '2018-04-22', '10:00:00', '10:45:00', 0, 0, NULL, '2018-04-21 18:59:26', '2018-04-21 03:25:13', 1, 1, NULL),
(6, 'RomanySefen197504272018101010:30', '2018-10-10', '10:30:00', '10:45:00', 0, 0, NULL, '2018-04-20 19:12:50', '2018-04-20 19:12:50', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

DROP TABLE IF EXISTS `drugs`;
CREATE TABLE IF NOT EXISTS `drugs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum_age` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`id`, `name`, `minimum_age`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Paracetamol 1000', 6, 'Paracetamol 1000 helps to reduce pain ', '2018-04-14 23:00:00', '2018-04-14 23:00:00'),
(2, 'Ibuprofen 1000', 12, 'Ibuprofen is a painkiller for adults ', '2018-04-13 23:00:00', '2018-04-14 23:00:00'),
(3, 'Aproximol', 1, 'Antibiotic', '2018-04-15 05:37:35', '2018-04-15 05:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `drug_prescription`
--

DROP TABLE IF EXISTS `drug_prescription`;
CREATE TABLE IF NOT EXISTS `drug_prescription` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `drug_id` int(10) UNSIGNED NOT NULL,
  `prescription_id` int(10) UNSIGNED NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drug_prescription`
--

INSERT INTO `drug_prescription` (`id`, `drug_id`, `prescription_id`, `notes`) VALUES
(1, 1, 1, '4 Times Daily'),
(2, 2, 2, 'One Pill Every 6 Hours'),
(11, 3, 7, 'One Pill Every 6 Hours'),
(4, 2, 1, '2 Times Per Day '),
(20, 1, 10, 'One Pill Every 6 Hours'),
(19, 3, 9, 'One Pill Every 12Hours'),
(18, 2, 9, 'One Pill Every 6 Hours'),
(17, 1, 9, 'As required - 5/day Max'),
(13, 1, 7, '4 Times Daily'),
(12, 2, 7, 'One Pill Every 6 Hours'),
(21, 3, 10, 'One Pill Every 6 Hours'),
(22, 1, 11, NULL),
(23, 2, 11, NULL),
(24, 3, 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 2),
(3, '2018_02_26_001305_create_roles_table', 2),
(4, '2018_02_26_003849_create_users_roles_table', 3),
(5, '2018_02_26_220314_create_patients_table', 3),
(6, '2018_02_27_003528_create_appointments_table', 3),
(7, '2018_03_03_012055_create_doctors_table', 4),
(13, '2018_04_15_001723_create_prescriptions_table', 7),
(11, '2018_04_15_002800_create_drugs_table', 5),
(12, '2018_04_15_014031_create_drug_prescription_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `house` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patients_doctor_id_index` (`doctor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `fname`, `lname`, `patient_number`, `gender`, `mobile`, `email`, `house`, `address`, `postcode`, `dob`, `avatar`, `doctor_id`, `created_at`, `updated_at`) VALUES
(1, 'Romany', 'Sefen', 'RomanySefen19750427', 'Male', '07342978488', 'romanyfayiez@hotmail.com', '9', 'Balmoral Avenue, Beaumont Park,Huddersfield', 'HD4 5LR', '1975-04-27', NULL, 1, '2018-03-03 01:06:07', '2018-04-14 03:07:19'),
(2, 'Juliet', 'Quramby', 'JulietQuramby19801020', 'Female', '07342978488', 'juliet@surgery.com', '13', 'WoodSide Road', 'LS16  5LR', '1980-10-20', NULL, 2, '2018-04-19 01:25:33', '2018-04-19 01:25:33'),
(44, 'Roma', 'Sef', 'RomeoSef19750427', 'Male', '07342978488', 'romanyfayiez@gmail.com', '9', 'Balmoral Avenue, Beaumont Park,Huddersfield', 'HD6 5LR', '1975-04-27', NULL, 4, '2018-03-03 01:06:07', '2018-04-14 03:07:19'),
(3, 'Mark', 'Anglo ', 'mark 1515', 'Male', '73429788888', 'romanyfayiez@hotmail.com', '7', '7 Balmoral Avenue, Beaumont Park', 'HD4 5LR', '1975-04-27', NULL, 2, '2018-03-03 01:06:07', '2018-03-03 01:06:07'),
(4, 'John', 'Doe', 'Patient49750427', 'Male', '07342978488', 'romanyfayiez@hotmail.com', '17', 'leeds', 'LS16 5LR', '1985-04-27', NULL, 3, '2018-03-03 01:06:07', '2018-04-17 20:19:02'),
(45, 'Martha', 'Segal', 'MarthaSegal19900720', 'Female', '07342978488', 'Martha@surgery.com', '27', '7  Albert Avenue, Beaumont Park', 'HD4 5LR', '1990-07-20', NULL, 1, '2018-04-22 00:20:03', '2018-04-22 00:20:03'),
(46, 'Tom', 'Marter', 'TomMarter19750430', 'Male', '07342978490', 'tom@surgery.com', '27', 'Kingston King Road', 'HD5 6LW', '1975-04-30', NULL, 2, '2018-04-22 00:26:02', '2018-04-22 00:26:30'),
(47, 'Alexander', 'Christopher', 'AlexanderChristopher19690121', 'Male', '07342978456', 'alex@surgery.com', '18', 'Brooklyn Road', 'HD7 5LT', '1969-01-21', NULL, 2, '2018-04-22 00:34:19', '2018-04-22 00:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

DROP TABLE IF EXISTS `prescriptions`;
CREATE TABLE IF NOT EXISTS `prescriptions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `appointment_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `appointment_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-04-14 23:00:00', '2018-04-15 04:00:00'),
(2, 2, '2018-04-11 23:00:00', '2018-04-13 23:00:00'),
(3, 9, '2018-04-15 06:01:34', '2018-04-15 06:01:34'),
(10, 10, '2018-04-15 16:59:54', '2018-04-15 16:59:54'),
(9, 12, '2018-04-15 06:39:49', '2018-04-15 06:39:49'),
(11, 11, '2018-04-15 23:02:04', '2018-04-15 23:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Doctor'),
(3, 'Receptionist');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `staff_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `staff_number`, `password`, `title`, `fname`, `lname`, `email`, `gender`, `mobile`, `house`, `address`, `postcode`, `dob`, `avatar`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Doctor5', '$2y$10$YCoekd.DD8gbsBMU1k5Yk.nGL1xSUmLlubxgHTtOEHtZ7wI2Zcfe2', 'Dr', 'John', 'Lowis', 'John@surgery.com', 'Male', '0744444444', '17', 'Thornton Road', 'HD4 5MN', '1980-03-06', NULL, 2, 'eVNMR6YSHV0z61iZESifgLTBCZcEW1UwWjtXKzCLRSLSuuSrhQr3nAzWsAl7', '2018-02-28 01:52:03', '2018-04-14 20:46:59'),
(1, 'Doctor1', '$2y$10$YCoekd.DD8gbsBMU1k5Yk.nGL1xSUmLlubxgHTtOEHtZ7wI2Zcfe2', 'Dr', 'Matthew', 'Mantle', 'm.e.mantle@surgery.com', 'male', '07454523862', '70', 'Ring Road', 'HD1 2LS', '1970-11-11', NULL, 2, 'Krrpa8DVuWTiNXIDIkoWTtDU3DT0ai5tYgQfdElTpnDHmljtdfjcMwphB4oT', '2018-04-20 22:46:53', '2018-04-20 22:46:53'),
(4, 'Doctor4', '$2y$10$YCoekd.DD8gbsBMU1k5Yk.nGL1xSUmLlubxgHTtOEHtZ7wI2Zcfe2', 'Mrs', 'Pawson', 'Galton', 'pawson@surgery.com', 'female', '0712345697', '29', 'Chapel Hill Road', 'HD1 5MR', '1974-05-10', NULL, 2, NULL, '2018-03-09 21:03:17', '2018-04-19 01:23:37'),
(3, 'CW111111', '$2y$10$2DBSjNqK6SuuLF2mnJhlDuMi2hAQM1qX5V7dBVKxWzNUWDlWIf4K6', 'Dr', 'John', 'Bon', 'John@surgery.com', 'Male', '0744444444', '17', 'Thornton Road', 'HD4 5MN', '1980-03-06', NULL, 3, 'eVNMR6YSHV0z61iZESifgLTBCZcEW1UwWjtXKzCLRSLSuuSrhQr3nAzWsAl7', '2018-02-28 01:52:03', '2018-04-14 20:46:59'),
(6, 'PGorliia270470', '$2y$10$k.C2oH9SZ2nOk9WJEiZ0h.Y7T6JCXw94NbDcbCc83lCG.DffShaWW', 'Mrs', 'Pawson', 'Gorliia', 'pawson@surgery.com', 'female', '07342978488', '12', 'WoodSide Road', 'HD4 5LR', '1970-04-27', NULL, 2, NULL, '2018-04-19 01:16:34', '2018-04-19 01:16:34'),
(62, 'recp', '$2y$10$E7MUJ3U42c2sVBceQu2k5.NxFp2dKEGOoVBRJ2zlzoSGtT6HOKNYS', 'Dr', 'Mike', 'Johnson', 'miken@surgery.com', 'malee', '0712345697', '29', 'Chapel Hill Road', 'HD1 5MR', '1974-05-10', NULL, 3, NULL, '2018-03-09 21:03:17', '2018-04-19 01:23:37'),
(61, 'recp2', '$2y$10$ie8EvBeeOZZxYUPDZDrBaurDPJ04aXpg0XKy9u4afrp26E92Cepo.', 'Mr', 'Alex', 'Smith', 'Alex@surgery.com', 'male', '07454523862', '79', 'Ring Road', 'HD1 2LE', '1980-11-15', NULL, 3, 'awjBTDFrIZJo2kkol2kHagHItUi7ZSzx3TwbURavmusbuUV2ZNtelAgKbFFg', '2018-04-20 22:46:53', '2018-04-20 22:46:53'),
(60, 'recp1', '$2y$10$ORYg/MoG0yaIyKy.ARbn3euZRmjF.GK0arveK70Lk0yzB1lp7FPsG', 'Mr', 'Kevin', 'Bowman', 'k.bowman@hud.ac.uk', 'male', '07342948189', '12', 'WoodSide Road', 'HD4 5LR', '1970-12-12', NULL, 3, 'UxBmbf6J96smvey2c75uHJQYG3CQaOnOJaDSRFisYXgKWu3V3w02SgkBMAgt', '2018-04-20 22:49:01', '2018-04-20 22:49:01'),
(7, 'Admin', '$2y$10$GhsJOuF//BaU0kBW8DePge21gfa8bg5chiPDzvmHwK.eSY9ugMrmW', 'Dr.', 'Matthew', 'Mantle', 'm.e.mantle@surgery.com', 'male', '07454523862', '70', 'Ring Road', 'HD1 2LS', '1970-11-11', NULL, 1, NULL, '2018-04-20 22:46:53', '2018-04-20 22:46:53'),
(2, 'Doctor2', '$2y$10$YCoekd.DD8gbsBMU1k5Yk.nGL1xSUmLlubxgHTtOEHtZ7wI2Zcfe2', 'Dr', 'James', 'Bowman', 'k.bowman@hud.ac.uk', 'male', '07342948189', '12', 'WoodSide Road', 'HD4 5LR', '1970-12-12', NULL, 2, NULL, '2018-04-20 22:49:01', '2018-04-20 22:49:01'),
(65, 'NCharlie101010', '$2y$10$IikUSwczHIE3afBAadNhNuru5OAGA2PbG.CHw6Hs0GttcyNwUJrHu', 'Miss', 'Nicola', 'Charlie', 'nike@surgery.com', 'female', '07342978480', '16', 'Marathon ave', 'HD6 5LR', '2000-10-10', NULL, 2, 'HJWdLnyMua0Txjo48346aUwruvwSGvIqccOzBlnfZaOx8XRuT7Jv1DrgkBt0', '2018-04-20 22:42:10', '2018-04-20 22:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

DROP TABLE IF EXISTS `users_roles`;
CREATE TABLE IF NOT EXISTS `users_roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_roles_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 3, 2),
(4, 4, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
