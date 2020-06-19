-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 18, 2020 at 10:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `property_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `infant` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `step` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `property_id`, `user_id`, `check_in`, `check_out`, `adult`, `children`, `infant`, `status`, `step`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2020-06-19', '2020-06-26', 1, 0, 0, 0, 3, '2020-06-18 09:36:17', '2020-06-18 15:33:23');

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
(1, 1, 1, 'Hi Pius i\'m excited to lodge in your property', 0, '2020-06-18 11:54:43', '2020-06-18 11:54:43');

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
(28, '2020_04_08_151345_create_property_categories_table', 1),
(29, '2020_04_12_202658_create_categories_table', 1),
(112, '2014_10_12_000000_create_users_table', 2),
(113, '2014_10_12_100000_create_password_resets_table', 2),
(114, '2020_02_24_151929_create_properties_table', 2),
(115, '2020_02_26_180933_create_property_amenities_table', 2),
(116, '2020_02_27_191323_create_amenities_table', 2),
(117, '2020_02_27_191515_create_property_images_table', 2),
(118, '2020_02_27_191639_create_property_descriptions_table', 2),
(119, '2020_02_27_191749_create_property_rules_table', 2),
(120, '2020_02_27_191937_create_property_prices_table', 2),
(121, '2020_02_28_164122_create_property_types_table', 2),
(122, '2020_03_04_130937_create_property_hostel_blocks_table', 2),
(123, '2020_03_04_161902_create_hostel_block_rooms_table', 2),
(124, '2020_03_05_093635_create_property_contains_table', 2),
(125, '2020_03_05_094025_create_property_locations_table', 2),
(126, '2020_03_06_222941_create_property_own_rules_table', 2),
(127, '2020_03_09_154720_create_property_hostel_prices_table', 2),
(128, '2020_03_12_213458_create_property_reviews_table', 2),
(129, '2020_03_19_180532_create_property_rents_table', 2),
(130, '2020_03_19_180553_create_property_buys_table', 2),
(131, '2020_03_19_180606_create_property_bids_table', 2),
(132, '2020_03_23_154012_create_messages_table', 2),
(133, '2020_03_23_173334_create_replies_table', 2),
(134, '2020_03_23_180725_create_tickets_table', 2),
(135, '2020_03_23_181046_create_ticket_replies_table', 2),
(136, '2020_03_26_231910_create_user_profiles_table', 2),
(137, '2020_03_27_170156_create_user_saved_properties_table', 2),
(138, '2020_03_27_171234_create_user_wallets_table', 2),
(139, '2020_04_13_182911_create_user_logins_table', 2),
(140, '2020_04_14_174450_create_deactivate_users_table', 2),
(141, '2020_04_15_121039_create_user_activities_table', 2),
(142, '2020_04_15_123102_create_vats_table', 2),
(143, '2020_04_15_145243_create_user_notifications_table', 2),
(144, '2020_04_15_181351_create_account_reactivates_table', 2),
(145, '2020_04_20_165116_create_hostel_block_room_numbers_table', 2),
(146, '2020_04_20_184651_create_hostel_room_amenities_table', 2),
(147, '2020_05_01_191138_create_property_shared_amenities_table', 2),
(148, '2020_06_17_112920_create_bookings_table', 3);

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
  `infant` int(11) DEFAULT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT 0,
  `vacant` tinyint(1) NOT NULL DEFAULT 1,
  `step` int(11) NOT NULL DEFAULT 1,
  `done_step` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_id`, `base`, `type`, `type_status`, `title`, `adult`, `children`, `infant`, `publish`, `vacant`, `step`, `done_step`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'house', 'room', 'rent', 'Single room self contain', 2, 3, 1, 1, 1, 9, 1, '2020-06-08 12:27:30', '2020-06-08 13:07:13', NULL),
