<?php
 $control = new mesaEntrada();
 $ente = $control->bandeja();
 $btn = new botones();

 $fil= new cabezote();// filtros
 $fil->pendientes();
 $fil->pgestion();
//varibles consulta
  $internos=$_SESSION['internos'];
  $externos=$_SESSION['externos'];
  $pendientes=$_SESSION['pendientes'];
  $gestion=$_SESSION['pgestion'];
  $todos= $pendientes+$gestion ;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Mesa de Entrada
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Mesa de entrada</li>
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
              <li><a href="mesaEntrada_re" ><i class="fa fa-inbox"></i>Todos
                <span class="label label-default pull-right"><?php if($todos>0){echo $todos;}?></span></a></li>
              <li><a href="mesaEntrada_in"><i class="fa fa-university"></i>Internos
                <span class="label label-warning pull-right"><?php if($internos>0){echo $internos;}?></span></a></li>
              <li><a href="mesaEntrada_ex"><i class="fa fa-globe"></i>Externos
                <span class="label label-danger pull-right"><?php if($externos>0) {echo $externos;}?></span></a></li>
              <li><a href="mesaEntrada_en"><i class="fa fa-send"></i>Enviados
                <span class="label label-success pull-right"></span></a></li>
              <li><a href="mesaEntrada_pe"><i class="fa fa-envelope"></i> Pendientes
                <span class="label label-info pull-right"><?php if($pendientes>0){echo $pendientes;}?></span></a></li>
              <li><a href="mesaEntrada_pg"><i class="fa fa-tag"></i>Con plazo de gestion
                <span class="label label-primary pull-right"><?php if($gestion>0){echo $gestion;}?></span></a></li>
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
              <li><a href="mesaEntrada_ur"><i class="fa fa-circle-o text-red"></i>Urgente</a></li>
              <li><a href="mesaEntrada_im"><i class="fa fa-circle-o text-yellow"></i> Importante</a></li>
              <li><a href="mesaEntrada_ge"><i class="fa fa-circle-o text-light-blue"></i> Generico</a></li>
            </ul>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">buzon</h3>

            <div class="box-tools pull-right">
              <div class="has-feedback">
                <input type="text" class="form-control input-sm" placeholder="Search Mail">
                <span class="glyphicon glyphicon-search form-control-feedback"></span>
              </div>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <div class="mailbox-controls">
              <!-- Check all button -->
              <!--button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
              </-->
              <div class="btn-group">
                <button type="submit" class="btn btn-default btn-sm" form="buzon" name="eliminar"><i class="fa fa-trash-o"></i></button>
                <button type="submit" class="btn btn-default btn-sm" form="buzon"><i class="fa fa-reply"></i></button>
                <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
              </div>
              <!-- /.btn-group -->
              <button type="button" class="btn btn-default btn-sm" ><i class="fa fa-refresh"></i></button>
              <div class="pull-right">
                00/00-indice
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                </div>
                <!-- /.btn-group -->
              </div>
              <!-- /.pull-right -->
            </div>
            <div class="table-responsive mailbox-messages">
            <form action="mesaEntrada" method="post" id="buzon">
            <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th><i class="fa fa-check-square"></i></th>
                    <th>Caracter</th>
                    <th>Emisor</th>
                    <th>Correspondencia</th>
                    <th>Adjuntos</th>
                    <th>Fecha de emision</th>
                    <th>Estado</th>
                    <th>Autorizado</th>
                    <th>Privado</th>
                  </tr>
                </thead>
                <tbody>

                <?php
                       
                      //$ente----array
                      $fe=0;$idFe=array();
                      foreach ($ente as $key){
                         $idFe[$fe]=$key['id_correspondencia']; 
                          echo '<tr>
                              <td><input type="checkbox" name="seleccionado[]" value="'.$fe.'"></td>
                              <td><i class="fa fa-circle-o text-';
                          switch ($key['caracter']){
                              case 'im':   echo 'yellow';  
                              break;        
                              case 'ur':    echo 'red'; 
                              break;
                              case 'ge' :   echo 'light-blue'; 
                              break;
                          } 
                          echo    '"></i></td>     
                                  <td class="mailbox-name">'.$key['emisor'].'</td>
                                  <td class="mailbox-subject"> <b>'.$key['asunto'].'</b> '.$key['descripcion'].'</td>
                                  <td class="mailbox-attachment"><i class="fa fa-clip"></td>
                                  <td class="mailbox-date">'.$key['fecha_emision'].'</td>
                                  <td> ';
                                  
                           switch ($key['estado']) {
                             case 'pe':   echo '<span class="label label-info">Pendiente</span>';
                              break;
                             case 'pg':    echo '<span class="label label-primary">En plazo de gestion</span>';
                              break;
                             case 're':   echo '<span class="label label-default">Recibido</span>';
                              break;
                           } 

                          echo '</td> 
                                <td><input type="checkbox" name="autorizado[]" value="'.$fe.'"';
                          if ($key['autorizado']==1){   echo 'checked'; }
                          
                          echo '></td> 
                                <td><input type="checkbox" name="pivado[]" value="'.$fe.'"';
                          if ($key['privado']==1){   echo 'checked'; }
                          echo '></td><tr>';  
                          $fe++;
                          
                      }
                   ?>
                </tbody>
              </table>
              <!-- /.table -->
              </form>

            </div>
            <!-- /.mail-box-messages -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer no-padding">
            <div class="mailbox-controls">
              <!-- Check all button -->
             
              <div class="pull-right">
                1-50/200
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                </div>
                <!-- /.btn-group -->
              </div>
              <!-- /.pull-right -->
            </div>
          </div>
        </div>
        <!-- /. box -->  
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

