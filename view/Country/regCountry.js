export { postData1 };
// obtnemos el formulario
let formPais = document.querySelector('#formPais');
//definimos el encabezado para el envio de los datos
let myHeaderPais = new Headers({"Content-Type" : "application/json; charset:utf8"});

/* //creamos el evento al boton para enviar los datos 
document.querySelector('#btnPais').addEventListener('click', async (e) => {

    e.preventDefault();
    //obtenemos los datos del Form en un objeto
    let data = Object.fromEntries(new FormData(formPais).entries());
    postData1(data)
        .then(res => {
            //me devuelve la respuesta del metodo
        });
    alert("El dato se envio correctamente");
});
 */
//funcion para el metodo POST (enviar datos)
const postData1 = async (data) => {
    let config = {
        method : "POST",
        headers : myHeaderPais,
        body : JSON.stringify(data)
    }
    //enviamos los datos 
    let response = await (await fetch("controllers/Pais/insert_data.php", config)).text();
    return response;
}