(2, 1, 'apartment', 'apartment', 'short_stay', 'Chamber and Hall', 2, 1, 0, 1, 1, 9, 1, '2020-06-09 09:58:31', '2020-06-09 10:06:08', NULL);

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
(1, 1, 'Smoke Detector', '2020-06-08 12:32:37', '2020-06-08 12:32:37'),
(2, 1, 'Ceiling Fan', '2020-06-08 12:32:37', '2020-06-08 12:32:37'),
(3, 2, 'TV', '2020-06-09 10:00:38', '2020-06-09 10:00:38'),
(4, 2, 'Fridge', '2020-06-09 10:00:38', '2020-06-09 10:00:38'),
(5, 2, 'Fiber Broadband Modem', '2020-06-09 10:00:38', '2020-06-09 10:00:38'),
(6, 2, 'Telephone', '2020-06-09 10:00:38', '2020-06-09 10:00:38'),
(7, 2, 'Smoke Detector', '2020-06-09 10:00:38', '2020-06-09 10:00:38'),
(8, 2, 'Air Conditioning', '2020-06-09 10:00:38', '2020-06-09 10:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `property_bids`
--

CREATE TABLE `property_bids` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_buys`
--

CREATE TABLE `property_buys` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 1, '1', 1, 1, 1, 1, 1, 1, 'not_furnished', '2020-06-08 12:28:41', '2020-06-08 12:28:41'),
(2, 2, '1', 1, 1, 1, 1, 1, 1, 'fully_furnished', '2020-06-09 10:00:00', '2020-06-09 10:00:00');

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
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_descriptions`
--

INSERT INTO `property_descriptions` (`id`, `property_id`, `gate`, `description`, `neighbourhood`, `direction`, `size`, `unit`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '700', 'sf', '2020-06-08 12:58:52', '2020-06-08 12:58:52'),
(2, 2, 1, 'tyopjkddrdrddd', 'jjkkkk', 'kkkkkk', '1000', 'sf', '2020-06-09 10:04:03', '2020-06-09 10:04:03');

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
(1, 1, 'Bedroom', '123139418c388b0cf2dba6260860f935cb30bbdfb.jpg', '2020-06-08 12:53:34', '2020-06-08 12:56:57'),
(2, 1, 'Hallway', '124b1d694f314555948479a8928c2b811a8786e49.jpg', '2020-06-08 12:54:20', '2020-06-08 12:57:01'),
(3, 1, 'Sitting room', '12c41dacdbda4a27f700a34edf8cf9f5ac64c4dcd.jpg', '2020-06-08 12:54:20', '2020-06-08 12:57:07'),
(4, 1, 'Kitchen', '10b05c46c68907b2126500df4764d0487f2565fce.jpg', '2020-06-08 12:54:20', '2020-06-08 12:57:15'),
(5, 1, 'Hall', '1ec4e1f961d47b73bde98065a6021f9da6c4f6d30.jpg', '2020-06-08 12:54:20', '2020-06-08 12:57:21'),
(6, 2, 'Bedroom', '1a5350820be99af6f4c470d2317bd45474423bf4a.jpg', '2020-06-09 10:02:08', '2020-06-09 10:02:34'),
(7, 2, 'Bed frontview', '1f4dbbd4ff0692feef3c094d9c12aed71e4b35960.jpg', '2020-06-09 10:02:08', '2020-06-09 10:02:41'),
(8, 2, 'Living Hall', '1d66732fcf0971b991ddab5b34130493b9252d22d.jpg', '2020-06-09 10:02:08', '2020-06-09 10:02:43'),
(9, 2, 'Dinning', '1d4a3674314f5af42ccf02d87d5477a7554dc19f3.jpg', '2020-06-09 10:02:08', '2020-06-09 10:02:55'),
(10, 2, 'Kitchen', '1810157386e92bb4322840abcdda7e9060acff6f7.jpg', '2020-06-09 10:02:08', '2020-06-09 10:02:51'),
(11, 2, 'Visitors', '1e1a87036ad1c87b3e30b49083937461647c3aaa4.jpg', '2020-06-09 10:02:23', '2020-06-09 10:03:02'),
(12, 2, 'Hall', '189d8b5fbc82d804e8a30daadb5add0a23758cb35.jpg', '2020-06-09 10:02:23', '2020-06-09 10:03:04'),
(13, 2, 'Apartment frontview', '11bcf0158ac812c25644367a17cdc23a75c652b64.jpg', '2020-06-09 10:02:23', '2020-06-09 10:03:15'),
(14, 2, 'Bed sideview', '16af30acf8070bbb6ecaf2f25444e7eba96eec14f.jpg', '2020-06-09 10:02:23', '2020-06-09 10:03:19'),
(15, 2, 'Big hall', '144090ef0dd4bf073dae4d57f15a6eb82584f75e7.jpg', '2020-06-09 10:02:23', '2020-06-09 10:03:27');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_locations`
--

INSERT INTO `property_locations` (`id`, `property_id`, `digital_address`, `location`, `location_slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'GL-050-2245', 'Labadi, Beach road', 'labadi-beach-road', '2020-06-08 12:48:13', '2020-06-08 12:48:13'),
(2, 2, 'GL-050-2202', 'Tse-Addo-Labadi, Accra', 'tse-addo-labadi-accra', '2020-06-09 10:01:45', '2020-06-09 10:01:45');

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
(1, 1, 'Don\'t drink in front of children', '2020-06-08 12:33:44', '2020-06-08 12:33:44'),
(2, 1, 'Don\'t wash in bathrooms', '2020-06-08 12:46:20', '2020-06-08 12:46:20'),
(3, 2, 'No fighting', '2020-06-09 10:01:18', '2020-06-09 10:01:18');

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
(1, 1, 12, NULL, NULL, 'month', 500, NULL, 'GHC', NULL, '2020-06-08 12:59:27', '2020-06-08 12:59:27'),
(2, 2, NULL, 3, 3, 'night', 30, 25, 'GHC', NULL, '2020-06-09 10:05:27', '2020-06-09 10:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `property_rents`
--

CREATE TABLE `property_rents` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_reviews`
--

CREATE TABLE `property_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `location_star` int(11) NOT NULL,
  `comm_star` int(11) NOT NULL,
  `value_star` int(11) NOT NULL,
  `accuracy_star` int(11) NOT NULL,
  `tidy_star` int(11) NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 1, 'No smoking', '2020-06-08 12:47:30', '2020-06-08 12:47:30'),
