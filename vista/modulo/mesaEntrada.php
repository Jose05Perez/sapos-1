<?php
  $control = new MesaEntrada();
  $btn= new btnMesaEntrada();

  $fil= new Cabezote();
  $fil->notificaciones();
  
  foreach (array_keys($_SESSION['notificaciones']) as $key) {
      $var[$key]=$_SESSION['notificaciones'][$key];
    }    
  //$rf (refrescado Forzoso)
  $rf='<script>window.location="";window.location='.$_GET['ruta'].';</script>';
  //evitar reenvio de formulario, no le vasta con unset() e.e 
  
  $paginas=$_SESSION['paginacion'][1];  

  if(isset($_POST['pag'])){   
    if ($_POST['pag']<=1){
      $_POST['pag']=1;
    }elseif($_POST['pag']>$paginas){
      $_POST['pag']=$paginas;
    }
    $_SESSION['pag']=isset($_POST['pag'])?$_POST['pag']:1;
  }
  //evita perder paginacion en el refrescado forzoso
  

  if(isset($_POST['btn'])){
    switch($_POST['btn']){
      case 'eliminar':  
            if(isset($_POST['seleccionado'])){
        $btn->eliminar($_POST['seleccionado'],$_SESSION['idc']); 
      }else{    
        echo'<script type="text/javascript">alert("seleccione la correspondencia que desea eliminar");</script>';              
      }   
      echo $rf; 
        break;
      case 'refrescar': echo $rf; break;
      case 'reenviar':echo '<script>window.location="emisor"</script>'; break;
      case 'responder':echo '<script>window.location="emisor"</script>'; break;
      default:  break;
    }
  }
  $tabla= $control->bandejaload();  

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
            <h3 class="box-title">Categoría</h3>

            <div class="box-tools">
              
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">       
              <li>
                <a href="mesaEntrada_t" >
                  <i class="fa fa-inbox fa-2x text-black"></i>Todos 
                  <small>(correspondencia recibida)</small>  
                    <?php 
                    $todos = $var['pendientes']+$var['pgestion'];
                    if($todos>0){echo '<span class="label label-default pull-right">'.$todos.'</span>';}?>
                </a>
              </li>
              <li>
                <a href="mesaEntrada_in">
                  <i class="fa fa-university fa-lg text-green"></i>Internos
                    <?=$var['internos'] > 0 ? '<span class="label label-success pull-right">'. $var['internos'].'</span>':'';?>
                </a>
              </li>
              <li>
                <a href="mesaEntrada_ex">
                <i class="fa fa-globe fa-lg text-yellow"></i>Externos
                  <?=$var['externos'] > 0 ? '<span class="label label-warning pull-right">'. $var['externos'].'</span>' : '';?>
                </a>
              </li>
              <li>
                <a href="mesaEntrada_en">
                <i class="fa fa-send fa-lg text-maroon"></i>Enviados
                </a>
              </li>
              <li>
              <a href="mesaEntrada_pe"><i class="fa fa-envelope fa-lg text-teal"></i> Pendientes
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
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">buzon</h3>
            
            <div class="box-tools pull-right">
              <div class="has-feedback">
                <input type="text" class="form-control input-md" placeholder="Search Mail">
                <span class="glyphicon glyphicon-search form-control-feedback"></span>
              </div>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding"  >
          <?php if($tabla[1]==1){?>
            <div class="mailbox-controls">
              <form action="" method="post" id="buzon">
                <div class="">
                  &emsp;
                  <button type="submit" class="btn btn-default btn-md" form="buzon" name="btn" value="refrescar">
                  <i class="fa fa-refresh"></i></button>
                  <button type="submit" class="btn btn-default btn-md" form="buzon" name="btn" value="eliminar">
                  <i class="fa fa-trash-o"></i></button> &emsp;
                  <?php if(isset($_SESSION['env'])){ ?>                   
                      <div class="text-center">
                      <small class="label bg-maroon">
                      Usted esta revisando los mensajes que ha enviado, 
                      si quiere volver a ver los recibidos de un click a la categoría Todos
                      </small>                
                    </div>   
                   <?php   } ?>
                </div><hr>
                <!-- /.btn-group -->                
                <div class="table-responsive mailbox-messages">
                  <table class="table table-hover table-striped" >
                  <?php echo $tabla[0];?>
                  </table>
                  <!-- /.table -->
                </div>
                <?php if($_SESSION['paginacion'][1]>1 ){ ?>
                  <div class=""><hr>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary btn-md" title="anterior" name="pag" 
                      value="<?=$_SESSION['pag']-1;?>"><i class="fa fa-chevron-left"></i></button>

                        <?=$_SESSION['paginacion'][0];?>

                      <button type="submit" class="btn btn-primary btn-md" title="siguente" name="pag" 
                      value="<?=$_SESSION['pag']+1;?>"><i class="fa fa-chevron-right"></i></button>
                    </div>
                    <!-- /.btn-group -->
                  </div>
                <?php } ?><hr>
              </form>              
             </div>
            <!-- /.mail-box-messages -->
              <?php }else{
                echo $tabla[0];
              }?>
                
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