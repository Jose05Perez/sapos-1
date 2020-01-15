<?php
   
if(isset($_POST['enviar']) && $_POST['contenido']!=false){      
      $contenido =$_POST['contenido'];
  generadorArchivos:{
      $nombre = $_SESSION['usuario']['codigo_depto'].rand(0001,9999).'-'.date('y').'.txt';
      $ruta= "recursos/correspondencias/";
      $rutArch = $ruta . $nombre;
      if(file_exists($rutArch)){
        goto generadorArchivos;
      }
      $arch = fopen($rutArch,"w") or die();
      fwrite($arch,$contenido);
      fclose($arch);
      }
   }
  //  mail('arlessvimare@hotmail.es','no one', 'imwatchingyou');

?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Crear Correo
        <small>herramienta de emisor</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active">Emisor</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="mesaEntrada" class="btn btn-primary btn-block margin-bottom">Mesa de Entrada</a>
           
        
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
              <li><a href="emisor_ur"><i class="fa fa-circle-o fa-lg text-red"></i>Urgente</a></li>
              <li><a href="emisor_im"><i class="fa fa-circle-o fa-lg text-yellow"></i> Importante</a></li>
              <li><a href="emisor_ge"><i class="fa fa-circle-o fa-lg text-light-blue"></i> Genérico</a></li>
            </ul>
          </div>
          <!-- /.box-body -->
      </div>
      <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Autoridad</h3>
            <div class="box-tools">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="emisor_a"><i class="fa fa-lock  fa-lg text-red"></i>No Autorizado</a></li>
              <li><a href="emisor_na"><i class="fa fa-unlock fa-lg text-yellow"></i> Autorizado</a></li>
            </ul>
          </div>
          <!-- /.box-body -->
        </div>
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Acceso</h3>
            <div class="box-tools">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="emisor_pu"><i class="fa fa-square fa-lg text-teal"></i> Público</a></li>
              <li><a href="emisor_pr"><i class="fa fa-square fa-lg text-info"></i> Privado</a></li>
            </ul>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
        </div>


        <div class="col-md-9">
        <form action="<?=$_GET['ruta'];?>" method="post" id="crear">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ingresar nueva correspondencia</h3>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <div class="form-group">
                <input class="form-control" placeholder="Para:" name="destinantario">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Asunto: " name="asunto">
              </div>
              <div class="form-group">
                    <textarea id="contenido" name="contenido" class="form-control" style="height: 300px">
                    </textarea>
              </div>
              <div class="form-group">
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> Archivo Adjunto <?=print_r($_POST);?>
                  <input type="file" name="attachment">
                </div>
                <p class="help-block">Max. 32MB</p>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <button type="submit" class="btn btn-default" id="guardar" name="guardar" form="crear" ><i class="fa fa-pencil"></i> Guardar</button>
                <button type="submit" class="btn btn-primary" id="enviar" name="enviar" form="crear" onclick="conf()" ><i class="fa fa-envelope-o"></i> Enviar</button>
              </div>
              <button type="reset" class="btn btn-default" name="borrar" form="crear"><i class="fa fa-times"></i> Borrar</button>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
        </form>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Page Script -->
 <script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
  $(document).ready(function(){
      $('#contenido').wysihtml5();

      $('#guardar').click(function(e){
        e.preventDefault();
        $('#contenido').text('#contenido').wysihtml5('getText');
        $('#crear').submit();
      });
      
  });
</script>
<!--
<script>function ConfirmDemo() {
//Ingresamos un mensaje a mostrar
var mensaje = confirm("¿Seguro que quieres enviar el archivo?");
//Detectamos si el usuario acepto el mensaje
if (mensaje) {
alert("¡Archivo enviado!");
}
//Detectamos si el usuario denegó el mensaje
else {
alert("¡Haz denegado el mensaje!");
}
}
  </script>"; -->
