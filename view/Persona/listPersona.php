<?php 
    require_once 'app.php';
    use Models\Persona;

    $objPersona = new Persona();
    $datosPersona = $objPerson -> loadAllData();

?>

<section>
    <div class="container">
        <table id="misPaises" class="table table-striped table-hover dataTable">
            <thead>
                <tr>
                    <th>Id Persona</th>
                    <th>Foto Persona</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Email</th>
                    <th>Id Ciudad</th>
                    <th>id Eps</th>
                    <th>id Rol</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datosPersona as $persona) {?>
                    <tr>
                        <td><?php echo $persona['id_persona']; ?></td>
                        <td><?php echo $persona['foto_persona']; ?></td>
                        <td><?php echo $persona['persona_nombre']; ?></td>
                        <td><?php echo $persona['persona_apellido']; ?></td>
                        <td><?php echo $persona['fecha_nacimiento']; ?></td>
                        <td><?php echo $persona['email']; ?></td>
                        <td><?php echo $persona['id_ciudad']; ?></td>
                        <td><?php echo $persona['id_eps']; ?></td>
                        <td><?php echo $persona['id_rol']; ?></td>
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

<script>
    
    
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