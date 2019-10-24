CREATE TABLE `isadg_entidades` (
  `codigo_referencia` varchar(100) NOT NULL,
  `titulo` text NOT NULL,
  `fecha` date NOT NULL,
  `nivel de descripción` text NOT NULL,
  `volumen_unidad_descripcion` text NOT NULL,
  `nombre_productores` text NOT NULL,
  `alcance_contenido` text NOT NULL,
  `nota_archivero` text NOT NULL,
  `fecha_descripcion` text NOT NULL,
  `codigo_referencia_id_documento` varchar(20) NOT NULL,
  PRIMARY KEY (`codigo_referencia`),
  FOREIGN KEY (`codigo_referencia_id_documento`) REFERENCES `corresp_documentos` (`id_documento`)
);

CREATE TABLE `isadg_fondo` (
  `id_fondo` int(11) NOT NULL,
  `codigo_referencia_fondo` varchar(100) NOT NULL,
  `historia_institucional` text NOT NULL,
  `historia_archivistica` text NOT NULL,
  `forma_ingreso` text NOT NULL,
  `valoracion_selesccion_eliminacion` text NOT NULL,
  `nuevos_ingresos` text NOT NULL,
  `organizacion` text NOT NULL,
  `condiciones_acceso` text NOT NULL,
  `condiciones_reproduccion` text NOT NULL,
  `lenguaje_escritura` text NOT NULL,
  `caracteristicas_fisicas` text NOT NULL,
  `instrumentos_descripcion` text NOT NULL,
  `existencia_localizacion_original` text NOT NULL,
  `existencia_localizacion_copias` text NOT NULL,
  `unidades_descripcion_relacionadas` text NOT NULL,
  `nota_publicacion` text NOT NULL,
  `nota` text NULL,
  `reglas_normas` text NOT NULL,
  PRIMARY KEY (`id_fondo`),
  FOREIGN KEY (`codigo_referencia_fondo`) REFERENCES `isadg_entidades` (`codigo_referencia`)
);


CREATE TABLE `isadg_secciones` (
  `id_seccion` int(11) NOT NULL,
  `codigo_referencia_seccion` varchar(100) NOT NULL,
  `historia_archivistica` text NOT NULL,
  `organizacion` text NOT NULL,
  PRIMARY KEY (`id_seccion`),
  FOREIGN KEY (`codigo_referencia_seccion`) REFERENCES `isadg_entidades` (`codigo_referencia`)
);

CREATE TABLE `isadg_series` (
  `id_serie` int(11) NOT NULL,
  `codigo_referencia_serie` varchar(100) NOT NULL,
  `forma_ingreso` text NOT NULL,
  `valoracion_selesccion_eliminacion` text NOT NULL,
  `organizacion` text NOT NULL,
  `condiciones_acceso` text NOT NULL,
  `condiciones_reproduccion` text NOT NULL,
  `instrumentos_descripcion` text NOT NULL,
  PRIMARY KEY (`id_serie`),
  FOREIGN KEY (`codigo_referencia_serie`) REFERENCES `isadg_entidades` (`codigo_referencia`)
) ;

CREATE TABLE `isadg_unidad_descripcion` (
  `id_unidad_descripcion` int(11) NOT NULL,
  `codigo_referencia_unidad_descripcion` varchar(100) NOT NULL,
  `forma_ingreso` text NOT NULL,
  `valoracion_selesccion_eliminacion` text NOT NULL,
  `existencia_localizacion_copias` text NOT NULL,
  PRIMARY KEY (`id_unidad_descripcion`),
  FOREIGN KEY (`codigo_referencia_unidad_descripcion`) REFERENCES `isadg_entidades` (`codigo_referencia`)
);



