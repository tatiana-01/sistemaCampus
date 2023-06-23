// obtnemos el formulario
let formRol = document.querySelector('#formRol');
//definimos el encabezado para el envio de los datos
let myHeaderRol = new Headers({"Content-Type" : "application/json; charset:utf8"});

//creamos el evento al boton para enviar los datos 
document.querySelector('#btnRol').addEventListener('click', async (e) => {
    e.preventDefault();
    //obtenemos los datos del Form en un objeto
    let data = Object.fromEntries(new FormData(formRol).entries());
    //console.log(data);
    postData5(data)
        .then(res => {
            //me devuelve la respuesta del metodo
        });
    alert("El dato se envio correctamente");
    location.reload();
});

//funcion para el metodo POST (enviar datos)
const postData5 = async (data) => {
    let config = {
        method : "POST",
        headers : myHeaderRol,
        body : JSON.stringify(data)
    }
    //enviamos los datos 
    let response = await (await fetch("../../../controllers/Rol/insert_data.php", config)).text();
    return response;
}