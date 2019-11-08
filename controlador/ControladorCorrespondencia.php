<?php

// Comnstruir los parametros de la consulpta que 
// los select requieren de (salidas) => 'siempre seran las mismas: '
// mesa de entrada:
// id_persona_receptor => nombre persona, apellido persona
// id_persona_emisor =>nombre persona, apellido persona
// fecha_emision 
// fecha_recibido
// autorizado (default = 1)//firma digital- 
// estado ('el'=eliminado 'pe'=pendiente 'pg'=con plazo gestion 're'=recibido)
// privado ( value '1'==privado if '0'==publico)
// caracter ('co' = corriente, 'im'= importante, 'ur'= urgente)
// asunto 
// descripcion
    require_once "/modelo/Conexion.php";
    Class  CorrespControl{
        private $des;
        function  __construct(){
            $this->des = new Conexion();
        }
        //mesa entrada (param==oredenes y filtros)  
        
        function bandeja()
        {
           $_SESSION['Usuario']=array();
           $_POST['filtros']=array();
           $des->consultaSel();
        }
                

        function busqueda()
        {
            $_SESSION['usuario']=array();
            $_POST['palabra']=$string;
            $des->consultaSel();
        }

    }