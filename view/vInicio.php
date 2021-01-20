<header>
    <h1 id="titulo">Inicio</h1>
</header>

<main class="respuesta">
    <article>
        <h2 class="bienvenida"><?php echo $aLang[$_COOKIE['idioma']]['welcome'] ?> </h2>
        <p><?php echo ($numConexiones >= 1) ? $aLang[$_COOKIE['idioma']]['numConnections'] : $aLang[$_COOKIE['idioma']]['numConnectionsWelcome']; ?></p>
        <?php echo ($ultimaConexion != null) ? "<p>" . $aLang[$_COOKIE['idioma']]['lastConnection'] . "</p>" : null; ?>
    </article>
    <form name="logout" class="botones" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <button class="logout" type="submit" name='cerrarSesion'><?php echo $aLang[$_COOKIE['idioma']]['logoff']; ?></button>
    </form>
</main>
</body>