<?php

Class  generadorEmisor{
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
        if($this->validarCedula($persona['cedula'])==1){               
            $tab= 'corresp_persona';
            $sql = array( 
                'cedula_persona' =>str_replace("-", "",$persona['cedula']),
                'nombre_persona'=>$persona['nombre'],
                'apellido_persona'=>$persona['apellido'],
                'sexo_persona'=>$persona['sexo'],
                'id_institucion_persona'=>$persona['institucion'],
                'correo_electronico'=>$persona['email'],
                'telefonos'=>implode(" #", $persona['telefono'])
                ) ;
            if($persona['institucion']!=13){  $sql['status_persona']=4;  }
            $this->des->consultaIns($tab,$sql);
            return 1;
        }else{
            return 0;
        }        
    }
    function validarCedula($ced){
        
        $c            = str_replace("-", "", $ced);
        $cedula       = substr($c, 0,  - 1);
        $verificador  = substr($c, - 1, 1);
        $suma         = 0;
        $cedulaValida = 0;
        if (strlen($ced) < 11) {
            return false;
        }       
        for ($i = 0; $i < strlen($cedula); $i++) {
            $mod = "";
            $mod=($i % 2) == 0?1:2;
            $res = substr($cedula, $i, 1) * $mod;
            if ($res > 9) {
                $res = (string) $res;
                $uno = substr($res, 0, 1);
                $dos = substr($res, 1, 1);              
                $res = $uno + $dos;
            }
            $suma += $res;
        }
        $el_numero = (10 - ($suma % 10)) % 10;
        if ($el_numero == $verificador && substr($cedula, 0, 3) != "000") {
            $cedulaValida = 1;
        } else {
            $cedulaValida =0;
        }        
        return $cedulaValida;
        
    }
}

?>
