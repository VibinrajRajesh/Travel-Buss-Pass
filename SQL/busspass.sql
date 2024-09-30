-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2024 at 07:02 AM
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
-- Database: `busspass`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `order_id` varchar(30) NOT NULL,
  `passno` varchar(255) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `idtype` varchar(30) NOT NULL,
  `idno` varchar(30) NOT NULL,
  `source` varchar(30) NOT NULL,
  `destination` varchar(30) NOT NULL,
  `validity` varchar(30) NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `passcreation` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`order_id`, `passno`, `user_id`, `idtype`, `idno`, `source`, `destination`, `validity`, `payment_status`, `passcreation`) VALUES
('order_P3EtCixEhhmSsv', '220897156', '1', 'Adhaar Card', '619488581380', 'Vashi', 'New Panvel', '1 Month', '', '2024-09-30 09:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `route_id` int(11) NOT NULL,
  `destination` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`route_id`, `destination`) VALUES
(1001, 'Airoli'),
(1002, 'Ghansoli'),
(1003, 'Kopar Khairne'),
(1004, 'Juhu Nagar'),
(1005, 'Vashi'),
(1006, 'Turbhe'),
(1007, 'Sanpada'),
(1008, 'Juinagar'),
(1009, 'Nerul'),
(1010, 'Darave'),
(1011, 'Karave Nagar'),
(1012, 'CBD Belapur'),
(1013, 'Kharghar'),
(1014, 'Kamothe'),
(1015, 'New Panvel'),
(1016, 'Kalamboli'),
(1017, 'Ulwe'),
(1018, 'Dronagiri'),
(1019, 'Taloja');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phoneno` varchar(15) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` varchar(30) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `login_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `phoneno`, `gender`, `dob`, `password`, `login_by`) VALUES
(1, 'Vibinraj Rajesh Kumar', 'vibinrajesh2021@gmail.com', '9082635568', 'Male', '29/12/2001', '$2y$10$LztCJtr6CM/cTrFXoGFDA.eAISJ3oEHH9jfk5pOYrDYjkLQJthNtW', 'Entry Login');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1020;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
