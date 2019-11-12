<?php


$internos=5;//$_SESSION[];
$externos=4;//$_SESSION[];
$pendientes=5;//$_SESSION[];
$gestion=3;//$_SESSION[];
$todos= $internos+$externos+$pendientes+$gestion;

$urgentes=7;//$_SESSION[];
$importantes=5;//$_SESSION[];
$corrientes=5;//$_SESSION[];

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Mesa de Entrada
      <small>00-varconsulta</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Mesa de Entrada</li>
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
              <li><a href="#?filtro=t" ><i class="fa fa-inbox"></i>Todos
                <span class="label label-default pull-right"><?php if($todos>0){echo $todos;}?></span></a></li>
              <li><a href="#?filtro=i"><i class="fa fa-university"></i>Internos
                <span class="label label-warning pull-right"><?php if($internos>0){echo $internos;}?></span></a></li>
              <li><a href="#?filtro=e"><i class="fa fa-globe"></i>Externos
                <span class="label label-danger pull-right"><?php if($externos>0) {echo $externos;}?></span></a></li>
              <li><a href="#?filtro=en"><i class="fa fa-send"></i>Enviados
                <span class="label label-success pull-right"></span></a></li>
              <li><a href="#?filtro=pe"><i class="fa fa-envelope"></i> Pendientes
                <span class="label label-info pull-right"><?php if($pendientes>0){echo $pendientes;}?></span></a></li>
              <li><a href="#?filtro=pg"><i class="fa fa-tag"></i>Con plazo de gestion
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
              <li><a href="#"><i class="fa fa-circle-o text-red"></i>Urgente</a></li>
              <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Importante</a></li>
              <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Generico</a></li>
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
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
              </div>
              <!-- /.btn-group -->
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
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
                      foreach ($ente as $key){
                        
                          echo '<tr>
                              <td><input type="checkbox" name="recibido" value="1"></td>
                              <td><i class="fa fa-circle-o text-';
                          switch ($key['caracter']){
                              case 'im':   echo 'yellow"></i>';  
                              break;        
                              case 'ur':    echo 'red"></i>'; 
                              break;
                              case 'ge' :   echo 'light-blue"></i>'; 
                              break;
                          } 
                          echo    '</td>     
                                  
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
                                <td><input type="checkbox" name="autorizado'.$key['id_correspondencia'].'"';
                          if ($key['autorizado']==1){   echo 'checked'; }
                          
                          echo '></td> 
                                <td><input type="checkbox" name="pivado'.$key['id_correspondencia'].'"';
                          if ($key['privado']==1){   echo 'checked'; }
                          echo '></td><tr>';
                          
                          
                      }
                ?>
              <!-- /.table -->
            </div>
            <!-- /.mail-box-messages -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer no-padding">
            <div class="mailbox-controls">
              <!-- Check all button -->
              <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
              </button>
              <div class="btn-group">
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
              </div>
              <!-- /.btn-group -->
              <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
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

