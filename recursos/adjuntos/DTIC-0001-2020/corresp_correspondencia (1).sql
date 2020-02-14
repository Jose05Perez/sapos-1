-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2019 a las 14:54:40
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `correspondencia_bnphu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corresp_correspondencia`
--

CREATE TABLE `corresp_correspondencia` (
  `id_correspondencia` varchar(200) NOT NULL,
  `id_persona_emisor` int(11) NOT NULL,
  `id_persona_receptor` int(11) NOT NULL,
  `fecha_emision` date NOT NULL,
  `fecha_recibido` date DEFAULT NULL,
  `asunto` varchar(100) NOT NULL,
  `autorizado` bit(1) NOT NULL DEFAULT b'0',
  `caracter` char(2) NOT NULL DEFAULT 'co',
  `descripcion` text NOT NULL,
  `privado` bit(1) NOT NULL DEFAULT b'1',
  `estado` char(2) NOT NULL DEFAULT 'pe'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `corresp_correspondencia`
--
ALTER TABLE `corresp_correspondencia`
  ADD PRIMARY KEY (`id_correspondencia`),
  ADD KEY `id_persona_emisor` (`id_persona_emisor`),
  ADD KEY `corresp_persona` (`id_persona_receptor`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `corresp_correspondencia`
--
ALTER TABLE `corresp_correspondencia`
  ADD CONSTRAINT `corresp_correspondencia_ibfk_1` FOREIGN KEY (`id_persona_emisor`) REFERENCES `corresp_persona` (`id_persona`),
  ADD CONSTRAINT `corresp_persona` FOREIGN KEY (`id_persona_receptor`) REFERENCES `corresp_persona` (`id_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
