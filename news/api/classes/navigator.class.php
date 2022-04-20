<?php

if(!defined('ALLOW_API') || ALLOW_API!='CLIQUE$#%') {
    die('Direct access not permitted');
}

abstract class Nav{
    protected $db = null;
    protected $getData = null;

    public function __construct($db=null){
        $this->db = $db;
        //$this->getData = $getData;
    }

    function resolve($getData){
        if(is_array($getData) && isset($getData['action'])):

            switch($getData['action']){

                case 'add':
                    break;  

                case 'edit':
                    $this->onEdit($getData['id']);

                    break;

                case 'delete':
                    break;
                
                case 'save':
                    break;
                
                default:
                    $this->onGetAll();
                    break;

            }

        endif;

        return [];
    }

    abstract function onEdit($id);

    abstract function onGetAll();

}

?>