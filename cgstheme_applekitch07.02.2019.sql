-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2019 at 05:56 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cgstheme_applekitch`
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
(1, 'cool-background1.png', 'http://applekitch.coregensolution.com/files/cool-background1.png', '/home1/cgsthemes/public_html/applekitch/files/'),
(2, 'unnamed.jpg', 'http://applekitch.coregensolution.com/files/unnamed.jpg', '/home1/cgsthemes/public_html/applekitch/files/'),
(3, 'pizza-2802332_1920.jpg', 'http://applekitch.coregensolution.com/files/pizza-2802332_1920.jpg', '/home1/cgsthemes/public_html/applekitch/files/'),
(4, 'chess-2730034_1920.jpg', 'http://applekitch.coregensolution.com/files/chess-2730034_1920.jpg', '/home1/cgsthemes/public_html/applekitch/files/'),
(5, 'unnamed1.jpg', 'http://applekitch.coregensolution.com/files/unnamed1.jpg', '/home1/cgsthemes/public_html/applekitch/files/'),
(6, 'unnamed2.jpg', 'http://applekitch.coregensolution.com/files/unnamed2.jpg', '/home1/cgsthemes/public_html/applekitch/files/'),
(7, 'unnamed3.jpg', 'http://applekitch.coregensolution.com/files/unnamed3.jpg', '/home1/cgsthemes/public_html/applekitch/files/'),
(8, '1920x850.png', 'http://applekitch.coregensolution.com/files/1920x850.png', '/files/'),
(9, '1920x8501.png', 'http://applekitch.coregensolution.com/files/1920x8501.png', '/home1/cgsthemes/public_html/applekitch/files/'),
(10, '1920x8502.png', 'http://applekitch.coregensolution.com/files/1920x8502.png', '/home1/cgsthemes/public_html/applekitch/files/'),
(11, '1920x8503.png', 'http://applekitch.coregensolution.com/files/1920x8503.png', '/home1/cgsthemes/public_html/applekitch/files/'),
(12, 'author.jpg', 'http://applekitch.coregensolution.com/files/author.jpg', '/home1/cgsthemes/public_html/applekitch/files/'),
(13, '1920x85021.png', 'http://applekitch.coregensolution.com/files/1920x85021.png', '/home1/cgsthemes/public_html/applekitch/files/'),
(14, 'Photo_not_available-4.jpg', 'http://applekitch.coregensolution.com/files/Photo_not_available-4.jpg', '/home1/cgsthemes/public_html/applekitch/files/'),
(15, 'Photo_not_available-41.jpg', 'http://applekitch.coregensolution.com/files/Photo_not_available-41.jpg', '/home1/cgsthemes/public_html/applekitch/files/'),
(16, 'Photo_not_available-42.jpg', 'http://applekitch.coregensolution.com/files/Photo_not_available-42.jpg', '/home1/cgsthemes/public_html/applekitch/files/'),
(17, 'Photo_not_available-43.jpg', 'http://applekitch.coregensolution.com/files/Photo_not_available-43.jpg', '/home1/cgsthemes/public_html/applekitch/files/'),
(18, 'no-thumbnail.png', 'http://applekitch.coregensolution.com/files/no-thumbnail.png', '/home1/cgsthemes/public_html/applekitch/files/'),
(19, 'no-thumbnail1.png', 'http://applekitch.coregensolution.com/files/no-thumbnail1.png', '/home1/cgsthemes/public_html/applekitch/files/'),
(20, 'no-thumbnail2.png', 'http://applekitch.coregensolution.com/files/no-thumbnail2.png', '/home1/cgsthemes/public_html/applekitch/files/'),
(21, 'no-thumbnail3.png', 'http://applekitch.coregensolution.com/files/no-thumbnail3.png', '/home1/cgsthemes/public_html/applekitch/files/'),
(22, 'pexels-photo-196647.jpeg', 'http://applekitch.coregensolution.com/files/pexels-photo-196647.jpeg', '/home1/cgsthemes/public_html/applekitch/files/'),
(23, 'pexels-photo-285814.jpeg', 'http://applekitch.coregensolution.com/files/pexels-photo-285814.jpeg', '/home1/cgsthemes/public_html/applekitch/files/'),
(24, 'pexels-photo-326502.jpeg', 'http://applekitch.coregensolution.com/files/pexels-photo-326502.jpeg', '/home1/cgsthemes/public_html/applekitch/files/'),
(25, 'pexels-photo-1966471.jpeg', 'http://applekitch.coregensolution.com/files/pexels-photo-1966471.jpeg', '/home1/cgsthemes/public_html/applekitch/files/'),
(26, 'gold-coin-icon-vector-11893630.jpg', 'http://www.applekitch.com/files/gold-coin-icon-vector-11893630.jpg', '/home/wwwapplekitch/public_html/files/');

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
  `country` int(11) DEFAULT NULL,
  `cat_img` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `parent`, `grade`, `subject`, `country`, `cat_img`) VALUES
(50, 'Comparing', '', NULL, NULL, NULL, NULL, NULL),
(51, 'Ordering Numbers', '', NULL, NULL, NULL, NULL, NULL),
(52, 'Shapes', '', NULL, NULL, NULL, NULL, NULL),
(53, 'Money', '', NULL, NULL, NULL, NULL, NULL),
(54, 'Size', '', NULL, NULL, NULL, NULL, NULL),
(55, 'Positions', '', NULL, NULL, NULL, NULL, NULL),
(56, 'Classify', '', NULL, NULL, NULL, NULL, NULL),
(57, 'Pattern', '', NULL, NULL, NULL, NULL, NULL),
(58, 'QUESTION TYPES', '', NULL, NULL, NULL, NULL, NULL),
(49, 'Number Representations', '', NULL, NULL, NULL, NULL, NULL),
(45, 'COUNTING UP TO 5', '', NULL, NULL, NULL, NULL, NULL),
(46, 'Counting up to 10', '', NULL, NULL, NULL, NULL, NULL),
(47, 'Counting up to 15', '', NULL, NULL, NULL, NULL, NULL),
(48, 'Counting up to 20', '', NULL, NULL, NULL, NULL, NULL),
(44, 'Counting up to 3', '', NULL, NULL, NULL, NULL, NULL);

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
(1, 'Certificate of excellance', 'for excellent performance on <B>15 reception maths skills</B>', 2, 1, 1, 1, 'active', '2018-08-24 09:57:00', 'true', 'http://applekitch.coregensolution.com/uploads/certificate-background1.jpg', 'http://applekitch.coregensolution.com/uploads/signature1.png'),
(2, 'certificate of excellance 2', 'for excellent performance on <B>15 reception maths skills</B>', 2, 5, 1, 17, 'active', '2018-08-24 10:04:24', 'false', 'http://applekitch.coregensolution.com/uploads/certificate-background2.jpg', 'http://applekitch.coregensolution.com/uploads/signature2.png');

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
(250, 'Zimbabwe', 'ZW'),
(251, 'United Kingdom', 'UK');

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
(2, 'Year 1', 'year-1', 8),
(1, 'Reception', 'reception', 9),
(3, 'Year 2', 'year-2', 10),
(10, 'Year 3', 'year-3', 13),
(11, 'Year 4', 'year-4', 14),
(12, 'Year 5', 'year-5', 15),
(13, 'Year 6', 'year-6', 16),
(14, 'Year 7', 'year-7', 17),
(15, 'Year 8', 'year-8', 18),
(16, 'Year 9', 'year-9', 19),
(17, 'Year 10', 'year-10', 20),
(18, 'Year 11', 'year-11', 21);

-- --------------------------------------------------------

--
-- Table structure for table `grade_settings`
--

CREATE TABLE `grade_settings` (
  `id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `content` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade_settings`
--

INSERT INTO `grade_settings` (`id`, `grade_id`, `subject_id`, `content`) VALUES
(1, 1, 2, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lacus turpis, malesuada in nulla nec, imperdiet tincidunt erat. Morbi at magna at diam tristique ullamcorper ullamcorper suscipit dolor. Nulla vitae dictum leo, eget consectetur erat. Nulla luctus aliquam risus sit amet sollicitudin. Maecenas neque lorem, volutpat congue ornare nec, convallis vel neque. Cras pellentesque metus mi, dictum tincidunt ex egestas id. Duis semper urna sed ligula vestibulum pellentesque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id velit et ipsum bibendum interdum. Suspendisse nec placerat turpis, sed auctor ipsum. Nulla interdum varius orci, interdum vulputate nisi semper eu. Integer convallis nibh diam, sit amet gravida metus pellentesque a.</p>'),
(2, 2, 2, '<h5><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong></h5>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lacus turpis, malesuada in nulla nec, imperdiet tincidunt erat. Morbi at magna at diam tristique ullamcorper ullamcorper suscipit dolor. Nulla vitae dictum leo, eget consectetur erat. Nulla luctus aliquam risus sit amet sollicitudin. Maecenas neque lorem, volutpat congue ornare nec, convallis vel neque. Cras pellentesque metus mi, dictum tincidunt ex egestas id. Duis semper urna sed ligula vestibulum pellentesque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id velit et ipsum bibendum interdum. Suspendisse nec placerat turpis, sed auctor ipsum. Nulla interdum varius orci, interdum vulputate nisi semper eu. Integer convallis nibh diam, sit amet gravida metus pellentesque a.</p>'),
(3, 3, 2, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lacus turpis, malesuada in nulla nec, imperdiet tincidunt erat. Morbi at magna at diam tristique ullamcorper ullamcorper suscipit dolor. Nulla vitae dictum leo, eget consectetur erat. Nulla luctus aliquam risus sit amet sollicitudin. Maecenas neque lorem, volutpat congue ornare nec, convallis vel neque. Cras pellentesque metus mi, dictum tincidunt ex egestas id. Duis semper urna sed ligula vestibulum pellentesque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id velit et ipsum bibendum interdum. Suspendisse nec placerat turpis, sed auctor ipsum. Nulla interdum varius orci, interdum vulputate nisi semper eu. Integer convallis nibh diam, sit amet gravida metus pellentesque a.</p>'),
(5, 10, 2, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lacus turpis, malesuada in nulla nec, imperdiet tincidunt erat. Morbi at magna at diam tristique ullamcorper ullamcorper suscipit dolor. Nulla vitae dictum leo, eget consectetur erat. Nulla luctus aliquam risus sit amet sollicitudin. Maecenas neque lorem, volutpat congue ornare nec, convallis vel neque. Cras pellentesque metus mi, dictum tincidunt ex egestas id. Duis semper urna sed ligula vestibulum pellentesque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id velit et ipsum bibendum interdum. Suspendisse nec placerat turpis, sed auctor ipsum. Nulla interdum varius orci, interdum vulputate nisi semper eu. Integer convallis nibh diam, sit amet gravida metus pellentesque a.</p>'),
(6, 11, 2, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tincidunt sapien vel luctus cursus. Donec egestas quis enim ac ullamcorper. In ullamcorper, lacus quis congue commodo, ex nunc lobortis lorem, sed bibendum elit odio vel ex. Nunc quis ex nec nisl rhoncus mattis. Aliquam feugiat lacus eu nulla rhoncus, quis ultricies mi ultrices. Aenean dapibus massa vitae justo convallis maximus. Fusce libero turpis, blandit eu gravida id, vestibulum tincidunt massa. Suspendisse sem mi, tempus tempor convallis eu, rhoncus id odio. In ac risus quis erat pretium fringilla. Proin nisl augue, porttitor ac dolor et, porta vestibulum eros.</p>'),
(7, 10, 3, '<p>This is content resources for the Maths Year 3 exercises.&nbsp;</p>'),
(10, 1, 3, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc justo odio, feugiat vel diam semper, euismod hendrerit lorem. Fusce molestie eros in diam tempus mollis. Vestibulum ut viverra nunc, mattis dapibus nisi. Cras hendrerit ultricies erat, et eleifend sem vehicula at. Sed aliquet metus sit amet libero accumsan rutrum. Nulla laoreet nisl et facilisis sollicitudin. Sed posuere augue nec vestibulum dapibus. Etiam aliquam consectetur augue nec pulvinar. Maecenas nec ultrices dui. Aenean sit amet consequat felis, ut elementum felis. Donec mollis, felis sed varius congue, nunc libero bibendum sem, eu posuere est purus nec nisi.<br /><br />Suspendisse ut leo felis. In laoreet, sem non semper vestibulum, quam diam tempor diam, tincidunt volutpat mi sem in tortor. Sed tempus, velit sed accumsan efficitur, nisi urna aliquet tortor, nec dapibus est risus nec libero. Fusce scelerisque turpis eu nunc consectetur placerat. Duis sit amet fringilla risus. Quisque et urna nibh. Praesent sed vulputate tellus. Proin dapibus ex et urna hendrerit, sed facilisis lacus interdum. Suspendisse suscipit commodo diam in malesuada. Maecenas non odio orci. Donec pellentesque nisi vitae ex cursus faucibus. Integer volutpat tellus elit, molestie tristique diam rutrum pellentesque. Vivamus imperdiet sollicitudin vestibulum. Mauris eu justo varius, interdum lacus et, tristique neque. Praesent eget ante volutpat, bibendum eros vitae, finibus orci. Maecenas sed neque convallis, ornare ante non, cursus sem.<br /><br />Maecenas a posuere nunc. Ut luctus lectus sed lectus venenatis, nec ultricies odio aliquet. Morbi porta quis ipsum quis lobortis. Proin a gravida leo, quis euismod leo. Duis sagittis, nisl rhoncus interdum bibendum, nunc nibh semper libero, et rhoncus eros dolor sit amet mi. Aliquam sit amet molestie tortor, non dapibus ante. In ac vulputate libero. Aliquam mattis vestibulum ex, in euismod ante. Nam justo tortor, lobortis sagittis blandit fringilla, dictum id quam. Proin metus leo, sagittis ac ex id, pellentesque fermentum felis.<br /><br />In tempus condimentum erat at scelerisque. Praesent pellentesque turpis vel est semper, et dapibus nibh volutpat. Nam vitae dui interdum magna ultricies tempor. Proin maximus dapibus commodo. Morbi et massa a turpis mattis pellentesque. Quisque vel interdum nibh. Vestibulum et lectus sed mi porttitor pharetra ut ac elit. Quisque porttitor lacinia turpis, eu suscipit arcu molestie in. Vestibulum at ullamcorper mauris. Vestibulum sit amet ante non arcu egestas luctus a nec felis. Etiam purus odio, gravida vitae mollis at, tristique at velit.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `home_settings`
--

CREATE TABLE `home_settings` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `page_content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_settings`
--

INSERT INTO `home_settings` (`id`, `slug`, `page_content`) VALUES
(1, 'section-1', 'a:4:{s:7:\"heading\";s:11:\"Apple Kitch\";s:10:\"subheading\";s:175:\"Apple Kitch is an educational platform that allows children to learn and develop their Math and English skills through a range of online interactive exercises and worksheets. \";s:7:\"content\";s:247:\"Focusing on the fundamentals of Math and English, Apple Kitch helps children to learn through fun, rewarding and easy-to-follow concepts. Help your child to learn more and gain the skills, confidence and know how to go further with Apple Kitch. \r\n\";s:13:\"content_image\";s:58:\"http://www.applekitch.com/uploads/kid_learning_on_ipad.png\";}'),
(2, 'section-2', 'a:4:{s:7:\"heading\";s:22:\"Join Apple Kitch Today\";s:11:\"button_text\";s:28:\"Create your FREE account Now\";s:11:\"button_link\";s:9:\"/register\";s:7:\"content\";s:113:\"Help your child to start practicing Maths and English with over 100 learning exercises and 100 worksheets today. \";}'),
(3, 'section-3', 'a:2:{s:7:\"heading\";s:0:\"\";s:10:\"subheading\";s:0:\"\";}'),
(4, 'section-4', 'a:2:{s:7:\"heading\";s:22:\"Praise for Apple Kitch\";s:10:\"subheading\";s:66:\"What children, parents, carers, teachers and school have to say...\";}');

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
(2, 'Free Membership', 0, 0, 10),
(1, 'Premium Membership', 100, 10, 100),
(3, 'User without signup', 0, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `page_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `page_content` text COLLATE utf8_unicode_ci NOT NULL,
  `page_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_dt` datetime NOT NULL,
  `meta_keyword` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('enable','disable') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'enable'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page`, `page_title`, `page_content`, `page_slug`, `create_dt`, `modify_dt`, `meta_keyword`, `meta_description`, `status`) VALUES
(11, 'About Us', 'About Us', '<p style=\"margin-top: 0px; margin-bottom: 15px; text-align: justify; background-color: #ffffff;\"><span style=\"color: #000000; font-family: Open Sans, Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris malesuada, nunc ut cursus fringilla, leo sapien lobortis nulla, in volutpat libero dui id elit. Sed sagittis turpis at est ornare congue. Nam tristique pellentesque lacus id ultrices. Etiam congue rutrum tortor, commodo semper augue lacinia in. Donec luctus in mauris ac lobortis. Praesent viverra vehicula dapibus. Praesent nisi arcu, imperdiet eu venenatis sed, dictum eget ex. Suspendisse leo orci, fermentum eget neque vel, porttitor gravida eros. Nullam varius mi vel dui ultricies, eu congue nibh aliquet. Vestibulum aliquam luctus magna, vel consectetur sapien hendrerit eu. Vestibulum at elit sapien.</span></p>\r\n<p style=\"margin-top: 0px; margin-bottom: 15px; text-align: justify; background-color: #ffffff;\"><span style=\"color: #000000; font-family: Open Sans, Arial, sans-serif;\">Donec fringilla est non faucibus gravida. Morbi eu odio quis diam viverra auctor. Nulla ornare id velit eget tempus. Ut eros orci, fermentum sit amet pellentesque sed, mollis maximus orci. Nullam maximus vitae neque sit amet iaculis. Nunc quis mattis ante, efficitur venenatis mi. Quisque imperdiet luctus massa, vel gravida nisl tristique quis. Integer justo mi, consectetur quis justo a, tincidunt sollicitudin velit. Nunc vel feugiat enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</span></p>\r\n<p style=\"margin-top: 0px; margin-bottom: 15px; text-align: justify; background-color: #ffffff;\"><span style=\"color: #000000; font-family: Open Sans, Arial, sans-serif;\">Mauris vitae dolor nisi. Nunc a vestibulum lorem. Etiam sodales congue tellus non pretium. Aenean non risus diam. Nullam eu porta lectus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque malesuada cursus fermentum. Curabitur tincidunt tempus arcu, ut lacinia nisl. Quisque vitae turpis quis nulla bibendum porta vitae pulvinar ante. Phasellus ac mollis quam, eget mattis elit. Aliquam erat volutpat. Nunc erat enim, fringilla ac velit eget, fermentum cursus ante. Etiam ut sodales ligula, at elementum mauris. Duis interdum leo vitae neque lobortis, vel ultrices est eleifend. Nam tristique placerat dignissim. Vestibulum eu luctus elit.</span></p>', 'about-us', '2018-08-27 13:09:59', '2018-08-27 13:09:59', 'About Us', '', ''),
(13, 'Terms and Conditions', 'Terms and Conditions', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris malesuada, nunc ut cursus fringilla, leo sapien lobortis nulla, in volutpat libero dui id elit. Sed sagittis turpis at est ornare congue. Nam tristique pellentesque lacus id ultrices. Etiam congue rutrum tortor, commodo semper augue lacinia in. Donec luctus in mauris ac lobortis. Praesent viverra vehicula dapibus. Praesent nisi arcu, imperdiet eu venenatis sed, dictum eget ex. Suspendisse leo orci, fermentum eget neque vel, porttitor gravida eros. Nullam varius mi vel dui ultricies, eu congue nibh aliquet. Vestibulum aliquam luctus magna, vel consectetur sapien hendrerit eu. Vestibulum at elit sapien.</p>\r\n<p>&nbsp;</p>\r\n<p>Donec fringilla est non faucibus gravida. Morbi eu odio quis diam viverra auctor. Nulla ornare id velit eget tempus. Ut eros orci, fermentum sit amet pellentesque sed, mollis maximus orci. Nullam maximus vitae neque sit amet iaculis. Nunc quis mattis ante, efficitur venenatis mi. Quisque imperdiet luctus massa, vel gravida nisl tristique quis. Integer justo mi, consectetur quis justo a, tincidunt sollicitudin velit. Nunc vel feugiat enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>\r\n<p>&nbsp;</p>\r\n<p>Mauris vitae dolor nisi. Nunc a vestibulum lorem. Etiam sodales congue tellus non pretium. Aenean non risus diam. Nullam eu porta lectus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque malesuada cursus fermentum. Curabitur tincidunt tempus arcu, ut lacinia nisl. Quisque vitae turpis quis nulla bibendum porta vitae pulvinar ante. Phasellus ac mollis quam, eget mattis elit. Aliquam erat volutpat. Nunc erat enim, fringilla ac velit eget, fermentum cursus ante. Etiam ut sodales ligula, at elementum mauris. Duis interdum leo vitae neque lobortis, vel ultrices est eleifend. Nam tristique placerat dignissim. Vestibulum eu luctus elit.</p>', 'terms-and-conditions', '2018-08-27 13:11:24', '2018-08-27 13:11:24', '', '', ''),
(14, 'Privacy Policy', 'Privacy Policy', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris malesuada, nunc ut cursus fringilla, leo sapien lobortis nulla, in volutpat libero dui id elit. Sed sagittis turpis at est ornare congue. Nam tristique pellentesque lacus id ultrices. Etiam congue rutrum tortor, commodo semper augue lacinia in. Donec luctus in mauris ac lobortis. Praesent viverra vehicula dapibus. Praesent nisi arcu, imperdiet eu venenatis sed, dictum eget ex. Suspendisse leo orci, fermentum eget neque vel, porttitor gravida eros. Nullam varius mi vel dui ultricies, eu congue nibh aliquet. Vestibulum aliquam luctus magna, vel consectetur sapien hendrerit eu. Vestibulum at elit sapien.</p>\r\n<p>&nbsp;</p>\r\n<p>Donec fringilla est non faucibus gravida. Morbi eu odio quis diam viverra auctor. Nulla ornare id velit eget tempus. Ut eros orci, fermentum sit amet pellentesque sed, mollis maximus orci. Nullam maximus vitae neque sit amet iaculis. Nunc quis mattis ante, efficitur venenatis mi. Quisque imperdiet luctus massa, vel gravida nisl tristique quis. Integer justo mi, consectetur quis justo a, tincidunt sollicitudin velit. Nunc vel feugiat enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>\r\n<p>&nbsp;</p>\r\n<p>Mauris vitae dolor nisi. Nunc a vestibulum lorem. Etiam sodales congue tellus non pretium. Aenean non risus diam. Nullam eu porta lectus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque malesuada cursus fermentum. Curabitur tincidunt tempus arcu, ut lacinia nisl. Quisque vitae turpis quis nulla bibendum porta vitae pulvinar ante. Phasellus ac mollis quam, eget mattis elit. Aliquam erat volutpat. Nunc erat enim, fringilla ac velit eget, fermentum cursus ante. Etiam ut sodales ligula, at elementum mauris. Duis interdum leo vitae neque lobortis, vel ultrices est eleifend. Nam tristique placerat dignissim. Vestibulum eu luctus elit.</p>', 'privacy-policy', '2018-08-27 13:11:44', '2018-08-27 13:11:44', '', '', ''),
(15, 'Contact Us', 'Contact Us', '', 'contact-us', '2018-08-27 13:13:57', '2018-08-27 13:13:57', '', '', ''),
(16, 'What We Offer', 'What We Offer', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mattis ultricies arcu, in aliquet diam dignissim et. Praesent maximus luctus erat, ac aliquam nisi. In eleifend sem nec auctor maximus. Nullam aliquet libero in nibh luctus malesuada. Mauris magna enim, ornare at risus quis, viverra commodo quam. Mauris sed semper mi. Sed condimentum sapien sit amet neque viverra ultricies. Donec condimentum quam sed lacus varius, quis finibus neque tristique. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n<p>Quisque mattis, nulla eu finibus iaculis, ex lacus feugiat arcu, eu sollicitudin nibh nisi id velit. Ut laoreet, tortor eu vulputate sagittis, odio ipsum tristique mi, nec imperdiet velit arcu non tortor. In dignissim sem sed orci iaculis, nec dictum nisi tincidunt. Integer et eros est. Suspendisse eget egestas ante. Nunc iaculis nulla vel auctor fringilla. Morbi tristique turpis vel mauris venenatis commodo. Aliquam pharetra cursus dolor ultrices pharetra. Aenean gravida risus vehicula accumsan efficitur. Proin porta velit consectetur ante luctus, in aliquet purus luctus. Morbi pulvinar tellus purus, nec efficitur enim eleifend ut. Curabitur eleifend dapibus neque. Ut malesuada, felis sit amet pretium hendrerit, nisl turpis luctus eros, nec viverra nunc nunc ut leo.</p>\r\n<p>Donec eu nisi at enim luctus elementum. Maecenas eu nunc interdum neque malesuada tempor eu in lorem. Nullam ultricies diam erat, vel dignissim erat feugiat et. Sed aliquam commodo nibh, id rhoncus mi sodales ut. Nam vitae risus condimentum, maximus nisl et, ornare ante. Aenean dolor dolor, mattis non convallis nec, volutpat vel orci. Sed cursus aliquam diam, nec sagittis metus. Nulla eget sapien laoreet, mattis nisl sit amet, elementum lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>', 'what-we-offer', '2018-08-27 13:14:08', '2018-10-05 13:47:40', 'Nunc iaculis nulla vel auctor fringilla', '<p>Nunc iaculis nulla vel auctor fringilla</p>', ''),
(17, 'Reviews/Testimonals', 'Reviews/Testimonals', '', 'reviews-testimonials', '2018-08-27 13:14:22', '2018-08-27 13:14:22', '', '', ''),
(21, 'For Student', 'For Student', '<p style=\"margin-top: 0px; margin-bottom: 15px; text-align: justify; background-color: #ffffff;\"><span style=\"color: #000000; font-family: Open Sans, Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris malesuada, nunc ut cursus fringilla, leo sapien lobortis nulla, in volutpat libero dui id elit. Sed sagittis turpis at est ornare congue. Nam tristique pellentesque lacus id ultrices. Etiam congue rutrum tortor, commodo semper augue lacinia in. Donec luctus in mauris ac lobortis. Praesent viverra vehicula dapibus. Praesent nisi arcu, imperdiet eu venenatis sed, dictum eget ex. Suspendisse leo orci, fermentum eget neque vel, porttitor gravida eros. Nullam varius mi vel dui ultricies, eu congue nibh aliquet. Vestibulum aliquam luctus magna, vel consectetur sapien hendrerit eu. Vestibulum at elit sapien.</span></p>\r\n<p style=\"margin-top: 0px; margin-bottom: 15px; text-align: justify; background-color: #ffffff;\"><span style=\"color: #000000; font-family: Open Sans, Arial, sans-serif;\">Donec fringilla est non faucibus gravida. Morbi eu odio quis diam viverra auctor. Nulla ornare id velit eget tempus. Ut eros orci, fermentum sit amet pellentesque sed, mollis maximus orci. Nullam maximus vitae neque sit amet iaculis. Nunc quis mattis ante, efficitur venenatis mi. Quisque imperdiet luctus massa, vel gravida nisl tristique quis. Integer justo mi, consectetur quis justo a, tincidunt sollicitudin velit. Nunc vel feugiat enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</span></p>\r\n<p style=\"margin-top: 0px; margin-bottom: 15px; text-align: justify; background-color: #ffffff;\"><span style=\"color: #000000; font-family: Open Sans, Arial, sans-serif;\">Mauris vitae dolor nisi. Nunc a vestibulum lorem. Etiam sodales congue tellus non pretium. Aenean non risus diam. Nullam eu porta lectus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque malesuada cursus fermentum. Curabitur tincidunt tempus arcu, ut lacinia nisl. Quisque vitae turpis quis nulla bibendum porta vitae pulvinar ante. Phasellus ac mollis quam, eget mattis elit. Aliquam erat volutpat. Nunc erat enim, fringilla ac velit eget, fermentum cursus ante. Etiam ut sodales ligula, at elementum mauris. Duis interdum leo vitae neque lobortis, vel ultrices est eleifend. Nam tristique placerat dignissim. Vestibulum eu luctus elit.</span></p>', 'for-student', '2018-11-20 13:32:45', '2018-11-20 13:32:45', '', '', ''),
(22, 'For Parents', 'For Parents', '<p style=\"margin-top: 0px; margin-bottom: 15px; text-align: justify; background-color: #ffffff;\"><span style=\"color: #000000; font-family: Open Sans, Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris malesuada, nunc ut cursus fringilla, leo sapien lobortis nulla, in volutpat libero dui id elit. Sed sagittis turpis at est ornare congue. Nam tristique pellentesque lacus id ultrices. Etiam congue rutrum tortor, commodo semper augue lacinia in. Donec luctus in mauris ac lobortis. Praesent viverra vehicula dapibus. Praesent nisi arcu, imperdiet eu venenatis sed, dictum eget ex. Suspendisse leo orci, fermentum eget neque vel, porttitor gravida eros. Nullam varius mi vel dui ultricies, eu congue nibh aliquet. Vestibulum aliquam luctus magna, vel consectetur sapien hendrerit eu. Vestibulum at elit sapien.</span></p>\r\n<p style=\"margin-top: 0px; margin-bottom: 15px; text-align: justify; background-color: #ffffff;\"><span style=\"color: #000000; font-family: Open Sans, Arial, sans-serif;\">Donec fringilla est non faucibus gravida. Morbi eu odio quis diam viverra auctor. Nulla ornare id velit eget tempus. Ut eros orci, fermentum sit amet pellentesque sed, mollis maximus orci. Nullam maximus vitae neque sit amet iaculis. Nunc quis mattis ante, efficitur venenatis mi. Quisque imperdiet luctus massa, vel gravida nisl tristique quis. Integer justo mi, consectetur quis justo a, tincidunt sollicitudin velit. Nunc vel feugiat enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</span></p>\r\n<p style=\"margin-top: 0px; margin-bottom: 15px; text-align: justify; background-color: #ffffff;\"><span style=\"color: #000000; font-family: Open Sans, Arial, sans-serif;\">Mauris vitae dolor nisi. Nunc a vestibulum lorem. Etiam sodales congue tellus non pretium. Aenean non risus diam. Nullam eu porta lectus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque malesuada cursus fermentum. Curabitur tincidunt tempus arcu, ut lacinia nisl. Quisque vitae turpis quis nulla bibendum porta vitae pulvinar ante. Phasellus ac mollis quam, eget mattis elit. Aliquam erat volutpat. Nunc erat enim, fringilla ac velit eget, fermentum cursus ante. Etiam ut sodales ligula, at elementum mauris. Duis interdum leo vitae neque lobortis, vel ultrices est eleifend. Nam tristique placerat dignissim. Vestibulum eu luctus elit.</span></p>', 'for-parents', '2018-11-20 13:33:06', '2018-11-20 13:33:06', '', '', ''),
(23, 'For School', 'For School', '<p style=\"margin-top: 0px; margin-bottom: 15px; text-align: justify; background-color: #ffffff;\"><span style=\"color: #000000; font-family: Open Sans, Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris malesuada, nunc ut cursus fringilla, leo sapien lobortis nulla, in volutpat libero dui id elit. Sed sagittis turpis at est ornare congue. Nam tristique pellentesque lacus id ultrices. Etiam congue rutrum tortor, commodo semper augue lacinia in. Donec luctus in mauris ac lobortis. Praesent viverra vehicula dapibus. Praesent nisi arcu, imperdiet eu venenatis sed, dictum eget ex. Suspendisse leo orci, fermentum eget neque vel, porttitor gravida eros. Nullam varius mi vel dui ultricies, eu congue nibh aliquet. Vestibulum aliquam luctus magna, vel consectetur sapien hendrerit eu. Vestibulum at elit sapien.</span></p>\r\n<p style=\"margin-top: 0px; margin-bottom: 15px; text-align: justify; background-color: #ffffff;\"><span style=\"color: #000000; font-family: Open Sans, Arial, sans-serif;\">Donec fringilla est non faucibus gravida. Morbi eu odio quis diam viverra auctor. Nulla ornare id velit eget tempus. Ut eros orci, fermentum sit amet pellentesque sed, mollis maximus orci. Nullam maximus vitae neque sit amet iaculis. Nunc quis mattis ante, efficitur venenatis mi. Quisque imperdiet luctus massa, vel gravida nisl tristique quis. Integer justo mi, consectetur quis justo a, tincidunt sollicitudin velit. Nunc vel feugiat enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</span></p>\r\n<p style=\"margin-top: 0px; margin-bottom: 15px; text-align: justify; background-color: #ffffff;\"><span style=\"color: #000000; font-family: Open Sans, Arial, sans-serif;\">Mauris vitae dolor nisi. Nunc a vestibulum lorem. Etiam sodales congue tellus non pretium. Aenean non risus diam. Nullam eu porta lectus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque malesuada cursus fermentum. Curabitur tincidunt tempus arcu, ut lacinia nisl. Quisque vitae turpis quis nulla bibendum porta vitae pulvinar ante. Phasellus ac mollis quam, eget mattis elit. Aliquam erat volutpat. Nunc erat enim, fringilla ac velit eget, fermentum cursus ante. Etiam ut sodales ligula, at elementum mauris. Duis interdum leo vitae neque lobortis, vel ultrices est eleifend. Nam tristique placerat dignissim. Vestibulum eu luctus elit.</span></p>', 'for-school', '2018-11-20 13:36:45', '2018-11-20 13:36:45', '', '', ''),
(24, 'For Teacher', 'For Teacher', '<p style=\"margin-top: 0px; margin-bottom: 15px; text-align: justify; background-color: #ffffff;\"><span style=\"color: #000000; font-family: Open Sans, Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris malesuada, nunc ut cursus fringilla, leo sapien lobortis nulla, in volutpat libero dui id elit. Sed sagittis turpis at est ornare congue. Nam tristique pellentesque lacus id ultrices. Etiam congue rutrum tortor, commodo semper augue lacinia in. Donec luctus in mauris ac lobortis. Praesent viverra vehicula dapibus. Praesent nisi arcu, imperdiet eu venenatis sed, dictum eget ex. Suspendisse leo orci, fermentum eget neque vel, porttitor gravida eros. Nullam varius mi vel dui ultricies, eu congue nibh aliquet. Vestibulum aliquam luctus magna, vel consectetur sapien hendrerit eu. Vestibulum at elit sapien.</span></p>\r\n<p style=\"margin-top: 0px; margin-bottom: 15px; text-align: justify; background-color: #ffffff;\"><span style=\"color: #000000; font-family: Open Sans, Arial, sans-serif;\">Donec fringilla est non faucibus gravida. Morbi eu odio quis diam viverra auctor. Nulla ornare id velit eget tempus. Ut eros orci, fermentum sit amet pellentesque sed, mollis maximus orci. Nullam maximus vitae neque sit amet iaculis. Nunc quis mattis ante, efficitur venenatis mi. Quisque imperdiet luctus massa, vel gravida nisl tristique quis. Integer justo mi, consectetur quis justo a, tincidunt sollicitudin velit. Nunc vel feugiat enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</span></p>\r\n<p style=\"margin-top: 0px; margin-bottom: 15px; text-align: justify; background-color: #ffffff;\"><span style=\"color: #000000; font-family: Open Sans, Arial, sans-serif;\">Mauris vitae dolor nisi. Nunc a vestibulum lorem. Etiam sodales congue tellus non pretium. Aenean non risus diam. Nullam eu porta lectus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque malesuada cursus fermentum. Curabitur tincidunt tempus arcu, ut lacinia nisl. Quisque vitae turpis quis nulla bibendum porta vitae pulvinar ante. Phasellus ac mollis quam, eget mattis elit. Aliquam erat volutpat. Nunc erat enim, fringilla ac velit eget, fermentum cursus ante. Etiam ut sodales ligula, at elementum mauris. Duis interdum leo vitae neque lobortis, vel ultrices est eleifend. Nam tristique placerat dignissim. Vestibulum eu luctus elit.</span></p>', 'for-teacher', '2018-11-20 13:36:58', '2018-11-20 13:36:58', '', '', ''),
(25, 'Web Tour', 'Web Tour', '<p style=\"margin-top: 0px; margin-bottom: 15px; text-align: justify; background-color: #ffffff;\"><span style=\"color: #000000; font-family: Open Sans, Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris malesuada, nunc ut cursus fringilla, leo sapien lobortis nulla, in volutpat libero dui id elit. Sed sagittis turpis at est ornare congue. Nam tristique pellentesque lacus id ultrices. Etiam congue rutrum tortor, commodo semper augue lacinia in. Donec luctus in mauris ac lobortis. Praesent viverra vehicula dapibus. Praesent nisi arcu, imperdiet eu venenatis sed, dictum eget ex. Suspendisse leo orci, fermentum eget neque vel, porttitor gravida eros. Nullam varius mi vel dui ultricies, eu congue nibh aliquet. Vestibulum aliquam luctus magna, vel consectetur sapien hendrerit eu. Vestibulum at elit sapien.</span></p>\r\n<p style=\"margin-top: 0px; margin-bottom: 15px; text-align: justify; background-color: #ffffff;\"><span style=\"color: #000000; font-family: Open Sans, Arial, sans-serif;\">Donec fringilla est non faucibus gravida. Morbi eu odio quis diam viverra auctor. Nulla ornare id velit eget tempus. Ut eros orci, fermentum sit amet pellentesque sed, mollis maximus orci. Nullam maximus vitae neque sit amet iaculis. Nunc quis mattis ante, efficitur venenatis mi. Quisque imperdiet luctus massa, vel gravida nisl tristique quis. Integer justo mi, consectetur quis justo a, tincidunt sollicitudin velit. Nunc vel feugiat enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</span></p>\r\n<p style=\"margin-top: 0px; margin-bottom: 15px; text-align: justify; background-color: #ffffff;\"><span style=\"color: #000000; font-family: Open Sans, Arial, sans-serif;\">Mauris vitae dolor nisi. Nunc a vestibulum lorem. Etiam sodales congue tellus non pretium. Aenean non risus diam. Nullam eu porta lectus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque malesuada cursus fermentum. Curabitur tincidunt tempus arcu, ut lacinia nisl. Quisque vitae turpis quis nulla bibendum porta vitae pulvinar ante. Phasellus ac mollis quam, eget mattis elit. Aliquam erat volutpat. Nunc erat enim, fringilla ac velit eget, fermentum cursus ante. Etiam ut sodales ligula, at elementum mauris. Duis interdum leo vitae neque lobortis, vel ultrices est eleifend. Nam tristique placerat dignissim. Vestibulum eu luctus elit.</span></p>', 'web-tour', '2018-11-20 13:40:40', '2018-11-20 13:40:40', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `question_name` text COLLATE utf8_unicode_ci NOT NULL,
  `question_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` text COLLATE utf8_unicode_ci NOT NULL,
  `country_id` text COLLATE utf8_unicode_ci NOT NULL,
  `grade_id` text COLLATE utf8_unicode_ci NOT NULL,
  `subject_id` text COLLATE utf8_unicode_ci NOT NULL,
  `q_score` int(11) NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `topic_id` text COLLATE utf8_unicode_ci,
  `form_data` longtext COLLATE utf8_unicode_ci,
  `qWrong_feedback` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question_name`, `question_desc`, `category_id`, `country_id`, `grade_id`, `subject_id`, `q_score`, `status`, `topic_id`, `form_data`, `qWrong_feedback`) VALUES
(238, 'Count the Chickens. How many do you see?', '', '44', '251', '1', '3', 10, '', '71', 'a:8:{s:8:\"question\";s:40:\"Count the Chickens. How many do you see?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:11:\"Well Done! \";s:15:\"qWrong_feedback\";s:221:\"<p>There is only <strong>1</strong> chicken in this question. Please try the next question.</p>\r\n<p><img src=\"http://www.applekitch.com/blog/wp-content/uploads/2018/12/1-chicken.png\" alt=\"\" width=\"350\" height=\"239\" /></p>\";s:3:\"img\";s:51:\"http://www.applekitch.com/uploads/images/farm11.png\";s:8:\"option_1\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:11:\"ans_textbox\";s:1:\"1\";}', '<p>There is only <strong>1</strong> chicken in this question. Please try the next question.</p>\r\n<p><img src=\"http://www.applekitch.com/blog/wp-content/uploads/2018/12/1-chicken.png\" alt=\"\" width=\"350\" height=\"239\" /></p>'),
(239, 'Count the Cows. How many Cows are there?', '', '44', '251', '1', '3', 10, '', '71', 'a:9:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:40:\"Count the Cows. How many Cows are there?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:6:\"Super!\";s:15:\"qWrong_feedback\";s:41:\"<p>There are only 2 cows shown.&nbsp;</p>\";s:11:\"ans_textbox\";s:1:\"2\";s:8:\"option_1\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:3:\"img\";s:52:\"http://www.applekitch.com/uploads/images/2_Cows1.PNG\";}', '<p>There are only 2 cows shown.&nbsp;</p>'),
(240, 'Count the Ducks. How many Ducks can you see?', '', '44', '251', '1', '3', 10, '', '71', 'a:9:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:44:\"Count the Ducks. How many Ducks can you see?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:22:\"You are really smart! \";s:15:\"qWrong_feedback\";s:64:\"<p>There are only 3 Ducks being shown in this picture.&nbsp;</p>\";s:11:\"ans_textbox\";s:1:\"3\";s:8:\"option_1\";a:3:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"1\";}s:3:\"img\";s:56:\"http://www.applekitch.com/uploads/images/3_Ducklins1.PNG\";}', '<p>There are only 3 Ducks being shown in this picture.&nbsp;</p>'),
(241, 'How many Horses can you see?', '', '44', '251', '1', '3', 10, '', '71', 'a:9:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:28:\"How many Horses can you see?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:18:\"You\'re very smart!\";s:15:\"qWrong_feedback\";s:44:\"<p>There are 3 Horses being shown.&nbsp;</p>\";s:11:\"ans_textbox\";s:1:\"3\";s:8:\"option_1\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:3:\"img\";s:54:\"http://www.applekitch.com/uploads/images/3_Horses1.PNG\";}', '<p>There are 3 Horses being shown.&nbsp;</p>'),
(242, 'How many Pigs can you see?', '', '44', '251', '1', '3', 10, '', '71', 'a:9:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:26:\"How many Pigs can you see?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Well Done\";s:15:\"qWrong_feedback\";s:51:\"<p>There are only 2 Pigs in this picture.&nbsp;</p>\";s:11:\"ans_textbox\";s:1:\"2\";s:8:\"option_1\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:3:\"img\";s:52:\"http://www.applekitch.com/uploads/images/2_Pigs1.PNG\";}', '<p>There are only 2 Pigs in this picture.&nbsp;</p>'),
(243, 'Count the  Farm Houses. How many do you see?', '', '44', '251', '1', '3', 10, '', '71', 'a:9:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:44:\"Count the  Farm Houses. How many do you see?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:10:\"Excellent!\";s:15:\"qWrong_feedback\";s:56:\"<p>There is only 1 Farm House in this picture.&nbsp;</p>\";s:11:\"ans_textbox\";s:1:\"1\";s:8:\"option_1\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:3:\"img\";s:53:\"http://www.applekitch.com/uploads/images/1_Farms1.PNG\";}', '<p>There is only 1 Farm House in this picture.&nbsp;</p>'),
(244, 'Count the Pigs. How many Pigs can you see?', '', '44', '251', '1', '3', 10, '', '71', 'a:8:{s:8:\"question\";s:42:\"Count the Pigs. How many Pigs can you see?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Well Done\";s:15:\"qWrong_feedback\";s:51:\"<p>There are only 3 Pigs in this picture.&nbsp;</p>\";s:3:\"img\";s:51:\"http://www.applekitch.com/uploads/images/3_Pigs.PNG\";s:8:\"option_1\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:11:\"ans_textbox\";s:1:\"3\";}', '<p>There are only 3 Pigs in this picture.&nbsp;</p>'),
(245, 'How many Ducks can you see in the picture?', '', '44', '251', '1', '3', 10, '', '71', 'a:8:{s:8:\"question\";s:42:\"How many Ducks can you see in the picture?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:22:\"You are really smart! \";s:15:\"qWrong_feedback\";s:64:\"<p>There are only 2 Ducks being shown in this picture.&nbsp;</p>\";s:3:\"img\";s:55:\"http://www.applekitch.com/uploads/images/2_Ducklins.PNG\";s:8:\"option_1\";a:3:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"1\";}s:11:\"ans_textbox\";s:1:\"2\";}', '<p>There are only 2 Ducks being shown in this picture.&nbsp;</p>'),
(246, 'Count the Tractors. How many Tractors can you see?', '', '44', '251', '1', '3', 10, '', '71', 'a:8:{s:8:\"question\";s:50:\"Count the Tractors. How many Tractors can you see?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:11:\"Well done. \";s:15:\"qWrong_feedback\";s:67:\"<p>There are only 3 Tractors being shown in this picture.&nbsp;</p>\";s:3:\"img\";s:55:\"http://www.applekitch.com/uploads/images/3_Tractors.PNG\";s:8:\"option_1\";a:3:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"1\";}s:11:\"ans_textbox\";s:1:\"3\";}', '<p>There are only 3 Tractors being shown in this picture.&nbsp;</p>'),
(247, 'Count the Cows. How many are there?', '', '44', '251', '1', '3', 10, '', '71', 'a:8:{s:8:\"question\";s:35:\"Count the Cows. How many are there?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:6:\"Super!\";s:15:\"qWrong_feedback\";s:40:\"<p>There are only 1 Cow shown.&nbsp;</p>\";s:3:\"img\";s:50:\"http://www.applekitch.com/uploads/images/1_Cow.PNG\";s:8:\"option_1\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:11:\"ans_textbox\";s:1:\"1\";}', '<p>There are only 1 Cow shown.&nbsp;</p>'),
(248, 'Count the Watermelons. How many are there?', '', '44', '251', '1', '3', 10, '', '72', 'a:8:{s:8:\"question\";s:42:\"Count the Watermelons. How many are there?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Great Job\";s:15:\"qWrong_feedback\";s:52:\"<p>There are only 2 Watermelons in this picture.</p>\";s:3:\"img\";s:59:\"http://www.applekitch.com/uploads/images/2_Watermelons1.PNG\";s:8:\"option_1\";a:4:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"0\";}s:11:\"ans_textbox\";s:1:\"2\";}', '<p>There are only 2 Watermelons in this picture.</p>'),
(249, 'Count the Yellow Peppers. How many are there?', '', '44', '251', '1', '3', 10, '', '72', 'a:8:{s:8:\"question\";s:45:\"Count the Yellow Peppers. How many are there?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Great Job\";s:15:\"qWrong_feedback\";s:55:\"<p>There are only 3 Yellow Peppers in this picture.</p>\";s:3:\"img\";s:61:\"http://www.applekitch.com/uploads/images/3_Yellow_Peppers.PNG\";s:8:\"option_1\";a:4:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"0\";}s:11:\"ans_textbox\";s:1:\"3\";}', '<p>There are only 3 Yellow Peppers in this picture.</p>'),
(250, 'Count the Tomatoes. How many are there?', '', '44', '251', '1', '3', 10, '', '72', 'a:8:{s:8:\"question\";s:39:\"Count the Tomatoes. How many are there?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:13:\"Good for you!\";s:15:\"qWrong_feedback\";s:49:\"<p>There are only 2 Tomatoes in this picture.</p>\";s:3:\"img\";s:55:\"http://www.applekitch.com/uploads/images/2_Tomaotes.PNG\";s:8:\"option_1\";a:4:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"0\";}s:11:\"ans_textbox\";s:1:\"2\";}', '<p>There are only 2 Tomatoes in this picture.</p>'),
(251, 'How many pieces of Corn can you see?', '', '44', '251', '1', '3', 10, '', '72', 'a:9:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:36:\"How many pieces of Corn can you see?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:14:\"You’re Smart\";s:15:\"qWrong_feedback\";s:37:\"<p>There is only 1 piece of Corn.</p>\";s:11:\"ans_textbox\";s:1:\"1\";s:8:\"option_1\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:3:\"img\";s:52:\"http://www.applekitch.com/uploads/images/1_corn1.PNG\";}', '<p>There is only 1 piece of Corn.</p>'),
(252, 'Count the Strawberries. How many Strawberries are there?', '', '44', '251', '1', '3', 10, '', '72', 'a:8:{s:8:\"question\";s:56:\"Count the Strawberries. How many Strawberries are there?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:22:\"You did that very well\";s:15:\"qWrong_feedback\";s:54:\"<p>There are 3 Strawberries in this picture.&nbsp;</p>\";s:3:\"img\";s:59:\"http://www.applekitch.com/uploads/images/3_Strawberries.PNG\";s:8:\"option_1\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:11:\"ans_textbox\";s:1:\"3\";}', '<p>There are 3 Strawberries in this picture.&nbsp;</p>'),
(253, 'Count the pair of Cherries. How many are there?', '', '44', '251', '1', '3', 10, '', '72', 'a:9:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:47:\"Count the pair of Cherries. How many are there?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Marvelous\";s:15:\"qWrong_feedback\";s:40:\"<p>There is only 2 pairs of Cherries</p>\";s:11:\"ans_textbox\";s:1:\"2\";s:8:\"option_1\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:3:\"img\";s:64:\"http://www.applekitch.com/uploads/images/2_pair_of_cherries1.PNG\";}', '<p>There is only 2 pairs of Cherries</p>'),
(254, 'How many Apples are there?', '', '44', '251', '1', '3', 10, '', '72', 'a:8:{s:8:\"question\";s:26:\"How many Apples are there?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:31:\"Now you’ve got it figured out\";s:15:\"qWrong_feedback\";s:45:\"<p>There is only 1 Apple in this picture.</p>\";s:3:\"img\";s:52:\"http://www.applekitch.com/uploads/images/1_apple.PNG\";s:8:\"option_1\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:11:\"ans_textbox\";s:1:\"1\";}', '<p>There is only 1 Apple in this picture.</p>'),
(255, 'Count the Watermelons. How many are there?', '', '44', '251', '1', '3', 10, '', '72', 'a:8:{s:8:\"question\";s:42:\"Count the Watermelons. How many are there?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Great Job\";s:15:\"qWrong_feedback\";s:51:\"<p>There are only 1 Watermelon in this picture.</p>\";s:3:\"img\";s:57:\"http://www.applekitch.com/uploads/images/1_Watermelon.PNG\";s:8:\"option_1\";a:4:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"0\";}s:11:\"ans_textbox\";s:1:\"1\";}', '<p>There are only 1 Watermelon in this picture.</p>'),
(256, 'How many Apples are there?', '', '44', '251', '1', '3', 10, '', '72', 'a:8:{s:8:\"question\";s:26:\"How many Apples are there?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:10:\"Well Done!\";s:15:\"qWrong_feedback\";s:46:\"<p>There are only 2 Apple in this picture.</p>\";s:3:\"img\";s:53:\"http://www.applekitch.com/uploads/images/2_apples.PNG\";s:8:\"option_1\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:11:\"ans_textbox\";s:1:\"2\";}', '<p>There are only 2 Apple in this picture.</p>'),
(257, 'Count the Bananas. How many Bananas can you see?', '', '44', '251', '1', '3', 10, '', '72', 'a:8:{s:8:\"question\";s:48:\"Count the Bananas. How many Bananas can you see?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:14:\"Good thinking!\";s:15:\"qWrong_feedback\";s:48:\"<p>There are only 3 Bananas in this picture.</p>\";s:3:\"img\";s:54:\"http://www.applekitch.com/uploads/images/3_Bananas.PNG\";s:8:\"option_1\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:11:\"ans_textbox\";s:1:\"3\";}', '<p>There are only 3 Bananas in this picture.</p>'),
(258, 'Count the dots on the Dice. How many dots are there?', '', '45', '251', '1', '3', 10, '', '73', 'a:9:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:52:\"Count the dots on the Dice. How many dots are there?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:10:\"Way to go!\";s:15:\"qWrong_feedback\";s:33:\"<p>The Dice is showing 5 dots</p>\";s:11:\"ans_textbox\";s:1:\"5\";s:8:\"option_1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}s:3:\"img\";s:52:\"http://www.applekitch.com/uploads/images/5-dice1.png\";}', '<p>The Dice is showing 5 dots</p>'),
(259, 'How many dots are showing on the Dice?', '', '45', '251', '1', '3', 10, '', '73', 'a:8:{s:8:\"question\";s:38:\"How many dots are showing on the Dice?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:10:\"Way to go!\";s:15:\"qWrong_feedback\";s:33:\"<p>The Dice is showing 2 dots</p>\";s:3:\"img\";s:51:\"http://www.applekitch.com/uploads/images/2-dice.png\";s:8:\"option_1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}s:11:\"ans_textbox\";s:1:\"2\";}', '<p>The Dice is showing 2 dots</p>'),
(260, 'How many dots can be seen on the Dice?', '', '45', '251', '1', '3', 10, '', '73', 'a:8:{s:8:\"question\";s:38:\"How many dots can be seen on the Dice?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:26:\"That’s the way to do it!\";s:15:\"qWrong_feedback\";s:33:\"<p>The Dice is showing 4 dots</p>\";s:3:\"img\";s:51:\"http://www.applekitch.com/uploads/images/4-dice.png\";s:8:\"option_1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}s:11:\"ans_textbox\";s:1:\"4\";}', '<p>The Dice is showing 4 dots</p>'),
(277, 'How many pears are there?', '', '45', '251', '1', '3', 10, '', '88', 'a:8:{s:8:\"question\";s:25:\"How many pears are there?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:13:\"That\'s Great!\";s:15:\"qWrong_feedback\";s:46:\"<p>There are only 4 Pears in this picture.</p>\";s:3:\"img\";s:52:\"http://www.applekitch.com/uploads/images/4_Pears.PNG\";s:8:\"option_1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}s:11:\"ans_textbox\";s:1:\"4\";}', '<p>There are only 4 Pears in this picture.</p>'),
(278, 'Count the Carrots. How many carrots are there?', '', '45', '251', '1', '3', 10, '', '88', 'a:8:{s:8:\"question\";s:46:\"Count the Carrots. How many carrots are there?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:10:\"Excellent!\";s:15:\"qWrong_feedback\";s:54:\"<p>There are only 5 Carrots in this picture.&nbsp;</p>\";s:3:\"img\";s:54:\"http://www.applekitch.com/uploads/images/5_Carrots.PNG\";s:8:\"option_1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}s:11:\"ans_textbox\";s:1:\"5\";}', '<p>There are only 5 Carrots in this picture.&nbsp;</p>'),
(279, 'Count the Lemons. How many lemons are there?', '', '45', '251', '1', '3', 10, '', '88', 'a:8:{s:8:\"question\";s:44:\"Count the Lemons. How many lemons are there?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:26:\"That’s great! Keep it up\";s:15:\"qWrong_feedback\";s:53:\"<p>There are only 3 Lemons in this picture.&nbsp;</p>\";s:3:\"img\";s:53:\"http://www.applekitch.com/uploads/images/3_Lemons.PNG\";s:8:\"option_1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}s:11:\"ans_textbox\";s:1:\"3\";}', '<p>There are only 3 Lemons in this picture.&nbsp;</p>'),
(280, 'Count the Pineapples. How many Pineapples are there?', '', '45', '251', '1', '3', 10, '', '88', 'a:8:{s:8:\"question\";s:52:\"Count the Pineapples. How many Pineapples are there?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:26:\"That’s great! Keep it up\";s:15:\"qWrong_feedback\";s:63:\"<p>There are only 5 Pineapples&nbsp; in this picture.&nbsp;</p>\";s:3:\"img\";s:57:\"http://www.applekitch.com/uploads/images/5_Pineapples.PNG\";s:8:\"option_1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}s:11:\"ans_textbox\";s:1:\"5\";}', '<p>There are only 5 Pineapples&nbsp; in this picture.&nbsp;</p>'),
(281, 'Count the pea pods. How many pea pods are there?', '', '45', '251', '1', '3', 10, '', '88', 'a:8:{s:8:\"question\";s:48:\"Count the pea pods. How many pea pods are there?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:26:\"That’s great! Keep it up\";s:15:\"qWrong_feedback\";s:60:\"<p>There are only 2 peapods&nbsp; in this picture.&nbsp;</p>\";s:3:\"img\";s:51:\"http://www.applekitch.com/uploads/images/2_Peas.PNG\";s:8:\"option_1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}s:11:\"ans_textbox\";s:1:\"2\";}', '<p>There are only 2 peapods&nbsp; in this picture.&nbsp;</p>'),
(282, 'How many fingers are being shown?', '', '46', '251', '1', '3', 10, '', '89', 'a:8:{s:8:\"question\";s:33:\"How many fingers are being shown?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:26:\"That’s great! Keep it up\";s:15:\"qWrong_feedback\";s:60:\"<p>There are only 7 Fingers&nbsp; in this picture.&nbsp;</p>\";s:3:\"img\";s:54:\"http://www.applekitch.com/uploads/images/7_Fingers.PNG\";s:8:\"option_1\";a:10:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";i:8;s:1:\"9\";i:9;s:2:\"10\";}s:11:\"ans_textbox\";s:1:\"7\";}', '<p>There are only 7 Fingers&nbsp; in this picture.&nbsp;</p>'),
(283, 'Count the fingers being shown. How many can you see?', '', '46', '251', '1', '3', 10, '', '89', 'a:8:{s:8:\"question\";s:52:\"Count the fingers being shown. How many can you see?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:26:\"That’s great! Keep it up\";s:15:\"qWrong_feedback\";s:60:\"<p>There are only 6 Fingers&nbsp; in this picture.&nbsp;</p>\";s:3:\"img\";s:54:\"http://www.applekitch.com/uploads/images/6_Fingers.PNG\";s:8:\"option_1\";a:10:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";i:8;s:1:\"9\";i:9;s:2:\"10\";}s:11:\"ans_textbox\";s:1:\"6\";}', '<p>There are only 6 Fingers&nbsp; in this picture.&nbsp;</p>'),
(284, 'Count each finger. How many fingers are there?', '', '46', '251', '1', '3', 10, '', '89', 'a:8:{s:8:\"question\";s:46:\"Count each finger. How many fingers are there?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:26:\"That’s great! Keep it up\";s:15:\"qWrong_feedback\";s:61:\"<p>There are only 10 Fingers&nbsp; in this picture.&nbsp;</p>\";s:3:\"img\";s:55:\"http://www.applekitch.com/uploads/images/10_Fingers.PNG\";s:8:\"option_1\";a:10:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";i:8;s:1:\"9\";i:9;s:2:\"10\";}s:11:\"ans_textbox\";s:2:\"10\";}', '<p>There are only 10 Fingers&nbsp; in this picture.&nbsp;</p>'),
(285, 'Count each finger. How many fingers can you see?', '', '46', '251', '1', '3', 10, '', '89', 'a:8:{s:8:\"question\";s:48:\"Count each finger. How many fingers can you see?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:26:\"That’s great! Keep it up\";s:15:\"qWrong_feedback\";s:60:\"<p>There are only 4 Fingers&nbsp; in this picture.&nbsp;</p>\";s:3:\"img\";s:54:\"http://www.applekitch.com/uploads/images/4_Fingers.PNG\";s:8:\"option_1\";a:10:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";i:8;s:1:\"9\";i:9;s:2:\"10\";}s:11:\"ans_textbox\";s:1:\"4\";}', '<p>There are only 4 Fingers&nbsp; in this picture.&nbsp;</p>'),
(286, 'How many fingers can you see?', '', '46', '251', '1', '3', 10, '', '89', 'a:8:{s:8:\"question\";s:29:\"How many fingers can you see?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:26:\"That’s great! Keep it up\";s:15:\"qWrong_feedback\";s:60:\"<p>There are only 8 Fingers&nbsp; in this picture.&nbsp;</p>\";s:3:\"img\";s:54:\"http://www.applekitch.com/uploads/images/8_Fingers.PNG\";s:8:\"option_1\";a:10:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";i:8;s:1:\"9\";i:9;s:2:\"10\";}s:11:\"ans_textbox\";s:1:\"8\";}', '<p>There are only 8 Fingers&nbsp; in this picture.&nbsp;</p>'),
(287, 'How many blue triangles can you see?', '', '46', '251', '1', '3', 10, '', '90', 'a:8:{s:8:\"question\";s:36:\"How many blue triangles can you see?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:26:\"That’s great! Keep it up\";s:15:\"qWrong_feedback\";s:56:\"<p>There are only 8 Triangles in this picture.&nbsp;</p>\";s:3:\"img\";s:56:\"http://www.applekitch.com/uploads/images/8_Triangles.PNG\";s:8:\"option_1\";a:10:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";i:8;s:1:\"9\";i:9;s:2:\"10\";}s:11:\"ans_textbox\";s:1:\"8\";}', '<p>There are only 8 Triangles in this picture.&nbsp;</p>'),
(288, 'Count the triangles. How many are there?', '', '46', '251', '1', '3', 10, '', '90', 'a:8:{s:8:\"question\";s:40:\"Count the triangles. How many are there?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:26:\"That’s great! Keep it up\";s:15:\"qWrong_feedback\";s:57:\"<p>There are only 10 Triangles in this picture.&nbsp;</p>\";s:3:\"img\";s:57:\"http://www.applekitch.com/uploads/images/10_Triangles.PNG\";s:8:\"option_1\";a:10:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";i:8;s:1:\"9\";i:9;s:2:\"10\";}s:11:\"ans_textbox\";s:2:\"10\";}', '<p>There are only 10 Triangles in this picture.&nbsp;</p>'),
(289, 'Count the Circles. How many Circles are there?', '', '46', '251', '1', '3', 10, '', '90', 'a:8:{s:8:\"question\";s:46:\"Count the Circles. How many Circles are there?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:10:\"Excellent!\";s:15:\"qWrong_feedback\";s:54:\"<p>There are only 7 circles in this picture.&nbsp;</p>\";s:3:\"img\";s:54:\"http://www.applekitch.com/uploads/images/7_Circles.PNG\";s:8:\"option_1\";a:10:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";i:8;s:1:\"9\";i:9;s:2:\"10\";}s:11:\"ans_textbox\";s:1:\"7\";}', '<p>There are only 7 circles in this picture.&nbsp;</p>'),
(290, 'Count the green circles. How many green circles can you see?', '', '46', '251', '1', '3', 10, '', '90', 'a:8:{s:8:\"question\";s:60:\"Count the green circles. How many green circles can you see?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:10:\"Excellent!\";s:15:\"qWrong_feedback\";s:54:\"<p>There are only 3 circles in this picture.&nbsp;</p>\";s:3:\"img\";s:54:\"http://www.applekitch.com/uploads/images/3_Circles.PNG\";s:8:\"option_1\";a:10:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";i:8;s:1:\"9\";i:9;s:2:\"10\";}s:11:\"ans_textbox\";s:1:\"3\";}', '<p>There are only 3 circles in this picture.&nbsp;</p>'),
(291, 'How many blue triangles can you see?', '', '46', '251', '1', '3', 10, '', '90', 'a:8:{s:8:\"question\";s:36:\"How many blue triangles can you see?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:26:\"That’s great! Keep it up\";s:15:\"qWrong_feedback\";s:56:\"<p>There are only 5 Triangles in this picture.&nbsp;</p>\";s:3:\"img\";s:56:\"http://www.applekitch.com/uploads/images/5_Triangles.PNG\";s:8:\"option_1\";a:10:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";i:8;s:1:\"9\";i:9;s:2:\"10\";}s:11:\"ans_textbox\";s:1:\"5\";}', '<p>There are only 5 Triangles in this picture.&nbsp;</p>'),
(293, 'Count the stars on the frame. How many stars are there?', '', '47', '251', '1', '3', 10, '', '91', 'a:9:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:55:\"Count the stars on the frame. How many stars are there?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:14:\"You’re Smart\";s:15:\"qWrong_feedback\";s:51:\"<p>There are only 15 stars on this frame.&nbsp;</p>\";s:11:\"ans_textbox\";s:2:\"15\";s:8:\"option_1\";a:4:{i:0;s:1:\"5\";i:1;s:2:\"10\";i:2;s:2:\"15\";i:3;s:1:\"3\";}s:3:\"img\";s:63:\"http://www.applekitch.com/uploads/images/15_Stars_on_Frame1.PNG\";}', '<p>There are only 15 stars on this frame.&nbsp;</p>'),
(294, 'How many stars are on the frame?', '', '47', '251', '1', '3', 10, '', '91', 'a:8:{s:8:\"question\";s:32:\"How many stars are on the frame?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:14:\"You’re Smart\";s:15:\"qWrong_feedback\";s:51:\"<p>There are only 12 stars on this frame.&nbsp;</p>\";s:3:\"img\";s:62:\"http://www.applekitch.com/uploads/images/12_Stars_on_Frame.PNG\";s:8:\"option_1\";a:4:{i:0;s:2:\"12\";i:1;s:1:\"8\";i:2;s:2:\"10\";i:3;s:2:\"16\";}s:11:\"ans_textbox\";s:2:\"12\";}', '<p>There are only 12 stars on this frame.&nbsp;</p>'),
(295, 'How many dots are on the frame?', '', '47', '251', '1', '3', 10, '', '91', 'a:8:{s:8:\"question\";s:31:\"How many dots are on the frame?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:14:\"Good thinking!\";s:15:\"qWrong_feedback\";s:50:\"<p>There are only 13 dots on this frame.&nbsp;</p>\";s:3:\"img\";s:53:\"http://www.applekitch.com/uploads/images/13_Dots2.PNG\";s:8:\"option_1\";a:4:{i:0;s:1:\"3\";i:1;s:2:\"10\";i:2;s:2:\"13\";i:3;s:2:\"15\";}s:11:\"ans_textbox\";s:2:\"13\";}', '<p>There are only 13 dots on this frame.&nbsp;</p>'),
(296, 'Count the dots on the frame. How many do you see?', '', '47', '251', '1', '3', 10, '', '91', 'a:8:{s:8:\"question\";s:49:\"Count the dots on the frame. How many do you see?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:29:\"You really are going to town!\";s:15:\"qWrong_feedback\";s:50:\"<p>There are only 11 dots on this frame.&nbsp;</p>\";s:3:\"img\";s:52:\"http://www.applekitch.com/uploads/images/11_Dots.PNG\";s:8:\"option_1\";a:5:{i:0;s:2:\"11\";i:1;s:2:\"10\";i:2;s:2:\"12\";i:3;s:2:\"13\";i:4;s:2:\"15\";}s:11:\"ans_textbox\";s:2:\"11\";}', '<p>There are only 11 dots on this frame.&nbsp;</p>'),
(297, 'Count the dots. How many dots are on the frame?', '', '47', '251', '1', '3', 10, '', '91', 'a:8:{s:8:\"question\";s:47:\"Count the dots. How many dots are on the frame?\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:32:\"That’s the right way to do it!\";s:15:\"qWrong_feedback\";s:49:\"<p>There are only 9 dots on this frame.&nbsp;</p>\";s:3:\"img\";s:51:\"http://www.applekitch.com/uploads/images/9_Dots.PNG\";s:8:\"option_1\";a:4:{i:0;s:1:\"9\";i:1;s:1:\"4\";i:2;s:2:\"10\";i:3;s:1:\"8\";}s:11:\"ans_textbox\";s:1:\"9\";}', '<p>There are only 9 dots on this frame.&nbsp;</p>'),
(299, 'How many hearts you can see?', '', '47', '251', '1', '3', 10, '', '75', 'a:8:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:28:\"How many hearts you can see?\";s:15:\"question_option\";s:1:\"1\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:21:\"Well, look at you go!\";s:15:\"qWrong_feedback\";s:47:\"<p>There are only 15 hearts in this picture</p>\";s:11:\"ans_textbox\";s:2:\"15\";s:3:\"img\";s:55:\"http://www.applekitch.com/uploads/images/15_hearts3.PNG\";}', '<p>There are only 15 hearts in this picture</p>'),
(300, 'Count the stars. How many stars are there?', '', '47', '251', '1', '3', 10, '', '75', 'a:7:{s:8:\"question\";s:42:\"Count the stars. How many stars are there?\";s:15:\"question_option\";s:1:\"1\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:21:\"Well, look at you go!\";s:15:\"qWrong_feedback\";s:47:\"<p>There are only 20 Hearts in this picture</p>\";s:3:\"img\";s:53:\"http://www.applekitch.com/uploads/images/13_stars.PNG\";s:11:\"ans_textbox\";s:2:\"13\";}', '<p>There are only 20 Hearts in this picture</p>'),
(301, 'How many pea pods are there?', '', '58', '251', '1', '3', 10, '', '92', 'a:7:{s:8:\"question\";s:28:\"How many pea pods are there?\";s:15:\"question_option\";s:1:\"1\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:10:\"Well done!\";s:15:\"qWrong_feedback\";s:32:\"<p>There are only 2 pea pods</p>\";s:3:\"img\";s:52:\"http://www.applekitch.com/uploads/images/2_Peas2.PNG\";s:11:\"ans_textbox\";s:1:\"2\";}', '<p>There are only 2 pea pods</p>'),
(302, 'Select an Image. Which image shows an apple?', '', '58', '251', '1', '3', 10, '', '92', 'a:7:{s:8:\"question\";s:44:\"Select an Image. Which image shows an apple?\";s:15:\"question_option\";s:1:\"2\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Well done\";s:15:\"qWrong_feedback\";s:24:\"<p>This is incorrect</p>\";s:6:\"answer\";s:12:\"1_apple1.PNG\";s:9:\"img_array\";s:224:\"http://www.applekitch.com/uploads/images/1_Banana.PNG|http://www.applekitch.com/uploads/images/1_apple1.PNG|http://www.applekitch.com/uploads/images/1_Strawberry.PNG|http://www.applekitch.com/uploads/images/1_Watermelon1.PNG\";}', '<p>This is incorrect</p>'),
(303, 'Select an Image 3 Images. Which image shows a crab?', '', '58', '251', '1', '3', 10, '', '92', 'a:7:{s:8:\"question\";s:51:\"Select an Image 3 Images. Which image shows a crab?\";s:15:\"question_option\";s:1:\"2\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Well done\";s:15:\"qWrong_feedback\";s:24:\"<p>This is incorrect</p>\";s:6:\"answer\";s:8:\"sea2.png\";s:9:\"img_array\";s:149:\"http://www.applekitch.com/uploads/images/sea1.png|http://www.applekitch.com/uploads/images/sea2.png|http://www.applekitch.com/uploads/images/sea3.png\";}', '<p>This is incorrect</p>'),
(304, 'Select an Image 2 Images. Which image shows a duck?', '', '58', '251', '1', '3', 10, '', '92', 'a:7:{s:8:\"question\";s:51:\"Select an Image 2 Images. Which image shows a duck?\";s:15:\"question_option\";s:1:\"2\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Well done\";s:15:\"qWrong_feedback\";s:24:\"<p>This is incorrect</p>\";s:6:\"answer\";s:13:\"1_Ducklin.PNG\";s:9:\"img_array\";s:107:\"http://www.applekitch.com/uploads/images/1_Horse.PNG|http://www.applekitch.com/uploads/images/1_Ducklin.PNG\";}', '<p>This is incorrect</p>'),
(305, 'Only Clickable Text - Which number is biggest?', '', '58', '251', '1', '3', 10, '', '92', 'a:8:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:46:\"Only Clickable Text - Which number is biggest?\";s:15:\"question_option\";s:1:\"3\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Well done\";s:15:\"qWrong_feedback\";s:26:\"<p>This is not working</p>\";s:8:\"option_1\";a:4:{i:0;s:1:\"5\";i:1;s:2:\"10\";i:2;s:2:\"15\";i:3;s:2:\"20\";}s:11:\"ans_textbox\";s:2:\"20\";}', '<p>This is not working</p>'),
(307, 'Question with Arranging Options: Order these numbers from smallest to biggest', '', '58', '251', '1', '3', 10, '', '92', 'a:7:{s:8:\"question\";s:77:\"Question with Arranging Options: Order these numbers from smallest to biggest\";s:15:\"question_option\";s:1:\"5\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Well Done\";s:15:\"qWrong_feedback\";s:24:\"<p>That is incorrect</p>\";s:14:\"option_arrange\";a:4:{i:0;s:1:\"5\";i:1;s:2:\"10\";i:2;s:2:\"15\";i:3;s:2:\"20\";}s:16:\"option_dearrange\";a:4:{i:0;s:2:\"20\";i:1;s:2:\"10\";i:2;s:2:\"15\";i:3;s:1:\"5\";}}', '<p>That is incorrect</p>'),
(308, 'Clickable Text: which number is the smallest', '', '58', '251', '1', '3', 10, '', '92', 'a:8:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:44:\"Clickable Text: which number is the smallest\";s:15:\"question_option\";s:1:\"6\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Well done\";s:15:\"qWrong_feedback\";s:12:\"<p>Wrong</p>\";s:8:\"option_1\";a:4:{i:0;s:1:\"5\";i:1;s:2:\"10\";i:2;s:2:\"15\";i:3;s:2:\"20\";}s:11:\"ans_textbox\";s:1:\"5\";}', '<p>Wrong</p>'),
(309, 'Select Multiple Images: Which images show 3', '', '58', '251', '1', '3', 10, '', '92', 'a:8:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:43:\"Select Multiple Images: Which images show 3\";s:15:\"question_option\";s:1:\"8\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Well done\";s:15:\"qWrong_feedback\";s:16:\"<p>incorrect</p>\";s:6:\"answer\";a:2:{i:0;s:10:\"3_Peas.PNG\";i:1;s:13:\"3_Lemons1.PNG\";}s:9:\"img_array\";s:164:\"http://www.applekitch.com/uploads/images/3_Peas.PNG|http://www.applekitch.com/uploads/images/2_Pineapples.PNG|http://www.applekitch.com/uploads/images/3_Lemons1.PNG\";}', '<p>incorrect</p>'),
(310, 'Only Options: Which number is the highest?', '', '58', '251', '1', '3', 10, '', '92', 'a:7:{s:8:\"question\";s:42:\"Only Options: Which number is the highest?\";s:15:\"question_option\";s:1:\"9\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Well done\";s:15:\"qWrong_feedback\";s:9:\"<p>no</p>\";s:8:\"option_1\";a:3:{i:0;s:2:\"10\";i:1;s:2:\"20\";i:2;s:2:\"30\";}s:11:\"ans_textbox\";s:2:\"30\";}', '<p>no</p>'),
(311, 'Text Box: What is 1+1 =', '', '58', '251', '1', '3', 10, '', '92', 'a:7:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:23:\"Text Box: What is 1+1 =\";s:15:\"question_option\";s:2:\"11\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:3:\"Yes\";s:15:\"qWrong_feedback\";s:9:\"<p>No</p>\";s:11:\"ans_textbox\";s:1:\"2\";}', '<p>No</p>'),
(312, 'SVG Image with Option - Put two strawberries in the box', '', '58', '251', '1', '3', 10, '', '93', 'a:8:{s:8:\"question\";s:55:\"SVG Image with Option - Put two strawberries in the box\";s:15:\"question_option\";s:2:\"12\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"well done\";s:15:\"qWrong_feedback\";s:16:\"<p>incorrect</p>\";s:7:\"num_box\";s:1:\"5\";s:11:\"ans_textbox\";s:1:\"2\";s:3:\"img\";s:58:\"http://www.applekitch.com/uploads/images/1_Strawberry2.PNG\";}', '<p>incorrect</p>'),
(313, 'SVG Image with Option - Put 6 Dinosaurs in the box', '', '58', '251', '1', '3', 10, '', '93', 'a:8:{s:8:\"question\";s:50:\"SVG Image with Option - Put 6 Dinosaurs in the box\";s:15:\"question_option\";s:2:\"12\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"well done\";s:15:\"qWrong_feedback\";s:16:\"<p>incorrect</p>\";s:7:\"num_box\";s:2:\"10\";s:11:\"ans_textbox\";s:1:\"6\";s:3:\"img\";s:51:\"http://www.applekitch.com/uploads/images/Dino_2.png\";}', '<p>incorrect</p>'),
(314, 'Question with Text Box and Options - which number is the biggest', '', '58', '251', '1', '3', 10, '', '93', 'a:8:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:64:\"Question with Text Box and Options - which number is the biggest\";s:15:\"question_option\";s:2:\"13\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"well done\";s:15:\"qWrong_feedback\";s:10:\"<p>nah</p>\";s:8:\"option_1\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:11:\"ans_textbox\";s:1:\"3\";}', '<p>nah</p>'),
(315, 'Question with Check Box: Tick which number represents TWO.', '', '58', '251', '1', '3', 10, '', '93', 'a:8:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:58:\"Question with Check Box: Tick which number represents TWO.\";s:15:\"question_option\";s:2:\"14\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Well doen\";s:15:\"qWrong_feedback\";s:20:\"<p>this is wrong</p>\";s:11:\"ans_textbox\";s:1:\"2\";s:8:\"option_1\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}}', '<p>this is wrong</p>'),
(316, 'Clickable Images - which one shows 2', '', '58', '251', '1', '3', 10, '', '93', 'a:8:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:36:\"Clickable Images - which one shows 2\";s:15:\"question_option\";s:2:\"15\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Well Done\";s:15:\"qWrong_feedback\";s:16:\"<p>Incorrect</p>\";s:6:\"answer\";s:13:\"2_Circles.PNG\";s:9:\"img_array\";s:165:\"http://www.applekitch.com/uploads/images/2_Circles.PNG|http://www.applekitch.com/uploads/images/3_Circles1.PNG|http://www.applekitch.com/uploads/images/4_Circles.PNG\";}', '<p>Incorrect</p>'),
(317, 'Question with Double Text Boxes... What sky is ____ colour and the grass is _____ colour.', '', '58', '251', '1', '3', 10, '', '93', 'a:8:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:89:\"Question with Double Text Boxes... What sky is ____ colour and the grass is _____ colour.\";s:15:\"question_option\";s:2:\"18\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Well Done\";s:15:\"qWrong_feedback\";s:16:\"<p>Incorrect</p>\";s:12:\"ans_textbox1\";s:4:\"blue\";s:12:\"ans_textbox2\";s:5:\"green\";}', '<p>Incorrect</p>'),
(318, 'Image and Clickable Text: How many starts on on this frame', '', '58', '251', '1', '3', 10, '', '93', 'a:9:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:58:\"Image and Clickable Text: How many starts on on this frame\";s:15:\"question_option\";s:2:\"20\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"well done\";s:15:\"qWrong_feedback\";s:16:\"<p>Incorrect</p>\";s:11:\"ans_textbox\";s:1:\"5\";s:8:\"option_1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}s:3:\"img\";s:62:\"http://www.applekitch.com/uploads/images/5_Stars_on_Frame1.PNG\";}', '<p>Incorrect</p>'),
(319, 'Image and Options: How many carrotts', '', '58', '251', '1', '3', 10, '', '93', 'a:9:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:36:\"Image and Options: How many carrotts\";s:15:\"question_option\";s:2:\"26\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Well doen\";s:15:\"qWrong_feedback\";s:16:\"<p>incorrect</p>\";s:11:\"ans_textbox\";s:1:\"2\";s:8:\"option_1\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:3:\"img\";s:55:\"http://www.applekitch.com/uploads/images/2_Carrots1.PNG\";}', '<p>incorrect</p>'),
(320, 'Question with Put Images', '', '58', '251', '1', '3', 10, '', '94', 'a:8:{s:8:\"question\";s:24:\"Question with Put Images\";s:15:\"question_option\";s:2:\"27\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Well Done\";s:15:\"qWrong_feedback\";s:16:\"<p>Incorrect</p>\";s:11:\"put_num_box\";s:1:\"4\";s:16:\"question_textbox\";s:5888:\"1 Circles.PNG|data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFYAAABkCAYAAAAc5MdRAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAQSSURBVHhe7ZxLaxRBFEb9iWahP8DHLxAEFy6zFgJm5WMlRFE3WWgWEVyJ6CJGE/CBQQyokIgSkZCQlDk9jDjxpqu6qm4/pu6BDwlOqqsPTU/1rds55QwVTKwSJlYJE6uEiVXCxCphYpUwsUqYWCVMrBImVgkTq4SJVaJXYvcPdt3Gzxfu9daSe/51wS1/nneLH2fdwttL7ubaOTe3crr6l58XN2bdk6P/53N8nt/j9/tC52J39raOxDyuBM6tzFTy4jNTjcN4jNslnYj9vrvpXn574O6/vyLIyRfG5zgcr21aFft7/4d7unlDlKAdjsvx26IVsYeHB0f3wrvu+qsz4km3lfnVs9U8mI826mJXtx79/eLpS26tna/mpYma2F972+7hh6viifUlzI95aqAidnPnzdFVcUE8mb7l9vrFar65yS52fXtZPIG+h3nnJKvYZ1/uiJMeSph/LrKJXfp0TZzs0MJ55CCL2KFfqceT48pNFjvUe6ovqffcJLF8m0qTmpakrBaixbL+G8qSKjYsxWLXudFi+774zxXOM4YosTwOSpOY1sQ8/jYWSwGjb8/+2qG20LRw01gs1SHp4NMezrsJjcRSz+y69NdVKDk2qec2EttVkbov4fxDCRbL9oZ0sNISus0TLJa9I+lApQUPIQSL1d74G0rwEEKQWLaSpYOUmpCt9SCx7NNLByg1+PARJHbUTCEfpMTgw4dXLG076R0q05YZbzuTVyw9UfLgZQcvdXjF0nAmDVx68FKHVyzdfNLApQcvdXjF0iopDVx6aDGtwyuWPlRp4NLjWxl4xdLkKw1cevBSh1dsaUXt0OClDq9YaVDLKHXYFRuZ5CvW7rFyku+xVieQw2qpDq9Y1mvSwKWH9X0dXrH25CUn+cnLagVykmsFVt2Sk1zdsnqslAz1WLCVwWSy7CCA7XlNJtuel+3STibbLi1YX8EoWfsKwDphRsneCWO9W6Nk790C6zZU6DaEkvtjOW+1/liwju4wGost8R0Ezlf9HQSwt2b8RIkFe8+rnmixvLHHm3vSZKYlvHnZ+puJYO/SnkySWLC3v2WSxYL9vYL/ySIW7C9sTJJNLAz9ys1xpY7JKhaGes9NvaceJ7tY4Nt0KEsxllQp3/4noSIWWP/1/SGC+cWuU32oiR3D4yDv+0sn1lV49o95TG2CuliggEF1iFfTpRNtK5T+mEfTgkoMrYgdQz2zq2I5x21ST02lVbFj2N5g70h7g/Leu8vVcUK3U3LSidh/YSuZffpRU4j9jW4VaNuhJ4qGM7r5aJWkD5Um33FxnX/5GYG0mPI5Ps/v+dp+2qRXYqcJE6uEiVXCxCphYpUwsUqYWCVMrBImVgkTq4SJVcLEKmFilTCxSphYJUysCs79ASJh/maqtT7xAAAAAElFTkSuQmCC]1 Triangles.PNG|data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJsAAACaCAYAAAC+PTopAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAweSURBVHhe7Z37TxXXFsf7H12PR1FERNCkSdMfGgHxhVwURfEiakxMG5s2pk0fabwCBeujWuqD6tVy8VV84qtEo5dISjRUrTbU0JZoaK0tsZa5ftd20wNsYM45M3tm71mf5JsgzJnZe62PJsLi7JcchtEEy8Zog2VjtMGyMdpg2RhtsGyMNlg2RhssG6MNlo3RBsvGaINlS4KzV247567eefEnJllYtiQoXLeXwqQGy+aShubrzj/m/JuCj5nkYdlc8LDviZO54ONB2fAxPsckB8vmgne3nSXJMhZ9RsHH+ByTHCzbOHR09Qz+izbzX6co8s/4GuMelm0cVm76ksTKLG10Zq+7TMHH+By+xriHZRuD4xdukVSxwo+dWWsvDsqGj/E5fA3XMO5g2cbg1YrdJFTWsi8HRZPB5/A1XMO4g2UbhW0Hr5BMk+bvGCGaDL6Ga3AtMz4sm4IHP/3ixPK3kEgzVh5Xiobga7gG1+I1zNiwbAo21pwkiaYs/lwpWWJwDa7Fa5ixYdmGcaXje5IHyV19VilYYnCNvB6vZUaHZRtG6caDJE7mkgNKuVTBtXgNXsuMDsuWwOHT35A0E+fWK6UaK3gNXot7MGpYthf0P/3TmV22nYSZvvy/SqHGCl6D1+IeuBczEpbtBVv2XCJZJi/4VCmTm+C1uAfuxYyEZXvO3e6HJAmSs6pFKZKb4LXyPrgnMxSW7TnrPzpGgkwp2auUKJngHrgX7skMJfKynb92l+SIFVQ7eVWtSoGSCe4xIb+a7ol7M38Tednmrd9HYkxb+h+lPKkE98I9cW/mbyIt296j7SRFvOgTpTTpBPfEvfEMRhBZ2foe/+FMLxbfG8suP6oUJp3gnrg3noFnMRGW7f2drSTD5EW7lbJ4Edwbz8CzmIjK1nn7R5IAwZi3ShQvkjhCjmdGnUjKtuqdJhJg6j/3KyXxMngGnoVnRp3IydZyuYuaHyusdWatuaAUxMvgGbGCWnomnh1lIifba5UN1PisspGj3n4Fz8Iz8ewoEynZdhy6Sk2Pz9+ulMLP4Jl4NtYQVSIjW0/vr068UHxnf6xRb78iR8ixBqwlikRGtrfrTlOzM4oblDLoCJ6NNWAtUSQSsl3v7KYmI7mVZ5Qi6AieLdeBNUWNSMi29E3xs8rMUvej3n4Fa8BasKaoYb1sTWc6qbnxonpn9tpLSgG05vkaYnPraE1YW5SwWrZnz/5yXl6+kxqbyqi3X5Ej5Fgb1hgVrJatdv/X1NRJC3Yqmx5ksCasDWuMCtbKdu/BI2omklPxlbLhQQZrkuvDWqOAtbJt2HyCGjll8R5ls8MQrA1rxFqjgJWyXW6/J/7VyN/i5K0+p2x0GIK1YY1YK9ZsO1bKtnCDeLM+L0e9/YocIceabcc62RpP3KDmTSzaqmxuGIO1Ys1Yu81YJdvjJ/3OjBLRuOzyI8rGhjFYK9aMtWMPtmKVbB/uOk9Nm7xwl7KpYQ7WjLVjD7ZijWy3vvuZmoXMXHVS2dAwB2uW68debMQa2area6ZG6Rj19ityhBx7sRErZDvV9i01KVZY48xac17ZSBOCtU8oqKG9YE+2YYVsc6rEW41mlR1WNtGkYA/YC/ZkG8bLtrvpGjUnPm+bsnkmBnvBnrA3mzBatt5HvzkZReI3l2asOKZsnInBXrCnjHm1tEdbMFq2TVvF5GuQo95+RY6QY4+2YKxs7Td/oGYguZWnlQ0zOdiT3B/2agPGyrb8rUPUiMzSL5TNsiHYG/aIvdqAkbIdab1JTYgX1Q05wMy2JB7Ihj2bjnGyDQwMOK+sED/amb6sSdkkm4I9Yq/YM/ZuMsbJVt/YRsUP46i3X5Ej5Ni7yRglW3dPHxUdyak4oWyMjcFe5b5RA1MxSrY3qsVbv4d51NuvyBFy1MBUjJGt7cb9wb/dbg4wsy2JB7KhFiZijGzFr4tvA0xbclDZjCgEe0cNUAsTMUK2Ay0dVGSTRr39ihwhR01MI/Sy/d7/1MktFW/znl3erGxAlIIaoBaoCWpjEqGXbXPDRSquiaPefkWOkKM2JhFq2bru91JRkXQOMLMtiQeyoUamEGrZ1n4gfutoask+ZdGjHNQEtUGNTCG0sp27eoeKGSuocfKqzB319iuoiRwhR61MILSyFa4TRylmlR1SFpuDEXIx+YJamUAoZWtovk5FtGnU26/IEXLULOyETraHfU+czAVirCZ7hfcHmNkW1Ai1Qs1QuzATOtne3SZ+LJOx6DNlcTkjg1qhZqhdmAmVbB1dPVQ0xM8DzGxL4oFsqGFYCZVsKzeJY3cySxuVReWMHtQMtUMNw0poZDt+4RYVC2PQNo96+5XEEXLUMoyERrZXK8RBsFnL9B1gZltQO9QQtQwjoZBt28ErVKRJ83coi8hxH9QQtURNw0bgsj346Rcn9uJ9ZYM4wMy2yAPZUFPUNkwELtvGGvG+ZFMWf64sHif5oJaoKWobJgKV7UrH91QUJIqj3n4lcYQcNQ4LgcpWulGMOWcuCf4AM9uCmqK2qHFYCEy2w6e/oWJMnFuvLBYn/aC2qDFqHQYCka3/6Z/O7DJxjHWYDjCzLfJANtQaNQ+aQGTbsucSFWHygk+VReJ4F9QYtUbNg0a7bHe7H9LmER719j+JI+SofZBol239R+JdFaeU7FUWh+N9UGvUHLUPEq2ynb92lzYdK6h28qpalYXheB/UekJ+NdUePQgKrbLNWy9+ScOEA8xsizyQDT0ICm2y7T3aTpuNF32iLAbH/6D26AF6EQRaZOt7/IczvVh8zye7nEe9gwpqjx6gF+iJbrTI9v7OVtrk5EW7lUXg6At6gF6gJ7rxXbbO2z/S5hAe9Q4+iSPk6I1OfJdt1TviPWFNPsDMtsgD2dAbnfgqW8vlLtpUrLDWmbXmgnLjHP1BL2IF4mQc9EgXvsr2WqU4pSSrjEe9wxb0BL1Bj3Thm2w7Dl2lzcTnb1dulhN80Bv0CL3SgS+y9fT+6sQLxXesedQ7vJEj5OgVeuY3vsj2dp04d8nGA8xsizyQDT3zG89lu97ZTYtHcivPKDfICU/QI9kv9M5PPJdt6ZviZ3CZpTzqbUrQK/QMvfMTT2VrOtNJi44X1Tuz115SbowTwjzvVWxuHfUOPfQLz2R79uwv5+Xl4owlHvU2L3KEHD1EL/3AM9lq939Ni43SAWa2RR7Ihl76gSey3XvwiBaJ5FR8pdwIJ/xB72Qf0VOv8US2DZvFqXFRPMDMtsgD2dBTr0lbtsvt98TfhvwtTt7qc8oNcMwJeoheoqforZekLdvCDeJN6HjU257IEXL01kvSkq3xxA1aFB9gZl/kgWzosVekLNvjJ/3OjBKxoOzyI8oFc8wNeoreosfotRekLNuHu87TYvgAM3sjD2RDr70gJdluffczLQKZueqkcqEc84Peyj6j5+mSkmxV74kzL3nU2/7IEXL0PF2Slu1U27f08FhhjTNrDR9gZnvQY3kgG3qfDknLNqdKvIVmVtlh5eI49gW9Rs/R+3RISrbdTdfooXyAWfQiD2SDA6niWrbeR785GUXiN3JmrDimXBDH3qDn6H3GvFpyIRVcy7Zpq5jo5FHv6EaOkMOFVHAlW/vNH+ghSG7laeVCOPYHvZcewIlkcSXb8rfEib2ZpV8oF8GJTuAAXIATyTKubEdab9LN40V1fIAZZ8iBbHAjGcaUbWBgwHllhfiRxfRlTcqHc6IXuAAn4AYcccuYstU3ttFNedSbMzxyhByOuGVU2bp7+uhmSE7FCeUDOdENnJB+wBU3jCrbG9XiLc151JszWuQIOVxxg1K2thv3B63lA8w4oyXxQDY4Mx5K2YpfF/+9nbbkoPIhHI4MHIErcGY8Rsh2oKWDXsyj3hy3kSPkcGcshsj2e/9TJ7dUvH15dnmz8sYczvDAFTgDd+DQaAyRbXPDRXoRj3pzko0cIYdDozEoW9f9XroY4QPMOMkm8UA2uKRiULa1H4jfpplask95Mw5nvMAdOASXVJBs567eoYtiBTVOXhWPenNSC9yRI+RwajgkW+E6cUQgh+NV4NRwXmpo/p/yYg4n3cCtRIb8b5Rh/IRlY7TBsjHaYNkYbbBsjDZYNkYbLBujDZaN0QbLxmiDZWO0wbIx2mDZGG2wbIwmHOf/9eGQ3zBminIAAAAASUVORK5CYII=]\";s:11:\"ans_textbox\";s:104:\"id:0|title:1 Circles.PNG]id:1|title:1 Triangles.PNG]id:2|title:1 Circles.PNG]id:3|title:1 Triangles.PNG]\";}', '<p>Incorrect</p>');
INSERT INTO `questions` (`question_id`, `question_name`, `question_desc`, `category_id`, `country_id`, `grade_id`, `subject_id`, `q_score`, `status`, `topic_id`, `form_data`, `qWrong_feedback`) VALUES
(321, 'Question with Put Images - ', '', '58', '251', '1', '3', 10, '', '94', 'a:9:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:27:\"Question with Put Images - \";s:15:\"question_option\";s:2:\"27\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"well done\";s:15:\"qWrong_feedback\";s:16:\"<p>incorrect</p>\";s:11:\"put_num_box\";s:1:\"9\";s:16:\"question_textbox\";s:122172:\"1 Banana.PNG|data:image/png;base64,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]1 apple.PNG|data:image/png;base64,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]green grapes.jpg|data:image/jpeg;base64,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TQQmAAAAAAAOAAAAAAAAAAAAAD+AAAA4QklNBA0AAAAAAAQAAAAeOEJJTQQZAAAAAAAEAAAAHjhCSU0D8wAAAAAACQAAAAAAAAAAAQA4QklNJxAAAAAAAAoAAQAAAAAAAAACOEJJTQP1AAAAAABIAC9mZgABAGxmZgAGAAAAAAABAC9mZgABAKGZmgAGAAAAAAABADIAAAABAFoAAAAGAAAAAAABADUAAAABAC0AAAAGAAAAAAABOEJJTQP4AAAAAABwAAD/////////////////////////////A+gAAAAA/////////////////////////////wPoAAAAAP////////////////////////////8D6AAAAAD/////////////////////////////A+gAADhCSU0ECAAAAAAAEAAAAAEAAAJAAAACQAAAAAA4QklNBB4AAAAAAAQAAAAAOEJJTQQaAAAAAANDAAAABgAAAAAAAAAAAAABMgAAARgAAAAHAHAAcgBlAHYAaQBlAHcAAAABAAAAAAAAAAAAAAAAAAAAAAAAAAEAAAAAAAAAAAAAARgAAAEyAAAAAAAAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAEAAAAAEAAAAAAABudWxsAAAAAgAAAAZib3VuZHNPYmpjAAAAAQAAAAAAAFJjdDEAAAAEAAAAAFRvcCBsb25nAAAAAAAAAABMZWZ0bG9uZwAAAAAAAAAAQnRvbWxvbmcAAAEyAAAAAFJnaHRsb25nAAABGAAAAAZzbGljZXNWbExzAAAAAU9iamMAAAABAAAAAAAFc2xpY2UAAAASAAAAB3NsaWNlSURsb25nAAAAAAAAAAdncm91cElEbG9uZwAAAAAAAAAGb3JpZ2luZW51bQAAAAxFU2xpY2VPcmlnaW4AAAANYXV0b0dlbmVyYXRlZAAAAABUeXBlZW51bQAAAApFU2xpY2VUeXBlAAAAAEltZyAAAAAGYm91bmRzT2JqYwAAAAEAAAAAAABSY3QxAAAABAAAAABUb3AgbG9uZwAAAAAAAAAATGVmdGxvbmcAAAAAAAAAAEJ0b21sb25nAAABMgAAAABSZ2h0bG9uZwAAARgAAAADdXJsVEVYVAAAAAEAAAAAAABudWxsVEVYVAAAAAEAAAAAAABNc2dlVEVYVAAAAAEA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AAAADwBBAGQAbwBiAGUAIABQAGgAbwB0AG8AcwBoAG8AcAAAABMAQQBkAG8AYgBlACAAUABoAG8AdABvAHMAaABvAHAAIABDAFMANgAAAAEAOEJJTQQGAAAAAAAHAAgAAAABAQD/4Q1kaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjMtYzAxMSA2Ni4xNDU2NjEsIDIwMTIvMDIvMDYtMTQ6NTY6MjcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdEV2dD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlRXZlbnQjIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpEb2N1bWVudElEPSI3RjBGOUY3REVENjYwN0NCRjJGOEM4MzFBMkNFNkMyOCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpCRDZCNjE5MjJFRkRFODExQjY1M0Q4MEQ3MjdFMEI3MyIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSI3RjBGOUY3REVENjYwN0NCRjJGOEM4MzFBMkNFNkMyOCIgZGM6Zm9ybWF0PSJpbWFnZS9qcGVnIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiB4bXA6Q3JlYXRlRGF0ZT0iMjAxOC0xMi0xMVQwMDoxMjowOVoiIHhtcDpNb2RpZnlEYXRlPSIyMDE4LTEyLTExVDEwOjIyOjA2WiIgeG1wOk1ldGFkYXRhRGF0ZT0iMjAxOC0xMi0xMVQxMDoyMjowNloiPiA8eG1wTU06SGlzdG9yeT4gPHJkZjpTZXE+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDpCQzZCNjE5MjJFRkRFODExQjY1M0Q4MEQ3MjdFMEI3MyIgc3RFdnQ6d2hlbj0iMjAxOC0xMi0xMVQxMDoyMjowNloiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDUzYgKFdpbmRvd3MpIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDpCRDZCNjE5MjJFRkRFODExQjY1M0Q4MEQ3MjdFMEI3MyIgc3RFdnQ6d2hlbj0iMjAxOC0xMi0xMVQxMDoyMjowNloiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDUzYgKFdpbmRvd3MpIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8P3hwYWNrZXQgZW5kPSJ3Ij8+/+4ADkFkb2JlAGRAAAAAAf/bAIQAAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQICAgICAgICAgICAwMDAwMDAwMDAwEBAQEBAQEBAQEBAgIBAgIDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMD/8AAEQgBMgEYAwERAAIRAQMRAf/dAAQAI//EAaIAAAAGAgMBAAAAAAAAAAAAAAcIBgUECQMKAgEACwEAAAYDAQEBAAAAAAAAAAAABgUEAwcCCAEJAAoLEAACAQMEAQMDAgMDAwIGCXUBAgMEEQUSBiEHEyIACDEUQTIjFQlRQhZhJDMXUnGBGGKRJUOhsfAmNHIKGcHRNSfhUzaC8ZKiRFRzRUY3R2MoVVZXGrLC0uLyZIN0k4Rlo7PD0+MpOGbzdSo5OkhJSlhZWmdoaWp2d3h5eoWGh4iJipSVlpeYmZqkpaanqKmqtLW2t7i5usTFxsfIycrU1dbX2Nna5OXm5+jp6vT19vf4+foRAAIBAwIEBAMFBAQEBgYFbQECAxEEIRIFMQYAIhNBUQcyYRRxCEKBI5EVUqFiFjMJsSTB0UNy8BfhgjQlklMYY0TxorImNRlUNkVkJwpzg5NGdMLS4vJVZXVWN4SFo7PD0+PzKRqUpLTE1OT0laW1xdXl9ShHV2Y4doaWprbG1ub2Z3eHl6e3x9fn90hYaHiImKi4yNjo+DlJWWl5iZmpucnZ6fkqOkpaanqKmqq6ytrq+v/aAAwDAQACEQMRAD8A3+Pfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691/9Df49+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X/0d/j37r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XVx7917rDPU09LDJUVU8NNTxAGWeokSGGMEhQXlkKooLEC5P1PvRIGSaDqkkkcSNJLIqxjiSQAPtJ4dIjcPa3WG0sjjsRunsXY228rl8pV4TF43O7rwWJrq/MUGIi3BXYukpa6ugnmr6PBzx1ksSqXSmkSQgK6ktPc28bKkk6K5JABYAkgVI48QM09M9Ee4818r7RcW9puvMdjbXU0rRIks8UbNIkYmZFVmBLrEVkZaVCMrHDAmN1j2/1h3RhcpuPqjfO3ewNv4bcWR2pkM3tevjymJiz+Jho6ivx8WQgvS1hhp8hBIJIWkheOVWR2Bv71Bc290jPbyq6BiCRwqOP+HprljnDlfnSyuty5T3y33Dbobl4HlgcPGJYwpdA47WoHU6lJUhgQSD0I1x/X29UUrXHQk6797691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X//S3+Pfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvddXH++/x9+8q9e69cf74H3759e69cf1/wCK/wC29+6916/v3Xuu/fuvde9+691737r3Xvfuvde9+690QD5w/P8A68+FMGw6PMYDIb+3tvfPY+On2Bh5q7GZh9lyHJUuY3XjcnLhK/AVlVisnTU9OmOmqKeaqepWzRpeQEO+b/abFEJrllwNRqdNEFSzliKUWnmR+zqAfe73/wBg9l/6uWlxtsu5cwbhcoqWcWtZWt21q88T+E8TukgRFgLq8jOACoqw1Xfm381N4fMnvjLZylyWT2L1fW0OJ63weBpZsvg48jsDE7yy258FkeycEu6cxhMvumiyGdM1Q0ci0gelhMSKYw5jTmTmGWdL+/tlLpHA+iNSQZAoZ1VgNQ1McAitDwGOuVnvL71bp72+47zfvF9t5Tm8GxjQGSMG0W6kljkvYvHeOSeNpS8hDrHWNNIXTrJTsnga3AbTqchuuSslzFZlspt7bmLr5XnShjxtQF3XmhFO7+J/v1jo4TpAeYzuDrhU+4/t+ZG5h3202/aLgnaoLeO4nkDHuM4rbwgjFGSs8oBBC+EMrKeo7vthueXOV7nceZI3O93V7NZ2kMlW8Nbd6X10QeBEum2iNMubh8PCpF+/wT+Tu2/g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Cjg8ub7A2ThMnTGJHgal3jmV2ply8DxvEZf4dkTOrabrMFkBV1Vh1K9jt0u7Dn/kiaIVdt0igocgxzOsTcQeCyMRWmkqGGVHWOmxTOt3ZGtaShftB7fT54+z8utre17H/bf0/wBf31vpXjw/1fP9nUo9cvduvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//9Pf49+691737r3Xvfuvde9+691737r3Xvfuvde9+690ld743cuY2furE7NzmP2xuzJ7ey+P23uPK4VNyY3BZuroJ6fGZeu2/JV0MWZpsfVyrK9M8qJME0sdJILcyu0UixPpkKmhIqAfI08x8uive7bcrzZt0tNmvo7XdpbeRIZniEyRSshCSNEWQSBGIYoWAalDgkH5/fdUG4uve8exaSXdO790bki3DXPk977/ANi5TYu9czlciyV2Tz8+1911OS3Dt+qyNZPI8MtS0VbJA6uywNI0awXv21224tNZ35eWAPVgS6ByBwkQEFlOToftOCyYFPn+5sut65P585lMG8XdxvSzvqvLq1a2u2dyHebwbkvNbyOxJRyVm0nV+mWKB56FxNRufsrDVG689m8VtF68Vu6c0anJGOuhp2U/Zz1CB3q5Z5CoZfVJ4w5FiARj774bttPL/Im6W21bVYXHMghMdpAViLRkqSGVT/ZgAaQ3ausrnNDNf3UeXOe+a/c7bt3l3nebTlBH8a9uUkuFiuSjKqxSy6tEzF2DOjGRvDR6AUqLudkV/wAbVyUEO0X2RHmVeNaOSppfBkHmBRY/sqnNwRzPVMVFvExdiT/seRPM1t7wNZzy78u5HbmBLqjVjCkk96QsQEH9IUHDruDtUvJayxptxtxcCmksO6tPJpKHV60Negu+T+38NHS1VZBDDDVU1PQZAaFUCOqqcgaKZV0iy/d05BZBa8gDn63Er+yu67nd7NovJWeJJ3jRiakoqK1DWtdBJAJrQdvl1HHPFpaWPMaCyRVEsAd1UAAMSwrjAJABPnxJqW6HPofN1e6uptsVebIrqqGOsxcs1Vac1MeJyFTR0cs3muZJlpYUUltTOylibk+4Q90Ntg2LnreoduHhQkrIFWq6TKis4FOA1MxA4AEAYHUp8q3Ml9sFjJdVaQKVJOS2htIrWtTQDj558+kJhd54na3b++MbKiRUWRlpamDwIAWhFJS0lVNSxqbSxUeSoJdaL+kTagCePcn3/Km6c0e2nLNJP92sCahrPEdxVWP4S0bJpY4qoUlRkR3Bv9lsHOW7XCr/ALrZHMblc6WBBLAefdqFAM1qAaBSNtV2BtWmpjUrkxVsVvFT00Uz1DtbhdMixrExBv8AuFbci/49xNae3HNt1c/SvtRhWtC7soQfOoJ1f7UN6/PodXHPPLVvbGZdxEhIBCop1H5UIAB/01Pnwp0QPtXez43ftXuXC1NOmQzax/xrCFPNSLFRxxU+OkqXjaNlrGpYwpK6XOjUbBrHLblDl6PbuW7HZZSzxWyELKcEliWk08Ro1EkDIAxxBPUK7pftv24Xe4TwKniNVQDwAGkD54AJbgxrgdGx6NxaZvb9LvnMQRyZXIjRjonkephxFAqIw+0EthFPVs+uRwoYgKtyqge4A94N7uLTdf6sWDGOyVA0xUaTK7E0DU4qoHaDgljq+Uk+3uz2xtZd1uB4s4lKx6s6AoAqB5MTUA8QAKEVao71lJTV9NLSVkEdRT1CFJopRqVgbfQH6OjDgixU8jkD3C9neXW33MN5ZTtHdRkFWXBB/wAoNKEcDwPGnUkXFrb3sElpdRCS2cUYNwNf8vmCMg5FCK9Vf9uQ/wB2d2YXcGDqDR5OOqqXhrKZgJRU4aopmo63Uos8hSYAkghlW3I+ue2yqm87NLZbjAHtpYQHQ1pSVDrU+grXzBqeI8sZ7aV7O8kNtIdcMtUYf0WNOH2V9K9WV4vO09XtvFbirWioYK3DY/KzCR7JTitooakxqSxZtBlCgX1E8C5PvBm52e6G+XmyWMTz3Mdy8SgCpYo7KCfyWpPAcSQK9ZILuFvFt0e5XcyxweErkk0UVWtPU0NAKVJ4CpJ6Jjm+16zr/sPM5qPUmD3bUvX0yKkc708kEVNRzx1dFqRngnWGOfWhDLJI4UtdveVtn7f7fvPKG0bBua67uziA1KdJDMSx0PQ8CxWhBBVVLDAIgl+Zr5N93DetpbQZHIKsKq6D4dQ/i+YIIJwQCa4N4/JOPJY5qWLyzCZQy0NHQ1WNgnK2KfdVVc0lQYC3JEeoE8kHj3blv2l2bYbsXsKO9whNJJXVymKEqqqig+VSNQrg+u925p37fYWs7mWKK0NNSxgrqoa5qzkgeQ1AHGOje/y1PjHnuyuxKb5Qb7akTa21cjWnZ2PE8MtTnN3U8L0UNZJRxSvPjsPtaOQSQ+bxyTVSwlNUaSFuhf3ZvaqW/wBys+edwVV2SxZvp01AtLOARrZRlUjrrGoKWk0kAqDVRy9tmqRbpj+jGcDiSwrQnzoOOaVPDrYIHvPkdDXrv37r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf/1N/j37r3Xvfuvde9+691737r3Xvfuvde9+691737r3SZ3nFuybaW54thVOCo98S4HLR7Pq9zw1tTtul3M9BOuDqM9T41kyE+HgyRjapSAiV4QwQhiPbcvieHJ4OnxtJ014V8q/KtK06Ld5Xdn2jdE2CWBN8NvILdpwxhExU+EZQlHMYfSXCmpWoGetLDD/G/sXur5b9y0ffO/sd2Rn9m71yNH2Vv3beZqcvhNzbox00FJV43D11Ti8POMZiVhFEtOlNRpRLDHTRxxxIFXAT70/vdcez+xSR2lws3Nd2xVDghR3LrBIoCSGC1U0VHoKqteWnsz93je/eD3q55vPdTeI92t9s3B47u4hlZ4bq7jC64lfRExggUohjVYdBaGFVEWoLa7gep+vdsY2nxWG2vjaOkpokgTxR+ORlUBVZnjKeo6fwAPz9ffHHdfdDnzeL+fcr7mCc3MjajSlK8c6gSc+blj5V6657b7f8AKO1bfb7XZbJElpEgRVA0qqrwCqmlUWnBUVVHkB5lr716iwlPE9biaZaepqKSrq6CRVAmM9EEaehmkFnqoJUkXxs+p0LfU+rVPXtXz5f7/Zzw7iwNxbuocjAYPXS4XAVqq2oCgNKgCoAjTm/YYuXL+2Nm5O33AOlCa6CpUMKkkkZXSTnJB4VJSpt07i3NQ47beQyqSxCqjAr8rWFW8McccVJDW5CqkI+zoIktGDchdKi4VFEwRbdYbcZJrS1Ea0J0RrQaiSWZVXgzMxLEDJJJIqSQ7KzSTPdSu7y0AqSSTpAA+ZoAAAcAcMdG3xvcG3tkbOw+ysVlcVQxYvH/AGstbSzyZCsnmlaSpr6pFpEkjo5q+rnkkP6mQv6TwD7h+f2xj3nmW+5n3dprmaWYMI2UJGAAFRGrUyKiKq0qAQO4EGnQgXnLdYtnt9q2yzW3jVdJcElzXJZSQApYkmtCRXBGD0Vbem8qjdWbo5cWk9PHQSPFjJk1JkZ5p5I9U5kjYSo8kijQgb0/U+om0w7btot4HjYqdQqw/CFGfkKAVJPDHp0E2aGygkluX4lfzYkBVFeJZjQDzP29D/B0h31k6CmePc2KipK2COaL7jJ1NJXxwzqCgqWgxUtRHKUcMwWVyPpcngRRuHu37e7ZuF7afT3MrwSMhZI1ZGKmhK1kHnjgASONKHobWfIe6XltBdpFCqSqGAckGh4VUK1KjNOPrQ46d6f4pHGYPIZfcmfGYy0UUtRLQ4wTw0ccYUvUVK19R46qsqoReRdcMaMVsytx7J7L3xtd13+y2u02owWEzBFkkYa9bEBAUWqqpPaaOSC2qoAPS7dORryw2i5vUvEe5iGooqnTpUEmhJBqBVuFKCg6c+pe0otlR1GyMwqmXFTGnihqJ46SWop4wI6Gux00qmOZaihWIPHwwYahYXuu9wPbuPm54N5tLjwbwJQtp1KRUkoyggjQxYhxXBoQcEE/LXNs/Lyyxtb+Pt8zaqA0ZHI7iDQihoKjHCoPGol7w7ux1NjJ1gkhw0UsTLJWVlTE9X4nQXShpIdcjSulrFdbWPpANiAfyx7PC2vYrvdrkXPhkERIpCFhw1sxyAeK0FSM+YJvvXuLPuFvJZ7RZvGXBBdzVgDjtAwpP8VcV4A5BG92/wB496ZJMxSbezkmCp1FNQPHQVBMlOCZpZ0IR0aapBLDSWFgByR7yLs2tLCNrdryIXRyQWFfStK1oOH214cAAIgsMR1SCpbPpXjTj/q+zpeVHcuQrhQYGixOUqayN6fGY+jy+QmaGjddNNBEKezuqxgadI8ekD6gAj2TW3Ku3WL3F5DFBCZKs7RxKrPU1JLADUScknVn59XuHvrpI0vtwkliQdoZmagGAFqaDGMfZ9hxdh9N4TGU1PnN1U8G4d21kMUtTWViE02PBAdKDHUhJjpqeAmx4JYi5uxLHGXnP3T3m/vbjbuXrprTZo2KApTXJQ01l+IBp2haUFCSeAmLlzkbbreyhn3S3Et46g6TXQny01AZv4iajyWgFS678602xlsFXyR4qkjmpaaWp8IiU01THBGZJIpIG/aWYxodDqFZWsbngBjkj3F3+03qxs9wv3nsppVQlzV0LnSGV+NNRFVYkaa0p1Xmjk3a2226vduthBeQxs40YVgoqVZcipANCMk8ajALT8fO79xfEnvvEZXFZOrHX+cr8XTb3wEksstDlto19T9vU1EtOCVbM7cMks9FUC0geLQzGKaaOTof7O+5W5cjcxbdusVwRtUsixXkQroeKtGfTw1xhvEjYUKkFK6GZTF+0blJbSRy6uyoDjyIrxHz8x+w4r1thD6D31j/AC6kzrv37r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf//V3+Pfuvde9+691737r3Xvfuvde9+691737r3XvfuvdcSL/wC+/wB8fesg1/1f6uPXs/l1QV3Ft/YHSnyo7E2btXae39hbWqsNtDIUGPwOHosNQyNmcHQT12cn+zhhfIT1uepatamrm8spltrfSotxx+/ryvuO7c73Kbdbk/Tw2zxoBTWnhN4gX1bW7MM1Yqy5IA6BnKFlyx7eb7Jt+07Ta7dss8ZqIUEaeK7KxlfSBVnI75GLMcFmouHZ8njo4GqZMhRpThdfneqgSIRt/bEhkCKrX+tyPfNFNq3OacWse3TtdVppEbFq+eKVHD0oPPqbn3CwSETvewiCldRcUp61rw8wPPy6Kl3X2Dj5KWpq4ZAaTH0dVRY0uNDV+RrRp1xI12MTGOM/TUEjLH/DKH2t5NutksnW9QfvC6dXkUGoRFB0qTw1DU1aYq1B1BfOO/x8xbnbxWRP0VuCqsfxEkFmpxoaKBjyFegL+OfVGO7Dy+Wyu44JZ8BgUpYxBqKRZDJ1TPIkDuLB4qanhLSrfgyR3Hrv7P8A3Y5/uuT7GztNqK/ve71EMaHw0Wg16f4ixotcHS2DShXcq8tpv00s1y7LZQ0rSoLMeC1zQAV1HjwAoTqB+G632WKI4+Db9HSU+jxqtGHhaMEaQVKsQxWwsGDBvyCODjPF7jc5R3Yu33uSSQNUhwrK3qCumgBGKrQ/wkHPUkzcl8tSxNB+7ADQUZS4YHyOqpJPmK6hjNeiDd29e0u0MlPk8NpoqnF5GmE7UoWCN46gRVNBkIkiKpBVK0kevQAGLauCCTlxyNzKeZNmsryZcTxGo40ZWKSLmhK1VtPy+R6hLc7Btp3a+2eR9aRnDHNVYBlr8ypFfn+3o7HSm+5uwuvsXm63R/FaaSbD5kxIkcb5Cg8ZNQsSBY4jV0c8M5VQqI0hCjSB7xK9x+WE5T5qvtutwfoXUTRVNT4bk9pJywRwyhjkhamp6nflvdG3fZ4LmWnjqdDED8S0HClO4FWoMCtBw6Um+dw0eGwdZC0sZr6+lnpKSnB/cP3CGKSoKW9EUCSFiTYFrD8+9cg8uXm97/YTrE37vt5lkkkp29h1hK/xOQBQZC1by6Q85b5a7RtN5C8gN7PG0aJXPcKFiPRQa14GlOqw+wXfc+/KXEYlRU1ROP29AiXPnyE1ZKFhBFzqSprvEQBwynjjnNezlj2zaLm9vCVt40aVyfJFWpPEV7VJ+zzHUFWFvJKIYI1rLK4CjjlqACnHiRw9ejR7b+Oe1Nu9n4+hqsjU7hoaPESZ80GQpoYh5Wq5aTHrOYT4qtVkppWI0qCVHpH5gfc/dvet05B3HcrexW0vfqVtxIjEgVUO7KCAyHTQDJIJBBqKdSTFyha23NFlt01z4tmYmmKlaEhTQKSDkEkE0yVBUjzJxftaX7b7X7eD7XR4vt/DH4PGONHh0+PRYfT6H/b+8bxeXQuvrRdSfVhtWvUdVfI6iSa/Otfsx1KhtoDAbQwL9LpoU0jTpNMUpSgz5en5Vr9+42gwG6qbK4Rlpauny9dTxSRi7laKSGSnuefKaKQmIlrl10gkgD3nNyDeXm6cube25KWkktkZq8CWXJoOBfD0AxXrG3c7e2td23aytiDZxzOFA8gDla8cfDXjgk5r1YLtbd+K3JhsfkI6qmgqaijp56uheZUmpJpIVkliKSFXaKMk6XtYqL/194ecx8pbvy7uN3ZzWcr26yMEkCkq61wQRUVPmOIOKdT3s3Mm17vaRzRXcaz0GtCwDK3mKGhIrwbgRmvSb35vbGUeMrMZQVcFXX1sElNK0EiyRUVPKpSd5pVbQJPEzBVBuCbm1uRXyByNud7u1nu242rw7bA4ca1IMjg1QKDnTqFSxFCO1a1qoX505usLXb7rbbC4Wa+mRkOggqitQMWYVGorUBQa1NTSma+osBk+7e5NtbE2jG9fXbmzWH2jiZIgZE/fqytXkJGBVVoaITTzySkhFgjaRjpuRm9yZy7fb5uWz8v2URN7e3CoAPIuaVPkAq1ZzUABTnHUSbfbPIYbcL3uw4f6vICp63Jh9PfZjqWOu/fuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//9bf49+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Wsr/Nt3lvjbnzW2fFi8BuKqxsvQ2yKXEy7c2/WZuetq6nfvZLVcs4o4ZfNFqPhkp2EshMMTRx+olsUvvEe2E/Pt3t15tdqrbvBbae40EkYZ2VK0qHDsfDNVQVfWRVSMMvd33jvPb/3stuX992u7n5NvNktCn08DTSR3BubxWnGjJQrRJYwGlPhxNEvxhgEpqH5HVOLoa6PoXsZoshTCooK2TrHsGmhrKcmSMTxU8+MiaRWdSLqwFwR+PeEV57Qc42MxguuU92Vh5fTyMCB5h1jZSPmpbPA9TNt0Me72VtuVjFcNZzLqQtFJGxBPmkqI4+x1DdMKdLdxbv3rjdvdh4jM7CrKvD024oIN4YatwVXDt2urMjRU+Qxu3qyKjralayow1SsRKoJvAxeXSA3sFe4U1z7T7St3v3L13FdSxh44ZEaN3ViyK7lwCkZdSNWkj+FWJA6E20bDJfbhBtdPAkdS1XFDpU9xA4k0rQYrnIAr0Zz495XB4bazbVLQUFZSZWvWYTtHG1RkYZRQZCOolLaTWLPSXCsbmNlCcAD3jb7v7Jue631jzPZwvPZyWqBtALaFy6NQZ0FXpWmCDqIJ6HHI+82lidx2O+nWK5FwxQuQAwICla8NQK8K1IbFc9D5ks9icTTPU1tfTxIAdCB1eaVrH0QQqWeWRvxYHj625PuHdr5f3neLmO22/b5GkJySpCqDjU7GiqPtOaUFTjoebhvW17XbNcXd7GkYHDUCzfIAVJxjA48aU6r9793fDlEqo7KtXna2CoFPe7U2OoQqQvJpJ/cvDGgP0YhyPp7zQ5D2Bdj22wsFYulshBb+J2Jd6D01MxA8hQdY87huMm9bzfbq6aVkbA9FUBUHzIQCvz6RGzN4bn6ywNM1Vgs/R4jcUz5fHZeCoqsfT10csMVIRDJ41p6kaaW9vIG0vexVlPsw3Cy5c5ovprZprO5vbSiPGyxyNGQQ2QalcnjTiKCrAgPPDvFisNzDLcW8Uq4ZSyhhkVqCK1BIpx/LrjlO0t0brn/hm2sTXtka8+MSQGoy2bnJsLUyQxaoZbcatMjre4KkD2rj2ratltfGvLiGGxjHnoiiUcc1ooHywDwzw6QxWdzeXFX8Se5Y+WpmY/nkn/Vnpq2Pht8bX3pgM7itvnNZHE1SZCegCQ1UcSkyRT0ldM2qmochJSyF0LMZICySCzDhrmhNn3jl/ctqv9wFvazxlA+rTniCDgsoamocGGpTUHox2m+ks9xtby2i8R43rpCltQoQaY9CQGAwc+XQ/bw7e3DQ75oN4SbKzG3KaixYwmTleoosqTDDV1dTQTTLRxpHEkf8SnSSKRyP3QVOocx1yt7c2EXK+4cu327wX1tczCVdKsmliqq2liTU1RCHUD4aEFTTo73vmuS93az3Pbomt7+3UpRjXUONCulcZNQa54dKTJ/KDGS44inrqSnlkTSxocfk2rLkEWp1qh4qZ9JsGcmx5Dcj2W7b7H7Xa3sc1wbieJWFEkaPQaZ79ABYZyBSoNCCOn7vn/mG6t2git4YJGFC61J88rVjpx8iQaUII6BDau0dxd+bvp5zTVuN2bjZSldkiAVpqe4lnhp55E8VTm8hpAsgcRKVZgVXkcc3c37X7ebK6iSOXfJFHgw+p4KzKtCIkyatTUQVXJwW8tct3O8XQ7GW1DfqSeXzArxY+maVqcY6j7oq97dUZCpwstVQbkwdFWzY7G5OojYSyJBrCQFYqmOoilhVLEP5UFiqsRaxzsNzZ80bZY7o1u9tdzQrI0da6dQ41pkHyIoSMkDoi3Gwtrbcb6zim1NFIy6gMGhpWh/wA1rXjx6SmYzXZW5sUag4ivoNv1NLVVIqKLHVVFQV1JSqzVDJkqpj94kaqQ6xSEMeCpvb2aWv7jiuZYEvI5L6JlDrqVnQtlQyKaqSMiq8Mg06bNoLUQySowV/gZhQNTBIwAQDgkVocV6tp/k+9fdaZVey+yKiklr+1tpZKgwFJJVSRSUW3tqblxs0lPXYmmEatBlc5V42vpp5mZ2WmpxHEUWWcSZ2fdQ2Ll65HMXMEkZk5ntZFiBOVihmWoZBikkhWRGY1IRdKkBnDDDluGFhPOwJuFag9ApHH7Sa59KU4mt6I+nvNMdCvrv37r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf//X3+Pfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691xIN/8Pz7169e68Af99/xo+9j7evfl1WB/Ma6a3hk8Xt/5B9fmOqyvWOHrsXvTCSV0WPnyGy5asZGnymHqpmjjGT29kJZy0N2epgqmEYLoI5cQvvZe039eOXIOZ4Vik/d8DpcxyFQrWxOvWNVATG2olSwLBqr3KFYOb/aXBEG5Wc5juYDXUDQgcag/I8fUfZQ0r1m2u15srkN7bf2vlKGlzo/iuZx+bpaaCCprpfVUV6U1JKPtzU31u5MLFiS3pPHNCy33kizgtOXf35amS3/TiCyh2UDCpqYkmnwqCTQUHHoMXW271epPuN7t07E1ZpBEVqDxagUCnmSBTiT59IuXfPYtdmaXaWL2sX3Pk6umxmOxWNxtdmcxkclXSiCipcRjaZqhq+qrJpESFI0nMrNZQxIHsa7by/HuVxb2+3rNczzOFjjjGp3ZjpVAqgszE9qgDUTQAV6J4bOOR0EZLluAGSSeAxx/Lofa74K954TqneXfncdLHtDE7XiwmRXa+aqGqd47jpqvc+GxOQE1FQySjbdFRYitqJx9wwqtcCIKdY38yTrc+xPOmz8i7/zdu9qlhDaQq0UDZmkJkRDVQSIwFZnJc62KgaNLawfNs17FZz3LqI1RageZ8s/KlTnPAcD0YPYu8dnZ7A43E0GUwbzUOPpMfLh0rKB2RKKCOJWipRIddMViBSwKgccEH3y2535W5g2bf9xvZbOc2s87ypMquQfEctQuAKOK0YHJNCMU6l7lffNu3LZ7KIyKtzDEsbxuaGqrprQ0qpAqCPWhyCOuG6M3i8NDR7a2zLjqDPblyEGJpf4dBThsfHMztWZSWOmURxvTU5fwlwbTyISGXV73y3y/uW5yXG/b/BcPsVjC80hlJHiBFqIk15bWQA2ngoIqCV69vO9WVmi7ZtdxEN2uZEiULQ6C7hS7UwNIJIBpU+orRZ4Hb2K21jYMXh6SKmpoV50KPLUSsS0lRUyBdUs0rsWLtckn+lrBXfN93PmDcJdx3O5LzEmgqdKDyVFrRVApwFfXNejza9qstotBaWUWmMDJp3Ow/E5Ayf8AAMCgAHSS7Ow2Prtt1ddU08JqaIQaJZEQmWCeoSllo5i6t5IZI6g2Q3Gq39TcZ+1m839lzNabbFM5sbnWGSppqVGcOoHBhpyeOmo8hQKe4O2WlzsdxuEiAXdvpKt+IgsqlScEg6qgV+IDhU9VrUkmH2X2ggrcXiMxg6bKLHUY7NU0NdjhQ5KBHHmjkLg/w9KkOrE6h4/VcalbL3c7SffOXpraHcLi1unTEsDaJAyt5EfxUyKcGOmhAIiLbrz6R4btrSKegPY6gq2CM/PzHlXyIr0fjH5fsPdeEjptiYXb2ycA0Jho8zWRSyGSmFwxwOJpUpEp6Y/RJ3DKSSUQ+ljjBuOz8h8rbu0vNO83e67oranhUDDY/t3Zm1Hh2awcDUKEjqUrPc+at+29RtO2QWVsw0iRmIFM18Maaime4IQPIg5BWO2upexaCGGqyuWTPRU/mmp4oqSGlV3ZUNSYGp9X3NQVTUFlCSWuEve3ueeTeeOWd/WVNqBjkWgZWqGUZpUHGniNSlhwDenUbbpsu4bBIE3GAKstaSK2pWPnnBBzXIqeNKDDXmO3sVlevaDC01D/AAmrwu34Nq0WMWVpxKXp/BUZhakxJcTqrSMpW6yWU6tWoqtj5OfZt23W+e7NxLeXb3DyEaaDVVIgoJ+GtAfOpIAA0jW8bhLucu2R+CI7a1hEaqDWpHxMa+bECuKUHr1cV/KE6yzG2eqex+y8nBLS0nZm4sLjsFHKpX73EbDizlO+Vg+oamnzG4qumU/UtSN+LX6Z/dT5bu9u5a5h5huVKxbjcRpED+KO2Eg1jHwl5nQfND5U6E3Llu8dvPM4P6jAD7FqKj8yf2dW9j6c/X3lb0JOu/fuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//9Df49+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691Wr83N71NZv7r/qdnKYSHA1HYeUpiR4cxk2yFbh9uRTLqUSxYb+FV1R42DI00kUltUKkc1P7xjnzfto5R2Hk3abh4rC7Pj3JQkF1DmONSR+AMG1DgSyeYHTdmsN1zBt1hcKDEI3lA8mdKBAR56alqHFQPQ9FJyeQpcTj6rJVj+Olo4HmlZFu7BQAI4Y7hpZ53ISNB6nYhRyR7402Fjcbne2u32iariZwij5nFTXAUZJatAAScA9SLd3UFpBNdXLgQxglj5gAE4HmajhxrTz6AKq6Lx27ssu6txVVbh69ap67DY3CS/ZT4ESTpVUxlycOiplr6ecB/wBtljhfiP8ALmb4PebceWobHbNjRbiW1CK1y7ODI0eNcQBBUYGh2OtqBmAPaI5i5CjvJbncLid7VpnLrEgWserIUk4qK5VQApwrMAOga7727vzCtR5LKb73ZvvFYmT+JUmJ31ncruzHpGzJT1UtPS56urvtaqNCqylSHaM6ldSAvudeVfdvePc/bPB3zd7ySaJipV53k8NyuHQuSO6hAOnyKkHiQTzJtd7sl/DZ3l009rINUbEsK0IBVhq4jzoeBB+XSeyuxdpb32Fh99bVx8WDyFcaiknpKUiEY3cNBdpqS8IVZqCrK+SKRx5442VmYklfZTsvMe72XMe78q744mltgkkcgGJbdyArEfhdSdLgdhIYKFoCU+7bfBa2G37zYs30c7FHjc1Mcg4hT+JSASA1SAM18gv2T2Tl8fuDb02YnD0uGnlQZCaOQzxSTSQvTyZGTUQ6wVNMi3IDhSxJY/UZbvsNrf7ZudskR8KeMq4WlCrBlIGKAlWPDz4Yr0Ux67SeO8taCeORXX01Iag0+3NK/wCxYzje0ds1dIk9VNLRTNErtD4J6qNyVDEwVFMkySRv9VZtNx7xC3H2o5otbto7KOO4ta4cOqGn9JXKkGnEDV8iepjs/cXl+e3V7yR4LgAalKswr5hWUGv56fn0EvaPa2NbGspd6PDwSCVzLpFdlKlAfBBT06ueAx1BSTc2ZtIXiUfbz24n2S4bcL10k3Zl0qFroiVvizQVY8CeAFVUnVkCc284nmAJt23RMlgG1EtQM5HCuTRAcgeZpWlB0SXbUb7v33S5bJ00r4ufO08uSlWN5KalWUVFTSUUs3pS8kVAyopIMixsebH3OW4Tfu/bJbe1kU33gMY1JAZtIUMwHGgLLUj4SwB4ioZWILGCynwFYBmAONRINT6kaiK0rn06t2gSGOCFKYRrTpDGkCxFfGsKoFiEdvT41UC1rC3vnpcPNJcTSXJY3JYli3HUTVq1zWta1z1k1CkKQxLAqiEIoXTwCjhT0FOFP2noN+1Kqli2/FSu6fc1NdC9MnpMmiBXaWZedQVVbSW/2u30v7k/2jtLqTmOa8iU/SRQOHYcKuV0r9pI1fYtegB7lXNtHsUVvIR9RJMpRcVAUHU32AHTUZOqnmaEZ6/6zqMnvhd07j603HvLraDMZSukweIzQ2jJuOljkqZcfQRZw4vMVVHiqqQRColgpzO1MXEMkchWRMwNt555C5e3bb4ecbtJ4Y6eJbrcrBI5CjSjSFXMas1NZC6tNdBVqMIzsNvv50iuE2u4ntlGdCNQn01AHz40z5Y49XT9PfzK+oMfW7d6z7B6syvQGKpaWjwO3aqHKUW6NjYmloUSjpaOtyVJjcHWYukpo0RPIKOVIr3nMagv76Be3v3ouQN0j27Z7nZm2jb1RI4WV1mt41AogZgkTIumlG8Nl8ywUFuhHZcw2bFbeSAw6e2nEKRihFART7OrXI5EljSWJ0kikRZI5I2DpJG4DI6OpKujKQQQbEfT3lmrKyhkNUPA+RHqPl6dCUZFRw65+7de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r//0d/j37r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3VaH8wToLsXeibS7o6ixtVuLdmwsdX4Tcm0cfI6ZjP7TnqVydJWbd8d3nzG38gahvtkV5aqGqYRhnjWOXE370ns1ee5Oz7fvG02P1V9aRvHLBpDNLAx1DQp+No21EoO5w1V7kAIf3uwuZmtr6xdlvISaFTRvtHA48x5g/l1S9me/cnX12O23n4s3ipqPO485mgzGLocYIZKKoEyw5JFKVkRgrUiZldI7abmxA98vIfaPZtgudwlh2wwbkIpE7ml1xl10MAkh7W0lhkE5pWleiC85l5kuovp7691wKQSmhFLFCGo2lQaVGaGlaYPR0aLe22ayjSsOWo6a8au9PVTJDUxMRdohCTrkZfpdAwIHBPvFi95D5qs717JdmmlGohXRS0ZHkdQFBX0fSR+IDqYbXnHl26tVuTucMfbUo7BWX1BU5NP6Na+VR0U35DdiYuvx1RR0rcT0kuNxyPxNVGolUV1c0J9cNNHELLr/tWvYsVGR3tTybecv2jNfUN5LIskgGQgUEIlfxHJJNaEnSKhQTEnNW/Rcw7rA9mp+it1IVjgsTSrU8gaAKONBqOTTpBbQzi7S6jhTIBo45MrlNyLFOdL1FRWUtJjcZR08ZNws8NB5BYAMJixACliLLjZ/q+cLvdQwMhtorZQOAVXeR2alKks4Xz+AAE6tIJbrcGn2+02aFexZnlYn+IqFAHoFVan1LUpipCfZGwKzeOO3BmZlmgoaNoaCmr7BYf45WiSsiiYFWE8cdNSnyheUEsZ+rL7EW479Z2G4Wm1iVTeyRmXR5+EpVCa1qKswC+pVv4TSkkNxFZm+WMm0SQIT/SKswAz6DPpivxCrBhcluilq5MLQ52qxskLTxillqKx4BLAzeWGCKGCs0THQ1tKKWKkAliqk0nhs3je5kt1agBFANTVIAFcAkDJ1ECgOeHTTJCx1OF08a0x+dPy6doMFNV5NavsDJboocVG6LNlI8BlsnUGMkEpF/E/wCGR00duLksQRcRsBYlN5fXkVoV5f22CW+INEeZIxXyqU8Wp+QoDjvHkvs49taUJc32iDAJRdVfsBI/bx+RFOjpJgOs8v0xlcf1TlKNjh5qLOQ5CQuMq25KCRJaRs7HVxwVccmSVXp7mNIljlPiXQun3jjabnz1Z+5+1XPN9i4nuNUXhj+yFu4IfwSmpCseJDQliVHiHUa9SbfwcuScnbgm2zr9PEAxP4y4NBqBAarfAOAFSFwKdBdhvkVksFTfwfLNk8RW0IWCWjmoaevhhdFAK0k0oedYGFiqt6QpGkkcmVN19quWt5u33BrFHkkJJZXeMknzZUIXVxqwoxrnqO7HmjmXbraO1sty1WqiihlVtI8qFlJ0j0BoPKnXttdiwdndgYbCVZq56GrqEfJVeTZIXqqeKRAMdS00TPHDT1Esg1AEXTUNAuSHt32VOTOUN3n2W2SGSGB2RUUmjaT+ozHucqBWrVJoKk9M2nj7zvu3Pvd4ZjLPGpJOKFvhFBRQcgBQACa46PyiRxIsUSJHFGoRI40CIiqAqKip6UVbAAe8LJJJJnkkldmlepLEkkk5JJPEniSak+Y6yOjjSJUjjQKigBQPLFAOAoBwAH2Y4dEi+UkeLkirJIlgNTA2J1kaVb+JM8iSgEXvIccw1Dn6Enke8tfZQ7gvL1uLov4Zkl8Ov++sUx6eJqI+0fLqB+eDanmmX6WhbwV8SnDXQ8fnp0fnxzWl+HwDz2c3J8QOkcluGaafIxYDMYWOWoMhlbEba3buHbm3gTIWdlTAYqlVT+VAtx77eext9e7h7Ucm3F+7NcCCSOpydEU8sUX5CJEA+VOhDs7u+22rOe6hH7CQP5Do4XuWOjLr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuv//S3+Pfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvdcSDf8Ar/vh/t/evOvXugW78retsJ1fvHMdmbdoNyYGfCS7fqcNLS00uR3A+dZsXQ7cx1RKFmgqspW5ARxyK6fbF2nLIqM6x/7nb1yjyvyPzJzHzrbRybFb2jiVWUFnVgVESk5BdmAUgjQTrqACQluzCsMjSw66gKFplixoFHDJJoM4Jr1rlZX469g0RmTZO+qOjxcskr0uFzs9ZM+Gp3lYw4yLMxY6ukrlo6ZwnnFPTa2W4jS/HByT315Qudwvnm5XuorAzN4Wh0lbw6nTr1GEFqYPEGlfOgQTe294yI8dzAZiMqQwAr5BgG10HmVFacB0AvZnUO5tgr/Gc9mqXcFejUVXMdFRPTvSy1DUw1S1hWSZUqgEaIoqiNr/AE49yPydzttfOFo8u3WTwRB2Qq1AwYANwWoAKkHUDxqPLoJ73tNxy/fR7fcFDrjDqyVoQSQRSi0III9cV8x0+7F6b393JBjtx5nM0mN2o806U85kgmqBDS1D0lRHjcLRaYaWRZqfx6qgwEhVf1jTcg5w9z+X+R57vara0luN8QDsoVQFlDLrkapI0kH9MMa9tVNdJxsHJt1u0cV0HSKxZj3V1MaEg0AyDUH4iKcQCCKmT3VHtHYe0qHZG3RHDjsKz5HK1LOJZDLDDKZqiuqV0iWvqXcvKQAIwoVQosqgDkK35g5h3/cOdd+1eLcR+HCpGntZgexPKNQoVK111ZjUgkqudr3bLPb7LlfaSGMcmtyP4gKUY5Bck1b+EACg4BS9P9ZYHA4o7nqcdT1O5Nyz1OYq6upiSd6KPIVL1MdFS+QOI44lIuRYk/7f2D/c/nrdtw3i42GzvHh2i0pHpRipkZQA7ORQkVwFrpwCfKgo5K5cso9rs9zuoUku5lBXVQhF/DpBxU01E0rkqMA1EHeO3cVlsDkxUUlN5aehqZ4KhYY/JG0MLy6CxA1wSqml0NwVY/mx9hPkzmPdtp3/AGxYbuQ28s6RvGzHSwchTjIDCtVPGo9CR0c807Jt24bRfs9ui3McTOjgUZSo1cRTtNKEcKHGaHqsfOVDdeb8kqcQHWhqooamfGxSNFBLS1LN56MgAoEWphMkQsRGQoAsOc3IIl3Tb0W4AMyEhWIB0mlNS1zlTRuBIr69QFEzzQMhf/DmhqKjHy/Z+0Z+v/jzl+xQ+9N8ZCbEUuXkNTTUFPF/lk0JCiHyawngpxEoVFBD6QCSfcW85+7e28ozfuTaLP6q/jFGJYBENMgmhJauSAKZpUEEdDPl7k273a3W4acQWPkxBZmPDtWoFK17j9oUg1K43T8do9m0Mm6Ov55Jsvhb1f2VbNN/ldLGrLW0pkepeIiWnYkE+PSVuD+QQcse8kPMN/BsvMFgsKXB0LIhBXU1NIYFQRU0A+IGtCAOlu/ciXO22ct7a33iwxrqZdGlwBxZSCQdIyQQDQEipx0jpPkxmqCl/hmTg3BQV8Ufilhkosa06XFgorp2p6tgR9JDGG/PPsWH2g5TmvDfR7dC1WqO+QJx84wdNP6OV+XRCvNnNItRbruw8ILQMVXXTh8ZWtfnXV/SHSn6Z+Nvd3zE3bijRYHJbU6wirVnzG/MvSVK4enpWb/Lp8dU1S0w3XuKWK6Q09NqWN3HmeGNnlOUXtT7I8xc5XdrFY2ElvsQoJLt0KxLGMFYQaCR6YVErQ6dZRe4I9t2i5vJWc6iGNXkav55JJJ+ec8eHWz9sjZ2B692ftjYu16U0W3tpYPG7fw9Mz+WVKDF0sdJTtPNpUz1UqRa5ZCLySMzHkn31L2babHYdp23Zdsi0WFpCkUY4kKihRU+bGlWPmanz6kWKJII0hjWiKKAdKn2Z9Ode9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//T3+Pfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691X5/Mcr67C9NbF3BAkzYzAd07RyG4pEdo6enxcu3d5YyilyLghVoX3JkKCMlvSssiN/ZHvFH75e0Xu9+y95t9rrEL30YlI8o3huI9R9QJHjoM1bSOibe55bWGyvYlLGC6jkpWgOglqftp9vDqvmDsPaclIKr+KCIlQTTSQTiqViNfj0JEwc/UAqWTV9G598HJvbfnCG7azXay4rQOrpoIrhqlgfnRgG+Xl0Mo+e+WZLb6h78oaZQqwcHzWgUgn1Ix86dEv+QvYtLmlqMdT+morEp6aClLK01LjKaoFWaqqC6ljnq5xYL/AKkn1HSCcm/bPk88tbbHBKwaYsZJHFQpdgF0rWhKqoGcVIqQK06iHft6fmLdzuAQpaxqEjU8dIqan5kkk+mACadL/rnpfsMbGxNLVbwq9q09VA1cMPj1MdbElfJJViPIyVEVTHDUWlXXGkashurXYH2B+ZvdLkyHf7pouXhfTxPo8crHSqY/TPFlxhq0OCtRQ9Cmw5J5huLMSfvEW8UgDeGXkpkV7kWgB9RU8c0NR0DPbWwt+bPp54qrcFdlsWnhqKiOTx6jTpIfHVxzRpD9zTJL+tCqNGRqKkAMJP5O5q2Hmi3ivNvhCPlCDhlanwsKtQ0NVI1AgkA1x0DNy2i52O/FnfQKstNSsMowPmpNM+WacKU6Mz1X3PhchtqihrFkLU0SRM1KElkpGJ1PS1cDypKnhe4jdbiSMCw+rGG+fvavcbzebnc9onjrKdTpISKsABqRgCDqAqwNKNXJqABpy1zzb7VYxbVu8DlIu1JEANVqSA1SPhOAQDUUBGKmT2F27io8NUwQSNjqGdGSrra0pHPPHYM1JRU8TyvI0w4PBYrcaRe/vfI/tVc7duMG5bvKkt1Eaxxx1KhvJ3YgfCcgAUDUJY0p0xzPz4u62ku2bPBIsUgo7vQMVP4VUE0B82J4VxmvRDFrJd574hys9M38NGVxUcquF0U9C1bT0lHBOSSvkqnb1KCSWZrcA2yP8NLHbzCG/W0Nw9dJJI86DyP2eeOgEV8GEpq7tJofPGf+K6trwstLNicZJRlWpWoKYU+kjSIxCqqlweHTTpYW4II/Hvn1vkV1BvO6R36kXn1EmuvEsWJJP21qKcRQjFOsltpktpdr2+S1ett4KFPQAAAA/McD6Gteou5snS4nB5GrqXVQaWaKKMsAZ6iaJ1ihjBuS7nn6Gy3J4B9reVtqu943/bLS0jLESqzGmFRWBZj6AD9pKitSOkvMW5W22bPuFzcSgAxsqio73YEBQONSf2AE8B1Vn2/NFU7oo6en/dqKfGU8MyqCz+aaoqZ44Da7vJ45VYD6+sW5PvPTY43Ns3o7kjjnAH+EYI9KdY42akRmo8/8FK/6vl1uLbNpMlRbR2rR5ks2XpNuYOlyrO2t2yUGLpYa5nYgFialGueL++020RXMO1bZDeZu1t4w+c6wihvIfir1L0YZYkVvi0iv7OlKPp7MBw6v137317r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuv/9Tf49+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Sa3htDbm/tsZ3Zm7sVTZzbO5cbUYnM4qr1iCsoapNEia4njnglQ2eOWNklikVXRlZQQXbttW375tt7tG62qzbdcRmORGrRkYZGCCD6MCCpowIIr03JGkyPFKtY2FCOqfd7/wApbMJk5m6o79y2F2zNOPttvbtxdZX1mIpmN3hgzuHylFFXog9KKaGnYKAGdz6veHu//dBsp76Sfl7mZI7NmqEuINboPlKjLrpwAMa0HEk5IVn5Vid9UUw0/MZH5g5/MdFr7E+Gm1fjH2X1Njtxbxquxc1ueg3Nn8hXZHCJhcFT1uOqsPR4ZKGieuy0tVVUtfkHM0s1U+vXCwhh/tYp/et9r7v2m5Ks7HZ95lutzvIJWkdYxCqxxvCCkYDO1fDMus66kUoijBd2+wtNr5h2FLuQPC8jVJFBq0kRgDP+iaTU+dOAr0NIIA/p/t7f1PJ98s6j1r/q+XU554E56LL8gM1jBjquneSNv4bhMsK1lsQJcjDHDBRMwv8AvOYgAPwZB/j7yR9lNqvbe2u7+VGWG5mj8MHFRHqq4H8JLUB8yh8uoU9yb+2ut02yxhYNNAG1EfhLlCFJ9VC6iPIN0QDa9Ni3kmqMzkNw4Kj1RU8WeweMGSgo531MVrIjX42SRHIXSscyyWuQCeDkNust/Fbn9220FxdcfCkk8PUBx0sEkoaVyUKnIJFSQDYFtpJ447uQpbmpJA1MMUrpxqHrkU9CRQmGwPSGxs9BT7gyfci5zEyKCYcTjJkzDnSXemdsjWVk2OqVDC6y0zEXuQByYsvufedopZNt2725eC9GNc0y+CPmNCIHX5rIMcKk4E8e0cs28a3F1zOhi010RxnxD8gKsVJ8qrT1px6g9jZDY+3Nu1eA2xSQY6Mfbw0FFFWCXMPWQ1CVQzOXqVeSoNUssIbkhFAWJAFAsKOV7Le2ZbrfL36i/kOuRgNMSginhQrQUjUY/iY6nbLU6C+4XNvfX0b2FoYdvjXSinLMPNnP4nY+mAKKOHXtl/Iatw9CtHWVNdQTgAPJTQU9dQVD2s0opKkP9pPLb1BEYH+oHAY3/wButi324E15t8UslKBtTRv/AKUvGVLKPKpx0osN333ZkdNs3FkgJrpNGA+YDgqPmQAT516jbv76lyiN9pJX5St0lYajIItPQUrOBeSKkje7yB15UJGDa5Yj2r2LkjbdlRorK0jt4Ce7RUu3yLNUkfaxp6DpNe3m67tIJd2v3l08KnA+xRRVBwcDPma9HS+Afwi3n2ZvnAd7dv4iuxXXmCr6PdG3aLNwNDX9h5ynmWrxNRHQVCCRdp0U8KVDzSosVaBHDCskbyPHm17C+ye4bxuW2c3cxWDW/LVqyyQxuKG5dTqjKqeEKkBmZhSXCqGVnYH+y7Q8kkdxPGVt1oQD+Ig4+dMVNeNRxz1sUj6e+gIFMdDbrv37r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//V3+Pfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvdEK+enxx3T3fsbb26etIqeo7P6vqsrX4XFVMogh3Vt3M01Mu4trrIzRQjI1UuMpJ6NpXVBLA0epDNrXH77wvtTce5fLFrJtMYbf9vd3jUkL4sbgeJEpONZKI0ertqpQ011BHvu2HcbdDH/AG0ZJA9QeI+3GOqH8r3nuzac1VtjdmI3ttjPY0mkyGBysT0OQoJUBVqecZJaLKUxW1gGiHH4sADyg3L2j2yw3aZdy5dhh3BHOtJYWjcNXOuJhprXJBWpPHB6Ch3fmaGE2P73uFjApQswIHCgOWH7cD5dBlFD2D3ZkocTtzCVEeKFQr1M7NL/AA2ncn1VWYy8kSRFowWZY1XWw/SjsB7UbrvnLfI9k91u1+iyhe2MUMjgcFjjrq8gNRoo/EyjhXZthv8Ac5wtnCzux7nNQoqcktSn5ZJPDo4FV1JtrZHVyYaOOGuqqN0mymRlhRHzVZkpIaWvWWM6r0viYLFEdRSOJeSdRaCOWvcLe+ZfcJ5JXZduuUdViBJSJYlZ4yP6ZI7mwGZzwGkAdc08sbftfKgljAF/bup8Tgzl2VWFeNBUEDNAMcWqD3SvSU2UrNx5LI5Ouo9qLlKrG01BRVBgnyy0VVIitPUJ+5FHEPSxQqzi45ViPcge5XuWnLcVjYWFtHLvskYclxVIlbz0ilSxGBWg4nIFQ/yryt/WP/GbptFhGaEj4magOlSagAChZqHiAM1KmWq+kuuJ6BqGn25Q0V0IEqRLNdittc0VT5YZOfr6VLc8g8+4RtPd3naC6W4uNyE8NcxsqqKegZFVgaYrUitMEcZBueQOX5oDHbxSwz+TiR2INMVDMVPzFBUeYNCCHdm7HXrvP0+YxdLRSRUGYEFTjq6jgyeKNXAzT07PQ18c9PVY2uiiOuGYMvNvo2lcueTeZ/3tabfukKqwZFlUOqsCP4XUjS2k9pqCDnjSphmaKfbtwurC6obiFyCaVDUPz8iKEfbnrYn+InWnxg7I6o2B3dtDonrXAZ/N49v4gv8Ad+jy1Rt/c+GranEZuHFVGZSuqMeqZKhlamlj8cr0siEmzG/VP2q5d9t+YeV9i5y2rkjboL2ZO4eErmKaNjHIEMgYr3qSrDSShFTQnofbbBYT28NzFaoGPyrQjBpXhn0oadH1sfp/vP8AviD7nClanzr0bdch78OA69173vr3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//9bf49+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvddXt71UevXuiu97/KfZ3TE425Q4nI9idiz061EWyNuVFNA2Lp5ESWCu3fmphPBtegqo5VMV4aismDBo6d4wzrBXvH94X2+9l7QDmLcFk3l17LZHUNkVBkY18NSDVe13YZWNlqwRz3bLJ9PbW0k92RXQgqaerngo+Z6qF+T/yH+RPc+1pcDuLq7qPB4CLJ4rJ0c1NTbjyu5qR8dVGpioDuWqydPi2o62WySxtQQCQcgq2kjAjnT7223+8dhc8sLa7bFbOwZSgl+qXQdXZJJIoKmlXCwn504gM7/wDvsWrLuWytDaEjvpq0+gLKzAVPqPTGegO2B8mMdqh2rvbbtTgc3SaKGF8asDUFXMtgsctPUS0rY2ebgqA0sclyQwuoOFfNPshfz3c258u7tDLYysXKzGQMlc4ZVfxAM0qFZRQGtCehPtXuBbW9hDHuVpI0qKBqiC9wHnpZk0k+dCfy4dR+1+56H7TwMUgjhLy0eJWZZa+uqgjeCSrEdxTUyX/ppW/1dtIAo5B9tY+X5GupJvG3F10l6USNKgkKDxJPFjmlAAorUI8y813PM3h29vAYdtQ1yQWc0oCSMYqaKtaVqSSBQVOh9w43I7Ew1BDPEauGjimZCf3KgSRR+aW9z5JYqkPHKBcgrz9QTGHvJsd/a8yS7u0TNt8oC6hUhGWo0n0BWjL6kmnQ79u9ztH22XaTIq3kMjNpqAWRjUMB504NStAASKdDBk8rQYellrchUpTQopKl2Akdwt/FEn65pTfhVBPuLdr2m/3m7jststmkmYjgO0A/iY8FUepI6G+4bjY7XbyXV/OiQD1NKn0UeZ8hTqunv3c1PlCYf01eUyv8TFOSGeCgp45oYvIQSQ7GRVB5B0Nb6e83eRtl/c222NiGqtvAIy3kzYLU+01PyHHrHG7vG3Xdr/cypVZXJAPED8I/JaV6MV/Lo+QO+eoe79j9ZZDKVlR1r27kKfFVG2qmoeekx2czbTUW3NyYeB38eOr6nLQwwVPj0rU0kt5Fd4oCmXX3efcTc+Xuc9t5aN478ubjP4DxMSVSdxSOWME9rlyiOVoHQkMCyoVONjv3hvEt9RMLnSR5AngR864/w5pTZtHvpEOh7137317r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r/9ff49+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvdB321vyHq/rPffYU0MdT/AHR2vl81T0krFY66vpKSRsbj3YPGVWvyJihuGFtf19hzm/f4uVeV+YOY5l1JZWcs2nhqZFJVa4Pc1Fx69J7u4Fra3FyRUIhNPWgwPz6pUwU1bkqV9yZqtky2491yf3k3Fmqkj7rJ5TKKtVI8rKB44qeORYoYltHTwoEjUKAPfzP+7fOe/c88/wDMu98w3rzXrXcq9xJA0uVOkE9oalQBgLpUABQALOVrVLbZbW5BDXNzGssj+ZZxqAr6KDpUVoAPmenaphgnp5oKpY3p5Y5Ip1kChHhdSsge9hpKXv8AQf7b3HttPPb3UNxbOVuUZWUr8QINQR86+X8s9H08UM8EsFwAbdkIYNwpShrngfP7aj16qw7qpKWDJYatp/8APVENfBK6ka3go5aZqWR/0nVaqcarX4t+Le+gnL0kz28qyggjSSPQsDUDz4jyz5/PrFy1NDMiElAcV/1Vqaf7HQ+9X/GPaOawG3N27ky2YyozWKoMu2HiWLFUqNXU8dQ8FRUo9RW1MMeuwdHp2bg8XI9wLzp70b/t26btsWz7fbwtbXDxeKdUjHQxXUqnSqmgyGD6cgV+LqXNj5J226tLLcLy4kdZUDaBRQNQrSoJJ4+Wny6QW+8LuDpzdNdRbdiXMbXrKkVdBjHZvvqB6pBPJBRrD++UW7epFkQBbsoPqaTeT98teduXLLcb5RFfaSkpp2MyErXNcGgIBNRWlT1HnMO0x7Vu91YLK36ZUo3mVYAipHmOBOPUcadITMdz5yo8sUeF+0rEULJJk6ypr5YQdNmMT01Ey6QRbUSv04N/YpsuX7KNVMEq+E3ARqqqfXgSONfy6KZYJXet3O7P51rUfKrVPl0lcRg3z877t3jl4KbEPK8s881TE1bkXgOlqOmp4WMkSpp0aQoYLwi/Qgxnn+nAs7KAmelAKGi18yTQE/6j1pn8IGGFf1P8FfXo7PwJ6qzvenym25vmjxktLsLqPIY7dWVrzCy0tHLh45TszCRuo8JyeTzNKs/iB9FPDO4v4wDPv3cuRNw33nnadw8MnbNrlFzcSEdviAloYweGt5ACK/hR28gCe8vWLyXULUPhxnUT5V4gV+3P2dbOY+nvpsOHDqQuu/e+vde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf/0N/j37r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+690CfyP2NmOyeie19kbeIO4M/srNU+AjJRVqc3TUxrsRRu8noijrshSxwsx4VXJ/HsF+4uwz8z8i817DaZvLmxlWMY7pApZFzwDMAtfKpPSPcIGubK6gT4mQ0+3rXx657qhTGjD5Gkc1+OMlLVYqWQ0eYxFVC7rU0NVSVUSzSR006sqsQpW1jcgqOBHPftA19u9zfWtwbW7ZyJFdCVLDBI/FG+KOtDU1NBUliPYeeLnYbUbZuFm01tGSEYHSyip7TUUYelcjhkYE3fXc1ImLmgeSHBUU8bfcSz1Alr6uPSwenpoEXXpkAKsEDOQCOBf2l5R9poNsv4dwv7gXd1GaooWkat5OSSdRXiK6QCKkE0pXfuf7veLaSw221aGBxRmrV2Wh7cUCqc1yxINBTNSL5nLf6QN2UvlqYcPi9cVIlXXsEhxeMWa9Tka3QTd1V2dlQs7NpjTUdN5+Eb7Tt07RQme7RC4QGhkccEBNANRAFSQBkmg6B9rFHGYkmfTGXUM1CaVIFaAEmmTip+Xl1YfTd29N7bxNBiKLdVK8GJoKLG4+kgosirNTUVPHTUyJNJRRUqqsUIGsusdhwR9PeHje2PuHvW53F3ebKySzzPJJI7x6QzsWdiA5bJJoACfKnHqczzby5t9ki2954iRRhVRVYkgAAKKrStAOJA+fl0p+vEx+5KL/AEhyxU9Rk9yvPLSz/tznF4qGZqKixdNJykeiKlUzFbGSYkk/RQi55lvNinj5Htp3XbLCNdYyvjSyKJXkYDiCZNKKa6QMcSTrlmCDcll5muIVN9cu1KipjjRjEij0NF1McEkk8Os/Z2KxlftaumrqeGSWnWBadpFVncVE8VPLTNfmSGaGRgU5Fxcjge7+1u5blac1WVlazP8ASz6xImadqMwfyAZWAo3GlV/F0n5/srKbl+5vJUAuodJjYAagSyqVxQmoJqM0+LiMFn+F3x96772+SOW6z36u45dr4zB7mzdNDtzIRY6SSpwWXxUFPR5esloK+YYmWjqpYZPt2ppzMYysyWKt069ieTdl9wubbfZ+ZFuDZ/RPNSJgmp0MWHbSx8MgtULofUVIccDFOyWsd9cLFcFtOgntNM4OeOM+VCPXrZ167602L1NtXH7J662zjNp7ZxoLU+NxsTDyzukaTV1fVTvNW5TJ1KxL5qqpklqJSoLubD30v2Hl3ZeV9rh2fl/bo7XbY8hEHFjSrMxqzuaDU7FmamSepAgghtoxFBGFjHl/l6XY9nfT3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf/9Hf49+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvddEX/ANb/AH3+296pnr3VfPyT/l0dN/IPP1u+KOuynWfYGSby5bO7epaWuw+eqtKr9/ndt1D00c+SIQaqilqaOSYktMZWIYQT7h/d/wCUefL6beoppNu32TLyxKGjkY41SREqC+BVkeMtxfUc9E19stteOZQxSU8SMg/aD/kI/b1VXvL4dfFfqTcM2O7G+X+V3dU4+SaPLbZ6y6grsnno6mC7TUVTn6Dc289v4TIIyeMxVqrIjsNSgBveLG9+2ntJyVubWPM3vEJriOuu3tbOswI4qXWaeONqgDS4BB4gAE9Byax2q0lMdzutWHFVXP2V1MAfkc1r0m+mtv8AQmUqauo2vDQVWbmeSojweZqaysyuDoUYLFSK2Vo6B8lUQRopqqqCCOFpyWjSJNKLzq95+audYN4vDte23G18neLSArIJC4HwmWdODtQUX9OpqdAwiDHlPZuWr6LxJ5Unv2FfCYkhF9ArU1mlCzdwBNFoPiEXszrba2T25XT/AMJo42o4xJJCqaYZ4dapIFRWAhqI1OpJE0OGH1H4Bft17gcwJv8AabZfX0s9tcEgFsujUJBDcSpoAVYkZxTze5x5T2qHaZ9y262W3uoAGOjCutQCCnw1zUEUrwNa0BMOuexsp0zvbL4CSr+42vUTOtRS1zVEkNM7RLU4/IwxwHVFVSQyJHKyLaRXuQ2hLT5zhyLtXPm3WlzMpi3KMdskYXURwZG1YZQe4AkEEYpU1BGxczbhsqO9sqyQvkxtXTX1XIoePlnz4AhadgfII7hiShw7NkayRhHQUlDR1MdBFVzEQpNItRapr6q7WjVQykkgFb8peTfbCw5clLQQSPcvRS70aRhWoRQoCqCeIAq2CdRCgJ9637eOZHhS/KpbLkRrWhPqakknyycZAAJPVt38sn4m7q6lxe4+6uz8XU4be+/MamF23t/IRtFl8HtKWsgymQrs1DLpkpMpuPIUlMy07qs1PT0oMnqnaOLqf92/2q3DlKzvObOYLRrfdbyERQwsKPFb1DMzg/C8rKlF+JFQE5cqoi2HbXtVa5nUiRhQA+QxX9pH20Hz6tn95TdCLr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6//S3+Pfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvdEd+ZPa2T27S7V6q23k6jFZPsCDM1+5MjQTNBkqPZuHjp6eox9HPGUnoanc1fXLCKmNg8dNTVKqUd0dcKfvu+9e8+1PtxDtnK1wYeY92LR+KPihhBVXZT+FnL0VhWgRxgkMGkjF7uNhtZcrHKWZyMHw0FSAfLWaLUZA1EUND1X1HhMNDSCgixWPShRPGKVaSAQ6QuixTQQfTwSeSL3v74QSb9vc15+8Jd4uTfFtWsyPqqTWoNfUYAwOh4No2tbc2a7fD9ORTRoWh4CtKUr6k5Nak9V6d7YyDZm7aXcW2JmxuUx2cVKeqptIl8iQrWU7P8AiVqORDEdd9aNpcEC3vMjkW6fmjlK1g3yFZYrm2IkVuDCpQmg4axRsUCn4fI9QJuCfuTmO/t9ulZUgmrHTivA0r6KTTz4ZrU9GI3b27jMjsqhqQwo6fI4nGZDMVUqtHFG09NT1b46kRwKiZjP6fpdgNK3vf3F/JftfdbRzFcX1+QzQSyLboCGJGpkErkdo7KlVFaE1ahUDoR8086xbnt67TtyNWRV8VqaQCCGKKDkgN8T4HkKgk9FT6q2k/cHaVTU11LMNv05qMpl2EcbiGlEElJiaNy6vAaiomWNStjqRJCAdJ9yrz/zWvI/KyTW7o25yMqQqxNGOoNIxCkHSq6jWoozKMVHRNyzsJ3m8W0cstoiEuy0BAodNCQRqLU41wGNMdLbd+Fz/wAet9YvsXrLLy7fz+1crTVtFV0wjnhRapSsMwpaoTwSU04lMFTTSCSGRWIAC/UQe0/uVucw2fmjabhrbdYiWRgAxV0w4NRpdGFcMO5TRhk0R7haXPLu9S2Bn1PHRkegBKkVFRkcMN8weOD1svfF3vCn+Q/SOy+0RRxYzKZamqcfuXFQGRqfHblw1XNjcvFSmQu/2FVPT/c0wZndaaeNXYuG99jvbbnOPn3k3aOZRCsVxKrLKgrRJY2KOFrnSSNaVJIRlBNQeh1YXYvLWOelGPEfMGh/bxHy6MF7HXSzr3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de6/9Pf49+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691VL/Mm23urblV1r3xgqOryO3dp02V2lvkU0Jqv4DR5arpKzAZ2opY18j4mSr+6pKxyR42ng0+pveDn31fbKfnTlzaN6W3aWwtkkhnC8Yw7I8Uox2gSAqWNVB8MGgY9B7eHvrG6sN529qT25Naiq0OMj0IqCajiKUORW9XfJfAnGGWmqsRSztHczrVT1kqllazx4z7ZKkSCxsJNQv9QffKiz9i4Yr1Wu72ea2DfAECVp5NJrNR66VU0OCOr3PuRustu0NttMcdyRQPr1AH1CkAV88sw9a8OiyS4/cfeebrpsbNSYXa23YpqvL7s3TNV02EoJ61ZpIDk6mho8pW1eaz09K0OPx1JBV19W6t44mCzMmT3KPKEjWs4hkt7TbbaIGWeRjHbwIFIjQsqsSzU0xxxo0khHYhVGIA8MMsxnmnmq7ks7scVNT3HiSxrSmT0k8h1/2XUJDPk8TlshjKMrFTStVx00D0kRCKcdT5DxTUizwoCgamVwCLoDdfYeG9bAs9zaWW6W7XdW+CpzU0YqNLFcVIOk0wdOae8EwoJpbd1t2PxaWCkYyGK0zXBz5YPDo1fT3b/Ve0qWPZL4LLbCqhKXnqc7orTlKxl0+XI5Snp6aZauVAAganigUWVCBYe8efcL25593y8ffP3hDuSmgVIv0vDSuAkbsRoUnJEhcklnrk9Sly7zTy5ZW30q2724A1Fj36iAalmUaixHAaAOAWmAQ4+Qm9qbKx1lPGQk2XlpY4KVivnixlBJHKtRMq6vGZqiAcf1YgEhSfcqe3HLUvL+1WdnI4Z4wzOwwpkepIFckKDpBoK6QaCtOo43rdP37vl1uiR6bfCoD/CooK+hbLEeVaVPV7n8svYeW2R8Ttoz5mCejqd8ZvcG+6alqAFkjxOXlpsfhKgLoGmDJ4nDw1kXL6oqhWuL6V68/dz2W72f2v2qS7jKPezS3KqeIjkISM/Y6Isi8e1xkcAM9iiaLbotXFyW/I8P5Z6sBH09zt0cdd+/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r3v3Xuve/de697917r//U3+Pfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvdR6qlpq6mqKOtp4KyjrIJqWrpKqKOopaqmqI2inp6mnlVop4J4nKujAqykgixPtuWOOaOSGWNXhZSGVgCGBFCCDUEEYIPHrxAKlSBQ9FHzHwJ+IWbzRz9d0dtmKvM0k5ixeR3NgsOZJRZ77cwecx+3jGbcIaUqpNwAefcWXXsf7UXd39dNyXbCepNEaaNMjP6UciR0p5aKfn0WnZ9td9bWq6vtIH7AQP5dVz53IbT3burLy7M25hdsdabNzmV271rtLBY6jx2CpKTHSpQ5HeRoqOOKCqz+7ail871cqtVCmEMTOfHf3xi++J7tz73zrccgcpxpt/Im2l1iggURRyNUo8rBAAzSaCxZqsyFFb4DU45U220vHuNzeBfBilKQpQFV0AapKcC7NgE5UKKGpPXckccsbxSokkUilJInCskiMtmVlYEOrDgg3Bv7wqjllglSaGRklQ1DKSCCOBBHA1FRQ/z6H8iRyo0ckYaNhQgioIPkQa1Gf89eq8/kZtrG0M9bU0kSJNjMlTwwug9Qoq+ATvRFiNRSnml9IN9NmA/UfebftpvF5umwbXdXjfrSwnUTirI7JroD+NVrUca+XDrHDfLKHbOYt0sLYD6ZWBUfw6gr0HA9urTwrgdGk+AnwaxvyJgi7n7P3D93sDb+5ZMHBsylNTJltzZHB0uNrHps3kKhPDj9tLHXQxmOAy1FUgkTVTgK7Zy+xHsjY87xJzZv10o2CC5ZBboO+aRArMJGIokR1ioUs79wrHxJns20JdAXMrUt1YjSPMjPH0z9p+Xnsb0lLTUNLTUVFTwUlHSQQ01JSUsMdPTUtNBGsUFPTwRKkUEEESBURQFVQAAB76CxRRwxRwxRqkSKAFAACgCgAAwABgAYAwOhsAFAAFAOpHtzrfXvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691//1d/j37r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvddfn/G3vXn1r/D1rLdfbom63r9ydX7uiqYszsTP5LbGXj0j72mr8HUNi2rGich6nH5OCjjljlTUDquutWv7+fD3w9o93bmjc1jITeLaaSF1kqBJodqENkA1JIJw6MpqBQkN8tc0x8sy3m17nG5tGlZgygEoxwajiVNAcGopgENgR8p2ng6enc4xajI1TA6BJC9NTRv6hqnkl0SFVPNlBueLi9xDW0e0m/3N1GN0kjtrMHJDh3IHEKFqoP2kU9DwIo3L3I2a3gY7bG890R21UqlfmWo2PMAEk4NKkggHbe9juStXD0NR/EZpcgavJVNNeRamvdnSGjgEQIfxtMxIS4B0qv6SBlhyzsse221vFbwFYljWONeLaRSla5JNMebZOa9RAHnurie+uiTcysSa4yTUmmME8AMAfLrZl+DHS2U6K+N2x9pbippKTdeX+93nuuhlQxy47MbldKmPFVETXMdbh8RFSUlSLkfcwSEHTb31v9l+ULnkr2+2ba7+Mrucpa4mU4KPNkIR/FHGEjb+krHqS9qtmtLKKOT+0OT8ifL8hQdG99yt0Y9e9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf//W3+Pfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3XvfuvddXH9R/t/fuvdcTY/kf7cc8H6+9EV49e9e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SKP+v6VH+9+9a29evUHp1JTr+hX6xRj/AJJ/43b37W3r16g9Opcex6JR/m0H+2/4p9fetTevXqD06mptGjS1lQcj8Djn8cD+nvXHrfUtds0a/QLb/W5/3r37r3UpMFSLb0j/AB49+691KXFUqjhB/r2Hv3XupC0VOv0Qf7Yfj37r3WYQxr9EXj/D37r3XMKB9AB7917rv37r3Xvfuvde9+691737r3Xvfuvdf//S3+Pfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691/9Pf49+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3X/1N/j37r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvdf/V3+Pfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691737r3Xvfuvde9+691/9k=]\";s:11:\"ans_textbox\";s:248:\"id:0|title:1 Banana.PNG]id:1|title:1 apple.PNG]id:2|title:green grapes.jpg]id:3|title:1 Banana.PNG]id:4|title:1 apple.PNG]id:5|title:green grapes.jpg]id:6|title:1 Banana.PNG]id:7|title:1 apple.PNG]id:8|title:green grapes.jpg]id:9|title:1 apple.PNG]\";}', '<p>incorrect</p>');
INSERT INTO `questions` (`question_id`, `question_name`, `question_desc`, `category_id`, `country_id`, `grade_id`, `subject_id`, `q_score`, `status`, `topic_id`, `form_data`, `qWrong_feedback`) VALUES
(322, 'Image Question with Double Text Boxes - What colour is the number 2? and number 3', '', '58', '251', '1', '3', 10, '', '94', 'a:9:{s:8:\"question\";s:81:\"Image Question with Double Text Boxes - What colour is the number 2? and number 3\";s:15:\"question_option\";s:2:\"28\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:5:\"Yasss\";s:15:\"qWrong_feedback\";s:11:\"<p>Nooo</p>\";s:3:\"img\";s:51:\"http://www.applekitch.com/uploads/images/Blocks.png\";s:15:\"second_question\";s:41:\"What colour is the number 2? and number 3\";s:12:\"ans_textbox1\";s:3:\"red\";s:12:\"ans_textbox2\";s:6:\"yellow\";}', '<p>Nooo</p>'),
(323, 'Drag and Drop: Place 2 crabs on the beach', '', '58', '251', '1', '3', 10, '', '94', 'a:9:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:41:\"Drag and Drop: Place 2 crabs on the beach\";s:15:\"question_option\";s:2:\"29\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"well done\";s:15:\"qWrong_feedback\";s:16:\"<p>incorrect</p>\";s:11:\"ans_textbox\";s:1:\"2\";s:10:\"base_image\";s:52:\"http://www.applekitch.com/uploads/images/OEMBVY0.jpg\";s:11:\"extra_image\";s:51:\"http://www.applekitch.com/uploads/images/seas13.png\";}', '<p>incorrect</p>'),
(324, 'Drag and Drop: Place 6 robots in space', '', '58', '251', '1', '3', 10, '', '94', 'a:8:{s:8:\"question\";s:38:\"Drag and Drop: Place 6 robots in space\";s:15:\"question_option\";s:2:\"29\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"well done\";s:15:\"qWrong_feedback\";s:16:\"<p>incorrect</p>\";s:11:\"ans_textbox\";s:1:\"6\";s:10:\"base_image\";s:51:\"http://www.applekitch.com/uploads/images/galaxy.jpg\";s:11:\"extra_image\";s:52:\"http://www.applekitch.com/uploads/images/Robot-2.png\";}', '<p>incorrect</p>'),
(325, 'Multiple Tex Box with Images', '', '58', '251', '1', '3', 10, '', '94', 'a:9:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:28:\"Multiple Tex Box with Images\";s:15:\"question_option\";s:2:\"31\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"Well done\";s:15:\"qWrong_feedback\";s:16:\"<p>incorrect</p>\";s:14:\"ans_check_with\";s:8:\"How many\";s:8:\"option_1\";a:2:{i:0;s:1:\"3\";i:1;s:1:\"3\";}s:4:\"imgs\";a:2:{i:0;s:54:\"http://www.applekitch.com/uploads/images/3_Carrots.PNG\";i:1;s:52:\"http://www.applekitch.com/uploads/images/3_Pears.PNG\";}}', '<p>incorrect</p>'),
(326, 'Multiple Text Boxes', '', '58', '251', '1', '3', 10, '', '94', 'a:7:{s:8:\"question\";s:19:\"Multiple Text Boxes\";s:15:\"question_option\";s:2:\"32\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"well done\";s:15:\"qWrong_feedback\";s:12:\"<p>wrong</p>\";s:12:\"ans_textbox1\";s:35:\"Jack and [jill] went up the [hill].\";s:11:\"ans_textbox\";a:2:{i:0;s:4:\"jill\";i:1;s:4:\"hill\";}}', '<p>wrong</p>'),
(327, 'Copy of Multiple Text Boxes', '', '58', '251', '1', '3', 10, '', '97', 'a:7:{s:8:\"question\";s:27:\"Copy of Multiple Text Boxes\";s:15:\"question_option\";s:2:\"32\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"well done\";s:15:\"qWrong_feedback\";s:12:\"<p>wrong</p>\";s:12:\"ans_textbox1\";s:35:\"Jack and [jill] went up the [hill].\";s:11:\"ans_textbox\";a:2:{i:0;s:4:\"jill\";i:1;s:4:\"hill\";}}', '<p>wrong</p>'),
(328, 'Multiple Image and Text Box', '', '58', '251', '1', '3', 10, '', '97', 'a:10:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:27:\"Multiple Image and Text Box\";s:15:\"question_option\";s:2:\"33\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"well done\";s:15:\"qWrong_feedback\";s:16:\"<p>incoreect</p>\";s:10:\"qst_layout\";s:1:\"1\";s:15:\"second_question\";s:6:\"hello \";s:11:\"ans_textbox\";s:1:\"1\";s:4:\"imgs\";a:5:{i:0;s:50:\"http://www.applekitch.com/uploads/images/sea11.png\";i:1;s:50:\"http://www.applekitch.com/uploads/images/sea21.png\";i:2;s:50:\"http://www.applekitch.com/uploads/images/sea31.png\";i:3;s:49:\"http://www.applekitch.com/uploads/images/sea4.png\";i:4;s:49:\"http://www.applekitch.com/uploads/images/sea5.png\";}}', '<p>incoreect</p>'),
(329, 'Copy of Multiple Image and Text Box', '', '58', '251', '1', '3', 10, '', '97', 'a:9:{s:8:\"question\";s:35:\"Copy of Multiple Image and Text Box\";s:15:\"question_option\";s:2:\"33\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:9:\"well done\";s:15:\"qWrong_feedback\";s:16:\"<p>incoreect</p>\";s:10:\"qst_layout\";s:1:\"2\";s:15:\"second_question\";s:1:\"2\";s:11:\"ans_textbox\";s:1:\"1\";s:4:\"imgs\";a:2:{i:0;s:49:\"http://www.applekitch.com/uploads/images/sea6.png\";i:1;s:49:\"http://www.applekitch.com/uploads/images/sea7.png\";}}', '<p>incoreect</p>'),
(330, 'Image Question with Image Answers: How many carrots are there?', '', '58', '251', '1', '3', 10, '', '97', 'a:10:{s:11:\"question_id\";s:0:\"\";s:8:\"question\";s:62:\"Image Question with Image Answers: How many carrots are there?\";s:15:\"question_option\";s:2:\"34\";s:7:\"q_score\";s:2:\"10\";s:15:\"qRight_feedback\";s:7:\"correct\";s:15:\"qWrong_feedback\";s:12:\"<p>wrong</p>\";s:6:\"answer\";s:14:\"4_Circles1.PNG\";s:9:\"img_array\";s:111:\"http://www.applekitch.com/uploads/images/3_Circles2.PNG|http://www.applekitch.com/uploads/images/4_Circles1.PNG\";s:15:\"second_question\";s:28:\"How many carrots do you see?\";s:3:\"img\";s:54:\"http://www.applekitch.com/uploads/images/4_Carrots.PNG\";}', '<p>wrong</p>');

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
(2, 'Select an Image', 0),
(1, 'Image and TextBox', 0),
(3, 'OnlyClickableText', 0),
(4, 'QuestionWith1stCapitalLetter', 0),
(5, 'Question with Arranging Option', 0),
(6, 'Clickable Text', 0),
(7, 'QuestionWithTextBoxAndClickableOption', 0),
(8, 'SelectMultibleImages', 0),
(9, 'Only Options', 0),
(11, 'TextBox', 0),
(12, 'SVGImageWithOption', 0),
(13, 'QuestionWithTextBoxAndOption', 0),
(14, 'Question with Check Box', 0),
(15, 'Clickable Images', 0),
(35, 'Shapes of everyday objects', 0),
(18, 'Question with DoubleTextBoxes', 0),
(19, 'ImageWithTextBoxAndOption', 0),
(20, 'Image and Clickable Text', 0),
(22, 'Clickable Image with option', 0),
(26, 'Image and Options', 0),
(27, 'Question with Put Images', 0),
(28, 'Image Question with Double Text Boxes', 0),
(29, 'Drag and Drop', 0),
(31, 'Multiple Text Box with Images', 0),
(32, 'Multiple Text Boxes', 0),
(33, 'Multiple Image and Text Box', 0),
(34, 'Image Question with Image Answers.', 0);

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
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `secrete_key` text,
  `publishable_key` text,
  `client_id` text,
  `paypal_email` text,
  `paypal_mode` varchar(20) DEFAULT NULL,
  `protocol` varchar(10) DEFAULT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_port` varchar(10) DEFAULT NULL,
  `smtp_crypto` varchar(10) DEFAULT NULL,
  `smtp_user` varchar(100) DEFAULT NULL,
  `smtp_pass` text,
  `social_media` text,
  `fb_app_id` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `secrete_key`, `publishable_key`, `client_id`, `paypal_email`, `paypal_mode`, `protocol`, `smtp_host`, `smtp_port`, `smtp_crypto`, `smtp_user`, `smtp_pass`, `social_media`, `fb_app_id`) VALUES
(1, 'sk_test_Wpbzd7anzuZefMrGUHdAk5Db', 'pk_test_ziCnvgJXeeT1QR88PaEervZ7', NULL, 'ARlI6-HtIy-KKf1RhYPG5va5kJKBxgDMD6omN4KV7v79D65VWMUqxbHQ9Do2RVt-_75LeQV-JEoN-be5', 'sandbox', 'smtp', 'smtp.sendgrid.net', '465', 'ssl', 'apikey', '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', '{\"facebook\":\"#\",\"twitter\":\"#\",\"google_plus\":\"#\",\"instragram\":\"#\",\"youtube\":\"#\"}', '1972593256374089');

-- --------------------------------------------------------

--
-- Table structure for table `student_ans_topic`
--

CREATE TABLE `student_ans_topic` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `certificate_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `submit_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_ans_topic`
--

INSERT INTO `student_ans_topic` (`id`, `user_id`, `certificate_id`, `topic_id`, `subject_id`, `grade_id`, `submit_dt`) VALUES
(1, 14, 1, 16, 2, 6, '2018-08-28 00:00:00'),
(14, 13, 1, 5, 2, 0, '2018-09-20 15:12:09'),
(15, 13, 1, 18, 2, 0, '2018-09-20 15:14:04'),
(16, 13, 1, 19, 0, 0, '2018-09-20 15:17:07'),
(17, 13, 1, 15, 0, 0, '2018-09-20 15:39:51'),
(18, 13, 1, 9, 0, 0, '2018-09-20 15:40:15'),
(19, 13, 1, 9, 0, 0, '2018-09-20 15:41:34'),
(20, 14, 1, 21, 0, 0, '2018-09-21 06:55:03'),
(21, 14, 1, 21, 0, 0, '2018-09-21 07:57:29'),
(22, 14, 1, 21, 0, 0, '2018-09-21 08:44:15'),
(23, 14, 1, 22, 0, 0, '2018-09-21 08:56:33'),
(24, 13, 1, 22, 0, 0, '2018-09-21 11:29:45'),
(25, 13, 1, 3, 0, 0, '2018-09-21 11:39:34'),
(26, 13, 1, 3, 0, 0, '2018-09-21 11:41:54'),
(27, 13, 1, 3, 0, 0, '2018-09-21 11:43:11'),
(28, 14, 1, 20, 0, 0, '2018-09-26 10:41:08'),
(29, 14, 1, 16, 0, 0, '2018-09-26 10:50:11'),
(30, 14, 1, 16, 0, 0, '2018-09-26 10:50:57'),
(31, 14, 1, 8, 0, 0, '2018-09-26 11:10:40'),
(32, 14, 1, 39, 0, 0, '2018-09-26 12:36:42'),
(33, 14, 1, 39, 0, 0, '2018-09-26 12:37:19'),
(34, 14, 1, 15, 0, 0, '2018-09-26 12:45:03'),
(35, 14, 1, 39, 0, 0, '2018-09-26 12:59:18'),
(36, 14, 1, 14, 0, 0, '2018-09-26 13:29:39'),
(37, 14, 1, 39, 0, 0, '2018-09-26 14:14:16'),
(38, 14, 1, 18, 0, 0, '2018-09-26 14:14:43'),
(39, 14, 1, 10, 0, 0, '2018-09-26 14:15:38'),
(40, 14, 1, 10, 0, 0, '2018-09-26 14:15:49'),
(41, 14, 1, 19, 0, 0, '2018-09-26 14:25:59'),
(42, 14, 1, 10, 0, 0, '2018-09-26 14:31:37'),
(43, 14, 1, 9, 0, 0, '2018-09-26 14:32:07'),
(44, 14, 1, 16, 0, 0, '2018-09-26 14:32:43'),
(45, 14, 1, 16, 0, 0, '2018-09-26 14:33:04'),
(46, 14, 1, 11, 0, 0, '2018-09-26 14:40:42'),
(47, 14, 1, 13, 0, 0, '2018-09-26 14:42:24'),
(48, 14, 1, 13, 0, 0, '2018-09-26 14:43:17'),
(49, 14, 1, 11, 0, 0, '2018-09-26 14:48:27'),
(50, 14, 1, 26, 0, 0, '2018-09-28 01:39:56'),
(51, 7, 1, 1, 0, 0, '2018-10-08 23:57:33'),
(52, 7, 1, 39, 0, 0, '2018-10-09 00:01:53'),
(53, 7, 1, 14, 0, 0, '2018-10-09 00:03:30'),
(54, 14, 1, 48, 0, 0, '2018-10-09 09:53:02'),
(55, 14, 1, 11, 0, 0, '2018-10-09 09:55:39'),
(56, 14, 1, 1, 0, 0, '2018-10-11 02:23:23'),
(57, 14, 1, 2, 0, 0, '2018-10-11 08:16:48'),
(58, 14, 1, 2, 0, 0, '2018-10-11 08:28:01'),
(59, 14, 1, 2, 0, 0, '2018-10-11 08:32:35'),
(60, 14, 1, 2, 0, 0, '2018-10-12 02:00:00'),
(61, 14, 1, 2, 0, 0, '2018-10-12 03:04:18'),
(62, 14, 1, 2, 0, 0, '2018-10-12 04:33:12'),
(63, 14, 1, 2, 0, 0, '2018-10-12 09:46:43'),
(64, 13, 1, 2, 0, 0, '2018-10-14 17:30:18'),
(65, 13, 1, 38, 0, 0, '2018-10-14 17:58:31'),
(66, 20, 1, 2, 0, 0, '2018-10-28 15:36:41'),
(67, 20, 1, 3, 0, 0, '2018-10-28 15:37:53'),
(68, 20, 1, 31, 0, 0, '2018-10-29 09:50:22'),
(69, 20, 1, 4, 0, 0, '2018-10-29 09:55:00'),
(70, 20, 1, 20, 0, 0, '2018-10-29 16:06:59'),
(71, 20, 1, 44, 0, 0, '2018-10-29 16:07:21'),
(72, 20, 1, 45, 0, 0, '2018-10-29 16:07:35'),
(73, 20, 1, 46, 0, 0, '2018-10-29 16:08:14'),
(74, 20, 1, 46, 0, 0, '2018-10-29 16:09:41'),
(75, 20, 1, 48, 0, 0, '2018-10-29 16:09:56'),
(76, 20, 1, 49, 0, 0, '2018-10-29 16:10:11'),
(77, 20, 1, 8, 0, 0, '2018-10-29 16:11:29'),
(78, 20, 1, 17, 0, 0, '2018-10-29 16:13:03'),
(79, 21, 1, 1, 0, 0, '2018-10-29 17:45:05'),
(80, 21, 1, 11, 0, 0, '2018-10-29 17:46:14'),
(81, 21, 1, 11, 0, 0, '2018-10-29 17:46:30'),
(82, 21, 1, 15, 0, 0, '2018-10-29 17:47:43'),
(83, 21, 1, 16, 0, 0, '2018-10-29 17:48:00'),
(84, 21, 1, 8, 0, 0, '2018-10-29 17:48:33'),
(85, 22, 1, 26, 0, 0, '2018-10-29 17:51:36'),
(86, 23, 1, 9, 0, 0, '2018-10-29 17:53:29'),
(87, 20, 1, 9, 0, 0, '2018-11-07 03:32:54'),
(88, 20, 1, 10, 0, 0, '2018-11-07 03:39:00'),
(89, 20, 1, 11, 0, 0, '2018-11-09 14:40:41'),
(90, 20, 1, 4, 0, 0, '2018-11-12 09:02:12'),
(91, 20, 1, 3, 0, 0, '2018-11-12 09:02:35'),
(92, 20, 1, 38, 0, 0, '2018-11-12 09:05:59'),
(93, 20, 1, 14, 0, 0, '2018-11-13 03:33:10'),
(94, 20, 1, 18, 0, 0, '2018-11-13 03:33:36'),
(95, 20, 1, 19, 0, 0, '2018-11-13 03:33:53'),
(96, 20, 1, 16, 0, 0, '2018-11-13 03:34:18'),
(97, 20, 1, 12, 0, 0, '2018-11-13 03:35:11'),
(98, 20, 1, 1, 0, 0, '2018-11-13 03:36:56'),
(99, 20, 1, 1, 0, 0, '2018-11-13 03:38:09'),
(100, 20, 1, 1, 0, 0, '2018-11-13 03:39:38'),
(101, 20, 1, 17, 0, 0, '2018-11-13 03:41:02'),
(102, 20, 1, 1, 0, 0, '2018-11-13 05:31:54'),
(103, 13, 1, 1, 0, 0, '2018-11-13 05:32:42'),
(104, 25, 1, 1, 0, 0, '2018-11-13 06:43:48'),
(105, 25, 1, 11, 0, 0, '2018-11-13 06:44:15'),
(106, 25, 1, 13, 0, 0, '2018-11-13 06:44:25'),
(107, 25, 1, 15, 0, 0, '2018-11-13 06:44:47'),
(108, 25, 1, 16, 0, 0, '2018-11-13 06:45:02'),
(109, 25, 1, 17, 0, 0, '2018-11-13 06:45:17'),
(110, 25, 1, 8, 0, 0, '2018-11-13 06:45:59'),
(111, 25, 1, 6, 0, 0, '2018-11-13 06:51:30'),
(112, 27, 1, 12, 0, 0, '2018-11-13 07:02:28'),
(113, 28, 1, 14, 0, 0, '2018-11-14 04:48:10'),
(114, 28, 1, 18, 0, 0, '2018-11-14 04:49:26'),
(115, 28, 1, 19, 0, 0, '2018-11-14 04:50:04'),
(116, 28, 1, 20, 0, 0, '2018-11-14 04:50:26'),
(117, 28, 1, 9, 0, 0, '2018-11-14 04:50:41'),
(118, 28, 1, 1, 0, 0, '2018-11-14 04:52:07'),
(119, 28, 1, 12, 0, 0, '2018-11-14 04:52:16'),
(120, 28, 1, 39, 0, 0, '2018-11-14 04:52:55'),
(121, 28, 1, 26, 0, 0, '2018-11-14 05:13:38'),
(122, 28, 1, 3, 0, 0, '2018-11-14 05:13:52'),
(123, 27, 1, 16, 0, 0, '2018-11-14 06:12:01'),
(124, 29, 1, 35, 0, 0, '2018-11-14 13:41:24'),
(125, 29, 1, 32, 0, 0, '2018-11-14 13:41:47'),
(126, 29, 1, 14, 0, 0, '2018-11-14 13:43:07'),
(127, 29, 1, 18, 0, 0, '2018-11-14 13:43:34'),
(128, 29, 1, 9, 0, 0, '2018-11-14 13:43:49'),
(129, 29, 1, 14, 0, 0, '2018-11-14 14:08:48'),
(130, 29, 1, 12, 0, 0, '2018-11-14 14:12:00'),
(131, 27, 1, 12, 0, 0, '2018-11-15 04:11:54'),
(132, 27, 1, 14, 0, 0, '2018-11-15 04:12:33'),
(133, 27, 1, 9, 0, 0, '2018-11-15 04:13:10'),
(134, 27, 1, 16, 0, 0, '2018-11-15 06:42:43'),
(135, 27, 1, 1, 0, 0, '2018-11-15 06:44:49'),
(136, 27, 1, 4, 0, 0, '2018-11-15 06:46:06'),
(137, 27, 1, 3, 3, 11, '2018-11-15 07:02:38'),
(138, 31, 1, 14, 3, 2, '2018-11-15 16:38:27'),
(139, 31, 1, 18, 3, 2, '2018-11-15 16:41:29'),
(140, 31, 1, 35, 3, 10, '2018-11-15 16:42:08'),
(141, 31, 1, 19, 3, 2, '2018-11-15 16:43:19'),
(142, 31, 1, 20, 3, 2, '2018-11-15 16:44:25'),
(143, 27, 1, 12, 3, 1, '2018-11-16 01:55:37'),
(144, 27, 1, 18, 3, 2, '2018-11-16 02:58:00'),
(145, 27, 1, 1, 3, 10, '2018-11-16 03:25:06'),
(146, 14, 1, 17, 2, 1, '2018-11-20 07:33:21'),
(147, 14, 1, 12, 2, 2, '2018-11-20 13:47:21'),
(148, 14, 1, 3, 3, 3, '2018-11-20 14:33:06'),
(149, 14, 1, 26, 3, 3, '2018-11-20 14:39:55'),
(150, 35, 1, 15, 2, 3, '2018-11-20 14:42:26'),
(151, 35, 1, 15, 2, 3, '2018-11-20 14:45:44'),
(152, 35, 1, 15, 2, 3, '2018-11-20 14:46:14'),
(153, 35, 1, 15, 2, 3, '2018-11-20 14:47:19'),
(154, 35, 1, 15, 2, 3, '2018-11-20 14:49:28'),
(155, 35, 1, 15, 2, 3, '2018-11-20 14:52:13'),
(156, 35, 1, 15, 2, 3, '2018-11-20 14:54:25'),
(157, 7, 1, 15, 2, 3, '2018-11-26 10:45:39'),
(158, 37, 1, 3, 3, 11, '2018-12-04 14:57:30'),
(159, 37, 1, 3, 3, 11, '2018-12-04 14:57:45'),
(160, 37, 1, 12, 3, 1, '2018-12-04 15:09:50'),
(161, 37, 1, 12, 3, 1, '2018-12-04 15:12:26'),
(162, 36, 1, 12, 3, 1, '2018-12-04 15:13:37'),
(163, 36, 1, 16, 3, 1, '2018-12-04 15:13:45'),
(164, 36, 1, 14, 3, 2, '2018-12-04 15:14:09'),
(165, 36, 1, 18, 3, 2, '2018-12-04 15:14:26'),
(166, 36, 1, 19, 3, 2, '2018-12-04 15:14:47'),
(167, 36, 1, 20, 3, 2, '2018-12-04 15:15:03'),
(168, 36, 1, 9, 3, 2, '2018-12-04 15:15:15'),
(169, 36, 1, 1, 3, 2, '2018-12-04 15:15:26'),
(170, 36, 1, 39, 3, 2, '2018-12-04 15:15:45'),
(171, 36, 1, 26, 3, 3, '2018-12-04 15:16:45'),
(172, 36, 1, 3, 3, 3, '2018-12-04 15:16:57'),
(173, 37, 1, 14, 3, 2, '2018-12-04 15:21:47'),
(174, 37, 1, 18, 3, 2, '2018-12-04 15:22:02'),
(175, 36, 1, 56, 3, 2, '2018-12-04 16:00:01'),
(176, 36, 1, 57, 3, 2, '2018-12-04 16:04:49'),
(177, 36, 1, 57, 3, 2, '2018-12-04 16:07:00'),
(178, 36, 1, 57, 3, 2, '2018-12-04 16:11:43'),
(179, 36, 1, 56, 3, 2, '2018-12-04 16:14:46'),
(180, 36, 1, 56, 3, 2, '2018-12-04 16:16:54'),
(181, 36, 1, 56, 3, 2, '2018-12-04 16:26:36'),
(182, 36, 1, 56, 3, 2, '2018-12-04 16:32:28'),
(183, 36, 1, 60, 3, 2, '2018-12-04 16:56:19'),
(184, 14, 1, 64, 3, 1, '2018-12-11 08:05:09'),
(185, 14, 1, 64, 3, 1, '2018-12-11 08:09:02'),
(186, 14, 1, 64, 3, 1, '2018-12-11 08:19:33'),
(187, 14, 1, 64, 3, 1, '2018-12-11 08:51:21'),
(188, 14, 1, 64, 3, 1, '2018-12-11 08:52:46'),
(189, 14, 1, 71, 3, 1, '2018-12-17 07:13:30'),
(190, 14, 1, 97, 3, 1, '2018-12-17 07:14:42');

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
  `your_ans` text,
  `correct_ans` text,
  `ans_time` int(11) NOT NULL,
  `submit_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_qns_ans`
--

INSERT INTO `student_qns_ans` (`id`, `user_id`, `question_id`, `country_id`, `subject_id`, `grade_id`, `category_id`, `topic_id`, `question_type`, `marks`, `answer_type`, `your_ans`, `correct_ans`, `ans_time`, `submit_date`) VALUES
(1, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', NULL, NULL, 5, '2018-08-14 15:01:38'),
(2, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', NULL, NULL, 26, '2018-08-14 15:02:05'),
(3, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', NULL, NULL, 3, '2018-08-14 15:07:29'),
(4, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', NULL, NULL, 10, '2018-08-14 15:09:08'),
(5, 2, 51, 1, 2, 6, 1, 17, '20', 10, 'true', NULL, NULL, 6, '2018-08-14 15:11:15'),
(6, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', NULL, NULL, 9, '2018-08-14 15:12:12'),
(7, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', NULL, NULL, 2, '2018-08-14 15:16:53'),
(8, 2, 51, 1, 2, 6, 1, 17, '20', 10, 'true', NULL, NULL, 6, '2018-08-14 15:17:10'),
(9, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', NULL, NULL, 2, '2018-08-14 15:19:35'),
(10, 2, 51, 1, 2, 6, 1, 17, '20', 10, 'true', NULL, NULL, 5, '2018-08-14 15:19:44'),
(11, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', NULL, NULL, 5, '2018-08-14 16:04:47'),
(12, 2, 51, 1, 2, 6, 1, 17, '20', 10, 'true', NULL, NULL, 10, '2018-08-14 16:04:58'),
(13, 2, 51, 1, 2, 6, 1, 17, '20', 10, 'true', NULL, NULL, 4, '2018-08-14 16:13:16'),
(14, 2, 51, 1, 2, 6, 1, 17, '20', 10, 'true', NULL, NULL, 7, '2018-08-14 16:13:25'),
(15, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', NULL, NULL, 3, '2018-08-14 16:19:12'),
(16, 2, 51, 1, 2, 6, 1, 17, '20', 10, 'false', NULL, NULL, 6, '2018-08-14 16:19:20'),
(17, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', NULL, NULL, 3, '2018-08-14 16:23:10'),
(18, 2, 51, 1, 2, 6, 1, 17, '20', 10, 'false', NULL, NULL, 4, '2018-08-14 16:24:39'),
(19, 2, 50, 1, 2, 6, 1, 17, '20', 10, 'true', NULL, NULL, 5, '2018-08-14 16:35:45'),
(20, 2, 51, 1, 2, 6, 1, 17, '20', 10, 'false', NULL, NULL, 8, '2018-08-14 16:35:54'),
(21, 14, 51, 1, 2, 6, 1, 17, '20', 10, 'true', NULL, NULL, 7, '2018-08-24 15:14:52'),
(22, 14, 51, 1, 2, 6, 1, 17, '20', 10, 'true', NULL, NULL, 10, '2018-08-24 15:14:57'),
(23, 14, 43, 1, 2, 6, 1, 11, '14', 10, 'true', NULL, NULL, 10, '2018-09-03 15:41:26'),
(24, 14, 50, 1, 2, 6, 1, 17, '20', 10, 'true', 'Goat', 'Goat', 3, '2018-09-12 15:19:48'),
(25, 14, 51, 1, 2, 6, 1, 17, '20', 10, 'true', 'Cow', 'Cow', 5, '2018-09-12 15:19:52'),
(26, 14, 51, 1, 2, 6, 1, 17, '20', 10, 'true', 'Cow', 'Cow', 2, '2018-09-12 15:32:03'),
(27, 14, 51, 1, 2, 6, 1, 17, '20', 10, 'true', 'Cow', 'Cow', 4, '2018-09-12 15:32:08'),
(28, 14, 51, 1, 2, 6, 1, 17, '20', 10, 'true', 'Cow', 'Cow', 2, '2018-09-12 15:32:53'),
(29, 14, 51, 1, 2, 6, 1, 17, '20', 10, 'true', 'Cow', 'Cow', 4, '2018-09-12 15:32:58'),
(30, 14, 50, 1, 2, 6, 1, 17, '20', 10, 'true', 'Goat', 'Goat', 3, '2018-09-12 15:37:06'),
(31, 14, 51, 1, 2, 6, 1, 17, '20', 10, 'true', 'Cow', 'Cow', 5, '2018-09-12 15:37:10'),
(32, 14, 51, 1, 2, 6, 1, 17, '20', 10, 'false', 'Cow', 'Cow', 3, '2018-09-12 15:38:37'),
(33, 14, 51, 1, 2, 6, 1, 17, '20', 10, 'true', 'Cow', 'Cow', 5, '2018-09-12 15:38:42'),
(34, 14, 50, 1, 2, 6, 1, 17, '20', 10, 'false', 'Goat', 'Goat', 3, '2018-09-12 15:42:45'),
(35, 14, 51, 1, 2, 6, 1, 17, '20', 10, 'true', 'Cow', 'Cow', 5, '2018-09-12 15:42:49'),
(36, 14, 51, 1, 2, 6, 1, 17, '20', 10, 'true', 'Cow', 'Cow', 9, '2018-09-12 15:43:59'),
(37, 14, 51, 1, 2, 6, 1, 17, '20', 10, 'true', 'Cow', 'Cow', 11, '2018-09-12 15:44:03'),
(38, 14, 51, 1, 2, 6, 1, 17, '20', 10, 'true', 'Cow', 'Cow', 2, '2018-09-12 15:57:59'),
(39, 14, 51, 1, 2, 6, 1, 17, '20', 10, 'true', 'Cow', 'Cow', 4, '2018-09-12 15:58:04'),
(40, 13, 7, 77, 2, 5, 7, 5, '1', 10, 'false', 'no', 'Yes', 18, '2018-09-20 15:12:07'),
(41, 13, 56, 1, 3, 5, 1, 19, '9', 10, 'false', 'winter', 'summer', 5, '2018-09-20 15:17:05'),
(42, 13, 55, 1, 2, 6, 1, 15, '6', 10, 'true', 'Green', 'Green', 1, '2018-09-20 15:39:31'),
(43, 13, 49, 1, 2, 6, 1, 15, '6', 10, 'true', 'G', 'G', 7, '2018-09-20 15:39:41'),
(44, 13, 55, 1, 2, 6, 1, 15, '6', 10, 'true', 'Green', 'Green', 12, '2018-09-20 15:39:49'),
(45, 13, 37, 1, 2, 6, 9, 9, '11', 10, 'false', 'Red', 'green', 2, '2018-09-20 15:40:00'),
(46, 13, 37, 1, 2, 6, 9, 9, '11', 10, 'false', 'Red', 'lamb', 4, '2018-09-20 15:40:04'),
(47, 13, 38, 1, 2, 6, 9, 9, '11', 10, 'false', 'Lion', 'ed', 8, '2018-09-20 15:40:08'),
(48, 13, 39, 1, 2, 6, 9, 9, '11', 10, 'false', 'Lamp', 'lamb', 19, '2018-09-20 15:40:13'),
(49, 13, 39, 1, 2, 6, 9, 9, '11', 10, 'true', 'Lamp', 'lamp', 11, '2018-09-20 15:40:32'),
(50, 13, 37, 1, 2, 6, 9, 9, '11', 10, 'true', 'Red', 'red', 16, '2018-09-20 15:40:40'),
(51, 13, 38, 1, 2, 6, 9, 9, '11', 10, 'true', 'Lion', 'lion', 57, '2018-09-20 15:41:24'),
(52, 13, 39, 1, 2, 6, 9, 9, '11', 10, 'true', 'Lamp', 'lamp', 6001, '2018-09-20 15:41:31'),
(53, 13, 71, 77, 2, 10, 10, 21, '1', 5, 'true', 'Ball', 'ball', 24013, '2018-09-21 05:18:24'),
(54, 14, 68, 77, 2, 10, 10, 21, '2', 5, 'true', 'back5.PNG', 'back5.PNG', 1, '2018-09-21 06:41:06'),
(55, 14, 64, 77, 2, 10, 10, 21, '1', 5, 'true', 'Frog', 'frog', 7, '2018-09-21 06:44:42'),
(56, 14, 68, 77, 2, 10, 10, 21, '2', 5, 'true', 'back5.PNG', 'back5.PNG', 12021, '2018-09-21 06:47:05'),
(57, 14, 64, 77, 2, 10, 10, 21, '1', 5, 'false', 'Frog', 'fopg', 7, '2018-09-21 06:54:02'),
(58, 14, 68, 77, 2, 10, 10, 21, '2', 5, 'true', 'back5.PNG', 'back5.PNG', 31, '2018-09-21 06:54:31'),
(59, 14, 70, 77, 2, 10, 10, 21, '2', 5, 'false', 'hill.PNG', 'fall.PNG', 6018, '2018-09-21 06:54:50'),
(60, 14, 71, 77, 2, 10, 10, 21, '1', 5, 'false', 'Ball', NULL, 12007, '2018-09-21 06:55:01'),
(61, 14, 34, 1, 2, 6, 7, 10, '18', 10, '', '', '', 12, '2018-09-21 06:56:17'),
(62, 14, 3, 1, 2, 6, 1, 1, '1', 10, 'true', 'Green', 'green', 6, '2018-09-21 06:56:53'),
(63, 14, 68, 77, 2, 10, 10, 21, '2', 5, 'false', 'back5.PNG', 'cup.PNG', 6017, '2018-09-21 07:55:57'),
(64, 14, 71, 77, 2, 10, 10, 21, '1', 5, 'false', 'Ball', NULL, 42023, '2018-09-21 07:57:26'),
(65, 14, 70, 77, 2, 10, 10, 21, '2', 5, 'true', 'hill.PNG', 'hill.PNG', 6, '2018-09-21 07:57:46'),
(66, 14, 68, 77, 2, 10, 10, 21, '2', 5, 'false', 'back5.PNG', 'ball.PNG', 20, '2018-09-21 07:58:05'),
(67, 14, 70, 77, 2, 10, 10, 21, '2', 5, 'true', 'hill.PNG', 'hill.PNG', 28, '2018-09-21 07:58:12'),
(68, 14, 68, 77, 2, 10, 10, 21, '2', 5, 'false', 'back5.PNG', 'ball.PNG', 3, '2018-09-21 07:59:30'),
(69, 14, 64, 77, 2, 10, 10, 21, '1', 5, 'true', 'Frog', 'frog', 3, '2018-09-21 07:59:47'),
(70, 14, 70, 77, 2, 10, 10, 21, '2', 5, 'true', 'hill.PNG', 'hill.PNG', 2, '2018-09-21 08:43:41'),
(71, 14, 68, 77, 2, 10, 10, 21, '2', 5, 'false', 'back5.PNG', 'ball.PNG', 14, '2018-09-21 08:44:00'),
(72, 14, 70, 77, 2, 10, 10, 21, '2', 5, 'true', 'hill.PNG', 'hill.PNG', 32, '2018-09-21 08:44:12'),
(73, 14, 72, 77, 2, 10, 10, 22, '9', 5, 'true', 'tree', 'tree', 1, '2018-09-21 08:56:30'),
(74, 13, 72, 77, 2, 10, 10, 22, '9', 5, 'true', 'tree', 'tree', 29, '2018-09-21 11:29:42'),
(75, 13, 75, 1, 3, 7, 14, 26, '3', 5, 'false', 'blue', 'Red', 3, '2018-09-21 11:34:56'),
(76, 13, 74, 1, 3, 7, 14, 26, '1', 5, 'false', '5', NULL, 9, '2018-09-21 11:35:05'),
(77, 13, 85, 1, 3, 7, 6, 3, '1', 5, 'true', '2', '2', 10, '2018-09-21 11:39:23'),
(78, 13, 85, 1, 3, 7, 6, 3, '1', 5, 'true', '2', '2', 15, '2018-09-21 11:39:31'),
(79, 13, 86, 1, 3, 10, 6, 3, '1', 5, 'true', '3', '3', 3, '2018-09-21 11:41:51'),
(80, 13, 86, 1, 3, 10, 6, 3, '1', 5, 'true', '3', '3', 3, '2018-09-21 11:43:02'),
(81, 13, 87, 1, 3, 10, 6, 3, '2', 5, 'false', 'kisspng-apple-poster-red-4-apples-5aa48aecc2f3f1_3775855415207329087985.jpg', NULL, 5, '2018-09-21 11:43:07'),
(82, 14, 92, 1, 3, 10, 15, 34, '2', 5, 'true', 'ball3.PNG', 'ball3.PNG', 2, '2018-09-25 02:48:35'),
(83, 14, 62, 1, 3, 2, 1, 20, '1', 5, 'true', '1', '1', 9, '2018-09-26 10:40:51'),
(84, 14, 62, 1, 3, 2, 1, 20, '1', 5, 'true', '1', '1', 12, '2018-09-26 10:40:59'),
(85, 14, 100, 251, 3, 2, 1, 20, '1', 5, 'true', '2', '2', 15, '2018-09-26 10:41:05'),
(86, 14, 101, 251, 3, 1, 1, 16, '2', 5, 'false', 'threespiders.jpg', 'spidernet.jpg', 4, '2018-09-26 10:50:07'),
(87, 14, 101, 251, 3, 1, 1, 16, '2', 5, 'true', 'spidernet.jpg', 'spidernet.jpg', 1, '2018-09-26 10:50:55'),
(88, 14, 30, 1, 2, 1, 8, 8, '3', 10, 'false', 'Juice', 'Milk', 7, '2018-09-26 10:55:19'),
(89, 14, 28, 1, 2, 1, 8, 8, '3', 10, 'true', 'Nose', 'Nose', 12, '2018-09-26 10:55:29'),
(90, 14, 29, 1, 2, 1, 8, 8, '3', 10, 'true', 'Christmas', 'Christmas', 19, '2018-09-26 10:55:39'),
(91, 14, 30, 1, 2, 1, 8, 8, '3', 10, 'true', 'Milk', 'Milk', 23, '2018-09-26 10:55:47'),
(92, 14, 32, 1, 2, 1, 8, 8, '', 10, '', '', '', 18, '2018-09-26 10:58:49'),
(93, 14, 19, 1, 2, 1, 7, 8, '3', 10, 'false', 'Green', 'Blue', 5, '2018-09-26 10:59:05'),
(94, 14, 28, 1, 2, 1, 8, 8, '3', 10, 'true', 'Nose', 'Nose', 10, '2018-09-26 10:59:14'),
(95, 14, 29, 1, 2, 1, 8, 8, '3', 10, 'true', 'Christmas', 'Christmas', 14, '2018-09-26 10:59:22'),
(96, 14, 30, 1, 2, 1, 8, 8, '3', 10, 'false', 'Tea', 'Milk', 18, '2018-09-26 10:59:29'),
(97, 14, 31, 1, 2, 1, 8, 8, '3', 10, 'true', '24', '24', 24019, '2018-09-26 11:04:55'),
(98, 14, 28, 1, 2, 1, 8, 8, '3', 10, 'true', 'Nose', 'Nose', 24029, '2018-09-26 11:05:09'),
(99, 14, 29, 1, 2, 1, 8, 8, '3', 10, 'true', 'Christmas', 'Christmas', 24033, '2018-09-26 11:05:16'),
(100, 14, 30, 1, 2, 1, 8, 8, '3', 10, 'false', 'Tea', 'Milk', 24036, '2018-09-26 11:05:22'),
(101, 14, 29, 1, 2, 1, 8, 8, '3', 10, 'true', 'Christmas', 'Christmas', 6, '2018-09-26 11:05:53'),
(102, 14, 28, 1, 2, 1, 8, 8, '3', 10, 'true', 'Nose', 'Nose', 11, '2018-09-26 11:06:02'),
(103, 14, 29, 1, 2, 1, 8, 8, '3', 10, 'false', 'Easter', 'Christmas', 18, '2018-09-26 11:06:12'),
(104, 14, 30, 1, 2, 1, 8, 8, '3', 10, 'true', 'Milk', 'Milk', 22, '2018-09-26 11:06:18'),
(105, 14, 19, 1, 2, 1, 7, 8, '3', 10, 'false', 'Green', 'Blue', 7, '2018-09-26 11:06:55'),
(106, 14, 28, 1, 2, 1, 8, 8, '3', 10, 'true', 'Nose', 'Nose', 10, '2018-09-26 11:07:01'),
(107, 14, 29, 1, 2, 1, 8, 8, '3', 10, 'true', 'Christmas', 'Christmas', 11, '2018-09-26 11:07:06'),
(108, 14, 30, 1, 2, 1, 8, 8, '3', 10, 'true', 'Milk', 'Milk', 13, '2018-09-26 11:07:11'),
(109, 14, 30, 1, 2, 1, 8, 8, '3', 10, 'true', 'Milk', 'Milk', 4, '2018-09-26 11:10:03'),
(110, 14, 28, 1, 2, 1, 8, 8, '3', 10, 'true', 'Nose', 'Nose', 8, '2018-09-26 11:10:11'),
(111, 14, 29, 1, 2, 1, 8, 8, '3', 10, 'true', 'Christmas', 'Christmas', 11, '2018-09-26 11:10:17'),
(112, 14, 30, 1, 2, 1, 8, 8, '3', 10, 'true', 'Milk', 'Milk', 13, '2018-09-26 11:10:23'),
(113, 14, 31, 1, 2, 1, 8, 8, '3', 10, 'false', '12', '24', 15, '2018-09-26 11:10:29'),
(114, 14, 102, 251, 2, 1, 1, 8, '3', 5, 'true', '2', '2', 19, '2018-09-26 11:10:36'),
(115, 14, 104, 251, 3, 10, 15, 39, '31', 5, 'true', '1|2|3|4', '1|2|3|4', 10, '2018-09-26 12:36:28'),
(116, 14, 104, 251, 3, 10, 15, 39, '31', 5, 'true', '1|2|3|4', '1|2|3|4', 18, '2018-09-26 12:36:40'),
(117, 14, 99, 251, 3, 10, 15, 39, '5', 5, 'true', 'a:4:{i:0;s:2:\"24\";i:1;s:2:\"27\";i:2;s:2:\"31\";i:3;s:2:\"34\";}', 'a:4:{i:0;s:2:\"24\";i:1;s:2:\"27\";i:2;s:2:\"31\";i:3;s:2:\"34\";}', 6, '2018-09-26 12:36:59'),
(118, 14, 104, 251, 3, 10, 15, 39, '31', 5, 'true', '1|2|3|4', '1|2|3|4', 19, '2018-09-26 12:37:16'),
(119, 14, 106, 251, 2, 2, 8, 15, '6', 5, 'true', 'U', 'U', 5, '2018-09-26 12:45:00'),
(120, 14, 99, 251, 3, 10, 15, 39, '5', 5, 'false', 'a:4:{i:0;s:2:\"27\";i:1;s:2:\"24\";i:2;s:2:\"34\";i:3;s:2:\"31\";}', 'a:4:{i:0;s:2:\"24\";i:1;s:2:\"27\";i:2;s:2:\"31\";i:3;s:2:\"34\";}', 6058, '2018-09-26 12:49:50'),
(121, 14, 104, 251, 3, 10, 15, 39, '31', 5, 'true', '1|2|3|4', '1|2|3|4', 16, '2018-09-26 12:53:49'),
(122, 14, 104, 251, 3, 10, 15, 39, '31', 5, 'true', '1|2|3|4', '1|2|3|4', 6014, '2018-09-26 12:54:51'),
(123, 14, 107, 251, 3, 10, 15, 39, '28', 5, 'false', 'and', '2and3', 6023, '2018-09-26 12:55:04'),
(124, 14, 104, 251, 3, 10, 15, 39, '31', 5, 'true', '1|2|3|4', '1|2|3|4', 11, '2018-09-26 12:55:50'),
(125, 14, 104, 251, 3, 10, 15, 39, '31', 5, 'true', '1|2|3|4', '1|2|3|4', 20, '2018-09-26 12:56:02'),
(126, 14, 104, 251, 3, 10, 15, 39, '31', 5, 'false', '1|2|4|3', '1|2|3|4', 8, '2018-09-26 12:58:49'),
(127, 14, 104, 251, 3, 10, 15, 39, '31', 5, 'true', '1|2|3|4', '1|2|3|4', 16, '2018-09-26 12:59:02'),
(128, 14, 107, 251, 3, 10, 15, 39, '28', 5, 'true', '2and3', '2and3', 26, '2018-09-26 12:59:15'),
(129, 14, 108, 251, 3, 2, 1, 14, '26', 5, 'true', '3', '3', 5, '2018-09-26 13:29:36'),
(130, 14, 104, 251, 3, 10, 15, 39, '31', 5, 'true', '1|2|3|4', '1|2|3|4', 13, '2018-09-26 14:13:52'),
(131, 14, 104, 251, 3, 10, 15, 39, '31', 5, 'true', '1|2|3|4', '1|2|3|4', 22, '2018-09-26 14:14:04'),
(132, 14, 107, 251, 3, 10, 15, 39, '28', 5, 'true', '2and3', '2and3', 26, '2018-09-26 14:14:12'),
(133, 14, 57, 1, 3, 2, 1, 18, '8', 10, 'false', 'a:2:{i:0;s:10:\"shape2.jpg\";i:1;s:10:\"shape1.jpg\";}', 'a:2:{i:0;s:10:\"shape1.jpg\";i:1;s:10:\"shape2.jpg\";}', 7, '2018-09-26 14:14:12'),
(134, 14, 58, 1, 3, 2, 1, 18, '8', 10, 'true', 'a:2:{i:0;s:11:\"shape31.jpg\";i:1;s:10:\"shape7.jpg\";}', 'a:2:{i:0;s:11:\"shape31.jpg\";i:1;s:10:\"shape7.jpg\";}', 12, '2018-09-26 14:14:22'),
(135, 14, 59, 1, 3, 2, 1, 18, '8', 10, 'false', 'a:3:{i:0;s:14:\"trianlgle2.jpg\";i:1;s:14:\"trianlgle3.jpg\";i:2;s:13:\"trianlgle.jpg\";}', 'a:3:{i:0;s:13:\"trianlgle.jpg\";i:1;s:14:\"trianlgle2.jpg\";i:2;s:14:\"trianlgle3.jpg\";}', 17, '2018-09-26 14:14:30'),
(136, 14, 104, 251, 3, 10, 15, 39, '31', 5, 'false', '1|3|2|5', '1|2|3|4', 11, '2018-09-26 14:14:36'),
(137, 14, 110, 251, 3, 2, 1, 18, '8', 5, 'false', 'a:3:{i:0;s:12:\"circle13.jpg\";i:1;s:12:\"circle14.jpg\";i:2;s:12:\"circle12.jpg\";}', 'a:3:{i:0;s:12:\"circle12.jpg\";i:1;s:12:\"circle13.jpg\";i:2;s:12:\"circle14.jpg\";}', 29, '2018-09-26 14:14:40'),
(138, 14, 104, 251, 3, 10, 15, 39, '31', 5, 'true', '1|2|3|4', '1|2|3|4', 17, '2018-09-26 14:14:46'),
(139, 14, 59, 1, 3, 2, 1, 18, '8', 10, 'false', 'a:3:{i:0;s:14:\"trianlgle2.jpg\";i:1;s:14:\"trianlgle3.jpg\";i:2;s:13:\"trianlgle.jpg\";}', 'a:3:{i:0;s:13:\"trianlgle.jpg\";i:1;s:14:\"trianlgle2.jpg\";i:2;s:14:\"trianlgle3.jpg\";}', 9, '2018-09-26 14:15:17'),
(140, 14, 109, 251, 2, 10, 15, 10, '18', 5, 'true', '1and2', '1and2', 5, '2018-09-26 14:15:35'),
(141, 14, 109, 251, 2, 10, 15, 10, '18', 5, 'false', '2and1', '1and2', 2, '2018-09-26 14:15:47'),
(142, 14, 56, 1, 3, 2, 1, 19, '9', 10, 'false', 'spring', 'winter', 7, '2018-09-26 14:25:46'),
(143, 14, 111, 251, 3, 2, 1, 19, '9', 5, 'true', 'July', 'July', 14, '2018-09-26 14:25:56'),
(144, 14, 109, 251, 2, 10, 15, 10, '18', 5, 'true', '1and2', '1and2', 6, '2018-09-26 14:31:34'),
(145, 14, 113, 251, 3, 2, 1, 9, '11', 5, 'true', '300', '300', 8, '2018-09-26 14:32:04'),
(146, 14, 112, 251, 2, 10, 15, 16, '15', 5, 'true', 'Screenshot(1)1.png', 'Screenshot(1)1.png', 9, '2018-09-26 14:32:40'),
(147, 14, 112, 251, 2, 10, 15, 16, '15', 5, 'false', 'Screenshot(2)1.png', 'Screenshot(1)1.png', 2, '2018-09-26 14:32:58'),
(148, 14, 114, 251, 2, 2, 16, 11, '14', 5, 'true', 'H', 'H', 5, '2018-09-26 14:40:39'),
(149, 14, 115, 251, 2, 2, 1, 13, '13', 5, 'true', 'Mammal', 'Mammal', 7, '2018-09-26 14:42:21'),
(150, 14, 115, 251, 2, 2, 1, 13, '13', 5, 'true', 'Mammal', 'Mammal', 7, '2018-09-26 14:43:14'),
(151, 14, 114, 251, 2, 2, 16, 11, '14', 5, 'false', 'D', 'H', 18000, '2018-09-26 14:48:25'),
(152, 14, 82, 1, 3, 3, 14, 26, '20', 5, 'true', '1', '1', 4, '2018-09-28 01:38:55'),
(153, 14, 75, 1, 3, 3, 14, 26, '3', 5, 'true', 'Blue', 'blue', 7, '2018-09-28 01:39:02'),
(154, 14, 77, 1, 3, 3, 14, 26, '6', 5, 'true', '2', '2', 9, '2018-09-28 01:39:07'),
(155, 14, 78, 1, 3, 3, 14, 26, '8', 5, 'true', 'a:1:{i:0;s:9:\"frog3.PNG\";}', 'a:1:{i:0;s:9:\"frog3.PNG\";}', 11, '2018-09-28 01:39:13'),
(156, 14, 79, 1, 3, 3, 14, 26, '9', 5, 'false', 'No', 'Yes', 14, '2018-09-28 01:39:19'),
(157, 14, 80, 1, 3, 3, 14, 26, '11', 5, 'true', '4', '4', 18, '2018-09-28 01:39:26'),
(158, 14, 81, 1, 3, 3, 14, 26, '14', 5, 'true', 'False', 'False', 21, '2018-09-28 01:39:33'),
(159, 14, 82, 1, 3, 3, 14, 26, '20', 5, 'true', '1', '1', 23, '2018-09-28 01:39:38'),
(160, 14, 83, 1, 3, 3, 13, 26, '1', 5, 'true', 'red', 'red', 27, '2018-09-28 01:39:45'),
(161, 14, 95, 251, 3, 3, 14, 26, '1', 5, 'true', '5', '5', 32, '2018-09-28 01:39:53'),
(162, 7, 164, 251, 3, 2, 4, 1, '29', 10, 'true', '1', '1', 5, '2018-10-08 23:57:25'),
(163, 7, 164, 251, 3, 2, 4, 1, '29', 10, 'true', '1', '1', 8, '2018-10-08 23:57:31'),
(164, 7, 164, 251, 3, 2, 9, 39, '32', 10, 'true', 'a:3:{i:0;s:2:\"88\";i:1;s:2:\"90\";i:2;s:2:\"92\";}', 'a:3:{i:0;s:2:\"88\";i:1;s:2:\"90\";i:2;s:2:\"92\";}', 6, '2018-10-09 00:01:50'),
(165, 7, 108, 251, 3, 2, 1, 14, '26', 5, 'true', '3', '3', 2, '2018-10-09 00:03:27'),
(166, 14, 132, 251, 3, 10, 20, 48, '2', 10, 'false', 'c1.PNG', 'c2.PNG', 28, '2018-10-09 09:52:49'),
(167, 14, 43, 1, 2, 1, 1, 11, '14', 10, 'true', 'White', 'White', 34, '2018-10-09 09:55:21'),
(168, 14, 151, 251, 3, 2, 22, 1, '18', 5, 'true', '13and15', '13and15', 19, '2018-10-11 02:23:20'),
(169, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'true', '1', '1', 5, '2018-10-11 02:23:46'),
(170, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 12, '2018-10-11 02:23:57'),
(171, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'false', 'Lion.jpg', NULL, 15, '2018-10-11 02:24:03'),
(172, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'true', 'February', 'February', 39, '2018-10-11 02:24:32'),
(173, 14, 173, 251, 2, 2, 1, 2, '5', 2, 'false', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 'a:4:{i:0;s:8:\"December\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:3:\"May\";}', 48, '2018-10-11 02:24:45'),
(174, 14, 174, 251, 2, 2, 1, 2, '6', 2, 'true', '44', '44', 12006, '2018-10-11 02:25:35'),
(175, 14, 176, 251, 2, 2, 1, 2, '8', 2, 'false', 'a:4:{i:0;s:27:\"majestic-way-of-walking.jpg\";i:1;s:9:\"Lion1.jpg\";i:2;s:19:\"sumatran-tiger1.jpg\";i:3;s:9:\"Lion1.jpg\";}', NULL, 12048, '2018-10-11 02:25:59'),
(176, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'true', '32', '32', 18047, '2018-10-11 02:26:22'),
(177, 14, 182, 251, 2, 2, 1, 2, '11', 2, 'true', 'blue', 'Blue', 24023, '2018-10-11 02:26:32'),
(178, 14, 183, 251, 2, 2, 1, 2, '13', 2, 'true', '4', '4', 30011, '2018-10-11 02:26:45'),
(179, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'true', '1', '1', 30048, '2018-10-11 02:26:56'),
(180, 14, 185, 251, 2, 2, 1, 2, '15', 2, 'false', 'sumatran-tiger4.jpg', NULL, 36040, '2018-10-11 02:27:10'),
(181, 14, 186, 251, 2, 2, 1, 2, '18', 2, 'true', '31and1', '31and1', 42048, '2018-10-11 02:27:21'),
(182, 14, 187, 251, 2, 2, 1, 2, '26', 2, 'true', '6', '6', 90026, '2018-10-11 02:28:27'),
(183, 14, 188, 251, 2, 2, 1, 2, '12', 2, 'false', '2', '3', 126005, '2018-10-11 02:29:16'),
(184, 14, 189, 251, 2, 2, 1, 2, '29', 2, 'false', '3', '2', 132046, '2018-10-11 02:29:27'),
(185, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'true', '1', '1', 3, '2018-10-11 02:33:09'),
(186, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 6, '2018-10-11 02:33:16'),
(187, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'false', 'sumatran-tiger.jpg', 'http://applekitch.coregensolution.com/uploads/images/Lion.jpg', 59, '2018-10-11 02:34:13'),
(188, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'true', 'February', 'February', 6007, '2018-10-11 02:34:34'),
(189, 14, 168, 251, 2, 2, 1, 2, '1', 2, 'true', '3', '3', 10, '2018-10-11 02:37:14'),
(190, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 14, '2018-10-11 02:37:22'),
(191, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'true', 'Lion9.jpg', 'Lion9.jpg', 16, '2018-10-11 02:37:28'),
(192, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'true', 'February', 'February', 24058, '2018-10-11 02:42:14'),
(193, 14, 173, 251, 2, 2, 1, 2, '5', 2, 'false', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 'a:4:{i:0;s:8:\"December\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:3:\"May\";}', 30005, '2018-10-11 02:42:26'),
(194, 14, 174, 251, 2, 2, 1, 2, '6', 2, 'true', '44', '44', 30016, '2018-10-11 02:42:39'),
(195, 14, 176, 251, 2, 2, 1, 2, '8', 2, 'false', 'a:1:{i:0;s:19:\"sumatran-tiger1.jpg\";}', 'a:4:{i:0;s:27:\"majestic-way-of-walking.jpg\";i:1;s:19:\"sumatran-tiger1.jpg\";i:2;s:28:\"majestic-way-of-walking2.jpg\";i:3;s:20:\"sumatran-tiger11.jpg\";}', 54027, '2018-10-11 02:46:55'),
(196, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'true', '32', '32', 54035, '2018-10-11 02:47:10'),
(197, 14, 182, 251, 2, 2, 1, 2, '11', 2, 'true', 'blue', 'Blue', 54048, '2018-10-11 02:47:30'),
(198, 14, 183, 251, 2, 2, 1, 2, '13', 2, 'true', '4', '4', 66015, '2018-10-11 02:48:11'),
(199, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'true', '1', '1', 66027, '2018-10-11 02:48:19'),
(200, 14, 185, 251, 2, 2, 1, 2, '15', 2, 'false', 'sumatran-tiger4.jpg', NULL, 72008, '2018-10-11 02:48:41'),
(201, 14, 186, 251, 2, 2, 1, 2, '18', 2, 'true', '31and1', '31and1', 72028, '2018-10-11 02:48:48'),
(202, 14, 187, 251, 2, 2, 1, 2, '26', 2, 'true', '6', '6', 72052, '2018-10-11 02:48:55'),
(203, 14, 188, 251, 2, 2, 1, 2, '12', 2, 'true', '3', '3', 90011, '2018-10-11 02:49:31'),
(204, 14, 189, 251, 2, 2, 1, 2, '29', 2, 'false', '3', '2', 90051, '2018-10-11 02:49:42'),
(205, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'true', 'Lion10.jpg', 'Lion10.jpg', 6011, '2018-10-11 02:54:58'),
(206, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 6015, '2018-10-11 02:55:05'),
(207, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'true', 'Lion10.jpg', 'Lion10.jpg', 6018, '2018-10-11 02:55:12'),
(208, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'true', 'February', 'February', 6024, '2018-10-11 02:55:22'),
(209, 14, 173, 251, 2, 2, 1, 2, '5', 2, 'true', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 6032, '2018-10-11 02:55:34'),
(210, 14, 174, 251, 2, 2, 1, 2, '6', 2, 'true', '44', '44', 6034, '2018-10-11 02:55:40'),
(211, 14, 176, 251, 2, 2, 1, 2, '8', 2, 'false', 'a:2:{i:0;s:20:\"sumatran-tiger11.jpg\";i:1;s:28:\"majestic-way-of-walking2.jpg\";}', 'a:4:{i:0;s:27:\"majestic-way-of-walking.jpg\";i:1;s:19:\"sumatran-tiger1.jpg\";i:2;s:28:\"majestic-way-of-walking2.jpg\";i:3;s:20:\"sumatran-tiger11.jpg\";}', 6038, '2018-10-11 02:55:47'),
(212, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'true', '32', '32', 6042, '2018-10-11 02:55:58'),
(213, 14, 182, 251, 2, 2, 1, 2, '11', 2, 'true', 'blue', 'Blue', 6045, '2018-10-11 02:56:08'),
(214, 14, 183, 251, 2, 2, 1, 2, '13', 2, 'true', '4', '4', 6051, '2018-10-11 02:56:17'),
(215, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'true', '1', '1', 12003, '2018-10-11 02:56:33'),
(216, 14, 185, 251, 2, 2, 1, 2, '15', 2, 'true', 'sumatran-tiger4.jpg', 'sumatran-tiger4.jpg', 12006, '2018-10-11 02:56:40'),
(217, 14, 186, 251, 2, 2, 1, 2, '18', 2, 'true', '31and1', '31and1', 12010, '2018-10-11 02:56:48'),
(218, 14, 187, 251, 2, 2, 1, 2, '26', 2, 'true', '6', '6', 12012, '2018-10-11 02:56:54'),
(219, 14, 188, 251, 2, 2, 1, 2, '12', 2, 'true', '3', '3', 12016, '2018-10-11 02:57:01'),
(220, 14, 189, 251, 2, 2, 1, 2, '29', 2, 'true', '2', '2', 12020, '2018-10-11 02:57:08'),
(221, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'true', '32', '32', 4, '2018-10-11 02:59:35'),
(222, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 7, '2018-10-11 02:59:41'),
(223, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'true', 'Lion10.jpg', 'Lion10.jpg', 9, '2018-10-11 02:59:47'),
(224, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'true', 'February', 'February', 12, '2018-10-11 02:59:53'),
(225, 14, 173, 251, 2, 2, 1, 2, '5', 2, 'false', 'a:4:{i:0;s:8:\"December\";i:1;s:4:\"June\";i:2;s:3:\"May\";i:3;s:7:\"October\";}', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 17, '2018-10-11 03:00:01'),
(226, 14, 174, 251, 2, 2, 1, 2, '6', 2, 'false', '0', '44', 19, '2018-10-11 03:00:09'),
(227, 14, 176, 251, 2, 2, 1, 2, '8', 2, 'false', 'a:2:{i:0;s:20:\"sumatran-tiger11.jpg\";i:1;s:28:\"majestic-way-of-walking2.jpg\";}', 'a:4:{i:0;s:27:\"majestic-way-of-walking.jpg\";i:1;s:19:\"sumatran-tiger1.jpg\";i:2;s:28:\"majestic-way-of-walking2.jpg\";i:3;s:20:\"sumatran-tiger11.jpg\";}', 39, '2018-10-11 03:00:22'),
(228, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'true', '32', '32', 6002, '2018-10-11 03:00:31'),
(229, 14, 182, 251, 2, 2, 1, 2, '11', 2, 'true', 'blue', 'Blue', 12010, '2018-10-11 03:00:49'),
(230, 14, 183, 251, 2, 2, 1, 2, '13', 2, 'true', '4', '4', 12058, '2018-10-11 03:01:03'),
(231, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'true', '1', '1', 18021, '2018-10-11 03:01:08'),
(232, 14, 185, 251, 2, 2, 1, 2, '15', 2, 'true', 'sumatran-tiger4.jpg', 'sumatran-tiger4.jpg', 18039, '2018-10-11 03:01:14'),
(233, 14, 186, 251, 2, 2, 1, 2, '18', 2, 'true', '31and1', '31and1', 24003, '2018-10-11 03:01:21'),
(234, 14, 187, 251, 2, 2, 1, 2, '26', 2, 'true', '6', '6', 24021, '2018-10-11 03:01:26'),
(235, 14, 188, 251, 2, 2, 1, 2, '12', 2, 'true', '3', '3', 24041, '2018-10-11 03:01:33'),
(236, 14, 189, 251, 2, 2, 1, 2, '29', 2, 'true', '2', '2', 30002, '2018-10-11 03:01:39'),
(237, 14, 168, 251, 2, 2, 1, 2, '1', 2, 'true', '3', '3', 4, '2018-10-11 03:09:29'),
(238, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 6, '2018-10-11 03:09:36'),
(239, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'true', 'Lion10.jpg', 'Lion10.jpg', 10, '2018-10-11 03:09:45'),
(240, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'true', 'February', 'February', 16, '2018-10-11 03:09:55'),
(241, 14, 173, 251, 2, 2, 1, 2, '5', 2, 'true', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 21, '2018-10-11 03:10:04'),
(242, 14, 174, 251, 2, 2, 1, 2, '6', 2, 'true', '44', '44', 23, '2018-10-11 03:10:10'),
(243, 14, 176, 251, 2, 2, 1, 2, '8', 2, 'true', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 27, '2018-10-11 03:10:18'),
(244, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'true', '32', '32', 29, '2018-10-11 03:10:26'),
(245, 14, 182, 251, 2, 2, 1, 2, '11', 2, 'true', 'blue', 'Blue', 31, '2018-10-11 03:10:31'),
(246, 14, 183, 251, 2, 2, 1, 2, '13', 2, 'true', '4', '4', 33, '2018-10-11 03:10:37'),
(247, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'true', '1', '1', 35, '2018-10-11 03:10:43'),
(248, 14, 185, 251, 2, 2, 1, 2, '15', 2, 'true', 'sumatran-tiger4.jpg', 'sumatran-tiger4.jpg', 38, '2018-10-11 03:10:50'),
(249, 14, 186, 251, 2, 2, 1, 2, '18', 2, 'true', '31and1', '31and1', 42, '2018-10-11 03:10:58'),
(250, 14, 187, 251, 2, 2, 1, 2, '26', 2, 'true', '6', '6', 44, '2018-10-11 03:11:04'),
(251, 14, 188, 251, 2, 2, 1, 2, '12', 2, 'true', '3', '3', 50, '2018-10-11 03:11:16'),
(252, 14, 189, 251, 2, 2, 1, 2, '29', 2, 'false', '0', '2', 57, '2018-10-11 03:11:27'),
(253, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'true', '32', '32', 12, '2018-10-11 03:12:27'),
(254, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 14, '2018-10-11 03:12:32'),
(255, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'true', 'Lion10.jpg', 'Lion10.jpg', 19, '2018-10-11 03:12:41'),
(256, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'true', 'February', 'February', 21, '2018-10-11 03:12:47'),
(257, 14, 173, 251, 2, 2, 1, 2, '5', 2, 'true', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 35, '2018-10-11 03:13:05'),
(258, 14, 174, 251, 2, 2, 1, 2, '6', 2, 'true', '44', '44', 38, '2018-10-11 03:13:12'),
(259, 14, 176, 251, 2, 2, 1, 2, '8', 2, 'true', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 40, '2018-10-11 03:13:19'),
(260, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'true', '32', '32', 43, '2018-10-11 03:13:27'),
(261, 14, 182, 251, 2, 2, 1, 2, '11', 2, 'true', 'blue', 'Blue', 45, '2018-10-11 03:13:33'),
(262, 14, 183, 251, 2, 2, 1, 2, '13', 2, 'true', '4', '4', 47, '2018-10-11 03:13:38'),
(263, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'true', '1', '1', 52, '2018-10-11 03:13:46'),
(264, 14, 185, 251, 2, 2, 1, 2, '15', 2, 'true', 'sumatran-tiger4.jpg', 'sumatran-tiger4.jpg', 57, '2018-10-11 03:13:56'),
(265, 14, 186, 251, 2, 2, 1, 2, '18', 2, 'true', '31and1', '31and1', 6002, '2018-10-11 03:14:06'),
(266, 14, 187, 251, 2, 2, 1, 2, '26', 2, 'true', '6', '6', 6009, '2018-10-11 03:14:17'),
(267, 14, 188, 251, 2, 2, 1, 2, '12', 2, 'true', '3', '3', 6012, '2018-10-11 03:14:24'),
(268, 14, 189, 251, 2, 2, 1, 2, '29', 2, 'false', '0', '2', 6014, '2018-10-11 03:14:34'),
(269, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'false', '', 'Lion10.jpg', 2, '2018-10-11 03:18:35'),
(270, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 4, '2018-10-11 03:18:40'),
(271, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'false', '', 'Lion10.jpg', 5, '2018-10-11 03:18:45'),
(272, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'false', NULL, 'February', 7, '2018-10-11 03:18:51'),
(273, 14, 173, 251, 2, 2, 1, 2, '5', 2, 'false', 'a:4:{i:0;s:8:\"December\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:3:\"May\";}', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 16, '2018-10-11 03:18:56'),
(274, 14, 174, 251, 2, 2, 1, 2, '6', 2, 'false', NULL, '44', 36, '2018-10-11 03:19:01'),
(275, 14, 176, 251, 2, 2, 1, 2, '8', 2, 'false', 'a:2:{i:0;s:20:\"sumatran-tiger11.jpg\";i:1;s:28:\"majestic-way-of-walking2.jpg\";}', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 6044, '2018-10-11 03:19:08'),
(276, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'true', '32', '32', 12041, '2018-10-11 03:19:12'),
(277, 14, 182, 251, 2, 2, 1, 2, '11', 2, 'true', 'blue', 'Blue', 138042, '2018-10-11 03:20:33'),
(278, 14, 183, 251, 2, 2, 1, 2, '13', 2, 'true', '4', '4', 150026, '2018-10-11 03:20:40'),
(279, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'true', '1', '1', 162020, '2018-10-11 03:20:48'),
(280, 14, 185, 251, 2, 2, 1, 2, '15', 2, 'true', 'sumatran-tiger4.jpg', 'sumatran-tiger4.jpg', 180038, '2018-10-11 03:21:01'),
(281, 14, 186, 251, 2, 2, 1, 2, '18', 2, 'true', '31and1', '31and1', 192048, '2018-10-11 03:21:10'),
(282, 14, 187, 251, 2, 2, 1, 2, '26', 2, 'true', '6', '6', 204048, '2018-10-11 03:21:18'),
(283, 14, 188, 251, 2, 2, 1, 2, '12', 2, 'false', '2', '3', 222004, '2018-10-11 03:21:32'),
(284, 14, 189, 251, 2, 2, 1, 2, '29', 2, 'false', '0', '2', 264057, '2018-10-11 03:21:51'),
(285, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'true', '1', '1', 7, '2018-10-11 04:06:06'),
(286, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 9, '2018-10-11 04:06:12'),
(287, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'true', 'Lion10.jpg', 'Lion10.jpg', 12, '2018-10-11 04:06:18'),
(288, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'true', 'February', 'February', 15, '2018-10-11 04:06:26'),
(289, 14, 173, 251, 2, 2, 1, 2, '5', 2, 'true', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 20, '2018-10-11 04:06:35'),
(290, 14, 174, 251, 2, 2, 1, 2, '6', 2, 'true', '44', '44', 22, '2018-10-11 04:06:40'),
(291, 14, 176, 251, 2, 2, 1, 2, '8', 2, 'true', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 27, '2018-10-11 04:06:50'),
(292, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'true', '32', '32', 31, '2018-10-11 04:06:57'),
(293, 14, 182, 251, 2, 2, 1, 2, '11', 2, 'true', 'blue', 'Blue', 50, '2018-10-11 04:07:20'),
(294, 14, 183, 251, 2, 2, 1, 2, '13', 2, 'true', '4', '4', 52, '2018-10-11 04:07:26'),
(295, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'true', '1', '1', 55, '2018-10-11 04:07:33'),
(296, 14, 185, 251, 2, 2, 1, 2, '15', 2, 'true', 'sumatran-tiger4.jpg', 'sumatran-tiger4.jpg', 58, '2018-10-11 04:07:40'),
(297, 14, 186, 251, 2, 2, 1, 2, '18', 2, 'true', '31and1', '31and1', 6002, '2018-10-11 04:07:48'),
(298, 14, 187, 251, 2, 2, 1, 2, '26', 2, 'true', '6', '6', 6004, '2018-10-11 04:07:54'),
(299, 14, 188, 251, 2, 2, 1, 2, '12', 2, 'true', '3', '3', 6010, '2018-10-11 04:08:03'),
(300, 14, 189, 251, 2, 2, 1, 2, '29', 2, 'false', '3', '2', 6016, '2018-10-11 04:08:13'),
(301, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 3, '2018-10-11 04:09:59'),
(302, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 7, '2018-10-11 04:10:07'),
(303, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'true', 'Lion10.jpg', 'Lion10.jpg', 9, '2018-10-11 04:10:13'),
(304, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'true', 'February', 'February', 14, '2018-10-11 04:10:21'),
(305, 14, 173, 251, 2, 2, 1, 2, '5', 2, 'true', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 6027, '2018-10-11 04:11:38'),
(306, 14, 174, 251, 2, 2, 1, 2, '6', 2, 'true', '44', '44', 6051, '2018-10-11 04:12:07'),
(307, 14, 176, 251, 2, 2, 1, 2, '8', 2, 'true', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 6053, '2018-10-11 04:12:13'),
(308, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'true', '32', '32', 6058, '2018-10-11 04:12:22'),
(309, 14, 182, 251, 2, 2, 1, 2, '11', 2, 'true', 'blue', 'Blue', 12000, '2018-10-11 04:12:29'),
(310, 14, 183, 251, 2, 2, 1, 2, '13', 2, 'true', '4', '4', 12003, '2018-10-11 04:12:35'),
(311, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'true', '1', '1', 12005, '2018-10-11 04:12:41'),
(312, 14, 185, 251, 2, 2, 1, 2, '15', 2, 'true', 'sumatran-tiger4.jpg', 'sumatran-tiger4.jpg', 12009, '2018-10-11 04:12:48'),
(313, 14, 186, 251, 2, 2, 1, 2, '18', 2, 'true', '31and1', '31and1', 12016, '2018-10-11 04:12:59'),
(314, 14, 187, 251, 2, 2, 1, 2, '26', 2, 'true', '6', '6', 12019, '2018-10-11 04:13:05'),
(315, 14, 188, 251, 2, 2, 1, 2, '12', 2, 'true', '3', '3', 12023, '2018-10-11 04:13:12'),
(316, 14, 192, 251, 2, 2, 1, 2, '31', 2, 'true', '1.5|1.5|1.5', '1.5|1.5|1.5', 12, '2018-10-11 04:17:19'),
(317, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 14, '2018-10-11 04:17:25'),
(318, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'true', 'Lion10.jpg', 'Lion10.jpg', 16, '2018-10-11 04:17:30'),
(319, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'true', 'February', 'February', 20, '2018-10-11 04:17:38'),
(320, 14, 173, 251, 2, 2, 1, 2, '5', 2, 'true', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 25, '2018-10-11 04:17:46'),
(321, 14, 174, 251, 2, 2, 1, 2, '6', 2, 'true', '44', '44', 27, '2018-10-11 04:17:52'),
(322, 14, 176, 251, 2, 2, 1, 2, '8', 2, 'true', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 31, '2018-10-11 04:17:59'),
(323, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'true', '32', '32', 34, '2018-10-11 04:18:05'),
(324, 14, 182, 251, 2, 2, 1, 2, '11', 2, 'true', 'blue', 'Blue', 37, '2018-10-11 04:18:12'),
(325, 14, 183, 251, 2, 2, 1, 2, '13', 2, 'true', '4', '4', 6011, '2018-10-11 04:18:50'),
(326, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'true', '1', '1', 6013, '2018-10-11 04:18:55'),
(327, 14, 185, 251, 2, 2, 1, 2, '15', 2, 'true', 'sumatran-tiger4.jpg', 'sumatran-tiger4.jpg', 6015, '2018-10-11 04:19:00'),
(328, 14, 186, 251, 2, 2, 1, 2, '18', 2, 'true', '31and1', '31and1', 6022, '2018-10-11 04:19:12'),
(329, 14, 187, 251, 2, 2, 1, 2, '26', 2, 'true', '6', '6', 6024, '2018-10-11 04:19:17'),
(330, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'true', 'Lion10.jpg', 'Lion10.jpg', 4, '2018-10-11 07:12:36'),
(331, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 6, '2018-10-11 07:12:42'),
(332, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'true', 'Lion10.jpg', 'Lion10.jpg', 8, '2018-10-11 07:12:49'),
(333, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'true', 'February', 'February', 16, '2018-10-11 07:13:02'),
(334, 14, 173, 251, 2, 2, 1, 2, '5', 2, 'true', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 29, '2018-10-11 07:13:19'),
(335, 14, 174, 251, 2, 2, 1, 2, '6', 2, 'true', '44', '44', 38, '2018-10-11 07:13:33'),
(336, 14, 187, 251, 2, 2, 1, 2, '26', 2, 'true', '6', '6', 2, '2018-10-11 07:15:22'),
(337, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 9, '2018-10-11 07:15:46'),
(338, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'true', 'Lion10.jpg', 'Lion10.jpg', 16, '2018-10-11 07:16:07'),
(339, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'true', 'February', 'February', 27, '2018-10-11 07:16:30'),
(340, 14, 188, 251, 2, 2, 1, 2, '12', 2, 'true', '3', '3', 13, '2018-10-11 07:33:27'),
(341, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 24, '2018-10-11 07:33:43'),
(342, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'true', 'Lion10.jpg', 'Lion10.jpg', 27, '2018-10-11 07:33:49'),
(343, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'true', 'February', 'February', 31, '2018-10-11 07:33:57'),
(344, 14, 173, 251, 2, 2, 1, 2, '5', 2, 'true', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 37, '2018-10-11 07:34:06'),
(345, 14, 174, 251, 2, 2, 1, 2, '6', 2, 'true', '44', '44', 39, '2018-10-11 07:34:13'),
(346, 14, 176, 251, 2, 2, 1, 2, '8', 2, 'true', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 44, '2018-10-11 07:34:22'),
(347, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'true', '32', '32', 47, '2018-10-11 07:34:31'),
(348, 14, 182, 251, 2, 2, 1, 2, '11', 2, 'true', 'blue', 'Blue', 49, '2018-10-11 07:34:39'),
(349, 14, 183, 251, 2, 2, 1, 2, '13', 2, 'true', '4', '4', 52, '2018-10-11 07:34:47'),
(350, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'true', '1', '1', 54, '2018-10-11 07:34:54'),
(351, 14, 185, 251, 2, 2, 1, 2, '15', 2, 'true', 'sumatran-tiger4.jpg', 'sumatran-tiger4.jpg', 58, '2018-10-11 07:35:02'),
(352, 14, 186, 251, 2, 2, 1, 2, '18', 2, 'true', '31and1', '31and1', 6005, '2018-10-11 07:35:13'),
(353, 14, 187, 251, 2, 2, 1, 2, '26', 2, 'true', '6', '6', 6010, '2018-10-11 07:35:25'),
(354, 14, 188, 251, 2, 2, 1, 2, '12', 2, 'true', '3', '3', 6017, '2018-10-11 07:35:35'),
(355, 14, 195, 251, 2, 2, 1, 2, '32', 2, 'false', 'a:3:{i:0;s:2:\"46\";i:1;s:2:\"48\";i:2;s:2:\"49\";}', 'a:3:{i:0;s:1:\" \";i:1;s:1:\" \";i:2;s:1:\" \";}', 6006, '2018-10-11 08:12:17'),
(356, 14, 191, 251, 2, 2, 1, 2, '34', 2, 'false', 'sumatran-tiger7.jpg', NULL, 6, '2018-10-11 08:12:48'),
(357, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 10, '2018-10-11 08:12:58'),
(358, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'false', 'sumatran-tiger10.jpg', 'Lion10.jpg', 17, '2018-10-11 08:13:11'),
(359, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'true', 'February', 'February', 35, '2018-10-11 08:13:25'),
(360, 14, 173, 251, 2, 2, 1, 2, '5', 2, 'true', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 53, '2018-10-11 08:13:36'),
(361, 14, 174, 251, 2, 2, 1, 2, '6', 2, 'true', '44', '44', 6003, '2018-10-11 08:13:47'),
(362, 14, 176, 251, 2, 2, 1, 2, '8', 2, 'true', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 6020, '2018-10-11 08:13:55'),
(363, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'true', '32', '32', 6029, '2018-10-11 08:14:04'),
(364, 14, 182, 251, 2, 2, 1, 2, '11', 2, 'true', 'blue', 'Blue', 6040, '2018-10-11 08:14:12'),
(365, 14, 183, 251, 2, 2, 1, 2, '13', 2, 'false', '1', '4', 6058, '2018-10-11 08:14:22'),
(366, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'true', '1', '1', 12011, '2018-10-11 08:14:29'),
(367, 14, 185, 251, 2, 2, 1, 2, '15', 2, 'true', 'sumatran-tiger4.jpg', 'sumatran-tiger4.jpg', 12031, '2018-10-11 08:14:36'),
(368, 14, 186, 251, 2, 2, 1, 2, '18', 2, 'true', '31and1', '31and1', 12058, '2018-10-11 08:14:43'),
(369, 14, 187, 251, 2, 2, 1, 2, '26', 2, 'true', '6', '6', 18016, '2018-10-11 08:14:49'),
(370, 14, 188, 251, 2, 2, 1, 2, '12', 2, 'true', '3', '3', 24035, '2018-10-11 08:15:12'),
(371, 14, 191, 251, 2, 2, 1, 2, '34', 2, 'false', 'sumatran-tiger7.jpg', NULL, 30029, '2018-10-11 08:15:28'),
(372, 14, 192, 251, 2, 2, 1, 2, '31', 2, 'false', '1.5|46|1.5', '1.5|1.5|1.5', 36025, '2018-10-11 08:15:42'),
(373, 14, 193, 251, 2, 2, 1, 2, '28', 2, 'true', '2and2', '2and2', 54039, '2018-10-11 08:15:59'),
(374, 14, 194, 251, 2, 2, 1, 2, '33', 2, 'true', '4', '4', 72000, '2018-10-11 08:16:14'),
(375, 14, 195, 251, 2, 2, 1, 2, '32', 2, 'false', 'a:3:{i:0;s:2:\"46\";i:1;s:2:\"48\";i:2;s:2:\"49\";}', 'a:3:{i:0;s:1:\" \";i:1;s:1:\" \";i:2;s:1:\" \";}', 102035, '2018-10-11 08:16:43'),
(376, 14, 191, 251, 2, 2, 1, 2, '34', 2, 'false', 'sumatran-tiger7.jpg', NULL, 22, '2018-10-11 08:17:50'),
(377, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 25, '2018-10-11 08:18:02'),
(378, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'true', 'Lion10.jpg', 'Lion10.jpg', 27, '2018-10-11 08:18:10'),
(379, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'true', 'February', 'February', 31, '2018-10-11 08:18:18'),
(380, 14, 173, 251, 2, 2, 1, 2, '5', 2, 'true', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 51, '2018-10-11 08:18:45'),
(381, 14, 174, 251, 2, 2, 1, 2, '6', 2, 'true', '44', '44', 53, '2018-10-11 08:18:52'),
(382, 14, 176, 251, 2, 2, 1, 2, '8', 2, 'true', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 6054, '2018-10-11 08:19:59'),
(383, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'true', '32', '32', 6056, '2018-10-11 08:20:06'),
(384, 14, 182, 251, 2, 2, 1, 2, '11', 2, 'true', 'blue', 'Blue', 6058, '2018-10-11 08:20:11'),
(385, 14, 183, 251, 2, 2, 1, 2, '13', 2, 'true', '4', '4', 12002, '2018-10-11 08:20:18'),
(386, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'true', '1', '1', 12004, '2018-10-11 08:20:24'),
(387, 14, 185, 251, 2, 2, 1, 2, '15', 2, 'true', 'sumatran-tiger4.jpg', 'sumatran-tiger4.jpg', 12006, '2018-10-11 08:20:30'),
(388, 14, 186, 251, 2, 2, 1, 2, '18', 2, 'true', '31and1', '31and1', 12009, '2018-10-11 08:20:36'),
(389, 14, 187, 251, 2, 2, 1, 2, '26', 2, 'true', '6', '6', 12011, '2018-10-11 08:20:42'),
(390, 14, 188, 251, 2, 2, 1, 2, '12', 2, 'true', '3', '3', 12015, '2018-10-11 08:20:49'),
(391, 14, 191, 251, 2, 2, 1, 2, '34', 2, 'false', 'sumatran-tiger7.jpg', NULL, 12023, '2018-10-11 08:21:02'),
(392, 14, 192, 251, 2, 2, 1, 2, '31', 2, 'true', '1.5|1.5|1.5', '1.5|1.5|1.5', 66053, '2018-10-11 08:26:16'),
(393, 14, 193, 251, 2, 2, 1, 2, '28', 2, 'true', '2and2', '2and2', 72003, '2018-10-11 08:26:23'),
(394, 14, 194, 251, 2, 2, 1, 2, '33', 2, 'true', '4', '4', 72012, '2018-10-11 08:26:30'),
(395, 14, 195, 251, 2, 2, 1, 2, '32', 2, 'false', 'a:3:{i:0;s:2:\"46\";i:1;s:2:\"48\";i:2;s:2:\"49\";}', 'a:3:{i:0;s:1:\" \";i:1;s:1:\" \";i:2;s:1:\" \";}', 78008, '2018-10-11 08:27:02'),
(396, 14, 193, 251, 2, 2, 1, 2, '28', 2, 'true', '2and2', '2and2', 6, '2018-10-11 08:28:31'),
(397, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 8, '2018-10-11 08:28:38'),
(398, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'true', 'Lion10.jpg', 'Lion10.jpg', 10, '2018-10-11 08:28:46'),
(399, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'true', 'February', 'February', 13, '2018-10-11 08:28:54'),
(400, 14, 173, 251, 2, 2, 1, 2, '5', 2, 'true', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 18, '2018-10-11 08:29:03'),
(401, 14, 174, 251, 2, 2, 1, 2, '6', 2, 'true', '44', '44', 20, '2018-10-11 08:29:10'),
(402, 14, 176, 251, 2, 2, 1, 2, '8', 2, 'true', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 25, '2018-10-11 08:29:22'),
(403, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'true', '32', '32', 28, '2018-10-11 08:29:31'),
(404, 14, 182, 251, 2, 2, 1, 2, '11', 2, 'true', 'blue', 'Blue', 31, '2018-10-11 08:29:45'),
(405, 14, 183, 251, 2, 2, 1, 2, '13', 2, 'true', '4', '4', 35, '2018-10-11 08:29:55'),
(406, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'true', '1', '1', 37, '2018-10-11 08:30:04'),
(407, 14, 185, 251, 2, 2, 1, 2, '15', 2, 'true', 'sumatran-tiger4.jpg', 'sumatran-tiger4.jpg', 40, '2018-10-11 08:30:12'),
(408, 14, 186, 251, 2, 2, 1, 2, '18', 2, 'true', '31and1', '31and1', 47, '2018-10-11 08:30:31'),
(409, 14, 187, 251, 2, 2, 1, 2, '26', 2, 'true', '6', '6', 49, '2018-10-11 08:30:39'),
(410, 14, 188, 251, 2, 2, 1, 2, '12', 2, 'false', '2', '3', 52, '2018-10-11 08:30:47'),
(411, 14, 191, 251, 2, 2, 1, 2, '34', 2, 'true', 'sumatran-tiger12.jpg', 'sumatran-tiger12.jpg', 6034, '2018-10-11 08:31:39'),
(412, 14, 192, 251, 2, 2, 1, 2, '31', 2, 'true', '1.5|1.5|1.5', '1.5|1.5|1.5', 6039, '2018-10-11 08:31:51'),
(413, 14, 193, 251, 2, 2, 1, 2, '28', 2, 'true', '2and2', '2and2', 6042, '2018-10-11 08:31:59'),
(414, 14, 194, 251, 2, 2, 1, 2, '33', 2, 'true', '4', '4', 6045, '2018-10-11 08:32:09'),
(415, 14, 195, 251, 2, 2, 1, 2, '32', 2, 'true', 'a:3:{i:0;s:2:\"46\";i:1;s:2:\"48\";i:2;s:2:\"49\";}', 'a:3:{i:0;s:2:\"46\";i:1;s:2:\"48\";i:2;s:2:\"49\";}', 6054, '2018-10-11 08:32:28'),
(416, 14, 195, 251, 2, 2, 1, 2, '32', 2, 'true', 'a:3:{i:0;s:2:\"46\";i:1;s:2:\"48\";i:2;s:2:\"49\";}', 'a:3:{i:0;s:2:\"46\";i:1;s:2:\"48\";i:2;s:2:\"49\";}', 10, '2018-10-12 01:57:38'),
(417, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 12, '2018-10-12 01:57:43'),
(418, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'true', 'Lion10.jpg', 'Lion10.jpg', 14, '2018-10-12 01:57:48'),
(419, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'true', 'February', 'February', 17, '2018-10-12 01:57:55'),
(420, 14, 173, 251, 2, 2, 1, 2, '5', 2, 'true', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 21, '2018-10-12 01:58:02'),
(421, 14, 174, 251, 2, 2, 1, 2, '6', 2, 'true', '44', '44', 23, '2018-10-12 01:58:07'),
(422, 14, 176, 251, 2, 2, 1, 2, '8', 2, 'true', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 26, '2018-10-12 01:58:13'),
(423, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'true', '32', '32', 28, '2018-10-12 01:58:18'),
(424, 14, 182, 251, 2, 2, 1, 2, '11', 2, 'true', 'blue', 'Blue', 30, '2018-10-12 01:58:24'),
(425, 14, 183, 251, 2, 2, 1, 2, '13', 2, 'true', '4', '4', 33, '2018-10-12 01:58:30'),
(426, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'true', '1', '1', 35, '2018-10-12 01:58:35'),
(427, 14, 185, 251, 2, 2, 1, 2, '15', 2, 'true', 'sumatran-tiger4.jpg', 'sumatran-tiger4.jpg', 37, '2018-10-12 01:58:41'),
(428, 14, 186, 251, 2, 2, 1, 2, '18', 2, 'true', '31and1', '31and1', 41, '2018-10-12 01:58:48'),
(429, 14, 187, 251, 2, 2, 1, 2, '26', 2, 'true', '6', '6', 42, '2018-10-12 01:58:53'),
(430, 14, 188, 251, 2, 2, 1, 2, '12', 2, 'true', '3', '3', 46, '2018-10-12 01:59:00'),
(431, 14, 191, 251, 2, 2, 1, 2, '34', 2, 'true', 'sumatran-tiger12.jpg', 'sumatran-tiger12.jpg', 48, '2018-10-12 01:59:05'),
(432, 14, 192, 251, 2, 2, 1, 2, '31', 2, 'true', '1.5|1.5|1.5', '1.5|1.5|1.5', 53, '2018-10-12 01:59:13'),
(433, 14, 193, 251, 2, 2, 1, 2, '28', 2, 'true', '2and2', '2and2', 57, '2018-10-12 01:59:20'),
(434, 14, 194, 251, 2, 2, 1, 2, '33', 2, 'true', '4', '4', 6000, '2018-10-12 01:59:26'),
(435, 14, 195, 251, 2, 2, 1, 2, '32', 2, 'false', 'a:3:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";}', 'a:3:{i:0;s:2:\"46\";i:1;s:2:\"48\";i:2;s:2:\"49\";}', 6005, '2018-10-12 01:59:34'),
(436, 14, 196, 251, 2, 2, 1, 2, '27', 2, 'true', 'id:0|title:Screenshot(2).png]id:1|title:Screenshot(3).png]id:2|title:Screenshot(2).png]id:3|title:Screenshot(3).png]', 'id:0|title:Screenshot(2).png]id:1|title:Screenshot(3).png]id:2|title:Screenshot(2).png]id:3|title:Screenshot(3).png]', 6014, '2018-10-12 01:59:46'),
(437, 14, 197, 251, 2, 2, 1, 2, '29', 3, 'true', '4', '4', 6022, '2018-10-12 01:59:57'),
(438, 14, 198, 251, 2, 2, 1, 2, '27', 2, 'true', 'id:0|title:Soccer_ball3.svg]id:2|title:Soccer_ball3.svg]', 'id:0|title:Soccer_ball3.svg]id:2|title:Soccer_ball3.svg]', 5, '2018-10-12 02:50:09'),
(439, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 7, '2018-10-12 02:50:15'),
(440, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'true', 'Lion10.jpg', 'Lion10.jpg', 16, '2018-10-12 02:50:27'),
(441, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'false', NULL, 'February', 17, '2018-10-12 02:50:31'),
(442, 14, 173, 251, 2, 2, 1, 2, '5', 2, 'false', 'a:4:{i:0;s:8:\"December\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:3:\"May\";}', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 18, '2018-10-12 02:50:34'),
(443, 14, 174, 251, 2, 2, 1, 2, '6', 2, 'true', '44', '44', 22, '2018-10-12 02:50:38'),
(444, 14, 176, 251, 2, 2, 1, 2, '8', 2, 'false', 'a:1:{i:0;s:10:\"Lion11.jpg\";}', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 29, '2018-10-12 02:50:44'),
(445, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'true', '32', '32', 42, '2018-10-12 02:50:51'),
(446, 14, 182, 251, 2, 2, 1, 2, '11', 2, 'true', 'blue', 'Blue', 59, '2018-10-12 02:50:56'),
(447, 14, 183, 251, 2, 2, 1, 2, '13', 2, 'true', '4', '4', 6018, '2018-10-12 02:51:01'),
(448, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'false', '0', '1', 6057, '2018-10-12 02:51:12'),
(449, 14, 185, 251, 2, 2, 1, 2, '15', 2, 'true', 'sumatran-tiger4.jpg', 'sumatran-tiger4.jpg', 36000, '2018-10-12 02:52:14'),
(450, 14, 186, 251, 2, 2, 1, 2, '18', 2, 'true', '31and1', '31and1', 36046, '2018-10-12 02:52:21'),
(451, 14, 187, 251, 2, 2, 1, 2, '26', 2, 'true', '6', '6', 42018, '2018-10-12 02:52:26'),
(452, 14, 188, 251, 2, 2, 1, 2, '12', 2, 'true', '3', '3', 42056, '2018-10-12 02:52:32'),
(453, 14, 191, 251, 2, 2, 1, 2, '34', 2, 'true', 'sumatran-tiger12.jpg', 'sumatran-tiger12.jpg', 48042, '2018-10-12 02:52:40'),
(454, 14, 192, 251, 2, 2, 1, 2, '31', 2, 'true', '1.5|1.5|1.5', '1.5|1.5|1.5', 60034, '2018-10-12 02:52:56'),
(455, 14, 193, 251, 2, 2, 1, 2, '28', 2, 'true', '2and2', '2and2', 66020, '2018-10-12 02:53:03'),
(456, 14, 194, 251, 2, 2, 1, 2, '33', 2, 'true', '4', '4', 72054, '2018-10-12 02:53:17'),
(457, 14, 195, 251, 2, 2, 1, 2, '32', 2, 'false', 'a:3:{i:0;s:3:\"1.5\";i:1;s:3:\"1.5\";i:2;s:3:\"1.5\";}', 'a:3:{i:0;s:2:\"46\";i:1;s:2:\"48\";i:2;s:2:\"49\";}', 84001, '2018-10-12 02:53:27'),
(458, 14, 196, 251, 2, 2, 1, 2, '27', 2, 'false', '', 'id:0|title:Screenshot(2).png]id:1|title:Screenshot(3).png]id:2|title:Screenshot(2).png]id:3|title:Screenshot(3).png]', 84041, '2018-10-12 02:53:32'),
(459, 14, 197, 251, 2, 2, 1, 2, '29', 3, 'false', '0', '4', 90043, '2018-10-12 02:53:37');
INSERT INTO `student_qns_ans` (`id`, `user_id`, `question_id`, `country_id`, `subject_id`, `grade_id`, `category_id`, `topic_id`, `question_type`, `marks`, `answer_type`, `your_ans`, `correct_ans`, `ans_time`, `submit_date`) VALUES
(460, 14, 192, 251, 2, 2, 1, 2, '31', 2, 'false', '1.5|1.5|', '1.5|1.5|1.5', 39, '2018-10-12 03:01:44'),
(461, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 41, '2018-10-12 03:01:49'),
(462, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'true', 'Lion10.jpg', 'Lion10.jpg', 42, '2018-10-12 03:01:53'),
(463, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'true', 'February', 'February', 43, '2018-10-12 03:01:57'),
(464, 14, 173, 251, 2, 2, 1, 2, '5', 2, 'false', 'a:4:{i:0;s:7:\"October\";i:1;s:4:\"June\";i:2;s:8:\"December\";i:3;s:3:\"May\";}', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 51, '2018-10-12 03:02:08'),
(465, 14, 174, 251, 2, 2, 1, 2, '6', 2, 'true', '44', '44', 55, '2018-10-12 03:02:13'),
(466, 14, 176, 251, 2, 2, 1, 2, '8', 2, 'true', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 6004, '2018-10-12 03:02:18'),
(467, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'false', '30', '32', 6012, '2018-10-12 03:02:24'),
(468, 14, 182, 251, 2, 2, 1, 2, '11', 2, 'false', '8', 'Blue', 6023, '2018-10-12 03:02:29'),
(469, 14, 183, 251, 2, 2, 1, 2, '13', 2, 'true', '4', '4', 6046, '2018-10-12 03:02:34'),
(470, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'true', '1', '1', 12019, '2018-10-12 03:02:39'),
(471, 14, 185, 251, 2, 2, 1, 2, '15', 2, 'true', 'sumatran-tiger4.jpg', 'sumatran-tiger4.jpg', 12058, '2018-10-12 03:02:45'),
(472, 14, 186, 251, 2, 2, 1, 2, '18', 2, 'true', '31and1', '31and1', 18042, '2018-10-12 03:02:52'),
(473, 14, 187, 251, 2, 2, 1, 2, '26', 2, 'true', '6', '6', 24012, '2018-10-12 03:02:57'),
(474, 14, 188, 251, 2, 2, 1, 2, '12', 2, 'false', '2', '3', 30005, '2018-10-12 03:03:05'),
(475, 14, 191, 251, 2, 2, 1, 2, '34', 2, 'false', 'Lion12.jpg', 'sumatran-tiger12.jpg', 30039, '2018-10-12 03:03:09'),
(476, 14, 192, 251, 2, 2, 1, 2, '31', 2, 'false', '||', '1.5|1.5|1.5', 36021, '2018-10-12 03:03:12'),
(477, 14, 193, 251, 2, 2, 1, 2, '28', 2, 'true', '2and2', '2and2', 48021, '2018-10-12 03:03:19'),
(478, 14, 194, 251, 2, 2, 1, 2, '33', 2, 'true', '4', '4', 78009, '2018-10-12 03:03:32'),
(479, 14, 195, 251, 2, 2, 1, 2, '32', 2, 'false', 'a:3:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";}', 'a:3:{i:0;s:2:\"46\";i:1;s:2:\"48\";i:2;s:2:\"49\";}', 84057, '2018-10-12 03:03:37'),
(480, 14, 196, 251, 2, 2, 1, 2, '27', 2, 'true', 'id:0|title:Screenshot(2).png]id:1|title:Screenshot(3).png]id:2|title:Screenshot(2).png]id:3|title:Screenshot(3).png]', 'id:0|title:Screenshot(2).png]id:1|title:Screenshot(3).png]id:2|title:Screenshot(2).png]id:3|title:Screenshot(3).png]', 114023, '2018-10-12 03:03:47'),
(481, 14, 197, 251, 2, 2, 1, 2, '29', 3, 'false', '3', '4', 144037, '2018-10-12 03:03:58'),
(482, 14, 198, 251, 2, 2, 1, 2, '27', 2, 'false', 'id:0|title:Soccer_ball3.svg]id:2|title:Soccer_ball3.svg]id:1|title:Soccer_ball3.svg]', 'id:0|title:Soccer_ball3.svg]id:2|title:Soccer_ball3.svg]', 168057, '2018-10-12 03:04:06'),
(483, 14, 186, 251, 2, 2, 1, 2, '18', 2, 'true', '31and1', '31and1', 4, '2018-10-12 04:26:38'),
(484, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 6, '2018-10-12 04:26:44'),
(485, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'true', 'Lion10.jpg', 'Lion10.jpg', 10, '2018-10-12 04:26:51'),
(486, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'true', 'February', 'February', 13, '2018-10-12 04:26:57'),
(487, 14, 173, 251, 2, 2, 1, 2, '5', 2, 'false', 'a:4:{i:0;s:8:\"December\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:3:\"May\";}', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 14, '2018-10-12 04:27:01'),
(488, 14, 174, 251, 2, 2, 1, 2, '6', 2, 'false', NULL, '44', 12017, '2018-10-12 04:29:07'),
(489, 14, 176, 251, 2, 2, 1, 2, '8', 2, 'false', 'a:1:{i:0;s:20:\"sumatran-tiger11.jpg\";}', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 12019, '2018-10-12 04:29:11'),
(490, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'false', NULL, '32', 12034, '2018-10-12 04:29:16'),
(491, 14, 182, 251, 2, 2, 1, 2, '11', 2, 'false', '', 'Blue', 18001, '2018-10-12 04:29:22'),
(492, 14, 183, 251, 2, 2, 1, 2, '13', 2, 'false', NULL, '4', 18027, '2018-10-12 04:29:25'),
(493, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'false', NULL, '1', 24003, '2018-10-12 04:29:28'),
(494, 14, 185, 251, 2, 2, 1, 2, '15', 2, 'true', 'sumatran-tiger4.jpg', 'sumatran-tiger4.jpg', 24058, '2018-10-12 04:29:32'),
(495, 14, 186, 251, 2, 2, 1, 2, '18', 2, 'false', 'and', '31and1', 36032, '2018-10-12 04:29:36'),
(496, 14, 187, 251, 2, 2, 1, 2, '26', 2, 'true', '6', '6', 114031, '2018-10-12 04:30:03'),
(497, 14, 188, 251, 2, 2, 1, 2, '12', 2, 'true', '3', '3', 180044, '2018-10-12 04:30:27'),
(498, 14, 191, 251, 2, 2, 1, 2, '34', 2, 'true', 'sumatran-tiger12.jpg', 'sumatran-tiger12.jpg', 192059, '2018-10-12 04:30:32'),
(499, 14, 192, 251, 2, 2, 1, 2, '31', 2, 'false', '||', '1.5|1.5|1.5', 204048, '2018-10-12 04:30:36'),
(500, 14, 193, 251, 2, 2, 1, 2, '28', 2, 'false', 'and', '2and2', 222045, '2018-10-12 04:30:41'),
(501, 14, 194, 251, 2, 2, 1, 2, '33', 2, 'false', '', '4', 240009, '2018-10-12 04:30:45'),
(502, 14, 195, 251, 2, 2, 1, 2, '32', 2, 'false', 'a:3:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";}', 'a:3:{i:0;s:2:\"46\";i:1;s:2:\"48\";i:2;s:2:\"49\";}', 252038, '2018-10-12 04:30:48'),
(503, 14, 196, 251, 2, 2, 1, 2, '27', 2, 'false', '', 'id:0|title:Screenshot(2).png]id:1|title:Screenshot(3).png]id:2|title:Screenshot(2).png]id:3|title:Screenshot(3).png]', 270031, '2018-10-12 04:30:51'),
(504, 14, 197, 251, 2, 2, 1, 2, '29', 3, 'true', '4', '4', 348006, '2018-10-12 04:31:01'),
(505, 14, 198, 251, 2, 2, 1, 2, '27', 2, 'true', 'id:0|title:Soccer_ball3.svg]id:2|title:Soccer_ball3.svg]', 'id:0|title:Soccer_ball3.svg]id:2|title:Soccer_ball3.svg]', 3, '2018-10-12 04:31:19'),
(506, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'false', '4', '8', 7, '2018-10-12 04:31:26'),
(507, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'false', '', 'Lion10.jpg', 8, '2018-10-12 04:31:29'),
(508, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'false', NULL, 'February', 10, '2018-10-12 04:31:32'),
(509, 14, 173, 251, 2, 2, 1, 2, '5', 2, 'false', 'a:4:{i:0;s:8:\"December\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:3:\"May\";}', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 17, '2018-10-12 04:31:36'),
(510, 14, 174, 251, 2, 2, 1, 2, '6', 2, 'false', NULL, '44', 30, '2018-10-12 04:31:39'),
(511, 14, 176, 251, 2, 2, 1, 2, '8', 2, 'false', 'a:1:{i:0;s:0:\"\";}', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 56, '2018-10-12 04:31:43'),
(512, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'false', NULL, '32', 6029, '2018-10-12 04:31:46'),
(513, 14, 182, 251, 2, 2, 1, 2, '11', 2, 'false', '', 'Blue', 12021, '2018-10-12 04:31:49'),
(514, 14, 183, 251, 2, 2, 1, 2, '13', 2, 'false', NULL, '4', 24059, '2018-10-12 04:31:55'),
(515, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'false', NULL, '1', 36038, '2018-10-12 04:31:58'),
(516, 14, 185, 251, 2, 2, 1, 2, '15', 2, 'false', '', 'sumatran-tiger4.jpg', 60038, '2018-10-12 04:32:04'),
(517, 14, 186, 251, 2, 2, 1, 2, '18', 2, 'false', 'and', '31and1', 78028, '2018-10-12 04:32:07'),
(518, 14, 187, 251, 2, 2, 1, 2, '26', 2, 'false', NULL, '6', 96020, '2018-10-12 04:32:10'),
(519, 14, 188, 251, 2, 2, 1, 2, '12', 2, 'true', '3', '3', 126042, '2018-10-12 04:32:15'),
(520, 14, 191, 251, 2, 2, 1, 2, '34', 2, 'false', 'Lion12.jpg', 'sumatran-tiger12.jpg', 192045, '2018-10-12 04:32:24'),
(521, 14, 192, 251, 2, 2, 1, 2, '31', 2, 'false', '||', '1.5|1.5|1.5', 420048, '2018-10-12 04:32:49'),
(522, 14, 193, 251, 2, 2, 1, 2, '28', 2, 'false', 'and', '2and2', 444058, '2018-10-12 04:32:51'),
(523, 14, 194, 251, 2, 2, 1, 2, '33', 2, 'false', '', '4', 474035, '2018-10-12 04:32:54'),
(524, 14, 195, 251, 2, 2, 1, 2, '32', 2, 'false', 'a:3:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";}', 'a:3:{i:0;s:2:\"46\";i:1;s:2:\"48\";i:2;s:2:\"49\";}', 504024, '2018-10-12 04:32:56'),
(525, 14, 196, 251, 2, 2, 1, 2, '27', 2, 'false', '', 'id:0|title:Screenshot(2).png]id:1|title:Screenshot(3).png]id:2|title:Screenshot(2).png]id:3|title:Screenshot(3).png]', 552027, '2018-10-12 04:33:00'),
(526, 14, 197, 251, 2, 2, 1, 2, '29', 3, 'false', '2', '4', 654032, '2018-10-12 04:33:06'),
(527, 14, 198, 251, 2, 2, 1, 2, '27', 2, 'false', '', 'id:0|title:Soccer_ball3.svg]id:2|title:Soccer_ball3.svg]', 726059, '2018-10-12 04:33:10'),
(528, 14, 193, 251, 2, 2, 1, 2, '28', 2, 'false', 'and', '2and2', 9, '2018-10-12 09:34:07'),
(529, 14, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 11, '2018-10-12 09:34:15'),
(530, 14, 171, 251, 2, 2, 1, 2, '2', 2, 'true', 'Lion10.jpg', 'Lion10.jpg', 13, '2018-10-12 09:34:20'),
(531, 14, 172, 251, 2, 2, 1, 2, '3', 3, 'false', 'November', 'February', 16, '2018-10-12 09:34:26'),
(532, 14, 173, 251, 2, 2, 1, 2, '5', 2, 'false', 'a:4:{i:0;s:8:\"December\";i:1;s:7:\"October\";i:2;s:4:\"June\";i:3;s:3:\"May\";}', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 24, '2018-10-12 09:34:33'),
(533, 14, 174, 251, 2, 2, 1, 2, '6', 2, 'true', '44', '44', 38, '2018-10-12 09:34:41'),
(534, 14, 176, 251, 2, 2, 1, 2, '8', 2, 'true', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 59, '2018-10-12 09:34:47'),
(535, 14, 179, 251, 2, 2, 1, 2, '9', 2, 'false', '30', '32', 6023, '2018-10-12 09:34:54'),
(536, 14, 182, 251, 2, 2, 1, 2, '11', 2, 'false', '', 'Blue', 198003, '2018-10-12 09:40:28'),
(537, 14, 183, 251, 2, 2, 1, 2, '13', 2, 'true', '4', '4', 198050, '2018-10-12 09:40:33'),
(538, 14, 184, 251, 2, 2, 1, 2, '14', 1, 'false', '0', '1', 204034, '2018-10-12 09:40:37'),
(539, 14, 185, 251, 2, 2, 1, 2, '15', 2, 'true', 'sumatran-tiger4.jpg', 'sumatran-tiger4.jpg', 210017, '2018-10-12 09:40:41'),
(540, 14, 186, 251, 2, 2, 1, 2, '18', 2, 'true', '31and1', '31and1', 216046, '2018-10-12 09:40:47'),
(541, 14, 187, 251, 2, 2, 1, 2, '26', 2, 'true', '6', '6', 228000, '2018-10-12 09:40:51'),
(542, 14, 188, 251, 2, 2, 1, 2, '12', 2, 'true', '3', '3', 330020, '2018-10-12 09:41:56'),
(543, 14, 191, 251, 2, 2, 1, 2, '34', 2, 'true', 'sumatran-tiger12.jpg', 'sumatran-tiger12.jpg', 696018, '2018-10-12 09:45:46'),
(544, 14, 192, 251, 2, 2, 1, 2, '31', 2, 'false', '||', '1.5|1.5|1.5', 702054, '2018-10-12 09:45:52'),
(545, 14, 193, 251, 2, 2, 1, 2, '28', 2, 'false', 'and', '2and2', 714038, '2018-10-12 09:45:58'),
(546, 14, 194, 251, 2, 2, 1, 2, '33', 2, 'true', '4', '4', 726022, '2018-10-12 09:46:02'),
(547, 14, 195, 251, 2, 2, 1, 2, '32', 2, 'false', 'a:3:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";}', 'a:3:{i:0;s:2:\"46\";i:1;s:2:\"48\";i:2;s:2:\"49\";}', 738034, '2018-10-12 09:46:06'),
(548, 14, 196, 251, 2, 2, 1, 2, '27', 2, 'true', 'id:0|title:Screenshot(2).png]id:1|title:Screenshot(3).png]id:2|title:Screenshot(2).png]id:3|title:Screenshot(3).png]', 'id:0|title:Screenshot(2).png]id:1|title:Screenshot(3).png]id:2|title:Screenshot(2).png]id:3|title:Screenshot(3).png]', 768031, '2018-10-12 09:46:15'),
(549, 14, 197, 251, 2, 2, 1, 2, '29', 3, 'false', '5', '4', 834053, '2018-10-12 09:46:34'),
(550, 14, 198, 251, 2, 2, 1, 2, '27', 2, 'true', 'id:0|title:Soccer_ball3.svg]id:2|title:Soccer_ball3.svg]', 'id:0|title:Soccer_ball3.svg]id:2|title:Soccer_ball3.svg]', 864045, '2018-10-12 09:46:41'),
(551, 13, 178, 251, 3, 10, 1, 2, '29', 10, 'true', '1', '1', 5, '2018-10-14 17:29:56'),
(552, 13, 178, 251, 3, 10, 1, 2, '29', 10, 'true', '1', '1', 9, '2018-10-14 17:30:03'),
(553, 13, 181, 251, 3, 10, 1, 2, '29', 10, 'false', '4', '3', 19, '2018-10-14 17:30:16'),
(554, 13, 120, 251, 3, 10, 13, 38, '11', 10, 'false', '', '400', 1, '2018-10-14 17:58:25'),
(555, 13, 121, 251, 3, 10, 12, 38, '1', 10, 'false', '10', '10p', 3, '2018-10-14 17:58:28'),
(556, 13, 1, 1, 2, 1, 1, 1, '1', 10, 'true', 'grey', 'Grey', 5, '2018-11-13 05:32:16'),
(557, 13, 2, 1, 2, 1, 1, 1, '1', 10, 'true', 'green', 'Green', 6, '2018-11-13 05:32:20'),
(558, 13, 3, 1, 2, 1, 1, 1, '1', 10, 'true', 'green', 'Green', 8, '2018-11-13 05:32:25'),
(559, 13, 4, 2, 2, 1, 1, 1, '1', 10, 'true', 'green', 'Green', 9, '2018-11-13 05:32:29'),
(560, 13, 5, 1, 2, 1, 1, 1, '1', 10, 'true', 'green', 'Green', 10, '2018-11-13 05:32:34'),
(561, 13, 40, 77, 2, 1, 1, 1, '1', 10, 'true', 'no', 'No', 13, '2018-11-13 05:32:39'),
(562, 27, 2, 1, 2, 1, 1, 1, '1', 10, 'true', 'green', 'Green', 3, '2018-11-15 06:44:16'),
(563, 27, 2, 1, 2, 1, 1, 1, '1', 10, 'true', 'green', 'Green', 6, '2018-11-15 06:44:22'),
(564, 27, 3, 1, 2, 1, 1, 1, '1', 10, 'true', 'green', 'Green', 9, '2018-11-15 06:44:29'),
(565, 27, 4, 2, 2, 1, 1, 1, '1', 10, 'true', 'green', 'Green', 12, '2018-11-15 06:44:35'),
(566, 27, 5, 1, 2, 1, 1, 1, '1', 10, 'true', 'green', 'Green', 14, '2018-11-15 06:44:40'),
(567, 27, 40, 77, 2, 1, 1, 1, '1', 10, 'true', 'no', 'No', 17, '2018-11-15 06:44:47'),
(568, 27, 139, 251, 3, 10, 10, 4, '3', 10, 'true', 'Nest', 'Nest', 8, '2018-11-15 06:46:04'),
(569, 27, 165, 251, 3, 11, 1, 3, '27', 10, 'true', 'id:0|title:circle.jpg]id:1|title:trianlgle2.jpg]id:2|title:circle.jpg]id:3|title:trianlgle2.jpg]id:4|title:circle.jpg]', 'id:0|title:circle.jpg]id:1|title:trianlgle2.jpg]id:2|title:circle.jpg]id:3|title:trianlgle2.jpg]id:4|title:circle.jpg]', 7, '2018-11-15 07:02:35'),
(570, 31, 108, 251, 3, 2, 1, 14, '26', 5, 'true', '3', '3', 2, '2018-11-15 16:38:24'),
(571, 31, 57, 1, 3, 2, 1, 18, '8', 10, 'true', 'a:2:{i:0;s:10:\"shape1.jpg\";i:1;s:10:\"shape2.jpg\";}', 'a:2:{i:0;s:10:\"shape1.jpg\";i:1;s:10:\"shape2.jpg\";}', 3, '2018-11-15 16:41:06'),
(572, 31, 58, 1, 3, 2, 1, 18, '8', 10, 'true', 'a:2:{i:0;s:11:\"shape31.jpg\";i:1;s:10:\"shape7.jpg\";}', 'a:2:{i:0;s:11:\"shape31.jpg\";i:1;s:10:\"shape7.jpg\";}', 6, '2018-11-15 16:41:12'),
(573, 31, 59, 1, 3, 2, 1, 18, '8', 10, 'false', 'a:3:{i:0;s:14:\"trianlgle2.jpg\";i:1;s:14:\"trianlgle3.jpg\";i:2;s:13:\"trianlgle.jpg\";}', 'a:3:{i:0;s:13:\"trianlgle.jpg\";i:1;s:14:\"trianlgle2.jpg\";i:2;s:14:\"trianlgle3.jpg\";}', 9, '2018-11-15 16:41:19'),
(574, 31, 110, 251, 3, 2, 1, 18, '8', 5, 'false', 'a:3:{i:0;s:12:\"circle12.jpg\";i:1;s:12:\"circle14.jpg\";i:2;s:12:\"circle13.jpg\";}', 'a:3:{i:0;s:12:\"circle12.jpg\";i:1;s:12:\"circle13.jpg\";i:2;s:12:\"circle14.jpg\";}', 16, '2018-11-15 16:41:28'),
(575, 31, 122, 251, 3, 10, 12, 35, '26', 10, 'true', '5p', '5p', 2, '2018-11-15 16:42:05'),
(576, 31, 56, 1, 3, 2, 1, 19, '9', 10, 'false', 'summer', 'winter', 6, '2018-11-15 16:43:13'),
(577, 31, 111, 251, 3, 2, 1, 19, '9', 5, 'true', 'June', 'June', 7, '2018-11-15 16:43:17'),
(578, 31, 62, 1, 3, 2, 1, 20, '1', 5, 'false', '1p', '1', 5, '2018-11-15 16:44:11'),
(579, 31, 62, 1, 3, 2, 1, 20, '1', 5, 'true', '1', '1', 9, '2018-11-15 16:44:17'),
(580, 31, 100, 251, 3, 2, 1, 20, '1', 5, 'true', '2', '2', 11, '2018-11-15 16:44:22'),
(581, 27, 186, 251, 2, 2, 1, 2, '18', 2, 'true', '31and1', '31and1', 12, '2018-11-16 01:51:16'),
(582, 27, 169, 251, 2, 2, 1, 2, '1', 2, 'true', '8', '8', 19, '2018-11-16 01:51:26'),
(583, 27, 171, 251, 2, 2, 1, 2, '2', 2, 'true', 'Lion10.jpg', 'Lion10.jpg', 22, '2018-11-16 01:51:32'),
(584, 27, 172, 251, 2, 2, 1, 2, '3', 3, 'true', 'February', 'February', 26, '2018-11-16 01:51:39'),
(585, 27, 173, 251, 2, 2, 1, 2, '5', 2, 'true', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 'a:4:{i:0;s:3:\"May\";i:1;s:4:\"June\";i:2;s:7:\"October\";i:3;s:8:\"December\";}', 34, '2018-11-16 01:51:50'),
(586, 27, 174, 251, 2, 2, 1, 2, '6', 2, 'true', '44', '44', 38, '2018-11-16 01:51:57'),
(587, 27, 176, 251, 2, 2, 1, 2, '8', 2, 'false', 'a:2:{i:0;s:20:\"sumatran-tiger11.jpg\";i:1;s:28:\"majestic-way-of-walking2.jpg\";}', 'a:2:{i:0;s:28:\"majestic-way-of-walking2.jpg\";i:1;s:20:\"sumatran-tiger11.jpg\";}', 44, '2018-11-16 01:52:06'),
(588, 27, 179, 251, 2, 2, 1, 2, '9', 2, 'true', '32', '32', 47, '2018-11-16 01:52:11'),
(589, 27, 182, 251, 2, 2, 1, 2, '11', 2, 'true', 'Blue', 'Blue', 50, '2018-11-16 01:52:18'),
(590, 27, 183, 251, 2, 2, 1, 2, '13', 2, 'true', '4', '4', 54, '2018-11-16 01:52:25'),
(591, 27, 184, 251, 2, 2, 1, 2, '14', 1, 'true', '1', '1', 6004, '2018-11-16 01:52:38'),
(592, 27, 185, 251, 2, 2, 1, 2, '15', 2, 'true', 'sumatran-tiger4.jpg', 'sumatran-tiger4.jpg', 6033, '2018-11-16 01:53:11'),
(593, 27, 186, 251, 2, 2, 1, 2, '18', 2, 'true', '31and1', '31and1', 6036, '2018-11-16 01:53:17'),
(594, 27, 187, 251, 2, 2, 1, 2, '26', 2, 'true', '6', '6', 6040, '2018-11-16 01:53:24'),
(595, 27, 188, 251, 2, 2, 1, 2, '12', 2, 'true', '3', '3', 6048, '2018-11-16 01:53:35'),
(596, 27, 191, 251, 2, 2, 1, 2, '34', 2, 'true', 'sumatran-tiger12.jpg', 'sumatran-tiger12.jpg', 6053, '2018-11-16 01:53:43'),
(597, 27, 82, 1, 3, 3, 14, 26, '20', 5, 'true', '1', '1', 3, '2018-11-16 01:54:25'),
(598, 27, 75, 1, 3, 3, 14, 26, '3', 5, 'true', 'Blue', 'blue', 6, '2018-11-16 01:54:31'),
(599, 27, 77, 1, 3, 3, 14, 26, '6', 5, 'true', '2', '2', 8, '2018-11-16 01:54:36'),
(600, 27, 78, 1, 3, 3, 14, 26, '8', 5, 'true', 'a:1:{i:0;s:9:\"frog3.PNG\";}', 'a:1:{i:0;s:9:\"frog3.PNG\";}', 12, '2018-11-16 01:54:44'),
(601, 27, 79, 1, 3, 3, 14, 26, '9', 5, 'true', 'Yes', 'Yes', 18, '2018-11-16 01:54:53'),
(602, 27, 80, 1, 3, 3, 14, 26, '11', 5, 'true', '4', '4', 21, '2018-11-16 01:54:59'),
(603, 27, 81, 1, 3, 3, 14, 26, '14', 5, 'false', 'True', 'False', 24, '2018-11-16 01:55:05'),
(604, 27, 82, 1, 3, 3, 14, 26, '20', 5, 'true', '1', '1', 26, '2018-11-16 01:55:10'),
(605, 27, 83, 1, 3, 3, 13, 26, '1', 5, 'true', 'red', 'red', 29, '2018-11-16 01:55:17'),
(606, 27, 44, 1, 3, 1, 1, 12, '5', 10, 'true', 'a:4:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";}', 'a:4:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";}', 5, '2018-11-16 01:55:35'),
(607, 27, 110, 251, 3, 2, 1, 18, '8', 5, 'false', 'a:3:{i:0;s:12:\"circle14.jpg\";i:1;s:12:\"circle12.jpg\";i:2;s:12:\"circle13.jpg\";}', 'a:3:{i:0;s:12:\"circle12.jpg\";i:1;s:12:\"circle13.jpg\";i:2;s:12:\"circle14.jpg\";}', 4, '2018-11-16 02:57:40'),
(608, 27, 58, 1, 3, 2, 1, 18, '8', 10, 'false', 'a:1:{i:0;s:11:\"shape31.jpg\";}', 'a:2:{i:0;s:11:\"shape31.jpg\";i:1;s:10:\"shape7.jpg\";}', 6, '2018-11-16 02:57:45'),
(609, 27, 59, 1, 3, 2, 1, 18, '8', 10, 'false', 'a:3:{i:0;s:14:\"trianlgle2.jpg\";i:1;s:14:\"trianlgle3.jpg\";i:2;s:13:\"trianlgle.jpg\";}', 'a:3:{i:0;s:13:\"trianlgle.jpg\";i:1;s:14:\"trianlgle2.jpg\";i:2;s:14:\"trianlgle3.jpg\";}', 12, '2018-11-16 02:57:50'),
(610, 27, 110, 251, 3, 2, 1, 18, '8', 5, 'false', 'a:1:{i:0;s:12:\"circle12.jpg\";}', 'a:3:{i:0;s:12:\"circle12.jpg\";i:1;s:12:\"circle13.jpg\";i:2;s:12:\"circle14.jpg\";}', 35, '2018-11-16 02:57:58'),
(611, 27, 142, 251, 3, 10, 21, 1, '3', 10, 'true', '100', '100', 3, '2018-11-16 02:58:22'),
(612, 27, 141, 251, 3, 10, 21, 1, '2', 10, 'true', '875806_R3.jpg', '875806_R3.jpg', 5, '2018-11-16 02:58:27'),
(613, 27, 142, 251, 3, 10, 21, 1, '3', 10, 'true', '100', '100', 7, '2018-11-16 02:58:33'),
(614, 27, 143, 251, 3, 10, 21, 1, '5', 10, 'true', 'a:4:{i:0;s:1:\"A\";i:1;s:1:\"B\";i:2;s:1:\"C\";i:3;s:1:\"D\";}', 'a:4:{i:0;s:1:\"A\";i:1;s:1:\"B\";i:2;s:1:\"C\";i:3;s:1:\"D\";}', 11, '2018-11-16 02:58:39'),
(615, 27, 144, 251, 3, 10, 21, 1, '6', 10, 'true', '10', '10', 150043, '2018-11-16 03:24:16'),
(616, 27, 145, 251, 3, 10, 21, 1, '8', 10, 'true', 'a:1:{i:0;s:13:\"875806_R4.jpg\";}', 'a:1:{i:0;s:13:\"875806_R4.jpg\";}', 150047, '2018-11-16 03:24:22'),
(617, 27, 146, 251, 3, 10, 21, 1, '9', 10, 'true', 'A', 'A', 150050, '2018-11-16 03:24:29'),
(618, 27, 147, 251, 3, 10, 21, 1, '11', 10, 'true', '2', '2', 150053, '2018-11-16 03:24:36'),
(619, 27, 148, 251, 3, 10, 21, 1, '13', 10, 'true', '150', '150', 150058, '2018-11-16 03:24:44'),
(620, 27, 149, 251, 3, 10, 21, 1, '14', 10, 'true', '2', '2', 156001, '2018-11-16 03:24:50'),
(621, 27, 150, 251, 3, 10, 21, 1, '15', 10, 'true', 'cars1.PNG', 'cars1.PNG', 156003, '2018-11-16 03:24:55'),
(622, 27, 152, 251, 3, 10, 21, 1, '20', 2, 'true', 'yellow', 'yellow', 156007, '2018-11-16 03:25:03'),
(623, 14, 51, 1, 2, 1, 1, 17, '20', 10, 'true', 'Cow', 'Cow', 13, '2018-11-20 07:33:13'),
(624, 14, 51, 1, 2, 1, 1, 17, '20', 10, 'true', 'Cow', 'Cow', 16, '2018-11-20 07:33:19'),
(625, 14, 103, 251, 2, 2, 1, 12, '5', 5, 'false', 'a:3:{i:0;s:1:\"C\";i:1;s:1:\"O\";i:2;s:1:\"W\";}', 'a:3:{i:0;s:1:\"C\";i:1;s:1:\"W\";i:2;s:1:\"O\";}', 6, '2018-11-20 13:47:03'),
(626, 14, 105, 251, 2, 2, 1, 12, '5', 5, 'false', 'a:5:{i:0;s:1:\"A\";i:1;s:1:\"E\";i:2;s:1:\"L\";i:3;s:1:\"P\";i:4;s:1:\"P\";}', 'a:5:{i:0;s:1:\"A\";i:1;s:1:\"P\";i:2;s:1:\"P\";i:3;s:1:\"L\";i:4;s:1:\"E\";}', 19, '2018-11-20 13:47:20'),
(627, 14, 85, 1, 3, 3, 6, 3, '1', 5, 'true', '2', '2', 5, '2018-11-20 14:32:59'),
(628, 14, 85, 1, 3, 3, 6, 3, '1', 5, 'true', '2', '2', 7, '2018-11-20 14:33:03'),
(629, 14, 80, 1, 3, 3, 14, 26, '11', 5, 'true', '4', '4', 4, '2018-11-20 14:38:43'),
(630, 14, 75, 1, 3, 3, 14, 26, '3', 5, 'true', 'Blue', 'blue', 7, '2018-11-20 14:38:49'),
(631, 14, 77, 1, 3, 3, 14, 26, '6', 5, 'true', '2', '2', 10, '2018-11-20 14:38:55'),
(632, 14, 78, 1, 3, 3, 14, 26, '8', 5, 'true', 'a:1:{i:0;s:9:\"frog3.PNG\";}', 'a:1:{i:0;s:9:\"frog3.PNG\";}', 16, '2018-11-20 14:39:04'),
(633, 14, 79, 1, 3, 3, 14, 26, '9', 5, 'true', 'Yes', 'Yes', 19, '2018-11-20 14:39:10'),
(634, 14, 80, 1, 3, 3, 14, 26, '11', 5, 'false', '5', '4', 24, '2018-11-20 14:39:19'),
(635, 14, 81, 1, 3, 3, 14, 26, '14', 5, 'false', 'True', 'False', 34, '2018-11-20 14:39:32'),
(636, 14, 82, 1, 3, 3, 14, 26, '20', 5, 'true', '1', '1', 40, '2018-11-20 14:39:37'),
(637, 14, 83, 1, 3, 3, 13, 26, '1', 5, 'true', 'red', 'red', 51, '2018-11-20 14:39:44'),
(638, 14, 95, 251, 3, 3, 14, 26, '1', 5, 'true', '5', '5', 6006, '2018-11-20 14:39:53'),
(639, 35, 60, 1, 2, 3, 1, 15, '6', 5, 'true', 'a', 'a', 2, '2018-11-20 14:42:24'),
(640, 35, 60, 1, 2, 3, 1, 15, '6', 5, 'true', 'a', 'a', 4, '2018-11-20 14:45:42'),
(641, 35, 60, 1, 2, 3, 1, 15, '6', 5, 'true', 'a', 'a', 2, '2018-11-20 14:46:11'),
(642, 35, 60, 1, 2, 3, 1, 15, '6', 5, 'true', 'a', 'a', 1, '2018-11-20 14:47:17'),
(643, 35, 60, 1, 2, 3, 1, 15, '6', 5, 'true', 'a', 'a', 3, '2018-11-20 14:49:26'),
(644, 35, 60, 1, 2, 3, 1, 15, '6', 5, 'true', 'a', 'a', 2, '2018-11-20 14:52:11'),
(645, 35, 60, 1, 2, 3, 1, 15, '6', 5, 'true', 'a', 'a', 2, '2018-11-20 14:54:23'),
(646, 36, 44, 1, 3, 1, 1, 12, '5', 10, 'true', 'a:4:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";}', 'a:4:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";}', 2, '2018-12-04 15:13:35'),
(647, 36, 101, 251, 3, 1, 22, 16, '2', 5, 'true', 'bone.jpg', 'bone.jpg', 1, '2018-12-04 15:13:43'),
(648, 36, 108, 251, 3, 2, 1, 14, '26', 5, 'true', '3', '3', 2, '2018-12-04 15:14:07'),
(649, 36, 59, 1, 3, 2, 1, 18, '8', 10, 'false', 'a:3:{i:0;s:14:\"trianlgle2.jpg\";i:1;s:14:\"trianlgle3.jpg\";i:2;s:13:\"trianlgle.jpg\";}', 'a:3:{i:0;s:13:\"trianlgle.jpg\";i:1;s:14:\"trianlgle2.jpg\";i:2;s:14:\"trianlgle3.jpg\";}', 2, '2018-12-04 15:14:13'),
(650, 36, 58, 1, 3, 2, 1, 18, '8', 10, 'true', 'a:2:{i:0;s:11:\"shape31.jpg\";i:1;s:10:\"shape7.jpg\";}', 'a:2:{i:0;s:11:\"shape31.jpg\";i:1;s:10:\"shape7.jpg\";}', 4, '2018-12-04 15:14:17'),
(651, 36, 59, 1, 3, 2, 1, 18, '8', 10, 'false', 'a:3:{i:0;s:14:\"trianlgle2.jpg\";i:1;s:14:\"trianlgle3.jpg\";i:2;s:13:\"trianlgle.jpg\";}', 'a:3:{i:0;s:13:\"trianlgle.jpg\";i:1;s:14:\"trianlgle2.jpg\";i:2;s:14:\"trianlgle3.jpg\";}', 6, '2018-12-04 15:14:21'),
(652, 36, 110, 251, 3, 2, 1, 18, '8', 5, 'false', 'a:3:{i:0;s:12:\"circle13.jpg\";i:1;s:12:\"circle14.jpg\";i:2;s:12:\"circle12.jpg\";}', 'a:3:{i:0;s:12:\"circle12.jpg\";i:1;s:12:\"circle13.jpg\";i:2;s:12:\"circle14.jpg\";}', 10, '2018-12-04 15:14:25'),
(653, 36, 56, 1, 3, 2, 1, 19, '9', 10, 'false', 'summer', 'winter', 12, '2018-12-04 15:14:42'),
(654, 36, 111, 251, 3, 2, 1, 19, '9', 5, 'true', 'June', 'June', 13, '2018-12-04 15:14:45'),
(655, 36, 100, 251, 3, 2, 1, 20, '1', 5, 'true', '2', '2', 1, '2018-12-04 15:14:53'),
(656, 36, 62, 1, 3, 2, 1, 20, '1', 5, 'true', '1', '1', 3, '2018-12-04 15:14:57'),
(657, 36, 100, 251, 3, 2, 1, 20, '1', 5, 'true', '2', '2', 4, '2018-12-04 15:15:01'),
(658, 36, 159, 251, 3, 2, 22, 9, '11', 5, 'true', '2', '2', 2, '2018-12-04 15:15:08'),
(659, 36, 159, 251, 3, 2, 22, 9, '11', 5, 'true', '2', '2', 4, '2018-12-04 15:15:13'),
(660, 36, 151, 251, 3, 2, 22, 1, '18', 5, 'true', '13and15', '13and15', 5, '2018-12-04 15:15:24'),
(661, 36, 164, 251, 3, 2, 9, 39, '32', 10, 'true', 'a:3:{i:0;s:2:\"88\";i:1;s:2:\"90\";i:2;s:2:\"92\";}', 'a:3:{i:0;s:2:\"88\";i:1;s:2:\"90\";i:2;s:2:\"92\";}', 9, '2018-12-04 15:15:43'),
(662, 36, 80, 1, 3, 3, 14, 26, '11', 5, 'true', '4', '4', 1, '2018-12-04 15:15:58'),
(663, 36, 75, 1, 3, 3, 14, 26, '3', 5, 'true', 'Blue', 'blue', 3, '2018-12-04 15:16:02'),
(664, 36, 77, 1, 3, 3, 14, 26, '6', 5, 'true', '2', '2', 6, '2018-12-04 15:16:08'),
(665, 36, 78, 1, 3, 3, 14, 26, '8', 5, 'true', 'a:1:{i:0;s:9:\"frog3.PNG\";}', 'a:1:{i:0;s:9:\"frog3.PNG\";}', 8, '2018-12-04 15:16:13'),
(666, 36, 79, 1, 3, 3, 14, 26, '9', 5, 'false', 'No', 'Yes', 12, '2018-12-04 15:16:20'),
(667, 36, 80, 1, 3, 3, 14, 26, '11', 5, 'true', '4', '4', 14, '2018-12-04 15:16:25'),
(668, 36, 81, 1, 3, 3, 14, 26, '14', 5, 'true', 'False', 'False', 17, '2018-12-04 15:16:31'),
(669, 36, 82, 1, 3, 3, 14, 26, '20', 5, 'true', '1', '1', 20, '2018-12-04 15:16:37'),
(670, 36, 95, 251, 3, 3, 14, 26, '1', 5, 'true', '5', '5', 24, '2018-12-04 15:16:43'),
(671, 36, 85, 1, 3, 3, 6, 3, '1', 5, 'true', '2', '2', 1, '2018-12-04 15:16:51'),
(672, 36, 85, 1, 3, 3, 6, 3, '1', 5, 'true', '2', '2', 2, '2018-12-04 15:16:55'),
(673, 37, 108, 251, 3, 2, 1, 14, '26', 5, 'true', '3', '3', 2, '2018-12-04 15:21:45'),
(674, 37, 58, 1, 3, 2, 1, 18, '8', 10, 'false', 'a:2:{i:0;s:10:\"shape7.jpg\";i:1;s:11:\"shape31.jpg\";}', 'a:2:{i:0;s:11:\"shape31.jpg\";i:1;s:10:\"shape7.jpg\";}', 2, '2018-12-04 15:21:52'),
(675, 37, 58, 1, 3, 2, 1, 18, '8', 10, 'false', 'a:1:{i:0;s:10:\"shape7.jpg\";}', 'a:2:{i:0;s:11:\"shape31.jpg\";i:1;s:10:\"shape7.jpg\";}', 3, '2018-12-04 15:21:54'),
(676, 37, 59, 1, 3, 2, 1, 18, '8', 10, 'false', 'a:3:{i:0;s:14:\"trianlgle2.jpg\";i:1;s:14:\"trianlgle3.jpg\";i:2;s:13:\"trianlgle.jpg\";}', 'a:3:{i:0;s:13:\"trianlgle.jpg\";i:1;s:14:\"trianlgle2.jpg\";i:2;s:14:\"trianlgle3.jpg\";}', 7, '2018-12-04 15:21:58'),
(677, 37, 110, 251, 3, 2, 1, 18, '8', 5, 'false', 'a:1:{i:0;s:8:\"box1.jpg\";}', 'a:3:{i:0;s:12:\"circle12.jpg\";i:1;s:12:\"circle13.jpg\";i:2;s:12:\"circle14.jpg\";}', 16, '2018-12-04 15:22:01'),
(678, 37, 113, 251, 3, 2, 1, 9, '11', 5, 'false', '2', '300', 2, '2018-12-04 15:22:08'),
(679, 37, 95, 251, 3, 3, 14, 26, '1', 5, 'true', '5', '5', 2, '2018-12-04 15:24:47'),
(680, 36, 205, 251, 3, 2, 28, 56, '11', 10, 'true', '2', '2', 2, '2018-12-04 15:59:59'),
(681, 36, 203, 251, 3, 2, 28, 56, '33', 10, 'false', '1', '2', 3, '2018-12-04 16:00:32'),
(682, 36, 204, 251, 3, 2, 28, 56, '33', 10, 'false', '1', '4', 5, '2018-12-04 16:00:36'),
(683, 36, 206, 251, 3, 2, 28, 57, '33', 10, 'true', '5', '5', 6022, '2018-12-04 16:04:47'),
(684, 36, 206, 251, 3, 2, 28, 57, '33', 10, 'true', '5', '5', 2, '2018-12-04 16:06:51'),
(685, 36, 207, 251, 3, 2, 28, 57, '33', 10, 'true', '2', '2', 6, '2018-12-04 16:06:57'),
(686, 36, 207, 251, 3, 2, 28, 57, '33', 10, 'true', '2', '2', 2, '2018-12-04 16:11:33'),
(687, 36, 207, 251, 3, 2, 28, 57, '33', 10, 'true', '2', '2', 3, '2018-12-04 16:11:36'),
(688, 36, 208, 251, 3, 2, 28, 57, '1', 10, 'true', '1', '1', 5, '2018-12-04 16:11:41'),
(689, 36, 209, 251, 3, 2, 28, 56, '1', 10, 'true', '3', '3', 5, '2018-12-04 16:14:43'),
(690, 36, 209, 251, 3, 2, 28, 56, '1', 10, 'true', '3', '3', 2, '2018-12-04 16:16:48'),
(691, 36, 210, 251, 3, 2, 28, 56, '2', 10, 'true', 'kisspng-3-balls-ball-pits-clip-art-ball-pit-5b0f9c1459c6f9_98258435152774965236772.jpg', 'kisspng-3-balls-ball-pits-clip-art-ball-pit-5b0f9c1459c6f9_98258435152774965236772.jpg', 4, '2018-12-04 16:16:52'),
(692, 36, 211, 251, 3, 2, 28, 56, '3', 10, 'true', 'Ball', 'Ball', 2, '2018-12-04 16:19:31'),
(693, 36, 214, 251, 3, 2, 28, 56, '9', 20, 'true', '5 Balls', '5 Balls', 2, '2018-12-04 16:26:08'),
(694, 36, 210, 251, 3, 2, 28, 56, '2', 10, 'true', 'kisspng-3-balls-ball-pits-clip-art-ball-pit-5b0f9c1459c6f9_98258435152774965236772.jpg', 'kisspng-3-balls-ball-pits-clip-art-ball-pit-5b0f9c1459c6f9_98258435152774965236772.jpg', 4, '2018-12-04 16:26:12'),
(695, 36, 211, 251, 3, 2, 28, 56, '3', 10, 'true', 'Ball', 'Ball', 8, '2018-12-04 16:26:19'),
(696, 36, 212, 251, 3, 2, 28, 56, '5', 10, 'true', 'a:4:{i:0;s:6:\"1 ball\";i:1;s:7:\"2 balls\";i:2;s:7:\"3 balls\";i:3;s:7:\"4 balls\";}', 'a:4:{i:0;s:6:\"1 ball\";i:1;s:7:\"2 balls\";i:2;s:7:\"3 balls\";i:3;s:7:\"4 balls\";}', 11, '2018-12-04 16:26:24'),
(697, 36, 213, 251, 3, 2, 28, 56, '8', 10, 'true', 'a:1:{i:0;s:21:\"soccer-ball-icon6.jpg\";}', 'a:1:{i:0;s:21:\"soccer-ball-icon6.jpg\";}', 13, '2018-12-04 16:26:29'),
(698, 36, 214, 251, 3, 2, 28, 56, '9', 20, 'true', '5 Balls', '5 Balls', 15, '2018-12-04 16:26:34'),
(699, 36, 215, 251, 3, 2, 28, 56, '11', 10, 'true', '2', '2', 2, '2018-12-04 16:27:55'),
(700, 36, 210, 251, 3, 2, 28, 56, '2', 10, 'true', 'kisspng-3-balls-ball-pits-clip-art-ball-pit-5b0f9c1459c6f9_98258435152774965236772.jpg', 'kisspng-3-balls-ball-pits-clip-art-ball-pit-5b0f9c1459c6f9_98258435152774965236772.jpg', 4, '2018-12-04 16:28:00'),
(701, 36, 211, 251, 3, 2, 28, 56, '3', 10, 'true', 'Ball', 'Ball', 6, '2018-12-04 16:28:05'),
(702, 36, 212, 251, 3, 2, 28, 56, '5', 10, 'true', 'a:4:{i:0;s:6:\"1 ball\";i:1;s:7:\"2 balls\";i:2;s:7:\"3 balls\";i:3;s:7:\"4 balls\";}', 'a:4:{i:0;s:6:\"1 ball\";i:1;s:7:\"2 balls\";i:2;s:7:\"3 balls\";i:3;s:7:\"4 balls\";}', 8, '2018-12-04 16:28:09'),
(703, 36, 213, 251, 3, 2, 28, 56, '8', 10, 'true', 'a:1:{i:0;s:21:\"soccer-ball-icon6.jpg\";}', 'a:1:{i:0;s:21:\"soccer-ball-icon6.jpg\";}', 10, '2018-12-04 16:28:14'),
(704, 36, 214, 251, 3, 2, 28, 56, '9', 20, 'true', '5 Balls', '5 Balls', 12, '2018-12-04 16:28:18'),
(705, 36, 208, 251, 3, 2, 28, 57, '1', 10, 'true', '1', '1', 2, '2018-12-04 16:29:34'),
(706, 36, 206, 251, 3, 2, 28, 57, '33', 10, 'true', '5', '5', 5, '2018-12-04 16:31:46'),
(707, 36, 207, 251, 3, 2, 28, 57, '33', 10, 'false', NULL, '2', 6, '2018-12-04 16:31:49'),
(708, 36, 214, 251, 3, 2, 28, 56, '9', 20, 'true', '5 Balls', '5 Balls', 1, '2018-12-04 16:31:59'),
(709, 36, 210, 251, 3, 2, 28, 56, '2', 10, 'true', 'kisspng-3-balls-ball-pits-clip-art-ball-pit-5b0f9c1459c6f9_98258435152774965236772.jpg', 'kisspng-3-balls-ball-pits-clip-art-ball-pit-5b0f9c1459c6f9_98258435152774965236772.jpg', 2, '2018-12-04 16:32:03'),
(710, 36, 211, 251, 3, 2, 28, 56, '3', 10, 'true', 'Ball', 'Ball', 3, '2018-12-04 16:32:07'),
(711, 36, 212, 251, 3, 2, 28, 56, '5', 10, 'true', 'a:4:{i:0;s:6:\"1 ball\";i:1;s:7:\"2 balls\";i:2;s:7:\"3 balls\";i:3;s:7:\"4 balls\";}', 'a:4:{i:0;s:6:\"1 ball\";i:1;s:7:\"2 balls\";i:2;s:7:\"3 balls\";i:3;s:7:\"4 balls\";}', 5, '2018-12-04 16:32:11'),
(712, 36, 213, 251, 3, 2, 28, 56, '8', 10, 'true', 'a:1:{i:0;s:21:\"soccer-ball-icon6.jpg\";}', 'a:1:{i:0;s:21:\"soccer-ball-icon6.jpg\";}', 7, '2018-12-04 16:32:16'),
(713, 36, 214, 251, 3, 2, 28, 56, '9', 20, 'true', '5 Balls', '5 Balls', 10, '2018-12-04 16:32:22'),
(714, 36, 215, 251, 3, 2, 28, 56, '11', 10, 'true', '2', '2', 12, '2018-12-04 16:32:26'),
(715, 36, 216, 251, 3, 2, 34, 60, '26', 10, 'true', '3', '3', 20, '2018-12-04 16:56:17'),
(716, 14, 233, 251, 3, 1, 41, 64, '26', 20, 'true', '1', '1', 2, '2018-12-11 08:04:52'),
(717, 14, 231, 251, 3, 1, 41, 64, '1', 20, 'true', '1', '1', 9, '2018-12-11 08:05:02'),
(718, 14, 234, 251, 3, 1, 41, 64, '1', 10, 'true', '2', '2', 11, '2018-12-11 08:05:07'),
(719, 14, 231, 251, 3, 1, 41, 64, '1', 20, 'true', '1', '1', 20, '2018-12-11 08:08:43'),
(720, 14, 232, 251, 3, 1, 41, 64, '1', 20, 'true', '2', '2', 27, '2018-12-11 08:08:53'),
(721, 14, 234, 251, 3, 1, 41, 64, '1', 10, 'true', '2', '2', 30, '2018-12-11 08:09:00'),
(722, 14, 235, 251, 3, 1, 41, 64, '26', 10, 'true', '1', '1', 5, '2018-12-11 08:10:13'),
(723, 14, 231, 251, 3, 1, 41, 64, '1', 20, 'true', '1', '1', 9, '2018-12-11 08:10:20'),
(724, 14, 232, 251, 3, 1, 41, 64, '1', 20, 'true', '2', '2', 11, '2018-12-11 08:10:25'),
(725, 14, 233, 251, 3, 1, 41, 64, '26', 20, 'true', '1', '1', 12, '2018-12-11 08:10:29'),
(726, 14, 234, 251, 3, 1, 41, 64, '1', 10, 'true', '2', '2', 15, '2018-12-11 08:10:35'),
(727, 14, 233, 251, 3, 1, 41, 64, '26', 20, 'true', '1', '1', 9, '2018-12-11 08:19:19'),
(728, 14, 231, 251, 3, 1, 41, 64, '1', 20, 'true', '1', '1', 12, '2018-12-11 08:19:25'),
(729, 14, 234, 251, 3, 1, 41, 64, '1', 10, 'true', '2', '2', 14, '2018-12-11 08:19:30'),
(730, 14, 232, 251, 3, 1, 41, 64, '1', 20, 'true', '2', '2', 5, '2018-12-11 08:20:16'),
(731, 14, 231, 251, 3, 1, 41, 64, '1', 20, 'true', '1', '1', 7, '2018-12-11 08:20:21'),
(732, 14, 231, 251, 3, 1, 41, 64, '1', 20, 'true', '1', '1', 4, '2018-12-11 08:50:37'),
(733, 14, 230, 251, 3, 1, 41, 64, '1', 3, 'true', '3', '3', 6, '2018-12-11 08:50:42'),
(734, 14, 232, 251, 3, 1, 41, 64, '1', 20, 'true', '2', '2', 8, '2018-12-11 08:50:47'),
(735, 14, 233, 251, 3, 1, 41, 64, '26', 20, 'true', '1', '1', 12, '2018-12-11 08:50:54'),
(736, 14, 234, 251, 3, 1, 41, 64, '1', 10, 'true', '2', '2', 14, '2018-12-11 08:50:59'),
(737, 14, 235, 251, 3, 1, 41, 64, '26', 10, 'true', '1', '1', 31, '2018-12-11 08:51:18'),
(738, 14, 233, 251, 3, 1, 41, 64, '26', 20, 'true', '1', '1', 3, '2018-12-11 08:52:13'),
(739, 14, 230, 251, 3, 1, 41, 64, '1', 3, 'true', '3', '3', 6, '2018-12-11 08:52:19'),
(740, 14, 231, 251, 3, 1, 41, 64, '1', 20, 'true', '1', '1', 9, '2018-12-11 08:52:25'),
(741, 14, 232, 251, 3, 1, 41, 64, '1', 20, 'false', '3', '2', 12, '2018-12-11 08:52:31'),
(742, 14, 234, 251, 3, 1, 41, 64, '1', 10, 'true', '2', '2', 18, '2018-12-11 08:52:39'),
(743, 14, 235, 251, 3, 1, 41, 64, '26', 10, 'true', '1', '1', 20, '2018-12-11 08:52:44'),
(744, 13, 247, 251, 3, 1, 44, 71, '26', 10, 'true', '1', '1', 2, '2018-12-14 17:29:25'),
(745, 14, 240, 251, 3, 1, 44, 71, '26', 10, 'false', '2', '3', 7, '2018-12-17 07:09:50'),
(746, 14, 238, 251, 3, 1, 44, 71, '26', 10, 'false', '2', '1', 11, '2018-12-17 07:12:15'),
(747, 14, 239, 251, 3, 1, 44, 71, '26', 10, 'false', '1', '2', 6017, '2018-12-17 07:12:53'),
(748, 14, 241, 251, 3, 1, 44, 71, '26', 10, 'true', '3', '3', 6027, '2018-12-17 07:12:58'),
(749, 14, 242, 251, 3, 1, 44, 71, '26', 10, 'true', '2', '2', 6044, '2018-12-17 07:13:03'),
(750, 14, 243, 251, 3, 1, 44, 71, '26', 10, 'true', '1', '1', 6058, '2018-12-17 07:13:07'),
(751, 14, 244, 251, 3, 1, 44, 71, '26', 10, 'true', '3', '3', 12015, '2018-12-17 07:13:12'),
(752, 14, 245, 251, 3, 1, 44, 71, '26', 10, 'true', '2', '2', 12032, '2018-12-17 07:13:17'),
(753, 14, 246, 251, 3, 1, 44, 71, '26', 10, 'true', '3', '3', 12052, '2018-12-17 07:13:22'),
(754, 14, 247, 251, 3, 1, 44, 71, '26', 10, 'true', '1', '1', 18007, '2018-12-17 07:13:27'),
(755, 14, 328, 251, 3, 1, 58, 97, '33', 10, 'true', '1', '1', 18, '2018-12-17 07:14:09'),
(756, 14, 327, 251, 3, 1, 58, 97, '32', 10, 'true', 'a:2:{i:0;s:4:\"jill\";i:1;s:4:\"hill\";}', 'a:2:{i:0;s:4:\"jill\";i:1;s:4:\"hill\";}', 27, '2018-12-17 07:14:21'),
(757, 14, 329, 251, 3, 1, 58, 97, '33', 10, 'false', '2', '1', 34, '2018-12-17 07:14:32'),
(758, 14, 330, 251, 3, 1, 58, 97, '34', 10, 'true', '4_Circles1.PNG', '4_Circles1.PNG', 39, '2018-12-17 07:14:39'),
(759, 20, 245, 251, 3, 1, 44, 71, '26', 10, 'true', '2', '2', 3, '2018-12-19 21:52:41'),
(760, 13, 242, 251, 3, 1, 44, 71, '26', 10, 'true', '2', '2', 3, '2019-01-02 21:25:23');

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
(2, 'English', 'english', 5, 105);

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
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` text,
  `testimonial_img` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `content`, `testimonial_img`) VALUES
(2, 'Child Name', 'We enjoy using Apple Kitch and find it really fun.', 'http://www.applekitch.com/uploads/bean.jpg'),
(3, 'Parent', 'We really enjoy using Apple Kitch and found it greatly fun. ', 'http://www.applekitch.com/uploads/profile-pic-glasses.png'),
(4, 'Carer Name', 'We super enjoy using Apple Kitch and find it very interesting.', 'http://www.applekitch.com/uploads/1462123300-54166-2-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci,
  `status` enum('active','deactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_name`, `slug`, `status`) VALUES
(71, 'Counting Farm Animals to 3', 'counting-farm-animals-to-3', 'active'),
(72, 'Counting Fruits & Veg to 3', 'counting-fruits-veg-to-3', 'active'),
(73, 'Counting Dice to 5', 'counting-dice-to-5', 'active'),
(74, 'Counting Objects to 10', 'counting-objects-to-10', 'active'),
(75, 'Counting Shapes to 15', 'counting-shapes-to-15', 'active'),
(76, 'Counting frames to 20', 'counting-frames-to-20', 'active'),
(77, 'Match words to numbers 1-5', 'match-words-to-numbers-15', 'active'),
(78, 'More Than', 'more-than', 'active'),
(79, 'Which Number is smallest 1-5', 'which-number-is-smallest-15', 'active'),
(80, 'Counting Coins', '', 'active'),
(81, 'Basic Shapes', 'basic-shapes', 'active'),
(82, 'Biggest Objects', 'biggest-objects', 'active'),
(83, 'Smallest Objects', 'smallest-objects', 'active'),
(84, 'Basic Patterns', 'basic-patterns', 'active'),
(85, 'Same', '', 'active'),
(86, 'Size patterns', 'size-patterns', 'active'),
(87, 'Inside and outside', 'inside-and-outside', 'active'),
(88, 'Counting Fruits & Veg to 5', 'counting-fruits-veg-to-5', 'active'),
(89, 'Counting Fingers to 10', 'counting-fingers-to-10', 'active'),
(90, 'Counting Shapes to 10', 'counting-shapes-to-10', 'active'),
(91, 'Counting on frames to 15', 'counting-on-frames-to-15', 'active'),
(92, 'Question Types', 'image-and-text-box', 'active'),
(93, 'Question Types Part 2', 'question-types-part-2', 'active'),
(94, 'Question Types Part 3', 'question-types-part-3', 'active'),
(97, 'Question Types Part 4', 'question-types-part-4', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(255) NOT NULL,
  `role` int(11) NOT NULL,
  `membership_plan` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `profile_img` text COLLATE utf8_unicode_ci,
  `ym` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `stripe_cust_json` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activation` tinyint(1) NOT NULL DEFAULT '0',
  `social_action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `award_click` varchar(1200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `phone`, `email_address`, `password`, `parent`, `role`, `membership_plan`, `price`, `profile_img`, `ym`, `start_date`, `stripe_cust_json`, `activation`, `social_action`, `award_click`) VALUES
(2, 'Test', 'User', '', 'testuser@mailinator.com', 'b1b91a79faefd7ef31005218eb23bb04', 0, 1, 1, 100, 'http://applekitch.coregensolution.com/uploads/34.jpg', 'yearly', '2018-08-14', '{\"id\":\"cus_DPrm8YnwUMU0Cd\",\"object\":\"customer\",\"account_balance\":0,\"created\":1534251264,\"currency\":null,\"default_source\":\"card_DPrlobDo5taezn\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"testuser@mailinator.com\",\"invoice_prefix\":\"0EA1E4', 1, '', ''),
(7, 'Rana', 'Ghosh', NULL, 'ranacoregen@gmail.com', 'b1b91a79faefd7ef31005218eb23bb04', 0, 4, 1, 100, 'http://www.applekitch.com/uploads/fruit-2200001_19201.jpg', 'monthly', '2018-07-03', '[]', 1, '', ''),
(4, 'Bhul', 'Bhal', '1234567890', 'bhulbhal1981@gmail.com', 'b1b91a79faefd7ef31005218eb23bb04', 0, 2, 1, 100, NULL, 'monthly', '2018-07-03', '[]', 1, '', ''),
(5, 'Rana', 'Ghosh', '7890023550', 'ranacoregen@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 0, 3, 0, 0, NULL, '', '0000-00-00', '', 1, '', ''),
(10, 'Test', 'User', '', 'testchild@mailinator.com', 'b1b91a79faefd7ef31005218eb23bb04', 2, 3, 0, 0, NULL, '', '0000-00-00', '', 1, '', ''),
(11, 'Test3', 'User3', '', 'testchild3@mailinator.com', 'b1b91a79faefd7ef31005218eb23bb04', 2, 3, 0, 0, NULL, '', '0000-00-00', '', 1, '', ''),
(12, 'Test2', 'User2', '', 'testchild22@mailinator.com', 'b1b91a79faefd7ef31005218eb23bb04', 2, 3, 0, 0, NULL, '', '0000-00-00', '', 1, '', ''),
(13, 'George', 'Bob', NULL, 'gbob313@gmail.com', '03a1bad58d308803c5b77ece928cfa51', 0, 1, 1, 1000, 'http://applekitch.coregensolution.com/uploads/avatar-raz.png', 'yearly', '2018-07-06', '{\"id\":\"cus_DBG5hZObUOVPtT\",\"object\":\"customer\",\"account_balance\":0,\"created\":1530882088,\"currency\":null,\"default_source\":\"card_DBG5P5TO8jCujP\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"gbob313@gmail.com\",\"invoice_prefix\":\"1F8120F\",\"li', 1, '', ''),
(14, 'Rana', 'Ghosh', NULL, 'rana.ghosh939@gmail.com', 'b1b91a79faefd7ef31005218eb23bb04', 7, 3, 1, 100, 'http://applekitch.coregensolution.com/uploads/4088819-nature-images1.jpg', 'yearly', '2018-08-24', '{\"id\":\"cus_DTbqgiZCq1ROSL\",\"object\":\"customer\",\"account_balance\":0,\"created\":1535114555,\"currency\":null,\"default_source\":\"card_DTbqDr2Fx9WUbK\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"rana.ghosh939@gmail.com\",\"invoice_prefix\":\"9F6B43', 1, '', 'a:7:{i:0;s:89:\"a:4:{s:2:\"id\";s:2:\"10\";s:7:\"subject\";s:1:\"2\";s:5:\"grade\";s:1:\"1\";s:7:\"user_id\";s:2:\"14\";}\";i:1;s:89:\"a:4:{s:2:\"id\";s:2:\"11\";s:7:\"subject\";s:1:\"2\";s:5:\"grade\";s:1:\"1\";s:7:\"user_id\";s:2:\"14\";}\";i:2;s:89:\"a:4:{s:2:\"id\";s:2:\"12\";s:7:\"subject\";s:1:\"2\";s:5:\"grade\";s:1:\"1\";s:7:\"user_id\";s:2:\"14\";}\";i:3;s:89:\"a:4:{s:2:\"id\";s:2:\"13\";s:7:\"subject\";s:1:\"2\";s:5:\"grade\";s:1:\"1\";s:7:\"user_id\";s:2:\"14\";}\";i:4;s:88:\"a:4:{s:2:\"id\";s:1:\"1\";s:7:\"subject\";s:1:\"2\";s:5:\"grade\";s:1:\"2\";s:7:\"user_id\";s:2:\"14\";}\";i:5;s:89:\"a:4:{s:2:\"id\";s:2:\"17\";s:7:\"subject\";s:1:\"2\";s:5:\"grade\";s:1:\"2\";s:7:\"user_id\";s:2:\"14\";}\";i:6;s:89:\"a:4:{s:2:\"id\";s:2:\"28\";s:7:\"subject\";s:1:\"2\";s:5:\"grade\";s:1:\"1\";s:7:\"user_id\";s:2:\"14\";}\";}'),
(15, 'Test', 'Parent', '', 'testparent@mailinator.com', 'b1b91a79faefd7ef31005218eb23bb04', 0, 1, 0, 0, NULL, '', '0000-00-00', '', 1, '', ''),
(16, 'Test', 'Children', '', 'testchildren@mailinator.com', 'b1b91a79faefd7ef31005218eb23bb04', 15, 3, 0, 0, NULL, '', '0000-00-00', '', 1, '', ''),
(17, '', '', NULL, '', 'd41d8cd98f00b204e9800998ecf8427e', 0, 1, 0, 0, NULL, '', '0000-00-00', '', 0, '', ''),
(18, 'Josh', 'Stone', NULL, 'justletmein@maildrop.cc', '03a1bad58d308803c5b77ece928cfa51', 0, 1, 0, 0, NULL, '', NULL, '', 0, '', ''),
(19, 'Geroge', 'Bob', NULL, 'D-1akgwq7xmixj@maildrop.cc', '03a1bad58d308803c5b77ece928cfa51', 0, 1, 0, 0, NULL, '', NULL, '', 0, '', ''),
(20, 'Kid', '1', NULL, 'kid1', '03a1bad58d308803c5b77ece928cfa51', 13, 3, 0, 0, NULL, '', NULL, '', 1, '', ''),
(21, 'Michaela', 'Wynter-Grant', NULL, 'mdwynter@hotmail.co.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 1, 0, 0, NULL, '', NULL, '', 1, '', ''),
(22, 'Tijen', 'Grant', NULL, 'Tt', '5f4dcc3b5aa765d61d8327deb882cf99', 21, 3, 0, 0, NULL, '', NULL, '', 1, '', ''),
(23, 'Sonny', 'Grant', NULL, 'Sonny', '5f4dcc3b5aa765d61d8327deb882cf99', 21, 3, 0, 0, NULL, '', NULL, '', 1, '', ''),
(24, 'Test456', 'User456', NULL, 'test456', '', 7, 3, 0, 0, NULL, '', NULL, '', 1, '', NULL),
(25, 'apple', 'kitch', NULL, 'applekitchltd@gmail.com', 'db6ae64dfa9e78039db6df5b8edbc38c', 0, 1, 0, 0, NULL, '', NULL, '', 1, '', NULL),
(26, 'Tanuj', 'Coregen', NULL, 'tanujcoregen@mailinator.com', 'b1b91a79faefd7ef31005218eb23bb04', 0, 4, 1, 10, NULL, 'monthly', '2018-11-15', '{\"id\":\"cus_DyhRH5G3lqb5IS\",\"object\":\"customer\",\"account_balance\":0,\"created\":1542285241,\"currency\":null,\"default_source\":\"card_DyhR2rSJ4cHNkM\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"tanujcoregen@mailinator.com\",\"invoice_prefix\":\"04', 1, '', NULL),
(27, 'test', 'mailinator', NULL, 'testmailinator', '', 26, 3, 0, 0, NULL, '', NULL, '', 1, '', NULL),
(28, 'Jack', 'Jones', NULL, 'benton18@density2v.com', 'e16f9f2eeec2de8ac38154640e869d54', 0, 1, 0, 0, NULL, '', NULL, '', 1, '', NULL),
(29, 'Contact', 'grant', NULL, 'evelise6@density2v.com', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 1, 0, 0, NULL, '', NULL, '', 1, '', NULL),
(30, 'bryce', '28', NULL, 'bryce28@density2v.com', 'db6ae64dfa9e78039db6df5b8edbc38c', 0, 1, 1, 10, NULL, 'monthly', '2018-11-15', '{\"id\":\"cus_DyrBF6zF27K3vq\",\"object\":\"customer\",\"account_balance\":0,\"created\":1542321472,\"currency\":null,\"default_source\":\"card_DyrBlmB0Spe0R3\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"bryce28@density2v.com\",\"invoice_prefix\":\"BFCDDBA\"', 1, '', NULL),
(31, 'little', 'kid', NULL, 'littlekid123', '', 30, 3, 0, 0, NULL, '', NULL, '', 1, '', NULL),
(32, 'liveparent', 'test', NULL, 'liveparenttest@mailinator.com', 'b1b91a79faefd7ef31005218eb23bb04', 0, 1, 1, 100, NULL, 'yearly', '2018-11-20', '[]', 1, '', NULL),
(33, 'livechild', 'test1', NULL, 'livechildtest1', '', 32, 3, 0, 0, 'http://www.applekitch.com/uploads/sumatran-tiger7.jpg', '', NULL, '', 1, '', NULL),
(34, 'Test', 'User', NULL, 'testuserm@mailinator.com', 'b1b91a79faefd7ef31005218eb23bb04', 0, 1, 1, 100, NULL, 'yearly', '2018-11-20', '{\"id\":\"cus_E0bNajw61sYjvE\",\"object\":\"customer\",\"account_balance\":0,\"created\":1542723922,\"currency\":null,\"default_source\":\"card_E0bMOekx7uE6yS\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"testuserm@mailinator.com\",\"invoice_prefix\":\"D8EF1', 1, '', NULL),
(35, 'Test17', 'User17', NULL, 'testuser17', '', 34, 3, 0, 0, NULL, '', NULL, '', 1, '', NULL),
(36, 'just', 'tester', NULL, 'dcddccddcdcdcdcdc@sharklasers.com', 'e19d5cd5af0378da05f63f891c7467af', 0, 4, 1, 10, NULL, 'monthly', '2018-12-04', '{\"id\":\"cus_E5rI9KQd4QP6Dm\",\"object\":\"customer\",\"account_balance\":0,\"created\":1543936394,\"currency\":null,\"default_source\":\"card_E5rIlejTZytABG\",\"delinquent\":false,\"description\":null,\"discount\":null,\"email\":\"dcddccddcdcdcdcdc@sharklasers.com\",\"invoice_prefi', 1, '', NULL),
(37, 'Little', 'kids', NULL, 'littlekids', '', 36, 3, 0, 0, 'http://www.applekitch.com/uploads/logo.PNG', '', NULL, '', 1, '', NULL),
(38, 'Dejon', 'Yost', NULL, 'Ashley_Zulauf14@yahoo.com', 'a98fbdc49b36a6cac8ee2796f5c29e61', 0, 1, 0, 0, NULL, '', NULL, '', 0, '', NULL),
(39, 'Odell', 'Green', NULL, 'Patricia_Haag61@gmail.com', 'ccfbd45f01c4c02750960168335c0db1', 0, 1, 0, 0, NULL, '', NULL, '', 0, '', NULL),
(40, 'Verdie', 'Carroll', NULL, 'Werner.Ullrich80@hotmail.com', 'a736de3e27fe981831d82a616dfbb77e', 0, 1, 0, 0, NULL, '', NULL, '', 0, '', NULL),
(41, 'testwork', 'mailinator', NULL, 'testwork@mailinator.com', 'b1b91a79faefd7ef31005218eb23bb04', 0, 1, 0, 0, NULL, '', NULL, '', 1, '', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `worksheets`
--

CREATE TABLE `worksheets` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `worksheet_img` text COLLATE utf8_unicode_ci NOT NULL,
  `pdf_path` text COLLATE utf8_unicode_ci NOT NULL,
  `pdf_page_count` int(11) DEFAULT NULL,
  `work_subject_id` int(11) NOT NULL,
  `work_grade_id` int(11) NOT NULL,
  `work_cat_id` int(11) NOT NULL,
  `work_topic_id` int(11) NOT NULL,
  `label` enum('Free','New','Premium','No Label') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No Label',
  `new_days_limit` int(11) DEFAULT NULL,
  `work_uni_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_dt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `worksheets`
--

INSERT INTO `worksheets` (`id`, `name`, `slug`, `content`, `worksheet_img`, `pdf_path`, `pdf_page_count`, `work_subject_id`, `work_grade_id`, `work_cat_id`, `work_topic_id`, `label`, `new_days_limit`, `work_uni_id`, `create_dt`) VALUES
(1, 'worksheet 1', 'worksheet-1', 'test new label', 'http://applekitch.coregensolution.com/uploads/worksheets/Sample_Worksheet4_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/Sample_Worksheet4.pdf', 5, 1, 1, 1, 1, '', 5, 'app-5c52d0f13c547', '2019-01-31 04:41:53'),
(2, 'worksheet 2', 'worksheet-2', '', 'http://applekitch.coregensolution.com/uploads/worksheets/Sample_Worksheet5_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/Sample_Worksheet5.pdf', 5, 1, 1, 1, 1, 'Premium', 0, 'app-5c52d16540e4d', '2019-01-31 04:43:49'),
(3, 'worksheet 3', 'worksheet-3', '', 'http://applekitch.coregensolution.com/uploads/worksheets/Sample_Worksheet6_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/Sample_Worksheet6.pdf', 5, 1, 1, 1, 1, 'Free', 0, 'app-5c52d19b61677', '2019-01-31 04:44:43'),
(4, 'worksheet 4', 'worksheet-4', '', 'http://applekitch.coregensolution.com/uploads/worksheets/Sample_Worksheet7_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/Sample_Worksheet7.pdf', 5, 1, 1, 1, 1, 'New', 6, 'app-5c52d1cf70b54', '2019-01-31 04:45:35'),
(5, 'Adding 1 to other numbers illustrated', 'adding-1-to-other-numbers-illustrated', 'This is example content', 'http://applekitch.coregensolution.com/uploads/worksheets/adding_1_0ther_numbers1_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/adding_1_0ther_numbers1.pdf', 1, 1, 1, 1, 1, 'New', 0, 'app-5c533df29932e', '2019-01-31 12:26:58'),
(6, 'Adding 4 Numbers', 'adding-4-numbers', 'this is the worksheets to learn xyb', 'http://applekitch.coregensolution.com/uploads/worksheets/adding_1_0ther_numbers2_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/adding_1_0ther_numbers2.pdf', 1, 1, 1, 2, 2, 'New', 0, 'app-5c533fad1a54e', '2019-01-31 12:34:21'),
(7, 'Writing numbers', 'writing-numbers', 'tgtgtgtgtg', 'http://applekitch.coregensolution.com/uploads/worksheets/fruit_smoothies2_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/fruit_smoothies2.pdf', 1, 1, 1, 1, 1, 'Free', 0, 'app-5c535cd93de5b', '2019-01-31 14:38:49'),
(8, 'Banana bread recipe', 'banana-bread-recipe', 'There are lots of ways to boost your child\'s confidence in maths. The free activities below are a great start (including some rather yummy recipes), and we\'ve some fun interactive maths games too.\r\n\r\n', 'http://applekitch.coregensolution.com/uploads/worksheets/banana_bread1_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/banana_bread1.pdf', 1, 1, 1, 2, 2, 'New', 0, 'app-5c535d08bbb94', '2019-01-31 14:39:36'),
(9, 'd with dice', 'd-with-dice', 'A simple year one worksheet on adding up two amounts of money. Using money is an important life skill.\r\n\r\n', 'http://applekitch.coregensolution.com/uploads/worksheets/OxOwl_AddWithDice_01_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/OxOwl_AddWithDice_01.pdf', 1, 1, 1, 1, 1, 'New', 0, 'app-5c535ddc31598', '2019-01-31 14:43:08'),
(10, 'Recognising equal groups (3)', 'recognising-equal-groups-3', 'More on recognising equal groups.\r\n\r\n', 'http://applekitch.coregensolution.com/uploads/worksheets/OxOwl_AddWithDice_011_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/OxOwl_AddWithDice_011.pdf', 1, 1, 1, 1, 1, 'New', 0, 'app-5c536365611c8', '2019-01-31 15:06:45'),
(11, 'Subtraction with a number line - monkeys', 'subtraction-with-a-number-line-monkeys', 'Using a number line to help with subtracting small numbers.\r\n\r\n', 'http://applekitch.coregensolution.com/uploads/worksheets/subtraction-with-a-number-line-monkeys_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/subtraction-with-a-number-line-monkeys.pdf', 5, 1, 1, 2, 2, 'Premium', 0, 'app-5c5364914c08d', '2019-01-31 15:11:45'),
(12, 'Counting up to 10 - fish', 'counting-up-to-10-fish', 'Many children quickly learn how to say the numbers from 0 to 10, but this is not quite the same as being able to count a number of objects. Whether it\'s counting fish, footballs or planes, we have a great set of counting pages which are perfect to supplement all those opportunities there are in the home for counting sets of objects.\r\n\r\n', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-up-to-10-fish_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-up-to-10-fish.pdf', 4, 1, 1, 2, 2, 'New', 0, 'app-5c53654a92354', '2019-01-31 15:14:50'),
(13, 'Counting up to 10 - planes', 'counting-up-to-10-planes', 'Many children quickly learn how to say the numbers from 0 to 10, but this is not quite the same as being able to count a number of objects. Whether it\'s counting fish, footballs or planes, we have a great set of counting pages which are perfect to supplement all those opportunities there are in the home for counting sets of objects.\r\n\r\n', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-up-to-10-planes_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-up-to-10-planes.pdf', 4, 1, 1, 2, 2, 'New', 0, 'app-5c53656d32d70', '2019-01-31 15:15:25'),
(14, 'Counting up to 10 - balls', 'counting-up-to-10-balls', '', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-up-to-10-balls_(1)_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-up-to-10-balls_(1).pdf', 4, 1, 1, 2, 2, 'New', 0, 'app-5c53658293ac9', '2019-01-31 15:15:46'),
(15, 'Counting up to 10 - tomatoes', 'counting-up-to-10-tomatoes', 'Another opportunity to consolidate those counting skills with numbers up to 10.\r\n\r\n', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-up-to-10-tomatoes_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-up-to-10-tomatoes.pdf', 4, 1, 1, 1, 1, 'New', 0, 'app-5c53659b87a3d', '2019-01-31 15:16:11'),
(16, 'Counting up to 10 - flowers', 'counting-up-to-10-flowers', '', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-up-to-10-flowers_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-up-to-10-flowers.pdf', 5, 1, 1, 2, 2, 'New', 0, 'app-5c5365bb0d6e9', '2019-01-31 15:16:43'),
(17, 'Counting up to 10 - gingerbread people', 'counting-up-to-10-gingerbread-people', 'Counting up to 10 - gingerbread people\r\n', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-up-to-10-gingerbread-people_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-up-to-10-gingerbread-people.pdf', 5, 1, 1, 2, 2, 'New', 0, 'app-5c5365de74da8', '2019-01-31 15:17:18'),
(18, 'Counting up to 10 - rats', 'counting-up-to-10-rats', '', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-up-to-10-rats_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-up-to-10-rats.pdf', 5, 1, 1, 2, 2, 'New', 0, 'app-5c5365fa0c324', '2019-01-31 15:17:46'),
(19, 'Counting up to 10 - fruit', 'counting-up-to-10-fruit', 'Counting fruit with totals up to 10.\r\n\r\n', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-up-to-10-fruit_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-up-to-10-fruit.pdf', 5, 1, 1, 2, 2, 'New', 0, 'app-5c5366239976a', '2019-01-31 15:18:27'),
(20, 'Counting up to 10 - colouring rats', 'counting-up-to-10-colouring-rats', '', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-up-to-10-colouring-rats_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-up-to-10-colouring-rats.pdf', 4, 1, 1, 2, 2, 'New', 0, 'app-5c53663761481', '2019-01-31 15:18:47'),
(21, 'Counting two sets - cows and goats', 'counting-two-sets-cows-and-goats', 'Perhaps the earliest practice of addition is when children count two sets of objects to make one total. We have a fantastic farmyard set of counting worksheets, counting cows and goats. Use these in conjunction with objects at home, eg counting red and blue counters, or the numbers on two dice, to make sure your child becomes really sharp with counting and understanding the term, \'How many altogether?\'\r\n\r\n', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-two-sets-cows-and-goats_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-two-sets-cows-and-goats.pdf', 4, 1, 1, 2, 2, 'New', 0, 'app-5c53664fb565d', '2019-01-31 15:19:11'),
(22, 'Counting two sets - cats and dogs', 'counting-two-sets-cats-and-dogs', 'It\'s not raining cats and dogs but there are plenty to count here as children begin to understand the term, \'How many altogether?\' Still keeping to small numbers up to 5.\r\n\r\n', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-two-sets-cats-and-dogs_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-two-sets-cats-and-dogs.pdf', 4, 1, 1, 2, 2, 'New', 0, 'app-5c5366792fb13', '2019-01-31 15:19:53'),
(23, 'Extension: counting footsteps', 'extension-counting-footsteps', '', 'http://applekitch.coregensolution.com/uploads/worksheets/extension-counting-footsteps_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/extension-counting-footsteps.pdf', 3, 1, 1, 1, 1, 'New', 0, 'app-5c536697a5543', '2019-01-31 15:20:23'),
(24, 'Counting two sets - sea creatures', 'counting-two-sets-sea-creatures', '', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-two-sets-sea-creatures_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-two-sets-sea-creatures.pdf', 5, 1, 1, 2, 2, 'New', 0, 'app-5c5366ac4d552', '2019-01-31 15:20:44'),
(25, 'Counting two sets - oranges and lemons', 'counting-two-sets-oranges-and-lemons', '', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-two-sets-oranges-and-lemons_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-two-sets-oranges-and-lemons.pdf', 5, 1, 1, 1, 1, 'New', 0, 'app-5c5367000decd', '2019-01-31 15:22:08'),
(26, 'Extension: count on in ones beyond 10', 'extension-count-on-in-ones-beyond-10', '', 'http://applekitch.coregensolution.com/uploads/worksheets/extension-count-on-in-ones-beyond-10_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/extension-count-on-in-ones-beyond-10.pdf', 5, 1, 1, 1, 1, 'New', 0, 'app-5c53674080327', '2019-01-31 15:23:12'),
(27, 'Counting two sets - frogs', 'counting-two-sets-frogs', '', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-two-sets-frogs_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/counting-two-sets-frogs.pdf', 4, 1, 1, 2, 2, 'New', 0, 'app-5c5367534fd2f', '2019-01-31 15:23:31'),
(30, 'English2', 'english2', '', 'http://applekitch.coregensolution.com/uploads/worksheets/SAMPLE_PDF8_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/SAMPLE_PDF8.pdf', 1, 1, 1, 1, 1, 'No Label', 0, 'app-5c5438fd97084', '2019-02-01 06:18:05'),
(31, 'worksheet 4', 'worksheet-4-1', '', 'http://applekitch.coregensolution.com/uploads/worksheets/Sample_Worksheet9_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/Sample_Worksheet9.pdf', 5, 1, 1, 1, 1, 'No Label', 0, 'app-5c54397bbffa8', '2019-02-01 06:20:11'),
(32, 'Testing 432`', 'testing-432', 'dddddddddddddddddddddd', 'http://applekitch.coregensolution.com/uploads/worksheets/OxOwl_AddWithDice_012_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/OxOwl_AddWithDice_012.pdf', 1, 1, 1, 1, 1, 'No Label', 0, 'app-5c5812e6296f3', '2019-02-04 04:24:38'),
(33, 'test worksheet 1', 'test-worksheet-1', 'test', 'http://applekitch.coregensolution.com/uploads/worksheets/Sample_Worksheet10_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/Sample_Worksheet10.pdf', 5, 1, 1, 1, 0, 'Free', 0, 'app-5c5ad184ed741', '2019-02-06 06:22:28'),
(34, 'test worksheet 2', 'test-worksheet-2', 'test', 'http://applekitch.coregensolution.com/uploads/worksheets/SAMPLE_PDF9_0.jpg', 'http://applekitch.coregensolution.com/uploads/worksheets/SAMPLE_PDF9.pdf', 1, 1, 1, 1, 0, 'Premium', 0, 'app-5c5ad248e2077', '2019-02-06 06:25:44');

-- --------------------------------------------------------

--
-- Table structure for table `worksheet_favorite`
--

CREATE TABLE `worksheet_favorite` (
  `fav_id` int(11) NOT NULL,
  `worksheet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_dt` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `worksheet_favorite`
--

INSERT INTO `worksheet_favorite` (`fav_id`, `worksheet_id`, `user_id`, `create_dt`) VALUES
(1, 4, 20, '2019-01-31 12:32:06'),
(2, 32, 13, '2019-02-06 04:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `worksheet_rating`
--

CREATE TABLE `worksheet_rating` (
  `rating_id` int(11) NOT NULL,
  `worksheet_id` int(11) NOT NULL,
  `rating_number` int(11) NOT NULL,
  `total_points` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Block, 0 = Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `worksheet_rating`
--

INSERT INTO `worksheet_rating` (`rating_id`, `worksheet_id`, `rating_number`, `total_points`, `user_id`, `created`, `modified`, `status`) VALUES
(1, 1, 1, 5, 0, '2019-01-31 04:41:53', '2019-01-31 04:41:53', 1),
(2, 2, 1, 4, 0, '2019-01-31 04:43:49', '2019-01-31 04:43:49', 1),
(3, 3, 1, 3, 0, '2019-01-31 04:44:43', '2019-01-31 04:44:43', 1),
(4, 4, 1, 4, 0, '2019-01-31 04:45:35', '2019-01-31 04:45:35', 1),
(5, 5, 1, 5, 0, '2019-01-31 12:26:58', '2019-01-31 12:26:58', 1),
(6, 6, 1, 5, 0, '2019-01-31 12:34:21', '2019-01-31 12:34:21', 1),
(7, 7, 1, 5, 0, '2019-01-31 14:38:49', '2019-01-31 14:38:49', 1),
(8, 8, 1, 5, 0, '2019-01-31 14:39:36', '2019-01-31 14:39:36', 1),
(9, 9, 1, 5, 0, '2019-01-31 14:52:45', '2019-01-31 14:52:45', 1),
(10, 10, 1, 5, 0, '2019-01-31 15:06:45', '2019-01-31 15:06:45', 1),
(11, 11, 1, 4, 0, '2019-01-31 15:11:45', '2019-01-31 15:11:45', 1),
(12, 12, 1, 4, 0, '2019-01-31 15:14:50', '2019-01-31 15:14:50', 1),
(13, 13, 1, 4, 0, '2019-01-31 15:15:25', '2019-01-31 15:15:25', 1),
(14, 14, 1, 5, 0, '2019-01-31 15:15:46', '2019-01-31 15:15:46', 1),
(15, 15, 1, 4, 0, '2019-01-31 15:16:11', '2019-01-31 15:16:11', 1),
(16, 16, 1, 4, 0, '2019-01-31 15:16:43', '2019-01-31 15:16:43', 1),
(17, 17, 1, 4, 0, '2019-01-31 15:17:18', '2019-01-31 15:17:18', 1),
(18, 18, 1, 4, 0, '2019-01-31 15:17:46', '2019-01-31 15:17:46', 1),
(19, 19, 1, 4, 0, '2019-01-31 15:18:27', '2019-01-31 15:18:27', 1),
(20, 20, 1, 4, 0, '2019-01-31 15:18:47', '2019-01-31 15:18:47', 1),
(21, 21, 1, 4, 0, '2019-01-31 15:19:11', '2019-01-31 15:19:11', 1),
(22, 22, 1, 4, 0, '2019-01-31 15:19:53', '2019-01-31 15:19:53', 1),
(23, 23, 1, 4, 0, '2019-01-31 15:20:23', '2019-01-31 15:20:23', 1),
(24, 24, 1, 5, 0, '2019-01-31 15:20:44', '2019-01-31 15:20:44', 1),
(25, 25, 1, 4, 0, '2019-01-31 15:22:08', '2019-01-31 15:22:08', 1),
(26, 26, 1, 4, 0, '2019-01-31 15:23:12', '2019-01-31 15:23:12', 1),
(27, 27, 1, 4, 0, '2019-01-31 15:23:31', '2019-01-31 15:23:31', 1),
(28, 28, 1, 4, 0, '2019-02-01 05:43:56', '2019-02-01 05:43:56', 1),
(29, 29, 1, 4, 0, '2019-02-01 05:57:59', '2019-02-01 05:57:59', 1),
(30, 30, 1, 3, 0, '2019-02-01 06:18:05', '2019-02-01 06:18:05', 1),
(31, 31, 1, 4, 0, '2019-02-01 06:20:11', '2019-02-01 06:20:11', 1),
(32, 32, 1, 4, 7, '2019-02-06 06:15:12', '2019-02-06 06:15:12', 1),
(33, 33, 1, 4, 0, '2019-02-06 06:22:28', '2019-02-06 06:22:28', 1),
(34, 34, 1, 3, 7, '2019-02-06 06:34:07', '2019-02-06 06:34:07', 1),
(36, 34, 1, 5, 0, '2019-02-06 06:46:59', '2019-02-06 06:46:59', 1),
(37, 26, 1, 4, 7, '2019-02-06 06:49:41', '2019-02-06 06:49:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `work_categories`
--

CREATE TABLE `work_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `work_grade_id` int(11) DEFAULT NULL,
  `work_subject_id` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `cat_img` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `work_categories`
--

INSERT INTO `work_categories` (`id`, `name`, `slug`, `parent`, `work_grade_id`, `work_subject_id`, `country`, `cat_img`) VALUES
(1, 'Category 1', 'category-1', NULL, 1, 1, NULL, NULL),
(2, 'Addition', 'addition', NULL, 1, 1, NULL, NULL),
(3, 'Subtraction', 'subtraction', NULL, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `work_grades`
--

CREATE TABLE `work_grades` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` int(11) NOT NULL,
  `work_subject_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `work_grades`
--

INSERT INTO `work_grades` (`id`, `name`, `slug`, `img`, `work_subject_id`) VALUES
(1, 'Year 1', 'year-1', 0, 1),
(3, 'Year 2', 'year-2', 0, 1),
(4, 'Year 3', 'year-3', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `work_subjects`
--

CREATE TABLE `work_subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grade` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `work_subjects`
--

INSERT INTO `work_subjects` (`id`, `name`, `slug`, `grade`, `country`) VALUES
(1, 'Math', 'math', NULL, NULL),
(2, 'English', 'english', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `work_topics`
--

CREATE TABLE `work_topics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci,
  `status` enum('active','deactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `work_subject_id` int(11) NOT NULL,
  `work_grade_id` int(11) NOT NULL,
  `work_cat_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `work_topics`
--

INSERT INTO `work_topics` (`id`, `name`, `slug`, `status`, `work_subject_id`, `work_grade_id`, `work_cat_id`) VALUES
(1, 'Topic 1', 'topic-1', 'active', 1, 1, 1),
(2, 'Adding', 'adding', 'active', 1, 1, 2);

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
-- Indexes for table `grade_settings`
--
ALTER TABLE `grade_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_settings`
--
ALTER TABLE `home_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

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
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `worksheets`
--
ALTER TABLE `worksheets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worksheet_favorite`
--
ALTER TABLE `worksheet_favorite`
  ADD PRIMARY KEY (`fav_id`);

--
-- Indexes for table `worksheet_rating`
--
ALTER TABLE `worksheet_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `work_categories`
--
ALTER TABLE `work_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_grades`
--
ALTER TABLE `work_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_subjects`
--
ALTER TABLE `work_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_topics`
--
ALTER TABLE `work_topics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `award_templates`
--
ALTER TABLE `award_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `grade_settings`
--
ALTER TABLE `grade_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `home_settings`
--
ALTER TABLE `home_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `question_option`
--
ALTER TABLE `question_option`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `question_type`
--
ALTER TABLE `question_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_ans_topic`
--
ALTER TABLE `student_ans_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `student_qns_ans`
--
ALTER TABLE `student_qns_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=761;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `switch_countries`
--
ALTER TABLE `switch_countries`
  MODIFY `idCountry` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `worksheets`
--
ALTER TABLE `worksheets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `worksheet_favorite`
--
ALTER TABLE `worksheet_favorite`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `worksheet_rating`
--
ALTER TABLE `worksheet_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `work_categories`
--
ALTER TABLE `work_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `work_grades`
--
ALTER TABLE `work_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `work_subjects`
--
ALTER TABLE `work_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `work_topics`
--
ALTER TABLE `work_topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
