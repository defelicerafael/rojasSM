<?php
header("Content-Type: text/html;charset=utf-8");

function convert_chars_to_entities( $str ) 
{ 
    
   
    $str = str_replace( 'µ','Á',  $str ); 
    $str = str_replace( '','É',  $str ); 
    $str = str_replace( 'Ö','Í',  $str ); 
    $str = str_replace( 'à','Ó',  $str ); 
    $str = str_replace( 'é','Ú',  $str );
    
    $str = str_replace( '¥','Ñ',  $str ); 
    $str = str_replace( '¤','ñ',  $str ); 
    
    $str = str_replace( '','é',  $str ); 
    $str = str_replace( '¡','í',  $str ); 
    $str = str_replace( '£','ú',  $str ); 
    $str = str_replace( '¢','ó',  $str ); 
    
    
    return $str; 
} 

//obtenemos el archivo .csv
$tipo = $_FILES['archivo']['type'];
 
$tamanio = $_FILES['archivo']['size'];
 
$archivotmp = $_FILES['archivo']['tmp_name'];
 
//cargamos el archivo
$lineas = file($archivotmp);
 
//inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
$i=0;
 
$conn = new mysqli("192.168.0.66", "san_ignacio_user", "legion10", "san_ignacio_nueva");
$acentos = $conn->query("SET NAMES 'utf8'");
$outp = "";
$error = 0;

//Recorremos el bucle para leer línea por línea
foreach ($lineas as $linea_num => $linea)
{ 
   //abrimos bucle
   /*si es diferente a 0 significa que no se encuentra en la primera línea 
   (con los títulos de las columnas) y por lo tanto puede leerla*/
   if($i != 0) 
   { 
       //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
       /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá 
       leyendo hasta que encuentre un ; */
       $datos = explode(";",$linea);
 
       //Almacenamos los datos que vamos leyendo en una variable
        $id_menu = utf8_encode(trim($datos[0]));
        $dia = utf8_encode(trim($datos[1]));
        $mes = utf8_encode(trim($datos[2]));
        $anio= utf8_encode(trim($datos[3]));
        $plato = utf8_encode(trim($datos[4]));
        $guarnicion = utf8_encode(trim($datos[5]));
        $postre = utf8_encode(trim($datos[6]));
        $alumnos = utf8_encode(trim($datos[7]));
        $fecha = utf8_encode(trim($datos[8]));
        
        
        $id_menu = convert_chars_to_entities($id_menu);
        $dia = convert_chars_to_entities($dia);
        $mes = convert_chars_to_entities($mes);
        $anio= convert_chars_to_entities($anio);
        $plato = convert_chars_to_entities($plato);
        $guarnicion = convert_chars_to_entities($guarnicion);
        $postre = convert_chars_to_entities($postre);
        $alumnos = convert_chars_to_entities($alumnos);
        $fecha = convert_chars_to_entities($fecha);
        
        /*
        echo $id_menu ."<br/>";
        echo $dia ."<br/>";
        echo $mes ."<br/>";
        echo $anio ."<br/>";
        echo $plato ."<br/>";
        echo $guarnicion ."<br/>";
        echo $postre ."<br/>";
        echo $alumnos ."<br/>";
        echo $fecha ."<br/>";*/
        
 
       //guardamos en base de datos la línea leida
       $sql = "INSERT INTO menu(id_menu,dia,mes,anio,plato,guarnicion,postre,alumnos,fecha) VALUES('$id_menu','$dia','$mes','$anio','$plato','$guarnicion','$postre','$alumnos','$fecha')";
       $resultado = $conn->query($sql);
       if ($resultado){
            $error = $error + 0;
        }else{
            $error = $error + 1;
        }
       
       //cerramos condición
       //echo $sql . "<br/>";
   }
 
   /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya 
   entraremos en la condición, de esta manera conseguimos que no lea la primera línea.*/
   $i++;
   //cerramos bucle
}

if ($error == 0){
    echo "NO HUBO ERRORES EN LA CARGA...";
}else{
    echo "SE HAN ENCONTRADO $error EN LA CARGA...";
}

