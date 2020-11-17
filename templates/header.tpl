<header>
    <div class="principal" style="justify-content: space-around;">
        <figure>
            <img src="img/logo.png" alt="logo">
        </figure>
        <div class="frase">
            {if isset($smarty.session.USERNAME)}
                 
                    <h1>Bienvenido {$smarty.session.USERNAME} | ¡Encuentra los mejores videojuegos!</h1>
                   
            {else}
                <h1>¡Encuentra los mejores videojuegos!</h1>
            {/if}

            
        </div>

        {if isset($smarty.session.PERMIT)}
        <div>
            <a href="admin/" style="text-decoration=none;color:pink"> Panel de administracion </a>
        </div>
        {/if}

        <figure class="imagendesplegable">
            <!--cuando apretes aca el div "desplegable" va a aparecer y desaparecer -->
            <img src="img/burger.png" alt="burger">
        </figure>
    </div>
    <!--esto va a desaparecer y aparecer-->
    <div class="desplegable">
        <ul class="menu">
            <li>
            <a href="http://localhost/proyectos/tpe/home" class="jsCartelera botonSFondo">Home</a>
            </li>
            <li>
            <a href="http://localhost/proyectos/tpe/market" class="jsCartelera botonSFondo">Market</a>
            </li>
            <li>
            <a href="http://localhost/proyectos/tpe/games" class="jsCartelera botonSFondo">Games</a>
            </li>
            <li>
            {if isset($smarty.session.USERNAME)} 
                <a href="http://localhost/proyectos/tpe/logout" class="jsCartelera botonSFondo">Log out</a>
            {else}
                <a href="http://localhost/proyectos/tpe/login" class="jsCartelera botonSFondo">Log in</a>
            {/if}
            </li>

        </ul>
    </div>
</header>