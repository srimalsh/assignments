<?php

/*if(!defined('API_CONST')) {
    die('Direct access not permitted');
}*/

class API extends Authenticator{

    function __construct(){
        parent::__construct();
    }

    function getNews(){
        $news = new News($this);
        $result = $news->get_news_single($this->params['id'])[0];

        $this->sendResponse(200,$result);
    }

    function getAllNews(){

        $news = new News($this);
        $result = $news->get_news_all();
        
        return $result;
    }

    function saveNews(){
        
        $news = new News($this);
        
        $result = $news->create_news($this->params,$_FILES['headImage']);

        if($result){
            $this->sendResponse(200,"Articles has been successfully saved");
        }
    }

}

?>
