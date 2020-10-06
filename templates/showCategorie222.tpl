     <!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tpe</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/icon.png" type="icon" />
</head>


{include 'header.tpl'}

    

    <div class="categorieItem">

        {foreach from=$categories  item=categorie}
            <a href="categories/{$categorie->nombre}"  class='filtro'> {$categorie->nombre} </a>
            
        {/foreach}

    </div>



    <div class="formulariousuarios">

        <!--nombre de la categoria-->
        
        <h1> {$CategorieSelected} <h1>
        

        <!--Descripcion de la categoria-->

     
        
        {foreach from=$categories item=categorie}
            {if $categorie->nombre eq $CategorieSelected}

            <p> {$categorie->descripcion} </p>
                
            {/if}
        {/foreach}

    </div>

        
    <article class="tablausuarios">
        <section>
        

            {include "templates/headerTable.tpl"}
                    
            {foreach from=$games item=game}

                {if $categorie->id eq $game->id_categoria}

                    {if $game->valoracion eq 5}
                        <tr class="logroHoras">
                    {else}
                        <tr>
                    {/if}
        
                    <!--// nombre-->
                    <td>
                    {$game->nombre}
                    </td>
        
                    <!--// precio-->
                    <td>
                    {$game->precio} $
                    </td>

                    
                    <!--// categoria id-->
                    <td>

                    {foreach from=$categories item=categorie}
                        {if $categorie->id eq $game->id_categoria}

                            <a href="categories/{$categorie->nombre}"  class='filtro'> {$categorie->nombre} </a>
                            
                        {/if}
                    {/foreach}

        
                    </td>
        
                    <!--// descripcion-->
                    <td>
                    {$game->descripcion}
                    </td>
        
                    <!--// valoracion-->
                    <td>
        
                    <!--//echo ($game->valoracion . "⭐");-->
        
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
        
                    </td>
        
                    <td>
                    <a href="delete/{$game->id}">🗑️</a>
                    </td>
        
        
                    </tr>

                {/if}
            {/foreach}

        </tbody>
            </table>
            </section>
        
        <section>
        

        
        <!--//incuimos el footer-->
        {include 'footer.tpl'}