-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2018 at 11:42 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmm`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) NOT NULL,
  `file` text NOT NULL,
  `author` text NOT NULL,
  `category` text NOT NULL,
  `caption` text NOT NULL,
  `lists` text NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file`, `author`, `category`, `caption`, `lists`, `description`, `date`) VALUES
(9, 'uploads/bmp3_2k22.png', 'Guineapony', 'Russia and Former USSR', 'BMP-3 and Tunguska', 'Historical_-_Modern', 'Remastered', '2018-02-13 06:44:25'),
(11, 'uploads/fv185.png', 'Blastwave', '1/72 Scale', 'FV-185 Centaur', 'Non-Historical_-_Science_Fiction', 'Paragania (NationStates)', '2018-02-13 07:02:29'),
(12, 'uploads/bears.png', 'Forrest Gump', 'Accessories', 'Bears', 'Masters', 'Black, Brown, Polar', '2018-07-04 05:48:00'),
(13, 'uploads/laclass.png', 'InsanityBunni', 'Micro Scale', 'Los Angeles Class Nuclear Fast Attack Submarine', 'Historical_-_Cold_War', 'Flight I, 1976', '2018-07-04 13:43:16'),
(14, 'uploads/e13a.png', 'Neko', 'Japan', 'Aichi E13A &quot;Jake&quot;', 'Historical_-_WWII', 'Flying, On Water, Technicians', '2018-07-04 13:50:45'),
(15, 'uploads/ALTPzKpfw_IV_mit_T-34-85_turm.png', 'TinkerTanker', '15mm Scale', 'PzKpfw IV mit T-34-85 turm', 'Non-Historical_-_Alternate_History_and_Universe', 'Panzer IV with T-34/85 turret', '2018-07-06 15:33:20'),
(16, 'uploads/MathiasComplete.png', 'Shermanus', '1/72 Scale', 'Mathias', 'Non-Historical_-_Fantasy', 'Tales of Redwall', '2018-07-06 15:47:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
