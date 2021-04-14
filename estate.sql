-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 13, 2021 at 06:47 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

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
(1, 'Admin Geek', 'fiifipius@gmail.com', '$2y$10$C5fgKPH/HSQ79J4wiybGVOgILhRN2cCpeyMXn5VFCxiw.leAIVZki', 1, NULL, 'admin', '2021-04-13 12:19:17', '7tOVXmoAgRsNBIGpSCKkKo1fvIrVFWWQYFts8K535Zgp210VI0UWUgBhRzN0', NULL, '2021-04-13 12:19:17');

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
(99, 1, 'Added new help question How to own - What is owner?', '2021-02-05 14:05:12', '2021-02-05 14:05:12'),
(102, 1, 'Rent charges added - Charge(5%) Discount(0%)', '2021-04-10 20:13:58', '2021-04-10 20:13:58'),
(103, 1, 'Rent charges updated - Charge(5%) Discount(0%)', '2021-04-10 20:20:09', '2021-04-10 20:20:09'),
(104, 1, 'Short Stay charges added - Charge(5%) Discount(0%)', '2021-04-10 20:20:30', '2021-04-10 20:20:30'),
(105, 1, 'Sale charges added - Charge(5%) Discount(0%)', '2021-04-10 20:20:40', '2021-04-10 20:20:40'),
(106, 1, 'Short Stay charges updated - Charge(8%) Discount(0%)', '2021-04-10 20:20:48', '2021-04-10 20:20:48'),
(107, 1, 'Short Stay charges updated - Charge(6%) Discount(0%)', '2021-04-10 20:20:57', '2021-04-10 20:20:57');

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
(1, 2, 2, 1, '2021-03-23', '2021-04-02', 1, 0, 0, 3, '2021-03-24 11:54:04', '2021-03-24 11:55:27'),
(2, 2, 7, 1, '2021-04-13', '2021-04-20', 1, 0, 0, 3, '2021-04-12 10:17:52', '2021-04-12 11:00:10');

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
(1, 1, 1, 'room', '2021-03-24 11:55:27', '2021-03-24 11:55:27'),
(2, 2, 2, 'house', '2021-04-12 11:00:10', '2021-04-12 11:00:10'),
(3, 3, 1, 'hostel', '2021-04-12 11:14:51', '2021-04-12 11:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `cancel_confirmations`
--

CREATE TABLE `cancel_confirmations` (
  `id` int(10) UNSIGNED NOT NULL,
  `confirmation_id` int(10) UNSIGNED NOT NULL,
  `reason` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cancel_confirmations`
--

INSERT INTO `cancel_confirmations` (`id`, `confirmation_id`, `reason`, `created_at`, `updated_at`) VALUES
(1, 5, 'The place is not the same as pictures.', '2021-04-13 16:04:56', '2021-04-13 16:04:56'),
(2, 6, 'lorem', '2021-04-13 16:10:35', '2021-04-13 16:10:35');

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

--
-- Dumping data for table `confirmations`
--

INSERT INTO `confirmations` (`id`, `user_id`, `owner_id`, `visit_id`, `transaction_id`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 1, 'room', 1, '2021-03-24 15:39:43', '2021-03-24 15:39:43'),
(5, 2, 1, 1, 3, 'hostel', 0, '2021-04-13 16:04:56', '2021-04-13 16:04:56'),
(6, 2, 1, 2, 2, 'house', 0, '2021-04-13 16:10:35', '2021-04-13 16:10:35');

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
(1, 'Ghana Cedis', 'GHS', '2021-03-22 11:20:23', '2021-03-22 11:20:23'),
(2, 'United State Dollars', 'USD', '2021-03-24 15:44:14', '2021-03-24 15:44:14');

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
('theresa@gmail.com', '50dd76b42882e867e0003d71ffe3ca1ea06413b86efb4612d135f5cdcf743b53', '2021-03-22 11:24:14');

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

--
-- Dumping data for table `extension_transactions`
--

INSERT INTO `extension_transactions` (`id`, `transaction_id`, `extension_id`, `property_type`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'extension_request', '2021-04-12 11:52:18', '2021-04-12 11:52:18');

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
(1, 1, 'single_room', 'male', 5, 1, 2, 2, 'partially_furnished', 1, 1, 1, 1, 1, '2021-03-23 15:10:35', '2021-03-23 15:10:35'),
(3, 2, 'single_room', 'female', 10, 1, 2, 2, 'partially_furnished', 1, 1, 1, 1, 1, '2021-03-23 15:43:47', '2021-03-23 15:43:47'),
(5, 3, 'single_room', 'male', 5, 1, 1, 1, 'partially_furnished', 1, 1, 1, 1, 1, '2021-03-25 11:00:23', '2021-03-25 11:00:23'),
(6, 3, 'single_room', 'female', 5, 6, 1, 1, 'partially_furnished', 1, 1, 1, 1, 1, '2021-03-25 11:00:53', '2021-03-25 11:00:53');

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
(1, 1, 1, 2, 1, 0, '2021-03-23 15:10:35', '2021-03-24 10:18:47'),
(2, 1, 2, 2, 0, 0, '2021-03-23 15:10:35', '2021-03-23 15:10:35'),
(3, 1, 3, 2, 0, 0, '2021-03-23 15:10:35', '2021-03-23 15:10:35'),
(4, 1, 4, 2, 0, 0, '2021-03-23 15:10:35', '2021-03-23 15:10:35'),
(5, 1, 5, 2, 0, 0, '2021-03-23 15:10:35', '2021-03-23 15:10:35'),
(7, 3, 1, 2, 1, 0, '2021-03-23 15:43:47', '2021-03-23 16:03:36'),
(8, 3, 2, 2, 0, 0, '2021-03-23 15:43:47', '2021-03-23 15:43:47'),
(9, 3, 3, 2, 0, 0, '2021-03-23 15:43:47', '2021-03-23 15:43:47'),
(10, 3, 4, 2, 0, 0, '2021-03-23 15:43:47', '2021-03-23 15:43:47'),
(11, 3, 5, 2, 0, 0, '2021-03-23 15:43:47', '2021-03-23 15:43:47'),
(12, 3, 6, 2, 0, 0, '2021-03-23 15:43:47', '2021-03-23 15:43:47'),
(13, 3, 7, 2, 0, 0, '2021-03-23 15:43:47', '2021-03-23 15:43:47'),
(14, 3, 8, 2, 0, 0, '2021-03-23 15:43:47', '2021-03-23 15:43:47'),
(15, 3, 9, 2, 0, 0, '2021-03-23 15:43:47', '2021-03-23 15:43:47'),
(16, 3, 10, 2, 0, 0, '2021-03-23 15:43:47', '2021-03-23 15:43:47'),
(37, 5, 1, 1, 0, 0, '2021-03-25 11:00:23', '2021-03-25 11:00:23'),
(38, 5, 2, 1, 0, 0, '2021-03-25 11:00:23', '2021-03-25 11:00:23'),
(39, 5, 3, 1, 0, 0, '2021-03-25 11:00:23', '2021-03-25 11:00:23'),
(40, 5, 4, 1, 0, 0, '2021-03-25 11:00:23', '2021-03-25 11:00:23'),
(41, 5, 5, 1, 0, 0, '2021-03-25 11:00:23', '2021-03-25 11:00:23'),
(42, 6, 6, 1, 0, 0, '2021-03-25 11:00:53', '2021-04-13 16:04:56'),
(43, 6, 7, 1, 0, 0, '2021-03-25 11:00:53', '2021-03-25 11:00:53'),
(44, 6, 8, 1, 0, 0, '2021-03-25 11:00:53', '2021-03-25 11:00:53'),
(45, 6, 9, 1, 0, 0, '2021-03-25 11:00:53', '2021-03-25 11:00:53'),
(46, 6, 10, 1, 0, 0, '2021-03-25 11:00:53', '2021-03-25 11:00:53');

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
(1, 2, 5, 1, 42, 6, '2021-04-19', '2022-01-19', 3, '2021-04-12 11:12:24', '2021-04-12 11:14:51');

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
(1, 1, 'Bed', '2021-03-23 15:17:28', '2021-03-23 15:17:28'),
(2, 1, 'Internet Connection', '2021-03-23 15:17:28', '2021-03-23 15:17:28'),
(3, 1, 'Smoke Detector', '2021-03-23 15:17:28', '2021-03-23 15:17:28'),
(4, 1, 'Ceiling Fan', '2021-03-23 15:17:28', '2021-03-23 15:17:28'),
(5, 1, 'Learning Light', '2021-03-23 15:17:28', '2021-03-23 15:17:28'),
(6, 1, 'Wardrobe', '2021-03-23 15:17:28', '2021-03-23 15:17:28'),
(7, 1, 'Balcony', '2021-03-23 15:17:28', '2021-03-23 15:17:28'),
(15, 3, 'Bed', '2021-03-23 15:44:18', '2021-03-23 15:44:18'),
(16, 3, 'Internet Connection', '2021-03-23 15:44:18', '2021-03-23 15:44:18'),
(17, 3, 'Smoke Detector', '2021-03-23 15:44:18', '2021-03-23 15:44:18'),
(18, 3, 'Ceiling Fan', '2021-03-23 15:44:18', '2021-03-23 15:44:18'),
(19, 3, 'Learning Light', '2021-03-23 15:44:18', '2021-03-23 15:44:18'),
(20, 3, 'Wardrobe', '2021-03-23 15:44:18', '2021-03-23 15:44:18'),
(21, 3, 'Balcony', '2021-03-23 15:44:18', '2021-03-23 15:44:18'),
(22, 5, 'Bed', '2021-03-25 11:02:33', '2021-03-25 11:02:33'),
(23, 5, 'Ceiling Fan', '2021-03-25 11:02:33', '2021-03-25 11:02:33'),
(24, 5, 'Learning Light', '2021-03-25 11:02:33', '2021-03-25 11:02:33'),
(25, 5, 'Wardrobe', '2021-03-25 11:02:33', '2021-03-25 11:02:33'),
(26, 5, 'Balcony', '2021-03-25 11:02:33', '2021-03-25 11:02:33'),
(27, 6, 'Bed', '2021-03-25 11:02:44', '2021-03-25 11:02:44'),
(28, 6, 'Ceiling Fan', '2021-03-25 11:02:44', '2021-03-25 11:02:44'),
(29, 6, 'Learning Light', '2021-03-25 11:02:44', '2021-03-25 11:02:44'),
(30, 6, 'Wardrobe', '2021-03-25 11:02:44', '2021-03-25 11:02:44'),
(31, 6, 'Balcony', '2021-03-25 11:02:44', '2021-03-25 11:02:44');

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
(1, 1, 'water', '2021-03-22 11:21:12', '2021-03-22 11:21:12'),
(2, 1, 'sanitation', '2021-03-22 11:21:12', '2021-03-22 11:21:12'),
(3, 3, 'water', '2021-03-23 15:41:59', '2021-03-23 15:41:59'),
(4, 3, 'sanitation', '2021-03-23 15:41:59', '2021-03-23 15:41:59'),
(5, 5, 'water', '2021-03-25 11:07:18', '2021-03-25 11:07:18'),
(6, 5, 'sanitation', '2021-03-25 11:07:18', '2021-03-25 11:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, 2, 1, 'I want inquire about your property. <br>This is in regard to <a class=\"text-primary\" target=\"_blank\" href=\"http://127.0.0.1:8000/properties/2/details\">Platinum single room</a>', 1, '2021-03-22 12:54:05', '2021-03-22 12:57:58'),
(4, 2, 1, 'Please I want buy to your property. <br>This is in regard to <a class=\"text-primary\" target=\"_blank\" href=\"http://127.0.0.1:8000/properties/6/details\">2 Sweet Homes</a>', 0, '2021-04-13 11:40:57', '2021-04-13 11:40:57');

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

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `property_id`, `owner_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 6, 1, 1, '2021-04-13 15:34:40', '2021-04-13 15:34:40');

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
('fiifipius@gmail.com', '$2y$10$EbyWOBIXVS35QrA60knnBux0T8Sv3HfMs1j1moli0QWcFGqJzhsES', '2021-03-30 18:01:17');

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
(1, 1, 'house', 'apartment', 'rent', '2 Sway apartment', 1, 0, 1, 9, 1, 1, '2021-03-22 10:59:52', '2021-03-22 11:21:37'),
(2, 1, 'storey_building', 'room', 'short_stay', 'Platinum single room', 2, 0, 1, 9, 1, 1, '2021-03-22 11:56:20', '2021-03-22 12:30:50'),
(3, 1, 'storey_building', 'hostel', 'rent', 'HighFrame Hostel', 1, 0, 1, 9, 1, 1, '2021-03-23 12:54:45', '2021-03-23 15:49:23'),
(4, 1, 'house', 'house', 'rent', 'Mandet 4 bedroom house', 1, 0, 1, 9, 1, 1, '2021-03-25 10:53:23', '2021-03-25 10:57:17'),
(5, 1, 'storey_building', 'hostel', 'rent', 'Great man hostel', NULL, NULL, 1, 9, 1, 1, '2021-03-25 10:58:04', '2021-03-25 11:07:20'),
(6, 1, 'house', 'house', 'sale', '2 Sweet Homes', 1, 0, 1, 9, 1, 1, '2021-04-09 14:30:02', '2021-04-09 14:34:47'),
(7, 1, 'house', 'house', 'short_stay', 'Ahodwo Homes', 3, 3, 1, 9, 1, 1, '2021-04-12 09:54:12', '2021-04-12 09:59:32');

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
(1, 1, 'Bed', '2021-03-22 11:02:00', '2021-03-22 11:02:00'),
(2, 1, 'Fire Extinguisher', '2021-03-22 11:02:00', '2021-03-22 11:02:00'),
(3, 1, 'Ceiling Fan', '2021-03-22 11:02:00', '2021-03-22 11:02:00'),
(4, 1, 'Balcony', '2021-03-22 11:02:00', '2021-03-22 11:02:00'),
(5, 1, 'Wardrobe', '2021-03-22 11:02:00', '2021-03-22 11:02:00'),
(6, 1, 'Water Reservoir', '2021-03-22 11:02:00', '2021-03-22 11:02:00'),
(7, 2, 'Bed', '2021-03-22 11:57:07', '2021-03-22 11:57:07'),
(8, 2, 'TV', '2021-03-22 11:57:07', '2021-03-22 11:57:07'),
(9, 2, 'Fridge', '2021-03-22 11:57:07', '2021-03-22 11:57:07'),
(10, 2, 'Internet Connection', '2021-03-22 11:57:07', '2021-03-22 11:57:07'),
(11, 2, 'Smoke Detector', '2021-03-22 11:57:07', '2021-03-22 11:57:07'),
(12, 2, 'Air Conditioning', '2021-03-22 11:57:07', '2021-03-22 11:57:07'),
(13, 2, 'Ceiling Fan', '2021-03-22 11:57:07', '2021-03-22 11:57:07'),
(14, 2, 'Balcony', '2021-03-22 11:57:07', '2021-03-22 11:57:07'),
(15, 2, 'Wardrobe', '2021-03-22 11:57:07', '2021-03-22 11:57:07'),
(16, 2, 'Water Reservoir', '2021-03-22 11:57:07', '2021-03-22 11:57:07'),
(17, 4, 'Wardrobe', '2021-03-25 10:54:18', '2021-03-25 10:54:18'),
(18, 4, 'Water Reservoir', '2021-03-25 10:54:18', '2021-03-25 10:54:18'),
(19, 6, 'Smoke Detector', '2021-04-09 14:31:33', '2021-04-09 14:31:33'),
(20, 6, 'Air Conditioning', '2021-04-09 14:31:33', '2021-04-09 14:31:33'),
(21, 6, 'Ceiling Fan', '2021-04-09 14:31:33', '2021-04-09 14:31:33'),
(22, 6, 'Wardrobe', '2021-04-09 14:31:33', '2021-04-09 14:31:33'),
(23, 6, 'Water Reservoir', '2021-04-09 14:31:33', '2021-04-09 14:31:33'),
(24, 6, 'Door Bell', '2021-04-09 14:31:33', '2021-04-09 14:31:33'),
(25, 6, 'Car Parking Space', '2021-04-09 14:31:33', '2021-04-09 14:31:33'),
(26, 6, 'Garden', '2021-04-09 14:31:33', '2021-04-09 14:31:33'),
(27, 7, 'Bed', '2021-04-12 09:56:04', '2021-04-12 09:56:04'),
(28, 7, 'TV', '2021-04-12 09:56:04', '2021-04-12 09:56:04'),
(29, 7, 'Fridge', '2021-04-12 09:56:04', '2021-04-12 09:56:04'),
(30, 7, 'Internet Connection', '2021-04-12 09:56:04', '2021-04-12 09:56:04'),
(31, 7, 'Telephone', '2021-04-12 09:56:04', '2021-04-12 09:56:04'),
(32, 7, 'Towel,Soap', '2021-04-12 09:56:04', '2021-04-12 09:56:04'),
(33, 7, 'Fire Extinguisher', '2021-04-12 09:56:04', '2021-04-12 09:56:04'),
(34, 7, 'Smoke Detector', '2021-04-12 09:56:04', '2021-04-12 09:56:04'),
(35, 7, 'Air Conditioning', '2021-04-12 09:56:04', '2021-04-12 09:56:04'),
(36, 7, 'Ceiling Fan', '2021-04-12 09:56:04', '2021-04-12 09:56:04'),
(37, 7, 'Wardrobe', '2021-04-12 09:56:04', '2021-04-12 09:56:04'),
(38, 7, 'Water Reservoir', '2021-04-12 09:56:04', '2021-04-12 09:56:04'),
(39, 7, 'Door Bell', '2021-04-12 09:56:04', '2021-04-12 09:56:04'),
(40, 7, 'Car Parking Space', '2021-04-12 09:56:04', '2021-04-12 09:56:04'),
(41, 7, 'Garden', '2021-04-12 09:56:04', '2021-04-12 09:56:04'),
(42, 7, 'Laundry', '2021-04-12 09:56:04', '2021-04-12 09:56:04');

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
(1, 1, '2', 0, 1, 1, 1, 1, 1, 'partially_furnished', '2021-03-22 11:00:22', '2021-03-22 11:00:22'),
(2, 2, '1', 1, 1, 1, 1, 1, 1, 'fully_furnished', '2021-03-22 11:56:41', '2021-03-22 11:56:41'),
(3, 4, '4', 0, 1, 2, 1, 2, 1, 'not_furnished', '2021-03-25 10:53:45', '2021-03-25 10:53:45'),
(4, 6, '4', 4, 1, 1, 1, 1, 1, 'not_furnished', '2021-04-09 14:30:55', '2021-04-09 14:30:55'),
(5, 7, '4', 4, 1, 2, 1, 2, 1, 'fully_furnished', '2021-04-12 09:54:42', '2021-04-12 09:54:42');

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
(1, 1, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letrase', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2021-03-22 11:18:44', '2021-03-22 11:18:44'),
(2, 2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letrase', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2021-03-22 12:29:01', '2021-03-22 12:29:01'),
(3, 3, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letrase', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2021-03-23 15:41:21', '2021-03-23 15:41:21'),
(4, 4, 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2021-03-25 10:56:21', '2021-03-25 10:56:21'),
(5, 5, 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letrase', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2021-03-25 11:05:44', '2021-03-25 11:05:44'),
(6, 6, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letrase', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2021-04-09 14:33:31', '2021-04-09 14:33:31'),
(7, 7, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2021-04-12 09:59:06', '2021-04-12 09:59:06');

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
(1, 3, 'kofi annan', '2021-03-23 12:54:57', '2021-03-23 12:54:57'),
(2, 3, 'christine harbured', '2021-03-23 13:16:06', '2021-03-23 13:16:06'),
(3, 5, 'great man', '2021-03-25 10:58:22', '2021-03-25 10:58:22');

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
(1, 1, 8, 'month', 450, 'GHS', '2021-03-23 15:41:42', '2021-03-23 15:41:42'),
(3, 3, 8, 'month', 450, 'GHS', '2021-03-23 15:44:42', '2021-03-23 15:44:42'),
(4, 5, 9, 'month', 400, 'GHS', '2021-03-25 11:07:04', '2021-03-25 11:07:04'),
(5, 6, 9, 'month', 400, 'GHS', '2021-03-25 11:07:16', '2021-03-25 11:07:16');

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
(1, 1, 'Frontview', '15548cc48c659306de21458f3e7100520e3a265a5.jpg', '2021-03-22 11:08:27', '2021-03-22 11:08:42'),
(2, 1, 'Sitting condor', '16b26745fbcddb427b7efebf40c3f1b36c3c962a6.jpg', '2021-03-22 11:13:07', '2021-03-22 11:13:19'),
(3, 1, 'Visitors room', '1907da253c6546afdd7e4489ec56d1d291f7237f1.jpg', '2021-03-22 11:14:08', '2021-03-22 11:14:37'),
(4, 1, 'Backview', '15f29812bf0314f9f232d711ad2934cd8bd1da0aa.jpg', '2021-03-22 11:15:54', '2021-03-22 11:16:07'),
(5, 1, 'Quietroom', '17a3a93564a4ea7370095d3e405f8fa63f635ad36.jpg', '2021-03-22 11:16:34', '2021-03-22 11:16:47'),
(6, 1, '3D image', '1a7058b0955a47db8ed224d756c162b78c69b96be.jpg', '2021-03-22 11:17:27', '2021-03-22 11:17:36'),
(7, 2, 'Backview', '1841c52c86acb36f71d9cbd439fca155f87f0978b.jpg', '2021-03-22 12:08:05', '2021-03-22 12:12:17'),
(8, 2, 'Road way', '1571c08fa9ca8106f11a90ea45a494e48852bb950.jpg', '2021-03-22 12:12:27', '2021-03-22 12:13:40'),
(9, 2, 'Exterior', '1f8461fedf1576cc3439153a1181c56a80c65cb0e.jpg', '2021-03-22 12:14:15', '2021-03-22 12:14:23'),
(10, 2, '3D view', '15002a265c353f566fe43c548dbff51f48ad3d46b.png', '2021-03-22 12:14:56', '2021-03-22 12:15:06'),
(11, 2, 'Gardens', '1e1961a2821e3455175b313e4b9f80d674fcf4f9a.jpg', '2021-03-22 12:16:00', '2021-03-22 12:16:09'),
(19, 3, 'Bedroom', '1864dd65ef0cd59405f5cb7ec512173d875b565e1.jpg', '2021-03-23 15:29:49', '2021-03-23 15:31:50'),
(20, 3, 'Room', '18cb0a0f3694ebe0c75ff08521836bac587243055.jpg', '2021-03-23 15:30:05', '2021-03-23 15:31:53'),
(21, 3, 'Cool', '15a13dd1bfa9ddbd294058f2f2db707e605ccd7f6.jpg', '2021-03-23 15:32:05', '2021-03-23 15:34:29'),
(22, 3, 'Front', '1fa899c08165c5d37a6f8338eb41deb65f4ad74ad.jpg', '2021-03-23 15:32:05', '2021-03-23 15:34:12'),
(23, 3, 'Sitting', '119119fb908e3c3a8508bf2ac6c905da369263515.jpg', '2021-03-23 15:32:05', '2021-03-23 15:32:13'),
(26, 3, 'Fresh air', '15fcad9fbb2987cba9a6487f66c2598a864aa0cf1.png', '2021-03-23 15:49:05', '2021-03-23 15:49:20'),
(27, 4, 'House', '1ec79995343df0be8b74f0b740d01e18846926e46.jpg', '2021-03-25 10:55:36', '2021-03-25 10:55:50'),
(28, 4, 'House', '131b8132a91be25b9bdcccf94beba5835f3cc44b5.jpg', '2021-03-25 10:55:36', '2021-03-25 10:55:51'),
(29, 4, 'House', '185928e3b173d5dc52795c75271d9e39ffbdaef46.jpg', '2021-03-25 10:55:37', '2021-03-25 10:55:53'),
(30, 4, 'House', '1f683b7f529838eecaa0303f22b99181e6d6b0e11.jpg', '2021-03-25 10:55:37', '2021-03-25 10:55:55'),
(31, 4, 'House', '1849e2926156d793dd49ea17511e549d82b3d19ac.jpg', '2021-03-25 10:55:37', '2021-03-25 10:55:56'),
(32, 4, 'House', '12a593664f3ddb855f7da23c58ebfeb47f1f6e411.png', '2021-03-25 10:55:37', '2021-03-25 10:55:56'),
(33, 5, 'Hostel', '11ed3afcf13a2ac3e5e8ba8cc7b2d13993402c170.jpg', '2021-03-25 11:05:21', '2021-03-25 11:05:25'),
(34, 5, 'Hostel', '171dc4bdb7a64c089c4368749b4de22655ea14482.jpg', '2021-03-25 11:05:21', '2021-03-25 11:05:27'),
(35, 5, 'Hostel', '16d036afdc96ea1f6affa5639a4d5e3591ccc8f53.jpg', '2021-03-25 11:05:21', '2021-03-25 11:05:29'),
(36, 5, 'Hostel', '196fec877ba5b2c4ea44add6f010178c480c3aa3a.jpg', '2021-03-25 11:05:21', '2021-03-25 11:05:31'),
(37, 5, 'Hostel', '1beb022444feb520ae5cb60256e1939d0aacdb574.jpg', '2021-03-25 11:05:21', '2021-03-25 11:05:34'),
(38, 5, 'Hostel', '1151ae1160b0a6f65cd8cfe31f57f34b0e4503dcf.jpg', '2021-03-25 11:05:21', '2021-03-25 11:05:36'),
(39, 6, 'Frontview', '1fd4e7dbdbf41c2dc3553fca1f3a06eb90ed2d38c.jpg', '2021-04-09 14:32:28', '2021-04-09 14:32:32'),
(40, 6, 'Frontview', '10e845a1ce4347aba0e1a6872938ae116ad53db3f.jpg', '2021-04-09 14:32:28', '2021-04-09 14:32:34'),
(41, 6, 'Backview', '15f55911cc686d8d848b09f4daf159bcdf2ea2458.jpg', '2021-04-09 14:32:28', '2021-04-09 14:32:40'),
(42, 6, 'Sitting room', '1bd36eced4fb03f7b1480e7c243315363df94ea12.jpg', '2021-04-09 14:32:28', '2021-04-09 14:32:45'),
(43, 6, 'Garden', '16687cef7531f050ddf7d72a71187fcc49c211308.jpg', '2021-04-09 14:32:28', '2021-04-09 14:32:50'),
(44, 6, 'Outside', '1e6de3dddf2ab7ae26599bea7802134b68409580d.png', '2021-04-09 14:32:28', '2021-04-09 14:32:55'),
(45, 7, 'Frontview', '122be64daad7099c8db6d0e881644e4930e6df93c.jpg', '2021-04-12 09:57:28', '2021-04-12 09:57:32'),
(46, 7, 'Frontview', '1b1ff13475e1538c88b14d55ac3e958cc360e1162.jpg', '2021-04-12 09:57:28', '2021-04-12 09:57:34'),
(47, 7, 'Frontview', '14383416fab3fcf42f2eceb7c6f28f57a16f8ebe2.jpg', '2021-04-12 09:57:28', '2021-04-12 09:57:35'),
(48, 7, 'Outside', '1fbe03847b70117fb36dc6870e43d6049f53cbcf8.jpg', '2021-04-12 09:57:28', '2021-04-12 09:57:41'),
(49, 7, 'Sittingroom', '16bee3982a692330dea533702c0de2c487d72c800.jpg', '2021-04-12 09:57:28', '2021-04-12 09:57:51'),
(50, 7, 'Visitors lodge', '1c8a19c43654e5aa0c43aae55b2d203518319e478.jpg', '2021-04-12 09:57:28', '2021-04-12 09:58:11'),
(51, 7, 'Outside', '178fe31454afa68315782f0b85c988ea970ecc479.png', '2021-04-12 09:57:29', '2021-04-12 09:58:15');

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
(4, 1, NULL, 'Airport Hills, Accra, Ghana', 'airport-hills-accra-ghana', '5.616592001263079', '-0.14350556322937802', '2021-03-22 11:02:27', '2021-03-22 11:02:27'),
(5, 2, NULL, '37 Mills Road, Accra, Ghana', '37-mills-road-accra-ghana', '5.534203501391307', '-0.21482020422973758', '2021-03-22 12:03:56', '2021-03-22 12:03:56'),
(6, 3, NULL, 'Cantonments, Accra, Ghana', 'cantonments-accra-ghana', '5.576882658596576', '-0.17802226004943078', '2021-03-23 15:19:19', '2021-03-23 15:19:19'),
(7, 4, NULL, 'Madina, Accra Metropolis, Ghana', 'madina-accra-metropolis-ghana', '5.673532998751293', '-0.16635291349181847', '2021-03-25 10:55:09', '2021-03-25 10:55:09'),
(8, 5, NULL, 'Tse Addo High Street, Accra, Ghana', 'tse-addo-high-street-accra-ghana', '5.586547257581744', '-0.14089420555725818', '2021-03-25 11:04:55', '2021-03-25 11:04:55'),
(9, 6, NULL, 'Accra - Tema Motorway, Accra, Ghana', 'accra-tema-motorway-accra-ghana', '5.635052585835802', '-0.14450998968810413', '2021-04-09 14:32:09', '2021-04-09 14:32:09'),
(10, 7, NULL, 'Accra New Town, Accra, Ghana', 'accra-new-town-accra-ghana', '5.578797325389278', '-0.21618968042602216', '2021-04-12 09:56:33', '2021-04-12 09:56:33');

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
(1, 1, 12, NULL, NULL, 'month', 500, NULL, 'GHS', NULL, '2021-03-22 11:21:12', '2021-03-22 11:21:12'),
(2, 2, NULL, 5, 30, 'night', 500, 480, 'GHS', NULL, '2021-03-22 12:30:16', '2021-03-22 12:30:16'),
(3, 4, 12, NULL, NULL, 'month', 2500, NULL, 'GHS', NULL, '2021-03-25 10:57:00', '2021-03-25 10:57:00'),
(4, 6, NULL, NULL, NULL, NULL, 4000000, NULL, 'GHS', NULL, '2021-04-09 14:34:09', '2021-04-09 14:34:09'),
(5, 7, NULL, 4, 51, 'night', 700, 650, 'GHS', NULL, '2021-04-12 09:59:23', '2021-04-12 09:59:23');

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
(1, 1, 'No smoking', '2021-03-22 11:02:08', '2021-03-22 11:02:08'),
(2, 1, 'No deadly weapons', '2021-03-22 11:02:08', '2021-03-22 11:02:08'),
(3, 2, 'No smoking', '2021-03-22 11:57:11', '2021-03-22 11:57:11'),
(4, 2, 'No deadly weapons', '2021-03-22 11:57:11', '2021-03-22 11:57:11'),
(5, 3, 'No smoking', '2021-03-23 15:18:36', '2021-03-23 15:18:36'),
(6, 3, 'No deadly weapons', '2021-03-23 15:18:36', '2021-03-23 15:18:36'),
(7, 3, 'Dont host visitors more than 2 weeks', '2021-03-23 15:18:36', '2021-03-23 15:18:36'),
(8, 4, 'No smoking', '2021-03-25 10:54:48', '2021-03-25 10:54:48'),
(9, 4, 'No deadly weapons', '2021-03-25 10:54:48', '2021-03-25 10:54:48'),
(10, 5, 'No smoking', '2021-03-25 11:03:02', '2021-03-25 11:03:02'),
(11, 5, 'No deadly weapons', '2021-03-25 11:03:02', '2021-03-25 11:03:02'),
(12, 7, 'No smoking', '2021-04-12 09:56:15', '2021-04-12 09:56:15'),
(13, 7, 'No deadly weapons', '2021-04-12 09:56:15', '2021-04-12 09:56:15'),
(14, 7, 'No washing outside laundry', '2021-04-12 09:56:15', '2021-04-12 09:56:15');

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
(1, 1, 'Garden', '2021-03-22 11:02:00', '2021-03-22 11:02:00'),
(2, 1, 'Basketball Court', '2021-03-22 11:02:00', '2021-03-22 11:02:00'),
(3, 1, 'Car Park', '2021-03-22 11:02:00', '2021-03-22 11:02:00'),
(4, 1, 'Wifi Connection', '2021-03-22 11:02:00', '2021-03-22 11:02:00'),
(5, 2, 'Garden', '2021-03-22 11:57:07', '2021-03-22 11:57:07'),
(6, 2, 'Basketball Court', '2021-03-22 11:57:07', '2021-03-22 11:57:07'),
(7, 2, 'Car Park', '2021-03-22 11:57:07', '2021-03-22 11:57:07'),
(8, 2, 'Gym', '2021-03-22 11:57:07', '2021-03-22 11:57:07'),
(14, 3, 'Emergency Bell', '2021-03-23 15:44:20', '2021-03-23 15:44:20'),
(15, 3, 'Garden', '2021-03-23 15:44:20', '2021-03-23 15:44:20'),
(16, 3, 'Basketball Court', '2021-03-23 15:44:20', '2021-03-23 15:44:20'),
(17, 3, 'Car Park', '2021-03-23 15:44:20', '2021-03-23 15:44:20'),
(18, 3, 'Water Reservoir', '2021-03-23 15:44:20', '2021-03-23 15:44:20'),
(19, 4, 'Garden', '2021-03-25 10:54:18', '2021-03-25 10:54:18'),
(20, 4, 'Car Park', '2021-03-25 10:54:18', '2021-03-25 10:54:18'),
(21, 4, 'Gym', '2021-03-25 10:54:18', '2021-03-25 10:54:18'),
(22, 5, 'Car Park', '2021-03-25 11:02:55', '2021-03-25 11:02:55'),
(23, 5, 'Wifi Connection', '2021-03-25 11:02:55', '2021-03-25 11:02:55'),
(24, 5, 'Water Reservoir', '2021-03-25 11:02:55', '2021-03-25 11:02:55'),
(25, 5, 'Gym', '2021-03-25 11:02:55', '2021-03-25 11:02:55'),
(26, 7, 'Gym', '2021-04-12 09:56:04', '2021-04-12 09:56:04');

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
(1, 'room', NULL, 1, '2020-10-15 11:48:18', '2020-11-27 16:30:40'),
(2, 'apartment', NULL, 1, '2020-10-15 12:01:44', '2020-11-27 16:31:30'),
(3, 'store', NULL, 0, '2020-10-15 12:02:12', '2020-12-14 11:19:49'),
(4, 'hostel', NULL, 1, '2020-10-15 12:03:53', '2020-12-14 11:19:26'),
(5, 'house', NULL, 1, '2020-12-15 08:53:48', '2020-12-15 08:55:40');

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

--
-- Dumping data for table `service_charges`
--

INSERT INTO `service_charges` (`id`, `property_type`, `charge`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'rent', 5, 0, '2021-04-10 20:13:58', '2021-04-10 20:13:58'),
(2, 'short_stay', 6, 0, '2021-04-10 20:20:30', '2021-04-10 20:20:57'),
(3, 'sale', 5, 0, '2021-04-10 20:20:40', '2021-04-10 20:20:40');

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
(1, 2, 1, 'VTB24032021115519', 3500, 0, 0, 'GHS', 'card', 'room', '2021-03-24 11:55:27', '2021-03-24 11:55:27'),
(2, 2, 1, 'VTB12042021105954', 4900, 294, 0, 'GHS', 'mobile_money', 'house', '2021-04-12 11:00:10', '2021-04-12 11:00:10'),
(3, 2, 1, 'VTB12042021111327', 3600, 180, 0, 'GHS', 'card', 'hostel', '2021-04-12 11:14:51', '2021-04-12 11:14:51'),
(4, 2, 1, 'VTE12042021115206', 14000, 0, 0, 'GHS', 'mobile_money', 'extension_request', '2021-04-12 11:52:18', '2021-04-12 11:52:18');

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
(1, 'fiifi pius', 'fiifipius@gmail.com', '$2y$10$OWs2Uutg7RoxheWPazEnU.5WlMRPedSayEdY9uhtfeD1a2bs5HjTK', '0542398441', 'owner', 1, '123d1bbf7c8196420c070a167ab7027e697409fca.jpeg', '60522224', '2021-04-10 20:58:51', 1, '2021-03-22 10:59:29', NULL, 0, NULL, 1, '2021-04-13 16:11:41', '1ZIuFSHkd7TYKWCKbgPtpCEcUKYQvRamErDvuDkg0fyjHwV3ef94JMRdfyzC', '2021-03-22 10:59:10', '2021-04-13 16:11:41', NULL),
(2, 'theresa ohenewaa', 'theresa@gmail.com', '$2y$10$Yqj5zOGbdCvYp62uXlhyjeU3IRjko4Gm8HkA8Sru.Xhqmk.3.g6R6', '0507791393', 'visitor', 1, '281c4498c193a3ab60d0cf6d9f1ab4af17344c1a9.jpg', '08392336', '2021-03-22 12:24:14', 1, '2021-03-22 11:24:28', '0087', 1, '2021-04-12 17:47:38', 1, '2021-04-13 15:18:46', 'LtSw189ETy3KATs0W1ZKhOhu8JkFWW8IrbGCThfUvUS7eigW8PRpcmqWS9vr', '2021-03-22 11:24:14', '2021-04-13 15:18:46', NULL),
(4, 'geek pius', 'fiifijava@gmail.com', '$2y$10$MlHljWab8JH75XguYBmCquePYCYtWKyviZobf/EjLyIwUNsMNV.DC', '0542398442', 'visitor', 1, NULL, '54812703', '2021-04-13 13:09:59', 1, NULL, '0114', 1, NULL, 1, '2021-04-13 12:09:59', 'VBwFGjcTIF42SVSSnUNWY6A9cHQ00tSB3cH444pzHs1Uokdq8gBGyarOxfvA', '2021-04-13 12:09:59', '2021-04-13 12:10:15', NULL);

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
(1, 1, 'GHS', '2021-03-25 11:06:16', '2021-03-25 11:06:16');

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

--
-- Dumping data for table `user_extension_requests`
--

INSERT INTO `user_extension_requests` (`id`, `user_id`, `visit_id`, `owner_id`, `extension_date`, `is_confirm`, `type`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2021-04-30', 3, 'room', '2021-04-12 11:17:10', '2021-04-12 11:52:18');

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
  `is_in` int(10) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_hostel_visits`
--

INSERT INTO `user_hostel_visits` (`id`, `user_id`, `property_id`, `hostel_booking_id`, `hostel_block_room_id`, `hostel_block_room_number_id`, `check_in`, `check_out`, `is_in`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 1, 6, 42, '2021-04-19', '2022-01-19', 2, '2021-04-12 11:14:51', '2021-04-13 16:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `device` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `user_id`, `device`, `browser`, `location`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ubuntu', 'Firefox', ', ', '2021-03-22 11:53:01', '2021-03-22 11:53:01'),
(2, 2, 'Linux', 'Chrome', ', ', '2021-03-23 10:28:26', '2021-03-23 10:28:26'),
(4, 1, 'Linux', 'Chrome', ', ', '2021-03-26 12:59:56', '2021-03-26 12:59:56');

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
(2, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-03-22 10:59:10', '2021-03-22 10:59:10'),
(3, 2, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-03-22 11:24:14', '2021-03-22 11:24:14'),
(5, 4, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-04-13 12:09:59', '2021-04-13 12:09:59');

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
(1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GHA-0123456789-0', 'national', '2021-03-22 15:36:48', '2021-03-22 15:36:56'),
(2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1f1b39f8d15d2f7b9ed2c607f0ccc326c0bb40208.jpg', 'GHA-0123456789-0', 'national', '2021-03-22 16:54:07', '2021-04-08 19:03:04'),
(4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '426964bd3ddb322d18b82b9aa1ce26438037a6997.png', '1455475547', 'voter', '2021-04-13 12:10:58', '2021-04-13 12:11:06');

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
  `booking_id` int(10) UNSIGNED NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `adult` int(11) NOT NULL DEFAULT 1,
  `children` int(11) NOT NULL DEFAULT 0,
  `infant` int(11) NOT NULL DEFAULT 0,
  `status` int(10) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_visits`
--

INSERT INTO `user_visits` (`id`, `user_id`, `property_id`, `booking_id`, `check_in`, `check_out`, `adult`, `children`, `infant`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, '2021-03-26', '2021-04-30', 1, 0, 0, 1, '2021-03-24 11:55:27', '2021-04-12 11:52:18'),
(2, 2, 7, 2, '2021-04-13', '2021-04-20', 1, 0, 0, 2, '2021-04-12 11:00:10', '2021-04-13 16:10:35');

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
  `is_cash_out` int(10) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_wallets`
--

INSERT INTO `user_wallets` (`id`, `user_id`, `transaction_id`, `balance`, `currency`, `type`, `is_cash_out`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3500, 'GHS', 'booking', 1, '2021-03-24 11:55:27', '2021-03-24 15:39:43'),
(3, 1, 2, 4900, 'GHS', 'booking', 4, '2021-04-12 11:00:10', '2021-04-13 16:10:35'),
(4, 1, 3, 3600, 'GHS', 'booking', 4, '2021-04-12 11:14:51', '2021-04-13 16:04:56'),
(5, 1, 4, 14000, 'GHS', 'extension', 0, '2021-04-12 11:52:18', '2021-04-12 11:52:18');

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
-- Indexes for table `account_reactivates`
--
ALTER TABLE `account_reactivates`
  ADD KEY `email_account_reactivates_index` (`email`);

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
-- Indexes for table `cancel_confirmations`
--
ALTER TABLE `cancel_confirmations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cancel_confirmations_confirmation_id_foreign` (`confirmation_id`);

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
  ADD KEY `owner_id_hostel_bookings_index` (`owner_id`),
  ADD KEY `hostel_block_room_number_id_hostel_bookings_index` (`hostel_block_room_number_id`),
  ADD KEY `property_id_hostel_bookings_index` (`property_id`),
  ADD KEY `user_id_hostel_bookings_index` (`user_id`) USING BTREE;

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
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_owner_id_foreign` (`owner_id`),
  ADD KEY `orders_property_id_foreign` (`property_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_charges_property_type_index` (`property_type`);

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
  ADD KEY `user_extension_requests_user_id_index` (`user_id`),
  ADD KEY `user_extension_requests_owner_id_index` (`owner_id`),
  ADD KEY `user_extension_requests_visit_id_index` (`visit_id`);

--
-- Indexes for table `user_hostel_visits`
--
ALTER TABLE `user_hostel_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_hostel_visits_user_id_index` (`user_id`),
  ADD KEY `user_hostel_visits_property_id_index` (`property_id`),
  ADD KEY `user_hostel_visits_hostel_block_room_id_index` (`hostel_block_room_id`),
  ADD KEY `user_hostel_visits_hostel_block_room_number_id_index` (`hostel_block_room_number_id`),
  ADD KEY `user_hostel_visits_hostel_booking_id_index` (`hostel_booking_id`) USING BTREE;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_activities`
--
ALTER TABLE `admin_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `bank_withdraws`
--
ALTER TABLE `bank_withdraws`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking_transactions`
--
ALTER TABLE `booking_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cancel_confirmations`
--
ALTER TABLE `cancel_confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `confirmations`
--
ALTER TABLE `confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `help_categories`
--
ALTER TABLE `help_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hostel_block_room_numbers`
--
ALTER TABLE `hostel_block_room_numbers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `hostel_bookings`
--
ALTER TABLE `hostel_bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hostel_room_amenities`
--
ALTER TABLE `hostel_room_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `include_utilities`
--
ALTER TABLE `include_utilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `mobile_withdraws`
--
ALTER TABLE `mobile_withdraws`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `property_amenities`
--
ALTER TABLE `property_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `property_contains`
--
ALTER TABLE `property_contains`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `property_descriptions`
--
ALTER TABLE `property_descriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `property_hostel_blocks`
--
ALTER TABLE `property_hostel_blocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `property_hostel_prices`
--
ALTER TABLE `property_hostel_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `property_images`
--
ALTER TABLE `property_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `property_locations`
--
ALTER TABLE `property_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `property_own_rules`
--
ALTER TABLE `property_own_rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_prices`
--
ALTER TABLE `property_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `property_reviews`
--
ALTER TABLE `property_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_rules`
--
ALTER TABLE `property_rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `property_shared_amenities`
--
ALTER TABLE `property_shared_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_currencies`
--
ALTER TABLE `user_currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_extension_requests`
--
ALTER TABLE `user_extension_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_hostel_visits`
--
ALTER TABLE `user_hostel_visits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_saved_properties`
--
ALTER TABLE `user_saved_properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_visits`
--
ALTER TABLE `user_visits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_wallets`
--
ALTER TABLE `user_wallets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `cancel_confirmations`
--
ALTER TABLE `cancel_confirmations`
  ADD CONSTRAINT `cancel_confirmations_confirmation_id_foreign` FOREIGN KEY (`confirmation_id`) REFERENCES `confirmations` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `withdraws_ibfk_1` FOREIGN KEY (`user_wallet_id`) REFERENCES `user_wallets` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
