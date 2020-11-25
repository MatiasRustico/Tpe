<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$game->nombre}</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/icon.png" type="icon" />

    <!--Vue-->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.12/handlebars.js"></script>
    
</head>


{include 'header.tpl'}
<div class="categorieItem">
        {foreach from=$categories item=cat}
            <a href="categories/{$cat->id}" class='filtro'>{$cat->nombre}</a>
        {/foreach}
</div>

<div class="formulariousuarios">
    <!--nombre de la categoria-->     
    <div id="fondoJuego" class="formulariologin" style="background-image: url({$game->imagen});background-position: center;background-repeat: no-repeat;background-size:cover;width:70%;border-radius:70px">
        <!--Nombre-->
        {if isset($smarty.session.PERMIT)}
            <form id="formulariousuarios" method="POST" action="edit/{$game->id}" enctype="multipart/form-data">
            <input id="nombre" name="nombre" type="text" value="{$game->nombre}" required>
            {else}  
                <div>
                    <h1 style="background-color:rgba(0, 0, 0, 0.5);border-radius:10px;height:50%" value="{$game->id}" id="juego" class=".miClase">🎮 {$game->nombre} 🎮</h1>
                    
                </div>                      
            {/if}

            {if isset($smarty.session.PERMIT)}
                <!--esta mala practica si que se puede ver-->
                <select name="valoracion" class="form-control">

                    {if  $game->valoracion eq 1}
                        <option value="1" selected>⭐</option>
                    {else}
                        <option value="1">⭐</option>
                    {/if}
                    {if  $game->valoracion eq 2}
                        <option value="2" selected>⭐⭐</option>
                    {else}
                        <option value="2">⭐⭐</option>
                    {/if}
                    {if  $game->valoracion eq 3}
                        <option value="3" selected>⭐⭐⭐</option>
                    {else}
                        <option value="3">⭐⭐⭐</option>
                    {/if}
                    {if  $game->valoracion eq 4}
                        <option value="4" selected>⭐⭐⭐⭐</option>
                    {else}
                        <option value="4">⭐⭐⭐⭐</option>
                    {/if}
                    {if  $game->valoracion eq 5}
                        <option value="5" selected>⭐⭐⭐⭐⭐</option>
                    {else}
                        <option value="5">⭐⭐⭐⭐⭐</option>
                    {/if}

                </select>                        
            {else}  
                {if  $game->valoracion eq 1}
                    ⭐
                {else if $game->valoracion eq 2}
                    ⭐⭐
                {else if $game->valoracion eq 3}
                    ⭐⭐⭐
                {else if ($game->valoracion eq 4)}
                    ⭐⭐⭐⭐
                {else if $game->valoracion eq 5}
                    ⭐⭐⭐⭐⭐
                {/if}
            {/if}


            <div class="menu" style="alig-items:center">
                <!--Categoria-->
                {if isset($smarty.session.PERMIT)}
                    <h3 style="color:white;padding:5px"> Categoria :
                        <select name="categoria" style="color:white;width:150px;height:30px;border: 1px dotted #000099;background-color:rgba(0, 0, 0, 0.5)">
                            {foreach from=$categories item=categorie} 
                                {if  $game->id_categoria eq $categorie->id}
                                    <option value="{$categorie->id}" selected> {$categorie->nombre} </option>
                                {else}
                                    <option value="{$categorie->id}"> {$categorie->nombre} </option>
                                {/if}
                            {/foreach}
                        </select>
                    </h3>
                {else}    
                    <h2 style="color:white"> Categoria : {$categorie->nombre} </h2>
                {/if}


                <!--precio-->
                {if isset($smarty.session.PERMIT)}
                    
                    <h3 style="color:white;padding:5px">Precio :
                        <input id="precio" name="precio" type="text" value="{$game->precio}" required>
                    </h3>
                {else}  
                    <h2 style="color:white"> Precio : ${$game->precio} </h2>                     
                {/if}
                                
            </div>


            <div>
                <!--Descripcion de la categoria-->
                {if isset($smarty.session.PERMIT)}
                    <h3 style="color:white"> Descripcion : 
                        <textarea id="descripcion" name="descripcion" type="text" style="color:white;width:300px;height:80px;border: 1px dotted #000099;background-color:rgba(0, 0, 0, 0.5)"  required>{$game->descripcion}</textarea>
                    </h3>  
                        
                    



                
                {else}  
                    <div>
                        <p style="width:700px"> {$game->descripcion} </p>
                    </div>                      
                {/if}  


                <!--Imagen-->

                {if isset($smarty.session.PERMIT)}
                
             
                    <div>
                        <h3 style="color:white"> Imagen : </h3>
                        <input type="file" name="input_name" id="imagen" name="imagen">
                        <!--<a href="removeimage/{$game->id}" class="botoningreso" style="margin:20px;color:black;text-decoration:none;font-size:15px;padding:3px 105px">Eliminar Imagen</a>-->
                    
                        <div>
                            <label class="botoningreso" style="margin:20px;color:black;text-decoration:none;font-size:15px;padding:3px 10px">Escriba "borrar" para confirmar eliminado de imagen</label>
                            <input id="removeimage" name="removeimage" type="text">
                        </div>
                    </div>
                    


                    <button  class="botoningreso">Editar</button>
                    <h3 style="color:white">
                    <a href="delete/{$game->id}" class="botoningreso" style="margin:20px;color:black;text-decoration:none;font-size:15px;padding:3px 105px">Eliminar</a>
                    </h3>
                    
                {/if}
                </form>
            </div>  
        <!--fin del if-->                   
    </div>
</div>

{if isset($smarty.session.USERNAME) && !isset($smart.session.PERMIT)}
    <div style="display:flex" >
        <div style="width:50%;height:100%">
            <form id="formulariocomentarios" class="formulariousuarios" method="POST" style="height:100%" enctype="multipart/form-data">
                <h2 id="ingresardatos" > Añadir Comentario </h2>

                <label for="comentario">Comentario</label>
                <input style="width:300px" id="comentario" name="comentario" type="text" placeholder="Ingrese su comentario del juego" required>

                <label for="valoracion">Valoracion</label>
                <select name="valoracion" id="valoracion" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <button type="submit" class="botoningreso">Añadir comentario</button>
                
            </form>
        </div>
{/if}


</div>

<div>
    <div id="coments-list" class="Comentarios">
    {if isset($smarty.session.PERMIT)}

        {include file="vue/admin-coment-list.vue"}
    {else}

        {include file="vue/normal-coment-list.vue"}
    {/if}
    </div>
</div>





{include 'footer.tpl'}