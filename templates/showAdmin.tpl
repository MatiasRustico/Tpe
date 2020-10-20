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

    {include 'templates/form.up.tpl'}
            <select name="categoria" class="form-control">
                        {foreach from=$categories item=categorie} 
                            <option value="{$categorie->id}"> {$categorie->nombre} </option>
                        {/foreach}
            </select>
            {include "templates/form.down.tpl"}







            {include "templates/formGamesEdit.up.tpl"}
            <select name="categoria" class="form-control">
                        {foreach from=$categories item=categorie} 
                            <option value="{$categorie->id}"> {$categorie->nombre} </option>
                        {/foreach}
            </select>
            {include "templates/formGamesEdit.down.tpl"}


            {include "templates/formCategorie.tpl"}

            {include "templates/formCategorieEdit.tpl"}

   
{include 'footer.tpl'}