
<h3>ta saliendo </h3>
<?php 
require_once "modelo/AuthHelper.php";
require_once "modelo/Settings.php";
require_once "modelo/Token.php";

var_dump($_GET);
echo AuthHelper::getAuthorizationUrl(true);

 AuhtHelper::getAccessTokenFromRefreshToken($refreshToken);
