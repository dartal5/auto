-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 17 2018 г., 11:21
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `auto`
--

-- --------------------------------------------------------

--
-- Структура таблицы `baseprice`
--

CREATE TABLE `baseprice` (
  `id` int(11) UNSIGNED NOT NULL,
  `coeff` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `baseprice`
--

INSERT INTO `baseprice` (`id`, `coeff`) VALUES
(1, 400);

-- --------------------------------------------------------

--
-- Структура таблицы `car`
--

CREATE TABLE `car` (
  `id` int(11) UNSIGNED NOT NULL,
  `make` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `class_id` int(11) UNSIGNED DEFAULT NULL,
  `transmission_id` int(11) UNSIGNED DEFAULT NULL,
  `type_id` int(11) UNSIGNED DEFAULT NULL,
  `fuel_id` int(11) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT NULL,
  `info` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `pic` varchar(256) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `car`
--

INSERT INTO `car` (`id`, `make`, `model`, `class_id`, `transmission_id`, `type_id`, `fuel_id`, `status`, `info`, `pic`) VALUES
(1, 'Nissan', 'Almera', 3, 2, 4, 2, 1, 'Good car with good wheels', 'pic1'),
(2, 'БМВ', '7', 4, 1, 4, 1, 1, 'Тру тачила', 'pic2');

-- --------------------------------------------------------

--
-- Структура таблицы `car_client`
--

CREATE TABLE `car_client` (
  `id` int(11) NOT NULL,
  `client_id` int(11) UNSIGNED DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `car_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `car_client`
--

INSERT INTO `car_client` (`id`, `client_id`, `from_date`, `to_date`, `car_id`) VALUES
(1, 1, '2018-06-10', '2018-06-17', 1),
(2, 1, '2018-06-10', '2018-06-17', 1),
(3, 1, '2018-06-10', '2018-06-17', 1),
(4, 1, '2018-06-10', '2018-06-17', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `class`
--

CREATE TABLE `class` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `coeff` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `class`
--

INSERT INTO `class` (`id`, `type`, `coeff`) VALUES
(1, 'econom', 1),
(2, 'standart', 1.5),
(3, 'business', 2),
(4, 'luxe', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `surname` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `exp` int(11) DEFAULT NULL,
  `expna` int(11) DEFAULT NULL,
  `category` varchar(3) DEFAULT NULL,
  `pass` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id`, `name`, `surname`, `email`, `exp`, `expna`, `category`, `pass`) VALUES
(1, 'Alexon', 'Hueslav', 'aabc@gmail.com', 3, 1, 'B', ''),
(2, 'alex', 'lebovski', 'abcdefg@gmail.com', 3, 2, 'B', '0d489f383fceaa36d49c7318b2c95fb231484e31');

-- --------------------------------------------------------

--
-- Структура таблицы `fuel`
--

CREATE TABLE `fuel` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `fuel`
--

INSERT INTO `fuel` (`id`, `type`) VALUES
(1, 'hybrid'),
(2, 'petrol'),
(3, 'diesel');

-- --------------------------------------------------------

--
-- Структура таблицы `transmission`
--

CREATE TABLE `transmission` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `coeff` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `transmission`
--

INSERT INTO `transmission` (`id`, `type`, `coeff`) VALUES
(1, 'mech', 1.2),
(2, 'auto', 1.6);

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE `type` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `coeff` double DEFAULT NULL,
  `seats` smallint(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `type`, `coeff`, `seats`) VALUES
(1, 'trailer', 1, 7),
(2, 'hatchback', 1.5, 4),
(3, 'universal', 1.6, 4),
(4, 'sedan', 1.7, 4),
(5, 'cab', 2, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `baseprice`
--
ALTER TABLE `baseprice`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_car_class` (`class_id`),
  ADD KEY `index_foreignkey_car_transmission` (`transmission_id`),
  ADD KEY `index_foreignkey_car_type` (`type_id`),
  ADD KEY `index_foreignkey_car_fuel` (`fuel_id`);

--
-- Индексы таблицы `car_client`
--
ALTER TABLE `car_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_car_client_client` (`client_id`) USING BTREE,
  ADD KEY `index_foreignkey_car_client_car` (`car_id`) USING BTREE;

--
-- Индексы таблицы `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `transmission`
--
ALTER TABLE `transmission`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `baseprice`
--
ALTER TABLE `baseprice`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `car_client`
--
ALTER TABLE `car_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `fuel`
--
ALTER TABLE `fuel`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `transmission`
--
ALTER TABLE `transmission`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `c_fk_car_class_id` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_car_fuel_id` FOREIGN KEY (`fuel_id`) REFERENCES `fuel` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_car_transmission_id` FOREIGN KEY (`transmission_id`) REFERENCES `transmission` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_car_type_id` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Ограничения внешнего ключа таблицы `car_client`
--
ALTER TABLE `car_client`
  ADD CONSTRAINT `c_fk_car_client_car_id` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_car_client_client_id` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
