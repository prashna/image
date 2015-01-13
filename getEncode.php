<?php
require_once('hexdiff.php');

// if(intval($_POST['bit']) == 32){
  $temp = explode(".", $_FILES["file"]["name"]);
  $extension = end($temp);

  if (file_exists("tmp/" . $_FILES["file"]["name"]))
  {
    $_FILES["file"]["name"] . " already exists. ";
  }
  else
  {
    move_uploaded_file($_FILES["file"]["tmp_name"],
      "tmp/" . $_FILES["file"]["name"]);
  }
// } 
$url = "tmp/" . $_FILES["file"]["name"]; 
$tiempo_inicio_total = microtime(true);
$object = new imagediff($url, $_POST['bit'], true);
print_r($object->getEncode(intval($_POST['bit'])));
?> 