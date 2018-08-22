<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');

include_once '../server/class_sql.php';

$objDatos = json_decode(file_get_contents('php://input'), true);
$id_pedido = $objDatos['id_pedido'];
// OBTENGO LA FECHA Y HORA DEL PEDIDO
date_default_timezone_set('America/Argentina/Buenos_Aires');
$date = date('m/d/Y h:i:s a', time());

// ACA OBTENGO LOS DATOS DEL JS
$id_pedido = $objDatos['id_pedido'];
$tabla = "pedidos";
$arrayFiltro = array('id'=>$id_pedido);
$select = $sql->selectTabla($tabla,$arrayFiltro,'id','ASC',1);
$sql->jsonConverter($select);  

?>