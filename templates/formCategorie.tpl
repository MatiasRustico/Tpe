<form id="formulariousuarios" class="formulariousuarios" method="POST" action="insertcategorie">

    <h1> Añadir Categoria </h1>

    <label for="categorie">nombre</label>
    <input id="categorie" name="categorie" type="text" placeholder="Ingrese nombre da la categoria" required>

    <label for="descripcion">Descripcion</label>
    <input id="descripcion" name="descripcion" type="text" placeholder="Ingrese descripcion" required>

    <button id="js-guardard" class="botoningreso">Agregar</button>
    <h2> All categories </h2>
    <div class="categorieItem">
        {foreach from=$categories  item=categorie}
            <a href="deletecategorie/{$categorie->id}"  class='filtro'> {$categorie->nombre}🗑️</a>            
        {/foreach}
    </div>
</form>


    <!--{include 'templates/form.up.tpl'}


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

            {include "templates/formCategorieEdit.tpl"}-->