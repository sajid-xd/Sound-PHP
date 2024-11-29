-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 08:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sound`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`) VALUES
(1, 'Pop'),
(2, 'Classic'),
(3, 'Unplugged');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `artist_img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `name`, `artist_img`) VALUES
(1, 'Atif Aslam', 'atif_aslam.jpg'),
(2, 'Asim Azhar', 'asim_azhar.jpg'),
(3, 'Talha Anjum', 'talha_anjum.jpg'),
(4, 'Kaifi Khalil', 'kaifi_khalil.jpg'),
(5, 'Talhah Yunus', 'talha_yunus.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `most_lis`
--

CREATE TABLE `most_lis` (
  `id` int(11) NOT NULL,
  `song_name` varchar(50) DEFAULT NULL,
  `song_img` text DEFAULT NULL,
  `song` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `most_lis`
--

INSERT INTO `most_lis` (`id`, `song_name`, `song_img`, `song`) VALUES
(1, 'Bematlab', '1.jpeg', 'bematlab.mp3'),
(2, 'Jurmana', '2.jpeg', 'jurmana.mp3'),
(3, 'Yaad', '3.jpeg', 'yaad.mp3'),
(4, 'Aadat', '4.jpeg', 'aadat.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `YEAR` int(11) NOT NULL,
  `ARTIST` int(11) NOT NULL,
  `ALBUM` int(11) NOT NULL,
  `isaudio` int(11) NOT NULL,
  `icon` text NOT NULL,
  `soucre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `name`, `YEAR`, `ARTIST`, `ALBUM`, `isaudio`, `icon`, `soucre`) VALUES
(1, 'talha1.mp3', 2022, 3, 2, 1, 'talha1.jpg', 'talha1.mp3'),
(2, 'talha2.mp3', 2023, 3, 1, 1, 'talha2.jpg', 'talha2.mp3'),
(3, 'talha3.mp3', 2024, 3, 3, 1, 'talha3.jpg', 'talha3.mp3'),
(4, 'yunas1.mp3', 2022, 5, 1, 1, 'yunas1.jpg', 'yunas1.mp3'),
(5, 'yunas2.mp3', 2023, 5, 2, 1, 'yunas2.jpg', 'yunas2.mp3'),
(6, 'yunas3.mp3', 2024, 5, 3, 1, 'yunas3.jpg', 'yunas3.mp3'),
(7, 'asim1.mp3', 2022, 2, 1, 1, 'asim.jpg', 'asim1.mp3'),
(8, 'asim2.mp3', 2023, 2, 2, 1, 'asim2.jpg', 'asim2.mp3'),
(9, 'asim3.mp3', 2024, 2, 3, 1, 'asim3.jpg', 'asim3.mp3'),
(10, 'kafi1.mp3', 2022, 4, 1, 1, 'kafi1.jpg', 'kafi1.mp3'),
(11, 'kafi2.mp3', 2023, 4, 2, 1, 'kafi2.jpg', 'kafi2.mp3'),
(13, 'atif1.mp3', 2022, 1, 1, 1, 'atif1.jpg', 'atif1.mp3'),
(14, 'atif2.mp3', 2023, 1, 2, 1, 'atif2.jpg', 'atif2.mp3'),
(15, 'atif3.mp3', 2024, 1, 3, 1, 'atif3.jpg', 'atif3.mp3'),
(16, 'kafi3.mp3', 2024, 4, 3, 1, 'kafi3.jpg', 'kafi3.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `trending_song`
--

CREATE TABLE `trending_song` (
  `id` int(11) NOT NULL,
  `song_name` varchar(50) DEFAULT NULL,
  `song_img` text DEFAULT NULL,
  `song` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trending_song`
--

INSERT INTO `trending_song` (`id`, `song_name`, `song_img`, `song`) VALUES
(1, 'Kahani Suno', '1.jpeg', 'Kahani Suno.mp3'),
(2, 'Pasoori', '2.jpeg', 'Pasoori.mp3'),
(3, 'Jhol', '3.jpeg', 'Jhol.mp3'),
(4, 'Therapy', '4.jpeg', 'Therapy.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `usertype` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `usertype`, `password`) VALUES
(1, 'Sajid', 'admin', 1, 'admin'),
(4, 'test', 'test', 2, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `name`) VALUES
(2022, '2022'),
(2023, '2023'),
(2024, '2024');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `most_lis`
--
ALTER TABLE `most_lis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trending_song`
--
ALTER TABLE `trending_song`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usertype` (`usertype`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `most_lis`
--
ALTER TABLE `most_lis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `trending_song`
--
ALTER TABLE `trending_song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2027;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`usertype`) REFERENCES `user_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
