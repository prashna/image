<?php
require_once('hexdiff.php');
$url = "tmp/" . $_FILES["file"]["name"]; 
$attrs = $_POST;
$attrs["hex"] = json_decode($attrs["hex"]);
// var_dump($attrs['hex']);exit;
$object = new imagediff($url, $_POST['bit'], true);
$object->getDiff($attrs);
?> 