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

    <!-- MAIN --> 
    <!-- lo que va a cambiar en las paginas -->
    <main>

        <h1 class="title text-center ">SISTEMA DE REGISTRO DE CAMPUS LANDS</h1>
        <!--<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Dashboard</a></li>
			</ul>-->

        <div class="container d-flex justify-content-evenly mt-5 flex-wrap">
            <div class="card mt-3 " style="width: 18rem;">
                <img src="images/campers.png" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <a href="#" class="btn btn-primary">CAMPERS</a>
                </div>
            </div>

            <div class="card mt-3" style="width: 18rem;">
                <img src="images/man-teacher-3548.png" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <a href="#" class="btn btn-primary">TRAINNERS</a>
                </div>
            </div>

            <div class="card mt-3" style="width: 18rem;">
                <img src="images/empleados.png" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <a href="#" class="btn btn-primary">EMPLEADOS</a>
                </div>
            </div>

            <div class="card mt-3" style="width: 18rem;">
                <img src="images/empleados.png" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <a href="#" class="btn btn-primary">PRROGRAMA ACADEMICO</a>
                </div>
            </div>


            <div class="card mt-3" style="width: 18rem;">
                <img src="images/empleados.png" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <a href="#" class="btn btn-primary">OTROS</a>
                </div>
            </div>

        </div>

    


    </main>
    <!-- MAIN -->
</section>
<!-- NAVBAR -->
<link rel="stylesheet" href="css/index.css">
<!-- FOOTER -->
<?php
    include_once __DIR__ . '/templates/footer.php';
?>
<!-- FOOTER -->