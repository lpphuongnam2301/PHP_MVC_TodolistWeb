-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 03:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `todo_comments`
--

CREATE TABLE `todo_comments` (
  `cm_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `nv_id` int(11) NOT NULL,
  `cm_contents` text COLLATE utf8_unicode_ci NOT NULL,
  `cm_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `todo_comments`
--

INSERT INTO `todo_comments` (`cm_id`, `job_id`, `nv_id`, `cm_contents`, `cm_date`) VALUES
(28, 1, 1, 'momomo', '2021-04-14'),
(29, 1, 1, 'bobobobo', '2021-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `todo_job`
--

CREATE TABLE `todo_job` (
  `job_id` int(11) NOT NULL,
  `job_name` text COLLATE utf8_unicode_ci NOT NULL,
  `job_startdate` date NOT NULL,
  `job_enddate` date NOT NULL,
  `job_finishdate` date NOT NULL,
  `job_type` tinyint(1) NOT NULL COMMENT '0-private/1-public',
  `nv_id` int(11) NOT NULL,
  `nv_partners` text COLLATE utf8_unicode_ci NOT NULL,
  `job_files` text COLLATE utf8_unicode_ci NOT NULL,
  `job_content` text COLLATE utf8_unicode_ci NOT NULL,
  `job_status` int(11) NOT NULL COMMENT '0-chuaxong,1-daxong'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `todo_job`
--

INSERT INTO `todo_job` (`job_id`, `job_name`, `job_startdate`, `job_enddate`, `job_finishdate`, `job_type`, `nv_id`, `nv_partners`, `job_files`, `job_content`, `job_status`) VALUES
(1, 'Public 11111111111111111111', '2021-04-08', '2021-04-16', '0000-00-00', 1, 1, '[1,2,3]', 'a1.txt,a.txt', 'hello momomomomomoo', 0),
(2, 'public 2222222222222222222', '0000-00-00', '2021-04-12', '0000-00-00', 1, 1, '', 'cau1.java', '', 0),
(3, 'public 3333333333333333333333333', '0000-00-00', '2021-04-08', '0000-00-00', 1, 1, '', '', '', 1),
(4, 'private 11111111111111', '0000-00-00', '2021-04-08', '0000-00-00', 0, 1, '', '', '', 1),
(5, 'private 22222222222222', '0000-00-00', '0000-00-00', '0000-00-00', 0, 1, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `todo_nhanvien`
--

CREATE TABLE `todo_nhanvien` (
  `nv_id` int(11) NOT NULL,
  `nv_firstname` text COLLATE utf8_unicode_ci NOT NULL,
  `nv_lastname` text COLLATE utf8_unicode_ci NOT NULL,
  `nv_birthday` date NOT NULL,
  `nv_gender` text COLLATE utf8_unicode_ci NOT NULL,
  `nv_email` text COLLATE utf8_unicode_ci NOT NULL,
  `nv_password` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'MD5',
  `nv_level` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'NV/QL',
  `nv_address` text COLLATE utf8_unicode_ci NOT NULL,
  `nv_phone` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `todo_nhanvien`
--

INSERT INTO `todo_nhanvien` (`nv_id`, `nv_firstname`, `nv_lastname`, `nv_birthday`, `nv_gender`, `nv_email`, `nv_password`, `nv_level`, `nv_address`, `nv_phone`) VALUES
(1, 'Admin', 'Here', '2000-12-12', 'maile', 'admin@gmail.com', '', '', '', ''),
(2, 'Nguyen Van', 'Teo', '0000-00-00', '', '', '', '', '', ''),
(3, 'Nguyễn Văn', 'Minh', '2000-01-01', 'male', 'nguyenvanminh@gmail.com', '46f94c8de14fb36680850768ff1b7f2a', 'NV', 'Quận 10, TP.HCM', '0937324778'),
(5, 'Nguyễn Văn', 'Nam', '2000-01-01', 'male', 'nguyenvanminh@gmail.com', '46f94c8de14fb36680850768ff1b7f2a', 'NV', 'Quận 10, TP.HCM', '0937324778'),
(6, 'Nguyễn Văn', 'Bao', '2000-01-01', 'male', 'nguyenvanminh@gmail.com', '46f94c8de14fb36680850768ff1b7f2a', 'NV', 'Quận 10, TP.HCM', '0937324778');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todo_comments`
--
ALTER TABLE `todo_comments`
  ADD PRIMARY KEY (`cm_id`),
  ADD KEY `todo_comments_ibfk_1` (`job_id`),
  ADD KEY `todo_comments_ibfk_2` (`nv_id`);

--
-- Indexes for table `todo_job`
--
ALTER TABLE `todo_job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `todo_nhanvien`
--
ALTER TABLE `todo_nhanvien`
  ADD PRIMARY KEY (`nv_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo_comments`
--
ALTER TABLE `todo_comments`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `todo_job`
--
ALTER TABLE `todo_job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `todo_nhanvien`
--
ALTER TABLE `todo_nhanvien`
  MODIFY `nv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todo_comments`
--
ALTER TABLE `todo_comments`
  ADD CONSTRAINT `todo_comments_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `todo_job` (`job_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `todo_comments_ibfk_2` FOREIGN KEY (`nv_id`) REFERENCES `todo_nhanvien` (`nv_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
