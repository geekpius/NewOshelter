-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 10, 2021 at 10:21 AM
-- Server version: 10.3.27-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oshelte8_estate`
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
(1, 'Admin Geek', 'fiifipius@gmail.com', '$2y$10$C5fgKPH/HSQ79J4wiybGVOgILhRN2cCpeyMXn5VFCxiw.leAIVZki', 1, NULL, 'admin', '2021-02-09 19:37:09', 'Lwpp18rVGEmfZtyhIIe0uChGaP3LeEoTgOzWKCGjvqBA0N7bKC9UvMvZ71DU', NULL, '2021-02-09 19:37:09');

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
(59, 1, 'Room was changed to public', '2021-02-09 19:37:54', '2021-02-09 19:37:54');

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
(6, 16, 'water bill', '2021-02-09 18:05:51', '2021-02-09 18:05:51'),
(7, 24, 'water bill', '2021-02-09 19:17:41', '2021-02-09 19:17:41'),
(8, 24, 'sanitation fee', '2021-02-09 19:17:41', '2021-02-09 19:17:41'),
(9, 25, 'water bill', '2021-02-10 10:12:54', '2021-02-10 10:12:54'),
(10, 25, 'sanitation fee', '2021-02-10 10:12:54', '2021-02-10 10:12:54');

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
(1, 1, 'house', 'apartment', 'rent', 'A fully furnished room for rent, Cantonment', 1, 0, 1, 9, 1, 1, '2021-02-08 13:11:58', '2021-02-08 13:39:27'),
(2, 1, 'storey_building', 'room', 'rent', 'Single self contained rooms', 1, 0, 1, 9, 1, 1, '2021-02-08 13:40:48', '2021-02-08 15:16:11'),
(3, 1, 'storey_building', 'room', 'short_stay', '2 sweet single self contained rooms', 2, 0, 1, 9, 1, 1, '2021-02-08 15:18:23', '2021-02-08 15:32:55'),
(4, 1, 'house', 'apartment', 'rent', 'Chamber and Hall Apartment', 1, 0, 1, 9, 1, 1, '2021-02-08 15:41:46', '2021-02-08 15:50:29'),
(5, 1, 'house', 'house', 'rent', '3 Bedroom Apartment', 1, 0, 1, 9, 1, 1, '2021-02-08 15:51:26', '2021-02-08 15:58:18'),
(6, 1, 'storey_building', 'apartment', 'rent', '2 Bedroom House', 1, 0, 1, 9, 1, 1, '2021-02-08 15:59:50', '2021-02-08 16:08:11'),
(7, 1, 'storey_building', 'hostel', 'rent', 'Single room self contain', 1, 0, 1, 7, 0, 0, '2021-02-08 16:10:48', '2021-02-09 18:24:59'),
(8, 1, 'storey_building', 'room', 'rent', '2 Bedroom Apartment', 1, 0, 1, 9, 1, 1, '2021-02-08 16:27:20', '2021-02-08 16:33:59'),
(9, 1, 'house', 'house', 'rent', '2 Bedroom House', 1, 0, 1, 9, 1, 1, '2021-02-08 16:36:58', '2021-02-08 16:56:53'),
(10, 1, 'storey_building', 'hostel', 'rent', 'Amanshie Hostel', NULL, NULL, 1, 9, 1, 0, '2021-02-08 17:04:03', '2021-02-09 18:09:11'),
(11, 1, 'storey_building', 'apartment', 'short_stay', 'Chamber and Hall Apartment', 2, 2, 1, 9, 1, 1, '2021-02-08 17:20:01', '2021-02-08 17:29:36'),
(12, 1, 'house', 'house', 'rent', '2 Bedroom House', 1, 0, 1, 9, 1, 1, '2021-02-08 17:35:08', '2021-02-09 18:22:30'),
(13, 1, 'storey_building', 'apartment', 'rent', 'Chamber and Hall Apartment', 1, 0, 1, 9, 1, 1, '2021-02-08 18:01:11', '2021-02-09 16:20:12'),
(14, 1, 'house', 'hostel', 'rent', '3 Bedroom Apartment', 1, 0, 1, 2, 0, 0, '2021-02-08 19:06:44', '2021-02-09 17:59:18'),
(15, 1, 'house', 'apartment', 'rent', '2 Bedroom Furnished Apartment', 1, 0, 1, 9, 1, 1, '2021-02-09 14:26:32', '2021-02-09 14:41:21'),
(16, 1, 'house', 'hostel', 'rent', 'Single Self contained', 1, 0, 1, 9, 1, 0, '2021-02-09 14:42:44', '2021-02-09 18:08:22'),
(17, 1, 'storey_building', 'apartment', 'short_stay', '2 Bedroom Furnished Apartment', 2, 2, 1, 9, 1, 1, '2021-02-09 15:04:11', '2021-02-09 15:14:15'),
(18, 1, 'storey_building', 'house', 'rent', '3 Bedroom Apartment', 1, 0, 1, 9, 1, 1, '2021-02-09 15:16:40', '2021-02-09 18:50:39'),
(19, 1, 'house', 'room', 'rent', 'Single room self contained', 1, 0, 1, 9, 1, 1, '2021-02-09 15:35:10', '2021-02-09 15:49:54'),
(20, 1, 'house', 'room', 'short_stay', 'Single Self contained', 2, 1, 1, 9, 1, 1, '2021-02-09 15:53:40', '2021-02-09 16:14:09'),
(21, 1, 'storey_building', 'house', 'short_stay', '2 Bedroom Furnished Apartment', 2, 2, 1, 9, 1, 1, '2021-02-09 16:33:57', '2021-02-09 16:54:44'),
(23, 1, 'storey_building', 'house', 'rent', '2 Bedroom Furnished Apartment', 1, 0, 1, 1, 1, 1, '2021-02-09 18:26:37', '2021-02-09 19:06:35'),
(24, 1, 'storey_building', 'house', 'rent', '2 Bedroom Furnished Apartment', 1, 0, 1, 9, 1, 1, '2021-02-09 19:06:57', '2021-02-09 19:18:19'),
(25, 1, 'house', 'apartment', 'rent', '2 Bedroom Furnished Apartment', 1, 0, 1, 9, 1, 1, '2021-02-10 09:50:48', '2021-02-10 10:13:16'),
(26, 1, 'house', 'room', 'short_stay', 'Single Self contained', 1, 0, 0, 1, 0, 1, '2021-02-10 10:18:32', '2021-02-10 10:18:32');

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
(107, 25, 'Wardrobe', '2021-02-10 09:52:27', '2021-02-10 09:52:27');

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
(21, 25, '2', 0, 1, 3, 1, 3, 1, 'not_furnished', '2021-02-10 09:51:45', '2021-02-10 09:51:45');

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
(7, 7, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', 'Shell Bus Stop', '2021-02-08 16:20:48', '2021-02-08 16:20:48'),
(8, 8, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', '2021-02-08 16:33:21', '2021-02-08 16:33:21'),
(9, 9, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', 'Trinkets', '2021-02-08 16:55:58', '2021-02-08 16:55:58'),
(10, 10, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', 'Faizer Streets', '2021-02-08 17:14:23', '2021-02-08 17:14:23'),
(11, 11, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', 'Soccer Streets', '2021-02-08 17:27:32', '2021-02-08 17:27:32'),
(12, 12, 0, 'This 2 bedroom house screams \'welcome\' with its calming interior designs. It also provides lifestyle options with a shared swimming pool with other tenants', 'You need a unique place of relaxation. Call for inspection!', 'Deluxe Streets', '2021-02-08 17:46:56', '2021-02-09 18:22:22'),
(13, 13, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', 'Zuliah High Tower, Street 2', '2021-02-08 18:14:12', '2021-02-08 18:14:12'),
(14, 14, 0, 'There is a well lit study room with desks and seats for studying. A closet space and lots of ventilated rooms.\r\n\r\nIt is furnished with beds, with units purposely for laundry. 24 hour security at post, a good flow of water ( with stand by septic tanks) and an alternate power source', 'This property is available within a gated community and a few minutes from many exotic hotels and other recreational options for your relaxation', 'Behind the Trade Fair', '2021-02-08 19:30:56', '2021-02-08 19:30:56'),
(15, 15, 1, 'Beautiful 2 bedroom apartment available for rent. Suitable for small families.\r\n\r\nA spacious kitchen and bathroom are stocked with relevant gadgets for convenience.', 'This property offers you a 24 hour security service and a stand by generator in case of power fluctuation. Warm neighbors to share your peace with.', 'Goil', '2021-02-09 14:39:58', '2021-02-09 14:39:58'),
(16, 16, 0, 'It is hard to find a classy space with elegantly laid designs as this for a hostel. Make the most of your work and study with these furnished rooms with well spaced study rooms, hall and a swimming pool for your relaxation', 'A serene environment with a cleaning management team to make your stay more comfortable', 'Vibtech Ghana', '2021-02-09 14:54:38', '2021-02-09 14:54:38'),
(17, 17, 0, 'Move in now into this 2 bedroom apartment for some quality time. This property is suitable for small families who want spend some excellent time together.', 'It is situated in the hub of Accra with many nearby recreational places to kill time and create more memories.', 'Vibtech Ghana', '2021-02-09 15:12:31', '2021-02-09 15:12:31'),
(18, 18, 0, 'This property has well spaced and ventilated rooms freshened by sweet smelling flowers. \r\n\r\nThe kitchen is appropriately counter spaced with exquisite antique  interior designs in the bathroom, bedroom and hall', 'Nearby malls, restaurants, popular historical sites', 'Hebron Prayer Camp', '2021-02-09 15:25:25', '2021-02-09 15:25:25'),
(19, 19, 0, 'This apartment has a well spaced bedroom with a study desk, neatly tiled floors and', 'Located to enjoy proximity to historical sites, the museum, the shopping malls and other places for relaxation.\r\n\r\nThis is a gated community with 24 hour security and installed Cctv cameras on every household. You can relax!', 'The sense of love and community strong in this neighborhood would give you a homely presence.', '2021-02-09 15:46:34', '2021-02-09 15:49:35'),
(20, 20, 0, 'Find a home to be with us. Our rooms with well proportioned designs in the bathroom, kitchen and bedroom would make your stay more enjoyable.\r\n\r\nOther noticeable things of this property include self massaging beds, our large burglar proof windows for good ventilation that also opens your view to the beautiful scenery of the wonderful community.', 'You would love to be part of the many shared love and neighborliness in the community', 'Vibtech Ghana', '2021-02-09 16:11:52', '2021-02-09 16:11:52'),
(21, 21, 0, 'Home is where your family is. Move into this property with your small family.\r\n\r\nThis property comes with 3 bedrooms, 4 bathrooms and a shared gymnasium for your workouts.\r\n\r\nThere is also a backup power supply for an interrupted supply of power and a huge septic tank for water storage.', 'Enjoy proximity to the shopping malls, schools, restaurants and the natural parks.', 'Vibtech Ghana', '2021-02-09 16:53:32', '2021-02-09 16:53:32'),
(22, 23, 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', '2021-02-09 18:56:38', '2021-02-09 18:56:38'),
(23, 24, 0, 'You will find in this house 2 cozy bedrooms with an adjoining balcony opened to see more of the beautiful community.', 'This is the place you can call home with proximity to schools, restaurants, shopping mall and other recreational places. Be prepared for a blissful stay.', 'Vibtech', '2021-02-09 19:17:27', '2021-02-09 19:17:27'),
(24, 25, 0, 'With well proportioned rooms, white washable walls, impeccable woodwork on the stairs, kitchen and wardrobes. Expansive kitchen to give you more room.', 'This property is located in a commercial community ideal for your business adventure with proximity to conference centers, hotels and resorts.', 'Vibtech Ghana', '2021-02-10 10:12:37', '2021-02-10 10:12:37');

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
(4, 10, 'rosadel', '2021-02-08 17:04:26', '2021-02-08 17:04:26'),
(5, 10, 'leeway', '2021-02-08 17:04:38', '2021-02-08 17:04:38'),
(6, 10, 'thessy', '2021-02-08 17:04:49', '2021-02-08 17:04:49'),
(7, 14, 'dukes', '2021-02-08 19:07:24', '2021-02-08 19:07:24'),
(8, 14, 'leeway', '2021-02-08 19:07:34', '2021-02-08 19:07:34'),
(9, 16, 'rosy', '2021-02-09 14:42:59', '2021-02-09 14:42:59'),
(10, 16, 'phels', '2021-02-09 14:43:10', '2021-02-09 14:43:10'),
(11, 16, 'konan', '2021-02-09 14:43:19', '2021-02-09 14:43:19');

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
(22, 7, 'Pristine swimming pool', '199f7eef56a459c95b90f1a57ed7befbedd8e8737.jpg', '2021-02-08 16:17:38', '2021-02-08 16:18:30'),
(23, 7, 'Clean bathroom', '16a35c7eda2781912bf14392bcf8850742d25e756.jpg', '2021-02-08 16:17:38', '2021-02-08 16:18:45'),
(24, 7, 'Wardrobe', '1f783ef292924bf032d2803a6c7c65690b42b1374.jpg', '2021-02-08 16:17:39', '2021-02-08 16:18:56'),
(25, 7, 'Outside', '1f837e92c38058f7fd1738d56c599145ef70470f1.jpg', '2021-02-08 16:17:39', '2021-02-08 16:19:07'),
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
(36, 10, 'Outside', '1325dae96586e18d5d80b3b34a1ba290490bd27da.jpg', '2021-02-08 17:08:22', '2021-02-08 17:09:52'),
(37, 10, 'Frontview', '1e230987ceec9af69806f6a88255f5a80b0793c1d.jpg', '2021-02-08 17:09:21', '2021-02-08 17:09:58'),
(38, 10, 'Bedroom', '1bb831a258271184ed6a15c71d015b521e92c2993.jpg', '2021-02-08 17:09:22', '2021-02-08 17:10:03'),
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
(55, 14, 'Outside', '116af0f0455973891eef1dfe70b7f8306384884e8.jpg', '2021-02-08 19:15:10', '2021-02-08 19:17:02'),
(56, 14, 'Hall', '173a9224ca7353d4c59ac2ca8df176ab5ef6bde08.jpg', '2021-02-08 19:15:10', '2021-02-08 19:17:04'),
(57, 14, 'Bedroom', '1598f0d6547cdd4f9dfbcdb76f7e4fa7e861a7119.jpg', '2021-02-08 19:15:10', '2021-02-08 19:17:06'),
(58, 14, 'Kitchen', '1c597bbe6e57cceb0fa0cd8fe016e8c7cb0b6cc60.jpg', '2021-02-08 19:16:54', '2021-02-08 19:17:24'),
(59, 15, 'Outside', '1f265a948a9b5e485e2f884b200f991df03f8aee9.jpg', '2021-02-09 14:28:35', '2021-02-09 14:28:50'),
(60, 15, 'Kitchen', '1481239f53487cbc0fc0fbb3db9a9caf50e0c9480.jpg', '2021-02-09 14:28:35', '2021-02-09 14:28:56'),
(61, 15, 'Hall', '158d18d482fc4eb939b4d682d2619243d2a112539.jpg', '2021-02-09 14:28:35', '2021-02-09 14:28:59'),
(62, 15, 'Bedroom', '13433ef6301eb01302ce2ef0487a3c64c642c923e.jpg', '2021-02-09 14:28:35', '2021-02-09 14:29:07'),
(63, 16, 'Bathrooom', '1a1eca7b6b06872515c073ae93b74dd6b07d5b0cf.jpg', '2021-02-09 14:47:01', '2021-02-09 14:48:05'),
(64, 16, 'Outside', '1ba8098cf453c9785f4ebcca4fa6354fed24262f8.jpg', '2021-02-09 14:47:01', '2021-02-09 14:48:10'),
(65, 16, 'View of Swimming pool', '12f28e6741b7e376f278f126df3ed327b3262557a.jpg', '2021-02-09 14:47:02', '2021-02-09 14:48:23'),
(66, 16, 'Shared Hall', '14efce8ebbfb503006dc127f40829be7e1331e087.jpg', '2021-02-09 14:47:02', '2021-02-09 14:48:37'),
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
(109, 25, 'Hall', '15860de1db0c8ce1fd85a9a3336c7165f430dcbb8.jpg', '2021-02-10 09:57:43', '2021-02-10 10:00:11');

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
(7, 7, NULL, 'Akutuase, Ghana', 'akutuase-ghana', '5.2380492', '-1.4507187', '2021-02-08 16:14:35', '2021-02-08 16:14:35'),
(8, 8, NULL, 'East Legon - Trasacco Estate Road, Accra, Ghana', 'east-legon-trasacco-estate-road-accra-ghana', '5.6494177', '-0.1315887', '2021-02-08 16:30:05', '2021-02-08 16:30:05'),
(9, 9, NULL, 'Amasaman, Ghana', 'amasaman-ghana', '5.7062137', '-0.3019281', '2021-02-08 16:39:18', '2021-02-08 16:39:18'),
(10, 10, NULL, 'Tsui Bleoo Road, Accra, Ghana', 'tsui-bleoo-road-accra-ghana', '5.600025', '-0.11354', '2021-02-08 17:07:22', '2021-02-08 17:07:22'),
(11, 11, NULL, 'Accra, Ghana', 'accra-ghana', '5.6037168', '-0.1869644', '2021-02-08 17:23:13', '2021-02-08 17:23:13'),
(12, 12, NULL, 'Oxford Street, Accra, Ghana', 'oxford-street-accra-ghana', '5.5572854', '-0.1824488', '2021-02-08 17:39:05', '2021-02-08 17:39:05'),
(13, 13, NULL, 'Joy Lane, Accra, Ghana', 'joy-lane-accra-ghana', '5.5729204', '-0.140797', '2021-02-08 18:07:21', '2021-02-08 18:07:21'),
(14, 14, NULL, 'Tse Addo High Street, Accra, Ghana', 'tse-addo-high-street-accra-ghana', '5.5863337', '-0.1406689', '2021-02-08 19:10:23', '2021-02-08 19:10:23'),
(15, 15, NULL, 'Tema, Ghana', 'tema-ghana', '5.7348119', '0.0302354', '2021-02-09 14:28:13', '2021-02-09 14:28:13'),
(16, 16, NULL, 'Airport Residential Estates, Kumasi, Ghana', 'airport-residential-estates-kumasi-ghana', '6.7388109', '-1.5862721', '2021-02-09 14:46:40', '2021-02-09 14:46:40'),
(17, 17, NULL, 'James Town, Accra, Ghana', 'james-town-accra-ghana', '5.5341312', '-0.2139151', '2021-02-09 15:05:41', '2021-02-09 15:05:41'),
(18, 18, NULL, 'Medie, Ghana', 'medie-ghana', '5.7588594', '-0.3207299', '2021-02-09 15:18:26', '2021-02-09 15:18:26'),
(19, 19, NULL, 'Madina, Ghana', 'madina-ghana', '5.6731273', '-0.1663851', '2021-02-09 15:36:53', '2021-02-09 15:36:53'),
(20, 20, NULL, 'Prampram, Ghana', 'prampram-ghana', '5.726957589689396', '0.11695014788513092', '2021-02-09 15:59:58', '2021-02-09 15:59:58'),
(21, 21, NULL, 'Adenta - Dodowa Road, Madina, Ghana', 'adenta-dodowa-road-madina-ghana', '5.722678808828571', '-0.1619502851806609', '2021-02-09 16:44:33', '2021-02-09 16:44:33'),
(23, 23, NULL, 'Akutuase, Ghana', 'akutuase-ghana', '5.237312001333237', '-1.4509225478851318', '2021-02-09 18:30:13', '2021-02-09 18:30:13'),
(24, 24, NULL, 'Tsui Bleoo Road, Accra, Ghana', 'tsui-bleoo-road-accra-ghana', '5.600025', '-0.11354', '2021-02-09 19:09:30', '2021-02-09 19:09:30'),
(25, 25, NULL, 'Kumasi, Ghana', 'kumasi-ghana', '6.6666004', '-1.6162709', '2021-02-10 09:56:47', '2021-02-10 09:56:47');

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
(20, 25, 12, NULL, NULL, 'month', 200, NULL, 'GHS', NULL, '2021-02-10 10:12:54', '2021-02-10 10:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `property_reviews`
--

CREATE TABLE `property_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
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
(9, 10, 'No smoking', '2021-02-08 17:06:55', '2021-02-08 17:06:55'),
(10, 10, 'No deadly weapons', '2021-02-08 17:06:55', '2021-02-08 17:06:55'),
(11, 16, 'No smoking', '2021-02-09 14:45:46', '2021-02-09 14:45:46'),
(12, 16, 'No deadly weapons', '2021-02-09 14:45:46', '2021-02-09 14:45:46'),
(13, 16, 'No washing outside laundary', '2021-02-09 14:45:46', '2021-02-09 14:45:46'),
(14, 17, 'No smoking', '2021-02-09 15:05:18', '2021-02-09 15:05:18'),
(15, 20, 'No smoking', '2021-02-09 15:54:59', '2021-02-09 15:54:59'),
(16, 14, 'No smoking', '2021-02-09 17:37:32', '2021-02-09 17:37:32'),
(17, 14, 'No deadly weapons', '2021-02-09 17:37:32', '2021-02-09 17:37:32'),
(18, 18, 'No smoking', '2021-02-09 18:47:33', '2021-02-09 18:47:33'),
(19, 18, 'No deadly weapons', '2021-02-09 18:47:33', '2021-02-09 18:47:33');

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
(11, 7, 'Swimming Pool', '2021-02-08 16:13:47', '2021-02-08 16:13:47'),
(13, 17, 'Laundary', '2021-02-09 15:05:03', '2021-02-09 15:05:03'),
(15, 16, 'Swimming Pool', '2021-02-09 18:04:59', '2021-02-09 18:04:59');

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
(1, 'room', '1334368bc89fc8d780729c1b858f65b1601477e17.jpg', 1, '2021-01-22 16:52:00', '2021-02-09 19:37:54'),
(2, 'apartment', '19fc2df51fc842011e151654715e89e8d847a4b0e.jpg', 1, '2021-01-22 16:53:56', '2021-01-22 16:54:47'),
(3, 'house', '1fb574819d73d193035d3b3ba47e36bafbf86983d.jpg', 1, '2021-01-22 16:54:27', '2021-01-22 16:54:41'),
(4, 'hostel', '122d97a4620987ead27811ce06f89819766a7e346.jpg', 1, '2021-01-22 16:54:37', '2021-01-22 16:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `property_utilities`
--

CREATE TABLE `property_utilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'GHC',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `booking_id` int(11) DEFAULT NULL,
  `extension_id` int(11) DEFAULT NULL,
  `reference_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `service_fee` double NOT NULL,
  `discount_fee` double NOT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_type` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verification_expired_at` datetime DEFAULT NULL,
  `verify_email` tinyint(1) NOT NULL DEFAULT 0,
  `verify_email_time` datetime DEFAULT NULL,
  `sms_verification_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_sms` tinyint(1) NOT NULL DEFAULT 0,
  `verify_sms_time` datetime DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `is_active`, `image`, `email_verification_token`, `email_verification_expired_at`, `verify_email`, `verify_email_time`, `sms_verification_token`, `verify_sms`, `verify_sms_time`, `login_time`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'oshelter', 'osheltercompany@gmail.com', '$2y$10$npe9KXFYtbVbxgibczmV7ewazveQRVDghB/rmrYWxFtS8yDj41H0e', '0559970048', 1, NULL, '23054331', '2021-02-08 14:03:58', 1, '2021-02-08 13:06:45', NULL, 0, NULL, '2021-02-10 09:48:59', 'LQspl1yYz8OObDZAwNtssoHiPGu51oT7a2QLuZzDiiKoBs9sXtoSqRtbC86c', '2021-02-08 13:03:58', '2021-02-10 09:48:59', NULL);

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
(1, 1, 'GHS', '2021-02-08 13:37:18', '2021-02-08 13:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_extension_requests`
--

CREATE TABLE `user_extension_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `visit_id` int(10) NOT NULL,
  `owner_id` int(11) NOT NULL,
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
  `hostel_block_room_id` int(10) UNSIGNED NOT NULL,
  `hostel_block_room_number_id` int(10) UNSIGNED NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `is_in` tinyint(1) NOT NULL DEFAULT 1,
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
(4, 1, '102.176.48.198', 'Windows 10', 'Chrome', 'Accra, Ghana', '2021-02-10 09:48:59', '2021-02-10 09:48:59');

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
(1, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2021-02-08 13:03:58', '2021-02-08 13:03:58');

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
  `id_back` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 1, 1, '2021-02-08 13:56:53', '2021-02-08 13:56:53');

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

-- --------------------------------------------------------

--
-- Table structure for table `user_wallets`
--

CREATE TABLE `user_wallets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `balance` double NOT NULL DEFAULT 0,
  `currency` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_cash_out` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vats`
--

CREATE TABLE `vats` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `property_utilities`
--
ALTER TABLE `property_utilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_utilities_property_id_index` (`property_id`);

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
  ADD KEY `transactions_user_id_index` (`user_id`);

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
-- Indexes for table `vats`
--
ALTER TABLE `vats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vats_user_id_index` (`user_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostel_block_room_numbers`
--
ALTER TABLE `hostel_block_room_numbers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostel_bookings`
--
ALTER TABLE `hostel_bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostel_room_amenities`
--
ALTER TABLE `hostel_room_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `include_utilities`
--
ALTER TABLE `include_utilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `property_amenities`
--
ALTER TABLE `property_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `property_contains`
--
ALTER TABLE `property_contains`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `property_descriptions`
--
ALTER TABLE `property_descriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `property_hostel_blocks`
--
ALTER TABLE `property_hostel_blocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `property_hostel_prices`
--
ALTER TABLE `property_hostel_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_images`
--
ALTER TABLE `property_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `property_locations`
--
ALTER TABLE `property_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `property_own_rules`
--
ALTER TABLE `property_own_rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_prices`
--
ALTER TABLE `property_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `property_reviews`
--
ALTER TABLE `property_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_rules`
--
ALTER TABLE `property_rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `property_shared_amenities`
--
ALTER TABLE `property_shared_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `property_utilities`
--
ALTER TABLE `property_utilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_saved_properties`
--
ALTER TABLE `user_saved_properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `vats`
--
ALTER TABLE `vats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_activities`
--
ALTER TABLE `admin_activities`
  ADD CONSTRAINT `admin_activities_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `deactivate_users`
--
ALTER TABLE `deactivate_users`
  ADD CONSTRAINT `deactivate_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `property_utilities`
--
ALTER TABLE `property_utilities`
  ADD CONSTRAINT `property_utilities_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `vats`
--
ALTER TABLE `vats`
  ADD CONSTRAINT `vats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
