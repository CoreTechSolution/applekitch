-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2018 at 09:19 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `applekitch`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE `attachment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `root_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attachment`
--

INSERT INTO `attachment` (`id`, `name`, `file_path`, `root_path`) VALUES
(1, 'cool-background1.png', 'http://localhost/applekitch/files/cool-background1.png', '/home1/cgsthemes/public_html/applekitch/files/'),
(2, 'unnamed.jpg', 'http://localhost/applekitch/files/unnamed.jpg', '/home1/cgsthemes/public_html/applekitch/files/'),
(3, 'pizza-2802332_1920.jpg', 'http://localhost/applekitch/files/pizza-2802332_1920.jpg', '/home1/cgsthemes/public_html/applekitch/files/'),
(4, 'chess-2730034_1920.jpg', 'http://localhost/applekitch/files/chess-2730034_1920.jpg', '/home1/cgsthemes/public_html/applekitch/files/'),
(5, 'unnamed1.jpg', 'http://localhost/applekitch/files/unnamed1.jpg', '/home1/cgsthemes/public_html/applekitch/files/'),
(6, 'unnamed2.jpg', 'http://localhost/applekitch/files/unnamed2.jpg', '/home1/cgsthemes/public_html/applekitch/files/'),
(7, 'unnamed3.jpg', 'http://localhost/applekitch/files/unnamed3.jpg', '/home1/cgsthemes/public_html/applekitch/files/'),
(8, '1920x850.png', 'http://localhost/applekitch/files/1920x850.png', '/files/'),
(9, '1920x8501.png', 'http://localhost/applekitch/files/1920x8501.png', '/home1/cgsthemes/public_html/applekitch/files/'),
(10, '1920x8502.png', 'http://localhost/applekitch/files/1920x8502.png', '/home1/cgsthemes/public_html/applekitch/files/'),
(11, '1920x8503.png', 'http://localhost/applekitch/files/1920x8503.png', '/home1/cgsthemes/public_html/applekitch/files/'),
(12, 'author.jpg', 'http://localhost/applekitch/files/author.jpg', '/home1/cgsthemes/public_html/applekitch/files/'),
(13, '1920x85021.png', 'http://localhost/applekitch/files/1920x85021.png', '/home1/cgsthemes/public_html/applekitch/files/');

-- --------------------------------------------------------

--
-- Table structure for table `award_templates`
--

CREATE TABLE `award_templates` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `details` text,
  `status` enum('active','deactive') NOT NULL DEFAULT 'active',
  `create_dt` datetime NOT NULL,
  `modify_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `subject` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `parent`, `grade`, `subject`, `country`) VALUES
