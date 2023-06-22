<?php 
    require_once ('../../app.php');
    use Models\Matricula;
    $miMatricula = new Matricula();
    $miMatricula->deleteData($_GET['idCamper']); 
    header('location:../campers/deleteCamper.php?idPersona='.$_GET["idPersona"].'&idCamper='.$_GET['idCamper']);
?>