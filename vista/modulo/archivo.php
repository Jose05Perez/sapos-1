<?php
 $nd = $_POST['nivelDescripcion'];
?>
<!-- content-wrapper -->
<div class="content-wrapper">
    <!-- content-header -->
    <section class="content-header">
        <h1>ISAD-G  DESCRIPCION ARCHIVÍSTICA </h1>
        <ol class="breadcrumb">
            <li><a href="inicio">Inicio</a></li>
            <li><a href="archivo">Archivo</a></li>
            <li><a href="#">isad-g(<?=$nd;?>)</a></li>
        </ol>
    </section>
    <!-- /content-header -->
    <!-- content -->
    <section class="content">
    <!-- row -->
    <div class="row">
      <!-- col-md-9-->
<<<<<<< HEAD
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
                      <h3><i class="fa fa-university "></i> Fondos</h3>
                      <label class="label label-danger"> Cantidad total de fondos registrados: 00-var</label>
                  </div>
                  <!-- /.post -->
                  <!-- Post -->
                  <div class="post">
                    <button class="btn btn-primary pull-right" type="submit" name="nivelDescripcion" value="seccion" onClick="window.location='isadG'">
                    <i class="fa fa-plus"></i> Nueva seccion</button>
                    <h3><i class="fa fa-th "></i> Seciones</h3>
                    <label class="label label-primary"> Cantidad total de  secciones registradas: 00-var</label>
                  </div>
                  <!-- /.post -->
                  <!-- Post -->
                  <div class="post">
                      <button class="btn btn-default pull-right" type="submit" name="nivelDescripcion" value="subseccion" onClick="window.location='isadG'">
                      <i class="fa fa-plus"></i> Nueva sub-seccion</button>
                      <h3><i class="fa fa-square"></i> Subsecciones</h3>
                      <label class="label label-default"> Cantidad total de  subsecciones registrados: 00-var</label>
                  </div>
                  <!-- /.post -->
                  <!-- Post -->
                  <div class="post">
                      <button  class="btn btn-warning pull-right"type="submit" name="nivelDescripcion" value="serie" onClick="window.location='isadG'">
                      <i class="fa fa-plus"></i> Nueva serie</button>
                      <h3><i class="fa fa-archive"></i> Series</h3>
                      <label class="label label-warning"> Cantidad total de  series registradas: 00-var</label>
                  </div>
                  <!-- /.post -->
                  <!-- Post -->
                  <div class="post">
                      <button class="btn btn-info pull-right" type="submit" name="nivelDescripcion" value="expediente" onClick="window.location='isadG'">
                      <i class="fa fa-plus"></i> Nuevo expediente</button>
                      <h3><i class="fa fa-folder"></i> Expedientes</h3>
                      <label class="label label-info"> Cantidad total de expedientes registrados: 00-var</label>
                  </div>
                  <!-- /.post -->
                  <!-- Post -->
                  <div class="post">
                      <button  class="btn btn-success pull-right"type="submit" name="nivelDescripcion" value="documento" onClick="window.location='isadG'">
                      <i class="fa fa-plus"></i> Nuevo documento</button>
                      <h3><i class="fa fa-file"></i> Documentos</h3>
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
=======
        <div class="col-md-9 bg-white">
        <div class="box box-body" id="isadg">
                    <form class="form-horizontal" >
                      <fieldset>
                        <legend>ÁREA DE IDENTIFICACIÓN</legend>
                        <div class="form-group">
                          <label for="inputName" class="col-sm-2 control-label">Código de referencia:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="codReferencia">
                          </div>
                        </div>
