<?php
/**
 * @version 1.0
 */

require("class.phpmailer.php");
require("class.smtp.php");
include_once 'class_sql.php';

// Valores enviados desde el formulario

//$objDatos = json_decode(file_get_contents("php://input"));
//$id = $objDatos->id;
$id = "141";
//echo $id;

$d = array("id"=>$id);

$sql = new Sql;
$columnas = $sql->showColumnNames('zapato');
$select = $sql->selectTablaNew('zapato',$d,'id','ASC','1');
/*echo "<pre>";
print_r($select);
echo "</pre>";*/
//echo $select[0][local];
$local = array('nombre'=>$select[0][local]);
/*echo "<pre>";
print_r($local);
echo "</pre>";*/
$selectEmail = $sql->selectTablaNew('locales',$local,'id','ASC','1');
echo "<pre>";
print_r($selectEmail);
echo "</pre>";
$emailLocal = $selectEmail[0][email];

echo $emailLocal;

/*
// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c1320252.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "stock@rojasshoemakers.com.ar";  // Mi cuenta de correo
$smtpClave = "Rsm4k3rs";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "stock@rojasshoemakers.com.ar";
$emailMili = "stock@rojasshoemakers.com.ar";
$emailJuli = "stock@rojasshoemakers.com.ar";

$cuerpo = "Hola Chicas, <br/>";
$cuerpo .= "Se les ha asignado el zapato con: $id <br/>";
$cuerpo .= "El zapato tiene estas caracteristicas:<br/>";
$cuerpo .= "Modelo: <b>$array[modelo]</b> <br/>";
$cuerpo .= "Color: <b>$array[color] </b><br/>";
$cuerpo .= "Talle:<b> $array[talle]</b> <br/>";
$cuerpo .= "Precio: <b>$array[precio_de_venta] </b><br/>";


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
$mail->Subject = "RojasShoeMakers Stock - Han asignado al local $array[local], el zapato id: $id"; // Este es el titulo del email.
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
