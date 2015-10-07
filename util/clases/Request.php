<?php

/**
 * Description of Request
 *
 * @author Usuario
 */
class Request {
    /*
     * Devuelve el valor requerido de forma limpia, es decir, evitando 
     * devolver valores con caracteres especiales
     */

    private static function clean($valor) {
        trim($valor);
        return $valor;
    }

    /*
     * Devuelve el parámetro get solicitado
     * Retorna NULL en caso de no existir el parámetro
     */

    public static function get($nombre, $indice = NULL) {

        if (isset($_GET[$nombre])) {
            if (is_array($_GET[$nombre])) {
                if ($indice === NULL) {
                    $array = array();
                    foreach ($_GET[$nombre] as $value) {
                        $array[] = self::clean($value);
                    }
                    return $array;
                }
            }
            if (isset($_GET[$nombre][$indice])) {
                return self::clean($_GET[$nombre]);
            }
        }
        return NULL;
    }

    /*
     * Devuelve el parámetro post solicitado
     * Retorna NULL en caso de no existir el parámetro
     */

    public static function post($nombre) {

        if (isset($_POST[$nombre])) {
            return self::clean($_POST[$nombre]);
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

    /*
     * Devuelve el número de elementos del array de parámetros.
     * En caso de no ser un array pero existir devolveremos -1
     * En caso de no existir devolverá NULL
     */

    public static function elements($nombre) {

        if (self::req($nombre) != NULL) {
            if (is_array(self::req($nombre))) {
                return count(self::req($nombre));
            }
            return -1;
        }
        return NULL;
    }

    /*
     * Devuelve los valores de los parámetros solicitados.
     * En caso de enviar índice devolverá el valor del elemento del índice correspondiente.
     * En caso de no enviar índice devolverá el array de valores completo.
     * En caso de no existir devolverá NULL
     */

    public static function readArray($nombre, $indice = NULL) {

        if (self::elements($nombre) > 0 && self::elements($nombre) != NULL) {
            if ($indice != NULL && self::req($nombre)[$indice]) {
                //return self::req($nombre)[$indice];
                return self::req($nombre)[$indice];
            }
            $array = array();
            foreach (self::req($nombre)as $value) {
                $array[] = self::clean($value);
            }
            return $array;
        }
        return NULL;
    }

    public static function readArrayArcaico($nombre, $indice = NULL) {

        if (isset($_GET[$nombre])) {
            if ($indice === NULL) {
                $array = array();
                foreach ($_GET[$nombre] as $value) {
                    $array[] = self::clean($value);
                }
                return $array;
            } else {
                if (isset($_GET[$nombre][$indice])) {
                    return self::clean($_GET[$nombre][$indice]);
                }
            }
        }
        return NULL;
    }

}
