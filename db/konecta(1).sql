-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2020 a las 21:37:02
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `konecta`
--
CREATE DATABASE IF NOT EXISTS `konecta` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `konecta`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `referencia` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` int(20) NOT NULL,
  `peso` int(20) NOT NULL,
  `categoria` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `stock` int(20) NOT NULL,
  `fechaCreacion` date DEFAULT current_timestamp(),
  `fechaUltimaVenta` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `referencia`, `precio`, `peso`, `categoria`, `stock`, `fechaCreacion`, `fechaUltimaVenta`) VALUES
(1, 'Producto Especial', '001', 1000, 100, 'producto', 2, '0000-00-00', NULL),
(2, 'Producto Especial 2', '001', 1000, 100, 'producto', 12, '0000-00-00', NULL),
(3, 'Producto Especial', '001', 1000, 100, 'producto', 2, '0000-00-00', NULL),
(4, 'Producto Especial 2', '001', 1000, 100, 'producto', 12, '0000-00-00', NULL),
(6, 'Producto Especial 4', '001', 10000, 1000, 'producto', 120, '0000-00-00', NULL),
(7, 'producto insertado 2', '0045', 2600, 7000, '5000', 4000, '2020-05-22', NULL),
(8, 'producto insertado 2', '0045', 2600, 7000, '5000', 4000, '2020-05-22', NULL),
(9, 'producto insertado 3', '0046', 2601, 7000, '5000', 4000, '2020-05-22', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(20) NOT NULL,
  `id_producto` int(20) NOT NULL,
  `valor` int(20) NOT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
