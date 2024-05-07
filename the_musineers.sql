-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2023 at 07:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the_musineers`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `album_id` int(11) NOT NULL,
  `album_title` varchar(100) NOT NULL,
  `release_date` date NOT NULL,
  `artist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`album_id`, `album_title`, `release_date`, `artist_id`) VALUES
(100001, 'Aashiqui 2', '2016-01-27', 101),
(100002, 'Love Aaj Kal', '2020-02-20', 101),
(100003, 'Clasically Mild', '2008-03-20', 102),
(100004, 'M.S.Dhoni', '2016-06-20', 103),
(100005, 'Lata Sings', '1966-06-13', 104),
(100006, 'Kishor Hits', '1950-05-06', 105);

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `artist_id` int(11) NOT NULL,
  `artist_name` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `ph_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`artist_id`, `artist_name`, `birthdate`, `ph_no`) VALUES
(101, 'Arijit Singh', '1987-04-25', 488465),
(102, 'Sonu Nigam', '1973-07-30', 453625),
(103, 'Armaan Malik', '1995-07-25', 152654),
(104, 'Lata Mangeshkar', '1929-09-28', 758621),
(105, 'Kishor Kumar', '1927-08-04', 214587);

-- --------------------------------------------------------

--
-- Table structure for table `platform`
--

CREATE TABLE `platform` (
  `platform_id` int(11) NOT NULL,
  `platform_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `platform`
--

INSERT INTO `platform` (`platform_id`, `platform_name`) VALUES
(1001, 'Spotify'),
(1002, 'Amazon Prime Music'),
(1003, 'Youtube Music'),
(1004, 'Apple Music'),
(1005, 'Gaana Music'),
(1006, 'Jio Saavan');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`fullname`, `email`, `password`) VALUES
('Aayush Ujjwal', 'aayush@gmail.com', 'aayush'),
('Ratikesh Kumar Singh', 'ratikeshsingh@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `release_group`
--

CREATE TABLE `release_group` (
  `release_id` int(11) NOT NULL,
  `re_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `release_group`
--

INSERT INTO `release_group` (`release_id`, `re_name`) VALUES
(11, 'T-Series'),
(12, 'Zee-Studios'),
(13, 'Sony'),
(14, 'Saregama'),
(15, 'UMG'),
(16, 'Zoho Label');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `song_id` int(11) NOT NULL,
  `song_title` varchar(100) NOT NULL,
  `duration` smallint(6) NOT NULL,
  `album_id` int(11) NOT NULL,
  `platform_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`song_id`, `song_title`, `duration`, `album_id`, `platform_id`) VALUES
(10001, 'Tum Hi Ho', 5, 100001, 1002),
(10002, 'Tum Hi Ho', 5, 100001, 1002),
(10003, 'Besabriyaan', 4, 100004, 1003),
(10004, 'Jab Tak', 6, 100004, 1003),
(10005, 'Lag Ja Gale', 5, 100005, 1004),
(10006, 'Aap Ki Nazron Ne', 5, 100005, 1002),
(10007, 'Soona Soona', 5, 100003, 1005),
(10008, 'Nahi Mangta', 5, 100003, 1003),
(10009, 'Ye Shaam Mastani', 5, 100006, 1001),
(100010, 'Neele Neele amber Pe', 5, 100006, 1002),
(100011, 'Shayad', 5, 100002, 1001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`album_id`),
  ADD KEY `fk1` (`artist_id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `platform`
--
ALTER TABLE `platform`
  ADD PRIMARY KEY (`platform_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `release_group`
--
ALTER TABLE `release_group`
  ADD PRIMARY KEY (`release_id`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`song_id`),
  ADD KEY `pi1` (`platform_id`),
  ADD KEY `ai1` (`album_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `ai1` FOREIGN KEY (`album_id`) REFERENCES `albums` (`album_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pi1` FOREIGN KEY (`platform_id`) REFERENCES `platform` (`platform_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
