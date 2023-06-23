<?php 
    require_once ('../../app.php');
    use Models\Campers;
    $miCamper = new Campers();
    $miCamper->deleteData($_GET['idCamper']); 
    header('location:../personas/deletePersonas.php?idPersona='.$_GET["idPersona"].'&idCamper='.$_GET['idCamper']);
?>