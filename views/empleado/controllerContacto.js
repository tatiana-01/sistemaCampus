let myformContactoEmpleado = document.querySelector("#contactoEmpleadoForm"); 
let myHeadersContacto = new Headers({ "Content-Type": "application/json" });


myformContactoEmpleado.addEventListener("submit", async (e) => { 
    let dataContacto = Object.fromEntries(new FormData(e.target));
    let configContacto = { 
        method: "POST",
        headers: myHeadersContacto,
        body: JSON.stringify(dataContacto)
    };
    console.log(JSON.stringify(dataContacto));
    let resContacto = await (await fetch("../../controllers/contacto_empleado/insertContactoEmpleado.php", configContacto)).text(); 
})
