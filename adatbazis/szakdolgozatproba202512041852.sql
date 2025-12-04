-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2025 at 06:52 PM
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
(14, 'alma', 100, 'Magyarországi termék, friss zamatos. Magyarországi termék, friss zamatos.Magyarországi termék, friss zamatos.Magyarországi termék, friss zamatos.Magyarországi termék, friss zamatos. Magyarországi termék, friss zamatos.Magyarországi termék, friss zamatos.', 6, 'alma'),
(15, 'korte', 200, 'leiras', 1, 'korte'),
(17, 'eper', 300, 'leiras', 0, 'eper'),
(18, 'banan', 600, 'leiras', 15, 'banan'),
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
(159, 'ujujuj', 1, 'ujujuj????', 1, 'ujujuj'),
(165, 'alma1', 11, 'adwdawdawodpaw?::12', 11, 'asfas1'),
(166, 'eperkeuj', 11, 'khbhkb', 9, 'eper');

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
(37, 55, '2025-11-30 19:13:57', 1000, '1WE73695763643345', 'COMPLETED'),
(39, 70, '2025-12-03 20:29:24', 100, '8912401458490205X', 'COMPLETED');

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
(23, 'Apivelemeny', 0, -1),
(24, 'Apiadmin', 3, -1);

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
(55, 55, '2025-11-01 15:10:57'),
(70, 59, '2025-12-03 20:29:25');

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
(57, 55, 14, 100, 5),
(58, 55, 18, 600, 5),
(61, 55, 14, 100, 90),
(62, 55, 17, 300, 13),
(63, 55, 15, 200, 1),
(64, 55, 15, 200, 1),
(65, 55, 15, 200, 1),
(66, 55, 14, 100, 1),
(67, 55, 15, 200, 1),
(68, 55, 17, 300, 13),
(69, 55, 14, 100, 3),
(70, 55, 14, 100, 3),
(71, 55, 17, 300, 13),
(72, 55, 115, 100, 10),
(73, 55, 109, 100, 1),
(74, 70, 14, 100, 1);

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
(55, 'admin1', 'admin@admin.com', '$2y$10$MKJo0J8PyGSCm5R3vFR1g.VPIREDeqKOonBdbuRcCGRjbaprn0V/q', '3'),
(59, 'admin2', 'admin1@admin.com', '$2y$10$7th7FGI9NRverdVRv31zKuvS4o0T5aXhUw3j96.0LAU.Z6/0v8KuC', '3'),
(60, 'admin2', 'admin2@admin.com', '$2y$10$WyMlTQb3dDCUre35m7dNk.z3Nxa1QLFwtLZzfJ8Zh/eUX6QifZFg.', '1'),
(61, 'admin1', 'admin3@admin.com', '$2y$10$QSV.OW3/7cdh8IGSZo/qHuDpimaL0l1jWVldzLu7YoAjYcsrS9dca', '1'),
(62, 'khjbhjkv', 'admin4@admin.com', '$2y$10$jWZL3V5SIn3GE3Rk0BCdZun1mkEZatsI/jeqOkFUGYPIKWiWYSiTq', '1');

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
(49, 55, 14, 'Szuper'),
(50, 55, 14, 'Szuper'),
(51, 55, 14, 'Elmeny volt'),
(52, 55, 14, 'Szenzacio'),
(53, 55, 14, 'Tetszik'),
(54, 55, 14, 'Jo'),
(55, 55, 14, 'Elmegy'),
(56, 55, 14, 'Nem jo'),
(57, 55, 14, 'Szuper'),
(58, 55, 14, 'Szuper'),
(59, 55, 14, 'Szuper'),
(60, 55, 14, 'Szuper'),
(61, 55, 14, 'Szuper'),
(62, 55, 14, 'Szuper'),
(63, 55, 14, 'Szuper'),
(64, 55, 14, 'Szuper'),
(65, 55, 14, 'Szuper'),
(66, 55, 14, 'Szuper'),
(67, 55, 14, 'Szuper'),
(68, 55, 14, 'Szuper'),
(69, 55, 14, 'Szuper'),
(70, 55, 14, 'Szuper'),
(71, 55, 14, 'Szuper'),
(72, 55, 14, 'Szuper'),
(73, 55, 14, 'Szuper'),
(74, 55, 14, 'Szuper'),
(75, 59, 14, 'Megfelel');

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
  MODIFY `id_aru` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `fizeteseredmeny`
--
ALTER TABLE `fizeteseredmeny`
  MODIFY `id_fizetes` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `rendeles`
--
ALTER TABLE `rendeles`
  MODIFY `id_rendeles` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `rendelestartalma`
--
ALTER TABLE `rendelestartalma`
  MODIFY `id_rendelestartalma` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `szemely`
--
ALTER TABLE `szemely`
  MODIFY `id_szemely` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `velemenyek`
--
ALTER TABLE `velemenyek`
  MODIFY `id_velemeny` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
