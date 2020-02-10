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
        return $this->des->consultaSel($sent)[0]['n']+1;
    }
    function genCodCorresp(){
        $CodigoD= $_SESSION['usuario']['codigo_depto'];$anio=date('Y');
        $sent ="SELECT COUNT(*) AS nc FROM corresp_correspondencia as c 
        JOIN corresp_empleado as e ON c.id_persona_emisor = e.id_persona_empleado  
        WHERE  e.id_departamento_empleado = :depto AND YEAR(c.fecha_emision)= :fecha ";
        $depto =array(':depto'=>$CodigoD,':fecha'=>$anio);     
        $numeracion = $this->des->consultaSel($sent,$depto)[0]['nc']+1; 
        $n=sprintf("%04d", $numeracion);  
        return "{$CodigoD}-{$n}-{$anio}";
    }
    function idBusquedaxNombre($nombre){  
        $sent= "SELECT id_persona AS id FROM corresp_persona WHERE CONCAT(nombre_persona,' ',apellido_persona)= :nombre OR correo_electronico = :nombre";
        $param =  array(":nombre"=>$nombre);
        $f= $this->des->consultaSel($sent,$param)[0]['id'];
        return $f;
    }
    function regContenido($contenido){
      
      require_once 'libs/vendor/autoload.php';
      $nomArch = $this->codigo_correspondencia;
      $phpWord = new \PhpOffice\PhpWord\PhpWord();

      $properties = $phpWord->getDocInfo();
      $properties->setCreator($_SESSION['usuario']['nombre']);
      $properties->setCompany('BNPHU');
      $properties->setTitle($nomArch);
      $properties->setCreated(mktime(0, 0, 0, 3, 12, 2014));

      $section = $phpWord->addSection();

      $cabeza = $section->addHeader();
      $phpWord->addParagraphStyle ('txtctr',array('alignment'=> \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
      $cabeza->addImage("vista/img/logo.jpg",array('width' => 100,'height'=> 117,'alignment'=> \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
      $cabeza->addText( '¡Manos a la obra!', array('bold'=> true), 'txtctr');
      $cabeza->addText('“Año de la Consolidación de la Seguridad Alimentaria”',array(),'txtctr');
      
      $section->addText($nomArch,['bold'=> true]);
      $section->addText("Santo Domingo, DN");
      $section->addText(date('d-M-Y'));

      $section->addText("A: " ,['bold'=> true]);
      $section->addText($_SESSION['usuario']['nombre']);
      
      $section->addText("De: " ,['bold'=> true]);
      $section->addText($_SESSION['usuario']['nombre']);
      
      PhpOffice\PhpWord\Shared\Html::addHtml($section,$contenido);

      $pie = $section->addFooter();
      $pie->addText(
        'Av. César Nicolás Penson # 91, Plaza de la Cultura Juan Pablo Duarte, Gazcue, Santo Domingo, D. N.
        RNC. 401-03133-7 / Tel.: 829-946-2674 / info@bnphu.gob.do', array('name' => 'Tahoma', 'size' => 9),'txtctr'
      );
      $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
      $objWriter->save("recursos/correspondencias/{$nomArch}.docx");

    }
    function regAdjCorresp($adjuntos =array()){
            $carpeta ="recursos/adjuntos/".$this->codigo_correspondencia;$nombreArchivos = "";                   
            mkdir($carpeta,755)or die(); 
            $po= count($adjuntos['error']);
            for($i=0;$i<$po;$i++){     
                    $fs = $carpeta."/".$adjuntos['name'][$i]; 
                    move_uploaded_file($adjuntos['tmp_name'][$i],$fs);
                    $nombreArchivos .= "#".$adjuntos['name'][$i];
                }                  
          return $nombreArchivos;
    }
    function ingresarCorresp($co=array()){
        $ingreso=array(
        'id_correspondencia'=> "corresp{$this->genIdCorresp()}",
        'id_persona_emisor'=>$this->idBusquedaxNombre($_SESSION['usuario']['nombre']),
        'id_persona_receptor'=> $this->idBusquedaxNombre($co['destinatario']),
        'fecha_emision'=>date('y-m-d'),
        'asunto'=>$co['asunto'],
        'codigo_correspondencia'=>$this->codigo_correspondencia,
        'caracter'=>$co['caracter']       
        );
        if(isset($co['privado'])){
            $ingreso['privado']=$co['privado'];
        }
        if(isset($co['autorizado'])){
           $ingreso['autorizado']=$co['autorizado'];
        }
        if(isset($co['contenido'])){
            $ingreso['contenido']=$this->regContenido($co['contenido']);
        }
        if(isset($co['adjuntos'])){
            $ingreso['adjuntos']=$this->regAdjCorresp($co['adjuntos']);
        }
        $this->des->consultaIns('corresp_correspondencia',$ingreso);
    }
    function corroborar(){
        if(isset($_POST['enviar']) && $_POST['contenido']!==false){      
            $adj=($_FILES['adjuntos']['error'][0]==4)?NULL:$_FILES['adjuntos'];
            $cont=$_POST["contenido"]==""?NULL:$_POST["contenido"];   
            
            if(!($cont==NULL && $adj==null)){
              $datos= array(
                "destinatario" =>$_POST["destinatario"],
                "asunto"=> $_POST["asunto"],
                "caracter"=> $_POST["caracter"]
              );
              if (isset($_POST["privado"])){
                $datos['privado']=1;
              }
              if (isset($_POST["autorizado"])){
                $datos['autorizado']=1;
              }
              if(!$cont==null){
                $datos['contenido']=$cont;
              }
              if (!$adj==null){
                $datos['adjuntos']=$adj;
              }
              $this->ingresarCorresp($datos);
            }else{
              echo '<script>alert("debe añadir informacion a esta correspondencia")</script>';
            }
          }
    }
}

// require "libs/vendor/autoload.php";
//       $ruta= "recursos/correspondencias/";
//       $nomArch = $this->codigo_correspondencia.".pdf";

//       $dom = new Dompdf\Dompdf();
//       $dom->loadHtml($contenido);
//       $dom->setPaper('A4', 'portrait'); // (Opcional) Configurar papel y orientación
//       $dom->render(); // Generar el PDF desde contenido HTML
//       $pdf = $dom->output(); // Obtener el PDF generado
//       $arch = fopen($ruta.$nomArch,"w") or die("ya existe el archivo");
//           fwrite($arch,$pdf);
//           fclose($arch);
//           return $nomArch;


