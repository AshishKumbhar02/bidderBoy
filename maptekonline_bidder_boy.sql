-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 01, 2023 at 02:33 PM
-- Server version: 5.7.43
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maptekonline_bidder_boy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rashidweb', 'admin@gmail.com', 'assets/admin/img/app/user2-160x160.jpg', '2022-12-26 15:49:41', '$2y$10$oDRWjfIdsPBf3839rgKeQuzviRIvPuRhrTg4uM9fukgCMGy8P4PC.', NULL, '2022-12-26 15:49:41', '2022-12-26 15:49:41'),
(2, 'Rashidmak', 'rashidk.developer@gmail.com', 'assets/admin/img/app/user2-160x160.jpg', '2022-12-26 15:49:41', '$2y$10$H5kESgkCrzDCRyWEMjCFFeQkM4TCNkgTwjp3UyPWQGBprJJ4xTpoO', NULL, '2022-12-26 15:49:41', '2022-12-26 15:49:41'),
(3, 'Test Admin', 'testadmin@gmail.com', 'assets/admin/img/app/user2-160x160.jpg', '2022-12-26 15:49:41', '$2y$10$H5kESgkCrzDCRyWEMjCFFeQkM4TCNkgTwjp3UyPWQGBprJJ4xTpoO', NULL, '2022-12-26 15:49:41', '2022-12-26 15:49:41'),
(4, 'Test Admin Yop', 'bidderadmin@yopmail.com', 'assets/admin/img/app/user2-160x160.jpg', '2022-12-26 15:49:41', '$2a$12$rGaFOpOo.rKz.Ygdoxob3u3vSpjIBSFmuDc7/p2R8YWHw7WHSpgO2', NULL, '2022-12-26 15:49:41', '2022-12-26 15:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `bid_amount` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `user_id`, `product_id`, `bid_amount`, `created_at`, `updated_at`) VALUES
(1, 20, 1, 20.00, '2023-08-09 23:09:48', '2023-08-09 23:09:48'),
(3, 19, 1, 20.00, '2023-08-10 15:24:49', '2023-08-10 15:24:49'),
(18, 19, 7, 20.00, '2023-08-12 11:41:09', '2023-08-12 11:41:09'),
(19, 19, 7, 20.00, '2023-08-12 11:41:21', '2023-08-12 11:41:21'),
(20, 19, 7, 20.00, '2023-08-12 11:41:58', '2023-08-12 11:41:58'),
(77, 20, 9, 10.00, '2023-08-16 21:53:30', '2023-08-16 21:53:30'),
(78, 20, 8, 10.00, '2023-08-16 23:01:20', '2023-08-16 23:01:20'),
(79, 20, 1, 10.00, '2023-08-16 23:02:01', '2023-08-16 23:02:01'),
(80, 20, 8, 10.00, '2023-08-16 23:04:04', '2023-08-16 23:04:04'),
(81, 20, 8, 10.00, '2023-08-16 23:10:51', '2023-08-16 23:10:51'),
(89, 19, 1, 10.00, '2023-08-17 12:00:43', '2023-08-17 12:00:43'),
(110, 19, 1, 10.00, '2023-08-19 10:29:40', '2023-08-19 10:29:40'),
(116, 20, 7, 10.00, '2023-08-19 16:53:33', '2023-08-19 16:53:33'),
(117, 19, 4, 10.00, '2023-08-19 17:47:50', '2023-08-19 17:47:50'),
(118, 19, 4, 20.00, '2023-08-19 17:48:00', '2023-08-19 17:48:00'),
(119, 19, 4, 30.00, '2023-08-19 17:48:21', '2023-08-19 17:48:21'),
(120, 19, 4, 40.00, '2023-08-19 17:48:28', '2023-08-19 17:48:28'),
(122, 20, 4, 20.00, '2023-08-21 21:09:04', '2023-08-21 21:09:04'),
(123, 20, 4, 10.00, '2023-08-21 21:10:05', '2023-08-21 21:10:05'),
(124, 20, 4, 10.00, '2023-08-21 22:01:59', '2023-08-21 22:01:59'),
(125, 20, 4, 10.00, '2023-08-21 22:17:04', '2023-08-21 22:17:04'),
(126, 20, 4, 10.00, '2023-08-21 22:20:17', '2023-08-21 22:20:17'),
(127, 20, 4, 10.00, '2023-08-21 22:24:30', '2023-08-21 22:24:30'),
(128, 20, 4, 10.00, '2023-08-21 22:26:36', '2023-08-21 22:26:36'),
(129, 20, 4, 10.00, '2023-08-21 23:01:52', '2023-08-21 23:01:52'),
(130, 20, 4, 10.00, '2023-08-21 23:05:20', '2023-08-21 23:05:20'),
(131, 20, 4, 20.00, '2023-08-21 23:05:39', '2023-08-21 23:05:39'),
(132, 20, 7, 10.00, '2023-08-21 23:06:07', '2023-08-21 23:06:07'),
(133, 20, 7, 20.00, '2023-08-21 23:06:35', '2023-08-21 23:06:35'),
(134, 20, 4, 10.00, '2023-08-21 23:09:35', '2023-08-21 23:09:35'),
(135, 20, 4, 10.00, '2023-08-21 23:11:02', '2023-08-21 23:11:02'),
(136, 20, 1, 10.00, '2023-08-21 23:47:50', '2023-08-21 23:47:50'),
(137, 20, 7, 10.00, '2023-08-21 23:47:57', '2023-08-21 23:47:57'),
(138, 20, 7, 10.00, '2023-08-21 23:48:46', '2023-08-21 23:48:46'),
(139, 20, 7, 10.00, '2023-08-21 23:50:26', '2023-08-21 23:50:26'),
(140, 20, 7, 10.00, '2023-08-22 05:21:34', '2023-08-22 05:21:34'),
(141, 20, 7, 20.00, '2023-08-22 05:21:48', '2023-08-22 05:21:48'),
(142, 20, 7, 10.00, '2023-08-22 05:24:36', '2023-08-22 05:24:36'),
(143, 20, 7, 10.00, '2023-08-22 05:25:09', '2023-08-22 05:25:09'),
(144, 20, 7, 20.00, '2023-08-22 05:25:16', '2023-08-22 05:25:16'),
(145, 20, 7, 30.00, '2023-08-22 05:25:27', '2023-08-22 05:25:27'),
(146, 20, 4, 10.00, '2023-08-23 00:35:25', '2023-08-23 00:35:25'),
(147, 20, 4, 10.00, '2023-08-23 00:55:48', '2023-08-23 00:55:48'),
(148, 20, 4, 10.00, '2023-08-23 01:07:32', '2023-08-23 01:07:32'),
(149, 22, 4, 20.00, '2023-08-23 01:07:41', '2023-08-23 01:07:41'),
(150, 22, 4, 30.00, '2023-08-23 01:08:11', '2023-08-23 01:08:11'),
(151, 20, 4, 40.00, '2023-08-23 01:08:22', '2023-08-23 01:08:22'),
(152, 22, 4, 10.00, '2023-08-23 01:20:14', '2023-08-23 01:20:14'),
(153, 22, 4, 10.00, '2023-08-23 01:29:08', '2023-08-23 01:29:08'),
(154, 22, 9, 10.00, '2023-08-23 01:29:16', '2023-08-23 01:29:16'),
(155, 22, 4, 10.00, '2023-08-23 01:32:11', '2023-08-23 01:32:11'),
(156, 20, 4, 20.00, '2023-08-23 01:32:51', '2023-08-23 01:32:51'),
(157, 22, 4, 30.00, '2023-08-23 01:33:12', '2023-08-23 01:33:12'),
(158, 22, 4, 10.00, '2023-08-23 01:35:16', '2023-08-23 01:35:16'),
(159, 20, 4, 20.00, '2023-08-23 01:35:27', '2023-08-23 01:35:27'),
(160, 22, 4, 30.00, '2023-08-23 01:36:09', '2023-08-23 01:36:09'),
(161, 22, 4, 10.00, '2023-08-23 01:37:22', '2023-08-23 01:37:22'),
(162, 22, 4, 10.00, '2023-08-23 01:38:13', '2023-08-23 01:38:13'),
(163, 22, 4, 10.00, '2023-08-23 01:39:03', '2023-08-23 01:39:03'),
(164, 22, 4, 10.00, '2023-08-23 01:54:33', '2023-08-23 01:54:33'),
(165, 15, 8, 10.00, '2023-08-23 02:42:45', '2023-08-23 02:42:45'),
(166, 15, 8, 10.00, '2023-08-23 02:42:55', '2023-08-23 02:42:55'),
(167, 15, 8, 10.00, '2023-08-23 02:43:12', '2023-08-23 02:43:12'),
(168, 20, 4, 10.00, '2023-08-23 05:27:09', '2023-08-23 05:27:09'),
(169, 19, 4, 10.00, '2023-08-24 16:43:24', '2023-08-24 16:43:24'),
(170, 19, 4, 10.00, '2023-08-25 20:12:52', '2023-08-25 20:12:52'),
(171, 19, 4, 10.00, '2023-08-26 17:34:15', '2023-08-26 17:34:15'),
(172, 15, 8, 10.00, '2023-08-30 01:36:36', '2023-08-30 01:36:36'),
(173, 15, 1, 10.00, '2023-08-31 02:34:52', '2023-08-31 02:34:52'),
(174, 15, 1, 10.00, '2023-08-31 02:35:30', '2023-08-31 02:35:30'),
(175, 15, 1, 10.00, '2023-08-31 02:39:33', '2023-08-31 02:39:33'),
(176, 19, 1, 10.00, '2023-08-31 02:43:45', '2023-08-31 02:43:45'),
(177, 15, 1, 20.00, '2023-08-31 02:44:00', '2023-08-31 02:44:00'),
(178, 19, 14, 12.00, '2023-08-30 21:49:05', '2023-08-30 21:49:05'),
(179, 19, 4, 10.00, '2023-08-31 03:19:24', '2023-08-31 03:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `bids_packs`
--

CREATE TABLE `bids_packs` (
  `id` int(11) NOT NULL,
  `package_name` varchar(225) NOT NULL,
  `total_credit` varchar(225) NOT NULL,
  `cost` varchar(225) NOT NULL,
  `image_path` varchar(225) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bids_packs`
--

INSERT INTO `bids_packs` (`id`, `package_name`, `total_credit`, `cost`, `image_path`, `created_at`, `updated_at`) VALUES
(21, '100 Bidderboy Credits', '100', '1', 'uploads/packs/7cZGMmyWGVIGxbbIdGWt8OqIycqenlHNgIUXXAxy.png', '2023-08-09 12:39:24', '2023-08-21 17:01:06'),
(22, '200 Bidderboy Credits', '200', '1950', 'uploads/packs/2DqIhUKpjOqcaj5NRq09RytMUUbVOqum1wwbKInv.png', '2023-08-14 15:43:32', '2023-08-17 12:16:38'),
(23, '300 Bidderboy Credits', '300', '2900', 'uploads/packs/Dfle3nC5LjVXIoMwg9wvkj3goVwcgZqC0M1crG9g.png', '2023-08-14 15:45:43', '2023-08-17 12:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `bid_discount_slabs`
--

CREATE TABLE `bid_discount_slabs` (
  `id` int(11) NOT NULL,
  `starting_bid` float DEFAULT NULL,
  `ending_bid` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid_discount_slabs`
--

INSERT INTO `bid_discount_slabs` (`id`, `starting_bid`, `ending_bid`, `discount`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 1000, 10, 1, NULL, NULL),
(2, 1001, 4000, 50, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business_settings`
--

CREATE TABLE `business_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `value` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_settings`
--

INSERT INTO `business_settings` (`id`, `name`, `value`) VALUES
(1, 'fast2sms_registration_otp', 'off'),
(2, 'kyc_verification', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Electronics'),
(2, 'Clothing, Shoes, and Jewelry'),
(3, 'Home and Kitchen'),
(4, 'Books'),
(5, 'Health and Household'),
(6, 'Beauty and Personal Care'),
(7, 'Toys and Games'),
(8, 'Sports and Outdoors'),
(9, 'Automotive'),
(10, 'Tools and Home Improvement'),
(11, 'Baby'),
(12, 'Pet Supplies'),
(13, 'Office Products'),
(14, 'Electronics Accessories'),
(15, 'Grocery and Gourmet Food'),
(16, 'Industrial and Scientific'),
(17, 'Movies, Music, and Games'),
(18, 'Handmade'),
(19, 'Digital Software'),
(20, 'Luggage and Travel Gear'),
(21, 'Arts and Crafts');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` text,
  `discount` decimal(10,2) NOT NULL,
  `discount_type` enum('percentage','fixed') NOT NULL,
  `valid_from` date NOT NULL,
  `valid_until` date NOT NULL,
  `total_usage` int(11) DEFAULT '0',
  `max_usage` int(11) DEFAULT '0',
  `is_enabled` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `description`, `discount`, `discount_type`, `valid_from`, `valid_until`, `total_usage`, `max_usage`, `is_enabled`, `created_at`, `updated_at`) VALUES
(1, 'SUMMER25', 'Summer Sale - 25% Off', 25.00, 'percentage', '2023-06-01', '2023-09-30', 101, 101, 1, '2023-08-24 15:35:52', '2023-08-24 16:04:32'),
(2, 'FALL10', 'Fall Discount - $10 Off', 10.00, 'fixed', '2023-08-01', '2023-09-30', 51, 100, 1, '2023-08-24 15:35:52', '2023-08-24 16:06:11'),
(9, 'FALL101', 'ad111', 11.00, 'percentage', '2023-08-01', '2023-08-31', 0, 100, 0, '2023-08-26 11:16:35', '2023-08-26 19:20:15'),
(10, 'TEST', 'test descrition', 10.00, 'percentage', '2023-08-01', '2023-08-31', 0, 100, 0, '2023-08-28 20:40:57', '2023-08-28 20:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `credits`
--

CREATE TABLE `credits` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `referred_id` int(11) NOT NULL COMMENT 'who registered',
  `credits` int(11) DEFAULT '0',
  `status` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credits`
--

INSERT INTO `credits` (`id`, `user_id`, `referred_id`, `credits`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 5, 10, '1', '2023-06-22 11:29:44', '2023-06-22 11:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frontend_settings`
--

CREATE TABLE `frontend_settings` (
  `id` int(11) NOT NULL,
  `contact_email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `contact_phone` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `system_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `facebook_url` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `twitter_url` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `youtube_url` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `linkedin_url` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `about_us` longtext CHARACTER SET utf8,
  `tips_and_tricks` longtext CHARACTER SET utf8,
  `terms_condition` longtext CHARACTER SET utf8,
  `privacy_policy` longtext CHARACTER SET utf8,
  `faqs` longtext CHARACTER SET utf8,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frontend_settings`
--

INSERT INTO `frontend_settings` (`id`, `contact_email`, `contact_phone`, `system_name`, `address`, `facebook_url`, `twitter_url`, `youtube_url`, `linkedin_url`, `about_us`, `tips_and_tricks`, `terms_condition`, `privacy_policy`, `faqs`, `created_at`, `updated_at`) VALUES
(1, 'bidderboy@gmail.com', '+91 9930887833', NULL, 'Mumbai - 400008, India.', 'https://www.facebook.com/', 'https://twitter.com/', 'https://in.linkedin.com/', 'https://in.linkedin.com/', '<p style=\"border-radius: 0px; margin-bottom: 10px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: Roboto; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; color: rgb(85, 85, 85); background-color: rgb(255, 255, 255);\"><span style=\"border-radius: 0px; font-weight: 700;\">About Bidderboy</span></p><p style=\"border-radius: 0px; margin-bottom: 10px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: Roboto; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; color: rgb(85, 85, 85); background-color: rgb(255, 255, 255);\">Welcome to Bidderboy, one of the best Indian online auction shopping venues on the Net! This web site is owned and operated by Bidderboy Corporation, an Indian enterprise founded by a group of seasoned investors; successful business persons from west region of India. We are specializing in import-export of bulk electronics products, e-commerce, entertainment shopping and premium brands distribution. We are operating from Surat (India) and London (United Kingdom)</p><p style=\"border-radius: 0px; margin-bottom: 10px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: Roboto; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; color: rgb(85, 85, 85); background-color: rgb(255, 255, 255);\">Bidderboy.com conducted it\'s 1st online auction on 1st December 2011. Since then we are proudly India\'s No-1 Online Auctioneer with 100k+ Registered Members</p><p style=\"border-radius: 0px; margin-bottom: 10px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: Roboto; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; color: rgb(85, 85, 85); background-color: rgb(255, 255, 255);\">We are also operating india\'s first online TV Shop&nbsp;<a href=\"http://www.tvdeal.in/\" target=\"_blank\" style=\"border-radius: 0px; border: 0px; font: inherit; vertical-align: baseline; transition: background-color 550ms cubic-bezier(0.45, 1, 0.32, 1) 0s, color 550ms cubic-bezier(0.45, 1, 0.32, 1) 0s; color: rgb(230, 126, 34); background-color: transparent; outline: 0px !important;\">TVDEAL.IN</a>&nbsp;You can buy branded LED , 3D TV, Smart TV at ever lowest prices in india.</p><p style=\"border-radius: 0px; margin-bottom: 10px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: Roboto; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; color: rgb(85, 85, 85); background-color: rgb(255, 255, 255);\">Bidderboy has introduced a completely new and funny way of online shopping. Why spending a fortune for a brand new product if you can get it with a huge discount? We give you the chance to get the products you dream about at amazing prices!</p><p style=\"border-radius: 0px; margin-bottom: 10px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: Roboto; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; color: rgb(85, 85, 85); background-color: rgb(255, 255, 255);\">Bidderboy.com is a new exciting auction website where you can win branded factory sealed new products at huge discounts up to 89% off. Look at our homepage to see what products are up for auction right now, and if something seems interesting, why not bid for it!</p><p style=\"border-radius: 0px; margin-bottom: 10px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: Roboto; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; color: rgb(85, 85, 85); background-color: rgb(255, 255, 255);\">Bidderboy gives an opportunity to those people who can\'t afford to purchase costly branded products, they can try our risk free auctions to win their desired products like Cars, Bikes, Smartphones, Laptop, Tablets &amp; branded watches.</p><p style=\"border-radius: 0px; margin-bottom: 10px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: Roboto; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; color: rgb(85, 85, 85); background-color: rgb(255, 255, 255);\">If you don’t win an auction, you will never have to walk away empty handed from Bidderboy because you can buy the product for a discount price using the Buy Now option. You\'ll never have to pay more than the Value Price (MRP) for any products on Bidderboy</p><p style=\"border-radius: 0px; margin-bottom: 10px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: Roboto; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; color: rgb(85, 85, 85); background-color: rgb(255, 255, 255);\">We will do our very best to provide you with great merchandise at the best possible price. We think you will find that mixing online auction competition into the \"joy of shopping\" makes it all even more fun at bidderboy.</p><p style=\"border-radius: 0px; margin-bottom: 10px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: Roboto; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; color: rgb(85, 85, 85); background-color: rgb(255, 255, 255);\"><span style=\"border-radius: 0px; font-weight: 700;\">Our Values</span></p><p style=\"border-radius: 0px; margin-bottom: 10px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: Roboto; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; color: rgb(85, 85, 85); background-color: rgb(255, 255, 255);\">Our main goal is giving fun to online shopping.&nbsp;We aim to achieve this objective through..</p><ul style=\"border-radius: 0px; margin-bottom: 10px; padding-left: 20px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: Roboto; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; list-style-type: disc; color: rgb(51, 51, 51); background-color: rgb(255, 255, 255);\"><li style=\"border-radius: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(85, 85, 85);\"><p style=\"border-radius: 0px; margin-bottom: 10px; border: 0px; font: inherit; vertical-align: baseline;\">An ethical bidding environment for our customers</p></li><li style=\"border-radius: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(85, 85, 85);\"><p style=\"border-radius: 0px; margin-bottom: 10px; border: 0px; font: inherit; vertical-align: baseline;\">Accurate product and pricing information</p></li><li style=\"border-radius: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(85, 85, 85);\"><p style=\"border-radius: 0px; margin-bottom: 10px; border: 0px; font: inherit; vertical-align: baseline;\">Quick responses to customer inquiries and problems</p></li><li style=\"border-radius: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(85, 85, 85);\"><p style=\"border-radius: 0px; margin-bottom: 10px; border: 0px; font: inherit; vertical-align: baseline;\">Highest standards for our customer’s privacy</p></li><li style=\"border-radius: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(85, 85, 85);\"><p style=\"border-radius: 0px; margin-bottom: 10px; border: 0px; font: inherit; vertical-align: baseline;\">Constant innovation and development of new features</p></li><li style=\"border-radius: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(85, 85, 85);\"><p style=\"border-radius: 0px; margin-bottom: 10px; border: 0px; font: inherit; vertical-align: baseline;\">Long-term relationship with our suppliers and partners</p></li><li style=\"border-radius: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(85, 85, 85);\"><p style=\"border-radius: 0px; margin-bottom: 10px; border: 0px; font: inherit; vertical-align: baseline;\">Dignity and respect among all the members of our team</p></li></ul>', '<h5 class=\"card-title fw-semibold\" style=\"margin-bottom: var(--bs-card-title-spacer-y);\">Tips &amp; Trick</h5><p><span style=\"color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\">&nbsp;</span><span style=\"color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span><br></p><p><span style=\"color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\"><br></span></p><p><span style=\"color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\">&nbsp;</span><span style=\"color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span><span style=\"color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\"><br></span></p><p><span style=\"color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\"><br></span></p><p><span style=\"color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\">&nbsp;</span><span style=\"color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span><span style=\"background-color: var(--bs-card-bg); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align); color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\">&nbsp;</span><span style=\"background-color: var(--bs-card-bg); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align); color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span><span style=\"color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\"><br></span></p>', '<p><span style=\"font-weight: 700; color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\">Terms</span><span style=\"color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\">&nbsp;</span><span style=\"color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span><br></p><p><span style=\"background-color: var(--bs-card-bg); text-align: var(--bs-body-text-align); font-weight: 700; color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\">Terms1</span><span style=\"color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\">&nbsp;</span><span style=\"color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p><p><span style=\"text-align: var(--bs-body-text-align); background-color: var(--bs-card-bg); font-weight: 700; color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\">Terms2</span><span style=\"color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\">&nbsp;</span><span style=\"color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span><span style=\"color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\"><br></span></p><p><span style=\"color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\">ad</span></p>', '<p><span style=\"color: rgb(16, 28, 84); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 16px; letter-spacing: 0.4px;\"><strong>Privacy&nbsp;</strong>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span><br></p>', '[{\"Hi How are you\":\"I am fine\"}]', NULL, NULL);

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `payment_id` varchar(30) DEFAULT NULL,
  `order_type` varchar(20) DEFAULT NULL,
  `order_status` varchar(20) DEFAULT NULL,
  `product_info` longtext,
  `payment_info` longtext,
  `coupon_info` longtext,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `discount`, `amount`, `payment_id`, `order_type`, `order_status`, `product_info`, `payment_info`, `coupon_info`, `created_at`, `updated_at`) VALUES
(1, 15, 199, 0, '199', '169341401215', 'product_purchase', 'pending', '{\"id\":4,\"product_title\":\"Test1\",\"product_subtitle\":\"512 GB, green Color\",\"category_id\":\"1\",\"retail_price\":199,\"amount_per_bid\":10,\"credit_per_bid\":\"2\",\"reset_time_bid\":\"50\",\"start_date_bid\":\"2023-08-22\",\"start_hour_bid\":\"1\",\"start_minute_bid\":\"28\",\"start_hour_auction\":\"24\",\"start_minute_auction\":\"0\",\"start_seconds_auction\":\"0\",\"delivery_information\":\"8-10 days\",\"shipping_charge\":\"50\",\"is_buynow\":1,\"description\":\"512 GB, blue Color\",\"image\":\"products\\/f0tDlD5Pyz7Q4kHGPcgA.jpg\",\"status\":\"0\",\"created_at\":\"2023-07-26 11:02:09\",\"updated_at\":\"2023-08-21 19:47:24\"}', NULL, 'null', '2023-08-30 16:46:52', '2023-08-30 16:46:52'),
(2, 15, 3399, 0, '3399', '169341410215', 'product_purchase', 'success', '{\"id\":1,\"product_title\":\"1500 Bidderboy Credits\",\"product_subtitle\":\"512 GB, red Color\",\"category_id\":\"19\",\"retail_price\":3399,\"amount_per_bid\":10,\"credit_per_bid\":\"20\",\"reset_time_bid\":\"30\",\"start_date_bid\":\"2023-07-26\",\"start_hour_bid\":\"20\",\"start_minute_bid\":\"56\",\"start_hour_auction\":\"40\",\"start_minute_auction\":\"50\",\"start_seconds_auction\":\"60\",\"delivery_information\":\"sas\",\"shipping_charge\":\"70\",\"is_buynow\":null,\"description\":\"512 GB, Gold Color\",\"image\":\"products\\/5cxiROaDcvSQEXrBoNRM.jpg\",\"status\":\"0\",\"created_at\":\"2023-07-23 13:52:24\",\"updated_at\":\"2023-07-28 17:57:06\"}', '[\"order_id=169341410215\",\"tracking_id=112988681577\",\"bank_ref_no=324291942850\",\"order_status=Success\",\"failure_message=\",\"payment_mode=Unified Payments\",\"card_name=UPI\",\"status_code=\",\"status_message=Success-NA-0\",\"currency=INR\",\"amount=1.00\",\"billing_name=RashidD\",\"billing_address=fsfsf1\",\"billing_city=Mumbai\",\"billing_state=Maharashtra\",\"billing_zip=400008\",\"billing_country=India\",\"billing_tel=91 42423423\",\"billing_email=rashidk.developer@gmail.com\",\"delivery_name=RashidD\",\"delivery_address=fsfsf1\",\"delivery_city=\",\"delivery_state=\",\"delivery_zip=\",\"delivery_country=\",\"delivery_tel=91 42423423\",\"merchant_param1=2\",\"merchant_param2=15\",\"merchant_param3=-\",\"merchant_param4=product_purchase\",\"merchant_param5=-\",\"vault=N\",\"offer_type=null\",\"offer_code=null\",\"discount_value=0.0\",\"mer_amount=1.00\",\"eci_value=\",\"retry=N\",\"response_code=\",\"billing_notes=\",\"trans_date=30\\/08\\/2023 22:20:22\",\"bin_country=\"]', 'null', '2023-08-30 16:48:22', '2023-08-30 16:48:22'),
(3, 15, 10000, 0, '10000', '169341429015', 'product_purchase', 'success', '{\"id\":14,\"product_title\":\"sony1\",\"product_subtitle\":null,\"category_id\":\"1\",\"retail_price\":10000,\"amount_per_bid\":12,\"credit_per_bid\":\"2\",\"reset_time_bid\":\"2\",\"start_date_bid\":\"2023-08-24\",\"start_hour_bid\":\"7\",\"start_minute_bid\":\"10\",\"start_hour_auction\":\"2\",\"start_minute_auction\":\"2\",\"start_seconds_auction\":\"2\",\"delivery_information\":\"de\",\"shipping_charge\":\"2\",\"is_buynow\":null,\"description\":\"test\",\"image\":\"products\\/Q7E1ikzPTzVmufExjCxa.jpg\",\"status\":\"0\",\"created_at\":\"2023-08-23 18:39:21\",\"updated_at\":\"2023-08-23 18:39:21\"}', '[\"order_id=169341429015\",\"tracking_id=112988683707\",\"bank_ref_no=324291948445\",\"order_status=Success\",\"failure_message=\",\"payment_mode=Unified Payments\",\"card_name=UPI\",\"status_code=\",\"status_message=Success-NA-0\",\"currency=INR\",\"amount=1.00\",\"billing_name=RashidD\",\"billing_address=fsfsf1\",\"billing_city=Mumbai\",\"billing_state=Maharashtra\",\"billing_zip=400008\",\"billing_country=India\",\"billing_tel=91 42423423\",\"billing_email=rashidk.developer@gmail.com\",\"delivery_name=RashidD\",\"delivery_address=fsfsf1\",\"delivery_city=\",\"delivery_state=\",\"delivery_zip=\",\"delivery_country=\",\"delivery_tel=91 42423423\",\"merchant_param1=3\",\"merchant_param2=15\",\"merchant_param3=-\",\"merchant_param4=product_purchase\",\"merchant_param5=-\",\"vault=N\",\"offer_type=null\",\"offer_code=null\",\"discount_value=0.0\",\"mer_amount=1.00\",\"eci_value=\",\"retry=N\",\"response_code=\",\"billing_notes=\",\"trans_date=30\\/08\\/2023 22:22:37\",\"bin_country=\"]', 'null', '2023-08-30 16:51:30', '2023-08-30 16:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `otp_attempts`
--

CREATE TABLE `otp_attempts` (
  `id` int(11) NOT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `attempts` int(10) UNSIGNED DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp_attempts`
--

INSERT INTO `otp_attempts` (`id`, `mobile_number`, `attempts`, `last_attempt_at`, `created_at`, `updated_at`) VALUES
(2, '+919930377481', 7, '2023-07-05 22:26:49', '2023-06-13 20:01:49', '2023-07-05 22:26:49'),
(3, '23423430377481', 1, '2023-06-15 19:36:18', '2023-06-15 19:36:18', '2023-06-15 19:36:18'),
(4, '67560377481', 1, '2023-06-15 20:08:49', '2023-06-15 20:08:49', '2023-06-15 20:08:49'),
(5, '4645630377481', 1, '2023-06-15 20:10:57', '2023-06-15 20:10:57', '2023-06-15 20:10:57'),
(6, '+919099066718', 1, '2023-06-22 14:02:45', '2023-06-22 14:02:45', '2023-06-22 14:02:45'),
(7, '+919727460520', 1, '2023-06-22 15:28:39', '2023-06-22 15:28:39', '2023-06-22 15:28:39'),
(8, '+919930377841', 1, '2023-07-05 22:30:55', '2023-07-05 22:30:55', '2023-07-05 22:30:55'),
(9, '+919004414417', 1, '2023-07-07 16:24:28', '2023-07-07 16:24:28', '2023-07-07 16:24:28'),
(10, '+919099999999', 1, '2023-07-11 22:14:34', '2023-07-11 22:14:34', '2023-07-11 22:14:34'),
(11, '+9142423423', 1, '2023-07-11 22:17:37', '2023-07-11 22:17:37', '2023-07-11 22:17:37'),
(12, '9597315838', 3, '2023-08-09 21:09:52', '2023-08-09 21:09:35', '2023-08-09 21:09:52'),
(13, '+919597315836', 2, '2023-08-22 19:29:37', '2023-08-22 19:29:07', '2023-08-22 19:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `product_subtitle` varchar(255) DEFAULT NULL,
  `category_id` varchar(10) DEFAULT NULL,
  `retail_price` float DEFAULT NULL,
  `amount_per_bid` float DEFAULT NULL,
  `credit_per_bid` varchar(20) DEFAULT NULL,
  `reset_time_bid` varchar(100) DEFAULT NULL,
  `start_date_bid` varchar(50) DEFAULT NULL,
  `start_hour_bid` varchar(50) DEFAULT NULL,
  `start_minute_bid` varchar(50) DEFAULT NULL,
  `start_hour_auction` varchar(50) DEFAULT NULL,
  `start_minute_auction` varchar(50) DEFAULT NULL,
  `start_seconds_auction` varchar(50) DEFAULT NULL,
  `delivery_information` varchar(255) DEFAULT NULL,
  `shipping_charge` longtext,
  `is_buynow` tinyint(4) DEFAULT '0',
  `description` longtext,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(225) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_title`, `product_subtitle`, `category_id`, `retail_price`, `amount_per_bid`, `credit_per_bid`, `reset_time_bid`, `start_date_bid`, `start_hour_bid`, `start_minute_bid`, `start_hour_auction`, `start_minute_auction`, `start_seconds_auction`, `delivery_information`, `shipping_charge`, `is_buynow`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '1500 Bidderboy Credits', '512 GB, red Color', '19', 3399, 10, '20', '30', '2023-07-26', '20', '56', '40', '50', '60', 'sas', '70', NULL, '512 GB, Gold Color', 'products/5cxiROaDcvSQEXrBoNRM.jpg', '0', '2023-07-23 13:52:24', '2023-07-28 17:57:06'),
(4, 'Test1', '512 GB, green Color', '1', 199, 10, '2', '50', '2023-08-22', '1', '28', '24', '0', '0', '8-10 days', '50', 1, '512 GB, blue Color', 'products/f0tDlD5Pyz7Q4kHGPcgA.jpg', '0', '2023-07-26 11:02:09', '2023-08-21 19:47:24'),
(7, '1300 Bidderboy Credits', '512 GB, pink Color', '19', 3399, 10, '20', '30', '2023-07-26', '20', '56', '40', '50', '60', 'divv', '70', NULL, '512 GB, Pink Color', 'products/HbT4DdyNShlN3bbERcZf.jpg', '0', '2023-07-26 17:28:06', '2023-07-28 17:57:20'),
(8, 'Test', '512 GB, gold Color', '1', 199, 10, '2', '10', '2023-08-31', '15', '1', '24', '0', '0', '8-10 days', '50', 1, '512 GB, green Color', 'products/CfyrxWS4eaNDug9VUGAe.jpg', '0', '2023-07-27 06:25:13', '2023-07-28 17:57:27'),
(9, '1500 Bidderboy Credits', '512 GB, red Color', '19', 3399, 10, '20', '30', '2023-07-26', '20', '56', '40', '50', '60', 'sas', '70', NULL, '512 GB, Gold Color', 'products/5cxiROaDcvSQEXrBoNRM.jpg', '0', '2023-08-12 07:46:04', '2023-08-12 07:46:12'),
(14, 'sony1', NULL, '1', 10000, 12, '2', '2', '2023-08-24', '7', '10', '2', '2', '2', 'de', '2', NULL, 'test', 'products/Q7E1ikzPTzVmufExjCxa.jpg', '0', '2023-08-23 18:39:21', '2023-08-23 18:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credits` int(11) DEFAULT '0',
  `kyc_document` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_document_verification` tinyint(4) NOT NULL DEFAULT '0',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `username`, `email`, `mobile_number`, `credits`, `kyc_document`, `kyc_document_verification`, `address`, `email_verified_at`, `password`, `remember_token`, `ip_address`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 'Dipak Patel', 'Dipak', 'Patel', 'dipak123', 'dipak@domoboy.com', '+91 9099066718', 10, '1687432744deadfella.png', 1, '111, ABC Tower, XYZ Road', NULL, '$2y$10$KLl5holH/NPplMMPvh0LPuQPkWD1PTugOVXwf47gmdj36hmbkDJgK', NULL, '01.102.103.104', 1, '2023-06-22 14:03:30', '2023-07-14 15:24:27'),
(7, 'Rashid Ansari', 'Rashid', 'Ansari', 'rashidweb10', 'rashidk.developer@gmail.com1', '+91 9930376765', 1000, NULL, 0, 'addddddddewqrwerwer', NULL, '$2y$10$l7FnYix6ARCqgIfoNwhaMuUp/NYhPb0TI/y.sGx91J87kC3yMz7Em', NULL, '110.224.126.125', 1, '2023-07-05 22:31:08', '2023-07-17 22:19:29'),
(15, 'RashidD AnsariA1', 'RashidD', 'AnsariA1', 'RashidWebB', 'rashidk.developer@gmail.com', '+91 42423423', 112, NULL, 0, 'fsfsf1', NULL, '$2y$10$H9l3xHlc9VzNo3k6H73gu.qXTF7KmH6KnMHP1GqzTvpm9wuvQ8wy2', NULL, '171.51.202.2', 1, '2023-07-11 22:17:48', '2023-08-31 02:44:00'),
(18, 'ABC XYZ', 'ABC', 'XYZ', 'abcd', 'abcd@domoboy.com', '9099066718', 0, NULL, 0, NULL, NULL, '$2y$10$LNsGLWWZKo1NYpePySoX9eH/uIX3UN6ToifoG7ARGhPZNu6yvpxA.', NULL, NULL, 0, '2023-07-19 09:35:27', '2023-07-19 09:35:27'),
(19, 'Vishal Patel', 'Vishal', 'Patel', 'vishalpatel', 'vishal@domoboy.com', '0000000000', 374, NULL, 0, 'abc', NULL, '$2y$10$XUpcVfAScm4OPN9Pt4r7ceHQS4GvrsKRCuJySnPShiuFTKw8Os11.', NULL, NULL, 1, '2023-07-22 11:11:34', '2023-08-31 03:19:24'),
(20, 'Test User', 'Test', 'User', 'testuser', 'testuser_dummy@yopmail.com', '9597315838', 618, NULL, 0, NULL, NULL, '$2a$12$sGh4O3ShQVpE5gkjkFciFOlaV0hH5AFced33lEWfkbq570A6vw4pa', NULL, NULL, 1, '2023-07-22 11:11:34', '2023-08-23 05:27:09'),
(21, 'amar jadhav', 'amar', 'jadhav', 'amarjadhav', 'amar@maptek.in', '9004414417', 0, NULL, 0, NULL, NULL, '$2y$10$rXGKGIQ2xzUKWNC.Gvl7c.bPIMO9ilyeZacXKIHkA2uVJ7sRjLkGG', NULL, NULL, 1, '2023-08-14 15:31:14', '2023-08-14 15:31:14'),
(22, 'Jk Arun', 'Jk', 'Arun', 'jkarun', 'jkarun@yopmail.com', '9597315818', 956, NULL, 0, NULL, NULL, '$2a$12$sGh4O3ShQVpE5gkjkFciFOlaV0hH5AFced33lEWfkbq570A6vw4pa', NULL, NULL, 1, '2023-07-22 11:11:34', '2023-08-23 01:54:33');

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
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `bids_packs`
--
ALTER TABLE `bids_packs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bid_discount_slabs`
--
ALTER TABLE `bid_discount_slabs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_settings`
--
ALTER TABLE `business_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credits`
--
ALTER TABLE `credits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `frontend_settings`
--
ALTER TABLE `frontend_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp_attempts`
--
ALTER TABLE `otp_attempts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `bids_packs`
--
ALTER TABLE `bids_packs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `bid_discount_slabs`
--
ALTER TABLE `bid_discount_slabs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `business_settings`
--
ALTER TABLE `business_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `credits`
--
ALTER TABLE `credits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontend_settings`
--
ALTER TABLE `frontend_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `otp_attempts`
--
ALTER TABLE `otp_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
