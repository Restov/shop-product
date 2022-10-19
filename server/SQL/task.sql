-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 19 2022 г., 10:59
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
-- База данных: `task`
--

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
(4, 'Штаны', 'Штаны, да');

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
(1, '../static/v4Dpg8e48.jpg', 'Фото рубашки');

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
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `price_no_discount`, `price_promo`, `description`) VALUES
(1, 'Рубашка Medicine', '2499.00', '2699.00', '2227.00', 'Рубашка выполнена...'),
(2, 'Рубашка Medicine 2', '2500.00', '2699.00', '2227.00', 'Рубашка выполнена...'),
(3, 'Рубашка Medicine 4', '2500.00', '2699.00', '2227.00', 'Рубашка выполнена...'),
(4, 'Рубашка Medicine 5', '2500.00', '2699.00', '2227.00', 'Рубашка выполнена...'),
(5, 'Рубашка Medicine 6', '2500.00', '2699.00', '2227.00', 'Рубашка выполнена...'),
(11, 'Рубашка Medicine 9', '2499.00', '2699.00', '2227.00', 'Рубашка выполнена...'),
(12, 'Рубашка Medicine 2111', '2500.00', '2699.00', '2227.00', 'Рубашка выполнена...'),
(13, 'Рубашка Medicine test', '2500.00', '2699.00', '2227.00', 'Рубашка выполнена...'),
(14, 'Рубашка Medicine22', '2500.00', '2699.00', '2227.00', 'Рубашка выполнена...'),
(15, 'Рубашка Medicine 15', '2500.00', '2699.00', '2227.00', 'Рубашка выполнена...'),
(16, 'Рубашка Medicine 100', '2499.00', '2699.00', '2227.00', 'Рубашка выполнена...'),
(17, 'Рубашка Medicine 101', '2499.00', '2699.00', '2227.00', 'Рубашка выполнена...'),
(18, 'Рубашка Medicine 102', '2499.00', '2699.00', '2227.00', 'Рубашка выполнена...'),
(19, 'Рубашка Medicine 103', '2499.00', '2699.00', '2227.00', 'Рубашка выполнена...'),
(20, 'Рубашка Medicine 104', '2499.00', '2699.00', '2227.00', 'Рубашка выполнена...'),
(21, 'Штаны Medicine', '1000.00', '2000.00', '600.00', 'Самые дешевые штаны на планете');

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
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(1, 1),
(1, 2),
(1, 3),
(5, 1),
(5, 2),
(5, 3),
(21, 4),
(21, 2);

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
(1, 1);

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
(4, 3),
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
(1, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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