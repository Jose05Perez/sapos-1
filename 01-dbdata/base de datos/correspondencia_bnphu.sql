-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2019 a las 14:57:09
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


--
-- Estructura de tabla para la tabla `corresp_empleado`
--

ALTER TABLE `corresp_empleado` (
  `id_empleado` varchar(200) NOT NULL,
  `id_persona_empleado` int(11) NOT NULL,
  `id_rol_empleado` int(11) NOT NULL,
  `id_departamento_empleado` varchar(100) NOT NULL,
  `status` char(1) DEFAULT 'A',
  `fecha_ingreso` date NOT NULL,
  `ultimo_login` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `corresp_persona`
--
ALTER TABLE `corresp_persona` (
  `id_persona` int(11) NOT NULL,
  `cedula_persona` char(11) NOT NULL,
  `nombre_persona` text NOT NULL,
  `apellido_persona` text NOT NULL,
  `sexo_persona` char(1) NOT NULL,
  `fecha_nacimiento_persona` date NOT NULL,
  `status_persona` tinyint(4) DEFAULT 1,
  `id_institucion_persona` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

(
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
-- Indices de la tabla `corresp_departamento`
--
ALTER TABLE `corresp_departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `corresp_documentos`
--
ALTER TABLE `corresp_documentos`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `id_correspondencia_documento` (`id_correspondencia_documento`);

--
-- Indices de la tabla `corresp_empleado`
--
ALTER TABLE `corresp_empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `id_persona_empleado` (`id_persona_empleado`),
  ADD KEY `id_rol_empleado` (`id_rol_empleado`),
  ADD KEY `id_departamento_empleado` (`id_departamento_empleado`);

--
-- Indices de la tabla `corresp_institucion`
--
ALTER TABLE `corresp_institucion`
  ADD PRIMARY KEY (`id_institucion`);

--
-- Indices de la tabla `corresp_persona`
--
ALTER TABLE `corresp_persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `id_institucion_persona` (`id_institucion_persona`);

--
-- Indices de la tabla `corresp_rol`
--
ALTER TABLE `corresp_rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `corresp_sede`
--
ALTER TABLE `corresp_sede`
  ADD PRIMARY KEY (`id_sede`),
  ADD KEY `id_institucion_sede` (`id_institucion_sede`),
  ADD KEY `id_ubicacion_sede` (`id_ubicacion_sede`);

--
-- Indices de la tabla `corresp_ubicacion`
--
ALTER TABLE `corresp_ubicacion`
  ADD PRIMARY KEY (`id_ubicacion`),
  ADD UNIQUE KEY `idx_descripcion` (`id_ubicacion`,`descripcion`(300)),
  ADD UNIQUE KEY `idx_descripcion_corresp_ubicacion` (`id_ubicacion`,`descripcion`(300));

--
-- Indices de la tabla `isadg_entidades`
--
ALTER TABLE `isadg_entidades`
  ADD PRIMARY KEY (`codigo_referencia`),
  ADD KEY `codigo_referencia_id_documento` (`codigo_referencia_id_documento`);

--
-- Indices de la tabla `isadg_fondo`
--
ALTER TABLE `isadg_fondo`
  ADD PRIMARY KEY (`id_fondo`),
  ADD KEY `codigo_referencia_fondo` (`codigo_referencia_fondo`);

--
-- Indices de la tabla `isadg_secciones`
--
ALTER TABLE `isadg_secciones`
  ADD PRIMARY KEY (`id_seccion`),
  ADD KEY `codigo_referencia_seccion` (`codigo_referencia_seccion`);

--
-- Indices de la tabla `isadg_series`
--
ALTER TABLE `isadg_series`
  ADD PRIMARY KEY (`id_serie`),
  ADD KEY `codigo_referencia_serie` (`codigo_referencia_serie`);

--
-- Indices de la tabla `isadg_unidad_descripcion`
--
ALTER TABLE `isadg_unidad_descripcion`
  ADD PRIMARY KEY (`id_unidad_descripcion`),
  ADD KEY `codigo_referencia_unidad_descripcion` (`codigo_referencia_unidad_descripcion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `corresp_institucion`
--
ALTER TABLE `corresp_institucion`
  MODIFY `id_institucion` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT de la tabla `corresp_persona`
--
ALTER TABLE `corresp_persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `corresp_rol`
--
ALTER TABLE `corresp_rol`
  MODIFY `id_rol` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `corresp_sede`
--
ALTER TABLE `corresp_sede`
  MODIFY `id_sede` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `corresp_ubicacion`
--
ALTER TABLE `corresp_ubicacion`
  MODIFY `id_ubicacion` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5110;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `corresp_correspondencia`
--
ALTER TABLE `corresp_correspondencia`
  ADD CONSTRAINT `corresp_correspondencia_ibfk_1` FOREIGN KEY (`id_persona_emisor`) REFERENCES `corresp_persona` (`id_persona`),
  ADD CONSTRAINT `corresp_persona` FOREIGN KEY (`id_persona_receptor`) REFERENCES `corresp_persona` (`id_persona`);

--
-- Filtros para la tabla `corresp_documentos`
--
ALTER TABLE `corresp_documentos`
  ADD CONSTRAINT `corresp_documentos_ibfk_1` FOREIGN KEY (`id_correspondencia_documento`) REFERENCES `corresp_correspondencia` (`id_correspondencia`);

--
-- Filtros para la tabla `corresp_empleado`
--
ALTER TABLE `corresp_empleado`
  ADD CONSTRAINT `corresp_empleado_ibfk_1` FOREIGN KEY (`id_persona_empleado`) REFERENCES `corresp_persona` (`id_persona`),
  ADD CONSTRAINT `corresp_empleado_ibfk_2` FOREIGN KEY (`id_rol_empleado`) REFERENCES `corresp_rol` (`id_rol`),
  ADD CONSTRAINT `corresp_empleado_ibfk_3` FOREIGN KEY (`id_departamento_empleado`) REFERENCES `corresp_departamento` (`id_departamento`);

--
-- Filtros para la tabla `corresp_persona`
--
ALTER TABLE `corresp_persona`
  ADD CONSTRAINT `corresp_persona_ibfk_1` FOREIGN KEY (`id_institucion_persona`) REFERENCES `corresp_institucion` (`id_institucion`);

--
-- Filtros para la tabla `corresp_sede`
--
ALTER TABLE `corresp_sede`
  ADD CONSTRAINT `corresp_sede_ibfk_1` FOREIGN KEY (`id_institucion_sede`) REFERENCES `corresp_institucion` (`id_institucion`),
  ADD CONSTRAINT `corresp_sede_ibfk_2` FOREIGN KEY (`id_ubicacion_sede`) REFERENCES `corresp_ubicacion` (`id_ubicacion`);

--
-- Filtros para la tabla `isadg_entidades`
--
ALTER TABLE `isadg_entidades`
  ADD CONSTRAINT `isadg_entidades_ibfk_1` FOREIGN KEY (`codigo_referencia_id_documento`) REFERENCES `corresp_documentos` (`id_documento`);

--
-- Filtros para la tabla `isadg_fondo`
--
ALTER TABLE `isadg_fondo`
  ADD CONSTRAINT `isadg_fondo_ibfk_1` FOREIGN KEY (`codigo_referencia_fondo`) REFERENCES `isadg_entidades` (`codigo_referencia`);

--
-- Filtros para la tabla `isadg_secciones`
--
ALTER TABLE `isadg_secciones`
  ADD CONSTRAINT `isadg_secciones_ibfk_1` FOREIGN KEY (`codigo_referencia_seccion`) REFERENCES `isadg_entidades` (`codigo_referencia`);

--
-- Filtros para la tabla `isadg_series`
--
ALTER TABLE `isadg_series`
  ADD CONSTRAINT `isadg_series_ibfk_1` FOREIGN KEY (`codigo_referencia_serie`) REFERENCES `isadg_entidades` (`codigo_referencia`);

--
-- Filtros para la tabla `isadg_unidad_descripcion`
--
ALTER TABLE `isadg_unidad_descripcion`
  ADD CONSTRAINT `isadg_unidad_descripcion_ibfk_1` FOREIGN KEY (`codigo_referencia_unidad_descripcion`) REFERENCES `isadg_entidades` (`codigo_referencia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
