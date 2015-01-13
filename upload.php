<?php
require_once('db.php');
move_uploaded_file($_FILES["file"]["tmp_name"],
  "uploads/" . $_FILES["file"]["name"]);
unlink($_POST["path"]);

$url = "uploads/" . $_FILES["file"]["name"]; 
$sql = "INSERT INTO images(url,name,encoded_16,encoded_32,size,type,upload_date) ";
$date = date('d-m-Y');
$e16 = json_encode($_POST["encoded_16"]);
$e32 = json_encode($_POST["encoded_32"]);
// echo $e16;exit;
$sql = $sql . "VALUES('".$url."','".$_FILES["file"]["name"]."',$e16,$e32,'".$_FILES["file"]["size"]."','".$_FILES["file"]["type"]."',now())";
$a = mysql_query($sql);
echo $url;
?> 