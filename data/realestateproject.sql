-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2020 at 03:29 PM
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
-- Database: `realestateproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(85) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'pula'),
(2, 'zagreb'),
(3, 'rijeka'),
(4, 'split'),
(5, 'osijek'),
(6, 'varaždin');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(85) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'hrvatska'),
(2, 'njemačka');

-- --------------------------------------------------------

--
-- Table structure for table `energy_classes`
--

CREATE TABLE `energy_classes` (
  `id` int(11) NOT NULL,
  `class` varchar(5) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `energy_classes`
--

INSERT INTO `energy_classes` (`id`, `class`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F'),
(7, 'G');

-- --------------------------------------------------------

--
-- Table structure for table `estates`
--

CREATE TABLE `estates` (
  `id` int(6) UNSIGNED NOT NULL,
  `type` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `rooms` int(11) DEFAULT NULL,
  `floors` int(11) DEFAULT NULL,
  `property_size` int(11) DEFAULT NULL,
  `living_space` int(11) DEFAULT NULL,
  `balcony` tinyint(1) DEFAULT NULL,
  `terrace` tinyint(1) DEFAULT NULL,
  `construction_year` int(11) DEFAULT NULL,
  `last_renovation` int(11) DEFAULT NULL,
  `description` mediumtext COLLATE utf8_croatian_ci DEFAULT NULL,
  `energy_class` int(11) DEFAULT NULL,
  `heating_system` int(11) DEFAULT NULL,
  `parking` tinyint(1) DEFAULT NULL,
  `lift` tinyint(1) DEFAULT NULL,
  `barrier_free` tinyint(1) DEFAULT NULL,
  `internet` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `estates`
--

INSERT INTO `estates` (`id`, `type`, `city`, `price`, `rooms`, `floors`, `property_size`, `living_space`, `balcony`, `terrace`, `construction_year`, `last_renovation`, `description`, `energy_class`, `heating_system`, `parking`, `lift`, `barrier_free`, `internet`) VALUES
(1, 2, 1, 95000, 2, 1, 45, 34, 1, 0, 1990, 2000, 'Suspendisse sodales magna sed arcu vestibulum imperdiet. Nulla mollis id purus eget fermentum. Proin eu consequat neque. Nulla rutrum non lorem in sodales. Proin ipsum libero, ullamcorper eu mattis nec, viverra id nunc. Curabitur eu magna nunc. Vestibulum in augue tortor.', 1, 3, 1, 0, 0, 1),
(3, 1, 3, 75000, 3, 2, 56, 45, 1, 0, 2000, 2004, 'Suspendisse sodales magna sed arcu vestibulum imperdiet. Nulla mollis id purus eget fermentum. Proin eu consequat neque. Nulla rutrum non lorem in sodales. Proin ipsum libero, ullamcorper eu mattis nec, viverra id nunc. Curabitur eu magna nunc. Vestibulum in augue tortor.', 4, 2, 1, 1, 0, 0),
(4, 3, 6, 35000, 1, 2, 67, 45, 1, 1, 2009, 2019, 'Suspendisse sodales magna sed arcu vestibulum imperdiet. Nulla mollis id purus eget fermentum. Proin eu consequat neque. Nulla rutrum non lorem in sodales. Proin ipsum libero, ullamcorper eu mattis nec, viverra id nunc. Curabitur eu magna nunc. Vestibulum in augue tortor.', 1, 5, 1, 0, 0, 1),
(5, 1, 5, 20000, 2, 1, 45, 34, 0, 0, 1990, 2019, 'Suspendisse sodales magna sed arcu vestibulum imperdiet. Nulla mollis id purus eget fermentum. Proin eu consequat neque. Nulla rutrum non lorem in sodales. Proin ipsum libero, ullamcorper eu mattis nec, viverra id nunc. Curabitur eu magna nunc. Vestibulum in augue tortor.', 2, 6, 1, 1, 1, 1),
(6, 2, 2, 58000, 3, 1, 56, 45, 1, 1, 1999, 2004, 'Suspendisse sodales magna sed arcu vestibulum imperdiet. Nulla mollis id purus eget fermentum. Proin eu consequat neque. Nulla rutrum non lorem in sodales. Proin ipsum libero, ullamcorper eu mattis nec, viverra id nunc. Curabitur eu magna nunc. Vestibulum in augue tortor.', 3, 2, 1, 1, 1, 0),
(7, 4, 2, 58000, 3, 1, 67, 34, 0, 0, 2000, 2004, 'Suspendisse sodales magna sed arcu vestibulum imperdiet. Nulla mollis id purus eget fermentum. Proin eu consequat neque. Nulla rutrum non lorem in sodales. Proin ipsum libero, ullamcorper eu mattis nec, viverra id nunc. Curabitur eu magna nunc. Vestibulum in augue tortor.', 6, 1, 1, 0, 0, 0),
(8, 1, 5, 58000, 3, 1, 45, 45, 0, 0, 2009, 2019, 'Suspendisse sodales magna sed arcu vestibulum imperdiet. Nulla mollis id purus eget fermentum. Proin eu consequat neque. Nulla rutrum non lorem in sodales. Proin ipsum libero, ullamcorper eu mattis nec, viverra id nunc. Curabitur eu magna nunc. Vestibulum in augue tortor.', 1, 2, 1, 1, 0, 0),
(9, 2, 1, 35000, 1, 3, 67, 45, 1, 1, 2006, 2018, 'Suspendisse sodales magna sed arcu vestibulum imperdiet. Nulla mollis id purus eget fermentum. Proin eu consequat neque. Nulla rutrum non lorem in sodales. Proin ipsum libero, ullamcorper eu mattis nec, viverra id nunc. Curabitur eu magna nunc. Vestibulum in augue tortor.', 5, 4, 1, 0, 1, 1),
(10, 1, 6, 95000, 2, 2, 56, 42, 1, 1, 2009, 2019, 'Suspendisse sodales magna sed arcu vestibulum imperdiet. Nulla mollis id purus eget fermentum. Proin eu consequat neque. Nulla rutrum non lorem in sodales. Proin ipsum libero, ullamcorper eu mattis nec, viverra id nunc. Curabitur eu magna nunc. Vestibulum in augue tortor.', 6, 5, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `estatetypes`
--

CREATE TABLE `estatetypes` (
  `id` int(11) NOT NULL,
  `type` varchar(40) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `estatetypes`
--

INSERT INTO `estatetypes` (`id`, `type`) VALUES
(1, 'apartment'),
(2, 'house'),
(3, 'flat'),
(4, 'cottage');

-- --------------------------------------------------------

--
-- Table structure for table `heating`
--

CREATE TABLE `heating` (
  `id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `heating`
