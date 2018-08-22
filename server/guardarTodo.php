<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');
include_once 'class_sql.php';

$objDatos = json_decode(file_get_contents("php://input"));

function array_push_assoc($array, $key, $value){
$array[$key] = $value;
return $array;
}

date_default_timezone_set('America/Argentina/Buenos_Aires');

$filtro = $objDatos->datos;
$tabla = $objDatos->tabla;
$mail = $objDatos->mail;
$clase = $objDatos->clase;

//print_r($filtro);

/*
$filtro = array('id_modelo'=>'0004','id_user'=>'428297407');
$tabla = 'guardar';
$mail = 'defelicerafael@gmail.com';
$clase = 'littleberry';
*/
$sql = new Sql;

$tabla = $sql->test_input($tabla);
$mail = $sql->test_input($mail);



$arraySinFecha = json_decode(json_encode($filtro), True);

//print_r($arraySinFecha);

$date = date('Y-m-d');
$array = array_push_assoc($arraySinFecha, 'fecha', $date);


$guardar = $sql->selectTabla("modelos",$arraySinFecha,"id","ASC",50);

//print_r($guardar);

for ($i=0;$i<count($guardar);$i++){
        $dato[$i] = array("base64"=>$guardar[$i][base64],"r"=>$guardar[$i][rojo],"g"=>$guardar[$i][verde],"b"=>$guardar[$i][azul]);
    }

$array = array_push_assoc($array,'base64',json_encode($dato));
$array = array_push_assoc($array,'mail',$mail);
$array = array_push_assoc($array,'clase',$clase);


$insert = $sql->insert_array($tabla,$array);

?>