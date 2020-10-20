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
                    <div class="formulariologin" style="background-color:rgba(250, 0, 250, 0.466);width:70%;border-radius:70px">
                        

                        <div>
                            <h1 style="background-color:rgba(0, 0, 0, 0.47);border-radius:10px;height:50%">🎮 {$game->nombre} 🎮<h1>
                        </div>                        

                        <div class="menu">
                            {foreach from=$categories item=categorie}

                                {if $categorie->id eq $game->id_categoria}
                                    <h2 style="color:white"> Categoria : {$categorie->nombre} </h2>
                                {/if}
                            
                            {/foreach}

                            <h2 style="color:white"> Precio : ${$game->precio} </h2>
                        </div>

                        <div>
                            <p style="width:700px"> {$game->descripcion} </p>
                        </div>  
                        
                    </div>

                {/if}

                
                
                
            {/foreach}
        

        

        


        
        

        <!--Descripcion de la categoria-->


        

    </div>

{include 'footer.tpl'}