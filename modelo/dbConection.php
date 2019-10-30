<?php
    class mesaEntrada{
        
        private $modelo;
        private $db;
        $cUsuario= array(
        'id'=> $_SESSION['idPersona'];
        'modulo'=> '';//nombre del modulo de la plantilla ()
        'tabla' => '';//nombre de la tabla que usara 
        'solictud' => $_POST['boton sol']; //nombre solicitud activa en el momento
        'filtrotabla' => 'buzon'// 
        'select'=> '';//permite guardar los option cunado se quiera ejucar una accion en 2 o mas correspndencias
        )
    
        public function mostrar($tabla){
            $query = "SELECT * FROM {$tabla}";
            
        }
        public function __constructor{
            this->modelo = array();
            this->db=new PDO("mysql:host=localhost;dbname=correspondencia_bnphu;","root","");

        }
        public function buscar($cadena,$cUsuario){
            $qbuscar = //AGREGAR CORRESPONDENCIA.ID PARA PASARLE DE VALUE EN EL SELECT QUE LE COERRESPONDE EN LA TABLA
            "SELECT(cor.id_correspondencia AS id, cor.estado AS estado , cor.caracter  AS caracter, CONCAT(per.nombre_persona,' ',per.apellido_persona), cor.asunto AS asunto, cor.descripcion AS descripcion, cor.fecha_emision AS fecha_emision cor.fecha_recibo AS fecha_recibo,)
             FROM corresp_correspondencia AS cor LEFT JOIN corresp_persona AS per ON (cor.id_persona_emisor=per.id_persona ) 
            WHERE (cor.id_persona_emisor={$cUsuario['id']} OR cor.id_receptor={$cUsuario['id']}) AND (cor.asunto=LIKE %{$cadena}% OR cor. ) ORDER BY cor.fecha_emision DESC"
            
        }
         public function eliminar($cadena,$cUsuario){
             //necesitaremos papelera de reciclaje en el proximo release
             $idCadena=array();
             foreach ($cUsuario=>select as $id => $idOp) {
                 $idCadena[$id]="id_correspondencia='".$idOp."'"; 
             }
            $qcadena=implode(" OR " ,$idCadena );

            $explodeIdCadena=()
             $qlemininar="UPDATE corresp_correspondencia SET  estado='el' WHERE {$qcadena}";
            }               
         }

        //  $q=$manejo->prepare('select * from corresp_correspondencia');
        //  $q->execute();
         
        //  $c=$q->fetchAll();
        //  print_r($c);
    
    
    


    }
    
    