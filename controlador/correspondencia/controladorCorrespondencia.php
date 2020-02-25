<?php
    
Class Correspondencia{
    private $idc;
    private $cnx;
        function  __construct(){
            $this->cnx = new Conexion();
            $num= explode("_",$_GET['ruta'])[1];
            $this->idc = $_SESSION['idc'][$num];
        }
    function consulta(){        
        $env=isset($_SESSION['env'])?'receptor':'emisor';     
        $sentencia = "SELECT
            c.id_correspondencia,
            CONCAT(p.nombre_persona,' ',p.apellido_persona) AS nombre ,
            p.correo_electronico, p.status_persona,
            c.asunto, c.codigo_correspondencia, c.fecha_emision,c.estado, 
            c.autorizado,c.privado, c.contenido, c.fecha_emision, c.fecha_recibido, c.caracter, c.adjuntos
            FROM corresp_correspondencia c join corresp_persona p on (p.id_persona=c.id_persona_$env) where  id_correspondencia= :idc";
        $arg= array('idc'=>$this->idc);
        return $this->cnx->consultaSel($sentencia,$arg)[0];
    }
    function btnCorrespondencia($btn){

        switch ($btn){
            case 'plazog':   $est = "pg";    break;
            case 'recibido': $est= "re";     break;
            case 'borrar':   $est = "el";    break;
            default:         $est = true;   break;
        }
        if($est === true){
            switch ($btn){
                case 'reenviar':  
                    $est = "pg"; echo "<script>window.location= 'emisor';</script>";
                    
                break;
                case 'responder': 
                    $est= "re";     
                
                break;
                default:         echo "<script>window.location='{$_GET['ruta']}';</script>";   break;
            }
        }else{
            $tabla= 'corresp_correspondencia';
            $recibido = $est=="re"? ' , fecha_recibido= "'.date("Y-m-d").'"': '';
            $parametroSet="estado='{$est}' {$recibido}"; //la uncia modificacion para eliminar e.e
            $corRegistro[0]="id_correspondencia = '".$this->idc."'";
            $this->cnx->consultaUpd('corresp_correspondencia',$parametroSet,$corRegistro);     
            if($est=="el"){echo '<script>window.location="mesaEntrada";</script>';
            }else{
                echo '<script>window.location="'.$_GET['ruta'].'";</script>';
            }
        }

        
    }
}
