-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 04:42 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crudnative`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `birthdate` date NOT NULL,
  `number` varchar(20) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `cv` varchar(40) NOT NULL,
  `cin` varchar(16) NOT NULL,
  `diplomat` varchar(15) NOT NULL,
  `gender` varchar(18) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `lname`, `email`, `birthdate`, `number`, `image`, `cv`, `cin`, `diplomat`, `gender`, `password`) VALUES
(6, 'abdessalam', 'gherghouch', 'abde.gherofficiel@gmail.com', '2022-12-13', '0627611719', '../files/exam8.JPG', '../files/TP3.pdf', 'U206613', 'dut', 'male', '123456'),
(7, 'imade', 'gherghouch', 'imade.gherofficiel@gmail.com', '2022-11-28', '0627611719', '../files/GIT.png', '../files/high-performance-habits-.pdf', 'U206613', 'dts', 'male', ''),
(10, 'abdessalam', 'gherghouch', 'abde.gherofficiel@gmail.com', '2022-12-13', '0627611719', '../files/GIT.png', '../files/high-performance-habits-.pdf', 'U206613', 'dut', 'male', ''),
(12, 'rachide', 'aouni', 'admin@gmail.com', '2022-11-28', '0628737468', '../files/gallery.jpg', '../files/TP6-GHERGHOUCH-ABDESSALAM-1.pdf', 'U206613', 'dts', 'male', ''),
(14, 'rachide', 'aouni', 'admin@gmail.com', '2022-11-28', '0628737468', '../files/GIT.png', '../files/TP6-GHERGHOUCH-ABDESSALAM-1.pdf', 'U206613', 'dts', 'male', ''),
(15, 'rachide', 'aouni', 'admin@gmail.com', '2022-11-28', '0628737468', '../files/index.png', '../files/TP-4.pdf', 'U206613', 'dts', 'male', ''),
(16, 'rachide', 'aouni', 'admin@gmail.com', '2022-11-28', '0628737468', '../files/GIT.png', '../files/high-performance-habits-.pdf', 'U206613', 'dts', 'male', ''),
(26, 'rachide', 'aouni', 'admin@gmail.com', '2022-11-28', '0628737468', '../files/-.jpg', '../files/Questions.pdf', 'U206613', 'bts', 'male', ''),
(29, 'rachide', 'aouni', 'admin@gmail.com', '2022-11-28', '0628737468', '../files/photo.png', '../files/GMI-1.pdf', 'U206613', 'bts', 'male', ''),
(32, 'rachide', 'aouni', 'admin@gmail.com', '2022-11-28', '0628737468', '../files/photo.jpeg', '../files/recu_M137456807_3063.pdf', 'U206613', 'other', 'male', ''),
(35, 'hamide', 'aouni', 'hamid.gherofficiel@gmail.com', '2022-12-05', '0627611719', '../files/anne2.jpeg', '../files/document.pdf', 'U206613', 'dut', 'male', ''),
(36, 'hamide', 'aouni', 'hamid.gherofficiel@gmail.com', '2022-12-05', '0627611719', '../files/photo.jpeg', '../files/estmeknes.pdf', 'U206613', 'dut', 'male', ''),
(37, 'hamide', 'aouni', 'hamid.gherofficiel@gmail.com', '2022-12-05', '0627611719', '../files/photo.jpeg', '../files/estmeknes.pdf', 'U206613', 'dut', 'male', ''),
(38, 'imade', 'aouni', 'hamid.gherofficiel@gmail.com', '2022-12-05', '0627611719', '../files/photo.jpeg', '../files/ENSAM_ING-BAC2.pdf', 'U206613', 'dut', 'male', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
