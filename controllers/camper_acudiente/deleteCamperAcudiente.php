<?php 
    require_once ('../../app.php');
    use Models\CamperAcudiente;
    $miAcudiente = new CamperAcudiente();
    if($_GET['idAcudiente']){
        $miAcudiente->deleteDataByIdAcudiente($_GET['idAcudiente']); 
        header('location:../acudiente/deleteAcudiente.php?idPersona='.$_GET["idPersona"].'&idAcudiente='.$_GET["idAcudiente"]);
    }else{
        $acudientes=explode(",",$_GET['idAcudientes']);
        foreach ($acudientes as $acudiente) {
            $miAcudiente->deleteDataByIdAcudiente($acudiente);
        }
        header('location:../acudiente/deleteAcudiente.php?idPersona='.$_GET["idPersona"].'&idAcudientes='.$_GET["idAcudientes"].'&idCamper='.$_GET['idCamper']); 
    }

?>