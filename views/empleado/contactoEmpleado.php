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
    <main class="p-0">
    <nav class="navbar navbar-expand-lg bg-secondary-subtle navbar my-0">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="logo" src="/images/logoAcudiente.png" alt="ROL"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="empleado.php">Registro Empleado</a>
                    <a class="nav-link" href="contactoEmpleado.php">Contacto Empleado</a>
                    <a class="nav-link" href="listarEmpleado.php">Listado Empleados</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="content container mt-3 mx-auto" style="width: 78%">
        <h3 class="mb-3" >Registro de Contacto Empleado</h3>
        <hr>
        <form action="" id="contactoEmpleadoForm">
        <select class="form-select mb-4" aria-label="Default select example" name="id_empleado">
            <option selected>Seleccione un empleado</option>
            <?php 
            $empleados=$objEmpleado->loadAllData();
            foreach ($empleados as $empleado) {
                $personas=$objPersonas->loadDataById($empleado['id_persona']);
                //echo var_dump($personas);
                if($_GET['idEmpleado']){
                    $idEmpleado=$_GET['idEmpleado']; 
                    if ($idEmpleado==$empleado['id_empleado']) {
                        echo "<option selected value='$empleado[id_empleado]'>".$personas[0]['persona_nombre'].' '. $personas[0]['persona_apellido'] ."</option>";   
                    }else{
                        echo "<option value='$empleado[id_empleado]'>".$personas[0]['persona_nombre'].' '. $personas[0]['persona_apellido'] ."</option>";
                    }
                }else{
                    echo "<option value='$empleado[id_empleado]'>".$personas[0]['persona_nombre'].' '. $personas[0]['persona_apellido'] ."</option>";
                }
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