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



<!----------------------------- AÑADIR JUEGO ---------------------------------->
<div style="display:flex" >
    <div style="width:50%;height:100%">
    <form id="formulariousuarios" class="formulariousuarios" method="POST" action="insert" style="height:100%">
        <h1> Añadir Juego </h1>
        <label for="nombre">Nombre</label>
        <input id="nombre" name="nombre" type="text" placeholder="Ingrese nombre del juego" required>

        <label for="precio">precio</label>
        <input id="precio" name="precio" type="text" placeholder="Ingrese precio del juego" required>

        <label for="precio">Categorias</label>

        <select name="categoria" class="form-control">
            {foreach from=$categories item=categorie} 
                <option value="{$categorie->id}"> {$categorie->nombre} </option>
            {/foreach}
        </select>


        <label for="descripcion">Descripcion</label>
        <input id="descripcion" name="descripcion" type="text" placeholder="Ingrese Descripcion del juego" required>

        <label for="descripcion">Valoracion</label>
        <select name="valoracion" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        
        <button id="js-guardard" class="botoningreso">Agregar</button>
        
    </form>
    </div>



</div>


<!----------------------------- AÑADIR CATEGORIA ---------------------------------->
<div style="display:flex;heigt:100%">
    <div style="width:70%;height:100%">
        <form id="formulariousuarios" class="formulariousuarios" method="POST" action="insertcategorie" style="height:100%">
            
            <h1> Añadir Categoria </h1>

            <label for="categorie">nombre</label>
            <input id="categorie" name="categorie" type="text" placeholder="Ingrese nombre da la categoria" required>

            <label for="descripcion">Descripcion</label>
            <input id="descripcion" name="descripcion" type="text" placeholder="Ingrese descripcion" required>

            <button id="js-guardard" class="botoningreso">Agregar</button>

<!----------------------------- BORRAR CATEGORIA ---------------------------------->

            <h2 style="color:white"> Borrar categories </h2>
            <div class="categorieItem">
                    {foreach from=$categories  item=categorie}
                        <a href="confirmdeletecategorie/{$categorie->id}"  class='filtro'> {$categorie->nombre}🗑️</a>            
                    {/foreach}
            </div>
        </form>
    </div>


<!------------------------------- EDITAR CATEGORIA ---------------------------------->
    <div style="width:30%;height:100%">
        <form id="formulariousuarios" class="formulariousuarios" method="POST" action="editcategorie" style="height:100%">

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
    </div>
</div>



   
{include 'footer.tpl'}