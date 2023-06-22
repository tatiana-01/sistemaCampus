export { leerDato }; 
// selecionamos el formulario
let formDatosCiudad = document.querySelector('#formCiudad');
//Encabezado para poder enviar el dato
let myheaderDato = new Headers({"Content-Type" : "application/json"});

//leemos el select y de asignamos un evento
document.querySelectorAll('.id_pais').forEach((val, opc) => {
    val.addEventListener('change', async (e) => {
        let dato = e.target.value;
        postEnviarDato(dato)
            .then(resp => {
                //aqui ba la respuesta a lo que se envio
                //console.log(resp)
                llenarSelect(resp);
            });
    })
});

//metodo POST enviar el dato
const postEnviarDato = async (data) => {
    let config = {
        method : "POST",
        headers : myheaderDato,
        body : JSON.stringify(data)
    };
    //enviamos el dato y resivimos una respuesta
    let respuestaDato = await (await fetch("controllers/Ciudad/recibir_dato.php", config)).text();
    return respuestaDato;
}

//funcion para llenar el select con las regiones 
const llenarSelect = (datos) => {
    let datosRegion = JSON.parse(datos);
    document.querySelectorAll('.id_region').forEach((selectRegion, opc) => {
        selectRegion.innerHTML = '';
        const itemOpcion = document.createElement('option');
        itemOpcion.selected;
        itemOpcion.innerHTML = "Seleccione una region";
        selectRegion.appendChild(itemOpcion);
        datosRegion.forEach(itemRegion => {
            const itemOpcion = document.createElement('option');
            itemOpcion.value = itemRegion.id_region;
            itemOpcion.innerHTML = itemRegion.nombre_region;
            selectRegion.appendChild(itemOpcion);
        });
    });
}

const leerDato = () => {

}