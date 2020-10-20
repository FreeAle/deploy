-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 18, 2018 at 03:00 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finaltesting`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `appoiment_no` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `discount` float NOT NULL DEFAULT '0',
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  `payment_token` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(6, '2016_06_01_000004_create_oauth_clients_table', 2),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0a2e4ce90491054822e2436a9542a18469717b4bb501223212411ac78cca91007b2866bcfc1a5471', 18, 1, 'hollywoodCuts', '[]', 0, '2018-10-04 02:58:04', '2018-10-04 02:58:04', '2019-10-04 08:28:04'),
('178fe4ffa6f222cf892a0c71f833173e1247129137b5fee3a2fe3e384c11e35b678377a5bb5e6f0a', 21, 1, 'hollywoodCuts', '[]', 0, '2018-10-04 01:50:18', '2018-10-04 01:50:18', '2019-10-04 07:20:18'),
('29dafe3706dbde7b029420d5460f808a9c8dec2a53a49656391005298d52682952f8c1eb4be55cd2', 17, 1, 'hollywoodCuts', '[]', 0, '2018-09-15 00:17:13', '2018-09-15 00:17:13', '2019-09-15 05:47:13'),
('2c72349d8602b329575dfe4aa0d4ca895fe6ba07abd5f85d520fa66ff7b1f22b9081309d27617242', 18, 1, 'hollywoodCuts', '[]', 0, '2018-10-04 02:52:30', '2018-10-04 02:52:30', '2019-10-04 08:22:30'),
('2ff6130056e6730c1c93c924288919065c2977fb3323f03ce2cf487e6f7a57d093738166c905b32a', 20, 1, 'hollywoodCuts', '[]', 0, '2018-09-19 06:54:54', '2018-09-19 06:54:54', '2019-09-19 12:24:54'),
('38c45aa2509a1913107fdaf1bb5d4e4a4363b0083bf2da2f9951677652ea727dbdeaa667b87ffa2e', 21, 1, 'hollywoodCuts', '[]', 0, '2018-10-04 03:18:22', '2018-10-04 03:18:22', '2019-10-04 08:48:22'),
('42921f024f12ef7094d6f482e5f374bfe86f9516342ebc1b9db27e56d36ee8f2722d1796ac288e08', 21, 1, 'hollywoodCuts', '[]', 0, '2018-10-04 01:58:41', '2018-10-04 01:58:41', '2019-10-04 07:28:41'),
('70206767031a94c01b619ec5c7455f4910226960ce24d85d162f8b840e8103d3c4ea56a49aeefd5a', 20, 1, 'hollywoodCuts', '[]', 0, '2018-09-19 06:34:40', '2018-09-19 06:34:40', '2019-09-19 12:04:40'),
('7c9f1b5e239e34aa774ff315fe84ccaeae834a0d0725b048fe68732ff0a9966f813069aba4980ac7', 18, 1, 'hollywoodCuts', '[]', 0, '2018-10-04 03:15:52', '2018-10-04 03:15:52', '2019-10-04 08:45:52'),
('951987a28accace0e96af7554f6cf42e7f17b5fb9fc5ebb5b9853d84cf7e87f428838a3f85586bd3', 20, 1, 'hollywoodCuts', '[]', 0, '2018-09-19 07:15:26', '2018-09-19 07:15:26', '2019-09-19 12:45:26'),
('b0d0631c0809cb6ac5191321b7591062658e4cbe1ee338d140f19c46da870cf06f4ce60e680b0df9', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-17 01:21:57', '2018-09-17 01:21:57', '2019-09-17 06:51:57'),
('b5b33f35f87d76c15cf36ce7f72b6cf397fdb74f4c841147107c09795e61ad989cb4f2c8ec90a575', 18, 1, 'hollywoodCuts', '[]', 0, '2018-10-04 03:08:08', '2018-10-04 03:08:08', '2019-10-04 08:38:08'),
('bdb44a85751b29f0a09f5817403a3fa5bc9c7a112e9305c962760110cabba382883adb732e302d2c', 21, 1, 'hollywoodCuts', '[]', 0, '2018-10-04 03:37:37', '2018-10-04 03:37:37', '2019-10-04 09:07:37'),
('d47be0730775117d5ab01dc321b6fcb181892732a1b9fe18336829ebc8704f36676cfc31d734b340', 21, 1, 'hollywoodCuts', '[]', 0, '2018-10-04 03:26:46', '2018-10-04 03:26:46', '2019-10-04 08:56:46'),
('dd42de0a1310fb0bc7854f1360771b02b7339361f44204e3f7900150a4b7e6be080da9953be060b2', 21, 1, 'hollywoodCuts', '[]', 0, '2018-10-04 01:54:08', '2018-10-04 01:54:08', '2019-10-04 07:24:08'),
('df4ca9e4ca212e846e71abeeac473a2848433fbe076c5c69a64a5bea3b98efb8b4ae3d54697868f4', 18, 1, 'hollywoodCuts', '[]', 0, '2018-10-04 03:11:14', '2018-10-04 03:11:14', '2019-10-04 08:41:14'),
('ed443106ebd8118a2b3ff3a5d2502b8e27a8cf91c15392572d342d64ee523580b3550dd8e0fdbfe5', 18, 1, 'hollywoodCuts', '[]', 0, '2018-10-04 02:16:23', '2018-10-04 02:16:23', '2019-10-04 07:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'jyq04sHKCSLnPmLiERRrdQjc5ST5LgoadGBT5zyY', 'http://localhost', 1, 0, 0, '2018-08-28 07:19:53', '2018-08-28 07:19:53'),
(2, NULL, 'Laravel Password Grant Client', 'TEN3vTZxy4mssGLw6RJysJKD4SwJfAk3OTg6Sxsg', 'http://localhost', 0, 1, 0, '2018-08-28 07:19:53', '2018-08-28 07:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-08-28 07:19:53', '2018-08-28 07:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offer_tbl`
--

