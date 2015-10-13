<?php

/**
 * Description of Files
 *
 * @author Martin
 */
class Files {

    private $name;
    private $ruta;
    private $max_size;
    private $tipo;
    private $error;

    function __construct($name = array(), $ruta = NULL, $max_size = NULL, $tipo = NULL) {
        $this->name = $name;
        $this->ruta = $ruta;
        $this->max_size = $max_size;
        $this->tipo = $tipo;
        $this->error = array();
    }

    public function getName() {
        return $this->name;
    }

    public function getRuta() {
        return $this->ruta;
    }

    public function getMaxSize() {
        return $this->max_size;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getError() {
        return $this->error;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setRuta($ruta) {
        $this->ruta = $ruta;
    }

    public function setMaxSize($maxSize) {
        $this->maxSize = $maxSize;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
    public function resetError(){
        $this->error = array();
    }

    public function upload() {
        for ($i = 0; $i < count($this->name); $i++){
            
        }
        return self::$error;
    }

    private function filesArray($param) {
        if(is_array($param)){
            return $param;
        }
        $files = array();
        $files[] = $param;       
        return $files;
    }
}
