<?php
include_once 'class_sql.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');

$objDatos = json_decode(file_get_contents("php://input"));


    
    $id_partido = $objDatos->id_partido;
    $equipo = $objDatos->equipo;
    $name = $objDatos->name;
    $tabla = $objDatos->tabla;
   
    $sql = new Sql;
    $sql->insert($tabla,$name,"img");
    $id = $sql->getlastId($tabla);
    
    $sql->edit($tabla,"id_partido",$id_partido,"id",$id);
    $sql->edit($tabla,"equipo",$equipo,"id",$id);
    
    
    //print_r($array);
    

    
    


?>
