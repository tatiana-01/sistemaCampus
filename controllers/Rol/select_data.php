<?php 
    include_once '../../app.php';
    use Models\Rol;  

    $objRol = new Rol();
    echo json_encode($objRol -> loadAllData()); 
?>