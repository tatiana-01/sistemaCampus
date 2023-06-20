<?php 
    include_once '../../app.php';
    use Models\Persona;  

    $objPersona =new Persona();
    echo json_encode($objPersona -> loadAllData()); 
?>