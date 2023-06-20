<?php 
    require_once ('../../app.php');
    use Models\ContactoEmpleado;
    $miContactoEmpleado = new ContactoEmpleado();
    $miContactoEmpleado->deleteDataByIdEmpleado($_GET['idEmpleado']); 
    header('location:../empleado/deleteEmpleado.php?idPersona='.$_GET["idPersona"].'&idEmpleado='.$_GET['idEmpleado']);
?>