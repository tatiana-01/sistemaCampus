

<!-- 
       
       
       Form de unidad tematica-->
       <div class="container mt-3 text-center">
    <div class="card">
        <h5 class="card-header text-center">REGISTRO UNIDAD TEMATICA</h5>
        <div class="card-body">
            <form id="formUnidadTematica">
                <div class="container">
                    <div class="row bg-light p-1">
                                <div class="col">
                                    <label  class="form-label">Stack al que pertenece </label>
                                    <select type="text" class="form-control"  name="id_stack_tecnologico">

                                    <option value="" selected>Elige el stack</option>
                                    <?php   
                                        foreach ($data as $key ) {
                                                                         
                                    ?>

                                    <option value="<?php echo  $key['id_stack_tecnologico']?>" selected><?php echo $key['nombre_stack']?></option>

                                   <?php
                                                                  }
                                   ?>

                                   
                                    </select>
                                </div> 

                                <div class="col">
                                    <label  class="form-label">Nombre unidad tematica</label>
                                    <input type="text" class="form-control" placeholder="Nombre Stack"  name="nombre_unidad_tematica">
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
