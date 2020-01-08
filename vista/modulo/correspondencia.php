<?php
  $control = new MesaEntrada();
  $btn= new btnMesaEntrada();

  $fil= new Cabezote();
  $fil->notificaciones();
   
  foreach (array_keys($_SESSION['notificaciones']) as $key) {
    $var[$key]=$_SESSION['notificaciones'][$key];
  }     
 
  
  //lectura de un archiwi ^w^
    $lectura=fopen("recursos/correspondencias/arch1.txt","r");
    $contenido=fread($lectura,filesize("recursos/correspondencias/arch1.txt"));
    fclose($lectura);

  
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
        <div class="box box-primary ">
          <div class="box-header with-border">
            <h3 class="box-title">ASUNTO</h3>
            
            <div class="box-tools pull-right">
              <div class="has-feedback">
                <input type="text" class="form-control input-md" placeholder="Search Mail">
                <span class="glyphicon glyphicon-search form-control-feedback"></span>
              </div>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <div class="mailbox-controls">
            <form action="" method="post" id="buzon">
              
              <!-- <div class="pull-right">
              <div class="">
                <button type="submit" class="btn btn-primary btn-md" title="anterior" name= "desplazamiento"
                value="<?='';?>"><i class="fa fa-chevron-left"></i></button>
                <button type="submit" class="btn btn-primary btn-md" title="siguente" name="desplazamiento"
                value="<?='';?>"><i class="fa fa-chevron-right"></i></button>
                &emsp;
              </div>
              <!-- /.btn-group --
              </div> -->
              
              <div class="">
              &emsp;
                <button type="submit" class="btn btn-default btn-md" form="buzon" name="btn" value="responder"><i class="fa fa-reply"></i></button>
                <button type="submit" class="btn btn-default btn-md" form="buzon" name="btn" value="reenviar"><i class="fa fa-share"></i></button>
                <button type="submit" class="btn btn-default btn-md" form="buzon" name="btn" value="refrescar"><i class="fa fa-refresh"></i></button>
                <button type="submit" class="btn btn-default btn-md" form="buzon" name="btn" value="eliminar"><i class="fa fa-trash-o"></i></button> 
              </div>
              <div ><?=$contenido?>
              <?php $d=new PrevCorresp();
                    var_dump($d->preView()); ?>
                
                    

                
                <!-- contenido del correo -->
              </div>
              <!-- /.btn-group -->              
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