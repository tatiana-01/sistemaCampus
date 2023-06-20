
<?php
    use Models\Capitulos;

    $objCa = new Capitulos();

    $dataCapitulos = $objCa->getAllUnidades();



?>




<div class="container mt-3 text-center">
    <div class="card">
        <h5 class="card-header text-center">REGISTRO CAPITULO</h5>
        <div class="card-body">
            <form id="formCapitulo">
                <div class="container">
                    <div class="row bg-light p-1">
                                <div class="col">
                                    <label  class="form-label">Capitulo al que pertenece </label>
                                    <select type="text" class="form-control"  name="id_unidad_tematica">

                                    <option value="" selected>Elige el stack</option>
                                    <?php   
                                        foreach ($dataCapitulos as $key ) {
                                                                         
                                    ?>

                                    <option value="<?php echo  $key['id_unidad_tematica']?>" selected><?php echo $key['nombre_unidad_tematica']?></option>

                                   <?php
                                                                  }
                                   ?>

                                   
                                    </select>
                                </div> 

                                <div class="col">
                                    <label  class="form-label">Nombre Capitulo</label>
                                    <input type="text" class="form-control" placeholder="Nombrdel capitulo"  name="capitulo_name">
                                </div>
                               
                    </div>
                </div>
                <div class="container text-center bg-light p-1">
                    <button type="submit" class="btn btn-success" id="btnPais">GUARDAR</button>
                </div>
            </form>
        </div>
    </div>
</div>
