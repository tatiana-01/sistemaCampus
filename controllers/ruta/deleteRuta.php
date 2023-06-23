<?php 
    require_once ('../../app.php');
    use Models\Ruta;
    $miRuta = new Ruta();
    $miRuta->deleteData($_GET['id']); 
    header('location:../../views/ruta/ruta.php');
?>