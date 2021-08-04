-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2021 at 07:29 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newstateuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `product` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `userid` varchar(32) NOT NULL,
  `state` varchar(128) NOT NULL DEFAULT 'open',
  `username` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `number` varchar(256) NOT NULL,
  `description` text NOT NULL DEFAULT '...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product`, `created_at`, `userid`, `state`, `username`, `name`, `email`, `number`, `description`) VALUES
(39, '32', '2021-07-09 18:41:35', '2147483647', 'closed', '', '', 'fatemehnp98@gmail.com', '', '...'),
(40, '32', '2021-07-09 18:42:05', '3456789', 'closed', '', '', 'fatemehnp98@gmail.com', '', '...'),
(41, '126', '2021-07-12 16:26:42', '3456789', 'open', '', '', 'm.nematpour.1378@gmail.com', '', '...'),
(42, '32', '2021-07-13 13:33:28', '2147483647', 'open', '', '', 'fatemehnp98@gmail.com', '', '...'),
(43, '261', '2021-07-14 18:32:34', '2147483647', 'open', '', 'nematpor46@gmail.com', 'admin@admin.com', '', '...'),
(44, '32', '2021-07-14 22:58:14', '3456789', 'open', '', '', 'nematpor46@gmail.com', '', '...'),
(45, '32', '2021-07-15 22:36:19', '0', 'open', '', '', 'mostafa_nematpour', '', '...'),
(46, '32', '2021-07-16 20:44:35', '3456789', 'open', '', '', 'nematpor46@gmail.com', '', '...'),
(47, '32', '2021-07-17 16:56:45', '0', 'open', '', '', 'admin@admin.com', '', '...'),
(48, '32', '2021-07-17 16:59:07', '0', 'open', '', '', 'admin@admin.com', '', '...'),
(49, '32', '2021-07-17 16:59:13', '0', 'open', '', '', 'admin@admin.com', '', '...'),
(50, '32', '2021-07-17 16:59:33', '0', 'open', 'mostafa', 'a', 'admin@admin.com', '546552', '...'),
(51, '32', '2021-07-17 17:01:43', '2147483647', 'open', '', '', 'nematpor46@gmail.com', '', '...'),
(52, '32', '2021-07-20 21:27:49', '3456789', 'open', '', '', 'm.nematpour.1378@gmail.com', '', '...'),
(53, '32', '2021-07-20 21:28:02', '3456789', 'open', '', '', 'm.nematpour.1378@gmail.com', '', '...'),
(54, '32', '2021-07-20 21:32:25', '3456789', 'open', '', '', 'm.nematpour.1378@gmail.com', '', '...'),
(55, '2', '2021-07-20 22:06:55', '3456789', 'open', '', '', 'nematpor46@gmail.com', '', '...'),
(56, '2', '2021-07-20 22:27:40', '3456789', 'open', '', '', 'm.nematpour.1378@gmail.com', '', '...'),
(57, '2', '2021-07-20 23:14:46', '3456789', 'open', '', '', 'nematpor46@gmail.com', '', '...'),
(58, '2', '2021-07-21 18:26:07', '2147483647', 'open', '', '', 'fatemehnp98@gmail.com', '', '...'),
(59, '15', '2021-07-23 22:09:43', '2147483647', 'open', '', '', 'fatemehnp98@gmail.com', '', '...'),
(60, '2', '2021-07-23 22:32:35', '3456789', 'open', '', '', 'admin@admin.com', '', '...'),
(61, '2', '2021-07-23 22:32:56', '3456789', 'open', '', '', 'fatemehnp98@gmail.com', '', '...'),
(62, '2', '2021-07-24 21:39:22', '2147483647', 'open', '', '', 'fatemehnp98@gmail.com', '', '...'),
(63, '11', '2021-07-24 21:39:47', '2147483647', 'open', '', '', 'fatemehnp98@gmail.com', '', '...'),
(64, '13', '2021-07-24 21:43:51', '0', 'open', '09114284882', '', 'fatemehnp98@gmail.com', '', '...'),
(65, '2', '2021-07-24 21:44:57', '0', 'open', '', '', 'fatemehnp98@gmail.com', '', '...'),
(66, '2', '2021-07-24 22:29:09', '0', 'open', '', '', 'admin@admin.com', '', '...'),
(67, '3', '2021-07-24 22:42:14', '63526', 'open', '', '', 'fatemehnp98@gmail.com', '', '...'),
(68, '2', '2021-07-24 22:44:49', '2147483647', 'open', '', '', 'admin@admin.com', '', '...'),
(69, '2', '2021-07-27 13:17:35', '2147483647', 'open', '', '', 'fatemehnp98@gmail.com', '', '...'),
(70, '2', '2021-07-27 13:35:43', '2147483647', 'closed', '', '', 'fatemehnp98@gmail.com', '', '...'),
(71, '2', '2021-07-27 13:46:18', '2147483647', 'closed', '', '', 'admin@admin.com', '', '...'),
(72, '2', '2021-07-27 17:18:16', '2147483647', 'closed', '', '', 'fatemehnp98@gmail.com', '', '...'),
(73, '2', '2021-07-27 17:20:06', '2147483647', 'closed', '', '', 'm.nematpour.1378@gmail.com', '', '...'),
(74, '2', '2021-07-27 17:53:10', '63526', 'closed', '', '', 'admin@admin.com', '', '...'),
(75, '2', '2021-07-28 12:41:24', '0', 'open', '', '', 'admin@admin.com', '', '...'),
(76, '2', '2021-07-28 18:10:52', '2147483647', 'closed', 'mostafa_nematpour', 'مصطفی', 'nematpor46@gmail.com', '09116343967', '...'),
(77, '2', '2021-07-29 18:28:04', '2147483647', 'closed', 'db mostafa', 'مصطفی', 'nematpor46@gmail.com', '', '...'),
(78, '2', '2021-07-31 18:34:56', '2147483647', 'closed', 'mostafa_nematpour', '', 'fatemehnp98@gmail.com', '', '...'),
(79, '2', '2021-07-31 19:34:18', '2147483647', 'closed', '', '', 'fatemehnp98@gmail.com', '', '...'),
(80, '2', '2021-07-31 22:54:32', '2147483647', 'closed', '', '', 'nematpor46@gmail.com', '', '<div class=\"form-floating\">   <input type=\"password\" class=\"form-control\" id=\"floatingPassword\" placeholder=\"Password\">   <label for=\"floatingPassword\">Password</label> </div>'),
(81, '2', '2021-08-01 08:32:20', '2147483647', 'open', '', '', 'm.nematpour.1378@gmail.com', '', 'شس'),
(82, '2', '2021-08-01 08:37:00', '2147483647', 'open', '', '', 'm.nematpour.1378@gmail.com', '', ''),
(83, '2', '2021-08-01 08:37:04', '2147483647', 'open', '', '', 'm.nematpour.1378@gmail.com', '', '<div class=\"form-floating\">\n  <textarea class=\"form-control\" placeholder=\"Leave a comment here\" id=\"floatingTextarea2\" style=\"height: 100px\"></textarea>\n  <label for=\"floatingTextarea2\">Comments</label>\n</div>'),
(84, '2', '2021-08-01 10:10:12', '2147483647', 'open', '', '', 'm.nematpour.1378@gmail.com', '', ''),
(85, '2', '2021-08-01 10:15:26', '2147483647', 'open', '', '', 'nematpor46@gmail.com', '', ''),
(86, '2', '2021-08-01 10:17:32', '2147483647', 'open', '', '', 'm.nematpour.1378@gmail.com', '', ''),
(87, '2', '2021-08-01 10:18:00', '2147483647', 'closed', '', '', 'm.nematpour.1378@gmail.com', '', 'UYGDWEUODYGWEPIFYBDEPASFSEIFBSFBSE\nX;KASBESIUBFCSEDBVSELKDBVSEHBSKHBCESHBibsdeicbseifbesipbsdpvbdspbvedspibvsipbvispbv'),
(88, '2', '2021-08-01 13:40:36', '2147483647', 'open', '', '', 'nematpor46@gmail.com', '', ''),
(89, '2', '2021-08-01 16:09:16', '3456789', 'open', '', '', 'fatemehnp98@gmail.com', '', ''),
(90, '2', '2021-08-02 12:29:03', '5423543543', 'closed', '', '', 'm.nematpour.1378@gmail.com', '', ''),
(91, '2', '2021-08-02 12:31:11', '5423543543', 'closed', '', '', 'nematpor46@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `paidlist`
--

CREATE TABLE `paidlist` (
  `id` int(20) UNSIGNED NOT NULL,
  `state` varchar(256) NOT NULL DEFAULT 'unpaid',
  `uc` int(12) NOT NULL DEFAULT 0,
  `userid` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `number` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `paid_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paidlist`
--

INSERT INTO `paidlist` (`id`, `state`, `uc`, `userid`, `username`, `data`, `created_at`, `name`, `email`, `number`, `description`, `paid_at`) VALUES
(5, 'paid', 32, '2147483647', '', '{\"data\":{\"code\":100,\"message\":\"Paid\",\"card_hash\":\"5C87994DF4F41DE7CBD74F337E16BBC9136057F810C365E2E462A6399ED16396\",\"card_pan\":\"585983******8194\",\"ref_id\":27241396201,\"fee_type\":\"Merchant\",\"fee\":0},\"errors\":[]}', '2021-07-27 13:42:50', '', 'fatemehnp98@gmail.com', '+', 'A multidimensional array can be simple OR complicated depending upon the situation in the project requirement. We will see the basic multidimensional array and for that, we need to write a callback function that will concatenate the values.', NULL),
(6, 'paid', 32, '2147483647', '', '{\"data\":{\"code\":100,\"message\":\"Paid\",\"card_hash\":\"5C87994DF4F41DE7CBD74F337E16BBC9136057F810C365E2E462A6399ED16396\",\"card_pan\":\"585983******8194\",\"ref_id\":27241484301,\"fee_type\":\"Merchant\",\"fee\":0},\"errors\":[]}', '2021-07-27 13:46:59', '', 'admin@admin.com', '+', 'dec', NULL),
(7, 'paid', 32, '2147483647', '', '{\"data\":{\"code\":100,\"message\":\"Paid\",\"card_hash\":\"5C87994DF4F41DE7CBD74F337E16BBC9136057F810C365E2E462A6399ED16396\",\"card_pan\":\"585983******8194\",\"ref_id\":27245702001,\"fee_type\":\"Merchant\",\"fee\":0},\"errors\":[]}', '2021-07-27 17:18:54', '', 'fatemehnp98@gmail.com', '+', 'dec', NULL),
(8, 'paid', 32, '2147483647', '', '{\"data\":{\"code\":100,\"message\":\"Paid\",\"card_hash\":\"5C87994DF4F41DE7CBD74F337E16BBC9136057F810C365E2E462A6399ED16396\",\"card_pan\":\"585983******8194\",\"ref_id\":27245741201,\"fee_type\":\"Merchant\",\"fee\":0},\"errors\":[]}', '2021-07-27 17:20:45', '', 'm.nematpour.1378@gmail.com', '+', 'dec', NULL),
(9, 'paid', 32, '63526', '', '{\"data\":{\"code\":100,\"message\":\"Paid\",\"card_hash\":\"5C87994DF4F41DE7CBD74F337E16BBC9136057F810C365E2E462A6399ED16396\",\"card_pan\":\"585983******8194\",\"ref_id\":27246335201,\"fee_type\":\"Merchant\",\"fee\":0},\"errors\":[]}', '2021-07-27 17:53:51', '', 'admin@admin.com', '+', 'dec', '2021-07-31 18:30:43'),
(10, 'unpaid', 32, '2147483647', 'mostafa_nematpour', '{\"data\":{\"code\":100,\"message\":\"Paid\",\"card_hash\":\"5C87994DF4F41DE7CBD74F337E16BBC9136057F810C365E2E462A6399ED16396\",\"card_pan\":\"585983******8194\",\"ref_id\":27266735901,\"fee_type\":\"Merchant\",\"fee\":0},\"errors\":[]}', '2021-07-28 18:12:58', 'مصطفی', 'nematpor46@gmail.com', '+09116343967', 'dec', NULL),
(11, 'unpaid', 32, '2147483647', 'db mostafa', '{\"data\":{\"code\":100,\"message\":\"Paid\",\"card_hash\":\"5C87994DF4F41DE7CBD74F337E16BBC9136057F810C365E2E462A6399ED16396\",\"card_pan\":\"585983******8194\",\"ref_id\":27284945002,\"fee_type\":\"Merchant\",\"fee\":0},\"errors\":[]}', '2021-07-29 18:29:37', 'مصطفی', 'nematpor46@gmail.com', '+', 'dec', NULL),
(12, 'unpaid', 32, '2147483647', 'mostafa_nematpour', '{\"data\":{\"code\":100,\"message\":\"Paid\",\"card_hash\":\"5C87994DF4F41DE7CBD74F337E16BBC9136057F810C365E2E462A6399ED16396\",\"card_pan\":\"585983******8194\",\"ref_id\":27321853601,\"fee_type\":\"Merchant\",\"fee\":0},\"errors\":[]}', '2021-07-31 18:38:26', '', 'fatemehnp98@gmail.com', '+', 'dec', NULL),
(13, 'unpaid', 32, '2147483647', '', '{\"data\":{\"code\":100,\"message\":\"Paid\",\"card_hash\":\"5C87994DF4F41DE7CBD74F337E16BBC9136057F810C365E2E462A6399ED16396\",\"card_pan\":\"585983******8194\",\"ref_id\":27322847101,\"fee_type\":\"Merchant\",\"fee\":0},\"errors\":[]}', '2021-07-31 19:35:46', '', 'fatemehnp98@gmail.com', '+', 'dec', NULL),
(14, 'unpaid', 32, '2147483647', '', '{\"data\":{\"code\":100,\"message\":\"Paid\",\"card_hash\":\"5C87994DF4F41DE7CBD74F337E16BBC9136057F810C365E2E462A6399ED16396\",\"card_pan\":\"585983******8194\",\"ref_id\":27326573001,\"fee_type\":\"Merchant\",\"fee\":0},\"errors\":[]}', '2021-07-31 22:59:54', '', 'nematpor46@gmail.com', '+', '<div class=\"form-floating\">   <input type=\"password\" class=\"form-control\" id=\"floatingPassword\" placeholder=\"Password\">   <label for=\"floatingPassword\">Password</label> </div>', NULL),
(15, 'unpaid', 32, '2147483647', '', '{\"data\":{\"code\":100,\"message\":\"Paid\",\"card_hash\":\"5C87994DF4F41DE7CBD74F337E16BBC9136057F810C365E2E462A6399ED16396\",\"card_pan\":\"585983******8194\",\"ref_id\":27332158401,\"fee_type\":\"Merchant\",\"fee\":0},\"errors\":[]}', '2021-08-01 10:21:26', '', 'm.nematpour.1378@gmail.com', '+', 'UYGDWEUODYGWEPIFYBDEPASFSEIFBSFBSE\nX;KASBESIUBFCSEDBVSELKDBVSEHBSKHBCESHBibsdeicbseifbesipbsdpvbdspbvedspibvsipbvispbv', NULL),
(16, 'unpaid', 32, '5423543543', '', '{\"data\":{\"code\":100,\"message\":\"Paid\",\"card_hash\":\"5C87994DF4F41DE7CBD74F337E16BBC9136057F810C365E2E462A6399ED16396\",\"card_pan\":\"585983******8194\",\"ref_id\":27353766601,\"fee_type\":\"Merchant\",\"fee\":0},\"errors\":[]}', '2021-08-02 12:29:58', '', 'm.nematpour.1378@gmail.com', '+', '', NULL),
(17, 'unpaid', 32, '5423543543', '', '{\"data\":{\"code\":100,\"message\":\"Paid\",\"card_hash\":\"5C87994DF4F41DE7CBD74F337E16BBC9136057F810C365E2E462A6399ED16396\",\"card_pan\":\"585983******8194\",\"ref_id\":27353803301,\"fee_type\":\"Merchant\",\"fee\":0},\"errors\":[]}', '2021-08-02 12:31:47', '', 'nematpor46@gmail.com', '+', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paymentlist`
--

CREATE TABLE `paymentlist` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `authority` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentlist`
--

INSERT INTO `paymentlist` (`id`, `order_id`, `authority`, `created_at`) VALUES
(1, 42, 'adsefdgrjkl', '2021-07-12 17:22:58'),
(2, 41, 'adesfrtdyo;k\'pll.,mngfd', '2021-07-13 13:27:05'),
(3, 42, 'A00000000000000000000000000269794820', '2021-07-13 13:33:37'),
(4, 42, 'A00000000000000000000000000269796141', '2021-07-13 13:41:05'),
(5, 42, 'A00000000000000000000000000269796530', '2021-07-13 13:43:21'),
(6, 42, 'A00000000000000000000000000269797343', '2021-07-13 13:47:46'),
(7, 42, 'A00000000000000000000000000269797710', '2021-07-13 13:49:52'),
(8, 42, 'A00000000000000000000000000269809096', '2021-07-13 14:48:46'),
(9, 43, 'A00000000000000000000000000270035157', '2021-07-14 18:32:44'),
(10, 44, 'A00000000000000000000000000270079553', '2021-07-14 22:58:19'),
(11, 45, 'A00000000000000000000000000270266575', '2021-07-15 22:36:22'),
(12, 45, 'A00000000000000000000000000270268133', '2021-07-15 22:47:34'),
(13, 46, 'A00000000000000000000000000270430970', '2021-07-16 21:13:37'),
(14, 47, 'A00000000000000000000000000270569131', '2021-07-17 16:56:47'),
(15, 47, 'A00000000000000000000000000270569473', '2021-07-17 16:58:58'),
(16, 54, 'A00000000000000000000000000271178650', '2021-07-20 21:33:31'),
(17, 54, 'A00000000000000000000000000271178908', '2021-07-20 21:35:13'),
(18, 57, 'A00000000000000000000000000271195987', '2021-07-20 23:15:19'),
(19, 58, 'A00000000000000000000000000271325209', '2021-07-21 18:26:16'),
(20, 58, 'A00000000000000000000000000271325263', '2021-07-21 18:26:36'),
(21, 59, 'A00000000000000000000000000271714167', '2021-07-23 22:09:59'),
(22, 59, 'A00000000000000000000000000271715257', '2021-07-23 22:15:42'),
(23, 59, 'A00000000000000000000000000271715347', '2021-07-23 22:16:14'),
(24, 59, 'A00000000000000000000000000271717155', '2021-07-23 22:26:34'),
(25, 61, 'A00000000000000000000000000271720772', '2021-07-23 22:46:57'),
(26, 61, 'A00000000000000000000000000271721635', '2021-07-23 22:51:55'),
(27, 61, 'A00000000000000000000000000271723756', '2021-07-23 23:04:15'),
(28, 61, 'A00000000000000000000000000271724258', '2021-07-23 23:07:14'),
(29, 63, 'A00000000000000000000000000271905650', '2021-07-24 21:42:46'),
(30, 63, 'A00000000000000000000000000271905803', '2021-07-24 21:43:27'),
(31, 64, 'A00000000000000000000000000271905895', '2021-07-24 21:43:56'),
(32, 65, 'A00000000000000000000000000271906144', '2021-07-24 21:45:11'),
(33, 66, 'A00000000000000000000000000271915194', '2021-07-24 22:29:12'),
(34, 67, 'A00000000000000000000000000271917865', '2021-07-24 22:42:16'),
(35, 68, 'A00000000000000000000000000271918418', '2021-07-24 22:44:51'),
(36, 69, 'A00000000000000000000000000272409162', '2021-07-27 13:17:46'),
(37, 70, 'A00000000000000000000000000272412717', '2021-07-27 13:35:49'),
(38, 70, 'A00000000000000000000000000272413962', '2021-07-27 13:42:08'),
(39, 71, 'A00000000000000000000000000272414843', '2021-07-27 13:46:21'),
(40, 72, 'A00000000000000000000000000272457020', '2021-07-27 17:18:20'),
(41, 73, 'A00000000000000000000000000272457412', '2021-07-27 17:20:08'),
(42, 74, 'A00000000000000000000000000272463352', '2021-07-27 17:53:12'),
(43, 75, 'A00000000000000000000000000272604052', '2021-07-28 12:41:33'),
(44, 75, 'A00000000000000000000000000272604108', '2021-07-28 12:41:44'),
(45, 76, 'A00000000000000000000000000272667359', '2021-07-28 18:12:00'),
(46, 77, 'A00000000000000000000000000272849450', '2021-07-29 18:28:19'),
(47, 78, 'A00000000000000000000000000273218536', '2021-07-31 18:34:59'),
(48, 79, 'A00000000000000000000000000273228328', '2021-07-31 19:34:21'),
(49, 79, 'A00000000000000000000000000273228400', '2021-07-31 19:34:46'),
(50, 79, 'A00000000000000000000000000273228471', '2021-07-31 19:35:11'),
(51, 80, 'A00000000000000000000000000273265730', '2021-07-31 22:59:14'),
(52, 87, 'A00000000000000000000000000273321489', '2021-08-01 10:19:58'),
(53, 87, 'A00000000000000000000000000273321527', '2021-08-01 10:20:09'),
(54, 87, 'A00000000000000000000000000273321551', '2021-08-01 10:20:18'),
(55, 87, 'A00000000000000000000000000273321584', '2021-08-01 10:20:35'),
(56, 88, 'A00000000000000000000000000273357411', '2021-08-01 13:40:45'),
(57, 90, 'A00000000000000000000000000273537666', '2021-08-02 12:29:05'),
(58, 91, 'A00000000000000000000000000273538033', '2021-08-02 12:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `state` varchar(256) NOT NULL DEFAULT 'hide',
  `name` varchar(256) NOT NULL,
  `price` int(20) NOT NULL,
  `value` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `state`, `name`, `price`, `value`) VALUES
(2, '', '32   uc  18.000 toman  (بی اعتبار)', 20000, 32),
(3, '', '63   uc  30.000 toman', 30000, 63),
(4, '', '126  uc  60.000 toman', 60000, 126),
(5, '', '198  uc  85.000 toman', 85000, 198),
(8, '', '261  uc  104.000 toman', 104000, 261),
(9, '', '340  uc  125.000 toman', 1250000, 340),
(10, '', '538  uc  190.000 toman', 1900000, 538),
(11, '', '601  uc  210.000 toman', 2100000, 601),
(12, '', '690  uc  234.000 toman', 2340000, 690),
(13, '', '888  uc  305.000 toman', 3050000, 888),
(14, '', '1030 uc  334.000 toman', 3340000, 1030),
(15, '', '1875 uc  570.000 toman', 5700000, 1875);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) CHARACTER SET utf8 NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'mostafa', 'nematpor46@gmail.com', '$2y$10$7LtPGSPZZnrPXSGH8zE5n./KSgTIJR3/7KW0iDdAU.aZoUnB2bfQa', '2021-04-24 15:58:51'),
(40, 'mostafa', 'm.nematpour.1378@gmail.com', '$2y$10$7LtPGSPZZnrPXSGH8zE5n./KSgTIJR3/7KW0iDdAU.aZoUnB2bfQa', '2021-06-14 20:38:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paidlist`
--
ALTER TABLE `paidlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentlist`
--
ALTER TABLE `paymentlist`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `paidlist`
--
ALTER TABLE `paidlist`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `paymentlist`
--
ALTER TABLE `paymentlist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
