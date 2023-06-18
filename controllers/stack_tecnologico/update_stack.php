<?php
include_once '../../app.php';

use Models\Stack_Tecnologico;

if($_SERVER[REQUES_METHOD] === 'UPDATE'){

    $objStack = new Stack_Tecnologico();
    $objStack->updateStackById($_GET['id']);
}


?>