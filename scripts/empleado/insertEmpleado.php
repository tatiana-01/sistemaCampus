<?php
    require_once ('../../app.php');
    use Models\Empleado;
    $miEmpleado = new Empleado();
    header("Content-Type: application/json"); 
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $miEmpleado->saveData($_DATA); 

?>