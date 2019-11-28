<?php

    Class  MesaEntrada{
        private $des;
        function  __construct(){
            $this->des = new Conexion();
        }
        //mesa entrada (param==oredenes y filtros)     
        function bandeja()
        {
            $filtro= "";
            $f=explode("_",$_GET['ruta']);

            $filtro = " AND cor.id_persona_receptor= ?";
        
            if(isset($f[1])){
                if($f[1]== 'en'){
                    $filtro =" AND cor.id_persona_emisor= ?";
                    
                }
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
                    default:
                        break;
                }
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
            
        }   
        function bandejaLoad()
        {   
            $ente=$this->bandeja();
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
                        <td> ';
                        
                switch ($key['estado']) {
                    case 'pe':   $tab.= '<span class="label label-info">Pendiente</span>';
                    break;
                    case 'pg':    $tab.= '<span class="label label-primary">En plazo de gestion</span>';
                    break;
                    case 're':   $tab.= '<span class="label label-default">Recibido</span>';
                    break;
                } 
                $tab.= '</td> 
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
            $sentencia="SELECT COUNT(*) AS urgentes FROM corresp_correspondencia where id_persona_receptor= ? AND caracter='ur'AND estado!='el' AND estado!='re' ";
            $resultado=$this->des->consultaSel($sentencia);
            $_SESSION['urgentes']=$resultado[0]['urgentes'];
        }
        function internos()
        {   
            $sentencia="SELECT COUNT(*) AS internos FROM corresp_correspondencia where id_persona_receptor= ? AND estado!='el'AND estado!='re'" ;// ingresar condicion 
            $resultado=$this->des->consultaSel($sentencia);
            $_SESSION['internos']=$resultado[0]['internos'];
        }
        function externos()
        {
            $sentencia="SELECT COUNT(*) AS externos FROM corresp_correspondencia where id_persona_receptor= ? AND estado!='el' AND estado!='re'";// ingresar condicion 
            $resultado=$this->des->consultaSel($sentencia);
            $_SESSION['externos']=$resultado[0]['externos'];
        }
        function importantes()
        {
            $sentencia="SELECT COUNT(*) AS importantes FROM corresp_correspondencia where id_persona_receptor= ? AND caracter='im'AND estado!='el' ";// ingresar condicion 
            $resultado=$this->des->consultaSel($sentencia);
            $_SESSION['importantes']=$resultado[0]['importantes'];
        }
        function genericos()
        {
            $sentencia="SELECT COUNT(*) AS genericos FROM corresp_correspondencia where id_persona_receptor= ? AND caracter='ge' AND estado!='el'";// ingresar condicion 
            $resultado=$this->des->consultaSel($sentencia);
            $_SESSION['genericos']=$resultado[0]['genericos'];
        }
        function pendientes()
        {
            $sentencia="SELECT COUNT(*) AS pendientes FROM corresp_correspondencia where id_persona_receptor= ? AND estado='pe' AND estado!='el' ";// ingresar condicion 
            $resultado=$this->des->consultaSel($sentencia);
            $_SESSION['pendientes']=$resultado[0]['pendientes'];
        }
        function pgestion()
        {
            $sentencia="SELECT COUNT(*) AS pgestion FROM corresp_correspondencia where id_persona_receptor= ? AND estado='pg' AND estado!='el' ";// ingresar condicion 
            $resultado=$this->des->consultaSel($sentencia);
            $_SESSION['pgestion']=$resultado[0]['pgestion'];
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
