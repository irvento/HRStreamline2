-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2024 at 09:44 PM
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
-- Database: `db_hris`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `table_name` varchar(255) NOT NULL,
  `row_id` int(10) UNSIGNED NOT NULL,
  `action` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `table_name`, `row_id`, `action`, `created_at`, `updated_at`) VALUES
(1, 1, 'tbl_leaves', 19, 'deleted', '2024-12-27 05:42:16', '2024-12-27 05:42:16'),
(2, 1, 'tbl_job', 17, 'deleted', '2024-12-27 06:44:40', '2024-12-27 06:44:40'),
(3, 1, 'tbl_payroll', 25, 'created', '2024-12-27 06:44:58', '2024-12-27 06:44:58'),
(4, 5, 'tbl_attendance', 10, 'created', '2024-12-27 06:54:31', '2024-12-27 06:54:31'),
(5, 5, 'tbl_attendance', 10, 'updated: changed fields -> time_out', '2024-12-27 06:54:41', '2024-12-27 06:54:41'),
(6, 1, 'tbl_employee_info', 35, 'deleted', '2024-12-27 07:07:11', '2024-12-27 07:07:11'),
(7, 1, 'tbl_employee_info', 40, 'deleted', '2024-12-27 07:07:12', '2024-12-27 07:07:12'),
(8, 1, 'tbl_employee_info', 41, 'deleted', '2024-12-27 07:07:14', '2024-12-27 07:07:14'),
(9, 1, 'tbl_employee_info', 42, 'deleted', '2024-12-27 07:07:16', '2024-12-27 07:07:16'),
(10, 1, 'tbl_leaves', 26, 'deleted', '2024-12-27 07:07:34', '2024-12-27 07:07:34'),
(11, 1, 'tbl_leaves', 30, 'deleted', '2024-12-27 07:07:36', '2024-12-27 07:07:36'),
(12, 1, 'tbl_department', 10, 'deleted', '2024-12-27 07:07:46', '2024-12-27 07:07:46'),
(13, 1, 'tbl_department', 11, 'deleted', '2024-12-27 07:07:49', '2024-12-27 07:07:49'),
(14, 1, 'tbl_department', 12, 'deleted', '2024-12-27 07:07:51', '2024-12-27 07:07:51'),
(15, 1, 'tbl_performance', 5, 'deleted', '2024-12-27 07:08:03', '2024-12-27 07:08:03'),
(16, 1, 'tbl_performance', 6, 'deleted', '2024-12-27 07:08:05', '2024-12-27 07:08:05'),
(17, 1, 'tbl_performance', 7, 'deleted', '2024-12-27 07:08:07', '2024-12-27 07:08:07'),
(18, 1, 'tbl_performance', 9, 'deleted', '2024-12-27 07:08:10', '2024-12-27 07:08:10'),
(19, 1, 'tbl_performance', 15, 'deleted', '2024-12-27 07:08:11', '2024-12-27 07:08:11'),
(20, 1, 'tbl_performance', 16, 'deleted', '2024-12-27 07:08:13', '2024-12-27 07:08:13'),
(21, 1, 'tbl_performance', 17, 'deleted', '2024-12-27 07:08:16', '2024-12-27 07:08:16'),
(22, 1, 'tbl_job', 9, 'deleted', '2024-12-27 07:08:20', '2024-12-27 07:08:20'),
(23, 1, 'tbl_job', 12, 'deleted', '2024-12-27 07:08:22', '2024-12-27 07:08:22'),
(24, 1, 'tbl_job', 13, 'deleted', '2024-12-27 07:08:25', '2024-12-27 07:08:25'),
(25, 1, 'tbl_job', 15, 'deleted', '2024-12-27 07:08:27', '2024-12-27 07:08:27'),
(26, 1, 'tbl_job', 18, 'deleted', '2024-12-27 07:08:28', '2024-12-27 07:08:28'),
(27, 1, 'tbl_salary', 1, 'deleted', '2024-12-27 07:08:34', '2024-12-27 07:08:34'),
(28, 1, 'tbl_salary', 2, 'deleted', '2024-12-27 07:08:39', '2024-12-27 07:08:39'),
(29, 1, 'tbl_salary', 4, 'deleted', '2024-12-27 07:08:42', '2024-12-27 07:08:42'),
(30, 1, 'tbl_salary', 6, 'deleted', '2024-12-27 07:08:44', '2024-12-27 07:08:44'),
(31, 1, 'tbl_payment_frequency_type', 1, 'deleted', '2024-12-27 07:08:48', '2024-12-27 07:08:48'),
(32, 1, 'tbl_payment_frequency_type', 2, 'deleted', '2024-12-27 07:08:50', '2024-12-27 07:08:50'),
(33, 1, 'tbl_payment_frequency_type', 5, 'deleted', '2024-12-27 07:08:53', '2024-12-27 07:08:53'),
(34, 1, 'tbl_certificate', 2, 'deleted', '2024-12-27 07:08:59', '2024-12-27 07:08:59'),
(35, 1, 'tbl_certificate', 1, 'deleted', '2024-12-27 07:09:01', '2024-12-27 07:09:01'),
(36, 1, 'tbl_employee', 2, 'deleted', '2024-12-27 07:09:12', '2024-12-27 07:09:12'),
(37, 1, 'tbl_employee', 3, 'deleted', '2024-12-27 07:09:15', '2024-12-27 07:09:15'),
(38, 1, 'tbl_employee', 4, 'deleted', '2024-12-27 07:09:18', '2024-12-27 07:09:18'),
(39, 1, 'tbl_employee', 9, 'deleted', '2024-12-27 07:09:21', '2024-12-27 07:09:21'),
(40, 1, 'tbl_employee', 10, 'deleted', '2024-12-27 07:09:24', '2024-12-27 07:09:24'),
(41, 5, 'users', 7, 'created', '2024-12-27 08:04:34', '2024-12-27 08:04:34'),
(42, 7, 'users', 7, 'created', '2024-12-27 08:04:34', '2024-12-27 08:04:34'),
(43, 1, 'tbl_payment_frequency_type', 6, 'created', '2024-12-27 08:05:57', '2024-12-27 08:05:57'),
(44, 1, 'tbl_payment_frequency_type', 7, 'created', '2024-12-27 08:06:04', '2024-12-27 08:06:04'),
(45, 1, 'tbl_salary', 7, 'created', '2024-12-27 08:06:46', '2024-12-27 08:06:46'),
(46, 1, 'tbl_salary', 8, 'created', '2024-12-27 08:07:15', '2024-12-27 08:07:15'),
(47, 1, 'tbl_job', 19, 'created', '2024-12-27 08:07:45', '2024-12-27 08:07:45'),
(48, 1, 'tbl_department', 13, 'created', '2024-12-27 08:14:50', '2024-12-27 08:14:50'),
(49, 7, 'tbl_employee', 11, 'created', '2024-12-27 08:15:42', '2024-12-27 08:15:42'),
(50, 7, 'tbl_employee_info', 43, 'created', '2024-12-27 08:15:42', '2024-12-27 08:15:42'),
(51, 1, 'tbl_employee', 11, 'updated: changed fields -> status', '2024-12-27 08:19:22', '2024-12-27 08:19:22'),
(52, 1, 'tbl_employee', 11, 'updated: changed fields -> status', '2024-12-27 08:19:26', '2024-12-27 08:19:26'),
(53, 1, 'tbl_employee', 11, 'updated: changed fields -> status', '2024-12-27 08:19:26', '2024-12-27 08:19:26'),
(54, 1, 'tbl_employee', 11, 'updated: changed fields -> status', '2024-12-27 08:19:35', '2024-12-27 08:19:35'),
(55, 1, 'tbl_employee', 11, 'updated: changed fields -> status', '2024-12-27 08:19:41', '2024-12-27 08:19:41'),
(56, 1, 'tbl_employee', 11, 'updated: changed fields -> status', '2024-12-27 08:19:45', '2024-12-27 08:19:45'),
(57, 1, 'tbl_job', 20, 'created', '2024-12-27 08:21:36', '2024-12-27 08:21:36'),
(58, 1, 'tbl_employee', 12, 'created', '2024-12-27 08:26:21', '2024-12-27 08:26:21'),
(59, 1, 'tbl_employee_info', 44, 'created', '2024-12-27 08:26:21', '2024-12-27 08:26:21'),
(60, 1, 'tbl_attendance', 11, 'created', '2024-12-27 08:26:45', '2024-12-27 08:26:45'),
(61, 1, 'tbl_attendance', 11, 'updated: changed fields -> time_out', '2024-12-27 08:26:47', '2024-12-27 08:26:47'),
(62, 7, 'tbl_attendance', 12, 'created', '2024-12-27 08:26:54', '2024-12-27 08:26:54'),
(63, 7, 'tbl_attendance', 12, 'updated: changed fields -> time_out', '2024-12-27 08:26:55', '2024-12-27 08:26:55'),
(64, 7, 'tbl_leaves', 32, 'created', '2024-12-27 08:27:16', '2024-12-27 08:27:16'),
(65, 7, 'tbl_leaves', 33, 'created', '2024-12-27 08:27:40', '2024-12-27 08:27:40'),
(66, 1, 'tbl_leaves', 32, 'deleted', '2024-12-27 08:27:57', '2024-12-27 08:27:57'),
(67, 7, 'tbl_leaves', 34, 'created', '2024-12-27 08:28:15', '2024-12-27 08:28:15'),
(68, 1, 'tbl_leaves', 33, 'updated: changed fields -> leave_status', '2024-12-27 08:28:39', '2024-12-27 08:28:39'),
(69, 1, 'tbl_leaves', 34, 'updated: changed fields -> leave_status', '2024-12-27 08:28:56', '2024-12-27 08:28:56'),
(70, 7, 'tbl_leaves', 35, 'created', '2024-12-27 08:29:13', '2024-12-27 08:29:13'),
(71, 1, 'tbl_payroll', 26, 'created', '2024-12-27 08:31:09', '2024-12-27 08:31:09'),
(72, NULL, 'users', 9, 'created', '2024-12-27 08:41:02', '2024-12-27 08:41:02'),
(73, 9, 'users', 9, 'created', '2024-12-27 08:41:02', '2024-12-27 08:41:02'),
(74, 7, 'tbl_leaves', 36, 'created', '2024-12-27 08:43:05', '2024-12-27 08:43:05'),
(75, NULL, 'users', 10, 'created', '2024-12-27 08:44:50', '2024-12-27 08:44:50'),
(76, 10, 'users', 10, 'created', '2024-12-27 08:44:50', '2024-12-27 08:44:50'),
(77, 10, 'tbl_employee', 13, 'created', '2024-12-27 08:50:16', '2024-12-27 08:50:16'),
(78, 10, 'tbl_employee_info', 45, 'created', '2024-12-27 08:50:16', '2024-12-27 08:50:16'),
(79, 9, 'tbl_employee', 14, 'created', '2024-12-27 08:50:35', '2024-12-27 08:50:35'),
(80, 9, 'tbl_employee_info', 46, 'created', '2024-12-27 08:50:35', '2024-12-27 08:50:35'),
(81, 1, 'tbl_certificate', 3, 'created', '2024-12-27 08:52:11', '2024-12-27 08:52:11'),
(82, 1, 'tbl_certificate', 4, 'created', '2024-12-27 08:52:53', '2024-12-27 08:52:53'),
(83, 1, 'tbl_certificate', 5, 'created', '2024-12-27 08:54:30', '2024-12-27 08:54:30'),
(84, 1, 'tbl_certificate', 6, 'created', '2024-12-27 08:54:43', '2024-12-27 08:54:43'),
(85, 1, 'tbl_education', 1, 'created', '2024-12-27 08:55:29', '2024-12-27 08:55:29'),
(86, 1, 'tbl_education', 2, 'created', '2024-12-27 08:55:53', '2024-12-27 08:55:53'),
(87, 1, 'tbl_education', 3, 'created', '2024-12-27 08:56:49', '2024-12-27 08:56:49'),
(88, 1, 'tbl_education', 4, 'created', '2024-12-27 08:57:29', '2024-12-27 08:57:29'),
(89, 1, 'tbl_skills', 1, 'created', '2024-12-27 08:57:51', '2024-12-27 08:57:51'),
(90, 1, 'tbl_skills', 2, 'created', '2024-12-27 08:58:02', '2024-12-27 08:58:02'),
(91, 1, 'tbl_skills', 3, 'created', '2024-12-27 08:58:21', '2024-12-27 08:58:21'),
(92, 1, 'languagesetup', 1, 'created', '2024-12-27 08:58:44', '2024-12-27 08:58:44'),
(93, 1, 'languagesetup', 2, 'created', '2024-12-27 08:58:55', '2024-12-27 08:58:55'),
(94, 1, 'languagesetup', 3, 'created', '2024-12-27 08:59:06', '2024-12-27 08:59:06'),
(95, 1, 'tbl_languages', 1, 'created', '2024-12-27 08:59:20', '2024-12-27 08:59:20'),
(96, 1, 'tbl_languages', 2, 'created', '2024-12-27 08:59:30', '2024-12-27 08:59:30'),
(97, 1, 'tbl_languages', 3, 'created', '2024-12-27 08:59:41', '2024-12-27 08:59:41'),
(98, 1, 'tbl_languages', 4, 'created', '2024-12-27 08:59:50', '2024-12-27 08:59:50'),
(99, 1, 'tbl_languages', 5, 'created', '2024-12-27 08:59:59', '2024-12-27 08:59:59'),
(100, 1, 'tbl_languages', 6, 'created', '2024-12-27 09:00:06', '2024-12-27 09:00:06'),
(101, 1, 'tbl_languages', 7, 'created', '2024-12-27 09:00:24', '2024-12-27 09:00:24'),
(102, 1, 'tbl_payroll', 27, 'created', '2024-12-27 09:01:31', '2024-12-27 09:01:31'),
(103, 1, 'tbl_payroll', 28, 'created', '2024-12-27 09:01:47', '2024-12-27 09:01:47'),
(104, 1, 'tbl_payroll', 29, 'created', '2024-12-27 09:02:34', '2024-12-27 09:02:34'),
(105, 1, 'tbl_payroll', 30, 'created', '2024-12-27 09:02:50', '2024-12-27 09:02:50'),
(106, 1, 'tbl_payroll', 31, 'created', '2024-12-27 09:03:02', '2024-12-27 09:03:02'),
(107, 1, 'tbl_payroll', 32, 'created', '2024-12-27 09:03:16', '2024-12-27 09:03:16'),
(108, 1, 'tbl_payroll', 33, 'created', '2024-12-27 09:03:32', '2024-12-27 09:03:32'),
(109, 10, 'users', 10, 'updated: changed fields -> email, updated_at', '2024-12-27 09:04:11', '2024-12-27 09:04:11'),
(110, 9, 'users', 9, 'updated: changed fields -> email, updated_at', '2024-12-27 09:04:32', '2024-12-27 09:04:32'),
(111, 1, 'tbl_payroll', 34, 'created', '2024-12-27 09:05:04', '2024-12-27 09:05:04'),
(112, 10, 'tbl_attendance', 13, 'created', '2024-12-27 09:11:07', '2024-12-27 09:11:07'),
(113, 10, 'tbl_attendance', 13, 'updated: changed fields -> time_out', '2024-12-27 09:11:08', '2024-12-27 09:11:08'),
(114, 9, 'tbl_attendance', 14, 'created', '2024-12-27 09:11:13', '2024-12-27 09:11:13'),
(115, 9, 'tbl_attendance', 14, 'updated: changed fields -> time_out', '2024-12-27 09:11:15', '2024-12-27 09:11:15'),
(116, 1, 'tbl_salary', 9, 'created', '2024-12-27 09:12:21', '2024-12-27 09:12:21'),
(117, 1, 'tbl_job', 21, 'created', '2024-12-27 09:12:35', '2024-12-27 09:12:35'),
(118, 1, 'tbl_employee_info', 46, 'deleted', '2024-12-27 09:12:46', '2024-12-27 09:12:46'),
(119, 1, 'tbl_employee_info', 47, 'created', '2024-12-27 09:13:00', '2024-12-27 09:13:00'),
(120, 1, 'tbl_department', 14, 'created', '2024-12-27 09:13:35', '2024-12-27 09:13:35'),
(121, 1, 'tbl_department', 14, 'updated: changed fields -> department_head', '2024-12-27 09:13:42', '2024-12-27 09:13:42'),
(122, 1, 'tbl_employee_info', 47, 'updated: changed fields -> department_id', '2024-12-27 09:14:04', '2024-12-27 09:14:04'),
(123, 1, 'tbl_performance', 18, 'created', '2024-12-27 09:21:28', '2024-12-27 09:21:28'),
(124, 1, 'tbl_performance', 19, 'created', '2024-12-27 09:22:10', '2024-12-27 09:22:10'),
(125, 10, 'tbl_leaves', 37, 'created', '2024-12-27 09:22:38', '2024-12-27 09:22:38'),
(126, 10, 'tbl_leaves', 38, 'created', '2024-12-27 09:22:50', '2024-12-27 09:22:50'),
(127, 10, 'tbl_leaves', 39, 'created', '2024-12-27 09:23:09', '2024-12-27 09:23:09'),
(128, 1, 'tbl_leaves', 40, 'created', '2024-12-27 09:52:04', '2024-12-27 09:52:04'),
(129, 1, 'tbl_department', 13, 'updated: changed fields -> department_head', '2024-12-27 09:53:07', '2024-12-27 09:53:07'),
(130, 1, 'tbl_employee', 13, 'updated: changed fields -> status', '2024-12-27 10:31:28', '2024-12-27 10:31:28'),
(131, 1, 'tbl_employee', 13, 'updated: changed fields -> status', '2024-12-27 10:32:52', '2024-12-27 10:32:52'),
(132, 9, 'tbl_leaves', 41, 'created', '2024-12-27 11:22:13', '2024-12-27 11:22:13'),
(133, 1, 'tbl_leaves', 39, 'updated: changed fields -> leave_status', '2024-12-27 11:34:17', '2024-12-27 11:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `employeeusers`
-- (See below for the actual view)
--
CREATE TABLE `employeeusers` (
`user_id` bigint(20) unsigned
,`employee_name` varchar(255)
,`employee_email` varchar(255)
,`user_role` enum('admin','manager','user')
,`employee_id` int(11)
,`first_name` varchar(255)
,`middle_name` varchar(255)
,`last_name` varchar(255)
,`image` varchar(255)
,`full_name` text
,`address_line_1` varchar(255)
,`address_line_2` varchar(255)
,`city` varchar(255)
,`state` varchar(255)
,`postal_code` varchar(255)
,`country` varchar(255)
,`full_address` text
,`contact1` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `employee_info_view`
-- (See below for the actual view)
--
CREATE TABLE `employee_info_view` (
`user_id` bigint(20) unsigned
,`employee_id` int(11)
,`full_name` text
,`full_address` text
,`employee_fname` varchar(255)
,`employee_mname` varchar(255)
,`employee_lname` varchar(255)
,`address_line_1` varchar(255)
,`address_line_2` varchar(255)
,`city` varchar(255)
,`state` varchar(255)
,`postal_code` varchar(255)
,`country` varchar(255)
,`contact1` varchar(255)
,`employee_email` varchar(255)
,`department_id` int(11)
,`department_name` varchar(50)
,`job_id` int(11)
,`job_title` varchar(50)
,`salary_id` int(11)
,`performance_id` int(11)
,`review_score` decimal(5,2)
,`review_date` date
,`reviewer_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languagesetup`
--

CREATE TABLE `languagesetup` (
  `languagesetup_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `languagesetup`
--

INSERT INTO `languagesetup` (`languagesetup_id`, `name`, `description`) VALUES
(1, 'English', 'most spoken language'),
(2, 'French', 'bonjour'),
(3, 'bisaya', 'way kurat');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(5, '0001_01_01_000000_create_users_table', 1),
(6, '0001_01_01_000001_create_cache_table', 1),
(7, '0001_01_01_000002_create_jobs_table', 1),
(8, '2024_12_19_201516_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view dashboard', 'web', '2024-12-19 12:25:51', '2024-12-19 12:25:51'),
(2, 'edit profile', 'web', '2024-12-19 12:25:51', '2024-12-19 12:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ImzZP4t7ziz6TrZAo1a3KboBw1lTaBm8UzVtrZLK', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOGhPUjhMWHJ3MldNaFFtU0lWZlllZmRpUVFmZ3NmNDVWa3BIa1VxWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYXlyb2xsL3VzZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo5O30=', 1735332127),
('t3bPeeQfqTO9RyTrxPBF01Ns5KIk5SQlw4Ty4Wog', 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia0VSQW1vWVdBdlZWd1hZWFFVVWlrZG42NzhzNHkxNEI0WWVsUTI5USI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMDt9', 1735329343),
('V3wn0EQEwFz9n2QmA5FLWwKKSn2MCvyQDinhoxcX', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWnhYR3l4UnpSWlRHdVJVOTBZN2V2MTZ1Tkdxa2REOHYxdmtCMjBlVyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1735331852);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `attendance_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `attendance_date` date NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`attendance_id`, `employee_id`, `attendance_date`, `time_in`, `time_out`) VALUES
(11, 12, '2024-12-27', '16:26:45', '16:26:47'),
(12, 11, '2024-12-27', '16:26:54', '16:26:55'),
(13, 13, '2024-12-27', '17:11:07', '17:11:08'),
(14, 14, '2024-12-27', '17:11:13', '17:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_certificate`
--

CREATE TABLE `tbl_certificate` (
  `certificate_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `certificate_name` varchar(100) DEFAULT NULL,
  `issued_by` varchar(100) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_certificate`
--

INSERT INTO `tbl_certificate` (`certificate_id`, `employee_id`, `certificate_name`, `issued_by`, `issue_date`, `expiry_date`) VALUES
(3, 14, 'Moe', 'Lester', '2024-12-28', '2025-01-11'),
(4, 13, 'Huzz', 'BrunoMinor', '2024-12-03', '2024-12-28'),
(5, 12, 'Death Cert', 'Saint Peter Life Plan', '2024-12-28', '2024-12-28'),
(6, 11, 'X', 'X', '2024-12-28', '2024-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `department_head` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`department_id`, `department_name`, `department_head`) VALUES
(13, 'Utility', 11),
(14, 'Research', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_education`
--

CREATE TABLE `tbl_education` (
  `education_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `degree` varchar(50) DEFAULT NULL,
  `field_of_study` varchar(50) DEFAULT NULL,
  `institution_name` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_education`
--

INSERT INTO `tbl_education` (`education_id`, `employee_id`, `degree`, `field_of_study`, `institution_name`, `start_date`, `end_date`) VALUES
(1, 12, 'Kinder1', 'Major in Addition', 'Phelefens', '2024-12-11', '2025-01-10'),
(2, 12, 'Kinder2', 'major in subtraction', 'Phelefens', '2025-01-04', '2025-01-11'),
(3, 13, 'Phd', 'Quantum Realm Gyatt', 'Phelefens', '2024-12-19', '2025-01-08'),
(4, 14, 'Doctorate', 'Molestia', 'Phelefens', '2024-12-25', '2024-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `employee_id` int(11) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `image` varchar(255) DEFAULT NULL,
  `employee_fname` varchar(255) NOT NULL,
  `employee_lname` varchar(255) NOT NULL,
  `employee_mname` varchar(255) DEFAULT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `contact1` varchar(255) NOT NULL,
  `employee_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`employee_id`, `birthdate`, `gender`, `user_id`, `status`, `image`, `employee_fname`, `employee_lname`, `employee_mname`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`, `contact1`, `employee_email`) VALUES
(11, '2024-12-12', 'Male', 7, 'active', 'storage/app/public/employee_images/male_icon.png', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x@x.x'),
(12, NULL, 'Male', 1, 'active', 'storage/app/public/employee_images/1735316781.png', 'Sheram', 'Rodrigues', NULL, '123 sanmigel', 'barangay kamungay', 'Manolo Fortich', 'Bukidnon', '8703', 'Philippines', '213121123123', 'admin@example.com'),
(13, '2024-12-03', 'Male', 10, 'active', 'storage/app/public/employee_images/1735318216.png', 'Lawrence', 'Heras', 'Bayo', 'PCH 2', 'Sanmigel', 'mf', 'bukidnon', '8703', 'ph', '23231123123', 'lawrence@lawrence.lawrence'),
(14, '2024-12-04', 'Female', 9, 'active', 'storage/app/public/employee_images/1735318235.png', 'lloyd', 'tejada', 'philip', 'beside munisipyo', 'kalanawan', 'manolo', 'bukidnon', '8703', 'ph', '69696969696', 'lloyd@lloyd.lloyd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_info`
--

CREATE TABLE `tbl_employee_info` (
  `department_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `performance_id` int(11) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `info_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_employee_info`
--

INSERT INTO `tbl_employee_info` (`department_id`, `job_id`, `performance_id`, `employee_id`, `info_id`) VALUES
(13, 19, NULL, 11, 43),
(13, 20, NULL, 12, 44),
(13, 20, NULL, 13, 45),
(14, 21, NULL, 14, 47);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job`
--

CREATE TABLE `tbl_job` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `job_description` text DEFAULT NULL,
  `salary_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_job`
--

INSERT INTO `tbl_job` (`job_id`, `job_title`, `job_description`, `salary_id`) VALUES
(19, 'janitor', 'cleaning', 8),
(20, 'teacher', 'teaches', 7),
(21, 'director', 'directs', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_languages`
--

CREATE TABLE `tbl_languages` (
  `language_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `proficiency_level` enum('basic','fluent','native') DEFAULT NULL,
  `languagesetup_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_languages`
--

INSERT INTO `tbl_languages` (`language_id`, `employee_id`, `proficiency_level`, `languagesetup_id`) VALUES
(1, 12, 'basic', 1),
(2, 12, 'native', 3),
(3, 13, 'native', 2),
(4, 13, 'fluent', 3),
(5, 14, 'native', 1),
(6, 14, 'basic', 2),
(7, 14, 'native', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leaves`
--

CREATE TABLE `tbl_leaves` (
  `leave_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `leave_status` varchar(20) DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_leaves`
--

INSERT INTO `tbl_leaves` (`leave_id`, `employee_id`, `start_date`, `end_date`, `leave_status`, `remarks`) VALUES
(33, 11, '2025-01-23', '2025-01-25', 'Approved', 'Funeral'),
(34, 11, '2025-01-24', '2025-01-24', 'Rejected', 'Funeral'),
(35, 11, '2024-12-26', '2024-12-28', 'Pending', 'Swimming'),
(36, 11, '2025-01-04', '2025-01-04', 'Pending', 'Eating'),
(37, 13, '2024-12-28', '2024-12-28', 'Pending', 'Swimming'),
(38, 13, '2024-12-27', '2024-12-31', 'Pending', 'Drunking'),
(39, 13, '2024-12-31', '2025-01-01', 'Rejected', 'Travel Order'),
(40, 13, '2024-12-21', '2024-12-21', 'Approved', 'birthday'),
(41, 14, '2024-12-19', '2024-12-28', 'Pending', 'Eating');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_frequency_type`
--

CREATE TABLE `tbl_payment_frequency_type` (
  `payment_frequency_id` int(11) NOT NULL,
  `payment_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_payment_frequency_type`
--

INSERT INTO `tbl_payment_frequency_type` (`payment_frequency_id`, `payment_name`) VALUES
(6, 'monthly'),
(7, 'daily');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payroll`
--

CREATE TABLE `tbl_payroll` (
  `payroll_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `payroll_status` varchar(50) NOT NULL,
  `payroll_amount` int(255) NOT NULL,
  `pay_period` date NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_payroll`
--

INSERT INTO `tbl_payroll` (`payroll_id`, `employee_id`, `payroll_status`, `payroll_amount`, `pay_period`, `payment_date`) VALUES
(26, 11, 'Pending', 800, '2025-01-09', '2025-01-09'),
(27, 12, 'Completed', 15000, '2025-01-04', '2025-01-04'),
(28, 12, 'Pending', 15000, '2025-01-11', '2025-01-11'),
(29, 12, 'Cancelled', 15000, '2024-12-28', '2024-12-28'),
(30, 13, 'Pending', 15000, '2024-12-28', '2024-12-28'),
(31, 13, 'Completed', 15000, '2024-12-25', '2024-12-17'),
(32, 13, 'Pending', 15000, '2024-12-27', '2024-12-27'),
(33, 14, 'Completed', 15000, '2024-12-30', '2024-12-10'),
(34, 14, 'Completed', 15000, '2024-12-29', '2025-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_performance`
--

CREATE TABLE `tbl_performance` (
  `performance_id` int(11) NOT NULL,
  `total_days_present` int(11) NOT NULL,
  `total_days_absent` int(11) NOT NULL,
  `leave_days_taken` int(11) NOT NULL,
  `review_date` date NOT NULL,
  `review_score` decimal(5,2) DEFAULT NULL,
  `reviewer_id` int(11) DEFAULT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_performance`
--

INSERT INTO `tbl_performance` (`performance_id`, `total_days_present`, `total_days_absent`, `leave_days_taken`, `review_date`, `review_score`, `reviewer_id`, `employee_id`) VALUES
(18, 25, 1, 5, '2024-12-28', 5.00, 12, 13),
(19, 3, 10, 151, '2024-12-28', 2.00, 12, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salary`
--

CREATE TABLE `tbl_salary` (
  `salary_id` int(11) NOT NULL,
  `salary_grade` varchar(20) DEFAULT NULL,
  `salary_amount` decimal(10,2) NOT NULL,
  `payment_frequency_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_salary`
--

INSERT INTO `tbl_salary` (`salary_id`, `salary_grade`, `salary_amount`, `payment_frequency_id`) VALUES
(7, '1', 15000.00, 6),
(8, '2', 800.00, 7),
(9, '3', 30000.00, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skills`
--

CREATE TABLE `tbl_skills` (
  `skill_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `skill_name` varchar(50) DEFAULT NULL,
  `proficiency_level` enum('beginner','intermediate','advanced','expert') DEFAULT NULL,
  `last_used_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_skills`
--

INSERT INTO `tbl_skills` (`skill_id`, `employee_id`, `skill_name`, `proficiency_level`, `last_used_date`) VALUES
(1, 12, 'scanner', 'expert', NULL),
(2, 13, 'rater', 'expert', NULL),
(3, 14, 'touching', 'advanced', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','manager','user') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@example.com', 'admin', NULL, '$2y$12$PDvosjrThuI0QiDMX2woieefCKEffA1957weGC.Jwb75VX2YZxBAa', NULL, NULL, NULL),
(7, 'x', 'x@x.x', 'user', NULL, '$2y$12$iOnl280XWdh/FLROYSbm1OL2d1Zd75icggTtQ9TrwYP7ppoOeKEn2', NULL, '2024-12-27 08:04:34', '2024-12-27 08:04:34'),
(8, 'Lawrence', 'law@l.l', 'user', NULL, '$2y$12$3d1rDOaDSlMINF/P3LRz0.tN5jvJ0.JDl/jz3Ls8cIa6nxppV/wxm', NULL, '2024-12-27 08:32:49', '2024-12-27 08:32:49'),
(9, 'Lloyd', 'lloyd@test.com', 'user', NULL, '$2y$12$t.oJKRjwiRErxTCY9Wkv8OXGI5wDxSRwbzhXgA4W1m3Nyb.msw4tu', NULL, '2024-12-27 08:41:02', '2024-12-27 09:04:32'),
(10, 'lawrence', 'lawrence@test.com', 'user', NULL, '$2y$12$EoYDKp8iXukq4awq/PWfc.qgcaXgtrsiIb0fhOSrjksXqIvEqRxjG', NULL, '2024-12-27 08:44:50', '2024-12-27 09:04:11');

-- --------------------------------------------------------

--
-- Structure for view `employeeusers`
--
DROP TABLE IF EXISTS `employeeusers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employeeusers`  AS SELECT `u`.`id` AS `user_id`, `u`.`name` AS `employee_name`, `u`.`email` AS `employee_email`, `u`.`role` AS `user_role`, `e`.`employee_id` AS `employee_id`, `e`.`employee_fname` AS `first_name`, `e`.`employee_mname` AS `middle_name`, `e`.`employee_lname` AS `last_name`, `e`.`image` AS `image`, concat(coalesce(`e`.`employee_fname`,''),' ',coalesce(`e`.`employee_mname`,''),' ',coalesce(`e`.`employee_lname`,'')) AS `full_name`, `e`.`address_line_1` AS `address_line_1`, `e`.`address_line_2` AS `address_line_2`, `e`.`city` AS `city`, `e`.`state` AS `state`, `e`.`postal_code` AS `postal_code`, `e`.`country` AS `country`, concat(coalesce(`e`.`address_line_1`,''),' ',coalesce(`e`.`address_line_2`,''),' ',coalesce(`e`.`city`,''),' ',coalesce(`e`.`state`,''),' ',coalesce(`e`.`postal_code`,''),' ',coalesce(`e`.`country`,'')) AS `full_address`, `e`.`contact1` AS `contact1` FROM (`users` `u` join `tbl_employee` `e` on(`u`.`id` = `e`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `employee_info_view`
--
DROP TABLE IF EXISTS `employee_info_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employee_info_view`  AS SELECT `e`.`user_id` AS `user_id`, `e`.`employee_id` AS `employee_id`, concat(coalesce(`e`.`employee_fname`,''),' ',coalesce(`e`.`employee_mname`,''),' ',coalesce(`e`.`employee_lname`,'')) AS `full_name`, concat(coalesce(`e`.`address_line_1`,''),' ',coalesce(`e`.`address_line_2`,''),' ',coalesce(`e`.`city`,''),' ',coalesce(`e`.`state`,''),' ',coalesce(`e`.`postal_code`,''),' ',coalesce(`e`.`country`,'')) AS `full_address`, `e`.`employee_fname` AS `employee_fname`, `e`.`employee_mname` AS `employee_mname`, `e`.`employee_lname` AS `employee_lname`, `e`.`address_line_1` AS `address_line_1`, `e`.`address_line_2` AS `address_line_2`, `e`.`city` AS `city`, `e`.`state` AS `state`, `e`.`postal_code` AS `postal_code`, `e`.`country` AS `country`, `e`.`contact1` AS `contact1`, `e`.`employee_email` AS `employee_email`, `d`.`department_id` AS `department_id`, `d`.`department_name` AS `department_name`, `j`.`job_id` AS `job_id`, `j`.`job_title` AS `job_title`, `j`.`salary_id` AS `salary_id`, `p`.`performance_id` AS `performance_id`, `p`.`review_score` AS `review_score`, `p`.`review_date` AS `review_date`, `p`.`reviewer_id` AS `reviewer_id` FROM ((((`tbl_employee_info` `ei` left join `tbl_employee` `e` on(`ei`.`employee_id` = `e`.`employee_id`)) left join `tbl_department` `d` on(`ei`.`department_id` = `d`.`department_id`)) left join `tbl_job` `j` on(`ei`.`job_id` = `j`.`job_id`)) left join `tbl_performance` `p` on(`ei`.`performance_id` = `p`.`performance_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languagesetup`
--
ALTER TABLE `languagesetup`
  ADD PRIMARY KEY (`languagesetup_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `user_id_employee_attendance` (`employee_id`);

--
-- Indexes for table `tbl_certificate`
--
ALTER TABLE `tbl_certificate`
  ADD PRIMARY KEY (`certificate_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`department_id`) USING BTREE,
  ADD KEY `department_head_employee` (`department_head`);

--
-- Indexes for table `tbl_education`
--
ALTER TABLE `tbl_education`
  ADD PRIMARY KEY (`education_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_employee_info`
--
ALTER TABLE `tbl_employee_info`
  ADD PRIMARY KEY (`info_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `performance_id` (`performance_id`),
  ADD KEY `employee_info_id` (`employee_id`);

--
-- Indexes for table `tbl_job`
--
ALTER TABLE `tbl_job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `salary_id` (`salary_id`);

--
-- Indexes for table `tbl_languages`
--
ALTER TABLE `tbl_languages`
  ADD PRIMARY KEY (`language_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `fk_languages_languagesetup` (`languagesetup_id`);

--
-- Indexes for table `tbl_leaves`
--
ALTER TABLE `tbl_leaves`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `user_id_employee_leaves` (`employee_id`);

--
-- Indexes for table `tbl_payment_frequency_type`
--
ALTER TABLE `tbl_payment_frequency_type`
  ADD PRIMARY KEY (`payment_frequency_id`);

--
-- Indexes for table `tbl_payroll`
--
ALTER TABLE `tbl_payroll`
  ADD PRIMARY KEY (`payroll_id`),
  ADD KEY `employee_payroll` (`employee_id`);

--
-- Indexes for table `tbl_performance`
--
ALTER TABLE `tbl_performance`
  ADD PRIMARY KEY (`performance_id`),
  ADD KEY `reviewer_employee_id` (`reviewer_id`),
  ADD KEY `reviewed_employee_id` (`employee_id`);

--
-- Indexes for table `tbl_salary`
--
ALTER TABLE `tbl_salary`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `payment_frequency_id_salary` (`payment_frequency_id`);

--
-- Indexes for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  ADD PRIMARY KEY (`skill_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languagesetup`
--
ALTER TABLE `languagesetup`
  MODIFY `languagesetup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_certificate`
--
ALTER TABLE `tbl_certificate`
  MODIFY `certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_education`
--
ALTER TABLE `tbl_education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_employee_info`
--
ALTER TABLE `tbl_employee_info`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_job`
--
ALTER TABLE `tbl_job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_languages`
--
ALTER TABLE `tbl_languages`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_leaves`
--
ALTER TABLE `tbl_leaves`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_payment_frequency_type`
--
ALTER TABLE `tbl_payment_frequency_type`
  MODIFY `payment_frequency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_payroll`
--
ALTER TABLE `tbl_payroll`
  MODIFY `payroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_performance`
--
ALTER TABLE `tbl_performance`
  MODIFY `performance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_salary`
--
ALTER TABLE `tbl_salary`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD CONSTRAINT `attendance_employee` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_certificate`
--
ALTER TABLE `tbl_certificate`
  ADD CONSTRAINT `tbl_certificate_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD CONSTRAINT `department_head_employee` FOREIGN KEY (`department_head`) REFERENCES `tbl_employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_education`
--
ALTER TABLE `tbl_education`
  ADD CONSTRAINT `tbl_education_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_employee_info`
--
ALTER TABLE `tbl_employee_info`
  ADD CONSTRAINT `employee_info_id` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `performance_employee_info` FOREIGN KEY (`performance_id`) REFERENCES `tbl_performance` (`performance_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_employee_info_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `tbl_department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_employee_info_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `tbl_job` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_job`
--
ALTER TABLE `tbl_job`
  ADD CONSTRAINT `tbl_job_ibfk_1` FOREIGN KEY (`salary_id`) REFERENCES `tbl_salary` (`salary_id`) ON DELETE SET NULL;

--
-- Constraints for table `tbl_languages`
--
ALTER TABLE `tbl_languages`
  ADD CONSTRAINT `fk_languages_languagesetup` FOREIGN KEY (`languagesetup_id`) REFERENCES `languagesetup` (`languagesetup_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_languages_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_leaves`
--
ALTER TABLE `tbl_leaves`
  ADD CONSTRAINT `user_id_employee_leaves` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_payroll`
--
ALTER TABLE `tbl_payroll`
  ADD CONSTRAINT `employee_payroll` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_performance`
--
ALTER TABLE `tbl_performance`
  ADD CONSTRAINT `reviewer_employee_id` FOREIGN KEY (`reviewer_id`) REFERENCES `tbl_employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  ADD CONSTRAINT `tbl_skills_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
