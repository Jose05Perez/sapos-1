<?php
  error_reporting(E_ALL|E_STRICT);
  ini_set("display_errors", 1);

    class AuthHelper
    {
        public static function getAuthorizationUrl($session)
        {
          $authUrl = "";
          if($session)
          {
            $authUrl = Settings::$authority . 
            "?response_type=code&" .
            "client_id=" . Settings::$clientId . "&" .
            "redirect_uri=" . Settings::$redirectURI. "&" .
            "scope=" . Settings::$unifiedAPIResource . "&" .
            "response_mode=fragment&".
            "state=12345";
          }
          else
          {
            
          }
          return $authUrl;
        }

        public static function getAccessTokenFromCode($code)
        {
          //build the request body
          $tokenRequestBody = "grant_type=authorization_code&" .
            "client_id=" . Settings::$clientId . "&" .
            "redirect_uri=" . Settings::$redirectURI . "&" .
            "client_secret=" . Settings::$password . "&" .
            "code=" . $code;

            //setup the post to https://login.microsoftonlne.com/common/oauth2/token
            $request = curl_init("https://login.microsoftonline.com/common/oauth2/v2.0/token");
            curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($request, CURLOPT_POST, 1);
            curl_setopt($request, CURLOPT_POSTFIELDS, $tokenRequestBody);

            //perform the post and dispose
            $response = curl_exec($request);
            //curl_close($request);

            //get http code
            $httpCode = curl_getinfo($request, CURLINFO_HTTP_CODE);
            if ($httpCode > 400) {
              //check error
              $errorNum = curl_errno($request);
              $errorTxt = curl_error($request);
              print($errorNum . " - " . $errorTxt);
            }

            //parse the response json into a Token object
            $tokenJSON = json_decode($response, true);
            $token = new Token;
            $token->scope = $tokenJSON["scope"];
            $token->accessToken = $tokenJSON["access_token"];
            $token->refreshToken = $tokenJSON["refresh_token"];
            $token->idToken = $tokenJSON["id_token"];

            //return the token
            return $token;
        }

        public static function getAccessTokenFromRefreshToken($refreshToken)
        {
          //build the request body
          $tokenRequestBody = "grant_type=refresh_token&" .
            "refresh_token=" . $refreshToken . "&" .
            "client_id=" . Settings::$clientId . "&" .
            "client_secret=" . Settings::$password . "&" .
            "scope=" . Settings::$unifiedAPIResource;

            //setup the post to https://login.microsoftonlne.com/common/oauth2/token
            $request = curl_init("https://login.microsoftonline.com/common/oauth2/v2.0/token");
            curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($request, CURLOPT_POST, 1);
            curl_setopt($request, CURLOPT_POSTFIELDS, $tokenRequestBody);

            //perform the post and dispose
            $response = curl_exec($request);
            //curl_close($request);

            //get http code
            $httpCode = curl_getinfo($request, CURLINFO_HTTP_CODE);
            if ($httpCode > 400) {
              //check error
              $errorNum = curl_errno($request);
              $errorTxt = curl_error($request);
              print($errorNum . " - " . $errorTxt);
            }

            //parse the response json into a Token object
            $tokenJSON = json_decode($response, true);
            $token = new Token;
            $token->scope = $tokenJSON["scope"];
            $token->accessToken = $tokenJSON["access_token"];
            $token->refreshToken = $tokenJSON["refresh_token"];

            //return the token
            return $token;
        }
    }
?>