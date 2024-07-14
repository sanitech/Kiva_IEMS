-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 09, 2024 at 08:21 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(8, 'Sales & Marketing'),
(9, 'Safety & Insurance'),
(10, 'Corporate Office'),
(11, 'General Service');

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
) ENGINE=InnoDB AUTO_INCREMENT=503 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `dep`, `email`) VALUES
(422, 'Weldegebriel Reda', 'CEO', 'weldegebrielr@nationaltransportplc.com'),
(423, 'Mekonen Ashene', 'Finance', 'mekonena@nationaltransportplc.com'),
(424, 'Getachew Kiros', 'Sales & Marketing', 'getachewk@nationaltransportplc.com'),
(425, 'Teklebrhan Gidey', 'Operation', 'teklebrhang@nationaltransportplc.com'),
(426, 'Wogaso Molta', 'Maintenance', 'wogasom@nationaltransportplc.com'),
(427, 'Wegayehu Aragaw', 'Supply Chain', 'wegayehua@nationaltransportplc.com'),
(428, 'Mohammed Osman', 'HR', 'mohammedo@nationaltransportplc.com'),
(429, 'Zantawi Ayalew', 'Safety & Insurance', 'zantawia@nationaltransportplc.com'),
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
(462, 'Hasna Mohammed', 'HR', 'hasnam@nationaltransportplc.com'),
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
(481, 'Zelalem Honja', 'Maintenance', 'zelalemh@nationaltransportplc.com'),
(482, 'Misrak Tegegn', 'Sales & Marketing', 'misrakt@nationaltransportplc.com'),
(483, 'Fetiya Nur', 'Sales & Marketing', 'fetiyan@nationaltransportplc.com'),
(484, 'Kedir Jemal', 'Safety & Insurance', 'kedirj@nationaltransportplc.com'),
(485, 'Ethiopia Tafese', 'Finance', 'ethiopiat@nationaltransportplc.com'),
(486, 'Firew Alemu', 'Sales & Marketing', 'firewa@nationaltransportplc.com'),
(487, 'Ermiyas Debele', 'Operation', 'ermiyasd@nationaltranspotrtplc.com'),
(489, 'Yeabsira Tadele', 'Sales & Marketing', 'yeabsirat@nationaltransportplc.com'),
(490, 'Werku Getachew', 'HR', 'werkug@nationaltransportplc.com'),
(491, 'Serkalem Atinafu', 'Supply Chain', 'serkalema@nationaltransportplc.com'),
(492, 'Almaz Tadesse', 'Supply Chain', 'almazt@nationaltransportplc.com'),
(496, 'Asmamaw Abebe', 'Supply Chain', 'asmamawa@nationaltransportplc.com'),
(497, 'Hiwot Bogale', 'Finance', 'hiwotb@nationaltransportplc.com'),
(500, 'Samrawit Belihu', 'General Service', 'samrawitb@nationaltransportplc.com'),
(501, 'Zulfa Jemal', 'Finance', 'zulfaj@nationaltransportplc.com'),
(502, 'Eyob Aden', 'Finance', 'eyoba@nationaltransportplc.com');

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
('NT-IT-Error-04', 'Network Connectivity Support'),
('NT-IT-Error-05', 'Virus/Malware Support'),
('NT-IT-Error-06', 'Mobile Device Support'),
('NT-IT-Error-07', 'Hardware Issues'),
('NT-IT-Error-08', 'Peachtree-Accounting Support'),
('NT-IT-Error-09', 'ERP -Odoo Support '),
('NT-IT-Error-10', 'WIFI not working '),
('NT-IT-Error-11', 'Remote Support through anydesk'),
('NT-IT-Error-12', 'Microsoft Office Support'),
('NT-IT-Error-13', 'Attendance Biometrics Support'),
('NT-IT-Error-14', 'Support'),
('NT-IT-Error-15', 'Backup/Restore');

-- --------------------------------------------------------

--
-- Table structure for table `helpdesk`
--

