-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2018 at 07:10 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wbtms`
--

-- --------------------------------------------------------

--
-- Table structure for table `parameters`
--

CREATE TABLE `parameters` (
  `parameter_id` int(11) NOT NULL,
  `temperature` int(11) NOT NULL,
  `liquid_level` int(11) NOT NULL,
  `voltage_input` int(11) NOT NULL,
  `voltage_output` int(11) NOT NULL,
  `inserted_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parameters`
--

INSERT INTO `parameters` (`parameter_id`, `temperature`, `liquid_level`, `voltage_input`, `voltage_output`, `inserted_time`) VALUES
(1, 32, 16, 12, 7, '2018-02-23 11:00:00'),
(2, 56, 28, 11, 6, '2018-02-23 11:05:00'),
(3, 15, 8, 15, 5, '2018-02-23 11:10:00'),
(4, 77, 33, 17, 7, '2018-02-23 11:15:00'),
(5, 42, 21, 22, 6, '2018-02-23 11:20:00'),
(6, 92, 46, 32, 9, '2018-02-23 11:25:00'),
(7, 85, 32, 43, 12, '2018-03-13 11:30:00'),
(8, 65, 54, 63, 25, '2018-03-13 11:35:00'),
(9, 76, 56, 34, 43, '2018-03-13 11:40:00'),
(10, 87, 69, 43, 21, '2018-03-13 11:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_firstname` varchar(11) NOT NULL,
  `user_lastname` varchar(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_password`) VALUES
(1, 'Fred', 'Oketa', 'oketafred@gmail.com', '123'),
(2, 'Edwin', 'Diaz', 'edwindiaz@gmail.com', '123'),
(3, 'Rob ', 'Percival', 'robpercival@gmail.com', '123'),
(4, 'Daniel', 'Wuu', 'danielwuu@gmail.com', '123'),
(5, 'Peters', 'Williams', 'peterswills@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parameters`
--
ALTER TABLE `parameters`
  ADD PRIMARY KEY (`parameter_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parameters`
--
ALTER TABLE `parameters`
  MODIFY `parameter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
