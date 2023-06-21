<?php 
require_once ('../../app.php');
use Models\Acudiente;
header("Content-Type: application/json");
$_DATAEDIT = json_decode(file_get_contents("php://input"), true);
$miAcudiente = new Acudiente();
$miAcudiente->editData($_DATAEDIT);
?>