DROP TABLE IF EXISTS `helpdesk`;
CREATE TABLE IF NOT EXISTS `helpdesk` (
  `issue_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dep` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `subject` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
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

--
-- Dumping data for table `helpdesk`
--

INSERT INTO `helpdesk` (`issue_id`, `fname`, `dep`, `subject`, `create_time`, `status`, `screenshot`, `error_type`, `work_start`, `work_end`, `cause`, `by_who`, `date`, `location`) VALUES
('Help-00001', 'Semehar Samuel', 'Maintenance', '', '2024-02-28 06:02:30', 'done', '', 'Software Licensing', '2024-02-28 06:46:19', '2024-02-28 06:54:04', '', 'yared solomon', '2024-02-28', 'Dire Dawa'),
('Help-00002', 'Melat G/kidan', 'Finance', 'PRINTER ISN\"T WORKING', '2024-02-28 06:11:18', 'done', '', ' Printer Troubleshooting', '2024-02-28 06:37:32', '2024-02-28 07:16:46', '', 'yared solomon', '2024-02-28', 'Dire Dawa'),
('Help-00003', 'Werku Getachew', 'HR', '', '2024-02-28 06:59:36', 'done', '', 'Attendance Biometrics Support', '2024-02-28 07:00:27', '2024-02-28 07:28:57', '', 'kiva amsalu', '2024-02-28', 'Koka'),
('Help-00004', 'Werku Getachew', 'HR', 'urgent', '2024-02-28 06:59:56', 'done', '', 'Attendance Biometrics Support', '2024-02-28 08:29:59', '2024-02-28 08:34:58', '', 'kiva amsalu', '2024-02-28', 'Adama'),
('Help-00005', 'Fitsum Fettuh', 'Operation', '', '2024-02-27 05:53:05', 'done', '', 'Network Connectivity Support', '2024-02-27 06:28:42', '2024-02-27 06:52:29', 'There is a meeting in thier office.', 'yared solomon', '2024-02-27', 'Dire Dawa'),
('Help-00006', 'Zelalem Honja', 'Maintenance', 'computer doesn\'t start', '2024-02-27 05:59:10', 'done', '', 'Hardware Issues', '2024-02-27 05:59:25', '2024-02-27 06:55:19', '', 'kiva amsalu', '2024-02-27', 'Koka'),
('Help-00007', 'Yeshitela Lema', 'Safety & Insurance', 'connection help', '2024-02-27 06:08:12', 'done', '', 'Software Installation/Configuration', '', '2024-02-27 06:13:05', '', 'yared solomon', '2024-02-27', 'Dire Dawa'),
('Help-00008', 'Sebsibe Edilu', 'Finance', 'PRINTER SHARING WITH FINANCE DEPARTMENT ', '2024-02-27 06:16:50', 'done', '', ' Printer Troubleshooting', '2024-02-27 06:25:09', '2024-02-27 06:40:00', '', 'yared solomon', '2024-02-27', 'Dire Dawa'),
('Help-00009', 'Taye T', 'Maintenance', 'Printer Sharing', '2024-02-27 08:06:50', 'done', '', ' Printer Troubleshooting', '2024-02-27 08:08:37', '2024-02-27 08:28:17', 'Local Admin Password lost', 'kiva amsalu', '2024-02-27', 'Koka'),
('Help-00010', 'Sisay Tariku', 'Operation', '', '2024-02-27 11:13:50', 'done', '', ' Printer Troubleshooting', '2024-02-27 11:29:02', '2024-02-27 11:32:28', '', 'yared solomon', '2024-02-27', 'Dire Dawa'),
('Help-00011', 'Mimi Tamiru', 'Operation', '', '2024-02-27 11:19:17', 'done', '', ' Printer Troubleshooting', '', '2024-02-27 11:41:57', '', 'yared solomon', '2024-02-27', 'Dire Dawa'),
('Help-00012', 'Semehar Samuel', 'Maintenance', '', '2024-02-27 11:40:34', 'done', '', ' Printer Troubleshooting', '2024-02-27 11:42:07', '2024-02-27 11:42:19', '', 'yared solomon', '2024-02-27', 'Dire Dawa'),
('Help-00013', 'Wegayehu Aragaw', 'Supply Chain', 'I can\'t use my email through my wifi', '2024-02-27 11:54:36', 'done', '', 'WIFI not working ', '2024-02-27 11:58:16', '2024-02-27 12:02:45', '', 'yared solomon', '2024-02-27', 'Dire Dawa'),
('Help-00014', 'Zantawi Ayalew', 'Safety & Insurance', 'My WiFi router is not working', '2024-02-27 12:30:28', 'done', '', 'WIFI not working ', '2024-02-27 13:01:48', '2024-02-27 13:02:04', '', 'yared solomon', '2024-02-27', 'Dire Dawa'),
('Help-00015', 'Yeabsira Tadele', 'Sales & Marketing', 'can not edit the files', '2024-02-27 12:56:45', 'done', '', 'Microsoft Office Support', '2024-02-27 13:59:31', '2024-03-04 12:32:04', '', 'yared solomon', '2024-02-27', 'Addis Abeba'),
('Help-00016', 'Zelalem Honja', 'Maintenance', 'windows expire', '2024-02-27 13:12:59', 'done', '', 'Software Licensing', '2024-02-27 13:15:11', '2024-02-27 13:17:24', '', 'kiva amsalu', '2024-02-27', 'Koka'),
('Help-00017', 'Sebsibe Edilu', 'Finance', 'PRINTER SHARING PROBLEM', '2024-02-29 05:55:52', 'done', '', 'Network Connectivity Support', '2024-02-29 06:29:34', '2024-02-29 07:02:05', '', 'yared solomon', '2024-02-29', 'Dire Dawa'),
('Help-00018', 'Zantawi Ayalew', 'Safety & Insurance', 'Connect my pc with printer and sharing', '2024-03-01 06:19:13', 'done', '', ' Printer Troubleshooting', '2024-03-01 06:22:00', '2024-03-01 06:29:05', '', 'yared solomon', '2024-03-01', 'Dire Dawa'),
('Help-00019', 'Kedir Jemal', 'Safety & Insurance', 'word update ', '2024-03-01 07:01:05', 'done', '', 'Microsoft Office Support', '2024-03-04 12:31:55', '2024-03-04 12:33:26', '', 'yared solomon', '2024-03-01', 'Dire Dawa'),
('Help-00020', 'Addisu Bisrat', 'Finance', 'Printing is not connected please can you', '2024-02-29 06:21:35', 'done', '', ' Printer Troubleshooting', '2024-02-29 07:01:54', '2024-02-29 07:31:54', '', 'yared solomon', '2024-02-29', 'Dire Dawa'),
('Help-00021', 'Semehar Samuel', 'Maintenance', '', '2024-03-04 06:29:30', 'done', '', 'Hardware Issues', '2024-03-04 07:20:41', '2024-03-04 07:20:46', '', 'yared solomon', '2024-03-04', 'Dire Dawa'),
('Help-00022', 'Mekonen Ashene', 'Finance', 'Our wifi network is not working', '2024-03-04 06:37:07', 'done', '', 'Network Connectivity Support', '2024-03-04 08:04:21', '2024-03-04 08:04:27', '', 'yared solomon', '2024-03-04', 'Dire Dawa'),
('Help-00023', 'Semehar Samuel', 'Maintenance', '', '2024-03-04 06:42:14', 'done', '', 'Virus/Malware Support', '2024-03-04 08:37:15', '2024-03-04 11:08:45', '', 'yared solomon', '2024-03-04', 'Dire Dawa'),
('Help-00024', 'Semehar Samuel', 'Maintenance', '', '2024-03-04 06:45:32', 'done', '', ' Printer Troubleshooting', '2024-03-04 07:21:10', '2024-03-04 07:31:45', '', 'yared solomon', '2024-03-04', 'Dire Dawa'),
('Help-00025', 'Werku Getachew', 'HR', 'urgent', '2024-03-04 12:33:32', 'done', '', 'Attendance Biometrics Support', '2024-03-04 12:39:39', '2024-03-04 12:42:32', '', 'kiva amsalu', '2024-03-04', 'Koka'),
('Help-00026', 'Teklay Hailu', 'Finance', 'instability of  net work for Peachtree ', '2024-03-04 12:46:41', 'done', '', 'Network Connectivity Support', '2024-03-04 13:42:32', '2024-03-04 13:46:35', '', 'yared solomon', '2024-03-04', 'Dire Dawa'),
('Help-00027', 'Zantawi Ayalew', 'Safety & Insurance', 'My PC is not properly working, some time', '2024-03-04 13:31:50', 'done', '', 'Hardware Issues', '2024-03-30 05:11:19', '2024-03-30 05:21:05', '', 'yared solomon', '2024-03-04', 'Dire Dawa'),
('Help-00028', 'Werku Getachew', 'HR', 'scanner problem', '2024-03-04 14:00:38', 'done', '', ' Printer Troubleshooting', '2024-03-04 14:01:19', '2024-03-04 14:05:49', '', 'kiva amsalu', '2024-03-04', 'Adama'),
('Help-00029', 'Genet Daniel', 'Supply Chain', 'STACK COMPUTER, VIRUS ', '2024-03-06 05:31:37', 'done', '', 'Software Installation/Configuration', '2024-03-07 07:39:40', '2024-03-07 08:25:23', '', 'yared solomon', '2024-03-06', 'Addis Abeba'),
('Help-00030', 'Birhan Tegegn', 'Operation', '', '2024-03-05 12:34:19', 'done', '', 'Software Installation/Configuration', '2024-03-05 12:36:42', '2024-03-05 12:48:08', '', 'kiva amsalu', '2024-03-05', 'Adama'),
('Help-00031', 'Mimi Tamiru', 'Operation', 'ለሶስተኛ ጊዜ ነው የላክነው ምንም አልተሰራም በሌላ ባለሞያ እን', '2024-03-06 08:38:26', 'done', '', 'Software Installation/Configuration', '2024-03-06 12:01:34', '2024-03-06 12:13:47', '', 'yared solomon', '2024-03-06', 'Dire Dawa'),
('Help-00032', 'Sebsibe Edilu', 'Finance', 'problem of imporing file on excel', '2024-03-06 11:15:42', 'done', '', 'Peachtree-Accounting Support', '2024-03-06 12:27:40', '2024-03-06 12:29:47', '', 'yared solomon', '2024-03-06', 'Dire Dawa'),
('Help-00033', 'Semehar Samuel', 'Maintenance', '', '2024-03-06 12:31:20', 'done', '', 'Software Installation/Configuration', '2024-03-09 06:05:12', '2024-03-09 06:18:35', '', 'yared solomon', '2024-03-06', 'Dire Dawa'),
('Help-00034', 'Werku Getachew', 'HR', 'please register our transferred employee', '2024-03-08 05:50:25', 'done', '', 'Attendance Biometrics Support', '2024-03-08 05:51:09', '2024-03-08 06:04:59', '', 'kiva amsalu', '2024-03-08', 'Adama'),
('Help-00035', 'Sebsibe Edilu', 'Finance', 'DEVICE PROBLEM ON SPEAKER OUT', '2024-03-07 08:00:01', 'done', '', 'Software Installation/Configuration', '2024-03-07 08:56:44', '2024-03-07 09:01:50', '', 'yared solomon', '2024-03-07', 'Dire Dawa'),
('Help-00036', 'Wogaso Molta', 'Maintenance', 'I can\'t connect my pc with Wi-Fi network', '2024-03-11 05:44:19', 'done', '', 'Network Connectivity Support', '2024-03-11 05:44:46', '2024-03-11 06:07:03', '', 'yared solomon', '2024-03-11', 'Dire Dawa'),
('Help-00037', 'Werku Getachew', 'HR', 'printer Problem', '2024-03-11 06:21:46', 'done', '', ' Printer Troubleshooting', '2024-03-11 06:23:13', '2024-03-11 06:26:07', '', 'kiva amsalu', '2024-03-11', 'Adama'),
('Help-00038', 'Dereje Arega Begna ', 'Finance', '', '2024-03-11 06:22:36', 'done', '', 'Network Connectivity Support', '2024-03-11 06:23:25', '2024-03-11 06:29:24', '', 'kiva amsalu', '2024-03-11', 'Adama'),
('Help-00039', 'Alemayehu Goshime', 'Supply Chain', 'Connect my PC to the printer.', '2024-03-12 06:40:09', 'done', '', ' Printer Troubleshooting', '2024-03-12 06:41:47', '2024-03-12 06:56:04', '', 'yared solomon', '2024-03-12', 'Dire Dawa'),
('Help-00040', 'Wogaso Molta', 'Maintenance', 'need of ERP /Oddo Pass word updated', '2024-03-11 13:07:27', 'done', '', 'ERP -Odoo support ', '2024-03-11 13:22:08', '2024-03-11 13:31:03', '', 'yared solomon', '2024-03-11', 'Dire Dawa'),
('Help-00041', 'Firehiwot Teshome', 'Supply Chain', 'VIRUS ,LOW RAM, STACK\r\n', '2024-03-11 13:12:18', 'done', '', 'Software Installation/Configuration', '2024-03-12 05:47:42', '2024-03-12 06:34:36', '', 'yared solomon', '2024-03-11', 'Dire Dawa'),
('Help-00042', 'Alemnesh Negash', 'CEO', 'Software installation, network connectiv', '2024-03-13 06:15:48', 'done', '', 'Software Installation/Configuration', '2024-03-13 06:16:06', '2024-03-13 06:21:04', '', 'kiva amsalu', '2024-03-13', 'Adama'),
('Help-00043', 'Zantawi Ayalew', 'Safety & Insurance', '', '2024-03-13 12:25:01', 'done', '', 'Remote Support through anydesk', '2024-03-13 12:26:19', '2024-03-13 12:28:16', '', 'yared solomon', '2024-03-13', 'Dire Dawa'),
('Help-00044', 'Mimi Tamiru', 'Operation', 'ስራ መስራት አልቻልም አንድ ወረቀት መያዝ ከዛ ማውጣት ለዚህ ወ', '2024-03-13 12:51:25', 'done', '', ' Printer Troubleshooting', '2024-03-14 11:18:28', '2024-03-21 14:15:17', '', 'yared solomon', '2024-03-13', 'Dire Dawa'),
('Help-00045', 'Teklay Hailu', 'Finance', '', '2024-03-14 05:37:38', 'done', '', ' Printer Troubleshooting', '2024-03-14 05:37:56', '2024-03-14 05:42:19', '', 'yared solomon', '2024-03-14', 'Dire Dawa'),
('Help-00046', 'Checkol Hunegnaw', 'Finance', '', '2024-03-14 07:05:36', 'done', '', ' Printer Troubleshooting', '2024-03-14 07:07:51', '2024-03-14 07:10:06', '', 'kiva amsalu', '2024-03-14', 'Adama'),
('Help-00047', 'Werku Getachew', 'HR', 'my pc is not fully functional.', '2024-03-14 07:07:23', 'done', '', 'Software Licensing', '2024-03-14 07:09:47', '2024-03-14 07:15:25', '', 'kiva amsalu', '2024-03-14', 'Adama'),
('Help-00048', 'Yohannes Birhanu', 'Maintenance', 'Printer connectivity issue', '2024-03-14 07:52:34', 'done', '', ' Printer Troubleshooting', '2024-03-14 07:55:36', '2024-03-14 08:17:49', '', 'yared solomon', '2024-03-14', 'Dire Dawa'),
('Help-00049', 'Mekonen Ashene', 'Finance', 'printer case', '2024-03-14 07:55:18', 'done', '', 'Network Connectivity Support', '2024-03-14 11:29:06', '2024-03-14 11:45:37', '', 'yared solomon', '2024-03-14', 'Dire Dawa'),
('Help-00050', 'Mekonen Ashene', 'Finance', '', '2024-03-15 06:07:16', 'done', '', ' Printer Troubleshooting', '2024-03-15 06:08:22', '2024-03-15 11:13:54', '', 'yared solomon', '2024-03-15', 'Dire Dawa'),
('Help-00051', 'Melat G/kidan', 'Finance', 'Windows update', '2024-03-15 06:07:51', 'done', '', 'Software Installation/Configuration', '2024-03-15 06:08:27', '2024-03-15 11:13:47', '', 'yared solomon', '2024-03-15', 'Addis Abeba'),
('Help-00052', 'Sebsibe Edilu', 'Finance', 'importing problem', '2024-03-15 11:52:13', 'done', '', 'Peachtree-Accounting Support', '2024-03-16 05:42:06', '2024-03-16 08:01:50', '', 'yared solomon', '2024-03-15', 'Addis Abeba'),
('Help-00053', 'Taye T', 'Maintenance', '', '2024-03-16 05:55:00', 'done', '', 'Software Installation/Configuration', '2024-03-16 05:59:36', '2024-03-16 06:08:28', '', 'kiva amsalu', '2024-03-16', 'Adama'),
('Help-00054', 'Mekonen Ashene', 'Finance', 'Wifi doesn\'t working', '2024-03-16 08:01:13', 'done', '', 'Network Connectivity Support', '2024-03-16 08:01:59', '2024-03-16 08:29:41', '', 'yared solomon', '2024-03-16', 'Dire Dawa'),
('Help-00055', 'Teklay Hailu', 'Finance', '', '2024-03-18 05:26:40', 'done', '', 'Peachtree-Accounting Support', '2024-03-18 06:04:19', '2024-03-18 06:19:41', '', 'yared solomon', '2024-03-18', 'Dire Dawa'),
('Help-00056', 'Zulfa Jemal', 'Finance', '', '2024-03-18 05:53:15', 'done', '', 'Hardware Issues', '2024-03-18 05:55:57', '2024-03-18 07:06:32', '', 'kiva amsalu', '2024-03-18', 'Adama'),
('Help-00057', 'Firew Alemu', 'Sales & Marketing', 'can not print ', '2024-03-18 12:14:27', 'done', '', ' Printer Troubleshooting', '2024-03-18 13:13:33', '2024-03-18 13:18:40', '', 'yared solomon', '2024-03-18', 'Dire Dawa'),
('Help-00058', 'Ethiopia Tafese', 'Finance', 'install PDF software', '2024-03-18 12:36:46', 'done', '', 'Software Installation/Configuration', '2024-04-01 06:05:01', '2024-04-01 06:14:46', '', 'yared solomon', '2024-03-18', 'Dire Dawa'),
('Help-00059', 'Werku Getachew', 'HR', '', '2024-03-19 05:52:05', 'done', '', 'Attendance Biometrics Support', '2024-03-19 05:52:37', '2024-03-19 06:00:26', '', 'kiva amsalu', '2024-03-19', 'Adama'),
('Help-00060', 'Yeabsira Tadele', 'Sales & Marketing', '- Activate MS Windows & Office.\r\n- Insta', '2024-03-19 07:32:44', 'done', '', 'Software Installation/Configuration', '2024-03-19 07:37:11', '2024-03-19 07:54:47', '', 'yared solomon', '2024-03-19', 'Addis Abeba'),
('Help-00061', 'Werku Getachew', 'HR', '', '2024-03-19 12:42:25', 'done', '', 'Attendance Biometrics Support', '2024-03-19 12:45:07', '2024-03-19 12:45:15', '', 'kiva amsalu', '2024-03-19', 'Koka'),
('Help-00062', 'Werku Getachew', 'HR', 'Support for Excell ', '2024-03-21 05:47:11', 'done', '', 'Microsoft Office Support', '2024-03-21 05:47:41', '2024-03-21 08:17:42', 'forget to close status', 'kiva amsalu', '2024-03-21', 'Adama'),
('Help-00063', 'Asegid Kenea', 'Supply Chain', 'anti varus  date life 6 day left to expi', '2024-03-21 15:34:11', 'done', '', 'Software Installation/Configuration', '2024-03-23 05:15:06', '2024-03-24 08:43:06', '', 'yared solomon', '2024-03-21', 'Addis Abeba'),
('Help-00064', 'Werku Getachew', 'HR', 'support', '2024-03-23 06:26:11', 'done', '', 'Software Installation/Configuration', '2024-03-23 06:26:33', '2024-03-23 06:50:26', '', 'kiva amsalu', '2024-03-23', 'Adama'),
('Help-00065', 'Checkol Hunegnaw', 'Finance', 'activation key', '2024-03-23 06:49:41', 'done', '', 'Virus/Malware Support', '2024-03-23 06:50:38', '2024-03-23 07:03:35', '', 'kiva amsalu', '2024-03-23', 'Addis Abeba'),
('Help-00066', 'Timar Ashiber', 'Operation', 'Activate MS-office', '2024-03-24 08:17:47', 'done', '', 'Software Licensing', '2024-03-25 07:01:59', '2024-03-25 07:07:49', '', 'yared solomon', '2024-03-24', 'Dire Dawa'),
('Help-00067', 'Simeneh Lema', 'General Service', 'Install Anti-virus', '2024-03-25 05:43:53', 'done', '', 'Virus/Malware Support', '2024-03-25 06:17:59', '2024-03-25 06:36:14', '', 'yared solomon', '2024-03-25', 'Dire Dawa'),
('Help-00068', 'Ethiopia Tafese', 'Finance', '', '2024-03-25 08:14:00', 'done', '', 'Peachtree-Accounting Support', '2024-03-25 08:14:49', '2024-03-25 15:32:47', '', 'yared solomon', '2024-03-25', 'Dire Dawa'),
('Help-00069', 'Fuad Mehamed', 'Maintenance', '', '2024-03-26 11:17:03', 'done', '', 'Network Connectivity Support', '2024-03-26 11:18:00', '2024-03-26 11:26:05', '', 'kiva amsalu', '2024-03-26', 'Koka'),
('Help-00070', 'Dereje Arega Begna ', 'Finance', '', '2024-03-27 06:18:02', 'done', '', ' Printer Troubleshooting', '2024-03-27 06:23:05', '2024-03-27 06:53:13', '', 'kiva amsalu', '2024-03-27', 'Adama'),
('Help-00071', 'Zulfa Jemal', 'Finance', '', '2024-03-27 06:22:10', 'done', '', 'Network Connectivity Support', '2024-03-27 06:34:39', '2024-03-27 06:53:02', '', 'kiva amsalu', '2024-03-27', 'Adama'),
('Help-00072', 'Werku Getachew', 'HR', 'Microsoft Excell support', '2024-03-27 06:52:30', 'done', '', 'Microsoft Office Support', '2024-03-27 06:53:24', '2024-03-27 07:27:48', '', 'kiva amsalu', '2024-03-27', 'Adama'),
('Help-00073', 'Teklebrhan Gidey', 'Operation', 'Printer Tonner Powder is ready. please w', '2024-03-27 13:18:47', 'done', '', ' Printer Troubleshooting', '2024-03-28 07:53:26', '2024-03-28 08:01:42', '', 'yared solomon', '2024-03-27', 'Dire Dawa'),
('Help-00074', 'Serkalem Atinafu', 'Supply Chain', 'scanner support', '2024-03-28 06:58:44', 'done', '', 'Mobile Device Support', '2024-03-28 07:02:40', '2024-03-28 07:03:41', '', 'kiva amsalu', '2024-03-28', 'Koka'),
('Help-00075', 'Werku Getachew', 'HR', '', '2024-03-28 11:32:55', 'done', '', 'Attendance Biometrics Support', '2024-03-28 11:33:23', '2024-03-28 12:26:07', '', 'kiva amsalu', '2024-03-28', 'Koka'),
('Help-00076', 'Zantawi Ayalew', 'Safety & Insurance', 'Email send is rebouncing back.\r\n', '2024-03-29 14:08:00', 'done', '', 'Software Installation/Configuration', '2024-03-30 06:59:18', '2024-03-30 07:02:37', '', 'yared solomon', '2024-03-29', 'Dire Dawa'),
('Help-00077', 'Firew Alemu', 'Sales & Marketing', 'Network box and cable error ', '2024-03-30 06:25:58', 'done', '', 'Network Connectivity Support', '2024-04-02 12:19:29', '2024-04-03 06:04:56', '', 'yared solomon', '2024-03-30', 'Dire Dawa'),
('Help-00078', 'Birhan Tegegn', 'Operation', '', '2024-03-30 06:54:24', 'done', '', 'Software Installation/Configuration', '2024-03-30 07:13:06', '2024-03-30 07:26:50', '', 'kiva amsalu', '2024-03-30', 'Adama'),
('Help-00079', 'Dadi Shimels Damena', 'Maintenance', '', '2024-04-01 07:47:20', 'done', '', 'Network Connectivity Support', '2024-04-01 07:54:56', '2024-04-01 08:00:40', '', 'kiva amsalu', '2024-04-01', 'Koka'),
('Help-00080', 'Fuad Mehamed', 'Maintenance', 'color refill for copy machine ', '2024-04-01 07:49:53', 'done', '', ' Printer Troubleshooting', '2024-04-04 11:49:12', '2024-04-04 11:49:34', '', 'kiva amsalu', '2024-04-01', 'Koka'),
('Help-00081', 'Zelalem Honja', 'Maintenance', 'PLESS SHER ME PRENTER WITH COPUTER', '2024-04-01 07:54:22', 'done', '', ' Printer Troubleshooting', '2024-04-01 07:55:15', '2024-04-01 08:01:08', '', 'kiva amsalu', '2024-04-01', 'Koka'),
('Help-00082', 'Sebsibe Edilu', 'Finance', 'Install MS Windows, Office & Peachtree', '2024-04-01 11:45:31', 'done', '', 'Software Installation/Configuration', '2024-04-01 11:49:07', '2024-04-01 14:04:50', '', 'yared solomon', '2024-04-01', 'Dire Dawa'),
('Help-00083', 'Kedir Jemal', 'Safety & Insurance', 'Install anti virus and Power Geez', '2024-04-02 06:22:59', 'done', '', 'Virus/Malware Support', '2024-04-02 06:23:43', '2024-04-02 12:18:00', '', 'yared solomon', '2024-04-02', 'Dire Dawa'),
('Help-00084', 'Zantawi Ayalew', 'Safety & Insurance', 'Install anti virus and Power Geez', '2024-04-02 06:23:26', 'done', '', 'Virus/Malware Support', '2024-04-02 07:51:28', '2024-04-02 12:17:49', '', 'yared solomon', '2024-04-02', 'Dire Dawa'),
('Help-00085', 'Samrawit Belihu', 'General Service', 'Unable to print', '2024-04-03 12:42:03', 'done', '', ' Printer Troubleshooting', '2024-04-03 12:42:30', '2024-04-03 12:56:31', '', 'yared solomon', '2024-04-03', 'Dire Dawa'),
('Help-00086', 'Sebsibe Edilu', 'Finance', 'network and peachtree connection', '2024-04-04 05:27:01', 'done', '', 'Network Connectivity Support', '2024-04-06 08:26:15', '2024-04-06 08:38:36', '', 'yared solomon', '2024-04-04', 'Dire Dawa'),
('Help-00087', 'Werku Getachew', 'HR', '\"you\'r windows license will expire soon\"', '2024-04-04 11:53:56', 'done', '', 'Software Licensing', '2024-04-04 12:07:11', '2024-04-04 12:08:59', '', 'kiva amsalu', '2024-04-04', 'Adama'),
('Help-00088', 'Werku Getachew', 'HR', '', '2024-04-04 11:54:10', 'done', '', 'Attendance Biometrics Support', '2024-04-04 12:07:26', '2024-04-04 12:09:15', '', 'kiva amsalu', '2024-04-04', 'Koka'),
('Help-00089', 'Firew Alemu', 'Sales & Marketing', 'Power Ghazi  Software installation ', '2024-04-04 12:35:02', 'done', '', 'Software Installation/Configuration', '2024-04-05 13:10:39', '2024-04-05 13:10:48', '', 'yared solomon', '2024-04-04', 'Dire Dawa'),
('Help-00090', 'Fuad Mehamed', 'Maintenance', 'Email problem', '2024-04-04 13:34:00', 'done', '', 'Software Installation/Configuration', '2024-04-04 13:55:55', '2024-04-04 13:57:43', '', 'kiva amsalu', '2024-04-04', 'Koka'),
('Help-00091', 'Samrawit Belihu', 'General Service', 'Unable to print', '2024-04-05 05:54:47', 'done', '', ' Printer Troubleshooting', '2024-04-20 08:03:24', '2024-04-20 08:14:56', '', 'yared solomon', '2024-04-05', 'Dire Dawa'),
('Help-00092', 'Alemnesh Negash', 'CEO', 'Image to text conversation', '2024-04-05 06:44:36', 'done', '', 'Support', '2024-04-05 06:45:12', '2024-04-05 06:56:22', '', 'kiva amsalu', '2024-04-05', 'Adama'),
('Help-00093', 'Alemnesh Negash', 'CEO', 'MS-office licensing', '2024-04-05 07:34:41', 'done', '', 'Software Licensing', '2024-04-05 07:36:11', '2024-04-05 07:40:19', '', 'kiva amsalu', '2024-04-05', 'Adama'),
('Help-00094', 'Alemnesh Negash', 'CEO', 'antivirus installation\r\n', '2024-04-05 07:35:04', 'done', '', 'Virus/Malware Support', '2024-04-05 07:36:21', '2024-04-05 07:40:31', '', 'kiva amsalu', '2024-04-05', 'Adama'),
('Help-00095', 'Yeshitela Lema', 'Safety & Insurance', 'wifi battry problem', '2024-04-05 11:18:19', 'done', '', 'WIFI not working ', '2024-04-26 13:50:29', '2024-04-26 14:18:58', '', 'yared solomon', '2024-04-05', 'Dire Dawa'),
('Help-00096', 'Firew Alemu', 'Sales & Marketing', 'Refill tonner', '2024-04-06 08:30:33', 'done', '', ' Printer Troubleshooting', '2024-04-06 08:30:51', '2024-04-06 08:38:15', '', 'yared solomon', '2024-04-06', 'Dire Dawa'),
('Help-00097', 'Yeshitela Lema', 'Safety & Insurance', 'printer problem ', '2024-04-06 09:30:19', 'done', '', ' Printer Troubleshooting', '2024-04-08 07:06:38', '2024-04-08 07:23:45', '', 'yared solomon', '2024-04-06', 'Dire Dawa'),
('Help-00098', 'Mimi Tamiru', 'Operation', 'ያሬዴ ፕሪተሩ ኮፕም አልሰራ ስላለ መተክ ብታይልን\r\n', '2024-04-08 05:34:01', 'done', '', ' Printer Troubleshooting', '2024-04-08 07:03:20', '2024-04-08 07:23:51', '', 'yared solomon', '2024-04-08', 'Dire Dawa'),
('Help-00099', 'Taye T', 'Maintenance', 'they couldn\'t hear my voice in meeting', '2024-04-08 05:55:29', 'done', '', 'Software Installation/Configuration', '2024-04-08 05:56:19', '2024-04-08 06:03:55', '', 'kiva amsalu', '2024-04-08', 'Adama'),
('Help-00100', 'Asmamaw Abebe', 'Supply Chain', 'Activate window and office', '2024-04-08 08:34:51', 'done', '', 'Software Licensing', '2024-04-08 08:39:48', '2024-04-08 11:09:56', '', 'yared solomon', '2024-04-08', 'Dire Dawa'),
('Help-00101', 'Birhan Tegegn', 'Operation', 'My computer is stuck for a long time and', '2024-04-10 05:55:17', 'done', '', 'Software Installation/Configuration', '2024-04-10 06:28:59', '2024-04-10 06:29:07', '', 'kiva amsalu', '2024-04-10', 'Adama'),
('Help-00102', 'Birhan Tegegn', 'Operation', 'My computer is stuck for a long time and', '2024-04-10 05:55:24', 'done', '', 'Software Installation/Configuration', '2024-04-10 06:08:26', '2024-04-10 06:27:10', '', 'kiva amsalu', '2024-04-10', 'Adama'),
('Help-00103', 'Werku Getachew', 'HR', '', '2024-04-10 07:23:47', 'done', '', 'Attendance Biometrics Support', '2024-04-10 07:24:17', '2024-04-10 07:28:23', '', 'kiva amsalu', '2024-04-10', 'Adama'),
('Help-00104', 'Yeshitela Lema', 'Safety & Insurance', '', '2024-04-11 05:12:36', 'done', '', 'Virus/Malware Support', '2024-04-11 05:13:46', '2024-04-11 06:23:02', '', 'yared solomon', '2024-04-11', 'Dire Dawa'),
('Help-00105', 'Yared Bekele', 'Maintenance', '', '2024-04-11 05:13:17', 'done', '', 'Virus/Malware Support', '2024-04-11 05:13:53', '2024-04-11 06:22:50', '', 'yared solomon', '2024-04-11', 'Dire Dawa'),
('Help-00106', 'Anberber Ayele', 'Maintenance', 'e mail not supporetd ', '2024-04-11 07:37:57', 'done', '', 'Network Connectivity Support', '2024-04-12 05:13:50', '2024-04-12 06:29:58', '', 'yared solomon', '2024-04-11', 'Addis Abeba'),
('Help-00107', 'Zelalem Honja', 'Maintenance', '', '2024-04-11 08:09:46', 'done', '', 'Software Installation/Configuration', '2024-04-11 08:47:13', '2024-04-11 08:56:39', '', 'kiva amsalu', '2024-04-11', 'Koka'),
('Help-00108', 'Zelalem Honja', 'Maintenance', '', '2024-04-11 08:09:57', 'done', '', 'Software Licensing', '2024-04-11 08:47:37', '2024-04-11 08:56:29', '', 'kiva amsalu', '2024-04-11', 'Koka'),
('Help-00109', 'Yohannes Birhanu', 'Maintenance', 'Please install Catia V5 on my computer.', '2024-04-12 07:20:14', 'done', '', 'Software Installation/Configuration', '2024-04-16 07:32:26', '2024-04-16 11:26:38', '', 'yared solomon', '2024-04-12', 'Dire Dawa'),
('Help-00110', 'Timar Ashiber', 'Operation', 'Top urgent', '2024-04-12 08:07:48', 'done', '', 'Software Installation/Configuration', '2024-04-12 08:43:29', '2024-04-12 08:54:54', '', 'yared solomon', '2024-04-12', 'Dire Dawa'),
('Help-00111', 'Wekeneh Ababu', 'Supply Chain', 'Install and activate Anti-virus', '2024-04-13 09:16:53', 'done', '', 'Virus/Malware Support', '2024-04-13 09:18:16', '2024-04-15 06:15:14', '', 'yared solomon', '2024-04-13', 'Addis Abeba'),
('Help-00112', 'Yeabsira Tadele', 'Sales & Marketing', 'Install and activate Anti-virus', '2024-04-13 09:17:54', 'done', '', 'Virus/Malware Support', '2024-04-13 09:18:23', '2024-04-15 06:15:01', '', 'yared solomon', '2024-04-13', 'Addis Abeba'),
('Help-00113', 'Wogaso Molta', 'Maintenance', 'Pending posts:\r\nFrom: wogasom@nationaltr', '2024-04-14 09:03:31', 'done', '', 'Support', '2024-04-26 13:49:41', '2024-04-26 14:19:11', '', 'yared solomon', '2024-04-14', 'Dire Dawa'),
('Help-00114', 'Hiwot Bogale', 'Finance', 'Re-install telegram desktop', '2024-04-15 06:32:52', 'done', '', 'Software Installation/Configuration', '2024-04-15 06:33:31', '2024-04-15 06:42:32', '', 'yared solomon', '2024-04-15', 'Dire Dawa'),
('Help-00115', 'Sisay Tariku', 'Operation', 'There is a network flactuation', '2024-04-15 07:02:39', 'done', '', 'Network Connectivity Support', '2024-04-15 13:31:45', '2024-04-15 13:49:34', '', 'yared solomon', '2024-04-15', 'Dire Dawa'),
('Help-00116', 'Werku Getachew', 'HR', '', '2024-04-15 08:20:08', 'done', '', 'Support', '2024-04-15 08:20:29', '2024-04-15 08:31:05', '', 'kiva amsalu', '2024-04-15', 'Adama'),
('Help-00117', 'Mohammed Osman', 'HR', 'My scree goes to black after I signed in', '2024-04-15 13:34:29', 'done', '', 'Support', '2024-04-15 13:35:06', '2024-04-15 13:49:20', '', 'yared solomon', '2024-04-15', 'Dire Dawa'),
('Help-00118', 'Ermiyas Debele', 'Operation', 'Install Anti-Virus', '2024-04-15 13:35:35', 'done', '', 'Virus/Malware Support', '2024-04-15 13:49:43', '2024-04-15 14:14:40', '', 'yared solomon', '2024-04-15', 'Dire Dawa'),
('Help-00119', 'Sisay Tariku', 'Operation', 'Install Anti-Virus', '2024-04-15 13:35:45', 'done', '', 'Virus/Malware Support', '2024-04-15 13:49:49', '2024-04-15 14:14:33', '', 'yared solomon', '2024-04-15', 'Dire Dawa'),
('Help-00120', 'Mekdes Derese', 'Operation', 'Install Anti-Virus', '2024-04-15 13:35:55', 'done', '', 'Virus/Malware Support', '2024-04-15 13:49:56', '2024-04-15 14:14:26', '', 'yared solomon', '2024-04-15', 'Dire Dawa'),
('Help-00121', 'Zelalem Honja', 'Maintenance', 'copy machine paper jam', '2024-04-16 12:25:38', 'done', '', ' Printer Troubleshooting', '2024-04-16 12:27:32', '2024-04-16 12:34:46', '', 'kiva amsalu', '2024-04-16', 'Koka'),
('Help-00122', 'Fuad Mehamed', 'Maintenance', '', '2024-04-16 12:25:55', 'done', '', ' Printer Troubleshooting', '2024-04-16 12:35:16', '2024-04-16 12:37:23', '', 'kiva amsalu', '2024-04-16', 'Koka'),
('Help-00123', 'Zelalem Honja', 'Maintenance', 'printer toner ', '2024-04-17 07:43:37', 'done', '', 'Hardware Issues', '2024-04-18 12:18:36', '2024-04-18 12:19:16', '', 'kiva amsalu', '2024-04-17', 'Koka'),
('Help-00124', 'Sebsibe Edilu', 'Finance', 'I can\'t work on my company on the server', '2024-04-17 08:36:01', 'done', '', 'Peachtree-Accounting Support', '2024-04-17 08:36:27', '2024-04-17 11:36:36', '', 'yared solomon', '2024-04-17', 'Dire Dawa'),
('Help-00125', 'Teklebrhan Gidey', 'Operation', 'ወረቀት አንድ ያወጣል አንድ ደግሞ ይዛል', '2024-04-18 05:49:33', 'done', '', ' Printer Troubleshooting', '2024-04-18 06:52:21', '2024-04-18 07:12:31', '', 'yared solomon', '2024-04-18', 'Dire Dawa'),
('Help-00126', 'Werku Getachew', 'HR', 'Scanner Support', '2024-04-18 06:11:52', 'done', '', 'Support', '2024-04-18 06:12:16', '2024-04-18 06:48:30', '', 'kiva amsalu', '2024-04-18', 'Adama'),
('Help-00127', 'Wogaso Molta', 'Maintenance', 'action', '2024-04-18 11:33:48', 'done', '', ' Printer Troubleshooting', '2024-04-19 11:36:12', '2024-04-19 12:36:04', '', 'yared solomon', '2024-04-18', 'Addis Abeba'),
('Help-00128', 'Serkalem Atinafu', 'Supply Chain', 'EMAIL SUPPORT', '2024-04-18 11:58:37', 'done', '', 'Support', '2024-04-18 12:18:13', '2024-04-18 12:19:29', '', 'kiva amsalu', '2024-04-18', 'Koka'),
('Help-00129', 'Alemnesh Negash', 'CEO', 'about outlook account. ', '2024-04-19 07:17:41', 'done', '', 'Support', '2024-04-19 07:18:18', '2024-04-19 07:53:35', '', 'kiva amsalu', '2024-04-19', 'Adama'),
('Help-00130', 'Alemnesh Negash', 'CEO', 'windows activation', '2024-04-19 07:54:31', 'done', '', 'Software Licensing', '2024-04-19 07:54:56', '2024-04-19 07:58:08', '', 'kiva amsalu', '2024-04-19', 'Adama'),
('Help-00131', 'Demeke Mekuria', 'Maintenance', 'Email support', '2024-04-20 08:32:17', 'done', '', 'Support', '2024-04-20 05:32:45', '2024-04-20 06:06:31', '', 'yared solomon', '2024-04-20', 'Dire Dawa'),
('Help-00132', 'Firehiwot Teshome', 'Supply Chain', 'Wifi adaptor disabled', '2024-04-20 10:30:19', 'done', '', 'Network Connectivity Support', '2024-04-20 07:31:21', '2024-04-20 07:59:50', '', 'yared solomon', '2024-04-20', 'Dire Dawa'),
('Help-00133', 'Werku Getachew', 'HR', '', '2024-04-20 10:35:46', 'done', '', 'Attendance Biometrics Support', '2024-04-20 07:39:34', '2024-04-20 07:43:37', '', 'kiva amsalu', '2024-04-20', 'Koka'),
('Help-00134', 'Werku Getachew', 'HR', '', '2024-04-20 10:35:58', 'done', '', 'Attendance Biometrics Support', '2024-04-20 07:51:56', '2024-04-20 09:25:27', '', '', '2024-04-20', 'Adama'),
('Help-00135', 'Sebsibe Edilu', 'Finance', 'Backup Peachtree', '2024-04-20 11:35:49', 'done', '', 'Backup/Restore', '2024-04-20 08:37:13', '2024-04-20 08:56:37', '', 'yared solomon', '2024-04-20', 'Dire Dawa'),
('Help-00136', 'Hiwot Bogale', 'Finance', 'PEDS/POS machine backup', '2024-04-20 11:36:47', 'done', '', 'Backup/Restore', '2024-04-20 08:37:07', '2024-04-20 08:56:26', '', 'yared solomon', '2024-04-20', 'Dire Dawa'),
('Help-00137', 'Werku Getachew', 'HR', '', '2024-04-20 12:28:09', 'done', '', 'Attendance Biometrics Support', '2024-04-20 09:28:26', '2024-04-20 09:28:57', '', 'kiva amsalu', '2024-04-20', 'Adama'),
('Help-00138', 'Fuad Mehamed', 'Maintenance', 'Email-Message size exceeds server limit ', '2024-04-21 12:41:15', 'done', '', 'Software Installation/Configuration', '2024-04-22 13:23:04', '2024-04-22 13:34:08', '', 'kiva amsalu', '2024-04-21', 'Koka'),
('Help-00139', 'Fuad Mehamed', 'Maintenance', 'TONER ', '2024-04-22 16:16:03', 'done', '', 'Hardware Issues', '2024-04-29 15:01:15', '2024-04-29 15:01:26', '', 'kiva amsalu', '2024-04-22', 'Koka'),
('Help-00140', 'Fuad Mehamed', 'Maintenance', 'urgent ', '2024-04-22 16:17:32', 'done', '', 'Software Licensing', '2024-04-22 13:35:27', '2024-04-22 13:41:48', '', 'kiva amsalu', '2024-04-22', 'Koka'),
('Help-00141', 'Fuad Mehamed', 'Maintenance', 'All time report Backup', '2024-04-22 16:32:16', 'done', '', 'Backup/Restore', '2024-04-22 13:35:03', '2024-04-22 13:35:14', '', 'kiva amsalu', '2024-04-22', 'Koka'),
('Help-00142', 'Fuad Mehamed', 'Maintenance', 'antivirus expired', '2024-04-22 16:39:23', 'done', '', 'Virus/Malware Support', '2024-04-22 13:41:58', '2024-04-22 13:43:27', '', 'kiva amsalu', '2024-04-22', 'Koka'),
('Help-00143', 'Asegid Kenea', 'Supply Chain', 'Microsoft excel is not visible internal ', '2024-04-24 05:27:30', 'done', '', 'Microsoft Office Support', '2024-04-24 05:55:02', '2024-04-25 06:17:20', '', 'yared solomon', '2024-04-24', 'Addis Abeba'),
('Help-00144', 'Werku Getachew', 'HR', 'Paper Jam', '2024-04-24 08:53:38', 'done', '', ' Printer Troubleshooting', '2024-04-24 05:55:41', '2024-04-24 06:02:44', '', 'kiva amsalu', '2024-04-24', 'Adama'),
('Help-00145', 'Serkalem Atinafu', 'Supply Chain', 'MS-Office', '2024-04-24 15:34:19', 'done', '', 'Software Licensing', '2024-04-24 14:20:13', '2024-04-24 14:21:32', '', 'kiva amsalu', '2024-04-24', 'Koka'),
('Help-00146', 'Dereje Arega Begna ', 'Finance', 'experiencing an issue with the internet ', '2024-04-25 09:14:45', 'done', '', 'Network Connectivity Support', '2024-04-25 11:29:47', '2024-04-25 11:29:55', '', 'kiva amsalu', '2024-04-25', 'Adama'),
('Help-00147', 'Werku Getachew', 'HR', 'urgent', '2024-04-26 10:38:06', 'done', '', 'Support', '2024-04-26 07:48:37', '2024-04-26 08:08:27', '', 'kiva amsalu', '2024-04-26', 'Adama'),
('Help-00148', 'Taye T', 'Maintenance', '', '2024-04-26 11:46:46', 'done', '', 'Mobile Device Support', '2024-04-26 08:47:29', '2024-04-26 09:17:26', '', 'kiva amsalu', '2024-04-26', 'Adama'),
('Help-00149', 'Zantawi Ayalew', 'Safety & Insurance', 'To open email address to SIYUM Gari', '2024-04-26 11:52:06', 'open', '', 'Software Installation/Configuration', '2024-04-26 11:39:36', '', '', 'kiva amsalu', '2024-04-26', 'Adama'),
('Help-00150', 'Sisay Tariku', 'Operation', '', '2024-04-27 11:19:56', 'done', '', ' Printer Troubleshooting', '2024-04-27 11:45:57', '2024-04-27 12:00:22', '', 'yared solomon', '2024-04-27', 'Dire Dawa'),
('Help-00151', 'Dereje Arega Begna ', 'Finance', 'Printer Tonner', '2024-04-29 14:27:51', 'done', '', ' Printer Troubleshooting', '2024-04-29 15:00:58', '2024-04-29 15:03:57', '', 'kiva amsalu', '2024-04-29', 'Adama'),
('Help-00152', 'Dereje Arega Begna ', 'Finance', 'wifi icon missed, urgent', '2024-04-29 14:28:24', 'done', '', 'Network Connectivity Support', '2024-04-29 14:51:22', '2024-04-29 15:00:46', '', 'kiva amsalu', '2024-04-29', 'Adama'),
('Help-00153', 'Zantawi Ayalew', 'Safety & Insurance', 'My air time is disconected ', '2024-05-02 09:31:29', 'done', '', 'Mobile Device Support', '2024-05-02 10:49:07', '2024-05-02 11:03:21', '', 'yared solomon', '2024-05-02', 'Dire Dawa'),
('Help-00154', 'Mohammed Osman', 'HR', 'MS word stack (busy)', '2024-05-02 14:17:41', 'done', '', 'Microsoft Office Support', '2024-05-02 14:24:11', '2024-05-02 14:41:11', '', 'yared solomon', '2024-05-02', 'Dire Dawa'),
('Help-00155', 'Hasna Mohammed', 'HR', 'Register two new employees', '2024-05-02 14:23:44', 'done', '', 'Attendance Biometrics Support', '2024-05-02 14:24:03', '2024-05-02 14:55:04', '', 'yared solomon', '2024-05-02', 'Dire Dawa'),
('Help-00156', 'Wogaso Molta', 'Maintenance', 'Activate office', '2024-05-07 08:46:39', 'done', '', 'Microsoft Office Support', '2024-05-07 08:46:49', '2024-05-07 09:00:35', '', 'yared solomon', '2024-05-07', 'Adama'),
('Help-00157', 'Melat G/kidan', 'Finance', 'MS office, backup files & anti virus', '2024-05-07 09:02:10', 'done', '', 'Microsoft Office Support', '2024-05-08 08:52:09', '2024-05-08 10:22:13', '', 'yared solomon', '2024-05-07', 'Dire Dawa'),
('Help-00158', 'Werku Getachew', 'HR', 'shared printer problem', '2024-05-07 09:07:29', 'done', '', ' Printer Troubleshooting', '2024-05-07 09:09:43', '2024-05-07 09:36:40', '', 'kiva amsalu', '2024-05-07', 'Adama'),
('Help-00159', 'Alemnesh Negash', 'CEO', 'MS-Word support', '2024-05-07 10:19:23', 'done', '', 'Microsoft Office Support', '2024-05-07 10:19:47', '2024-05-07 11:01:03', '', 'kiva amsalu', '2024-05-07', 'Adama'),
('Help-00160', 'Alemnesh Negash', 'CEO', 'Ms-word support', '2024-05-07 11:03:32', 'done', '', 'Microsoft Office Support', '2024-05-07 11:03:50', '2024-05-07 11:04:57', '', 'kiva amsalu', '2024-05-07', 'Adama'),
('Help-00161', 'Checkol Hunegnaw', 'Finance', 'Printer connection', '2024-05-07 11:16:54', 'done', '', ' Printer Troubleshooting', '2024-05-07 11:35:08', '2024-05-07 11:50:27', '', 'yared solomon', '2024-05-07', 'Addis Abeba'),
('Help-00162', 'Hiwot Bogale', 'Finance', 'Update office', '2024-05-08 11:37:54', 'done', '', 'Microsoft Office Support', '2024-05-08 11:38:17', '2024-05-08 12:00:24', '', 'yared solomon', '2024-05-08', 'Dire Dawa'),
('Help-00163', 'Sisay Tariku', 'Operation', 'Network cable problem', '2024-05-09 09:07:41', 'done', '', 'Network Connectivity Support', '2024-05-09 09:08:08', '2024-05-09 10:12:20', '', 'yared solomon', '2024-05-09', 'Dire Dawa'),
('Help-00164', 'Eyob Aden', 'Finance', 'Setting up laptop', '2024-05-10 10:50:49', 'done', '', 'Software Installation/Configuration', '2024-05-10 10:51:19', '2024-05-10 17:14:09', '', 'yared solomon', '2024-05-10', 'Dire Dawa'),
('Help-00165', 'Begna Leggesse', 'Supply Chain', 'all document please restore', '2024-05-10 10:57:57', 'done', '', 'Backup/Restore', '2024-05-11 08:23:09', '2024-05-11 08:48:16', '', 'yared solomon', '2024-05-10', 'Dire Dawa'),
('Help-00166', 'Timar Ashiber', 'Operation', 'My pc unable to start', '2024-05-10 15:21:53', 'done', '', 'Support', '2024-05-10 15:55:43', '2024-05-10 16:18:05', '', 'yared solomon', '2024-05-10', 'Dire Dawa'),
('Help-00167', 'Serkalem Atinafu', 'Supply Chain', 'No internet', '2024-05-10 16:07:40', 'done', '', 'Network Connectivity Support', '2024-05-10 16:08:31', '2024-05-10 16:10:41', '', 'kiva amsalu', '2024-05-10', 'Koka'),
('Help-00168', 'Serkalem Atinafu', 'Supply Chain', 'Desktop Telegram problem', '2024-05-10 16:08:13', 'done', '', 'Software Installation/Configuration', '2024-05-10 16:10:47', '2024-05-10 16:10:53', '', 'kiva amsalu', '2024-05-10', 'Koka'),
('Help-00169', 'Zulfa Jemal', 'Finance', 'MY computer takes time to satart', '2024-05-13 08:36:28', 'done', '', 'Support', '2024-05-13 08:36:57', '2024-05-13 08:44:00', '', 'kiva amsalu', '2024-05-13', 'Adama'),
('Help-00170', 'Semehar Samuel', 'Maintenance', 'excel not responding ', '2024-05-13 09:35:40', 'done', '', 'Microsoft Office Support', '2024-05-13 10:29:13', '2024-05-13 10:40:35', '', 'yared solomon', '2024-05-13', 'Dire Dawa'),
('Help-00171', 'Weldegebriel Reda', 'CEO', '', '2024-05-22 16:10:47', 'send', '', 'Software Installation/Configuration', '2024-05-23 09:45:06', '', '', 'yared solomon', '2024-05-22', 'Addis Abeba'),
('Help-00172', 'Alemnesh Negash', 'CEO', '', '2024-05-22 16:11:06', 'send', '', 'Network Connectivity Support', '2024-05-23 09:45:30', '', '', 'yared solomon', '2024-05-22', 'Adama');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item`, `date`) VALUES
(1, '4G Portable WI-FI', '2024-02-28 13:17:51'),
(2, 'Laptop', '2024-03-01 05:15:34'),
(3, 'Copy Machine', '2024-03-08 06:47:46'),
(4, 'Printer', '2024-03-08 06:49:13'),
(5, 'Scanner', '2024-03-08 06:49:20'),
(15, 'Tablet', '2024-03-08 06:50:48'),
(16, 'Desktop PC', '2024-03-08 12:29:22'),
(17, 'Biometrics Device', '2024-03-09 05:56:30'),
(18, 'Router', '2024-03-09 06:00:37'),
(19, 'Network Switch', '2024-04-04 05:42:31');

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
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `p_image` longtext COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`sn`),
  KEY `item` (`item`),
  KEY `dep` (`dep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`sn`, `product`, `employee`, `location`, `model`, `item`, `dep`, `date`, `price`, `status`, `p_image`) VALUES
