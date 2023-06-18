<!-- HEADER -->
<?php
    include_once __DIR__ . '/templates/header.php';
?>
<!-- HEADER -->

<!-- SIDEBAR -->
<?php
    include_once __DIR__ . '/templates/sidebar.php';
?>
<!-- SIDEBAR -->

<!-- NAVBAR -->
<section id="content">

    <!-- NAVBAR -->
    <?php
    include_once __DIR__ . '/templates/navbar.php';
    ?>
    <!-- NAVBAR -->
    <!-- NAVBAR DOS -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="logo" src="/images/logoTierra1.png" alt="Mundo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link menu" href="#" data-veryocultar='["#contenidoPais", ["#contenidoRegion", "#contenidoCiudad"]]'> Registro Pais</a>
                    <a class="nav-link menu" href="#" data-veryocultar='["#contenidoRegion", ["#contenidoPais", "#contenidoCiudad"]]'>Registro Region</a>
                    <a class="nav-link menu" href="#" data-veryocultar='["#contenidoCiudad", ["#contenidoPais", "#contenidoRegion"]]'>Registro Ciudad</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- NAVBAR DOS -->

    <!-- MAIN -->
    <!-- lo que va a cambiar en las paginas -->
    <main>
        <h1 class="title text-center">SISTEMA DE REGISTRO DE LOCALIZACIÓN</h1>
        
        <section id="contenidoPais">
            <?php 
                include_once __DIR__ . '/view/Country/formCountry.php';
            ?>
        </section>

        <section id="contenidoRegion">
            <?php 
                include_once __DIR__ . '/view/Region/formRegion.php';
            ?>
        </section>

        <section id="contenidoCiudad">
            <?php 
                include_once __DIR__ . '/view/City/formCity.php';
            ?>
        </section>

    </main>
    <!-- MAIN -->
</section>
<!-- NAVBAR -->

<!-- FOOTER -->
<?php
    include_once __DIR__ . '/templates/footer.php';
?>
<!-- FOOTER -->