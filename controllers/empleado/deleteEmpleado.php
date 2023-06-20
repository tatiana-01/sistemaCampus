<?php 
    require_once ('../../app.php');
    use Models\Empleado;
    $miEmpleado = new Empleado();
    $miEmpleado->deleteData($_GET['idEmpleado']); 
    header('location:../personas/deletePersonas.php?idPersona='.$_GET["idPersona"]);
?>