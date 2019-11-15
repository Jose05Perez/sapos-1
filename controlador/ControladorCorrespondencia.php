<?php

// Comnstruir los parametros de la consulpta que 
// los select requieren de (salidas) => 'siempre seran las mismas: '
// mesa de entrada:
// id_persona_receptor => nombre persona, apellido persona
// id_persona_emisor =>nombre persona, apellido persona
// fecha_emision 
// fecha_recibido
// autorizado (default = 1)//firma digital- 
// estado ('el'=eliminado 'pe'=pendiente 'pg'=con plazo gestion 're'=recibido)
// privado ( value '1'==privado if '0'==publico)
// caracter ('ge' = corriente, 'im'= importante, 'ur'= urgente)
// asunto 
// descripcion
    Class  MesaEntrada{
        private $des;
        function  __construct(){
            $this->des = new Conexion();
        }
        //mesa entrada (param==oredenes y filtros)     
        
        function bandeja()
        {
            $filtro= "";$er="";
            $f=explode("_",$_GET['ruta']);
        switch ($f[1]) {
            case 'pe':
                $filtro= " AND cor.estado='pe'";
                break;
            case 'pg':
                $filtro= " AND cor.estado='pg'";
                break;
            default:  
                break;
        }   
        switch ($f[1]) {
            case 'en':
                $filtro.= " AND cor.id_persona_emisor= ?";
                break;
            default:
                $filtro.= " AND cor.id_persona_receptor= ?";
                break;
        }   
        switch($f[1]){
              case 'ur':
                $filtro.=" AND cor.caracter='ur'";
                break;
            case 'im':
                $filtro.=" AND cor.caracter='im'";
                break;
            case 'ge':
                $filtro.=" AND cor.caracter='ge'";
                break;
            default:
                break;
        }

            $tablaprep=array(
                "campos"    => array("cor.id_correspondencia","cor.estado","UPPER(CONCAT(per.nombre_persona,' ',per.apellido_persona)) AS emisor",
                               "cor.asunto", "cor.descripcion","cor.descripcion", "cor.fecha_emision", "cor.estado", "cor.autorizado", "cor.privado","cor.caracter"),
                "jointablas"=> "corresp_persona AS per JOIN corresp_correspondencia AS cor ON (cor.id_persona_emisor=per.id_persona) ",
                "condicion" => " cor.estado!='el'".$filtro,
                "orden"     => "ORDER BY cor.fecha_emision DESC"
            );
            $sentencia= "SELECT ".implode(", " , $tablaprep['campos'])." FROM ". $tablaprep['jointablas'].
                        " WHERE ".$tablaprep['condicion'].$tablaprep['orden'];
            $resultado=$this->des->consultaSel($sentencia);
            return $resultado;
            echo $resultado;
        }                
        function busqueda()
        {
            $_SESSION['usuario']=array();
            $_POST['palabra']=$string;
            $des->consultaSel();
        }



    }
    class cabezote{
        private $des;
        function  __construct()
        {
            $this->des = new Conexion();
        } 
        function urgentes()
        {
            $sentencia="SELECT COUNT(*) AS urgentes FROM corresp_correspondencia where id_persona_receptor=".$_SESSION['id_persona']." AND caracter='ur' ";
            $resultado=$this->des->consultaSel($sentencia);
            $_SESSION['urgentes']=$resultado[0]['urgentes'];
        }
        function internos()
        {   
            $sentencia="SELECT COUNT(*) AS internos FROM corresp_correspondencia where id_persona_receptor=".$_SESSION['id_persona'];// ingresar condicion 
            $resultado=$this->des->consultaSel($sentencia);
            $_SESSION['internos']=$resultado[0]['internos'];
        }
        function externos()
        {
            $sentencia="SELECT COUNT(*) AS externos FROM corresp_correspondencia where id_persona_receptor=".$_SESSION['id_persona'];// ingresar condicion 
            $resultado=$this->des->consultaSel($sentencia);
            $_SESSION['externos']=$resultado[0]['externos'];
        }
        function importantes()
        {
            $sentencia="SELECT COUNT(*) AS importantes FROM corresp_correspondencia where id_persona_receptor=".$_SESSION['id_persona']." AND caracter='im' ";// ingresar condicion 
            $resultado=$this->des->consultaSel($sentencia);
            $_SESSION['importantes']=$resultado[0]['importantes'];
        }
        function genericos()
        {
            $sentencia="SELECT COUNT(*) AS genericos FROM corresp_correspondencia where id_persona_receptor=".$_SESSION['id_persona']." AND caracter='ge' ";// ingresar condicion 
            $resultado=$this->des->consultaSel($sentencia);
            $_SESSION['genericos']=$resultado[0]['genericos'];
        }
        function pendientes()
        {
            $sentencia="SELECT COUNT(*) AS pendientes FROM corresp_correspondencia where id_persona_receptor=".$_SESSION['id_persona']." AND estado='pe' ";// ingresar condicion 
            $resultado=$this->des->consultaSel($sentencia);
            $_SESSION['pendientes']=$resultado[0]['pendientes'];
        }
        function pgestion()
        {
            $sentencia="SELECT COUNT(*) AS pgestion FROM corresp_correspondencia where id_persona_receptor=".$_SESSION['id_persona']." AND estado='pg' ";// ingresar condicion 
            $resultado=$this->des->consultaSel($sentencia);
            $_SESSION['pgestion']=$resultado[0]['pgestion'];
        }
        
        
        
    }


