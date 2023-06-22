<?php
    require_once '../../app.php';

    use Models\Rol;

    $objRol = new Rol();
    $datosRol = $objRol -> loadAllData();

?>

<section>
    <div class="container">
        <table id="misRol" class="table table-striped table-hover dataTable">
            <thead>
                <tr>
                    <th>Id ROL </th>
                    <th>Nombre ROL</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datosRol as $rol) {?>
                    <tr>
                        <td><?php echo $rol['id_rol']; ?></td>
                        <td><?php echo $rol['name_rol']; ?></td>
                        <td>
                            <button type="button" class="btn btn-danger eliminarRol">Eliminar</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary editarRol">Editar</button>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</section>

<!--Modal que muestra el datoa a Eliminar-->
<div class="modal fade " id="verifdelRol" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-l">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">** TIPO DE ROL **</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card text-center">
                    <h5 class="card-header">Confirmar Eliminacion</h5>
                    <div class="card-body">
                        <div id="infoRol"></div>
                        <br/>
                        <button type="button" class="btn btn-warning borrardef" onclick="borrarDataDbRol()" data-bs-dismiss="modal">Eliminar</button>
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
<div class="modal fade " id="updateDataRol" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">++ TIPO DE ROL +++</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <h5 class="card-header text-center">Editar ROL</h5>
                    <div class="card-body text-center">
                        <form id="frmUpdateDataRol">
                            <div class="container">
                                <div class="row bg-light p-1">
                                    <div class="col-3">
                                        <label for="id_rol" class="form-label">Id Rol:</label>
                                        <br/>
                                        <span class="badge rol bg-primary"></span>
                                        <input id="id_rol" name="id_rol" type="hidden" value="0">
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="name_rol" class="form-label">Nombre del tipo de Rol:</label>
                                            <input type="text" class="form-control" id="name_rol" name="name_rol">
                                        </div>
                                    </div>
                                    <div class="col-3">

                                    </div>
                                </div>
                            </div>
                            <div class="container text-center bg-light p-1">
                                <button type="button" class="btn btn-success" onclick="editarDataRol()" data-bs-dismiss="modal">GUARDAR</button>
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
    let idCountryBorrarRol;
    $('#miTabla').DataTable().destroy();
    $(document).ready(function() {
        let tabla = $('#misRol').DataTable();

        // Evento click en los botones dentro de la tabla
        $('#misRol tbody').on('click', '.eliminarRol', function() {
            row = tabla.row($(this).parents('tr'));
            let fila = tabla.row($(this).closest('tr')).data();
            idCountryBorrarRol = fila[0]; // Obtener el valor de la columna 'Nombre'

            // Abrir el modal y mostrar el nombre del usuario
            abrirModalRol(fila[0], fila[1]);
        });

        $('#misRol tbody').on('click', '.editarRol', function() {
            const frmRol = document.querySelector('#frmUpdateDataRol');
            const inputsData = new FormData(frmRol);
            row = tabla.row($(this).parents('tr'));
            let fila = tabla.row($(this).closest('tr')).data();
            idCountryBorrarRol = fila[0]; // Obtener el valor de la columna 'Nombre'
            inputsData.set("id_rol",fila[0]);
            inputsData.set("name_rol",fila[1]);
            document.querySelector('.rol').innerHTML = fila[0];
            // Itera a través de los pares clave-valor de los datos
            for (let pair of inputsData.entries()) {
                // Establece los valores correspondientes en el formulario
                frmRol.elements[pair[0]].value = pair[1];
            }
            $('#updateDataRol').modal('show');
            // Abrir el modal y mostrar el nombre del usuario
        });
    });

    function editarDataRol(){
        const frmRol = document.querySelector('#frmUpdateDataRol');
        const info = Object.fromEntries(new FormData(frmRol).entries());
        console.log(info);

        guardarDataDbRol(info)
            .then(resp => {
                //document.querySelector("pre").innerHTML = r;
            });
    }

    function abrirModalRol(idpk, info) {
        $('#verifdelRol').modal('show');
        document.querySelector('#infoRol').innerHTML = 'Desea eliminar a: <b>' + info + '</b> con Id: <b>' + idpk + '</b>';
    }

    //funcion para el DELETE, para borrar un dato de la base de datos
    function borrarDataDbRol() {
        fetch('../../../controllers/Rol/delete_data.php?id=' + idCountryBorrarRol, {
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
    const guardarDataDbRol = async(data)=>{
        let myHeaderRol = new Headers({"Content-Type": "application/json; charset:utf8"});
        let config = {
            method : "POST",
            headers : myHeaderRol,
            body : JSON.stringify(data)
        }
        let res = await ( await fetch("../../../controllers/Rol/update_data.php" ,config)).text();
        return res;
    }


    $('#misRol').DataTable({
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