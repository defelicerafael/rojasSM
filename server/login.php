<?php
include_once 'class_sql.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');

$objDatos = json_decode(file_get_contents("php://input"));


    
$user = $objDatos->user;
$pass = $objDatos->pass;
$tabla = $objDatos->tabla;
$sql = new Sql;
$select = $sql->login($user,$pass,$tabla);  
echo $sql->getLogin();


    


?>
