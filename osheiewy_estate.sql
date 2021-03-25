-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2021 at 01:53 PM
-- Server version: 10.3.27-MariaDB-log-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osheiewy_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_reactivates`
--

CREATE TABLE `account_reactivates` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_time` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `is_active`, `image`, `role`, `login_time`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Geek', 'fiifipius@gmail.com', '$2y$10$C5fgKPH/HSQ79J4wiybGVOgILhRN2cCpeyMXn5VFCxiw.leAIVZki', 1, NULL, 'admin', '2021-03-08 22:46:07', 'uGyTi4HNJTZShSRwFcdjGtK9BmeyVsO3b7xAguoT7Xsg9XBlY7GIR8OjGWzJ', NULL, '2021-03-09 03:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `admin_activities`
--

CREATE TABLE `admin_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_activities`
--

INSERT INTO `admin_activities` (`id`, `admin_id`, `action`, `created_at`, `updated_at`) VALUES
(1, 1, 'Room was added', '2020-10-15 11:48:18', '2020-10-15 11:48:18'),
(2, 1, 'Apartment was added', '2020-10-15 12:01:44', '2020-10-15 12:01:44'),
(3, 1, 'Store was added', '2020-10-15 12:02:12', '2020-10-15 12:02:12'),
(4, 1, 'Hostel was added', '2020-10-15 12:03:53', '2020-10-15 12:03:53'),
(5, 1, 'Apartment was changed to private', '2020-10-15 12:20:11', '2020-10-15 12:20:11'),
(6, 1, 'Hostel was changed to private', '2020-10-15 12:20:14', '2020-10-15 12:20:14'),
(7, 1, 'Room was changed to private', '2020-10-15 12:20:18', '2020-10-15 12:20:18'),
(8, 1, 'Store was changed to private', '2020-10-15 12:20:22', '2020-10-15 12:20:22'),
(9, 1, 'fiifijava@gmail.com user account added', '2020-11-02 15:41:01', '2020-11-02 15:41:01'),
(10, 1, 'fiifijava@gmail.com account was blocked', '2020-11-02 15:42:38', '2020-11-02 15:42:38'),
(11, 1, 'fiifijava@gmail.com account was unblocked', '2020-11-02 15:42:55', '2020-11-02 15:42:55'),
(12, 1, 'fiifijava@gmail.com was deleted', '2020-11-02 15:43:24', '2020-11-02 15:43:24'),
(13, 1, 'Apartment was changed to private', '2020-11-27 16:09:59', '2020-11-27 16:09:59'),
(14, 1, 'Hostel was changed to private', '2020-11-27 16:10:04', '2020-11-27 16:10:04'),
(15, 1, 'Room was changed to private', '2020-11-27 16:10:10', '2020-11-27 16:10:10'),
(16, 1, 'Store was changed to private', '2020-11-27 16:10:15', '2020-11-27 16:10:15'),
(17, 1, 'Store was changed to public', '2020-11-27 16:30:03', '2020-11-27 16:30:03'),
(18, 1, 'Room was changed to public', '2020-11-27 16:30:07', '2020-11-27 16:30:07'),
(19, 1, 'Hostel was changed to public', '2020-11-27 16:30:10', '2020-11-27 16:30:10'),
(20, 1, 'Apartment was changed to public', '2020-11-27 16:30:15', '2020-11-27 16:30:15'),
(21, 1, 'Room was changed to private', '2020-11-27 16:30:21', '2020-11-27 16:30:21'),
(22, 1, 'Room was changed to public', '2020-11-27 16:30:34', '2020-11-27 16:30:34'),
(23, 1, 'Room was changed to private', '2020-11-27 16:30:40', '2020-11-27 16:30:40'),
(24, 1, 'Apartment was changed to private', '2020-11-27 16:31:30', '2020-11-27 16:31:30'),
(25, 1, 'Hostel was changed to private', '2020-11-27 16:31:33', '2020-11-27 16:31:33'),
(26, 1, 'Store was changed to private', '2020-11-27 16:31:37', '2020-11-27 16:31:37'),
(27, 1, 'Hostel was changed to public', '2020-11-27 16:31:45', '2020-11-27 16:31:45'),
(28, 1, 'Hostel was changed to private', '2020-12-14 11:19:26', '2020-12-14 11:19:26'),
(29, 1, 'Store was changed to public', '2020-12-14 11:19:49', '2020-12-14 11:19:49'),
(30, 1, 'House was added', '2020-12-15 08:53:48', '2020-12-15 08:53:48'),
(31, 1, 'House was changed to public', '2020-12-15 08:55:40', '2020-12-15 08:55:40'),
(32, 1, 'Added new currency Ghana Cedis', '2021-01-21 17:32:17', '2021-01-21 17:32:17'),
(33, 1, 'Added new currency United States Dollar', '2021-01-21 17:37:03', '2021-01-21 17:37:03'),
(34, 1, 'Deleted currency United States Dollar', '2021-01-21 17:37:11', '2021-01-21 17:37:11'),
(35, 1, 'Room was added', '2021-01-22 16:52:00', '2021-01-22 16:52:00'),
(36, 1, 'Room was changed to public', '2021-01-22 16:52:34', '2021-01-22 16:52:34'),
(37, 1, 'Apartment was added', '2021-01-22 16:53:56', '2021-01-22 16:53:56'),
(38, 1, 'House was added', '2021-01-22 16:54:27', '2021-01-22 16:54:27'),
(39, 1, 'Hostel was added', '2021-01-22 16:54:37', '2021-01-22 16:54:37'),
(40, 1, 'House was changed to public', '2021-01-22 16:54:41', '2021-01-22 16:54:41'),
(41, 1, 'Hostel was changed to public', '2021-01-22 16:54:44', '2021-01-22 16:54:44'),
(42, 1, 'Apartment was changed to public', '2021-01-22 16:54:47', '2021-01-22 16:54:47'),
(43, 1, 'Added new help category general - About Oshelter', '2021-01-30 11:31:24', '2021-01-30 11:31:24'),
(44, 1, 'Added new help category general - Your Account', '2021-01-30 11:31:29', '2021-01-30 11:31:29'),
(45, 1, 'Added new help category general - Terms And Policies', '2021-01-30 11:31:39', '2021-01-30 11:31:39'),
(46, 1, 'Added new help topic About Oshelter - how oshelter works', '2021-01-30 11:32:03', '2021-01-30 11:32:03'),
(47, 1, 'Edited help topic About Oshelter - How Oshelter works', '2021-01-30 11:32:16', '2021-01-30 11:32:16'),
(48, 1, 'Added new help topic About Oshelter - Messaging', '2021-01-30 11:32:56', '2021-01-30 11:32:56'),
(49, 1, 'Added new help topic About Oshelter - Our clients and partners', '2021-01-30 11:33:03', '2021-01-30 11:33:03'),
(50, 1, 'Added new help topic Your Account - Getting started', '2021-01-30 11:33:14', '2021-01-30 11:33:14'),
(51, 1, 'Added new help topic Your Account - How Oshelter works', '2021-01-30 11:33:29', '2021-01-30 11:33:29'),
(52, 1, 'Added new help topic About Oshelter - How Oshelter works', '2021-02-01 13:09:37', '2021-02-01 13:09:37'),
(53, 1, 'Added new help question How Oshelter works - How do I create an account?', '2021-02-01 13:09:57', '2021-02-01 13:09:57'),
(54, 1, 'Edited help question How Oshelter works - How do I create an account?', '2021-02-01 13:10:07', '2021-02-01 13:10:07'),
(55, 1, 'Edited help question How Oshelter works - How do I create an account?', '2021-02-01 13:10:15', '2021-02-01 13:10:15'),
(56, 1, 'Added new help category general - Safety And Accessibility', '2021-02-03 11:54:22', '2021-02-03 11:54:22'),
(57, 1, 'Added new help category general - Terms And Policies', '2021-02-03 11:56:11', '2021-02-03 11:56:11'),
(58, 1, 'Room was changed to private', '2021-02-09 19:37:24', '2021-02-09 19:37:24'),
(59, 1, 'Room was changed to public', '2021-02-09 19:37:54', '2021-02-09 19:37:54'),
(60, 1, 'Hostel was changed to private', '2021-02-13 20:03:21', '2021-02-13 20:03:21'),
(61, 1, 'Hostel was changed to public', '2021-02-14 17:27:31', '2021-02-14 17:27:31'),
(62, 1, 'Room was added', '2021-03-02 15:38:49', '2021-03-02 15:38:49'),
(63, 1, 'Room was changed to public', '2021-03-02 15:39:14', '2021-03-02 15:39:14'),
(64, 1, 'Room was added', '2021-03-02 15:46:52', '2021-03-02 15:46:52'),
(65, 1, 'Room was changed to public', '2021-03-02 15:47:07', '2021-03-02 15:47:07'),
(66, 1, 'Room was added', '2021-03-02 15:49:12', '2021-03-02 15:49:12'),
(67, 1, 'Room was changed to public', '2021-03-02 15:49:26', '2021-03-02 15:49:26'),
(68, 1, 'Room was added', '2021-03-02 15:53:03', '2021-03-02 15:53:03'),
(69, 1, 'Room was changed to public', '2021-03-02 15:53:09', '2021-03-02 15:53:09'),
(70, 1, 'House was added', '2021-03-02 15:55:52', '2021-03-02 15:55:52'),
(71, 1, 'House was changed to public', '2021-03-02 15:56:16', '2021-03-02 15:56:16'),
(72, 1, 'Room was added', '2021-03-02 17:08:12', '2021-03-02 17:08:12'),
(73, 1, 'Room was changed to public', '2021-03-02 17:08:44', '2021-03-02 17:08:44'),
(74, 1, 'Room was changed to private', '2021-03-02 17:08:47', '2021-03-02 17:08:47'),
(75, 1, 'Room was changed to public', '2021-03-02 17:08:47', '2021-03-02 17:08:47'),
(76, 1, 'House was added', '2021-03-02 17:11:01', '2021-03-02 17:11:01'),
(77, 1, 'Apartment was added', '2021-03-02 17:11:27', '2021-03-02 17:11:27'),
(78, 1, 'Hostel was added', '2021-03-02 17:11:47', '2021-03-02 17:11:47'),
(79, 1, 'House was changed to public', '2021-03-02 17:11:52', '2021-03-02 17:11:52'),
(80, 1, 'Hostel was changed to public', '2021-03-02 17:11:56', '2021-03-02 17:11:56'),
(81, 1, 'Apartment was changed to public', '2021-03-02 17:12:01', '2021-03-02 17:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `bank_withdraws`
--

CREATE TABLE `bank_withdraws` (
  `id` int(11) UNSIGNED NOT NULL,
  `withdraw_id` int(10) UNSIGNED NOT NULL,
  `bank_name` varchar(60) NOT NULL,
  `account_number` varchar(60) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL,
  `property_id` int(10) NOT NULL,
  `owner_id` int(10) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `adult` int(11) NOT NULL DEFAULT 0,
  `children` int(11) NOT NULL DEFAULT 0,
  `infant` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_transactions`
--

CREATE TABLE `booking_transactions` (
  `id` int(11) NOT NULL,
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(10) NOT NULL,
  `property_type` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `confirmations`
--

CREATE TABLE `confirmations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(10) UNSIGNED NOT NULL,
  `visit_id` int(10) NOT NULL,
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `help_desk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `currency` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'GHS',
  `symbol` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `currency`, `symbol`, `created_at`, `updated_at`) VALUES
(1, 'Ghana Cedis', 'GHS', '2021-01-21 17:32:17', '2021-01-21 17:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `deactivate_users`
--

CREATE TABLE `deactivate_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_verifies`
--

CREATE TABLE `email_verifies` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_verifies`
--

INSERT INTO `email_verifies` (`email`, `token`, `created_at`) VALUES
('just4today777@gmail.com', '981cce6ca613ac3e39699d2cc869e1326c7243bdadfefd2fd9d59b03f2fb8c24', '2021-03-17 18:25:59'),
('jamison32@hotmail.com', '484f428ef16223bc9d6d35cc0f49c6b72b4524b4f4777565ae7ca555a75cae4f', '2021-03-20 09:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `extension_transactions`
--

CREATE TABLE `extension_transactions` (
  `id` int(11) NOT NULL,
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `extension_id` int(10) NOT NULL,
  `property_type` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `help_categories`
--

CREATE TABLE `help_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `help_categories`
--

INSERT INTO `help_categories` (`id`, `category`, `topic`, `topic_slug`, `created_at`, `updated_at`) VALUES
(1, 'general', 'About Oshelter', 'about-oshelter', '2021-01-30 11:31:24', '2021-01-30 11:31:24'),
(2, 'general', 'Your Account', 'your-account', '2021-01-30 11:31:29', '2021-01-30 11:31:29'),
(3, 'general', 'Safety And Accessibility', 'safety-and-accessibility', '2021-02-03 11:54:22', '2021-02-03 11:54:22'),
(4, 'general', 'Terms And Policies', 'terms-and-policies', '2021-02-03 11:56:11', '2021-02-03 11:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `help_questions`
--

CREATE TABLE `help_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `help_topic_id` int(10) UNSIGNED NOT NULL,
  `question` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_popular` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `help_topics`
--

CREATE TABLE `help_topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `help_category_id` int(10) UNSIGNED NOT NULL,
  `topic_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_name_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hostel_block_rooms`
--

CREATE TABLE `hostel_block_rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_hostel_block_id` int(10) UNSIGNED NOT NULL,
  `block_room_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `block_no_room` int(11) NOT NULL,
  `start_room_no` int(11) NOT NULL,
  `bed_person` int(11) NOT NULL,
  `person_per_room` int(11) NOT NULL,
  `furnish` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kitchen` int(11) NOT NULL,
  `bathroom` int(11) NOT NULL,
  `bath_private` tinyint(1) NOT NULL,
  `toilet` int(11) NOT NULL,
  `toilet_private` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hostel_block_rooms`
--

INSERT INTO `hostel_block_rooms` (`id`, `property_hostel_block_id`, `block_room_type`, `gender`, `block_no_room`, `start_room_no`, `bed_person`, `person_per_room`, `furnish`, `kitchen`, `bathroom`, `bath_private`, `toilet`, `toilet_private`, `created_at`, `updated_at`) VALUES
(3, 18, 'single_room', 'male', 8, 1, 2, 2, 'fully_furnished', 2, 9, 1, 9, 1, '2021-02-12 12:11:17', '2021-02-12 12:11:17'),
(4, 19, 'single_room', 'female', 8, 1, 2, 2, 'fully_furnished', 2, 8, 1, 8, 1, '2021-02-12 12:28:18', '2021-02-12 12:28:18'),
(5, 23, 'single_room', 'male', 5, 1, 1, 1, 'fully_furnished', 2, 5, 1, 5, 1, '2021-02-15 14:55:43', '2021-02-15 14:55:43'),
(6, 24, 'single_room', 'male', 4, 1, 2, 2, 'partially_furnished', 1, 4, 1, 4, 1, '2021-02-15 15:49:08', '2021-02-15 15:49:08'),
(7, 25, 'chamber_and_hall', 'female', 2, 1, 3, 3, 'partially_furnished', 2, 2, 0, 2, 0, '2021-02-15 16:07:31', '2021-02-15 16:07:31'),
(8, 26, 'single_room', 'male', 3, 1, 2, 2, 'partially_furnished', 0, 2, 0, 2, 0, '2021-02-15 16:08:17', '2021-02-15 16:08:17'),
(9, 27, 'single_room', 'female', 5, 1, 1, 1, 'partially_furnished', 1, 5, 1, 5, 1, '2021-02-15 17:08:26', '2021-02-15 17:08:26'),
(10, 28, 'chamber_and_hall', 'male', 10, 1, 2, 1, 'partially_furnished', 1, 3, 0, 6, 0, '2021-02-15 17:24:25', '2021-02-15 17:24:25'),
(11, 29, 'chamber_and_hall', 'male', 3, 1, 1, 1, 'fully_furnished', 1, 3, 1, 3, 1, '2021-02-15 18:09:04', '2021-02-15 18:09:04'),
(12, 20, 'single_room', 'female', 6, 1, 1, 1, 'fully_furnished', 1, 6, 1, 6, 1, '2021-02-16 13:09:18', '2021-02-16 13:09:18'),
(13, 30, 'single_room', 'male', 1, 1, 1, 1, 'fully_furnished', 1, 4, 0, 4, 0, '2021-02-16 16:14:12', '2021-02-16 16:14:12'),
(14, 31, 'single_room', 'female', 5, 1, 2, 2, 'fully_furnished', 1, 5, 0, 5, 0, '2021-02-19 16:02:03', '2021-02-19 16:02:03'),
(15, 32, 'single_room', 'male', 6, 1, 4, 4, 'partially_furnished', 2, 4, 1, 4, 1, '2021-03-04 12:14:58', '2021-03-04 12:14:58'),
(16, 32, 'single_room', 'female', 6, 1, 4, 4, 'partially_furnished', 2, 6, 1, 6, 1, '2021-03-04 12:16:12', '2021-03-04 12:16:12'),
(17, 33, 'chamber_and_hall', 'female', 5, 1, 2, 2, 'partially_furnished', 2, 5, 1, 5, 1, '2021-03-04 12:28:53', '2021-03-04 12:28:53'),
(19, 34, 'chamber_and_hall', 'male', 5, 1, 1, 2, 'partially_furnished', 2, 5, 1, 5, 1, '2021-03-04 12:41:43', '2021-03-04 12:41:43'),
(21, 35, 'single_room', 'female', 4, 1, 2, 2, 'partially_furnished', 1, 1, 1, 1, 1, '2021-03-04 12:56:01', '2021-03-04 12:56:01'),
(22, 36, 'chamber_and_hall', 'male', 5, 1, 1, 2, 'partially_furnished', 2, 5, 1, 5, 1, '2021-03-04 13:13:03', '2021-03-04 13:13:03'),
(23, 36, 'single_room', 'female', 3, 1, 2, 2, 'partially_furnished', 2, 3, 1, 3, 1, '2021-03-04 13:13:58', '2021-03-04 13:13:58'),
(24, 37, 'single_room', 'male', 3, 1, 2, 2, 'partially_furnished', 1, 3, 1, 3, 1, '2021-03-04 13:24:54', '2021-03-04 13:24:54'),
(25, 38, 'chamber_and_hall', 'male', 2, 1, 1, 1, 'partially_furnished', 2, 2, 1, 2, 1, '2021-03-04 14:04:35', '2021-03-04 14:04:35'),
(26, 39, 'single_room', 'male', 4, 1, 1, 1, 'partially_furnished', 1, 4, 1, 4, 1, '2021-03-04 15:02:02', '2021-03-04 15:02:02'),
(27, 40, 'single_room', 'female', 5, 1, 1, 1, 'partially_furnished', 1, 5, 1, 5, 1, '2021-03-04 15:32:33', '2021-03-04 15:32:33'),
(28, 41, 'single_room', 'female', 6, 1, 1, 1, 'partially_furnished', 1, 6, 1, 6, 1, '2021-03-04 17:02:29', '2021-03-04 17:02:29'),
(29, 42, 'single_room', 'male', 5, 1, 2, 2, 'partially_furnished', 2, 5, 1, 5, 1, '2021-03-04 18:24:41', '2021-03-04 18:24:41'),
(30, 43, 'chamber_and_hall', 'female', 6, 1, 2, 2, 'partially_furnished', 1, 6, 1, 6, 1, '2021-03-04 19:42:23', '2021-03-04 19:42:23'),
(31, 44, 'single_room', 'male', 6, 1, 2, 2, 'partially_furnished', 1, 6, 1, 6, 1, '2021-03-05 14:57:01', '2021-03-05 14:57:01'),
(32, 46, 'single_room', 'male', 5, 1, 2, 2, 'partially_furnished', 2, 5, 1, 5, 1, '2021-03-09 15:37:17', '2021-03-09 15:37:17'),
(33, 47, 'single_room', 'male', 10, 1, 4, 4, 'not_furnished', 2, 10, 1, 10, 1, '2021-03-09 15:44:47', '2021-03-09 15:44:47'),
(34, 48, 'single_room', 'female', 10, 1, 2, 2, 'partially_furnished', 2, 5, 0, 5, 0, '2021-03-09 22:24:08', '2021-03-09 22:24:08'),
(35, 49, 'single_room', 'male', 5, 1, 2, 2, 'partially_furnished', 2, 3, 0, 3, 0, '2021-03-09 22:52:19', '2021-03-09 22:52:19'),
(36, 45, 'single_room', 'male', 8, 1, 2, 2, 'partially_furnished', 1, 4, 0, 4, 0, '2021-03-10 14:51:48', '2021-03-10 14:51:48'),
(37, 50, 'chamber_and_hall', 'male', 4, 1, 2, 2, 'partially_furnished', 2, 2, 0, 2, 0, '2021-03-10 15:11:36', '2021-03-10 15:11:36'),
(38, 51, 'single_room', 'female', 5, 1, 2, 2, 'partially_furnished', 2, 3, 0, 3, 0, '2021-03-10 15:21:12', '2021-03-10 15:21:12'),
(39, 52, 'single_room', 'male', 5, 1, 2, 2, 'partially_furnished', 2, 3, 0, 3, 0, '2021-03-10 15:21:53', '2021-03-10 15:21:53'),
(40, 53, 'chamber_and_hall', 'male', 4, 1, 2, 2, 'partially_furnished', 1, 4, 1, 4, 1, '2021-03-10 15:43:51', '2021-03-10 15:43:51'),
(41, 54, 'single_room', 'female', 6, 1, 1, 1, 'partially_furnished', 2, 3, 0, 3, 0, '2021-03-11 16:27:36', '2021-03-11 16:27:36'),
(42, 55, 'single_room', 'male', 6, 1, 1, 1, 'partially_furnished', 1, 3, 0, 3, 0, '2021-03-11 20:08:34', '2021-03-11 20:08:34'),
(43, 56, 'single_room', 'male', 5, 1, 1, 1, 'partially_furnished', 1, 3, 0, 3, 0, '2021-03-11 20:16:27', '2021-03-11 20:16:27'),
(44, 57, 'single_room', 'male', 5, 1, 1, 1, 'partially_furnished', 2, 5, 1, 5, 1, '2021-03-11 20:24:34', '2021-03-11 20:24:34'),
(45, 58, 'single_room', 'female', 5, 1, 1, 1, 'partially_furnished', 2, 5, 1, 5, 1, '2021-03-11 22:11:26', '2021-03-11 22:11:26'),
(46, 59, 'single_room', 'male', 5, 1, 1, 1, 'partially_furnished', 2, 3, 0, 3, 0, '2021-03-11 22:25:06', '2021-03-11 22:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_block_room_numbers`
--

CREATE TABLE `hostel_block_room_numbers` (
  `id` int(10) UNSIGNED NOT NULL,
  `hostel_block_room_id` int(10) UNSIGNED NOT NULL,
  `room_no` int(11) NOT NULL,
  `person_per_room` int(11) NOT NULL,
  `occupant` int(11) NOT NULL DEFAULT 0,
  `full` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hostel_block_room_numbers`
--

INSERT INTO `hostel_block_room_numbers` (`id`, `hostel_block_room_id`, `room_no`, `person_per_room`, `occupant`, `full`, `created_at`, `updated_at`) VALUES
(13, 3, 1, 2, 0, 0, '2021-02-12 12:11:17', '2021-02-12 12:11:17'),
(14, 3, 2, 2, 0, 0, '2021-02-12 12:11:17', '2021-02-12 12:11:17'),
(15, 3, 3, 2, 0, 0, '2021-02-12 12:11:17', '2021-02-12 12:11:17'),
(16, 3, 4, 2, 0, 0, '2021-02-12 12:11:18', '2021-02-12 12:11:18'),
(17, 3, 5, 2, 0, 0, '2021-02-12 12:11:18', '2021-02-12 12:11:18'),
(18, 3, 6, 2, 0, 0, '2021-02-12 12:11:18', '2021-02-12 12:11:18'),
(19, 3, 7, 2, 0, 0, '2021-02-12 12:11:18', '2021-02-12 12:11:18'),
(20, 3, 8, 2, 0, 0, '2021-02-12 12:11:18', '2021-02-12 12:11:18'),
(21, 4, 1, 2, 0, 0, '2021-02-12 12:28:18', '2021-02-12 12:28:18'),
(22, 4, 2, 2, 0, 0, '2021-02-12 12:28:18', '2021-02-12 12:28:18'),
(23, 4, 3, 2, 0, 0, '2021-02-12 12:28:18', '2021-02-12 12:28:18'),
(24, 4, 4, 2, 0, 0, '2021-02-12 12:28:18', '2021-02-12 12:28:18'),
(25, 4, 5, 2, 0, 0, '2021-02-12 12:28:18', '2021-02-12 12:28:18'),
(26, 4, 6, 2, 0, 0, '2021-02-12 12:28:18', '2021-02-12 12:28:18'),
(27, 4, 7, 2, 0, 0, '2021-02-12 12:28:18', '2021-02-12 12:28:18'),
(28, 4, 8, 2, 0, 0, '2021-02-12 12:28:18', '2021-02-12 12:28:18'),
(29, 5, 1, 1, 0, 0, '2021-02-15 14:55:43', '2021-02-15 14:55:43'),
(30, 5, 2, 1, 0, 0, '2021-02-15 14:55:43', '2021-02-15 14:55:43'),
(31, 5, 3, 1, 0, 0, '2021-02-15 14:55:43', '2021-02-15 14:55:43'),
(32, 5, 4, 1, 0, 0, '2021-02-15 14:55:43', '2021-02-15 14:55:43'),
(33, 5, 5, 1, 0, 0, '2021-02-15 14:55:43', '2021-02-15 14:55:43'),
(34, 6, 1, 2, 0, 0, '2021-02-15 15:49:08', '2021-02-15 15:49:08'),
(35, 6, 2, 2, 0, 0, '2021-02-15 15:49:08', '2021-02-15 15:49:08'),
(36, 6, 3, 2, 0, 0, '2021-02-15 15:49:08', '2021-02-15 15:49:08'),
(37, 6, 4, 2, 0, 0, '2021-02-15 15:49:08', '2021-02-15 15:49:08'),
(38, 7, 1, 3, 0, 0, '2021-02-15 16:07:31', '2021-02-15 16:07:31'),
(39, 7, 2, 3, 0, 0, '2021-02-15 16:07:31', '2021-02-15 16:07:31'),
(40, 8, 1, 2, 0, 0, '2021-02-15 16:08:17', '2021-02-15 16:08:17'),
(41, 8, 2, 2, 0, 0, '2021-02-15 16:08:17', '2021-02-15 16:08:17'),
(42, 8, 3, 2, 0, 0, '2021-02-15 16:08:17', '2021-02-15 16:08:17'),
(43, 9, 1, 1, 0, 0, '2021-02-15 17:08:26', '2021-02-15 17:08:26'),
(44, 9, 2, 1, 0, 0, '2021-02-15 17:08:26', '2021-02-15 17:08:26'),
(45, 9, 3, 1, 0, 0, '2021-02-15 17:08:26', '2021-02-15 17:08:26'),
(46, 9, 4, 1, 0, 0, '2021-02-15 17:08:26', '2021-02-15 17:08:26'),
(47, 9, 5, 1, 0, 0, '2021-02-15 17:08:26', '2021-02-15 17:08:26'),
(48, 10, 1, 1, 0, 0, '2021-02-15 17:24:25', '2021-02-15 17:24:25'),
(49, 10, 2, 1, 0, 0, '2021-02-15 17:24:25', '2021-02-15 17:24:25'),
(50, 10, 3, 1, 0, 0, '2021-02-15 17:24:25', '2021-02-15 17:24:25'),
(51, 10, 4, 1, 0, 0, '2021-02-15 17:24:25', '2021-02-15 17:24:25'),
(52, 10, 5, 1, 0, 0, '2021-02-15 17:24:25', '2021-02-15 17:24:25'),
(53, 10, 6, 1, 0, 0, '2021-02-15 17:24:25', '2021-02-15 17:24:25'),
(54, 10, 7, 1, 0, 0, '2021-02-15 17:24:25', '2021-02-15 17:24:25'),
(55, 10, 8, 1, 0, 0, '2021-02-15 17:24:25', '2021-02-15 17:24:25'),
(56, 10, 9, 1, 0, 0, '2021-02-15 17:24:25', '2021-02-15 17:24:25'),
(57, 10, 10, 1, 0, 0, '2021-02-15 17:24:25', '2021-02-15 17:24:25'),
(58, 11, 1, 1, 0, 0, '2021-02-15 18:09:04', '2021-02-15 18:09:04'),
(59, 11, 2, 1, 0, 0, '2021-02-15 18:09:04', '2021-02-15 18:09:04'),
(60, 11, 3, 1, 0, 0, '2021-02-15 18:09:04', '2021-02-15 18:09:04'),
(61, 12, 1, 1, 0, 0, '2021-02-16 13:09:18', '2021-02-16 13:09:18'),
(62, 12, 2, 1, 0, 0, '2021-02-16 13:09:18', '2021-02-16 13:09:18'),
(63, 12, 3, 1, 0, 0, '2021-02-16 13:09:18', '2021-02-16 13:09:18'),
(64, 12, 4, 1, 0, 0, '2021-02-16 13:09:18', '2021-02-16 13:09:18'),
(65, 12, 5, 1, 0, 0, '2021-02-16 13:09:18', '2021-02-16 13:09:18'),
(66, 12, 6, 1, 0, 0, '2021-02-16 13:09:18', '2021-02-16 13:09:18'),
(67, 13, 1, 1, 0, 0, '2021-02-16 16:14:12', '2021-02-16 16:14:12'),
(68, 14, 1, 2, 0, 0, '2021-02-19 16:02:03', '2021-02-19 16:02:03'),
(69, 14, 2, 2, 0, 0, '2021-02-19 16:02:03', '2021-02-19 16:02:03'),
(70, 14, 3, 2, 0, 0, '2021-02-19 16:02:03', '2021-02-19 16:02:03'),
(71, 14, 4, 2, 0, 0, '2021-02-19 16:02:03', '2021-02-19 16:02:03'),
(72, 14, 5, 2, 0, 0, '2021-02-19 16:02:03', '2021-02-19 16:02:03'),
(73, 15, 1, 4, 0, 0, '2021-03-04 12:14:58', '2021-03-04 12:14:58'),
(74, 15, 2, 4, 0, 0, '2021-03-04 12:14:58', '2021-03-04 12:14:58'),
(75, 15, 3, 4, 0, 0, '2021-03-04 12:14:58', '2021-03-04 12:14:58'),
(76, 15, 4, 4, 0, 0, '2021-03-04 12:14:58', '2021-03-04 12:14:58'),
(77, 15, 5, 4, 0, 0, '2021-03-04 12:14:58', '2021-03-04 12:14:58'),
(78, 15, 6, 4, 0, 0, '2021-03-04 12:14:58', '2021-03-04 12:14:58'),
(79, 16, 1, 4, 0, 0, '2021-03-04 12:16:12', '2021-03-04 12:16:12'),
(80, 16, 2, 4, 0, 0, '2021-03-04 12:16:12', '2021-03-04 12:16:12'),
(81, 16, 3, 4, 0, 0, '2021-03-04 12:16:12', '2021-03-04 12:16:12'),
(82, 16, 4, 4, 0, 0, '2021-03-04 12:16:12', '2021-03-04 12:16:12'),
(83, 16, 5, 4, 0, 0, '2021-03-04 12:16:12', '2021-03-04 12:16:12'),
(84, 16, 6, 4, 0, 0, '2021-03-04 12:16:12', '2021-03-04 12:16:12'),
(85, 17, 1, 2, 0, 0, '2021-03-04 12:28:53', '2021-03-04 12:28:53'),
(86, 17, 2, 2, 0, 0, '2021-03-04 12:28:53', '2021-03-04 12:28:53'),
(87, 17, 3, 2, 0, 0, '2021-03-04 12:28:53', '2021-03-04 12:28:53'),
(88, 17, 4, 2, 0, 0, '2021-03-04 12:28:53', '2021-03-04 12:28:53'),
(89, 17, 5, 2, 0, 0, '2021-03-04 12:28:53', '2021-03-04 12:28:53'),
(95, 19, 1, 2, 0, 0, '2021-03-04 12:41:43', '2021-03-04 12:41:43'),
(96, 19, 2, 2, 0, 0, '2021-03-04 12:41:43', '2021-03-04 12:41:43'),
(97, 19, 3, 2, 0, 0, '2021-03-04 12:41:43', '2021-03-04 12:41:43'),
(98, 19, 4, 2, 0, 0, '2021-03-04 12:41:43', '2021-03-04 12:41:43'),
(99, 19, 5, 2, 0, 0, '2021-03-04 12:41:43', '2021-03-04 12:41:43'),
(103, 21, 1, 2, 0, 0, '2021-03-04 12:56:01', '2021-03-04 12:56:01'),
(104, 21, 2, 2, 0, 0, '2021-03-04 12:56:01', '2021-03-04 12:56:01'),
(105, 21, 3, 2, 0, 0, '2021-03-04 12:56:01', '2021-03-04 12:56:01'),
(106, 21, 4, 2, 0, 0, '2021-03-04 12:56:01', '2021-03-04 12:56:01'),
(107, 22, 1, 2, 0, 0, '2021-03-04 13:13:03', '2021-03-04 13:13:03'),
(108, 22, 2, 2, 0, 0, '2021-03-04 13:13:03', '2021-03-04 13:13:03'),
(109, 22, 3, 2, 0, 0, '2021-03-04 13:13:03', '2021-03-04 13:13:03'),
(110, 22, 4, 2, 0, 0, '2021-03-04 13:13:03', '2021-03-04 13:13:03'),
(111, 22, 5, 2, 0, 0, '2021-03-04 13:13:03', '2021-03-04 13:13:03'),
(112, 23, 1, 2, 0, 0, '2021-03-04 13:13:58', '2021-03-04 13:13:58'),
(113, 23, 2, 2, 0, 0, '2021-03-04 13:13:58', '2021-03-04 13:13:58'),
(114, 23, 3, 2, 0, 0, '2021-03-04 13:13:58', '2021-03-04 13:13:58'),
(115, 24, 1, 2, 0, 0, '2021-03-04 13:24:54', '2021-03-04 13:24:54'),
(116, 24, 2, 2, 0, 0, '2021-03-04 13:24:54', '2021-03-04 13:24:54'),
(117, 24, 3, 2, 0, 0, '2021-03-04 13:24:54', '2021-03-04 13:24:54'),
(118, 25, 1, 1, 0, 0, '2021-03-04 14:04:35', '2021-03-04 14:04:35'),
(119, 25, 2, 1, 0, 0, '2021-03-04 14:04:35', '2021-03-04 14:04:35'),
(120, 26, 1, 1, 0, 0, '2021-03-04 15:02:02', '2021-03-04 15:02:02'),
(121, 26, 2, 1, 0, 0, '2021-03-04 15:02:02', '2021-03-04 15:02:02'),
(122, 26, 3, 1, 0, 0, '2021-03-04 15:02:02', '2021-03-04 15:02:02'),
(123, 26, 4, 1, 0, 0, '2021-03-04 15:02:02', '2021-03-04 15:02:02'),
(124, 27, 1, 1, 0, 0, '2021-03-04 15:32:33', '2021-03-04 15:32:33'),
(125, 27, 2, 1, 0, 0, '2021-03-04 15:32:33', '2021-03-04 15:32:33'),
(126, 27, 3, 1, 0, 0, '2021-03-04 15:32:33', '2021-03-04 15:32:33'),
(127, 27, 4, 1, 0, 0, '2021-03-04 15:32:33', '2021-03-04 15:32:33'),
(128, 27, 5, 1, 0, 0, '2021-03-04 15:32:33', '2021-03-04 15:32:33'),
(129, 28, 1, 1, 0, 0, '2021-03-04 17:02:29', '2021-03-04 17:02:29'),
(130, 28, 2, 1, 0, 0, '2021-03-04 17:02:29', '2021-03-04 17:02:29'),
(131, 28, 3, 1, 0, 0, '2021-03-04 17:02:29', '2021-03-04 17:02:29'),
(132, 28, 4, 1, 0, 0, '2021-03-04 17:02:29', '2021-03-04 17:02:29'),
(133, 28, 5, 1, 0, 0, '2021-03-04 17:02:29', '2021-03-04 17:02:29'),
(134, 28, 6, 1, 0, 0, '2021-03-04 17:02:29', '2021-03-04 17:02:29'),
(135, 29, 1, 2, 0, 0, '2021-03-04 18:24:41', '2021-03-04 18:24:41'),
(136, 29, 2, 2, 0, 0, '2021-03-04 18:24:41', '2021-03-04 18:24:41'),
(137, 29, 3, 2, 0, 0, '2021-03-04 18:24:41', '2021-03-04 18:24:41'),
(138, 29, 4, 2, 0, 0, '2021-03-04 18:24:41', '2021-03-04 18:24:41'),
(139, 29, 5, 2, 0, 0, '2021-03-04 18:24:41', '2021-03-04 18:24:41'),
(140, 30, 1, 2, 0, 0, '2021-03-04 19:42:23', '2021-03-04 19:42:23'),
(141, 30, 2, 2, 0, 0, '2021-03-04 19:42:23', '2021-03-04 19:42:23'),
(142, 30, 3, 2, 0, 0, '2021-03-04 19:42:23', '2021-03-04 19:42:23'),
(143, 30, 4, 2, 0, 0, '2021-03-04 19:42:23', '2021-03-04 19:42:23'),
(144, 30, 5, 2, 0, 0, '2021-03-04 19:42:23', '2021-03-04 19:42:23'),
(145, 30, 6, 2, 0, 0, '2021-03-04 19:42:23', '2021-03-04 19:42:23'),
(146, 31, 1, 2, 0, 0, '2021-03-05 14:57:01', '2021-03-05 14:57:01'),
(147, 31, 2, 2, 0, 0, '2021-03-05 14:57:01', '2021-03-05 14:57:01'),
(148, 31, 3, 2, 0, 0, '2021-03-05 14:57:01', '2021-03-05 14:57:01'),
(149, 31, 4, 2, 0, 0, '2021-03-05 14:57:01', '2021-03-05 14:57:01'),
(150, 31, 5, 2, 0, 0, '2021-03-05 14:57:01', '2021-03-05 14:57:01'),
(151, 31, 6, 2, 0, 0, '2021-03-05 14:57:01', '2021-03-05 14:57:01'),
(152, 32, 1, 2, 0, 0, '2021-03-09 15:37:17', '2021-03-09 15:37:17'),
(153, 32, 2, 2, 0, 0, '2021-03-09 15:37:17', '2021-03-09 15:37:17'),
(154, 32, 3, 2, 0, 0, '2021-03-09 15:37:17', '2021-03-09 15:37:17'),
(155, 32, 4, 2, 0, 0, '2021-03-09 15:37:17', '2021-03-09 15:37:17'),
(156, 32, 5, 2, 0, 0, '2021-03-09 15:37:17', '2021-03-09 15:37:17'),
(157, 33, 1, 4, 0, 0, '2021-03-09 15:44:47', '2021-03-09 15:44:47'),
(158, 33, 2, 4, 0, 0, '2021-03-09 15:44:47', '2021-03-09 15:44:47'),
(159, 33, 3, 4, 0, 0, '2021-03-09 15:44:47', '2021-03-09 15:44:47'),
(160, 33, 4, 4, 0, 0, '2021-03-09 15:44:47', '2021-03-09 15:44:47'),
(161, 33, 5, 4, 0, 0, '2021-03-09 15:44:47', '2021-03-09 15:44:47'),
(162, 33, 6, 4, 0, 0, '2021-03-09 15:44:47', '2021-03-09 15:44:47'),
(163, 33, 7, 4, 0, 0, '2021-03-09 15:44:47', '2021-03-09 15:44:47'),
(164, 33, 8, 4, 0, 0, '2021-03-09 15:44:47', '2021-03-09 15:44:47'),
(165, 33, 9, 4, 0, 0, '2021-03-09 15:44:47', '2021-03-09 15:44:47'),
(166, 33, 10, 4, 0, 0, '2021-03-09 15:44:47', '2021-03-09 15:44:47'),
(167, 34, 1, 2, 0, 0, '2021-03-09 22:24:08', '2021-03-09 22:24:08'),
(168, 34, 2, 2, 0, 0, '2021-03-09 22:24:08', '2021-03-09 22:24:08'),
(169, 34, 3, 2, 0, 0, '2021-03-09 22:24:08', '2021-03-09 22:24:08'),
(170, 34, 4, 2, 0, 0, '2021-03-09 22:24:08', '2021-03-09 22:24:08'),
(171, 34, 5, 2, 0, 0, '2021-03-09 22:24:08', '2021-03-09 22:24:08'),
(172, 34, 6, 2, 0, 0, '2021-03-09 22:24:08', '2021-03-09 22:24:08'),
(173, 34, 7, 2, 0, 0, '2021-03-09 22:24:08', '2021-03-09 22:24:08'),
(174, 34, 8, 2, 0, 0, '2021-03-09 22:24:08', '2021-03-09 22:24:08'),
(175, 34, 9, 2, 0, 0, '2021-03-09 22:24:08', '2021-03-09 22:24:08'),
(176, 34, 10, 2, 0, 0, '2021-03-09 22:24:08', '2021-03-09 22:24:08'),
(177, 35, 1, 2, 0, 0, '2021-03-09 22:52:19', '2021-03-09 22:52:19'),
(178, 35, 2, 2, 0, 0, '2021-03-09 22:52:19', '2021-03-09 22:52:19'),
(179, 35, 3, 2, 0, 0, '2021-03-09 22:52:19', '2021-03-09 22:52:19'),
(180, 35, 4, 2, 0, 0, '2021-03-09 22:52:19', '2021-03-09 22:52:19'),
(181, 35, 5, 2, 0, 0, '2021-03-09 22:52:19', '2021-03-09 22:52:19'),
(182, 36, 1, 2, 0, 0, '2021-03-10 14:51:48', '2021-03-10 14:51:48'),
(183, 36, 2, 2, 0, 0, '2021-03-10 14:51:48', '2021-03-10 14:51:48'),
(184, 36, 3, 2, 0, 0, '2021-03-10 14:51:48', '2021-03-10 14:51:48'),
(185, 36, 4, 2, 0, 0, '2021-03-10 14:51:48', '2021-03-10 14:51:48'),
(186, 36, 5, 2, 0, 0, '2021-03-10 14:51:48', '2021-03-10 14:51:48'),
(187, 36, 6, 2, 0, 0, '2021-03-10 14:51:48', '2021-03-10 14:51:48'),
(188, 36, 7, 2, 0, 0, '2021-03-10 14:51:48', '2021-03-10 14:51:48'),
(189, 36, 8, 2, 0, 0, '2021-03-10 14:51:48', '2021-03-10 14:51:48'),
(190, 37, 1, 2, 0, 0, '2021-03-10 15:11:36', '2021-03-10 15:11:36'),
(191, 37, 2, 2, 0, 0, '2021-03-10 15:11:36', '2021-03-10 15:11:36'),
(192, 37, 3, 2, 0, 0, '2021-03-10 15:11:36', '2021-03-10 15:11:36'),
(193, 37, 4, 2, 0, 0, '2021-03-10 15:11:36', '2021-03-10 15:11:36'),
(194, 38, 1, 2, 0, 0, '2021-03-10 15:21:12', '2021-03-10 15:21:12'),
(195, 38, 2, 2, 0, 0, '2021-03-10 15:21:12', '2021-03-10 15:21:12'),
(196, 38, 3, 2, 0, 0, '2021-03-10 15:21:12', '2021-03-10 15:21:12'),
(197, 38, 4, 2, 0, 0, '2021-03-10 15:21:12', '2021-03-10 15:21:12'),
(198, 38, 5, 2, 0, 0, '2021-03-10 15:21:12', '2021-03-10 15:21:12'),
(199, 39, 1, 2, 0, 0, '2021-03-10 15:21:53', '2021-03-10 15:21:53'),
(200, 39, 2, 2, 0, 0, '2021-03-10 15:21:53', '2021-03-10 15:21:53'),
(201, 39, 3, 2, 0, 0, '2021-03-10 15:21:53', '2021-03-10 15:21:53'),
(202, 39, 4, 2, 0, 0, '2021-03-10 15:21:53', '2021-03-10 15:21:53'),
(203, 39, 5, 2, 0, 0, '2021-03-10 15:21:53', '2021-03-10 15:21:53'),
(204, 40, 1, 2, 0, 0, '2021-03-10 15:43:51', '2021-03-10 15:43:51'),
(205, 40, 2, 2, 0, 0, '2021-03-10 15:43:51', '2021-03-10 15:43:51'),
(206, 40, 3, 2, 0, 0, '2021-03-10 15:43:51', '2021-03-10 15:43:51'),
(207, 40, 4, 2, 0, 0, '2021-03-10 15:43:51', '2021-03-10 15:43:51'),
(208, 41, 1, 1, 0, 0, '2021-03-11 16:27:36', '2021-03-11 16:27:36'),
(209, 41, 2, 1, 0, 0, '2021-03-11 16:27:36', '2021-03-11 16:27:36'),
(210, 41, 3, 1, 0, 0, '2021-03-11 16:27:36', '2021-03-11 16:27:36'),
(211, 41, 4, 1, 0, 0, '2021-03-11 16:27:36', '2021-03-11 16:27:36'),
(212, 41, 5, 1, 0, 0, '2021-03-11 16:27:36', '2021-03-11 16:27:36'),
(213, 41, 6, 1, 0, 0, '2021-03-11 16:27:36', '2021-03-11 16:27:36'),
(214, 42, 1, 1, 0, 0, '2021-03-11 20:08:34', '2021-03-11 20:08:34'),
(215, 42, 2, 1, 0, 0, '2021-03-11 20:08:34', '2021-03-11 20:08:34'),
(216, 42, 3, 1, 0, 0, '2021-03-11 20:08:34', '2021-03-11 20:08:34'),
(217, 42, 4, 1, 0, 0, '2021-03-11 20:08:34', '2021-03-11 20:08:34'),
(218, 42, 5, 1, 0, 0, '2021-03-11 20:08:34', '2021-03-11 20:08:34'),
(219, 42, 6, 1, 0, 0, '2021-03-11 20:08:34', '2021-03-11 20:08:34'),
(220, 43, 1, 1, 0, 0, '2021-03-11 20:16:27', '2021-03-11 20:16:27'),
(221, 43, 2, 1, 0, 0, '2021-03-11 20:16:27', '2021-03-11 20:16:27'),
(222, 43, 3, 1, 0, 0, '2021-03-11 20:16:27', '2021-03-11 20:16:27'),
(223, 43, 4, 1, 0, 0, '2021-03-11 20:16:27', '2021-03-11 20:16:27'),
(224, 43, 5, 1, 0, 0, '2021-03-11 20:16:27', '2021-03-11 20:16:27'),
(225, 44, 1, 1, 0, 0, '2021-03-11 20:24:34', '2021-03-11 20:24:34'),
(226, 44, 2, 1, 0, 0, '2021-03-11 20:24:34', '2021-03-11 20:24:34'),
(227, 44, 3, 1, 0, 0, '2021-03-11 20:24:34', '2021-03-11 20:24:34'),
(228, 44, 4, 1, 0, 0, '2021-03-11 20:24:34', '2021-03-11 20:24:34'),
(229, 44, 5, 1, 0, 0, '2021-03-11 20:24:34', '2021-03-11 20:24:34'),
(230, 45, 1, 1, 0, 0, '2021-03-11 22:11:26', '2021-03-11 22:11:26'),
(231, 45, 2, 1, 0, 0, '2021-03-11 22:11:26', '2021-03-11 22:11:26'),
(232, 45, 3, 1, 0, 0, '2021-03-11 22:11:26', '2021-03-11 22:11:26'),
(233, 45, 4, 1, 0, 0, '2021-03-11 22:11:26', '2021-03-11 22:11:26'),
(234, 45, 5, 1, 0, 0, '2021-03-11 22:11:26', '2021-03-11 22:11:26'),
(235, 46, 1, 1, 0, 0, '2021-03-11 22:25:06', '2021-03-11 22:25:06'),
(236, 46, 2, 1, 0, 0, '2021-03-11 22:25:06', '2021-03-11 22:25:06'),
(237, 46, 3, 1, 0, 0, '2021-03-11 22:25:06', '2021-03-11 22:25:06'),
(238, 46, 4, 1, 0, 0, '2021-03-11 22:25:06', '2021-03-11 22:25:06'),
(239, 46, 5, 1, 0, 0, '2021-03-11 22:25:06', '2021-03-11 22:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_bookings`
--

CREATE TABLE `hostel_bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL,
  `property_id` int(10) NOT NULL,
  `owner_id` int(10) NOT NULL,
  `hostel_block_room_number_id` int(10) NOT NULL,
  `room_number` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hostel_room_amenities`
--

CREATE TABLE `hostel_room_amenities` (
  `id` int(10) UNSIGNED NOT NULL,
  `hostel_block_room_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hostel_room_amenities`
--

INSERT INTO `hostel_room_amenities` (`id`, `hostel_block_room_id`, `name`, `created_at`, `updated_at`) VALUES
(9, 3, 'Bed', '2021-02-12 12:12:01', '2021-02-12 12:12:01'),
(10, 3, 'TV', '2021-02-12 12:12:01', '2021-02-12 12:12:01'),
(11, 3, 'Internet Connection', '2021-02-12 12:12:01', '2021-02-12 12:12:01'),
(12, 3, 'Fire Extinguisher', '2021-02-12 12:12:01', '2021-02-12 12:12:01'),
(13, 3, 'Ceiling Fan', '2021-02-12 12:12:01', '2021-02-12 12:12:01'),
(14, 3, 'Learning Light', '2021-02-12 12:12:01', '2021-02-12 12:12:01'),
(15, 3, 'Wardrobe', '2021-02-12 12:12:01', '2021-02-12 12:12:01'),
(16, 4, 'Bed', '2021-02-12 12:29:31', '2021-02-12 12:29:31'),
(17, 4, 'Fire Extinguisher', '2021-02-12 12:29:31', '2021-02-12 12:29:31'),
(18, 4, 'Smoke Detector', '2021-02-12 12:29:31', '2021-02-12 12:29:31'),
(19, 4, 'Ceiling Fan', '2021-02-12 12:29:31', '2021-02-12 12:29:31'),
(20, 4, 'Learning Light', '2021-02-12 12:29:31', '2021-02-12 12:29:31'),
(21, 4, 'Wardrobe', '2021-02-12 12:29:31', '2021-02-12 12:29:31'),
(22, 5, 'Bed', '2021-02-15 14:56:08', '2021-02-15 14:56:08'),
(23, 5, 'Fridge', '2021-02-15 14:56:08', '2021-02-15 14:56:08'),
(24, 5, 'Internet Connection', '2021-02-15 14:56:08', '2021-02-15 14:56:08'),
(25, 5, 'Towel,Soap', '2021-02-15 14:56:08', '2021-02-15 14:56:08'),
(26, 5, 'Fire Extinguisher', '2021-02-15 14:56:08', '2021-02-15 14:56:08'),
(27, 5, 'Smoke Detector', '2021-02-15 14:56:08', '2021-02-15 14:56:08'),
(28, 5, 'Ceiling Fan', '2021-02-15 14:56:08', '2021-02-15 14:56:08'),
(29, 5, 'Learning Light', '2021-02-15 14:56:08', '2021-02-15 14:56:08'),
(30, 5, 'Wardrobe', '2021-02-15 14:56:08', '2021-02-15 14:56:08'),
(31, 6, 'Bed', '2021-02-15 15:49:40', '2021-02-15 15:49:40'),
(32, 6, 'Fire Extinguisher', '2021-02-15 15:49:40', '2021-02-15 15:49:40'),
(33, 6, 'Smoke Detector', '2021-02-15 15:49:40', '2021-02-15 15:49:40'),
(34, 6, 'Ceiling Fan', '2021-02-15 15:49:40', '2021-02-15 15:49:40'),
(35, 6, 'Wardrobe', '2021-02-15 15:49:40', '2021-02-15 15:49:40'),
(36, 7, 'Internet Connection', '2021-02-15 16:09:39', '2021-02-15 16:09:39'),
(37, 7, 'Fire Extinguisher', '2021-02-15 16:09:39', '2021-02-15 16:09:39'),
(38, 7, 'Smoke Detector', '2021-02-15 16:09:39', '2021-02-15 16:09:39'),
(39, 7, 'Ceiling Fan', '2021-02-15 16:09:39', '2021-02-15 16:09:39'),
(40, 8, 'Bed', '2021-02-15 16:09:56', '2021-02-15 16:09:56'),
(41, 8, 'Fire Extinguisher', '2021-02-15 16:09:56', '2021-02-15 16:09:56'),
(42, 8, 'Smoke Detector', '2021-02-15 16:09:56', '2021-02-15 16:09:56'),
(43, 8, 'Ceiling Fan', '2021-02-15 16:09:56', '2021-02-15 16:09:56'),
(44, 9, 'Bed', '2021-02-15 17:09:11', '2021-02-15 17:09:11'),
(45, 9, 'Fire Extinguisher', '2021-02-15 17:09:11', '2021-02-15 17:09:11'),
(46, 9, 'Ceiling Fan', '2021-02-15 17:09:11', '2021-02-15 17:09:11'),
(47, 9, 'Learning Light', '2021-02-15 17:09:11', '2021-02-15 17:09:11'),
(48, 9, 'Wardrobe', '2021-02-15 17:09:11', '2021-02-15 17:09:11'),
(49, 10, 'Bed', '2021-02-15 17:27:20', '2021-02-15 17:27:20'),
(50, 10, 'Ceiling Fan', '2021-02-15 17:27:20', '2021-02-15 17:27:20'),
(51, 10, 'Telephone', '2021-02-15 17:27:25', '2021-02-15 17:27:25'),
(52, 10, 'Fire Extinguisher', '2021-02-15 17:27:25', '2021-02-15 17:27:25'),
(53, 10, 'Smoke Detector', '2021-02-15 17:27:25', '2021-02-15 17:27:25'),
(54, 11, 'Bed', '2021-02-15 18:15:56', '2021-02-15 18:15:56'),
(55, 11, 'Fridge', '2021-02-15 18:15:56', '2021-02-15 18:15:56'),
(56, 11, 'Internet Connection', '2021-02-15 18:15:56', '2021-02-15 18:15:56'),
(57, 11, 'Towel,Soap', '2021-02-15 18:15:56', '2021-02-15 18:15:56'),
(58, 11, 'Fire Extinguisher', '2021-02-15 18:15:56', '2021-02-15 18:15:56'),
(59, 11, 'Smoke Detector', '2021-02-15 18:15:56', '2021-02-15 18:15:56'),
(60, 11, 'Ceiling Fan', '2021-02-15 18:15:56', '2021-02-15 18:15:56'),
(61, 11, 'Learning Light', '2021-02-15 18:15:56', '2021-02-15 18:15:56'),
(62, 11, 'Wardrobe', '2021-02-15 18:15:56', '2021-02-15 18:15:56'),
(63, 12, 'Bed', '2021-02-16 13:10:05', '2021-02-16 13:10:05'),
(64, 12, 'TV', '2021-02-16 13:10:05', '2021-02-16 13:10:05'),
(65, 12, 'Ceiling Fan', '2021-02-16 13:10:05', '2021-02-16 13:10:05'),
(66, 12, 'Wardrobe', '2021-02-16 13:10:05', '2021-02-16 13:10:05'),
(67, 13, 'Bed', '2021-02-16 16:15:53', '2021-02-16 16:15:53'),
(68, 13, 'Fire Extinguisher', '2021-02-16 16:15:53', '2021-02-16 16:15:53'),
(69, 13, 'Ceiling Fan', '2021-02-16 16:15:53', '2021-02-16 16:15:53'),
(75, 21, 'Bed', '2021-03-04 12:56:26', '2021-03-04 12:56:26'),
(76, 21, 'Internet Connection', '2021-03-04 12:56:26', '2021-03-04 12:56:26'),
(77, 21, 'Smoke Detector', '2021-03-04 12:56:26', '2021-03-04 12:56:26'),
(78, 21, 'Ceiling Fan', '2021-03-04 12:56:26', '2021-03-04 12:56:26'),
(79, 21, 'Wardrobe', '2021-03-04 12:56:26', '2021-03-04 12:56:26'),
(80, 22, 'Bed', '2021-03-04 13:14:34', '2021-03-04 13:14:34'),
(81, 22, 'TV', '2021-03-04 13:14:34', '2021-03-04 13:14:34'),
(82, 22, 'Fire Extinguisher', '2021-03-04 13:14:34', '2021-03-04 13:14:34'),
(83, 22, 'Ceiling Fan', '2021-03-04 13:14:34', '2021-03-04 13:14:34'),
(84, 23, 'Bed', '2021-03-04 13:14:53', '2021-03-04 13:14:53'),
(85, 23, 'Internet Connection', '2021-03-04 13:14:53', '2021-03-04 13:14:53'),
(86, 23, 'Towel,Soap', '2021-03-04 13:14:53', '2021-03-04 13:14:53'),
(87, 23, 'Fire Extinguisher', '2021-03-04 13:14:53', '2021-03-04 13:14:53'),
(88, 23, 'Air Conditioning', '2021-03-04 13:14:53', '2021-03-04 13:14:53'),
(89, 23, 'Ceiling Fan', '2021-03-04 13:14:53', '2021-03-04 13:14:53'),
(90, 23, 'Wardrobe', '2021-03-04 13:14:53', '2021-03-04 13:14:53'),
(91, 24, 'Bed', '2021-03-04 13:25:14', '2021-03-04 13:25:14'),
(92, 24, 'Fire Extinguisher', '2021-03-04 13:25:14', '2021-03-04 13:25:14'),
(93, 24, 'Air Conditioning', '2021-03-04 13:25:14', '2021-03-04 13:25:14'),
(94, 24, 'Ceiling Fan', '2021-03-04 13:25:14', '2021-03-04 13:25:14'),
(95, 25, 'Bed', '2021-03-04 14:05:57', '2021-03-04 14:05:57'),
(96, 25, 'Fire Extinguisher', '2021-03-04 14:05:57', '2021-03-04 14:05:57'),
(97, 25, 'Smoke Detector', '2021-03-04 14:05:57', '2021-03-04 14:05:57'),
(98, 25, 'Air Conditioning', '2021-03-04 14:05:57', '2021-03-04 14:05:57'),
(99, 25, 'Ceiling Fan', '2021-03-04 14:05:57', '2021-03-04 14:05:57'),
(100, 26, 'Bed', '2021-03-04 15:04:17', '2021-03-04 15:04:17'),
(101, 26, 'Fire Extinguisher', '2021-03-04 15:04:17', '2021-03-04 15:04:17'),
(102, 26, 'Smoke Detector', '2021-03-04 15:04:17', '2021-03-04 15:04:17'),
(103, 26, 'Air Conditioning', '2021-03-04 15:04:17', '2021-03-04 15:04:17'),
(104, 26, 'Ceiling Fan', '2021-03-04 15:04:17', '2021-03-04 15:04:17'),
(105, 29, 'Bed', '2021-03-04 18:25:03', '2021-03-04 18:25:03'),
(106, 29, 'Fire Extinguisher', '2021-03-04 18:25:03', '2021-03-04 18:25:03'),
(107, 29, 'Smoke Detector', '2021-03-04 18:25:03', '2021-03-04 18:25:03'),
(108, 29, 'Ceiling Fan', '2021-03-04 18:25:03', '2021-03-04 18:25:03'),
(109, 29, 'Wardrobe', '2021-03-04 18:25:03', '2021-03-04 18:25:03'),
(110, 30, 'Bed', '2021-03-04 19:42:48', '2021-03-04 19:42:48'),
(111, 30, 'Air Conditioning', '2021-03-04 19:42:48', '2021-03-04 19:42:48'),
(112, 30, 'Ceiling Fan', '2021-03-04 19:42:48', '2021-03-04 19:42:48'),
(113, 30, 'Learning Light', '2021-03-04 19:42:48', '2021-03-04 19:42:48'),
(114, 30, 'Smoke Detector', '2021-03-04 19:42:58', '2021-03-04 19:42:58'),
(115, 31, 'Bed', '2021-03-05 14:58:36', '2021-03-05 14:58:36'),
(116, 31, 'Towel,Soap', '2021-03-05 14:58:36', '2021-03-05 14:58:36'),
(117, 31, 'Fire Extinguisher', '2021-03-05 14:58:36', '2021-03-05 14:58:36'),
(118, 31, 'Smoke Detector', '2021-03-05 14:58:36', '2021-03-05 14:58:36'),
(119, 31, 'Ceiling Fan', '2021-03-05 14:58:36', '2021-03-05 14:58:36'),
(120, 31, 'Wardrobe', '2021-03-05 14:58:36', '2021-03-05 14:58:36'),
(121, 34, 'Bed', '2021-03-09 22:26:34', '2021-03-09 22:26:34'),
(122, 34, 'Fire Extinguisher', '2021-03-09 22:26:34', '2021-03-09 22:26:34'),
(123, 34, 'Ceiling Fan', '2021-03-09 22:26:34', '2021-03-09 22:26:34'),
(124, 34, 'Learning Light', '2021-03-09 22:26:34', '2021-03-09 22:26:34'),
(125, 35, 'Bed', '2021-03-09 22:52:44', '2021-03-09 22:52:44'),
(126, 35, 'Fire Extinguisher', '2021-03-09 22:52:44', '2021-03-09 22:52:44'),
(127, 35, 'Smoke Detector', '2021-03-09 22:52:44', '2021-03-09 22:52:44'),
(128, 35, 'Ceiling Fan', '2021-03-09 22:52:44', '2021-03-09 22:52:44'),
(129, 36, 'Bed', '2021-03-10 14:52:09', '2021-03-10 14:52:09'),
(130, 36, 'Fire Extinguisher', '2021-03-10 14:52:09', '2021-03-10 14:52:09'),
(131, 36, 'Smoke Detector', '2021-03-10 14:52:09', '2021-03-10 14:52:09'),
(132, 36, 'Air Conditioning', '2021-03-10 14:52:09', '2021-03-10 14:52:09'),
(133, 36, 'Ceiling Fan', '2021-03-10 14:52:09', '2021-03-10 14:52:09'),
(134, 37, 'Bed', '2021-03-10 15:13:22', '2021-03-10 15:13:22'),
(135, 37, 'TV', '2021-03-10 15:13:22', '2021-03-10 15:13:22'),
(136, 37, 'Fire Extinguisher', '2021-03-10 15:13:22', '2021-03-10 15:13:22'),
(137, 37, 'Smoke Detector', '2021-03-10 15:13:22', '2021-03-10 15:13:22'),
(138, 37, 'Ceiling Fan', '2021-03-10 15:13:22', '2021-03-10 15:13:22'),
(139, 37, 'Learning Light', '2021-03-10 15:13:22', '2021-03-10 15:13:22'),
(140, 38, 'Bed', '2021-03-10 15:22:15', '2021-03-10 15:22:15'),
(141, 38, 'Fire Extinguisher', '2021-03-10 15:22:15', '2021-03-10 15:22:15'),
(142, 38, 'Smoke Detector', '2021-03-10 15:22:15', '2021-03-10 15:22:15'),
(143, 38, 'Balcony', '2021-03-10 15:22:15', '2021-03-10 15:22:15'),
(144, 39, 'Bed', '2021-03-10 15:22:37', '2021-03-10 15:22:37'),
(145, 39, 'Fire Extinguisher', '2021-03-10 15:22:37', '2021-03-10 15:22:37'),
(146, 39, 'Smoke Detector', '2021-03-10 15:22:37', '2021-03-10 15:22:37'),
(147, 39, 'Ceiling Fan', '2021-03-10 15:22:37', '2021-03-10 15:22:37'),
(148, 40, 'Bed', '2021-03-10 15:45:29', '2021-03-10 15:45:29'),
(149, 40, 'TV', '2021-03-10 15:45:29', '2021-03-10 15:45:29'),
(150, 40, 'Fire Extinguisher', '2021-03-10 15:45:29', '2021-03-10 15:45:29'),
(151, 40, 'Smoke Detector', '2021-03-10 15:45:29', '2021-03-10 15:45:29'),
(152, 40, 'Ceiling Fan', '2021-03-10 15:45:29', '2021-03-10 15:45:29'),
(153, 41, 'Bed', '2021-03-11 16:27:56', '2021-03-11 16:27:56'),
(154, 41, 'Fire Extinguisher', '2021-03-11 16:27:56', '2021-03-11 16:27:56'),
(155, 41, 'Smoke Detector', '2021-03-11 16:27:56', '2021-03-11 16:27:56'),
(156, 41, 'Air Conditioning', '2021-03-11 16:27:56', '2021-03-11 16:27:56'),
(157, 44, 'Fire Extinguisher', '2021-03-11 20:24:51', '2021-03-11 20:24:51'),
(158, 44, 'Smoke Detector', '2021-03-11 20:24:51', '2021-03-11 20:24:51'),
(159, 44, 'Air Conditioning', '2021-03-11 20:24:51', '2021-03-11 20:24:51'),
(160, 44, 'Ceiling Fan', '2021-03-11 20:24:51', '2021-03-11 20:24:51'),
(161, 45, 'Fire Extinguisher', '2021-03-11 22:16:22', '2021-03-11 22:16:22'),
(162, 45, 'Smoke Detector', '2021-03-11 22:16:22', '2021-03-11 22:16:22'),
(163, 45, 'Air Conditioning', '2021-03-11 22:16:22', '2021-03-11 22:16:22'),
(164, 45, 'Wardrobe', '2021-03-11 22:16:22', '2021-03-11 22:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `include_utilities`
--

CREATE TABLE `include_utilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `include_utilities`
--

INSERT INTO `include_utilities` (`id`, `property_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 13, 'water bill', '2021-02-08 18:15:44', '2021-02-08 18:15:44'),
(2, 13, 'sanitation fee', '2021-02-08 18:15:44', '2021-02-08 18:15:44'),
(3, 18, 'water bill', '2021-02-09 15:25:45', '2021-02-09 15:25:45'),
(4, 19, 'water bill', '2021-02-09 15:46:58', '2021-02-09 15:46:58'),
(5, 19, 'sanitation fee', '2021-02-09 15:46:58', '2021-02-09 15:46:58'),
(7, 24, 'water bill', '2021-02-09 19:17:41', '2021-02-09 19:17:41'),
(8, 24, 'sanitation fee', '2021-02-09 19:17:41', '2021-02-09 19:17:41'),
(9, 25, 'water bill', '2021-02-10 10:12:54', '2021-02-10 10:12:54'),
(10, 25, 'sanitation fee', '2021-02-10 10:12:54', '2021-02-10 10:12:54'),
(19, 43, 'water bill', '2021-02-12 12:22:00', '2021-02-12 12:22:00'),
(20, 43, 'sanitation fee', '2021-02-12 12:22:00', '2021-02-12 12:22:00'),
(21, 44, 'water bill', '2021-02-12 12:34:53', '2021-02-12 12:34:53'),
(22, 44, 'sanitation fee', '2021-02-12 12:34:53', '2021-02-12 12:34:53'),
(23, 61, 'water bill', '2021-02-12 15:51:38', '2021-02-12 15:51:38'),
(24, 61, 'sanitation fee', '2021-02-12 15:51:38', '2021-02-12 15:51:38'),
(25, 62, 'water bill', '2021-02-12 16:00:57', '2021-02-12 16:00:57'),
(26, 62, 'sanitation fee', '2021-02-12 16:00:57', '2021-02-12 16:00:57'),
(27, 63, 'water bill', '2021-02-12 16:21:29', '2021-02-12 16:21:29'),
(28, 63, 'sanitation fee', '2021-02-12 16:21:29', '2021-02-12 16:21:29'),
(29, 64, 'sanitation fee', '2021-02-12 17:45:44', '2021-02-12 17:45:44'),
(30, 68, 'water bill', '2021-02-12 18:12:52', '2021-02-12 18:12:52'),
(31, 78, 'sanitation fee', '2021-02-15 15:57:53', '2021-02-15 15:57:53'),
(32, 87, 'water bill', '2021-03-01 05:00:40', '2021-03-01 05:00:40'),
(33, 87, 'sanitation fee', '2021-03-01 05:00:40', '2021-03-01 05:00:40'),
(34, 121, 'sanitation fee', '2021-03-09 20:43:13', '2021-03-09 20:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `destination` int(10) NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `destination`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Please would you consider 1 year? I am really interested in your property.\r\nThanks.', 1, '2021-02-11 22:13:27', '2021-02-12 09:28:43'),
(5, 1, 3, 'Thank you very much for your interest. Kindly, call this number +233 203 748 609', 0, '2021-02-12 09:18:30', '2021-02-12 09:18:30'),
(7, 1, 9, 'Message duly received', 1, '2021-02-12 17:21:01', '2021-02-12 17:27:37'),
(9, 2, 1, 'Will you sell this property to me?', 1, '2021-02-12 18:58:39', '2021-02-12 18:59:59'),
(11, 2, 1, 'I <br>This is in regard to <a class=\"text-primary\" target=\"_blank\" href=\"https://oshelter.com/properties/68/details\">Babatunde Properties</a>', 1, '2021-02-15 10:10:32', '2021-02-15 14:04:46'),
(12, 2, 1, 'hello <br>This is in regard to <a class=\"text-primary\" target=\"_blank\" href=\"https://oshelter.com/properties/76/details\">Buckman\'s Haven</a>', 1, '2021-02-25 14:17:50', '2021-02-25 14:50:37'),
(13, 2, 1, 'hi <br>This is in regard to <a class=\"text-primary\" target=\"_blank\" href=\"https://oshelter.com/properties/68/details\">Babatunde Properties</a>', 1, '2021-02-25 14:51:24', '2021-02-25 15:04:38'),
(14, 1, 2, 'Your are welcome to Buckman\'s Haven...', 1, '2021-02-25 14:52:16', '2021-02-25 15:06:07'),
(15, 4, 1, 'HI <br>This is in regard to <a class=\"text-primary\" target=\"_blank\" href=\"https://oshelter.com/properties/60/details\">Cross Properties Ltd.</a>', 1, '2021-02-25 15:07:34', '2021-02-25 15:11:02'),
(16, 1, 4, 'hello Welcome', 1, '2021-02-25 15:12:03', '2021-02-25 15:27:06'),
(17, 4, 1, 'I HAVE 20,000 DOLLORS FOR THE HOUSE WHERE IS YOU OFFICE SO WE TALK BUSINESS', 1, '2021-02-25 15:28:18', '2021-03-10 23:20:19'),
(18, 13, 1, 'Good morning maam I would like to rent your apartment', 1, '2021-03-03 10:43:51', '2021-03-10 23:20:46'),
(19, 13, 1, 'hello Oshelter i am excited to log on here <br>This is in regard to <a class=\"text-primary\" target=\"_blank\" href=\"https://oshelter.com/properties/2/details\">Single self contained rooms</a>', 0, '2021-03-03 10:56:20', '2021-03-03 10:56:20'),
(20, 13, 1, 'Goood Morning Sir, I just booke your space, how do I pay?', 0, '2021-03-03 10:57:39', '2021-03-03 10:57:39'),
(21, 8, 1, 'hello Sir Hoping to hear from you. <br>This is in regard to <a class=\"text-primary\" target=\"_blank\" href=\"https://www.oshelter.com/properties/78/details\">Rocolina Stays Limited</a>', 0, '2021-03-03 12:53:57', '2021-03-03 12:53:57'),
(22, 8, 1, 'shame on you', 0, '2021-03-03 12:56:03', '2021-03-03 12:56:03'),
(23, 8, 1, 'got this', 1, '2021-03-03 12:56:17', '2021-03-10 23:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_02_24_151929_create_properties_table', 1),
(4, '2020_02_26_180933_create_property_amenities_table', 1),
(5, '2020_02_27_191323_create_amenities_table', 1),
(6, '2020_02_27_191515_create_property_images_table', 1),
(7, '2020_02_27_191639_create_property_descriptions_table', 1),
(8, '2020_02_27_191749_create_property_rules_table', 1),
(9, '2020_02_27_191937_create_property_prices_table', 1),
(10, '2020_02_28_164122_create_property_types_table', 1),
(11, '2020_03_04_130937_create_property_hostel_blocks_table', 1),
(12, '2020_03_04_161902_create_hostel_block_rooms_table', 1),
(13, '2020_03_05_093635_create_property_contains_table', 1),
(14, '2020_03_05_094025_create_property_locations_table', 1),
(15, '2020_03_06_222941_create_property_own_rules_table', 1),
(16, '2020_03_09_154720_create_property_hostel_prices_table', 1),
(17, '2020_03_12_213458_create_property_reviews_table', 1),
(18, '2020_03_19_180532_create_property_rents_table', 1),
(19, '2020_03_19_180553_create_property_buys_table', 1),
(20, '2020_03_19_180606_create_property_bids_table', 1),
(21, '2020_03_23_154012_create_messages_table', 1),
(22, '2020_03_23_173334_create_replies_table', 1),
(23, '2020_03_23_180725_create_tickets_table', 1),
(24, '2020_03_23_181046_create_ticket_replies_table', 1),
(25, '2020_03_26_231910_create_user_profiles_table', 1),
(26, '2020_03_27_170156_create_user_saved_properties_table', 1),
(27, '2020_03_27_171234_create_user_wallets_table', 1),
(28, '2020_04_13_182911_create_user_logins_table', 1),
(29, '2020_04_14_174450_create_deactivate_users_table', 1),
(30, '2020_04_15_121039_create_user_activities_table', 1),
(31, '2020_04_15_123102_create_vats_table', 1),
(32, '2020_04_15_145243_create_user_notifications_table', 1),
(33, '2020_04_15_181351_create_account_reactivates_table', 1),
(34, '2020_04_20_165116_create_hostel_block_room_numbers_table', 1),
(35, '2020_04_20_184651_create_hostel_room_amenities_table', 1),
(36, '2020_05_01_191138_create_property_shared_amenities_table', 1),
(37, '2020_06_19_135318_create_user_wallet_transactions_table', 1),
(38, '2020_06_24_115947_create_user_visits_table', 1),
(39, '2020_06_25_144512_create_property_utilities_table', 1),
(40, '2020_08_27_141223_create_user_extension_requests_table', 2),
(41, '2020_09_04_121213_create_user_hostel_visits_table', 3),
(42, '2020_09_14_130530_create_admins_table', 4),
(43, '2020_09_15_124314_create_admin_activities_table', 5),
(44, '2020_09_15_131804_create_service_charges_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `mobile_withdraws`
--

CREATE TABLE `mobile_withdraws` (
  `id` int(11) UNSIGNED NOT NULL,
  `withdraw_id` int(10) UNSIGNED NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `network_type` varchar(20) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_price` double NOT NULL,
  `package_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('fiifipius@gmail.com', '$2y$10$FG36oToRAr5vDt9Umg/NreWWHdfRYt.IoGyH/y0deUjzrjr8I285u', '2021-03-09 03:48:45');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `base` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adult` int(11) DEFAULT NULL,
  `children` int(11) DEFAULT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT 0,
  `step` int(11) NOT NULL DEFAULT 1,
  `done_step` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_id`, `base`, `type`, `type_status`, `title`, `adult`, `children`, `publish`, `step`, `done_step`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'house', 'apartment', 'rent', 'A fully furnished room for rent, Cantonment', 1, 0, 1, 9, 1, 1, '2021-02-08 13:11:58', '2021-02-08 13:39:27'),
(2, 1, 'storey_building', 'room', 'rent', 'Single self contained rooms', 1, 0, 1, 9, 1, 1, '2021-02-08 13:40:48', '2021-02-08 15:16:11'),
(3, 1, 'storey_building', 'room', 'short_stay', '2 sweet single self contained rooms', 2, 0, 1, 9, 1, 1, '2021-02-08 15:18:23', '2021-02-08 15:32:55'),
(4, 1, 'house', 'apartment', 'rent', 'Chamber and Hall Apartment', 1, 0, 1, 9, 1, 1, '2021-02-08 15:41:46', '2021-02-08 15:50:29'),
(5, 1, 'house', 'house', 'rent', '3 Bedroom Apartment', 1, 0, 1, 9, 1, 1, '2021-02-08 15:51:26', '2021-02-08 15:58:18'),
(6, 1, 'storey_building', 'apartment', 'rent', '2 Bedroom House', 1, 0, 1, 9, 1, 1, '2021-02-08 15:59:50', '2021-02-08 16:08:11'),
(8, 1, 'storey_building', 'room', 'rent', '2 Bedroom Apartment', 1, 0, 1, 9, 1, 1, '2021-02-08 16:27:20', '2021-02-08 16:33:59'),
(9, 1, 'house', 'house', 'rent', '2 Bedroom House', 1, 0, 1, 9, 1, 1, '2021-02-08 16:36:58', '2021-02-08 16:56:53'),
(11, 1, 'storey_building', 'apartment', 'short_stay', 'Chamber and Hall Apartment', 2, 2, 1, 9, 1, 1, '2021-02-08 17:20:01', '2021-02-08 17:29:36'),
(12, 1, 'house', 'house', 'rent', '2 Bedroom House', 1, 0, 1, 9, 1, 1, '2021-02-08 17:35:08', '2021-02-09 18:22:30'),
(13, 1, 'storey_building', 'apartment', 'rent', 'Chamber and Hall Apartment', 1, 0, 1, 9, 1, 1, '2021-02-08 18:01:11', '2021-02-09 16:20:12'),
(15, 1, 'house', 'apartment', 'rent', '2 Bedroom Furnished Apartment', 1, 0, 1, 9, 1, 1, '2021-02-09 14:26:32', '2021-02-09 14:41:21'),
(17, 1, 'storey_building', 'apartment', 'short_stay', '2 Bedroom Furnished Apartment', 2, 2, 1, 9, 1, 1, '2021-02-09 15:04:11', '2021-02-09 15:14:15'),
(18, 1, 'storey_building', 'house', 'rent', '3 Bedroom Apartment', 1, 0, 1, 9, 1, 1, '2021-02-09 15:16:40', '2021-02-09 18:50:39'),
(19, 1, 'house', 'room', 'rent', 'Single room self contained', 1, 0, 1, 9, 1, 1, '2021-02-09 15:35:10', '2021-02-09 15:49:54'),
(20, 1, 'house', 'room', 'short_stay', 'Single Self contained', 2, 1, 1, 9, 1, 1, '2021-02-09 15:53:40', '2021-02-09 16:14:09'),
(21, 1, 'storey_building', 'house', 'short_stay', '2 Bedroom Furnished Apartment', 2, 2, 1, 9, 1, 1, '2021-02-09 16:33:57', '2021-02-09 16:54:44'),
(23, 1, 'storey_building', 'house', 'rent', '2 Bedroom Furnished Apartment', 1, 0, 1, 1, 1, 1, '2021-02-09 18:26:37', '2021-02-09 19:06:35'),
(24, 1, 'storey_building', 'house', 'rent', '2 Bedroom Furnished Apartment', 1, 0, 1, 9, 1, 1, '2021-02-09 19:06:57', '2021-02-09 19:18:19'),
(25, 1, 'house', 'apartment', 'rent', '2 Bedroom Furnished Apartment', 1, 0, 1, 9, 1, 1, '2021-02-10 09:50:48', '2021-02-10 10:13:16'),
(26, 1, 'house', 'room', 'short_stay', 'Single Self contained', 1, 0, 1, 9, 1, 1, '2021-02-10 10:18:32', '2021-02-11 17:27:29'),
(28, 1, 'house', 'house', 'rent', '4 for Families', 1, 0, 1, 9, 1, 1, '2021-02-10 17:07:42', '2021-02-10 17:19:00'),
(29, 1, 'storey_building', 'apartment', 'rent', 'More For Less', 1, 0, 1, 9, 1, 1, '2021-02-10 17:30:25', '2021-02-10 17:38:05'),
(32, 1, 'storey_building', 'apartment', 'rent', 'Hot Deal, 3 Bedroom Apartment', 1, 0, 1, 9, 1, 1, '2021-02-10 18:10:21', '2021-02-10 19:07:41'),
(33, 1, 'house', 'room', 'rent', '2 Bedroom Furnished Apartment', 1, 0, 1, 9, 1, 1, '2021-02-10 19:37:17', '2021-02-11 10:16:43'),
(37, 1, 'storey_building', 'apartment', 'rent', 'Modern out, Vintage In', 1, 0, 1, 9, 1, 1, '2021-02-11 14:38:38', '2021-02-11 14:55:45'),
(38, 1, 'storey_building', 'apartment', 'rent', 'Feel At Home Here', 1, 0, 1, 9, 1, 1, '2021-02-11 18:39:12', '2021-02-11 18:48:30'),
(39, 1, 'house', 'room', 'rent', 'Luxury Rooms', 1, 0, 1, 9, 1, 1, '2021-02-11 18:56:51', '2021-02-11 19:03:41'),
(40, 1, 'house', 'room', 'rent', 'Single Self contained', 1, 0, 1, 9, 1, 1, '2021-02-11 19:16:00', '2021-02-11 19:34:27'),
(41, 1, 'storey_building', 'room', 'rent', 'Single Self contained', 1, 0, 0, 1, 0, 0, '2021-02-11 19:36:53', '2021-02-12 12:45:02'),
(42, 1, 'storey_building', 'room', 'rent', 'Single Self contained', 1, 0, 1, 9, 1, 1, '2021-02-11 19:37:03', '2021-02-11 19:46:07'),
(43, 1, 'storey_building', 'hostel', 'rent', 'Buckman\'s Haven', NULL, NULL, 1, 9, 1, 1, '2021-02-12 12:10:00', '2021-02-12 12:22:25'),
(44, 1, 'house', 'hostel', 'rent', 'Thessy Rooms', NULL, NULL, 1, 9, 1, 1, '2021-02-12 12:26:08', '2021-02-12 12:35:05'),
(45, 1, 'storey_building', 'hostel', 'rent', 'Cross Properties Ltd.', 1, 0, 1, 9, 1, 1, '2021-02-12 12:42:37', '2021-02-16 13:57:35'),
(46, 1, 'house', 'house', 'rent', 'Babatunde Properties', 1, 0, 1, 9, 1, 1, '2021-02-12 12:50:54', '2021-02-12 13:00:23'),
(47, 1, 'storey_building', 'house', 'rent', 'Babatunde Properties', 1, 0, 1, 9, 1, 1, '2021-02-12 13:08:35', '2021-02-12 13:14:12'),
(48, 1, 'storey_building', 'house', 'rent', '2 Bedroom Furnished Apartment', 1, 0, 1, 9, 1, 1, '2021-02-12 13:16:22', '2021-02-12 13:20:56'),
(49, 1, 'house', 'house', 'rent', 'Jay\'s Consult', 1, 0, 1, 9, 1, 1, '2021-02-12 13:22:38', '2021-02-12 13:28:16'),
(50, 1, 'house', 'room', 'rent', 'Jay\'s Consult', 1, 0, 1, 9, 1, 1, '2021-02-12 13:30:03', '2021-02-12 13:35:01'),
(51, 1, 'house', 'room', 'short_stay', 'Jay\'s Consult', 1, 2, 1, 9, 1, 1, '2021-02-12 13:35:42', '2021-02-12 13:40:29'),
(52, 1, 'storey_building', 'room', 'rent', 'Thessy Homes', 1, 0, 1, 9, 1, 1, '2021-02-12 13:41:29', '2021-02-12 13:47:07'),
(53, 1, 'storey_building', 'apartment', 'rent', 'Thessy Homes', 1, 0, 1, 9, 1, 1, '2021-02-12 13:47:49', '2021-02-12 13:51:22'),
(54, 1, 'storey_building', 'apartment', 'short_stay', 'Nexted Homes', 3, 2, 1, 9, 1, 1, '2021-02-12 13:53:20', '2021-02-12 13:57:39'),
(55, 1, 'storey_building', 'house', 'rent', 'Nexted Homes', 1, 0, 1, 9, 1, 1, '2021-02-12 13:58:43', '2021-02-12 14:02:51'),
(56, 1, 'house', 'room', 'rent', 'Buckman\'s Haven', 1, 0, 1, 9, 1, 1, '2021-02-12 14:05:34', '2021-02-12 14:20:33'),
(57, 1, 'storey_building', 'house', 'rent', 'Babatunde Properties', 1, 0, 1, 9, 1, 1, '2021-02-12 14:22:21', '2021-02-12 14:58:54'),
(58, 1, 'storey_building', 'apartment', 'rent', 'Myles Real Estate Consult', 1, 0, 1, 9, 1, 1, '2021-02-12 15:00:00', '2021-02-12 15:11:44'),
(59, 1, 'storey_building', 'room', 'rent', 'Myles Real Estate Consult', 1, 0, 1, 9, 1, 1, '2021-02-12 15:12:49', '2021-02-12 15:22:02'),
(60, 1, 'storey_building', 'house', 'rent', 'Cross Properties Ltd.', 1, 0, 1, 9, 1, 1, '2021-02-12 15:24:21', '2021-02-12 15:31:02'),
(61, 1, 'house', 'apartment', 'rent', 'Nexted Homes', 1, 0, 1, 9, 1, 1, '2021-02-12 15:40:39', '2021-02-12 15:52:54'),
(62, 1, 'house', 'room', 'rent', 'Buckman\'s Haven', 1, 0, 1, 9, 1, 1, '2021-02-12 15:54:37', '2021-02-12 16:01:10'),
(63, 1, 'house', 'house', 'rent', 'Babatunde Properties', 1, 0, 1, 9, 1, 1, '2021-02-12 16:02:57', '2021-02-12 16:21:52'),
(64, 1, 'storey_building', 'room', 'rent', 'Salhaji Properties Ltd', 1, 0, 1, 9, 1, 1, '2021-02-12 17:41:33', '2021-02-12 17:46:00'),
(65, 1, 'storey_building', 'apartment', 'rent', 'Cross Properties Ltd.', 1, 0, 1, 9, 1, 1, '2021-02-12 17:46:51', '2021-02-12 17:51:10'),
(66, 1, 'storey_building', 'room', 'rent', 'Buckman\'s Haven', 1, 0, 1, 9, 1, 1, '2021-02-12 17:51:32', '2021-02-12 17:54:35'),
(67, 1, 'storey_building', 'room', 'short_stay', 'Cross Properties Ltd.', 2, 2, 1, 9, 1, 1, '2021-02-12 17:56:58', '2021-02-12 18:01:07'),
(68, 1, 'storey_building', 'apartment', 'rent', 'Babatunde Properties', 1, 0, 1, 9, 1, 1, '2021-02-12 18:08:45', '2021-02-12 18:16:05'),
(69, 1, 'storey_building', 'room', 'rent', 'Babatunde Properties', 1, 0, 1, 9, 1, 1, '2021-02-12 18:25:26', '2021-02-12 19:04:30'),
(70, 1, 'storey_building', 'house', 'rent', 'Salhaji Properties Ltd', 1, 0, 1, 9, 1, 1, '2021-02-12 18:45:31', '2021-02-12 19:02:10'),
(71, 1, 'storey_building', 'house', 'rent', 'Nexted Homes', 1, 0, 1, 9, 1, 1, '2021-02-12 18:52:21', '2021-02-12 19:10:30'),
(72, 1, 'storey_building', 'apartment', 'rent', 'Single Self contained', 1, 0, 1, 9, 1, 1, '2021-02-12 19:11:15', '2021-02-12 19:22:29'),
(73, 1, 'house', 'house', 'rent', '2 Bedroom Furnished Apartment', 1, 0, 1, 9, 1, 1, '2021-02-12 19:24:51', '2021-02-12 19:32:31'),
(74, 1, 'house', 'room', 'rent', 'Nexted Homes', 1, 0, 1, 5, 1, 1, '2021-02-15 12:22:08', '2021-03-09 15:32:16'),
(75, 1, 'house', 'room', 'rent', 'Nexted Homes', 1, 0, 1, 9, 1, 1, '2021-02-15 13:21:54', '2021-02-16 09:54:49'),
(76, 1, 'storey_building', 'apartment', 'rent', 'Buckman\'s Haven', 1, 0, 1, 9, 1, 1, '2021-02-15 13:28:03', '2021-02-16 09:48:27'),
(77, 1, 'storey_building', 'hostel', 'rent', 'Nexted Homes', NULL, NULL, 1, 9, 1, 1, '2021-02-15 14:53:45', '2021-02-15 15:19:20'),
(78, 1, 'house', 'hostel', 'rent', 'Rocolina Stays Limited', NULL, NULL, 1, 9, 1, 1, '2021-02-15 15:44:48', '2021-02-15 15:57:59'),
(79, 1, 'storey_building', 'hostel', 'rent', 'Salhaji Properties Ltd.', NULL, NULL, 1, 9, 1, 1, '2021-02-15 16:03:44', '2021-02-15 16:27:24'),
(80, 1, 'storey_building', 'hostel', 'rent', 'Nana Ekua Rest Ltd.', NULL, NULL, 1, 9, 1, 1, '2021-02-15 17:07:08', '2021-02-15 17:17:08'),
(81, 1, 'storey_building', 'hostel', 'rent', 'Nexted Homes', NULL, NULL, 1, 9, 1, 1, '2021-02-15 17:20:14', '2021-02-15 17:39:32'),
(82, 1, 'house', 'hostel', 'rent', 'Myles Real Estate Consult', NULL, NULL, 1, 9, 1, 1, '2021-02-15 18:07:40', '2021-02-15 18:30:39'),
(83, 1, 'storey_building', 'hostel', 'rent', 'Snapshot', NULL, NULL, 1, 9, 1, 1, '2021-02-16 16:12:40', '2021-02-16 18:07:54'),
(84, 1, 'storey_building', 'hostel', 'rent', 'Nexted Homes', NULL, NULL, 0, 3, 0, 0, '2021-02-19 15:51:24', '2021-03-09 15:34:49'),
(85, 8, 'house', 'apartment', 'short_stay', 'Ultra Modern Apartment', 1, 1, 0, 1, 0, 1, '2021-03-01 04:05:29', '2021-03-01 04:05:29'),
(86, 8, 'house', 'apartment', 'short_stay', 'Ultra Modern Apartment', 1, 1, 1, 9, 1, 1, '2021-03-01 04:05:32', '2021-03-01 04:43:00'),
(87, 8, 'storey_building', 'apartment', 'rent', 'Brand New 4 Bedroom Apartment', 1, 0, 1, 9, 1, 1, '2021-03-01 04:47:44', '2021-03-01 05:00:50'),
(88, 15, 'house', 'room', 'rent', 'Blow Homes', 1, 0, 1, 9, 1, 1, '2021-03-03 14:48:41', '2021-03-03 15:01:57'),
(89, 15, 'house', 'room', 'rent', 'Blow Homes', 1, 0, 1, 9, 1, 1, '2021-03-03 15:14:55', '2021-03-03 15:23:27'),
(90, 15, 'house', 'room', 'rent', 'Blow Homes', 1, 0, 1, 9, 1, 1, '2021-03-03 15:25:11', '2021-03-03 15:34:52'),
(91, 15, 'house', 'house', 'rent', 'Purity Properties Ltd', 1, 0, 1, 9, 1, 1, '2021-03-04 11:04:54', '2021-03-04 11:13:34'),
(92, 15, 'house', 'house', 'rent', 'Nana Ekua Rest Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-04 11:14:06', '2021-03-04 11:19:23'),
(93, 15, 'house', 'house', 'rent', 'Buckman\'s Haven', 1, 0, 1, 9, 1, 1, '2021-03-04 11:20:08', '2021-03-04 11:26:06'),
(94, 15, 'house', 'house', 'rent', 'Rocolina Stays Limited', 1, 0, 1, 9, 1, 1, '2021-03-04 11:26:37', '2021-03-04 11:32:23'),
(95, 15, 'house', 'house', 'rent', 'Nexted Homes', 1, 0, 1, 9, 1, 1, '2021-03-04 11:33:06', '2021-03-04 11:40:19'),
(96, 15, 'house', 'apartment', 'short_stay', 'Salhaji Properties Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-04 11:41:34', '2021-03-04 11:49:00'),
(97, 15, 'house', 'apartment', 'short_stay', 'Wuraland Properties', 2, 3, 1, 9, 1, 1, '2021-03-04 11:50:55', '2021-03-04 11:56:11'),
(98, 15, 'house', 'hostel', 'rent', 'Fromtom Homes', NULL, NULL, 1, 9, 1, 1, '2021-03-04 12:03:01', '2021-03-04 12:24:45'),
(99, 15, 'house', 'hostel', 'rent', 'Wuraland Properties', NULL, NULL, 1, 9, 1, 1, '2021-03-04 12:27:28', '2021-03-04 12:36:38'),
(100, 15, 'storey_building', 'hostel', 'rent', 'Jayso\'s Place Ltd.', NULL, NULL, 1, 9, 1, 1, '2021-03-04 12:38:55', '2021-03-04 12:48:43'),
(101, 15, 'storey_building', 'hostel', 'rent', 'Consistent Wins Ltd', NULL, NULL, 1, 9, 1, 1, '2021-03-04 12:50:14', '2021-03-04 13:05:21'),
(102, 15, 'storey_building', 'hostel', 'rent', 'Consistent Wins Ltd', NULL, NULL, 1, 9, 1, 1, '2021-03-04 13:11:52', '2021-03-04 13:23:18'),
(103, 15, 'storey_building', 'hostel', 'rent', 'Buckman\'s Haven', NULL, NULL, 1, 9, 1, 1, '2021-03-04 13:23:59', '2021-03-04 13:38:05'),
(104, 15, 'house', 'hostel', 'rent', 'Nana Ekua Rest Ltd.', NULL, NULL, 1, 9, 1, 1, '2021-03-04 14:03:29', '2021-03-04 14:13:04'),
(105, 15, 'house', 'hostel', 'rent', 'Nana Ekua Rest Ltd.', NULL, NULL, 1, 9, 1, 1, '2021-03-04 14:50:03', '2021-03-04 15:23:26'),
(106, 15, 'storey_building', 'hostel', 'rent', 'Sweet Space For Pleasant People', NULL, NULL, 1, 9, 1, 1, '2021-03-04 15:29:06', '2021-03-04 16:57:04'),
(107, 15, 'storey_building', 'hostel', 'rent', 'Consistent Wins Ltd', NULL, NULL, 1, 9, 1, 1, '2021-03-04 17:01:17', '2021-03-04 17:19:56'),
(108, 15, 'house', 'hostel', 'rent', 'Blow Homes', NULL, NULL, 1, 9, 1, 1, '2021-03-04 18:22:52', '2021-03-04 18:32:17'),
(109, 15, 'house', 'house', 'rent', 'Family Fun Matters Most', 1, 0, 1, 9, 1, 1, '2021-03-04 18:33:45', '2021-03-04 18:54:33'),
(110, 15, 'storey_building', 'room', 'rent', 'Rocolina Stays Limited', 1, 0, 1, 9, 1, 1, '2021-03-04 19:02:47', '2021-03-04 19:10:34'),
(111, 15, 'storey_building', 'hostel', 'rent', 'Rocolina Stays Limited', NULL, NULL, 1, 9, 1, 1, '2021-03-04 19:22:43', '2021-03-04 19:47:50'),
(112, 15, 'house', 'apartment', 'rent', 'Pumpy Homes', 1, 0, 1, 9, 1, 1, '2021-03-04 19:49:24', '2021-03-04 19:56:21'),
(113, 15, 'house', 'apartment', 'rent', 'Consistent Wins Ltd', 1, 0, 1, 9, 1, 1, '2021-03-04 19:57:29', '2021-03-05 14:49:07'),
(114, 15, 'house', 'apartment', 'rent', 'Nana Ekua Rest Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-05 14:49:56', '2021-03-05 14:55:01'),
(115, 15, 'house', 'hostel', 'rent', 'Sweet Space For Pleasant People', NULL, NULL, 1, 9, 1, 1, '2021-03-05 14:56:02', '2021-03-05 15:07:37'),
(116, 15, 'house', 'hostel', 'rent', 'Fromtom Homes', NULL, NULL, 1, 9, 1, 1, '2021-03-05 15:13:06', '2021-03-10 15:09:43'),
(117, 1, 'house', 'hostel', 'rent', 'Jayso\'s Place Ltd.', NULL, NULL, 1, 9, 1, 1, '2021-03-09 15:36:16', '2021-03-09 15:42:39'),
(118, 1, 'house', 'hostel', 'rent', 'Wuraland Properties', NULL, NULL, 1, 9, 1, 1, '2021-03-09 15:43:41', '2021-03-09 15:48:23'),
(119, 1, 'storey_building', 'apartment', 'rent', 'Small Voice Homes', 1, 0, 1, 9, 1, 1, '2021-03-09 15:49:42', '2021-03-09 15:55:28'),
(120, 1, 'storey_building', 'apartment', 'rent', 'Bob Shandy Properties', 1, 0, 0, 1, 0, 0, '2021-03-09 15:56:01', '2021-03-11 14:12:03'),
(121, 1, 'storey_building', 'apartment', 'rent', 'JJ\'s Nest Properties', 1, 0, 1, 9, 1, 1, '2021-03-09 15:57:17', '2021-03-09 20:43:20'),
(122, 1, 'house', 'apartment', 'rent', 'Kowa Lands and Properties Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-09 20:53:00', '2021-03-09 21:00:31'),
(123, 1, 'house', 'house', 'rent', 'Myles Real Estate Consult', 1, 0, 1, 9, 1, 1, '2021-03-09 21:03:55', '2021-03-09 21:09:06'),
(124, 1, 'house', 'apartment', 'rent', 'Consistent Wins Ltd', 1, 0, 1, 9, 1, 1, '2021-03-09 21:11:06', '2021-03-09 21:22:40'),
(125, 1, 'storey_building', 'apartment', 'rent', 'Gyamfua Afie Ltd', 1, 0, 1, 9, 1, 1, '2021-03-09 21:35:05', '2021-03-09 22:00:44'),
(126, 1, 'house', 'apartment', 'rent', 'Nana Ekua Rest Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-09 22:08:54', '2021-03-09 22:15:27'),
(127, 1, 'house', 'house', 'rent', 'Rocolina Stays Limited', 1, 0, 1, 9, 1, 1, '2021-03-09 22:16:04', '2021-03-09 22:20:51'),
(128, 1, 'storey_building', 'hostel', 'rent', 'Sweet Space For Pleasant People', NULL, NULL, 1, 9, 1, 1, '2021-03-09 22:22:55', '2021-03-09 22:46:35'),
(129, 1, 'house', 'hostel', 'rent', 'Buckman\'s Haven', NULL, NULL, 1, 9, 1, 1, '2021-03-09 22:51:24', '2021-03-09 22:58:07'),
(130, 1, 'house', 'room', 'rent', 'Blow Homes', 1, 0, 1, 9, 1, 1, '2021-03-09 22:58:59', '2021-03-09 23:06:14'),
(131, 15, 'storey_building', 'hostel', 'rent', 'Patupa Homes', NULL, NULL, 1, 9, 1, 1, '2021-03-10 15:10:29', '2021-03-10 15:18:18'),
(132, 15, 'house', 'hostel', 'rent', 'Gyamfua Afie Ltd', NULL, NULL, 1, 9, 1, 1, '2021-03-10 15:19:56', '2021-03-10 15:34:30'),
(133, 15, 'storey_building', 'hostel', 'rent', 'Consistent Wins Ltd', NULL, NULL, 1, 9, 1, 1, '2021-03-10 15:41:18', '2021-03-10 15:51:02'),
(134, 15, 'house', 'house', 'rent', 'Buckman\'s Haven', 1, 0, 1, 9, 1, 1, '2021-03-10 15:51:48', '2021-03-10 15:56:14'),
(135, 15, 'house', 'house', 'rent', 'Kowa Lands and Properties Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-10 15:57:57', '2021-03-10 16:01:38'),
(136, 15, 'house', 'apartment', 'rent', 'Nexted Homes', 1, 0, 1, 9, 1, 1, '2021-03-10 16:02:32', '2021-03-10 16:06:32'),
(137, 15, 'storey_building', 'house', 'rent', 'JJ\'s Nest Properties', 1, 0, 1, 9, 1, 1, '2021-03-10 16:21:14', '2021-03-10 16:25:22'),
(138, 15, 'house', 'house', 'rent', 'Joe Banko Ltd', 1, 0, 1, 9, 1, 1, '2021-03-10 16:27:11', '2021-03-10 16:32:23'),
(139, 15, 'house', 'room', 'rent', 'Fromtom Homes', 1, 0, 1, 9, 1, 1, '2021-03-10 16:34:16', '2021-03-10 16:39:56'),
(140, 15, 'house', 'room', 'rent', 'Myles Real Estate Consult', 1, 0, 1, 9, 1, 1, '2021-03-10 16:42:41', '2021-03-10 16:49:01'),
(141, 15, 'house', 'room', 'rent', 'Eureka Homes', 1, 0, 1, 9, 1, 1, '2021-03-10 16:50:44', '2021-03-10 16:56:21'),
(142, 15, 'house', 'house', 'rent', 'Salhaji Properties Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-10 17:02:53', '2021-03-10 17:10:23'),
(143, 15, 'house', 'apartment', 'rent', 'Rocolina Stays Limited', 1, 0, 1, 9, 1, 1, '2021-03-10 17:13:26', '2021-03-10 17:23:06'),
(144, 15, 'house', 'house', 'rent', 'Rocolina Stays Limited', 1, 0, 1, 9, 1, 1, '2021-03-10 17:31:11', '2021-03-10 17:43:52'),
(145, 15, 'house', 'house', 'rent', 'Nexted Homes', 1, 0, 1, 9, 1, 1, '2021-03-10 17:44:27', '2021-03-10 17:49:23'),
(146, 15, 'house', 'house', 'rent', 'Buckman\'s Haven', 1, 0, 1, 9, 1, 1, '2021-03-10 17:53:34', '2021-03-10 18:03:48'),
(147, 15, 'house', 'room', 'rent', 'Myles Real Estate Consult', 1, 0, 1, 9, 1, 1, '2021-03-10 18:04:37', '2021-03-10 18:26:25'),
(148, 15, 'storey_building', 'room', 'rent', 'Sweet Space For Pleasant People', 1, 0, 1, 9, 1, 1, '2021-03-10 19:21:18', '2021-03-10 19:28:04'),
(149, 15, 'house', 'room', 'rent', 'Consistent Wins Ltd', 1, 0, 1, 9, 1, 1, '2021-03-10 19:29:33', '2021-03-10 19:46:39'),
(150, 15, 'house', 'house', 'rent', 'Family Fun Matters Most', 1, 0, 1, 9, 1, 1, '2021-03-10 19:49:40', '2021-03-10 21:56:33'),
(151, 1, 'house', 'house', 'rent', 'Wuraland Properties', 1, 0, 1, 9, 1, 1, '2021-03-11 14:12:21', '2021-03-11 14:18:44'),
(152, 1, 'house', 'room', 'rent', 'Rocolina Stays Limited', 1, 0, 1, 9, 1, 1, '2021-03-11 14:19:01', '2021-03-11 14:24:43'),
(153, 1, 'storey_building', 'house', 'rent', 'Nana Ekua Rest Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-11 14:25:00', '2021-03-11 14:46:55'),
(154, 1, 'house', 'room', 'rent', 'Eureka Homes', 1, 0, 1, 9, 1, 1, '2021-03-11 14:49:12', '2021-03-11 14:54:09'),
(155, 1, 'house', 'room', 'rent', 'Gyamfua Afie Ltd', 1, 0, 1, 9, 1, 1, '2021-03-11 14:57:43', '2021-03-11 15:05:16'),
(156, 1, 'storey_building', 'house', 'rent', 'Kowa Lands and Properties Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-11 15:06:37', '2021-03-11 15:12:24'),
(157, 1, 'house', 'house', 'rent', 'Blow Homes', 1, 0, 1, 9, 1, 1, '2021-03-11 15:13:14', '2021-03-11 15:19:22'),
(158, 1, 'house', 'house', 'rent', 'Consistent Wins Ltd', 1, 0, 1, 9, 1, 1, '2021-03-11 15:19:50', '2021-03-11 16:23:49'),
(159, 1, 'storey_building', 'hostel', 'rent', 'Gyamfua Afie Ltd', NULL, NULL, 1, 9, 1, 1, '2021-03-11 16:26:17', '2021-03-11 16:31:47'),
(160, 1, 'house', 'room', 'rent', 'Nexted Homes', 1, 0, 1, 9, 1, 1, '2021-03-11 16:33:51', '2021-03-11 16:37:39'),
(161, 1, 'house', 'house', 'rent', 'Consistent Wins Ltd', 1, 0, 1, 9, 1, 1, '2021-03-11 16:41:01', '2021-03-11 16:52:17'),
(162, 1, 'house', 'house', 'rent', 'Buckman\'s Haven', 1, 0, 0, 1, 0, 0, '2021-03-11 16:56:13', '2021-03-19 16:09:06'),
(163, 1, 'house', 'apartment', 'rent', 'Buckman\'s Haven', 1, 0, 1, 9, 1, 1, '2021-03-11 16:56:33', '2021-03-11 17:04:48'),
(164, 1, 'house', 'house', 'rent', 'Rocolina Stays Limited', 1, 0, 1, 9, 1, 1, '2021-03-11 17:09:45', '2021-03-11 17:26:40'),
(165, 1, 'house', 'house', 'rent', 'Jayso\'s Place Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-11 17:29:32', '2021-03-11 17:33:30'),
(166, 1, 'house', 'apartment', 'rent', 'Nana Ekua Rest Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-11 17:34:21', '2021-03-11 17:44:22'),
(167, 1, 'house', 'house', 'rent', 'Joe Banko Ltd', 1, 0, 1, 9, 1, 1, '2021-03-11 17:51:09', '2021-03-11 17:56:01'),
(168, 1, 'house', 'room', 'rent', 'Rocolina Stays Limited', 1, 0, 1, 9, 1, 1, '2021-03-11 17:56:27', '2021-03-11 18:06:19'),
(169, 1, 'storey_building', 'apartment', 'rent', 'Buckman\'s Haven', 1, 0, 1, 9, 1, 1, '2021-03-11 18:07:42', '2021-03-11 18:13:27'),
(170, 1, 'house', 'apartment', 'rent', 'Myles Real Estate Consult', 1, 0, 1, 9, 1, 1, '2021-03-11 18:15:26', '2021-03-11 18:23:34'),
(171, 1, 'storey_building', 'house', 'rent', 'Bob Shan Properties', 1, 0, 1, 9, 1, 1, '2021-03-11 18:26:45', '2021-03-11 20:03:39'),
(172, 1, 'house', 'house', 'rent', 'Nexted Homes', 1, 0, 1, 9, 1, 1, '2021-03-11 20:03:58', '2021-03-11 20:07:17'),
(173, 1, 'house', 'hostel', 'rent', 'Kowa Lands and Properties Ltd.', NULL, NULL, 1, 9, 1, 1, '2021-03-11 20:07:44', '2021-03-11 20:12:35'),
(174, 1, 'house', 'hostel', 'rent', 'JJ\'s Nest Properties', NULL, NULL, 1, 9, 1, 1, '2021-03-11 20:14:23', '2021-03-11 20:19:57'),
(175, 1, 'house', 'hostel', 'rent', 'Nana Ekua Rest Ltd.', NULL, NULL, 1, 9, 1, 1, '2021-03-11 20:20:27', '2021-03-11 20:27:37'),
(176, 1, 'house', 'house', 'rent', 'Wuraland Properties', 1, 0, 1, 9, 1, 1, '2021-03-11 20:28:29', '2021-03-11 20:31:20'),
(177, 1, 'house', 'apartment', 'rent', 'Myles Real Estate Consult', 1, 0, 1, 9, 1, 1, '2021-03-11 20:33:21', '2021-03-11 20:36:46'),
(178, 1, 'house', 'house', 'rent', 'Eureka Homes', 1, 0, 1, 9, 1, 1, '2021-03-11 20:38:26', '2021-03-11 20:46:45'),
(179, 1, 'house', 'house', 'rent', 'Buckman\'s Haven', 1, 0, 1, 9, 1, 1, '2021-03-11 20:47:39', '2021-03-11 20:52:58'),
(180, 1, 'house', 'house', 'rent', 'Buckman\'s Haven', 1, 0, 1, 9, 1, 1, '2021-03-11 21:17:32', '2021-03-11 21:25:37'),
(181, 1, 'house', 'house', 'rent', 'Rocolina Stays Limited', 1, 0, 1, 9, 1, 1, '2021-03-11 21:27:04', '2021-03-11 21:48:17'),
(182, 1, 'house', 'room', 'rent', 'Joe Banko Ltd', 1, 0, 1, 9, 1, 1, '2021-03-11 21:49:15', '2021-03-11 21:55:27'),
(183, 1, 'house', 'house', 'rent', 'Consistent Wins Ltd', 1, 0, 1, 9, 1, 1, '2021-03-11 21:57:47', '2021-03-11 22:04:10'),
(184, 1, 'house', 'hostel', 'rent', 'Myles Real Estate Consult', NULL, NULL, 1, 9, 1, 1, '2021-03-11 22:08:14', '2021-03-11 22:20:38'),
(185, 1, 'storey_building', 'hostel', 'rent', 'Bob Shan Properties', NULL, NULL, 1, 9, 1, 1, '2021-03-11 22:23:56', '2021-03-11 22:30:18'),
(186, 1, 'storey_building', 'house', 'rent', 'Maricita Homes', 1, 0, 1, 9, 1, 1, '2021-03-11 22:34:37', '2021-03-11 22:48:53'),
(187, 1, 'house', 'house', 'rent', 'Rocolina Stays Limited', 1, 0, 1, 9, 1, 1, '2021-03-15 14:28:39', '2021-03-15 14:38:39'),
(188, 1, 'house', 'house', 'rent', 'Myles Real Estate Consult', 1, 0, 1, 9, 1, 1, '2021-03-15 14:47:41', '2021-03-15 15:07:59'),
(189, 1, 'house', 'house', 'rent', 'Eureka Homes', 1, 0, 1, 9, 1, 1, '2021-03-15 19:23:03', '2021-03-15 19:29:58'),
(190, 1, 'storey_building', 'house', 'rent', 'Nexted Homes', 1, 0, 1, 9, 1, 1, '2021-03-15 19:30:58', '2021-03-15 19:48:45'),
(191, 1, 'storey_building', 'house', 'rent', 'Blow Homes', 1, 0, 1, 9, 1, 1, '2021-03-15 19:49:12', '2021-03-15 19:51:28'),
(192, 1, 'house', 'apartment', 'rent', 'Rocolina Stays Limited', 1, 0, 1, 9, 1, 1, '2021-03-15 19:52:55', '2021-03-15 19:58:25'),
(193, 1, 'house', 'house', 'rent', 'Maricita Homes', 1, 0, 1, 9, 1, 1, '2021-03-15 19:58:44', '2021-03-15 20:04:10'),
(194, 1, 'house', 'house', 'rent', 'Jayso\'s Place Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-15 20:04:36', '2021-03-15 20:08:14'),
(195, 1, 'storey_building', 'room', 'rent', 'Nana Ekua Rest Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-15 20:09:57', '2021-03-15 20:14:41'),
(196, 1, 'house', 'house', 'rent', 'Kowa Lands and Properties Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-15 20:15:32', '2021-03-15 20:22:57'),
(197, 1, 'house', 'house', 'rent', 'Nexted Homes', 1, 0, 1, 9, 1, 1, '2021-03-15 20:23:41', '2021-03-15 20:28:09'),
(198, 1, 'storey_building', 'house', 'rent', 'Nana Ekua Rest Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-15 20:28:41', '2021-03-15 20:31:51'),
(199, 1, 'storey_building', 'house', 'rent', 'Bob Shan Properties', 1, 0, 1, 9, 1, 1, '2021-03-15 20:32:12', '2021-03-15 20:39:14'),
(200, 1, 'house', 'room', 'rent', 'Rocolina Stays Limited', 1, 0, 1, 9, 1, 1, '2021-03-15 20:39:50', '2021-03-15 20:52:11'),
(201, 1, 'house', 'room', 'rent', 'Joe Banko Ltd', 1, 0, 1, 9, 1, 1, '2021-03-15 21:00:55', '2021-03-15 21:08:47'),
(202, 1, 'house', 'room', 'rent', 'Eureka Homes', 1, 0, 1, 9, 1, 1, '2021-03-15 21:11:26', '2021-03-15 21:17:10'),
(203, 1, 'house', 'house', 'rent', 'Kowa Lands and Properties Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-15 21:18:32', '2021-03-15 21:22:47'),
(204, 1, 'house', 'house', 'rent', 'Wuraland Properties', 1, 0, 1, 9, 1, 1, '2021-03-15 21:23:47', '2021-03-15 21:29:46'),
(205, 1, 'house', 'room', 'rent', 'Wuraland Properties', 1, 0, 1, 9, 1, 1, '2021-03-15 21:30:46', '2021-03-15 21:40:55'),
(206, 1, 'house', 'room', 'rent', 'Kowa Lands and Properties Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-15 21:42:31', '2021-03-15 21:49:49'),
(207, 1, 'house', 'house', 'rent', 'Buckman\'s Haven', 1, 0, 1, 9, 1, 1, '2021-03-15 21:52:45', '2021-03-15 22:00:19'),
(208, 1, 'house', 'house', 'rent', 'Consistent Wins Ltd', 1, 0, 1, 9, 1, 1, '2021-03-15 22:02:29', '2021-03-15 22:07:20'),
(209, 1, 'house', 'house', 'rent', 'Sweet Space For Pleasant People', 1, 0, 1, 9, 1, 1, '2021-03-15 22:09:12', '2021-03-15 22:14:29'),
(210, 1, 'storey_building', 'house', 'rent', 'Small Voice Homes', 1, 0, 1, 9, 1, 1, '2021-03-15 22:17:26', '2021-03-15 22:26:41'),
(211, 1, 'house', 'house', 'rent', 'Myles Real Estate Consult', 1, 0, 1, 9, 1, 1, '2021-03-15 22:27:38', '2021-03-15 22:33:48'),
(212, 1, 'storey_building', 'apartment', 'rent', 'Small Voice Homes', 1, 0, 1, 9, 1, 1, '2021-03-15 22:34:22', '2021-03-15 22:39:23'),
(213, 1, 'house', 'house', 'rent', 'Buckman\'s Haven', 1, 0, 1, 9, 1, 1, '2021-03-15 22:40:25', '2021-03-15 22:47:37'),
(214, 1, 'storey_building', 'house', 'rent', 'Nana Ekua Rest Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-15 22:48:10', '2021-03-15 22:51:34'),
(215, 1, 'house', 'room', 'rent', 'Louis Maglo Properties', 1, 0, 1, 9, 1, 1, '2021-03-15 22:52:17', '2021-03-15 22:55:36'),
(216, 1, 'house', 'apartment', 'rent', 'Louis Maglo Properties', 1, 0, 1, 9, 1, 1, '2021-03-15 22:56:41', '2021-03-15 23:00:15'),
(217, 1, 'house', 'room', 'rent', 'Jayso\'s Place Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-19 16:03:50', '2021-03-19 20:12:40'),
(218, 1, 'storey_building', 'room', 'rent', 'Jayso\'s Place Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-19 16:09:34', '2021-03-19 16:15:42'),
(219, 1, 'storey_building', 'room', 'rent', 'Jayso\'s Place Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-19 16:19:19', '2021-03-19 16:22:28'),
(220, 1, 'storey_building', 'room', 'rent', 'Rocolina Stays Limited', 1, 0, 1, 9, 1, 1, '2021-03-19 16:23:56', '2021-03-19 16:28:34'),
(221, 1, 'storey_building', 'room', 'rent', 'Rocolina Stays Limited', 1, 0, 1, 9, 1, 1, '2021-03-19 16:29:16', '2021-03-19 16:31:50'),
(222, 1, 'storey_building', 'room', 'rent', 'Rocolina Stays Limited', 1, 0, 1, 9, 1, 1, '2021-03-19 16:32:14', '2021-03-19 16:34:49'),
(223, 1, 'storey_building', 'room', 'rent', 'Rocolina Stays Limited', 1, 0, 1, 9, 1, 1, '2021-03-19 16:36:37', '2021-03-19 16:39:18'),
(224, 1, 'storey_building', 'room', 'rent', 'JJ\'s Nest Properties', 1, 0, 1, 9, 1, 1, '2021-03-19 16:40:47', '2021-03-19 16:44:01'),
(225, 1, 'storey_building', 'room', 'rent', 'JJ\'s Nest Properties', 1, 0, 1, 9, 1, 1, '2021-03-19 16:44:20', '2021-03-19 17:17:31'),
(226, 1, 'storey_building', 'room', 'rent', 'Joe Banko Ltd', 1, 0, 1, 9, 1, 1, '2021-03-19 17:28:09', '2021-03-19 17:31:55'),
(227, 1, 'storey_building', 'room', 'rent', 'Kowa Lands and Properties Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-19 17:32:50', '2021-03-19 17:39:29'),
(228, 1, 'house', 'room', 'rent', 'Nexted Homes', 1, 0, 1, 9, 1, 1, '2021-03-19 17:40:42', '2021-03-19 17:44:42'),
(229, 1, 'house', 'room', 'rent', 'Nana Ekua Rest Ltd.', 1, 0, 1, 9, 1, 1, '2021-03-19 17:46:41', '2021-03-19 18:15:09'),
(230, 1, 'house', 'room', 'rent', 'Maricita Homes', 1, 0, 1, 9, 1, 1, '2021-03-19 18:16:43', '2021-03-19 18:20:35'),
(231, 1, 'house', 'room', 'rent', 'Bob Shan Properties', 1, 0, 1, 9, 1, 1, '2021-03-19 18:24:14', '2021-03-19 18:30:20'),
(232, 1, 'house', 'room', 'rent', 'Eureka Homes', 1, 0, 1, 9, 1, 1, '2021-03-19 18:30:57', '2021-03-19 18:37:28'),
(233, 1, 'house', 'room', 'rent', 'Rocolina Stays Limited', 1, 0, 1, 9, 1, 1, '2021-03-19 18:39:29', '2021-03-19 18:43:04'),
(234, 1, 'house', 'room', 'rent', 'Myles Real Estate Consult', 1, 0, 1, 9, 1, 1, '2021-03-19 19:31:38', '2021-03-19 19:43:26'),
(235, 1, 'storey_building', 'room', 'rent', 'Myles Real Estate Consult', 1, 0, 1, 9, 1, 1, '2021-03-19 19:44:18', '2021-03-19 20:00:43'),
(236, 1, 'house', 'room', 'rent', 'Eureka Homes', 1, 0, 1, 9, 1, 1, '2021-03-19 20:02:52', '2021-03-23 14:59:46'),
(237, 1, 'storey_building', 'room', 'rent', 'Louis Maglo Properties', 1, 0, 0, 5, 0, 1, '2021-03-19 20:58:44', '2021-03-19 21:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `property_amenities`
--

CREATE TABLE `property_amenities` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_amenities`
--

INSERT INTO `property_amenities` (`id`, `property_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'TV', '2021-02-08 13:14:46', '2021-02-08 13:14:46'),
(2, 1, 'Fridge', '2021-02-08 13:14:47', '2021-02-08 13:14:47'),
(3, 1, 'Towel,Soap', '2021-02-08 13:14:47', '2021-02-08 13:14:47'),
(4, 1, 'Fire Extinguisher', '2021-02-08 13:14:47', '2021-02-08 13:14:47'),
(5, 1, 'Smoke Detector', '2021-02-08 13:14:47', '2021-02-08 13:14:47'),
(6, 1, 'Air Conditioning', '2021-02-08 13:14:47', '2021-02-08 13:14:47'),
(7, 1, 'Wardrobe', '2021-02-08 13:14:47', '2021-02-08 13:14:47'),
(8, 2, 'Bed', '2021-02-08 13:43:04', '2021-02-08 13:43:04'),
(9, 2, 'Fridge', '2021-02-08 13:43:04', '2021-02-08 13:43:04'),
(10, 2, 'Towel,Soap', '2021-02-08 13:43:05', '2021-02-08 13:43:05'),
(11, 2, 'Fire Extinguisher', '2021-02-08 13:43:05', '2021-02-08 13:43:05'),
(12, 2, 'Smoke Detector', '2021-02-08 13:43:05', '2021-02-08 13:43:05'),
(13, 2, 'Ceiling Fan', '2021-02-08 13:43:05', '2021-02-08 13:43:05'),
(14, 2, 'Wardrobe', '2021-02-08 13:43:05', '2021-02-08 13:43:05'),
(15, 3, 'Bed', '2021-02-08 15:20:04', '2021-02-08 15:20:04'),
(16, 3, 'TV', '2021-02-08 15:20:04', '2021-02-08 15:20:04'),
(17, 3, 'Fridge', '2021-02-08 15:20:04', '2021-02-08 15:20:04'),
(18, 3, 'Fire Extinguisher', '2021-02-08 15:20:04', '2021-02-08 15:20:04'),
(19, 3, 'Air Conditioning', '2021-02-08 15:20:04', '2021-02-08 15:20:04'),
(20, 3, 'Ceiling Fan', '2021-02-08 15:20:04', '2021-02-08 15:20:04'),
(21, 3, 'Wardrobe', '2021-02-08 15:20:04', '2021-02-08 15:20:04'),
(22, 4, 'Bed', '2021-02-08 15:43:10', '2021-02-08 15:43:10'),
(23, 4, 'TV', '2021-02-08 15:43:10', '2021-02-08 15:43:10'),
(24, 4, 'Fire Extinguisher', '2021-02-08 15:43:10', '2021-02-08 15:43:10'),
(25, 4, 'Smoke Detector', '2021-02-08 15:43:10', '2021-02-08 15:43:10'),
(26, 4, 'Air Conditioning', '2021-02-08 15:43:10', '2021-02-08 15:43:10'),
(27, 4, 'Ceiling Fan', '2021-02-08 15:43:10', '2021-02-08 15:43:10'),
(28, 4, 'Wardrobe', '2021-02-08 15:43:10', '2021-02-08 15:43:10'),
(29, 5, 'Bed', '2021-02-08 15:53:07', '2021-02-08 15:53:07'),
(30, 5, 'TV', '2021-02-08 15:53:07', '2021-02-08 15:53:07'),
(31, 5, 'Fridge', '2021-02-08 15:53:07', '2021-02-08 15:53:07'),
(32, 5, 'Internet Connection', '2021-02-08 15:53:07', '2021-02-08 15:53:07'),
(33, 5, 'Fire Extinguisher', '2021-02-08 15:53:07', '2021-02-08 15:53:07'),
(34, 5, 'Smoke Detector', '2021-02-08 15:53:07', '2021-02-08 15:53:07'),
(35, 5, 'Ceiling Fan', '2021-02-08 15:53:07', '2021-02-08 15:53:07'),
(36, 5, 'Learning Light', '2021-02-08 15:53:07', '2021-02-08 15:53:07'),
(37, 6, 'Bed', '2021-02-08 16:01:47', '2021-02-08 16:01:47'),
(38, 6, 'TV', '2021-02-08 16:01:47', '2021-02-08 16:01:47'),
(39, 6, 'Fire Extinguisher', '2021-02-08 16:01:47', '2021-02-08 16:01:47'),
(40, 6, 'Air Conditioning', '2021-02-08 16:01:47', '2021-02-08 16:01:47'),
(41, 6, 'Ceiling Fan', '2021-02-08 16:01:47', '2021-02-08 16:01:47'),
(42, 8, 'Bed', '2021-02-08 16:28:37', '2021-02-08 16:28:37'),
(43, 8, 'TV', '2021-02-08 16:28:37', '2021-02-08 16:28:37'),
(44, 8, 'Fridge', '2021-02-08 16:28:37', '2021-02-08 16:28:37'),
(45, 8, 'Fire Extinguisher', '2021-02-08 16:28:37', '2021-02-08 16:28:37'),
(46, 8, 'Ceiling Fan', '2021-02-08 16:28:37', '2021-02-08 16:28:37'),
(47, 8, 'Learning Light', '2021-02-08 16:28:37', '2021-02-08 16:28:37'),
(48, 9, 'Fire Extinguisher', '2021-02-08 16:38:32', '2021-02-08 16:38:32'),
(49, 9, 'Smoke Detector', '2021-02-08 16:38:32', '2021-02-08 16:38:32'),
(50, 9, 'Air Conditioning', '2021-02-08 16:38:32', '2021-02-08 16:38:32'),
(51, 9, 'Ceiling Fan', '2021-02-08 16:38:32', '2021-02-08 16:38:32'),
(52, 11, 'Bed', '2021-02-08 17:21:59', '2021-02-08 17:21:59'),
(53, 11, 'Fire Extinguisher', '2021-02-08 17:21:59', '2021-02-08 17:21:59'),
(54, 11, 'Ceiling Fan', '2021-02-08 17:21:59', '2021-02-08 17:21:59'),
(55, 12, 'Fire Extinguisher', '2021-02-08 17:36:10', '2021-02-08 17:36:10'),
(56, 12, 'Smoke Detector', '2021-02-08 17:36:10', '2021-02-08 17:36:10'),
(57, 12, 'Ceiling Fan', '2021-02-08 17:36:10', '2021-02-08 17:36:10'),
(58, 12, 'Wardrobe', '2021-02-08 17:36:10', '2021-02-08 17:36:10'),
(59, 13, 'Fire Extinguisher', '2021-02-08 18:05:38', '2021-02-08 18:05:38'),
(60, 13, 'Smoke Detector', '2021-02-08 18:05:38', '2021-02-08 18:05:38'),
(61, 13, 'Air Conditioning', '2021-02-08 18:05:38', '2021-02-08 18:05:38'),
(62, 13, 'Ceiling Fan', '2021-02-08 18:05:38', '2021-02-08 18:05:38'),
(63, 15, 'Bed', '2021-02-09 14:27:26', '2021-02-09 14:27:26'),
(64, 15, 'Fire Extinguisher', '2021-02-09 14:27:26', '2021-02-09 14:27:26'),
(65, 15, 'Smoke Detector', '2021-02-09 14:27:27', '2021-02-09 14:27:27'),
(66, 15, 'Ceiling Fan', '2021-02-09 14:27:27', '2021-02-09 14:27:27'),
(67, 17, 'Bed', '2021-02-09 15:05:03', '2021-02-09 15:05:03'),
(68, 17, 'TV', '2021-02-09 15:05:03', '2021-02-09 15:05:03'),
(69, 17, 'Fridge', '2021-02-09 15:05:03', '2021-02-09 15:05:03'),
(70, 17, 'Internet Connection', '2021-02-09 15:05:03', '2021-02-09 15:05:03'),
(71, 17, 'Telephone', '2021-02-09 15:05:03', '2021-02-09 15:05:03'),
(72, 17, 'Towel,Soap', '2021-02-09 15:05:03', '2021-02-09 15:05:03'),
(73, 17, 'Fire Extinguisher', '2021-02-09 15:05:03', '2021-02-09 15:05:03'),
(74, 17, 'Smoke Detector', '2021-02-09 15:05:03', '2021-02-09 15:05:03'),
(75, 17, 'Ceiling Fan', '2021-02-09 15:05:03', '2021-02-09 15:05:03'),
(76, 17, 'Wardrobe', '2021-02-09 15:05:03', '2021-02-09 15:05:03'),
(77, 18, 'Fire Extinguisher', '2021-02-09 15:17:23', '2021-02-09 15:17:23'),
(78, 18, 'Smoke Detector', '2021-02-09 15:17:23', '2021-02-09 15:17:23'),
(79, 18, 'Ceiling Fan', '2021-02-09 15:17:23', '2021-02-09 15:17:23'),
(80, 19, 'Fire Extinguisher', '2021-02-09 15:35:45', '2021-02-09 15:35:45'),
(81, 19, 'Smoke Detector', '2021-02-09 15:35:45', '2021-02-09 15:35:45'),
(82, 19, 'Ceiling Fan', '2021-02-09 15:35:45', '2021-02-09 15:35:45'),
(83, 20, 'Bed', '2021-02-09 15:54:40', '2021-02-09 15:54:40'),
(84, 20, 'Internet Connection', '2021-02-09 15:54:40', '2021-02-09 15:54:40'),
(85, 20, 'Fire Extinguisher', '2021-02-09 15:54:40', '2021-02-09 15:54:40'),
(86, 20, 'Smoke Detector', '2021-02-09 15:54:40', '2021-02-09 15:54:40'),
(87, 20, 'Air Conditioning', '2021-02-09 15:54:40', '2021-02-09 15:54:40'),
(88, 20, 'Ceiling Fan', '2021-02-09 15:54:40', '2021-02-09 15:54:40'),
(89, 20, 'Wardrobe', '2021-02-09 15:54:40', '2021-02-09 15:54:40'),
(90, 21, 'Bed', '2021-02-09 16:38:01', '2021-02-09 16:38:01'),
(91, 21, 'Fire Extinguisher', '2021-02-09 16:38:01', '2021-02-09 16:38:01'),
(92, 21, 'Smoke Detector', '2021-02-09 16:38:01', '2021-02-09 16:38:01'),
(93, 21, 'Air Conditioning', '2021-02-09 16:38:01', '2021-02-09 16:38:01'),
(94, 21, 'Ceiling Fan', '2021-02-09 16:38:01', '2021-02-09 16:38:01'),
(98, 23, 'Fire Extinguisher', '2021-02-09 18:29:51', '2021-02-09 18:29:51'),
(99, 23, 'Smoke Detector', '2021-02-09 18:29:51', '2021-02-09 18:29:51'),
(100, 23, 'Ceiling Fan', '2021-02-09 18:29:51', '2021-02-09 18:29:51'),
(101, 24, 'Fire Extinguisher', '2021-02-09 19:09:17', '2021-02-09 19:09:17'),
(102, 24, 'Smoke Detector', '2021-02-09 19:09:17', '2021-02-09 19:09:17'),
(103, 24, 'Ceiling Fan', '2021-02-09 19:09:17', '2021-02-09 19:09:17'),
(104, 25, 'Fire Extinguisher', '2021-02-10 09:52:27', '2021-02-10 09:52:27'),
(105, 25, 'Smoke Detector', '2021-02-10 09:52:27', '2021-02-10 09:52:27'),
(106, 25, 'Ceiling Fan', '2021-02-10 09:52:27', '2021-02-10 09:52:27'),
(107, 25, 'Wardrobe', '2021-02-10 09:52:27', '2021-02-10 09:52:27'),
(108, 28, 'Fire Extinguisher', '2021-02-10 17:08:23', '2021-02-10 17:08:23'),
(109, 28, 'Smoke Detector', '2021-02-10 17:08:23', '2021-02-10 17:08:23'),
(110, 28, 'Ceiling Fan', '2021-02-10 17:08:23', '2021-02-10 17:08:23'),
(111, 28, 'Wardrobe', '2021-02-10 17:08:23', '2021-02-10 17:08:23'),
(112, 29, 'Bed', '2021-02-10 17:35:05', '2021-02-10 17:35:05'),
(113, 29, 'Fire Extinguisher', '2021-02-10 17:35:05', '2021-02-10 17:35:05'),
(114, 29, 'Smoke Detector', '2021-02-10 17:35:05', '2021-02-10 17:35:05'),
(115, 29, 'Ceiling Fan', '2021-02-10 17:35:05', '2021-02-10 17:35:05'),
(116, 29, 'Wardrobe', '2021-02-10 17:35:05', '2021-02-10 17:35:05'),
(117, 32, 'Fire Extinguisher', '2021-02-10 18:11:12', '2021-02-10 18:11:12'),
(118, 32, 'Smoke Detector', '2021-02-10 18:11:12', '2021-02-10 18:11:12'),
(119, 32, 'Ceiling Fan', '2021-02-10 18:11:12', '2021-02-10 18:11:12'),
(120, 32, 'Wardrobe', '2021-02-10 18:11:12', '2021-02-10 18:11:12'),
(121, 33, 'Bed', '2021-02-11 09:39:46', '2021-02-11 09:39:46'),
(122, 33, 'TV', '2021-02-11 09:39:46', '2021-02-11 09:39:46'),
(123, 33, 'Fire Extinguisher', '2021-02-11 09:39:46', '2021-02-11 09:39:46'),
(124, 33, 'Smoke Detector', '2021-02-11 09:39:46', '2021-02-11 09:39:46'),
(125, 33, 'Ceiling Fan', '2021-02-11 09:39:46', '2021-02-11 09:39:46'),
(126, 33, 'Wardrobe', '2021-02-11 09:39:46', '2021-02-11 09:39:46'),
(127, 37, 'Bed', '2021-02-11 14:39:46', '2021-02-11 14:39:46'),
(128, 37, 'Fire Extinguisher', '2021-02-11 14:39:46', '2021-02-11 14:39:46'),
(129, 37, 'Smoke Detector', '2021-02-11 14:39:46', '2021-02-11 14:39:46'),
(130, 37, 'Air Conditioning', '2021-02-11 14:39:46', '2021-02-11 14:39:46'),
(131, 37, 'Ceiling Fan', '2021-02-11 14:39:46', '2021-02-11 14:39:46'),
(132, 38, 'Fire Extinguisher', '2021-02-11 18:39:56', '2021-02-11 18:39:56'),
(133, 38, 'Smoke Detector', '2021-02-11 18:39:56', '2021-02-11 18:39:56'),
(134, 38, 'Ceiling Fan', '2021-02-11 18:39:56', '2021-02-11 18:39:56'),
(135, 38, 'Wardrobe', '2021-02-11 18:39:56', '2021-02-11 18:39:56'),
(136, 39, 'Bed', '2021-02-11 18:57:36', '2021-02-11 18:57:36'),
(137, 39, 'Fire Extinguisher', '2021-02-11 18:57:36', '2021-02-11 18:57:36'),
(138, 39, 'Smoke Detector', '2021-02-11 18:57:36', '2021-02-11 18:57:36'),
(139, 39, 'Ceiling Fan', '2021-02-11 18:57:36', '2021-02-11 18:57:36'),
(140, 39, 'Wardrobe', '2021-02-11 18:57:36', '2021-02-11 18:57:36'),
(141, 40, 'Bed', '2021-02-11 19:16:41', '2021-02-11 19:16:41'),
(142, 40, 'Fire Extinguisher', '2021-02-11 19:16:41', '2021-02-11 19:16:41'),
(143, 40, 'Smoke Detector', '2021-02-11 19:16:41', '2021-02-11 19:16:41'),
(144, 40, 'Air Conditioning', '2021-02-11 19:16:41', '2021-02-11 19:16:41'),
(145, 40, 'Ceiling Fan', '2021-02-11 19:16:41', '2021-02-11 19:16:41'),
(146, 40, 'Learning Light', '2021-02-11 19:16:41', '2021-02-11 19:16:41'),
(147, 40, 'Wardrobe', '2021-02-11 19:16:41', '2021-02-11 19:16:41'),
(148, 42, 'Bed', '2021-02-11 19:37:52', '2021-02-11 19:37:52'),
(149, 42, 'Fire Extinguisher', '2021-02-11 19:37:52', '2021-02-11 19:37:52'),
(150, 42, 'Smoke Detector', '2021-02-11 19:37:52', '2021-02-11 19:37:52'),
(151, 42, 'Ceiling Fan', '2021-02-11 19:37:52', '2021-02-11 19:37:52'),
(152, 42, 'Wardrobe', '2021-02-11 19:37:52', '2021-02-11 19:37:52'),
(153, 46, 'Fire Extinguisher', '2021-02-12 12:51:39', '2021-02-12 12:51:39'),
(154, 46, 'Smoke Detector', '2021-02-12 12:51:39', '2021-02-12 12:51:39'),
(155, 46, 'Ceiling Fan', '2021-02-12 12:51:39', '2021-02-12 12:51:39'),
(156, 46, 'Wardrobe', '2021-02-12 12:51:39', '2021-02-12 12:51:39'),
(157, 47, 'Bed', '2021-02-12 13:09:17', '2021-02-12 13:09:17'),
(158, 47, 'TV', '2021-02-12 13:09:17', '2021-02-12 13:09:17'),
(159, 47, 'Fridge', '2021-02-12 13:09:17', '2021-02-12 13:09:17'),
(160, 47, 'Fire Extinguisher', '2021-02-12 13:09:18', '2021-02-12 13:09:18'),
(161, 47, 'Air Conditioning', '2021-02-12 13:09:18', '2021-02-12 13:09:18'),
(162, 47, 'Ceiling Fan', '2021-02-12 13:09:18', '2021-02-12 13:09:18'),
(163, 47, 'Wardrobe', '2021-02-12 13:09:18', '2021-02-12 13:09:18'),
(164, 48, 'Bed', '2021-02-12 13:17:01', '2021-02-12 13:17:01'),
(165, 48, 'TV', '2021-02-12 13:17:01', '2021-02-12 13:17:01'),
(166, 48, 'Fridge', '2021-02-12 13:17:01', '2021-02-12 13:17:01'),
(167, 48, 'Internet Connection', '2021-02-12 13:17:01', '2021-02-12 13:17:01'),
(168, 48, 'Fire Extinguisher', '2021-02-12 13:17:01', '2021-02-12 13:17:01'),
(169, 48, 'Ceiling Fan', '2021-02-12 13:17:01', '2021-02-12 13:17:01'),
(170, 48, 'Learning Light', '2021-02-12 13:17:01', '2021-02-12 13:17:01'),
(171, 48, 'Wardrobe', '2021-02-12 13:17:01', '2021-02-12 13:17:01'),
(172, 50, 'Fire Extinguisher', '2021-02-12 13:30:41', '2021-02-12 13:30:41'),
(173, 50, 'Ceiling Fan', '2021-02-12 13:30:41', '2021-02-12 13:30:41'),
(174, 51, 'Bed', '2021-02-12 13:36:42', '2021-02-12 13:36:42'),
(175, 51, 'Fire Extinguisher', '2021-02-12 13:36:42', '2021-02-12 13:36:42'),
(176, 51, 'Smoke Detector', '2021-02-12 13:36:42', '2021-02-12 13:36:42'),
(177, 51, 'Ceiling Fan', '2021-02-12 13:36:42', '2021-02-12 13:36:42'),
(178, 52, 'Bed', '2021-02-12 13:42:45', '2021-02-12 13:42:45'),
(179, 52, 'Fire Extinguisher', '2021-02-12 13:42:45', '2021-02-12 13:42:45'),
(180, 52, 'Smoke Detector', '2021-02-12 13:42:45', '2021-02-12 13:42:45'),
(181, 52, 'Air Conditioning', '2021-02-12 13:42:45', '2021-02-12 13:42:45'),
(182, 52, 'Ceiling Fan', '2021-02-12 13:42:45', '2021-02-12 13:42:45'),
(183, 52, 'Learning Light', '2021-02-12 13:42:45', '2021-02-12 13:42:45'),
(184, 53, 'Internet Connection', '2021-02-12 13:48:23', '2021-02-12 13:48:23'),
(185, 53, 'Fire Extinguisher', '2021-02-12 13:48:23', '2021-02-12 13:48:23'),
(186, 53, 'Smoke Detector', '2021-02-12 13:48:23', '2021-02-12 13:48:23'),
(187, 53, 'Ceiling Fan', '2021-02-12 13:48:23', '2021-02-12 13:48:23'),
(188, 53, 'Wardrobe', '2021-02-12 13:48:23', '2021-02-12 13:48:23'),
(189, 54, 'Bed', '2021-02-12 13:54:02', '2021-02-12 13:54:02'),
(190, 54, 'Fire Extinguisher', '2021-02-12 13:54:02', '2021-02-12 13:54:02'),
(191, 54, 'Smoke Detector', '2021-02-12 13:54:02', '2021-02-12 13:54:02'),
(192, 54, 'Ceiling Fan', '2021-02-12 13:54:02', '2021-02-12 13:54:02'),
(193, 54, 'Learning Light', '2021-02-12 13:54:02', '2021-02-12 13:54:02'),
(194, 54, 'Wardrobe', '2021-02-12 13:54:02', '2021-02-12 13:54:02'),
(195, 55, 'Bed', '2021-02-12 13:59:38', '2021-02-12 13:59:38'),
(196, 55, 'Fire Extinguisher', '2021-02-12 13:59:38', '2021-02-12 13:59:38'),
(197, 55, 'Smoke Detector', '2021-02-12 13:59:38', '2021-02-12 13:59:38'),
(198, 55, 'Ceiling Fan', '2021-02-12 13:59:38', '2021-02-12 13:59:38'),
(199, 55, 'Wardrobe', '2021-02-12 13:59:38', '2021-02-12 13:59:38'),
(200, 56, 'Bed', '2021-02-12 14:06:20', '2021-02-12 14:06:20'),
(201, 56, 'Fire Extinguisher', '2021-02-12 14:06:20', '2021-02-12 14:06:20'),
(202, 56, 'Smoke Detector', '2021-02-12 14:06:20', '2021-02-12 14:06:20'),
(203, 56, 'Ceiling Fan', '2021-02-12 14:06:20', '2021-02-12 14:06:20'),
(204, 56, 'Wardrobe', '2021-02-12 14:06:20', '2021-02-12 14:06:20'),
(205, 57, 'Bed', '2021-02-12 14:23:08', '2021-02-12 14:23:08'),
(206, 57, 'Fire Extinguisher', '2021-02-12 14:23:08', '2021-02-12 14:23:08'),
(207, 57, 'Ceiling Fan', '2021-02-12 14:23:08', '2021-02-12 14:23:08'),
(208, 57, 'Wardrobe', '2021-02-12 14:23:08', '2021-02-12 14:23:08'),
(209, 58, 'Bed', '2021-02-12 15:00:41', '2021-02-12 15:00:41'),
(210, 58, 'Fire Extinguisher', '2021-02-12 15:00:41', '2021-02-12 15:00:41'),
(211, 58, 'Smoke Detector', '2021-02-12 15:00:41', '2021-02-12 15:00:41'),
(212, 58, 'Ceiling Fan', '2021-02-12 15:00:41', '2021-02-12 15:00:41'),
(213, 58, 'Wardrobe', '2021-02-12 15:00:41', '2021-02-12 15:00:41'),
(214, 59, 'Bed', '2021-02-12 15:15:15', '2021-02-12 15:15:15'),
(215, 59, 'Fire Extinguisher', '2021-02-12 15:15:16', '2021-02-12 15:15:16'),
(216, 59, 'Smoke Detector', '2021-02-12 15:15:16', '2021-02-12 15:15:16'),
(217, 59, 'Ceiling Fan', '2021-02-12 15:15:16', '2021-02-12 15:15:16'),
(218, 59, 'Wardrobe', '2021-02-12 15:15:16', '2021-02-12 15:15:16'),
(219, 60, 'Bed', '2021-02-12 15:24:56', '2021-02-12 15:24:56'),
(220, 60, 'Fire Extinguisher', '2021-02-12 15:24:56', '2021-02-12 15:24:56'),
(221, 60, 'Smoke Detector', '2021-02-12 15:24:56', '2021-02-12 15:24:56'),
(222, 60, 'Ceiling Fan', '2021-02-12 15:24:56', '2021-02-12 15:24:56'),
(223, 60, 'Wardrobe', '2021-02-12 15:24:56', '2021-02-12 15:24:56'),
(224, 61, 'Bed', '2021-02-12 15:41:16', '2021-02-12 15:41:16'),
(225, 61, 'Internet Connection', '2021-02-12 15:41:16', '2021-02-12 15:41:16'),
(226, 61, 'Fire Extinguisher', '2021-02-12 15:41:16', '2021-02-12 15:41:16'),
(227, 61, 'Smoke Detector', '2021-02-12 15:41:16', '2021-02-12 15:41:16'),
(228, 61, 'Air Conditioning', '2021-02-12 15:41:16', '2021-02-12 15:41:16'),
(229, 61, 'Ceiling Fan', '2021-02-12 15:41:16', '2021-02-12 15:41:16'),
(230, 61, 'Wardrobe', '2021-02-12 15:41:16', '2021-02-12 15:41:16'),
(231, 62, 'Fire Extinguisher', '2021-02-12 15:57:17', '2021-02-12 15:57:17'),
(232, 62, 'Smoke Detector', '2021-02-12 15:57:17', '2021-02-12 15:57:17'),
(233, 62, 'Ceiling Fan', '2021-02-12 15:57:17', '2021-02-12 15:57:17'),
(234, 62, 'Wardrobe', '2021-02-12 15:57:17', '2021-02-12 15:57:17'),
(235, 63, 'Bed', '2021-02-12 16:04:49', '2021-02-12 16:04:49'),
(236, 63, 'TV', '2021-02-12 16:04:49', '2021-02-12 16:04:49'),
(237, 63, 'Fridge', '2021-02-12 16:04:49', '2021-02-12 16:04:49'),
(238, 63, 'Fire Extinguisher', '2021-02-12 16:04:49', '2021-02-12 16:04:49'),
(239, 63, 'Smoke Detector', '2021-02-12 16:04:49', '2021-02-12 16:04:49'),
(240, 63, 'Air Conditioning', '2021-02-12 16:04:49', '2021-02-12 16:04:49'),
(241, 63, 'Ceiling Fan', '2021-02-12 16:04:49', '2021-02-12 16:04:49'),
(242, 63, 'Wardrobe', '2021-02-12 16:04:49', '2021-02-12 16:04:49'),
(243, 64, 'Fire Extinguisher', '2021-02-12 17:42:09', '2021-02-12 17:42:09'),
(244, 64, 'Smoke Detector', '2021-02-12 17:42:09', '2021-02-12 17:42:09'),
(245, 64, 'Ceiling Fan', '2021-02-12 17:42:09', '2021-02-12 17:42:09'),
(246, 64, 'Wardrobe', '2021-02-12 17:42:09', '2021-02-12 17:42:09'),
(247, 65, 'Bed', '2021-02-12 17:47:24', '2021-02-12 17:47:24'),
(248, 65, 'TV', '2021-02-12 17:47:24', '2021-02-12 17:47:24'),
(249, 65, 'Fridge', '2021-02-12 17:47:24', '2021-02-12 17:47:24'),
(250, 65, 'Towel,Soap', '2021-02-12 17:47:24', '2021-02-12 17:47:24'),
(251, 65, 'Fire Extinguisher', '2021-02-12 17:47:24', '2021-02-12 17:47:24'),
(252, 65, 'Smoke Detector', '2021-02-12 17:47:24', '2021-02-12 17:47:24'),
(253, 65, 'Air Conditioning', '2021-02-12 17:47:24', '2021-02-12 17:47:24'),
(254, 65, 'Ceiling Fan', '2021-02-12 17:47:24', '2021-02-12 17:47:24'),
(255, 65, 'Learning Light', '2021-02-12 17:47:24', '2021-02-12 17:47:24'),
(256, 65, 'Wardrobe', '2021-02-12 17:47:24', '2021-02-12 17:47:24'),
(257, 66, 'Internet Connection', '2021-02-12 17:52:01', '2021-02-12 17:52:01'),
(258, 66, 'Fire Extinguisher', '2021-02-12 17:52:01', '2021-02-12 17:52:01'),
(259, 66, 'Smoke Detector', '2021-02-12 17:52:01', '2021-02-12 17:52:01'),
(260, 66, 'Ceiling Fan', '2021-02-12 17:52:01', '2021-02-12 17:52:01'),
(261, 66, 'Wardrobe', '2021-02-12 17:52:01', '2021-02-12 17:52:01'),
(262, 67, 'Bed', '2021-02-12 17:57:34', '2021-02-12 17:57:34'),
(263, 67, 'Fridge', '2021-02-12 17:57:34', '2021-02-12 17:57:34'),
(264, 67, 'Internet Connection', '2021-02-12 17:57:34', '2021-02-12 17:57:34'),
(265, 67, 'Towel,Soap', '2021-02-12 17:57:34', '2021-02-12 17:57:34'),
(266, 67, 'Fire Extinguisher', '2021-02-12 17:57:34', '2021-02-12 17:57:34'),
(267, 67, 'Smoke Detector', '2021-02-12 17:57:34', '2021-02-12 17:57:34'),
(268, 67, 'Ceiling Fan', '2021-02-12 17:57:34', '2021-02-12 17:57:34'),
(269, 67, 'Learning Light', '2021-02-12 17:57:34', '2021-02-12 17:57:34'),
(270, 67, 'Wardrobe', '2021-02-12 17:57:34', '2021-02-12 17:57:34'),
(271, 68, 'Bed', '2021-02-12 18:09:56', '2021-02-12 18:09:56'),
(272, 68, 'Fire Extinguisher', '2021-02-12 18:09:56', '2021-02-12 18:09:56'),
(273, 68, 'Smoke Detector', '2021-02-12 18:09:56', '2021-02-12 18:09:56'),
(274, 68, 'Ceiling Fan', '2021-02-12 18:09:56', '2021-02-12 18:09:56'),
(275, 68, 'Wardrobe', '2021-02-12 18:09:56', '2021-02-12 18:09:56'),
(276, 69, 'Internet Connection', '2021-02-12 18:25:55', '2021-02-12 18:25:55'),
(277, 69, 'Fire Extinguisher', '2021-02-12 18:25:55', '2021-02-12 18:25:55'),
(278, 69, 'Smoke Detector', '2021-02-12 18:25:55', '2021-02-12 18:25:55'),
(279, 69, 'Ceiling Fan', '2021-02-12 18:25:55', '2021-02-12 18:25:55'),
(280, 69, 'Learning Light', '2021-02-12 18:25:55', '2021-02-12 18:25:55'),
(281, 69, 'Wardrobe', '2021-02-12 18:25:55', '2021-02-12 18:25:55'),
(282, 70, 'Bed', '2021-02-12 18:46:08', '2021-02-12 18:46:08'),
(283, 70, 'Internet Connection', '2021-02-12 18:46:08', '2021-02-12 18:46:08'),
(284, 70, 'Fire Extinguisher', '2021-02-12 18:46:08', '2021-02-12 18:46:08'),
(285, 70, 'Smoke Detector', '2021-02-12 18:46:08', '2021-02-12 18:46:08'),
(286, 70, 'Ceiling Fan', '2021-02-12 18:46:08', '2021-02-12 18:46:08'),
(287, 70, 'Learning Light', '2021-02-12 18:46:08', '2021-02-12 18:46:08'),
(288, 71, 'Internet Connection', '2021-02-12 18:53:52', '2021-02-12 18:53:52'),
(289, 71, 'Fire Extinguisher', '2021-02-12 18:53:52', '2021-02-12 18:53:52'),
(290, 71, 'Smoke Detector', '2021-02-12 18:53:52', '2021-02-12 18:53:52'),
(291, 71, 'Ceiling Fan', '2021-02-12 18:53:52', '2021-02-12 18:53:52'),
(292, 71, 'Wardrobe', '2021-02-12 18:53:52', '2021-02-12 18:53:52'),
(293, 72, 'Bed', '2021-02-12 19:13:57', '2021-02-12 19:13:57'),
(294, 72, 'Fire Extinguisher', '2021-02-12 19:13:57', '2021-02-12 19:13:57'),
(295, 72, 'Smoke Detector', '2021-02-12 19:13:57', '2021-02-12 19:13:57'),
(296, 72, 'Ceiling Fan', '2021-02-12 19:13:57', '2021-02-12 19:13:57'),
(297, 72, 'Learning Light', '2021-02-12 19:13:57', '2021-02-12 19:13:57'),
(298, 72, 'Wardrobe', '2021-02-12 19:13:57', '2021-02-12 19:13:57'),
(299, 73, 'Bed', '2021-02-12 19:26:24', '2021-02-12 19:26:24'),
(300, 73, 'Fire Extinguisher', '2021-02-12 19:26:24', '2021-02-12 19:26:24'),
(301, 73, 'Smoke Detector', '2021-02-12 19:26:24', '2021-02-12 19:26:24'),
(302, 73, 'Ceiling Fan', '2021-02-12 19:26:24', '2021-02-12 19:26:24'),
(303, 73, 'Wardrobe', '2021-02-12 19:26:24', '2021-02-12 19:26:24'),
(304, 76, 'Bed', '2021-02-16 09:36:15', '2021-02-16 09:36:15'),
(305, 76, 'Fire Extinguisher', '2021-02-16 09:36:15', '2021-02-16 09:36:15'),
(306, 76, 'Smoke Detector', '2021-02-16 09:36:15', '2021-02-16 09:36:15'),
(307, 76, 'Air Conditioning', '2021-02-16 09:36:15', '2021-02-16 09:36:15'),
(308, 76, 'Ceiling Fan', '2021-02-16 09:36:15', '2021-02-16 09:36:15'),
(309, 76, 'Wardrobe', '2021-02-16 09:36:15', '2021-02-16 09:36:15'),
(310, 75, 'Fire Extinguisher', '2021-02-16 09:49:03', '2021-02-16 09:49:03'),
(311, 75, 'Smoke Detector', '2021-02-16 09:49:03', '2021-02-16 09:49:03'),
(312, 75, 'Wardrobe', '2021-02-16 09:49:03', '2021-02-16 09:49:03'),
(313, 74, 'Bed', '2021-02-16 16:11:04', '2021-02-16 16:11:04'),
(314, 74, 'Internet Connection', '2021-02-16 16:11:04', '2021-02-16 16:11:04'),
(315, 74, 'Smoke Detector', '2021-02-16 16:11:04', '2021-02-16 16:11:04'),
(316, 74, 'Ceiling Fan', '2021-02-16 16:11:04', '2021-02-16 16:11:04'),
(317, 74, 'Wardrobe', '2021-02-16 16:11:04', '2021-02-16 16:11:04'),
(318, 86, 'Bed', '2021-03-01 04:09:07', '2021-03-01 04:09:07'),
(319, 86, 'TV', '2021-03-01 04:09:07', '2021-03-01 04:09:07'),
(320, 86, 'Fridge', '2021-03-01 04:09:07', '2021-03-01 04:09:07'),
(321, 86, 'Towel,Soap', '2021-03-01 04:09:07', '2021-03-01 04:09:07'),
(322, 86, 'Smoke Detector', '2021-03-01 04:09:07', '2021-03-01 04:09:07'),
(323, 86, 'Air Conditioning', '2021-03-01 04:09:07', '2021-03-01 04:09:07'),
(324, 86, 'Ceiling Fan', '2021-03-01 04:09:07', '2021-03-01 04:09:07'),
(325, 86, 'Wardrobe', '2021-03-01 04:09:07', '2021-03-01 04:09:07'),
(326, 87, 'Bed', '2021-03-01 04:49:15', '2021-03-01 04:49:15'),
(327, 87, 'TV', '2021-03-01 04:49:15', '2021-03-01 04:49:15'),
(328, 87, 'Fridge', '2021-03-01 04:49:15', '2021-03-01 04:49:15'),
(329, 87, 'Internet Connection', '2021-03-01 04:49:15', '2021-03-01 04:49:15'),
(330, 87, 'Telephone', '2021-03-01 04:49:15', '2021-03-01 04:49:15'),
(331, 87, 'Fire Extinguisher', '2021-03-01 04:49:15', '2021-03-01 04:49:15'),
(332, 87, 'Air Conditioning', '2021-03-01 04:49:15', '2021-03-01 04:49:15'),
(333, 87, 'Ceiling Fan', '2021-03-01 04:49:15', '2021-03-01 04:49:15'),
(334, 87, 'Wardrobe', '2021-03-01 04:49:15', '2021-03-01 04:49:15'),
(335, 88, 'Bed', '2021-03-03 14:49:45', '2021-03-03 14:49:45'),
(336, 88, 'Internet Connection', '2021-03-03 14:49:45', '2021-03-03 14:49:45'),
(337, 88, 'Smoke Detector', '2021-03-03 14:49:45', '2021-03-03 14:49:45'),
(338, 88, 'Balcony', '2021-03-03 14:49:45', '2021-03-03 14:49:45'),
(339, 88, 'Wardrobe', '2021-03-03 14:49:45', '2021-03-03 14:49:45'),
(340, 88, 'Water Reservoir', '2021-03-03 14:49:45', '2021-03-03 14:49:45'),
(341, 89, 'Bed', '2021-03-03 15:15:29', '2021-03-03 15:15:29'),
(342, 89, 'Internet Connection', '2021-03-03 15:15:29', '2021-03-03 15:15:29'),
(343, 89, 'Smoke Detector', '2021-03-03 15:15:29', '2021-03-03 15:15:29'),
(344, 89, 'Air Conditioning', '2021-03-03 15:15:29', '2021-03-03 15:15:29'),
(345, 89, 'Wardrobe', '2021-03-03 15:15:29', '2021-03-03 15:15:29'),
(346, 90, 'Bed', '2021-03-03 15:25:54', '2021-03-03 15:25:54'),
(347, 90, 'Internet Connection', '2021-03-03 15:25:54', '2021-03-03 15:25:54'),
(348, 90, 'Fire Extinguisher', '2021-03-03 15:25:54', '2021-03-03 15:25:54'),
(349, 90, 'Smoke Detector', '2021-03-03 15:25:54', '2021-03-03 15:25:54'),
(350, 90, 'Air Conditioning', '2021-03-03 15:25:54', '2021-03-03 15:25:54'),
(351, 91, 'Bed', '2021-03-04 11:05:37', '2021-03-04 11:05:37'),
(352, 91, 'Internet Connection', '2021-03-04 11:05:37', '2021-03-04 11:05:37'),
(353, 91, 'Telephone', '2021-03-04 11:05:37', '2021-03-04 11:05:37'),
(354, 91, 'Fire Extinguisher', '2021-03-04 11:05:37', '2021-03-04 11:05:37'),
(355, 91, 'Smoke Detector', '2021-03-04 11:05:37', '2021-03-04 11:05:37'),
(356, 91, 'Air Conditioning', '2021-03-04 11:05:37', '2021-03-04 11:05:37'),
(357, 91, 'Ceiling Fan', '2021-03-04 11:05:37', '2021-03-04 11:05:37'),
(358, 91, 'Water Reservoir', '2021-03-04 11:05:37', '2021-03-04 11:05:37'),
(359, 92, 'Fire Extinguisher', '2021-03-04 11:14:49', '2021-03-04 11:14:49'),
(360, 92, 'Smoke Detector', '2021-03-04 11:14:49', '2021-03-04 11:14:49'),
(361, 92, 'Air Conditioning', '2021-03-04 11:14:49', '2021-03-04 11:14:49'),
(362, 92, 'Ceiling Fan', '2021-03-04 11:14:49', '2021-03-04 11:14:49'),
(363, 93, 'Bed', '2021-03-04 11:21:53', '2021-03-04 11:21:53'),
(364, 93, 'TV', '2021-03-04 11:21:53', '2021-03-04 11:21:53'),
(365, 93, 'Fridge', '2021-03-04 11:21:53', '2021-03-04 11:21:53'),
(366, 93, 'Telephone', '2021-03-04 11:21:53', '2021-03-04 11:21:53'),
(367, 93, 'Air Conditioning', '2021-03-04 11:21:53', '2021-03-04 11:21:53'),
(368, 93, 'Wardrobe', '2021-03-04 11:21:53', '2021-03-04 11:21:53'),
(369, 94, 'Bed', '2021-03-04 11:27:17', '2021-03-04 11:27:17'),
(370, 94, 'Fire Extinguisher', '2021-03-04 11:27:17', '2021-03-04 11:27:17'),
(371, 94, 'Smoke Detector', '2021-03-04 11:27:17', '2021-03-04 11:27:17'),
(372, 94, 'Ceiling Fan', '2021-03-04 11:27:17', '2021-03-04 11:27:17'),
(373, 94, 'Balcony', '2021-03-04 11:27:17', '2021-03-04 11:27:17'),
(374, 94, 'Water Reservoir', '2021-03-04 11:27:17', '2021-03-04 11:27:17'),
(375, 95, 'Fire Extinguisher', '2021-03-04 11:34:01', '2021-03-04 11:34:01'),
(376, 95, 'Smoke Detector', '2021-03-04 11:34:01', '2021-03-04 11:34:01'),
(377, 95, 'Ceiling Fan', '2021-03-04 11:34:01', '2021-03-04 11:34:01'),
(378, 95, 'Water Reservoir', '2021-03-04 11:34:01', '2021-03-04 11:34:01'),
(379, 96, 'Bed', '2021-03-04 11:42:21', '2021-03-04 11:42:21'),
(380, 96, 'Fire Extinguisher', '2021-03-04 11:42:21', '2021-03-04 11:42:21'),
(381, 96, 'Smoke Detector', '2021-03-04 11:42:21', '2021-03-04 11:42:21'),
(382, 96, 'Air Conditioning', '2021-03-04 11:42:21', '2021-03-04 11:42:21'),
(383, 96, 'Ceiling Fan', '2021-03-04 11:42:21', '2021-03-04 11:42:21'),
(384, 97, 'Bed', '2021-03-04 11:52:03', '2021-03-04 11:52:03'),
(385, 97, 'TV', '2021-03-04 11:52:03', '2021-03-04 11:52:03'),
(386, 97, 'Internet Connection', '2021-03-04 11:52:03', '2021-03-04 11:52:03'),
(387, 97, 'Fire Extinguisher', '2021-03-04 11:52:03', '2021-03-04 11:52:03'),
(388, 97, 'Smoke Detector', '2021-03-04 11:52:03', '2021-03-04 11:52:03'),
(389, 97, 'Ceiling Fan', '2021-03-04 11:52:03', '2021-03-04 11:52:03'),
(390, 97, 'Water Reservoir', '2021-03-04 11:52:03', '2021-03-04 11:52:03'),
(391, 109, 'Bed', '2021-03-04 18:46:30', '2021-03-04 18:46:30'),
(392, 109, 'Fire Extinguisher', '2021-03-04 18:46:30', '2021-03-04 18:46:30'),
(393, 109, 'Smoke Detector', '2021-03-04 18:46:30', '2021-03-04 18:46:30'),
(394, 109, 'Ceiling Fan', '2021-03-04 18:46:30', '2021-03-04 18:46:30'),
(395, 109, 'Wardrobe', '2021-03-04 18:46:30', '2021-03-04 18:46:30'),
(396, 109, 'Water Reservoir', '2021-03-04 18:46:30', '2021-03-04 18:46:30'),
(397, 110, 'Internet Connection', '2021-03-04 19:06:01', '2021-03-04 19:06:01'),
(398, 110, 'Fire Extinguisher', '2021-03-04 19:06:01', '2021-03-04 19:06:01'),
(399, 110, 'Smoke Detector', '2021-03-04 19:06:01', '2021-03-04 19:06:01'),
(400, 110, 'Wardrobe', '2021-03-04 19:06:01', '2021-03-04 19:06:01'),
(401, 110, 'Water Reservoir', '2021-03-04 19:06:02', '2021-03-04 19:06:02'),
(402, 112, 'Bed', '2021-03-04 19:49:59', '2021-03-04 19:49:59'),
(403, 112, 'Fire Extinguisher', '2021-03-04 19:49:59', '2021-03-04 19:49:59'),
(404, 112, 'Smoke Detector', '2021-03-04 19:49:59', '2021-03-04 19:49:59'),
(405, 112, 'Air Conditioning', '2021-03-04 19:49:59', '2021-03-04 19:49:59'),
(406, 112, 'Water Reservoir', '2021-03-04 19:49:59', '2021-03-04 19:49:59'),
(407, 113, 'Bed', '2021-03-04 19:58:02', '2021-03-04 19:58:02'),
(408, 113, 'Fire Extinguisher', '2021-03-04 19:58:02', '2021-03-04 19:58:02'),
(409, 113, 'Smoke Detector', '2021-03-04 19:58:02', '2021-03-04 19:58:02'),
(410, 113, 'Wardrobe', '2021-03-04 19:58:02', '2021-03-04 19:58:02'),
(411, 113, 'Water Reservoir', '2021-03-04 19:58:02', '2021-03-04 19:58:02'),
(412, 114, 'Bed', '2021-03-05 14:50:39', '2021-03-05 14:50:39'),
(413, 114, 'Fire Extinguisher', '2021-03-05 14:50:39', '2021-03-05 14:50:39'),
(414, 114, 'Smoke Detector', '2021-03-05 14:50:39', '2021-03-05 14:50:39'),
(415, 114, 'Ceiling Fan', '2021-03-05 14:50:39', '2021-03-05 14:50:39'),
(416, 114, 'Water Reservoir', '2021-03-05 14:50:39', '2021-03-05 14:50:39'),
(417, 119, 'Bed', '2021-03-09 15:50:42', '2021-03-09 15:50:42'),
(418, 119, 'Fire Extinguisher', '2021-03-09 15:50:42', '2021-03-09 15:50:42'),
(419, 119, 'Smoke Detector', '2021-03-09 15:50:42', '2021-03-09 15:50:42'),
(420, 119, 'Ceiling Fan', '2021-03-09 15:50:42', '2021-03-09 15:50:42'),
(421, 121, 'Bed', '2021-03-09 15:58:16', '2021-03-09 15:58:16'),
(422, 121, 'Fire Extinguisher', '2021-03-09 15:58:16', '2021-03-09 15:58:16'),
(423, 121, 'Smoke Detector', '2021-03-09 15:58:16', '2021-03-09 15:58:16'),
(424, 121, 'Ceiling Fan', '2021-03-09 15:58:16', '2021-03-09 15:58:16'),
(425, 122, 'Fire Extinguisher', '2021-03-09 20:54:38', '2021-03-09 20:54:38'),
(426, 122, 'Smoke Detector', '2021-03-09 20:54:38', '2021-03-09 20:54:38'),
(427, 122, 'Water Reservoir', '2021-03-09 20:54:38', '2021-03-09 20:54:38'),
(428, 123, 'Bed', '2021-03-09 21:04:48', '2021-03-09 21:04:48'),
(429, 123, 'Fire Extinguisher', '2021-03-09 21:04:48', '2021-03-09 21:04:48'),
(430, 123, 'Smoke Detector', '2021-03-09 21:04:48', '2021-03-09 21:04:48'),
(431, 123, 'Ceiling Fan', '2021-03-09 21:04:48', '2021-03-09 21:04:48'),
(432, 123, 'Water Reservoir', '2021-03-09 21:04:48', '2021-03-09 21:04:48'),
(433, 124, 'Bed', '2021-03-09 21:12:47', '2021-03-09 21:12:47'),
(434, 124, 'Fire Extinguisher', '2021-03-09 21:12:47', '2021-03-09 21:12:47'),
(435, 124, 'Smoke Detector', '2021-03-09 21:12:47', '2021-03-09 21:12:47'),
(436, 124, 'Air Conditioning', '2021-03-09 21:12:47', '2021-03-09 21:12:47'),
(437, 124, 'Ceiling Fan', '2021-03-09 21:12:47', '2021-03-09 21:12:47'),
(438, 124, 'Water Reservoir', '2021-03-09 21:12:47', '2021-03-09 21:12:47'),
(439, 125, 'Bed', '2021-03-09 21:36:02', '2021-03-09 21:36:02'),
(440, 125, 'Fire Extinguisher', '2021-03-09 21:36:02', '2021-03-09 21:36:02'),
(441, 125, 'Smoke Detector', '2021-03-09 21:36:02', '2021-03-09 21:36:02'),
(442, 125, 'Ceiling Fan', '2021-03-09 21:36:02', '2021-03-09 21:36:02'),
(443, 126, 'Bed', '2021-03-09 22:09:38', '2021-03-09 22:09:38'),
(444, 126, 'Fire Extinguisher', '2021-03-09 22:09:38', '2021-03-09 22:09:38'),
(445, 126, 'Smoke Detector', '2021-03-09 22:09:38', '2021-03-09 22:09:38'),
(446, 126, 'Ceiling Fan', '2021-03-09 22:09:38', '2021-03-09 22:09:38'),
(447, 126, 'Water Reservoir', '2021-03-09 22:09:38', '2021-03-09 22:09:38'),
(448, 127, 'Fire Extinguisher', '2021-03-09 22:16:47', '2021-03-09 22:16:47'),
(449, 127, 'Smoke Detector', '2021-03-09 22:16:47', '2021-03-09 22:16:47'),
(450, 127, 'Ceiling Fan', '2021-03-09 22:16:47', '2021-03-09 22:16:47'),
(451, 127, 'Water Reservoir', '2021-03-09 22:16:47', '2021-03-09 22:16:47'),
(452, 130, 'Fire Extinguisher', '2021-03-09 22:59:43', '2021-03-09 22:59:43'),
(453, 130, 'Smoke Detector', '2021-03-09 22:59:43', '2021-03-09 22:59:43'),
(454, 130, 'Water Reservoir', '2021-03-09 22:59:43', '2021-03-09 22:59:43'),
(455, 134, 'Internet Connection', '2021-03-10 15:52:37', '2021-03-10 15:52:37'),
(456, 134, 'Fire Extinguisher', '2021-03-10 15:52:37', '2021-03-10 15:52:37'),
(457, 134, 'Smoke Detector', '2021-03-10 15:52:37', '2021-03-10 15:52:37'),
(458, 134, 'Ceiling Fan', '2021-03-10 15:52:37', '2021-03-10 15:52:37'),
(459, 134, 'Water Reservoir', '2021-03-10 15:52:37', '2021-03-10 15:52:37'),
(460, 135, 'Bed', '2021-03-10 15:58:37', '2021-03-10 15:58:37'),
(461, 135, 'Fire Extinguisher', '2021-03-10 15:58:37', '2021-03-10 15:58:37'),
(462, 135, 'Smoke Detector', '2021-03-10 15:58:37', '2021-03-10 15:58:37'),
(463, 135, 'Ceiling Fan', '2021-03-10 15:58:37', '2021-03-10 15:58:37'),
(464, 135, 'Water Reservoir', '2021-03-10 15:58:37', '2021-03-10 15:58:37'),
(465, 136, 'Bed', '2021-03-10 16:03:09', '2021-03-10 16:03:09'),
(466, 136, 'Fire Extinguisher', '2021-03-10 16:03:09', '2021-03-10 16:03:09'),
(467, 136, 'Smoke Detector', '2021-03-10 16:03:09', '2021-03-10 16:03:09'),
(468, 136, 'Wardrobe', '2021-03-10 16:03:09', '2021-03-10 16:03:09'),
(469, 136, 'Water Reservoir', '2021-03-10 16:03:09', '2021-03-10 16:03:09'),
(470, 137, 'Bed', '2021-03-10 16:21:54', '2021-03-10 16:21:54'),
(471, 137, 'Fire Extinguisher', '2021-03-10 16:21:54', '2021-03-10 16:21:54'),
(472, 137, 'Smoke Detector', '2021-03-10 16:21:54', '2021-03-10 16:21:54'),
(473, 137, 'Ceiling Fan', '2021-03-10 16:21:54', '2021-03-10 16:21:54'),
(474, 137, 'Water Reservoir', '2021-03-10 16:21:54', '2021-03-10 16:21:54'),
(475, 138, 'Bed', '2021-03-10 16:28:00', '2021-03-10 16:28:00'),
(476, 138, 'Fire Extinguisher', '2021-03-10 16:28:00', '2021-03-10 16:28:00'),
(477, 138, 'Smoke Detector', '2021-03-10 16:28:00', '2021-03-10 16:28:00'),
(478, 138, 'Ceiling Fan', '2021-03-10 16:28:00', '2021-03-10 16:28:00'),
(479, 138, 'Wardrobe', '2021-03-10 16:28:00', '2021-03-10 16:28:00'),
(480, 139, 'Bed', '2021-03-10 16:35:24', '2021-03-10 16:35:24'),
(481, 139, 'Internet Connection', '2021-03-10 16:35:24', '2021-03-10 16:35:24'),
(482, 139, 'Fire Extinguisher', '2021-03-10 16:35:24', '2021-03-10 16:35:24'),
(483, 139, 'Smoke Detector', '2021-03-10 16:35:24', '2021-03-10 16:35:24'),
(484, 139, 'Air Conditioning', '2021-03-10 16:35:24', '2021-03-10 16:35:24'),
(485, 139, 'Ceiling Fan', '2021-03-10 16:35:24', '2021-03-10 16:35:24'),
(486, 140, 'Fire Extinguisher', '2021-03-10 16:43:22', '2021-03-10 16:43:22'),
(487, 140, 'Smoke Detector', '2021-03-10 16:43:22', '2021-03-10 16:43:22'),
(488, 140, 'Water Reservoir', '2021-03-10 16:43:22', '2021-03-10 16:43:22'),
(489, 141, 'Bed', '2021-03-10 16:51:57', '2021-03-10 16:51:57'),
(490, 141, 'Fire Extinguisher', '2021-03-10 16:51:57', '2021-03-10 16:51:57'),
(491, 141, 'Ceiling Fan', '2021-03-10 16:51:57', '2021-03-10 16:51:57'),
(492, 141, 'Balcony', '2021-03-10 16:51:57', '2021-03-10 16:51:57'),
(493, 141, 'Water Reservoir', '2021-03-10 16:51:57', '2021-03-10 16:51:57'),
(494, 142, 'Telephone', '2021-03-10 17:04:20', '2021-03-10 17:04:20'),
(495, 142, 'Fire Extinguisher', '2021-03-10 17:04:20', '2021-03-10 17:04:20'),
(496, 142, 'Ceiling Fan', '2021-03-10 17:04:20', '2021-03-10 17:04:20'),
(497, 143, 'Fire Extinguisher', '2021-03-10 17:14:15', '2021-03-10 17:14:15'),
(498, 143, 'Smoke Detector', '2021-03-10 17:14:15', '2021-03-10 17:14:15'),
(499, 143, 'Ceiling Fan', '2021-03-10 17:14:15', '2021-03-10 17:14:15'),
(500, 144, 'Fire Extinguisher', '2021-03-10 17:33:27', '2021-03-10 17:33:27'),
(501, 144, 'Smoke Detector', '2021-03-10 17:33:27', '2021-03-10 17:33:27'),
(502, 144, 'Air Conditioning', '2021-03-10 17:33:27', '2021-03-10 17:33:27'),
(503, 144, 'Ceiling Fan', '2021-03-10 17:33:27', '2021-03-10 17:33:27'),
(504, 145, 'Fire Extinguisher', '2021-03-10 17:45:51', '2021-03-10 17:45:51'),
(505, 145, 'Smoke Detector', '2021-03-10 17:45:51', '2021-03-10 17:45:51'),
(506, 145, 'Ceiling Fan', '2021-03-10 17:45:51', '2021-03-10 17:45:51'),
(507, 145, 'Wardrobe', '2021-03-10 17:45:51', '2021-03-10 17:45:51'),
(508, 146, 'Fire Extinguisher', '2021-03-10 17:54:20', '2021-03-10 17:54:20'),
(509, 146, 'Smoke Detector', '2021-03-10 17:54:20', '2021-03-10 17:54:20'),
(510, 146, 'Air Conditioning', '2021-03-10 17:54:20', '2021-03-10 17:54:20'),
(511, 146, 'Ceiling Fan', '2021-03-10 17:54:20', '2021-03-10 17:54:20'),
(512, 147, 'Fire Extinguisher', '2021-03-10 18:05:31', '2021-03-10 18:05:31'),
(513, 147, 'Smoke Detector', '2021-03-10 18:05:31', '2021-03-10 18:05:31'),
(514, 147, 'Ceiling Fan', '2021-03-10 18:05:31', '2021-03-10 18:05:31'),
(515, 147, 'Wardrobe', '2021-03-10 18:05:31', '2021-03-10 18:05:31'),
(516, 147, 'Water Reservoir', '2021-03-10 18:05:31', '2021-03-10 18:05:31'),
(517, 148, 'Fire Extinguisher', '2021-03-10 19:22:35', '2021-03-10 19:22:35'),
(518, 148, 'Smoke Detector', '2021-03-10 19:22:35', '2021-03-10 19:22:35'),
(519, 148, 'Air Conditioning', '2021-03-10 19:22:35', '2021-03-10 19:22:35'),
(520, 149, 'Bed', '2021-03-10 19:31:36', '2021-03-10 19:31:36'),
(521, 149, 'Fire Extinguisher', '2021-03-10 19:31:36', '2021-03-10 19:31:36'),
(522, 149, 'Smoke Detector', '2021-03-10 19:31:36', '2021-03-10 19:31:36'),
(523, 149, 'Ceiling Fan', '2021-03-10 19:31:36', '2021-03-10 19:31:36'),
(524, 149, 'Water Reservoir', '2021-03-10 19:31:36', '2021-03-10 19:31:36'),
(525, 150, 'Internet Connection', '2021-03-10 19:50:15', '2021-03-10 19:50:15'),
(526, 150, 'Fire Extinguisher', '2021-03-10 19:50:15', '2021-03-10 19:50:15'),
(527, 150, 'Smoke Detector', '2021-03-10 19:50:15', '2021-03-10 19:50:15'),
(528, 150, 'Air Conditioning', '2021-03-10 19:50:15', '2021-03-10 19:50:15'),
(529, 150, 'Ceiling Fan', '2021-03-10 19:50:15', '2021-03-10 19:50:15'),
(530, 151, 'Bed', '2021-03-11 14:13:07', '2021-03-11 14:13:07'),
(531, 151, 'Fire Extinguisher', '2021-03-11 14:13:07', '2021-03-11 14:13:07'),
(532, 151, 'Smoke Detector', '2021-03-11 14:13:07', '2021-03-11 14:13:07'),
(533, 151, 'Ceiling Fan', '2021-03-11 14:13:07', '2021-03-11 14:13:07'),
(534, 151, 'Wardrobe', '2021-03-11 14:13:07', '2021-03-11 14:13:07'),
(535, 152, 'Bed', '2021-03-11 14:19:51', '2021-03-11 14:19:51'),
(536, 152, 'Fire Extinguisher', '2021-03-11 14:19:51', '2021-03-11 14:19:51'),
(537, 152, 'Smoke Detector', '2021-03-11 14:19:51', '2021-03-11 14:19:51'),
(538, 152, 'Air Conditioning', '2021-03-11 14:19:51', '2021-03-11 14:19:51'),
(539, 152, 'Ceiling Fan', '2021-03-11 14:19:51', '2021-03-11 14:19:51'),
(540, 153, 'Fire Extinguisher', '2021-03-11 14:25:44', '2021-03-11 14:25:44'),
(541, 153, 'Smoke Detector', '2021-03-11 14:25:44', '2021-03-11 14:25:44'),
(542, 153, 'Air Conditioning', '2021-03-11 14:25:44', '2021-03-11 14:25:44'),
(543, 153, 'Ceiling Fan', '2021-03-11 14:25:44', '2021-03-11 14:25:44'),
(544, 153, 'Water Reservoir', '2021-03-11 14:25:44', '2021-03-11 14:25:44'),
(545, 154, 'Fire Extinguisher', '2021-03-11 14:49:51', '2021-03-11 14:49:51'),
(546, 154, 'Smoke Detector', '2021-03-11 14:49:51', '2021-03-11 14:49:51'),
(547, 154, 'Air Conditioning', '2021-03-11 14:49:51', '2021-03-11 14:49:51'),
(548, 154, 'Ceiling Fan', '2021-03-11 14:49:51', '2021-03-11 14:49:51'),
(549, 155, 'Fire Extinguisher', '2021-03-11 14:58:20', '2021-03-11 14:58:20'),
(550, 155, 'Smoke Detector', '2021-03-11 14:58:20', '2021-03-11 14:58:20'),
(551, 155, 'Air Conditioning', '2021-03-11 14:58:20', '2021-03-11 14:58:20'),
(552, 155, 'Ceiling Fan', '2021-03-11 14:58:20', '2021-03-11 14:58:20'),
(553, 156, 'Internet Connection', '2021-03-11 15:07:21', '2021-03-11 15:07:21'),
(554, 156, 'Fire Extinguisher', '2021-03-11 15:07:21', '2021-03-11 15:07:21'),
(555, 156, 'Smoke Detector', '2021-03-11 15:07:21', '2021-03-11 15:07:21'),
(556, 156, 'Air Conditioning', '2021-03-11 15:07:21', '2021-03-11 15:07:21'),
(557, 156, 'Ceiling Fan', '2021-03-11 15:07:21', '2021-03-11 15:07:21'),
(558, 156, 'Balcony', '2021-03-11 15:07:21', '2021-03-11 15:07:21'),
(559, 157, 'Fire Extinguisher', '2021-03-11 15:14:21', '2021-03-11 15:14:21'),
(560, 157, 'Smoke Detector', '2021-03-11 15:14:21', '2021-03-11 15:14:21'),
(561, 157, 'Ceiling Fan', '2021-03-11 15:14:21', '2021-03-11 15:14:21'),
(562, 158, 'Fire Extinguisher', '2021-03-11 15:20:38', '2021-03-11 15:20:38'),
(563, 158, 'Air Conditioning', '2021-03-11 15:20:38', '2021-03-11 15:20:38'),
(564, 160, 'Smoke Detector', '2021-03-11 16:34:30', '2021-03-11 16:34:30'),
(565, 160, 'Air Conditioning', '2021-03-11 16:34:30', '2021-03-11 16:34:30'),
(566, 160, 'Ceiling Fan', '2021-03-11 16:34:30', '2021-03-11 16:34:30'),
(567, 160, 'Balcony', '2021-03-11 16:34:30', '2021-03-11 16:34:30'),
(568, 161, 'Fire Extinguisher', '2021-03-11 16:42:16', '2021-03-11 16:42:16'),
(569, 161, 'Smoke Detector', '2021-03-11 16:42:16', '2021-03-11 16:42:16'),
(570, 161, 'Air Conditioning', '2021-03-11 16:42:16', '2021-03-11 16:42:16'),
(571, 163, 'Fire Extinguisher', '2021-03-11 16:58:21', '2021-03-11 16:58:21'),
(572, 163, 'Smoke Detector', '2021-03-11 16:58:21', '2021-03-11 16:58:21'),
(573, 163, 'Water Reservoir', '2021-03-11 16:58:21', '2021-03-11 16:58:21'),
(574, 164, 'Fire Extinguisher', '2021-03-11 17:19:39', '2021-03-11 17:19:39'),
(575, 164, 'Smoke Detector', '2021-03-11 17:19:39', '2021-03-11 17:19:39'),
(576, 164, 'Air Conditioning', '2021-03-11 17:19:39', '2021-03-11 17:19:39'),
(577, 164, 'Ceiling Fan', '2021-03-11 17:19:39', '2021-03-11 17:19:39'),
(578, 165, 'Fire Extinguisher', '2021-03-11 17:30:16', '2021-03-11 17:30:16'),
(579, 165, 'Smoke Detector', '2021-03-11 17:30:16', '2021-03-11 17:30:16'),
(580, 165, 'Air Conditioning', '2021-03-11 17:30:16', '2021-03-11 17:30:16'),
(581, 166, 'Fire Extinguisher', '2021-03-11 17:36:12', '2021-03-11 17:36:12'),
(582, 166, 'Smoke Detector', '2021-03-11 17:36:12', '2021-03-11 17:36:12'),
(583, 166, 'Air Conditioning', '2021-03-11 17:36:12', '2021-03-11 17:36:12'),
(584, 167, 'Fire Extinguisher', '2021-03-11 17:52:27', '2021-03-11 17:52:27'),
(585, 167, 'Smoke Detector', '2021-03-11 17:52:27', '2021-03-11 17:52:27'),
(586, 167, 'Air Conditioning', '2021-03-11 17:52:27', '2021-03-11 17:52:27'),
(587, 168, 'Fire Extinguisher', '2021-03-11 18:03:00', '2021-03-11 18:03:00'),
(588, 168, 'Smoke Detector', '2021-03-11 18:03:00', '2021-03-11 18:03:00'),
(589, 168, 'Air Conditioning', '2021-03-11 18:03:00', '2021-03-11 18:03:00'),
(590, 169, 'Fire Extinguisher', '2021-03-11 18:09:11', '2021-03-11 18:09:11'),
(591, 169, 'Smoke Detector', '2021-03-11 18:09:11', '2021-03-11 18:09:11'),
(592, 169, 'Air Conditioning', '2021-03-11 18:09:11', '2021-03-11 18:09:11'),
(593, 170, 'Fire Extinguisher', '2021-03-11 18:16:27', '2021-03-11 18:16:27'),
(594, 170, 'Smoke Detector', '2021-03-11 18:16:27', '2021-03-11 18:16:27'),
(595, 170, 'Air Conditioning', '2021-03-11 18:16:27', '2021-03-11 18:16:27'),
(596, 171, 'Fire Extinguisher', '2021-03-11 18:35:05', '2021-03-11 18:35:05'),
(597, 171, 'Smoke Detector', '2021-03-11 18:35:05', '2021-03-11 18:35:05'),
(598, 171, 'Air Conditioning', '2021-03-11 18:35:05', '2021-03-11 18:35:05'),
(599, 171, 'Ceiling Fan', '2021-03-11 18:35:05', '2021-03-11 18:35:05'),
(600, 172, 'Fire Extinguisher', '2021-03-11 20:05:01', '2021-03-11 20:05:01'),
(601, 172, 'Smoke Detector', '2021-03-11 20:05:01', '2021-03-11 20:05:01'),
(602, 172, 'Air Conditioning', '2021-03-11 20:05:01', '2021-03-11 20:05:01'),
(603, 176, 'Fire Extinguisher', '2021-03-11 20:29:05', '2021-03-11 20:29:05'),
(604, 176, 'Smoke Detector', '2021-03-11 20:29:05', '2021-03-11 20:29:05'),
(605, 176, 'Air Conditioning', '2021-03-11 20:29:05', '2021-03-11 20:29:05'),
(606, 177, 'Fire Extinguisher', '2021-03-11 20:34:07', '2021-03-11 20:34:07'),
(607, 177, 'Smoke Detector', '2021-03-11 20:34:07', '2021-03-11 20:34:07'),
(608, 177, 'Air Conditioning', '2021-03-11 20:34:07', '2021-03-11 20:34:07'),
(609, 178, 'Fire Extinguisher', '2021-03-11 20:39:38', '2021-03-11 20:39:38'),
(610, 178, 'Smoke Detector', '2021-03-11 20:39:38', '2021-03-11 20:39:38'),
(611, 178, 'Air Conditioning', '2021-03-11 20:39:38', '2021-03-11 20:39:38'),
(612, 179, 'Smoke Detector', '2021-03-11 20:49:02', '2021-03-11 20:49:02'),
(613, 179, 'Air Conditioning', '2021-03-11 20:49:02', '2021-03-11 20:49:02'),
(614, 179, 'Ceiling Fan', '2021-03-11 20:49:02', '2021-03-11 20:49:02'),
(615, 180, 'Fire Extinguisher', '2021-03-11 21:18:39', '2021-03-11 21:18:39'),
(616, 180, 'Smoke Detector', '2021-03-11 21:18:39', '2021-03-11 21:18:39'),
(617, 180, 'Air Conditioning', '2021-03-11 21:18:39', '2021-03-11 21:18:39'),
(618, 180, 'Ceiling Fan', '2021-03-11 21:18:39', '2021-03-11 21:18:39'),
(619, 180, 'Balcony', '2021-03-11 21:18:39', '2021-03-11 21:18:39'),
(620, 181, 'Fire Extinguisher', '2021-03-11 21:27:44', '2021-03-11 21:27:44'),
(621, 181, 'Smoke Detector', '2021-03-11 21:27:44', '2021-03-11 21:27:44'),
(622, 181, 'Air Conditioning', '2021-03-11 21:27:44', '2021-03-11 21:27:44'),
(623, 181, 'Wardrobe', '2021-03-11 21:27:44', '2021-03-11 21:27:44'),
(624, 182, 'Smoke Detector', '2021-03-11 21:50:11', '2021-03-11 21:50:11'),
(625, 182, 'Air Conditioning', '2021-03-11 21:50:11', '2021-03-11 21:50:11'),
(626, 182, 'Ceiling Fan', '2021-03-11 21:50:11', '2021-03-11 21:50:11'),
(627, 183, 'Fire Extinguisher', '2021-03-11 21:58:46', '2021-03-11 21:58:46'),
(628, 183, 'Smoke Detector', '2021-03-11 21:58:46', '2021-03-11 21:58:46'),
(629, 183, 'Air Conditioning', '2021-03-11 21:58:46', '2021-03-11 21:58:46'),
(630, 183, 'Ceiling Fan', '2021-03-11 21:58:46', '2021-03-11 21:58:46'),
(631, 186, 'Bed', '2021-03-11 22:37:30', '2021-03-11 22:37:30'),
(632, 186, 'TV', '2021-03-11 22:37:30', '2021-03-11 22:37:30'),
(633, 186, 'Fridge', '2021-03-11 22:37:30', '2021-03-11 22:37:30'),
(634, 186, 'Internet Connection', '2021-03-11 22:37:30', '2021-03-11 22:37:30'),
(635, 186, 'Telephone', '2021-03-11 22:37:30', '2021-03-11 22:37:30'),
(636, 186, 'Towel,Soap', '2021-03-11 22:37:30', '2021-03-11 22:37:30'),
(637, 186, 'Fire Extinguisher', '2021-03-11 22:37:30', '2021-03-11 22:37:30'),
(638, 186, 'Smoke Detector', '2021-03-11 22:37:30', '2021-03-11 22:37:30'),
(639, 186, 'Air Conditioning', '2021-03-11 22:37:30', '2021-03-11 22:37:30'),
(640, 186, 'Ceiling Fan', '2021-03-11 22:37:30', '2021-03-11 22:37:30'),
(641, 186, 'Balcony', '2021-03-11 22:37:30', '2021-03-11 22:37:30'),
(642, 186, 'Wardrobe', '2021-03-11 22:37:30', '2021-03-11 22:37:30'),
(643, 186, 'Water Reservoir', '2021-03-11 22:37:30', '2021-03-11 22:37:30'),
(644, 187, 'Internet Connection', '2021-03-15 14:30:09', '2021-03-15 14:30:09'),
(645, 187, 'Towel,Soap', '2021-03-15 14:30:09', '2021-03-15 14:30:09'),
(646, 187, 'Fire Extinguisher', '2021-03-15 14:30:09', '2021-03-15 14:30:09'),
(647, 187, 'Smoke Detector', '2021-03-15 14:30:09', '2021-03-15 14:30:09'),
(648, 187, 'Ceiling Fan', '2021-03-15 14:30:09', '2021-03-15 14:30:09'),
(649, 188, 'Fire Extinguisher', '2021-03-15 14:50:00', '2021-03-15 14:50:00'),
(650, 188, 'Smoke Detector', '2021-03-15 14:50:00', '2021-03-15 14:50:00'),
(651, 188, 'Ceiling Fan', '2021-03-15 14:50:00', '2021-03-15 14:50:00'),
(652, 189, 'Fire Extinguisher', '2021-03-15 19:23:56', '2021-03-15 19:23:56'),
(653, 189, 'Smoke Detector', '2021-03-15 19:23:56', '2021-03-15 19:23:56'),
(654, 189, 'Air Conditioning', '2021-03-15 19:23:56', '2021-03-15 19:23:56'),
(655, 189, 'Water Reservoir', '2021-03-15 19:23:56', '2021-03-15 19:23:56'),
(656, 190, 'Fire Extinguisher', '2021-03-15 19:38:29', '2021-03-15 19:38:29'),
(657, 190, 'Smoke Detector', '2021-03-15 19:38:29', '2021-03-15 19:38:29'),
(658, 190, 'Air Conditioning', '2021-03-15 19:38:29', '2021-03-15 19:38:29'),
(659, 190, 'Ceiling Fan', '2021-03-15 19:38:29', '2021-03-15 19:38:29'),
(660, 191, 'Fire Extinguisher', '2021-03-15 19:49:45', '2021-03-15 19:49:45'),
(661, 191, 'Smoke Detector', '2021-03-15 19:49:45', '2021-03-15 19:49:45'),
(662, 191, 'Air Conditioning', '2021-03-15 19:49:45', '2021-03-15 19:49:45'),
(663, 191, 'Balcony', '2021-03-15 19:49:45', '2021-03-15 19:49:45'),
(664, 192, 'Fire Extinguisher', '2021-03-15 19:53:25', '2021-03-15 19:53:25'),
(665, 192, 'Smoke Detector', '2021-03-15 19:53:25', '2021-03-15 19:53:25'),
(666, 192, 'Air Conditioning', '2021-03-15 19:53:25', '2021-03-15 19:53:25'),
(667, 192, 'Ceiling Fan', '2021-03-15 19:53:25', '2021-03-15 19:53:25'),
(668, 192, 'Wardrobe', '2021-03-15 19:53:25', '2021-03-15 19:53:25'),
(669, 193, 'Smoke Detector', '2021-03-15 19:59:15', '2021-03-15 19:59:15'),
(670, 193, 'Air Conditioning', '2021-03-15 19:59:15', '2021-03-15 19:59:15'),
(671, 193, 'Ceiling Fan', '2021-03-15 19:59:15', '2021-03-15 19:59:15'),
(672, 194, 'Smoke Detector', '2021-03-15 20:05:09', '2021-03-15 20:05:09'),
(673, 194, 'Air Conditioning', '2021-03-15 20:05:09', '2021-03-15 20:05:09'),
(674, 194, 'Ceiling Fan', '2021-03-15 20:05:09', '2021-03-15 20:05:09'),
(675, 194, 'Water Reservoir', '2021-03-15 20:05:09', '2021-03-15 20:05:09'),
(676, 195, 'Smoke Detector', '2021-03-15 20:10:26', '2021-03-15 20:10:26'),
(677, 195, 'Air Conditioning', '2021-03-15 20:10:26', '2021-03-15 20:10:26'),
(678, 195, 'Wardrobe', '2021-03-15 20:10:26', '2021-03-15 20:10:26'),
(679, 195, 'Water Reservoir', '2021-03-15 20:10:26', '2021-03-15 20:10:26'),
(680, 196, 'Fire Extinguisher', '2021-03-15 20:18:19', '2021-03-15 20:18:19'),
(681, 196, 'Smoke Detector', '2021-03-15 20:18:19', '2021-03-15 20:18:19'),
(682, 196, 'Air Conditioning', '2021-03-15 20:18:19', '2021-03-15 20:18:19'),
(683, 196, 'Water Reservoir', '2021-03-15 20:18:19', '2021-03-15 20:18:19'),
(684, 197, 'Smoke Detector', '2021-03-15 20:25:43', '2021-03-15 20:25:43'),
(685, 197, 'Air Conditioning', '2021-03-15 20:25:43', '2021-03-15 20:25:43'),
(686, 197, 'Ceiling Fan', '2021-03-15 20:25:43', '2021-03-15 20:25:43'),
(687, 198, 'Smoke Detector', '2021-03-15 20:29:26', '2021-03-15 20:29:26'),
(688, 198, 'Air Conditioning', '2021-03-15 20:29:26', '2021-03-15 20:29:26'),
(689, 198, 'Ceiling Fan', '2021-03-15 20:29:26', '2021-03-15 20:29:26'),
(690, 198, 'Wardrobe', '2021-03-15 20:29:26', '2021-03-15 20:29:26'),
(691, 198, 'Water Reservoir', '2021-03-15 20:29:26', '2021-03-15 20:29:26'),
(692, 199, 'Ceiling Fan', '2021-03-15 20:32:58', '2021-03-15 20:32:58'),
(693, 200, 'Smoke Detector', '2021-03-15 20:41:21', '2021-03-15 20:41:21'),
(694, 200, 'Balcony', '2021-03-15 20:41:21', '2021-03-15 20:41:21'),
(695, 200, 'Wardrobe', '2021-03-15 20:41:21', '2021-03-15 20:41:21'),
(696, 200, 'Water Reservoir', '2021-03-15 20:41:21', '2021-03-15 20:41:21'),
(697, 201, 'Smoke Detector', '2021-03-15 21:03:02', '2021-03-15 21:03:02'),
(698, 201, 'Air Conditioning', '2021-03-15 21:03:02', '2021-03-15 21:03:02'),
(699, 201, 'Ceiling Fan', '2021-03-15 21:03:02', '2021-03-15 21:03:02'),
(700, 201, 'Balcony', '2021-03-15 21:03:02', '2021-03-15 21:03:02'),
(701, 202, 'Smoke Detector', '2021-03-15 21:13:27', '2021-03-15 21:13:27');
INSERT INTO `property_amenities` (`id`, `property_id`, `name`, `created_at`, `updated_at`) VALUES
(702, 202, 'Air Conditioning', '2021-03-15 21:13:27', '2021-03-15 21:13:27'),
(703, 202, 'Ceiling Fan', '2021-03-15 21:13:27', '2021-03-15 21:13:27'),
(704, 202, 'Balcony', '2021-03-15 21:13:27', '2021-03-15 21:13:27'),
(705, 202, 'Wardrobe', '2021-03-15 21:13:27', '2021-03-15 21:13:27'),
(706, 202, 'Water Reservoir', '2021-03-15 21:13:27', '2021-03-15 21:13:27'),
(707, 203, 'Smoke Detector', '2021-03-15 21:19:09', '2021-03-15 21:19:09'),
(708, 203, 'Air Conditioning', '2021-03-15 21:19:09', '2021-03-15 21:19:09'),
(709, 203, 'Ceiling Fan', '2021-03-15 21:19:09', '2021-03-15 21:19:09'),
(710, 203, 'Balcony', '2021-03-15 21:19:09', '2021-03-15 21:19:09'),
(711, 203, 'Wardrobe', '2021-03-15 21:19:09', '2021-03-15 21:19:09'),
(712, 203, 'Water Reservoir', '2021-03-15 21:19:09', '2021-03-15 21:19:09'),
(713, 204, 'Fire Extinguisher', '2021-03-15 21:24:35', '2021-03-15 21:24:35'),
(714, 204, 'Smoke Detector', '2021-03-15 21:24:35', '2021-03-15 21:24:35'),
(715, 204, 'Air Conditioning', '2021-03-15 21:24:35', '2021-03-15 21:24:35'),
(716, 204, 'Wardrobe', '2021-03-15 21:24:35', '2021-03-15 21:24:35'),
(717, 204, 'Water Reservoir', '2021-03-15 21:24:35', '2021-03-15 21:24:35'),
(718, 205, 'Fire Extinguisher', '2021-03-15 21:36:02', '2021-03-15 21:36:02'),
(719, 205, 'Smoke Detector', '2021-03-15 21:36:02', '2021-03-15 21:36:02'),
(720, 205, 'Air Conditioning', '2021-03-15 21:36:02', '2021-03-15 21:36:02'),
(721, 205, 'Balcony', '2021-03-15 21:36:02', '2021-03-15 21:36:02'),
(722, 205, 'Wardrobe', '2021-03-15 21:36:02', '2021-03-15 21:36:02'),
(723, 206, 'Fire Extinguisher', '2021-03-15 21:44:02', '2021-03-15 21:44:02'),
(724, 206, 'Smoke Detector', '2021-03-15 21:44:02', '2021-03-15 21:44:02'),
(725, 206, 'Air Conditioning', '2021-03-15 21:44:02', '2021-03-15 21:44:02'),
(726, 206, 'Ceiling Fan', '2021-03-15 21:44:02', '2021-03-15 21:44:02'),
(727, 206, 'Balcony', '2021-03-15 21:44:02', '2021-03-15 21:44:02'),
(728, 206, 'Wardrobe', '2021-03-15 21:44:02', '2021-03-15 21:44:02'),
(729, 207, 'Fire Extinguisher', '2021-03-15 21:53:16', '2021-03-15 21:53:16'),
(730, 207, 'Smoke Detector', '2021-03-15 21:53:16', '2021-03-15 21:53:16'),
(731, 208, 'Fire Extinguisher', '2021-03-15 22:03:25', '2021-03-15 22:03:25'),
(732, 208, 'Smoke Detector', '2021-03-15 22:03:25', '2021-03-15 22:03:25'),
(733, 209, 'Fire Extinguisher', '2021-03-15 22:10:30', '2021-03-15 22:10:30'),
(734, 209, 'Smoke Detector', '2021-03-15 22:10:30', '2021-03-15 22:10:30'),
(735, 209, 'Air Conditioning', '2021-03-15 22:10:30', '2021-03-15 22:10:30'),
(736, 209, 'Balcony', '2021-03-15 22:10:30', '2021-03-15 22:10:30'),
(737, 209, 'Wardrobe', '2021-03-15 22:10:30', '2021-03-15 22:10:30'),
(738, 210, 'Fire Extinguisher', '2021-03-15 22:20:19', '2021-03-15 22:20:19'),
(739, 210, 'Air Conditioning', '2021-03-15 22:20:19', '2021-03-15 22:20:19'),
(740, 210, 'Ceiling Fan', '2021-03-15 22:20:19', '2021-03-15 22:20:19'),
(741, 210, 'Balcony', '2021-03-15 22:20:19', '2021-03-15 22:20:19'),
(742, 210, 'Wardrobe', '2021-03-15 22:20:19', '2021-03-15 22:20:19'),
(743, 210, 'Water Reservoir', '2021-03-15 22:20:19', '2021-03-15 22:20:19'),
(744, 211, 'Smoke Detector', '2021-03-15 22:31:08', '2021-03-15 22:31:08'),
(745, 211, 'Balcony', '2021-03-15 22:31:08', '2021-03-15 22:31:08'),
(746, 212, 'Fire Extinguisher', '2021-03-15 22:36:21', '2021-03-15 22:36:21'),
(747, 212, 'Smoke Detector', '2021-03-15 22:36:21', '2021-03-15 22:36:21'),
(748, 212, 'Air Conditioning', '2021-03-15 22:36:21', '2021-03-15 22:36:21'),
(749, 212, 'Ceiling Fan', '2021-03-15 22:36:21', '2021-03-15 22:36:21'),
(750, 212, 'Balcony', '2021-03-15 22:36:22', '2021-03-15 22:36:22'),
(751, 212, 'Wardrobe', '2021-03-15 22:36:22', '2021-03-15 22:36:22'),
(752, 212, 'Water Reservoir', '2021-03-15 22:36:22', '2021-03-15 22:36:22'),
(753, 213, 'Wardrobe', '2021-03-15 22:43:10', '2021-03-15 22:43:10'),
(754, 213, 'Water Reservoir', '2021-03-15 22:43:10', '2021-03-15 22:43:10'),
(755, 214, 'Water Reservoir', '2021-03-15 22:48:41', '2021-03-15 22:48:41'),
(756, 215, 'Fire Extinguisher', '2021-03-15 22:52:49', '2021-03-15 22:52:49'),
(757, 215, 'Smoke Detector', '2021-03-15 22:52:49', '2021-03-15 22:52:49'),
(758, 215, 'Air Conditioning', '2021-03-15 22:52:49', '2021-03-15 22:52:49'),
(759, 215, 'Ceiling Fan', '2021-03-15 22:52:49', '2021-03-15 22:52:49'),
(760, 215, 'Balcony', '2021-03-15 22:52:49', '2021-03-15 22:52:49'),
(761, 215, 'Wardrobe', '2021-03-15 22:52:49', '2021-03-15 22:52:49'),
(762, 215, 'Water Reservoir', '2021-03-15 22:52:49', '2021-03-15 22:52:49'),
(763, 216, 'Smoke Detector', '2021-03-15 22:57:15', '2021-03-15 22:57:15'),
(764, 216, 'Ceiling Fan', '2021-03-15 22:57:15', '2021-03-15 22:57:15'),
(765, 216, 'Balcony', '2021-03-15 22:57:15', '2021-03-15 22:57:15'),
(766, 216, 'Wardrobe', '2021-03-15 22:57:15', '2021-03-15 22:57:15'),
(767, 216, 'Water Reservoir', '2021-03-15 22:57:15', '2021-03-15 22:57:15'),
(768, 218, 'Bed', '2021-03-19 16:11:44', '2021-03-19 16:11:44'),
(769, 218, 'Fire Extinguisher', '2021-03-19 16:11:44', '2021-03-19 16:11:44'),
(770, 218, 'Smoke Detector', '2021-03-19 16:11:44', '2021-03-19 16:11:44'),
(771, 218, 'Ceiling Fan', '2021-03-19 16:11:44', '2021-03-19 16:11:44'),
(772, 218, 'Balcony', '2021-03-19 16:11:44', '2021-03-19 16:11:44'),
(773, 219, 'Fire Extinguisher', '2021-03-19 16:20:08', '2021-03-19 16:20:08'),
(774, 219, 'Smoke Detector', '2021-03-19 16:20:08', '2021-03-19 16:20:08'),
(775, 219, 'Air Conditioning', '2021-03-19 16:20:08', '2021-03-19 16:20:08'),
(776, 219, 'Ceiling Fan', '2021-03-19 16:20:08', '2021-03-19 16:20:08'),
(777, 219, 'Balcony', '2021-03-19 16:20:08', '2021-03-19 16:20:08'),
(778, 219, 'Water Reservoir', '2021-03-19 16:20:08', '2021-03-19 16:20:08'),
(779, 220, 'Fire Extinguisher', '2021-03-19 16:24:38', '2021-03-19 16:24:38'),
(780, 220, 'Smoke Detector', '2021-03-19 16:24:38', '2021-03-19 16:24:38'),
(781, 220, 'Air Conditioning', '2021-03-19 16:24:38', '2021-03-19 16:24:38'),
(782, 220, 'Ceiling Fan', '2021-03-19 16:24:38', '2021-03-19 16:24:38'),
(783, 220, 'Balcony', '2021-03-19 16:24:38', '2021-03-19 16:24:38'),
(784, 220, 'Water Reservoir', '2021-03-19 16:24:38', '2021-03-19 16:24:38'),
(785, 221, 'Fire Extinguisher', '2021-03-19 16:29:57', '2021-03-19 16:29:57'),
(786, 221, 'Smoke Detector', '2021-03-19 16:29:57', '2021-03-19 16:29:57'),
(787, 221, 'Air Conditioning', '2021-03-19 16:29:57', '2021-03-19 16:29:57'),
(788, 221, 'Ceiling Fan', '2021-03-19 16:29:57', '2021-03-19 16:29:57'),
(789, 221, 'Balcony', '2021-03-19 16:29:57', '2021-03-19 16:29:57'),
(790, 221, 'Wardrobe', '2021-03-19 16:29:57', '2021-03-19 16:29:57'),
(791, 221, 'Water Reservoir', '2021-03-19 16:29:57', '2021-03-19 16:29:57'),
(792, 222, 'Fire Extinguisher', '2021-03-19 16:32:56', '2021-03-19 16:32:56'),
(793, 222, 'Smoke Detector', '2021-03-19 16:32:56', '2021-03-19 16:32:56'),
(794, 222, 'Air Conditioning', '2021-03-19 16:32:56', '2021-03-19 16:32:56'),
(795, 222, 'Ceiling Fan', '2021-03-19 16:32:56', '2021-03-19 16:32:56'),
(796, 222, 'Balcony', '2021-03-19 16:32:56', '2021-03-19 16:32:56'),
(797, 223, 'Fire Extinguisher', '2021-03-19 16:37:25', '2021-03-19 16:37:25'),
(798, 223, 'Air Conditioning', '2021-03-19 16:37:25', '2021-03-19 16:37:25'),
(799, 223, 'Ceiling Fan', '2021-03-19 16:37:25', '2021-03-19 16:37:25'),
(800, 223, 'Balcony', '2021-03-19 16:37:25', '2021-03-19 16:37:25'),
(801, 224, 'Ceiling Fan', '2021-03-19 16:41:15', '2021-03-19 16:41:15'),
(802, 224, 'Balcony', '2021-03-19 16:41:15', '2021-03-19 16:41:15'),
(803, 224, 'Water Reservoir', '2021-03-19 16:41:15', '2021-03-19 16:41:15'),
(804, 225, 'Fire Extinguisher', '2021-03-19 16:45:11', '2021-03-19 16:45:11'),
(805, 225, 'Smoke Detector', '2021-03-19 16:45:11', '2021-03-19 16:45:11'),
(806, 225, 'Air Conditioning', '2021-03-19 16:45:11', '2021-03-19 16:45:11'),
(807, 225, 'Ceiling Fan', '2021-03-19 16:45:11', '2021-03-19 16:45:11'),
(808, 225, 'Balcony', '2021-03-19 16:45:11', '2021-03-19 16:45:11'),
(809, 225, 'Wardrobe', '2021-03-19 16:45:11', '2021-03-19 16:45:11'),
(810, 226, 'Fire Extinguisher', '2021-03-19 17:29:17', '2021-03-19 17:29:17'),
(811, 226, 'Smoke Detector', '2021-03-19 17:29:17', '2021-03-19 17:29:17'),
(812, 226, 'Air Conditioning', '2021-03-19 17:29:17', '2021-03-19 17:29:17'),
(813, 226, 'Ceiling Fan', '2021-03-19 17:29:17', '2021-03-19 17:29:17'),
(814, 226, 'Water Reservoir', '2021-03-19 17:29:17', '2021-03-19 17:29:17'),
(815, 227, 'Smoke Detector', '2021-03-19 17:33:32', '2021-03-19 17:33:32'),
(816, 227, 'Air Conditioning', '2021-03-19 17:33:32', '2021-03-19 17:33:32'),
(817, 227, 'Ceiling Fan', '2021-03-19 17:33:32', '2021-03-19 17:33:32'),
(818, 227, 'Water Reservoir', '2021-03-19 17:33:32', '2021-03-19 17:33:32'),
(819, 228, 'Smoke Detector', '2021-03-19 17:41:21', '2021-03-19 17:41:21'),
(820, 228, 'Air Conditioning', '2021-03-19 17:41:21', '2021-03-19 17:41:21'),
(821, 228, 'Ceiling Fan', '2021-03-19 17:41:21', '2021-03-19 17:41:21'),
(822, 228, 'Balcony', '2021-03-19 17:41:21', '2021-03-19 17:41:21'),
(823, 228, 'Wardrobe', '2021-03-19 17:41:21', '2021-03-19 17:41:21'),
(824, 229, 'Fire Extinguisher', '2021-03-19 18:09:04', '2021-03-19 18:09:04'),
(825, 229, 'Smoke Detector', '2021-03-19 18:09:04', '2021-03-19 18:09:04'),
(826, 229, 'Air Conditioning', '2021-03-19 18:09:04', '2021-03-19 18:09:04'),
(827, 229, 'Ceiling Fan', '2021-03-19 18:09:04', '2021-03-19 18:09:04'),
(828, 229, 'Balcony', '2021-03-19 18:09:04', '2021-03-19 18:09:04'),
(829, 230, 'Smoke Detector', '2021-03-19 18:17:32', '2021-03-19 18:17:32'),
(830, 230, 'Air Conditioning', '2021-03-19 18:17:32', '2021-03-19 18:17:32'),
(831, 230, 'Ceiling Fan', '2021-03-19 18:17:32', '2021-03-19 18:17:32'),
(832, 230, 'Balcony', '2021-03-19 18:17:32', '2021-03-19 18:17:32'),
(833, 230, 'Wardrobe', '2021-03-19 18:17:32', '2021-03-19 18:17:32'),
(834, 230, 'Water Reservoir', '2021-03-19 18:17:32', '2021-03-19 18:17:32'),
(835, 231, 'Fire Extinguisher', '2021-03-19 18:26:40', '2021-03-19 18:26:40'),
(836, 231, 'Smoke Detector', '2021-03-19 18:26:40', '2021-03-19 18:26:40'),
(837, 231, 'Air Conditioning', '2021-03-19 18:26:40', '2021-03-19 18:26:40'),
(838, 231, 'Ceiling Fan', '2021-03-19 18:26:40', '2021-03-19 18:26:40'),
(839, 231, 'Balcony', '2021-03-19 18:26:40', '2021-03-19 18:26:40'),
(840, 232, 'Smoke Detector', '2021-03-19 18:33:55', '2021-03-19 18:33:55'),
(841, 232, 'Ceiling Fan', '2021-03-19 18:33:55', '2021-03-19 18:33:55'),
(842, 232, 'Water Reservoir', '2021-03-19 18:33:55', '2021-03-19 18:33:55'),
(843, 233, 'Fire Extinguisher', '2021-03-19 18:40:01', '2021-03-19 18:40:01'),
(844, 233, 'Ceiling Fan', '2021-03-19 18:40:01', '2021-03-19 18:40:01'),
(845, 233, 'Water Reservoir', '2021-03-19 18:40:01', '2021-03-19 18:40:01'),
(846, 234, 'Smoke Detector', '2021-03-19 19:33:17', '2021-03-19 19:33:17'),
(847, 234, 'Ceiling Fan', '2021-03-19 19:33:17', '2021-03-19 19:33:17'),
(848, 234, 'Water Reservoir', '2021-03-19 19:33:17', '2021-03-19 19:33:17'),
(849, 235, 'Smoke Detector', '2021-03-19 19:47:04', '2021-03-19 19:47:04'),
(850, 235, 'Air Conditioning', '2021-03-19 19:47:04', '2021-03-19 19:47:04'),
(851, 235, 'Ceiling Fan', '2021-03-19 19:47:04', '2021-03-19 19:47:04'),
(852, 236, 'Ceiling Fan', '2021-03-19 20:03:31', '2021-03-19 20:03:31'),
(853, 236, 'Water Reservoir', '2021-03-19 20:03:31', '2021-03-19 20:03:31'),
(854, 217, 'Fire Extinguisher', '2021-03-19 20:06:57', '2021-03-19 20:06:57'),
(855, 217, 'Smoke Detector', '2021-03-19 20:06:57', '2021-03-19 20:06:57'),
(856, 217, 'Air Conditioning', '2021-03-19 20:06:57', '2021-03-19 20:06:57'),
(857, 217, 'Water Reservoir', '2021-03-19 20:06:57', '2021-03-19 20:06:57'),
(858, 237, 'Smoke Detector', '2021-03-19 21:00:59', '2021-03-19 21:00:59'),
(859, 237, 'Air Conditioning', '2021-03-19 21:00:59', '2021-03-19 21:00:59'),
(860, 237, 'Ceiling Fan', '2021-03-19 21:00:59', '2021-03-19 21:00:59'),
(861, 237, 'Balcony', '2021-03-19 21:00:59', '2021-03-19 21:00:59'),
(862, 237, 'Wardrobe', '2021-03-19 21:00:59', '2021-03-19 21:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `property_contains`
--

CREATE TABLE `property_contains` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `bedroom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_bed` int(11) NOT NULL,
  `kitchen` int(11) NOT NULL,
  `bathroom` int(11) NOT NULL,
  `bath_private` tinyint(1) NOT NULL,
  `toilet` int(11) NOT NULL,
  `toilet_private` tinyint(1) NOT NULL,
  `furnish` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_contains`
--

INSERT INTO `property_contains` (`id`, `property_id`, `bedroom`, `no_bed`, `kitchen`, `bathroom`, `bath_private`, `toilet`, `toilet_private`, `furnish`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 0, 1, 1, 1, 3, 1, 'fully_furnished', '2021-02-08 13:13:41', '2021-02-08 13:13:41'),
(2, 2, '3', 0, 2, 3, 1, 3, 1, 'fully_furnished', '2021-02-08 13:42:08', '2021-02-08 13:42:08'),
(3, 3, '1', 1, 2, 1, 1, 1, 1, 'fully_furnished', '2021-02-08 15:19:34', '2021-02-08 15:19:34'),
(4, 4, '2', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-02-08 15:42:41', '2021-02-08 15:42:41'),
(5, 5, '3', 0, 1, 4, 1, 4, 1, 'fully_furnished', '2021-02-08 15:52:30', '2021-02-08 15:52:30'),
(6, 6, '2', 0, 1, 3, 1, 3, 1, 'not_furnished', '2021-02-08 16:01:05', '2021-02-08 16:01:05'),
(7, 8, '8', 0, 2, 8, 1, 8, 1, 'fully_furnished', '2021-02-08 16:28:15', '2021-02-08 16:28:15'),
(8, 9, '2', 0, 1, 5, 1, 5, 1, 'partially_furnished', '2021-02-08 16:38:02', '2021-02-08 16:38:02'),
(9, 11, '5', 3, 0, 2, 1, 2, 1, 'partially_furnished', '2021-02-08 17:21:31', '2021-02-08 17:21:31'),
(10, 12, '2', 0, 1, 3, 1, 3, 1, 'not_furnished', '2021-02-08 17:35:48', '2021-02-08 17:35:48'),
(11, 13, '3', 0, 1, 4, 1, 4, 1, 'not_furnished', '2021-02-08 18:05:08', '2021-02-08 18:05:08'),
(12, 15, '2', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-02-09 14:27:03', '2021-02-09 14:27:03'),
(13, 17, '3', 3, 1, 4, 1, 4, 1, 'fully_furnished', '2021-02-09 15:04:42', '2021-02-09 15:04:42'),
(14, 18, '3', 0, 1, 4, 1, 4, 1, 'not_furnished', '2021-02-09 15:17:12', '2021-02-09 15:17:12'),
(15, 19, '1', 0, 1, 1, 1, 1, 1, 'not_furnished', '2021-02-09 15:35:37', '2021-02-09 15:35:37'),
(16, 20, '1', 1, 1, 1, 1, 1, 1, 'fully_furnished', '2021-02-09 15:54:10', '2021-02-09 15:54:10'),
(17, 21, '3', 1, 1, 4, 0, 4, 1, 'partially_furnished', '2021-02-09 16:36:26', '2021-02-09 16:36:26'),
(19, 23, '2', 0, 1, 3, 1, 3, 1, 'not_furnished', '2021-02-09 18:29:42', '2021-02-09 18:29:42'),
(20, 24, '2', 0, 0, 2, 0, 2, 0, 'not_furnished', '2021-02-09 19:08:57', '2021-02-09 19:08:57'),
(21, 25, '2', 0, 1, 3, 1, 3, 1, 'not_furnished', '2021-02-10 09:51:45', '2021-02-10 09:51:45'),
(22, 26, '4', 1, 0, 4, 1, 4, 1, 'not_furnished', '2021-02-10 15:36:12', '2021-02-10 15:36:12'),
(23, 28, '4', 0, 1, 4, 1, 4, 1, 'partially_furnished', '2021-02-10 17:08:08', '2021-02-10 17:08:08'),
(24, 29, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-02-10 17:34:52', '2021-02-10 17:34:52'),
(25, 32, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-02-10 18:10:39', '2021-02-10 18:10:39'),
(26, 33, '2', 0, 0, 2, 1, 2, 1, 'not_furnished', '2021-02-10 19:38:11', '2021-02-11 10:15:58'),
(27, 37, '3', 0, 1, 3, 1, 3, 1, 'fully_furnished', '2021-02-11 14:39:05', '2021-02-11 14:39:05'),
(28, 38, '3', 0, 1, 4, 1, 4, 1, 'partially_furnished', '2021-02-11 18:39:36', '2021-02-11 18:39:36'),
(29, 39, '3', 0, 1, 4, 1, 4, 1, 'fully_furnished', '2021-02-11 18:57:24', '2021-02-11 18:57:24'),
(30, 40, '4', 0, 2, 5, 1, 5, 1, 'partially_furnished', '2021-02-11 19:16:24', '2021-02-11 19:16:24'),
(31, 42, '1', 0, 1, 2, 1, 2, 1, 'fully_furnished', '2021-02-11 19:37:30', '2021-02-11 19:37:30'),
(32, 46, '3', 0, 1, 3, 1, 3, 1, 'fully_furnished', '2021-02-12 12:51:18', '2021-02-12 12:51:18'),
(33, 47, '4', 0, 1, 4, 1, 4, 1, 'fully_furnished', '2021-02-12 13:08:57', '2021-02-12 13:08:57'),
(34, 48, '2', 0, 1, 3, 1, 3, 1, 'fully_furnished', '2021-02-12 13:16:46', '2021-02-12 13:16:46'),
(35, 49, '4', 0, 1, 4, 1, 4, 1, 'not_furnished', '2021-02-12 13:23:19', '2021-02-12 13:23:19'),
(36, 50, '6', 0, 0, 6, 1, 6, 1, 'not_furnished', '2021-02-12 13:30:26', '2021-02-12 13:30:26'),
(37, 51, '3', 1, 1, 4, 1, 4, 1, 'partially_furnished', '2021-02-12 13:36:29', '2021-02-12 13:36:29'),
(38, 52, '3', 0, 1, 4, 1, 4, 1, 'partially_furnished', '2021-02-12 13:42:31', '2021-02-12 13:42:31'),
(39, 53, '4', 0, 1, 5, 1, 5, 1, 'fully_furnished', '2021-02-12 13:48:13', '2021-02-12 13:48:13'),
(40, 54, '5', 2, 1, 5, 1, 5, 1, 'fully_furnished', '2021-02-12 13:53:46', '2021-02-12 13:53:46'),
(41, 55, '3', 0, 1, 4, 1, 4, 1, 'partially_furnished', '2021-02-12 13:59:22', '2021-02-12 13:59:22'),
(42, 56, '10', 0, 1, 11, 1, 11, 1, 'partially_furnished', '2021-02-12 14:06:07', '2021-02-12 14:06:07'),
(43, 57, '3', 0, 1, 4, 1, 4, 1, 'partially_furnished', '2021-02-12 14:22:49', '2021-02-12 14:22:49'),
(44, 58, '3', 0, 1, 4, 1, 4, 1, 'partially_furnished', '2021-02-12 15:00:25', '2021-02-12 15:00:25'),
(45, 59, '3', 0, 1, 4, 1, 4, 1, 'partially_furnished', '2021-02-12 15:14:56', '2021-02-12 15:14:56'),
(46, 60, '2', 0, 1, 3, 1, 3, 1, 'fully_furnished', '2021-02-12 15:24:43', '2021-02-12 15:24:43'),
(47, 61, '3', 0, 1, 44, 1, 4, 1, 'partially_furnished', '2021-02-12 15:40:56', '2021-02-12 15:40:56'),
(48, 62, '4', 0, 2, 4, 1, 4, 1, 'fully_furnished', '2021-02-12 15:57:01', '2021-02-12 15:57:01'),
(49, 63, '3', 0, 1, 3, 1, 3, 1, 'fully_furnished', '2021-02-12 16:04:28', '2021-02-12 16:04:28'),
(50, 64, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-02-12 17:41:50', '2021-02-12 17:41:50'),
(51, 65, '4', 0, 1, 4, 1, 4, 1, 'fully_furnished', '2021-02-12 17:47:10', '2021-02-12 17:47:10'),
(52, 66, '4', 0, 1, 4, 1, 4, 1, 'partially_furnished', '2021-02-12 17:51:49', '2021-02-12 17:51:49'),
(53, 67, '2', 2, 1, 2, 1, 2, 1, 'fully_furnished', '2021-02-12 17:57:17', '2021-02-12 17:57:17'),
(54, 68, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-02-12 18:09:21', '2021-02-12 18:09:21'),
(55, 69, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-02-12 18:25:45', '2021-02-12 18:25:45'),
(56, 70, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-02-12 18:45:53', '2021-02-12 18:45:53'),
(57, 71, '3', 0, 1, 3, 1, 3, 1, 'fully_furnished', '2021-02-12 18:52:40', '2021-02-12 18:52:40'),
(58, 72, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-02-12 19:11:43', '2021-02-12 19:11:43'),
(59, 73, '2', 0, 1, 2, 1, 2, 0, 'partially_furnished', '2021-02-12 19:25:22', '2021-02-12 19:25:22'),
(60, 74, '4', 0, 1, 5, 1, 5, 0, 'partially_furnished', '2021-02-15 12:22:41', '2021-02-15 12:43:42'),
(61, 75, '5', 0, 1, 4, 1, 4, 1, 'partially_furnished', '2021-02-15 13:22:09', '2021-02-15 13:22:09'),
(62, 76, '3', 0, 1, 2, 1, 2, 1, 'partially_furnished', '2021-02-15 13:28:34', '2021-02-15 13:28:34'),
(63, 86, '2', 2, 1, 3, 1, 3, 0, 'fully_furnished', '2021-03-01 04:07:52', '2021-03-01 04:07:52'),
(64, 87, '4', 0, 2, 5, 1, 5, 1, 'partially_furnished', '2021-03-01 04:48:50', '2021-03-01 04:48:50'),
(65, 88, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-03 14:49:06', '2021-03-03 14:49:06'),
(66, 89, '4', 0, 1, 4, 1, 4, 1, 'partially_furnished', '2021-03-03 15:15:17', '2021-03-03 15:15:17'),
(67, 90, '3', 0, 1, 4, 1, 4, 1, 'partially_furnished', '2021-03-03 15:25:43', '2021-03-03 15:25:43'),
(68, 91, '4', 0, 1, 4, 1, 4, 1, 'partially_furnished', '2021-03-04 11:05:16', '2021-03-04 11:05:16'),
(69, 92, '3', 0, 1, 4, 1, 4, 1, 'partially_furnished', '2021-03-04 11:14:33', '2021-03-04 11:14:33'),
(70, 93, '6', 0, 1, 6, 1, 6, 1, 'partially_furnished', '2021-03-04 11:21:35', '2021-03-04 11:21:35'),
(71, 94, '2', 0, 2, 2, 1, 2, 1, 'partially_furnished', '2021-03-04 11:26:58', '2021-03-04 11:26:58'),
(72, 95, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-04 11:33:45', '2021-03-04 11:33:45'),
(73, 96, '3', 1, 2, 3, 1, 3, 1, 'partially_furnished', '2021-03-04 11:42:07', '2021-03-04 11:42:07'),
(74, 97, '2', 2, 2, 2, 1, 2, 1, 'partially_furnished', '2021-03-04 11:51:38', '2021-03-04 11:51:38'),
(75, 109, '4', 0, 1, 4, 1, 4, 1, 'partially_furnished', '2021-03-04 18:45:57', '2021-03-04 18:45:57'),
(76, 110, '7', 0, 1, 7, 1, 7, 1, 'partially_furnished', '2021-03-04 19:05:39', '2021-03-04 19:05:39'),
(77, 112, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-04 19:49:43', '2021-03-04 19:49:43'),
(78, 113, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-04 19:57:49', '2021-03-04 19:57:49'),
(79, 114, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-05 14:50:24', '2021-03-05 14:50:24'),
(80, 119, '2', 0, 1, 2, 1, 1, 1, 'partially_furnished', '2021-03-09 15:50:14', '2021-03-09 15:50:14'),
(81, 121, '3', 0, 1, 2, 0, 2, 0, 'partially_furnished', '2021-03-09 15:57:37', '2021-03-09 15:57:37'),
(82, 122, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-09 20:54:02', '2021-03-09 20:54:02'),
(83, 123, '3', 0, 1, 2, 1, 2, 1, 'partially_furnished', '2021-03-09 21:04:30', '2021-03-09 21:04:30'),
(84, 124, '4', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-09 21:11:26', '2021-03-09 21:11:26'),
(85, 125, '3', 0, 1, 2, 1, 2, 1, 'partially_furnished', '2021-03-09 21:35:26', '2021-03-09 21:35:26'),
(86, 126, '2', 0, 1, 1, 0, 1, 0, 'partially_furnished', '2021-03-09 22:09:13', '2021-03-09 22:09:13'),
(87, 127, '5', 0, 1, 3, 0, 3, 0, 'partially_furnished', '2021-03-09 22:16:28', '2021-03-09 22:16:28'),
(88, 130, '3', 0, 2, 3, 1, 3, 1, 'partially_furnished', '2021-03-09 22:59:27', '2021-03-09 22:59:27'),
(89, 134, '3', 0, 1, 2, 0, 2, 1, 'partially_furnished', '2021-03-10 15:52:21', '2021-03-10 15:52:21'),
(90, 135, '2', 0, 0, 2, 1, 2, 1, 'partially_furnished', '2021-03-10 15:58:25', '2021-03-10 15:58:25'),
(91, 136, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-10 16:02:51', '2021-03-10 16:02:51'),
(92, 137, '3', 0, 1, 2, 1, 2, 1, 'partially_furnished', '2021-03-10 16:21:37', '2021-03-10 16:21:37'),
(93, 138, '3', 0, 2, 2, 1, 2, 1, 'partially_furnished', '2021-03-10 16:27:36', '2021-03-10 16:27:36'),
(94, 139, '5', 0, 2, 3, 0, 3, 0, 'partially_furnished', '2021-03-10 16:34:46', '2021-03-10 16:34:46'),
(95, 140, '2', 0, 0, 1, 0, 1, 0, 'not_furnished', '2021-03-10 16:43:03', '2021-03-10 16:43:03'),
(96, 141, '2', 0, 1, 2, 1, 2, 1, 'partially_furnished', '2021-03-10 16:51:25', '2021-03-10 16:51:25'),
(97, 142, '2', 0, 1, 2, 1, 2, 1, 'partially_furnished', '2021-03-10 17:04:00', '2021-03-10 17:04:00'),
(98, 143, '3', 0, 2, 2, 0, 2, 0, 'partially_furnished', '2021-03-10 17:13:48', '2021-03-10 17:13:48'),
(99, 144, '3', 0, 2, 2, 1, 2, 1, 'partially_furnished', '2021-03-10 17:33:00', '2021-03-10 17:33:00'),
(100, 145, '5', 0, 1, 3, 0, 3, 0, 'partially_furnished', '2021-03-10 17:44:49', '2021-03-10 17:44:49'),
(101, 146, '3', 0, 1, 2, 0, 2, 0, 'partially_furnished', '2021-03-10 17:54:03', '2021-03-10 17:54:03'),
(102, 147, '2', 0, 1, 2, 0, 2, 0, 'fully_furnished', '2021-03-10 18:05:04', '2021-03-10 18:05:04'),
(103, 148, '3', 0, 1, 2, 0, 2, 0, 'fully_furnished', '2021-03-10 19:22:18', '2021-03-10 19:22:18'),
(104, 149, '3', 0, 1, 2, 0, 2, 0, 'partially_furnished', '2021-03-10 19:31:19', '2021-03-10 19:31:19'),
(105, 150, '3', 0, 0, 2, 0, 2, 0, 'partially_furnished', '2021-03-10 19:49:59', '2021-03-10 19:49:59'),
(106, 151, '3', 0, 1, 2, 0, 2, 0, 'partially_furnished', '2021-03-11 14:12:49', '2021-03-11 14:12:49'),
(107, 152, '5', 0, 1, 5, 1, 5, 1, 'partially_furnished', '2021-03-11 14:19:32', '2021-03-11 14:19:32'),
(108, 153, '4', 0, 1, 4, 1, 4, 1, 'partially_furnished', '2021-03-11 14:25:26', '2021-03-11 14:25:26'),
(109, 154, '2', 0, 2, 1, 0, 1, 0, 'partially_furnished', '2021-03-11 14:49:31', '2021-03-11 14:49:31'),
(110, 155, '3', 0, 0, 2, 0, 2, 0, 'partially_furnished', '2021-03-11 14:57:57', '2021-03-11 14:57:57'),
(111, 156, '4', 0, 2, 4, 1, 4, 1, 'partially_furnished', '2021-03-11 15:07:03', '2021-03-11 15:07:03'),
(112, 157, '3', 0, 1, 2, 0, 2, 0, 'partially_furnished', '2021-03-11 15:14:03', '2021-03-11 15:14:03'),
(113, 158, '2', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-11 15:20:25', '2021-03-11 15:20:25'),
(114, 160, '5', 0, 0, 3, 0, 3, 0, 'partially_furnished', '2021-03-11 16:34:19', '2021-03-11 16:34:19'),
(115, 161, '3', 0, 1, 2, 0, 2, 0, 'partially_furnished', '2021-03-11 16:41:29', '2021-03-11 16:41:29'),
(116, 163, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-11 16:58:01', '2021-03-11 16:58:01'),
(117, 164, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-11 17:14:11', '2021-03-11 17:14:11'),
(118, 165, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-11 17:30:01', '2021-03-11 17:30:01'),
(119, 166, '3', 0, 0, 2, 1, 2, 1, 'partially_furnished', '2021-03-11 17:35:57', '2021-03-11 17:35:57'),
(120, 167, '4', 0, 1, 4, 1, 4, 1, 'partially_furnished', '2021-03-11 17:52:09', '2021-03-11 17:52:09'),
(121, 168, '4', 0, 1, 4, 1, 4, 1, 'partially_furnished', '2021-03-11 18:02:29', '2021-03-11 18:02:29'),
(122, 169, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-11 18:08:58', '2021-03-11 18:08:58'),
(123, 170, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-11 18:16:14', '2021-03-11 18:16:14'),
(124, 171, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-11 18:34:46', '2021-03-11 18:34:46'),
(125, 172, '3', 0, 0, 2, 0, 2, 0, 'fully_furnished', '2021-03-11 20:04:47', '2021-03-11 20:04:47'),
(126, 176, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-11 20:28:53', '2021-03-11 20:28:53'),
(127, 177, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-11 20:33:55', '2021-03-11 20:33:55'),
(128, 178, '3', 0, 2, 3, 1, 3, 1, 'fully_furnished', '2021-03-11 20:39:23', '2021-03-11 20:39:23'),
(129, 179, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-11 20:48:32', '2021-03-11 20:48:32'),
(130, 180, '3', 0, 2, 2, 0, 2, 0, 'partially_furnished', '2021-03-11 21:18:21', '2021-03-11 21:18:21'),
(131, 181, '4', 0, 1, 3, 1, 3, 0, 'partially_furnished', '2021-03-11 21:27:29', '2021-03-11 21:27:29'),
(132, 182, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-11 21:49:57', '2021-03-11 21:49:57'),
(133, 183, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-11 21:58:27', '2021-03-11 21:58:27'),
(134, 186, '40', 0, 1, 40, 1, 40, 1, 'fully_furnished', '2021-03-11 22:36:02', '2021-03-11 22:36:02'),
(135, 187, '3', 0, 1, 2, 1, 2, 1, 'partially_furnished', '2021-03-15 14:29:28', '2021-03-15 14:29:28'),
(136, 188, '3', 0, 1, 2, 0, 2, 0, 'partially_furnished', '2021-03-15 14:49:33', '2021-03-15 14:49:33'),
(137, 189, '3', 0, 0, 2, 0, 2, 0, 'partially_furnished', '2021-03-15 19:23:27', '2021-03-15 19:23:27'),
(138, 190, '4', 0, 1, 3, 0, 3, 0, 'partially_furnished', '2021-03-15 19:31:14', '2021-03-15 19:31:14'),
(139, 191, '4', 0, 0, 3, 0, 3, 0, 'partially_furnished', '2021-03-15 19:49:31', '2021-03-15 19:49:31'),
(140, 192, '2', 0, 0, 1, 0, 1, 0, 'partially_furnished', '2021-03-15 19:53:08', '2021-03-15 19:53:08'),
(141, 193, '2', 0, 1, 2, 1, 2, 1, 'partially_furnished', '2021-03-15 19:59:01', '2021-03-15 19:59:01'),
(142, 194, '3', 0, 0, 2, 1, 2, 1, 'partially_furnished', '2021-03-15 20:04:53', '2021-03-15 20:04:53'),
(143, 195, '3', 0, 0, 2, 0, 2, 0, 'partially_furnished', '2021-03-15 20:10:14', '2021-03-15 20:10:14'),
(144, 196, '4', 0, 0, 3, 0, 3, 0, 'partially_furnished', '2021-03-15 20:17:30', '2021-03-15 20:17:30'),
(145, 197, '3', 0, 0, 2, 0, 2, 0, 'partially_furnished', '2021-03-15 20:23:54', '2021-03-15 20:23:54'),
(146, 198, '4', 0, 0, 2, 0, 2, 0, 'partially_furnished', '2021-03-15 20:29:05', '2021-03-15 20:29:05'),
(147, 199, '3', 0, 2, 3, 0, 3, 0, 'partially_furnished', '2021-03-15 20:32:45', '2021-03-15 20:32:45'),
(148, 200, '5', 0, 0, 5, 0, 5, 0, 'partially_furnished', '2021-03-15 20:40:59', '2021-03-15 20:40:59'),
(149, 201, '3', 0, 0, 3, 0, 3, 0, 'partially_furnished', '2021-03-15 21:02:15', '2021-03-15 21:02:15'),
(150, 202, '3', 0, 1, 2, 0, 2, 0, 'fully_furnished', '2021-03-15 21:11:51', '2021-03-15 21:11:51'),
(151, 203, '3', 0, 1, 3, 0, 3, 0, 'fully_furnished', '2021-03-15 21:18:52', '2021-03-15 21:18:52'),
(152, 204, '5', 0, 1, 5, 1, 5, 1, 'partially_furnished', '2021-03-15 21:24:16', '2021-03-15 21:24:16'),
(153, 205, '5', 0, 1, 5, 0, 5, 0, 'partially_furnished', '2021-03-15 21:35:44', '2021-03-15 21:35:44'),
(154, 206, '5', 0, 2, 3, 0, 3, 0, 'partially_furnished', '2021-03-15 21:43:40', '2021-03-15 21:43:40'),
(155, 207, '4', 0, 1, 3, 0, 3, 0, 'partially_furnished', '2021-03-15 21:53:02', '2021-03-15 21:53:02'),
(156, 208, '4', 0, 2, 3, 0, 3, 0, 'partially_furnished', '2021-03-15 22:02:44', '2021-03-15 22:02:44'),
(157, 209, '3', 0, 2, 2, 0, 2, 0, 'partially_furnished', '2021-03-15 22:09:26', '2021-03-15 22:09:26'),
(158, 210, '5', 0, 2, 3, 0, 3, 0, 'partially_furnished', '2021-03-15 22:18:03', '2021-03-15 22:18:03'),
(159, 211, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-15 22:28:51', '2021-03-15 22:28:51'),
(160, 212, '5', 0, 1, 3, 0, 3, 0, 'partially_furnished', '2021-03-15 22:34:39', '2021-03-15 22:34:39'),
(161, 213, '4', 0, 0, 3, 0, 3, 0, 'partially_furnished', '2021-03-15 22:42:55', '2021-03-15 22:42:55'),
(162, 214, '3', 0, 0, 2, 0, 2, 0, 'partially_furnished', '2021-03-15 22:48:25', '2021-03-15 22:48:25'),
(163, 215, '5', 0, 2, 3, 0, 3, 0, 'partially_furnished', '2021-03-15 22:52:33', '2021-03-15 22:52:33'),
(164, 216, '3', 0, 0, 2, 1, 2, 1, 'partially_furnished', '2021-03-15 22:57:01', '2021-03-15 22:57:01'),
(165, 218, '5', 0, 1, 5, 1, 5, 1, 'partially_furnished', '2021-03-19 16:09:56', '2021-03-19 16:09:56'),
(166, 219, '4', 0, 1, 4, 1, 4, 1, 'partially_furnished', '2021-03-19 16:19:52', '2021-03-19 16:19:52'),
(167, 220, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-19 16:24:21', '2021-03-19 16:24:21'),
(168, 221, '4', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-19 16:29:38', '2021-03-19 16:29:38'),
(169, 222, '4', 0, 1, 4, 1, 4, 1, 'partially_furnished', '2021-03-19 16:32:44', '2021-03-19 16:32:44'),
(170, 223, '4', 0, 1, 4, 1, 4, 1, 'partially_furnished', '2021-03-19 16:36:55', '2021-03-19 16:36:55'),
(171, 224, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-19 16:41:02', '2021-03-19 16:41:02'),
(172, 225, '4', 0, 1, 4, 1, 4, 1, 'partially_furnished', '2021-03-19 16:44:56', '2021-03-19 16:44:56'),
(173, 226, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-19 17:29:03', '2021-03-19 17:29:03'),
(174, 227, '5', 0, 0, 5, 1, 5, 1, 'partially_furnished', '2021-03-19 17:33:20', '2021-03-19 17:33:20'),
(175, 228, '4', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-19 17:41:09', '2021-03-19 17:41:09'),
(176, 229, '3', 0, 0, 3, 1, 3, 1, 'partially_furnished', '2021-03-19 18:08:51', '2021-03-19 18:08:51'),
(177, 230, '2', 0, 1, 2, 1, 2, 1, 'partially_furnished', '2021-03-19 18:17:06', '2021-03-19 18:17:06'),
(178, 231, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-19 18:26:26', '2021-03-19 18:26:26'),
(179, 232, '3', 0, 0, 3, 1, 3, 1, 'partially_furnished', '2021-03-19 18:33:34', '2021-03-19 18:33:34'),
(180, 233, '3', 0, 2, 3, 1, 3, 1, 'partially_furnished', '2021-03-19 18:39:50', '2021-03-19 18:39:50'),
(181, 234, '3', 0, 2, 3, 1, 3, 1, 'partially_furnished', '2021-03-19 19:32:39', '2021-03-19 19:33:01'),
(182, 235, '6', 0, 2, 3, 0, 3, 0, 'partially_furnished', '2021-03-19 19:46:12', '2021-03-19 19:46:12'),
(183, 236, '3', 0, 2, 3, 1, 3, 1, 'partially_furnished', '2021-03-19 20:03:11', '2021-03-19 20:03:11'),
(184, 217, '4', 0, 2, 2, 0, 2, 0, 'partially_furnished', '2021-03-19 20:06:03', '2021-03-19 20:06:03'),
(185, 237, '3', 0, 1, 3, 1, 3, 1, 'partially_furnished', '2021-03-19 21:00:15', '2021-03-19 21:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `property_descriptions`
--

CREATE TABLE `property_descriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `gate` tinyint(1) NOT NULL DEFAULT 0,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `neighbourhood` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_descriptions`
--

INSERT INTO `property_descriptions` (`id`, `property_id`, `gate`, `description`, `neighbourhood`, `direction`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'A modern styled furnished room within a serene environment.', 'Situated in the hub of one of Greater Accra\'s finest community', 'Closer to the Absa', '2021-02-08 13:36:14', '2021-02-08 13:39:03'),
(2, 2, 0, 'You would feel more at home. This is a fully furnished room with uninterrupted power supply  and best suited appliances for your comfort in your bathroom and kitchens.', 'A serene community of the nicest people', 'Opposite Absa', '2021-02-08 15:13:15', '2021-02-08 15:15:27'),
(3, 3, 0, 'This property has fully furnished self contained rooms with a shared kitchen, well-spaced car parks and properly ventilated rooms', 'Alternate power supply for your uninterrupted power supply is available.', 'Zenith University', '2021-02-08 15:31:39', '2021-02-08 15:31:39'),
(4, 4, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', 'Labone Senior High', '2021-02-08 15:49:54', '2021-02-08 15:49:54'),
(5, 5, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim', '2021-02-08 15:57:21', '2021-02-08 15:57:21'),
(6, 6, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', 'Goil', '2021-02-08 16:07:31', '2021-02-08 16:07:31'),
(8, 8, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', '2021-02-08 16:33:21', '2021-02-08 16:33:21'),
(9, 9, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', 'Trinkets', '2021-02-08 16:55:58', '2021-02-08 16:55:58'),
(11, 11, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', 'Soccer Streets', '2021-02-08 17:27:32', '2021-02-08 17:27:32'),
(12, 12, 0, 'This 2 bedroom house screams \'welcome\' with its calming interior designs. It also provides lifestyle options with a shared swimming pool with other tenants', 'You need a unique place of relaxation. Call for inspection!', 'Deluxe Streets', '2021-02-08 17:46:56', '2021-02-09 18:22:22'),
(13, 13, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', 'Zuliah High Tower, Street 2', '2021-02-08 18:14:12', '2021-02-08 18:14:12'),
(15, 15, 1, 'Beautiful 2 bedroom apartment available for rent. Suitable for small families.\r\n\r\nA spacious kitchen and bathroom are stocked with relevant gadgets for convenience.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation. Warm neighbors to share your peace with.', 'Goil', '2021-02-09 14:39:58', '2021-02-09 14:39:58'),
(17, 17, 0, 'Move in now into this 2 bedroom apartment for some quality time. This property is suitable for small families who want spend some excellent time together.', 'It is situated in the hub of Accra with many nearby recreational places to kill time and create more memories.', 'Vibtech Ghana', '2021-02-09 15:12:31', '2021-02-09 15:12:31'),
(18, 18, 0, 'This property has well spaced and ventilated rooms freshened by sweet smelling flowers. \r\n\r\nThe kitchen is appropriately counter spaced with exquisite antique  interior designs in the bathroom, bedroom and hall', 'Nearby malls, restaurants, popular historical sites', 'Hebron Prayer Camp', '2021-02-09 15:25:25', '2021-02-09 15:25:25'),
(19, 19, 0, 'This apartment has a well spaced bedroom with a study desk, neatly tiled floors and', 'Located to enjoy proximity to historical sites, the museum, the shopping malls and other places for relaxation.\r\n\r\nThis is a gated community with 24 hour security and installed Cctv cameras on every household. You can relax!', 'The sense of love and community strong in this neighborhood would give you a homely presence.', '2021-02-09 15:46:34', '2021-02-09 15:49:35'),
(20, 20, 0, 'Find a home to be with us. Our rooms with well proportioned designs in the bathroom, kitchen and bedroom would make your stay more enjoyable.\r\n\r\nOther noticeable things of this property include self massaging beds, our large burglar proof windows for good ventilation that also opens your view to the beautiful scenery of the wonderful community.', 'You would love to be part of the many shared love and neighborliness in the community', 'Vibtech Ghana', '2021-02-09 16:11:52', '2021-02-09 16:11:52'),
(21, 21, 0, 'Home is where your family is. Move into this property with your small family.\r\n\r\nThis property comes with 3 bedrooms, 4 bathrooms and a shared gymnasium for your workouts.\r\n\r\nThere is also a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'Enjoy proximity to the shopping malls, schools, restaurants and the natural parks.', 'Vibtech Ghana', '2021-02-09 16:53:32', '2021-02-09 16:53:32'),
(22, 23, 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2021-02-09 18:56:38', '2021-02-09 18:56:38'),
(23, 24, 0, 'You will find in this house 2 cozy bedrooms with an adjoining balcony opened to see more of the beautiful community.', 'This is the place you can call home with proximity to schools, restaurants, shopping mall and other recreational places. Be prepared for a blissful stay.', 'Vibtech', '2021-02-09 19:17:27', '2021-02-09 19:17:27'),
(24, 25, 0, 'With well proportioned rooms, white washable walls, impeccable woodwork on the stairs, kitchen and wardrobes. Expansive kitchen to give you more room.', 'This property is located in a commercial community ideal for your business adventure with proximity to conference centers, hotels and resorts.', 'Vibtech Ghana', '2021-02-10 10:12:37', '2021-02-10 10:12:37'),
(26, 28, 0, 'This is a fine choice for small families.\r\n\r\nexcellent lighting conditions with installations of the best of Lee\'s Auth\'s special lights choices. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'You don\'t have to miss this with close proximity to schools and shopping malls.', 'VibTech Ghana', '2021-02-10 17:18:01', '2021-02-10 17:18:01'),
(27, 29, 0, 'This is a fine choice for small families. excellent lighting conditions with installations of the best of Lee\'s Auth\'s special lights choices. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'You don\'t have to miss this with close proximity to schools and shopping malls.', 'Off Kasoa-Cape Road', '2021-02-10 17:37:19', '2021-02-10 17:37:19'),
(29, 32, 0, 'It is hard to find a classy space with elegantly laid designs as this for a hostel. Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'Centrally located and with excellent roads to and from you’re just a few minutes drive from shopping and leisure centres', 'VibTech Ghana', '2021-02-10 19:07:05', '2021-02-10 19:07:05'),
(30, 33, 0, 'It is hard to find a classy space with elegantly laid designs as this for a hostel. Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation. Warm neighbors to share your peace with.', 'Vibtech Ghana', '2021-02-11 09:54:56', '2021-02-11 09:54:56'),
(34, 37, 0, 'This 3 bedroom apartment  with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present.\r\n\r\nKitchen and bathroom are stocked with relevant gadgets for convenience. \r\n\r\nA stand by generator in case of power fluctuation.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation. Warm neighbors to share your peace with.', 'Vibtech Ghana', '2021-02-11 14:53:33', '2021-02-11 14:53:33'),
(35, 26, 0, 'You need space. Not just space but your own space and we have just that for you with this property. It affords you a spacey bedroom  and a generously designed interior with a relaxing swimming pool added on.\r\n\r\nA walk through reveals a foyer, living room, dining room, kitchen, utility, pantry, bedroom 1 en-suite, bedroom 2 en-suite, master bedroom en-suite, walk-in-wardrobe, closet area.', 'All Rooms Ensuite, Hall Area, Installed Air Conditions, Big Compound, Balcony, Proximity To Main Road.', 'Contact Vibtech Ghana', '2021-02-11 17:25:38', '2021-02-11 17:25:38'),
(37, 38, 0, 'The floor plan encompasses threespacious bedrooms with plenty of room for study, sleep and storage, three luxurious bathrooms, and a sleek and stylish kitchen that flows through to the dining room and private rear patio. The master bedroom, complete with walk-in robe and ensuite, ensures parents have a private space where they can enjoy the view.', 'Perfect for a family or as a holiday retreat, this home is ideally positioned to enjoy the proximity to beaches, cafes and restaurants, shopping centre, and a selection of premier schools.', 'Contact Vibtech Ghana', '2021-02-11 18:44:19', '2021-02-11 18:48:21'),
(38, 39, 0, 'Cool, calm and sophisticated with a youthful edge, this functional home is enveloped in light and comfort. Crisp white walls, timber floors, and high ceilings create a style as timeless as the sparkling ocean view.', 'With transport, schools, shops, dining & leisure facilities within easy reach, this is the ideal place to call home. Be prepared for this to be ‘love at first sight’.', 'Contact Vibtech Ghana', '2021-02-11 19:03:06', '2021-02-11 19:03:06'),
(39, 40, 0, 'It is a rare opportunity to get a room available for rent in this commercial area. \r\n\r\nBeautiful and spacious rooms with provided suited appliances in the  kitchen, bathrooms and bedrooms.\r\n\r\nEnjoy the comfort and breath fresh breeze from the garden beyond our glass windows', 'The house is located about 30 minutes from the vibrant city and is suited for a quite get away tenants.', 'Contact VibTech Ghana', '2021-02-11 19:30:42', '2021-02-11 19:30:42'),
(40, 42, 0, 'Away from the rush of the vehicles, toots of horns and the hoots of  the hawkers on the streets. Find your peace in our self contained rooms.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation. Warm neighbors to share your peace with.', 'Contact Vibtech Ghana', '2021-02-11 19:45:34', '2021-02-11 19:45:34'),
(41, 43, 0, 'It is hard to find a classy space with elegantly laid designs as this for a hostel. Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation. Warm neighbors to share your peace with.', 'Contact Vibtech Ghana', '2021-02-12 12:21:28', '2021-02-12 12:21:28'),
(42, 44, 0, 'It is hard to find a classy space with elegantly laid designs as this for a hostel. Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation. Warm neighbors to share your peace with.', 'Contact Vibtech', '2021-02-12 12:34:28', '2021-02-12 12:34:28'),
(43, 46, 0, 'This is a fine choice for small families. excellent lighting conditions with installations of the best of Lee\'s Auth\'s special lights choices. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'You don\'t have to miss this with close proximity to schools and shopping malls.', 'Contact Vibtech', '2021-02-12 12:59:30', '2021-02-12 12:59:30'),
(44, 47, 0, 'You need space. Not just space but your own space and we have just that for you with this property. It affords you a spacey bedroom and a generously designed interior with a relaxing swimming pool added on. A walk through reveals a foyer, living room, dining room, kitchen, utility, pantry, bedroom 1 en-suite, bedroom 2 en-suite, master bedroom en-suite, walk-in-wardrobe, closet area.', 'You don\'t have to miss this with close proximity to schools and shopping malls.', 'Contact Vibtech', '2021-02-12 13:13:41', '2021-02-12 13:13:41'),
(45, 48, 0, 'You need space. Not just space but your own space and we have just that for you with this property. It affords you a spacey bedroom and a generously designed interior with a relaxing swimming pool added on', 'You don\'t have to miss this with close proximity to schools and shopping malls.', 'Contact Vibtech', '2021-02-12 13:20:36', '2021-02-12 13:20:36'),
(46, 49, 0, 'Move in now into this 4 bedroom apartment for some quality time. This property is suitable for small families who want spend some excellent time together.', 'It is situated in the hub of Accra with many nearby recreational places to kill time and create more memories.', 'Contact Vibtech Ghana', '2021-02-12 13:27:08', '2021-02-12 13:27:59'),
(47, 50, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation. Warm neighbors to share your peace with.', 'Vibtech', '2021-02-12 13:34:11', '2021-02-12 13:34:11'),
(48, 51, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', '2021-02-12 13:39:19', '2021-02-12 13:39:19'),
(49, 52, 0, 'You need space. Not just space but your own space and we have just that for you with this property. It affords you a spacey bedroom and a generously designed interior with a relaxing swimming pool added on.', 'You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech Ghana', '2021-02-12 13:46:34', '2021-02-12 13:46:34'),
(50, 53, 0, 'You need space. Not just space but your own space and we have just that for you with this property. It affords you a spacey bedroom and a generously designed interior with a relaxing swimming pool added on.', 'You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech', '2021-02-12 13:51:00', '2021-02-12 13:51:00'),
(51, 54, 0, 'Move in now into this 5 bedroom apartment for some quality time. This property is suitable for small families who want spend some excellent time together.', 'It is situated in the hub of Accra with many nearby recreational places to kill time and create more memories.', 'Vibtech Ghana', '2021-02-12 13:56:44', '2021-02-12 13:56:44'),
(52, 55, 0, 'It is hard to find a classy space with elegantly laid designs as this.  Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'It is situated in the hub of Accra with many nearby recreational places to kill time and create more memories.', 'Vibtech Ghana', '2021-02-12 14:02:24', '2021-02-12 14:02:24'),
(53, 56, 0, 'It is hard to find a classy space with elegantly laid designs as this for a hostel. Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'It is hard to find a classy space with elegantly laid designs as this for a hostel. Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'Vib', '2021-02-12 14:18:04', '2021-02-12 14:18:04'),
(54, 57, 0, 'It is hard to find a classy space with elegantly laid designs. Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech Ghana', '2021-02-12 14:58:21', '2021-02-12 14:58:21'),
(55, 58, 0, 'This beautiful walled 3 bedroom property is a must get for small families who want both affordability and comfort.\r\n\r\nDecently designed with basic fittings in the bathroom, kitchen, halls and bedrooms. This is your obvious choice if you want to make a new family or already have.', 'Situated in the hub of one of Greater Accra\'s finest community', 'Vibtech Ghana', '2021-02-12 15:10:55', '2021-02-12 15:10:55'),
(56, 59, 0, 'This property comes with an expansive kitchen, well-spaced car parks and properly ventilated rooms.', 'Alternate power supply for your uninterrupted power supply is available.', 'Vibtech Ghana', '2021-02-12 15:21:06', '2021-02-12 15:21:06'),
(57, 60, 0, 'Move in now into this 2 bedroom apartment for some quality time. This property is suitable for small families who want spend some excellent time together.', 'It is situated to nearby recreational places to kill time and create more memories like the Labadi beach.', 'VibTech Ghana', '2021-02-12 15:29:43', '2021-02-12 15:29:43'),
(58, 61, 0, 'You need space. Not just space but your own space and we have just that for you with this property.\r\n\r\nGet this 2 bedroom property with partial furnishing with basic fittings in your bedroom, hall, kitchen and bathroom.', 'You don\'t have to miss this with close proximity to schools and shopping malls.', 'Contact Vibtech Ghana', '2021-02-12 15:51:03', '2021-02-12 15:51:03'),
(59, 62, 0, 'It is a rare opportunity to get a room available for rent in this commercial area. Beautiful and spacious rooms with provided suited appliances in the kitchen, bathrooms and bedrooms. Enjoy the comfort and breath fresh breeze from the garden beyond our glass windows', 'The house is located about 30 minutes from the vibrant city and is suited for a quite get away tenants.', 'Call Vibtech Ghana', '2021-02-12 16:00:29', '2021-02-12 16:00:29'),
(60, 63, 0, 'It is hard to find a classy space with elegantly laid designs as this for a hostel. Make the most of your work and study with these furnished rooms with well spaced study rooms, hall for your relaxation', 'Centrally located and with excellent roads to and from you’re just a few minutes drive from shopping and leisure centers', 'Vibtech Ghana', '2021-02-12 16:21:05', '2021-02-12 16:21:05'),
(61, 64, 0, 'This beautiful walled 3 bedroom property is a must get for small families who want both affordability and comfort. Decently designed with basic fittings in the bathroom, kitchen, halls and bedrooms.\r\n\r\nThis is your obvious choice if you want to make a new family or already have.', 'Situated in the hub of one of Greater Accra\'s finest community', 'Contact Vibtech', '2021-02-12 17:45:27', '2021-02-12 17:45:27'),
(62, 65, 0, 'You need space. Not just space but your own space and we have just that for you with this property. It affords you a spacey bedroom and a generously designed interior', 'Situated in the hub of one of Greater Accra\'s finest community', 'Vibitech Ghana', '2021-02-12 17:50:38', '2021-02-12 17:50:38'),
(63, 66, 0, 'You need space. Not just space but your own space and we have just that for you with this property. It affords you a spacey bedroom and a generously designed interior', 'You don\'t have to miss this with close proximity to schools and shopping malls', 'Vibtech Ghana', '2021-02-12 17:54:08', '2021-02-12 17:54:08'),
(64, 67, 0, 'You need space. Not just space but your own space and we have just that for you with this property. It affords you a spacey bedroom and a generously designed interior with a relaxing swimming pool added on.', 'You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech Ghana', '2021-02-12 18:00:11', '2021-02-12 18:00:11'),
(65, 68, 0, 'You need space. Not just space but your own space and we have just that for you with this property. It affords you a spacey bedroom and a generously designed interior with a relaxing swimming pool added on.', 'You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech Ghana', '2021-02-12 18:12:36', '2021-02-12 18:12:36'),
(66, 69, 0, 'You need space. Not just space but your own space and we have just that for you with this property. It affords you a spacey bedroom and a generously designed interior.', 'You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech', '2021-02-12 18:32:24', '2021-02-12 19:04:13'),
(67, 70, 0, 'You need space. Not just space but your own space and we have just that for you with this property. It affords you a spacey bedroom and a generously designed interior.', 'Property is not located in a gated community.', 'Vibtech Ghana', '2021-02-12 18:49:22', '2021-02-12 19:02:03'),
(68, 71, 0, 'You need space. Not just space but your own space and we have just that for you with this property. It affords you a spacey bedroom and a generously designed interior', 'Property is not located in a gated community with 24 hours security service.', 'Vibtech Ghana', '2021-02-12 19:10:07', '2021-02-12 19:10:07'),
(69, 72, 1, 'You need space. Not just space but your own space and we have just that for you with this property. It affords you a spacey bedroom and a generously designed interior', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation. Warm neighbors to share your peace with.', 'Vibtech Ghana', '2021-02-12 19:20:19', '2021-02-12 19:20:19'),
(70, 73, 0, 'You need space. Not just space but your own space and we have just that for you with this property. It affords you a spacey bedroom and a generously designed interior', 'Property is not located in a gated community with 24 hours security service.', 'Vibtech', '2021-02-12 19:32:15', '2021-02-12 19:32:15'),
(71, 77, 0, 'Make your studies and work less stressful in our comfortable rooms. The interior fittings of our rooms would make you feel at home with the best installation from basic ones in the kitchen and a relaxing tub in the bathroom to cool you down', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation. Warm neighbors to share your peace with.', 'Vibtech Ghana', '2021-02-15 15:05:38', '2021-02-15 15:05:38'),
(72, 78, 0, 'You need space. Not just space but your own space and we have just that for you with this property. \r\n\r\nIt affords you a spacey bedroom and a generously designed interior. And our proportionate sized swimming pool is here for your relaxing times alone or with friends who come over for fun.', 'Centrally located and with excellent roads to and from you’re just a few minutes drive from shopping and leisure centers', 'Vibtech Ghana', '2021-02-15 15:57:15', '2021-02-15 15:57:15'),
(73, 79, 0, 'Cool, calm and sophisticated with a youthful edge, this functional home is enveloped in light and comfort. \r\n\r\nYou need this. All this luxury for a surprising fee.', 'With transport, schools, shops, dining & leisure facilities within easy reach, this is the ideal place to call home. Be prepared for this to be ‘love at first sight’.', 'Vibtech Ghana', '2021-02-15 16:26:25', '2021-02-15 16:26:25'),
(74, 80, 0, 'Away from the rush of the vehicles, toots of horns and the hoots of the hawkers on the streets. Find your peace in our self contained rooms.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation. Warm neighbors to share your peace with.', 'Vibtech Ghana', '2021-02-15 17:16:17', '2021-02-15 17:16:17'),
(75, 81, 0, 'Cool, calm and sophisticated with a youthful edge, this functional home is enveloped in light and comfort. Crisp white walls, timber floors, and high ceilings create a style as timeless as the sparkling ocean view.', 'With transport, schools, shops, dining & leisure facilities within easy reach, this is the ideal place to call home. Be prepared for this to be ‘love at first sight’.', 'Vibtech Ghana', '2021-02-15 17:38:29', '2021-02-15 17:38:29'),
(76, 82, 0, 'This property has fully furnished self contained rooms with a shared kitchen, well-spaced car parks and properly ventilated rooms', 'Alternate power supply for your uninterrupted power supply is available.', 'Vibtech Ghana', '2021-02-15 18:30:02', '2021-02-15 18:30:02'),
(77, 76, 0, 'This 3 bedroom property has spacious hall to offer more room for hosting your celebrations. Installed wardrobes with exotic wood and excellent finishing, marble laid floors and quality Turkey framed doors.', 'With transport, schools, shops, dining & leisure facilities within easy reach, this is the ideal place to call home. Be prepared for this to be ‘love at first sight’.', 'Vibtech Ghana', '2021-02-16 09:48:04', '2021-02-16 09:48:04'),
(78, 75, 0, 'This property is a 5 bedroom property with 4 bathrooms and 4 toilets. It is more suitable for a larger family with its rooms interlocked intricately to keep the larger family more closer.', 'With transport, schools, shops, dining & leisure facilities within easy reach, this is the ideal place to call home. Be prepared for this to be ‘love at first sight’.', 'Call Vibtech Ghana', '2021-02-16 09:54:16', '2021-02-16 09:54:16'),
(79, 45, 0, 'A modern styled furnished room within a serene environment.\r\nThis is a fine choice for small families. excellent lighting conditions with installations of the best of Lee\'s Auth\'s special lights choices. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'Situated in the hub of one of Greater Accra\'s finest community', 'Vibtech Ghana', '2021-02-16 13:53:03', '2021-02-16 13:53:03'),
(80, 74, 0, 'fff', 'fff', 'fff', '2021-02-16 16:11:46', '2021-02-16 16:11:46'),
(81, 83, 0, 'You need space. Not just space but your own space and we have just that for you with this property. It affords you a spacey bedroom and a generously designed interior.', 'Property is not located in a gated community with 24 hours security service.', 'Vibtech Ghana', '2021-02-16 16:16:50', '2021-02-16 18:06:52'),
(82, 86, 1, 'Ultra-modern 3 bedroom house in a gated community at spintex.', 'Centrally located and with excellent roads to and from you’re just a few minutes drive from shopping and leisure centers', 'Located off the comm 18 stretch at Spintex,', '2021-03-01 04:40:34', '2021-03-01 04:40:34'),
(83, 87, 1, '4bedroom self compound for sale at spintex road all master bedroom kitchen big compound for a car park.', 'located near shopping mall, gym, fuel station', 'Tema Comm. 16', '2021-03-01 04:59:37', '2021-03-01 04:59:37'),
(84, 88, 0, '3 Bedroom house with well furnished rooms for rent at Nsawam. There is a spacious living room to hold your guest entertained in your festive occasions.', 'Nsawam is a great place to save a lot. With close proximity to the market, entertaining pubs and restaurants, schools and the presence of the Eastern region police headquarters.', 'Contact Vibtech Ghana', '2021-03-03 15:01:06', '2021-03-03 15:01:06'),
(85, 89, 0, 'See our 4 bedroom house in Medie. Elaborately designed rooms furnished with quality fittings in the kitchens.', 'Our property is located along with a host of many renowned brands such as Voltic, Rush, Accra Compost  and others. \r\nIt is a lucrative place for commerce.', 'Call Vibtech', '2021-03-03 15:22:52', '2021-03-03 15:22:52'),
(86, 90, 0, 'This 3 bedroom house would be a great place to be housed in. With spacious bedrooms, grainy tiles, washable paints and exquisite designs in the kitchen and bedroom fittings.', 'You would find yourself in an environment with close proximity to schools, hospital and other publics', 'Call Vibtech', '2021-03-03 15:33:17', '2021-03-03 15:33:17'),
(87, 91, 0, 'This  apartment with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present. Kitchen and bathroom are stocked with relevant gadgets for convenience. A stand by generator in case of power fluctuation.', 'There is also a backup power supply for an interrupted supply of power and a huge septic tank for water storage.\r\nWarm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping', 'Contact Vibtech', '2021-03-04 11:13:00', '2021-03-04 11:13:00'),
(88, 92, 1, 'This  apartment with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present. Kitchen and bathroom are stocked with relevant gadgets for convenience.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Contact Vibtech Ghana', '2021-03-04 11:18:39', '2021-03-04 11:18:39'),
(89, 93, 0, 'A modern styled furnished house within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations of the best of Lee\'s Auth\'s special lights choices. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'There is also a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'Contact Vibtech', '2021-03-04 11:25:42', '2021-03-04 11:25:42'),
(90, 94, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations of the best of Lee\'s Auth\'s special lights choices. \r\n\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Contact Vibtech Ghana', '2021-03-04 11:31:57', '2021-03-04 11:31:57'),
(91, 95, 0, 'This  apartment with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present. Kitchen and bathroom are stocked with relevant gadgets for convenience.', 'There is also a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'Contact Vibtech', '2021-03-04 11:39:38', '2021-03-04 11:39:38'),
(92, 96, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations of the best of Lee\'s Auth\'s special lights choices. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Contact Vibtech Ghana', '2021-03-04 11:48:16', '2021-03-04 11:48:16'),
(93, 97, 0, 'This  apartment with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present. Kitchen and bathroom are stocked with relevant gadgets for convenience.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Contact Vibtech Ghana', '2021-03-04 11:55:35', '2021-03-04 11:55:35'),
(94, 98, 0, 'It is hard to find a classy space with elegantly laid designs as this for a hostel. Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Contact Vibtech', '2021-03-04 12:23:40', '2021-03-04 12:23:40'),
(95, 99, 0, 'It is hard to find a classy space with elegantly laid designs as this for a hostel. Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'There is also a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'Contact Vibtech', '2021-03-04 12:36:09', '2021-03-04 12:36:09'),
(96, 100, 0, 'It is hard to find a classy space with elegantly laid designs as this for a hostel. Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Contact Vibtech', '2021-03-04 12:47:13', '2021-03-04 12:47:13'),
(97, 101, 0, 'Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.\r\n Kitchen and bathroom are stocked with relevant gadgets for convenience', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Contact Vibtech', '2021-03-04 13:02:15', '2021-03-04 13:02:15'),
(98, 102, 0, 'It is hard to find a classy space with elegantly laid designs as this for a hostel. Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Contact Vibtech Ghana', '2021-03-04 13:22:43', '2021-03-04 13:22:43'),
(99, 103, 0, 'This  apartment with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present. Kitchen and bathroom are stocked with relevant gadgets for convenience. A stand by generator in case of power fluctuation.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech', '2021-03-04 13:37:27', '2021-03-04 13:37:27'),
(100, 104, 0, 'This  apartment with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present. Kitchen and bathroom are stocked with relevant gadgets for convenience', 'There is also a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'Vibtech Ghana', '2021-03-04 14:12:32', '2021-03-04 14:12:32'),
(101, 105, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations of the best of Veramould special lights choices', 'There is also a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'Contact Vibtech', '2021-03-04 15:20:03', '2021-03-04 15:20:03'),
(102, 106, 0, 'This  apartment with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present. Kitchen and bathroom are stocked with relevant gadgets for convenience', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Contact Vibtech Ghana', '2021-03-04 16:56:19', '2021-03-04 16:56:19'),
(103, 107, 0, 'It is hard to find a classy space with elegantly laid designs as this for a hostel. Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Contact Vibtech', '2021-03-04 17:19:24', '2021-03-04 17:19:24'),
(104, 108, 0, 'This  apartment with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Contact Vibtech Ghana', '2021-03-04 18:31:30', '2021-03-04 18:31:30'),
(105, 109, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations', 'There is also a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'Contact Vibtech Ghana', '2021-03-04 18:53:46', '2021-03-04 18:53:46'),
(106, 110, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations.\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'There is also a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'Vibtech Ghana', '2021-03-04 19:10:04', '2021-03-04 19:10:04'),
(107, 111, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations.\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Contact Vibtech Ghana', '2021-03-04 19:47:16', '2021-03-04 19:47:16'),
(108, 112, 0, 'This  apartment with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Contact Vibtech Ghana', '2021-03-04 19:55:36', '2021-03-04 19:55:36'),
(109, 113, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations.\r\n\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech Ghana', '2021-03-05 14:48:42', '2021-03-05 14:48:42'),
(110, 114, 1, 'This  3 bedroom apartment with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech', '2021-03-05 14:54:26', '2021-03-05 14:54:26'),
(111, 115, 0, 'Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech Ghana', '2021-03-05 15:07:03', '2021-03-05 15:07:03'),
(112, 117, 0, 'It is hard to find a classy space with elegantly laid designs as this for a hostel. Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'There is also a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'Vibtech Ghana', '2021-03-09 15:42:19', '2021-03-09 15:42:19'),
(113, 118, 1, 'This  apartment with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present. Kitchen and bathroom are stocked with relevant gadgets for convenience. A stand by generator in case of power fluctuation.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Contact Vibtech Ghana', '2021-03-09 15:48:02', '2021-03-09 15:48:02'),
(114, 119, 0, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. A shared gym for your routine exercises. This is what you need for a wonderful home.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Contact Vibtech Ghana', '2021-03-09 15:55:05', '2021-03-09 15:55:05'),
(115, 121, 1, 'You need both comfort and convenience. Don\'t let this property off your want list. It comes with great designs and spacey rooms to show your taste of luxury at a low cost.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech Ghana', '2021-03-09 20:42:37', '2021-03-09 20:42:37'),
(116, 122, 1, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. \r\nYou need both comfort and convenience. Don\'t let this property off your want list.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech Ghana', '2021-03-09 21:00:01', '2021-03-09 21:00:01'),
(117, 123, 0, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. \r\nYou need both comfort and convenience. Don\'t let this property off your want list.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech Ghana', '2021-03-09 21:08:51', '2021-03-09 21:08:51'),
(118, 124, 0, 'You need both comfort and convenience. Don\'t let this property off your want list. It comes with great designs and spacey rooms to show your taste of luxury at a low cost.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech', '2021-03-09 21:21:56', '2021-03-09 21:21:56'),
(119, 125, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations.\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'There is also a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'Vibtech', '2021-03-09 21:58:02', '2021-03-09 21:58:02'),
(120, 126, 0, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. \r\nYou need both comfort and convenience. Don\'t let this property off your want list.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech Ghana', '2021-03-09 22:15:14', '2021-03-09 22:15:14'),
(121, 127, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations of the best of Lee\'s Auth\'s special lights choices. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech Ghana', '2021-03-09 22:20:33', '2021-03-09 22:20:33'),
(122, 128, 0, 'You need both comfort and convenience. Don\'t let this property off your want list. It comes with great designs and spacey rooms to show your taste of luxury at a low cost.', 'There is also a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'Vibtech Ghana', '2021-03-09 22:34:50', '2021-03-09 22:34:50'),
(123, 129, 0, 'You need both comfort and convenience. Don\'t let this property off your want list. It comes with great designs and spacey rooms to show your taste of luxury at a low cost for a hostel', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech Ghana', '2021-03-09 22:57:41', '2021-03-09 22:57:41');
INSERT INTO `property_descriptions` (`id`, `property_id`, `gate`, `description`, `neighbourhood`, `direction`, `created_at`, `updated_at`) VALUES
(124, 130, 0, 'Kitchen and bathroom are stocked with relevant gadgets for convenience. A stand by generator in case of power fluctuation.', 'There is  a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'Vibtech Ghana', '2021-03-09 23:05:32', '2021-03-09 23:05:32'),
(125, 116, 0, 'Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.\r\nIt is hard to find a classy space with elegantly laid designs as this for a hostel.', 'There is  a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'Vibtech Ghana', '2021-03-10 15:09:03', '2021-03-10 15:09:03'),
(126, 131, 0, 'It is hard to find a classy space with elegantly laid designs as this for a hostel. Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech Ghana', '2021-03-10 15:17:48', '2021-03-10 15:17:48'),
(127, 132, 0, 'You need both comfort and convenience. Don\'t let this property off your want list. It comes with great designs and spacey rooms to show your taste of luxury at a low cost for a hostel', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Contact Vibtech', '2021-03-10 15:32:37', '2021-03-10 15:32:37'),
(128, 133, 0, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. \r\nYou need both comfort and convenience. Don\'t let this property off your want list.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech Ghana', '2021-03-10 15:50:37', '2021-03-10 15:50:37'),
(129, 134, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations of the best of Lee\'s Auth\'s special lights choices. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech Ghana', '2021-03-10 15:55:34', '2021-03-10 15:55:34'),
(130, 135, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations.\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools, shopping centers and markets', 'Vibtech Ghana', '2021-03-10 16:01:13', '2021-03-10 16:01:13'),
(131, 136, 0, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. A shared gym for your routine exercises. This is what you need for a wonderful home.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'VibTech Ghana', '2021-03-10 16:06:18', '2021-03-10 16:06:18'),
(132, 137, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations.\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'There is  a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'VibTech Ghana', '2021-03-10 16:25:03', '2021-03-10 16:25:03'),
(133, 138, 1, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. \r\nYou need both comfort and convenience. Don\'t let this property off your want list.', 'There is  a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'Vibtech', '2021-03-10 16:31:40', '2021-03-10 16:31:40'),
(134, 139, 0, 'You need both comfort and convenience. Don\'t let this property off your want list. It comes with great designs and spacey rooms to show your taste of luxury at a low cost for a room', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech Ghana', '2021-03-10 16:39:24', '2021-03-10 16:39:24'),
(135, 140, 0, 'Big space. Elaborate designs. \r\nYou are the tenant its been waiting for.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping centers.', 'Vibtech Ghana', '2021-03-10 16:48:01', '2021-03-10 16:48:01'),
(136, 141, 0, 'You need both comfort and convenience. Don\'t let this property off your want list. It comes with great designs and spacey rooms to show your taste of luxury at a low cost for a property', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech Ghana', '2021-03-10 16:56:06', '2021-03-10 16:56:06'),
(137, 142, 0, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'There is  a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'Vibtech Ghana', '2021-03-10 17:10:05', '2021-03-10 17:10:05'),
(138, 143, 0, 'You need both comfort and convenience. Don\'t let this property off your want list. It comes with great designs and spacey rooms to show your taste of luxury at a low cost for a property', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech Ghana', '2021-03-10 17:22:38', '2021-03-10 17:22:38'),
(139, 144, 1, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. A shared gym for your routine exercises. This is what you need for a wonderful home', 'There is  a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'Vibtech', '2021-03-10 17:43:36', '2021-03-10 17:43:36'),
(140, 145, 0, 'You need both comfort and convenience. Don\'t let this property off your want list. It comes with great designs and spacey rooms to show your taste of luxury at a low cost for a property', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech', '2021-03-10 17:48:55', '2021-03-10 17:48:55'),
(141, 146, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations.\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech Ghana', '2021-03-10 18:03:04', '2021-03-10 18:03:04'),
(142, 147, 0, 'Kitchen and bathroom are stocked with relevant gadgets for convenience. A stand by generator in case of power fluctuation.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech', '2021-03-10 18:24:00', '2021-03-10 18:24:00'),
(143, 148, 0, 'Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech Ghana', '2021-03-10 19:27:41', '2021-03-10 19:27:41'),
(144, 149, 0, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. \r\nYou need both comfort and convenience. Don\'t let this property off your want list.', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech Ghana', '2021-03-10 19:46:26', '2021-03-10 19:46:26'),
(145, 150, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations of the best of Lee\'s Auth\'s special lights choices.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech', '2021-03-10 21:55:51', '2021-03-10 21:55:51'),
(146, 151, 0, 'It is hard to find a classy space with elegantly laid designs as this. Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'There is  a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'Vibtech Ghana', '2021-03-11 14:18:31', '2021-03-11 14:18:31'),
(147, 152, 0, 'It is hard to find a classy space with elegantly laid designs as this. A modern styled furnished room within a serene environment. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech Ghana', '2021-03-11 14:24:31', '2021-03-11 14:24:31'),
(148, 153, 0, 'This is a 4 bedroom property with an expansive kitchen with up to date fittings that would give you both style and convenience. Great floral designs, elaborate rooms with artistically designed floors and soaring roofs.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech Ghana', '2021-03-11 14:42:28', '2021-03-11 14:46:44'),
(149, 154, 0, 'It is hard to find a classy space with elegantly laid designs as this. A modern styled furnished room within a serene environment. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech Ghana', '2021-03-11 14:53:53', '2021-03-11 14:53:53'),
(150, 155, 0, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech Ghana', '2021-03-11 15:03:56', '2021-03-11 15:03:56'),
(151, 156, 1, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. \r\nYou need both comfort and convenience. Don\'t let this property off your want list.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech Ghana', '2021-03-11 15:12:01', '2021-03-11 15:12:01'),
(152, 157, 0, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech Ghana', '2021-03-11 15:18:56', '2021-03-11 15:18:56'),
(153, 158, 0, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. A shared gym for your routine exercises. This is what you need for a wonderful home.', 'There is  a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'Vibtech', '2021-03-11 16:23:37', '2021-03-11 16:23:37'),
(154, 159, 0, 'Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech', '2021-03-11 16:31:27', '2021-03-11 16:31:27'),
(155, 160, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations.\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech', '2021-03-11 16:37:27', '2021-03-11 16:37:27'),
(156, 161, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations of the best of Lee\'s Auth\'s special lights choices. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech Ghana', '2021-03-11 16:45:31', '2021-03-11 16:45:31'),
(157, 163, 0, 'It is hard to find a classy space with elegantly laid designs as this. A modern styled furnished room within a serene environment. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech', '2021-03-11 17:04:24', '2021-03-11 17:04:24'),
(158, 164, 1, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'There is  a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'Vibtech', '2021-03-11 17:26:10', '2021-03-11 17:26:10'),
(159, 165, 1, 'It is hard to find a classy space with elegantly laid designs as this. \r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech', '2021-03-11 17:32:33', '2021-03-11 17:32:33'),
(160, 166, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations.\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech', '2021-03-11 17:44:08', '2021-03-11 17:44:08'),
(161, 167, 0, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech', '2021-03-11 17:54:23', '2021-03-11 17:54:23'),
(162, 168, 0, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech', '2021-03-11 18:05:09', '2021-03-11 18:05:09'),
(163, 169, 0, 'It is hard to find a classy space with elegantly laid designs as this. Don\'t let this property off your want list. It comes with great designs and spacey rooms to show your taste of luxury at a low cost for a property', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech', '2021-03-11 18:12:22', '2021-03-11 18:12:22'),
(164, 170, 0, 'It is hard to find a classy space with elegantly laid designs as this. A modern styled furnished room within a serene environment.\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech Ghana', '2021-03-11 18:21:40', '2021-03-11 18:21:40'),
(165, 171, 0, 'It is hard to find a classy space with elegantly laid designs as this for a hostel. Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech', '2021-03-11 20:03:16', '2021-03-11 20:03:16'),
(166, 172, 0, 'It is hard to find a classy space with elegantly laid designs as this for a hostel. Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech', '2021-03-11 20:07:00', '2021-03-11 20:07:00'),
(167, 173, 0, 'Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech Ghana', '2021-03-11 20:11:41', '2021-03-11 20:11:41'),
(168, 174, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations.\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'Vibtech', '2021-03-11 20:19:38', '2021-03-11 20:19:38'),
(169, 175, 0, 'Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech', '2021-03-11 20:27:09', '2021-03-11 20:27:09'),
(170, 176, 0, 'You need both comfort and convenience. Don\'t let this property off your want list. It comes with great designs and spacey rooms to show your taste of luxury at a low cost for a property', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech', '2021-03-11 20:31:06', '2021-03-11 20:31:06'),
(171, 177, 0, 'You need both comfort and convenience. Don\'t let this property off your want list. It comes with great designs and spacey rooms to show your taste of luxury at a low cost for a property', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech', '2021-03-11 20:36:15', '2021-03-11 20:36:15'),
(172, 178, 0, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. \r\nYou need both comfort and convenience. Don\'t let this property off your want list.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech', '2021-03-11 20:46:30', '2021-03-11 20:46:30'),
(173, 179, 0, 'It is hard to find a classy space with elegantly laid designs as this. A modern styled furnished room within a serene environment. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech', '2021-03-11 20:52:45', '2021-03-11 20:52:45'),
(174, 180, 0, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. \r\nYou need both comfort and convenience. Don\'t let this property off your want list.', 'There is  a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'Vibtech Ghana', '2021-03-11 21:23:32', '2021-03-11 21:23:32'),
(175, 181, 0, 'It is hard to find a classy space with elegantly laid designs as this. A modern styled furnished room within a serene environment. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech Ghana', '2021-03-11 21:43:57', '2021-03-11 21:43:57'),
(176, 182, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations of the best of Lee\'s Auth\'s special lights choices. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech', '2021-03-11 21:54:50', '2021-03-11 21:54:50'),
(177, 183, 0, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech Ghana', '2021-03-11 22:03:58', '2021-03-11 22:03:58'),
(178, 184, 0, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. A shared gym for your routine exercises. This is what you need for a wonderful home.', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech', '2021-03-11 22:20:14', '2021-03-11 22:20:14'),
(179, 185, 0, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. A shared gym for your routine exercises. This is what you need for a wonderful home.', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech Ghana', '2021-03-11 22:29:32', '2021-03-11 22:29:32'),
(180, 186, 1, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'There is  a backup power supply for uninterrupted supply of power and a huge septic tank for water storage.', 'Vibtech', '2021-03-11 22:47:12', '2021-03-11 22:47:12'),
(181, 187, 0, 'This  apartment with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present. Kitchen and bathroom are stocked with relevant gadgets for convenience.', 'A stand by generator in case of power fluctuation. Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech Ghana', '2021-03-15 14:37:22', '2021-03-15 14:37:22'),
(182, 188, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations.\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'There is  a backup power supply for uninterrupted supply of power and a huge septic tank for water storage.', 'Vibtech Ghana', '2021-03-15 15:07:32', '2021-03-15 15:07:32'),
(183, 189, 0, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech', '2021-03-15 19:28:16', '2021-03-15 19:28:16'),
(184, 190, 0, 'It is hard to find a classy space with elegantly laid designs as this. A modern styled furnished room within a serene environment. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech', '2021-03-15 19:48:33', '2021-03-15 19:48:33'),
(185, 191, 0, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech', '2021-03-15 19:51:13', '2021-03-15 19:51:13'),
(186, 192, 0, 'You need both comfort and convenience. Don\'t let this property off your want list. It comes with great designs and spacey rooms to show your taste of luxury at a low cost for a property', 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'Vibtech Ghana', '2021-03-15 19:58:12', '2021-03-15 19:58:12'),
(187, 193, 0, 'You need both comfort and convenience. Don\'t let this property off your want list. It comes with great designs and spacey rooms to show your taste of luxury at a low cost for a property', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech', '2021-03-15 20:02:31', '2021-03-15 20:02:31'),
(188, 194, 0, 'It is hard to find a classy space with elegantly laid designs as this. A modern styled furnished room within a serene environment. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech', '2021-03-15 20:08:02', '2021-03-15 20:08:02'),
(189, 195, 0, 'It is hard to find a classy space with elegantly laid designs as this. A modern styled furnished room within a serene environment. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech Ghana', '2021-03-15 20:14:27', '2021-03-15 20:14:27'),
(190, 196, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations.\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Contact Vibtech', '2021-03-15 20:22:11', '2021-03-15 20:22:11'),
(191, 197, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations.\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'There is  a backup power supply for uninterrupted supply of power and a huge septic tank for water storage.', 'Vibtech', '2021-03-15 20:27:54', '2021-03-15 20:27:54'),
(192, 198, 0, 'You need both comfort and convenience. Don\'t let this property off your want list. It comes with great designs and spacey rooms to show your taste of luxury at a low cost for a property', 'There is  a backup power supply for uninterrupted supply of power and a huge septic tank for water storage.', 'Vibtech', '2021-03-15 20:31:28', '2021-03-15 20:31:28'),
(193, 199, 0, 'You need both comfort and convenience. Don\'t let this property off your want list. It comes with great designs and spacey rooms to show your taste of luxury at a low cost for a property', 'There is  a backup power supply for uninterrupted supply of power and a huge septic tank for water storage.', 'Vibtech', '2021-03-15 20:38:55', '2021-03-15 20:38:55'),
(194, 200, 0, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'There is  a backup power supply for uninterrupted supply of power and a huge septic tank for water storage.', 'Vibtech', '2021-03-15 20:49:16', '2021-03-15 20:49:16'),
(195, 201, 0, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. \r\n\r\nYou need both comfort and convenience. Don\'t let this property off your want list.', 'There is  a backup power supply for uninterrupted supply of power and a huge septic tank for water storage.', 'Vibtech', '2021-03-15 21:08:17', '2021-03-15 21:08:17'),
(196, 202, 0, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. A shared gym for your routine exercises. This is what you need for a wonderful home.', 'There is  a backup power supply for uninterrupted supply of power and a huge septic tank for water storage.', 'Vibtech', '2021-03-15 21:16:44', '2021-03-15 21:16:44'),
(197, 203, 0, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. A shared gym for your routine exercises. This is what you need for a wonderful home.', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech', '2021-03-15 21:22:24', '2021-03-15 21:22:24'),
(198, 204, 0, 'It is hard to find a classy space with elegantly laid designs as this. A modern styled furnished room within a serene environment. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech', '2021-03-15 21:27:14', '2021-03-15 21:27:14'),
(199, 205, 0, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. \r\nYou need both comfort and convenience. Don\'t let this property off your want list.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech', '2021-03-15 21:40:42', '2021-03-15 21:40:42'),
(200, 206, 0, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech', '2021-03-15 21:48:39', '2021-03-15 21:48:39'),
(201, 207, 0, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech', '2021-03-15 21:59:08', '2021-03-15 21:59:08'),
(202, 208, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations.\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech Ghana', '2021-03-15 22:06:47', '2021-03-15 22:06:47'),
(203, 209, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations.\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'vibtech', '2021-03-15 22:14:03', '2021-03-15 22:14:03'),
(204, 210, 0, 'It is hard to find a classy space with elegantly laid designs as this. A modern styled furnished room within a serene environment. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech Ghana', '2021-03-15 22:26:14', '2021-03-15 22:26:14'),
(205, 211, 0, 'It is hard to find a classy space with elegantly laid designs as this. A modern styled furnished room within a serene environment. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech', '2021-03-15 22:33:33', '2021-03-15 22:33:33'),
(206, 212, 0, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. \r\nYou need both comfort and convenience. Don\'t let this property off your want list.', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech', '2021-03-15 22:39:10', '2021-03-15 22:39:10'),
(207, 213, 0, 'It is hard to find a classy space with elegantly laid designs as this. A modern styled furnished room within a serene environment. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'There is  a backup power supply for uninterrupted supply of power and a huge septic tank for water storage.', 'Vibtech', '2021-03-15 22:47:21', '2021-03-15 22:47:21'),
(208, 214, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations.\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'There is  a backup power supply for uninterrupted supply of power and a huge septic tank for water storage.', 'Vibtech Ghana', '2021-03-15 22:51:18', '2021-03-15 22:51:18'),
(209, 215, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations.\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech', '2021-03-15 22:55:22', '2021-03-15 22:55:22'),
(210, 216, 0, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech Ghana', '2021-03-15 22:59:58', '2021-03-15 22:59:58'),
(211, 218, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations of the best of Lee\'s Auth\'s special lights choices. Marble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech Ghana', '2021-03-19 16:15:28', '2021-03-19 16:15:28'),
(212, 219, 0, 'This  apartment with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present. Kitchen and bathroom are stocked with relevant gadgets for convenience.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech Ghana', '2021-03-19 16:22:09', '2021-03-19 16:22:09'),
(213, 220, 0, 'This  apartment with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present. Kitchen and bathroom are stocked with relevant gadgets for convenience.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech Ghana', '2021-03-19 16:28:18', '2021-03-19 16:28:18'),
(214, 221, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations.\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech Ghana', '2021-03-19 16:31:39', '2021-03-19 16:31:39'),
(215, 222, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations.\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech Ghana', '2021-03-19 16:34:38', '2021-03-19 16:34:38'),
(216, 223, 0, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech', '2021-03-19 16:39:06', '2021-03-19 16:39:06'),
(217, 224, 0, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech', '2021-03-19 16:43:47', '2021-03-19 16:43:47'),
(218, 225, 0, 'This  apartment with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present. Kitchen and bathroom are stocked with relevant gadgets for convenience.', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech Ghana', '2021-03-19 17:17:19', '2021-03-19 17:17:19'),
(219, 226, 0, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'There is  a backup power supply for uninterrupted supply of power and a huge septic tank for water storage.', 'Vibtech Ghana', '2021-03-19 17:31:17', '2021-03-19 17:31:17'),
(220, 227, 0, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'There is  a backup power supply for uninterrupted supply of power and a huge septic tank for water storage.', 'Vibtech Ghana', '2021-03-19 17:39:14', '2021-03-19 17:39:14'),
(221, 228, 0, 'A modern styled furnished room within a serene environment. This is a fine choice for small families. excellent lighting conditions with installations.\r\nMarble floors with great artistic lines to cheer you up when you look down and a soaring roof to more arts to awe at.', 'There is  a backup power supply for uninterrupted supply of power and a huge septic tank for water storage.', 'Vibtech Ghana', '2021-03-19 17:44:28', '2021-03-19 17:44:28'),
(222, 229, 0, 'This  apartment with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present. Kitchen and bathroom are stocked with relevant gadgets for convenience.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech Ghana', '2021-03-19 18:14:55', '2021-03-19 18:14:55'),
(223, 230, 0, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation.', 'Vibtech Ghana', '2021-03-19 18:20:20', '2021-03-19 18:20:20'),
(224, 231, 0, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'There is  a backup power supply for uninterrupted supply of power and a huge septic tank for water storage.', 'Vibtech Ghana', '2021-03-19 18:30:07', '2021-03-19 18:30:07'),
(225, 232, 0, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. \r\nYou need both comfort and convenience. Don\'t let this property off your want list.', 'There is  a backup power supply for uninterrupted supply of power and a huge septic tank for water storage.', 'Vibtech Ghana', '2021-03-19 18:37:12', '2021-03-19 18:37:12'),
(226, 233, 0, 'Great floral designs, elaborate rooms with artistically designed floors and soaring roofs. \r\nYou need both comfort and convenience. Don\'t let this property off your want list.', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech Ghana', '2021-03-19 18:42:50', '2021-03-19 18:42:50'),
(227, 234, 0, 'You need both comfort and convenience. Don\'t let this property off your want list. It comes with great designs and spacey rooms to show your taste of luxury at a low cost for a property', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech Ghana', '2021-03-19 19:43:13', '2021-03-19 19:43:13'),
(228, 235, 0, 'You need both comfort and convenience. Don\'t let this property off your want list. It comes with great designs and spacey rooms to show your taste of luxury at a low cost for a property', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech Ghana', '2021-03-19 19:59:07', '2021-03-19 19:59:07'),
(229, 236, 0, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'Warm neighbors to share your peace with. You don\'t have to miss this with close proximity to schools and shopping malls.', 'Vibtech Ghana', '2021-03-19 20:05:24', '2021-03-19 20:05:24'),
(230, 217, 0, 'This property with a modern architectural design and vintage look on the inside gives you the double experience of both the past and the present coupled with expansive rooms and exquisite floral and roof works', 'This property is in close proximity to historical sites and recreational places to relieve you of any stress whenever you need to cool down', 'Vibtech Ghana', '2021-03-19 20:12:23', '2021-03-19 20:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `property_hostel_blocks`
--

CREATE TABLE `property_hostel_blocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `block_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_hostel_blocks`
--

INSERT INTO `property_hostel_blocks` (`id`, `property_id`, `block_name`, `created_at`, `updated_at`) VALUES
(18, 43, 'grace', '2021-02-12 12:10:18', '2021-02-12 12:10:18'),
(19, 44, 'yehowa', '2021-02-12 12:26:14', '2021-02-12 12:26:14'),
(20, 45, 'nakua', '2021-02-12 12:43:02', '2021-02-12 12:43:02'),
(21, 45, 'jeff', '2021-02-12 12:43:12', '2021-02-12 12:43:12'),
(22, 45, 'rocolina', '2021-02-12 12:43:40', '2021-02-12 12:43:40'),
(23, 77, 'marley', '2021-02-15 14:54:40', '2021-02-15 14:54:40'),
(24, 78, 'ap 4', '2021-02-15 15:48:15', '2021-02-15 15:48:15'),
(25, 79, 'karifi', '2021-02-15 16:05:59', '2021-02-15 16:05:59'),
(26, 79, 'dunya', '2021-02-15 16:06:05', '2021-02-15 16:06:05'),
(27, 80, 'jomotor', '2021-02-15 17:07:32', '2021-02-15 17:07:32'),
(28, 81, 'shasha', '2021-02-15 17:20:42', '2021-02-15 17:20:42'),
(29, 82, 'saydin', '2021-02-15 18:07:59', '2021-02-15 18:07:59'),
(30, 83, 'karifi', '2021-02-16 16:13:04', '2021-02-16 16:13:04'),
(31, 84, 'marley', '2021-02-19 15:51:55', '2021-02-19 15:51:55'),
(32, 98, 'atumpan', '2021-03-04 12:05:06', '2021-03-04 12:05:06'),
(33, 99, 'gyina well properties', '2021-03-04 12:27:59', '2021-03-04 12:27:59'),
(34, 100, 'marley', '2021-03-04 12:39:09', '2021-03-04 12:39:09'),
(35, 101, 'dukes', '2021-03-04 12:50:27', '2021-03-04 12:50:27'),
(36, 102, 'winner', '2021-03-04 13:12:12', '2021-03-04 13:12:12'),
(37, 103, 'marley', '2021-03-04 13:24:11', '2021-03-04 13:24:11'),
(38, 104, 'experience', '2021-03-04 14:03:47', '2021-03-04 14:03:47'),
(39, 105, 'amen', '2021-03-04 14:58:30', '2021-03-04 14:58:30'),
(40, 106, 'deluxe', '2021-03-04 15:31:32', '2021-03-04 15:31:32'),
(41, 107, 'dukes', '2021-03-04 17:01:27', '2021-03-04 17:01:27'),
(42, 108, 'prices', '2021-03-04 18:23:09', '2021-03-04 18:23:09'),
(43, 111, 'dukes', '2021-03-04 19:41:33', '2021-03-04 19:41:33'),
(44, 115, 'dukes', '2021-03-05 14:56:09', '2021-03-05 14:56:09'),
(45, 116, 'experience', '2021-03-05 15:13:21', '2021-03-05 15:13:21'),
(46, 117, 'gyina well properties', '2021-03-09 15:36:25', '2021-03-09 15:36:25'),
(47, 118, 'winner', '2021-03-09 15:43:49', '2021-03-09 15:43:49'),
(48, 128, 'freeman', '2021-03-09 22:23:08', '2021-03-09 22:23:08'),
(49, 129, 'nurturers', '2021-03-09 22:51:38', '2021-03-09 22:51:38'),
(50, 131, 'paragon', '2021-03-10 15:10:51', '2021-03-10 15:10:51'),
(51, 132, 'adom', '2021-03-10 15:20:08', '2021-03-10 15:20:08'),
(52, 132, 'nkwawura', '2021-03-10 15:20:30', '2021-03-10 15:20:30'),
(53, 133, 'experience', '2021-03-10 15:42:12', '2021-03-10 15:42:12'),
(54, 159, 'gyina well properties', '2021-03-11 16:26:30', '2021-03-11 16:26:30'),
(55, 173, 'winner', '2021-03-11 20:07:51', '2021-03-11 20:07:51'),
(56, 174, 'experience', '2021-03-11 20:14:29', '2021-03-11 20:14:29'),
(57, 175, 'freeman', '2021-03-11 20:20:39', '2021-03-11 20:20:39'),
(58, 184, 'gyina well properties', '2021-03-11 22:09:01', '2021-03-11 22:09:01'),
(59, 185, 'winner', '2021-03-11 22:24:02', '2021-03-11 22:24:02');

-- --------------------------------------------------------

--
-- Table structure for table `property_hostel_prices`
--

CREATE TABLE `property_hostel_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `hostel_block_room_id` int(10) UNSIGNED NOT NULL,
  `payment_duration` int(11) DEFAULT NULL,
  `price_calendar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_price` double NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_hostel_prices`
--

INSERT INTO `property_hostel_prices` (`id`, `hostel_block_room_id`, `payment_duration`, `price_calendar`, `property_price`, `currency`, `created_at`, `updated_at`) VALUES
(2, 3, 12, 'month', 500, 'GHS', '2021-02-12 12:21:52', '2021-02-12 12:21:52'),
(3, 4, 12, 'month', 500, 'GHS', '2021-02-12 12:34:49', '2021-02-12 12:34:49'),
(4, 5, 12, 'month', 500, 'GHS', '2021-02-15 15:05:56', '2021-02-15 15:05:56'),
(5, 6, 12, 'month', 400, 'GHS', '2021-02-15 15:57:47', '2021-02-15 15:57:47'),
(6, 7, 8, 'month', 400, 'GHS', '2021-02-15 16:26:48', '2021-02-15 16:26:48'),
(7, 8, 12, 'month', 250, 'GHS', '2021-02-15 16:27:18', '2021-02-15 16:27:18'),
(8, 9, 12, 'month', 500, 'GHS', '2021-02-15 17:16:34', '2021-02-15 17:16:34'),
(9, 10, 12, 'month', 200, 'GHS', '2021-02-15 17:39:10', '2021-02-15 17:39:10'),
(10, 11, 12, 'month', 200, 'GHS', '2021-02-15 18:30:28', '2021-02-15 18:30:28'),
(11, 12, 12, 'month', 400, 'GHS', '2021-02-16 13:56:36', '2021-02-16 13:56:36'),
(12, 13, 12, 'month', 300, 'GHS', '2021-02-16 16:17:15', '2021-02-16 18:07:40'),
(13, 15, 12, 'month', 400, 'GHS', '2021-03-04 12:24:02', '2021-03-04 12:24:02'),
(14, 16, 12, 'month', 400, 'GHS', '2021-03-04 12:24:37', '2021-03-04 12:24:37'),
(15, 17, 12, 'month', 500, 'GHS', '2021-03-04 12:36:27', '2021-03-04 12:36:27'),
(16, 19, 12, 'month', 300, 'GHS', '2021-03-04 12:48:29', '2021-03-04 12:48:29'),
(17, 21, 12, 'month', 200, 'GHS', '2021-03-04 13:05:09', '2021-03-04 13:05:09'),
(18, 22, 12, 'month', 400, 'GHS', '2021-03-04 13:22:58', '2021-03-04 13:22:58'),
(19, 23, 12, 'month', 400, 'GHS', '2021-03-04 13:23:11', '2021-03-04 13:23:11'),
(20, 24, 12, 'month', 400, 'GHS', '2021-03-04 13:37:48', '2021-03-04 13:37:48'),
(21, 25, 12, 'month', 500, 'GHS', '2021-03-04 14:12:54', '2021-03-04 14:12:54'),
(22, 26, 12, 'month', 200, 'GHS', '2021-03-04 15:20:30', '2021-03-04 15:20:30'),
(23, 27, 12, 'month', 200, 'GHS', '2021-03-04 16:56:56', '2021-03-04 16:56:56'),
(24, 28, 12, 'month', 200, 'GHS', '2021-03-04 17:19:49', '2021-03-04 17:19:49'),
(25, 29, 12, 'month', 500, 'GHS', '2021-03-04 18:32:02', '2021-03-04 18:32:02'),
(26, 30, 12, 'month', 300, 'GHS', '2021-03-04 19:47:34', '2021-03-04 19:47:34'),
(27, 31, 12, 'month', 200, 'GHS', '2021-03-05 15:07:25', '2021-03-05 15:07:25'),
(28, 32, 12, 'month', 300, 'GHS', '2021-03-09 15:42:33', '2021-03-09 15:42:33'),
(29, 33, 12, 'month', 300, 'GHS', '2021-03-09 15:48:16', '2021-03-09 15:48:16'),
(30, 34, 12, 'month', 400, 'GHS', '2021-03-09 22:46:28', '2021-03-09 22:46:28'),
(31, 35, 12, 'month', 300, 'GHS', '2021-03-09 22:57:58', '2021-03-09 22:57:58'),
(32, 36, 12, 'month', 500, 'GHS', '2021-03-10 15:09:16', '2021-03-10 15:09:16'),
(33, 37, 12, 'month', 400, 'GHS', '2021-03-10 15:18:07', '2021-03-10 15:18:07'),
(34, 38, 12, 'month', 300, 'GHS', '2021-03-10 15:32:57', '2021-03-10 15:32:57'),
(35, 39, 12, 'month', 500, 'GHS', '2021-03-10 15:33:11', '2021-03-10 15:33:11'),
(36, 40, 12, 'month', 700, 'GHS', '2021-03-10 15:50:55', '2021-03-10 15:50:55'),
(37, 41, 12, 'month', 300, 'GHS', '2021-03-11 16:31:42', '2021-03-11 16:31:42'),
(38, 42, 12, 'month', 300, 'GHS', '2021-03-11 20:12:09', '2021-03-11 20:12:09'),
(39, 43, 12, 'month', 300, 'GHS', '2021-03-11 20:19:52', '2021-03-11 20:19:52'),
(40, 44, 12, 'month', 300, 'GHS', '2021-03-11 20:27:27', '2021-03-11 20:27:27'),
(41, 45, 6, 'month', 1200, 'GHS', '2021-03-11 22:20:32', '2021-03-11 22:20:32'),
(42, 46, 9, 'month', 500, 'GHS', '2021-03-11 22:30:14', '2021-03-11 22:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `property_images`
--

CREATE TABLE `property_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_images`
--

INSERT INTO `property_images` (`id`, `property_id`, `caption`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '1a0a06806aab6b47c7832981cf8275f7acd34b214.jpg', '2021-02-08 13:26:34', '2021-02-08 13:26:34'),
(2, 2, NULL, '1e47a61752d32eaca37ef8c06534b1422b0612e6b.jpg', '2021-02-08 15:03:59', '2021-02-08 15:03:59'),
(3, 3, 'A spacey car park', '17edb0a9db18bea2333cda44c613f32324215dc3a.jpg', '2021-02-08 15:22:44', '2021-02-08 15:25:23'),
(4, 3, 'A clean and beautiful kitchen', '103c2468e1a99e92cce959764a711193029428d48.jpg', '2021-02-08 15:22:45', '2021-02-08 15:25:39'),
(5, 3, 'A well ventilated room', '145d311434586d38870618f470aefb9b8f47a5bb4.jpg', '2021-02-08 15:22:45', '2021-02-08 15:26:00'),
(6, 3, 'Bedroom', '14ab1d7146eb793fa01afc9d51ff09d558c6bc784.jpg', '2021-02-08 15:22:45', '2021-02-08 15:26:30'),
(7, 3, 'Some green trees for clean breaths', '1ae667ab720e3e7a01e147136273c90db56b0b31c.jpg', '2021-02-08 15:23:38', '2021-02-08 15:26:18'),
(8, 4, 'Kitchen', '125905c447af94e0a4535feecfd07cef49492fa13.jpg', '2021-02-08 15:45:38', '2021-02-08 15:47:41'),
(9, 4, 'View of Swimming pool', '1c22af8619f05d20bc782858d073bbcd7690b9541.jpg', '2021-02-08 15:45:38', '2021-02-08 15:47:59'),
(10, 4, 'Swimming pool', '127f40445f63657f4a75a7bd9223114e6f29166b4.jpg', '2021-02-08 15:45:39', '2021-02-08 15:48:28'),
(11, 4, 'Outside', '15fa28651e2add42e1b5da10626427923026da3f8.jpg', '2021-02-08 15:45:39', '2021-02-08 15:48:16'),
(12, 5, 'Frontview with car park', '12b678028ee2148afc81eed788cb1ed9972855640.jpg', '2021-02-08 15:55:05', '2021-02-08 15:56:20'),
(13, 5, 'Hall', '158fcf33ecc51fdb8b42aeb551e5522215488da37.jpg', '2021-02-08 15:55:05', '2021-02-08 15:56:26'),
(14, 5, 'Swimming pool', '18a52c4aa5265986621c93bf0f4aff9b263adcdde.jpg', '2021-02-08 15:55:05', '2021-02-08 15:56:40'),
(15, 5, 'Bathroom', '1f09467a2ffc15dae3fac5acaa309634516918200.jpg', '2021-02-08 15:55:06', '2021-02-08 15:56:53'),
(17, 6, 'Outside', '1e0a65dc63e74275711bcaf891f48e52667354d7a.jpg', '2021-02-08 16:04:07', '2021-02-08 16:04:46'),
(18, 6, 'Hall', '10c90a4949c1c95d77e5329e9d3a2deb07f8c01cc.jpg', '2021-02-08 16:04:07', '2021-02-08 16:04:49'),
(19, 6, 'Bathroom', '1bb130aed23592fd00c5da15b791813cb93d695fa.jpg', '2021-02-08 16:04:13', '2021-02-08 16:05:18'),
(21, 6, 'Bedroom', '1cd1f5f9433df2f6f543ed516217db0567854e493.jpg', '2021-02-08 16:04:13', '2021-02-08 16:05:31'),
(26, 8, 'Gym', '1aaaea26b6917030baf3bae2ebb3c28f2b33773b7.jpg', '2021-02-08 16:31:49', '2021-02-08 16:32:26'),
(27, 8, 'Outside', '15cffdaa6ac0c8d0a09c66220e4778d6b236ebb03.jpg', '2021-02-08 16:31:49', '2021-02-08 16:32:29'),
(28, 8, 'Bedroom', '1a11ea73e8184dc24903877de8cafa32863466245.jpg', '2021-02-08 16:31:49', '2021-02-08 16:32:31'),
(29, 8, 'Hall', '1a20bdec7319399bcb3758f4b8470d664c61e9a28.jpg', '2021-02-08 16:31:49', '2021-02-08 16:32:38'),
(30, 8, 'Kitchen', '14449344595f7c8cc6e9daf07fe8a214257772df9.jpg', '2021-02-08 16:31:50', '2021-02-08 16:32:43'),
(31, 9, 'Hall', '192b4a26459d33f0ebcef9ca921d886c1ea50c6e0.jpg', '2021-02-08 16:45:08', '2021-02-08 16:45:39'),
(32, 9, 'Outside', '1e93dc01b12f335dccc4f1cff9408eed49b0dfb69.jpg', '2021-02-08 16:45:09', '2021-02-08 16:45:43'),
(33, 9, 'Bedroom', '1fbffcb87c04475fde72f9feb5c5c193ad128a182.jpg', '2021-02-08 16:45:09', '2021-02-08 16:45:37'),
(34, 9, 'Gym', '1c23aa951c2ddacd7f64f36ea72479a1279e9027f.jpg', '2021-02-08 16:53:32', '2021-02-08 16:54:03'),
(35, 9, 'Kitchen', '1601fbee0e71dc05edf71c177362e73b0e28c0124.jpg', '2021-02-08 16:54:23', '2021-02-08 16:54:45'),
(40, 11, 'Hall', '18e54d6c42adf691235776a2dea60bdaf24156512.jpg', '2021-02-08 17:25:08', '2021-02-08 17:25:30'),
(41, 11, 'Outside', '16f1d7cae38bc47a77df82e786259c427ab668453.jpg', '2021-02-08 17:25:08', '2021-02-08 17:25:40'),
(42, 11, 'Kitchen', '1bd4246bb151682ad1910ef431135bc57dfc98ef9.jpg', '2021-02-08 17:25:09', '2021-02-08 17:26:13'),
(43, 11, 'Frontview', '1cb32d146133418952309e2d2e28896cce8fefc2d.jpg', '2021-02-08 17:25:09', '2021-02-08 17:25:43'),
(44, 12, 'Hall', '10fa29334c28b49627d12213e0285d3208466f589.jpg', '2021-02-08 17:44:31', '2021-02-08 17:45:25'),
(45, 12, 'Outside', '1619b9a17b250d1f95ca63ca2a5046380ae31c003.jpg', '2021-02-08 17:44:31', '2021-02-08 17:45:22'),
(47, 12, 'Poolside', '11cfdc9880b1bcbc16dba0888ebf46390c0462724.jpg', '2021-02-08 17:44:31', '2021-02-08 17:45:40'),
(49, 12, 'Outside', '153cac65b84c3a93fa19ee9c9b441a6a4811c160c.jpg', '2021-02-08 17:44:37', '2021-02-08 17:45:53'),
(51, 13, 'Bathroom', '108ee7ce9092fea8dd41f4b473ff8ceb812a78796.jpg', '2021-02-08 18:10:29', '2021-02-08 18:11:05'),
(52, 13, 'Outside', '1db8c59492ef8d46cd7f9ca81a07bd4f7a9ed1fdf.jpg', '2021-02-08 18:10:29', '2021-02-08 18:11:07'),
(53, 13, 'Hall', '15c50adc41207725065c577e5cd102a392cbe9f6b.jpg', '2021-02-08 18:10:29', '2021-02-08 18:11:12'),
(54, 13, 'Bedroom', '1c5f8bb6bcf3b026a528c4fe2cab681e6e9d21b57.jpg', '2021-02-08 18:12:34', '2021-02-08 18:13:32'),
(59, 15, 'Outside', '1f265a948a9b5e485e2f884b200f991df03f8aee9.jpg', '2021-02-09 14:28:35', '2021-02-09 14:28:50'),
(60, 15, 'Kitchen', '1481239f53487cbc0fc0fbb3db9a9caf50e0c9480.jpg', '2021-02-09 14:28:35', '2021-02-09 14:28:56'),
(61, 15, 'Hall', '158d18d482fc4eb939b4d682d2619243d2a112539.jpg', '2021-02-09 14:28:35', '2021-02-09 14:28:59'),
(62, 15, 'Bedroom', '13433ef6301eb01302ce2ef0487a3c64c642c923e.jpg', '2021-02-09 14:28:35', '2021-02-09 14:29:07'),
(67, 17, 'Swimming pool', '1c596442a92f0f9d8fd7759f8a82546e379cc5f46.jpg', '2021-02-09 15:06:04', '2021-02-09 15:06:32'),
(68, 17, 'Outside', '152537e834ef24d63d949655cf6a1ccd37c3b96c0.jpg', '2021-02-09 15:06:05', '2021-02-09 15:06:38'),
(69, 17, 'Kitchen', '17317cbb1fddd8052d87b0204103537d29f9d887b.jpg', '2021-02-09 15:06:05', '2021-02-09 15:06:42'),
(70, 17, 'Bedroom', '1bb529e86a10d69f3cb5c978ad6cd524884a9089f.jpg', '2021-02-09 15:06:05', '2021-02-09 15:06:47'),
(71, 18, 'Outside View', '1a0871f5bbad611193edd282b305b19cb9d73f7e9.jpg', '2021-02-09 15:18:40', '2021-02-09 15:19:53'),
(72, 18, 'Bedroom', '139356c6cd0e2388958eb0fa522e0a38cbf7fa112.jpg', '2021-02-09 15:18:40', '2021-02-09 15:19:59'),
(73, 18, 'Hall', '1ddc64d4ffe13896a8aa01c45fc190b37c1e29c1f.jpg', '2021-02-09 15:18:40', '2021-02-09 15:20:03'),
(75, 18, 'Stairs', '1f19cab6b89b941cda9b9003bf63c2c5408891fee.jpg', '2021-02-09 15:19:45', '2021-02-09 15:20:22'),
(76, 19, 'Outside', '16cf580debd76ccdd0f16a65f27c0e2f9943684fc.jpg', '2021-02-09 15:37:15', '2021-02-09 15:37:23'),
(77, 19, 'Washroom', '11d98cb397f3a36716b8c879c994673ec59bb9941.jpg', '2021-02-09 15:37:15', '2021-02-09 15:37:29'),
(78, 19, 'Bedroom', '154e6b722e1e4a5ace342970e766787fa1eee7b63.jpg', '2021-02-09 15:38:48', '2021-02-09 15:39:05'),
(79, 20, 'Kitchen', '13befb62d0801d573b63e6ec78a3f7ead4d882568.jpg', '2021-02-09 16:00:15', '2021-02-09 16:00:26'),
(80, 20, 'Car Park', '1c3146b9e5b1df7761a63cb3bcc6c1c289d4ab912.jpg', '2021-02-09 16:00:15', '2021-02-09 16:00:35'),
(82, 20, 'Bedroom', '180baa524295ec9a3a414ef54c6f6f891efc407d1.jpg', '2021-02-09 16:00:16', '2021-02-09 16:00:45'),
(83, 21, 'Bedroom', '1171a786a16f91afbf9515e3f01aa85ee22ae77a7.jpg', '2021-02-09 16:45:28', '2021-02-09 16:46:07'),
(84, 21, 'Bathroom', '10e7089a0639a43486b2de146efd7a80fc2c386a3.jpg', '2021-02-09 16:45:28', '2021-02-09 16:46:12'),
(85, 21, 'Gym', '182a83862a835a31c371e83a626510a7787829de4.jpg', '2021-02-09 16:45:28', '2021-02-09 16:46:19'),
(86, 21, 'Outside', '10119e9ae758af28ac3d4d1c3f74691dea8f4998f.jpg', '2021-02-09 16:45:28', '2021-02-09 16:46:24'),
(91, 23, 'Hall', '186f8c7ccc4073840d71cd538f4a0920798ca6e66.jpg', '2021-02-09 18:31:02', '2021-02-09 18:31:23'),
(97, 23, 'Toilet', '144c1b4ea59fcf7120dcabf3c0edaa832a35a7892.jpg', '2021-02-09 18:35:31', '2021-02-09 18:36:11'),
(98, 23, 'Bathroom', '1228c12cb32ad55198586b0d843ecbd0a2e3436d1.jpg', '2021-02-09 18:35:32', '2021-02-09 18:36:12'),
(99, 23, 'Dinning room', '153d8d07f20738927af429d441c043c8a962d2efb.jpg', '2021-02-09 18:35:32', '2021-02-09 18:36:28'),
(100, 24, 'Outside', '1ac41e36cce8ed8c786fd08896af7ab573b51740e.jpg', '2021-02-09 19:09:48', '2021-02-09 19:09:53'),
(101, 24, 'Bedroom', '1c7c660ed58a82d07f57f36ff558afce1cf74219d.jpg', '2021-02-09 19:09:48', '2021-02-09 19:10:00'),
(102, 24, 'Bathroom', '1889a660220038df4ecdc6831bd2be83575bb608a.jpg', '2021-02-09 19:09:49', '2021-02-09 19:10:07'),
(103, 24, 'Outside', '1b261e5bb554a21af4b68769b050ed529041fdbd0.jpg', '2021-02-09 19:09:49', '2021-02-09 19:10:10'),
(104, 24, 'Kitchen', '10f139674bcd96290d22d5ae77019c493c8c49423.jpg', '2021-02-09 19:09:49', '2021-02-09 19:10:16'),
(105, 25, 'Kitchen', '125be9a8c68c31eeb4ad891ed887af1cc79b00d48.jpg', '2021-02-10 09:57:43', '2021-02-10 09:59:48'),
(106, 25, 'Outside', '144363d5b3ccb47e779369135004d4d1584a9ecaf.jpg', '2021-02-10 09:57:43', '2021-02-10 09:59:51'),
(107, 25, 'Stairs', '116776ee565259780ffb1f8b742b64992ea98f2e4.jpg', '2021-02-10 09:57:43', '2021-02-10 10:00:03'),
(108, 25, 'Bedroom', '19199d047fdc71693c2bcead013fd35db195e6430.jpg', '2021-02-10 09:57:43', '2021-02-10 10:00:07'),
(109, 25, 'Hall', '15860de1db0c8ce1fd85a9a3336c7165f430dcbb8.jpg', '2021-02-10 09:57:43', '2021-02-10 10:00:11'),
(115, 28, 'Bedroom', '194957968f20aba0c9a5fbc80a512c998bc3538b1.jpg', '2021-02-10 17:09:37', '2021-02-10 17:09:47'),
(116, 28, 'Hall', '11065b4760271882647109aaaebaeed8ca27a07f5.jpg', '2021-02-10 17:09:38', '2021-02-10 17:09:50'),
(117, 28, 'Outside', '10496a5351b7c53c40f64d13d8d294010ada3afbc.jpg', '2021-02-10 17:09:38', '2021-02-10 17:09:51'),
(118, 28, 'Bathroom', '121f9fd157874b7e79532292e9208d006c02fbb2f.jpg', '2021-02-10 17:09:38', '2021-02-10 17:09:58'),
(119, 29, 'Outside', '1b0bfb8cd19face916369a33daa250d49676c025c.jpg', '2021-02-10 17:35:51', '2021-02-10 17:35:58'),
(120, 29, 'Bathroom', '1e33fdc2271612a3c75ad7c3e7f3a054efc05684c.jpg', '2021-02-10 17:35:52', '2021-02-10 17:36:03'),
(121, 29, 'Stairs', '1666075c5fb55b95b183152ae7e83e60dac8ac398.jpg', '2021-02-10 17:35:52', '2021-02-10 17:36:10'),
(122, 29, 'kitchen', '1b7e3fe949d82e292636981834e94ab29d0592bac.jpg', '2021-02-10 17:35:52', '2021-02-10 17:36:14'),
(123, 29, 'Bedroom', '15b020597d40158557cf77585ac68a0d47160a55e.jpg', '2021-02-10 17:35:52', '2021-02-10 17:36:20'),
(128, 32, 'Gym', '17b73d26c28015dddb94e61bcee3b665d1ee9aee3.jpg', '2021-02-10 18:12:27', '2021-02-10 18:13:28'),
(129, 32, 'Bathroom', '11af31556e0c350a71876e1e36ee21db2beadddff.jpg', '2021-02-10 18:12:28', '2021-02-10 18:13:17'),
(130, 32, 'Hall', '1e19b19351caadf0f149a2089aa1841496737fed6.jpg', '2021-02-10 18:12:28', '2021-02-10 18:13:07'),
(131, 32, 'Outside', '1f8bd0c6cd81c98e18065bd59dc9cff56c330cb83.jpg', '2021-02-10 18:12:28', '2021-02-10 18:13:04'),
(132, 32, 'Outside', '16e27f62fbc8afab48041761c042a0d9983de3d93.jpg', '2021-02-10 18:12:28', '2021-02-10 18:13:06'),
(133, 32, NULL, '143ec976632f482ae45e106187a24602bf601f44e.jpg', '2021-02-10 18:13:38', '2021-02-10 18:13:38'),
(134, 33, 'Hall', '1b72505061124a2c93e1c6be51ba25de59574bc69.jpg', '2021-02-11 09:42:34', '2021-02-11 09:44:39'),
(135, 33, 'Outside', '1d7b402583bd17ad7a3ed9853d3ae0eb94870bb71.jpg', '2021-02-11 09:42:34', '2021-02-11 09:44:41'),
(136, 33, 'Bedroom', '1292272c492cf4047e928b9993953926781ff7113.jpg', '2021-02-11 09:42:34', '2021-02-11 09:44:48'),
(137, 33, 'Kitchen', '1145de1fc34dc96c9c20758767e9976f24ba9c0d8.jpg', '2021-02-11 09:42:35', '2021-02-11 09:44:56'),
(139, 33, 'Outside', '17cc1de7d5db3ae29318b0f4710e76112a72227be.jpg', '2021-02-11 09:44:34', '2021-02-11 09:44:59'),
(155, 37, 'Outside', '168b2407dd6676193c51efa8f21661ea263ae044b.jpg', '2021-02-11 14:43:23', '2021-02-11 14:48:20'),
(156, 37, 'Street Parking', '140cd810fe696f54da66cc7f85d7c2f6ec35349ef.jpg', '2021-02-11 14:44:01', '2021-02-11 14:48:40'),
(157, 37, 'Hall', '1e8e941a946a801d5092408a81432724b57ae8b0b.jpg', '2021-02-11 14:44:08', '2021-02-11 14:48:42'),
(159, 37, 'Bathroom', '18bcb685b0ed77f96c76d9666092144783ece3858.jpg', '2021-02-11 14:45:47', '2021-02-11 14:48:47'),
(160, 37, 'Kitchen', '1bdc958e308b24190400f5000b28dde397c5349c8.jpg', '2021-02-11 14:47:05', '2021-02-11 14:48:51'),
(161, 37, 'Outside', '109a8b271178efebca8729f48b026b0b771f6b79f.jpg', '2021-02-11 14:47:37', '2021-02-11 14:48:53'),
(162, 37, 'Bedroom', '1d0ba77f17837487b3c91c9a95d82f85da5aa2727.jpg', '2021-02-11 14:48:15', '2021-02-11 14:49:01'),
(163, 26, 'Outside', '1bed7a886c31c8c3974d5ec13f499f9647082c060.jpg', '2021-02-11 17:20:45', '2021-02-11 17:20:51'),
(164, 26, 'Hall', '1e00734a81d46a7cd7ed77f316818702ace3ebe8f.jpg', '2021-02-11 17:20:45', '2021-02-11 17:20:52'),
(165, 26, 'Hall', '136c66876ffd7481bfb9c1fcba885e932eb7710a3.jpg', '2021-02-11 17:20:45', '2021-02-11 17:20:54'),
(166, 26, 'Bathroom', '1fc1f99966ba441e9b087840b5dd5282c701d7d12.jpg', '2021-02-11 17:20:45', '2021-02-11 17:21:01'),
(167, 26, 'Bedroom', '17e36e69d52e19d8730a7a4b913d7b9511b317b23.jpg', '2021-02-11 17:20:45', '2021-02-11 17:21:06'),
(168, 26, 'Swimming Pool', '1f9ff8c792305ffb9dbeefc900d07238dcfbf7766.jpg', '2021-02-11 17:20:45', '2021-02-11 17:21:17'),
(174, 38, 'Outside', '120bca218d73157c12bac4792cdc2e76447c25234.jpg', '2021-02-11 18:41:06', '2021-02-11 18:41:54'),
(176, 38, 'Bedroom', '1186f78dda25cac58f024c68bf3abbd1fd373d93d.jpg', '2021-02-11 18:41:32', '2021-02-11 18:43:21'),
(177, 38, 'Kitchen', '13f7c0540ab01d1078e35a5188e4f32c37238a07c.jpg', '2021-02-11 18:41:32', '2021-02-11 18:43:22'),
(178, 38, 'Gym', '1323ac02dbd90ac903bef7e2f0da77954db0ff413.jpg', '2021-02-11 18:41:51', '2021-02-11 18:43:32'),
(179, 38, 'Bathroom', '1772391081d2449b6fd51fc44e625bab58bd99d9d.jpg', '2021-02-11 18:41:51', '2021-02-11 18:43:40'),
(180, 39, 'Outside', '1ec8396fe5932d0f39714d6f38358021c50ffe913.jpg', '2021-02-11 19:00:12', '2021-02-11 19:01:01'),
(181, 39, 'Bedroom', '1f468513cb4234501605169559922a32782bbfde5.jpg', '2021-02-11 19:00:58', '2021-02-11 19:01:06'),
(182, 39, 'Corridor', '1664051d5aed99368a33519ebcdc75fa3e352f815.jpg', '2021-02-11 19:00:58', '2021-02-11 19:01:17'),
(183, 39, 'Wardrobe', '1f30d6f6c95c7eca8c6e93ce65955db36cf049107.jpg', '2021-02-11 19:00:58', '2021-02-11 19:01:22'),
(184, 39, 'Bathroom', '1f621d4ab3bc2887ec64651dbf50068cb86a96ca4.jpg', '2021-02-11 19:00:58', '2021-02-11 19:01:37'),
(185, 40, 'Outside', '13e9d45a3362db3dac9b95a0373f1637f7e81db6f.jpg', '2021-02-11 19:17:26', '2021-02-11 19:22:27'),
(186, 40, 'Bedroom', '11fbaadbe0c5e54a2c3f6dd4145126d0b2a94e845.jpg', '2021-02-11 19:17:26', '2021-02-11 19:22:33'),
(187, 40, 'Bathroom', '1be62718c5532361eb2fd453dfdff99463d4bcda1.jpg', '2021-02-11 19:18:25', '2021-02-11 19:22:38'),
(189, 40, 'Kitchen', '108446fccfe1e11222528fadbb482b747258e4c76.jpg', '2021-02-11 19:19:49', '2021-02-11 19:23:22'),
(190, 40, 'Toilet', '1104199101ac79a53a6ec764738d2106e5a028002.jpg', '2021-02-11 19:21:23', '2021-02-11 19:22:42'),
(191, 42, NULL, '1e82c5ec88b9206f554a5b7df5984375c763100e1.jpg', '2021-02-11 19:41:06', '2021-02-11 19:41:06'),
(195, 43, 'Outside', '1dad776d13c58608546a8bbc11330e52afbf14345.jpg', '2021-02-12 12:14:22', '2021-02-12 12:16:28'),
(196, 43, 'Shared Hall', '1efd49807ef2de89748260e2c09c1985f18641dfc.jpg', '2021-02-12 12:16:26', '2021-02-12 12:18:24'),
(197, 43, 'Bedroom', '1241f1c1b964790615c049408be2dc99f3645b5d3.jpg', '2021-02-12 12:18:51', '2021-02-12 12:19:52'),
(198, 43, 'Bathroom', '11c2ede5979d0affae9aad4805085d4379e3ce263.jpg', '2021-02-12 12:19:35', '2021-02-12 12:20:10'),
(199, 43, 'Kitchen', '106a1baa464fa076d005c76d71cd0f220df4dc48f.jpg', '2021-02-12 12:20:40', '2021-02-12 12:20:50'),
(200, 44, 'Bathroom', '1ea765fb466468302b4c1d363fe6b6ba373b47de7.jpg', '2021-02-12 12:30:22', '2021-02-12 12:31:36'),
(201, 44, 'Outside', '1fd96cc4a6fc2f45564ff8851ab6eccb338e14c99.jpg', '2021-02-12 12:30:31', '2021-02-12 12:31:30'),
(202, 44, 'Gym', '1ca9f66d8104159d850038eae2ef974d3cca3abe1.jpg', '2021-02-12 12:30:42', '2021-02-12 12:31:23'),
(203, 44, 'Bedroom', '185f766ba13307ed39f5631d090590ecd850e5f29.jpg', '2021-02-12 12:30:58', '2021-02-12 12:31:30'),
(204, 44, 'Kitchen', '13ca3d13456bf82afbccb4625c6d720a9585839b1.jpg', '2021-02-12 12:31:16', '2021-02-12 12:31:40'),
(205, 44, 'Swimming pool', '16541fa38a4cbf68015835b6cf2c0ec5afa38193c.jpg', '2021-02-12 12:33:09', '2021-02-12 12:33:22'),
(206, 46, 'Outside', '166a6a7cc3a80ef782a786349bdb1b5e23b177343.jpg', '2021-02-12 12:56:10', '2021-02-12 12:57:29'),
(207, 46, 'Hall', '16f49c18ee1df04fbe0275dee7ca4dc56c7462a9f.jpg', '2021-02-12 12:56:10', '2021-02-12 12:57:33'),
(208, 46, 'Bedroom', '1efc3b5a8be0bf865389461f3048c0aa229782c2d.jpg', '2021-02-12 12:56:10', '2021-02-12 12:57:45'),
(209, 46, 'Washroom', '13bd3efc8b22050a11438b01407d76daffdcd2c53.jpg', '2021-02-12 12:56:10', '2021-02-12 12:57:39'),
(210, 46, 'Gym', '1e69716a6930ebbb2a16153c535fcec3ae74aee3d.jpg', '2021-02-12 12:57:09', '2021-02-12 12:57:50'),
(211, 46, 'Outside', '1784c903f79cd5232a62ecc12b90c14bf83d35674.jpg', '2021-02-12 12:57:09', '2021-02-12 12:57:52'),
(212, 47, 'Inside', '16d330e27f62a0611508751f2be484bdb77bdbdb9.jpg', '2021-02-12 13:10:53', '2021-02-12 13:12:31'),
(213, 47, 'Wall', '15784151fe3da811ec3b0a7d1c5913cd3bdb7f4f6.jpg', '2021-02-12 13:10:53', '2021-02-12 13:12:35'),
(215, 47, 'Bedroom', '10d0a6107a754356749150e2f6db607f6d557881c.jpg', '2021-02-12 13:10:53', '2021-02-12 13:12:39'),
(216, 47, 'Bathroom', '175b7189c126925ce813b1ba1d528b1d622c47549.jpg', '2021-02-12 13:10:54', '2021-02-12 13:12:45'),
(217, 47, 'Outside', '18b7452c1cb49bc215f6af53af6030bffb865ed0e.jpg', '2021-02-12 13:11:18', '2021-02-12 13:12:49'),
(218, 48, 'Bedroom', '16d29a094c25089f4489c2bb0985d5eb73d40fdc7.jpg', '2021-02-12 13:18:04', '2021-02-12 13:19:21'),
(219, 48, 'Outside', '144e544f3d8658b24b60c420e74621875240a0a5c.jpg', '2021-02-12 13:18:04', '2021-02-12 13:19:05'),
(220, 48, 'Hall', '15bdb7fec4122bf4a8cb23be227421f75f0292d43.jpg', '2021-02-12 13:18:04', '2021-02-12 13:19:08'),
(221, 48, 'Hall', '1c60259051c70f31b7bfd3a0176ad7ec6c0519933.jpg', '2021-02-12 13:18:04', '2021-02-12 13:19:10'),
(222, 48, 'Kitchen', '1cedf7df98a4fdb2528f8cb89e932d9943b78722c.jpg', '2021-02-12 13:18:05', '2021-02-12 13:19:14'),
(223, 48, 'Swimming pool', '1e92b9c03efeb537f523af71111bb9ee226908ed4.jpg', '2021-02-12 13:19:49', '2021-02-12 13:19:59'),
(224, 49, 'Bathroom', '1c0bfd6be4619e55be591f556a7baac5c0040b88c.jpg', '2021-02-12 13:25:18', '2021-02-12 13:26:21'),
(225, 49, 'Outside', '152569e54ab6cd99de0e11c8e360a3abf533f4edb.jpg', '2021-02-12 13:25:19', '2021-02-12 13:26:22'),
(226, 49, 'Bedroom', '1d159f6783e4b31e484e95232ec8b37fdb754cf36.jpg', '2021-02-12 13:25:19', '2021-02-12 13:26:29'),
(227, 49, 'Kitchen', '1117c3d7dd6b2b260a6b31e2261e25cc84ac4ffa8.jpg', '2021-02-12 13:26:10', '2021-02-12 13:26:33'),
(228, 49, 'Wall', '1a876dbf112b6d5342575e56fbe0e3d8c33329f04.jpg', '2021-02-12 13:26:10', '2021-02-12 13:26:37'),
(229, 50, 'Inside', '1aeba192a5844a02cbdaffd0c5ed594275b1b1e5b.jpg', '2021-02-12 13:32:22', '2021-02-12 13:32:58'),
(230, 50, 'Wardrobe', '15c401f5493a2d9b664835a0e06a43a1d11745651.jpg', '2021-02-12 13:32:22', '2021-02-12 13:32:42'),
(231, 50, 'Inside', '13653769959a3f23ed4ffc91946e3bde8d38bb773.jpg', '2021-02-12 13:32:22', '2021-02-12 13:32:53'),
(232, 50, 'Outside', '125523c8c4177846d66faa2e30d432427bb0474cb.jpg', '2021-02-12 13:32:22', '2021-02-12 13:32:30'),
(233, 51, 'Outside', '1a528a7c8f4bb1032e1ecf21c77fe260fd7cf7dc6.jpg', '2021-02-12 13:37:20', '2021-02-12 13:37:57'),
(234, 51, 'Outside', '144f96494201e0e90111416b95ce7351c5e02bde0.jpg', '2021-02-12 13:37:50', '2021-02-12 13:37:58'),
(235, 51, 'Inside', '1444eaeec689174991599e40c0ae117ce016b08dd.jpg', '2021-02-12 13:37:50', '2021-02-12 13:38:08'),
(236, 51, 'Bathroom', '1068e39fd253684ecc4cd83e8df8c6dd7cd550711.jpg', '2021-02-12 13:37:50', '2021-02-12 13:38:13'),
(237, 51, 'Gym', '1edad4737290def09485b3f59d3dee90ab0551c51.jpg', '2021-02-12 13:38:51', '2021-02-12 13:38:58'),
(238, 52, NULL, '19691effe6da0f8960a2bc59dd885a0a09e1aeb62.jpg', '2021-02-12 13:45:23', '2021-02-12 13:45:23'),
(239, 52, NULL, '1ac4724b5fdba436b94fe04ca3948772a40e09942.jpg', '2021-02-12 13:45:23', '2021-02-12 13:45:23'),
(240, 52, 'Outside', '12a76760e0037be75e398f4ea8ecfe23ecc2c0db3.jpg', '2021-02-12 13:45:23', '2021-02-12 13:45:42'),
(241, 52, 'Hall', '180056f550f44e8cb6428bfc9a89f676a35ce2d2e.jpg', '2021-02-12 13:45:24', '2021-02-12 13:45:46'),
(242, 52, 'Outside', '19827b75c820dc984a6c275a0bac0a1d1f8ad619c.jpg', '2021-02-12 13:46:01', '2021-02-12 13:46:08'),
(243, 53, 'Bathroom', '1f6d2df8bf208c7906b9688d8aed8b32af998c05c.jpg', '2021-02-12 13:49:26', '2021-02-12 13:49:43'),
(244, 53, 'Outside', '12af2cac7582527f73990d6a70fa1178431fd0270.jpg', '2021-02-12 13:49:26', '2021-02-12 13:49:35'),
(245, 53, 'Bedroom', '1da4cd3eee50476395b8bac33e4b528455a01b958.jpg', '2021-02-12 13:49:26', '2021-02-12 13:49:37'),
(246, 53, 'Outside', '1f11e145296182160aa20441fef6fd4f688ccf7af.jpg', '2021-02-12 13:49:26', '2021-02-12 13:49:39'),
(247, 53, 'Kitchen', '12d5819aacd68307bdfe97c46ad61179a68b6a234.jpg', '2021-02-12 13:50:23', '2021-02-12 13:50:33'),
(248, 54, 'Outside', '1fba7d44f2811b899750f34b10684fc3f3a8a4ab1.jpg', '2021-02-12 13:55:21', '2021-02-12 13:55:29'),
(249, 54, 'Hall', '164c9c89b1097e37f736484dafd249ca0141e9839.jpg', '2021-02-12 13:55:21', '2021-02-12 13:55:32'),
(250, 54, 'Hall', '1956ec4fd2adb879f7b8ea82804c98fff7dc4df10.jpg', '2021-02-12 13:55:22', '2021-02-12 13:55:34'),
(251, 54, 'Outside', '11fabf17104e41d5cf4921b41f917460a7d6fac5c.jpg', '2021-02-12 13:55:22', '2021-02-12 13:55:35'),
(252, 54, 'Bathroom', '1ee9c8f22f4e0c2abd63fe838abeb371ea1e163ce.jpg', '2021-02-12 13:55:22', '2021-02-12 13:55:41'),
(253, 54, 'Hall', '11f91412ed2623510c984fbb41d36097c6edae83f.jpg', '2021-02-12 13:55:22', '2021-02-12 13:55:45'),
(254, 55, 'Bathroom', '1b3bf490d1a7514614f022e94e4a1e68c69b6a46d.jpg', '2021-02-12 14:00:57', '2021-02-12 14:01:14'),
(255, 55, 'Outside', '1231f606f5890ed916d65df88a7f26d24d1ba9b8d.jpg', '2021-02-12 14:00:58', '2021-02-12 14:01:16'),
(256, 55, 'Outside', '162a11d9fde885dca30bacc7389dfcb22aa0a13ef.jpg', '2021-02-12 14:00:58', '2021-02-12 14:01:18'),
(257, 55, 'Hall', '17feaafca1d2b8a3bf9f1c1388aeb6e95c25ac150.jpg', '2021-02-12 14:00:58', '2021-02-12 14:01:23'),
(258, 56, 'Outside', '1ac6ec6fb9bf2d541400819c46c285c0c5227312c.jpg', '2021-02-12 14:08:02', '2021-02-12 14:08:10'),
(259, 56, 'Outside', '14db270c4bcd132051b8e7cc0ded0af29b0463c57.jpg', '2021-02-12 14:08:02', '2021-02-12 14:08:13'),
(260, 56, 'Outside', '1ae80106e3d759c665a250a93d5f92ef8e6d33870.jpg', '2021-02-12 14:08:02', '2021-02-12 14:08:13'),
(261, 56, 'kitchen', '106466e60391ad292dc4b7470b5872323cf40a31c.jpg', '2021-02-12 14:08:02', '2021-02-12 14:08:20'),
(262, 56, 'Hall', '1bbfcae7d3218e3b8c0ff27470187c252eaa0befe.jpg', '2021-02-12 14:08:03', '2021-02-12 14:08:22'),
(263, 56, 'Outside', '1c631d6bdcc94bd705344df150c48d3e8442dfebc.jpg', '2021-02-12 14:08:03', '2021-02-12 14:08:24'),
(264, 56, 'Bathroom', '178ad9fdcd34cbb1e3f7c940c97bdf8dfa541f912.jpg', '2021-02-12 14:08:46', '2021-02-12 14:08:52'),
(265, 56, 'Outside', '181ba3440b1e9ebfd317a34105055c67bb0c2d9b8.jpg', '2021-02-12 14:09:48', '2021-02-12 14:09:57'),
(266, 57, 'Hall', '1240f48001c20dc27516027308eb9d67f84a45d41.jpg', '2021-02-12 14:55:09', '2021-02-12 14:56:21'),
(267, 57, 'Outside', '13af7089c1e913cc2e5029356f1cc5717c01d6a4a.jpg', '2021-02-12 14:56:16', '2021-02-12 14:56:23'),
(268, 57, 'Outside', '19bd20a81a27c7a0f3836dc87a95743bf2d248f79.jpg', '2021-02-12 14:56:17', '2021-02-12 14:56:24'),
(269, 57, 'Outside', '1cbeefb08dc7016aa2169baf1d8dd36a38b4eb5ff.jpg', '2021-02-12 14:56:17', '2021-02-12 14:56:32'),
(270, 57, 'Inside', '1fbdde465b066d40e68e004f412677b8ed11f85ad.jpg', '2021-02-12 14:56:41', '2021-02-12 14:56:50'),
(271, 57, 'Bathroom', '1aeed86fbec7fffa0157db3abd64473a0fc66c19e.jpg', '2021-02-12 14:56:41', '2021-02-12 14:56:52'),
(272, 58, 'Outside', '132b44fb10113d193607109f8b49c674236092ab1.jpg', '2021-02-12 15:02:35', '2021-02-12 15:02:53'),
(273, 58, 'Outside', '1cd17ef56db797718dcf53d6d91b4f4cffa8cbfeb.jpg', '2021-02-12 15:02:35', '2021-02-12 15:02:54'),
(274, 58, 'Kitchen', '11b17a42f1f1852d4699b4105f9581d1c3770573b.jpg', '2021-02-12 15:02:35', '2021-02-12 15:03:04'),
(275, 58, 'Bathroom', '17f890f971f49fd652a6c7af9587c4d6d5623334d.jpg', '2021-02-12 15:02:35', '2021-02-12 15:03:06'),
(276, 58, 'Bedroom', '1bf5581aad18c20cc883daacef3c2935dfc2c18a0.jpg', '2021-02-12 15:02:35', '2021-02-12 15:03:12'),
(277, 58, 'Outside', '1784cf31714cbb8484871f276d3c18ea11433b9b7.jpg', '2021-02-12 15:02:35', '2021-02-12 15:03:16'),
(278, 59, 'Bedroom', '11bbdeed46c4d1aa9ad59879fb923e3054ae667f7.jpg', '2021-02-12 15:18:32', '2021-02-12 15:19:01'),
(279, 59, 'Outside', '1da275091824f093d100916b3932513dfe4c14f74.jpg', '2021-02-12 15:18:32', '2021-02-12 15:19:02'),
(280, 59, 'Outside', '1d5d3b7e6f55778c97247ad816b8c29c4f30681f6.jpg', '2021-02-12 15:18:33', '2021-02-12 15:19:04'),
(281, 59, 'Dinning Room', '19358a79c876941e955df4f3d4c1a303b2e3d9e7e.jpg', '2021-02-12 15:18:33', '2021-02-12 15:19:29'),
(282, 59, 'Kitchen', '1d687151eadd4e3cafb074a33e289e7e4cce2d87e.jpg', '2021-02-12 15:18:33', '2021-02-12 15:19:35'),
(283, 60, 'Bedroom', '1bcf8e98aed1728cb9c1e825360081487f988147b.jpg', '2021-02-12 15:25:41', '2021-02-12 15:26:20'),
(284, 60, 'Kitchen', '176f9f472a0ace3cb9eb2ffae127f0ce4f6b11a9a.jpg', '2021-02-12 15:26:11', '2021-02-12 15:26:27'),
(285, 60, 'Hall', '16e782a9dda1c6d2b9efee487e5b63eed1dca22c0.jpg', '2021-02-12 15:26:11', '2021-02-12 15:26:27'),
(286, 60, 'Bedroom', '1ca8837ba0ef6c88459f50a1ba8576ab46f53be75.jpg', '2021-02-12 15:26:11', '2021-02-12 15:26:33'),
(287, 60, 'Bedroom', '1cd218977d46a785ce189134f8ac3639057f45804.jpg', '2021-02-12 15:26:11', '2021-02-12 15:26:47'),
(289, 61, 'Outside', '1c434271a57f4dd8bf07a95f7b73e811e3ffdaa3f.jpg', '2021-02-12 15:45:22', '2021-02-12 15:47:54'),
(292, 61, 'Outside', '1084e1a4397558e716d66428adbd36ea1e7d1bb34.jpg', '2021-02-12 15:46:00', '2021-02-12 15:47:55'),
(293, 61, 'Hall', '120586a431abb4432c88276be5c51a8af1015be45.jpg', '2021-02-12 15:46:23', '2021-02-12 15:47:56'),
(294, 61, 'Kitchen', '1e65e3c4788311d70ce32bf55889f8a545fb080af.jpg', '2021-02-12 15:47:01', '2021-02-12 15:48:03'),
(296, 61, 'Bathroom', '1efb4f0d9c7ffcf63974b32a14a11693db8e3a767.jpg', '2021-02-12 15:47:17', '2021-02-12 15:48:07'),
(297, 61, 'Bedroom', '173a4f259c97c22e604dd8e8580c11d3637435ec7.jpg', '2021-02-12 15:47:17', '2021-02-12 15:48:25'),
(298, 62, 'Outside', '1c9607686b6766843e9680de5a95952f5db9d2430.jpg', '2021-02-12 15:57:58', '2021-02-12 15:58:47'),
(299, 62, 'Outside', '136611d4d3c0c80abe47deb566d0003bdc0bf2523.jpg', '2021-02-12 15:57:58', '2021-02-12 15:58:49'),
(300, 62, 'Hall', '189aff7f740db8a793dc4636ab5721f5b5298d4c4.jpg', '2021-02-12 15:58:25', '2021-02-12 15:58:52'),
(301, 62, 'Hall', '14527f52e6a93eec500b5a4f69f08685dbd77d5fb.jpg', '2021-02-12 15:58:25', '2021-02-12 15:58:54'),
(302, 62, 'Bedroom', '15c9502688bd80b3f0cb90df407b7701f39041067.jpg', '2021-02-12 15:58:39', '2021-02-12 15:59:07'),
(303, 62, 'Bathroom', '15121a07d785655f4db591265894e32063c036680.jpg', '2021-02-12 15:58:39', '2021-02-12 15:58:58'),
(305, 63, 'Outside', '1d7abeb877e0e6cba0b7249314688b472e94edec1.jpg', '2021-02-12 16:16:56', '2021-02-12 16:17:43'),
(306, 63, 'Outside', '1e50d61ce8ee6153a8be6f9e8885889198387abeb.jpg', '2021-02-12 16:16:56', '2021-02-12 16:17:45'),
(307, 63, 'Bathroom', '1fac12470199384cab5b615a79e6e77f1dc020d1d.jpg', '2021-02-12 16:17:38', '2021-02-12 16:17:47'),
(308, 63, 'Bedroom', '1a0682351bbf5cf256f549ec779349727f041454c.jpg', '2021-02-12 16:17:38', '2021-02-12 16:17:53'),
(309, 63, 'Kitchen', '1e125b072ff094a4a6b577444d3823227462d54c6.jpg', '2021-02-12 16:17:38', '2021-02-12 16:18:02'),
(310, 64, 'Outside', '1b029843b6d4b13e6f5a355393dc3d72527f26739.jpg', '2021-02-12 17:43:31', '2021-02-12 17:44:02'),
(311, 64, 'Hall', '15e7aa9977dce920bcabd3bc9386268ad71f5f6b6.jpg', '2021-02-12 17:43:31', '2021-02-12 17:44:03'),
(312, 64, 'Hall', '10d49ccd226f432f43adb1499d98186076f80847c.jpg', '2021-02-12 17:43:31', '2021-02-12 17:44:06'),
(313, 64, 'Bathroom', '19cbd5391578f491815fd798bdf8c55d947d16a68.jpg', '2021-02-12 17:43:37', '2021-02-12 17:44:08'),
(314, 64, 'Bedroom', '1c01b02c13089d63f1574e4d9edc20fc7d496f8f4.jpg', '2021-02-12 17:43:59', '2021-02-12 17:44:15'),
(315, 65, 'Outside', '14a1d15c19501b6b25aa652a8602700d98a3309c5.jpg', '2021-02-12 17:48:09', '2021-02-12 17:48:18'),
(316, 65, 'Outside', '1ab201aa145d46eda0fd3e4057e5476aae80595c5.jpg', '2021-02-12 17:48:10', '2021-02-12 17:48:19'),
(317, 65, 'Bedroom', '114f1db5f70c7cda2ba1b9a9f3e1aac220b20d102.jpg', '2021-02-12 17:48:10', '2021-02-12 17:49:28'),
(318, 65, 'Kitchen', '1eec96fd43233125896d33341db947712e6d7056b.jpg', '2021-02-12 17:48:10', '2021-02-12 17:49:33'),
(319, 65, 'Bathroom', '1406b1f5975e84e72c4559bdd138a6b9903ce924a.jpg', '2021-02-12 17:48:10', '2021-02-12 17:49:38'),
(320, 66, 'Outside', '1729007f16d0cbae2350df780b517358f8da9cf3f.jpg', '2021-02-12 17:52:58', '2021-02-12 17:53:04'),
(321, 66, 'Bedroom', '1a5228d81573d55732d487a93a39f2c74b6fcea6a.jpg', '2021-02-12 17:52:58', '2021-02-12 17:53:32'),
(322, 66, 'Outside', '176bf73a51558738b9627e82fda56d06e305b300d.jpg', '2021-02-12 17:52:58', '2021-02-12 17:53:26'),
(323, 66, 'Inside', '12e4fdc71ac43816e934c54a2b2d80e95c8a5362e.jpg', '2021-02-12 17:52:58', '2021-02-12 17:53:25'),
(324, 66, 'Bathroom', '1797155a3e43181c90bdb2fece4857fa9fbee72d5.jpg', '2021-02-12 17:52:58', '2021-02-12 17:53:07'),
(325, 67, 'Inside', '124621026b2b0c835818e24e084abdf9f5f5547b6.jpg', '2021-02-12 17:59:09', '2021-02-12 17:59:18'),
(326, 67, 'Outside', '1034eea7afd21998381ad3e1f2c94cb1de9b48b09.jpg', '2021-02-12 17:59:09', '2021-02-12 17:59:20'),
(327, 67, 'Bathroom', '113cd502d19868d846ba5c24f7e0458c4a954878c.jpg', '2021-02-12 17:59:09', '2021-02-12 17:59:22'),
(328, 67, 'Outside', '11f4f6090595519e7c4f4c8258764e8c2f24c7f92.jpg', '2021-02-12 17:59:09', '2021-02-12 17:59:24'),
(329, 67, 'Wardrobe', '1be2c7f0a61fa25c3b7543b329dec7568bcf30e50.jpg', '2021-02-12 17:59:10', '2021-02-12 17:59:47'),
(330, 68, 'Swimming', '1c26af13eb7fbb4968d66fbe83186eb75b7eea0a2.jpg', '2021-02-12 18:11:10', '2021-02-12 18:15:27'),
(333, 68, 'Outside', '1d93979a1ba4bc2bf5c97984faf0fdfdb521d9ccd.jpg', '2021-02-12 18:11:12', '2021-02-12 18:14:37'),
(334, 68, NULL, '1154f445ccb944c97e24e10631d023660e7820ead.jpg', '2021-02-12 18:11:43', '2021-02-12 18:11:43'),
(335, 68, 'Bathroom', '1df4a5e986d5b27f6a74719e8511d1cd040b15709.jpg', '2021-02-12 18:14:32', '2021-02-12 18:14:43'),
(336, 68, 'Hall', '199553ba591dcf077ee64dc8b2aad18b5cb19533f.jpg', '2021-02-12 18:14:32', '2021-02-12 18:14:50'),
(337, 69, 'Outside', '15bf8b8be5903e334c167b87f8c7bdfecf8c093b2.jpg', '2021-02-12 18:31:18', '2021-02-12 18:31:23'),
(338, 69, 'Hall', '15b832145b413c45eef8b9292c35f33e84d75a8e7.jpg', '2021-02-12 18:31:18', '2021-02-12 18:31:25'),
(339, 69, 'Hall', '1d44d6e0a094a70e5c630ac64e610b93c9852323b.jpg', '2021-02-12 18:31:19', '2021-02-12 18:31:27'),
(340, 69, 'Bathroom', '1210ebe7621c802e38819f9c4075a63b9072b865d.jpg', '2021-02-12 18:31:19', '2021-02-12 18:31:29'),
(341, 69, 'Kitchen', '173edda4ba9ca25f959c84c76b7aaa8e61a90325a.jpg', '2021-02-12 18:31:19', '2021-02-12 18:31:38'),
(343, 70, 'Outside', '16dba9e2f341c3000d250403e5a6d3208e1f988c8.jpg', '2021-02-12 18:47:22', '2021-02-12 18:47:30'),
(344, 70, 'Hall', '13c23306daef3c0d1ea38930c2e87317cd182a2f1.jpg', '2021-02-12 18:47:22', '2021-02-12 18:47:33'),
(345, 70, 'Bathroom', '1e3db3f949d7df6e1ae3ecd1e6704bda1c284891e.jpg', '2021-02-12 18:47:23', '2021-02-12 18:47:35'),
(346, 70, 'Bedroom', '117f211491a8bfe48c7022b30fa4b87fcf65b0f0f.jpg', '2021-02-12 18:47:23', '2021-02-12 18:47:45'),
(347, 71, 'Outside', '17e724071782b48eb4492de8c1756d8db53597ad2.jpg', '2021-02-12 18:55:17', '2021-02-12 19:08:31'),
(348, 71, 'Hall', '1ae9b1d70f57afd5e3166deff04fe5e62a68d5465.jpg', '2021-02-12 18:55:18', '2021-02-12 19:08:33'),
(349, 71, 'Bathroom', '11074af62d9d21cc917040e6c54384b226ca7e00b.jpg', '2021-02-12 18:55:18', '2021-02-12 19:08:41'),
(351, 71, NULL, '12ba6f467a41314d354a7436c0775989f5af5ab7c.jpg', '2021-02-12 18:55:18', '2021-02-12 18:55:18'),
(354, 70, NULL, '19ca47a96c9172c01cd7cf77dab2c498de14f74dd.jpg', '2021-02-12 18:58:43', '2021-02-12 18:58:43'),
(358, 71, NULL, '13b12fd8f23434c6943ab699c71c4d9da6948fb78.jpg', '2021-02-12 19:08:29', '2021-02-12 19:08:29'),
(370, 72, 'Outside', '1feed30ab6a2b8e33b85445099a8ea6aebbf1fb8f.jpg', '2021-02-12 19:17:55', '2021-02-12 19:18:16'),
(371, 72, 'Outside', '1dcc3ec5ee560bf894e73120bca525a92542b98be.jpg', '2021-02-12 19:18:08', '2021-02-12 19:18:18'),
(372, 72, 'Hall', '1ea9bb360659ed0897fa09d5eaea367cb7f8ef5e0.jpg', '2021-02-12 19:18:08', '2021-02-12 19:18:26'),
(373, 72, 'Hall', '1d379156d451b70ba0c5ea388fda88135c62255cb.jpg', '2021-02-12 19:18:09', '2021-02-12 19:18:28'),
(374, 72, 'Inside', '15edd9fcbb016346340d5e25b8ac267592269ac5c.jpg', '2021-02-12 19:18:09', '2021-02-12 19:18:34'),
(375, 73, 'Outside', '15ce76e95babdfd566ea54b7c326f7695e7e47b3a.jpg', '2021-02-12 19:29:57', '2021-02-12 19:30:55'),
(376, 73, 'Hall', '138800131082de6c18fcd05b7230762c56c4ceaff.jpg', '2021-02-12 19:30:24', '2021-02-12 19:30:57'),
(377, 73, 'Hall', '1db83a72d39adcf525404247c216ffec8ee8f05c0.jpg', '2021-02-12 19:30:45', '2021-02-12 19:30:59'),
(378, 73, 'Bathroom', '1c7d772aa60ff59281ac0b2b8f4dd082510348246.jpg', '2021-02-12 19:30:46', '2021-02-12 19:31:04'),
(379, 73, 'Gym', '116f06d5bb36318cd78524a155f207375aec2c747.jpg', '2021-02-12 19:30:46', '2021-02-12 19:31:01'),
(380, 77, 'Bedroom', '1ea39173f1e771940eac293cf99f7ef1c7812f29d.jpg', '2021-02-15 14:59:26', '2021-02-15 15:01:11'),
(382, 77, 'Outside', '1ace1fad2c3d8218aedf6149887f4036a04b6f61d.jpg', '2021-02-15 14:59:27', '2021-02-15 15:01:17'),
(384, 77, 'Bedroom', '17706435852d68b6eebb329a117344d97c085d4de.jpg', '2021-02-15 14:59:27', '2021-02-15 15:01:25'),
(385, 77, 'Bathroom', '1647e16cc27ea6d589723dbeb85e84163ceebb598.jpg', '2021-02-15 15:00:33', '2021-02-15 15:01:34'),
(386, 77, 'Kitchen', '1d6a3af053cf78e85869879f15ab2266349b9fe4f.jpg', '2021-02-15 15:01:01', '2021-02-15 15:01:41'),
(387, 78, 'Outside With pool', '16457512f1118b2aebb9a84c9aa6d28e969db5422.jpg', '2021-02-15 15:51:54', '2021-02-15 15:52:21'),
(388, 78, 'Outside', '1c665951ac7599485c8f31d7d64e394b3bace9367.jpg', '2021-02-15 15:51:54', '2021-02-15 15:52:25'),
(389, 78, 'Bathroom', '1c4cd9117c838b583bf921db300b3642a26c1f239.jpg', '2021-02-15 15:51:54', '2021-02-15 15:53:01'),
(392, 78, 'Bedroom', '1bc9ec40135f687108f5bac00dd501afe8d6b6209.jpg', '2021-02-15 15:53:28', '2021-02-15 15:53:38'),
(393, 78, 'Bedroom', '12561f07ac9d86b161f917fd940170f291bc233fb.jpg', '2021-02-15 15:53:28', '2021-02-15 15:53:47'),
(396, 79, 'Outside', '1e93a055e09bd89a546999382b77f1795ffc32a89.jpg', '2021-02-15 16:15:45', '2021-02-15 16:17:57'),
(397, 79, 'Outside', '16f905ea937ce08cbc900f7d972e4642b44cc23e6.jpg', '2021-02-15 16:15:46', '2021-02-15 16:18:02'),
(398, 79, 'Bedroom', '13bc80dd704a15dad94ce4acc87f7be1523434491.jpg', '2021-02-15 16:21:32', '2021-02-15 16:21:50'),
(399, 79, 'Bathroom', '14c2b99e1b4d3828ecd2b9aded43b716023ce32b3.jpg', '2021-02-15 16:21:32', '2021-02-15 16:22:15'),
(400, 79, 'Bedroom', '1d84cfe6ce1c5149ee3dab72ae33d8932283612da.jpg', '2021-02-15 16:21:32', '2021-02-15 16:22:22'),
(401, 79, 'Bedroom', '1f5970e2838a72dddcfa1927c7edaba53012e4287.jpg', '2021-02-15 16:21:32', '2021-02-15 16:22:36'),
(404, 80, 'Outside', '179f876fffb5bce2ad1f0187a3fd0e2ebd2391136.jpg', '2021-02-15 17:11:33', '2021-02-15 17:13:49'),
(406, 80, NULL, '1a9961baecde62c311cda51e874d158b9819a9345.jpg', '2021-02-15 17:12:28', '2021-02-15 17:12:28'),
(407, 80, 'Hall', '13c02a901c132ec040625f228ea277c2abe76ee35.jpg', '2021-02-15 17:12:56', '2021-02-15 17:13:59'),
(408, 80, 'Kitchen', '1c7d5ce1b19c55e6f3e9dc96d5e0556c636d5b0e2.jpg', '2021-02-15 17:12:56', '2021-02-15 17:14:07'),
(409, 80, 'Bathroom', '152b8b98231c44dd05889a5e73b1e6f70dd04e365.jpg', '2021-02-15 17:13:41', '2021-02-15 17:14:43'),
(410, 81, 'Outside', '11993712dc9d7fb026313ee53d497ea321e09d718.jpg', '2021-02-15 17:30:36', '2021-02-15 17:35:30'),
(411, 81, 'Outside', '1f4dae19f1023c98355b2d55aa4afc52bbea16150.jpg', '2021-02-15 17:30:36', '2021-02-15 17:35:33'),
(412, 81, 'Bedroom', '1117024275fcca00b574e35d0b26eb238eac517c4.jpg', '2021-02-15 17:34:26', '2021-02-15 17:35:40'),
(413, 81, 'Bedroom', '1096bc44ed9c9b2475a74c1b0221c87dae1666fd4.jpg', '2021-02-15 17:34:27', '2021-02-15 17:35:48'),
(414, 81, 'Kitchen', '161da96d535fd11f8c44231c6511c34b1bd45d3a7.jpg', '2021-02-15 17:34:27', '2021-02-15 17:36:02'),
(415, 81, 'Hall', '1f2660823135ef88ab09fff18befc0bc18a3b8a5d.jpg', '2021-02-15 17:36:24', '2021-02-15 17:36:31'),
(416, 82, 'Outside', '172031766b6e9953aabe2bbd5f86611aa34b67bef.jpg', '2021-02-15 18:19:17', '2021-02-15 18:24:50'),
(417, 82, 'Bedroom', '1b89ab658ef95a0a789bb9757567cab4a431679f3.jpg', '2021-02-15 18:21:19', '2021-02-15 18:24:58'),
(418, 82, 'Bedroom', '11f9f691ae79fe4643905452d9d80445d1b8d1b87.jpg', '2021-02-15 18:21:36', '2021-02-15 18:25:03'),
(419, 82, 'Bedroom', '1886fcfe20a1a8ef95d90fb6701fafaab3b1cfa0c.jpg', '2021-02-15 18:22:10', '2021-02-15 18:25:11'),
(420, 82, 'Bathroom', '178d4d0eea0fde875d14676b76c5f425ba575c129.jpg', '2021-02-15 18:24:46', '2021-02-15 18:25:25'),
(421, 82, 'Gym', '1074af01f39bf961d22b2c1c5ace14d465cc4dc12.jpg', '2021-02-15 18:25:59', '2021-02-15 18:27:49'),
(422, 76, NULL, '1db8102c36e28c6b122903840769f53599404b475.jpg', '2021-02-16 09:38:33', '2021-02-16 09:38:33'),
(423, 76, NULL, '14856dbbfb208f9de88ce79ed0e35634ffef9d1f2.jpg', '2021-02-16 09:38:33', '2021-02-16 09:38:33'),
(424, 76, NULL, '16b2c9998802f171cafbda0efdd7df28bbe3a7028.jpg', '2021-02-16 09:40:44', '2021-02-16 09:40:44'),
(425, 76, NULL, '1a583e39475ef9afecb61e599affc0127274d48ca.jpg', '2021-02-16 09:40:44', '2021-02-16 09:40:44'),
(426, 76, NULL, '1e98a9515382f41464a99b709a5e0fff8e12182e3.jpg', '2021-02-16 09:40:44', '2021-02-16 09:40:44'),
(427, 75, 'Outside', '1abccd264d061d1b52c60eddb7d693a1ea209e17e.jpg', '2021-02-16 09:50:13', '2021-02-16 09:50:57'),
(428, 75, 'Outside', '113266168e35a571ad40f9f0e83141387f19add6d.jpg', '2021-02-16 09:50:13', '2021-02-16 09:51:01'),
(429, 75, 'Hall', '1795b7a49370502d64cd53fc7db87469370557592.jpg', '2021-02-16 09:50:35', '2021-02-16 09:51:04'),
(430, 75, 'Bathroom', '1c3e0b0e0ddea404171698241bc8dc0cbeb59c985.jpg', '2021-02-16 09:50:51', '2021-02-16 09:51:13'),
(431, 75, 'Kitchen', '173a82dc27fdb4f301676620b1c5b7a25aee428d2.jpg', '2021-02-16 09:50:51', '2021-02-16 09:51:19'),
(433, 45, 'Outside', '1cab6a94a075a1295cdbd697a77e9c866569e379d.jpg', '2021-02-16 13:15:25', '2021-02-16 13:37:10'),
(434, 45, 'Outside with parking space', '1d329586f8ed0696e6291a30889d9cf4ad19c05a9.jpg', '2021-02-16 13:15:26', '2021-02-16 13:37:28'),
(435, 45, 'Gym', '1cbac684bf30510df70a7a47b30b009ecbd99078e.jpg', '2021-02-16 13:15:26', '2021-02-16 13:36:51'),
(436, 45, 'Bedroom', '199741a2aeb1f334c5d409764b43ef46da652d565.jpg', '2021-02-16 13:15:26', '2021-02-16 13:36:45'),
(437, 45, 'Bedroom', '153a6707bcfb5725d3d789cc940c62081e134af1a.jpg', '2021-02-16 13:15:26', '2021-02-16 13:36:41'),
(438, 45, 'Kitchen', '1ff12b8e47199d6b8b765f9f4f128f0fd19e0d676.jpg', '2021-02-16 13:15:26', '2021-02-16 13:36:36'),
(439, 45, NULL, '14d9bb1fe7b418de087bcd67b7def4e414c2c5f97.jpg', '2021-02-16 13:33:09', '2021-02-16 13:33:09'),
(440, 74, 'Hall', '1bbc8c6769dee1c31294510e3aa600b6a1036c70f.jpg', '2021-02-16 16:11:35', '2021-03-09 15:34:15'),
(442, 83, 'Outside', '16a892af3799454193d351c4409b44d6f7f82fa52.jpg', '2021-02-16 18:03:34', '2021-02-16 18:04:13'),
(443, 83, 'Hall', '16826cd835922271778c50fe0ed6752f308835f71.jpg', '2021-02-16 18:03:34', '2021-02-16 18:04:20'),
(444, 83, 'Kitchen', '1920ad3ecbb29f47c97d1c8a9a17c7a40ab630a41.jpg', '2021-02-16 18:03:34', '2021-02-16 18:04:26'),
(445, 83, 'Bedroom', '121602854861f999429d08b93c039e4eaffc39f83.jpg', '2021-02-16 18:03:34', '2021-02-16 18:04:32'),
(446, 83, 'Bathroom', '1909658238691619f65692db7c0a083b4334f0737.jpg', '2021-02-16 18:04:03', '2021-02-16 18:04:37'),
(447, 86, NULL, '87f5d9f7a18ec663139e0faafb6ddcc6d470f2104.jpg', '2021-03-01 04:14:27', '2021-03-01 04:14:27'),
(448, 86, NULL, '8373a78d195e619507d142f7c82287cdc37c7f35c.jpg', '2021-03-01 04:15:51', '2021-03-01 04:15:51'),
(449, 86, NULL, '8b563d33f8ebca57f4e57ab7c4a39ff1d3d70f5fa.jpg', '2021-03-01 04:15:51', '2021-03-01 04:15:51'),
(450, 86, NULL, '876333c7378d669a0584e77877ea494f77288f230.jpg', '2021-03-01 04:15:51', '2021-03-01 04:15:51'),
(451, 86, NULL, '82f53b52162f6a4c25120d8fee7c57c70c6c232fe.jpg', '2021-03-01 04:24:10', '2021-03-01 04:24:10'),
(452, 87, NULL, '8023f30f8589ab72eaa722a133b4d7ca5420fda97.jpg', '2021-03-01 04:52:21', '2021-03-01 04:52:21'),
(453, 87, NULL, '8e85539d1b7813507c20103dea7d027d3f7b1eab2.jpg', '2021-03-01 04:53:56', '2021-03-01 04:53:56'),
(454, 87, NULL, '817f9155c896d4308a0d2c923f46b17c24b2a8db4.jpg', '2021-03-01 04:53:56', '2021-03-01 04:53:56'),
(456, 87, NULL, '8406d2a52cc976f63ba19dd3d71a8640948d3e756.jpg', '2021-03-01 04:53:56', '2021-03-01 04:53:56'),
(457, 87, NULL, '86aaa4463fbfedb41253c7da66652dde0192d0e91.jpg', '2021-03-01 04:53:56', '2021-03-01 04:53:56'),
(458, 88, 'Outside', '15fa66199002d87142bf13f637c8b444cd0b7fbead.jpg', '2021-03-03 14:55:41', '2021-03-03 14:55:53'),
(459, 88, 'Hall', '15da146ffa093b13728fff7b32818d9f0b825f9bff.jpg', '2021-03-03 14:55:42', '2021-03-03 14:56:10'),
(460, 88, 'Bedroom', '155f08f76bd99d21e6bfb122b7bf455c41a405fcfa.jpg', '2021-03-03 14:55:42', '2021-03-03 14:56:17'),
(462, 88, 'Kitchen', '1593147032679826e51d83622123d4aa4683356e84.jpg', '2021-03-03 14:55:42', '2021-03-03 14:56:25'),
(463, 88, 'Bathroom', '15b4cb372bbfac140a1ad845ca58ec96926cc62cc8.jpg', '2021-03-03 14:56:39', '2021-03-03 14:56:49'),
(464, 89, 'Outside', '15507c4e61c8b33b9b9e86504febfe8b8cb383a19c.jpg', '2021-03-03 15:16:28', '2021-03-03 15:18:06'),
(465, 89, 'BEdroom', '157b3f7cba1146870d1b3f168ae66285d593b46d84.jpg', '2021-03-03 15:17:30', '2021-03-03 15:18:13'),
(466, 89, 'Hall', '15a1e3b8e7570c725b8a916027fdd29eccc916a4b3.jpg', '2021-03-03 15:17:30', '2021-03-03 15:18:13'),
(467, 89, 'Bathroom', '15bec3cdb8e45c4fe501fe0aa736b22c8e04a91e8d.jpg', '2021-03-03 15:17:37', '2021-03-03 15:18:16'),
(468, 89, 'Bedroom', '15851e351fb2c9fec505a8699c090778b2326fe9fb.jpg', '2021-03-03 15:17:44', '2021-03-03 15:18:26'),
(469, 90, 'Outside', '1546a28afef03aa3e9a5496d59ce5fca97ba912827.jpg', '2021-03-03 15:27:08', '2021-03-03 15:28:11'),
(470, 90, 'Shared Large Hall', '15b09a77f93f3c4f8eb5dfa26a65a8d126d419a071.jpg', '2021-03-03 15:27:41', '2021-03-03 15:28:28'),
(471, 90, 'Kitchen', '15b9c30117ed9988ed219e40a47a32d1bb7a5c85ec.jpg', '2021-03-03 15:27:47', '2021-03-03 15:28:33'),
(472, 90, 'Bathroom', '157249c7f22d6bbe7bfda1ab4f3a39609f79bffb1a.jpg', '2021-03-03 15:27:47', '2021-03-03 15:28:39'),
(473, 90, 'Stairs', '155104d90b98a68448bf99193d088def5ab7b6ca0d.jpg', '2021-03-03 15:28:04', '2021-03-03 15:28:45'),
(474, 91, 'Outside', '15b0c5ecb44382e3eda65ee43b01823ccd8a755e2e.jpg', '2021-03-04 11:09:27', '2021-03-04 11:11:18'),
(476, 91, 'Bedroom', '158901f7e85e7cfbb6bb5cbfbeb6967a03ceec1ee8.jpg', '2021-03-04 11:10:30', '2021-03-04 11:11:24'),
(477, 91, 'Bathroom', '15ce8b0177b106e4e5a161a18cb65372ccfdfc32c1.jpg', '2021-03-04 11:10:40', '2021-03-04 11:11:32'),
(478, 91, 'Hall', '158d8af0d5908f3d5c4a835c2c66eaf043d9a6240b.jpg', '2021-03-04 11:10:56', '2021-03-04 11:11:38'),
(479, 91, 'Kitchen', '159182b803227fff2087a13ce18ae2a11117148b13.jpg', '2021-03-04 11:11:19', '2021-03-04 11:11:49'),
(480, 92, 'Outside', '15e6efb45d3e3460c7ca79f072a3310eb67f71902d.jpg', '2021-03-04 11:17:09', '2021-03-04 11:17:34'),
(481, 92, 'Kitchen', '15f4ecd4a15c6f73d9ac826362e3e2ddc1e51bad48.jpg', '2021-03-04 11:17:09', '2021-03-04 11:17:37'),
(482, 92, 'Hall', '158b0d4c5f6e14334d638770ea0e47faec49d99b98.jpg', '2021-03-04 11:17:09', '2021-03-04 11:18:00'),
(483, 92, 'Bedroom', '15dae93fd212ec32e3d12a13529cef672c52ec4ffe.jpg', '2021-03-04 11:17:10', '2021-03-04 11:17:53'),
(484, 92, 'Bathroom', '15d145f2f2540fe2feaa73ad416ef86352767ea4c4.jpg', '2021-03-04 11:17:32', '2021-03-04 11:18:01'),
(485, 93, 'Outside', '15dc8465f9891d37e6039679a51ed31d9e04321bd5.jpg', '2021-03-04 11:22:58', '2021-03-04 11:24:14'),
(487, 93, 'Bathroom', '15e9d8844bbf57f591e669f9226a607147925e5ad6.jpg', '2021-03-04 11:23:40', '2021-03-04 11:24:22'),
(488, 93, 'Kitchen', '15b3af958e10a2526654dc4753cf1998a5ad6e63cc.jpg', '2021-03-04 11:23:40', '2021-03-04 11:24:24'),
(489, 93, 'Bedroom', '156a0d3b4e72c59e360d76204549e39f1328e9c1f9.jpg', '2021-03-04 11:23:40', '2021-03-04 11:24:29'),
(490, 93, 'Hall', '152ebf05015fce5e6d90cc9f66ecf6512bee49704e.jpg', '2021-03-04 11:24:10', '2021-03-04 11:24:35'),
(496, 94, NULL, '1506c16dbc9a873c32bec62ec5677b99e855a94ed6.jpg', '2021-03-04 11:29:20', '2021-03-04 11:29:20'),
(497, 94, 'Balcony', '15b6655848f88d9833a1b0f7ab88cf239a7b3369dc.jpg', '2021-03-04 11:30:20', '2021-03-04 11:30:54'),
(498, 94, 'Bathroom', '15c8f685faa93bd91349842080fa4e9fa1af856548.jpg', '2021-03-04 11:30:29', '2021-03-04 11:31:02'),
(499, 94, 'Hall', '153cb01f6df8c0fceec35e44efeab78b0b7f7714d0.jpg', '2021-03-04 11:30:29', '2021-03-04 11:31:09'),
(500, 94, 'Bedroom', '15ba840f980754c6c7c7af9cf803ce1198695f78a9.jpg', '2021-03-04 11:30:35', '2021-03-04 11:31:11'),
(502, 95, 'Outside', '15a3be4be10afe3e7e29f2d0d686eeb79956e4884a.jpg', '2021-03-04 11:36:17', '2021-03-04 11:38:15'),
(503, 95, 'Bedroom', '150b92f1c6def6ca16c422b7e40f0212408bbfd472.jpg', '2021-03-04 11:37:04', '2021-03-04 11:38:22'),
(504, 95, 'Wardrobe', '151d2a585278fa4728aa427ca693cd8a5a001a4bbc.jpg', '2021-03-04 11:37:05', '2021-03-04 11:38:28'),
(505, 95, 'Bathroom', '15b2648affdab99890fae83f8fca273835dcefb5c2.jpg', '2021-03-04 11:37:59', '2021-03-04 11:38:36'),
(506, 95, 'Dinning Room', '155094418d7932c1fd8735b2fc57af650bf7ef49aa.jpg', '2021-03-04 11:38:00', '2021-03-04 11:38:45'),
(507, 95, 'Kitchen', '15df50e621e725add2b44ff89c2200b86850ba7673.jpg', '2021-03-04 11:38:00', '2021-03-04 11:38:50'),
(508, 96, 'Outside', '15f3ffa0c7f613e214341a9b05e39b817fb92c233b.jpg', '2021-03-04 11:45:18', '2021-03-04 11:47:06'),
(509, 96, 'Hall', '158f1e64d24566385f139cf70a3736a6451ba6d8ef.jpg', '2021-03-04 11:45:45', '2021-03-04 11:47:12'),
(510, 96, 'Kitchen', '155d8a8772dbbfc6c92dbcd8ab00d710a96d8c75d4.jpg', '2021-03-04 11:46:25', '2021-03-04 11:47:21'),
(511, 96, 'Bathroom', '15b1996748bb2d716a54883bd6610888adfb8f8644.jpg', '2021-03-04 11:46:25', '2021-03-04 11:47:33'),
(512, 96, NULL, '1542bbd12a45f41ce0d566a71ed3078f7d750900a9.jpg', '2021-03-04 11:46:58', '2021-03-04 11:46:58'),
(517, 97, 'Outside', '153d17edaa3030b7711c2a83ec39f0f46573cd274c.jpg', '2021-03-04 11:52:50', '2021-03-04 11:53:26'),
(518, 97, 'Bedroom', '1591bc5ceaaca27cbe9f43050ebcdcef61b779b6e5.jpg', '2021-03-04 11:53:14', '2021-03-04 11:53:28'),
(519, 97, 'Hall', '15800222d534cc85745c83b7753d8b8da3f8764f16.jpg', '2021-03-04 11:53:14', '2021-03-04 11:53:34'),
(520, 97, 'Kitchen', '155d0a146892365e1663c6ccea7838d2d10687b8b8.jpg', '2021-03-04 11:53:14', '2021-03-04 11:53:42'),
(521, 97, 'Bathroom', '1528de8f5f21ef576781462426459788ae153d8524.jpg', '2021-03-04 11:53:14', '2021-03-04 11:53:48'),
(522, 97, 'Outside With pool', '1562a03c9e34489fe79baceef89748641498e7d8e3.jpg', '2021-03-04 11:54:56', '2021-03-04 11:55:05'),
(523, 98, 'Outside With pool', '15766b0001d005b82f8ac4a61144cb76bcd086ec15.jpg', '2021-03-04 12:20:41', '2021-03-04 12:22:29'),
(524, 98, 'Corridor', '1595081b89f04f3bfb9404b86bd4168df435396c9d.jpg', '2021-03-04 12:22:12', '2021-03-04 12:22:36'),
(525, 98, 'Ironing Space', '15b8b7af4b1167fe075dd99b5fdfd7a401e7dadcc5.jpg', '2021-03-04 12:22:13', '2021-03-04 12:22:49'),
(526, 98, 'Bathroom', '1537115016fea9750b71f4b581cb3c4bd10f5b4332.jpg', '2021-03-04 12:22:13', '2021-03-04 12:22:59'),
(527, 98, 'Shared Kitchen', '15e878ff87403a83da51fb27208564a4c1d12a1e51.jpg', '2021-03-04 12:22:13', '2021-03-04 12:23:05'),
(528, 99, 'Outside', '151cefc94b257e6c2d0ea7e11d2c9349fff0fc6ab5.jpg', '2021-03-04 12:30:10', '2021-03-04 12:32:41'),
(529, 99, 'Bedroom', '150e04b055e4d6ca3e66ab208d1ec5002343a5a48b.jpg', '2021-03-04 12:32:20', '2021-03-04 12:32:45'),
(530, 99, 'Bedroom', '15b41b2db13389c6cdd6bba139a7ee9c5ca6c189a2.jpg', '2021-03-04 12:32:20', '2021-03-04 12:32:53'),
(531, 99, NULL, '1506421202f8d1b9af44d24e482dcf964c4ac492ef.jpg', '2021-03-04 12:33:27', '2021-03-04 12:33:27'),
(533, 99, NULL, '158cb4174be7581f54512591722da9a926b65759d3.jpg', '2021-03-04 12:34:47', '2021-03-04 12:34:47'),
(534, 100, 'Outside', '155da74f86a4be8b7e7dba2929340d75a48a4a3c0f.jpg', '2021-03-04 12:44:24', '2021-03-04 12:46:33'),
(535, 100, 'Bedroom', '158201d00225e50cfad412d2baadaa53ca7c3601f0.jpg', '2021-03-04 12:44:24', '2021-03-04 12:46:23'),
(538, 100, 'Bathroom', '156f189eed8a36860c2047428c8daad94757b756f6.jpg', '2021-03-04 12:45:40', '2021-03-04 12:46:30'),
(539, 100, 'Outside With pool', '1534b766cd4c884a5a7902c76fd6b7659c586f1596.jpg', '2021-03-04 12:46:15', '2021-03-04 12:46:30'),
(540, 101, 'Outside', '15516e63ef64fcba6adcf273d493d681d35b445460.jpg', '2021-03-04 12:58:12', '2021-03-04 13:00:54'),
(541, 101, 'Hall', '15aa982eda5ac0eca00fa1e19382a53aa97cb4b747.jpg', '2021-03-04 12:59:11', '2021-03-04 13:00:57'),
(542, 101, 'Kitchen', '15d94da6ab442229b5b19d72fca87081803ed4c5cf.jpg', '2021-03-04 12:59:12', '2021-03-04 13:01:02'),
(543, 101, 'Bedroom', '159d486da6f0050ff7e1820b060ce9e2d2f5d20740.jpg', '2021-03-04 13:00:21', '2021-03-04 13:01:10'),
(544, 101, 'Outside With pool', '15121d119efdf5f0200da3c2cdebee90d22334f93d.jpg', '2021-03-04 13:00:50', '2021-03-04 13:01:10'),
(545, 102, 'Outside', '15ddfe52f2acc37366f9dcc72a2beedea416f8f4fe.jpg', '2021-03-04 13:16:10', '2021-03-04 13:21:20'),
(546, 102, 'Outside street', '1597d1043a0f03d7b781a0af0e2d54a9a771a547eb.jpg', '2021-03-04 13:19:21', '2021-03-04 13:21:32'),
(547, 102, 'Bedroom', '1592de09e0e129b492ce85988a19eea5d70d6b944d.jpg', '2021-03-04 13:21:13', '2021-03-04 13:21:37'),
(548, 102, 'Kitchen', '15d68993b960afd42e4cc5a32cad4d9c7b0e461ae3.jpg', '2021-03-04 13:21:13', '2021-03-04 13:21:47'),
(549, 102, 'Wardrobe', '1558e0520af6913d7b20f514797cda5d68a8995f28.jpg', '2021-03-04 13:21:13', '2021-03-04 13:21:54'),
(550, 102, 'Bathroom', '15075c97691bea85a05150ef126f9db2ef954967f2.jpg', '2021-03-04 13:21:13', '2021-03-04 13:22:00'),
(551, 103, 'Outside', '1562793b60f2e0ed9b37bd608ef40ce6243ddb21cc.jpg', '2021-03-04 13:33:50', '2021-03-04 13:36:27'),
(552, 103, 'Outside With pool', '15b37d9223554c913849ef748555e3cafb746068da.jpg', '2021-03-04 13:34:42', '2021-03-04 13:36:30'),
(553, 103, 'Wall', '15c9d1bc80aada6a55f1f7d27226e9363a5a0a7ebf.jpg', '2021-03-04 13:34:56', '2021-03-04 13:36:45'),
(554, 103, 'Hall', '15db8443f61479be2061c02869c67fd9ee6ee9831c.jpg', '2021-03-04 13:35:33', '2021-03-04 13:36:49'),
(555, 103, 'Washroom', '1550fa65a50aefbdc07c6bb05dfd8f1a95405a7910.jpg', '2021-03-04 13:36:25', '2021-03-04 13:36:57'),
(556, 104, 'Outside', '157e2777e5a29a3ee2a948f25d302ad18fb2731dd6.jpg', '2021-03-04 14:08:27', '2021-03-04 14:08:36');
INSERT INTO `property_images` (`id`, `property_id`, `caption`, `image`, `created_at`, `updated_at`) VALUES
(557, 104, 'Kitchen', '15ffddca4649a8c2e25e7f5abde0cc63d632a52df5.jpg', '2021-03-04 14:09:54', '2021-03-04 14:11:56'),
(558, 104, 'Bedroom', '15a06dbe84982c8783c1726f66fd62acb901c43206.jpg', '2021-03-04 14:09:54', '2021-03-04 14:11:49'),
(559, 104, 'Stairs', '15544dc1d2edf4eeca74a7c90ebcc2f873fe8ac406.jpg', '2021-03-04 14:09:55', '2021-03-04 14:11:45'),
(560, 104, 'Gym', '15eae1583eb30cbb3ed43ef197f3a33206edc4a1d6.jpg', '2021-03-04 14:09:55', '2021-03-04 14:11:42'),
(561, 105, 'Outside', '156e970b8d89e27a5b1b37beb934c28857111139b9.jpg', '2021-03-04 15:11:46', '2021-03-04 15:16:30'),
(562, 105, 'Hall', '15e72b465f4e851ad1320b2f476dc82efe1ef8efb0.jpg', '2021-03-04 15:14:17', '2021-03-04 15:16:36'),
(564, 105, 'Bedroom', '15a1aa94196697819ef06d37645b084afa2bce35a6.jpg', '2021-03-04 15:16:09', '2021-03-04 15:16:56'),
(565, 105, 'Bathroom', '157fc16f622141bf02cc3cc463992e05758b9146fa.jpg', '2021-03-04 15:16:22', '2021-03-04 15:16:58'),
(566, 105, 'Kitchen', '150f420242f196c61d1fdfed6192a0a5309cbb2d3c.jpg', '2021-03-04 15:17:16', '2021-03-04 15:17:26'),
(567, 106, 'Outside', '159da94c1a9854913ddd746f7bbcb853dbb2fa1578.jpg', '2021-03-04 16:50:43', '2021-03-04 16:53:02'),
(568, 106, 'Bedroom', '159923347f59a14c144881ded5480743004332993f.jpg', '2021-03-04 16:52:12', '2021-03-04 16:53:07'),
(569, 106, 'Kitchen', '158ca58530546e96d9821e83f486349a68765fcbd9.jpg', '2021-03-04 16:52:12', '2021-03-04 16:53:15'),
(570, 106, 'Bathroom', '15fb6406457bd60f10625bf2c63ed0026ebb53f686.jpg', '2021-03-04 16:52:54', '2021-03-04 16:53:23'),
(571, 106, 'Stairs', '15f82f0bbb709006c2f5e64a62e209225e18c27845.jpg', '2021-03-04 16:52:54', '2021-03-04 16:53:27'),
(572, 107, 'Outside', '15897c46a1e1dcdf3a6d41b82621052324fc81d2dc.jpg', '2021-03-04 17:11:04', '2021-03-04 17:13:57'),
(573, 107, 'Bathroom', '150839bfeaf60036cc3fcfd6be6920e467c4c201df.jpg', '2021-03-04 17:11:37', '2021-03-04 17:14:07'),
(574, 107, 'Stairs', '15bdfe001b78ffd51d698a4420777d7ace132bc701.jpg', '2021-03-04 17:11:37', '2021-03-04 17:14:13'),
(575, 107, 'Hall', '15478cb01f7608eaf29191b24311352c07cb2eb43c.jpg', '2021-03-04 17:11:59', '2021-03-04 17:14:23'),
(576, 107, 'Bathroom', '15c5c9c22f58e3fb235702f91151569d794a7b099b.jpg', '2021-03-04 17:12:30', '2021-03-04 17:14:27'),
(577, 107, 'Bedroom', '15f5bbb9c75fafbe3fbde812c483cd01e49faf9df0.jpg', '2021-03-04 17:12:30', '2021-03-04 17:14:34'),
(578, 108, 'Outside', '15baae753774f7ec8d30414e80317f5f861fe8b6bd.jpg', '2021-03-04 18:27:46', '2021-03-04 18:30:02'),
(579, 108, 'Outside With pool', '156a371a652ffa9fdf0220a823c0aba3e73784d081.jpg', '2021-03-04 18:28:43', '2021-03-04 18:30:06'),
(580, 108, 'Bathroom', '1548f78345fdf7bf0a450107be3ddf530433266650.jpg', '2021-03-04 18:29:27', '2021-03-04 18:30:12'),
(581, 108, 'Hall with Dinning Area', '15109d3bba40377d3d9bf59ebfb6f1f34ff698f5b9.jpg', '2021-03-04 18:29:27', '2021-03-04 18:30:32'),
(582, 108, 'Gym', '15adf09bfdd943c61cd443032e3678b7edc867ed01.jpg', '2021-03-04 18:29:46', '2021-03-04 18:30:38'),
(584, 109, 'Outside', '1534c3b9a32bc10f6b575e32b79a8686def24610e5.jpg', '2021-03-04 18:50:01', '2021-03-04 18:52:34'),
(585, 109, 'Outside With pool', '158b87d62455aff2927e58b7960828fcfec150d8ce.jpg', '2021-03-04 18:50:57', '2021-03-04 18:52:37'),
(586, 109, 'Poolside', '1546683f50a5d832ad7df92dbf240e3c6a8e108270.jpg', '2021-03-04 18:50:57', '2021-03-04 18:52:57'),
(587, 109, 'Laundry Room', '15d4ff5403ce297661145575602c2f3a378cf99198.jpg', '2021-03-04 18:51:25', '2021-03-04 18:52:54'),
(588, 109, 'Kitchen', '15d72552163d52ffd77474736515ae6454490a3fdd.jpg', '2021-03-04 18:51:57', '2021-03-04 18:53:01'),
(589, 109, 'Bedroom', '15cd3c1c7469d670333dc8846d25ea31f7157dae80.jpg', '2021-03-04 18:52:28', '2021-03-04 18:53:06'),
(590, 110, 'Outside', '156d24a4731dd3a3048f5b2ab50d4b872d23c08d2e.jpg', '2021-03-04 19:07:29', '2021-03-04 19:08:00'),
(591, 110, 'Kitchen', '15a57eec75fbada29574df7cfa9a7307ec860d539f.jpg', '2021-03-04 19:07:46', '2021-03-04 19:08:06'),
(592, 110, 'Bedroom', '1536ffdcbdcebe56dad77c28c019156e617424f3cf.jpg', '2021-03-04 19:07:47', '2021-03-04 19:08:11'),
(593, 110, 'Bathroom', '15bb2cec5ec52f82e241d482c8b8e0f615c8f6cfda.jpg', '2021-03-04 19:07:47', '2021-03-04 19:08:21'),
(594, 110, 'Hall', '152465d43d3684a319f00de519d13c9fb5bb7a88cd.jpg', '2021-03-04 19:08:52', '2021-03-04 19:09:05'),
(595, 111, 'Outside', '1572cff2dba47344650f2d7603c723d7987b6d7cd7.jpg', '2021-03-04 19:44:49', '2021-03-04 19:45:45'),
(596, 111, 'Outside', '156451f5e8568cbf9c6533e91e36857dde6ba77259.jpg', '2021-03-04 19:45:11', '2021-03-04 19:45:47'),
(598, 111, 'Bathroom', '1591c1e1d75839057495c64bba023fed00917a0c9e.jpg', '2021-03-04 19:45:40', '2021-03-04 19:45:53'),
(599, 111, 'Dinning room', '156d663decce4173d545b03556b0a0b5a34ae1e336.jpg', '2021-03-04 19:45:40', '2021-03-04 19:46:02'),
(600, 111, 'Bedroom', '155f6f49d7ccb6650be632430b290ec78e9cef41dc.jpg', '2021-03-04 19:46:10', '2021-03-04 19:46:17'),
(601, 112, 'Outside', '1555bdbf50bd35a9ff099901ad1f04becac52270f8.jpg', '2021-03-04 19:51:07', '2021-03-04 19:52:12'),
(602, 112, 'Hall', '150ec3ad2dc52e9834ce278aed95fc0b6102fd89ae.jpg', '2021-03-04 19:51:38', '2021-03-04 19:52:27'),
(603, 112, 'Bedroom', '1568bb08f69ce944f62d859f93969d4b7acfeb4fa6.jpg', '2021-03-04 19:51:38', '2021-03-04 19:52:33'),
(604, 112, 'Bathroom', '155e56ff04e6df4154313a4be5313006aa023c9783.jpg', '2021-03-04 19:51:38', '2021-03-04 19:53:18'),
(605, 112, 'Wardrobe', '155ee1f136e4c2072d15981817d71ea8a109bdadb5.jpg', '2021-03-04 19:51:38', '2021-03-04 19:53:28'),
(606, 112, 'Hall', '15068591489047f50f28251491b3b2f5d2efbef4f5.jpg', '2021-03-04 19:51:46', '2021-03-04 19:53:34'),
(611, 112, 'Outside With pool', '1530c2ec274c01aa3b782753f9b49adda23027fa8c.jpg', '2021-03-04 19:54:43', '2021-03-04 19:54:52'),
(612, 113, 'Outside', '15958665fd4461700196d6c4a0abc3b38ae98d8c17.jpg', '2021-03-05 14:41:54', '2021-03-05 14:46:54'),
(613, 113, 'Hall', '15115f86bf6360923586307068e71c0560b6a245ae.jpg', '2021-03-05 14:45:16', '2021-03-05 14:46:57'),
(614, 113, 'Bathroom', '150965bb6d9986cfe43355d7af2c6fd98cfa621dd0.jpg', '2021-03-05 14:45:16', '2021-03-05 14:47:04'),
(616, 113, 'Gym', '156e6f95f8e16cd6809bac680e1dd4bde5d4eaa239.jpg', '2021-03-05 14:45:16', '2021-03-05 14:47:13'),
(617, 113, 'Stairs', '15d1086f69f209e30215f756188d1bde50ae0cc092.jpg', '2021-03-05 14:47:29', '2021-03-05 14:47:43'),
(618, 114, 'Bedroom', '152d71bf32dc67dba9eddd05c4a474b9830c00e427.jpg', '2021-03-05 14:52:40', '2021-03-05 14:53:20'),
(619, 114, 'Hall', '15fea40a52d7a62d6b67951346516ca7a5a7ddc93b.jpg', '2021-03-05 14:52:40', '2021-03-05 14:53:24'),
(620, 114, 'Bathroom', '1506d792519806e0a1a72f3adf62bc20bd7238a38d.jpg', '2021-03-05 14:52:40', '2021-03-05 14:53:35'),
(621, 114, 'Outside', '158b30510421246ae45bd208dc68d434c86e2f0a48.jpg', '2021-03-05 14:53:12', '2021-03-05 14:53:37'),
(622, 114, 'Kitchen', '15dc757c616a005966e879eecd6ae0c3f4084d2e28.jpg', '2021-03-05 14:53:12', '2021-03-05 14:53:42'),
(623, 115, 'Wall', '156aa7e7ae2c74886aa8471bc2b8e534a57021c946.jpg', '2021-03-05 15:03:51', '2021-03-05 15:05:46'),
(624, 115, 'Hall', '156dbdddc63cd764f8ad1d3bd8fcc04bb15b38b9c6.jpg', '2021-03-05 15:04:52', '2021-03-05 15:05:52'),
(625, 115, 'Bathroom', '157b588f6ceb919db3419709c9c26de206df21015e.jpg', '2021-03-05 15:04:52', '2021-03-05 15:06:00'),
(626, 115, 'Bedroom', '152d76db11ace9f79a85d9d8c2438ced51e444d411.jpg', '2021-03-05 15:04:52', '2021-03-05 15:06:09'),
(627, 115, 'Outside', '15deb13b03e55996c0e5947b555152c61186107889.jpg', '2021-03-05 15:05:30', '2021-03-05 15:06:09'),
(629, 74, 'Outside', '1621fcf57d491dd1c41376629f4ef4e1f965346b1.jpg', '2021-03-09 15:32:59', '2021-03-09 15:34:21'),
(631, 74, 'Bathroom', '1c048824f080bc0a5d53c57dbbd7b8b0ca40c5c34.jpg', '2021-03-09 15:32:59', '2021-03-09 15:33:33'),
(632, 74, 'Kitchen', '1b14b7a5fddfaebed231149f85f20ccf7da948fea.jpg', '2021-03-09 15:32:59', '2021-03-09 15:33:29'),
(633, 74, 'Bedroom', '1ae83ed0eb8b026c849a744acad487afa0bed8821.jpg', '2021-03-09 15:33:52', '2021-03-09 15:34:10'),
(634, 117, 'Outside With pool', '1ac839fa2c1cc7d6a61c7dc4f19d3103e6ec10ea3.jpg', '2021-03-09 15:39:07', '2021-03-09 15:41:19'),
(635, 117, 'Bathroom', '1b90ec0427e7ff1f1dd5a0575956505c728083565.jpg', '2021-03-09 15:40:25', '2021-03-09 15:41:16'),
(636, 117, 'Bedroom', '176b9f1351e4e6f63765a826bf67ee9694824fe18.jpg', '2021-03-09 15:40:25', '2021-03-09 15:41:10'),
(637, 117, 'Hall', '1518d914d41aa7046a4921ad46539dc76a9a9f4e0.jpg', '2021-03-09 15:40:25', '2021-03-09 15:41:03'),
(638, 117, 'Laundry', '1546a11974044af3dafc0bcc75d50e7da8cc83915.jpg', '2021-03-09 15:40:26', '2021-03-09 15:40:59'),
(639, 118, 'Outside With pool', '1f0d50ab38acd3627c2e820754a1ff5441022a715.jpg', '2021-03-09 15:46:16', '2021-03-09 15:47:02'),
(640, 118, 'Hall', '1d5d2c934186dc02159abb7456eb568880141a4ec.jpg', '2021-03-09 15:46:32', '2021-03-09 15:47:06'),
(641, 118, 'Bedroom', '14f109cbbcac42e3aca01809d83e2a048a01c65e8.jpg', '2021-03-09 15:46:33', '2021-03-09 15:47:12'),
(642, 118, 'Kitchen', '15370cb9e2374322e8f5cf7fd0a412b4c4f2252a8.jpg', '2021-03-09 15:46:53', '2021-03-09 15:47:18'),
(643, 118, 'Balcony', '19adadee72e41b4a94e62cedd3d32fdb13b3c88e1.jpg', '2021-03-09 15:46:53', '2021-03-09 15:47:23'),
(644, 119, NULL, '160b90cd1e7a50a3473c0f08c0c29020304e2a04e.jpg', '2021-03-09 15:51:38', '2021-03-09 15:51:38'),
(645, 119, 'Bedroom', '186fa618244de72629f636a46e3324d86c3b39f88.jpg', '2021-03-09 15:52:10', '2021-03-09 15:52:49'),
(646, 119, 'Bathroom', '19f98b3dc7b17128eb6e29c0f7b53ea14931d3509.jpg', '2021-03-09 15:52:10', '2021-03-09 15:52:51'),
(647, 119, 'Stairs', '19e4e2e083b220c3834eb9dea33cb9da04f9310b4.jpg', '2021-03-09 15:52:42', '2021-03-09 15:52:55'),
(648, 119, 'Gym', '13e6721cdce7391bb0ba2a4ce45ca2fabbe26dc72.jpg', '2021-03-09 15:52:42', '2021-03-09 15:52:59'),
(649, 121, 'Outside', '1886b6df9c3a11bc44e841a9563b6cea9934c66b8.jpg', '2021-03-09 20:35:12', '2021-03-09 20:38:47'),
(650, 121, 'Bathroom', '1a4c4192aabb42484db7056acaaad7681c1bc8c1d.jpg', '2021-03-09 20:37:03', '2021-03-09 20:38:54'),
(651, 121, 'Bedroom', '116969d322422240ac5d9bbb681d210f9c88b2d6e.jpg', '2021-03-09 20:37:03', '2021-03-09 20:39:25'),
(652, 121, 'Outside With pool', '1b0d16f21ae104913a34320811ca9efe03d9fac08.jpg', '2021-03-09 20:37:03', '2021-03-09 20:39:08'),
(653, 121, 'Swimming pool', '1aa01d2ec58c493de3134de3a21f8a8260e2d8a43.jpg', '2021-03-09 20:37:04', '2021-03-09 20:39:16'),
(654, 122, 'Outside', '1599a355bdf7a351d3eb1f7194db692cc1066edf9.jpg', '2021-03-09 20:55:29', '2021-03-09 20:58:52'),
(655, 122, 'Hall', '1a5feb29b9d4b61015991ac263b0eb2d292c4daf7.jpg', '2021-03-09 20:55:29', '2021-03-09 20:58:56'),
(656, 122, 'Bedroom', '1f7a6c5d307d82e23d871330697541b63f38e08c2.jpg', '2021-03-09 20:57:49', '2021-03-09 20:58:50'),
(657, 122, 'Bathroom', '1b62470b013f475388d2b8e7cab3f53f5b2ff388f.jpg', '2021-03-09 20:57:49', '2021-03-09 20:58:40'),
(659, 122, 'Stairs', '1c3e9da77576a4037f0783763e7002a939faa56cb.jpg', '2021-03-09 20:58:28', '2021-03-09 20:58:38'),
(660, 123, 'Outside', '1ca5068f6afce4c15e00bb042fb2520f2dd4344f2.jpg', '2021-03-09 21:06:44', '2021-03-09 21:07:40'),
(661, 123, 'Kitchen', '1c0b12c5fdd3d87ba9a604bcd2d9e25bf0523b0b2.jpg', '2021-03-09 21:07:33', '2021-03-09 21:07:45'),
(662, 123, 'Outside With pool', '1c515180f4cc3e178d083e7dc4870e16696f32880.jpg', '2021-03-09 21:07:33', '2021-03-09 21:07:47'),
(663, 123, 'Bedroom', '1b042748d0885bb6d55fc45390af6611f6a47d71e.jpg', '2021-03-09 21:07:33', '2021-03-09 21:07:55'),
(664, 123, 'Laundry', '1a005f79b2eb9a4232928309c3b4309e00e0eb8fb.jpg', '2021-03-09 21:07:34', '2021-03-09 21:08:00'),
(665, 124, 'Outside', '183e1c510e88f0a2b31b7707889a268eda4ff00d6.jpg', '2021-03-09 21:13:25', '2021-03-09 21:15:35'),
(667, 124, 'Kitchen', '1b677dab34cac237cb4621141f5365926315b8a16.jpg', '2021-03-09 21:15:03', '2021-03-09 21:15:43'),
(668, 124, 'Bedroom', '128419f87a457a578472fb7a18ebdc896e3f9d0a5.jpg', '2021-03-09 21:15:04', '2021-03-09 21:15:47'),
(669, 124, 'Bathroom', '1fc9ba50b8527f8b7a576b59d764ecfec2eb50088.jpg', '2021-03-09 21:15:04', '2021-03-09 21:18:01'),
(672, 124, 'Wardrobe', '133566fccc0feb0e0c37b40bab183e48a2e31148f.jpg', '2021-03-09 21:19:43', '2021-03-09 21:20:24'),
(673, 125, 'Bathroom', '12218fd7045b40e19a5b0812de7c60579e58395ad.jpg', '2021-03-09 21:51:08', '2021-03-09 21:51:18'),
(675, 125, 'Outside', '199d6eb4ad0ed7320060e1d3653c3094657ecdd72.jpg', '2021-03-09 21:53:18', '2021-03-09 21:53:25'),
(676, 125, 'Kitchen', '1c486da808b4c16f180336ad291203f65397e3d9c.jpg', '2021-03-09 21:53:18', '2021-03-09 21:53:36'),
(677, 125, 'Bedroom', '125b955df2484c76b22e5cd8fa119bc63c6fe155e.jpg', '2021-03-09 21:53:18', '2021-03-09 21:53:55'),
(678, 125, 'Laundry', '13636746b68b4369499376d21ab5a3fa185f51050.jpg', '2021-03-09 21:53:18', '2021-03-09 21:54:02'),
(679, 126, NULL, '105041bfa37cb8d4dba943fcdef154aaff2dc847d.jpg', '2021-03-09 22:12:33', '2021-03-09 22:12:33'),
(680, 126, 'Bedroom', '160f16d73b88f6aec7f9f836a80f0107632faab23.jpg', '2021-03-09 22:14:10', '2021-03-09 22:14:36'),
(681, 126, 'Kitchen', '1ccb45f2bf179ddf0243781642cb6e81c5e691c04.jpg', '2021-03-09 22:14:10', '2021-03-09 22:14:24'),
(682, 126, 'Outside', '1c0ceef2c66b28703c6fbd0f29bfd6f1e8ba9b268.jpg', '2021-03-09 22:14:10', '2021-03-09 22:14:20'),
(683, 126, 'Hall', '1fb6a32f8a3398f3f8bde7d54546ab657e904a126.jpg', '2021-03-09 22:14:11', '2021-03-09 22:14:29'),
(684, 127, 'Outside', '1d5b03083cd00e12179a7aa792320e4f159e486bf.jpg', '2021-03-09 22:18:02', '2021-03-09 22:19:05'),
(685, 127, 'Outside', '197dfd0ff334e9fde32d20a2fde76bd39dbbf886a.jpg', '2021-03-09 22:18:02', '2021-03-09 22:19:07'),
(686, 127, 'Bathroom', '110cd4c216e33085eaf04864f4be8032f1858c898.jpg', '2021-03-09 22:19:00', '2021-03-09 22:19:10'),
(687, 127, 'Bathroom', '192d28912fd2927c523b124946b78d0b677d391f8.jpg', '2021-03-09 22:19:00', '2021-03-09 22:19:14'),
(689, 127, 'Hall', '1cb86dbb4f768ae0ea11a9642d452a4ec546927dc.jpg', '2021-03-09 22:19:00', '2021-03-09 22:19:30'),
(690, 128, 'Bedroom', '1deee8ef91b3050c1003f6699c64d37019f30b70f.jpg', '2021-03-09 22:27:43', '2021-03-09 22:31:19'),
(691, 128, 'Outside', '1edbcf76a016e1aefd7c936369b1d32144fab7800.jpg', '2021-03-09 22:29:40', '2021-03-09 22:31:21'),
(692, 128, 'Outside With pool', '110cc8120c4b5af887334dba1bfb854228381a3c8.jpg', '2021-03-09 22:29:40', '2021-03-09 22:31:23'),
(693, 128, 'Kitchen', '1e30547de927874b076f47fb5d6bc539cff8d7fd5.jpg', '2021-03-09 22:29:40', '2021-03-09 22:31:31'),
(695, 128, 'Bathroom', '19b7a44cfa1f748d435231b7845eea66552f1435b.jpg', '2021-03-09 22:31:06', '2021-03-09 22:31:35'),
(696, 129, 'Bedroom', '1c317d41377ec931b8ebccfdbe3bcbb5f4dc814f2.jpg', '2021-03-09 22:55:04', '2021-03-09 22:56:27'),
(697, 129, 'Stairs', '1401dc6100405c2115cd37e9badbabba192b33f3f.jpg', '2021-03-09 22:56:19', '2021-03-09 22:56:37'),
(698, 129, 'Ironing Space', '160d9951fb5147fc9c07c3a7c6623dc22586bbec6.jpg', '2021-03-09 22:56:19', '2021-03-09 22:56:46'),
(699, 129, 'Outside', '12665db5c43b621f05ff4e808bba8f696cebf88d6.jpg', '2021-03-09 22:56:19', '2021-03-09 22:56:49'),
(700, 129, 'Kitchen', '19aba695e3e28c77e86fd48b9ccf2633c1fbe19ad.jpg', '2021-03-09 22:56:19', '2021-03-09 22:56:53'),
(701, 130, 'Bedroom', '16093b2b7b008e0a036460b3793600ca1da6c5595.jpg', '2021-03-09 23:01:11', '2021-03-09 23:03:08'),
(702, 130, 'Outside', '18ba097698a5af8f9eea1f1c94c4ab9dc5487b9ca.jpg', '2021-03-09 23:02:46', '2021-03-09 23:03:10'),
(703, 130, 'Bathroom', '155fafc1e50a3af6e03dd3afe679862a9a8b16246.jpg', '2021-03-09 23:02:46', '2021-03-09 23:03:13'),
(704, 130, 'Hall', '1abe52cec90dc18b7d5c573005d20cf693b5cd57d.jpg', '2021-03-09 23:02:47', '2021-03-09 23:03:17'),
(705, 130, 'Balcony', '13b47a9f53bee73811fcba1fb978b15cbe5a2a1a9.jpg', '2021-03-09 23:04:15', '2021-03-09 23:04:26'),
(706, 116, 'Kitchen', '15a3f918c61980233b51b931fb861927e4b23d84ab.jpg', '2021-03-10 15:05:05', '2021-03-10 15:07:07'),
(709, 116, 'Outside', '1582ccf12d81f58437c0f07adcd2b41bed34ae5b91.jpg', '2021-03-10 15:05:06', '2021-03-10 15:07:09'),
(710, 116, 'Bathroom', '15a99ec8528ea7b9ee81cfa5abc96b31edbcc1d3c8.jpg', '2021-03-10 15:05:55', '2021-03-10 15:07:14'),
(711, 116, 'Bedroom', '152271d58fa10c1f49bb0fa01e0fc3d6e1097ed51f.jpg', '2021-03-10 15:06:58', '2021-03-10 15:07:21'),
(713, 116, 'Stairs', '156f3f1f3a1a9f25e4eda4c9d778f4c5108cfaff15.jpg', '2021-03-10 15:07:48', '2021-03-10 15:07:58'),
(714, 131, 'Outside With pool', '155d184fd8d600a782bdead5251a61b7adaa635a81.jpg', '2021-03-10 15:14:45', '2021-03-10 15:16:40'),
(715, 131, 'Bedroom', '159ae10a62a2885051fced188b1ab803b22dca1fde.jpg', '2021-03-10 15:16:31', '2021-03-10 15:16:43'),
(716, 131, 'Sitting Room', '159058f0d2e67f21845c497a4b2a0e980d376df5bb.jpg', '2021-03-10 15:16:31', '2021-03-10 15:16:52'),
(717, 131, 'Bathroom', '15cf728a262bf0defa77d4b4a7e0ab6021c227e2ad.jpg', '2021-03-10 15:16:31', '2021-03-10 15:16:55'),
(718, 131, 'Stairs', '15d9c32b060500d0449f0b5a2d7af49ba433a10176.jpg', '2021-03-10 15:16:31', '2021-03-10 15:17:01'),
(719, 131, 'Kitchen', '15a393820853557e2e2bf0d524c9e95439fac38aa2.jpg', '2021-03-10 15:17:12', '2021-03-10 15:17:18'),
(720, 132, 'Outside With pool', '1583851ca4faca88cab9dabd77e4626f0013028a01.jpg', '2021-03-10 15:23:36', '2021-03-10 15:24:23'),
(721, 132, 'Bathroom', '15b62e2bcf35b612cc5e93bb343a81b3179c160438.jpg', '2021-03-10 15:24:12', '2021-03-10 15:24:26'),
(722, 132, 'Hall', '156a77f831e9ee1ae9800802e4b8a9631b0109704c.jpg', '2021-03-10 15:24:12', '2021-03-10 15:24:41'),
(723, 132, 'Bathroom', '15f41d979b4ce4f517cc1a952ea26decfa55e757d5.jpg', '2021-03-10 15:24:13', '2021-03-10 15:24:46'),
(724, 132, 'Bedroom', '15fef349e383abd976f5f62e91754fafba6de67a66.jpg', '2021-03-10 15:24:13', '2021-03-10 15:24:50'),
(725, 133, 'Bedroom', '15ba52b628706c43a192f7f7f7f45eebdeec41393e.jpg', '2021-03-10 15:47:54', '2021-03-10 15:49:27'),
(726, 133, 'Hall', '151af262d30e1ec2a6f57b4f4b3552588fcbf0a83a.jpg', '2021-03-10 15:47:55', '2021-03-10 15:49:57'),
(727, 133, 'Bedroom', '152d01281b2290d80359e72e6652561cbd48a2da76.jpg', '2021-03-10 15:48:28', '2021-03-10 15:50:04'),
(728, 133, 'Outside', '1595b27669094d1eaab1f8bf13e1196f0ef9538f51.jpg', '2021-03-10 15:48:41', '2021-03-10 15:50:07'),
(729, 133, 'Kitchen', '15a54ba1ca495bd565cfbcaf64eb6cea8cc10662ab.jpg', '2021-03-10 15:49:22', '2021-03-10 15:50:10'),
(730, 134, 'Bathroom', '150a67adc4432426f35ed32bbf630d620c15a86d8a.jpg', '2021-03-10 15:53:15', '2021-03-10 15:53:30'),
(731, 134, 'Outside', '15a1e5f7615128537220189814a5e35a3163af91ee.jpg', '2021-03-10 15:54:05', '2021-03-10 15:54:29'),
(732, 134, 'Hall', '152283ca3b79adccf1a9ce2a2cae25d46445c92078.jpg', '2021-03-10 15:54:05', '2021-03-10 15:54:33'),
(733, 134, 'Outside With pool', '15490acafd5d349683c307730b2b8ff56088e4b938.jpg', '2021-03-10 15:54:05', '2021-03-10 15:54:36'),
(734, 134, 'Kitchen', '156c8b69ab8a7c78d60eed3eef250a7f71593cfbde.jpg', '2021-03-10 15:54:25', '2021-03-10 15:54:38'),
(735, 135, 'Outside', '15e5cd8db58202fec3d19412497200d0e8dc902d31.jpg', '2021-03-10 15:59:04', '2021-03-10 15:59:49'),
(736, 135, 'Bedroom', '1596c3772c357d6babe4117b98dd520d4546436b49.jpg', '2021-03-10 15:59:38', '2021-03-10 16:00:05'),
(737, 135, 'Kitchen', '150a732b5754000810eb37e5b4db3dbcc65b8f30b6.jpg', '2021-03-10 15:59:38', '2021-03-10 16:00:07'),
(738, 135, 'Bathroom', '15af231d0bc9b84cda4792e27bb7f97197e53021d3.jpg', '2021-03-10 15:59:38', '2021-03-10 16:00:10'),
(739, 135, 'Hall', '156d77736ef66f4a9432a5f550a57857b6549b560c.jpg', '2021-03-10 15:59:39', '2021-03-10 16:00:14'),
(740, 136, 'Outside With pool', '1566d15ba7f04183ea0d87407862e08b465323013b.jpg', '2021-03-10 16:03:56', '2021-03-10 16:05:21'),
(741, 136, 'Outside View', '1541c6f452c564d590d217d573d0df589900198240.jpg', '2021-03-10 16:03:57', '2021-03-10 16:05:28'),
(742, 136, 'Hall', '15aa0084ca2f0b2e1d3f7feb9fa226a27908a79b78.jpg', '2021-03-10 16:04:43', '2021-03-10 16:05:32'),
(743, 136, 'Bedroom', '15bcba850416a9873e3d46d331434f67edefc8d206.jpg', '2021-03-10 16:04:43', '2021-03-10 16:05:34'),
(744, 136, 'Bathroom', '150217fcc30e26c04fffd91f826213b408954c2faf.jpg', '2021-03-10 16:04:43', '2021-03-10 16:05:43'),
(745, 137, 'Bedroom', '157aa22b073f16c3503e4c00ef23d36329469c9e40.jpg', '2021-03-10 16:23:02', '2021-03-10 16:24:08'),
(746, 137, 'Kitchen', '1538c46dbee2d9b8fde57ed6e3480a82bb8065ddc0.jpg', '2021-03-10 16:23:02', '2021-03-10 16:24:10'),
(747, 137, 'Outside', '1524990a8de68cd5795019bb1f3034a9b9a36f71e2.jpg', '2021-03-10 16:23:03', '2021-03-10 16:24:12'),
(748, 137, 'Bathroom', '1565cba65025c1b21abb316c67c7d5a4e315df339b.jpg', '2021-03-10 16:23:27', '2021-03-10 16:24:16'),
(749, 137, 'Stairs', '15d9dc1e2df47c48bf586ca617ac5f2b6d0c5797c2.jpg', '2021-03-10 16:23:27', '2021-03-10 16:24:22'),
(751, 138, 'Bedroom', '157572adf3a29dbb070eca342d9c02fcf70f0c2a6b.jpg', '2021-03-10 16:29:40', '2021-03-10 16:30:12'),
(752, 138, 'Laundry Space', '15a20784b8c74359213b2af4338ecf6477e6b5b89a.jpg', '2021-03-10 16:29:40', '2021-03-10 16:30:06'),
(753, 138, 'Dinning Space', '15f9d591c0f33848e1967e04b82aff5dec965cba5b.jpg', '2021-03-10 16:30:25', '2021-03-10 16:30:38'),
(754, 138, 'Bathroom', '15690c29f32841e80d30cfe601eed126cab9d09b2c.jpg', '2021-03-10 16:30:25', '2021-03-10 16:30:40'),
(755, 138, 'Kitchen', '15f02bdcacb42bef4d269596828534c64750aa4b7a.jpg', '2021-03-10 16:30:53', '2021-03-10 16:30:58'),
(756, 139, 'Bedroom', '15d4b1920593431660ceb1c228a48f6f5b8f774c18.jpg', '2021-03-10 16:36:51', '2021-03-10 16:37:01'),
(757, 139, 'Shared Living Room', '1522fd333599422488cc7e92723cdb1cd94fdaa63e.jpg', '2021-03-10 16:36:51', '2021-03-10 16:37:16'),
(758, 139, 'Kitchen', '1588caa3c0e4296b0789d94bfa0488ef33d1a6de15.jpg', '2021-03-10 16:36:51', '2021-03-10 16:37:19'),
(759, 139, 'Bathroom', '15d0ba866422dbf845b90fdea38515a00ae56b942e.jpg', '2021-03-10 16:36:52', '2021-03-10 16:37:22'),
(760, 139, 'Outside', '15b12edfe04975809f6ca27288c537a7057aeeb982.jpg', '2021-03-10 16:36:52', '2021-03-10 16:37:23'),
(761, 140, 'Bedroom', '15a9efb0bcf9425a4b7a21445e3c0f69c01ebf905e.jpg', '2021-03-10 16:45:02', '2021-03-10 16:45:13'),
(762, 140, 'Hall', '1591e9a5ebc18483b92220e75b3923a4983ea2bf42.jpg', '2021-03-10 16:45:02', '2021-03-10 16:45:19'),
(763, 140, 'Bathroom', '15de00f75d00ee1648973c64ef45370082d1fc0f83.jpg', '2021-03-10 16:45:02', '2021-03-10 16:45:22'),
(764, 140, 'Bedroom', '15b700a2f4e9de0043ae270a9074ca60c9492ee5f9.jpg', '2021-03-10 16:45:02', '2021-03-10 16:45:27'),
(766, 140, 'Stairs', '1554f34473af9876fa118b17c90043963f1bcd3697.jpg', '2021-03-10 16:46:03', '2021-03-10 16:46:11'),
(767, 141, 'Outside', '15175b6d0c11dd4ef8f3b7c0b5864baff9685e3380.jpg', '2021-03-10 16:54:12', '2021-03-10 16:55:21'),
(768, 141, 'Kitchen', '1563fd88579a008db41536fdcb307e43b2aff2a70b.jpg', '2021-03-10 16:54:43', '2021-03-10 16:55:23'),
(769, 141, 'Bedroom', '15444fb5920a7251f9c368e7ac17e7409f72cc0d37.jpg', '2021-03-10 16:54:43', '2021-03-10 16:55:25'),
(770, 141, 'Wardrobe', '15e6ee0986b4e1c8269a57cd922664a10b8f5a2ab2.jpg', '2021-03-10 16:55:02', '2021-03-10 16:55:32'),
(771, 141, 'Bathroom', '15aec968b6b26b37737a61c08255b83001ed54d80a.jpg', '2021-03-10 16:55:17', '2021-03-10 16:55:35'),
(772, 142, 'Outside', '1531cdbe0d2598deb1a193903d14dfd3fd7b5fc589.jpg', '2021-03-10 17:06:25', '2021-03-10 17:06:59'),
(773, 142, 'Hall', '15d6dace799733beefe256f10e86349a14644a17a3.jpg', '2021-03-10 17:06:25', '2021-03-10 17:06:57'),
(774, 142, 'Bathroom', '15d4e74def1a5155c517bdd5e44dbce456ad961cab.jpg', '2021-03-10 17:06:26', '2021-03-10 17:07:02'),
(775, 142, 'Outside', '151f07c0fa861b5ffd982dabc55419f4a755143ce2.jpg', '2021-03-10 17:06:47', '2021-03-10 17:07:04'),
(776, 142, 'Bedroom', '157364e045aa94c4b4303f45f1b3bc973e2cf05624.jpg', '2021-03-10 17:06:48', '2021-03-10 17:07:07'),
(777, 143, 'Outside', '15f85869d06fbde546414b40cbb4878995231b2967.jpg', '2021-03-10 17:20:13', '2021-03-10 17:21:21'),
(778, 143, 'Bedroom', '15149a1ccbcb06c64ca796542046ba0e10dc387175.jpg', '2021-03-10 17:20:53', '2021-03-10 17:21:25'),
(779, 143, 'Hall', '1584588e6ba9d5d390b63fad76ad080cc7de5f934c.jpg', '2021-03-10 17:20:53', '2021-03-10 17:21:32'),
(780, 143, 'Hall', '15a5b9bdf1a912459665c42463ed6d7e6df6cb017f.jpg', '2021-03-10 17:20:54', '2021-03-10 17:21:38'),
(781, 143, 'Bathroom', '1550087bcb8c0f8a85cb5d2d6b4264218faa61e168.jpg', '2021-03-10 17:21:46', '2021-03-10 17:21:52'),
(782, 144, NULL, '156a27679978a1d12a53e4009e8f1b8ec6a618ac25.jpg', '2021-03-10 17:37:13', '2021-03-10 17:37:13'),
(784, 144, 'Bedroom', '15a13eb0e4eeaa7609982ae9262399a700a9b2be18.jpg', '2021-03-10 17:39:38', '2021-03-10 17:39:55'),
(785, 144, 'Bathroom', '1522c3113d3d2dd3a2c3951c7f71b85de7e5e19c93.jpg', '2021-03-10 17:39:38', '2021-03-10 17:39:57'),
(786, 144, 'Kitchen', '1534b8ad7c82cfb9d1f29bc33df7947a2112eaa642.jpg', '2021-03-10 17:39:38', '2021-03-10 17:39:59'),
(787, 144, 'Hall', '150f12f418cd25ec30e49cd756d771508eda4ff602.jpg', '2021-03-10 17:40:11', '2021-03-10 17:40:18'),
(788, 145, NULL, '15465b9b0679ede7d57fdbd9e9a5281aa2fe836a68.jpg', '2021-03-10 17:46:46', '2021-03-10 17:46:46'),
(789, 145, 'Stairs', '15cd965f288cc31c3cdf02e04cc7b4d445e5d3af45.jpg', '2021-03-10 17:47:38', '2021-03-10 17:47:50'),
(790, 145, 'Bedroom', '1588a39bbfe8f7d2186be3580c6c3efaa0f5b8bee8.jpg', '2021-03-10 17:47:38', '2021-03-10 17:47:52'),
(791, 145, 'Wardrobe', '1529f92eadc0ccb5f6321e747c67d05f4c3097ac90.jpg', '2021-03-10 17:47:38', '2021-03-10 17:48:00'),
(792, 145, 'Kitchen', '15d2f38875b2485896d7bca60683941b87f7617f0a.jpg', '2021-03-10 17:47:39', '2021-03-10 17:48:04'),
(794, 146, 'Outside', '15d3b0c1eae6987397e48777fca6277e45dfe0a9b9.jpg', '2021-03-10 17:56:55', '2021-03-10 17:59:15'),
(795, 146, 'Bedroom', '150faead417f54d8e24954ec37a73ec2bc11b3a768.jpg', '2021-03-10 17:58:53', '2021-03-10 17:59:21'),
(796, 146, 'Kitchen', '154193ce97300ed3ba0b3929137990dc737a3875d4.jpg', '2021-03-10 17:58:53', '2021-03-10 17:59:24'),
(797, 146, 'Outside With pool', '1540db44922dfaf5c2821d0179c8765e076f2c2996.jpg', '2021-03-10 17:58:53', '2021-03-10 17:59:26'),
(799, 146, 'Outside With pool', '1563b6cab7310300cabcd4aa1f6b1a5a544dbc4a47.jpg', '2021-03-10 18:00:06', '2021-03-10 18:00:13'),
(801, 147, 'Hall', '152e2f053c2812da11bc6702ebac0e8c7b4ae82da2.jpg', '2021-03-10 18:18:24', '2021-03-10 18:22:46'),
(802, 147, 'Outside', '15cac7f9cb8d84db77148d5cfbe9bad78cd99c1570.jpg', '2021-03-10 18:18:42', '2021-03-10 18:22:38'),
(803, 147, 'Kitchen', '153db5d569083b90eb6603ef1bd29a31337e4458b5.jpg', '2021-03-10 18:21:31', '2021-03-10 18:22:37'),
(804, 147, 'Bedroom', '1555e2279c31579eccd0bce1b9879a87fbac473969.jpg', '2021-03-10 18:21:31', '2021-03-10 18:22:32'),
(805, 147, 'Bathroom', '1579d57ab31c6d2daff316b3e4d1522951c10c175c.jpg', '2021-03-10 18:22:22', '2021-03-10 18:22:27'),
(806, 148, 'Bedroom', '153b4e9c017da39463a535969bb8a802f7f18e14b0.jpg', '2021-03-10 19:24:51', '2021-03-10 19:26:51'),
(807, 148, 'Outside', '157f7851b87606b9e3c990ea12c20922fa6759496f.jpg', '2021-03-10 19:26:44', '2021-03-10 19:26:53'),
(808, 148, 'Hall', '158b7ed67ab2212a67cefe29f1f8023bb7e38da1b0.jpg', '2021-03-10 19:26:44', '2021-03-10 19:26:57'),
(809, 148, 'Kitchen', '150cf25b7b50298659258b69d1d606e06167f3c4c8.jpg', '2021-03-10 19:26:44', '2021-03-10 19:27:00'),
(810, 148, 'Bathroom', '15c773e28a230d1e08c11072bfcf4af6e2bcb024be.jpg', '2021-03-10 19:26:45', '2021-03-10 19:27:03'),
(811, 149, 'Bathroom', '15cf5670e0f41b07fc8ff036b5e459a62622e41404.jpg', '2021-03-10 19:35:32', '2021-03-10 19:43:44'),
(812, 149, 'Bedroom', '152f9cd15fd1b1927290f6a3d1a4e222edbafe48a2.jpg', '2021-03-10 19:41:23', '2021-03-10 19:44:00'),
(814, 149, 'Hall', '154bc68b9ff2423f6221d9b2c9e544990b8d6c054b.jpg', '2021-03-10 19:43:38', '2021-03-10 19:44:07'),
(815, 149, 'Stairs', '1558c9d20691cc83b886ce1e5da54593387c740206.jpg', '2021-03-10 19:43:38', '2021-03-10 19:44:12'),
(816, 149, 'Kitchen', '1529c1b9a3bdae090eeb6144cf27fdd9dfb51da14c.jpg', '2021-03-10 19:44:57', '2021-03-10 19:45:24'),
(817, 150, 'Outside', '15fa872703ef8ffb613a952edad69295f81486dd82.jpg', '2021-03-10 21:39:57', '2021-03-10 21:53:15'),
(818, 150, 'Bedroom', '155ffb4c6f024d08cbe31b4f73eb22d180661bee61.jpg', '2021-03-10 21:52:50', '2021-03-10 21:53:17'),
(819, 150, 'Kitchen', '150034641031b08b6622e1d51890962c84a93622d2.jpg', '2021-03-10 21:52:50', '2021-03-10 21:53:20'),
(820, 150, 'Hall', '15efeec2bb11a592a84c741d66c55ca502f1d88177.jpg', '2021-03-10 21:53:11', '2021-03-10 21:53:26'),
(821, 150, 'Kitchen', '15c47c7f32e4fc8526ad74eb8bdc7b6db01d391dd1.jpg', '2021-03-10 21:53:11', '2021-03-10 21:53:29'),
(823, 151, 'Outside', '10bbc099fed70f169b9ce79c36a34e21eb9842d73.jpg', '2021-03-11 14:15:13', '2021-03-11 14:16:38'),
(824, 151, 'Stairs', '1852e56f1251fe03ac22b852e66d5fdca8a37e27d.jpg', '2021-03-11 14:16:34', '2021-03-11 14:16:43'),
(826, 151, 'Kitchen', '1a218997bdef6094439fc1975a4304e72cfad61b6.jpg', '2021-03-11 14:16:34', '2021-03-11 14:16:54'),
(827, 151, 'Bathroom', '1b65688243c8d83e3d5ef9bd1f30fecf1027ff527.jpg', '2021-03-11 14:16:35', '2021-03-11 14:16:56'),
(828, 151, 'Bedroom', '1dc99b5f5bc5fbcaebc892d36cf0472d5b32d226d.jpg', '2021-03-11 14:17:36', '2021-03-11 14:17:44'),
(829, 152, 'Outside', '15348fbaed326fe397fe65a668248b30e0d1a014f.jpg', '2021-03-11 14:22:00', '2021-03-11 14:22:52'),
(830, 152, 'Stairs', '1823397da0dbd287901707a15f9cdeaf974ff1e3b.jpg', '2021-03-11 14:22:12', '2021-03-11 14:23:01'),
(831, 152, 'Bathroom', '19e100e7dcd1187546a99ddceca03632b60a23520.jpg', '2021-03-11 14:22:52', '2021-03-11 14:23:03'),
(832, 152, 'Bedroom', '1aa93c4c5fe6d35e84a29220b3988fbfc804d9c69.jpg', '2021-03-11 14:22:52', '2021-03-11 14:23:06'),
(833, 152, 'Kitchen', '14cfbe296525697e77c80e9babb70632963b167f6.jpg', '2021-03-11 14:22:52', '2021-03-11 14:23:10'),
(834, 153, 'Outside', '164becc997e9055f6f96443a09aa0f99ee3188620.jpg', '2021-03-11 14:30:01', '2021-03-11 14:34:13'),
(836, 153, 'Hall', '189921901038c5ebf2ef1a5d8ae64c7677bd98ad0.jpg', '2021-03-11 14:33:38', '2021-03-11 14:34:26'),
(837, 153, 'Bathroom', '1713e765e3c7bef448f705746aa64700d01ca79c7.jpg', '2021-03-11 14:33:39', '2021-03-11 14:34:19'),
(838, 153, 'Bedroom', '10b9611263d16ed7b5db798ed2d517e0c0fe44bbf.jpg', '2021-03-11 14:33:39', '2021-03-11 14:34:15'),
(840, 153, 'Stairs', '1d19437b514c2a75c57f7f24ba60c3b7c85186b75.jpg', '2021-03-11 14:38:43', '2021-03-11 14:38:54'),
(844, 154, NULL, '16feb170576b7e235fdf7b714d41990a4d21c6356.jpg', '2021-03-11 14:51:35', '2021-03-11 14:51:35'),
(845, 154, 'Outside', '163711d757418d5eefe1bc92337e76f56f7c161da.jpg', '2021-03-11 14:51:35', '2021-03-11 14:52:24'),
(846, 154, 'Bathroom', '13a1d195518c61d11b7adc9b8ce8189fbe9f02334.jpg', '2021-03-11 14:52:19', '2021-03-11 14:52:26'),
(847, 154, 'Bedroom', '11eb4ce8a2151cdef63ddd111f4f50b4b92a065fd.jpg', '2021-03-11 14:52:20', '2021-03-11 14:52:29'),
(848, 154, 'Bathroom', '1228f2b16c686604aae8455d4d27dfd4adcf4d781.jpg', '2021-03-11 14:52:20', '2021-03-11 14:52:33'),
(849, 155, 'Hall', '155bf622111209361a08cd4f8e7ad91cf8dd760d9.jpg', '2021-03-11 15:00:18', '2021-03-11 15:01:24'),
(850, 155, 'Outside', '1634bb7d44755e10447a8db316868c1542cb7100f.jpg', '2021-03-11 15:01:01', '2021-03-11 15:01:19'),
(851, 155, 'Bedroom', '12ac9ad3a7543b0090bb0ae4e0c4bcabf9a70a1a1.jpg', '2021-03-11 15:01:01', '2021-03-11 15:01:18'),
(852, 155, 'Bathroom', '1b93f6beaebc2ab8a81240cca3cfb5fb7cb94ab28.jpg', '2021-03-11 15:01:01', '2021-03-11 15:01:16'),
(853, 155, 'Kitchen', '10819265d5d6ac42c7c5c0a10917b9dbbedbec53d.jpg', '2021-03-11 15:01:02', '2021-03-11 15:01:14'),
(855, 156, 'Outside', '1248d0390ccce3ff1d7ad228bb054d36dc0b45e93.jpg', '2021-03-11 15:08:42', '2021-03-11 15:09:40'),
(856, 156, 'Outside', '1733102d083f555a4f3ea35d44d1ee311f2f31037.jpg', '2021-03-11 15:09:00', '2021-03-11 15:09:43'),
(857, 156, 'Hall', '1f1047895983b96ffd68f84dd3761e9f60a541557.jpg', '2021-03-11 15:09:29', '2021-03-11 15:09:48'),
(859, 156, 'Kitchen', '11645b928888a4175f4e2f6c762831f073ccdd70e.jpg', '2021-03-11 15:09:29', '2021-03-11 15:09:57'),
(860, 156, 'Bedroom', '15f2ff4780950e189295fe7d334669fdd8854bf1c.jpg', '2021-03-11 15:10:58', '2021-03-11 15:11:09'),
(861, 157, 'Kitchen', '14cc7d64b8f952b57c00d91f2e80f653fbde48dbe.jpg', '2021-03-11 15:14:58', '2021-03-11 15:18:01'),
(862, 157, 'Outside', '1af85e110359b6f0524bf4649e2c6c77ebd0c819d.jpg', '2021-03-11 15:17:05', '2021-03-11 15:18:03'),
(863, 157, 'Bathroom', '172efec0af318b7fffaebf9db28d1a50798c8c3a2.jpg', '2021-03-11 15:17:56', '2021-03-11 15:18:05'),
(864, 157, 'Bedroom', '1e8bab6d804e0c337db0ad6af24ab84050df0123d.jpg', '2021-03-11 15:17:56', '2021-03-11 15:18:08'),
(865, 157, 'Stairs', '174d21867ab418a69b0958127ff917b9813fbd25c.jpg', '2021-03-11 15:17:57', '2021-03-11 15:18:13'),
(866, 158, 'Outside', '14ddd51397693a0ce4ae5f2db056055b4638f3091.jpg', '2021-03-11 15:26:40', '2021-03-11 16:22:38'),
(867, 158, 'Gym', '1d7fb8b6852c1ea3153a2cffbdab472ed63598e25.jpg', '2021-03-11 15:26:41', '2021-03-11 16:22:42'),
(868, 158, 'Bathroom', '1d6fdc2ad669483dd62e7fa64198b85282d3f1111.jpg', '2021-03-11 16:21:19', '2021-03-11 16:22:46'),
(869, 158, 'Bedroom', '1ee1ffd156606823651af225033723e582858586c.jpg', '2021-03-11 16:21:49', '2021-03-11 16:22:50'),
(870, 158, NULL, '18a7ad0dde674681da3cc6438bb202ed4f7705b7e.jpg', '2021-03-11 16:22:29', '2021-03-11 16:22:29'),
(871, 159, 'Outside', '1bba2216b252e2cb2dbf864db20eb3ac63d4d2ceb.jpg', '2021-03-11 16:28:40', '2021-03-11 16:29:08'),
(872, 159, 'Bedroom', '193aa78f4b89e48ee25eaf37999bec3992395417d.jpg', '2021-03-11 16:28:56', '2021-03-11 16:29:20'),
(873, 159, 'Kitchen', '1f5fc9ef1da8b60580d3f8316a851213bf49d6b6a.jpg', '2021-03-11 16:28:56', '2021-03-11 16:30:21'),
(874, 159, 'Bathroom', '1ce3b7f8c69ad361877aff97a999cebc05d3cf00b.jpg', '2021-03-11 16:28:56', '2021-03-11 16:30:19'),
(875, 159, 'Bedroom', '11ee080212ad69ebf7c5c6a35be12e95ace5a4e9e.jpg', '2021-03-11 16:28:56', '2021-03-11 16:30:25'),
(876, 160, 'Outside', '13526a1dca9987655d3ae75783ccb894aabce4f2e.jpg', '2021-03-11 16:35:48', '2021-03-11 16:36:43'),
(877, 160, 'Hall', '1d1c1826a52c1bcd638632b7d39d658d804fef81a.jpg', '2021-03-11 16:36:01', '2021-03-11 16:36:49'),
(878, 160, 'Kitchen', '1ad590969223a2e8b2ef32d5e08f4a1208bd96cd5.jpg', '2021-03-11 16:36:01', '2021-03-11 16:36:52'),
(879, 160, 'Bathroom', '1bb98bbba6dfbf953f709a3b2272d99b553eed804.jpg', '2021-03-11 16:36:01', '2021-03-11 16:36:55'),
(880, 160, 'Bedroom', '10a56d9a1f10207564f45d2fe0601afa6d863935b.jpg', '2021-03-11 16:36:01', '2021-03-11 16:36:58'),
(881, 161, 'Outside', '165a9041bb9da31b6977ce7c2a4f52e3887e3c6d3.jpg', '2021-03-11 16:43:26', '2021-03-11 16:44:33'),
(882, 161, 'Hall', '1402862f56b761abc54b890da751464553858ce8d.jpg', '2021-03-11 16:43:46', '2021-03-11 16:44:44'),
(883, 161, 'Kitchen', '1ac43214f13f0a27a159d1b28f0eb12e3f98fb600.jpg', '2021-03-11 16:43:46', '2021-03-11 16:44:47'),
(884, 161, 'Bathroom', '1ab3f1a5f1d5425bb88cd9628af2e57312b9ae3e8.jpg', '2021-03-11 16:43:46', '2021-03-11 16:44:50'),
(885, 161, 'Bedroom', '1c34b10a4ab94e04510ac43dafcb334c6342e9da5.jpg', '2021-03-11 16:43:46', '2021-03-11 16:44:53'),
(886, 163, 'Outside With pool', '180b237122b2af32e8ac78b4d4ca8fb7aabaaed12.jpg', '2021-03-11 16:59:12', '2021-03-11 16:59:36'),
(887, 163, 'Kitchen', '130dd60fe33f65826251e9e2671dc47f92514fb45.jpg', '2021-03-11 16:59:28', '2021-03-11 16:59:40'),
(888, 163, 'Hall', '10129173176f8486f060536a7fdc9eec082e888b8.jpg', '2021-03-11 16:59:28', '2021-03-11 16:59:46'),
(889, 163, 'Bathroom', '1681ea6d391d558cf42fc0ff9f79e0125551ddbf4.jpg', '2021-03-11 16:59:29', '2021-03-11 16:59:51'),
(890, 163, 'Bedroom', '168da7f850881d3042eb550a2a701df91da1962d4.jpg', '2021-03-11 16:59:29', '2021-03-11 16:59:54'),
(891, 164, 'Outside', '16a3b292815738e31d84fb439b2e1f6d0e194e3b9.jpg', '2021-03-11 17:23:34', '2021-03-11 17:24:03'),
(892, 164, 'Dinning Hall', '10c650e5584a7f27fd5fac2b09b9106bfa034035e.jpg', '2021-03-11 17:23:52', '2021-03-11 17:24:11'),
(893, 164, 'Kitchen', '1aeeda238f40ca64551b1860df77d09796d851e73.jpg', '2021-03-11 17:23:52', '2021-03-11 17:24:13'),
(894, 164, 'Bathroom', '133c67642a89a71d1b75a826f6a8bd1e06de26e22.jpg', '2021-03-11 17:23:53', '2021-03-11 17:24:17'),
(895, 164, 'Bedroom', '1c18bfedb2b1e77bdf8b6d1764c646fa166c6713e.jpg', '2021-03-11 17:23:53', '2021-03-11 17:24:19'),
(896, 165, 'Kitchen', '1928dbe67259fa1b988b4563dd6ef714cf98f5899.jpg', '2021-03-11 17:31:01', '2021-03-11 17:31:41'),
(898, 165, 'Outside', '11e7a6bfe89d524f48b6fd0fc84b5277246582656.jpg', '2021-03-11 17:31:16', '2021-03-11 17:31:46'),
(899, 165, 'Hall', '1b3056c45f657cdedd5f65739b88222669155ce1f.jpg', '2021-03-11 17:31:36', '2021-03-11 17:31:50'),
(900, 165, 'Bathroom', '10c9ef93de1123556240f6a66632037e76d87b93b.jpg', '2021-03-11 17:31:37', '2021-03-11 17:31:53'),
(901, 165, 'Bedroom', '180e95d99fd3ca06b576eb68c33e0c0a2517f7e71.jpg', '2021-03-11 17:31:37', '2021-03-11 17:31:56'),
(902, 166, 'Hall', '17f50ee6cb8d37320fc8e88bbd60959209454bfa0.jpg', '2021-03-11 17:42:03', '2021-03-11 17:42:35'),
(903, 166, 'Outside', '102f22961932387ab84f8ccedd2f106d590c43b07.jpg', '2021-03-11 17:42:19', '2021-03-11 17:42:38'),
(904, 166, 'Kitchen', '196eed667fe2170b42e80c58bb7c7e3d45a9e5090.jpg', '2021-03-11 17:42:19', '2021-03-11 17:42:40'),
(905, 166, 'Bathroom', '1e740870ddc7ca0e419a7d0e0e101c4bd1bb0e350.jpg', '2021-03-11 17:42:19', '2021-03-11 17:42:44'),
(906, 166, 'Bedroom', '1bf57249ad3326d034fb07d3bb95589ebfa87b088.jpg', '2021-03-11 17:42:19', '2021-03-11 17:42:47'),
(908, 167, 'Hall', '143827d55a4e7ca5e95e3a1f311a4254dfcfb19db.jpg', '2021-03-11 17:53:27', '2021-03-11 17:53:43'),
(909, 167, 'Kitchen', '117ddb0f3b1b4156c7da40b3f639e5916b781e788.jpg', '2021-03-11 17:53:27', '2021-03-11 17:53:46'),
(910, 167, 'Bathroom', '1e9475d55f1c274ada08e59aa11d569e216990c09.jpg', '2021-03-11 17:53:27', '2021-03-11 17:53:48'),
(911, 167, 'Bedroom', '13b31061cbc5233bcdd89e8f161b6853d2f1e1361.jpg', '2021-03-11 17:53:28', '2021-03-11 17:53:51'),
(912, 167, 'Outside', '148daa714e87108b7cda4c3c9cd562b89936b5979.jpg', '2021-03-11 17:55:51', '2021-03-11 17:55:59'),
(913, 168, 'Hall', '1693f661445b97bc0462b06c44931fc6fdfd84ab3.jpg', '2021-03-11 18:04:16', '2021-03-11 18:04:35'),
(914, 168, 'Bathroom', '1d5b7625909dbb53fbb48217c0eb4196601b3cb3e.jpg', '2021-03-11 18:04:27', '2021-03-11 18:04:39'),
(915, 168, 'Bedroom', '156457adf9ab2dba7032af23bc5e79cdb5d04a1ef.jpg', '2021-03-11 18:04:28', '2021-03-11 18:04:41'),
(916, 168, 'Outside', '18f16fe1b15ea1607626281fca34c730d8782980b.jpg', '2021-03-11 18:04:28', '2021-03-11 18:04:43'),
(917, 168, 'Kitchen', '132fb3fb57820992d9b5252a9cf095850c2acbeee.jpg', '2021-03-11 18:04:28', '2021-03-11 18:04:46'),
(918, 169, 'Kitchen', '1c6262e082cfef16d1a59ba2d9e048b806ba73c0e.jpg', '2021-03-11 18:11:01', '2021-03-11 18:11:24'),
(919, 169, 'Hall', '154c424a9a8c422b7e2dff12ee661baddaf79f37d.jpg', '2021-03-11 18:11:16', '2021-03-11 18:11:30'),
(920, 169, 'Bedroom', '1d87c53b8d63aa39aa1a92dd02c1ce273e9db1650.jpg', '2021-03-11 18:11:16', '2021-03-11 18:11:32'),
(921, 169, 'Bathroom', '16c068d84f7d9f70b2e75486a5b4ad02115cf1f31.jpg', '2021-03-11 18:11:16', '2021-03-11 18:11:35'),
(922, 169, 'Outside', '19963bf69a75eaf01e822194dc8737768a05b195a.jpg', '2021-03-11 18:11:16', '2021-03-11 18:11:37'),
(923, 170, 'Hall', '1c2203974e3049b339b2e2150d33461c3166a73f8.jpg', '2021-03-11 18:17:37', '2021-03-11 18:19:18'),
(924, 170, 'Bedroom', '121985d40381fe67937b746fbcd3d9d781dfc740b.jpg', '2021-03-11 18:18:03', '2021-03-11 18:19:22'),
(925, 170, 'Bathroom', '1965dcf01f3002694f9994cd697c271fa085e1d64.jpg', '2021-03-11 18:18:04', '2021-03-11 18:19:27'),
(926, 170, 'Outside', '1d84c48ebcea01af120c0827b6a0390001c3cd3ba.jpg', '2021-03-11 18:19:03', '2021-03-11 18:19:32'),
(927, 170, 'Stairs', '130db34e8e49ef660ac7561e9f3785a2d91c81c69.jpg', '2021-03-11 18:19:04', '2021-03-11 18:19:37'),
(928, 171, 'Outside With pool', '12eda8af9980fa0bfedb7cce8df06582538bc9dd1.jpg', '2021-03-11 19:59:17', '2021-03-11 20:01:24'),
(929, 171, 'Hall', '1e3d57e8f484c53ee4bad036e3e5f2be975ce0ef0.jpg', '2021-03-11 20:01:10', '2021-03-11 20:01:29'),
(930, 171, 'Bedroom', '1ffd51fd2eb068774040a23498008fc40ef33b17f.jpg', '2021-03-11 20:01:10', '2021-03-11 20:01:38'),
(931, 171, 'Bathroom', '1d0a7df08b9318d6f0f7988635491be99718bbec5.jpg', '2021-03-11 20:01:10', '2021-03-11 20:01:35'),
(932, 171, 'Kitchen', '1f22b57ab39d35f8dbfaf089b7c83a7757a195d2f.jpg', '2021-03-11 20:01:11', '2021-03-11 20:01:41'),
(933, 172, 'Kitchen', '12b3372246df7eb0fa601111676e346816029b43d.jpg', '2021-03-11 20:05:53', '2021-03-11 20:06:14'),
(934, 172, 'Hall', '101c06f831c2c45e7c6282c4c2ff03948c3670db2.jpg', '2021-03-11 20:06:07', '2021-03-11 20:06:19'),
(935, 172, 'Bedroom', '157d6ae8969456c4fe9a41dccff9ebe3249a8e713.jpg', '2021-03-11 20:06:07', '2021-03-11 20:06:22'),
(936, 172, 'Bathroom', '1da55b3e4192779e36a4be13c1354010dffbacce2.jpg', '2021-03-11 20:06:07', '2021-03-11 20:06:26'),
(937, 172, 'Outside', '193810f580ffacfdc92a0092f8e8bd46963246d74.jpg', '2021-03-11 20:06:07', '2021-03-11 20:06:30'),
(938, 173, 'Kitchen', '1630c28bc39f0b5433ee7efecfb80bf80d53f2938.jpg', '2021-03-11 20:10:02', '2021-03-11 20:10:32'),
(940, 173, 'Bedroom', '128ede5569298c808510c5ce6b4626f27bcb45e93.jpg', '2021-03-11 20:10:18', '2021-03-11 20:10:29'),
(942, 173, 'Bathroom', '1488b423176c6d32a1bbbfb25c9230ced3ba33bcc.jpg', '2021-03-11 20:10:18', '2021-03-11 20:10:41'),
(943, 173, 'Bedroom', '18b1d527a291aacc24b54ef7dbc76fc12dd872c5b.jpg', '2021-03-11 20:10:46', '2021-03-11 20:10:51'),
(944, 173, 'Stairs', '1fafbab8b3535e46a9300f0d5ba14b728e6de7e4d.jpg', '2021-03-11 20:11:08', '2021-03-11 20:11:15'),
(945, 174, 'Bedroom', '163056f3c0ec93300e7e16bcbced15a8d3f0c2eb7.jpg', '2021-03-11 20:18:18', '2021-03-11 20:18:48'),
(946, 174, 'Hall', '14899fe0bc7a51d81636426a9680f6f3d1c7cb5fd.jpg', '2021-03-11 20:18:34', '2021-03-11 20:18:52'),
(947, 174, 'Kitchen', '14ee06b6fa9aec3cc6d46ecb84e7dcdc40e372bd4.jpg', '2021-03-11 20:18:34', '2021-03-11 20:18:54'),
(948, 174, 'Bathroom', '101a662f70bf5e53022c9d284fddc4106c5c486fa.jpg', '2021-03-11 20:18:35', '2021-03-11 20:18:59'),
(949, 174, 'Outside', '1a3be8a7628db11f03d822158b8ecb0669f2649a5.jpg', '2021-03-11 20:18:35', '2021-03-11 20:19:00'),
(950, 175, 'Outside', '1ebacd820c8960f9f7f29e543d9afb41ad2bf6e4c.jpg', '2021-03-11 20:25:42', '2021-03-11 20:26:21'),
(951, 175, 'Hall', '1cb534d821c1623075d373a10380539469835cce4.jpg', '2021-03-11 20:26:03', '2021-03-11 20:26:28'),
(952, 175, 'Bathroom', '12436f3739cc28e5046949534ee1255e6ebcee4ce.jpg', '2021-03-11 20:26:03', '2021-03-11 20:26:39'),
(953, 175, 'Bedroom', '1e52d3922e0cfe71f8614015524587cb98d5a73a5.jpg', '2021-03-11 20:26:03', '2021-03-11 20:26:33'),
(954, 175, 'Kitchen', '1a3b3c703bbd92559f25b244ce2473b3afb189a88.jpg', '2021-03-11 20:26:03', '2021-03-11 20:26:42'),
(955, 176, 'Outside With pool', '1ccbc0a4b339aac70190ae27cfe9d11543c789a53.jpg', '2021-03-11 20:29:45', '2021-03-11 20:30:34'),
(956, 176, 'Hall', '1e3b18941050d6830e2207ca5450550faa30925e3.jpg', '2021-03-11 20:30:10', '2021-03-11 20:30:31'),
(957, 176, 'Bedroom', '1789549480d1a831c4402ae7dc340f99f42fbee16.jpg', '2021-03-11 20:30:10', '2021-03-11 20:30:23'),
(958, 176, 'Bathroom', '14427f0bfc6067d0c1836ef32ee38fd5e7e49b645.jpg', '2021-03-11 20:30:10', '2021-03-11 20:30:26'),
(959, 176, 'Kitchen', '1c5f74c96143088f5f0e2ecc74624fae55680c323.jpg', '2021-03-11 20:30:11', '2021-03-11 20:30:40'),
(960, 177, 'Kitchen', '1b3f6d2c2984d9a9693bad7b20a9df53b41e46559.jpg', '2021-03-11 20:35:18', '2021-03-11 20:35:43'),
(961, 177, 'Outside', '1a5ef42b0f9aefe81f4b26f6a08954879928098e4.jpg', '2021-03-11 20:35:27', '2021-03-11 20:35:45'),
(962, 177, 'Hall', '160ba79c15364b1b9e3e9825347cb83acf1ec8da6.jpg', '2021-03-11 20:35:38', '2021-03-11 20:35:49'),
(963, 177, 'Bedroom', '1c445a66bdfb52a777f26d4402381a21c02896b3b.jpg', '2021-03-11 20:35:38', '2021-03-11 20:35:53'),
(964, 177, 'Bathroom', '1813a3df980674d5fda48335424c1d45f311144db.jpg', '2021-03-11 20:35:38', '2021-03-11 20:35:55'),
(965, 178, 'Hall', '1cf1e2b0b3b17d40ed2a60932e0115b0bd44cc117.jpg', '2021-03-11 20:44:30', '2021-03-11 20:44:58'),
(966, 178, 'Outside', '11970fa4b861a292876e834aee8e9e0fb395cc3cf.jpg', '2021-03-11 20:44:40', '2021-03-11 20:45:01'),
(967, 178, 'Bedroom', '115b1dbbbab501ccef13ba97294434cdd6e355137.jpg', '2021-03-11 20:44:50', '2021-03-11 20:45:03'),
(968, 178, 'Kitchen', '112c600b98834c13b45ca1015b67b6e5f45f0a6ad.jpg', '2021-03-11 20:44:51', '2021-03-11 20:45:04'),
(969, 178, 'Bathroom', '1883a4975c6a07ad7e1c72d69a315d9858f6c71d4.jpg', '2021-03-11 20:44:51', '2021-03-11 20:45:09'),
(970, 179, 'Kitchen', '136f1765436db8097a736afca718b2b57285138de.jpg', '2021-03-11 20:50:16', '2021-03-11 20:50:44'),
(971, 179, 'Outside', '1236547f73c18db7b03a9223e278e7d4274a8281b.jpg', '2021-03-11 20:50:24', '2021-03-11 20:50:46'),
(972, 179, 'Hall', '14fee6c733ba57dccf26decea460946bada16823c.jpg', '2021-03-11 20:50:35', '2021-03-11 20:50:53'),
(973, 179, 'Bedroom', '150a4fd28b07675998487e0ca5675f269529b4dd7.jpg', '2021-03-11 20:50:35', '2021-03-11 20:50:56'),
(974, 179, 'Bathroom', '19960a501b8caec977e8b836cfcf6e7b49c57114b.jpg', '2021-03-11 20:50:35', '2021-03-11 20:50:59'),
(975, 180, 'Hall', '1fde0ce79c303089e31ed9bc4a31677ec31f5bc34.jpg', '2021-03-11 21:21:47', '2021-03-11 21:22:19'),
(976, 180, 'Outside', '1fc4243a922a4451da776aac257dfc829e7e7f918.jpg', '2021-03-11 21:21:56', '2021-03-11 21:22:21'),
(977, 180, 'Kitchen', '1e7382949a109205bb23b0fec7ed354077be82116.jpg', '2021-03-11 21:22:09', '2021-03-11 21:22:23'),
(978, 180, 'Bedroom', '1cb4eafb36f8b5048005cc73a6ef06697df1057d1.jpg', '2021-03-11 21:22:09', '2021-03-11 21:22:28'),
(979, 180, 'Bathroom', '1bc48dcfcd278cbb4a8fbbfaf890ce6aa385d067e.jpg', '2021-03-11 21:22:09', '2021-03-11 21:22:31'),
(980, 181, 'Outside With pool', '1fdfbb891d025465adba18d801d4e39b060a630a8.jpg', '2021-03-11 21:36:36', '2021-03-11 21:36:57'),
(981, 181, 'Kitchen', '1c88baf0513097df1568b22e58f4491787e5f36cc.jpg', '2021-03-11 21:36:51', '2021-03-11 21:37:03'),
(982, 181, 'Bedroom', '1f33988ed388f9f018d09844db2bf08ea0a51fb25.jpg', '2021-03-11 21:36:52', '2021-03-11 21:37:06'),
(983, 181, 'Bathroom', '158c547f44bc379c18b3814e7f0598a53db1d8843.jpg', '2021-03-11 21:36:52', '2021-03-11 21:37:08'),
(984, 181, 'Dinning', '14d6315191526384df3f1ee25cb7ef85f4f9524fe.jpg', '2021-03-11 21:36:52', '2021-03-11 21:37:49'),
(985, 182, 'Hall', '1fba3d81804aade99e8778cacc9bce40369cbf485.jpg', '2021-03-11 21:53:37', '2021-03-11 21:54:02'),
(986, 182, 'Outside', '135321599498c7d042c4fb1b52231a59590719bbc.jpg', '2021-03-11 21:53:46', '2021-03-11 21:54:13'),
(987, 182, 'Bedroom', '1e9feb1efe7312638125a04c75cf31409a97927b8.jpg', '2021-03-11 21:53:56', '2021-03-11 21:54:15'),
(988, 182, 'Bathroom', '14a17eafdc09906e683612c5ff56134f91529f875.jpg', '2021-03-11 21:53:56', '2021-03-11 21:54:18'),
(989, 182, 'Hall', '1f8e1fddc29c81d8ed8ac6b95ce39e2ea15e16822.jpg', '2021-03-11 21:53:56', '2021-03-11 21:54:22'),
(990, 183, 'Kitchen', '1ba78b9490fd879b2fae09b37972916b0205c57ff.jpg', '2021-03-11 22:00:59', '2021-03-11 22:01:24'),
(991, 183, 'Outside', '173959bbd331ed1b929704a12f1e06524fc7cc108.jpg', '2021-03-11 22:01:08', '2021-03-11 22:01:29'),
(992, 183, 'Bedroom', '1aea57e7ec8c07f533d02bc91bbcd91b34280b523.jpg', '2021-03-11 22:01:20', '2021-03-11 22:01:31'),
(993, 183, 'Bathroom', '19d3de067c499ecbf48e5670bd38f031561ac0beb.jpg', '2021-03-11 22:01:20', '2021-03-11 22:01:41'),
(994, 183, 'Hall', '135f4686c7149bdbb85b9265a24fc53dcd9b2ed94.jpg', '2021-03-11 22:01:20', '2021-03-11 22:01:53'),
(995, 184, 'Bedroom', '16cfe7e435c85f36e4fbb125e9d3f624e3346ae7f.jpg', '2021-03-11 22:18:35', '2021-03-11 22:19:00'),
(996, 184, 'Hall', '16960d7e49ffe7d5993d0401bf60e8e19310eb8ae.jpg', '2021-03-11 22:18:54', '2021-03-11 22:19:04'),
(997, 184, 'Kitchen', '1a4b81b03f60e4f52459ccf939054a432372749fc.jpg', '2021-03-11 22:18:54', '2021-03-11 22:19:06'),
(998, 184, 'Bathroom', '120f3a8a34c43fca2e003553777e45f8acd1b2634.jpg', '2021-03-11 22:18:54', '2021-03-11 22:19:09'),
(999, 184, 'Outside', '16ab61232beb019f1abbc6af9b0fc6cbc1cfcfdff.jpg', '2021-03-11 22:18:55', '2021-03-11 22:19:12'),
(1000, 185, 'Kitchen', '1dfa930ab73c6856c5988cdfbbd9039b68fc19497.jpg', '2021-03-11 22:28:26', '2021-03-11 22:28:55'),
(1001, 185, NULL, '10f7c2f82489bcf3da8844907a8c644d1b80ffab9.jpg', '2021-03-11 22:28:41', '2021-03-11 22:28:41'),
(1002, 185, 'Bedroom', '167b4ee320e960031a7a515a4219e21c43420398e.jpg', '2021-03-11 22:28:56', '2021-03-11 22:29:04'),
(1003, 185, 'Bathroom', '1611a3524510b288dfae421eb735ab3240d3e9e0d.jpg', '2021-03-11 22:28:57', '2021-03-11 22:29:07'),
(1004, 185, 'Hall', '18864207294ef0ee0ee7183c6a15b775403aeee9f.jpg', '2021-03-11 22:28:57', '2021-03-11 22:29:10'),
(1005, 186, 'Outside', '1aae56fb60313e11f80e32cfde6298f875d73151a.jpg', '2021-03-11 22:44:05', '2021-03-11 22:46:09'),
(1006, 186, NULL, '18498efdaf582ac7b049e5e2a06aef68cb3983093.jpg', '2021-03-11 22:44:55', '2021-03-11 22:44:55'),
(1007, 186, 'Bedroom', '11323388ed5266d06415ac200928acda28e5301db.jpg', '2021-03-11 22:44:55', '2021-03-11 22:46:15'),
(1008, 186, 'Dining Room', '187232df16420362265a6080bfe718c416778f4a6.jpg', '2021-03-11 22:44:55', '2021-03-11 22:46:34'),
(1009, 186, 'Bathroom', '18356f6740d78d5ae8a92ae38df069e358d245d3d.jpg', '2021-03-11 22:46:09', '2021-03-11 22:46:38'),
(1010, 187, 'Outside', '19d49e423cccce3360012a8a0092f0498456d5c33.jpg', '2021-03-15 14:31:21', '2021-03-15 14:36:11'),
(1011, 187, 'Inside', '1941a3a332f07f6812c261b09694325800142a26d.jpg', '2021-03-15 14:33:40', '2021-03-15 14:36:17'),
(1012, 187, 'Bedroom', '10a55d790225807f3f0b8c1bcf6b09846d577d6ae.jpg', '2021-03-15 14:33:40', '2021-03-15 14:36:20'),
(1013, 187, 'Washroom', '10d8c656a8b23c0db681b7df9bcf752102c2cf42a.jpg', '2021-03-15 14:33:40', '2021-03-15 14:36:33'),
(1014, 187, 'Hall', '135e6fb52008712da8bb71486cb33744029bda8c8.jpg', '2021-03-15 14:33:40', '2021-03-15 14:36:41'),
(1015, 188, 'Bathroom', '1cba147a0ce2fe11260a820383c398a57861ffafd.jpg', '2021-03-15 14:50:51', '2021-03-15 14:53:18'),
(1016, 188, 'Outside', '16ce2012bc46b9de8936a81c7c8052db39d8738ba.jpg', '2021-03-15 14:51:08', '2021-03-15 14:53:20'),
(1017, 188, 'Inside', '13dff287408c98898e7af8dd7d77b29caf7663786.jpg', '2021-03-15 14:51:08', '2021-03-15 14:53:30'),
(1018, 188, 'Outside', '19e5cd8458d791a769852110ea5cc2fb3273431a5.jpg', '2021-03-15 14:51:08', '2021-03-15 14:53:32'),
(1019, 188, 'Hall', '1f9f80e84b198dcd4d0b441316743cb307192076d.jpg', '2021-03-15 14:51:08', '2021-03-15 14:53:35'),
(1020, 189, 'Bathroom', '1f1e2d9c5e64800b8a9d24d282a39cc230708b7b7.jpg', '2021-03-15 19:25:41', '2021-03-15 19:27:19'),
(1021, 189, 'Outside', '1c38cbc243fa8ba4b27475e2f1805f5bd767b503a.jpg', '2021-03-15 19:26:26', '2021-03-15 19:27:22'),
(1022, 189, 'Inside', '105ac5aea62e159655adfd5a83b5e230915b8dc8e.jpg', '2021-03-15 19:26:40', '2021-03-15 19:27:35'),
(1023, 189, 'Outside', '11bb49567080e9dc552b9b23cb6961362ef1ee271.jpg', '2021-03-15 19:26:40', '2021-03-15 19:27:30');
INSERT INTO `property_images` (`id`, `property_id`, `caption`, `image`, `created_at`, `updated_at`) VALUES
(1024, 189, 'Hall', '143197abdb0edb1b9cc1f7c227c4178638bb211a3.jpg', '2021-03-15 19:26:40', '2021-03-15 19:27:29'),
(1026, 190, NULL, '10907b2288cdc0dcc826705f41abff86b271ab667.jpg', '2021-03-15 19:39:20', '2021-03-15 19:39:20'),
(1027, 190, NULL, '1bdc81dde53e5247b52abdb7a7f9a95bd10c7c1b1.jpg', '2021-03-15 19:39:29', '2021-03-15 19:39:29'),
(1028, 190, NULL, '1ff54288f36a4aa0ff194db49956922c60e67b5d3.jpg', '2021-03-15 19:39:39', '2021-03-15 19:39:39'),
(1029, 190, NULL, '1e5816f621040f442734e2fe988b72e720b3535b6.jpg', '2021-03-15 19:39:39', '2021-03-15 19:39:39'),
(1030, 190, NULL, '1680698b3780185e67b985577aa0e66a142416de0.jpg', '2021-03-15 19:39:40', '2021-03-15 19:39:40'),
(1031, 191, 'Bedroom', '1bda02a85d70a0b4b926b7266226e55e6ecd8f7f2.jpg', '2021-03-15 19:50:20', '2021-03-15 19:50:36'),
(1032, 191, 'Outside', '14b2f482c2e65cc7617cb926dc6a0670f0e4ad49e.jpg', '2021-03-15 19:50:27', '2021-03-15 19:50:40'),
(1033, 191, 'Bathroom', '1cfe96bb229cd1bbfe512c9f86ff99ca2393cd4d8.jpg', '2021-03-15 19:50:36', '2021-03-15 19:50:42'),
(1034, 191, 'Inside', '14dcaf0099551d23970838d2bfe016dec4659774b.jpg', '2021-03-15 19:50:36', '2021-03-15 19:50:50'),
(1035, 191, 'Hall', '11326f51740fc9294ce9db2bb4e092b3c407a99eb.jpg', '2021-03-15 19:50:36', '2021-03-15 19:50:55'),
(1036, 192, 'Hall', '1954ed2706cadd9c018939cb2c57f635e71503139.jpg', '2021-03-15 19:54:17', '2021-03-15 19:56:37'),
(1037, 192, 'Outside', '1d664d03b3f161f295ee8b98e245d9095a73d2ec7.jpg', '2021-03-15 19:54:27', '2021-03-15 19:56:39'),
(1038, 192, 'Bathroom', '1d06c7547f1e2a51a8aea725d7d0db287c0f00d27.jpg', '2021-03-15 19:54:39', '2021-03-15 19:56:42'),
(1039, 192, 'Bedroom', '1a20ce8a07274e9cb99b6be2cd1b8ec42d21f1ac8.jpg', '2021-03-15 19:54:40', '2021-03-15 19:56:46'),
(1040, 192, 'Stairs', '1d502bdf118b63c28acb60f764bd1c2e7034523ab.jpg', '2021-03-15 19:54:40', '2021-03-15 19:56:52'),
(1041, 193, 'Gym', '1a95f09f73d91d93fc2093e7a9ac463907ed69b6a.jpg', '2021-03-15 20:00:06', '2021-03-15 20:01:55'),
(1042, 193, 'Outside', '118a471d3a631f03a9e9b41b27f2faeb80334f43c.jpg', '2021-03-15 20:00:14', '2021-03-15 20:01:57'),
(1043, 193, 'Bedroom', '1a64bca2f5b32a6cb69495f1bec8ad97074703652.jpg', '2021-03-15 20:00:24', '2021-03-15 20:01:59'),
(1044, 193, 'Bathroom', '1d726f7281e5cf4c1237e6588766e6e3ddb2571b2.jpg', '2021-03-15 20:00:25', '2021-03-15 20:02:02'),
(1045, 193, 'Hall', '13cc7183395479901bcbe70c0d00b053c222504a3.jpg', '2021-03-15 20:00:25', '2021-03-15 20:02:06'),
(1046, 194, 'Outside', '19544381a855b57bfaeaaa6b855201c4f9f921bcb.jpg', '2021-03-15 20:06:31', '2021-03-15 20:07:17'),
(1047, 194, 'Hall', '14b449b53aba3d32b9386258fad66738b8909e5af.jpg', '2021-03-15 20:06:50', '2021-03-15 20:07:23'),
(1048, 194, 'Bedroom', '1bbc07397e1fb13f1f7ee77d3a3eb561275eb2ccb.jpg', '2021-03-15 20:07:07', '2021-03-15 20:07:26'),
(1049, 194, 'Bathroom', '14b5b09e1cce9cc5c408c1ebbb306e509e253cfdb.jpg', '2021-03-15 20:07:08', '2021-03-15 20:07:29'),
(1050, 194, 'Laundry', '186f68c5eb33b07eaded66ccf967444467f66ec67.jpg', '2021-03-15 20:07:08', '2021-03-15 20:07:36'),
(1051, 195, 'Hall', '1b6442e3006243a78737f0382fd896c09b20419ba.jpg', '2021-03-15 20:12:48', '2021-03-15 20:13:44'),
(1052, 195, 'Outside', '1de03ea81d2eba20ddb0400063521c456ebc1aabc.jpg', '2021-03-15 20:12:57', '2021-03-15 20:13:47'),
(1053, 195, 'Outside', '1cf63e4592ace4f94f4ddd2fa6b3fd3fce423c004.jpg', '2021-03-15 20:13:04', '2021-03-15 20:13:48'),
(1054, 195, 'Bathroom', '1cd04e0d5fc8afbd7f87fc181944e69387bf1a78c.jpg', '2021-03-15 20:13:13', '2021-03-15 20:13:51'),
(1055, 195, 'Bedroom', '10d3fc408ba99f5023562e83d7b9e162a3eca9481.jpg', '2021-03-15 20:13:14', '2021-03-15 20:13:54'),
(1056, 196, 'Bedroom', '182ac9d488d8087fb3b09d3b00277f5465ba39eb1.jpg', '2021-03-15 20:20:06', '2021-03-15 20:21:13'),
(1057, 196, 'Outside', '171f2f1fa97128f361cecbb84a22a84205572da6b.jpg', '2021-03-15 20:20:15', '2021-03-15 20:21:02'),
(1058, 196, 'Outside', '10e44bf5fb3eb06bc32188d950d76e15fa877e0cd.jpg', '2021-03-15 20:20:33', '2021-03-15 20:21:00'),
(1059, 196, 'Bathroom', '195b570cd53b6296d84b8f12901639e56f600ba37.jpg', '2021-03-15 20:20:33', '2021-03-15 20:20:42'),
(1060, 196, 'Hall', '1c315ba5b57f9a9b6ee834c6eb2954c645d791ed8.jpg', '2021-03-15 20:20:34', '2021-03-15 20:20:57'),
(1061, 197, 'Hall', '1a89bf76357eaf4d5af79bf83212bdf8a8561a418.jpg', '2021-03-15 20:26:18', '2021-03-15 20:27:29'),
(1062, 197, 'Outside', '111bf116df01cb4d3cf67ee380d1b1c80cf8d7c67.jpg', '2021-03-15 20:27:10', '2021-03-15 20:27:31'),
(1063, 197, 'Bathroom', '1acfec11400d5d3d002540732a89adb8dead27b3c.jpg', '2021-03-15 20:27:10', '2021-03-15 20:27:33'),
(1064, 197, 'Bedroom', '13567311f473b7acbe9305dc0e4809aef13b20e2a.jpg', '2021-03-15 20:27:10', '2021-03-15 20:27:35'),
(1065, 197, 'Outside', '123b6a6d371bdf1db1fad249d5adc6689695c691e.jpg', '2021-03-15 20:27:22', '2021-03-15 20:27:37'),
(1066, 198, NULL, '16adaa4f8ccff45d6819cd6751f727b717df27337.jpg', '2021-03-15 20:30:10', '2021-03-15 20:30:10'),
(1067, 198, 'Stairs', '157953a7c7ef261f4688ff1731f3ff712a9c9464d.jpg', '2021-03-15 20:30:20', '2021-03-15 20:30:44'),
(1068, 198, 'Bedroom', '1224ec5e513e28428c4033c9497b8b1626b207065.jpg', '2021-03-15 20:30:34', '2021-03-15 20:30:45'),
(1069, 198, 'Bathroom', '1393f0cdf8b67cd5f45e87971e54d427645e39027.jpg', '2021-03-15 20:30:34', '2021-03-15 20:30:48'),
(1070, 198, 'Bedroom', '10718de2540f0326244ea8851a1603ae9692265b0.jpg', '2021-03-15 20:30:34', '2021-03-15 20:30:52'),
(1071, 199, 'Hall', '1549130a055df9e0c2479dbed8b1b93a04bd577f5.jpg', '2021-03-15 20:36:38', '2021-03-15 20:38:17'),
(1072, 199, 'Kitchen', '1779f294a021ca033f7e2b7d5f89177a915882b64.jpg', '2021-03-15 20:36:52', '2021-03-15 20:38:20'),
(1073, 199, 'Bathroom', '1936397f82da1062236632939c89e558f26ee5670.jpg', '2021-03-15 20:37:03', '2021-03-15 20:38:23'),
(1074, 199, 'Bedroom', '12cbf511dc97133b788695d87e1741c77c759b252.jpg', '2021-03-15 20:37:03', '2021-03-15 20:38:25'),
(1075, 199, 'Outside', '1d8e0482c43d796723d34d5ca9894f287b0cbefef.jpg', '2021-03-15 20:37:27', '2021-03-15 20:38:28'),
(1076, 200, 'Hall', '1d0e782df6c4da02480feab2fbba65e249a1d7700.jpg', '2021-03-15 20:46:21', '2021-03-15 20:47:14'),
(1077, 200, 'Outside', '1e53a0d31ff01a10a0e8264b05a35b2127d5ad931.jpg', '2021-03-15 20:46:36', '2021-03-15 20:47:18'),
(1078, 200, 'Kitchen', '185f38944752e7013e1858d2af913bc2378c19b83.jpg', '2021-03-15 20:46:48', '2021-03-15 20:48:46'),
(1079, 200, 'Bedroom', '1a65e301c5cdce77d524662a2b3613d5182c68bf8.jpg', '2021-03-15 20:46:48', '2021-03-15 20:48:49'),
(1080, 200, 'Kitchen', '185bc3f244f00394e571e81d5f772ae4b1b236b2d.jpg', '2021-03-15 20:47:05', '2021-03-15 20:48:53'),
(1081, 201, 'Bedroom', '1dc50dbd00ddd9e9e39d228ad98c1acb11b78f3cd.jpg', '2021-03-15 21:04:25', '2021-03-15 21:07:00'),
(1082, 201, 'Bathroom', '1c36c718c733475f1e94eaf37fe7b46d57bcb1fc7.jpg', '2021-03-15 21:04:47', '2021-03-15 21:07:07'),
(1083, 201, 'Kitchen', '11c60a27c48eee6bcccc6ccbb780c1610ed15611c.jpg', '2021-03-15 21:04:55', '2021-03-15 21:07:13'),
(1084, 201, 'Hall', '1f25129f1a5c74e68220e65c835b0ecca09ac9019.jpg', '2021-03-15 21:05:09', '2021-03-15 21:07:18'),
(1085, 201, 'Outside', '13307050e229af2c770611d5d89e07cced522628f.jpg', '2021-03-15 21:05:22', '2021-03-15 21:07:20'),
(1086, 202, 'Bedroom', '1337b9b0c68685d89fd44e55559b0f3972bd7b19e.jpg', '2021-03-15 21:14:32', '2021-03-15 21:15:47'),
(1087, 202, 'Kitchen', '11feda238e926f245ccefa98270e77953d153dd88.jpg', '2021-03-15 21:15:04', '2021-03-15 21:15:48'),
(1088, 202, 'Outside', '1bf6f1e8473d05347b988ccad2884322d6b5db8f0.jpg', '2021-03-15 21:15:17', '2021-03-15 21:15:50'),
(1089, 202, 'Hall', '1faf1978371ea2feffddff606bed1f5fec91f3e20.jpg', '2021-03-15 21:15:30', '2021-03-15 21:16:00'),
(1090, 202, 'Bathroom', '148ffbeb303aa0ae354d35bfab42e6f9b5ab0dfea.jpg', '2021-03-15 21:15:42', '2021-03-15 21:16:02'),
(1091, 203, 'Outside', '18502d7550fdf7f5e327bef132459b16e85cfbc38.jpg', '2021-03-15 21:19:52', '2021-03-15 21:21:50'),
(1092, 203, 'Kitchen', '18710feef4146782b71875cea45352e03b75cda90.jpg', '2021-03-15 21:20:07', '2021-03-15 21:21:53'),
(1093, 203, 'Hall', '1a7f99d076f74a26bfcb27c4fd41b17ae756ae287.jpg', '2021-03-15 21:20:19', '2021-03-15 21:21:58'),
(1094, 203, 'Bathroom', '16ec50370e1157343cac470a3f3dfb4be30121999.jpg', '2021-03-15 21:20:30', '2021-03-15 21:22:00'),
(1095, 203, 'Bedroom', '1c336d4b64ca56047647e4154c097f0c2e2d9d406.jpg', '2021-03-15 21:20:50', '2021-03-15 21:22:03'),
(1096, 204, 'Hall', '1dbbf213f4744f11b44ee3fe0f2791acc17d8209b.jpg', '2021-03-15 21:25:21', '2021-03-15 21:26:44'),
(1097, 204, 'Outside', '1bc479f7ce0519e493524a97fa35ffa4ce10fd0b8.jpg', '2021-03-15 21:25:33', '2021-03-15 21:26:46'),
(1098, 204, 'Kitchen', '16f3fb8f65e78bc82d12a6cb70b2aaa23d3d65d00.jpg', '2021-03-15 21:25:49', '2021-03-15 21:26:48'),
(1099, 204, 'Bathroom', '169c45dd2ded3d6822909f0bfac7a2cc38fdbb89c.jpg', '2021-03-15 21:26:22', '2021-03-15 21:26:51'),
(1100, 204, 'Bedroom', '133d70c1a32941e70fd43fbe1da95fdb8c88bd448.jpg', '2021-03-15 21:26:36', '2021-03-15 21:26:54'),
(1101, 205, 'Kitchen', '12e5b6a008dd9e293c77e2243e5cdbcf324e16e5f.jpg', '2021-03-15 21:37:15', '2021-03-15 21:38:23'),
(1102, 205, 'Bedroom', '1a785dd33219d947805110984c3c2b33eff9e9fcd.jpg', '2021-03-15 21:37:34', '2021-03-15 21:38:25'),
(1103, 205, 'Outside', '1caa829b3c257a540f0a4bcddf3770cf536587680.jpg', '2021-03-15 21:37:34', '2021-03-15 21:38:26'),
(1104, 205, 'Bathroom', '196d7c24113dff537522fb056c013b4bbd8786c61.jpg', '2021-03-15 21:38:07', '2021-03-15 21:38:30'),
(1105, 205, 'Hall', '1e39e2e83f97d01a227af931a71eeec29022b6fa0.jpg', '2021-03-15 21:38:19', '2021-03-15 21:38:35'),
(1106, 206, 'Kitchen', '1e2a8dec5f2f058f91d29496311702722627ccf89.jpg', '2021-03-15 21:45:27', '2021-03-15 21:47:51'),
(1107, 206, 'Bedroom', '196e355c02f269fcd75042ddaa8a8eef330c6d60e.jpg', '2021-03-15 21:45:54', '2021-03-15 21:47:54'),
(1108, 206, 'Hall', '15c9a618055cdbc5cebe9267e56261a2249be61c5.jpg', '2021-03-15 21:45:54', '2021-03-15 21:47:57'),
(1109, 206, 'Bathroom', '13af78a65e5067598540bed0b94fb5bdf28907baa.jpg', '2021-03-15 21:46:28', '2021-03-15 21:48:00'),
(1110, 206, 'Outside', '1731bd0ac8f4308fb7c5526716205005a29c6645b.jpg', '2021-03-15 21:46:42', '2021-03-15 21:48:02'),
(1111, 207, 'Outside', '1790641da390bd707201169b5d08427cbf49ea1a1.jpg', '2021-03-15 21:53:52', '2021-03-15 21:54:45'),
(1112, 207, 'Kitchen', '170154baf7be4d1faa8ce1e1b7063190ec13bba75.jpg', '2021-03-15 21:54:06', '2021-03-15 21:54:48'),
(1113, 207, 'Bedroom', '122c24b296d094f35f2019a55aee3000c67742094.jpg', '2021-03-15 21:54:29', '2021-03-15 21:54:51'),
(1114, 207, 'Hall', '1540a04ba6d67ae31843192ab03bf20c627cc0a54.jpg', '2021-03-15 21:54:29', '2021-03-15 21:54:57'),
(1115, 207, 'Bathroom', '1b17f7ae06a7d71370092731a5acf92869575fe48.jpg', '2021-03-15 21:54:42', '2021-03-15 21:54:59'),
(1116, 208, 'Outside', '1769d233f9f36306783369cf7e01c7549addb5d3f.jpg', '2021-03-15 22:04:34', '2021-03-15 22:06:16'),
(1117, 208, 'Outside', '18598052916bb2fdd3ca3951e3cf2e8fdfe60dd13.jpg', '2021-03-15 22:04:50', '2021-03-15 22:06:18'),
(1118, 208, 'Bathroom', '1481d19148ae8b322497da920ab1386527fd20292.jpg', '2021-03-15 22:04:56', '2021-03-15 22:06:20'),
(1119, 208, 'Hall', '17c1caf355ca5494b6b0abf8cb5bf312baf1226aa.jpg', '2021-03-15 22:05:13', '2021-03-15 22:06:24'),
(1120, 208, 'Bedroom', '1ca20e4c00b897d09fa21f4a5c04244aa402e70fe.jpg', '2021-03-15 22:05:34', '2021-03-15 22:06:26'),
(1121, 209, 'Bedroom', '1b9eae46efec8d405fdab7fc4c7b2d00dcdd482c1.jpg', '2021-03-15 22:11:37', '2021-03-15 22:12:48'),
(1122, 209, 'Hall', '1daef2fd71fc96069494e01d96070c1d775ecb30a.jpg', '2021-03-15 22:12:42', '2021-03-15 22:12:54'),
(1123, 209, 'Outside', '18603cd5637820dfc7ef7d73b6ff13867dc0c5c12.jpg', '2021-03-15 22:12:43', '2021-03-15 22:12:56'),
(1124, 209, 'Bathroom', '15abec3bee1e77c830240149ef1741ca948f8fe87.jpg', '2021-03-15 22:12:43', '2021-03-15 22:12:58'),
(1125, 209, 'Outside', '166fdd557467893b0106898e3ee04e19af2c03077.jpg', '2021-03-15 22:13:22', '2021-03-15 22:13:26'),
(1126, 210, 'Outside', '15f10f041be8599af096eb65380f13265d908aca8.jpg', '2021-03-15 22:21:02', '2021-03-15 22:22:29'),
(1127, 210, 'Outside', '132e8a9ca0a805ee14e3332efb526a60a4aee3ff3.jpg', '2021-03-15 22:21:31', '2021-03-15 22:22:44'),
(1128, 210, 'Outside With pool', '178b621d355c1088acc9238563cf138845e7e7aeb.jpg', '2021-03-15 22:21:31', '2021-03-15 22:25:24'),
(1129, 210, 'Bedroom', '1d9344f940ab002327470c382a80f9b18bd080cbe.jpg', '2021-03-15 22:21:31', '2021-03-15 22:25:29'),
(1130, 210, 'Bathroom', '1b6e9ec37a3ec50f3cc841ffd7a57a4c95090aa8c.jpg', '2021-03-15 22:21:32', '2021-03-15 22:25:51'),
(1131, 211, NULL, '1b681f9d6e206141a84d56a1decc86a9383cc2cd5.jpg', '2021-03-15 22:31:58', '2021-03-15 22:31:58'),
(1133, 211, 'Laundry', '1b20fca946fb272e01635d3fe822bd03d932fcf1c.jpg', '2021-03-15 22:32:14', '2021-03-15 22:32:58'),
(1134, 211, 'Outside', '113d7bb4a2c08cea4782d252cc8eeb8fe0d82b96c.jpg', '2021-03-15 22:32:28', '2021-03-15 22:33:00'),
(1135, 211, 'Bathroom', '1fad8c26b05f9fced46b496e5d47723a02bf9ff5e.jpg', '2021-03-15 22:32:41', '2021-03-15 22:33:04'),
(1136, 211, 'Hall', '1135daf70da41c4f04bcf2c6c1724b6de10eb48f9.jpg', '2021-03-15 22:32:52', '2021-03-15 22:33:09'),
(1137, 212, 'Outside', '19613cf35667664735f6a80723f18d5f3df429a63.jpg', '2021-03-15 22:37:23', '2021-03-15 22:38:27'),
(1138, 212, 'Bedroom', '1c65f9921aa51494ecb5be01723977ba98eba4618.jpg', '2021-03-15 22:37:38', '2021-03-15 22:38:28'),
(1139, 212, 'Outside', '1f5fa6d39fac1fff223cbd725f364439df5f5df19.jpg', '2021-03-15 22:37:52', '2021-03-15 22:38:30'),
(1140, 212, 'Outside With pool', '1b844c9db60ee92ef5712caca16d27be134ed3e58.jpg', '2021-03-15 22:38:12', '2021-03-15 22:38:32'),
(1141, 212, 'Hall', '142409e6dd4d8807a3efd25e2f2a1666e6291e984.jpg', '2021-03-15 22:38:24', '2021-03-15 22:38:36'),
(1142, 213, 'Bedroom', '10a42499384a68440a50919829222be7720ab364a.jpg', '2021-03-15 22:44:15', '2021-03-15 22:45:43'),
(1143, 213, 'Hall', '137f4ec4f697583f1a34ddf84ae1407e99f4ccfb5.jpg', '2021-03-15 22:45:01', '2021-03-15 22:45:47'),
(1144, 213, 'Shared gym', '1c050fc4b6a6a5e97d96b7a02b41e7fc087649229.jpg', '2021-03-15 22:45:01', '2021-03-15 22:45:56'),
(1145, 213, 'Stairs', '1314f7ddb9313e5ebca1f939f8a749b94f83ba549.jpg', '2021-03-15 22:45:17', '2021-03-15 22:46:01'),
(1146, 213, 'Outside', '1f14556d174cd597f76f842335210cee7a1893345.jpg', '2021-03-15 22:45:39', '2021-03-15 22:46:02'),
(1147, 214, 'Outside', '175371e4796ad53cc97989d13ee0fbecca0637dcd.jpg', '2021-03-15 22:49:22', '2021-03-15 22:50:59'),
(1148, 214, 'Bedroom', '1bcb7bffca3847528f41acc9d330ce9c01f20be8f.jpg', '2021-03-15 22:49:32', '2021-03-15 22:50:57'),
(1149, 214, 'Outside', '169c0eccd40fd8fc7ea9e5c99c27f415a5b446741.jpg', '2021-03-15 22:49:40', '2021-03-15 22:50:56'),
(1150, 214, 'Kitchen', '16432470cc34340a2733fc678e62a3a2062e20837.jpg', '2021-03-15 22:50:16', '2021-03-15 22:50:54'),
(1151, 214, 'Car Park', '1f31dab0ac68ac179d8c730e8e82857d4734dc57b.jpg', '2021-03-15 22:50:35', '2021-03-15 22:50:51'),
(1152, 215, 'Outside With pool', '1600f45c1c0b864f77fb31d353b215597bca9f77e.jpg', '2021-03-15 22:53:15', '2021-03-15 22:53:56'),
(1153, 215, 'Hall', '12bcd9f9708c62b08d8f70e21830055e632c237d7.jpg', '2021-03-15 22:53:51', '2021-03-15 22:54:01'),
(1154, 215, 'Outside', '18d99ed2b14ef943a509879795b55a3e341030dde.jpg', '2021-03-15 22:53:52', '2021-03-15 22:54:04'),
(1155, 215, 'Stairs', '1d39a95f29e7e4836681e40fc4a26506d78fc399c.jpg', '2021-03-15 22:54:41', '2021-03-15 22:55:01'),
(1156, 215, 'Outside', '1f27cd1c47ba7f96b5a2d2409468f046aeb2c6763.jpg', '2021-03-15 22:54:53', '2021-03-15 22:55:03'),
(1157, 216, 'Outside', '1f368f33af3434e849a4acb05468fb210dab071fe.jpg', '2021-03-15 22:58:16', '2021-03-15 22:59:25'),
(1158, 216, 'Hall', '1074d3dbdc67d7a10ca0c1a6ed8ac85e1ff2a015a.jpg', '2021-03-15 22:58:42', '2021-03-15 22:59:29'),
(1159, 216, 'Kitchen', '15e5c674afdc6597ad62c1737d5b96aac1e269779.jpg', '2021-03-15 22:59:01', '2021-03-15 22:59:32'),
(1160, 216, 'Bedroom', '159c854c8ef05e7b64381cf81f8bad83178b32502.jpg', '2021-03-15 22:59:01', '2021-03-15 22:59:36'),
(1161, 216, 'Bathroom', '1d0972aad81e7eb9bf437863fd4e7232c8d0fba25.jpg', '2021-03-15 22:59:21', '2021-03-15 22:59:39'),
(1162, 218, 'Hall', '15229567d0efd422c9f0963cdf5893769e7c4fa56.jpg', '2021-03-19 16:12:55', '2021-03-19 16:13:17'),
(1163, 218, 'Outside', '1cac1311b930153aaaf3c24bdacf940fbaeecafae.jpg', '2021-03-19 16:13:09', '2021-03-19 16:13:21'),
(1164, 218, 'Kitchen', '18cf5350356fb106b17e7d88b7b61da82ab549f7b.jpg', '2021-03-19 16:13:10', '2021-03-19 16:13:26'),
(1165, 218, 'Bathroom', '19bca61c6476fecf700c8068fd1fb2017bca4d229.jpg', '2021-03-19 16:13:10', '2021-03-19 16:13:33'),
(1166, 218, 'Bedroom', '167a4635a16d7aead2f2d761915b1a2e4d5f8aa55.jpg', '2021-03-19 16:13:10', '2021-03-19 16:13:38'),
(1167, 219, 'Kitchen', '1ebeab78c81f888e1733c8aab28ecb3faf7b29799.jpg', '2021-03-19 16:20:39', '2021-03-19 16:21:01'),
(1168, 219, 'Outside', '1048771014520202af5a48bdbe116227c57469c84.jpg', '2021-03-19 16:20:54', '2021-03-19 16:21:04'),
(1169, 219, 'Hall', '1b51ed37ccd049d020c1a870cc0678396e9b36255.jpg', '2021-03-19 16:20:54', '2021-03-19 16:21:11'),
(1170, 219, 'Bathroom', '17319a93bd71871b6bc5a6efbf3d8e870558baeac.jpg', '2021-03-19 16:20:54', '2021-03-19 16:21:15'),
(1171, 219, 'Bedroom', '129f7a8f6157b66ddf291d8fe54d5c84fca5be14b.jpg', '2021-03-19 16:20:55', '2021-03-19 16:21:18'),
(1172, 220, 'Hall', '162910cc4d359ec61ecaf791e94663eafa91370b3.jpg', '2021-03-19 16:25:16', '2021-03-19 16:27:34'),
(1173, 220, 'Outside', '1cc411f0ed28e59d7cc185bb263e4fe3ec1b19507.jpg', '2021-03-19 16:25:34', '2021-03-19 16:27:37'),
(1174, 220, 'Kitchen', '18910fa3f3bca6ba7460bca81c68bc4416a614a71.jpg', '2021-03-19 16:25:35', '2021-03-19 16:27:40'),
(1175, 220, 'Bathroom', '162ff5e34dd3a6cd1dbd0dac191d8d54204c278b6.jpg', '2021-03-19 16:25:35', '2021-03-19 16:27:44'),
(1176, 220, 'Bedroom', '1ae30bbbbf39406bc2cc5096bdf0dacf2a5062a23.jpg', '2021-03-19 16:25:35', '2021-03-19 16:27:48'),
(1177, 221, 'Hall', '14cb8574afbf7d09b55c52aff01f1f4b029e0ef80.jpg', '2021-03-19 16:30:28', '2021-03-19 16:30:49'),
(1178, 221, 'Outside', '13a88bd65b1fb94a3c64e9ec969c7d7b5b19bc71d.jpg', '2021-03-19 16:30:41', '2021-03-19 16:30:51'),
(1179, 221, 'Bedroom', '16bd095c0bbcabb911864516fe645bb2b57accc97.jpg', '2021-03-19 16:30:41', '2021-03-19 16:30:53'),
(1180, 221, 'Kitchen', '144b1bb73b363f663c6b37c3c68fb87143ae4aca9.jpg', '2021-03-19 16:30:42', '2021-03-19 16:30:59'),
(1181, 221, 'Bathroom', '19352cd187c4fbff3a2d1c45fd91317ccf9fa63f5.jpg', '2021-03-19 16:30:42', '2021-03-19 16:31:04'),
(1182, 222, 'Kitchen', '18fe06f8a0d6ba16d5b00f972dcb4a722d03e3655.jpg', '2021-03-19 16:33:30', '2021-03-19 16:33:54'),
(1183, 222, 'Hall', '1a74a1a8d6bc886aa5882491bd06ec9f715cf524f.jpg', '2021-03-19 16:33:46', '2021-03-19 16:33:59'),
(1184, 222, 'Bathroom', '19dcb1fa5346fe8ae814bbbbb21b103b003538d9e.jpg', '2021-03-19 16:33:47', '2021-03-19 16:34:01'),
(1185, 222, 'Bedroom', '11162534521b40ab16d2fdb7c30d121480fa4a29d.jpg', '2021-03-19 16:33:47', '2021-03-19 16:34:07'),
(1186, 222, 'Outside', '15acad6ff2606ef7581ace2836d446b9772232db1.jpg', '2021-03-19 16:34:12', '2021-03-19 16:34:16'),
(1187, 223, 'Kitchen', '1f5fa3b1488ddb810b9d98fbabfaa15ff2bd759b2.jpg', '2021-03-19 16:38:08', '2021-03-19 16:38:33'),
(1188, 223, 'Outside', '165d0fcffe70dd5f62f33f67e7757361d1301b963.jpg', '2021-03-19 16:38:22', '2021-03-19 16:38:37'),
(1189, 223, 'Hall', '1f1ead8efe49e3853aecf818c7f6c766d530955ba.jpg', '2021-03-19 16:38:22', '2021-03-19 16:38:42'),
(1190, 223, 'Bathroom', '139f12781f3d86dfcc9e27fbd1b1d56cba7b0a2c6.jpg', '2021-03-19 16:38:22', '2021-03-19 16:38:45'),
(1191, 223, 'Bedroom', '1fa086b927cdcabe21b59651df739aa0214cb8669.jpg', '2021-03-19 16:38:22', '2021-03-19 16:38:47'),
(1192, 224, 'Kitchen', '11ebabf8fda9dfda6f534d1c755996a1d96c77097.jpg', '2021-03-19 16:42:25', '2021-03-19 16:42:55'),
(1193, 224, 'Hall', '17610b58ec7e0bfc6b4373c30e9e3409ed00f8208.jpg', '2021-03-19 16:42:42', '2021-03-19 16:43:10'),
(1194, 224, 'Bathroom', '1e3101abbf40ebeb6d8805d84e5729ac1580ab472.jpg', '2021-03-19 16:42:43', '2021-03-19 16:43:00'),
(1195, 224, 'Bedroom', '148de37a47e7a95160df15577de52fe1a12f9966d.jpg', '2021-03-19 16:42:43', '2021-03-19 16:43:04'),
(1196, 224, 'Outside', '1f87bc6aaed9ab91c02d702235bec5a45032d371d.jpg', '2021-03-19 16:42:43', '2021-03-19 16:43:14'),
(1197, 225, 'Bedroom', '1e3e426548e63248109c529d9b78fee144581641c.jpg', '2021-03-19 16:45:55', '2021-03-19 17:02:45'),
(1198, 225, 'Bathroom', '1af2a5eb7b623d281eaea79b86e38d5e77af3bab2.jpg', '2021-03-19 16:46:09', '2021-03-19 17:02:48'),
(1199, 225, 'Outside', '1f3c3c7b96cfe42aea33c2b93ec0f5ea47045787c.jpg', '2021-03-19 16:46:09', '2021-03-19 17:02:49'),
(1200, 225, 'Hall', '13e622e869865d356c013332b6ebb8df309fac52c.jpg', '2021-03-19 16:46:09', '2021-03-19 17:02:57'),
(1201, 225, 'Kitchen', '12b28fb2b092021c2bf06fd17dce00feea96450c1.jpg', '2021-03-19 16:46:27', '2021-03-19 17:02:59'),
(1202, 226, 'Hall', '11a44138c1de062efa481727b296f5d38e8c2608c.jpg', '2021-03-19 17:29:58', '2021-03-19 17:30:38'),
(1203, 226, 'Kitchen', '1517c53ecdbf0d41006aa852c354d8895482ac32f.jpg', '2021-03-19 17:30:11', '2021-03-19 17:30:41'),
(1204, 226, 'Outside', '13a67466d501ad5f262a7745b6c1628900bc67590.jpg', '2021-03-19 17:30:11', '2021-03-19 17:30:42'),
(1205, 226, 'Bathroom', '1a4b6131d4fb620166fa29b0ee6ae600a4bcdd7f1.jpg', '2021-03-19 17:30:11', '2021-03-19 17:30:46'),
(1206, 226, 'Bedroom', '1bc4148f5866cafc266c74da0ce20329fbea216ba.jpg', '2021-03-19 17:30:11', '2021-03-19 17:30:48'),
(1207, 227, 'Hall', '15d305daa145de0bb8bb1e886c176af027d15156e.jpg', '2021-03-19 17:34:14', '2021-03-19 17:35:16'),
(1208, 227, 'Outside', '10cc994b488311e1516aefedb81da064899c1ef51.jpg', '2021-03-19 17:34:59', '2021-03-19 17:35:19'),
(1209, 227, 'Kitchen', '105306e7be09f612c449cf88356a45b714a99b49b.jpg', '2021-03-19 17:35:09', '2021-03-19 17:35:21'),
(1210, 227, 'Bedroom', '1759519449d493a08fe273d28d583003e8c896c36.jpg', '2021-03-19 17:35:09', '2021-03-19 17:35:23'),
(1211, 227, 'Bathroom', '1f1339440a3278008ed47d8abe6571172dc92f46a.jpg', '2021-03-19 17:35:10', '2021-03-19 17:35:26'),
(1212, 228, 'Outside', '199fd4454fa2dfbd9da3c8d0af04fbbc3c196053c.jpg', '2021-03-19 17:42:18', '2021-03-19 17:43:48'),
(1213, 228, 'Hall', '17d5ea76396836d9da38ff843b237657667c6150b.jpg', '2021-03-19 17:42:32', '2021-03-19 17:43:56'),
(1214, 228, 'Kitchen', '1dcbf4f83cab1a56aeb278e1d33d225fc31edc34b.jpg', '2021-03-19 17:42:32', '2021-03-19 17:44:00'),
(1215, 228, 'Bathroom', '102b628e6034031edfad51a148eaeb78b917a9c79.jpg', '2021-03-19 17:42:32', '2021-03-19 17:44:04'),
(1216, 228, 'Bedroom', '1a59e5765450fb08bba3904965fe3715598481781.jpg', '2021-03-19 17:42:32', '2021-03-19 17:44:07'),
(1217, 229, 'Hall', '14f66e28d8c857737f1e937555305e8b94f50dd3a.jpg', '2021-03-19 18:13:26', '2021-03-19 18:14:19'),
(1218, 229, 'Kitchen', '1cfaaf0ce0e597fc86bca9547d99699b2e968febc.jpg', '2021-03-19 18:13:43', '2021-03-19 18:14:22'),
(1219, 229, 'Bathroom', '1f70a76501b5c5dc17c592d7b92ca107e7d39df16.jpg', '2021-03-19 18:13:43', '2021-03-19 18:14:25'),
(1220, 229, 'Bedroom', '190993a1ed19cba25f8d7065d7aa51d2c64ce1a94.jpg', '2021-03-19 18:13:44', '2021-03-19 18:14:27'),
(1221, 229, 'Outside', '1ee282d9033f5b06576af519c28cd7b2921ce9bf6.jpg', '2021-03-19 18:13:44', '2021-03-19 18:14:29'),
(1222, 230, 'Outside', '1123589565891058132318750117a9a9381961703.jpg', '2021-03-19 18:19:02', '2021-03-19 18:19:32'),
(1223, 230, 'Hall', '1bad256a2fed5782d873f91ecb263f722a10a6560.jpg', '2021-03-19 18:19:21', '2021-03-19 18:19:38'),
(1224, 230, 'Kitchen', '1548274ae3cb5bdf10ac51bf0dbc57a9652c2acb5.jpg', '2021-03-19 18:19:22', '2021-03-19 18:19:40'),
(1225, 230, 'Bathroom', '180c5a9690ac7e40895fbda15ff7970996199f0e7.jpg', '2021-03-19 18:19:22', '2021-03-19 18:19:43'),
(1226, 230, 'Bedroom', '1786e650c7ebb0165c328ae877639f0e891dde188.jpg', '2021-03-19 18:19:22', '2021-03-19 18:19:46'),
(1227, 231, 'Kitchen', '11dc2b3923f61cd51341b69cdaeffb32e18e569fb.jpg', '2021-03-19 18:28:40', '2021-03-19 18:29:27'),
(1228, 231, 'Hall', '131f0c46d0620dab2780d4d6cd4ac26492ec4344e.jpg', '2021-03-19 18:28:57', '2021-03-19 18:29:33'),
(1229, 231, 'Bathroom', '15a097cd32fa344c2b894775c44d8e16fb24c53bf.jpg', '2021-03-19 18:28:57', '2021-03-19 18:29:37'),
(1230, 231, 'Bedroom', '1ac25dc21e3170db62bc34eefbdbbb19c4afcfdec.jpg', '2021-03-19 18:28:57', '2021-03-19 18:29:40'),
(1231, 231, 'Outside', '1e711009f798098b40a59b0d4eb4dcd6af6308486.jpg', '2021-03-19 18:28:58', '2021-03-19 18:29:42'),
(1232, 232, NULL, '10822fc1d7cdcd586bcabf5cf2fb24e739cc19119.jpg', '2021-03-19 18:36:00', '2021-03-19 18:36:00'),
(1233, 232, 'Hall', '1a704e744e0329d4b7fefc09809fe263d67cfb88b.jpg', '2021-03-19 18:36:19', '2021-03-19 18:36:33'),
(1234, 232, 'Bathroom', '19dc81fdc8b966dcf32f7a232727b7257f7d8ffb4.jpg', '2021-03-19 18:36:19', '2021-03-19 18:36:36'),
(1235, 232, 'Kitchen', '1d88b54b0f02b21e7cd4a0dddd01316843a04613d.jpg', '2021-03-19 18:36:19', '2021-03-19 18:36:39'),
(1236, 232, 'Bedroom', '19d73cf96421599b8aac818ee2c76c1b676a0a26c.jpg', '2021-03-19 18:36:19', '2021-03-19 18:36:42'),
(1237, 233, 'Hall', '156bcfdb605a44fedf7ddefec9208d0746b6dbd4c.jpg', '2021-03-19 18:41:01', '2021-03-19 18:41:38'),
(1238, 233, 'Bathroom', '1a07ee8398e316fbb573b01ea5b2e1f29fbcbd413.jpg', '2021-03-19 18:41:17', '2021-03-19 18:41:48'),
(1240, 233, 'Kitchen', '1b093f1f5a660e58b6c801d9a2b30bfb7572735f2.jpg', '2021-03-19 18:41:18', '2021-03-19 18:41:55'),
(1241, 233, 'Outside', '16d68f6b63c1c03b0a3e16f645fbe1f43a35449f6.jpg', '2021-03-19 18:41:18', '2021-03-19 18:41:56'),
(1242, 233, 'Bedroom', '1465990f15fd849f53c39f31fa7db40115f3e425b.jpg', '2021-03-19 18:42:14', '2021-03-19 18:42:20'),
(1243, 234, 'Bedroom', '1c08fcfa81fefffb887fca0788c0f2986a3bfc4c4.jpg', '2021-03-19 19:40:59', '2021-03-19 19:41:56'),
(1244, 234, 'Hall', '137647e6985fe714469e9091617e9e295c72dd13c.jpg', '2021-03-19 19:41:14', '2021-03-19 19:42:01'),
(1245, 234, 'Kitchen', '12eead6e2ab93f48617cf32e9f1db085967c48790.jpg', '2021-03-19 19:41:14', '2021-03-19 19:42:03'),
(1246, 234, 'Bathroom', '188793273b57224b0e1f4ecfbc2342c95280f3e6b.jpg', '2021-03-19 19:41:14', '2021-03-19 19:42:06'),
(1247, 234, 'Outside', '1af8ab6c6ffaa3e28eccba5fd31e03e5c2e4af507.jpg', '2021-03-19 19:41:15', '2021-03-19 19:42:08'),
(1249, 235, 'Outside', '15443503395e2ef6a71c2ebb06d30dc28104b4103.jpg', '2021-03-19 19:48:56', '2021-03-19 19:55:18'),
(1250, 235, 'Bathroom', '145137059c4678cac574fde93eede229900d10e39.jpg', '2021-03-19 19:49:22', '2021-03-19 19:55:21'),
(1251, 235, 'Kitchen', '1af0cbd37d668a56d57a9f9c8e22013a3e524b747.jpg', '2021-03-19 19:49:22', '2021-03-19 19:55:24'),
(1252, 235, 'Hall', '1abb2ca9485a2454e1d6b6e59a1efe8bfe8da2441.jpg', '2021-03-19 19:56:09', '2021-03-19 19:56:36'),
(1253, 235, 'Bedroom', '1bfb17fbc9b4d2b5162990ff98ed250aed38e953c.jpg', '2021-03-19 19:56:09', '2021-03-19 19:56:38'),
(1254, 236, 'Outside', '1ba4dfeb728fc98728da7e5b554be49e420c0a00f.jpg', '2021-03-19 20:04:15', '2021-03-19 20:04:39'),
(1255, 236, 'Kitchen', '10527b98d1a34f434fc35b0c46649b4b07bc558c8.jpg', '2021-03-19 20:04:32', '2021-03-19 20:04:41'),
(1256, 236, 'Bedroom', '13268fddc33a16caf9ac2a0bf99649099e90a0c7d.jpg', '2021-03-19 20:04:32', '2021-03-19 20:04:43'),
(1257, 236, 'Hall', '1230ad8ac05eb79f253ace29611fa03273a215876.jpg', '2021-03-19 20:04:32', '2021-03-19 20:04:47'),
(1258, 236, 'Bathroom', '101a065d481e24cd60b505c4f359e2b598506aac9.jpg', '2021-03-19 20:04:32', '2021-03-19 20:04:49'),
(1259, 217, 'Stairs', '18a5b8325aeb8e6a7259f9bc5fbd46ff5f816f0d5.jpg', '2021-03-19 20:08:39', '2021-03-19 20:09:42'),
(1260, 217, 'Bedroom', '116fe8d9a10cfad10d540679c8fcdde27e272a9a1.jpg', '2021-03-19 20:09:10', '2021-03-19 20:09:51'),
(1261, 217, 'Hall', '18f45b7aceb03d2adb66f7d41c4abd45916aac74d.jpg', '2021-03-19 20:09:10', '2021-03-19 20:10:16'),
(1262, 217, 'Bathroom', '1f8539904942d35081b836912df453129198f5656.jpg', '2021-03-19 20:09:11', '2021-03-19 20:10:24'),
(1263, 217, 'Outside', '193dea7103d79a4212aafe7f60fd69975b79319c5.jpg', '2021-03-19 20:09:11', '2021-03-19 20:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `property_locations`
--

CREATE TABLE `property_locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `digital_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_locations`
--

INSERT INTO `property_locations` (`id`, `property_id`, `digital_address`, `location`, `location_slug`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Cantoment Road, Accra, Ghana', 'cantoment-road-accra-ghana', '5.5718172', '-0.1800807', '2021-02-08 13:16:23', '2021-02-08 13:16:23'),
(2, 2, NULL, 'Osu, Accra, Ghana', 'osu-accra-ghana', '5.5570305', '-0.1762717', '2021-02-08 13:44:30', '2021-02-08 13:44:30'),
(3, 3, NULL, 'Tema, Ghana', 'tema-ghana', '5.7348119', '0.0302354', '2021-02-08 15:20:50', '2021-02-08 15:20:50'),
(4, 4, NULL, 'Labone Crescent, Accra, Ghana', 'labone-crescent-accra-ghana', '5.568260426872612', '-0.17360657804870394', '2021-02-08 15:44:21', '2021-02-08 15:44:21'),
(5, 5, NULL, 'Labadi, Accra, Ghana', 'labadi-accra-ghana', '5.564659199999999', '-0.1565747', '2021-02-08 15:53:54', '2021-02-08 15:53:54'),
(6, 6, NULL, 'East Legon - Trasacco Estate Road, Accra, Ghana', 'east-legon-trasacco-estate-road-accra-ghana', '5.6494177', '-0.1315887', '2021-02-08 16:02:24', '2021-02-08 16:02:24'),
(8, 8, NULL, 'East Legon - Trasacco Estate Road, Accra, Ghana', 'east-legon-trasacco-estate-road-accra-ghana', '5.6494177', '-0.1315887', '2021-02-08 16:30:05', '2021-02-08 16:30:05'),
(9, 9, NULL, 'Amasaman, Ghana', 'amasaman-ghana', '5.7062137', '-0.3019281', '2021-02-08 16:39:18', '2021-02-08 16:39:18'),
(11, 11, NULL, 'Accra, Ghana', 'accra-ghana', '5.6037168', '-0.1869644', '2021-02-08 17:23:13', '2021-02-08 17:23:13'),
(12, 12, NULL, 'Oxford Street, Accra, Ghana', 'oxford-street-accra-ghana', '5.5572854', '-0.1824488', '2021-02-08 17:39:05', '2021-02-08 17:39:05'),
(13, 13, NULL, 'Joy Lane, Accra, Ghana', 'joy-lane-accra-ghana', '5.5729204', '-0.140797', '2021-02-08 18:07:21', '2021-02-08 18:07:21'),
(15, 15, NULL, 'Tema, Ghana', 'tema-ghana', '5.7348119', '0.0302354', '2021-02-09 14:28:13', '2021-02-09 14:28:13'),
(17, 17, NULL, 'James Town, Accra, Ghana', 'james-town-accra-ghana', '5.5341312', '-0.2139151', '2021-02-09 15:05:41', '2021-02-09 15:05:41'),
(18, 18, NULL, 'Medie, Ghana', 'medie-ghana', '5.7588594', '-0.3207299', '2021-02-09 15:18:26', '2021-02-09 15:18:26'),
(19, 19, NULL, 'Madina, Ghana', 'madina-ghana', '5.6731273', '-0.1663851', '2021-02-09 15:36:53', '2021-02-09 15:36:53'),
(20, 20, NULL, 'Prampram, Ghana', 'prampram-ghana', '5.726957589689396', '0.11695014788513092', '2021-02-09 15:59:58', '2021-02-09 15:59:58'),
(21, 21, NULL, 'Adenta - Dodowa Road, Madina, Ghana', 'adenta-dodowa-road-madina-ghana', '5.722678808828571', '-0.1619502851806609', '2021-02-09 16:44:33', '2021-02-09 16:44:33'),
(23, 23, NULL, 'Akutuase, Ghana', 'akutuase-ghana', '5.237312001333237', '-1.4509225478851318', '2021-02-09 18:30:13', '2021-02-09 18:30:13'),
(24, 24, NULL, 'Tsui Bleoo Road, Accra, Ghana', 'tsui-bleoo-road-accra-ghana', '5.600025', '-0.11354', '2021-02-09 19:09:30', '2021-02-09 19:09:30'),
(25, 25, NULL, 'Kumasi, Ghana', 'kumasi-ghana', '6.6666004', '-1.6162709', '2021-02-10 09:56:47', '2021-02-10 09:56:47'),
(27, 28, NULL, 'Ahwerase, Ghana', 'ahwerase-ghana', '5.8174433', '-0.4001495', '2021-02-10 17:09:02', '2021-02-10 17:09:02'),
(28, 29, NULL, 'Apam, Ghana', 'apam-ghana', '5.2941315', '-0.7390245', '2021-02-10 17:35:31', '2021-02-10 17:35:31'),
(30, 32, NULL, 'Labadi, Accra, Ghana', 'labadi-accra-ghana', '5.564979548173501', '-0.15680000555724272', '2021-02-10 18:11:48', '2021-02-10 18:11:48'),
(31, 33, NULL, 'North Legon, Ghana', 'north-legon-ghana', '5.682794122191448', '-0.1922401859832812', '2021-02-11 09:40:18', '2021-02-11 09:40:18'),
(35, 37, NULL, 'Tema, Ghana', 'tema-ghana', '5.73528160590852', '0.030063738623056224', '2021-02-11 14:41:00', '2021-02-11 14:41:00'),
(36, 26, NULL, 'Amasaman, Ghana', 'amasaman-ghana', '5.7048258609014955', '-0.30069428385315566', '2021-02-11 17:19:46', '2021-02-11 17:19:46'),
(38, 38, NULL, 'Pokoasi, Ghana', 'pokoasi-ghana', '5.70026232421691', '-0.30239986508178607', '2021-02-11 18:40:37', '2021-02-11 18:40:37'),
(39, 39, NULL, 'Achimota, Ghana', 'achimota-ghana', '5.612781', '-0.234345', '2021-02-11 18:58:31', '2021-02-11 18:58:31'),
(40, 40, NULL, 'Adjiringanor, Madina, Ghana', 'adjiringanor-madina-ghana', '5.6510376', '-0.1354586', '2021-02-11 19:17:08', '2021-02-11 19:17:08'),
(41, 42, NULL, 'Ayawaso, Accra, Ghana', 'ayawaso-accra-ghana', '5.614682226789028', '-0.19659389206543088', '2021-02-11 19:39:19', '2021-02-11 19:39:39'),
(42, 43, NULL, 'Osu, Accra, Ghana', 'osu-accra-ghana', '5.5570305', '-0.1762717', '2021-02-12 12:13:48', '2021-02-12 12:13:48'),
(43, 44, NULL, 'East Legon, Accra, Ghana', 'east-legon-accra-ghana', '5.635304927996584', '-0.16089786004943818', '2021-02-12 12:30:06', '2021-02-12 12:30:06'),
(44, 46, NULL, 'Nima, Accra, Ghana', 'nima-accra-ghana', '5.582537697753358', '-0.19884645344237617', '2021-02-12 12:52:04', '2021-02-12 12:52:04'),
(45, 47, NULL, 'Old Pig Farm Street, Accra, Ghana', 'old-pig-farm-street-accra-ghana', '5.59926600940184', '-0.1999968343933145', '2021-02-12 13:09:46', '2021-02-12 13:09:46'),
(46, 48, NULL, 'Awoshie, Ghana', 'awoshie-ghana', '5.5869388140636325', '-0.2769103484100244', '2021-02-12 13:17:21', '2021-02-12 13:17:21'),
(47, 49, NULL, 'Achimota Road, Accra, Ghana', 'achimota-road-accra-ghana', '5.601272123926063', '-0.19907235662231848', '2021-02-12 13:24:37', '2021-02-12 13:24:37'),
(48, 50, NULL, 'Teshie Rasta Road, Accra, Ghana', 'teshie-rasta-road-accra-ghana', '5.582516567707036', '-0.13069218095092872', '2021-02-12 13:31:22', '2021-02-12 13:31:22'),
(49, 51, NULL, 'Awoshie, Ghana', 'awoshie-ghana', '5.586607799999999', '-0.2772644', '2021-02-12 13:37:07', '2021-02-12 13:37:07'),
(50, 52, NULL, 'Ablekuma, Accra, Ghana', 'ablekuma-accra-ghana', '5.5511744', '-0.2526163', '2021-02-12 13:44:36', '2021-02-12 13:44:36'),
(51, 53, NULL, 'Lapaz, Ghana', 'lapaz-ghana', '5.609742404023017', '-0.25094701904907923', '2021-02-12 13:48:42', '2021-02-12 13:48:42'),
(52, 54, NULL, 'Nungua Street, Ghana', 'nungua-street-ghana', '5.671506263210242', '-0.0796487005248947', '2021-02-12 13:54:38', '2021-02-12 13:54:38'),
(53, 55, NULL, 'Dansoman, Accra, Ghana', 'dansoman-accra-ghana', '5.542982630746991', '-0.256617601852418', '2021-02-12 14:00:02', '2021-02-12 14:00:02'),
(54, 56, NULL, 'Odorkor, Accra, Ghana', 'odorkor-accra-ghana', '5.581117734889918', '-0.26291600422974515', '2021-02-12 14:06:54', '2021-02-12 14:06:54'),
(55, 57, NULL, 'Adabraka, Accra, Ghana', 'adabraka-accra-ghana', '5.5630028', '-0.2115709', '2021-02-12 14:54:55', '2021-02-12 14:54:55'),
(56, 58, NULL, 'Ayawaso, Accra, Ghana', 'ayawaso-accra-ghana', '5.614223099999999', '-0.1963364', '2021-02-12 15:01:54', '2021-02-12 15:01:54'),
(57, 59, NULL, 'Tse Addo High Street, Accra, Ghana', 'tse-addo-high-street-accra-ghana', '5.586579291212292', '-0.14080837486878162', '2021-02-12 15:17:38', '2021-02-12 15:17:38'),
(58, 60, NULL, 'Labadi, Accra, Ghana', 'labadi-accra-ghana', '5.564659199999999', '-0.1565747', '2021-02-12 15:25:31', '2021-02-12 15:25:31'),
(59, 61, NULL, 'Adjiringanor, Madina, Ghana', 'adjiringanor-madina-ghana', '5.6510376', '-0.1354586', '2021-02-12 15:42:50', '2021-02-12 15:42:50'),
(60, 62, NULL, 'Accra, Ghana', 'accra-ghana', '5.6037168', '-0.1869644', '2021-02-12 15:57:33', '2021-02-12 15:57:33'),
(61, 63, NULL, 'Tsui Bleoo Road, Accra, Ghana', 'tsui-bleoo-road-accra-ghana', '5.600313295970178', '-0.1132610502624476', '2021-02-12 16:05:50', '2021-02-12 16:05:50'),
(62, 64, NULL, 'Akutuase, Ghana', 'akutuase-ghana', '5.237376105599642', '-1.4512873283111571', '2021-02-12 17:42:57', '2021-02-12 17:42:57'),
(63, 65, NULL, 'Adabraka, Accra, Ghana', 'adabraka-accra-ghana', '5.5630028', '-0.2115709', '2021-02-12 17:47:44', '2021-02-12 17:47:44'),
(64, 66, NULL, 'Ayawaso, Accra, Ghana', 'ayawaso-accra-ghana', '5.614223099999999', '-0.1963364', '2021-02-12 17:52:41', '2021-02-12 17:52:41'),
(65, 67, NULL, 'Buduburam, Ghana', 'buduburam-ghana', '5.5247986', '-0.4738293', '2021-02-12 17:58:47', '2021-02-12 17:58:47'),
(66, 68, NULL, 'Kotobabi, Accra, Ghana', 'kotobabi-accra-ghana', '5.5997705', '-0.2045388', '2021-02-12 18:10:45', '2021-02-12 18:10:45'),
(67, 69, NULL, 'Accra New Town, Accra, Ghana', 'accra-new-town-accra-ghana', '5.578519696847361', '-0.21586781534423505', '2021-02-12 18:26:55', '2021-02-12 18:26:55'),
(68, 70, NULL, 'Dobro, nsawam', 'dobro-nsawam', NULL, NULL, '2021-02-12 18:46:46', '2021-02-12 18:46:46'),
(69, 71, NULL, 'Dodowa, Ghana', 'dodowa-ghana', '5.8828665', '-0.098043', '2021-02-12 18:54:24', '2021-02-12 18:54:24'),
(70, 72, NULL, 'Tema, Ghana', 'tema-ghana', '5.7348119', '0.0302354', '2021-02-12 19:14:58', '2021-02-12 19:14:58'),
(71, 73, NULL, 'Darkuman, Ghana', 'darkuman-ghana', '5.590815767239315', '-0.2502804288360516', '2021-02-12 19:29:42', '2021-02-12 19:29:42'),
(72, 77, NULL, 'Labone, Accra, Ghana', 'labone-accra-ghana', '5.5682665', '-0.1717396', '2021-02-15 14:57:13', '2021-02-15 14:57:13'),
(73, 78, NULL, 'Kaneshie, Accra, Ghana', 'kaneshie-accra-ghana', '5.576118', '-0.2444038', '2021-02-15 15:50:19', '2021-02-15 15:50:19'),
(74, 79, NULL, 'Taifa - Burkina Faso Road, Taifa, Ghana', 'taifa-burkina-faso-road-taifa-ghana', '5.665285283562428', '-0.2525681669342128', '2021-02-15 16:12:23', '2021-02-15 16:12:23'),
(75, 80, NULL, 'Prampram, Ghana', 'prampram-ghana', '5.725036035060504', '0.11611329867248443', '2021-02-15 17:10:16', '2021-02-15 17:10:16'),
(76, 81, NULL, 'Weija, Ghana', 'weija-ghana', '5.567110142344956', '-0.3345506836059653', '2021-02-15 17:28:05', '2021-02-15 17:28:05'),
(77, 82, NULL, 'banana inn accra', 'banana-inn-accra', '5.6142332999999995', '-0.19634549999999998', '2021-02-15 18:16:47', '2021-02-15 18:16:47'),
(78, 76, NULL, 'Osu, Accra, Ghana', 'osu-accra-ghana', '5.5570305', '-0.1762717', '2021-02-16 09:36:40', '2021-02-16 09:36:40'),
(79, 75, NULL, 'Oxford Street, Accra, Ghana', 'oxford-street-accra-ghana', '5.557253364771634', '-0.18223422327880545', '2021-02-16 09:49:35', '2021-02-16 09:49:35'),
(80, 45, NULL, 'Tse Addo High Street, Accra, Ghana', 'tse-addo-high-street-accra-ghana', '5.586504546071624', '-0.14084056137696033', '2021-02-16 13:13:50', '2021-02-16 13:13:50'),
(81, 74, NULL, 'Prampram, Ghana', 'prampram-ghana', '5.7247051', '0.1167463', '2021-02-16 16:11:27', '2021-02-16 16:11:27'),
(82, 83, NULL, 'Odawna Close, Accra, Ghana', 'odawna-close-accra-ghana', '5.558429089039813', '-0.2161835502624454', '2021-02-16 16:16:19', '2021-02-16 16:16:19'),
(83, 86, NULL, 'Spintex Road, Accra, Ghana', 'spintex-road-accra-ghana', '5.63053506499042', '-0.14288203491821472', '2021-03-01 04:11:12', '2021-03-01 04:11:12'),
(84, 87, NULL, 'Tema, Ghana', 'tema-ghana', '5.7384734608149754', '0.03569637755433064', '2021-03-01 04:52:02', '2021-03-01 04:52:02'),
(85, 88, NULL, 'Nsawam, Ghana', 'nsawam-ghana', '5.819495694171575', '-0.35334057885131553', '2021-03-03 14:50:23', '2021-03-03 14:50:23'),
(86, 89, NULL, 'Medie, Ghana', 'medie-ghana', '5.7588594', '-0.3207299', '2021-03-03 15:15:42', '2021-03-03 15:15:42'),
(87, 90, NULL, 'Dobro, nsawam', 'dobro-nsawam', '5.5574528', '-0.2097152', '2021-03-03 15:26:38', '2021-03-03 15:26:38'),
(88, 91, NULL, 'Airport Residential Area, Accra, Ghana', 'airport-residential-area-accra-ghana', '5.606467735567308', '-0.18615421719665237', '2021-03-04 11:07:13', '2021-03-04 11:07:13'),
(89, 92, NULL, 'Cantoment Road, Accra, Ghana', 'cantoment-road-accra-ghana', '5.572244325656754', '-0.1804562092620876', '2021-03-04 11:16:24', '2021-03-04 11:16:24'),
(90, 93, NULL, 'Roman Ridge, Accra, Ghana', 'roman-ridge-accra-ghana', '5.6024006', '-0.1951648', '2021-03-04 11:22:11', '2021-03-04 11:22:11'),
(91, 94, NULL, 'Dzorwulu, Accra, Ghana', 'dzorwulu-accra-ghana', '5.6141232', '-0.1956471', '2021-03-04 11:27:40', '2021-03-04 11:27:40'),
(92, 95, NULL, 'West Legon, Accra, Ghana', 'west-legon-accra-ghana', '5.649500099999998', '-0.20951931586913775', '2021-03-04 11:34:36', '2021-03-04 11:34:36'),
(93, 96, NULL, 'West Legon, Accra, Ghana', 'west-legon-accra-ghana', '5.6495001', '-0.2100343', '2021-03-04 11:42:56', '2021-03-04 11:42:56'),
(94, 97, NULL, 'Roman Ridge, Accra, Ghana', 'roman-ridge-accra-ghana', '5.6024006', '-0.1951648', '2021-03-04 11:52:27', '2021-03-04 11:52:27'),
(95, 98, NULL, 'Abelemkpe, Accra, Ghana', 'abelemkpe-accra-ghana', '5.6087022', '-0.2164185', '2021-03-04 12:19:52', '2021-03-04 12:19:52'),
(96, 99, NULL, 'North Legon Road, Accra, Ghana', 'north-legon-road-accra-ghana', '5.6681436', '-0.182026', '2021-03-04 12:29:46', '2021-03-04 12:29:46'),
(97, 100, NULL, 'Takoradi, Ghana', 'takoradi-ghana', '4.9015794', '-1.7830973', '2021-03-04 12:43:32', '2021-03-04 12:43:32'),
(98, 101, NULL, 'Akorley-dzor, Tema, Ghana', 'akorley-dzor-tema-ghana', '5.643165900000001', '-0.0163231', '2021-03-04 12:57:24', '2021-03-04 12:57:24'),
(99, 102, NULL, 'Achimota, Ghana', 'achimota-ghana', '5.612781', '-0.234345', '2021-03-04 13:15:45', '2021-03-04 13:15:45'),
(100, 103, NULL, 'Ablekuma Abase Road, Ablekuma New Town, Ghana', 'ablekuma-abase-road-ablekuma-new-town-ghana', '5.63389940233447', '-0.3153325539672891', '2021-03-04 13:32:11', '2021-03-04 13:32:11'),
(101, 104, NULL, 'Sunkwa Road, Accra, Ghana', 'sunkwa-road-accra-ghana', '5.564274199217072', '-0.18548534232788016', '2021-03-04 14:06:33', '2021-03-04 14:06:33'),
(102, 105, NULL, 'Abeka Junction, Accra, Ghana', 'abeka-junction-accra-ghana', '5.5771136', '-0.180224', '2021-03-04 15:09:56', '2021-03-04 15:09:56'),
(103, 106, NULL, 'Osu, Accra, Ghana', 'osu-accra-ghana', '5.5573722091419535', '-0.17817070398253643', '2021-03-04 15:35:22', '2021-03-04 15:35:22'),
(104, 107, NULL, 'Alajo, Accra, Ghana', 'alajo-accra-ghana', '5.599030074257939', '-0.21746272460631433', '2021-03-04 17:10:28', '2021-03-04 17:10:28'),
(105, 108, NULL, 'Kwashieman, Ghana', 'kwashieman-ghana', '5.5937587', '-0.2690565', '2021-03-04 18:25:46', '2021-03-04 18:25:46'),
(106, 109, NULL, 'Kaneshie, Accra, Ghana', 'kaneshie-accra-ghana', '5.576118', '-0.2444038', '2021-03-04 18:47:02', '2021-03-04 18:47:02'),
(107, 110, NULL, 'Shiashie, Accra, Ghana', 'shiashie-accra-ghana', '5.63394', '-0.17385619444275857', '2021-03-04 19:06:28', '2021-03-04 19:06:28'),
(108, 111, NULL, 'Dodowa, Ghana', 'dodowa-ghana', '5.8828665', '-0.098043', '2021-03-04 19:44:12', '2021-03-04 19:44:12'),
(109, 112, NULL, 'Adenta, Adenta Municipality, Ghana', 'adenta-adenta-municipality-ghana', '5.714111', '-0.1493611', '2021-03-04 19:50:38', '2021-03-04 19:50:38'),
(110, 113, NULL, 'Cape Coast, Ghana', 'cape-coast-ghana', '5.1315313716699995', '-1.280525825933847', '2021-03-04 19:58:21', '2021-03-04 19:58:21'),
(111, 114, NULL, 'Kotobabi, Accra, Ghana', 'kotobabi-accra-ghana', '5.5997705', '-0.2045388', '2021-03-05 14:51:01', '2021-03-05 14:51:01'),
(112, 115, NULL, 'Labadi', 'labadi', '5.586944', '-0.212992', '2021-03-05 15:00:56', '2021-03-05 15:00:56'),
(113, 117, NULL, 'Mankessim, Ghana', 'mankessim-ghana', '5.2728442', '-1.0155385', '2021-03-09 15:38:46', '2021-03-09 15:38:46'),
(114, 118, NULL, 'Dunkwa-On-Offin, Ghana', 'dunkwa-on-offin-ghana', '5.969812', '-1.7830973', '2021-03-09 15:45:58', '2021-03-09 15:45:58'),
(115, 119, NULL, 'Mensakrom, Ghana', 'mensakrom-ghana', '6.034633', '-1.6214113', '2021-03-09 15:51:13', '2021-03-09 15:51:13'),
(116, 121, NULL, 'Bremang, Ghana', 'bremang-ghana', '5.899885299999999', '-1.4257287', '2021-03-09 20:34:22', '2021-03-09 20:34:22'),
(117, 122, NULL, 'Berekum, Ghana', 'berekum-ghana', '7.4576765', '-2.5842062', '2021-03-09 20:55:01', '2021-03-09 20:55:01'),
(118, 123, NULL, 'Tanoso, Kumasi, Ghana', 'tanoso-kumasi-ghana', '6.6983113', '-1.6906291', '2021-03-09 21:05:41', '2021-03-09 21:05:41'),
(119, 124, NULL, 'Osudoku, Ghana', 'osudoku-ghana', '6.0272362', '0.1791263', '2021-03-09 21:13:04', '2021-03-09 21:13:04'),
(120, 125, NULL, 'Assin Fosu, Ghana', 'assin-fosu-ghana', '5.7022374', '-1.2842887', '2021-03-09 21:41:12', '2021-03-09 21:41:12'),
(121, 126, NULL, 'Kyebi, Ghana', 'kyebi-ghana', '6.168326299999999', '-0.5494198', '2021-03-09 22:10:47', '2021-03-09 22:10:47'),
(122, 127, NULL, 'Pokoasi, Ghana', 'pokoasi-ghana', '5.700273000000001', '-0.302078', '2021-03-09 22:17:06', '2021-03-09 22:17:06'),
(123, 128, NULL, 'Sunyani, Ghana', 'sunyani-ghana', '7.3349414', '-2.3123031', '2021-03-09 22:27:27', '2021-03-09 22:27:27'),
(124, 129, NULL, 'Danquah Circle, Accra, Ghana', 'danquah-circle-accra-ghana', '5.567448849799628', '-0.18028741216430832', '2021-03-09 22:53:57', '2021-03-09 22:53:57'),
(125, 130, NULL, 'Sefwi Wiawso, Ghana', 'sefwi-wiawso-ghana', '6.215947426085234', '-2.4857363859832837', '2021-03-09 23:00:25', '2021-03-09 23:00:25'),
(126, 116, NULL, 'Odorgonno Street, Ghana', 'odorgonno-street-ghana', '5.5995193', '-0.2875197', '2021-03-10 15:00:19', '2021-03-10 15:00:19'),
(127, 131, NULL, 'Weija, Ghana', 'weija-ghana', '5.566618943520855', '-0.33330613862305514', '2021-03-10 15:14:03', '2021-03-10 15:14:03'),
(128, 132, NULL, 'Hwidiem, Ghana', 'hwidiem-ghana', '6.934166159082031', '-2.3556140486877375', '2021-03-10 15:23:17', '2021-03-10 15:23:17'),
(129, 133, NULL, 'Papase, Ghana', 'papase-ghana', '7.726430799999999', '0.5104255', '2021-03-10 15:46:44', '2021-03-10 15:46:44'),
(130, 134, NULL, 'Bremang, Ghana', 'bremang-ghana', '5.899885299999999', '-1.4257287', '2021-03-10 15:52:54', '2021-03-10 15:52:54'),
(131, 135, NULL, 'Mankranso, Ghana', 'mankranso-ghana', '6.818202370726063', '-1.8637018325408983', '2021-03-10 15:58:54', '2021-03-10 15:58:54'),
(132, 136, NULL, 'Adaiso, Ghana', 'adaiso-ghana', '5.79634475719149', '-0.4841609494598331', '2021-03-10 16:03:36', '2021-03-10 16:03:36'),
(133, 137, NULL, 'Pankrono, Kumasi, Ghana', 'pankrono-kumasi-ghana', '6.7523019455821025', '-1.5836529785736109', '2021-03-10 16:22:22', '2021-03-10 16:22:22'),
(134, 138, NULL, 'Suhyen, Koforidua, Ghana', 'suhyen-koforidua-ghana', '6.2012345', '-0.3121199', '2021-03-10 16:28:31', '2021-03-10 16:28:31'),
(135, 139, NULL, 'Bechem, Ghana', 'bechem-ghana', '7.0857832', '-2.029768', '2021-03-10 16:35:53', '2021-03-10 16:35:53'),
(136, 140, NULL, 'Mempeasem Close, Takoradi, Ghana', 'mempeasem-close-takoradi-ghana', '4.917014897732715', '-1.7901665116394128', '2021-03-10 16:43:52', '2021-03-10 16:43:52'),
(137, 141, NULL, 'Yamfo, Ghana', 'yamfo-ghana', '7.219394999999999', '-2.235967', '2021-03-10 16:52:23', '2021-03-10 16:52:23'),
(138, 142, NULL, 'Tamale, Ghana', 'tamale-ghana', '9.40378247846666', '-0.8423945423278889', '2021-03-10 17:05:43', '2021-03-10 17:05:43'),
(139, 143, NULL, 'Mankessim, Ghana', 'mankessim-ghana', '5.2728442', '-1.0155385', '2021-03-10 17:16:17', '2021-03-10 17:16:17'),
(140, 144, NULL, 'Adade Road, Kasoa, Ghana', 'adade-road-kasoa-ghana', '5.505483783663893', '-0.42044298650816936', '2021-03-10 17:34:02', '2021-03-10 17:34:02'),
(141, 145, NULL, 'Suntreso Road, Kumasi, Ghana', 'suntreso-road-kumasi-ghana', '6.70295044607436', '-1.6390229190490646', '2021-03-10 17:46:25', '2021-03-10 17:46:25'),
(142, 146, NULL, 'Sakpeigu, Ghana', 'sakpeigu-ghana', '9.538144299999999', '-0.0268202', '2021-03-10 17:55:59', '2021-03-10 17:55:59'),
(143, 147, NULL, 'Kyekyewere, Ghana', 'kyekyewere-ghana', '7.1424612', '-1.6408561', '2021-03-10 18:15:37', '2021-03-10 18:15:37'),
(144, 148, NULL, 'Abesim, Ghana', 'abesim-ghana', '7.2865647', '-2.2778128', '2021-03-10 19:24:27', '2021-03-10 19:24:27'),
(145, 149, NULL, 'Ejisu, Ghana', 'ejisu-ghana', '6.715080599999999', '-1.5091172', '2021-03-10 19:35:01', '2021-03-10 19:35:01'),
(146, 150, NULL, 'Axim, Ghana', 'axim-ghana', '4.8665091', '-2.240888', '2021-03-10 21:38:48', '2021-03-10 21:38:48'),
(147, 151, NULL, 'Enchi, Ghana', 'enchi-ghana', '5.8230837', '-2.8228124', '2021-03-11 14:13:55', '2021-03-11 14:13:55'),
(148, 152, NULL, 'Sefwi Bekwai, Ghana', 'sefwi-bekwai-ghana', '6.1980265', '-2.3246274', '2021-03-11 14:21:33', '2021-03-11 14:21:33'),
(149, 153, NULL, 'Adaase, Ghana', 'adaase-ghana', '6.2453228179626175', '-1.6984294828033542', '2021-03-11 14:29:39', '2021-03-11 14:29:39'),
(150, 154, NULL, 'Mafi-Kumase Proper, Ghana', 'mafi-kumase-proper-ghana', '6.273324562675432', '0.574007536770611', '2021-03-11 14:50:50', '2021-03-11 14:50:50'),
(151, 155, NULL, 'Patasi, Kumasi, Ghana', 'patasi-kumasi-ghana', '6.682021263231285', '-1.6445064804260179', '2021-03-11 14:59:04', '2021-03-11 14:59:04'),
(152, 156, NULL, 'Abesim, Ghana', 'abesim-ghana', '7.2865647', '-2.2778128', '2021-03-11 15:08:17', '2021-03-11 15:08:17'),
(153, 157, NULL, 'Konongo, Ghana', 'konongo-ghana', '6.6249454', '-1.2073261', '2021-03-11 15:14:42', '2021-03-11 15:14:42'),
(154, 158, NULL, 'Osudoku, Ghana', 'osudoku-ghana', '6.0272362', '0.1791263', '2021-03-11 15:20:57', '2021-03-11 15:20:57'),
(155, 159, NULL, 'Kumawu, Ghana', 'kumawu-ghana', '6.9111632', '-1.2770675', '2021-03-11 16:28:28', '2021-03-11 16:28:28'),
(156, 160, NULL, 'Walewale, Ghana', 'walewale-ghana', '10.3516129', '-0.7984595000000001', '2021-03-11 16:35:34', '2021-03-11 16:35:34'),
(157, 161, NULL, '1 Roman Ridge Road, Accra, Ghana', '1-roman-ridge-road-accra-ghana', '5.602539229332403', '-0.19631748280335204', '2021-03-11 16:43:11', '2021-03-11 16:43:11'),
(158, 163, NULL, 'Ashongman Estates, Ghana', 'ashongman-estates-ghana', '5.706062713549201', '-0.2359783232788093', '2021-03-11 16:58:59', '2021-03-11 16:58:59'),
(159, 164, NULL, 'Kumawu, Ghana', 'kumawu-ghana', '6.9111632', '-1.2770675', '2021-03-11 17:19:57', '2021-03-11 17:19:57'),
(160, 165, NULL, 'Dormaa Ahenkro, Ghana', 'dormaa-ahenkro-ghana', '7.2670619', '-2.8676861', '2021-03-11 17:30:31', '2021-03-11 17:30:31'),
(161, 166, NULL, 'Tarkwa, Ghana', 'tarkwa-ghana', '5.302248634338245', '-1.993068057672125', '2021-03-11 17:40:46', '2021-03-11 17:40:46'),
(162, 167, NULL, 'Sakumono, Ghana', 'sakumono-ghana', '5.614910699999999', '-0.0484066', '2021-03-11 17:52:57', '2021-03-11 17:52:57'),
(163, 168, NULL, 'Suhum, Ghana', 'suhum-ghana', '6.041260900000001', '-0.4549542', '2021-03-11 18:03:59', '2021-03-11 18:03:59'),
(164, 169, NULL, 'Labadi, Accra, Ghana', 'labadi-accra-ghana', '5.5650436177872535', '-0.15710041296691069', '2021-03-11 18:10:48', '2021-03-11 18:10:48'),
(165, 170, NULL, 'Manhyia, Kumasi, Ghana', 'manhyia-kumasi-ghana', '6.704779738158709', '-1.6154601891632048', '2021-03-11 18:17:14', '2021-03-11 18:17:14'),
(166, 171, NULL, 'Adjen Kotoku, Ghana', 'adjen-kotoku-ghana', '5.735134899999999', '-0.3607137', '2021-03-11 19:58:57', '2021-03-11 19:58:57'),
(167, 172, NULL, 'Damongo, Ghana', 'damongo-ghana', '9.091271899999999', '-1.8269573', '2021-03-11 20:05:25', '2021-03-11 20:05:25'),
(168, 173, NULL, 'Kwahu Tafo, Ghana', 'kwahu-tafo-ghana', '6.6553555', '-0.6607039', '2021-03-11 20:09:46', '2021-03-11 20:09:46'),
(169, 174, NULL, 'Tepa, Ghana, Ghana', 'tepa-ghana-ghana', '7.0072367', '-2.1695855', '2021-03-11 20:17:06', '2021-03-11 20:17:06'),
(170, 175, NULL, 'Bawku, Ghana', 'bawku-ghana', '11.0541118', '-0.2385387', '2021-03-11 20:25:15', '2021-03-11 20:25:15'),
(171, 176, NULL, 'Techiman, Ghana', 'techiman-ghana', '7.5908801', '-1.9343555', '2021-03-11 20:29:22', '2021-03-11 20:29:22'),
(172, 177, NULL, 'Koforidua, Ghana', 'koforidua-ghana', '6.0784427', '-0.2713944', '2021-03-11 20:35:00', '2021-03-11 20:35:00'),
(173, 178, NULL, 'Berekum, Ghana', 'berekum-ghana', '7.4576765', '-2.5842062', '2021-03-11 20:42:36', '2021-03-11 20:42:36'),
(174, 179, NULL, 'Kaneshie, Accra, Ghana', 'kaneshie-accra-ghana', '5.576118', '-0.2444038', '2021-03-11 20:49:58', '2021-03-11 20:49:58'),
(175, 180, NULL, 'Drobo, Ghana', 'drobo-ghana', '7.583443245040124', '-2.785053233065795', '2021-03-11 21:21:20', '2021-03-11 21:21:20'),
(176, 181, NULL, 'Wenchi, Ghana', 'wenchi-ghana', '7.7419585', '-2.1008486', '2021-03-11 21:32:30', '2021-03-11 21:32:30'),
(177, 182, NULL, 'Birim Street, Accra, Ghana', 'birim-street-accra-ghana', '5.567020265303444', '-0.2122939497375409', '2021-03-11 21:53:22', '2021-03-11 21:53:22'),
(178, 183, NULL, 'Lapaz, Ghana', 'lapaz-ghana', '5.609507499999999', '-0.2507539', '2021-03-11 22:00:07', '2021-03-11 22:00:07'),
(179, 184, NULL, 'Aboabo, Kumasi, Ghana', 'aboabo-kumasi-ghana', '6.6959775', '-1.6008211', '2021-03-11 22:17:11', '2021-03-11 22:17:11'),
(180, 185, NULL, 'Kwashieman, Ghana', 'kwashieman-ghana', '5.596951337220498', '-0.2733802209320091', '2021-03-11 22:28:12', '2021-03-11 22:28:12'),
(181, 186, NULL, 'Airport Hills, Accra, Ghana', 'airport-hills-accra-ghana', '5.6163571', '-0.1432588', '2021-03-11 22:43:13', '2021-03-11 22:43:13'),
(182, 187, NULL, 'Lawra, Ghana', 'lawra-ghana', '10.6458978', '-2.8826534', '2021-03-15 14:30:25', '2021-03-15 14:30:25'),
(183, 188, NULL, 'Bia, Ghana', 'bia-ghana', '6.6544845951321365', '-3.0180539976226806', '2021-03-15 14:50:35', '2021-03-15 14:50:35'),
(184, 189, NULL, 'Prampram, Ghana', 'prampram-ghana', '5.7247051', '0.1167463', '2021-03-15 19:25:08', '2021-03-15 19:25:08'),
(185, 190, NULL, 'Konongo, Ghana', 'konongo-ghana', '6.6249454', '-1.2073261', '2021-03-15 19:38:50', '2021-03-15 19:38:50'),
(186, 191, NULL, 'Lomnava Street, Ghana', 'lomnava-street-ghana', '5.63919579222409', '-0.27856823862303814', '2021-03-15 19:50:02', '2021-03-15 19:50:02'),
(187, 192, NULL, 'Nyankpala, Ghana', 'nyankpala-ghana', '9.396547579022752', '-0.9888614907379245', '2021-03-15 19:54:01', '2021-03-15 19:54:01'),
(188, 193, NULL, 'Bawku, Ghana', 'bawku-ghana', '11.0541118', '-0.2385387', '2021-03-15 19:59:51', '2021-03-15 19:59:51'),
(189, 194, NULL, 'Labadi, Accra, Ghana', 'labadi-accra-ghana', '5.564659199999999', '-0.1565747', '2021-03-15 20:06:14', '2021-03-15 20:06:14'),
(190, 195, NULL, 'Bekwai, Ghana', 'bekwai-ghana', '6.453513543070938', '-1.5837189539672791', '2021-03-15 20:11:02', '2021-03-15 20:12:22'),
(191, 196, NULL, 'Abesim, Ghana', 'abesim-ghana', '7.286351856104653', '-2.277737698147577', '2021-03-15 20:18:49', '2021-03-15 20:18:49'),
(192, 197, NULL, 'Walewale, Ghana', 'walewale-ghana', '10.3516129', '-0.7984595000000001', '2021-03-15 20:26:02', '2021-03-15 20:26:02'),
(193, 198, NULL, 'Kwahu Asakraka, Ghana', 'kwahu-asakraka-ghana', '6.6285994', '-0.6891665', '2021-03-15 20:29:40', '2021-03-15 20:29:40'),
(194, 199, NULL, 'Kwahu Praso No1, Ghana', 'kwahu-praso-no1-ghana', '6.618203027977331', '-0.9080414859832819', '2021-03-15 20:33:21', '2021-03-15 20:33:21'),
(195, 200, NULL, 'Swedru Lane, Accra, Ghana', 'swedru-lane-accra-ghana', '5.567607429798825', '-0.245462130688483', '2021-03-15 20:41:50', '2021-03-15 20:41:50'),
(196, 201, NULL, 'Kokomlemle, Accra, Ghana', 'kokomlemle-accra-ghana', '5.5758396', '-0.2086447', '2021-03-15 21:04:06', '2021-03-15 21:04:06'),
(197, 202, NULL, 'Awudome Crescent, Accra, Ghana', 'awudome-crescent-accra-ghana', '5.571226129879424', '-0.22844952037659683', '2021-03-15 21:14:00', '2021-03-15 21:14:00'),
(198, 203, NULL, 'Sokode-Etoe, Ghana', 'sokode-etoe-ghana', '6.5701645', '0.4101619', '2021-03-15 21:19:31', '2021-03-15 21:19:31'),
(199, 204, NULL, 'Lawra, Ghana', 'lawra-ghana', '10.6458978', '-2.8826534', '2021-03-15 21:24:57', '2021-03-15 21:24:57'),
(200, 205, NULL, 'Kumasi, Ghana', 'kumasi-ghana', '6.6666004', '-1.6162709', '2021-03-15 21:36:53', '2021-03-15 21:36:53'),
(201, 206, NULL, 'Kete-Krachi, Ghana', 'kete-krachi-ghana', '7.8014452', '-0.0513246', '2021-03-15 21:45:08', '2021-03-15 21:45:08'),
(202, 207, NULL, 'Pankrono, Kumasi, Ghana', 'pankrono-kumasi-ghana', '6.752941210239741', '-1.5837709957702661', '2021-03-15 21:53:37', '2021-03-15 21:53:37'),
(203, 208, NULL, 'James Town, Accra, Ghana', 'james-town-accra-ghana', '5.5347078564396615', '-0.21382926931151625', '2021-03-15 22:03:42', '2021-03-15 22:04:09'),
(204, 209, NULL, 'Pantang West, Ghana', 'pantang-west-ghana', '5.7332654', '-0.1843777', '2021-03-15 22:11:04', '2021-03-15 22:11:04'),
(205, 210, NULL, 'Accra, Ghana', 'accra-ghana', '5.603492571119722', '-0.18673909444274717', '2021-03-15 22:20:33', '2021-03-15 22:20:33'),
(206, 211, NULL, 'Ahenkro, Ghana', 'ahenkro-ghana', '6.878613113365519', '-1.6447120767211865', '2021-03-15 22:31:41', '2021-03-15 22:31:41'),
(207, 212, NULL, 'Koforidua, Ghana', 'koforidua-ghana', '6.080448377455399', '-0.2717913669341998', '2021-03-15 22:37:08', '2021-03-15 22:37:08'),
(208, 213, NULL, 'Tudu, Accra, Ghana', 'tudu-accra-ghana', '5.552504400000001', '-0.2068827', '2021-03-15 22:43:39', '2021-03-15 22:43:39'),
(209, 214, NULL, 'Bekwai Rd, Kumasi, Ghana', 'bekwai-rd-kumasi-ghana', '6.627436571453856', '-1.6492831005248942', '2021-03-15 22:48:58', '2021-03-15 22:48:58'),
(210, 215, NULL, 'Lashibi, Ghana', 'lashibi-ghana', '5.6847539', '-0.0379152', '2021-03-15 22:53:03', '2021-03-15 22:53:03'),
(211, 216, NULL, 'Prestea, Ghana', 'prestea-ghana', '5.437319899999999', '-2.1401139', '2021-03-15 22:57:44', '2021-03-15 22:57:44'),
(212, 218, NULL, 'Sakumono Estate, Sakumono, Ghana', 'sakumono-estate-sakumono-ghana', '5.623449799999999', '-0.0618313', '2021-03-19 16:12:24', '2021-03-19 16:12:24'),
(213, 219, NULL, 'Prampram, Ghana', 'prampram-ghana', '5.7247051', '0.1167463', '2021-03-19 16:20:25', '2021-03-19 16:20:25'),
(214, 220, NULL, 'Konongo, Ghana', 'konongo-ghana', '6.6249454', '-1.2073261', '2021-03-19 16:25:02', '2021-03-19 16:25:02'),
(215, 221, NULL, 'Kwabenya, Ghana', 'kwabenya-ghana', '5.6844172', '-0.2537157', '2021-03-19 16:30:14', '2021-03-19 16:30:14'),
(216, 222, NULL, 'Kwabeng, Akyem Kwabeng, Ghana', 'kwabeng-akyem-kwabeng-ghana', '6.313142405723408', '-0.591137070639034', '2021-03-19 16:33:16', '2021-03-19 16:33:16'),
(217, 223, NULL, 'Kwabenya, Ghana', 'kwabenya-ghana', '5.6844172', '-0.2537157', '2021-03-19 16:37:45', '2021-03-19 16:37:45'),
(218, 224, NULL, 'Accra New Town, Accra, Ghana', 'accra-new-town-accra-ghana', '5.578177999999999', '-0.2158249', '2021-03-19 16:42:05', '2021-03-19 16:42:05'),
(219, 225, NULL, 'Konongo, Ghana', 'konongo-ghana', '6.6249454', '-1.2073261', '2021-03-19 16:45:43', '2021-03-19 16:45:43'),
(220, 226, NULL, 'Pepease, Ghana', 'pepease-ghana', '6.6926716', '-0.7366488999999999', '2021-03-19 17:29:34', '2021-03-19 17:29:34'),
(221, 227, NULL, 'Besease, Ghana', 'besease-ghana', '5.557585009018479', '-1.1946373685089196', '2021-03-19 17:34:01', '2021-03-19 17:34:01'),
(222, 228, NULL, 'Ankaase, Ghana', 'ankaase-ghana', '6.389025981877162', '-1.552885468508911', '2021-03-19 17:42:04', '2021-03-19 17:42:04'),
(223, 229, NULL, 'Kwadwokrom, Ghana', 'kwadwokrom-ghana', '7.778374480724704', '-0.17385619444275857', '2021-03-19 18:12:56', '2021-03-19 18:12:56'),
(224, 230, NULL, 'Kantamanto Market, Accra, Ghana', 'kantamanto-market-accra-ghana', '5.549426541841986', '-0.21155238147582356', '2021-03-19 18:18:20', '2021-03-19 18:18:20'),
(225, 231, NULL, 'Twenene, Ghana', 'twenene-ghana', '5.0134253', '-2.6892564', '2021-03-19 18:27:52', '2021-03-19 18:27:52'),
(226, 232, NULL, 'Lashibi, Ghana', 'lashibi-ghana', '5.6847539', '-0.0379152', '2021-03-19 18:34:19', '2021-03-19 18:34:19'),
(227, 233, NULL, 'Ankobi Street, Accra, Ghana', 'ankobi-street-accra-ghana', '5.536753', '-0.2660039', '2021-03-19 18:40:38', '2021-03-19 18:40:38'),
(228, 234, NULL, 'Tepa - Goaso Road, Akyerensua, Ghana', 'tepa-goaso-road-akyerensua-ghana', '6.979765225229553', '-2.296103459524541', '2021-03-19 19:34:38', '2021-03-19 19:34:38'),
(229, 235, NULL, 'A Road, Sakumono, Ghana', 'a-road-sakumono-ghana', '5.630717049707621', '-0.05449789629516699', '2021-03-19 19:48:13', '2021-03-19 19:48:13'),
(230, 236, NULL, 'Akutuase, Ghana', 'akutuase-ghana', '5.236147439348973', '-1.4506006828033446', '2021-03-19 20:03:53', '2021-03-19 20:03:53'),
(231, 217, NULL, 'Yamoransa, Ghana', 'yamoransa-ghana', '5.1655406', '-1.2001181', '2021-03-19 20:08:20', '2021-03-19 20:08:20'),
(232, 237, NULL, 'Accra, Ghana', 'accra-ghana', '5.6037168', '-0.1869644', '2021-03-19 21:05:53', '2021-03-19 21:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `property_own_rules`
--

CREATE TABLE `property_own_rules` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `rule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_own_rules`
--

INSERT INTO `property_own_rules` (`id`, `property_id`, `rule`, `created_at`, `updated_at`) VALUES
(1, 49, 'Do not leave unused appliances still plugged on', '2021-02-12 13:24:09', '2021-02-12 13:24:09'),
(2, 58, 'No rubbish burning on the compound', '2021-02-12 15:01:28', '2021-02-12 15:01:28'),
(3, 64, 'No burning of rubbish on compound', '2021-02-12 17:42:36', '2021-02-12 17:42:36'),
(4, 66, 'No burning of rubbish on compound', '2021-02-12 17:52:28', '2021-02-12 17:52:28'),
(5, 152, 'No burning of refuse or any form of liter on compound', '2021-03-11 14:20:34', '2021-03-11 14:20:34'),
(6, 153, 'Neighbors don\'t like loud music. Kindly note this limitation that is a quite neighborhood', '2021-03-11 14:28:30', '2021-03-11 14:28:30'),
(7, 154, 'No playing of loud music', '2021-03-11 14:50:12', '2021-03-11 14:50:12'),
(8, 186, 'No eating more than 3 times a day', '2021-03-11 22:39:07', '2021-03-11 22:39:07'),
(9, 186, 'Please leave items you meet in the rooms at your coming there', '2021-03-11 22:40:23', '2021-03-11 22:40:23'),
(10, 186, 'Management is not responsible for things left for things left when checking out', '2021-03-11 22:41:43', '2021-03-11 22:41:43');

-- --------------------------------------------------------

--
-- Table structure for table `property_prices`
--

CREATE TABLE `property_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `payment_duration` int(11) DEFAULT NULL,
  `minimum_stay` double DEFAULT NULL,
  `maximum_stay` double DEFAULT NULL,
  `price_calendar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_price` double NOT NULL,
  `smart_price` double DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negotiable` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_prices`
--

INSERT INTO `property_prices` (`id`, `property_id`, `payment_duration`, `minimum_stay`, `maximum_stay`, `price_calendar`, `property_price`, `smart_price`, `currency`, `negotiable`, `created_at`, `updated_at`) VALUES
(1, 1, 6, NULL, NULL, 'month', 300, NULL, 'GHS', NULL, '2021-02-08 13:37:18', '2021-02-08 13:37:18'),
(2, 2, 6, NULL, NULL, 'month', 800, NULL, 'GHS', NULL, '2021-02-08 15:15:58', '2021-02-08 15:15:58'),
(3, 3, NULL, 3, 37, 'night', 2000, 1800, 'GHS', NULL, '2021-02-08 15:32:44', '2021-02-08 15:32:44'),
(4, 4, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-02-08 15:50:13', '2021-02-08 15:50:13'),
(5, 5, 12, NULL, NULL, 'month', 1200, NULL, 'GHS', NULL, '2021-02-08 15:58:06', '2021-02-08 15:58:06'),
(6, 6, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-02-08 16:07:59', '2021-02-08 16:07:59'),
(7, 8, 12, NULL, NULL, 'month', 350, NULL, 'GHS', NULL, '2021-02-08 16:33:48', '2021-02-08 16:33:48'),
(8, 9, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-02-08 16:56:25', '2021-02-08 16:56:25'),
(9, 11, NULL, 3, 90, 'night', 200, 190, 'GHS', NULL, '2021-02-08 17:29:19', '2021-02-08 17:29:19'),
(10, 12, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-02-08 17:47:24', '2021-02-08 17:47:24'),
(11, 13, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-02-08 18:15:44', '2021-02-08 18:15:44'),
(12, 15, 12, NULL, NULL, 'month', 1800, NULL, 'GHS', NULL, '2021-02-09 14:40:37', '2021-02-09 14:40:37'),
(13, 17, NULL, 3, 37, 'night', 250, 245, 'GHS', NULL, '2021-02-09 15:13:19', '2021-02-09 15:13:19'),
(14, 18, 12, NULL, NULL, 'month', 600, NULL, 'GHS', NULL, '2021-02-09 15:25:45', '2021-02-09 15:25:45'),
(15, 19, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-02-09 15:46:58', '2021-02-09 15:46:58'),
(16, 20, NULL, 3, 30, 'night', 200, 190, 'GHS', NULL, '2021-02-09 16:13:16', '2021-02-09 16:13:16'),
(17, 21, NULL, 3, 37, 'night', 200, 198, 'GHS', NULL, '2021-02-09 16:54:01', '2021-02-09 16:54:01'),
(18, 23, 24, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-02-09 18:56:46', '2021-02-09 18:56:46'),
(19, 24, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-02-09 19:17:41', '2021-02-09 19:17:41'),
(20, 25, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-02-10 10:12:54', '2021-02-10 10:12:54'),
(21, 28, 24, NULL, NULL, 'month', 700, NULL, 'GHS', NULL, '2021-02-10 17:18:30', '2021-02-10 17:18:30'),
(22, 29, 12, NULL, NULL, 'month', 700, NULL, 'GHS', NULL, '2021-02-10 17:37:46', '2021-02-10 17:37:46'),
(23, 32, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-02-10 19:07:23', '2021-02-10 19:07:23'),
(24, 33, 12, NULL, NULL, 'month', 800, NULL, 'GHS', NULL, '2021-02-11 09:55:30', '2021-02-11 09:55:30'),
(25, 37, 12, NULL, NULL, 'month', 800, NULL, 'GHS', NULL, '2021-02-11 14:54:06', '2021-02-11 14:54:06'),
(26, 26, NULL, 7, 90, 'night', 250, 240, 'GHS', NULL, '2021-02-11 17:26:48', '2021-02-11 17:26:48'),
(27, 38, 12, NULL, NULL, 'month', 1200, NULL, 'GHS', NULL, '2021-02-11 18:44:51', '2021-02-11 18:44:51'),
(28, 39, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-02-11 19:03:17', '2021-02-11 19:03:17'),
(29, 40, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-02-11 19:31:00', '2021-02-11 19:31:00'),
(30, 42, 24, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-02-11 19:45:51', '2021-02-11 19:45:51'),
(31, 46, 12, NULL, NULL, 'month', 1400, NULL, 'GHS', NULL, '2021-02-12 12:59:58', '2021-02-12 12:59:58'),
(32, 47, 24, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-02-12 13:13:55', '2021-02-12 13:13:55'),
(33, 48, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-02-12 13:20:47', '2021-02-12 13:20:47'),
(34, 49, 24, NULL, NULL, 'month', 1500, NULL, 'GHS', NULL, '2021-02-12 13:27:25', '2021-02-12 13:27:25'),
(35, 50, 12, NULL, NULL, 'month', 1300, NULL, 'GHS', NULL, '2021-02-12 13:34:45', '2021-02-12 13:34:45'),
(36, 51, NULL, 4, 90, 'night', 200, 185, 'GHS', NULL, '2021-02-12 13:39:55', '2021-02-12 13:39:55'),
(37, 52, 12, NULL, NULL, 'month', 1250, NULL, 'GHS', NULL, '2021-02-12 13:47:01', '2021-02-12 13:47:01'),
(38, 53, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-02-12 13:51:15', '2021-02-12 13:51:15'),
(39, 54, NULL, 6, 90, 'night', 200, 290, 'GHS', NULL, '2021-02-12 13:57:16', '2021-02-12 13:57:16'),
(40, 55, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-02-12 14:02:44', '2021-02-12 14:02:44'),
(41, 56, 6, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-02-12 14:19:19', '2021-02-12 14:19:19'),
(42, 57, 24, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-02-12 14:58:30', '2021-02-12 14:58:30'),
(43, 58, 12, NULL, NULL, 'month', 600, NULL, 'GHS', NULL, '2021-02-12 15:11:17', '2021-02-12 15:11:17'),
(44, 59, 24, NULL, NULL, 'month', 350, NULL, 'GHS', NULL, '2021-02-12 15:21:31', '2021-02-12 15:21:31'),
(45, 60, 12, NULL, NULL, 'month', 250, NULL, 'GHS', NULL, '2021-02-12 15:30:42', '2021-02-12 15:30:42'),
(46, 61, 12, NULL, NULL, 'month', 600, NULL, 'GHS', NULL, '2021-02-12 15:51:38', '2021-02-12 15:51:38'),
(47, 62, 12, NULL, NULL, 'month', 900, NULL, 'GHS', NULL, '2021-02-12 16:00:57', '2021-02-12 16:00:57'),
(48, 63, 24, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-02-12 16:21:29', '2021-02-12 16:21:29'),
(49, 64, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-02-12 17:45:44', '2021-02-12 17:45:44'),
(50, 65, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-02-12 17:50:52', '2021-02-12 17:50:52'),
(51, 66, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-02-12 17:54:19', '2021-02-12 17:54:19'),
(52, 67, NULL, 3, 90, 'night', 200, 185, 'GHS', NULL, '2021-02-12 18:00:48', '2021-02-12 18:00:48'),
(53, 68, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-02-12 18:12:52', '2021-02-12 18:12:52'),
(54, 69, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-02-12 18:33:18', '2021-02-12 18:33:18'),
(55, 70, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-02-12 18:49:31', '2021-02-12 18:49:31'),
(56, 71, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-02-12 19:10:18', '2021-02-12 19:10:18'),
(57, 72, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-02-12 19:20:52', '2021-02-12 19:20:52'),
(58, 73, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-02-12 19:32:22', '2021-02-12 19:32:22'),
(59, 76, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-02-16 09:48:12', '2021-02-16 09:48:12'),
(60, 75, 12, NULL, NULL, 'month', 1200, NULL, 'GHS', NULL, '2021-02-16 09:54:32', '2021-02-16 09:54:32'),
(61, 74, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-02-16 16:11:56', '2021-02-16 16:11:56'),
(62, 86, NULL, 5, 60, 'night', 500, 400, 'GHS', NULL, '2021-03-01 04:42:00', '2021-03-01 04:42:00'),
(63, 87, 12, NULL, NULL, 'month', 450, NULL, 'GHS', NULL, '2021-03-01 05:00:40', '2021-03-01 05:00:40'),
(64, 88, 6, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-03 15:01:27', '2021-03-03 15:01:27'),
(65, 89, 6, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-03 15:23:09', '2021-03-03 15:23:09'),
(66, 90, 6, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-03 15:33:45', '2021-03-03 15:33:45'),
(67, 91, 12, NULL, NULL, 'month', 700, NULL, 'GHS', NULL, '2021-03-04 11:13:16', '2021-03-04 11:13:16'),
(68, 92, 24, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-04 11:19:04', '2021-03-04 11:19:04'),
(69, 93, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-04 11:25:57', '2021-03-04 11:25:57'),
(70, 94, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-04 11:32:11', '2021-03-04 11:32:11'),
(71, 95, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-04 11:39:53', '2021-03-04 11:39:53'),
(72, 96, NULL, 7, 90, 'night', 200, 190, 'GHS', NULL, '2021-03-04 11:48:40', '2021-03-04 11:48:40'),
(73, 97, NULL, 7, 90, 'night', 200, 190, 'GHS', NULL, '2021-03-04 11:56:01', '2021-03-04 11:56:01'),
(74, 109, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-04 18:54:25', '2021-03-04 18:54:25'),
(75, 110, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-04 19:10:18', '2021-03-04 19:10:18'),
(76, 112, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-04 19:55:47', '2021-03-04 19:55:47'),
(77, 113, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-05 14:48:54', '2021-03-05 14:48:54'),
(78, 114, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-05 14:54:51', '2021-03-05 14:54:51'),
(79, 119, 12, NULL, NULL, 'month', 1200, NULL, 'GHS', NULL, '2021-03-09 15:55:23', '2021-03-09 15:55:23'),
(80, 121, 24, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-09 20:43:13', '2021-03-09 20:43:13'),
(81, 122, 12, NULL, NULL, 'month', 700, NULL, 'GHS', NULL, '2021-03-09 21:00:21', '2021-03-09 21:00:21'),
(82, 123, 12, NULL, NULL, 'month', 700, NULL, 'GHS', NULL, '2021-03-09 21:09:00', '2021-03-09 21:09:00'),
(83, 124, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-09 21:22:08', '2021-03-09 21:22:08'),
(84, 125, 12, NULL, NULL, 'month', 300, NULL, 'GHS', NULL, '2021-03-09 21:59:07', '2021-03-09 21:59:07'),
(85, 126, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-09 22:15:22', '2021-03-09 22:15:22'),
(86, 127, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-09 22:20:40', '2021-03-09 22:20:40'),
(87, 130, 12, NULL, NULL, 'month', 300, NULL, 'GHS', NULL, '2021-03-09 23:06:08', '2021-03-09 23:06:08'),
(88, 134, 24, NULL, NULL, 'month', 700, NULL, 'GHS', NULL, '2021-03-10 15:56:09', '2021-03-10 15:56:09'),
(89, 135, 24, NULL, NULL, 'month', 700, NULL, 'GHS', NULL, '2021-03-10 16:01:24', '2021-03-10 16:01:24'),
(90, 136, 24, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-10 16:06:26', '2021-03-10 16:06:26'),
(91, 137, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-10 16:25:13', '2021-03-10 16:25:13'),
(92, 138, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-10 16:31:53', '2021-03-10 16:31:53'),
(93, 139, 24, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-10 16:39:51', '2021-03-10 16:39:51'),
(94, 140, 24, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-10 16:48:11', '2021-03-10 16:48:11'),
(95, 141, 24, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-10 16:56:15', '2021-03-10 16:56:15'),
(96, 142, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-10 17:10:13', '2021-03-10 17:10:13'),
(97, 143, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-10 17:22:46', '2021-03-10 17:22:46'),
(98, 144, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-10 17:43:46', '2021-03-10 17:43:46'),
(99, 145, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-10 17:49:17', '2021-03-10 17:49:17'),
(100, 146, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-10 18:03:42', '2021-03-10 18:03:42'),
(101, 147, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-10 18:26:20', '2021-03-10 18:26:20'),
(102, 148, 24, NULL, NULL, 'month', 700, NULL, 'GHS', NULL, '2021-03-10 19:27:52', '2021-03-10 19:27:52'),
(103, 149, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-10 19:46:33', '2021-03-10 19:46:33'),
(104, 150, 24, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-10 21:56:22', '2021-03-10 21:56:22'),
(105, 151, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-11 14:18:39', '2021-03-11 14:18:39'),
(106, 152, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-11 14:24:38', '2021-03-11 14:24:38'),
(107, 153, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-11 14:43:46', '2021-03-11 14:43:46'),
(108, 154, 24, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-11 14:54:03', '2021-03-11 14:54:03'),
(109, 155, 24, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-11 15:05:10', '2021-03-11 15:05:10'),
(110, 156, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-11 15:12:16', '2021-03-11 15:12:16'),
(111, 157, 12, NULL, NULL, 'month', 1200, NULL, 'GHS', NULL, '2021-03-11 15:19:16', '2021-03-11 15:19:16'),
(112, 158, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-11 16:23:44', '2021-03-11 16:23:44'),
(113, 160, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-11 16:37:34', '2021-03-11 16:37:34'),
(114, 161, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-11 16:51:18', '2021-03-11 16:51:18'),
(115, 163, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-11 17:04:42', '2021-03-11 17:04:42'),
(116, 164, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-11 17:26:32', '2021-03-11 17:26:32'),
(117, 165, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-11 17:33:21', '2021-03-11 17:33:21'),
(118, 166, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-11 17:44:15', '2021-03-11 17:44:15'),
(119, 167, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-11 17:54:30', '2021-03-11 17:54:30'),
(120, 168, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-11 18:05:41', '2021-03-11 18:05:41'),
(121, 169, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-11 18:12:30', '2021-03-11 18:12:30'),
(122, 170, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-11 18:23:28', '2021-03-11 18:23:28'),
(123, 171, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-11 20:03:24', '2021-03-11 20:03:24'),
(124, 172, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-11 20:07:07', '2021-03-11 20:07:07'),
(125, 176, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-11 20:31:14', '2021-03-11 20:31:14'),
(126, 177, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-11 20:36:40', '2021-03-11 20:36:40'),
(127, 178, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-11 20:46:40', '2021-03-11 20:46:40'),
(128, 179, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-11 20:52:53', '2021-03-11 20:52:53'),
(129, 180, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-11 21:25:19', '2021-03-11 21:25:19'),
(130, 181, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-11 21:48:11', '2021-03-11 21:48:11'),
(131, 182, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-11 21:55:10', '2021-03-11 21:55:10'),
(132, 183, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-11 22:04:04', '2021-03-11 22:04:04'),
(133, 186, 12, NULL, NULL, 'month', 2000, NULL, 'GHS', NULL, '2021-03-11 22:48:30', '2021-03-11 22:48:30'),
(134, 187, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-15 14:38:33', '2021-03-15 14:38:33'),
(135, 188, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-15 15:07:53', '2021-03-15 15:07:53'),
(136, 189, 6, NULL, NULL, 'month', 300, NULL, 'GHS', NULL, '2021-03-15 19:29:51', '2021-03-15 19:29:51'),
(137, 190, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-15 19:48:40', '2021-03-15 19:48:40'),
(138, 191, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-15 19:51:22', '2021-03-15 19:51:22'),
(139, 192, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-15 19:58:20', '2021-03-15 19:58:20'),
(140, 193, 24, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-15 20:03:30', '2021-03-15 20:03:30'),
(141, 194, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-15 20:08:08', '2021-03-15 20:08:08'),
(142, 195, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-15 20:14:36', '2021-03-15 20:14:36'),
(143, 196, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-15 20:22:24', '2021-03-15 20:22:24'),
(144, 197, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-15 20:28:03', '2021-03-15 20:28:03'),
(145, 198, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-15 20:31:45', '2021-03-15 20:31:45'),
(146, 199, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-15 20:39:08', '2021-03-15 20:39:08'),
(147, 200, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-15 20:51:15', '2021-03-15 20:51:15'),
(148, 201, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-15 21:08:41', '2021-03-15 21:08:41'),
(149, 202, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-15 21:16:59', '2021-03-15 21:16:59'),
(150, 203, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-15 21:22:41', '2021-03-15 21:22:41'),
(151, 204, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-15 21:29:40', '2021-03-15 21:29:40'),
(152, 205, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-15 21:40:49', '2021-03-15 21:40:49'),
(153, 206, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-15 21:48:48', '2021-03-15 21:48:48'),
(154, 207, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-15 21:59:26', '2021-03-15 21:59:26'),
(155, 208, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-15 22:07:10', '2021-03-15 22:07:10'),
(156, 209, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-15 22:14:22', '2021-03-15 22:14:22'),
(157, 210, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-15 22:26:21', '2021-03-15 22:26:21'),
(158, 211, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-15 22:33:39', '2021-03-15 22:33:39'),
(159, 212, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-15 22:39:18', '2021-03-15 22:39:18'),
(160, 213, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-15 22:47:31', '2021-03-15 22:47:31'),
(161, 214, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-15 22:51:28', '2021-03-15 22:51:28'),
(162, 215, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-15 22:55:28', '2021-03-15 22:55:28'),
(163, 216, 24, NULL, NULL, 'month', 300, NULL, 'GHS', NULL, '2021-03-15 23:00:06', '2021-03-15 23:00:06'),
(164, 218, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-19 16:15:37', '2021-03-19 16:15:37'),
(165, 219, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-19 16:22:22', '2021-03-19 16:22:22'),
(166, 220, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-19 16:28:26', '2021-03-19 16:28:26'),
(167, 221, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-19 16:31:45', '2021-03-19 16:31:45'),
(168, 222, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-19 16:34:44', '2021-03-19 16:34:44'),
(169, 223, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-19 16:39:13', '2021-03-19 16:39:13'),
(170, 224, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-19 16:43:56', '2021-03-19 16:43:56'),
(171, 225, 12, NULL, NULL, 'month', 300, NULL, 'GHS', NULL, '2021-03-19 17:17:26', '2021-03-19 17:17:26'),
(172, 226, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-19 17:31:32', '2021-03-19 17:31:32'),
(173, 227, 24, NULL, NULL, 'month', 300, NULL, 'GHS', NULL, '2021-03-19 17:39:22', '2021-03-19 17:39:22'),
(174, 228, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-19 17:44:36', '2021-03-19 17:44:36'),
(175, 229, 12, NULL, NULL, 'month', 300, NULL, 'GHS', NULL, '2021-03-19 18:15:04', '2021-03-19 18:15:04'),
(176, 230, 12, NULL, NULL, 'month', 300, NULL, 'GHS', NULL, '2021-03-19 18:20:30', '2021-03-19 18:20:30'),
(177, 231, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-19 18:30:16', '2021-03-19 18:30:16'),
(178, 232, 12, NULL, NULL, 'month', 300, NULL, 'GHS', NULL, '2021-03-19 18:37:20', '2021-03-19 18:37:20'),
(179, 233, 12, NULL, NULL, 'month', 300, NULL, 'GHS', NULL, '2021-03-19 18:42:59', '2021-03-19 18:42:59'),
(180, 234, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-19 19:43:20', '2021-03-19 19:43:20'),
(181, 235, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-03-19 20:00:30', '2021-03-19 20:00:30'),
(182, 236, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-19 20:05:31', '2021-03-19 20:05:31'),
(183, 217, 12, NULL, NULL, 'month', 400, NULL, 'GHS', NULL, '2021-03-19 20:12:33', '2021-03-19 20:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `property_reviews`
--

CREATE TABLE `property_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(10) NOT NULL,
  `location_star` int(11) NOT NULL,
  `security_star` int(11) NOT NULL,
  `comm_star` int(11) NOT NULL,
  `value_star` int(11) NOT NULL,
  `accuracy_star` int(11) NOT NULL,
  `tidy_star` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_rules`
--

CREATE TABLE `property_rules` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `rule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_rules`
--

INSERT INTO `property_rules` (`id`, `property_id`, `rule`, `created_at`, `updated_at`) VALUES
(1, 1, 'No smoking', '2021-02-08 13:15:38', '2021-02-08 13:15:38'),
(2, 2, 'No smoking', '2021-02-08 13:43:48', '2021-02-08 13:43:48'),
(3, 2, 'No washing outside laundary', '2021-02-08 13:43:48', '2021-02-08 13:43:48'),
(4, 5, 'No smoking', '2021-02-08 15:53:20', '2021-02-08 15:53:20'),
(5, 8, 'No smoking', '2021-02-08 16:29:01', '2021-02-08 16:29:01'),
(6, 8, 'No washing outside laundary', '2021-02-08 16:29:01', '2021-02-08 16:29:01'),
(7, 8, 'Dont host visitors more than 2 weeks', '2021-02-08 16:29:01', '2021-02-08 16:29:01'),
(8, 9, 'No deadly weapons', '2021-02-08 16:38:44', '2021-02-08 16:38:44'),
(14, 17, 'No smoking', '2021-02-09 15:05:18', '2021-02-09 15:05:18'),
(15, 20, 'No smoking', '2021-02-09 15:54:59', '2021-02-09 15:54:59'),
(18, 18, 'No smoking', '2021-02-09 18:47:33', '2021-02-09 18:47:33'),
(19, 18, 'No deadly weapons', '2021-02-09 18:47:33', '2021-02-09 18:47:33'),
(31, 40, 'No deadly weapons', '2021-02-11 19:16:52', '2021-02-11 19:16:52'),
(32, 42, 'No smoking', '2021-02-11 19:38:58', '2021-02-11 19:38:58'),
(33, 43, 'No smoking', '2021-02-12 12:12:19', '2021-02-12 12:12:19'),
(34, 43, 'No deadly weapons', '2021-02-12 12:12:19', '2021-02-12 12:12:19'),
(35, 43, 'No washing outside laundary', '2021-02-12 12:12:19', '2021-02-12 12:12:19'),
(36, 59, 'No washing outside laundary', '2021-02-12 15:15:29', '2021-02-12 15:15:29'),
(37, 77, 'No smoking', '2021-02-15 14:56:27', '2021-02-15 14:56:27'),
(38, 77, 'No deadly weapons', '2021-02-15 14:56:27', '2021-02-15 14:56:27'),
(39, 77, 'Dont host visitors more than 2 weeks', '2021-02-15 14:56:27', '2021-02-15 14:56:27'),
(40, 78, 'No smoking', '2021-02-15 15:50:02', '2021-02-15 15:50:02'),
(41, 78, 'No deadly weapons', '2021-02-15 15:50:02', '2021-02-15 15:50:02'),
(42, 78, 'No washing outside laundary', '2021-02-15 15:50:02', '2021-02-15 15:50:02'),
(43, 78, 'Dont host visitors more than 2 weeks', '2021-02-15 15:50:02', '2021-02-15 15:50:02'),
(44, 79, 'No smoking', '2021-02-15 16:10:25', '2021-02-15 16:10:25'),
(45, 79, 'No deadly weapons', '2021-02-15 16:10:25', '2021-02-15 16:10:25'),
(46, 79, 'Dont host visitors more than 2 weeks', '2021-02-15 16:10:25', '2021-02-15 16:10:25'),
(47, 80, 'No smoking', '2021-02-15 17:09:43', '2021-02-15 17:09:43'),
(48, 80, 'No deadly weapons', '2021-02-15 17:09:43', '2021-02-15 17:09:43'),
(49, 80, 'No washing outside laundary', '2021-02-15 17:09:43', '2021-02-15 17:09:43'),
(50, 80, 'Dont host visitors more than 2 weeks', '2021-02-15 17:09:43', '2021-02-15 17:09:43'),
(51, 81, 'No smoking', '2021-02-15 17:27:46', '2021-02-15 17:27:46'),
(52, 81, 'No deadly weapons', '2021-02-15 17:27:46', '2021-02-15 17:27:46'),
(53, 81, 'No washing outside laundary', '2021-02-15 17:27:46', '2021-02-15 17:27:46'),
(54, 82, 'No smoking', '2021-02-15 18:16:26', '2021-02-15 18:16:26'),
(55, 82, 'No deadly weapons', '2021-02-15 18:16:26', '2021-02-15 18:16:26'),
(56, 82, 'No washing outside laundary', '2021-02-15 18:16:26', '2021-02-15 18:16:26'),
(57, 74, 'No smoking', '2021-02-16 16:11:08', '2021-02-16 16:11:08'),
(58, 83, 'No deadly weapons', '2021-02-16 16:16:06', '2021-02-16 16:16:06'),
(59, 86, 'No smoking', '2021-03-01 04:09:44', '2021-03-01 04:09:44'),
(60, 86, 'No deadly weapons', '2021-03-01 04:09:44', '2021-03-01 04:09:44'),
(61, 86, 'Dont host visitors more than 2 weeks', '2021-03-01 04:09:44', '2021-03-01 04:09:44'),
(62, 87, 'No smoking', '2021-03-01 04:49:26', '2021-03-01 04:49:26'),
(63, 87, 'Dont urinate in pool', '2021-03-01 04:49:26', '2021-03-01 04:49:26'),
(64, 87, 'No washing outside laundary', '2021-03-01 04:49:26', '2021-03-01 04:49:26'),
(65, 87, 'Dont host visitors more than 2 weeks', '2021-03-01 04:49:26', '2021-03-01 04:49:26'),
(66, 94, 'No washing outside laundary', '2021-03-04 11:27:24', '2021-03-04 11:27:24'),
(67, 94, 'Dont host visitors more than 2 weeks', '2021-03-04 11:27:24', '2021-03-04 11:27:24'),
(68, 98, 'No smoking', '2021-03-04 12:19:23', '2021-03-04 12:19:23'),
(69, 98, 'No deadly weapons', '2021-03-04 12:19:23', '2021-03-04 12:19:23'),
(70, 98, 'Dont urinate in pool', '2021-03-04 12:19:23', '2021-03-04 12:19:23'),
(71, 98, 'Dont host visitors more than 2 weeks', '2021-03-04 12:19:23', '2021-03-04 12:19:23'),
(72, 99, 'Dont host visitors more than 2 weeks', '2021-03-04 12:29:33', '2021-03-04 12:29:33'),
(73, 101, 'Dont host visitors more than 2 weeks', '2021-03-04 12:56:40', '2021-03-04 12:56:40'),
(74, 102, 'Dont host visitors more than 2 weeks', '2021-03-04 13:15:14', '2021-03-04 13:15:14'),
(75, 104, 'Dont host visitors more than 2 weeks', '2021-03-04 14:06:13', '2021-03-04 14:06:13'),
(76, 106, 'Dont host visitors more than 2 weeks', '2021-03-04 15:33:25', '2021-03-04 15:33:25'),
(77, 107, 'Dont host visitors more than 2 weeks', '2021-03-04 17:10:01', '2021-03-04 17:10:01'),
(78, 108, 'No washing outside laundary', '2021-03-04 18:25:26', '2021-03-04 18:25:26'),
(79, 108, 'Dont host visitors more than 2 weeks', '2021-03-04 18:25:26', '2021-03-04 18:25:26'),
(80, 109, 'No washing outside laundary', '2021-03-04 18:46:47', '2021-03-04 18:46:47'),
(81, 111, 'Dont host visitors more than 2 weeks', '2021-03-04 19:43:27', '2021-03-04 19:43:27'),
(82, 114, 'No washing outside laundary', '2021-03-05 14:50:48', '2021-03-05 14:50:48'),
(83, 115, 'Dont host visitors more than 2 weeks', '2021-03-05 14:58:50', '2021-03-05 14:58:50'),
(84, 117, 'No smoking', '2021-03-09 15:38:26', '2021-03-09 15:38:26'),
(85, 117, 'No deadly weapons', '2021-03-09 15:38:26', '2021-03-09 15:38:26'),
(86, 117, 'No washing outside laundary', '2021-03-09 15:38:26', '2021-03-09 15:38:26'),
(87, 117, 'Dont host visitors more than 2 weeks', '2021-03-09 15:38:26', '2021-03-09 15:38:26'),
(88, 118, 'No smoking', '2021-03-09 15:45:46', '2021-03-09 15:45:46'),
(89, 118, 'No washing outside laundary', '2021-03-09 15:45:46', '2021-03-09 15:45:46'),
(90, 118, 'Dont host visitors more than 2 weeks', '2021-03-09 15:45:46', '2021-03-09 15:45:46'),
(91, 119, 'No washing outside laundary', '2021-03-09 15:50:49', '2021-03-09 15:50:49'),
(92, 128, 'No smoking', '2021-03-09 22:27:03', '2021-03-09 22:27:03'),
(93, 128, 'No deadly weapons', '2021-03-09 22:27:03', '2021-03-09 22:27:03'),
(94, 128, 'No washing outside laundary', '2021-03-09 22:27:03', '2021-03-09 22:27:03'),
(95, 128, 'Dont host visitors more than 2 weeks', '2021-03-09 22:27:03', '2021-03-09 22:27:03'),
(96, 130, 'No washing outside laundary', '2021-03-09 22:59:53', '2021-03-09 22:59:53'),
(97, 131, 'No deadly weapons', '2021-03-10 15:13:42', '2021-03-10 15:13:42'),
(98, 131, 'No washing outside laundary', '2021-03-10 15:13:42', '2021-03-10 15:13:42'),
(99, 131, 'Dont host visitors more than 2 weeks', '2021-03-10 15:13:42', '2021-03-10 15:13:42'),
(100, 132, 'No deadly weapons', '2021-03-10 15:22:57', '2021-03-10 15:22:57'),
(101, 132, 'No washing outside laundary', '2021-03-10 15:22:57', '2021-03-10 15:22:57'),
(102, 132, 'Dont host visitors more than 2 weeks', '2021-03-10 15:22:57', '2021-03-10 15:22:57'),
(103, 147, 'Dont urinate in pool', '2021-03-10 18:14:38', '2021-03-10 18:14:38'),
(104, 147, 'No washing outside laundary', '2021-03-10 18:14:38', '2021-03-10 18:14:38'),
(105, 159, 'No deadly weapons', '2021-03-11 16:28:13', '2021-03-11 16:28:13'),
(106, 159, 'No washing outside laundary', '2021-03-11 16:28:13', '2021-03-11 16:28:13'),
(107, 159, 'Dont host visitors more than 2 weeks', '2021-03-11 16:28:13', '2021-03-11 16:28:13'),
(108, 161, 'Dont urinate in pool', '2021-03-11 16:42:23', '2021-03-11 16:42:23'),
(109, 171, 'No smoking', '2021-03-11 18:35:12', '2021-03-11 18:35:12'),
(110, 186, 'No smoking', '2021-03-11 22:42:07', '2021-03-11 22:42:07'),
(111, 186, 'No deadly weapons', '2021-03-11 22:42:07', '2021-03-11 22:42:07'),
(112, 186, 'Dont urinate in pool', '2021-03-11 22:42:07', '2021-03-11 22:42:07'),
(113, 186, 'No washing outside laundary', '2021-03-11 22:42:07', '2021-03-11 22:42:07'),
(114, 187, 'No washing outside laundary', '2021-03-15 14:30:14', '2021-03-15 14:30:14'),
(115, 216, 'No washing outside laundary', '2021-03-15 22:57:25', '2021-03-15 22:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `property_shared_amenities`
--

CREATE TABLE `property_shared_amenities` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_shared_amenities`
--

INSERT INTO `property_shared_amenities` (`id`, `property_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Car Park', '2021-02-08 13:14:47', '2021-02-08 13:14:47'),
(2, 2, 'Laundary', '2021-02-08 13:43:05', '2021-02-08 13:43:05'),
(3, 4, 'Swimming Pool', '2021-02-08 15:43:10', '2021-02-08 15:43:10'),
(4, 4, 'Laundary', '2021-02-08 15:43:10', '2021-02-08 15:43:10'),
(5, 5, 'Swimming Pool', '2021-02-08 15:53:07', '2021-02-08 15:53:07'),
(6, 5, 'Laundary', '2021-02-08 15:53:07', '2021-02-08 15:53:07'),
(7, 5, 'Car Park', '2021-02-08 15:53:07', '2021-02-08 15:53:07'),
(8, 5, 'Fire Extinguisher', '2021-02-08 15:53:07', '2021-02-08 15:53:07'),
(9, 6, 'Laundary', '2021-02-08 16:01:47', '2021-02-08 16:01:47'),
(10, 6, 'Garden', '2021-02-08 16:01:47', '2021-02-08 16:01:47'),
(13, 17, 'Laundary', '2021-02-09 15:05:03', '2021-02-09 15:05:03'),
(18, 37, 'Swimming Pool', '2021-02-11 14:39:46', '2021-02-11 14:39:46'),
(22, 38, 'Fire Extinguisher', '2021-02-11 18:39:56', '2021-02-11 18:39:56'),
(23, 40, 'Car Park', '2021-02-11 19:16:41', '2021-02-11 19:16:41'),
(24, 42, 'Garden', '2021-02-11 19:37:53', '2021-02-11 19:37:53'),
(25, 44, 'Swimming Pool', '2021-02-12 12:29:38', '2021-02-12 12:29:38'),
(26, 44, 'Laundary', '2021-02-12 12:29:38', '2021-02-12 12:29:38'),
(27, 46, 'Swimming Pool', '2021-02-12 12:51:39', '2021-02-12 12:51:39'),
(28, 47, 'Laundary', '2021-02-12 13:09:18', '2021-02-12 13:09:18'),
(29, 51, 'Swimming Pool', '2021-02-12 13:36:42', '2021-02-12 13:36:42'),
(30, 54, 'Laundary', '2021-02-12 13:54:02', '2021-02-12 13:54:02'),
(31, 56, 'Swimming Pool', '2021-02-12 14:06:20', '2021-02-12 14:06:20'),
(32, 57, 'Swimming Pool', '2021-02-12 14:23:08', '2021-02-12 14:23:08'),
(33, 57, 'Garden', '2021-02-12 14:23:08', '2021-02-12 14:23:08'),
(34, 58, 'Swimming Pool', '2021-02-12 15:00:41', '2021-02-12 15:00:41'),
(35, 63, 'Laundary', '2021-02-12 16:04:49', '2021-02-12 16:04:49'),
(36, 64, 'Fire Extinguisher', '2021-02-12 17:42:09', '2021-02-12 17:42:09'),
(37, 78, 'Laundary', '2021-02-15 15:49:50', '2021-02-15 15:49:50'),
(38, 78, 'Fire Extinguisher', '2021-02-15 15:49:50', '2021-02-15 15:49:50'),
(39, 79, 'Swimming Pool', '2021-02-15 16:10:04', '2021-02-15 16:10:04'),
(40, 81, 'Laundary', '2021-02-15 17:27:34', '2021-02-15 17:27:34'),
(41, 82, 'Laundary', '2021-02-15 18:16:16', '2021-02-15 18:16:16'),
(42, 76, 'Swimming Pool', '2021-02-16 09:36:15', '2021-02-16 09:36:15'),
(43, 75, 'Swimming Pool', '2021-02-16 09:49:03', '2021-02-16 09:49:03'),
(44, 88, 'Standby Generator', '2021-03-03 14:49:45', '2021-03-03 14:49:45'),
(45, 97, 'Swimming Pool', '2021-03-04 11:52:03', '2021-03-04 11:52:03'),
(46, 97, 'Laundary', '2021-03-04 11:52:03', '2021-03-04 11:52:03'),
(47, 97, 'Standby Generator', '2021-03-04 11:52:03', '2021-03-04 11:52:03'),
(48, 98, 'Swimming Pool', '2021-03-04 12:19:12', '2021-03-04 12:19:12'),
(49, 99, 'Swimming Pool', '2021-03-04 12:29:23', '2021-03-04 12:29:23'),
(50, 100, 'Swimming Pool', '2021-03-04 12:42:14', '2021-03-04 12:42:14'),
(51, 101, 'Laundary', '2021-03-04 12:56:32', '2021-03-04 12:56:32'),
(52, 102, 'Swimming Pool', '2021-03-04 13:15:02', '2021-03-04 13:15:02'),
(53, 103, 'Standby Generator', '2021-03-04 13:30:52', '2021-03-04 13:30:52'),
(54, 106, 'Garden', '2021-03-04 15:33:15', '2021-03-04 15:33:15'),
(55, 106, 'Water Reservoir', '2021-03-04 15:33:15', '2021-03-04 15:33:15'),
(56, 106, 'Gym', '2021-03-04 15:33:15', '2021-03-04 15:33:15'),
(57, 107, 'Laundary', '2021-03-04 17:09:45', '2021-03-04 17:09:45'),
(58, 107, 'Car Park', '2021-03-04 17:09:45', '2021-03-04 17:09:45'),
(59, 107, 'Fire Extinguisher', '2021-03-04 17:09:45', '2021-03-04 17:09:45'),
(60, 108, 'Laundary', '2021-03-04 18:25:18', '2021-03-04 18:25:18'),
(61, 108, 'Fire Extinguisher', '2021-03-04 18:25:18', '2021-03-04 18:25:18'),
(62, 108, 'Standby Generator', '2021-03-04 18:25:18', '2021-03-04 18:25:18'),
(63, 110, 'Laundary', '2021-03-04 19:06:02', '2021-03-04 19:06:02'),
(64, 110, 'Gym', '2021-03-04 19:06:02', '2021-03-04 19:06:02'),
(65, 111, 'Laundary', '2021-03-04 19:43:01', '2021-03-04 19:43:01'),
(66, 111, 'Fire Extinguisher', '2021-03-04 19:43:01', '2021-03-04 19:43:01'),
(67, 112, 'Car Park', '2021-03-04 19:49:59', '2021-03-04 19:49:59'),
(68, 112, 'Fire Extinguisher', '2021-03-04 19:49:59', '2021-03-04 19:49:59'),
(69, 113, 'Laundary', '2021-03-04 19:58:02', '2021-03-04 19:58:02'),
(70, 114, 'Laundary', '2021-03-05 14:50:39', '2021-03-05 14:50:39'),
(71, 115, 'Laundary', '2021-03-05 14:58:40', '2021-03-05 14:58:40'),
(72, 115, 'Water Reservoir', '2021-03-05 14:58:40', '2021-03-05 14:58:40'),
(73, 117, 'Laundary', '2021-03-09 15:38:15', '2021-03-09 15:38:15'),
(74, 117, 'Standby Generator', '2021-03-09 15:38:15', '2021-03-09 15:38:15'),
(75, 117, 'Water Reservoir', '2021-03-09 15:38:15', '2021-03-09 15:38:15'),
(76, 118, 'Laundary', '2021-03-09 15:45:37', '2021-03-09 15:45:37'),
(77, 118, 'Car Park', '2021-03-09 15:45:37', '2021-03-09 15:45:37'),
(78, 118, 'Water Reservoir', '2021-03-09 15:45:37', '2021-03-09 15:45:37'),
(79, 119, 'Laundary', '2021-03-09 15:50:43', '2021-03-09 15:50:43'),
(80, 119, 'Standby Generator', '2021-03-09 15:50:43', '2021-03-09 15:50:43'),
(81, 119, 'Water Reservoir', '2021-03-09 15:50:43', '2021-03-09 15:50:43'),
(82, 119, 'Gym', '2021-03-09 15:50:43', '2021-03-09 15:50:43'),
(83, 121, 'Swimming Pool', '2021-03-09 15:58:16', '2021-03-09 15:58:16'),
(84, 121, 'Laundary', '2021-03-09 15:58:16', '2021-03-09 15:58:16'),
(85, 121, 'Car Park', '2021-03-09 15:58:16', '2021-03-09 15:58:16'),
(86, 121, 'Fire Extinguisher', '2021-03-09 15:58:16', '2021-03-09 15:58:16'),
(87, 121, 'Water Reservoir', '2021-03-09 15:58:16', '2021-03-09 15:58:16'),
(88, 121, 'Gym', '2021-03-09 15:58:16', '2021-03-09 15:58:16'),
(89, 122, 'Car Park', '2021-03-09 20:54:38', '2021-03-09 20:54:38'),
(90, 122, 'Standby Generator', '2021-03-09 20:54:38', '2021-03-09 20:54:38'),
(91, 122, 'Water Reservoir', '2021-03-09 20:54:38', '2021-03-09 20:54:38'),
(92, 123, 'Garden', '2021-03-09 21:04:48', '2021-03-09 21:04:48'),
(93, 123, 'Car Park', '2021-03-09 21:04:48', '2021-03-09 21:04:48'),
(94, 123, 'Fire Extinguisher', '2021-03-09 21:04:48', '2021-03-09 21:04:48'),
(95, 123, 'Standby Generator', '2021-03-09 21:04:48', '2021-03-09 21:04:48'),
(96, 124, 'Car Park', '2021-03-09 21:12:47', '2021-03-09 21:12:47'),
(97, 124, 'Standby Generator', '2021-03-09 21:12:47', '2021-03-09 21:12:47'),
(98, 125, 'Laundary', '2021-03-09 21:36:02', '2021-03-09 21:36:02'),
(99, 125, 'Car Park', '2021-03-09 21:36:02', '2021-03-09 21:36:02'),
(100, 125, 'Standby Generator', '2021-03-09 21:36:02', '2021-03-09 21:36:02'),
(101, 125, 'Wifi Connection', '2021-03-09 21:36:02', '2021-03-09 21:36:02'),
(102, 125, 'Water Reservoir', '2021-03-09 21:36:02', '2021-03-09 21:36:02'),
(103, 126, 'Laundary', '2021-03-09 22:09:38', '2021-03-09 22:09:38'),
(104, 126, 'Fire Extinguisher', '2021-03-09 22:09:38', '2021-03-09 22:09:38'),
(105, 126, 'Standby Generator', '2021-03-09 22:09:38', '2021-03-09 22:09:38'),
(106, 126, 'Water Reservoir', '2021-03-09 22:09:38', '2021-03-09 22:09:38'),
(107, 127, 'Swimming Pool', '2021-03-09 22:16:47', '2021-03-09 22:16:47'),
(108, 127, 'Car Park', '2021-03-09 22:16:47', '2021-03-09 22:16:47'),
(109, 127, 'Fire Extinguisher', '2021-03-09 22:16:47', '2021-03-09 22:16:47'),
(110, 128, 'Laundary', '2021-03-09 22:26:49', '2021-03-09 22:26:49'),
(111, 128, 'Standby Generator', '2021-03-09 22:26:50', '2021-03-09 22:26:50'),
(112, 128, 'Wifi Connection', '2021-03-09 22:26:50', '2021-03-09 22:26:50'),
(113, 129, 'Standby Generator', '2021-03-09 22:52:52', '2021-03-09 22:52:52'),
(114, 129, 'Water Reservoir', '2021-03-09 22:52:52', '2021-03-09 22:52:52'),
(115, 130, 'Car Park', '2021-03-09 22:59:43', '2021-03-09 22:59:43'),
(116, 130, 'Water Reservoir', '2021-03-09 22:59:43', '2021-03-09 22:59:43'),
(117, 116, 'Laundary', '2021-03-10 14:52:17', '2021-03-10 14:52:17'),
(118, 116, 'Standby Generator', '2021-03-10 14:52:17', '2021-03-10 14:52:17'),
(119, 131, 'Laundary', '2021-03-10 15:13:29', '2021-03-10 15:13:29'),
(120, 131, 'Fire Extinguisher', '2021-03-10 15:13:29', '2021-03-10 15:13:29'),
(121, 131, 'Standby Generator', '2021-03-10 15:13:29', '2021-03-10 15:13:29'),
(122, 131, 'Water Reservoir', '2021-03-10 15:13:29', '2021-03-10 15:13:29'),
(123, 132, 'Car Park', '2021-03-10 15:22:47', '2021-03-10 15:22:47'),
(124, 132, 'Fire Extinguisher', '2021-03-10 15:22:47', '2021-03-10 15:22:47'),
(125, 132, 'Standby Generator', '2021-03-10 15:22:47', '2021-03-10 15:22:47'),
(126, 132, 'Water Reservoir', '2021-03-10 15:22:47', '2021-03-10 15:22:47'),
(127, 133, 'Laundary', '2021-03-10 15:45:38', '2021-03-10 15:45:38'),
(128, 133, 'Car Park', '2021-03-10 15:45:38', '2021-03-10 15:45:38'),
(129, 133, 'Standby Generator', '2021-03-10 15:45:38', '2021-03-10 15:45:38'),
(130, 133, 'Water Reservoir', '2021-03-10 15:45:38', '2021-03-10 15:45:38'),
(131, 134, 'Fire Extinguisher', '2021-03-10 15:52:37', '2021-03-10 15:52:37'),
(132, 134, 'Standby Generator', '2021-03-10 15:52:37', '2021-03-10 15:52:37'),
(133, 134, 'Water Reservoir', '2021-03-10 15:52:37', '2021-03-10 15:52:37'),
(134, 135, 'Standby Generator', '2021-03-10 15:58:37', '2021-03-10 15:58:37'),
(135, 135, 'Water Reservoir', '2021-03-10 15:58:37', '2021-03-10 15:58:37'),
(136, 136, 'Car Park', '2021-03-10 16:03:09', '2021-03-10 16:03:09'),
(137, 136, 'Standby Generator', '2021-03-10 16:03:09', '2021-03-10 16:03:09'),
(138, 136, 'Water Reservoir', '2021-03-10 16:03:09', '2021-03-10 16:03:09'),
(139, 137, 'Standby Generator', '2021-03-10 16:21:54', '2021-03-10 16:21:54'),
(140, 137, 'Water Reservoir', '2021-03-10 16:21:54', '2021-03-10 16:21:54'),
(141, 138, 'Fire Extinguisher', '2021-03-10 16:28:00', '2021-03-10 16:28:00'),
(142, 138, 'Standby Generator', '2021-03-10 16:28:00', '2021-03-10 16:28:00'),
(143, 138, 'Water Reservoir', '2021-03-10 16:28:00', '2021-03-10 16:28:00'),
(144, 139, 'Laundary', '2021-03-10 16:35:24', '2021-03-10 16:35:24'),
(145, 139, 'Standby Generator', '2021-03-10 16:35:24', '2021-03-10 16:35:24'),
(146, 139, 'Water Reservoir', '2021-03-10 16:35:24', '2021-03-10 16:35:24'),
(147, 140, 'Car Park', '2021-03-10 16:43:22', '2021-03-10 16:43:22'),
(148, 140, 'Standby Generator', '2021-03-10 16:43:22', '2021-03-10 16:43:22'),
(149, 140, 'Water Reservoir', '2021-03-10 16:43:22', '2021-03-10 16:43:22'),
(150, 141, 'Laundary', '2021-03-10 16:51:57', '2021-03-10 16:51:57'),
(151, 141, 'Car Park', '2021-03-10 16:51:57', '2021-03-10 16:51:57'),
(152, 141, 'Standby Generator', '2021-03-10 16:51:57', '2021-03-10 16:51:57'),
(153, 141, 'Water Reservoir', '2021-03-10 16:51:57', '2021-03-10 16:51:57'),
(154, 141, 'Gym', '2021-03-10 16:51:57', '2021-03-10 16:51:57'),
(155, 142, 'Car Park', '2021-03-10 17:04:20', '2021-03-10 17:04:20'),
(156, 142, 'Standby Generator', '2021-03-10 17:04:20', '2021-03-10 17:04:20'),
(157, 142, 'Water Reservoir', '2021-03-10 17:04:20', '2021-03-10 17:04:20'),
(158, 143, 'Car Park', '2021-03-10 17:14:15', '2021-03-10 17:14:15'),
(159, 143, 'Standby Generator', '2021-03-10 17:14:15', '2021-03-10 17:14:15'),
(160, 143, 'Water Reservoir', '2021-03-10 17:14:15', '2021-03-10 17:14:15'),
(161, 144, 'Car Park', '2021-03-10 17:33:27', '2021-03-10 17:33:27'),
(162, 144, 'Fire Extinguisher', '2021-03-10 17:33:27', '2021-03-10 17:33:27'),
(163, 144, 'Standby Generator', '2021-03-10 17:33:27', '2021-03-10 17:33:27'),
(164, 144, 'Water Reservoir', '2021-03-10 17:33:27', '2021-03-10 17:33:27'),
(165, 145, 'Car Park', '2021-03-10 17:45:51', '2021-03-10 17:45:51'),
(166, 145, 'Standby Generator', '2021-03-10 17:45:51', '2021-03-10 17:45:51'),
(167, 145, 'Water Reservoir', '2021-03-10 17:45:51', '2021-03-10 17:45:51'),
(168, 146, 'Car Park', '2021-03-10 17:54:20', '2021-03-10 17:54:20'),
(169, 146, 'Fire Extinguisher', '2021-03-10 17:54:20', '2021-03-10 17:54:20'),
(170, 146, 'Standby Generator', '2021-03-10 17:54:20', '2021-03-10 17:54:20'),
(171, 146, 'Water Reservoir', '2021-03-10 17:54:20', '2021-03-10 17:54:20'),
(172, 147, 'Car Park', '2021-03-10 18:05:31', '2021-03-10 18:05:31'),
(173, 147, 'Fire Extinguisher', '2021-03-10 18:05:31', '2021-03-10 18:05:31'),
(174, 147, 'Standby Generator', '2021-03-10 18:05:31', '2021-03-10 18:05:31'),
(175, 147, 'Water Reservoir', '2021-03-10 18:05:31', '2021-03-10 18:05:31'),
(176, 147, 'Gym', '2021-03-10 18:05:31', '2021-03-10 18:05:31'),
(177, 148, 'Car Park', '2021-03-10 19:22:35', '2021-03-10 19:22:35'),
(178, 148, 'Fire Extinguisher', '2021-03-10 19:22:35', '2021-03-10 19:22:35'),
(179, 148, 'Standby Generator', '2021-03-10 19:22:35', '2021-03-10 19:22:35'),
(180, 148, 'Water Reservoir', '2021-03-10 19:22:35', '2021-03-10 19:22:35'),
(181, 149, 'Car Park', '2021-03-10 19:31:36', '2021-03-10 19:31:36'),
(182, 149, 'Standby Generator', '2021-03-10 19:31:36', '2021-03-10 19:31:36'),
(183, 149, 'Water Reservoir', '2021-03-10 19:31:36', '2021-03-10 19:31:36'),
(184, 150, 'Car Park', '2021-03-10 19:50:15', '2021-03-10 19:50:15'),
(185, 150, 'Standby Generator', '2021-03-10 19:50:15', '2021-03-10 19:50:15'),
(186, 150, 'Water Reservoir', '2021-03-10 19:50:15', '2021-03-10 19:50:15'),
(187, 151, 'Car Park', '2021-03-11 14:13:07', '2021-03-11 14:13:07'),
(188, 151, 'Fire Extinguisher', '2021-03-11 14:13:07', '2021-03-11 14:13:07'),
(189, 151, 'Standby Generator', '2021-03-11 14:13:07', '2021-03-11 14:13:07'),
(190, 151, 'Water Reservoir', '2021-03-11 14:13:07', '2021-03-11 14:13:07'),
(191, 152, 'Car Park', '2021-03-11 14:19:51', '2021-03-11 14:19:51'),
(192, 152, 'Fire Extinguisher', '2021-03-11 14:19:51', '2021-03-11 14:19:51'),
(193, 153, 'Car Park', '2021-03-11 14:25:44', '2021-03-11 14:25:44'),
(194, 153, 'Fire Extinguisher', '2021-03-11 14:25:44', '2021-03-11 14:25:44'),
(195, 153, 'Standby Generator', '2021-03-11 14:25:44', '2021-03-11 14:25:44'),
(196, 154, 'Car Park', '2021-03-11 14:49:51', '2021-03-11 14:49:51'),
(197, 154, 'Fire Extinguisher', '2021-03-11 14:49:51', '2021-03-11 14:49:51'),
(198, 154, 'Water Reservoir', '2021-03-11 14:49:51', '2021-03-11 14:49:51'),
(199, 155, 'Car Park', '2021-03-11 14:58:20', '2021-03-11 14:58:20'),
(200, 155, 'Fire Extinguisher', '2021-03-11 14:58:20', '2021-03-11 14:58:20'),
(201, 155, 'Standby Generator', '2021-03-11 14:58:20', '2021-03-11 14:58:20'),
(202, 155, 'Water Reservoir', '2021-03-11 14:58:20', '2021-03-11 14:58:20'),
(203, 155, 'Gym', '2021-03-11 14:58:20', '2021-03-11 14:58:20'),
(204, 156, 'Car Park', '2021-03-11 15:07:21', '2021-03-11 15:07:21'),
(205, 156, 'Fire Extinguisher', '2021-03-11 15:07:21', '2021-03-11 15:07:21'),
(206, 156, 'Standby Generator', '2021-03-11 15:07:21', '2021-03-11 15:07:21'),
(207, 157, 'Standby Generator', '2021-03-11 15:14:21', '2021-03-11 15:14:21'),
(208, 157, 'Water Reservoir', '2021-03-11 15:14:21', '2021-03-11 15:14:21'),
(209, 158, 'Standby Generator', '2021-03-11 15:20:38', '2021-03-11 15:20:38'),
(210, 158, 'Water Reservoir', '2021-03-11 15:20:38', '2021-03-11 15:20:38'),
(211, 159, 'Laundary', '2021-03-11 16:28:04', '2021-03-11 16:28:04'),
(212, 159, 'Car Park', '2021-03-11 16:28:04', '2021-03-11 16:28:04'),
(213, 159, 'Fire Extinguisher', '2021-03-11 16:28:04', '2021-03-11 16:28:04'),
(214, 159, 'Standby Generator', '2021-03-11 16:28:04', '2021-03-11 16:28:04'),
(215, 160, 'Car Park', '2021-03-11 16:34:30', '2021-03-11 16:34:30'),
(216, 160, 'Standby Generator', '2021-03-11 16:34:30', '2021-03-11 16:34:30'),
(217, 160, 'Water Reservoir', '2021-03-11 16:34:30', '2021-03-11 16:34:30'),
(218, 161, 'Car Park', '2021-03-11 16:42:16', '2021-03-11 16:42:16'),
(219, 161, 'Fire Extinguisher', '2021-03-11 16:42:16', '2021-03-11 16:42:16'),
(220, 161, 'Standby Generator', '2021-03-11 16:42:16', '2021-03-11 16:42:16'),
(221, 161, 'Water Reservoir', '2021-03-11 16:42:16', '2021-03-11 16:42:16'),
(222, 163, 'Swimming Pool', '2021-03-11 16:58:21', '2021-03-11 16:58:21'),
(223, 163, 'Standby Generator', '2021-03-11 16:58:21', '2021-03-11 16:58:21'),
(224, 164, 'Car Park', '2021-03-11 17:19:39', '2021-03-11 17:19:39'),
(225, 164, 'Fire Extinguisher', '2021-03-11 17:19:39', '2021-03-11 17:19:39'),
(226, 164, 'Standby Generator', '2021-03-11 17:19:39', '2021-03-11 17:19:39'),
(227, 165, 'Car Park', '2021-03-11 17:30:16', '2021-03-11 17:30:16'),
(228, 165, 'Standby Generator', '2021-03-11 17:30:16', '2021-03-11 17:30:16'),
(229, 165, 'Water Reservoir', '2021-03-11 17:30:16', '2021-03-11 17:30:16'),
(230, 166, 'Car Park', '2021-03-11 17:36:12', '2021-03-11 17:36:12'),
(231, 166, 'Fire Extinguisher', '2021-03-11 17:36:12', '2021-03-11 17:36:12'),
(232, 166, 'Standby Generator', '2021-03-11 17:36:12', '2021-03-11 17:36:12'),
(233, 167, 'Car Park', '2021-03-11 17:52:27', '2021-03-11 17:52:27'),
(234, 167, 'Standby Generator', '2021-03-11 17:52:27', '2021-03-11 17:52:27'),
(235, 167, 'Water Reservoir', '2021-03-11 17:52:27', '2021-03-11 17:52:27'),
(236, 168, 'Standby Generator', '2021-03-11 18:03:00', '2021-03-11 18:03:00'),
(237, 168, 'Water Reservoir', '2021-03-11 18:03:00', '2021-03-11 18:03:00'),
(238, 169, 'Car Park', '2021-03-11 18:09:11', '2021-03-11 18:09:11'),
(239, 169, 'Standby Generator', '2021-03-11 18:09:11', '2021-03-11 18:09:11'),
(240, 169, 'Water Reservoir', '2021-03-11 18:09:11', '2021-03-11 18:09:11'),
(241, 170, 'Fire Extinguisher', '2021-03-11 18:16:27', '2021-03-11 18:16:27'),
(242, 170, 'Standby Generator', '2021-03-11 18:16:27', '2021-03-11 18:16:27'),
(243, 170, 'Water Reservoir', '2021-03-11 18:16:27', '2021-03-11 18:16:27'),
(244, 171, 'Car Park', '2021-03-11 18:35:05', '2021-03-11 18:35:05'),
(245, 171, 'Standby Generator', '2021-03-11 18:35:05', '2021-03-11 18:35:05'),
(246, 171, 'Water Reservoir', '2021-03-11 18:35:05', '2021-03-11 18:35:05'),
(247, 172, 'Standby Generator', '2021-03-11 20:05:01', '2021-03-11 20:05:01'),
(248, 172, 'Water Reservoir', '2021-03-11 20:05:01', '2021-03-11 20:05:01'),
(249, 173, 'Fire Extinguisher', '2021-03-11 20:09:22', '2021-03-11 20:09:22'),
(250, 173, 'Standby Generator', '2021-03-11 20:09:22', '2021-03-11 20:09:22'),
(251, 173, 'Water Reservoir', '2021-03-11 20:09:22', '2021-03-11 20:09:22'),
(252, 174, 'Standby Generator', '2021-03-11 20:16:48', '2021-03-11 20:16:48'),
(253, 174, 'Water Reservoir', '2021-03-11 20:16:48', '2021-03-11 20:16:48'),
(254, 174, 'Gym', '2021-03-11 20:16:48', '2021-03-11 20:16:48'),
(255, 176, 'Standby Generator', '2021-03-11 20:29:05', '2021-03-11 20:29:05'),
(256, 176, 'Water Reservoir', '2021-03-11 20:29:05', '2021-03-11 20:29:05'),
(257, 176, 'Gym', '2021-03-11 20:29:05', '2021-03-11 20:29:05'),
(258, 177, 'Fire Extinguisher', '2021-03-11 20:34:07', '2021-03-11 20:34:07'),
(259, 177, 'Standby Generator', '2021-03-11 20:34:07', '2021-03-11 20:34:07'),
(260, 177, 'Water Reservoir', '2021-03-11 20:34:07', '2021-03-11 20:34:07'),
(261, 177, 'Gym', '2021-03-11 20:34:07', '2021-03-11 20:34:07'),
(262, 178, 'Car Park', '2021-03-11 20:39:38', '2021-03-11 20:39:38'),
(263, 178, 'Standby Generator', '2021-03-11 20:39:38', '2021-03-11 20:39:38'),
(264, 178, 'Water Reservoir', '2021-03-11 20:39:38', '2021-03-11 20:39:38'),
(265, 178, 'Gym', '2021-03-11 20:39:38', '2021-03-11 20:39:38'),
(266, 179, 'Fire Extinguisher', '2021-03-11 20:49:02', '2021-03-11 20:49:02'),
(267, 179, 'Standby Generator', '2021-03-11 20:49:02', '2021-03-11 20:49:02'),
(268, 179, 'Water Reservoir', '2021-03-11 20:49:02', '2021-03-11 20:49:02'),
(269, 179, 'Gym', '2021-03-11 20:49:03', '2021-03-11 20:49:03'),
(270, 180, 'Standby Generator', '2021-03-11 21:18:39', '2021-03-11 21:18:39'),
(271, 180, 'Water Reservoir', '2021-03-11 21:18:39', '2021-03-11 21:18:39'),
(272, 180, 'Gym', '2021-03-11 21:18:39', '2021-03-11 21:18:39'),
(273, 181, 'Standby Generator', '2021-03-11 21:27:44', '2021-03-11 21:27:44'),
(274, 181, 'Water Reservoir', '2021-03-11 21:27:44', '2021-03-11 21:27:44'),
(275, 182, 'Standby Generator', '2021-03-11 21:50:11', '2021-03-11 21:50:11'),
(276, 182, 'Water Reservoir', '2021-03-11 21:50:11', '2021-03-11 21:50:11'),
(277, 182, 'Gym', '2021-03-11 21:50:11', '2021-03-11 21:50:11'),
(278, 183, 'Fire Extinguisher', '2021-03-11 21:58:46', '2021-03-11 21:58:46'),
(279, 183, 'Standby Generator', '2021-03-11 21:58:46', '2021-03-11 21:58:46'),
(280, 183, 'Water Reservoir', '2021-03-11 21:58:46', '2021-03-11 21:58:46'),
(281, 183, 'Gym', '2021-03-11 21:58:46', '2021-03-11 21:58:46'),
(282, 184, 'Standby Generator', '2021-03-11 22:16:27', '2021-03-11 22:16:27'),
(283, 184, 'Water Reservoir', '2021-03-11 22:16:27', '2021-03-11 22:16:27'),
(284, 184, 'Gym', '2021-03-11 22:16:27', '2021-03-11 22:16:27'),
(285, 185, 'Fire Extinguisher', '2021-03-11 22:25:33', '2021-03-11 22:25:33'),
(286, 185, 'Standby Generator', '2021-03-11 22:25:33', '2021-03-11 22:25:33'),
(287, 185, 'Water Reservoir', '2021-03-11 22:25:33', '2021-03-11 22:25:33'),
(288, 185, 'Gym', '2021-03-11 22:25:33', '2021-03-11 22:25:33'),
(289, 186, 'Swimming Pool', '2021-03-11 22:37:30', '2021-03-11 22:37:30'),
(290, 186, 'Garden', '2021-03-11 22:37:30', '2021-03-11 22:37:30'),
(291, 186, 'Car Park', '2021-03-11 22:37:30', '2021-03-11 22:37:30'),
(292, 186, 'Fire Extinguisher', '2021-03-11 22:37:30', '2021-03-11 22:37:30'),
(293, 186, 'Standby Generator', '2021-03-11 22:37:30', '2021-03-11 22:37:30'),
(294, 186, 'Wifi Connection', '2021-03-11 22:37:30', '2021-03-11 22:37:30'),
(295, 186, 'Water Reservoir', '2021-03-11 22:37:30', '2021-03-11 22:37:30'),
(296, 186, 'Gym', '2021-03-11 22:37:30', '2021-03-11 22:37:30'),
(297, 187, 'Car Park', '2021-03-15 14:30:09', '2021-03-15 14:30:09'),
(298, 187, 'Fire Extinguisher', '2021-03-15 14:30:09', '2021-03-15 14:30:09'),
(299, 187, 'Standby Generator', '2021-03-15 14:30:09', '2021-03-15 14:30:09'),
(300, 187, 'Wifi Connection', '2021-03-15 14:30:09', '2021-03-15 14:30:09'),
(301, 187, 'Water Reservoir', '2021-03-15 14:30:09', '2021-03-15 14:30:09'),
(302, 188, 'Car Park', '2021-03-15 14:50:00', '2021-03-15 14:50:00'),
(303, 188, 'Fire Extinguisher', '2021-03-15 14:50:00', '2021-03-15 14:50:00'),
(304, 188, 'Standby Generator', '2021-03-15 14:50:00', '2021-03-15 14:50:00'),
(305, 188, 'Water Reservoir', '2021-03-15 14:50:00', '2021-03-15 14:50:00'),
(306, 189, 'Fire Extinguisher', '2021-03-15 19:23:56', '2021-03-15 19:23:56'),
(307, 189, 'Standby Generator', '2021-03-15 19:23:56', '2021-03-15 19:23:56'),
(308, 189, 'Water Reservoir', '2021-03-15 19:23:56', '2021-03-15 19:23:56'),
(309, 189, 'Gym', '2021-03-15 19:23:56', '2021-03-15 19:23:56'),
(310, 190, 'Fire Extinguisher', '2021-03-15 19:38:29', '2021-03-15 19:38:29'),
(311, 190, 'Standby Generator', '2021-03-15 19:38:29', '2021-03-15 19:38:29'),
(312, 190, 'Water Reservoir', '2021-03-15 19:38:29', '2021-03-15 19:38:29'),
(313, 190, 'Gym', '2021-03-15 19:38:29', '2021-03-15 19:38:29'),
(314, 191, 'Car Park', '2021-03-15 19:49:45', '2021-03-15 19:49:45'),
(315, 191, 'Fire Extinguisher', '2021-03-15 19:49:45', '2021-03-15 19:49:45'),
(316, 191, 'Standby Generator', '2021-03-15 19:49:45', '2021-03-15 19:49:45'),
(317, 191, 'Water Reservoir', '2021-03-15 19:49:45', '2021-03-15 19:49:45'),
(318, 192, 'Car Park', '2021-03-15 19:53:25', '2021-03-15 19:53:25'),
(319, 192, 'Fire Extinguisher', '2021-03-15 19:53:25', '2021-03-15 19:53:25'),
(320, 192, 'Standby Generator', '2021-03-15 19:53:25', '2021-03-15 19:53:25'),
(321, 192, 'Water Reservoir', '2021-03-15 19:53:25', '2021-03-15 19:53:25'),
(322, 193, 'Car Park', '2021-03-15 19:59:15', '2021-03-15 19:59:15'),
(323, 193, 'Fire Extinguisher', '2021-03-15 19:59:15', '2021-03-15 19:59:15'),
(324, 193, 'Standby Generator', '2021-03-15 19:59:15', '2021-03-15 19:59:15'),
(325, 193, 'Water Reservoir', '2021-03-15 19:59:15', '2021-03-15 19:59:15'),
(326, 193, 'Gym', '2021-03-15 19:59:15', '2021-03-15 19:59:15'),
(327, 194, 'Car Park', '2021-03-15 20:05:09', '2021-03-15 20:05:09'),
(328, 194, 'Fire Extinguisher', '2021-03-15 20:05:09', '2021-03-15 20:05:09'),
(329, 194, 'Standby Generator', '2021-03-15 20:05:09', '2021-03-15 20:05:09'),
(330, 194, 'Water Reservoir', '2021-03-15 20:05:09', '2021-03-15 20:05:09'),
(331, 195, 'Car Park', '2021-03-15 20:10:26', '2021-03-15 20:10:26'),
(332, 195, 'Fire Extinguisher', '2021-03-15 20:10:26', '2021-03-15 20:10:26'),
(333, 195, 'Standby Generator', '2021-03-15 20:10:26', '2021-03-15 20:10:26'),
(334, 195, 'Water Reservoir', '2021-03-15 20:10:26', '2021-03-15 20:10:26'),
(335, 196, 'Car Park', '2021-03-15 20:18:19', '2021-03-15 20:18:19'),
(336, 196, 'Fire Extinguisher', '2021-03-15 20:18:19', '2021-03-15 20:18:19'),
(337, 196, 'Standby Generator', '2021-03-15 20:18:19', '2021-03-15 20:18:19'),
(338, 196, 'Water Reservoir', '2021-03-15 20:18:19', '2021-03-15 20:18:19'),
(339, 196, 'Gym', '2021-03-15 20:18:19', '2021-03-15 20:18:19'),
(340, 197, 'Car Park', '2021-03-15 20:25:43', '2021-03-15 20:25:43'),
(341, 197, 'Fire Extinguisher', '2021-03-15 20:25:43', '2021-03-15 20:25:43'),
(342, 197, 'Standby Generator', '2021-03-15 20:25:43', '2021-03-15 20:25:43'),
(343, 197, 'Water Reservoir', '2021-03-15 20:25:43', '2021-03-15 20:25:43'),
(344, 197, 'Gym', '2021-03-15 20:25:43', '2021-03-15 20:25:43'),
(345, 198, 'Car Park', '2021-03-15 20:29:26', '2021-03-15 20:29:26'),
(346, 198, 'Fire Extinguisher', '2021-03-15 20:29:26', '2021-03-15 20:29:26'),
(347, 198, 'Standby Generator', '2021-03-15 20:29:26', '2021-03-15 20:29:26'),
(348, 199, 'Car Park', '2021-03-15 20:32:58', '2021-03-15 20:32:58'),
(349, 199, 'Fire Extinguisher', '2021-03-15 20:32:58', '2021-03-15 20:32:58'),
(350, 199, 'Standby Generator', '2021-03-15 20:32:58', '2021-03-15 20:32:58'),
(351, 199, 'Wifi Connection', '2021-03-15 20:32:58', '2021-03-15 20:32:58'),
(352, 199, 'Water Reservoir', '2021-03-15 20:32:58', '2021-03-15 20:32:58'),
(353, 199, 'Gym', '2021-03-15 20:32:58', '2021-03-15 20:32:58'),
(354, 200, 'Car Park', '2021-03-15 20:41:21', '2021-03-15 20:41:21'),
(355, 200, 'Fire Extinguisher', '2021-03-15 20:41:21', '2021-03-15 20:41:21'),
(356, 200, 'Standby Generator', '2021-03-15 20:41:21', '2021-03-15 20:41:21'),
(357, 200, 'Gym', '2021-03-15 20:41:21', '2021-03-15 20:41:21'),
(358, 201, 'Car Park', '2021-03-15 21:03:02', '2021-03-15 21:03:02'),
(359, 201, 'Fire Extinguisher', '2021-03-15 21:03:02', '2021-03-15 21:03:02'),
(360, 201, 'Standby Generator', '2021-03-15 21:03:02', '2021-03-15 21:03:02'),
(361, 201, 'Water Reservoir', '2021-03-15 21:03:02', '2021-03-15 21:03:02'),
(362, 201, 'Gym', '2021-03-15 21:03:02', '2021-03-15 21:03:02'),
(363, 202, 'Swimming Pool', '2021-03-15 21:13:27', '2021-03-15 21:13:27'),
(364, 202, 'Laundary', '2021-03-15 21:13:27', '2021-03-15 21:13:27'),
(365, 202, 'Fire Extinguisher', '2021-03-15 21:13:27', '2021-03-15 21:13:27'),
(366, 202, 'Standby Generator', '2021-03-15 21:13:27', '2021-03-15 21:13:27'),
(367, 202, 'Water Reservoir', '2021-03-15 21:13:27', '2021-03-15 21:13:27'),
(368, 203, 'Car Park', '2021-03-15 21:19:09', '2021-03-15 21:19:09'),
(369, 203, 'Fire Extinguisher', '2021-03-15 21:19:09', '2021-03-15 21:19:09'),
(370, 203, 'Water Reservoir', '2021-03-15 21:19:09', '2021-03-15 21:19:09'),
(371, 204, 'Car Park', '2021-03-15 21:24:35', '2021-03-15 21:24:35'),
(372, 204, 'Fire Extinguisher', '2021-03-15 21:24:35', '2021-03-15 21:24:35'),
(373, 204, 'Standby Generator', '2021-03-15 21:24:35', '2021-03-15 21:24:35'),
(374, 204, 'Water Reservoir', '2021-03-15 21:24:35', '2021-03-15 21:24:35'),
(375, 204, 'Gym', '2021-03-15 21:24:35', '2021-03-15 21:24:35'),
(376, 205, 'Fire Extinguisher', '2021-03-15 21:36:02', '2021-03-15 21:36:02'),
(377, 205, 'Standby Generator', '2021-03-15 21:36:02', '2021-03-15 21:36:02'),
(378, 205, 'Water Reservoir', '2021-03-15 21:36:02', '2021-03-15 21:36:02'),
(379, 205, 'Gym', '2021-03-15 21:36:02', '2021-03-15 21:36:02'),
(380, 207, 'Car Park', '2021-03-15 21:53:16', '2021-03-15 21:53:16'),
(381, 207, 'Fire Extinguisher', '2021-03-15 21:53:16', '2021-03-15 21:53:16'),
(382, 207, 'Standby Generator', '2021-03-15 21:53:16', '2021-03-15 21:53:16'),
(383, 207, 'Water Reservoir', '2021-03-15 21:53:16', '2021-03-15 21:53:16'),
(384, 207, 'Gym', '2021-03-15 21:53:16', '2021-03-15 21:53:16'),
(385, 208, 'Car Park', '2021-03-15 22:03:25', '2021-03-15 22:03:25'),
(386, 208, 'Fire Extinguisher', '2021-03-15 22:03:25', '2021-03-15 22:03:25'),
(387, 208, 'Standby Generator', '2021-03-15 22:03:25', '2021-03-15 22:03:25'),
(388, 208, 'Wifi Connection', '2021-03-15 22:03:25', '2021-03-15 22:03:25'),
(389, 208, 'Water Reservoir', '2021-03-15 22:03:25', '2021-03-15 22:03:25'),
(390, 208, 'Gym', '2021-03-15 22:03:25', '2021-03-15 22:03:25'),
(391, 209, 'Car Park', '2021-03-15 22:10:30', '2021-03-15 22:10:30'),
(392, 209, 'Fire Extinguisher', '2021-03-15 22:10:30', '2021-03-15 22:10:30'),
(393, 209, 'Standby Generator', '2021-03-15 22:10:30', '2021-03-15 22:10:30'),
(394, 209, 'Gym', '2021-03-15 22:10:30', '2021-03-15 22:10:30'),
(395, 210, 'Fire Extinguisher', '2021-03-15 22:20:19', '2021-03-15 22:20:19'),
(396, 210, 'Standby Generator', '2021-03-15 22:20:19', '2021-03-15 22:20:19'),
(397, 211, 'Car Park', '2021-03-15 22:31:08', '2021-03-15 22:31:08'),
(398, 211, 'Fire Extinguisher', '2021-03-15 22:31:08', '2021-03-15 22:31:08'),
(399, 211, 'Standby Generator', '2021-03-15 22:31:08', '2021-03-15 22:31:08'),
(400, 211, 'Wifi Connection', '2021-03-15 22:31:08', '2021-03-15 22:31:08'),
(401, 211, 'Water Reservoir', '2021-03-15 22:31:08', '2021-03-15 22:31:08'),
(402, 212, 'Standby Generator', '2021-03-15 22:36:22', '2021-03-15 22:36:22'),
(403, 212, 'Gym', '2021-03-15 22:36:22', '2021-03-15 22:36:22'),
(404, 213, 'Fire Extinguisher', '2021-03-15 22:43:10', '2021-03-15 22:43:10'),
(405, 213, 'Standby Generator', '2021-03-15 22:43:10', '2021-03-15 22:43:10'),
(406, 213, 'Water Reservoir', '2021-03-15 22:43:10', '2021-03-15 22:43:10'),
(407, 213, 'Gym', '2021-03-15 22:43:10', '2021-03-15 22:43:10'),
(408, 214, 'Car Park', '2021-03-15 22:48:41', '2021-03-15 22:48:41'),
(409, 214, 'Fire Extinguisher', '2021-03-15 22:48:41', '2021-03-15 22:48:41'),
(410, 214, 'Standby Generator', '2021-03-15 22:48:41', '2021-03-15 22:48:41'),
(411, 214, 'Water Reservoir', '2021-03-15 22:48:41', '2021-03-15 22:48:41'),
(412, 214, 'Gym', '2021-03-15 22:48:41', '2021-03-15 22:48:41'),
(413, 215, 'Fire Extinguisher', '2021-03-15 22:52:49', '2021-03-15 22:52:49'),
(414, 215, 'Standby Generator', '2021-03-15 22:52:49', '2021-03-15 22:52:49'),
(415, 216, 'Fire Extinguisher', '2021-03-15 22:57:15', '2021-03-15 22:57:15'),
(416, 216, 'Standby Generator', '2021-03-15 22:57:15', '2021-03-15 22:57:15'),
(417, 216, 'Water Reservoir', '2021-03-15 22:57:15', '2021-03-15 22:57:15'),
(418, 216, 'Gym', '2021-03-15 22:57:15', '2021-03-15 22:57:15'),
(419, 218, 'Car Park', '2021-03-19 16:11:44', '2021-03-19 16:11:44'),
(420, 218, 'Fire Extinguisher', '2021-03-19 16:11:44', '2021-03-19 16:11:44'),
(421, 218, 'Standby Generator', '2021-03-19 16:11:44', '2021-03-19 16:11:44'),
(422, 218, 'Water Reservoir', '2021-03-19 16:11:44', '2021-03-19 16:11:44'),
(423, 219, 'Car Park', '2021-03-19 16:20:08', '2021-03-19 16:20:08'),
(424, 219, 'Fire Extinguisher', '2021-03-19 16:20:08', '2021-03-19 16:20:08'),
(425, 219, 'Water Reservoir', '2021-03-19 16:20:08', '2021-03-19 16:20:08'),
(426, 220, 'Standby Generator', '2021-03-19 16:24:38', '2021-03-19 16:24:38'),
(427, 220, 'Water Reservoir', '2021-03-19 16:24:38', '2021-03-19 16:24:38'),
(428, 221, 'Car Park', '2021-03-19 16:29:57', '2021-03-19 16:29:57'),
(429, 221, 'Fire Extinguisher', '2021-03-19 16:29:57', '2021-03-19 16:29:57'),
(430, 221, 'Standby Generator', '2021-03-19 16:29:57', '2021-03-19 16:29:57'),
(431, 221, 'Wifi Connection', '2021-03-19 16:29:57', '2021-03-19 16:29:57'),
(432, 222, 'Car Park', '2021-03-19 16:32:56', '2021-03-19 16:32:56'),
(433, 222, 'Fire Extinguisher', '2021-03-19 16:32:56', '2021-03-19 16:32:56'),
(434, 222, 'Standby Generator', '2021-03-19 16:32:56', '2021-03-19 16:32:56'),
(435, 222, 'Water Reservoir', '2021-03-19 16:32:56', '2021-03-19 16:32:56'),
(436, 223, 'Car Park', '2021-03-19 16:37:25', '2021-03-19 16:37:25'),
(437, 223, 'Fire Extinguisher', '2021-03-19 16:37:25', '2021-03-19 16:37:25'),
(438, 223, 'Wifi Connection', '2021-03-19 16:37:25', '2021-03-19 16:37:25'),
(439, 224, 'Car Park', '2021-03-19 16:41:15', '2021-03-19 16:41:15'),
(440, 224, 'Fire Extinguisher', '2021-03-19 16:41:15', '2021-03-19 16:41:15'),
(441, 224, 'Standby Generator', '2021-03-19 16:41:15', '2021-03-19 16:41:15'),
(442, 224, 'Water Reservoir', '2021-03-19 16:41:15', '2021-03-19 16:41:15'),
(443, 225, 'Car Park', '2021-03-19 16:45:11', '2021-03-19 16:45:11'),
(444, 225, 'Fire Extinguisher', '2021-03-19 16:45:11', '2021-03-19 16:45:11'),
(445, 225, 'Standby Generator', '2021-03-19 16:45:11', '2021-03-19 16:45:11'),
(446, 226, 'Standby Generator', '2021-03-19 17:29:17', '2021-03-19 17:29:17'),
(447, 226, 'Water Reservoir', '2021-03-19 17:29:17', '2021-03-19 17:29:17'),
(448, 226, 'Gym', '2021-03-19 17:29:17', '2021-03-19 17:29:17'),
(449, 227, 'Car Park', '2021-03-19 17:33:32', '2021-03-19 17:33:32'),
(450, 227, 'Fire Extinguisher', '2021-03-19 17:33:32', '2021-03-19 17:33:32'),
(451, 227, 'Standby Generator', '2021-03-19 17:33:32', '2021-03-19 17:33:32'),
(452, 227, 'Water Reservoir', '2021-03-19 17:33:32', '2021-03-19 17:33:32'),
(453, 228, 'Car Park', '2021-03-19 17:41:21', '2021-03-19 17:41:21'),
(454, 228, 'Fire Extinguisher', '2021-03-19 17:41:21', '2021-03-19 17:41:21'),
(455, 228, 'Standby Generator', '2021-03-19 17:41:21', '2021-03-19 17:41:21'),
(456, 228, 'Gym', '2021-03-19 17:41:21', '2021-03-19 17:41:21'),
(457, 229, 'Fire Extinguisher', '2021-03-19 18:09:04', '2021-03-19 18:09:04'),
(458, 229, 'Water Reservoir', '2021-03-19 18:09:04', '2021-03-19 18:09:04'),
(459, 230, 'Car Park', '2021-03-19 18:17:32', '2021-03-19 18:17:32'),
(460, 230, 'Fire Extinguisher', '2021-03-19 18:17:32', '2021-03-19 18:17:32'),
(461, 230, 'Standby Generator', '2021-03-19 18:17:32', '2021-03-19 18:17:32'),
(462, 230, 'Gym', '2021-03-19 18:17:32', '2021-03-19 18:17:32'),
(463, 231, 'Car Park', '2021-03-19 18:26:40', '2021-03-19 18:26:40'),
(464, 231, 'Fire Extinguisher', '2021-03-19 18:26:40', '2021-03-19 18:26:40'),
(465, 231, 'Standby Generator', '2021-03-19 18:26:40', '2021-03-19 18:26:40'),
(466, 231, 'Gym', '2021-03-19 18:26:40', '2021-03-19 18:26:40'),
(467, 232, 'Fire Extinguisher', '2021-03-19 18:33:55', '2021-03-19 18:33:55'),
(468, 232, 'Standby Generator', '2021-03-19 18:33:55', '2021-03-19 18:33:55'),
(469, 232, 'Water Reservoir', '2021-03-19 18:33:55', '2021-03-19 18:33:55'),
(470, 233, 'Car Park', '2021-03-19 18:40:01', '2021-03-19 18:40:01'),
(471, 233, 'Fire Extinguisher', '2021-03-19 18:40:01', '2021-03-19 18:40:01'),
(472, 233, 'Standby Generator', '2021-03-19 18:40:01', '2021-03-19 18:40:01'),
(473, 233, 'Water Reservoir', '2021-03-19 18:40:01', '2021-03-19 18:40:01'),
(474, 234, 'Car Park', '2021-03-19 19:33:17', '2021-03-19 19:33:17'),
(475, 234, 'Fire Extinguisher', '2021-03-19 19:33:17', '2021-03-19 19:33:17'),
(476, 234, 'Standby Generator', '2021-03-19 19:33:17', '2021-03-19 19:33:17'),
(477, 234, 'Water Reservoir', '2021-03-19 19:33:17', '2021-03-19 19:33:17'),
(478, 234, 'Gym', '2021-03-19 19:33:17', '2021-03-19 19:33:17'),
(479, 235, 'Garden', '2021-03-19 19:47:04', '2021-03-19 19:47:04'),
(480, 235, 'Car Park', '2021-03-19 19:47:04', '2021-03-19 19:47:04'),
(481, 235, 'Fire Extinguisher', '2021-03-19 19:47:04', '2021-03-19 19:47:04'),
(482, 235, 'Water Reservoir', '2021-03-19 19:47:04', '2021-03-19 19:47:04'),
(483, 236, 'Car Park', '2021-03-19 20:03:31', '2021-03-19 20:03:31'),
(484, 236, 'Fire Extinguisher', '2021-03-19 20:03:31', '2021-03-19 20:03:31'),
(485, 236, 'Standby Generator', '2021-03-19 20:03:31', '2021-03-19 20:03:31'),
(486, 236, 'Water Reservoir', '2021-03-19 20:03:31', '2021-03-19 20:03:31'),
(487, 236, 'Gym', '2021-03-19 20:03:31', '2021-03-19 20:03:31'),
(488, 217, 'Car Park', '2021-03-19 20:06:57', '2021-03-19 20:06:57'),
(489, 217, 'Fire Extinguisher', '2021-03-19 20:06:57', '2021-03-19 20:06:57'),
(490, 217, 'Standby Generator', '2021-03-19 20:06:57', '2021-03-19 20:06:57'),
(491, 217, 'Water Reservoir', '2021-03-19 20:06:57', '2021-03-19 20:06:57'),
(492, 237, 'Standby Generator', '2021-03-19 21:00:59', '2021-03-19 21:00:59'),
(493, 237, 'Water Reservoir', '2021-03-19 21:00:59', '2021-03-19 21:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `name`, `image`, `is_public`, `created_at`, `updated_at`) VALUES
(1, 'room', '1b9b2f2b9e4edec0211489370a55324b567b3874e.jpg', 1, '2021-03-02 17:08:12', '2021-03-02 17:08:47'),
(2, 'house', '17222a75a5e03dc94e0feb64b51606073190e9541.jpg', 1, '2021-03-02 17:11:01', '2021-03-02 17:11:52'),
(3, 'apartment', '1e3faa20ff7875530eef201fc7e38b2e6b00e6766.jpg', 1, '2021-03-02 17:11:27', '2021-03-02 17:12:00'),
(4, 'hostel', '10d46fbbb5805459abf7566e7b46e0beadc308d84.jpg', 1, '2021-03-02 17:11:47', '2021-03-02 17:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `report_properties`
--

CREATE TABLE `report_properties` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_charges`
--

CREATE TABLE `service_charges` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` double NOT NULL,
  `discount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(10) UNSIGNED NOT NULL,
  `reference_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `service_fee` double NOT NULL,
  `discount_fee` double NOT NULL,
  `currency` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verification_expired_at` datetime DEFAULT NULL,
  `verify_email` tinyint(1) NOT NULL DEFAULT 0,
  `verify_email_time` datetime DEFAULT NULL,
  `sms_verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_sms` tinyint(1) NOT NULL DEFAULT 0,
  `verify_sms_time` datetime DEFAULT NULL,
  `is_id_verified` tinyint(1) NOT NULL DEFAULT 0,
  `login_time` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `account_type`, `is_active`, `image`, `email_verification_token`, `email_verification_expired_at`, `verify_email`, `verify_email_time`, `sms_verification_token`, `verify_sms`, `verify_sms_time`, `is_id_verified`, `login_time`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'oshelter', 'osheltercompany@gmail.com', '$2y$10$npe9KXFYtbVbxgibczmV7ewazveQRVDghB/rmrYWxFtS8yDj41H0e', '0559970048', 'owner', 1, '1cbfb402eb8e104d31e42bb2d11f6b51878ac3219.png', '23054331', '2021-02-08 14:03:58', 1, '2021-02-08 13:06:45', NULL, 0, NULL, 0, '2021-03-25 17:51:14', 'NvInyUlfKUDv3Ts0tsW8zeqSXN92hEWlUOyBNNrXYVJegZgfjNR4B43bL9f9', '2021-02-08 13:03:58', '2021-03-25 21:51:14', NULL),
(2, 'alhaji abubakari sadiq', 'sadiqtutorials2016@gmail.com', '$2y$10$3PaJLvBgQ.3sIcbvzETY5O0Wlsb1hlK35WerJYEKNZyUd/8vNsJ8O', '0542650960', 'visitor', 1, '27eb0b671e717379814c277e6c97494ab5048adc8.jpeg', '55788362', '2021-02-11 22:54:58', 1, '2021-02-11 21:55:38', '8267', 1, '2021-02-11 21:58:11', 0, '2021-03-15 03:03:10', 'i5GmQEzM4MQmBQJeZvLyjiTnlBXqsYuBmzfW9O6Rcs7VvUjr3GgKWGSEPHMj', '2021-02-11 21:54:58', '2021-03-15 07:03:10', NULL),
(3, 'theresa', 'dankwahtheresa7@gmail.com', '$2y$10$81G0Bub8qcQxxDIywpzj5.fKACLFVlnwoqUl5ysYW4wkHElpSAc5.', '0579081020', 'visitor', 1, NULL, '67091503', '2021-02-25 15:33:30', 1, '2021-02-25 14:34:26', '9326', 1, '2021-02-25 14:45:57', 0, '2021-02-25 15:08:52', NULL, '2021-02-25 14:11:32', '2021-02-25 15:08:52', NULL),
(4, 'chris', 'chrishenphotosinc@gmail.com', '$2y$10$y2Iux05DMM1DhBXjnlpLW.7xIOzUFaMEzH67qobpV1jY1OL5EGGmO', '0200801381', 'visitor', 1, '462c9b36101f1d26f51c31224f7d57184685f1e53.jpeg', '22128400', '2021-02-25 15:39:31', 1, '2021-02-25 14:45:58', '3263', 1, '2021-02-25 15:07:19', 0, '2021-03-03 10:44:50', 'pMtyhImeMCTKKBEUB1uWXuibMwWUpNoWrniubhErBAzLQevSvT5p4lJHZMSI', '2021-02-25 14:36:46', '2021-03-03 11:01:41', NULL),
(5, 'lovely', 'kacheampong236@gmail.com', '$2y$10$TDJejSqY.xBDlD72bUCT5uYEk8kyTXk9/o3RIn6koZpUEfJzXiC9.', '0245497200', 'owner', 1, NULL, '81349785', '2021-02-25 17:32:07', 0, NULL, NULL, 0, NULL, 0, '2021-02-25 16:24:14', NULL, '2021-02-25 16:24:14', '2021-02-25 16:32:07', NULL),
(6, 'pius tweneboah-koduah', 'fiifipius@gmail.com', '$2y$10$4IeCnLaU6L1RpsCPXso6C.1ZAlpLOLekEq5BZxcCJ3UD6NsnzRHci', '0542398441', 'visitor', 1, NULL, '01486810', '2021-02-25 18:08:35', 1, '2021-02-25 17:08:57', '8983', 1, '2021-02-25 17:17:17', 0, '2021-03-10 06:18:40', 'mv6DPnyfbV3ZnkCJWzDMagDNeW5Vd7oDU7MgkPnnbkOdRoIIGQXmoyS2PnqU', '2021-02-25 17:08:35', '2021-03-10 11:18:40', NULL),
(7, 'bertino antwi richard', 'antwibertinorichard@gmail.com', '$2y$10$64wktgwpQpQce0jIEr191OJjDFzChZc7.mQTpkVbSbmFqNYANlVz.', '0245170575', 'owner', 1, NULL, '32594755', '2021-02-26 15:53:02', 1, '2021-02-26 14:54:10', NULL, 0, NULL, 0, '2021-02-26 14:53:02', NULL, '2021-02-26 14:53:02', '2021-02-26 14:54:10', NULL),
(8, 'cross', 'adokorisaac@gmail.com', '$2y$10$9L7u6X2hrh6n2TfzLQUPY.unR2z4VCYr3UPSH5zl2rSGZVost.RHm', '0541515288', 'owner', 1, NULL, '74728100', '2021-02-28 22:52:22', 1, '2021-02-28 21:53:33', '0568', 1, '2021-03-03 11:19:26', 0, '2021-03-16 15:14:58', 'di3r8bCTAvtkEjhpias56JBxeV5d5rB0h8K7YFJSusrP1ZNwlKSikTQyuVgq', '2021-02-28 21:52:22', '2021-03-16 19:14:58', NULL),
(9, 'marley', 'kofikumi56@gmail.com', '$2y$10$tdH0jj9YpaJ1pEDhPmasFeWBzs2EeUpKlA1vt6TDIdj9QLCGeRCJe', '0262639764', 'visitor', 1, NULL, '06554237', '2021-03-03 13:20:53', 0, NULL, NULL, 0, NULL, 0, '2021-03-03 10:34:39', NULL, '2021-03-03 10:34:39', '2021-03-03 12:20:53', NULL),
(10, 'morrison', 'morrisoncode1@gmail.com', '$2y$10$AW3nL1TJJ1q2RQi0vvfjmOaGWOKTGSBy/0x7O2zBpGr40zu/WXp4y', '0205853732', 'visitor', 1, NULL, '01071066', '2021-03-03 11:37:08', 1, '2021-03-03 10:38:04', NULL, 0, NULL, 0, '2021-03-03 12:56:15', 'ghUrnzU6FQZNbxLXfKnyJwSLbj1NQ17Ln1IEt7iAuE8blPAj4EbUvCHb4UPp', '2021-03-03 10:37:08', '2021-03-03 12:56:15', NULL),
(11, 'moniboy', 'threadlezz@gmail.com', '$2y$10$9z0N9B4Z6SugAcER0hVsFO8NoEH8lyhH143lkVZ5ND2v3ziElZoIa', '0546832741', 'visitor', 1, NULL, '32628871', '2021-03-03 11:42:36', 1, '2021-03-03 10:44:23', NULL, 0, NULL, 0, '2021-03-03 10:38:38', 'ceTTqTlcaKoJmcIbA630JPJRsOj8fzOqKUls07wMoEsz4fBOqE5rxMnsfi3A', '2021-03-03 10:38:38', '2021-03-03 10:44:23', NULL),
(12, 'mary ewuradwoa boadu', 'maryboadu143@gmail.com', '$2y$10$l/OY35orR1C7uXGPnOvgWOro0R.0VrAFTBe9//7L.HEoaXKrNJDJC', '0241035416', 'visitor', 1, NULL, '89277134', '2021-03-03 11:44:37', 1, '2021-03-03 10:45:59', NULL, 0, NULL, 0, '2021-03-03 12:53:08', 'fyBL3Es7gqnizSSwajEtD0fA918VfNcqK2qodEpbRtTLn92xEmnRnqwwhKgZ', '2021-03-03 10:39:21', '2021-03-03 12:53:08', NULL),
(13, 'grace buckman', 'amaakoa22@gmail.com', '$2y$10$8TsMNhkB9YJGASVf78n/VuiiiT.nLWeG2Lvd0agEumUdaxLU00nV.', '0554250216', 'visitor', 1, NULL, '60197853', '2021-03-03 11:40:10', 1, '2021-03-03 10:41:26', '2991', 1, '2021-03-03 10:55:50', 0, '2021-03-03 10:40:10', NULL, '2021-03-03 10:40:10', '2021-03-03 10:55:50', NULL),
(14, 'alhaji abubakari sadiq', 'el_sadiq2010@yahoo.com', '$2y$10$VBvYZxyz/dIF.RUaDsxzBuB8DS.oXa5KDhTfqDGSRNJ.oTwn7CBXO', '0203748609', 'owner', 1, NULL, '80238539', '2021-03-03 11:42:35', 1, '2021-03-03 10:53:21', '2041', 0, NULL, 0, '2021-03-03 10:42:35', 'zvC2v5R7CGDaiU4OgqXrowlN1PnOXtcYSavLmEMryD2wSTXYKqkBrW6cDf9Y', '2021-03-03 10:42:35', '2021-03-03 10:54:53', NULL),
(15, 'lee gyamfi', 'drsog62@gmail.com', '$2y$10$hJJVKmg21OgqahZBxxMtjeaMyEd4daANbFVVuTKEqOt6qp1HXLThu', '0206743637', 'owner', 1, NULL, '24562844', '2021-03-03 11:44:44', 1, '2021-03-03 10:48:08', '5471', 0, NULL, 0, '2021-03-10 09:38:09', NULL, '2021-03-03 10:42:42', '2021-03-10 14:38:09', NULL),
(16, 'marley', 'kofikumi64@gmail.com', '$2y$10$n9lrsbiNO5VVLsCR3KjSCeTN6slyEh1JkEXt6QNxb75lyNk1Rj5Tq', '0552297798', 'visitor', 1, NULL, '13967317', '2021-03-03 11:57:29', 1, '2021-03-03 10:58:07', '4531', 1, '2021-03-03 11:00:50', 0, '2021-03-03 10:57:29', NULL, '2021-03-03 10:57:30', '2021-03-03 11:00:50', NULL),
(17, 'josie mann', 'btally34@gmail.com', '$2y$10$8iU8Abk4faYuDgT0cIkm6eXUWVCH.IEbvu1hGV9I.zx/SAWXft5wi', '1006763972', 'visitor', 1, NULL, '49826049', '2021-03-03 23:34:27', 0, NULL, NULL, 0, NULL, 0, '2021-03-03 22:34:27', NULL, '2021-03-03 22:34:27', '2021-03-03 22:34:27', NULL),
(18, 'harold mayer', 'just4today777@gmail.com', '$2y$10$fVWl4iJuIeZk30omhXdKXuU84ju8N/P1KEYFM4LGhgysVVWIVRCIC', '1942575677', 'visitor', 1, NULL, '46789719', '2021-03-17 15:25:59', 0, NULL, NULL, 0, NULL, 0, '2021-03-17 14:25:59', NULL, '2021-03-17 18:25:59', '2021-03-17 18:25:59', NULL),
(19, 'earnest effertz', 'jamison32@hotmail.com', '$2y$10$5vKx9VKH18IG.YjE7bXTr.qWvNVdOw.YB.TmU9frij2YOSLENpmpq', '1976546800', 'visitor', 1, NULL, '81785331', '2021-03-20 06:55:55', 0, NULL, NULL, 0, NULL, 0, '2021-03-20 05:55:55', NULL, '2021-03-20 09:55:55', '2021-03-20 09:55:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_currencies`
--

CREATE TABLE `user_currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `currency` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'GHS',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_currencies`
--

INSERT INTO `user_currencies` (`id`, `user_id`, `currency`, `created_at`, `updated_at`) VALUES
(1, 1, 'GHS', '2021-02-08 13:37:18', '2021-02-08 13:37:18'),
(2, 8, 'GHS', '2021-03-01 04:42:00', '2021-03-01 04:42:00'),
(3, 15, 'GHS', '2021-03-03 15:01:27', '2021-03-03 15:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_extension_requests`
--

CREATE TABLE `user_extension_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `visit_id` int(10) NOT NULL,
  `owner_id` int(10) NOT NULL,
  `extension_date` date NOT NULL,
  `is_confirm` int(11) NOT NULL DEFAULT 1,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_hostel_visits`
--

CREATE TABLE `user_hostel_visits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `hostel_booking_id` int(10) UNSIGNED NOT NULL,
  `hostel_block_room_id` int(10) UNSIGNED NOT NULL,
  `hostel_block_room_number_id` int(10) UNSIGNED NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `is_in` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `user_id`, `ip`, `device`, `browser`, `location`, `created_at`, `updated_at`) VALUES
(1, 1, '41.66.238.91', 'Linux', 'Chrome', 'Accra, Ghana', '2021-02-08 15:39:15', '2021-02-08 15:39:15'),
(2, 1, '41.66.227.160', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-02-09 13:38:21', '2021-02-09 13:38:21'),
(3, 1, '41.66.227.160', 'Linux', 'Chrome', 'Accra, Ghana', '2021-02-09 18:46:31', '2021-02-09 18:46:31'),
(4, 1, '102.176.48.198', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-02-10 09:48:59', '2021-02-10 09:48:59'),
(5, 1, '41.218.216.57', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-02-11 09:38:51', '2021-02-11 09:38:51'),
(6, 1, '41.218.216.57', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-02-11 10:46:56', '2021-02-11 10:46:56'),
(7, 1, '41.218.216.57', 'Linux', 'Chrome', 'Accra, Ghana', '2021-02-11 13:22:26', '2021-02-11 13:22:26'),
(8, 1, '41.218.216.57', 'Linux', 'Chrome', 'Accra, Ghana', '2021-02-11 18:05:43', '2021-02-11 18:05:43'),
(10, 1, '41.218.216.171', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-02-12 09:13:06', '2021-02-12 09:13:06'),
(11, 2, '41.218.216.171', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-02-12 10:25:01', '2021-02-12 10:25:01'),
(14, 2, '41.218.216.171', 'Mac OS X', 'Chrome', 'Accra, Ghana', '2021-02-12 20:40:32', '2021-02-12 20:40:32'),
(15, 2, '154.160.14.65', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-02-13 09:04:16', '2021-02-13 09:04:16'),
(16, 2, '154.160.21.197', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-02-13 14:11:18', '2021-02-13 14:11:18'),
(19, 2, '41.66.237.94', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-02-13 21:01:40', '2021-02-13 21:01:40'),
(20, 1, '41.218.209.134', 'Linux', 'Chrome', 'Accra, Ghana', '2021-02-14 17:31:22', '2021-02-14 17:31:22'),
(21, 2, '154.160.14.65', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-02-14 18:24:31', '2021-02-14 18:24:31'),
(22, 1, '41.218.209.134', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-02-15 09:59:18', '2021-02-15 09:59:18'),
(23, 2, '154.160.14.65', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-02-15 10:09:01', '2021-02-15 10:09:01'),
(24, 1, '41.218.209.134', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-02-15 12:11:15', '2021-02-15 12:11:15'),
(25, 2, '154.160.14.65', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-02-15 12:12:23', '2021-02-15 12:12:23'),
(26, 2, '154.160.14.65', 'Mac OS X', 'Chrome', 'Accra, Ghana', '2021-02-15 12:45:13', '2021-02-15 12:45:13'),
(27, 1, '41.139.16.233', 'Android', 'Handheld Browser', 'Tema, Ghana', '2021-02-15 13:34:30', '2021-02-15 13:34:30'),
(28, 2, '154.160.14.65', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-02-15 13:44:13', '2021-02-15 13:44:13'),
(29, 1, '41.139.16.233', 'Linux', 'Chrome', 'Tema, Ghana', '2021-02-15 14:04:32', '2021-02-15 14:04:32'),
(30, 2, '154.160.27.203', 'Mac OS X', 'Chrome', 'Accra, Ghana', '2021-02-16 01:53:11', '2021-02-16 01:53:11'),
(31, 2, '154.160.27.203', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-02-16 01:55:42', '2021-02-16 01:55:42'),
(32, 1, '41.218.216.220', 'Linux', 'Chrome', 'Accra, Ghana', '2021-02-16 09:31:04', '2021-02-16 09:31:04'),
(33, 1, '41.218.216.220', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-02-16 09:34:13', '2021-02-16 09:34:13'),
(34, 1, '41.218.216.220', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-02-16 13:01:58', '2021-02-16 13:01:58'),
(35, 1, '41.139.16.233', 'Linux', 'Chrome', 'Tema, Ghana', '2021-02-16 13:45:47', '2021-02-16 13:45:47'),
(36, 1, '41.139.16.233', 'Linux', 'Chrome', 'Tema, Ghana', '2021-02-16 16:12:51', '2021-02-16 16:12:51'),
(37, 2, '154.160.23.131', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-02-16 17:34:17', '2021-02-16 17:34:17'),
(38, 1, '41.139.16.233', 'Linux', 'Chrome', 'Tema, Ghana', '2021-02-17 10:01:22', '2021-02-17 10:01:22'),
(39, 1, '41.66.232.250', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-02-17 11:48:59', '2021-02-17 11:48:59'),
(40, 2, '154.160.14.65', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-02-18 00:03:42', '2021-02-18 00:03:42'),
(41, 2, '154.160.14.65', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-02-18 08:43:07', '2021-02-18 08:43:07'),
(42, 1, '41.139.16.233', 'Linux', 'Chrome', 'Tema, Ghana', '2021-02-18 09:32:19', '2021-02-18 09:32:19'),
(43, 2, '41.66.227.16', 'Mac OS X', 'Chrome', 'Accra, Ghana', '2021-02-18 22:08:38', '2021-02-18 22:08:38'),
(44, 1, '41.66.226.225', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-02-19 15:45:24', '2021-02-19 15:45:24'),
(45, 2, '154.160.18.25', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-02-19 16:27:02', '2021-02-19 16:27:02'),
(47, 2, '102.176.61.20', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-02-22 17:46:19', '2021-02-22 17:46:19'),
(48, 2, '154.160.14.105', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-02-23 00:07:08', '2021-02-23 00:07:08'),
(49, 1, '41.218.210.132', 'Linux', 'Chrome', 'Accra, Ghana', '2021-02-23 09:38:10', '2021-02-23 09:38:10'),
(50, 1, '41.218.210.132', 'Linux', 'Chrome', 'Accra, Ghana', '2021-02-23 17:11:49', '2021-02-23 17:11:49'),
(52, 2, '41.66.226.53', 'Mac OS X', 'Chrome', 'Accra, Ghana', '2021-02-24 15:10:28', '2021-02-24 15:10:28'),
(53, 2, '41.66.226.53', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-02-24 16:10:29', '2021-02-24 16:10:29'),
(55, 1, '41.66.225.71', 'Linux', 'Chrome', 'Accra, Ghana', '2021-02-25 10:23:42', '2021-02-25 10:23:42'),
(56, 2, '41.66.225.71', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-02-25 14:11:41', '2021-02-25 14:11:41'),
(57, 1, '41.66.225.71', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-02-25 14:17:07', '2021-02-25 14:17:07'),
(58, 2, '41.66.225.71', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-02-25 14:26:22', '2021-02-25 14:26:22'),
(59, 3, '41.66.225.71', 'Android', 'Handheld Browser', 'Accra, Ghana', '2021-02-25 14:26:47', '2021-02-25 14:26:47'),
(60, 3, '41.66.225.71', 'Android', 'Handheld Browser', 'Accra, Ghana', '2021-02-25 15:08:52', '2021-02-25 15:08:52'),
(61, 4, '41.66.225.71', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-02-25 15:10:01', '2021-02-25 15:10:01'),
(62, 1, '41.66.225.71', 'Linux', 'Chrome', 'Accra, Ghana', '2021-02-25 16:57:14', '2021-02-25 16:57:14'),
(63, 1, '41.66.225.71', 'Ubuntu', 'Firefox', 'Accra, Ghana', '2021-02-25 17:18:20', '2021-02-25 17:18:20'),
(64, 6, '102.176.56.175', 'Linux', 'Chrome', 'Accra, Ghana', '2021-02-26 09:49:04', '2021-02-26 09:49:04'),
(65, 1, '102.176.56.175', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-02-26 11:35:22', '2021-02-26 11:35:22'),
(66, 2, '102.176.56.175', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-02-26 11:38:10', '2021-02-26 11:38:10'),
(67, 2, '154.160.14.35', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-02-27 13:40:48', '2021-02-27 13:40:48'),
(68, 1, '154.160.14.35', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-02-27 14:43:04', '2021-02-27 14:43:04'),
(69, 1, '154.160.14.35', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-02-27 14:46:02', '2021-02-27 14:46:02'),
(70, 1, '154.160.14.35', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-02-28 22:34:35', '2021-02-28 22:34:35'),
(71, 8, '154.160.2.186', 'Mac OS X', 'Chrome', 'Accra, Ghana', '2021-03-01 03:27:31', '2021-03-01 03:27:31'),
(72, 1, '41.66.239.133', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-03-02 09:36:27', '2021-03-02 09:36:27'),
(73, 1, '41.66.239.133', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-03-02 13:33:41', '2021-03-02 13:33:41'),
(74, 1, '41.66.239.133', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-03-02 13:34:37', '2021-03-02 13:34:37'),
(75, 1, '41.66.239.133', 'Linux', 'Chrome', 'Accra, Ghana', '2021-03-02 13:52:10', '2021-03-02 13:52:10'),
(76, 1, '41.66.233.129', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-03-03 10:35:15', '2021-03-03 10:35:15'),
(77, 4, '41.66.233.129', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-03-03 10:44:50', '2021-03-03 10:44:50'),
(78, 1, '41.66.233.129', 'Android', 'Handheld Browser', 'Accra, Ghana', '2021-03-03 12:40:50', '2021-03-03 12:40:50'),
(79, 12, '154.160.1.55', 'Android', 'Handheld Browser', 'Accra, Ghana', '2021-03-03 12:53:08', '2021-03-03 12:53:08'),
(80, 10, '41.66.233.129', 'Android', 'Handheld Browser', 'Accra, Ghana', '2021-03-03 12:56:15', '2021-03-03 12:56:15'),
(81, 15, '41.66.233.129', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-03-03 14:46:39', '2021-03-03 14:46:39'),
(82, 15, '41.66.231.97', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-03-04 10:18:38', '2021-03-04 10:18:38'),
(83, 1, '41.66.231.97', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-03-04 14:00:27', '2021-03-04 14:00:27'),
(84, 6, '41.66.231.97', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-03-04 16:59:08', '2021-03-04 16:59:08'),
(85, 1, '41.66.231.97', 'Linux', 'Chrome', 'Accra, Ghana', '2021-03-04 19:01:17', '2021-03-04 19:01:17'),
(86, 15, '41.218.214.199', 'Windows 10', 'Chrome', 'Dansoman, Ghana', '2021-03-05 14:40:18', '2021-03-05 14:40:18'),
(87, 6, '154.160.9.13', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-03-06 15:26:36', '2021-03-06 15:26:36'),
(88, 1, '154.160.25.59', 'Linux', 'Chrome', 'Accra, Ghana', '2021-03-09 03:05:39', '2021-03-09 03:05:39'),
(89, 1, '41.66.228.24', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-03-09 15:27:38', '2021-03-09 15:27:38'),
(90, 1, '41.66.228.24', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-03-09 20:33:22', '2021-03-09 20:33:22'),
(91, 6, '154.160.14.142', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-03-10 11:18:40', '2021-03-10 11:18:40'),
(92, 15, '41.66.236.170', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-03-10 14:38:09', '2021-03-10 14:38:09'),
(93, 1, '41.66.232.118', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-03-10 23:18:00', '2021-03-10 23:18:00'),
(94, 1, '41.218.219.64', 'Windows 10', 'Chrome', 'Tema, Ghana', '2021-03-11 14:11:34', '2021-03-11 14:11:34'),
(95, 8, '154.160.3.161', 'Android', 'Handheld Browser', 'Accra, Ghana', '2021-03-13 16:12:43', '2021-03-13 16:12:43'),
(96, 2, '154.160.6.138', 'iPhone', 'Handheld Browser', 'Accra, Ghana', '2021-03-15 07:03:10', '2021-03-15 07:03:10'),
(97, 1, '41.66.236.224', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-03-15 14:28:08', '2021-03-15 14:28:08'),
(98, 1, '41.66.236.224', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-03-15 18:57:36', '2021-03-15 18:57:36'),
(99, 8, '41.66.228.203', 'Windows 10', 'Firefox', 'Accra, Ghana', '2021-03-16 19:14:59', '2021-03-16 19:14:59'),
(100, 1, '41.66.224.251', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-03-19 15:55:35', '2021-03-19 15:55:35'),
(101, 1, '41.218.214.250', 'Linux', 'Chrome', 'Dansoman, Ghana', '2021-03-23 14:58:39', '2021-03-23 14:58:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `message_email` tinyint(1) NOT NULL DEFAULT 1,
  `message_sms` tinyint(1) NOT NULL DEFAULT 0,
  `support_email` tinyint(1) NOT NULL DEFAULT 1,
  `support_sms` tinyint(1) NOT NULL DEFAULT 0,
  `reminder_email` tinyint(1) NOT NULL DEFAULT 1,
  `reminder_sms` tinyint(1) NOT NULL DEFAULT 0,
  `policy_email` tinyint(1) NOT NULL DEFAULT 1,
  `policy_sms` tinyint(1) NOT NULL DEFAULT 0,
  `unsubscribe_email` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_notifications`
--

INSERT INTO `user_notifications` (`id`, `user_id`, `message_email`, `message_sms`, `support_email`, `support_sms`, `reminder_email`, `reminder_sms`, `policy_email`, `policy_sms`, `unsubscribe_email`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-02-08 13:03:58', '2021-02-08 13:03:58'),
(2, 2, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-02-11 21:54:58', '2021-02-11 21:54:58'),
(14, 3, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-02-25 14:11:32', '2021-02-25 14:11:32'),
(15, 4, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-02-25 14:36:46', '2021-02-25 14:36:46'),
(16, 5, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-02-25 16:24:14', '2021-02-25 16:24:14'),
(17, 6, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-02-25 17:08:35', '2021-02-25 17:08:35'),
(18, 7, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-02-26 14:53:02', '2021-02-26 14:53:02'),
(19, 8, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-02-28 21:52:22', '2021-02-28 21:52:22'),
(20, 9, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-03-03 10:34:39', '2021-03-03 10:34:39'),
(21, 10, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-03-03 10:37:08', '2021-03-03 10:37:08'),
(22, 11, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-03-03 10:38:38', '2021-03-03 10:38:38'),
(23, 12, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-03-03 10:39:21', '2021-03-03 10:39:21'),
(24, 13, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-03-03 10:40:10', '2021-03-03 10:40:10'),
(25, 14, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-03-03 10:42:35', '2021-03-03 10:42:35'),
(26, 15, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-03-03 10:42:42', '2021-03-03 10:42:42'),
(27, 16, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-03-03 10:57:30', '2021-03-03 10:57:30'),
(28, 17, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-03-03 22:34:27', '2021-03-03 22:34:27'),
(29, 18, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-03-17 18:25:59', '2021-03-17 18:25:59'),
(30, 19, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-03-20 09:55:55', '2021-03-20 09:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_front` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `gender`, `dob`, `marital_status`, `city`, `country`, `occupation`, `emergency`, `id_front`, `id_number`, `id_type`, `created_at`, `updated_at`) VALUES
(1, 1, 'male', '1998-11-02', 'married', 'Osu', NULL, 'Digital Marketer', '0559970048', NULL, NULL, NULL, '2021-02-11 19:56:52', '2021-02-11 19:56:52'),
(2, 2, 'male', '1984-05-28', 'married', 'Accra', NULL, 'IT Technical Specialist', '0247899182', NULL, NULL, NULL, '2021-02-11 21:56:49', '2021-02-13 14:13:09'),
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-25 14:43:17', '2021-02-25 14:43:48'),
(4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-25 14:56:31', '2021-02-25 15:01:08'),
(5, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-25 17:16:33', '2021-02-25 17:16:37'),
(6, 10, 'male', '1996-06-12', 'single', 'Accra', NULL, 'Graphic Designer', '0205853732', NULL, NULL, NULL, '2021-03-03 10:43:43', '2021-03-03 10:43:43'),
(7, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-03 10:52:34', '2021-03-03 10:56:36'),
(8, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-03 10:53:37', '2021-03-03 10:53:44'),
(9, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-03 10:54:20', '2021-03-03 10:54:30'),
(10, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-03 10:57:09', '2021-03-03 10:57:15'),
(11, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-03 10:59:31', '2021-03-03 10:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_saved_properties`
--

CREATE TABLE `user_saved_properties` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_saved_properties`
--

INSERT INTO `user_saved_properties` (`id`, `user_id`, `property_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-02-08 13:56:53', '2021-02-08 13:56:53'),
(13, 2, 80, '2021-02-22 17:46:39', '2021-02-22 17:46:39'),
(20, 2, 79, '2021-02-27 13:49:05', '2021-02-27 13:49:05'),
(21, 2, 82, '2021-02-27 13:49:07', '2021-02-27 13:49:07'),
(22, 2, 83, '2021-02-27 13:49:08', '2021-02-27 13:49:08'),
(24, 1, 87, '2021-03-02 15:28:05', '2021-03-02 15:28:05'),
(25, 1, 86, '2021-03-02 15:49:49', '2021-03-02 15:49:49'),
(27, 6, 129, '2021-03-10 11:28:09', '2021-03-10 11:28:09'),
(28, 6, 119, '2021-03-10 11:29:15', '2021-03-10 11:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_visits`
--

CREATE TABLE `user_visits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `adult` int(11) NOT NULL DEFAULT 1,
  `children` int(11) NOT NULL DEFAULT 0,
  `infant` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_wallets`
--

CREATE TABLE `user_wallets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `balance` double NOT NULL DEFAULT 0,
  `currency` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_cash_out` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_wallet_id` int(10) UNSIGNED NOT NULL,
  `reference_id` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `currency` varchar(50) NOT NULL,
  `channel` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_activities`
--
ALTER TABLE `admin_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_activities_admin_id_index` (`admin_id`);

--
-- Indexes for table `bank_withdraws`
--
ALTER TABLE `bank_withdraws`
  ADD PRIMARY KEY (`id`),
  ADD KEY `withdraw_id` (`withdraw_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_bookings_index` (`user_id`),
  ADD KEY `property_id_booking_index` (`property_id`),
  ADD KEY `owner_id_bookings_index` (`owner_id`);

--
-- Indexes for table `booking_transactions`
--
ALTER TABLE `booking_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `booking_id_booking_transactions_index` (`booking_id`);

--
-- Indexes for table `confirmations`
--
ALTER TABLE `confirmations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `confirmations_user_id_index` (`user_id`),
  ADD KEY `confirmations_owner_id_index` (`owner_id`),
  ADD KEY `confirmations_transaction_id_index` (`transaction_id`),
  ADD KEY `confirmations_visit_id_index` (`visit_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_contacts_indexing` (`email`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deactivate_users`
--
ALTER TABLE `deactivate_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deactivate_users_user_id_index` (`user_id`);

--
-- Indexes for table `email_verifies`
--
ALTER TABLE `email_verifies`
  ADD KEY `email_verifies_email_index` (`email`) USING BTREE;

--
-- Indexes for table `extension_transactions`
--
ALTER TABLE `extension_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `extension_id_extension_transactions_indexing` (`extension_id`);

--
-- Indexes for table `help_categories`
--
ALTER TABLE `help_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help_questions`
--
ALTER TABLE `help_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `help_topic_id` (`help_topic_id`);

--
-- Indexes for table `help_topics`
--
ALTER TABLE `help_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `help_category_id` (`help_category_id`);

--
-- Indexes for table `hostel_block_rooms`
--
ALTER TABLE `hostel_block_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hostel_block_rooms_property_hostel_block_id_index` (`property_hostel_block_id`);

--
-- Indexes for table `hostel_block_room_numbers`
--
ALTER TABLE `hostel_block_room_numbers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hostel_block_room_numbers_hostel_block_room_id_index` (`hostel_block_room_id`);

--
-- Indexes for table `hostel_bookings`
--
ALTER TABLE `hostel_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_hostel_bookings_index` (`user_id`),
  ADD KEY `property_id_hostel_bookings_index` (`property_id`),
  ADD KEY `owner_id_hostel_bookings_index` (`owner_id`),
  ADD KEY `hostel_block_room_number_id_hostel_bookings_index` (`hostel_block_room_number_id`);

--
-- Indexes for table `hostel_room_amenities`
--
ALTER TABLE `hostel_room_amenities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hostel_room_amenities_hostel_block_room_id_index` (`hostel_block_room_id`);

--
-- Indexes for table `include_utilities`
--
ALTER TABLE `include_utilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `include_utilities_property_id_index` (`property_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_index` (`user_id`),
  ADD KEY `messages_destination_index` (`destination`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_withdraws`
--
ALTER TABLE `mobile_withdraws`
  ADD PRIMARY KEY (`id`),
  ADD KEY `withdraw_id` (`withdraw_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_user_id_index` (`user_id`);

--
-- Indexes for table `property_amenities`
--
ALTER TABLE `property_amenities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_amenities_property_id_index` (`property_id`);

--
-- Indexes for table `property_contains`
--
ALTER TABLE `property_contains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_contains_property_id_index` (`property_id`);

--
-- Indexes for table `property_descriptions`
--
ALTER TABLE `property_descriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_descriptions_property_id_index` (`property_id`);

--
-- Indexes for table `property_hostel_blocks`
--
ALTER TABLE `property_hostel_blocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_hostel_blocks_property_id_index` (`property_id`);

--
-- Indexes for table `property_hostel_prices`
--
ALTER TABLE `property_hostel_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_hostel_prices_hostel_block_room_id_index` (`hostel_block_room_id`);

--
-- Indexes for table `property_images`
--
ALTER TABLE `property_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_images_property_id_index` (`property_id`);

--
-- Indexes for table `property_locations`
--
ALTER TABLE `property_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_locations_property_id_index` (`property_id`),
  ADD KEY `property_locations_location_index` (`location`);

--
-- Indexes for table `property_own_rules`
--
ALTER TABLE `property_own_rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_own_rules_property_id_index` (`property_id`);

--
-- Indexes for table `property_prices`
--
ALTER TABLE `property_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_prices_property_id_index` (`property_id`);

--
-- Indexes for table `property_reviews`
--
ALTER TABLE `property_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_reviews_property_id_index` (`property_id`),
  ADD KEY `property_reviews_user_id_index` (`user_id`),
  ADD KEY `property_reviews_owner_id_index` (`owner_id`);

--
-- Indexes for table `property_rules`
--
ALTER TABLE `property_rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_rules_property_id_index` (`property_id`);

--
-- Indexes for table `property_shared_amenities`
--
ALTER TABLE `property_shared_amenities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_shared_amenities_property_id_index` (`property_id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_properties`
--
ALTER TABLE `report_properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `report_properties_user_id_index` (`user_id`),
  ADD KEY `report_properties_property_id_index` (`property_id`);

--
-- Indexes for table `service_charges`
--
ALTER TABLE `service_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_index` (`user_id`),
  ADD KEY `transactions_owner_id_index` (`owner_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `user_currencies`
--
ALTER TABLE `user_currencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_extension_requests`
--
ALTER TABLE `user_extension_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_extension_requests_user_id_index` (`user_id`),
  ADD KEY `user_extension_requests_visit_id_index` (`visit_id`),
  ADD KEY `user_extension_requests_owner_id_index` (`owner_id`);

--
-- Indexes for table `user_hostel_visits`
--
ALTER TABLE `user_hostel_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_hostel_visits_user_id_index` (`user_id`),
  ADD KEY `user_hostel_visits_property_id_index` (`property_id`),
  ADD KEY `user_hostel_visits_hostel_block_room_id_index` (`hostel_block_room_id`),
  ADD KEY `user_hostel_visits_hostel_block_room_number_id_index` (`hostel_block_room_number_id`),
  ADD KEY `user_hostel_visits_hostel_booking_id_foreign` (`hostel_booking_id`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_logins_user_id_index` (`user_id`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_notifications_user_id_index` (`user_id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profiles_user_id_index` (`user_id`);

--
-- Indexes for table `user_saved_properties`
--
ALTER TABLE `user_saved_properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_saved_properties_user_id_index` (`user_id`),
  ADD KEY `user_saved_properties_property_id_index` (`property_id`);

--
-- Indexes for table `user_visits`
--
ALTER TABLE `user_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_visits_user_id_index` (`user_id`),
  ADD KEY `user_visits_property_id_index` (`property_id`),
  ADD KEY `user_visits_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `user_wallets`
--
ALTER TABLE `user_wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_wallets_user_id_index` (`user_id`),
  ADD KEY `user_wallets_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_wallet_id` (`user_wallet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_activities`
--
ALTER TABLE `admin_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `bank_withdraws`
--
ALTER TABLE `bank_withdraws`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_transactions`
--
ALTER TABLE `booking_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `confirmations`
--
ALTER TABLE `confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deactivate_users`
--
ALTER TABLE `deactivate_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extension_transactions`
--
ALTER TABLE `extension_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `help_categories`
--
ALTER TABLE `help_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `help_questions`
--
ALTER TABLE `help_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `help_topics`
--
ALTER TABLE `help_topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostel_block_rooms`
--
ALTER TABLE `hostel_block_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `hostel_block_room_numbers`
--
ALTER TABLE `hostel_block_room_numbers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `hostel_bookings`
--
ALTER TABLE `hostel_bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostel_room_amenities`
--
ALTER TABLE `hostel_room_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `include_utilities`
--
ALTER TABLE `include_utilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `mobile_withdraws`
--
ALTER TABLE `mobile_withdraws`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `property_amenities`
--
ALTER TABLE `property_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=863;

--
-- AUTO_INCREMENT for table `property_contains`
--
ALTER TABLE `property_contains`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `property_descriptions`
--
ALTER TABLE `property_descriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `property_hostel_blocks`
--
ALTER TABLE `property_hostel_blocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `property_hostel_prices`
--
ALTER TABLE `property_hostel_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `property_images`
--
ALTER TABLE `property_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1264;

--
-- AUTO_INCREMENT for table `property_locations`
--
ALTER TABLE `property_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `property_own_rules`
--
ALTER TABLE `property_own_rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `property_prices`
--
ALTER TABLE `property_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `property_reviews`
--
ALTER TABLE `property_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_rules`
--
ALTER TABLE `property_rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `property_shared_amenities`
--
ALTER TABLE `property_shared_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=494;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `report_properties`
--
ALTER TABLE `report_properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_charges`
--
ALTER TABLE `service_charges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_currencies`
--
ALTER TABLE `user_currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_extension_requests`
--
ALTER TABLE `user_extension_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_hostel_visits`
--
ALTER TABLE `user_hostel_visits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_saved_properties`
--
ALTER TABLE `user_saved_properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_visits`
--
ALTER TABLE `user_visits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_wallets`
--
ALTER TABLE `user_wallets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_activities`
--
ALTER TABLE `admin_activities`
  ADD CONSTRAINT `admin_activities_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bank_withdraws`
--
ALTER TABLE `bank_withdraws`
  ADD CONSTRAINT `bank_withdraws_ibfk_1` FOREIGN KEY (`withdraw_id`) REFERENCES `withdraws` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `booking_transactions`
--
ALTER TABLE `booking_transactions`
  ADD CONSTRAINT `booking_transactions_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `confirmations`
--
ALTER TABLE `confirmations`
  ADD CONSTRAINT `confirmations_owner_id_index` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `confirmations_transaction_id_index` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `confirmations_user_id_index` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `deactivate_users`
--
ALTER TABLE `deactivate_users`
  ADD CONSTRAINT `deactivate_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `extension_transactions`
--
ALTER TABLE `extension_transactions`
  ADD CONSTRAINT `extension_transactions_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `help_questions`
--
ALTER TABLE `help_questions`
  ADD CONSTRAINT `help_questions_ibfk_1` FOREIGN KEY (`help_topic_id`) REFERENCES `help_topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `help_topics`
--
ALTER TABLE `help_topics`
  ADD CONSTRAINT `help_topics_ibfk_1` FOREIGN KEY (`help_category_id`) REFERENCES `help_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hostel_block_rooms`
--
ALTER TABLE `hostel_block_rooms`
  ADD CONSTRAINT `hostel_block_rooms_property_hostel_block_id_foreign` FOREIGN KEY (`property_hostel_block_id`) REFERENCES `property_hostel_blocks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hostel_block_room_numbers`
--
ALTER TABLE `hostel_block_room_numbers`
  ADD CONSTRAINT `hostel_block_room_numbers_hostel_block_room_id_foreign` FOREIGN KEY (`hostel_block_room_id`) REFERENCES `hostel_block_rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hostel_room_amenities`
--
ALTER TABLE `hostel_room_amenities`
  ADD CONSTRAINT `hostel_room_amenities_hostel_block_room_id_foreign` FOREIGN KEY (`hostel_block_room_id`) REFERENCES `hostel_block_rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `include_utilities`
--
ALTER TABLE `include_utilities`
  ADD CONSTRAINT `include_utilities_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mobile_withdraws`
--
ALTER TABLE `mobile_withdraws`
  ADD CONSTRAINT `mobile_withdraws_ibfk_1` FOREIGN KEY (`withdraw_id`) REFERENCES `withdraws` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_amenities`
--
ALTER TABLE `property_amenities`
  ADD CONSTRAINT `property_amenities_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_contains`
--
ALTER TABLE `property_contains`
  ADD CONSTRAINT `property_contains_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_descriptions`
--
ALTER TABLE `property_descriptions`
  ADD CONSTRAINT `property_descriptions_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_hostel_blocks`
--
ALTER TABLE `property_hostel_blocks`
  ADD CONSTRAINT `property_hostel_blocks_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_hostel_prices`
--
ALTER TABLE `property_hostel_prices`
  ADD CONSTRAINT `property_hostel_prices_hostel_block_room_id_foreign` FOREIGN KEY (`hostel_block_room_id`) REFERENCES `hostel_block_rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_images`
--
ALTER TABLE `property_images`
  ADD CONSTRAINT `property_images_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_locations`
--
ALTER TABLE `property_locations`
  ADD CONSTRAINT `property_locations_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_own_rules`
--
ALTER TABLE `property_own_rules`
  ADD CONSTRAINT `property_own_rules_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_prices`
--
ALTER TABLE `property_prices`
  ADD CONSTRAINT `property_prices_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_reviews`
--
ALTER TABLE `property_reviews`
  ADD CONSTRAINT `property_reviews_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_rules`
--
ALTER TABLE `property_rules`
  ADD CONSTRAINT `property_rules_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_shared_amenities`
--
ALTER TABLE `property_shared_amenities`
  ADD CONSTRAINT `property_shared_amenities_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `report_properties`
--
ALTER TABLE `report_properties`
  ADD CONSTRAINT `report_properties_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `report_properties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_extension_requests`
--
ALTER TABLE `user_extension_requests`
  ADD CONSTRAINT `user_extension_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_hostel_visits`
--
ALTER TABLE `user_hostel_visits`
  ADD CONSTRAINT `user_hostel_visits_hostel_block_room_id_foreign` FOREIGN KEY (`hostel_block_room_id`) REFERENCES `hostel_block_rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_hostel_visits_hostel_block_room_number_id_foreign` FOREIGN KEY (`hostel_block_room_number_id`) REFERENCES `hostel_block_room_numbers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_hostel_visits_hostel_booking_id_foreign` FOREIGN KEY (`hostel_booking_id`) REFERENCES `hostel_bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_hostel_visits_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_hostel_visits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD CONSTRAINT `user_logins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD CONSTRAINT `user_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_saved_properties`
--
ALTER TABLE `user_saved_properties`
  ADD CONSTRAINT `user_saved_properties_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_saved_properties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_visits`
--
ALTER TABLE `user_visits`
  ADD CONSTRAINT `user_visits_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_visits_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_visits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_wallets`
--
ALTER TABLE `user_wallets`
  ADD CONSTRAINT `user_wallets_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD CONSTRAINT `withdraws_ibfk_1` FOREIGN KEY (`user_wallet_id`) REFERENCES `withdraws` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
