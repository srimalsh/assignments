<?php

class FileUpload{

    private $obj = null;
    private $allowedExt = array('jpeg','png');
    private $fromPath = null;
    private $destPath = null;

    function __construct($obj){
        $this->obj = $obj;
    }

    function ext($allowedExtArray){
        $this->allowedExt = $allowedExtArray;
        return $this;
    }

    function from(){
        
    }

    function upload($files){
        
    }

}

?>