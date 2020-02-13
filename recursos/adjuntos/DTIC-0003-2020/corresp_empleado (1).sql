-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2020 a las 20:19:59
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
-- Base de datos: `pruebasconexion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corresp_empleado`
--

CREATE TABLE `corresp_empleado` (
  `id_empleado` varchar(200) NOT NULL,
  `id_persona_empleado` int(11) NOT NULL,
  `id_rol_empleado` int(11) NOT NULL,
  `id_departamento_empleado` varchar(100) NOT NULL,
  `status` char(1) DEFAULT 'A',
  `fecha_ingreso` date NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `ID_AD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `corresp_empleado`
--

INSERT INTO `corresp_empleado` (`id_empleado`, `id_persona_empleado`, `id_rol_empleado`, `id_departamento_empleado`, `status`, `fecha_ingreso`, `ultimo_login`, `ID_AD`) VALUES
('cuatro', 7, 5, 'RRHH', 'A', '2015-11-11', '2020-01-07 00:00:00', ''),
('Eemp2', 2, 69, 'TIC', 'A', '2015-11-03', '2020-02-06 05:55:29', '2'),
('emp1', 1, 3, 'TIC', 'A', '2017-11-04', '2020-02-06 07:40:57', '80828488-9fc9-4e7f-badd-3c1a09a1cf21'),
('uno', 4, 5, 'TIC', 'A', '2015-11-11', '2020-01-07 00:00:00', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `corresp_empleado`
--
ALTER TABLE `corresp_empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_persona_empleado` (`id_persona_empleado`),
  ADD KEY `id_rol_empleado` (`id_rol_empleado`),
  ADD KEY `id_departamento_empleado` (`id_departamento_empleado`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
