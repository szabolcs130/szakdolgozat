-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2025 at 08:50 PM
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
  `leiras` varchar(255) NOT NULL,
  `mennyiseg` int(255) NOT NULL,
  `kep` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `aru`
--

INSERT INTO `aru` (`id_aru`, `nev_aru`, `ar`, `leiras`, `mennyiseg`, `kep`) VALUES
(14, 'alma', 100, 'Magyar szarmazas', 7, 'alma'),
(15, 'korte', 200, 'Spanyol szarmazas', 1, 'korte'),
(17, 'eper', 300, 'lengyelorszag', 0, 'eper'),
(18, 'banan', 600, 'nemetorszag', 15, 'banan'),
(109, 'kivi', 100, 'leiras', 19, 'kivi'),
(110, 'karfiol', 100, 'leiras', 21, 'karfiol'),
(111, 'karalábé', 100, 'leiras', 22, 'karalabe'),
(113, 'kukorica', 100, 'leiras', 10, 'kukorica'),
(114, 'krumpli', 100, 'leiras', 0, 'krumpli'),
(115, 'kelbimbó', 100, 'leiras', 0, 'kelbimbo'),
(116, 'kerti saláta', 100, 'leiras', 10, 'kertisalata'),
(118, 'zeller', 100, 'leiras', 10, 'zeller'),
(119, 'zöldbab', 100, 'leiras', 10, 'zoldbab'),
(120, 'zöldborsó', 100, 'leiras', 10, 'zoldborso'),
(121, 'zöldhagyma', 100, 'leiras', 10, 'zoldhagyma'),
(122, 'zsálya', 100, 'leiras', 10, 'zsalya'),
(123, 'zsázsa', 100, 'leiras', 10, 'zsazsa'),
(124, 'zucchini', 100, 'leiras', 10, 'zucchini'),
(125, 'zamatos szilva', 100, 'leiras', 10, 'zamatosszilva'),
(126, 'zöldalma', 100, 'leiras', 1, 'zoldalma'),
(128, 'zoldsegzoldje', 101, 'leiras', 3, 'zoldsegzoldje'),
(129, 'zoldborso uj', 101, 'leiras', 39, 'zoldborsouj'),
(131, 'kapor', 100, 'leiras', 10, 'kapor'),
(142, 'uj', 1, 'uj', 1, 'uj'),
(143, 'uj', 1, 'uj', 1, 'uj'),
(144, 'uj', 1, 'uj', 1, 'uj');

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
(26, 56, '2025-11-01 14:12:05', 3500, '073772299T8852119', 'COMPLETED'),
(27, 57, '2025-11-04 11:46:39', 800, '2S782758374720836', 'COMPLETED'),
(28, 59, '2025-11-04 12:54:53', 9000, '30X852622E501303J', 'COMPLETED'),
(29, 60, '2025-11-04 13:48:20', 3900, '8KY17346U8519433S', 'COMPLETED'),
(30, 61, '2025-11-04 14:27:35', 200, '6GP28405MS515331S', 'COMPLETED'),
(31, 62, '2025-11-04 16:11:00', 200, '05H46780E8045793L', 'COMPLETED'),
(32, 63, '2025-11-04 20:04:48', 200, '1PR60011LT2290430', 'COMPLETED'),
(33, 64, '2025-11-05 15:18:31', 100, '8NE06658NE7254024', 'COMPLETED'),
(34, 65, '2025-11-19 13:57:36', 200, '8DW20535AE081724P', 'COMPLETED'),
(35, 66, '2025-11-25 23:17:39', 4200, '9PR57245J80875604', 'COMPLETED'),
(36, 67, '2025-11-25 23:20:15', 4200, '4VM670114J579315T', 'COMPLETED'),
(37, 68, '2025-11-30 19:13:57', 1000, '1WE73695763643345', 'COMPLETED'),
(38, 69, '2025-11-30 19:50:59', 100, '1YG091264U871883H', 'COMPLETED');

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
(10, 'Termekek', 0, -1),
(11, 'Kapcsolat', 1, 30),
(12, 'Fiok', 1, 60),
(13, 'Bejelentkezes', -1, 50),
(14, 'Kijelentkezes', 1, 70),
(16, 'Regisztracio', -1, 40),
(17, 'Admin', 3, 80),
(18, 'Termek', 0, -1),
(19, 'Apitermekek', 0, -1),
(20, 'Kosar', 1, 61),
(21, 'Fizetes', 1, -1),
(22, 'Velemeny', 1, -1),
(23, 'Apivelemeny', 0, -1);

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
(56, 18, '2025-11-01 15:12:06'),
(57, 18, '2025-11-04 12:46:40'),
(59, 18, '2025-11-04 12:54:54'),
(60, 18, '2025-11-04 13:48:21'),
(61, 18, '2025-11-04 14:27:36'),
(62, 18, '2025-11-04 16:11:00'),
(63, 18, '2025-11-04 20:04:49'),
(64, 20, '2025-11-05 15:18:32'),
(65, 20, '2025-11-19 13:57:36'),
(66, 20, '2025-11-25 23:17:39'),
(67, 20, '2025-11-25 23:20:15'),
(68, 53, '2025-11-30 19:13:58'),
(69, 20, '2025-11-30 19:51:00');

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
(58, 56, 18, 600, 5),
(61, 59, 14, 100, 90),
(62, 60, 17, 300, 13),
(63, 61, 15, 200, 1),
(64, 62, 15, 200, 1),
(65, 63, 15, 200, 1),
(66, 64, 14, 100, 1),
(67, 65, 15, 200, 1),
(68, 66, 17, 300, 13),
(69, 66, 14, 100, 3),
(70, 67, 14, 100, 3),
(71, 67, 17, 300, 13),
(72, 68, 115, 100, 10),
(73, 69, 109, 100, 1);

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
(20, 'a', 'a', '$2y$10$7JTSzYdj1xfV9cwBiefLXO9/HKRBoTmC7LPSMpuYwokWOJsCznsAW', '3'),
(51, 'u', 'u', '$2y$10$yLcVPZoQREW3xZxOB6RF/edI5iOjZraZFEFVQgDWDCOnDWUR9ua2y', '1'),
(53, 'uj', 'uj@uj.com', '$2y$10$sIXDEj0EQIhx9mnT00Uq8OiP2k.1SUHpXcQj6EKDX/9fegeJppJc2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `velemenyek`
--

CREATE TABLE `velemenyek` (
  `id_velemeny` int(255) NOT NULL,
  `idf_szemely` int(255) NOT NULL,
  `idf_aru` int(255) NOT NULL,
  `velemenyszoveg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `velemenyek`
--

INSERT INTO `velemenyek` (`id_velemeny`, `idf_szemely`, `idf_aru`, `velemenyszoveg`) VALUES
(1, 18, 15, 'jo'),
(4, 18, 14, 'Szupi'),
(5, 18, 15, 'nagyon jo'),
(6, 18, 14, 'alma'),
(24, 18, 14, 'jo'),
(25, 18, 14, 'jo'),
(26, 18, 14, 'jo'),
(27, 18, 14, 'jo'),
(28, 18, 14, 'jo'),
(29, 18, 14, 'jo'),
(30, 18, 14, 'jo'),
(31, 18, 14, 'jo'),
(32, 18, 14, 'jo'),
(33, 18, 14, 'jo'),
(40, 20, 17, 'jhuh'),
(44, 20, 14, 'hgzg'),
(47, 53, 115, 'alma'),
(48, 20, 15, 'Nekem tetszik');

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
-- Indexes for table `velemenyek`
--
ALTER TABLE `velemenyek`
  ADD PRIMARY KEY (`id_velemeny`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aru`
--
ALTER TABLE `aru`
  MODIFY `id_aru` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `fizeteseredmeny`
--
ALTER TABLE `fizeteseredmeny`
  MODIFY `id_fizetes` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rendeles`
--
ALTER TABLE `rendeles`
  MODIFY `id_rendeles` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `rendelestartalma`
--
ALTER TABLE `rendelestartalma`
  MODIFY `id_rendelestartalma` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `szemely`
--
ALTER TABLE `szemely`
  MODIFY `id_szemely` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `velemenyek`
--
ALTER TABLE `velemenyek`
  MODIFY `id_velemeny` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
