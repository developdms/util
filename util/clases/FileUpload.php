<?php

/**
 * Description of FileUpload
 *
 * @author Usuario
 */
class FileUpload {

    const RENAME = 0, NOTOUCH = 1, UPDATE = 2;

    private $store = "./", $name, $size = 100000, $parametro = NULL, $policy = 0;
    private $extension;
    private $types = array(
        'jpg' => 1,
        'gif' => 1,
        'png' => 1,
        'jpeg' => 1
    );

    function __construct($param) {
        if (isset($_FILES[$param])) {
            $this->parametro = $_FILES[$param];
            //pathinfo devuelve un array asociativo con extension, dirname, basename, filename
            $this->extension = pathinfo($this->parametro['name'])['extension'];
            $this->name = pathinfo($this->parametro['name'])['name'];
        }
    }

    private function limitSize() {
        return $this->param['size'] <= $this->size;
    }

    private function checkDirectory() {
        if (!is_dir($this->store)) {
            return mkdir($this->store . $this->name);
        }
        return true;
    }

    private function rename() {
        switch ($this->policy) {
            case NOTOUCH:
                return false;
                break;
            case UPDATE:
                return true;
                break;
            default:
                $c = 1;
                while (is_file($this->store . $this->name)) {
                    $this->name .= '_' . $c;
                    $c++;
                }
                return true;
        }
    }

    public function addType($param) {
        if (!$this->isOnType($param)) {
            $this->types[$param] = 1;
            return true;
        }
        return false;
    }

    public function removeType($param) {
        if ($this->isOnType($param)) {
            unset($this->types[$param]);
            return true;
        }
        return false;
    }

    public function isOnType($param) {
        return isset($this->types[$param]);
    }

    function getStore() {
        return $this->store;
    }

    function getName() {
        return $this->name;
    }

    function getSize() {
        return $this->size;
    }

    function setStore($store) {
        $this->store = $store;
    }

    public function getPolicy() {
        return $this->policy;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setSize($size) {
        $this->size = $size;
    }

    function setPolicy($param) {
        $this->policy = $param;
    }

    function upload() {
        if ($this->parametro['error'] == UPLOAD_ERR_OK) {
            if ($this->isOnType($this->extension)) {
                if ($this->limitSize($this->parametro)) {
                    return move_uploaded_file($this->parametro["tmp_name"], $this->store . $this->name);
                }
            }
        }
        return false;
    }

}
