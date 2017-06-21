-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2016 at 11:02 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms_api_staging`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` int(255) NOT NULL,
  `addon_name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `addon_type` varchar(255) NOT NULL,
  `path_type` varchar(1000) NOT NULL,
  `pricing` int(11) NOT NULL,
  `picture_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addons`
--

INSERT INTO `addons` (`id`, `addon_name`, `path`, `addon_type`, `path_type`, `pricing`, `picture_path`) VALUES
(1, 'Single SMS', 'single_sms.php', 'default', 'primary', 0, ''),
(2, 'Bulk SMS', 'text_upload.php', 'default', 'primary', 0, ''),
(3, 'Grouping', 'grouping.php', 'paid', 'primary', 0, '../img/ra.php'),
(4, 'Variable Sms', 'bulk_sms.php', 'paid', 'primary', 0, '../img/vm.jpg'),
(5, 'Todays Report', 'dlr_report.php', 'default', 'primary', 0, ''),
(6, 'Sms History', 'sms_history.php', 'default', 'primary', 0, ''),
(7, 'REST API', 'rest_api.php', 'paid', 'primary', 0, '../img/ra.jpg'),
(8, 'My Details', 'my_details.php', 'default', 'primary', 0, ''),
(9, 'Addons', 'add_on.php', 'default', 'primary', 0, ''),
(10, 'error', 'error.php', 'default', 'primary', 0, ''),
(11, 'Template', 'template.php', 'default', 'primary', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `addon_requests`
--

CREATE TABLE `addon_requests` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `addon_id` int(255) NOT NULL,
  `date_of_approved` int(255) NOT NULL,
  `validity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addon_requests`
--

INSERT INTO `addon_requests` (`id`, `user_id`, `addon_id`, `date_of_approved`, `validity`) VALUES
(1, 1, 4, 0, ''),
(2, 3, 4, 0, ''),
(3, 3, 2, 0, ''),
(4, 7, 7, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_name`, `user_id`) VALUES
(6, 'VAN-DB.xlsx', 1),
(7, 'V- VIII DB.xlsx', 1),
(9, 'Pre KG-LKG-UKG DB.xlsx', 1),
(10, 'IX - XII DB.xlsx', 1),
(11, 'I-IV STD DB.xlsx', 1),
(12, 'CBSE DB.xlsx', 1),
(13, 'B1.xlsx', 1),
(17, 'NTLOA members mobile no.xls', 3),
(19, 'Vefetch Support.xlsx', 3),
(21, 'Sample.xlsx', 3),
(44, 'test.xls', 5),
(45, 'test.xlsx', 5),
(46, 'Pre KG.xlsx', 7),
(47, 'LKG A.xlsx', 7),
(49, 'LKG C.xlsx', 7),
(50, 'UKG - A.xlsx', 7),
(51, 'UKG - B.xlsx', 7),
(52, 'UKG - C.xlsx', 7),
(53, 'I - A.xlsx', 7),
(54, 'I - B.xlsx', 7),
(55, 'I - C.xlsx', 7),
(56, 'II - A.xlsx', 7),
(57, 'II - B.xlsx', 7),
(58, 'III - A.xlsx', 7),
(59, 'III - B.xlsx', 7),
(60, 'III - C.xlsx', 7),
(61, 'IV - A.xlsx', 7),
(62, 'IV - B.xlsx', 7),
(63, 'V - A.xlsx', 7),
(64, 'V - B.xlsx', 7),
(65, 'V - C.xlsx', 7),
(66, 'VI - A.xlsx', 7),
(67, 'VI - B.xlsx', 7),
(68, 'VI - C.xlsx', 7),
(69, 'VII - A.xlsx', 7),
(70, 'VII - B.xlsx', 7),
(71, 'VIII - A.xlsx', 7),
(72, 'VIII - B.xlsx', 7),
(73, 'VIII - C.xlsx', 7),
(74, 'IX - A.xlsx', 7),
(75, 'IX - B.xlsx', 7),
(76, 'IX - C.xlsx', 7),
(77, 'X - A.xlsx', 7),
(78, 'X - B.xlsx', 7),
(79, 'X - C.xlsx', 7),
(80, 'XI - A.xlsx', 7),
(81, 'XI - B.xlsx', 7),
(82, 'XI - C.xlsx', 7),
(83, 'XI - D.xlsx', 7),
(84, 'XII - A.xlsx', 7),
(85, 'XII - B.xlsx', 7),
(86, 'XII - C.xlsx', 7),
(87, 'Management.xlsx', 7),
(88, 'kongu staff list.xlsx', 7),
(89, 'ec_members.xlsx', 7),
(90, 'driver_list.xlsx', 7),
(91, 'demo.xlsx', 7),
(92, 'overall school.xlsx', 7),
(95, 'E 1 mark TEST.xlsx', 1),
(96, 'MSG E1 mark.xlsx', 1),
(97, 'MSG E3  TEST.xlsx', 1),
(98, 'MSG E3 mark.xlsx', 1),
(100, 'MSG T1 test.xlsx', 1),
(101, 'MSG T1 mark.xlsx', 1),
(103, 'LKG -B.xlsx', 7),
(107, 'VR & CO Customers.xls', 4),
(111, 'demo.xlsx', 4),
(112, 'V.R&CO_CUSTOMER_LIST.xls', 4),
(113, 'student_list_demo.xlsx', 8),
(114, 'student_list_demo (1).xlsx', 8);

