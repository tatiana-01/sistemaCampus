<!-- HEADER -->
<?php
    include_once __DIR__ . '/templates/headerEps.php';
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
            <a class="navbar-brand" href="#"><img class="logo" src="/images/logoEps.png" alt="EPS"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link menuEps" href="#" data-veryocultareps='["#registroEps", ["#listarRegistroEps"]]'> Registro EPS</a>
                    <a class="nav-link menuEps" href="#" data-veryocultareps='["#listarRegistroEps", ["#registroEps"]]'>Listar EPS</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- NAVBAR DOS -->

    <!-- MAIN -->
    <!-- lo que va a cambiar en las paginas -->
    <main>

        <section id="registroEps">
            <h1 class="title text-center">**** SISTEMA DE REGISTRO PARA LA ENTIDAD PROMOTORA DE SALUD (EPS) ****</h1>
            
            <section id="contenidoEps">
                <?php 
                    include_once __DIR__ . '/view/Eps/formEps.php';
                ?>
            </section>
        </section>
    
        <section id="listarRegistroEps">
            <h1 class="title text-center">++++ LISTADO DE LAS ENTIDADES PROMOTORAS DE SALUD (EPS) ++++</h1>

            <section class="container" id="listEps">
                <div class="card">
                    <h5 class="card-header text-center">EPS</h5>
                    <div class="card-body">
                
                        <?php 
                            include_once __DIR__ . '/view/Eps/listEps.php';
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