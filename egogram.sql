-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 23, 2021 at 03:00 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

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
(1, 13, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.-5l3diCeP6cWyUagipCDcMFrDiZFRk4d1t_C33f_E_o', '2020-12-29 02:09:55', '2021-01-07 05:58:56'),
(2, 14, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.xcwYciKhEcCuIoGiJTPdAxe4YPr9ChOE3E1sFoFoIBY', '2020-12-29 02:13:00', '2020-12-29 02:13:00'),
(3, 15, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.e1CDyuHm-8jFpzMjfYDTL2RgC4O79v446INiCXoGyLI', '2020-12-29 02:13:21', '2020-12-29 02:13:21'),
(4, 16, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.Ya3zRazCkFUPsNs-pMOWZCZd93pD9Ht2Nlb9R5PaWQo', '2020-12-29 02:18:04', '2020-12-29 04:55:07'),
(5, 17, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.C9zqJ-jkS0zFyHaOaPtQyCyMUnj_J7hrHbF7Es5PpyI', '2020-12-29 04:57:25', '2020-12-29 05:03:03'),
(6, 18, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.iQXq2RdYSPwnEtelr4_OFNiDG7pnNILv8Fr-LdEjN0U', '2020-12-29 05:03:17', '2020-12-29 05:05:07'),
(7, 19, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.6ITvvN_immD2G9vwe1a-sF5X-Q3SfBIBSUOcSoGAfW0', '2020-12-29 05:05:21', '2020-12-29 05:05:21'),
(8, 20, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.HbpAtA93F8MTH5aFL9lvq56NF22rbiNJqQaARks7Xu4', '2020-12-29 05:07:02', '2020-12-29 05:07:02'),
(9, 21, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.xUlvnQ6PaniZscsVP1qgNFttgeRHdX474aR3R4A7fmg', '2020-12-29 05:08:52', '2020-12-29 05:09:12'),
(10, 3, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.erFHyf088y1HIaeJmsCEJIMPWeExZTc-oESwzHFf-Uc', '2020-12-29 05:07:02', '2021-01-22 06:49:18'),
(11, 22, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.suCpP77r0h4YZ5sRkKYUhQsa8-B3WDyRhhCFeoAeBeQ', '2020-12-31 23:02:43', '2021-01-01 22:48:31'),
(12, 23, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.zJGhCcn7oID4IvfxaEbmgjdcxkebUSQ0rfbdvErpEbY', '2021-01-01 03:01:48', '2021-01-01 03:01:48'),
(13, 24, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.bJqfArmNYscNrE6Dlf8brqcpRNjBtJ4jYQhsgCmYf4U', '2021-01-01 09:05:38', '2021-01-01 09:05:38'),
(14, 25, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.le-StiIuLNeZSvYh12-0vNWUbtiH6f8rRn-7Hi9AVYE', '2021-01-04 01:28:11', '2021-01-04 01:28:11'),
(15, 26, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.23aOfrJetwys10PBI2gTXYObPxojHn9UGk5RHxmTCfA', '2021-01-04 02:07:49', '2021-01-04 04:37:57'),
(16, 27, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.u061POuaBtoCESpdr4jHAL4UpogBSnvoboCc4qpN4Yk', '2021-01-20 03:48:27', '2021-01-20 03:48:27'),
(17, 28, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.b4jFpNFS6yaBR9Z4JT53k_ys3end0LHJe_d9_WoBNgA', '2021-01-20 04:03:43', '2021-01-21 23:38:49'),
(18, 29, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.RWdvZ3JhbQ.Peugp6mKPyd_DeKdCA8gEVxFAIcdOZKy9t1ebm6-JHQ', '2021-01-20 08:18:43', '2021-01-20 08:54:42');

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
(3, 1, 'tmp delete', '2021-02-08 06:35:12', '2021-02-08 06:35:10', '2021-02-08 06:35:12'),
(4, 1, 'tmp dele', '2021-02-08 06:52:48', '2021-02-08 06:51:41', '2021-02-08 06:52:48');

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
(4, 3, 1, 'fd', 'fdg', NULL, '2021-02-08 06:35:10', '2021-02-08 06:35:10'),
(5, 4, 1, 'sadf', 'dsfds', NULL, '2021-02-08 06:51:41', '2021-02-08 06:51:41');

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
  `is_zelle` tinyint(4) DEFAULT 0 COMMENT '0: Not Zelle, 1: Zelle',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `type`, `percentage`, `is_zelle`, `created_at`, `updated_at`) VALUES
(1, 'manual', 20.00, 0, '2020-11-19 00:41:36', '2020-11-19 00:41:36'),
(3, 'credit', 30.00, 0, '2020-11-19 04:07:01', '2020-11-19 04:27:31'),
(4, 'debit', 3.00, 0, '2020-11-21 01:52:42', '2020-11-21 06:10:37'),
(5, 'zelle', 10.00, 1, '2021-02-15 05:38:04', '2021-02-15 05:38:04');

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
(16, '2020_11_05_063319_create_bank_fields_table', 1),
(17, '2020_12_17_074450_create_recipients_table', 2),
(18, '2020_12_29_060321_create_access_tokens_table', 3),
(19, '2021_01_20_062031_create_user_bank_details_table', 4),
(20, '2021_02_15_112926_create_zelles_table', 5);

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
('testapi1@yopmail.com', 'zNXXvKyxk91seXlFEYzycQjaXDzSlvjdVJSBRz6QzFIZdQwgbA8n4RT5DNLr', '2020-12-29 08:21:54'),
('testapi1@yopmail.com', '0ozEIcnMxiY7fV6smM6jZTNxNaGuBnDAAEoqrUvuiC4XEV7rHzsgRmehRZTu', '2020-12-29 08:21:41'),
('testapi1@yopmail.com', 'nlS9t8hL9wbQ7hQIYLtAthDYoIZlfGcU1B40OSj9b5rF2WPRiQSehrbTVykO', '2020-12-29 08:20:38'),
('testapi1@yopmail.com', 'MkVb3H8kHAEhS4RQCIFrubhPxiZiAnWQYcG4XEwmMJibxxIJqdTWi4ELHXcD', '2020-12-29 08:20:26'),
('testapi1@yopmail.com', 'A8llD8I9g9XKZFLyuO7uVKhI9lfkC3uyOhymGprewFkslM3Lm0ditus9xwqM', '2020-12-29 08:22:06'),
('testapi1@yopmail.com', 'LGc0rW3yFBomFaGRWh1Gj1zcCUiksgBHNS7VVZIGb3ACneOa5JXwVFdFVkZK', '2020-12-30 07:21:42'),
('testapi1@yopmail.com', 'MnVtP0wexHajSq7k6nAXNz0i72tb9K7cV564gygJk8KxE2WmMJh92Vo6psky', '2020-12-30 07:23:00'),
('testapi1@yopmail.com', 'PRnmZfc9Xx1w9N1VQ14T57VeR1bRg88FX9DxRfOXzHVGUWLOVrHizypfgVq0', '2021-01-03 23:26:18'),
('testapi1@yopmail.com', 'qDj45oG8Dyzat0TEbYc9wT3RhywdoJcqUvIQUYepPLUdXvzVilkda9QK0QZY', '2021-01-04 04:21:39'),
('demo@gmail.com', 'IH5aIwPkxsriNzXd9puMb4VLwPLR0hLdW65qAQfxaxmkmR7dRH3sGJZcPKJU', '2021-01-04 04:24:20');

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
(1, 3, 98, 'u1@yopmail.com', 'dsf', 'dsf', NULL, NULL, '2020-12-21 07:06:34', '2021-02-22 08:12:56'),
(2, 3, 98, 'u2@yopmail.com', 'sadfdg', 'fdgsdf', NULL, NULL, '2020-12-21 07:08:30', '2021-02-23 08:07:00'),
(3, 3, 98, 'u3@yopmail.com', 'ufname', 'ulname', NULL, NULL, '2020-12-22 05:30:10', '2021-02-23 08:13:38'),
(5, 13, 230, 'ghyv@gfrsw.com', 'fhyy', 'gvy', NULL, NULL, '2020-12-31 05:57:24', '2020-12-31 05:57:24'),
(9, 13, 230, 'hardik@gmail.com', 'HARDIK', 'VIRADIYA', NULL, NULL, '2021-01-07 03:58:23', '2021-01-07 03:58:23'),
(10, 13, 230, 'hardik@gmail.com', 'HARDIK', 'VIRADIYA', NULL, NULL, '2021-01-07 04:01:13', '2021-01-07 04:01:13'),
(11, 13, 230, 'hardik@gmail.com', 'HARDIK', 'VIRADIYA', NULL, NULL, '2021-01-07 04:03:40', '2021-01-07 04:03:40'),
(12, 13, 4, 'hardik@gmail.com', 'HARDIK', 'VIRADIYA', NULL, NULL, '2021-01-07 04:16:14', '2021-01-07 04:16:14'),
(13, 13, 4, 'hardik@gmail.com', 'HARDIK', 'VIRADIYA', NULL, NULL, '2021-01-07 04:17:23', '2021-01-07 04:17:23'),
(14, 13, 4, 'hardik@gmail.com', 'HARDIK', 'VIRADIYA', NULL, '2021-01-18 06:35:30', '2021-01-07 04:34:44', '2021-01-18 06:35:30'),
(15, 13, 98, 'hardik@gmail.com', 'Ravi', 'patel', NULL, NULL, '2021-01-07 04:45:08', '2021-01-07 04:45:08'),
(16, 3, 98, 'u15121@yopmail.com', 'u', '15121', NULL, NULL, '2021-01-15 02:09:55', '2021-01-15 02:09:55'),
(17, 3, 98, 'temp@yopmail.com', 'tmp', 'tmp', NULL, NULL, '2021-01-15 03:54:12', '2021-01-16 04:02:40'),
(19, 3, 98, 'u151212@yopmail.com', 'u', '151212', NULL, NULL, '2021-01-15 08:20:17', '2021-01-15 08:20:17'),
(21, 13, 98, 'testing123321@yopmail.com', 'ff', 'll', NULL, NULL, '2021-01-18 06:30:57', '2021-01-18 06:30:57'),
(22, 13, 98, 'testing123321@yopmail.com', 'ff', 'll', NULL, NULL, '2021-01-18 06:31:38', '2021-01-18 06:31:38'),
(23, 13, 98, 'testing191211@yopmail.com', 'ff191', 'll191', NULL, NULL, '2021-01-19 03:32:04', '2021-01-19 03:32:04'),
(24, 27, 98, 'fes@fgds.ewf', 'Rajesh', 'Rajesh', NULL, NULL, '2021-01-20 03:54:58', '2021-01-20 03:54:58'),
(25, 28, 98, 'qwe@rt.yu', 'rty', 'tryst', NULL, NULL, '2021-01-20 04:07:08', '2021-01-20 04:07:08'),
(26, 28, 98, 'wr@vuoh.we’d', 'rwgt', 'wertghwrth', NULL, '2021-01-20 05:15:14', '2021-01-20 04:37:01', '2021-01-20 05:15:14'),
(27, 3, 230, 'zellllll@zell.com', 'adsd', 'dsfsf', '123321zl', NULL, '2021-02-20 07:42:47', '2021-02-23 05:23:05');

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
(1, 3, 1, 12.00, 'AUD', 'manual', 2.40, 0.00, 9.60, 9.00, 'AUD', 'Reason-1', '16085541871.jpg', '16085541872.jpg', 'ref', 'complete', '2020-12-22 00:37:38', '2020-12-22 05:29:05', '2020-12-22 05:29:22', NULL, NULL, 0, '2020-12-21 07:06:34', '2020-12-22 05:29:22'),
(2, 3, 2, 13.00, 'AUD', 'manual', 2.60, 0.00, 10.40, 10.00, 'AUD', 'Reason-2', '16085543051.jpg', '16085543052.jpg', 'reference', 'cancel', NULL, NULL, NULL, '2020-12-22 05:20:01', NULL, 0, '2020-12-22 04:59:15', '2020-12-22 05:20:01'),
(3, 3, 1, 12.00, 'AUD', 'manual', 2.40, 0.00, 9.60, 9.00, 'AUD', 'Reason-2', '16085585241.jpg', '16085585242.jpg', NULL, 'refund', NULL, NULL, NULL, '2020-12-22 04:40:23', '2020-12-22 04:40:36', 0, '2020-12-21 08:18:47', '2020-12-22 04:40:36'),
(4, 3, 2, 123.00, 'AUD', 'manual', 24.60, 0.00, 98.40, 98.00, 'AUD', 'Reason-4', '16086332581.jpg', '16086332582.jpg', 'ewrewrwe', 'cancel', NULL, NULL, NULL, '2020-12-22 05:21:32', NULL, 0, '2020-12-22 05:04:25', '2020-12-22 05:21:32'),
(5, 3, 2, 1234.00, 'AUD', 'manual', 246.80, 0.00, 987.20, 987.00, 'AUD', 'Reason-1', '16086343091.jpg', '16086343092.jpg', 'dsfsf', 'refund', NULL, NULL, NULL, '2020-12-22 05:25:21', '2020-12-22 05:25:48', 0, '2020-12-22 05:21:56', '2020-12-22 05:25:48'),
(6, 3, 3, 12.00, 'AUD', 'manual', 2.40, 0.00, 9.60, 9.00, 'AUD', 'Reason-1', '16086348061.jpg', '16086348062.jpg', NULL, 'later', NULL, NULL, NULL, NULL, NULL, 0, '2020-12-22 05:30:10', '2020-12-22 05:30:10'),
(7, 3, 1, 12.00, 'AUD', 'manual', 2.40, 0.00, 9.60, 9.00, 'AUD', 'Reason-1', '16086440561.jpg', '16086440562.jpg', 'rrrrr', 'cancel', NULL, NULL, NULL, '2020-12-22 08:05:17', NULL, 0, '2020-12-22 08:04:23', '2020-12-22 08:05:17'),
(8, 3, 2, 123.00, 'AUD', 'manual', 24.60, 0.00, 98.40, 98.00, 'AUD', 'Reason-1', '16086440801.jpg', '16086440802.jpg', NULL, 'refund', NULL, NULL, NULL, '2020-12-22 08:05:23', '2020-12-23 01:59:51', 0, '2020-12-22 08:04:45', '2020-12-23 01:59:51'),
(9, 3, 2, 12.00, 'AUD', 'manual', 2.40, 0.00, 9.60, 9.00, 'AUD', 'Reason-2', '16087238391.jpg', '16087238392.jpg', 'ref', 'cancel', NULL, NULL, NULL, '2020-12-23 06:16:39', NULL, 0, '2020-12-23 06:16:09', '2020-12-23 06:16:39'),
(10, 3, 3, 123.00, 'AUD', 'manual', 24.60, 0.00, 98.40, 98.00, 'AUD', 'Reason-4', '16087259221.jpg', '16087259222.jpg', 'refref', 'cancel', NULL, NULL, NULL, '2020-12-24 01:34:46', NULL, 0, '2020-12-23 06:49:04', '2020-12-24 23:45:15'),
(11, 3, 3, 1234.00, 'AUD', 'manual', 246.80, 0.00, 987.20, 987.00, 'AUD', 'Reason-3', '16087259681.jpg', '16087259682.jpg', 'refffff', 'cancel', NULL, NULL, NULL, '2020-12-30 06:34:57', NULL, 0, '2020-12-25 03:53:00', '2020-12-30 06:34:57'),
(12, 3, 1, 100.00, 'USD', 'manual', 20.00, 0.00, 80.00, 7330.00, 'INR', 'reason-1', '1234561.png', '1234562.png', 'ref', 'cancel', NULL, NULL, NULL, '2021-01-07 04:49:00', NULL, 0, '2021-01-07 04:48:53', '2021-01-07 04:49:00'),
(13, 13, 5, 100.00, 'AUD', 'manual', 20.00, 0.00, 80.00, 80.00, 'AUD', 'Reason-1', '16094138571.png', '16094138572.png', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2020-12-31 05:57:24', '2020-12-31 05:57:24'),
(14, 21, 1, 100.00, 'USD', 'manual', 20.00, 0.00, 80.00, 7330.00, 'INR', 'reason-1', '1234561.png', '1234562.png', 'ref', 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-01 06:56:37', '2021-01-01 06:56:37'),
(15, 21, 1, 100.00, 'USD', 'manual', 20.00, 0.00, 80.00, 7330.00, 'INR', 'reason-1', '1234561.png', '1234562.png', 'ref', 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-04 04:02:43', '2021-01-04 04:02:43'),
(16, 3, 3, 1200.00, 'CAD', 'manual', 240.00, 0.00, 1200.00, 68824.03, 'INR', 'Reason-3', NULL, NULL, NULL, 'cancel', NULL, NULL, NULL, '2021-01-06 21:30:55', NULL, 0, '2021-01-04 05:47:23', '2021-01-06 21:30:55'),
(17, 21, 1, 100.00, 'USD', 'manual', 20.00, 0.00, 80.00, 7330.00, 'INR', 'reason-1', '1234561.png', '1234562.png', 'ref', 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-05 03:52:06', '2021-02-12 08:18:50'),
(18, 21, 1, 100.00, 'USD', 'manual', 20.00, 0.00, 80.00, 7330.00, 'INR', 'reason-1', '1234561.png', '1234562.png', 'ref', 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-07 03:52:43', '2021-01-07 03:52:43'),
(19, 13, 12, 100.00, 'AUD', 'manual', 20.00, 0.00, 80.00, 4560.00, 'INR', 'Reason-5', '153540.png', '153542.png', 'raju', 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-07 04:16:14', '2021-01-07 04:16:14'),
(20, 13, 13, 100.00, 'AUD', 'manual', 20.00, 0.00, 80.00, 4560.00, 'INR', 'Reason-5', '153540.png', '153542.png', 'raju', 'complete', '2021-02-09 05:08:42', '2021-02-09 05:08:48', '2021-02-09 05:08:55', NULL, NULL, 0, '2021-01-07 04:17:23', '2021-02-09 05:08:55'),
(21, 13, 14, 100.00, 'AUD', 'credit', 30.00, 0.00, 70.00, 3990.00, 'INR', 'Reason-4', '153546.png', '153544.png', 'johan', 'later', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-07 04:34:44', '2021-01-07 04:34:44'),
(22, 13, 15, 100.00, 'AUD', 'credit', 30.00, 0.00, 70.00, 15830.50, 'HUF', 'Reason-2', '153548.png', '153549.png', NULL, 'cancel', NULL, NULL, NULL, '2021-01-07 05:20:50', NULL, 0, '2021-01-07 04:45:08', '2021-01-07 05:20:50'),
(23, 3, 16, 12.00, 'AUD', 'manual', 2.40, 0.00, 9.60, 9.00, 'AUD', 'Reason-1', '16106963501.jpg', '16106963502.jpg', NULL, 'later', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-15 02:09:56', '2021-01-15 02:09:56'),
(24, 3, 3, 12.00, 'AUD', 'manual', 2.40, 0.00, 9.60, 9.00, 'AUD', 'Reason-1', '16106969431.jpg', '16106969432.jpg', NULL, 'cancel', NULL, NULL, NULL, '2021-01-15 02:19:19', NULL, 0, '2021-01-15 02:19:15', '2021-01-15 02:19:19'),
(25, 3, 17, 12.00, 'AUD', 'manual', 2.40, 0.00, 9.60, 9.00, 'AUD', 'Reason-1', '16107026491.jpg', '16107026492.jpg', NULL, 'complete', '2021-01-18 00:40:19', '2021-01-18 00:40:48', '2021-01-18 00:42:40', NULL, NULL, 0, '2021-01-15 03:54:12', '2021-01-18 00:42:40'),
(26, 3, 17, 12.00, 'AUD', 'manual', 2.40, 12.50, 9.60, 9.00, 'AUD', 'Reason-1', '16107027571.jpg', '16107027572.jpg', NULL, 'cancel', NULL, NULL, NULL, '2021-01-15 03:56:28', NULL, 0, '2021-01-15 03:56:00', '2021-01-15 03:56:28'),
(27, 3, 1, 12.00, 'AUD', 'manual', 2.40, 0.00, 9.60, 9.00, 'AUD', 'Reason-1', '16107027741.jpg', '16107027742.jpg', NULL, 'cancel', NULL, NULL, NULL, '2021-01-15 03:56:25', NULL, 0, '2021-01-15 03:56:22', '2021-01-15 03:56:25'),
(28, 3, 1, 12.00, 'AUD', 'manual', 2.40, 0.00, 9.60, 9.00, 'AUD', 'Reason-1', NULL, NULL, NULL, 'cancel', NULL, NULL, NULL, '2021-01-15 06:24:44', NULL, 0, '2021-01-15 03:56:46', '2021-01-15 06:24:44'),
(29, 3, 1, 12.00, 'AUD', 'manual', 2.40, 0.00, 9.60, 9.00, 'AUD', 'Reason-1', NULL, NULL, NULL, 'cancel', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-15 04:02:00', '2021-02-09 05:08:23'),
(30, 3, 16, 12.00, 'AUD', 'manual', 2.40, 0.00, 9.60, 9.00, 'AUD', 'Reason-1', NULL, NULL, NULL, 'refund', NULL, NULL, NULL, '2021-01-15 06:24:57', '2021-02-09 05:08:28', 0, '2021-01-15 04:02:51', '2021-02-09 05:08:28'),
(31, 27, 24, 150.00, 'AUD', 'manual', 30.00, 0.00, 120.00, 120.00, 'AUD', 'Reason-2', NULL, NULL, NULL, 'later', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-20 03:54:58', '2021-01-20 03:54:58'),
(32, 27, 1, 100.00, 'USD', 'manual', 20.00, 0.00, 80.00, 7330.00, 'INR', 'reason-1', '1234561.png', '1234562.png', 'ref', 'complete', '2021-02-09 05:06:19', '2021-02-09 05:06:34', '2021-02-09 05:06:42', NULL, NULL, 0, '2021-01-20 03:57:44', '2021-02-09 05:06:42'),
(33, 28, 25, 120.00, 'CAD', 'manual', 24.00, 0.00, 96.00, 97.77, 'AUD', 'Reason-2', NULL, NULL, NULL, 'later', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-20 04:07:08', '2021-01-20 04:07:08'),
(35, 3, 3, 100.00, 'AUD', 'manual', 20.00, 0.00, 80.00, 80.00, 'AUD', 'Reason-3', NULL, NULL, NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-01-22 06:18:24', '2021-02-10 08:42:06'),
(36, 3, 1, 10.00, 'AUD', 'manual', 2.00, 0.00, 8.00, 8.00, 'AUD', 'Reason-1', '16131336731.png', '16131336732.png', NULL, 'later', NULL, NULL, NULL, NULL, NULL, 0, '2021-02-12 07:26:11', '2021-02-12 07:26:11'),
(37, 3, 27, 12.00, 'AUD', 'zelle', 1.20, 0.00, 10.80, 10.00, 'AUD', 'Reason-1', '16138319451.jpeg', '16138319462.jpeg', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-02-20 09:09:20', '2021-02-20 09:09:20'),
(38, 3, 27, 12.00, 'AUD', 'zelle', 1.20, 0.00, 10.80, 10.00, 'AUD', 'Reason-1', '16138322001.jpeg', '16138322002.jpeg', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-02-22 09:13:29', '2021-02-22 09:13:29'),
(39, 3, 1, 12.00, 'AUD', 'manual', 2.40, 1.00, 9.60, 9.00, 'AUD', 'Reason-1', '16140011351.jpeg', '16140011352.jpeg', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-02-22 08:09:55', '2021-02-22 08:09:55'),
(40, 3, 1, 12.00, 'AUD', 'manual', 2.40, 1.26, 9.60, 9.00, 'AUD', 'Reason-1', '16140013711.jpeg', '16140013712.jpeg', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-02-22 08:12:56', '2021-02-22 08:12:56'),
(41, 3, 27, 123.00, 'AUD', 'zelle', 12.30, 9.46, 110.70, 110.00, 'AUD', 'Reason-1', '16140862181.jpeg', '16140862182.jpg', 'refer', 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-02-23 05:23:05', '2021-02-23 08:03:24'),
(42, 3, 2, 12.00, 'AUD', 'manual', 2.40, 1.58, 9.60, 9.00, 'AUD', 'Reason-1', NULL, NULL, NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-02-23 08:07:00', '2021-02-23 08:07:00'),
(43, 3, 3, 23.00, 'AUD', 'manual', 4.60, 3.15, 18.40, 18.00, 'AUD', 'Reason-1', '16140862181.jpeg', '16140862182.jpg', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '2021-02-23 08:13:38', '2021-02-23 08:13:38');

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
(1, 1, 'AccountNumber', '123456789', '2020-12-21 01:43:25', '2020-12-21 01:43:25'),
(2, 1, 'IfscCode', '132456', '2020-12-21 01:43:25', '2020-12-21 01:43:25'),
(3, 1, 'AccountNumber', '21313', '2020-12-21 07:06:34', '2020-12-21 07:06:34'),
(4, 1, 'IfscCode', '213213', '2020-12-21 07:06:34', '2020-12-21 07:06:34'),
(5, 2, 'AccountNumber', '123435675', '2020-12-21 07:08:30', '2020-12-21 07:08:30'),
(6, 2, 'IfscCode', '345dfs', '2020-12-21 07:08:30', '2020-12-21 07:08:30'),
(7, 3, 'AccountNumber', '1234567890', '2020-12-22 05:30:10', '2020-12-22 05:30:10'),
(8, 3, 'IfscCode', '1253456', '2020-12-22 05:30:10', '2020-12-22 05:30:10'),
(9, 5, 'IbnNo', 'jnk', '2020-12-31 05:57:24', '2020-12-31 05:57:24'),
(10, 11, 'IbnNo', '11239495', '2021-01-07 04:03:40', '2021-01-07 04:03:40'),
(11, 15, 'AccountNumber', '123465879', '2021-01-07 04:45:08', '2021-01-07 04:45:08'),
(12, 15, 'IfscCode', '123465879', '2021-01-07 04:45:08', '2021-01-07 04:45:08'),
(13, 16, 'AccountNumber', '123456', '2021-01-15 02:09:55', '2021-01-15 02:09:55'),
(14, 16, 'IfscCode', '123456', '2021-01-15 02:09:56', '2021-01-15 02:09:56'),
(15, 17, 'AccountNumber', '1234567980', '2021-01-15 03:54:12', '2021-01-15 03:54:12'),
(16, 17, 'IfscCode', '123456', '2021-01-15 03:54:12', '2021-01-15 03:54:12'),
(17, 19, 'AccountNumber', '123123123123', '2021-01-15 08:20:17', '2021-01-15 08:20:17'),
(18, 19, 'IfscCode', '123123', '2021-01-15 08:20:17', '2021-01-15 08:20:17'),
(19, 21, 'testfldname', 'testfldval', '2021-01-18 06:30:57', '2021-01-18 06:30:57'),
(20, 21, 'testfldname2', 'testfldval2', '2021-01-18 06:30:57', '2021-01-18 06:30:57'),
(21, 22, 'testfldname', 'testfldval', '2021-01-18 06:31:38', '2021-01-18 06:31:38'),
(22, 22, 'testfldname2', 'testfldval2', '2021-01-18 06:31:38', '2021-01-18 06:31:38'),
(23, 23, 'AccountNumber', 'testfldval191', '2021-01-19 03:32:04', '2021-01-19 03:32:04'),
(24, 23, 'IfscCode', 'testfldval192', '2021-01-19 03:32:04', '2021-01-19 03:32:04'),
(25, 24, 'AccountNumber', '456456456', '2021-01-20 03:54:58', '2021-01-20 03:54:58'),
(26, 24, 'IfscCode', 'ICICI000', '2021-01-20 03:54:58', '2021-01-20 03:54:58'),
(27, 25, 'AccountNumber', '456789156', '2021-01-20 04:07:08', '2021-01-20 04:07:08'),
(28, 25, 'IfscCode', 'ICICI123', '2021-01-20 04:07:08', '2021-01-20 04:07:08'),
(29, 26, 'AccountNumber', 'wrghr', '2021-01-20 04:37:01', '2021-01-20 04:37:01'),
(30, 26, 'IfscCode', 'wrthwrth', '2021-01-20 04:37:01', '2021-01-20 04:37:01'),
(31, 27, 'IbnNo', '123321', '2021-02-20 07:42:47', '2021-02-20 07:42:47');

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
  `device_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: Android, 2: iOS',
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
(1, 0, NULL, 'admin', 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$nmH/zGQ6WOrRioQSLMVb3OtBmEXl5KFULfUWJT07e775PcYm2BEUO', NULL, 'admin', NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, '6KoVbJUZgosR4Nll5YwzkOIWL7Z0AWjfSiYklKS7P6lCP57giSNiIcZTQ5KT', 'TEST123', 1, NULL, 1, NULL, NULL, NULL),
(2, 0, NULL, 'Alex', '', 'Parker', 'alexparker@gmail.com', NULL, '$2y$10$46qvNTTafGYaDugS.un3XO8fnIwQ6PksjwvU3ywxxl/kZZktT02.q', NULL, 'user', NULL, 'male', '1234567890', NULL, NULL, NULL, NULL, '98', NULL, NULL, NULL, 111111, '2020-11-19 05:11:00', 'profile.png', NULL, NULL, 0, 'XEC6KeeqcEMrw4AlyTPZ17BaOrk223GDFYlQkQaoX2ZOqCLlVVPYidVj328X', 'TEST123', 1, NULL, 1, NULL, NULL, '2020-11-18 23:41:18'),
(3, 0, NULL, 'fname', NULL, 'lname', 'user1@yopmail.com', '2021-02-23 05:21:21', '$2y$10$42NwQkDT4DLfDFIH1hizzun4FVktrErS.6OahIuRkVzsn3g4a6lny', NULL, 'user', '2020-12-02', 'female', '1234567890', 'addr', NULL, NULL, 'Gujarat', '230', '123456', NULL, NULL, NULL, NULL, '1610967468.jpeg', '16140862181.jpeg', '16140862182.jpg', 1, 'qdKKJrRyqYikSdhX7EW5SNfgS1yFJvD5pdVN37MR8eYq3VgM9TU1DrrYBemP', 'TEST123', 2, 'abcd1', 1, NULL, '2020-11-19 00:00:10', '2021-02-23 08:03:24'),
(4, 0, NULL, NULL, NULL, NULL, 'user2@yopmail.com', '2020-12-24 04:58:20', '$2y$10$A4FySkpQfDX17//wepoCIu.axErjGFxWlGtMosPcT4Kwp8jXc0vFK', NULL, 'user', NULL, 'male', '1234567890', NULL, NULL, NULL, NULL, '98', NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, 'UF4i7RH5X55NNxycUYhhAL1HyJ9CKvOBAqF19ieroioeVwNSwARW5zQeLhrP', 'TEST123', 1, NULL, 1, NULL, '2020-11-20 05:13:17', '2020-12-24 04:58:20'),
(5, 0, NULL, NULL, NULL, NULL, 'hardik.technomads@gmail.com', '2020-12-31 04:24:03', '$2y$10$KgHUGdjXQK9Uc7L3maP/Su8BJnntVR3nUhHGm6Ko2oaM7oi4XvcZq', '107793242102253011526', 'user', NULL, 'male', '1234567890', NULL, NULL, NULL, NULL, '230', NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, '0dZoANPs1BUreVC0ntwABOLSjAql1eamfjaofIER2oJaFfGDzqp9KKj72bXr', 'TEST123', 1, NULL, 1, NULL, '2020-11-20 05:30:55', '2020-12-31 04:24:03'),
(6, 0, NULL, NULL, NULL, NULL, 'technomadss@gmail.com', '2020-12-15 06:57:49', '$2y$10$7zPQdCVMm564f9ZUGK7e3enRemgFOMPtIJvFJmQ0j0GCvJn0v0E/u', '101302592485616038867', 'user', NULL, 'male', '9725789197', NULL, NULL, NULL, NULL, '98', NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, 'G4oOLE7x3rNquvU0n5ees6M6r6GiAycoVw6PtkUSIm36wVr0rdqnC3EsLZnc', 'TEST123', 1, NULL, 1, NULL, '2020-12-14 08:53:32', '2020-12-15 06:57:49'),
(7, 0, NULL, NULL, NULL, NULL, 'test.user25112020@gmail.com', '2020-12-16 01:15:29', '$2y$10$eOTKTzacXuetDvDrl11kYOMOuy5ZJqJDcVms.Jn9nZtghDAlPDZO2', '106830784080666675387', 'user', NULL, 'male', '6354953278', NULL, NULL, NULL, NULL, '98', NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, 'F2ghr4ub5ZkI3yCm2XVIGYoGUEDZZegJMK2N4IvCXwQQxCERA0atKsiiFEg5', 'TEST123', 1, NULL, 1, NULL, '2020-12-14 09:55:08', '2020-12-16 01:15:29'),
(8, 0, NULL, NULL, NULL, NULL, 'bhaveshambaliya05@gmail.com', '2020-12-17 22:54:25', '$2y$10$bL8E13k/QdkUbCE4H5fAAOXHrCqmMVhXE0sHDApRS8/g/Y5y8sFRK', '114097938197460248703', 'user', NULL, 'male', '9601688783', NULL, NULL, NULL, NULL, '98', NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, 'pGgcFe2fG9BTcmzXmzFaWCYs0w0UCq5LoPHxN3aGk5zUpeFKBlzUmUSUfGIl', 'TEST123', 1, NULL, 1, NULL, '2020-12-15 00:21:11', '2020-12-17 22:54:25'),
(9, 0, NULL, NULL, NULL, NULL, 'ambaliyabhaliya@gmail.com', '2020-12-15 02:24:36', '$2y$10$4JAPWxKHTj6/Q5LMr0R1vOo10hCEDCUVAcwZvbvFslRhR7NIIMpMO', '117624419178474802237', 'user', NULL, 'male', '1235456688', NULL, NULL, NULL, NULL, '98', NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, NULL, 'TEST123', 1, NULL, 1, NULL, '2020-12-15 02:23:00', '2020-12-15 02:24:36'),
(10, 0, NULL, NULL, NULL, NULL, 'aalphaenq@gmail.com', '2020-12-15 02:42:53', '$2y$10$MclIU/RijE7cWvYJaFhwROIQ1YQx.kA2mNpSxWJD6omgOWdoRwaca', '117572688042351826438', 'user', NULL, 'male', '9845619104', NULL, NULL, NULL, NULL, '98', NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, NULL, 'TEST123', 1, NULL, 1, NULL, '2020-12-15 02:42:32', '2020-12-15 02:42:53'),
(11, 0, NULL, NULL, NULL, NULL, 'usercheck@yopmail.com', '2020-12-24 05:14:33', '$2y$10$Bn74kNRMfobt2Zxs9StAuOSiMdPnf.QyUXd2kj9mXpxC0TdGy6kou', NULL, 'user', NULL, 'male', '1234567890', NULL, NULL, NULL, NULL, '98', NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, 'vuQMLDem7BVQ2hJ72MWTq0WOX38a6HyWhSOnai9pZ1rRHXISFI2RHOYtV7ci', '5FE471052FF04', 1, NULL, 1, NULL, '2020-12-24 05:14:21', '2020-12-24 05:14:33'),
(12, 0, NULL, NULL, NULL, NULL, 'userhv@yopmail.com', '2021-01-07 03:54:40', '$2y$10$2VPnPgC9C./YILOEhw0Lq.SE7jcZLWiYCK3a244ebml.8yJvzH64S', NULL, 'user', NULL, 'male', '1234567890', NULL, NULL, NULL, NULL, '98', NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, '9qYHPFpeuKQCvSvuwHixIA3VWLVg1zwHAoe6PAQJ50BvnQ16fg6D3QIPpY4F', '5FE47BC59EE16', 1, NULL, 1, NULL, '2020-12-24 06:00:13', '2021-01-07 03:54:40'),
(13, 0, NULL, 'ghvcf', NULL, 'fgyf', 'testapi1@yopmail.com', '2020-12-31 05:41:57', '$2y$10$/7k4bpqw0Xu0etKn74af6OqUV2XEMrXjo2UFSID2PUKxcewPPKm.C', NULL, 'user', '2020-01-01', 'male', '4565', 'fghyfg', NULL, NULL, 'hfgf', '8', '5465', NULL, NULL, 111111, '2021-01-07 11:28:00', 'profile.png', NULL, NULL, 0, 'YoRi34Xvok97MnaaHGwe4nHeRlfoDL1cLAWeN059ib6pKXI5mrOll4serK4I', NULL, 1, NULL, 1, NULL, '2020-12-29 02:09:55', '2021-01-07 05:58:56'),
(14, 0, NULL, NULL, NULL, NULL, 'testapi2@yopmail.com', NULL, '$2y$10$BcBBHyjfEQ2wG7iOysMAbOrjZU3TM8jDwgwSaCcn9DwuBn9r5AXnG', NULL, 'user', NULL, 'male', '1234567890', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, NULL, NULL, 1, NULL, 1, NULL, '2020-12-29 02:13:00', '2020-12-29 02:13:00'),
(15, 0, NULL, NULL, NULL, NULL, 'testapi3@yopmail.com', NULL, '$2y$10$rwbNwHMfB0kVtGWa/BMB2erHuqq602mxZLVznI5pIESQb4efl.oAq', NULL, 'user', NULL, 'male', '1234567890', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, NULL, NULL, 1, NULL, 1, NULL, '2020-12-29 02:13:21', '2020-12-29 02:13:21'),
(16, 0, NULL, NULL, NULL, NULL, 'testapi4@yopmail.com', NULL, '$2y$10$f4d5G3p1nuc6TuzzmSp1vuIbvrbcIitusfr81I9uqegpVmQ/1s1i6', 'gid', 'user', NULL, 'male', '1234567890', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, 111111, '2020-12-29 10:25:00', 'profile.png', NULL, NULL, 0, NULL, '5FEADF34DE9AD', 2, 'abcd1', 1, NULL, '2020-12-29 02:18:04', '2020-12-29 04:55:07'),
(17, 0, NULL, NULL, NULL, NULL, 'testapi5@yopmail.com', NULL, '$2y$10$lw2bxQiBEt6g.E9euSgTW.q.J.8lWkgdARROWo2JEGrOdhPGUtgZ6', 'gid2', 'user', NULL, 'male', '1234567890', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, 111111, '2020-12-29 10:33:00', 'profile.png', NULL, NULL, 0, NULL, '5FEB048DC015C', 2, 'abcd1', 1, NULL, '2020-12-29 04:57:25', '2020-12-29 05:03:03'),
(18, 0, NULL, NULL, NULL, NULL, 'testapi6@yopmail.com', NULL, '$2y$10$Uipq/.65ySNfQcaHykcSBeaulvJGYkpX9pO3/QNacxp6UgoVm08zO', 'gid3', 'user', NULL, 'male', '1234567890', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, 111111, '2020-12-29 10:35:00', 'profile.png', NULL, NULL, 0, NULL, '5FEB05ED82787', 2, 'abcd1', 1, NULL, '2020-12-29 05:03:17', '2020-12-29 05:05:07'),
(19, 0, NULL, NULL, NULL, NULL, 'testapi7@yopmail.com', NULL, '$2y$10$DhgDKArdwoWEZCqAVJIzqurnul0dXlYSNlNfawGObNybeGquAI.Wy', 'gid4', 'user', NULL, 'male', '1234567890', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL, NULL, 0, NULL, '5FEB0669CBCEE', 1, NULL, 1, NULL, '2020-12-29 05:05:21', '2020-12-29 05:05:21'),
(20, 0, NULL, NULL, NULL, NULL, 'testapi8@yopmail.com', NULL, '$2y$10$fk/IpihT32fpsDSfCtY4n.BB0UBDSN9jMHvn3ucIuZp5vrebRpLHC', 'gid5', 'user', NULL, 'male', '1234567890', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, 111111, NULL, 'profile.png', NULL, NULL, 0, NULL, '5FEB06CE43423', 1, NULL, 1, NULL, '2020-12-29 05:07:02', '2020-12-29 05:07:02'),
(21, 0, NULL, 'fname', NULL, 'lname', 'testapi9@yopmail.com', NULL, '$2y$10$.6O7FLt5.loXbdsVg8NgF.sO6pTigXpCdBP5Ra2IkM5rnlwd/iNgG', 'gid6', 'user', '2020-12-01', 'male', '1234567890', 'addr', NULL, NULL, 'Gujarat', '98', '123456', NULL, NULL, 111111, '2021-01-04 09:07:00', 'profile.png', '1234561.png', '1234562.png', 1, NULL, '5FEB073CF302F', 2, '', 1, NULL, '2020-12-29 05:08:52', '2021-02-12 08:18:50'),
(22, 0, NULL, NULL, NULL, NULL, 'test1@gmail.com', NULL, '$2y$10$d/P725rwazAivvciw15Wmetq6y7Y8LtwnTlZDIYmlPfPb1C7Q2ioK', NULL, 'user', NULL, 'male', '1234567890', NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, 111111, '2021-01-02 04:18:00', 'profile.png', NULL, NULL, 0, NULL, '5FEEA5EB655ED', 2, 'abcd1', 1, NULL, '2020-12-31 23:02:43', '2021-01-01 22:48:31'),
(23, 0, NULL, NULL, NULL, NULL, 'hardik@gmail.com', NULL, '$2y$10$NF.qSQJU/6pTmxBuYmbuJ.kBrnAxIEEvbz6D6R9JNI3Q94nSCHN6i', NULL, 'user', NULL, 'male', NULL, NULL, NULL, NULL, NULL, '30', NULL, NULL, NULL, 111111, '2021-01-01 08:31:00', 'profile.png', NULL, NULL, 0, NULL, '5FEEDDF41E713', 1, NULL, 1, NULL, '2021-01-01 03:01:48', '2021-01-01 03:01:48'),
(24, 0, NULL, NULL, NULL, NULL, 'hardik88@gmail.com', NULL, '$2y$10$vWWDJisGiv.SVw6iyrIzBOgyrPRxnNQcfPSWyv79iptD47NEUzXg6', NULL, 'user', NULL, 'male', '764664', NULL, NULL, NULL, NULL, '7', NULL, NULL, NULL, 111111, '2021-01-01 14:35:00', 'profile.png', NULL, NULL, 0, NULL, '5FEF333A9AB0F', 1, NULL, 1, NULL, '2021-01-01 09:05:38', '2021-01-01 09:05:38'),
(25, 0, NULL, NULL, NULL, NULL, 'dem@gmail.com', NULL, '$2y$10$MpNExKYdYfJKBWS.uOl96O/TI5dyAgVc.i1gpcUlA2T1LTYGST7u2', NULL, 'user', NULL, 'male', '886666', NULL, NULL, NULL, NULL, '7', NULL, NULL, NULL, 111111, '2021-01-04 06:58:00', 'profile.png', NULL, NULL, 0, NULL, '5FF2BC83766B0', 1, NULL, 1, NULL, '2021-01-04 01:28:11', '2021-01-04 01:28:11'),
(26, 0, NULL, 'fn', NULL, 'ln', 'em', NULL, '$2y$10$6ss8dQObL28IPsRNUjwkTupQTvX7DaILwe79zhaSGFBQWOmn0HTz.', NULL, 'user', '2021-01-01', 'female', '1234567890', 'addddrrsrsss', NULL, NULL, 'gj', '98', '1234560', NULL, NULL, 111111, '2021-01-04 10:09:00', '1611057524.png', NULL, NULL, 0, NULL, '5FF2C5CD3A812', 1, NULL, 1, NULL, '2021-01-04 02:07:49', '2021-01-19 06:28:44'),
(27, 0, NULL, 'fname', NULL, 'lname', 'user2@gmail.com', NULL, '$2y$10$BOwFYjN1fsuz3a5FNWZDqOuodLNk4JLMe4a.CiybJPtM07gr2F9p2', NULL, 'user', '2020-12-01', 'male', '1234567890', 'addr', NULL, NULL, 'Gujarat', '98', '123456', NULL, NULL, 111111, '2021-01-20 09:18:00', 'profile.png', '1234561.png', '1234562.png', 1, NULL, '6007F563E2BA5', 1, NULL, 0, NULL, '2021-01-20 03:48:27', '2021-02-10 05:56:09'),
(28, 0, NULL, 'gf', NULL, 'Ritter', 'user3@gmail.com', NULL, '$2y$10$wALZDUr6BfcykxyboZjVIOtYD5GLL6HdwVMqEzJH8hvfIQko3xDAy', NULL, 'user', '2000-03-01', 'male', '9876543210', 'rty', NULL, NULL, 'Gujarat', '98', '98', NULL, NULL, 111111, '2021-01-22 05:08:00', 'profile.png', NULL, NULL, 0, NULL, '6007F8F7CD7A1', 2, 'abcd1', 0, NULL, '2021-01-20 04:03:43', '2021-01-21 23:38:49'),
(29, 0, NULL, NULL, NULL, NULL, 'abcd@gmail.com', NULL, '$2y$10$nCh..bUt9B1ea6k497LwcubCfR7AV8mfdgmtJnUm6UzRwscJr0SEO', NULL, 'user', '2021-01-01', 'female', '123456789', NULL, NULL, NULL, NULL, '155', NULL, NULL, NULL, 111111, '2021-01-20 14:24:00', '1611152660.jpeg', NULL, NULL, 0, NULL, '600834BB95ADC', 2, 'abcd1', 0, NULL, '2021-01-20 08:18:43', '2021-01-20 08:54:42');

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
(1, 27, 'AccountNumber', '1223456', '2021-01-20 03:57:44', '2021-01-20 03:57:44'),
(2, 27, 'IfscCode', 'IFSCCode', '2021-01-20 03:57:44', '2021-01-20 03:57:44'),
(3, 28, 'AccountNumber', '112233445566778899', '2021-01-20 04:07:08', '2021-01-20 04:32:05'),
(4, 28, 'IfscCode', 'BOB123456', '2021-01-20 04:07:08', '2021-01-20 04:32:05');

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
(1, 'zelle@egogram.com', '2021-02-15 11:39:37', '2021-02-15 08:27:56', NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_fields`
--
ALTER TABLE `bank_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bank_field_options`
--
ALTER TABLE `bank_field_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payment_options`
--
ALTER TABLE `payment_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recipients`
--
ALTER TABLE `recipients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `transaction_fields`
--
ALTER TABLE `transaction_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_bank_details`
--
ALTER TABLE `user_bank_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zelles`
--
ALTER TABLE `zelles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
