-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 17 2019 г., 23:58
-- Версия сервера: 10.4.8-MariaDB
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `webinse_bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `people_table`
--

CREATE TABLE `people_table` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `people_table`
--

INSERT INTO `people_table` (`id`, `first_name`, `last_name`, `email`) VALUES
(102, 'Дмитрий', 'Лаврентьев', 'dave@gmail.com'),
(96, 'Денис', 'Захаренко', 'xakhar@gmail.com'),
(98, 'Serg', 'Baklanov', 'serg@mail.ru'),
(99, 'Anton', 'Golovaha', 'golova@gmail.com'),
(100, 'Olga', 'Zukova', 'zuuk@i.ua'),
(101, 'Ivan', 'Ivanov', 'ivan@mail.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `people_table`
--
ALTER TABLE `people_table`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `people_table`
--
ALTER TABLE `people_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
