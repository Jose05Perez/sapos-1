<?php
     
if(isset($_POST['enviar']) && $_POST['contenido']!==false){      
  $adjunto="";
  $priv=isset($_POST["privado"])?1:0;
  $auto=isset($_POST["autorizado"])?1:0;
  $cont=isset($_POST["contenido"])?$_POST["contenido"]:'';   
  
  $arr=array();
  $contenido =$_POST['contenido'];
  $nombre = $_SESSION['usuario']['codigo_depto'].rand(0001,9999).'-'.date('y');
  generadorArchivos:{
    $ruta= "recursos/correspondencias/";
    $rutArch = $ruta . $nombre.'.txt';
    if(file_exists($rutArch)){
      goto generadorArchivos;
    }
    $arch = fopen($rutArch,"w") or die();
    fwrite($arch,$contenido);
    fclose($arch);
  }
  if (isset($_FILES['adjunto']['size'])<=30000){
    $rutaAdj="recursos/adjuntos";
    $carpeta=$rutaAdj.'/'.$nombre; 
    mkdir($carpeta, 755);
    $ficheroSubido= $carpeta.'/'.$_FILES['adjunto']['name'];
    if(!file_exists($ficheroSubido)){
      move_uploaded_file($_FILES['adjunto']['tmp_name'], $ficheroSubido);
      $adjunto = $ficheroSubido;
    }
  } else{echo "<script>alert('archivo con mucho espacio.');</script>";}
  //echo "<script>alert('Eviado Exitosamente');</script>";
  //echo "<script>window.location='".$_GET['ruta']."';</script>";
  
  $datos= array(
    "destinatario" =>$_POST["destinantario"],
    "asunto"=> $_POST["asunto"],
    "caracter"=> $_POST["caracter"],
    "contenido"=>$cont,
    "autorizado"=> $auto,
    "privado"=> $priv,
    "adjunto"=> $adjunto
  );
  $insertado = new Ingreso();
  $insertado->ingresoCorresp($datos);
}
  
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
          <a  href="mesaEntrada" class="btn btn-primary btn-block margin-bottom">Mesa de Entrada</a>        
       </div>
        <div class="col-md-9">
        <form action="<?=$_GET['ruta'];?>" method="post" id="crear" enctype="multipart/form-data">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ingresar nueva correspondencia</h3>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <div class="row">
                <div class="col-md-9">                  
                  <div class="form-group">
                    <input type="email" required class="form-control" placeholder="Para:" name="destinantario">
                  </div>
                  <div class="form-group">
                    <input type="text" required class="form-control" placeholder="Asunto: " name="asunto">
                  </div>                  
                </div>
                <div class="col-md-3">                  
                  <div class="form-group">
                    <div class="form-control  bg-yellow"><i class="fa fa-shield"></i> Autorizado <input type="checkbox" class="" name="autorizado" id=""></div>
                    <div class="form-control  bg-green"><i class="fa fa-shield"></i> Privado <input type="checkbox" class="" name="privado" id=""></div>
                    <select class="form-control " role="group" name="caracter">
                      <option class="btn btn-default text-light-blue" value="ge"><i class='fa fa-circle-o'></i> Genérico</option>
                      <option class="btn btn-default text-yellow" value="im"><i class='fa fa-circle-o '></i> Importante</option>
                      <option class="btn btn-default text-red" value="ur"><i class='fa fa-circle-o '></i> Urgente</option>
                    </select>  
                  </div>
                </div>
              </div>
              
              
              <div class="form-group">
                    <textarea id="contenido" name="contenido" class="form-control" style="height: 300px">
                    </textarea>
              </div>
              <div class="form-group">
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> Archivo Adjunto 
                  <input type="file" name="adjunto">
                </div>
                <p class="help-block">Tamaño máximo por archivo: 32MB</p>
              </div>
            </div>
            <div>
            <?=print_r($_POST);print_r($_FILES)?>
          <div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <!-- <button type="submit" class="btn btn-default" id="guardar" name="guardar" form="crear" ><i class="fa fa-pencil"></i> Guardar</button> -->
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
