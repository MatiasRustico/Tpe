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

        
        <article class="tablausuarios">
        <section>
        

       
        
        <div class="categorieItem">
        {foreach from=$categories  item=categorie}
            <a href="categories/{$categorie->nombre}"  class='filtro'> {$categorie->nombre} </a>
            
        {/foreach}
        </div>
       
       

        {include 'templates/headerTable.tpl'}
                    
        {foreach from=$games item=game}
            {if $game->valoracion eq 5 }
                <tr class="logroHoras">
            {else}
                <tr>
            {/if}

            <!--nombre-->
            <td>
            {$game->nombre}
            </td>

            <!--precio-->
            <td>
            {$game->precio } $
            </td>

            <!--categoria id-->
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
        {/foreach}

        </tbody>
        </table>
        </section>
        
        <section>
        
 
        {include 'templates/form.up.tpl'}

        <select name="categoria" class="form-control">
        
    
        {foreach from=$categories item=categorie} 
            <option value="{$categorie->id}"> {$categorie->nombre} </option>
        {/foreach}
        

        </select>
        
        {include "templates/form.down.tpl"}
        
        <!--incuimos el footer-->
        {include 'footer.tpl'}