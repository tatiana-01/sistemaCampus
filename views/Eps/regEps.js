// obtnemos el formulario
let formEps = document.querySelector('#formEps');
//definimos el encabezado para el envio de los datos
let myHeaderEps = new Headers({"Content-Type" : "application/json; charset:utf8"});

//creamos el evento al boton para enviar los datos 
document.querySelector('#btnEps').addEventListener('click', async (e) => {
    console.log("hola")
    e.preventDefault();
    //obtenemos los datos del Form en un objeto
    let data = Object.fromEntries(new FormData(formEps).entries());
    console.log(data);
    postData4(data)
        .then(res => {
            //me devuelve la respuesta del metodo
        });
    alert("El dato se envio correctamente");
});

//funcion para el metodo POST (enviar datos)
const postData4 = async (data) => {
    let config = {
        method : "POST",
        headers : myHeaderEps,
        body : JSON.stringify(data)
    }
    //enviamos los datos 
    let response = await (await fetch("../../../controllers/Eps/insert_data.php", config)).text();
    return response;
}