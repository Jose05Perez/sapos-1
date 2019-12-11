<?php
$c =new cabezote();
$c->notificaciones();

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
              <span class="label label-success"><?=$_SESSION['notificaciones']['internos']==0?'':$_SESSION['notificaciones']['internos']?></span>
            </a>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li >
            <a href="mesaEntrada_ex"><i class="fa fa-globe"></i>
              <span class="label label-warning"><?=$_SESSION['notificaciones']['externos']==0?'':$_SESSION['notificaciones']['externos']?></span>
            </a>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li>
            <a href="mesaEntrada_ur">
              <i class="fa fa-exclamation-triangle"></i>
              <span class="label label-danger"><?=$_SESSION['notificaciones']['urgentes']==0?'':$_SESSION['notificaciones']['urgentes']?></span>
            </a>
          </li>
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><?=$_SESSION['nombre'];?></span></a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p>
                  <small><strong>Su ID:</strong><?=$_SESSION['id_AD'];?></small>
                  <small><strong>Ultima sesión:</strong> <?=$_SESSION['usuario']['ultimaSesion']?></small>
                  <small><strong>Mi correo:</strong><?= $_SESSION['usuario']['correo'];?></small> 
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