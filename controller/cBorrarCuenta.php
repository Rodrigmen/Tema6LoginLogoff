<?php
$usuarioActual = $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'];
$CodUser = $usuarioActual->getCodUsuario();
$DescUser = $usuarioActual->getDescUsuario();
$Profile = $usuarioActual->getPerfil();
$ConexNumber = $usuarioActual->getNumConexiones();
$LastDateConex = date('d/m/Y H:i:s', $usuarioActual->getFechaHoraUltimaConexion());
if (isset($_REQUEST['Cancelar'])) {

    $_SESSION['paginaEnCurso'] = $controladores['inicio']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}


if (isset($_REQUEST["Aceptar"])) { // comprueba que el usuario le ha dado a al boton de IniciarSesion y valida la entrada de todos los campos
    UsuarioPDO::borrarUsuario($CodUser);
    session_destroy();
    $_SESSION['paginaEnCurso'] = $controladores['login']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del inicio

    header('Location: index.php'); // redirige al index.php
    exit;
}


$vistaEnCurso = $vistas['deleteAccount']; // guardamos en la variable vistaEnCurso la vista que queremos implementar

require_once $vistas['layout'];
