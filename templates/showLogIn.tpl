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
                <!--<label for="captcha">Verificacion:</label>
                <input class="introducircaptcha" type="text" id="introducircaptcha" placeholder="Ingrese el captcha" value="" required maxlength="5" />
                <label for="captcha">Captcha:</label>
                <div class="captchareload">
                    <input class="textcaptcha" type="text" id="textcaptcha" value="" readonly />
                    <button class="reload" id="reload">↻</button>
                </div>-->
                <button class="botonlogin" id="botoninicio">Log In</button>
                <a href="http://localhost/proyectos/tpe/home" class="botonlogin jsCartelera botonSFondo" id="botoninicio">Return Home</a>
            </form>
        </section>
    </article>
        