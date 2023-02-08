-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 02:08 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fms_cpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`) VALUES
(1, 'Ashwini Lokhande'),
(2, 'Naina Borse Mam'),
(3, 'Sonali Jaju Mam'),
(4, 'Darshana Patil Mam');

-- --------------------------------------------------------

--
-- Table structure for table `fmsadmin`
--

CREATE TABLE `fmsadmin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `upassword` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fmsadmin`
--

INSERT INTO `fmsadmin` (`id`, `name`, `uname`, `upassword`, `email`) VALUES
(1, 'Ashwini Lokhande', 'admin_admin', 'admin@123', 'admin@gmail.com'),
(2, 'Naina Borse Mam', 'admin', 'admin@12', 'admin@123.com');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(255) NOT NULL,
  `que` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `que`) VALUES
(1, 'The content of the subject was useful and interesting'),
(2, 'The lecture was structured and well organised'),
(3, 'The audio and visual connection was good'),
(4, 'The class description accurately described the class content'),
(5, 'hey here que');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(255) NOT NULL,
  `que` varchar(255) NOT NULL,
  `rating` int(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `noentry` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `que`, `rating`, `faculty`, `noentry`) VALUES
(1, 'The content of the subject was useful and interesting', 21, 'Ashwini Lokhande', 5),
(2, 'The lecture was structured and well organised', 21, 'Ashwini Lokhande', 5),
(3, 'The audio and visual connection was good', 21, 'Ashwini Lokhande', 5),
(4, 'The class description accurately described the class content', 21, 'Ashwini Lokhande', 5),
(5, 'hey here que', 21, 'Ashwini Lokhande', 5),
(6, 'The content of the subject was useful and interesting', 12, 'Naina Borse Mam', 4),
(7, 'The lecture was structured and well organised', 13, 'Naina Borse Mam', 4),
(8, 'The audio and visual connection was good', 12, 'Naina Borse Mam', 4),
(9, 'The class description accurately described the class content', 13, 'Naina Borse Mam', 4),
(10, 'hey here que', 12, 'Naina Borse Mam', 4);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `upassword` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `uname`, `name`, `upassword`, `email`, `phone`, `department`, `sem`) VALUES
(1, 'user_user', 'user ', 'user@123', 'user@gmail.com', 123456789, 'computer ', '6'),
(2, 'user_user ', 'user user user', 'user@12', 'test@gmail.com', 987643210, 'Computer', '6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fmsadmin`
--
ALTER TABLE `fmsadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fmsadmin`
--
ALTER TABLE `fmsadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
