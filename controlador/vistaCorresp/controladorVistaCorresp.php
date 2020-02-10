<?php

    class VistaCorrespondencia{
        private $des;

        public function __construct()
        {   
            $con = new Conexion();
            $this->des = $con;
        }
        function btnVistaCorresp($btn){
            $num= explode("_",$ruta)[1];
            $idc = $_SESSION['idc'][$num];
            $estados = array('eliminar' => 'el' , 'revisado'=> 're', 'pgestion'=> 'pg' );
            $esta = array_search($estados);
            if (!($esta===0)){
                $parametroSet=array("estado = '{$estados[$btn]}'"); //la uncia modificacion para eliminar e.e
                $corRegistro = array("id_correspondencia = '{$idc}'");
                $this->des->consultaUpd('corresp_correspondencia',$parametroSet,$corRegistro);    
            }
            
            
        }
    }