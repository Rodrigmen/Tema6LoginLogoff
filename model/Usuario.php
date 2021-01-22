<?php

/**
 * Class Usuario
 *
 * Clase utilizada para instanciar objetos 'Usuario'
 * 
 * @author Rodrigo Robles Miñambres
 * @copyright 22-01-2021
 * @version 1.0
 */
class Usuario {

    /**
     * Código del usuario 
     * 
     * @var string 
     * @access private
     */
    private $codUsuario;

    /**
     * Contraseña usuario 
     * 
     * @var string 
     * @access private
     */
    private $password;

    /**
     * Descripción usuario 
     * 
     * @var string 
     * @access private
     */
    private $descUsuario;

    /**
     * Número de conexiones establecidas por el usuario 
     * 
     * @var int 
     * @access private
     */
    private $numConexiones;

    /**
     * Fecha y hora de la última conexión (formato timestamp) 
     * 
     * @var int 
     * @access private
     */
    private $fechaHoraUltimaConexion;

    /**
     * Perfil del usuario (administrador o usuario)
     * 
     * @var string 
     * @access private
     */
    private $perfil;

    /**
     * Metodo magico __construct()
     * 
     * Metodo magico del constructor de la clase Usuario
     * 
     * @param string $codUsuario código del usuario
     * @param string $password constraseña del usuario
     * @param string $descUsuario descripción del usuario
     * @param int $numConexiones número de conexiones del usuario
     * @param int $fechaHoraUltimaConexion fecha y hora de la última conexion del usuario en formato timestamp
     * @param string $perfil tipo de perfil del usuario
     */
    function __construct($codUsuario, $password, $descUsuario, $numConexiones, $fechaHoraUltimaConexion, $perfil) {
        $this->codUsuario = $codUsuario;
        $this->password = $password;
        $this->descUsuario = $descUsuario;
        $this->numConexiones = $numConexiones;
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        $this->perfil = $perfil;
    }

    /**
     * Método getCodUsuario()
     * 
     * Método que devuelve el código del usuario
     * 
     * @return string Código del usuario
     */
    function getCodUsuario() {
        return $this->codUsuario;
    }

    /**
     * Método getPassword()
     * 
     * Método que devuelve la contraseña del usuario
     * 
     * @return string Contraseña del usuario
     */
    function getPassword() {
        return $this->password;
    }

    /**
     * Método getDescUsuario()
     * 
     * Método que devuelve la descripción del usuario
     * 
     * @return string Descripción del usuario
     */
    function getDescUsuario() {
        return $this->descUsuario;
    }

    /**
     * Método getNumConexiones()
     * 
     * Método que devuelve el número de conexiones establecidas del usuario
     * 
     * @return int Número de conexiones establecidas del usuario
     */
    function getNumConexiones() {
        return $this->numConexiones;
    }

    /**
     * Método getFechaHoraUltimaConexion()
     * 
     * Método que devuelve la fecha y hora de la última conexión (formato timestamp) del usuario
     * 
     * @return int Fecha y hora de la última conexión (formato timestamp)
     */
    function getFechaHoraUltimaConexion() {
        return $this->fechaHoraUltimaConexion;
    }

    /**
     * Método getPerfil()
     * 
     * Método que devuelve el perfil del usuario
     * 
     * @return string Perfil del usuario
     */
    function getPerfil() {
        return $this->perfil;
    }

    /**
     * Método setCodUsuario()
     * 
     * Método que cambia el valor del atributo $codUsuario
     * 
     * @param string $codUsuario Nuevo código del usuario
     */
    function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    /**
     * Método setPassword()
     * 
     * Método que cambia el valor del atributo $password
     * 
     * @param string $password Nueva contraseña del usuario
     */
    function setPassword($password) {
        $this->password = $password;
    }

    /**
     * Método setDescUsuario()
     * 
     * Método que cambia el valor del atributo $descUsuario
     * 
     * @param string $descUsuario Nueva descripción del usuario
     */
    function setDescUsuario($descUsuario) {
        $this->descUsuario = $descUsuario;
    }

    /**
     * Método setNumConexiones()
     * 
     * Método que cambia el valor del atributo $numConexiones
     * 
     * @param int $numConexiones Nuevo número de conexiones establecidas del usuario
     */
    function setNumConexiones($numConexiones) {
        $this->numConexiones = $numConexiones;
    }

    /**
     * Método setFechaHoraUltimaConexion()
     * 
     * Método que cambia el valor del atributo $fechaHoraUltimaConexion
     * 
     * @param int $fechaHoraUltimaConexion Nueva última fecha de conexión en formato timestamp del usuario
     */
    function setFechaHoraUltimaConexion($fechaHoraUltimaConexion) {
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
    }

    /**
     * Método setPerfil()
     * 
     * Método que cambia el valor del atributo $perfil
     * 
     * @param string $perfil Nueva perfil del usuario
     */
    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

}
