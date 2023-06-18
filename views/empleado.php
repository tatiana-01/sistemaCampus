<!-- HEADER -->
<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
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
            <a class="nav-link" aria-current="page" href="empleado.php">Registro Empleado</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contactoEmpleado.php">Contacto Empleado</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="listarEmpleado.php">Listado Empleados</a>
        </li>
    </ul>
    <div class="content container mt-3" style="width: 78%">
         <!-- FORMULARIO -->
            <h3 class="mb-3" >Registro de Empleados</h3>
            <hr>
            <form id="empleadoPersonaForm" action="">
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
                            <div class=" mb-2 col-sm-6 col-md-6">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Seleccione un departamento</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class=" mb-2 col-sm-6 col-md-6">
                                <select class="form-select" aria-label="Default select example" name="id_ciudad">
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
                                <option value="1">SURA</option>
                                <option value="2">Sanitas</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-grid mx-auto mt-1">
                    <button id="botonEmpleadoPersonaForm" class="btn btn-success mx-auto" type="submit">Guardar</button>
                </div>
            </form>
            <form action="" id="empleadoForm" class="mb-2 col-12 d-none">
                <label for="id_arl" class="form-label">ARL</label>
                <select class="form-select" aria-label="Default select example" name="id_arl">
                    <option selected>Seleccione una ARL</option>
                    <option value="1">nose</option>
                    <option value="2">nose</option>
                </select>
                <div class="d-grid mx-auto mt-3">
                 <button class="btn btn-success mx-auto" type="submit">Guardar</button>
                </div>
            </form>
    </div>

       
    </main>
    <!-- MAIN -->
</section>
<!-- NAVBAR -->

<script src="/../controllers/controllerEmpleado.js"></script>
<!-- FOOTER -->
<?php
    include_once __DIR__ . '/../templates/footer.php';
?>
<!-- FOOTER -->