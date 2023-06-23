<?php 
require_once ('../../app.php');
use Models\Campers;
header("Content-Type: application/json");
$_DATAEDIT = json_decode(file_get_contents("php://input"), true);
$miCamper = new Campers();
$miCamper->editData($_DATAEDIT);
?>