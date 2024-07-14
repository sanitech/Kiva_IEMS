-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 24, 2024 at 08:40 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iems`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dep` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dep`) VALUES
(1, 'CEO'),
(2, 'Operation'),
(3, 'Finance'),
(4, 'Supply Chain'),
(5, 'Maintenance'),
(6, 'ICT'),
(7, 'HR'),
(9, 'Sales & Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dep` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=482 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `dep`, `email`) VALUES
(422, 'Weldegebriel Reda', 'CEO', 'weldegebrielr@nationaltransportplc.com'),
(423, 'Mekonen Ashene', 'Finance', 'mekonena@nationaltransportplc.com'),
(424, 'Getachew Kiros', 'Sales & Marketing', 'getachewk@nationaltransportplc.com'),
(425, 'Teklebrhan Gidey', 'Operation', 'teklebrhang@nationaltransportplc.com'),
(426, 'Wogaso Molta', 'Maintenance & Engineering', 'wogasom@nationaltransportplc.com'),
(427, 'Wegayehu Aragaw', 'Supply Chain', 'wegayehua@nationaltransportplc.com'),
(428, 'Mohammed Osman', 'Huma Resorce', 'mohammedo@nationaltransportplc.com'),
(429, 'Zantawi Ayalew', 'Planning,Kaizen, Safety and Insurance ', 'zantawia@nationaltransportplc.com'),
(430, 'Aiymro Tegegn', 'CEO', 'aiymrot@nationaltransportplc.com'),
(431, 'Alemayehu Goshime', 'Supply Chain', 'alemayehug@nationaltransportplc.com'),
(432, 'Alemnesh Negash', 'CEO', 'alemineshn@nationaltransportplc.com'),
(433, 'Anberber Ayele', 'Maintenance', 'anberbira@nationaltransportplc.com'),
(434, 'Asegid Kenea', 'Supply Chain', 'asegidk@nationaltransportplc.com'),
(435, 'Assefa Geremu', 'Sales & Marketing', 'assefag@nationaltransportplc.com'),
(436, 'Checkol Hunegnaw', 'Finance', 'chekolh@nationaltransportplc.com'),
(437, 'Demeke Mekuria', 'Maintenance', 'demekem@nationaltransportplc.com'),
(438, 'Mahilet Kassahun', 'Sales & Marketing', 'mahiletk@nationaltransportplc.com'),
(439, 'Major Gebresilassie', 'Operation', 'majorg@nationaltransportplc.com'),
(440, 'Masre Wodajnew', 'Operation', 'masrew@nationaltransportplc.com'),
(441, 'Nahom Juhar', 'ICT Service', 'nahomj@nationaltransportplc.com'),
(442, 'Seadedin Beyan', 'Sales & Marketing', 'seadedinb@nationaltransportplc.com'),
(443, 'Simeneh Lema', 'General Service', 'simenehl@nationaltransportplc.com'),
(444, 'Taye T', 'Maintenance', 'tayet@nationaltransportplc.com'),
(445, 'Teklay Hailu', 'Finance', 'teklayh@nationaltransportplc.com'),
(446, 'Tsegaye Niguse', 'HR', 'tsegayen@nationaltransportplc.com'),
(447, 'Abreham Kinfu', 'Operation', 'abrehamk@nationaltransportplc.com'),
(448, 'Achalu Negash', 'Maintenance', 'achalun@nationaltransportplc.com'),
(449, 'Addisu Bisrat', 'Finance', 'adissub@nationaltransportplc.com'),
(450, 'Aderayesus Abebe', 'Operation', 'aderaya@nationaltransportplc.com'),
(451, 'Almaz Tadesse Dadi', 'Supply Chain', 'alemazt@nationaltransportplc.com'),
(452, 'Anteneh Tadesse', 'Maintenance', 'anteneht@nationaltransportplc.com'),
(453, 'Begna Leggesse', 'Supply Chain', 'begnal@nationaltransportplc.com'),
(454, 'Birhan Tegegn', 'Operation', 'birhant@nationaltransportplc.com'),
(455, 'Dadi Shimels Damena', 'Maintenance', 'dadis@nationaltransportplc.com'),
(456, 'Dereje Arega Begna ', 'Finance', 'derejea@nationaltransportplc.com'),
(457, 'Firehiwot Teshome', 'Supply Chain', 'firehiwott@nationaltransportplc.com'),
(458, 'Fitsum Fettuh', 'Operation', 'fitsumf@nationaltransportplc.com'),
(459, 'Fuad Mehamed', 'Maintenance', 'fuadm@nationaltransportplc.com'),
(460, 'Genet Daniel', 'Supply Chain', 'genetd@nationaltransportplc.com'),
(461, 'Hana Tegegn', 'Finance', 'hanat@nationaltransportplc.com'),
(462, 'Hasna Mohammed', 'Executive Secretary', 'hasnam@nationaltransportplc.com'),
(463, 'Kelemwerk Adnew', 'Human Resource', 'kelemwerka@nationaltransportplc.com'),
(464, 'Kiva Amsalu', 'ICT', 'kivaa@nationaltransportplc.com'),
(465, 'Matiyas Abebaw', 'Supply Chain', 'matiasa@nationaltransportplc.com'),
(466, 'Mekdes Derese', 'Operation', 'mekdesd@nationaltransportplc.com'),
(467, 'Melat G/kidan', 'Finance', 'melatg@nationaltransportplc.com'),
(468, 'Mimi Tamiru', 'Operation', 'mimit@nationaltransportplc.com'),
(469, 'Sebsibe Edilu', 'Finance', 'sebsibeb@nationaltransportplc.com'),
(470, 'Semehar Samuel', 'Maintenance', 'semehars@nationaltransportplc.com'),
(471, 'Sisay Tariku', 'Operation', 'sisayt@nationaltransportplc.com'),
(472, 'Timar Ashiber', 'Operation', 'timara@nationaltransportplc.com'),
(473, 'Wegayehu Girma', 'Maintenance', 'wegayehug@nationaltransportplc.com'),
(474, 'Wekeneh Ababu', 'Supply Chain', 'werkeneha@nationaltransportplc.com'),
(475, 'Werku Getachew', 'Human Resource', 'werkug@nationaltransportplc.com'),
(476, 'Worknesh Simeneh', 'Finance', 'workineshse@nationaltransport.com'),
(477, 'Yared Bekele', 'Maintenance', 'yaredb@nationaltransportplc.com'),
(478, 'Yared Solomon', 'ICT', 'yareds@nationaltransportplc.com'),
(479, 'Yeshitela Lema', 'Safety & Insurance', 'yeshitilal@nationaltransportplc.com'),
(480, 'Yohannes Birhanu', 'Maintenance', 'yohanesb@nationaltransportplc.com'),
(481, 'Zelalem Honja', 'Maintenance', 'zelalemh@nationaltransportplc.com');

