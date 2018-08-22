<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');
include_once 'class_sql.php';

$objDatos = json_decode(file_get_contents("php://input"));

//print_r($objDatos);
$datos = $objDatos->datos;
$tabla = $objDatos->tabla;

$array = json_decode(json_encode($datos), True);
//print_r($array);


$t35 = $objDatos->t35;
$t36 = $objDatos->t36;
$t37 = $objDatos->t37;
$t38 = $objDatos->t38;
$t39 = $objDatos->t39;
$t40 = $objDatos->t40;
$t41 = $objDatos->t41;


$sql = new Sql;
if($t35>0){
    $array[talle] = 35;
    for($i=0;$i<$t35;$i++){
    $insert[$i] = $sql->insert_array($tabla,$array);
    }
}
if($t36>0){
    $array[talle] = 36;
    for($i=0;$i<$t36;$i++){
    $insert[$i] = $sql->insert_array($tabla,$array);
    }
}
if($t37>0){
    $array[talle] = 37;
    for($i=0;$i<$t37;$i++){
    $insert[$i] = $sql->insert_array($tabla,$array);
    }
}
if($t38>0){
    $array[talle] = 38;
    for($i=0;$i<$t38;$i++){
    $insert[$i] = $sql->insert_array($tabla,$array);
    }
}
if($t40>0){
    $array[talle] = 40;
    for($i=0;$i<$t40;$i++){
    $insert[$i] = $sql->insert_array($tabla,$array);
    }
}
if($t39>0){
    $array[talle] = 39;
    for($i=0;$i<$t39;$i++){
    $insert[$i] = $sql->insert_array($tabla,$array);
    }
}
if($t41>0){
    $array[talle] = 41;
    for($i=0;$i<$t41;$i++){
    $insert[$i] = $sql->insert_array($tabla,$array);
    }
}




?>