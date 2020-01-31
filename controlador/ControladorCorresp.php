<?php

class GeneradorCorrespondencia {
    private $codigo_correspondencia;
    private $des;

        function  __construct(){
            $this->des = new Conexion();
            $this->codigo_correspondencia= $this->genCodCorresp();
        }         
    
    function genIdCorresp(){
        $sent = "SELECT COUNT(*) AS n FROM corresp_correspondencia";
        return $this->des->consultaSel($sent)[0]['n'];
    }
    function genCodCorresp(){
        $CodigoD= $_SESSION['usuario']['codigo_depto'];
        $sent ="SELECT COUNT(*) AS nc FROM corresp_correspondencia as c 
        JOIN corresp_empleado  as e ON c.id_persona_emisor = e.id_persona_empleado  
        WHERE  e.id_departamento_empleado = ':depto' AND c.fecha_emision = ':fecha'";
        $depto =array(':depto'=>$CodigoD,':fecha'=>date('Y'));
        $numeracion = $this->des->consultaSel($sent,$depto)[0]['nc']+1; 
        return "{$CodigoD}-{$numeracion}-".date('Y');
    }
    function idBusquedaxCorreo($correo){ 
        $correo='amatos@bnphu.gob.do';       
        $sent= "SELECT id_persona AS id FROM corresp_persona WHERE correo_electronico = '{$correo}' ";
        $f= $this->des->consultaSel($sent)[0]['id'];           
        return $f;
    }
    function regContenido($contenido){
        if ( $contenido!=""){
                $ruta= "recursos/correspondencias/";
                $rutArch = $ruta . $this->codigo_correspondencia.'.txt';
                $arch = fopen($rutArch,"w") or die("ya existe el archivo");
                fwrite($arch,$contenido);
                fclose($arch);
        }
        return $this->codigo_correspondencia;
    }
    function regAdjCorresp($adjuntos =array()){
        $carpeta ="recursos/adjuntos/".$this->codigo_correspondencia;$nombreArchivos = "";                   
            for($i=0;$i>count($adjuntos);$i++){                
                if ($adjuntos['error'][$i]==0 && !file_exists($ficheroSubido)){ 
                    mkdir($carpeta,755)or die(); 
                    $archSubido= $carpeta.'/'.$adjuntos['name'][$i];
                    move_uploaded_file($adjuntos['tmp_name'][$i], $archSubido);  
                    $nombreArchivos += " #".$adjuntos['name'][$i];
                }
            }   
          return $nombreArchivos;
    }
    function ingresarCorresp($co=array()){
        $ingreso=array(
        'id_correspondencia'=> array( 'corresp'.$this->genIdCorresp(),0),
        'id_persona_emisor'=> array($this->idBusquedaxCorreo($_SESSION['usuario']['correo']),0),
        'id_persona_receptor'=> array($this->idBusquedaxCorreo($co['destinatario']),0),
        'fecha_emision'=>array(date('Y-m-d'),0),
        'fecha_recibido'=>array('',0),
        'asunto'=>array($co['asunto'],0),
        'codigo_correspondencia'=>array($this->codigo_correspondencia,0),
        'contenido'=>array($this->regContenido($co['contenido']),0),
        'caracter'=>array($co['caracter'],0),
        'estado'=>array('pe',0),
        'autorizado'=>array($co['autorizado'],1),
        'privado'=> array($co['privado'],1),
        'adjuntos'=> array($this->regAdjCorresp($co['adjuntos']) ,0 )
        );
        $this->des->consultaIns('corresp_correspondencia',$ingreso);
    }
}