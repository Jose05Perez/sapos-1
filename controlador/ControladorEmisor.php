<?php

Class  Ingreso{
    private $des;
    function  __construct(){
        $this->des = new Conexion();
    }
    //Validar Formulario

    function ingresoCorresp($corresp=array())
    {
    $idRecep="SELECT id_persona FROM corresp_persona WHERE correo_electronico = '{$corresp['destinatario']}'";
    $res = $this->des->consultaSel($idRecep);
    $idmi= new MesaEntrada();
    $miId =$idmi->id();
    if(empty($res)|| is_string($res)){
        $resultado= "<script>alert('Este correo no se encuentra registrado en esta institucion'</script>";
    }else{               
        $tab= 'corresp_correspondencia';
        $sql= array(
        'id_persona_emisor'=> $miId;
        'id_persona_receptor'=> $res[0]['id_persona'];
        'fecha_emision'=> date('Y-m-d H:i:s');
        'asunto'=> $corresp['asunto'];
        'contenido'=> $corresp['contenido'];
        'autorizado'=> $corresp['autorizado'];
        'caracter'=> $corresp['caracter'];
        'privado'=> $corresp['privado'];
        'estado'=> 'pe';
        'adjuntos'=> $corresp['adjuntos'];
        $this->des->consultaIns($tab,$sql);
        
    }


        return $resultado;
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
