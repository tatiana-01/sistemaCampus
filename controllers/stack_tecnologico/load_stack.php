<?php
include_once '../../app.php';

use Models\Stack_Tecnologico;

if($_SERVER[REQUEST_METHOD] === GET){

   $objStack = new Stack_Tecnologico;
    
   $data = $objStack->getAllStack();
   return $data;
}


?>