(2, 1, 'No deadly weapons', '2020-06-08 12:47:30', '2020-06-08 12:47:30'),
(3, 2, 'No smoking', '2020-06-09 10:01:22', '2020-06-09 10:01:22'),
(4, 2, 'No deadly weapons', '2020-06-09 10:01:22', '2020-06-09 10:01:22');

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
(1, 1, 'Emergency Bell', '2020-06-08 12:32:37', '2020-06-08 12:32:37'),
(2, 1, 'Car Park', '2020-06-08 12:32:37', '2020-06-08 12:32:37'),
(3, 2, 'Emergency Bell', '2020-06-09 10:00:38', '2020-06-09 10:00:38'),
(4, 2, 'Basketball Court', '2020-06-09 10:00:38', '2020-06-09 10:00:38'),
(5, 2, 'Car Park', '2020-06-09 10:00:38', '2020-06-09 10:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'room', NULL, '2020-06-08 12:26:04', '2020-06-08 12:26:04'),
(2, 'apartment', NULL, '2020-06-08 13:13:33', '2020-06-08 13:13:33'),
(3, 'house', NULL, '2020-06-08 13:13:49', '2020-06-08 13:13:49');

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
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `help_desk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `help_desk`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'support', 'Password', 'jhjhjhjjjkkk', 1, '2020-06-09 10:08:52', '2020-06-09 10:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replies`
--

CREATE TABLE `ticket_replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `membership` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `digital_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT 2,
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

INSERT INTO `users` (`id`, `membership`, `name`, `email`, `password`, `phone`, `digital_address`, `active`, `image`, `email_verification_token`, `verify_email`, `verify_email_time`, `sms_verification_token`, `verify_sms`, `verify_sms_time`, `login_time`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '200608120939', 'pius geek', 'fiifipius@gmail.com', '$2y$10$NNIqEJv0fJijC1fmzs0c..prAoxds3dMwMIjsg/NmYKX5g1ihzMsa', '0542398441', 'EZ-004-8305', 2, '176c7304e6a375ad2fd54b107c0e6e7cbde561a33.jpeg', NULL, 1, NULL, '6538', 1, '2020-06-18 11:54:17', '2020-06-08 12:09:39', '2vR2umKuclLYZ7ypvCTOwvu5pyK0N7Pd54wjJ7W5sDwlZN1gk53wSA7Aml8B', '2020-06-08 12:09:39', '2020-06-18 11:54:17', NULL);

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
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `login_date` date NOT NULL,
  `login_time` time NOT NULL,
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
(1, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, '2020-06-08 12:09:39', '2020-06-09 10:13:27');

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
  `children` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `user_profiles` (`id`, `user_id`, `gender`, `dob`, `marital_status`, `children`, `city`, `country`, `occupation`, `emergency`, `id_front`, `id_back`, `created_at`, `updated_at`) VALUES
(1, 1, 'male', '1994-04-13', 'single', 'none', 'Labadi, Accra', NULL, 'Graphic Designer', '02451475575', '2d3bb8bef3c448a0a880b06e6d313450485babc8c.png', '2c8c81c5f4af024c52837f36da38d7a6298dabebb.png', '2020-06-08 12:22:37', '2020-06-08 12:23:33');

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
-- Table structure for table `user_wallets`
--

CREATE TABLE `user_wallets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `balance` double NOT NULL DEFAULT 0,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '¢',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_wallets`
--

INSERT INTO `user_wallets` (`id`, `user_id`, `balance`, `currency`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'GHC', '2020-06-08 12:09:39', '2020-06-08 12:09:39');

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
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_property_id_index` (`property_id`),
  ADD KEY `bookings_user_id_index` (`user_id`);

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
-- Indexes for table `hostel_room_amenities`
--
ALTER TABLE `hostel_room_amenities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hostel_room_amenities_hostel_block_room_id_index` (`hostel_block_room_id`);

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
-- Indexes for table `property_bids`
--
ALTER TABLE `property_bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_bids_property_id_index` (`property_id`),
  ADD KEY `property_bids_user_id_index` (`user_id`);

--
-- Indexes for table `property_buys`
--
ALTER TABLE `property_buys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_buys_property_id_index` (`property_id`),
  ADD KEY `property_buys_user_id_index` (`user_id`);

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
-- Indexes for table `property_rents`
--
ALTER TABLE `property_rents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_rents_property_id_index` (`property_id`),
  ADD KEY `property_rents_user_id_index` (`user_id`);

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
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_message_id_index` (`message_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_membership_unique` (`membership`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `user_activities`
--
ALTER TABLE `user_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_activities_user_id_index` (`user_id`);

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
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deactivate_users`
--
ALTER TABLE `deactivate_users`
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
-- AUTO_INCREMENT for table `hostel_room_amenities`
--
ALTER TABLE `hostel_room_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `property_amenities`
--
ALTER TABLE `property_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `property_bids`
--
ALTER TABLE `property_bids`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_buys`
--
ALTER TABLE `property_buys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_contains`
--
ALTER TABLE `property_contains`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `property_descriptions`
--
ALTER TABLE `property_descriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `property_hostel_blocks`
--
ALTER TABLE `property_hostel_blocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_hostel_prices`
--
ALTER TABLE `property_hostel_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_images`
--
ALTER TABLE `property_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `property_locations`
--
ALTER TABLE `property_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `property_own_rules`
--
ALTER TABLE `property_own_rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `property_prices`
--
ALTER TABLE `property_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `property_rents`
--
ALTER TABLE `property_rents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_reviews`
--
ALTER TABLE `property_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_rules`
--
ALTER TABLE `property_rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `property_shared_amenities`
--
ALTER TABLE `property_shared_amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_wallets`
--
ALTER TABLE `user_wallets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vats`
--
ALTER TABLE `vats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `property_bids`
--
ALTER TABLE `property_bids`
  ADD CONSTRAINT `property_bids_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_bids_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_buys`
--
ALTER TABLE `property_buys`
  ADD CONSTRAINT `property_buys_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_buys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `property_rents`
--
ALTER TABLE `property_rents`
  ADD CONSTRAINT `property_rents_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_rents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `user_activities`
--
ALTER TABLE `user_activities`
  ADD CONSTRAINT `user_activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
