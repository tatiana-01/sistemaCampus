<?php
    require_once 'app.php';

    use Models\Region;

    $objRegion = new Region();
    $datosRegion = $objRegion->loadAllData();

?>

<section>
    <div class="container">
        <table id="misRegion" class="table table-striped table-hover dataTable">
            <thead>
                <tr>
                    <th>Id Region</th>
                    <th>Id Pais</th>
                    <th>Nombre Region</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datosRegion as $region) {?>
                    <tr>
                        <td><?php echo $region['id_region']; ?></td>
                        <td><?php echo $region['id_pais']; ?></td>
                        <td><?php echo $region['nombre_region']; ?></td>
                        <td>
                            <button type="button" class="btn btn-danger eliminarRegion">Eliminar</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary editarRegion">Editar</button>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</section>

<!--Modal que muestra el datoa a Eliminar-->
<div class="modal fade " id="verifdelRe" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-l">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">** REGION **</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card text-center">
                    <h5 class="card-header">Confirmar Eliminacion</h5>
                    <div class="card-body">
                        <div id="infoRe"></div>
                        <br/>
                        <button type="button" class="btn btn-warning borrardef" onclick="borrarDataDbRe()" data-bs-dismiss="modal">Eliminar</button>
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
<div class="modal fade " id="updateDataRe" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">++ REGION +++</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <h5 class="card-header text-center">Editar Region</h5>
                    <div class="card-body text-center">
                        <form id="frmUpdateDataRe">
                            <div class="container">
                                <div class="row bg-light p-1">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="id_region" class="form-label">id Region:</label>
                                            <br/>
                                            <span class="badge reg bg-primary"></span>
                                            <input id="id_region" name="id_region" type="hidden" value="0">
                                        </div>
                                    </div>
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
                                </div>
                            </div>
                            <div class="container text-center bg-light p-1">
                                <button type="button" class="btn btn-success" onclick="editarDataRe()" data-bs-dismiss="modal">GUARDAR</button>
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
    var row;
    let idCountryBorrarRe;
    $('#miTabla').DataTable().destroy();
    $(document).ready(function() {
        var tabla = $('#misRegion').DataTable();

        // Evento click en los botones dentro de la tabla
        $('#misRegion tbody').on('click', '.eliminarRegion', function() {
            row = tabla.row($(this).parents('tr'));
            var fila = tabla.row($(this).closest('tr')).data();
            idCountryBorrarRe = fila[0]; // Obtener el valor de la columna 'Nombre'

            // Abrir el modal y mostrar el nombre del usuario
            abrirModalRe(fila[0], fila[1], fila[2]);
        });

        $('#misRegion tbody').on('click', '.editarRegion', function() {
            const frmRe = document.querySelector('#frmUpdateDataRe');
            const inputsData = new FormData(frmRe);
            row = tabla.row($(this).parents('tr'));
            var fila = tabla.row($(this).closest('tr')).data();
            idCountryBorrarRe = fila[0]; // Obtener el valor de la columna 'Nombre'
            inputsData.set("id_region",fila[0]);
            inputsData.set("id_pais",fila[1]);
            inputsData.set("nombre_region",fila[2]);
            document.querySelector('.reg').innerHTML = fila[0];
            // Itera a través de los pares clave-valor de los datos
            for (var pair of inputsData.entries()) {
                // Establece los valores correspondientes en el formulario
                frmRe.elements[pair[0]].value = pair[1];
            }
            $('#updateDataRe').modal('show');
            // Abrir el modal y mostrar el nombre del usuario
        });
    });

    function editarDataRe(){
        const frm = document.querySelector('#frmUpdateDataRe');
        const info = Object.fromEntries(new FormData(frm).entries());
        console.log(info);

        guardarDataDbRe(info)
            .then(resp => {
                //document.querySelector("pre").innerHTML = r;
            });
    }

    function abrirModalRe(idpk, idfk, info) {
        $('#verifdelRe').modal('show');
        document.querySelector('#infoRe').innerHTML = 'Desea eliminar a: <b>' + info + '</b> con Id: <b>' + idpk + '</b> y Id Pais: <b>' + idfk + '</b>';
    }

    //funcion para el DELETE, para borrar un dato de la base de datos
    function borrarDataDbRe() {
        fetch('controllers/Region/delete_data.php?id=' + idCountryBorrarRe, {
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
    const guardarDataDbRe = async(data)=>{
        let myHeaderRegion = new Headers({"Content-Type": "application/json; charset:utf8"});
        let config = {
            method : "POST",
            headers : myHeaderRegion,
            body : JSON.stringify(data)
        }
        let res = await ( await fetch("controllers/Region/update_data.php" ,config)).text();
        return res;
    }


    $('#misRegion').DataTable({
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

