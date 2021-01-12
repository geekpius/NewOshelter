-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 12, 2021 at 02:09 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

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
(1, 'Admin Geek', 'fiifipius@gmail.com', '$2y$10$C5fgKPH/HSQ79J4wiybGVOgILhRN2cCpeyMXn5VFCxiw.leAIVZki', 1, NULL, 'admin', '2020-12-15 17:06:34', 'g32n0D2mwfRwbMaEIY3PqF5V1rRPziV6EFC0ifxjb4YhIdDl0a3Uw7zMlngA', NULL, '2020-12-15 17:06:34');

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
(31, 1, 'House was changed to public', '2020-12-15 08:55:40', '2020-12-15 08:55:40');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 2, 9, 1, '2021-01-05', '2022-01-05', 2, 0, 0, 3, '2020-12-29 16:23:17', '2020-12-29 21:56:07'),
(2, 2, 10, 1, '2021-01-01', '2021-01-15', 2, 0, 0, 3, '2020-12-30 14:36:20', '2020-12-30 15:12:47');

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
-- Table structure for table `helps`
--

CREATE TABLE `helps` (
  `id` int(10) UNSIGNED NOT NULL,
  `help_type_id` int(10) UNSIGNED NOT NULL,
  `document_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `help_types`
--

CREATE TABLE `help_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `help_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(3, 4, 'single_room', 'male', 15, 1, 2, 2, 'partially_furnished', 1, 1, 1, 1, 1, '2020-12-22 09:38:40', '2020-12-22 09:38:40'),
(4, 5, 'chamber_and_hall', 'male', 10, 1, 2, 2, 'partially_furnished', 1, 1, 1, 1, 1, '2020-12-22 09:39:53', '2020-12-22 09:39:53'),
(5, 6, 'single_room', 'female', 25, 1, 2, 2, 'partially_furnished', 1, 1, 1, 1, 1, '2020-12-22 09:45:52', '2020-12-22 09:45:52');

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
(26, 3, 1, 2, 1, 0, '2020-12-22 09:38:40', '2020-12-22 09:38:40'),
(27, 3, 2, 2, 0, 0, '2020-12-22 09:38:40', '2020-12-22 09:38:40'),
(28, 3, 3, 2, 0, 0, '2020-12-22 09:38:40', '2020-12-22 09:38:40'),
(29, 3, 4, 2, 0, 0, '2020-12-22 09:38:40', '2020-12-22 09:38:40'),
(30, 3, 5, 2, 0, 0, '2020-12-22 09:38:40', '2020-12-22 09:38:40'),
(31, 3, 6, 2, 0, 0, '2020-12-22 09:38:40', '2020-12-22 09:38:40'),
(32, 3, 7, 2, 0, 0, '2020-12-22 09:38:40', '2020-12-22 09:38:40'),
(33, 3, 8, 2, 0, 0, '2020-12-22 09:38:40', '2020-12-22 09:38:40'),
(34, 3, 9, 2, 0, 0, '2020-12-22 09:38:40', '2020-12-22 09:38:40'),
(35, 3, 10, 2, 0, 0, '2020-12-22 09:38:40', '2020-12-22 09:38:40'),
(36, 3, 11, 2, 0, 0, '2020-12-22 09:38:40', '2020-12-22 09:38:40'),
(37, 3, 12, 2, 0, 0, '2020-12-22 09:38:40', '2020-12-22 09:38:40'),
(38, 3, 13, 2, 0, 0, '2020-12-22 09:38:40', '2020-12-22 09:38:40'),
(39, 3, 14, 2, 0, 0, '2020-12-22 09:38:40', '2020-12-22 09:38:40'),
(40, 3, 15, 2, 0, 0, '2020-12-22 09:38:40', '2020-12-22 09:38:40'),
(41, 4, 1, 2, 0, 0, '2020-12-22 09:39:53', '2020-12-22 09:39:53'),
(42, 4, 2, 2, 0, 0, '2020-12-22 09:39:53', '2020-12-22 09:39:53'),
(43, 4, 3, 2, 0, 0, '2020-12-22 09:39:53', '2020-12-22 09:39:53'),
(44, 4, 4, 2, 0, 0, '2020-12-22 09:39:53', '2020-12-22 09:39:53'),
(45, 4, 5, 2, 0, 0, '2020-12-22 09:39:53', '2020-12-22 09:39:53'),
(46, 4, 6, 2, 0, 0, '2020-12-22 09:39:53', '2020-12-22 09:39:53'),
(47, 4, 7, 2, 0, 0, '2020-12-22 09:39:53', '2020-12-22 09:39:53'),
(48, 4, 8, 2, 0, 0, '2020-12-22 09:39:53', '2020-12-22 09:39:53'),
(49, 4, 9, 2, 0, 0, '2020-12-22 09:39:53', '2020-12-22 09:39:53'),
(50, 4, 10, 2, 0, 0, '2020-12-22 09:39:53', '2020-12-22 09:39:53'),
(51, 5, 1, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(52, 5, 2, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(53, 5, 3, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(54, 5, 4, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(55, 5, 5, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(56, 5, 6, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(57, 5, 7, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(58, 5, 8, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(59, 5, 9, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(60, 5, 10, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(61, 5, 11, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(62, 5, 12, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(63, 5, 13, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(64, 5, 14, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(65, 5, 15, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(66, 5, 16, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(67, 5, 17, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(68, 5, 18, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(69, 5, 19, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(70, 5, 20, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(71, 5, 21, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(72, 5, 22, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(73, 5, 23, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(74, 5, 24, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52'),
(75, 5, 25, 2, 0, 0, '2020-12-22 09:45:52', '2020-12-22 09:45:52');

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
(1, 2, 11, 1, 26, 1, '2021-01-09', '2021-09-09', 3, '2021-01-01 23:28:28', '2021-01-02 08:36:18');

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
(6, 3, 'Bed', '2020-12-22 10:59:22', '2020-12-22 10:59:22'),
(7, 3, 'Smoke Detector', '2020-12-22 10:59:22', '2020-12-22 10:59:22'),
(8, 3, 'Ceiling Fan', '2020-12-22 10:59:22', '2020-12-22 10:59:22'),
(9, 3, 'Wardrobe', '2020-12-22 10:59:22', '2020-12-22 10:59:22'),
(10, 4, 'Bed', '2020-12-22 10:59:52', '2020-12-22 10:59:52'),
(11, 4, 'Smoke Detector', '2020-12-22 10:59:52', '2020-12-22 10:59:52'),
(12, 4, 'Ceiling Fan', '2020-12-22 10:59:52', '2020-12-22 10:59:52'),
(13, 4, 'Wardrobe', '2020-12-22 10:59:52', '2020-12-22 10:59:52'),
(14, 5, 'Bed', '2020-12-22 11:00:59', '2020-12-22 11:00:59'),
(15, 5, 'Smoke Detector', '2020-12-22 11:00:59', '2020-12-22 11:00:59'),
(16, 5, 'Ceiling Fan', '2020-12-22 11:00:59', '2020-12-22 11:00:59'),
(18, 5, 'Wardrobe', '2020-12-22 11:01:00', '2020-12-22 11:01:00');

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
(12, 9, 'water bill', '2020-12-21 15:01:35', '2020-12-21 15:01:35'),
(13, 9, 'sanitation fee', '2020-12-21 15:01:35', '2020-12-21 15:01:35');

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
(4, 2, 1, 'Hi, I would like to book your room.', 0, '2020-12-23 12:15:19', '2020-12-23 17:08:01'),
(5, 2, 1, 'Hi please hit me back.', 0, '2020-12-23 13:01:20', '2020-12-23 16:07:10'),
(6, 1, 2, 'Pass through the booking process.', 1, '2020-12-23 17:18:41', '2020-12-29 21:16:37');

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
(48, '2020_10_13_180722_create_report_properties_table', 7);

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
('kofikumi64@gmail.com', '$2y$10$if3KQBYAiecxnhXsHwgFC.Pel.nAC5TOEFjFEcSZKQPA8BK8EL45u', '2020-12-15 16:02:31'),
('fiifipius@gmail.com', '$2y$10$vaK8klzPibtsMrjTnWf7qOjV8O8XK93Yd1bDz1/GdxYrTWzUI.3Ju', '2021-01-07 16:10:41'),
('theresa@gmail.com', '$2y$10$8jjN0hN9L8PUtqUAcqeQ4OII9bq7t7Ekkb6AK5dC0bo7QvVVRpBNK', '2021-01-07 16:12:07');

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
(9, 1, 'house', 'apartment', 'rent', '2 Bedroom Apartment', 1, 0, 1, 9, 1, 1, '2020-12-21 11:40:12', '2021-01-06 15:59:13'),
(10, 1, 'house', 'house', 'short_stay', '2 Bedroom House', 2, 3, 1, 9, 1, 1, '2020-12-22 08:33:07', '2021-01-05 17:21:23'),
(11, 1, 'storey_building', 'hostel', 'rent', 'Amanshie Hostel', 1, 0, 1, 9, 1, 1, '2020-12-22 09:22:49', '2021-01-06 16:05:50'),
(12, 1, 'house', 'room', 'short_stay', 'Single room self contain', 2, 2, 1, 9, 1, 1, '2021-01-04 13:38:29', '2021-01-05 17:21:43');

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
(29, 9, 'Fire Extinguisher', '2020-12-21 13:39:06', '2020-12-21 13:39:06'),
(30, 9, 'Ceiling Fan', '2020-12-21 13:39:06', '2020-12-21 13:39:06'),
(31, 9, 'Wardrobe', '2020-12-21 13:39:06', '2020-12-21 13:39:06'),
(32, 10, 'Bed', '2020-12-22 09:10:42', '2020-12-22 09:10:42'),
(33, 10, 'TV', '2020-12-22 09:10:42', '2020-12-22 09:10:42'),
(34, 10, 'Fridge', '2020-12-22 09:10:42', '2020-12-22 09:10:42'),
(35, 10, 'Towel,Soap', '2020-12-22 09:10:42', '2020-12-22 09:10:42'),
(36, 10, 'Smoke Detector', '2020-12-22 09:10:42', '2020-12-22 09:10:42'),
(37, 10, 'Air Conditioning', '2020-12-22 09:10:42', '2020-12-22 09:10:42'),
(38, 10, 'Ceiling Fan', '2020-12-22 09:10:43', '2020-12-22 09:10:43'),
(39, 10, 'Wardrobe', '2020-12-22 09:10:43', '2020-12-22 09:10:43'),
(40, 12, 'Bed', '2021-01-04 13:40:28', '2021-01-04 13:40:28'),
(41, 12, 'TV', '2021-01-04 13:40:28', '2021-01-04 13:40:28'),
(42, 12, 'Fridge', '2021-01-04 13:40:28', '2021-01-04 13:40:28'),
(43, 12, 'Fiber Broadband Modem', '2021-01-04 13:40:28', '2021-01-04 13:40:28'),
(44, 12, 'Towel,Soap', '2021-01-04 13:40:28', '2021-01-04 13:40:28'),
(45, 12, 'Smoke Detector', '2021-01-04 13:40:28', '2021-01-04 13:40:28'),
(46, 12, 'Air Conditioning', '2021-01-04 13:40:28', '2021-01-04 13:40:28'),
(47, 12, 'Ceiling Fan', '2021-01-04 13:40:28', '2021-01-04 13:40:28'),
(48, 12, 'Wardrobe', '2021-01-04 13:40:28', '2021-01-04 13:40:28');

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
(7, 9, '2', 0, 1, 2, 1, 2, 1, 'not_furnished', '2020-12-21 13:07:04', '2020-12-21 13:07:04'),
(8, 10, '2', 1, 1, 2, 1, 2, 1, 'fully_furnished', '2020-12-22 09:09:52', '2020-12-22 09:09:52'),
(9, 12, '1', 1, 1, 1, 1, 1, 1, 'fully_furnished', '2021-01-04 13:39:52', '2021-01-04 13:39:52');

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
(8, 9, 0, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem beatae debitis molestiae deserunt fuga unde voluptate totam? Libero, aliquid nostrum. Ad necessitatibus eaque deserunt similique culpa vel consequuntur veritatis maiores! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem beatae debitis molestiae deserunt fuga unde voluptate totam? Libero, aliquid nostrum. Ad necessitatibus eaque deserunt similique culpa vel consequuntur veritatis maiores! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem beatae debitis molestiae deserunt fuga unde voluptate totam? Libero, aliquid nostrum. Ad necessitatibus eaque deserunt similique culpa vel consequuntur veritatis maiores!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem beatae debitis molestiae deserunt fuga unde voluptate totam? Libero, aliquid nostrum. Ad necessitatibus eaque deserunt similique culpa vel consequuntur veritatis maiores!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem beatae debitis molestiae deserunt fuga unde voluptate totam? Libero, aliquid nostrum. Ad necessitatibus eaque deserunt similique culpa vel consequuntur veritatis maiores!', '2020-12-21 14:51:45', '2020-12-21 14:51:45'),
(9, 10, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, vero culpa? Officiis quos recusandae quam magni tenetur, molestias fuga facilis? Autem sed quae magnam dolorem officiis tenetur quos quo labore.Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, vero culpa? Officiis quos recusandae quam magni tenetur, molestias fuga facilis? Autem sed quae magnam dolorem officiis tenetur quos quo labore.Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, vero culpa? Officiis quos recusandae quam magni tenetur, molestias fuga facilis? Autem sed quae magnam dolorem officiis tenetur quos quo labore.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, vero culpa? Officiis quos recusandae quam magni tenetur, molestias fuga facilis? Autem sed quae magnam dolorem officiis tenetur quos quo labore.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, vero culpa? Officiis quos recusandae quam magni tenetur, molestias fuga facilis? Autem sed quae magnam dolorem officiis tenetur quos quo labore.', '2020-12-22 09:16:36', '2020-12-22 09:16:36'),
(10, 11, 0, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem, saepe laboriosam? Voluptatem provident ratione in, rerum dignissimos obcaecati autem quis. Nobis molestias deserunt iusto animi doloribus incidunt modi quod officia!Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem, saepe laboriosam? Voluptatem provident ratione in, rerum dignissimos obcaecati autem quis. Nobis molestias deserunt iusto animi doloribus incidunt modi quod officia!Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem, saepe laboriosam? Voluptatem provident ratione in, rerum dignissimos obcaecati autem quis. Nobis molestias deserunt iusto animi doloribus incidunt modi quod officia!', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem, saepe laboriosam? Voluptatem provident ratione in, rerum dignissimos obcaecati autem quis. Nobis molestias deserunt iusto animi doloribus incidunt modi quod officia!', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem, saepe laboriosam? Voluptatem provident ratione in, rerum dignissimos obcaecati autem quis. Nobis molestias deserunt iusto animi doloribus incidunt modi quod officia!', '2020-12-22 11:54:51', '2020-12-22 11:54:51'),
(11, 12, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio ut at porro fugit quod odit facilis quia minima debitis doloremque saepe distinctio consectetur, earum fugiat iusto dignissimos magnam blanditiis cupiditate?Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio ut at porro fugit quod odit facilis quia minima debitis doloremque saepe distinctio consectetur, earum fugiat iusto dignissimos magnam blanditiis cupiditate?Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio ut at porro fugit quod odit facilis quia minima debitis doloremque saepe distinctio consectetur, earum fugiat iusto dignissimos magnam blanditiis cupiditate?Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio ut at porro fugit quod odit facilis quia minima debitis doloremque saepe distinctio consectetur, earum fugiat iusto dignissimos magnam blanditiis cupiditate?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio ut at porro fugit quod odit facilis quia minima debitis doloremque saepe distinctio consectetur, earum fugiat iusto dignissimos magnam blanditiis cupiditate?Lorem ipsum dolor sit amet cons', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio ut at porro fugit quod odit facilis quia minima debitis doloremque saepe distinctio consectetur, earum fugiat iusto dignissimos magnam blanditiis cupiditate?', '2021-01-04 14:36:47', '2021-01-04 14:36:47');

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
(4, 11, 'kofi annan', '2020-12-22 09:24:59', '2020-12-22 09:24:59'),
(5, 11, 'osei tutu', '2020-12-22 09:26:07', '2020-12-22 09:26:07'),
(6, 11, 'yaa asantewaa', '2020-12-22 09:26:22', '2020-12-22 09:26:22');

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
(3, 3, 8, 'month', 300, 'GHC', '2020-12-22 12:15:42', '2020-12-22 12:15:42'),
(4, 4, 8, 'month', 400, 'GHC', '2020-12-22 12:16:16', '2020-12-22 12:16:16'),
(5, 5, 8, 'month', 300, 'GHC', '2020-12-22 12:20:25', '2020-12-22 12:20:25');

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
(33, 9, 'Bedroom', '18b96349e5a11a13ef0da8958239203f2de9ac47d.jpg', '2020-12-21 14:29:55', '2020-12-21 14:32:14'),
(34, 9, 'Kitchen', '1ca8af489c8709cedb011a816c3fd04998733d0e5.jpg', '2020-12-21 14:29:55', '2020-12-21 14:32:24'),
(35, 9, 'Frontview', '18104cb4cca2670081d6679c53703bf7cddbec1c5.jpg', '2020-12-21 14:29:55', '2020-12-21 14:35:08'),
(36, 9, 'Frontview', '11ac993f61170670ab488146cad29efc498ca5712.jpg', '2020-12-21 14:29:55', '2020-12-21 14:38:27'),
(37, 9, 'Dining hall', '11447ebf832acf6ffe6feb4bffef4947819a4de08.jpg', '2020-12-21 14:29:55', '2020-12-21 14:38:33'),
(38, 9, 'Bedroom', '1cf71dfb0ab4da2c3acfdafa564705dd28b12fb74.jpg', '2020-12-21 14:29:55', '2020-12-21 14:38:37'),
(41, 10, 'Frontview', '115f613f015956d750f56ed4a3ae0a17adb1c54ad.jpg', '2020-12-22 09:14:58', '2020-12-22 09:15:14'),
(42, 10, 'Frontview', '18ed3fc8cf5080b9c316fe706c788c2562701679a.jpg', '2020-12-22 09:14:58', '2020-12-22 09:15:16'),
(43, 10, 'Outside', '10481c553097c44b53fd21b842f9b380b227b4144.jpg', '2020-12-22 09:14:58', '2020-12-22 09:15:20'),
(44, 10, 'Frontview', '1b94e7cbc1650ce65e539fc1efff3a7590ab799fe.jpg', '2020-12-22 09:14:58', '2020-12-22 09:15:24'),
(46, 10, 'Hall', '14bb812ac7414766309bc235e6ba332d00dd8b013.jpg', '2020-12-22 09:14:59', '2020-12-22 09:15:48'),
(47, 10, 'onhill', '181d395f6df14d36958b23e0e32cd89598ae48130.jpg', '2020-12-22 09:14:59', '2020-12-22 09:15:39'),
(50, 11, 'Hall Way', '192f106363c1f77779d4082c8ca394f511465c97e.jpg', '2020-12-22 11:50:57', '2020-12-22 11:51:24'),
(51, 11, 'Bedroom', '18de9b33db550815001ff56dc334c428e68227370.jpg', '2020-12-22 11:50:57', '2020-12-22 11:51:28'),
(52, 11, 'Kitchen', '12b21d8c95985db88feac3c1a2ef01bd5f3d1013d.jpg', '2020-12-22 11:50:57', '2020-12-22 11:51:35'),
(53, 11, 'Sideview', '1114328a936a96c18ae9f3a2bae477c6ea951062e.jpg', '2020-12-22 11:50:57', '2020-12-22 11:51:41'),
(54, 11, 'Frontview', '1586219959a25334cc03e47486cb62fe533d0d251.jpg', '2020-12-22 11:50:57', '2020-12-22 11:51:47'),
(55, 11, 'Bedroom', '176046acd9a77c69dc9226ea82f49ac7c2d6454c1.jpg', '2020-12-22 11:50:57', '2020-12-22 11:51:52'),
(56, 12, 'Dining', '1ab9ab2d8f136a414434364692d2a5fc3d78e74e3.jpg', '2021-01-04 14:33:34', '2021-01-04 14:35:36'),
(57, 12, 'Bedroom', '1c5db5d8a2a570d878ed759a1b87bb0094f95fce5.jpg', '2021-01-04 14:35:30', '2021-01-04 14:35:41'),
(58, 12, 'Kitchen', '18803ce11236def5b000c47f56106b6f66bda4654.jpg', '2021-01-04 14:35:30', '2021-01-04 14:35:44'),
(59, 12, 'Bathroom', '154579fa47b9a1e4bd99b8e1871dd905ed0060751.jpg', '2021-01-04 14:35:30', '2021-01-04 14:35:49'),
(60, 12, 'Toilet', '1a1d5c8197653a006cfaadaa98c1b494fbc37995c.jpg', '2021-01-04 14:35:30', '2021-01-04 14:35:52'),
(61, 12, 'Frontview', '10306074c2bee8ed318d5b41508e5920c6d6c4a66.jpg', '2021-01-04 14:35:30', '2021-01-04 14:35:54'),
(62, 12, 'FrontView', '128b7a40e78d80118cfc1c042c5e5d6c94bbee4c1.jpg', '2021-01-04 14:35:30', '2021-01-04 14:35:58'),
(63, 12, 'Sitting room', '1e8fab003e361bb77a52a6bb90022088bf7bf9d3b.jpg', '2021-01-04 14:35:30', '2021-01-04 14:36:10');

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
(9, 9, NULL, 'Madina, Accra Metropolis, Ghana', 'madina-accra-metropolis-ghana', '5.6731273', '-0.1663851', '2020-12-21 14:23:55', '2020-12-24 10:30:57'),
(10, 10, NULL, 'Koforidua, Ghana', 'koforidua-ghana', '6.0784427', '-0.2713944', '2020-12-22 09:12:56', '2021-01-04 17:09:10'),
(11, 11, NULL, 'Asuoyeboa, Kumasi, Ghana', 'asuoyeboa-kumasi-ghana', '6.695769299999999', '-1.6639235', '2020-12-22 12:43:13', '2021-01-04 17:10:22'),
(12, 12, NULL, 'Madina Estate, Madina, Ghana', 'madina-estate-madina-ghana', '5.666151700000011', '-0.1582766000000002', '2021-01-04 14:32:32', '2021-01-04 14:32:32');

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
(4, 9, 'Don\'t drink in front of children in apartment', '2020-12-21 14:43:10', '2020-12-21 14:43:10'),
(5, 11, 'Don\'t drop rubbish around the hostel', '2020-12-22 11:35:32', '2020-12-22 11:35:32');

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
(7, 9, 6, NULL, NULL, 'month', 700, NULL, 'GHC', NULL, '2020-12-21 15:01:35', '2020-12-21 15:01:35'),
(8, 10, NULL, 3, 30, 'night', 100, 80, 'GHC', NULL, '2020-12-22 09:17:47', '2020-12-30 12:14:58'),
(9, 12, NULL, 5, 60, 'night', 120, 100, 'GHC', NULL, '2021-01-04 14:37:25', '2021-01-04 14:37:25');

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
(26, 9, 'No smoking', '2020-12-21 13:55:16', '2020-12-21 13:55:16'),
(27, 9, 'No deadly weapons', '2020-12-21 13:55:16', '2020-12-21 13:55:16'),
(28, 10, 'No smoking', '2020-12-22 09:10:58', '2020-12-22 09:10:58'),
(29, 10, 'No deadly weapons', '2020-12-22 09:10:58', '2020-12-22 09:10:58'),
(30, 10, 'Dont urinate in pool', '2020-12-22 09:10:58', '2020-12-22 09:10:58'),
(31, 11, 'No smoking', '2020-12-22 11:39:08', '2020-12-22 11:39:08'),
(32, 11, 'No deadly weapons', '2020-12-22 11:39:08', '2020-12-22 11:39:08'),
(33, 11, 'Dont host visitors more than 2 weeks', '2020-12-22 11:39:09', '2020-12-22 11:39:09'),
(34, 12, 'No smoking', '2021-01-04 13:40:43', '2021-01-04 13:40:43'),
(35, 12, 'No deadly weapons', '2021-01-04 13:40:43', '2021-01-04 13:40:43'),
(36, 12, 'Dont host visitors more than 2 weeks', '2021-01-04 13:40:43', '2021-01-04 13:40:43');

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
(20, 9, 'Garden', '2020-12-21 13:39:07', '2020-12-21 13:39:07'),
(21, 9, 'Basketball Court', '2020-12-21 13:39:07', '2020-12-21 13:39:07'),
(22, 9, 'Car Park', '2020-12-21 13:39:07', '2020-12-21 13:39:07'),
(23, 9, 'Fire Extinguisher', '2020-12-21 13:39:07', '2020-12-21 13:39:07'),
(24, 10, 'Swimming Pool', '2020-12-22 09:10:43', '2020-12-22 09:10:43'),
(25, 10, 'Emergency Bell', '2020-12-22 09:10:43', '2020-12-22 09:10:43'),
(26, 10, 'Garden', '2020-12-22 09:10:43', '2020-12-22 09:10:43'),
(27, 10, 'Car Park', '2020-12-22 09:10:43', '2020-12-22 09:10:43'),
(28, 10, 'Fire Extinguisher', '2020-12-22 09:10:43', '2020-12-22 09:10:43'),
(35, 12, 'Emergency Bell', '2021-01-04 13:40:28', '2021-01-04 13:40:28'),
(36, 12, 'Car Park', '2021-01-04 13:40:28', '2021-01-04 13:40:28'),
(37, 12, 'Fire Extinguisher', '2021-01-04 13:40:28', '2021-01-04 13:40:28'),
(41, 11, 'Emergency Bell', '2021-01-06 16:05:31', '2021-01-06 16:05:31'),
(42, 11, 'Basketball Court', '2021-01-06 16:05:31', '2021-01-06 16:05:31'),
(43, 11, 'Car Park', '2021-01-06 16:05:32', '2021-01-06 16:05:32');

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
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `help_desk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
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
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `service_fee` double NOT NULL,
  `discount_fee` double NOT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_type` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `booking_id`, `extension_id`, `transaction_id`, `payment_id`, `amount`, `service_fee`, `discount_fee`, `currency`, `operator`, `phone`, `type`, `property_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, 'XzvRQ9C1iuXkJ0UU', '1642842790', 8400, 0, 0, 'GHC', 'VODAFONE_CASH_PROMPT', '233507791393', 'mobile', 'apartment', 0, '2021-01-05 15:52:16', '2021-01-05 15:52:16'),
