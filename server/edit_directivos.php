<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');
include_once 'class_sql.php';

$objDatos = json_decode(file_get_contents("php://input"));

$tabla = $objDatos->tabla;
$datos = $objDatos->datos;
$array = json_decode(json_encode($datos), True);

$ccsi = new Sql;
foreach($array as $key=>$dato){
    if(!empty($dato)){
        $ccsi->edit($tabla,$key,$dato,$array['id_user'],$array['id_modelo'],$array['mascara']);
    }
}
$mal = $ccsi->getMal();
if($mal>0){
    echo "Hubo $mal errores, pruebe mas tarde...";
}else{
    echo "Realizamos la edicion con exito!";
}

?>



