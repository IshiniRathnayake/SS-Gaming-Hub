-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 03:36 PM
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
-- Database: `e_game_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` int(11) NOT NULL,
  `account_number` varchar(16) NOT NULL,
  `cvv` char(3) NOT NULL,
  `expiry_date` date NOT NULL,
  `holder_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `failed_attempts` int(11) DEFAULT 0,
  `last_failed_attempt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `userEmail`, `userPass`, `failed_attempts`, `last_failed_attempt`) VALUES
(1, 'John Doe', 'johndoe@example.com', '$2y$10$WjwG..EwZbYJPsFYGH/L8vV2l.k9m1jX6qgUtLrTz9oz.q.lJ6E7u', 0, NULL),
(4, 'ima', 'ima@gmail.com', '$2y$10$uLe/ESQfZz/Mp/r70FyV/uu9HGj6xjy/IhpB2cseqMcqvqp.1Di8S', 0, NULL),
(5, 'John Doe', 'john.doe@gmail.com', '$2y$10$E1R9uJLm1y3P7IWh10lM0ehLX/jPsHODcmZPl61s.bqBReEnrCQJW', 0, NULL),
(6, 'Jane Smith', 'jane.smith@gmail.com', '$2y$10$U.e1R9uJLm1y3P7IWh10lM0ejPsHODcmZPl61s.bqBReEnrCQJW3R', 1, '2024-11-30 04:30:00'),
(7, 'Alice Johnson', 'alice.j@gmail.com', '$2y$10$wBqE1R9uJLm1y3P7IWh10lM0ejPsHODcmZPl61s.bqBReEnrCQJW', 3, '2024-11-29 10:30:00'),
(8, 'Bob Brown', 'bob.brown@gmail.com', '$2y$10$PLm1y3P7IWh10lM0ehLX/jPsHODcmZPl61s.bqBReEnrCQJWBqRe', 0, NULL),
(9, 'Charlie Green', 'charlie.g@gmail.com', '$2y$10$ZpYx1E1R9uJLm1y3P7IWh10lM0ejPsHODcmZPl61s.bqBReEnrJW', 5, '2024-11-30 04:00:00'),
(10, 'Diana Miller', 'diana.m@gmail.com', '$2y$10$.bqReEnrCQJW3R9uJLm1y3P7IWh10lM0ehLX/jPsHODcmZPl61s', 0, NULL),
(11, 'Ethan Clark', 'ethan.c@gmail.com', '$2y$10$10lM0ehLX/jPsHODcmZPl61s.bqBReEnrCQJW3R9uJLm1y3P7IW', 2, '2024-11-29 03:15:00'),
(12, 'Fiona White', 'fiona.w@gmail.com', '$2y$10$HODcmZPl61s.bqBReEnrCQJW3R9uJLm1y3P7IWh10lM0ehLX/jP', 4, '2024-11-30 05:45:00'),
(13, 'George Black', 'george.b@gmail.com', '$2y$10$l61s.bqBReEnrCQJW3R9uJLm1y3P7IWh10lM0ehLX/jPsHODcmZP', 0, NULL),
(14, 'Hannah Gray', 'hannah.g@gmail.com', '$2y$10$3R9uJLm1y3P7IWh10lM0ehLX/jPsHODcmZPl61s.bqBReEnrCQ', 1, '2024-11-30 03:30:00'),
(15, 'Ishini', 'ishu@gmail.com', '$2y$10$gZLKsW1xKyP9HI0QcA9ov.WhArnHbS2SSWOgaarmZCH.daAQUL7ha', 0, NULL),
(17, 'Dilnuka', 'dil@gmail.com', 'dil', 0, NULL),
(18, 'Anne', 'anne@gmail.com', '$2y$10$FiSIquecrEbPGK1NRS1U8OzKO.Swzni/NnjUVx4VtUIq91C31CjdW', 0, NULL),
(19, 'Hemamali', 'mali@gmail.com', '$2y$10$pYjZyxRyzqCgQr41Np.2OurCLyDDjCSsQKryj.II1DkVF5FAiguIa', 0, NULL),
(20, 'Rama', 'rama@gmail.com', '123', 3, '2024-12-01 05:12:16'),
(22, 'Gama', 'gama@gmail.com', '$2y$10$cFU4xtEvF/ytZOXpMFrxRemY7J0WfuxNt.XwOGXLPDuSmC/wGaU6q', 0, NULL),
(24, 'JJJ', 'jas@gmail.com', '$2y$10$OrH6sdXZJOu2oopBnqoMCO.SmsZFFred3Fx100DumkvM/ezmKY3/m', 0, NULL),
(25, 'dilnukas', 'ds@gmail.com', '$2y$10$Hb4Ciy7AGx8Dr63le5FtA.RabJOpHXEFsdZTXEZKMbJGOGVp/l9q2', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
