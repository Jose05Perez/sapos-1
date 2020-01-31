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
    function consultaIns($tabla,$valores = array(),$param=array())
    {  
        try{
            foreach ($valores as $k => $v) {                
                $transf[":{$k}"] = $v;
            }
            $parametros=array();
            $cols= implode(', ', array_keys($valores)); $vals =implode(', ',array_keys($transf)) ;
            $cadena ="INSERT INTO $tabla ({$cols})  VALUES ({$vals})";
            $sentencia = $this->dbc->prepare($cadena);
            foreach ($transf as $k => $val) {
                if($val[1] == 0){
                    $sentencia->bindParam($k,$val[0],PDO::PARAM_STR);
                }else{
                    $sentencia->bindParam($k,$val[0],PDO::PARAM_INT);
                }
            }
            $sentencia->execute();
        }catch(PDOException $e){
            $n = $e->getMessage();
            echo "<script>alert('ingreso fallido:{$n});</script>";
        }
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
  
  } 