<?php
/**
 * Description of Files
 *
 * @author Martin
 */
class Files {
    
    const NOTOCAR = 0, RENOMBRAR = 1, BORRAR = 2;

    private $files;
    private $name;
    private $ruta;
    private $max_size = 4096;
    private $op;
    private $tipo;
    private $error;

    function __construct($param, $name = array(), $ruta = NULL, $op = 0,$tipo = NULL) {
        $this->files = $_FILES[$param];
        $this->name = $name;
        $this->ruta = $ruta;
        $this->tipo = $tipo;
        $this->error = array();
    }
    
    private static function fileSize($param) {
        return $param['size'];
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
        return $this->$error;
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