(2, 2, 2, NULL, 'e9ApbMm3zfnuNpuZ', '0042942113', 1400, 0, 0, 'GHC', 'VODAFONE_CASH_PROMPT', '233507791393', 'mobile', 'house', 0, '2021-01-05 15:59:56', '2021-01-05 15:59:56'),
(3, 2, 1, NULL, '5jtsz8H3wu0uw5Zi', '8932189975', 2400, 0, 0, 'GHC', 'VODAFONE_CASH_PROMPT', '233507791393', 'mobile', 'hostel', 0, '2021-01-05 16:30:36', '2021-01-05 16:30:36'),
(4, 2, NULL, 1, 'mffbLLTp2fOEZPwn', '8058940743', 500, 0, 0, 'GHC', 'VODAFONE_CASH_PROMPT', '233507791393', 'mobile', 'extension_request', 0, '2021-01-05 16:46:17', '2021-01-05 16:46:17'),
(5, 2, NULL, 3, 'ci6EptzEmHBW4Iui', '5322936263', 2400, 0, 0, 'GHC', 'VODAFONE_CASH_PROMPT', '233507791393', 'mobile', 'extension_request', 0, '2021-01-08 15:28:24', '2021-01-08 15:28:24');

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
(1, 'fiifi pius jnr', 'fiifipius@gmail.com', '$2y$10$SdP7yCkjKapWQUHbVNYXs.bxBlL67pEDRvfoG1QIAoWK8ESuDYgA6', '0542398442', 1, '10ff36ac46e6be792da3dec441f52c02d470bf80a.jpeg', '68684398', '0000-00-00 00:00:00', 1, '2020-12-15 15:41:14', NULL, 0, NULL, '2021-01-06 08:45:55', 'PeGizINLDiyqrnBzRVc8u3VoGWwpTSFh1rFvUYqO2DOuJeAH2bEIETLk3llJ', '2020-12-15 14:41:14', '2021-01-06 08:45:55', NULL),
(2, 'theresa ohenewaa', 'theresa@gmail.com', '$2y$10$LFmhuKxbcNVERXyx684yguPjYciIpO/ggWy.RO2kr36jwQ4MGXcgy', '0542398441', 1, '238a6d87fda9e7e6599f3cc296c835aecce895591.jpg', '53061952', '2021-01-07 17:15:59', 1, '2021-01-07 16:17:02', '2727', 1, '2020-12-29 15:42:24', '2021-01-07 16:15:32', 'mzlTDxxhMpGilZHwV1nUPNR6bpaitxBj9yqyx79v3xHjnFII1VJLmjz9v61H', '2020-12-23 11:50:57', '2021-01-07 16:17:02', NULL);

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
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_extension_requests`
--

INSERT INTO `user_extension_requests` (`id`, `user_id`, `visit_id`, `owner_id`, `extension_date`, `is_confirm`, `type`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, '2021-01-20', 2, 'house', '2021-01-08 14:19:21', '2021-01-08 14:23:01'),
(3, 2, 1, 1, '2022-05-10', 2, 'hostel', '2021-01-08 14:24:20', '2021-01-08 15:01:38');

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
(1, 2, 11, 3, 26, '2021-01-07', '2021-09-09', 1, '2021-01-02 09:46:09', '2021-01-02 09:46:09');

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
(1, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2020-12-28 21:46:51', '2020-12-28 21:46:51'),
(2, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2020-12-28 21:52:07', '2020-12-28 21:52:07'),
(3, 1, '127.0.0.1', 'Linux', 'Chrome', ', ', '2020-12-28 21:53:30', '2020-12-28 21:53:30'),
(4, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2020-12-28 21:54:16', '2020-12-28 21:54:16'),
(5, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-01-07 14:23:17', '2021-01-07 14:23:17'),
(6, 2, '127.0.0.1', 'Linux', 'Chrome', ', ', '2021-01-07 16:15:39', '2021-01-07 16:15:39');

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
(1, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2020-12-15 14:41:14', '2020-12-19 18:42:32'),
(2, 2, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2020-12-23 11:50:57', '2021-01-05 17:12:27');

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

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `gender`, `dob`, `marital_status`, `city`, `country`, `occupation`, `emergency`, `id_front`, `id_back`, `created_at`, `updated_at`) VALUES
(1, 1, 'male', '1974-11-19', 'single', 'Accra', NULL, 'Software Developer', '0542398441', NULL, NULL, '2020-12-19 17:01:14', '2020-12-19 17:01:14'),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2a1d84ae3352fac1cc04abb8405f668f5430044ad.png', '2f524956032b66f0c1aeefbc4d19660eb41d04d31.png', '2020-12-28 23:57:32', '2020-12-28 23:57:40');

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
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_visits`
--

