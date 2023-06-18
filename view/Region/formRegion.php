<?php
    require_once 'app.php';

    use Models\Pais;

    $objPais = new Pais();
    $datosPais = $objPais -> loadAllData();
?>
<!--Form de Regions-->
<div class="container mt-3 text-center" id="region">
    <div class="card">
        <h5 class="card-header text-center">REGISTRO DE LA REGION</h5>
        <div class="card-body">
            <form id="formRegion">
                <div class="container">
                    <div class="row bg-light p-1">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="id_pais" class="form-label">Pais:</label>
                                <select class="form-select" name="id_pais" id="id_pais">
                                    <option selected>Seleccione un pais:</option>
                                    <?php foreach ($datosPais as $itemPais) { ?>
                                        <option value="<?php echo $itemPais['id_pais']; ?>"><?php echo $itemPais['nombre_pais']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="nombre_region" class="form-label">Nombre de la Region:</label>
                                <input type="text" class="form-control" id="nombre_region" name="nombre_region">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="container text-center bg-light p-1">
                    <button type="submit" class="btn btn-success" id="btnRegion">GUARDAR</button>
                </div>
            </form>
        </div>
    </div>
</div>