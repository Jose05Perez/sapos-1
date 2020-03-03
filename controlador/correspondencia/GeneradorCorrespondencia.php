<?php

class GeneradorCorrespondencia{
    protected $codigo_correspondencia;
    protected $id_correspondencia;
    protected $emisor;            
    protected $co;            
    private $des;

    function  __construct($co){
        $this->des = new Conexion();
        $this->codigo_correspondencia= $this->genCodCorresp();
        $this->id_correspondencia= "corresp{$this->genIdCorresp()}";
        $this->emisor = $_SESSION['usuario']['nombre'];   
        $this->co = $co; 
    } 
    function genIdCorresp(){
        $sent = "SELECT COUNT(*) AS n FROM corresp_correspondencia";
        return $this->des->consultaSel($sent)[0]['n']+1;
    }
    function genCodCorresp(){
        $CodigoD= $_SESSION['usuario']['codigo_depto'];$anio=date('Y');
        $sent ="SELECT COUNT(*) AS nc FROM corresp_correspondencia as c 
        JOIN corresp_empleado as e ON c.id_persona_emisor = e.id_persona_empleado  
        WHERE  e.id_departamento_empleado = :depto AND YEAR(c.fecha_emision)= :fecha AND c.contenido != NULL";
        $depto =array(':depto'=>$CodigoD,':fecha'=>$anio);     
        $numeracion = $this->des->consultaSel($sent,$depto)[0]['nc']+1; 
        $n=sprintf("%04d", $numeracion);  
        return "{$CodigoD}-{$n}-{$anio}";
    }
    function idBusquedaxNombre($nombre){  
        echo "<script>alert:('bazinga');</script>";
        $sent= "SELECT id_persona AS id, CONCAT(nombre_persona,' ',apellido_persona) as nom FROM corresp_persona WHERE 
        UPPER(CONCAT(nombre_persona,' ',apellido_persona))= UPPER(:nombre) OR correo_electronico = :nombre";
        $param =  array(":nombre"=>$nombre);
        $f=$this->des->consultaSel($sent,$param)[0];
        return $f;
    }
    function regContenido(){             
        
        setlocale(LC_ALL,"es_ES@euro","es_ES","esp");$fecha=strftime("%d de %B del %Y");
        $de=ucwords($this->idBusquedaxNombre($this->emisor)['nom']);
        $a=ucwords($this->idBusquedaxNombre($this->co['destinatario'])['nom']);

        require "libs/vendor/autoload.php";
        $ruta= "recursos/correspondencias/";
        $nomArch = $this->codigo_correspondencia.".pdf";
        $dom = new Dompdf\Dompdf();
        require_once "recursos/plantillaCorrespondencia.php";
        $dom->loadHtml($arch);
        $dom->setPaper('A4', 'portrait'); // (Opcional) Configurar papel y orientación
        $dom->render(); // Generar el PDF desde contenido HTML
        $pdf = $dom->output(); // Obtener el PDF generado
        $arch = fopen($ruta.$nomArch,"w") or die("ya existe el archivo");
        fwrite($arch,$pdf);
        fclose($arch);
        return $nomArch;
    }
    function regReenvios(){
        $_SESSION['renv']['contenido'];
        
    }
    function regAdjCorresp($adjuntos =array()){
            $carpeta ="recursos/adjuntos/".$this->codigo_correspondencia;
            $nombreArchivos = "";                   
            mkdir($carpeta,755)or die(); 
            $po= count($adjuntos['error']);
            for($i=0;$i<$po;$i++){     
                    $fs = $carpeta."/".$adjuntos['name'][$i]; 
                    move_uploaded_file($adjuntos['tmp_name'][$i],$fs);
                    $nombreArchivos .= "#".$adjuntos['name'][$i];
                }                  
          return $nombreArchivos;
    }
    function ingresarCorresp(){
        setlocale(LC_TIME,"es_es.UTF-8");
        $ingreso=array(
        'id_correspondencia'=> $this->id_correspondencia,
        'id_persona_emisor'=>$this->idBusquedaxNombre($this->emisor)['id'],
        'id_persona_receptor'=> $this->idBusquedaxNombre($this->co['destinatario'])['id'],
        'fecha_emision'=>date("Y-m-d G:i:s"),
        'asunto'=> $this->co['asunto'],        
        'caracter'=>$this->co['caracter']       
        );
        if(isset($this->co['privado'])){
            $ingreso['privado']=$this->co['privado'];
        }
        if(isset($this->co['autorizado'])){
           $ingreso['autorizado']=$this->co['autorizado'];
        }
        if(isset($this->co['contenido'] )){
            if(isset($_SESSION['renv']['contenido'])){
                $this->regReenvios();                
            }

            $ingreso['contenido']=$this->regContenido();
        }
        if(isset($this->co['adjuntos'])){
            $ingreso['adjuntos']=$this->regAdjCorresp($this->co['adjuntos']);
        }
       $this->des->consultaIns('corresp_correspondencia',$ingreso);
    }
}
//////////////PDF//////////////////////////
    //         require "libs/vendor/autoload.php";
    //         $ruta= "recursos/correspondencias/";
    //         $nomArch = $this->codigo_correspondencia.".pdf";
    //         $dom = new Dompdf\Dompdf();
    //         require_once "recursos/plantillaCorrespondencia.php";
    //         $dom->loadHtml($arch);
    //         $dom->setPaper('A4', 'portrait'); // (Opcional) Configurar papel y orientación
    //         $dom->render(); // Generar el PDF desde contenido HTML
    //         $pdf = $dom->output(); // Obtener el PDF generado
    //         $arch = fopen($ruta.$nomArch,"w") or die("ya existe el archivo");
    //         fwrite($arch,$pdf);
    //         fclose($arch);
    //         return $nomArch;

