<?php
    namespace Controllers; 
    include_once '../../app.php';
    use Models\Persona;

    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        // El método de solicitud es GET
        $objPersona = new Persona();
        $objPersona -> deleteData($_GET['id']);
    } else {
        // El método de solicitud no es GET
        echo "La solicitud no se hizo utilizando el método GET";
    }
?>