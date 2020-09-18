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