-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql
-- Temps de generació: 28-09-2020 a les 06:15:46
-- Versió del servidor: 8.0.21
-- Versió de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `goldenShop`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user` int NOT NULL,
  `address` varchar(100) NOT NULL,
  `payment` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `orders_line`
--

CREATE TABLE `orders_line` (
  `idOrder` int NOT NULL,
  `idProduct` varchar(20) NOT NULL,
  `quantity` int NOT NULL,
  `preu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `products`
--

CREATE TABLE `products` (
  `codi` varchar(20) NOT NULL,
  `metal` varchar(10) NOT NULL,
  `format` varchar(5) NOT NULL,
  `quantity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcament de dades per a la taula `products`
--

INSERT INTO `products` (`codi`, `metal`, `format`, `quantity`) VALUES
('0_5coinGold', 'Gold', 'Coin', 0.5),
('1000BarSilver', 'Silver', 'Bar', 1000),
('100BarGold', 'Gold', 'Bar', 100),
('1CoinGold', 'Gold', 'Coin', 1),
('1CoinSilver', 'Silver', 'Coin', 1),
('500BarGold', 'Gold', 'Bar', 500),
('500BarPlatinum', 'Platinum', 'Bar', 500),
('500BarSilver', 'Silver', 'Bar', 500);

-- --------------------------------------------------------

--
-- Estructura de la taula `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `address` varchar(60) NOT NULL,
  `postalCode` varchar(5) NOT NULL,
  `city` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Índexs per a la taula `orders_line`
--
ALTER TABLE `orders_line`
  ADD PRIMARY KEY (`idOrder`,`idProduct`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Índexs per a la taula `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`codi`);

--
-- Índexs per a la taula `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Restriccions per a la taula `orders_line`
--
ALTER TABLE `orders_line`
  ADD CONSTRAINT `orders_line_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_line_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `products` (`codi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