INSERT INTO `user_visits` (`id`, `user_id`, `property_id`, `check_in`, `check_out`, `adult`, `children`, `infant`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 9, '2021-01-05', '2022-01-05', 2, 0, 0, 1, '2021-01-02 09:44:17', '2021-01-02 09:44:17'),
(2, 2, 10, '2021-01-01', '2021-01-15', 2, 0, 0, 1, '2021-01-02 09:45:04', '2021-01-02 09:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_wallets`
--

CREATE TABLE `user_wallets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `balance` double NOT NULL DEFAULT 0,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'GHC',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_wallet_transactions`
--

CREATE TABLE `user_wallet_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_wallet_id` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `status` tinyint(1) NOT NULL,
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
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deactivate_users`
--
ALTER TABLE `deactivate_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deactivate_users_user_id_index` (`user_id`);

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
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_index` (`user_id`);

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
-- Indexes for table `user_wallet_transactions`
--
ALTER TABLE `user_wallet_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_wallet_transactions_user_wallet_id_index` (`user_wallet_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deactivate_users`
--
ALTER TABLE `deactivate_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostel_block_rooms`
--
ALTER TABLE `hostel_block_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hostel_block_room_numbers`
--
ALTER TABLE `hostel_block_room_numbers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `hostel_bookings`
--
ALTER TABLE `hostel_bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hostel_room_amenities`
--
ALTER TABLE `hostel_room_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `include_utilities`
--
ALTER TABLE `include_utilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `property_amenities`
--
ALTER TABLE `property_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `property_contains`
--
ALTER TABLE `property_contains`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `property_descriptions`
--
ALTER TABLE `property_descriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `property_hostel_blocks`
--
ALTER TABLE `property_hostel_blocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `property_hostel_prices`
--
ALTER TABLE `property_hostel_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `property_images`
--
ALTER TABLE `property_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `property_locations`
--
ALTER TABLE `property_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `property_own_rules`
--
ALTER TABLE `property_own_rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `property_prices`
--
ALTER TABLE `property_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `property_reviews`
--
ALTER TABLE `property_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_rules`
--
ALTER TABLE `property_rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `property_shared_amenities`
--
ALTER TABLE `property_shared_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_extension_requests`
--
ALTER TABLE `user_extension_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_hostel_visits`
--
ALTER TABLE `user_hostel_visits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_saved_properties`
--
ALTER TABLE `user_saved_properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_visits`
--
ALTER TABLE `user_visits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_wallets`
--
ALTER TABLE `user_wallets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_wallet_transactions`
--
ALTER TABLE `user_wallet_transactions`
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
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `user_wallet_transactions`
--
ALTER TABLE `user_wallet_transactions`
  ADD CONSTRAINT `user_wallet_transactions_user_wallet_id_foreign` FOREIGN KEY (`user_wallet_id`) REFERENCES `user_wallets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vats`
--
ALTER TABLE `vats`
  ADD CONSTRAINT `vats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
