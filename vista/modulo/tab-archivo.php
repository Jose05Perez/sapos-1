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
                     <input type="search" id="busquedaArchivos" class="form-control" placeholder="Buscar ...">
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
                    
                    <h2><i class="fa fa-archive"></i> Seciones</h2>
                    <span class="description">Cantidad total de  secciones registrados: 00-var</span>
                  </div>
                  <!-- /.user-block -->
                </div>
                <!-- /.post -->
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    
                    <h2><i class="fa fa-archive"></i> Subsecciones</h2>
                    <span class="description">Cantidad total de  subesecciones registrados: 00-var</span>
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
                <form class="form-horizontal" >
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
                          <option value="sub-fondo">Subfondo</option>
                          <option value="seccion">Seccion</option>
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
                <!--======================================================================================================-->
                <form class="form-horizontal" >
                  <fieldset>
                    <legend>ÁREA DE CONTEXTO </legend>
                    
                    <div class="form-group">
                      <label for="nombreProductor" class="col-sm-2 control-label">Nombre(s) de productor(es):</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombreProductor">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="historiaInstitucional" class="col-sm-2 control-label">Historia institucional: </label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="historiaInstitucional" id="historiaInstitucional" rows="3"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="historiaArchivística" class="col-sm-2 control-label">Historia archivística: </label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="historiaArchivistica" id="historiaArchivistica" rows="3"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="formaIngreso" class="col-sm-2 control-label">Forma de ingreso: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="formaIngreso">
                      </div>
                    </div>             
                  </fieldset>
                </form>
                <!-- ==================================================================================== -->
                <form class="form-horizontal" >
                  <fieldset>
                    <legend>ÁREA DE CONTENIDO Y ESTRUCTURA </legend>
                    
                    <div class="form-group">
                      <label for="alcanceContenido" class="col-sm-2 control-label">Alcance y contenido:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="alcanceContenido">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="organizacion" class="col-sm-2 control-label">Organización: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="organizacion">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="acumulacion" class="col-sm-2 control-label">Acumulación:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="acumulacion">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="sistemaAcuerdo" class="col-sm-2 control-label">Sistema de acuerdo:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="sistemaAcuerdo">
                      </div>
                    </div>
                    </fieldset>
                </form>
                <!-- ================================================================================== -->
                
                <form class="form-horizontal" >
                  <fieldset>
                    <legend>ÁREA DE CONDICIONES DE ACCESO Y UTILIZACIÓN </legend>
                    
                    <div class="form-group">
                      <label for="condicionesAcceso" class="col-sm-2 control-label">Condiciones de acceso: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="condicionesAcceso">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="condicionesReproduccion" class="col-sm-2 control-label">Condiciones de reproducción:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="condicionesReproduccion">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="lenguajeEscritura" class="col-sm-2 control-label">Lenguaje-Escritura de los documentos:  </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="lenguajeEscritura">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="característicasFísicas" class="col-sm-2 control-label">Características físicas y requisitos técnicos: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="característicasFísicas">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="BusquedaOtrosMateriales" class="col-sm-2 control-label">Busqueda de otros materiales</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="BusquedaOtrosMateriales">
                      </div>
                    </div>               
                  </fieldset>
                </form>
                <!-- ================================================================================================ -->
                <form class="form-horizontal" >
                  <fieldset>
                    <legend>ÁREA DE DOCUMENTACIÓN ASOCIADA </legend>
                    
                    <div class="form-group">
                      <label for="ExistenciaLocalizacionOriginal" class="col-sm-2 control-label">Existencia y localización original: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="ExistenciaLocalizacionOriginal">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="existenciaLocalizacionCopias" class="col-sm-2 control-label">Existencia y localización de copias: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="existenciaLocalizacionCopias">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="unidadesRelacionadasDescripcion" class="col-sm-2 control-label">Unidades relacionadas de descripción: </label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="unidadesRelacionadasDescripcion" id="unidadesRelacionadasDescripcion" rows="3"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="notaPublicación" class="col-sm-2 control-label">Nota de publicación: </label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="notaPublicación" id="notaPublicación" rows="3"></textarea>
                      </div>
                    </div>              
                  </fieldset>
                </form>
                <!-- ============================================================================================ -->
                <form class="form-horizontal" >
                  <fieldset>
                    <legend>ÁREA DE NOTAS</legend>
                    
                    <div class="form-group">
                      <label for="nota" class="col-sm-2 control-label">Notas: </label>
                      <div class="col-sm-10">
                          <textarea class="form-control" name="nota" id="nota" rows="3"></textarea>
                      </div>
                    </div>
                  </fieldset>
                </form>
                <!-- ============================================================================ -->
                <form class="form-horizontal" >
                  <fieldset>
                    <legend>ÁREA DE CONTROL DE LA DESCRIPCIÓN </legend>
                    
                    <div class="form-group">
                      <label for="notaArchivero" class="col-sm-2 control-label">Nota del archivero: </label>
                      <div class="col-sm-10">
                      <textarea class="form-control" name="notaArchivero" id="notaArchivero" rows="3"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="reglasNormas" class="col-sm-2 control-label">Reglas o normas: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="reglasNormas">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="fechaDescripcion" class="col-sm-2 control-label">Fecha de la descripción: </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="fechaDescripcion">
                      </div>
                    </div>             
                  </fieldset>
                </form>
                <!-- ============================================================================ -->
                <form class="form-horizontal" >
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