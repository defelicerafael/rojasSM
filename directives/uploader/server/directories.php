<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');

$objDatos = json_decode(file_get_contents('php://input'), true);
$dir = $objDatos['dir'];
echo $dir;

$directorio = $dir;
$ficheros1  = scandir($directorio);

$outp = "";
foreach($ficheros1 as $f){
    if ($outp != "") {$outp .= ",";}
    if (($f!==".")&&($f!=="..")){
    $outp .= '{"img":"'  . $f. '"}';
    }
    
}
$outp ='['.$outp.']';
echo($outp);

?>
