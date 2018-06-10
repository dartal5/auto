-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 10 2018 г., 19:59
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
  `pic` varchar(256) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `car`
--

INSERT INTO `car` (`id`, `make`, `model`, `class_id`, `transmission_id`, `type_id`, `fuel_id`, `status`, `info`, `pic`) VALUES
(1, 'Nissan', 'Almera', 3, 2, 4, 2, 0, 'Good car with good wheels', 'url');

-- --------------------------------------------------------

--
-- Структура таблицы `car_client`
--

CREATE TABLE `car_client` (
  `name` varchar(128) NOT NULL,
  `surname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `exp` int(11) NOT NULL,
  `expna` int(11) NOT NULL,
  `category` varchar(128) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `car_client`
--

INSERT INTO `car_client` (`name`, `surname`, `email`, `exp`, `expna`, `category`, `from_date`, `to_date`, `id`) VALUES
('Alex', 'darkstalker', 'abc@abc.com', 3, 2, 'B', '2018-06-10', '2018-06-17', 1),
('Alex', 'darkstalker', 'abc@abc.com', 3, 2, 'B', '2018-06-10', '2018-06-17', 2),
('Alex', 'darkstalker', 'abc@abc.com', 3, 2, 'B', '2018-06-10', '2018-06-17', 3),
('Alex', 'darkstalker', 'abc@abc.com', 3, 2, 'B', '2018-06-10', '2018-06-17', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `class`
--

CREATE TABLE `class` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `coeff` double NOT NULL
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
  `seats_from` smallint(191) DEFAULT NULL,
  `seats_to` smallint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `type`, `coeff`, `seats_from`, `seats_to`) VALUES
(1, 'trailer', 1, 7, 9),
(2, 'hatchback', 1.5, 4, 5),
(3, 'universal', 1.6, 4, 5),
(4, 'sedan', 1.7, 4, 6),
(5, 'cab', 2, 2, 3);

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
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `class`
--
ALTER TABLE `class`
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `car_client`
--
ALTER TABLE `car_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
