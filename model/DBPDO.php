<?php

/**
 * Class DBPDO
 *
 * Clase cuyo método permite establecer una conexión con la base de datos y
 * realizarle consultas.
 * 
 * @author Rodrigo Robles Miñambres
 * @copyright 22-01-2021
 * @version 1.0
 */
class DBPDO {

    /**
     * Método ejecutaConsulta()
     * 
     * Ejecuta una consulta a la base de datos indicada en configDB.
     * 
     * Esta función se encarga de realizar una consulta a la base de datos,
     * creada a partir de la sentencia de código SQL y los parámetros necesarios.
     * 
     * @access public
     * @param $sentenciaSQL Código SQL 
     * @param $parametros Datos necesarios para realizar la consulta, 
     * los cuales se insertan en el código SQL.
     * @return consulta La suma de todos los argumentos
     */
    public static function ejecutaConsulta($sentenciaSQL, $parametros) {
        try {
            $miDB = new PDO(DNS, USER, PASSWORD);
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = $miDB->prepare($sentenciaSQL); //Preparamos la consulta.
            $consulta->execute($parametros); //Ejecutamos la consulta.
        } catch (PDOException $exception) {
            $consulta = null; //Destruimos la consulta.
            echo $exception->getMessage();
            unset($miDB);
        }
        return $consulta;
    }

}
