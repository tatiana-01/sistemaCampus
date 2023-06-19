<?php 
    include_once('../../app.php');
    use Models\Personas;
    use Models\Campers;
    use Models\Ruta;
    use Models\Matricula;
    use Models\CamperAcudiente;
    use Models\Acudiente;
    $idPersona=$_GET['idPersona'];
    $objPersonas = new Personas();
    $objRutas = new Ruta();
    $objMatriculas = new Matricula();
    $objCampers = new Campers();
    $objCamperAcudiente= new CamperAcudiente();
    $objAcudientes= new Acudiente();
?>
<!-- HEADER -->
<?php
    include_once __DIR__ . '/../../templates/header.php';
?>
<!-- HEADER -->

<!-- SIDEBAR -->
<?php
    include_once __DIR__ . '/../../templates/sidebar.php';
?>
<!-- SIDEBAR -->

<!-- NAVBAR -->
<section id="content">

    <!-- NAVBAR -->
    <?php
        include_once __DIR__ . '/../../templates/navbar.php';
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
            <a class="nav-link" href="../acudiente/acudiente.php">Acudiente Campers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="listarCamper.php">Listado Campers</a>
        </li>
    </ul>
    <hr>
    <div class="content" style="width: 90%">
        <!-- INFO CAMPERS -->
        <div class="row">
            <div class="col-12 col-md-6 ">
                <h3>Informacion Básica</h3>
                <hr>
                <?php 
                    $persona=$objPersonas->loadDataById($idPersona);
                    $ciudad=$objCampers->loadDataByIdCiudad($persona[0]['id_ciudad']);
                    $eps=$objCampers->loadDataByIdEps($persona[0]['id_eps']);
                    $camper=$objCampers->loadDataByIdPersona($idPersona);
                    $nivel=$objCampers->loadDataByIdNivel($camper[0]['id_nivel_camper']);
                    $salon=$objCampers->loadDataByIdSalon($nivel[0]['id_salon']);
                    $matricula=$objMatriculas->loadDataByIdCamper($camper[0]['id_camper']);
                    $ruta=$objRutas->loadDataById($matricula[0]['id_ruta']);
                    echo var_dump($matricula);
                    $camperAcudientes=$objCamperAcudiente->loadDataByIdCamper($camper[0]['id_camper']);
                ?>
                <div class="card bg-secondary-subtle" id="infoPersonas">
                    <img src="../../images/<?php echo $persona[0]['foto_persona'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-text">
                            <p class="fw-bold">Nombre:</p>
                            <p><?php echo $persona[0]['persona_nombre']; echo' '; echo $persona[0]['persona_apellido']?></p>
                            <p class="fw-bold">ID:</p>
                            <p><?php echo $persona[0]['tipo_id']; echo ' '; echo $idPersona ?></p>
                            <p class="fw-bold">Fecha de nacimiento:</p>
                            <p><?php echo $persona[0]['fecha_nacimiento']?></p>
                            <p class="fw-bold">Email:</p>
                            <p><?php echo $persona[0]['email']?></p>
                            <p class="fw-bold">Direccion:</p>
                            <p><?php echo $persona[0]['persona_direccion']?></p>
                            <p class="fw-bold">Telefono:</p>
                            <p><?php echo $persona[0]['persona_telefono']?></p>
                            <p class="fw-bold">Ciudad:</p>
                            <p><?php echo $ciudad[0]['ciudad_nombre']?></p>
                            <p class="fw-bold">EPS:</p>       
                            <p><?php echo $eps[0]['eps_nombre']?></p>                     
                        </div>
                        <div class="d-flex mx-auto mt-1">
                            <button class="btn btn-warning mx-auto" type="submit">Editar Camper</button>
                            <button class="btn btn-danger mx-auto" type="submit">Eliminar Camper</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="row">
                    <h3>Informacion Academica</h3>
                    <hr>
                    <div class="card bg-secondary-subtle mb-3" id="infoAcademica">
                        <div id="infoCamper">
                            <p class="fw-bold mt-2">Nivel de conocimiento:</p>
                            <p><?php echo $nivel[0]['nivel_conocimiento']?></p>
                            <p class="fw-bold">Salon:</p>
                            <p><?php echo $salon[0]['nombre_salon']?></p>
                        </div>
                        <div id="infoMatricula">
                            <p class="fw-bold">Ruta de entrenamiento:</p>
                            <p><?php echo $ruta[0]['nombre_ruta']?></p>
                        </div>
                        <div class="d-flex mx-auto mt-1 mb-3">
                            <button class="btn btn-warning mx-auto" type="submit">Editar Información</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h3>Informacion Acudiente</h3>
                    <hr>
                    <?php 
                    foreach ($camperAcudientes as $camperAcudiente) {
                        $acudiente= $objAcudientes->loadDataById($camperAcudiente['id_acudiente']);
                        echo '
                        <div class="card bg-secondary-subtle mb-4" id="infoAcudiente">
                            <div id="infoAcudiente">
                                <p class="fw-bold mt-2">ID:</p>
                                <p>'; echo $acudiente[0]['tipo_id']; echo ' '; echo $acudiente[0]['id_acudiente']; echo '</p>
                                <p class="fw-bold">Nombre:</p>
                                <p>'; echo $acudiente[0]['nombre_acudiente']; echo '</p>
                                <p class="fw-bold">Parentesco:</p>
                                <p>'; echo $acudiente[0]['parentesco']; echo '</p>
                                <p class="fw-bold">Telefono:</p>
                                <p>'; echo $acudiente[0]['telefono_acudiente']; echo '</p>
                            </div>
                            <div class="d-flex mx-2 mt-1 mb-3">
                                <button class="btn btn-warning mx-auto" type="submit">Editar Acudiente</button>
                                <button class="btn btn-danger mx-auto" type="submit">Eliminar Acudiente</button>
                            </div>
                        </div>
                        ';
                    }
                    ?>
                </div>
            </div>
            
        </div>
        
    </div>    
    </main>
    <!-- MAIN -->
</section>
<!-- NAVBAR -->
<link rel="stylesheet" href="../../js/DataTables/datatables.min.css">
<script src="../../js/DataTables/datatables.min.js"></script>
<script src="controllerListarCamper.js"></script>
<!-- FOOTER -->
<?php
    include_once __DIR__ . '/../../templates/footer.php';
?>
<!-- FOOTER -->