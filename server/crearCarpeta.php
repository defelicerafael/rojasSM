<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');

include_once 'class_sql.php';

$sql = new Sql;
$titulo = $sql->getLastId("agenda");
$estructura = "../images/eventos/$titulo";
$crear = mkdir($estructura, null, true);
$permisos = chmod($estructura, 0777);
if($crear){
    echo "carpeta creada con exito<br>";
}
if($permisos){
    echo "Permisos creados con exito<br>";
}


?>
