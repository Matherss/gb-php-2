-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 19 2022 г., 14:21
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gb_php_online_store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `good_id` int NOT NULL,
  `count` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `good_id`, `count`, `user_id`) VALUES
(26, 7, 1, 1),
(27, 6, 2, 1),
(28, 7, 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int NOT NULL,
  `title` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `info` text COLLATE utf8mb4_general_ci NOT NULL,
  `img` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `price`, `info`, `img`) VALUES
(6, 'first', 1115, '111info1235125', '2.jpeg'),
(7, 'second', 200, 'info2002', '1.jpeg');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `status` text COLLATE utf8mb4_general_ci NOT NULL,
  `sum` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `sum`) VALUES
(2, 1, 'Active', 2430),
(3, 3, 'Active', 200);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `user_name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `text` text COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `user_name`, `text`, `date`) VALUES
(6, 'илья', 'тестирую 2', '2022-04-08 15:44:31'),
(7, 'илья', 'тестирую 2', '2022-04-08 15:44:38'),
(8, 'Тест', 'проверка', '2022-04-08 19:38:22');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_login` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `user_last_action` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `user_name`, `user_login`, `user_password`, `user_last_action`, `is_admin`) VALUES
(1, 'admin', 'admin', '202cb962ac59075b964b07152d234b70', '2022-04-12 10:31:08', 1),
(4, 'user2', 'user2', '7e58d63b60197ceb55a1c487989a3720', '2022-04-19 09:20:08', 0),
(5, 'ilya', 'ilya1996', '9c52a453bb18017ea0ea09246867a252', '2022-05-19 10:42:37', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_login` (`user_login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
