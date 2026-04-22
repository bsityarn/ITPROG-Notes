-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2026 at 04:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vicegandeDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movieID` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `releaseYear` year(4) NOT NULL,
  `director` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movieID`, `title`, `releaseYear`, `director`, `date_added`) VALUES
(1, 'The Unkabogable Praybeyt Benjamin', '2011', 'Wenn V. Deramas', '2026-02-26 16:00:00'),
(2, 'Sisterakas', '2012', 'Wenn V. Deramas', '2026-02-26 16:00:00'),
(3, 'Girl, Boy, Bakla, Tomboy', '2013', 'Wenn V. Deramas', '2026-02-26 16:00:00'),
(4, 'The Amazing Praybeyt Benjamin', '2014', 'Wenn V. Deramas', '2026-02-26 16:00:00'),
(5, 'Beauty and the Bestie', '2015', 'Wenn V. Deramas', '2026-02-26 16:00:00'),
(6, 'The Super Parental Guardians', '2016', 'Joyce Bernal', '2026-02-26 16:00:00'),
(7, 'Gandarrapiddo: The Revenger Squad', '2017', 'Joyce Bernal', '2026-02-26 16:00:00'),
(8, 'Fantastica', '2018', 'Barry Gonzalez', '2026-02-26 16:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movieID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
