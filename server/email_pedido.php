<?php
/**
 * @version 1.0
 */

require("class.phpmailer.php");
require("class.smtp.php");


// Valores enviados desde el formulario
$objDatos = json_decode(file_get_contents("php://input"));
$local = $objDatos->local;
$zapato = $objDatos->zapato;
$arrayzapatos = json_decode(json_encode($zapato), True);
$cuantos = count($arrayzapatos);
//echo $cuantos;

//print_r($arrayzapatos);

//$id = "141";
//echo $id;




// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c1320252.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "stock@rojasshoemakers.com.ar";  // Mi cuenta de correo
$smtpClave = "cvtz@wli0Xnoqlm";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "defelicerafael@gmail.com";
//$emailMili = "stock@rojasshoemakers.com.ar";
//$emailJuli = "stock@rojasshoemakers.com.ar";

$cuerpo = "";

for($i=0;$i<$cuantos;$i++){
$cuerpo .= "Hola Chicas, <br/>";
   
    foreach ($arrayzapatos[$i] as $key => $value) {
        if($key==='id'){
            $cuerpo .= "El local $local, ha solicitado el zapato id: $value <br/>";     
        }
        if($key==='modelo'){
            $cuerpo .= "Modelo: <b>$value</b> <br/>";
        }
        if($key==='color'){
            $cuerpo .= "Color: <b>$value</b><br/>";
        }
        if($key==='talle'){
            $cuerpo .= "Talle:<b> $value</b> <br/>";
        }
     }
$cuerpo .= "<hr>";
}



$mail = new PHPMailer(true);
$mail->IsSMTP();
//$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->Port = 587; 
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";

$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;

$mail->From = $smtpUsuario; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($emailDestino); 
//$mail->AddAddress($emailMili);
//$mail->AddAddress($emailJuli);// Esta es la dirección a donde enviamos los datos del formulario
$mail->AddReplyTo("stock@rojasshoemakers.com.ar"); // Esto es para que al recibir el correo y poner Responder, lo haga a la cuenta del visitante. 
$mail->Subject = "RojasShoeMakers Stock - $local - Solicito $cuantos zapato/s"; // Este es el titulo del email.
$mensajeHtml = nl2br($cuerpo);
$mail->Body = "{$mensajeHtml}"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje}"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    echo "El correo fue enviado correctamente.";
} else {
    echo "Ocurrió un error inesperado.";
}
