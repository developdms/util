<?php

/**
 * Description of Request
 *
 * @author Usuario
 */
class Request {

    /*
     * Devuelve el parámetro get solicitado
     * Retorna NULL en caso de no existir el parámetro
     */
    public static function get($nombre) {

        if (isset($_GET[$nombre])) {
            return $_GET[$nombre];
        }
        return NULL;
    }

    /*
     * Devuelve el parámetro post solicitado
     * Retorna NULL en caso de no existir el parámetro
     */
    public static function post($nombre) {

        if (isset($_POST[$nombre])) {
            return $_POST[$nombre];
        }
        return NULL;
    }

    /*
     * Devuelve el parámetro get o post solicitado
     * Retorna NULL en caso de no existir el parámetro
     */
    public static function req($nombre) {

        if (Server::isPost() && self::post($nombre) != NULL) {
            return self::post($nombre);
        }
        return self::get($nombre);
    }

}
