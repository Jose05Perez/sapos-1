<?php

Class  Ingreso{
    private $des;
    function  __construct(){
        $this->des = new Conexion();
    }
    function instituciones(){
        $stmt= "SELECT id_institucion as id, nombre_institucion as nom, acronimo_institucion as ac FROM corresp_institucion";
        $instituciones = $this->des->consultaSel($stmt);
        foreach ($instituciones as $k) {
            $html = utf8_encode ($k['nom']);
            echo "<option value='{$k['id']}'>{$html}({$k['ac']})</option>";
        }
    }
    function ingresoEmisor($persona=array())
    {
        $tab= 'corresp_persona';
        $sql = array( 
            'cedula_persona' =>$persona['cedula'],
            'nombre_persona'=>$persona['nombre'],
            'apellido_persona'=>$persona['apellido'],
            'sexo_persona'=>$persona['sexo'],
            'id_institucion_persona'=>$persona['institucion'],
            'correo_electronico'=>$persona['email'],
            'telefonos'=>implode(" #", $persona['telefono']),           
             ) ;
        $this->des->consultaIns($tab,$sql);
    }
}

?>
