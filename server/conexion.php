<?php
$server="192.168.0.66";
$usuariodb="san_ignacio_user";
$clave_db="legion10";
$base="san_ignacio_nueva";

$id_con=mysql_connect($server, $usuariodb, $clave_db);
mysql_select_db($base, $id_con);
/*
if($con){
echo "conectado";
}else{
    echo "no conectado";
}
*/
?>