('190JNW1', 'DELL', 'Addisu Bisrat', 'Koka', 'Optiplex 7010', 'Desktop PC', 'Finance', '', 'None', 'Used', ''),
('1F292270C', 'Toshiba', 'Yared Bekele', 'Dire Dawa', 'SAT C55-B1056', 'Laptop', 'Maintenance', '', 'None', 'Used', ''),
('1ZY4PR3', 'DELL', 'Asmamaw Abebe', 'Dire Dawa', 'OptiPlex 3090', 'Desktop PC', 'Supply Chain', '', 'None', 'New', ''),
('2181120011115', 'TP-LINK', 'Fetiya Nur', 'Dire Dawa', 'TL-WR940N', 'Router', 'Sales & Marketing', '', 'None', 'Used', ''),
('2181158000511', 'TP-LINK', 'Melat G/kidan', 'Dire Dawa', 'TL-WR940N', 'Router', 'Finance', '', 'None', 'Used', ''),
('2K93T92', 'DELL', 'Timar Ashiber', 'Dire Dawa', 'OptiPlex 7020', 'Desktop PC', 'Operation', '', 'None', 'Used', ''),
('34C7S21A23002353', 'Huawei', 'Alemayehu Goshime', 'Dire Dawa', 'E5576', '4G Portable WI-FI', 'Supply Chain', '', 'None', 'New', ''),
('34C7S21B19000704', 'Huawei', 'Yared Solomon', 'Dire Dawa', 'E5576', '4G Portable WI-FI', 'ICT', '', 'None', 'Used', ''),
('4E145258C', 'Toshiba', 'Eyob Aden', 'Dire Dawa', 'Satellite C55-B', 'Laptop', 'Finance', '2024-05-10', 'None', 'Used', ''),
('4S4QYP3', 'DELL', 'Sebsibe Edilu', 'Dire Dawa', 'OptiPlex 3090', 'Desktop PC', 'Finance', '', 'None', 'New', ''),
('4SDVP22', 'DELL', 'Hiwot Bogale', 'Dire Dawa', 'OptiPlex 7020', 'Desktop PC', 'Finance', '', 'None', 'Used', ''),
('4YMS1P1', 'DELL', 'Zelalem Honja', 'Koka', 'Optiplex 780', 'Desktop PC', 'Maintenance', '', 'None', 'Used', ''),
('5CD112BCCM', 'HP', 'Zantawi Ayalew', 'Dire Dawa', '15-cs3672cl', 'Laptop', 'Safety & Insurance', '', 'None', 'Used', ''),
('5CD127F5F0', 'HP', 'Wegayehu Aragaw', 'Dire Dawa', '15-eg0073cl', 'Laptop', 'Supply Chain', '', 'None', 'New', ''),
('5CD130C065', 'HP', 'Wogaso Molta', 'Dire Dawa', '15-dy2088ca', 'Laptop', 'Maintenance', '', 'None', 'New', ''),
('5CD1506YF3', 'HP', 'Anberber Ayele', 'Dire Dawa', '14-dq4003ca', 'Laptop', 'Maintenance', '', 'None', 'New', ''),
('5CD2113Q5F', 'HP', 'Mohammed Osman', 'Dire Dawa', 'HP Pavilion', 'Laptop', 'HR', '2023-08-16', 'None', 'New', ''),
('5CD21510YK', 'HP', 'Teklebrhan Gidey', 'Dire Dawa', '15-eg01b7st', 'Laptop', 'Operation', '', 'None', 'New', ''),
('5CD231HYVD', 'HP', 'Asegid Kenea', 'Dire Dawa', '14-dq2078wm', 'Laptop', 'Supply Chain', '', 'None', 'New', ''),
('5CD249BRPN', 'HP', 'Weldegebriel Reda', 'Dire Dawa', '15-eg2373cl', 'Laptop', 'CEO', '', 'None', 'Used', ''),
('5CD313F1FP', 'HP', 'Nahom Juhar', 'Dire Dawa', 'ProBook 440 G9', 'Laptop', 'ICT Service', '', 'None', 'New', ''),
('5CD6184025', 'DELL', 'Simeneh Lema', 'Dire Dawa', '15-eg023cl', 'Laptop', 'General Service', '', 'None', 'Used', ''),
('5CG05038T', 'HP', 'Tsegaye Niguse', 'Dire Dawa', '14s-Cr2005TU', 'Laptop', 'HR', '', 'None', 'New', ''),
('5CG10364TZ', 'HP', 'Major Gebresilassie', 'Dire Dawa', '14s-cr2xxx', 'Laptop', 'Operation', '', 'None', 'Used', ''),
('5CG103655M', 'HP', 'Addisu Bisrat', 'Dire Dawa', '14s-cr2005TU', 'Laptop', 'Finance', '', 'None', 'New', ''),
('5CG103660D', 'HP', 'Mahilet Kassahun', 'Dire Dawa', '14s-Cr2xxx', 'Laptop', 'Sales & Marketing', '', 'None', 'New', ''),
('5D193824Q', 'Toshiba', 'Sebsibe Edilu', 'Dire Dawa', 'Satellite L55-A', 'Laptop', 'Finance', '2024-04-01', 'None', 'Used', ''),
('5XYMNW1', 'DELL', 'Melat G/kidan', 'Dire Dawa', 'OptiPlex 7010', 'Desktop PC', 'Finance', '', 'None', 'Used', ''),
('6011152801112', 'ZkTeco', 'Werku Getachew', 'Adama', 'ZkTeco', 'Biometrics Device', 'Human Resource', '', 'None', 'Used', ''),
('62BVHT3', 'DELL', 'Fitsum Fettuh', 'Dire Dawa', 'OptiPlex 3000', 'Desktop PC', 'Operation', '', 'None', 'New', ''),
('64BC4Y1', 'DELL', 'Almaz Tadesse', 'Koka', 'Optiplex 7010', 'Desktop PC', 'Supply Chain', '2024-01-03', 'None', 'Used', ''),
('6SXYGY1', 'DELL', 'Serkalem Atinafu', 'Koka', 'Optiplex 7010', 'Desktop PC', 'Supply Chain', '2024-01-03', 'None', 'Used', ''),
('7MCC4Y1', 'DELL', 'Begna Leggesse', 'Dire Dawa', 'OptiPlex 7010', 'Desktop PC', 'Supply Chain', '', 'None', 'Used', ''),
('8CG1115XV4', 'HP', 'Getachew Kiros', 'Dire Dawa', 'Pavilion x360m', 'Laptop', 'Sales & Marketing', '', 'None', 'New', ''),
('8LQKGX1', 'DELL', 'Mimi Tamiru', 'Dire Dawa', 'OptiPlex 7010', 'Desktop PC', 'Operation', '', 'None', 'Used', ''),
('8MQYWV3', 'DELL', 'Mekdes Derese', 'Dire Dawa', 'OptiPlex 3000', 'Desktop PC', 'Operation', '', 'None', 'New', ''),
('8QDQ8V1', 'DELL', 'Samrawit Belihu', 'Dire Dawa', 'OptiPlex 790', 'Desktop PC', 'General Service', '', 'None', 'Used', ''),
('8WPT622', 'DELL', 'Semehar Samuel', 'Dire Dawa', 'OptiPlex 7010', 'Desktop PC', 'Maintenance', '', 'None', 'Used', ''),
('939NFX1', 'DELL', 'Sisay Tariku', 'Dire Dawa', 'OptiPlex 7010', 'Desktop PC', 'Operation', '', 'None', 'Used', ''),
('9DHW2Y1', 'DELL', 'Ethiopia Tafese', 'Dire Dawa', 'OptiPlex 7010', 'Desktop PC', 'Finance', '', 'None', 'Used', ''),
('9MSX5L2', 'DELL', 'Kelemwerk Adnew', 'Dire Dawa', 'OptiPlex 3050', 'Desktop PC', 'Human Resource', '', 'None', 'Used', ''),
('ABCDEF0123', 'HP', 'Kiva Amsalu', 'Adama', 'InsydeH2O EFI BIOS', 'Laptop', 'ICT', '2024-03-01', 'None', 'Used', '../Data/product/kiva pc.jpg'),
('AEXH214460650', 'ZkTeco', 'Werku Getachew', 'Koka', 'ZkTeco', 'Biometrics Device', 'Human Resource', '', 'None', 'Used', ''),
('AEXH225260147', 'ZK Teco', 'Yared Solomon', 'Dire Dawa', 'ZK Teco X Face Pro', 'Biometrics Device', 'ICT', '', 'None', 'New', ''),
('B0BV4V1', 'DELL', 'Fetiya Nur', 'Dire Dawa', 'OptiPlex 790', 'Desktop PC', 'Sales & Marketing', '', 'None', 'Used', ''),
('BH30MJ2', 'DELL', 'Ermiyas Debele', 'Dire Dawa', 'OptiPlex 3050', 'Desktop PC', 'Operation', '', 'None', 'Used', ''),
('C5M255J', 'DELL', 'Matiyas Abebaw', 'Dire Dawa', 'OptiPlex 990', 'Desktop PC', 'Supply Chain', '', 'None', 'Used', ''),
('Canon IR 2520 - 1', 'Canon', 'Hasna Mohammed', 'Dire Dawa', 'IR 2520', 'Copy Machine', 'HR', '', 'None', 'Used', ''),
('Canon IR 2520-2', 'Canon', 'Misrak Tegegn', 'Dire Dawa', 'IR 2520', 'Copy Machine', 'Sales & Marketing', '', 'None', 'New', ''),
('Canon IR 2520-3', 'Canon', 'Teklebrhan Gidey', 'Dire Dawa', 'IR 2520', 'Copy Machine', 'Operation', '', 'None', 'Used', ''),
('CFMSQ12', 'DELL', 'Hasna Mohammed', 'Dire Dawa', 'Optiplex 7010', 'Desktop PC', 'HR', '', 'None', 'Used', ''),
('CNB1P7XC8S', 'HP LaserJet', 'Semehar Samuel', 'Dire Dawa', 'MFP-137fnw', 'Printer', 'Maintenance', '', 'None', 'New', ''),
('CNB1Q4QVTN', 'HP LaserJet', 'Genet Daniel', 'Dire Dawa', 'MFP-135w', 'Printer', 'Supply Chain', '', 'None', 'New', ''),
('CNB1Q4QWT4', 'HP LaserJet', 'Kedir Jemal', 'Dire Dawa', 'MFP-135w', 'Printer', 'Safety & Insurance', '', 'None', 'New', ''),
('CNB1Q5KBK2', 'HP', 'Melat G/kidan', 'Dire Dawa', 'MFP-135a', 'Printer', 'Finance', '', 'None', 'New', ''),
('CNB1Q5KBQG', 'HP LaserJet', 'Mohammed Osman', 'Dire Dawa', 'MFP-135a', 'Printer', 'HR', '', 'None', 'New', ''),
('CNB9G94C19', 'HP', 'Werku Getachew', 'Adama', 'LJ Pro MFP M127-M128', 'Printer', 'Human Resource', '', 'None', 'Used', ''),
('CNB9H9H8TZ', 'HP', 'Hiwot Bogale', 'Dire Dawa', 'LJ M127Fn', 'Printer', 'Finance', '', 'None', 'Used', ''),
('CND0288H98', 'HP', 'Alemnesh Negash', 'Adama', '15-da2xxx', 'Laptop', 'CEO', '', 'None', 'Used', ''),
('CND1275LCK', 'HP', 'Masre Wodajnew', 'Dire Dawa', '15-dw3125od', 'Laptop', 'Operation', '', 'None', 'New', ''),
('CND1400PJF', 'HP', 'Alemayehu Goshime', 'Dire Dawa', '15-dw3058cl', 'Laptop', 'Supply Chain', '', 'None', 'New', ''),
('CND140621V', 'HP', 'Teklay Hailu', 'Dire Dawa', '250G8-NB', 'Laptop', 'Finance', '', 'None', 'New', ''),
('CND1468ZSK', 'HP', 'Yared Solomon', 'Dire Dawa', '250G8-NB', 'Laptop', 'ICT', '', 'None', 'New', ''),
('CND1468ZTZ', 'HP', 'Taye T', 'Koka', 'HP 250 G8', 'Laptop', 'Maintenance', '', 'None', 'New', ''),
('CND1468ZWF', 'HP', 'Seadedin Beyan', 'Dire Dawa', '250G8-NB', 'Laptop', 'Sales & Marketing', '', 'None', 'New', ''),
('CND830VRO', 'HP', 'Mekonen Ashene', 'Dire Dawa', '15g-dr0006TX', 'Laptop', 'Finance', '', 'None', 'Used', ''),
('D19M5B3', 'DELL', 'Zulfa Jemal', 'Adama', 'Optiplex 3080', 'Desktop PC', 'Finance', '', 'None', 'Used', ''),
('D5CC4Y1', 'DELL', 'Dereje Arega Begna ', 'Adama', 'Optiplex 7010', 'Desktop PC', 'Finance', '', 'None', 'Used', ''),
('D61WBY1', 'DELL', 'Kedir Jemal', 'Dire Dawa', 'OptiPlex 7010', 'Desktop PC', 'Safety & Insurance', '', 'None', 'Used', ''),
('DQKJ6Q3', 'DELL', 'Firehiwot Teshome', 'Dire Dawa', 'OptiPlex 3000', 'Desktop PC', 'Supply Chain', '', 'None', 'New', ''),
('G0BC4Y1', 'DELL', 'Fuad Mehamed', 'Koka', 'Optiplex 7010', 'Desktop PC', 'Maintenance', '', 'None', 'Used', ''),
('GNXC5L2', 'DELL', 'Werku Getachew', 'Adama', 'Optiplex 3050', 'Desktop PC', 'Human Resource', '', 'None', 'Used', ''),
('GVW4PR3', 'DELL', 'Firew Alemu', 'Dire Dawa', 'OptiPlex 3090', 'Desktop PC', 'Sales & Marketing', '', 'None', 'New', ''),
('HUAWEI - E5576 -1', 'Huawei', 'Teklay Hailu', 'Dire Dawa', 'E5576', '4G Portable WI-FI', 'Finance', '', 'None', 'New', ''),
('HUAWEI - E5576 -2', 'Huawei', 'Wogaso Molta', 'Dire Dawa', 'E5576', '4G Portable WI-FI', 'Maintenance', '', 'None', 'New', ''),
('JK7HH32', 'DELL', 'Birhan Tegegn', 'Adama', 'Optiplex 7010', 'Desktop PC', 'Operation', '', 'None', 'Used', ''),
('JPTQFX1', 'DELL', 'Yohannes Birhanu', 'Dire Dawa', 'OptiPlex 7010', 'Desktop PC', 'Maintenance', '', 'None', 'Used', ''),
('None', 'HP', 'Almaz Tadesse', 'Koka', 'LJ Pro M402n', 'Printer', 'Supply Chain', '', 'None', 'Used', ''),
('NTKA569161', 'Canon', 'Hiwot Bogale', 'Dire Dawa', 'i-s MF3010', 'Printer', 'Finance', '', 'None', 'New', ''),
('PHC6C14057', 'HP', 'Dereje Arega Begna ', 'Adama', 'LJ Pro M402n', 'Printer', 'Finance', '', 'None', 'Used', ''),
('PHC6N27128', 'HP', 'Almaz Tadesse', 'Koka', 'LJ Pro M402n', 'Printer', 'Supply Chain', '', 'none', 'Used', ''),
('PHCGB17018', 'HP', 'Birhan Tegegn', 'Adama', 'LJ Pro M402n', 'Printer', 'Operation', '', 'None', 'Used', ''),
('PHKBD09980', 'HP', 'Samrawit Belihu', 'Dire Dawa', 'M400-401', 'Printer', 'General Service', '', 'None', 'Used', ''),
('PHW39793', 'canon', 'Fuad Mehamed', 'Koka', 'ir2420', 'Copy Machine', 'Maintenance', '', 'none', 'Used', ''),
('TL0411A001582', 'D-LINK', 'Nahom Juhar', 'Dire Dawa', 'DWR-933', '4G Portable WI-FI', 'ICT Service', '', 'None', 'Used', ''),
('TML012303000529', 'Tana', 'Tsegaye Niguse', 'Dire Dawa', 'L01', '4G Portable WI-FI', 'HR', '', '5480', 'New', ''),
('VNH6200708', 'HP', 'Begna Leggesse', 'Dire Dawa', 'M400-401', 'Printer', 'Supply Chain', '', 'None', 'Used', ''),
('VNH6203989', 'HP', 'Fuad Mehamed', 'Koka', 'M400-401', 'Printer', 'Maintenance', '', 'none', 'Used', ''),
('ZTE', 'ZTE', 'Alemnesh Negash', 'Adama', 'MF971L', '4G Portable WI-FI', 'CEO', '', 'None', 'New', '../Data/product/zte.jpg'),
('ZTE - MF971L - 1', 'ZTE', 'Mohammed Osman', 'Dire Dawa', 'MF971L', '4G Portable WI-FI', 'HR', '', '5005', 'New', '../Data/product/zte.jpg'),
('ZTE - MF971L - 10', 'ZTE', 'Addisu Bisrat', 'Dire Dawa', 'MF971L', '4G Portable WI-FI', 'Finance', '', 'None', 'New', '../Data/product/zte.jpg'),
('ZTE - MF971L - 11', 'ZTE', 'Anberber Ayele', 'Dire Dawa', 'MF971L', '4G Portable WI-FI', 'Maintenance', '', 'None', 'New', '../Data/product/zte.jpg'),
('ZTE - MF971L - 2', 'ZTE', 'Zantawi Ayalew', 'Dire Dawa', 'MF971L', '4G Portable WI-FI', 'Safety & Insurance', '', 'None', 'New', '../Data/product/zte.jpg'),
('ZTE - MF971L - 3', 'ZTE', 'Asegid Kenea', 'Dire Dawa', 'MF971L', '4G Portable WI-FI', 'Supply Chain', '', 'None', 'New', '../Data/product/zte.jpg'),
('ZTE - MF971L - 4', 'ZTE', 'Major Gebresilassie', 'Dire Dawa', 'MF971L', '4G Portable WI-FI', 'Operation', '', 'None', 'Used', '../Data/product/zte.jpg'),
('ZTE - MF971L - 5', 'ZTE', 'Masre Wodajnew', 'Dire Dawa', 'MF971L', '4G Portable WI-FI', 'Operation', '', 'None', 'New', '../Data/product/zte.jpg'),
('ZTE - MF971L - 6', 'ZTE', 'Teklebrhan Gidey', 'Dire Dawa', 'MF971L', '4G Portable WI-FI', 'Operation', '', 'None', 'New', '../Data/product/zte.jpg'),
('ZTE - MF971L - 7', 'ZTE', 'Getachew Kiros', 'Dire Dawa', 'MF971L', '4G Portable WI-FI', 'Sales & Marketing', '', 'None', 'New', '../Data/product/zte.jpg'),
('ZTE - MF971L - 8', 'ZTE', 'Mahilet Kassahun', 'Dire Dawa', 'MF971L', '4G Portable WI-FI', 'Sales & Marketing', '', 'None', 'New', '../Data/product/zte.jpg'),
('ZTE - MF971L - 9', 'ZTE', 'Mekonen Ashene', 'Dire Dawa', 'MF971L', '4G Portable WI-FI', 'Finance', '', 'None', 'New', '../Data/product/zte.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `dep`, `last_login`, `status`, `profile`) VALUES
(10, 'super', '1b3231655cebb7a1f783eddf27d254ca', 'super', '2024-02-10 10:16:45', '1', ''),
(13, 'kiva amsalu', 'f70d920fb2ba63e030551d3c8ecf7d04', 'ICT', '2024-04-26 06:27:39', '1', '../Data/profile/newpp-01.jpg'),
(24, 'yared solomon', '76358cb8e93a24cd1074a5724a634edf', 'ICT', '2024-04-02 05:28:01', '1', '../Data/profile/photo_2023-07-31_10-36-51.jpg'),
(32, '', '9d196fbbae9f282a82ddf32128656dae', 'CEO', '2024-02-26 05:30:38', '1', ''),
(33, '', '7f7e242df398805317497b1362d118c6', 'Safety & Insurance', '2024-02-26 05:31:41', '1', ''),
(34, '', 'af0bb85052d001b38b2f3560a05a0fc0', 'Operation', '2024-02-26 05:33:35', '1', ''),
(35, '', '4898077fdb0fdccecc087e8c46f46c18', 'Finance', '2024-02-26 05:37:01', '1', ''),
(36, '', 'ffe6f32a726e2dd5c6c6dae6756ecd91', 'Supply Chain', '2024-02-26 05:38:21', '1', ''),
(37, '', '665ea86f475898b7cdeb3caa1dc5bc7b', 'Maintenance', '2024-02-26 05:39:43', '1', ''),
(38, '', 'b234151879ba38a019a96ecd2936bdfb', 'HR', '2024-02-26 05:41:15', '1', ''),
(39, '', '40357d5e9a9b097c3a8df5cdf5602f4a', 'Sales & Marketing', '2024-02-26 05:42:03', '1', ''),
(40, '', '03f578f834e866b165b05d0a0555c007', 'General Service', '2024-03-11 11:40:01', '1', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
