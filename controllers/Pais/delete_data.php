<?php
    namespace Controllers; 
    include_once '../../app.php';

    use Models\Pais;
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        // El método de solicitud es GET
        $objPais = new Pais();
        $objPais->deleteData($_GET['id']);
    } else {
        // El método de solicitud no es GET
        echo "La solicitud no se hizo utilizando el método GET";
    }
?>