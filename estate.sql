-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 22, 2020 at 09:28 AM
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
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `infant` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `property_id`, `owner_id`, `check_in`, `check_out`, `adult`, `children`, `infant`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 5, 3, '2020-12-17', '2024-03-15', 2, 1, 1, 1, '2020-12-15 15:36:52', '2020-12-15 15:36:52'),
(2, 3, 4, 5, '2020-12-16', '2022-12-24', 1, 0, 0, 1, '2020-12-15 15:38:45', '2020-12-15 15:38:45'),
(3, 3, 7, 7, '2020-12-16', '2023-11-23', 1, 0, 0, 1, '2020-12-15 16:40:58', '2020-12-15 16:40:58');

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

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('kofikumi64@gmail.com', '$2y$10$if3KQBYAiecxnhXsHwgFC.Pel.nAC5TOEFjFEcSZKQPA8BK8EL45u', '2020-12-15 16:02:31');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_id`, `base`, `type`, `type_status`, `title`, `adult`, `children`, `publish`, `step`, `done_step`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 1, 'house', 'apartment', 'rent', '2 Bedroom Apartment', 1, 0, 1, 8, 1, 1, '2020-12-21 11:40:12', '2020-12-21 15:57:51', NULL);

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
(31, 9, 'Wardrobe', '2020-12-21 13:39:06', '2020-12-21 13:39:06');

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
(7, 9, '2', 0, 1, 2, 1, 2, 1, 'not_furnished', '2020-12-21 13:07:04', '2020-12-21 13:07:04');

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
(8, 9, 0, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem beatae debitis molestiae deserunt fuga unde voluptate totam? Libero, aliquid nostrum. Ad necessitatibus eaque deserunt similique culpa vel consequuntur veritatis maiores! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem beatae debitis molestiae deserunt fuga unde voluptate totam? Libero, aliquid nostrum. Ad necessitatibus eaque deserunt similique culpa vel consequuntur veritatis maiores! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem beatae debitis molestiae deserunt fuga unde voluptate totam? Libero, aliquid nostrum. Ad necessitatibus eaque deserunt similique culpa vel consequuntur veritatis maiores!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem beatae debitis molestiae deserunt fuga unde voluptate totam? Libero, aliquid nostrum. Ad necessitatibus eaque deserunt similique culpa vel consequuntur veritatis maiores!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem beatae debitis molestiae deserunt fuga unde voluptate totam? Libero, aliquid nostrum. Ad necessitatibus eaque deserunt similique culpa vel consequuntur veritatis maiores!', '2020-12-21 14:51:45', '2020-12-21 14:51:45');

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
(33, 9, 'Bedroom', '18b96349e5a11a13ef0da8958239203f2de9ac47d.jpg', '2020-12-21 14:29:55', '2020-12-21 14:32:14'),
(34, 9, 'Kitchen', '1ca8af489c8709cedb011a816c3fd04998733d0e5.jpg', '2020-12-21 14:29:55', '2020-12-21 14:32:24'),
(35, 9, 'Frontview', '18104cb4cca2670081d6679c53703bf7cddbec1c5.jpg', '2020-12-21 14:29:55', '2020-12-21 14:35:08'),
(36, 9, 'Frontview', '11ac993f61170670ab488146cad29efc498ca5712.jpg', '2020-12-21 14:29:55', '2020-12-21 14:38:27'),
(37, 9, 'Dining hall', '11447ebf832acf6ffe6feb4bffef4947819a4de08.jpg', '2020-12-21 14:29:55', '2020-12-21 14:38:33'),
(38, 9, 'Bedroom', '1cf71dfb0ab4da2c3acfdafa564705dd28b12fb74.jpg', '2020-12-21 14:29:55', '2020-12-21 14:38:37');

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
(9, 9, NULL, 'accra', 'accra', '37.2430548', '-115.7930198', '2020-12-21 14:23:55', '2020-12-21 14:23:55');

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
(4, 9, 'Don\'t drink in front of children in apartment', '2020-12-21 14:43:10', '2020-12-21 14:43:10');

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
(7, 9, 6, NULL, NULL, 'month', 700, NULL, 'GHC', NULL, '2020-12-21 15:01:35', '2020-12-21 15:01:35');

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
(27, 9, 'No deadly weapons', '2020-12-21 13:55:16', '2020-12-21 13:55:16');

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
(23, 9, 'Fire Extinguisher', '2020-12-21 13:39:07', '2020-12-21 13:39:07');

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
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `message_id` int(10) UNSIGNED NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `ticket_replies`
--

CREATE TABLE `ticket_replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` tinyint(1) NOT NULL,
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
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
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

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `is_active`, `image`, `email_verification_token`, `verify_email`, `verify_email_time`, `sms_verification_token`, `verify_sms`, `verify_sms_time`, `login_time`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fiifi pius jnr', 'fiifipius@gmail.com', '$2y$10$SdP7yCkjKapWQUHbVNYXs.bxBlL67pEDRvfoG1QIAoWK8ESuDYgA6', '0542398441', 1, '10ff36ac46e6be792da3dec441f52c02d470bf80a.jpeg', '68684398', 1, '2020-12-15 15:41:14', NULL, 0, NULL, '2020-12-21 10:59:18', 'Zr3CtZNcJ5HllARaKydZnDRkJJbev43YjGwzmHSXrzx8jHxhuhn6UR959hEt', '2020-12-15 14:41:14', '2020-12-21 10:59:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_activities`
--

