-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 04:58 AM
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
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `section` varchar(100) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `time_in` datetime DEFAULT NULL,
  `time_out` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `full_name`, `section`, `id_number`, `time_in`, `time_out`, `user_id`) VALUES
(9, 'Rolan Manales', 'BSIT-2E', '2020307507', '2024-06-08 20:06:43', '2024-06-08 20:07:11', 2),
(10, 'Roman John Lester', 'BSIT-2A', '3333333333', '2024-06-09 16:03:40', '2024-06-09 16:04:05', 5),
(11, 'Roman John Lester', 'BSIT-2A', '3333333333', '2024-06-09 16:04:35', '2024-06-09 16:04:54', 5),
(12, 'Seth Ian D. Encarnada', 'BSIT 2E', '2022309102', '2024-06-09 19:57:22', '2024-06-09 19:58:25', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `id_number` varchar(10) NOT NULL,
  `section` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `id_number`, `section`, `email`, `password`, `date_registered`) VALUES
(2, 'Rolan Manales', '2020307507', 'BSIT-2E', 'sangewaze@gmail.com', 'manales', '2024-06-08 12:06:16'),
(3, 'Seth Ian Encarnada', '1111111111', 'BSIT-2E', 'dsadsa@gmail.com', '123', '2024-06-09 08:00:25'),
(4, 'Jeneva Digal', '2222222222', 'bsit-23', 'dasdas@gmail.com', '123', '2024-06-09 08:00:36'),
(5, 'Roman John Lester', '3333333333', 'BSIT-2A', 'Roman@gmail.com', '123', '2024-06-09 08:00:58'),
(6, 'Seth Ian D. Encarnada', '2022309102', 'BSIT 2E', 'xxxmamoy@gmail.com', 'blackberryz10', '2024-06-09 11:53:56'),
(7, 'Seth Ian Encarnada', '1234123111', 'sadasds', 'dsadsa@gmail.com', 'dsadasd', '2024-06-11 02:58:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
