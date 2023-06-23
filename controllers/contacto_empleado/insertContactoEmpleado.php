<?php
    require_once ('../../app.php');
    use Models\ContactoEmpleado;
    $miContactoEmpleado = new ContactoEmpleado();
    header("Content-Type: application/json"); 
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $miContactoEmpleado->saveData($_DATA); 

?>