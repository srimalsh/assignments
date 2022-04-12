<?php

class API extends Authenticator{

    #private $db = null;

    function __construct(){
        parent::__construct();
        #$this->db = new Database();
    }

    function getAllNews(){
        $news = new News();
        $result = $news->get_news_all();

        $this->sendResponse(200,$result);
    }

}

?>