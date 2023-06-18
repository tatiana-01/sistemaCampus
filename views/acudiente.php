<?php 
    include_once('../app.php');
    use Models\Campers;
    use Models\Personas;
    $objCampers = new Campers();
    $objPersonas=new Personas();
?>
<!-- HEADER -->
<?php
    include_once __DIR__ . '/../templates/header.php';
?>
<!-- HEADER -->

<!-- SIDEBAR -->
<?php
    include_once __DIR__ . '/../templates/sidebar.php';
?>
<!-- SIDEBAR -->

<!-- NAVBAR -->
<section id="content">

    <!-- NAVBAR -->
    <?php
        include_once __DIR__ . '/../templates/navbar.php';
    ?>
    <!-- NAVBAR -->

    <!-- MAIN --> 
    <!-- lo que va a cambiar en las paginas -->
    <main>
    <ul class="nav nav-underline navCamper">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="camper.php">Registro Campers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="acudiente.php">Acudiente Campers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="listarCamper.php">Listado Campers</a>
        </li>
    </ul>
    <div class="content container mt-3" style="width: 78%">
        <h3 class="mb-3" >Registro de Acudiente Camper</h3>
        <hr>
        <form action="" id="camperAcudienteForm">
        <select class="form-select" aria-label="Default select example" name="id_camper">
            <option selected>Seleccione un camper</option>
            <?php 
            $campers=$objCampers->loadAllData();
            foreach ($campers as $camper) {
                $personas=$objPersonas->loadDataByIdCamper($camper['id_persona']);
                echo var_dump($personas);
                echo "<option value='$camper[id_camper]'>".$personas[0]['persona_nombre'].' '. $personas[0]['persona_apellido'] ."</option>";
            }
            ?>
        </select>
        </form>
        <form action="" id="acudienteForm">
            <div class="row  p-1">
                <div class="mb-2 col-sm-12 col-md-6">
                    <select class="form-select" aria-label="Default select example" name="tipo_id">
                        <option selected>Tipo de Documento</option>
                        <option value="TI">Tarjeta de identidad</option>
                        <option value="CC">Cedula de ciudadania</option>
                        <option value="CE">Cedula de extranjeria</option>
                    </select>
                </div>
                <div class="mb-2 col-sm-12 col-md-6 ">
                    <input type="text" placeholder="Numero de Documento" name="id_acudiente" class="form-control">
                </div>
            </div>
            <div class="row  p-1">
                <div class="mb-2 col-sm-12 col-md-6 ">
                    <label for="nombres" class="form-label">Nombre Acudiente</label>
                    <input type="text"  name="nombre_acudiente" class="form-control">
                </div>
                <div class="mb-2 col-sm-12 col-md-6">
                    <label for="nombres" class="form-label">Parentesco</label>
                    <input type="text"  name="parentesco" class="form-control">
                </div>    
            </div>
            <div class="row p-1">
                <div class="col-12">
                    <label for="nombres" class="form-label">Telefono</label>
                    <input type="text"  name="telefono_acudiente" class="form-control">
                </div>
            </div>
                <div class="d-grid mx-auto mt-1">
                <input class="btn btn-success mx-auto" type="submit" value="Guardar">
            </div>
        </form>
    </div>
    </main>
    <!-- MAIN -->
</section>
<!-- NAVBAR -->
<script src="../controllers/controllerAcudiente.js"></script>
<!-- FOOTER -->
<?php
    include_once __DIR__ . '/../templates/footer.php';
?>
<!-- FOOTER -->