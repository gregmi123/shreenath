-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 26, 2021 at 11:28 AM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.2.34-23+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shreenath_suppliers`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int NOT NULL,
  `fk_organization_id` int NOT NULL,
  `fk_province` int NOT NULL,
  `fk_district` int NOT NULL,
  `fk_municipal` int NOT NULL,
  `fk_ward` int NOT NULL,
  `tol` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_520_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `fax` varchar(20) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `created_date` varchar(20) COLLATE utf8_unicode_520_ci NOT NULL,
  `updated_date` varchar(20) COLLATE utf8_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `fk_organization_id`, `fk_province`, `fk_district`, `fk_municipal`, `fk_ward`, `tol`, `phone`, `email`, `fax`, `created_date`, `updated_date`) VALUES
(1, 1, 6, 80, 638, 2, 'Airee chowk', '9876543210', 'test@gmail.com', '123453', '2021-11-19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int NOT NULL,
  `brand` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`) VALUES
(1, 'Vespa'),
(2, 'APrillia');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int NOT NULL,
  `color` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color`) VALUES
(1, 'Red'),
(2, 'Blue'),
(3, 'Brown'),
(4, 'White');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int NOT NULL,
  `district` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `district_nepali` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `fk_province` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `district`, `district_nepali`, `fk_province`) VALUES
(1, 'Jhapa', 'झापा ', 1),
(2, 'Morang', 'मोरंग', 1),
(3, 'Ilam', 'इलाम', 1),
(4, 'Sunsari', 'सुनसरी', 1),
(5, 'Dhankuta', 'धनकुटा', 1),
(6, 'Pachthar', 'पांचथर', 1),
(7, 'Teharthum', 'तेह्रथुम', 1),
(8, 'Taplejung', 'ताप्लेजुंग', 1),
(9, 'Bhojpur', 'भोजपुर', 1),
(10, 'Sankhuwasabha', 'संखुवासभा', 1),
(11, 'Khotang', 'खोटाँग', 1),
(12, 'Udaipur', 'उदयपुर', 1),
(13, 'Okhaldhunga', 'ओखलढुंगा', 1),
(14, 'Solukhumbu', 'सोलुखुम्बू', 1),
(15, 'Parsa', 'पर्सा', 2),
(16, 'Bara', 'बारा', 2),
(17, 'Rautahat', 'रौतहट ', 2),
(18, 'Sarlahi', 'सर्लाही', 2),
(19, 'Mahottari', 'महोत्तरी', 2),
(20, 'Dhanusa', 'धनुषा ', 2),
(21, 'Siraha', 'सिराहा', 2),
(22, 'Saptari', 'सप्तरी', 2),
(37, 'Rasuwa', 'रसुवा ', 3),
(38, 'Chitwan', 'चितवन', 3),
(39, 'Makwanpur', 'मकवानपुर', 3),
(40, 'Sindhuli', 'सिन्दुली', 3),
(41, 'Dhading', 'धादिङ', 3),
(42, 'Nuwakot', ' नुवाकोट', 3),
(43, 'Lalitpur', 'ललितपुर', 3),
(44, 'Bhaktapur', 'भक्तपुर', 3),
(45, 'Kathmandu', 'काठमाडौँ', 3),
(46, 'Kabhre', 'काभ्रे', 3),
(47, 'Ramechhap', 'रामेछाप', 3),
(48, 'Dolakha', 'धोलाखा', 3),
(49, 'Sindhupalchok', 'सिन्धुपाल्चोक', 3),
(50, 'Manang', 'मनाङ', 4),
(51, 'Mustang', 'मुस्ताङ ', 4),
(52, 'Gorkha', 'गोर्खा', 4),
(53, 'Lamjung', 'लमजुङ', 4),
(54, 'Kaski', 'कास्की', 4),
(55, 'Tanahu', 'तनहु', 4),
(56, 'Nawalparasi East', ' नवलपरासी ', 4),
(57, 'Syanja', 'स्याङग्जा', 4),
(58, 'Parbat', 'पर्वत', 4),
(59, 'Baglung ', 'बागलुङ', 4),
(60, 'Myagdi', 'म्याग्दी ', 4),
(61, 'Bardiya', '	बर्दिया', 5),
(62, 'Banke', 'बाँके', 5),
(63, 'Dang', 'दाङ', 5),
(64, 'Rolpa', 'रोल्पा ', 5),
(65, 'Rukum East', 'पश्चिमी रूकुम ', 5),
(67, 'Pyuthan', 'प्युठान', 5),
(68, 'Gulmi', 'गुल्मी', 5),
(69, 'Arghakhanchi', 'अर्घाखाँची', 5),
(70, 'Kapilbastu', 'कपिलवस्तु ', 5),
(71, 'Palpa', 'पाल्पा', 5),
(72, 'Rupendehi', 'रुपन्देही', 5),
(73, 'Nawalparasi', 'नवलपरासी', 5),
(74, 'Humla', 'हुम्ला', 6),
(75, 'Kalikot', 'कालिकोट', 6),
(76, 'Mugu', 'मुगु', 6),
(77, 'Jumla', 'जुम्ला', 6),
(78, 'Dolpa', 'डोल्पा', 6),
(79, 'Dailekh', 'दैलेख', 6),
(80, 'Surkhet', 'सुर्खेत', 6),
(81, 'Salyan', 'सल्यान', 6),
(82, 'Rukum West', 'पश्चिमी रूकुम', 6),
(83, 'Jajarkot', '	जाजरकोट', 6),
(84, 'Darchula', 'दार्चुला', 7),
(85, 'Baitadi', 'बैतडी', 7),
(86, 'Bajhang', 'बझाङ', 7),
(87, 'Bajura', 'बाजुरा', 7),
(88, 'Dadeldhura', 'डडेलधुरा ', 7),
(89, 'Doti', 'डोटी', 7),
(90, 'Achham', 'अछाम', 7),
(91, 'Kanchanpur', 'कंचनपुर', 7),
(92, 'Kailali', 'कैलाली', 7);

-- --------------------------------------------------------

--
-- Table structure for table `emp_details`
--

CREATE TABLE `emp_details` (
  `id` int NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_520_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `photo` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL,
  `contract_letter` varchar(250) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `fk_branch_id` int NOT NULL,
  `fk_organization_id` int NOT NULL,
  `fk_user_id` int NOT NULL,
  `created_date` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL,
  `updated_date` varchar(20) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `fk_province` int NOT NULL,
  `fk_district` int NOT NULL,
  `fk_municipal` int NOT NULL,
  `fk_ward` int NOT NULL,
  `tol` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL,
  `emp_code` varchar(20) COLLATE utf8_unicode_520_ci NOT NULL,
  `gender` int NOT NULL,
  `blood_group` varchar(250) COLLATE utf8_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `emp_details`
--

INSERT INTO `emp_details` (`id`, `name`, `phone`, `email`, `photo`, `contract_letter`, `fk_branch_id`, `fk_organization_id`, `fk_user_id`, `created_date`, `updated_date`, `fk_province`, `fk_district`, `fk_municipal`, `fk_ward`, `tol`, `emp_code`, `gender`, `blood_group`) VALUES
(1, 'Hiramani Pun', '09876654321', 'punhiramani8@gmail.com', 'images/619b75a0e56a7.png', NULL, 1, 1, 1, '2021-11-22', NULL, 6, 76, 607, 2, 'tol', 'EMP1', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emp_post`
--

