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
        }
        
    }


