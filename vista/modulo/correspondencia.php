<?php
  $btn= new btnMesaEntrada();
  $fil= new Cabezote();
  $fil->notificaciones();   
  foreach (array_keys($_SESSION['notificaciones']) as $key) {
    $var[$key]=$_SESSION['notificaciones'][$key];
  }     
  $mensaje= new Correspondencia();
  $datos = $mensaje-> vista();

  
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
              <li><a href="mesaEntrada_en"><i class="fa fa-send fa-lg text-danger"></i>Enviados
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
              <button type="but0ton" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
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
              <h3 class="box-title"></h3>

              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="mailbox-read-info">
                <?php 
                   $alcance=($datos['status_persona'] == 4)?  array('success','interno'):array('warning','externo'); 
                   $acceso= ($datos['privado'] == 0 )? array('primary','privado'): array('teal','publico');
                   // => 
                   switch ($datos['estado']) {
                     case 'pe':
                       $estado = array('info','Pendiente');
                       break;
                      case 'pg':
                       $estado = array('primary','En plazo de gestión'); 
                        break;
                     default:
                       $estado = array('grey','Recibido');
                       break;
                   } 
                   // $datos['caracter'] => im 
                   //$ruta = 
                  //  echo $archcontenido= date_format($f,'Y/F');
                  // $datos['contenido'] 
                   $lectura=fopen("recursos/correspondencias/arch1.txt","r");
                   $contenido=fread($lectura,filesize("recursos/correspondencias/arch1.txt"));
                   fclose($lectura);
                   $f = new DateTime($datos['fecha_emision']); $fecha=date_format($f,'d-F-Y');
                   // $datos['adjuntos'] => )
                   
                // fopen()   
                // $datos['nombre'] => ernesto hernadez 
                // $datos['correo_electronico'] => ehernadezdgii.gob.do 
                // $datos['asunto'] => prueba 4 
                // $datos['autorizado'] => 1 
                ?>
                <h5><span class="label" ></span></h5>
                <h3><?=$datos['asunto'];?></h3>
                <h5>
                  <?php 
                  if(isset($_SESSION['env'])){echo 'Para: <b>'.ucwords($datos['nombre']).'</b>    ('.$datos['correo_electronico'].')<br> De: usted';}
                  else{echo "De: <b>".ucfirst($datos['nombre'])."</b>   ({$datos['correo_electronico']})";}
                  ?>
                  <span class="mailbox-read-time pull-right"><?php  echo $fecha;?></span></h5>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Delete">
                    <i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Reply">
                    <i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Forward">
                    <i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="" data-original-title="Print">
                  <i class="fa fa-print"></i></button>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
              <?=$contenido;?>
              </div>
              <hr>
              <?php print_r($datos);?>
              <!-- /.mailbox-read-message -->
              <span class="pull-right " ><?=$recibidoFecha = (is_null($datos['fecha_recibido']))? '': '<b>Recibido el dia: </b> '.date_format($f,'l, d F Y').'&emsp;';?></span>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <ul class="mailbox-attachments clearfix">
                <li>
                  <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Sep2014-report.pdf</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                <li>
                  <span class="mailbox-attachment-icon"><i class="fa fa-file-word-o"></i></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> App Description.docx</a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                <li>
                  <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo1.png" alt="Attachment"></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo1.png</a>
                        <span class="mailbox-attachment-size">
                          2.67 MB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                <li>
                  <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo2.png" alt="Attachment"></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo2.png</a>
                        <span class="mailbox-attachment-size">
                          1.9 MB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
              </ul>
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <div class="pull-right">
                <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
                <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
              </div>
              <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
              <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
      
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->