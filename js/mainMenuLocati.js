document.querySelectorAll(".menu").forEach((val, opc) => {
    val.addEventListener('click', (e)=> {
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