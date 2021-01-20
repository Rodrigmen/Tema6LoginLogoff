<?php

class UsuarioPDO {

    public static function validarUsuario($codUsuario, $password) {
        $oUsuario = null;

        $consulta = "Select * from T01_Usuario where T01_CodUsuario=? and T01_Password=?";
        $passwordEncriptado = hash("sha256", ($codUsuario . $password));
        $resultado = DBPDO::ejecutaConsulta($consulta, [$codUsuario, $passwordEncriptado]);

        if ($resultado->rowCount() > 0) {
            $oUsuarioConsulta = $resultado->fetchObject();
            $oUsuario = new Usuario($oUsuarioConsulta->T01_CodUsuario, $oUsuarioConsulta->T01_Password, $oUsuarioConsulta->T01_DescUsuario, $oUsuarioConsulta->T01_NumConexiones, $oUsuarioConsulta->T01_FechaHoraUltimaConexion, $oUsuarioConsulta->T01_Perfil, $oUsuarioConsulta->T01_ImagenUsuario);
        }

        return $oUsuario;
    }

    public static function actualizarUltimaConexion($codUsuario) {
        $consulta = "Update T01_Usuario set T01_NumConexiones = T01_NumConexiones+1, T01_FechaHoraUltimaConexion=? where T01_CodUsuario=?";
        $resultado = DBPDO::ejecutaConsulta($consulta, [time(), $codUsuario]);
        return $resultado;
    }

    public static function altaUsuario($codUsuario, $password, $descripcion) {
        $oUsuario = null;

        $consulta = "Insert into T01_Usuario (T01_CodUsuario, T01_DescUsuario, T01_Password , T01_NumConexiones, T01_FechaHoraUltimaConexion) values (?,?,?,1,?)";
        $passwordEncriptado = hash("sha256", ($codUsuario . $password)); // enctripta el password pasado como parametro
        $resultado = DBPDO::ejecutaConsulta($consulta, [$codUsuario, $descripcion, $passwordEncriptado, time()]);


        $consultaDatosUsuario = "Select * from T01_Usuario where T01_CodUsuario=?";
        $resultadoDatosUsuario = DBPDO::ejecutaConsulta($consultaDatosUsuario, [$codUsuario]); // guardo en la variabnle resultado el resultado que me devuelve la funcion que ejecuta la consulta con los paramtros pasados por parmetro

        if ($resultadoDatosUsuario->rowCount() > 0) { // si la consulta me devuleve algun resultado
            $oUsuarioConsulta = $resultadoDatosUsuario->fetchObject(); // guardo en la variable el resultado de la consulta en forma de objeto
            // instanciacion de un objeto Usuario con los datos del usuario
            $oUsuario = new Usuario($oUsuarioConsulta->T01_CodUsuario, $oUsuarioConsulta->T01_Password, $oUsuarioConsulta->T01_DescUsuario, $oUsuarioConsulta->T01_NumConexiones, $oUsuarioConsulta->T01_FechaHoraUltimaConexion, $oUsuarioConsulta->T01_Perfil, $oUsuarioConsulta->T01_ImagenUsuario);
        }

        return $oUsuario;
    }

    public static function validarCodNoExiste($codUsuario) {
        $usuarioNoExiste = true; // inicializo la variable booleana a true
        // comprueba que el usuario introducido existen en la base de datos
        $consulta = "Select * from T01_Usuario where T01_CodUsuario=?";
        $resultado = DBPDO::ejecutaConsulta($consulta, [$codUsuario]); // guardo en la variabnle resultado el resultado que me devuelve la funcion que ejecuta la consulta con los paramtros pasados por parmetro

        if ($resultado->rowCount() > 0) { // si la consulta me devuleve algun resultado
            $usuarioNoExiste = false; // inicializo la variable booleana a false
        }

        return $usuarioNoExiste;
    }

}
