<?php
Class Tracking{

    private $des;
        function  __construct(){
            $this->des = new Conexion();
        }

    FUNCTION estadoCorresp($codigoT){
        $sent= 'SELECT * FROM corresp_correspondencia as c JOIN corresp_tracking as t  ON id_correspondencia_tracking=id_correspondencia WHERE
        codigo_tracking = :codigo';
        $llave = array(':codigo' => $codigoT);
       
        return $this->des->consultaSel($sent,$llave);
        
    }


}