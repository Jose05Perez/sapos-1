<?php

    Class  MesaEntrada{
        private $des;
        function  __construct(){
            $this->des = new Conexion();
        }
         
        function id()  //carga de id  
        {
            $sent = "SELECT p.id_persona FROM corresp_persona AS p JOIN corresp_Empleado AS e ON(e.id_persona_empleado=p.id_persona)WHERE e.ID_AD = :idad ";
            $arg=array(':idad'=>$_SESSION['id_AD']);
            $id=$this->des->consultaSel($sent,$arg)[0]['id_persona'];
            return $id;
        }
        
        
        function bandeja()
        {
            $id=$this->id();
            $filtro = "cor.estado!='el'"; 
            $f= isset($_GET['ruta'])?explode("_",$_GET['ruta']):array('',''); 
            if($f[0]!='mesaEntrada'){ //aplicacion de los filtros de la mesa de entrada
                $filtro .= " AND cor.estado!='re'"; 
            }
            if(isset($f[1])){     
                switch ($f[1]) { 
                    case 'en':
                        $_SESSION['env']=true;                
                        break;
                    case 't':
                        unset($_SESSION['env']);
                        break;
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
                        $filtro.=" AND per.status_persona= '4'";
                    break;
                    case 'in':
                        $filtro.= " AND per.status_persona!= '4'";
                    break;
                    default:
                        break;
                }                                         
            }
            if(isset($_SESSION['env'])){//si la consuta es de envios o recepciones
                $cond="emisor";$ncol="receptor";
            }else{
                $cond="receptor";$ncol="emisor";
            } 
            $filtro .=" AND cor.id_persona_$cond= :id";
            $tablaprep=array(
                "campos"    => array("cor.id_correspondencia", "cor.caracter", "per.status_persona", "UPPER(CONCAT(per.nombre_persona,' ',per.apellido_persona)) AS $ncol",
                                    "cor.asunto", "cor.descripcion", "cor.fecha_emision","cor.estado", "cor.autorizado", 
                                    "cor.privado"),
                "jointablas"=> "corresp_correspondencia AS cor JOIN corresp_persona AS per ON (cor.id_persona_$ncol=per.id_persona)"
             );            
            $sentencia= "SELECT ".implode(", " , $tablaprep['campos'])." FROM ". $tablaprep['jointablas'].
                        " WHERE ".$filtro." ORDER BY cor.fecha_emision DESC"; 
            $arg=array(':id'=> $id); 
            $resultado=$this->des->consultaSel($sentencia,$arg);
            return $resultado;
        }   

        function bandejaLoad()
        {   
            $ente=$this->bandeja(); //resultado de la consulta a DB
            $idc =array(); //array para carga de ID_correspondencia a fin de manipularlos
            $ind=0; //indice control de iteraciones y numerador de checks
            
            /////////////////// gestion de paginacion
            $btn = new btnMesaEntrada();//instancia de clase - funcion paginacion
            $limite=3;// numero de filas limite por pagina (modificable)
            $display='';//variable de retorno 
            $posicion= $btn->btnPaginacion($limite,$ente); // array que ubica los indices de donde parte cada paginacion

            if(isset($_POST['pag'])){ 
                //'pag':numero de la pagina que se busca, $posicion #indice del primer registro de cada pag 
                $slice=array_slice($ente,$posicion[$_POST['pag']-1],$posicion[$_POST['pag']-1]+$limite);
                //slice toma los registros que supone mostrar la paginacion seleccionada
            }else{
                $slice=$ente;
            }
            ////////////////////////////////////////
            if(isset($_GET['ruta'])){ //en la ruta que estamos
                $ruta=explode("_",$_GET['ruta']); //extirpar los parametros de mi ruta para poder identificarla
            }else{
                $ruta[0]='';
            }

            if($ente!=null || $ente!= array()){ //si el resultado vino vacio devuelve texto de vacio

                $s= $ruta[0]=='mesaEntrada'?'<th><i class="fa fa-check-square"></i></th>':'';
                //mostrar los check solo en meseEntrada donde se pueden editar **                    
            
                $e=array_search('receptor',array_keys($ente[0]))==false?'Emisor':'Receptor';
                // operardor ternario/ titulo dinamico enviados-recibidos
                $display.= '
                    <thead>
                        <tr>'.$s.'
                            <th>Caracter</th>
                            <th>'.$e.'</th>
                            <th>Asunto</th>
                            <th>dia Registro</th>
                            <th>Detalles</th>
                        </tr>
                    </thead>
                    <tbody>';
                //carga del table head e inicio del cuerpo

                foreach($slice as $kl){
                    
                    $sd= $ruta[0]=='mesaEntrada'?'<td><input type="checkbox" name="seleccionado[]" value='.$ind.'></td>':'';
                    //mostrar los check solo en meseEntrada donde se pueden editar **                    

                    array_push($idc,$kl['id_correspondencia']); // ingresar los ID de correpondencia
                    //+        traducir mis datos a visualizacion apropiada a traves de variables +
                    switch ($kl["caracter"]){ 
                        case 'ur': $caracter ='red'; break;
                        case 'im': $caracter = 'orange'; break;
                        default: $caracter = 'light-blue'; break;
                    }                    

                    switch ($kl["estado"]){
                        case 'pg': $estado=array('primary','EN GESTION'); break;
                        case 'pe': $estado= array('info', 'PENDIENTE'); break;
                        default: $estado= array('default', 'RECIBIDO'); break;
                    }

                    $emisor = $kl["status_persona"]!='4'?array('university','green'):array('globe  fa-lg','yellow'); 
                    $er =isset($kl['emisor'])?$kl['emisor']:$kl['receptor'];
                    
                    $auto = $kl["autorizado"]==0? array('danger','NA'):array('warning',' A');
                    $priv = $kl["privado"]==0? array('success','PUBLICO'):array('default','PRIVADO');
                    //  +
                    // a continuacion el cuerpo de la tabla 
                    $display.= '
                    <tr>       '.$sd.'
                        <td>
                            <i class="fa fa-circle-o text-'.$caracter.' fa-lg"></i> &emsp;  
                            <i class="fa fa-'.$emisor[0].' text-'.$emisor[1].'"></i> &emsp;  
                            <span class="label label-'.$estado[0].'"><b>'.$estado[1].'</b></span>
                        </td>
                        <td class="mailbox-name">'.$er.'</td>
                        <td class="mailbox-subject">
                            <a href="'.'mesaEntrada'.'"><b>'.$kl['asunto'].'</b> '.$kl['descripcion'].'</a>
                        </td>
                        <td class="mailbox-date">'.$kl['fecha_emision'].'</td>
                        <td>
                            <span class="label label-'.$priv[0].'">'.$priv[1].'</span>&emsp;
                            <span class="label label-'.$auto[0].'">'.$auto[1].'</span>
                        </td>
                    <tr>'; 
                    
                    $ind++; // incremento del indice (linea:82)
                    if(($ruta[0]!='mesaEntrada' )&& $ind>3){break;}
                    if($ind>=$limite){break;} // numero de filas limite por pagina (modificable) linea:86
                }
                $_SESSION['idc']=$idc;
                $display.= '</tbody>';
            }else{
                $display.= '<br>&emsp;<h3>Actualmente no tiene correspondencia de esta categoría</h3>';
            }
            return $display;
        }            
    }


    class btnMesaEntrada{ 
        private $des;
            function  __construct(){
                $this->des = new Conexion();
            }
        function eliminar($selec= array(),$id=array())//parametros de actualizacion 
        {   
                $tabla= 'corresp_correspondencia';
                $parametroSet="estado='el'"; //la uncia modificacion para eliminar e.e
                if(!($id==array()) || $selec==array()){
                foreach ($selec as $key => $value) {
                    $corRegistro[$key]="id_correspondencia = '".$id[$value]."'";    
                }
                }else{
                        $corRegistro=array();  
                }
                $this->des->consultaUpd($tabla,$parametroSet,$corRegistro);    
                
          
            
            
        }
        function btnPaginacion($lim,$fuente=array())
        {
            $delimitador=count($fuente); //numero de registros reslutantes
            if($delimitador>0){ //por si viene vacio 
            $paginacion=ceil($delimitador/$lim); //cantidad de links
            $enlaces= '';
            for($i=0;$i<$paginacion;$i++){
                $v=$i+1;
                $enlaces.= '<input class="btn btn-default btn-md" type="submit" form="buzon" name="pag" value='.$v.' title='.$v.'>';
                $posiciones[$i]=$i*$lim;
                $_SESSION['paginacion']=$enlaces;
            }
            }else{
                $_SESSION['paginacion']='';
                $posiciones = array();
            }            
            return $posiciones; 
        }
    }