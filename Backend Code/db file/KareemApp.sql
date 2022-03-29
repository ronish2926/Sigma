-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2021 at 11:48 PM
-- Server version: 5.6.49-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DemoKareemApp`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `id` int(11) NOT NULL,
  `username` text,
  `password` varchar(1000) DEFAULT NULL,
  `encryption_key` varchar(1000) DEFAULT NULL,
  `encryption_text` varchar(1000) DEFAULT NULL,
  `type` text,
  `access_id` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`id`, `username`, `password`, `encryption_key`, `encryption_text`, `type`, `access_id`) VALUES
(1, 'admin', 'GUNb/kMTQa8=', 'Admin', '1234567891011121', 'admin', '0');

-- --------------------------------------------------------

--
-- Table structure for table `Captain`
--

CREATE TABLE `Captain` (
  `id` int(11) NOT NULL,
  `name` text,
  `email` text,
  `password` text,
  `phone` text,
  `picture` text,
  `place_id` text,
  `latitude` text,
  `longitude` text,
  `address` text,
  `ride_type_id` text,
  `device_token` text,
  `live` varchar(20) DEFAULT '1',
  `status` varchar(20) NOT NULL DEFAULT '1',
  `enable` varchar(20) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Captain`
--

INSERT INTO `Captain` (`id`, `name`, `email`, `password`, `phone`, `picture`, `place_id`, `latitude`, `longitude`, `address`, `ride_type_id`, `device_token`, `live`, `status`, `enable`, `date_created`) VALUES
(1, 'Michael J. Pasta', 'MichaelJPrice_abc@test.com', '12345678', '678-588-5898', '4.png', '1', NULL, NULL, NULL, '3', NULL, '0', '0', '0', '2020-01-14 03:45:33'),
(2, 'Adam L. ABC', 'AdamLGore_abc@test.com', '123456789', '818-442-6835-200056985', '4.png', '1', NULL, NULL, NULL, '3', NULL, '1', '2', '0', '2020-01-14 03:45:33'),
(3, 'Troy P. Patties', 'TroyPVidrine_bcd@test.com', '1234567', '+1 650-555-1234', '14.jpg', '1', '31.45553663934397', '73.12771942466497', 'street adrrres', '1', '', '1', '1', '0', '2020-02-01 10:50:54'),
(4, 'Adnan ABC', 'adnan_abc@gmail.com', 'jabali93', '+92123456789', '5.png', '2', '-1.2282362784650906', '36.87927894294262', 'Nairobi', '1', '66247609-0038-46ce-b93c-f3c3d9182ea5', '1', '0', '0', '2020-02-13 06:18:27'),
(5, 'Nike ABC', 'nike_abc@gmail.com', '123456789', '+92789456123', '8.jpg', '', '41.00372893241953', '28.70808340609074', 'shshshsh', '1', '85dc9a1b-b3c3-417e-ba05-60be7e7b0bbd', '1', '1', '0', '2020-02-17 05:00:14'),
(6, 'Alfredo ABC', 'alfredo_abc@gmail.com', '123456789', '+12345678945612', '13.jpg', '1', '-28.737354341330985', '32.04459518194199', '20 Anglers Rod ', '1', '5ead3716-5a32-4d94-aa65-1cb6516850f7', '1', '1', '0', '2020-02-17 20:01:07'),
(7, 'Cruise Control', 'cruise_control_abc@gmail.com', '123456', '+15698745612365', '12.jpg', '1', '1.2214444658024977', '-77.29417774826288', 'Cra. 42', '1', '82a7b8c9-8d3f-426a-a54b-2450f75d9f68', '1', '1', '0', '2020-02-19 20:51:42'),
(8, 'Oman ABc', 'oman_abc@gmail.com', 'Omar123123', '+874561236547', '11.jpg', '1', '31.258338686763363', '30.002845376729965', 'gvg', '1', '', '1', '1', '0', '2020-02-20 13:13:47'),
(9, 'Wagon ABC', 'wagon_abc@gmail.com', 'Imaz1992', '+36987456123', '10.jpg', '1', '15.39565681179939', '44.15814880281686', 'yfhf6544', '1', 'e6f914f1-7b40-4d4e-a3be-b704f6834ca9', '1', '2', '0', '2020-02-20 15:08:01'),
(10, 'Almirah ABC', 'alfredo_almirah@gmail.com', 'J000808**', '+369852147', '09.jpg', '1', '4.627787390259562', '-77.49666810035706', 'Carrera 42 #59-94', '1', '1dadb78c-a8c8-4df0-9176-92a3581b3a09', '1', '1', '0', '2020-02-24 01:50:45'),
(11, 'juan salavdor', 'mailjsalvador@gmail.com', 'coroico159', '+59176012116', '11.png', '6', '-17.821239476560066', '-63.19176111370326', 'Miguel Tejada Velasco 3810 santa cruz de la sierra bolivia', '11', '39e75c74-b66d-43ce-b547-da04cb370a04', '1', '1', '0', '2021-02-07 04:39:33'),
(12, 'SOURAV SAHA', 'sahasourav20166@gmail.com', 'saha1234', '7001865588', '12.png', '1', '25.00022218704179', '88.14334876835345', 'hagabab', '5', 'e8158204-1725-47d1-a008-111a121d9949', '1', '1', '0', '2021-02-07 06:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `CaptainBankDetail`
--

CREATE TABLE `CaptainBankDetail` (
  `id` int(11) NOT NULL,
  `captain_id` text,
  `bank_name` text,
  `account_holder_name` text,
  `account_no` text,
  `bank_no` int(11) DEFAULT NULL,
  `bank_transit_no` int(11) DEFAULT NULL,
  `iban_no` text,
  `cheque_picture` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CaptainBankDetail`
--

INSERT INTO `CaptainBankDetail` (`id`, `captain_id`, `bank_name`, `account_holder_name`, `account_no`, `bank_no`, `bank_transit_no`, `iban_no`, `cheque_picture`) VALUES
(3, '103', 'XYZ Bank', 'ABC Account Holder', '123456789', 54, NULL, 'PK02569874563277899', 'ic_american_express.webp.webp'),
(4, '1', 'XYZ Bank', 'ABC Account Holder', '123456789', 54, NULL, 'PK02569874563277899', 'ic_american_express.webp.webp'),
(5, '2', 'XYZ Bank', 'ABC Account Holder', '123456789', 54, NULL, 'PK02569874563277899', 'ic_american_express.webp.webp'),
(6, '3', 'XYZ Bank', 'ABC Account Holder', '123456789', 54, NULL, 'PK02569874563277899', 'ic_american_express.webp.webp'),
(7, '4', 'XYZ Bank', 'ABC Account Holder', '123456789', 54, NULL, 'PK02569874563277899', 'ic_american_express.webp.webp'),
(8, '5', 'XYZ Bank', 'ABC Account Holder', '123456789', 54, NULL, 'PK02569874563277899', 'ic_american_express.webp.webp'),
(9, '6', 'XYZ Bank', 'ABC Account Holder', '123456789', 54, NULL, 'PK02569874563277899', 'ic_american_express.webp.webp'),
(10, '7', 'XYZ Bank', 'ABC Account Holder', '123456789', 54, NULL, 'PK02569874563277899', 'ic_american_express.webp.webp'),
(11, '8', 'XYZ Bank', 'ABC Account Holder', '123456789', 54, NULL, 'PK02569874563277899', 'ic_american_express.webp.webp'),
(12, '9', 'XYZ Bank', 'ABC Account Holder', '123456789', 54, NULL, 'PK02569874563277899', 'ic_american_express.webp.webp'),
(13, '10', 'XYZ Bank', 'ABC Account Holder', '123456789', 54, NULL, 'PK02569874563277899', 'ic_american_express.webp.webp');

-- --------------------------------------------------------

--
-- Table structure for table `CaptainDocuments`
--

CREATE TABLE `CaptainDocuments` (
  `id` int(11) NOT NULL,
  `term_id` text,
  `document_type` text,
  `status` varchar(20) NOT NULL DEFAULT '1',
  `enable` varchar(20) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CaptainDocuments`
--

INSERT INTO `CaptainDocuments` (`id`, `term_id`, `document_type`, `status`, `enable`, `date_created`) VALUES
(1, '1', 'driving_license', '0', '0', '2021-02-03 00:01:05'),
(2, '1', 'national_identity_card', '0', '0', '2021-02-03 00:01:05'),
(3, '1', 'car_pictures', '0', '0', '2021-02-03 00:01:05'),
(4, '1', 'car_documents', '0', '0', '2021-02-03 00:01:05'),
(5, '2', 'driving_license', '2', '0', '2021-02-03 00:01:05'),
(6, '2', 'national_identity_card', '2', '0', '2021-02-03 00:01:05'),
(7, '2', 'car_pictures', '2', '0', '2021-02-03 00:01:05'),
(8, '2', 'car_documents', '2', '0', '2021-02-03 00:01:05'),
(9, '3', 'driving_license', '1', '0', '2021-02-03 00:01:05'),
(10, '3', 'national_identity_card', '1', '0', '2021-02-03 00:01:05'),
(11, '3', 'car_pictures', '1', '0', '2021-02-03 00:01:05'),
(12, '3', 'car_documents', '1', '0', '2021-02-03 00:01:05'),
(13, '4', 'driving_license', '0', '0', '2021-02-03 00:01:05'),
(14, '4', 'national_identity_card', '0', '0', '2021-02-03 00:01:05'),
(15, '4', 'car_pictures', '0', '0', '2021-02-03 00:01:05'),
(16, '4', 'car_documents', '0', '0', '2021-02-03 00:01:05'),
(17, '5', 'driving_license', '1', '0', '2021-02-03 00:01:05'),
(18, '5', 'national_identity_card', '1', '0', '2021-02-03 00:01:05'),
(19, '5', 'car_pictures', '1', '0', '2021-02-03 00:01:05'),
(20, '5', 'car_documents', '1', '0', '2021-02-03 00:01:05'),
(21, '6', 'driving_license', '1', '0', '2021-02-03 00:01:05'),
(22, '6', 'national_identity_card', '1', '0', '2021-02-03 00:01:05'),
(23, '6', 'car_pictures', '1', '0', '2021-02-03 00:01:05'),
(24, '6', 'car_documents', '1', '0', '2021-02-03 00:01:05'),
(25, '7', 'driving_license', '1', '0', '2021-02-03 00:01:05'),
(26, '7', 'national_identity_card', '1', '0', '2021-02-03 00:01:05'),
(27, '7', 'car_pictures', '1', '0', '2021-02-03 00:01:05'),
(28, '7', 'car_documents', '1', '0', '2021-02-03 00:01:05'),
(29, '8', 'driving_license', '1', '0', '2021-02-03 00:01:05'),
(30, '8', 'national_identity_card', '1', '0', '2021-02-03 00:01:05'),
(31, '8', 'car_pictures', '1', '0', '2021-02-03 00:01:05'),
(32, '8', 'car_documents', '1', '0', '2021-02-03 00:01:05'),
(33, '9', 'driving_license', '1', '0', '2021-02-03 00:01:05'),
(34, '9', 'national_identity_card', '1', '0', '2021-02-03 00:01:05'),
(35, '9', 'car_pictures', '1', '0', '2021-02-03 00:01:05'),
(36, '9', 'car_documents', '1', '0', '2021-02-03 00:01:05'),
(37, '10', 'driving_license', '1', '0', '2021-02-03 00:01:05'),
(38, '10', 'national_identity_card', '1', '0', '2021-02-03 00:01:05'),
(39, '10', 'car_pictures', '1', '0', '2021-02-03 00:01:05'),
(40, '10', 'car_documents', '1', '0', '2021-02-03 00:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `CaptainMeta`
--

CREATE TABLE `CaptainMeta` (
  `id` int(11) NOT NULL,
  `term_id` text,
  `brand_name` text,
  `car_name` text,
  `car_colour` text,
  `car_number_plate` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CaptainMeta`
--

INSERT INTO `CaptainMeta` (`id`, `term_id`, `brand_name`, `car_name`, `car_colour`, `car_number_plate`) VALUES
(1, '1', 'Toyota', 'Altis', 'White', 'FOP 123'),
(2, '3', 'Toyota', 'Corolla', 'Black', 'DOP 123'),
(3, '4', 'Toyota', 'Corolla', 'White', 'DOP 123'),
(4, '5', 'nissan', 'mazda', 'black', 'kck2rreh'),
(5, '6', 'ajjdn', 'jahahasb', 'hasbsbsb', 'hsbsbsb'),
(6, '7', 'Toyota', 'Corrolla', 'Blue', '123 NRB'),
(7, '8', 'Renault', 'Megane', 'Azul', 'AAA123'),
(8, '9', 'frial', 'mrcudus', 'red', '56858'),
(9, '10', 'ggg654t', 'ggh', 'gchjvg', 'ghhv778'),
(10, '11', 'Toyota', 'TY', 'Red', 'ABC123'),
(11, '12', 'toyota', 'vios', 'balck', 'd 123 z'),
(12, '13', 'Toyota', 'jypsum', 'white', '62783839282gp'),
(13, '14', 'Tata', 'tata', 'white', 'qwerty'),
(14, '15', 'Honda', 'Accord', 'Abu abu', 'S1445ZN'),
(15, '16', 'Toyota', 'ist', 'blue', 't123cmr'),
(16, '17', 'volkswagen', 'golf 4', 'red', 'ab 34 tre'),
(17, '18', '1234', 'moto', 'negro', 'qwqe12'),
(18, '19', '12335', '1234466', 'blue', '12455'),
(19, '20', 'Toyota', ' Toyota Camry', 'Blue', 'JHY 523 HG'),
(20, '21', 'yhog', 'negri', 'hhdjd', 'w72727272'),
(21, '22', 'bmw', 'alaa', 'belack', '3727'),
(22, '23', 'honda', 'gli', 'black', 'gty6677'),
(23, '24', 'jdhd', 'bend', 'hshs', 'hdhd'),
(24, '25', 'T', 'C', 'O', '123'),
(25, '26', 'Toyota', 'coral', 'ted', '1234'),
(26, '27', 'toy', 'adan', 'blue', '000000'),
(27, '28', 'bmw', 'barnz', 'red', '21824jh'),
(28, '29', 'honda', 'brv', 'black', 'F4563EW'),
(29, '30', 'Toyota', 'rush', 'white', 'AD1234'),
(30, '31', 'ford', 'focus', 'black', '12345678'),
(31, '32', 'toyota', 'camry', 'black', 'bak 5152'),
(32, '33', 'Ã Â¸Â¡Ã Â¸Â´Ã Â¸â€¢Ã Â¸â€¹Ã Â¸Â¹', 'Ã Â¸â€Ã Â¸Â³', 'Ã Â¸â„¢Ã Â¹â€°Ã Â¸Â³Ã Â¹â‚¬Ã Â¸â€¡Ã Â¸Â´Ã Â¸â„¢', '987'),
(33, '34', 'Honda', 'Honda', 'red', '2457378'),
(34, '35', 'Toyota', 'Corolla', 'White', 'FSA 123'),
(35, '36', 'chevro', 'sail', 'black', '776642999'),
(36, '37', 'Volkswagen', 'Golf', 'Blue', 'Aaaa'),
(37, '38', 'toyota', 'terios', 'plateado', 'bbj47p'),
(38, '39', 'Peugeout', '406', 'pink', '123asa07'),
(39, '40', 'Toyota', 'Corolla', 'Pearl White', 'XYZ-678'),
(40, '41', 'golf', 'vw', 'red', '830j'),
(41, '42', 'chevrolet', 'musteng', 'red', 'C45C565'),
(42, '43', 'toyota', 'toyota', 'gray', 'a1270'),
(43, '44', 'TOYOTA ', 'PRIUS', 'WHITE', 'NC 1234'),
(44, '45', 'fg', 'vbb', 'gvb', 'fg22'),
(45, '46', 'corola', 'Gli', 'white', 'gg123'),
(46, '47', 'Toyota', 'Corolla', 'White', 'FDE 230'),
(47, '48', 'Toyota', 'huwei', 'nlur', 'R123'),
(48, '49', 'standard', 'auto', 'black', 'usd456'),
(49, '50', 'mini', 'cooper', 'black', '123'),
(50, '51', 'mazda', 'AAA123', 'Blue', '12344'),
(51, '52', 'hjjhhh', 'bvhhhh', 'vhhhh', 'vvbhgh'),
(52, '53', 'bav', 'bac', 'hav', 'gava'),
(53, '54', 'tttfd', 'hssgsg', 'blu', 'sjsjshvsabbsbs'),
(54, '55', 'suv', 'venza', 'blue', '672962'),
(55, '56', 'uytry', 'ghffg', 'black', '3455'),
(56, '57', 'Proton', 'wira', 'Gold', 'www01'),
(57, '58', 'honda', 'activa', 'red', 'ap16ck8889'),
(58, '59', 'toyota', 'avanza', 'merah', 'Z 1234 KK'),
(59, '60', 'Toyota', 'Camry', 'Red', '456-45-FDs'),
(60, '61', 'nissan', 'nidsan audi', 'ref', 'ghng755h'),
(61, '62', 'toyota', 'corolla', 'red', '12345'),
(62, '63', 'mazda', '444', 'green', 't55tf'),
(63, '64', 'Toyota', 'corolla', 'blue', 'GRA123ED'),
(64, '65', '666667777788888', '77776655567899', 'red', 'y639563'),
(65, '66', 'hhh', 'gvg', 'hbh', 'vbg'),
(66, '67', 'mahindra', 'bolero', 'red', '7070'),
(67, '68', 'toyota', 'prius', 'black', 'abc1234'),
(68, '69', 'q', 'q', 'q', 'q'),
(69, '70', 'Toyota', 'Car', 'Yellow', 'ibd476'),
(70, '71', 'cjjd', 'ysuudud', 'hrhd', '938383jd'),
(71, '72', 'kia', 'picanto', 'grise', '232410909'),
(72, '73', 'Kia', 'Kia', 'red', '281'),
(73, '74', 'Allex', 'Allex', 'Grey', 'UBE 123C'),
(74, '75', 'aaa', 'aaa', 'aaa', 'aaa123'),
(75, '76', 'Toyota', 'GLI', 'Red', '5567'),
(76, '77', 't', 'tt', 't', 't'),
(77, '78', 'suzuki', 'gixure', 'blue', 'ta45678'),
(78, '79', 'Mazda', 'MZ10', 'Red', 'H12383839394'),
(79, '80', 'white', 'var', 'white', 'q8uru'),
(80, '81', 'Asd', 'asd', 'red', '2245'),
(81, '82', 'nissan', '007', 'red', '876'),
(82, '83', 'toyota', 'avanza', 'merah', 'ag128de'),
(83, '84', 'honda', 'civic', 'blk', 'tl457'),
(84, '85', 'gjj', 'ghh', 'ghh', 'hhhcv'),
(85, '86', 'test', 'test', 'white', 'Th124445'),
(86, '87', 'sedan', 'sedan buol', 'black', 'bm 5249 zg'),
(87, '88', 'kia', 'picanto', 'gris', 'aabn643'),
(88, '89', 'toyota', 'corolla', 'red', 'ds123'),
(89, '90', 'Toyota ', 'Premio', 'White', 'CAB-5128'),
(90, '91', 'toyota', 'nissan', 'green', '929r73bdi'),
(91, '92', 'kia', 'seltos', 'black', 'uk06en6788'),
(92, '93', 'jfjfkfk', 'bfbfj', 'yfyfjdu', 'h637748484'),
(93, '94', 'Hyundai', 'sonata', 'White', '60K170XA'),
(94, '95', 'brand', 'car nam', 'blue', '000000-789'),
(95, '96', 'hhbh', 'gggf', 'gggg', 'tggg'),
(96, '97', 'dacia', 'logan', 'red', 'T381OB'),
(97, '98', 'Fiat', 'Gol', 'Preto', 'abc1234'),
(98, '99', 'Toyota', 'Nze', 'white', 'kcs'),
(99, '100', 'toyota', 'corola', 'branco', '6662coc'),
(100, '101', 'oikkd', 'jjzjzuz', 'jsjkzoz', 'jdjsjzkzl'),
(101, '102', 'aju', 'yup', 'blanco', 'gdjjr6373'),
(102, '103', 'Toyota', 'Altis Grandee', 'White`', 'FDA 123'),
(103, '11', 'toyota', 'toyota', 'red', '45mxl'),
(104, '12', 'new', 'new', 'gagaba', 'hahahab');

-- --------------------------------------------------------

--
-- Table structure for table `Configuration`
--

CREATE TABLE `Configuration` (
  `id` int(11) NOT NULL,
  `country_id` text,
  `currency_name` text,
  `currency_symbol` text,
  `enable` varchar(20) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Configuration`
--

INSERT INTO `Configuration` (`id`, `country_id`, `currency_name`, `currency_symbol`, `enable`, `date_created`) VALUES
(1, '1', 'Pakistan Rupee', 'Pkr', '0', '2020-01-13 06:35:51'),
(2, '2', 'COD', '$', '0', '2020-01-13 06:35:51'),
(4, '3', 'Usd Dollar', '$', '0', '2020-01-13 06:35:51'),
(5, '5', 'Pound', 'Gbp', '0', '2020-01-13 06:35:51'),
(6, '7', 'T', 't', '0', '2020-02-13 00:41:15'),
(7, '8', 'TES', 'P', '0', '2020-03-07 23:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `Country`
--

CREATE TABLE `Country` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `percentage` text,
  `enable` varchar(20) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Country`
--

INSERT INTO `Country` (`id`, `name`, `percentage`, `enable`, `date_created`) VALUES
(1, 'Pakistan', '20', '0', '2020-01-13 04:00:22'),
(2, 'Colombia', '20', '0', '2020-01-13 04:00:22'),
(3, 'United States America', '20', '0', '2020-01-13 04:00:43'),
(5, 'England', '25', '0', '2020-02-06 07:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `Coupon`
--

CREATE TABLE `Coupon` (
  `id` int(11) NOT NULL,
  `place_id` text,
  `coupon_code` text NOT NULL,
  `coupon_reward` text NOT NULL,
  `coupon_limit` text,
  `coupon_from_date` datetime NOT NULL,
  `coupon_to_date` datetime NOT NULL,
  `coupon_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `enable` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Coupon`
--

INSERT INTO `Coupon` (`id`, `place_id`, `coupon_code`, `coupon_reward`, `coupon_limit`, `coupon_from_date`, `coupon_to_date`, `coupon_date_created`, `enable`) VALUES
(2, '1', 'ISB12', '45', '20', '2019-10-10 00:00:00', '2019-12-24 00:00:00', '2019-10-13 03:30:57', 0),
(3, '1', 'FSD14', '25', '40', '2019-10-10 00:00:00', '2019-12-26 00:00:00', '2019-10-13 03:30:57', 0),
(7, '1', 'PIZZA20', '20', '50', '2019-12-10 18:00:00', '2019-12-31 05:00:00', '2019-12-19 08:13:38', 0),
(8, '1', 'FSD10', '35', '25', '2020-01-23 00:00:00', '2020-02-24 00:00:00', '2020-02-08 05:34:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `DocumentDetail`
--

CREATE TABLE `DocumentDetail` (
  `id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `registration_no` text,
  `date_of_issue` text,
  `date_of_expiry` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DocumentDetail`
--

INSERT INTO `DocumentDetail` (`id`, `term_id`, `registration_no`, `date_of_issue`, `date_of_expiry`) VALUES
(1, 35, '123-456789-05', '03/02/2021', '03/05/2029'),
(2, 36, '33000-123456789-5', '03/02/2021', '03/06/2029'),
(3, 1, '123-456789-05', '03/02/2021', '03/05/2029'),
(4, 2, '33000-123456789-5', '03/02/2021', '03/06/2029'),
(5, 5, '123-456789-05', '03/02/2021', '03/05/2029'),
(6, 6, '33000-123456789-5', '03/02/2021', '03/06/2029'),
(7, 9, '123-456789-05', '03/02/2021', '03/05/2029'),
(8, 10, '33000-123456789-5', '03/02/2021', '03/06/2029'),
(9, 13, '123-456789-05', '03/02/2021', '03/05/2029'),
(10, 14, '33000-123456789-5', '03/02/2021', '03/06/2029'),
(11, 17, '123-456789-05', '03/02/2021', '03/05/2029'),
(12, 18, '33000-123456789-5', '03/02/2021', '03/06/2029'),
(13, 21, '123-456789-05', '03/02/2021', '03/05/2029'),
(14, 22, '33000-123456789-5', '03/02/2021', '03/06/2029'),
(15, 25, '123-456789-05', '03/02/2021', '03/05/2029'),
(16, 26, '33000-123456789-5', '03/02/2021', '03/06/2029'),
(17, 29, '123-456789-05', '03/02/2021', '03/05/2029'),
(18, 30, '33000-123456789-5', '03/02/2021', '03/06/2029'),
(19, 33, '123-456789-05', '03/02/2021', '03/05/2029'),
(20, 34, '33000-123456789-5', '03/02/2021', '03/06/2029'),
(21, 37, '123-456789-05', '03/02/2021', '03/05/2029'),
(22, 38, '33000-123456789-5', '03/02/2021', '03/06/2029');

-- --------------------------------------------------------

--
-- Table structure for table `DocumentPicture`
--

CREATE TABLE `DocumentPicture` (
  `id` int(11) NOT NULL,
  `term_id` text,
  `picture_url` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DocumentPicture`
--

INSERT INTO `DocumentPicture` (`id`, `term_id`, `picture_url`) VALUES
(1, '4', '01.webp.webp'),
(2, '4', '02.webp.webp'),
(3, '4', '03.webp.webp'),
(4, '3', '10.webp.webp'),
(5, '3', '11.webp.webp'),
(6, '3', '13.webp.webp'),
(7, '2', '20190823030952_423.png.webp.webp'),
(8, '2', '20190722224922_455.jpg.webp.webp'),
(9, '1', 'brands_1.png.webp'),
(10, '1', 'deals_1.png.webp'),
(11, '8', '01.webp.webp'),
(12, '8', '02.webp.webp'),
(13, '8', '03.webp.webp'),
(14, '7', '10.webp.webp'),
(15, '7', '11.webp.webp'),
(16, '7', '13.webp.webp'),
(17, '6', '20190823030952_423.png.webp.webp'),
(18, '6', '20190722224922_455.jpg.webp.webp'),
(19, '5', 'brands_1.png.webp'),
(20, '5', 'deals_1.png.webp'),
(21, '12', '01.webp.webp'),
(22, '12', '02.webp.webp'),
(23, '12', '03.webp.webp'),
(24, '11', '10.webp.webp'),
(25, '11', '11.webp.webp'),
(26, '11', '13.webp.webp'),
(27, '10', '20190823030952_423.png.webp.webp'),
(28, '10', '20190722224922_455.jpg.webp.webp'),
(29, '9', 'brands_1.png.webp'),
(30, '9', 'deals_1.png.webp'),
(31, '16', '01.webp.webp'),
(32, '16', '02.webp.webp'),
(33, '16', '03.webp.webp'),
(34, '15', '10.webp.webp'),
(35, '15', '11.webp.webp'),
(36, '15', '13.webp.webp'),
(37, '14', '20190823030952_423.png.webp.webp'),
(38, '14', '20190722224922_455.jpg.webp.webp'),
(39, '13', 'brands_1.png.webp'),
(40, '13', 'deals_1.png.webp'),
(41, '20', '01.webp.webp'),
(42, '20', '02.webp.webp'),
(43, '20', '03.webp.webp'),
(44, '19', '10.webp.webp'),
(45, '19', '11.webp.webp'),
(46, '19', '13.webp.webp'),
(47, '18', '20190823030952_423.png.webp.webp'),
(48, '18', '20190722224922_455.jpg.webp.webp'),
(49, '17', 'brands_1.png.webp'),
(50, '17', 'deals_1.png.webp'),
(51, '24', '01.webp.webp'),
(52, '24', '02.webp.webp'),
(53, '24', '03.webp.webp'),
(54, '23', '10.webp.webp'),
(55, '23', '11.webp.webp'),
(56, '23', '13.webp.webp'),
(57, '22', '20190823030952_423.png.webp.webp'),
(58, '22', '20190722224922_455.jpg.webp.webp'),
(59, '21', 'brands_1.png.webp'),
(60, '21', 'deals_1.png.webp'),
(61, '28', '01.webp.webp'),
(62, '28', '02.webp.webp'),
(63, '28', '03.webp.webp'),
(64, '27', '10.webp.webp'),
(65, '27', '11.webp.webp'),
(66, '27', '13.webp.webp'),
(67, '26', '20190823030952_423.png.webp.webp'),
(68, '26', '20190722224922_455.jpg.webp.webp'),
(69, '25', 'brands_1.png.webp'),
(70, '25', 'deals_1.png.webp'),
(71, '32', '01.webp.webp'),
(72, '32', '02.webp.webp'),
(73, '32', '03.webp.webp'),
(74, '31', '10.webp.webp'),
(75, '31', '11.webp.webp'),
(76, '31', '13.webp.webp'),
(77, '30', '20190823030952_423.png.webp.webp'),
(78, '30', '20190722224922_455.jpg.webp.webp'),
(79, '29', 'brands_1.png.webp'),
(80, '29', 'deals_1.png.webp'),
(81, '36', '01.webp.webp'),
(82, '36', '02.webp.webp'),
(83, '36', '03.webp.webp'),
(84, '35', '10.webp.webp'),
(85, '35', '11.webp.webp'),
(86, '35', '13.webp.webp'),
(87, '34', '20190823030952_423.png.webp.webp'),
(88, '34', '20190722224922_455.jpg.webp.webp'),
(89, '33', 'brands_1.png.webp'),
(90, '33', 'deals_1.png.webp'),
(91, '40', '01.webp.webp'),
(92, '40', '02.webp.webp'),
(93, '40', '03.webp.webp'),
(94, '39', '10.webp.webp'),
(95, '39', '11.webp.webp'),
(96, '39', '13.webp.webp'),
(97, '38', '20190823030952_423.png.webp.webp'),
(98, '38', '20190722224922_455.jpg.webp.webp'),
(99, '37', 'brands_1.png.webp'),
(100, '37', 'deals_1.png.webp');

-- --------------------------------------------------------

--
-- Table structure for table `Location`
--

CREATE TABLE `Location` (
  `id` int(11) NOT NULL,
  `country_id` text,
  `name` text,
  `latitude` varchar(30) DEFAULT '0.58',
  `longitude` varchar(30) DEFAULT '0.58',
  `enable` varchar(20) DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Location`
--

INSERT INTO `Location` (`id`, `country_id`, `name`, `latitude`, `longitude`, `enable`, `date_created`) VALUES
(1, '1', 'Faisalabad', '31.4234953', '72.9492158', '0', '2020-01-13 04:03:36'),
(2, '1', 'Lahore', '31.4826352', '74.0541915', '0', '2020-01-13 04:03:36'),
(6, '2', 'MedellÃƒÂ­n', '6.244203', '-75.5812119', '0', '2020-05-31 02:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `PaymentMethod`
--

CREATE TABLE `PaymentMethod` (
  `id` int(11) NOT NULL,
  `name` text,
  `picture` text,
  `tag` text,
  `enable` varchar(20) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PaymentMethod`
--

INSERT INTO `PaymentMethod` (`id`, `name`, `picture`, `tag`, `enable`, `date_created`) VALUES
(1, 'Cash', 'ic_cash.png', 'cash', '0', '2020-01-01 00:00:00'),
(2, 'Credit/Debit Cards', 'ic_card.png', 'card', '0', '2020-01-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `PaymentRequest`
--

CREATE TABLE `PaymentRequest` (
  `id` int(11) NOT NULL,
  `captain_id` text,
  `total_rides` text,
  `total_earning` text,
  `status` int(11) DEFAULT '0' COMMENT ' 0 = pending , 1 = sent',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PaymentRequest`
--

INSERT INTO `PaymentRequest` (`id`, `captain_id`, `total_rides`, `total_earning`, `status`, `date_created`) VALUES
(35, '85', '33', 'Pkr  3323.2', 0, '2021-02-03 00:57:15'),
(34, '84', '13', 'Pkr  1019.2', 0, '2021-02-03 00:57:15'),
(33, '82', '7', 'Pkr  297.6', 0, '2021-02-03 00:57:15'),
(32, '81', '15', ', 1356', 0, '2021-02-03 00:57:15'),
(30, '1', '7', 'Pkr  2647', 0, '2021-02-03 00:57:15'),
(31, '2', '115', 'Pkr  19780', 0, '2021-02-03 00:57:15'),
(29, '0', '9', 'Pkr  816', 0, '2021-02-03 00:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `PaymentType`
--

CREATE TABLE `PaymentType` (
  `id` int(11) NOT NULL,
  `country_id` text,
  `payment_method_id` text,
  `enable` varchar(10) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PaymentType`
--

INSERT INTO `PaymentType` (`id`, `country_id`, `payment_method_id`, `enable`, `date_created`) VALUES
(1, '1', '1', '0', '2020-01-13 05:03:39'),
(2, '1', '2', '0', '2020-01-13 05:03:39'),
(4, '2', '1', '0', '2020-05-31 02:21:30'),
(5, '2', '2', '0', '2020-05-31 02:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `PaymentTypeMeta`
--

CREATE TABLE `PaymentTypeMeta` (
  `id` int(11) NOT NULL,
  `term_id` text,
  `meta_key` text,
  `meta_value` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Policy`
--

CREATE TABLE `Policy` (
  `id` int(11) NOT NULL,
  `title` text,
  `description` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Policy`
--

INSERT INTO `Policy` (`id`, `title`, `description`) VALUES
(1, 'Privacy Policy', '<p id=\"docs-internal-guid-5a035dfd-7fff-eb5a-2d36-cf177b7467cc\" dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: #000000; background-color: transparent; font-weight: bold; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">We are committed to protecting your privacy</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;\"><em><span style=\"font-size: 11pt; font-family: Arial; color: #000000; background-color: transparent; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">We collect the minimum amount of information about you that is commensurate with providing you with a satisfactory service. This policy indicates the type of processes that may result in data being collected about you. Your use of this website gives us the right to collect that information. </span></em></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: #000000; background-color: transparent; font-weight: bold; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Information Collected</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">We may collect any or all of the information that you give us depending on the type of transaction you enter into, including your name, address, telephone number, and email address, together with data about your use of the website. Other information that may be needed from time to time to process a request may also be collected as indicated on the website.&rsquo;</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">We use </span><span style=\"font-size: 11pt; font-family: Arial; color: #000000; background-color: transparent; font-weight: bold; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Location Permissions</span></p>\r\n<ul style=\"margin-top: 0pt; margin-bottom: 0pt;\">\r\n<li dir=\"ltr\" style=\"list-style-type: disc; font-size: 11pt; font-family: Arial; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre;\">\r\n<p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Location Access (For accessing Weather forecasting of specific location)</span></p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: #000000; background-color: transparent; font-weight: bold; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Information Use</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">We use the information collected primarily to process the task for which you visited the website. Data collected in the UK is held in accordance with the Data Protection Act. All reasonable precautions are taken to prevent unauthorised access to this information. This safeguard may require you to provide additional forms of identity should you wish to obtain information about your account details.</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: #000000; background-color: transparent; font-weight: bold; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Cookies</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Your Internet browser has the in-built facility for storing small files - \"cookies\" - that hold information which allows a website to recognise your account. Our website takes advantage of this facility to enhance your experience. You have the ability to prevent your computer from accepting cookies but, if you do, certain functionality on the website may be impaired.</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: #000000; background-color: transparent; font-weight: bold; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Disclosing Information</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">We do not disclose any personal information obtained about you from this website to third parties unless you permit us to do so by ticking the relevant boxes in registration or competition forms. We may also use the information to keep in contact with you and inform you of developments associated with us. You will be given the opportunity to remove yourself from any mailing list or similar device. If at any time in the future we should wish to disclose information collected on this website to any third party, it would only be with your knowledge and consent. </span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">We may from time to time provide information of a general nature to third parties - for example, the number of individuals visiting our website or completing a registration form, but we will not use any information that could identify those individuals. </span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">In addition Dummy may work with third parties for the purpose of delivering targeted behavioural advertising to the Dummy website. Through the use of cookies, anonymous information about your use of our websites and other websites will be used to provide more relevant adverts about goods and services of interest to you. For more information on online behavioural advertising and about how to turn this feature off, please visit youronlinechoices.com/opt-out.</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: #000000; background-color: transparent; font-weight: bold; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Changes to this Policy</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Any changes to our Privacy Policy will be placed here and will supersede this version of our policy. We will take reasonable steps to draw your attention to any changes in our policy. However, to be on the safe side, we suggest that you read this document each time you use the website to ensure that it still meets with your approval.</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: #000000; background-color: transparent; font-weight: bold; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">Contacting Us</span></p>\r\n<p dir=\"ltr\" style=\"line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: #000000; background-color: transparent; font-weight: 400; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\">If you have any questions about our Privacy Policy, or if you want to know what information we have collected about you, please email us at yourEmail@gmail.com. You can also correct any factual errors in that information or require us to remove your details form any list under our control.</span></p>\r\n<p><br /><br /><br /><br /><br /></p>');

-- --------------------------------------------------------

--
-- Table structure for table `Rating`
--

CREATE TABLE `Rating` (
  `id` int(11) NOT NULL,
  `captain_id` text,
  `order_id` text,
  `rating` text,
  `review` text,
  `enable` varchar(20) DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Rating`
--

INSERT INTO `Rating` (`id`, `captain_id`, `order_id`, `rating`, `review`, `enable`, `date_created`) VALUES
(1, '1', '16', '5', 'good', '0', '2020-01-20 09:11:46'),
(2, '1', '17', '5', 'fantastic', '0', '2020-02-02 04:01:38'),
(3, '47', '233', '5', '', '0', '2020-09-10 01:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `Report`
--

CREATE TABLE `Report` (
  `id` int(11) NOT NULL,
  `order_id` text,
  `captain_id` text,
  `report` text,
  `enable` varchar(10) DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Report`
--

INSERT INTO `Report` (`id`, `order_id`, `captain_id`, `report`, `enable`, `date_created`) VALUES
(1, '27', '1', 'only for testing purposes', '0', '2020-02-04 04:12:54'),
(3, '24', '1', 'Good', '0', '2020-02-04 04:17:20'),
(4, '24', '1', 'hfgnnk\n', '0', '2020-02-14 09:50:10'),
(5, '24', '1', 'rude driver', '0', '2020-02-14 10:22:17'),
(6, '17', '1', 'rude', '0', '2020-02-14 10:22:28'),
(7, '17', '1', 'rude', '0', '2020-02-14 10:22:45'),
(8, '24', '1', 'test', '0', '2020-03-09 02:45:33'),
(9, '27', '1', '', '0', '2020-04-11 09:21:10'),
(10, '47', '', '', '0', '2020-04-23 13:18:48'),
(11, '136', '', '', '0', '2020-06-19 02:11:49'),
(12, '27', '1', 'It was an exciting ride.', '0', '2020-07-02 05:52:55'),
(13, '24', '1', '', '0', '2020-07-10 15:38:09'),
(14, '27', '1', '', '0', '2020-07-13 23:54:31'),
(15, '24', '1', '', '0', '2020-07-16 23:41:03'),
(16, '24', '1', '', '0', '2020-09-06 19:11:43'),
(17, '27', '1', '', '0', '2020-10-07 22:17:46'),
(18, '27', '1', '', '0', '2020-10-07 22:25:19'),
(19, '27', '1', '', '0', '2020-11-10 12:10:41'),
(20, '21', '1', 'nMKsld\n', '0', '2020-11-25 12:52:28'),
(21, '27', '1', '', '0', '2020-12-17 03:30:20'),
(22, '27', '1', '', '0', '2020-12-21 07:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `RideCategory`
--

CREATE TABLE `RideCategory` (
  `id` int(11) NOT NULL,
  `name` text,
  `enable` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RideCategory`
--

INSERT INTO `RideCategory` (`id`, `name`, `enable`) VALUES
(1, 'Standard', '0'),
(2, 'Premium', '0'),
(3, 'Budget', '0'),
(4, 'Pooling', '0');

-- --------------------------------------------------------

--
-- Table structure for table `RideOrder`
--

CREATE TABLE `RideOrder` (
  `id` int(11) NOT NULL,
  `ride_type_id` text,
  `user_id` text,
  `captain_id` text,
  `from_latitude` text,
  `from_address_name` text,
  `from_address` text,
  `from_longitude` text,
  `to_address_name` text,
  `to_address` text,
  `to_latitude` text,
  `to_longitude` text,
  `distance` text,
  `price` text,
  `trip_time` text,
  `payment` text,
  `company_percentage` text,
  `customer_payment_id` text,
  `status` varchar(20) NOT NULL DEFAULT '0',
  `enable` varchar(20) NOT NULL DEFAULT '0',
  `schedule_date_created` datetime DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RideOrder`
--

INSERT INTO `RideOrder` (`id`, `ride_type_id`, `user_id`, `captain_id`, `from_latitude`, `from_address_name`, `from_address`, `from_longitude`, `to_address_name`, `to_address`, `to_latitude`, `to_longitude`, `distance`, `price`, `trip_time`, `payment`, `company_percentage`, `customer_payment_id`, `status`, `enable`, `schedule_date_created`, `date_created`) VALUES
(24, '3', '1', '1', '31.45554521951613', NULL, 'Behind Lucky one mall, Indus-Area, FB Indus-Area Block 21 Block 21 Gulberg Town, Karachi, Karachi City, Sindh, Pakistan', '73.12773048877716', NULL, 'Paradise Bakery, Sweets & Nimco, Block 1/1 Metrovil Colony, Karachi, Pakistan', '31.455987955333452', '73.12797859311104', '1.1875 km', 'PKR  202', '5 min', '1', '20', 'cus_GbKLzgOixkaBty', '4', '0', '0000-00-00 00:00:00', '2020-02-04 03:58:48'),
(16, '2', '2', '1', '31.455540357418673', NULL, 'Plot A 80, Block 4A Block 4 A Gulshan-e-Iqbal, Karachi, Karachi City, Sindh, Pakistan', '73.12772244215012', NULL, 'Plot C 84, Block 4 Gulshan-e-Iqbal, Karachi, Karachi City, Sindh, Pakistan', '31.45439832953347', '73.12708474695681', '0.3476 km', 'PKR 52', '1 min', '1', '20', '', '4', '0', NULL, '2020-02-04 22:44:32'),
(18, '2', '3', '1', '31.455538355378458', NULL, 'Ayesha Textile Processing Ind', '73.12772110104561', NULL, 'Imtiaz Super Market - FSD, Lahore - Sheikhupura - Faisalabad Road, near Ashrafabad, Faisalabad, Pakistan', '31.453765674984496', '73.12716990709305', '0.3948 km', 'PKR 59', '1 min', '1', '20', '', '4', '0', NULL, '2020-01-24 04:08:49'),
(17, '3', '4', '1', '31.45553663934397', NULL, 'P-83, Millat Chowk, Tahir Rd, Hajjiabad, Faisalabad, Punjab, Pakistan', '73.12771875411272', NULL, '39h Raja Rd, Gulistan Colony Gulshan Colony, Faisalabad, Punjab, Pakistan', '31.45372277330069', '73.12731273472309', '0.3886 km', 'PKR 58', '1 min', '1', '20', '', '4', '0', NULL, '2020-01-24 04:00:14'),
(20, '1', '5', '1', '31.45553549532094', NULL, 'Al-Fatah Shopping Centre, Abbottabad-Mansehra Rd, Supply Bazar, Jhangi Syedan Abbottabad, Khyber Pakhtunkhwa, Pakistan', '73.12771707773207', NULL, 'Punjab Industries Rd, Malikpur, Faisalabad, Punjab, PakistanParadise Bakery, Sweets & Nimco, Block 1/1 Metrovil Colony, Karachi, Pakistan', '31.452810392839464', '73.12842316925526', '0.5737 km', 'PKR 86', '2 min', '1', '20', '', '4', '0', '0000-00-00 00:00:00', '2020-01-24 09:32:52'),
(21, '2', '6', '1', '31.45554007141292', NULL, 'CITY COTTAGES, Block 4A Block 4 A Gulshan-e-Iqbal, Karachi, Pakistan', '73.12772277742624', NULL, 'Paradise Bakery, Sweets & Nimco, Block 1/1 Metrovil Colony, Karachi, Pakistan', '31.4542307279759', '73.12719404697418', '0.3543 km', 'PKR 53', '1 min', '1', '20', '', '4', '0', '0000-00-00 00:00:00', '2020-01-24 09:40:31'),
(22, '3', '7', '1', '31.45553663934397', NULL, 'Raja Rd, Gulshan Colony, Faisalabad, Punjab, Pakistan', '73.12771875411272', NULL, '4 Millat Rd, Ashrafabad, Faisalabad, Punjab, Pakistan', '31.45365041241617', '73.12713973224163', '0.4058 km', 'PKR 61', '1 min', '1', '20', '', '4', '0', '2020-01-24 10:50:00', '2020-01-24 09:41:42'),
(23, '3', '8', '1', '31.4555357813267', NULL, 'H 33G, Gulistan Colony 1, Faisalabad, Punjab, Pakistan', '73.12771774828434', NULL, 'Millat Chowk, Ashrafabad, Faisalabad, Punjab, Pakistan', '31.454447523107767', '73.12746964395048', '0.3184 km', 'PKR 48', '1 min', '1', '20', '', '4', '0', '2020-01-25 09:45:00', '2020-01-24 09:45:42'),
(25, '3', '1', '1', '31.45554521951613', NULL, '265, Block H Gulistan Colony 1, Faisalabad, Punjab, Pakistan', '73.12773048877716', NULL, 'Raja Rd, Gulshan Colony, Faisalabad, Punjab, Pakistan', '31.455987955333452', '73.12797859311104', '1.1875 km', 'PKR 202', '5 min', '1', '20', 'cus_GbKLzgOixkaBty', '2', '0', '0000-00-00 00:00:00', '2020-02-04 03:58:48'),
(26, '2', '2', '1', '31.455540357418673', NULL, 'ASHAR AUTOS', '73.12772244215012', NULL, 'Raja Rd, Gulshan Colony, Faisalabad, Punjab, Pakistan', '31.45439832953347', '73.12708474695681', '0.3476 km', 'PKR 52', '1 min', '1', '20', '', '2', '0', NULL, '2020-02-04 22:44:32'),
(27, '2', '3', '1', '31.455538355378458', NULL, 'Millat Chowk, Faisalabad, Punjab, Pakistan', '73.12772110104561', NULL, 'Raja Rd, Gulshan Colony, Faisalabad, Punjab, Pakistan', '31.453765674984496', '73.12716990709305', '0.3948 km', 'PKR 59', '1 min', '1', '20', '', '2', '0', NULL, '2020-01-24 04:08:49'),
(28, '3', '4', '1', '31.45553663934397', NULL, 'Raghad Fabrics', '73.12771875411272', NULL, '1 Lahore - Sheikhupura - Faisalabad Rd, Mana Wala, Faisalabad, Punjab 38000, Pakistan', '31.45372277330069', '73.12731273472309', '0.3886 km', 'PKR 58', '1 min', '1', '20', '', '2', '0', NULL, '2020-01-24 04:00:14'),
(29, '1', '5', '1', '31.45553549532094', NULL, 'The Sitara Engineers', '73.12771707773207', NULL, 'Malikpur Road, Malikpur, Faisalabad, Punjab, Pakistan', '31.452810392839464', '73.12842316925526', '0.5737 km', 'PKR 86', '2 min', '1', '20', '', '2', '0', '0000-00-00 00:00:00', '2020-01-24 09:32:52'),
(30, '2', '6', '1', '31.45554007141292', NULL, 'Pak Safety Tex', '73.12772277742624', NULL, '1 Lahore - Sheikhupura - Faisalabad Rd, Mana Wala, Faisalabad, Punjab 38000, Pakistan', '31.4542307279759', '73.12719404697418', '0.3543 km', 'PKR 53', '1 min', '1', '20', '', '2', '0', '0000-00-00 00:00:00', '2020-01-24 09:40:31'),
(31, '3', '7', '1', '31.45553663934397', NULL, 'Khawaja Cotton Industries', '73.12771875411272', NULL, 'Raja Rd, Gulshan Colony, Faisalabad, Punjab, Pakistan', '31.45365041241617', '73.12713973224163', '0.4058 km', 'PKR 61', '1 min', '1', '20', '', '2', '0', '2020-01-24 10:50:00', '2020-01-24 09:41:42'),
(32, '3', '8', '1', '31.4555357813267', NULL, 'Millat Chowk, Ashrafabad, Faisalabad, Punjab, Pakistan', '73.12771774828434', NULL, 'Millat Rd, Noorpur, Faisalabad, Punjab, Pakistan', '31.454447523107767', '73.12746964395048', '0.3184 km', 'PKR 48', '1 min', '1', '20', '', '2', '0', '2020-01-25 09:45:00', '2020-01-24 09:45:42'),
(33, '2', '2', '1', '31.455540357418673', NULL, 'Dar-ul-Islam Rd, Gulshan Colony, Faisalabad, Punjab, Pakistan', '73.12772244215012', NULL, 'Imtiaz Shaheed Road, Faisalabad, Pakistan', '31.45439832953347', '73.12708474695681', '0.3476 km', 'PKR 52', '1 min', '1', '20', '', '1', '0', NULL, '2020-02-04 22:44:32'),
(34, '2', '2', '1', '31.455540357418673', NULL, 'Plot C 84, Block 4 Gulshan-e-Iqbal, Karachi, Karachi City, Sindh, Pakistan\r\n', '73.12772244215012', NULL, 'Plot A 80, Block 4A Block 4 A Gulshan-e-Iqbal, Karachi, Karachi City, Sindh, Pakistan', '31.45439832953347', '73.12708474695681', '0.3476 km', 'PKR 52', '1 min', '1', '20', '', '4', '0', NULL, '2020-02-04 22:44:32'),
(35, '3', '4', '1', '31.45553663934397', NULL, '39h Raja Rd, Gulistan Colony Gulshan Colony, Faisalabad, Punjab, Pakistan', '73.12771875411272', NULL, 'P-83, Millat Chowk, Tahir Rd, Hajjiabad, Faisalabad, Punjab, Pakistan', '31.45372277330069', '73.12731273472309', '0.3886 km', 'PKR 58', '1 min', '1', '20', '', '4', '0', NULL, '2020-01-24 04:00:14'),
(36, '2', '3', '1', '31.455538355378458', NULL, 'Imtiaz Super Market - FSD, Lahore - Sheikhupura - Faisalabad Road, near Ashrafabad, Faisalabad, Pakistan', '73.12772110104561', NULL, 'Ayesha Textile Processing Ind', '31.453765674984496', '73.12716990709305', '0.3948 km', 'PKR 59', '1 min', '1', '20', '', '4', '0', NULL, '2020-01-24 04:08:49'),
(37, '1', '5', '1', '31.45553549532094', NULL, 'Punjab Industries Rd, Malikpur, Faisalabad, Punjab, PakistanParadise Bakery, Sweets & Nimco, Block 1/1 Metrovil Colony, Karachi, Pakistan', '73.12771707773207', NULL, 'Al-Fatah Shopping Centre, Abbottabad-Mansehra Rd, Supply Bazar, Jhangi Syedan Abbottabad, Khyber Pakhtunkhwa, Pakistan', '31.452810392839464', '73.12842316925526', '0.5737 km', 'PKR 86', '2 min', '1', '20', '', '4', '0', '0000-00-00 00:00:00', '2020-01-24 09:32:52'),
(38, '2', '6', '1', '31.45554007141292', NULL, 'Paradise Bakery, Sweets & Nimco, Block 1/1 Metrovil Colony, Karachi, Pakistan', '73.12772277742624', NULL, 'CITY COTTAGES, Block 4A Block 4 A Gulshan-e-Iqbal, Karachi, Pakistan', '31.4542307279759', '73.12719404697418', '0.3543 km', 'PKR 53', '1 min', '1', '20', '', '4', '0', '0000-00-00 00:00:00', '2020-01-24 09:40:31'),
(39, '3', '7', '1', '31.45553663934397', NULL, '4 Millat Rd, Ashrafabad, Faisalabad, Punjab, Pakistan', '73.12771875411272', NULL, 'Raja Rd, Gulshan Colony, Faisalabad, Punjab, Pakistan', '31.45365041241617', '73.12713973224163', '0.4058 km', 'PKR 61', '1 min', '1', '20', '', '4', '0', '2020-01-24 10:50:00', '2020-01-24 09:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `RideType`
--

CREATE TABLE `RideType` (
  `id` int(11) NOT NULL,
  `place_id` text,
  `ride_category` int(11) NOT NULL,
  `name` text,
  `tagline` text,
  `tag` text,
  `picture` text,
  `enable` varchar(20) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RideType`
--

INSERT INTO `RideType` (`id`, `place_id`, `ride_category`, `name`, `tagline`, `tag`, `picture`, `enable`, `date_created`) VALUES
(1, '1', 3, 'Bike', 'Low cost ride along with good quality', 'bike', 'ic_scooter_resize_01.png', '0', '2020-01-13 03:26:21'),
(2, '1', 3, 'Rickshaw', 'Amazing & Awesome Ride in Economical Price', 'rickshaw', 'ic_rickshaw_resize_01.png', '0', '2020-01-13 03:26:21'),
(3, '1', 1, 'GO', 'Very Comfortable Ride in Economical Price', 'go', 'ic_car_01_resize_02.png', '0', '2020-01-13 03:27:17'),
(4, '1', 3, 'Delivery', 'Order any food from anywhere', 'delivery', 'ic_delivery_boy_resize_02.png', '0', '2020-01-13 03:27:17'),
(5, '1', 2, 'Business', 'Good Caption & Amazing Car', 'business', 'ic_car_02_resize_02.png', '0', '2020-01-13 03:28:00'),
(11, '6', 1, 'Testing', 'For testing purpose', 'test', 'ic_car_04.png', '0', '2020-05-31 02:21:05');

-- --------------------------------------------------------

--
-- Table structure for table `RideTypeMeta`
--

CREATE TABLE `RideTypeMeta` (
  `id` int(11) NOT NULL,
  `term_id` text,
  `price` text,
  `distance_condition` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RideTypeMeta`
--

INSERT INTO `RideTypeMeta` (`id`, `term_id`, `price`, `distance_condition`, `date_created`) VALUES
(1, '1', '69', '2', '2020-01-13 03:30:11'),
(2, '3', '150', '1', '2020-01-13 03:30:11'),
(3, '2', '50', '1', '2020-01-13 03:30:11'),
(4, '4', '150', '1', '2020-01-13 03:30:11'),
(5, '5', '80', '1', '2020-01-13 03:30:11'),
(6, '9', '25', '5', '2020-02-13 00:12:57'),
(7, '10', '25', '1', '2020-03-03 10:08:02'),
(8, '11', '200', '2', '2020-05-31 02:21:05'),
(9, '12', '105', '1', '2020-10-12 00:36:36');

-- --------------------------------------------------------

--
-- Table structure for table `RideTypeWaitingCharges`
--

CREATE TABLE `RideTypeWaitingCharges` (
  `id` int(11) NOT NULL,
  `term_id` text,
  `price` text,
  `time_condition` text,
  `initial_charges` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RideTypeWaitingCharges`
--

INSERT INTO `RideTypeWaitingCharges` (`id`, `term_id`, `price`, `time_condition`, `initial_charges`, `date_created`) VALUES
(1, '5', '2', '1', '50', '2020-10-11 23:31:13'),
(2, '1', '2', '1', '50', '2020-10-11 23:31:13'),
(3, '2', '2', '1', '60', '2020-10-11 23:31:13'),
(4, '3', '2', '1', '60', '2020-10-11 23:31:13'),
(5, '4', '2', '1', '60', '2020-10-11 23:31:13'),
(6, '6', '2', '1', '60', '2020-10-11 23:31:13'),
(7, '7', '2', '1', '60', '2020-10-11 23:31:13'),
(8, '8', '2', '1', '60', '2020-10-11 23:31:13'),
(9, '12', '2', '8', '60', '2020-10-12 00:36:36');

-- --------------------------------------------------------

--
-- Table structure for table `Tracking`
--

CREATE TABLE `Tracking` (
  `id` int(11) NOT NULL,
  `term_id` varchar(1000) DEFAULT NULL,
  `latitude` text,
  `longitude` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Tracking`
--

INSERT INTO `Tracking` (`id`, `term_id`, `latitude`, `longitude`) VALUES
(13630, '1', '31.4554286', '73.1278214'),
(13403, '2', '31.951993', '-6.5798401'),
(4, '3', '100', '1000'),
(13402, '4', '23.5665833', '87.2937195'),
(12289, '47', '31.4555805', '73.1279745'),
(13594, '85', '31.4562178', '73.1297483');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `first_name` text,
  `last_name` text,
  `email` text,
  `phone` text,
  `password` text,
  `profile_picture` text,
  `login_type` text,
  `device_token` text,
  `uid` text,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `enable` varchar(25) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `profile_picture`, `login_type`, `device_token`, `uid`, `date_created`, `enable`) VALUES
(1, 'Zeeshan', 'Bean', 'zeeshan_bean@gmail.com', '+92326789456123', 'mrbean', 'pexels-julia-m-cameron-4144450.jpg', 'native', 'aa6ff9bc-1b39-4d40-8680-44aef7a03c84', NULL, '2020-02-15 16:13:10', '0'),
(2, 'Adnan', 'Adi', 'adnan_adi@gmail.com', '+923338974569', 'rata123456', 'pexels-cottonbro-4842658.jpg', 'native', 'd6f7121f-b926-4d29-9d08-8145535cbb91', NULL, '2020-02-14 23:16:11', '0'),
(3, 'Tanzeel', 'bou', 'tanzeel_tt@gmail.com', '+92356789456', 'moad123', 'pexels-julia-m-cameron-4144102 (1).jpg', 'native', '5d2caa8e-56bc-4dda-8225-3aa6677aec6c', NULL, '2020-02-14 06:20:29', '0'),
(4, 'Abdullah', 'Jutt', 'abdullah_jutt@gmail.com', '+923568974569', '123456', 'pexels-spencer-selover-428333.jpg', 'native', '880f7f60-3389-4bba-93aa-85485e7baf9d', NULL, '2020-02-13 22:02:04', '0'),
(5, 'Mahmood', 'Asif', 'mahmood_asif@gmail.com', '+92356897', 'cuda1261', 'pexels-myicahel-tamburini-1553783.jpg', 'native', 'ddace421-77aa-4ac5-805b-222846d6e981', NULL, '2020-02-13 17:51:53', '0'),
(6, 'Baber', 'dfgy', 'baber_ok@gmail.com', '+92333123457894', '123456', 'pexels-julia-m-cameron-4145198.jpg', 'native', 'bb45bbb4-e845-46ae-990f-585a92c01b33', NULL, '2020-02-13 13:32:59', '0'),
(7, 'Shandar', 'Oeb', 'shandar_oeb@gmail.com', '+92333123457894', '123456789', 'pexels-chloe-kala-1043474.jpg', 'native', '57739f3b-3e08-48ed-afa7-21570ee9e13a', NULL, '2020-02-13 12:40:47', '0'),
(8, 'Sohail', 'mangal', 'sohail_mangal@gmail.com', '+92333123457894', '123456789', 'pexels-nitin-khajotia-1516680.jpg', 'native', '2c4f0961-eec9-44df-b549-96fff6fe3c22', NULL, '2020-02-12 14:10:17', '0'),
(9, 'Feroze', 'lname', 'feroze_lname@gmail.com', '+92333123456987', '123456789', 'pexels-andrea-piacquadio-874158.jpg', 'native', 'c9449ded-7fe1-41a3-b035-ff3884d90c43', NULL, '2020-02-12 01:57:09', '0'),
(10, 'Shahrukh', 'lname', 'shahrukh_lname@gmail.com', '+92333123456789', '123456789', 'pexels-chloe-kala-1043473.jpg', 'native', 'dhdhdhd-koirhr-5698-gkour', NULL, '2020-01-13 21:30:14', '0'),
(11, 'juan ', 'salvador', 'mailjsalvador@gmail.com', '+59176012116', 'coroico159', NULL, 'native', '39e75c74-b66d-43ce-b547-da04cb370a04', NULL, '2021-02-07 00:53:12', '0'),
(12, 'marcos', 'Leoni', 'pillssolucoesinteligentes@gmail.com', '+5564992884756', '123456', NULL, 'native', 'b4ead366-665a-4832-b2e6-962050168cce', NULL, '2021-02-07 16:30:18', '0');

-- --------------------------------------------------------

--
-- Table structure for table `UserMeta`
--

CREATE TABLE `UserMeta` (
  `id` int(11) NOT NULL,
  `term_id` text NOT NULL,
  `meta_key` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `UserPayment`
--

CREATE TABLE `UserPayment` (
  `id` int(11) NOT NULL,
  `user_id` text,
  `company_name` text,
  `card_title` text,
  `card_number` varchar(200) DEFAULT NULL,
  `expiry_month` text,
  `expiry_year` text,
  `payment_type` text,
  `customer_no` text,
  `enable` varchar(20) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserPayment`
--

INSERT INTO `UserPayment` (`id`, `user_id`, `company_name`, `card_title`, `card_number`, `expiry_month`, `expiry_year`, `payment_type`, `customer_no`, `enable`, `date_created`) VALUES
(1, '1', 'Visa Credit Card', 'Alex Smith', '4949494949494949', '08', '21', '2', 'customer_01', '0', '2020-01-13 21:23:00'),
(2, '1', 'Visa Credit Card', 'Alex Smith', '5959595959595959', '10', '22', '2', 'customer_01', '0', '2020-01-13 21:23:00'),
(11, '1', 'Visa', ' ', '4242424242424242', '06', '22', '2', 'cus_GbKLzgOixkaBty', '0', '2020-01-23 08:34:17'),
(12, '', 'Visa', '', '4111111111111111', '08', '25', '2', 'cus_H24x2D8Ya4liFK', '0', '2020-04-03 18:28:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Captain`
--
ALTER TABLE `Captain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CaptainBankDetail`
--
ALTER TABLE `CaptainBankDetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CaptainDocuments`
--
ALTER TABLE `CaptainDocuments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CaptainMeta`
--
ALTER TABLE `CaptainMeta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Configuration`
--
ALTER TABLE `Configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Country`
--
ALTER TABLE `Country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Coupon`
--
ALTER TABLE `Coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DocumentDetail`
--
ALTER TABLE `DocumentDetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DocumentPicture`
--
ALTER TABLE `DocumentPicture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Location`
--
ALTER TABLE `Location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `PaymentMethod`
--
ALTER TABLE `PaymentMethod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `PaymentRequest`
--
ALTER TABLE `PaymentRequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `PaymentType`
--
ALTER TABLE `PaymentType`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `PaymentTypeMeta`
--
ALTER TABLE `PaymentTypeMeta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Policy`
--
ALTER TABLE `Policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Rating`
--
ALTER TABLE `Rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Report`
--
ALTER TABLE `Report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `RideCategory`
--
ALTER TABLE `RideCategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `RideOrder`
--
ALTER TABLE `RideOrder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `RideType`
--
ALTER TABLE `RideType`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `RideTypeMeta`
--
ALTER TABLE `RideTypeMeta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `RideTypeWaitingCharges`
--
ALTER TABLE `RideTypeWaitingCharges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Tracking`
--
ALTER TABLE `Tracking`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `term_id` (`term_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `UserMeta`
--
ALTER TABLE `UserMeta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `UserPayment`
--
ALTER TABLE `UserPayment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `card_number` (`card_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Captain`
--
ALTER TABLE `Captain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `CaptainBankDetail`
--
ALTER TABLE `CaptainBankDetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `CaptainDocuments`
--
ALTER TABLE `CaptainDocuments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `CaptainMeta`
--
ALTER TABLE `CaptainMeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `Configuration`
--
ALTER TABLE `Configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Country`
--
ALTER TABLE `Country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Coupon`
--
ALTER TABLE `Coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `DocumentDetail`
--
ALTER TABLE `DocumentDetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `DocumentPicture`
--
ALTER TABLE `DocumentPicture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `Location`
--
ALTER TABLE `Location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `PaymentMethod`
--
ALTER TABLE `PaymentMethod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `PaymentRequest`
--
ALTER TABLE `PaymentRequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `PaymentType`
--
ALTER TABLE `PaymentType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `PaymentTypeMeta`
--
ALTER TABLE `PaymentTypeMeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Policy`
--
ALTER TABLE `Policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Rating`
--
ALTER TABLE `Rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Report`
--
ALTER TABLE `Report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `RideCategory`
--
ALTER TABLE `RideCategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `RideOrder`
--
ALTER TABLE `RideOrder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `RideType`
--
ALTER TABLE `RideType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `RideTypeMeta`
--
ALTER TABLE `RideTypeMeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `RideTypeWaitingCharges`
--
ALTER TABLE `RideTypeWaitingCharges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Tracking`
--
ALTER TABLE `Tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13631;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `UserMeta`
--
ALTER TABLE `UserMeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `UserPayment`
--
ALTER TABLE `UserPayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
