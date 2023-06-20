<?php
include_once '../../app.php';
use Models\Unidades_Tematicas;

$_METHOD = $_SERVER["REQUEST_METHOD"];

$DATA = ($_METHOD == "POST" && count($_FILES))? array_merge($POST_,$FILES) :json_decode(file_get_contents('php://input'),true);
$objStack =  new  Unidades_Tematicas();
echo json_encode($objStack->postUnidad($DATA));




?>