/////////// DOCX///////////////////////////

    // setlocale(LC_ALL,"es_ES@euro","es_ES","esp");$fecha=strftime("%d de %B del %Y");
    // $de=ucwords($this->idBusquedaxNombre($this->emisor)['nom']);
    // $a=ucwords($this->idBusquedaxNombre($this->co['destinatario'])['nom']);

    // require_once 'libs/vendor/autoload.php';      
    // $phpWord = new \PhpOffice\PhpWord\PhpWord();

    // $properties = $phpWord->getDocInfo();
    // $properties->setCreator($this->emisor);
    // $properties->setCompany('BNPHU');
    // $properties->setTitle($this->codigo_correspondencia);
    // $properties->setCreated(mktime(0, 0, 0, 3, 12, 2014));

    // $section = $phpWord->addSection();

    // $cabeza = $section->addHeader();
    // $phpWord->addParagraphStyle ('txtctr',array('alignment'=> \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'lineHeight'=>1,));
    // $cabeza->addImage("vista/img/logo.jpg",array('width' => 75,'height'=> 82,'alignment'=> \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
    // $cabeza->addText( '¡Manos a la obra!', array('name'=> 'calibri', 'size'=>10), 'txtctr');
    // $cabeza->addText('“Año de la Consolidación de la Seguridad Alimentaria”',array('name'=> 'calibri', 'size'=>9),'txtctr');

    // $phpWord->addFontStyle ('ffecha',array('name'=>'Times New Roman', 'size'=>12));
    // $phpWord->addParagraphStyle ('lhfecha',array('lineHeight'=>0.6,"spaceBefore" => 0, "spaceAfter" => 0, "spacing" => 0));

    // $section->addText($this->codigo_correspondencia,['name'=> 'Times New Roman', 'size'=>10, 'bold'=> true],'lhfecha');
    // $section->addText("Santo Domingo, DN",'ffecha','lhfecha');
    // $section->addText($fecha,'ffecha','lhfecha');
    // $section->addTextbreak();


    // $phpWord->addFontStyle ('fdestinatario',array('name'=>'calibri', 'size'=>12));
    // $phpWord->addParagraphStyle ('lhdestinatario',array('lineHeight'=>2.0));

    // $destinatario = $section->addTextRun();
    // $destinatario->addText("A \r\t\t:\r\t" ,['fdestinatario','bold'=> true],'lhdestinatario');
    // $destinatario->addText($a, 'fdestinatario', 'lhdestinatario');   
    // $section->addTextbreak();

    // $remitente = $section->addTextRun();
    // $remitente->addText("De \r\t\t:\r\t" ,['fdestinatario','bold'=> true],'lhdestinatario');
    // $remitente->addText($de, 'fdestinatario', 'lhdestinatario');
    // $section->addTextbreak();

    // $asunto = $section->addTextRun();
    // $asunto->addText("Asunto \r\t:\r\t" ,['bold'=> true]);
    // $asunto->addText( $this->co['asunto']);
    // $section->addTextbreak();$section->addTextbreak();


    // PhpOffice\PhpWord\Shared\Html::addHtml($section,$this->co['contenido']);
    // $section->addTextbreak();

    // $desc = $section->addFooter();
    // $desc->addText($de,array('fdestinatario','bold'=>true));
    // $desc->addText($_SESSION['usuario']['puesto'].' '.$_SESSION['usuario']['departamento'],'fdestinatario');

    // $pie = $section->addFooter();
    // $pie->addText(
    //   "Av. César Nicolás Penson # 91, Plaza de la Cultura Juan Pablo Duarte, Gazcue, Santo Domingo, D. N.
    //  \r\n RNC. 401-03133-7 / Tel.: 829-946-2674 / info@bnphu.gob.do", array('name'=> 'calibri', 'size'=>10),'txtctr'
    // );
    // $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    // $objWriter->save("recursos/correspondencias/{$this->codigo_correspondencia}.docx");