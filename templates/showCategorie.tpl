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
        {foreach from=$categories item=cat}

            <a href="categories/{$cat->id}" class='filtro'>{$cat->nombre}</a>
            
        {/foreach}
    </div>

    <div class="formulariousuarios">

        <!--nombre de la categoria-->
        
        <h1 > {$categorie->nombre} <h1>
        
        <!--Descripcion de la categoria-->

        <p> {$categorie->descripcion} </p>

    </div>

    <article class="tablausuarios">
        <section>   


            {include "templates/headerTable.tpl"}

                    {foreach from=$games item=game}



                        {if $game->valoracion eq 5 }
                            <tr class="logroHoras" style="height:30px">
                        {else}
                            <tr style="height:30px">
                        {/if}

                        <!--// nombre-->
                        {if $game->valoracion eq 5 }
                            <td>
                                <a href="game/{$game->id}" style="color:black;text-decoration: underline wavy rgba(0, 0, 0, 0.5);">{$game->nombre}</a>

                            </td>
                        {else}
                            <td>
                                <a href="game/{$game->id}" style="color:white;text-decoration: underline wavy rgba(125, 125, 125, 0.5);">{$game->nombre}</a>

                            </td>
                        {/if}

                        <!--// precio-->
                        <td>
                            {$game->precio} $
                        </td>


                        <!--// categoria id-->
                        <td>

                            {$categorie->nombre} 

                        </td>

                        <!--// descripcion-->
                        <td>

                            {if $game->descripcion|count_characters gt 140}
                                {$game->descripcion|truncate:140}  

                                    <a href="game/{$game->id}" style="color:white;text-decoration:none">Leer más...</a>

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

<!--//incuimos el footer-->
{include 'footer.tpl'}