<?php        
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Emisor Externo <small>seguimiento de correspondencias enviadas </small></h1>
    </section>
    <section class="content">
      <form id="validacion" action="#" method="post">
        <div class="box box-default">
          <div class="box-header with-border">
            <label for="code"> Correo de emisor:</label>
            <input type="email" name="correo" class="form-control" placeholder="Ingrese su correo" required > <br>
            <label for="code"> Codigo de tracking:</label>
            <div class="input-group input-group-md">
              <input type="text" name="code" class="form-control" placeholder="Ingrese su codigo de seguimiento" required>
              <span class="input-group-btn">
                <button type="submit" name="submit" form="validacion" class="btn btn-info btn-flat">Buscar</button>
              </span>
            </div>
          </div>
       <?php  
            if(isset($_POST['submit'])){     
            $track = new Tracking();
            $datos = $track->estadoCorresp($_POST['code'],$_POST['correo']);
            if(is_array($datos)){
              
              $autoridad=($datos['autorizado'] == 1)?  array('warning','Autorizado'):array('danger','No Autorizado'); 
              $acceso= ($datos['privado'] == 0 )? array('primary','privado'): array('info','publico');
              // => 
              switch ($datos['estado']) {
                case 'pe':  $estado = array('info','Pendiente'); $barra=array('danger', '30%'); break;
                case 'pg':  $estado = array('primary','En plazo de gestión');  $barra=array('warning','70%');    break;                        
                default:    $estado = array('default','Recibido'); $barra=array('success', '100%');  break;
              } 
              $fe = new DateTime($datos['fecha_emision']); $fechaE=date_format($fe,'d-F-Y');
              $fr = new DateTime($datos['fecha_recibido']); $fechaR=date_format($fr,'l,d-F-Y');  
              
              if(!is_null($datos['contenido'])){
                $rutaArch= "recursos/correspondencias/{$datos['contenido']}";                   
                  $arch= fopen ($rutaArch,'r');
                  $correspondencia=fread($arch, filesize($rutaArch));
                  fclose($arch);                 
              }     
          ?>
          <br>
          <div class="box-body">
            <div class="progress active">              
              <div class="progress-bar progress-bar-<?=$barra[0]?> progress-bar-striped" role="progressbar" 
              aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?=$barra[1]?>">                 
              </div>
            </div>
            <div class="mailbox-read-info">
              <div class="pull-right"> 
                <h4>
                  <span class="label label-<?=$autoridad[0];?>" ><?= $autoridad[1];?></span>
                  <span class="label label-<?=$acceso[0];?>" ><?= $acceso[1];?></span>
                  <span class="label label-<?=$estado[0];?>" ><?= $estado[1];?></span>
                </h4>
              </div>
                <h2><strong><?=$datos['asunto'];?></strong></h2>
                <h5><span class="mailbox-read-time pull-right">Enviado el: <?= $fechaE;?></span></h5>
                <small>Para: <b><?=ucwords($datos['nombre'])?></b> (<?=$datos['correo_electronico']?>)<br></small>
              </div>
              <!-- /.mailbox-read-info -->             
              <div class="mailbox-read-message">
              <?= $arch = (isset($correspondencia))?$correspondencia:'vacio';?>
              </div>
              <hr>
              <!-- /.mailbox-read-message -->
              <span class="pull-right " ><?=$recibidoFecha = (is_null($datos['fecha_recibido']))? '': '<b>Recibido el dia: 
              </b> '.$fechaR.'&emsp;';?></span>
            </div>
                  
          <?php
              }else{
                echo '&emsp;<div class="label text-red"><i class="fa fa-exclamation"></i> verifique sus datos ingresados y vuelva a intentarlo</div><hr>';
              }
            }
          ?>
        </div>  
      </form>
    </section>
</div>
