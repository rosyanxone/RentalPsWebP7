-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 05:59 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalps-web`
--

-- --------------------------------------------------------

--
-- Table structure for table `consoles`
--

CREATE TABLE `consoles` (
  `console_id` int(8) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `perusahaan` varchar(30) NOT NULL,
  `produk` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consoles`
--

INSERT INTO `consoles` (`console_id`, `brand`, `perusahaan`, `produk`) VALUES
(1, 'Playstation', 'SONY', 'Ps 1, Ps 2, Ps 3, Ps 4, Ps 5'),
(2, 'Xbox', 'Microsoft', 'Xbox 360, Xbox One, Xbox One X');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tahun` int(11) NOT NULL,
  `platform` varchar(80) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `console_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `nama`, `tahun`, `platform`, `gambar`, `console_id`) VALUES
(1, 'Metal Gear Solid: The Legacy Collection', 2013, 'Ps 3 ', 'playstation-game_co45jf-207.png', 1),
(2, 'Grand Theft Auto V: Special Edition', 2013, 'Ps 3 Ps 4 Ps 5 Xbox One Xbox One X ', 'playstation-game_co2nbc-930.png', 1),
(3, 'Gwent: Iron Judgment', 2019, 'Xbox One Xbox One X ', 'xbox-game_co1r5n-310.png', 2),
(4, 'Darkest Dungeon: The Crimson Court', 2017, 'Ps 4 Xbox One ', 'playstation-game_co1h7f-598.png', 1),
(5, 'Hitman: Game of the Year Edition', 2017, 'Ps 4 Ps 5 Xbox One Xbox One X ', 'xbox-game_co24wx-680.png', 2),
(6, 'The Witcher 3: Wild Hunt - Game of the Year Edition', 2016, 'Ps 4 Xbox One ', 'xbox-game_co1wz4-522.png', 2),
(7, 'CrossCode', 2018, 'Ps 4 Ps 5 Xbox One Xbox One X ', 'xbox-game_co28wy-608.png', 2),
(8, 'The Last of Us', 2013, 'Ps 3 Ps 4 Ps 5 ', 'playstation-game_co1r7f-989.png', 1),
(9, 'The Last of Us Part II', 2020, 'Ps 4 Ps 5 ', 'playstation-game_co1r0o-348.png', 1),
(10, 'Cuphead: The Delicious Last Course', 2022, 'Ps 4 Ps 5 Xbox One Xbox One X ', 'xbox-game_co5bug-624.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Rausyan', 'rosyanxone', '$2y$10$98D.oPns2.EMsG13vfdEt.7kIVMONVnar8v2QmVn0onVOe1QvsUkC'),
(2, 'Asep', 'asep@gmail.com', '$2y$10$GF5nFrQ0ERvbuH9adD11belKDUVo4Vt7u3s8JDdIk958e4B2So0iG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consoles`
--
ALTER TABLE `consoles`
  ADD PRIMARY KEY (`console_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_console` (`console_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consoles`
--
ALTER TABLE `consoles`
  MODIFY `console_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`console_id`) REFERENCES `consoles` (`console_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
