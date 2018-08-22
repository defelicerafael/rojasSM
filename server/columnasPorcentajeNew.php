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

/*$filtro = array('num_proyecto'=>'170');
$tabla = 'voluntarios_proyecto';
$filtro_por = 'id_ninio';
$orden = "ASC";
$limit = "1000";*/

$sql = new Sql;
$columnas = $sql->showColumnNames($tabla); 
if ($filtro=="no"){
    $select = $sql->selectTablaNew($tabla,$filtro,$filtro_por,$orden,$limit);     
}else{
    $array = json_decode(json_encode($filtro), True);
    $select = $sql->selectTablaNew($tabla,$array,$filtro_por,$orden,$limit);
    
    
    $new_array = array('id_personas'=>'0');
    $array2 = array_merge($array, $new_array);
    //print_r($array2);
    $select2 = $sql->selectTablaNew($tabla,$array2,$filtro_por,$orden,$limit);   
}

$total =  count($select);
$voluntarios = count($select2) - $total;
$porcentaje = 100 - $voluntarios * 100 / $total;
$respuesta = array("total"=>$total,"voluntarios"=>$voluntarios,"porcentaje"=>$porcentaje);
$sql->jsonConverter($respuesta);

    


?>
