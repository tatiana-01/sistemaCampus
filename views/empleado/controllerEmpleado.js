let myformEmpleado = document.querySelector("#empleadoForm"); 
let myformPersonaEmpleado = document.querySelector("#empleadoPersonaForm"); 
let myHeadersEmpleado = new Headers({ "Content-Type": "application/json" });
let btnFormPersonaEmpleado=document.querySelector('#botonEmpleadoPersonaForm')
console.log(myformPersonaEmpleado);



myformPersonaEmpleado.addEventListener("submit", async (e) => { 
    e.preventDefault();
    let dataPersona = Object.fromEntries(new FormData(myformPersonaEmpleado));
    dataPersona.foto_persona=dataPersona.foto_persona.name;
    console.log(dataPersona);
    let configPersonaEmpleado = { 
        method: "POST",
        headers: myHeadersEmpleado,
        body: JSON.stringify(dataPersona)
    };
 
    btnFormPersonaEmpleado.classList.add("d-none");
    myformEmpleado.classList.remove("d-none");
    
   let resPersonaEmpleado = await (await fetch("../../controllers/personas/insertPersonas.php", configPersonaEmpleado)).text(); 
})


myformEmpleado.addEventListener("submit", async (e) => { 
    let dataEmpleado=Object.fromEntries(new FormData(myformEmpleado));
    let dataPersona = Object.fromEntries(new FormData(myformPersonaEmpleado));
    dataEmpleado.id_persona=dataPersona.id_persona;
    let configEmpleado = { 
        method: "POST",
        headers: myHeadersEmpleado,
        body: JSON.stringify(dataEmpleado)
    };
    let resCamper = await (await fetch("../../controllers/empleado/insertEmpleado.php", configEmpleado)).text(); 
})

