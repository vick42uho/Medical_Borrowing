-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2021 at 06:00 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_db_borrow`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_division`
--

CREATE TABLE `tbl_division` (
  `did` int(11) NOT NULL COMMENT 'รหัสแผนก',
  `dname` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อแผนก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตารางแผนก';

--
-- Dumping data for table `tbl_division`
--

INSERT INTO `tbl_division` (`did`, `dname`) VALUES
(1, 'Admin'),
(2, 'เครื่องมือแพทย์'),
(3, 'บริหาร'),
(4, 'ห้องคลอด'),
(5, 'ห้อง ICU'),
(6, 'ห้อง VIP'),
(7, 'OPD ต่างดาว'),
(8, 'OPD ประกันสังคม'),
(9, 'เวชระเบียน'),
(10, 'วอร์ด 2'),
(12, 'หน่วยแพทย์'),
(13, 'หน่วยประมวลผล');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `m_id` int(11) NOT NULL COMMENT 'รหัสสมาชิก',
  `ref_did` int(11) NOT NULL COMMENT 'รหัสหน่วยงาน tbl_division',
  `ref_pid` int(11) NOT NULL COMMENT 'รหัสตำแหน่ง tbl_position',
  `m_username` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ยูสเซอร์',
  `m_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสผ่าน',
  `m_fname` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'คำนำหน้า',
  `m_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อ',
  `m_lname` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'นามสกุล',
  `m_phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เบอร์โทร',
  `m_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'อีเมล',
  `m_img` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รูป',
  `m_datesave` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'วันที่บันทึก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตารางสมาชิก';

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`m_id`, `ref_did`, `ref_pid`, `m_username`, `m_password`, `m_fname`, `m_name`, `m_lname`, `m_phone`, `m_email`, `m_img`, `m_datesave`) VALUES
(1, 1, 1, 'a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'นาย', 'ทวี', 'โปราหา', '034410700-6', 'admin@gmail.com', '2c7be8d148b20f36bd8b9cd1c215f4d4.png', '2021-11-22 15:33:22'),
(2, 2, 2, 's', 'a0f1490a20d0211c997b44bc357e1972deab8ae3', 'นาย', 'ชัยนันท์', 'โปราหา', '034410700-7', 'staff@gmail.com', 'b1eebb887c9ea85a46cdf519d0eb6ed0.png', '2021-11-22 15:33:06'),
(3, 3, 3, 'b', 'e9d71f5ee7c92d6dc9e92ffdad17b8bd49418f98', 'นาย', 'ทวีป', 'โปราหา', '034410700-6', 'boss@gmail.com', '5eaee48014ced08b06d41937f13e4b22.png', '2021-11-07 15:47:30'),
(4, 4, 4, 'm', '6b0d31c0d563223024da45691584643ac78c96e8', 'นางสาว', 'ณัฐพร', 'จงจิตต์', '034410700-6', 'jj@gmail.com', '46f2ce59925e840d166e683d6ff36070.png', '2021-11-14 05:46:07'),
(5, 8, 4, 'm2', '32d332da761f44df7959e5887b6b94cb4667d781', 'นางสาว', 'พัณณิตา', 'ภู่มาลี', '034410700-6', 'pn@gmail.com', 'd41f71a159b3786d7b2c6c84f94e1ae4.png', '2021-11-14 05:06:26'),
(6, 5, 4, 'm3', '862a51f8b6294a4b0729a7c5c929bfd67068d962', 'นาย', 'อารวิญญ์', 'แสงเพชรอ่อน', '06265615646', 'av@hotmail.com', '55d83f671b02bad8ebd5e938f58d8712.png', '2021-11-14 05:24:31'),
(7, 12, 4, 'm4', '0e5bc0a684c7afe47fa66cdf21a4dfa33742f9c3', 'นาย', 'สุรศักดิ์', 'ด้วงสงค์', '034410700-6', 'jj@gmail.com', '46f2ce59925e840d166e683d6ff36070.png', '2021-11-13 16:24:38'),
(8, 7, 4, 'm5', 'ec4c91afbf23e886603daadfa3e7d16aa13fd0b7', 'นาย', 'สุรชัย', 'ด้วงสงค์', '034410700-6', 'pn@gmail.com', 'd41f71a159b3786d7b2c6c84f94e1ae4.png', '2021-11-14 05:24:41'),
(9, 12, 4, 'm6', '5ad436a1dca33823a8d6bf33785511c4bf00d99a', 'นาย', 'ทศพล', 'ลาวัลย์', '06265615646', 'av@hotmail.com', '55d83f671b02bad8ebd5e938f58d8712.png', '2021-11-14 05:24:51'),
(10, 2, 2, 's1', '640d87e741e6aa4c669a82a4cd304787960513ab', 'นางสาว', 'สุดารัตน์', 'สอนโคกสูง', '034410700-7', 'staff@gmail.com', 'b1eebb887c9ea85a46cdf519d0eb6ed0.png', '2021-11-07 15:50:23'),
(11, 1, 1, 'a1', 'f29bc91bbdab169fc0c0a326965953d11c7dff83', 'นางสาว', 'แก้วตา', 'ดวงใจ', '034410700-6', 'admin@gmail.com', '2c7be8d148b20f36bd8b9cd1c215f4d4.png', '2021-11-22 15:36:05'),
(12, 3, 3, 'b1', '7e83ca2a65d6f90a809c8570c6c905a941b87732', 'นาย', 'มั่งมี', 'ศรีสุข', '034410700-6', 'boss@gmail.com', '5eaee48014ced08b06d41937f13e4b22.png', '2021-11-22 15:34:59'),
(13, 13, 4, 'm7', '91eb264d913b88bf37713ee4c023b95e403c1380', 'นาย', 'พิเชฐ', 'โลกวิรุฬห์', '06265615646', 'av@hotmail.com', '55d83f671b02bad8ebd5e938f58d8712.png', '2021-11-07 15:27:29'),
(14, 12, 4, 'm8', 'f5e6c84556d2c0bed9a257e3981632b0e27095f0', 'นาย', 'สิทธิพันธ์', 'นาวีชลนิยม', '034410700-6', 'jj@gmail.com', '46f2ce59925e840d166e683d6ff36070.png', '2021-11-13 16:24:38'),
(15, 8, 4, 'm9', '60018f2177591071fcc9a67ea59f5dcd4d69e7ec', 'นางสาว', 'ภัทราพร', 'อุ่ยศรีสุข', '034410700-6', 'pn@gmail.com', 'd41f71a159b3786d7b2c6c84f94e1ae4.png', '2021-11-13 16:24:38'),
(16, 9, 4, 'm10', '86ef3e57fc04e813cd6c34b5e06e0045427ed332', 'นาย', 'ธรานนท์', 'ภูธรเลิศ', '06265615646', 'av@hotmail.com', '55d83f671b02bad8ebd5e938f58d8712.png', '2021-11-14 05:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_devices`
--

CREATE TABLE `tbl_m_devices` (
  `no` int(11) NOT NULL COMMENT 'รหัสอุปกรณ์',
  `ref_t_id` int(11) NOT NULL COMMENT 'รหัสประเภท tbl_m_devices_type',
  `ref_s_id` int(11) NOT NULL COMMENT 'รหัสสถานะ tbl_m_devices_status',
  `d_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัส/เลขอุปกรณ์',
  `d_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่ออุปกรณ์',
  `d_detail` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'รายละเอียดอุปกรณ์',
  `d_remark` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'หมายเหตุอุปกรณ์',
  `d_img` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รูปอุปกรณ์',
  `ref_m_id` int(11) NOT NULL COMMENT 'รหัสคนที่บันทึก tbl_member',
  `d_datesave` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'บันทึกวันที่เพิ่งอุปกรณ์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตารางทะเบียนอุปกรณ์การแพทย์';

--
-- Dumping data for table `tbl_m_devices`
--

INSERT INTO `tbl_m_devices` (`no`, `ref_t_id`, `ref_s_id`, `d_id`, `d_name`, `d_detail`, `d_remark`, `d_img`, `ref_m_id`, `d_datesave`) VALUES
(1, 1, 2, 'XR1001', 'เครื่องเอกซเรย์เคลื่อนที่', 'เครื่องเอกซเรย์เคลื่อนที่', '', '9ceaa6ab68a28e2528c65027fe882da7.jpg', 2, '2021-11-07 04:42:29'),
(2, 1, 2, 'CR10001', 'เครื่องอัลตราซาวด์', 'เครื่องอัลตราซาวด์เคลื่อนที่', '', 'c25cc601f22338967881a09094594b22.jpg', 2, '2021-11-07 04:43:41'),
(3, 1, 2, 'EKG1001', 'เครื่องตรวจคลื่นไฟฟ้าหัวใจ', 'เครื่องตรวจคลื่นไฟฟ้าหัวใจ', '', '31689c0a64a246256e7cc986346aea1f.jpg', 2, '2021-11-07 04:44:29'),
(4, 1, 1, 'ESWL1001', 'เครื่องสลายนิ่ว', 'เครื่องสลายนิ่วเคลื่อนที่', '', 'a10ca79edc496288108aa0c00eca9abb.jpg', 2, '2021-11-07 04:48:52'),
(5, 3, 1, 'BP1001', 'เครื่องวัดความดัน', 'เครื่องวัดความดันแบบดิจิทัล', 'แบบดิจิทัล', 'ddbfd7974e5d714dc175c17ee1e74708.jpg', 2, '2021-11-07 04:52:28'),
(6, 3, 4, 'BPM1001', 'เครื่องวัดความดันแบบตั้งโต๊ะ', 'เครื่องวัดความดันแบบตั้งโต๊ะ', 'แบบแมนนวล', '51091cdbc494ebcba34f88cc9dad0346.jpg', 2, '2021-11-07 05:00:33'),
(7, 1, 2, 'EKG1002', 'เครื่องตรวจคลื่นไฟฟ้าหัวใจ', 'เครื่องตรวจคลื่นไฟฟ้าหัวใจ', '', '09e207150cc4c04d8b396837bf1fa616.jpg', 2, '2021-11-07 05:01:50'),
(8, 3, 2, 'BP1002', 'เครื่องวัดความดัน', 'เครื่องวัดความดัน', 'แบบดิจิทัล', '3dcbf2334c4eec7503f90cebac896d08.jpg', 2, '2021-11-07 05:03:16'),
(9, 3, 2, 'SP1001', 'หูฟังแพทย์', 'หูฟังแพทย์ วัสดุทำจากพลาสติก PVC ความยาวสาย 49 เซนติเมตร', '', 'b550fd63e48a01155f17d13f13993873.jpg', 2, '2021-11-07 05:06:38'),
(10, 1, 1, 'SPK1001', 'เครื่องตรวจวัดสมรรถภาพทางปอด', 'เครื่องตรวจวัดสมรรถภาพทางปอด', '', '0881fc782c97caa583f4fe12c2c248f2.jpg', 2, '2021-11-07 05:43:12'),
(11, 1, 1, 'XR1002', 'เครื่องเอกซเรย์เคลื่อนที่', 'เครื่องเอกซเรย์เคลื่อนที่', '', '9ceaa6ab68a28e2528c65027fe882da7.jpg', 2, '2021-11-07 04:42:29'),
(12, 1, 1, 'CR10002', 'เครื่องอัลตราซาวด์', 'เครื่องอัลตราซาวด์เคลื่อนที่', '', 'c25cc601f22338967881a09094594b22.jpg', 2, '2021-11-07 04:43:41'),
(13, 1, 1, 'EKG1004', 'เครื่องตรวจคลื่นไฟฟ้าหัวใจ', 'เครื่องตรวจคลื่นไฟฟ้าหัวใจ', '', '31689c0a64a246256e7cc986346aea1f.jpg', 2, '2021-11-07 04:44:29'),
(14, 1, 1, 'ESWL1002', 'เครื่องสลายนิ่ว', 'เครื่องสลายนิ่วเคลื่อนที่', '', 'a10ca79edc496288108aa0c00eca9abb.jpg', 2, '2021-11-07 04:48:52'),
(15, 3, 1, 'BP1005', 'เครื่องวัดความดัน', 'เครื่องวัดความดันแบบดิจิทัล', 'แบบดิจิทัล', 'ddbfd7974e5d714dc175c17ee1e74708.jpg', 2, '2021-11-07 04:52:28'),
(16, 3, 2, 'BPM1002', 'เครื่องวัดความดันแบบตั้งโต๊ะ', 'เครื่องวัดความดันแบบตั้งโต๊ะ', 'แบบแมนนวล', '51091cdbc494ebcba34f88cc9dad0346.jpg', 2, '2021-11-07 05:00:33'),
(17, 1, 1, 'EKG1003', 'เครื่องตรวจคลื่นไฟฟ้าหัวใจ', 'เครื่องตรวจคลื่นไฟฟ้าหัวใจ', '', '09e207150cc4c04d8b396837bf1fa616.jpg', 2, '2021-11-07 05:01:50'),
(18, 3, 3, 'BP1006', 'เครื่องวัดความดัน', 'เครื่องวัดความดัน', 'แบบดิจิทัล', '3dcbf2334c4eec7503f90cebac896d08.jpg', 2, '2021-11-07 05:03:16'),
(19, 3, 2, 'SP1002', 'หูฟังแพทย์', 'หูฟังแพทย์ วัสดุทำจากพลาสติก PVC ความยาวสาย 49 เซนติเมตร', '', 'b550fd63e48a01155f17d13f13993873.jpg', 2, '2021-11-07 05:06:38'),
(20, 1, 1, 'SPK1002', 'เครื่องตรวจวัดสมรรถภาพทางปอด', 'เครื่องตรวจวัดสมรรถภาพทางปอด', '', '0881fc782c97caa583f4fe12c2c248f2.jpg', 2, '2021-11-07 05:43:12'),
(21, 4, 1, 'it-nb1001', 'HP Pavilion 13', 'โน๊ตบุ๊คแรม 16GB ปี 2021 เน้นทำงานพกพา แนะนำ 6 รุ่นน่าซื้อ จอ 13.3″ – 14.5″', '', '1455d75a9601bc3de4445d160eba1cb4.jpg', 2, '2021-11-14 05:22:33'),
(22, 4, 1, 'it-m1001', 'เมาส์ไร้สาย', 'Wireless Mobile 1850 Win7/8 Light Orchid', '', '322ec0030f9f663875af358e27ecedb9.png', 2, '2021-11-14 05:23:36'),
(23, 4, 1, 'it-kb1001', 'คีย์บอร์ด', 'แป้นพิมพ์ Bluetooth ของ Microsoft มีดีไซน์ที่ทันสมัย บาง และช่วยทำให้พิมพ์ได้เร็วขึ้นพร้อมกับเสริมพื้นที่ทำงานของคุณให้สมบูรณ์', 'Windows 10 ที่พร้อมรองรับ Bluetooth 4.0 หรือใหม่กว่า', '326c94c5fb1e384286892a187743aad7.png', 2, '2021-12-22 17:42:22'),
(24, 4, 1, 'it-kb1002', 'คีย์บอร์ด', 'แป้นพิมพ์ Bluetooth ของ Microsoft มีดีไซน์ที่ทันสมัย บาง และช่วยทำให้พิมพ์ได้เร็วขึ้นพร้อมกับเสริมพื้นที่ทำงานของคุณให้สมบูรณ์', 'Windows 10 ที่พร้อมรองรับ Bluetooth 4.0 หรือใหม่กว่า', '7e79d3d6e6e0f33e4067ac8232466c43.png', 2, '2021-12-22 17:44:35'),
(25, 4, 1, 'it-m1002', 'เมาส์ไร้สาย', 'Wireless Mobile 1850 Win7/8 Light Orchid', '', '22a9615f98d6ba1743293700463e87c0.png', 2, '2021-12-22 17:47:21'),
(26, 4, 1, 'it-nb1002', 'Microsoft Surface Laptop', 'Microsoft Surface Laptop i7 16GB 512GB', '', '36b1a790d94d1974aaa8b282e5eb2eb7.jpg', 2, '2021-12-22 17:50:50'),
(27, 2, 1, 'SP1003', 'หูฟังแพทย์', 'Spirit Deluxe CK-S601P-GREEN', '', '0dc2f667b23b5578879775bad9ed45be.jpg', 2, '2021-12-22 17:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_devices_services`
--

CREATE TABLE `tbl_m_devices_services` (
  `mbr_id` int(11) NOT NULL COMMENT 'รหัสยืม-คืน',
  `ref_t_id` int(11) NOT NULL COMMENT 'รหัสประเภท tbl_m_devices_type',
  `ref_d_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสเลขอุปกรณ์ tbl_m_devices',
  `ref_m_id` int(11) NOT NULL COMMENT 'รหัสผู้ยืม tbl_member',
  `mbr_reason` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เหตุผลที่ยืม',
  `mbr_repair_reason` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เหตุผลที่ส่งซ่อม',
  `mbr_date_lend` date NOT NULL COMMENT 'วันที่ยืม',
  `mbr_staff_id_lend` int(11) NOT NULL COMMENT 'รหัสผู้บันทึกยืม tbl_member',
  `mbr_staff_name_lend` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อผู้บันทึก',
  `mbr_date_return` date DEFAULT NULL COMMENT 'วันที่คืน',
  `mbr_staff_id_return` int(11) DEFAULT NULL COMMENT 'รหัสผู้บันทึกคืน tbl_member',
  `mbr_staff_name_return` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อผู้บันทึกการคืน',
  `mbr_date_repair` date DEFAULT NULL COMMENT 'วันที่ส่งซ่อม',
  `mbr_datesave` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'วันที่บันทึก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตารางข้อมูลยืม-คืน';

--
-- Dumping data for table `tbl_m_devices_services`
--

INSERT INTO `tbl_m_devices_services` (`mbr_id`, `ref_t_id`, `ref_d_id`, `ref_m_id`, `mbr_reason`, `mbr_repair_reason`, `mbr_date_lend`, `mbr_staff_id_lend`, `mbr_staff_name_lend`, `mbr_date_return`, `mbr_staff_id_return`, `mbr_staff_name_return`, `mbr_date_repair`, `mbr_datesave`) VALUES
(1, 3, 'BP1001', 4, 'ยืมไปออกหน่วย', '', '2021-01-28', 10, 'สุดารัตน์', '2021-12-22', 2, 'ชัยนันท์', '2021-12-22', '2021-11-28 06:24:29'),
(2, 3, 'BP1002', 5, 'ไม่พอใช้ค่ะ', 'เครื่องวัดเพี้ยน', '2021-02-28', 10, 'สุดารัตน์', '2021-11-20', 2, 'ชัยนันท์', '2021-02-28', '2021-11-28 06:25:38'),
(3, 3, 'BP1005', 4, 'ยืมไปออกหน่วย', '', '2019-05-28', 2, 'ชัยนันท์', '2021-12-19', 2, 'ชัยนันท์', '2021-12-19', '2019-11-28 06:27:11'),
(4, 3, 'BP1006', 6, 'ไม่พอใช้คนไข้เยอะ', 'ใช้งานไม่ได้', '2020-06-28', 2, 'ชัยนันท์', '2020-11-11', 10, 'สุดารัตน์', '2021-06-28', '2020-11-11 06:28:03'),
(5, 3, 'BPM1001', 7, 'ออกหน่วยต่างจังหวัด', 'เครื่องวัดไม่ตรง', '2021-11-28', 2, 'ชัยนันท์', '2021-12-03', 2, 'ชัยนันท์', '2021-12-03', '2021-11-28 06:29:14'),
(6, 3, 'SP1001', 7, 'ออกหน่วยต่างจังหวัด', '', '2021-11-28', 2, 'ชัยนันท์', '2021-11-28', 10, 'สุดารัตน์', NULL, '2021-11-28 06:29:14'),
(7, 4, 'it1001', 9, 'เนื่องจากมี PE ต้องคีย์เยอะ', '', '2021-12-03', 2, 'ชัยนันท์', '2021-12-12', 2, 'ชัยนันท์', '2021-12-12', '2021-12-03 14:20:05'),
(8, 1, 'XR1001', 8, 'ไปตจว.', '', '2021-12-09', 10, 'สุดารัตน์', NULL, NULL, NULL, NULL, '2021-12-09 17:52:31'),
(9, 4, 'it1002', 6, 'ไม่พอใช้', '', '2021-12-09', 10, 'สุดารัตน์', '2021-12-19', 2, 'ชัยนันท์', '2021-12-19', '2021-12-09 17:55:53'),
(10, 3, 'BP1002', 5, 'หน่วยมีคนไข้เยอะ', '', '2020-12-09', 10, 'สุดารัตน์', NULL, NULL, NULL, NULL, '2021-12-09 18:00:51'),
(11, 3, 'SP1001', 5, 'หน่วยมีคนไข้เยอะ', '', '2020-12-09', 10, 'สุดารัตน์', NULL, NULL, NULL, NULL, '2021-12-09 18:00:51'),
(12, 3, 'BP1001', 5, 'ไปออกหน่วยบริษัท', '', '2021-12-09', 10, 'สุดารัตน์', NULL, NULL, NULL, NULL, '2021-12-09 18:02:56'),
(13, 1, 'EKG1002', 5, 'ไปออกหน่วยบริษัท', '', '2021-12-09', 10, 'สุดารัตน์', NULL, NULL, NULL, NULL, '2021-12-09 18:02:56'),
(14, 3, 'BP1005', 9, 'เพราะหน่วยไม่พอใช้', '', '2020-12-09', 10, 'สุดารัตน์', NULL, NULL, NULL, NULL, '2021-12-09 18:04:31'),
(15, 3, 'BPM1002', 9, 'เพราะหน่วยไม่พอใช้', '', '2021-12-09', 10, 'สุดารัตน์', NULL, NULL, NULL, NULL, '2021-12-09 18:04:31'),
(16, 1, 'CR10001', 13, 'ที่หน่วยงานจำเป็นต้องใช้ครับ', '', '2021-12-15', 2, 'ชัยนันท์', NULL, NULL, NULL, NULL, '2021-12-15 15:01:26'),
(17, 1, 'EKG1001', 13, 'ที่หน่วยงานจำเป็นต้องใช้ครับ', '', '2021-12-15', 2, 'ชัยนันท์', NULL, NULL, NULL, NULL, '2021-12-15 15:01:26'),
(18, 3, 'SP1002', 13, 'ที่หน่วยงานจำเป็นต้องใช้ครับ', '', '2019-12-15', 2, 'ชัยนันท์', NULL, NULL, NULL, NULL, '2021-12-15 15:01:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_devices_status`
--

CREATE TABLE `tbl_m_devices_status` (
  `s_id` int(11) NOT NULL COMMENT 'รหัสสถานะ',
  `s_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อสถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตารางสถานนะอุปกรณ์';

--
-- Dumping data for table `tbl_m_devices_status`
--

INSERT INTO `tbl_m_devices_status` (`s_id`, `s_name`) VALUES
(1, 'ว่าง'),
(2, 'ถูกยืม'),
(3, 'ชำรุด'),
(4, 'ส่งซ่อม');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_devices_type`
--

CREATE TABLE `tbl_m_devices_type` (
  `t_id` int(11) NOT NULL COMMENT 'รหัสประเภท',
  `t_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อประเภท'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตารางประเภทอุปกรณ์';

--
-- Dumping data for table `tbl_m_devices_type`
--

INSERT INTO `tbl_m_devices_type` (`t_id`, `t_name`) VALUES
(1, 'บริภัณฑ์การแพทย์'),
(2, 'เครื่องมือแพทย์'),
(3, 'อุปกรณ์การแพทย์'),
(4, 'คอมพิวเตอร์');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `pid` int(11) NOT NULL COMMENT 'รหัสตำแหน่ง',
  `pname` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อตำแหน่ง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ตารางตำแหน่ง';

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`pid`, `pname`) VALUES
(1, 'ผู้ดูแลระบบ'),
(2, 'เจ้าหน้าที่ดูแลอุปกรณ์'),
(3, 'ผู้บริหาร'),
(4, 'บุคลากร');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_division`
--
ALTER TABLE `tbl_division`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `tbl_m_devices`
--
ALTER TABLE `tbl_m_devices`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_m_devices_services`
--
ALTER TABLE `tbl_m_devices_services`
  ADD PRIMARY KEY (`mbr_id`);

--
-- Indexes for table `tbl_m_devices_status`
--
ALTER TABLE `tbl_m_devices_status`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tbl_m_devices_type`
--
ALTER TABLE `tbl_m_devices_type`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_division`
--
ALTER TABLE `tbl_division`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสแผนก', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสมาชิก', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_m_devices`
--
ALTER TABLE `tbl_m_devices`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสอุปกรณ์', AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_m_devices_services`
--
ALTER TABLE `tbl_m_devices_services`
  MODIFY `mbr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสยืม-คืน', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_m_devices_status`
--
ALTER TABLE `tbl_m_devices_status`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสถานะ', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_m_devices_type`
--
ALTER TABLE `tbl_m_devices_type`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภท', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตำแหน่ง', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
