<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');
include_once 'class_sql.php';

$objDatos = json_decode(file_get_contents("php://input"));



$codigo = $objDatos->codigo;
$clase = $objDatos->clase;
$id_user = $objDatos->id_user;

//$id_user = 1;


$filtro_codigo = array("id_modelo"=>$codigo,"clase"=>$clase);

$sql = new Sql;
$select = $sql->selectTabla("mascaras",$filtro_codigo,"id","ASC",10);

$arrayMascara = json_decode($select[0]['mascara'],true);
$arrayRgb = json_decode($select[0]['rgb'],true);

for ($i=0;$i<count($arrayMascara);$i++){
    if($arrayMascara[$i]===""){
        $layer = "canvasesdiv";
        echo $layer;
    }else{
        $layer = "layer";
        $layer .=$i;
        echo $layer;
    }
    $arrayRgb[$i]['rojo'];
    $array = array("id_user"=>$id_user,"mascara"=>$i,"rojo"=>$arrayRgb[$i]['r'],"verde"=>$arrayRgb[$i]['g'],"azul"=>$arrayRgb[$i]['b'],"img"=>"$arrayMascara[$i]","id_modelo"=>"$codigo","layer"=>$layer);
    $insert = $sql->insert_array("modelos",$array);
    
    }

?>