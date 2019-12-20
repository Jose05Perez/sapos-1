<?php
 $control = new mesaEntrada();
 $btn= new botones();

 $fil= new cabezote();// filtros
 $fil->notificaciones();
 foreach (array_keys($_SESSION['notificaciones']) as $key) {
    $var[$key]=$_SESSION['notificaciones'][$key];
 }  
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
              <li><a href="mesaEntrada_t" ><i class="fa fa-inbox"></i>Todos <small>(recibidos)</small>
                <span class="label label-default pull-right"><?=$var['pendientes']+$var['pgestion']> 0?$var['pendientes']+$var['pgestion']:'';?></span></a></li>
              <li><a href="mesaEntrada_in"><i class="fa fa-university"></i>Internos
                <span class="label label-warning pull-right"><?=$var['internos'] > 0 ? $var['internos']:'';?></span></a></li>
              <li><a href="mesaEntrada_ex"><i class="fa fa-globe"></i>Externos
                <span class="label label-danger pull-right"><?=$var['externos'] > 0 ? $var['externos'] : '';?></span></a></li>
              <li><a href="mesaEntrada_en"><i class="fa fa-send"></i>Enviados
                <span class="label label-success pull-right"></span></a></li>
              <li><a href="mesaEntrada_pe"><i class="fa fa-envelope"></i> Pendientes
                <span class="label label-info pull-right"><?= $var['pendientes']> 0 ? $var['pendientes']:'';?></span></a></li>
              <li><a href="mesaEntrada_pg"><i class="fa fa-tag"></i>Con plazo de gestion
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
            <form action="<?=$_GET['ruta'] ?>" method="post" id="buzon">
            <table class="table table-hover table-striped">

                <?php
                      if(isset($_POST['eliminar']) && isset($_POST['seleccionado']) ){
                        echo "<script>confirm('seguro que desea Borrar');</script>";
                        
                          $btn->eliminar($_POST['seleccionado'],$_SESSION['idFe']);
                          unset($_POST['seleccionado'],$_SESSION['idFe'],$_POST['eliminar']);
                      }elseif(isset($_POST['eliminar']) && !(isset($_POST['seleccionado'])) ){
                        echo "<script>alert('sebe seleccionar');</script>";
                      }
                      echo $control->bandejaLoad();
                  ?>
              </table>
              <!-- /.table -->
              </form>
              
            </div>
            <!-- /.mail-box-messages -->
          </div>
          <!-- /.box-body -->
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