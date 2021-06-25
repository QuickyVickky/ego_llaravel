-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2021 at 04:40 PM
-- Server version: 10.5.10-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `egogram`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_tokens`
--

CREATE TABLE `access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `accesstoken` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `access_tokens`
--

INSERT INTO `access_tokens` (`id`, `user_id`, `accesstoken`, `created_at`, `updated_at`) VALUES
(1, 14, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.c9UL4BCJQ8Oaa1ZyoF18WJICKRDXcLzIg0nxINRlBpw', '2020-12-30 01:41:49', '2021-03-19 07:18:56'),
(2, 15, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.l1w-6qwPqs-Qs8lKAcus_zjWLDdFVt-ErSrgl2ttsXU', '2020-12-30 01:44:12', '2020-12-30 01:44:29'),
(3, 16, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.N3HcHlhOf7CjVddVsTmfpBqjH94Wdn3cEvGNtbodRD4', '2020-12-30 02:25:00', '2020-12-30 02:25:00'),
(4, 17, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.F6ThSNJeHCumuXC4GfBiuXeX-D3PM8h6soEfynFRiL8', '2020-12-30 02:58:59', '2021-01-02 00:26:32'),
(5, 18, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.72quCnVqokCQ5CN6n7J_BFIoiplIoqIASFMY3xAm8xo', '2020-12-30 03:24:32', '2020-12-30 03:24:32'),
(6, 19, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.VZTHA5U3k8r6Zdf6hi4ecZUj5bzwpcl4y1YyDwlhrOw', '2020-12-30 03:32:57', '2020-12-30 03:32:57'),
(7, 3, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.4lBoVkFVzZjQxWQfHdSMSO1VhQn69iTcT2AxJufqjzY', '2020-12-30 03:32:57', '2021-04-13 00:33:24'),
(8, 20, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.BZCEHp1LD6GQvMvAmBFKUevssI5Uxg-LplrTf0q7YpQ', '2021-01-04 08:45:44', '2021-01-04 08:46:02'),
(9, 21, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.axncIl3SDI2N3KBftjzheLBGfNyKkSY29IuMPcqSMJ4', '2021-01-15 06:49:04', '2021-03-02 03:25:17'),
(10, 24, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.5mKdV0kYl1ed89hvAxKPn1dhpYlNZmXCVDadBq1jrMs', '2021-01-16 09:00:56', '2021-02-03 01:05:55'),
(11, 25, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.72vyoPd9k9UZrBK6Eji7EJsPSO03xjoDkhFYlAmZWX8', '2021-01-18 09:30:42', '2021-01-18 09:39:49'),
(12, 26, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.YG4WOB3Ro4u9jEn-Q3nJH88gQpL439nobkHnqCHQUXs', '2021-01-18 22:32:06', '2021-01-18 22:32:29'),
(13, 27, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.Ukqld5zvB97dYsBanhqByIyplEeCNnaFVMxjGwX5gQ4', '2021-01-18 22:39:38', '2021-01-19 04:12:50'),
(14, 28, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.T-DwaGow-VpgDG59i-WlRYJTdrUqZkLEFAYLQpxK1gs', '2021-01-20 02:16:40', '2021-01-20 03:40:40'),
(15, 29, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.86htZMQNuvaJFdwSXrt7TsVu43AMDf6weQ7GCP7iVNY', '2021-01-22 03:42:47', '2021-01-22 03:42:47'),
(16, 30, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.FLa-gFvo1BHk8iOX2EnrfOmn7ffiricVMeehWoeGKJA', '2021-02-05 21:40:03', '2021-02-05 21:40:50'),
(17, 33, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.qycOgbQdQ-CBDdS6aswZnFIzBFsiZja0fBphCc87Alg', '2021-02-24 00:46:28', '2021-02-24 00:46:28'),
(18, 34, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.5YUMvnKMXsTJ9RVDLhBkBg0qkwPnbaVdUUonPFMx8Do', '2021-03-02 03:51:19', '2021-03-02 03:51:40'),
(19, 35, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.E27fO4VcaAjKPhX_HqrxFRsM8kWipvkPOZuA5zJA7S4', '2021-03-03 18:37:58', '2021-03-03 18:38:11'),
(20, 38, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.0-wJF3Y0EAPbFTapSow-Qyh05Rglf1K83YtPs6PkY44', '2021-04-14 02:50:33', '2021-04-14 02:50:49'),
(21, 39, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.1DDUVrhT-6mRHui_B3gPMXmokMFLn9tKi08V_NzokEM', '2021-04-14 05:33:09', '2021-04-14 05:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('admin','user','recipient') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `bank_info` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_fields`
--

CREATE TABLE `bank_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_fields`
--

INSERT INTO `bank_fields` (`id`, `country_id`, `title`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 98, 'BOB', NULL, '2020-12-11 08:17:50', '2020-12-11 08:17:50'),
(2, 230, 'SBI', NULL, '2020-12-11 08:18:21', '2020-12-11 08:18:21'),
(3, 12, 'NEW BANK', NULL, '2021-02-15 03:00:54', '2021-02-15 03:00:54'),
(4, 95, 'HDFC', NULL, '2021-03-30 03:43:55', '2021-03-31 22:55:23'),
(5, 107, 'THE JAPANIS BANK', NULL, '2021-04-15 23:59:41', '2021-04-15 23:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `bank_field_options`
--

CREATE TABLE `bank_field_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_field_id` bigint(20) UNSIGNED NOT NULL,
  `field_type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Textbox, 2: Number, 3: Selectbox, 4: Radio button, 5: Checkbox',
  `field_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_field_options`
--

INSERT INTO `bank_field_options` (`id`, `bank_field_id`, `field_type`, `field_name`, `field_value`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'AccountNumber', '1223456', NULL, '2020-12-11 08:17:50', '2020-12-11 08:17:50'),
(2, 1, 1, 'IfscCode', 'IFSCCode', NULL, '2020-12-11 08:17:50', '2020-12-11 08:17:50'),
(3, 2, 1, 'IbnNo', 'IBN123456', NULL, '2020-12-11 08:18:21', '2020-12-11 08:18:21'),
(4, 3, 1, 'IBBA', '343434343', NULL, '2021-02-15 03:00:54', '2021-02-15 03:00:54'),
(5, 4, 1, 'Accountnumber', '1234567890123', NULL, '2021-03-30 03:43:55', '2021-03-31 22:55:23'),
(6, 5, 1, 'accountnumber', '1234568910', NULL, '2021-04-15 23:59:41', '2021-04-15 23:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'kmg62D2bMh', 'hs0oasF9ge@gmail.com', NULL, NULL, 'UaIzXhAfH4yGO0l5BfOB6PDcZ8TOzIw7qUc666o7bkp6TnWxGNpNjMUVv3E3KWur8Sc3gpnjcbbAhOFUzmkvtXWdngMNeOa1kazW', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `code` varchar(2) NOT NULL,
  `dial_code` varchar(5) NOT NULL,
  `currency_name` varchar(20) NOT NULL,
  `currency_symbol` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `currency_code` varchar(10) NOT NULL,
  `currency_flag` varchar(255) DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Country, 2: Currency',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `dial_code`, `currency_name`, `currency_symbol`, `currency_code`, `currency_flag`, `type`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 'AF', '+93', 'Afghan afghani', '؋', 'AFN', NULL, 1, 1, NULL, NULL),
(3, 'Albania', 'AL', '+355', 'Albanian lek', 'L', 'ALL', NULL, 1, 1, NULL, NULL),
(4, 'Algeria', 'DZ', '+213', 'Algerian dinar', 'د.ج', 'DZD', NULL, 1, 1, NULL, NULL),
(6, 'Andorra', 'AD', '+376', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(7, 'Angola', 'AO', '+244', 'Angolan kwanza', 'Kz', 'AOA', NULL, 1, 1, NULL, NULL),
(8, 'Anguilla', 'AI', '+1264', 'East Caribbean dolla', '$', 'XCD', NULL, 1, 1, NULL, NULL),
(10, 'Antigua and Barbuda', 'AG', '+1268', 'East Caribbean dolla', '$', 'XCD', NULL, 1, 1, NULL, NULL),
(11, 'Argentina', 'AR', '+54', 'Argentine peso', '$', 'ARS', NULL, 1, 1, NULL, NULL),
(12, 'Armenia', 'AM', '+374', 'Armenian dram', '', 'AMD', NULL, 1, 1, NULL, NULL),
(13, 'Aruba', 'AW', '+297', 'Aruban florin', 'ƒ', 'AWG', NULL, 1, 1, NULL, NULL),
(14, 'Australia', 'AU', '+61', 'Australian dollar', '$', 'AUD', 'AUD.png', 2, 1, NULL, NULL),
(15, 'Austria', 'AT', '+43', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(16, 'Azerbaijan', 'AZ', '+994', 'Azerbaijani manat', '', 'AZN', NULL, 1, 1, NULL, NULL),
(18, 'Bahrain', 'BH', '+973', 'Bahraini dinar', '.د.ب', 'BHD', NULL, 1, 1, NULL, NULL),
(19, 'Bangladesh', 'BD', '+880', 'Bangladeshi taka', '৳', 'BDT', NULL, 1, 1, NULL, NULL),
(20, 'Barbados', 'BB', '+1246', 'Barbadian dollar', '$', 'BBD', NULL, 1, 1, NULL, NULL),
(21, 'Belarus', 'BY', '+375', 'Belarusian ruble', 'Br', 'BYR', NULL, 1, 1, NULL, NULL),
(22, 'Belgium', 'BE', '+32', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(23, 'Belize', 'BZ', '+501', 'Belize dollar', '$', 'BZD', NULL, 1, 1, NULL, NULL),
(24, 'Benin', 'BJ', '+229', 'West African CFA fra', 'Fr', 'XOF', NULL, 1, 1, NULL, NULL),
(25, 'Bermuda', 'BM', '+1441', 'Bermudian dollar', '$', 'BMD', NULL, 1, 1, NULL, NULL),
(26, 'Bhutan', 'BT', '+975', 'Bhutanese ngultrum', 'Nu.', 'BTN', NULL, 1, 1, NULL, NULL),
(29, 'Botswana', 'BW', '+267', 'Botswana pula', 'P', 'BWP', NULL, 1, 1, NULL, NULL),
(30, 'Brazil', 'BR', '+55', 'Brazilian real', 'R$', 'BRL', 'BRL.png', 2, 1, NULL, NULL),
(33, 'Bulgaria', 'BG', '+359', 'Bulgarian lev', 'лв', 'BGN', 'BGN.png', 2, 1, NULL, NULL),
(34, 'Burkina Faso', 'BF', '+226', 'West African CFA fra', 'Fr', 'XOF', NULL, 1, 1, NULL, NULL),
(35, 'Burundi', 'BI', '+257', 'Burundian franc', 'Fr', 'BIF', NULL, 1, 1, NULL, NULL),
(36, 'Cambodia', 'KH', '+855', 'Cambodian riel', '៛', 'KHR', NULL, 1, 1, NULL, NULL),
(37, 'Cameroon', 'CM', '+237', 'Central African CFA ', 'Fr', 'XAF', NULL, 1, 1, NULL, NULL),
(38, 'Canada', 'CA', '+1', 'Canadian dollar', '$', 'CAD', 'CAD.png', 2, 1, NULL, NULL),
(39, 'Cape Verde', 'CV', '+238', 'Cape Verdean escudo', 'Esc or $', 'CVE', NULL, 1, 1, NULL, NULL),
(40, 'Cayman Islands', 'KY', '+ 345', 'Cayman Islands dolla', '$', 'KYD', NULL, 1, 1, NULL, NULL),
(42, 'Chad', 'TD', '+235', 'Central African CFA ', 'Fr', 'XAF', NULL, 1, 1, NULL, NULL),
(43, 'Chile', 'CL', '+56', 'Chilean peso', '$', 'CLP', NULL, 1, 1, NULL, NULL),
(44, 'China', 'CN', '+86', 'Chinese yuan', '¥ or 元', 'CNY', NULL, 1, 1, NULL, NULL),
(47, 'Colombia', 'CO', '+57', 'Colombian peso', '$', 'COP', NULL, 1, 1, NULL, NULL),
(48, 'Comoros', 'KM', '+269', 'Comorian franc', 'Fr', 'KMF', NULL, 1, 1, NULL, NULL),
(51, 'Cook Islands', 'CK', '+682', 'New Zealand dollar', '$', 'NZD', NULL, 1, 1, NULL, NULL),
(52, 'Costa Rica', 'CR', '+506', 'Costa Rican colón', '₡', 'CRC', NULL, 1, 1, NULL, NULL),
(53, 'Cote d\'Ivoire', 'CI', '+225', 'West African CFA fra', 'Fr', 'XOF', NULL, 1, 1, NULL, NULL),
(54, 'Croatia', 'HR', '+385', 'Croatian kuna', 'kn', 'HRK', 'HRK.png', 2, 1, NULL, NULL),
(55, 'Cuba', 'CU', '+53', 'Cuban convertible pe', '$', 'CUC', NULL, 1, 1, NULL, NULL),
(56, 'Cyprus', 'CY', '+357', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(57, 'Czech Republic', 'CZ', '+420', 'Czech koruna', 'Kč', 'CZK', 'CZK.png', 2, 1, NULL, NULL),
(58, 'Denmark', 'DK', '+45', 'Danish krone', 'kr', 'DKK', 'DKK.png', 2, 1, NULL, NULL),
(59, 'Djibouti', 'DJ', '+253', 'Djiboutian franc', 'Fr', 'DJF', NULL, 1, 1, NULL, NULL),
(60, 'Dominica', 'DM', '+1767', 'East Caribbean dolla', '$', 'XCD', NULL, 1, 1, NULL, NULL),
(61, 'Dominican Republic', 'DO', '+1849', 'Dominican peso', '$', 'DOP', NULL, 1, 1, NULL, NULL),
(62, 'Ecuador', 'EC', '+593', 'United States dollar', '$', 'USD', NULL, 1, 1, NULL, NULL),
(63, 'Egypt', 'EG', '+20', 'Egyptian pound', '£ or ج.م', 'EGP', NULL, 1, 1, NULL, NULL),
(64, 'El Salvador', 'SV', '+503', 'United States dollar', '$', 'USD', NULL, 1, 1, NULL, NULL),
(65, 'Equatorial Guinea', 'GQ', '+240', 'Central African CFA ', 'Fr', 'XAF', NULL, 1, 1, NULL, NULL),
(66, 'Eritrea', 'ER', '+291', 'Eritrean nakfa', 'Nfk', 'ERN', NULL, 1, 1, NULL, NULL),
(67, 'Estonia', 'EE', '+372', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(68, 'Ethiopia', 'ET', '+251', 'Ethiopian birr', 'Br', 'ETB', NULL, 1, 1, NULL, NULL),
(70, 'Faroe Islands', 'FO', '+298', 'Danish krone', 'kr', 'DKK', NULL, 1, 1, NULL, NULL),
(71, 'Fiji', 'FJ', '+679', 'Fijian dollar', '$', 'FJD', NULL, 1, 1, NULL, NULL),
(72, 'Finland', 'FI', '+358', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(73, 'France', 'FR', '+33', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(75, 'French Polynesia', 'PF', '+689', 'CFP franc', 'Fr', 'XPF', NULL, 1, 1, NULL, NULL),
(76, 'Gabon', 'GA', '+241', 'Central African CFA ', 'Fr', 'XAF', NULL, 1, 1, NULL, NULL),
(78, 'Georgia', 'GE', '+995', 'Georgian lari', 'ლ', 'GEL', NULL, 1, 1, NULL, NULL),
(79, 'Germany', 'DE', '+49', 'Euro', '€', 'EUR', 'EUR.png', 2, 1, NULL, NULL),
(80, 'Ghana', 'GH', '+233', 'Ghana cedi', '₵', 'GHS', NULL, 1, 1, NULL, NULL),
(81, 'Gibraltar', 'GI', '+350', 'Gibraltar pound', '£', 'GIP', NULL, 1, 1, NULL, NULL),
(82, 'Greece', 'GR', '+30', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(84, 'Grenada', 'GD', '+1473', 'East Caribbean dolla', '$', 'XCD', NULL, 1, 1, NULL, NULL),
(87, 'Guatemala', 'GT', '+502', 'Guatemalan quetzal', 'Q', 'GTQ', NULL, 1, 1, NULL, NULL),
(88, 'Guernsey', 'GG', '+44', 'British pound', '£', 'GBP', NULL, 1, 1, NULL, NULL),
(89, 'Guinea', 'GN', '+224', 'Guinean franc', 'Fr', 'GNF', NULL, 1, 1, NULL, NULL),
(90, 'Guinea-Bissau', 'GW', '+245', 'West African CFA fra', 'Fr', 'XOF', NULL, 1, 1, NULL, NULL),
(91, 'Guyana', 'GY', '+595', 'Guyanese dollar', '$', 'GYD', NULL, 1, 1, NULL, NULL),
(92, 'Haiti', 'HT', '+509', 'Haitian gourde', 'G', 'HTG', NULL, 1, 1, NULL, NULL),
(94, 'Honduras', 'HN', '+504', 'Honduran lempira', 'L', 'HNL', NULL, 1, 1, NULL, NULL),
(95, 'Hong Kong', 'HK', '+852', 'Hong Kong dollar', '$', 'HKD', 'HKD.png', 2, 1, NULL, NULL),
(96, 'Hungary', 'HU', '+36', 'Hungarian forint', 'Ft', 'HUF', 'HUF.png', 2, 1, NULL, NULL),
(97, 'Iceland', 'IS', '+354', 'Icelandic króna', 'kr', 'ISK', NULL, 1, 1, NULL, NULL),
(98, 'India', 'IN', '+91', 'Indian rupee', '₹', 'INR', 'INR.png', 2, 1, NULL, NULL),
(99, 'Indonesia', 'ID', '+62', 'Indonesian rupiah', 'Rp', 'IDR', 'IDR.png', 2, 1, NULL, NULL),
(101, 'Iraq', 'IQ', '+964', 'Iraqi dinar', 'ع.د', 'IQD', NULL, 1, 1, NULL, NULL),
(102, 'Ireland', 'IE', '+353', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(103, 'Isle of Man', 'IM', '+44', 'British pound', '£', 'GBP', NULL, 1, 1, NULL, NULL),
(104, 'Israel', 'IL', '+972', 'Israeli new shekel', '₪', 'ILS', NULL, 1, 1, NULL, NULL),
(105, 'Italy', 'IT', '+39', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(106, 'Jamaica', 'JM', '+1876', 'Jamaican dollar', '$', 'JMD', NULL, 1, 1, NULL, NULL),
(107, 'Japan', 'JP', '+81', 'Japanese yen', '¥', 'JPY', 'JPY.png', 2, 1, NULL, NULL),
(108, 'Jersey', 'JE', '+44', 'British pound', '£', 'GBP', NULL, 1, 1, NULL, NULL),
(109, 'Jordan', 'JO', '+962', 'Jordanian dinar', 'د.ا', 'JOD', NULL, 1, 1, NULL, NULL),
(110, 'Kazakhstan', 'KZ', '+7 7', 'Kazakhstani tenge', '', 'KZT', NULL, 1, 1, NULL, NULL),
(111, 'Kenya', 'KE', '+254', 'Kenyan shilling', 'Sh', 'KES', NULL, 1, 1, NULL, NULL),
(112, 'Kiribati', 'KI', '+686', 'Australian dollar', '$', 'AUD', NULL, 1, 1, NULL, NULL),
(115, 'Kuwait', 'KW', '+965', 'Kuwaiti dinar', 'د.ك', 'KWD', NULL, 1, 1, NULL, NULL),
(116, 'Kyrgyzstan', 'KG', '+996', 'Kyrgyzstani som', 'лв', 'KGS', NULL, 1, 1, NULL, NULL),
(117, 'Laos', 'LA', '+856', 'Lao kip', '₭', 'LAK', NULL, 1, 1, NULL, NULL),
(118, 'Latvia', 'LV', '+371', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(119, 'Lebanon', 'LB', '+961', 'Lebanese pound', 'ل.ل', 'LBP', NULL, 1, 1, NULL, NULL),
(120, 'Lesotho', 'LS', '+266', 'Lesotho loti', 'L', 'LSL', NULL, 1, 1, NULL, NULL),
(121, 'Liberia', 'LR', '+231', 'Liberian dollar', '$', 'LRD', NULL, 1, 1, NULL, NULL),
(123, 'Liechtenstein', 'LI', '+423', 'Swiss franc', 'Fr', 'CHF', NULL, 1, 1, NULL, NULL),
(124, 'Lithuania', 'LT', '+370', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(125, 'Luxembourg', 'LU', '+352', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(128, 'Madagascar', 'MG', '+261', 'Malagasy ariary', 'Ar', 'MGA', NULL, 1, 1, NULL, NULL),
(129, 'Malawi', 'MW', '+265', 'Malawian kwacha', 'MK', 'MWK', NULL, 1, 1, NULL, NULL),
(130, 'Malaysia', 'MY', '+60', 'Malaysian ringgit', 'RM', 'MYR', 'MYR.png', 2, 1, NULL, NULL),
(131, 'Maldives', 'MV', '+960', 'Maldivian rufiyaa', '.ރ', 'MVR', NULL, 1, 1, NULL, NULL),
(132, 'Mali', 'ML', '+223', 'West African CFA fra', 'Fr', 'XOF', NULL, 1, 1, NULL, NULL),
(133, 'Malta', 'MT', '+356', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(134, 'Marshall Islands', 'MH', '+692', 'United States dollar', '$', 'USD', NULL, 1, 1, NULL, NULL),
(136, 'Mauritania', 'MR', '+222', 'Mauritanian ouguiya', 'UM', 'MRO', NULL, 1, 1, NULL, NULL),
(137, 'Mauritius', 'MU', '+230', 'Mauritian rupee', '₨', 'MUR', NULL, 1, 1, NULL, NULL),
(139, 'Mexico', 'MX', '+52', 'Mexican peso', '$', 'MXN', NULL, 1, 1, NULL, NULL),
(141, 'Moldova', 'MD', '+373', 'Moldovan leu', 'L', 'MDL', NULL, 1, 1, NULL, NULL),
(142, 'Monaco', 'MC', '+377', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(143, 'Mongolia', 'MN', '+976', 'Mongolian tögrög', '₮', 'MNT', NULL, 1, 1, NULL, NULL),
(144, 'Montenegro', 'ME', '+382', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(145, 'Montserrat', 'MS', '+1664', 'East Caribbean dolla', '$', 'XCD', NULL, 1, 1, NULL, NULL),
(146, 'Morocco', 'MA', '+212', 'Moroccan dirham', 'د.م.', 'MAD', NULL, 1, 1, NULL, NULL),
(147, 'Mozambique', 'MZ', '+258', 'Mozambican metical', 'MT', 'MZN', NULL, 1, 1, NULL, NULL),
(148, 'Myanmar', 'MM', '+95', 'Burmese kyat', 'Ks', 'MMK', NULL, 1, 1, NULL, NULL),
(149, 'Namibia', 'NA', '+264', 'Namibian dollar', '$', 'NAD', NULL, 1, 1, NULL, NULL),
(150, 'Nauru', 'NR', '+674', 'Australian dollar', '$', 'AUD', NULL, 1, 1, NULL, NULL),
(151, 'Nepal', 'NP', '+977', 'Nepalese rupee', '₨', 'NPR', NULL, 1, 1, NULL, NULL),
(152, 'Netherlands', 'NL', '+31', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(154, 'New Caledonia', 'NC', '+687', 'CFP franc', 'Fr', 'XPF', NULL, 1, 1, NULL, NULL),
(155, 'New Zealand', 'NZ', '+64', 'New Zealand dollar', '$', 'NZD', 'NZD.png', 2, 1, NULL, NULL),
(156, 'Nicaragua', 'NI', '+505', 'Nicaraguan córdoba', 'C$', 'NIO', NULL, 1, 1, NULL, NULL),
(157, 'Niger', 'NE', '+227', 'West African CFA fra', 'Fr', 'XOF', NULL, 1, 1, NULL, NULL),
(158, 'Nigeria', 'NG', '+234', 'Nigerian naira', '₦', 'NGN', NULL, 1, 1, NULL, NULL),
(159, 'Niue', 'NU', '+683', 'New Zealand dollar', '$', 'NZD', NULL, 1, 1, NULL, NULL),
(162, 'Norway', 'NO', '+47', 'Norwegian krone', 'kr', 'NOK', 'NOK.png', 2, 1, NULL, NULL),
(163, 'Oman', 'OM', '+968', 'Omani rial', 'ر.ع.', 'OMR', NULL, 1, 1, NULL, NULL),
(164, 'Pakistan', 'PK', '+92', 'Pakistani rupee', '₨', 'PKR', NULL, 1, 1, NULL, NULL),
(167, 'Panama', 'PA', '+507', 'Panamanian balboa', 'B/.', 'PAB', NULL, 1, 1, NULL, NULL),
(168, 'Papua New Guinea', 'PG', '+675', 'Papua New Guinean ki', 'K', 'PGK', NULL, 1, 1, NULL, NULL),
(169, 'Paraguay', 'PY', '+595', 'Paraguayan guaraní', '₲', 'PYG', NULL, 1, 1, NULL, NULL),
(170, 'Peru', 'PE', '+51', 'Peruvian nuevo sol', 'S/.', 'PEN', NULL, 1, 1, NULL, NULL),
(171, 'Philippines', 'PH', '+63', 'Philippine peso', '₱', 'PHP', NULL, 1, 1, NULL, NULL),
(173, 'Poland', 'PL', '+48', 'Polish z?oty', 'zł', 'PLN', 'PLN.png', 2, 1, NULL, NULL),
(174, 'Portugal', 'PT', '+351', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(176, 'Qatar', 'QA', '+974', 'Qatari riyal', 'ر.ق', 'QAR', NULL, 1, 1, NULL, NULL),
(177, 'Romania', 'RO', '+40', 'Romanian leu', 'lei', 'RON', 'RON.png', 2, 1, NULL, NULL),
(178, 'Russia', 'RU', '+7', 'Russian ruble', '', 'RUB', NULL, 1, 1, NULL, NULL),
(179, 'Rwanda', 'RW', '+250', 'Rwandan franc', 'Fr', 'RWF', NULL, 1, 1, NULL, NULL),
(184, 'Saint Lucia', 'LC', '+1758', 'East Caribbean dolla', '$', 'XCD', NULL, 1, 1, NULL, NULL),
(188, 'Samoa', 'WS', '+685', 'Samoan t?l?', 'T', 'WST', NULL, 1, 1, NULL, NULL),
(189, 'San Marino', 'SM', '+378', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(191, 'Saudi Arabia', 'SA', '+966', 'Saudi riyal', 'ر.س', 'SAR', NULL, 1, 1, NULL, NULL),
(192, 'Senegal', 'SN', '+221', 'West African CFA fra', 'Fr', 'XOF', NULL, 1, 1, NULL, NULL),
(193, 'Serbia', 'RS', '+381', 'Serbian dinar', 'дин. or din.', 'RSD', NULL, 1, 1, NULL, NULL),
(194, 'Seychelles', 'SC', '+248', 'Seychellois rupee', '₨', 'SCR', NULL, 1, 1, NULL, NULL),
(195, 'Sierra Leone', 'SL', '+232', 'Sierra Leonean leone', 'Le', 'SLL', NULL, 1, 1, NULL, NULL),
(196, 'Singapore', 'SG', '+65', 'Singapore dollar', '$', 'SGD', 'SGD.png', 2, 1, NULL, NULL),
(197, 'Slovakia', 'SK', '+421', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(198, 'Slovenia', 'SI', '+386', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(199, 'Solomon Islands', 'SB', '+677', 'Solomon Islands doll', '$', 'SBD', NULL, 1, 1, NULL, NULL),
(200, 'Somalia', 'SO', '+252', 'Somali shilling', 'Sh', 'SOS', NULL, 1, 1, NULL, NULL),
(201, 'South Africa', 'ZA', '+27', 'South African rand', 'R', 'ZAR', NULL, 1, 1, NULL, NULL),
(203, 'Spain', 'ES', '+34', 'Euro', '€', 'EUR', NULL, 1, 1, NULL, NULL),
(204, 'Sri Lanka', 'LK', '+94', 'Sri Lankan rupee', 'Rs or රු', 'LKR', NULL, 1, 1, NULL, NULL),
(205, 'Sudan', 'SD', '+249', 'Sudanese pound', 'ج.س.', 'SDG', NULL, 1, 1, NULL, NULL),
(206, 'Suriname', 'SR', '+597', 'Surinamese dollar', '$', 'SRD', NULL, 1, 1, NULL, NULL),
(208, 'Swaziland', 'SZ', '+268', 'Swazi lilangeni', 'L', 'SZL', NULL, 1, 1, NULL, NULL),
(209, 'Sweden', 'SE', '+46', 'Swedish krona', 'kr', 'SEK', 'SEK.png', 2, 1, NULL, NULL),
(210, 'Switzerland', 'CH', '+41', 'Swiss franc', 'Fr', 'CHF', 'CHF.png', 2, 1, NULL, NULL),
(212, 'Taiwan', 'TW', '+886', 'New Taiwan dollar', '$', 'TWD', NULL, 1, 1, NULL, NULL),
(213, 'Tajikistan', 'TJ', '+992', 'Tajikistani somoni', 'ЅМ', 'TJS', NULL, 1, 1, NULL, NULL),
(215, 'Thailand', 'TH', '+66', 'Thai baht', '฿', 'THB', NULL, 1, 1, NULL, NULL),
(217, 'Togo', 'TG', '+228', 'West African CFA fra', 'Fr', 'XOF', NULL, 1, 1, NULL, NULL),
(219, 'Tonga', 'TO', '+676', 'Tongan pa?anga', 'T$', 'TOP', NULL, 1, 1, NULL, NULL),
(220, 'Trinidad and Tobago', 'TT', '+1868', 'Trinidad and Tobago ', '$', 'TTD', NULL, 1, 1, NULL, NULL),
(221, 'Tunisia', 'TN', '+216', 'Tunisian dinar', 'د.ت', 'TND', NULL, 1, 1, NULL, NULL),
(222, 'Turkey', 'TR', '+90', 'Turkish lira', '₺', 'TRY', 'TRY.png', 2, 1, NULL, NULL),
(223, 'Turkmenistan', 'TM', '+993', 'Turkmenistan manat', 'm', 'TMT', NULL, 1, 1, NULL, NULL),
(225, 'Tuvalu', 'TV', '+688', 'Australian dollar', '$', 'AUD', NULL, 1, 1, NULL, NULL),
(226, 'Uganda', 'UG', '+256', 'Ugandan shilling', 'Sh', 'UGX', NULL, 1, 1, NULL, NULL),
(227, 'Ukraine', 'UA', '+380', 'Ukrainian hryvnia', '₴', 'UAH', NULL, 1, 1, NULL, NULL),
(228, 'United Arab Emirates', 'AE', '+971', 'United Arab Emirates', 'د.إ', 'AED', 'AED.png', 2, 1, NULL, NULL),
(229, 'United Kingdom', 'GB', '+44', 'British pound', '£', 'GBP', 'GBP.png', 2, 1, NULL, NULL),
(230, 'United States', 'US', '+1', 'United States dollar', '$', 'USD', 'USD.png', 2, 1, NULL, NULL),
(231, 'Uruguay', 'UY', '+598', 'Uruguayan peso', '$', 'UYU', NULL, 1, 1, NULL, NULL),
(232, 'Uzbekistan', 'UZ', '+998', 'Uzbekistani som', '', 'UZS', NULL, 1, 1, NULL, NULL),
(233, 'Vanuatu', 'VU', '+678', 'Vanuatu vatu', 'Vt', 'VUV', NULL, 1, 1, NULL, NULL),
(235, 'Vietnam', 'VN', '+84', 'Vietnamese ??ng', '₫', 'VND', NULL, 1, 1, NULL, NULL),
(238, 'Wallis and Futuna', 'WF', '+681', 'CFP franc', 'Fr', 'XPF', NULL, 1, 1, NULL, NULL),
(239, 'Yemen', 'YE', '+967', 'Yemeni rial', '﷼', 'YER', NULL, 1, 1, NULL, NULL),
(240, 'Zambia', 'ZM', '+260', 'Zambian kwacha', 'ZK', 'ZMW', NULL, 1, 1, NULL, NULL),
(241, 'Zimbabwe', 'ZW', '+263', 'Botswana pula', 'P', 'BWP', NULL, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('flat','percentage') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'flat',
  `method` enum('coupons','vouchers') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'coupons',
  `amount` double(8,2) NOT NULL,
  `maximum_discount_amount` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date_time` datetime NOT NULL,
  `end_date_time` datetime NOT NULL,
  `max_total_usage` int(11) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('manual','debit','credit','zelle') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'manual',
  `percentage` double(8,2) NOT NULL DEFAULT 0.00,
  `is_zelle` tinyint(4) DEFAULT 0 COMMENT '0: Not zelle, 1: Zelle	',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `type`, `percentage`, `is_zelle`, `created_at`, `updated_at`) VALUES
(1, 'manual', 9.00, 0, '2020-11-19 00:41:36', '2021-03-30 04:27:26'),
(3, 'credit', 30.00, 0, '2020-11-19 04:07:01', '2020-11-19 04:27:31'),
(4, 'debit', 30.00, 0, '2020-11-21 01:52:42', '2021-03-14 23:43:49'),
(5, 'zelle', 10.00, 1, '2021-02-15 08:13:01', '2021-02-15 08:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_06_25_053629_create_configurations_table', 1),
(4, '2020_06_25_093736_create_subscriptions_table', 1),
(5, '2020_07_02_050331_create_contacts_table', 1),
(6, '2020_07_07_061121_create_testimonials_table', 1),
(7, '2020_07_27_031911_create_coupons_table', 1),
(8, '2020_08_06_105249_create_payment_options_table', 1),
(9, '2020_08_07_070357_create_countries_table', 1),
(10, '2020_08_07_070358_create_currencies_table', 1),
(11, '2020_08_07_091850_create_states_table', 1),
(12, '2020_08_07_113326_create_stores_table', 1),
(13, '2020_08_10_075144_create_bank_details_table', 1),
(14, '2020_08_10_101705_create_transactions_table', 1),
(15, '2020_11_05_055124_create_fees_table', 1),
(16, '2020_11_05_063319_create_bank_fields_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('user1@yopmail.com', '8b3gxHn4BNXXE8J365FmWOITBU3T5Qn5o9XZrTTtcpGP5egSWpl5KsEfZDfB', '2020-11-20 06:26:44'),
('user1@yopmail.com', 'kOWK27axDwRj0HdoiC4m0wOaqLemJ8dSM7WUZJaH9e4VWwwdIIICpKo9tBJT', '2020-11-20 06:34:52'),
('testapi1@yopmail.com', 'QPob4zTOreYXBGAfCHfLRDptShMspM9Je24MpBmTGkls8FXwGbhFJDU0znQb', '2020-12-30 05:32:49'),
('testapi1@yopmail.com', 'NIoBlCRilHY2AagRDRybS5IbPGRbvMuM0WFIdb7Y7VT58Nni47faFbLG5q3X', '2020-12-30 05:40:13'),
('test1@gmail.com', 'QOcwbw4FL3KeezRHsl7tQN2mOrsuRcVhfIiyv6vgH1LAJ4uXKqi7BeO7Dmij', '2020-12-30 05:41:17'),
('user1@yopmail.com', 'fKsCpQzxPALNZpaAg4AvqkdhyKcC0XLf1qbKZhOTvYvkn13ESsfu3fNU7b43', '2021-01-22 04:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `payment_options`
--

CREATE TABLE `payment_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_options`
--

INSERT INTO `payment_options` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'bank_transfer', 1, NULL, NULL),
(2, 'bill_payment', 1, NULL, NULL),
(3, 'airtime_top_up', 1, NULL, NULL),
(4, 'store', 1, NULL, NULL),
(5, 'cash', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recipients`
--

CREATE TABLE `recipients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `recipient_country_id` int(11) NOT NULL,
  `recipient_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipient_first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipient_last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipient_zelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipients`
--

INSERT INTO `recipients` (`id`, `user_id`, `recipient_country_id`, `recipient_email`, `recipient_first_name`, `recipient_last_name`, `recipient_zelle`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 98, 'u1@yopmail.com', 'Fname', 'Lname', NULL, '2021-01-19 00:14:35', '2020-12-21 08:47:43', '2021-01-19 00:14:35'),
(2, 7, 98, 'anandi.technomads@gmail.com', 'Anandi', 'sheladiya', NULL, NULL, '2020-12-23 01:03:26', '2020-12-23 01:03:26'),
(3, 12, 98, 'anandi@technomads.in', 'Anandi', 'Sheladiya', NULL, NULL, '2020-12-24 01:24:01', '2020-12-24 01:24:01'),
(4, 13, 230, 'patel@gmail.com', 'Guatam', 'patel', NULL, NULL, '2020-12-24 06:10:36', '2020-12-24 06:10:36'),
(5, 18, 230, 'ghyv@gfrsw.com', 'fhyy', 'gvy', NULL, NULL, '2021-01-01 00:25:32', '2021-01-01 00:25:32'),
(6, 14, 230, 'anandi.technomads@gmail.com', 'Anandi', 'sheladiya', NULL, '2021-02-22 23:29:13', '2021-01-03 23:41:25', '2021-02-22 23:29:13'),
(7, 3, 98, 'a@gmail.com', 'new', 'holder', NULL, NULL, '2021-01-07 11:17:05', '2021-01-07 11:17:05'),
(8, 3, 98, 'a@gmail.com', 'new', 'holder', NULL, NULL, '2021-01-07 11:18:06', '2021-01-07 11:18:06'),
(9, 3, 98, 'a@gmail.com', 'anandi', 'new', NULL, NULL, '2021-01-07 11:29:35', '2021-01-07 11:29:35'),
(10, 3, 98, 'a@gmail.com', 'anandi', 'new', NULL, NULL, '2021-01-07 11:31:01', '2021-01-07 11:31:01'),
(11, 3, 98, 'a@gmail.com', 'anandi', 'new', NULL, NULL, '2021-01-15 01:38:58', '2021-01-15 01:38:58'),
(12, 3, 98, 'a@gmail.com', 'anandi', 'new', NULL, NULL, '2021-01-15 01:39:33', '2021-01-15 01:39:33'),
(13, 23, 98, 'raju53@yopmail.com', 'raju', 'patel', NULL, NULL, '2021-01-15 07:48:06', '2021-01-15 07:48:06'),
(14, 23, 230, 'ravi@gmail.com', 'ravi', 'patel', NULL, NULL, '2021-01-15 08:15:13', '2021-01-15 08:15:13'),
(15, 23, 98, 'raj@gmail.com', 'raj', 'patel', NULL, NULL, '2021-01-15 08:17:32', '2021-01-15 08:17:32'),
(16, 23, 230, 'hardik@gmail.com', 'fd', 'dd', NULL, NULL, '2021-01-15 22:52:20', '2021-01-15 22:52:20'),
(17, 23, 230, 'hardik@gmail.com', 'piyush', 'patel', NULL, NULL, '2021-01-15 23:09:14', '2021-01-15 23:09:14'),
(18, 14, 230, 'hardik@gmail.com', 'trsdj', 'ghj', NULL, '2021-01-19 08:01:14', '2021-01-16 03:33:55', '2021-01-19 08:01:14'),
(19, 3, 230, 'mayur@gmail.com', 'mayur', 'p', NULL, '2021-01-19 00:15:08', '2021-01-16 08:00:19', '2021-01-19 00:15:08'),
(20, 3, 230, 'pranav.technomads@gmail.com', 'Pranav', 'Begade', NULL, NULL, '2021-01-16 08:56:43', '2021-01-16 08:56:43'),
(21, 24, 230, 'pranavbegade@gmail.com', 'Pranav', 'Begade', NULL, NULL, '2021-01-16 09:05:45', '2021-01-16 09:05:45'),
(22, 24, 230, 'pranavbegade@gmail.com', 'Pranav', 'Begade', NULL, NULL, '2021-01-16 09:06:00', '2021-01-16 09:06:00'),
(23, 24, 230, 'pranavbegade@gmail.com', 'Pranav', 'Begade', NULL, NULL, '2021-01-16 09:06:14', '2021-01-16 09:06:14'),
(24, 24, 230, 'pranavbegade@gmail.com', 'Pranav', 'Begade', NULL, NULL, '2021-01-16 09:06:17', '2021-01-16 09:06:17'),
(25, 3, 14, 'a@gmail.com', 'daya', 'patel', NULL, NULL, '2021-01-16 09:07:01', '2021-01-16 09:07:01'),
(26, 3, 230, 'a@gmail.com', 'anandi', 'sheladiya', NULL, NULL, '2021-01-17 22:36:52', '2021-01-17 22:36:52'),
(27, 3, 98, 'pranav@technomads.in', 'Pranav', 'begade', NULL, NULL, '2021-01-18 00:27:25', '2021-01-18 00:27:25'),
(28, 3, 98, 'u1@yopmail.com', 'Fname', 'Lname', NULL, NULL, '2021-01-18 09:04:24', '2021-01-18 09:04:24'),
(29, 25, 98, 'pranavvvbegade@gmail.com', 'Pranav', 'Begade', NULL, NULL, '2021-01-18 09:35:08', '2021-01-18 09:35:08'),
(30, 25, 98, 'pranavvvbegade@gmail.com', 'Pranav', 'Begade', NULL, NULL, '2021-01-18 09:35:20', '2021-01-18 09:35:20'),
(31, 25, 98, 'pranavvvbegade@gmail.com', 'Pranav', 'Begade', NULL, NULL, '2021-01-18 09:35:28', '2021-01-18 09:35:28'),
(32, 25, 98, 'pranavvvbegade@gmail.com', 'Pranav', 'Begade', NULL, NULL, '2021-01-18 09:35:31', '2021-01-18 09:35:31'),
(33, 25, 230, 'pranavvbegade@gmail.com', 'Pranav', 'Begade', NULL, NULL, '2021-01-18 09:41:15', '2021-01-18 09:41:15'),
(34, 25, 230, 'pranavvbegade@gmail.com', 'Pranav', 'Begade', NULL, NULL, '2021-01-18 09:44:19', '2021-01-18 09:44:19'),
(35, 25, 230, 'pranavvbegade@gmail.com', 'Pranav', 'Begade', NULL, NULL, '2021-01-18 09:45:37', '2021-01-18 09:45:37'),
(36, 25, 230, 'pranavvbegade@gmail.com', 'Pranav', 'Begade', NULL, NULL, '2021-01-18 09:47:44', '2021-01-18 09:47:44'),
(37, 26, 230, 'p@gmail.com', 'Pranav', 'begade', NULL, NULL, '2021-01-18 22:36:19', '2021-01-18 22:36:19'),
(38, 27, 230, 'rajpatel@gmail.com', 'raj', 'patel', NULL, '2021-01-19 00:31:39', '2021-01-18 23:15:04', '2021-01-19 00:31:39'),
(39, 27, 230, 'rajpatel@gmail.com', 'raj', 'patel', NULL, NULL, '2021-01-18 23:30:15', '2021-01-18 23:30:15'),
(40, 3, 98, 'patel@gmail.com', 'Guatam', 'patel', NULL, NULL, '2021-01-19 00:18:39', '2021-01-19 00:18:39'),
(41, 27, 230, 'amit@gmail.com', 'amit', 'p', NULL, NULL, '2021-01-19 01:01:39', '2021-01-19 01:01:39'),
(42, 27, 98, 'a@gnail.com', 'y', 'e', NULL, '2021-01-19 01:07:45', '2021-01-19 01:07:37', '2021-01-19 01:07:45'),
(43, 3, 98, 'dhruv@technomads.in', 'Dhruvik', 'Dhanani', NULL, '2021-01-19 03:48:26', '2021-01-19 03:10:28', '2021-01-19 03:48:26'),
(44, 3, 98, 'technom@hardik.in', 'Hardin', 'Technomads', NULL, '2021-01-19 03:48:32', '2021-01-19 03:29:17', '2021-01-19 03:48:32'),
(45, 3, 98, 'techno@mads.in', 'Dhruvik', 'Dhanani', NULL, NULL, '2021-01-19 03:43:03', '2021-01-19 03:43:03'),
(46, 14, 98, 'hardik@gmail.com', 'hardik', 'patwl', NULL, NULL, '2021-01-19 08:01:54', '2021-01-19 08:01:54'),
(47, 28, 98, 'efwe@efw.few', 'fname', 'lname', NULL, NULL, '2021-01-20 03:21:43', '2021-01-20 03:21:43'),
(48, 29, 230, 'dhruvik@gmail.com', 'dhruvik', 'dhanani', NULL, NULL, '2021-01-22 03:49:39', '2021-01-22 03:49:39'),
(49, 29, 230, 'dhruvik@gmail.com', 'dhruvik', 'dhanani', NULL, NULL, '2021-01-22 03:49:52', '2021-01-22 03:49:52'),
(50, 29, 230, 'dhruvik@gmail.com', 'dhruvik', 'dhanani', NULL, NULL, '2021-01-22 03:50:03', '2021-01-22 03:50:03'),
(51, 29, 230, 'dhruvik@gmail.com', 'dhruvik', 'dhanani', NULL, NULL, '2021-01-22 03:50:09', '2021-01-22 03:50:09'),
(52, 29, 230, 'dhruvik@gmail.com', 'dhruvik', 'dhanani', NULL, NULL, '2021-01-22 03:50:14', '2021-01-22 03:50:14'),
(53, 29, 230, 'dhruvik@gmail.com', 'dhruvik', 'dhanani', NULL, NULL, '2021-01-22 03:50:23', '2021-01-22 03:50:23'),
(54, 3, 230, 'doziehiogu@yahoo.com', 'Dozie', 'Ozed', NULL, NULL, '2021-01-22 06:22:13', '2021-01-22 06:22:13'),
(55, 24, 227, 'both@gmail.com', 'nothing', 'nothing', NULL, NULL, '2021-01-22 08:05:30', '2021-01-22 08:05:30'),
(56, 24, 227, 'both@gmail.com', 'nothing', 'nothing', NULL, NULL, '2021-01-22 08:05:38', '2021-01-22 08:05:38'),
(57, 24, 227, 'both@gmail.com', 'nothing', 'nothing', NULL, NULL, '2021-01-22 08:05:42', '2021-01-22 08:05:42'),
(58, 3, 98, 'Pranav@gmail.com', 'pranav', 'begade', NULL, NULL, '2021-01-25 06:03:11', '2021-01-25 06:03:11'),
(59, 31, 230, 'anandi.technomads@gmail.com', 'Anandi', 'sheladiya', NULL, NULL, '2021-02-19 05:33:24', '2021-02-19 05:33:24'),
(60, 31, 230, 'anandi.technomads@gmail.com', 'Anandi', 'sheladiya', NULL, NULL, '2021-02-19 05:33:33', '2021-02-19 05:33:33'),
(61, 31, 230, 'anandi.technomads@gmail.com', 'Anandi', 'sheladiya', NULL, NULL, '2021-02-19 05:33:36', '2021-02-19 05:33:36'),
(62, 31, 230, 'anandi.technomads@gmail.com', 'Anandi', 'sheladiya', NULL, NULL, '2021-02-19 05:33:51', '2021-02-19 05:33:51'),
(63, 31, 230, 'anandi.technomads@gmail.com', 'Anandi', 'sheladiya', NULL, NULL, '2021-02-19 05:34:00', '2021-02-19 05:34:00'),
(64, 33, 230, 'bdsh@hdh.can', 'DVD', 'DJs', 'HD HDR', NULL, '2021-02-24 01:58:32', '2021-02-24 01:58:32'),
(65, 36, 95, 'tester@gmail.com', 'Tester', 'Technomads', NULL, NULL, '2021-03-30 04:17:37', '2021-03-30 04:17:37'),
(66, 36, 95, 'tester@gmail.com', 'Tester', 'Technomads', NULL, NULL, '2021-03-30 04:38:14', '2021-04-15 23:18:24'),
(67, 36, 95, 'tester@gmail.com', 'Tester', 'Technomads', NULL, NULL, '2021-03-30 06:07:46', '2021-03-30 06:07:46'),
(68, 37, 95, 'kinjal.technomads@gmail.com', 'kinjal', 'Technomads', NULL, NULL, '2021-03-31 22:22:50', '2021-03-31 22:22:50'),
(69, 39, 95, 'gshdjxgg@gmail.com', 'ysjgbxnvbx', 'gdjgbf', NULL, NULL, '2021-04-14 06:16:17', '2021-04-14 06:16:17'),
(70, 39, 98, 'dhdhvh@gmail.com', 'vrgkgk', 'gdshvg', NULL, NULL, '2021-04-14 06:21:01', '2021-04-14 06:21:01'),
(71, 38, 98, 'tejhty@gmail.com', 'dgtrj', 'dw', NULL, NULL, '2021-04-14 23:29:15', '2021-04-14 23:29:15'),
(72, 40, 98, 'Testerkp@gmail.com', 'Kinjal', 'Tester', NULL, '2021-04-15 01:28:56', '2021-04-15 01:22:00', '2021-04-15 01:28:56'),
(73, 40, 98, 'Testerkp@gmail.com', 'Kinjal', 'Tester', NULL, '2021-04-15 01:52:28', '2021-04-15 01:22:04', '2021-04-15 01:52:28'),
(74, 40, 98, 'Testerkp@gmail.com', 'Kinjal', 'Tester', NULL, NULL, '2021-04-15 01:22:16', '2021-04-15 01:22:16'),
(75, 40, 98, 'Testerkp@gmail.com', 'Kinjal', 'Tester', NULL, NULL, '2021-04-15 01:22:27', '2021-04-15 01:22:27'),
(76, 40, 98, 'Testerkp@gmail.com', 'Kinjal', 'Tester', NULL, NULL, '2021-04-15 01:22:45', '2021-04-15 01:22:45'),
(77, 40, 98, 'Testerkp@gmail.com', 'Kinjal', 'Tester', NULL, NULL, '2021-04-15 01:23:02', '2021-04-15 01:23:02'),
(78, 40, 98, 'Testerkp@gmail.com', 'Kinjal', 'Tester', NULL, NULL, '2021-04-15 01:23:05', '2021-04-15 01:23:05'),
(79, 40, 98, 'Testerkp@gmail.com', 'Kinjal', 'Tester', NULL, NULL, '2021-04-15 01:23:07', '2021-04-15 01:23:07'),
(80, 40, 98, 'Testerkp@gmail.com', 'Kinjal', 'Tester', NULL, NULL, '2021-04-15 01:23:09', '2021-04-15 01:23:09'),
(81, 40, 98, 'Testerkp@gmail.com', 'Kinjal', 'Tester', NULL, NULL, '2021-04-15 01:23:28', '2021-04-15 01:23:28'),
(82, 40, 98, 'Testerkp@gmail.com', 'Kinjal', 'Tester', NULL, NULL, '2021-04-15 01:25:45', '2021-04-15 01:25:45'),
(83, 40, 98, 'Testerkp@gmail.com', 'Kinjal', 'Tester', NULL, NULL, '2021-04-15 01:25:52', '2021-04-15 01:25:52'),
(84, 40, 98, 'Testerkp@gmail.com', 'Kinjal', 'Tester', NULL, NULL, '2021-04-15 01:25:54', '2021-04-15 01:25:54'),
(85, 40, 98, 'Testerkp@gmail.com', 'Kinjal', 'Tester', NULL, NULL, '2021-04-15 01:25:56', '2021-04-15 01:25:56'),
(86, 40, 98, 'Testerkp@gmail.com', 'Kinjal', 'Tester', NULL, NULL, '2021-04-15 01:25:58', '2021-04-15 01:25:58'),
(87, 40, 98, 'Testerkp@gmail.com', 'Kinjal', 'Tester', NULL, NULL, '2021-04-15 01:26:07', '2021-04-15 01:26:07'),
(88, 40, 98, 'Testerkp@gmail.com', 'Kinjal', 'Tester', NULL, NULL, '2021-04-15 01:26:08', '2021-04-15 01:26:08'),
(89, 39, 95, 'kinjal@gmail.com', 'prajapati', 'kinjal', NULL, NULL, '2021-04-15 05:00:19', '2021-04-15 05:00:19'),
(90, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, '2021-04-15 23:42:51', '2021-04-15 23:33:24', '2021-04-15 23:42:51'),
(91, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, NULL, '2021-04-15 23:33:25', '2021-04-15 23:33:25'),
(92, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, '2021-04-15 23:42:46', '2021-04-15 23:33:28', '2021-04-15 23:42:46'),
(93, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, '2021-04-15 23:42:56', '2021-04-15 23:33:29', '2021-04-15 23:42:56'),
(94, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, '2021-04-15 23:43:01', '2021-04-15 23:33:30', '2021-04-15 23:43:01'),
(95, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, '2021-04-15 23:42:16', '2021-04-15 23:33:32', '2021-04-15 23:42:16'),
(96, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, '2021-04-15 23:42:03', '2021-04-15 23:33:48', '2021-04-15 23:42:03'),
(97, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, '2021-04-15 23:41:55', '2021-04-15 23:33:50', '2021-04-15 23:41:55'),
(98, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, '2021-04-15 23:41:59', '2021-04-15 23:33:52', '2021-04-15 23:41:59'),
(99, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, '2021-04-15 23:42:11', '2021-04-15 23:34:05', '2021-04-15 23:42:11'),
(100, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, '2021-04-15 23:42:07', '2021-04-15 23:34:08', '2021-04-15 23:42:07'),
(101, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, '2021-04-15 23:42:20', '2021-04-15 23:34:10', '2021-04-15 23:42:20'),
(102, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, '2021-04-15 23:42:38', '2021-04-15 23:34:29', '2021-04-15 23:42:38'),
(103, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, '2021-04-15 23:42:25', '2021-04-15 23:34:31', '2021-04-15 23:42:25'),
(104, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, '2021-04-15 23:41:49', '2021-04-15 23:34:33', '2021-04-15 23:41:49'),
(105, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, '2021-04-15 23:42:30', '2021-04-15 23:34:35', '2021-04-15 23:42:30'),
(106, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, '2021-04-15 23:42:34', '2021-04-15 23:34:37', '2021-04-15 23:42:34'),
(107, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, '2021-04-15 23:42:42', '2021-04-15 23:34:40', '2021-04-15 23:42:42'),
(108, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, NULL, '2021-04-15 23:34:41', '2021-04-15 23:34:41'),
(109, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, NULL, '2021-04-15 23:34:43', '2021-04-19 02:36:43'),
(110, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, '2021-04-15 23:41:42', '2021-04-15 23:34:44', '2021-04-15 23:41:42'),
(111, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, '2021-04-15 23:38:05', '2021-04-15 23:34:46', '2021-04-15 23:38:05'),
(112, 36, 95, 'i7ok7i7t8@gmail.com', 'trtutio', 'dwfe', NULL, '2021-04-15 23:38:11', '2021-04-15 23:34:48', '2021-04-15 23:38:11'),
(113, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:12:51', '2021-04-19 03:12:51'),
(114, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:12:56', '2021-04-19 03:12:56'),
(115, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:12:59', '2021-04-19 03:12:59'),
(116, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:01', '2021-04-19 03:36:15'),
(117, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:03', '2021-04-19 03:27:03'),
(118, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:06', '2021-04-19 03:13:06'),
(119, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:07', '2021-04-19 04:30:47'),
(120, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:09', '2021-04-19 03:13:09'),
(121, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:12', '2021-04-19 03:13:12'),
(122, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:14', '2021-04-19 03:13:14'),
(123, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:17', '2021-04-19 03:13:17'),
(124, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:20', '2021-04-19 03:13:20'),
(125, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:22', '2021-04-19 03:13:22'),
(126, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:23', '2021-04-19 03:13:23'),
(127, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:27', '2021-04-19 03:13:27'),
(128, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:30', '2021-04-19 03:13:30'),
(129, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:31', '2021-04-19 03:13:31'),
(130, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:33', '2021-04-19 03:13:33'),
(131, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:35', '2021-04-19 03:13:35'),
(132, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:38', '2021-04-19 03:13:38'),
(133, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:39', '2021-04-19 03:13:39'),
(134, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:41', '2021-04-19 03:13:41'),
(135, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:43', '2021-04-19 03:13:43'),
(136, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:46', '2021-04-19 03:13:46'),
(137, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:48', '2021-04-19 03:13:48'),
(138, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:51', '2021-04-19 03:13:51'),
(139, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:52', '2021-04-19 03:13:52'),
(140, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:55', '2021-04-19 03:13:55'),
(141, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:13:56', '2021-04-19 03:13:56'),
(142, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:00', '2021-04-19 03:14:00'),
(143, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:03', '2021-04-19 03:14:03'),
(144, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:06', '2021-04-19 03:14:06'),
(145, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:08', '2021-04-19 03:14:08'),
(146, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:10', '2021-04-19 03:14:10'),
(147, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:12', '2021-04-19 03:14:12'),
(148, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:14', '2021-04-19 03:14:14'),
(149, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:15', '2021-04-19 03:14:15'),
(150, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:18', '2021-04-19 03:14:18'),
(151, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:20', '2021-04-19 03:14:20'),
(152, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:22', '2021-04-19 03:14:22'),
(153, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:25', '2021-04-19 03:14:25'),
(154, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:27', '2021-04-19 03:14:27'),
(155, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:29', '2021-04-19 03:14:29'),
(156, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:31', '2021-04-19 03:14:31'),
(157, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:34', '2021-04-19 03:14:34'),
(158, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:36', '2021-04-19 03:14:36'),
(159, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:39', '2021-04-19 03:14:39'),
(160, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:42', '2021-04-19 03:14:42'),
(161, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:44', '2021-04-19 03:14:44'),
(162, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:47', '2021-04-19 03:14:47'),
(163, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:49', '2021-04-19 03:14:49'),
(164, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:51', '2021-04-19 03:14:51'),
(165, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:53', '2021-04-19 03:14:53'),
(166, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:56', '2021-04-19 03:14:56'),
(167, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:14:59', '2021-04-19 03:14:59'),
(168, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:00', '2021-04-19 03:15:00'),
(169, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:03', '2021-04-19 03:15:03'),
(170, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:05', '2021-04-19 03:15:05'),
(171, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:07', '2021-04-19 03:15:07'),
(172, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:08', '2021-04-19 03:15:08'),
(173, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:11', '2021-04-19 03:15:11'),
(174, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:14', '2021-04-19 03:15:14'),
(175, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:15', '2021-04-19 03:15:15'),
(176, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:18', '2021-04-19 03:15:18'),
(177, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:20', '2021-04-19 03:15:20'),
(178, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:22', '2021-04-19 03:15:22'),
(179, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:24', '2021-04-19 03:15:24'),
(180, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:26', '2021-04-19 03:15:26'),
(181, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:28', '2021-04-19 03:15:28'),
(182, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:29', '2021-04-19 03:15:29'),
(183, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:32', '2021-04-19 03:15:32'),
(184, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:35', '2021-04-19 03:15:35'),
(185, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:37', '2021-04-19 03:15:37'),
(186, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:39', '2021-04-19 03:15:39'),
(187, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:41', '2021-04-19 03:15:41'),
(188, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:43', '2021-04-19 03:15:43'),
(189, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:45', '2021-04-19 03:15:45'),
(190, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:47', '2021-04-19 03:15:47'),
(191, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:50', '2021-04-19 03:15:50'),
(192, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:51', '2021-04-19 03:15:51'),
(193, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:54', '2021-04-19 03:15:54'),
(194, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:57', '2021-04-19 03:15:57'),
(195, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:15:59', '2021-04-19 03:15:59'),
(196, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:02', '2021-04-19 03:16:02'),
(197, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:05', '2021-04-19 03:16:05'),
(198, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:07', '2021-04-19 03:16:07'),
(199, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:09', '2021-04-19 03:16:09'),
(200, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:11', '2021-04-19 03:16:11'),
(201, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:13', '2021-04-19 03:16:13'),
(202, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:16', '2021-04-19 03:16:16'),
(203, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:18', '2021-04-19 03:16:18'),
(204, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:19', '2021-04-19 03:16:19'),
(205, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:21', '2021-04-19 03:16:21'),
(206, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:23', '2021-04-19 03:16:23'),
(207, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:25', '2021-04-19 03:16:25'),
(208, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:26', '2021-04-19 03:16:26'),
(209, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:29', '2021-04-19 03:16:29'),
(210, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:32', '2021-04-19 03:16:32'),
(211, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:35', '2021-04-19 03:16:35'),
(212, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:38', '2021-04-19 03:16:38'),
(213, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:39', '2021-04-19 03:16:39'),
(214, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:43', '2021-04-19 03:16:43'),
(215, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:47', '2021-04-19 03:16:47'),
(216, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:48', '2021-04-19 03:16:48'),
(217, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:50', '2021-04-19 03:16:50'),
(218, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:52', '2021-04-19 03:16:52'),
(219, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:54', '2021-04-19 03:16:54'),
(220, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:56', '2021-04-19 03:16:56'),
(221, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:16:59', '2021-04-19 03:16:59'),
(222, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:17:02', '2021-04-19 03:17:02'),
(223, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:17:03', '2021-04-19 03:17:03'),
(224, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:17:06', '2021-04-19 03:17:06'),
(225, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:17:08', '2021-04-19 03:17:08'),
(226, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:17:11', '2021-04-19 03:17:11'),
(227, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:17:14', '2021-04-19 03:17:14'),
(228, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:17:16', '2021-04-19 03:17:16'),
(229, 36, 98, 'jigneshjp21@live.com', 'Jignesh', 'Prajapati', NULL, NULL, '2021-04-19 03:17:18', '2021-04-19 03:17:18'),
(230, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:20:11', '2021-04-19 03:20:11'),
(231, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:20:13', '2021-04-19 03:20:13'),
(232, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:20:14', '2021-04-19 03:20:14'),
(233, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:20:16', '2021-04-19 03:20:16'),
(234, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:20:18', '2021-04-19 03:20:18'),
(235, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:20:19', '2021-04-19 03:20:19'),
(236, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:20:22', '2021-04-19 03:20:22'),
(237, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:20:23', '2021-04-19 03:20:23'),
(238, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:20:25', '2021-04-19 03:20:25'),
(239, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:20:26', '2021-04-19 03:20:26'),
(240, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:20:29', '2021-04-19 03:20:29'),
(241, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:20:31', '2021-04-19 03:20:31'),
(242, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:20:32', '2021-04-19 03:20:32'),
(243, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:21:53', '2021-04-19 03:21:53'),
(244, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:21:55', '2021-04-19 03:21:55'),
(245, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:21:57', '2021-04-19 03:21:57'),
(246, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:21:59', '2021-04-19 03:21:59'),
(247, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:22:02', '2021-04-19 03:22:02'),
(248, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:22:03', '2021-04-19 03:22:03'),
(249, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:22:05', '2021-04-19 03:22:05'),
(250, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:22:08', '2021-04-19 03:22:08'),
(251, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:22:09', '2021-04-19 03:22:09'),
(252, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:22:11', '2021-04-19 03:22:11'),
(253, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:22:13', '2021-04-19 03:22:13'),
(254, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, NULL, '2021-04-19 03:22:15', '2021-04-19 03:22:15'),
(255, 36, 98, 'jigneshjp21@live.com', 'JIGNESH', 'PRAJAPATI', NULL, '2021-04-19 03:24:42', '2021-04-19 03:22:18', '2021-04-19 03:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `country_code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `country_code`, `name`, `code`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 244, 'US', 'Alabama', 'AL', 1, NULL, NULL),
(2, 244, 'US', 'Alaska', 'AK', 1, NULL, NULL),
(3, 244, 'US', 'American Samoa', 'AS', 1, NULL, NULL),
(4, 244, 'US', 'Arizona', 'AZ', 1, NULL, NULL),
(5, 244, 'US', 'Arkansas', 'AR', 1, NULL, NULL),
(6, 244, 'US', 'Armed Forces Africa', 'AE', 1, NULL, NULL),
(7, 244, 'US', 'Armed Forces Americas', 'AA', 1, NULL, NULL),
(8, 244, 'US', 'Armed Forces Canada', 'AE', 1, NULL, NULL),
(9, 244, 'US', 'Armed Forces Europe', 'AE', 1, NULL, NULL),
(10, 244, 'US', 'Armed Forces Middle East', 'AE', 1, NULL, NULL),
(11, 244, 'US', 'Armed Forces Pacific', 'AP', 1, NULL, NULL),
(12, 244, 'US', 'California', 'CA', 1, NULL, NULL),
(13, 244, 'US', 'Colorado', 'CO', 1, NULL, NULL),
(14, 244, 'US', 'Connecticut', 'CT', 1, NULL, NULL),
(15, 244, 'US', 'Delaware', 'DE', 1, NULL, NULL),
(16, 244, 'US', 'District of Columbia', 'DC', 1, NULL, NULL),
(17, 244, 'US', 'Federated States Of Micronesia', 'FM', 1, NULL, NULL),
(18, 244, 'US', 'Florida', 'FL', 1, NULL, NULL),
(19, 244, 'US', 'Georgia', 'GA', 1, NULL, NULL),
(20, 244, 'US', 'Guam', 'GU', 1, NULL, NULL),
(21, 244, 'US', 'Hawaii', 'HI', 1, NULL, NULL),
(22, 244, 'US', 'Idaho', 'ID', 1, NULL, NULL),
(23, 244, 'US', 'Illinois', 'IL', 1, NULL, NULL),
(24, 244, 'US', 'Indiana', 'IN', 1, NULL, NULL),
(25, 244, 'US', 'Iowa', 'IA', 1, NULL, NULL),
(26, 244, 'US', 'Kansas', 'KS', 1, NULL, NULL),
(27, 244, 'US', 'Kentucky', 'KY', 1, NULL, NULL),
(28, 244, 'US', 'Louisiana', 'LA', 1, NULL, NULL),
(29, 244, 'US', 'Maine', 'ME', 1, NULL, NULL),
(30, 244, 'US', 'Marshall Islands', 'MH', 1, NULL, NULL),
(31, 244, 'US', 'Maryland', 'MD', 1, NULL, NULL),
(32, 244, 'US', 'Massachusetts', 'MA', 1, NULL, NULL),
(33, 244, 'US', 'Michigan', 'MI', 1, NULL, NULL),
(34, 244, 'US', 'Minnesota', 'MN', 1, NULL, NULL),
(35, 244, 'US', 'Mississippi', 'MS', 1, NULL, NULL),
(36, 244, 'US', 'Missouri', 'MO', 1, NULL, NULL),
(37, 244, 'US', 'Montana', 'MT', 1, NULL, NULL),
(38, 244, 'US', 'Nebraska', 'NE', 1, NULL, NULL),
(39, 244, 'US', 'Nevada', 'NV', 1, NULL, NULL),
(40, 244, 'US', 'New Hampshire', 'NH', 1, NULL, NULL),
(41, 244, 'US', 'New Jersey', 'NJ', 1, NULL, NULL),
(42, 244, 'US', 'New Mexico', 'NM', 1, NULL, NULL),
(43, 244, 'US', 'New York', 'NY', 1, NULL, NULL),
(44, 244, 'US', 'North Carolina', 'NC', 1, NULL, NULL),
(45, 244, 'US', 'North Dakota', 'ND', 1, NULL, NULL),
(46, 244, 'US', 'Northern Mariana Islands', 'MP', 1, NULL, NULL),
(47, 244, 'US', 'Ohio', 'OH', 1, NULL, NULL),
(48, 244, 'US', 'Oklahoma', 'OK', 1, NULL, NULL),
(49, 244, 'US', 'Oregon', 'OR', 1, NULL, NULL),
(50, 244, 'US', 'Palau', 'PW', 1, NULL, NULL),
(51, 244, 'US', 'Pennsylvania', 'PA', 1, NULL, NULL),
(52, 244, 'US', 'Puerto Rico', 'PR', 1, NULL, NULL),
(53, 244, 'US', 'Rhode Island', 'RI', 1, NULL, NULL),
(54, 244, 'US', 'South Carolina', 'SC', 1, NULL, NULL),
(55, 244, 'US', 'South Dakota', 'SD', 1, NULL, NULL),
(56, 244, 'US', 'Tennessee', 'TN', 1, NULL, NULL),
(57, 244, 'US', 'Texas', 'TX', 1, NULL, NULL),
(58, 244, 'US', 'Utah', 'UT', 1, NULL, NULL),
(59, 244, 'US', 'Vermont', 'VT', 1, NULL, NULL),
(60, 244, 'US', 'Virgin Islands', 'VI', 1, NULL, NULL),
(61, 244, 'US', 'Virginia', 'VA', 1, NULL, NULL),
(62, 244, 'US', 'Washington', 'WA', 1, NULL, NULL),
(63, 244, 'US', 'West Virginia', 'WV', 1, NULL, NULL),
(64, 244, 'US', 'Wisconsin', 'WI', 1, NULL, NULL),
(65, 244, 'US', 'Wyoming', 'WY', 1, NULL, NULL),
(66, 40, 'CA', 'Alberta', 'AB', 1, NULL, NULL),
(67, 40, 'CA', 'British Columbia', 'BC', 1, NULL, NULL),
(68, 40, 'CA', 'Manitoba', 'MB', 1, NULL, NULL),
(69, 40, 'CA', 'Newfoundland and Labrador', 'NL', 1, NULL, NULL),
(70, 40, 'CA', 'New Brunswick', 'NB', 1, NULL, NULL),
(71, 40, 'CA', 'Nova Scotia', 'NS', 1, NULL, NULL),
(72, 40, 'CA', 'Northwest Territories', 'NT', 1, NULL, NULL),
(73, 40, 'CA', 'Nunavut', 'NU', 1, NULL, NULL),
(74, 40, 'CA', 'Ontario', 'ON', 1, NULL, NULL),
(75, 40, 'CA', 'Prince Edward Island', 'PE', 1, NULL, NULL),
(76, 40, 'CA', 'Quebec', 'QC', 1, NULL, NULL),
(77, 40, 'CA', 'Saskatchewan', 'SK', 1, NULL, NULL),
(78, 40, 'CA', 'Yukon Territory', 'YT', 1, NULL, NULL),
(79, 88, 'DE', 'Niedersachsen', 'NDS', 1, NULL, NULL),
(80, 88, 'DE', 'Baden-Württemberg', 'BAW', 1, NULL, NULL),
(81, 88, 'DE', 'Bayern', 'BAY', 1, NULL, NULL),
(82, 88, 'DE', 'Berlin', 'BER', 1, NULL, NULL),
(83, 88, 'DE', 'Brandenburg', 'BRG', 1, NULL, NULL),
(84, 88, 'DE', 'Bremen', 'BRE', 1, NULL, NULL),
(85, 88, 'DE', 'Hamburg', 'HAM', 1, NULL, NULL),
(86, 88, 'DE', 'Hessen', 'HES', 1, NULL, NULL),
(87, 88, 'DE', 'Mecklenburg-Vorpommern', 'MEC', 1, NULL, NULL),
(88, 88, 'DE', 'Nordrhein-Westfalen', 'NRW', 1, NULL, NULL),
(89, 88, 'DE', 'Rheinland-Pfalz', 'RHE', 1, NULL, NULL),
(90, 88, 'DE', 'Saarland', 'SAR', 1, NULL, NULL),
(91, 88, 'DE', 'Sachsen', 'SAS', 1, NULL, NULL),
(92, 88, 'DE', 'Sachsen-Anhalt', 'SAC', 1, NULL, NULL),
(93, 88, 'DE', 'Schleswig-Holstein', 'SCN', 1, NULL, NULL),
(94, 88, 'DE', 'Thüringen', 'THE', 1, NULL, NULL),
(95, 16, 'AT', 'Wien', 'WI', 1, NULL, NULL),
(96, 16, 'AT', 'Niederösterreich', 'NO', 1, NULL, NULL),
(97, 16, 'AT', 'Oberösterreich', 'OO', 1, NULL, NULL),
(98, 16, 'AT', 'Salzburg', 'SB', 1, NULL, NULL),
(99, 16, 'AT', 'Kärnten', 'KN', 1, NULL, NULL),
(100, 16, 'AT', 'Steiermark', 'ST', 1, NULL, NULL),
(101, 16, 'AT', 'Tirol', 'TI', 1, NULL, NULL),
(102, 16, 'AT', 'Burgenland', 'BL', 1, NULL, NULL),
(103, 16, 'AT', 'Vorarlberg', 'VB', 1, NULL, NULL),
(104, 220, 'CH', 'Aargau', 'AG', 1, NULL, NULL),
(105, 220, 'CH', 'Appenzell Innerrhoden', 'AI', 1, NULL, NULL),
(106, 220, 'CH', 'Appenzell Ausserrhoden', 'AR', 1, NULL, NULL),
(107, 220, 'CH', 'Bern', 'BE', 1, NULL, NULL),
(108, 220, 'CH', 'Basel-Landschaft', 'BL', 1, NULL, NULL),
(109, 220, 'CH', 'Basel-Stadt', 'BS', 1, NULL, NULL),
(110, 220, 'CH', 'Freiburg', 'FR', 1, NULL, NULL),
(111, 220, 'CH', 'Genf', 'GE', 1, NULL, NULL),
(112, 220, 'CH', 'Glarus', 'GL', 1, NULL, NULL),
(113, 220, 'CH', 'Graubünden', 'GR', 1, NULL, NULL),
(114, 220, 'CH', 'Jura', 'JU', 1, NULL, NULL),
(115, 220, 'CH', 'Luzern', 'LU', 1, NULL, NULL),
(116, 220, 'CH', 'Neuenburg', 'NE', 1, NULL, NULL),
(117, 220, 'CH', 'Nidwalden', 'NW', 1, NULL, NULL),
(118, 220, 'CH', 'Obwalden', 'OW', 1, NULL, NULL),
(119, 220, 'CH', 'St. Gallen', 'SG', 1, NULL, NULL),
(120, 220, 'CH', 'Schaffhausen', 'SH', 1, NULL, NULL),
(121, 220, 'CH', 'Solothurn', 'SO', 1, NULL, NULL),
(122, 220, 'CH', 'Schwyz', 'SZ', 1, NULL, NULL),
(123, 220, 'CH', 'Thurgau', 'TG', 1, NULL, NULL),
(124, 220, 'CH', 'Tessin', 'TI', 1, NULL, NULL),
(125, 220, 'CH', 'Uri', 'UR', 1, NULL, NULL),
(126, 220, 'CH', 'Waadt', 'VD', 1, NULL, NULL),
(127, 220, 'CH', 'Wallis', 'VS', 1, NULL, NULL),
(128, 220, 'CH', 'Zug', 'ZG', 1, NULL, NULL),
(129, 220, 'CH', 'Zürich', 'ZH', 1, NULL, NULL),
(130, 206, 'ES', 'A Coruña', 'A Coruсa', 1, NULL, NULL),
(131, 206, 'ES', 'Alava', 'Alava', 1, NULL, NULL),
(132, 206, 'ES', 'Albacete', 'Albacete', 1, NULL, NULL),
(133, 206, 'ES', 'Alicante', 'Alicante', 1, NULL, NULL),
(134, 206, 'ES', 'Almeria', 'Almeria', 1, NULL, NULL),
(135, 206, 'ES', 'Asturias', 'Asturias', 1, NULL, NULL),
(136, 206, 'ES', 'Avila', 'Avila', 1, NULL, NULL),
(137, 206, 'ES', 'Badajoz', 'Badajoz', 1, NULL, NULL),
(138, 206, 'ES', 'Baleares', 'Baleares', 1, NULL, NULL),
(139, 206, 'ES', 'Barcelona', 'Barcelona', 1, NULL, NULL),
(140, 206, 'ES', 'Burgos', 'Burgos', 1, NULL, NULL),
(141, 206, 'ES', 'Caceres', 'Caceres', 1, NULL, NULL),
(142, 206, 'ES', 'Cadiz', 'Cadiz', 1, NULL, NULL),
(143, 206, 'ES', 'Cantabria', 'Cantabria', 1, NULL, NULL),
(144, 206, 'ES', 'Castellon', 'Castellon', 1, NULL, NULL),
(145, 206, 'ES', 'Ceuta', 'Ceuta', 1, NULL, NULL),
(146, 206, 'ES', 'Ciudad Real', 'Ciudad Real', 1, NULL, NULL),
(147, 206, 'ES', 'Cordoba', 'Cordoba', 1, NULL, NULL),
(148, 206, 'ES', 'Cuenca', 'Cuenca', 1, NULL, NULL),
(149, 206, 'ES', 'Girona', 'Girona', 1, NULL, NULL),
(150, 206, 'ES', 'Granada', 'Granada', 1, NULL, NULL),
(151, 206, 'ES', 'Guadalajara', 'Guadalajara', 1, NULL, NULL),
(152, 206, 'ES', 'Guipuzcoa', 'Guipuzcoa', 1, NULL, NULL),
(153, 206, 'ES', 'Huelva', 'Huelva', 1, NULL, NULL),
(154, 206, 'ES', 'Huesca', 'Huesca', 1, NULL, NULL),
(155, 206, 'ES', 'Jaen', 'Jaen', 1, NULL, NULL),
(156, 206, 'ES', 'La Rioja', 'La Rioja', 1, NULL, NULL),
(157, 206, 'ES', 'Las Palmas', 'Las Palmas', 1, NULL, NULL),
(158, 206, 'ES', 'Leon', 'Leon', 1, NULL, NULL),
(159, 206, 'ES', 'Lleida', 'Lleida', 1, NULL, NULL),
(160, 206, 'ES', 'Lugo', 'Lugo', 1, NULL, NULL),
(161, 206, 'ES', 'Madrid', 'Madrid', 1, NULL, NULL),
(162, 206, 'ES', 'Malaga', 'Malaga', 1, NULL, NULL),
(163, 206, 'ES', 'Melilla', 'Melilla', 1, NULL, NULL),
(164, 206, 'ES', 'Murcia', 'Murcia', 1, NULL, NULL),
(165, 206, 'ES', 'Navarra', 'Navarra', 1, NULL, NULL),
(166, 206, 'ES', 'Ourense', 'Ourense', 1, NULL, NULL),
(167, 206, 'ES', 'Palencia', 'Palencia', 1, NULL, NULL),
(168, 206, 'ES', 'Pontevedra', 'Pontevedra', 1, NULL, NULL),
(169, 206, 'ES', 'Salamanca', 'Salamanca', 1, NULL, NULL),
(170, 206, 'ES', 'Santa Cruz de Tenerife', 'Santa Cruz de Tenerife', 1, NULL, NULL),
(171, 206, 'ES', 'Segovia', 'Segovia', 1, NULL, NULL),
(172, 206, 'ES', 'Sevilla', 'Sevilla', 1, NULL, NULL),
(173, 206, 'ES', 'Soria', 'Soria', 1, NULL, NULL),
(174, 206, 'ES', 'Tarragona', 'Tarragona', 1, NULL, NULL),
(175, 206, 'ES', 'Teruel', 'Teruel', 1, NULL, NULL),
(176, 206, 'ES', 'Toledo', 'Toledo', 1, NULL, NULL),
(177, 206, 'ES', 'Valencia', 'Valencia', 1, NULL, NULL),
(178, 206, 'ES', 'Valladolid', 'Valladolid', 1, NULL, NULL),
(179, 206, 'ES', 'Vizcaya', 'Vizcaya', 1, NULL, NULL),
(180, 206, 'ES', 'Zamora', 'Zamora', 1, NULL, NULL),
(181, 206, 'ES', 'Zaragoza', 'Zaragoza', 1, NULL, NULL),
(182, 81, 'FR', 'Ain', '1', 1, NULL, NULL),
(183, 81, 'FR', 'Aisne', '2', 1, NULL, NULL),
(184, 81, 'FR', 'Allier', '3', 1, NULL, NULL),
(185, 81, 'FR', 'Alpes-de-Haute-Provence', '4', 1, NULL, NULL),
(186, 81, 'FR', 'Hautes-Alpes', '5', 1, NULL, NULL),
(187, 81, 'FR', 'Alpes-Maritimes', '6', 1, NULL, NULL),
(188, 81, 'FR', 'Ardèche', '7', 1, NULL, NULL),
(189, 81, 'FR', 'Ardennes', '8', 1, NULL, NULL),
(190, 81, 'FR', 'Ariège', '9', 1, NULL, NULL),
(191, 81, 'FR', 'Aube', '10', 1, NULL, NULL),
(192, 81, 'FR', 'Aude', '11', 1, NULL, NULL),
(193, 81, 'FR', 'Aveyron', '12', 1, NULL, NULL),
(194, 81, 'FR', 'Bouches-du-Rhône', '13', 1, NULL, NULL),
(195, 81, 'FR', 'Calvados', '14', 1, NULL, NULL),
(196, 81, 'FR', 'Cantal', '15', 1, NULL, NULL),
(197, 81, 'FR', 'Charente', '16', 1, NULL, NULL),
(198, 81, 'FR', 'Charente-Maritime', '17', 1, NULL, NULL),
(199, 81, 'FR', 'Cher', '18', 1, NULL, NULL),
(200, 81, 'FR', 'Corrèze', '19', 1, NULL, NULL),
(201, 81, 'FR', 'Corse-du-Sud', '2A', 1, NULL, NULL),
(202, 81, 'FR', 'Haute-Corse', '2B', 1, NULL, NULL),
(203, 81, 'FR', 'Côte-d\'Or', '21', 1, NULL, NULL),
(204, 81, 'FR', 'Côtes-d\'Armor', '22', 1, NULL, NULL),
(205, 81, 'FR', 'Creuse', '23', 1, NULL, NULL),
(206, 81, 'FR', 'Dordogne', '24', 1, NULL, NULL),
(207, 81, 'FR', 'Doubs', '25', 1, NULL, NULL),
(208, 81, 'FR', 'Drôme', '26', 1, NULL, NULL),
(209, 81, 'FR', 'Eure', '27', 1, NULL, NULL),
(210, 81, 'FR', 'Eure-et-Loir', '28', 1, NULL, NULL),
(211, 81, 'FR', 'Finistère', '29', 1, NULL, NULL),
(212, 81, 'FR', 'Gard', '30', 1, NULL, NULL),
(213, 81, 'FR', 'Haute-Garonne', '31', 1, NULL, NULL),
(214, 81, 'FR', 'Gers', '32', 1, NULL, NULL),
(215, 81, 'FR', 'Gironde', '33', 1, NULL, NULL),
(216, 81, 'FR', 'Hérault', '34', 1, NULL, NULL),
(217, 81, 'FR', 'Ille-et-Vilaine', '35', 1, NULL, NULL),
(218, 81, 'FR', 'Indre', '36', 1, NULL, NULL),
(219, 81, 'FR', 'Indre-et-Loire', '37', 1, NULL, NULL),
(220, 81, 'FR', 'Isère', '38', 1, NULL, NULL),
(221, 81, 'FR', 'Jura', '39', 1, NULL, NULL),
(222, 81, 'FR', 'Landes', '40', 1, NULL, NULL),
(223, 81, 'FR', 'Loir-et-Cher', '41', 1, NULL, NULL),
(224, 81, 'FR', 'Loire', '42', 1, NULL, NULL),
(225, 81, 'FR', 'Haute-Loire', '43', 1, NULL, NULL),
(226, 81, 'FR', 'Loire-Atlantique', '44', 1, NULL, NULL),
(227, 81, 'FR', 'Loiret', '45', 1, NULL, NULL),
(228, 81, 'FR', 'Lot', '46', 1, NULL, NULL),
(229, 81, 'FR', 'Lot-et-Garonne', '47', 1, NULL, NULL),
(230, 81, 'FR', 'Lozère', '48', 1, NULL, NULL),
(231, 81, 'FR', 'Maine-et-Loire', '49', 1, NULL, NULL),
(232, 81, 'FR', 'Manche', '50', 1, NULL, NULL),
(233, 81, 'FR', 'Marne', '51', 1, NULL, NULL),
(234, 81, 'FR', 'Haute-Marne', '52', 1, NULL, NULL),
(235, 81, 'FR', 'Mayenne', '53', 1, NULL, NULL),
(236, 81, 'FR', 'Meurthe-et-Moselle', '54', 1, NULL, NULL),
(237, 81, 'FR', 'Meuse', '55', 1, NULL, NULL),
(238, 81, 'FR', 'Morbihan', '56', 1, NULL, NULL),
(239, 81, 'FR', 'Moselle', '57', 1, NULL, NULL),
(240, 81, 'FR', 'Nièvre', '58', 1, NULL, NULL),
(241, 81, 'FR', 'Nord', '59', 1, NULL, NULL),
(242, 81, 'FR', 'Oise', '60', 1, NULL, NULL),
(243, 81, 'FR', 'Orne', '61', 1, NULL, NULL),
(244, 81, 'FR', 'Pas-de-Calais', '62', 1, NULL, NULL),
(245, 81, 'FR', 'Puy-de-Dôme', '63', 1, NULL, NULL),
(246, 81, 'FR', 'Pyrénées-Atlantiques', '64', 1, NULL, NULL),
(247, 81, 'FR', 'Hautes-Pyrénées', '65', 1, NULL, NULL),
(248, 81, 'FR', 'Pyrénées-Orientales', '66', 1, NULL, NULL),
(249, 81, 'FR', 'Bas-Rhin', '67', 1, NULL, NULL),
(250, 81, 'FR', 'Haut-Rhin', '68', 1, NULL, NULL),
(251, 81, 'FR', 'Rhône', '69', 1, NULL, NULL),
(252, 81, 'FR', 'Haute-Saône', '70', 1, NULL, NULL),
(253, 81, 'FR', 'Saône-et-Loire', '71', 1, NULL, NULL),
(254, 81, 'FR', 'Sarthe', '72', 1, NULL, NULL),
(255, 81, 'FR', 'Savoie', '73', 1, NULL, NULL),
(256, 81, 'FR', 'Haute-Savoie', '74', 1, NULL, NULL),
(257, 81, 'FR', 'Paris', '75', 1, NULL, NULL),
(258, 81, 'FR', 'Seine-Maritime', '76', 1, NULL, NULL),
(259, 81, 'FR', 'Seine-et-Marne', '77', 1, NULL, NULL),
(260, 81, 'FR', 'Yvelines', '78', 1, NULL, NULL),
(261, 81, 'FR', 'Deux-Sèvres', '79', 1, NULL, NULL),
(262, 81, 'FR', 'Somme', '80', 1, NULL, NULL),
(263, 81, 'FR', 'Tarn', '81', 1, NULL, NULL),
(264, 81, 'FR', 'Tarn-et-Garonne', '82', 1, NULL, NULL),
(265, 81, 'FR', 'Var', '83', 1, NULL, NULL),
(266, 81, 'FR', 'Vaucluse', '84', 1, NULL, NULL),
(267, 81, 'FR', 'Vendée', '85', 1, NULL, NULL),
(268, 81, 'FR', 'Vienne', '86', 1, NULL, NULL),
(269, 81, 'FR', 'Haute-Vienne', '87', 1, NULL, NULL),
(270, 81, 'FR', 'Vosges', '88', 1, NULL, NULL),
(271, 81, 'FR', 'Yonne', '89', 1, NULL, NULL),
(272, 81, 'FR', 'Territoire-de-Belfort', '90', 1, NULL, NULL),
(273, 81, 'FR', 'Essonne', '91', 1, NULL, NULL),
(274, 81, 'FR', 'Hauts-de-Seine', '92', 1, NULL, NULL),
(275, 81, 'FR', 'Seine-Saint-Denis', '93', 1, NULL, NULL),
(276, 81, 'FR', 'Val-de-Marne', '94', 1, NULL, NULL),
(277, 81, 'FR', 'Val-doise', '95', 1, NULL, NULL),
(278, 185, 'RO', 'Alba', 'AB', 1, NULL, NULL),
(279, 185, 'RO', 'Arad', 'AR', 1, NULL, NULL),
(280, 185, 'RO', 'Argeş', 'AG', 1, NULL, NULL),
(281, 185, 'RO', 'Bacău', 'BC', 1, NULL, NULL),
(282, 185, 'RO', 'Bihor', 'BH', 1, NULL, NULL),
(283, 185, 'RO', 'Bistriţa-Năsăud', 'BN', 1, NULL, NULL),
(284, 185, 'RO', 'Botoşani', 'BT', 1, NULL, NULL),
(285, 185, 'RO', 'Braşov', 'BV', 1, NULL, NULL),
(286, 185, 'RO', 'Brăila', 'BR', 1, NULL, NULL),
(287, 185, 'RO', 'Bucureşti', 'B', 1, NULL, NULL),
(288, 185, 'RO', 'Buzău', 'BZ', 1, NULL, NULL),
(289, 185, 'RO', 'Caraş-Severin', 'CS', 1, NULL, NULL),
(290, 185, 'RO', 'Călăraşi', 'CL', 1, NULL, NULL),
(291, 185, 'RO', 'Cluj', 'CJ', 1, NULL, NULL),
(292, 185, 'RO', 'Constanţa', 'CT', 1, NULL, NULL),
(293, 185, 'RO', 'Covasna', 'CV', 1, NULL, NULL),
(294, 185, 'RO', 'Dâmboviţa', 'DB', 1, NULL, NULL),
(295, 185, 'RO', 'Dolj', 'DJ', 1, NULL, NULL),
(296, 185, 'RO', 'Galaţi', 'GL', 1, NULL, NULL),
(297, 185, 'RO', 'Giurgiu', 'GR', 1, NULL, NULL),
(298, 185, 'RO', 'Gorj', 'GJ', 1, NULL, NULL),
(299, 185, 'RO', 'Harghita', 'HR', 1, NULL, NULL),
(300, 185, 'RO', 'Hunedoara', 'HD', 1, NULL, NULL),
(301, 185, 'RO', 'Ialomiţa', 'IL', 1, NULL, NULL),
(302, 185, 'RO', 'Iaşi', 'IS', 1, NULL, NULL),
(303, 185, 'RO', 'Ilfov', 'IF', 1, NULL, NULL),
(304, 185, 'RO', 'Maramureş', 'MM', 1, NULL, NULL),
(305, 185, 'RO', 'Mehedinţi', 'MH', 1, NULL, NULL),
(306, 185, 'RO', 'Mureş', 'MS', 1, NULL, NULL),
(307, 185, 'RO', 'Neamţ', 'NT', 1, NULL, NULL),
(308, 185, 'RO', 'Olt', 'OT', 1, NULL, NULL),
(309, 185, 'RO', 'Prahova', 'PH', 1, NULL, NULL),
(310, 185, 'RO', 'Satu-Mare', 'SM', 1, NULL, NULL),
(311, 185, 'RO', 'Sălaj', 'SJ', 1, NULL, NULL),
(312, 185, 'RO', 'Sibiu', 'SB', 1, NULL, NULL),
(313, 185, 'RO', 'Suceava', 'SV', 1, NULL, NULL),
(314, 185, 'RO', 'Teleorman', 'TR', 1, NULL, NULL),
(315, 185, 'RO', 'Timiş', 'TM', 1, NULL, NULL),
(316, 185, 'RO', 'Tulcea', 'TL', 1, NULL, NULL),
(317, 185, 'RO', 'Vaslui', 'VS', 1, NULL, NULL),
(318, 185, 'RO', 'Vâlcea', 'VL', 1, NULL, NULL),
(319, 185, 'RO', 'Vrancea', 'VN', 1, NULL, NULL),
(320, 80, 'FI', 'Lappi', 'Lappi', 1, NULL, NULL),
(321, 80, 'FI', 'Pohjois-Pohjanmaa', 'Pohjois-Pohjanmaa', 1, NULL, NULL),
(322, 80, 'FI', 'Kainuu', 'Kainuu', 1, NULL, NULL),
(323, 80, 'FI', 'Pohjois-Karjala', 'Pohjois-Karjala', 1, NULL, NULL),
(324, 80, 'FI', 'Pohjois-Savo', 'Pohjois-Savo', 1, NULL, NULL),
(325, 80, 'FI', 'Etelä-Savo', 'Etelä-Savo', 1, NULL, NULL),
(326, 80, 'FI', 'Etelä-Pohjanmaa', 'Etelä-Pohjanmaa', 1, NULL, NULL),
(327, 80, 'FI', 'Pohjanmaa', 'Pohjanmaa', 1, NULL, NULL),
(328, 80, 'FI', 'Pirkanmaa', 'Pirkanmaa', 1, NULL, NULL),
(329, 80, 'FI', 'Satakunta', 'Satakunta', 1, NULL, NULL),
(330, 80, 'FI', 'Keski-Pohjanmaa', 'Keski-Pohjanmaa', 1, NULL, NULL),
(331, 80, 'FI', 'Keski-Suomi', 'Keski-Suomi', 1, NULL, NULL),
(332, 80, 'FI', 'Varsinais-Suomi', 'Varsinais-Suomi', 1, NULL, NULL),
(333, 80, 'FI', 'Etelä-Karjala', 'Etelä-Karjala', 1, NULL, NULL),
(334, 80, 'FI', 'Päijät-Häme', 'Päijät-Häme', 1, NULL, NULL),
(335, 80, 'FI', 'Kanta-Häme', 'Kanta-Häme', 1, NULL, NULL),
(336, 80, 'FI', 'Uusimaa', 'Uusimaa', 1, NULL, NULL),
(337, 80, 'FI', 'Itä-Uusimaa', 'Itä-Uusimaa', 1, NULL, NULL),
(338, 80, 'FI', 'Kymenlaakso', 'Kymenlaakso', 1, NULL, NULL),
(339, 80, 'FI', 'Ahvenanmaa', 'Ahvenanmaa', 1, NULL, NULL),
(340, 74, 'EE', 'Harjumaa', 'EE-37', 1, NULL, NULL),
(341, 74, 'EE', 'Hiiumaa', 'EE-39', 1, NULL, NULL),
(342, 74, 'EE', 'Ida-Virumaa', 'EE-44', 1, NULL, NULL),
(343, 74, 'EE', 'Jõgevamaa', 'EE-49', 1, NULL, NULL),
(344, 74, 'EE', 'Järvamaa', 'EE-51', 1, NULL, NULL),
(345, 74, 'EE', 'Läänemaa', 'EE-57', 1, NULL, NULL),
(346, 74, 'EE', 'Lääne-Virumaa', 'EE-59', 1, NULL, NULL),
(347, 74, 'EE', 'Põlvamaa', 'EE-65', 1, NULL, NULL),
(348, 74, 'EE', 'Pärnumaa', 'EE-67', 1, NULL, NULL),
(349, 74, 'EE', 'Raplamaa', 'EE-70', 1, NULL, NULL),
(350, 74, 'EE', 'Saaremaa', 'EE-74', 1, NULL, NULL),
(351, 74, 'EE', 'Tartumaa', 'EE-78', 1, NULL, NULL),
(352, 74, 'EE', 'Valgamaa', 'EE-82', 1, NULL, NULL),
(353, 74, 'EE', 'Viljandimaa', 'EE-84', 1, NULL, NULL),
(354, 74, 'EE', 'Võrumaa', 'EE-86', 1, NULL, NULL),
(355, 125, 'LV', 'Daugavpils', 'LV-DGV', 1, NULL, NULL),
(356, 125, 'LV', 'Jelgava', 'LV-JEL', 1, NULL, NULL),
(357, 125, 'LV', 'Jēkabpils', 'Jēkabpils', 1, NULL, NULL),
(358, 125, 'LV', 'Jūrmala', 'LV-JUR', 1, NULL, NULL),
(359, 125, 'LV', 'Liepāja', 'LV-LPX', 1, NULL, NULL),
(360, 125, 'LV', 'Liepājas novads', 'LV-LE', 1, NULL, NULL),
(361, 125, 'LV', 'Rēzekne', 'LV-REZ', 1, NULL, NULL),
(362, 125, 'LV', 'Rīga', 'LV-RIX', 1, NULL, NULL),
(363, 125, 'LV', 'Rīgas novads', 'LV-RI', 1, NULL, NULL),
(364, 125, 'LV', 'Valmiera', 'Valmiera', 1, NULL, NULL),
(365, 125, 'LV', 'Ventspils', 'LV-VEN', 1, NULL, NULL),
(366, 125, 'LV', 'Aglonas novads', 'Aglonas novads', 1, NULL, NULL),
(367, 125, 'LV', 'Aizkraukles novads', 'LV-AI', 1, NULL, NULL),
(368, 125, 'LV', 'Aizputes novads', 'Aizputes novads', 1, NULL, NULL),
(369, 125, 'LV', 'Aknīstes novads', 'Aknīstes novads', 1, NULL, NULL),
(370, 125, 'LV', 'Alojas novads', 'Alojas novads', 1, NULL, NULL),
(371, 125, 'LV', 'Alsungas novads', 'Alsungas novads', 1, NULL, NULL),
(372, 125, 'LV', 'Alūksnes novads', 'LV-AL', 1, NULL, NULL),
(373, 125, 'LV', 'Amatas novads', 'Amatas novads', 1, NULL, NULL),
(374, 125, 'LV', 'Apes novads', 'Apes novads', 1, NULL, NULL),
(375, 125, 'LV', 'Auces novads', 'Auces novads', 1, NULL, NULL),
(376, 125, 'LV', 'Babītes novads', 'Babītes novads', 1, NULL, NULL),
(377, 125, 'LV', 'Baldones novads', 'Baldones novads', 1, NULL, NULL),
(378, 125, 'LV', 'Baltinavas novads', 'Baltinavas novads', 1, NULL, NULL),
(379, 125, 'LV', 'Balvu novads', 'LV-BL', 1, NULL, NULL),
(380, 125, 'LV', 'Bauskas novads', 'LV-BU', 1, NULL, NULL),
(381, 125, 'LV', 'Beverīnas novads', 'Beverīnas novads', 1, NULL, NULL),
(382, 125, 'LV', 'Brocēnu novads', 'Brocēnu novads', 1, NULL, NULL),
(383, 125, 'LV', 'Burtnieku novads', 'Burtnieku novads', 1, NULL, NULL),
(384, 125, 'LV', 'Carnikavas novads', 'Carnikavas novads', 1, NULL, NULL),
(385, 125, 'LV', 'Cesvaines novads', 'Cesvaines novads', 1, NULL, NULL),
(386, 125, 'LV', 'Ciblas novads', 'Ciblas novads', 1, NULL, NULL),
(387, 125, 'LV', 'Cēsu novads', 'LV-CE', 1, NULL, NULL),
(388, 125, 'LV', 'Dagdas novads', 'Dagdas novads', 1, NULL, NULL),
(389, 125, 'LV', 'Daugavpils novads', 'LV-DA', 1, NULL, NULL),
(390, 125, 'LV', 'Dobeles novads', 'LV-DO', 1, NULL, NULL),
(391, 125, 'LV', 'Dundagas novads', 'Dundagas novads', 1, NULL, NULL),
(392, 125, 'LV', 'Durbes novads', 'Durbes novads', 1, NULL, NULL),
(393, 125, 'LV', 'Engures novads', 'Engures novads', 1, NULL, NULL),
(394, 125, 'LV', 'Garkalnes novads', 'Garkalnes novads', 1, NULL, NULL),
(395, 125, 'LV', 'Grobiņas novads', 'Grobiņas novads', 1, NULL, NULL),
(396, 125, 'LV', 'Gulbenes novads', 'LV-GU', 1, NULL, NULL),
(397, 125, 'LV', 'Iecavas novads', 'Iecavas novads', 1, NULL, NULL),
(398, 125, 'LV', 'Ikšķiles novads', 'Ikšķiles novads', 1, NULL, NULL),
(399, 125, 'LV', 'Ilūkstes novads', 'Ilūkstes novads', 1, NULL, NULL),
(400, 125, 'LV', 'Inčukalna novads', 'Inčukalna novads', 1, NULL, NULL),
(401, 125, 'LV', 'Jaunjelgavas novads', 'Jaunjelgavas novads', 1, NULL, NULL),
(402, 125, 'LV', 'Jaunpiebalgas novads', 'Jaunpiebalgas novads', 1, NULL, NULL),
(403, 125, 'LV', 'Jaunpils novads', 'Jaunpils novads', 1, NULL, NULL),
(404, 125, 'LV', 'Jelgavas novads', 'LV-JL', 1, NULL, NULL),
(405, 125, 'LV', 'Jēkabpils novads', 'LV-JK', 1, NULL, NULL),
(406, 125, 'LV', 'Kandavas novads', 'Kandavas novads', 1, NULL, NULL),
(407, 125, 'LV', 'Kokneses novads', 'Kokneses novads', 1, NULL, NULL),
(408, 125, 'LV', 'Krimuldas novads', 'Krimuldas novads', 1, NULL, NULL),
(409, 125, 'LV', 'Krustpils novads', 'Krustpils novads', 1, NULL, NULL),
(410, 125, 'LV', 'Krāslavas novads', 'LV-KR', 1, NULL, NULL),
(411, 125, 'LV', 'Kuldīgas novads', 'LV-KU', 1, NULL, NULL),
(412, 125, 'LV', 'Kārsavas novads', 'Kārsavas novads', 1, NULL, NULL),
(413, 125, 'LV', 'Lielvārdes novads', 'Lielvārdes novads', 1, NULL, NULL),
(414, 125, 'LV', 'Limbažu novads', 'LV-LM', 1, NULL, NULL),
(415, 125, 'LV', 'Lubānas novads', 'Lubānas novads', 1, NULL, NULL),
(416, 125, 'LV', 'Ludzas novads', 'LV-LU', 1, NULL, NULL),
(417, 125, 'LV', 'Līgatnes novads', 'Līgatnes novads', 1, NULL, NULL),
(418, 125, 'LV', 'Līvānu novads', 'Līvānu novads', 1, NULL, NULL),
(419, 125, 'LV', 'Madonas novads', 'LV-MA', 1, NULL, NULL),
(420, 125, 'LV', 'Mazsalacas novads', 'Mazsalacas novads', 1, NULL, NULL),
(421, 125, 'LV', 'Mālpils novads', 'Mālpils novads', 1, NULL, NULL),
(422, 125, 'LV', 'Mārupes novads', 'Mārupes novads', 1, NULL, NULL),
(423, 125, 'LV', 'Naukšēnu novads', 'Naukšēnu novads', 1, NULL, NULL),
(424, 125, 'LV', 'Neretas novads', 'Neretas novads', 1, NULL, NULL),
(425, 125, 'LV', 'Nīcas novads', 'Nīcas novads', 1, NULL, NULL),
(426, 125, 'LV', 'Ogres novads', 'LV-OG', 1, NULL, NULL),
(427, 125, 'LV', 'Olaines novads', 'Olaines novads', 1, NULL, NULL),
(428, 125, 'LV', 'Ozolnieku novads', 'Ozolnieku novads', 1, NULL, NULL),
(429, 125, 'LV', 'Preiļu novads', 'LV-PR', 1, NULL, NULL),
(430, 125, 'LV', 'Priekules novads', 'Priekules novads', 1, NULL, NULL),
(431, 125, 'LV', 'Priekuļu novads', 'Priekuļu novads', 1, NULL, NULL),
(432, 125, 'LV', 'Pārgaujas novads', 'Pārgaujas novads', 1, NULL, NULL),
(433, 125, 'LV', 'Pāvilostas novads', 'Pāvilostas novads', 1, NULL, NULL),
(434, 125, 'LV', 'Pļaviņu novads', 'Pļaviņu novads', 1, NULL, NULL),
(435, 125, 'LV', 'Raunas novads', 'Raunas novads', 1, NULL, NULL),
(436, 125, 'LV', 'Riebiņu novads', 'Riebiņu novads', 1, NULL, NULL),
(437, 125, 'LV', 'Rojas novads', 'Rojas novads', 1, NULL, NULL),
(438, 125, 'LV', 'Ropažu novads', 'Ropažu novads', 1, NULL, NULL),
(439, 125, 'LV', 'Rucavas novads', 'Rucavas novads', 1, NULL, NULL),
(440, 125, 'LV', 'Rugāju novads', 'Rugāju novads', 1, NULL, NULL),
(441, 125, 'LV', 'Rundāles novads', 'Rundāles novads', 1, NULL, NULL),
(442, 125, 'LV', 'Rēzeknes novads', 'LV-RE', 1, NULL, NULL),
(443, 125, 'LV', 'Rūjienas novads', 'Rūjienas novads', 1, NULL, NULL),
(444, 125, 'LV', 'Salacgrīvas novads', 'Salacgrīvas novads', 1, NULL, NULL),
(445, 125, 'LV', 'Salas novads', 'Salas novads', 1, NULL, NULL),
(446, 125, 'LV', 'Salaspils novads', 'Salaspils novads', 1, NULL, NULL),
(447, 125, 'LV', 'Saldus novads', 'LV-SA', 1, NULL, NULL),
(448, 125, 'LV', 'Saulkrastu novads', 'Saulkrastu novads', 1, NULL, NULL),
(449, 125, 'LV', 'Siguldas novads', 'Siguldas novads', 1, NULL, NULL),
(450, 125, 'LV', 'Skrundas novads', 'Skrundas novads', 1, NULL, NULL),
(451, 125, 'LV', 'Skrīveru novads', 'Skrīveru novads', 1, NULL, NULL),
(452, 125, 'LV', 'Smiltenes novads', 'Smiltenes novads', 1, NULL, NULL),
(453, 125, 'LV', 'Stopiņu novads', 'Stopiņu novads', 1, NULL, NULL),
(454, 125, 'LV', 'Strenču novads', 'Strenču novads', 1, NULL, NULL),
(455, 125, 'LV', 'Sējas novads', 'Sējas novads', 1, NULL, NULL),
(456, 125, 'LV', 'Talsu novads', 'LV-TA', 1, NULL, NULL),
(457, 125, 'LV', 'Tukuma novads', 'LV-TU', 1, NULL, NULL),
(458, 125, 'LV', 'Tērvetes novads', 'Tērvetes novads', 1, NULL, NULL),
(459, 125, 'LV', 'Vaiņodes novads', 'Vaiņodes novads', 1, NULL, NULL),
(460, 125, 'LV', 'Valkas novads', 'LV-VK', 1, NULL, NULL),
(461, 125, 'LV', 'Valmieras novads', 'LV-VM', 1, NULL, NULL),
(462, 125, 'LV', 'Varakļānu novads', 'Varakļānu novads', 1, NULL, NULL),
(463, 125, 'LV', 'Vecpiebalgas novads', 'Vecpiebalgas novads', 1, NULL, NULL),
(464, 125, 'LV', 'Vecumnieku novads', 'Vecumnieku novads', 1, NULL, NULL),
(465, 125, 'LV', 'Ventspils novads', 'LV-VE', 1, NULL, NULL),
(466, 125, 'LV', 'Viesītes novads', 'Viesītes novads', 1, NULL, NULL),
(467, 125, 'LV', 'Viļakas novads', 'Viļakas novads', 1, NULL, NULL),
(468, 125, 'LV', 'Viļānu novads', 'Viļānu novads', 1, NULL, NULL),
(469, 125, 'LV', 'Vārkavas novads', 'Vārkavas novads', 1, NULL, NULL),
(470, 125, 'LV', 'Zilupes novads', 'Zilupes novads', 1, NULL, NULL),
(471, 125, 'LV', 'Ādažu novads', 'Ādažu novads', 1, NULL, NULL),
(472, 125, 'LV', 'Ērgļu novads', 'Ērgļu novads', 1, NULL, NULL),
(473, 125, 'LV', 'Ķeguma novads', 'Ķeguma novads', 1, NULL, NULL),
(474, 125, 'LV', 'Ķekavas novads', 'Ķekavas novads', 1, NULL, NULL),
(475, 131, 'LT', 'Alytaus Apskritis', 'LT-AL', 1, NULL, NULL),
(476, 131, 'LT', 'Kauno Apskritis', 'LT-KU', 1, NULL, NULL),
(477, 131, 'LT', 'Klaipėdos Apskritis', 'LT-KL', 1, NULL, NULL),
(478, 131, 'LT', 'Marijampolės Apskritis', 'LT-MR', 1, NULL, NULL),
(479, 131, 'LT', 'Panevėžio Apskritis', 'LT-PN', 1, NULL, NULL),
(480, 131, 'LT', 'Šiaulių Apskritis', 'LT-SA', 1, NULL, NULL),
(481, 131, 'LT', 'Tauragės Apskritis', 'LT-TA', 1, NULL, NULL),
(482, 131, 'LT', 'Telšių Apskritis', 'LT-TE', 1, NULL, NULL),
(483, 131, 'LT', 'Utenos Apskritis', 'LT-UT', 1, NULL, NULL),
(484, 131, 'LT', 'Vilniaus Apskritis', 'LT-VL', 1, NULL, NULL),
(485, 31, 'BR', 'Acre', 'AC', 1, NULL, NULL),
(486, 31, 'BR', 'Alagoas', 'AL', 1, NULL, NULL),
(487, 31, 'BR', 'Amapá', 'AP', 1, NULL, NULL),
(488, 31, 'BR', 'Amazonas', 'AM', 1, NULL, NULL),
(489, 31, 'BR', 'Bahia', 'BA', 1, NULL, NULL),
(490, 31, 'BR', 'Ceará', 'CE', 1, NULL, NULL),
(491, 31, 'BR', 'Espírito Santo', 'ES', 1, NULL, NULL),
(492, 31, 'BR', 'Goiás', 'GO', 1, NULL, NULL),
(493, 31, 'BR', 'Maranhão', 'MA', 1, NULL, NULL),
(494, 31, 'BR', 'Mato Grosso', 'MT', 1, NULL, NULL),
(495, 31, 'BR', 'Mato Grosso do Sul', 'MS', 1, NULL, NULL),
(496, 31, 'BR', 'Minas Gerais', 'MG', 1, NULL, NULL),
(497, 31, 'BR', 'Pará', 'PA', 1, NULL, NULL),
(498, 31, 'BR', 'Paraíba', 'PB', 1, NULL, NULL),
(499, 31, 'BR', 'Paraná', 'PR', 1, NULL, NULL),
(500, 31, 'BR', 'Pernambuco', 'PE', 1, NULL, NULL),
(501, 31, 'BR', 'Piauí', 'PI', 1, NULL, NULL),
(502, 31, 'BR', 'Rio de Janeiro', 'RJ', 1, NULL, NULL),
(503, 31, 'BR', 'Rio Grande do Norte', 'RN', 1, NULL, NULL),
(504, 31, 'BR', 'Rio Grande do Sul', 'RS', 1, NULL, NULL),
(505, 31, 'BR', 'Rondônia', 'RO', 1, NULL, NULL),
(506, 31, 'BR', 'Roraima', 'RR', 1, NULL, NULL),
(507, 31, 'BR', 'Santa Catarina', 'SC', 1, NULL, NULL),
(508, 31, 'BR', 'São Paulo', 'SP', 1, NULL, NULL),
(509, 31, 'BR', 'Sergipe', 'SE', 1, NULL, NULL),
(510, 31, 'BR', 'Tocantins', 'TO', 1, NULL, NULL),
(511, 31, 'BR', 'Distrito Federal', 'DF', 1, NULL, NULL),
(512, 59, 'HR', 'Zagrebačka županija', 'HR-01', 1, NULL, NULL),
(513, 59, 'HR', 'Krapinsko-zagorska županija', 'HR-02', 1, NULL, NULL),
(514, 59, 'HR', 'Sisačko-moslavačka županija', 'HR-03', 1, NULL, NULL),
(515, 59, 'HR', 'Karlovačka županija', 'HR-04', 1, NULL, NULL),
(516, 59, 'HR', 'Varaždinska županija', 'HR-05', 1, NULL, NULL),
(517, 59, 'HR', 'Koprivničko-križevačka županija', 'HR-06', 1, NULL, NULL),
(518, 59, 'HR', 'Bjelovarsko-bilogorska županija', 'HR-07', 1, NULL, NULL),
(519, 59, 'HR', 'Primorsko-goranska županija', 'HR-08', 1, NULL, NULL),
(520, 59, 'HR', 'Ličko-senjska županija', 'HR-09', 1, NULL, NULL),
(521, 59, 'HR', 'Virovitičko-podravska županija', 'HR-10', 1, NULL, NULL),
(522, 59, 'HR', 'Požeško-slavonska županija', 'HR-11', 1, NULL, NULL),
(523, 59, 'HR', 'Brodsko-posavska županija', 'HR-12', 1, NULL, NULL),
(524, 59, 'HR', 'Zadarska županija', 'HR-13', 1, NULL, NULL),
(525, 59, 'HR', 'Osječko-baranjska županija', 'HR-14', 1, NULL, NULL),
(526, 59, 'HR', 'Šibensko-kninska županija', 'HR-15', 1, NULL, NULL),
(527, 59, 'HR', 'Vukovarsko-srijemska županija', 'HR-16', 1, NULL, NULL),
(528, 59, 'HR', 'Splitsko-dalmatinska županija', 'HR-17', 1, NULL, NULL),
(529, 59, 'HR', 'Istarska županija', 'HR-18', 1, NULL, NULL),
(530, 59, 'HR', 'Dubrovačko-neretvanska županija', 'HR-19', 1, NULL, NULL),
(531, 59, 'HR', 'Međimurska županija', 'HR-20', 1, NULL, NULL),
(532, 59, 'HR', 'Grad Zagreb', 'HR-21', 1, NULL, NULL),
(533, 106, 'IN', 'Andaman and Nicobar Islands', 'AN', 1, NULL, NULL),
(534, 106, 'IN', 'Andhra Pradesh', 'AP', 1, NULL, NULL),
(535, 106, 'IN', 'Arunachal Pradesh', 'AR', 1, NULL, NULL),
(536, 106, 'IN', 'Assam', 'AS', 1, NULL, NULL),
(537, 106, 'IN', 'Bihar', 'BR', 1, NULL, NULL),
(538, 106, 'IN', 'Chandigarh', 'CH', 1, NULL, NULL),
(539, 106, 'IN', 'Chhattisgarh', 'CT', 1, NULL, NULL),
(540, 106, 'IN', 'Dadra and Nagar Haveli', 'DN', 1, NULL, NULL),
(541, 106, 'IN', 'Daman and Diu', 'DD', 1, NULL, NULL),
(542, 106, 'IN', 'Delhi', 'DL', 1, NULL, NULL),
(543, 106, 'IN', 'Goa', 'GA', 1, NULL, NULL),
(544, 106, 'IN', 'Gujarat', 'GJ', 1, NULL, NULL),
(545, 106, 'IN', 'Haryana', 'HR', 1, NULL, NULL),
(546, 106, 'IN', 'Himachal Pradesh', 'HP', 1, NULL, NULL),
(547, 106, 'IN', 'Jammu and Kashmir', 'JK', 1, NULL, NULL),
(548, 106, 'IN', 'Jharkhand', 'JH', 1, NULL, NULL),
(549, 106, 'IN', 'Karnataka', 'KA', 1, NULL, NULL),
(550, 106, 'IN', 'Kerala', 'KL', 1, NULL, NULL),
(551, 106, 'IN', 'Lakshadweep', 'LD', 1, NULL, NULL),
(552, 106, 'IN', 'Madhya Pradesh', 'MP', 1, NULL, NULL),
(553, 106, 'IN', 'Maharashtra', 'MH', 1, NULL, NULL),
(554, 106, 'IN', 'Manipur', 'MN', 1, NULL, NULL),
(555, 106, 'IN', 'Meghalaya', 'ML', 1, NULL, NULL),
(556, 106, 'IN', 'Mizoram', 'MZ', 1, NULL, NULL),
(557, 106, 'IN', 'Nagaland', 'NL', 1, NULL, NULL),
(558, 106, 'IN', 'Odisha', 'OR', 1, NULL, NULL),
(559, 106, 'IN', 'Puducherry', 'PY', 1, NULL, NULL),
(560, 106, 'IN', 'Punjab', 'PB', 1, NULL, NULL),
(561, 106, 'IN', 'Rajasthan', 'RJ', 1, NULL, NULL),
(562, 106, 'IN', 'Sikkim', 'SK', 1, NULL, NULL),
(563, 106, 'IN', 'Tamil Nadu', 'TN', 1, NULL, NULL),
(564, 106, 'IN', 'Telangana', 'TG', 1, NULL, NULL),
(565, 106, 'IN', 'Tripura', 'TR', 1, NULL, NULL),
(566, 106, 'IN', 'Uttar Pradesh', 'UP', 1, NULL, NULL),
(567, 106, 'IN', 'Uttarakhand', 'UT', 1, NULL, NULL),
(568, 106, 'IN', 'West Bengal', 'WB', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_subscribed` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profile.png',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `recipient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `you_send` double(8,2) NOT NULL,
  `send_currency_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fees_type` enum('manual','credit','debit','zelle') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'manual',
  `fee_rate_amount` double(8,2) NOT NULL,
  `fee_rate_usd` double(8,2) DEFAULT 0.00,
  `remain_amount` double(8,2) NOT NULL,
  `amount_get` double(8,2) NOT NULL,
  `get_currency_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_transfer_reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipient_upload_front_input` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipient_upload_back_input` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_reference_for_recipient` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('later','pending','accepted','received','complete','cancel','refund') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `accepted_date` timestamp NULL DEFAULT NULL,
  `received_date` timestamp NULL DEFAULT NULL,
  `complete_date` timestamp NULL DEFAULT NULL,
  `cancel_date` timestamp NULL DEFAULT NULL,
  `refund_date` timestamp NULL DEFAULT NULL,
  `on_hold` tinyint(4) DEFAULT 0 COMMENT '0: Not on hold, 1: Hold',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `recipient_id`, `you_send`, `send_currency_code`, `fees_type`, `fee_rate_amount`, `fee_rate_usd`, `remain_amount`, `amount_get`, `get_currency_code`, `recipient_transfer_reason`, `recipient_upload_front_input`, `recipient_upload_back_input`, `review_reference_for_recipient`, `status`, `accepted_date`, `received_date`, `complete_date`, `cancel_date`, `refund_date`, `on_hold`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 13.00, 'USD', 'manual', 2.60, 0.00, 10.40, 735.11, 'INR', 'Reason-2', '16085602541.jpg', '16085602552.jpg', 'reference', 'cancel', '2020-12-21 08:48:23', NULL, NULL, '2021-01-15 01:59:47', '2021-01-02 08:15:52', 0, '2021-01-04 15:49:21', '2021-01-15 01:59:47'),
(2, 7, 2, 100000.00, 'INR', 'manual', 20000.00, 0.00, 80000.00, 1432.87, 'AUD', 'Reason-4', '16087051711.png', '16087051722.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-02 06:10:16', NULL, 0, '2020-12-23 01:03:26', '2021-01-02 06:10:16'),
(3, 3, 1, 123.00, 'CAD', 'manual', 24.60, 0.00, 98.40, 5623.66, 'INR', 'Reason-4', '16087282761.jpg', '16087282772.jpg', 'Reference', 'cancel', NULL, NULL, NULL, '2021-01-02 06:12:58', NULL, 0, '2020-12-31 05:21:30', '2021-01-02 06:12:58'),
(4, 13, 3, 1200.00, 'AUD', 'manual', 240.00, 0.00, 960.00, 960.00, 'AUD', 'Reason-4', '16087925321.jpg', '16087925342.png', NULL, 'accepted', '2020-12-24 01:28:46', '2020-12-24 01:27:24', NULL, NULL, '2020-12-24 01:27:01', 0, '2020-12-24 01:24:01', '2020-12-24 01:28:46'),
(5, 13, 4, 1000.00, 'USD', 'manual', 200.00, 0.00, 800.00, 59046.19, 'INR', 'Reason-2', '16088098951.png', '16088099002.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-16 04:17:24', NULL, 0, '2020-12-24 06:12:40', '2021-01-16 04:17:24'),
(6, 18, 5, 150.00, 'AUD', 'manual', 30.00, 0.00, 120.00, 120.00, 'AUD', 'Reason-1', '16094804771.png', '16094804782.png', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-01 00:25:32', '2021-01-01 00:25:32'),
(7, 14, 6, 23232.00, 'AUD', 'manual', 4646.40, 0.00, 18585.60, 18585.00, 'AUD', 'Reason-4', '16097370671.png', '16097370692.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-08 21:45:06', NULL, 0, '2021-01-03 23:41:25', '2021-01-08 21:45:06'),
(8, 3, 3, 150.00, 'AUD', 'manual', 45.00, 0.00, 150.00, 5924.55, 'INR', 'Reason-3', NULL, NULL, NULL, 'cancel', NULL, NULL, NULL, '2021-01-08 00:00:40', NULL, 0, '2021-01-06 07:11:05', '2021-01-08 00:00:40'),
(9, 3, 3, 150.00, 'AUD', 'manual', 30.00, 0.00, 150.00, 120.00, 'AUD', 'Reason-3', NULL, NULL, NULL, 'cancel', NULL, NULL, NULL, '2021-01-08 22:59:37', NULL, 0, '2021-01-06 22:54:49', '2021-01-08 22:59:37'),
(10, 3, 3, 150.00, 'AUD', 'manual', 30.00, 0.00, 120.00, 6823.35, 'INR', 'Reason-3', NULL, NULL, NULL, 'cancel', NULL, NULL, NULL, '2021-01-08 23:30:23', NULL, 0, '2021-01-08 23:12:12', '2021-01-08 23:30:23'),
(11, 3, 3, 1400.00, 'AUD', 'manual', 280.00, 0.00, 1120.00, 63684.62, 'INR', 'Reason-5', NULL, NULL, NULL, 'cancel', NULL, NULL, NULL, '2021-01-08 23:30:35', NULL, 0, '2021-01-08 03:28:36', '2021-01-08 23:30:35'),
(12, 3, 9, 10000.00, 'USD', 'manual', 20.00, 0.00, 8000.00, 585040.00, 'INR', 'Reason-3', '5698.png', '5699.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-15 01:59:13', NULL, 0, '2021-01-15 01:46:33', '2021-01-15 01:59:13'),
(13, 3, 1, 100000.00, 'INR', 'manual', 20000.00, 0.00, 80000.00, 1764.71, 'BGN', 'Reason-1', '16106975151.jpg', '16106975162.jpg', NULL, 'cancel', NULL, NULL, NULL, '2021-01-15 02:28:59', NULL, 0, '2021-01-15 02:28:48', '2021-01-15 02:28:59'),
(14, 3, 1, 10000.00, 'BGN', 'manual', 2000.00, 0.00, 8000.00, 6398.20, 'AUD', 'Reason-1', '16106976091.jpg', '16106976112.jpg', NULL, 'cancel', NULL, NULL, NULL, '2021-01-16 04:04:01', NULL, 0, '2021-01-15 02:30:18', '2021-01-16 04:04:01'),
(15, 3, 7, 10000.00, 'CAD', 'manual', 2000.00, 0.00, 8000.00, 8135.75, 'AUD', 'Reason-1', '16106976541.jpg', '16106976552.jpg', NULL, 'cancel', NULL, NULL, NULL, '2021-01-15 02:31:56', NULL, 0, '2021-01-15 02:31:49', '2021-01-15 02:31:56'),
(16, 13, 4, 12.00, 'AUD', 'manual', 2.40, 0.00, 9.60, 9.00, 'AUD', 'Reason-1', '16107127741.png', '16107127742.png', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-18 00:52:06', '2021-01-18 00:52:06'),
(17, 13, 4, 12.00, 'AUD', 'manual', 2.40, 0.00, 9.60, 9.00, 'AUD', 'Reason-1', '16107153871.png', '16107153872.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-16 06:33:28', NULL, 0, '2021-01-15 07:27:23', '2021-01-16 06:33:28'),
(18, 23, 13, 100.00, 'USD', 'manual', 20.00, 0.00, 80.00, 5850.38, 'INR', 'Reason-1', '62868.png', '62870.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-15 07:55:04', NULL, 0, '2021-01-15 07:54:47', '2021-01-15 07:55:04'),
(19, 23, 14, 100.00, 'AUD', 'credit', 20.00, 0.00, 80.00, 62.01, 'USD', 'Reason-1', '62875.png', '62877.png', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-15 08:15:13', '2021-01-15 08:15:13'),
(20, 23, 15, 100.00, 'USD', 'manual', 20.00, 0.00, 80.00, 490.88, 'DKK', 'Reason-4', '62879.png', '62881.png', NULL, 'later', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-15 08:17:32', '2021-01-15 08:17:32'),
(21, 3, 1, 12.00, 'AUD', 'manual', 2.40, 0.00, 9.60, 9.00, 'AUD', 'Reason-1', '16107204761.png', '16107204772.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-16 05:52:16', NULL, 0, '2021-01-16 05:51:56', '2021-01-16 05:52:16'),
(22, 23, 16, 100.00, 'AUD', 'manual', 20.00, 0.00, 80.00, 4522.27, 'INR', 'Reason-3', '62898.png', '62900.png', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-15 22:52:20', '2021-01-15 22:52:20'),
(23, 23, 17, 100.00, 'AUD', 'manual', 20.00, 0.00, 80.00, 80.00, 'AUD', 'Reason-2', '62910.png', '62912.png', NULL, 'later', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-15 23:09:14', '2021-01-15 23:09:14'),
(24, 23, 17, 12.00, 'AUD', 'manual', 0.36, 0.00, 11.64, 621.81, 'INR', 'Reason-3', '62918.png', '62920.png', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-15 23:15:58', '2021-01-15 23:15:58'),
(25, 14, 6, 930.00, 'AUD', 'manual', 186.00, 0.00, 744.00, 744.00, 'AUD', 'Reason-3', '62936.png', '62938.png', NULL, 'cancel', NULL, NULL, NULL, '2021-02-13 00:47:34', NULL, 0, '2021-01-16 00:07:44', '2021-02-13 00:47:34'),
(26, 14, 18, 100.00, 'AUD', 'manual', 20.00, 0.00, 80.00, 80.00, 'AUD', 'Reason-3', '62984.png', '62986.png', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-16 03:33:55', '2021-01-16 03:33:55'),
(27, 3, 1, 10000.00, 'USD', 'manual', 2000.00, 0.00, 8000.00, 584914.60, 'INR', 'Reason-1', '62996.png', '62997.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-16 04:07:28', NULL, 0, '2021-01-16 04:07:16', '2021-01-16 04:07:28'),
(28, 13, 4, 150.00, 'AUD', 'manual', 30.00, 0.00, 120.00, 120.00, 'AUD', 'Reason-4', '16107904721.png', '16107904722.png', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-16 04:17:59', '2021-01-16 04:17:59'),
(29, 3, 9, 100.00, 'AUD', 'manual', 20.00, 0.00, 80.00, 80.00, 'AUD', 'Reason-4', '63002.png', '63004.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-16 06:09:19', NULL, 0, '2021-01-16 05:57:37', '2021-01-16 06:09:19'),
(30, 3, 9, 542.00, 'AUD', 'manual', 108.40, 0.00, 433.60, 99410.50, 'HUF', 'Reason-4', '63006.png', '63008.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-16 08:59:12', NULL, 0, '2021-01-16 06:16:42', '2021-01-16 08:59:12'),
(31, 14, 6, 100.00, 'HKD', 'manual', 20.00, 0.00, 80.00, 13.34, 'AUD', 'Reason-1', '63011.png', '63010.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-16 08:38:04', NULL, 0, '2021-01-16 06:26:02', '2021-01-16 08:38:04'),
(32, 3, 19, 260.00, 'AUD', 'manual', 52.00, 0.00, 208.00, 208.00, 'AUD', 'Reason-3', '63013.png', '63015.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-16 08:16:11', NULL, 0, '2021-01-16 08:00:19', '2021-01-16 08:16:11'),
(33, 3, 20, 150000.00, 'INR', 'manual', 30000.00, 0.00, 120000.00, 1204.89, 'GBP', 'Reason-1', '5229.png', '5230.png', NULL, 'complete', NULL, NULL, '2021-01-16 08:57:58', NULL, NULL, 0, '2021-01-16 08:56:51', '2021-01-16 08:57:58'),
(34, 3, 25, 10000.00, 'USD', 'manual', 2000.00, 0.00, 8000.00, 584914.60, 'INR', 'Reason-1', '5721.png', '5722.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-16 09:07:39', NULL, 0, '2021-01-16 09:07:01', '2021-01-16 09:07:39'),
(35, 3, 26, 10000.00, 'USD', 'manual', 2000.00, 0.00, 8000.00, 584914.60, 'INR', 'Reason-1', '5739.png', '5740.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-17 22:38:13', NULL, 0, '2021-01-17 22:36:52', '2021-01-17 22:38:13'),
(36, 3, 25, 100.00, 'AUD', 'manual', 20.00, 0.00, 80.00, 80.00, 'AUD', 'Reason-2', '156413.png', '156414.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-17 23:24:53', NULL, 0, '2021-01-17 23:23:16', '2021-01-17 23:24:53'),
(37, 3, 10, 155.00, 'AUD', 'manual', 31.00, 0.00, 124.00, 7009.52, 'INR', 'Reason-4', '156416.png', '156417.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-18 00:16:13', NULL, 0, '2021-01-17 23:41:47', '2021-01-18 00:16:13'),
(38, 3, 20, 150.00, 'AUD', 'manual', 30.00, 0.00, 120.00, 120.00, 'AUD', 'Reason-4', '156419.png', '156421.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-17 23:59:13', NULL, 0, '2021-01-17 23:53:55', '2021-01-17 23:59:13'),
(39, 3, 19, 350.00, 'AUD', 'manual', 70.00, 0.00, 280.00, 15827.95, 'INR', 'Reason-3', '156423.png', '156425.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-18 00:06:28', NULL, 0, '2021-01-18 00:06:09', '2021-01-18 00:06:28'),
(40, 3, 27, 10000.00, 'AUD', 'manual', 2000.00, 0.00, 8000.00, 452227.04, 'INR', 'Reason-1', '16109494241.png', '16109494252.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-18 01:36:30', NULL, 0, '2021-01-18 00:52:18', '2021-01-18 01:36:30'),
(41, 3, 9, 15000.00, 'AUD', 'manual', 3000.00, 0.00, 12000.00, 11795.66, 'CAD', 'Reason-1', '16109497191.png', '16109497212.png', NULL, 'refund', '2021-01-18 00:39:27', '2021-01-18 00:40:24', NULL, '2021-01-18 03:57:27', '2021-01-18 04:34:44', 0, '2021-01-18 00:34:36', '2021-01-18 04:34:44'),
(42, 3, 7, 100.00, 'AUD', 'manual', 20.00, 0.00, 80.00, 80.00, 'AUD', 'Reason-3', '63019.png', '63020.png', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-18 02:02:38', '2021-01-18 02:02:38'),
(43, 3, 3, 1234.00, 'AUD', 'manual', 370.20, 0.00, 863.80, 4157.32, 'HRK', 'Reason-3', NULL, NULL, NULL, 'cancel', NULL, NULL, NULL, '2021-01-18 09:05:53', NULL, 0, '2021-01-18 09:05:37', '2021-01-18 09:05:53'),
(44, 14, 18, 153.00, 'AUD', 'manual', 30.60, 0.00, 122.40, 122.00, 'AUD', 'Reason-5', '63099.png', '63100.png', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-18 07:49:21', '2021-01-18 07:49:21'),
(45, 3, 8, 1283.00, 'AUD', 'manual', 256.60, 0.00, 1026.40, 6151.09, 'HKD', 'Reason-1', '63105.png', '63106.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-18 09:01:45', NULL, 0, '2021-01-18 09:01:20', '2021-01-18 09:01:45'),
(46, 3, 28, 260.00, 'AUD', 'manual', 52.00, 0.00, 208.00, 1247.01, 'HKD', 'Reason-4', '63107.png', '63108.png', NULL, 'later', NULL, NULL, NULL, NULL, NULL, 1, '2021-01-18 09:04:24', '2021-02-10 08:45:07'),
(47, 3, 7, 100.00, 'AUD', 'manual', 20.00, 0.00, 80.00, 80.00, 'AUD', 'Reason-1', '63109.png', '63110.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-25 04:40:36', NULL, 0, '2021-01-25 04:40:23', '2021-01-25 04:40:36'),
(48, 25, 35, 25000.00, 'USD', 'manual', 5000.00, 0.00, 20000.00, 146.50, 'INR', 'Reason-1', '5281.png', '5282.png', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-18 09:45:37', '2021-01-18 09:45:37'),
(49, 25, 36, 8623.00, 'USD', 'manual', 1724.60, 0.00, 6898.40, 504342.62, 'INR', 'Reason-1', '5281.png', '5282.png', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-18 09:47:44', '2021-01-18 09:47:44'),
(50, 25, 30, 25000.00, 'INR', 'manual', 5000.00, 0.00, 20000.00, 273.54, 'USD', 'Reason-1', '5283.png', '5284.png', NULL, 'later', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-18 09:50:15', '2021-01-18 09:50:15'),
(51, 25, 36, 25.00, 'HUF', 'manual', 5.00, 0.00, 20.00, 4.92, 'INR', 'Reason-1', '5286.png', '5287.png', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-18 09:51:17', '2021-01-18 09:51:17'),
(52, 26, 37, 10000.00, 'USD', 'manual', 2000.00, 0.00, 8000.00, 586448.94, 'INR', 'Reason-4', '5755.png', '5756.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-18 22:37:03', NULL, 0, '2021-01-18 22:36:40', '2021-01-18 22:37:03'),
(54, 27, 39, 23.00, 'AUD', 'manual', 4.60, 0.00, 18.40, 18.00, 'AUD', 'Reason-5', '63119.png', '63120.png', NULL, 'later', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-18 23:30:15', '2021-01-18 23:30:15'),
(55, 28, 47, 150.00, 'AUD', 'manual', 30.00, 0.00, 120.00, 120.00, 'AUD', 'Reason-3', NULL, NULL, NULL, 'later', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-20 03:21:43', '2021-01-20 03:21:43'),
(56, 3, 54, 1000.00, 'EUR', 'manual', 200.00, 0.00, 800.00, 1250.80, 'AUD', 'Reason-1', '16113162891.jpg', '16113162912.jpg', 'gcytffuy', 'cancel', NULL, NULL, NULL, '2021-01-29 05:06:03', NULL, 0, '2021-01-22 06:22:13', '2021-01-29 05:06:03'),
(57, 3, 3, 12000.00, 'CAD', 'manual', 1080.00, 0.00, 10920.00, 631374.55, 'INR', 'Reason-3', NULL, NULL, NULL, 'complete', '2021-02-03 05:09:34', '2021-02-03 05:09:08', '2021-02-03 05:12:33', NULL, NULL, 0, '2021-01-22 06:56:43', '2021-02-03 05:12:33'),
(58, 3, 58, 250.00, 'USD', 'manual', 22.50, 0.00, 227.50, 16573.54, 'INR', 'Reason-3', NULL, NULL, 'nothing', 'complete', NULL, NULL, '2021-02-03 05:11:09', NULL, NULL, 0, '2021-01-25 06:03:11', '2021-02-03 05:11:09'),
(59, 3, 3, 25.00, 'AUD', 'manual', 2.25, 0.00, 22.75, 22.00, 'AUD', 'Reason-2', NULL, NULL, NULL, 'cancel', NULL, NULL, NULL, '2021-02-03 05:13:42', NULL, 0, '2021-02-03 02:11:16', '2021-02-03 05:13:42'),
(60, 3, 3, 25.00, 'AUD', 'manual', 2.25, 0.00, 22.75, 22.00, 'AUD', 'Reason-3', NULL, NULL, NULL, 'cancel', NULL, NULL, NULL, '2021-02-03 08:03:18', NULL, 0, '2021-02-03 05:14:59', '2021-02-03 08:03:18'),
(61, 31, 63, 100000.00, 'INR', 'manual', 9000.00, 0.00, 91000.00, 1254.31, 'USD', 'Reason-3', '16137325571.png', '16137325582.png', NULL, 'refund', '2021-02-22 00:29:51', '2021-02-22 00:30:17', NULL, NULL, '2021-02-22 00:30:59', 0, '2021-02-19 05:34:00', '2021-02-22 00:30:59'),
(62, 33, 64, 1000.00, 'AUD', 'zelle', 100.00, 0.00, 900.00, 900.00, 'AUD', 'Reason-3', NULL, NULL, NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-02-24 01:58:32', '2021-02-24 01:58:32'),
(63, 36, 65, 5000.00, 'HKD', 'manual', 4500.00, 578.79, 500.00, 4666.32, 'INR', 'Reason-1', '16170976301.png', '16170976312.png', 'fguhihh', 'later', NULL, NULL, NULL, NULL, NULL, 0, '2021-03-30 04:17:37', '2021-03-30 04:17:37'),
(64, 36, 67, 56.00, 'AUD', 'manual', 5.04, 3.83, 50.96, 2776.46, 'INR', 'Reason-1', '16171042471.png', '16171042482.png', 'efhjhgffgbh', 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-03-30 06:07:48', '2021-03-30 06:07:48'),
(65, 37, 68, 8000.00, 'HUF', 'manual', 720.00, 2.32, 7280.00, 1719.71, 'INR', 'Reason-1', '16172491431.png', '16172491462.png', 'nfcgugjh', 'complete', '2021-04-14 04:09:08', '2021-04-14 04:09:53', '2021-04-14 04:10:15', NULL, NULL, 0, '2021-03-31 22:22:51', '2021-04-14 04:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_fields`
--

CREATE TABLE `transaction_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recipient_id` bigint(20) UNSIGNED NOT NULL,
  `field_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_fields`
--

INSERT INTO `transaction_fields` (`id`, `recipient_id`, `field_name`, `field_value`, `created_at`, `updated_at`) VALUES
(1, 1, 'AccountNumber', '1234567899', '2020-12-21 08:47:43', '2020-12-21 08:47:43'),
(2, 1, 'IfscCode', '1324566', '2020-12-21 08:47:43', '2020-12-21 08:47:43'),
(3, 2, 'AccountNumber', '45435', '2020-12-23 01:03:26', '2020-12-23 01:03:26'),
(4, 2, 'IfscCode', '45435', '2020-12-23 01:03:26', '2020-12-23 01:03:26'),
(5, 3, 'AccountNumber', '445512548961', '2020-12-24 01:24:01', '2020-12-24 01:24:01'),
(6, 3, 'IfscCode', 'BARB0UDHNAX', '2020-12-24 01:24:01', '2020-12-24 01:24:01'),
(7, 4, 'IbnNo', '1234568999', '2020-12-24 06:10:36', '2020-12-24 06:10:36'),
(8, 5, 'IbnNo', 'ghjhk', '2021-01-01 00:25:32', '2021-01-01 00:25:32'),
(9, 6, 'IbnNo', '6767', '2021-01-03 23:41:25', '2021-01-03 23:41:25'),
(10, 13, 'AccountNumber', '12345', '2021-01-15 07:48:06', '2021-01-15 07:48:06'),
(11, 13, 'IfscCode', '09876', '2021-01-15 07:48:06', '2021-01-15 07:48:06'),
(12, 14, 'IbnNo', '123456', '2021-01-15 08:15:13', '2021-01-15 08:15:13'),
(13, 15, 'AccountNumber', '4447777', '2021-01-15 08:17:32', '2021-01-15 08:17:32'),
(14, 15, 'IfscCode', '888888999999', '2021-01-15 08:17:32', '2021-01-15 08:17:32'),
(15, 16, 'IbnNo', '564646764', '2021-01-15 22:52:20', '2021-01-15 22:52:20'),
(16, 17, 'IbnNo', '123456', '2021-01-15 23:09:14', '2021-01-15 23:09:14'),
(17, 18, 'IbnNo', '1355', '2021-01-16 03:33:55', '2021-01-16 03:33:55'),
(18, 19, 'IbnNo', '123456789', '2021-01-16 08:00:19', '2021-01-16 08:00:19'),
(19, 20, 'IbnNo', '856988599', '2021-01-16 08:56:43', '2021-01-16 08:56:43'),
(20, 21, 'IbnNo', '8464649494', '2021-01-16 09:05:45', '2021-01-16 09:05:45'),
(21, 22, 'IbnNo', '8464649494', '2021-01-16 09:06:00', '2021-01-16 09:06:00'),
(22, 23, 'IbnNo', '8464649494', '2021-01-16 09:06:14', '2021-01-16 09:06:14'),
(23, 24, 'IbnNo', '8464649494', '2021-01-16 09:06:17', '2021-01-16 09:06:17'),
(24, 26, 'IbnNo', '588888', '2021-01-17 22:36:52', '2021-01-17 22:36:52'),
(25, 27, 'AccountNumber', '43434', '2021-01-18 00:27:25', '2021-01-18 00:27:25'),
(26, 27, 'IfscCode', '534', '2021-01-18 00:27:25', '2021-01-18 00:27:25'),
(27, 28, 'AccountNumber', '1234567899', '2021-01-18 09:04:24', '2021-01-18 09:04:24'),
(28, 28, 'IfscCode', '1324566', '2021-01-18 09:04:24', '2021-01-18 09:04:24'),
(29, 29, 'AccountNumber', '868969888', '2021-01-18 09:35:08', '2021-01-18 09:35:08'),
(30, 29, 'IfscCode', 'fhhhj', '2021-01-18 09:35:08', '2021-01-18 09:35:08'),
(31, 30, 'AccountNumber', '868969888', '2021-01-18 09:35:20', '2021-01-18 09:35:20'),
(32, 30, 'IfscCode', 'fhhhj', '2021-01-18 09:35:20', '2021-01-18 09:35:20'),
(33, 31, 'AccountNumber', '868969888', '2021-01-18 09:35:28', '2021-01-18 09:35:28'),
(34, 31, 'IfscCode', 'fhhhj', '2021-01-18 09:35:28', '2021-01-18 09:35:28'),
(35, 32, 'AccountNumber', '868969888', '2021-01-18 09:35:31', '2021-01-18 09:35:31'),
(36, 32, 'IfscCode', 'fhhhj', '2021-01-18 09:35:31', '2021-01-18 09:35:31'),
(37, 33, 'IbnNo', '566588899', '2021-01-18 09:41:15', '2021-01-18 09:41:15'),
(38, 34, 'IbnNo', '566588899', '2021-01-18 09:44:19', '2021-01-18 09:44:19'),
(39, 35, 'IbnNo', '566588899', '2021-01-18 09:45:37', '2021-01-18 09:45:37'),
(40, 36, 'IbnNo', '566588899', '2021-01-18 09:47:44', '2021-01-18 09:47:44'),
(41, 37, 'IbnNo', '253614', '2021-01-18 22:36:19', '2021-01-18 22:36:19'),
(42, 38, 'IbnNo', '1234567980', '2021-01-18 23:15:04', '2021-01-18 23:15:04'),
(43, 39, 'IbnNo', '1234567980', '2021-01-18 23:30:15', '2021-01-18 23:30:15'),
(44, 40, 'AccountNumber', '555', '2021-01-19 00:18:39', '2021-01-19 00:18:39'),
(45, 40, 'IfscCode', '654987', '2021-01-19 00:18:39', '2021-01-19 00:18:39'),
(46, 41, 'IbnNo', '66666666', '2021-01-19 01:01:39', '2021-01-19 01:01:39'),
(47, 42, 'AccountNumber', '4125555', '2021-01-19 01:07:37', '2021-01-19 01:07:37'),
(48, 42, 'IfscCode', '77777990', '2021-01-19 01:07:37', '2021-01-19 01:07:37'),
(49, 43, 'IfscCode', '123456789', '2021-01-19 03:10:28', '2021-01-19 03:10:28'),
(50, 44, 'IfscCode', '1564892630', '2021-01-19 03:29:17', '2021-01-19 03:29:17'),
(51, 45, 'AccountNumber', '1234567890', '2021-01-19 03:43:03', '2021-01-19 03:43:03'),
(52, 45, 'IfscCode', '123465ICICI', '2021-01-19 03:43:03', '2021-01-19 03:43:03'),
(53, 46, 'AccountNumber', '123456', '2021-01-19 08:01:54', '2021-01-19 08:01:54'),
(54, 46, 'IfscCode', 'SBI123', '2021-01-19 08:01:54', '2021-01-19 08:01:54'),
(55, 47, 'AccountNumber', '123456897', '2021-01-20 03:21:43', '2021-01-20 03:21:43'),
(56, 47, 'IfscCode', 'BOB45123', '2021-01-20 03:21:43', '2021-01-20 03:21:43'),
(57, 48, 'IbnNo', '568957899', '2021-01-22 03:49:39', '2021-01-22 03:49:39'),
(58, 49, 'IbnNo', '568957899', '2021-01-22 03:49:52', '2021-01-22 03:49:52'),
(59, 50, 'IbnNo', '568957899', '2021-01-22 03:50:03', '2021-01-22 03:50:03'),
(60, 51, 'IbnNo', '568957899', '2021-01-22 03:50:09', '2021-01-22 03:50:09'),
(61, 52, 'IbnNo', '568957899', '2021-01-22 03:50:14', '2021-01-22 03:50:14'),
(62, 53, 'IbnNo', '568957899', '2021-01-22 03:50:23', '2021-01-22 03:50:23'),
(63, 54, 'IbnNo', '3343566788', '2021-01-22 06:22:13', '2021-01-22 06:22:13'),
(64, 58, 'AccountNumber', '5533228866009', '2021-01-25 06:03:11', '2021-01-25 06:03:11'),
(65, 58, 'IfscCode', 'barb0));(', '2021-01-25 06:03:11', '2021-01-25 06:03:11'),
(66, 59, 'IbnNo', '7676767', '2021-02-19 05:33:24', '2021-02-19 05:33:24'),
(67, 60, 'IbnNo', '7676767', '2021-02-19 05:33:33', '2021-02-19 05:33:33'),
(68, 61, 'IbnNo', '7676767', '2021-02-19 05:33:36', '2021-02-19 05:33:36'),
(69, 62, 'IbnNo', '7676767', '2021-02-19 05:33:51', '2021-02-19 05:33:51'),
(70, 63, 'IbnNo', '7676767', '2021-02-19 05:34:00', '2021-02-19 05:34:00'),
(71, 64, 'IbnNo', 'ndnd', '2021-02-24 01:58:32', '2021-02-24 01:58:32'),
(72, 65, 'Accountnumber', '982345678', '2021-03-30 04:17:37', '2021-03-30 04:17:37'),
(73, 66, 'Accountnumber', '1234567890', '2021-03-30 04:38:14', '2021-03-30 04:38:14'),
(74, 67, 'Accountnumber', '123456987', '2021-03-30 06:07:46', '2021-03-30 06:07:46'),
(75, 68, 'Accountnumber', '1234567890', '2021-03-31 22:22:50', '2021-03-31 22:22:50'),
(76, 69, 'Accountnumber', '8574596518', '2021-04-14 06:16:17', '2021-04-14 06:16:17'),
(77, 70, 'AccountNumber', '846515586', '2021-04-14 06:21:01', '2021-04-14 06:21:01'),
(78, 70, 'IfscCode', 'jfdhftghg', '2021-04-14 06:21:01', '2021-04-14 06:21:01'),
(79, 71, 'AccountNumber', '282422425886965', '2021-04-14 23:29:15', '2021-04-14 23:29:15'),
(80, 71, 'IfscCode', 'hfk5685355', '2021-04-14 23:29:15', '2021-04-14 23:29:15'),
(81, 72, 'AccountNumber', '548765284952486', '2021-04-15 01:22:01', '2021-04-15 01:22:01'),
(82, 72, 'IfscCode', 'fhj65485', '2021-04-15 01:22:01', '2021-04-15 01:22:01'),
(83, 73, 'AccountNumber', '548765284952486', '2021-04-15 01:22:04', '2021-04-15 01:22:04'),
(84, 73, 'IfscCode', 'fhj65485', '2021-04-15 01:22:04', '2021-04-15 01:22:04'),
(85, 74, 'AccountNumber', '548765284952486', '2021-04-15 01:22:16', '2021-04-15 01:22:16'),
(86, 74, 'IfscCode', 'fhj65485', '2021-04-15 01:22:16', '2021-04-15 01:22:16'),
(87, 75, 'AccountNumber', '548765284952486', '2021-04-15 01:22:27', '2021-04-15 01:22:27'),
(88, 75, 'IfscCode', 'fhj65485', '2021-04-15 01:22:27', '2021-04-15 01:22:27'),
(89, 76, 'AccountNumber', '548765284952486', '2021-04-15 01:22:45', '2021-04-15 01:22:45'),
(90, 76, 'IfscCode', 'fhj65485', '2021-04-15 01:22:45', '2021-04-15 01:22:45'),
(91, 77, 'AccountNumber', '548765284952486', '2021-04-15 01:23:02', '2021-04-15 01:23:02'),
(92, 77, 'IfscCode', 'fhj65485', '2021-04-15 01:23:02', '2021-04-15 01:23:02'),
(93, 78, 'AccountNumber', '548765284952486', '2021-04-15 01:23:05', '2021-04-15 01:23:05'),
(94, 78, 'IfscCode', 'fhj65485', '2021-04-15 01:23:05', '2021-04-15 01:23:05'),
(95, 79, 'AccountNumber', '548765284952486', '2021-04-15 01:23:07', '2021-04-15 01:23:07'),
(96, 79, 'IfscCode', 'fhj65485', '2021-04-15 01:23:07', '2021-04-15 01:23:07'),
(97, 80, 'AccountNumber', '548765284952486', '2021-04-15 01:23:09', '2021-04-15 01:23:09'),
(98, 80, 'IfscCode', 'fhj65485', '2021-04-15 01:23:09', '2021-04-15 01:23:09'),
(99, 81, 'AccountNumber', '548765284952486', '2021-04-15 01:23:28', '2021-04-15 01:23:28'),
(100, 81, 'IfscCode', 'fhj65485', '2021-04-15 01:23:28', '2021-04-15 01:23:28'),
(101, 82, 'AccountNumber', '548765284952486', '2021-04-15 01:25:45', '2021-04-15 01:25:45'),
(102, 82, 'IfscCode', 'fhj65485', '2021-04-15 01:25:45', '2021-04-15 01:25:45'),
(103, 83, 'AccountNumber', '548765284952486', '2021-04-15 01:25:52', '2021-04-15 01:25:52'),
(104, 83, 'IfscCode', 'fhj65485', '2021-04-15 01:25:52', '2021-04-15 01:25:52'),
(105, 84, 'AccountNumber', '548765284952486', '2021-04-15 01:25:54', '2021-04-15 01:25:54'),
(106, 84, 'IfscCode', 'fhj65485', '2021-04-15 01:25:54', '2021-04-15 01:25:54'),
(107, 85, 'AccountNumber', '548765284952486', '2021-04-15 01:25:56', '2021-04-15 01:25:56'),
(108, 85, 'IfscCode', 'fhj65485', '2021-04-15 01:25:56', '2021-04-15 01:25:56'),
(109, 86, 'AccountNumber', '548765284952486', '2021-04-15 01:25:58', '2021-04-15 01:25:58'),
(110, 86, 'IfscCode', 'fhj65485', '2021-04-15 01:25:58', '2021-04-15 01:25:58'),
(111, 87, 'AccountNumber', '548765284952486', '2021-04-15 01:26:07', '2021-04-15 01:26:07'),
(112, 87, 'IfscCode', 'fhj65485', '2021-04-15 01:26:07', '2021-04-15 01:26:07'),
(113, 88, 'AccountNumber', '548765284952486', '2021-04-15 01:26:08', '2021-04-15 01:26:08'),
(114, 88, 'IfscCode', 'fhj65485', '2021-04-15 01:26:08', '2021-04-15 01:26:08'),
(115, 89, 'Accountnumber', '986885585', '2021-04-15 05:00:19', '2021-04-15 05:00:19'),
(116, 90, 'Accountnumber', '545548785', '2021-04-15 23:33:24', '2021-04-15 23:33:24'),
(117, 91, 'Accountnumber', '545548785', '2021-04-15 23:33:25', '2021-04-15 23:33:25'),
(118, 92, 'Accountnumber', '545548785', '2021-04-15 23:33:28', '2021-04-15 23:33:28'),
(119, 93, 'Accountnumber', '545548785', '2021-04-15 23:33:29', '2021-04-15 23:33:29'),
(120, 94, 'Accountnumber', '545548785', '2021-04-15 23:33:30', '2021-04-15 23:33:30'),
(121, 95, 'Accountnumber', '545548785', '2021-04-15 23:33:32', '2021-04-15 23:33:32'),
(122, 96, 'Accountnumber', '545548785', '2021-04-15 23:33:48', '2021-04-15 23:33:48'),
(123, 97, 'Accountnumber', '545548785', '2021-04-15 23:33:50', '2021-04-15 23:33:50'),
(124, 98, 'Accountnumber', '545548785', '2021-04-15 23:33:52', '2021-04-15 23:33:52'),
(125, 99, 'Accountnumber', '545548785', '2021-04-15 23:34:05', '2021-04-15 23:34:05'),
(126, 100, 'Accountnumber', '545548785', '2021-04-15 23:34:08', '2021-04-15 23:34:08'),
(127, 101, 'Accountnumber', '545548785', '2021-04-15 23:34:10', '2021-04-15 23:34:10'),
(128, 102, 'Accountnumber', '545548785', '2021-04-15 23:34:29', '2021-04-15 23:34:29'),
(129, 103, 'Accountnumber', '545548785', '2021-04-15 23:34:31', '2021-04-15 23:34:31'),
(130, 104, 'Accountnumber', '545548785', '2021-04-15 23:34:33', '2021-04-15 23:34:33'),
(131, 105, 'Accountnumber', '545548785', '2021-04-15 23:34:35', '2021-04-15 23:34:35'),
(132, 106, 'Accountnumber', '545548785', '2021-04-15 23:34:37', '2021-04-15 23:34:37'),
(133, 107, 'Accountnumber', '545548785', '2021-04-15 23:34:40', '2021-04-15 23:34:40'),
(134, 108, 'Accountnumber', '545548785', '2021-04-15 23:34:41', '2021-04-15 23:34:41'),
(135, 109, 'Accountnumber', '545548785', '2021-04-15 23:34:43', '2021-04-15 23:34:43'),
(136, 110, 'Accountnumber', '545548785', '2021-04-15 23:34:44', '2021-04-15 23:34:44'),
(137, 111, 'Accountnumber', '545548785', '2021-04-15 23:34:46', '2021-04-15 23:34:46'),
(138, 112, 'Accountnumber', '545548785', '2021-04-15 23:34:48', '2021-04-15 23:34:48'),
(139, 113, 'AccountNumber', '45874563275471', '2021-04-19 03:12:51', '2021-04-19 03:12:51'),
(140, 113, 'IfscCode', 'BARB4587159', '2021-04-19 03:12:51', '2021-04-19 03:12:51'),
(141, 114, 'AccountNumber', '45874563275471', '2021-04-19 03:12:56', '2021-04-19 03:12:56'),
(142, 114, 'IfscCode', 'BARB4587159', '2021-04-19 03:12:56', '2021-04-19 03:12:56'),
(143, 115, 'AccountNumber', '45874563275471', '2021-04-19 03:12:59', '2021-04-19 03:12:59'),
(144, 115, 'IfscCode', 'BARB4587159', '2021-04-19 03:12:59', '2021-04-19 03:12:59'),
(145, 116, 'AccountNumber', '45874563275471', '2021-04-19 03:13:01', '2021-04-19 03:13:01'),
(146, 116, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:01', '2021-04-19 03:13:01'),
(147, 117, 'AccountNumber', '45874563275471', '2021-04-19 03:13:03', '2021-04-19 03:13:03'),
(148, 117, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:03', '2021-04-19 03:13:03'),
(149, 118, 'AccountNumber', '45874563275471', '2021-04-19 03:13:06', '2021-04-19 03:13:06'),
(150, 118, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:06', '2021-04-19 03:13:06'),
(151, 119, 'AccountNumber', '45874563275471', '2021-04-19 03:13:07', '2021-04-19 03:13:07'),
(152, 119, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:07', '2021-04-19 03:13:07'),
(153, 120, 'AccountNumber', '45874563275471', '2021-04-19 03:13:09', '2021-04-19 03:13:09'),
(154, 120, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:09', '2021-04-19 03:13:09'),
(155, 121, 'AccountNumber', '45874563275471', '2021-04-19 03:13:12', '2021-04-19 03:13:12'),
(156, 121, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:12', '2021-04-19 03:13:12'),
(157, 122, 'AccountNumber', '45874563275471', '2021-04-19 03:13:14', '2021-04-19 03:13:14'),
(158, 122, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:14', '2021-04-19 03:13:14'),
(159, 123, 'AccountNumber', '45874563275471', '2021-04-19 03:13:17', '2021-04-19 03:13:17'),
(160, 123, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:17', '2021-04-19 03:13:17'),
(161, 124, 'AccountNumber', '45874563275471', '2021-04-19 03:13:20', '2021-04-19 03:13:20'),
(162, 124, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:20', '2021-04-19 03:13:20'),
(163, 125, 'AccountNumber', '45874563275471', '2021-04-19 03:13:22', '2021-04-19 03:13:22'),
(164, 125, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:22', '2021-04-19 03:13:22'),
(165, 126, 'AccountNumber', '45874563275471', '2021-04-19 03:13:23', '2021-04-19 03:13:23'),
(166, 126, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:23', '2021-04-19 03:13:23'),
(167, 127, 'AccountNumber', '45874563275471', '2021-04-19 03:13:27', '2021-04-19 03:13:27'),
(168, 127, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:27', '2021-04-19 03:13:27'),
(169, 128, 'AccountNumber', '45874563275471', '2021-04-19 03:13:30', '2021-04-19 03:13:30'),
(170, 128, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:30', '2021-04-19 03:13:30'),
(171, 129, 'AccountNumber', '45874563275471', '2021-04-19 03:13:31', '2021-04-19 03:13:31'),
(172, 129, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:31', '2021-04-19 03:13:31'),
(173, 130, 'AccountNumber', '45874563275471', '2021-04-19 03:13:33', '2021-04-19 03:13:33'),
(174, 130, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:33', '2021-04-19 03:13:33'),
(175, 131, 'AccountNumber', '45874563275471', '2021-04-19 03:13:35', '2021-04-19 03:13:35'),
(176, 131, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:35', '2021-04-19 03:13:35'),
(177, 132, 'AccountNumber', '45874563275471', '2021-04-19 03:13:38', '2021-04-19 03:13:38'),
(178, 132, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:38', '2021-04-19 03:13:38'),
(179, 133, 'AccountNumber', '45874563275471', '2021-04-19 03:13:39', '2021-04-19 03:13:39'),
(180, 133, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:39', '2021-04-19 03:13:39'),
(181, 134, 'AccountNumber', '45874563275471', '2021-04-19 03:13:41', '2021-04-19 03:13:41'),
(182, 134, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:41', '2021-04-19 03:13:41'),
(183, 135, 'AccountNumber', '45874563275471', '2021-04-19 03:13:43', '2021-04-19 03:13:43'),
(184, 135, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:43', '2021-04-19 03:13:43'),
(185, 136, 'AccountNumber', '45874563275471', '2021-04-19 03:13:46', '2021-04-19 03:13:46'),
(186, 136, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:46', '2021-04-19 03:13:46'),
(187, 137, 'AccountNumber', '45874563275471', '2021-04-19 03:13:48', '2021-04-19 03:13:48'),
(188, 137, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:48', '2021-04-19 03:13:48'),
(189, 138, 'AccountNumber', '45874563275471', '2021-04-19 03:13:51', '2021-04-19 03:13:51'),
(190, 138, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:51', '2021-04-19 03:13:51'),
(191, 139, 'AccountNumber', '45874563275471', '2021-04-19 03:13:52', '2021-04-19 03:13:52'),
(192, 139, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:52', '2021-04-19 03:13:52'),
(193, 140, 'AccountNumber', '45874563275471', '2021-04-19 03:13:55', '2021-04-19 03:13:55'),
(194, 140, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:55', '2021-04-19 03:13:55'),
(195, 141, 'AccountNumber', '45874563275471', '2021-04-19 03:13:56', '2021-04-19 03:13:56'),
(196, 141, 'IfscCode', 'BARB4587159', '2021-04-19 03:13:56', '2021-04-19 03:13:56'),
(197, 142, 'AccountNumber', '45874563275471', '2021-04-19 03:14:00', '2021-04-19 03:14:00'),
(198, 142, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:00', '2021-04-19 03:14:00'),
(199, 143, 'AccountNumber', '45874563275471', '2021-04-19 03:14:03', '2021-04-19 03:14:03'),
(200, 143, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:03', '2021-04-19 03:14:03'),
(201, 144, 'AccountNumber', '45874563275471', '2021-04-19 03:14:06', '2021-04-19 03:14:06'),
(202, 144, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:06', '2021-04-19 03:14:06'),
(203, 145, 'AccountNumber', '45874563275471', '2021-04-19 03:14:08', '2021-04-19 03:14:08'),
(204, 145, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:08', '2021-04-19 03:14:08'),
(205, 146, 'AccountNumber', '45874563275471', '2021-04-19 03:14:10', '2021-04-19 03:14:10'),
(206, 146, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:10', '2021-04-19 03:14:10'),
(207, 147, 'AccountNumber', '45874563275471', '2021-04-19 03:14:12', '2021-04-19 03:14:12'),
(208, 147, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:12', '2021-04-19 03:14:12'),
(209, 148, 'AccountNumber', '45874563275471', '2021-04-19 03:14:14', '2021-04-19 03:14:14'),
(210, 148, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:14', '2021-04-19 03:14:14'),
(211, 149, 'AccountNumber', '45874563275471', '2021-04-19 03:14:15', '2021-04-19 03:14:15'),
(212, 149, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:15', '2021-04-19 03:14:15'),
(213, 150, 'AccountNumber', '45874563275471', '2021-04-19 03:14:18', '2021-04-19 03:14:18'),
(214, 150, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:18', '2021-04-19 03:14:18'),
(215, 151, 'AccountNumber', '45874563275471', '2021-04-19 03:14:20', '2021-04-19 03:14:20'),
(216, 151, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:20', '2021-04-19 03:14:20'),
(217, 152, 'AccountNumber', '45874563275471', '2021-04-19 03:14:22', '2021-04-19 03:14:22'),
(218, 152, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:22', '2021-04-19 03:14:22'),
(219, 153, 'AccountNumber', '45874563275471', '2021-04-19 03:14:25', '2021-04-19 03:14:25'),
(220, 153, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:25', '2021-04-19 03:14:25'),
(221, 154, 'AccountNumber', '45874563275471', '2021-04-19 03:14:27', '2021-04-19 03:14:27'),
(222, 154, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:27', '2021-04-19 03:14:27'),
(223, 155, 'AccountNumber', '45874563275471', '2021-04-19 03:14:29', '2021-04-19 03:14:29'),
(224, 155, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:29', '2021-04-19 03:14:29'),
(225, 156, 'AccountNumber', '45874563275471', '2021-04-19 03:14:31', '2021-04-19 03:14:31'),
(226, 156, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:31', '2021-04-19 03:14:31'),
(227, 157, 'AccountNumber', '45874563275471', '2021-04-19 03:14:34', '2021-04-19 03:14:34'),
(228, 157, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:34', '2021-04-19 03:14:34'),
(229, 158, 'AccountNumber', '45874563275471', '2021-04-19 03:14:36', '2021-04-19 03:14:36'),
(230, 158, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:36', '2021-04-19 03:14:36'),
(231, 159, 'AccountNumber', '45874563275471', '2021-04-19 03:14:39', '2021-04-19 03:14:39'),
(232, 159, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:39', '2021-04-19 03:14:39'),
(233, 160, 'AccountNumber', '45874563275471', '2021-04-19 03:14:42', '2021-04-19 03:14:42'),
(234, 160, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:42', '2021-04-19 03:14:42'),
(235, 161, 'AccountNumber', '45874563275471', '2021-04-19 03:14:44', '2021-04-19 03:14:44'),
(236, 161, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:44', '2021-04-19 03:14:44'),
(237, 162, 'AccountNumber', '45874563275471', '2021-04-19 03:14:47', '2021-04-19 03:14:47'),
(238, 162, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:47', '2021-04-19 03:14:47'),
(239, 163, 'AccountNumber', '45874563275471', '2021-04-19 03:14:49', '2021-04-19 03:14:49'),
(240, 163, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:49', '2021-04-19 03:14:49'),
(241, 164, 'AccountNumber', '45874563275471', '2021-04-19 03:14:51', '2021-04-19 03:14:51'),
(242, 164, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:51', '2021-04-19 03:14:51'),
(243, 165, 'AccountNumber', '45874563275471', '2021-04-19 03:14:53', '2021-04-19 03:14:53'),
(244, 165, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:53', '2021-04-19 03:14:53'),
(245, 166, 'AccountNumber', '45874563275471', '2021-04-19 03:14:56', '2021-04-19 03:14:56'),
(246, 166, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:56', '2021-04-19 03:14:56'),
(247, 167, 'AccountNumber', '45874563275471', '2021-04-19 03:14:59', '2021-04-19 03:14:59'),
(248, 167, 'IfscCode', 'BARB4587159', '2021-04-19 03:14:59', '2021-04-19 03:14:59'),
(249, 168, 'AccountNumber', '45874563275471', '2021-04-19 03:15:00', '2021-04-19 03:15:00'),
(250, 168, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:00', '2021-04-19 03:15:00'),
(251, 169, 'AccountNumber', '45874563275471', '2021-04-19 03:15:03', '2021-04-19 03:15:03'),
(252, 169, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:03', '2021-04-19 03:15:03'),
(253, 170, 'AccountNumber', '45874563275471', '2021-04-19 03:15:05', '2021-04-19 03:15:05'),
(254, 170, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:05', '2021-04-19 03:15:05'),
(255, 171, 'AccountNumber', '45874563275471', '2021-04-19 03:15:07', '2021-04-19 03:15:07'),
(256, 171, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:07', '2021-04-19 03:15:07'),
(257, 172, 'AccountNumber', '45874563275471', '2021-04-19 03:15:08', '2021-04-19 03:15:08'),
(258, 172, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:08', '2021-04-19 03:15:08'),
(259, 173, 'AccountNumber', '45874563275471', '2021-04-19 03:15:11', '2021-04-19 03:15:11'),
(260, 173, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:11', '2021-04-19 03:15:11'),
(261, 174, 'AccountNumber', '45874563275471', '2021-04-19 03:15:14', '2021-04-19 03:15:14'),
(262, 174, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:14', '2021-04-19 03:15:14'),
(263, 175, 'AccountNumber', '45874563275471', '2021-04-19 03:15:15', '2021-04-19 03:15:15'),
(264, 175, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:15', '2021-04-19 03:15:15'),
(265, 176, 'AccountNumber', '45874563275471', '2021-04-19 03:15:18', '2021-04-19 03:15:18'),
(266, 176, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:18', '2021-04-19 03:15:18'),
(267, 177, 'AccountNumber', '45874563275471', '2021-04-19 03:15:20', '2021-04-19 03:15:20'),
(268, 177, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:20', '2021-04-19 03:15:20'),
(269, 178, 'AccountNumber', '45874563275471', '2021-04-19 03:15:22', '2021-04-19 03:15:22'),
(270, 178, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:22', '2021-04-19 03:15:22'),
(271, 179, 'AccountNumber', '45874563275471', '2021-04-19 03:15:24', '2021-04-19 03:15:24'),
(272, 179, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:24', '2021-04-19 03:15:24'),
(273, 180, 'AccountNumber', '45874563275471', '2021-04-19 03:15:26', '2021-04-19 03:15:26'),
(274, 180, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:26', '2021-04-19 03:15:26'),
(275, 181, 'AccountNumber', '45874563275471', '2021-04-19 03:15:28', '2021-04-19 03:15:28'),
(276, 181, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:28', '2021-04-19 03:15:28'),
(277, 182, 'AccountNumber', '45874563275471', '2021-04-19 03:15:29', '2021-04-19 03:15:29'),
(278, 182, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:29', '2021-04-19 03:15:29'),
(279, 183, 'AccountNumber', '45874563275471', '2021-04-19 03:15:32', '2021-04-19 03:15:32'),
(280, 183, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:32', '2021-04-19 03:15:32'),
(281, 184, 'AccountNumber', '45874563275471', '2021-04-19 03:15:35', '2021-04-19 03:15:35'),
(282, 184, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:35', '2021-04-19 03:15:35'),
(283, 185, 'AccountNumber', '45874563275471', '2021-04-19 03:15:37', '2021-04-19 03:15:37'),
(284, 185, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:37', '2021-04-19 03:15:37'),
(285, 186, 'AccountNumber', '45874563275471', '2021-04-19 03:15:39', '2021-04-19 03:15:39'),
(286, 186, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:39', '2021-04-19 03:15:39'),
(287, 187, 'AccountNumber', '45874563275471', '2021-04-19 03:15:41', '2021-04-19 03:15:41'),
(288, 187, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:41', '2021-04-19 03:15:41'),
(289, 188, 'AccountNumber', '45874563275471', '2021-04-19 03:15:43', '2021-04-19 03:15:43'),
(290, 188, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:43', '2021-04-19 03:15:43'),
(291, 189, 'AccountNumber', '45874563275471', '2021-04-19 03:15:45', '2021-04-19 03:15:45'),
(292, 189, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:45', '2021-04-19 03:15:45'),
(293, 190, 'AccountNumber', '45874563275471', '2021-04-19 03:15:47', '2021-04-19 03:15:47'),
(294, 190, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:47', '2021-04-19 03:15:47'),
(295, 191, 'AccountNumber', '45874563275471', '2021-04-19 03:15:50', '2021-04-19 03:15:50'),
(296, 191, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:50', '2021-04-19 03:15:50'),
(297, 192, 'AccountNumber', '45874563275471', '2021-04-19 03:15:51', '2021-04-19 03:15:51'),
(298, 192, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:51', '2021-04-19 03:15:51'),
(299, 193, 'AccountNumber', '45874563275471', '2021-04-19 03:15:54', '2021-04-19 03:15:54'),
(300, 193, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:54', '2021-04-19 03:15:54'),
(301, 194, 'AccountNumber', '45874563275471', '2021-04-19 03:15:57', '2021-04-19 03:15:57'),
(302, 194, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:57', '2021-04-19 03:15:57'),
(303, 195, 'AccountNumber', '45874563275471', '2021-04-19 03:15:59', '2021-04-19 03:15:59'),
(304, 195, 'IfscCode', 'BARB4587159', '2021-04-19 03:15:59', '2021-04-19 03:15:59'),
(305, 196, 'AccountNumber', '45874563275471', '2021-04-19 03:16:02', '2021-04-19 03:16:02'),
(306, 196, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:02', '2021-04-19 03:16:02'),
(307, 197, 'AccountNumber', '45874563275471', '2021-04-19 03:16:05', '2021-04-19 03:16:05'),
(308, 197, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:05', '2021-04-19 03:16:05'),
(309, 198, 'AccountNumber', '45874563275471', '2021-04-19 03:16:07', '2021-04-19 03:16:07'),
(310, 198, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:07', '2021-04-19 03:16:07'),
(311, 199, 'AccountNumber', '45874563275471', '2021-04-19 03:16:09', '2021-04-19 03:16:09'),
(312, 199, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:09', '2021-04-19 03:16:09'),
(313, 200, 'AccountNumber', '45874563275471', '2021-04-19 03:16:11', '2021-04-19 03:16:11'),
(314, 200, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:11', '2021-04-19 03:16:11'),
(315, 201, 'AccountNumber', '45874563275471', '2021-04-19 03:16:13', '2021-04-19 03:16:13'),
(316, 201, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:13', '2021-04-19 03:16:13'),
(317, 202, 'AccountNumber', '45874563275471', '2021-04-19 03:16:16', '2021-04-19 03:16:16'),
(318, 202, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:16', '2021-04-19 03:16:16'),
(319, 203, 'AccountNumber', '45874563275471', '2021-04-19 03:16:18', '2021-04-19 03:16:18'),
(320, 203, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:18', '2021-04-19 03:16:18'),
(321, 204, 'AccountNumber', '45874563275471', '2021-04-19 03:16:19', '2021-04-19 03:16:19'),
(322, 204, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:19', '2021-04-19 03:16:19'),
(323, 205, 'AccountNumber', '45874563275471', '2021-04-19 03:16:21', '2021-04-19 03:16:21'),
(324, 205, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:21', '2021-04-19 03:16:21'),
(325, 206, 'AccountNumber', '45874563275471', '2021-04-19 03:16:23', '2021-04-19 03:16:23'),
(326, 206, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:23', '2021-04-19 03:16:23'),
(327, 207, 'AccountNumber', '45874563275471', '2021-04-19 03:16:25', '2021-04-19 03:16:25'),
(328, 207, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:25', '2021-04-19 03:16:25'),
(329, 208, 'AccountNumber', '45874563275471', '2021-04-19 03:16:26', '2021-04-19 03:16:26'),
(330, 208, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:26', '2021-04-19 03:16:26'),
(331, 209, 'AccountNumber', '45874563275471', '2021-04-19 03:16:29', '2021-04-19 03:16:29'),
(332, 209, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:29', '2021-04-19 03:16:29'),
(333, 210, 'AccountNumber', '45874563275471', '2021-04-19 03:16:32', '2021-04-19 03:16:32'),
(334, 210, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:32', '2021-04-19 03:16:32'),
(335, 211, 'AccountNumber', '45874563275471', '2021-04-19 03:16:35', '2021-04-19 03:16:35'),
(336, 211, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:35', '2021-04-19 03:16:35'),
(337, 212, 'AccountNumber', '45874563275471', '2021-04-19 03:16:38', '2021-04-19 03:16:38'),
(338, 212, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:38', '2021-04-19 03:16:38'),
(339, 213, 'AccountNumber', '45874563275471', '2021-04-19 03:16:39', '2021-04-19 03:16:39'),
(340, 213, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:39', '2021-04-19 03:16:39'),
(341, 214, 'AccountNumber', '45874563275471', '2021-04-19 03:16:43', '2021-04-19 03:16:43'),
(342, 214, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:43', '2021-04-19 03:16:43'),
(343, 215, 'AccountNumber', '45874563275471', '2021-04-19 03:16:47', '2021-04-19 03:16:47'),
(344, 215, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:47', '2021-04-19 03:16:47'),
(345, 216, 'AccountNumber', '45874563275471', '2021-04-19 03:16:48', '2021-04-19 03:16:48'),
(346, 216, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:48', '2021-04-19 03:16:48'),
(347, 217, 'AccountNumber', '45874563275471', '2021-04-19 03:16:50', '2021-04-19 03:16:50'),
(348, 217, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:50', '2021-04-19 03:16:50'),
(349, 218, 'AccountNumber', '45874563275471', '2021-04-19 03:16:52', '2021-04-19 03:16:52'),
(350, 218, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:52', '2021-04-19 03:16:52'),
(351, 219, 'AccountNumber', '45874563275471', '2021-04-19 03:16:54', '2021-04-19 03:16:54'),
(352, 219, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:54', '2021-04-19 03:16:54'),
(353, 220, 'AccountNumber', '45874563275471', '2021-04-19 03:16:56', '2021-04-19 03:16:56'),
(354, 220, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:56', '2021-04-19 03:16:56'),
(355, 221, 'AccountNumber', '45874563275471', '2021-04-19 03:16:59', '2021-04-19 03:16:59'),
(356, 221, 'IfscCode', 'BARB4587159', '2021-04-19 03:16:59', '2021-04-19 03:16:59'),
(357, 222, 'AccountNumber', '45874563275471', '2021-04-19 03:17:02', '2021-04-19 03:17:02'),
(358, 222, 'IfscCode', 'BARB4587159', '2021-04-19 03:17:02', '2021-04-19 03:17:02'),
(359, 223, 'AccountNumber', '45874563275471', '2021-04-19 03:17:03', '2021-04-19 03:17:03'),
(360, 223, 'IfscCode', 'BARB4587159', '2021-04-19 03:17:03', '2021-04-19 03:17:03'),
(361, 224, 'AccountNumber', '45874563275471', '2021-04-19 03:17:06', '2021-04-19 03:17:06'),
(362, 224, 'IfscCode', 'BARB4587159', '2021-04-19 03:17:06', '2021-04-19 03:17:06'),
(363, 225, 'AccountNumber', '45874563275471', '2021-04-19 03:17:08', '2021-04-19 03:17:08'),
(364, 225, 'IfscCode', 'BARB4587159', '2021-04-19 03:17:08', '2021-04-19 03:17:08'),
(365, 226, 'AccountNumber', '45874563275471', '2021-04-19 03:17:11', '2021-04-19 03:17:11'),
(366, 226, 'IfscCode', 'BARB4587159', '2021-04-19 03:17:11', '2021-04-19 03:17:11'),
(367, 227, 'AccountNumber', '45874563275471', '2021-04-19 03:17:14', '2021-04-19 03:17:14'),
(368, 227, 'IfscCode', 'BARB4587159', '2021-04-19 03:17:14', '2021-04-19 03:17:14'),
(369, 228, 'AccountNumber', '45874563275471', '2021-04-19 03:17:16', '2021-04-19 03:17:16'),
(370, 228, 'IfscCode', 'BARB4587159', '2021-04-19 03:17:16', '2021-04-19 03:17:16'),
(371, 229, 'AccountNumber', '45874563275471', '2021-04-19 03:17:18', '2021-04-19 03:17:18'),
(372, 229, 'IfscCode', 'BARB4587159', '2021-04-19 03:17:18', '2021-04-19 03:17:18'),
(373, 230, 'AccountNumber', '25478965004521', '2021-04-19 03:20:11', '2021-04-19 03:20:11'),
(374, 230, 'IfscCode', 'BGDUK458742', '2021-04-19 03:20:11', '2021-04-19 03:20:11'),
(375, 231, 'AccountNumber', '25478965004521', '2021-04-19 03:20:13', '2021-04-19 03:20:13'),
(376, 231, 'IfscCode', 'BGDUK458742', '2021-04-19 03:20:13', '2021-04-19 03:20:13'),
(377, 232, 'AccountNumber', '25478965004521', '2021-04-19 03:20:14', '2021-04-19 03:20:14'),
(378, 232, 'IfscCode', 'BGDUK458742', '2021-04-19 03:20:14', '2021-04-19 03:20:14'),
(379, 233, 'AccountNumber', '25478965004521', '2021-04-19 03:20:16', '2021-04-19 03:20:16'),
(380, 233, 'IfscCode', 'BGDUK458742', '2021-04-19 03:20:16', '2021-04-19 03:20:16'),
(381, 234, 'AccountNumber', '25478965004521', '2021-04-19 03:20:18', '2021-04-19 03:20:18'),
(382, 234, 'IfscCode', 'BGDUK458742', '2021-04-19 03:20:18', '2021-04-19 03:20:18'),
(383, 235, 'AccountNumber', '25478965004521', '2021-04-19 03:20:19', '2021-04-19 03:20:19'),
(384, 235, 'IfscCode', 'BGDUK458742', '2021-04-19 03:20:19', '2021-04-19 03:20:19'),
(385, 236, 'AccountNumber', '25478965004521', '2021-04-19 03:20:22', '2021-04-19 03:20:22'),
(386, 236, 'IfscCode', 'BGDUK458742', '2021-04-19 03:20:22', '2021-04-19 03:20:22'),
(387, 237, 'AccountNumber', '25478965004521', '2021-04-19 03:20:23', '2021-04-19 03:20:23'),
(388, 237, 'IfscCode', 'BGDUK458742', '2021-04-19 03:20:23', '2021-04-19 03:20:23'),
(389, 238, 'AccountNumber', '25478965004521', '2021-04-19 03:20:25', '2021-04-19 03:20:25'),
(390, 238, 'IfscCode', 'BGDUK458742', '2021-04-19 03:20:25', '2021-04-19 03:20:25'),
(391, 239, 'AccountNumber', '25478965004521', '2021-04-19 03:20:26', '2021-04-19 03:20:26'),
(392, 239, 'IfscCode', 'BGDUK458742', '2021-04-19 03:20:26', '2021-04-19 03:20:26'),
(393, 240, 'AccountNumber', '25478965004521', '2021-04-19 03:20:29', '2021-04-19 03:20:29'),
(394, 240, 'IfscCode', 'BGDUK458742', '2021-04-19 03:20:29', '2021-04-19 03:20:29'),
(395, 241, 'AccountNumber', '25478965004521', '2021-04-19 03:20:31', '2021-04-19 03:20:31'),
(396, 241, 'IfscCode', 'BGDUK458742', '2021-04-19 03:20:31', '2021-04-19 03:20:31'),
(397, 242, 'AccountNumber', '25478965004521', '2021-04-19 03:20:32', '2021-04-19 03:20:32'),
(398, 242, 'IfscCode', 'BGDUK458742', '2021-04-19 03:20:32', '2021-04-19 03:20:32'),
(399, 243, 'AccountNumber', '25478965004521', '2021-04-19 03:21:53', '2021-04-19 03:21:53'),
(400, 243, 'IfscCode', 'BGDUK458742', '2021-04-19 03:21:53', '2021-04-19 03:21:53'),
(401, 244, 'AccountNumber', '25478965004521', '2021-04-19 03:21:55', '2021-04-19 03:21:55'),
(402, 244, 'IfscCode', 'BGDUK458742', '2021-04-19 03:21:55', '2021-04-19 03:21:55'),
(403, 245, 'AccountNumber', '25478965004521', '2021-04-19 03:21:57', '2021-04-19 03:21:57'),
(404, 245, 'IfscCode', 'BGDUK458742', '2021-04-19 03:21:57', '2021-04-19 03:21:57'),
(405, 246, 'AccountNumber', '25478965004521', '2021-04-19 03:21:59', '2021-04-19 03:21:59'),
(406, 246, 'IfscCode', 'BGDUK458742', '2021-04-19 03:21:59', '2021-04-19 03:21:59'),
(407, 247, 'AccountNumber', '25478965004521', '2021-04-19 03:22:02', '2021-04-19 03:22:02'),
(408, 247, 'IfscCode', 'BGDUK458742', '2021-04-19 03:22:02', '2021-04-19 03:22:02'),
(409, 248, 'AccountNumber', '25478965004521', '2021-04-19 03:22:03', '2021-04-19 03:22:03'),
(410, 248, 'IfscCode', 'BGDUK458742', '2021-04-19 03:22:03', '2021-04-19 03:22:03'),
(411, 249, 'AccountNumber', '25478965004521', '2021-04-19 03:22:05', '2021-04-19 03:22:05'),
(412, 249, 'IfscCode', 'BGDUK458742', '2021-04-19 03:22:05', '2021-04-19 03:22:05'),
(413, 250, 'AccountNumber', '25478965004521', '2021-04-19 03:22:08', '2021-04-19 03:22:08'),
(414, 250, 'IfscCode', 'BGDUK458742', '2021-04-19 03:22:08', '2021-04-19 03:22:08'),
(415, 251, 'AccountNumber', '25478965004521', '2021-04-19 03:22:09', '2021-04-19 03:22:09'),
(416, 251, 'IfscCode', 'BGDUK458742', '2021-04-19 03:22:09', '2021-04-19 03:22:09'),
(417, 252, 'AccountNumber', '25478965004521', '2021-04-19 03:22:11', '2021-04-19 03:22:11'),
(418, 252, 'IfscCode', 'BGDUK458742', '2021-04-19 03:22:11', '2021-04-19 03:22:11'),
(419, 253, 'AccountNumber', '25478965004521', '2021-04-19 03:22:13', '2021-04-19 03:22:13'),
(420, 253, 'IfscCode', 'BGDUK458742', '2021-04-19 03:22:13', '2021-04-19 03:22:13'),
(421, 254, 'AccountNumber', '25478965004521', '2021-04-19 03:22:15', '2021-04-19 03:22:15'),
(422, 254, 'IfscCode', 'BGDUK458742', '2021-04-19 03:22:15', '2021-04-19 03:22:15'),
(423, 255, 'AccountNumber', '25478965004521', '2021-04-19 03:22:18', '2021-04-19 03:22:18'),
(424, 255, 'IfscCode', 'BGDUK458742', '2021-04-19 03:22:18', '2021-04-19 03:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('admin','user','recipient') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'male',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `otp_time` datetime DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profile.png',
  `front_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `back_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_proof_verified` tinyint(4) DEFAULT 0 COMMENT '0: Not Verified, 1: Verified',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_uniqu_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: Android, 2: iOS	',
  `device_token` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: Not Verified, 1: Verified',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_id`, `customer_id`, `first_name`, `middle_name`, `last_name`, `email`, `email_verified_at`, `password`, `google_id`, `type`, `date_of_birth`, `gender`, `phone`, `address`, `address2`, `city`, `state`, `country`, `zipcode`, `occupation`, `reference`, `otp`, `otp_time`, `image`, `front_proof`, `back_proof`, `is_proof_verified`, `remember_token`, `user_uniqu_id`, `device_type`, `device_token`, `is_verified`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'admin', 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$nmH/zGQ6WOrRioQSLMVb3OtBmEXl5KFULfUWJT07e775PcYm2BEUO', NULL, 'admin', NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, 'yXf8J24CuysmA3yisI0msZNX7o3kWADklB3TS7k36qKlMLJOQ6hxI9umLCgZ', 'TEST123', 1, NULL, 1, NULL, NULL, '2021-03-14 23:44:56'),
(2, 0, NULL, 'Alex', '', 'Parker', 'alexparker@gmail.com', NULL, '$2y$10$46qvNTTafGYaDugS.un3XO8fnIwQ6PksjwvU3ywxxl/kZZktT02.q', NULL, 'user', NULL, 'male', '1234567890', NULL, NULL, NULL, NULL, '98', NULL, NULL, NULL, 111111, '2020-11-19 05:11:00', 'profile.png', NULL, NULL, 0, 'XEC6KeeqcEMrw4AlyTPZ17BaOrk223GDFYlQkQaoX2ZOqCLlVVPYidVj328X', 'TEST123', 1, NULL, 1, NULL, NULL, '2020-11-18 23:41:18'),
(3, 0, NULL, 'User', NULL, 'One', 'user1@yopmail.com', '2021-04-14 03:29:49', '$2y$10$42NwQkDT4DLfDFIH1hizzun4FVktrErS.6OahIuRkVzsn3g4a6lny', NULL, 'user', '1997-01-01', 'male', '1234567890', 'addr', NULL, NULL, 'Gujarat', '98', '123456', NULL, NULL, NULL, NULL, '1611059350.jpeg', '63107.png', '63108.png', 0, 'dMQ1eLGXlRHac6rhCC22V9fLOt91JWXThC0ko4JPKGBGR2hirosfx3nttSM9', 'TEST123', 2, 'abcd1', 1, NULL, '2020-11-19 00:00:10', '2021-04-14 03:29:49'),
(4, 0, NULL, NULL, NULL, NULL, 'user2@yopmail.com', '2020-11-20 05:13:40', '$2y$10$A4FySkpQfDX17//wepoCIu.axErjGFxWlGtMosPcT4Kwp8jXc0vFK', NULL, 'user', NULL, 'male', '1234567890', NULL, NULL, NULL, NULL, '98', NULL, NULL, NULL, 111111, '2021-01-02 06:16:00', 'profile.png', NULL, NULL, 0, 'KQRUyawxkopvuPbev6XIsMj6lIpymtZye0sCWXAkFN2PexCbUXkTpbl5zR6s', 'TEST123', 1, NULL, 1, NULL, '2020-11-20 05:13:17', '2021-01-02 00:46:52'),
(7, 0, NULL, 'Anandi', NULL, 'sheladiya', 'test.user25112020@gmail.com', '2020-12-23 06:21:30', '$2y$10$eOTKTzacXuetDvDrl11kYOMOuy5ZJqJDcVms.Jn9nZtghDAlPDZO2', '106830784080666675387', 'user', '2020-01-01', 'male', '08238305952', '3rd floor shriji nivas, a to z, athwa', NULL, NULL, 'Gujarat', '1', '395001', NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, 'F2ghr4ub5ZkI3yCm2XVIGYoGUEDZZegJMK2N4IvCXwQQxCERA0atKsiiFEg5', 'TEST123', 1, NULL, 1, NULL, '2020-12-14 09:55:08', '2020-12-23 06:21:30'),
(10, 0, NULL, NULL, NULL, NULL, 'aalphaenq@gmail.com', '2020-12-15 02:42:53', '$2y$10$MclIU/RijE7cWvYJaFhwROIQ1YQx.kA2mNpSxWJD6omgOWdoRwaca', '117572688042351826438', 'user', NULL, 'male', '9845619104', NULL, NULL, NULL, NULL, '98', NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, NULL, 'TEST123', 1, NULL, 1, NULL, '2020-12-15 02:42:32', '2020-12-15 02:42:53'),
(13, 0, NULL, 'Hardik', NULL, 'Viradiya', 'userhv@yopmail.com', '2021-01-20 07:16:56', '$2y$10$AYjubVuvXzA4hium01yvjOeCIRDyLgbDBJ6P1N3OP9vV44s6vsfh2', NULL, 'user', '2020-01-01', 'male', '123468995', 'surat', NULL, NULL, 'gujarat', '98', '3900510', NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, 'NZYwFN800VOuw559PpScqZD2LGNrtUWlQEjK5DXj7FcQGPTKsqnzWt6h4w48', '5FE47C7543405', 1, NULL, 1, NULL, '2020-12-24 06:03:09', '2021-01-20 07:16:56'),
(14, 0, NULL, 'Anandi', NULL, 'sheladia', 'testapi1@yopmail.com', '2021-01-18 03:37:54', '$2y$10$UJNjfCCZXDRqyJ4T5jyHm.zthTUXreNS.k4kAa9gJzhOPa.ek0kri', NULL, 'user', '2021-01-01', 'female', '08238305952', '3rd floor shriji nivas, a to z, athwa', NULL, NULL, NULL, '10', '395001', NULL, NULL, 111111, '2021-03-19 12:48:00', '1611211014.jpg', NULL, NULL, 0, 'CtZtTOYjT5r4gyXvaqCK8YgnZOjm9gS84Kggf6lDuvjOLLcT7h6WrOkZTlg2', '5FEC28350780D', 1, NULL, 1, NULL, '2020-12-30 01:41:49', '2021-03-19 07:18:56'),
(15, 0, NULL, NULL, NULL, NULL, 'testapi2@yopmail.com', NULL, '$2y$10$DWRqi62ppuGTntrZ/svn2.V7z9VQkzJSsT8OxRb/4vLTY0GNkFrUS', 'gidapi1', 'user', NULL, 'male', '1234567890', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, 111111, '2020-12-30 07:14:00', 'profile.png', NULL, NULL, 0, NULL, '5FEC28C4CF306', 2, 'abcd1', 1, NULL, '2020-12-30 01:44:12', '2020-12-30 01:44:29'),
(16, 0, NULL, NULL, NULL, NULL, 'testapi3@yopmail.com', NULL, '$2y$10$6rz00Q8plVF1R7mpaWkghezVeFegq0pVjy.iZksDjnKloUi6IbdZ.', NULL, 'user', NULL, 'male', '1234567890', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, 111111, '2020-12-30 07:55:00', 'profile.png', NULL, NULL, 0, NULL, '5FEC325406087', 1, NULL, 1, NULL, '2020-12-30 02:25:00', '2020-12-30 02:25:00'),
(17, 0, NULL, NULL, NULL, NULL, 'test1@gmail.com', '2020-12-31 22:44:18', '$2y$10$hpocMtCS0FjRDGY0XUgLuetCGj6ru5wY5S1KuGL2B2BhuBlxx/fDS', NULL, 'user', NULL, 'male', '123456790', NULL, NULL, NULL, NULL, '98', NULL, NULL, NULL, 111111, '2021-01-02 05:56:00', 'profile.png', NULL, NULL, 0, 'doYFFL52VdVpt6rcTHEoD4GHaTAbrhYSJrkoZGyoHEbVudDmiAfLGw1duqXl', '5FEC3A4BC3BBF', 2, 'abcd1', 1, NULL, '2020-12-30 02:58:59', '2021-01-02 00:26:32'),
(18, 0, NULL, 'ABCD', NULL, 'EFGH', 'test2@gmail.com', '2020-12-31 23:03:28', '$2y$10$sdPLUhws7Y1M5WMGUdc4zesI5ymnL6WTNveX0Vb20wzVaPh9IPIsq', NULL, 'user', '2021-01-01', 'male', '123456789', '28 Swanson St, New York', NULL, NULL, 'New York', '230', '5820', NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, '1NKKa7h12VJG7UNR5GaKZywItE2RyNe8XxlTcR14Mm7ThHHY2mrfgt9HRMWs', '5FEC4048DD996', 1, NULL, 1, NULL, '2020-12-30 03:24:32', '2021-01-01 00:25:32'),
(19, 0, NULL, NULL, NULL, NULL, 'test3@gmail.com', NULL, '$2y$10$qWoB3XKk5jT7D1XkbFddcO.tMkEank56cvIMzexL2gLIckrhJgAge', NULL, 'user', NULL, 'male', '1234567890', NULL, NULL, NULL, NULL, '6', NULL, NULL, NULL, 111111, '2020-12-30 09:02:00', 'profile.png', NULL, NULL, 0, NULL, '5FEC42410174C', 1, NULL, 1, NULL, '2020-12-30 03:32:57', '2020-12-30 03:32:57'),
(23, 0, NULL, 'hardik', NULL, 'patel', 'hardik@gmail.com', NULL, '$2y$10$9fGgio7C0aofSy1oyY/BTOxEpNrCisWzgpRPzeBOJeCrZJqb84kxu', NULL, 'user', '2010-01-01', 'male', '86868989889', 'surat', NULL, NULL, 'gujrat', '98', '390054', NULL, NULL, 111111, '2021-01-16 04:54:00', 'profile.png', NULL, NULL, 0, NULL, '6001883869DA4', 1, NULL, 1, NULL, '2021-01-15 06:49:04', '2021-01-15 23:24:50'),
(20, 0, NULL, NULL, NULL, NULL, 'test11@gmail.com', NULL, '$2y$10$0IJeHQ58clNbCgaG21AECeJmwSc.V62TI5LIEbNy7hUDVw4GdZana', NULL, 'user', NULL, 'male', '9725789197', NULL, NULL, NULL, NULL, '98', NULL, NULL, NULL, 111111, '2021-01-04 14:16:00', 'profile.png', NULL, NULL, 0, NULL, '5FF323101F16A', 1, '', 1, NULL, '2021-01-04 08:45:44', '2021-01-04 08:46:28'),
(21, 0, NULL, NULL, NULL, NULL, 'doziehiogu@gmail.com', '2021-01-04 15:51:53', '$2y$10$4XvUuJSLtSWV2EAkw99zeu.ZbaC5S.WqpE5W5VE3/06PTzLO8pk9K', NULL, 'user', NULL, 'male', '0810007979', NULL, NULL, NULL, NULL, '158', NULL, NULL, NULL, 111111, '2021-03-02 08:55:00', 'profile.png', NULL, NULL, 0, 'zzwA8SRu2eJDQRkF84f0ZsLwZo0F2UyKXzJ8eIFUBIjPcJ3COIIBp0S0mxhB', '5FF3869306388', 1, NULL, 1, NULL, '2021-01-04 15:50:19', '2021-03-02 03:25:17'),
(22, 0, NULL, NULL, NULL, NULL, 'pranavvvbegade@gmail.com', '2021-01-06 21:11:02', '$2y$10$aaVG0bvmIPhzO5hsbxs/2.DhAC/4UrK/5ie4.QpC13JfNP5tpkh7q', '112462673643229314302', 'user', NULL, 'male', '9725789197', NULL, NULL, NULL, NULL, '98', NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, 'WVmFNVV61GplezCkCkdCgyCLctMzxgX5rRC1SqoFJpTLS0eLN9ssf2n5tfuy', '5FF674AB5048A', 1, NULL, 1, NULL, '2021-01-06 21:10:43', '2021-01-06 21:11:02'),
(24, 0, NULL, 'pranav', NULL, 'Pranav Begade', 'pranavvbegade@gmail.com', NULL, '$2y$10$WJWLwJN3hh5/1X.zgcsYdOSolIHCuDT1g4LYc7kL3Nd/PwHjoQ.ra', NULL, 'user', '2025-01-01', 'male', '+919725789197', 'VIP Cir', NULL, NULL, 'Gujarat', '230', '394210', NULL, NULL, 111111, '2021-02-03 06:35:00', 'profile.png', NULL, NULL, 0, NULL, '6002F8A053464', 2, 'abcd1', 1, NULL, '2021-01-16 09:00:56', '2021-02-03 01:05:55'),
(25, 0, NULL, 'pranav', NULL, 'Pranav Begade', 'hehe@jj.com', NULL, '$2y$10$X6LTZpLp837TQN8ixFYtfeoyKifcpGsxUoAJ3WBDWZ3YAx975ka7G', NULL, 'user', '1995-06-01', 'male', '9725789197', 'VIP Cir', NULL, NULL, 'Gujarat', '230', '394210', NULL, NULL, 111111, '2021-01-18 15:09:00', 'profile.png', NULL, NULL, 0, NULL, '6005A29A791A1', 1, NULL, 1, NULL, '2021-01-18 09:30:42', '2021-01-18 09:39:49'),
(26, 0, NULL, 'Anandi', NULL, 'patel', 'anandi1667@gmail.com', NULL, '$2y$10$b1b/4Sagfy499rvk24EyjuFhnS4FtAPR4NwJTEXqHQd6ror/cUxf2', NULL, 'user', '1946-06-01', 'male', '96325801477', '213, new Location', NULL, NULL, 'gujarat', '98', '369258', NULL, NULL, 111111, '2021-01-19 04:02:00', 'profile.png', NULL, NULL, 0, NULL, '600659BEBBF10', 1, NULL, 1, NULL, '2021-01-18 22:32:06', '2021-01-18 22:36:19'),
(27, 0, NULL, 'pk', NULL, 'sc', 'hp123@gmail.com', NULL, '$2y$10$NdQgA1kmgGJm9WyW.ZGdWeiY6CxWTCwIWlz.rMfwefXUM7bWInI4q', NULL, 'user', '2025-01-01', 'male', '5659859585565', 'surat', NULL, NULL, 'gujrat', '98', '1236544', NULL, NULL, 111111, '2021-01-19 09:42:00', 'profile.png', NULL, NULL, 0, NULL, '60065B82439FC', 1, NULL, 1, NULL, '2021-01-18 22:39:38', '2021-01-19 04:12:50'),
(28, 0, NULL, NULL, NULL, NULL, 'user2@gmail.com', NULL, '$2y$10$76HwXwEk52YU1lFUFDN/SOJlQiT4/Y3iX568FNxAfcjfFNYKgKtwq', NULL, 'user', NULL, 'male', '9876543210', NULL, NULL, NULL, NULL, '98', NULL, NULL, NULL, 111111, '2021-01-20 09:10:00', 'profile.png', NULL, NULL, 0, NULL, '6007DFE0355B7', 2, 'abcd1', 0, NULL, '2021-01-20 02:16:40', '2021-01-20 03:40:40'),
(29, 0, NULL, 'pranav Ashok', NULL, 'begade', 'pranav@technomads.in', NULL, '$2y$10$k4ZenLPpg8N3UOYaaElw9eJWuAfLCZKy9iStgptkCrHYLDP2AjmcO', NULL, 'user', '2003-06-16', 'male', '556688965336', 'Surat', NULL, NULL, 'gun', '98', '394210', NULL, NULL, 111111, '2021-01-22 09:12:00', 'profile.png', NULL, NULL, 0, NULL, '600A970FD129E', 1, NULL, 0, NULL, '2021-01-22 03:42:47', '2021-01-22 03:50:23'),
(30, 0, NULL, 'Andrew', NULL, 'Yang', 'info@egogram.com', NULL, '$2y$10$hzOE1.b/73OX7ymvg2AuROpzxbW2E4JOXD/w6grJzo8Ykt3TeQ9na', NULL, 'user', '1982-04-01', 'male', '852396452', '56 Bali St', NULL, NULL, 'Antioch', '30', '25394', NULL, NULL, 111111, '2021-02-06 03:10:00', 'profile.png', NULL, NULL, 0, NULL, '601E088BED32F', 1, '', 0, NULL, '2021-02-05 21:40:03', '2021-02-05 21:50:40'),
(31, 0, NULL, 'Anandi', NULL, 'sheladiya', 'a@gmail.com', '2021-02-19 05:30:53', '$2y$10$Xm2GrTtuzTBLUpqDKejs5.GZ4.NaOfYxl3tUsCqktpIICdZOfJsIe', NULL, 'user', '2021-01-01', 'male', '565656565', '3rd floor shriji nivas, a to z, athwa', NULL, NULL, 'Gujarat', '98', '395001', NULL, NULL, NULL, NULL, 'profile.png', '16137325571.png', '16137325582.png', 1, 'zsUrdMHv2xiR31M4rDb5pfMDvE7NoNr3pNyMbyjE51C0oNWw08RAFrSjRia1', '602F9A532EAA1', 1, NULL, 0, NULL, '2021-02-19 05:30:35', '2021-02-22 00:29:37'),
(32, 0, NULL, NULL, NULL, NULL, 'bhaveshambaliya05@gmail.com', NULL, '$2y$10$mRplvpvUypsYbk9eE4V59ePq9tBC49dnGhVN1VskunPQTSnJhdKBe', '114097938197460248703', 'user', NULL, 'male', '9601688783', NULL, NULL, NULL, NULL, '98', NULL, NULL, NULL, 111111, '2021-02-20 04:55:00', 'profile.png', NULL, NULL, 0, 'TNEWOD8r5EgpTe9l2VaUo36YCGKc2Y935GW0d8rptvq5qH2rgUUJv9T15phU', '6030962DBD3A8', 1, NULL, 0, NULL, '2021-02-19 23:25:09', '2021-02-19 23:25:22'),
(33, 0, NULL, 'Dudu', NULL, 'didi’s', 'abc@yahoo.com', NULL, '$2y$10$XeRqNF8CyuIE8QoARCEr3.8q8iOY6LSWLegJ9GDj8Gq5a2PBZbT6a', NULL, 'user', '2020-02-02', 'male', '45545454', 'jcjdjx', NULL, NULL, 'Uddhav', '230', '8668', NULL, NULL, 111111, '2021-02-24 06:16:00', 'profile.png', NULL, NULL, 0, NULL, '6035EF3CE5C6F', 1, '', 0, NULL, '2021-02-24 00:46:28', '2021-03-03 22:56:44'),
(34, 0, NULL, NULL, NULL, NULL, 'anandi@gmail.com', NULL, '$2y$10$893DHs2kdhwybYqkPZOhiOH38KQWYs7AdHQtXDv6aCiqWPX1zKjiG', NULL, 'user', NULL, 'male', '6325147890', NULL, NULL, NULL, NULL, '230', NULL, NULL, NULL, 111111, '2021-03-02 09:21:00', 'profile.png', NULL, NULL, 0, NULL, '603E038F10350', 1, NULL, 0, NULL, '2021-03-02 03:51:19', '2021-03-02 03:51:40'),
(35, 0, NULL, 'Andrew', NULL, 'Yang', 'Nwachukwuu@egogram.com', NULL, '$2y$10$2pLUhd07OdIjwucr.Kb1b.kUfbbqsVNs.tuQBKgsf3arzNHy3El9W', NULL, 'user', '1960-10-01', 'male', '2816065157', '123 United States', NULL, NULL, 'Michigan', '230', '48092', NULL, NULL, 111111, '2021-03-04 00:08:00', 'profile.png', NULL, NULL, 0, NULL, '604024DEEE114', 1, '', 0, NULL, '2021-03-03 18:37:58', '2021-03-03 18:49:16'),
(36, 0, NULL, 'TESTER', NULL, 'KINJAL', 'jigneshjp21@live.com', '2021-04-19 02:13:15', '$2y$10$PLy2dxWssCbYU.IljBh7.uz53zbu5BwPcNH/BDHnWCCFWsha2JTHm', NULL, 'user', '1996-01-13', 'male', '9898234567', 'Alaknanda society', NULL, NULL, 'Africa', '240', '986532', NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, '4XDZ7G2oMqEIOYMioVf4FRJj8IR0VAaO0K0oN1RvLw6fJEWya9Q5QkZxw8i3', '6062DFA9D23FB', 1, NULL, 0, NULL, '2021-03-30 02:52:01', '2021-04-19 02:53:39'),
(37, 0, NULL, 'kinjal', NULL, 'Technomads', 'kinjal.technomads@gmail.com', '2021-03-31 22:18:49', '$2y$10$cevmKAi.Cz.l/Gu9AqQf.uiPohuFa9rrefUGBfAge/LX0pzqMzxii', NULL, 'user', '1989-01-13', 'male', '98653298', 'hhdhgdhfh', NULL, NULL, 'dvvfvdvdvd', '95', '8532456', NULL, NULL, 111111, '2021-04-01 03:54:00', 'profile.png', '16172491431.png', '16172491462.png', 1, 'wZTrbYNe7GT9mONIz91H6k0Eyi21SLZ0Tq17vYhID3xnkex7OP66Xdzd2v2L', '6065427C5C3C5', 1, NULL, 0, NULL, '2021-03-31 22:18:12', '2021-04-14 04:07:44'),
(38, 0, NULL, 'Kinjal', NULL, 'Tester', 'Kinjalprajapati013@gmail.com', '2021-04-14 22:24:54', '$2y$10$Icig9qwltERqcTyQyi6r2uAjPGCfB9TuiIXePssKnZ6DzoGn6XKga', NULL, 'user', '2021-01-01', 'male', '254664852', 'yrejy', NULL, NULL, 'gujarat', '98', '2454175', NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, 'MySoTisBKIwQoUjuDbQAAqSvJSF3RILvzjXLK5RqdKn9G61sqVCs3O3U3rXG', '6076A5D14A8D9', 1, '', 0, NULL, '2021-04-14 02:50:33', '2021-04-15 00:53:57'),
(39, 0, NULL, 'gdufhcc', NULL, 'vjgjg', 'jani@gmail.com', NULL, '$2y$10$o3QfyomfunQTgmdIR6deJuvbDNCn1HN5lGpDqNYiB6XZskVMEj7LS', NULL, 'user', '2021-01-01', 'female', '1234567890', 'vufhvk', NULL, NULL, NULL, '98', '86886686', NULL, NULL, 111111, '2021-04-14 11:05:00', '1618483187.jpg', NULL, NULL, 0, NULL, '6076CBEDAD4C4', 1, NULL, 0, NULL, '2021-04-14 05:33:09', '2021-04-15 05:09:48'),
(40, 0, NULL, 'Tester', NULL, 'Technomads', 'Testerkp@gmail.com', '2021-04-15 01:14:06', '$2y$10$I/F3BdQf6wxbE16/JdWTIOElmGArtaUkltbLBelQKoRxdBuAEWus2', NULL, 'user', '1993-01-13', 'male', '09898989898', 'grfdre', NULL, NULL, 'gujarat', '98', '545458', NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, 'e256UKZKPOXpXweqHepacfU8rRZtfVg9wdjEhZPXDBXubaTg9tEcnsLCkraf', '6077E07240B82', 1, NULL, 0, NULL, '2021-04-15 01:12:58', '2021-04-15 01:26:08'),
(41, 0, NULL, NULL, NULL, NULL, 'a123@gmail.com', '2021-04-29 03:32:37', '$2y$10$tHG.QWCvyFiQtbJLLnqWQ.ugA.svtMasEA4jUV1ebm7Q4objPJ4eO', NULL, 'user', NULL, 'male', '5654232132', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, 'qurpF4KqjmpolF5WtkW9tiUcoyKdOvvX4uPqbHF9pEWo3KPmADXE4ZTtbgfh', '608A76165B9CD', 1, NULL, 0, NULL, '2021-04-29 03:32:14', '2021-04-29 03:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_bank_details`
--

CREATE TABLE `user_bank_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `field_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_bank_details`
--

INSERT INTO `user_bank_details` (`id`, `user_id`, `field_name`, `field_value`, `created_at`, `updated_at`) VALUES
(1, 29, 'AccountNumber', '14205845695569', '2021-01-22 03:49:39', '2021-01-22 03:49:39'),
(2, 29, 'IfscCode', 'barren big be', '2021-01-22 03:49:39', '2021-01-22 03:49:39'),
(3, 29, 'AccountNumber', '14205845695569', '2021-01-22 03:49:52', '2021-01-22 03:49:52'),
(4, 29, 'IfscCode', 'barren big be', '2021-01-22 03:49:52', '2021-01-22 03:49:52'),
(5, 29, 'AccountNumber', '14205845695569', '2021-01-22 03:50:03', '2021-01-22 03:50:03'),
(6, 29, 'IfscCode', 'barren big be', '2021-01-22 03:50:03', '2021-01-22 03:50:03'),
(7, 29, 'AccountNumber', '14205845695569', '2021-01-22 03:50:09', '2021-01-22 03:50:09'),
(8, 29, 'IfscCode', 'barren big be', '2021-01-22 03:50:09', '2021-01-22 03:50:09'),
(9, 29, 'AccountNumber', '14205845695569', '2021-01-22 03:50:14', '2021-01-22 03:50:14'),
(10, 29, 'IfscCode', 'barren big be', '2021-01-22 03:50:14', '2021-01-22 03:50:14'),
(11, 29, 'AccountNumber', '14205845695569', '2021-01-22 03:50:23', '2021-01-22 03:50:23'),
(12, 29, 'IfscCode', 'barren big be', '2021-01-22 03:50:23', '2021-01-22 03:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `zelles`
--

CREATE TABLE `zelles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zelle_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zelles`
--

INSERT INTO `zelles` (`id`, `zelle_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'zelleo@egogram.com', '2021-02-15 11:39:37', '2021-03-14 23:44:20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_tokens`
--
ALTER TABLE `access_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_details_user_id_foreign` (`user_id`),
  ADD KEY `bank_details_country_id_foreign` (`country_id`);

--
-- Indexes for table `bank_fields`
--
ALTER TABLE `bank_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_fields_country_id_foreign` (`country_id`);

--
-- Indexes for table `bank_field_options`
--
ALTER TABLE `bank_field_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `configurations_key_unique` (`key`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `payment_options`
--
ALTER TABLE `payment_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipients`
--
ALTER TABLE `recipients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stores_email_unique` (`email`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_email_unique` (`email`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_fields`
--
ALTER TABLE `transaction_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_customer_id_unique` (`customer_id`);

--
-- Indexes for table `user_bank_details`
--
ALTER TABLE `user_bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zelles`
--
ALTER TABLE `zelles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_tokens`
--
ALTER TABLE `access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_fields`
--
ALTER TABLE `bank_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bank_field_options`
--
ALTER TABLE `bank_field_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payment_options`
--
ALTER TABLE `payment_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recipients`
--
ALTER TABLE `recipients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=569;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `transaction_fields`
--
ALTER TABLE `transaction_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_bank_details`
--
ALTER TABLE `user_bank_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `zelles`
--
ALTER TABLE `zelles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
