<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<H1>Crear Emisor

<small>Herramienta del emisor </small>

</H1>

</section>
<section class="content">
<!-- SELECT2 EXAMPLE -->
<form id="validacion" action="#" method="post">
<div class="box box-default">

        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">Nombre:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" form="validacion" name="name" class="form-control" placeholder="Nombre" pattern="[A-Za-z]+" required>
              </div>
              <br>
              <!-- Sub Columna -->
              <div class="row">
                <div class="col-md-6">
                  <label for="date">Fecha de Nacimiento:</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="date" form="validacion" name="date" class="form-control" required>
                </div>
              <br>

                  </div>
                  <div class="col-md-6">
                  <label for="sex">Sexo:</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                    <select type="text" form="validacion" name="sex" class="form-control" required>
                    <option value="" selected="selected">Seleccionar Sexo</option>
                  <option value="1">Hombre</option>
                  <option value="2">Mujer</option>
                    </select>
                </div>
              <br>

                  </div>
              </div>
              <!-- Cierre Sub Columna-->

              <!-- Segunda Sub Columna-->
              <div class="row">
                <div class="col-md-6">
                <label for="id">Cedula:</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                    <input type="text" form="validacion" name="id" class="form-control" placeholder="000-0000000-0" pattern="[0-9-]+{13}" required>
                </div>
              <br>

                  </div>
                  <div class="col-md-6">
                  <label for="phone">Telefono:</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" form="validacion" name="phone" class="form-control" placeholder="(000)-000-0000" pattern="[0-9]{10}" required>
                </div>
              <br>

                  </div>
              </div>
              <label for="mail">E-mail:</label>
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" form="validacion" name="mail"class="form-control" placeholder="E-mail" required>
              </div>
              <br>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <!-- Segunda Columna -->
            <div class="col-md-6">
            <label for="lastname">Apellido:</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <input type="text" form="validacion" name="lastname" class="form-control" placeholder="Apellido" pattern="[A-Za-z]+" required>
              </div>
              <br>
              <label for="address">Direccion:</label>
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input type="text" form="validacion"  name="address"class="form-control" placeholder="Direccion" required>
              </div>
              <br>
              <!--Sub Columna-->
              <div class="row">
                <div class="col-md-6">
                <label for="phone2">Celular:</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" form="validacion" name="phone2" class="form-control" placeholder="(000)-000-0000" pattern="[0-9]{10}" required >
                </div>
              <br>
              
                  </div>
                  <div class="col-md-6">
                  <label for="institution">Institucion:</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-university"></i></span>
                    <select type="text"  form="validacion" name="institution" class="form-control" required>
                    <option value="" selected="selected"> Seleccionar Institucion</option>
                  <option value="1">Ejemplo1</option>
                    </select>
                </div>
              <br>
              <br>
              
              

                  </div>
                  <div class="row">
                    <div class="col-md-9">

                    </div>
                  <div class="box-footer col-md-3">
                <button type="submit" name="submit" form="validacion" class="btn btn-primary btn-lg">Guardar</button>
                <?php
if(isset($_POST['submit'])){
$ola = new CrearEmisor();
if($ola->valida_cedula($_POST['id'])==0){
  echo "<script>alert('ola mama');</script>";
}
$ola->valida_cedula($_POST['id']);


}
?>
              </div>
                  </div>
              </div>
            <!-- /.col -->
          </div>
          
          <!-- /.row -->
        </div>
        
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
</form>
</section>
</div>