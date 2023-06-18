<?php 
    require_once '../../app.php';
    use Models\Region;

    $_METHOD = $_SERVER["REQUEST_METHOD"];
    $_DATA = ($_METHOD=="POST" && count($_FILES)) ? array_merge($_POST,$_FILES): json_decode(file_get_contents("php://input"), true);
    $objRegion = new Region();
    echo json_encode($objRegion->saveData($_DATA));
?>