-- --------------------------------------------------------

--
-- Table structure for table `sms_count`
--

CREATE TABLE `sms_count` (
  `id` int(255) NOT NULL,
  `unicode` int(255) NOT NULL,
  `normal` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_count`
--

INSERT INTO `sms_count` (`id`, `unicode`, `normal`) VALUES
(1, 70, 160),
(2, 134, 306),
(3, 201, 459),
(4, 268, 612),
(5, 335, 765),
(6, 402, 918),
(7, 469, 1071),
(8, 536, 1224);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(100) NOT NULL,
  `template_name` varchar(1000) NOT NULL,
  `template_content` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `template_name`, `template_content`, `user_id`) VALUES
(1, 'test', 'hi you have meeting at ', 8),
(2, 'test2', 'helloo', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sender_id` varchar(2550) NOT NULL,
  `date_of_creation` datetime NOT NULL,
  `sms_count` bigint(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `mobile_number` bigint(10) NOT NULL,
  `addons` varchar(255) NOT NULL,
  `sms_db_credentials_normal` varchar(1000) NOT NULL,
  `sms_db_credentials_unicode` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `email_id`, `address`, `sender_id`, `date_of_creation`, `sms_count`, `active`, `mobile_number`, `addons`, `sms_db_credentials_normal`, `sms_db_credentials_unicode`) VALUES
(1, 'Vani', 'vani1234', 'vanividyalayaedu@gmail.com', 'VANI VIDYALAYA Matric Hr Sec School,\r\nUppupalayam,\r\nVeppadai,\r\nNamakkal (D.T)', 'VVMHSS', '2016-10-14 12:58:21', 4297, 'true', 9842862278, '1,2,5,6,8,9,10,4', '10.0.2.1|vani|vani1234|vani|3306', '10.0.2.1|vani|vani1234|vaniuni|3306'),
(3, 'Vefetch Technologies', 'demo1234', 'vefetchtechnologies@gmail.com', 'Vefetch Technologies,\nFirst floor CKR complex, \nSankari-636301.', 'VFETCH', '2016-10-18 11:30:56', 99824, 'true', 7695959943, '1,5,6,8,9,10,7,4', '10.0.2.1|temp|temp1234|temp|3306', '10.0.2.1|temp|temp1234|tempuni|3306'),
(4, 'Mohan', 'NAMAKKAL', 'spmohancompany@gmail.com', 'SP Mohan Company, \r\n120 A Salem Main Road,\r\nNamakkal', 'SPMIOC', '2016-10-18 12:36:54', 43008, 'true', 9790080808, '1,2,5,6,8,9,10', '10.0.2.1|vefetch|Manithan10100?|spm|3306', '10.0.2.1|vefetch|Manithan10100?|spmuni|3306'),
(5, 'Gautham Ramalingam', 'Manithan10100?', 'gauthamrgramalingam@gmail.com', 'Vefetch Technologies,\r\nFirst floor CKR complex, \r\nSankari-636301.', 'GAUTHM', '2016-10-25 17:30:56', 934109, 'true', 7695959942, '1,5,6,8,9,10,7,4', '10.0.51.52|vefetch|Manithan10100?|secondary|3306', '10.0.51.52|vefetch|Manithan10100?|secondary|3306'),
(7, 'Kongu schools', 'kongu1234', 'konguschools@gmail.com', 'Kongu schools, Salem', 'KONGUS', '2016-11-02 09:27:57', 9993999, 'true', 8428450003, '1,5,6,8,9,10,4,2', '10.0.2.1|vefetch|Manithan10100?|kongu|3306', '10.0.2.1|vefetch|Manithan10100?|konguuni|3306'),
(8, 'Sudhakar', 'p.nandhu', 'asudhakar@live.in', 'VEFETCH', 'SUDHAK,SLOABI,SLOAII', '2016-11-03 11:44:31', 99999675, 'true', 9842972047, '1,2,3,4,5,6,8,9,10,11', '10.0.2.1|vefetch|Manithan10100?|temp|3306', '10.0.2.1|vefetch|Manithan10100?|tempuni|3306'),
(9, 'SLOA', 'sloa1234', 'slus.sankari@gmail.com', 'D.No. 1/6-15B 3, Salem Main road, Sankari', 'SLOABI,SLOAII,LOAIII', '2016-11-18 07:58:18', 99999, 'true', 9965538955, '1,2,5,6,8,9,10', '10.0.2.1|vefetch|Manithan10100?|sloa|3306', '10.0.2.1|vefetch|Manithan10100?|sloauni|3306');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addon_requests`
--
ALTER TABLE `addon_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_count`
--
ALTER TABLE `sms_count`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unicode` (`unicode`),
  ADD UNIQUE KEY `normal` (`normal`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `addon_requests`
--
ALTER TABLE `addon_requests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `sms_count`
--
ALTER TABLE `sms_count`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
