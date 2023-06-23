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

        <h1 class="title text-center ">PROGRAMA ACADEMICO</h1>
        <!--<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Dashboard</a></li>
			</ul>-->

        <div class="container d-flex justify-content-evenly mt-5 flex-wrap">
            <div class="card mt-3 d-flex flex-column-reverse" style="width: 18rem;">
                
                    <img src="images/logoTierra1.png" style="width: 80%;" class="mb-3 mx-auto" >
                    <div class="card-body text-center">
                        <a href="location.php" class="btn btn-primary">PAIS-REGION-CIUDAD</a>
                    </div>
              
            </div>

            <div class="card mt-3 d-flex flex-column-reverse" style="width: 18rem;">
                
                    <img src="images/eps.png" style="width: 85%;" alt="..." class="mx-auto">
                    <div class="card-body text-center">
                        <a href="views/Eps/eps.php" class="btn btn-primary">EPS</a>
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