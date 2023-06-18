<?php 
    include_once('../app.php');
    use Models\Personas;
    use Models\Campers;
    $objPersonas = new Personas();
    $objCampers = new Campers();
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
    <div class="content" style="width: 90%">
         <!-- TABLA CAMPERS -->
         <h3>Listado Rutas</h3>
                <hr>
                <table class="table table-bordered display dataTable" id="misCampers">
                    <thead class="table-dark mt-3">
                        <tr>
                            <th class="sorting_disabled" rowspan="1" colspan="1">ID Camper</th>
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
                    $campers=$objCampers->loadAllData();
                    foreach ($campers as $camper): ?>
                    <?php $persona=$objPersonas->loadDataByIdCamper($camper['id_persona']); ?>
                        <tr  class="bg-light" >      
                            <td><?php echo "{$camper['id_camper']}" ?></td>
                            <td><?php echo "<img src='../images/{$persona[0]['foto_persona']}' alt='' srcset='' style='width: 10rem;'>" ?></td>
                            <td><?php echo "{$persona[0]['tipo_id']}" ?></td>
                            <td><?php echo "{$persona[0]['id_persona']}" ?></td>
                            <td><?php echo "{$persona[0]['persona_nombre']}" ?></td>
                            <td><?php echo "{$persona[0]['persona_apellido']}" ?></td>
                            <td><a class='btn btn-info' id='masInfoCamper' href='masInfoCamper.php'>Ver mas</a> </td>
                        </tr>
                    <?php endforeach?>
                    </tbody>
                </table>
        </div>    
    </main>
    <!-- MAIN -->
</section>
<!-- NAVBAR -->
<link rel="stylesheet" href="../js/DataTables/datatables.min.css">
<script src="../js/DataTables/datatables.min.js"></script>
<script src="/../controllers/controllerListarCamper.js"></script>
<!-- FOOTER -->
<?php
    include_once __DIR__ . '/../templates/footer.php';
?>
<!-- FOOTER -->