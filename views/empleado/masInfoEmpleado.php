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
    <div class="content mx-auto" style="width: 90%">
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
                    $region=$objEmpleados->loadDataRegionById($ciudad[0]['id_region']);
                    $pais=$objEmpleados->loadDataPaisById($region[0]['id_pais']);    
                    $rol=$objPersonas->loadDataRolById($persona[0]['id_rol'])                
                ?>
                <div class="card bg-secondary-subtle" id="infoPersonas" >
                    <img src="../../images/<?php echo $persona[0]['foto_persona'] ?>" class="card-img-top" >
                    <div class="card-body">
                        <div class="card-text contenido">
                            <p class="fw-bold m-0">Rol:</p>
                            <p id='<?php echo $persona[0]['id_rol'];?>'><?php echo $rol[0]['name_rol'];?></p>
                            <p class="fw-bold m-0">Nombres:</p>
                            <p><?php echo $persona[0]['persona_nombre'];?></p>
                            <p class="fw-bold m-0">Apellidos:</p>
                            <p><?php echo $persona[0]['persona_apellido'];?></p>
                            <p class="fw-bold m-0">Tipo ID:</p>
                            <p><?php echo $persona[0]['tipo_id'];?></p>
                            <p class="fw-bold m-0">ID:</p>
                            <p><?php echo $idPersona ?></p>
                            <p class="fw-bold m-0">Fecha de nacimiento:</p>
                            <p><?php echo $persona[0]['fecha_nacimiento']?></p>
                            <p class="fw-bold m-0">Email:</p>
                            <p><?php echo $persona[0]['email']?></p>
                            <p class="fw-bold m-0">Direccion:</p>
                            <p><?php echo $persona[0]['persona_direccion']?></p>
                            <p class="fw-bold m-0">Telefono:</p>
                            <p><?php echo $persona[0]['persona_telefono']?></p>
                            <p class="fw-bold m-0">Ciudad:</p>
                            <p id='<?php echo $persona[0]['id_ciudad']?>' data-region='<?php echo $region[0]['id_region']?>' data-pais='<?php echo $pais[0]['id_pais']?>'><?php echo $ciudad[0]['ciudad_nombre']?></p>
                            <p class="fw-bold m-0">EPS:</p>       
                            <p id='<?php echo $persona[0]['id_eps']?>'><?php echo $eps[0]['eps_nombre']?></p>
                            <p class="fw-bold m-0">ARL:</p>       
                            <p id='<?php echo $empleado[0]['id_arl']?>'><?php echo $arl[0]['arl_nombre']?></p>                     
                        </div>
                        <div class="d-flex mx-auto mt-1">
                            <button class="btn btn-warning mx-auto" id='btnEditarEmpleado' type="submit" data-bs-toggle="modal" data-bs-target="#editarInfoBasica">Editar Empleado</button>
                            <button class="btn btn-danger mx-auto" id='btnEliminarEmpleado' type="submit" data-bs-toggle="modal" data-bs-target="#eliminarEmpleado">Eliminar Empleado</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 mt-5">
            <div class="accordion mt-4" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Información Contactos
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body bg-secondary-subtle">
                            <div class="contactos">
                                <hr>
                                <?php 
                                foreach ($contactos as $contacto) {
                                    echo '
                                    <div class="mb-4" id="infoAcudiente">
                                        <div id="infoContacto" class="mx-2">
                                            <p class="fw-bold m-0 mt-2">Tipo ID:</p>
                                            <p>'; echo $contacto['tipo_id']; echo '</p>
                                            <p class="fw-bold m-0">ID:</p>
                                            <p>'; echo $contacto['id_contacto_empleado']; echo '</p>
                                            <p class="fw-bold m-0">Nombre:</p>
                                            <p>'; echo $contacto['nombre_contacto_empleado']; echo '</p>
                                            <p class="fw-bold m-0">Tipo Contacto:</p>
                                            <p>'; echo $contacto['tipo_locacion_contacto']; echo '</p>
                                            <p class="fw-bold m-0">Telefono:</p>
                                            <p>'; echo $contacto['telefono_contacto_empleado']; echo '</p>
                                        </div>
                                        <div class="d-flex mx-2 mt-1 mb-3">
                                            <button id="btnEditarContacto" class="btn btn-warning mx-auto" data-bs-toggle="modal" data-bs-target="#editarContacto" data-idEmpleado="'; echo $empleado[0]['id_empleado']; echo '">Editar Contacto</button>
                                            <button id="btnEliminarContacto" class="btn btn-danger mx-auto" data-idcontacto="'; echo $contacto['id_contacto_empleado']; echo '" data-nombre="'; echo $contacto['nombre_contacto_empleado']; echo '" data-idpersona="'; echo $idPersona; echo '" data-bs-toggle="modal" data-bs-target="#eliminarContacto">Eliminar Contacto</button>
                                        </div>
                                    </div>
                                    <hr>
                                    ';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex mx-auto mt-4">
                    <a class="btn btn-success mx-auto" <?php echo "href='contactoEmpleado.php?idEmpleado={$empleado[0]['id_empleado']}'"?> >Añadir Contacto</a>
                </div>
            </div>
        </div>

       <!--  MODALES -->

       <div class="modal fade" id="editarInfoBasica" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Informacion</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form id="editarEmpleadoForm" <?php echo 'data-idempleado="'; echo $empleado[0]['id_empleado']; echo '"';?> action="">
                        <div class="row  p-1">
                            <div class="mb-2 col-sm-12 col-md-4">
                                <select class="form-select" aria-label="Default select example" name="id_rol">
                                    <option selected>Seleccione un Rol</option>
                                    <?php 
                                        $roles=$objPersonas->loadAllDataRol();
                                        foreach ($roles as $rol) {
                                            echo "<option value='$rol[id_rol]'>".$rol['name_rol'] ."</option>" ; 
                                        };
                                    ?>
                                </select>
                            </div>
                            <div class="mb-2 col-sm-12 col-md-4">
                                <select class="form-select" aria-label="Default select example" name="tipo_id">
                                    <option selected>Tipo de Documento</option>
                                    <option value="TI">Tarjeta de identidad</option>
                                    <option value="CC">Cedula de ciudadania</option>
                                    <option value="CE">Cedula de extranjeria</option>
                                </select>
                            </div>
                            <div class="mb-2 col-sm-12 col-md-4 ">
                                <input type="text" placeholder="Numero de Documento" name="id_persona" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row  p-1">
                            <div class="col-12">
                                <label for="birthday" class="form-label">Fecha de Nacimiento*</label>
                                <input type="date" class="form-control" id="birthday" name="fecha_nacimiento">
                            </div>
                        </div>
                        <div class=" row  p-1">
                            <div class=" col-sm-12 col-md-6 ">
                                <label for="nombres" class="form-label">Nombres *</label>
                                <input type="text" class="form-control" id="nombres" name="persona_nombre">
                            </div>
                            <div class=" col-sm-12 col-md-6">
                                <label for="apellidos" class="form-label">Apellidos *</label>
                                <input type="text" class="form-control" id="apellidos" name="persona_apellido">
                            </div>
                        </div>
                        <div class="">
                            <h5 class="mt-2">Informacion de Contacto</h5>
                            <hr>
                            <div class=" p-1">
                            <div class="row ">
                                    <div class=" mb-2 col-sm-12 col-md-4">
                                        <select class="form-select" aria-label="Default select example" id='selectPais'>
                                            <option >Selecciones un pais</option>
                                            <?php 
                                                $paises=$objCampers->loadAllDataPaises();
                                                foreach ($paises as $pais) {
                                                    echo "<option value='$pais[id_pais]'>".$pais['nombre_pais'] ."</option>";  
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class=" mb-2 col-sm-12 col-md-4">
                                        <select class="form-select" aria-label="Default select example" id='selectDpto'>
                                            <option selected>Seleccione un departamento</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class=" mb-2 col-sm-12 col-md-4">
                                        <select class="form-select" aria-label="Default select example" id='selectCiudad' name="id_ciudad">
                                            <option selected>Seleccione una ciudad</option>
                                            <option value="1">Bucaramanga</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row  mt-1">
                                    <div class=" mb-2 col-sm-12">
                                        <input type="text" class="form-control" id="direccion" placeholder="Direccion*"
                                            name="persona_direccion">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-2 col-sm-6 col-md-6">
                                        <input type="email" class="form-control" id="emailcamper" placeholder="Email: pepe@gmail.com" required name="email">
                                    </div>
                                    <div class="mb-2 col-sm-6 col-md-6">
                                        <input type="text" class="form-control" id="telefono" required
                                            placeholder="Telefono Personal" name="persona_telefono">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div>
                            <h5 class="mt-2">Informacion Medica</h5>
                            <hr>
                            <div class="row  p-1">
                                <div class="mb-2 col-12">
                                    <label for="id_eps" class="form-label">EPS</label>
                                    <select class="form-select" aria-label="Default select example" name="id_eps">
                                        <option selected>Seleccione una EPS</option>
                                        <?php 
                                        $eps=$objCampers->loadAllDataEps();
                                        foreach ($eps as $value) {
                                            echo "<option value='$value[id_eps]'>".$value['eps_nombre'] ."</option>";  
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row  p-1">
                            <div class="mb-2 col-12">
                                <label for="id_arl" class="form-label">ARL</label>
                                <select class="form-select" aria-label="Default select example" name="id_arl">
                                    <option selected>Seleccione una ARL</option>
                                    <?php 
                                    $arls=$objEmpleados->loadAllDataArl();
                                    foreach ($arls as $arl) {
                                        echo "<option value='$arl[id_arl]'>".$arl['arl_nombre'] ."</option>";  
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="d-grid mx-auto mt-3">
                            <button class="btn btn-success mx-auto" type="submit">Guardar</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editarContacto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Contacto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="" id="contactoEditarForm">
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
                                    <input type="text" placeholder="Numero de Documento Contacto" name="id_contacto_empleado" class="form-control" readonly>
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
                </div>
            </div>
        </div>

        <div class="modal fade" id="eliminarEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Empleado </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="infoEliminarEmpleado">
                        ...
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-danger" id="borrarDefEmpleado">Confirmar eliminacion</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="eliminarContacto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Contacto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="infoEliminarContacto">
                        ...
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-danger" id="borrarDefContacto">Confirmar eliminacion</a>
                    </div>
                </div>
            </div>
        </div>

        
    </div>    
    </main>
    <!-- MAIN -->
</section>
<!-- NAVBAR -->
<link rel="stylesheet" href="../../js/DataTables/datatables.min.css">
<link rel="stylesheet" href="../../css/masInfo.css">
<script src="../../js/DataTables/datatables.min.js"></script>
<script src="../camper/selects.js" ></script>
<script src="controllerListarEmpleado.js"></script>



<!-- FOOTER -->
<?php
    include_once __DIR__ . '/../../templates/footer.php';
?>
<!-- FOOTER -->