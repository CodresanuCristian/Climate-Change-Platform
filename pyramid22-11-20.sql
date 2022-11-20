-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: localhost:3306
-- Timp de generare: nov. 20, 2022 la 07:28 AM
-- Versiune server: 8.0.30
-- Versiune PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `pyramid`
--

DELIMITER $$
--
-- Proceduri
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetToDoList` (IN `in_UserID` BIGINT)   select 'Transport' Tip,Transport DeLa,Transport-1 La from pyramid.user where ID=in_UserID and Transport>0
union
select 'Mancare' Tip,Mancare DeLa,Mancare-1 La from pyramid.user where ID=in_UserID and Mancare>0
union
select 'Electricitate' Tip,Electricitate DeLa,Electricitate-1 La from pyramid.user where ID=in_UserID and Electricitate>0
union
select 'ApaCaldaSiRece' Tip,ApaCaldaSiRece DeLa,ApaCaldaSiRece-1 La from pyramid.user where ID=in_UserID and ApaCaldaSiRece>0
union
select 'Reciclat' Tip,Reciclat DeLa,Reciclat-1 La from pyramid.user where ID=in_UserID and Reciclat>0$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `definitii`
--

CREATE TABLE `definitii` (
  `ID` bigint NOT NULL,
  `Transport` varchar(50) NOT NULL,
  `Mancare` varchar(50) NOT NULL,
  `Electricitate` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ApaCaldaSiRece` varchar(50) NOT NULL,
  `Reciclat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `definitii`
--

INSERT INTO `definitii` (`ID`, `Transport`, `Mancare`, `Electricitate`, `ApaCaldaSiRece`, `Reciclat`) VALUES
(0, 'Mers pe jos', '0', '0-30', '<=2', '5+'),
(1, 'Mers pe bicicleta', '1', '31-40', '2-4', '4'),
(2, 'Transport in comun', '2', '41-60', '4-6', '3'),
(3, 'Carpool', '3', '61-80', '6-9', '2'),
(4, 'Masina personala', '4', '81+', '9+', '1');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `istoric_electricicate_romania`
--

CREATE TABLE `istoric_electricicate_romania` (
  `ID` bigint NOT NULL,
  `Val` int NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `istoric_electricicate_romania`
--

INSERT INTO `istoric_electricicate_romania` (`ID`, `Val`, `Date`) VALUES
(2, 517, '2022-11-19 12:56:14'),
(3, 504, '2022-11-19 13:07:05'),
(4, 550, '2022-11-19 13:17:05'),
(5, 652, '2022-11-19 13:27:06'),
(6, 638, '2022-11-19 13:37:03'),
(7, 578, '2022-11-19 13:47:08'),
(8, 640, '2022-11-19 13:57:04'),
(9, 745, '2022-11-19 14:07:13'),
(10, 721, '2022-11-19 14:17:08'),
(11, 1042, '2022-11-19 15:31:37'),
(12, -1868, '2022-11-20 01:47:53'),
(13, -1146, '2022-11-20 04:23:26'),
(14, -917, '2022-11-20 05:28:43');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user`
--

