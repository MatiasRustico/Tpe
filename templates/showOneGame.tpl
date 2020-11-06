<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/icon.png" type="icon" />
</head>


{include 'header.tpl'}

    

    <div class="categorieItem">

        {foreach from=$categories item=categorie}
            <a href="categories/{$categorie->nombre}" class='filtro'>{$categorie->nombre}</a>
            
        {/foreach}

    </div>




    <div class="formulariousuarios">

        <!--nombre de la categoria-->
        
            
            {foreach from=$games item=game}
                {if $game->id eq $id}
                    
                    


                       
                    
                        

                        <div class="formulariologin" style="background-image: url({$game->imagen});background-position: center;background-repeat: no-repeat;background-size:cover;width:70%;border-radius:70px">
                            <!--Nombre-->
                            {if isset($smarty.session.USERNAME)}
                                <form id="formulariousuarios" method="POST" action="edit/{$game->id}">
                                <input id="nombre" name="nombre" type="text" value="{$game->nombre}" required>
                            {else}  
                                <div>
                                    <h1 style="background-color:rgba(0, 0, 0, 0.5);border-radius:10px;height:50%">🎮 {$game->nombre} 🎮<h1>
                                </div>                      
                            {/if}

                            {if isset($smarty.session.USERNAME)}

                                <select name="valoracion" class="form-control">
                                    {if  $game->valoracion eq 1}
                                        <option value="1" selected>⭐</option>
                                        <option value="2">⭐⭐</option>
                                        <option value="3">⭐⭐⭐</option>
                                        <option value="4">⭐⭐⭐⭐</option>
                                        <option value="5">⭐⭐⭐⭐⭐</option>
                                    {else if $game->valoracion eq 2}
                                        <option value="1">⭐</option>
                                        <option value="2" selected>⭐⭐</option>
                                        <option value="3">⭐⭐⭐</option>
                                        <option value="4">⭐⭐⭐⭐</option>
                                        <option value="5">⭐⭐⭐⭐⭐</option>
                                    {else if $game->valoracion eq 3}
                                        <option value="1">⭐</option>
                                        <option value="2">⭐⭐</option>
                                        <option value="3" selected>⭐⭐⭐</option>
                                        <option value="4">⭐⭐⭐⭐</option>
                                        <option value="5">⭐⭐⭐⭐⭐</option>
                                    {else if ($game->valoracion eq 4)}
                                        <option value="1">⭐</option>
                                        <option value="2">⭐⭐</option>
                                        <option value="3">⭐⭐⭐</option>
                                        <option value="4" selected>⭐⭐⭐⭐</option>
                                        <option value="5">⭐⭐⭐⭐⭐</option>
                                    {else if $game->valoracion eq 5}
                                        <option value="1">⭐</option>
                                        <option value="2">⭐⭐</option>
                                        <option value="3">⭐⭐⭐</option>
                                        <option value="4">⭐⭐⭐⭐</option>
                                        <option value="5" selected>⭐⭐⭐⭐⭐</option>
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
                                    {if isset($smarty.session.USERNAME)}
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
                                        {foreach from=$categories item=categorie} 
                                            {if $categorie->id eq $game->id_categoria}
                                                
                                                <h2 style="color:white;text-shadow: -2px -2px 1px #000, 2px 2px 1px #000, -2px 2px 1px #000, 2px -2px 1px #000;"> Categoria : {$categorie->nombre} </h2>

                                            {/if}    
                                        {/foreach}                  
                                    {/if}

                                


                                <!--precio-->
                                {if isset($smarty.session.USERNAME)}
                                    
                                    <h3 style="color:white;padding:5px">Precio :
                                        <input id="precio" name="precio" type="text" value="{$game->precio}" required>
                                    </h3>
                                {else}  
                                    <h2 style="color:white"> Precio : ${$game->precio} </h2>                     
                                {/if}
                                
                            </div>


                            <div>
                            <!--Descripcion de la categoria-->
                            {if isset($smarty.session.USERNAME)}
                                
                                <h3 style="color:white"> Descripcion : 
                                    <textarea id="descripcion" name="descripcion" type="text" style="color:white;width:300px;height:80px;border: 1px dotted #000099;background-color:rgba(0, 0, 0, 0.5)"  required>{$game->descripcion}</textarea>
                                    
                                    
                                </h3>  
                                    <button id="js-guardard" class="botoningreso">Editar</button>
                                <h3 style="color:white">
                                <a href="confirmdelete/{$game->id}" class="botoningreso" style="margin:20px;color:black;text-decoration:none;font-size:15px;padding:3px 105px">Eliminar</a>
                                </h3>
                                </form>
                            
                        
                            {else}  
                                <div>
                                    <p style="width:700px"> {$game->descripcion} </p>
                                </div>                      
                            {/if}

                                
                            </div>  
                            

                        </div>
                    
          

                {/if}

                
                
                
            {/foreach}        

    </div>

{include 'footer.tpl'}