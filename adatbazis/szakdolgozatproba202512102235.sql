-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2025 at 10:34 PM
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
(14, 'alma', 100, 'Magyar termek.Magyar termek.Magyar termek.Magyar termek.Magyar termek.Magyar termek.Magyar termek.Magyar termek.Magyar termek.Magyar termek.Magyar termek.Magyar termek.Magyar termek.Magyar termek.Magyar termek.Magyar termek.Magyar termek.Magyar termek.Mag', 86, 'alma'),
(15, 'korte', 200, 'leiras', 187, 'korte'),
(17, 'eper', 300, 'leiras', 298, 'eper'),
(18, 'banan', 600, 'leiras', 200, 'banan'),
(109, 'kivi', 100, 'leiras', 8, 'kivi'),
(110, 'karfiol', 100, 'leiras', 20, 'karfiol'),
(111, 'karalábé', 100, 'leiras', 16, 'karalabe'),
(113, 'kukorica', 100, 'leiras', 5, 'kukorica'),
(114, 'krumpli', 100, 'leiras', 100, 'krumpli'),
(115, 'kelbimbó', 100, 'leiras', 200, 'kelbimbo'),
(116, 'kerti saláta', 100, 'leiras', 30, 'kertisalata'),
(118, 'zeller', 100, 'leiras', 10, 'zeller'),
(119, 'zöldbab', 100, 'leiras', 10, 'zoldbab'),
(120, 'zöldborsó', 100, 'leiras', 10, 'zoldborso'),
(121, 'zöldhagyma', 100, 'leiras', 10, 'zoldhagyma'),
(122, 'zsálya', 100, 'leiras', 10, 'zsalya'),
(123, 'zsázsa', 100, 'leiras', 10, 'zsazsa'),
(124, 'zucchini', 100, 'leiras', 10, 'zucchini'),
(125, 'zamatos szilva', 100, 'leiras', 10, 'zamatosszilva'),
(126, 'zöldalma', 100, 'leiras', 1, 'zoldalma'),
(128, 'zoldsegzoldje', 101, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a ', 3, 'zoldsegzoldje'),
(129, 'zoldborso uj', 101, 'leiras', 39, 'zoldborsouj'),
(131, 'kapor', 100, 'leiras', 10, 'kapor');

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
(53, 86, '2025-11-05 15:23:36', 1700, '3CK30604C96274638', 'COMPLETED'),
(54, 87, '2025-11-06 16:25:04', 2200, '6KK61666F3544135S', 'COMPLETED'),
(55, 88, '2025-11-07 19:24:14', 100, '6KK61666F3544136S', 'COMPLETED'),
(56, 89, '2025-11-08 19:24:14', 100, '6KK61666F3544137S', 'COMPLETED'),
(57, 90, '2025-12-01 19:24:14', 100, '6KK61666F3544138S', 'COMPLETED'),
(58, 91, '2025-12-02 19:24:14', 100, '6KK61666F3544139S', 'COMPLETED'),
(59, 92, '2025-12-03 19:24:14', 100, '6KK61666F3544140S', 'COMPLETED'),
(60, 93, '2025-12-04 19:24:14', 100, '6KK61666F3544141S', 'COMPLETED'),
(61, 94, '2025-12-05 19:24:14', 100, '6KK61666F3544142S', 'COMPLETED'),
(62, 95, '2025-12-08 19:26:58', 100, '6KK61666F3544142S', 'COMPLETED'),
(63, 96, '2025-12-08 19:26:59', 100, '6KK61666F3544144S', 'COMPLETED'),
(64, 98, '2025-12-10 10:39:48', 100, '59C09846BS211153R', 'COMPLETED'),
(65, 99, '2025-12-10 19:43:23', 600, '6UU60553R20960028', 'COMPLETED'),
(66, 100, '2025-12-10 19:46:51', 600, '3LP088605W363264W', 'COMPLETED');

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
(11, 'Kapcsolat', 10, 30),
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
(24, 'Apiadmin', 3, -1),
(25, 'Apifiok', 1, -1);

-- --------------------------------------------------------

--
-- Table structure for table `rendeles`
--

CREATE TABLE `rendeles` (
  `id_rendeles` int(255) NOT NULL,
  `idf_szemely` int(255) NOT NULL,
  `datum` datetime NOT NULL,
  `rendelesallapot` enum('Feldolgozás','Összekészítve','Futárszolgálat átvette','Teljesítve','Lemondva') NOT NULL DEFAULT 'Feldolgozás',
  `teljesitesdatuma` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `rendeles`
--

INSERT INTO `rendeles` (`id_rendeles`, `idf_szemely`, `datum`, `rendelesallapot`, `teljesitesdatuma`) VALUES
(86, 55, '2025-11-05 15:23:37', 'Feldolgozás', '2025-12-02 16:07:24'),
(87, 55, '2025-11-06 16:25:04', 'Feldolgozás', NULL),
(88, 55, '2025-11-07 19:24:14', 'Feldolgozás', NULL),
(89, 55, '2025-11-08 19:24:14', 'Feldolgozás', NULL),
(90, 55, '2025-12-01 19:24:14', 'Feldolgozás', NULL),
(91, 55, '2025-12-02 19:24:14', 'Feldolgozás', NULL),
(92, 55, '2025-12-03 19:24:14', 'Feldolgozás', NULL),
(93, 55, '2025-12-04 19:24:14', 'Teljesítve', '2025-12-10 18:55:31'),
(94, 55, '2025-12-05 19:24:14', 'Összekészítve', '2025-12-10 18:38:28'),
(95, 55, '2025-12-08 19:26:58', 'Teljesítve', '2025-12-10 18:55:45'),
(98, 55, '2025-12-10 10:39:49', 'Feldolgozás', '2025-12-10 19:38:16'),
(99, 55, '2025-12-10 19:43:25', 'Feldolgozás', '2025-12-10 19:43:25'),
(100, 55, '2025-12-10 19:46:52', 'Feldolgozás', '2025-12-10 19:46:52');

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
(97, 86, 113, 2, 100),
(98, 86, 111, 4, 100),
(99, 86, 14, 11, 100),
(100, 87, 15, 11, 200),
(101, 88, 110, 1, 100),
(103, 89, 110, 1, 100),
(104, 90, 110, 1, 100),
(105, 91, 110, 1, 100),
(106, 92, 110, 1, 100),
(107, 93, 110, 1, 100),
(108, 94, 110, 1, 100),
(109, 95, 110, 1, 100),
(112, 98, 14, 1, 100),
(113, 86, 115, 1, 100),
(114, 86, 116, 1, 100),
(115, 86, 117, 1, 100),
(116, 86, 118, 1, 100),
(117, 86, 119, 1, 100),
(118, 86, 120, 1, 100),
(119, 86, 121, 1, 100),
(120, 86, 122, 1, 100),
(121, 86, 123, 1, 100),
(122, 99, 14, 1, 100),
(123, 99, 15, 1, 200),
(124, 99, 17, 1, 300),
(125, 100, 14, 1, 100),
(126, 100, 15, 1, 200),
(127, 100, 17, 1, 300);

-- --------------------------------------------------------

--
-- Table structure for table `szallitasicim`
--

CREATE TABLE `szallitasicim` (
  `id_szallitasicim` int(255) NOT NULL,
  `idf_szemely` int(255) NOT NULL,
  `iranyitoszam` int(4) NOT NULL,
  `varos` varchar(50) NOT NULL,
  `utca` varchar(100) NOT NULL,
  `hazszam` varchar(10) NOT NULL,
  `emelet` int(40) NOT NULL,
  `ajto` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `szallitasicim`
--

INSERT INTO `szallitasicim` (`id_szallitasicim`, `idf_szemely`, `iranyitoszam`, `varos`, `utca`, `hazszam`, `emelet`, `ajto`) VALUES
(21, 68, 1000, 'Budapest', 'Andrási körút 10', '1', 0, ''),
(22, 55, 1111, 'Alma varos', 'Korte utca', '1', 1, '1');

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
(55, 'Ferenczi Szabolcs', 'admin@admin.com', '$2y$10$MKJo0J8PyGSCm5R3vFR1g.VPIREDeqKOonBdbuRcCGRjbaprn0V/q', '3'),
(59, 'admin2', 'admin1@admin.com', '$2y$10$7th7FGI9NRverdVRv31zKuvS4o0T5aXhUw3j96.0LAU.Z6/0v8KuC', '3'),
(60, 'admin2', 'admin2@admin.com', '$2y$10$WyMlTQb3dDCUre35m7dNk.z3Nxa1QLFwtLZzfJ8Zh/eUX6QifZFg.', '1'),
(61, 'admin1', 'admin3@admin.com', '$2y$10$QSV.OW3/7cdh8IGSZo/qHuDpimaL0l1jWVldzLu7YoAjYcsrS9dca', '1'),
(62, 'khjbhjkv', 'admin4@admin.com', '$2y$10$jWZL3V5SIn3GE3Rk0BCdZun1mkEZatsI/jeqOkFUGYPIKWiWYSiTq', '1'),
(63, 'adminka', 'adminka@admin.com', '$2y$10$PxTGQJZje..NwCEv/yljqeqkUGMX.uR4pBS80aKc0Nm9OSHIa0.b6', '1'),
(64, 'adminka', 'kanape@kanape.com', '$2y$10$8GNKdR499I/lJK9Bw6Kvmel9a.XfEceQ3HuUgbAmorg/Yk4Vb6iq.', '1'),
(65, 'almasLepeny', 'alma@alma.com', '$2y$10$m54fXx7XP/X6SusIIONhVuA9znigPeC2RaMXuUPPEuGIy3edh0DOO', '1'),
(66, 'eprecske', 'eprecske@eprecske.com', '$2y$10$LhEjemUH59nKuYLuDE8C9.Q1MQvUFjAhXUtYByGjK99yI9YtWnn5G', '1'),
(67, 'alamuszinyuszi', 'adminocska@adminocska.com', '$2y$10$aqcprNmDb6D1ENL98AdwmOvthsh3SQv3uD7oj4srgkekjBcibobni', '1'),
(68, 'Bronz Béla', 'bronzbela@gmail.com', '$2y$10$IZ4pA0eFCWXPA5jbcuZhHuu.M9T2NG6EGZJt5bC60Vy9EnloaVdBe', '1');

-- --------------------------------------------------------

--
-- Table structure for table `velemenyek`
--

CREATE TABLE `velemenyek` (
  `id_velemeny` int(255) NOT NULL,
  `idf_szemely` int(255) NOT NULL,
  `idf_aru` int(255) NOT NULL,
  `velemenyszoveg` varchar(255) NOT NULL,
  `datum_velemeny` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `velemenyek`
--

INSERT INTO `velemenyek` (`id_velemeny`, `idf_szemely`, `idf_aru`, `velemenyszoveg`, `datum_velemeny`) VALUES
(163, 55, 14, 'Megfelel', '2025-12-08 15:23:59'),
(164, 55, 110, 'Megfelelt az áru!', '2025-12-08 20:34:16'),
(165, 59, 14, 'Megfelelt!', '2025-12-08 20:34:47'),
(166, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(167, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(168, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(169, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(170, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(171, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(172, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(173, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(174, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(175, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(176, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(177, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(178, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(179, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(180, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(181, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(182, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(183, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(184, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(185, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(186, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(187, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(188, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(189, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(190, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(191, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(192, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(193, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(194, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(195, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(196, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(197, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(198, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(199, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(200, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(201, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(202, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(203, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(204, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(205, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(206, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(207, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(208, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(209, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(210, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(211, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(212, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(213, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(214, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(215, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(216, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(217, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(218, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(219, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(220, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(221, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(222, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(223, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(224, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(225, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(226, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(227, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(228, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(229, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(230, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(231, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(232, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(233, 59, 14, 'Megfelelt!', '2025-12-08 20:35:02'),
(234, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(235, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(236, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(237, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(238, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(239, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(240, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(241, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(242, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(243, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(244, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(245, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(246, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(247, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(248, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(249, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(250, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(251, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(252, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(253, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(254, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(255, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(256, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(257, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(258, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(259, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(260, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(261, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(262, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(263, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(264, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(265, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(266, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(267, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(268, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(269, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(270, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(271, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(272, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(273, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(274, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(275, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(276, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(277, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(278, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(279, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(280, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(281, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(282, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(283, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(284, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(285, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(286, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(287, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(288, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03'),
(289, 59, 14, 'Megfelelt!', '2025-12-08 20:35:03');

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
-- Indexes for table `szallitasicim`
--
ALTER TABLE `szallitasicim`
  ADD PRIMARY KEY (`id_szallitasicim`);

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
  MODIFY `id_aru` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `fizeteseredmeny`
--
ALTER TABLE `fizeteseredmeny`
  MODIFY `id_fizetes` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `rendeles`
--
ALTER TABLE `rendeles`
  MODIFY `id_rendeles` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `rendelestartalma`
--
ALTER TABLE `rendelestartalma`
  MODIFY `id_rendelestartalma` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `szallitasicim`
--
ALTER TABLE `szallitasicim`
  MODIFY `id_szallitasicim` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `szemely`
--
ALTER TABLE `szemely`
  MODIFY `id_szemely` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `velemenyek`
--
ALTER TABLE `velemenyek`
  MODIFY `id_velemeny` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
