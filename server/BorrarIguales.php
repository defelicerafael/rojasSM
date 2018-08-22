<?php
include_once 'class_sql.php';
include_once 'Text_class.php';
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
$id = $array[id];

$select = $sql->selectTablaUnDato($columna,$tabla,$array);     

$arrayI = json_decode($select);

print_r($arrayI);

for($i=0;$i<count($arrayI);$i++){
    if($arrayI[$i]==$dato){
        unset($arrayI[$i]);
    }
}

$json = json_encode($arrayI);
echo $json;
$sql->editNew($tabla,$columna,$json,'id',$id);


$mal = $sql->getMal();
if($mal>0){
    echo "Hubo $mal errores, pruebe mas tarde...";
}else{
    echo "Realizamos la edicion con exito!";
}


?>
