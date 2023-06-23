<?php
    require_once ('../../app.php');
    use Models\Personas;
    $miPersona = new Personas();
    header("Content-Type: application/json"); 
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $miPersona->saveData($_DATA); 
?>