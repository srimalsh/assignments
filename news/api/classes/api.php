<?php

/*if(!defined('API_CONST')) {
    die('Direct access not permitted');
}*/

class API extends Authenticator{

    function __construct($REQUEST=null){
        parent::__construct($REQUEST);
    }

    function getNews(){
        $news = new News($this);
        $result = $news->get_news_single($this->params['id'])[0];

        $this->sendResponse(200,$result);
    }

    function getAllNews(){
        $news = new News($this);
        $result = $news->get_news_all();

        $this->sendResponse(200,$result);
    }

    function saveNews(){

        //$this->sendResponse(200,$_FILES);

        $news = new News($this);
        $result = $news->create_news($this->params,$_FILES['headImage']);

        if($result){
            $this->sendResponse(200,"Articles has been successfully saved");
        }
    }

}

?>
