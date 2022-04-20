<?php

if(!defined('ALLOW_API') || ALLOW_API!='CLIQUE$#%') {
    die('Direct access not permitted');
}

class API extends Authenticator{

    function __construct(){
        parent::__construct();
    }

    function getNews($data){
        $news = new News($this);
        $result = $news->get_news_single($data['id'])[0];

        return $result;

        //$this->sendResponse(200,$result);
    }

    function getAllNews($data){
        $news = new News($this);
        $result = $news->get_news_all();
        
        return $result;
    }

    function searchNews($data){

        $news = new News($this);

        if((isset($data['searchFrom']) && $data['searchFrom']!='' ) &&  (isset($data['searchTo']) && $data['searchTo']!='' )):
            
            $result = $news->get_news_all(['range'=>['start'=>$data['searchFrom'],'end'=>$data['searchTo']]]);
        else:
            $result = $news->get_news_all();
        endif;        
        
        return $result;
    }

    function saveNews(){
        
        $news = new News($this);
        
        //$result = $news->create_news($this->params,$_FILES['headImage']);

        $result = $news->save_news($this->params,$_FILES['headImage']);

        if($result){
            $this->sendResponse(200,"Articles has been successfully saved");
        }
    }

    function deleteNews(){        
        $news = new News($this);
        $result = $news->delete_news($this->params);

        if($result){
            $this->sendResponse(200,"Articles has been successfully deleted");
        }
    }

}

?>
