-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 05, 2021 at 05:17 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estate`
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
(1, 'Admin Geek', 'fiifipius@gmail.com', '$2y$10$C5fgKPH/HSQ79J4wiybGVOgILhRN2cCpeyMXn5VFCxiw.leAIVZki', 1, NULL, 'admin', '2021-03-05 12:18:22', 'G0fni8HaxsSu4ZCH8qOoiNxvorawLL7iyfjzMBRNbEbt5WTwg5gRToUvoyxP', NULL, '2021-03-05 12:18:22');

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
(32, 1, 'Added new document type general - Your Account', '2021-01-21 14:57:33', '2021-01-21 14:57:33'),
(33, 1, 'Edited document type general - Your Account', '2021-01-21 15:01:25', '2021-01-21 15:01:25'),
(34, 1, 'Edited document type general - Your Accounts', '2021-01-21 15:03:02', '2021-01-21 15:03:02'),
(35, 1, 'Edited document type general - Your Account', '2021-01-21 15:03:16', '2021-01-21 15:03:16'),
(36, 1, 'Added new document General Help - Your Account', '2021-01-21 15:13:51', '2021-01-21 15:13:51'),
(37, 1, 'Edited document General Help - Your Account', '2021-01-21 15:24:40', '2021-01-21 15:24:40'),
(38, 1, 'Added new currency United States Dollar', '2021-01-21 16:50:36', '2021-01-21 16:50:36'),
(39, 1, 'Updated currency United States Dollar', '2021-01-21 17:05:29', '2021-01-21 17:05:29'),
(40, 1, 'Updated currency United States Dollar', '2021-01-21 17:05:36', '2021-01-21 17:05:36'),
(41, 1, 'Deleted currency United States Dollar', '2021-01-21 17:07:02', '2021-01-21 17:07:02'),
(42, 1, 'Deleted currency Ghana Cedis', '2021-01-21 17:07:05', '2021-01-21 17:07:05'),
(43, 1, 'Added new currency Ghana Cedis', '2021-01-21 17:07:21', '2021-01-21 17:07:21'),
(44, 1, 'Added new currency United States Dollar', '2021-01-21 17:07:26', '2021-01-21 17:07:26'),
(45, 1, 'Added new document type general - Your Account', '2021-01-25 14:27:53', '2021-01-25 14:27:53'),
(46, 1, 'Deleted document type General Help - Your Account', '2021-01-25 14:27:58', '2021-01-25 14:27:58'),
(47, 1, 'Added new document General Help - Your Account', '2021-01-25 14:31:01', '2021-01-25 14:31:01'),
(48, 1, 'Added new document General Help - Your Account', '2021-01-25 14:33:04', '2021-01-25 14:33:04'),
(49, 1, 'Added new document General Help - Your Account', '2021-01-25 14:34:01', '2021-01-25 14:34:01'),
(50, 1, 'Added new document General Help - Account', '2021-01-25 15:55:50', '2021-01-25 15:55:50'),
(51, 1, 'Added new document General Help - Account', '2021-01-25 15:56:22', '2021-01-25 15:56:22'),
(52, 1, 'Added new document General Help - Account', '2021-01-25 15:56:49', '2021-01-25 15:56:49'),
(53, 1, 'Added new document General Help - Account', '2021-01-25 15:57:00', '2021-01-25 15:57:00'),
(54, 1, 'Added new document type general - Notifications', '2021-01-26 09:45:12', '2021-01-26 09:45:12'),
(55, 1, 'Added new document General Help - Notifications', '2021-01-26 09:45:53', '2021-01-26 09:45:53'),
(56, 1, 'Added new help category general - Your Account', '2021-01-26 10:58:32', '2021-01-26 10:58:32'),
(57, 1, 'Added new help category general - About Oshelter', '2021-01-26 10:59:54', '2021-01-26 10:59:54'),
(58, 1, 'Added new help category general - Your Account', '2021-01-26 11:00:09', '2021-01-26 11:00:09'),
(59, 1, 'Added new help category general - Terms And Policies', '2021-01-26 11:00:33', '2021-01-26 11:00:33'),
(60, 1, 'Added new help category general - About Oshelter', '2021-01-26 11:05:46', '2021-01-26 11:05:46'),
(61, 1, 'Added new help category general - Your Account', '2021-01-26 11:05:57', '2021-01-26 11:05:57'),
(62, 1, 'Added new help category general - Terms And Policies', '2021-01-26 11:06:07', '2021-01-26 11:06:07'),
(63, 1, 'Edited help category general - Your Accounts', '2021-01-26 11:28:10', '2021-01-26 11:28:10'),
(64, 1, 'Edited help category general - Your Account', '2021-01-26 11:29:18', '2021-01-26 11:29:18'),
(65, 1, 'Edited help category general - Your Account', '2021-01-26 11:29:25', '2021-01-26 11:29:25'),
(66, 1, 'Edited help category general - Your Account', '2021-01-26 11:29:30', '2021-01-26 11:29:30'),
(67, 1, 'Edited help category general - Your Account', '2021-01-26 11:30:08', '2021-01-26 11:30:08'),
(68, 1, 'Edited help category general - Your Accounts', '2021-01-26 11:30:53', '2021-01-26 11:30:53'),
(69, 1, 'Edited help category general - Your Account', '2021-01-26 11:31:00', '2021-01-26 11:31:00'),
(70, 1, 'Added new help topic About Oshelter - Getting started', '2021-01-26 12:24:44', '2021-01-26 12:24:44'),
(71, 1, 'Added new help topic About Oshelter - Getting started', '2021-01-26 12:25:14', '2021-01-26 12:25:14'),
(72, 1, 'Added new help topic About Oshelter - How oshelter works', '2021-01-26 12:26:23', '2021-01-26 12:26:23'),
(73, 1, 'Edited help topic About Oshelter - How Oshelter work', '2021-01-26 12:48:21', '2021-01-26 12:48:21'),
(74, 1, 'Edited help topic About Oshelter - How Oshelter works', '2021-01-26 12:48:42', '2021-01-26 12:48:42'),
(75, 1, 'Added new help topic About Oshelter - Messaging', '2021-01-26 12:50:16', '2021-01-26 12:50:16'),
(76, 1, 'Added new help topic About Oshelter - Our clients', '2021-01-26 12:50:58', '2021-01-26 12:50:58'),
(77, 1, 'Edited help topic About Oshelter - Our clients and partners', '2021-01-26 12:51:12', '2021-01-26 12:51:12'),
(78, 1, 'Added new help topic Your Account - Creating an account', '2021-01-26 12:51:59', '2021-01-26 12:51:59'),
(79, 1, 'Added new help topic Your Account - Managing your account', '2021-01-26 12:52:28', '2021-01-26 12:52:28'),
(80, 1, 'Added new help topic Your Account - Account security', '2021-01-26 12:52:50', '2021-01-26 12:52:50'),
(81, 1, 'Added new help topic Your Account - Verification', '2021-01-26 12:53:07', '2021-01-26 12:53:07'),
(82, 1, 'Added new help question Getting started - How do I create an account?', '2021-01-26 15:27:15', '2021-01-26 15:27:15'),
(83, 1, 'Added new help question Getting started - Who can own a property on Oshelter?', '2021-01-26 15:27:54', '2021-01-26 15:27:54'),
(84, 1, 'Added new help question How Oshelter works - How do I contact Oshelter?', '2021-01-26 15:30:34', '2021-01-26 15:30:34'),
(85, 1, 'Added new help question How Oshelter works - How do I send feedback to Oshelter?', '2021-01-26 15:31:20', '2021-01-26 15:31:20'),
(86, 1, 'Edited help question How Oshelter works - How do I contact Oshelter?', '2021-01-26 15:55:27', '2021-01-26 15:55:27'),
(87, 1, 'Edited help question How Oshelter works - How do I contact Oshelter?', '2021-01-26 15:55:32', '2021-01-26 15:55:32'),
(88, 1, 'Edited help question How Oshelter works - How do I contact Oshelter?', '2021-01-26 15:55:53', '2021-01-26 15:55:53'),
(89, 1, 'Added new help question How Oshelter works - How do I send feedback to Oshelter?', '2021-01-28 10:24:13', '2021-01-28 10:24:13'),
(90, 1, 'Edited help question How Oshelter works - How do I send feedback to Oshelter?', '2021-01-28 10:28:37', '2021-01-28 10:28:37'),
(91, 1, 'Edited help question How Oshelter works - How do I send feedback to Oshelter?', '2021-01-28 10:28:47', '2021-01-28 10:28:47'),
(92, 1, 'Added new help category owner - About Listing', '2021-02-05 13:58:07', '2021-02-05 13:58:07'),
(93, 1, 'Added new help category owner - Managing Your Listing', '2021-02-05 13:58:56', '2021-02-05 13:58:56'),
(94, 1, 'Added new help topic About Listing - Preparing for owning', '2021-02-05 13:59:35', '2021-02-05 13:59:35'),
(95, 1, 'Added new help topic About Listing - How to own', '2021-02-05 14:00:10', '2021-02-05 14:00:10'),
(96, 1, 'Added new help question Preparing for owning - What are Oshelter\'s requirements to own property?', '2021-02-05 14:01:44', '2021-02-05 14:01:44'),
(97, 1, 'Added new help question Preparing for owning - How can I prepare to own?', '2021-02-05 14:02:24', '2021-02-05 14:02:24'),
(98, 1, 'Added new help question How to own - What is owner assist and how do I sign up?', '2021-02-05 14:04:53', '2021-02-05 14:04:53'),
(99, 1, 'Added new help question How to own - What is owner?', '2021-02-05 14:05:12', '2021-02-05 14:05:12');

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

--
-- Dumping data for table `bank_withdraws`
--

INSERT INTO `bank_withdraws` (`id`, `withdraw_id`, `bank_name`, `account_number`, `account_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'CalBank', '111001254542', 'fiifi pius', '2021-03-02 10:50:11', '2021-03-02 10:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `adult` int(11) NOT NULL DEFAULT 0,
  `children` int(11) NOT NULL DEFAULT 0,
  `infant` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `property_id`, `owner_id`, `check_in`, `check_out`, `adult`, `children`, `infant`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 15, 1, '2021-02-27', '2021-03-03', 1, 0, 0, 3, '2021-02-25 15:00:08', '2021-02-25 16:35:20');

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

