<?php 
    include_once '../../app.php';
    
    use Models\Region;  
    $objRegion =new Region();
    echo json_encode($objRegion->loadAllData()); 
?>