-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2019 at 02:22 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joker`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_desc` text COLLATE utf8mb4_unicode_ci,
  `about_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `about_title`, `about_desc`, `about_image`, `created_at`, `updated_at`) VALUES
(1, 'من نحن', '<p style=\"text-align: right;\"><strong>&nbsp; وصف عربى وصف عربى وصف عربى وصف عربى وصف عربىوصف عربى&nbsp;</strong></p>', 'about/1562081520.img4.jpg', '2019-05-19 10:53:44', '2019-07-02 13:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `alert_sites`
--

CREATE TABLE `alert_sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alert_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alert_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alert_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `area_name`, `shipping_area`, `area_active`, `delete_from_table`, `country_id`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'مدينه نصر', '50', 1, 0, 1, 1, '2019-05-14 04:10:53', '2019-05-14 04:10:53'),
(2, 'جازل', '500', 1, 0, 2, 2, '2019-05-14 04:32:02', '2019-05-14 04:32:02'),
(3, 'الزاوية الحمراء', '15', 1, 0, 1, 3, '2019-05-16 03:02:26', '2019-05-16 03:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `bank_sites`
--

CREATE TABLE `bank_sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Bank_owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Bank_number_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Bank_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Bank_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_sites`
--

INSERT INTO `bank_sites` (`id`, `Bank_name`, `Bank_owner`, `Bank_number_id`, `Bank_logo`, `Bank_active`, `delete_from_table`, `created_at`, `updated_at`) VALUES
(1, 'الأهلى', 'احمد', '#1254', 'bank/logo/1558426242.1.jpg', 1, 0, '2019-05-21 06:10:42', '2019-05-21 06:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `blog_sites`
--

CREATE TABLE `blog_sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Blog_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Blog_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Blog_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Blog_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Blog_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Blog_desctwo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Blog_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_sites`
--

INSERT INTO `blog_sites` (`id`, `Blog_name`, `Blog_link`, `Blog_desc`, `Blog_image`, `Blog_keywords`, `Blog_desctwo`, `Blog_active`, `delete_from_table`, `created_at`, `updated_at`) VALUES
(1, 'افضل شركات تصميم تطبيقات', 'افضل-شركات-تصميم-تطبيقات-الجوال-وبرمجة', '<p>افضل-شركات-تصميم-تطبيقات-الجوال-وبرمجة-تطبيقات-الهواتف-الذكية</p>', 'Blog/image/1558431524.8.jpg', 'تطبيقات,تصميم', 'افضل شركات تصميم تطبيقات الجوال وبرمجة تطبيقات الهواتف الذكية في مصر والسعودية والامارات والكويت والعالم العربي شركة تصميم وبرمجة تطبيقات 2019', 1, 0, '2019-05-21 07:38:44', '2019-05-21 07:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `cat_slug`, `cat_desc`, `cat_image`, `cat_active`, `delete_from_table`, `created_at`, `updated_at`) VALUES
(1, 'شنط فرنساوى', 'شنط-فرنساوى', 'شنط فرنساوى حديثه شنط فرنساوى حديثه', 'category/image/1561477773.c05858931.png', 1, 0, '2019-05-16 08:41:10', '2019-06-25 13:49:33'),
(2, 'شنط المانى', 'شنط-المانى', 'شنط المانى حديثه شنط المانى حديثه', 'category/image/1561477813.male-bag.png', 1, 0, '2019-05-29 06:46:03', '2019-06-25 13:50:13'),
(3, 'مدارس', 'mdars', 'ييي', 'category/image/1566584870.43.jpg', 1, 0, '2019-08-23 16:27:50', '2019-08-23 16:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `city_active`, `delete_from_table`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'القاهرة', 1, 0, 1, '2019-05-13 09:03:44', '2019-05-13 09:03:44'),
(2, 'جدة', 1, 0, 2, '2019-05-13 09:09:46', '2019-05-13 09:09:46'),
(3, 'الاقصر', 1, 0, 1, '2019-05-16 03:01:00', '2019-05-16 03:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `client_order_news`
--

CREATE TABLE `client_order_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_internal_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_types`
--

CREATE TABLE `client_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clienttyp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clienttyp_close_order` int(11) DEFAULT NULL,
  `clienttyp_cart` int(11) DEFAULT NULL,
  `clienttyp_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_types`
--

INSERT INTO `client_types` (`id`, `clienttyp_name`, `clienttyp_close_order`, `clienttyp_cart`, `clienttyp_active`, `delete_from_table`, `created_at`, `updated_at`) VALUES
(1, 'عميل مهم', NULL, 90, 1, 0, '2019-05-15 08:36:27', '2019-08-24 18:13:56'),
(2, 'عميل خاص', 2, 2, 1, 0, '2019-05-15 10:35:17', '2019-05-15 10:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `color_prosettings`
--

CREATE TABLE `color_prosettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settingcolor_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color_prosettings`
--

INSERT INTO `color_prosettings` (`id`, `color_name`, `settingcolor_active`, `delete_from_table`, `created_at`, `updated_at`) VALUES
(1, 'احمر', 1, 0, '2019-05-27 06:33:44', '2019-05-27 06:33:44'),
(2, 'اسود', 1, 0, '2019-05-27 06:34:12', '2019-05-27 06:34:12'),
(3, 'ازرق', 1, 0, '2019-05-27 06:34:23', '2019-05-27 06:34:23'),
(4, 'اخضر', 1, 0, '2019-06-19 12:39:13', '2019-06-19 12:39:13'),
(5, 'اصفر', 1, 0, '2019-07-20 11:06:50', '2019-07-20 11:06:50'),
(6, 'فضى', 1, 0, '2019-08-06 12:04:46', '2019-08-06 12:04:46'),
(7, 'لبنى', 1, 0, '2019-08-06 12:05:04', '2019-08-06 12:05:04'),
(8, 'نبيتى', 1, 0, '2019-08-06 12:05:21', '2019-08-06 12:05:21'),
(9, 'ابيض', 1, 0, '2019-08-06 12:05:38', '2019-08-06 12:05:38'),
(10, 'كشمير', 1, 0, '2019-08-06 12:06:55', '2019-08-06 12:06:55'),
(11, 'هافان', 1, 0, '2019-08-06 12:07:23', '2019-08-06 12:07:23'),
(12, 'كحلى', 1, 0, '2019-08-06 12:07:39', '2019-08-06 12:07:39');

-- --------------------------------------------------------

--
-- Table structure for table `comment_products`
--

CREATE TABLE `comment_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_rate` int(11) NOT NULL,
  `comment_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_show` int(11) NOT NULL DEFAULT '1',
  `comment_active` int(11) NOT NULL DEFAULT '1',
  `comment_deleted` int(11) NOT NULL DEFAULT '1',
  `product_id` bigint(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complain_sites`
--

CREATE TABLE `complain_sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `complain_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_mail` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain_image_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complain_image_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complain_image_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complain_replay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complain_replay_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complain_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complain_sites`
--

INSERT INTO `complain_sites` (`id`, `complain_name`, `complain_mail`, `complain_reason`, `complain_desc`, `complain_image_one`, `complain_image_two`, `complain_image_three`, `complain_replay`, `complain_replay_image`, `complain_active`, `delete_from_table`, `created_at`, `updated_at`) VALUES
(1, 'test', '', 'test', 'test', 'complain/image/1558431524.8.jpg', 'complain/image/1558431524.8.jpg', 'complain/image/1558431524.8.jpg', 'test', 'complain/image/1558440718.5.jpg', 1, 0, '2019-05-20 22:00:00', '2019-05-21 10:11:58'),
(2, 'Williamurbaf', 'raphaeRato@gmail.com', 'A new method of email distribution.', 'Ciao!  jokermms.com \r\n \r\nWe present \r\n \r\nSending your commercial offer through the feedback form which can be found on the sites in the contact partition. Contact form are filled in by our application and the captcha is solved. The advantage of this metho', NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-07-31 04:34:27', '2019-07-31 04:34:27'),
(3, 'HarlandBok', 'noreplymonkeydigital@gmail.com', 'Local SEO to boost local visibility', 'Hi there \r\nThe Local SEO package is built to rank local keywords for your local business in the google search and in google maps. We have researched for years what local SEO activities truly work and have put all in one single local SEO plan to accomplish', NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-28 19:53:14', '2019-08-28 19:53:14'),
(4, 'Paulaten', 'aps@aps.com', 'Drivesavers, the world\'s best data recovery company.', 'Lost data? We can help! We can recover data from any device no matter what the problem. We have a partnership with Western Digital, Hitachi, and Seagate. Please visit our website to learn more: https://drivesaversdatarecovery.com Or read our great Yelp an', NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-08-29 02:55:29', '2019-08-29 02:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `condition_sites`
--

CREATE TABLE `condition_sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `condition_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition_desc` text COLLATE utf8mb4_unicode_ci,
  `condition_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `condition_sites`
--

INSERT INTO `condition_sites` (`id`, `condition_title`, `condition_desc`, `condition_image`, `created_at`, `updated_at`) VALUES
(1, 'الشروط والاحكام', '<p style=\"text-align: right;\">&nbsp;<strong>وصف عربى&nbsp;وصف عربى&nbsp;وصف عربى&nbsp;وصف عربى</strong></p>', 'about/1562081486.img2.jpg', '2019-05-19 10:59:58', '2019-07-02 13:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `country_active`, `delete_from_table`, `created_at`, `updated_at`) VALUES
(1, 'مصر', 1, 0, '2019-05-13 08:26:33', '2019-05-13 08:26:33'),
(2, '', 1, 0, '2019-05-13 08:36:17', '2019-07-20 12:44:03'),
(3, 'الأمارات', 1, 0, '2019-05-13 08:36:31', '2019-05-13 08:36:31'),
(4, 'تونس', 2, 1, '2019-05-16 03:00:10', '2019-05-16 03:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `favourit_products`
--

CREATE TABLE `favourit_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favourit_products`
--

INSERT INTO `favourit_products` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-07-08 12:47:15', '2019-07-08 12:47:15'),
(2, 1, 2, '2019-07-08 12:48:02', '2019-07-08 12:48:02'),
(9, 1, 7, '2019-07-08 12:59:18', '2019-07-08 12:59:18');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_list` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `gallery_list`, `gallery_active`, `delete_from_table`, `created_at`, `updated_at`) VALUES
(1, 'gallery/image/1561559411.blog-2.jpg', 1, 0, '2019-06-26 12:30:11', '2019-06-26 12:30:11'),
(2, 'gallery/image/1561559470.desk.jpg', 1, 0, '2019-06-26 12:31:10', '2019-06-26 12:31:10'),
(3, 'gallery/image/1561559482.offer-4.jpg', 1, 0, '2019-06-26 12:31:22', '2019-06-26 12:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `user_address` text COLLATE utf8mb4_unicode_ci,
  `image_receipt` text COLLATE utf8mb4_unicode_ci,
  `invoice_status` int(11) NOT NULL DEFAULT '0',
  `invoice_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_number`, `order_id`, `user_id`, `total_price`, `country_id`, `city_id`, `area_id`, `user_address`, `image_receipt`, `invoice_status`, `invoice_active`, `delete_from_table`, `created_at`, `updated_at`) VALUES
(1, 5001, 1, 1, '140', NULL, NULL, NULL, NULL, NULL, 0, 1, 0, '2019-07-22 09:21:45', '2019-07-22 09:21:45'),
(2, 5002, 2, 1, '140', NULL, NULL, NULL, NULL, NULL, 0, 1, 0, '2019-07-22 09:21:52', '2019-07-22 09:21:52'),
(3, 5003, 3, 1, '140', NULL, NULL, NULL, NULL, NULL, 0, 1, 0, '2019-07-25 23:52:58', '2019-07-25 23:52:58'),
(4, 5004, 4, 1, '1400', NULL, NULL, NULL, NULL, NULL, 0, 1, 0, '2019-07-28 19:45:12', '2019-07-28 19:45:12'),
(5, 5001, 1, 1, '0', NULL, NULL, NULL, NULL, NULL, 0, 1, 0, '2019-08-06 08:56:12', '2019-08-06 08:56:12'),
(6, 5001, 1, 1, '154', NULL, NULL, NULL, NULL, NULL, 0, 1, 0, '2019-08-17 10:32:52', '2019-08-17 10:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_costs`
--

CREATE TABLE `invoice_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cost_id` int(11) NOT NULL,
  `cost_price` int(11) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_costs`
--

INSERT INTO `invoice_costs` (`id`, `cost_id`, `cost_price`, `order_id`, `created_at`, `updated_at`) VALUES
(2, 1, 35, 3, NULL, NULL),
(3, 2, 25, 1, NULL, NULL),
(4, 1, 35, 8, NULL, NULL);

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

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(2, 'default', '{\"displayName\":\"App\\\\Jobs\\\\ProcessOrderThumbnails\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessOrderThumbnails\",\"command\":\"O:31:\\\"App\\\\Jobs\\\\ProcessOrderThumbnails\\\":8:{s:8:\\\"\\u0000*\\u0000order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:25:\\\"App\\\\Order_internal_detail\\\";s:2:\\\"id\\\";i:109;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2019-08-30 11:50:22.310502\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1567165822, 1567165812),
(3, 'default', '{\"displayName\":\"App\\\\Jobs\\\\ProcessOrderThumbnails\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessOrderThumbnails\",\"command\":\"O:31:\\\"App\\\\Jobs\\\\ProcessOrderThumbnails\\\":8:{s:8:\\\"\\u0000*\\u0000order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:25:\\\"App\\\\Order_internal_detail\\\";s:2:\\\"id\\\";i:110;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2019-08-30 11:50:40.125028\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1567165840, 1567165830),
(4, 'default', '{\"displayName\":\"App\\\\Jobs\\\\ProcessOrderThumbnails\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessOrderThumbnails\",\"command\":\"O:31:\\\"App\\\\Jobs\\\\ProcessOrderThumbnails\\\":8:{s:8:\\\"\\u0000*\\u0000order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:25:\\\"App\\\\Order_internal_detail\\\";s:2:\\\"id\\\";i:111;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2019-08-30 11:54:01.879129\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1567166041, 1567166039),
(5, 'default', '{\"displayName\":\"App\\\\Jobs\\\\ProcessOrderThumbnails\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessOrderThumbnails\",\"command\":\"O:31:\\\"App\\\\Jobs\\\\ProcessOrderThumbnails\\\":8:{s:8:\\\"\\u0000*\\u0000order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:25:\\\"App\\\\Order_internal_detail\\\";s:2:\\\"id\\\";i:112;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2019-08-30 11:56:17.315091\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1567166177, 1567166174),
(6, 'default', '{\"displayName\":\"App\\\\Jobs\\\\ProcessOrderThumbnails\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\ProcessOrderThumbnails\",\"command\":\"O:31:\\\"App\\\\Jobs\\\\ProcessOrderThumbnails\\\":8:{s:8:\\\"\\u0000*\\u0000order\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":4:{s:5:\\\"class\\\";s:25:\\\"App\\\\Order_internal_detail\\\";s:2:\\\"id\\\";i:113;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:13:\\\"Carbon\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2019-08-30 12:10:51.770649\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1567167051, 1567167049);

-- --------------------------------------------------------

--
-- Table structure for table `main_stores`
--

CREATE TABLE `main_stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_stores`
--

INSERT INTO `main_stores` (`id`, `store_name`, `store_address`, `store_admin_name`, `store_active`, `delete_from_table`, `created_at`, `updated_at`) VALUES
(1, 'مخزن السلام', 'السلام', 'احمد', 1, 0, '2019-05-20 04:38:47', '2019-05-20 04:38:47'),
(2, 'الاستلام', 'دار الاسلام', 'محمود سيد', 1, 0, '2019-07-19 18:19:39', '2019-07-19 18:19:39');

-- --------------------------------------------------------

--
-- Table structure for table `metro_stations`
--

CREATE TABLE `metro_stations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Metroline_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Stations_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Stations_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metro_stations`
--

INSERT INTO `metro_stations` (`id`, `Metroline_name`, `Stations_name`, `Stations_active`, `delete_from_table`, `created_at`, `updated_at`) VALUES
(1, 'الخط الاول', 'السادات', 1, 1, '2019-05-14 09:11:32', '2019-05-14 09:11:32'),
(2, 'حلوان- المرج', 'دار السلام', 1, 0, '2019-08-23 18:43:26', '2019-08-23 18:43:26'),
(3, 'حلوان- المرج', 'الزهراء', 1, 0, '2019-08-23 18:43:46', '2019-08-23 18:43:46'),
(4, 'جيزه - منيب', 'البحوث', 1, 0, '2019-08-23 18:44:07', '2019-08-23 18:44:07');

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
(1, '2019_05_13_081548_create_web_site_settings_table', 1),
(3, '2019_05_13_114405_create_countries_table', 2),
(4, '2019_05_13_124725_create_cities_table', 3),
(5, '2019_05_14_075754_create_areas_table', 4),
(6, '2019_05_14_092453_create_order_types_table', 5),
(7, '2019_05_14_110534_create_product_styles_table', 6),
(8, '2019_05_14_125924_create_metro_stations_table', 7),
(10, '2019_05_15_101818_create_client_types_table', 8),
(11, '2019_05_16_101455_create_categories_table', 9),
(12, '2019_05_19_110218_create_shipping_companis_table', 10),
(13, '2019_05_19_110251_create_shipping_areas_table', 10),
(14, '2019_05_19_110304_create_shipping_phones_table', 10),
(15, '2019_05_19_124325_create_about_us_table', 11),
(16, '2019_05_19_125612_create_condition_sites_table', 12),
(17, '2019_05_19_130203_create_policy_sites_table', 13),
(18, '2019_05_20_073843_create_main_stores_table', 14),
(19, '2019_05_20_073922_create_store_phones_table', 14),
(21, '2019_05_20_091633_create_product_sizes_table', 15),
(22, '2019_05_20_103321_create_slider_sites_table', 16),
(23, '2019_05_20_120644_create_team_works_table', 17),
(24, '2019_05_21_074914_create_bank_sites_table', 18),
(25, '2019_05_21_091048_create_blog_sites_table', 19),
(26, '2019_05_21_103734_create_alert_sites_table', 20),
(27, '2019_05_21_112714_create_complain_sites_table', 21),
(32, '2019_05_22_124836_create_product_sites_table', 22),
(33, '2019_05_22_125102_create_product_colors_table', 22),
(34, '2019_05_22_125648_create_product_site_sizes_table', 22),
(35, '2019_05_22_125842_create_product_site_images_table', 22),
(36, '2019_05_22_130113_create_product_site_datas_table', 22),
(37, '2019_05_25_142328_create_permission_groups_table', 23),
(38, '2019_05_25_142345_create_permissions_table', 23),
(39, '2019_05_27_081925_create_color_prosettings_table', 24),
(41, '2019_05_27_125016_create_product_stores_table', 25),
(42, '2019_05_28_105126_create_stored_current_products_table', 26),
(43, '2019_06_02_082147_create_order_internals_table', 27),
(44, '2019_06_02_082730_create_order_internal_details_table', 27),
(45, '2019_06_12_145523_create_offer_products_table', 28),
(46, '2019_06_23_080200_create_client_order_news_table', 29),
(47, '2019_06_26_141232_create_galleries_table', 29),
(52, '2019_06_29_192135_create_order_sites_table', 30),
(53, '2019_06_29_192225_create_order_site_details_table', 30),
(55, '2019_07_07_150704_create_poster_sites_table', 31),
(56, '2019_07_08_143015_create_favourit_products_table', 32),
(57, '2019_07_13_175344_create_invoices_table', 33),
(58, '2019_07_21_073827_create_order_costs_table', 34),
(59, '2019_07_21_090257_create_invoice_costs_table', 35),
(60, '2019_08_30_074545_create_jobs_table', 36);

-- --------------------------------------------------------

--
-- Table structure for table `offer_products`
--

CREATE TABLE `offer_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_product` int(11) NOT NULL,
  `offer_date_from` date NOT NULL,
  `offer_date_to` date NOT NULL,
  `offer_count` int(11) NOT NULL,
  `offer_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_costs`
--

CREATE TABLE `order_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cost_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_costs`
--

INSERT INTO `order_costs` (`id`, `cost_name`, `cost_active`, `delete_from_table`, `created_at`, `updated_at`) VALUES
(1, 'شحن', 1, 0, '2019-08-23 18:44:46', '2019-08-23 18:44:46'),
(2, 'منازل', 1, 0, '2019-08-23 18:45:08', '2019-08-23 18:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_internals`
--

CREATE TABLE `order_internals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `order_admin_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_notes` text COLLATE utf8mb4_unicode_ci,
  `order_user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `order_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_internals`
--

INSERT INTO `order_internals` (`id`, `order_number`, `admin_id`, `order_date`, `order_admin_name`, `order_notes`, `order_user_id`, `status`, `order_active`, `delete_from_table`, `created_at`, `updated_at`) VALUES
(1, 1001, 1, '2019-08-28', 'sawa4', NULL, '2', 0, 1, 0, '2019-08-28 19:43:10', '2019-08-28 19:52:13'),
(2, 1002, 1, '2019-08-28', 'sawa4', NULL, '4', 0, 1, 0, '2019-08-28 19:57:37', '2019-08-28 20:11:46'),
(3, 1003, 1, '2019-08-28', 'sawa4', NULL, '2', 0, 1, 0, '2019-08-28 20:53:54', '2019-08-28 20:53:59'),
(4, 1004, 1, '2019-08-28', 'sawa4', NULL, '2', 0, 1, 0, '2019-08-28 20:54:07', '2019-08-28 20:54:13'),
(5, 1005, 1, '2019-08-28', 'sawa4', NULL, '2', 0, 1, 0, '2019-08-28 21:00:41', '2019-08-28 21:01:35'),
(6, 1006, 1, '2019-08-28', 'sawa4', NULL, '2', 0, 1, 0, '2019-08-28 21:07:40', '2019-08-28 21:07:51'),
(7, 1007, 1, '2019-08-28', 'sawa4', NULL, '2', 0, 1, 0, '2019-08-28 21:08:48', '2019-08-28 21:34:22'),
(8, 1008, 1, '2019-08-28', 'sawa4', NULL, '2', 0, 1, 0, '2019-08-28 21:14:12', '2019-08-28 21:14:19'),
(9, 1009, 1, '2019-08-28', 'sawa4', NULL, '3', 0, 1, 0, '2019-08-28 21:25:17', '2019-08-28 21:43:30'),
(10, 1010, 1, '2019-08-29', 'sawa4', NULL, '2', 0, 1, 0, '2019-08-29 11:43:31', '2019-08-29 12:35:26'),
(12, 1012, 1, '2019-08-29', 'sawa4', NULL, '18', 0, 1, 0, '2019-08-29 18:39:05', '2019-08-29 18:39:19'),
(13, 1013, 1, '2019-08-29', 'sawa4', NULL, '17', 0, 1, 0, '2019-08-29 18:39:12', '2019-08-29 18:39:34'),
(17, 1014, 1, '2019-08-29', 'sawa4', NULL, '3', 0, 1, 0, '2019-08-29 20:22:27', '2019-08-29 20:33:06'),
(18, 1015, 1, '2019-08-29', 'sawa4', NULL, '3', 0, 1, 0, '2019-08-29 20:26:22', '2019-08-29 20:35:02'),
(19, 1016, 1, '2019-08-30', 'sawa4', NULL, '2', 0, 1, 0, '2019-08-30 06:05:35', '2019-08-30 09:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_internal_details`
--

CREATE TABLE `order_internal_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stored_id` int(11) DEFAULT NULL,
  `prodect_id` int(11) DEFAULT NULL,
  `product_parcode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `style_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `number_size` int(11) DEFAULT NULL,
  `pro_count` int(11) DEFAULT NULL,
  `pro_price` int(11) DEFAULT NULL,
  `pro_price_total` int(11) DEFAULT NULL,
  `order_details_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `order_internal_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_sites`
--

CREATE TABLE `order_sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` int(11) NOT NULL,
  `order_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_product_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0',
  `order_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_site_details`
--

CREATE TABLE `order_site_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `style_id` int(11) DEFAULT NULL,
  `size_id` int(11) NOT NULL,
  `pro_count` int(11) NOT NULL,
  `pro_price` int(11) NOT NULL,
  `pro_total` int(11) DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_types`
--

CREATE TABLE `order_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_type_number` int(11) NOT NULL,
  `order_type_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_types`
--

INSERT INTO `order_types` (`id`, `order_type_name`, `order_type_number`, `order_type_active`, `delete_from_table`, `created_at`, `updated_at`) VALUES
(1, 'قطاعى', 5, 1, 0, '2019-05-14 03:50:39', '2019-08-24 16:45:40'),
(2, 'نص جمله', 10, 2, 0, '2019-05-27 04:39:00', '2019-08-08 15:30:11'),
(3, 'الجمله', 6, 1, 0, '2019-05-27 04:39:28', '2019-08-24 16:45:55'),
(4, 'جمله الجمله', 15, 1, 0, '2019-05-28 07:36:23', '2019-08-27 11:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `per_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `per_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `policy_sites`
--

CREATE TABLE `policy_sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `polic_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polic_desc` text COLLATE utf8mb4_unicode_ci,
  `polic_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policy_sites`
--

INSERT INTO `policy_sites` (`id`, `polic_title`, `polic_desc`, `polic_image`, `created_at`, `updated_at`) VALUES
(1, 'سياسة الاستخدام والخصوصية', '<p><strong>وصف عربى&nbsp;وصف عربى&nbsp;وصف عربى</strong></p>', 'about/1562081377.img5.jpg', '2019-05-19 11:08:00', '2019-07-02 13:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `poster_sites`
--

CREATE TABLE `poster_sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title1_poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link1_poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc1_poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2_poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link2_poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc2_poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title3_poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link3_poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc3_poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title4_poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link4_poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc4_poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1_poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2_poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3_poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4_poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `poster_sites`
--

INSERT INTO `poster_sites` (`id`, `title1_poster`, `link1_poster`, `desc1_poster`, `title2_poster`, `link2_poster`, `desc2_poster`, `title3_poster`, `link3_poster`, `desc3_poster`, `title4_poster`, `link4_poster`, `desc4_poster`, `image1_poster`, `image2_poster`, `image3_poster`, `image4_poster`, `created_at`, `updated_at`) VALUES
(1, 'الجوكر ممس', NULL, NULL, 'الجوكر', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'poster/1566673548.IMG_0020 copy.jpg', 'poster/1566673548.IMG_8441 copy.jpg', NULL, NULL, '2019-08-24 17:05:48', '2019-08-24 17:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `colors` int(11) DEFAULT NULL,
  `style_id` int(11) DEFAULT NULL,
  `color_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `colors`, `style_id`, `color_active`, `delete_from_table`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 1, 0, 1, NULL, NULL),
(2, 11, 1, 1, 0, 2, NULL, NULL),
(3, 9, 1, 1, 0, 3, NULL, NULL),
(4, 8, 1, 1, 0, 4, NULL, NULL),
(5, 2, 2, 1, 0, 5, NULL, NULL),
(6, 1, 1, 1, 0, 6, NULL, NULL),
(7, 1, 1, 1, 0, 7, NULL, NULL),
(8, 1, 2, 1, 0, 8, NULL, NULL),
(9, 1, 2, 1, 0, 9, NULL, NULL),
(10, 2, NULL, 1, 0, 10, NULL, NULL),
(11, 2, NULL, 1, 0, 11, NULL, NULL),
(12, 2, NULL, 1, 0, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_sites`
--

CREATE TABLE `product_sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slog` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_Purch_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_type_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_main_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sites`
--

INSERT INTO `product_sites` (`id`, `category_id`, `product_name`, `product_slog`, `product_Purch_price`, `price_type_value`, `product_desc`, `product_main_image`, `product_active`, `delete_from_table`, `created_at`, `updated_at`) VALUES
(1, 3, 'a', 'a', '10', '20', '41', 'product/image/1566648191.IMG_8439 copy.jpg', 2, 0, '2019-08-24 10:03:11', '2019-08-24 10:03:11'),
(2, 3, 'a1', 'a1', '10', '20', '552', 'product/image/1566648319.IMG_8440 copy.jpg', 2, 0, '2019-08-24 10:05:19', '2019-08-24 10:05:19'),
(3, 3, 'a2', 'a2', '10', '20', 'ddd', 'product/image/1566648424.IMG_8441 copy.jpg', 2, 0, '2019-08-24 10:07:04', '2019-08-24 10:07:04'),
(4, 3, 'a3', 'a3', '10', '20', 'ssss', 'product/image/1566648604.IMG_0015 copy.jpg', 2, 0, '2019-08-24 10:10:04', '2019-08-24 10:52:46'),
(5, 3, 'a4', 'a4', '10', '20', 'aa', 'product/image/1566651970.IMG_0016 copy.jpg', 2, 0, '2019-08-24 11:06:10', '2019-08-24 11:06:10'),
(6, 3, 'a5', 'a5', '10', '20', '225', 'product/image/1566652147.IMG_0017 copy.jpg', 2, 0, '2019-08-24 11:09:07', '2019-08-24 11:09:07'),
(7, 3, 'a7', 'a7', '10', '20', '45', 'product/image/1566652413.IMG_0021 copy.jpg', 2, 0, '2019-08-24 11:13:33', '2019-08-24 11:13:33'),
(8, 2, 'a6', 'a6', '10', '20', '262', 'product/image/1566652540.IMG_0019 copy.jpg', 2, 0, '2019-08-24 11:15:40', '2019-08-24 11:15:40'),
(9, 3, 'a8', 'a8', '10', '20', '12', 'product/image/1566652809.IMG_0015 copy.jpg', 2, 0, '2019-08-24 11:20:09', '2019-08-24 11:20:09'),
(10, 1, 'aaa', 'aaa', '9', '50', 'aaajjjjghjfhjfhgghgh', 'product/image/1567110678.IMG_1021.JPG', 2, 0, '2019-08-29 18:31:18', '2019-08-29 18:31:18'),
(11, 1, 'ggg', 'ggg', '5', '50', 'assd', 'product/image/1567111811.IMG_1052.JPG', 2, 0, '2019-08-29 18:50:11', '2019-08-29 18:50:11'),
(12, 1, 'vvv', 'vvv', '5', '50', 'asdf', 'product/image/1567117303.IMG_1014.JPG', 1, 0, '2019-08-29 20:21:43', '2019-08-29 20:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_site_datas`
--

CREATE TABLE `product_site_datas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Sector_price` int(11) NOT NULL,
  `Maximum_one` int(11) DEFAULT NULL,
  `Wholesale_price` int(11) NOT NULL,
  `Maximum_two` int(11) DEFAULT NULL,
  `Wholesale_price_two` int(11) NOT NULL,
  `Maximum_three` int(11) DEFAULT NULL,
  `Wholesale_price_three` int(11) NOT NULL,
  `Maximum_four` int(11) NOT NULL,
  `Main_bar_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Main_bar_code_two` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `store_id` int(11) NOT NULL,
  `datas_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_sizes_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_site_datas`
--

INSERT INTO `product_site_datas` (`id`, `Sector_price`, `Maximum_one`, `Wholesale_price`, `Maximum_two`, `Wholesale_price_two`, `Maximum_three`, `Wholesale_price_three`, `Maximum_four`, `Main_bar_code`, `Main_bar_code_two`, `color_id`, `store_id`, `datas_active`, `delete_from_table`, `product_id`, `product_sizes_id`, `created_at`, `updated_at`) VALUES
(1, 14, NULL, 12, NULL, 13, NULL, 11, 100, 'a1', '1a', 7, 1, 1, 0, 1, 12, NULL, NULL),
(2, 14, NULL, 12, NULL, 13, NULL, 11, 100, 'a0', '0a', 11, 1, 1, 0, 2, 12, NULL, NULL),
(3, 14, NULL, 12, NULL, 13, NULL, 11, 100, 'a4', NULL, 9, 1, 1, 0, 3, 12, NULL, NULL),
(4, 14, NULL, 12, NULL, 13, NULL, 11, 100, 'a4', NULL, 8, 1, 1, 0, 4, 12, NULL, NULL),
(5, 14, NULL, 12, NULL, 13, NULL, 11, 100, 'a5', NULL, 2, 1, 1, 0, 5, 12, NULL, NULL),
(6, 14, NULL, 12, NULL, 13, NULL, 11, 100, 'a6', NULL, 1, 1, 1, 0, 6, 12, NULL, NULL),
(7, 14, NULL, 12, NULL, 13, NULL, 11, 100, 'a8', NULL, 1, 1, 1, 0, 7, 12, NULL, NULL),
(8, 14, NULL, 12, NULL, 13, NULL, 11, 100, 'a7', NULL, 1, 1, 1, 0, 8, 13, NULL, NULL),
(9, 14, NULL, 12, NULL, 13, NULL, 11, 100, 's1', NULL, 1, 1, 1, 0, 9, 12, NULL, NULL),
(10, 25, NULL, 20, NULL, 23, NULL, 10, 50, 'aaa', 'aaa', 2, 1, 1, 0, 10, 13, NULL, NULL),
(11, 30, NULL, 20, NULL, 25, NULL, 10, 100, 'ggg', 'ggg', 2, 1, 1, 0, 11, 12, NULL, NULL),
(12, 15, NULL, 10, NULL, 12, NULL, 7, 100, 'vvv', 'vvv', 2, 1, 1, 0, 12, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_site_images`
--

CREATE TABLE `product_site_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_sizes_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_site_sizes`
--

CREATE TABLE `product_site_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_value_id` int(11) NOT NULL,
  `size_number` int(11) DEFAULT NULL,
  `size_value_open` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_color_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_site_sizes`
--

INSERT INTO `product_site_sizes` (`id`, `size_value_id`, `size_number`, `size_value_open`, `size_active`, `delete_from_table`, `product_id`, `product_color_id`, `created_at`, `updated_at`) VALUES
(1, 12, 40, 's', 1, 0, 1, 7, NULL, NULL),
(2, 12, 10, 's', 1, 0, 2, 11, NULL, NULL),
(3, 12, 20, 's', 1, 0, 3, 9, NULL, NULL),
(4, 12, 100, 's', 1, 0, 4, 8, NULL, NULL),
(5, 12, 20, 's', 1, 0, 5, 2, NULL, NULL),
(6, 12, 68, 's', 1, 0, 6, 1, NULL, NULL),
(7, 12, 66, 's', 1, 0, 7, 1, NULL, NULL),
(8, 13, 91, 's', 1, 0, 8, 1, NULL, NULL),
(9, 12, 20, 's', 1, 0, 9, 1, NULL, NULL),
(10, 13, 10, 's', 1, 0, 10, 2, NULL, NULL),
(11, 12, 200, 's', 1, 0, 11, 2, NULL, NULL),
(12, 12, 100, 's', 1, 0, 12, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settingsize_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `size_type`, `size_value`, `settingsize_active`, `delete_from_table`, `created_at`, `updated_at`) VALUES
(1, '1', 'ميديم', 1, 1, '2019-05-20 05:27:12', '2019-05-20 05:27:12'),
(2, '2', '42', 1, 1, '2019-05-20 05:27:42', '2019-05-20 05:27:42'),
(3, '1', 'اسمول', 1, 1, '2019-05-22 07:27:24', '2019-05-22 07:27:24'),
(4, '1', 'لارج', 1, 1, '2019-05-22 07:27:37', '2019-05-22 07:27:37'),
(5, '1', 'اكس لارج', 1, 1, '2019-05-22 07:27:55', '2019-05-22 07:27:55'),
(6, '1', 'اكس اكس لارج', 1, 1, '2019-05-22 07:28:06', '2019-05-22 07:28:06'),
(7, '2', '22', 1, 1, '2019-05-22 07:28:22', '2019-05-22 07:28:22'),
(8, '2', '24', 1, 1, '2019-05-22 07:28:32', '2019-05-22 07:28:32'),
(9, '2', '26', 1, 1, '2019-05-22 07:28:46', '2019-05-22 07:28:46'),
(10, '2', '28', 1, 1, '2019-05-22 07:28:59', '2019-05-22 07:28:59'),
(11, '2', '30', 1, 1, '2019-05-22 07:29:15', '2019-05-22 07:29:26'),
(12, '1', 'صغير', 1, 0, '2019-08-06 12:10:01', '2019-08-06 12:10:57'),
(13, '1', 'وسط', 1, 0, '2019-08-06 12:10:38', '2019-08-06 12:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_stores`
--

CREATE TABLE `product_stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `style_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `size_number` int(11) DEFAULT NULL,
  `Drawn` int(11) NOT NULL DEFAULT '0',
  `current` int(11) NOT NULL DEFAULT '0',
  `stores_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_stores`
--

INSERT INTO `product_stores` (`id`, `color_id`, `style_id`, `size_id`, `size_number`, `Drawn`, `current`, `stores_active`, `delete_from_table`, `product_id`, `store_id`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 12, 50, 10, 40, 1, 0, 1, 1, NULL, NULL),
(2, 11, 1, 12, 10, 0, 10, 1, 0, 2, 1, NULL, NULL),
(3, 9, 1, 12, 20, 0, 20, 1, 0, 3, 1, NULL, NULL),
(4, 8, 1, 12, 100, 0, 100, 1, 0, 4, 1, NULL, NULL),
(5, 2, 2, 12, 20, 0, 20, 1, 0, 5, 1, NULL, NULL),
(6, 1, 1, 12, 68, 0, 68, 1, 0, 6, 1, NULL, NULL),
(7, 1, 1, 12, 66, 0, 66, 1, 0, 7, 1, NULL, NULL),
(8, 1, 2, 13, 91, 0, 91, 1, 0, 8, 1, NULL, NULL),
(9, 1, 2, 12, 20, 0, 20, 1, 0, 9, 1, NULL, NULL),
(10, 2, NULL, 13, 10, 0, 10, 1, 0, 10, 1, NULL, NULL),
(11, 2, NULL, 12, 100, 0, 200, 1, 0, 11, 1, NULL, NULL),
(12, 2, NULL, 12, 100, 0, 100, 1, 0, 12, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_styles`
--

CREATE TABLE `product_styles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `settingstyle_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `settingstyle_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settingstyle_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_styles`
--

INSERT INTO `product_styles` (`id`, `settingstyle_desc`, `settingstyle_image`, `settingstyle_active`, `delete_from_table`, `created_at`, `updated_at`) VALUES
(1, 'شكل مربع', 'product/settingstyle/1557834686.4.jpg', 1, 0, '2019-05-14 07:51:26', '2019-05-22 08:18:50'),
(2, 'شكل دائرى', 'product/settingstyle/1558520455.chair.jpg', 1, 0, '2019-05-22 08:20:55', '2019-05-22 08:20:55');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_areas`
--

CREATE TABLE `shipping_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_id` bigint(20) UNSIGNED NOT NULL,
  `ship_area_id` bigint(20) UNSIGNED NOT NULL,
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `ship_area_active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_areas`
--

INSERT INTO `shipping_areas` (`id`, `shipping_id`, `ship_area_id`, `delete_from_table`, `ship_area_active`, `created_at`, `updated_at`) VALUES
(9, 1, 1, 0, 1, NULL, NULL),
(10, 1, 2, 0, 1, NULL, NULL),
(11, 2, 1, 0, 1, NULL, NULL),
(12, 2, 3, 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_companis`
--

CREATE TABLE `shipping_companis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ship_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_companis`
--

INSERT INTO `shipping_companis` (`id`, `ship_name`, `ship_address`, `ship_admin_name`, `ship_image`, `ship_active`, `delete_from_table`, `created_at`, `updated_at`) VALUES
(1, 'شركة جديدة', 'الشروق', 'الشروق جروب', 'shipping/image/1558268963.4.jpg', 1, 0, '2019-05-19 09:37:24', '2019-05-19 10:29:23'),
(2, 'test', 'test', 'test', 'shipping/image/1558269332.5.jpg', 1, 0, '2019-05-19 09:38:15', '2019-05-19 10:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_phones`
--

CREATE TABLE `shipping_phones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_id` bigint(20) UNSIGNED NOT NULL,
  `ship_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `ship_phone_active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_phones`
--

INSERT INTO `shipping_phones` (`id`, `shipping_id`, `ship_phone`, `delete_from_table`, `ship_phone_active`, `created_at`, `updated_at`) VALUES
(5, 1, '1142937286', 0, 1, NULL, NULL),
(6, 1, '145252523', 1, 1, NULL, NULL),
(7, 2, '011253625', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider_sites`
--

CREATE TABLE `slider_sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_desc` text COLLATE utf8mb4_unicode_ci,
  `slider_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_sites`
--

INSERT INTO `slider_sites` (`id`, `slider_title`, `slider_desc`, `slider_link`, `slider_image`, `slider_active`, `delete_from_table`, `created_at`, `updated_at`) VALUES
(1, 'اهلا بكم', 'اهلا بكم اهلا بكم اهلا بكم اهلا بكم', 'https://en-gb.facebook.com/', 'slid/add/1561389797.male-bag.png', 1, 0, '2019-05-20 08:50:55', '2019-06-24 13:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `stored_current_products`
--

CREATE TABLE `stored_current_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pro_store_id` bigint(20) UNSIGNED NOT NULL,
  `new_current` int(11) NOT NULL,
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stored_current_products`
--

INSERT INTO `stored_current_products` (`id`, `pro_store_id`, `new_current`, `delete_from_table`, `created_at`, `updated_at`) VALUES
(1, 3, 100, 0, '2019-08-17 12:22:57', '2019-08-17 12:22:57'),
(2, 3, 500, 0, '2019-08-17 12:23:21', '2019-08-17 12:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `store_phones`
--

CREATE TABLE `store_phones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `stor_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `stor_phone_active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_phones`
--

INSERT INTO `store_phones` (`id`, `store_id`, `stor_phone`, `delete_from_table`, `stor_phone_active`, `created_at`, `updated_at`) VALUES
(1, 1, '01142937288', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team_works`
--

CREATE TABLE `team_works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_works`
--

INSERT INTO `team_works` (`id`, `team_name`, `team_position`, `team_image`, `team_active`, `delete_from_table`, `created_at`, `updated_at`) VALUES
(1, 'eslam', 'php', 'TeamWork/image/1558355098.3.jpg', 1, 0, '2019-05-20 10:24:58', '2019-05-20 10:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_secondname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `user_address` text COLLATE utf8mb4_unicode_ci,
  `clienttyp_id` int(11) DEFAULT NULL,
  `time_close` int(11) DEFAULT NULL,
  `time_cart` int(11) DEFAULT NULL,
  `payment_methoud` int(11) DEFAULT NULL,
  `user_social_id` text COLLATE utf8mb4_unicode_ci,
  `permission_id` int(11) DEFAULT NULL,
  `user_photo` text COLLATE utf8mb4_unicode_ci,
  `user_type` int(11) NOT NULL,
  `user_active` int(11) NOT NULL DEFAULT '1',
  `delete_from_table` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_secondname`, `email`, `email_verified_at`, `password`, `user_phone`, `country_id`, `city_id`, `area_id`, `user_address`, `clienttyp_id`, `time_close`, `time_cart`, `payment_methoud`, `user_social_id`, `permission_id`, `user_photo`, `user_type`, `user_active`, `delete_from_table`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sawa4', 'admin', 'admin@admin.com', NULL, '$2y$10$VYMy1/cgA21aFr9zAEOXSONahG4gtLfljPAVu7w2kKvhI6L6a2UJS', '01142937288', 1, 1, 1, 'الحى السابع , مدينه نصر ,  القاهرة', 1, NULL, 1, NULL, NULL, 1, 'user/images/1558008799.3.jpg', 1, 1, 0, 'PSN6I6QuHkrYaCxbTFFoUqG4a89up23yaNqTHYmayy1MIGFSeSKdDxMPI3HF', '2019-05-15 22:00:00', '2019-07-08 12:18:59'),
(2, 'eslam', 'ahmed', 'eslamzeka15@gmail.com', NULL, '$2y$10$q9N.QnMSDWw7jpfCBTAWDezvJSdUxefcK6SKhTqlfkhR1j66fQv/e', '01142937288', 1, 1, 1, 'nasr city', 1, NULL, 3, 1, '#25413', NULL, 'user/images/1559127036.MAIN-IMAGE-GettyImages-923757908.jpg', 2, 1, 0, NULL, '2019-05-29 08:50:36', '2019-05-29 08:50:36'),
(3, 'khaled', 'ahmed', 'khaled@info.com', NULL, '$2y$10$qWEXFfKvQAeecPig2vRm6O.rtq0UezMhJKYs3rTxR2UQ.9l6GdkSC', '01142937255', 2, 2, 2, 'gada', 2, 2, 2, 1, '#2424', NULL, 'user/images/1559127130.MAIN-IMAGE-GettyImages-923757908.jpg', 2, 1, 0, 'isvq2irPbBclIs6LUGUkDKqtHOuMo7YNubqtjBCzyhnsrnIw222krF7n2aMx', '2019-05-29 08:52:10', '2019-05-29 08:52:10'),
(4, 'zyiad', NULL, 'ziyad@info.com', NULL, '$2y$10$jIxt0Qdhr.hJsB1D89tz7uehpoCRK.3wqd.P7XhGuMGXh3HHo1gNu', '01029343545', 1, 1, 1, 'الحى السابع', 2, 2, 2, 1, NULL, NULL, 'uploaduser/images/1561477072.mockup.jpg', 2, 1, 0, '61Mil2ivrIC0ra2UuzfUfCx3M40lr1Yua3qnojhVYK24ugKA01W1PrITjtP3', '2019-06-25 13:37:52', '2019-07-08 11:01:27'),
(5, 'kareem gamil', NULL, 'k@k.com', NULL, '$2y$10$6zjT9kiJQE3E4pqZjUVNJ.YjIUUaPqqDi2NcHmLdQ58kQNLeYFPNS', '01006478442', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'user/images/1564902436.149-512.png', 1, 1, 0, NULL, '2019-08-04 05:07:16', '2019-08-04 05:08:18'),
(6, 'ياسر عب', NULL, 'null', NULL, '123456', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, NULL, '2019-08-06 17:16:07', '2019-08-06 17:16:07'),
(7, 'عميل الاختبار', NULL, 'null', NULL, '123456', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, NULL, '2019-08-07 05:55:26', '2019-08-07 05:55:26'),
(8, 'fgfggd', NULL, 'null', NULL, '123456', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, NULL, '2019-08-22 10:54:05', '2019-08-22 10:54:05'),
(9, 'eslam', NULL, 'null', NULL, '123456', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, NULL, '2019-08-22 10:55:00', '2019-08-22 10:55:00'),
(10, 'eslam', NULL, 'null', NULL, '123456', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, NULL, '2019-08-22 10:55:14', '2019-08-22 10:55:14'),
(11, 'eslam', NULL, 'null', NULL, '123456', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, NULL, '2019-08-22 10:55:52', '2019-08-22 10:55:52'),
(12, 'sdsd', NULL, 'null', NULL, '123456', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, NULL, '2019-08-22 11:00:02', '2019-08-22 11:00:02'),
(13, 'sdsd', NULL, 'null', NULL, '123456', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, NULL, '2019-08-22 11:00:05', '2019-08-22 11:00:05'),
(14, 'df', NULL, 'null', NULL, '123456', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, NULL, '2019-08-22 11:00:37', '2019-08-22 11:00:37'),
(15, 'cv', NULL, 'null', NULL, '123456', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, NULL, '2019-08-22 11:01:48', '2019-08-22 11:01:48'),
(16, 'dfdf', NULL, 'null', NULL, '123456', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, NULL, '2019-08-22 11:13:11', '2019-08-22 11:13:11'),
(17, 'اسماعيل', NULL, 'null', NULL, '123456', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, NULL, '2019-08-22 11:28:30', '2019-08-22 11:28:30'),
(18, '7ook', NULL, 'null', NULL, '123456', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, NULL, '2019-08-22 11:28:46', '2019-08-22 11:28:46'),
(19, 'ahmed', NULL, 'bexepoxe@it-simple.net', NULL, '$2y$10$oWoN1Gk.actLlfi6x9tK9.VEgI7CD/TDn6NGfVntfEZ9VweoE5Nl6', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, NULL, '2019-08-28 19:17:30', '2019-08-28 19:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `web_site_settings`
--

CREATE TABLE `web_site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sit_title_ar` text COLLATE utf8mb4_unicode_ci,
  `sit_address_ar` text COLLATE utf8mb4_unicode_ci,
  `sit_phone` text COLLATE utf8mb4_unicode_ci,
  `sit_mail` text COLLATE utf8mb4_unicode_ci,
  `sit_open_ar` text COLLATE utf8mb4_unicode_ci,
  `sit_mony` text COLLATE utf8mb4_unicode_ci,
  `sit_footer_desc_ar` text COLLATE utf8mb4_unicode_ci,
  `sit_logo_ar` text COLLATE utf8mb4_unicode_ci,
  `sit_logofooter_ar` text COLLATE utf8mb4_unicode_ci,
  `sit_favicon` text COLLATE utf8mb4_unicode_ci,
  `sit_desc_ar` text COLLATE utf8mb4_unicode_ci,
  `sit_keywords_ar` text COLLATE utf8mb4_unicode_ci,
  `facebook` text COLLATE utf8mb4_unicode_ci,
  `twitter` text COLLATE utf8mb4_unicode_ci,
  `google` text COLLATE utf8mb4_unicode_ci,
  `youtuob` text COLLATE utf8mb4_unicode_ci,
  `instgram` text COLLATE utf8mb4_unicode_ci,
  `snapchat` text COLLATE utf8mb4_unicode_ci,
  `linked` text COLLATE utf8mb4_unicode_ci,
  `whatsapp` text COLLATE utf8mb4_unicode_ci,
  `lat` text COLLATE utf8mb4_unicode_ci,
  `lng` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_site_settings`
--

INSERT INTO `web_site_settings` (`id`, `sit_title_ar`, `sit_address_ar`, `sit_phone`, `sit_mail`, `sit_open_ar`, `sit_mony`, `sit_footer_desc_ar`, `sit_logo_ar`, `sit_logofooter_ar`, `sit_favicon`, `sit_desc_ar`, `sit_keywords_ar`, `facebook`, `twitter`, `google`, `youtuob`, `instgram`, `snapchat`, `linked`, `whatsapp`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(1, 'الجوكر لتجارة الشنط', 'الدقى والقاهرة', '01142937288', 'aljoker@info.com', '24 ساعه عمل', 'جنيه مصرى', 'وصف فوتر عربى وصف فوتر عربى', 'setting/logo/1560419569.eljokermems.jpg', 'setting/logo/1560419569.eljokermems.jpg', 'setting/logo/1557739405.favicon.png', 'Meta description Arabic Meta description Arabic', 'متجر,الكترونى,fghgf', '#', '#', '#', '#', '#', '#', '#', '#', '30.041037733868787', '31.197599885041654', '2019-05-13 03:21:31', '2019-07-21 13:35:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alert_sites`
--
ALTER TABLE `alert_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `areas_country_id_foreign` (`country_id`),
  ADD KEY `areas_city_id_foreign` (`city_id`);

--
-- Indexes for table `bank_sites`
--
ALTER TABLE `bank_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_sites`
--
ALTER TABLE `blog_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `client_order_news`
--
ALTER TABLE `client_order_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_order_news_order_internal_id_foreign` (`order_internal_id`);

--
-- Indexes for table `client_types`
--
ALTER TABLE `client_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_prosettings`
--
ALTER TABLE `color_prosettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_products`
--
ALTER TABLE `comment_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `complain_sites`
--
ALTER TABLE `complain_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `condition_sites`
--
ALTER TABLE `condition_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourit_products`
--
ALTER TABLE `favourit_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_costs`
--
ALTER TABLE `invoice_costs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_costs_order_id_foreign` (`order_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`(191));

--
-- Indexes for table `main_stores`
--
ALTER TABLE `main_stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metro_stations`
--
ALTER TABLE `metro_stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_products`
--
ALTER TABLE `offer_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_costs`
--
ALTER TABLE `order_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_internals`
--
ALTER TABLE `order_internals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_internal_details`
--
ALTER TABLE `order_internal_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_internal_details_order_internal_id_foreign` (`order_internal_id`);

--
-- Indexes for table `order_sites`
--
ALTER TABLE `order_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_site_details`
--
ALTER TABLE `order_site_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_site_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_types`
--
ALTER TABLE `order_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_per_id_foreign` (`per_id`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy_sites`
--
ALTER TABLE `policy_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poster_sites`
--
ALTER TABLE `poster_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_sites`
--
ALTER TABLE `product_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_site_datas`
--
ALTER TABLE `product_site_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_site_images`
--
ALTER TABLE `product_site_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_site_sizes`
--
ALTER TABLE `product_site_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_stores`
--
ALTER TABLE `product_stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_stores_product_id_foreign` (`product_id`),
  ADD KEY `product_stores_store_id_foreign` (`store_id`);

--
-- Indexes for table `product_styles`
--
ALTER TABLE `product_styles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_areas`
--
ALTER TABLE `shipping_areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_areas_shipping_id_foreign` (`shipping_id`),
  ADD KEY `shipping_areas_ship_area_id_foreign` (`ship_area_id`);

--
-- Indexes for table `shipping_companis`
--
ALTER TABLE `shipping_companis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_phones`
--
ALTER TABLE `shipping_phones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_phones_shipping_id_foreign` (`shipping_id`);

--
-- Indexes for table `slider_sites`
--
ALTER TABLE `slider_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stored_current_products`
--
ALTER TABLE `stored_current_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stored_current_products_pro_store_id_foreign` (`pro_store_id`);

--
-- Indexes for table `store_phones`
--
ALTER TABLE `store_phones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_phones_store_id_foreign` (`store_id`);

--
-- Indexes for table `team_works`
--
ALTER TABLE `team_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_site_settings`
--
ALTER TABLE `web_site_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alert_sites`
--
ALTER TABLE `alert_sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bank_sites`
--
ALTER TABLE `bank_sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_sites`
--
ALTER TABLE `blog_sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client_order_news`
--
ALTER TABLE `client_order_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_types`
--
ALTER TABLE `client_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `color_prosettings`
--
ALTER TABLE `color_prosettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment_products`
--
ALTER TABLE `comment_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complain_sites`
--
ALTER TABLE `complain_sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `condition_sites`
--
ALTER TABLE `condition_sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `favourit_products`
--
ALTER TABLE `favourit_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoice_costs`
--
ALTER TABLE `invoice_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `main_stores`
--
ALTER TABLE `main_stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `metro_stations`
--
ALTER TABLE `metro_stations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `offer_products`
--
ALTER TABLE `offer_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_costs`
--
ALTER TABLE `order_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_internals`
--
ALTER TABLE `order_internals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_internal_details`
--
ALTER TABLE `order_internal_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `order_sites`
--
ALTER TABLE `order_sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_site_details`
--
ALTER TABLE `order_site_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_types`
--
ALTER TABLE `order_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policy_sites`
--
ALTER TABLE `policy_sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `poster_sites`
--
ALTER TABLE `poster_sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_sites`
--
ALTER TABLE `product_sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_site_datas`
--
ALTER TABLE `product_site_datas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_site_images`
--
ALTER TABLE `product_site_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_site_sizes`
--
ALTER TABLE `product_site_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_stores`
--
ALTER TABLE `product_stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_styles`
--
ALTER TABLE `product_styles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_areas`
--
ALTER TABLE `shipping_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `shipping_companis`
--
ALTER TABLE `shipping_companis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_phones`
--
ALTER TABLE `shipping_phones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slider_sites`
--
ALTER TABLE `slider_sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stored_current_products`
--
ALTER TABLE `stored_current_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `store_phones`
--
ALTER TABLE `store_phones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_works`
--
ALTER TABLE `team_works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `web_site_settings`
--
ALTER TABLE `web_site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `areas_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `client_order_news`
--
ALTER TABLE `client_order_news`
  ADD CONSTRAINT `client_order_news_order_internal_id_foreign` FOREIGN KEY (`order_internal_id`) REFERENCES `order_internals` (`id`);

--
-- Constraints for table `comment_products`
--
ALTER TABLE `comment_products`
  ADD CONSTRAINT `comment_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product_sites` (`id`);

--
-- Constraints for table `order_internal_details`
--
ALTER TABLE `order_internal_details`
  ADD CONSTRAINT `order_internal_details_order_internal_id_foreign` FOREIGN KEY (`order_internal_id`) REFERENCES `order_internals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
