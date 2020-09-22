<form id="formulariousuarios" class="formulariousuarios" method="POST" action="insert">
    <p>--developers only--</p>
    <label for="nombre">Nombre</label>
    <input id="nombre" name="nombre" type="text" placeholder="Ingrese nombre del juego" required>

    <label for="precio">precio</label>
    <input id="precio" name="precio" type="text" placeholder="Ingrese precio del juego" required>

    <label for="categoria">categoria</label>
    <input id="categoria" name="categoria" type="number" placeholder="Ingrese categoria del juego" required>

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