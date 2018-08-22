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

/*$filtro = array('id_user'=>'646535902','id_modelo'=>'0004');
$tabla = 'modelos';
$filtro_por = 'mascara';
$orden = "ASC";
$limit = "20";*/

$sql = new Sql;
$columnas = $sql->showColumnNames($tabla); 
if ($filtro=="no"){
    $select = $sql->selectTabla($tabla,$filtro,$filtro_por,$orden,$limit);     
}else{
    $array = json_decode(json_encode($filtro), True);
    $select = $sql->selectTabla($tabla,$array,$filtro_por,$orden,$limit);    
}

echo count($select);


    


?>
