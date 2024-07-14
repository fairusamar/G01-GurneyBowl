-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 07:34 AM
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
-- Database: `accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(12) NOT NULL,
  `email` varchar(225) NOT NULL,
  `play_date` date NOT NULL,
  `Time` varchar(225) NOT NULL,
  `pax_player` varchar(225) NOT NULL,
  `bowl_shoes` varchar(225) NOT NULL,
  `num_lane` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `email`, `play_date`, `Time`, `pax_player`, `bowl_shoes`, `num_lane`) VALUES
(1, 'darwish123@gmail.com', '2024-07-11', '12:00 PM', '2', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL DEFAULT 'N/A',
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(191) DEFAULT NULL,
  `pp` varchar(255) NOT NULL DEFAULT 'default-pp.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `Username`, `Email`, `Password`, `phone_number`, `date_of_birth`, `gender`, `pp`) VALUES
(1, 'aqylah2004', 'nuraqylah123@gmail.com', '10pinwithmybestfriends', 'N/A', NULL, NULL, 'default-pp.png'),
(2, 'wishywashy', 'wishing12@gmail.com', 'wishingwell', 'N/A', NULL, NULL, 'default-pp.png'),
(3, 'syedhusain', 'husainalaydrus@gmail.com', 'password123', 'N/A', NULL, NULL, 'default-pp.png'),
(9, 'qayy', 'tololbolol23@gmail.com', '$2y$10$zdjSibDUf8KF9uM5IlrKsuATHcf/fkaBXsOfVWsuUdFwJEWO6jfhu', 'N/A', NULL, NULL, 'default-pp.png'),
(32, 'Howl', 'fai123@gmail.com', '$2y$10$h6O/W3Ct9vNPge.ZHajoIODvw3J7E/ArkKfZv0QTvMCht80IoLEMK', 'N/A', NULL, NULL, 'default-pp.png'),
(34, 'Holol123', 'howl123@gmail.com', '$2y$10$OgVt/pEls/UnbMM3gW6PpuH7vuY0xOLatVm5PZ8SVembYw4LwXCW6', 'N/A', NULL, NULL, 'default-pp.png'),
(35, 'Darwish Naufal', 'darwish123@gmail.com', '$2y$10$9SrXqNC7QLA8JQQ9qbReSuU.K.F86IAR5XDi2kKRootgNswdyznhq', '01164003924', '2004-12-30', 'Prefer not to say', 'darwish123@gmail.com668eb546513904.99173777.png'),
(36, 'qaygay123', 'qayqay123@gmail.com', '$2y$10$g.RCiQ/3Cpkqamm/gCFUO.hCROgu44KxgkkCinV3RaCvP68.Pl.5a', 'N/A', NULL, NULL, 'default-pp.png');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Suggestion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackID`, `Email`, `Suggestion`) VALUES
(1, 'fairus@gmail.com', 'its aight'),
(2, 'hololbolol@gmail.com', 'its alright i think?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
