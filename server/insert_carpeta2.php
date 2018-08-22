<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');

include_once 'class_sql.php';
echo "llegue";

/*$objDatos = json_decode(file_get_contents("php://input"));

$tabla = $objDatos->tabla;
$titulo = $objDatos->titulo;
$donde = $objDatos->donde;
$fecha = $objDatos->fecha;*/

$tabla = "agenda";
echo $tabla;
$titulo = "rafa";
echo $titulo;
$donde = "titulo";
echo $donde;
$fecha = "2016-12-12";
echo $fecha;

$sql = new Sql;
$insert = $sql->insert($tabla,$titulo,$donde);

$lastId = $sql->getLastId($tabla);
$sql->edit($tabla,'fecha',$fecha,$lastId);

$estructura = "../images/eventos/$lastId";
$crear = mkdir($estructura, null, true);
$permisos = chmod($estructura, 0777);
if($crear){
    echo "carpeta creada con exito<br>";
}else{"no se pudo crear carpeta";
if($permisos){
    echo "Permisos creados con exito<br>";
}else{
    echo "No se pudieron crear los permisos";
}
*/
?>