(1, 'Test', 'test', 0, 5, 3, 105),
(4, 'Count to 3', 'count-to-3', 0, NULL, NULL, NULL),
(5, 'Count to 3', 'count-to-3-2', NULL, NULL, NULL, NULL),
(6, 'Identify Animals', 'identify-animals', NULL, NULL, NULL, NULL),
(7, 'Multiple Choose', 'multiple-choose', NULL, NULL, NULL, NULL),
(8, 'Only Clickable Text', '', NULL, NULL, NULL, NULL),
(9, 'Textbox', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `status` enum('active','deactive') NOT NULL DEFAULT 'active',
  `create_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `default_status` enum('true','false') NOT NULL DEFAULT 'false',
  `cer_bg_img` text,
  `cer_signature_img` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `name`, `description`, `subject_id`, `grade_id`, `category_id`, `topic_id`, `status`, `create_dt`, `default_status`, `cer_bg_img`, `cer_signature_img`) VALUES
(1, 'Certificate of excellance', 'for excellent performance on <B>15 reception maths skills</B>', 2, 6, 1, 1, 'active', '2018-08-24 09:57:00', 'true', 'http://localhost/applekitch/uploads/certificate-background1.jpg', 'http://localhost/applekitch/uploads/signature1.png'),
(2, 'certificate of excellance 2', 'for excellent performance on <B>15 reception maths skills</B>', 2, 5, 1, 17, 'active', '2018-08-24 10:04:24', 'false', 'http://localhost/applekitch/uploads/certificate-background2.jpg', 'http://localhost/applekitch/uploads/signature2.png');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iso_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `iso_code`) VALUES
(1, 'Andorra', 'AD'),
(2, 'United Arab Emirates', 'AE'),
(3, 'Afghanistan', 'AF'),
(4, 'Antigua and Barbuda', 'AG'),
(5, 'Anguilla', 'AI'),
(6, 'Albania', 'AL'),
(7, 'Armenia', 'AM'),
(8, 'Angola', 'AO'),
(9, 'Antarctica', 'AQ'),
(10, 'Argentina', 'AR'),
(11, 'American Samoa', 'AS'),
(12, 'Austria', 'AT'),
(13, 'Australia', 'AU'),
(14, 'Aruba', 'AW'),
(15, 'Åland', 'AX'),
(16, 'Azerbaijan', 'AZ'),
(17, 'Bosnia and Herzegovina', 'BA'),
(18, 'Barbados', 'BB'),
(19, 'Bangladesh', 'BD'),
(20, 'Belgium', 'BE'),
(21, 'Burkina Faso', 'BF'),
(22, 'Bulgaria', 'BG'),
(23, 'Bahrain', 'BH'),
(24, 'Burundi', 'BI'),
(25, 'Benin', 'BJ'),
(26, 'Saint Barthélemy', 'BL'),
(27, 'Bermuda', 'BM'),
(28, 'Brunei', 'BN'),
(29, 'Bolivia', 'BO'),
(30, 'Bonaire', 'BQ'),
(31, 'Brazil', 'BR'),
(32, 'Bahamas', 'BS'),
(33, 'Bhutan', 'BT'),
(34, 'Bouvet Island', 'BV'),
(35, 'Botswana', 'BW'),
(36, 'Belarus', 'BY'),
(37, 'Belize', 'BZ'),
(38, 'Canada', 'CA'),
(39, 'Cocos [Keeling] Islands', 'CC'),
(40, 'Democratic Republic of the Congo', 'CD'),
(41, 'Central African Republic', 'CF'),
(42, 'Republic of the Congo', 'CG'),
(43, 'Switzerland', 'CH'),
(44, 'Ivory Coast', 'CI'),
(45, 'Cook Islands', 'CK'),
(46, 'Chile', 'CL'),
(47, 'Cameroon', 'CM'),
(48, 'China', 'CN'),
(49, 'Colombia', 'CO'),
(50, 'Costa Rica', 'CR'),
(51, 'Cuba', 'CU'),
(52, 'Cape Verde', 'CV'),
(53, 'Curacao', 'CW'),
(54, 'Christmas Island', 'CX'),
(55, 'Cyprus', 'CY'),
(56, 'Czech Republic', 'CZ'),
(57, 'Germany', 'DE'),
(58, 'Djibouti', 'DJ'),
(59, 'Denmark', 'DK'),
(60, 'Dominica', 'DM'),
(61, 'Dominican Republic', 'DO'),
(62, 'Algeria', 'DZ'),
(63, 'Ecuador', 'EC'),
(64, 'Estonia', 'EE'),
(65, 'Egypt', 'EG'),
(66, 'Western Sahara', 'EH'),
(67, 'Eritrea', 'ER'),
(68, 'Spain', 'ES'),
(69, 'Ethiopia', 'ET'),
(70, 'Finland', 'FI'),
(71, 'Fiji', 'FJ'),
(72, 'Falkland Islands', 'FK'),
(73, 'Micronesia', 'FM'),
(74, 'Faroe Islands', 'FO'),
(75, 'France', 'FR'),
(76, 'Gabon', 'GA'),
(77, 'United Kingdom', 'GB'),
(78, 'Grenada', 'GD'),
(79, 'Georgia', 'GE'),
(80, 'French Guiana', 'GF'),
(81, 'Guernsey', 'GG'),
(82, 'Ghana', 'GH'),
(83, 'Gibraltar', 'GI'),
(84, 'Greenland', 'GL'),
(85, 'Gambia', 'GM'),
(86, 'Guinea', 'GN'),
(87, 'Guadeloupe', 'GP'),
(88, 'Equatorial Guinea', 'GQ'),
(89, 'Greece', 'GR'),
(90, 'South Georgia and the South Sandwich Islands', 'GS'),
(91, 'Guatemala', 'GT'),
(92, 'Guam', 'GU'),
(93, 'Guinea-Bissau', 'GW'),
(94, 'Guyana', 'GY'),
(95, 'Hong Kong', 'HK'),
(96, 'Heard Island and McDonald Islands', 'HM'),
(97, 'Honduras', 'HN'),
(98, 'Croatia', 'HR'),
(99, 'Haiti', 'HT'),
(100, 'Hungary', 'HU'),
(101, 'Indonesia', 'ID'),
(102, 'Ireland', 'IE'),
(103, 'Israel', 'IL'),
(104, 'Isle of Man', 'IM'),
(105, 'India', 'IN'),
(106, 'British Indian Ocean Territory', 'IO'),
(107, 'Iraq', 'IQ'),
(108, 'Iran', 'IR'),
(109, 'Iceland', 'IS'),
(110, 'Italy', 'IT'),
(111, 'Jersey', 'JE'),
(112, 'Jamaica', 'JM'),
(113, 'Jordan', 'JO'),
(114, 'Japan', 'JP'),
(115, 'Kenya', 'KE'),
(116, 'Kyrgyzstan', 'KG'),
(117, 'Cambodia', 'KH'),
(118, 'Kiribati', 'KI'),
(119, 'Comoros', 'KM'),
(120, 'Saint Kitts and Nevis', 'KN'),
(121, 'North Korea', 'KP'),
(122, 'South Korea', 'KR'),
(123, 'Kuwait', 'KW'),
(124, 'Cayman Islands', 'KY'),
(125, 'Kazakhstan', 'KZ'),
(126, 'Laos', 'LA'),
(127, 'Lebanon', 'LB'),
(128, 'Saint Lucia', 'LC'),
(129, 'Liechtenstein', 'LI'),
(130, 'Sri Lanka', 'LK'),
(131, 'Liberia', 'LR'),
(132, 'Lesotho', 'LS'),
(133, 'Lithuania', 'LT'),
(134, 'Luxembourg', 'LU'),
(135, 'Latvia', 'LV'),
(136, 'Libya', 'LY'),
(137, 'Morocco', 'MA'),
(138, 'Monaco', 'MC'),
(139, 'Moldova', 'MD'),
(140, 'Montenegro', 'ME'),
(141, 'Saint Martin', 'MF'),
(142, 'Madagascar', 'MG'),
(143, 'Marshall Islands', 'MH'),
(144, 'Macedonia', 'MK'),
(145, 'Mali', 'ML'),
(146, 'Myanmar [Burma]', 'MM'),
(147, 'Mongolia', 'MN'),
(148, 'Macao', 'MO'),
(149, 'Northern Mariana Islands', 'MP'),
(150, 'Martinique', 'MQ'),
(151, 'Mauritania', 'MR'),
(152, 'Montserrat', 'MS'),
(153, 'Malta', 'MT'),
(154, 'Mauritius', 'MU'),
(155, 'Maldives', 'MV'),
(156, 'Malawi', 'MW'),
(157, 'Mexico', 'MX'),
(158, 'Malaysia', 'MY'),
(159, 'Mozambique', 'MZ'),
(160, 'Namibia', 'NA'),
(161, 'New Caledonia', 'NC'),
(162, 'Niger', 'NE'),
(163, 'Norfolk Island', 'NF'),
(164, 'Nigeria', 'NG'),
(165, 'Nicaragua', 'NI'),
(166, 'Netherlands', 'NL'),
(167, 'Norway', 'NO'),
(168, 'Nepal', 'NP'),
(169, 'Nauru', 'NR'),
(170, 'Niue', 'NU'),
(171, 'New Zealand', 'NZ'),
(172, 'Oman', 'OM'),
(173, 'Panama', 'PA'),
(174, 'Peru', 'PE'),
(175, 'French Polynesia', 'PF'),
(176, 'Papua New Guinea', 'PG'),
(177, 'Philippines', 'PH'),
(178, 'Pakistan', 'PK'),
(179, 'Poland', 'PL'),
(180, 'Saint Pierre and Miquelon', 'PM'),
(181, 'Pitcairn Islands', 'PN'),
(182, 'Puerto Rico', 'PR'),
(183, 'Palestine', 'PS'),
(184, 'Portugal', 'PT'),
(185, 'Palau', 'PW'),
(186, 'Paraguay', 'PY'),
(187, 'Qatar', 'QA'),
(188, 'Réunion', 'RE'),
(189, 'Romania', 'RO'),
(190, 'Serbia', 'RS'),
(191, 'Russia', 'RU'),
(192, 'Rwanda', 'RW'),
(193, 'Saudi Arabia', 'SA'),
(194, 'Solomon Islands', 'SB'),
(195, 'Seychelles', 'SC'),
(196, 'Sudan', 'SD'),
(197, 'Sweden', 'SE'),
(198, 'Singapore', 'SG'),
(199, 'Saint Helena', 'SH'),
(200, 'Slovenia', 'SI'),
(201, 'Svalbard and Jan Mayen', 'SJ'),
(202, 'Slovakia', 'SK'),
(203, 'Sierra Leone', 'SL'),
(204, 'San Marino', 'SM'),
(205, 'Senegal', 'SN'),
(206, 'Somalia', 'SO'),
(207, 'Suriname', 'SR'),
(208, 'South Sudan', 'SS'),
(209, 'São Tomé and Príncipe', 'ST'),
(210, 'El Salvador', 'SV'),
(211, 'Sint Maarten', 'SX'),
(212, 'Syria', 'SY'),
(213, 'Swaziland', 'SZ'),
(214, 'Turks and Caicos Islands', 'TC'),
(215, 'Chad', 'TD'),
(216, 'French Southern Territories', 'TF'),
(217, 'Togo', 'TG'),
(218, 'Thailand', 'TH'),
(219, 'Tajikistan', 'TJ'),
(220, 'Tokelau', 'TK'),
(221, 'East Timor', 'TL'),
(222, 'Turkmenistan', 'TM'),
(223, 'Tunisia', 'TN'),
(224, 'Tonga', 'TO'),
(225, 'Turkey', 'TR'),
(226, 'Trinidad and Tobago', 'TT'),
(227, 'Tuvalu', 'TV'),
(228, 'Taiwan', 'TW'),
(229, 'Tanzania', 'TZ'),
(230, 'Ukraine', 'UA'),
(231, 'Uganda', 'UG'),
(232, 'U.S. Minor Outlying Islands', 'UM'),
(233, 'United States', 'US'),
(234, 'Uruguay', 'UY'),
(235, 'Uzbekistan', 'UZ'),
(236, 'Vatican City', 'VA'),
(237, 'Saint Vincent and the Grenadines', 'VC'),
(238, 'Venezuela', 'VE'),
(239, 'British Virgin Islands', 'VG'),
(240, 'U.S. Virgin Islands', 'VI'),
(241, 'Vietnam', 'VN'),
(242, 'Vanuatu', 'VU'),
(243, 'Wallis and Futuna', 'WF'),
(244, 'Samoa', 'WS'),
(245, 'Kosovo', 'XK'),
(246, 'Yemen', 'YE'),
(247, 'Mayotte', 'YT'),
(248, 'South Africa', 'ZA'),
(249, 'Zambia', 'ZM'),
(250, 'Zimbabwe', 'ZW');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `name`, `slug`, `img`) VALUES
(5, 'Year 1', 'year-1', 8),
(6, 'Reception', 'reception', 9),
(7, 'Year 2', 'year-2', 10),
(10, 'Year 3', 'year-3', 13);

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `yearly_price` int(255) NOT NULL,
  `monthly_price` int(255) NOT NULL,
  `limitq` int(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `name`, `yearly_price`, `monthly_price`, `limitq`) VALUES
(2, 'Free Membership', 0, 0, 0),
(1, 'Premium Membership', 100, 10, 0),
(3, 'User without signup', 0, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `question_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` text COLLATE utf8_unicode_ci NOT NULL,
  `country_id` text COLLATE utf8_unicode_ci NOT NULL,
  `grade_id` text COLLATE utf8_unicode_ci NOT NULL,
  `subject_id` text COLLATE utf8_unicode_ci NOT NULL,
  `q_score` int(11) NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `topic_id` text COLLATE utf8_unicode_ci,
  `form_data` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question_name`, `question_desc`, `category_id`, `country_id`, `grade_id`, `subject_id`, `q_score`, `status`, `topic_id`, `form_data`) VALUES
