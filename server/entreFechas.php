<?php
include_once 'class_sql.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');

$objDatos = json_decode(file_get_contents("php://input"));

$tabla = $objDatos->tabla;
$filtro_por = $objDatos->filtro_por;
$filtro = $objDatos->filtro;
$orden = $objDatos->orden;
$limit = $objDatos->limit;
/*
$filtro = 'no';
$tabla = 'zapato';
$filtro_por = 'id';
$orden = "ASC";
$limit = "999";
*/
$tablaA = json_decode(json_encode($tabla), True);
//print_r($tablaA);
$de = $tablaA['hasta'];
$hasta = $tablaA['de'];
$que = $tablaA['que'];

$sql = new Sql;
if ($filtro=="no"){
    $select = $sql->selectBetweenDos('zapato',$filtro,$orden,$limit,$que,$de,$hasta);
               
}else{
    $array = json_decode(json_encode($filtro), True);
    $select = $sql->selectBetweenDos('zapato',$filtro,$orden,$limit,$que,$de,$hasta);
}




$null = is_null($select);
if($null==true){
    echo "[]";
}else{
$sql->jsonConverter($select); 
}


    


