<form id="formulariousuarios" class="formulariousuarios" method="POST" action="edit">
    <h1> Editar Juego </h1>
    <label for="nombre">Selecciona el juego</label>
    <select name="game_id" class="form-control">            
                    
        {foreach from=$games item=game} 
            <option value="{$game->id}"> {$game->nombre} </option>
        {/foreach}
                    
    </select>

    <label for="nombre">Nombre</label>
    <input id="nombre" name="nombre" type="text" placeholder="Ingrese nombre del juego" required>

    <label for="precio">precio</label>
    <input id="precio" name="precio" type="text" placeholder="Ingrese precio del juego" required>

    <label for="precio">Categorias</label>