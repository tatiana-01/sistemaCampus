<?php
    require_once ('../../app.php');
    use Models\Campers;
    $miCamper = new Campers();
    header("Content-Type: application/json"); 
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $miCamper->saveData($_DATA); 

?>