                    <!DOCTYPE html>
        <html lang="en">

        <head>
            <base href="{BASE_URL}">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Log in</title>
            <link rel="stylesheet" href="css/style.css">
            <link rel="icon" href="img/icon.png" type="icon" />
        </head>
        
        
        
        <article class="articulologin">
        <figure class="logo">
            <!--imagen / logo-->
            <img src="img/logo.png" alt="logo">
        </figure>
        
        <section>
            <form class="formulariologin" id="formulariologin" method="post" action="verify">
                <!--Nombre-->
                <label for="user">Nombre de usuario:</label>
                <input type="text" name="user" id="user" value="" placeholder="Minimo 5 caracteres" maxlength="20" required>

                <!--Contraseña-->
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" value="" placeholder="Minimo 5 caracteres" maxlength="20" required>

                {if $error}
                <div>
                    <h2 class="alert">{$error}</h2>
                </div>
                {/if}

                <!--Captcha-->
                <!--<label for="captcha">Verificacion:</label>
                <input class="introducircaptcha" type="text" id="introducircaptcha" placeholder="Ingrese el captcha" value="" required maxlength="5" />
                <label for="captcha">Captcha:</label>
                <div class="captchareload">
                    <input class="textcaptcha" type="text" id="textcaptcha" value="" readonly />
                    <button class="reload" id="reload">↻</button>
                </div>-->

                <button class="botonlogin" id="botoninicio">Log In</button>
                <a href="http://localhost/proyectos/tpe/home" class="botonlogin jsCartelera botonSFondo" id="botoninicio">Return Home</a>git 
            </form>
            
        </section>
        
    </article>
        