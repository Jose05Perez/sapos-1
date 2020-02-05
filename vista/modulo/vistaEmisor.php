<?php
 date_default_timezone_set('America/Mexico_City');
 $fecha_actual=date("d-M-Y H:i");

 $charset="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
 $size= 10;
 $codigo= str_shuffle($charset);
 $codigo= substr($codigo,0,$size);

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<H1>Vista Emisor

<small>Herramienta del emisor </small>

</H1>

</section>
<section class="content">
<!-- SELECT2 EXAMPLE -->
<form id="validacion" action="#" method="post">
    <div class="box box-default">

  
        <div class="pull-right">
            <b><?=$fecha_actual?></b>
        </div>

        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <div class="col-lg">
              <div class="form-group">
                <label for="name">Emisor:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" form="validacion" name="name" class="form-control" placeholder="Emisor:"  required>
                </form>
        </div>
        <div class="col-lg">
              <div class="form-group">
                <label for="name">Para:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" form="validacion" name="name" class="form-control" placeholder="Para:" required>
        </div>
        <div class="col-lg">
              <div class="form-group">
                <label for="name">Asunto:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" form="validacion" name="name" class="form-control" placeholder="Asunto:"  required>
        </div>
        <div class="col-lg">
              <div class="form-group">
                <label for="name">Numero de referencia:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" form="validacion" name="name" class="form-control" placeholder="Numero de referencia:" pattern="[0-9]+" required>
        </div>
        <div class="col-lg">
              <div class="form-group">
                <label for="name">Comentario:</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Escriba un comentario..." required ></textarea>
        </div>
        <label for="name">Caracter:</label>
        <div class="row">
        
        
        <div class="form-check col-sm-2">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                <label class="form-check-label" for="exampleRadios1">
                Urgente
                </label>
        </div>
        <div class="form-check col-sm-2">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                Importante
                </label>
        </div>
        <div class="form-check col-sm-2">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" checked>
                <label class="form-check-label" for="exampleRadios2">
                Generico
                 </label>
        </div>
        </div>
        <br>
            <div class="text-center"> <label> <h3><FONT face="Algerian"> Codigo de trackeo: </FONT></h3> </label> 
        <div class="col-lg">
             <input name="clave" type="text" id="clave" readonly="readonly" style="WIDTH: 120px; HEIGHT: 50px" value="<?=$codigo;?>"/>
        </div>
        </div>
         <div class="row">
            <div class="col-md-9">

            </div>
        <div class="box-footer col-md-3">
            <button onclick="ConfirmDemo()" type="submit" name="submit" form="validacion" class="btn btn-primary btn-lg">Enviar</button>
            <script>function ConfirmDemo() {

                     //Ingresamos un mensaje a mostrar
                           var mensaje = confirm("¿Seguro que quieres enviar");
                     //Detectamos si el usuario acepto el mensaje
                            if (mensaje) {
                            alert("¡Enviado!");
                            }
                     //Detectamos si el usuario denegó el mensaje
                            else {
                            alert("¡No se ha envidado!");
                            }
                            }
             </script>
   
   </form>
          
         </section>  

    </div>
    
</div>