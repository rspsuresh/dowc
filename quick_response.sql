-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 04:24 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dowc`
--

-- --------------------------------------------------------

--
-- Table structure for table `quick_response`
--

CREATE TABLE `quick_response` (
  `id` int(11) NOT NULL,
  `year_c` varchar(100) NOT NULL,
  `make` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `mileage` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `state_c` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quick_response`
--

INSERT INTO `quick_response` (`id`, `year_c`, `make`, `model`, `mileage`, `fname`, `lname`, `email`, `phone`, `state_c`) VALUES
(6, '2019', 'BMW', '228XI SULEV', 35, 'Suresh', 'rampaul', 'rsprampaul14321@gmail.com', '8807642914', 2),
(7, '2020', 'DAEWOO', 'LANOS', 35, 'ewere', 'rewrwer', 'rsprampaul14321@gmail.com', '8807642914', 4),
(8, '2017', 'CHEVROLET', 'CAPRICE / IMPALA', 23, 'rrewrew', 'erwerew', 'rwerewr@gmail.com', '5345345435', 4),
(9, '2017', 'CHEVROLET', 'CAPRICE / IMPALA', 23, 'rrewrewewrrewr', 'erwerew', 'rwewrerewreerewr@gmail.com', '5345345435', 4),
(10, '2017', 'CHEVROLET', 'CAPRICE / IMPALA', 23, 'rrewrewewrrrererewr', 'erwerew', 'rwewrerewrrerereeerewr@gmail.com', '5345345435', 4),
(11, '2017', 'CHEVROLET', 'CAPRICE / IMPALA', 23, 'rrewrewewrrrererewr', 'erwerew', 'ereeerewr@gmail.com', '5345345435', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quick_response`
--
ALTER TABLE `quick_response`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quick_response`
--
ALTER TABLE `quick_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
