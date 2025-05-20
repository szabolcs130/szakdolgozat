-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2025 at 02:33 PM
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
(15, 'korte', 200, 'Spanyol szarmazas');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(255) NOT NULL,
  `nev_menu` varchar(255) NOT NULL,
  `rang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nev_menu`, `rang`) VALUES
(1, 'Fooldal', '__1'),
(2, 'Rolunk', '1__'),
(8, 'menuBeszur', 'valami rang');

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
(1, 'alma', 'alma@alma.hu', '$2y$10$X8RuWGSt7hIkFywkNVX2PeqZQSbqXO1kAO6/p1HpCU/sNCceQrgYi', '__1'),
(2, 'korte', 'korte@korte.hu', '$2y$10$sHdEjP0BQ/Q/W7c/dKcMcOKyGjK8EkZxqDsk.TJe4ftkmVXIg30pu', '_1_'),
(3, 'szilva', 'szilva@szilva.hu', '$2y$10$MRn77WutuELBcRtxcsoeduPPVZIvxdAobjnMoPe01RaPKxe/jiqJi', '1__'),
(9, 'valakiiiööö', 'valakii@valaki.com', '$2y$10$oSuwb3NZPqEwrKPKR/nLCexUWy95msXpN4wNirlkl.TF07q1GHDsi', 'ran');

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
  MODIFY `id_aru` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `szemely`
--
ALTER TABLE `szemely`
  MODIFY `id_szemely` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