CREATE TABLE `offer_tbl` (
  `id` int(11) NOT NULL,
  `offer_code` varchar(50) DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `discription` text,
  `is_image_available` int(11) DEFAULT NULL,
  `service_id` varchar(191) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer_tbl`
--

INSERT INTO `offer_tbl` (`id`, `offer_code`, `discount`, `image`, `start_time`, `end_time`, `status`, `name`, `discription`, `is_image_available`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 'derd1011', 10, NULL, '2018-08-14 00:00:00', '2018-08-17 00:00:00', 0, 'by me enjoy', 'very good offer', 1, '3', '2018-08-15 00:00:00', '2018-08-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review_for_emp`
--

CREATE TABLE `review_for_emp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) NOT NULL,
  `star` float DEFAULT NULL,
  `comment` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review_for_service`
--

CREATE TABLE `review_for_service` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `star` float DEFAULT NULL,
  `comment` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salon_emp`
--

CREATE TABLE `salon_emp` (
  `id` int(11) NOT NULL,
  `s_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `service` varchar(191) DEFAULT NULL,
  `mobile_no` varchar(15) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `detail` text,
  `cover_image` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `is_image_available` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salon_emp`
--

INSERT INTO `salon_emp` (`id`, `s_id`, `name`, `image`, `service`, `mobile_no`, `gender`, `detail`, `cover_image`, `city`, `state`, `status`, `is_image_available`, `created_at`, `updated_at`) VALUES
(14, NULL, 'Marisa', '5c18f4d9c1609.jpg', '34,32,37', '0000000000', 'Women', 'Meet Marisa.  Cool, calm and collected this technical powerhouse has an artists touch.  Passionate and driven to create perfection on everything she touches', 'default.jpg', 'london', 'DC', 'on', NULL, '2018-12-18 13:23:37', '2018-12-18 13:44:28'),
(15, NULL, 'Candace', '5c18f52160357.jpg', '37,36', '0000000000', 'Women', 'Born and raised in Denver, CO,  Candace has worked with Wella, Schwarzkopf, Keune, and Goldwell, making her a chemist behind the chair.', 'default.jpg', 'london', 'DC', 'on', NULL, '2018-12-18 13:24:49', '2018-12-18 13:43:34'),
(16, NULL, 'josh', '5c18f92089ea1.jpg', '33,35', '0000000000', 'Men', 'After moving to NYC from West Palm Beach, Florida Kali honed her skills at a busy up-town salon where she was educated in balayage and French cutting techniques.', 'default.jpg', 'london', 'DC', 'on', NULL, '2018-12-18 13:41:52', '2018-12-18 13:43:44'),
(17, NULL, 'Paul', '5c18f9656c225.jpg', '33,35', '0000000000', 'Men', 'Tran has worked with L’Oreal throughout her entire career, so balayage is something that she’s expertly trained in. Due to her southern roots she is also a master at creating dynamite looks for blondes!', 'default.jpg', 'london', 'DC', 'on', NULL, '2018-12-18 13:43:01', '2018-12-18 13:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `salon_master`
--

CREATE TABLE `salon_master` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contect_person` varchar(191) NOT NULL,
  `status` varchar(11) NOT NULL,
  `available_for` varchar(15) NOT NULL,
  `detail` text NOT NULL,
  `profile_image` varchar(50) NOT NULL,
  `cover_image` varchar(50) NOT NULL,
  `paypal_production_id` varchar(255) DEFAULT NULL,
  `paypal_sendbox_id` varchar(255) DEFAULT NULL,
  `strip_publish_key` varchar(255) DEFAULT NULL,
  `strip_api_key` varchar(255) DEFAULT NULL,
  `razorpay_key` varchar(255) DEFAULT NULL,
  `facebook_app_id` varchar(255) DEFAULT NULL,
  `facebook_app_name` varchar(255) DEFAULT NULL,
  `google_client_id` varchar(255) DEFAULT NULL,
  `email_status` varchar(10) NOT NULL DEFAULT 'on',
  `notification_status` varchar(10) NOT NULL DEFAULT 'on',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `OTP` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salon_master`
--

INSERT INTO `salon_master` (`id`, `name`, `mobile_no`, `address`, `state`, `city`, `open_time`, `close_time`, `email`, `password`, `contect_person`, `status`, `available_for`, `detail`, `profile_image`, `cover_image`, `paypal_production_id`, `paypal_sendbox_id`, `strip_publish_key`, `strip_api_key`, `razorpay_key`, `facebook_app_id`, `facebook_app_name`, `google_client_id`, `email_status`, `notification_status`, `created_at`, `updated_at`, `OTP`) VALUES
(1, 'BEAUTY ON PARK STREET', '02 9267 5787', 'Level 6, 321 Pitt St Sydney', 'Australia', 'Sydney', '09:30:00', '18:00:00', 'admin@admin.com', '$2y$10$OK/JbKnpJlcsLOwsXVpRUeoPlEOwkxXC5qQSWPVDNBW4TGz40W6vm', 'Coder12895', 'on', 'Both', 'WELCOME TO BEAUTY ON PARK ST, A LEADING BEAUTY SALON IN THE HEART OF THE SYDNEY CBD!!', '1536309845.png', '1536222031.jpg', 'paypal production id', 'paypal sendboxid', 'strip publish key', 'strip api key', 'razorpay key', 'Facebook id', 'facebook app name', 'google client id', 'on', 'on', '2018-08-11', '2018-10-04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services_tbl`
--

CREATE TABLE `services_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `catID` int(11) DEFAULT NULL,
  `time` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `cover_image` varchar(50) NOT NULL,
  `is_image_available` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `service_for` varchar(10) DEFAULT NULL,
  `emp` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services_tbl`
--

INSERT INTO `services_tbl` (`id`, `name`, `description`, `catID`, `time`, `price`, `image`, `cover_image`, `is_image_available`, `status`, `created_at`, `updated_at`, `service_for`, `emp`) VALUES
(32, 'Barber Cuts', 'Though the wait is long I don\'t mind waiting, because at the end everyone is happy wit their result', 25, 30, 53, '5c18f25164d10.jpg', '5c18f32066204.jpg', NULL, 'on', '2018-12-18', '2018-12-18', 'Both', '14'),
(33, 'Medium / Long Haircuts', 'Hair that ranges from chin past shoulder or is medium to thick density.', 25, 60, 83, '5c18f29ec85b3.jpg', '5c18f29ec8d0c.jpg', NULL, 'on', '2018-12-18', '2018-12-18', 'Women', '16,17'),
(34, 'Double process', 'This service allows your stylist to utilize multiple techniques. These often include a base color, highlights, lowlights, balayage. Depending on your desired look your stylist can recommend the best options. This service is perfect for those multi-dimensional looks!', 26, 20, 230, '5c18f301020a5.jpg', '5c18f3010279f.jpg', NULL, 'on', '2018-12-18', '2018-12-18', 'Both', '14'),
(35, 'Specialty Color Service', 'Not all hair color is created equal. And at Fox & Jane we know it. In effort to reach your hair color dreams, at times we may have to go off menu. Advanced color work, extreme changes, and multi-stage processes within one visit will incur al le carte pricing. Don\'t worry, your technician will clearly define your goals and costs before you get started.', 26, 120, 275, '5c18f37547132.jpg', '5c18f3754786c.jpg', NULL, 'on', '2018-12-18', '2018-12-18', 'Women', '16,17'),
(36, 'Keratin Smoothing Treatment', 'This formaldehyde free treatment will reduce curl, smooth frizz and speeds drying time. **Does not straighten hair', 27, 25, 300, '5c18f3e786177.jpg', '5c18f3e7868aa.jpg', NULL, 'on', '2018-12-18', '2018-12-18', 'Men', '15'),
(37, 'The American Wave (Perm)', 'Bespoke waving service that creates volume or beach texture that lasts 4-6 months (available only at our Boerum Hill location, with specialist Kelly Shine)', 27, 90, 389, '5c18f4732451a.jpg', '5c18f47324c2d.jpg', NULL, 'on', '2018-12-18', '2018-12-18', 'Women', '15,14');

-- --------------------------------------------------------

--
-- Table structure for table `service_cat`
--

CREATE TABLE `service_cat` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `description` text,
  `status` varchar(100) DEFAULT 'off',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_cat`
--

INSERT INTO `service_cat` (`id`, `name`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(25, 'CUT', '5c18f060e31f6.jpg', 'Includes consultation, cleanse and a beautiful blowout.', 'on', '2018-12-18 13:04:32', '2018-12-18 13:04:32'),
(26, 'COLOR', '5c18f11672ccd.jpg', 'Add the perfect finish to your color work or simply keep it refreshed.', 'on', '2018-12-18 13:07:34', '2018-12-18 13:07:34'),
(27, 'TREATMENTS', '5c18f15972275.jpg', 'This formaldehyde free treatment will reduce curl, smooth frizz and speeds drying time.', 'on', '2018-12-18 13:08:41', '2018-12-18 13:08:41'),
(28, 'SPECIAL EVENTS', '5c18f18d03e21.jpg', 'Blowout and curls with a curling iron flat iron', 'on', '2018-12-18 13:09:33', '2018-12-18 13:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `slider_tbl`
--

CREATE TABLE `slider_tbl` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_tbl`
--

INSERT INTO `slider_tbl` (`id`, `image`, `title`, `created_at`, `updated_at`) VALUES
(4, '5c18dbba44b14.jpg', 'Discount At 10%', '2018-12-18 11:36:26', '2018-12-18 11:36:26'),
(5, '5c18dbc53ff9e.jpg', 'Discount At 20%', '2018-12-18 11:36:37', '2018-12-18 11:36:37'),
(6, '5c18dbe910f73.jpg', 'Discount At 30%', '2018-12-18 11:37:13', '2018-12-18 11:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OTP` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(110) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fev_stylist` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fev_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile_no`, `verify`, `OTP`, `gender`, `image`, `remember_token`, `facebook_token`, `google_token`, `device_token`, `fev_stylist`, `fev_service`, `created_at`, `updated_at`) VALUES
(19, 'admin', 'admin@admin.com', '$2y$10$OK/JbKnpJlcsLOwsXVpRUeoPlEOwkxXC5qQSWPVDNBW4TGz40W6vm', '7584521542', '0', 'xhZbjRy', NULL, NULL, NULL, NULL, NULL, 'undefined', NULL, NULL, '2018-09-14 23:47:16', '2018-09-14 23:47:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `offer_tbl`
--
ALTER TABLE `offer_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `review_for_emp`
--
ALTER TABLE `review_for_emp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `review_for_service`
--
ALTER TABLE `review_for_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `appointment_id` (`appointment_id`);

--
-- Indexes for table `salon_emp`
--
ALTER TABLE `salon_emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salon_master`
--
ALTER TABLE `salon_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_tbl`
--
ALTER TABLE `services_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`catID`);

--
-- Indexes for table `service_cat`
--
ALTER TABLE `service_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_tbl`
--
ALTER TABLE `slider_tbl`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offer_tbl`
--
ALTER TABLE `offer_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review_for_emp`
--
ALTER TABLE `review_for_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review_for_service`
--
ALTER TABLE `review_for_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salon_emp`
--
ALTER TABLE `salon_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `salon_master`
--
ALTER TABLE `salon_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services_tbl`
--
ALTER TABLE `services_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `service_cat`
--
ALTER TABLE `service_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `slider_tbl`
--
ALTER TABLE `slider_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review_for_emp`
--
ALTER TABLE `review_for_emp`
  ADD CONSTRAINT `review_for_emp_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `salon_emp` (`id`),
  ADD CONSTRAINT `review_for_emp_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `review_for_service`
--
ALTER TABLE `review_for_service`
  ADD CONSTRAINT `review_for_service_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `review_for_service_ibfk_3` FOREIGN KEY (`service_id`) REFERENCES `services_tbl` (`id`);

--
-- Constraints for table `services_tbl`
--
ALTER TABLE `services_tbl`
  ADD CONSTRAINT `services_tbl_ibfk_1` FOREIGN KEY (`catID`) REFERENCES `service_cat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
