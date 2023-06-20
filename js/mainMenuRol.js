document.querySelectorAll(".menuRol").forEach((vall, opc) => {
    vall.addEventListener('click', (e)=> {
        let data = JSON.parse(e.target.dataset.veryocultareps); //para hacerlo iterable
        let verFormEps = document.querySelector(data[0]);
        verFormEps.style.display = "block";
        data[1].forEach((item, op) => {
            let ocultarFormEps = document.querySelector(item);
            ocultarFormEps.style.display = "none";
        });
        e.preventDefault();
    });
});