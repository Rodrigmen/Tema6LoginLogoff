<header>
    <h1 id="titulo"><?php echo $aLang[$_COOKIE['idioma']]['deleteAccount']; ?></h1>
</header>
<main>
    <form class="enter" name="edit" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <!-----------------CÓDIGO----------------->
        <div class="required">
            <label for="CodUsuario"><?php echo $aLang[$_COOKIE['idioma']]['user']; ?></label>
            <input type="text" id="CodUsuario" name="CodUsuario" class="lectura" value="<?php echo $CodUser ?>" readonly>
        </div>

        <!-----------------DESCRIPCIÓN----------------->
        <div class="required">
            <label for="DescUsuario"><?php echo $aLang[$_COOKIE['idioma']]['description']; ?></label>
            <input type="text" id="DescUsuario" name="DescUsuario"  value="<?php echo $DescUser ?>" readonly/>
        </div>
        <!-----------------PERFIL----------------->
        <div class="required">
            <label for="Perfil"><?php echo $aLang[$_COOKIE['idioma']]['profile']; ?></label>
            <input type="text" id="Perfil" name="Perfil"  class="lectura"value="<?php echo $Profile ?>" readonly/>
        </div>

        <!-----------------NÚMERO DE CONEXIONES----------------->
        <div class="required">
            <label for="Conexiones"><?php echo $aLang[$_COOKIE['idioma']]['NumConex']; ?></label>
            <input type="number" id="Conexiones" name="Conexiones" value="<?php echo $ConexNumber ?>" readonly/>
        </div>

        <!-----------------ÛLTIMA FECHA DE CONEXION----------------->
        <div class="required">
            <label for="Ultima"><?php echo $aLang[$_COOKIE['idioma']]['DateLastConex']; ?></label>
            <input type="datetime" id="Ultima" name="Ultima" value="<?php echo $LastDateConex ?>" readonly/>
        </div>

        <div>
            <button class="button" type="submit" name="Aceptar"><?php echo $aLang[$_COOKIE['idioma']]['accept']; ?></button>    
            <button class="button" type="submit" name="Cancelar"><?php echo $aLang[$_COOKIE['idioma']]['cancel']; ?></button> 
        </div>

    </form>
</main>