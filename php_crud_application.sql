-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2024 at 10:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_crud_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `email`, `phone`, `age`) VALUES
(5, 'Bristy', 'Sarkar', 'bristyhis2215.grc@gmail.com', '01788655640', 24),
(7, 'Papon', 'Sarkar', 'papon23@gmail.com', '01898765645', 16),
(10, 'Sarkar', 'Pranta', 'parnatosgps@gmail.com', '01536634871', 11),
(15, 'Athoi', 'Sarkar', 'athoi@gmail.com', '01521234872', 11),
(16, 'Rup', 'Kumar', 'rupguho@gmail.com', '01675453432', 22),
(18, 'Diganta', 'Sarkar', 'diganta@gmail.com', '01687435634', 10),
(19, 'Tapash', 'Sarkar', 'tapash@gmail.com', '01987567891', 32),
(21, 'Pronab', 'Sarkar', 'pronab@gmail.com', '01934231234', 19),
(22, 'Mintu', 'Sarkar', 'mintu@gmail.com', '01745698123', 40),
(28, 'Ratna', 'Bairagi', 'ratna@gmail.com', '01698457648', 22),
(31, 'Samrat', 'Biswas', 'samrat@gmail.com', '01679543231', 24),
(35, 'Masud', 'Ali', 'masud@gmail.com', '01598773454', 26),
(36, 'Tushar', 'Sarkar', 'tusharcse35.bsmrstu@gmail.com', '01521234871', 25),
(37, 'Imran', 'Hossain', 'imran@gmail.com', '01934212871', 24),
(38, 'Rony', 'Hossain', 'roni24@gmail.com', '01598765678', 25),
(39, 'Tushar', 'Sarkar', 'tusharcse35.bsmrstu@gmail.com', '01521234871', 24);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`) VALUES
(5, 'Tushar Sarkar', 'Tushar35', '$2y$10$dL4qWmdviBaue70k5gZwoucMgZgX0EpTXUuAgtcoL/Rvo1JyjKgbq'),
(6, 'Ratna Bairagi', 'Nandita34', '$2y$10$L7GG.SVvUDUCNRZ2R4Qw8OAkYS9L/guECDTEwcf6uSEu3r9Uo1IDi'),
(7, 'Bristy Sarkar', 'Bristy15', '$2y$10$DYjzj88Wh.tjGGx/TIHtIOupJ9I6c53k8inkt5KKNtJkBblWMBYOS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
