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
$tabla = "guardar";
$filtro = array("id"=>"21");
$array = json_decode(json_encode($filtro), True);
$filtro_por = "id";
$orden = "DESC";
$limit = "1";
*/
$sql = new Sql;
$columnas = $sql->showColumnNames($tabla); 
if ($filtro=="no"){
    $select = $sql->selectTabla($tabla,$filtro,$filtro_por,$orden,$limit);     
}else{
    $array = json_decode(json_encode($filtro), True);
    $select = $sql->selectTabla($tabla,$array,$filtro_por,$orden,$limit);
}
echo $select[0][base64];



//$sql->jsonConverter($select[0][base64]);  

?>
