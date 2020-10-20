-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2018 at 10:47 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hollywoodcuts`
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

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `appoiment_no`, `user_id`, `emp_id`, `service_id`, `total`, `discount`, `start_time`, `end_time`, `payment_status`, `payment_method`, `payment_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 1000, 18, 10, 24, 200, 0, '2018-09-08 11:40:00', '2018-09-08 13:10:00', 1, 'PAY LOCALLY', '', 1, NULL, '2018-09-08 06:47:19'),
(2, 1000, 18, 10, 25, 250, 0, '2018-09-08 13:10:00', '2018-09-08 14:40:00', 1, 'PAY LOCALLY', '', 1, NULL, '2018-09-08 06:47:19'),
(3, 1001, 18, 10, 21, 155, 0, '2018-09-08 16:50:00', '2018-09-08 17:50:00', 0, 'PAY LOCALLY', '', 2, NULL, '2018-09-08 06:52:44'),
(4, 1002, 18, 11, 25, 250, 0, '2018-11-08 13:55:00', '2018-11-08 15:25:00', 0, 'PAY LOCALLY', '', 2, NULL, '2018-09-08 06:56:36'),
(5, 1002, 18, 8, 24, 200, 0, '2018-11-08 15:25:00', '2018-11-08 16:55:00', 0, 'PAY LOCALLY', '', 2, NULL, '2018-09-08 06:56:36'),
(6, 1002, 18, 11, 25, 250, 0, '2018-11-08 16:55:00', '2018-11-08 18:25:00', 0, 'PAY LOCALLY', '', 2, NULL, '2018-09-08 06:56:36'),
(7, 1002, 18, 8, 24, 200, 0, '2018-11-08 18:25:00', '2018-11-08 19:55:00', 0, 'PAY LOCALLY', '', 2, NULL, '2018-09-08 06:56:36'),
(8, 1002, 18, 12, 27, 80, 0, '2018-11-08 19:55:00', '2018-11-08 20:35:00', 0, 'PAY LOCALLY', '', 2, NULL, '2018-09-08 06:56:36'),
(9, 1003, 18, 11, 25, 250, 0, '2018-12-08 12:58:00', '2018-12-08 14:28:00', 0, 'PAY LOCALLY', '', 1, NULL, '2018-09-08 06:59:25'),
(10, 1003, 18, 11, 25, 250, 0, '2018-12-08 14:28:00', '2018-12-08 15:58:00', 0, 'PAY LOCALLY', '', 1, NULL, '2018-09-08 06:59:25'),
(11, 1003, 18, 9, 29, 95, 0, '2018-12-08 15:58:00', '2018-12-08 16:48:00', 0, 'PAY LOCALLY', '', 1, NULL, '2018-09-08 06:59:25'),
(12, 1003, 18, 11, 25, 250, 0, '2018-12-08 16:48:00', '2018-12-08 18:18:00', 0, 'PAY LOCALLY', '', 1, NULL, '2018-09-08 06:59:25'),
(13, 1003, 18, 9, 29, 95, 0, '2018-12-08 18:18:00', '2018-12-08 19:08:00', 0, 'PAY LOCALLY', '', 1, NULL, '2018-09-08 06:59:25'),
(14, 1003, 18, 11, 30, 105, 0, '2018-12-08 19:08:00', '2018-12-08 20:08:00', 0, 'PAY LOCALLY', '', 1, NULL, '2018-09-08 06:59:25'),
(15, 1004, 18, 12, 27, 80, 0, '2018-12-08 12:02:00', '2018-12-08 12:42:00', 0, 'PAY LOCALLY', '', 1, NULL, '2018-09-08 07:03:10'),
(16, 1004, 18, 12, 28, 10, 0, '2018-12-08 12:42:00', '2018-12-08 12:52:00', 0, 'PAY LOCALLY', '', 1, NULL, '2018-09-08 07:03:10'),
(17, 1004, 18, 12, 27, 80, 0, '2018-12-08 12:52:00', '2018-12-08 13:32:00', 0, 'PAY LOCALLY', '', 1, NULL, '2018-09-08 07:03:10'),
(18, 1004, 18, 12, 28, 10, 0, '2018-12-08 13:32:00', '2018-12-08 13:42:00', 0, 'PAY LOCALLY', '', 1, NULL, '2018-09-08 07:03:10'),
(19, 1005, 18, 8, 24, 200, 0, '2018-11-08 10:04:00', '2018-11-08 11:34:00', 1, 'PAY LOCALLY', '', 1, NULL, '2018-09-08 07:04:56'),
(20, 1005, 18, 8, 24, 200, 0, '2018-11-08 11:34:00', '2018-11-08 13:04:00', 1, 'PAY LOCALLY', '', 1, NULL, '2018-09-08 07:04:56'),
(21, 1005, 18, 9, 29, 95, 0, '2018-11-08 13:04:00', '2018-11-08 13:54:00', 1, 'PAY LOCALLY', '', 1, NULL, '2018-09-08 07:04:56'),
(22, 1006, 18, 10, 29, 95, 0, '2018-10-08 11:06:00', '2018-10-08 11:56:00', 0, 'PAY LOCALLY', '', 0, NULL, NULL),
(23, 1006, 18, 10, 29, 95, 0, '2018-10-08 11:56:00', '2018-10-08 12:46:00', 0, 'PAY LOCALLY', '', 0, NULL, NULL),
(24, 1006, 18, 11, 30, 105, 0, '2018-10-08 12:46:00', '2018-10-08 13:46:00', 0, 'PAY LOCALLY', '', 0, NULL, NULL),
(25, 1007, 18, 12, 28, 10, 0, '2018-11-08 11:06:00', '2018-11-08 11:16:00', 0, 'PAY LOCALLY', '', 0, NULL, NULL),
(26, 1007, 18, 12, 28, 10, 0, '2018-11-08 11:16:00', '2018-11-08 11:26:00', 0, 'PAY LOCALLY', '', 0, NULL, NULL),
(27, 1007, 18, 10, 21, 155, 0, '2018-11-08 11:26:00', '2018-11-08 12:26:00', 0, 'PAY LOCALLY', '', 0, NULL, NULL),
(28, 1008, 17, 8, 22, 160, 0, '2018-11-08 14:12:00', '2018-11-08 15:12:00', 0, 'PAY LOCALLY', '', 0, NULL, NULL),
(29, 1008, 17, 10, 23, 99, 0, '2018-11-08 15:12:00', '2018-11-08 15:42:00', 0, 'PAY LOCALLY', '', 0, NULL, NULL),
(30, 1009, 17, 8, 22, 160, 0, '2018-10-08 12:14:00', '2018-10-08 13:14:00', 1, 'PAY LOCALLY', '', 1, NULL, '2018-09-08 12:27:17'),
(31, 1009, 17, 10, 23, 99, 0, '2018-10-08 13:14:00', '2018-10-08 13:44:00', 1, 'PAY LOCALLY', '', 1, NULL, '2018-09-08 12:27:17'),
(32, 1010, 18, 8, 22, 160, 0, '2018-09-10 13:44:00', '2018-09-10 14:44:00', 0, 'PAY LOCALLY', '', 0, NULL, NULL),
(33, 1010, 18, 10, 23, 99, 0, '2018-09-10 14:44:00', '2018-09-10 15:14:00', 0, 'PAY LOCALLY', '', 0, NULL, NULL),
(34, 1010, 18, 8, 22, 160, 0, '2018-09-10 15:14:00', '2018-09-10 16:14:00', 0, 'PAY LOCALLY', '', 0, NULL, NULL),
(35, 1010, 18, 10, 23, 99, 0, '2018-09-10 16:14:00', '2018-09-10 16:44:00', 0, 'PAY LOCALLY', '', 0, NULL, NULL),
(36, 1010, 18, 10, 29, 95, 0, '2018-09-10 16:44:00', '2018-09-10 17:34:00', 0, 'PAY LOCALLY', '', 0, NULL, NULL),
(37, 1011, 18, 8, 22, 160, 0, '2018-09-08 12:57:00', '2018-09-08 13:57:00', 0, 'PAY LOCALLY', '', 0, NULL, NULL),
(38, 1011, 18, 8, 22, 160, 0, '2018-09-08 13:57:00', '2018-09-08 14:57:00', 0, 'PAY LOCALLY', '', 0, NULL, NULL),
(39, 1011, 18, 11, 25, 250, 0, '2018-09-08 14:57:00', '2018-09-08 16:27:00', 0, 'PAY LOCALLY', '', 0, NULL, NULL),
(40, 1011, 18, 8, 22, 160, 0, '2018-09-08 16:27:00', '2018-09-08 17:27:00', 0, 'PAY LOCALLY', '', 0, NULL, NULL),
(41, 1011, 18, 11, 25, 250, 0, '2018-09-08 17:27:00', '2018-09-08 18:57:00', 0, 'PAY LOCALLY', '', 0, NULL, NULL),
(42, 1011, 18, 12, 27, 80, 0, '2018-09-08 18:57:00', '2018-09-08 19:37:00', 0, 'PAY LOCALLY', '', 0, NULL, NULL),
(43, 1012, 18, 10, 21, 155, 0, '2018-11-08 13:50:00', '2018-11-08 14:50:00', 0, 'PAY LOCALLY', '', 0, NULL, NULL);

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
('012e2d89a3222ff1445f3a830252149105624f9cd495be1c68cb68b0d9d694eaf7bc01835f9cd163', 8, 1, 'hollywoodCuts', '[]', 0, '2018-08-30 00:33:07', '2018-08-30 00:33:07', '2019-08-30 06:03:07'),
('02b7917315f4601ca545b46f7055c0ee64e986f93a9d183d7a60fb6cea9de527eb20510ee4bd941e', 7, 1, 'hollywoodCuts', '[]', 0, '2018-08-29 09:09:10', '2018-08-29 09:09:10', '2019-08-29 14:39:10'),
('0370516f27b2c4664964338e58b5024ff9bac0135875b665935b9f8e114c40ef78ef07e276c196d2', 17, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 05:21:53', '2018-09-08 05:21:53', '2019-09-08 10:51:53'),
('0403f2559044ca8ccc06e0f3c7a874519e63e17f5cfb31f5df3b65ba7ace9298496525c38be0af80', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-29 02:56:47', '2018-08-29 02:56:47', '2019-08-29 08:26:47'),
('05538863a4d4e6d8a429f7a018547195dad45f21e4d73284742c9dca1d57a282b4645c2991660f93', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 02:13:07', '2018-09-08 02:13:07', '2019-09-08 07:43:07'),
('0931cc830d0c28b08975f936855a04372c4ad329c97dff89e1e4c09169382788d9660fafd352e699', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 01:21:22', '2018-09-08 01:21:22', '2019-09-08 06:51:22'),
('0b8c17eca927eff146548db908330a69d700c9814ed871db2dfb9f50bf3c9badb3ce929abc231869', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-30 02:10:06', '2018-08-30 02:10:06', '2019-08-30 07:40:06'),
('0fac7207b126dfb4e4f8e79b339f783acf725766c7d126b78548432aa8700d360c1b972459d2543e', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 01:24:23', '2018-09-08 01:24:23', '2019-09-08 06:54:23'),
('13314b8de94e54b9a9016aadc9fdfdabf3bd29f166f1d999ee51b463632587202a15a742e426ef40', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 03:31:02', '2018-09-08 03:31:02', '2019-09-08 09:01:02'),
('16b99af871c8641d0091e665f9fcd94f45cb1a644a7e3aa85b7cd2a2d4cd44b65d250f41d8531f31', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-28 23:27:53', '2018-08-28 23:27:53', '2019-08-29 04:57:53'),
('18e060e411ec40029ea322847a61c066469e8f8be8effa8a430173953ae58cf353cf42ce671699cc', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-28 08:49:31', '2018-08-28 08:49:31', '2019-08-28 14:19:31'),
('19df76dff11540e28c79db0c45a0fdd302072d7ff5391454a2d0bb04c68531214648a68151ef5953', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-29 02:47:20', '2018-08-29 02:47:20', '2019-08-29 08:17:20'),
('1c0714927d26b26d8e32e1790ced7e9992508b0760eced970bfdcc308e44aaf95c311b7f74480ce6', 16, 1, 'hollywoodCuts', '[]', 0, '2018-09-07 06:56:55', '2018-09-07 06:56:55', '2019-09-07 12:26:55'),
('1e9ae797132aaac147f8096fa3e72c90601e685f07a62438309014e7e329269ca26ba853070d593d', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 02:14:15', '2018-09-08 02:14:15', '2019-09-08 07:44:15'),
('21ccec843c62036e5d6bfcbe2d9939e76b38bab39492d37aeaf9feb3d5764f26bc150445b2f2a692', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 00:21:59', '2018-09-08 00:21:59', '2019-09-08 05:51:59'),
('23cf259a092900793939927e948d095fbf7a933edf50107c127e9e99b23fea90cb3b1d4d5b8d4166', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-28 23:18:49', '2018-08-28 23:18:49', '2019-08-29 04:48:49'),
('243e80db33a499802a2bedf413539888c7721be1c5543a5bcfd8bd8cb434da1adefffc1e62897f7c', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 04:57:06', '2018-09-08 04:57:06', '2019-09-08 10:27:06'),
('2d03ece94d8305c0710ca2cad8f786c8f12d2f5ca00c2820e72b04f9672311ae58f3fad65e9df8e1', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-31 01:50:38', '2018-08-31 01:50:38', '2019-08-31 07:20:38'),
('2ecad22b1a8d201bfc250854d18073919d19db7824dea0ccf1b4dfac6dc6704d02a623a675622345', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 08:08:33', '2018-09-08 08:08:33', '2019-09-08 13:38:33'),
('2f81a8caa9f06807c69091ca668d356fa59999ca421fd85768c6dfc880c64dc261af67f0265132dc', 17, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 04:36:18', '2018-09-08 04:36:18', '2019-09-08 10:06:18'),
('2fa65c5701d635cceba481d7a1c61e6eaebf486a6ee752deb0cb3702252b48799b2e90f6067738b0', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 02:09:44', '2018-09-08 02:09:44', '2019-09-08 07:39:44'),
('306451a4680e2695ef5c0276e9a8e78410486356136d124c82b23c7f0ddbdf2d660c31c75e4e44bd', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-29 02:59:56', '2018-08-29 02:59:56', '2019-08-29 08:29:56'),
('34c6d0d3a1500f542ff74fb568895ada31310b82dfcf107ff0b35b638fce440bf1420c74e74341e8', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 02:33:25', '2018-09-08 02:33:25', '2019-09-08 08:03:25'),
('3617b9bf7ce69f9c44bbf8e076253316a9b9b2f666224d0e144903f3cd33476d4910647715c04acd', 6, 1, 'hollywoodCuts', '[]', 0, '2018-09-07 04:46:47', '2018-09-07 04:46:47', '2019-09-07 10:16:47'),
('3c6d16199e96717de683391086ab0d60c5e081c63d59fba824aff744d7283b3ac70cc94892fd240f', 17, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 01:24:51', '2018-09-08 01:24:51', '2019-09-08 06:54:51'),
('3d83891b10f6706dc3c66187aec6555fefc1459ce7171f794bc144763ee66fda6b782faa8cc0cab6', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-29 05:59:28', '2018-08-29 05:59:28', '2019-08-29 11:29:28'),
('41346c354da2b4bd89483d87853bf4cc09f40f8ee34424ce916473e5a0453419c32ade41ace6bc05', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 00:29:33', '2018-09-08 00:29:33', '2019-09-08 05:59:33'),
('418a64a068170ad5747bf7223b0f4a261212f71691fb20114f38f3f7e6e5e64623d8af2b38bdc555', 6, 1, 'hollywoodCuts', '[]', 0, '2018-09-07 03:16:31', '2018-09-07 03:16:31', '2019-09-07 08:46:31'),
('4230d3f42e746084644ebf0c379a9a51aa7de344e04d295f97591ac863bd5f60737b66c8b15ce4a4', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 07:24:10', '2018-09-08 07:24:10', '2019-09-08 12:54:10'),
('4b859304e29704fa1b95b201a9e9bd48fab25039bb9cebfce7606bfbe6b3cfb2f649f73079f35e08', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-28 23:17:27', '2018-08-28 23:17:27', '2019-08-29 04:47:27'),
('4c7ffde99a3a02f21c3e9f91867f39c2362ef27cbca1a2285abb0c385d882c83e7e5cd21ee8eb0db', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 08:19:57', '2018-09-08 08:19:57', '2019-09-08 13:49:57'),
('4e7c54d7891d2055a15cddf513279a1045ce632402c09029dc6d974165aac1612b35e7f4e86bc205', 17, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 03:21:36', '2018-09-08 03:21:36', '2019-09-08 08:51:36'),
('4ed42834ee64e987bdb3799048ad21eef721f1effab944074999e9fffbb6af68c04b734aa8c5b204', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-29 02:59:19', '2018-08-29 02:59:19', '2019-08-29 08:29:19'),
('53ef3cf7b1b46bab871fb1dfd8174e78bc66ff584ae0fb57da5a48c9bf024098d3213fb26f2ec61d', 17, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 01:37:42', '2018-09-08 01:37:42', '2019-09-08 07:07:42'),
('5419aa33f38208038ecb8b17a5f6c2222eecea08720f5d8e5f9f8a445d9e7fa04d53a58c52e3efc9', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-07 23:38:20', '2018-09-07 23:38:20', '2019-09-08 05:08:20'),
('56a2e6932003a64d5d436877d06c0523e1cc2735cf95939a524fab84f2bc47d80926d0476b4fb735', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-29 02:54:56', '2018-08-29 02:54:56', '2019-08-29 08:24:56'),
('5af9341c405d829efd9c31f1e38606d893936d2d67b86c5564649385b64279109b19b905d4b0d655', 17, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 06:51:20', '2018-09-08 06:51:20', '2019-09-08 12:21:20'),
('5c519b82ec936c522b5707a071fc90afc200c9174d44ed7f95058c436ee88d5c380615111ca3b896', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-28 23:08:07', '2018-08-28 23:08:07', '2019-08-29 04:38:07'),
('5f227a23c413ed419d09ef903785f1b805a69df6994ef42d00d9d03c476034fceef17b22b4c6b78f', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-31 01:08:35', '2018-08-31 01:08:35', '2019-08-31 06:38:35'),
('6321a590d8ad97761cec32c82d9362ab61eaf0439967462a5f40523d0348d3769778610eb12dd24d', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 01:25:38', '2018-09-08 01:25:38', '2019-09-08 06:55:38'),
('673aa8208eebba81b5453092e819207866bc0d6b366bcf0030cd7ee619f59a13999e76999ba0dbcd', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-28 22:53:43', '2018-08-28 22:53:43', '2019-08-29 04:23:43'),
('67a167feaf2f194dd294b67f52dce0e2782930f404473b98de7d4eae5c4629c795bd9e5600a97d51', 8, 1, 'hollywoodCuts', '[]', 0, '2018-08-29 09:10:44', '2018-08-29 09:10:44', '2019-08-29 14:40:44'),
('68801e8e86e03f086230ea6b28c8517ad857b07429b3c5eeffc1ed62c6c2ab5b64de9de9c7f9a4db', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 04:55:20', '2018-09-08 04:55:20', '2019-09-08 10:25:20'),
('6b019ab343504a582941f855aea222c9d7ae93383a22723b9fa1565aeca7ea91a890245924128dbf', 10, 1, 'hollywoodCuts', '[]', 0, '2018-09-06 02:52:51', '2018-09-06 02:52:51', '2019-09-06 08:22:51'),
('7486c7c11fb66922ea6390b5672e0341a360d70d5b2ac01ac333eb7e9837f23f046a40224cc39c59', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-30 02:09:26', '2018-08-30 02:09:26', '2019-08-30 07:39:26'),
('76526e569344e56fd1f92fef7f113f0d8ee74754629be3f2484aeb268879a8dce6a1b67474fe2a41', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 01:22:40', '2018-09-08 01:22:40', '2019-09-08 06:52:40'),
('783acaa0eb334bc15f43c0c3f6c1007e9961df2f65915961cff13a5d8e2ab2b1fbc8889ce6fef077', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-28 08:38:10', '2018-08-28 08:38:10', '2019-08-28 14:08:10'),
('7942a6af2abe66ec66462e1104e6b460e770469d5bd7a34e33826e3c71203921ec4f50a4f505ee86', 17, 1, 'hollywoodCuts', '[]', 0, '2018-09-07 23:47:21', '2018-09-07 23:47:21', '2019-09-08 05:17:21'),
('7b96aa5c3e28e6fcb1b6a127a40cee3726da5f05e01ae8a9f4b81b42e45c2033dcbedc8cf4aa557b', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-28 08:43:00', '2018-08-28 08:43:00', '2019-08-28 14:13:00'),
('81683329a3bf42e8d3a8856c40983f222cc851cf7fde521892eb4028a50c258115a5b5ef9d901008', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-28 23:13:34', '2018-08-28 23:13:34', '2019-08-29 04:43:34'),
('841b2329daebb54221dd4c681239803b1d08f84010bb33cdd071cbd017a6e4bade73ca2accfa9631', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 01:51:01', '2018-09-08 01:51:01', '2019-09-08 07:21:01'),
('84806b5f456dafb84c0279ce4d823914ade2ae7846da40ed6c314e37ee35aec7183291e01b997350', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 04:54:52', '2018-09-08 04:54:52', '2019-09-08 10:24:52'),
('86f55f63643bf02288ced14532455682708fdd07f738b8a8b40a7d96fe76c2bc2fa4069eae4ed00b', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 08:16:56', '2018-09-08 08:16:56', '2019-09-08 13:46:56'),
('8d6d9cadb3839158c09da602eadb33482d9be7e8de2a559f6b15d46d3569db3f0004478df1b1afd4', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-28 23:10:57', '2018-08-28 23:10:57', '2019-08-29 04:40:57'),
('93124071f5c2de502e25b4519b5c2f760d88c728f62f4cecb0e187ccda0d2351eb1f8db8c31618ab', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 00:05:54', '2018-09-08 00:05:54', '2019-09-08 05:35:54'),
('93aa4bee5abe287573246eb52ac7dba14b6e7dbfaad568a2313b0a9cf8e4bb3ee5c2be48242e7705', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 00:44:05', '2018-09-08 00:44:05', '2019-09-08 06:14:05'),
('94dc15ba245659ec51e807c7905a82672ecd7aba3b30e17e76a17657386d89fcbc3bc94a8db383dd', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 04:58:46', '2018-09-08 04:58:46', '2019-09-08 10:28:46'),
('95c1692165b7f510fdc92f85f54b24ad9bcd800fe874eda640b1ec5f5cb466a1d1cf084e0671050f', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 07:21:53', '2018-09-08 07:21:53', '2019-09-08 12:51:53'),
('974da401a13fe81903f74f956a3b5c4e43702ba5abefef810d3c5af6cb1a1f702c6dd6efb67c8246', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 02:14:03', '2018-09-08 02:14:03', '2019-09-08 07:44:03'),
('9d10871d79aad74ee38865d6c094d527eb866774abf38a88f3b1f81bf9ed1bd8d70418ce7fb4e722', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-31 08:49:38', '2018-08-31 08:49:38', '2019-08-31 14:19:38'),
('9db1744a0a2f7a0e5655daa1782caa46fee1d6deaa493a24390ebc6129b98763ebcef753aedba29c', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 01:10:24', '2018-09-08 01:10:24', '2019-09-08 06:40:24'),
('a01603778897f06036a466aa148e50b1b0e52cb47e6668c77c2c182c408215d5e4166a7feb8102f1', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 00:39:34', '2018-09-08 00:39:34', '2019-09-08 06:09:34'),
('a08bc2321fcb6a314c4f6df2289b8ead139aac7d5e45dc26718fc752b02c74550e0bf4423c2b1081', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-07 23:24:37', '2018-09-07 23:24:37', '2019-09-08 04:54:37'),
('a17cb8c156c3acc71ff0b1eb8e884a3c256b4fe0f6e266c91891455da1334a5dcf44ad1d2c8daa34', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-29 23:35:24', '2018-08-29 23:35:24', '2019-08-30 05:05:24'),
('a53f086944013bd9c32b37abb4aa02e78407981cffefb53269bac294d3e53304caee2d7edca7085e', 8, 1, 'hollywoodCuts', '[]', 0, '2018-08-29 23:43:12', '2018-08-29 23:43:12', '2019-08-30 05:13:12'),
('a5c36ddfc11cb761a21d2a1ce48184dd3a28023e9e4ed5d4659615d97fe62dc4c8c35063b1585d6c', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-28 23:28:10', '2018-08-28 23:28:10', '2019-08-29 04:58:10'),
('ab17346e4946a7d8e13723d1b545fbc443e5465ae108dcd1d923e6d33091b59cb7e56b457cec4494', 12, 1, 'hollywoodCuts', '[]', 0, '2018-09-06 23:36:04', '2018-09-06 23:36:04', '2019-09-07 05:06:04'),
('ac161c4e9dbad530891f5ca1e69a4e5b9814a8891f8bac607f88a9513619be9ec345b66ba60f69d3', 17, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 01:01:42', '2018-09-08 01:01:42', '2019-09-08 06:31:42'),
('b1f89e4f1fc143c85092281cd124f20afba525772a89079599976491c46528b642ca37d9faad9c32', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-29 08:09:34', '2018-08-29 08:09:34', '2019-08-29 13:39:34'),
('bb1fc2151b9a75cb8b80518f6cb1323c063657a88797c7653f0ece8fa996cdb4c878faaf7c7fb7c4', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-29 09:15:53', '2018-08-29 09:15:53', '2019-08-29 14:45:53'),
('bbf231021427e8741ef323c5d40674229dd384d2eff2d8af566ad70ced71e5f9979d3c2752e263f9', 8, 1, 'hollywoodCuts', '[]', 0, '2018-08-30 00:00:08', '2018-08-30 00:00:08', '2019-08-30 05:30:08'),
('bd3071726f93413f4ba57d54930388993b16a24cd63b5b85e3db6dc57c2077a46876ff5cc3e7891a', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-29 05:59:24', '2018-08-29 05:59:24', '2019-08-29 11:29:24'),
('bde0863ad4ebaab5bc87fac7333b2d1a1cf516eb900abe56438ae2cba92a0f803e8938c7517326b3', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 02:13:01', '2018-09-08 02:13:01', '2019-09-08 07:43:01'),
('bde17e27fa1f230a45aeb6e915245bb887a78f8d8e08a75a371cc660299492a168f3bba6216d2c02', 17, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 02:36:20', '2018-09-08 02:36:20', '2019-09-08 08:06:20'),
('c0a2fbff18a1bcbb7c80f3b896109b88b610fcc8204a4ad767188b1d0d62373e0fca16e6a2994dd7', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-29 04:59:21', '2018-08-29 04:59:21', '2019-08-29 10:29:21'),
('c1b577a0900ce3f84efb8a8a8c76db680c8195fc3185a71a0ae325538d6cbbf4a6d3affb9967ffda', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-29 02:45:56', '2018-08-29 02:45:56', '2019-08-29 08:15:56'),
('c204fdb7b83d85c603506d3a255adeb3187b369818ae61e111b6967bed4d2d783951dcd423ee29ed', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-29 08:57:30', '2018-08-29 08:57:30', '2019-08-29 14:27:30'),
('c6ba89d45e213ac8bccfdc4c17ead7b4bb815278167ebe269170201cf61cc5660a693baa7d9c10b7', 13, 1, 'hollywoodCuts', '[]', 0, '2018-09-06 23:39:11', '2018-09-06 23:39:11', '2019-09-07 05:09:11'),
('cc8e1750b6d9e787557c734223b4d2cbbb4d938ad66c3f4d7d9d4fb046d0e481a9670ac1abeca5ff', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-29 08:46:04', '2018-08-29 08:46:04', '2019-08-29 14:16:04'),
('ccbaf56acdb0f3abbb7c62036f11cc4a7ca1505e2ba25a8692322089425d4d84533933d436f938ab', 10, 1, 'hollywoodCuts', '[]', 0, '2018-09-06 06:58:31', '2018-09-06 06:58:31', '2019-09-06 12:28:31'),
('d2c00544a701645754ce65c50d895dc54dfe42d613fe1ee6ba96fadb1ca01befc7a78b4e71d4d73a', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-29 02:44:02', '2018-08-29 02:44:02', '2019-08-29 08:14:02'),
('d2c8d3fc276e93cf3c2f2ca600a7b57a1fcf26785b6791051677c8621917e453d45a0bbb7e11f537', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-28 23:19:58', '2018-08-28 23:19:58', '2019-08-29 04:49:58'),
('d6056a4dbcaaf133317fcaaee25c5f242c0084b2927c2b322bb00999b343555e65f6f2673b714ce2', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-29 02:43:59', '2018-08-29 02:43:59', '2019-08-29 08:13:59'),
('d705a1450caf6dd7b71693774959f276ea384f3835f174d23c9690a0609a2b536cbd93bdafc16766', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-29 02:45:17', '2018-08-29 02:45:17', '2019-08-29 08:15:17'),
('d94031ec409e1ef5f1949b9f2c0fef063208b24ac1a30d6f4e076180ce49351f383fe83cf289071b', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-28 23:07:15', '2018-08-28 23:07:15', '2019-08-29 04:37:15'),
('e2acf1c92df99462d465c847d665b49a09c847385b92bfa8c80dfc98fec978e4725937cc42483e7f', 17, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 08:27:35', '2018-09-08 08:27:35', '2019-09-08 13:57:35'),
('e3bdb074fcccbcc8aacc93ea93494bef97a999cc0c9446c686bbfc2065a4bc391b04757d6a853ae7', 17, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 01:41:23', '2018-09-08 01:41:23', '2019-09-08 07:11:23'),
('e64f24ff721909a0757dc2250ea613eed011b21f0562fe02215f2eaa500fdc69f7ed4c903a3a1028', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-28 23:10:01', '2018-08-28 23:10:01', '2019-08-29 04:40:01'),
('ec2ec8459ede54f096782c6037af61cdcfde8d914fd3be7db50a67ff89b020e9a5d4354633dda29f', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-28 23:18:58', '2018-08-28 23:18:58', '2019-08-29 04:48:58'),
('f111371c4a2a532e6cf3f7dcd88fac71aae5b2d04d07cf74dee0b04d156784b59c7612cdf488627a', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 00:54:35', '2018-09-08 00:54:35', '2019-09-08 06:24:35'),
('f183bf70be0bc2b9ea89a48e6438b3bc43f57d675a1dfe4c78ee2fa9ab8056de9cd143351f37a4c8', 17, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 01:33:38', '2018-09-08 01:33:38', '2019-09-08 07:03:38'),
('f8856d6bf0361f8aad553a7f9a58dacc6b4b6172391da9728a85b72376dc54e755b0f62063d578c6', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 00:52:14', '2018-09-08 00:52:14', '2019-09-08 06:22:14'),
('f9c4f33301eb8e97183580e58bfba9246b1054fb8edcf30083771e334b2241e3e18bec973c584d6a', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-28 23:27:49', '2018-08-28 23:27:49', '2019-08-29 04:57:49'),
('fbb7946ca628fc07e9eb9da9845138a9341a1fab37335196388ad1f84b6d3e218b701c289319eaa1', 17, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 01:38:43', '2018-09-08 01:38:43', '2019-09-08 07:08:43'),
('fc01c3ca1aac4945103746edade657d56ac5c134e9a89271011df8e7ba477e7ede7e7f04dd3d9b92', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 07:50:17', '2018-09-08 07:50:17', '2019-09-08 13:20:17'),
('fc3699bb91c021800b3c6da291bb4adc25e6f434ba6d19e145bfb00f6de58b153dcd00cecdd2f0f1', 18, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 01:28:07', '2018-09-08 01:28:07', '2019-09-08 06:58:07'),
('fd0d5393ce44ac8bcca828264bdc5e75bd673e4308c7580040c3f63fbd088b4720785d9ee34cbe7f', 6, 1, 'hollywoodCuts', '[]', 0, '2018-08-29 05:59:49', '2018-08-29 05:59:49', '2019-08-29 11:29:49'),
('fe0c87c5bea66b41ccf2ddff25a5fa8dd8896922694d60831fb655eb7d3f7a4cd37b7b3bcb64619b', 17, 1, 'hollywoodCuts', '[]', 0, '2018-09-08 00:12:41', '2018-09-08 00:12:41', '2019-09-08 05:42:41');

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

--
-- Dumping data for table `review_for_emp`
--

INSERT INTO `review_for_emp` (`id`, `user_id`, `emp_id`, `appointment_id`, `star`, `comment`, `created_at`, `updated_at`) VALUES
(1, 18, 8, 1005, 4, 'Hsjwjhshhw', '2018-09-08 07:21:54', '2018-09-08 07:21:54');

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

--
-- Dumping data for table `review_for_service`
--

INSERT INTO `review_for_service` (`id`, `user_id`, `service_id`, `appointment_id`, `star`, `comment`, `created_at`, `updated_at`) VALUES
(1, 18, 24, 1005, 3, 'Hsjwj', '2018-09-08 07:21:42', '2018-09-08 07:21:42'),
(2, 17, 22, 1009, 3, 'fgbd', '2018-09-08 12:27:33', '2018-09-08 12:27:33');

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
(8, NULL, 'Vaughn Acord', '1536219193.jpg', '24,23,22', '0000000000', 'Men', 'With 20 years of experience in his pocket, Michael V. Acord, or \"Vaughn,\" as he is known throughout the industry, is revered as a top international stylist. His list of celebrity clientele includes Richard Gere, Michael J. Fox, Tom Brady, President Bill Clinton, Ashton Kutcher, Al Pacino, Lou Reed and Bruce Springsteen. As co-owner and creative director for mizu, Vaughn positions the salon as the city\'s style center for Manhattanites and celebrities alike.', 'default.jpg', 'Sydney', 'Australia', 'on', NULL, '2018-09-06 07:33:13', '2018-09-06 07:53:58'),
(9, NULL, 'Damian Santiago', '1536219265.jpg', '29', '0000000000', 'Men', 'Renowned stylist and educator, and now salon owner, Damian Santiago helped created Mizu New York with a goal of setting a new standard within the luxury salon industry', '1536219265.jpg', 'Brisbane', 'Australia', 'on', NULL, '2018-09-06 07:34:25', '2018-09-06 07:54:18'),
(10, NULL, 'Ashley Hanna-Pisciotta', '1536219334.jpg', '21,25,24,30,31,23,29', '0000000000', 'Women', 'Ashley is one of the hottest young stylists in New York City. She comes to Mizu New York from the West Coast where she studied under celebrity stylist and fashion guru Varo Lopez, personal stylist to Jordan Sparks. Ashley has toured with Jordan Sparks under Varo and was recently at the Superbowl in Miami to style her hair.', 'default.jpg', 'West Coast', 'USA', 'on', NULL, '2018-09-06 07:35:34', '2018-09-06 07:54:52'),
(11, NULL, 'Stefano Greco', '1536219432.jpg', '30,25,31', '0000000000', 'Both', 'Originally from Geneva, Switzerland, Stefano Greco began following his passion for hair at the age of fifteen. After completing his primary education, Stefano entered a training program at a renowned school for hair design in Geneva. Since completing his training, Stefano has worked in high fashion styling as well as in top-end salons.', 'default.jpg', 'Melbourne', 'Australia', 'on', NULL, '2018-09-06 07:37:12', '2018-09-06 07:53:30'),
(12, NULL, 'Sheridan Pennington', '1536219508.jpg', '28,26,27', '0000000000', 'Women', 'heridan began her career in 1994 when she attended the Vidal Sassoon Academy in Santa Monica, CA', 'default.jpg', 'Santa Monica', 'USA', 'on', NULL, '2018-09-06 07:38:28', '2018-09-06 07:53:00');

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

INSERT INTO `salon_master` (`id`, `name`, `mobile_no`, `address`, `state`, `city`, `open_time`, `close_time`, `email`, `password`, `contect_person`, `status`, `available_for`, `detail`, `profile_image`, `cover_image`, `paypal_production_id`, `paypal_sendbox_id`, `strip_publish_key`, `razorpay_key`, `facebook_app_id`, `facebook_app_name`, `google_client_id`, `email_status`, `notification_status`, `created_at`, `updated_at`, `OTP`) VALUES
(1, 'BEAUTY ON PARK STREET', '02 9267 5787', 'Level 6, 321 Pitt St Sydney', 'Australia', 'Sydney', '09:30:00', '18:00:00', 'hello@beautyonparkst.com.au', '$2y$10$6Ngxu5hH0yLDVUYo2U32M.dlxQFLZrizTC.o2FAoU5xFGF/GLx05m', 'Coder12895', 'on', 'Both', 'WELCOME TO BEAUTY ON PARK ST, A LEADING BEAUTY SALON IN THE HEART OF THE SYDNEY CBD!!', '1536309845.png', '1536222031.jpg', 'paypal production id', 'paypal sendboxid', 'strip publish key', 'razorpay key', 'Facebook id', 'facebook app name', 'google client id', 'on', 'on', '2018-08-11', '2018-09-07', NULL);

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
(21, 'HYDROPEPTIDE FACIAL', 'This relaxing “no downtime” treatment infuses skin with the rejuvenating and uplifting benefits of 17 peptides and proteins. Begin the facial by gently exfoliating to promote healthy skin renewal and brightness. Nourish with vitamins and minerals and protect with antioxidants. After just one treatment, expression lines appear relaxed, skin is glowing, texture is smoother and skin is plumped. Includes an indulgent face, neck and shoulder massage.', 19, 60, 155, '1536217599.jfif', '5b90e690f37e6.jfif', NULL, 'on', '2018-09-06', '2018-09-06', 'Women', '10'),
(22, 'EMINENCE ORGANICS', 'Eminence Organics is the most unique and effective range of natural skin care products, harnessing the purest and most active ingredients without harmful chemicals or additives. Their potent ingredients are grown organically, handpicked and handmade in Budapest. This bespoke facial will detoxify, rejuvenate and flood the skin with moisture revealing a red carpet glowing complexion. Includes a double mask, enzymatic exfoliation and an indulgent face, neck and shoulder massage.', 19, 60, 160, '1536217742.jpg', '5b90e6a651906.jpg', NULL, 'on', '2018-09-06', '2018-09-06', 'Both', '8'),
(23, 'SKIN PEELS', 'Glowing skin peels using Elizabeth Arden Pro and Priori skincare. Results in a dash that can easily be squeezed into your lunch break.', 19, 30, 99, '1536217853.jfif', '5b90e6c4ac1ce.jfif', NULL, 'on', '2018-09-06', '2018-09-06', 'Both', '8,10'),
(24, 'FACE WAXING', 'Redness and irritation. Facial waxing can also cause mild redness and irritation temporarily after use.', 20, 90, 200, '1536218149.jfif', '1536218149.jfif', NULL, 'on', '2018-09-06', '2018-09-06', 'Both', '8,10'),
(25, 'ARMS + UNDERARMS WAXING', 'When getting your underarm area waxed, regular waxing reduces the growth rate of hairs in ... The hairs under your arm can be very noticeable even when short', 20, 90, 250, '1536218256.jfif', '1536218256.jfif', NULL, 'on', '2018-09-06', '2018-09-06', 'Both', '11,10'),
(27, 'FEET NAIL TREATMENTS', 'ail trim, shape, cuticle care, dead skin removal, scrub, moisture, polish', 21, 40, 80, '1536218575.jfif', '1536218575.jfif', NULL, 'on', '2018-09-06', '2018-09-06', 'Women', '12'),
(28, 'GEL REMOVAL', 'With any other nail service', 21, 10, 10, 'default.jpg', 'default.jpg', NULL, 'on', '2018-09-06', '2018-09-06', 'Women', '12'),
(29, 'TINTING', 'Eyelash  $25 Eyebrow  $15 Eyelash, eyebrow + brow wax  $55', 22, 50, 95, '1536218787.jfif', '1536218787.jfif', NULL, 'on', '2018-09-06', '2018-09-06', 'Women', '9,10'),
(30, 'SWEDISH MASSAGE', 'Muscles are soothed and skin is nourished in a natural skin balm, the perfect blend to nourish dry and sensitive skin.', 23, 60, 105, '1536218963.jfif', '1536218963.jfif', NULL, 'on', '2018-09-06', '2018-09-06', 'Men', '11,10'),
(31, 'DEEP TISSUE MASSAGE', 'Our deep tissue massage technique uses slower, more-forceful strokes to target the deeper layers of muscle and connective tissue, commonly to help with muscle damage from injuries', 23, 60, 140, '1536219051.jpg', '1536219051.jfif', NULL, 'on', '2018-09-06', '2018-09-06', 'Men', '11,10');

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
(19, 'FACIAL TREATMENTS', '1536217092.jpg', 'Beauty on Park Street specialises in Hydropeptide, Elizabeth Arden Pro, Babor, Priori and Omnilux LED Light facial treatments', 'on', '2018-09-06 06:58:12', '2018-09-06 06:58:12'),
(20, 'WAXING SERVICES', '1536217940.jfif', 'Here at Beauty On Park Street we strive to make your waxing treatment a comfortable one. All waxing services are performed using premium quality wax to create the highest of standards the beauty industry has to offer.', 'on', '2018-09-06 07:12:20', '2018-09-06 07:12:20'),
(21, 'NAIL TREATMENTS', '1536218364.jfif', 'Beauty on Park St. provides professional manicure and pedicure services that will give your hands and feet a fresh and healthy look. Our luxury hand and feet treatments are complimented with the best OPI GelColor products available. All manicures and pedicures are performed by our well trained beauty experts following strict hygienic standards.', 'on', '2018-09-06 07:19:24', '2018-09-06 12:32:55'),
(22, 'TINTING TREATMENTS', '1536218690.jfif', 'Beauty on Park Street beauty salon offers professional tinting services including eyebrow tinting and eyelash tinting.', 'on', '2018-09-06 07:24:50', '2018-09-06 07:24:50'),
(23, 'MASSAGE SERVICES', '1536218856.jfif', 'Focuses on pain relief for muscular stiffness and soreness. Perfect for helping existing injuries and aches or pain', 'on', '2018-09-06 07:27:36', '2018-09-06 07:27:36');

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
(2, '5b9604725f484.jfif', 'DER D image', '2018-09-10 05:43:14', '2018-09-10 05:43:14'),
(3, 'default.jpg', 'FOR TESTing', '2018-09-10 05:43:29', '2018-09-10 05:43:29');

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
(17, 'Parth87', 'Tparth8778@gmail.com', '$2y$10$oVAKecbgDaS5ZCbetRscS.gG78yf5JGLNUw1iKcG5XFxnBWSBXBCi', '7405458175', '1', NULL, NULL, '5b9361737d6b5.png', NULL, NULL, NULL, 'undefined', NULL, '', '2018-09-07 23:19:36', '2018-09-08 02:41:23'),
(18, 'divyaraj der ho', 'derdivyaraj1997@gmail.com', '$2y$10$Lhimsdi/OxrMXEa6rlwYWe9fKA7jNBUl1bRlBQNZARvZPCQWJcoZq', '1245781245', '1', NULL, 'null', NULL, NULL, NULL, '108382583541293003414', '87099c63-1bda-42aa-b91f-faaeccafd37b', '', '', '2018-09-07 23:24:36', '2018-09-08 07:22:16');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review_for_service`
--
ALTER TABLE `review_for_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salon_emp`
--
ALTER TABLE `salon_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `salon_master`
--
ALTER TABLE `salon_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services_tbl`
--
ALTER TABLE `services_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `service_cat`
--
ALTER TABLE `service_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `slider_tbl`
--
ALTER TABLE `slider_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  ADD CONSTRAINT `services_tbl_ibfk_1` FOREIGN KEY (`catID`) REFERENCES `service_cat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
