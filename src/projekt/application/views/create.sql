-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2020. Máj 24. 15:34
-- Kiszolgáló verziója: 5.7.26
-- PHP verzió: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `web3`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `b` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `c` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  `correct` varchar(250) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `answer`
--

INSERT INTO `answer` (`id`, `a`, `b`, `c`, `correct`) VALUES
(1, 'Lázár Ervin', 'Fekete István', 'Bartos Erika', 'Fekete István');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` varchar(8) COLLATE utf8_hungarian_ci NOT NULL,
  `question` varchar(250) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `questions`
--

INSERT INTO `questions` (`id`, `question`, `created`) VALUES
('A3873594', 'Ki írta a Vuk című regényt?', '2020-05-24 15:32:49'),
('A6952967', 'A Budapesti Operettszínház 1923-ban nyitott meg.', '2020-05-24 15:34:16');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `threeansq`
--

DROP TABLE IF EXISTS `threeansq`;
CREATE TABLE IF NOT EXISTS `threeansq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` char(8) COLLATE utf8_hungarian_ci NOT NULL,
  `ans_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `threeansq`
--

INSERT INTO `threeansq` (`id`, `question_id`, `ans_id`, `type_id`) VALUES
(1, 'A3873594', 1, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `type`
--

INSERT INTO `type` (`Id`, `Type`) VALUES
(1, 0),
(2, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_hungarian_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `loggedin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `yesnoq`
--

DROP TABLE IF EXISTS `yesnoq`;
CREATE TABLE IF NOT EXISTS `yesnoq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` char(8) COLLATE utf8_hungarian_ci NOT NULL,
  `answer` tinyint(1) NOT NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `yesnoq`
--

INSERT INTO `yesnoq` (`id`, `question_id`, `answer`, `type_id`) VALUES
(1, 'A6952967', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
