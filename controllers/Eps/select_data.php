<?php 
    include_once '../../app.php';
    use Models\Eps;  

    $objEps =new Eps();
    echo json_encode($objEps->loadAllData()); 
?>