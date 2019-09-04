<?php
    require_once "controlador/ControladorPlantilla.php";
    require_once "modelo/AuthHelper.php";
    require_once "modelo/Settings.php";
    require_once "modelo/Token.php";

    $plantilla = new ControladorPlantilla();
    $plantilla->ctrPlantilla();