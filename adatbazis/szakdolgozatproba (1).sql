-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2025 at 10:59 PM
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
-- Database: `szakdolgozatproba`
--

-- --------------------------------------------------------

--
-- Table structure for table `aru`
--

CREATE TABLE `aru` (
  `id_aru` int(255) NOT NULL,
  `nev_aru` varchar(255) NOT NULL,
  `ar` int(255) NOT NULL,
  `leiras` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `aru`
--

INSERT INTO `aru` (`id_aru`, `nev_aru`, `ar`, `leiras`) VALUES
(14, 'alma', 100, 'Magyar szarmazas'),
(15, 'korte', 200, 'Spanyol szarmazas'),
(17, 'eper', 300, 'lengyelorszag'),
(18, 'banan', 600, 'nemetorszag');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(255) NOT NULL,
  `nev_menu` varchar(255) NOT NULL,
  `rang` int(255) NOT NULL,
  `sorrend` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nev_menu`, `rang`, `sorrend`) VALUES
(1, 'Fooldal', 0, 0),
(2, 'Rolunk', 0, 10),
(10, 'Termekek', 0, 20),
(11, 'Kapcsolat', 1, 30),
(12, 'Fiok', 1, 60),
(13, 'Bejelentkezes', -1, 50),
(14, 'Kijelentkezes', 1, 70),
(16, 'Regisztracio', -1, 40),
(17, 'Admin', 3, 80),
(18, 'Termek', 0, -1),
(19, 'apitermekek', 0, -1),
(20, 'Kosar', 1, 61),
(21, 'Fizetes', 1, -1);

-- --------------------------------------------------------

--
-- Table structure for table `szemely`
--

CREATE TABLE `szemely` (
  `id_szemely` int(255) NOT NULL,
  `nev_szemely` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jelszo` varchar(255) NOT NULL,
  `rang` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `szemely`
--

INSERT INTO `szemely` (`id_szemely`, `nev_szemely`, `email`, `jelszo`, `rang`) VALUES
(1, 'alma', 'alma@alma.hu', '$2y$10$X8RuWGSt7hIkFywkNVX2PeqZQSbqXO1kAO6/p1HpCU/sNCceQrgYi', '3'),
(2, 'korte', 'korte@korte.hu', '$2y$10$sHdEjP0BQ/Q/W7c/dKcMcOKyGjK8EkZxqDsk.TJe4ftkmVXIg30pu', '3'),
(3, 'szilva', 'szilva@szilva.hu', '$2y$10$MRn77WutuELBcRtxcsoeduPPVZIvxdAobjnMoPe01RaPKxe/jiqJi', '1'),
(18, 'e', 'e', '$2y$10$dDvg8mFQO9ZVwnfHVz0gJudqnoP.SECllh3Bm08zMRzNXpnFGeVkm', '1'),
(20, 'a', 'a', '$2y$10$7JTSzYdj1xfV9cwBiefLXO9/HKRBoTmC7LPSMpuYwokWOJsCznsAW', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aru`
--
ALTER TABLE `aru`
  ADD PRIMARY KEY (`id_aru`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `szemely`
--
ALTER TABLE `szemely`
  ADD PRIMARY KEY (`id_szemely`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aru`
--
ALTER TABLE `aru`
  MODIFY `id_aru` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `szemely`
--
ALTER TABLE `szemely`
  MODIFY `id_szemely` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
