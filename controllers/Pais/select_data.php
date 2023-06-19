<?php 
    include_once '../../app.php';
    
    use Models\Pais;  
    $objPais =new Pais();
    echo json_encode($objPais->loadAllData()); 
?>