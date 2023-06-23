<?php 
    include_once '../../app.php';
    use Models\Eps;

    $_METHOD = $_SERVER["REQUEST_METHOD"];
    $_DATA = ($_METHOD=="POST" && count($_FILES)) ? array_merge($_POST,$_FILES): json_decode(file_get_contents("php://input"), true);
    $objEps =new Eps();
    echo json_encode($objEps->updateData($_DATA)); 
?>