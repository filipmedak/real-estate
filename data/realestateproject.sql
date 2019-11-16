-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2019 at 06:25 PM
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
-- Database: `realestateproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `estates`
--

CREATE TABLE `estates` (
  `id` int(6) UNSIGNED NOT NULL,
  `type` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `location` varchar(20) COLLATE utf8_croatian_ci NOT NULL,
  `price` int(11) NOT NULL,
  `rooms` int(11) DEFAULT NULL,
  `size` int(11) NOT NULL,
  `description` mediumtext COLLATE utf8_croatian_ci,
  `imagepath` tinytext COLLATE utf8_croatian_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `estates`
--

INSERT INTO `estates` (`id`, `type`, `location`, `price`, `rooms`, `size`, `description`, `imagepath`) VALUES
(1, 'house', 'zagreb', 95000, 2, 45, 'Dost ok hiza', NULL),
(3, 'house', 'pula', 75000, 3, 60, 'Dost ok hiza u puli', NULL),
(4, 'flat', 'pula', 35000, 1, 30, 'Dost ok stan u puli', NULL),
(5, 'Cottage', 'varaždin', 20000, 2, 40, 'provjera slova z', NULL),
(6, 'apartment', 'rijeka', 58000, 3, 50, 'stan ovo ono', NULL),
(7, 'apartment', 'rijeka', 58000, 3, 50, 'stan ovo ono', NULL),
(8, 'apartment', 'rijeka', 58000, 3, 50, 'stan ovo ono', NULL),
(9, 'flat', 'pula', 35000, 1, 30, 'Dost ok stan u puli', NULL),
(10, 'house', 'zagreb', 95000, 2, 45, 'Dost ok hiza', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) COLLATE utf8_croatian_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_croatian_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_croatian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_croatian_ci NOT NULL,
  `isadmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estates`
--
ALTER TABLE `estates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estates`
--
ALTER TABLE `estates`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
