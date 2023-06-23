<!-- HEADER -->
<?php
    include_once __DIR__ . '/templates/headerLocati.php';
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
    <nav class="navbar navbar-expand-lg bg-secondary-subtle navbar">
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
                    <!--<a class="nav-link listarTodo" href="#">Listar Todo</a>-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Listar Todo</a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item menuLista" href="#" data-veryocultarlist='["#listPais", ["#listRegion", "#listCiudad"]]'>Paises</a></li>
                            <li><a class="dropdown-item menuLista" href="#" data-veryocultarlist='["#listRegion", ["#listPais", "#listCiudad"]]'>Regiones</a></li>
                            <li><a class="dropdown-item menuLista" href="#" data-veryocultarlist='["#listCiudad", ["#listPais", "#listRegion"]]'>Ciudades</a></li>
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <!-- NAVBAR DOS -->

    <!-- MAIN -->
    <!-- lo que va a cambiar en las paginas -->
    <main>
        <section id="registro">
            <h1 class="title text-center">SISTEMA DE REGISTRO DE LOCALIZACIÓN</h1>
            
            <section id="contenidoPais">
                <?php 
                    include_once __DIR__ . '/views/Country/formCountry.php';
                ?>
            </section>

            <section id="contenidoRegion">
                <?php 
                    include_once __DIR__ . '/views/Region/formRegion.php';
                ?>
            </section>

            <section id="contenidoCiudad">
                <?php 
                    include_once __DIR__ . '/views/City/formCity.php';
                ?>
            </section>
        </section>
    
        <section id="listarRegistros">
            <h1 class="title text-center">LISTADO DE PAISES, REGIONES Y CIUDADES</h1>

            <section class="container" id="listPais">
                <div class="card">
                    <h5 class="card-header text-center">Paises</h5>
                    <div class="card-body">
                
                        <?php 
                            include_once __DIR__ . '/views/Country/listCountry.php';
                        ?>
                    
                    </div>
                </div>
            </section>
            
            <section class="container" id="listRegion">
                <div class="card">
                    <h5 class="card-header text-center">Regiones</h5>
                    <div class="card-body">
                
                        <?php 
                            include_once __DIR__ . '/views/Region/listRegion.php';
                        ?>
                    
                    </div>
                </div>
            </section>
            
            <section class="container" id="listCiudad">
                <div class="card">
                    <h5 class="card-header text-center">Ciudades</h5>
                    <div class="card-body">
                
                        <?php 
                            include_once __DIR__ . '/views/City/listCity.php';
                        ?>
                    
                    </div>
                </div>
            </section>

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