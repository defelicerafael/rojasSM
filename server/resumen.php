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

$anio = date('Y');
$mes = date('n');
$dia = date('d');
$hoy_fecha = date('Y-m-d');
$meses = ["january","February","March","April","May","June","July","August","September","October","November","December"];

$que = "fecha_de_venta";
/*SEMANA PASADA*/

$lunes= date("Y-m-d", strtotime ("last Monday"));
$domingo = date("Y-m-d", strtotime ("last Sunday"));

/* ESTA SEMANA */
if(date('D') === 'Mon'){
    $lunes2= date("Y-m-d");
}else{
$lunes2= date("Y-m-d", strtotime ("next Monday"));
}
if(date('D')==='Sun'){
    $domingo2 = date("Y-m-d");
}else{
   $domingo2 = date("Y-m-d", strtotime ("next Sunday")); 
}
//echo $lunes2."<br/>".$domingo2."<br/>";


/* MESES */
for($i=0;$i<(count($meses));$i++){        
    $fecha = date_create();
    $fecha->modify('first day of '.$meses[$i].' '.$anio);
    $pdia = $fecha->format('Y-m-d');
    
    $fecha2 = date_create();
    $fecha2->modify('last day of '.$meses[$i].' '.$anio);
    $fdia = $fecha2->format('Y-m-d');
    
    $fechasMes[$i+1] = array($pdia,$fdia);
}

if($tabla==="semana"){
   $de = $lunes;
   $hasta = $domingo2;
}
if($tabla==="mes"){
$de = $fechasMes[$mes][0];
$hasta = $hoy_fecha;
}
if($tabla==="mesAnterior"){
$de = $fechasMes[$mes-1][0];
$hasta = $fechasMes[$mes-1][1];   
}
if($tabla==="anio"){
$de = $fechasMes[1][0];
$hasta = $hoy_fecha; 
}


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


    


