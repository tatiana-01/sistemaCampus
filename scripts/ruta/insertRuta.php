<?php
    require_once ('../../app.php');
    use Models\Ruta;
    $miRuta = new Ruta();
    header("Content-Type: application/json"); 
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $miRuta->saveData($_DATA); 
?>