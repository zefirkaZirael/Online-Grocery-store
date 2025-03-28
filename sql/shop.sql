-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 13 2020 г., 10:53
-- Версия сервера: 10.1.36-MariaDB
-- Версия PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accounts`
--

CREATE TABLE `accounts` (
  `Last_Name` varchar(15) NOT NULL,
  `First_Name` varchar(15) NOT NULL,
  `Login` varchar(20) NOT NULL,
  `Password` varchar(8) NOT NULL,
  `Telephone_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `accounts`
--

INSERT INTO `accounts` (`Last_Name`, `First_Name`, `Login`, `Password`, `Telephone_number`) VALUES
('ZHANIBEK', 'Arman', 'abil@mail.ru', '1233', '7474459792'),
('Rakhimov', 'Mansur', 'gromm.52.73@mail.ru', '1478', '7474459792'),
('Body', 'Some', 'som1ebody@mail.ru', '1236', '7474599825'),
('Rakhimov', 'Mansur', 'somebody@mail.ru', '1478', '7473269845'),
('musanova', 'zhanerke', 'zhanik@mail.ru', '12345', '7474459792');

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE `chat` (
  `id` int(3) NOT NULL,
  `user` varchar(30) NOT NULL,
  `comments` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `chat`
--

INSERT INTO `chat` (`id`, `user`, `comments`, `date`) VALUES
(1, 'gromm.52.73@mail.ru', 'Hello', '2020-01-12 14:21:22');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(1) NOT NULL,
  `User` varchar(20) NOT NULL,
  `Item_ID` int(2) NOT NULL,
  `Quantity` int(1) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`Order_ID`, `User`, `Item_ID`, `Quantity`, `Date`) VALUES
(10, 'gromm.52.73@mail.ru', 1, 10, '2020-01-01');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `Product_ID` int(2) NOT NULL,
  `Item` varchar(15) NOT NULL,
  `In_stock` int(4) NOT NULL,
  `Price` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`Product_ID`, `Item`, `In_stock`, `Price`) VALUES
(1, 'Milk', 45, 20),
(3, 'Cola 1L', 25, 250),
(6, 'Cola 2L', 550, 350);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Login`);

--
-- Индексы таблицы `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Travel_ID` (`Item_ID`),
  ADD KEY `User` (`User`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`Item_ID`) REFERENCES `products` (`Product_ID`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`User`) REFERENCES `accounts` (`Login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
