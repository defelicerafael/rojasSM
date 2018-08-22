<?php
setlocale(LC_ALL,"es_ES@euro","es_ES","esp","es");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');
header("Content-Type: text/html;charset=utf-8");

include_once '../class_sql.php';
include_once "class.phpmailer.php";

$objDatos = json_decode(file_get_contents("php://input"));
    
$tabla = "equipo";
$filtro_por = "id";
//$filtro = $objDatos->filtro;
$array = array("nombre"=>"maccingami");

$orden = "ASC";
$limit = "1";
$sql = new Sql;
//$array = json_decode(json_encode($filtro), True); 
$select = $sql->selectTablaNew($tabla,$array,$filtro_por,$orden,$limit);


$id = $select[0][id];
$nombre = $select[0][capitan];
$equipo = $select[0][nombre];
$email = $select[0][email];
$escudo = $select[0][escudo];
$tipo = 1;

$ultimo_id = $sql->getlastId('partido');

$tabla2 = "partido";
$filtro_por2 = "id";
$array2 = array("id"=>$ultimo_id);
$orden2 = "DESC";
$limit2 = "1";
//$array2 = json_decode(json_encode($filtro2), True); 
$select2 = $sql->selectTablaNew($tabla2,$array2,$filtro_por2,$orden2,$limit2);

$dias = array("","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
$meses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$fecha_partido = $select2[1][fecha];
$caracter_partido = $select2[1][caracter];
if($caracter_partido == "Puntos"){
    $caracter = "POR LOS PUNTOS";
}else{
    $caracter = "AMISTOSO";
}

$futbol_partido = $select2[1][futbol];
//echo $fecha_partido;

$diaE = $dias[date('N', strtotime($fecha_partido))];

$mes = $meses[date('n', strtotime($fecha_partido))];

$porciones = explode("-", $fecha_partido);
$diaN = $porciones[2];


$hora_partido = $select2[1][hora];
$lugar_partido = $select2[1][lugar];
$jugadoresTodos = $select2[1][jugadores];
$jugadoresPos = $select2[1][pos];
$jugadoresEF = $select2[1][flechita];


$jugadores = json_decode($jugadoresTodos, true);
$posiciones = json_decode($jugadoresPos, true);
$estadoFisico = json_decode($jugadoresEF, true);


for($i=0;$i<count($posiciones);$i++){
    switch ($posiciones[$i]) {
        case "PT":
            $pos[$i] = "ARQUERO";
            break;
        case "LIB":
            $pos[$i] = "LIBERO";
            break;
        case "DC":
            $pos[$i] = "DEF CENTRAL";
            break;
        case "LAT":
            $pos[$i] = "DEF LATERAL";
            break;
        case "MCD":
            $pos[$i] = "MEDIO CENTRO DEFENSIVO";
            break;
        case "CRR":
            $pos[$i] = "CARRILERO";
            break;
        case "MC":
            $pos[$i] = "MEDIO CENTRO";
            break;
        case "INT":
            $pos[$i] = "INTERIOR";
            break;
        case "MP":
            $pos[$i] = "MEDIA PUNTA";
            break;
        case "EXT":
            $pos[$i] = "EXTREMO";
            break;
        case "SD":
            $pos[$i] = "SEGUNDO DELANTERO";
            break;
        case "CD":
            $pos[$i] = "CENTRO DELANTERO";
            break;
        default:
            break;
    }
}

for($i=0;$i<count($estadoFisico);$i++){
    switch ($estadoFisico[$i]) {
        case "1":
            $ef[$i] = "MALO";
            break;
        case "2":
            $ef[$i] = "REGULAR";
            break;
        case "3":
            $ef[$i] = "BUENO";
            break;
        case "4":
            $ef[$i] = "MUY BUENO";
            break;
        case "5":
            $ef[$i] = "EXCELENTE";
            break;
        
        default:
            break;
    }
}
/*
echo "<pre>";
print_r($jugadores);
echo "</pre>";
*/
if (count($jugadores)===1){
    $decirJugador = "jugador";
    $anotaron = "anoto";
}else{
    $decirJugador = "jugadores";
    $anotaron = "anotaron";
}

$link ="http://www.futbolcarta.com.ar/juego/#/equipo/maccingami/login";

/******************************************************************************************************/
$tabla3 = "skills";
$filtro_por3 = "id";
//$filtro2 = $objDatos->filtro2;
$array3 = array("equipo"=>"maccingami");
$orden3 = "DESC";
$limit3 = "100";
//$array3 = json_decode(json_encode($filtro2), True); 
$select3 = $sql->selectTablaNew($tabla3,$array3,$filtro_por3,$orden3,$limit3);
/*echo "<pre>";
print_r($select3);
echo "</pre>";*/


for($i=2;$i<count($select3);$i++){
    $TodosLosMails[$i] = $select3[$i][email];
}


        $mail = new PHPMailer(true);
        $mail->IsSMTP();
	$mail->SMTPAuth   = true;
        $mail->SMTPDebug = false; //muestra errores y mensajes //// enable SMTP authentication
        $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->Host       = "zorro.avnam.net";      // sets GMAIL as the SMTP server
        $mail->Port       = 465;            
       // $mail->SMTPDebug = true; //muestra errores y mensajes //
        $mail->CharSet = 'UTF-8';                        
        $mail->Username = "rdefelice@futbolcarta.com.ar";
        $mail->Password = "manjarlo1";
      
       
        //$cuerpo .= "<center>";
        $cuerpo .= "<h3>Hola <b> ".$nombre."</b></h3><br/>";
        $cuerpo .= "El partido pasado dejó muchas sensaciones...<br>";
        $cuerpo .= "Alguien dejo por escrito una nota sobre el mismo, ¿Querés saber de que se trata?<br>";
        
        $cuerpo .= "Ingresá a este link para leer la nota: <br>";
        $cuerpo .= "<a href='$link'>LEER NOTA SOBRE EL PARTIDO</a><br><br>";
        
        
        $cuerpo .= "<b>$equipo</b> es un equipo de amigos, jugamos a divertirnos!<br>";
        $cuerpo .= "PERO... con RESPONSABILIDAD,<br> tratá de estar 30' antes de cada partido, para precalentar <br><br>";
        $cuerpo .= "El $equipo cuenta con vos!! Nos vemos en el verde cesped!<br><br>";
        $cuerpo .= "<br> $nombre, capitán de $equipo.";
        $cuerpo .= "<br> $email.<br><br><br>";
        $cuerpo .= "<img src='http://www.futbolcarta.com.ar/juego/$escudo' width='300'/><br/>";
       // $cuerpo .= "</center>";
        
       // echo $cuerpo; 
      
        
      
        
        $mail->From = "$equipo@futbolcarta.com.ar";
        $mail->FromName = $equipo."FC";
        $mail->Subject = "HAY UN NUEVO ARTICULO SOBRE EL PARTIDO...";
        $mail->AddAddress("defelicerafael@gmail.com");
        
        foreach($TodosLosMails as $mailsT){
        $mail->AddBCC($mailsT);    
        }
        
        
        $mail->Body = $cuerpo;
        $mail->AltBody = "";
        $mail->IsHTML(true);
        $mail->Send();
        
       // echo $cuerpo; 
        
       if ($mail){
        //doy las gracias por el envï¿½o
            echo "El email se ha enviado correctamente.";
        }else{
            echo "Hubo un iconveniente al intentar mandar el mail, pruebe mas tarde, por favor";
        }       
       
     // unset($mail);
     // unset($cuerpo);
       
    

?>

