/* referencia al formulario */

let formCapitulo = document.forms['formCapitulo'];

let myHeaders = new Headers({'Content-Type':'application/json'});

formCapitulo.addEventListener('submit', async (e)=>{

    let data = Object.fromEntries(new FormData(formCapitulo));
    console.log(data);
    let config ={
        method: 'POST',
        headers: myHeaders,
        body: JSON.stringify(data)
    };

    await fetch('../controllers/capitulo/insert_capitulo.php',config);

});