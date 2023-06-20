/* referencia al formulario */

let frmStack = document.forms['formStack'];

let myHeaders = new Headers({'Content-Type':'application/json'});

frmStack.addEventListener('submit', async (e)=>{

    let data = Object.fromEntries(new FormData(frmStack));
    console.log(data);
    let config ={
        method: 'POST',
        headers: myHeaders,
        body: JSON.stringify(data)
    };

    await fetch('../controllers/stack_tecnologico/insert_stack.php',config);

});