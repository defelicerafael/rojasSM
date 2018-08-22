<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');

$objDatos = json_decode(file_get_contents('php://input'), true);
$dir = $objDatos['dir'];

$target_dir = "$dir";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma");
$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

//echo $_FILES["file"]["type"]."<br>";
//echo $_FILES["file"]["size"]."<br>";
//echo $_FILES["file"]["error"]."<br>";

if ((($_FILES["file"]["type"] == "video/mp4")
|| ($_FILES["file"]["type"] == "audio/mp3")
|| ($_FILES["file"]["type"] == "audio/wma")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg"))

&& ($_FILES["file"]["size"] < 9000000000)
&& in_array($extension, $allowedExts))

  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "error Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
 //   echo "Upload: " . $_FILES["file"]["name"] . "<br />";
 //   echo "Type: " . $_FILES["file"]["type"] . "<br />";
 //   echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
 //   echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists($target_file))
      {
      echo "error ".$_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $target_file);
      echo basename( $_FILES["file"]["name"]);
      }
    }
  }
else
  {
  echo "error No se pudo subir el video";
  }
?>