(1, 'What is the color of image?', '', '1', '1', '6', '2', 10, '', '1', 'a:4:{s:8:\"question\";s:27:\"What is the color of image?\";s:15:\"question_option\";s:1:\"1\";s:11:\"ans_textbox\";s:4:\"Grey\";s:3:\"img\";s:54:\"http://localhost/applekitch/uploads/images/author3.jpg\";}'),
(2, 'What is the color of the T-shirt?', '', '1', '1', '6', '2', 10, '', '1', 'a:4:{s:8:\"question\";s:33:\"What is the color of the T-shirt?\";s:15:\"question_option\";s:1:\"1\";s:11:\"ans_textbox\";s:5:\"Green\";s:3:\"img\";s:58:\"http://localhost/applekitch/uploads/images/418D1CdYxHL.jpg\";}'),
(3, 'What is the color of the T-shirt?', '', '1', '1', '6', '2', 10, '', '1', 'a:4:{s:8:\"question\";s:33:\"What is the color of the T-shirt?\";s:15:\"question_option\";s:1:\"1\";s:11:\"ans_textbox\";s:5:\"Green\";s:3:\"img\";s:59:\"http://localhost/applekitch/uploads/images/418D1CdYxHL1.jpg\";}'),
(4, 'What is the color of shirt? ', '', '1', '2', '6', '2', 10, '', '1', 'a:4:{s:8:\"question\";s:28:\"What is the color of shirt? \";s:15:\"question_option\";s:1:\"1\";s:11:\"ans_textbox\";s:5:\"Green\";s:3:\"img\";s:59:\"http://localhost/applekitch/uploads/images/418D1CdYxHL2.jpg\";}'),
(5, 'What is the color of the bird?', '', '1', '1', '6', '2', 10, '', '1', 'a:4:{s:8:\"question\";s:30:\"What is the color of the bird?\";s:15:\"question_option\";s:1:\"1\";s:11:\"ans_textbox\";s:5:\"Green\";s:3:\"img\";s:82:\"http://localhost/applekitch/uploads/images/227_ext_007_akialoa_ellisiana_m-0_0.jpg\";}'),
(7, 'Is the man holding a pen?', '', '7', '77', '5', '2', 10, '', '5', 'a:4:{s:8:\"question\";s:25:\"Is the man holding a pen?\";s:15:\"question_option\";s:1:\"1\";s:11:\"ans_textbox\";s:2:\"no\";s:3:\"img\";s:56:\"http://localhost/applekitch/uploads/images/463874293.jpg\";}'),
(8, 'identify the animal in the picture.', '', '7', '105', '6', '2', 10, '', '6', 'a:4:{s:8:\"question\";s:35:\"identify the animal in the picture.\";s:15:\"question_option\";s:1:\"1\";s:11:\"ans_textbox\";s:6:\"Rabbit\";s:3:\"img\";s:64:\"http://localhost/applekitch/uploads/images/517299098-612x612.jpg\";}'),
(17, 'What is the capital of US?', '', '7', '1', '6', '2', 10, '', '7', 'a:4:{s:8:\"question\";s:26:\"What is the capital of US?\";s:15:\"question_option\";s:1:\"9\";s:8:\"option_1\";a:4:{i:0;s:8:\"New York\";i:1;s:6:\"Canada\";i:2;s:13:\"Washington DC\";i:3;s:13:\"New Hampshire\";}s:11:\"ans_textbox\";s:13:\"Washington DC\";}'),
(18, 'What is the color of Sky', '', '7', '1', '6', '2', 10, '', '9', 'a:3:{s:8:\"question\";s:24:\"What is the color of Sky\";s:15:\"question_option\";s:2:\"11\";s:11:\"ans_textbox\";s:4:\"Blue\";}'),
(14, 'What is the capital of India?', '', '7', '1', '6', '2', 10, '', '7', 'a:6:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:29:\"What is the capital of India?\";s:15:\"question_option\";s:1:\"9\";s:8:\"option_1\";a:4:{i:0;s:9:\"Karnataka\";i:1;s:5:\"Bihar\";i:2;s:5:\"Delhi\";i:3;s:7:\"Kolkata\";}s:11:\"ans_textbox\";s:5:\"Delhi\";s:3:\"img\";s:0:\"\";}'),
(19, 'What is the color of Tree leaves?', '', '7', '1', '6', '2', 10, '', '8', 'a:5:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:33:\"What is the color of Tree leaves?\";s:15:\"question_option\";s:1:\"3\";s:8:\"option_1\";a:4:{i:0;s:4:\"Blue\";i:1;s:5:\"Green\";i:2;s:6:\"Yellow\";i:3;s:5:\"White\";}s:11:\"ans_textbox\";s:4:\"Blue\";}'),
(20, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry?', '', '7', '1', '6', '2', 10, '', '10', 'a:5:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:74:\"Lorem Ipsum is simply dummy text of the printing and typesetting industry?\";s:15:\"question_option\";s:2:\"18\";s:12:\"ans_textbox1\";s:8:\"Answer 1\";s:12:\"ans_textbox2\";s:8:\"Answer 2\";}'),
(21, 'Name the fruit mentioned in the image.', '', '7', '1', '6', '2', 10, '', '6', 'a:4:{s:8:\"question\";s:38:\"Name the fruit mentioned in the image.\";s:15:\"question_option\";s:1:\"1\";s:11:\"ans_textbox\";s:5:\"Apple\";s:3:\"img\";s:65:\"http://localhost/applekitch/uploads/images/495878092-612x6121.jpg\";}'),
(22, 'Name the animal mentioned in the image.', '', '7', '1', '6', '2', 10, '', '6', 'a:4:{s:8:\"question\";s:39:\"Name the animal mentioned in the image.\";s:15:\"question_option\";s:1:\"1\";s:11:\"ans_textbox\";s:8:\"Elephant\";s:3:\"img\";s:56:\"http://localhost/applekitch/uploads/images/921351181.jpg\";}'),
(23, 'Mention the aplhabet shown in the image.', '', '7', '1', '6', '2', 10, '', '6', 'a:5:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:40:\"Mention the aplhabet shown in the image.\";s:15:\"question_option\";s:1:\"1\";s:11:\"ans_textbox\";s:1:\"G\";s:3:\"img\";s:54:\"http://localhost/applekitch/uploads/images/Letra_g.jpg\";}'),
(24, 'How many chocolates are there in the image', '', '7', '1', '6', '2', 10, '', '6', 'a:5:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:42:\"How many chocolates are there in the image\";s:15:\"question_option\";s:1:\"1\";s:11:\"ans_textbox\";s:1:\"6\";s:3:\"img\";s:66:\"http://localhost/applekitch/uploads/images/41ypmcUYaIL__SY355_.jpg\";}'),
(25, 'Select a mammal in the given options below:', '', '7', '1', '6', '2', 10, '', '7', 'a:5:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:43:\"Select a mammal in the given options below:\";s:15:\"question_option\";s:1:\"9\";s:8:\"option_1\";a:4:{i:0;s:3:\"Hen\";i:1;s:4:\"Crow\";i:2;s:3:\"Dog\";i:3;s:10:\"Crocodile \";}s:11:\"ans_textbox\";s:3:\"Dog\";}'),
(26, 'How many months do we have in a year?', '', '7', '1', '6', '2', 10, '', '7', 'a:5:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:37:\"How many months do we have in a year?\";s:15:\"question_option\";s:1:\"9\";s:8:\"option_1\";a:4:{i:0;s:2:\"10\";i:1;s:2:\"12\";i:2;s:2:\"14\";i:3;s:2:\"16\";}s:11:\"ans_textbox\";s:2:\"12\";}'),
(27, 'How many days do we have in a week?', '', '7', '1', '6', '2', 10, '', '7', 'a:5:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:35:\"How many days do we have in a week?\";s:15:\"question_option\";s:1:\"9\";s:8:\"option_1\";a:4:{i:0;s:1:\"6\";i:1;s:1:\"7\";i:2;s:1:\"5\";i:3;s:1:\"8\";}s:11:\"ans_textbox\";s:1:\"7\";}'),
(28, 'We smell with our ______________.', '', '8', '1', '6', '2', 10, '', '8', 'a:5:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:33:\"We smell with our ______________.\";s:15:\"question_option\";s:1:\"3\";s:8:\"option_1\";a:4:{i:0;s:4:\"Lips\";i:1;s:4:\"Eyes\";i:2;s:5:\"Hands\";i:3;s:4:\"Nose\";}s:11:\"ans_textbox\";s:4:\"Nose\";}'),
(29, 'During which festival does Santa come to visit?', '', '8', '1', '6', '2', 10, '', '8', 'a:5:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:47:\"During which festival does Santa come to visit?\";s:15:\"question_option\";s:1:\"3\";s:8:\"option_1\";a:4:{i:0;s:6:\"Easter\";i:1;s:9:\"Christmas\";i:2;s:9:\"Hallowein\";i:3;s:9:\"Zombi Day\";}s:11:\"ans_textbox\";s:9:\"Christmas\";}'),
(30, 'What do you drink that comes from a cow?', '', '8', '1', '6', '2', 10, '', '8', 'a:5:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:40:\"What do you drink that comes from a cow?\";s:15:\"question_option\";s:1:\"3\";s:8:\"option_1\";a:4:{i:0;s:5:\"Water\";i:1;s:4:\"Milk\";i:2;s:5:\"Juice\";i:3;s:3:\"Tea\";}s:11:\"ans_textbox\";s:4:\"Milk\";}'),
(31, 'many hours are there in a day?', '', '8', '1', '6', '2', 10, '', '8', 'a:4:{s:8:\"question\";s:30:\"many hours are there in a day?\";s:15:\"question_option\";s:1:\"3\";s:8:\"option_1\";a:4:{i:0;s:2:\"24\";i:1;s:2:\"12\";i:2;s:2:\"26\";i:3;s:2:\"20\";}s:11:\"ans_textbox\";s:2:\"24\";}'),
(32, 'What animal goes ‘Moo’?', '', '8', '1', '6', '2', 10, '', '8', 'a:5:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:23:\"What animal goes ‘Moo’?\";s:15:\"question_option\";s:1:\"3\";s:8:\"option_1\";a:4:{i:0;s:3:\"Cow\";i:1;s:3:\"Dog\";i:2;s:3:\"Cat\";i:3;s:4:\"Duck\";}s:11:\"ans_textbox\";s:3:\"Cow\";}'),
(33, '------------- little ------- , how I wonder what you are.', '', '7', '1', '6', '2', 10, '', '10', 'a:5:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:57:\"------------- little ------- , how I wonder what you are.\";s:15:\"question_option\";s:2:\"18\";s:12:\"ans_textbox1\";s:7:\"twinkle\";s:12:\"ans_textbox2\";s:7:\"twinkle\";}'),
(34, 'Jingle --------, Jingle ------- jingle all the way.', '', '7', '1', '6', '2', 10, '', '10', 'a:5:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:51:\"Jingle --------, Jingle ------- jingle all the way.\";s:15:\"question_option\";s:2:\"18\";s:12:\"ans_textbox1\";s:4:\"bell\";s:12:\"ans_textbox2\";s:4:\"bell\";}'),
(35, '-------- and -------- went up the hill.', '', '7', '1', '6', '2', 10, '', '10', 'a:5:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:39:\"-------- and -------- went up the hill.\";s:15:\"question_option\";s:2:\"18\";s:12:\"ans_textbox1\";s:4:\"Jack\";s:12:\"ans_textbox2\";s:4:\"Jill\";}'),
(36, '------------------  sat on a wall, ---------------------- had a great fall.', '', '7', '1', '6', '2', 10, '', '10', 'a:5:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:75:\"------------------  sat on a wall, ---------------------- had a great fall.\";s:15:\"question_option\";s:2:\"18\";s:12:\"ans_textbox1\";s:13:\"Humpty Dumpty\";s:12:\"ans_textbox2\";s:13:\"Humpty Dumpty\";}'),
(37, 'What is the colour of an apple?', '', '9', '1', '6', '2', 10, '', '9', 'a:4:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:31:\"What is the colour of an apple?\";s:15:\"question_option\";s:2:\"11\";s:11:\"ans_textbox\";s:3:\"Red\";}'),
(38, 'Which animal is the king of the jungle?', '', '9', '1', '6', '2', 10, '', '9', 'a:4:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:39:\"Which animal is the king of the jungle?\";s:15:\"question_option\";s:2:\"11\";s:11:\"ans_textbox\";s:4:\"Lion\";}'),
(39, 'What is the name of a baby sheep? ', '', '9', '1', '6', '2', 10, '', '9', 'a:4:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:34:\"What is the name of a baby sheep? \";s:15:\"question_option\";s:2:\"11\";s:11:\"ans_textbox\";s:4:\"Lamp\";}'),
(40, 'Is this a dog?', '', '1', '77', '6', '2', 10, '', '1', 'a:5:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:14:\"Is this a dog?\";s:15:\"question_option\";s:1:\"1\";s:11:\"ans_textbox\";s:2:\"No\";s:3:\"img\";s:49:\"http://localhost/applekitch/uploads/images/08.jpg\";}'),
(43, 'What colour is milk?', '', '1', '1', '6', '2', 10, '', '11', 'a:7:{s:8:\"question\";s:20:\"What colour is milk?\";s:15:\"question_option\";s:2:\"14\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Well Done\";s:15:\"qWrong_feedback\";s:24:\"Cow milk color is White.\";s:11:\"ans_textbox\";s:5:\"White\";s:8:\"option_1\";a:4:{i:0;s:5:\"White\";i:1;s:5:\"Green\";i:2;s:3:\"Red\";i:3;s:4:\"Blue\";}}'),
(44, 'Arrange the numbers in increasing order', '', '1', '1', '6', '3', 10, '', '12', 'a:5:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:39:\"Arrange the numbers in increasing order\";s:15:\"question_option\";s:1:\"5\";s:14:\"option_arrange\";a:4:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";}s:16:\"option_dearrange\";a:4:{i:0;s:1:\"1\";i:1;s:1:\"4\";i:2;s:1:\"2\";i:3;s:1:\"3\";}}'),
(45, 'Cow is a:', '', '1', '1', '6', '2', 10, '', '13', 'a:7:{s:8:\"question\";s:9:\"Cow is a:\";s:15:\"question_option\";s:2:\"13\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:8:\"Terrific\";s:15:\"qWrong_feedback\";s:213:\"Domestic cattle. Cows are members of the order Artiodactyla. The order contains even-toed hoofed mammals, and cows have distinctive cloven hooves (derived from the toenails from the middle two digits of each foot)\";s:8:\"option_1\";a:5:{i:0;s:6:\"Mammal\";i:1;s:4:\"Bird\";i:2;s:7:\"Reptile\";i:3;s:9:\"Amphibian\";i:4;s:9:\"Arthropod\";}s:11:\"ans_textbox\";s:6:\"Mammal\";}'),
(46, 'Find the new Car.', '', '1', '1', '6', '2', 10, '', '14', 'a:5:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:17:\"Find the new Car.\";s:15:\"question_option\";s:1:\"2\";s:6:\"answer\";s:7:\"car.jpg\";s:9:\"img_array\";s:108:\"http://localhost/applekitch/uploads/images/broken-car.jpg|http://localhost/applekitch/uploads/images/car.jpg\";}'),
(48, 'Click the alphabet , which comes after B?', '', '1', '1', '6', '2', 10, '', '15', 'a:7:{s:8:\"question\";s:41:\"Click the alphabet , which comes after B?\";s:15:\"question_option\";s:1:\"6\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:8:\"Terrific\";s:15:\"qWrong_feedback\";s:20:\"Answer Should be \"C\"\";s:8:\"option_1\";a:4:{i:0;s:1:\"A\";i:1;s:1:\"B\";i:2;s:1:\"C\";i:3;s:1:\"D\";}s:11:\"ans_textbox\";s:1:\"C\";}'),
(49, 'Click the alphabet , which comes after F ?', '', '1', '1', '6', '2', 10, '', '15', 'a:7:{s:8:\"question\";s:42:\"Click the alphabet , which comes after F ?\";s:15:\"question_option\";s:1:\"6\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Great Job\";s:15:\"qWrong_feedback\";s:20:\"Answer should be \"G\"\";s:8:\"option_1\";a:4:{i:0;s:1:\"D\";i:1;s:1:\"G\";i:2;s:1:\"E\";i:3;s:1:\"A\";}s:11:\"ans_textbox\";s:1:\"G\";}'),
(50, 'What is the name of the animal in that picture?', '', '1', '1', '6', '2', 10, '', '17', 'a:5:{s:8:\"question\";s:47:\"What is the name of the animal in that picture?\";s:15:\"question_option\";s:2:\"20\";s:11:\"ans_textbox\";s:4:\"Goat\";s:8:\"option_1\";a:2:{i:0;s:4:\"Goat\";i:1;s:4:\"Boat\";}s:3:\"img\";s:67:\"http://localhost/applekitch/uploads/images/41XX8Bzd4vL__SX355_1.jpg\";}'),
(51, 'What is the name of the animal in that picture?', '', '1', '1', '6', '2', 10, '', '17', 'a:5:{s:8:\"question\";s:47:\"What is the name of the animal in that picture?\";s:15:\"question_option\";s:2:\"20\";s:11:\"ans_textbox\";s:3:\"Cow\";s:8:\"option_1\";a:2:{i:0;s:3:\"Cat\";i:1;s:3:\"Cow\";}s:3:\"img\";s:55:\"http://localhost/applekitch/uploads/images/Cow_1-01.jpg\";}'),
(52, 'Choose the cow.', '', '1', '1', '6', '2', 10, '', '16', 'a:5:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:15:\"Choose the cow.\";s:15:\"question_option\";s:2:\"15\";s:6:\"answer\";s:13:\"Cow_1-012.jpg\";s:9:\"img_array\";s:124:\"http://localhost/applekitch/uploads/images/41XX8Bzd4vL__SX355_2.jpg|http://localhost/applekitch/uploads/images/Cow_1-012.jpg\";}'),
(53, 'Choose Bird', '', '1', '1', '6', '2', 10, '', '16', 'a:5:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:11:\"Choose Bird\";s:15:\"question_option\";s:2:\"15\";s:6:\"answer\";s:9:\"bird2.jpg\";s:9:\"img_array\";s:109:\"http://localhost/applekitch/uploads/images/921351183.jpg|http://localhost/applekitch/uploads/images/bird2.jpg\";}'),
(54, 'Choose Goat', '', '1', '1', '6', '2', 10, '', '16', 'a:5:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:11:\"Choose Goat\";s:15:\"question_option\";s:2:\"15\";s:6:\"answer\";s:24:\"41XX8Bzd4vL__SX355_3.jpg\";s:9:\"img_array\";s:124:\"http://localhost/applekitch/uploads/images/41XX8Bzd4vL__SX355_3.jpg|http://localhost/applekitch/uploads/images/921351184.jpg\";}'),
(55, 'What is the color of tree leaves?', '', '1', '1', '6', '2', 10, '', '15', 'a:7:{s:8:\"question\";s:33:\"What is the color of tree leaves?\";s:15:\"question_option\";s:1:\"6\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Well Done\";s:15:\"qWrong_feedback\";s:38:\"generally, tree leaves color is green.\";s:8:\"option_1\";a:2:{i:0;s:5:\"Green\";i:1;s:5:\"Black\";}s:11:\"ans_textbox\";s:5:\"Green\";}');

-- --------------------------------------------------------

--
-- Table structure for table `question_option`
--

CREATE TABLE `question_option` (
  `option_id` int(11) NOT NULL,
  `option_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question_option`
--

INSERT INTO `question_option` (`option_id`, `option_name`, `status`) VALUES
(2, 'Images and options', 0),
(1, 'Image and TextBox', 0),
(3, 'OnlyClickableText', 0),
(4, 'QuestionWith1stCapitalLetter', 0),
(5, 'Question with Arranging Option', 0),
(6, 'Clickable Text', 0),
(7, 'QuestionWithTextBoxAndClickableOption', 0),
(8, 'SelectMultibleImages', 0),
(9, 'Only Options', 0),
(10, 'PutImages', 0),
(11, 'TextBox', 0),
(12, 'SVGImageWithOption', 0),
(13, 'QuestionWithTextBoxAndOption', 0),
(14, 'Question with Check Box', 0),
(15, 'Clickable Images', 0),
(16, 'Question with Put Images', 0),
(17, 'DragDrop', 0),
(18, 'Question with DoubleTextBoxes', 0),
(19, 'ImageWithTextBoxAndOption', 0),
(20, 'Image and Clickable Text', 0),
(22, 'Clickable Image with option', 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','deactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`type_id`, `type_name`, `type_slug`, `status`) VALUES
(1, 'True or False', NULL, 'active'),
(2, 'Audio, Images and Video', NULL, 'active'),
(3, 'Drawing', NULL, 'active'),
(4, 'Hot Spot', NULL, 'active'),
(5, 'Multipart', NULL, 'active'),
(6, 'Sequence', NULL, 'active'),
(7, 'Cloze', NULL, 'active'),
(8, 'Fill in the Blank', NULL, 'active'),
(9, 'Hot Text', NULL, 'active'),
(10, 'Multiple Choice', NULL, 'active'),
(11, 'Constructed Responses', NULL, 'active'),
(12, 'Graphical Gap Match', NULL, 'active'),
(13, 'Matches Pairs', NULL, 'active'),
(14, 'Multiple Response', NULL, 'active'),
(15, 'Branching Scenarios', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `student_ans_topic`
--

CREATE TABLE `student_ans_topic` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `certificate_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `submit_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_ans_topic`
--

INSERT INTO `student_ans_topic` (`id`, `user_id`, `certificate_id`, `topic_id`, `submit_dt`) VALUES
(1, 14, 1, 16, '2018-08-28 00:00:00'),
(2, 14, 1, 11, '2018-09-03 15:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `student_qns_ans`
--

CREATE TABLE `student_qns_ans` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `question_type` varchar(255) NOT NULL,
  `marks` float NOT NULL,
  `answer_type` enum('true','false') NOT NULL,
  `ans_time` int(11) NOT NULL,
  `submit_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_qns_ans`
--

INSERT INTO `student_qns_ans` (`id`, `user_id`, `question_id`, `country_id`, `subject_id`, `grade_id`, `category_id`, `topic_id`, `question_type`, `marks`, `answer_type`, `ans_time`, `submit_date`) VALUES
(1, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', 5, '2018-08-14 15:01:38'),
(2, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', 26, '2018-08-14 15:02:05'),
(3, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', 3, '2018-08-14 15:07:29'),
(4, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', 10, '2018-08-14 15:09:08'),
(5, 2, 51, 1, 2, 6, 1, 17, '20', 10, 'true', 6, '2018-08-14 15:11:15'),
(6, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', 9, '2018-08-14 15:12:12'),
(7, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', 24044, '2018-08-14 15:16:53'),
(8, 2, 51, 1, 2, 6, 1, 17, '20', 10, 'true', 24056, '2018-08-14 15:17:10'),
(9, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', 2, '2018-08-14 15:19:35'),
(10, 2, 51, 1, 2, 6, 1, 17, '20', 10, 'true', 5, '2018-08-14 15:19:44'),
(11, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', 5, '2018-08-14 16:04:47'),
(12, 2, 51, 1, 2, 6, 1, 17, '20', 10, 'true', 10, '2018-08-14 16:04:58'),
(13, 2, 51, 1, 2, 6, 1, 17, '20', 10, 'true', 4, '2018-08-14 16:13:16'),
(14, 2, 51, 1, 2, 6, 1, 17, '20', 10, 'true', 7, '2018-08-14 16:13:25'),
(15, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', 3, '2018-08-14 16:19:12'),
(16, 2, 51, 1, 2, 6, 1, 17, '20', 10, 'false', 6, '2018-08-14 16:19:20'),
(17, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', 3, '2018-08-14 16:23:10'),
(18, 2, 51, 1, 2, 6, 1, 17, '20', 10, 'false', 6027, '2018-08-14 16:24:39'),
(19, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', 5, '2018-08-14 16:35:45'),
(20, 2, 51, 1, 2, 6, 1, 17, '20', 10, 'false', 8, '2018-08-14 16:35:54'),
(21, 14, 51, 1, 2, 6, 1, 17, '20', 10, 'true', 7, '2018-08-24 15:14:52'),
(22, 14, 51, 1, 2, 6, 1, 17, '20', 10, 'true', 10, '2018-08-24 15:14:57'),
(23, 14, 43, 1, 2, 6, 1, 11, '14', 10, 'true', 60054, '2018-09-03 15:41:26');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grade` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `slug`, `grade`, `country`) VALUES
(3, 'Math', 'math', 5, 105),
(2, 'English', 'english', 5, 105),
(7, 'Science', 'sceince', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `switch_countries`
--

CREATE TABLE `switch_countries` (
  `idCountry` int(5) NOT NULL,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `countryName` varchar(45) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `switch_countries`
--

INSERT INTO `switch_countries` (`idCountry`, `countryCode`, `countryName`) VALUES
(1, 'AD', 'Andorra'),
(2, 'AE', 'United Arab Emirates'),
(3, 'AF', 'Afghanistan'),
(4, 'AG', 'Antigua and Barbuda'),
(5, 'AI', 'Anguilla'),
(6, 'AL', 'Albania'),
(7, 'AM', 'Armenia'),
(8, 'AO', 'Angola'),
(9, 'AQ', 'Antarctica'),
(10, 'AR', 'Argentina'),
(11, 'AS', 'American Samoa'),
(12, 'AT', 'Austria'),
(13, 'AU', 'Australia'),
(14, 'AW', 'Aruba'),
(15, 'AX', 'Åland'),
(16, 'AZ', 'Azerbaijan'),
(17, 'BA', 'Bosnia and Herzegovina'),
(18, 'BB', 'Barbados'),
(19, 'BD', 'Bangladesh'),
(20, 'BE', 'Belgium'),
(21, 'BF', 'Burkina Faso'),
(22, 'BG', 'Bulgaria'),
(23, 'BH', 'Bahrain'),
(24, 'BI', 'Burundi'),
(25, 'BJ', 'Benin'),
(26, 'BL', 'Saint Barthélemy'),
(27, 'BM', 'Bermuda'),
(28, 'BN', 'Brunei'),
(29, 'BO', 'Bolivia'),
(30, 'BQ', 'Bonaire'),
(31, 'BR', 'Brazil'),
(32, 'BS', 'Bahamas'),
(33, 'BT', 'Bhutan'),
(34, 'BV', 'Bouvet Island'),
(35, 'BW', 'Botswana'),
(36, 'BY', 'Belarus'),
(37, 'BZ', 'Belize'),
(38, 'CA', 'Canada'),
(39, 'CC', 'Cocos [Keeling] Islands'),
(40, 'CD', 'Democratic Republic of the Congo'),
(41, 'CF', 'Central African Republic'),
(42, 'CG', 'Republic of the Congo'),
(43, 'CH', 'Switzerland'),
(44, 'CI', 'Ivory Coast'),
(45, 'CK', 'Cook Islands'),
(46, 'CL', 'Chile'),
(47, 'CM', 'Cameroon'),
(48, 'CN', 'China'),
(49, 'CO', 'Colombia'),
(50, 'CR', 'Costa Rica'),
(51, 'CU', 'Cuba'),
(52, 'CV', 'Cape Verde'),
(53, 'CW', 'Curacao'),
(54, 'CX', 'Christmas Island'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DE', 'Germany'),
(58, 'DJ', 'Djibouti'),
(59, 'DK', 'Denmark'),
(60, 'DM', 'Dominica'),
(61, 'DO', 'Dominican Republic'),
(62, 'DZ', 'Algeria'),
(63, 'EC', 'Ecuador'),
(64, 'EE', 'Estonia'),
(65, 'EG', 'Egypt'),
(66, 'EH', 'Western Sahara'),
(67, 'ER', 'Eritrea'),
(68, 'ES', 'Spain'),
(69, 'ET', 'Ethiopia'),
(70, 'FI', 'Finland'),
(71, 'FJ', 'Fiji'),
(72, 'FK', 'Falkland Islands'),
(73, 'FM', 'Micronesia'),
(74, 'FO', 'Faroe Islands'),
(75, 'FR', 'France'),
(76, 'GA', 'Gabon'),
(77, 'GB', 'United Kingdom'),
(78, 'GD', 'Grenada'),
(79, 'GE', 'Georgia'),
(80, 'GF', 'French Guiana'),
(81, 'GG', 'Guernsey'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GL', 'Greenland'),
(85, 'GM', 'Gambia'),
(86, 'GN', 'Guinea'),
(87, 'GP', 'Guadeloupe'),
(88, 'GQ', 'Equatorial Guinea'),
(89, 'GR', 'Greece'),
(90, 'GS', 'South Georgia and the South Sandwich Islands'),
(91, 'GT', 'Guatemala'),
(92, 'GU', 'Guam'),
(93, 'GW', 'Guinea-Bissau'),
(94, 'GY', 'Guyana'),
(95, 'HK', 'Hong Kong'),
(96, 'HM', 'Heard Island and McDonald Islands'),
(97, 'HN', 'Honduras'),
(98, 'HR', 'Croatia'),
(99, 'HT', 'Haiti'),
(100, 'HU', 'Hungary'),
(101, 'ID', 'Indonesia'),
(102, 'IE', 'Ireland'),
(103, 'IL', 'Israel'),
(104, 'IM', 'Isle of Man'),
(105, 'IN', 'India'),
(106, 'IO', 'British Indian Ocean Territory'),
(107, 'IQ', 'Iraq'),
(108, 'IR', 'Iran'),
(109, 'IS', 'Iceland'),
(110, 'IT', 'Italy'),
(111, 'JE', 'Jersey'),
(112, 'JM', 'Jamaica'),
(113, 'JO', 'Jordan'),
(114, 'JP', 'Japan'),
(115, 'KE', 'Kenya'),
(116, 'KG', 'Kyrgyzstan'),
(117, 'KH', 'Cambodia'),
(118, 'KI', 'Kiribati'),
(119, 'KM', 'Comoros'),
(120, 'KN', 'Saint Kitts and Nevis'),
(121, 'KP', 'North Korea'),
(122, 'KR', 'South Korea'),
(123, 'KW', 'Kuwait'),
(124, 'KY', 'Cayman Islands'),
(125, 'KZ', 'Kazakhstan'),
(126, 'LA', 'Laos'),
(127, 'LB', 'Lebanon'),
(128, 'LC', 'Saint Lucia'),
(129, 'LI', 'Liechtenstein'),
(130, 'LK', 'Sri Lanka'),
(131, 'LR', 'Liberia'),
(132, 'LS', 'Lesotho'),
(133, 'LT', 'Lithuania'),
(134, 'LU', 'Luxembourg'),
(135, 'LV', 'Latvia'),
(136, 'LY', 'Libya'),
(137, 'MA', 'Morocco'),
(138, 'MC', 'Monaco'),
(139, 'MD', 'Moldova'),
(140, 'ME', 'Montenegro'),
(141, 'MF', 'Saint Martin'),
(142, 'MG', 'Madagascar'),
(143, 'MH', 'Marshall Islands'),
(144, 'MK', 'Macedonia'),
(145, 'ML', 'Mali'),
(146, 'MM', 'Myanmar [Burma]'),
(147, 'MN', 'Mongolia'),
(148, 'MO', 'Macao'),
(149, 'MP', 'Northern Mariana Islands'),
(150, 'MQ', 'Martinique'),
(151, 'MR', 'Mauritania'),
(152, 'MS', 'Montserrat'),
(153, 'MT', 'Malta'),
(154, 'MU', 'Mauritius'),
(155, 'MV', 'Maldives'),
(156, 'MW', 'Malawi'),
(157, 'MX', 'Mexico'),
(158, 'MY', 'Malaysia'),
(159, 'MZ', 'Mozambique'),
(160, 'NA', 'Namibia'),
(161, 'NC', 'New Caledonia'),
(162, 'NE', 'Niger'),
(163, 'NF', 'Norfolk Island'),
(164, 'NG', 'Nigeria'),
(165, 'NI', 'Nicaragua'),
(166, 'NL', 'Netherlands'),
(167, 'NO', 'Norway'),
(168, 'NP', 'Nepal'),
(169, 'NR', 'Nauru'),
(170, 'NU', 'Niue'),
(171, 'NZ', 'New Zealand'),
(172, 'OM', 'Oman'),
(173, 'PA', 'Panama'),
(174, 'PE', 'Peru'),
(175, 'PF', 'French Polynesia'),
(176, 'PG', 'Papua New Guinea'),
(177, 'PH', 'Philippines'),
(178, 'PK', 'Pakistan'),
(179, 'PL', 'Poland'),
(180, 'PM', 'Saint Pierre and Miquelon'),
(181, 'PN', 'Pitcairn Islands'),
(182, 'PR', 'Puerto Rico'),
(183, 'PS', 'Palestine'),
(184, 'PT', 'Portugal'),
(185, 'PW', 'Palau'),
(186, 'PY', 'Paraguay'),
(187, 'QA', 'Qatar'),
(188, 'RE', 'Réunion'),
(189, 'RO', 'Romania'),
(190, 'RS', 'Serbia'),
(191, 'RU', 'Russia'),
(192, 'RW', 'Rwanda'),
(193, 'SA', 'Saudi Arabia'),
(194, 'SB', 'Solomon Islands'),
(195, 'SC', 'Seychelles'),
(196, 'SD', 'Sudan'),
(197, 'SE', 'Sweden'),
(198, 'SG', 'Singapore'),
(199, 'SH', 'Saint Helena'),
(200, 'SI', 'Slovenia'),
(201, 'SJ', 'Svalbard and Jan Mayen'),
(202, 'SK', 'Slovakia'),
(203, 'SL', 'Sierra Leone'),
(204, 'SM', 'San Marino'),
(205, 'SN', 'Senegal'),
(206, 'SO', 'Somalia'),
(207, 'SR', 'Suriname'),
(208, 'SS', 'South Sudan'),
(209, 'ST', 'São Tomé and Príncipe'),
(210, 'SV', 'El Salvador'),
(211, 'SX', 'Sint Maarten'),
(212, 'SY', 'Syria'),
(213, 'SZ', 'Swaziland'),
(214, 'TC', 'Turks and Caicos Islands'),
(215, 'TD', 'Chad'),
(216, 'TF', 'French Southern Territories'),
(217, 'TG', 'Togo'),
(218, 'TH', 'Thailand'),
(219, 'TJ', 'Tajikistan'),
(220, 'TK', 'Tokelau'),
(221, 'TL', 'East Timor'),
(222, 'TM', 'Turkmenistan'),
(223, 'TN', 'Tunisia'),
(224, 'TO', 'Tonga'),
(225, 'TR', 'Turkey'),
(226, 'TT', 'Trinidad and Tobago'),
(227, 'TV', 'Tuvalu'),
(228, 'TW', 'Taiwan'),
(229, 'TZ', 'Tanzania'),
(230, 'UA', 'Ukraine'),
(231, 'UG', 'Uganda'),
(232, 'UM', 'U.S. Minor Outlying Islands'),
(233, 'US', 'United States'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VA', 'Vatican City'),
(237, 'VC', 'Saint Vincent and the Grenadines'),
(238, 'VE', 'Venezuela'),
(239, 'VG', 'British Virgin Islands'),
(240, 'VI', 'U.S. Virgin Islands'),
(241, 'VN', 'Vietnam'),
(242, 'VU', 'Vanuatu'),
(243, 'WF', 'Wallis and Futuna'),
(244, 'WS', 'Samoa'),
(245, 'XK', 'Kosovo'),
(246, 'YE', 'Yemen'),
(247, 'YT', 'Mayotte'),
(248, 'ZA', 'South Africa'),
(249, 'ZM', 'Zambia'),
(250, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','deactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_name`, `status`) VALUES
(1, 'Learn to count to 3', 'active'),
(2, 'Count to 3', 'active'),
(3, 'Learn to count to 5', 'active'),
(4, 'Classify shapes by colour', 'active'),
(5, 'Testing Tesing 123', 'active'),
(6, 'Identify Animals', 'active'),
(7, 'Multiple Choose', 'active'),
(8, 'Only Clickable Text', 'active'),
(9, 'Textbox', 'active'),
(10, 'Question With Double Textboxes', 'active'),
(11, 'Question with Check Box', 'active'),
(12, 'Question with Arranging Option', 'active'),
(13, 'Question With TextBox And Option', 'active'),
(14, 'Images and Options', 'active'),
(15, 'Clickable Text', 'active'),
(16, 'Clickable Images', 'active'),
(17, 'Image and Clickable Text', 'active'),
(18, 'SelectMultibleImages', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(255) NOT NULL,
  `role` int(11) NOT NULL,
  `membership_plan` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `profile_img` text COLLATE utf8_unicode_ci,
  `ym` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `stripe_cust_json` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activation` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `phone`, `email_address`, `password`, `parent`, `role`, `membership_plan`, `price`, `profile_img`, `ym`, `start_date`, `stripe_cust_json`, `activation`) VALUES
(2, 'Test', 'User', '', 'testuser@mailinator.com', 'b1b91a79faefd7ef31005218eb23bb04', 0, 1, 1, 100, 'http://localhost/applekitch/uploads/34.jpg', 'yearly', '2018-08-14', '{\"id\":\"cus_DPrm8YnwUMU0Cd\",\"object\":\"customer\",\"account_balance\":0,\"created\":1534251264,\"currency\":null,\"default_source\":\"card_DPrlobDo5taezn\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"testuser@mailinator.com\",\"invoice_prefix\":\"0EA1E4', 1),
(7, 'Tanuj', 'Bhattacharya', '21323423453', 'tanujcoregen@gmail.com', 'b1b91a79faefd7ef31005218eb23bb04', 0, 4, 1, 100, NULL, 'monthly', '2018-07-03', '[]', 1),
(4, 'Bhul', 'Bhal', '1234567890', 'bhulbhal1981@gmail.com', 'b1b91a79faefd7ef31005218eb23bb04', 0, 2, 1, 100, NULL, 'monthly', '2018-07-03', '[]', 1),
(5, 'Rana', 'Ghosh', '7890023550', 'ranacoregen@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 0, 3, 0, 0, NULL, '', '0000-00-00', '', 1),
(10, 'Test', 'User', '', 'testchild@mailinator.com', 'b1b91a79faefd7ef31005218eb23bb04', 2, 3, 0, 0, NULL, '', '0000-00-00', '', 1),
(11, 'Test3', 'User3', '', 'testchild3@mailinator.com', 'b1b91a79faefd7ef31005218eb23bb04', 2, 3, 0, 0, NULL, '', '0000-00-00', '', 1),
(12, 'Test2', 'User2', '', 'testchild22@mailinator.com', 'b1b91a79faefd7ef31005218eb23bb04', 2, 3, 0, 0, NULL, '', '0000-00-00', '', 1),
(13, 'Geroge', 'bob', '', 'gbob313@gmail.com', '03a1bad58d308803c5b77ece928cfa51', 0, 1, 1, 1000, NULL, 'yearly', '2018-07-06', '{\"id\":\"cus_DBG5hZObUOVPtT\",\"object\":\"customer\",\"account_balance\":0,\"created\":1530882088,\"currency\":null,\"default_source\":\"card_DBG5P5TO8jCujP\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"gbob313@gmail.com\",\"invoice_prefix\":\"1F8120F\",\"li', 1),
(14, 'Rana', 'Ghosh', '', 'rana.ghosh939@gmail.com', 'b1b91a79faefd7ef31005218eb23bb04', 7, 3, 1, 100, 'http://localhost/applekitch/uploads/kim-kookheon4.jpg', 'yearly', '2018-08-24', '{\"id\":\"cus_DTbqgiZCq1ROSL\",\"object\":\"customer\",\"account_balance\":0,\"created\":1535114555,\"currency\":null,\"default_source\":\"card_DTbqDr2Fx9WUbK\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"rana.ghosh939@gmail.com\",\"invoice_prefix\":\"9F6B43', 1),
(15, 'Test', 'Parent', '', 'testparent@mailinator.com', 'b1b91a79faefd7ef31005218eb23bb04', 0, 1, 0, 0, NULL, '', '0000-00-00', '', 1),
(16, 'Test', 'Children', '', 'testchildren@mailinator.com', 'b1b91a79faefd7ef31005218eb23bb04', 15, 3, 0, 0, NULL, '', '0000-00-00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capabilities` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `capabilities`) VALUES
(1, 'Parent', ''),
(2, 'Teacher', ''),
(3, 'Student', ''),
(4, 'School', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `award_templates`
--
ALTER TABLE `award_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `question_option`
--
ALTER TABLE `question_option`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `student_ans_topic`
--
ALTER TABLE `student_ans_topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_qns_ans`
--
ALTER TABLE `student_qns_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `switch_countries`
--
ALTER TABLE `switch_countries`
  ADD PRIMARY KEY (`idCountry`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `award_templates`
--
ALTER TABLE `award_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `question_option`
--
ALTER TABLE `question_option`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `question_type`
--
ALTER TABLE `question_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_ans_topic`
--
ALTER TABLE `student_ans_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_qns_ans`
--
ALTER TABLE `student_qns_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `switch_countries`
--
ALTER TABLE `switch_countries`
  MODIFY `idCountry` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
