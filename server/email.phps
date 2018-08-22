<?php
error_reporting(E_ALL);
ini_set('display_errors', 'E_ALL');


require("class.phpmailer.php");


$mail = new PHPMailer(true);
$mail->Host = "localhost";
$mail->From = 'no-reply@c1320252.ferozo.com';
$mail->FromName = 'Variette Multiespacio';
$mail->Subject = "Se han contactado via WEB";
$mail->AddAddress("defelicerafael@gmail.com","variettemultiespacio.com.ar - CONTACTO");


$mail->Body = 'HOLA LOCO';
$mail->AltBody = "variettemultiespacio.com.ar - CONTACTO";
$mail->Send();

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}