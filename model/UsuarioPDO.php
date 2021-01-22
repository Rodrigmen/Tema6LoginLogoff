<?php

/**
 * Class UsuarioPDO
 *
 * Clase cuyos métodos se encargan de realizar operaciones con los usuarios.
 * Es decir, consultas a la tabla T_01Usuario.
 * 
 * @author Rodrigo Robles Miñambres
 * @copyright 22-01-2021
 * @version 1.0
 */
class UsuarioPDO {

    /**
     * Método validarUsuario()
     * 
     * Valida si existe un determinado usuario y password en la base de datos.
     * 
     * Si existe el usuario actualiza la ultima conexion y el numero de conexiones de ese usuario y lo devuelve.
     * Si no existe el usuario devuelve null.
     * 
     * @access public
     * @param string $codUsuario Código del usuario
     * @param string $password Contraseña del usuario 
     * @return null \ Usuario Null o un objeto Usuario.
     */
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

    /**
     * Método actualizarUltimaConexion()
     * 
     * Actualiza la última conexión del usuario y el número total de conexiones establecidas por el usuario.
     * 
     * @access public
     * @param string $codUsuario Código del usuario
     */
    public static function actualizarUltimaConexion($codUsuario) {
        $consulta = "Update T01_Usuario set T01_NumConexiones = T01_NumConexiones+1, T01_FechaHoraUltimaConexion=? where T01_CodUsuario=?";
        DBPDO::ejecutaConsulta($consulta, [time(), $codUsuario]);
    }

    /**
     * Método borrarUsuario()
     * 
     * Borra el usuario
     * 
     * @access public
     * @param string $codUsuario Código del usuario
     */
    public static function borrarUsuario($codUsuario) {
        $consulta = "DELETE FROM T01_Usuario WHERE T01_CodUsuario=?";
        DBPDO::ejecutaConsulta($consulta, [$codUsuario]);
    }

    /**
     * Método editarUsuario()
     * 
     * Modifica la descripción de un usuario.
     * 
     * @access public
     * @param string $codUsuario Código del usuario
     * @param string $descripcion Descripción del usuario 
     * @return Usuario Objeto Usuario modificado.
     */
    public static function editarUsuario($codUsuario, $descripcion) {
        $consulta = "Update T01_Usuario set T01_DescUsuario=? where T01_CodUsuario=?";
        $resultado = DBPDO::ejecutaConsulta($consulta, [$descripcion, $codUsuario]);

        $consultaDatosUsuario = "Select * from T01_Usuario where T01_CodUsuario=?";
        $resultadoDatosUsuario = DBPDO::ejecutaConsulta($consultaDatosUsuario, [$codUsuario]); // guardo en la variabnle resultado el resultado que me devuelve la funcion que ejecuta la consulta con los paramtros pasados por parmetro

        if ($resultadoDatosUsuario->rowCount() > 0) { // si la consulta me devuleve algun resultado
            $oUsuarioConsulta = $resultadoDatosUsuario->fetchObject(); // guardo en la variable el resultado de la consulta en forma de objeto
            // instanciacion de un objeto Usuario con los datos del usuario
            $oUsuario = new Usuario($oUsuarioConsulta->T01_CodUsuario, $oUsuarioConsulta->T01_Password, $oUsuarioConsulta->T01_DescUsuario, $oUsuarioConsulta->T01_NumConexiones, $oUsuarioConsulta->T01_FechaHoraUltimaConexion, $oUsuarioConsulta->T01_Perfil, $oUsuarioConsulta->T01_ImagenUsuario);
        }

        return $oUsuario;
    }

    /**
     * Método altaUsuario()
     * 
     * Crea un usuario nuevo.
     * 
     * @access public
     * @param string $codUsuario Código del usuario
     * @param string $password Contraseña del usuario 
     * @param string $descripcion Descripción del usuario 
     * @return Usuario Objeto Usuario nuevo.
     */
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

    /**
     * Método validarCodNoExiste()
     * 
     * Valida si existe un usuario en la base de datos a través de su código.
     * 
     * @access public
     * @param string $codUsuario Código del usuario
     * @return boolean true = usuario inexistente, false = usuario existente.
     */
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
