
 //let frmUnidadTematica = document.forms['formUnidadTematica'];
let frmUnidadTematica = document.querySelector('#formUnidadTematica');

let obj =document.querySelector('.card-body');
console.log(obj);
let myHeaders = new Headers({'Content-Type':'application/json'});
/* 
frmUnidadTematica.addEventListener('submit', async (e)=>{

    let data = Object.fromEntries(new FormData(frmUnidadTematica));
    console.log(data);
    let config ={
        method: 'POST',
        headers: myHeaders,
        body: JSON.stringify(data)
    };

    await fetch('../controllers/unidad_tematica/insert_unidad.php',config);

});  */