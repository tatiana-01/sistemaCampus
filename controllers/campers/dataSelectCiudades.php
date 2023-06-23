<?php
include_once('../../app.php');
use Models\Campers;
$objCampers=new Campers();
$valor = json_decode(file_get_contents("php://input"), true);
$ciudades=$objCampers->loadDataByIdCiudades(intval($valor));

 ?>