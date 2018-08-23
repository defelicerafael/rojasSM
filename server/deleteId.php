<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');

include_once 'class_sql.php';

$objDatos = json_decode(file_get_contents('php://input'), true);


$id = $objDatos['id'];
$tabla = $objDatos['tabla'];
$bd = new Sql;
$bd->delete($tabla,"id",$id);



