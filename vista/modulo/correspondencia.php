<?php
  $btn= new btnMesaEntrada();
  $fil= new Cabezote();
  $fil->notificaciones();   
  foreach (array_keys($_SESSION['notificaciones']) as $key) {
    $var[$key]=$_SESSION['notificaciones'][$key];
  }     
  $mensaje= new Correspondencia();
  $datos = $mensaje-> vista();  
$ruta = 'recursos/correspondencias/'.$datos['contenido'];
$autoridad=($datos['autorizado'] == 1)?  array('warning','Autorizado'):array('danger','No Autorizado'); 
$acceso= ($datos['privado'] == 1 )? array('primary','Privado'): array('info','Publico');
$alcance=($datos['status_persona'] == 4)?  array('success','Interno'):array('warning','Externo'); 
// => 
switch ($datos['estado']) {
  case 'pe':
    $estado = array('info','Pendiente');
    break;
   case 'pg':
    $estado = array('primary','En plazo de gestión'); 
     break;
  default:
    $estado = array('default','Recibido');
    break;
} 
$fe = new DateTime($datos['fecha_emision']); $fechaE=date_format($fe,'d-m-Y');
$fr = new DateTime($datos['fecha_recibido']); $fechaR=date_format($fr,'d-m-Y');
//var_dump($datos);
?>
<!-- Content Wrapper. Contains page content-->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Mesa de Entrada
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li><a href="mesaEntrada">Mesa de entrada</a></li>
      <li class="active">Correspondencia</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-3">
        <a href="emisor" class="btn btn-primary btn-block margin-bottom">Crear correspondencia</a>

        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>

            <div class="box-tools">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">       
              <li><a href="mesaEntrada_t" ><i class="fa fa-inbox fa-2x text-black"></i>Todos <small>(recibidos)</small>
                <span class="label label-default pull-right"><?=$var['pendientes']+$var['pgestion']> 0?$var['pendientes']+$var['pgestion']:'';?></span></a></li>
              <li><a href="mesaEntrada_in"><i class="fa fa-university fa-lg text-green"></i>Internos
                <span class="label label-success pull-right"><?=$var['internos'] > 0 ? $var['internos']:'';?></span></a></li>
              <li><a href="mesaEntrada_ex"><i class="fa fa-globe fa-lg text-yellow"></i>Externos
                <span class="label label-warning pull-right"><?=$var['externos'] > 0 ? $var['externos'] : '';?></span></a></li>
              <li><a href="mesaEntrada_en"><i class="fa fa-send fa-lg text-maroon"></i>Enviados
              <!--   enviados no lleva notifcaciones -->
              <li><a href="mesaEntrada_pe"><i class="fa fa-envelope fa-lg text-teal"></i> Pendientes
                <span class="label label-info pull-right"><?= $var['pendientes']> 0 ? $var['pendientes']:'';?></span></a></li>
              <li><a href="mesaEntrada_pg"><i class="fa fa-tag fa-lg text-info"></i>Con plazo de gestion
                <span class="label label-primary pull-right"><?=$var['pgestion']> 0 ? $var['pgestion']:'';?></span></a></li>
            </ul>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /. box -->
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Caracter</h3>

            <div class="box-tools">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="mesaEntrada_ur"><i class="fa fa-circle-o  fa-lg text-red"></i>Urgente</a></li>
              <li><a href="mesaEntrada_im"><i class="fa fa-circle-o fa-lg text-yellow"></i> Importante</a></li>
              <li><a href="mesaEntrada_ge"><i class="fa fa-circle-o fa-lg text-light-blue"></i> Generico</a></li>
            </ul>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="p-3 border bg-light">
          <div class="box box-primary">
            <div class="box-header with-border">
                <div class="pull-right"> 
                    <span class="label label-<?=$acceso[0];?>" ><?= $acceso[1];?></span>
                   <span class="label label-<?=$autoridad[0];?>" ><?= $autoridad[1];?></span>
                    <span class="label label-<?=$alcance[0];?>" ><?= $alcance[1];?></span> 
                    <span class="label label-<?=$estado[0];?>" ><?= $estado[1];?></span>
                </div>
              <h2 class="box-title"><?=$datos['asunto'];?></h2>
            </div>
            <!-- /.box-header --> 

            <div class="box-body">
              <div class="mailbox-controls">     
                <div class="pull-right">
                <span class="mailbox-read-time">Enviado el: <?php  echo $fechaE;  ?></span>
                  <div class="btn-group">
                      <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Delete">
                        <i class="fa fa-trash-o"></i></button>
                      <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Reply">
                        <i class="fa fa-reply"></i></button>
                      <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Forward">
                        <i class="fa fa-share"></i></button>
                    <!-- /.btn-group -->
                  </div>
                  <div class="btn-group">
                    <?php if($datos['estado']=='pe' ||$datos['estado']=='pg' ) {?>
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" title="" data-original-title="recibido">
                      <i class="fa fa-check "></i> poner en plazo de gestion</button> 
                    <?php } if ($datos['estado']=='pe' ){?>
                      <button type="button" class="btn  btn-sm" data-toggle="tooltip" title="" data-original-title="recibido">
                      <i class="fa fa-check "></i> marcar como recibido</button>                
                    <?php } ?>
                  </div>                                
                </div>
                <h5> 
                  <?php 
                  if(isset($_SESSION['env'])){
                    echo 'Para: <b>'.ucwords($datos['nombre']).'</b>    ('.$datos['correo_electronico'].')<br> De: usted';
                  }
                  else{
                    echo "De: <b>".ucWords($datos['nombre'])."</b>   ({$datos['correo_electronico']})";
                  }
                  ?>
                  
                </h5>
              </div>
              <!-- /.mailbox-controls -->
                  
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <?php if( $datos['contenido'] != NULL ){?>
                  <embed src="<?= $ruta; ?>" type="application/pdf" width="100%" height="500px" />
                <?php } ?>   
                <span class="pull-right " >
                  <?=$recibidoFecha = (is_null($datos['fecha_recibido']))? '': '<b>Recibido el dia:</b> '.$fechaR.'&emsp;';?>
                </span>       
              </div>
              <!-- /.mailbox-read-message -->
              <?php if($datos['adjuntos']!=null){; $adj = explode("#" , $datos['adjuntos']); $nadj=count($adj);?> 
                <div class="box-footer">
                  <ul class="mailbox-attachments clearfix">    
                    <?php for($i=1;$i<$nadj;$i++){
                      $extns=  array('docx','pdf','txt', 'xls', 'doc', 'odt', 'zip' , 'jpg', 'png');$extraer = explode(".",$adj[$i]);
                      $ext=end($extraer);
                      switch ($ext) {
                        case 'odt': $icoExt = array('word',1); break;
                        case 'pdf': $icoExt = array('pdf',1); break;
                        case 'xls': $icoExt = array('excel',0); break;
                        case 'zip': $icoExt = array('zip',0); break;
                        case 'docx': $icoExt =array( 'word',1); break;
                        case 'doc': $icoExt = array('word',1); break;
                        case 'txt': $icoExt = array('text',0);  break;
                        case 'png': $icoExt = array('image',0); break;
                        case 'jpg': $icoExt = array('image',0); break;
                        default: $icoExt = ''; break;
                      }            
                      $download = ($icoExt!=0)?'download': '';
                      ?>          
                      <li>                    
                        <div class="mailbox-attachment-info">
                          <span class="mailbox-attachment-size">
                            <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                          </span>
                          <a href="recursos/adjuntos/<?= $datos['codigo_correspondencia'].'/'.$adj[$i];?>" <?=$download;?> class="mailbox-attachment-name"><i class="fa fa-file-<?=$icoExt[0]?>-o"></i> <?=$adj[$i];?> </a>      
                        </div>
                      </li>
                    <?php } ?>
                  </ul>
                </div>
                <!-- box-footer -->
              <?php }?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
      
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- 
                  if(!is_null($datos['contenido'])){
                    $rutaArch= "recursos/correspondencias/{$datos['contenido']}";
                    if(file_exists($rutaArch)){
                      $arch= fopen ($rutaArch,'r');
                      $correspondencia=fread($arch, filesize($rutaArch));
                      fclose($arch);
                      echo $correspondencia;          
                      }      
                      try
{
    require 'libs/vendor/autoload.php';
    $name = basename(__FILE__, '.php');
    $name="file-name";
    $source = __DIR__ . "/{$name}.docx";

    $phpWord = \PhpOffice\PhpWord\IOFactory::load($source);
    // Adding an empty Section to the document...
    $section = $phpWord->addSection();
    // Adding Text element to the Section having font styled by default...
    $section->addText($data);

    $name=basename(__FILE__, '.php');
    $source = __DIR__ . "/results/{$name}.html";

    // Saving the document as HTML file...
    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
    $objWriter->save($source);


}catch(Exception $e)
{
    echo $e->getLine();
    echo "<br>/";
    echo $e->getMessage();
    echo "<br/>";
    echo $e->getFile();
    exit;
} -->