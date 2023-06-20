<?php
    require_once 'app.php';

    use Models\Eps;

    $objEps = new Eps();
    $datosEps = $objEps -> loadAllData();

?>

<section>
    <div class="container">
        <table id="misEps" class="table table-striped table-hover dataTable">
            <thead>
                <tr>
                    <th>Id Eps </th>
                    <th>Nombre EPS</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datosEps as $eps) {?>
                    <tr>
                        <td><?php echo $eps['id_eps']; ?></td>
                        <td><?php echo $eps['eps_nombre']; ?></td>
                        <td>
                            <button type="button" class="btn btn-danger eliminarEps">Eliminar</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary editarEps">Editar</button>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</section>

<!--Modal que muestra el datoa a Eliminar-->
<div class="modal fade " id="verifdelEps" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-l">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">** EPS **</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card text-center">
                    <h5 class="card-header">Confirmar Eliminacion</h5>
                    <div class="card-body">
                        <div id="infoEps"></div>
                        <br/>
                        <button type="button" class="btn btn-warning borrardef" onclick="borrarDataDbEps()" data-bs-dismiss="modal">Eliminar</button>
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
<div class="modal fade " id="updateDataEps" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">++ EPS +++</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <h5 class="card-header text-center">Editar EPS</h5>
                    <div class="card-body text-center">
                        <form id="frmUpdateDataEps">
                            <div class="container">
                                <div class="row bg-light p-1">
                                    <div class="col-3">
                                        <label for="id_eps" class="form-label">Id Eps:</label>
                                        <br/>
                                        <span class="badge eps bg-primary"></span>
                                        <input id="id_eps" name="id_eps" type="hidden" value="0">
                                    </div>
                                    <div class="col-7">
                                        <div class="mb-3">
                                            <label for="eps_nombre" class="form-label">Nombre de la EPS:</label>
                                            <input type="text" class="form-control" id="eps_nombre" name="eps_nombre">
                                        </div>
                                    </div>
                                    <div class="col-2">

                                    </div>
                                </div>
                            </div>
                            <div class="container text-center bg-light p-1">
                                <button type="button" class="btn btn-success" onclick="editarDataEps()" data-bs-dismiss="modal">GUARDAR</button>
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
    let idCountryBorrarEps;
    $('#miTabla').DataTable().destroy();
    $(document).ready(function() {
        let tabla = $('#misEps').DataTable();

        // Evento click en los botones dentro de la tabla
        $('#misEps tbody').on('click', '.eliminarEps', function() {
            row = tabla.row($(this).parents('tr'));
            let fila = tabla.row($(this).closest('tr')).data();
            idCountryBorrarEps = fila[0]; // Obtener el valor de la columna 'Nombre'

            // Abrir el modal y mostrar el nombre del usuario
            abrirModalEps(fila[0], fila[1]);
        });

        $('#misEps tbody').on('click', '.editarEps', function() {
            const frmEps = document.querySelector('#frmUpdateDataEps');
            const inputsData = new FormData(frmEps);
            row = tabla.row($(this).parents('tr'));
            let fila = tabla.row($(this).closest('tr')).data();
            idCountryBorrarEps = fila[0]; // Obtener el valor de la columna 'Nombre'
            inputsData.set("id_eps",fila[0]);
            inputsData.set("eps_nombre",fila[1]);
            document.querySelector('.eps').innerHTML = fila[0];
            // Itera a través de los pares clave-valor de los datos
            for (let pair of inputsData.entries()) {
                // Establece los valores correspondientes en el formulario
                frmEps.elements[pair[0]].value = pair[1];
            }
            $('#updateDataEps').modal('show');
            // Abrir el modal y mostrar el nombre del usuario
        });
    });

    function editarDataEps(){
        const frmEps = document.querySelector('#frmUpdateDataEps');
        const info = Object.fromEntries(new FormData(frmEps).entries());
        console.log(info);

        guardarDataDbEps(info)
            .then(resp => {
                //document.querySelector("pre").innerHTML = r;
            });
    }

    function abrirModalEps(idpk, info) {
        $('#verifdelEps').modal('show');
        document.querySelector('#infoEps').innerHTML = 'Desea eliminar a: <b>' + info + '</b> con Id: <b>' + idpk + '</b>';
    }

    //funcion para el DELETE, para borrar un dato de la base de datos
    function borrarDataDbEps() {
        fetch('controllers/Eps/delete_data.php?id=' + idCountryBorrarEps, {
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
    const guardarDataDbEps = async(data)=>{
        let myHeaderEps = new Headers({"Content-Type": "application/json; charset:utf8"});
        let config = {
            method : "POST",
            headers : myHeaderEps,
            body : JSON.stringify(data)
        }
        let res = await ( await fetch("controllers/Eps/update_data.php" ,config)).text();
        return res;
    }


    $('#misEps').DataTable({
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