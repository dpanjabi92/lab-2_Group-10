-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2020 at 07:07 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab2group10`
--

-- --------------------------------------------------------

--
-- Table structure for table `fixture`
--

CREATE TABLE `fixture` (
  `ID` bigint(20) NOT NULL,
  `Date` datetime NOT NULL,
  `Team_id` int(11) NOT NULL,
  `Team_name` varchar(255) NOT NULL,
  `Result` varchar(20) NOT NULL,
  `Refree_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fixture`
--

INSERT INTO `fixture` (`ID`, `Date`, `Team_id`, `Team_name`, `Result`, `Refree_id`) VALUES
(1, '2020-09-05 20:00:00', 1, 'Kambay Riders', 'Won', 7),
(2, '2020-09-07 16:00:00', 2, 'Montreal Mighty', 'Won', 18),
(3, '2020-09-09 20:00:00', 3, 'Decan Chargers ', 'Lost', 11);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `ID` bigint(20) NOT NULL,
  `Team_id` int(11) NOT NULL,
  `Player_id` int(11) NOT NULL,
  `Player_img` blob NOT NULL,
  `Player_firstname` varchar(150) NOT NULL,
  `Player_lastname` varchar(150) NOT NULL,
  `Age` int(11) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `refree`
--

CREATE TABLE `refree` (
  `Refree_id` int(11) NOT NULL,
  `Ref_first_name` varchar(150) NOT NULL,
  `Ref_last_name` varchar(150) NOT NULL,
  `Description` text NOT NULL,
  `Team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refree`
--

INSERT INTO `refree` (`Refree_id`, `Ref_first_name`, `Ref_last_name`, `Description`, `Team_id`) VALUES
(1, 'Simon', 'Taufel', 'a former Australian cricket umpire who was earlier a member of the ICC Elite umpire panel. He won five consecutive ICC Umpire of the Year awards between 2004 and 2008, and was generally considered to have been the best umpire in the world during his time.', 1),
(2, 'Aleem', 'Daar', 'Aleem Dar is a Pakistani cricket umpire and former cricketer. He is a member of the Elite Panel of ICC Umpires. He won the David Shepherd Trophy three years in a row from 2009 to 2011, after being nominated twice in 2005 and 2006.', 2),
(3, 'Steve', 'Bucknor', 'Stephen Anthony \"Steve\" Bucknor, OJ is a former international cricket umpire and coach. Bucknor umpired in a record 128 Test matches between 1989 and 2009, and also umpired in 181 One Day Internationals during this period, including five consecutive Cricket World Cup finals from 1992 to 2007.', 3),
(4, 'Billy', 'Bowden', 'Brent Fraser \"Billy\" Bowden is a cricket umpire from New Zealand. He was a player until he began to suffer from rheumatoid arthritis. He is well known for his dramatic signalling style which includes the famous \"crooked finger of doom\" out signal.', 4),
(5, 'Richard ', 'Kettleborough', 'Richard Allan Kettleborough is an English international cricket umpire, and former first-class cricketer who appeared in 33 first-class matches for Yorkshire and Middlesex. He was a left-handed top order batsman and occasional right-arm medium pace bowler.', 5),
(6, 'Kumar ', 'Dharmasena', 'Handunnettige Deepthi Priyantha Kumar Dharmasena more commonly known as Kumar Dharmasena or by his nickname Unanduwa, is a Sri Lankan cricket umpire and former international cricketer, who played Tests and ODIs for Sri Lanka. He was a key member of the Sri Lanka team that won the 1996 Cricket World Cup. ', 6);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `ID` bigint(20) NOT NULL,
  `Team_id` int(11) NOT NULL,
  `Team_img` blob NOT NULL,
  `Image_path` varchar(255) NOT NULL,
  `Team_name` varchar(255) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fixture`
--
ALTER TABLE `fixture`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `refree`
--
ALTER TABLE `refree`
  ADD PRIMARY KEY (`Refree_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
