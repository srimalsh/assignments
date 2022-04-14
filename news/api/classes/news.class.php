<?php

class News extends Database{

    private $obj = null;
    //sendResponse($statusCode,$return_array)
    //$this->throwError(403,'Invalid Request Method');

    function __construct($obj){
        parent::__construct();
        $this->obj = $obj;
    }

    function create_news($data,$file){

        //$this->obj->throwError(202,$file);

        $fileUploadObj = new FileUpload($this->obj);

        $message = "";
        $isValid = true;
        $headerImage = "";

        if(!isset($data['title']) || $data['title']==''){
            $isValid = false;
            $message .= "Title is required</br>";
        }

        if(!isset($data['subTitle']) || $data['subTitle']==''){
            $isValid = false;
            $message .= "Subtitle is required</br>";
        }

        if(!isset($data['articleContent']) || $data['articleContent']==''){
            $isValid = false;
            $message .= "Artical content is required</br>";
        }       

        if(is_array($file)){            
            $newFileName = $fileUploadObj->generateFileName($file['name']);
            $newFilePath = FILE_UPLOAD_PATH."uploads/".$newFileName;
            $headerImage = $fileUploadObj->upload($file,$newFileName,$file['tmp_name'],$newFilePath,array('png','jpg','jpeg'));
        }else{
            $isValid = false;
            $message .= "Header image is required</br>";
        }

        if($isValid){

            $SQL = "INSERT INTO articles SET ";
            $SQL .= " title = '".$this->clean($data['title'])."' , ";
            $SQL .= " subTitle = '".$this->clean($data['subTitle'])."' , ";
            $SQL .= " headerImage = '".$headerImage."' , ";
            //$SQL .= " htmlName = '".$this->clean($data['htmlName'])."' , ";
            //$SQL .= " category = '".$this->clean($data['category'])."' , ";
            $SQL .= " articleContent = '".$this->clean($data['articleContent'])."' , ";
            $SQL .= " publishedDate = '".date("Y-m-d H:i:s")."' , ";
            $SQL .= " editedBy = '1' ";

            //$this->obj->throwError(202,$SQL);

            $res = $this->save($SQL);
            if(!$res){
                $this->obj->throwError(202,'Unable to save article');
            }

        }else{
            $this->obj->throwError(202,$message);
        }

        return $res;        
    }

    function edit_news(){}

    function get_news_all($searchQ=''){        
        $SQL = "SELECT articleID,title,subTitle,headerImage,htmlName,category,articleContent,publishedDate,editedBy ";
        $SQL .= " FROM articles ";
        
        return $this->result($SQL);

        /*$result = $this->result_raw($SQL); 
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {                
                $return[$count]['hash'] = base64_encode($row['articleID']);
                $return[$count]['title'] = $row['title'];
                $return[$count]['subTitle'] = $row['subTitle'];
                $return[$count]['htmlName'] = $row['htmlName'];
                $return[$count]['category'] = $row['category'];
                $return[$count]['articleContent'] = $row['articleContent'];
                $return[$count]['publishedDate'] = $row['publishedDate'];
                $return[$count]['editedBy'] = $row['editedBy'];
                $count++;
            }
            return $return;
            */       
    }

    function get_news_single($id){
        $SQL = "SELECT title,subTitle,headerImage,htmlName,category,articleContent,publishedDate,editedBy ";
        $SQL .= " FROM articles WHERE articleID='".$this->clean($id)."'";
        
        return $this->result($SQL);
    }
    
}



?>