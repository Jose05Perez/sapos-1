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
            </ul>
            <!--====================================================================================
              tab-panel CONTENT
            ======================================================================================-->
            <div class="tab-content">
              <!-- ============================ tree view  ====================================== -->
              <div class="active tab-pane" id="activity">
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
                    <a id="agregarFondos" class="btn pull-right" href="#" role="button">
                    <i class="fa fa-plus"></i> agregar</a>
                    <h3><i class="fa fa-university "></i> Fondos</h3>
                    <label class="label label-danger"> Cantidad total de fondos registrados: 00-var</label>
                </div>
                <!-- /.post -->
                <!-- Post -->
                <div class="post">
                  <a id="agregarFondos" class="btn pull-right" href="#" role="button">
                  <i class="fa fa-plus"></i> agregar</a>  
                  <h3><i class="fa fa-th "></i> Seciones</h3>
                  <label class="label label-primary"> Cantidad total de  secciones registradas: 00-var</label>
                </div>
                <!-- /.post -->
                <!-- Post -->
                <div class="post">
                    <a id="agregarFondos" class="btn pull-right" href="#" role="button">
                    <i class="fa fa-plus"></i> agregar</a>
                    <h3><i class="fa fa-square"></i> Subsecciones</h3>
                    <label class="label label-default"> Cantidad total de  subsecciones registrados: 00-var</label>
                </div>
                <!-- /.post -->
                <!-- Post -->
                <div class="post">
                    <a id="agregarFondos" class="btn pull-right" href="#" role="button">
                    <i class="fa fa-plus"></i> agregar</a>
                    <h3><i class="fa fa-archive"></i> Series</h3>
                    <label class="label label-warning"> Cantidad total de  series registradas: 00-var</label>
                </div>
                <!-- /.post -->
                <!-- Post -->
                <div class="post">
                    <a id="agregarFondos" class="btn pull-right" href="#" role="button">
                    <i class="fa fa-plus"></i> agregar</a>
                    <h3><i class="fa fa-folder"></i> Expedientes</h3>
                    <label class="label label-info"> Cantidad total de expedientes registrados: 00-var</label>
                </div>
                <!-- /.post -->
                <!-- Post -->
                <div class="post">
                    <a id="agregarFondos" class="btn pull-right" href="isadG" role="button">
                    <i class="fa fa-plus"></i> agregar</a>
                    <h3><i class="fa fa-file"></i> Documentos</h3>
                    <label class="label label-success"> Cantidad total de  documentos registrados: 00-var</label>
                </div>
                <!-- /.post -->
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
              <!-- /.tab-pane -->
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
