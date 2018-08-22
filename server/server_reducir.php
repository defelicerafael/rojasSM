<?php

include_once 'class_sql.php';

//print_r($_POST);
$id = $_POST["id"];
$equipo = $_POST["equipo"];
//echo $id;
$target_dir = "../img/$id/$equipo/";

if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}


//echo $target_dir;
$target_file = $target_dir . basename($_FILES["file"]["name"]);
//echo $target_file;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        echo "error -File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "error -File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "error -Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "error -Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "mp4" && $imageFileType != "MP4"
&& $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "GIF") {
    echo "error -Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "error -Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo basename( $_FILES["file"]["name"]);
    } else {
        echo "error -Sorry, there was an error uploading your file.";
    }
}

$origen = $target_file;
//echo $origen;
$destino = $target_dir ."$id"."_".  basename($_FILES["file"]["name"]);
$destino_temporal=tempnam("tmp/","tmp");

$imagen = getimagesize($origen);
//Sacamos la información
$ancho = $imagen[0]; 
$alto = $imagen[1];

if ($ancho > $alto){
$nuevo_ancho = 800;
$porcentaje = $nuevo_ancho * 100 / $ancho;
$nueva_altura = $porcentaje * $alto / 100;
}
if ($alto > $ancho){
$nueva_altura = 800;
$porcentaje = $nueva_altura * 100 / $alto;
$nuevo_ancho = $porcentaje * $ancho / 100;
}


redimensionar_jpeg($origen, $destino_temporal, $nuevo_ancho, $nueva_altura, 40);

// guardamos la imagen
$fp=fopen($destino,"w");
fputs($fp,fread(fopen($destino_temporal,"r"),filesize($destino_temporal)));
fclose($fp);
unlink($origen); 
// mostramos la imagen
//echo "<img src='img/$destino'>";
 
function redimensionar_jpeg($img_original, $img_nueva, $img_nueva_anchura, $img_nueva_altura, $img_nueva_calidad)
{
	// crear una imagen desde el original 
	$img = ImageCreateFromJPEG($img_original);
	// crear una imagen nueva 
	$thumb = imagecreatetruecolor($img_nueva_anchura,$img_nueva_altura);
	// redimensiona la imagen original copiandola en la imagen 
	ImageCopyResized($thumb,$img,0,0,0,0,$img_nueva_anchura,$img_nueva_altura,ImageSX($img),ImageSY($img));
 	// guardar la nueva imagen redimensionada donde indicia $img_nueva 
	ImageJPEG($thumb,$img_nueva,$img_nueva_calidad);
	ImageDestroy($img);
}

/*
$base = new Sql();
$base->insert("foto_necesidades",basename( $_FILES["file"]["name"]),"img");
*/

?>
