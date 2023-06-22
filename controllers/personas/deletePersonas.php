<?php 
    require_once ('../../app.php');
    use Models\Personas;
    $miPersonas = new Personas();
    $miPersonas->deleteData($_GET['idPersona']); 
    if($_GET['idCamper']){
        header('location:../../views/camper/listarCamper.php');
    }else{
        header('location:../../views/empleado/listarEmpleado.php');
    }
  
?>