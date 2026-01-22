-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2026 at 06:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_donatt`
--

-- --------------------------------------------------------

--
-- Table structure for table `dos`
--

CREATE TABLE `dos` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `blood_group` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dos`
--

INSERT INTO `dos` (`id`, `name`, `phone`, `email`, `gender`, `pincode`, `blood_group`) VALUES
(1, 'Akshay Hittnalli', '9108696598 ', 'akshayshitnalli@gmail.com', 'Male', '5881334', 'A+'),
(5, 'Manish', '848879043 ', 'manish@gmail.com', 'Male', '590018', 'B+'),
(6, 'Arihant', '89459903339 ', 'arihant@gmail.com', 'Male', '590018', 'AB+'),
(7, 'Ajay', '84673672 ', 'ajay@gmail.com', 'Male', '5881334', 'O-'),
(8, 'Ashwin', '84673672 ', 'ashwin@gmail.com', 'Male', '5881334', 'AB+'),
(9, 'Anuj', '8988696598 ', 'anuj@gmail.com', 'Male', '5881334', 'AB+'),
(10, 'anuj', '9108923943 ', 'anuj@gmail.com', 'Male', '5881334', 'B+'),
(11, 'Vinay v', '9484032344 ', 'vinay@gmail.com', 'Male', '5881334', 'B+'),
(12, 'Akshay S H', '92110298980 ', 'akshayshitnalli@gmail.com', 'Male', '5881334', 'O+'),
(13, 'chetan ', '94330298980 ', 'chetan@gmail.com', 'Male', '5881334', 'O+'),
(14, 'mahesh', '9892892893 ', 'mahesh@gmail.com', 'Male', '590018', 'B+'),
(15, 'Ajith', '9989928292 ', 'ajith@gmail.com', 'Male', '590018', 'B-'),
(16, 'Herry', '973774399 ', 'herry@gmail.com', 'Male', '590016', 'B+'),
(17, 'Alok', '876665667 ', 'alok@gmaiil.com', 'Male', '590018', 'AB+'),
(18, 'Ajeth', '9102838982 ', 'ajeth@gmail.com', 'Male', '598008', 'A+'),
(19, 'Ajeth', '9102838982 ', 'ajeth@gmail.com', 'Male', '598008', 'A+'),
(20, 'Aman', '92920303 ', 'aman@gmail.com', 'Male', '598008', 'O+'),
(21, 'Akshay S H', '9108696598 ', 'akshay@gmail.com', 'Male', '560098', 'A+'),
(22, 'Suraj', '910209202 ', 'surajiuiq@gmail.com', 'Male', '560098', 'B+');

-- --------------------------------------------------------

--
-- Table structure for table `user_location`
--

CREATE TABLE `user_location` (
  `id` int(11) NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_locations`
--

CREATE TABLE `user_locations` (
  `id` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dos`
--
ALTER TABLE `dos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_location`
--
ALTER TABLE `user_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_locations`
--
ALTER TABLE `user_locations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dos`
--
ALTER TABLE `dos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_location`
--
ALTER TABLE `user_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_locations`
--
ALTER TABLE `user_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
