<?php 
    require_once ('../../app.php');
    use Models\Acudiente;
    $miAcudiente = new Acudiente();
    if($_GET['idAcudiente']){
        $miAcudiente->deleteDataById($_GET['idAcudiente']); 
        header('location:../../views/camper/masInfoCamper.php?idPersona='.$_GET["idPersona"]);
    }else{
        $acudientes=explode(",",$_GET['idAcudientes']);
        foreach ($acudientes as $acudiente) {
            $miAcudiente->deleteDataById($acudiente);
        }
        header('location:../matricula_camper_rutas/deleteMatricula.php?idPersona='.$_GET["idPersona"].'&idAcudientes='.$_GET["idAcudientes"].'&idCamper='.$_GET['idCamper']);
    }
    
?>