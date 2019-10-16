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
              <li class="active"><a href="#"><i class="fa fa-inbox"></i> Pendiente
                <span class="label label-primary pull-right">00-Var-consulta</span></a></li>
              <li><a href="#"><i class="fa fa-envelope-o"></i>Leidos</a></li>
              <li><a href="#"><i class="fa fa-file-text-o"></i> Pendientes</a></li>
              <li><a href="#"><i class="fa fa-filter"></i>En espera<span class="label label-warning pull-right">00-var-consulta</span></a>
              </li>
            </ul>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /. box -->
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Caracteristica</h3>

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


        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ingresar nueva correspondencia</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <input class="form-control" placeholder="Para:">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Asunto:">
              </div>
              <div class="form-group">
                    <textarea id="compose-textarea" class="form-control" style="height: 300px">
                      <h1><u>Encabezado</u></h1>
                      <h4>Subtitulo</h4>
                      <p>contenid de correspondencia</p>
                      
                      <p>nota,</p>
                      <p>usuario **** ADiractory</p>
                    </textarea>
              </div>
              <div class="form-group">
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> Archivo Adjunto
                  <input type="file" name="attachment">
                </div>
                <p class="help-block">Max. 32MB</p>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> guardar</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button>
              </div>
              <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Borrar</button>
            </div>
            <!-- /.box-footer -->
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
</script>
