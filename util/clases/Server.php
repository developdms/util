<?php

/**
 * Description of Server
 *
 * @author Usuario
 */
class Server {

    public static function getServerName() {
        return $_SERVER['SEVER_NAME'];
    }

    public static function getRootPath() {
        return $_SERVER['CONTEXT_DOCUMENT_ROOT'];
    }

    public static function getFile() {
        return $_SERVER['SCRIPT_FILENAME'];
    }

    public static function getPort() {
        return $_SERVER['SERVER_PORT'];
    }

    public static function getUserAgent() {
        return $_SERVER['HTT`P_USER_AGENT'];
    }

    public static function getQueryString() {
        return $_SERVER['QUERY_STRING'];
    }

    public static function getMethod() {
        return $_SERVER['REQUEST_METHOD'];
    }
    
    public static function isGet() {
        return self::getMethod() == 'GET';
    }
    
    public static function isPost() {
        return self::getMethod() == 'POST';
    }

    public static function getClientAddress() {
        return $_SERVER['REMOTE_ADDR'];
    }

    public static function getRequestDate($campo = NULL) {
        date_default_timezone_set('Europe/Madrid');
        switch ($campo) {

            case 'Y':
                return intval(date("Y", $_SERVER['REQUEST_TIME']));
            case 'M':
                return intval(date("m", $_SERVER['REQUEST_TIME']));
            case 'D':
                return intval(date("d", $_SERVER['REQUEST_TIME']));
            case 'h':
                return intval(date("H", $_SERVER['REQUEST_TIME']));
            case 'm':
                return intval(date("i", $_SERVER['REQUEST_TIME']));
            case 'm':
                return intval(date("s", $_SERVER['REQUEST_TIME']));
        }
        return $_SERVER['REQUEST_TIME'];
    }
    
    public static function getClientLanguage() {
        return $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    }
    
}
