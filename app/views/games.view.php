<?php

class GamesView {

    function showHome() {

        //incluimos el header
        include_once 'templates/header.php';

        echo ('        
        <article class="cartelera">
        <section class="ultimolanzamiento">
            <div class="informacion">
                <h2>Tom Clancy Rainbow Six: Siege</h2>
                <p> Tom Clancy Rainbow Six: Siege es un videojuego de disparos en primera persona táctico multijugador de 5 vs 5 en el cual hay 3 modos de juego, "Desactivar la bomba", "Capturar el objetivo" y "Protección del rehén".</p>
                <button class="botondeultimolanzamiento" id="botondeultimolanzamiento">JUGAR</button>
                <p class="descuento">65% OFF</p>
            </div>
        </section>
        <h1 class="tituloofertas">¡ OFERTAS DE TIEMPO LIMITADO !</h1>
        <section class="post">

            <div class="juegoscondescuento" id="crash">
                <a href="https://gamefabrique.com/games/crash-bandicoot-2/">70% Off</a>
            </div>
            <div class="juegoscondescuento" id="csgo">
                <a href="https://store.steampowered.com/app/730/CounterStrike_Global_Offensive/">FREE</a>
            </div>
            <div class="juegoscondescuento" id="aoe">
                <a href="https://store.steampowered.com/app/813780/Age_of_Empires_II_Definitive_Edition//">25% Off</a>
            </div>
            <div class="juegoscondescuento" id="gow">
                <a href="https://www.hobbyconsolas.com/videojuegos/god-war-ii">10% Off</a>
            </div>
        </section>
        </article>
        ');


        //incuimos el footer
        include_once 'templates/footer.php';
    }

    function showMarket() {

        //incluimos el header
        include_once 'templates/header.php';

        echo ('
            <article class="tienda">
                <section class="container">
                    <div class="caja a"><a href="https://gamefabrique.com/games/crash-bandicoot-2/">Age of Empires</a></div>
                    <div class="caja b"><a href="https://gamefabrique.com/games/crash-bandicoot-2/">CS:GO</a></div>
                    <div class="caja c"><a href="https://gamefabrique.com/games/crash-bandicoot-2/">Cities Skylines</a></div>
                    <div class="caja d"><a href="https://gamefabrique.com/games/crash-bandicoot-2/">Crash</a></div>
                    <div class="caja e"><a href="https://gamefabrique.com/games/crash-bandicoot-2/">Valorant</a></div>
                    <div class="caja f"><a href="https://gamefabrique.com/games/crash-bandicoot-2/">God of War II</a></div>
                    <div class="caja g"><a href="https://gamefabrique.com/games/crash-bandicoot-2/">Terraria</a></div>
                    <div class="caja h"><a href="https://gamefabrique.com/games/crash-bandicoot-2/">Borderlands</a></div>
                </section>
            </article> 
        ');


        //incuimos el footer
        include_once 'templates/footer.php';
    }

    function showGames($games) {

        //incluimos el header
        include_once 'templates/header.php';

        echo ('
        <article class="tablausuarios">
        <section>

            <table id="tabla">
                <thead>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Precio
                    </th>
                    <th>
                        Categoria
                    </th>
                    <th>
                        Descripcion
                    </th>
                    <th>
                        Valoracion
                    </th>
                    <th>
                        -Borrar-
                    </th>
                    <th>
                        -Editar-
                    </th>
    
                </thead>
                <tbody id="ingresardatos">');
                    

        foreach ($games as $game){
            echo ('<tr>');

            // nombre
            echo ('<td>');
            echo ($game->nombre);
            echo ('</td>');

            // precio
            echo ('<td>');
            echo ($game->precio);
            echo ('</td>');

            // categoria id
            echo ('<td>');
            echo ($game->id_categoria);
            echo ('</td>');

            // descripcion
            echo ('<td>');
            echo ($game->descripcion);
            echo ('</td>');

            // valoracion
            echo ('<td>');
            echo ($game->valoracion);
            echo ('</td>');
            echo ('</tr>');
        }

        echo(' </tbody>
            </table>
            </section>
        
            <section>
        
                <form id="formulariousuarios" class="formulariousuarios">
                    <p>--developers only--</p>
                    <label for="nombre">Nombre</label>
                    <input id="nombre" name="nombre" type="text" placeholder="Ingrese nombre del usuario" required>
        
                    <label for="usuario">Nombre de Usuario</label>
                    <input id="usuario" name="usuario" type="text" placeholder="Ingrese nametag del usuario" required>
        
                    <label for="juego">Juego Favorito</label>
                    <input id="juego" name="juego" type="text" placeholder="Ingrese juego del usuario" required>
        
                    <label for="horas">Horas jugadas</label>
                    <input id="horas" name="horas" type="number" placeholder="Ingrese horas del usuario" required>
                    <p>si tiene mas de 1000 horas se destacara</p>
                    <div id="respuesta"></div>
                    <button id="js-guardard" class="botoningreso">Agregar Usuario nuevo</button>
                    <button id="borrarusuarios" class="botoningreso">Borrar</button>
                    <button id="agregarx3" class="botoningreso">Agregar x3</button>
                </form>
            </section>
            <section class="informacionadicional">
                <ul>
                    <li>Los usuarios tienen un registro en la base de datos</li>
                    <li>los usuarios no pueden modificar la tabla</li>
                    <li>Solo los desarrolladores pueden modificar la tabla</li>
                </ul>
            </section>
        
        </article>
        ');


        //incuimos el footer
        include_once 'templates/footer.php';
    }

    function showLogIn() {

              echo ('       
        
        <link rel="stylesheet" href="css/style.css">
        <article class="articulologin">
        <figure class="logo">
            <!--imagen / logo-->
            <img src="img/logo.png" alt="logo">
        </figure>
        <section>
            <form class="formulariologin" id="formulariologin" method="post">
                <!--Nombre-->
                <label for="nombredeusuario">Nombre de usuario:</label>
                <input type="text" name="nombredeusuario" id="nombredeusuario" value="" placeholder="Minimo 5 caracteres" maxlength="20" required>
                <!--Contraseña-->
                <label for="contrasena">Contraseña:</label>
                <input type="password" name="contrasena" id="contrasena" value="" placeholder="Minimo 5 caracteres" maxlength="20" required>

                <!--Captcha-->
                <label for="captcha">Verificacion:</label>
                <input class="introducircaptcha" type="text" id="introducircaptcha" placeholder="Ingrese el captcha" value="" required maxlength="5" />
                <label for="captcha">Captcha:</label>
                <div class="captchareload">
                    <input class="textcaptcha" type="text" id="textcaptcha" value="" readonly />
                    <button class="reload" id="reload">↻</button>
                </div>
                <button class="botonlogin" id="botoninicio">Log In</button>
                <a href="http://localhost/proyectos/tpe/home" class="botonlogin jsCartelera botonSFondo" id="botoninicio">Return Home</a>
            </form>
        </section>
    </article>
        ');
    }
}