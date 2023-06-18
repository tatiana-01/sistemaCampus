<?php 
require_once ('../../app.php');
use Models\Ruta;

header("Content-Type: application/json");
$_DATAEDIT = json_decode(file_get_contents("php://input"), true);
$miRuta = new Ruta();
$miRuta->editData($_DATAEDIT);
?>