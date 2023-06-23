<?php 
    require_once ('../../app.php');
    use Models\ContactoEmpleado;
    $miContacto = new ContactoEmpleado();
    $miContacto->deleteData($_GET['idContacto']); 
    header('location:../../views/empleado/masInfoEmpleado.php?idPersona='.$_GET["idPersona"]);
?>