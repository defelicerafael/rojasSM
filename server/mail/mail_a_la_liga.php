<?php 
$pagina = "invitaciones a LIGA CFC";
$desc = "Liga Oficial de Carta F&uacute;tbol club";
include_once "head.php";
include_once "menu.php";
include_once "conexion.php";
include_once "class.cfc.php";
include_once "class.phpmailer.php";

$cfc = new CFC();
$tipo = "";
$c="";

if ($_SERVER[REQUEST_METHOD]=="GET"){
    if (strlen($_GET[c])=="8"){ 
    $cT = $_GET[c];
    $c = $cfc->test_input($cT);
    $tipoT = $_GET[tipo];
    $tipo = $cfc->test_input($tipoT);
        }
    }

if (strlen($c)=="8"){

 $cfc->buscar_codigo_en_liga($c);
 $liga = $cfc->getLiga();
 $liga_mail = $liga[0][id_liga];
 //echo $liga_mail;
 $equipos = $cfc->buscar_equipo_en_liga($liga_mail);
 if ($equipos==false){
     $cfc->redireccionar("index.php", 1);
 }else{
     $cant = count($equipos);
     for($i=0;$i<$cant;$i++){
   // $cfc->verArray($equipos);
     $cfc->buscar_equipos("id_equipo", $equipos[$i][id_equipo]);
     $datos = $cfc->getEquipos();
   // $cfc->verArray($datos);
     $email = $datos[0][email_capitan];
     $nombre = $datos[0][nombre_capitan];
   //  echo $email."/".$nombre."/".$c;
 
 /******************************************************************************************************************/       

     
        $mail = new PHPMailer(true);
        $mail->IsSMTP();
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->Host       = "zorro.avnam.net";      // sets GMAIL as the SMTP server
        $mail->Port       = 465;            
        $mail->SMTPDebug = 1; //muestra errores y mensajes //
                                 
        $mail->Username = "rdefelice@futbolcarta.com.ar";
        $mail->Password = "manjarlo1";
        
        if ($tipo==1){
        $cuerpo .= "<center>";
        $cuerpo .= "<img src='http://www.futbolcarta.com.ar/img/arriba_mail.png' width='700'/><br/>";
        $cuerpo .= "<h3>Hola <b> ".$nombre."</b></h3><br/>";
        $cuerpo .= "<em> Un <b>nuevo equipo</b> se ha anotado en tu liga de Carta f&uacute;tbol Club!</b><br>";
        $cuerpo .= "Puedes buscar tu liga con este c&oacute;digo:<b> $c. </b><br/>";
        $cuerpo .= "O ingresando en este link:<br/>";
        $cuerpo .= "<a href='http://www.futbolcarta.com.ar/inscripcion.php?c=$c'> Inscribite en mi liga </a> <br/>";
        $cuerpo .= "La liga comenzar&aacute; una vez que se hayan anotado 10 parejas!<br/>";
        $cuerpo .= "<br/>";
        $cuerpo .= "<img src='http://www.futbolcarta.com.ar/img/firma_mail.png' width='700'/>";
        $cuerpo .= "</center>";
        $mensaje = "Se han enviado mails a tu liga, indicando que hay un equipo nuevo";
        
        }
        if ($tipo==2){
        $cuerpo .= "<center>";
        $cuerpo .= "<img src='http://www.futbolcarta.com.ar/img/arriba_mail.png' width='700'/><br/>";
        $cuerpo .= "<h3>Hola <b> ".$nombre."</b></h3><br/>";
        $cuerpo .= "<em> YA ESTA COMPLETA TU LIGA!</b><br>";
        $cuerpo .= "Puedes buscar tu liga ingresando en este link: </b><br/>";
        $cuerpo .= "<a href='http://www.futbolcarta.com.ar/tabla.php?l=$liga_mail'> Ver mi liga </a> <br/>";
        $cuerpo .= "La liga comenzar&oacute; A GANAR!<br/>";
        $cuerpo .= "<br/>";
        $cuerpo .= "<img src='http://www.futbolcarta.com.ar/img/firma_mail.png' width='700'/>";
        $cuerpo .= "</center>";
        $mensaje = "Se han enviado mails a tu liga, indicando que hay YA COMIENZA LA LIGA!";
        
        }
        
        $mail->From = "info@futbolcarta.com.ar";
        $mail->FromName = "CFC LIGAS";
        $mail->Subject = "Se ha sumado un equipo a tu LIGA de CFC!";
        $mail->AddAddress($email);
        //$mail->AddBCC();
        $mail->Body = $cuerpo;
        $mail->AltBody = "";
        $mail->IsHTML(true);
        $mail->Send();
      unset($mail);
      unset($cuerpo);
       
        //echo $email[$i];
       
        
     }   

    }


}
if (tipo==1){
?>
<center>
<a href="liga.php" class="btn btn-info" role="button"> VOLVER </a>
</center>
<?php
}
if (tipo==2){
?>
<center>
<a href="tabla.php?l=<?php echo $liga_mail;?>" class="btn btn-info" role="button"> IR A LA LIGA </a>
</center>
<?php
}
?>
    