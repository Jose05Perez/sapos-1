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
  
class Conexion{
    protected $dbc;
    public function __construct(){
    $con = NULL;
  
        try{
            $con = new PDO("mysql:host=localhost;dbname=pruebasconexion","usr", "");
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch(PDOException $e){
                echo 'SE HA PRODUCIDO UN ERROR:  ' . $e->getMessage();
                }   
            $this->dbc = $con;
    }
    function consultaSel($sentencia){
      try{
      $query=$this->dbc->prepare($sentencia);
      $query->execute();
      $resultado= $query->fetchAll();
      }catch(PDOException $e){
        //header('Location: errores.php');
      $resultado='que blatrí'.$e->getMessage();  
      }
      return $resultado;    
    }
    function consultasIns($tabla ,$valores = array()){
        try{
            $inst=$this->dbc;
            $sentencia ="INSERT INTO {$tabla} Values ".implode(",",$valores);
            $query= $ins->prepare($sentencia);
            $query->execute();
            $resultado= $query->fetchAll();
        }catch(PDOException $e){
            $resultado="Error de insercion";
        }
        return $resultado;
    }
    function consultaUpd(){
    try
    {
        $inst=$this->dbc;
        $sentencia ="UPDATE {$tabla} SET ".implode(",",$valores);
        $query= $ins->prepare($sentencia);
        $query->execute();
        $resultado= $query->fetchAll();
    }catch(PDOException $e){
        $resultado="Error de actualizacion";
    }
    return $resultado;
    }
  }