<?php 
include_once '../../app.php';
use Models\Stack_Tecnologico;


if ($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    
    $objStack = new Stack_Tecnologico();
    $objStack->delStackById($_GET['id']);


}else{

    echo "La solicitud no se ha realizado";
}







?>