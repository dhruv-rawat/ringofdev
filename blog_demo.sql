-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 16, 2016 at 08:44 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_content`
--

CREATE TABLE `users_content` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_content`
--

INSERT INTO `users_content` (`id`, `title`, `content`, `time`, `userid`) VALUES
(8, 'blog from web', 'BKUYKGBN', '2016-08-16 18:43:46', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users_list`
--

CREATE TABLE `users_list` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_list`
--

INSERT INTO `users_list` (`id`, `name`, `password`, `email`) VALUES
(9, 'Shashwat', 'csKtuqY2hCyJU', 'shashwat@gmail.com'),
(10, 'dhruv', 'csEGmVrt.QZ.E', 'dhruv@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_content`
--
ALTER TABLE `users_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users_list`
--
ALTER TABLE `users_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_content`
--
ALTER TABLE `users_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users_list`
--
ALTER TABLE `users_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_content`
--
ALTER TABLE `users_content`
  ADD CONSTRAINT `id-userid` FOREIGN KEY (`userid`) REFERENCES `users_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
