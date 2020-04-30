-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 11:46 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `id` int(11) NOT NULL,
  `roll` varchar(10) NOT NULL,
  `attend` varchar(255) NOT NULL,
  `att_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`id`, `roll`, `attend`, `att_time`) VALUES
(1, 'ML-01', 'Present', '2020-04-28'),
(2, 'WD-01', 'Present', '2020-04-28'),
(3, 'WD-02', 'Present', '2020-04-28'),
(4, 'WD-03', 'Absent', '2020-04-28'),
(5, 'ML-02', 'Absent', '2020-04-28'),
(6, 'NLP-01', 'Present', '2020-04-28'),
(7, 'ML-03', 'Present', '2020-04-28'),
(8, 'ML-01', 'Present', '2020-04-29'),
(9, 'WD-01', 'Present', '2020-04-29'),
(10, 'WD-02', 'Present', '2020-04-29'),
(11, 'WD-03', 'Present', '2020-04-29'),
(12, 'ML-02', 'Present', '2020-04-29'),
(13, 'NLP-01', 'Present', '2020-04-29'),
(14, 'ML-03', 'Present', '2020-04-29'),
(15, 'ML-01', 'Present', '2020-04-30'),
(16, 'WD-01', 'Present', '2020-04-30'),
(17, 'WD-02', 'Absent', '2020-04-30'),
(18, 'WD-03', 'Absent', '2020-04-30'),
(19, 'ML-02', 'Present', '2020-04-30'),
(20, 'NLP-01', 'Absent', '2020-04-30'),
(21, 'ML-03', 'Absent', '2020-04-30'),
(22, 'ML-01', 'Present', '2020-05-01'),
(23, 'WD-01', 'Present', '2020-05-01'),
(24, 'WD-02', 'Absent', '2020-05-01'),
(25, 'WD-03', 'Present', '2020-05-01'),
(26, 'ML-02', 'Present', '2020-05-01'),
(27, 'NLP-01', 'Present', '2020-05-01'),
(28, 'ML-03', 'Present', '2020-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `name`, `roll`) VALUES
(1, 'Jainam Doshi', 'ML-01'),
(2, 'Riya Jakhariya', 'WD-01'),
(3, 'Rudresh Dongre', 'WD-02'),
(4, 'Nirali Dodhia', 'WD-03'),
(5, 'Yash Oswal', 'ML-02'),
(6, 'Nikhil Shetty', 'NLP-01'),
(7, 'Viraj Modi', 'ML-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