>>>>>>> 7006cdc2070b9acf4d0331b583c16eadb823a8be

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
                        <?php
                        if ($nd=='fondo' || $nd=='seccion' || $nd=='subseccion'){
                          echo '
                          <div class="form-group">
                            <label for="historiaInstitucional" class="col-sm-2 control-label">Historia institucional: </label>
                            <div class="col-sm-10">
                              <textarea class="form-control" name="historiaInstitucional" id="historiaInstitucional" rows="3"></textarea>
                            </div>
                          </div>';
                        }                    
                        if($nd=='fondo'){
                          echo '
                          <div class="form-group">
                            <label for="historiaArchivística" class="col-sm-2 control-label">Historia archivística: </label>
                            <div class="col-sm-10">
                              <textarea class="form-control" name="historiaArchivistica" id="historiaArchivistica" rows="3"></textarea>
                            </div>
                          </div>';
                        }
                        if($nd=='fondo' || $nd=='serie' || $nd=='expediente' || $nd=='documento' ){
                          echo '
                        <div class="form-group">
                          <label for="formaIngreso" class="col-sm-2 control-label">Forma de ingreso: </label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="formaIngreso">
                          </div>
                        </div>';}
                        ?>  
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
                        <?php
                        if($nd=='fondo'||$nd=='serie'||$nd=='expediente'||$nd=='documento'){
                          echo '
                            <div class="form-group">
                              <label for="valoracionSeleccionEliminacion" class="col-sm-2 control-label">valoracion, seleccion y eliminacion:</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="organizacion">
                              </div>
                            </div>';}
                        if($nd=='fondo'){
                          echo'
                            <div class="form-group">
                              <label for="nuevasPublicacion" class="col-sm-2 control-label">Nuevas publicaciones: </label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="acumulacion">
                              </div>
                            </div>';}
                        if ($nd=='fondo' || $nd=='seccion'||$nd=='subseccion'|| $nd=='serie'){
                          echo '
                            <div class="form-group">
                              <label for="sistemaAcuerdo" class="col-sm-2 control-label">Organizacion: </label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="sistemaAcuerdo">
                              </div>
                            </div>';}
                        ?>
                        </fieldset>
                    </form>
                    <!-- ================================================================================== -->
                    <?php
                    if($nd=='fondo' || $nd=='serie'){
                      echo'
                        <form class="form-horizontal" >
                        <fieldset>
                        <legend>ÁREA DE CONDICIONES DE ACCESO Y UTILIZACIÓN </legend>';}
                    if($nd=='fondo'||  $nd=='serie' ){
                          echo'                  
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
                            </div>';}
                    if($nd=='fondo'){
                          echo '
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
                            </div>';}
                    if($nd=='fondo'||  $nd=='serie'){
                          echo '
                            <div class="form-group">
                              <label for="IintrumentosDescripcion" class="col-sm-2 control-label">Instrumentos de descripción</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="BusquedaOtrosMateriales">
                              </div>
                            </div>';}             
                    if($nd=='fondo' || $nd=='serie'){
                          echo'
                          </fieldset>
                        </form>';}
                    ?>
                    <!-- ================================================================================================================ -->
                    <?php
                    if($nd=='fondo'||$nd='expediente'||$nd=='documento'){
                    echo' 
                      <form class="form-horizontal" >
                        <fieldset>
                          <legend>ÁREA DE DOCUMENTACIÓN ASOCIADA </legend>';}
                    if($nd=='fondo'){
                      echo '
                          <div class="form-group">
                            <label for="ExistenciaLocalizacionOriginal" class="col-sm-2 control-label">Existencia y localización original: </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="ExistenciaLocalizacionOriginal">
                            </div>
                          </div>';}
                    if($nd=='fondo'||$nd=='expediente'||$nd=='documento'){
                      echo'
                          <div class="form-group">
                            <label for="existenciaLocalizacionCopias" class="col-sm-2 control-label">Existencia y localización de copias: </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="existenciaLocalizacionCopias">
                            </div>
                          </div>';}
                    if($nd=='fondo'){
                      echo '
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
                          </div>';}
                      if($nd=='fondo'||$nd=='expediente'||$nd=='documento'){
                        echo'
                        </fieldset>
                      </form>';}
                      ?>
                    <!-- ============================================================================================ -->
                    <?php
                    if($nd=='fondo'){
                      echo'
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
                        </form>';}
                    ?>
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
                    <?php
                    if($nd=='fondo'){
                        echo'
                        <div class="form-group">
                          <label for="reglasNormas" class="col-sm-2 control-label">Reglas o normas: </label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="reglasNormas">
                          </div>
                        </div>';}
                    ?>
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
            </div>
            <!-- /col-md-9-->
        </div>
        <!-- /row -->
    </section>
<!-- content -->
</div>
<!-- /content-wrapper -->
