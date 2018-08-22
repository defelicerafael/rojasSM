<?php
include_once 'class_sql.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');

$objDatos = json_decode(file_get_contents("php://input"));


    
$tabla = $objDatos->tabla;
$id = $objDatos->id;

/*$tabla = "agenda";
$id = 22;*/

$sql = new Sql;
$columnas = $sql->showColumnNames($tabla); 
$select = $sql->selectId($tabla,$id);     
$sql->jsonConverter($select);  


    


?>
