<?php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/icon.png" type="icon" />
</head>

<body>
    <header>
        <div class="principal">
            <figure>
                <img src="img/logo.png" alt="logo">
            </figure>
            <div class="frase">
                <h1>¡Encuentra los mejores videojuegos!</h1>
            </div>
            <figure class="imagendesplegable">
                <!--cuando apretes aca el div "desplegable" va a aparecer y desaparecer -->
                <img src="img/burger.png" alt="burger">
            </figure>
        </div>
        <!--esto va a desaparecer y aparecer-->
        <div class="desplegable">
            <ul class="menu">
                <li>
                    <a href="index.html">Inicio</a>
                </li>
                <li>
                    <button class="jsCartelera botonSFondo">Cartelera</button>
                </li>
                <li>
                    <button class="jsTienda botonSFondo">Tienda</button>
                </li>
                <li>
                    <button class="jsUsuarios botonSFondo">Usuarios</button>
                </li>
            </ul>
        </div>
    </header>