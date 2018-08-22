<?php

//$fichero = "C:/AppServ/www/berrydesign/Site/empapeladosTelas/plantilla/index.tpl";
$nuevo_fichero = "C:/AppServ/www/berrydesign/Site/empapeladosTelas/index.php";

//***************************** COPIO EL ARCHIVO index.php A LA NUEVA CARPETA*********************************************************************//

// Configuracion rutas
//$fichero= "/ruta_fichero_original/fichero_original.php";
$ruta_plantilla_php = $nuevo_fichero;

// Leemos plantilla
$contenido_plantilla = file_get_contents($ruta_plantilla_php);
$buscar = '/*{{ACA VOY A ESCRIBIR }}*/';
$reemplazar = $buscar.'$'.$titulo.' = $bd->portfolio("'.$titulo.'");';
// Parseamos plantilla
$plantilla_parseada = str_replace("$buscar", "$reemplazar", $contenido_plantilla);

// Guardamos los cambios en el fichero original
$gestor = fopen($nuevo_fichero, "w");
if(fwrite($gestor, $plantilla_parseada)){
    echo "Escritura correcta de index.php";
}else{
    echo "No se pudo escribir en el fichero index.php"; 
}

echo $variable;  





?>
