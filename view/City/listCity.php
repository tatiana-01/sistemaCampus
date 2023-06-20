<?php
    require_once 'app.php';

    use Models\Ciudad;

    $objCiudad = new Ciudad();
    $datosCiudad = $objCiudad->loadAllData();

?>

<section>
    <div class="container">
        <table id="misCiudad" class="table table-striped table-hover dataTable">
            <thead>
                <tr>
                    <th>Id Ciudad</th>
                    <th>Id Region</th>
                    <th>Nombre Ciudad</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datosCiudad as $region) {?>
                    <tr>
                        <td><?php echo $region['id_ciudad']; ?></td>
                        <td><?php echo $region['id_region']; ?></td>
                        <td><?php echo $region['ciudad_nombre']; ?></td>
                        <td>
                            <button type="button" class="btn btn-danger eliminarCiudad">Eliminar</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary editarCiudad">Editar</button>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</section>

<!--Modal que muestra el datoa a Eliminar-->
<div class="modal fade " id="verifdelCiu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-l">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">-- CIUDAD --</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card text-center">
                    <h5 class="card-header">Confirmar Eliminacion</h5>
                    <div class="card-body">
                        <div id="infoCiu"></div>
                        <br/>
                        <button type="button" class="btn btn-warning borrardef" onclick="borrarDataDbCiu()" data-bs-dismiss="modal">Eliminar</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
</div>

<!--Modal que muestra los datos a editar-->
<div class="modal fade " id="updateDataCiu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">+-+ CIUDAD +-+</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <h5 class="card-header text-center">Editar Ciudad</h5>
                    <div class="card-body text-center">
                        <form id="frmUpdateDataCiu">
                            <div class="container">
                                <div class="row bg-light p-1">
                                    <div class="col-2">
                                        <div class="mb-3">
                                            <label for="id_ciudad" class="form-label">id Ciudad:</label>
                                            <br/>
                                            <span class="badge ciu bg-primary"></span>
                                            <input id="id_ciudad" name="id_ciudad" type="hidden" value="0">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">

                                            <label for="id_pais" class="form-label">Pais:</label>
                                            <select class="form-select id_pais" id="id_pais">
                                                <option selected>Seleccione un pais:</option>
                                                <?php foreach ($datosPais as $itemPais) { ?>
                                                    <option value="<?php echo $itemPais['id_pais']; ?>"><?php echo $itemPais['nombre_pais']; ?></option>
                                                <?php } ?>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">

                                            <label for="id_region" class="form-label">Region:</label>
                                            <select class="form-select id_region" name="id_region" id="id_region">
                                                <option selected>Seleccione una region</option>
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
                                <button type="button" class="btn btn-success" onclick="editarDataCiu()" data-bs-dismiss="modal">GUARDAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
</div>

<script>
    let row;
    let idCountryBorrarCiu;
    $('#miTabla').DataTable().destroy();
    $(document).ready(function() {
        let tabla = $('#misCiudad').DataTable();

        // Evento click en los botones dentro de la tabla
        $('#misCiudad tbody').on('click', '.eliminarCiudad', function() {
            row = tabla.row($(this).parents('tr'));
            let fila = tabla.row($(this).closest('tr')).data();
            idCountryBorrarCiu = fila[0]; // Obtener el valor de la columna 'Nombre'

            // Abrir el modal y mostrar el nombre del usuario
            abrirModalCiu(fila[0], fila[1], fila[2]);
        });

        $('#misCiudad tbody').on('click', '.editarCiudad', function() {
            const frmCiu = document.querySelector('#frmUpdateDataCiu');
            const inputsData = new FormData(frmCiu);
            row = tabla.row($(this).parents('tr'));
            let fila = tabla.row($(this).closest('tr')).data();
            idCountryBorrarCiu = fila[0]; // Obtener el valor de la columna 'Nombre'
            inputsData.set("id_ciudad",fila[0]);
            inputsData.set("id_region",fila[1]);
            inputsData.set("ciudad_nombre",fila[2]);
            document.querySelector('.ciu').innerHTML = fila[0];
            // Itera a través de los pares clave-valor de los datos
            for (let pair of inputsData.entries()) {
                // Establece los valores correspondientes en el formulario
                frmCiu.elements[pair[0]].value = pair[1];
            }
            $('#updateDataCiu').modal('show');
            // Abrir el modal y mostrar el nombre del usuario
        });
    });

    function editarDataCiu(){
        const frm = document.querySelector('#frmUpdateDataCiu');
        const info = Object.fromEntries(new FormData(frm).entries());
        console.log(info);

        guardarDataDbCiu(info)
            .then(resp => {
                //document.querySelector("pre").innerHTML = r;
            });
    }

    function abrirModalCiu(idpk, idfk, info) {
        $('#verifdelCiu').modal('show');
        document.querySelector('#infoCiu').innerHTML = 'Desea eliminar a: <b>' + info + '</b> con Id: <b>' + idpk + '</b> y Id Region: <b>' + idfk + '</b>';
    }

    //funcion para el DELETE, para borrar un dato de la base de datos
    function borrarDataDbCiu() {
        fetch('controllers/Ciudad/delete_data.php?id=' + idCountryBorrarCiu, {
                method: 'DELETE'
            })
            .then(response => {
                row.remove().draw();
            })
            .catch(error => {
                console.log('Error en la petición DELETE:', error);
            });

    }

    //funcion para el POST, para guardar el dato editado en la base de datos 
    const guardarDataDbCiu = async(data)=>{
        let myHeaderCiudad = new Headers({"Content-Type": "application/json; charset:utf8"});
        let config = {
            method : "POST",
            headers : myHeaderCiudad,
            body : JSON.stringify(data)
        }
        let res = await ( await fetch("controllers/Ciudad/update_data.php" ,config)).text();
        return res;
    }


    $('#misCiudad').DataTable({
        pageLength: 4,
        language: {

            "decimal": "",
            "emptyTable": "No hay datos en la tabla",
            "info": "Desde _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 a 0 de 0 Registros",
            "infoFiltered": "(filtered from _MAX_ total entries)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrando _MENU_ registros",
            "loadingRecords": "Loading...",
            "processing": "",
            "search": "Buscar:",
            "zeroRecords": "Nose encontraron registros",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }

        },
    })
</script>