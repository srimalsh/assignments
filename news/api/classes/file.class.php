<?php

/*
Srimal Iresh
*/

class FileUpload{

    private $obj = null;
    private $allowedExt = array('jpeg','png');
    private $fromPath = null;
    private $destPath = null;

    function __construct($obj=null){
        $this->obj = $obj;
    }

    function ext($allowedExtArray){
        $this->allowedExt = $allowedExtArray;
        return $this;
    }

    function upload($file,$filename,$from,$dest,$allowedFileTypes){
         
        if(!isset($file['name']) || $file['name']==''){
            $this->obj->throwError(202,'File cannot be found');
        }

         if(!$this->isAllowedFileType($file['name'],$allowedFileTypes)){
            $this->obj->throwError(202,'File Type is not supported');
        }

        if($file['error']!=0){
            $this->obj->throwError(202,'File Error or corrupted');
        }

        if (file_exists($dest)) {
            $this->obj->throwError(202,'File already exist, please try again');
        }

        if(move_uploaded_file($from,$dest)){
            return $filename;
        }else{
            return false;
        }
    }

    private function isAllowedFileType($filename,$allowedFileTypes){
        $ext = pathinfo(strtolower($filename), PATHINFO_EXTENSION);
            
        if (!in_array($ext, $allowedFileTypes)) {
            return false;
        }

        return true;
    }

    public static function generateFileName($filename){
        //$tmp = str_replace(' ', '-',$base_str);
        $tmp = pathinfo($filename, PATHINFO_FILENAME);
        $newFilename = rand(10,1000).'-'.preg_replace('/[^A-Za-z0-9\-]/', '', $tmp).'.'.pathinfo($filename, PATHINFO_EXTENSION);
        return strtolower($newFilename);
    }


}

?>