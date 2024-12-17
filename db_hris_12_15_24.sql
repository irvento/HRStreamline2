-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 11:17 AM
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
,`full_name` text
,`address_line_1` varchar(255)
,`address_line_2` varchar(255)
,`city` varchar(255)
,`state` varchar(255)
,`postal_code` varchar(255)
,`country` varchar(255)
,`full_address` text
,`contact1` varchar(255)
,`contact2` varchar(255)
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
(3, '0001_01_01_000002_create_jobs_table', 1);

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
('1zu7jYedw5Axmn7kDHZkrXAVuX3r2LoNcMpDSVzl', 8, '192.168.1.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 OPR/114.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOFl0MXJQVzVYMXd6alNBc2U2YnBtOTdBWDFMTWZtdGVyazl4UTJmVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xOTIuMTY4LjEuMjo1MDAwL2VtcGxveWVlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6ODt9', 1734245866),
('76aBf5vCLQRhjpF3K35zSEi2EEk3ahdCIbCelPuY', 9, '192.168.1.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZ2RRSllxcnQwWElkV0h6YjVDV2J1UlF0RUY2NXc5UWFnWjV0WTNIdCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xOTIuMTY4LjEuMjo1MDAwL3Byb2ZpbGUiO31zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTt9', 1734257820),
('7BWLcuA1bpBVl7XNI1vjBbvZnUW8JpJoDDyaZKdm', 8, '192.168.1.15', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZ0lUTGFPV3M3TndtSElJTk5sRHdncnhIb0VHTW8zN1k0NDdrQXQ2ViI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vMTkyLjE2OC4xLjI6NTAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo4O30=', 1734254236),
('7j5UMO2cioEIz41os6VyjO9rQJSD8JMkkCH0Fwm6', 9, '192.168.1.15', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidWdtVzd4eHJZTlRvN0RYWWM1N3pvRVAyM0NMNHJxcjhCakM2Z3dyZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xOTIuMTY4LjEuMjo1MDAwL2VtcGxveWVlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTt9', 1734246393),
('olvtviqoaohmkZcMfcCg7aETu5Q8JdVU3epunbR7', 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOFpiczFYbDViWlg5TjRxZG9VT3N2WUx3MDZOVXdHZGtmajJ2dUdHUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjg7fQ==', 1734244615),
('VNJg6Osol4CCaCdFUIzcSsAPTyeWNXSK6CEbPCJe', 8, '192.168.1.53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiT0did3VKTlBROTdJaFk5TmQ5dlVWWG9kNUF0dXdKVHdiaEFpRGJoMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xOTIuMTY4LjEuMjo1MDAwL3Byb2ZpbGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6ODt9', 1734254025),
('zN151r7JBslUfsAuujyLVpvFoJdFrZMPg50RrSFU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU2NKU3NGRDZoeVRZc0hwSHFFZFdhREdTbXF2MDkzbmlRemcxRGNIdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO319', 1734253790);

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`department_id`, `department_name`) VALUES
(1, 'IT department'),
(2, 'TEP'),
(3, 'bsba');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `employee_id` int(11) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` longblob DEFAULT NULL,
  `employee_fname` varchar(255) NOT NULL,
  `employee_lname` varchar(255) NOT NULL,
  `employee_mname` varchar(255) NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `contact1` varchar(255) NOT NULL,
  `contact2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`employee_id`, `birthdate`, `gender`, `user_id`, `image`, `employee_fname`, `employee_lname`, `employee_mname`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`, `contact1`, `contact2`) VALUES
(8, NULL, NULL, 8, NULL, 'irventheadmin', 'renso', 'cat', 'paw', 'patrol', 'gotham', 'dedin', '123', 'ph', '1123 4567 456', '121113 1232'),
(9, NULL, NULL, 9, NULL, 'irventhemanager', 'paw', 'patrol', 'renso', 'cat', 'of', 'the', ' dog ', 'and ', 'kittens', 'that'),
(10, NULL, NULL, 10, NULL, 'irventheuser', 'irventheuser', 'irventheuser', 'tankulan', 'kihari', 'manolko', 'golden state', '456546', 'ph', '123123123', '123123123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_info`
--

CREATE TABLE `tbl_employee_info` (
  `department_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `performance_id` int(11) DEFAULT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hourly_rate`
--

CREATE TABLE `tbl_hourly_rate` (
  `hourly_rate_id` int(11) NOT NULL,
  `salary_id` int(11) DEFAULT NULL,
  `hourly_rate` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_frequency_type`
--

CREATE TABLE `tbl_payment_frequency_type` (
  `payment_frequency_id` int(11) NOT NULL,
  `payment_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `reviewer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(8, 'admin', 'admin@example.com', 'admin', NULL, '$2y$12$.yxACy.xWtd/N1lqmxrkD.U2LlppDSF98x.E96W7GArGNWSijr.Ia', NULL, '2024-12-14 06:58:00', '2024-12-14 06:58:00'),
(9, 'manager', 'manager@example.com', 'manager', NULL, '$2y$12$NKsW2jx9bLE95RvJkp/wB.uz.93OwDbPZslCWYP3hU1EQTcD16nuO', NULL, '2024-12-14 06:58:50', '2024-12-14 06:58:50'),
(10, 'user1', 'user1@example.com', 'user', NULL, '$2y$12$z85ICD45qdPfMC4AfDBi3.puvfImqOnsRdtY3vwapmqvQyNDXMli6', NULL, '2024-12-14 23:49:16', '2024-12-14 23:49:16');

-- --------------------------------------------------------

--
-- Structure for view `employeeusers`
--
DROP TABLE IF EXISTS `employeeusers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employeeusers`  AS SELECT `u`.`id` AS `user_id`, `u`.`name` AS `employee_name`, `u`.`email` AS `employee_email`, `u`.`role` AS `user_role`, `e`.`employee_id` AS `employee_id`, `e`.`employee_fname` AS `first_name`, `e`.`employee_mname` AS `middle_name`, `e`.`employee_lname` AS `last_name`, concat(`e`.`employee_fname`,' ',`e`.`employee_mname`,' ',`e`.`employee_lname`) AS `full_name`, `e`.`address_line_1` AS `address_line_1`, `e`.`address_line_2` AS `address_line_2`, `e`.`city` AS `city`, `e`.`state` AS `state`, `e`.`postal_code` AS `postal_code`, `e`.`country` AS `country`, concat(`e`.`address_line_1`,' ',`e`.`address_line_2`,' ',`e`.`city`,' ',`e`.`state`,' ',`e`.`postal_code`,' ',`e`.`country`) AS `full_address`, `e`.`contact1` AS `contact1`, `e`.`contact2` AS `contact2` FROM (`users` `u` join `tbl_employee` `e` on(`u`.`id` = `e`.`user_id`)) ;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`department_id`);

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
  ADD KEY `department_id` (`department_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `performance_id` (`performance_id`),
  ADD KEY `employee_info_id` (`employee_id`);

--
-- Indexes for table `tbl_hourly_rate`
--
ALTER TABLE `tbl_hourly_rate`
  ADD PRIMARY KEY (`hourly_rate_id`),
  ADD KEY `salary_id` (`salary_id`);

--
-- Indexes for table `tbl_job`
--
ALTER TABLE `tbl_job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `salary_id` (`salary_id`);

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
-- Indexes for table `tbl_performance`
--
ALTER TABLE `tbl_performance`
  ADD PRIMARY KEY (`performance_id`),
  ADD KEY `reviewer_employee_id` (`reviewer_id`);

--
-- Indexes for table `tbl_salary`
--
ALTER TABLE `tbl_salary`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `payment_frequency_id_salary` (`payment_frequency_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_hourly_rate`
--
ALTER TABLE `tbl_hourly_rate`
  MODIFY `hourly_rate_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_payment_frequency_type`
--
ALTER TABLE `tbl_payment_frequency_type`
  MODIFY `payment_frequency_id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `user_id_employee_attendance` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`employee_id`);

--
-- Constraints for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD CONSTRAINT `user_id_employee` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_employee_info`
--
ALTER TABLE `tbl_employee_info`
  ADD CONSTRAINT `employee_info_id` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`employee_id`),
  ADD CONSTRAINT `tbl_employee_info_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `tbl_department` (`department_id`),
  ADD CONSTRAINT `tbl_employee_info_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `tbl_job` (`job_id`);

--
-- Constraints for table `tbl_hourly_rate`
--
ALTER TABLE `tbl_hourly_rate`
  ADD CONSTRAINT `tbl_hourly_rate_ibfk_1` FOREIGN KEY (`salary_id`) REFERENCES `tbl_salary` (`salary_id`);

--
-- Constraints for table `tbl_job`
--
ALTER TABLE `tbl_job`
  ADD CONSTRAINT `tbl_job_ibfk_1` FOREIGN KEY (`salary_id`) REFERENCES `tbl_salary` (`salary_id`);

--
-- Constraints for table `tbl_leaves`
--
ALTER TABLE `tbl_leaves`
  ADD CONSTRAINT `user_id_employee_leaves` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employee` (`employee_id`);

--
-- Constraints for table `tbl_performance`
--
ALTER TABLE `tbl_performance`
  ADD CONSTRAINT `performance_employee_info` FOREIGN KEY (`performance_id`) REFERENCES `tbl_employee_info` (`performance_id`),
  ADD CONSTRAINT `reviewer_employee_id` FOREIGN KEY (`reviewer_id`) REFERENCES `tbl_employee` (`employee_id`);

--
-- Constraints for table `tbl_salary`
--
ALTER TABLE `tbl_salary`
  ADD CONSTRAINT `payment_frequency_id_salary` FOREIGN KEY (`payment_frequency_id`) REFERENCES `tbl_payment_frequency_type` (`payment_frequency_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
