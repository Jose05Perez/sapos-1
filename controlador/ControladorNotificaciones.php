<?php


class Cabezote{
        private $des;
        private $meId;//mesa entrada id
        function  __construct()
        {
            $this->des = new Conexion();
            $this->meId = new MesaEntrada();
        } 
        function notificaciones()
        {  
             //================================================================================================================================================
            //------------------------------------------------------reducir tamaño de codigo PENDIENTE--------------------------------------------------------DESPARCGHE POR SESSION ['ID']
            //================================================================================================================================================
            
            $id=$this->meId->id();
            $arg=array(':id'=>$id);     
            //------------------------------------------------------carga de id       
            $sentencia="SELECT COUNT(*) internos FROM corresp_correspondencia as cor 
            JOIN corresp_persona as per ON (cor.id_persona_emisor= per.id_persona)
            WHERE cor.id_persona_receptor= :id AND cor.estado!='el'AND cor.estado!='re' AND per.status_persona!= '4'" ; 
            $resultado=$this->des->consultaSel($sentencia,$arg);
            $_SESSION['notificaciones']=$resultado[0];
        
            $sentencia="SELECT COUNT(*) externos FROM corresp_correspondencia as cor 
            JOIN corresp_persona as per ON (cor.id_persona_emisor= per.id_persona)
            WHERE cor.id_persona_receptor= :id AND cor.estado!='el'AND cor.estado!='re' AND per.status_persona= '4'" ;
            $resultado=$this->des->consultaSel($sentencia,$arg);
            $_SESSION['notificaciones']+=$resultado[0];

            
            //-----------------------------------------------------------------------------------------------------------------------------------------------------------

            $sentencia="SELECT COUNT(*) urgentes FROM corresp_correspondencia as cor 
            JOIN corresp_persona as per ON (cor.id_persona_receptor= per.id_persona)
            WHERE cor.id_persona_receptor= :id AND cor.estado!='re' AND cor.estado!='el' AND cor.caracter= 'ur' ";
            $resultado=$this->des->consultaSel($sentencia,$arg);
            $_SESSION['notificaciones']+=$resultado[0];
                  
            
            $sentencia="SELECT COUNT(*) importantes  FROM corresp_correspondencia as cor 
            JOIN corresp_persona as per ON (cor.id_persona_receptor= per.id_persona)
            WHERE cor.id_persona_receptor= :id AND estado!='el'AND cor.estado!='re' AND cor.caracter='im'";
            $resultado=$this->des->consultaSel($sentencia,$arg);
        
            
            $sentencia="SELECT COUNT(*) genericos FROM corresp_correspondencia as cor 
            JOIN corresp_persona as per ON (cor.id_persona_receptor= per.id_persona)
            WHERE cor.id_persona_receptor= :id AND estado!='el'AND cor.estado!='re' AND cor.caracter='ge'";
            $resultado=$this->des->consultaSel($sentencia,$arg);
            $_SESSION['notificaciones']+=$resultado[0];
        
            //------------------------------------------------------------------------------------------------------------------------------------------------------------

            
            $sentencia="SELECT COUNT(*) pendientes FROM corresp_correspondencia as cor 
            JOIN corresp_persona as per ON (cor.id_persona_receptor= per.id_persona) 
            WHERE cor.id_persona_receptor= :id AND cor.estado='pe'" ;
            $resultado=$this->des->consultaSel($sentencia,$arg);
            $_SESSION['notificaciones']+=$resultado[0];
        
            
            $sentencia="SELECT COUNT(*) pgestion FROM corresp_correspondencia as cor 
            JOIN corresp_persona as per ON (cor.id_persona_receptor= per.id_persona) 
            WHERE cor.id_persona_receptor= :id AND cor.estado='pg'" ; 
            $resultado=$this->des->consultaSel($sentencia,$arg);
            $_SESSION['notificaciones']+=$resultado[0];
        }
    }