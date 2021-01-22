<?php

/**
 *   @author: Javier Nieto Lorenzo
 *   @since: 02/12/2020
 *   Programa
 */
if (!isset($_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'])) { // si no se ha logueado le usuario
    header('Location: index.php'); // redirige al login
    exit;
}

if (isset($_REQUEST['cerrarSesion'])) { // si se ha pulsado el boton de Cerrar Sesion
    session_destroy(); // destruye todos los datos asociados a la sesion
    header("Location: index.php"); // redirige al login
    exit;
}
if (isset($_REQUEST['editProfile'])) { // si se ha pulsado el boton de Cerrar Sesion
    $_SESSION['paginaEnCurso'] = $controladores['editProfile'];
    header("Location: index.php"); // redirige al login
    exit;
}

if (isset($_REQUEST['deleteAccount'])) { // si se ha pulsado el boton de Cerrar Sesion
    $_SESSION['paginaEnCurso'] = $controladores['deleteAccount'];
    header("Location: index.php"); // redirige al login
    exit;
}
$usuarioActual = $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'];
$CodUser = $usuarioActual->getCodUsuario();
$DescUser = $usuarioActual->getDescUsuario();
$Profile = $usuarioActual->getPerfil();
$ConexNumber = $usuarioActual->getNumConexiones();
$LastDateConex = date('d/m/Y H:i:s', $usuarioActual->getFechaHoraUltimaConexion());

$vistaEnCurso = $vistas['inicio']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];
?>