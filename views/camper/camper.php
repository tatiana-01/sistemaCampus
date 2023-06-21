<?php 
    include_once('../../app.php');
    use Models\Campers;
    use Models\Ruta;
    use Models\Personas;
    $objCampers = new Campers();
    $objRutas = new Ruta();
    $objPersonas = new Personas();
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
    <div class="content container mt-3 mx-auto" style="width: 78%">
         <!-- FORMULARIO -->
            <h3 class="mb-3" >Registro de Campers</h3>
            <hr>
            <form id="camperPersonaForm" action="">
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
                        <input type="text" placeholder="Numero de Documento" name="id_persona" class="form-control">
                    </div>
                </div>
                <div class="row  p-1">
                    <div class="col-sm-12 col-md-6">
                        <label for="birthday" class="form-label">Fecha de Nacimiento*</label>
                        <input type="date" class="form-control" id="birthday" name="fecha_nacimiento">
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div>
                            <img src="../images/camaraicon.png"  alt="" width="25px"> 
                            <label for="foto" class="form-label">Subir Foto</label>
                            <input type="file" id="foto" name="foto_persona" class="form-control">
                        </div>
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
                    <button id='botonFormPersonCamper' class="btn btn-success mx-auto" type="submit">Guardar</button>
                </div>
            </form>
            
            <form id="camperForm" class="mb-2 d-none">
                <h5 class="mt-2">Informacion Academica</h5>
                <div class="row  p-1">
                    <label for="nombres" class="form-label">Nivel de conocimiento</label>
                    <select class="form-select" aria-label="Default select example" name="id_nivel_camper">
                        <option selected>Seleccione un nivel</option>
                        <?php 
                        $niveles=$objCampers->loadAllDataNivel();
                        foreach ($niveles as $nivel) {
                            echo "<option value='$nivel[id_nivel_camper]'>".$nivel['nivel_conocimiento'] ."</option>";  
                        }
                        ?>
                    </select>
                </div>
                <div class="d-grid mx-auto mt-1 ">
                    <button id='botonFormCamper' class="btn btn-success mx-auto" type="submit">Guardar</button>
                </div>
            </form>

            <form id="matriculaForm" class="mb-2 d-none">
                <div class="mb-2">
                    <label for="nombres" class="form-label">Ruta de entrenamiento</label>
                    <select class="form-select" aria-label="Default select example" name="id_ruta">
                        <option selected>Seleccione una ruta</option>
                        <?php 
                        $rutas=$objRutas->loadAllData();
                        foreach ($rutas as $ruta) {
                            echo "<option value='$ruta[id_ruta]'>".$ruta['nombre_ruta'] ."</option>";  
                        }
                        ?>
                    </select>  
                </div>
                <div class="d-grid mx-auto mt-1">
                    <button id='botonFormMatricula' class="btn btn-success mx-auto" type="submit">Guardar</button>
                </div>
            </form>
            
    </div>

       
    </main>
    <!-- MAIN -->
</section>
<!-- NAVBAR -->

<script src="controllerCamper.js"></script>
<script src="selects.js"></script>
<!-- FOOTER -->
<?php
    include_once __DIR__ . '/../../templates/footer.php';
?>
<!-- FOOTER -->