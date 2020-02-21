<?php
  $emi = new generadorEmisor();
  if(isset($_POST["guardar"])){
    if($emi->ingresoEmisor($_POST)==1){      
      echo "<script>alert('Guardado exitosamente');</script>";
    }else{
      echo "<script>alert('Verifique sus datos');</script>";
    }
  }
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
  <section class="content-header">
    <H1>Crear Emisor
      <small>Herramienta del emisor </small>
    </H1>
  </section>
  <section class="content">
    <form  action="<?=$_GET['ruta'];?>" method="post" id="crearEmisor">
      <div class="box box-default">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">

            <div class="col-md-6">
              <div class="form-group">
                <label for="nombre">Nombre:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" form="crearEmisor" name="nombre" class="form-control" placeholder="Nombre" pattern="[A-Za-z \s]+" required/>
                </div> <br>                
                <div class= "row">
                  <div class="col-md-6">                  
                    <label for="cedula">Cedula:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                      <input type="text" form="crearEmisor" name="cedula" class="form-control" placeholder="000-0000000-0" pattern="[0-9 -]{13}" required >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="sex">Sexo:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                      <select type="text" form="crearEmisor" name="sexo" class="form-control" required>
                          <option value="" selected="selected">Seleccionar Sexo</option>
                          <option value="m">Hombre</option>
                          <option value="f">Mujer</option>
                      </select>
                    </div> <br>                    
                  </div> 
                </div>
                <!-- row -->
                <div class="row">           
                  <div class="col-md-6">
                    <label for="phone2">Celular:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                      <input type="text" form="crearEmisor" name="telefono[]" class="form-control" placeholder="(000)-000-0000" pattern="[0-9]{10}" required >
                    </div>
                    <br>
                  </div>
                  <div class="col-md-6">
                    <label for="phone">Telefono:</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                      <input type="text" form="crearEmisor" name="telefono[]" class="form-control" placeholder="(000)-000-0000" pattern="[0-9]{10}" >
                    </div>
                    <br>
                  </div>  
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="apellido">Apellido:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                  <input type="text" form="crearEmisor" name="apellido" class="form-control" placeholder="Apellido" pattern="[A-Za-z \s]+" required>
                </div> <br>
                <label for="mail">E-mail:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="email" form="crearEmisor" name="email" class="form-control" placeholder="E-mail" required>
                </div>
                <br> 
                <label for="institution">Institucion:</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-university"></i></span>
                  <select type="text"  form="crearEmisor" name="institucion" class="form-control" required>
                    <option value="" selected="selected"> Seleccionar Institucion</option>
                    <?php $emi->instituciones();?>
                  </select>
                </div>  <br> 
                <div class="row">
                  <div class="col-md-9"></div>
                  <div class=" col-md-3">
                    <button type="submit" name="guardar" id="guardar" form="crearEmisor" class="btn btn-primary btn-lg">Guardar</button>
                  </div>                            
                </div>  
              </div> 
            </div>       
          </div>
          <!--  row -->                  
          
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </form>
  </section>
</div>
