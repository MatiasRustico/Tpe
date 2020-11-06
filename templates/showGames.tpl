     <!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/icon.png" type="icon" />
</head>


{include 'header.tpl'}

        
    <article class="tablausuarios">
        <section>
        
            <div class="categorieItem">
                {foreach from=$categories  item=categorie}
                    <a href="categories/{$categorie->id}"  class='filtro'> {$categorie->nombre} </a>
                
                {/foreach}
            </div>
    
    

            {include 'templates/headerTable.tpl'}
            <!--abre table-->
                <!--abre tbody-->   
                    {foreach from=$games item=game}
                        {if $game->valoracion eq 5 }
                            <tr class="logroHoras" style="height:30px">
                            
                        {else}
                            <tr style="height:30px">
                        {/if}

                        <!--nombre-->

                        {if $game->valoracion eq 5 }
                            <td>
                                <a href="game/{$game->id}" style="color:black;text-decoration: underline wavy rgba(0, 0, 0, 0.5);">{$game->nombre}</a>
                            </td>
                        {else}
                            <td>
                                <a href="game/{$game->id}" style="color:white;text-decoration: underline wavy rgba(125, 125, 125, 0.5);">{$game->nombre}</a>
                            </td>
                        {/if}

                        <!--precio-->
                        <td>
                        {$game->precio } $
                    
                        </td>

                        <!--categoria id-->
                        <td>
                            {foreach from=$categories item=categorie}
                                {if $categorie->id eq $game->id_categoria}

                                    <a href="categories/{$categorie->id}"  class='filtro'> {$categorie->nombre} </a>
                                    
                                {/if}
                            {/foreach}
                        </td>


                        <!--// descripcion-->
                        <td>
                            {if $game->descripcion|count_characters gt 90}
                                {$game->descripcion|truncate:90}  
                                
                                {foreach from=$categories item=categorie}
                                    {if $categorie->id eq $game->id_categoria}

                                        <a href="game/{$game->id}" style="color:white;text-decoration:none">Leer más...</a>
                                        
                                    {/if}
                                {/foreach}

                            {else}
                                {$game->descripcion}
                            {/if}
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


                        {if isset($smarty.session.USERNAME)} 
                            <td>
                                <a href="game/{$game->id}" style="text-decoration:none">✏️</a>
                            </td>

                            <td>
                                <a href="confirmdelete/{$game->id}" style="text-decoration:none">🗑️</a>
                            </td>
                        {/if}
                        </tr>
                    {/foreach}

                </tbody>
            </table>
        </section>
        
        <section>
    </article>   
<!--incuimos el footer-->
{include 'footer.tpl'}