CREATE TABLE `user` (
  `ID` bigint NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Lat` int NOT NULL,
  `Lon` int NOT NULL,
  `Oras` varchar(50) NOT NULL,
  `Tara` varchar(50) NOT NULL,
  `Transport` int NOT NULL,
  `Mancare` int NOT NULL,
  `Electricitate` int NOT NULL,
  `ApaCaldaSiRece` int NOT NULL,
  `Reciclat` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `user`
--

INSERT INTO `user` (`ID`, `Nume`, `Lat`, `Lon`, `Oras`, `Tara`, `Transport`, `Mancare`, `Electricitate`, `ApaCaldaSiRece`, `Reciclat`) VALUES
(1, 'Marcel1', 1, 1, '-', '-', 4, 4, 4, 4, 4),
(2, 'Purcel2', -1, -1, '', '', 2, 2, 3, 4, 2),
(3, 'Cercel3', -1, -1, '', '', 0, 1, 2, 3, 3),
(4, 'Burcel4', -1, -1, '', '', 0, 0, 0, 0, 0),
(5, 'Lurcel5', -1, -1, '', '', 1, 0, 1, 0, 1),
(6, 'Kurcel6', -1, -1, '', '', 3, 3, 3, 3, 3),
(7, 'Murcel7', -1, -1, '', '', 0, 1, 1, 1, 4),
(8, 'Nurcel8', -1, -1, '', '', 3, 1, 2, 1, 2),
(9, 'Rurcel9', -1, -1, '', '', 3, 1, 2, 1, 2),
(10, 'Turcel10', -1, -1, '', '', 1, 2, 1, 2, 0),
(11, 'Wurcel11', -1, -1, '', '', 0, 0, 0, 0, 0),
(13, 'Lurcel13', -1, -1, '', '', 0, 0, 0, 1, 0),
(14, 'Lurcel14', -1, -1, '', '', 2, 4, 4, 0, 0),
(15, 'Lurcel15', -1, -1, '', '', 4, 0, 3, 2, 1),
(16, 'Lurcel16', -1, -1, '', '', 2, 1, 1, 1, 1),
(17, 'Lurcel17', -1, -1, '', '', 4, 1, 4, 1, 4),
(18, 'Lurcel18', -1, -1, '', '', 4, 2, 1, 3, 2),
(19, 'Lurcel19', -1, -1, '', '', 2, 4, 3, 1, 0),
(20, 'Lurcel20', -1, -1, '', '', 3, 0, 3, 0, 0),
(21, 'Lurcel21', -1, -1, '', '', 2, 2, 3, 0, 3),
(22, 'Lurcel22', -1, -1, '', '', 3, 3, 0, 3, 0),
(23, 'Lurcel23', -1, -1, '', '', 2, 3, 3, 0, 0),
(24, 'Lurcel24', -1, -1, '', '', 1, 2, 3, 2, 0),
(25, 'Lurcel25', -1, -1, '', '', 1, 1, 2, 4, 0),
(26, 'Lurcel26', -1, -1, '', '', 2, 0, 1, 4, 2),
(27, 'Lurcel27', -1, -1, '', '', 0, 0, 4, 0, 0),
(28, 'Lurcel28', -1, -1, '', '', 3, 1, 3, 3, 2),
(29, 'Lurcel29', -1, -1, '', '', 2, 4, 2, 0, 2),
(30, 'Lurcel30', -1, -1, '', '', 2, 4, 2, 3, 3),
(31, 'Lurcel31', -1, -1, '', '', 3, 1, 2, 1, 2),
(32, 'Lurcel32', -1, -1, '', '', 1, 0, 2, 1, 0),
(33, 'Lurcel33', -1, -1, '', '', 3, 3, 2, 1, 1),
(34, 'Lurcel34', -1, -1, '', '', 2, 3, 0, 1, 4),
(35, 'Lurcel35', -1, -1, '', '', 2, 3, 4, 4, 2),
(36, 'Lurcel36', -1, -1, '', '', 3, 0, 0, 3, 3),
(37, 'Lurcel37', -1, -1, '', '', 3, 2, 4, 2, 1),
(38, 'Lurcel38', -1, -1, '', '', 1, 1, 3, 2, 1),
(39, 'Lurcel39', -1, -1, '', '', 4, 3, 4, 4, 2),
(40, 'Lurcel40', -1, -1, '', '', 1, 4, 2, 3, 4),
(41, 'Lurcel41', -1, -1, '', '', 3, 4, 0, 0, 1),
(42, 'Lurcel42', -1, -1, '', '', 1, 1, 3, 0, 3),
(43, 'Lurcel43', -1, -1, '', '', 1, 1, 4, 3, 1),
(44, 'Lurcel44', -1, -1, '', '', 4, 3, 4, 2, 3),
(45, 'Lurcel45', -1, -1, '', '', 4, 2, 0, 0, 3),
(46, 'Lurcel46', -1, -1, '', '', 1, 1, 2, 2, 4),
(47, 'Lurcel47', -1, -1, '', '', 1, 2, 2, 2, 2),
(48, 'Lurcel48', -1, -1, '', '', 1, 1, 0, 4, 0),
(49, 'Lurcel49', -1, -1, '', '', 1, 2, 2, 2, 4),
(50, 'Lurcel50', -1, -1, '', '', 2, 2, 2, 0, 2),
(51, 'Lurcel51', -1, -1, '', '', 3, 4, 1, 4, 1),
(52, 'Lurcel52', -1, -1, '', '', 4, 1, 4, 0, 2),
(53, 'Lurcel53', -1, -1, '', '', 4, 4, 3, 3, 2),
(54, 'Lurcel54', -1, -1, '', '', 4, 3, 2, 2, 3),
(55, 'Lurcel55', -1, -1, '', '', 2, 1, 0, 1, 1),
(56, 'Lurcel56', -1, -1, '', '', 4, 0, 3, 2, 1),
(57, 'Lurcel57', -1, -1, '', '', 2, 4, 0, 4, 1),
(58, 'Lurcel58', -1, -1, '', '', 4, 1, 0, 4, 3),
(59, 'Lurcel59', -1, -1, '', '', 1, 0, 3, 4, 1),
(60, 'Lurcel60', -1, -1, '', '', 0, 0, 2, 0, 2),
(61, 'Lurcel61', -1, -1, '', '', 2, 2, 3, 2, 0),
(62, 'Lurcel62', -1, -1, '', '', 1, 0, 1, 0, 4),
(63, 'Lurcel63', -1, -1, '', '', 0, 4, 0, 4, 1),
(64, 'Lurcel64', -1, -1, '', '', 2, 2, 1, 3, 0),
(65, 'Lurcel65', -1, -1, '', '', 0, 1, 0, 4, 1),
(66, 'Lurcel66', -1, -1, '', '', 1, 4, 4, 4, 1),
(67, 'Lurcel67', -1, -1, '', '', 4, 2, 0, 3, 0),
(68, 'Lurcel68', -1, -1, '', '', 1, 1, 1, 0, 4),
(69, 'Lurcel69', -1, -1, '', '', 2, 4, 4, 0, 2),
(70, 'Lurcel70', -1, -1, '', '', 2, 2, 2, 3, 3),
(71, 'Lurcel71', -1, -1, '', '', 4, 0, 0, 3, 2),
(72, 'Lurcel72', -1, -1, '', '', 2, 1, 2, 2, 0),
(73, 'Lurcel73', -1, -1, '', '', 3, 2, 0, 0, 0),
(74, 'Lurcel74', -1, -1, '', '', 2, 2, 1, 3, 1),
(75, 'Lurcel75', -1, -1, '', '', 2, 3, 4, 2, 2),
(76, 'Lurcel76', -1, -1, '', '', 1, 1, 1, 0, 1),
(77, 'Lurcel77', -1, -1, '', '', 0, 2, 0, 0, 3),
(78, 'Lurcel78', -1, -1, '', '', 2, 1, 4, 1, 1),
(79, 'Lurcel79', -1, -1, '', '', 3, 0, 0, 0, 2),
(80, 'Lurcel80', -1, -1, '', '', 4, 1, 4, 4, 2),
(81, 'Lurcel81', -1, -1, '', '', 1, 1, 4, 2, 2),
(82, 'Lurcel82', -1, -1, '', '', 0, 1, 4, 4, 4),
(83, 'Lurcel83', -1, -1, '', '', 3, 0, 2, 3, 1),
(84, 'Lurcel84', -1, -1, '', '', 3, 1, 2, 2, 2),
(85, 'Lurcel85', -1, -1, '', '', 2, 0, 4, 1, 4),
(86, 'Lurcel86', -1, -1, '', '', 4, 1, 4, 4, 1),
(87, 'Lurcel87', -1, -1, '', '', 4, 4, 1, 1, 0),
(88, 'Lurcel88', -1, -1, '', '', 4, 4, 4, 0, 4),
(89, 'Lurcel89', -1, -1, '', '', 0, 4, 0, 2, 4),
(90, 'Lurcel90', -1, -1, '', '', 3, 2, 4, 1, 4),
(91, 'Lurcel91', -1, -1, '', '', 4, 4, 2, 3, 3),
(92, 'Lurcel92', -1, -1, '', '', 0, 0, 4, 0, 1),
(93, 'Lurcel93', -1, -1, '', '', 0, 0, 4, 3, 0),
(94, 'Lurcel94', -1, -1, '', '', 2, 3, 1, 3, 0),
(95, 'Lurcel95', -1, -1, '', '', 4, 0, 2, 3, 0),
(96, 'Lurcel96', -1, -1, '', '', 4, 3, 1, 3, 3),
(97, 'Lurcel97', -1, -1, '', '', 4, 2, 1, 1, 4),
(98, 'Lurcel98', -1, -1, '', '', 3, 2, 1, 0, 2),
(99, 'Lurcel99', -1, -1, '', '', 0, 1, 3, 0, 3),
(100, 'Lurcel100', -1, -1, '', '', 2, 2, 0, 0, 1),
(101, 'Lurcel101', -1, -1, '', '', 2, 0, 2, 1, 3),
(102, 'Lurcel102', -1, -1, '', '', 3, 4, 4, 3, 4),
(103, 'Lurcel103', -1, -1, '', '', 4, 2, 2, 0, 1),
(104, 'Lurcel104', -1, -1, '', '', 0, 1, 0, 0, 0),
(105, 'Lurcel105', -1, -1, '', '', 0, 4, 0, 3, 3),
(106, 'Lurcel106', -1, -1, '', '', 0, 2, 4, 4, 1),
(107, 'Lurcel107', -1, -1, '', '', 1, 4, 4, 3, 2),
(108, 'Lurcel108', -1, -1, '', '', 2, 1, 2, 1, 3),
(109, 'Lurcel109', -1, -1, '', '', 3, 1, 4, 3, 1),
(110, 'Lurcel110', -1, -1, '', '', 0, 4, 3, 1, 3),
(111, 'Lurcel111', -1, -1, '', '', 1, 2, 4, 2, 4),
(112, 'Lurcel112', -1, -1, '', '', 2, 1, 0, 2, 2),
(113, 'romica113', -1, -1, '', '', 1, 2, 1, 2, 3),
(114, 'Teo114', -1, -1, '', '', 2, 3, 2, 0, 3),
(116, 'PP116', -1, -1, '', '', 1, 1, 1, 1, 1),
(119, 'PP119', -1, -1, '', '', 1, 2, 1, 3, 1),
(120, 'vivatelecom', -1, -1, '', '', 1, 3, 2, 1, 3),
(124, 'devhacks2022', -1, -1, '', '', 0, 1, 2, 1, 2),
(127, 'devhacks2021', -1, -1, '', '', 0, 1, 2, 2, 2),
(128, 'teo', -1, -1, '', '', 2, 1, 0, 3, 4),
(129, 'qqq', -1, -1, '', '', 1, 1, 1, 1, 1),
(130, 'qqqq', -1, -1, '', '', 1, 1, 1, 1, 1),
(131, 'qwe32', -1, -1, '', '', 1, 1, 1, 1, 1),
(132, 'ewqr32', -1, -1, '', '', 0, 0, 0, 0, 0),
(136, 'qwe323', -1, -1, '', '', 0, 0, 0, 0, 0),
(138, 'qwe3234', -1, -1, '', '', 0, 0, 0, 0, 0),
(139, 'aualo', -1, -1, '', '', 1, 1, 1, 1, 1),
(140, 'fmmmm', -1, -1, '', '', 0, 0, 0, 0, 0),
(141, '44', -1, -1, '', '', 0, 0, 0, 0, 0),
(142, 'pfff', -1, -1, '', '', 0, 0, 0, 0, 0),
(144, 'gigel cel mare', -1, -1, '', '', 0, 0, 0, 0, 0),
(145, 'ger', -1, -1, '', '', 0, 0, 0, 0, 0),
(146, 'pok', -1, -1, '', '', 0, 0, 0, 0, 0),
(147, 'e', -1, -1, '', '', 0, 0, 0, 0, 0),
(148, 'rr', -1, -1, '', '', 0, 0, 0, 0, 0),
(149, 'macar', -1, -1, '', '', 0, 0, 0, 0, 0),
(150, 'p', -1, -1, '', '', 0, 0, 0, 0, 0),
(151, 'l', -1, -1, '', '', 0, 0, 0, 0, 0),
(152, 'extraordinar', -1, -1, '', '', 1, 1, 1, 1, 1),
(153, 'www', -1, -1, '', '', 0, 0, 1, 4, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user_apa`
--

CREATE TABLE `user_apa` (
  `ID` bigint NOT NULL,
  `UserID` int NOT NULL,
  `ConsumCalda` int NOT NULL,
  `ConsumRece` int NOT NULL,
  `Data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user_electricitate`
--

CREATE TABLE `user_electricitate` (
  `ID` bigint NOT NULL,
  `UserID` int NOT NULL,
  `Consum` int NOT NULL,
  `Data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user_lurceibk`
--

CREATE TABLE `user_lurceibk` (
  `ID` bigint NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Lat` int NOT NULL,
  `Lon` int NOT NULL,
  `Oras` varchar(50) NOT NULL,
  `Tara` varchar(50) NOT NULL,
  `Transport` int NOT NULL,
  `Mancare` int NOT NULL,
  `Electricitate` int NOT NULL,
  `ApaCaldaSiRece` int NOT NULL,
  `Reciclat` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `user_lurceibk`
--

INSERT INTO `user_lurceibk` (`ID`, `Nume`, `Lat`, `Lon`, `Oras`, `Tara`, `Transport`, `Mancare`, `Electricitate`, `ApaCaldaSiRece`, `Reciclat`) VALUES
(1, 'Marcel', 1, 1, '-', '-', 4, 4, 4, 4, 4),
(2, 'Purcel', -1, -1, '', '', 2, 2, 3, 4, 2),
(3, 'Cercel', -1, -1, '', '', 0, 1, 2, 3, 3),
(4, 'Burcel', -1, -1, '', '', 0, 0, 0, 0, 0),
(5, 'Lurcel', -1, -1, '', '', 1, 0, 1, 0, 1),
(6, 'Kurcel', -1, -1, '', '', 3, 3, 3, 3, 3),
(7, 'Murcel', -1, -1, '', '', 0, 1, 1, 1, 4),
(8, 'Nurcel', -1, -1, '', '', 3, 1, 2, 1, 2),
(9, 'Rurcel', -1, -1, '', '', 3, 1, 2, 1, 2),
(10, 'Turcel', -1, -1, '', '', 1, 2, 1, 2, 0),
(11, 'Wurcel', -1, -1, '', '', 0, 0, 0, 0, 0),
(13, 'Lurcel', -1, -1, '', '', 0, 0, 0, 1, 0),
(14, 'Lurcel', -1, -1, '', '', 2, 4, 4, 0, 0),
(15, 'Lurcel', -1, -1, '', '', 4, 0, 3, 2, 1),
(16, 'Lurcel', -1, -1, '', '', 2, 1, 1, 1, 1),
(17, 'Lurcel', -1, -1, '', '', 4, 1, 4, 1, 4),
(18, 'Lurcel', -1, -1, '', '', 4, 2, 1, 3, 2),
(19, 'Lurcel', -1, -1, '', '', 2, 4, 3, 1, 0),
(20, 'Lurcel', -1, -1, '', '', 3, 0, 3, 0, 0),
(21, 'Lurcel', -1, -1, '', '', 2, 2, 3, 0, 3),
(22, 'Lurcel', -1, -1, '', '', 3, 3, 0, 3, 0),
(23, 'Lurcel', -1, -1, '', '', 2, 3, 3, 0, 0),
(24, 'Lurcel', -1, -1, '', '', 1, 2, 3, 2, 0),
(25, 'Lurcel', -1, -1, '', '', 1, 1, 2, 4, 0),
(26, 'Lurcel', -1, -1, '', '', 2, 0, 1, 4, 2),
(27, 'Lurcel', -1, -1, '', '', 0, 0, 4, 0, 0),
(28, 'Lurcel', -1, -1, '', '', 3, 1, 3, 3, 2),
(29, 'Lurcel', -1, -1, '', '', 2, 4, 2, 0, 2),
(30, 'Lurcel', -1, -1, '', '', 2, 4, 2, 3, 3),
(31, 'Lurcel', -1, -1, '', '', 3, 1, 2, 1, 2),
(32, 'Lurcel', -1, -1, '', '', 1, 0, 2, 1, 0),
(33, 'Lurcel', -1, -1, '', '', 3, 3, 2, 1, 1),
(34, 'Lurcel', -1, -1, '', '', 2, 3, 0, 1, 4),
(35, 'Lurcel', -1, -1, '', '', 2, 3, 4, 4, 2),
(36, 'Lurcel', -1, -1, '', '', 3, 0, 0, 3, 3),
(37, 'Lurcel', -1, -1, '', '', 3, 2, 4, 2, 1),
(38, 'Lurcel', -1, -1, '', '', 1, 1, 3, 2, 1),
(39, 'Lurcel', -1, -1, '', '', 4, 3, 4, 4, 2),
(40, 'Lurcel', -1, -1, '', '', 1, 4, 2, 3, 4),
(41, 'Lurcel', -1, -1, '', '', 3, 4, 0, 0, 1),
(42, 'Lurcel', -1, -1, '', '', 1, 1, 3, 0, 3),
(43, 'Lurcel', -1, -1, '', '', 1, 1, 4, 3, 1),
(44, 'Lurcel', -1, -1, '', '', 4, 3, 4, 2, 3),
(45, 'Lurcel', -1, -1, '', '', 4, 2, 0, 0, 3),
(46, 'Lurcel', -1, -1, '', '', 1, 1, 2, 2, 4),
(47, 'Lurcel', -1, -1, '', '', 1, 2, 2, 2, 2),
(48, 'Lurcel', -1, -1, '', '', 1, 1, 0, 4, 0),
(49, 'Lurcel', -1, -1, '', '', 1, 2, 2, 2, 4),
(50, 'Lurcel', -1, -1, '', '', 2, 2, 2, 0, 2),
(51, 'Lurcel', -1, -1, '', '', 3, 4, 1, 4, 1),
(52, 'Lurcel', -1, -1, '', '', 4, 1, 4, 0, 2),
(53, 'Lurcel', -1, -1, '', '', 4, 4, 3, 3, 2),
(54, 'Lurcel', -1, -1, '', '', 4, 3, 2, 2, 3),
(55, 'Lurcel', -1, -1, '', '', 2, 1, 0, 1, 1),
(56, 'Lurcel', -1, -1, '', '', 4, 0, 3, 2, 1),
(57, 'Lurcel', -1, -1, '', '', 2, 4, 0, 4, 1),
(58, 'Lurcel', -1, -1, '', '', 4, 1, 0, 4, 3),
(59, 'Lurcel', -1, -1, '', '', 1, 0, 3, 4, 1),
(60, 'Lurcel', -1, -1, '', '', 0, 0, 2, 0, 2),
(61, 'Lurcel', -1, -1, '', '', 2, 2, 3, 2, 0),
(62, 'Lurcel', -1, -1, '', '', 1, 0, 1, 0, 4),
(63, 'Lurcel', -1, -1, '', '', 0, 4, 0, 4, 1),
(64, 'Lurcel', -1, -1, '', '', 2, 2, 1, 3, 0),
(65, 'Lurcel', -1, -1, '', '', 0, 1, 0, 4, 1),
(66, 'Lurcel', -1, -1, '', '', 1, 4, 4, 4, 1),
(67, 'Lurcel', -1, -1, '', '', 4, 2, 0, 3, 0),
(68, 'Lurcel', -1, -1, '', '', 1, 1, 1, 0, 4),
(69, 'Lurcel', -1, -1, '', '', 2, 4, 4, 0, 2),
(70, 'Lurcel', -1, -1, '', '', 2, 2, 2, 3, 3),
(71, 'Lurcel', -1, -1, '', '', 4, 0, 0, 3, 2),
(72, 'Lurcel', -1, -1, '', '', 2, 1, 2, 2, 0),
(73, 'Lurcel', -1, -1, '', '', 3, 2, 0, 0, 0),
(74, 'Lurcel', -1, -1, '', '', 2, 2, 1, 3, 1),
(75, 'Lurcel', -1, -1, '', '', 2, 3, 4, 2, 2),
(76, 'Lurcel', -1, -1, '', '', 1, 1, 1, 0, 1),
(77, 'Lurcel', -1, -1, '', '', 0, 2, 0, 0, 3),
(78, 'Lurcel', -1, -1, '', '', 2, 1, 4, 1, 1),
(79, 'Lurcel', -1, -1, '', '', 3, 0, 0, 0, 2),
(80, 'Lurcel', -1, -1, '', '', 4, 1, 4, 4, 2),
(81, 'Lurcel', -1, -1, '', '', 1, 1, 4, 2, 2),
(82, 'Lurcel', -1, -1, '', '', 0, 1, 4, 4, 4),
(83, 'Lurcel', -1, -1, '', '', 3, 0, 2, 3, 1),
(84, 'Lurcel', -1, -1, '', '', 3, 1, 2, 2, 2),
(85, 'Lurcel', -1, -1, '', '', 2, 0, 4, 1, 4),
(86, 'Lurcel', -1, -1, '', '', 4, 1, 4, 4, 1),
(87, 'Lurcel', -1, -1, '', '', 4, 4, 1, 1, 0),
(88, 'Lurcel', -1, -1, '', '', 4, 4, 4, 0, 4),
(89, 'Lurcel', -1, -1, '', '', 0, 4, 0, 2, 4),
(90, 'Lurcel', -1, -1, '', '', 3, 2, 4, 1, 4),
(91, 'Lurcel', -1, -1, '', '', 4, 4, 2, 3, 3),
(92, 'Lurcel', -1, -1, '', '', 0, 0, 4, 0, 1),
(93, 'Lurcel', -1, -1, '', '', 0, 0, 4, 3, 0),
(94, 'Lurcel', -1, -1, '', '', 2, 3, 1, 3, 0),
(95, 'Lurcel', -1, -1, '', '', 4, 0, 2, 3, 0),
(96, 'Lurcel', -1, -1, '', '', 4, 3, 1, 3, 3),
(97, 'Lurcel', -1, -1, '', '', 4, 2, 1, 1, 4),
(98, 'Lurcel', -1, -1, '', '', 3, 2, 1, 0, 2),
(99, 'Lurcel', -1, -1, '', '', 0, 1, 3, 0, 3),
(100, 'Lurcel', -1, -1, '', '', 2, 2, 0, 0, 1),
(101, 'Lurcel', -1, -1, '', '', 2, 0, 2, 1, 3),
(102, 'Lurcel', -1, -1, '', '', 3, 4, 4, 3, 4),
(103, 'Lurcel', -1, -1, '', '', 4, 2, 2, 0, 1),
(104, 'Lurcel', -1, -1, '', '', 0, 1, 0, 0, 0),
(105, 'Lurcel', -1, -1, '', '', 0, 4, 0, 3, 3),
(106, 'Lurcel', -1, -1, '', '', 0, 2, 4, 4, 1),
(107, 'Lurcel', -1, -1, '', '', 1, 4, 4, 3, 2),
(108, 'Lurcel', -1, -1, '', '', 2, 1, 2, 1, 3),
(109, 'Lurcel', -1, -1, '', '', 3, 1, 4, 3, 1),
(110, 'Lurcel', -1, -1, '', '', 0, 4, 3, 1, 3),
(111, 'Lurcel', -1, -1, '', '', 1, 2, 4, 2, 4),
(112, 'Lurcel', -1, -1, '', '', 2, 1, 0, 2, 2);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `definitii`
--
ALTER TABLE `definitii`
  ADD PRIMARY KEY (`ID`);

--
-- Indexuri pentru tabele `istoric_electricicate_romania`
--
ALTER TABLE `istoric_electricicate_romania`
  ADD PRIMARY KEY (`ID`);

--
-- Indexuri pentru tabele `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Nume` (`Nume`);

--
-- Indexuri pentru tabele `user_apa`
--
ALTER TABLE `user_apa`
  ADD PRIMARY KEY (`ID`);

--
-- Indexuri pentru tabele `user_electricitate`
--
ALTER TABLE `user_electricitate`
  ADD PRIMARY KEY (`ID`);

--
-- Indexuri pentru tabele `user_lurceibk`
--
ALTER TABLE `user_lurceibk`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `definitii`
--
ALTER TABLE `definitii`
  MODIFY `ID` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `istoric_electricicate_romania`
--
ALTER TABLE `istoric_electricicate_romania`
  MODIFY `ID` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pentru tabele `user`
--
ALTER TABLE `user`
  MODIFY `ID` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT pentru tabele `user_apa`
--
ALTER TABLE `user_apa`
  MODIFY `ID` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `user_electricitate`
--
ALTER TABLE `user_electricitate`
  MODIFY `ID` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `user_lurceibk`
--
ALTER TABLE `user_lurceibk`
  MODIFY `ID` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
