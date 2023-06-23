<?php 
    include_once('../../app.php');
    use Models\Personas;
    use Models\Empleado;
    $objPersonas = new Personas();
    $objEmpleado = new Empleado();
?>
<!-- HEADER -->
<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
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
    <div class="content mx-auto" style="width: 90%">
         <!-- TABLA CAMPERS -->
         <h3>Listado Empleados</h3>
            <div class="table-responsive">
                <table class="table table-bordered display dataTable" id="misEmpleados">
                    <thead class="table-dark mt-3">
                        <tr>
                            <th class="sorting_disabled" rowspan="1" colspan="1">ID Empleado</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Foto</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Tipo ID</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Identificacion</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Nombres</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Apellidos</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">opciones</th>
                        </tr>
                    </thead >
                    
                    <tbody>
                    <?php 
                    $empleados=$objEmpleado->loadAllData();
                    foreach ($empleados as $empleado): ?>
                    <?php $persona=$objPersonas->loadDataById($empleado['id_persona']); ?>
                        <tr  class="bg-light" >      
                            <td><?php echo "{$empleado['id_empleado']}" ?></td>
                            <td><?php echo "<img src='../../images/{$persona[0]['foto_persona']}' alt='' srcset='' style='width: 10rem;'>" ?></td>
                            <td><?php echo "{$persona[0]['tipo_id']}" ?></td>
                            <td><?php echo "{$persona[0]['id_persona']}" ?></td>
                            <td><?php echo "{$persona[0]['persona_nombre']}" ?></td>
                            <td><?php echo "{$persona[0]['persona_apellido']}" ?></td>
                            <td><a class='btn btn-info' id='masInfoCamper' <?php echo "href='masInfoEmpleado.php?idPersona={$persona[0]['id_persona']}'" ?>>Ver mas</a> </td>
                        </tr>
                    <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>    
       
    </main>
    <!-- MAIN -->
</section>
<!-- NAVBAR -->
<link rel="stylesheet" href="../../js/DataTables/datatables.min.css">
<script src="../../js/DataTables/datatables.min.js"></script>
<script src="tablaEmpleado.js"></script>
<!-- FOOTER -->
<?php
    include_once __DIR__ . '/../../templates/footer.php';
?>
<!-- FOOTER -->
