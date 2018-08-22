<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');


$objDatos = json_decode(file_get_contents('php://input'), true);
$foto = $objDatos['foto'];

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
