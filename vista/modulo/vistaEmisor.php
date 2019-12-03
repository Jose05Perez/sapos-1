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