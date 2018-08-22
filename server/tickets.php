<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');

include_once '../server/class_sql.php';

$objDatos = json_decode(file_get_contents('php://input'), true);

$tabla = $objDatos->tabla;
$filtro_por = $objDatos->filtro_por;
$filtro = $objDatos->filtro;
$orden = $objDatos->orden;
$limit = $objDatos->limit;



$rgb = json_decode(json_encode($filtro), True);
//$rgb = array('r'=>'255','g'=>'244','b'=>'140');
    $sql = new Sql;
    $color = $sql->selectTablaWarning('colores',$rgb,'id','ASC',1);
    $idColor = $color[0][nombre_color];
    if(empty($idColor[$i])){
        $codigo = "El color del diseño base";
    }else{
        $codigo = $idColor;
    }
    
    echo $codigo;
   



?>         
			