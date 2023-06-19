

let myformCamper = document.querySelector("#camperForm"); 
let myformPersonaCamper = document.querySelector("#camperPersonaForm"); 
let myformMatriculaCamper = document.querySelector("#matriculaForm"); 
let myHeadersCamper = new Headers({ "Content-Type": "application/json" });
let btnFormPersona=document.querySelector('#botonFormPersonCamper')
let btnFormCamper=document.querySelector('#botonFormCamper')


myformPersonaCamper.addEventListener("submit", async (e) => { 
    e.preventDefault();
    let dataPersona = Object.fromEntries(new FormData(myformPersonaCamper));
    dataPersona.id_rol=1;
    dataPersona.foto_persona=dataPersona.foto_persona.name;
    console.log(dataPersona);
    let configPersonaCamper = { 
        method: "POST",
        headers: myHeadersCamper,
        body: JSON.stringify(dataPersona)
    };
 
    btnFormPersona.classList.add("d-none");
    myformCamper.classList.remove("d-none");
    
    e.stopImmediatePropagation();
    let resPersonaCamper = await (await fetch("../../controllers/personas/insertPersonas.php", configPersonaCamper)).text(); 
})


myformCamper.addEventListener("submit", async (e) => { 
    let dataCamper=Object.fromEntries(new FormData(myformCamper));
    let dataPersona = Object.fromEntries(new FormData(myformPersonaCamper));
    dataCamper.id_persona=dataPersona.id_persona;
    let configCamper = { 
        method: "POST",
        headers: myHeadersCamper,
        body: JSON.stringify(dataCamper)
    };
    btnFormCamper.classList.add("d-none");
    myformMatriculaCamper.classList.remove("d-none");
    e.preventDefault();
    let resCamper = await (await fetch("../../controllers/campers/insertCampers.php", configCamper)).text(); 
})

myformMatriculaCamper.addEventListener("submit", async (e) => { 
    
    let dataMatriculaCamper=Object.fromEntries(new FormData(myformMatriculaCamper));
    let dataPersona = Object.fromEntries(new FormData(myformPersonaCamper));
    let configIdCamper = { 
        method: "POST",
        headers: myHeadersCamper,
        body: JSON.stringify(dataPersona.id_persona)
    };
    e.preventDefault();
    let infoCamper=await(await fetch("../../controllers/campers/idCamper.php", configIdCamper)).text();
    let jsonInfoCamper=JSON.parse(infoCamper)
    dataMatriculaCamper.id_camper=jsonInfoCamper[0].id_camper;
    console.log(dataMatriculaCamper);
    let configMatriculaCamper = { 
        method: "POST",
        headers: myHeadersCamper,
        body: JSON.stringify(dataMatriculaCamper)
    }; 
    let resMatriculaCamper = await (await fetch("../../controllers/matricula_camper_rutas/insertMatricula.php", configMatriculaCamper)).text();
    location.reload();
})
