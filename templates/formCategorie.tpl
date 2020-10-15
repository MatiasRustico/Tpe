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
