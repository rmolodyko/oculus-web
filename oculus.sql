-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Час створення: Лют 25 2015 р., 22:23
-- Версія сервера: 5.6.21
-- Версія PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `oculus`
--

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_city`
--

CREATE TABLE IF NOT EXISTS `tbl_city` (
`id` int(11) unsigned NOT NULL,
  `id_country` int(11) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text,
  `ts_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `id_country`, `name`, `description`, `ts_create`, `active`) VALUES
(1, 21, 'Киев', 'Киев', '2015-02-23 05:59:54', b'1');

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_common`
--

CREATE TABLE IF NOT EXISTS `tbl_common` (
  `key` text NOT NULL,
  `val` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_cost_float`
--

CREATE TABLE IF NOT EXISTS `tbl_cost_float` (
`id` int(11) unsigned NOT NULL,
  `id_game` int(11) unsigned NOT NULL,
  `id_place` int(11) unsigned NOT NULL,
  `time_start` int(11) NOT NULL COMMENT 'Время начала действия цены',
  `time_finish` int(11) NOT NULL,
  `day` set('sunday','saturday','friday','thursday','wednesday','tuesday','monday') NOT NULL DEFAULT 'sunday,saturday,friday,thursday,wednesday,tuesday,monday',
  `description` text,
  `ts_create` bigint(20) NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_country`
--

CREATE TABLE IF NOT EXISTS `tbl_country` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text,
  `ts_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `tbl_country`
--

INSERT INTO `tbl_country` (`id`, `name`, `description`, `ts_create`, `active`) VALUES
(21, 'Украина', 'Украина', '2015-02-23 05:54:42', b'1');

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_employee`
--

CREATE TABLE IF NOT EXISTS `tbl_employee` (
`id` int(11) unsigned NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `description` text,
  `ts_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `email`, `password`, `first_name`, `last_name`, `phone`, `description`, `ts_create`, `active`) VALUES
(1, 'molodyko13@gmail.com', 'muha1990', 'Ruslan', 'Molodyko', '12312432', 'sdfsdfdsf', '2015-02-23 06:20:16', b'1'),
(2, 'lalala@ukr.net', 'ffgdg', 'fdgdfgq', 'etertfdgf', '4545353', 'fgfgfgfg', '2015-02-23 21:13:48', b'1');

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_employee2place`
--

CREATE TABLE IF NOT EXISTS `tbl_employee2place` (
`id` int(11) unsigned NOT NULL,
  `id_employee` int(11) unsigned NOT NULL,
  `id_place` int(11) unsigned NOT NULL,
  `description` text,
  `day_work` set('sunday','saturday','friday','thursday','wednesday','tuesday','monday') DEFAULT 'sunday,saturday,friday,thursday,wednesday,tuesday,monday',
  `shift_work` varchar(50) DEFAULT NULL COMMENT 'Смена (На какой смене работает работник)',
  `salary_at_hour` int(11) NOT NULL,
  `salary_rate` int(11) NOT NULL,
  `salary_at_shift` int(11) DEFAULT NULL,
  `ts_create` bigint(20) NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `tbl_employee2place`
--

INSERT INTO `tbl_employee2place` (`id`, `id_employee`, `id_place`, `description`, `day_work`, `shift_work`, `salary_at_hour`, `salary_rate`, `salary_at_shift`, `ts_create`, `active`) VALUES
(1, 1, 1, '111', 'sunday,saturday,friday,thursday,wednesday,tuesday,monday', '1', 1, 1, 1, 0, b'1'),
(2, 2, 1, '111', 'sunday,saturday,friday,thursday,wednesday,tuesday,monday', '1', 1, 1, 1, 1, b'1');

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_game`
--

CREATE TABLE IF NOT EXISTS `tbl_game` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'Продолжительность в секундах',
  `description` text,
  `version` varchar(50) DEFAULT NULL,
  `ts_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `tbl_game`
--

INSERT INTO `tbl_game` (`id`, `name`, `duration`, `description`, `version`, `ts_create`, `active`) VALUES
(1, 'Hill', 44, 'dsfsdg', '4', '2015-02-23 06:26:09', b'1');

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_game2place`
--

