<?php
/**
*  Copyright (c) BNPHU. All rights reserved. Licensed under the GPL license.
*  See LICENSE in the project root for license information.
*
*  PHP version 7
*
*  @category vista
*  @package correspondencia
*  @author   Josué Serulle Cabreja <jota_serulle@hotmail.com>
*  @license GPL
*  @link https://github.com/josueSerulle/correspondencia
*/
    
    require_once "controlador/ControladorCorrespondencia.php";
    require_once "controlador/ControladorPlantilla.php";
    require_once "controlador/ControladorUsuario.php";   
    require_once "modelo/AuthHelper.php";
    require_once "modelo/Settings.php";
    require_once "modelo/Token.php";
    require_once "modelo/conexion.php"; 
    
    $plantilla = new ControladorPlantilla();
    $plantilla->ctrPlantilla();

   
