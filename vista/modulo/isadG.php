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
                              <option value="<?=$nd?>"><?=$nd?></option>
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
                    if($nd=='fondo'||$nd=='expediente'||$nd=='documento'){
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
                        <form class="form-horizontal"  >
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