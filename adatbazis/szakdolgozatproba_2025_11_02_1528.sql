-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2025 at 03:27 PM
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
-- Table structure for table `fizeteseredmeny`
--

CREATE TABLE `fizeteseredmeny` (
  `id_fizetes` int(255) NOT NULL,
  `idf_rendeles` int(255) NOT NULL,
  `fizetesdatum` datetime NOT NULL,
  `osszeg` int(255) NOT NULL,
  `id_kulsofizetes` varchar(255) NOT NULL,
  `allapot` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `fizeteseredmeny`
--

INSERT INTO `fizeteseredmeny` (`id_fizetes`, `idf_rendeles`, `fizetesdatum`, `osszeg`, `id_kulsofizetes`, `allapot`) VALUES
(25, 55, '2025-11-01 14:10:57', 100, '9F928630E4439921B', 'COMPLETED'),
(26, 56, '2025-11-01 14:12:05', 3500, '073772299T8852119', 'COMPLETED');

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
(19, 'Apitermekek', 0, -1),
(20, 'Kosar', 1, 61),
(21, 'Fizetes', 1, -1);

-- --------------------------------------------------------

--
-- Table structure for table `rendeles`
--

CREATE TABLE `rendeles` (
  `id_rendeles` int(255) NOT NULL,
  `idf_szemely` int(255) NOT NULL,
  `datum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `rendeles`
--

INSERT INTO `rendeles` (`id_rendeles`, `idf_szemely`, `datum`) VALUES
(55, 18, '2025-11-01 15:10:57'),
(56, 18, '2025-11-01 15:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `rendelestartalma`
--

CREATE TABLE `rendelestartalma` (
  `id_rendelestartalma` int(255) NOT NULL,
  `idf_rendeles` int(255) NOT NULL,
  `idf_aru` int(255) NOT NULL,
  `me` int(255) NOT NULL,
  `egysegar` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `rendelestartalma`
--

INSERT INTO `rendelestartalma` (`id_rendelestartalma`, `idf_rendeles`, `idf_aru`, `me`, `egysegar`) VALUES
(56, 55, 14, 100, 1),
(57, 56, 14, 100, 5),
(58, 56, 18, 600, 5);

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
-- Indexes for table `fizeteseredmeny`
--
ALTER TABLE `fizeteseredmeny`
  ADD PRIMARY KEY (`id_fizetes`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `rendeles`
--
ALTER TABLE `rendeles`
  ADD PRIMARY KEY (`id_rendeles`);

--
-- Indexes for table `rendelestartalma`
--
ALTER TABLE `rendelestartalma`
  ADD PRIMARY KEY (`id_rendelestartalma`);

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
-- AUTO_INCREMENT for table `fizeteseredmeny`
--
ALTER TABLE `fizeteseredmeny`
  MODIFY `id_fizetes` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rendeles`
--
ALTER TABLE `rendeles`
  MODIFY `id_rendeles` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `rendelestartalma`
--
ALTER TABLE `rendelestartalma`
  MODIFY `id_rendelestartalma` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `szemely`
--
ALTER TABLE `szemely`
  MODIFY `id_szemely` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
