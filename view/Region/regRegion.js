 export { postData2 };
// obtnemos el formulario/* 
 let formRegion = document.querySelector('#formRegion');
//definimos el encabezado para el envio de los datos
/* let myHeaderRegion = new Headers({"Content-Type" : "application/json; charset:utf8"});

 //creamos el evento al boton para enviar los datos 
document.querySelector('#btnRegion').addEventListener('click', async (e) => {

    e.preventDefault();
    //obtenemos los datos del Form en un objeto
    let data = Object.fromEntries(new FormData(formRegion).entries());
    postData2(data)
        .then(res => {
            //me devuelve la respuesta del metodo
        });
    alert("El dato se envio correctamente");
});
 */
//funcion para el metodo POST (enviar datos)
const postData2 = async (data) => {
    let config = {
        method : "POST",
        headers : myHeaderRegion,
        body : JSON.stringify(data)
    }
    //enviamos los datos 
    let response = await (await fetch("controllers/Region/insert_data.php", config)).text();
    return response;
}   