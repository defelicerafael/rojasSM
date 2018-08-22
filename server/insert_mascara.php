<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');
include_once 'class_sql.php';

//echo "llegue";

$objDatos = json_decode(file_get_contents("php://input"));

$tabla = $objDatos->tabla;
$titulo = $objDatos->titulo;
$donde = $objDatos->donde;
$fecha = $objDatos->fecha;


$sql = new Sql;
$insert = $sql->insert($tabla,$titulo,$donde);

$lastId = $sql->getLastId($tabla);
//echo $lastId;

$sql->edit($tabla,'fecha',$fecha,$lastId);
$mal = $sql->getMal();
if($mal>0){
    echo "Hubo $mal errores, pruebe mas tarde...";
}else{
    echo "Realizamos la edicion con exito!";
}
/*
$estructura = "../../images/eventos/$lastId";
echo $estructura;

$crear = mkdir($estructura, null, true);
$permisos = chmod($estructura, 0777);
if($crear){
    echo "carpeta creada con exito";
}else{ 
    echo "no se pudo crear carpeta";
    
}

if($permisos){
    echo "Permisos creados con exito<br>";
}else{
    echo "No se pudieron crear los permisos";
}
*/
?>