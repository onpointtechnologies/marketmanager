-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 16, 2019 at 04:45 AM
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
-- Database: `corephpadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `checked_out_market`
--

CREATE TABLE `checked_out_market` (
  `id` int(10) NOT NULL,
  `checkout_date` varchar(100) DEFAULT NULL,
  `vendors_out` varchar(10) DEFAULT NULL,
  `gross` varchar(10) DEFAULT NULL,
  `market_fees` varchar(10) DEFAULT NULL,
  `cert_total` varchar(10) DEFAULT NULL,
  `total_ag` varchar(10) DEFAULT NULL,
  `total_ag_fee` varchar(10) DEFAULT NULL,
  `total_non_ag` varchar(10) DEFAULT NULL,
  `total_non_ag_fee` varchar(10) DEFAULT NULL,
  `ebt_tokens_in` varchar(30) DEFAULT '',
  `ebt_match_in` varchar(15) DEFAULT '',
  `atm_in` varchar(50) DEFAULT '',
  `ebt_total_in` varchar(25) DEFAULT NULL,
  `atm_out` varchar(25) DEFAULT NULL,
  `ebt_out` varchar(25) DEFAULT NULL,
  `ebt_match_out` varchar(750) DEFAULT NULL,
  `expenses` varchar(25) DEFAULT NULL,
  `open_door` varchar(25) DEFAULT NULL,
  `market_notes` varchar(600) DEFAULT NULL,
  `market_id` varchar(20) DEFAULT NULL,
  `authenticated_user` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checked_out_market`
--

INSERT INTO `checked_out_market` (`id`, `checkout_date`, `vendors_out`, `gross`, `market_fees`, `cert_total`, `total_ag`, `total_ag_fee`, `total_non_ag`, `total_non_ag_fee`, `ebt_tokens_in`, `ebt_match_in`, `atm_in`, `ebt_total_in`, `atm_out`, `ebt_out`, `ebt_match_out`, `expenses`, `open_door`, `market_notes`, `market_id`, `authenticated_user`) VALUES
(1, NULL, '4', '$78', NULL, NULL, NULL, NULL, NULL, NULL, '$4', '$5', '$6', '1', '2', '3', '4', '5', NULL, 'testing the market notes', NULL, NULL),
(2, NULL, '4', '$78', NULL, NULL, NULL, NULL, NULL, NULL, '$4', '$5', '$6', '', '', '', '', '', NULL, '', NULL, '26'),
(3, '2018-10-25', '4', '$78', NULL, NULL, NULL, NULL, NULL, NULL, '$4', '$5', '$6', '', '', '', '', '', NULL, '', '5b920b9041', '26'),
(4, '2018-10-25', '2', '$90', NULL, NULL, '1', '$20', '1', '$100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5ba92160e8', '29');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(10) NOT NULL,
  `business_name` varchar(25) DEFAULT '',
  `checkout_date` varchar(100) DEFAULT NULL,
  `sellers_fee` varchar(15) DEFAULT '',
  `ebt_tokens` varchar(30) DEFAULT '',
  `ebt_match` varchar(15) DEFAULT '',
  `atm_tokens` varchar(50) DEFAULT '',
  `mm_tokens` varchar(25) DEFAULT NULL,
  `mm_vouchers` varchar(25) DEFAULT NULL,
  `piersons_amount` varchar(25) DEFAULT NULL,
  `comment` varchar(750) DEFAULT NULL,
  `fmnp_fvc` varchar(25) DEFAULT NULL,
  `open_door` varchar(25) DEFAULT NULL,
  `vendor_type` varchar(25) DEFAULT NULL,
  `market_id` varchar(20) DEFAULT NULL,
  `flat_fee` varchar(25) DEFAULT NULL,
  `percentage_fee` varchar(11) DEFAULT NULL,
  `custom_fee` varchar(10) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `total_owed` varchar(11) DEFAULT NULL,
  `checkout_market_name` varchar(255) DEFAULT NULL,
  `total_sales` varchar(255) DEFAULT NULL,
  `week` varchar(255) DEFAULT NULL,
  `public_id` varchar(255) DEFAULT NULL,
  `authenticated_user` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `business_name`, `checkout_date`, `sellers_fee`, `ebt_tokens`, `ebt_match`, `atm_tokens`, `mm_tokens`, `mm_vouchers`, `piersons_amount`, `comment`, `fmnp_fvc`, `open_door`, `vendor_type`, `market_id`, `flat_fee`, `percentage_fee`, `custom_fee`, `created_at`, `total_owed`, `checkout_market_name`, `total_sales`, `week`, `public_id`, `authenticated_user`) VALUES
