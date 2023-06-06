-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2023 at 10:47 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clubnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `Username_Admin` varchar(225) NOT NULL,
  `Password_Admin` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`Username_Admin`, `Password_Admin`) VALUES
('Vishal', '12345'),
('', '');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `club_id` varchar(225) NOT NULL,
  `club_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`club_id`, `club_name`) VALUES
('222-22-2', 'IEEE'),
('333-33-3', 'vn');

-- --------------------------------------------------------

--
-- Table structure for table `event_details`
--

CREATE TABLE `event_details` (
  `Event_name` varchar(225) NOT NULL,
  `Event_details` varchar(225) NOT NULL,
  `Capacity` int(100) NOT NULL,
  `Venue` varchar(225) NOT NULL,
  `Time` time NOT NULL,
  `Date` date NOT NULL,
  `Avatar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_details`
--

INSERT INTO `event_details` (`Event_name`, `Event_details`, `Capacity`, `Venue`, `Time`, `Date`, `Avatar`) VALUES
('Chemeo chase', 'Participate and win', 0, 'Reading hall', '10:11:00', '2023-10-10', 'uploads/eventAvatar_641f4b6a7e922.jpg'),
('aeroexterme', 'Aeroexterme', 100, 'Reading hall', '00:24:00', '2023-02-10', 'uploads/eventAvatar_641f4bf7c6a78.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `sr_no` int(11) NOT NULL,
  `club_name` varchar(225) NOT NULL,
  `stud_name` varchar(225) NOT NULL,
  `prn` int(100) NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`sr_no`, `club_name`, `stud_name`, `prn`, `request_date`) VALUES
(6, 'VN', 'Dhanashri', 12220069, '2023-03-22'),
(3, 'VEH', 'Vishal', 12220083, '2023-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `moderator_info`
--

CREATE TABLE `moderator_info` (
  `moderator_name` varchar(225) NOT NULL,
  `moderator_pass` varchar(225) NOT NULL,
  `club` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moderator_info`
--

INSERT INTO `moderator_info` (`moderator_name`, `moderator_pass`, `club`, `email`) VALUES
('Dhanashri', '123', 'Vishwa Netrutva', 'dhanusonawane28@gmail.com'),
('Riddhi', '5677', 'VEH', 'riddhi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `sender` varchar(225) NOT NULL,
  `notice` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`sender`, `notice`) VALUES
('moderator', 'Hi i am moderator'),
('moderator', 'notice by admin'),
('moderator', 'second notice by admin'),
('Admin', 'hi'),
('Moderator', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `sr_no` int(11) NOT NULL,
  `club_name` varchar(225) NOT NULL,
  `stud_name` varchar(225) NOT NULL,
  `prn` int(11) NOT NULL,
  `accept_reject` tinyint(1) NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `prn` int(225) NOT NULL,
  `pass` varchar(225) NOT NULL,
  `stud_name` varchar(225) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