CREATE TABLE `user_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_extension_requests`
--

CREATE TABLE `user_extension_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `visit_id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(11) NOT NULL,
  `extension_date` date NOT NULL,
  `is_confirm` int(11) NOT NULL DEFAULT 1,
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
(1, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2020-12-15 14:41:14', '2020-12-19 18:42:32');

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
(1, 1, 'male', '1974-11-19', 'single', 'Accra', NULL, 'Software Developer', '0542398441', NULL, NULL, '2020-12-19 17:01:14', '2020-12-19 17:01:14');

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
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `infant` int(11) NOT NULL,
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
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_message_id_index` (`message_id`);

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
-- Indexes for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_replies_ticket_id_index` (`ticket_id`);

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
-- Indexes for table `user_activities`
--
ALTER TABLE `user_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_activities_user_id_index` (`user_id`);

--
-- Indexes for table `user_extension_requests`
--
ALTER TABLE `user_extension_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_extension_requests_user_id_index` (`user_id`),
  ADD KEY `user_extension_requests_visit_id_foreign` (`visit_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deactivate_users`
--
ALTER TABLE `deactivate_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostel_block_rooms`
--
ALTER TABLE `hostel_block_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hostel_block_room_numbers`
--
ALTER TABLE `hostel_block_room_numbers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hostel_bookings`
--
ALTER TABLE `hostel_bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostel_room_amenities`
--
ALTER TABLE `hostel_room_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `include_utilities`
--
ALTER TABLE `include_utilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `property_amenities`
--
ALTER TABLE `property_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `property_contains`
--
ALTER TABLE `property_contains`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `property_descriptions`
--
ALTER TABLE `property_descriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `property_hostel_blocks`
--
ALTER TABLE `property_hostel_blocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `property_hostel_prices`
--
ALTER TABLE `property_hostel_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `property_images`
--
ALTER TABLE `property_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `property_locations`
--
ALTER TABLE `property_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `property_own_rules`
--
ALTER TABLE `property_own_rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `property_prices`
--
ALTER TABLE `property_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `property_reviews`
--
ALTER TABLE `property_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_rules`
--
ALTER TABLE `property_rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `property_shared_amenities`
--
ALTER TABLE `property_shared_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
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
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
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
-- AUTO_INCREMENT for table `user_activities`
--
ALTER TABLE `user_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_saved_properties`
--
ALTER TABLE `user_saved_properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_visits`
--
ALTER TABLE `user_visits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD CONSTRAINT `ticket_replies_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_activities`
--
ALTER TABLE `user_activities`
  ADD CONSTRAINT `user_activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_extension_requests`
--
ALTER TABLE `user_extension_requests`
  ADD CONSTRAINT `user_extension_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_extension_requests_visit_id_foreign` FOREIGN KEY (`visit_id`) REFERENCES `user_visits` (`id`) ON DELETE CASCADE;

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
