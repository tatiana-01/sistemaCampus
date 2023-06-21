<?php
    require_once 'app.php';

    use Models\Pais;

    $objPais = new Pais();
    $datosPais = $objPais->loadAllData();

?>

<section>
    <div class="container">
        <table id="misPaises" class="table table-striped table-hover dataTable">
            <thead>
                <tr>
                    <th>Id Pais</th>
                    <th>Nombre Pais</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datosPais as $pais) {?>
                    <tr>
                        <td><?php echo $pais['id_pais']; ?></td>
                        <td><?php echo $pais['nombre_pais']; ?></td>
                        <td>
                            <button type="button" class="btn btn-danger eliminarPais">Eliminar</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary editarPais">Editar</button>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</section>

<!--Modal que muestra el datoa a Eliminar-->
<div class="modal fade " id="verifdel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-l">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">** PAIS **</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card text-center">
                    <h5 class="card-header">Confirmar Eliminacion</h5>
                    <div class="card-body">
                        <div id="info"></div>
                        <br/>
                        <button type="button" class="btn btn-warning borrardef" onclick="borrarDataDb()" data-bs-dismiss="modal">Eliminar</button>
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
<div class="modal fade " id="updateData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">++ PAIS +++</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <h5 class="card-header text-center">Editar Pais</h5>
                    <div class="card-body text-center">
                        <form id="frmUpdateData">
                            <div class="container">
                                <div class="row bg-light p-1">
                                    <div class="col-4">
                                        <label for="id_pais" class="form-label">id Pais:</label>
                                        <br/>
                                        <span class="badge bg-primary"></span>
                                        <input id="id_pais" name="id_pais" type="hidden" value="0">
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="nombre_pais" class="form-label">Nombre del Pais:</label>
                                            <input type="text" class="form-control" id="nombre_pais" name="nombre_pais">
                                        </div>
                                    </div>
                                    <div class="col-4">

                                    </div>
                                </div>
                            </div>
                            <div class="container text-center bg-light p-1">
                                <button type="button" class="btn btn-success" onclick="editarData()" data-bs-dismiss="modal">GUARDAR</button>
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
    let idCountryBorrar;
    $('#miTabla').DataTable().destroy();
    $(document).ready(function() {
        let tabla = $('#misPaises').DataTable();

        // Evento click en los botones dentro de la tabla
        $('#misPaises tbody').on('click', '.eliminarPais', function() {
            row = tabla.row($(this).parents('tr'));
            let fila = tabla.row($(this).closest('tr')).data();
            idCountryBorrar = fila[0]; // Obtener el valor de la columna 'Nombre'

            // Abrir el modal y mostrar el nombre del usuario
            abrirModal(fila[0], fila[1]);
        });

        $('#misPaises tbody').on('click', '.editarPais', function() {
            const frm = document.querySelector('#frmUpdateData');
            const inputsData = new FormData(frm);
            row = tabla.row($(this).parents('tr'));
            let fila = tabla.row($(this).closest('tr')).data();
            idCountryBorrar = fila[0]; // Obtener el valor de la columna 'Nombre'
            inputsData.set("id_pais",fila[0]);
            inputsData.set("nombre_pais",fila[1]);
            document.querySelector('.badge').innerHTML = fila[0];
            // Itera a través de los pares clave-valor de los datos
            for (let pair of inputsData.entries()) {
                // Establece los valores correspondientes en el formulario
                frm.elements[pair[0]].value = pair[1];
            }
            $('#updateData').modal('show');
            // Abrir el modal y mostrar el nombre del usuario
        });
    });

    function editarData(){
        const frm = document.querySelector('#frmUpdateData');
        const info = Object.fromEntries(new FormData(frm).entries());
        console.log(info);

        guardarDataDb(info)
            .then(resp => {
                //document.querySelector("pre").innerHTML = r;
            });
    }

    function abrirModal(idpk, info) {
        $('#verifdel').modal('show');
        document.querySelector('#info').innerHTML = 'Desea eliminar a: <b>' + info + '</b> con Id: <b>' + idpk + '</b>';
    }

    //funcion para el DELETE, para borrar un dato de la base de datos
    function borrarDataDb() {
        fetch('controllers/Pais/delete_data.php?id=' + idCountryBorrar, {
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
    const guardarDataDb = async(data)=>{
        let myHeaderPais = new Headers({"Content-Type": "application/json; charset:utf8"});
        let config = {
            method : "POST",
            headers : myHeaderPais,
            body : JSON.stringify(data)
        }
        let res = await ( await fetch("controllers/Pais/update_data.php" ,config)).text();
        return res;
    }


    $('#misPaises').DataTable({
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