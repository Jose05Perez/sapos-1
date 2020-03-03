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
                            $_SESSION['id_AD']= $me['id'];                                                  
                            $w=new ctrUsuario();
                            $w->datosUsuario();
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
        }

        static public function datosUsuario(){

            $con = new Conexion();
            $sentencia="SELECT
                        concat(per.nombre_persona,' ',per.apellido_persona) as nombre ,
                        per.correo_electronico as correo,
                        rol.nombre_rol as puesto,
                        dep.id_departamento as codigo_depto,
                        LOWER(concat(dep.nombre_departamento,'-', dep.nombre_division))as departamento,
                        em.ultimo_login as ultimaSesion                                                
                        FROM    corresp_persona as per 
                        LEFT JOIN corresp_empleado as em ON  em.id_persona_empleado= per.id_persona
                        LEFT JOIN corresp_departamento as dep ON em.id_departamento_empleado=dep.id_departamento
                        LEFT JOIN corresp_rol as rol ON em.id_rol_empleado=rol.id_rol         
                        WHERE em.ID_AD= :idad  limit 1";
            $arg=array(':idad'=>$_SESSION['id_AD']);
            $_SESSION['usuario'] = $con->consultaSel($sentencia,$arg)[0];
            $upd= "ultimo_login='".date('y-m-d h:i:s')."'";
            $whr=array("ID_AD= '{$_SESSION['id_AD']}'");
            $con->consultaUpd('corresp_empleado',$upd,$whr);
            
        }
    }