//funcion para darle funcionalidad al nav bar 
document.querySelectorAll(".menu").forEach((val, opc) => {
    val.addEventListener('click', (e)=> {
        document.querySelector('#registro').style.display = "block";
        document.querySelector('#listarRegistros').style.display = "none";
        let data = JSON.parse(e.target.dataset.veryocultar); //para hacerlo iterable
        let verForm = document.querySelector(data[0]);
        verForm.style.display = "block";
        data[1].forEach((item, op) => {
            let ocultarForm = document.querySelector(item);
            ocultarForm.style.display = "none";
        });

        e.preventDefault();
    });
});

//funcion para darle funcionalidad al desplegable dropdown
document.querySelectorAll(".menuLista").forEach((val, opc) => {
    val.addEventListener('click', (e)=> {
        document.querySelector('#registro').style.display = "none";
        document.querySelector('#listarRegistros').style.display = "block";
        let data = JSON.parse(e.target.dataset.veryocultarlist); //para hacerlo iterable
        let verForm = document.querySelector(data[0]);
        verForm.style.display = "block";
        data[1].forEach((item, op) => {
            let ocultarForm = document.querySelector(item);
            ocultarForm.style.display = "none";
        });

        e.preventDefault();
    });
});

