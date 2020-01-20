<?php

Class  InsertarDatos{
    private $des;
    function  __construct(){
        $this->des = new Conexion();
    }

    //Validar Formulario

    function Ingreso()
    {
 
  $host =  'localhost';
  $user = 'usr';
  $password = '';
  $dbname = 'pruebasconexion';
  // Set DSN
  $dsn = 'mysql:host='. $host .';dbname='. $dbname;
  // Create a PDO instance
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

  if(isset($_POST['submit'])){
    
   $nombre = $_POST['name'];
   $apellido = $_POST['lastname'];
   $correo = $_POST['mail'];
   $cedula = $_POST['id']; 
   $sexo = $_POST['sex'];
   $telefonos = $_POST['phone']."#".$_POST['phone2'];
   $institucion = $_POST['institution'];
   $fecha = $_POST['date'];
   $sql = 'INSERT INTO corresp_persona(cedula_persona, nombre_persona, apellido_persona, sexo_persona, fecha_nacimiento_persona, id_institucion_persona, correo_persona, telefonos) VALUES(:cedula, :nombre, :apellido, :sexo, :fechaNacimiento, :institucion, :correo, :telefonos)';
   $stmt = $pdo->prepare($sql);
   $stmt->execute([':cedula' => $cedula, ':nombre' => $nombre, ':apellido' => $apellido, ':sexo' => $sexo, ':fechaNacimiento' => $fecha, ':institucion' => $institucion, ':correo' => $correo, ':telefonos' => $telefonos]);
   
    }
    }
}
?>