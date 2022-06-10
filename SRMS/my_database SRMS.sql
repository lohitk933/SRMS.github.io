-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2022 at 08:50 PM
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
-- Database: `my`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `ausername` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `ausername`, `password`, `created_at`) VALUES
(1, 'lohit', '12345', '2021-12-24 22:35:48'),
(2, 'naga', '12345', '2022-01-12 22:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `conf`
--

CREATE TABLE `conf` (
  `sno` int(3) NOT NULL,
  `name` text NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `email` varchar(22) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `desc` text NOT NULL,
  `dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conf`
--

INSERT INTO `conf` (`sno`, `name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) VALUES
(1, 'ektha', 20, 'female', 'ektha@gmail.com', '8672903871', 'i am leaving te collage plz delete my record.\r\n1st sem B sec cse', '2022-01-13 00:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `fdetails`
--

CREATE TABLE `fdetails` (
  `sno` int(11) NOT NULL,
  `fname` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `number` varchar(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `qualification` varchar(20) NOT NULL,
  `subject` text NOT NULL,
  `gender` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fdetails`
--

INSERT INTO `fdetails` (`sno`, `fname`, `email`, `number`, `address`, `username`, `password`, `qualification`, `subject`, `gender`, `timestamp`) VALUES
(1, 'Lohit Kumar A Bhattangi', 'lohitk932@gmail.com', '9972934418', 'Vkit boys hostel kumbalagodu mysor road', 'lohit', 'lohit', 'M Tech', 'Computer', 'male', '2022-01-10 15:17:59'),
(2, 'Nagaraj', 'naga@gmail.com', '9108550913', 'Vkit boys hostel kumbalagodu mysor road', 'naga', 'naga', 'M Tech', 'Maths', 'male', '2022-01-10 15:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `sno` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `usn` varchar(11) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `sec` varchar(10) NOT NULL,
  `sub1` int(11) NOT NULL,
  `sub2` int(11) NOT NULL,
  `sub3` int(11) NOT NULL,
  `sub4` int(11) NOT NULL,
  `sub5` int(11) NOT NULL,
  `sub6` int(11) NOT NULL,
  `tmarks` int(11) NOT NULL,
  `cent` int(11) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`sno`, `fname`, `usn`, `sem`, `sec`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `tmarks`, `cent`, `grade`, `timestamp`) VALUES
(1, 'Shashidhar D', '1vk19cs046', '5th', 'B', 98, 91, 88, 75, 80, 95, 526, 88, 'A+', '2022-01-10 15:22:35'),
(2, 'Ashwin', '1VK20CS400', '5th', 'B', 95, 88, 78, 93, 89, 99, 542, 90, 'A+', '2022-01-10 15:23:21'),
(3, 'Nagaraj', '1VK19CS026', '5th', 'A', 87, 89, 94, 98, 60, 99, 527, 88, 'A+', '2022-01-10 15:24:02'),
(4, 'siddharth b', '1VK19CS052', '3rd', 'B', 20, 30, 45, 30, 22, 30, 177, 30, 'FAIL', '2022-01-10 15:24:35'),
(5, 'Niriksha', '1vk19cs029', '5th', 'A', 80, 86, 79, 79, 75, 71, 470, 78, 'B', '2022-01-10 15:26:37'),
(6, 'Shashank B', '1VK19CS045', '5th', 'B', 95, 88, 78, 80, 80, 99, 520, 87, 'A+', '2022-01-10 15:30:27'),
(7, 'Amulya', '1VK19CS005', '5th', 'A', 80, 70, 70, 70, 79, 80, 449, 75, 'B', '2022-01-10 15:31:10'),
(8, 'Monisha', '1VK19CS025', '5th', 'A', 90, 90, 80, 70, 79, 80, 489, 82, 'B', '2022-01-10 15:31:42'),
(9, 'Ricchu', '1vk20cs001', '3rd', 'D', 69, 60, 62, 80, 59, 71, 401, 67, 'C', '2022-01-10 15:35:15'),
(10, 'Sharath', '1vk18cs001', '7th', 'C', 69, 89, 80, 55, 67, 71, 431, 72, 'B', '2022-01-10 15:35:53'),
(11, 'Ektha', '1VK21CS002', '1st', 'A', 80, 80, 60, 32, 32, 29, 313, 52, 'C', '2022-01-10 15:39:54'),
(12, 'Shakhar', '1VK21CS001', '1st', 'B', 90, 99, 96, 92, 26, 30, 433, 72, 'B', '2022-01-10 15:40:26');

--
-- Triggers `result`
--
DELIMITER $$
CREATE TRIGGER `result_delete` BEFORE DELETE ON `result` FOR EACH ROW INSERT INTO resultlog SET fname = OLD.fname, usn = OLD.usn, tmarks = OLD.tmarks, cent = OLD.cent, grade = OLD.grade, action = 'DELETED'
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `result_insert` AFTER INSERT ON `result` FOR EACH ROW INSERT INTO resultlog SET fname = NEW.fname, usn = NEW.usn, tmarks = NEW.tmarks, cent = NEW.cent, grade = NEW.grade, action = 'INSERTED'
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `result_update` BEFORE UPDATE ON `result` FOR EACH ROW INSERT INTO resultlog SET fname = OLD.fname, usn = OLD.usn, tmarks = OLD.tmarks, cent = OLD.cent, grade = OLD.grade, action = 'UPDATED'
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `resultlog`
--

CREATE TABLE `resultlog` (
  `sno` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `usn` varchar(10) NOT NULL,
  `tmarks` int(11) NOT NULL,
  `cent` int(11) NOT NULL,
  `grade` varchar(11) NOT NULL,
  `action` text NOT NULL,
  `ctime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resultlog`
--

INSERT INTO `resultlog` (`sno`, `fname`, `usn`, `tmarks`, `cent`, `grade`, `action`, `ctime`) VALUES
(1, 'Shashidhar D', '1vk19cs046', 523, 87, 'A+', 'INSERTED', '2022-01-12 23:24:53'),
(2, 'Ashwin', '1VK20CS400', 542, 90, 'A+', 'INSERTED', '2022-01-12 23:24:53'),
(3, 'Nagaraj', '1VK19CS026', 527, 88, 'A+', 'INSERTED', '2022-01-12 23:24:53'),
(4, 'siddharth b', '1VK19CS052', 177, 30, 'FAIL', 'INSERTED', '2022-01-12 23:24:53'),
(5, 'Niriksha', '1vk19cs029', 470, 78, 'B', 'INSERTED', '2022-01-12 23:24:53'),
(6, 'Shashank B', '1VK19CS045', 520, 87, 'A+', 'INSERTED', '2022-01-12 23:24:53'),
(7, 'Amulya', '1VK19CS005', 449, 75, 'B', 'INSERTED', '2022-01-12 23:24:53'),
(8, 'Monisha', '1VK19CS025', 489, 82, 'B', 'INSERTED', '2022-01-12 23:24:53'),
(9, 'Ricchu', '1vk20cs001', 401, 67, 'C', 'INSERTED', '2022-01-12 23:24:53'),
(10, 'Sharath', '1vk18cs001', 431, 72, 'B', 'INSERTED', '2022-01-12 23:24:53'),
(11, 'Ektha', '1VK21CS002', 313, 52, 'C', 'INSERTED', '2022-01-12 23:24:53'),
(12, 'Shakhar', '1VK21CS001', 433, 72, 'B', 'INSERTED', '2022-01-12 23:24:53'),
(14, 'Shashidhar D', '1vk19cs046', 523, 87, 'A+', 'UPDATED', '2022-01-12 23:31:46'),
(15, 'Shashidhar D', '1vk19cs046', 526, 88, 'A+', 'UPDATED', '2022-01-13 00:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `sdetails`
--

CREATE TABLE `sdetails` (
  `sno` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `usn` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `sec` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sdetails`
--

INSERT INTO `sdetails` (`sno`, `fname`, `email`, `number`, `address`, `usn`, `password`, `sem`, `sec`, `gender`, `timestamp`) VALUES
(1, 'Ashwin', 'acchu@gmail.com', '9591951011', 'vkit', '1VK20CS400', '1234', '5th', 'B', 'Male', '2022-01-12 23:49:13'),
(2, 'Shashidhar D', 'Shashidhardesai2002@Gmail.Com', '8431848978', 'Vkit', '1VK19CS046', '1234', '5th', 'B', 'Male', '2022-01-12 23:49:13'),
(3, 'Shashank B', 'Shashank@Gmail.Com', '8884351087', 'Vkit', '1VK19CS045', '1234', '5th', 'B', 'Male', '2022-01-12 23:49:13'),
(4, 'darshan c', 'darshan@gmail.com', '8874396452', 'vkit', '1VK19CS013', '1234', '5th', 'A', 'Male', '2022-01-12 23:49:13'),
(5, 'siddharth b', 'siddu@gmail.com', '8522362971', 'vkit', '1VK19CS052', '1234', '3rd', 'B', 'Male', '2022-01-12 23:49:13'),
(6, 'prathap', 'pra@gmail.com', '8976354222', 'kengari police station', '1VK19CS033', '1234', '5th', 'B', 'Male', '2022-01-12 23:49:13'),
(7, 'nagaraj p', 'naga@gmail.com', '9108550913', 'vkit', '1VK19CS026', '1234', '5th', 'A', 'Male', '2022-01-12 23:49:13'),
(8, 'pramod b', 'pramod@gmail.com', '8548820528', 'vkit', '1VK19CS032', '1234', '5th', 'B', 'Male', '2022-01-12 23:49:13'),
(9, 'Shreyas g', 'gh@gmail.com', '7259114719', 'vkit', '1VK19CS017', '1234', '5th', 'A', 'Male', '2022-01-12 23:49:13'),
(10, 'abhishek', 'abhi@gmail.com', '7586423929', 'kengari police station', '1VK19CS002', '1234', '5th', 'A', 'Male', '2022-01-12 23:49:13'),
(11, 'abhishek c', 'abhic@gmail.com', '9762392419', 'vkit', '1VK19CS003', '1234', '5th', 'A', 'Male', '2022-01-12 23:49:13'),
(12, 'charan ', 'charan@gmail.com', '8644239718', 'vkit', '1VK19CS012', '1234', '5th', 'A', 'Male', '2022-01-12 23:49:13'),
(13, 'darshan b', 'darshanb@gmail.com', '9982643379', 'vkit', '1VK19CS014', '1234', '5th', 'A', 'Male', '2022-01-12 23:49:13'),
(14, 'lohit k a', 'lohitk932@gmail.com', '9972934418', 'Vkit boys hostel beng', '1VK19CS021', 'lohit', '5th', 'A', 'Male', '2022-01-13 00:01:13'),
(15, 'nikhil', 'niki@gmail.com', '9652437718', 'satellite', '1VK19CS028', '1234', '5th', 'A', 'Male', '2022-01-12 23:49:13'),
(16, 'niriksha', 'niriksha@gmail.com', '8872394628', 'majestic', '1VK19CS029', '1234', '5th', 'A', 'Female', '2022-01-12 23:49:13'),
(17, 'nayana', 'nayana@gmail.com', '8563924678', 'nayandhalli', '1VK19CS027', '1234', '5th', 'A', 'Female', '2022-01-12 23:49:13'),
(18, 'monisha', 'moni@gmail.com', '8673728889', 'majestic', '1VK19CS025', '1234', '5th', 'A', 'Female', '2022-01-12 23:49:13'),
(19, 'yamuna', 'yamuna@gmail.com', '8673329875', 'vkit', '1VK19CS023', '1234', '5th', 'A', 'Female', '2022-01-12 23:49:13'),
(20, 'amulya', 'amulya@gmail.com', '8523466778', 'k r market', '1VK19CS005', '1234', '5th', 'A', 'Female', '2022-01-12 23:49:13'),
(21, 'Kush', 'kushkumar1405@gmail.com', '9972639487', 'Banashankari', '1VK19CS020', 'kushi', '5th', 'A', 'female', '2022-01-12 23:49:13'),
(22, 'sharath', 'sharath@gmail.com', '8786843255', 'vkit', '1vk18cs001', '1234', '7th', 'C', 'Male', '2022-01-12 23:49:13'),
(23, 'ricchu', 'rich@gmail.com', '9998886543', 'vkit', '1vk20cs001', '1234', '3rd', 'D', 'Male', '2022-01-12 23:49:13'),
(24, 'shakhar', 'shak@gmail.com', '9922634418', 'bengaluru', '1VK21CS001', '1234', '1st', 'B', 'Male', '2022-01-12 23:49:13');

--
-- Triggers `sdetails`
--
DELIMITER $$
CREATE TRIGGER `student_delete` BEFORE DELETE ON `sdetails` FOR EACH ROW INSERT INTO studentlogs SET fname = OLD.fname, usn = OLD.usn, sem = OLD.sem, action = 'DELETED'
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `student_insert` AFTER INSERT ON `sdetails` FOR EACH ROW INSERT INTO studentlogs SET fname = NEW.fname, usn = NEW.usn, sem = NEW.sem, action = 'INSERTED'
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `student_update` BEFORE UPDATE ON `sdetails` FOR EACH ROW INSERT INTO studentlogs SET fname = OLD.fname, usn = OLD.usn, sem = OLD.sem, action = 'UPDATED'
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `studentlogs`
--

CREATE TABLE `studentlogs` (
  `sno` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `usn` varchar(11) NOT NULL,
  `sem` varchar(11) NOT NULL,
  `action` text NOT NULL,
  `creationtime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentlogs`
--

INSERT INTO `studentlogs` (`sno`, `fname`, `usn`, `sem`, `action`, `creationtime`) VALUES
(1, 'Ashwin', '1VK20CS400', '5th', 'INSERTED', '0000-00-00 00:00:00'),
(2, 'Shashidhar D', '1VK19CS046', '5th', 'INSERTED', '0000-00-00 00:00:00'),
(3, 'Shashank B', '1VK19CS045', '5th', 'INSERTED', '0000-00-00 00:00:00'),
(4, 'darshan c', '1VK19CS013', '5th', 'INSERTED', '0000-00-00 00:00:00'),
(5, 'siddharth b', '1VK19CS052', '3rd', 'INSERTED', '0000-00-00 00:00:00'),
(6, 'prathap', '1VK19CS033', '5th', 'INSERTED', '0000-00-00 00:00:00'),
(7, 'nagaraj p', '1VK19CS026', '5th', 'INSERTED', '0000-00-00 00:00:00'),
(8, 'pramod b', '1VK19CS032', '5th', 'INSERTED', '0000-00-00 00:00:00'),
(9, 'Shreyas g', '1VK19CS017', '5th', 'INSERTED', '0000-00-00 00:00:00'),
(10, 'abhishek', '1VK19CS002', '5th', 'INSERTED', '0000-00-00 00:00:00'),
(11, 'abhishek c', '1VK19CS003', '5th', 'INSERTED', '0000-00-00 00:00:00'),
(12, 'charan ', '1VK19CS012', '5th', 'INSERTED', '0000-00-00 00:00:00'),
(13, 'darshan b', '1VK19CS014', '5th', 'INSERTED', '0000-00-00 00:00:00'),
(14, 'lohit k', '1VK19CS021', '5th', 'INSERTED', '0000-00-00 00:00:00'),
(15, 'nikhil', '1VK19CS028', '5th', 'INSERTED', '0000-00-00 00:00:00'),
(16, 'niriksha', '1VK19CS029', '5th', 'INSERTED', '0000-00-00 00:00:00'),
(17, 'nayana', '1VK19CS027', '5th', 'INSERTED', '0000-00-00 00:00:00'),
(18, 'monisha', '1VK19CS025', '5th', 'INSERTED', '0000-00-00 00:00:00'),
(19, 'yamuna', '1VK19CS023', '5th', 'INSERTED', '0000-00-00 00:00:00'),
(20, 'amulya', '1VK19CS005', '5th', 'INSERTED', '0000-00-00 00:00:00'),
(21, 'Kush', '1VK19CS020', '5th', 'INSERTED', '0000-00-00 00:00:00'),
(22, 'sharath', '1vk18cs001', '7th', 'INSERTED', '0000-00-00 00:00:00'),
(23, 'ricchu', '1vk20cs001', '3rd', 'INSERTED', '0000-00-00 00:00:00'),
(24, 'shakhar', '1VK21CS001', '1st', 'INSERTED', '0000-00-00 00:00:00'),
(25, 'ektha', '1VK21CS002', '1st', 'INSERTED', '0000-00-00 00:00:00'),
(26, 'lohit k', '1VK19CS021', '5th', 'UPDATED', '0000-00-00 00:00:00'),
(27, 'lohit kumar', '1VK19CS021', '5th', 'UPDATED', '0000-00-00 00:00:00'),
(28, 'lohit kumar', '1VK19CS021', '5th', 'UPDATED', '2022-01-13 00:03:20'),
(29, 'ektha', '1VK21CS002', '1st', 'DELETED', '2022-01-13 00:04:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conf`
--
ALTER TABLE `conf`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `fdetails`
--
ALTER TABLE `fdetails`
  ADD PRIMARY KEY (`sno`,`username`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`sno`,`usn`);

--
-- Indexes for table `resultlog`
--
ALTER TABLE `resultlog`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `sdetails`
--
ALTER TABLE `sdetails`
  ADD PRIMARY KEY (`sno`,`usn`);

--
-- Indexes for table `studentlogs`
--
ALTER TABLE `studentlogs`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `conf`
--
ALTER TABLE `conf`
  MODIFY `sno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fdetails`
--
ALTER TABLE `fdetails`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `resultlog`
--
ALTER TABLE `resultlog`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sdetails`
--
ALTER TABLE `sdetails`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `studentlogs`
--
ALTER TABLE `studentlogs`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
