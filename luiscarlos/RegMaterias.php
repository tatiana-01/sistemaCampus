
<?php

    include_once __DIR__ . '../../app.php';
    include_once __DIR__ . '/headerLuis.php';

?>
<?php


    include_once __DIR__ . '../../templates/sidebar.php';

?>


<?php
    include_once __DIR__ . '../../templates/navbar.php';
?>

<!-- MAIN -->
<section id="content">

    <!-- NAVBAR -->
    <?php
    include_once __DIR__ . '/templates/navbar.php';
    ?>
    <!-- NAVBAR -->
    <!-- NAVBAR DOS -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img  src="../images/Materias.png" width="100px" alt="tecnologies"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link menuMaterias" href="#" data-ocultarmostrar='["#contenidoStack", ["#contenidoUnidadTematica", "#contenidoCapitulo", "#contenidoTema", "#contenidoModulo", "#contenidoTopico"]]'> Registro Stack Tecnologico</a>
                    <a class="nav-link menuMaterias" href="#" data-ocultarmostrar='["#contenidoUnidadTematica", ["#contenidoStack", "#contenidoCapitulo", "#contenidoTema", "#contenidoModulo", "#contenidoTopico"]]'>Registro Unidades tematicas</a>
                    <a class="nav-link menuMaterias" href="#" data-ocultarmostrar='["#contenidoCapitulo", ["#contenidoStack", "#contenidoUnidadTematica", "#contenidoTema", "#contenidoModulo", "#contenidoTopico"]]'>Registro capitulo</a>
                    <a class="nav-link menuMaterias" href="#" data-ocultarmostrar='["#contenidoTema", ["#contenidoStack", "#contenidoCapitulo", "#contenidoUnidadTematica", "#contenidoModulo", "#contenidoTopico"]]'>Registro tema</a>
                    <a class="nav-link menuMaterias" href="#" data-ocultarmostrar='["#contenidoModulo", ["#contenidoStack", "#contenidoCapitulo", "#contenidoTema", "#contenidoUnidadTematica", "#contenidoTopico"]]'>Registro modulo</a>
                    <a class="nav-link menuMaterias" href="#" data-ocultarmostrar='["#contenidoTopico", ["#contenidoStack", "#contenidoCapitulo", "#contenidoTema", "#contenidoModulo", "#contenidoUnidadTematica"]]'>Registro topico</a>
                </div>
            </div>
        </div>
    </nav>



<div id="contenidoStack" style="display:none">
    
    <?php

    include_once __DIR__ .'../../view/stack_tecnologico/frmStack.php';

    ?>
</div>


<div id="contenidoCapitulo" style="display:none">

    <?php 
        include_once __DIR__ . '../../view/capitulo/frmCapitulo.php'
    ?>

</div>



<div id="contenidoTema" style="display:none">

   <?php
    
        include_once __DIR__ . '../../view/tema/frmTema.php';
    ?>

</div>

<div id="contenidoModulo" style="display:none">
    <?php
    
        include_once __DIR__ . '../../view/modulo/frmModulo.php';
    ?>

</div>

<div id="contenidoUnidadTematica" style="display:none">
<h2>holaaaa</h2>
    <?php
    
        include_once  __DIR__ . '../../view/unidad_tematica2/unidad.php';
    ?>

</div>


<div id="contenidoTopico" style="display:none">
<h2>holaaaa</h2>
    <?php
    
        include_once  __DIR__ . '../../view/topico/frmTopico.php';
    ?>

</div>






















