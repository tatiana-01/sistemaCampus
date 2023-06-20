<?php 
require_once ('../../app.php');
use Models\Empleado;
header("Content-Type: application/json");
$_DATAEDIT = json_decode(file_get_contents("php://input"), true);
$miEmpleado = new Empleado();
$miEmpleado->editData($_DATAEDIT);
?>