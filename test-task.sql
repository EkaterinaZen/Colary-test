-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 26 2016 г., 15:00
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test-task`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`Id`, `city`) VALUES
(1, 'Санкт-Петербург'),
(2, 'Москва'),
(3, 'Волгоград'),
(4, 'Владивосток'),
(5, 'Хабаровск'),
(6, 'Екатеринбург'),
(7, 'Казань'),
(8, 'Калининград'),
(9, 'Краснодар'),
(10, 'Нижний Новгород'),
(11, 'Пермь'),
(12, 'Самара'),
(13, 'Ульяновск'),
(14, 'Уфа'),
(15, 'Челябинск');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `avatar` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `hash`, `email`, `gender`, `city`, `birth`, `avatar`) VALUES
(1, 'admin', '$2a$08$Delqm4e5TWJg9rMvMkmfIOl0KygkBLuQmv5psChl5QKuVFPyvkeQy', '', '', 'male', 'Москва', '1984-10-12', 'Sfr9XAdgSVI.jpg'),
(2, 'Pasha', '$2a$08$L075M4h12P1yPQHfS9FoH.z42xSGnEB.tkn4Sqh3vGQ1NKlpDUmh.', '3513f9e3a0d6e7b6240f2f313be36b21', '', 'female', 'Краснодар', '1994-01-19', 'dogone.jpg'),
(3, 'Sasha', '$2a$08$aW82gsvZXLWFfN.U7Yb4iujUzyzBvDVF1Ys7YmAY2uJ3IK7QkyBrm', '', '', 'female', 'Самара', '1970-01-30', 'sDUexQF9aho.jpg'),
(4, 'Vasya', '$2a$08$DH1D0w4rokBCAS4zFMqoLuB1SnLJUliyenFUXGyGToXnQKegkNDZG', '', '', 'male', 'Краснодар', '2013-06-18', 'vasyashka.jpg'),
(5, 'Diman', '$2a$08$kJwjYp5IE6zwRvGWj.qI0OalwiAYqj954KdD0EwodUTVf26te5bva', '', '', 'male', 'Челябинск', '2005-03-31', 'brutal.jpg'),
(6, 'Snejana', '$2a$08$d4s7N859Fcu2WfkzvjWAqebC6II35kXXeqV/5yLK7Pm5fmBJnMDeC', '', '', 'female', 'Нижний Новгород', '2007-01-09', 'doggirl.jpg'),
(7, 'Angela', '$2a$08$jTIOCvvZk2JnWjm/.w1uKOW3UQ1VQLUV7UoIlR9tCrBHdSenSoQHy', '', '', 'female', 'Санкт-Петербург', '2009-01-13', 'dogone.jpg'),
(8, 'Scarlett', '$2a$08$yFoAIQAy4L9nSWaq4vH7C.aYaGSGiB08KXptRouhDufhqR736OHhi', '', '', 'female', 'Екатеринбург', '2007-01-15', 'sng.jpg'),
(9, 'Natasha', '$2a$08$7980ZBkru1pUSVaMnWkIneuC2GAya3w32r0ySWoAKtBfnwkWrG/MG', '', '', 'female', 'Калининград', '2006-06-13', 'dogsad.jpg'),
(10, 'Masha', '$2a$08$WQ2MBiAjaXc/MmWI1s5GGue8IUT2f9b64inp34c7TpqI1sLDGkUgS', '', '', 'female', 'Санкт-Петербург', '2010-08-09', 'masha.jpg'),
(11, 'Medved', '$2a$08$nicJyg0H9fqKriOfP7kAWO5kpYj9ifiCzcQqkwlVs0Ec48FshOrby', '', '', 'male', 'Ульяновск', '1964-10-12', 'medved.jpg'),
(12, 'Roman', '$2a$08$492hNWiVQRptO/IWrmbScuoRUbt/El.KGKh1IgMbj4aS1LDjf.MJi', '', '', 'male', 'Москва', '1966-12-05', 'abram.jpg'),
(13, 'Veniamin', '$2a$08$hM1lrNeIfUVjzugjtfRffOyAMpNNB7NHGUL/DjXhgp1a50mkL/J6W', '', '', 'male', 'Краснодар', '1965-11-15', ''),
(14, 'Irina', '$2a$08$1rUplcmx7RbLICCdqzyks.S/Rr2Di2G1JRkoNufy66pVf0sehp0AK', '', 'Irina@mail.ru', 'male', 'Казань', '1990-01-17', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
