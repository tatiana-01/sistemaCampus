let myformAcudiente = document.querySelector("#acudienteForm"); 
let myformCamperAcudiente = document.querySelector("#camperAcudienteForm"); 
let myHeadersAcudiente = new Headers({ "Content-Type": "application/json" });

myformAcudiente.addEventListener("submit", async (e) => { 
    let dataAcudiente = Object.fromEntries(new FormData(e.target));
    let dataCamperAcudiente = Object.fromEntries(new FormData(myformCamperAcudiente));
    dataCamperAcudiente.id_acudiente=dataAcudiente.id_acudiente;
    console.log(dataAcudiente);
    console.log(dataCamperAcudiente);
    let configAcudiente = { 
        method: "POST",
        headers: myHeadersAcudiente,
        body: JSON.stringify(dataAcudiente)
    };
    let resAcudiente = await (await fetch("../../controllers/acudiente/insertAcudiente.php", configAcudiente)).text();
    console.log(resAcudiente);
    let configCamperAcudiente = { 
        method: "POST",
        headers: myHeadersAcudiente,
        body: JSON.stringify(dataCamperAcudiente)
    };
    let resCamperAcudiente = await (await fetch("../../controllers/camper_acudiente/insertCamperAcudiente.php", configCamperAcudiente)).text();
    console.log(resAcudiente);
})
