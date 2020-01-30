<?php

Class  Ingreso{
    private $des;
    function  __construct(){
        $this->des = new Conexion();
    }
    //Validar Formulario
    function ingresoCorresp($corresp=array())
    {
    $idDest="SELECT id_persona AS id FROM corresp_persona WHERE correo_electronico = '{$corresp['destinatario']}'";
    $res = $this->des->consultaSel($idDest)[0]['id'];
    $idmi= new MesaEntrada();
    $miId =$idmi->id();

    if(!isset($res[0]['id_persona'])){
        $resultado= "<script>alert('Este correo no se encuentra registrado en esta institucion');</script>";
    }else{  
        $stmt = "SELECT count(*) as l FROM corresp_correspondencia as c 
                JOIN corresp_empleado as em ON id_persona_empleado = id_persona_emisor 
                WHERE em.id_departamento_empleado ='{$_SESSION['usuario']['codigo_depto']}' AND year(c.fecha_emision) = ".date('Y')."";
        $correspN= $this->des->consultaSel($stmt)[0]['l'];
        $nombre = $_SESSION['usuario']['codigo_depto'].$correspN.'-'.date('y');
        ///////////////////guardar archivo    
        $rutaAdj="recursos/adjuntos";
        $carpeta=$rutaAdj.'/'.$nombre; 
        mkdir($carpeta,755);
        for($i=0;$i>count($corresp['adjuntos']['name']);$i++){
            if ($corresp['adjuntos']['error']==0 && !file_exists($ficheroSubido)){ 
                $ficheroSubido= $carpeta.'/'.['adjuntos']['name'][$i].'.txt';
                move_uploaded_file($_FILES['adjuntos']['tmp_name'][$i], $ficheroSubido);
                $adjuntos = $ficheroSubido;
            }
        }     
        if ( $corresp['contenido']!=""){
            generadorArchivos:{
                $ruta= "recursos/correspondencias/";
                $rutArch = $ruta . $nombre.'.txt';
                if(file_exists($rutArch)){
                goto generadorArchivos;
                }
                $arch = fopen($rutArch,"w") or die();
                fwrite($arch,$corresp['contenido']);
                fclose($arch);
            }
            //echo "<script>alert('Eviado Exitosamente');</script>";
            //echo "<script>window.location='".$_GET['ruta']."';</script>";
            
            
            } 
        ///////////////////gardar registro

        $tab= 'corresp_correspondencia';
        $sql= array(
        'id_correspondencia' => 'corresp'.$correspN,
        'id_persona_emisor'=> $miId,
        'id_persona_receptor'=> $res['id_persona'],
        'fecha_emision'=> date('Y-m-d H:i:s'),
        'asunto'=> $corresp['asunto'],
        'codigo_correspondencia'=>$nombre,
        'contenido'=> $corresp['contenido'],
        'autorizado'=> $corresp['autorizado'],
        'caracter'=> $corresp['caracter'],
        'privado'=> $corresp['privado'],
        'estado'=> 'pe',
        'adjuntos'=> $corresp['adjuntos']);
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
