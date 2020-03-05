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
            $con = new PDO("mysql:host=localhost;dbname=pruebasconexion","root", "");
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
            $resultado=array($e->getMessage());
            echo "<script>alert('error de consulta= {$resultado}');</script>";  
        }
        return $resultado;
    }
    function consultaIns($tabla,$valores = array())
    {  
        try{
            foreach ($valores as $k => $v) {
                $enna [":{$k}"]=$v;
                $list[]="`{$k}`"; 
            }
            $tcol= implode(', ', $list); $vals =implode(', ',array_keys($enna)) ;
            $cadena ="INSERT INTO `{$tabla}` ({$tcol})  VALUES ({$vals})";
            $query = $this->dbc->prepare($cadena);       
            $query->execute($enna);
         }catch(PDOException $e){
            $n = $e->getMessage();
            echo '<script>alert("'.$n.'")</script>';
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