(1, 'cam', '2018-8-1', '$2', '$2', '$2', '$2', NULL, NULL, NULL, NULL, NULL, NULL, 'certified', '3', NULL, NULL, NULL, NULL, NULL, 'Madonna Saturday Market', NULL, '7', NULL, NULL),
(666, 'Annies Juices', '2018-10-25', NULL, '1', '1', '1', '1', NULL, NULL, NULL, NULL, NULL, 'non', '5b920b9041', NULL, NULL, NULL, NULL, '16', 'Cambria', '100', NULL, NULL, '26'),
(671, 'Amy Pollock', '2018-10-25', NULL, '1', NULL, NULL, '2', '3', '5', '  ', NULL, '4', 'NonAg ', '5ba92160e8', NULL, NULL, '100', NULL, '85', 'Arcata Plaza', NULL, NULL, NULL, '29'),
(672, 'Aurora Acres', '2018-10-25', NULL, '1', NULL, NULL, '2', '3', '5', '  ', NULL, '4', 'Ag ', '5ba92160e8', NULL, NULL, '20', NULL, '5', 'Arcata Plaza', NULL, NULL, NULL, '29'),
(673, 'Annies Juices', '2018-10-25', NULL, '1', '2', '3', '', NULL, NULL, NULL, NULL, NULL, 'non', '5b920b9041', NULL, NULL, NULL, NULL, '', 'Cambria', '400', NULL, NULL, '26'),
(674, '', '2018-10-25', NULL, '1', '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, '5b920b9041', NULL, NULL, NULL, NULL, '46', 'Cambria', '1000', NULL, NULL, '26'),
(675, '', '2018-10-25', NULL, '1', '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, '5b920b9041', NULL, NULL, NULL, NULL, '16', 'Cambria', '1', NULL, NULL, '26');

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

CREATE TABLE `markets` (
  `id` int(10) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `public_id` varchar(10) DEFAULT NULL,
  `market_name` varchar(50) DEFAULT '',
  `certified` varchar(6) DEFAULT '',
  `market_address` varchar(100) DEFAULT NULL,
  `market_city` varchar(30) DEFAULT '',
  `market_day` varchar(10) DEFAULT NULL,
  `state` varchar(30) DEFAULT '',
  `phone` varchar(15) DEFAULT '',
  `manager_name` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `flat_fee` varchar(10) DEFAULT NULL,
  `custom_fee` varchar(255) DEFAULT NULL,
  `percentage_fee` varchar(3) DEFAULT NULL,
  `notes` varchar(1000) DEFAULT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `certificate_number` varchar(255) DEFAULT NULL,
  `cdfa_app_id` varchar(255) DEFAULT NULL,
  `market_hours` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`id`, `user_id`, `public_id`, `market_name`, `certified`, `market_address`, `market_city`, `market_day`, `state`, `phone`, `manager_name`, `start_date`, `end_date`, `flat_fee`, `custom_fee`, `percentage_fee`, `notes`, `img_url`, `certificate_number`, `cdfa_app_id`, `market_hours`) VALUES
(3, 26, '5b920b9041', 'Cambria', 'yes', 'highway 1', 'Cambria, CA', 'Friday', '', '4154650298', 'Jeff Nielson', '2018-07-30', '2018-12-31', '2000', NULL, '5', 'Fees are $20 if sales are under $400, or 5% if over', 'cambria.png', NULL, NULL, NULL),
(138, 26, '5b9f075407', 'Morro Bay Saturday', 'no', NULL, 'Morro Bay, CA', 'Saturday', '', '4154650298', 'Jeff Nielson', '2018-01-01', '2018-12-31', NULL, NULL, '5', 'notes', 'morrobay.png', NULL, NULL, NULL),
(165, 25, '5b920c4195', 'Madonna Saturday Market', 'yes', NULL, 'San Luis Obispo, CA', 'Saturday', '', NULL, 'Peter Jankay', '2018-07-30', NULL, '500', NULL, NULL, 'this is note', 'slocounty.png', NULL, NULL, NULL),
(175, 29, '5ba92160e8', 'Arcata Plaza', 'yes', '8th an 9th St ', 'Arcata CA', 'Saturday', '', '(707) 441-9999', 'Diane', '2018-01-01', '2018-12-31', NULL, 'yes', NULL, '', 'northcoast.png', '', '', '9am - 2pm'),
(176, 30, '5ba92d4971', 'Cabrillo Farmers Market', 'yes', 'Cabrillo College, 6500 Soquel Drive', 'Aptos, CA', 'Saturday', '', '831.728.5060', 'Catherine', '2018-01-01', '2018-12-31', '40', NULL, NULL, NULL, 'mbcfm.png', NULL, NULL, '8am - 12pm'),
(177, 29, '5ba92e0381', 'Fortuna Farmers Market', 'yes', '10th Street ', 'Fortuna, CA', 'Tuesday', '', '(707) 441-9999', 'Diane', '2018-06-06', '2018-10-31', NULL, 'yes', NULL, 'Custom Fess are applied here', 'northcoast.png', NULL, NULL, NULL),
(178, 29, '5ba92f7051', 'Friday Night Market', 'yes', '240 E Street', 'Eureka, CA', 'Fridays', '', '(707) 441-9999', 'Diane', '2018-06-02', '2018-10-27', NULL, 'yes', NULL, 'Custom Fess are applied here', 'northcoast.png', NULL, NULL, '5 - 8pm'),
(179, 29, '5ba92d0391', 'Henderson Center Farmers Market', 'yes', 'F St and Henderson ', 'Eureka, CA', 'Thursday', '', '(707) 441-9999', 'Diane', '2018-06-01', '2018-10-26', NULL, 'yes', NULL, 'Custom Fess are applied here', 'northcoast.png', NULL, NULL, '10am-1pm'),
(180, 29, '5bb92d0489', 'McKinleyville Farmers Market', 'yes', '1450 Broadway St', 'Eureka, CA', 'Thursday', '', '(707) 441-9999', 'Diane', '2018-01-01', '2018-12-31', NULL, 'yes', NULL, 'Custom Fess are applied here', 'northcoast.png', NULL, NULL, '3:30 - 6:30 pm'),
(181, 29, '5b90da78s1', 'Old Town Farmers Market', 'yes', '2nd and F St ', 'Eureka, CA', 'Tuesday', '', '(707) 441-9999', 'Diane', '2018-06-06', '2018-10-31', NULL, 'yes', NULL, 'Custom Fess are applied here', 'northcoast.png', NULL, NULL, '10am-1pm'),
(182, 29, '5b70ad91l5', 'Willow Creek Farmers Market', 'yes', 'HWY 96 and HWY 299', 'Willow Creek, CA', 'Thursday', '', '(707) 441-9999', 'Diane', '2018-06-01', '2018-09-13', NULL, 'yes', NULL, 'Custom Fess are applied here', 'northcoast.png', NULL, NULL, '5 - 8pm');

-- --------------------------------------------------------

--
-- Table structure for table `markets_vendors`
--

CREATE TABLE `markets_vendors` (
  `markets_id` int(11) NOT NULL,
  `vendors_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `markets_vendors`
--

INSERT INTO `markets_vendors` (`markets_id`, `vendors_id`) VALUES
(3, 72),
(3, 84),
(3, 85),
(3, 86),
(3, 87),
(3, 88),
(3, 123),
(175, 84),
(175, 136),
(175, 137),
(175, 138),
(175, 139),
(175, 140),
(175, 141),
(175, 142),
(175, 143),
(175, 144),
(175, 145),
(175, 146),
(175, 147),
(175, 148),
(175, 149),
(175, 150),
(175, 151),
(175, 152),
(175, 153),
(175, 154),
(175, 155),
(175, 156),
(175, 157),
(175, 158),
(175, 159),
(175, 160),
(175, 161),
(175, 162),
(175, 163),
(175, 164),
(175, 165),
(175, 166),
(175, 167),
(175, 168),
(175, 169),
(175, 170),
(175, 171),
(175, 172),
(175, 173),
(175, 174),
(175, 175),
(175, 176),
(175, 177),
(175, 178),
(175, 179),
(175, 180),
(175, 181),
(175, 182),
(175, 183),
(175, 184),
(175, 185),
(175, 186),
(175, 187),
(175, 188),
(175, 189),
(175, 190),
(175, 191),
(175, 192),
(175, 193),
(175, 194),
(175, 195),
(175, 196),
(175, 197),
(175, 198),
(175, 199),
(175, 200),
(175, 201),
(175, 202),
(175, 203),
(175, 204),
(175, 205),
(175, 206),
(175, 207),
(175, 208),
(175, 209),
(175, 210),
(175, 211),
(175, 212),
(175, 213),
(175, 214),
(175, 215),
(175, 216),
(175, 217),
(175, 218),
(175, 219),
(175, 220),
(175, 221),
(175, 222),
(175, 223),
(175, 224),
(175, 225),
(175, 226),
(175, 227),
(175, 228),
(175, 229),
(175, 230),
(175, 231),
(175, 232),
(175, 233),
(175, 234),
(175, 235),
(175, 236),
(175, 237),
(175, 238),
(175, 239),
(175, 240),
(175, 241),
(175, 242),
(175, 243),
(175, 244),
(175, 245),
(175, 246),
(175, 247),
(175, 248),
(175, 249),
(176, 376),
(176, 377),
(176, 378),
(176, 379),
(176, 380),
(176, 381),
(176, 382),
(176, 383),
(176, 384),
(176, 385),
(176, 386),
(176, 387),
(176, 388),
(176, 389),
(176, 390),
(176, 391),
(176, 392),
(176, 393),
(176, 394),
(176, 395),
(176, 396),
(176, 397),
(176, 398),
(176, 399),
(176, 400),
(176, 401),
(176, 402),
(176, 403),
(176, 404),
(176, 405),
(176, 406),
(176, 407),
(176, 408),
(176, 409),
(176, 410),
(176, 411),
(176, 412),
(176, 413),
(176, 414),
(176, 415),
(176, 416),
(176, 417),
(176, 418),
(176, 419),
(176, 420),
(176, 421),
(176, 422),
(176, 423),
(176, 424),
(176, 425),
(176, 426),
(176, 427),
(176, 428),
(176, 429),
(176, 430),
(176, 431),
(176, 432),
(176, 433),
(176, 434),
(176, 435),
(176, 436),
(176, 437),
(176, 438),
(176, 439),
(176, 440),
(176, 441),
(176, 442),
(176, 443),
(176, 444),
(176, 445);

-- --------------------------------------------------------

--
-- Table structure for table `market_currency`
--

CREATE TABLE `market_currency` (
  `id` int(11) UNSIGNED NOT NULL,
  `market_public_id` varchar(25) DEFAULT NULL,
  `market_id` varchar(4) DEFAULT NULL,
  `market_currency_name` varchar(25) DEFAULT NULL,
  `market_currency_value` varchar(25) DEFAULT NULL,
  `market_currency_dollar_value` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `market_currency`
--

INSERT INTO `market_currency` (`id`, `market_public_id`, `market_id`, `market_currency_name`, `market_currency_value`, `market_currency_dollar_value`) VALUES
(1, '5b920b9041', '3', 'EBT Match', '2', '1'),
(2, '5b920b9041', '3', 'EBT Tokens', '1', '1'),
(29, '5b920b9041', '3', 'ATM', '1', '1'),
(36, '5b9f075407', '138', 'EBT Match', '1', '1'),
(39, '5ba92160e8', '175', 'EBT Tokens', '1', '1'),
(41, '5ba92160e8', '175', 'MM Tokens', '1', '1'),
(43, '5ba92160e8', '175', 'MM Vouchers', '1', '1'),
(45, '5ba92160e8', '175', 'fmnp fvc', '1', '1'),
(47, '5ba92160e8', '175', 'Open Door', '1', '1'),
(49, '5ba92160e8', '175', 'Piersons', '1', '1'),
(54, '5ba92160e8', '175', 'ncga', '1', '1'),
(56, '5b920b9041', '3', 'ebt_total_in', '1', '1'),
(57, '5b920b9041', '3', 'cambria', '1', '1'),
(58, '5b920b9041', '3', 'EBT Match', '1', '1'),
(60, '5b920b9041', '3', 'MM Tokens', '1', '1'),
(61, '5b920b9041', '3', 'end_of_market', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) NOT NULL,
  `users_id` varchar(5) DEFAULT NULL,
  `name_of_certified_producer` varchar(25) DEFAULT '',
  `certificate_number` varchar(100) DEFAULT NULL,
  `dates_participated` varchar(15) DEFAULT '',
  `total` varchar(11) DEFAULT NULL,
  `issuing_county` varchar(255) DEFAULT NULL,
  `report_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `users_id`, `name_of_certified_producer`, `certificate_number`, `dates_participated`, `total`, `issuing_county`, `report_name`) VALUES
(23, '29', 'Arcata Bay Llamas', '11111111111', '6/4', '1', 'fresno', NULL),
(32, '29', 'Arcata Bay Llamas', '11111111111', '5/4, 5/7, 5/9', '3', 'Fresno', NULL),
(33, '29', 'Brunner Family Farm', '', '5/4, 5/5, 5/6', '3', '', NULL),
(34, '29', 'CCC Farm', '', '5/4, 5/6, 5/7', '3', '', NULL),
(35, '29', 'Carlotta Flowers', '', '5/4, 5/5', '2', '', NULL),
(36, '29', 'CCC Farm', '11', '5/4, 5/5', '2', '', NULL),
(37, '29', 'Aurora Acres', '111', '5/4', '1', 'fres', NULL),
(38, '29', 'BIGFOOT Collections', '1234', '5/4, 5/4', '2', 'mod', NULL),
(39, '29', 'Arcata Bay Llamas', '11111111111', '5/4', '1', 'Fresno', NULL),
(40, '29', 'Carlotta Flowers', '1111', '5/4', '1', '123', NULL),
(41, '29', 'Arcata Bay Llamas', '11111111111', '5/4, 5/5', '2', 'Fresno', 'State Report 1'),
(42, '29', 'Chris\'s Carnivores', '1111', '5/4, 5/5', '2', 'oak', 'State Report 1'),
(43, '29', 'CCC Farm', '', '11', '1', '', 'State Report 1'),
(44, '29', 'Bayside Park Farm', '', '66', '1', '', 'State Report 1'),
(45, '29', 'Arcata Bay Llamas', '11111111111', '99', '1', 'Fresno', 'State Report 1'),
(46, '29', 'Arcata Bay Llamas', '11111111111', '55', '1', 'Fresno', 'State Report 1'),
(47, '29', 'Bayside Park Farm', '1111111111', '77', '1', '', 'State Report 1'),
(48, '29', '', '', '555', '1', '', 'State Report 1'),
(49, '29', '', '', '555', '1', '', 'State Report 1'),
(50, '29', '', '', '11', '1', '5555', 'state report 1'),
(51, '29', '', '11', '5/4', '1', '11', 'State Report 1'),
(52, '29', '', '111', '5/4', '1', 'mod', 'state report 2'),
(53, '29', '', '111', '55, 55', '2', 'fre', 'state report 2'),
(54, '29', '', '111', '5/4', '1', '11', 'state report 2'),
(55, '29', 'Degrees of Green', '1111', '5/4', '1', 'fresno', 'state report 2'),
(56, '29', 'Arcata Bay Llamas', '11111111111', '5/4', '1', 'Fresno', 'state report 3'),
(57, '30', 'Amen Bee Products', '1111', '5/4, 5/2, 5/3', '3', 'Freson', 'State Report 1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(25) NOT NULL,
  `position` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `name` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(30) NOT NULL DEFAULT '',
  `phoneNumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `DoB` date NOT NULL,
  `cropType` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `position`, `password`, `name`, `email`, `phoneNumber`, `address`, `location`, `gender`, `DoB`, `cropType`, `picture`) VALUES
(32, 'Farmer', 'e10adc3949ba59abbe56e057f20f883e', 'Edgar Bernard Inga', 'edgaringa22@gmail.com', '+255718001901', 'arusha', 'arusha tanzania', 'Male', '2019-09-16', 'Maize, Potatoes', ''),
(33, 'Wholesaler', '827ccb0eea8a706c4c34a16891f84e7b', 'Edd ewew wee', 'tes@test.com', '2322222', 'mmm', 'ewwew', 'Female', '2019-09-11', 'Maize, Potatoes', '');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `users_id` varchar(10) DEFAULT NULL,
  `vendor_name` varchar(60) DEFAULT '',
  `business_name` varchar(25) DEFAULT '',
  `address` varchar(255) DEFAULT NULL,
  `vendor_city` varchar(15) DEFAULT '',
  `vendor_state` varchar(30) DEFAULT '',
  `vendor_phone` varchar(15) DEFAULT '',
  `vendor_email` varchar(50) DEFAULT '',
  `certificate_expiration` date DEFAULT NULL,
  `certificate_number` varchar(14) DEFAULT NULL,
  `issuing_county` varchar(255) DEFAULT NULL,
  `vendor_type` varchar(25) DEFAULT NULL,
  `products_sold` varchar(500) DEFAULT '',
  `website` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `users_id`, `vendor_name`, `business_name`, `address`, `vendor_city`, `vendor_state`, `vendor_phone`, `vendor_email`, `certificate_expiration`, `certificate_number`, `issuing_county`, `vendor_type`, `products_sold`, `website`, `facebook`, `instagram`) VALUES
(72, '25', 'Vendors 2', '9', NULL, NULL, NULL, '2096798265', '11', '0000-00-00', '0', NULL, 'certified', '', NULL, NULL, NULL),
(84, '25', 'Cameron Sluggett', 'Cams Jams', NULL, NULL, NULL, '2096798265', 'cam@shiftco.de', '0000-00-00', '20111111', NULL, 'certified', '', NULL, NULL, NULL),
(85, '25', 'test', 'cams', NULL, 'paia', 'ca', '1111', 'cam@test', '0000-00-00', '0', NULL, '111', 'nonw', NULL, NULL, NULL),
(86, '25', 'Jeff Nielson', 'Jeffs Fruits', NULL, NULL, NULL, '111111111', 'jeffnielson@me.com', '0000-00-00', '20111111', NULL, 'certified', '', NULL, NULL, NULL),
(87, '25', 'Annie Foote', 'Annies Juices', NULL, NULL, NULL, '2908408814', 'anniefoote@hotmail.com', '0000-00-00', '0', NULL, 'non-certified', 'juices, jellys, fruites, test', NULL, NULL, NULL),
(88, '25', 'Jordan Sluggett', 'Sluggett Farmers', NULL, 'Oakdale', 'CA', '2095857322', 'jsluggett@csumb.edu', '2020-10-03', '12345', NULL, 'certified', '', NULL, NULL, NULL),
(112, '25', 'Mckenzie Sluggett', 'Full Time Mermaid', NULL, NULL, NULL, '11111111111', 'mmmm@mmm.com', '0000-00-00', '0', NULL, 'non-certified', 'jewelry, necklaces, pearls', NULL, NULL, NULL),
(123, '25', 'Jeff Nielson', 'dragon s[rings', NULL, NULL, NULL, '1111111111111', 'jeffnielson@me.com', '0000-00-00', '0', NULL, 'ancillary', '', NULL, NULL, NULL),
(136, '29', 'Nicole & Doug Almand', 'Almand Dahlia Gardens', 'PO Box 1253', 'Ferndale, CA', 'CA', '786-4130', 'almandahliagardens@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'www.facebook.com/Almand.Dahlia.Gardens', ''),
(137, '29', 'Sherria Tyler', 'Arcata Bay Llamas', '3508 Spear Ave/ PO Box 412', 'Arcata, CA', 'CA', '707-822-8661/ 8', 'sheriyarn@gmail.com; arcatabayllamas@msn.com', '0000-00-00', '11111111111', 'Fresno', 'Ag', '', 'humboldthandspun.etsy.com', 'n/a', ''),
(138, '29', 'Leota Day', 'Aurora Acres', '497 Shively Flat Road', 'Scotia, CA', 'CA', '616-2226', 'leota_day@yahoo.com', '0000-00-00', NULL, NULL, 'Ag', '', 'N/A', 'https://www.facebook.com/Aurora-Acres-1631474500510280/?fref=ts', ''),
(139, '29', 'Jayme Buckley', 'Bayside Park Farm', '736 F Street', 'Arcata, CA', 'CA', '707-822-7091/61', 'baysideparkfarm@cityofarcata.org', '0000-00-00', NULL, NULL, 'Ag', '', 'www.cityofarcata.org/rec', 'Bayside Park Farm', ''),
(140, '29', 'Betty Teasley', 'Betty\'s Country Store', 'PO Box 250', 'Weott, CA', 'CA', '707-946-2465', '', '0000-00-00', NULL, NULL, 'Ag', '', 'none', 'none', 'no'),
(141, '29', 'Bob Filbey', 'BIGFOOT Collections', 'PO Box 1025', 'Blue Lake, CA', 'CA', '707-668-1829', 'bigfoot95525@yahoo.com; bigfootcollections@yahoo.c', '0000-00-00', NULL, NULL, 'Ag', '', 'bigfootcollections.com', 'none', ''),
(142, '29', 'Sarah and Matt Brunner', 'Brunner Family Farm', '3628 Fieldbrook Rd/ PO Box 977 (public)', 'Fieldbrook, CA/', 'CA', '707-845-4718', 'sarahjobrunner@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'Brunner Family Farm', 'n/a'),
(143, '29', 'Jane Laddusaw', 'Carlotta Flowers', '7032 HWY 36', 'Carlotta, CA', 'CA', '707-768-3779', '', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'n/a', ''),
(144, '29', 'Claire Biggin', 'CCC Farm', '4510 Chaffin Rd./PO Box 2311', 'McKinleyville, ', 'CA', '707-633-4200', 'biggin2007@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', '', '', ''),
(145, '29', 'Chris Byers', 'Chris\'s Carnivores', '8556 Holmes Davis Ranch Rd., Unit C', 'Arcata, CA', 'CA', '707-601-7155', 'mountainwookie.cb@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'trippyplants.com', 'Chris\'s Carnivores', '@Chriscarnivoresplants'),
(146, '29', 'Claudia Holzinger and Von Tunstall', 'Claudia\'s Organic Herbs', 'PO Box 233', 'Orleans, CA', 'CA', '530-627-3712', 'claudiaholzinger13@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'http://www.claudiasherbs.com/', '', ''),
(147, '29', 'Julia & Brett McFarland', 'Crazy River Ranch', 'PO Box 101', 'Korbel, CA', 'CA', '916-751-6192/ 7', 'crazyriverranch@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'Crazy River Ranch', '@berriesnbasil'),
(148, '29', 'Dawson Darling', 'Darlingest Lil Nursery, T', '1736 Balboa Rd.', 'McKinleyville, ', 'CA', '707-499-4562', 'dawsondarling@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'n/a', 'n/a'),
(149, '29', 'Mike Beck', 'Degrees of Green', '4550 Woods Ln', 'McKinleyville, ', 'CA', '707-839-5167/ 7', 'unclemikefishon@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', '', ''),
(150, '29', 'Dean Gilkerson', 'Earth N Hands Farm', '3555 Thorpe Ln', 'Kneeland, CA', 'CA', '707-599-4458', 'dean.enhfarm@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'n\'a', 'no'),
(151, '29', 'Ed Cohen', 'Earthly Edibles', 'PO Box 5184', 'Arcata, CA', 'CA', '707-502-5833 (t', 'earthlyediblescsa@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'earthly-edibles.com', '', ''),
(152, '29', 'Jamie & Ben Cohoon', 'Ewe So Dirty Farm', '212 Belleview Ave/ PO Box 194', 'Rio Dell, CA', 'CA', '707-499-2150 ja', 'jamie@ewesodirty.com; jamie_cohoon@yahoo.com; b.co', '0000-00-00', NULL, NULL, 'Ag', '', 'www.ewesodirty.com', '/ewesodirty', ''),
(153, '29', 'Matt Mikel', 'Feisty Dog Orchard', 'PO Box 598', 'Garberville, CA', 'CA', '223-6288', 'fdomikel@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', '', 'Feisty Dog Orchard', ''),
(154, '29', 'Dave, Autumn, Ray and Misha Feral', 'Feral Family Farm', '134 Esther Ln.', 'Arcata, CA', 'CA', '707-382-6162/70', 'theferals@suddenlink.net', '0000-00-00', NULL, NULL, 'Ag', '', 'none', 'none', 'no'),
(155, '29', 'Janet Winzler', 'Fernbridge Honey Co.', '6000 McKenny Lane', 'Eureka, CA', 'CA', '707-498-2681/ H', 'jumpingjanny@hotmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'n/a', 'n/a'),
(156, '29', 'Cynthia Graebner', 'Fickle Hill Old Rose Nurs', '282 Fickle Hill Rd.', 'Arcata, CA', 'CA', '707-826-0708', 'ficklehillrose@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'https://www.facebook.com/pages/Fickle-Hill-Old-Rose-Nursery/126269564053351?fref=ts&ref=br_tf', 'N/A'),
(157, '29', 'Jim Polly', 'Fieldbrook Nursery', '155 Cider Mill Rd', 'McKinleyville, ', 'CA', '707-839-0524', 'n/a', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'n/a', 'no'),
(158, '29', 'Richard Lovie and Arley Smith', 'Fieldbrook Valley Apple F', '336 Rock Pit Rd.', 'Fieldbrook, CA', 'CA', '707-839-4288/70', 'loviesgotapples@suddenlink.net', '0000-00-00', NULL, NULL, 'Ag', '', 'http://fieldbrookfarms.tripod.com/', 'Fieldbrook Apple Farm', 'no'),
(159, '29', 'Alex Pepe & Ben Kaplan-Good', 'Fields Forever Farm', '4415 Woods Ln.', 'McKinleyville, ', 'CA', '714-313-1796 Al', 'alexpeps760@gmail.com; bkaplang@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', '', '', ''),
(160, '29', 'Andreas, Lisa & Emma Zierer', 'Flora Organica', 'PO Box 206/5015 Dows Prarie Rd', 'Arcata, CA/ McK', 'CA', '707-839-3405, l', 'floraorganicafarm@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'https://www.facebook.com/pages/Flora-Organica/1725360587688507?fref=ts', '@floraorganicafarm'),
(161, '29', 'Laurie Levey and Rita Jacinto', 'Flying Blue Dog Farm & Nu', 'PO Box 1486, 101 Christain School Rd.', 'Willow Creek, C', 'CA', '530-629-1177', 'flyingbluedog@flyingbluedog.com', '0000-00-00', NULL, NULL, 'Ag', '', 'www.flyingbluedog.com', 'https://www.facebook.com/pages/Flying-Blue-Dog-Farm-and-Nursery/287381935863?fref=ts', ''),
(162, '29', 'George Waller', 'Fog Farm', '2966 Springer Dr.', 'Mckinleyville, ', 'CA', '839-3436', 'wallergm@sitestar.net', '0000-00-00', NULL, NULL, 'Ag', '', 'none', 'none', 'no'),
(163, '29', 'Steven and Julia Roper', 'Forest Lakes Nursery', '2300 Hillcrest Ave.', 'Fortuna, CA', 'CA', '726-9371/ 707-8', 'forestlakesnursery@att.net', '0000-00-00', NULL, NULL, 'Ag', '', 'www.forestlakesnursery.com', 'https://www.facebook.com/pages/Forest-Lakes-Nursery/183690405025229?fref=ts', ''),
(164, '29', 'Bchio Saechao', 'Fortuna Strawberries', '262 Sunnybrook Dr.', 'Fortuna, CA', 'CA', '707-572-7417/70', 'lilmi3nboi87@aol.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'none', 'N/A'),
(165, '29', 'Tammy Southard', 'Freshwater Gardens', '450 Redmond Rd./ 5851 Myrtle Ave.', 'Eureka, CA', 'CA', '707-407-7123', 'freshwatergardens@yahoo.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'facebook.com/farminglocal', 'n/a'),
(166, '29', 'Maria and Tom Krenek', 'Glenmar Heather Nursery', 'PO Box 479', 'Bayside, CA', 'CA', '707-268-5560', 'glenmarheather@yahoo.com', '0000-00-00', NULL, NULL, 'Ag', '', 'none', 'none', ''),
(167, '29', 'Brian & Ann Barbata', 'Golden Bee Apiaries', '1773 Ambrosini Ln', 'Ferndale, CA', 'CA', '707-786-4382/ 8', 'barbatabeefarm@gmail.com; goldenbee.annie@gmail.co', '0000-00-00', NULL, NULL, 'Ag', '', 'none', 'none', 'n/a'),
(168, '29', 'Robert Ducate', 'Gopher Gardens', '1469 Walker Pt Rd', 'Bayside, CA', 'CA', '707-502-1663', 'bdredsmile@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'none', 'n/a'),
(169, '29', 'Thom Lindholm', 'Grampa Thom\'s Backyard Fa', '551 Scenic Dr.', 'Loleta, CA', 'CA', '707-845-2063', 'thomlindholm@yahoo.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'n/a', 'na'),
(170, '29', 'Grady Walker', 'Green Fire Farm', 'PO Box 608', 'Hoopa, CA', 'CA', '707-502-0045', 'greenfireorganics@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'none', 'none', ''),
(171, '29', 'River Walker and Jessica Brown', 'Happy Hearts Farm', '1596 Gross Rd', 'Fieldbrook, CA', 'CA', '707-496-8596', 'happyheartsfarming@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'instagram: happy hearts farm', 'happy hearts farm', '@happyheartsfarm'),
(172, '29', 'Ty Johnson', 'Hillbelly Farm', 'PO Box 248', 'Scotia, CA', 'CA', '707-764-3670', 'hillbelly@live.com', '0000-00-00', NULL, NULL, 'Ag', '', 'none', 'none', 'no'),
(173, '29', 'Laurence and Lisa Hindley', 'Hindley Ranch (2nd produc', '320 Schirman Way', 'Fortuna, CA', 'CA', '707-725-9266/70', 'lhindley@yahoo.com', '0000-00-00', NULL, NULL, 'Ag', '', 'www.hindleyranch.com', 'https://www.facebook.com/Hindley-Ranch-177026192490002/?fref=ts', ''),
(174, '29', 'Ron and Shelly Honig', 'Honey Apple Farms', '11251 West End Rd.', 'Arcata, CA', 'CA', '707-822-6186', 'honeyapplefarms@gmail.com; ronald.honig@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'none', ''),
(175, '29', 'Paul and Heidi Leslie', 'Humboldt Honey Wine', '1480 Riverbar Road', 'Fortuna, CA', 'CA', '707 599 7973', 'humboldthoneywine@yahoo.com', '0000-00-00', NULL, NULL, 'Ag', '', 'humboldthoneywine.com', 'www.facebook.com/humboldthoneywine', ''),
(176, '29', 'Ino and Lauren Riley', 'I and I Farm', '2335 1/2 Hooven Rd.', 'McKinleyville, ', 'CA', '707-840-0336/60', 'lauren_ballard@yahoo.com; iasthai@att.net; ino707r', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'I&I Farm', 'iasthaiherbs'),
(177, '29', 'Karina Gilkerson', 'Jacob\'s Greens', 'PO Box 1273', 'Blue Lake', 'CA', '707-845-0293', 'arugula22@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'n/a', 'n/a'),
(178, '29', 'Marsha and John Maxwell', 'Jameson Creek Nursery', '3901 Rohnerville Rd', 'Fortuna, CA', 'CA', '707-725-5084/ 6', 'jamesoncreek@att.net; jamesoncreeknursery@gmail.co', '0000-00-00', NULL, NULL, 'Ag', '', 'none', 'none', 'no'),
(179, '29', 'Leslie G. and Doug McMurray', 'Jameson Creek Ranch', '400 Dick Smith Rd.', 'Fortuna, CA', 'CA', '707-725-8616, 5', 'lcmcmurray@mcmurray-law.com', '0000-00-00', NULL, NULL, 'Ag', '', 'www.jamesoncreekranch.com', '/jamesoncreekranch', 'no'),
(180, '29', '\"Paco\" Francisco Diaz Reche', 'La Huerta Del Perro Produ', 'HC 11 PO Box 715/ 1473 Red Cap Road', 'Somes Bar, CA/ ', 'CA', '707-296-5536', 'flotaryvolar@hotmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'n/a', ''),
(181, '29', 'Leonard J. Melendez', 'Leo\'s Plants', '1521 Railroad Dr.', 'McKinleyville, ', 'CA', '839-0622', 'melendezno7@att.net', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'Leo\'s Plants', ''),
(182, '29', 'John Severn', 'Little River Farm', '140 Ole Hanson Rd', 'Eureka, CA', 'CA', '707-441-9286/ 4', 'littleriverfarm@sbcglobal.net', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'yes', 'n/a'),
(183, '29', 'Frederic Diekmeyer & Amy Barnes', 'Luna Farm', 'PO Box 184', 'Willow Creek', 'CA', '530-355-4191/ 7', 'farmfred@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'Luna Farm', '@lunafarm'),
(184, '29', 'Kashi Albertsen', 'Luscious Gardens', 'PO Box 2793/ 1766 Wolf Road', 'McKinleyville, ', 'CA', '707-834-2698', 'lusciousgardens@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'Luscious Gardens', ''),
(185, '29', 'Brad and Adrianne Werren', 'Magic Rabbit (previously ', '3385 Middlefield Ln.', 'Eureka, CA', 'CA', '707-442-5002', 'magicrabbitgo@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'n/a', 'no'),
(186, '29', 'Loren McIntosh', 'McIntosh Farm', 'PO Box 296', 'Willow Creek, C', 'CA', '530-629-4145/ 5', 'vistarose@netzero.net', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'n/a', 'n/a'),
(187, '29', 'Christine Bernard', 'Moonstone Bee Sweet (2nd ', 'PO Box 1009', 'Trinidad, CA', 'CA', '707-822-5425/70', 'junechris6@yahoo.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'n/a', 'n/a'),
(188, '29', 'Michael Egan', 'Mycality Mushroom', '2577 Fickle Hill Rd', 'Arcata, CA', 'CA', '707-834-6396', 'mycality77@yahoo.com', '0000-00-00', NULL, NULL, 'Ag', '', 'mycalitymushrooms.com', 'n/a', '@Mycality Mushrooms'),
(189, '29', 'Jacques & Amy Neukom', 'Neukom Family Farms', 'PO Box 312', 'Willow Creek, C', 'CA', '530-629-1909', 'spinningweb@hotmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'n/a', 'no'),
(190, '29', 'Jill VanderLinden', 'New Moon Organics', '125 Shively Flat Rd.', 'Shively, CA', 'CA', '707-722-4439/ 5', 'newmoonorganics@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'newmoonorganics.org', 'none', 'no'),
(191, '29', 'David Wilbur', 'Noble Berry Farm', 'PO Box 1134/3563 Fieldbrook Rd.', 'Blue Lake, CA/ ', 'CA', '707-834-6299/ S', 'klnoble@suddenlink.net (RLnoble?)', '0000-00-00', NULL, NULL, 'Ag', '', '', '', 'no'),
(192, '29', 'Blaine Maynor & Jennifer Rishel', 'Orchids For The People', '1975 Blake Rd', 'McKinleyville, ', 'CA', '840-0223/ 496-9', 'orchidpeople@suddenlink.net; orchidmom@suddenlink.', '0000-00-00', NULL, NULL, 'Ag', '', 'www.orchidpeople.com', 'facebook.com/orchidsforthepeople', '@orchidsforthepeople'),
(193, '29', 'John Gary and Heather Plaza', 'Organic Matters Ranch', '6743 Myrtle Ave', 'Eureka, CA', 'CA', '707-407-3276; 7', 'info@organicmattersranch.com', '0000-00-00', NULL, NULL, 'Ag', '', 'www.organicmattersranch.com', 'https://www.facebook.com/pages/Organic-Matters-Ranch/218632264820493?fref=ts', '@organicmattersranch'),
(194, '29', 'Catherine Peterson', 'The Oyster Lady (formerly', '238 Lois Lane/ PO Box 183', 'Trinidad, CA', 'CA', '707-677-2043/ 7', 'micatjoy@aol.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'n/a', ''),
(195, '29', 'Pam E. Van Fleet', 'Pam E Van Fleet', '2900 Kenwood Dr.', 'Fortuna, CA', 'CA', '845-9004', 'tannervanfleet1@suddenlink.net', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'none', 'no'),
(196, '29', 'Elizabeth Dunlap', 'Paradise Flat Farm', '78 Shively Flat Road', 'Scotia, CA', 'CA', '707-599-2555', 'farmerbethie@yahoo.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'n/a', 'n/a'),
(197, '29', 'Paul Lohse', 'Paul Lohse', 'PO Box 429', 'Arcata, CA', 'CA', '707-668-5432/50', '', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'none', ''),
(198, '29', 'Marguerite and Patrick Pierce', 'Pierce Family Farm', 'PO Box 93/ 3,000 Red Cap Road', 'Orleans, CA', 'CA', '530-627-3320', 'piercefarm@toast.net', '0000-00-00', NULL, NULL, 'Ag', '', 'none', 'none', ''),
(199, '29', 'Marcellene Norton', 'Quail Run Farm', 'PO Box 545', 'Hoopa, Ca', 'CA', '530-351-3246/ 5', 'marcellenenorton@yahoo.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'Marcellene Norton', 'no'),
(200, '29', 'Benjamin and Kelsey Perone', 'Rain Frog Farm', 'PO Box 684', 'Blue Lake, CA', 'CA', '707-498-9837', 'rainfrogfarm@yahoo.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'no', ''),
(201, '29', 'David Reed', 'Reed\'s Bees', '911 Bayview St', 'Arcata, CA', 'CA', '707-826-0544', '', '0000-00-00', NULL, NULL, 'Ag', '', 'no website', 'no', ''),
(202, '29', 'Henry and Mody Holloman', 'Ridgetop Garden', '569 Elizabeth Dr.', 'Arcata, CA', 'CA', '707-822-4756', 'hnrymody@yahoo.com', '0000-00-00', NULL, NULL, 'Ag', '', 'no', 'yes. ridge top garden', ''),
(203, '29', 'James Cortazar, Shaniah Williams', 'Rio Dell Farms', '625 Monument Road', 'Rio Dell, CA', 'CA', '707-273-0663', 'shaniah.williams@ymail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'n/a', ''),
(204, '29', 'Seth Rick', 'River Bees', '156 Ewan Ave', 'Shively, CA', 'CA', '707-722-4669; 7', 'onemorebee@yahoo.com', '0000-00-00', NULL, NULL, 'Ag', '', 'talltreesbees.com', '', ''),
(205, '29', 'Sheree Hugli', 'Rivernook', 'PO Box 1546; 851 E. Sultana Bay', 'Willow Creek, C', 'CA', '530-629-2063/ 9', 'rivernook1@outlook.com; sherleeakak@outlook.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', '', ''),
(206, '29', 'Cynthia Annotto', 'Rock N Rose', '1785 Mygina Ave', 'McKinleyville, ', 'CA', '707-599-2005/ 8', 'cindyannotto@yahoo.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'n/a', ''),
(207, '29', 'Chan Yan Saechao', 'Saechao Strawberries', '1665 Thelma St', 'Fortuna, CA', 'CA', '707-845-3930', '', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', '', ''),
(208, '29', 'William Sanford', 'Sanco Farms', '2231 Albee Street', 'Eureka, CA', 'CA', '707-798-1499/83', 'williamsanford19@yahoo.com; williamsanford@yahoo.c', '0000-00-00', NULL, NULL, 'Ag', '', 'N/A', '', 'n/a'),
(209, '29', 'Gene, Ginger, Alissa, Casey & Silas Sarvinski', 'Sarvinski Family Farm', '441 Dillon Rd', 'Ferndale, CA', 'CA', '707-786-9240/ 4', 'gsarvinski@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'The Corn Crib', 'no'),
(210, '29', 'Marilyn Kelly', 'Seaside Herbs', '170 Garden Ln.', 'Bayside, CA', 'CA', '707-845-9353', 'mtoad60@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', '', '', 'no'),
(211, '29', 'Melanie and Kevin Cunningham', 'Shakefork Community Farm', '7914 State HWY 36', 'Carlotta, CA', 'CA', '707-498-3546/21', 'shakeforkcommunityfarm@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'shakeforkcommunityfarm.com', 'shakefork_community_farm', '@shakeforkcommunityfarm.com AND @westcoastoxen'),
(212, '29', 'Spencer & Jules Hill', 'Small Fruits', 'PO Box 526', 'Hoopa, CA', 'CA', '707-499-9756', 'spencerhill29@outlook.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'n/a', 'no'),
(213, '29', 'Karin Eide', 'Spring Hill Farmstead Goa', '1721 Spring Hill Lane', 'Bayside, CA', 'CA', '707-616-1093', 'springhillfarmstead@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', '', '', 'no'),
(214, '29', 'Bethsheba & Jeremiah Goldstein', 'Swallowtail Gardens', '4870 Walnut Dr.', 'Eureka, CA', 'CA', '707-572-8776', 'humboldtheart@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'n/a', 'n/a'),
(215, '29', 'Shelley Ruhlen Ponce', 'Sweet Pea Gardens', '1433 Freshwater Rd', 'Eureka, CA', 'CA', '707-499-3363; 7', 'sweetpgardens@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', '', 'SweetPeaGardens.tea', '@sweetpeagardens'),
(216, '29', 'Patty Clary & Bill Verick', 'Tanoak Hill Farm (2nd pro', 'PO Box 1447', 'Hoopa, CA', 'CA', '530-625-5153/70', 'patty@tanoakhill.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'n/a', ''),
(217, '29', 'Danielle Newman and Will Randall', 'Trident Lightning Farm', '1202 Chester Court', 'Arcata, CA', 'CA', '707-826-0490/40', 'danielle@penandquilt.com', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'n/a', '@TridentLightningFarms'),
(218, '29', 'William Fales', 'Valley Flower Vegetables', '665 Centerville Rd.', 'Ferndale, CA', 'CA', '707-786-9827; 7', 'valleyflower@frontiernet.net', '0000-00-00', NULL, NULL, 'Ag', '', 'none', 'facebook.com/valleyflowervegetables', 'no'),
(219, '29', 'Paul Giuntoli', 'Warren Creek Farms', '1264 Warren Creek Rd.', 'Arcata, CA', 'CA', '707-822-6017', 'giuntolifarms@suddenlink.net', '0000-00-00', NULL, NULL, 'Ag', '', 'n/a', 'none', 'no'),
(220, '29', 'Blake Richard', 'Wild Rose Farm', 'PO BOX 1233', 'Blue lake, CA', 'CA', '707-834-4115 Bl', 'blakerichard3967@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', '', '', ''),
(221, '29', 'Michael and Jennifer Peterson', 'Willow Creek Farms', 'PO Box 1392', 'Willow Creek, C', 'CA', '530-623-7151', 'info@willowcreekorganicfarms.com', '0000-00-00', NULL, NULL, 'Ag', '', 'www.willowcreekorganicfarms.com', 'https://www.facebook.com/pages/Willow-Creek-Farms/84946086062?fref=ts', '@Willowcreekfarms'),
(222, '29', 'Chris Moore & Amber Ryno', 'Woody Ryno', '1675 Woody Road', 'McKinleyville, ', 'CA', '707 601 9547', 'woodyryno@gmail.com', '0000-00-00', NULL, NULL, 'Ag', '', 'www.woodyrynofarms.com', 'https://www.facebook.com/woodyrynofarms/?fref=ts', '@woodyryno'),
(224, '29', '', 'Arise Bakery', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(225, '29', '', 'Beck\'s Bakery', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(226, '29', '', 'Brio Baking', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(227, '29', '', 'Buck and Daisy (DBA: Tang', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(228, '29', '', 'Celebrations Tamales', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(229, '29', '', 'Ethiopian International C', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(230, '29', '', 'Food is Love, Love is Foo', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(231, '29', '', 'Foodwise - Winter Mkt', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(232, '29', '', 'Greatful Granola Co. - we', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(233, '29', '', 'Henry\'s Olives', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(234, '29', '', 'Hooked Kettle Corn', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(235, '29', '', 'Humboldt Hot Dogs', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(236, '29', '', 'Humboldt Kimchi', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(237, '29', '', 'Jerk Kitchen', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(238, '29', '', 'Kneeland Glen Goats', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(239, '29', '', 'Kodiak Catch', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(240, '29', '', 'The Lighthouse Grill', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(241, '29', '', 'Los Bagels', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(242, '29', '', 'Louise\'s Gourmet Seasoned', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(243, '29', '', 'Momma Gerty\'s Goat Milk S', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(244, '29', '', 'Pizza Gago - weekday afte', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(245, '29', '', 'Planet Teas', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(246, '29', '', 'Sistah\'s Vegan', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(247, '29', '', 'Amy Pollock', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(248, '29', '', 'Roland', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(249, '29', '', 'Mike Olmstead', '', '', '', '', '', '0000-00-00', NULL, NULL, 'NonAg', '', '', '', ''),
(262, '', 'Nicole & Doug Almand', 'Almand Dahlia Gardens', 'PO Box 1253', 'Ferndale, CA', 'CA', '786-4130', 'almandahliagardens@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'www.facebook.com/Almand.Dahlia.Gardens', ''),
(263, '', 'Sherria Tyler', 'Arcata Bay Llamas', '3508 Spear Ave/ PO Box 412', 'Arcata, CA', 'CA', '707-822-8661/ 8', 'sheriyarn@gmail.com; arcatabayllamas@msn.com', '0000-00-00', '', NULL, 'Ag', '', 'humboldthandspun.etsy.com', 'n/a', ''),
(264, '', 'Leota Day', 'Aurora Acres', '497 Shively Flat Road', 'Scotia, CA', 'CA', '616-2226', 'leota_day@yahoo.com', '0000-00-00', '', NULL, 'Ag', '', 'N/A', 'https://www.facebook.com/Aurora-Acres-1631474500510280/?fref=ts', ''),
(265, '', 'Jayme Buckley', 'Bayside Park Farm', '736 F Street', 'Arcata, CA', 'CA', '707-822-7091/61', 'baysideparkfarm@cityofarcata.org', '0000-00-00', '', NULL, 'Ag', '', 'www.cityofarcata.org/rec', 'Bayside Park Farm', ''),
(266, '', 'Betty Teasley', 'Betty\'s Country Store', 'PO Box 250', 'Weott, CA', 'CA', '707-946-2465', '', '0000-00-00', '', NULL, 'Ag', '', 'none', 'none', 'no'),
(267, '', 'Bob Filbey', 'BIGFOOT Collections', 'PO Box 1025', 'Blue Lake, CA', 'CA', '707-668-1829', 'bigfoot95525@yahoo.com; bigfootcollections@yahoo.c', '0000-00-00', '', NULL, 'Ag', '', 'bigfootcollections.com', 'none', ''),
(268, '', 'Sarah and Matt Brunner', 'Brunner Family Farm', '3628 Fieldbrook Rd/ PO Box 977 (public)', 'Fieldbrook, CA/', 'CA', '707-845-4718', 'sarahjobrunner@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'Brunner Family Farm', 'n/a'),
(269, '', 'Jane Laddusaw', 'Carlotta Flowers', '7032 HWY 36', 'Carlotta, CA', 'CA', '707-768-3779', '', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'n/a', ''),
(270, '', 'Claire Biggin', 'CCC Farm', '4510 Chaffin Rd./PO Box 2311', 'McKinleyville, ', 'CA', '707-633-4200', 'biggin2007@gmail.com', '0000-00-00', '', NULL, 'Ag', '', '', '', ''),
(271, '', 'Chris Byers', 'Chris\'s Carnivores', '8556 Holmes Davis Ranch Rd., Unit C', 'Arcata, CA', 'CA', '707-601-7155', 'mountainwookie.cb@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'trippyplants.com', 'Chris\'s Carnivores', '@Chriscarnivoresplants'),
(272, '', 'Claudia Holzinger and Von Tunstall', 'Claudia\'s Organic Herbs', 'PO Box 233', 'Orleans, CA', 'CA', '530-627-3712', 'claudiaholzinger13@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'http://www.claudiasherbs.com/', '', ''),
(273, '', 'Julia & Brett McFarland', 'Crazy River Ranch', 'PO Box 101', 'Korbel, CA', 'CA', '916-751-6192/ 7', 'crazyriverranch@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'Crazy River Ranch', '@berriesnbasil'),
(274, '', 'Dawson Darling', 'Darlingest Lil Nursery, T', '1736 Balboa Rd.', 'McKinleyville, ', 'CA', '707-499-4562', 'dawsondarling@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'n/a', 'n/a'),
(275, '', 'Mike Beck', 'Degrees of Green', '4550 Woods Ln', 'McKinleyville, ', 'CA', '707-839-5167/ 7', 'unclemikefishon@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', '', ''),
(276, '', 'Dean Gilkerson', 'Earth N Hands Farm', '3555 Thorpe Ln', 'Kneeland, CA', 'CA', '707-599-4458', 'dean.enhfarm@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'n\'a', 'no'),
(277, '', 'Ed Cohen', 'Earthly Edibles', 'PO Box 5184', 'Arcata, CA', 'CA', '707-502-5833 (t', 'earthlyediblescsa@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'earthly-edibles.com', '', ''),
(278, '', 'Jamie & Ben Cohoon', 'Ewe So Dirty Farm', '212 Belleview Ave/ PO Box 194', 'Rio Dell, CA', 'CA', '707-499-2150 ja', 'jamie@ewesodirty.com; jamie_cohoon@yahoo.com; b.co', '0000-00-00', '', NULL, 'Ag', '', 'www.ewesodirty.com', '/ewesodirty', ''),
(279, '', 'Matt Mikel', 'Feisty Dog Orchard', 'PO Box 598', 'Garberville, CA', 'CA', '223-6288', 'fdomikel@gmail.com', '0000-00-00', '', NULL, 'Ag', '', '', 'Feisty Dog Orchard', ''),
(280, '', 'Dave, Autumn, Ray and Misha Feral', 'Feral Family Farm', '134 Esther Ln.', 'Arcata, CA', 'CA', '707-382-6162/70', 'theferals@suddenlink.net', '0000-00-00', '', NULL, 'Ag', '', 'none', 'none', 'no'),
(281, '', 'Janet Winzler', 'Fernbridge Honey Co.', '6000 McKenny Lane', 'Eureka, CA', 'CA', '707-498-2681/ H', 'jumpingjanny@hotmail.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'n/a', 'n/a'),
(282, '', 'Cynthia Graebner', 'Fickle Hill Old Rose Nurs', '282 Fickle Hill Rd.', 'Arcata, CA', 'CA', '707-826-0708', 'ficklehillrose@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'https://www.facebook.com/pages/Fickle-Hill-Old-Rose-Nursery/126269564053351?fref=ts&ref=br_tf', 'N/A'),
(283, '', 'Jim Polly', 'Fieldbrook Nursery', '155 Cider Mill Rd', 'McKinleyville, ', 'CA', '707-839-0524', 'n/a', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'n/a', 'no'),
(284, '', 'Richard Lovie and Arley Smith', 'Fieldbrook Valley Apple F', '336 Rock Pit Rd.', 'Fieldbrook, CA', 'CA', '707-839-4288/70', 'loviesgotapples@suddenlink.net', '0000-00-00', '', NULL, 'Ag', '', 'http://fieldbrookfarms.tripod.com/', 'Fieldbrook Apple Farm', 'no'),
(285, '', 'Alex Pepe & Ben Kaplan-Good', 'Fields Forever Farm', '4415 Woods Ln.', 'McKinleyville, ', 'CA', '714-313-1796 Al', 'alexpeps760@gmail.com; bkaplang@gmail.com', '0000-00-00', '', NULL, 'Ag', '', '', '', ''),
(286, '', 'Andreas, Lisa & Emma Zierer', 'Flora Organica', 'PO Box 206/5015 Dows Prarie Rd', 'Arcata, CA/ McK', 'CA', '707-839-3405, l', 'floraorganicafarm@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'https://www.facebook.com/pages/Flora-Organica/1725360587688507?fref=ts', '@floraorganicafarm'),
(287, '', 'Laurie Levey and Rita Jacinto', 'Flying Blue Dog Farm & Nu', 'PO Box 1486, 101 Christain School Rd.', 'Willow Creek, C', 'CA', '530-629-1177', 'flyingbluedog@flyingbluedog.com', '0000-00-00', '', NULL, 'Ag', '', 'www.flyingbluedog.com', 'https://www.facebook.com/pages/Flying-Blue-Dog-Farm-and-Nursery/287381935863?fref=ts', ''),
(288, '', 'George Waller', 'Fog Farm', '2966 Springer Dr.', 'Mckinleyville, ', 'CA', '839-3436', 'wallergm@sitestar.net', '0000-00-00', '', NULL, 'Ag', '', 'none', 'none', 'no'),
(289, '', 'Steven and Julia Roper', 'Forest Lakes Nursery', '2300 Hillcrest Ave.', 'Fortuna, CA', 'CA', '726-9371/ 707-8', 'forestlakesnursery@att.net', '0000-00-00', '', NULL, 'Ag', '', 'www.forestlakesnursery.com', 'https://www.facebook.com/pages/Forest-Lakes-Nursery/183690405025229?fref=ts', ''),
(290, '', 'Bchio Saechao', 'Fortuna Strawberries', '262 Sunnybrook Dr.', 'Fortuna, CA', 'CA', '707-572-7417/70', 'lilmi3nboi87@aol.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'none', 'N/A'),
(291, '', 'Tammy Southard', 'Freshwater Gardens', '450 Redmond Rd./ 5851 Myrtle Ave.', 'Eureka, CA', 'CA', '707-407-7123', 'freshwatergardens@yahoo.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'facebook.com/farminglocal', 'n/a'),
(292, '', 'Maria and Tom Krenek', 'Glenmar Heather Nursery', 'PO Box 479', 'Bayside, CA', 'CA', '707-268-5560', 'glenmarheather@yahoo.com', '0000-00-00', '', NULL, 'Ag', '', 'none', 'none', ''),
(293, '', 'Brian & Ann Barbata', 'Golden Bee Apiaries', '1773 Ambrosini Ln', 'Ferndale, CA', 'CA', '707-786-4382/ 8', 'barbatabeefarm@gmail.com; goldenbee.annie@gmail.co', '0000-00-00', '', NULL, 'Ag', '', 'none', 'none', 'n/a'),
(294, '', 'Robert Ducate', 'Gopher Gardens', '1469 Walker Pt Rd', 'Bayside, CA', 'CA', '707-502-1663', 'bdredsmile@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'none', 'n/a'),
(295, '', 'Thom Lindholm', 'Grampa Thom\'s Backyard Fa', '551 Scenic Dr.', 'Loleta, CA', 'CA', '707-845-2063', 'thomlindholm@yahoo.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'n/a', 'na'),
(296, '', 'Grady Walker', 'Green Fire Farm', 'PO Box 608', 'Hoopa, CA', 'CA', '707-502-0045', 'greenfireorganics@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'none', 'none', ''),
(297, '', 'River Walker and Jessica Brown', 'Happy Hearts Farm', '1596 Gross Rd', 'Fieldbrook, CA', 'CA', '707-496-8596', 'happyheartsfarming@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'instagram: happy hearts farm', 'happy hearts farm', '@happyheartsfarm'),
(298, '', 'Ty Johnson', 'Hillbelly Farm', 'PO Box 248', 'Scotia, CA', 'CA', '707-764-3670', 'hillbelly@live.com', '0000-00-00', '', NULL, 'Ag', '', 'none', 'none', 'no'),
(299, '', 'Laurence and Lisa Hindley', 'Hindley Ranch (2nd produc', '320 Schirman Way', 'Fortuna, CA', 'CA', '707-725-9266/70', 'lhindley@yahoo.com', '0000-00-00', '', NULL, 'Ag', '', 'www.hindleyranch.com', 'https://www.facebook.com/Hindley-Ranch-177026192490002/?fref=ts', ''),
(300, '', 'Ron and Shelly Honig', 'Honey Apple Farms', '11251 West End Rd.', 'Arcata, CA', 'CA', '707-822-6186', 'honeyapplefarms@gmail.com; ronald.honig@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'none', ''),
(301, '', 'Paul and Heidi Leslie', 'Humboldt Honey Wine', '1480 Riverbar Road', 'Fortuna, CA', 'CA', '707 599 7973', 'humboldthoneywine@yahoo.com', '0000-00-00', '', NULL, 'Ag', '', 'humboldthoneywine.com', 'www.facebook.com/humboldthoneywine', ''),
(302, '', 'Ino and Lauren Riley', 'I and I Farm', '2335 1/2 Hooven Rd.', 'McKinleyville, ', 'CA', '707-840-0336/60', 'lauren_ballard@yahoo.com; iasthai@att.net; ino707r', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'I&I Farm', 'iasthaiherbs'),
(303, '', 'Karina Gilkerson', 'Jacob\'s Greens', 'PO Box 1273', 'Blue Lake', 'CA', '707-845-0293', 'arugula22@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'n/a', 'n/a'),
(304, '', 'Marsha and John Maxwell', 'Jameson Creek Nursery', '3901 Rohnerville Rd', 'Fortuna, CA', 'CA', '707-725-5084/ 6', 'jamesoncreek@att.net; jamesoncreeknursery@gmail.co', '0000-00-00', '', NULL, 'Ag', '', 'none', 'none', 'no'),
(305, '', 'Leslie G. and Doug McMurray', 'Jameson Creek Ranch', '400 Dick Smith Rd.', 'Fortuna, CA', 'CA', '707-725-8616, 5', 'lcmcmurray@mcmurray-law.com', '0000-00-00', '', NULL, 'Ag', '', 'www.jamesoncreekranch.com', '/jamesoncreekranch', 'no'),
(306, '', '\"Paco\" Francisco Diaz Reche', 'La Huerta Del Perro Produ', 'HC 11 PO Box 715/ 1473 Red Cap Road', 'Somes Bar, CA/ ', 'CA', '707-296-5536', 'flotaryvolar@hotmail.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'n/a', ''),
(307, '', 'Leonard J. Melendez', 'Leo\'s Plants', '1521 Railroad Dr.', 'McKinleyville, ', 'CA', '839-0622', 'melendezno7@att.net', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'Leo\'s Plants', ''),
(308, '', 'John Severn', 'Little River Farm', '140 Ole Hanson Rd', 'Eureka, CA', 'CA', '707-441-9286/ 4', 'littleriverfarm@sbcglobal.net', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'yes', 'n/a'),
(309, '', 'Frederic Diekmeyer & Amy Barnes', 'Luna Farm', 'PO Box 184', 'Willow Creek', 'CA', '530-355-4191/ 7', 'farmfred@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'Luna Farm', '@lunafarm'),
(310, '', 'Kashi Albertsen', 'Luscious Gardens', 'PO Box 2793/ 1766 Wolf Road', 'McKinleyville, ', 'CA', '707-834-2698', 'lusciousgardens@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'Luscious Gardens', ''),
(311, '', 'Brad and Adrianne Werren', 'Magic Rabbit (previously ', '3385 Middlefield Ln.', 'Eureka, CA', 'CA', '707-442-5002', 'magicrabbitgo@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'n/a', 'no'),
(312, '', 'Loren McIntosh', 'McIntosh Farm', 'PO Box 296', 'Willow Creek, C', 'CA', '530-629-4145/ 5', 'vistarose@netzero.net', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'n/a', 'n/a'),
(313, '', 'Christine Bernard', 'Moonstone Bee Sweet (2nd ', 'PO Box 1009', 'Trinidad, CA', 'CA', '707-822-5425/70', 'junechris6@yahoo.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'n/a', 'n/a'),
(314, '', 'Michael Egan', 'Mycality Mushroom', '2577 Fickle Hill Rd', 'Arcata, CA', 'CA', '707-834-6396', 'mycality77@yahoo.com', '0000-00-00', '', NULL, 'Ag', '', 'mycalitymushrooms.com', 'n/a', '@Mycality Mushrooms'),
(315, '', 'Jacques & Amy Neukom', 'Neukom Family Farms', 'PO Box 312', 'Willow Creek, C', 'CA', '530-629-1909', 'spinningweb@hotmail.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'n/a', 'no'),
(316, '', 'Jill VanderLinden', 'New Moon Organics', '125 Shively Flat Rd.', 'Shively, CA', 'CA', '707-722-4439/ 5', 'newmoonorganics@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'newmoonorganics.org', 'none', 'no'),
(317, '', 'David Wilbur', 'Noble Berry Farm', 'PO Box 1134/3563 Fieldbrook Rd.', 'Blue Lake, CA/ ', 'CA', '707-834-6299/ S', 'klnoble@suddenlink.net (RLnoble?)', '0000-00-00', '', NULL, 'Ag', '', '', '', 'no'),
(318, '', 'Blaine Maynor & Jennifer Rishel', 'Orchids For The People', '1975 Blake Rd', 'McKinleyville, ', 'CA', '840-0223/ 496-9', 'orchidpeople@suddenlink.net; orchidmom@suddenlink.', '0000-00-00', '', NULL, 'Ag', '', 'www.orchidpeople.com', 'facebook.com/orchidsforthepeople', '@orchidsforthepeople'),
(319, '', 'John Gary and Heather Plaza', 'Organic Matters Ranch', '6743 Myrtle Ave', 'Eureka, CA', 'CA', '707-407-3276; 7', 'info@organicmattersranch.com', '0000-00-00', '', NULL, 'Ag', '', 'www.organicmattersranch.com', 'https://www.facebook.com/pages/Organic-Matters-Ranch/218632264820493?fref=ts', '@organicmattersranch'),
(320, '', 'Catherine Peterson', 'The Oyster Lady (formerly', '238 Lois Lane/ PO Box 183', 'Trinidad, CA', 'CA', '707-677-2043/ 7', 'micatjoy@aol.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'n/a', ''),
(321, '', 'Pam E. Van Fleet', 'Pam E Van Fleet', '2900 Kenwood Dr.', 'Fortuna, CA', 'CA', '845-9004', 'tannervanfleet1@suddenlink.net', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'none', 'no'),
(322, '', 'Elizabeth Dunlap', 'Paradise Flat Farm', '78 Shively Flat Road', 'Scotia, CA', 'CA', '707-599-2555', 'farmerbethie@yahoo.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'n/a', 'n/a'),
(323, '', 'Paul Lohse', 'Paul Lohse', 'PO Box 429', 'Arcata, CA', 'CA', '707-668-5432/50', '', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'none', ''),
(324, '', 'Marguerite and Patrick Pierce', 'Pierce Family Farm', 'PO Box 93/ 3,000 Red Cap Road', 'Orleans, CA', 'CA', '530-627-3320', 'piercefarm@toast.net', '0000-00-00', '', NULL, 'Ag', '', 'none', 'none', ''),
(325, '', 'Marcellene Norton', 'Quail Run Farm', 'PO Box 545', 'Hoopa, Ca', 'CA', '530-351-3246/ 5', 'marcellenenorton@yahoo.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'Marcellene Norton', 'no'),
(326, '', 'Benjamin and Kelsey Perone', 'Rain Frog Farm', 'PO Box 684', 'Blue Lake, CA', 'CA', '707-498-9837', 'rainfrogfarm@yahoo.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'no', ''),
(327, '', 'David Reed', 'Reed\'s Bees', '911 Bayview St', 'Arcata, CA', 'CA', '707-826-0544', '', '0000-00-00', '', NULL, 'Ag', '', 'no website', 'no', ''),
(328, '', 'Henry and Mody Holloman', 'Ridgetop Garden', '569 Elizabeth Dr.', 'Arcata, CA', 'CA', '707-822-4756', 'hnrymody@yahoo.com', '0000-00-00', '', NULL, 'Ag', '', 'no', 'yes. ridge top garden', ''),
(329, '', 'James Cortazar, Shaniah Williams', 'Rio Dell Farms', '625 Monument Road', 'Rio Dell, CA', 'CA', '707-273-0663', 'shaniah.williams@ymail.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'n/a', ''),
(330, '', 'Seth Rick', 'River Bees', '156 Ewan Ave', 'Shively, CA', 'CA', '707-722-4669; 7', 'onemorebee@yahoo.com', '0000-00-00', '', NULL, 'Ag', '', 'talltreesbees.com', '', ''),
(331, '', 'Sheree Hugli', 'Rivernook', 'PO Box 1546; 851 E. Sultana Bay', 'Willow Creek, C', 'CA', '530-629-2063/ 9', 'rivernook1@outlook.com; sherleeakak@outlook.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', '', ''),
(332, '', 'Cynthia Annotto', 'Rock N Rose', '1785 Mygina Ave', 'McKinleyville, ', 'CA', '707-599-2005/ 8', 'cindyannotto@yahoo.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'n/a', ''),
(333, '', 'Chan Yan Saechao', 'Saechao Strawberries', '1665 Thelma St', 'Fortuna, CA', 'CA', '707-845-3930', '', '0000-00-00', '', NULL, 'Ag', '', 'n/a', '', ''),
(334, '', 'William Sanford', 'Sanco Farms', '2231 Albee Street', 'Eureka, CA', 'CA', '707-798-1499/83', 'williamsanford19@yahoo.com; williamsanford@yahoo.c', '0000-00-00', '', NULL, 'Ag', '', 'N/A', '', 'n/a'),
(335, '', 'Gene, Ginger, Alissa, Casey & Silas Sarvinski', 'Sarvinski Family Farm', '441 Dillon Rd', 'Ferndale, CA', 'CA', '707-786-9240/ 4', 'gsarvinski@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'The Corn Crib', 'no'),
(336, '', 'Marilyn Kelly', 'Seaside Herbs', '170 Garden Ln.', 'Bayside, CA', 'CA', '707-845-9353', 'mtoad60@gmail.com', '0000-00-00', '', NULL, 'Ag', '', '', '', 'no'),
(337, '', 'Melanie and Kevin Cunningham', 'Shakefork Community Farm', '7914 State HWY 36', 'Carlotta, CA', 'CA', '707-498-3546/21', 'shakeforkcommunityfarm@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'shakeforkcommunityfarm.com', 'shakefork_community_farm', '@shakeforkcommunityfarm.com AND @westcoastoxen'),
(338, '', 'Spencer & Jules Hill', 'Small Fruits', 'PO Box 526', 'Hoopa, CA', 'CA', '707-499-9756', 'spencerhill29@outlook.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'n/a', 'no'),
(339, '', 'Karin Eide', 'Spring Hill Farmstead Goa', '1721 Spring Hill Lane', 'Bayside, CA', 'CA', '707-616-1093', 'springhillfarmstead@gmail.com', '0000-00-00', '', NULL, 'Ag', '', '', '', 'no'),
(340, '', 'Bethsheba & Jeremiah Goldstein', 'Swallowtail Gardens', '4870 Walnut Dr.', 'Eureka, CA', 'CA', '707-572-8776', 'humboldtheart@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'n/a', 'n/a'),
(341, '', 'Shelley Ruhlen Ponce', 'Sweet Pea Gardens', '1433 Freshwater Rd', 'Eureka, CA', 'CA', '707-499-3363; 7', 'sweetpgardens@gmail.com', '0000-00-00', '', NULL, 'Ag', '', '', 'SweetPeaGardens.tea', '@sweetpeagardens'),
(342, '', 'Patty Clary & Bill Verick', 'Tanoak Hill Farm (2nd pro', 'PO Box 1447', 'Hoopa, CA', 'CA', '530-625-5153/70', 'patty@tanoakhill.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'n/a', ''),
(343, '', 'Danielle Newman and Will Randall', 'Trident Lightning Farm', '1202 Chester Court', 'Arcata, CA', 'CA', '707-826-0490/40', 'danielle@penandquilt.com', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'n/a', '@TridentLightningFarms'),
(344, '', 'William Fales', 'Valley Flower Vegetables', '665 Centerville Rd.', 'Ferndale, CA', 'CA', '707-786-9827; 7', 'valleyflower@frontiernet.net', '0000-00-00', '', NULL, 'Ag', '', 'none', 'facebook.com/valleyflowervegetables', 'no'),
(345, '', 'Paul Giuntoli', 'Warren Creek Farms', '1264 Warren Creek Rd.', 'Arcata, CA', 'CA', '707-822-6017', 'giuntolifarms@suddenlink.net', '0000-00-00', '', NULL, 'Ag', '', 'n/a', 'none', 'no'),
(346, '', 'Blake Richard', 'Wild Rose Farm', 'PO BOX 1233', 'Blue lake, CA', 'CA', '707-834-4115 Bl', 'blakerichard3967@gmail.com', '0000-00-00', '', NULL, 'Ag', '', '', '', ''),
(347, '', 'Michael and Jennifer Peterson', 'Willow Creek Farms', 'PO Box 1392', 'Willow Creek, C', 'CA', '530-623-7151', 'info@willowcreekorganicfarms.com', '0000-00-00', '', NULL, 'Ag', '', 'www.willowcreekorganicfarms.com', 'https://www.facebook.com/pages/Willow-Creek-Farms/84946086062?fref=ts', '@Willowcreekfarms'),
(348, '', 'Chris Moore & Amber Ryno', 'Woody Ryno', '1675 Woody Road', 'McKinleyville, ', 'CA', '707 601 9547', 'woodyryno@gmail.com', '0000-00-00', '', NULL, 'Ag', '', 'www.woodyrynofarms.com', 'https://www.facebook.com/woodyrynofarms/?fref=ts', '@woodyryno'),
(349, '', '', 'Test Farm B', '', '', '', '', '', '0000-00-00', '', NULL, 'Ag', '', '', '', ''),
(350, '', '', 'Arise Bakery', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(351, '', '', 'Beck\'s Bakery', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(352, '', '', 'Brio Baking', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(353, '', '', 'Buck and Daisy (DBA: Tang', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(354, '', '', 'Celebrations Tamales', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(355, '', '', 'Ethiopian International C', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(356, '', '', 'Food is Love, Love is Foo', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(357, '', '', 'Foodwise - Winter Mkt', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(358, '', '', 'Greatful Granola Co. - we', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(359, '', '', 'Henry\'s Olives', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(360, '', '', 'Hooked Kettle Corn', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(361, '', '', 'Humboldt Hot Dogs', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(362, '', '', 'Humboldt Kimchi', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(363, '', '', 'Jerk Kitchen', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(364, '', '', 'Kneeland Glen Goats', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(365, '', '', 'Kodiak Catch', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(366, '', '', 'The Lighthouse Grill', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(367, '', '', 'Los Bagels', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(368, '', '', 'Louise\'s Gourmet Seasoned', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(369, '', '', 'Momma Gerty\'s Goat Milk S', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(370, '', '', 'Pizza Gago - weekday afte', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(371, '', '', 'Planet Teas', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(372, '', '', 'Sistah\'s Vegan', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(373, '', '', 'Amy Pollock', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(374, '', '', 'Roland', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(375, '', '', 'Mike Olmstead', '', '', '', '', '', '0000-00-00', '', NULL, 'NonAg', '', '', '', ''),
(376, '30', 'Lynne Bottazz', 'Amen Bee Products', '525 California Avenue', 'San Martin', 'CA', '408-683-2324', '', '0000-00-00', '', NULL, 'Conventional', '', '', '', ''),
(377, '30', 'Mike Astone and Bettina Wromar', 'AstoneÕs Protea', '7160 Freedom Blvd', 'Aptos', 'CA', '831-662-3735', 'bettinawromar@icloud.com', '0000-00-00', '', NULL, 'Conventional', '', 'http://www.astonesprotea.com/', '', ''),
(378, '30', 'Steve Jones and Patti Morgan', 'Bar-D Ranch', '14721 Tumbleweed Lane', 'Watsonville', 'CA', '831-206-4358', 'karvinn@sbcglobal.net', '0000-00-00', '', NULL, 'Conventional', '', '', '', ''),
(379, '30', 'Peter Beckmann, Beth Holland and Sharon May', 'BeckmannÕs Old World Bake', '104 Bronson St., #6', 'Santa Cruz', 'CA', '831-818-0201', 'scotadam@beckmannsbakery.com', '0000-00-00', '', NULL, 'Not Applicable', '', 'www.beckmannsbakery.com', '@beckmannsoldworldbakery', '@beckmannsoldworldbakery'),
(380, '30', 'Steve and Marguerite Remde', 'Belle Farms', '233 Peckham Road', 'Watsonville', 'CA', '831-728-9125', 'info@bellefarms.com', '0000-00-00', '', NULL, 'Conventional', '', 'http://www.bellefarms.com/', '', ''),
(381, '30', 'Lori Perry and Dennis Tamura', 'Blue Heron Farms', '216 Merk Road', 'Watsonville', 'CA', '831-722-8635', '', '0000-00-00', '', NULL, 'Organic', '', 'www.blueheronfarmsorganics.com', '', ''),
(382, '30', 'Ron and Cindy Borba', 'Borba Farms', '68 Corey Road', 'Watsonville', 'CA', '831-726-3443', 'borbafamilyfarms@gmail.com', '0000-00-00', '', NULL, 'Organic', '', 'www.borba-farms.com', '', ''),
(383, '30', '', 'Blossoms Farm', '', 'Corralitos', 'CA', '', '', '0000-00-00', '', NULL, 'Organic', '', '', '', ''),
(384, '30', 'Ellen Brokaw and Debbie Jackson', 'Brokaw Ranch Company', '3430 Ojai Road', 'Santa Paula', 'CA', '831-761-9086', 'willbrokaw@sbcglobal.net', '0000-00-00', '', NULL, 'Conventional', '', 'http://www.willsavocados.com/', '', ''),
(385, '30', 'Steve Evers, Peter Shaw', 'Cabrillo College Horticul', '6500 Soquel Dr', 'Aptos', 'CA', '831-728-1344', 'stevers@cabrillo.edu', '0000-00-00', '', NULL, 'Conventional/Organic', '', '', '', ''),
(386, '30', 'Jon Cavanaugh', 'Cavanaugh Color', '234 Webb Road', 'Watsonville', 'CA', '831-728-1344', 'cavanaughcolor@gmail.com', '0000-00-00', '', NULL, 'Conventional', '', '', '', ''),
(387, '30', '', 'C E Farm', '', 'Paicines', 'CA', '', '', '0000-00-00', '', NULL, 'Organic', '', '', '', ''),
(388, '30', 'Pat Umamoto', 'Coastal Paradise Nursery', '50 Zabala Road PO Box 2384', 'Salinas', 'CA', '831-901-8290', 'pumamoto@coastalparadisenursery.com', '0000-00-00', '', NULL, 'Conventional', '', '', '', ''),
(389, '30', 'Erin and Jeremy Lampel', 'Companion Bakeshop', '2341 Mission Street', 'Santa Cruz', 'CA', '831-252-2253', 'manager@companionbakeshop.com', '0000-00-00', '', NULL, 'Organic', '', 'http://www.companionbakeshop.com/', '', ''),
(390, '30', 'Dave Peterson', 'Corralitos Market & Sausa', '569 Corralitos Road', 'Watsonville', 'CA', '831-722-2633', 'cm-sc@sbcglobal.net', '0000-00-00', '', NULL, 'Not Applicable', '', '', '', ''),
(391, '30', 'Benny Cortez', 'Cortez Farms B', '521 E. Cook Road', 'Santa Maria', 'CA', '1-805-478-7939', '', '0000-00-00', '', NULL, 'Organic', '', '', '', ''),
(392, '30', 'Caleb Barron', 'Fogline Farm', '165 Dimeo Lane', 'Santa Cruz', 'CA', '831-212-2411', 'caleb@foglinefarm.com', '0000-00-00', '', NULL, 'Organic', '', 'http://www.foglinefarm.com/', 'foglinefarm', ''),
(393, '30', 'Phil and Katherine Foste', 'Phil Foster Ranch (Pinnac', 'P.O. Box 249', 'Hollister', 'CA', '831-623-9422', 'pfoster@pinnacleorganic.com', '0000-00-00', '', NULL, 'Organic', '', 'http://www.pinnacleorganic.com/', '', ''),
(394, '30', 'Nancy and Robin Gammons', 'Four Sisters Farm', '1431 Cole Road', 'Aromas', 'CA', '831-234-5163', 'familyfarm@gmail.com', '0000-00-00', '', NULL, 'Organic', '', '', 'gammonsnancy', ''),
(395, '30', 'Kay Gatanaga', 'Gatanaga Nursery Inc.', '22790 Fuji Lane', 'Salinas', 'CA', '831-422-4474', '', '0000-00-00', '', NULL, 'Conventional', '', '', '', ''),
(396, '30', '', 'Globe Produce', '', 'Castroville', 'CA', '', '', '0000-00-00', '', NULL, 'Conventional', '', '', '', ''),
(397, '30', '', 'Green Planet Organics', '', 'Soquel', 'CA', '', '', '0000-00-00', '', NULL, 'Organic', '', '', '', ''),
(398, '30', 'Jordan and Todd Champagne', 'Happy Girl Kitchen', '173 Central Avenue', 'Pacific Grove', 'CA', '831-750-9579', 'todd@happygirlkitchen.com', '0000-00-00', '', NULL, 'Not Applicable', '', 'http://www.happygirlkitchen.com/', 'https://www.facebook.com/happygirlkitchen', 'https://www.instagram.com/happygirlkitchen/'),
(399, '30', 'Hans Haveman', 'H & H Fresh Fish Company', '493 Lake Avenue, Suite A', 'Santa Cruz', 'CA', '831-462-3474', 'info@hhfreshfish.com', '0000-00-00', '', NULL, 'Not Applicable', '', 'http://www.hhfreshfish.com/', 'hhfreshfishco', 'Êhhfreshfish');
INSERT INTO `vendors` (`id`, `users_id`, `vendor_name`, `business_name`, `address`, `vendor_city`, `vendor_state`, `vendor_phone`, `vendor_email`, `certificate_expiration`, `certificate_number`, `issuing_county`, `vendor_type`, `products_sold`, `website`, `facebook`, `instagram`) VALUES
(400, '30', 'Bill and Debbie Jurevich', 'Jurevich Farm', '2017 Bolsa Road', 'Hollister', 'CA', '831-245-8336', 'jurevichfarm@gmail.com', '0000-00-00', '', NULL, 'Conventional', '', '', '', ''),
(401, '30', 'Steven and Lisa Kashiwase', 'Kashiwase Farms', '9681 West Lane', 'Sanger', 'CA', '209-394-2246', 'skash956@gmail.com', '0000-00-00', '', NULL, 'Organic', '', '', 'https://www.facebook.com/kashiwasefarms', ''),
(402, '30', 'Kou Moua and Tra Her', 'K T Farms', '818 S. Linda Lane', 'Fresno', 'CA', '559-349-4306', 'koumoua2@gmail.com', '0000-00-00', '', NULL, 'Conventional', '', '', '', ''),
(403, '30', '', 'L & J Farms', '', 'Gonzales', 'CA', '', '', '0000-00-00', '', NULL, 'Organic', '', '', '', ''),
(404, '30', 'Rudy and Maria Figueroa', 'La Marea of the Sea', '109 Sycamore Drive, Unit 708', 'Santa Cruz', 'CA', '831-331-3432', 'rmfigueroa.figueroa2@gmail.com', '0000-00-00', '', NULL, 'Not Applicable', '', '', '', ''),
(405, '30', 'Gilberto and Griselda Nunez', 'LilyÕs Roasted Corn', 'PO Box 406', 'Watsonville', 'CA', '831-246-4948', 'C10CLEO@aol.com', '0000-00-00', '', NULL, 'Not Applicable', '', '', '', ''),
(406, '30', 'Annaliese Keller', 'Malabar Trading Company', '', 'Santa Cruz', 'CA', '831-239-2045', 'annaliese@malabartradingco.com', '0000-00-00', '', NULL, 'Not Applicable', '', 'http://www.malabartradingco.com/', 'https://www.facebook.com/malabartradingcompany', 'https://www.instagram.com/malabartradingcompany/'),
(407, '30', 'Jutta Thoerner', 'Manzanita Manor Organics', '5555 Fair Oaks Court', 'Paso Robles', 'CA', '(805) 674-4505', 'jtmmorganics@gmail.com', '0000-00-00', '', NULL, 'Organic', '', 'http://www.mmorganics.com/', 'https://www.montereybayfarmers.org/markets/aptos-farmers-market/aptos-vendors/_wp_link_placeholder', ''),
(408, '30', 'Laurie and Andy McCahon', 'McCahon Floral', '1400 San Juan Road', 'Salinas', 'CA', '831-724-5600', 'amccahon@aol.com', '0000-00-00', '', NULL, 'Conventional', '', 'http://www.mccahonfloral.com/', '', ''),
(409, '30', '', 'McLellan Botanicals', '2352 San Juan Road', 'Aromas', 'CA', '831-726-1797', 'aalfaro@taisucoamerica.com', '0000-00-00', '', NULL, 'Conventional', '', 'http://www.taisucoamerica.com/', '', ''),
(410, '30', 'Fred and Joann Minazzoli', 'Minazzoli Farms', '5051 North Boggiano Road', 'Stockton', 'CA', '(209) 931-3662', 'fminazzoli@gmail.com', '0000-00-00', '', NULL, 'Conventional', '', 'http://www.minazzolifarms.com/', '', ''),
(411, '30', 'Judy Low, Joe Curry', 'Molino Creek', '', 'Davenport', 'CA', '831-818-2137', '', '0000-00-00', '', NULL, 'Organic', '', '', '', ''),
(412, '30', 'Darlene and Michael Mora', 'Mora Family Farms', '185 Travers Lane', 'Watsonville', 'CA', '831-761-2130', 'darlenemora831@gmail.com', '0000-00-00', '', NULL, 'Organic', '', '', '', ''),
(413, '30', 'Edwin and Pearl Munak', 'Munak Ranch', '3770 N. River Road', 'Paso Robles', 'CA', '805-238-7056', '', '0000-00-00', '', NULL, 'Conventional', '', '', '', ''),
(414, '30', 'Brian and Cione Murakami', 'Murakami Farms', '112 Nancy Court', 'Watsonville', 'CA', '831-750-5862', 'youngito@aol.com', '0000-00-00', '', NULL, 'Conventional', '', '', '', ''),
(415, '30', 'Ken Kimes and Sandra Ward', 'New Natives', 'PO Box 1413', 'Aptos', 'CA', '831.728.4136', 'ken@newnatives.com', '0000-00-00', '', NULL, 'Organic', '', '', 'https://www.facebook.com/NewNativesNurseries', ''),
(416, '30', 'Walter and Elizabeth Nicolau', 'Nicolau Farms', '4451 South Carpenter Road', 'Modesto', 'CA', '209-538-4558', 'liz@nicolaufarms.com', '0000-00-00', '', NULL, 'Conventional', '', 'http://www.nicolaufarms.com/', 'https://www.facebook.com/Nicolau-Farms-113485605398706/?fref=ts', 'https://www.instagram.com/nicolaufarms/'),
(417, '30', 'Terri and Bob Blanchard', 'Old Creek Ranch', '12520 Santa Rita Road', 'Cayucos', 'CA', '805-748-0235', 'oldcreekranch@gmail.com', '0000-00-00', '', NULL, 'Organic', '', 'http://www.oldcreekranch.net/', '', ''),
(418, '30', 'Paul and Kim Tao', 'P&K Farms', '196 San Andreas Road', 'Castroville', 'CA', '831-728-5002', 'pandkfarms1994@gmail.com', '0000-00-00', '', NULL, 'Organic', '', '', '', ''),
(419, '30', 'Daniel Porter', 'Pacific Rare Plant Nurser', '951 Green Valley Road', 'Watsonville', 'CA', '831-722-3982', 'pacificrare@calcentral.com', '0000-00-00', '', NULL, 'Conventional', '', '', '', ''),
(420, '30', 'James Kachler', 'Parrot Ranch Pottery', '21975 Parrot Ranch Road', 'Carmel Valley', 'CA', '831-659-0679', 'jameskachler@sbcglobal.net', '0000-00-00', '', NULL, 'Not Applicable', '', 'http://www.parrotranchpottery.com/', '', ''),
(421, '30', 'Evette Lecce', 'Pensi Pasta Company', '455 Reservation Rd.', 'Marina', 'CA', 'Ê831-883-9631', 'Pensipasta@aol.com', '0000-00-00', '', NULL, 'Not Applicable', '', '', '', ''),
(422, '30', 'Geri Prevedelli-Lathrop and Sam Lathrop', 'Prevedelli Farm', '375 Pioneer View Road', 'Watsonville', 'CA', '831-724-9282', 'prev123@charter.net', '0000-00-00', '', NULL, 'Organic', '', 'http://www.prevedelli.com/', 'https://www.facebook.com/pages/Prevedelli-Farms/238689335504', ''),
(423, '30', '', 'Puildo Farms', '1281 Spring Grove Road', 'Hollister', 'CA', '', '', '0000-00-00', '', NULL, 'Conventional', '', '', '', ''),
(424, '30', 'Robert Todd', 'Rancho Padre Farm', '1789 E. Firebaugh Avenue', 'Exeter', 'CA', '559-300-5204', 'ranchopadre@verizon.net', '0000-00-00', '', NULL, 'Organic', '', '', '', ''),
(425, '30', '', 'Rodoni Farms', '', 'Davenport', 'CA', '', '', '0000-00-00', '', NULL, 'Organic', '', '', '', ''),
(426, '30', 'Jeff Larkey', 'Route 1 Farms', '849 Almar Avenue, Ste C #128', 'Santa Cruz', 'CA', '831-426-1075', 'Route1farms@cruzio.com', '0000-00-00', '', NULL, 'Organic', '', 'www.route1farms.com', 'Route1Farms', 'route1farms'),
(427, '30', '', 'Santa Rosa Flowers', '', 'Watsonville', 'CA', '', '', '0000-00-00', '', NULL, 'Conventional', '', '', '', ''),
(428, '30', 'Ronald W. and Annette Schletewitz', 'Schletewitz Family Farms', '2471 Sequoia Avenue', 'Sanger', 'CA', '559-647-7288', 'ekisbye@gmail.com', '0000-00-00', '', NULL, 'Conventional', '', 'SchletewitzFamilyFarms', '', ''),
(429, '30', 'Ty, Seth and Beau Schoch', 'Schoch Family Farmstead', '10995 Assisi Way', 'Salinas', 'CA', '831-596-8828', 'schochfamilyfarm@gmail.com', '0000-00-00', '', NULL, 'Not Applicable', '', 'http://www.schochfamilyfarm.com/', '', ''),
(430, '30', '', 'SilvaÕs Apple Orchards', '', 'Watsonville', 'CA', '', '', '0000-00-00', '', NULL, 'Organic', '', '', '', ''),
(431, '30', '', 'Stackhouse Orchards', '', 'Hickman', 'CA', '', '', '0000-00-00', '', NULL, 'Conventional', '', '', '', ''),
(432, '30', '', 'Sweet ElenaÕs Bakery', '', 'Sand City', 'CA', '', '', '0000-00-00', '', NULL, 'Not Applicable', '', '', '', ''),
(433, '30', '', 'SumanoÕs Organic Mushroom', '', 'San Juan Bautis', 'CA', '', '', '0000-00-00', '', NULL, 'Organic', '', '', '', ''),
(434, '30', '', 'T & L Coke Farm', '', 'Aromas', 'CA', '', '', '0000-00-00', '', NULL, 'Organic', '', '', '', ''),
(435, '30', '', 'The Walnut Farm', '', 'Watsonville', 'CA', '', '', '0000-00-00', '', NULL, 'Organic', '', '', '', ''),
(436, '30', '', 'Triple Delight Blueberrie', '', 'Selma', 'CA', '', '', '0000-00-00', '', NULL, 'Conventional', '', '', '', ''),
(437, '30', '', 'Three Americas', '', 'Santa Cruz', 'CA', '', '', '0000-00-00', '', NULL, 'Not Applicable', '', '', '', ''),
(438, '30', '', 'Upstarts Organic Seedling', '', 'Santa Cruz', 'CA', '', '', '0000-00-00', '', NULL, 'Organic', '', '', '', ''),
(439, '30', '', 'Valencia Creek Farms', '', 'Aptos', 'CA', '', '', '0000-00-00', '', NULL, 'Conventional', '', '', '', ''),
(440, '30', '', 'Vasquez Farm', '', 'Watsonville', 'CA', '', '', '0000-00-00', '', NULL, 'Conventional', '', '', '', ''),
(441, '30', '', 'V&V Farms', '', 'Gonzalez', 'CA', '', '', '0000-00-00', '', NULL, 'Organic', '', '', '', ''),
(442, '30', '', 'WebbÕs Farm', '', 'Soquel', 'CA', '', '', '0000-00-00', '', NULL, 'Conventional', '', '', '', ''),
(443, '30', '', 'William R. P. Welch', '', 'Carmel Valley', 'CA', '', '', '0000-00-00', '', NULL, 'Conventional', '', '', '', ''),
(444, '30', '', 'Windmill Farms', '', 'Santa Cruz', 'CA', '', '', '0000-00-00', '', NULL, 'Conventional', '', '', '', ''),
(445, '30', '', 'Zena Foods', '', 'Sacramento', 'CA', '', '', '0000-00-00', '', NULL, 'Not Applicable', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `weeks`
--

CREATE TABLE `weeks` (
  `id` int(11) UNSIGNED NOT NULL,
  `week_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `weeks`
--

INSERT INTO `weeks` (`id`, `week_name`) VALUES
(1, 'Week of 1/1'),
(2, 'Week of 1/8'),
(3, 'Week of 1/15'),
(4, 'Week of 1/22'),
(5, 'Week of 1/29'),
(6, 'Week of 2/5'),
(7, 'Week of 2/12'),
(8, 'Week of 2/19'),
(9, 'Week of 2/26'),
(10, 'Week of 3/5'),
(11, 'Week of 3/12'),
(12, 'Week of 3/19'),
(13, 'Week of 3/26'),
(14, 'Week of 4/2'),
(15, 'Week of 4/9'),
(16, 'Week of 4/16'),
(17, 'Week of 4/23'),
(18, 'Week of 4/30');

-- --------------------------------------------------------

--
-- Table structure for table `week_checkout`
--

CREATE TABLE `week_checkout` (
  `id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checked_out_market`
--
ALTER TABLE `checked_out_market`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markets`
--
ALTER TABLE `markets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markets_vendors`
--
ALTER TABLE `markets_vendors`
  ADD PRIMARY KEY (`markets_id`,`vendors_id`);

--
-- Indexes for table `market_currency`
--
ALTER TABLE `market_currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weeks`
--
ALTER TABLE `weeks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `week_checkout`
--
ALTER TABLE `week_checkout`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checked_out_market`
--
ALTER TABLE `checked_out_market`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=676;

--
-- AUTO_INCREMENT for table `markets`
--
ALTER TABLE `markets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `market_currency`
--
ALTER TABLE `market_currency`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=446;

--
-- AUTO_INCREMENT for table `weeks`
--
ALTER TABLE `weeks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `week_checkout`
--
ALTER TABLE `week_checkout`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `markets_vendors`
--
ALTER TABLE `markets_vendors`
  ADD CONSTRAINT `markets_vendors_ibfk_1` FOREIGN KEY (`markets_id`) REFERENCES `Markets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
