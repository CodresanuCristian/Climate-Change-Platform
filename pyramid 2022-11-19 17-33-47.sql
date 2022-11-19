-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: localhost:3306
-- Timp de generare: nov. 19, 2022 la 03:33 PM
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
  `Curent` varchar(50) NOT NULL,
  `ApaCaldaSiRece` varchar(50) NOT NULL,
  `Electricitate` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Eliminarea datelor din tabel `definitii`
--

INSERT INTO `definitii` (`ID`, `Transport`, `Mancare`, `Curent`, `ApaCaldaSiRece`, `Electricitate`) VALUES
(0, 'Lucrat de acasa', '0', '0-30', '<=2', '5+'),
(1, 'Mers pe jos', '1', '31-40', '2-4', '4'),
(2, 'Mers pe bicicleta', '2', '41-60', '4-6', '3'),
(3, 'Transport in comun', '3', '61-80', '6-9', '2'),
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
(11, 1042, '2022-11-19 15:31:37');

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
(1, 'ionMarcel', 1, 1, '-', '-', 1, 2, 3, 4, 0);

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
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `ID` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pentru tabele `user`
--
ALTER TABLE `user`
  MODIFY `ID` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
