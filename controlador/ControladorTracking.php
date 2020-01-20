<?php
Class Tracking{

    private $des;
        function  __construct(){
            $this->des = new Conexion();
        }

    FUNCTION estadoCorresp($codigoT,$correo){
        $sent= "SELECT CONCAT(p.nombre_persona,' ', p.apellido_persona) AS nombre, p.correo_electronico,
        c.asunto, c.descripcion, c.fecha_emision, c.estado, c.id_persona_emisor AS id, 
        c.autorizado,c.privado, c.contenido, c.fecha_emision, c.fecha_recibido, c.caracter, c.adjuntos
        FROM corresp_correspondencia c JOIN corresp_persona p ON (c.id_persona_receptor=p.id_persona)
        JOIN corresp_tracking as t  ON t.id_correspondencia_tracking=c.id_correspondencia
        WHERE   t.codigo_tracking = :codigo";
        $llave = array(':codigo' => $codigoT);        
        $datosCorresp=isset($this->des->consultaSel($sent,$llave)[0]['id'])?$this->des->consultaSel($sent,$llave)[0]:'';
        
        $sent2="SELECT id_persona as id FROM corresp_persona WHERE correo_electronico= :correo";
        $llave2 = array(':correo' => $correo);
        $correoId= isset($this->des->consultaSel($sent2,$llave2)[0]['id'])? $this->des->consultaSel($sent2,$llave2)[0]:'';
        if($correoId!='' && $datosCorresp!=''){
            $des=1;
            if($datosCorresp['id']==$correoId['id']){
                $des=$datosCorresp;
            }           
        }
        else{
            $des= 0;
        }
        return $des;
    }
}