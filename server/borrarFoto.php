<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');
header("Content-Type: text/html;charset=utf-8");

include_once 'class_sql.php';

$objDatos = json_decode(file_get_contents('php://input'), true);
$foto = $objDatos['foto'];
$tabla = $objDatos['tabla'];
$nombre = $objDatos['nombre'];
$tabla_foto = $objDatos['tabla_foto'];

$bd = new Sql;

$bd->delete_foto($tabla,$tabla_foto, $nombre);


if (file_exists($foto)) {
    echo "El fichero $foto existe";
} else {
    echo "El fichero $foto no existe";
}

$borrar = unlink($foto);
if ($borrar){
    echo "Foto borrada";
}
    


?>
