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

    Class  MesaEntrada{
        private $des;
        function  __construct(){
            $this->des = new Conexion();
        }
        //mesa entrada (param==oredenes y filtros)     
        function bandeja()
        {
           
        
           $datausuario=$_SESSION['Usuario'];
           $_POST['filtros']=array();// Filtros ()
           $select="SELECT cor.id_correspondencia, cor.caracter, cor.estado, UPPER(CONCAT(per.nombre_persona,' ',per.apellido_persona)) AS emisor,cor.asunto, 
           cor.descripcion, cor.fecha_emision, cor.estado, cor.autorizado, cor.privado
           FROM corresp_persona AS per RIGHT JOIN corresp_correspondencia AS cor ON (cor.id_persona_emisor=per.id_persona) 
           WHERE cor.id_persona_receptor=$persona or cor.estado!='el' ORDER BY cor.fecha_emision DESC";
            $des->consultaSel($select);
        }                
        function busqueda()
        {
            $_SESSION['usuario']=array();
            $_POST['palabra']=$string;
            $des->consultaSel();
        }

    }