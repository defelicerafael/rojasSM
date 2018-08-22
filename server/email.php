<?php
/**
 * @version 1.0
 */

require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario

$objDatos = json_decode(file_get_contents("php://input"));

$tabla = $objDatos->tabla;
$datos = $objDatos->datos;
$id = $objDatos->id;
$where = $objDatos->where;

$array = json_decode(json_encode($datos), True);



// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c1320252.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "stock@rojasshoemakers.com.ar";  // Mi cuenta de correo
$smtpClave = "Rsm4k3rs";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "stock@rojasshoemakers.com.ar";
$emailMili = "stock@rojasshoemakers.com.ar";
$emailJuli = "stock@rojasshoemakers.com.ar";

$cuerpo = "Hola Chicas, <br/>";
$cuerpo .= "La facturadora $array[facturadora], ha modificado el zapato con id: $id <br/>";
$cuerpo .= "Los datos han quedado de esta manera:<br/>";
$cuerpo .= "Enviado: <b>$array[enviado]</b> <br/>";
$cuerpo .= "Pago: <b>$array[pago] </b><br/>";
$cuerpo .= "Precio de venta:<b> $array[precio_de_venta]</b> <br/>";
$cuerpo .= "Precio final: <b>$array[precio_final] </b><br/>";
$cuerpo .= "Medio de pago: <b>$array[medios_de_pago]</b> <br/>";
$cuerpo .= "Fecha de venta:<b> $array[fecha_de_venta]</b> <br/>";
$cuerpo .= "Canales: <b>$array[canales]</b> <br/>";


$mail = new PHPMailer();
$mail->IsSMTP();
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
$mail->AddReplyTo($email); // Esto es para que al recibir el correo y poner Responder, lo haga a la cuenta del visitante. 
$mail->Subject = "RojasShoeMakers Stock - Cambio en $array[local], zapato id: $id"; // Este es el titulo del email.
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
