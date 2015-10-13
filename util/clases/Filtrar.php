<?php

/**
 * Description of Filtrar
 *
 * @author Usuario
 */
class Filter {

    public static function isEmail($valor) {
        return filter_var($valor, FILTER_VALIDATE_EMAIL);
    }

    public static function isInteger($valor) {
        return filter_var($valor, FILTER_VALIDATE_INT);
    }

    public static function isFloat($valor) {
        return filter_var($valor, FILTER_VALIDATE_FLOAT);
    }

    public static function isNumber($valor) {
        if (filter_var($valor, FILTER_VALIDATE_FLOAT) || filter_var($valor, FILTER_VALIDATE_FLOAT)) {
            return true;
        }
        return false;
    }
    
    public static function isIP($valor) {
        return filter_var($valor, FILTER_VALIDATE_IP);
    }
    
    public static function isBoolean($valor) {
        return filter_var($valor, FILTER_VALIDATE_BOOLEAN);
    }
    
    public static function isMac($valor) {
        return filter_var($valor, FILTER_VALIDATE_MAC);
    }
    
    public static function isMinLength($valor , $min){
        return strlen($valor) >= $min;
    }
    
    public static function isMaxLength($valor , $max){
        return strlen($valor) <= $max;
    }
    
    public static function isBetween($valor , $min, $max){
        return (strlen($valor) <= $max && strlen($valor) >= $min);
    }
}
