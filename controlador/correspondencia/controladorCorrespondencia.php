<?php
    
Class Correspondencia{
    private $idc;
    private $cnx;
        function  __construct(){
            $this->cnx = new Conexion();
            $num= explode("_",$_GET['ruta'])[1];
            $this->idc = $_SESSION['idc'][$num];
        }
    function id()  //carga de id  
    {
        $sent = "SELECT p.id_persona FROM corresp_persona AS p JOIN corresp_Empleado AS e ON(e.id_persona_empleado=p.id_persona)WHERE e.ID_AD = :idad ";
        $arg=array(':idad'=>$_SESSION['id_AD']);
        $id=$this->cnx->consultaSel($sent,$arg)[0]['id_persona'];
        return $id;
    } 
    function consulta(){        
        $env=isset($_SESSION['env'])?'receptor':'emisor';   
        $sentencia = "SELECT
            c.id_correspondencia,
            CONCAT(p.nombre_persona,' ',p.apellido_persona) AS nombre ,
            p.correo_electronico, p.status_persona,
            c.asunto, c.fecha_emision,c.estado, 
            c.autorizado,c.privado, c.contenido, c.fecha_emision, c.fecha_recibido, c.caracter, c.adjuntos
            FROM corresp_correspondencia c join corresp_persona p on (p.id_persona=c.id_persona_$env) where  id_correspondencia= :idc";
        $arg= array('idc'=>$this->idc);
        $result = $this->cnx->consultaSel($sentencia,$arg)[0];
        $devuelta = $this->receptorCopia();
        if($devuelta){
            $result['cc']=1;
        }else{
            $result['cc']=0;
        }
        return $result;
    }
    function receptorCopia(){
        $sentencia = "SELECT id_persona_receptor as idr FROM corresp_correspondencia WHERE  id_correspondencia= :idc";
        $arg= array('idc'=>$this->idc);
        $result = $this->cnx->consultaSel($sentencia,$arg)[0]['idr'];
        $miId = $this->id();
        $retorno = ($result!= $miId)?true:false;
        return $retorno;
    }
    function btnCorrespondencia($btn,$dt){
        switch ($btn){
            case 'plazog':   $est = "pg";    break;
            case 'recibido': $est= "re";     break;
            case 'borrar':   $est = "el";    break;
            case 'reenviar': echo "<script>window.location='emisor_renv';</script>"; 
                            $_SESSION['renv']['asunto']=$dt['asunto'];
                            $_SESSION['renv']['contenido']=$dt['contenido'];
                            break;
            default: $est = true;   break;
        }
        if($est === true){
            echo "<script>window.location='{$_GET['ruta']}';</script>"; 
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
