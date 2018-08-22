<?php
include_once 'class_sql.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');

$objDatos = json_decode(file_get_contents("php://input"));
    
$tabla = $objDatos->tabla;
$filtro = $objDatos->filtro;
$columna = $objDatos->columna;
$empty = json_decode(json_encode($filtro), True);
//print_r($empty);
if (!empty($empty)){
    

$sql = new Sql;
//$columnas = $sql->showColumnNames($tabla); 
if ($filtro=="no"){
    $select = $sql->selectTablaUnDato($columna,$tabla,$filtro);     
}else{
    $array = json_decode(json_encode($filtro), True);
    $select = $sql->selectTablaUnDato($columna,$tabla,$array);    
}
//$sql->jsonConverter($select);  
echo $select;
}    


?>
