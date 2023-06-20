<?php 
    require_once ('../../app.php');
    use Models\Personas;
    $miPersonas = new Personas();
    $miPersonas->deleteData($_GET['idPersona']); 
    header('location:../../views/empleado/listarEmpleado.php');
?>