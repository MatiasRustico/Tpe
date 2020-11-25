{literal}

<section id="admin">
    <div v-for="coment in comentarios" class="listaComentarios">

        <div>
            {{coment.valoracion}}
        </div>

        El usuario "{{coment.id_usuario}}" comento :

        <span class="span"> {{coment.comentario}} </span>

        <button v-on:click=eliminar(coment.id)>🗑️</button>

    </div>
</section>

{/literal}