CREATE TABLE IF NOT EXISTS `tbl_game2place` (
`id` int(11) unsigned NOT NULL,
  `id_game` int(11) unsigned NOT NULL,
  `id_place` int(11) unsigned NOT NULL,
  `cost` int(11) NOT NULL COMMENT 'Стандартная цена которая не входит в плавающую цену',
  `description` text,
  `ts_create` bigint(20) NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_place`
--

CREATE TABLE IF NOT EXISTS `tbl_place` (
`id` int(11) unsigned NOT NULL,
  `id_city` int(11) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `description` text,
  `ts_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `tbl_place`
--

INSERT INTO `tbl_place` (`id`, `id_city`, `name`, `address`, `description`, `ts_create`, `active`) VALUES
(1, 1, 'Town', 'DSfgdfg', 'dsfdsf', '2015-02-23 06:08:37', b'1');

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_play`
--

CREATE TABLE IF NOT EXISTS `tbl_play` (
`id` int(11) unsigned NOT NULL,
  `id_place` int(11) unsigned NOT NULL,
  `id_game` int(11) unsigned NOT NULL,
  `email` varchar(50) NOT NULL,
  `ts_create` bigint(20) NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'Продолжительность воспроизведения видео в секундах'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_session_employee`
--

CREATE TABLE IF NOT EXISTS `tbl_session_employee` (
`id` int(11) unsigned NOT NULL,
  `id_employee` int(11) unsigned NOT NULL,
  `id_place` int(11) unsigned NOT NULL,
  `ts_create` bigint(20) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id` int(10) unsigned NOT NULL,
  `login` varchar(80) NOT NULL COMMENT 'Email строго email',
  `password` text NOT NULL,
  `ts_create` bigint(20) NOT NULL COMMENT 'Время регестрации',
  `ts_last_login` bigint(20) NOT NULL COMMENT 'Последний вход',
  `role` set('moderator','admin','client','guest') NOT NULL DEFAULT 'guest' COMMENT 'Роли пользователей'
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `login`, `password`, `ts_create`, `ts_last_login`, `role`) VALUES
(17, 'molodyko13@gmail.com', '$2a$13$24N/kO0Nbba2gPrVR1hhbuPKJMknXD2N05e9oj9kVS827I3kEFdpq', 1391543452, 1391543452, 'client'),
(87, 'furmanenko@iclaud.com', '$2a$13$SAQ0IxAxd9FEHaIZbhASRuBbjBSFE64ZMgcQPQOCJxNdvYV7OizfK', 1394715961, 1394715961, 'client'),
(88, 'mol@ukr.net', 'muha1990', 1394716093, 1394716093, 'client');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `tbl_city`
--
ALTER TABLE `tbl_city`
 ADD PRIMARY KEY (`id`), ADD KEY `id_country` (`id_country`);

--
-- Індекси таблиці `tbl_cost_float`
--
ALTER TABLE `tbl_cost_float`
 ADD PRIMARY KEY (`id`), ADD KEY `cost_float_game` (`id_game`), ADD KEY `cost_float_place` (`id_place`);

--
-- Індекси таблиці `tbl_country`
--
ALTER TABLE `tbl_country`
 ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tbl_employee`
--
ALTER TABLE `tbl_employee`
 ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tbl_employee2place`
--
ALTER TABLE `tbl_employee2place`
 ADD PRIMARY KEY (`id`), ADD KEY `employee2place_employee` (`id_employee`), ADD KEY `employee2place_place` (`id_place`);

--
-- Індекси таблиці `tbl_game`
--
ALTER TABLE `tbl_game`
 ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tbl_game2place`
--
ALTER TABLE `tbl_game2place`
 ADD PRIMARY KEY (`id`), ADD KEY `game2place_game` (`id_game`), ADD KEY `game2place_place` (`id_place`);

--
-- Індекси таблиці `tbl_place`
--
ALTER TABLE `tbl_place`
 ADD PRIMARY KEY (`id`), ADD KEY `place_city` (`id_city`);

--
-- Індекси таблиці `tbl_play`
--
ALTER TABLE `tbl_play`
 ADD PRIMARY KEY (`id`), ADD KEY `play_place` (`id_place`), ADD KEY `play_game` (`id_game`);

--
-- Індекси таблиці `tbl_session_employee`
--
ALTER TABLE `tbl_session_employee`
 ADD PRIMARY KEY (`id`), ADD KEY `session_employee_employee` (`id_employee`), ADD KEY `session_employee_place` (`id_place`);

--
-- Індекси таблиці `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `tbl_city`
--
ALTER TABLE `tbl_city`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `tbl_cost_float`
--
ALTER TABLE `tbl_cost_float`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `tbl_country`
--
ALTER TABLE `tbl_country`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT для таблиці `tbl_employee`
--
ALTER TABLE `tbl_employee`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблиці `tbl_employee2place`
--
ALTER TABLE `tbl_employee2place`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблиці `tbl_game`
--
ALTER TABLE `tbl_game`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `tbl_game2place`
--
ALTER TABLE `tbl_game2place`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `tbl_place`
--
ALTER TABLE `tbl_place`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `tbl_play`
--
ALTER TABLE `tbl_play`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `tbl_session_employee`
--
ALTER TABLE `tbl_session_employee`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `tbl_city`
--
ALTER TABLE `tbl_city`
ADD CONSTRAINT `city_country` FOREIGN KEY (`id_country`) REFERENCES `tbl_country` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `tbl_cost_float`
--
ALTER TABLE `tbl_cost_float`
ADD CONSTRAINT `cost_float_game` FOREIGN KEY (`id_game`) REFERENCES `tbl_game` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `cost_float_place` FOREIGN KEY (`id_place`) REFERENCES `tbl_place` (`id`) ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `tbl_employee2place`
--
ALTER TABLE `tbl_employee2place`
ADD CONSTRAINT `employee2place_employee` FOREIGN KEY (`id_employee`) REFERENCES `tbl_employee` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `employee2place_place` FOREIGN KEY (`id_place`) REFERENCES `tbl_place` (`id`) ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `tbl_game2place`
--
ALTER TABLE `tbl_game2place`
ADD CONSTRAINT `game2place_game` FOREIGN KEY (`id_game`) REFERENCES `tbl_game` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `game2place_place` FOREIGN KEY (`id_place`) REFERENCES `tbl_place` (`id`) ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `tbl_place`
--
ALTER TABLE `tbl_place`
ADD CONSTRAINT `place_city` FOREIGN KEY (`id_city`) REFERENCES `tbl_city` (`id`) ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `tbl_play`
--
ALTER TABLE `tbl_play`
ADD CONSTRAINT `play_game` FOREIGN KEY (`id_game`) REFERENCES `tbl_game` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `play_place` FOREIGN KEY (`id_place`) REFERENCES `tbl_place` (`id`) ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `tbl_session_employee`
--
ALTER TABLE `tbl_session_employee`
ADD CONSTRAINT `session_employee_employee` FOREIGN KEY (`id_employee`) REFERENCES `tbl_employee` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `session_employee_place` FOREIGN KEY (`id_place`) REFERENCES `tbl_place` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
