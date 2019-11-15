<?php
    /**
    *  Copyright (c) BNPHU. All rights reserved. Licensed under the GPL license.
    *  See LICENSE in the project root for license information.
    *
    *  PHP version 7
    *
    *  @category controlador
    *  @package correspondencia
    *  @author   Josué Serulle Cabreja <jota_serulle@hotmail.com>
    *  @license GPL
    *  @link https://github.com/josueSerulle/correspondencia
    */
    class ctrUsuario
    {
         /**
          * Metodo para loguear Usuario
        * @access public
        * @param boolena $session para saber si esta iniciando o cerrando session 
        * @return 
        */
        static public function ctrIngresarUsuario($session)
        {


            if($session)
            {
                if(isset($_GET["code"]))
                {
                    $token = AuthHelper::getAccessTokenFromCode($_GET["code"]);
                    if(isset($token->refreshToken))
                    {
                        $token = AuthHelper::getAccessTokenFromRefreshToken($token->refreshToken);
                        $request = curl_init(Settings::$unifiedAPIEndpoint. "me");
                        curl_setopt($request,CURLOPT_HTTPHEADER,array(
                            "Authorization: Bearer " . $token->accessToken,
                            "Accept: application/json"
                        ));
                        curl_setopt($request,CURLOPT_RETURNTRANSFER,true);
                        $response = curl_exec($request);
                        $me = json_decode($response,true);

                        if($me)
                        {
                            $_SESSION["iniciarSession"] = "ok";
                            $_SESSION["nombre"] = $me["displayName"];
                            $_SESSION["mail"] = $me["mail"];
                            $_SESSION["departamento"] = $me["department"];
                            $_SESSION["tituloTrabajo"] = $me["jobTitle"];
                            echo '<script>
                                window.location = "inicio";
                            </script>';
                        }
                    }
                }
                else
                {
                    echo '<script>
                        window.location = "'.AuthHelper::getAuthorizationUrl(true).'";
                    </script>';
                }
            }
            else
            {
                echo '<script>
                    window.location = "'.AuthHelper::getAuthorizationUrl(false).'";
                </script>';
            }
        }//PARCHE DE USUARIO
        public static function usrx()
        {
            $con = new Conexion();
            $sentencia="SELECT id_persona, CONCAT(nombre_persona,' ',apellido_persona) AS nombre_usuario, nombre_institucion, cedula_persona, id_empleado, ultimo_login
            FROM corresp_persona JOIN corresp_institucion ON id_institucion_persona=id_institucion 
            JOIN corresp_empleado as emp ON id_persona_empleado=id_persona  WHERE id_persona=1";
            $usuariox= $con->consultaSel($sentencia);
            $_SESSION=$usuariox[0];
        }
    }

 
       
        
