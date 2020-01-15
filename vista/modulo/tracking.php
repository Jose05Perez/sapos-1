<?php
  $track = new Tracking();
  if (isset($_POST['submit'])){
  $datos = $track->estadoCorresp($_POST['code'])[0];
  }
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Emisor

    <small>Herramienta del emisor</small>

    </h1>
    
  
    <section class="content">
        <form id="validacion" action="#" method="post">
<div class="box box-default">

        <div class="box-header with-border">
        <label for="code"> Codigo de tracking:</label>
        <div class="input-group input-group-md">
                <input type="text" name="code" class="form-control" placeholder="Ingrese su codigo de seguimiento">
                    <span class="input-group-btn">
                      <button type="submit" name="submit" form="validacion" class="btn btn-info btn-flat">Enviar</button>
                    </span>
              </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        
        
        
       

           

            <?php if(isset($_POST['submit'])){
               
                switch ($datos["estado"]){
                        case 'pg': $estado=array('warning','70%'); break;
                        case 'pe': $estado= array('danger', '40%'); break;
                        default: $estado= array('success', '100%'); break;
                    }
            ?>

            <div class="box-body">
              <div class="progress  active">
                <div class="progress-bar progress-bar-<?=$estado[0]?> progress-bar-striped"  role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?=$estado[1]?>">
                  <span class="sr-only">40% Complete (success) </span>
                </div>
              </div>
            </div>
            <?php if(isset($_POST['submit'])){?>
            <?php } ?>
            
            <!-- /.box-header -->
            <div class="box-body">
              <div class="mailbox-read-info">
                <?php 
                  

                   // $datos['caracter'] => im 
                   //$ruta = recibido
                  //  echo $archcontenido= date_format($f,'Y/F');
                  // $datos['contenido'] 
                  // $datos['autorizado'] => 1 

                   $autoridad=($datos['autorizado'] == 1)?  array('warning','Autorizado'):array('danger','No Autorizado'); 
                   $alcance=($datos['status_persona'] == 4)?  array('success','interno'):array('warning','externo'); 
                   $acceso= ($datos['privado'] == 0 )? array('primary','privado'): array('info','publico');
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
                   $fe = new DateTime($datos['fecha_emision']); $fechaE=date_format($fe,'d-F-Y');
                   $fr = new DateTime($datos['fecha_recibido']); $fechaR=date_format($fr,'l,d-F-Y');
                   


                ?>
                <div class="pull-right"> 
                   <h4>
                   <span class="label label-<?=$autoridad[0];?>" ><?= $autoridad[1];?></span>
                    <span class="label label-<?=$acceso[0];?>" ><?= $acceso[1];?></span>
                    <span class="label label-<?=$alcance[0];?>" ><?= $alcance[1];?></span> 
                    <span class="label label-<?=$estado[0];?>" ><?= $estado[1];?></span>
                  </h4>
                </div>
                <h2><strong><?=$datos['asunto'];?></strong></h2>
                <h5>
                  <?php 
                  if(isset($_SESSION['env'])){
                    echo 'Para: <b>'.ucwords($datos['nombre']).'</b>    ('.$datos['correo_electronico'].')<br> De: usted';
                  }
                  else{
                    echo "De: <b>".ucfirst($datos['nombre'])."</b>   ({$datos['correo_electronico']})";
                  }
                  ?>
                  <span class="mailbox-read-time pull-right">Enviado el: <?php  echo $fechaE;?></span></h5>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border pull-right" >
                 <?php if($datos['estado']=='pe' ||$datos['estado']=='pg' ) {?>
                  <button type="button" class="btn btn-sm" data-toggle="tooltip" title="" data-original-title="recibido">
                  <i class="fa fa-check "></i> marcar como recibido</button>                 
                 <?php }if ($datos['estado']=='pe' ){?>
                  <button type="button" class="btn btn-sm" data-toggle="tooltip" title="" data-original-title="recibido">
                  <i class="fa fa-check text-info"></i> marcar como recibido</button>
                  <?php  } ?>
              </div>
              <div class="mailbox-controls with-border">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Delete">
                    <i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Reply">
                    <i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="" data-original-title="Forward">
                    <i class="fa fa-share"></i></button>
                <!-- /.btn-group -->
                  <button type="button " class="btn btn-default btn-sm" data-toggle="tooltip" title="" data-original-title="Print">
                  <i class="fa fa-print"></i></button>
                </div>
              </div>              
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
              <?php 
                  if(!is_null($datos['contenido'])){
                    $rutaArch= "recursos/correspondencias/{$datos['contenido']}";
                    if(!file_exists($rutaArch)){
                        $arch= fopen ($rutaArch,'c+');
                        fwrite($arch,"<h1>nuevo Archivo</h1>toy solterosky");
                        fclose($arch);              
                      }
                        $arch= fopen ($rutaArch,'r');
                        $correspondencia=fread($arch, filesize($rutaArch));
                        fclose($arch);
                        echo $correspondencia;                   
                    }
                   // } 
                ?>
              </div>
              <hr>
              <!-- /.mailbox-read-message -->
              <span class="pull-right " ><?=$recibidoFecha = (is_null($datos['fecha_recibido']))? '': '<b>Recibido el dia: 
              </b> '.$fechaR.'&emsp;';?></span>
            </div>
            <?php }?>
            
        </form>
        </div>

    </section>
</div>

