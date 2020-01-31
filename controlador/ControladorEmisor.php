<?php

Class  Ingreso{
    private $des;
    function  __construct(){
        $this->des = new Conexion();
    }

    function ingresoEmisor($persona=array())
    {
        $tab= 'corresp_persona';
        $sql = array( 
            'cedula_persona' =>$persona['cedula'],
            'nombre_persona'=>$persona['nombre'],
            'apellido_persona'=>$persona['apellido'],
            'sexo_persona'=>$persona['sexo'],
            'fecha_nacimiento_persona' =>$persona['fechaNacimiento'],
            'id_institucion_persona'=>$persona['institucion'],
            'correo_persona'=>$persona['email'],
            'telefonos'=>implode(" #", $persona['telefono'])           
             ) ;
        $this->des->consultaIns($tab,$sql);
    }
}

?>
