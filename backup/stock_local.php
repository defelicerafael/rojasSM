<?php
include_once 'class_sql.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');
$objDatos = json_decode(file_get_contents("php://input"));


/*
$tabla = $objDatos->tabla;
$filtro_por = $objDatos->filtro_por;
$filtro = $objDatos->filtro;
$orden = $objDatos->orden;
$limit = $objDatos->limit;
*/

$tabla = 'zapato';
$filtro_por = 'id';
$filtro = "";
$orden = 'ASC';
$limit = '999';


$sql = new Sql;
$columnas = $sql->showColumnNames($tabla); 
if ($filtro==="no"){
   // echo "Filtro es igual a no";
    $select = $sql->selectTablaNew($tabla,'no',$filtro_por,$orden,$limit);     
}else{
    $array = json_decode(json_encode($filtro), True);
    //$array = array("local"=>$filtro);
    $select = $sql->selectTablaNew($tabla,$array,$filtro_por,$orden,$limit);    
}  
/*
echo "<pre>";
print_r($array);
echo "</pre>";
*/

$t = [];
$modelos = array_count_values(array_column($select, 'modelo'));
$colores = array_count_values(array_column($select, 'color'));
$talles = array_count_values(array_column($select, 'talle'));

$local = $array['local'];
$pago = $array['pago'];



if($local){
    foreach($modelos as $key=>$value){
        foreach ($colores as $color => $v) {
            foreach ($talles as $talle => $t) {
                $sql4 = new Sql;
                $zapatos[$key][$color][$talle] = $sql4->selectTablaNew($tabla,array('modelo'=>$key,'color'=>$color,'talle'=>$talle,'local'=>$local,'pago'=>$pago),$filtro_por,$orden,$limit);
                $cantidad[$key][$color][$talle] = count($zapatos[$key][$color][$talle]);
                if ($cantidad[$key][$color][$talle] !== 0){
              //  echo $key. $color.  $talle ."=". $cantidad[$key][$color][$talle]."<br/>";
                    $stock[$key][$color][$talle] = $cantidad[$key][$color][$talle];
                }
                $sql4->setSelect();  
            }

        }
    }
}else{
    foreach($modelos as $key=>$value){
        foreach ($colores as $color => $v) {
            foreach ($talles as $talle => $t) {
                $sql4 = new Sql;
                $zapatos[$key][$color][$talle] = $sql4->selectTablaNew($tabla,array('modelo'=>$key,'color'=>$color,'talle'=>$talle),$filtro_por,$orden,$limit);
                $cantidad[$key][$color][$talle] = count($zapatos[$key][$color][$talle]);
                if ($cantidad[$key][$color][$talle] !== 0){
              //  echo $key. $color.  $talle ."=". $cantidad[$key][$color][$talle]."<br/>";
                    $stock[$key][$color][$talle] = $cantidad[$key][$color][$talle];
                }
                $sql4->setSelect();  
            }

        }
    }
}
$null = is_null($stock);
if($null==true){
    echo "[]";
}else{
$sql->jsonConverter($stock); 
}

