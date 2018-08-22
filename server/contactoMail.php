<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');
include_once 'class_sql.php';

$objDatos = json_decode(file_get_contents("php://input"));



$datos = $objDatos->datos;
$tabla = $objDatos->tabla;
$array = json_decode(json_encode($datos), True);

/*print_r($datos);
echo $tabla;
print_r($array);*/

$sql = new Sql;
$insert = $sql->insert_array($tabla,$array);

$date = date("d/m/Y");

$cuerpo .= "<b>DATOS DEL CONTACTO</b><br>";
$cuerpo .= "<hr>";
$cuerpo .= "<b>Nombre:</b> " . $array['nombre'] . "<br>";
$cuerpo .= "<b>Apellido:</b> " . $array['apellido'] . "<br>";
$cuerpo .= "<b>Correo Electronico:</b> " . $array['email'] . "<br/>";
$cuerpo .= "<hr>";
$cuerpo .= "<b>DATOS DEL EVENTO</b><br>";
$cuerpo .= "<hr/><b>Evento: </b>". $array['evento'] ." <br/>";
$cuerpo .= "<b> El o la cumplea&ntilde;ero/a es de sexo </b> ".$array['sexo']."<br/>";
$cuerpo .= "<b> y tiene </b> ".$array['edad']." a&ntilde;os. <br/>";
$cuerpo .= "<b> LA FECHA DEL EVENTO ES: </b> ".$array['fecha']."<br/>";
$cuerpo .= "<b> Asistarían : </b> ".$array['chicos']." chicos <br/>";
$cuerpo .= "<b> Y </b> ".$array['adultos']." adultos <br/>";

$cuerpo .= "<hr>";
$cuerpo .= "Este mail se origina cuando el usuario hace clic en 'ENVIAR' en contacto <br/>";
$cuerpo .= "El contacto se efectu&oacute; en la fecha: $date <br/>";

//echo $cuerpo;

require("class.phpmailer.php");

$mail = new PHPMailer();
$mail->Host = "localhost";
$mail->From = 'no-reply@wi151701.ferozo.com';
$mail->FromName = 'Variette Multiespacio';
$mail->Subject = "Se han contactado via WEB";
$mail->AddAddress("defelicerafael@gmail.com","variettemultiespacio.com.ar - CONTACTO");
$mail->AddAddress("variettemultiespacio@gmail.com","variettemultiespacio.com.ar - CONTACTO");
$mail->AddAddress("sol@variettemultiespacio.com.ar","variettemultiespacio.com.ar - CONTACTO");
$mail->AddAddress("alina@variettemultiespacio.com.ar","variettemultiespacio.com.ar - CONTACTO");

$mail->Body = $cuerpo;
$mail->AltBody = "variettemultiespacio.com.ar - CONTACTO";
$mail->Send();

if ($mail){
//doy las gracias por el env?o
echo "1";
}else{
    echo "0";
}   

/*
$cuerpo2 .= "<b>Hola ".$select[0]['nombre'].",</b><br/>";
$cuerpo2 .= "Te env&iacute;o una copia de tu pedido.<br/><br/>";
$cuerpo2 .= "<hr/><b>PEDIDO: $id </b><br/>";

for ($i=0;$i<count($datos_pedido);$i++){

    foreach($datos_pedido[$i] as $key=>$value){
        if ($key=='nombre'){
            $cuerpo2 .= "Articulo : $value <br/>";
        }
        if ($key=='talle'){
            $cuerpo2 .= "Talle : $value <br/>";
        }
        if ($key=='color'){
            $cuerpo2 .= "Color : $value <br/><hr>";
        }
        if ($key=='precio'){
            $cuerpo2 .= "Precio :$$value <br/>";
        }
    }
}
$cuerpo2 .= "<b> ENVIO: </b> ".$select[0]['envio']."<br/>";
$cuerpo2 .= "<b> PAGO: </b> ".$select[0]['pago']."<br/>";
$cuerpo2 .= "<hr>";

if ($select[0]['envio']=='domicilio'){
    $cuerpo2 .= "Provincia :".$select[0]['provincia']." <br/>";
    $cuerpo2 .= "Localidad :". $select[0]['localidad']."<br/>";
    $cuerpo2 .= "Ciudad :". $select[0]['ciudad']." <br/>";
    $cuerpo2 .= "Direccion :".$select[0]['direccion']." <br/>";
    $cuerpo2 .= "Cp :".$select[0]['cp']." <br/>";
}
$cuerpo2 .= "<hr>";
$cuerpo2 .= "Dentro de unas horas recibir&aacute; las indicaciones para poder efectuar el pago.<br/>";
$cuerpo2 .= "El pedido se efectu&oacute; en la fecha: $date <br/>";



$mail2 = new PHPMailer();
$mail2->Host = "localhost";
$mail2->From = 'no-reply@c0800130.ferozo.com';
$mail2->FromName = 'NEQUI.COM.AR';
$mail2->Subject = "NEQUI.COM.AR - PEDIDO DE COMPRA ";
$mail2->AddAddress($select[0]['mail'],"Nequi.com.ar - PEDIDO DE COMPRA");
$mail2->Body = $cuerpo2;
$mail2->AltBody = "Nequi.com.ar - PEDIDO DE COMPRA";
$mail2->Send();

if ($mail2){
//doy las gracias por el env?o
echo "1";
}else{
    echo "0";
} 

*/


