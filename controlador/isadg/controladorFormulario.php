<?php
    class contenedorIsadg{
    private $cnx;

        /**
         * Class constructor.
         */
        public function __construct()
        {
            $dbc = new conexion();
            $this->cnx = $dbc;
        }

        function cargaContenedor($descripcion){
            
            $NivelDescripcion =['fondo','sub-fondo','seccion','sub-seccion','serie','subserie','expediente','documento'];
            indice= search();
            $stmt = "SELECT CONCAT(nivel_descriptivo,' ',titulo) AS contenedores FROM isadg_entidades WHERE  ";
        }







    }