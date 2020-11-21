"use strict"

document.addEventListener("DOMContentLoaded", e => {
    getComents();

    document.querySelector('#formulariocomentarios').addEventListener('submit', e => {
        e.preventDefault();
        addComent();

    });



});



async function getComents() {

    try {

        const response = await fetch('api/comentarios');

        const coments = await response.json();
        console.log("lo logramos");

        renderComents(coments);


    } catch (e) {
        console.log(e);
    }
}

async function addComent() {

    const coment = {
        id_usuario: 1,
        id_juego: 50,
        comentario: document.querySelector('input[name=comentario]').value,
        valoracion: document.querySelector('select[name=valoracion]').value
    }

    try {

        const response = await fetch('api/comentarios', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(coment)
        });



        const comentR = await response.json();
        console.log(comentR);

        getComents();

    } catch (e) {
        console.log(e);
    }
}

function renderComents(coments) {
    //agarro el listado del dom
    const listado = document.querySelector('#coments-list');

    //lo limpio
    listado.innerHTML = '';

    //imprimo
    for (let coment of coments) {

        //creo variable para ver la valoracion
        let valoracion = "";

        if (coment.valoracion = 1) {
            valoracion = "⭐";

        } else if (coment.valoracion = 2) {
            valoracion = "⭐⭐";

        } else if (coment.valoracion = 3) {
            valoracion = "⭐⭐⭐";

        } else if (coment.valoracion = 4) {
            valoracion = "⭐⭐⭐⭐";

        } else if (coment.valoracion = 5) {
            valoracion = "⭐⭐⭐⭐⭐";
        };

        //imprimo
        listado.innerHTML += `<li> ${coment.comentario} ${valoracion} </li>`

    }
}