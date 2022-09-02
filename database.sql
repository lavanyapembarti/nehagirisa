-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2022 at 04:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(30) NOT NULL,
  `course` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `level` varchar(150) NOT NULL,
  `total_amount` float NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `description`, `level`, `total_amount`, `date_created`) VALUES
(1, 'Course ', 'Sample', '1', 4500, '2020-10-31 11:01:15'),
(3, 'IT', 'collage fee', '1st year', 30000, '2022-06-28 10:53:14'),
(4, 'computer science', 'degree', '1st year', 25000, '2022-06-30 17:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(30) NOT NULL,
  `course_id` int(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `course_id`, `description`, `amount`) VALUES
(1, 1, 'Tuition', 3000),
(3, 1, 'sample', 1500),
(4, 0, 'tution fee', 20000),
(5, 0, 'library fee', 1000),
(6, 0, 'statinory', 1000),
(7, 0, 'bus', 10000),
(8, 3, 'tution fee', 20000),
(9, 3, 'labirary fee', 3000),
(10, 3, 'bus fee', 7000),
(11, 4, 'tution fee', 20000),
(12, 4, 'bus fee', 3000),
(13, 4, 'other fees', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(30) NOT NULL,
  `ef_id` int(30) NOT NULL,
  `amount` float NOT NULL,
  `remarks` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `ef_id`, `amount`, `remarks`, `date_created`) VALUES
(1, 1, 1000, 'sample', '2020-10-31 14:25:35'),
(2, 1, 500, 'sample 2', '2020-10-31 14:47:15'),
(3, 0, 2000, 'online', '2022-06-27 10:46:29'),
(10, 4, 20, 'online', '2022-06-27 15:46:19'),
(12, 4, 4000, 'offline', '2022-06-27 15:49:26'),
(13, 5, 4500, 'offline', '2022-06-27 15:51:31'),
(14, 6, 10000, 'offline', '2022-06-28 10:57:01'),
(15, 4, 100, 'academic fees', '2022-06-28 11:35:58'),
(16, 6, 1000, 'online', '2022-06-28 11:39:02'),
(17, 7, 20000, 'offine', '2022-06-28 14:00:27'),
(18, 3, 1000, 'online', '2022-06-29 22:24:34'),
(19, 7, 5000, 'online\r\n', '2022-06-29 22:25:24'),
(20, 8, 2000, 'online\r\n', '2022-06-30 17:50:33'),
(21, 9, 5000, 'offline', '2022-06-30 17:56:24'),
(22, 10, 500, 'online ', '2022-07-27 20:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `student_ef_list`
--

CREATE TABLE `student_ef_list` (
  `id` int(30) NOT NULL,
  `student_id` int(30) NOT NULL,
  `ef_no` varchar(200) NOT NULL,
  `course_id` int(30) NOT NULL,
  `total_fee` float NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_ef_list`
--

INSERT INTO `student_ef_list` (`id`, `student_id`, `ef_no`, `course_id`, `total_fee`, `date_created`) VALUES
(1, 2, '2020-654278', 1, 4500, '2020-10-31 12:04:18'),
(2, 1, '2020-65427823', 1, 4500, '2020-10-31 13:12:13'),
(3, 15, '0001', 0, 32000, '2022-06-27 10:45:41'),
(4, 16, '0002', 1, 4500, '2022-06-27 10:47:48'),
(5, 20, '0003', 1, 4500, '2022-06-27 15:50:11'),
(6, 21, '0004', 3, 30000, '2022-06-28 10:55:42'),
(7, 22, '0006', 3, 30000, '2022-06-28 13:59:46'),
(9, 23, '20209', 4, 25000, '2022-06-30 17:55:55'),
(10, 24, '200', 1, 4500, '2022-07-27 20:03:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_ef_list`
--
ALTER TABLE `student_ef_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `student_ef_list`
--
ALTER TABLE `student_ef_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
