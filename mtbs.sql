-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2022 at 04:42 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `ticketID` bigint(20) NOT NULL,
  `userid` varchar(60) COLLATE utf16_unicode_ci NOT NULL,
  `movieName` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `hall` varchar(40) COLLATE utf16_unicode_ci NOT NULL,
  `showTime` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `numSeats` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `dob` date NOT NULL,
  `cancel_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`ticketID`, `userid`, `movieName`, `hall`, `showTime`, `numSeats`, `amount`, `dob`, `cancel_status`) VALUES
(1, 'poudelsantosh9866@gmail.com', 'AE mero hajur 4', 'Big Movies', '10:30 am', 1, 180, '2022-05-04', 0),
(2, 'poudelsantosh9866@gmail.com', 'AE mero hajur 4', 'Big Movies', '10:30 am', 1, 180, '2022-04-29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `name` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `mob` bigint(30) NOT NULL,
  `password` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `secques` varchar(80) COLLATE utf16_unicode_ci DEFAULT NULL,
  `answer` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`name`, `username`, `mob`, `password`, `secques`, `answer`) VALUES
('Diggaj kc', 'kcdiggaj35@gmail.com', 9809877457, '123456', 'What is your nick name?', 'diggaj');

-- --------------------------------------------------------

--
-- Table structure for table `moviedb`
--

CREATE TABLE `moviedb` (
  `title` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `director` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `trailer_link` varchar(80) COLLATE utf16_unicode_ci NOT NULL,
  `posterLoc` varchar(150) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `moviedb`
--

INSERT INTO `moviedb` (`title`, `year`, `director`, `trailer_link`, `posterLoc`) VALUES
('AE mero hajur 4', 2022, '', 'https://www.youtube.com/embed/C8JZRySDcZQ', 'movieIMG/aehajur.jpg'),
('Batman', 2022, '', 'https://www.youtube.com/embed/ mqqft2x_Aa4', 'movieIMG/batman.jpg'),
('Beast', 2022, '', 'https://www.youtube.com/embed/0q7bKjLa0Nc', 'movieIMG/beast.jpg'),
('Dasvi', 2022, '', 'https://www.youtube.com/embed/-FrqlHlUgz4', 'movieIMG/dashvi.jpg'),
('Jersy', 2022, '', 'https://www.youtube.com/embed/9hZ2UW6Jv-I', 'movieIMG/jersy.jpg'),
('KGF chapter 2', 2022, '', 'https://www.youtube.com/embed/Qah9sSIXJqk', 'movieIMG/kgf2.jpg'),
('Ma Yesto geet gaunxu 2', 2022, '', 'https://www.youtube.com/embed/XtZGZmtXsu0', 'movieIMG/geet.jpg'),
('RRR', 2022, '', 'https://www.youtube.com/embed/ GY4BgdUSpbE', 'movieIMG/rrr.jpg'),
('Spiderman', 2022, '', 'https://www.youtube.com/embed/ JfVOs4VSpmA', 'movieIMG/noway.jpg'),
('The lost city', 2022, '', 'https://www.youtube.com/embed/ xohAPIRNzuo', 'movieIMG/the-lost.jpg'),
('Uncharted', 2022, '', 'https://www.youtube.com/embed/4wCH1K-ckZw', 'movieIMG/uncharted.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`ticketID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `mob` (`mob`);

--
-- Indexes for table `moviedb`
--
ALTER TABLE `moviedb`
  ADD PRIMARY KEY (`title`),
  ADD UNIQUE KEY `trailer_link` (`trailer_link`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `ticketID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