-- --------------------------------------------------------

--
-- Table structure for table `error`
--

DROP TABLE IF EXISTS `error`;
CREATE TABLE IF NOT EXISTS `error` (
  `error_code` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `error_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`error_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `error`
--

INSERT INTO `error` (`error_code`, `error_type`) VALUES
('NT-IT-Error-01', 'Software Installation/Configuration'),
('NT-IT-Error-02', 'Software Licensing'),
('NT-IT-Error-03', ' Printer Troubleshooting'),
('NT-IT-Error-04', 'Network Connectivity problem'),
('NT-IT-Error-05', 'Virus/Malware problem'),
('NT-IT-Error-06', 'Mobile Device Support'),
('NT-IT-Error-07', 'Hardware Issues'),
('NT-IT-Error-08', 'Training'),
('NT-IT-Error-09', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `helpdesk`
--

DROP TABLE IF EXISTS `helpdesk`;
CREATE TABLE IF NOT EXISTS `helpdesk` (
  `issue_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dep` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `create_time` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `screenshot` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `error_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `work_start` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `work_end` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cause` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `by_who` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`issue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `sn` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `employee` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `item` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dep` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`sn`),
  KEY `item` (`item`),
  KEY `dep` (`dep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `dep` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` char(1) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  `profile` longtext COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `dep`, `last_login`, `status`, `profile`) VALUES
(10, 'super', '1b3231655cebb7a1f783eddf27d254ca', 'super', '2024-02-10 10:16:45', '1', ''),
(13, 'kiva amsalu', '21232f297a57a5a743894a0e4a801fc3', 'ICT', '2024-02-13 05:43:46', '1', ''),
(24, 'yared solomon', '21232f297a57a5a743894a0e4a801fc3', 'ICT', '2024-02-23 14:14:05', '1', ''),
(26, '', '959f4ff24b7c9bc2a37dded1fba370bc', 'Operation', '2024-02-13 05:40:58', '1', ''),
(27, '', '959f4ff24b7c9bc2a37dded1fba370bc', 'Finance', '2024-02-13 05:41:06', '1', ''),
(28, '', '959f4ff24b7c9bc2a37dded1fba370bc', 'Supply Chain', '2024-02-13 05:41:14', '1', ''),
(29, '', '959f4ff24b7c9bc2a37dded1fba370bc', 'Maintenance', '2024-02-13 05:41:31', '1', ''),
(30, '', '959f4ff24b7c9bc2a37dded1fba370bc', 'HR', '2024-02-23 14:19:53', '1', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
