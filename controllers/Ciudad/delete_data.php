<?php
    namespace Controllers; 
    include_once '../../app.php';

    use Models\Ciudad;
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        // El método de solicitud es GET
        $objCiudad = new Ciudad();
        $objCiudad->deleteData($_GET['id']);
    } else {
        // El método de solicitud no es GET
        echo "La solicitud no se hizo utilizando el método GET";
    }
?>