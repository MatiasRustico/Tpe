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
    <form id="formulariousuarios" class="formulariousuarios" method="POST" action="insert" style="height:100%" enctype="multipart/form-data">
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

        <label for="valoracion">Valoracion</label>
        <select name="valoracion" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <label> Imagebn</label>
        <input type="file" name="input_name" id="imageToUpload">
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
                        <a href="deletecategorie/{$categorie->id}"  class='filtro'> {$categorie->nombre}🗑️</a>            
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

<!----------------------------- PERMISOS USUARIO ---------------------------------->
    <div>
        <table id="tabla" style="width:600px">
            <thead>
                <th>
                    Nombre
                </th>
                <th>
                    Email
                </th>
                <th style="width:100px">
                    Admin
                </th> 
                <th style="width:60px">
                    Eliminar
                </th>
                                                 
     
                
            </thead>
            <tbody id="ingresardatos">
            
                {foreach $users as $user}
                    <tr>
                        <td>
                            {$user->user}
                        </td>

                        <td>
                            {$user->email}
                        </td>

                        <td>
                            {if {$user->permisos} eq 1}
                                <form method="POST" action="addpermit/{$user->id}">
                                    <div>
                                        <input type="checkbox" name="permit" id="permit" checked>
                                        <button id="js-guardard" class="botoningreso">Enviar</button>
                                    </div>
                                </form>
                            {else}
                                <form  method="POST" action="addpermit/{$user->id}">
                                    <div>
                                        <input type="checkbox" name="permit" id="permit">
                                        <button id="js-guardard" class="botoningreso">Enviar</button>
                                    </div>
                                
                                </form>
                            {/if}

                            
                        </td>
                        <td>
                        <a href="deleteuser/{$user->id}" style="text-decoration:none">🗑️</a> 
                        </td>
                    </tr>
                    
                {/foreach}

            </tbody>
        </table>
    </div>
    

   
{include 'footer.tpl'}