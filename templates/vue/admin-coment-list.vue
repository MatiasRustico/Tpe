{literal}

<section id="admin">
    <div v-for="coment in comentarios" class="listaComentarios" style="width:100%;height:100%;">

        <div>
            {{coment.valoracion}}
        </div>

        El usuario "{{coment.id_usuario}}" comento :

        <span class="span"> {{coment.comentario}} </span>

        <div>
            
        <button v-on:click=eliminar(coment.id) class="botoningreso" style="width:300px">🗑️</button>

        </div>
    </div>
</section>

{/literal}