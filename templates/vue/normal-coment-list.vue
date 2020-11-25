{literal}

<section id="app">
    <div v-for="coment in comentarios" class="listaComentarios">

        <div>
            {{coment.valoracion}}
        </div>

        El usuario "{{coment.id_usuario}}" comento :

        <span class="span"> {{coment.comentario}} </span>


    </div>
</section>

{/literal}