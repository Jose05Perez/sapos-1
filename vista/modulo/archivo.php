<div class="content-wrapper">
  <!-- Content Header (Page header) -->
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
              <li><a href="#settings" data-toggle="tab">Isad-G</a></li>
            </ul>
            <!--====================================================================================
              tab-panel CONTENT
            ======================================================================================-->
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <h2>
                     <input type="search" id="busquedaArchivos" class="form-control" placeholder="Buscar unidades ...">
                    </h2>
                  </div>  
                  <!-- /.user-block -->
                </div>
                <!-- /.post -->
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <h2><i class="fa fa-university"></i> Fondos</h2>
                    <span class="description">Cantidad total de fondos registrados: 00-var</span>
                  </div>
                  <!-- /.user-block -->
                </div>
                <!-- /.post -->
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    
                    <h2><i class="fa fa-archive"></i> Series</h2>
                    <span class="description">Cantidad total de  series fondos registrados: 00-var</span>
                  </div>
                  <!-- /.user-block -->
                </div>
                <!-- /.post -->
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <h2><i class="fa fa-folder"></i> Expedientes</h2>
                    <span class="description">Cantidad total de expedientes registrados: 00-var</span>
                  </div>
                  <!-- /.user-block -->
                </div>
                <!-- /.post -->
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <h2><i class="fa fa-file"></i> Documentos</h2>
                    <span class="description">Cantidad total de documentos registrados: 00-var</span>
                  </div>
                  <!-- /.user-block -->
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
              <!-- ==============================ISAD-G================================================== -->
              <!-- tab-pane -->
             
              <div class="tab-pane" id="settings">
              <form class="form-horizontal"action="#" method="post" >
                  <fieldset>
                    <legend>ÁREA DE IDENTIFICACIÓN</legend>
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Código de referencia:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="codReferencia">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Título:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="titulo">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Fecha(s): </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="fecha">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Nivel de descripción: </label>
                      <div class="col-sm-10">
                        <select  id="nivelDescripcion" class="form-control">
                          <option value="">Seleccione</option>
                          <option value="fondo" >Fondo</option>
                          <option value="seccion" >Seccion</option>
                          <option value="serie">Serie</option>
                          <option value="expediente">Expediente</option>
                          <option value="documento">Documento</option>
                        </select>
                      </div>
                    </div>    
                    <div class="form-group">
                      <label for="inputName" class="col-sm-2 control-label">Volumen: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="volumen">
                      </div>
                    </div>
                  </fieldset>  
                </form> 
                <?php 
                $form = new formularios()

                if(isset($_POST["nivelDescripcion"])){
                  switch ($variable) {
                    case 'fondo':
                        formularios->areaContexto();
                        function areaContenido();
                        function areaCondicionesAcceso();
                        function areaDocumentacion();
                        function areaNotas();
                        function areaControlDescripcion();
                      break;
                    case 'serie':
                      
                      break;
                    case 'expediente':
                        function areaContexto();
                        function areaContenido();
                        function areaDocumentacion();
                        function areaControlDescripcion();
                      break;
                    case 'documento':
                        function areaContexto();
                        function areaContenido();
                        function areaDocumentacion();
                        function areaControlDescripcion();
                      break;
                    default:
                      # code...
                      break;
                  }
                  
                }
              
              
              
              ?>
                <!-- ============================================================================ -->
                <form class="form-horizontal" action="#" method="post">
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary pull-right">
                      <span><i class="fa fa-send"></i> Guardar</span>
                      </button>
                    </div>
                  </div>
                </form>
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