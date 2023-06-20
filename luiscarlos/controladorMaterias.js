/* ACA IMPORTO CADA api referente a mis vistas */
import '../view/stack_tecnologico/regStack.js';
import '../view/unidad_tematica2/regUnidadTematica.js';
import '../view/capitulo/regCapitulo.js';

/* Mostrar divs dinamicamente */
console.log(document.querySelector("#contenidoCapitulo"));
document.querySelectorAll('.menuMaterias').forEach(link =>{

    link.addEventListener('click',(e)=>{
     
        let data = JSON.parse(e.target.dataset.ocultarmostrar);
        console.log(data)
        let  divMostrar = document.querySelector(data[0]);
        divMostrar.style.display ="block";
        console.log(divMostrar);
        data[1].forEach(div =>{
            
            let divOcultar = document.querySelector(div);
            console.log(divOcultar);
            divOcultar.style.display ="none";
        })
        e.preventDefault();
        


    })

})