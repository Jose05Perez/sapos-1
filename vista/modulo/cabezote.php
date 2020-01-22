<?php
$c =new cabezote();
$c->notificaciones();
$con = new Conexion();
            $sentencia="SELECT

                        concat(per.nombre_persona,' ',per.apellido_persona) as nombre ,
                        per.correo_electronico as correo,
                        rol.nombre_rol as puesto,
                        dep.nombre_departamento as departamento,
                        em.ultimo_login as ultimaSesion                                                
                        FROM    corresp_persona as per 
                        LEFT JOIN corresp_empleado as em ON  em.id_persona_empleado= per.id_persona
                        LEFT JOIN corresp_departamento as dep ON em.id_departamento_empleado=dep.id_departamento
                        LEFT JOIN corresp_rol as rol ON em.id_rol_empleado=rol.id_rol         
                        WHERE em.ID_AD= :idad  limit 1";
            $arg=array(':idad'=>$_SESSION['id_AD']);
            $_SESSION['usuario'] = $con->consultaSel($sentencia,$arg)[0];
            $upd= "ultimo_login='".date('y-m-d h:i:s')."'";
            $whr=array("ID_AD= '{$_SESSION['id_AD']}'");
            $con->consultaUpd('corresp_empleado',$upd,$whr);

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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><?=$_SESSION['usuario']['nombre'];?></span></a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p>
                  <?php foreach ($_SESSION['usuario'] as $key => $value):?>
                  <small><strong><?=$key?>: </strong><?=$value?></small>
                  <?php endforeach; ?>
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