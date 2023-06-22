<?php 
    include_once('../../app.php');
    use Models\Personas;
    use Models\Campers;
    use Models\Ruta;
    use Models\Matricula;
    use Models\CamperAcudiente;
    use Models\Acudiente;
    use Models\Empleado;
    $idPersona=$_GET['idPersona'];
    $objPersonas = new Personas();
    $objRutas = new Ruta();
    $objMatriculas = new Matricula();
    $objCampers = new Campers();
    $objCamperAcudiente= new CamperAcudiente();
    $objAcudientes= new Acudiente();
    $objEmpleados= new Empleado();
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
                    $camper=$objCampers->loadDataByIdPersona($idPersona);
                    $nivel=$objCampers->loadDataByIdNivel($camper[0]['id_nivel_camper']);
                    $salon=$objCampers->loadDataByIdSalon($nivel[0]['id_salon']);
                    $matricula=$objMatriculas->loadDataByIdCamper($camper[0]['id_camper']);
                    $ruta=$objRutas->loadDataById($matricula[0]['id_ruta']);
                    $camperAcudientes=$objCamperAcudiente->loadDataByIdCamper($camper[0]['id_camper']);
                    $region=$objEmpleados->loadDataRegionById($ciudad[0]['id_region']);
                    $pais=$objEmpleados->loadDataPaisById($region[0]['id_pais']);
                    $rol=$objPersonas->loadDataRolById($persona[0]['id_rol'])
                ?>
                <div class="card bg-secondary-subtle" id="infoPersonas">
                    <img src="../../images/<?php echo $persona[0]['foto_persona'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-text contenido ">
                            <p class="fw-bold my-0">Rol:</p>
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
                        </div>
                        <div class="d-flex mx-auto mt-1">
                            <button class="btn btn-warning mx-auto" id="btnEditarCamperPersona" data-bs-toggle="modal" data-bs-target="#editarInfoBasica" type="submit" type="submit">Editar Camper</button>
                            <button class="btn btn-danger mx-auto" data-bs-toggle="modal" data-bs-target="#eliminarCamper" id="btnEliminarCamper" type="submit">Eliminar Camper</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="row mx-1">
                    <h3>Informacion Academica</h3>
                    <hr>
                    <div class="card bg-secondary-subtle mb-3" id="infoAcademica">
                        <div id="infoCamper" class="my-3 mx-1">
                            <p class="fw-bold m-0 ">Nivel de conocimiento:</p>
                            <p id='<?php echo $nivel[0]['id_nivel_camper']?>'><?php echo $nivel[0]['nivel_conocimiento']?></p>
                            <p class="fw-bold m-0">Salon:</p>
                            <p id='<?php echo $salon[0]['id_salon']?>' ><?php echo $salon[0]['nombre_salon']?></p>
                            <p class="fw-bold m-0">Ruta de entrenamiento:</p>
                            <p id='<?php echo $ruta[0]['id_ruta']?>' ><?php echo $ruta[0]['nombre_ruta']?></p>
                        </div>
                        <div class="d-flex mx-auto mt-1 mb-3">
                            <button class="btn btn-warning mx-auto" id='btnEditarAcademica' type="submit" data-bs-toggle="modal" data-bs-target="#editarInfoAcademica">Editar Información</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h3>Informacion Acudiente</h3>
                    <hr>
                    <div class="acudientes">
                        <?php 
                        foreach ($camperAcudientes as $camperAcudiente) {
                            $acudiente= $objAcudientes->loadDataById($camperAcudiente['id_acudiente']);
                            echo '
                            <div class="card bg-secondary-subtle mb-4" id="infoAcudiente">
                                <div id="infoAcudiente" class="m-3">
                                    <p class="fw-bold m-0 mt-2">Tipo ID:</p>
                                    <p>'; echo $acudiente[0]['tipo_id']; echo '</p>
                                    <p class="fw-bold m-0 mt-2">ID:</p>
                                    <p>'; echo $acudiente[0]['id_acudiente']; echo '</p>
                                    <p class="fw-bold m-0">Nombre:</p>
                                    <p>'; echo $acudiente[0]['nombre_acudiente']; echo '</p>
                                    <p class="fw-bold m-0">Parentesco:</p>
                                    <p>'; echo $acudiente[0]['parentesco']; echo '</p>
                                    <p class="fw-bold m-0">Telefono:</p>
                                    <p>'; echo $acudiente[0]['telefono_acudiente']; echo '</p>
                                </div>
                                <div class="d-flex mx-2 mt-1 mb-3">
                                    <button class="btn btn-warning mx-auto" id="btnEditarAcudiente" data-bs-toggle="modal" data-bs-target="#editarAcudiente" type="submit" >Editar Acudiente</button>
                                    <button class="btn btn-danger mx-auto" data-bs-toggle="modal" id="btnEliminarAcudiente" data-bs-target="#eliminarAcudiente"type="submit" data-idacudiente="'; echo $acudiente[0]['id_acudiente']; echo'" data-nombreacudiente="'; echo $acudiente[0]['nombre_acudiente']; echo'">Eliminar Acudiente</button>
                                </div>
                            </div>
                            ';
                        }
                        ?>
                    </div>
                    <div class="d-flex mx-auto mt-1">
                        <a class="btn btn-success mx-auto" <?php echo "href='../acudiente/acudiente.php?idCamper={$camper[0]['id_camper']}'"?> >Añadir Acudiente</a>
                    </div>
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
                        <form id="editarCamperPersonaForm" action="">
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
                                                    echo var_dump($paises);
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
                            <div class="mb-4">
                                <h5 class="mt-2">Informacion Medica</h5>
                                <hr>
                                <div class="row  p-1">
                                    <div class="mb-2 col-12">
                                        <select class="form-select" aria-label="Default select example" name="id_eps">
                                            <option>Seleccione una eps</option>
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
                            <div class="d-grid mx-auto mt-1">
                                <button id='botonFormMatricula' class="btn btn-success mx-auto" type="submit">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editarInfoAcademica" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-lg" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Informacion</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editarAcademicaForm" data-idcamper='<?php echo $camper[0]['id_camper']; ?>' action="">              
                            <h5 class="mt-2">Informacion Academica</h5>
                            <div class="row  p-1">
                                <label for="nombres" class="form-label">Nivel de conocimiento</label>
                                <select class="form-select"  aria-label="Default select example" name="id_nivel_camper">
                                    <option>Seleccione un nivel</option>
                                    <?php 
                                    $niveles=$objCampers->loadAllDataNivel();
                                    foreach ($niveles as $nivel) {
                                        echo "<option value='$nivel[id_nivel_camper]'>".$nivel['nivel_conocimiento'] ."</option>";  
                                    }
                                    ?>
                                </select>
                            </div>                          
                            <div class="mb-2">
                                <label for="nombres" class="form-label">Ruta de entrenamiento</label>
                                <select class="form-select" aria-label="Default select example" name="id_ruta">
                                    <option>Seleccione una ruta</option>
                                    <?php 
                                    $rutas=$objRutas->loadAllData();
                                    foreach ($rutas as $ruta) {
                                        echo "<option value='$ruta[id_ruta]'>".$ruta['nombre_ruta'] ."</option>";  
                                    }
                                    ?>
                                </select>  
                            </div>
                            <div class="d-grid mx-auto mt-1">
                                <button id='botonFormMatricula' class="btn btn-success mx-auto" >Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editarAcudiente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Contacto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="editarAcudienteForm">
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
                                    <input type="text" placeholder="Numero de Documento Acudiente" name="id_acudiente" class="form-control" readonly>
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
                </div>
            </div>
        </div>

        <div class="modal fade" id="eliminarCamper" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Camper </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="infoEliminarCamper">
                        ...
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-danger" id="borrarDefCamper">Confirmar eliminacion</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="eliminarAcudiente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Acudiente</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="infoEliminarAcudiente">
                        ...
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-danger" id="borrarDefAcudiente">Confirmar eliminacion</a>
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
<script src="selects.js"></script>
<script src="controllerListarCamper.js"></script>
<!-- FOOTER -->
<?php
    include_once __DIR__ . '/../../templates/footer.php';
?>
<!-- FOOTER -->