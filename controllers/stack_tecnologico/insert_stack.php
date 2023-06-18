<?php
include_once '../../app.php';
use Models\Stack_Tecnologico;

$_METHOD = $_SERVER["REQUEST_METHOD"];

$DATA = ($_METHOD == "POST" && count($_FILES))? array_merge($POST_,$FILES) :jeson_decode(file_get_contents('php://input'),true);
$objStack =  new  Stack_Tecnologico();
echo json_encode($objStack->postDataStack($DATA));




?>