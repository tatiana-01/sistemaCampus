<?php 
    include_once('../../app.php');
    use Models\Empleado;
    use Models\Personas;
    $objEmpleado = new Empleado();
    $objPersonas=new Personas();
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
    <div class="content container mt-3" style="width: 78%">
        <h3 class="mb-3" >Registro de Contacto Empleado</h3>
        <hr>
        <form action="" id="contactoEmpleadoForm">
        <select class="form-select" aria-label="Default select example" name="id_empleado">
            <option selected>Seleccione un empleado</option>
            <?php 
            $empleados=$objEmpleado->loadAllData();
            foreach ($empleados as $empleado) {
                
                $personas=$objPersonas->loadDataById($empleado['id_persona']);
                echo var_dump($personas);
                echo "<option value='$empleado[id_empleado]'>".$personas[0]['persona_nombre'].' '. $personas[0]['persona_apellido'] ."</option>";
            }
            ?>
        </select>
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
                    <input type="text" placeholder="Numero de Documento Contacto" name="id_contacto_empleado" class="form-control">
                </div>
            </div>
            <div class="row  p-1">
                <div class="mb-2 col-12 ">
                    <label for="nombres" class="form-label">Nombre</label>
                    <input type="text"  name="nombre_contacto_empleado" class="form-control">
                </div>   
            </div>
            <div class="row p-1">
                <div class="mb-2 col-sm-12 col-md-6">
                    <label for="nombres" class="form-label">Tipo de contacto</label>
                    <input type="text"  name="tipo_locacion_contacto" class="form-control">
                </div> 
                <div class="mb-2 col-sm-12 col-md-6">
                    <label for="nombres" class="form-label">Telefono</label>
                    <input type="text"  name="telefono_contacto_empleado" class="form-control">
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
<script src="controllerContacto.js"></script>
<!-- FOOTER -->
<?php
    include_once __DIR__ . '/../../templates/footer.php';
?>
<!-- FOOTER -->