<header>
    <a href="../indexProyectoDWES.php">
        <img class="imgprinc" src="webroot/css/img/flechaatras.png" alt="Atrás" title="Atrás"/>
    </a>
    <a href="../../../../index.html">
        <img class="imgprinc" id="casa" src="webroot/css/img/inicio.png" alt="Página Principal" title="Página Principal"/>
    </a>
    <h1 id="titulo">Login</h1>
</header>
<main>
    <form id="login" class="enter" name="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <div class="required">
            <label for="CodUsuario"><?php echo $aLang[$_COOKIE['idioma']]['user']; ?></label>
            <input class="required" type="text" id="CodUsuario" name="CodUsuario" placeholder="<?php echo $aLang[$_COOKIE['idioma']]['user']; ?>" value="<?php
            echo (isset($_REQUEST['CodUsuario'])) ? $_REQUEST['CodUsuario'] : null;
            ?>">
        </div>
        <div class="required">
            <label for="Password"><?php echo $aLang[$_COOKIE['idioma']]['password']; ?></label>
            <input class="required" type="password" id="Password" name="Password" value="<?php
            echo (isset($_REQUEST['Password'])) ? $_REQUEST['Password'] : null;
            ?>" placeholder="<?php echo $aLang[$_COOKIE['idioma']]['password']; ?>">
        </div>

        <div>
            <button class="button" type="submit" name="IniciarSesion"><?php echo $aLang[$_COOKIE['idioma']]['login']; ?></button>    
            <button class="button" type="submit" name="Registrarse"><?php echo $aLang[$_COOKIE['idioma']]['signup']; ?></button> 
        </div>

    </form>

    <form class="botones" name="formularioIdioma" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <button <?php echo ($_COOKIE['idioma'] == "es") ? "style='color: orangered;'" : null; ?> class="idioma " type="submit" name="idiomaElegido" value="es">Castellano</button>
        <button <?php echo ($_COOKIE['idioma'] == "en") ? "style='color: orangered;'" : null; ?> class="idioma" type="submit" name="idiomaElegido" value="en">English</button>
    </form>
</main>