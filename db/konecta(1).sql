-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2020 a las 18:21:51
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
(10, 'producto insertado 92', '0046', 2601, 7000, '5000', 4000, '2020-05-23', NULL),
(11, 'producto insertado 93', '0046', 2601, 7000, '5000', 4000, '2020-05-23', NULL),
(12, 'producto insertado 94', '0046', 2601, 7000, '5000', 4000, '2020-05-23', NULL),
(13, 'producto insertado 94', '0046', 2601, 7000, '5000', 4000, '2020-05-23', NULL),
(14, 'producto insertado 95', '0046', 2601, 7000, '5000', 4000, '2020-05-24', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `identificacion` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(20) NOT NULL,
  `fechaCreacion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `identificacion`, `mail`, `usuario`, `contrasena`, `estado`, `fechaCreacion`) VALUES
(2, 'Nombre', '1075077588', 'sebastian@gmail.com', 'sebastian', 'password2020', 1, '2020-05-22 14:01:08');

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
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
