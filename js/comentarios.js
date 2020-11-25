"use strict"

const app = new Vue({
    el: "#app",
    data: {
        comentarios: [], //assing 
    },
});

const admin = new Vue({
    el: "#admin",
    data: {
        comentarios: [], //assing 
    },
    methods: {
        eliminar: function(id) {

            deleteComent(id)
        }
    }
});

async function deleteComent(id) {

    console.log(id);


    const comentarios = await fetch('api/comentarios/' + id, {
        'method': 'DELETE'
    });

    getComents();

}


document.addEventListener("DOMContentLoaded", e => {
    getComents();

    let form = document.querySelector('#formulariocomentarios');
    if (form != null) {
        form.addEventListener('submit', e => {
            e.preventDefault();
            addComent();
        });
    }



    //no darle importancia (web1)
    let botondeultimolanzamiento = document.querySelector("#botondeultimolanzamiento");
    if (botondeultimolanzamiento != null) {
        botondeultimolanzamiento.addEventListener("click", function(event) {
            event.preventDefault();
        });
    }


});








async function getComents() {

    //agarro la id del juego que esta ultima en la URL
    let id_juego = window.location.pathname.substr(window.location.pathname.lastIndexOf('/') + 1);

    try {

        //vamos a buscar los comentarios de ese juego en especifico
        const comentarios = await fetch('api/comentarios/' + id_juego);
        const coments = await comentarios.json();

        //vamos a buscar los usuarios
        const usuarios = await fetch('api/usuarios');
        const users = await usuarios.json();


        for (let coment of coments) {

            for (let usuario of users) {
                if (usuario.id == coment.id_usuario) {
                    coment.id_usuario = usuario.user;
                }
            }

            if (coment.valoracion == 1) {
                coment.valoracion = "⭐";

            } else if (coment.valoracion == 2) {
                coment.valoracion = "⭐⭐";

            } else if (coment.valoracion == 3) {
                coment.valoracion = "⭐⭐⭐";

            } else if (coment.valoracion == 4) {
                coment.valoracion = "⭐⭐⭐⭐";

            } else {
                coment.valoracion = "⭐⭐⭐⭐⭐";
            };
        }

        app.comentarios = coments;
        admin.comentarios = coments;

    } catch (e) {
        console.log(e);
    }
}





async function addComent() {

    const coment = {
        idjuego: window.location.pathname.substr(window.location.pathname.lastIndexOf('/') + 1),
        comentario: document.querySelector('input[name=comentario]').value,
        valoracion: document.querySelector('select[name=valoracion]').value
    }


    if (comentario.value != '') {
        try {

            const response = await fetch('api/comentarios', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(coment)
            });


            const c = await response.json();
            console.log(c);

            //app.comentarios.push(c);

            getComents();

        } catch (e) {
            console.log(e);
        }
    } else {
        alert("flaco completa todo");
    }
}