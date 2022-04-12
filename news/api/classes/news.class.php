<?php

class News extends Database{

    function create_news($searchQ=''){

        
    }

    function edit_news(){}

    function get_news_all(){
        $SQL = "SELECT articleID,title,subTitle,htmlName,category,articleContent,publishedDate,editedBy ";
        $SQL .= " FROM articles ";
        
        return $this->query($SQL);
    }

    function get_news_single(){}
}


?>