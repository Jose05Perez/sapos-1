<?php

// Comnstruir los parametros de la consulpta que 
// los select requieren de (salidas) => 'siempre seran las mismas: '
// mesa de entrada:
// id_persona_receptor => nombre persona, apellido persona
// id_persona_emisor =>nombre persona, apellido persona
// fecha_emision 
// fecha_recibido
// autorizado (default = 1)//firma digital- 
// estado ('el'=eliminado 'pe'=pendiente 'pg'=con plazo gestion 're'=recibido)
// privado ( value '1'==privado if '0'==publico)
// caracter ('co' = corriente, 'im'= importante, 'ur'= urgente)
// asunto 
// descripcion

    $tablaMesaEntrada = " corresp_correspondencia LEFT JOIN corresp_persona LEFT JOIN corresp_institucion ON  ";
    $columnas= "nombre_persona, apellido_persona, fecha_emision, fecha_recibido, estado, privado, caracter, asunto, descripcion"
    