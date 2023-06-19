<?php
    require_once ('../../app.php');
    use Models\CamperAcudiente;
    $miCamperAcudiente = new CamperAcudiente();
    header("Content-Type: application/json"); 
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $miCamperAcudiente->saveData($_DATA); 

?>