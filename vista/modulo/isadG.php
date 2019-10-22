<!-- content-wrapper -->
<div class="content-wrapper">
    <!-- content-header -->
    <section class="content-header">
        <h1>ISAD-G  DESCRIPCION ARCHIVÍSTICA</h1>
        <ol class="breadcrumb">
            <li><a href="inicio">Inicio</a></li>
            <li><a href="archivo">Archivo</a></li>
            <li><a href="#">isad-g</a></li>
        </ol>
    </section>
    <!-- /content-header -->
    <!-- content -->
    <section class="content">
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
              <!
    </section>
<!-- content -->
</div>
<!-- /content-wrapper -->