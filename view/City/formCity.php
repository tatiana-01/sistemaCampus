<?php 
    require_once 'app.php';
    use Models\Pais;
    use Models\Region;

    $objPais = new Pais();
    $datosPais = $objPais -> loadAllData();

    $objRegion = new Region();
    $datosRegion = $objRegion -> loadAllData();
?>

<!--Form de cities-->
<div class="container mt-3 text-center" id="ciudad">
    <div class="card">
        <h5 class="card-header text-center">REGISTRO DE LA CIUDAD</h5>
        <div class="card-body">
            <form id="formCiudad">
                <div class="container">
                    <div class="row bg-light p-1">
                        <div class="col-4">
                            <div class="mb-3">

                                <label for="id_pais" class="form-label">Pais:</label>
                                <select class="form-select" id="id_pais">
                                    <option selected>Seleccione un pais:</option>
                                    <?php foreach ($datosPais as $itemPais) { ?>
                                        <option value="<?php echo $itemPais['id_pais']; ?>"><?php echo $itemPais['nombre_pais']; ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">

                                <label for="id_region" class="form-label">Region:</label>
                                <select class="form-select" name="id_region" id="id_region">
                                    <option selected>Seleccione una region:</option>
                                    <?php foreach ($datosRegion as $itemRegion) { ?>
                                        <option value="<?php echo $itemRegion['id_region']; ?>"><?php echo $itemRegion['nombre_region']; ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="ciudad_nombre" class="form-label">Nombre de la Ciudad:</label>
                                <input type="text" class="form-control" id="ciudad_nombre" name="ciudad_nombre">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container text-center bg-light p-1">
                    <button type="submit" class="btn btn-success" id="btnCiudad">GUARDAR</button>
                </div>
            </form>
        </div>
    </div>
</div>