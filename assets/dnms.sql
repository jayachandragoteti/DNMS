-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2021 at 09:18 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dnms`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `name` varchar(225) NOT NULL,
  `id` varchar(100) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `password` varchar(225) NOT NULL,
  `datm` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`name`, `id`, `degree`, `email`, `contact`, `password`, `datm`) VALUES
('Nikhitha Poornima', '4C0@MVGR', 'B.Tech', 'nikitha@gmail.com', '9491694195', '$2y$10$eD9jwxntfxIOHEcaomFFUuDXofyGp8SD196MZxJxneO8KGc7pa1a2', '2021-08-06 07:03:46'),
('Dr. P.Ravi Kiran Varma', 'RaviKiranVarma@MVGR', 'BE, M.Tech(EST), Ph.D,Associate Professor, HOD,CSE', 'ravikiranvarma@gmail.com', '1231231234', '$2y$10$dD5E5zHSAaoapPzX7qUMGOr2v6Fd3y2HjJ9d2Gvq1UpZDOa3DH6AK', '2021-08-06 04:43:14'),
('Dr.M.Sunil Prakash', 'sunilprakash@MVGR', 'M.E., Ph.D,Professor, Dean, HOD,ECE', 'sunilprakash@gmail.com', '1234567890', '$2y$10$llcJOtnoDAz5nLYcxTizyeC2wPt9y84BlxyIwKOW4LYyzjqMR0ww6', '2021-08-06 04:41:23');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `sno` int(11) NOT NULL,
  `facultyId` varchar(100) NOT NULL,
  `name` varchar(225) NOT NULL,
  `subject` longtext NOT NULL,
  `year` int(1) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `section` varchar(3) NOT NULL,
  `link` mediumtext NOT NULL,
  `file` varchar(225) NOT NULL,
  `datm` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`sno`, `facultyId`, `name`, `subject`, `year`, `branch`, `section`, `link`, `file`, `datm`) VALUES
(16, '4C0@MVGR', 'Demo Resume ', 'Demo resume for 4th-year students', 4, 'All', 'All', '', 'Demo Resume 2021_08_0612_35_11pm8420.docx', '06-08-2021 12:35:11'),
(17, '4C0@MVGR', 'TCS Registration ', 'TCS Registrations process for 4th years ', 4, 'All', 'All', '', 'TCS Registration 2021_08_0612_36_11pm1371.pdf', '06-08-2021 12:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` varchar(225) NOT NULL,
  `id` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contactNo` varchar(14) NOT NULL,
  `dob` date NOT NULL,
  `year` int(1) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `section` varchar(1) NOT NULL,
  `password` varchar(225) NOT NULL,
  `datm` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `id`, `email`, `contactNo`, `dob`, `year`, `branch`, `section`, `password`, `datm`) VALUES
(' JAYACHANDRA GOTETI', '18A51A0515', 'gotetijayachandra@gmail.com', '9491694195', '2021-08-16', 3, 'CSE', 'A', '$2y$10$TjbPgy44qOKWIWQYKcXyceW2qFo49knLIBneBAPYlqIaV8voPzpUy', '2021-08-06 07:07:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact` (`contact`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
