-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2025 at 07:43 PM
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
-- Database: `project_pwpb`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `created_at`) VALUES
(1, 'yazid@gmail.com', 'yzdx', '$2y$10$I5pX9H4xSQ8lHCeQvSoNdejvqKdRq75CR7zKtYvtsyGJElQScwfpy', '2025-08-29 02:31:48'),
(2, 'aufayazid@gmail.com', 'aufa', '$2y$10$DRGoUFMdPbckRdQEFCHnku8ksZKOk8YzmW36rQavM.02Hevj3yZSy', '2025-08-29 02:32:19'),
(3, 'vito@gmail.com', 'viriz', '$2y$10$5eeJmA7hz09LS2JjxLb1CexCOndkrgXFhGxY6m4jWuAlyGRnzfG3a', '2025-09-06 06:07:02'),
(4, 'rehan1@gmail.com', 'rehan', '$2y$10$qorBgGscLMNmjYPD4CBnNuPJJPX3L1/AQZ91K5kAt9nC1TAudfbdW', '2025-09-06 06:11:50'),
(7, 'ayam@gmail.com', 'ayamu', '$2y$10$4EB2TDOk3WOgMnbijGPjDuQmspCEkEjVV7fbupiu1MP5TtnplPjKC', '2025-09-06 06:13:28'),
(8, 'yazid1@gmail.com', 'yazid', '$2y$10$plAvFPog22zywD05Ck6m6.P3sGCMrhXDdfmV0quI7XcD1cVPNLjtW', '2025-09-06 06:14:08'),
(9, 'aufa123@gmail.com', 'zoe', '$2y$10$IDXg2E930jzKFdf/YzBYduNt2J32i//PIM6fV.HGDwJdcnEYHgIzy', '2025-09-06 06:25:05'),
(10, 'ayuma@gmail.com', 'ufa', '$2y$10$F4NwvnkFR/IksW64m8N6Su0y372FQ6Z0UsjHROxKBn.qCKhjfy14S', '2025-09-18 14:48:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
