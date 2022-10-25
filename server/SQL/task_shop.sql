-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 25 2022 г., 11:30
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `task_shop`
--
CREATE DATABASE IF NOT EXISTS task_shop;
USE task_shop;
-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Рубашки Medicine', 'no desc'),
(2, 'Все модели Medicine', 'no desc'),
(3, 'Рубашки', 'no desc'),
(4, 'Штаны', 'Штаны, да'),
(5, 'Платья', 'товаров тут точно нет');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `year` int(4) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `theme` varchar(45) NOT NULL,
  `message` text NOT NULL,
  `checked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `year`, `gender`, `theme`, `message`, `checked`) VALUES
(1, 's', 'test@gmail.com', 2222, 'awadwa', 'awdawdaw', 'dawdawdawdad', 1),
(2, 'Роман', 'romankotovv@gmail.com', 2002, 'male', '&lt;h1&gt;123&lt;/h1&gt;', 'awdawd', 1),
(3, 'Роман', 'romankotovv@gmail.com', 2002, 'male', 'awdawd', ', checked = 0', 1),
(4, 'Роман', 'romankotovv@gmail.com', 2002, 'male', '&lt;h1&gt;123&lt;/h1&gt;', 'awc, checked =&#039;1', 1),
(5, '123', 'romankotovv@gmail.com', 2021, 'male', '&lt;h1&gt;123&lt;/h1&gt;', 'awda', 1),
(6, '123', 'res7ov@gmail.com', 2018, 'male', 'awd', 'wad', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `ref` text NOT NULL,
  `alt` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `ref`, `alt`) VALUES
(1, 'v4Dpg8e48.jpg', 'Фото рубашки'),
(2, 'awdsss8.jpg\r\n', 'Фото рубашки с другого ракурса'),
(3, 'asd.jpg\r\n', 'Фото штанов'),
(4, '2.png', 'Фото рубашки с другого ракурса 2'),
(5, '3.png', 'Фото рубашки с другого ракурса 3');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `price` decimal(19,2) NOT NULL,
  `price_no_discount` decimal(19,2) NOT NULL,
  `price_promo` decimal(19,2) NOT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `price_no_discount`, `price_promo`, `description`, `quantity`) VALUES
(1, 'Рубашка Medicine', '2499.00', '2699.00', '2227.00', 'Рубашка выполнена...', 0),
(2, 'Рубашка Medicine 2', '2500.00', '2699.00', '2227.00', 'Рубашка выполнена...', 100),
(3, 'Рубашка Medicine 4', '2500.00', '2699.00', '2227.00', 'Рубашка выполнена...', 100),
(4, 'Рубашка Medicine 5', '2500.00', '2699.00', '2227.00', 'Рубашка выполнена...', 100),
(5, 'Рубашка Medicine 6', '2500.00', '2699.00', '2227.00', 'Рубашка выполнена...', 100),
(11, 'Рубашка Medicine 9', '2499.00', '2699.00', '2227.00', 'Рубашка выполнена...', 100),
(12, 'Рубашка Medicine 2111', '2500.00', '2699.00', '2227.00', 'Рубашка выполнена...', 100),
(13, 'Рубашка Medicine test', '2500.00', '2699.00', '2227.00', 'Рубашка выполнена...', 100),
(14, 'Рубашка Medicine22', '2500.00', '2699.00', '2227.00', 'Рубашка выполнена...', 100),
(15, 'Рубашка Medicine 15', '2500.00', '2699.00', '2227.00', 'Рубашка выполнена...', 100),
(16, 'Рубашка Medicine 100', '2499.00', '2699.00', '2227.00', 'Рубашка выполнена...', 100),
(17, 'Рубашка Medicine 101', '2499.00', '2699.00', '2227.00', 'Рубашка выполнена...', 100),
(18, 'Рубашка Medicine 102', '2499.00', '2699.00', '2227.00', 'Рубашка выполнена...', 100),
(19, 'Рубашка Medicine 103', '2499.00', '2699.00', '2227.00', 'Рубашка выполнена...', 100),
(20, 'Рубашка Medicine 104', '2499.00', '2699.00', '2227.00', 'Рубашка выполнена...', 100),
(21, 'Штаны Medicine', '1000.00', '2000.00', '600.00', 'Самые дешевые штаны на планете', 100);

-- --------------------------------------------------------

--
-- Структура таблицы `product_categories`
--

CREATE TABLE `product_categories` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product_categories`
--

INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(1, 1),
(1, 2),
(5, 1),
(5, 2),
(21, 2),
(11, 2),
(11, 1),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `product_images`
--

CREATE TABLE `product_images` (
  `product_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product_images`
--

INSERT INTO `product_images` (`product_id`, `image_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `product_main_categories`
--

CREATE TABLE `product_main_categories` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product_main_categories`
--

INSERT INTO `product_main_categories` (`product_id`, `category_id`) VALUES
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `product_main_images`
--

CREATE TABLE `product_main_images` (
  `product_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product_main_images`
--

INSERT INTO `product_main_images` (`product_id`, `image_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ref` (`ref`) USING HASH;

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Индексы таблицы `product_categories`
--
ALTER TABLE `product_categories`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `product_images`
--
ALTER TABLE `product_images`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Индексы таблицы `product_main_categories`
--
ALTER TABLE `product_main_categories`
  ADD UNIQUE KEY `product_id` (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `product_main_images`
--
ALTER TABLE `product_main_images`
  ADD UNIQUE KEY `product_id` (`product_id`),
  ADD KEY `image_id` (`image_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_images_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);

--
-- Ограничения внешнего ключа таблицы `product_main_categories`
--
ALTER TABLE `product_main_categories`
  ADD CONSTRAINT `product_main_categories_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_main_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `product_main_images`
--
ALTER TABLE `product_main_images`
  ADD CONSTRAINT `product_main_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_main_images_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
