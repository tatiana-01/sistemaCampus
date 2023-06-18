<?php
    require_once ('../../app.php');
    use Models\Acudiente;
    $miAcudiente = new Acudiente();
    header("Content-Type: application/json"); 
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $miAcudiente->saveData($_DATA); 

?>