
let frmEditar=document.querySelector('#editarEmpleadoForm');
let frmEditarContacto=document.querySelector('#contactoEditarForm');
let btnEditarEmpleado=document.querySelector('#btnEditarEmpleado');
let btnEditarContacto=document.querySelectorAll('#btnEditarContacto');
let data=btnEditarEmpleado.parentElement.parentElement.querySelector('.card-text').querySelectorAll('p');
let btnEliminarContacto=document.querySelectorAll('#btnEliminarContacto');
let btnEliminarEmpleado=document.querySelector('#btnEliminarEmpleado');
let selectPaisEditar=document.querySelector('#selectPais');
let selectRegionEditar=document.querySelector('#selectDpto');
let selectCiudadEditar=document.querySelector('#selectCiudad');
selectPaisEditar.value=data[17].dataset.pais;
innerSelectRegion(selectPaisEditar.value);


btnEditarEmpleado.addEventListener(('click'),(e)=>{
    const inputsData = new FormData(frmEditar);
    inputsData.set("persona_nombre",data[1].innerHTML);
    inputsData.set("persona_apellido",data[3].innerHTML);
    inputsData.set("tipo_id",data[5].innerHTML);
    inputsData.set("id_persona",data[7].innerHTML);
    inputsData.set("fecha_nacimiento",data[9].innerHTML);
    inputsData.set("email",data[11].innerHTML);
    inputsData.set("persona_direccion",data[13].innerHTML);
    inputsData.set("persona_telefono",data[15].innerHTML);
    inputsData.set("id_ciudad",data[17].id);
    inputsData.set("id_eps",data[19].id);
    inputsData.set("id_arl",data[21].id);
    for (var pair of inputsData.entries()) {
        console.log(pair);
        console.log( pair[1]);
        // Establece los valores correspondientes en el formulario
        frmEditar.elements[pair[0]].value = pair[1];
    }
})


console.log(btnEditarContacto);
btnEditarContacto.forEach((btn)=>{
    btn.addEventListener(('click'),(e)=>{
        let dataContacto=btn.parentElement.parentElement.querySelector('#infoContacto').querySelectorAll('p');
        const inputsDataContacto = new FormData(frmEditarContacto);
        inputsDataContacto.set("tipo_id",dataContacto[1].innerHTML);
        inputsDataContacto.set("id_contacto_empleado",dataContacto[3].innerHTML);
        inputsDataContacto.set("nombre_contacto_empleado",dataContacto[5].innerHTML);
        inputsDataContacto.set("tipo_locacion_contacto",dataContacto[7].innerHTML);
        inputsDataContacto.set("telefono_contacto_empleado",dataContacto[9].innerHTML);
        frmEditarContacto.dataset.idempleado=btn.dataset.idempleado;
        for (var pair of inputsDataContacto.entries()) {
            console.log(pair);
            console.log( pair[1]);
            // Establece los valores correspondientes en el formulario
            frmEditarContacto.elements[pair[0]].value = pair[1];
            console.log(pair[1]);
        }
    })
})

btnEliminarContacto.forEach((btnDelete)=>{
    btnDelete.addEventListener('click',(e)=>{
        document.querySelector('#infoEliminarContacto').innerHTML = /*html*/'Desea eliminar el contacto: <b>' + btnDelete.dataset.nombre + '</b> con ID: ' + btnDelete.dataset.idcontacto;
        let btnEliminarDef=document.querySelector('#borrarDefContacto');
        btnEliminarDef.setAttribute("href",`../../controllers/contacto_empleado/deleteContacto.php?idContacto=${btnDelete.dataset.idcontacto}&idPersona=${btnDelete.dataset.idpersona}`);
    })
})


let myHeadersContacto = new Headers({ "Content-Type": "application/json" });
frmEditarContacto.addEventListener("submit", async (e) => { 
    let dataEditContacto = Object.fromEntries(new FormData(frmEditarContacto)); 
    dataEditContacto.id_empleado=frmEditarContacto.dataset.idempleado;
    let config = { 
        method: "POST",
        headers: myHeadersContacto,
        body: JSON.stringify(dataEditContacto)
    };
    e.preventDefault();
    console.log(dataEditContacto);
    let res = await (await fetch("../../controllers/contacto_empleado/editContacto.php", config)).text();
    console.log(res); 
    location.reload();
})

frmEditar.addEventListener("submit", async (e) => { 
    let dataEdit= Object.fromEntries(new FormData(frmEditar)); 
    dataEdit.id_empleado=frmEditar.dataset.idempleado;
    let configEmpleado = { 
        method: "POST",
        headers: myHeadersContacto,
        body: JSON.stringify(dataEdit)
    };
    e.preventDefault();
    console.log(dataEdit);
    let res = await (await fetch("../../controllers/empleado/editEmpleado.php", configEmpleado)).text();
    let configEmpleadoPersona = { 
        method: "POST",
        headers: myHeadersContacto,
        body: JSON.stringify(dataEdit)
    };
    let resPersona = await (await fetch("../../controllers/personas/editPersonas.php", configEmpleadoPersona)).text();
    console.log(res); 
    location.reload();
})


btnEliminarEmpleado.addEventListener('click',(e)=>{
    document.querySelector('#infoEliminarEmpleado').innerHTML = /*html*/'Desea eliminar el empleado: <b>' + data[1].innerHTML + ' '+ data[3].innerHTML + '</b> con ID de empleado: ' + frmEditar.dataset.idempleado;
    let btnEliminarEmpleadoDef=document.querySelector('#borrarDefEmpleado');
    if(btnEliminarContacto.length!=0){
        console.log('is');
        btnEliminarEmpleadoDef.setAttribute("href",`../../controllers/contacto_empleado/deleteContactoByEmpleado.php?idEmpleado=${frmEditar.dataset.idempleado}&idPersona=${data[7].innerHTML}`);
    }else{
        btnEliminarEmpleadoDef.setAttribute("href",`../../controllers/empleado/deleteEmpleado.php?idEmpleado=${frmEditar.dataset.idempleado}&idPersona=${data[7].innerHTML}`);
    }
    
})