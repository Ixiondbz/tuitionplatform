-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2023 at 08:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tuitionplatform`
--

-- --------------------------------------------------------

--
-- Table structure for table `tuition request`
--

CREATE TABLE `tuition request` (
  `id` int(11) NOT NULL,
  `parent name` varchar(747) NOT NULL,
  `student name` varchar(747) NOT NULL,
  `student class` varchar(50) NOT NULL,
  `student subjects` varchar(1000) NOT NULL,
  `teaching location` varchar(747) NOT NULL,
  `additional notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tuition request`
--

INSERT INTO `tuition request` (`id`, `parent name`, `student name`, `student class`, `student subjects`, `teaching location`, `additional notes`) VALUES
(56, 'Samiran C', 'Ikkhon', 'Class 11', 'Mathematics', 'Bashundhara RA', 'tutor must be from BUET'),
(66, 'Rokeya', 'Abrar', 'Class 5', 'History', 'Badda', 'tutor must be a graduate from any university'),
(68, 'Jan e alam', 'Ehsan', 'Class 12', 'Statistics 1,Statistics 2', 'Mirpur', 'Female tutor'),
(70, 'Farid', 'Fahim', 'A levels', 'Further maths', 'Gulshan 1', 'need a teacher from DU'),
(95, 'Ronobir', 'Turjo', 'Class 8', 'Mathematics,Physics,Chemistry,English,Bangla', 'Gulshan 2', 'the instructor must have straight A\'s in all of the subjects in his HSC');

-- --------------------------------------------------------

--
-- Table structure for table `tutor application`
--

CREATE TABLE `tutor application` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `tuition_request_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutor application`
--

INSERT INTO `tutor application` (`id`, `applicant_id`, `tuition_request_id`) VALUES
(4, 11, 56),
(5, 11, 66),
(6, 11, 68),
(7, 12, 56);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_full_name` varchar(747) NOT NULL,
  `user_email` varchar(320) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_type` varchar(100) NOT NULL DEFAULT 'tutor',
  `user_password` varchar(256) NOT NULL,
  `user_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_full_name`, `user_email`, `user_phone`, `user_type`, `user_password`, `user_image`) VALUES
(11, 'Ixion Chowdhury', 'ixion@gmail.com', '+8801771064027', 'tutor', '$2y$12$4ZnnGwxkVC4JtlvjJ6vBo./dWLei9Q2b4Kxf8g367hmBh2eMfbFNW', 'ProfilePic 382KB.jpg'),
(12, 'manager01', 'manager@gmail.com', '+8801771064028', 'manager', '$2y$12$9uqgP3IBhAqFTPEPoQYabuo72/33JiBRmXm5Fry5Z8TcE/f9L3QRS', 'manager logo.avif'),
(15, 'muaz', 'muaz@gmail.com', '+8801771064029', 'tutor', '$2y$12$/GqBs8fPPUM2gGVmk.VoUeibhyoIYMW5mD7p2FviJ0DpZpI12/qdS', 'muaz.jpg'),
(16, 'roy', 'roy@gmail.com', '+8801771064030', 'tutor', '$2y$12$sLw6VZgA9kyF70IrhittaOvZo7wc0U2hRNcizQ3P5yyW.TJj0usFK', 'roy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(70, '6u1gfu0l0tr72dtg843lbhukpn', 1681713046);

-- --------------------------------------------------------

--
-- Table structure for table `user type`
--

CREATE TABLE `user type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(320) NOT NULL DEFAULT 'tutor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user type`
--

INSERT INTO `user type` (`id`, `type_name`) VALUES
(2, 'parent'),
(1, 'tutor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tuition request`
--
ALTER TABLE `tuition request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutor application`
--
ALTER TABLE `tutor application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`user_email`),
  ADD UNIQUE KEY `phone` (`user_phone`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user type`
--
ALTER TABLE `user type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_name` (`type_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tuition request`
--
ALTER TABLE `tuition request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `tutor application`
--
ALTER TABLE `tutor application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user type`
--
ALTER TABLE `user type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
