<?php

class GamesView {

    function showHome() {

        //incluimos el header
        include_once 'templates/header.php';

        echo ('        
        <article class="cartelera">
        <section class="ultimolanzamiento">
            <div class="informacion">
                <h2>Tom Clancys Rainbow Six: Siege</h2>
                <p> Tom Clancys Rainbow Six: Siege es un videojuego de disparos en primera persona táctico multijugador de 5 vs 5 en el cual hay 3 modos de juego, "Desactivar la bomba", "Capturar el objetivo" y "Protección del rehén".</p>
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
}