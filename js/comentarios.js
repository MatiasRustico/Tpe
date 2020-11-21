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

async function addComent(){

    const coment = 

    {
    id_usuario:8,
    id_juego: 121,
    comentario: "Alta juegazo pa",
    valoracion: 4
    }

    try{

        const response = await fetch('api/comentarios' , {
            method: 'POST',
            headers: {'Content-Type': 'application/json'}, 
            body: JSON.stringify(coment)
        });



        //const t = await response.json();


        //const r = response.json();
        getComents();
    
    } catch(e){
        console.log(e);
    }
}

function renderComents(coments) {
    const listado = document.querySelector('#coments-list');
    listado.innerHTML = '';

    for (let coment of coments) {
        listado.innerHTML += `<li> ${coment.comentario} </li>`;
    }
}