--
-- Dumping data for table `booking_transactions`
--

INSERT INTO `booking_transactions` (`id`, `transaction_id`, `booking_id`, `property_type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'room', '2021-02-25 16:35:20', '2021-02-25 16:35:20'),
(2, 2, 3, 'hostel', '2021-02-26 14:36:02', '2021-02-26 14:36:02'),
(3, 3, 4, 'hostel', '2021-03-05 14:35:34', '2021-03-05 14:35:34');

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
  `currency` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `currency`, `symbol`, `created_at`, `updated_at`) VALUES
(1, 'Ghana Cedis', 'GHS', '2021-01-21 17:07:21', '2021-01-21 17:07:21'),
(2, 'United States Dollar', 'USD', '2021-01-21 17:07:26', '2021-01-21 17:07:26');

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
(1, 'general', 'About Oshelter', 'about-oshelter', '2021-01-26 11:05:46', '2021-01-26 11:05:46'),
(2, 'general', 'Your Account', 'your-account', '2021-01-26 11:05:57', '2021-01-26 11:31:00'),
(3, 'general', 'Terms And Policies', 'terms-and-policies', '2021-01-26 11:06:07', '2021-01-26 11:06:07'),
(4, 'owner', 'About Listing', 'about-listing', '2021-02-05 13:58:07', '2021-02-05 13:58:07'),
(5, 'owner', 'Managing Your Listing', 'managing-your-listing', '2021-02-05 13:58:56', '2021-02-05 13:58:56');

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

--
-- Dumping data for table `help_questions`
--

INSERT INTO `help_questions` (`id`, `help_topic_id`, `question`, `question_slug`, `answer`, `is_popular`, `created_at`, `updated_at`) VALUES
(1, 1, 'How do I create an account?', 'how-do-i-create-an-account', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2021-01-26 15:27:15', '2021-01-26 15:27:15'),
(2, 1, 'How do I list a property on Oshelter?', 'who-can-own-a-property-on-oshelter', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2021-01-26 15:27:54', '2021-01-26 15:27:54'),
(3, 2, 'How do I contact Oshelter?', 'how-do-i-contact-oshelter', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2021-01-26 15:30:34', '2021-01-26 15:30:34'),
(4, 2, 'How do I send feedback to Oshelter?', 'how-do-i-send-feedback-to-oshelter', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2021-01-28 10:24:13', '2021-01-28 10:28:47'),
(5, 9, 'What are Oshelter\'s requirements to own property?', 'what-are-oshelters-requirements-to-own-property', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2021-02-05 14:01:44', '2021-02-05 14:01:44'),
(6, 9, 'How can I prepare to list?', 'how-can-i-prepare-to-list', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2021-02-05 14:02:24', '2021-02-05 14:02:24'),
(7, 10, 'What is owner assist and how do I sign up?', 'what-is-owner-assist-and-how-do-i-sign-up', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2021-02-05 14:04:53', '2021-02-05 14:04:53'),
(8, 10, 'What is owner?', 'what-is-owner', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2021-02-05 14:05:12', '2021-02-05 14:05:12');

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

--
-- Dumping data for table `help_topics`
--

INSERT INTO `help_topics` (`id`, `help_category_id`, `topic_name`, `topic_name_slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Getting started', 'getting-started', '2021-01-26 12:25:14', '2021-01-26 12:25:14'),
(2, 1, 'How Oshelter works', 'how-oshelter-works', '2021-01-26 12:26:23', '2021-01-26 12:48:42'),
(3, 1, 'Messaging', 'messaging', '2021-01-26 12:50:16', '2021-01-26 12:50:16'),
(4, 1, 'Our clients and partners', 'our-clients-and-partners', '2021-01-26 12:50:58', '2021-01-26 12:51:12'),
(5, 2, 'Creating an account', 'creating-an-account', '2021-01-26 12:51:59', '2021-01-26 12:51:59'),
(6, 2, 'Managing your account', 'managing-your-account', '2021-01-26 12:52:28', '2021-01-26 12:52:28'),
(7, 2, 'Account security', 'account-security', '2021-01-26 12:52:50', '2021-01-26 12:52:50'),
(8, 2, 'Verification', 'verification', '2021-01-26 12:53:07', '2021-01-26 12:53:07'),
(9, 4, 'Preparing for owning', 'preparing-for-owning', '2021-02-05 13:59:35', '2021-02-05 13:59:35'),
(10, 4, 'How to own', 'how-to-own', '2021-02-05 14:00:10', '2021-02-05 14:00:10');

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
(1, 1, 'single_room', 'male', 10, 1, 2, 2, 'not_furnished', 1, 1, 1, 1, 1, '2021-02-26 12:59:10', '2021-02-26 12:59:10'),
(2, 2, 'single_room', 'female', 10, 1, 2, 2, 'not_furnished', 1, 1, 1, 1, 1, '2021-02-26 12:59:40', '2021-02-26 12:59:40');

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
(1, 1, 1, 2, 0, 0, '2021-02-26 12:59:10', '2021-02-26 12:59:10'),
(2, 1, 2, 2, 0, 0, '2021-02-26 12:59:10', '2021-02-26 12:59:10'),
(3, 1, 3, 2, 0, 0, '2021-02-26 12:59:10', '2021-02-26 12:59:10'),
(4, 1, 4, 2, 0, 0, '2021-02-26 12:59:10', '2021-02-26 12:59:10'),
(5, 1, 5, 2, 0, 0, '2021-02-26 12:59:10', '2021-02-26 12:59:10'),
(6, 1, 6, 2, 0, 0, '2021-02-26 12:59:10', '2021-02-26 12:59:10'),
(7, 1, 7, 2, 0, 0, '2021-02-26 12:59:10', '2021-02-26 12:59:10'),
(8, 1, 8, 2, 0, 0, '2021-02-26 12:59:10', '2021-02-26 12:59:10'),
(9, 1, 9, 2, 0, 0, '2021-02-26 12:59:10', '2021-02-26 12:59:10'),
(10, 1, 10, 2, 0, 0, '2021-02-26 12:59:10', '2021-02-26 12:59:10'),
(11, 2, 1, 2, 0, 0, '2021-02-26 12:59:40', '2021-02-26 12:59:40'),
(12, 2, 2, 2, 0, 0, '2021-02-26 12:59:40', '2021-02-26 12:59:40'),
(13, 2, 3, 2, 0, 0, '2021-02-26 12:59:40', '2021-02-26 12:59:40'),
(14, 2, 4, 2, 0, 0, '2021-02-26 12:59:40', '2021-02-26 12:59:40'),
(15, 2, 5, 2, 0, 0, '2021-02-26 12:59:41', '2021-02-26 12:59:41'),
(16, 2, 6, 2, 0, 0, '2021-02-26 12:59:41', '2021-02-26 12:59:41'),
(17, 2, 7, 2, 0, 0, '2021-02-26 12:59:41', '2021-02-26 12:59:41'),
(18, 2, 8, 2, 0, 0, '2021-02-26 12:59:41', '2021-02-26 12:59:41'),
(19, 2, 9, 2, 0, 0, '2021-02-26 12:59:41', '2021-02-26 12:59:41'),
(20, 2, 10, 2, 0, 0, '2021-02-26 12:59:41', '2021-02-26 12:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_bookings`
--

CREATE TABLE `hostel_bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `hostel_block_room_number_id` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hostel_bookings`
--

INSERT INTO `hostel_bookings` (`id`, `user_id`, `property_id`, `owner_id`, `hostel_block_room_number_id`, `room_number`, `check_in`, `check_out`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 17, 1, 1, 1, '2021-03-05', '2021-11-05', 3, '2021-02-26 13:16:19', '2021-02-26 14:36:02'),
(4, 2, 17, 1, 2, 2, '2021-03-12', '2021-11-12', 3, '2021-03-05 12:29:14', '2021-03-05 14:35:34');

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
(1, 1, 'Bed', '2021-02-26 13:00:00', '2021-02-26 13:00:00'),
(2, 1, 'Ceiling Fan', '2021-02-26 13:00:00', '2021-02-26 13:00:00'),
(3, 1, 'Wardrobe', '2021-02-26 13:00:00', '2021-02-26 13:00:00'),
(4, 1, 'Balcony', '2021-02-26 13:00:00', '2021-02-26 13:00:00'),
(5, 2, 'Bed', '2021-02-26 13:00:15', '2021-02-26 13:00:15'),
(6, 2, 'Ceiling Fan', '2021-02-26 13:00:15', '2021-02-26 13:00:15'),
(7, 2, 'Wardrobe', '2021-02-26 13:00:15', '2021-02-26 13:00:15'),
(8, 2, 'Balcony', '2021-02-26 13:00:15', '2021-02-26 13:00:15');

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
(1, 16, 'water bill', '2021-02-26 11:10:36', '2021-02-26 11:10:36'),
(2, 16, 'sanitation fee', '2021-02-26 11:10:36', '2021-02-26 11:10:36'),
(3, 17, 'water bill', '2021-02-26 13:03:06', '2021-02-26 13:03:06'),
(4, 17, 'sanitation fee', '2021-02-26 13:03:06', '2021-02-26 13:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `destination` int(11) NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `destination`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Hi wanna book your room. <br>This is in regard to <a class=\"text-primary\" target=\"_blank\" href=\"http://127.0.0.1:8000/properties/15/details\">Appaty single room self contained</a>', 1, '2021-02-23 14:46:24', '2021-02-23 15:05:20'),
(2, 1, 2, 'Hi', 1, '2021-02-25 15:08:13', '2021-02-25 15:18:25');

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
(41, '2020_09_04_121213_create_user_hostel_visits_table', 3),
(42, '2020_09_14_130530_create_admins_table', 4),
(43, '2020_09_15_124314_create_admin_activities_table', 5),
(44, '2020_09_15_131804_create_service_charges_table', 6),
(47, '2020_08_27_141223_create_user_extension_requests_table', 7),
(48, '2020_10_13_180722_create_report_properties_table', 7),
(49, '2020_11_23_120053_create_help_types_table', 8),
(50, '2020_11_23_120132_create_helps_table', 9);

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

--
-- Dumping data for table `mobile_withdraws`
--

INSERT INTO `mobile_withdraws` (`id`, `withdraw_id`, `phone_number`, `network_type`, `account_name`, `created_at`, `updated_at`) VALUES
(1, 1, '0542398441', 'mtn', 'fiifi pius', '2021-03-02 10:38:50', '2021-03-02 10:38:50');

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
(15, 1, 'house', 'room', 'short_stay', 'Appaty single room self contained', 2, 0, 1, 9, 1, 1, '2021-02-23 13:49:17', '2021-02-26 13:47:24'),
(16, 1, 'house', 'house', 'rent', '3 bedroom scenery house', 1, 0, 1, 9, 1, 1, '2021-02-24 17:24:48', '2021-02-26 13:45:54'),
(17, 1, 'storey_building', 'hostel', 'rent', 'Amansie Hostel', NULL, NULL, 1, 9, 1, 1, '2021-02-26 12:57:54', '2021-02-26 13:03:24');

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
(56, 15, 'Bed', '2021-02-23 13:53:32', '2021-02-23 13:53:32'),
(57, 15, 'TV', '2021-02-23 13:53:32', '2021-02-23 13:53:32'),
(58, 15, 'Fridge', '2021-02-23 13:53:32', '2021-02-23 13:53:32'),
(59, 15, 'Internet Connection', '2021-02-23 13:53:32', '2021-02-23 13:53:32'),
(60, 15, 'Towel,Soap', '2021-02-23 13:53:32', '2021-02-23 13:53:32'),
(61, 15, 'Fire Extinguisher', '2021-02-23 13:53:32', '2021-02-23 13:53:32'),
(62, 15, 'Smoke Detector', '2021-02-23 13:53:32', '2021-02-23 13:53:32'),
(63, 15, 'Air Conditioning', '2021-02-23 13:53:32', '2021-02-23 13:53:32'),
(64, 15, 'Ceiling Fan', '2021-02-23 13:53:32', '2021-02-23 13:53:32'),
(65, 15, 'Wardrobe', '2021-02-23 13:53:32', '2021-02-23 13:53:32'),
(66, 16, 'Internet Connection', '2021-02-26 11:05:18', '2021-02-26 11:05:18'),
(67, 16, 'Fire Extinguisher', '2021-02-26 11:05:18', '2021-02-26 11:05:18'),
(68, 16, 'Smoke Detector', '2021-02-26 11:05:18', '2021-02-26 11:05:18'),
(69, 16, 'Air Conditioning', '2021-02-26 11:05:18', '2021-02-26 11:05:18'),
(70, 16, 'Ceiling Fan', '2021-02-26 11:05:18', '2021-02-26 11:05:18'),
(71, 16, 'Wardrobe', '2021-02-26 11:05:18', '2021-02-26 11:05:18'),
(72, 16, 'Water Reservoir', '2021-02-26 11:05:18', '2021-02-26 11:05:18');

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
(11, 15, '1', 1, 1, 1, 1, 1, 1, 'fully_furnished', '2021-02-23 13:50:07', '2021-02-23 13:50:07'),
(12, 16, '3', 0, 1, 1, 1, 1, 1, 'partially_furnished', '2021-02-26 10:40:09', '2021-02-26 10:40:09');

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
(14, 15, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letrase', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2021-02-23 13:57:10', '2021-02-23 13:57:10'),
(15, 16, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letrase', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2021-02-26 11:10:08', '2021-02-26 11:10:08'),
(16, 17, 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letrase', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2021-02-26 13:02:20', '2021-02-26 13:02:20');

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
(1, 17, 'jewery', '2021-02-26 12:58:10', '2021-02-26 12:58:10'),
(2, 17, 'apenteng', '2021-02-26 12:58:18', '2021-02-26 12:58:18');

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
(1, 1, 8, 'month', 400, 'GHS', '2021-02-26 13:02:46', '2021-02-26 13:02:46'),
(2, 2, 8, 'month', 400, 'GHS', '2021-02-26 13:03:04', '2021-02-26 13:03:04');

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
(1, 15, 'Walls', '1225e0bca9a39fe6f1e272e20343e45f338634e56.jpg', '2021-02-23 13:55:07', '2021-02-23 13:55:18'),
(2, 15, 'Views', '17d3d1bcca9385deab15b105862354373dbc3e2a0.jpg', '2021-02-23 13:55:07', '2021-02-23 13:55:25'),
(3, 15, 'Floor', '169f8ef71f135c4f7fc7a3efe9d86a84e3327ff6a.jpg', '2021-02-23 13:55:07', '2021-02-23 13:55:30'),
(4, 15, 'Room', '19aae882b0e681020cce3567f8d11acdcc77ecd23.jpg', '2021-02-23 13:55:08', '2021-02-23 13:55:35'),
(5, 15, 'Frontview', '1b697f98b0deb4e9be70f1ab51ab44e31fa74da20.jpg', '2021-02-23 13:55:08', '2021-02-23 13:55:41'),
(6, 15, 'Room', '136fd016121ebea47f6cd6d47011e1574f6e52f67.jpg', '2021-02-23 13:55:08', '2021-02-23 13:56:21'),
(7, 16, 'Frontview', '16f37b653ca2518d540daa4534b8fdb608dc889c4.jpg', '2021-02-26 11:07:58', '2021-02-26 11:09:13'),
(8, 16, 'Frontview', '13bf180a8130a8d5fbe4e28629dfbf33f5c49c624.jpg', '2021-02-26 11:07:58', '2021-02-26 11:09:18'),
(9, 16, 'Garden', '14bfb1f93633b6761a285545d1b0c7a2e62dc3c0d.jpg', '2021-02-26 11:07:58', '2021-02-26 11:09:22'),
(10, 16, 'Streetview', '19a6e94bf1b56978ba2270953e07e151133044c19.jpg', '2021-02-26 11:09:05', '2021-02-26 11:09:29'),
(11, 16, 'Hall', '1dc89411a171e9c7502424d0fe4da71ca36b1fcdc.jpg', '2021-02-26 11:09:05', '2021-02-26 11:09:33'),
(12, 17, 'Street view', '1331e0321f05557708f9c507a9b8f5e166d1c6ec1.jpg', '2021-02-26 13:01:10', '2021-02-26 13:01:23'),
(13, 17, 'Hall', '1b062e9c62294fd73dc866ba249bf4b0edd5f76d1.jpg', '2021-02-26 13:01:38', '2021-02-26 13:01:45'),
(14, 17, 'Sitting area', '1267445f3336bd3e448e1345a5cc2146c4e959235.jpg', '2021-02-26 13:01:38', '2021-02-26 13:01:50'),
(15, 17, 'Frontview', '106c0b1e2d86a9fdd2f8631d0e2787de11d4b496c.jpg', '2021-02-26 13:01:38', '2021-02-26 13:01:53'),
(16, 17, 'Frontview', '16f732f745cf39efc27d8e559d7a5280d261e07b2.jpg', '2021-02-26 13:01:38', '2021-02-26 13:01:56'),
(17, 17, 'Frontview', '17787ae67f52d821a3a39432e2340ec203c5e2e19.jpg', '2021-02-26 13:01:38', '2021-02-26 13:02:01');

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
(1, 15, NULL, 'Tse Addo High Street, Accra, Ghana', 'tse-addo-high-street-accra-ghana', '5.586269632710302', '-0.14168813942566638', '2021-02-23 13:54:32', '2021-02-23 13:54:32'),
(2, 16, NULL, 'Osu, Accra, Ghana', 'osu-accra-ghana', '5.609806857838959', '-0.21445112170409564', '2021-02-26 11:07:12', '2021-02-26 11:07:12'),
(3, 17, NULL, 'Kumasi, Ghana', 'kumasi-ghana', '6.6666004', '-1.6162709', '2021-02-26 13:01:02', '2021-02-26 13:01:02');

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
(1, 16, 'No drugs', '2021-02-26 11:20:42', '2021-02-26 11:20:42');

-- --------------------------------------------------------

--
-- Table structure for table `property_prices`
--

CREATE TABLE `property_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `payment_duration` int(11) DEFAULT NULL,
  `minimum_stay` int(11) DEFAULT NULL,
  `maximum_stay` int(11) DEFAULT NULL,
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
(1, 15, NULL, 3, 37, 'night', 200, 170, 'GHS', NULL, '2021-02-23 14:05:05', '2021-02-23 14:05:05'),
(2, 16, 12, NULL, NULL, 'month', 1000, NULL, 'GHS', NULL, '2021-02-26 11:10:36', '2021-02-26 11:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `property_reviews`
--

CREATE TABLE `property_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(11) NOT NULL,
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
(1, 15, 'No smoking', '2021-02-23 13:53:52', '2021-02-23 13:53:52'),
(2, 15, 'No deadly weapons', '2021-02-23 13:53:52', '2021-02-23 13:53:52'),
(3, 16, 'No smoking', '2021-02-26 11:05:34', '2021-02-26 11:05:34'),
(4, 16, 'No deadly weapons', '2021-02-26 11:05:34', '2021-02-26 11:05:34'),
(5, 17, 'No smoking', '2021-02-26 13:00:50', '2021-02-26 13:00:50'),
(6, 17, 'No deadly weapons', '2021-02-26 13:00:50', '2021-02-26 13:00:50'),
(7, 17, 'Dont host visitors more than 2 weeks', '2021-02-26 13:00:50', '2021-02-26 13:00:50');

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
(1, 15, 'Emergency Bell', '2021-02-23 13:53:32', '2021-02-23 13:53:32'),
(2, 15, 'Garden', '2021-02-23 13:53:32', '2021-02-23 13:53:32'),
(3, 15, 'Basketball Court', '2021-02-23 13:53:32', '2021-02-23 13:53:32'),
(4, 15, 'Car Park', '2021-02-23 13:53:32', '2021-02-23 13:53:32'),
(5, 15, 'Fire Extinguisher', '2021-02-23 13:53:32', '2021-02-23 13:53:32'),
(6, 17, 'Basketball Court', '2021-02-26 13:00:42', '2021-02-26 13:00:42'),
(7, 17, 'Fire Extinguisher', '2021-02-26 13:00:42', '2021-02-26 13:00:42'),
(8, 17, 'Wifi Connection', '2021-02-26 13:00:42', '2021-02-26 13:00:42'),
(9, 17, 'Water Reservoir', '2021-02-26 13:00:42', '2021-02-26 13:00:42');

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
(1, 'room', '1807ee9526913412cc9e1b51e6aa57e7d992a5215.jpg', 1, '2020-10-15 11:48:18', '2020-11-27 16:30:40'),
(2, 'apartment', '14d05efc1fd3d6fe5a0860be5603011afb11edd24.jpg', 1, '2020-10-15 12:01:44', '2020-11-27 16:31:30'),
(3, 'store', '141b1c14e3e628e08a7cf23a0daf44abb3617d0a9.jpg', 0, '2020-10-15 12:02:12', '2020-12-14 11:19:49'),
(4, 'hostel', '13a556dcbb81022cbcc90ff9d6349d6fb8b714f81.jpg', 1, '2020-10-15 12:03:53', '2020-12-14 11:19:26'),
(5, 'house', '199ea26a8b6ed076ef76527a730b55267a7b7c437.jpg', 1, '2020-12-15 08:53:48', '2020-12-15 08:55:40');

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

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `owner_id`, `reference_id`, `amount`, `service_fee`, `discount_fee`, `currency`, `channel`, `property_type`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'VTB25022021163506', 800, 0, 0, 'GHS', 'mobile_money', 'room', '2021-02-25 16:35:20', '2021-02-25 16:35:20'),
(2, 2, 1, 'VTB26022021143417', 3200, 0, 0, 'GHS', 'mobile_money', 'hostel', '2021-02-26 14:36:02', '2021-02-26 14:36:02'),
(3, 2, 1, 'VTB05032021143502', 3200, 0, 0, 'GHS', 'mobile_money', 'hostel', '2021-03-05 14:35:34', '2021-03-05 14:35:34');

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
(1, 'fiifi pius', 'fiifipius@gmail.com', '$2y$10$9JdQYOkior4Dy5v15zsGIuCSPP9AZwr5raLvsA2v0TczYRZfLs3h2', '0542398442', 'owner', 1, NULL, '82405714', '2021-03-03 17:10:39', 1, '2021-02-22 12:50:09', NULL, 0, NULL, 1, '2021-03-05 12:18:52', 'wt230YL6OwcyiV1bnCi0z1CtcrvHOp8a8q1GSvjKYgVkEz9faBaXTgRPuqUm', '2021-02-22 12:49:55', '2021-03-05 12:18:52', NULL),
(2, 'theresa ohenewaa', 'theresa@gmail.com', '$2y$10$1mrfVnCtnjU8KqGTuZIqouQUjOaknDBUv3Vlww4WNkHhFIudN8w6i', '0507791393', 'visitor', 1, NULL, '13172845', '2021-03-04 18:28:30', 1, '2021-02-22 13:58:45', '7509', 1, '2021-02-23 14:31:52', 1, '2021-03-05 12:19:14', 'Lir1LgmZX4EX0gmcj1R47y78dABGrlHYzSfCg3GYe48TEUSupROX87iPOoEa', '2021-02-22 13:58:28', '2021-03-05 12:19:14', NULL),
(3, 'fiifi java', 'fiifijava@gmail.com', '$2y$10$Yq.UEEw2ka6hkpa3myjaves7bueREVyMl2eTv98FRXu5Ycwaxypee', '0542398441', 'visitor', 1, NULL, '13292022', '2021-02-23 16:04:09', 1, '2021-02-23 15:04:23', '2550', 1, '2021-02-23 15:06:41', 0, '2021-02-26 13:27:43', 'n18Hx9u678dGn4xSy5nRV4ZgUsmGXaISHdu3a6Zfa4ZMTor4ceimJ2brkoeG', '2021-02-23 15:04:09', '2021-02-26 13:27:43', NULL),
(5, 'geek', 'geek@gmail.com', '$2y$10$bND1QFASihg/JFFDaWEuteaBJiYZGDP0EoRexNumVw7wQjAK8Dxfe', '0542398443', 'owner', 1, NULL, '96899361', '2021-03-04 18:26:06', 1, NULL, NULL, 0, NULL, 0, '2021-03-04 16:18:49', 'zs9A5UMvUW6QWQzHQ8NDjjP7JOiqzD3vrzl2kJd1lQAifa1vnsLRPSRtGQFP', '2021-03-04 16:18:49', '2021-03-04 17:27:56', NULL);

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
(1, 1, 'GHS', '2021-02-23 14:05:05', '2021-02-23 14:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_extension_requests`
--

CREATE TABLE `user_extension_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `visit_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `extension_date` date NOT NULL,
  `is_confirm` int(11) NOT NULL DEFAULT 1,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `hostel_block_room_id` int(10) UNSIGNED NOT NULL,
  `hostel_block_room_number_id` int(10) UNSIGNED NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `is_in` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_hostel_visits`
--

INSERT INTO `user_hostel_visits` (`id`, `user_id`, `property_id`, `hostel_block_room_id`, `hostel_block_room_number_id`, `check_in`, `check_out`, `is_in`, `created_at`, `updated_at`) VALUES
(5, 2, 17, 1, 1, '2021-03-05', '2021-11-05', 1, '2021-02-26 14:36:02', '2021-02-26 14:36:02'),
(6, 2, 17, 1, 2, '2021-03-12', '2021-11-12', 1, '2021-03-05 14:35:34', '2021-03-05 14:35:34');

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
(1, 1, '127.0.0.1', 'Ubuntu', 'Firefox', ', ', '2021-02-22 14:10:27', '2021-02-22 14:10:27'),
(2, 1, '127.0.0.1', 'Ubuntu', 'Firefox', ', ', '2021-02-22 14:28:49', '2021-02-22 14:28:49'),
(3, 1, '127.0.0.1', 'Ubuntu', 'Firefox', ', ', '2021-02-22 16:45:11', '2021-02-22 16:45:11'),
(4, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-02-23 10:58:33', '2021-02-23 10:58:33'),
(5, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-02-23 16:13:40', '2021-02-23 16:13:40'),
(6, 3, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-02-23 16:22:00', '2021-02-23 16:22:00'),
(7, 3, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-02-23 16:31:57', '2021-02-23 16:31:57'),
(8, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-02-23 16:34:06', '2021-02-23 16:34:06'),
(9, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-02-24 14:26:01', '2021-02-24 14:26:01'),
(10, 1, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-02-25 10:42:28', '2021-02-25 10:42:28'),
(11, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-02-25 14:59:33', '2021-02-25 14:59:33'),
(12, 1, '127.0.0.1', 'Ubuntu', 'Firefox', ', ', '2021-02-25 15:07:29', '2021-02-25 15:07:29'),
(13, 3, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-02-25 15:49:57', '2021-02-25 15:49:57'),
(14, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-02-25 16:00:21', '2021-02-25 16:00:21'),
(15, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-02-26 10:36:20', '2021-02-26 10:36:20'),
(16, 1, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-02-26 12:55:49', '2021-02-26 12:55:49'),
(17, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-02-26 12:55:59', '2021-02-26 12:55:59'),
(18, 2, '127.0.0.1', 'Android', 'Handheld Browser', ', ', '2021-02-26 13:05:36', '2021-02-26 13:05:36'),
(19, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-02-26 13:09:18', '2021-02-26 13:09:18'),
(20, 3, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-02-26 13:27:43', '2021-02-26 13:27:43'),
(21, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-02-26 13:43:16', '2021-02-26 13:43:16'),
(22, 1, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-03-01 09:11:39', '2021-03-01 09:11:39'),
(23, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-03-02 09:38:40', '2021-03-02 09:38:40'),
(24, 1, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-03-02 09:53:02', '2021-03-02 09:53:02'),
(25, 1, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-03-02 14:38:11', '2021-03-02 14:38:11'),
(26, 1, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-03-03 14:48:59', '2021-03-03 14:48:59'),
(27, 1, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-03-03 15:39:43', '2021-03-03 15:39:43'),
(28, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-03-03 15:40:03', '2021-03-03 15:40:03'),
(29, 1, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-03-03 16:09:06', '2021-03-03 16:09:06'),
(30, 1, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-03-03 16:09:52', '2021-03-03 16:09:52'),
(31, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-03-03 16:29:21', '2021-03-03 16:29:21'),
(32, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-03-04 09:26:36', '2021-03-04 09:26:36'),
(33, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-03-04 15:44:29', '2021-03-04 15:44:29'),
(34, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-03-04 17:28:27', '2021-03-04 17:28:27'),
(35, 1, '127.0.0.1', 'Ubuntu', 'Firefox', ', ', '2021-03-04 17:31:23', '2021-03-04 17:31:23'),
(36, 1, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-03-04 18:48:35', '2021-03-04 18:48:35'),
(37, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-03-04 18:49:06', '2021-03-04 18:49:06');

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
(1, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-02-22 12:49:55', '2021-02-22 12:49:55'),
(2, 2, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-02-22 13:58:28', '2021-02-22 13:58:28'),
(3, 3, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-02-23 15:04:09', '2021-02-23 15:04:09'),
(5, 5, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-03-04 16:18:49', '2021-03-04 16:18:49');

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
(1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2c41418688535fcfb440be0b1a0fa4aaea825dd86.png', 'GHA-0123456789-0', 'national', '2021-02-23 14:30:24', '2021-03-04 11:12:58'),
(2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '391063d4bc5d9d0edcd0929bfc672ff7dbd68bf92.png', NULL, NULL, '2021-02-23 15:04:42', '2021-02-23 15:04:45'),
(3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '100532a438fe0aac20bd66ef1269475752222cb39.png', 'E254425514522', 'voter', '2021-03-05 13:10:48', '2021-03-05 13:11:03');

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

-- --------------------------------------------------------

--
-- Table structure for table `user_visits`
--

CREATE TABLE `user_visits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `adult` int(11) NOT NULL DEFAULT 1,
  `children` int(11) NOT NULL DEFAULT 0,
  `infant` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_visits`
--

INSERT INTO `user_visits` (`id`, `user_id`, `property_id`, `check_in`, `check_out`, `adult`, `children`, `infant`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 15, '2021-02-27', '2021-03-03', 1, 0, 0, 1, '2021-02-25 16:35:20', '2021-02-25 16:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `user_wallets`
--

CREATE TABLE `user_wallets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `balance` double NOT NULL DEFAULT 0,
  `currency` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_cash_out` int(10) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_wallets`
--

INSERT INTO `user_wallets` (`id`, `user_id`, `balance`, `currency`, `type`, `is_cash_out`, `created_at`, `updated_at`) VALUES
(1, 1, 1400, 'GHS', 'booking', 0, '2021-02-24 14:21:12', '2021-03-02 14:38:29'),
(2, 1, 800, 'GHS', 'booking', 1, '2021-02-25 16:35:20', '2021-03-02 10:50:11'),
(3, 1, 3200, 'GHS', 'booking', 1, '2021-02-26 14:36:02', '2021-03-02 10:38:50'),
(4, 1, 3200, 'GHS', 'booking', 0, '2021-03-05 14:35:34', '2021-03-05 14:35:34');

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
-- Dumping data for table `withdraws`
--

INSERT INTO `withdraws` (`id`, `user_wallet_id`, `reference_id`, `amount`, `currency`, `channel`, `created_at`, `updated_at`) VALUES
(1, 3, 'VBW02032021103850', 3200, 'GHS', 'mobile_money', '2021-03-02 10:38:50', '2021-03-02 10:38:50'),
(2, 2, 'VBW02032021105011', 800, 'GHS', 'bank', '2021-03-02 10:50:11', '2021-03-02 10:50:11'),
(3, 1, 'VBW02032021143829', 1400, 'GHS', 'mobile_money', '2021-03-02 14:38:29', '2021-03-02 14:38:29');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_transactions`
--
ALTER TABLE `booking_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `transaction_id` (`transaction_id`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `messages_user_id_index` (`user_id`);

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
  ADD KEY `property_locations_property_id_index` (`property_id`);

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
  ADD KEY `property_reviews_user_id_index` (`user_id`);

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
  ADD KEY `user_currencies_user_id_index` (`user_id`);

--
-- Indexes for table `user_extension_requests`
--
ALTER TABLE `user_extension_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_extension_requests_user_id_index` (`user_id`);

--
-- Indexes for table `user_hostel_visits`
--
ALTER TABLE `user_hostel_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_hostel_visits_user_id_index` (`user_id`),
  ADD KEY `user_hostel_visits_property_id_index` (`property_id`),
  ADD KEY `user_hostel_visits_hostel_block_room_id_index` (`hostel_block_room_id`),
  ADD KEY `user_hostel_visits_hostel_block_room_number_id_index` (`hostel_block_room_number_id`);

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
  ADD KEY `user_visits_property_id_index` (`property_id`);

--
-- Indexes for table `user_wallets`
--
ALTER TABLE `user_wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_wallets_user_id_index` (`user_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `bank_withdraws`
--
ALTER TABLE `bank_withdraws`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_transactions`
--
ALTER TABLE `booking_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `help_questions`
--
ALTER TABLE `help_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `help_topics`
--
ALTER TABLE `help_topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hostel_block_rooms`
--
ALTER TABLE `hostel_block_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hostel_block_room_numbers`
--
ALTER TABLE `hostel_block_room_numbers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `hostel_bookings`
--
ALTER TABLE `hostel_bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hostel_room_amenities`
--
ALTER TABLE `hostel_room_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `include_utilities`
--
ALTER TABLE `include_utilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `mobile_withdraws`
--
ALTER TABLE `mobile_withdraws`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `property_amenities`
--
ALTER TABLE `property_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `property_contains`
--
ALTER TABLE `property_contains`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `property_descriptions`
--
ALTER TABLE `property_descriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `property_hostel_blocks`
--
ALTER TABLE `property_hostel_blocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `property_hostel_prices`
--
ALTER TABLE `property_hostel_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `property_images`
--
ALTER TABLE `property_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `property_locations`
--
ALTER TABLE `property_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `property_own_rules`
--
ALTER TABLE `property_own_rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `property_prices`
--
ALTER TABLE `property_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `property_reviews`
--
ALTER TABLE `property_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_rules`
--
ALTER TABLE `property_rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `property_shared_amenities`
--
ALTER TABLE `property_shared_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_currencies`
--
ALTER TABLE `user_currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_extension_requests`
--
ALTER TABLE `user_extension_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_hostel_visits`
--
ALTER TABLE `user_hostel_visits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_saved_properties`
--
ALTER TABLE `user_saved_properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_visits`
--
ALTER TABLE `user_visits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_wallets`
--
ALTER TABLE `user_wallets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `user_currencies`
--
ALTER TABLE `user_currencies`
  ADD CONSTRAINT `user_currencies_user_id_index` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `user_visits_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_visits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_wallets`
--
ALTER TABLE `user_wallets`
  ADD CONSTRAINT `user_wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD CONSTRAINT `withdraws_ibfk_1` FOREIGN KEY (`user_wallet_id`) REFERENCES `user_wallets` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
