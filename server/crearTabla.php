<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');

include '../../clases/berrydesign_class.php';

$objDatos = json_decode(file_get_contents('php://input'), true);

$titulo = $objDatos['titulo'];


$bd = new berryDesign;
$bd->crearTabla($titulo);


?>
