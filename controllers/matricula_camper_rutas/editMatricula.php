<?php 
require_once ('../../app.php');
use Models\Matricula;
header("Content-Type: application/json");
$_DATAEDIT = json_decode(file_get_contents("php://input"), true);
$miMatricula = new Matricula();
$miMatricula->editData($_DATAEDIT);
?>