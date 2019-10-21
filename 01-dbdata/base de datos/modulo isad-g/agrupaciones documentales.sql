CREATE TABLE corresp_isadg_agrupaciones_documentales(
    `id_agrupaciones_documentales` int not null,
    `codigo_referencia` varchar (100) not null,
    `titulo_entidad` text not null,
    `fechas` date not null,
    `nivel_descriptivo` varchar(30) not null,
    `volumen_soprte_unidad_descriptiva` text not null,
    `id_documento_agrupacion_documental
    PRIMARY KEY (`id_agrupaciones_documentales`),
    FOREIGN KEY ()


