-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 01:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,
  `date` date DEFAULT NULL,
  `startTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL,
  `status` enum('pending','done') NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `date`, `startTime`, `endTime`, `status`, `patient_id`, `doctor_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, '2023-04-05', '08:00:00', '09:00:00', 'pending', 3, 2, '2023-04-01 20:35:01', '2023-04-01 20:41:39', '2023-04-01 20:41:39'),
(6, '2023-04-05', '09:00:00', '10:00:00', 'pending', 3, 2, '2023-04-01 20:35:26', '2023-04-01 20:35:26', NULL),
(7, '2023-04-02', '09:00:00', '10:00:00', 'pending', 3, 2, '2023-04-01 20:41:27', '2023-04-01 20:41:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL ,
  `concerns` text DEFAULT NULL,
  `symptoms` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `patient_id`, `appointment_id`, `concerns`, `symptoms`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 3, 5, NULL, NULL, '2023-04-01 20:35:01', '2023-04-01 20:35:01', NULL),
(6, 3, 6, NULL, NULL, '2023-04-01 20:35:26', '2023-04-01 20:35:26', NULL),
(7, 3, 7, NULL, NULL, '2023-04-01 20:41:27', '2023-04-01 20:41:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diagnose`
--

CREATE TABLE `diagnose` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `diagnosis` text DEFAULT NULL,
  `prescription` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnose`
--

INSERT INTO `diagnose` (`id`, `doctor_id`, `appointment_id`, `diagnosis`, `prescription`, `created_at`, `updated_at`) VALUES
(5, 2, 5, NULL, NULL, '2023-04-01 20:35:01', '2023-04-01 20:35:01'),
(6, 2, 6, NULL, NULL, '2023-04-01 20:35:26', '2023-04-01 20:35:26'),
(7, 2, 7, NULL, NULL, '2023-04-01 20:41:27', '2023-04-01 20:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedules`
--

CREATE TABLE `doctor_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_schedules`
--

INSERT INTO `doctor_schedules` (`id`, `doctor_id`, `schedule_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 3, '2023-04-01 14:14:23', '2023-04-01 15:22:05', '2023-04-01 15:22:05'),
(2, 2, 6, '2023-04-01 14:14:23', '2023-04-01 14:14:23', NULL),
(3, 2, 2, '2023-04-01 15:36:32', '2023-04-01 15:36:32', NULL),
(4, 2, 7, '2023-04-01 15:36:32', '2023-04-01 15:36:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallaries`
--

CREATE TABLE `gallaries` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,,
  `name` varchar(255) DEFAULT NULL,
  `imageable_type` varchar(255) NOT NULL,
  `imageable_id` bigint(20) UNSIGNED NOT NULL,
  `use_for` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallaries`
--

INSERT INTO `gallaries` (`id`, `name`, `imageable_type`, `imageable_id`, `use_for`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'picture_1.png', 'App\\Models\\User', 1, 'picture', '2023-03-31 22:26:17', '2023-03-31 22:26:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL ,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(2, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(3, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(4, '2016_06_01_000004_create_oauth_clients_table', 1),
(5, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_01_31_135508_create_gallaries_table', 1),
(8, '2023_4_1_000000_create_failed_jobs_table', 1),
(9, '2023_4_1_000002_create_users_table', 1),
(11, '2023_4_1_093433_create_privilege_role_table', 1),
(12, '2023_4_1_100000_create_password_resets_table', 1),
(13, '2023_4_1_101426_create_roles_table', 1),
(14, '2023_4_1_125521_create_verifications_table', 1),
(15, '2023_4_1_133913_create_contacts_table', 1),
(16, '2023_4_1_134313_create_doctor_schedules_table', 1),
(17, '2023_4_1_154908_create_privileges_table', 1),
(18, '2023_4_1_182722_create_medical_histories_table', 1),
(19, '2023_4_1_200443_create_appointments_table', 1),
(20, '2023_4_1_201037_create_diagnose_table', 1),
(21, '2023_4_1_201105_create_complaint_table', 1),
(22, '2024_4_1_092902_create_specializations_table', 1),
(41, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(42, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(43, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(44, '2016_06_01_000004_create_oauth_clients_table', 1),
(45, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(46, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(47, '2023_4_1_000000_create_failed_jobs_table', 1),
(50, '2023_4_1_093433_create_privilege_role_table', 1),
(51, '2023_4_1_100000_create_password_resets_table', 1),
(52, '2023_4_1_101426_create_roles_table', 1),
(53, '2023_4_1_125521_create_verifications_table', 1),
(54, '2023_4_1_133913_create_contacts_table', 1),
(55, '2023_4_1_134313_create_doctor_schedule_table', 1),
(56, '2023_4_1_154908_create_privileges_table', 1),
(57, '2023_4_1_182722_create_medical_histories_table', 1),
(58, '2023_4_1_200443_create_appointments_table', 1),
(59, '2023_4_1_201037_create_diagnose_table', 1),
(61, '2023_01_31_135508_create_gallaries_table', 2),
(62, '2024_4_1_092902_create_specializations_table', 3),
(66, '2023_4_1_000002_create_users_table', 5),
(68, '2023_4_1_134313_create_doctor_schedules_table', 6),
(69, '2023_4_1_201105_create_complaint_table', 7),
(70, '2023_4_1_091339_create_schedules_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `phone` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`phone`, `token`, `created_at`, `updated_at`) VALUES
('100123213', '$2y$10$VO75DXC6nGay9M.D2QpZ6eUxKN6a4JbZOWe866QCc4REL.DHvb6Ca', '2023-04-01 13:15:09', '2023-04-01 13:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,,
  `name` varchar(255) DEFAULT NULL,
  `constant` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `name`, `constant`, `parent_id`, `created_at`, `updated_at`) VALUES
(4, 'view package', 'VIEW_PACKAGE', NULL, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(5, 'upsert package', 'UPSERT_PACKAGE', 4, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(6, 'delete package', 'DELETE_PACKAGE', 4, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(7, 'view preprator', 'VIEW_PREPRATOR', NULL, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(8, 'upsert preprator', 'UPSERT_PREPRATOR', 7, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(9, 'delete preprator', 'DELETE_PREPRATOR', 7, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(10, 'view teacher', 'VIEW_TEACHER', NULL, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(11, 'view syllabus', 'VIEW_SYLLABUS', NULL, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(12, 'upsert syllabus', 'UPSERT_SYLLABUS', 11, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(13, 'delete syllabus', 'DELETE_SYLLABUS', 11, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(14, 'view semster', 'VIEW_SEMSTER', NULL, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(15, 'upsert semster', 'UPSERT_SEMSTER', 14, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(16, 'delete semster', 'DELETE_SEMSTER', 14, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(17, 'view grade', 'VIEW_GRADE', NULL, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(18, 'upsert grade', 'UPSERT_GRADE', 17, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(19, 'delete grade', 'DELETE_GRADE', 17, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(20, 'view subject', 'VIEW_SUBJECT', NULL, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(21, 'upsert subject', 'UPSERT_SUBJECT', 20, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(22, 'delete subject', 'DELETE_SUBJECT', 20, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(23, 'view prepration', 'VIEW_PREPRATION', NULL, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(24, 'upsert prepration', 'UPSERT_PREPRATION', 23, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(25, 'delete prepration', 'DELETE_PREPRATION', 23, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(26, 'view log', 'VIEW_LOG', NULL, '2023-03-31 22:18:50', '2023-03-31 22:18:50'),
(27, 'view widget', 'VIEW_WIDGET', NULL, '2023-03-31 22:18:50', '2023-03-31 22:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `privilege_role`
--

CREATE TABLE `privilege_role` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,,
  `privilege_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,,
  `name` varchar(255) DEFAULT NULL,
  `all_privileges` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `all_privileges`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'superadmin', NULL, '2023-03-31 22:18:49', '2023-03-31 22:18:49', NULL),
(2, 'user', NULL, '2023-03-31 22:18:49', '2023-03-31 22:18:49', NULL),
(3, 'patient', NULL, '2023-04-01 12:31:05', '2023-04-01 12:31:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,,
  `startTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL,
  `breakTime` time DEFAULT NULL,
  `day` enum('الاثنين','الثلاثاء','الأربعاء','الخميس','الجمعه','السبت','الأحد') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `startTime`, `endTime`, `breakTime`, `day`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '12:00:00', '21:00:00', '16:00:00', 'الاثنين', '2023-04-22 22:27:17', '2023-04-10 22:27:17', NULL),
(2, '12:00:00', '21:00:00', '16:00:00', 'الثلاثاء', '2023-04-22 22:27:17', '2023-04-10 22:27:17', NULL),
(3, '12:00:00', '21:00:00', '16:00:00', 'الأربعاء', '2023-04-22 22:27:17', '2023-04-10 22:27:17', NULL),
(4, '12:00:00', '21:00:00', '16:00:00', 'الخميس', '2023-04-22 22:27:17', '2023-04-10 22:27:17', NULL),
(5, '12:00:00', '21:00:00', '16:00:00', 'الجمعه', '2023-04-22 22:27:17', '2023-04-10 22:27:17', NULL),
(6, '12:00:00', '21:00:00', '16:00:00', 'السبت', '2023-04-22 22:27:17', '2023-04-10 22:27:17', NULL),
(7, '12:00:00', '21:00:00', '16:00:00', 'الأحد', '2023-04-22 22:27:17', '2023-04-10 22:27:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

CREATE TABLE `specializations` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'General practice', '2023-03-31 23:03:29', '2023-04-01 17:46:33', NULL),
(2, 'Pediatrics', '2023-03-31 23:03:48', '2023-03-31 23:03:48', NULL),
(3, 'Radiology', '2023-03-31 23:03:59', '2023-03-31 23:03:59', NULL),
(4, 'Ophthalmology', '2023-03-31 23:04:08', '2023-04-01 21:12:19', NULL),
(5, 'Sports medicine and rehabilitation', '2023-03-31 23:04:21', '2023-03-31 23:04:21', NULL),
(6, 'Oncology', '2023-03-31 23:04:33', '2023-03-31 23:04:33', NULL),
(7, 'Dermatology', '2023-03-31 23:04:42', '2023-03-31 23:04:42', NULL),
(8, 'Emergency Medicine', '2023-03-31 23:04:54', '2023-03-31 23:04:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `country_code` int(11) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mobile_no_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `speciality_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `country_code`, `phone`, `mobile_no_verified_at`, `password`, `role_id`, `speciality_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mohamed Abdelhafez', 'alimomo226@gmail.com', 20, '1026036513', NULL, '$2y$10$gWHx4kKURk/PX0QWeZFeg.gkPWPt/Tj1vW0Gm2U7EXz67vG/3PW.6', 1, NULL, '2023-04-01 13:01:31', '2023-04-01 13:01:31', NULL),
(2, 'mahmoud', 'mahmoud@gmail.com', 20, '100123213', NULL, '$2y$10$1EUukIIGjkiM4sbJw6dVCep4nq5dFkDWNfkfeB5gfujXufpMAVgti', 2, 4, '2023-04-01 13:15:09', '2023-04-01 13:20:20', NULL),
(3, 'ahmed', 'ahmed@gmail.com', 20, '100123214', NULL, '$2y$10$1EUukIIGjkiM4sbJw6dVCep4nq5dFkDWNfkfeB5gfujXufpMAVgti', 3, NULL, '2023-04-17 13:15:09', '2023-04-17 13:20:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `verifications`
--

CREATE TABLE `verifications` (
  `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,,
  `phone` varchar(255) DEFAULT NULL,
  `verification_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verifications`
--

INSERT INTO `verifications` (`id`, `phone`, `verification_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '+201026036513', '$2y$10$ij.MbfsDgCiDiwC4QMHXdOSSGaTOLCgAstfDTYbQT3Z2K5LD8cndm', '2023-03-31 21:58:14', '2023-04-01 13:01:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnose`
--
ALTER TABLE `diagnose`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnose_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gallaries`
--
ALTER TABLE `gallaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallaries_imageable_type_imageable_id_index` (`imageable_type`,`imageable_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_phone_index` (`phone`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privilege_role`
--
ALTER TABLE `privilege_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verifications`
--
ALTER TABLE `verifications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diagnose`
--
ALTER TABLE `diagnose`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallaries`
--
ALTER TABLE `gallaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `privilege_role`
--
ALTER TABLE `privilege_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `verifications`
--
ALTER TABLE `verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diagnose`
--
ALTER TABLE `diagnose`
  ADD CONSTRAINT `diagnose_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
