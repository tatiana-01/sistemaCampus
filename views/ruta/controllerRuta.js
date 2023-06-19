$('#misRutas').DataTable().destroy();
$('#misRutas').DataTable(  {
    pageLength: 4,
}
);

let myformRuta = document.querySelector("#rutaForm"); 
let myHeadersRuta = new Headers({ "Content-Type": "application/json" });


myformRuta.addEventListener("submit", async (e) => { 
    let dataRuta = Object.fromEntries(new FormData(myformRuta));
    let configRuta = { 
        method: "POST",
        headers: myHeadersRuta,
        body: JSON.stringify(dataRuta)
    };
    let resRuta = await (await fetch("../../controllers/ruta/insertRuta.php", configRuta)).text(); 
})




$(document).ready(function() {
    var tabla = $('#misRutas').DataTable();
    // Evento click en los botones dentro de la tabla
    $('#misRutas tbody').on('click', '#borrarRuta', function() {
        row = tabla.row($(this).parents('tr'));
        var fila = tabla.row($(this).closest('tr')).data();
        idRutaBorrar = fila[0]; // Obtener el valor de la columna 'Nombre'

        // Abrir el modal y mostrar el nombre del usuario
        modalEliminar(fila[0], fila[1]);
    });
    $('#misRutas tbody').on('click', '#botonEditarRuta', function() {
        console.log('si');
        const frm = document.querySelector('#formRutaEdit');
        const inputsData = new FormData(frm);
        row = tabla.row($(this).parents('tr'));
        let fila = tabla.row($(this).closest('tr')).data();
        let idRutaEditar = fila[0]; // Obtener el valor de la columna 'Nombre'
        inputsData.set("nombre_ruta",fila[1]);
        inputsData.set("descripcion_ruta",fila[2]);
        document.querySelector('.badge').innerHTML = fila[0];
        // Itera a través de los pares clave-valor de los datos
        for (var pair of inputsData.entries()) {
            console.log(pair);
            console.log( pair[1]);
            // Establece los valores correspondientes en el formulario
            frm.elements[pair[0]].value = pair[1];
        }
    });
});


function modalEliminar (idpk, info) {
    document.querySelector('#infoEliminar').innerHTML = /*html*/'Desea eliminar la ruta: <b>' + info + '</b> con ID: ' + idpk;
    let btnEliminarRuta=document.querySelector('#borrarDefRuta');
    btnEliminarRuta.setAttribute("href",`../../controllers/ruta/deleteRuta.php?id=${idpk}`);
}

let myformEditRuta = document.querySelector("#formRutaEdit"); //seleccionamos el formulario
console.log(myformEditRuta);
myformEditRuta.addEventListener("submit", async (e) => { 
    let idRutaEditar=document.querySelector('.badge');
    let dataEditRuta = Object.fromEntries(new FormData(e.target)); 
    dataEditRuta.id_ruta=idRutaEditar.innerHTML;
    let config = { 
        method: "POST",
        headers: myHeadersRuta,
        body: JSON.stringify(dataEditRuta)
    };
    console.log(dataEditRuta);
    let res = await (await fetch("../../controllers/ruta/editRuta.php", config)).text();
    console.log(res); 
   
})