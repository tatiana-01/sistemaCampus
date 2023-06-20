<?php 
include_once '../../app.php';
use Models\Unidades_Tematicas;


if ($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    
    $objStack = new Unidades_Tematicas();
    $objStack->delUnidadById($_GET['id']);


}else{

    echo "La solicitud no se ha realizado";
}







?>