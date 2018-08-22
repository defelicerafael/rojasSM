<?php
include_once 'class_sql.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');

$objDatos = json_decode(file_get_contents("php://input"));
    
$tabla = $objDatos->tabla;
$dato = $objDatos->dato;
$columna = $objDatos->columna;
$filtro = $objDatos->filtro;

/*$tabla = 'partido';
$dato = 'Rafael Defelice';
$columna = 'jugadores';
$filtro = array('id'=>'1');*/


$sql = new Sql;
$columnas = $sql->showColumnNames($tabla); 
$array = json_decode(json_encode($filtro), True);

$select = $sql->selectTablaUnDato($columna,$tabla,$array);     

$arrayI = json_decode($select);
foreach($arrayI as $key=>$nombre){
    if($nombre == $dato){
        $iguales ++;
    }
}
if($iguales>0){
    echo 'true';
}else{
echo 'false';
}   


?>
