-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 10 2020 г., 14:56
-- Версия сервера: 10.3.13-MariaDB-log
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
-- База данных: `crud`
--

-- --------------------------------------------------------

--
-- Структура таблицы `xxx_article`
--

CREATE TABLE `xxx_article` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` date DEFAULT NULL,
  `active` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `xxx_article`
--

INSERT INTO `xxx_article` (`id`, `url`, `title`, `text`, `date`, `active`) VALUES
(1, 'sozdanie--prilojhenij', 'Создание GUI-приложений', 'PHP не ориентирован на создание приложений, но есть потребность в создании интерфейсов для настройки серверов, беспрерывного выполнения, отладки скриптов (сценариев), управления локальными и тестовыми серверами, и т.п. Из-за этого и возникли решения данной проблемы.', '2020-05-22', '1'),
(2, 'spravochnik-yazyka', 'Справочник языка', 'Закрывающий тег PHP-блока в конце файла не является обязательным, и в некоторых случаях его опускание довольно полезно, например, при использовании include или require, так, что нежелательные пробелы не останутся в конце файла и вы все еще сможете добавить', '2020-01-21', '1'),
(3, 'znakomstvo-s-generatorami', 'Знакомство с генераторами', 'Закрывающий тег PHP-блока в конце файла не является обязательным, и в некоторых случаях его опускание довольно полезно, например, при использовании include или require, так, что нежелательные пробелы не останутся в конце файла и вы все еще сможете добавить', '2019-12-11', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `xxx_author`
--

CREATE TABLE `xxx_author` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(150) NOT NULL,
  `sname` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `xxx_author`
--

INSERT INTO `xxx_author` (`id`, `fname`, `sname`, `email`) VALUES
(1, 'Коля', 'Пупкин', 'koly@mail.ru'),
(2, 'Вася', 'Зайцев', 'zaizev@yandex.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `xxx_relation`
--

CREATE TABLE `xxx_relation` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) NOT NULL,
  `article_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `xxx_relation`
--

INSERT INTO `xxx_relation` (`id`, `author_id`, `article_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `xxx_article`
--
ALTER TABLE `xxx_article`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `xxx_author`
--
ALTER TABLE `xxx_author`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `xxx_relation`
--
ALTER TABLE `xxx_relation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `xxx_article`
--
ALTER TABLE `xxx_article`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `xxx_author`
--
ALTER TABLE `xxx_author`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `xxx_relation`
--
ALTER TABLE `xxx_relation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
