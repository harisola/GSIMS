<?php
/******************************************************************
* Author : Atif Naseem
* Email : atif.naseem22@gmail.com
* Cell : +92-313-5521122
*******************************************************************/
?>

<?php

//configure constants

$directory = realpath(dirname(__FILE__));
$document_root = realpath($_SERVER['DOCUMENT_ROOT']);
$base_url = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=='on' ? 'https' : 'http' ) . '://' .
    $_SERVER['HTTP_HOST'];
if(strpos($directory, $document_root)===0) {
    $base_url .= str_replace(DIRECTORY_SEPARATOR, '/', substr($directory, strlen($document_root)));
}

defined("APP_URL") ? null : define("APP_URL", str_replace("/lib", "", App::make('url')->to('/')/*$base_url*/));
//Assets URL, location of your css, img, js, etc. files
defined("ASSETS_URL") ? null : define("ASSETS_URL", 'metronic');



//require library files
//require_once("util.php");
require_once("func.global.php");

?>