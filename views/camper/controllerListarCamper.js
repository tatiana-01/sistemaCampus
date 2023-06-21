let frmEditar=document.querySelector('#editarCamperPersonaForm');
let frmEditarAcademica=document.querySelector('#editarAcademicaForm');
let frmEditarAcudiente=document.querySelector('#editarAcudienteForm');
let btnEditarCamper=document.querySelector('#btnEditarCamperPersona');
let btnEditarAcademica=document.querySelector('#btnEditarAcademica');
let btnEditarAcudiente=document.querySelectorAll('#btnEditarAcudiente');
let data=btnEditarCamper.parentElement.parentElement.querySelector('.card-text').querySelectorAll('p');
let dataAcademica=btnEditarAcademica.parentElement.parentElement.querySelector('#infoCamper').querySelectorAll('p');
// let btnEliminarContacto=document.querySelectorAll('#btnEliminarContacto');
// let btnEliminarEmpleado=document.querySelector('#btnEliminarEmpleado');
let selectPaisEditar=document.querySelector('#selectPais');
let selectRegionEditar=document.querySelector('#selectDpto');
let selectCiudadEditar=document.querySelector('#selectCiudad');
selectPaisEditar.value=data[19].dataset.pais;
console.log(data[19].dataset.pais);
innerSelectRegion(selectPaisEditar.value);
console.log(btnEditarAcudiente);

btnEditarCamper.addEventListener(('click'),(e)=>{
    const inputsData = new FormData(frmEditar);
    inputsData.set("id_rol",data[1].id);
    inputsData.set("persona_nombre",data[3].innerHTML);
    inputsData.set("persona_apellido",data[5].innerHTML);
    inputsData.set("tipo_id",data[7].innerHTML);
    inputsData.set("id_persona",data[9].innerHTML);
    inputsData.set("fecha_nacimiento",data[11].innerHTML);
    inputsData.set("email",data[13].innerHTML);
    inputsData.set("persona_direccion",data[15].innerHTML);
    inputsData.set("persona_telefono",data[17].innerHTML);
    inputsData.set("id_ciudad",data[19].id);
    inputsData.set("id_eps",data[21].id);
    for (var pair of inputsData.entries()) {
        console.log(pair);
        console.log( pair[1]);
        // Establece los valores correspondientes en el formulario
        frmEditar.elements[pair[0]].value = pair[1];
    }
})


btnEditarAcademica.addEventListener(('click'),(e)=>{
    const inputsData = new FormData(frmEditarAcademica);
    inputsData.set("id_nivel_camper",dataAcademica[1].id);
    inputsData.set("id_ruta",dataAcademica[5].id);
    for (var pair of inputsData.entries()) {
        console.log(pair);
        console.log( pair[1]);
        // Establece los valores correspondientes en el formulario
        frmEditarAcademica.elements[pair[0]].value = pair[1];
    }
})



btnEditarAcudiente.forEach((btn)=>{
    btn.addEventListener(('click'),(e)=>{
        
        let dataAcudiente=btn.parentElement.parentElement.querySelector('#infoAcudiente').querySelectorAll('p');
        const inputsDataAcudiente = new FormData(frmEditarAcudiente);
        console.log(dataAcudiente);
        inputsDataAcudiente.set("tipo_id",dataAcudiente[1].innerHTML);
        inputsDataAcudiente.set("id_acudiente",dataAcudiente[3].innerHTML);
        inputsDataAcudiente.set("nombre_acudiente",dataAcudiente[5].innerHTML);
        inputsDataAcudiente.set("parentesco",dataAcudiente[7].innerHTML);
        inputsDataAcudiente.set("telefono_acudiente",dataAcudiente[9].innerHTML);
        //frmEditarAcudiente.dataset.idempleado=btn.dataset.idempleado;
        for (var pair of inputsDataAcudiente.entries()) {
            console.log(pair);
            console.log( pair[1]);
            // Establece los valores correspondientes en el formulario
            frmEditarAcudiente.elements[pair[0]].value = pair[1];
            console.log(pair[1]);
        }
    })
})