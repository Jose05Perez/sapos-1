<!-- content wrapper -->
<div class="content-wrapper">
  <!-- content header -->
  <section class="content-header">
    <h1>
      Archivistica
    </h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i>Inicio</a></li>
      <li><a href="#"><i class="fa fa-file-text"></i>Archivo</a></li>
    </ol>
  </section>
  
  
  <!-- Main content -->
  <section class="content">
    <!-- row -->
    <div class="row">
      <!-- col-md-9-->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Archivos</a></li>
              <li><a href="#timeline" data-toggle="tab">historial</a></li>
              <!-- tab-pane -->
            </ul>
            <!--====================================================================================
              tab-panel CONTENT
            ======================================================================================-->
            <div class="tab-content">
              <!-- ============================ tree view  ====================================== -->
              <div class="active tab-pane" id="activity">
                <form action="isadG" method="post">
                  <!-- Post -->
                  <div class="post">
                    <div class="form-group">
                      <input class="form-control " type="search" id="busquedaArchivo" placeholder="Nueva busqueda ...">
                    </div>
                    <!-- /.user-block -->
                  </div>
                  <!-- /.post -->
                  <!-- Post -->
                  <div class="post">
                      <button  class="btn btn-danger pull-right" type="submit" name="nivelDescripcion" value="fondo" onClick="window.location='isadG'">
                      <i class="fa fa-plus"></i> Nuevo fondo</button>
                      <h3><i class="fa fa-university "></i>                      
                      <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                      Fondos 
                      </a></h3>
                       <div class="collapse" id="collapseExample">
                      <div class="card card-body">  </div>
                    <div id="header">
                      <ul class="nav">
                            <li><a href="#">Fondo1</a></li>
                      </ul>
                      </div>
                  </div>
                      <label class="label label-danger"> Cantidad total de fondos registrados: 00-var</label>
                  </div>
                  <!-- /.post -->

                  <!-- Post -->
                  <div class="post">
                    <button class="btn btn-primary pull-right" type="submit" name="nivelDescripcion" value="seccion" onClick="window.location='isadG'">
                    <i class="fa fa-plus"></i> Nueva seccion</button>
                    <h3><i class="fa fa-th "></i> 
                    <a data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Secciones  
                      </a></h3>
                       <div class="collapse" id="collapseExample1">
                      <div class="card card-body">  </div>
                      <div id="header">
                      <ul class="nav">
                            <li><a href="#">Sección1</a></li>
                      </ul>
                      </div>
                  </div>
                    <label class="label label-primary"> Cantidad total de  secciones registradas: 00-var</label>
                  </div>
                  <!-- /.post -->
                  <!-- Post -->    
                  <div class="post">
                      <button  class="btn btn-warning pull-right"type="submit" name="nivelDescripcion" value="serie" onClick="window.location='isadG'">
                      <i class="fa fa-plus"></i> Nueva serie</button>
                      <h3><i class="fa fa-archive"></i> <a data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
                      Series 
                      </a></h3>
                       <div class="collapse" id="collapseExample3">
                      <div class="card card-body">  </div>
                      <div id="header">
                      <ul class="nav">
                            <li><a href="#">Serie1</a></li>
                      </ul>
                      </div>
                  </div>
                      <label class="label label-warning"> Cantidad total de  series registradas: 00-var</label>
                  </div>
                  <!-- /.post -->             
                  <!-- Post -->
                  <div class="post">
                      <button class="btn btn-default pull-right" type="submit" name="nivelDescripcion" value="subsereies" onClick="window.location='isadG'">
                      <i class="fa fa-plus"></i> Nueva subserie</button>
                      <h3><i class="fa fa-square"></i> <a data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                      Subseries 
                      </a></h3>
                       <div class="collapse" id="collapseExample2">
                      <div class="card card-body">  </div>
                      <div id="header">
                      <ul class="nav">
                            <li><a href="#">Subserie1</a></li>
                      </ul>
                      </div>
                  </div>
                      <label class="label label-default"> Cantidad total de  subseries registrados: 00-var</label>
                  </div>
                  <!-- /.post -->
                  <!-- Post -->
                  <div class="post">
                      <button class="btn btn-info pull-right" type="submit" name="nivelDescripcion" value="expedientes" onClick="window.location='isadG'">
                      <i class="fa fa-plus"></i> Nuevo expediente</button>
                      <h3><i class="fa fa-folder"></i> <a data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample">
                      Expedientes
                      </a></h3>
                       <div class="collapse" id="collapseExample4">
                      <div class="card card-body">  </div>
                      <div id="header">
                      <ul class="nav">
                            <li><a href="#">Expediente1</a></li>
                            <li><a href="#">Expediente2</a></li>
                            <li><a href="#">Expediente3</a></li>
                            <li><a href="#">Expediente4</a></li>
                      </ul>
                      </div>
                  </div>
                      <label class="label label-info"> Cantidad total de expedientes registrados: 00-var</label>
                  </div>
                  <!-- /.post -->
                  <!-- Post -->
                  <div class="post">
                      <button  class="btn btn-success pull-right"type="submit" name="nivelDescripcion" value="documento" onClick="window.location='isadG'">
                      <i class="fa fa-plus"></i> Nuevo documento</button>
                      <h3><i class="fa fa-file"></i> <a data-toggle="collapse" href="#collapseExample5" role="button" aria-expanded="false" aria-controls="collapseExample">
                      Documentos
                      </a></h3>
                       <div class="collapse" id="collapseExample5">
                      <div class="card card-body">  </div>
                      <div id="header">
                      <ul class="nav">
                            <li><a href="#">Documento1</a></li>
                            <li><a href="#">Documento2</a></li>
                            <li><a href="#">Documento3</a></li>
                            <li><a href="#">Documento4</a></li>
                      </ul>
                      </div>
                  </div>
                      <label class="label label-success"> Cantidad total de  documentos registrados: 00-var</label>
                  </div>
                  <!-- /.post -->
                </form>
              </div>
              <!-- /.tab-pane -->
              <!-- ==========================HISTORIAL============================================= -->
              <!-- tab-pane  -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          <?php echo date('d-M-y');?>
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-archive bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i>00-var(entrada a archivo)</span>

                      <h3 class="timeline-header"><a href="#">00-var(id corespondencia)</a> titulo de documento</h3>

                      <div class="timeline-body">
                        <p><strong>Fondo :</strong>Notas de registro archivistico </p>
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Pre-visualizacion</a>
                        <a class="btn btn-danger btn-xs">Edicion</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-archive bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i>00-var(entrada a archivo)</span>

                      <h3 class="timeline-header"><a href="#">00-var(id corespondencia)</a> titulo de documento</h3>

                      <div class="timeline-body">
                      <p><strong>Serie :</strong>Notas de registro archivistico </p>
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Pre-visualizacion</a>
                        <a class="btn btn-danger btn-xs">Edicion</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                    <i class="fa fa-file bg-green"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i>00-var(entrada a archivo)</span>

                      <h3 class="timeline-header"><a href="#">00-var(id corespondencia)</a> titulo de documento</h3>

                      <div class="timeline-body">
                      <p><strong>Documento :</strong>Notas de registro archivistico </p>
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Pre-visualizacion</a>
                        <a class="btn btn-danger btn-xs">Edicion</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-folder bg-light-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i>00-var(entrada a archivo)</span>

                      <h3 class="timeline-header"><a href="#">00-var(id corespondencia)</a> titulo de documento</h3>

                      <div class="timeline-body">
                      <p><strong>Expediente :</strong>Notas de registro archivistico </p>
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Pre-visualizacion</a>
                        <a class="btn btn-danger btn-xs">Edicion</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>  
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
      <!-- /col-md-9 -->
      </div>
    <!-- /row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
