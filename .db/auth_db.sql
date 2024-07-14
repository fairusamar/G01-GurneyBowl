-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 06:56 AM
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
-- Database: `auth_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pp` varchar(255) NOT NULL DEFAULT 'default-pp.png',
  `plain_password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `username`, `password`, `pp`, `plain_password`) VALUES
(1, 'gay', 'you', '$2y$10$fPb.xkUYRX/TiZ.0/UC8COHGFE7k9aAl6JnzKX0hxSfmZDjB18x8q', 'you6683f396bfc8c1.34916101.png', NULL),
(2, 'new test', 'new', '$2y$10$mBJ.RQcEcN7OvYMSLupunOdD/8tLbof9jo7WosUq9VfwpKJF2y2hK', 'new6683f658f053e4.80316773.jpg', NULL),
(3, 'woiwoi', '12345', '$2y$10$rGnTqb/jBUHUH29rCIBJJOs1djnkeVY9pezEO46FVGi1rRZNh.r1u', '123456684008c246ed0.18205873.jpg', NULL),
(4, 'Mohamad Darwish Naufal Bin Khairudin', 'testing', '$2y$10$1ml3csrd.FgOklToMlWSg.aKb9DcXfYr/pqkb9O2DvY1Gszk2ESku', 'testing66840119189020.44940461.jpg', NULL),
(5, 'Mohamad', 'testisssinggn', '$2y$10$TXB8Npb1XnqokbZm5QqHTuGTS95cigS54TC0vnkxqwBYJNN01Qpk.', 'Darwish668a76db63e662.68656467.jpg', NULL),
(6, 'Amoi Gyatt', 'Amoigy@gmail.com', '1234', '[value-5]', NULL),
(7, 'Husain', 'husain123@gmail.com', '$2y$10$wv2xcGeQRqn8uE5UtmLg3ec1h2ruqjTM2K4xQSbfHJs7BqBESFZKy', 'husain123@gmail.com668cd46ddd3675.63758676.jpg', '0553'),
(8, 'fairsus', 'fairus@gmail.com', '$2y$10$Uf13P8TJzsRUOJ3HWkMWHuRNiLYQ.GEZyxyHv6rGTBhmC.NQcBasW', 'default-pp.png', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
