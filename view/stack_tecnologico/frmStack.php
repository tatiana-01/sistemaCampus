       
       
       
       
       
       <!--Form de Pais-->
<div class="container mt-3 text-center">
    <div class="card">
        <h5 class="card-header text-center">REGISTRO STACK</h5>
        <div class="card-body">
            <form id="formStack">
                <div class="container">
                    <div class="row bg-light p-1">
                                <div class="col">
                                    <label  class="form-label">Ruta del stack </label>i
                                    <select type="text" class="form-control"  name="nombre_stack">

                                    <option value="" selected>Elige su ruta</option>
                                    <option value="1">Frontend</option>
                                    <option value="2">Backend</option>
                                    <option value="3">Full Stack</option>
                                    </select>
                                </div> 

                                <div class="col">
                                    <label  class="form-label">Nombre del stack</label>
                                    <input type="text" class="form-control" placeholder="Nombre Stack"  name="nombre_stack">
                                </div>
                                <div class="col">
                                    <label  class="form-label">Breve descripcion</label>
                                    <input type="text" class="form-control" placeholder="Descripcion" name="descripcion_stack" maxlength="40">
                                </div>

                                <div class="col">
                                    <label  class="form-label">Agregar iamgen</label>
                                    <input type="file" class="form-control" name="link_image" >
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
       
