<?php
    require_once ('../../app.php');
    use Models\Matricula;
    $miMatricula = new Matricula();
    header("Content-Type: application/json"); 
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $miMatricula->saveData($_DATA);  

?>