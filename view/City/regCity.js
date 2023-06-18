export { postData3 };
// obtnemos el formulario
let formCiudad = document.querySelector('#formCiudad');
//definimos el encabezado para el envio de los datos
let myHeaderCiudad = new Headers({"Content-Type" : "application/json; charset:utf8"});

/* //creamos el evento al boton para enviar los datos 
document.querySelector('#btnCiudad').addEventListener('click', async (e) => {

    e.preventDefault();
    //obtenemos los datos del Form en un objeto
    let data = Object.fromEntries(new FormData(formCiudad).entries());
    postData3(data)
        .then(res => {
            //me devuelve la respuesta del metodo
        });
    alert("El dato se envio correctamente");
}); */

//funcion para el metodo POST (enviar datos)
const postData3 = async (data) => {
    let config = {
        method : "POST",
        headers : myHeaderCiudad,
        body : JSON.stringify(data)
    }
    //enviamos los datos 
    let response = await (await fetch("controllers/Ciudad/insert_data.php", config)).text();
    return response;
}