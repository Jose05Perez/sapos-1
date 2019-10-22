
CREATE TABLE `isadg_entidades`(
    `codigo_referencia` VARCHAR(100) not null,
    `titulo` text not null,
    `fecha` date not null,
    `nivel de descripción` text not null,
    `volumen_unidad_descripcion` text not null,
    `nombre_productores` text not null,
    `alcance_contenido` text not null,
    `nota_archivero` text not null,
    `fecha_descripcion` text not null,
    `codigo_referencia_id_documento` VARCHAR(20) not null,
    PRIMARY KEY (`codigo_referencia`),
    FOREIGN KEY (`codigo_referencia_id_documento`) REFERENCES corresp_documentos(`id_documento`)
 
);
CREATE TABLE `isadg_fondo`(
    `id_fondo` int,
    `codigo_referencia_fondo` VARCHAR(100) not null ,
    `historia_institucional` text not null,
    `historia_archivistica` text not null,
    `forma_ingreso` text not null,
    `valoracion_selesccion_eliminacion` text not null,
    `nuevos_ingresos` text not null,
    `organizacion` text not null,
    `condiciones_acceso` text not null,
    `condiciones_reproduccion` text not null,
    `lenguaje_escritura` text not null,
    `caracteristicas_fisicas` text not null,
    `instrumentos_descripcion` text not null,
    `existencia_localizacion_original` text not null,
    `existencia_localizacion_copias` text not null,
    `unidades_descripcion_relacionadas` text not null,
    `nota_publicacion` text not null,
    `nota` text,
    `reglas_normas` text not null,
    PRIMARY KEY(`id_fondo`),
    FOREIGN KEY (`codigo_referencia_fondo`) REFERENCES isadg_entidades(`codigo_referencia`)
);
CREATE TABLE `isadg_secciones`(
    `id_seccion` int,
    `codigo_referencia_seccion` VARCHAR(100) NOT NULL,
    `historia_archivistica` text not null,
    `organizacion` text not null,
    PRIMARY KEY (`id_seccion`),
    FOREIGN KEY (`codigo_referencia_seccion`) REFERENCES isadg_entidades(`codigo_referencia`)
);
CREATE TABLE `isadg_series`(
    `id_serie` int,
    `codigo_referencia_serie` VARCHAR(100) NOT NULL,
    `forma_ingreso` text not null,
    `valoracion_selesccion_eliminacion` text not null,
    `organizacion` text not null,
    `condiciones_acceso` text not null,
    `condiciones_reproduccion` text not null,
    `instrumentos_descripcion` text not null,
    PRIMARY KEY (`id_serie`),
    FOREIGN KEY (`codigo_referencia_serie`) REFERENCES isadg_entidades(`codigo_referencia`)
);
CREATE TABLE `isadg_unidad_descripcion`(
    `id_unidad_descripcion` int,
    `codigo_referencia_unidad_descripcion` VARCHAR(100) NOT NULL,
     `forma_ingreso` text not null,
    `valoracion_selesccion_eliminacion` text not null,
    `existencia_localizacion_copias` text not null,
    PRIMARY KEY (`id_unidad_descripcion`),
    FOREIGN KEY (`codigo_referencia_unidad_descripcion`) REFERENCES isadg_entidades(`codigo_referencia`)
);