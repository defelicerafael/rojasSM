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
//$tabla = "mesAnterior";

$que = 'fecha_de_venta';
$hoy_fecha = date('Y-m-d');
if($tabla==="hoy"){
$hoy_fecha = date('Y-m-d');
}  


if($tabla==="semana"){
$diaA = strtotime ( '-7 day' , strtotime ( $hoy_fecha ) ) ;
$diaA = date ( 'Y-m-d' , $diaA );  
}    
if($tabla==="mes"){
$diaA = date("Y")."-".date("m")."-01";
}  
if($tabla==="anio"){
$diaA = date("Y")."-01-01"; 
} 
if($tabla==="mesAnterior"){
$hoy_fecha = date('Y-m-d');
$diaA = strtotime ( '-1 month' , strtotime ( $hoy_fecha ) ) ;
$diaA = date ( 'Y-m-d' , $diaA );
$hoy_mes = date("Y")."-".date("m")."-01";
} 


$sql = new Sql;
if ($filtro=="no"){
    $select = $sql->selectBetween('zapato',$filtro,$orden,$limit,$que,$hoy_fecha);
               
}else{
    $array = json_decode(json_encode($filtro), True);
    if($tabla==="mesAnterior"){
        $select = $sql->selectBetweenDos('zapato',$filtro,$orden,$limit,$que,$diaA,$hoy_mes);
    }else{
        $select = $sql->selectBetweenDos('zapato',$filtro,$orden,$limit,$que,$diaA,$hoy_fecha);
    }
    
}




$null = is_null($select);
if($null==true){
    echo "[]";
}else{
$sql->jsonConverter($select); 
}


    


