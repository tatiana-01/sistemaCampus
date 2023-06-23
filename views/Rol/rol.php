<!-- HEADER -->
<?php
    include_once __DIR__ . '../../../templates/headerRol.php';
?>
<!-- HEADER -->

<!-- SIDEBAR -->
<?php
    include_once __DIR__ . '../../../templates/sidebar.php';
?>
<!-- SIDEBAR -->

<!-- NAVBAR -->
<section id="content">

    <!-- NAVBAR -->
    <?php
        include_once __DIR__ . '../../../templates/navbar.php';
    ?>
    <!-- NAVBAR -->
    <!-- NAVBAR DOS -->
    <nav class="navbar navbar-expand-lg bg-secondary-subtle navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="logo" src="/images/logoRol.png" alt="ROL"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link menuRol" href="#" data-veryocultareps='["#registroRol", ["#listarRegistroRol"]]'> Registro ROL</a>
                    <a class="nav-link menuRol" href="#" data-veryocultareps='["#listarRegistroRol", ["#registroRol"]]'>Listar ROL</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- NAVBAR DOS -->

    <!-- MAIN -->
    <!-- lo que va a cambiar en las paginas -->
    <main>

        <section id="registroRol">
            
            <section id="contenidoRol">
                <?php 
                    include_once __DIR__ . '/formRol.php';
                ?>
            </section>

        </section>
    
        <section id="listarRegistroRol">
            <h1 class="title text-center">++++ LISTADO DE LOS DIFERENTES TIPOS DE COLABORADORES PROFESIONALES QUE SE ENCUENTRAN EN CAMPUS LANDS ++++</h1>

            <section class="container" id="listRol">
                <div class="card">
                    <h5 class="card-header text-center">TIPOS DE COLABORADORES</h5>
                    <div class="card-body">
                
                        <?php 
                            include_once __DIR__ . '/listRol.php';
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
    include_once __DIR__ . '../../../templates/footer.php';
?>
<!-- FOOTER -->