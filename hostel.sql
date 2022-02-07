-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2022 at 12:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(10) NOT NULL,
  `student` varchar(100) NOT NULL,
  `reg_number` varchar(100) NOT NULL,
  `hostel` varchar(200) NOT NULL,
  `phase` varchar(200) NOT NULL,
  `room_number` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `student`, `reg_number`, `hostel`, `phase`, `room_number`, `status`, `date`) VALUES
(1, 'Patrick Terna Joseph', 'nsu/nas/cmp/0722/17/18', 'MainHall', 'Main Hall Phase 1', 2, 'Approved', '2022-01-29 14:08:36'),
(2, 'Esther Martins', 'nsu/nas/cmp/0677/17/18', 'NewHostel', 'New Hostel Phase 2', 3, 'Approved', '2022-01-29 13:31:03'),
(4, 'Patrick Terna Joseph', 'nsu/nas/cmp/0722/17/18', 'Mande', 'Mande', 34, 'Approved', '2022-01-29 13:48:14'),
(6, 'Patrick Terna Joseph', 'nsu/nas/cmp/0722/17/18', 'MainHall', 'Main Hall Phase 2', 80, 'Approved', '2022-01-29 13:58:58'),
(7, 'John', 'nap02224', 'MainHall', 'Main Hall Phase 2', 65, 'Approved', '2022-01-29 14:53:51'),
(8, 'Sir Joe', 'nas/cmp/0722', 'NewHostel', 'New Hostel Phase 2', 45, 'Approved', '2022-01-29 15:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `register_number` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `register_number`, `password`, `role`, `date`) VALUES
(1, 'bsu/sc/cmp/39484', 'master', 2, '2022-01-27 22:56:16'),
(2, 'nsu/nas/cmp/0722', 'silas', 2, '2022-01-27 22:57:28'),
(3, 'joe', 'joe', 1, '2022-01-27 23:00:06'),
(4, 'nsu/nas/cmp/0722/17/18', 'EstherPatrick', 2, '2022-01-29 11:07:02'),
(5, 'nsu/nas/cmp/0677/17/18', '12345', 2, '2022-01-29 11:08:56'),
(6, 'nap02224', '12345', 2, '2022-01-29 14:32:35'),
(7, 'nas/cmp/0722', '12345', 2, '2022-01-29 15:22:56'),
(8, 'nas/cmp/o723', '12345', 2, '2022-01-29 15:55:10'),
(9, 'bsu/sc/cmp/17/3425', 'bade', 2, '2022-01-31 07:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) NOT NULL,
  `card_number` int(100) NOT NULL,
  `pin` int(4) NOT NULL,
  `cvv` int(3) NOT NULL,
  `student` varchar(100) NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `cardtype` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `card_number`, `pin`, `cvv`, `student`, `expiry_date`, `cardtype`, `status`, `date`) VALUES
(1, 2147483647, 778, 789, 'nsu/nas/cmp/0722', '2022-01-04', 'master', 1, '2022-01-28 01:56:31'),
(2, 1234567890, 2155, 453, 'nsu/nas/cmp/0677/17/18', '2023-12-13', 'master', 1, '2022-01-29 11:28:21'),
(3, 2147483647, 1324, 124, 'nsu/nas/cmp/0677/17/18', '2022-01-24', 'verve', 1, '2022-01-29 12:21:14'),
(4, 2147483647, 3536, 687, 'nsu/nas/cmp/0677/17/18', '2022-01-25', 'verve', 1, '2022-01-29 12:22:18'),
(5, 2147483647, 2323, 234, 'nsu/nas/cmp/0722/17/18', '2022-03-05', 'verve', 1, '2022-01-29 14:29:37'),
(6, 23456789, 3456, 234, 'nap02224', '2022-04-12', 'master', 1, '2022-01-29 14:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(10) NOT NULL,
  `student_name` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `department` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL,
  `state` varchar(200) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `parent_name` varchar(200) NOT NULL,
  `reg_number` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `student_name`, `gender`, `department`, `level`, `state`, `phone_number`, `address`, `parent_name`, `reg_number`, `date`) VALUES
(1, 'John', 'male', 'Computer Science', '200', 'Benue', 2147483647, 'Kuje Abuja', 'Master P', 'bsu/sc/cmp/39484', '2022-01-27 22:56:15'),
(2, 'Joy', 'female', 'CRS', '200', 'Nasarawa', 345363, 'Kabi', 'Silas', 'nsu/nas/cmp/0722', '2022-01-27 22:57:28'),
(4, 'Patrick Terna Joseph', 'male', 'Computer Science', '200', 'Benue', 2147483647, 'Keffi', 'Master P', 'nsu/nas/cmp/0722/17/18', '2022-01-29 11:07:02'),
(5, 'Esther Martins', 'female', 'Computer Science', '200', 'Benue', 805986875, 'Abuja', 'Maazi', 'nsu/nas/cmp/0677/17/18', '2022-01-29 11:08:56'),
(6, 'John', 'male', 'Computer Science', '100', 'Nasarawa', 2147483647, 'Kuje Abuja', 'Maazi', 'nap02224', '2022-01-29 14:32:35'),
(7, 'Sir Joe', 'male', 'Computer Science', '100', 'Nasarawa', 896544366, 'Keffi', 'Peter', 'nas/cmp/0722', '2022-01-29 15:22:56'),
(8, 'Martins', 'male', 'Computer Science', '200', 'Nasarawa', 2147483647, 'Kabi', 'Andrew', 'nas/cmp/o723', '2022-01-29 15:55:10'),
(9, 'James John', 'male', 'Computer Science', '100', 'Benue', 2147483647, 'Kuje Abuja', 'Andrew', 'bsu/sc/cmp/17/3425', '2022-01-31 07:39:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
