<?php 
require_once ('../../app.php');
use Models\ContactoEmpleado;

header("Content-Type: application/json");
$_DATAEDIT = json_decode(file_get_contents("php://input"), true);
$miContactoEmpleado = new ContactoEmpleado();
$miContactoEmpleado->editData($_DATAEDIT);
?>