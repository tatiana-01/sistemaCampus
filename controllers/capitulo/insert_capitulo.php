<?php
include_once '../../app.php';
use Models\Capitulos;
$METHOD = $_SERVER["REQUES_METHOD"] ;

$DATA= ($_METHOD == "POST" && count($_FILES))? array_merge($POST_,$FILES) :json_decode(file_get_contents('php://input'),true);
$objCapitulo =  new  Capitulos();
json_encode($objCapitulo->postDatacapitulo($DATA));






?>