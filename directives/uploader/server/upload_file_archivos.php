<?php

$dir = $_POST["dir"];

$target_dir = $dir;

if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$target_file = $target_dir . basename($_FILES["file"]["name"]);


$allowedExts = array("pdf", "doc", "docx");
$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

//echo $_FILES["file"]["type"]."<br>";
//echo $_FILES["file"]["size"]."<br>";
//echo $_FILES["file"]["error"]."<br>";

if ((($_FILES["file"]["type"] == "application/pdf")
|| ($_FILES["file"]["type"] == "application/msword")
|| ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"))
//|| ($_FILES["file"]["type"] == "application/vnd.ms-excel")
//|| ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
//|| ($_FILES["file"]["type"] == "image/jpeg"))

&& ($_FILES["file"]["size"] < 9000000000)
&& in_array($extension, $allowedExts))

  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "error Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
  //  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
  //  echo "Type: " . $_FILES["file"]["type"] . "<br />";
  //  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
  //  echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

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
  echo "error No se pudo subir el archivo";
  }
?>