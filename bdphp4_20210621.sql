-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2021 a las 21:18:15
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdphp4_20210621`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_galeria`
--

CREATE TABLE `tbl_galeria` (
  `id` int(11) NOT NULL,
  `nombre_archivo` text DEFAULT NULL,
  `nombre` text DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_galeria`
--

INSERT INTO `tbl_galeria` (`id`, `nombre_archivo`, `nombre`, `comentario`, `fecha`, `hora`) VALUES
(1, 'galeria/1.jpg', 'Medanos de Coro', 'Grupo de amigos en los Medanos de Coro.', '2021-06-25', '14:56:20'),
(2, 'galeria/2.jpg', 'Salto Angel', 'Visita al Salto Angel en Diciembre del año pasado.', '2021-06-25', '14:57:14'),
(3, 'galeria/3.jpg', 'Los Roques', 'Vista aérea de los Roques', '2021-06-25', '14:58:03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_galeria`
--
ALTER TABLE `tbl_galeria`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_galeria`
--
ALTER TABLE `tbl_galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
