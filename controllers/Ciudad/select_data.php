<?php 
    include_once '../../app.php';
    
    use Models\Ciudad;  
    $objCiudad =new Ciudad();
    echo json_encode($objCiudad->loadAllData()); 
?>