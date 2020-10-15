<form id="formulariousuarios" class="formulariousuarios" method="POST" action="editcategorie">

    <h1> Editar Categoria </h1>

    <label for="categorie">Selecciona</label>
    <select name="categorie_id" class="form-control">
        {foreach from=$categories item=categorie} 
               <option value="{$categorie->id}"> {$categorie->nombre} </option>
        {/foreach}
    </select>

    <label for="nombre">Categoria</label>
    <input id="nombre" name="nombre" type="text" placeholder="Ingrese nombre da la categoria" required>

    <label for="descripcion">Descripcion</label>
    <input id="descripcion" name="descripcion" type="text" placeholder="Ingrese descripcion" required>

    <button id="js-guardard" class="botoningreso">Editar</button>

</form>