--

INSERT INTO `heating` (`id`, `type`) VALUES
(1, 'grijanje na drva'),
(2, 'grijanje na struju'),
(3, 'podno grijanje'),
(4, 'solarno grijanje'),
(5, 'centralno grijanje na plin'),
(6, 'lož ulje');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `isadmin`) VALUES
(1, 'Daniel', 'Lovrinov', 'Daniel123', 'daniel.lovrinov@gmail.com', 'daniel123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `energy_classes`
--
ALTER TABLE `energy_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estates`
--
ALTER TABLE `estates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `energy_class` (`energy_class`),
  ADD KEY `type` (`type`),
  ADD KEY `heating_system` (`heating_system`),
  ADD KEY `city` (`city`);

--
-- Indexes for table `estatetypes`
--
ALTER TABLE `estatetypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heating`
--
ALTER TABLE `heating`
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
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `energy_classes`
--
ALTER TABLE `energy_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `estates`
--
ALTER TABLE `estates`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `estatetypes`
--
ALTER TABLE `estatetypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `heating`
--
ALTER TABLE `heating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `estates`
--
ALTER TABLE `estates`
  ADD CONSTRAINT `estates_ibfk_1` FOREIGN KEY (`energy_class`) REFERENCES `energy_classes` (`id`),
  ADD CONSTRAINT `estates_ibfk_2` FOREIGN KEY (`type`) REFERENCES `estatetypes` (`id`),
  ADD CONSTRAINT `estates_ibfk_3` FOREIGN KEY (`heating_system`) REFERENCES `heating` (`id`),
  ADD CONSTRAINT `estates_ibfk_4` FOREIGN KEY (`city`) REFERENCES `city` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
