<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');
include_once 'class_sql.php';

$objDatos = json_decode(file_get_contents("php://input"));

//print_r($objDatos);

echo "Estoy dentro de PAnel";
/*
$datos = $objDatos->datos;
$tabla = $objDatos->tabla;
$array = json_decode(json_encode($datos), True);

//print_r($array);

foreach($array as $a=>$b){
    if(is_array($b)){
        echo "$a es un array";
    }
}

$sql = new Sql;
$insert = $sql->insert_array($tabla,$array);
*/





?>