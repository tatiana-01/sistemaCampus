<?php 
    include_once('../../app.php');
    use Models\Ruta;
    $objRuta = new Ruta();
    $rutas=$objRuta->loadAllData();
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
    
    <main>
        <div class="row mx-auto mt-4 " style="width: 90%">
            <!-- formulario <div class="content container mt-3" style="width: 78%"> -->
            <div class="col-12 col-xl-6 ">
                <h3 class="mb-3" >Registro de Ruta Academica</h3>
                <hr>
                <form action="" id="rutaForm">
                    <div class="row  p-1">
                        <label for="nombres" class="form-label">Nombre Ruta</label>
                        <input type="text"  name="nombre_ruta" class="form-control">
                    </div>
                    <div class="row  p-1">
                        <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                        <textarea class="form-control" name="descripcion_ruta" rows="3"></textarea>                   
                    </div>
                    <div class="d-grid mx-auto mt-1">
                        <input class="btn btn-success mx-auto" type="submit" value="Guardar">
                    </div>
                </form>
            </div>
            <!-- tabla -->
            <div class="col-12 col-xl-6">
                <h3>Listado Rutas</h3>
                <hr>
                <table class="table table-bordered display dataTable" id="misRutas">
                    <thead class="table-dark mt-3">
                        <tr>
                            <th class="sorting_disabled" rowspan="1" colspan="1">ID</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Nombre</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Descripcion</th>
                            <th class="sorting_disabled" rowspan="1" colspan="1">Opciones</th>
                        </tr>
                    </thead >
                    <tbody>
                        <?php foreach ($rutas as $value):?>
                        <tr  class="bg-light" >      
                            <td><?php echo "{$value['id_ruta']}" ?></td>
                            <td><?php echo "{$value['nombre_ruta']}" ?></td>
                            <td><?php echo "{$value['descripcion_ruta']}" ?></td>
                            <td class='d-flex gap-2'><a class='btn btn-danger'id="borrarRuta" data-bs-toggle='modal' data-bs-target='#verifEliminarRuta'>Eliminar</a> <a class='btn btn-warning' id='botonEditarRuta' data-bs-toggle='modal' data-bs-target='#editarRuta'>Editar</a> </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="modal fade " id="verifEliminarRuta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-l">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Confirmacion de eliminacion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="infoEliminar" class="mb-3"></div>
                                <a class="btn btn-danger" id="borrarDefRuta">Confirmar eliminacion</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='modal fade' id='editarRuta' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h1 class='modal-title fs-5' id='exampleModalLabel'>Editar Ruta <span class="badge bg-primary"></span></h1>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                <form action='' id='formRutaEdit'>
                                    <div class="row  p-1">
                                        <label for="nombres" class="form-label">Nombre Ruta</label>
                                        <input type="text"  name="nombre_ruta" class="form-control">
                                    </div>
                                    <div class="row  p-1 mb-2">
                                        <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                                        <textarea class="form-control" name="descripcion_ruta" rows="3"></textarea>                   
                                    </div>
                                    <button type='submit' class='btn btn-warning' id='editar'>Enviar edicion</button>
                                </form>
                            </div>                                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>
<!-- NAVBAR -->

<link rel="stylesheet" href="../js/../DataTables/datatables.min.css">
<script src="../../js/DataTables/datatables.min.js"></script>
<script src="controllerRuta.js"></script>
<!-- FOOTER -->
<?php
    include_once __DIR__ . '/../../templates/footer.php';
?>
<!-- FOOTER -->