CREATE TABLE `emp_post` (
  `id` int NOT NULL,
  `post` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL,
  `fk_organization_id` int NOT NULL,
  `fk_user_id` int NOT NULL,
  `created_date` varchar(20) COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `emp_post`
--

INSERT INTO `emp_post` (`id`, `post`, `fk_organization_id`, `fk_user_id`, `created_date`) VALUES
(1, 'Manager', 1, 1, '2021-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int NOT NULL,
  `customer_name` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL,
  `address` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL,
  `contact_no` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_520_ci NOT NULL,
  `target_time` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL,
  `finance_type` int NOT NULL,
  `urgency` int NOT NULL,
  `remarks` text COLLATE utf8_unicode_520_ci,
  `fk_brand` int NOT NULL,
  `fk_model` int NOT NULL,
  `fk_color` int NOT NULL,
  `fk_user_id` int NOT NULL,
  `fk_organization_id` int NOT NULL,
  `fk_branch_id` int DEFAULT NULL,
  `created_date` varchar(20) COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `customer_name`, `address`, `contact_no`, `email`, `target_time`, `finance_type`, `urgency`, `remarks`, `fk_brand`, `fk_model`, `fk_color`, `fk_user_id`, `fk_organization_id`, `fk_branch_id`, `created_date`) VALUES
(1, 'Hiramani Pun', 'Surkhet 9', '9816513419', 'punhiramani8@gmail.com', '2078-08-10', 2, 1, 'Needed urgently', 1, 2, 2, 2, 1, 1, '2078-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int NOT NULL,
  `model` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL,
  `fk_brand` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `model`, `fk_brand`) VALUES
(1, '13/123', 2),
(2, '13/123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `municipals`
--

CREATE TABLE `municipals` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `municipal_nepali` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `fk_district` int NOT NULL,
  `fk_province` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `municipals`
--

INSERT INTO `municipals` (`id`, `name`, `municipal_nepali`, `fk_district`, `fk_province`) VALUES
(15, 'Damak Municipality', 'दमक नगरपालिका', 1, 1),
(16, 'Kamal', 'कमल गाउँपालिका', 1, 1),
(17, 'Gauradhaha', 'गौरादह नगरपालिका', 1, 1),
(18, 'Shivasataxi', 'शिवशताक्षी नगरपालिका', 1, 1),
(19, 'Kankai', '	कन्काई नगरपालिका', 1, 1),
(20, 'Jhapa', '	झापा गाउँपालिका', 1, 1),
(21, 'Barhadashi', 'बाह्रदशी गाउँपालिका', 1, 1),
(22, 'Birtamod', 'विर्तामोड नगरपालिका', 1, 1),
(23, 'Haldibari', '	हल्दिवारी गाउँपालिका', 1, 1),
(24, 'Bhadrapur', '	भद्रपुर नगरपालिका', 1, 1),
(25, 'Kachankawal', '	कचनकवल गाउँपालिका', 1, 1),
(26, 'Arjundhara', '	अर्जुनधारा नगरपालिका', 1, 1),
(27, 'Mechinagar', '	मेचीनगर नगरपालिका', 1, 1),
(28, 'Buddhashanti', '	बुद्धशान्ति गाउँपालिका', 1, 1),
(29, 'kerabari', 'केरावारी गाउँपालिका', 2, 1),
(30, 'Letang Municipality', '	लेटाङ नगरपालिका', 2, 1),
(31, 'Miklajung', 'मिक्लाजुङ गाउँपालिका', 2, 1),
(32, 'Sundarharaicha', 'सुन्दरहरैचा नगरपालिका', 2, 1),
(33, 'Belbari', 'बेलवारी नगरपालिका', 2, 1),
(34, 'Kanepokhari', 'कानेपोखरी गाउँपालिका', 2, 1),
(35, 'Pataharishanishchare', 'पथरी शनिश्चरे नगरपालिका', 2, 1),
(36, 'Budhiganga', 'बुढीगंगा गाउँपालिका', 2, 1),
(37, 'Katahari', 'कटहरी गाउँपालिका', 2, 1),
(38, 'Rangeli Municipality', 'रंगेली नगरपालिका', 2, 1),
(39, 'Biratnagar', 'विराटनगर महानगरपालिका', 2, 1),
(40, 'Jahada', 'जहदा गाउँपालिका', 2, 1),
(41, 'Dhanpalthan', 'धनपालथान गाउँपालिका', 2, 1),
(42, 'Sunwarshi', 'सुनवर्षि नगरपालिका', 2, 1),
(43, 'RAtuwamai', 'रतुवामाई नगरपालिका', 2, 1),
(44, 'Urlabari', '	उर्लावारी नगरपालिका', 2, 1),
(45, 'Gramthan', 'ग्रामथान गाउँपालिका', 2, 1),
(46, 'Sandakpur', 'सन्दकपुर गाउँपालिका', 3, 1),
(47, 'Fakphokthum', 'फाकफोकथुम गाउँपालिका', 3, 1),
(48, 'Deumai', 'देउमाई नगरपालिका', 3, 1),
(49, 'Ilam', 'ईलाम नगरपालिका', 3, 1),
(50, 'Maijogmai', 'माईजोगमाई गाउँपालिका', 3, 1),
(51, 'Suryodaya', '	सूर्योदय नगरपालिका', 3, 1),
(52, 'Rong', 'रोङ गाउँपालिका', 3, 1),
(53, 'Mai', 'माई नगरपालिका', 3, 1),
(54, 'Chulachuli', 'चुलाचुली गाउँपालिका', 3, 1),
(55, 'Mangsebung', '	माङसेबुङ गाउँपालिका', 3, 1),
(56, 'Barahchhetra', 'बराहक्षेत्र नगरपालिका', 4, 1),
(57, 'Dharan', 'धरान उपमहानगरपालिका', 4, 1),
(58, 'Ramdhuni', 'रामधुनी नगरपालिका', 4, 1),
(59, 'Itahari', 'ईटहरी उपमहानगरपालिका', 4, 1),
(60, 'Inaruwa', 'ईनरुवा नगरपालिका', 4, 1),
(61, 'Gadhi', 'गढी गाउँपालिका', 4, 1),
(62, 'Duhabi', 'दुहवी नगरपालिका', 4, 1),
(63, 'Barju', 'बर्जु गाउँपालिका', 4, 1),
(64, 'Dewanganj', 'देवानगञ्ज गाउँपालिका', 4, 1),
(65, 'Harinagar', '	हरिनगर गाउँपालिका', 4, 1),
(66, 'Koshi', 'कोशी गाउँपालिका', 4, 1),
(67, 'Bhokraha Nursing', 'भोक्राहा नरसिंह गाउँपालिका', 4, 1),
(68, 'Mahalaxmi', 'महालक्ष्मी नगरपालिका', 5, 1),
(69, 'Pakhribas', 'पाख्रिबास नगरपालिका', 5, 1),
(70, 'Shahidbhumi', 'सहिदभूमि गाउँपालिका', 5, 1),
(71, 'Sangurigadhi', 'साँगुरीगढी गाउँपालिका', 5, 1),
(72, 'Chaubise', 'चौविसे गाउँपालिका', 5, 1),
(73, 'Dhankuta', '	धनकुटा नगरपालिका', 5, 1),
(74, 'Chhathar Jorpati', '	छथर जोरपाटी गाउँपालिका', 5, 1),
(75, 'Miklajung', 'मिक्लाजुङ गाउँपालिका', 6, 1),
(76, 'Tumbewa', 'तुम्बेवा गाउँपालिका', 6, 1),
(77, 'Kummayak', 'कुम्मायक गाउँपालिका', 6, 1),
(78, 'Falgunanda', '	फाल्गुनन्द गाउँपालिका', 6, 1),
(79, 'Falelung', 'फालेलुङ गाउँपालिका', 6, 1),
(80, 'Yangwarak', 'याङवरक गाउँपालिका', 6, 1),
(81, 'Phidim', 'फिदिम नगरपालिका', 6, 1),
(82, 'Hilihang', '	हिलिहाङ गाउँपालिका', 6, 1),
(83, 'Menchayam', 'मेन्छयायेम गाउँपालिका', 7, 1),
(84, 'Athrai', 'आठराई गाउँपालिका', 7, 1),
(85, 'Phedap', 'फेदाप गाउँपालिका', 7, 1),
(86, 'Myanglum', '	म्याङलुङ नगरपालिका', 7, 1),
(87, 'Laligurans', 'लालीगुराँस नगरपालिका', 7, 1),
(88, 'Chhathar', '	छथर गाउँपालिका', 7, 1),
(89, 'Phaktanglung', 'फक्ताङलुङ गाउँपालिका', 8, 1),
(90, 'Mikwakhola', '	मैवाखोला गाउँपालिका', 8, 1),
(91, 'Meringden', 'मेरिङदेन गाउँपालिका', 8, 1),
(92, 'Maiwakhola', '	मिक्वाखोला गाउँपालिका', 8, 1),
(93, 'Phunling', 'फुङलिङ नगरपालिका', 8, 1),
(94, 'Sirijangha', 'सिरीजङ्घा गाउँपालिका', 8, 1),
(95, 'Sidingba', '	सिदिङ्वा गाउँपालिका', 8, 1),
(96, 'Athrai Tribeni', '	आठराई त्रिवेणी गाउँपालिका', 8, 1),
(97, 'Pathibhara Yangwarak', 'पाथीभरा याङवरक गाउँपालिका', 8, 1),
(98, 'Salpasilichho', 'साल्पासिलिछो गाउँपालिका', 9, 1),
(99, 'Shadananda', '	षडानन्द नगरपालिका', 9, 1),
(100, 'Bhojpur', 'भोजपुर नगरपालिका', 9, 1),
(101, 'Temkemaiyum', '	टेम्केमैयुङ गाउँपालिका', 9, 1),
(102, 'Arun', 'अरुण गाउँपालिका', 9, 1),
(103, 'Pauwadungma', 'पौवादुङमा गाउँपालिका', 9, 1),
(104, 'Ramprasad Rai', 'रामप्रसाद राई गाउँपालिका', 9, 1),
(105, 'Hatuwagadhi', 'हतुवागढी गाउँपालिका', 9, 1),
(106, 'Aamchowk', 'आमचोक गाउँपालिका', 9, 1),
(107, 'Bhotkhola', 'भोटखोला गाउँपालिका', 10, 1),
(108, 'Makalu', 'मकालु गाउँपालिका', 10, 1),
(109, 'Silichong', 'सिलीचोङ गाउँपालिका', 10, 1),
(110, 'Chichila', 'चिचिला गाउँपालिका', 10, 1),
(111, 'Khandabari', 'खाँदवारी नगरपालिका', 10, 1),
(112, 'Sabhapokhari', 'सभापोखरी गाउँपालिका', 10, 1),
(113, 'Panchakhapan', 'पाँचखपन नगरपालिका', 10, 1),
(114, 'Chainpur', '	चैनपुर नगरपालिका', 10, 1),
(115, 'Madi', 'मादी नगरपालिका', 10, 1),
(116, 'Dharmadevi', 'धर्मदेवी नगरपालिका', 10, 1),
(117, 'Ainselukhark', 'ऐसेलुखर्क गाउँपालिका', 11, 1),
(118, 'Kepilasagadhi', 'केपिलासगढी गाउँपालिका', 11, 1),
(119, 'Rawa Besi', 'रावा बेसी गाउँपालिका', 11, 1),
(120, 'Doktel Rupkot Majhuwagadi', 'दिक्तेल रुपाकोट मझुवागढी नगरपालिका', 11, 1),
(121, 'Sakela', 'साकेला गाउँपालिका', 11, 1),
(122, 'Halesi Tuwachung', 'हलेसी तुवाचुङ नगरपालिका', 11, 1),
(123, 'Diprung Chuichumma', 'दिप्रुङ चुइचुम्मा गाउँपालिका', 11, 1),
(124, 'Khotehang', 'खोटेहाङ गाउँपालिका', 11, 1),
(125, 'Jantedhunga', 'जन्तेढुंगा गाउँपालिका', 11, 1),
(126, 'Barahpokhari', '	वराहपोखरी गाउँपालिका', 11, 1),
(127, 'Katari', 'कटारी नगरपालिका', 12, 1),
(128, 'Tapil', '	ताप्ली गाउँपालिका', 12, 1),
(129, 'Limchungbung', '	लिम्चुङ्बुङ गाउँपालिका', 12, 1),
(130, 'Udayapurgadhi', 'उदयपुरगढी गाउँपालिका', 12, 1),
(131, 'Rautamai', 'रौतामाई गाउँपालिका', 12, 1),
(132, 'Triyuga', '	त्रियुगा नगरपालिका', 12, 1),
(133, 'Chaudandigadhi', 'चौदण्डीगढी नगरपालिका', 12, 1),
(134, 'baleka', 'वेलका नगरपालिका', 12, 1),
(135, 'Khijidemba', 'खिजिदेम्बा गाउँपालिका', 13, 1),
(136, 'Likhu', '	लिखु गाउँपालिका', 13, 1),
(137, 'Molung', 'मोलुङ गाउँपालिका', 13, 1),
(138, 'Champadevi', 'चम्पादेवी गाउँपालिका', 13, 1),
(139, 'Sunkoshi', '	सुनकोशी गाउँपालिका', 13, 1),
(140, 'Siddhicharan', 'सिद्दिचरण नगरपालिका', 13, 1),
(141, 'Manebhanjyang', 'मानेभञ्याङ गाउँपालिका', 13, 1),
(142, 'Khumbupasanglahmu', 'खुम्वु पासाङल्हमु गाउँपालिका', 14, 1),
(143, 'Mahakulung', 'माहाकुलुङ गाउँपालिका', 14, 1),
(144, 'Likhupike', 'लिखु पिके गाउँपालिका', 14, 1),
(145, 'SoluDudhakunda', 'सोलुदुधकुण्ड नगरपालिका', 14, 1),
(146, 'Mapya Dudhakoshi', 'माप्य दुधकोशी गाउँपालिका', 14, 1),
(147, 'Sotang', 'सोताङ गाउँपालिका', 14, 1),
(148, 'NechaSalyan', 'नेचासल्यान गाउँपालिका', 14, 1),
(149, 'Thori', 'ठोरी गाउँपालिका', 15, 2),
(150, 'Jirabhawani', 'जिरा भवानी गाउँपालिका', 15, 2),
(151, 'Paterwasugauli', '	पटेर्वा सुगौली गाउँपालिका', 15, 2),
(152, 'SakhuwaPrasauni', 'सखुवा प्रसौनी गाउँपालिका', 15, 2),
(153, 'Parsagadhi', 'पर्सागढी नगरपालिका', 15, 2),
(154, 'Jagarnathpur', '	जगरनाथपुर गाउँपालिका', 15, 2),
(155, 'Dhobini', 'धोबीनी गाउँपालिका', 15, 2),
(156, 'Pokhariya', 'पोखरिया नगरपालिका', 15, 2),
(157, 'Bahudaramai', 'बहुदरमाई नगरपालिका', 15, 2),
(158, 'Birgunj', 'बिरगंज महानगरपालिका', 15, 2),
(159, 'Kalikamai', 'कालिकामाई गाउँपालिका', 15, 2),
(160, 'Bindabasini', 'बिन्दबासिनी गाउँपालिका', 15, 2),
(161, 'Chhipaharmai', 'छिपहरमाई गाउँपालिका', 15, 2),
(162, 'Pakahamainpur', 'पकाहा मैनपुर गाउँपालिका', 15, 2),
(163, 'Jitpur Simara', 'जीतपुर सिमरा उपमहानगरपालिका', 16, 2),
(164, 'Nigadh', 'निजगढ नगरपालिका', 16, 2),
(165, 'Kolhabi', 'कोल्हवी नगरपालिका', 16, 2),
(166, 'Kalaiya', 'कलैया उपमहानगरपालिका', 16, 2),
(167, 'Karaiyamai', '	करैयामाई गाउँपालिका', 16, 2),
(168, 'Baragadhi', 'बारागढीगाउँपालिका', 16, 2),
(169, 'AdarshKotwal', 'आदर्श कोटवाल गाउँपालिका', 16, 2),
(170, 'Mahangadhimai', 'महागढीमाई नगरपालिका', 16, 2),
(171, 'Devtal', '	देवताल गाउँपालिका', 16, 2),
(172, 'Suwarna', 'सुवर्ण गाउँपालिका', 16, 2),
(173, 'Simraungadh', 'सिम्रौनगढ नगरपालिका', 16, 2),
(174, 'Pacharauta', 'पचरौता नगरपालिका', 16, 2),
(175, 'Bishrampur', 'विश्रामपुर गाउँपालिका', 16, 2),
(176, 'Pheta', 'फेटा गाउँपालिका', 16, 2),
(177, 'Prasauni', '	प्रसौनी गाउँपालिका', 16, 2),
(178, 'Chandrapur', 'चन्द्रपुर नगरपालिका', 17, 2),
(179, 'Gujara', 'गुजरा नगरपालिका', 17, 2),
(180, 'Brindaban', 'बृन्दावन नगरपालिका', 17, 2),
(181, 'Kathariya', 'कटहरिया नगरपालिका', 17, 2),
(182, 'Phatuwa Bijayapur', 'फतुवाबिजयपुर नगरपालिका', 17, 2),
(183, 'Garuda', 'गरुडा नगरपालिका', 17, 2),
(184, 'Gadhimai', '	गढीमाई नगरपालिका', 17, 2),
(185, 'Maulapur', 'मौलापुर नगरपालिका', 17, 2),
(186, 'Debahhi Gonahi', 'देवाही गोनाही नगरपालिका', 17, 2),
(187, 'Baudhimai', 'बौधीमाई नगरपालिका', 17, 2),
(188, 'Paroha', 'परोहा नगरपालिका', 17, 2),
(189, 'Yamunamai', 'यमुनामाई गाउँपालिका', 17, 2),
(190, 'Durga Bhagawati', 'दुर्गा भगवती गाउँपालिका', 17, 2),
(191, 'Rajpur', 'राजपुर नगरपालिका', 17, 2),
(192, 'Ishanath', 'ईशनाथ नगरपालिका', 17, 2),
(193, 'Gaur', 'गौर नगरपालिका', 17, 2),
(194, 'Rajdevi', 'राजदेवी नगरपालिका', 17, 2),
(195, 'Bagmati', 'बागमती नगरपालिका', 18, 2),
(196, 'Hariwan', '	हरिवन नगरपालिका', 18, 2),
(197, 'Haripur', '	हरिपुर नगरपालिका', 18, 2),
(198, 'Ishworpur', 'ईश्वरपुर नगरपालिका', 18, 2),
(199, 'Barahathawa', 'बरहथवा नगरपालिका', 18, 2),
(200, 'Basbariya', 'बसबरीया गाउँपालिका', 18, 2),
(201, 'Kabilasi', '	कविलासी नगरपालिका', 18, 2),
(202, 'Chandranagar', 'चन्द्रनगर गाउँपालिका', 18, 2),
(203, 'Haripurwa', 'हरिपुर्वा नगरपालिका', 18, 2),
(204, 'Chakraghatta', 'चक्रघट्टा गाउँपालिका', 18, 2),
(205, 'Bramhapuri', 'ब्रह्मपुरी गाउँपालिका', 18, 2),
(206, 'Parsa', 'पर्सा गाउँपालिका', 18, 2),
(207, 'Malangawa', 'मलंगवा नगरपालिका', 18, 2),
(208, 'Kaudena', 'कौडेना गाउँपालिका', 18, 2),
(209, 'Godaita', 'गोडैटा नगरपालिका', 18, 2),
(210, 'Ramnagar', 'रामनगर गाउँपालिका', 18, 2),
(211, 'Bishnu', 'विष्णु गाउँपालिका', 18, 2),
(212, 'Balara', 'बलरा नगरपालिका', 18, 2),
(213, 'Bardibas', 'बर्दिबास नगरपालिका', 19, 2),
(214, 'Gaushala', 'गौशाला नगरपालिका', 19, 2),
(215, 'Sonama', 'सोनमा गाउँपालिका', 19, 2),
(216, 'Aurahi', 'औरही नगरपालिका', 19, 2),
(217, 'Bhangaha', 'भँगाहा नगरपालिका', 19, 2),
(218, 'Samsi', 'साम्सी गाउँपालिका', 19, 2),
(219, 'Ramgopalpur', 'रामगोपालपुर नगरपालिका', 19, 2),
(220, 'Balwa', 'बलवा नगरपालिका', 19, 2),
(221, 'Loharpatti', 'लोहरपट्टी नगरपालिका', 19, 2),
(222, 'Manra Siswa', 'मनरा शिसवा नगरपालिका', 19, 2),
(223, 'Maottari', 'महोत्तरी गाउँपालिका', 19, 2),
(224, 'Ekdanra', 'एकडारा गाउँपालिका', 19, 2),
(225, 'Jaleswor', 'जलेश्वर नगरपालिका', 19, 2),
(226, 'Matihani', 'मटिहानी नगरपालिका', 19, 2),
(227, 'Mithila', 'मिथिला नगरपालिका', 20, 2),
(228, 'Bateshwor', 'बटेश्वर गाउँपालिका', 20, 2),
(229, 'Dhanusadham', 'धनुषाधाम नगरपालिका', 20, 2),
(230, 'Ganeshman Charnath', 'गणेशमान चारनाथ नगरपालिका', 20, 2),
(231, 'Chhireshwornath', 'क्षिरेश्वरनाथ नगरपालिका', 20, 2),
(232, 'Lakshminiya', 'लक्ष्मीनिया गाउँपालिका', 20, 2),
(233, 'Mithila Bihari', 'मिथिला बिहारी नगरपालिका', 20, 2),
(234, 'Sabaila', 'सबैला नगरपालिका', 20, 2),
(235, 'Hansapur', 'हंसपुर नगरपालिका', 20, 2),
(236, 'Janakpurdham', 'जनकपुरधाम उपमहानगरपालिका', 20, 2),
(237, 'Aurahi', 'औरही गाउँपालिका', 20, 2),
(238, 'Sahidnagar', 'शहीदनगर नगरपालिका', 20, 2),
(239, 'Kamala', 'कमला नगरपालिका', 20, 2),
(240, 'Bideha', 'विदेह नगरपालिका', 20, 2),
(241, 'Janaknandani', 'जनकनन्दिनी गाउँपालिका', 20, 2),
(242, 'Dhanauji', 'धनौजी गाउँपालिका', 20, 2),
(243, 'Nagarain', 'नगराइन नगरपालिका', 20, 2),
(244, 'Mukhaiyapatti Musaharmiya', 'मुखियापट्टी मुसहरमिया गाउँपालिका', 20, 2),
(245, 'Karjanha', 'कर्जन्हा नगरपालिका', 21, 2),
(246, 'Mirchaiya', 'मिर्चैयाँ नगरपालिका', 21, 2),
(247, 'Kalyanpur', 'कल्याणपुर नगरपालिका', 21, 2),
(248, 'Bishnupur', 'विष्णुपुर गाउँपालिका', 21, 2),
(249, 'Siraha', 'सिरहा नगरपालिका', 21, 2),
(250, 'Arnama', 'अर्नमा गाउँपालिका', 21, 2),
(251, 'Lahan', 'लहान नगरपालिका', 21, 2),
(252, 'Naraha', '	नरहा गाउँपालिका', 21, 2),
(253, 'Dhangadhimai', 'धनगढीमाई नगरपालिका', 21, 2),
(254, 'Golbazar', 'गोलबजार नगरपालिका', 21, 2),
(255, 'Sukhipur', 'सुखीपुर नगरपालिका', 21, 2),
(256, 'Laxmipur', 'लक्ष्मीपुर पतारी गाउँपालिका', 21, 2),
(257, 'Aurahi', 'औरही गाउँपालिका', 21, 2),
(258, 'Bariyarpatti', 'बरियारपट्टी गाउँपालिका', 21, 2),
(259, 'Nawarajpur', 'नवराजपुर गाउँपालिका', 21, 2),
(260, 'Bhagawanpur', 'भगवानपुर गाउँपालिका', 21, 2),
(261, 'Surunga', 'सुरुङ्‍गा नगरपालिका', 22, 2),
(262, 'Khadak', 'खडक नगरपालिका', 22, 2),
(263, 'Shambhunath', 'शम्भुनाथ नगरपालिका', 22, 2),
(264, 'Rupani', 'रुपनी गाउँपालिका', 22, 2),
(265, 'Balan Bihul', 'बलान-बिहुल गाउँपालिका', 22, 2),
(266, 'Bode Barsain', 'बोदेबरसाईन नगरपालिका', 22, 2),
(267, 'Dakneshwori', 'डाक्नेश्वरी नगरपालिका', 22, 2),
(268, 'Agnisair Krishna Savaran', 'अग्निसाइर कृष्णासरवन गाउँपालिका', 22, 2),
(269, 'Saptkoshi', 'सप्तकोशी नगरपालिका', 22, 2),
(270, 'Kanchanrup', '	कञ्चनरुप नगरपालिका', 22, 2),
(271, 'Tirahut', 'तिरहुत गाउँपालिका', 22, 2),
(272, 'Mahadeva', 'महादेवा गाउँपालिका', 22, 2),
(273, 'Rajbiraj', 'राजविराज नगरपालिका', 22, 2),
(274, 'Hanumannagar Kankalini', 'हनुमाननगर कङ्‌कालिनी नगरपालिका', 22, 2),
(275, 'Tilathi Koladi', '	तिलाठी कोईलाडी गाउँपालिका', 22, 2),
(276, 'Chhinnamasta', 'छिन्नमस्ता गाउँपालिका', 22, 2),
(277, 'Rajgadh', 'राजगढ गाउँपालिका', 22, 2),
(278, 'Aamachhodingmo', 'आमाछोदिङमो गाउँपालिका', 37, 3),
(279, 'Gosainkunda', 'गोसाईकुण्ड गाउँपालिका', 37, 3),
(280, 'Uttargaya', 'उत्तरगया गाउँपालिका', 37, 3),
(281, 'Kalika', 'कालिका गाउँपालिका', 37, 3),
(282, 'Nakunda', 'नौकुण्ड गाउँपालिका', 37, 3),
(283, 'Madi', 'माडी नगरपालिका', 38, 3),
(284, 'Bharatpur', 'भरतपुर महानगरपालिका', 38, 3),
(285, 'Ratnangar', 'रत्ननगर नगरपालिका', 38, 3),
(286, 'Khairahani', 'खैरहनी नगरपालिका', 38, 3),
(287, 'Rapti', '	राप्ती नगरपालिका', 38, 3),
(288, 'Kalika', 'कालिका नगरपालिका', 38, 3),
(289, 'Ichchhyakamana', 'इच्छाकामना गाउँपालिका', 38, 3),
(290, 'Raksirang', 'राक्सिराङ्ग गाउँपालिका', 39, 3),
(291, 'Kailash', 'कैलाश गाउँपालिका', 39, 3),
(292, 'Thaha', 'थाहा नगरपालिका', 39, 3),
(293, 'Indrasarowar', 'इन्द्रसरोबर गाउँपालिका', 39, 3),
(294, 'Bhimphedi', 'भिमफेदी गाउँपालिका', 39, 3),
(295, 'Manahari', 'मनहरी गाउँपालिका', 39, 3),
(296, 'Makwanpurgadhi', '	मकवानपुरगढी गाउँपालिका', 39, 3),
(297, 'Hetauda', 'हेटौडा उपमहानगरपालिका', 39, 3),
(298, 'Bakaiya', 'बकैया गाउँपालिका', 39, 3),
(299, 'Bagmati', 'बाग्मति गाउँपालिका', 39, 3),
(300, 'Sunakoshi', 'सुनकोशी गाउँपालिका', 40, 3),
(301, 'Ganglekh', 'घ्याङलेख गाउँपालिका', 40, 3),
(302, 'Hariharpurgadhi', 'हरिहरपुरगढी गाउँपालिका', 40, 3),
(303, 'Marin', 'मरिण गाउँपालिका', 40, 3),
(304, 'Kamalamai', 'कमलामाई नगरपालिका', 40, 3),
(305, 'Golanjor', 'गोलन्जर गाउँपालिका', 40, 3),
(306, 'Phikkal', 'फिक्कल गाउँपालिका', 40, 3),
(307, 'Tinpatan', 'तीनपाटन गाउँपालिका', 40, 3),
(308, 'Dudhauli', 'दुधौली नगरपालिका', 40, 3),
(309, 'Rubi Valley', 'रुवी भ्याली गाउँपालिका', 41, 3),
(310, 'Gangajamuna', 'गङ्गाजमुना गाउँपालिका', 41, 3),
(311, 'Khaniyabash', 'खनियाबास गाउँपालिका', 41, 3),
(312, 'Tripura Sundari', 'त्रिपुरासुन्दरी गाउँपालिका', 41, 3),
(313, 'Netrawati Dabjong', 'नेत्रावती डबजोङ गाउँपालिका', 41, 3),
(314, 'Jwalamukhi', 'ज्वालामूखी गाउँपालिका', 41, 3),
(315, 'Nilakantha', 'निलकण्ठ नगरपालिका', 41, 3),
(316, 'Siddhalek', '	सिद्धलेक गाउँपालिका', 41, 3),
(317, 'Galchhi', 'गल्छी गाउँपालिका', 41, 3),
(318, 'Benighat', 'बेनीघाट रोराङ्ग गाउँपालिका', 41, 3),
(319, 'Gajuri', 'गजुरी गाउँपालिका', 41, 3),
(320, 'Thakre', '	थाक्रे गाउँपालिका', 41, 3),
(321, 'Kispang', '	किस्पाङ गाउँपालिका', 42, 3),
(322, 'Myagang', 'म्यगङ गाउँपालिका', 42, 3),
(323, 'Bidur', 'विदुर नगरपालिका', 42, 3),
(324, 'Tarkeshwar', 'तारकेश्वर गाउँपालिका', 42, 3),
(325, 'Suryagadhi', 'सुर्यगढी गाउँपालिका', 42, 3),
(326, 'Likhu', 'लिखु गाउँपालिका', 42, 3),
(327, 'Tadi', 'तादी गाउँपालिका', 42, 3),
(328, 'Panchakanya', 'पञ्चकन्या गाउँपालिका', 42, 3),
(329, 'Dupcheswar', 'दुप्चेश्वर गाउँपालिका', 42, 3),
(330, 'Shivapuri', '	शिवपुरी गाउँपालिका', 42, 3),
(331, 'Kakani', 'ककनी गाउँपालिका', 42, 3),
(332, 'Belkotgadhi', '	बेलकोटगढी नगरपालिका', 42, 3),
(333, 'Lalitpur', 'ललितपुर महानगरपालिका', 43, 3),
(334, 'Mahalaxmi', 'महालक्ष्मी नगरपालिका', 43, 3),
(335, 'Godawari', '	गोदावरी नगरपालिका', 43, 3),
(336, 'Bagmati', 'बागमती गाउँपालिका', 43, 3),
(337, 'Mahankal', 'महाङ्काल गाउँपालिका', 43, 3),
(338, 'Konjyosom', 'कोन्ज्योसोम गाउँपालिका', 43, 3),
(339, 'Madhyapur Thimi', 'मध्यपुर थिमी नगरपालिका', 44, 3),
(340, 'Changunarayan', 'चाँगुनारायण नगरपालिका', 44, 3),
(341, 'Bhaktapur', '	भक्तपुर नगरपालिका', 44, 3),
(342, 'Suryabinayak', '	सूर्यविनायक नगरपालिका', 44, 3),
(343, 'Dakshinkali', 'दक्षिणकाली नगरपालिका', 45, 3),
(344, 'Kirtipur', 'कीर्तिपुर नगरपालिका', 45, 3),
(345, 'Chandragiri', 'चन्द्रागिरी नगरपालिका', 45, 3),
(346, 'Kathmandu', 'काठमाण्डौं महानगरपालिका', 45, 3),
(347, 'Nagarjun', 'नागार्जुन नगरपालिका', 45, 3),
(348, 'Tarakeshwar', 'तारकेश्वर नगरपालिका', 45, 3),
(349, 'Budhanilkanth', 'बुढानिलकण्ठ नगरपालिका', 45, 3),
(350, 'Tokha', 'टोखा नगरपालिका', 45, 3),
(351, 'Gokarneshwar', 'गोकर्णेश्वर नगरपालिका', 45, 3),
(352, 'Shankarapur', 'शङ्खरापुर नगरपालिका', 45, 3),
(353, 'Kageshwori Manahora', 'कागेश्वरी मनोहरा नगरपालिका', 45, 3),
(354, 'Mandendeupur', 'मण्डनदेउपुर नगरपालिका', 46, 3),
(355, 'Banepa', 'बनेपा नगरपालिका', 46, 3),
(356, 'Panauti', 'पनौती नगरपालिका', 46, 3),
(357, 'Dhulikhel', 'धुलिखेल नगरपालिका', 46, 3),
(358, 'Panchkhal', 'पाँचखाल नगरपालिका', 46, 3),
(359, 'Bhumlu', 'भुम्लु गाउँपालिका', 46, 3),
(360, 'Chaurideurali', 'चौंरीदेउराली गाउँपालिका', 46, 3),
(361, 'Temal', '	तेमाल गाउँपालिका', 46, 3),
(362, 'Namobuddha', 'नमोबुद्ध नगरपालिका', 46, 3),
(363, 'Rosi', 'रोशी गाउँपालिका', 46, 3),
(364, 'Khanikhola', 'खानीखोला गाउँपालिका', 46, 3),
(365, 'Mahabharat', 'महाभारत गाँउपालिका', 46, 3),
(366, 'Doramba', 'दोरम्बा गाउँपालिका', 47, 3),
(367, 'Sunapati', 'सुनापती गाउँपालिका', 47, 3),
(368, 'Khadadevi', 'खाँडादेवी गाउँपालिका', 47, 3),
(369, 'Manthali', 'मन्थली नगरपालिका', 47, 3),
(370, 'Ramechhap', '	रामेछाप नगरपालिका', 47, 3),
(371, 'Likhu Tamakoshi', 'लिखु तामाकोशी गाउँपालिका', 47, 3),
(372, 'Gokulganga', 'गोकुलगङ्गा गाउँपालिका', 47, 3),
(373, 'Umakunda', 'उमाकुण्ड गाउँपालिका', 47, 3),
(374, 'Bigu', 'विगु गाउँपालिका', 48, 3),
(375, 'Gaurishankhar', 'गौरीशङ्कर गाउँपालिका', 48, 3),
(376, 'Kalinchok', 'कालिन्चोक गाउँपालिका', 48, 3),
(377, 'Jiri', '	जिरी नगरपालिका', 48, 3),
(378, 'Bhimeshwar', 'भिमेश्वर नगरपालिका', 48, 3),
(379, 'Baiteshwar', 'वैतेश्वर गाउँपालिका', 48, 3),
(380, 'Sailung', 'शैलुङ्ग गाउँपालिका', 48, 3),
(381, 'Melung', 'मेलुङ्ग गाउँपालिका', 48, 3),
(382, 'Tamakoshi', 'तामाकोशी गाउँपालिका', 48, 3),
(383, 'Helambu', '	हेलम्बु गाउँपालिका', 49, 3),
(384, 'Panchapokhari Thangpal', '	पाँचपोखरी थाङपाल गाउँपालिका', 49, 3),
(385, 'Jugal', 'जुगल गाउँपालिका', 49, 3),
(386, 'Bhotekoshi', 'भोटेकोशी गाउँपालिका', 49, 3),
(387, 'Melamchi', 'मेलम्ची नगरपालिका', 49, 3),
(388, 'Barhabise', 'बाह्रविसे नगरपालिका', 49, 3),
(389, 'Tripurasundari', 'त्रिपुरासुन्दरी गाउँपालिका', 49, 3),
(390, 'Sunkoshi', 'सुनकोशी गाउँपालिका', 49, 3),
(391, 'Lisangkhu Pakhar', 'लिसङ्खु पाखर गाउँपालिका', 49, 3),
(392, 'Indrawati', 'ईन्द्रावती गाउँपालिका', 49, 3),
(393, 'Balefi', 'बलेफी गाउँपालिका', 49, 3),
(394, 'Chautara Sangachokgadhi', 'चौतारा साँगाचोकगढी नगरपालिका', 49, 3),
(395, 'Narpa Bhumi', 'नार्पा भूमि गाउँपालिका', 50, 4),
(396, 'Chame', 'चामे गाउँपालिका', 50, 4),
(397, 'Nason', 'नासोँ गाउँपालिका', 50, 4),
(398, 'Manang Ngisyang', 'मनाङ ङिस्याङ गाउँपालिका', 50, 4),
(399, 'Lomanthang', 'लोमन्थाङ गाउँपालिका', 51, 4),
(400, 'Lo Gherkar Damodarkunda', 'लो-घेकर दामोदरकुण्ड गाउँपालिका', 51, 4),
(401, 'Varagung Muktichhetra', 'वारागुङ मुक्तिक्षेत्र गाउँपालिका', 51, 4),
(402, 'Gharapjhong', 'घरपझोङ गाउँपालिका', 51, 4),
(403, 'Thasang', 'थासाङ गाउँपालिका', 51, 4),
(404, 'Chum Nubri', 'चुमनुव्री गाउँपालिका', 52, 4),
(405, 'Dharche', '	धार्चे गाउँपालिका', 52, 4),
(406, 'Ajirkot', 'अजिरकोट गाउँपालिका', 52, 4),
(407, 'Barpak', 'बारपाक सुलिकोट गाउँपालिका', 52, 4),
(408, 'Gandaki Rural Municipality', 'गण्डकी गाउँपालिका', 52, 4),
(409, 'Aarughat', 'आरूघाट गाउँपालिका', 52, 4),
(410, 'Siranchok', 'सिरानचोक गाउँपालिका', 52, 4),
(411, 'Palungtar', 'पालुङटार नगरपालिका', 52, 4),
(412, 'Bhimsenthapa', 'भिमसेनथापा गाउँपालिका', 52, 4),
(413, 'Gorkha', 'गोरखा नगरपालिका', 52, 4),
(414, 'Sahid Lekhan', 'शहिद लखन गाउँपालिका', 52, 4),
(415, 'Marsyangdi', 'मर्स्याङदी गाउँपालिका', 53, 4),
(416, 'Kwholwsothar', 'क्व्होलासोथार गाउँपालिका', 53, 4),
(417, 'Besisahar', 'बेसीशहर नगरपालिका', 53, 4),
(418, 'Dordi', 'दोर्दी गाउँपालिका', 53, 4),
(419, 'Dudhpokhari', 'दूधपोखरी गाउँपालिका', 53, 4),
(420, 'Madhyanepal', 'मध्यनेपाल नगरपालिका', 53, 4),
(421, 'Sundarbazar', 'सुन्दरबजार नगरपालिका', 53, 4),
(422, 'Rainas', 'रार्इनास नगरपालिका', 53, 4),
(423, 'Annapurna', 'अन्नपूर्ण गाउँपालिका', 54, 4),
(424, 'Machhapuchchhre', 'माछापुच्छ्रे गाउँपालिका', 54, 4),
(425, 'Madi', 'मादी गाउँपालिका', 54, 4),
(426, 'Pokhara', 'पोखरा महानगरपालिका', 54, 4),
(427, 'Rupa', 'रूपा गाउँपालिका', 54, 4),
(428, 'Shuklagandaki', 'शुक्लागण्डकी नगरपालिका', 55, 4),
(429, 'Bhimad', 'भिमाद नगरपालिका', 55, 4),
(430, 'Magde', 'म्याग्दे गाउँपालिका', 55, 4),
(431, 'Vyas', 'व्यास नगरपालिका', 55, 4),
(432, 'Bhanu', 'भानु नगरपालिका', 55, 4),
(433, 'Bandipur', 'वन्दिपुर गाउँपालिका', 55, 4),
(434, 'Anbukhaireni', 'आँबुखैरेनी गाउँपालिका', 55, 4),
(435, 'Devghat', 'देवघाट गाउँपालिका', 55, 4),
(436, 'Rhising', 'ऋषिङ्ग गाउँपालिका', 55, 4),
(437, 'Ghiring', 'घिरिङ गाउँपालिका', 55, 4),
(438, 'Baudikali', 'बौदीकाली गाउँपालिका', 56, 4),
(439, 'Bulingtar', 'बुलिङटार गाउँपालिका', 56, 4),
(440, 'Hupsekot', 'हुप्सेकोट गाउँपालिका', 56, 4),
(441, 'Devchuli', 'देवचुली नगरपालिका', 56, 4),
(442, 'Gaidakot', '	गैडाकोट नगरपालिका', 56, 4),
(443, 'Kawasoti', 'कावासोती नगरपालिका', 56, 4),
(444, 'Madhyabindu', '	मध्यविन्दु नगरपालिका', 56, 4),
(445, 'Binayee Tribeni', 'विनयी त्रिवेणी गाउँपालिका', 56, 4),
(446, 'Kaligandaki', '	कालीगण्डकी गाउँपालिका', 57, 4),
(447, 'Galyang', 'गल्याङ नगरपालिका', 57, 4),
(448, 'Chapakot', 'चापाकोट नगरपालिका', 57, 4),
(449, 'Waling', '	वालिङ नगरपालिका', 57, 4),
(450, 'Biruwa', 'बिरुवा गाउँपालिका', 57, 4),
(451, 'Harinas', 'हरिनास गाउँपालिका', 57, 4),
(452, 'Bhirkot', '	भीरकोट नगरपालिका', 57, 4),
(453, 'Arjunchaupari', '	अर्जुनचौपारी गाउँपालिका', 57, 4),
(454, 'Putalibazar', 'पुतलीबजार नगरपालिका', 57, 4),
(455, 'Aandhikhola', 'आँधिखोला गाउँपालिका', 57, 4),
(456, 'Phedikhola', 'फेदीखोला गाउँपालिका', 57, 4),
(457, 'Jaljala', 'जलजला गाउँपालिका', 58, 4),
(458, 'Modi', 'मोदी गाउँपालिका', 58, 4),
(459, 'Kushma', '	कुश्मा नगरपालिका', 58, 4),
(460, 'Phalebas', 'फलेवास नगरपालिका', 58, 4),
(461, 'Mahashila', '	महाशिला गाउँपालिका', 58, 4),
(462, 'Bihadi', 'विहादी गाउँपालिका', 58, 4),
(463, 'Painyu', 'पैयूं गाउँपालिका', 58, 4),
(464, 'Nisikhola', '	निसीखोला गाउँपालिका', 59, 4),
(465, 'Dhorpatan', 'ढोरपाटन नगरपालिका', 59, 4),
(466, 'Taman khola', 'तमानखोला गाउँपालिका', 59, 4),
(467, 'Badigad', '	वडिगाड गाउँपालिका', 59, 4),
(468, 'Tara Khola', 'ताराखोला गाउँपालिका', 59, 4),
(469, 'Galkot', 'गल्कोट नगरपालिका', 59, 4),
(470, 'Kanthekhola', 'काठेखोला गाउँपालिका', 59, 4),
(471, 'Baglung', '	बागलुङ नगरपालिका', 59, 4),
(472, 'Jaimuni', '	जैमूनी नगरपालिका', 59, 4),
(473, 'Bareng', '	वरेङ गाउँपालिका', 59, 4),
(474, 'Dhaulagiri', '	धवलागिरी गाउँपालिका', 60, 4),
(475, 'Malika', 'मालिका गाउँपालिका', 60, 4),
(476, 'Raghuganga', 'रघुगंगा गाउँपालिका', 60, 4),
(477, 'Annapurna', 'अन्नपुर्ण गाउँपालिका', 60, 4),
(478, 'Mangala', '	मंगला गाउँपालिका', 60, 4),
(479, 'Beni', 'बेनी नगरपालिका', 60, 4),
(480, 'Geruwa', 'गेरुवा गाउँपालिका', 61, 5),
(481, 'Rajapur', 'राजापुर नगरपालिका', 61, 5),
(482, 'Thakurbaba', 'ठाकुरबाबा नगरपालिका', 61, 5),
(483, 'Madhuwan', '	मधुवन नगरपालिका', 61, 5),
(484, 'Barbardiya', '	बारबर्दिया नगरपालिका', 61, 5),
(485, 'Bansgadhi', 'बाँसगढी नगरपालिका', 61, 5),
(486, 'Gulariya', 'गुलरिया नगरपालिका', 61, 5),
(487, 'Badhaiyatal', 'बढैयाताल गाउँपालिका', 61, 5),
(488, 'Baijanath', 'बैजनाथ गाउँपालिका', 62, 5),
(489, 'Kohalpur', 'कोहलपुर नगरपालिका', 62, 5),
(490, 'Khajura', '	खजुरा गाउँपालिका', 62, 5),
(491, 'Janaki', '	जानकी गाउँपालिका', 62, 5),
(492, 'Nepalgunj', 'नेपालगंज उपमहानगरपालिका', 62, 5),
(493, 'Duduwa', 'डुडुवा गाउँपालिका', 62, 5),
(494, 'Rapti Sonari', 'राप्ती सोनारी गाउँपालिका', 62, 5),
(495, 'Narainapur', 'नरैनापुर गाउँपालिका', 62, 5),
(496, 'Babai', '	बबई गाउँपालिका', 63, 5),
(497, 'Shantinagar', '	शान्तिनगर गाउँपालिका', 63, 5),
(498, 'Dangisharan', 'दंगीशरण गाउँपालिका', 63, 5),
(499, 'Tulsipur', '	तुल्सीपुर उपमहानगरपालिका', 63, 5),
(500, 'Ghorahi', 'घोराही उपमहानगरपालिका', 63, 5),
(501, 'Lamahi', 'लमही नगरपालिका', 63, 5),
(502, 'Banglachuli', 'बंगलाचुली गाउँपालिका', 63, 5),
(503, 'Rapti', 'राप्ती गाउँपालिका', 63, 5),
(504, 'Rajpur', 'राजपुर गाउँपालिका', 63, 5),
(505, 'Gadhawa', 'गढवा गाउँपालिका', 63, 5),
(506, 'Gangadev', 'गंगादेव गाउँपालिका', 64, 5),
(507, 'Madi', 'माडी गाउँपालिका', 64, 5),
(508, 'Tribeni', '	त्रिवेणी गाउँपालिका', 64, 5),
(509, 'Runtigadhi', 'रुन्टीगढी गाउँपालिका', 64, 5),
(510, 'Sunil Smriti', 'सुनिल स्मृति गाउँपालिका', 64, 5),
(511, 'Lungri', '	लुङग्री गाउँपालिका', 64, 5),
(512, 'Rolpa', '	रोल्पा नगरपालिका', 64, 5),
(513, 'Sunchhahari', 'सुनछहरी गाउँपालिका', 64, 5),
(514, 'Thawang', 'थवाङ गाउँपालिका', 64, 5),
(515, 'Pariwartan', '	परिवर्तन गाउँपालिका', 64, 5),
(516, 'Sisne', '	सिस्ने गाउँपालिका', 65, 5),
(517, 'Bhume', 'भूमे गाउँपालिका', 65, 5),
(518, 'Putha Uttarganga', '	पुथा उत्तरगंगा गाउँपालिका', 65, 5),
(519, 'Naubahini', 'नौवहिनी गाउँपालिका', 67, 5),
(520, 'Gaumukhi', '	गौमुखी गाउँपालिका', 67, 5),
(521, 'Jhimruk', '	झिमरुक गाउँपालिका', 67, 5),
(522, 'Pyuthan', '	प्यूठान नगरपालिका', 67, 5),
(523, 'Mallarani', '	मल्लरानी गाउँपालिका', 67, 5),
(524, 'Swargadwari', '	स्वर्गद्वारी नगरपालिका', 67, 5),
(525, 'Mandavi', 'माण्डवी गाउँपालिका', 67, 5),
(526, 'Sarumarani', 'सरुमारानी गाउँपालिका', 67, 5),
(527, 'Ayirabati', 'ऐरावती गाउँपालिका', 67, 5),
(528, 'Malika', 'मालिका गाउँपालिका', 68, 5),
(529, 'Madane', '	मदाने गाउँपालिका', 68, 5),
(530, 'Dhurkot', 'धुर्कोट गाउँपालिका', 68, 5),
(531, 'Isma', 'ईस्मा गाउँपालिका', 68, 5),
(532, 'Musikot', '	मुसिकोट नगरपालिका', 68, 5),
(533, 'Resunga', 'रेसुङ्गा नगरपालिका', 68, 5),
(534, 'Gulmidarbar', 'गुल्मी दरबार गाउँपालिका', 68, 5),
(535, 'Chandrakot', '	चन्द्रकोट गाउँपालिका', 68, 5),
(536, 'Satyawati', 'सत्यवती गाउँपालिका', 68, 5),
(537, 'Kaligandaki', '	कालीगण्डकी गाउँपालिका', 68, 5),
(538, 'Chatrakot', '	छत्रकोट गाउँपालिका', 68, 5),
(539, 'RuruKshetra', 'रुरुक्षेत्र गाउँपालिका', 68, 5),
(540, 'Malarani', 'मालारानी गाउँपालिका', 69, 5),
(541, 'Bhumekasthan', 'भूमिकास्थान नगरपालिका', 69, 5),
(542, 'Sandhikharka', 'सन्धिखर्क नगरपालिका', 69, 5),
(543, 'Chhatradev', 'छत्रदेव गाउँपालिका', 69, 5),
(544, 'Panini', 'पाणिनी गाउँपालिका', 69, 5),
(545, 'Sitganga', 'शितगंगा नगरपालिका', 69, 5),
(546, 'Bijayanagar', 'विजयनगर गाउँपालिका', 70, 5),
(547, 'Shivaraj', 'शिवराज नगरपालिका', 70, 5),
(548, 'Budhdhabhumi', 'बुद्धभुमी नगरपालिका', 70, 5),
(549, 'Krishnanagar', '	कृष्णनगर नगरपालिका', 70, 5),
(550, 'Maharajgunj', '	महाराजगंज नगरपालिका', 70, 5),
(552, 'Banganga', '	बाणगंगा नगरपालिका', 70, 5),
(553, 'Yasodhara', '	यसोधरा गाउँपालिका', 70, 5),
(554, 'Mayadevi', 'मायादेवी गाउँपालिका', 70, 5),
(555, 'Sudhodhan', 'सुद्धोधन गाउँपालिका', 70, 5),
(556, 'Rainadevi Chhahara', 'रैनादेवी छहरा गाउँपालिका', 71, 5),
(557, 'Ridikot', 'रिब्दिकोट गाउँपालिका', 71, 5),
(558, 'Tansen', '	तानसेन नगरपालिका', 71, 5),
(559, 'Tinau', '	तिनाउ गाउँपालिका', 71, 5),
(560, 'Bagnaskali', '	बगनासकाली गाउँपालिका', 71, 5),
(561, 'Rambha', 'रम्भा गाउँपालिका', 71, 5),
(562, 'Mathagadhi', 'माथागढी गाउँपालिका', 71, 5),
(563, 'Purbakhola', '	पूर्वखोला गाउँपालिका', 71, 5),
(564, 'Rampur', '	रामपुर नगरपालिका', 71, 5),
(565, 'Nisdi', '	निस्दी गाउँपालिका', 71, 5),
(566, 'Sunwal', 'सुनवल नगरपालिका', 73, 5),
(567, 'Bardaghat', '	बर्दघाट नगरपालिका', 73, 5),
(568, 'Ramgram', 'रामग्राम नगरपालिका', 73, 5),
(569, 'Sarawal', 'सरावल गाउँपालिका', 73, 5),
(570, 'Palhi Nandan', 'पाल्हीनन्दन गाउँपालिका', 73, 5),
(571, 'Pratappur', '	प्रतापपुर गाउँपालिका', 73, 5),
(573, 'Sainamaina', '	सैनामैना नगरपालिका', 72, 5),
(574, 'Butwal', 'बुटवल उपमहानगरपालिका', 72, 5),
(575, 'Devdaha', '	देवदह नगरपालिका', 72, 5),
(576, 'Kanchan', 'कन्चन गाउँपालिका', 72, 5),
(577, 'Gaidahawa', 'गैडहवा गाउँपालिका', 72, 5),
(578, 'Sudhdhodhan', '	शुद्धोधन गाउँपालिका', 72, 5),
(579, 'Tilotam', 'तिलोत्तमा नगरपालिका', 72, 5),
(580, 'Siyari', '	सियारी गाउँपालिका', 72, 5),
(581, 'Om Satiya', 'ओमसतिया गाउँपालिका', 72, 5),
(582, 'Rohini', 'रोहिणी गाउँपालिका', 72, 5),
(583, 'Siddharthanagar', 'सिद्धार्थनगर नगरपालिका', 72, 5),
(584, 'Mayadevi', '	मायादेवी गाउँपालिका', 72, 5),
(585, 'Lumbini Sanskritik', '	लुम्बिनी सांस्कृतिक नगरपालिका', 72, 5),
(586, 'Kotahimai', 'कोटहीमाई गाउँपालिका', 72, 5),
(587, 'Sammarimai', '	सम्मरीमाई गाउँपालिका', 72, 5),
(588, 'Marchawari', 'मर्चवारी गाउँपालिका', 72, 5),
(589, 'Namkha', '	नाम्खा गाउँपालिका', 74, 6),
(590, 'Simkot', 'सिमकोट गाउँपालिका', 74, 6),
(591, 'Kharpunath', 'खार्पुनाथ गाउँपालिका', 74, 6),
(592, 'Sarkegad', 'सर्केगाड गाउँपालिका', 74, 6),
(593, 'Chankheli', '	चंखेली गाउँपालिका', 74, 6),
(594, 'Adanchuli', '	अदानचुली गाउँपालिका', 74, 6),
(595, 'Tanjakot', '	ताँजाकोट गाउँपालिका', 74, 6),
(596, 'Palata', 'पलाता गाउँपालिका', 75, 6),
(597, 'Sanni Tribeni', 'सान्नी त्रिवेणी गाउँपालिका', 75, 6),
(598, 'Raskot', 'रास्कोट नगरपालिका', 75, 6),
(599, 'Pachjharana', 'पचालझरना गाउँपालिका', 75, 6),
(600, 'Naraharinath', 'नरहरिनाथ गाउँपालिका', 75, 6),
(601, 'Khandachakra', 'खाँडाचक्र नगरपालिका', 75, 6),
(602, 'Tilugufa', '	तिलागुफा नगरपालिका', 75, 6),
(603, 'Shuva Kalika', 'शुभ कालीका गाउँपालिका', 75, 6),
(604, 'Mahawai', 'महावै गाउँपालिका', 75, 6),
(605, 'Soru', 'सोरु गाउँपालिका', 76, 6),
(606, 'Khatyad', '	खत्याड गाउँपालिका', 76, 6),
(607, 'Chhayanath Rara', 'छायाँनाथ रारा नगरपालिका', 76, 6),
(608, 'Mugum Kharmarong', 'मुगुम कार्मारोंग गाउँपालिका', 76, 6),
(609, 'Kanaka Sundari', 'कनकासुन्दरी गाउँपालिका', 77, 6),
(610, 'Sinja', 'सिंजा गाउँपालिका', 77, 6),
(611, 'Patrasi', '	पातारासी गाउँपालिका', 77, 6),
(612, 'Chandannath', 'चन्दननाथ नगरपालिका', 77, 6),
(613, 'Tila', '	तिला गाउँपालिका', 77, 6),
(614, 'Tatopani', '	तातोपानी गाउँपालिका', 77, 6),
(615, 'Guthichaur', 'गुठिचौर गाउँपालिका', 77, 6),
(616, 'Shey phoksundo', '	शे फोक्सुन्डो गाउँपालिका', 78, 6),
(617, 'Dolpo Buddha', '	डोल्पो बुद्ध गाउँपालिका', 78, 6),
(618, 'Jagadulla', 'जगदुल्ला गाउँपालिका', 78, 6),
(619, 'Mudkechula', '	मुड्केचुला गाउँपालिका', 78, 6),
(620, 'Tripurasundari', 'त्रिपुरासुन्दरी नगरपालिका', 78, 6),
(621, 'Thuli Bheri', 'ठूली भेरी नगरपालिका', 78, 6),
(622, 'Kaike', '	काईके गाउँपालिका', 78, 6),
(623, 'Chharka Tangsong', 'छार्का ताङसोङ गाउँपालिका', 78, 6),
(624, 'Aathbis', 'आठबीस नगरपालिका', 79, 6),
(625, 'Thantikandh', 'ठाँटीकाँध गाउँपालिका', 79, 6),
(626, 'Bhairabi', '	भैरवी गाउँपालिका', 79, 6),
(627, 'Mahabu', 'महावु गाउँपालिका', 79, 6),
(628, 'Chamunda Bindrasaini', 'चामुण्डा विन्द्रासैनी नगरपालिका', 79, 6),
(629, 'Dullu', 'दुल्लु नगरपालिका', 79, 6),
(630, 'Narayan', 'नारायण नगरपालिका', 79, 6),
(631, 'Naumule', 'नौमुले गाउँपालिका', 79, 6),
(632, 'Bhagawatimai', '	भगवतीमाई गाउँपालिका', 79, 6),
(633, 'Dungeshwor', 'डुंगेश्वर गाउँपालिका', 79, 6),
(634, 'Gurans', '	गुराँस गाउँपालिका', 79, 6),
(635, 'Chaukune', 'चौकुने गाउँपालिका', 80, 6),
(636, 'Panchapuri', 'पञ्चपुरी नगरपालिका', 80, 6),
(637, 'Barahtal', 'बराहताल गाउँपालिका', 80, 6),
(638, 'Birendranagar', 'बीरेन्द्रनगर नगरपालिका', 80, 6),
(639, 'Lekbeshi', 'लेकवेशी नगरपालिका', 80, 6),
(640, 'Chingad', '	चिङ्गाड गाउँपालिका', 80, 6),
(641, 'Simta', '	सिम्ता गाउँपालिका', 80, 6),
(642, 'Bheriganga', 'भेरीगंगा नगरपालिका', 80, 6),
(643, 'Gurbhakot', 'गुर्भाकोट नगरपालिका', 80, 6),
(644, 'Kalimati', 'कालिमाटी गाउँपालिका', 81, 6),
(645, 'Tribeni', '	त्रिवेणी गाउँपालिका', 81, 6),
(646, 'Kapurkot', 'कपुरकोट गाउँपालिका', 81, 6),
(647, 'Chhatraeshwori', '	छत्रेश्वरी गाउँपालिका', 81, 6),
(648, 'Sharada', '	शारदा नगरपालिका', 81, 6),
(649, 'Siddha Kumakh', '	सिद्ध कुमाख गाउँपालिका', 81, 6),
(650, 'Bagchaur', 'बागचौर नगरपालिका', 81, 6),
(651, 'Darma', '	दार्मा गाउँपालिका', 81, 6),
(652, 'Kumakh', 'कुमाख गाउँपालिका', 81, 6),
(653, 'Bangad Kupinde', 'बनगाड कुपिण्डे नगरपालिका', 81, 6),
(654, 'Athbiskot', 'आठबिसकोट नगरपालिका', 82, 6),
(655, 'Banfikot', 'बाँफिकोट गाउँपालिका', 82, 6),
(656, 'Sani Bheri', 'सानी भेरी गाउँपालिका', 82, 6),
(657, 'Musikot', '	मुसिकोट नगरपालिका', 82, 6),
(658, 'Chaurjahari', '	चौरजहारी नगरपालिका', 82, 6),
(659, 'Tribeni', 'त्रिवेणी गाउँपालिका', 82, 6),
(660, 'Barekot', 'बारेकोट गाउँपालिका', 83, 6),
(661, 'Nalgad', '	नलगाड नगरपालिका', 83, 6),
(662, 'Kuse', '	कुसे गाउँपालिका', 83, 6),
(663, 'Junichande', 'जुनीचाँदे गाउँपालिका', 83, 6),
(664, 'Chhedagad', '	छेडागाड नगरपालिका', 83, 6),
(665, 'Bheri', 'भेरी नगरपालिका', 83, 6),
(666, 'Siwalaya', '	शिवालय गाउँपालिका', 83, 6),
(667, 'Byas', 'ब्याँस गाउँपालिका', 84, 7),
(668, 'Apihimal', 'अपिहिमाल गाउँपालिका', 84, 7),
(669, 'Dunhu', 'दुहुँ गाउँपालिका', 84, 7),
(670, 'Mahakali', '	महाकाली नगरपालिका', 84, 7),
(671, 'Naugad', 'नौगाड गाउँपालिका', 84, 7),
(672, 'Marma', 'मार्मा गाउँपालिका', 84, 7),
(673, 'MalikaArjun', 'मालिकार्जुन गाउँपालिका', 84, 7),
(674, 'Shailesikhar', 'शैल्यशिखर नगरपालिका', 84, 7),
(675, 'Lekam', 'लेकम गाउँपालिका', 84, 7),
(676, 'Dilasaini', 'डीलासैनी गाउँपालिका', 85, 7),
(677, 'Purchaudi', 'पुर्चौडी नगरपालिका', 85, 7),
(678, 'Dogadakedar', 'दोगडाकेदार गाउँपालिका', 85, 7),
(679, 'Surnaya', 'सुर्नया गाउँपालिका', 85, 7),
(680, 'Patan', 'पाटन नगरपालिका', 85, 7),
(681, 'Sigas', '	सिगास गाउँपालिका', 85, 7),
(682, 'Dashrathchanda', 'दशरथचन्द नगरपालिका', 85, 7),
(683, 'Pancheshwor', 'पञ्चेश्वर गाउँपालिका', 85, 7),
(684, 'Melauli', 'मेलौली नगरपालिका', 85, 7),
(685, 'Shivanath', 'शिवनाथ गाउँपालिका', 85, 7),
(686, 'Sailpal', 'साइपाल गाउँपालिका', 86, 7),
(687, 'Surma', 'सूर्मा गाउँपालिका', 86, 7),
(688, 'Talikot', 'तलकोट गाउँपालिका', 86, 7),
(689, 'Bungal', 'बुंगल नगरपालिका', 86, 7),
(690, 'Bithadchir', '	वित्थडचिर गाउँपालिका', 86, 7),
(691, 'Kedarseu', 'केदारस्युँ गाउँपालिका', 86, 7),
(692, 'Durgathali', '	दुर्गाथली गाउँपालिका', 86, 7),
(693, 'Jayaprithivi', 'जयपृथ्वी नगरपालिका', 86, 7),
(694, 'Masta', 'मष्टा गाउँपालिका', 86, 7),
(695, 'Chabispathivera', '	छबिसपाथिभेरा गाउँपालिका', 86, 7),
(696, 'Thalara', 'थलारा गाउँपालिका', 86, 7),
(697, 'Khaptadchhanna', '	खप्तडछान्ना गाउँपालिका', 86, 7),
(698, 'Himali', 'हिमाली गाउँपालिका', 87, 7),
(699, 'Gaumul', 'गौमुल गाउँपालिका', 87, 7),
(700, 'Budhinand', '	बुढीनन्दा नगरपालिका', 87, 7),
(701, 'Badimalika', '	बडीमालिका नगरपालिका', 87, 7),
(702, 'Jagannath', 'जगन्‍नाथ गाउँपालिका', 87, 7),
(703, 'Tribeni', 'त्रिवेणी नगरपालिका', 87, 7),
(704, 'Budhiganga', 'बुढीगंगा नगरपालिका', 87, 7),
(705, 'Khapdad Chhededaha', 'खप्तड छेडेदह गाउँपालिका', 87, 7),
(706, 'Ajaymeru', 'अजयमेरु गाउँपालिका', 88, 7),
(707, 'Nawadurga', 'नवदुर्गा गाउँपालिका', 88, 7),
(708, 'Amargadhi', '	अमरगढी नगरपालिका', 88, 7),
(709, 'Bhageshwar', 'भागेश्वर गाउँपालिका', 88, 7),
(710, 'Alital', 'आलिताल गाउँपालिका', 88, 7),
(711, 'Parashuram', 'परशुराम नगरपालिका', 88, 7),
(712, 'Sayal', 'सायल गाउँपालिका', 89, 7),
(713, 'Adharsha', 'आदर्श गाउँपालिका', 89, 7),
(714, 'Purbichauki', '	पूर्वीचौकी गाउँपालिका', 89, 7),
(715, 'Dipayal silgadi', 'दिपायल सिलगढी नगरपालिका', 89, 7),
(716, 'Shikhar', 'शिखर नगरपालिका', 89, 7),
(717, 'K.I. Singh', 'के.आई.सिं. गाउँपालिका', 89, 7),
(718, 'Jorayal', 'जोरायल गाउँपालिका', 89, 7),
(719, 'Bandikedar', 'बडीकेदार गाउँपालिका', 89, 7),
(720, 'Bogatan Phudsil', 'बोगटान फुड्सिल गाउँपालिका', 89, 7),
(721, 'Sanphebagar', 'साँफेबगर नगरपालिका', 90, 7),
(722, 'Mallekh', '	मेल्लेख गाउँपालिका', 90, 7),
(723, 'Chaurapati', '	चौरपाटी गाउँपालिका', 90, 7),
(724, 'Bannigadhi Jayagadh', 'बान्निगढी जयगढ गाउँपालिका', 90, 7),
(725, 'Ramroshan', 'रामारोशन गाउँपालिका', 90, 7),
(726, 'Mangalsen', '	मंगलसेन नगरपालिका', 90, 7),
(727, 'Kamalbazar', '	कमलबजार नगरपालिका', 90, 7),
(728, 'Panchadewai Binayak', 'पन्चदेवल विनायक नगरपालिका', 90, 7),
(729, 'Dhakari', '	ढकारी गाउँपालिका', 90, 7),
(730, 'Turmakhad', '	तुर्माखाँद गाउँपालिका', 90, 7),
(731, 'Bhimadatta', 'भीमदत्त नगरपालिका', 91, 7),
(732, 'Bedkot', 'वेदकोट नगरपालिका', 91, 7),
(733, 'Shuklaphanta', 'शुक्लाफाँटा नगरपालिका', 91, 7),
(734, 'Krishnapur', 'कृष्णपुर नगरपालिका', 91, 7),
(735, 'Beldandi', '	बेलडाडी गाउँपालिका', 91, 7),
(736, 'Lajhadi', 'लालझाडी गाउँपालिका', 91, 7),
(737, 'Belauri', '	बेलौरी नगरपालिका', 91, 7),
(738, 'Purnabas', 'पुर्नवास नगरपालिका', 91, 7),
(739, 'Chure', '	चुरे गाउँपालिका', 92, 7),
(740, 'Godawari', 'गोदावरी नगरपालिका', 92, 7),
(741, 'Dhangadi', 'धनगढी उपमहानगरपालिका', 92, 7),
(742, 'Gauriganga', 'गौरीगंगा नगरपालिका', 92, 7),
(743, 'Kailari', 'कैलारी गाउँपालिका', 92, 7),
(744, 'Bhajani', '	भजनी नगरपालिका', 92, 7),
(745, 'Tikapur', '	टिकापुर नगरपालिका', 92, 7),
(746, 'Janaki', 'जानकी गाउँपालिका', 92, 7),
(747, 'Joshipur', 'जोशीपुर गाउँपालिका', 92, 7),
(748, 'Ghodaghodi', 'घोडाघोडी नगरपालिका', 92, 7),
(749, 'Bardagoriya', 'बर्दगोरिया गाउँपालिका', 92, 7),
(750, 'Lamkichuha', 'लम्कीचुहा नगरपालिका', 92, 7),
(751, 'Mohanyal', 'मोहन्याल गाउँपालिका', 92, 7),
(752, 'Chishankhugadhi Rural Municipal\r\n', 'चिशंखुगढी गाउँपालिका', 13, 1),
(753, 'Thulung Dudhkoshi Rural Municipal\r\n', 'थुलुङ दुधकोशी गाउँपालिका', 14, 1),
(754, 'Parwanipur Rural Municipality\r\n', 'परवानीपुर गाउँपालिका', 16, 2),
(755, 'Madhav Narayan Municipality', 'माधव नारायण नगरपालिका', 17, 2),
(756, 'Dhankaul Rural Municipality', 'धनकौल गाउँपालिका', 18, 2),
(757, 'Lalbandi Municipality', 'लालबन्दी नगरपालिका', 18, 2),
(758, 'Pipara Rural Municipality', 'पिपरा गाउँपालिका', 19, 2),
(759, 'Sakhuwanankarkatti Ruralmunicipality', 'सखुवानान्कारकट्टी गाउँपालिका', 21, 2),
(760, 'Bishnupur Ruralmunicipality', 'बिष्णुपुर गाउँपालिका', 22, 2),
(761, 'DhurniBesi Municipality', 'धुनीबेंशी नगरपालिका', 41, 3),
(762, 'Bethanchowk Ruralmunicipality', 'बेथानचोक गाउँपालिका', 46, 3),
(763, 'Kapilvastu Municipality', 'कपिलवस्तु नगरपालिका', 70, 5),
(764, 'Susta Rural Municipality', 'सुस्ता गाउँपालिका', 73, 5),
(765, 'HIma Rural Municipality', '	हिमा गाउँपालिका', 77, 6),
(766, 'Swamikartik khapar Rural Municipality', '	स्वामीकार्तिक खापर गाउँपालिका', 87, 7),
(767, 'GanyaPadhura Rural Municipality', 'गन्यापधुरा गाउँपालिका', 88, 7),
(768, 'Mahakali Municipality', 'महाकाली नगरपालिका', 91, 7);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int NOT NULL,
  `name_nepali` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL,
  `name_english` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `fax` varchar(250) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `fk_province` int NOT NULL,
  `fk_district` int NOT NULL,
  `fk_municipal` int NOT NULL,
  `fk_ward` int NOT NULL,
  `tol` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL,
  `org_code` varchar(20) COLLATE utf8_unicode_520_ci NOT NULL,
  `created_date` varchar(20) COLLATE utf8_unicode_520_ci NOT NULL,
  `last_updated_date` varchar(20) COLLATE utf8_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name_nepali`, `name_english`, `phone`, `email`, `fax`, `fk_province`, `fk_district`, `fk_municipal`, `fk_ward`, `tol`, `org_code`, `created_date`, `last_updated_date`) VALUES
(1, 'श्रीनाथ सप्लायर्स', 'Shreenath Suppliers', '98765433210', 'surkhet@gmail.com', '1231', 6, 80, 638, 2, 'Airee chowk', 'AUTO11-19', '2021-11-19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int NOT NULL,
  `province` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `province_nepali` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `province`, `province_nepali`) VALUES
(1, 'Province 1', 'प्रदेश नं १'),
(2, 'Province 2', 'प्रदेश नं २'),
(3, 'Province 3', 'बाग्मती प्रदेश'),
(4, 'Province 4', 'गण्डकी प्रदेश'),
(5, 'Province 5', 'लुम्बिनी प्रदेश '),
(6, 'Province 6', 'कर्णाली प्रदेश'),
(7, 'Province 7', ' सुदुरपश्चिम प्रदेश');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL,
  `auth_key` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL,
  `fk_organization_id` int NOT NULL,
  `fk_branch_id` int NOT NULL,
  `status` int NOT NULL,
  `created_date` varchar(20) COLLATE utf8_unicode_520_ci NOT NULL,
  `type` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `auth_key`, `fk_organization_id`, `fk_branch_id`, `status`, `created_date`, `type`) VALUES
(1, 'demodemo@gmail.com', 'tuki@12345', 'authkey', 1, 1, 1, '2078-10-10', NULL),
(2, 'branch_user@gmail.com', 'tuki@12345', '61975a534ad57', 1, 1, 1, '2021-11-19', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `id` int NOT NULL,
  `ward` varchar(250) COLLATE utf8_unicode_520_ci NOT NULL,
  `fk_organization_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`id`, `ward`, `fk_organization_id`) VALUES
(1, '1', 1),
(2, '2', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_details`
--
ALTER TABLE `emp_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_post`
--
ALTER TABLE `emp_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `municipals`
--
ALTER TABLE `municipals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `emp_details`
--
ALTER TABLE `emp_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emp_post`
--
ALTER TABLE `emp_post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `municipals`
--
ALTER TABLE `municipals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=769;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ward`
--
ALTER TABLE `ward`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
