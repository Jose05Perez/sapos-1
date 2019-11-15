<?php
$c =new cabezote();
$c->urgentes();
$c->internos();
$c->externos();

$internos=$_SESSION['internos'];
$externos=$_SESSION['externos'];
$urgentes=$_SESSION['urgentes'];

?>
<header class="main-header">
    <!-- Logo -->
    <a href="inicio" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
        <img src="vista/img/plantilla/logo_oficial_final-A3.jpg" class="img-responsive" alt="BNPHU-LOGO" title="BNPHU-LOGO" />
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
 			  <img src="vista/img/plantilla/logo_oficial_final.png" class="img-responsive" alt="BNPHU-LOGO" title="BNPHU-LOGO" />
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li >
            <a href="mesaEntrada_in"><i class="fa fa-institution"></i>
              <span class="label label-success"><?php if($internos>0){echo $internos;}?></span>
            </a>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li >
            <a href="mesaEntrada_ex"><i class="fa fa-globe"></i>
              <span class="label label-warning"><?php if($externos>0){echo $externos;}?></span>
            </a>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li>
            <a href="mesaEntrada_ur">
              <i class="fa fa-exclamation-triangle"></i>
              <span class="label label-danger"><?php if($urgentes>0){echo $ugentes;}?></span>
            </a>
          </li>
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo $_SESSION["nombre_usuario"]; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p>
                <small>ultima cesion: <?php echo $_SESSION["ultimo_login"]; ?></small>
                <small>su Id: <?php echo $_SESSION["id_empleado"]; ?></small>
                  <small><?php echo $_SESSION["nombre_institucion"]; ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="salir" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
</header>