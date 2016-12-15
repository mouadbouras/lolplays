-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2016 at 07:21 PM
-- Server version: 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lolplays`
--
CREATE DATABASE IF NOT EXISTS `lolplays` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lolplays`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL,
  `first_name` varchar(65) DEFAULT NULL,
  `last_name` varchar(65) DEFAULT NULL,
  `crsmgrid` int(11) UNSIGNED NOT NULL,
  `permission_level` int(2) UNSIGNED NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `crsmgrid`, `permission_level`) VALUES
(4, 'mouad@emmail.com', '$2y$10$/5Mofw/MtWIlqRVrSxW4ne2Wd1fw91O7oD/kHJpSo2dFEMcCScwWi', 'mouad', 'bour', 23, 2),
(5, 'test@email.com', '$2y$10$NX9NbuEjlYMu8ddMbgKZ9OS3CGiwggV/j0LQhcslogAnX.6Lu8qMG', 'test', 'test', 1, 1),
(6, 'ta@email.com', '$2y$10$591uPUjq8Kmccp6IF1CmNODV0KbCACiy/WdmsJ3feNDXnnSgkRD6e', 'ta', 'ta', 1, 3),
(7, 'jesse@email.com', '$2y$10$wg/NYXnniwwLwA2Nm3rYm.zzUmCkQ8XVIdyKZ8cV8/vl859zUk3pO', 'jesse', 'des', 1, 1),
(8, 'viv@email.com', '$2y$10$uCRcCayS4YadJ9lhUgTdP.zt3z4LkVoVyUChxCDJwehxqvGt5kPUy', 'viv', 'yao', 232, 1),
(9, 'stel@email.com', '$2y$10$9xQ.bNUPPc7v9J72dcDPEOJIHFvHgVCp.gaO0djez4B4BmCA2.UFy', 'stel', 'stel', 123123, 1),
(10, 'raz@email.com', '$2y$10$bP2g6SEp2EE.fgokBkrr8uKdyiXNxboTy4sTsYt1wlBYO3WLqVEme', 'raz', 'r', 342, 1),
(11, 'mindi@email.com', '$2y$10$uD/4HGI9qtxd4a1G8Po3Ju7T72Fcf/G5lidZxCVyoE4y.dFIl5.ze', 'mindi', 'mi', 2343, 1);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
