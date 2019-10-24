<?php
/**
 *  Copyright (c) BNPHU. All rights reserved. Licensed under the GPL license.
 *  See LICENSE in the project root for license information.
 *
 *  PHP version 7
 *
 *  @category vista
 *  @package correspondencia
 *  @author   Josué Serulle Cabreja <jota_serulle@hotmail.com>
 *  @license GPL
 *  @link https://github.com/josueSerulle/correspondencia
 */
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Correspondencia BNPHU</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="#">
   <!--=====================================
  PLUGINS DE CSS
  ======================================-->
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vista/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vista/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vista/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vista/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="vista/dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- DataTables -->
  <link rel="stylesheet" href="vista/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vista/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vista/bower_components/iCheck/all.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="vista/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="vista/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="vista/bower_components/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  
  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->
  <!-- jQuery 3 -->
  <script src="vista/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="vista/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="vista/bower_components/jqueryUI/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- FastClick -->
  <script src="vista/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="vista/dist/js/adminlte.min.js"></script>
  <!-- DataTables -->
  <script src="vista/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vista/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vista/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vista/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="vista/bower_components/sweetAlert2/sweetalert.min.js"></script>
  <!-- iCheck 1.0.1 -->
  <script src="vista/bower_components/iCheck/icheck.min.js"></script>
  <!-- InputMask -->
  <script src="vista/bower_components/input-mask/jquery.inputmask.js"></script>
  <script src="vista/bower_components/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="vista/bower_components/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- bootstrap datepicker -->
  <script src="vista/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- jQuery Number Format -->
  <script src="vista/bower_components/numberFormat/numberFormat.js"></script>
  <!-- date-range-picker -->
  <script src="vista/bower_components/moment/min/moment.min.js"></script>
  <script src="vista/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="vista/bower_components/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="vista/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="vista/dist/js/pages/dashboard.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini"> 
    <?php
        // if(isset($_SESSION["iniciarSession"]) && $_SESSION["iniciarSession"] == "ok")
        // {
            echo '<div class="wrapper">';
                /*===============================================================================================================
                Incluyendo el cabezote en la aplicacion
                ===============================================================================================================*/
                include "modulo/cabezote.php";
                /*===============================================================================================================
                Incluyendo el menu lateral en la aplicacion
                ===============================================================================================================*/
                include "modulo/menuLateral.php";
                /*===============================================================================================================
                Incluyendo el Contenido Dinamico en la aplicacion
                ===============================================================================================================*/
                if(isset($_GET["ruta"]))
                {
                    if($_GET["ruta"] == "inicio" || $_GET["ruta"] == "salir" || $_GET["ruta"] == "emisor" || $_GET["ruta"] == "mesaEntrada"
                    || $_GET["ruta"]== "archivo"|| $_GET["ruta"]=="isadG")
                    {
                        include "modulo/".$_GET["ruta"].".php";
                    }
                    else
                    {
                        include "modulo/404.php";
                    }
                }
                else
                {
                    include "modulo/inicio.php";
                }
                /*===============================================================================================================
                Incluyendo el pie de pagina en la aplicacion
                ===============================================================================================================*/
                include "modulo/piePagina.php";  
            echo '</div>';
        // }
        // else
        // {
        //    $usuario = new ctrUsuario();
        //    $usuario->ctrIngresarUsuario(true);
        // }
    ?>
</body>
</html>
