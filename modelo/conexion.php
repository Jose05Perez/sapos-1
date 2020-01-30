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
    public function __construct()
    {
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
    
    function consultaSel($sentencia,$args=array())
    {
        try{        
        $query=$this->dbc->prepare($sentencia);
        $query->execute($args);
        $resultado= $query->fetchAll();
        }catch(PDOException $e){;
            //echo "<script>alert('error de consulta');</script>";  
            $resultado=array($e->getMessage());
        }
        return $resultado;
    }
    function consultaIns($tabla,$valores = array())
    {  
        try{
            $inst=$this->dbc;
            $sentencia ="INSERT INTO `$tabla` (".implode(", ",array_keys($valores)).") Values (".implode(", :",array_keys($valores)).")";
            
            $query= $ins->prepare($sentencia);
            foreach ($valores as $k => $v) {
                $query->bindParam(':'.$k, $v);
            }
            $query->execute($datos);
        }catch(PDOException $e){
            echo "<script>alert('ingreso fallido');</script>";
        }
        return $resultado;
    }
    function consultaUpd($tabla,$paramSet,$paramWhr=array())
    {
        try
        {
            $inst=$this->dbc;
            $sentencia ="UPDATE $tabla SET $paramSet WHERE ".implode(" OR ",$paramWhr);
            $query= $inst->prepare($sentencia);
            $query->execute();

        }catch(PDOException $e){
            echo '<script>alert("proceso fallido ");</script>';            
        }
    }
    function consultaCount($sentencia)
    {
        try{        
            $q=$this->dbc->query($sentencia);
            }catch(PDOException $e){;
                //echo "<script>alert('error de consulta');</script>";  
               
            }
            var_dump($q);
    }
  } 