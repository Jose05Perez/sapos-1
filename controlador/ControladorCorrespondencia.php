<?php

    Class  MesaEntrada{
        private $des;
        function  __construct(){
            $this->des = new Conexion();
        }
        //mesa entrada (param==oredenes y filtros)     
        function bandeja()
        {
            $sent = "SELECT p.id_persona FROM corresp_persona AS p JOIN corresp_Empleado AS e ON(e.id_persona_empleado=p.id_persona)WHERE e.ID_AD = :idad ";
            $arg=array(':idad'=>$_SESSION['id_AD']);
            $id=$this->des->consultaSel($sent,$arg)[0]['id_persona'];

            $filtro = " AND cor.id_persona_receptor= :id ";           
            if(isset($_GET['ruta'])){
                $f=explode("_",$_GET['ruta']);
                if(isset($f[1])){
                    if($f[1]== 'en'){
                        if(isset($f[1])){
                            $filtro =" AND cor.id_persona_emisor= :id ";                    
                        }                    }
                        switch ($f[1]) {
                            case 'pe':
                                $filtro.= " AND cor.estado='pe'";
                                break;
                            case 'pg':
                                $filtro.= " AND cor.estado='pg'";
                                break; 
                            case 'ur':
                                $filtro.=" AND cor.caracter='ur'";
                                break;
                            case 'im':
                                $filtro.=" AND cor.caracter='im'";
                                break;
                            case 'ge':
                                $filtro.=" AND cor.caracter='ge'";
                                break;
                            case 'ex':
                                $filtro.= " AND id_institucion_persona!= 13 ";
                            break;
                            case 'in':
                                $filtro.= " AND id_institucion_persona= 13 ";
                            break;
                            default:
                                break;
                                }                     
                    
                            
                }
            }    
            $tablaprep=array(
                "campos"    => array("cor.id_correspondencia", "cor.estado", "UPPER(CONCAT(per.nombre_persona,' ',per.apellido_persona)) AS emisor",
                                    "cor.asunto", "cor.descripcion", "cor.descripcion","cor.fecha_emision","cor.estado", "cor.autorizado", 
                                    "cor.privado","cor.caracter"),
                "jointablas"=> "corresp_correspondencia AS cor JOIN corresp_persona AS per ON (cor.id_persona_emisor=per.id_persona) ",
                "condicion" => " cor.estado!='el'".$filtro,
                
            );            
            $sentencia= "SELECT ".implode(", " , $tablaprep['campos'])." FROM ". $tablaprep['jointablas'].
                        " WHERE ".$tablaprep['condicion']."ORDER BY cor.fecha_emision DESC";
            $arg=array(':id'=> $id);
            $resultado=$this->des->consultaSel($sentencia,$arg);
            return $resultado;
            
        }   
        function bandejaLoad()// MODIFICAR
        {   
            $ente=$this->bandeja();
            var_dump($ente);
            $fe=0;$idFe=array();$tab="";
            foreach ($ente as $key){
            $idFe[$fe]=$key['id_correspondencia']; 
                $tab.= '<tr>
                    <td><input type="checkbox" name="seleccionado[]" value="'.$fe.'"></td>
                    <td><i class="fa fa-circle-o text-';
                switch ($key['caracter']){
                    case 'im':  $tab.='yellow';  
                    break;        
                    case 'ur':    $tab.= 'red'; 
                    break;
                    case 'ge' :   $tab.= 'light-blue'; 
                    break;
                } 
                $tab.=    '"></i></td>     
                        <td class="mailbox-name">'.$key['emisor'].'</td>
                        <td class="mailbox-subject"> <b>'.$key['asunto'].'</b> '.$key['descripcion'].'</td>
                        <td class="mailbox-attachment"><i class="fa fa-clip"></td>
                        <td class="mailbox-date">'.$key['fecha_emision'].'</td>
                        <td> 
                        <span class="label label-';
                        
                switch ($key['estado']) {
                    case 'pe':   $tab.= 'info">Pendiente';
                    break;
                    case 'pg':    $tab.= 'primary">En plazo de gestion';
                    break;
                    case 're':   $tab.= 'default">Recibido';
                    break;
                } 
                $tab.=  '</span></td> 
                        <td><input type="checkbox" name="autorizado[]" value="'.$fe.'"';
                if ($key['autorizado']==1){   $tab.= 'checked'; }
                
                $tab.= '></td> 
                    <td><input type="checkbox" name="pivado[]" value="'.$fe.'"';
                if ($key['privado']==1){   $tab.= 'checked'; }
                $tab.= '></td><tr>';  
                $fe++;
            }
            $_SESSION["idFe"]=$idFe;
            return $tab;
        }             
                        // function busqueda()
                        // {
                        //     $_SESSION['usuario']=array();
                        //     $_POST['palabra']=$string;
                        //     $des->consultaSel();
                        // }
    }

    
    class cabezote{
        private $des;
        function  __construct()
        {
            $this->des = new Conexion();
        } 
        function notificaciones()
        {  
             //================================================================================================================================================
            //------------------------------------------------------reducir tamaño de codigo PENDIENTE--------------------------------------------------------DESPARCGHE POR SESSION ['ID']
            //================================================================================================================================================
            $arg=array(':idad'=>$_SESSION['id_AD']);


            $sentencia="SELECT COUNT(*) internos
            FROM corresp_correspondencia as cor 
            JOIN corresp_persona as per ON (cor.id_persona_receptor= per.id_persona) 
            join corresp_empleado as em on (em.id_persona_empleado=per.id_persona) 
            where em.ID_AD= :idad AND estado!='el'AND estado!='re'" ; 
            $resultado=$this->des->consultaSel($sentencia,$arg);
            $_SESSION['notificaciones']=$resultado[0];
        
            $sentencia="SELECT COUNT(*) externos
            FROM corresp_correspondencia as cor 
            JOIN corresp_persona as per ON (cor.id_persona_receptor= per.id_persona) 
            join corresp_empleado as em on (em.id_persona_empleado=per.id_persona) 
            where em.ID_AD= :idad AND estado!='el'AND estado!='re'" ; 
            $resultado=$this->des->consultaSel($sentencia,$arg);
            $_SESSION['notificaciones']+=$resultado[0];

            
            //-----------------------------------------------------------------------------------------------------------------------------------------------------------

            $sentencia="SELECT COUNT(*) urgentes
            FROM corresp_correspondencia as cor 
            JOIN corresp_persona as per ON (cor.id_persona_receptor= per.id_persona) 
            join corresp_empleado as em on (em.id_persona_empleado=per.id_persona) 
            where em.ID_AD= :idad AND estado!='el'AND estado!='re'" ; 
            $resultado=$this->des->consultaSel($sentencia,$arg);
            $_SESSION['notificaciones']+=$resultado[0];
                  
            
            $sentencia="SELECT COUNT(*) importantes
            FROM corresp_correspondencia as cor 
            JOIN corresp_persona as per ON (cor.id_persona_receptor= per.id_persona) 
            join corresp_empleado as em on (em.id_persona_empleado=per.id_persona) 
            where em.ID_AD= :idad AND estado!='el'AND estado!='re'" ;
            $resultado=$this->des->consultaSel($sentencia,$arg);
        
            
            $sentencia="SELECT COUNT(*) genericos
            FROM corresp_correspondencia as cor 
            JOIN corresp_persona as per ON (cor.id_persona_receptor= per.id_persona) 
            join corresp_empleado as em on (em.id_persona_empleado=per.id_persona) 
            where em.ID_AD= :idad AND estado!='el'AND estado!='re'" ; 
            $resultado=$this->des->consultaSel($sentencia,$arg);
            $_SESSION['notificaciones']+=$resultado[0];
        
            //------------------------------------------------------------------------------------------------------------------------------------------------------------

            
            $sentencia="SELECT COUNT(*) pendiendientes
            FROM corresp_correspondencia as cor 
            JOIN corresp_persona as per ON (cor.id_persona_receptor= per.id_persona) 
            join corresp_empleado as em on (em.id_persona_empleado=per.id_persona) 
            where em.ID_AD= :idad AND estado!='el'AND estado!='re'" ;
            $resultado=$this->des->consultaSel($sentencia,$arg);
            $_SESSION['notificaciones']+=$resultado[0];
        
            
            $sentencia="SELECT COUNT(*) pgestion
            FROM corresp_correspondencia as cor 
            JOIN corresp_persona as per ON (cor.id_persona_receptor= per.id_persona) 
            join corresp_empleado as em on (em.id_persona_empleado=per.id_persona) 
            where em.ID_AD= :idad AND estado!='el'AND estado!='re'" ; 
            $resultado=$this->des->consultaSel($sentencia,$arg);
            $_SESSION['notificaciones']+=$resultado[0];
        }
    }


    class botones{
        private $des;
            function  __construct(){
                $this->des = new Conexion();
            }
        function eliminar($selec= array(),$id=array())//parametros de actualizacion 
        {
            $tabla= 'corresp_correspondencia';
            $parametroSet="estado='el'";
            if(!($id==array()) && !($selec==array())){
                foreach ($selec as $key => $value) {
                    $corRegistro[$key]= "id_correspondencia = '".$id[$value]."'";    
                }
            }else{
                    $corRegistro=array();    
            }
            $this->des->consultaUpd($tabla,$parametroSet,$corRegistro);
    
        }
    }
