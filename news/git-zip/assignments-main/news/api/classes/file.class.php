<?php

/*
Srimal Iresh
Not copeid from somewhere :)
*/
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

    function upload($file,$from,$dest,$allowedFileTypes){

        if($file['error']!=0){
            $this->obj->throwError(202,'File Error or corrupted');
         }
         
        if(!isset($file['name']) || $file['name']!=''){
            $this->obj->throwError(202,'File cannot be found');
         }

         if(!$this->isAllowedFileType($file['name'],$allowedFileTypes)){
            $this->obj->throwError(202,'File Type is not supported');
         }
    }

    private function isAllowedFileType($type,$allowedFileTypes){
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowedFileTypes)) {
            return false;
        }

        return true;

    }

}

?>