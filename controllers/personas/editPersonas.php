<?php 
require_once ('../../app.php');
use Models\Personas;
header("Content-Type: application/json");
$_DATAEDIT = json_decode(file_get_contents("php://input"), true);
$miPersonas = new Personas();
$miPersonas->editData($_DATAEDIT);
?>