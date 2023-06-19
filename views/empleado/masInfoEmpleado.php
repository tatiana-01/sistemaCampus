<?php 
    include_once('../../app.php');
    use Models\Personas;
    use Models\Campers;
    use Models\Empleado;
    use Models\ContactoEmpleado;
    $idPersona=$_GET['idPersona'];
    $objPersonas = new Personas();
    $objCampers = new Campers();
    $objContactos = new ContactoEmpleado();
    $objEmpleados = new Empleado();
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
            <a class="nav-link" aria-current="page" href="empleado.php">Registro Empleado</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contactoEmpleado.php">Contacto Empleado</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="listarEmpleado.php">Listado Empleados</a>
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
                    $empleado=$objEmpleados->loadDataByIdPersona($idPersona);
                    $arl=$objEmpleados->loadDataArlById($empleado[0]['id_arl']);
                    $contactos=$objContactos->loadDataByIdEmpleado($empleado[0]['id_empleado']);
                ?>
                <div class="card bg-secondary-subtle" id="infoPersonas" >
                    <img src="../../images/<?php echo $persona[0]['foto_persona'] ?>" class="card-img-top" >
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
                            <p class="fw-bold">ARL:</p>       
                            <p><?php echo $arl[0]['arl_nombre']?></p>                     
                        </div>
                        <div class="d-flex mx-auto mt-1">
                            <button class="btn btn-warning mx-auto" type="submit">Editar Empleado</button>
                            <button class="btn btn-danger mx-auto" type="submit">Eliminar Empleado</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <h3>Informacion de Contactos</h3>
                <hr>
                <?php 
                foreach ($contactos as $contacto) {
                    echo '
                    <div class="card bg-secondary-subtle mb-4" id="infoAcudiente">
                        <div id="infoContacto" class="mx-2">
                            <p class="fw-bold mt-2">ID:</p>
                            <p>'; echo $contacto['tipo_id']; echo ' '; echo $contacto['id_contacto_empleado']; echo '</p>
                            <p class="fw-bold">Nombre:</p>
                            <p>'; echo $contacto['nombre_contacto_empleado']; echo '</p>
                            <p class="fw-bold">Tipo Contacto:</p>
                            <p>'; echo $contacto['tipo_locacion_contacto']; echo '</p>
                            <p class="fw-bold">Telefono:</p>
                            <p>'; echo $contacto['telefono_contacto_empleado']; echo '</p>
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